<?php include_once("admin/admin_conn.php") ?>
<?php				$result = mysql_query("select * from wit_system where system_id=1"); 
					while($row=mysql_fetch_array($result)){
$systemweb=$row['system_web'];
$systemurl=$row['system_url'];
$systemkey=$row['system_key'];
$description=$row['system_description'];
$copyright=$row['system_copyright'];
$icp=$row['system_icp'];
}

/*
* $channel 是频道ID
* $id 是内容ID
* $count 是条数
* $b_num 是字节数
*/
///////////////////////////////////读取内容列表函数样式一方法: s01(频道id,文章ID"0代表所有",显示条数,显示字数);适合不分页/////////////////////////////////
function s01($channel,$id,$count,$b_num){
	if($id<>0){
		$info=mysql_query("SELECT * FROM `wit_article` WHERE `article_channel` = $channel and `article_id` = $id  LIMIT 0 , $count ");
	}else{
		$info=mysql_query("SELECT * FROM `wit_article` WHERE `article_channel` =$channel LIMIT 0 , $count ");
	}
	echo "<ul class=\"select_01\">";
	while($row=mysql_fetch_array($info)){
	echo "<li class=\"row\">" . "<span class=\"article_title\">ID:[" .$row['article_id'] ."]<a href=\"article.php?aid=" . $row['article_id'] . "\" />".substr($row['article_title'],0,$b_num) . "</a></span>" . "<span class=\"article_date\">" . substr($row['article_date'],0,10) ."</span>". "</li>";
	}
	echo "</ul>";
}

///////////////////////////////////读取内容列表函数样式二方法: s02(频道id,文章ID"0代表所有",显示条数,显示字数);适合分页//////////////////////////////////////
function s02($channel,$id,$count,$b_num){
$page=isset($_GET['page'])?intval($_GET['page']):1;
$num=$count;   
//连接数据库
$con = mysql_connect('localhost','root','');
if(!$con){echo "错误";}
mysql_select_db("gotools",$con);
mysql_query("SET character_set_connection=utf8, character_set_results=utf8, character_set_client=utf8", $con);
mysql_query("SET SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO'", $con);
$Number=mysql_query("select * from wit_article"); //查询需要的数据库表条数
$total=mysql_num_rows($Number); //查询所有的数据
$url='index.php'; //获取本页URL
//页码计算
$pagenum=ceil($total/$num); //获得总页数,也是最后一页
$page=min($pagenum,$page);//获得首页
$prepg=$page-1;//上一页
$nextpg=($page==$pagenum ? 0 : $page+1);//下一页
$offset=($page-1)*$num; //获取limit的第一个参数的值，假如第一页则为(1-1)*10=0,第二页为(2-1)*10=10。

if($pagenum<1) return false;
$pagenav.="<div class=\"pagenav\">";
$pagenav.=" <a href=\"$url?page=1\">[首页]</a> ";
if($prepg) $pagenav.=" <a href=\"$url?page=$prepg\">[前页]</a> "; else $pagenav.=" [前页] ";
//For($i=1;$i<=$pagenum;$i++){		
//       $show=($i!=$page)?"<a href='$url?page=".$i."'>$i</a>":"<b style=\"color:red;\">$i</b>";
//       $pagenav.= $show . "&nbsp;";
//}
if($nextpg) $pagenav.=" <a href=\"$url?page=$nextpg\">[后页]</a> "; else $pagenav.=" [后页] ";
$pagenav.=" <a href=\"$url?page=$pagenum\">[尾页]</a> ";
$pagenav.=" 当前第 $page/$pagenum 页,共" .$total."条记录";
$pagenav.="</div>";
//假如传入的页数参数大于总页数，则显示错误信息
If($page>$pagenum){
       Echo "Error : Can Not Found The page ".$page;
       Exit;
}

if($id<>0){
		$info=mysql_query("SELECT * FROM `wit_article` WHERE `article_channel` = $channel and `article_id` = $id  order by article_id asc limit $offset,$num ");
	}else{
		$info=mysql_query("SELECT * FROM `wit_article` WHERE `article_channel` =$channel order by article_id asc limit $offset,$num ");
	}
	echo "<ul class=\"select_01\">";
	while($row=mysql_fetch_array($info)){
	echo "<li class=\"row\">" . "<span class=\"article_title\">ID:[" .$row['article_id'] ."]<a href=\"article.php?aid=" . $row['article_id'] . "\" />".substr($row['article_title'],0,$b_num) . "</a></span>" . "<span class=\"article_date\">" . substr($row['article_date'],0,10) ."</span>". "</li>";
	}
	echo "</ul>";
	echo $pagenav;//输出分页导航
}

///////////////////////////////////单独读取内容函数样式三方法: s03(频道id,文章ID"0代表所有",显示内容字数);适合不分页/////////////////////////////////
function s03($channel,$id,$b_num){
	if($id==0 && $id<0){
		echo "请选择一个内容ID!";
	}else{
		$info=mysql_query("SELECT * FROM `wit_article` WHERE `article_id` =$id AND `article_channel` =$channel ");
	}
	while($row=mysql_fetch_array($info)){
	echo "<p><strong>" . substr($row['article_title'],0,100) . "</strong></p>";
	echo "<p>" . substr($row['article_content'],0,$b_num) . "</p>";
	}
}

///////////////////////////////////article.php读取内容/////////////////////////////////
function s04(){	
	$aid = strip_tags($_GET[aid],''); //获取内容Id,屏蔽特殊字符
	$info=mysql_query("SELECT * FROM `wit_article` WHERE `article_id` = '$aid' ");
	while($row=mysql_fetch_array($info)){
	echo "<p><strong style=\"font-size:16px;\">" . $row['article_title'] . "</strong></p>";
	echo "作者:" . $row['article_authors'] . " 日期:" . substr($row['article_date'],0,10) ;
	echo "<hr>";
	echo "<p>" . $row['article_content'] . "</p>";
	}
}

function tctools($top,$count){
$info=mysql_query("SELECT * FROM `wit_article` WHERE `article_top` = $top  LIMIT 0 , $count ");
while($row=mysql_fetch_array($info)){
echo '<LI>';
echo '<DIV class="tools-ico-shadow">';
echo '<DIV class="'.$row['article_imgurl'].'"> ' ;                         
echo '<A href="'.$row['article_url'].'"></A> ';           
echo '</DIV>';
echo '</DIV>';
echo '<P class="tools-name">';
echo '<A href="'.$row['article_url'].'">'   ;                      
echo  $row['article_title'];
echo '</A>';
echo '</P>';
echo '<P class="tools-intro">'.$row['article_intro'].'</P>';
echo '<DIV class="handle-bar">';
echo '<A class="handle-add" href="javascript://" title="添加到&quot;我的工具&quot;" onclick="return AddTool('.$row['article_id'].');"><SPAN>添加到"我的工具"</SPAN>';
echo '</A>';										
echo '</DIV>';
echo '</LI>';
}
}
///////////////////////////////////单独读取内容函数样式三方法: tools(分类id"0表示所有分类",工具ID"0代表所有",显示内容字数);适合不分页/////////////////////////////////
function tools($channel,$id,$count,$b_num){
	if($channel==0){
		 $info=mysql_query("SELECT * FROM `wit_article` LIMIT 0 , $count ");
	}else{
	if($id<>0){
		$info=mysql_query("SELECT * FROM `wit_article` WHERE `article_channel` = $channel and `article_id` = $id  LIMIT 0 , $count ");
	}else{
		$info=mysql_query("SELECT * FROM `wit_article` WHERE `article_channel` =$channel LIMIT 0 , $count ");
	}}
	while($row=mysql_fetch_array($info)){
echo '<LI>';
echo '<DIV class="tools-ico-shadow">';
echo '<DIV class="'.$row['article_imgurl'].'"> ' ;                         
echo '<A href="'.$row['article_url'].'"></A> ';           
echo '</DIV>';
echo '</DIV>';
echo '<P class="tools-name">';
echo '<A href="'.$row['article_url'].'">'   ;                      
echo  $row['article_title'];
echo '</A>';
echo '</P>';
echo '<P class="tools-intro">'.$row['article_intro'].'</P>';
echo '<DIV class="handle-bar">';
echo '<A class="handle-add" href="javascript://" title="添加到&quot;我的工具&quot;" onclick="return AddTool('.$row['article_id'].');"><SPAN>添加到"我的工具"</SPAN>';
echo '</A>';										
echo '</DIV>';
echo '</LI>';
}
}

///////////////////////////////////单独读取内容函数样式三方法: mytools($tools工具类数组，每个ID用","分开）;适合不分页/////////////////////////////////
function mytools($tools){
    $i=0;
	$list = split(",",$tools);
	foreach($list as $aid){
	$info=mysql_query("SELECT * FROM `wit_article` WHERE `article_id` = '$aid' ");
$row=mysql_fetch_array($info);
echo '<li id="tools_'.$i.'" rel="'.$row['article_id'].'"> ';
echo '<div class="tools-ico-shadow"> ';
echo '<div class="'.$row['article_imgurl'].'">	';
echo '<a href="'.$row['article_url'].'"></a> ';
echo '</div> ';
echo '</div> ';
echo '<p class="tools-name"> ';
echo '<a href="'.$row['article_url'].'">'.$row['article_title'].'</a></p> ';
echo '<p class="tools-intro">'.$row['article_intro'].'</p> ';
echo '<div class="handle-bar"> ';
echo '<a class="handle-move" href="javascript://" title="拖动"><span>拖动</span></a> ';
echo '<a class="handle-dele" href="javascript://" title="移除"><span>移除</span></a> ';
echo '</div> ';
echo '</li> ';
$i=$i+1;}
}

///////////////////////////////////单独读取内容函数样式三方法: sidetools(文章ID"0代表所有",显示条数);适合不分页/////////////////////////////////
function sidetools($id,$count){
	if($id<>0){
		$info=mysql_query("SELECT * FROM `wit_article` WHERE `article_id` = $id LIMIT 0 , $count ");
		$row=mysql_fetch_array($info);
		$key=split(',',$row[article_keyword]);
	foreach($key as $aid){
		$info=mysql_query("SELECT * FROM `wit_article` WHERE `article_id` = '$aid' ");
		$row=mysql_fetch_array($info);
		echo '<LI><A href="'.$row['article_url'].'">'.$row['article_title'].'</A></LI>';
		}
	}else{
		$info=mysql_query("SELECT * FROM `wit_article` ORDER BY RAND() LIMIT 0 ,$count ");
		};
	while($row=mysql_fetch_array($info)){
echo '<LI><A href="'.$row['article_url'].'">'.$row['article_title'].'</A></LI>';
}
}

function toolslist(){
        $i=1;
		$info=mysql_query("SELECT * FROM `wit_channel` LIMIT 0 , 30 ");
		echo '<DIV id="tools_all_class" class="class-list"><UL><LI class="current"><A onclick="selectTag1(\'all_tools0\',this)" href="#">所有工具</A></LI>';
		while($row=mysql_fetch_array($info)){
		echo '<LI><A onclick="selectTag1(\'all_tools'.$i.'\',this)" href="#">'.$row['channel_name'].'</A></LI>';
		$i=$i+1;
		};
        echo '</UL></DIV>';
		}
		
function divlist(){
$i=1;
		$info=mysql_query("SELECT * FROM `wit_channel` LIMIT 0 , 30 ");
		while($row=mysql_fetch_array($info)){
echo '<DIV id="all_tools'.$i.'">';
echo '		<DIV class="text-right gray pb5 hide">';
echo '		<A href="'.$systemurl.'/?ac=all#">图标显示</A> | <A href="'.$systemurl.'/?ac=all#">列表显示</A>';
echo '		</DIV>';
echo '		<UL id="my_tools" class="tools-list clearfix">';
$divlist=tools($row['channel_id'],0,20,100);
echo $divlist;
echo '		</UL>';
echo '        </DIV>';
$i=$i+1;
		}
		
		}
?>