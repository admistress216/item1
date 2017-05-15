
var $jq = jQuery.noConflict();
var $radio1 = "md32";
var $radio2 = "mdx";
$jq(document).ready(function(){
    $jq("#copy").click(function(){
	clipboardData.setData("text",$jq("#uinput").val());
	return false;});
	$jq("#r1").click(function(){$radio1 = "md16"});
	$jq("#r2").click(function(){$radio1 = "md32"});
	$jq("#r3").click(function(){$radio2 = "mdd"});
	$jq("#r4").click(function(){$radio2 = "mdx"});
	$jq("form#md5").submit(function(){
		if($jq("#uinput").val()==""){alert("Error: Query contents can't for empty!");return false;}
		$jq.post("message.php",{word:$jq("#uinput").val(),radi:$radio1,rado:$radio2},function(Date){
			$jq('#uinput').val(Date);
		});
		$jq(this).bind("submit", function(){ return false; });
	});
});

