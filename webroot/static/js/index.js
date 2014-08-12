
//数组工具类
function Util_Array(){}

Util_Array.GetColunm = function(array,colName,subName){
	var result = [];
	var subResult =[];
	
	if(!array){
		return result;
	}

	colName = colName ? colName : 'id';

	for(var i in array){
		if(array[i][colName] !== undefined){
			result.push(array[i][colName]);
		}

		if(subName && array[i][subName]){
			subResult = Util_Array.GetColunm(array[i][subName],colName,subName);
			if(subResult){
				for(var j in subResult){
					result.push(subResult[j]);
				}
			}
		}
	}
	return result;
};

