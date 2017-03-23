<?php 
require_once 'Textclass.php';
$history=$text_class->openFile();
sort($history,SORT_DESC);
?>

<script src="alexa.js" type="text/javascript"></script>


<div >
	<div style="border-bottom:1px #a8c5ee solid;">
	<DIV style="overflow:hidden;padding:10px 0 10px 120px;">
	<form action="" id="alexa">
  	<SPAN style="float:left;padding:6px;"><H5>网址：HTTP://www.</H5></SPAN><input type="text" name="message" style="float:left;margin-right:8px;"class="text-input blue-input" id="word">
  	<SPAN STYLE="border:1px #a8c5ee solid;float:left;padding:1px;margin-right:8px"><input type="submit"   name="Submity"  class="button" value=" 提交 "></SPAN>
  	<SPAN STYLE="border:1px #a8c5ee solid;float:left;padding:1px;"><input   type="reset"   name="Submit2"  class="button a_button" value=" 重置 "></SPAN>
  	</form>
	</DIV>
	</div>
	<div id="show"  style="padding:10px 0 10px 70px;"><center>
	  本工具直接读取Alexa官方数据，请耐心等待。
	</center></div>
	<div></div>
	<div style="border-top:1px #a8c5ee solid;padding:10px 20px 40px 20px;">
	<p><b>24小时查询历史</b></p>
	<div id="leftcontent_2">
	<?php if ($history){
		foreach ($history as $val){
			echo "<span STYLE=\"float:left;padding:1px;margin-right:5px\"><a href=http://$val[0]>".$val[0]."</a></span>";
		}
	}else{
		echo "<br><p>暂无记录</p>";
	}
	?></div>
	</div>
</div>

