<?php session_start();?>
<html>
<head>
<title>注销</title>
<meta http-equiv=Content-Type content="text/html;charset=utf-8">
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php include_once("admin_conn.php") ?>
<?php
unset($_SESSION['username']);
unset($_SESSION['password']);
unset($_SESSION['userflag']);
echo "<script>alert(\"注销成功!\")</script>";
echo "<script>window.location=\"index.php\";</script>";
?>
</body>
</html>