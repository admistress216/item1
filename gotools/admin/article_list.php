<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>站长工具管理系统-后台-内容列表</title>
<link href="images/admin.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php include_once("admin_permission.php") ?>
<?php include_once("admin_conn.php") ?>
<div class="all">
  <div class="all_top"></div>
	<div class="main">
    	<div class="main_top"></div>
        <div class="main_txt">
			<?php include_once("admin_left.php") ?>
            <div class="right">
            	<div class="ra_article"></div>
                <div class="rb">
                	<div class="serach">
					    <form action="article_list.php" method="POST"> 
						<p>注释:按分类和内容标题搜索.</p>
                        <select name="schannel">
						<?php include_once("article_channel.php") ?>
                        </select>
                        <input name="sarticle" type="text" />
                        <input  type="submit" class="button" value="搜索"/>
    					</form>
                    </div>
                <!--表格内容开始-->
					<div class="list_table">
					<table id="mytable" cellspacing="0">
					<tr>
					<th class="add_ID">ID</th>
					<th class="add_channel">分类</th>
					<th class="add_title">名称</th>
					<th class="add_datetime">相关</th>
					<th class="add_click">点击</th>
					<th class="add_action">操作</th>
					</tr>
					<?php	
						$schannel = strip_tags($_POST[schannel],''); 	
						$sarticle = strip_tags($_POST[sarticle],''); 
						//数组输出
						
						$page=isset($_GET['page'])?intval($_GET['page']):1;
						$num=20;   
						//连接数据库
						$con = mysql_connect('localhost','root','');
						if(!$con){echo "错误";}
						mysql_select_db("gotools",$con);
						mysql_query("SET character_set_connection=utf8, character_set_results=utf8, character_set_client=utf8", $con);
						mysql_query("SET SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO'", $con);
						$Number=mysql_query("select * from wit_article"); //查询需要的数据库表条数
						$total=mysql_num_rows($Number); //查询所有的数据
						$url='article_list.php'; //获取本页URL
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
						
						/*For($i=1;$i<=$pagenum;$i++){		
						       $show=($i!=$page)?"<a href='$url?page=".$i."'>$i</a>":"<b style=\"color:red;\">$i</b>";
						       $pagenav.= $show . "&nbsp;";
						}*/

						if($nextpg) $pagenav.=" <a href=\"$url?page=$nextpg\">[后页]</a> "; else $pagenav.=" [后页] ";
						$pagenav.=" <a href=\"$url?page=$pagenum\">[尾页]</a> ";
						$pagenav.=" 当前第 $page/$pagenum 页,共" .$total."条记录";
						$pagenav.="</div>";
						//假如传入的页数参数大于总页数，则显示错误信息
							
						If($page>$pagenum){
						       Echo "Error : Can Not Found The page ".$page;
						       Exit;
						}
						$info=mysql_query("SELECT DISTINCT article_id,channel_name,article_title,article_date,article_click FROM wit_article,wit_channel where wit_article.article_channel =  wit_channel.channel_id and article_title like '%$sarticle%' and article_channel like '%$schannel%' order by article_id desc limit $offset,$num");

					While($row=mysql_fetch_array($info)){
						echo "<tr>";
						echo "<td class=\"add_ID td_one\">" . $row['article_id'] . "</td>";
						echo "<td class=\"add_channel\">" . $row['channel_name'] . "</td>";
						echo "<td class=\"add_title\">" . substr($row['article_title'],0,65) . "</td>";
						echo "<td class=\"add_datetime\">" . substr($row['article_keyword'],0,10) . "</td>"; //取字符串长度从0位到10位之间.
						echo "<td class=\"add_click\">" . $row['article_click'] . "</td>";
						echo "<td class=\"add_action\"><a href=\"article_edit.php?aid=" . $row['article_id'] . "\">编辑</a> <a href=\"article_del.php?aid=" . $row['article_id'] . "\" onclick=\"if(!confirm( '确认要删除吗? ')){return false;}\" >删除</a></td>";
						echo "</tr>";
					}
					?>
					</table>
					</div>
                <!--表格内容结束-->
              		<div class="page"><p><?php echo $pagenav; ?></p></div>
                </div>
            </div>
        </div>
    </div>
    <div class="all_foot"></div>
     <div class="all_foot2">版权所有:<a href="http://www.gom6.com">GO代理</a> GO工具管理系统V1.0 采用WITCMS后台</div>
</div>

</body>
</html>
