//Html 画图类
function Html_Bootstrap_Table(data){
	this.data = data;
	this.th_array = {};
	this.td_array = {};
	this.col_width_array = {};
	this.table_class = 'table table-striped table-hover';
	

	this.setTableInfo = function(key_array){
		var th_array = {};
		var td_array = {};

		if(!key_array){
			return false;
		}


		for(var index in key_array){
			var one = key_array[index];

			if(!isNaN(index)){
				index = key_array[index];
			}

			th_array[index] = one;
			td_array[index] = index;
		}
		
		this.th_array = th_array;
		this.td_array = td_array;
	}


	
	/**
	 * $rows_info = array(
	 * 	   'username' => array('title' => '','col_width' => '')
	 * 
	 * )
	 * @param unknown_type $rows_info
	 */
	this.setDetailInfo = function(rows_info){
		var th_array = {};
		var td_array = {};
		var col_array = {};

		for(var index in rows_info){
			var one = rows_info[index];
			title  = one['title'];
			td_index = index;
			col_width = one['col_width'];

			th_array[index] = title;
			td_array[index] = index;
			col_array[index] = col_width;
		}

		this.th_array = th_array;
		this.td_array = td_array;
		this.col_width_array = col_array;
	}
	
	this.createHtml = function(){
		var th_str = "";
		var row_str = "";
		var col_str = "";

		for(var index in this.th_array){
			var one = this.th_array[index];
			th_str += "<th>" + one +"</th>";
		}

		for(var index in this.col_width_array) {
			col_str += "<col width='"+ this.col_width_array[index] +"'>";
		}
		
		if(!this.data){
			var col_span = count(this.th_array);
			row_str = "<tr><td colspan='"+col_span+"' class='text-center'>没有发现数据</td></tr> ";
		} else {
			for(var index in this.data){
				var one = this.data[index];
				var td_str = "";
				if(this.td_array){
					for(var i in this.td_array){
						td_str += "<td>"+one[this.td_array[i]]+"</td>";
					}
				} else {
					for(var i in one){
						td_str += "<td>" + one[i] + "</td>";
					}
				}

				row_str += "<tr>" + td_str + "</tr>";


			}
		}
		
		var html = "<table class='" + this.table_class + "'>"+ col_str + 
			"<thead><tr>" + th_str + "</tr><thead><tbody>" + row_str + "<tbody></table>";
		return html;
	}
	
	this.defaultSet = function(){
		var data = this.data;
		var modelData = current(data);
		modelData = modelData ? modelData : {};
		var keyArray = {};

		for(var key in modelData){
			keyArray[key] = key;
		}
		this.setTableInfo(keyArray);
	}




	this.defaultSet();
};