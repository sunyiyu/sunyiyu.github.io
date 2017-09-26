function GetObj(objName){
	if(document.getElementById)
  	return eval('document.getElementById("'+objName+'")')
	else
		return eval('document.all.'+objName)
}

function ShowSub(count,num){
	for(var i = 0;i <= 3 ;i++){
		if(GetObj("S_Menu_" + count+"_" + i))
			GetObj("S_Menu_" + count+"_" + i).className = 'tbg1';
		if(GetObj("S_Cont_" + count+"_" + i))
			GetObj("S_Cont_" + count+"_" + i).style.display = 'none';
	}
	if(GetObj("S_Menu_" + count+"_"+num))
    GetObj("S_Menu_" + count+"_"+num).className = 'tbg2';
	if(GetObj("S_Cont_" + count+"_"+num))
    GetObj("S_Cont_" + count+"_"+num).style.display = 'block';
}

function showtime(){
	var myDate = new Date();
	var fy = myDate.getFullYear();
	var gm  =myDate.getMonth()+1;
	var gde = myDate.getDate();
	var gdy = myDate.getDay();
	if(GetObj("st")){
		GetObj("st").innerHTML=fy + "年" + gm + "月"+gde +"日";
	}
}

function GetRequest() {
  var url = location.search; //获取url中"?"符后的字串
  var theRequest = new Object();
  if(url.indexOf("?") != -1) {
		var str = url.substr(1);
		strs = str.split("&");
		for(var i = 0; i < strs.length; i ++) {
    	theRequest[strs[i].split("=")[0]]=(strs[i].split("=")[1]);
  	}
  }
  return theRequest;
}

function setshow(){
	var idd = new Object();
  idd = GetRequest();
	var iddd = idd['id'];
	if(iddd=="a"){
		ShowSub(1,1);
	}
	if(iddd=="b"){
		ShowSub(1,2);
	}
}
