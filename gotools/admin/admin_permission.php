<meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
<?php
error_reporting(0);
session_start();
if(isset($_SESSION['username']))
{
@mysql_connect("localhost", "root","")   
or die("数据库服务器连接失败");
@mysql_select_db("gotools")     
or die("数据库不存在或不可用");
$username = $_SESSION['username'];
$query = @mysql_query("select username, userflag from wit_admin "
."where username = '$username' and password = '$password'")
or die("SQL语句执行失败");
$row = mysql_fetch_array($query);
if($row['userflag'] != $_SESSION['userflag'])
{
   $_SESSION['userflag'] = $row['userflag'];
}
if($_SESSION['userflag'] == 1){}
}
else
{
echo "<script>alert(\"权限不足3!\")</script>";
echo "<script>window.location=\"index.php\";</script>";
exit;
}
?>