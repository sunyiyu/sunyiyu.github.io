<?
if($gs_adodb!=1){
	include('../../wabx_adodb.inc');
	ADOLoadDB('mysql');
	$conn=&ADONewConnection();
}
include('../../wabx_conn.inc');

if($act=='ins'){
	for($z=1;$z<=4;$z++){
		$a='name'.$z;
		$name=$$a;

		if(empty($name))	continue;	//下一个循环
		$b='gender'.$z;
		$c='position'.$z;
		$d='mobile'.$z;
		
		$name=$$a;
		$gender=$$b;
		$position=$$c;
		$mobile=$$d;
		
		$sql="insert into z_bcohuiyi (hyname,identity,typee,country,company,cotype,linkman,linkmanmob,cotel,cofax,coemail,name,gender,position,mobile,fapiao,fptaitou,fpsendadd,fpconame,fpadd,sbh,fptel,bank,bankno,bak,wtime) values
		('2017中国棉花棉纱产业投资峰会','代表','gn','$country','$company','$cotype','$linkman','$linkmanmob','$cotel','$cofax','$coemail','$name','$gender','$position','$mobile','$fapiao','$fptaitou','$fpsendadd','$fpconame','$sbh','$fpadd','$fptel','$bank','$bankno','$bak',NOW())";
		$conn->execute($sql);
//echo $sql.'<br>';

		$msg_js.=$name.' 资料已经录入。'.$stat.'\n';		
		$js="<script language='JavaScript'>alert(\"$msg_js\")</script>";		
		$showmsg.=$name.' 资料已经录入。'.$stat.'<br>';
	}
}

//查找现有单位
$sql="select distinct company from z_bcohuiyi where company<>'' and (hyname='2016棉花展望论坛' or hyname='2017中国国际棉花会议') order by company asc";
$rs=$conn->execute($sql);
if(!$rs->EOF){
	$rnum=$rs->recordcount();
	for($i=0;$i<$rnum;$i++){
		$com=trim($rs->fields["company"]);
		$showcom.="<option value=''>$com</option>";
	$rs->movenext();
	}
}
$conn->close();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>2017中国棉花棉纱产业投资峰会 中国棉花信息网</title>
<link href="css/css.css" type="text/css"  rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="css/common.css">
<link rel="stylesheet" type="text/css" href="css/root.css">

<style type="text/css">
#selectItem{background:#ffffff; position:absolute;  overflow:hidden; border:1px solid #cccccc; z-index:1000;}
.selectItemhidden{display:none;}
</style>
<?echo $js?>
<!--提交验证-->
<script type="text/javascript">
function checkdata() {
	if(form1.company.value==""){
		alert("\请输入 单位名称!!")
		return false;
	}
	if(form1.cotype.value==""){
		alert("\请输入 单位类型!!")
		return false;
	}
	if(form1.country.value==""){
		alert("\请输入 地区!!")
		return false;
	}
	if(form1.linkman.value==""){
		alert("\请输入 联系人!!")
		return false;
	}
	if(form1.linkmanmob.value==""){
		alert("\请输入 联系人手机!!")
		return false;
	}
	if(form1.name1.value==""){
		alert("\请输入 至少一个参会人!!")
		return false;
	}

	return true;
}

function fpxx(){
	form1.fptaitou.value=form1.company.value;
	form1.fpconame.value=form1.company.value;
}
</script>
<script language="javascript" type="text/javascript">
	var interval = 1000;
	function ShowCountDown(year,month,day,divname1,divname2){
	var now = new Date();
	var endDate = new Date(year, month-1, day);
	var leftTime=endDate.getTime()-now.getTime();
	var leftsecond = parseInt(leftTime/1000);
	var day1=Math.floor(leftsecond/(60*60*24));
	var time1 = document.getElementById(divname1);
	var time2 = document.getElementById(divname2);
	
	if(day1<10)	{
	day1='0'+day1;
	}
  day1=day1.toString();
	tt1 = day1.substr(0,1);
  tt2 = day1.substr(1,1);
	time1.innerHTML ="<img src='images/num/t"+tt1+".png' />";
	time2.innerHTML ="<img src='images/num/t"+tt2+".png' />";
	}
	window.setInterval(function(){ShowCountDown(2017,10,20,'time1','time2');}, interval);
</script>	
</head>

<body>
<div class="topimg"></div>
<div class="mainbox">
	<div class="conbox">
<script type="text/javascript" src="js/tree.js"></script>
    
    <div class="container">
  
      	 <div class="tabletile">会议报名登记表</div>
    <div class="showmsg"><?echo $showmsg?></div>
    
  	<form name="form1" method="post" action="" onsubmit="return checkdata()">
  		<div class="ttt">公司信息</div>
  			<table width="100%" border="0" align="center" cellpadding="2" cellspacing="1" >
			
				<tr bgcolor="#f1f1f1">
					<td align="center">单位名称</td>
					<td>
						<input type="text" name="company" id="company" size="30">&nbsp;<font color="#FF0000">*</font>						
					</td>
					<td align="center">单位类型</td>
			  	<td><select name='cotype' id="cotype">
       	   <option value="" selected="selected">－请选择－</option>
						<option value="棉花加工">棉花加工</option><option value="国产棉贸易">国产棉贸易</option><option value="进出口棉贸易">进出口棉贸易</option>
            <option value="纺织">纺织</option><option value="化纤">化纤</option><option value="服装">服装</option>
            <option value="仓储物流">仓储物流</option><option value="政府机构">政府机构</option><option value="媒体">媒体</option>
            <option value="金融">金融</option><option value="外资">外资</option><option value="机械">机械</option><option value="其他">其他</option>
					</select>&nbsp;<font color="#FF0000">*</font>
			  	</td>
			  	<td align="center">地 区</td>
					<td><select name='country'>
							<option value="" selected>－请选择－</option><option value="北京">北京</option><option value="上海">上海</option>
							<option value="天津">天津</option><option value="重庆">重庆</option><option value="黑龙江">黑龙江</option>
							<option value="吉林">吉林</option><option value="辽宁">辽宁</option><option value="内蒙古">内蒙古</option>
							<option value="新疆">新疆</option><option value="甘肃">甘肃</option><option value="西藏">西藏</option>
							<option value="河北">河北</option><option value="河南">河南</option><option value="湖北">湖北</option>
							<option value="湖南">湖南</option><option value="山东">山东</option><option value="浙江">浙江</option>
							<option value="江苏">江苏</option><option value="安徽">安徽</option><option value="广东">广东</option>
							<option value="广西">广西</option><option value="福建">福建</option><option value="宁夏">宁夏</option>
							<option value="四川">四川</option><option value="云南">云南</option><option value="贵州">贵州</option>
							<option value="陕西">陕西</option><option value="青海">青海</option><option value="山西">山西</option>
							<option value="江西">江西</option><option value="海南">海南</option><option value="香港">香港</option>
							<option value="澳门">澳门</option><option value="台湾">台湾</option><option value="其他">其他</option>
						</select>&nbsp;<font color="#FF0000">*</font></td>
				</tr>
				<tr bgcolor="#f1f1f1">
					<td align="center">联 系 人</td>
					<td><input name="linkman" type="text">&nbsp;<font color="#FF0000">*</font></td>
					<td align="center">联系人手机</td>
					<td><input name="linkmanmob" type="text" maxlength="11">&nbsp;<font color="#FF0000">*</font></td>
					<td align="center">备 注</td>
					<td><input name="bak" type="text"></td>
				</tr>
				<tr bgcolor="#f1f1f1">
					<td align="center">电 话</td>
					<td><input type="text" name="cotel"></td>
					<td align="center">传 真</td>
					<td><input type="text" name="cofax"></td>
					<td align="center">邮 箱</td>
					<td><input type="text" name="coemail"></td>
				</tr>
			</table>			
			
			<div class="ttt">参会人信息</div>		
						<table width="100%" border="0" cellpadding="2" cellspacing="1" >
						<tr bgcolor="#adadad" style="color:#fff;">
							<td  align="center">&nbsp;</td>
							<td  align="center">姓名</td>
    					<td  align="center">性别</td>
    					<td  align="center">职务</td>
    					<td  align="center">手机</td>
    					<!--td  align="center">房间标准</td>
  						<td  align="center">入住时间</td>
  						<td  align="center">离店时间</td-->
  					</tr>
  					<tr  bgcolor="#f1f1f1">
    					<td  align="center">1</td>
    					<td  align="center"><input name="name1" type="text" size="10" /></td>
    					<td  align="center"><input name="gender1" type="radio" value="男" checked="checked">男<input type="radio" name="gender1" value="女" />女</td>
    					<td  align="center"><input name="position1" type="text" size="10"></td>
    					<td  align="center"><input name="mobile1" type="text" size="16"></td>
    					<!--td  align="center"><select name="room1"><option value="不住宿" selected>不住宿</option><option value="标间合住">标间合住</option><option value="标间单住">标间单住</option><option value="大床房">大床房</option></select></td>
    					<td  align="center"><select name="inday1"><option value="" selected>-选择-</option><option value="16">16日</option><option value="17">17日</option><option value="18">18日</option><option value="19">19日</option></select></td>
      				<td  align="center"><select name="outday1"><option value="" selected>-选择-</option><option value="17">17日</option><option value="18">18日</option><option value="19">19日</option></select></td-->
   					</tr>
   					<tr  bgcolor="#f1f1f1">
    					<td  align="center">2</td>
    					<td  align="center"><input name="name2" type="text" size="10" /></td>
    					<td  align="center"><input name="gender2" type="radio" value="男" checked="checked">男<input type="radio" name="gender2" value="女" />女</td>
    					<td  align="center"><input name="position2" type="text" size="10"></td>
    					<td  align="center"><input name="mobile2" type="text" size="16"></td>
    					<!--td  align="center"><select name="room2"><option value="不住宿" selected>不住宿</option><option value="标间合住">标间合住</option><option value="标间单住">标间单住</option><option value="大床房">大床房</option></select></td>
    					<td  align="center"><select name="inday2"><option value="" selected>-选择-</option><option value="16">16日</option><option value="17">17日</option><option value="18">18日</option><option value="19">19日</option></select></td>
      				<td  align="center"><select name="outday2"><option value="" selected>-选择-</option><option value="17">17日</option><option value="18">18日</option><option value="19">19日</option></select></td-->
   					</tr>
   					<tr  bgcolor="#f1f1f1">
    					<td  align="center">3</td>
    					<td  align="center"><input name="name3" type="text" size="10" /></td>
    					<td  align="center"><input name="gender3" type="radio" value="男" checked="checked">男<input type="radio" name="gender3" value="女" />女</td>
    					<td  align="center"><input name="position3" type="text" size="10"></td>
    					<td  align="center"><input name="mobile3" type="text" size="16"></td>
    					<!--td  align="center"><select name="room3"><option value="不住宿" selected>不住宿</option><option value="标间合住">标间合住</option><option value="标间单住">标间单住</option><option value="大床房">大床房</option></select></td>
    					<td  align="center"><select name="inday3"><option value="" selected>-选择-</option><option value="16">16日</option><option value="17">17日</option><option value="18">18日</option><option value="19">19日</option></select></td>
      				<td  align="center"><select name="outday3"><option value="" selected>-选择-</option><option value="17">17日</option><option value="18">18日</option><option value="19">19日</option></select></td-->
   					</tr>
   					<tr  bgcolor="#f1f1f1">
    					<td  align="center">4</td>
    					<td  align="center"><input name="name4" type="text" size="10" /></td>
    					<td  align="center"><input name="gender4" type="radio" value="男" checked="checked">男<input type="radio" name="gender4" value="女" />女</td>
    					<td  align="center"><input name="position4" type="text" size="10"></td>
    					<td  align="center"><input name="mobile4" type="text" size="16"></td>
    					<!--td  align="center"><select name="room4"><option value="不住宿" selected>不住宿</option><option value="标间合住">标间合住</option><option value="标间单住">标间单住</option><option value="大床房">大床房</option></select></td>
    					<td  align="center"><select name="inday4"><option value="" selected>-选择-</option><option value="16">16日</option><option value="17">17日</option><option value="18">18日</option><option value="19">19日</option></select></td>
      				<td  align="center"><select name="outday4"><option value="" selected>-选择-</option><option value="17">17日</option><option value="18">18日</option><option value="19">19日</option></select></td-->
   					</tr>   					
						</table>
						
							<div class="ttt">发 票 信 息 （为了您开票的顺利，请完善下列发票信息）</div>
 <table width="100%" border="0" align="center" cellpadding="2" cellspacing="1">
			
				<tr bgcolor="#f1f1f1">
					<td align="center"><b> 发票类型</b></td>
					<td colspan="5">
						<select name="fapiao"><option value="" selected>-选择-</option><option value="增值税普通发票">增值税普通发票</option><option value="增值税专用发票">增值税专用发票</option></select>
        	</td>
      	</tr>
      	<tr bgcolor="#f1f1f1">
      		<td align="center"><b>发票抬头</b></td>
					<td colspan="5"><input name="fptaitou" type="text" size="50"></td>
		  	</tr>
				<tr bgcolor="#f1f1f1">
					<td align="center"><b>邮寄地址</b></td>
					<td colspan="5"><input name="fpsendadd" type="text" size="50"></td>
					</tr>
				<tr bgcolor="#f1f1f1">
					<td align="center"><b>单位名称</b></td>
					<td colspan="5"><input name="fpconame" type="text" size="50"></td>
				</tr>
				<tr bgcolor="#f1f1f1">
					<td align="center"><strong>单位地址</strong></td>
					<td colspan="5"><input name="fpadd" type="text" size="50"></td>
				</tr>
				<tr bgcolor="#f1f1f1">
					<td align="center"><b>统一社会信用代码<br>（或税务登记号）</b></td>
					<td colspan="5"><input name="sbh" type="text" size="30"></td>
				</tr>
				<tr bgcolor="#f1f1f1">
					<td align="center"><strong>电 话</strong></td>
					<td colspan="5"><input name="fptel" type="text" size="30">（区号-号码）</td>
				</tr>
				<tr bgcolor="#f1f1f1">
					<td align="center"><strong>开户银行</strong></td>
					<td colspan="5"><input name="bank" type="text" size="30"></td>
				</tr>
				<tr bgcolor="#f1f1f1">
					<td align="center"><b>账 号 </b></td>
					<td colspan="5"><input name="bankno" type="text" size="30"></td>
				</tr>
			</table>
						
			<!--div class="ttt">我想参加的活动</div>
				<div class="shuoming">
				<table width="100%" border="0" align="center" cellpadding="2" cellspacing="1">
				<tr><td colspan="6"><b>您希望讨论或者解答哪方面的问题或内容（请预先告知，以便安排）</b></td></tr>
				<tr><td colspan="6"><textarea name="bak1" cols="60" rows="4" id="bak1"></textarea></td></tr>
				</table>
					</div-->
		
				<table width="100%" border="0" align="center" cellpadding="2" cellspacing="1">
						<tr></tr>
				<tr>
      		<td height="40" colspan="10" align="center" >
	      		<input type="submit" name="Submit" class="btn1" value=" 提 交 ">
  	      	<input type="reset" name="Submit2" class="btn2"  value=" 重 置 ">
  	      	<input type="hidden" name="act" value="ins">
    	  	</td>
    		</tr>
			</table>				
  	</form>

    
    <div class="ttt">参会费用标准</div>
    <div class="shuoming">
（一）现场缴费：1500元（费用包含：会议费、19日晚餐、20日午餐和20日投资策略及风险管理对话晚宴及入场券）<br/>
（二）优惠方案：2017年10月17日17：00前报名并缴费，参会费用1200元（以实际缴费时间为准）。
						</div>
    
    <div class="ttt">汇款方式</div>
    <div class="shuoming">
					收款单位：北京棉花展望信息咨询有限责任公司<br/>
					开 户 行：中国银行北京金融街支行<br/>
					账　　号：340256024286<br/>
					</div>
					
	
    <div class="ttt">酒店订房联系：</div>

 <div class="shuoming">
<span style='font-weight:bold'>酒　　店：常州万豪酒店(主会场)</span><br/>
地　　址：中国江苏省常州市新北区龙锦路1590号 <br/>
预订电话：陈经理 18861115223，戈经理 18861115158 (房源紧张)<br/>
</div>
	<p>　　</p>
 <div class="shuoming">
<span style='font-weight:bold'>酒    店: 常州万达喜来登酒店：</span><br/>
地    址：新北区通江中路88-1号(近万达广场)<br/>
预订电话：18015077725  杨经理  报棉花会议<br/>
距离主会场酒店约520米<br/>
	</div>
		<p>　　</p>
 <div class="shuoming">
<span style='font-weight:bold'>酒     店：锦江都城酒店(常州新北万达广场店)</span><br/>
地     址：新北区通江中路88号万达广场8幢（喜来登西面） <br/> 
预订电话：15995047567韩经理  报棉花会议 协议价280/间(含双早)<br/>
距离主会场酒店约600米<br/>
	</div>
		<p>　　</p>
 <div class="shuoming">
<span style='font-weight:bold'>酒     店：桔子水晶酒店(常州新北万达广场店)</span><br/>
地     址:新北区通江中路229号友邦商务大厦B座<br/>
预订电话： 18861249899刘经理 报棉花会议 协议价280/间(含双早)<br/>
距离主会场酒店约900米<br/>
	</div>
		<p>　　</p>
 <div class="shuoming">
<span style='font-weight:bold'>酒   店：常州环球恐龙城维景国际大酒店</span><br/>
地   址：新北区 河海东路56号(国家5A级旅游景区——中华恐龙园)<br/>
预订电话：13915029087  张经理  报棉花会议 协议价400/间(含双早)<br/>
距离主会场酒店约4.4公里(距主会场万豪酒店12分钟车程)<br/>
	</div>
	<p>　　</p>
  </div> 
  
  
   
 <script type="text/javascript" src="js/zzs.js"></script>  	
   
</div> 		
</div>
	<div class="bottom_t cf"><script type="text/javascript" src="js/bottom_t.js"></script></div>
	<div class="bottom_b"><script type="text/javascript" src="js/bottom_b.js"></script></div>
</body>
</html>
