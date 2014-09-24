<?php
/**
 * 简单的 Excel 实现类
 * 依赖于 PHPExcel
 * 
 * @author Jesse
 *
 */
class Office_Excel{
	const TYPE_EXCEL5 = 'Excel5';
	const TYPE_EXCEL2007 = 'Excel2007';
	const TYPE_EXCEL2003XML = 'Excel2003XML';
	const TYPE_HTML = 'HTML';
	const TYPE_CSV = 'CSV';
	
	public static $extMap = array(
		self::TYPE_CSV => 'csv',
		self::TYPE_EXCEL5 => 'xls',
		self::TYPE_EXCEL2007=>'xlsx',
		self::TYPE_HTML=>'html',
		self::TYPE_EXCEL2003XML => 'xls',
		'default' => 'xls',
	);
	
	public $phpExcel;
	public $data;
	public $titleInfo;
	
	public function __construct(){
		$this->phpExcel = new PHPExcel();
	}
	
	
	public function setArrayData($data,$setTitle = true){
		$this->data = $data;
		if($setTitle && !$this->titleInfo){
			$titleInfo = array();
			foreach (current($data) as $key => $value){
				$titleInfo[$key] = $key;
			}
			$this->titleInfo = $titleInfo;
		}
	}
	
	public function setTitle($titleInfo){
		$this->titleInfo = $titleInfo;
	}
	
	
	public function download($name,$type = self::TYPE_EXCEL5,$return = false){
		$data = $this->data;
		$titleInfo = $this->titleInfo;
		if(!$data){
			return false;
		}
		
		$showArray = array();
		if($titleInfo){
			$row = array();
			foreach ($titleInfo as $key => $title){
				$row[] = $title;
			}
			$showArray[] = $row;
			
			foreach ($data as $one){
				$row = array();
				foreach ($titleInfo as $key => $title){
					$row[] = $one[$key];
				}
				$showArray[] = $row;
			}
		} else {
			$showArray = $data;
		}
		$objPHPExcel = $this->phpExcel;
		$worksheet = $objPHPExcel->getActiveSheet();
		
		//全部设置成字符串
		
		$colNum = $rowNum = 0;
		foreach ($showArray as $array){
			$colNum = 0;
			$rowNum++;
			foreach ($array as $val){	
				$worksheet->setCellValueExplicitByColumnAndRow($colNum,$rowNum,$val,PHPExcel_Cell_DataType::TYPE_STRING);
				$colNum++;
			}
		}
		
		//$worksheet->fromArray($showArray);
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, $type);
		
		$names = explode('.', $name);
		if(count($names) < 2){//无后缀
			$name = $name . '.' . self::GetExt($type);
		}
		if($return){
			ob_start();
			$objWriter->save('php://output');
			$content =ob_get_clean();
			return $content;
		} else {
			header("Content-Disposition: attachment;filename={$name}");
			header('Cache-Control: max-age=0');
			header ('Pragma: public'); // HTTP/1.0
			header('Content-Type: application/vnd.ms-excel');
			header("Content-Type: application/octet-stream");
			header('Content-Type: application/x-download');
			$objWriter->save('php://output');
			exit;
		}
	}
	
	public static function GetExt($type){
		$ext = self::$extMap[$type];
		$ext = $ext ? $ext : self::$extMap['default'];
		return $ext;
	}
}