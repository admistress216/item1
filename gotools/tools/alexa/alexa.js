
var $jq = jQuery.noConflict();

$jq(document).ready(function(){
	$jq("form#alexa").submit(function(){
		if($jq(".input_1").val()==""){alert("Error: Query contents can't for empty!");return false;}
		$jq('#show').empty();
		$jq('#show').append("<br><br><center><img src='./images/ajax-loader.gif'><br>请稍候，正在查询......</center>");
		$jq.post("message.php",{word:$jq("#word").val()},function(Date){
			$jq('#show').empty();
			$jq('#show').html(Date);
		});
		$jq(this).bind("submit", function(){ return false; });
	});
	$jq('.urls').click(function(){
		var b = $jq(this).text();
		$jq(".input_1").val(b);
		return false;
	});
});

