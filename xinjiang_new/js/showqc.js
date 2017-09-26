function GetObj(objName){
	if(document.getElementById){
    return eval('document.getElementById("'+objName+'")')
	}
	else{
    return eval('document.all.'+objName)
  }
}

function showqc(){
  var wx = GetObj("showqcimg");
  var qc = GetObj("qcimg");
  var imgtop = wx.offsetTop - 200 + "px";
  var imgleft = wx.offsetLeft  + "px";
  qc.style.top = imgtop;
  qc.style.left = imgleft;
  qc.style.display = "block";
}

function closeqc(){
var qc = GetObj("qcimg");
qc.style.display = "none";
}