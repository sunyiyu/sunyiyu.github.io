<?
if($gs_wabx_adodb!=1){
	include('../wabx_adodb.inc');
	ADOLoadDB('mysql');
	$conn = &ADONewConnection();
}
include('../wabx_conn.inc');
include('../function.inc');
include('../template.inc');
include('../userlogin_ip.inc');
include('../weblogin.inc');
weblogin($uid,43,$REMOTE_ADDR);

//当前时间
$datee=getdate();
$y=$datee["year"];
$m=$datee["mon"];
if($m<10)	$m="0".$m;
$d=$datee["mday"];
if($d<10)	$d="0".$d;
$ho=$datee["hours"];
if($ho<10)	$ho="0".$ho;
$mi=$datee["minutes"];
if($mi<10)	$mi="0".$mi;
$se=$datee["seconds"];
if($se<10)	$se="0".$se;
$nowtime=$y."-".$m."-".$d." ".$ho.":".$mi.":".$se;

//公告 置顶
$rs=$conn->execute("select id,title,titledate,rank,content from news where titledate<'$nowtime' and relnews1='新疆监管16' and (relnews='交易通知' or relnews='交易公告' or relnews='政策公告') order by titledate desc limit 1");
$ggid=$rs->fields["id"];
$title=$rs->fields["title"];
$content=$rs->fields["content"];
if(strlen($content)>265)	$content=SubstrGb($content,265);	

$newstime=explode(" ",$rs->fields["titledate"]);
$rank=$rs->fields["rank"];
if($rank=="0" or $rank=="2" or $rank=="3" or $rank=="5"){	//网员区
	$gg_ontop="<a href='http://www.cottonchina.org/news/news_show.php?articleid=$ggid&newstime=$newstime[0]' target='_blank' class='a2'>$title</a>";
	$content="<a href='http://www.cottonchina.org/news/news_show.php?articleid=$ggid&newstime=$newstime[0]' target='_blank' class='a2'>".$content."</a>";	
}
if($rank=="1"){	//公开区
	$gg_ontop="<a href='http://www.cottonchina.org/news/pubzmb.php?articleid=$ggid&newstime=$newstime[0]' target='_blank'>$title</a>";
	$content="<a href='http://www.cottonchina.org/news/pubzmb.php?articleid=$ggid&newstime=$newstime[0]' target='_blank' class='a2'>".$content."</a>";
}

/*
$rs=$conn->execute("select id,title,titledate,date_format(titledate,'%m/%d') as showtime,rank,relnews,content from news where id<>'$ggid' and titledate<'$nowtime' and relnews1='新疆监管16' and (relnews='交易通知' or relnews='交易公告' or relnews='政策公告') order by titledate desc limit 8");
$i=1;
while($i<=8){
	$id=$rs->fields["id"];
	$title=$rs->fields["title"];
	if(strlen($title)>56)		$title=SubstrGb($title,56);
	$newstime=explode(" ",$rs->fields["titledate"]);
	$showtime=$rs->fields["showtime"];
	$rank=$rs->fields["rank"];
	if($rank=="0" or $rank=="2" or $rank=="3" or $rank=="5")	//网员区
		$gg.="<li><a href='http://www.cottonchina.org/news/news_show.php?articleid=$id&newstime=$newstime[0]' target='_blank' class='a2'>$title</a><span>$showtime</span></li>";
	if($rank=="1")	//公开区
		$gg.="<li><a href='http://www.cottonchina.org/news/pubzmb.php?articleid=$id&newstime=$newstime[0]' target='_blank' class='a1'>$title</a><span>$showtime</span></li>";
	$rs->movenext();
	$i++;
}
*/
//政策
/* 原来的第一条取消
$rs=$conn->execute("select id,title,content,rank,titledate from news where relnews1='新疆监管15' and relnews='政策解读' order by titledate desc limit 1");
$zcid=$title=$rs->fields["id"];
$title=$rs->fields["title"];
$ontopcontent=$rs->fields["content"];
$newstime=explode(" ",$rs->fields["titledate"]);
$rank=$rs->fields["rank"];
if($rank=='0' or $rank=='2' or $rank=='3' or $rank=='5')	//网员区
	$zc_top="<a href='http://www.cottonchina.org/news/news_show.php?articleid=$zcid&newstime=$newstime[0]' target='_blank'>$title</a>";
if($rank=='1')	//公开区
	$zc_top="<a href='http://www.cottonchina.org/news/pubzmb.php?articleid=$zcid&newstime=$newstime[0]' target='_blank'>$title</a>";
*/

/*
$rs=$conn->execute("select id,title,titledate,date_format(titledate,'%m/%d') as showtime,rank from news where titledate<'$nowtime' and relnews1='新疆监管16' and relnews='政策解读' order by titledate desc limit 8");
if(!$rs->EOF){
for($i=0;$i<8;$i++){
	$id=$rs->fields["id"];
	$title=$rs->fields["title"];
	$newstime=explode(" ",$rs->fields["titledate"]);
	$showtime=$rs->fields["showtime"];
	$rank=$rs->fields["rank"];
	if($rank=="0" or $rank=="2" or $rank=="3" or $rank=="5")	//网员区
		$zc.="<li><a href='http://www.cottonchina.org/news/news_show.php?articleid=$id&newstime=$newstime[0]' target='_blank' class='a2'>$title</a><span>$showtime</span></li>";
	if($rank=="1")	//公开区
		$zc.="<li><a href='http://www.cottonchina.org/news/pubzmb.php?articleid=$id&newstime=$newstime[0]' target='_blank'>$title</a><span>$showtime</span></li>";
	$rs->movenext();
}
}

//信息发布
$rs=$conn->execute("select id,title,titledate,date_format(titledate,'%m/%d') as showtime,rank from news where titledate<'$nowtime' and relnews='目标价格' order by titledate desc limit 12");
if(!$rs->EOF){
for($i=0;$i<12;$i++){
	$id=$rs->fields["id"];
	$title=$rs->fields["title"];
	if(strlen($title)>56)
		$title=SubstrGb($title,56)."...";
	$newstime=explode(" ",$rs->fields["titledate"]);
	$showtime=$rs->fields["showtime"];
	$rank=$rs->fields["rank"];
	if($rank=="0" or $rank=="2" or $rank=="3" or $rank=="5")	//网员区
		$xxfb.="<li><a href='http://www.cottonchina.org/news/news_show.php?articleid=$id&newstime=$newstime[0]' target='_blank' class='a1'>$title</a><span>$showtime</span></li>";
	if($rank=="1")
		$xxfb.="<li><a href='http://www.cottonchina.org/news/pubzmb.php?articleid=$id&newstime=$newstime[0]' target='_blank' class='a1'>$title</a><span>$showtime</span></li>";
	$rs->movenext();
}}
*/
//新疆监管仓库日最大预约量统计
$rs=$conn->execute("select sum(yyl) as yyl_add from cncexj_yuyue where year='2015'");
$yyl_add=$rs->fields["yyl_add"];

$rs=$conn->execute("select ck,yyl from cncexj_yuyue where year='2015' order by id asc");
$rnum=$rs->recordcount();
$yuyue="<DIV id='demo1'><table style='width:390px; text-align:left; font-size:14px; background:#f2f2f2' border='0' cellpadding='5' cellspacing='1'>";
for($i=1;$i<=$rnum;$i++){
	$ck=$rs->fields["ck"];
	$yyl=$rs->fields["yyl"];
	$yuyue.="<tr bgcolor='#ffffff' ><td width='70%'>$ck</td><td align='center'>$yyl</td></tr>";
	$rs->movenext();
}
$yuyue.="</table></DIV><DIV id='demo2'></DIV>";

/*
//资格认定加工企业-地区列表
$sql="select distinct area from cncexj_jiagong where id<>'' order by area asc";
$rs=$conn->Execute($sql);
$jiagong_area = "<select name='ser_area' style='HEIGHT: 20px; WIDTH: 80px'>";
$jiagong_area.= "<option value='' seleted>－地区－</option>";
if($rs->EOF)
	$jiagong_area.= "</select>";
else{
	while(!$rs->EOF){
		$b=$rs->fields["area"];
		$jiagong_area.="<option value='$b'>$b</option>";
	$rs->MoveNext();
	}
	$jiagong_area.="</select>";
}
*/
//2015新疆棉花专业仓储进度表
$rs=$conn->execute("select bjdate,jg,jy,rk,zk from cncexj_ccjd where year='2015' order by bjdate desc limit 1");
$id=$rs->fields["id"];
$ccjd_bjdate=$rs->fields["bjdate"];
//$ccjd_jg=round($rs->fields["jg"]/10000,2);
//$ccjd_rk_sj=round($rs->fields["rk_sj"]/10000,2);
$ccjd_jg=$rs->fields["jg"];
$ccjd_jy=$rs->fields["jy"];
$ccjd_rk=$rs->fields["rk"];
$ccjd_zk=$rs->fields["zk"];

$conn->close();

$t = new Template("./");
$t->set_file(array("page"=>"index_mb.html"));
$t->set_var(array(
				"gg_ontop"=>$gg_ontop,
				"content"=>$content,				
				"gg"=>$gg,
				"zc"=>$zc,
				"xxfb"=>$xxfb,

				"yyl_add"=>$yyl_add,
				"yuyue"=>$yuyue,
				"jiagong_area"=>$jiagong_area,

				"ccjd_bjdate"=>$ccjd_bjdate,
				"ccjd_jg"=>$ccjd_jg,
				"ccjd_jy"=>$ccjd_jy,
				"ccjd_rk"=>$ccjd_rk,
				"ccjd_zk"=>$ccjd_zk,

				));
$t->pparse("CONTENT","page");
?>
