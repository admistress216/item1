<?php
header("Content-Type:text/html;charset=UTF-8");
require_once 'Textclass.php';
$word=trim($_POST['word']);
$word = __urljudge(str_replace('http://', '', $word));
$content=array(url=>$word,ip=>$ip,time=>time());
$text_class->add_line($content);
function _url($Date){
	$ch = curl_init();
	$timeout = 5;
	curl_setopt ($ch, CURLOPT_URL, "$Date");
	curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt ($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)");
	curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
	$contents = curl_exec($ch);
	curl_close($ch);
	return $contents;
}
$url="http://data.alexa.com/data/+wQ411en8000lA?cli=10&dat=snba&ver=7.0&cdt=alx_vw=20&wid=12206&act=00000000000&ss=1680x1050&bw=964&t=0&ttl=35371&vis=1&rq=4&url=$word";
$contents.=_url($url);
$contents=str_replace('<a href="/','<a href="http://www.alexa.com/',$contents);
$contents = iconv("UTF-8","UTF-8//TRANSLIT",$contents);
preg_match_all("/<POPULARITY URL=\"(.*?)\" TEXT=\"(.*?)\"\/>/is",$contents,$num);
if($num[1][0]==""){
	preg_match_all("/<div class=\"data down\">(.*?)<\/a><\/div>/is",$contents,$num);
}
preg_match_all("/<CREATED DATE=\"(.*?)\" DAY=\"(.*?)\" MONTH=\"(.*?)\" YEAR=\"(.*?)\"\/>/is",$contents,$date);
preg_match_all("/<EMAIL ADDR=\"(.*?)\"\/>/is",$contents,$mail);
preg_match_all("/<LINKSIN NUM=\"(.*?)\"\/>/is",$contents,$link);
preg_match_all("/<ADDR STREET=\"(.*?)\" CITY=\"(.*?)\" STATE=\"(.*?)\" ZIP=\"(.*?)\" COUNTRY=\"(.*?)\" \/>/is",$contents,$user);
preg_match_all("/<CAT ID=\"(.*?)\" TITLE=\"(.*?)\" CID=\"(.*?)\"\/>/is",$contents,$type);
preg_match_all("/<SITE BASE=\"(.*?)\" TITLE=\"(.*?)\" DESC=\"(.*?)\">/is",$contents,$jianjie);
?>
<div >
	<div >您查询的网址：<b><?php echo $word;?></b> 在Alexa上的综合排名第<?php echo $num[2][0];?> 位</div>
	<div><b>名称：</b><?php echo $num[1][0]?></div>
	<div><b>排名：</b><?php echo $num[2][0];?></div>
	<div><b>收录日期：</b><?php if(empty($date[1][0]))$date[1][0]='不详';echo $date[1][0];?></div>
	<div><b>邮箱：</b><?php if(empty($mail[1][0]))$mail[1][0]='不详';echo $mail[1][0];?></div>
	<div><b>反向链接：</b><?php if(empty($link[1][0]))$link[1][0]='不详';echo strip_tags($link[1][0]);?></div>
	<div><b>联系方式：</b><?php if(empty($user[1][0]))$user[1][0]='不详';echo $user[1][0].$user[2][0].$user[3][0]?></div>
	<div><b>分类目录：</b><?php if(empty($type[1][0]))$type[1][0]='不详';echo $type[1][0]?></div>
	<div><b>简介：</b><?php if(empty($jianjie[3][0]))$jianjie[3][0]='不详';echo $jianjie[3][0]?></div>
</div>
<div></div>
<div>
	<div>网站综合排名走势图</div>
	<table width="560" cellspacing="0">
		<tr>
			<td><a OnClick="document.all.rank1.style.display='';document.all.rank2.style.display='none';document.all.rank3.style.display='none';document.all.rank4.style.display='none';document.all.rank5.style.display='none';" style="cursor:hand">六个月平均排名</a></td>
			<td><a OnClick="document.all.rank1.style.display='none';document.all.rank2.style.display='';document.all.rank3.style.display='none';document.all.rank4.style.display='none';document.all.rank5.style.display='none';"style="cursor:hand">三个月平均排名</a></td>
			<td><a OnClick="document.all.rank1.style.display='none';document.all.rank2.style.display='none';document.all.rank3.style.display='';document.all.rank4.style.display='none';document.all.rank5.style.display='none';"style="cursor:hand">一个月平均排名</a></td>
			<td><a OnClick="document.all.rank1.style.display='none';document.all.rank2.style.display='none';document.all.rank3.style.display='none';document.all.rank4.style.display='';document.all.rank5.style.display='none';"style="cursor:hand">半个月平均排名</a></td>
			<td><a OnClick="document.all.rank1.style.display='none';document.all.rank2.style.display='none';document.all.rank3.style.display='none';document.all.rank4.style.display='none';document.all.rank5.style.display='';"style="cursor:hand">一星期平均排名</a></td>
		</tr>
		<tr>
			<td colspan="5">
			<div id="rank1"><img src="http://traffic.alexa.com/graph?w=560&h=280&r=6m&y=t&u=<?php echo $word;?>" alt=" 如果看不到图片，请单击右键选择 [显示图片] "></div>
			<div id="rank2" style="display:none"><img src="http://traffic.alexa.com/graph?w=560&h=280&r=3m&y=t&u=<?php echo $word;?>" alt=" 如果看不到图片，请单击右键选择 [显示图片] "></div>
			<div id="rank3" style="display:none"><img src="http://traffic.alexa.com/graph?w=560&h=280&r=1m&y=t&u=<?php echo $word;?>" alt=" 如果看不到图片，请单击右键选择 [显示图片] "></div>
			<div id="rank4" style="display:none"><img src="http://traffic.alexa.com/graph?w=560&h=280&r=15.0m&y=t&u=<?php echo $word;?>" alt=" 如果看不到图片，请单击右键选择 [显示图片] "></div>
			<div id="rank5" style="display:none"><img src="http://traffic.alexa.com/graph?w=560&h=280&r=7.0m&y=t&u=<?php echo $word;?>" alt=" 如果看不到图片，请单击右键选择 [显示图片] "></div>
			</td>
		</tr>
	</table>
</div>