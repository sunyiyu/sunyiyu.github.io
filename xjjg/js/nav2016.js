function GetObj(objName){
	if(document.getElementById){
    return eval('document.getElementById("'+objName+'")')
	}
	else{
    return eval('document.all.'+objName)
  }
}

function setnav(){
	var ff = GetObj("nav");
	ff.innerHTML = "<div class='logo'><a href='index.php'><img src='images/logo.png' /></a></div><div class='addbox'><a target='_blank' href='http://www.cottoneasy.com/aboutFinancialservices' ><img src='images/20161008-4.jpg' /></a></div><div class='linksbox'><div class='links'><div class='linkslogo'><img src='images/cnce.png' /></div><div class='links_a'><a target='_blank' href='http://www.cnce.com' >全国棉花交易市场</a></div></div><div class='links'><div class='linkslogo'><img src='images/bco.png' /></div><div class='links_a'><a target='_blank' href='http://www.cottonchina.org' >中国棉花信息网</a></div></div><div class='links'><div class='linkslogo'><img src='images/emian.png' /></div><div class='links_a'><a target='_blank' href='http://www.cottoneasy.com/' >e 棉网</a></div></div><div class='links'><div class='linkslogo'><img src='images/imian.png' /></div><div class='links_a'><a target='_blank' href='http://www.i-cotton.org/' >i 棉网</a></div></div></div><div class='weixin'><img src='images/weixin86.jpg' /></div>";
	}


function setfooter(){
	var ff = GetObj("footer");
	ff.innerHTML = "<div class='footer_row'>Copyright 2016 北京全国棉花交易市场集团有限公司 版权所有</div><div class='footer_row'>地址：北京西城区宣武门外大街甲一号环球财讯中心B座15层</div><div class='footer_row'><div class='footer_linksbox'><div class='footer_links'><a href='http://www.cnce.com' target='_blank'><img src='images/cncelogo.png' /></a></div><div class='footer_links'><a href='http://www.cottoneasy.com/legalDeclaration' target='_blank'>法律声明</a>　|</div><div class='footer_links'><a href='http://www.cottoneasy.com/contactUs' target='_blank'>联系我们</a>　|</div><div class='footer_links'><a href='http://www.cottoneasy.com/common/login' target='_blank'>常见问题</a></div></div></div>";
	}

