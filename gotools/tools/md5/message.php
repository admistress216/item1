<?php
header("Content-Type:text/html;charset=UTF-8");
$word=trim($_POST['word']);
$radi=trim($_POST['radi']);
$rado=trim($_POST['rado']);
if($radi=="md16"){
$word=substr(md5($word),8,16);}else{
$word=md5($word);};
if($rado=="mdd"){
$word=strtoupper($word);};
echo $word;
 
?>