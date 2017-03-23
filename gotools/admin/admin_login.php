<?php include_once("admin_conn.php") ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
<?php
//获取用户输入
$username = $_POST['username'];
$password = md5($_POST['password']);
//执行SQL语句获得Session的值
$query = @mysql_query("select username, userflag from wit_admin "
."where username = '$username' and password = '$password'")
or die("SQL语句执行失败");
//判断用户是否存在，密码是否正确
if($row = mysql_fetch_array($query)){
session_start();        //标志Session的开始
//判断用户的权限信息是否有效，如果为1或0则说明有效
	if($row['userflag'] == 1){
	   $_SESSION['username'] = $row['username'];
	   $_SESSION['userflag'] = $row['userflag'];
	   echo "<script>alert(\"登录成功!\")</script>";
	   echo "<script>window.location=\"admin_index.php\";</script>";
	}else{
	echo "<script>alert(\"权限不足!\")</script>";echo "<script>window.location=\"index.php\";</script>";exit;
	}
}
else{
echo "<script>alert(\"用户和密码不正确!\")</script>";echo "<script>window.location=\"index.php\";</script>";exit;
}
?>