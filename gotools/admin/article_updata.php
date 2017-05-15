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
$id = strip_tags($_POST[id],'');
$article_title = strip_tags($_POST[article_title],'');  
$article_channel = strip_tags($_POST[article_channel],'');  
$article_authors = strip_tags($_POST[article_authors],'');  
$article_date = strip_tags($_POST[article_date],'');
$article_intro = strip_tags($_POST[article_intro],'');
$article_url = strip_tags($_POST[article_url],'');
$article_imgurl = strip_tags($_POST[article_imgurl],'');
$article_top = strip_tags($_POST[article_top],'');
$article_click = strip_tags($_POST[article_click],'');
$article_keyword = strip_tags($_POST[article_keyword],'');
$article_content = $_POST[article_content];

$sql = "
UPDATE `gotools`.`wit_article` SET 
`article_title` = '$article_title',
`article_channel` = '$article_channel',
`article_intro` = '$article_intro',
`article_authors` = '$article_authors',
`article_content` = '$article_content',
`article_date` = '$article_date',
`article_url` = '$article_url',
`article_imgurl` = '$article_imgurl',
`article_keyword` = '$article_keyword',
`article_click` = '$article_click',
`article_top` = '$article_top',
`article_comment` = '$article_comment' WHERE `wit_article`.`article_id` ='$id' LIMIT 1 ;
";
if (!mysql_query($sql,$con))
{die ("<br /><br />错误!". mysql_error()); }
echo "<script>alert(\"修改成功!\")</script>";
echo "<script>window.location=\"article_list.php\";</script>";

?>
</body>
</html>