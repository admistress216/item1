<?php session_start(); ?>
<?php include_once("admin_permission.php") ?>
<?php include_once("admin_conn.php") ?>
<?php
$aid = strip_tags($_GET[aid],'');  //屏蔽title提交过来的特殊字符
$result = mysql_query("delete from wit_article where article_id='$aid' limit 1");
if ($result) {
	echo "<script>alert(\"删除成功!\")</script>";
	echo "<script>window.location=\"article_list.php\";</script>";
}else{
	echo "<script>alert(\"删除失败!\")</script>";
	echo "<script>window.location=\"article_list.php\";</script>";
}

?>