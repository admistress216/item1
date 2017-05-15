<?php
error_reporting(0);
$con = mysql_connect('localhost','root','');
if(!$con){echo "错误";}
mysql_select_db("gotools",$con);
mysql_query("SET character_set_connection=utf8, character_set_results=utf8, character_set_client=utf8", $con);
mysql_query("SET SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO'", $con);
?>