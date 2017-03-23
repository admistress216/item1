<?php session_start(); ?>
<html>
<head>
<title>站长工具管理系统-后台-内容添加</title>
<meta http-equiv=Content-Type content="text/html;charset=utf-8">
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php include_once("admin_permission.php") ?>
<?php include_once("admin_conn.php") ?>
<?php
    
$article_title = strip_tags($_POST[article_title],'');  
$article_channel = strip_tags($_POST[article_channel],'');  
$article_intro = strip_tags($_POST[article_intro],'');
$article_url = strip_tags($_POST[article_url],'');
$article_top = strip_tags($_POST[article_top],'');
$article_click = strip_tags($_POST[article_click],'');
$article_imgurl = strip_tags($_POST[article_imgurl],'');
$article_keyword = strip_tags($_POST[article_keyword],'');
$article_content = $_POST[article_content];


$sql = "INSERT INTO `gotools`.`wit_article` (article_title,article_channel,article_intro,article_url,article_top,article_click,article_imgurl,article_keyword,article_content)
VALUES ('$article_title','$article_channel','$article_intro','$article_url','$article_top','$article_click','$article_imgurl','$article_keyword','$article_content')";
if (!mysql_query($sql,$con))
{die ("<br /><br />错误!". mysql_error()); }
echo "<script>alert(\"添加成功!\")</script>";
echo "<script>window.location=\"article_list.php\";</script>";
?>
</body>
</html>