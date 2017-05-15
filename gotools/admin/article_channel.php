<?php include_once("admin_conn.php") ?>
<option value="">全部内容</option>
<?php

$channelx=mysql_query("SELECT * FROM `wit_channel`");
While($rowx=mysql_fetch_array($channelx)){
if ($row['article_channel'] == $rowx['channel_id']){
echo "<option value=\"" . $rowx['channel_id'] . "\"  selected=\"selected\">";
}else{
echo "<option value=\"" . $rowx['channel_id'] . "\">";
}

echo $rowx['channel_name'];
echo "</option>";
}
?>
