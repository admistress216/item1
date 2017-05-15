<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml"><HEAD><META http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?php include_once("inc/function.php") ?>
<?php
function getIP ()
{
global $_SERVER;
if (getenv('HTTP_CLIENT_IP')) {
$ip = getenv('HTTP_CLIENT_IP');
} 
else if (getenv('HTTP_X_FORWARDED_FOR')) {
$ip = getenv('HTTP_X_FORWARDED_FOR');
} 
else if (getenv('REMOTE_ADDR')) {
$ip = getenv('REMOTE_ADDR');
} 
else {
$ip = $_SERVER['REMOTE_ADDR'];
}
return $ip;
}
$ip=getIP();
?>

<META name="keywords" content="">
<META name="description" content="">
<META http-equiv="X-UA-Compatible" content="IE=EmulateIE7">
<LINK type="text/css" rel="stylesheet" href="<?php echo $systemurl?>/static/main.css">
<LINK type="text/css" rel="stylesheet" href="<?php echo $systemurl?>/static/icon.css">
<LINK rel="search" type="application/opensearchdescription+xml" href="" title="<?php echo $systemweb?>">
<SCRIPT src="<?php echo $systemurl?>/static/jquery.js" type="text/javascript"></SCRIPT>
<SCRIPT src="<?php echo $systemurl?>/static/common.js" type="text/javascript"></SCRIPT>
<script type="text/javascript">
var TOOL_URL = '<?php echo $systemurl?>';
$(window).ready(function(){
    var isIE6=$.browser.version==6&&$.browser.msie;
    if ($.browser.msie) {
        document.execCommand("BackgroundImageCache", false, true);
    }
    var searchStr = window.location.search;
    var strLink = searchStr.substring(1,searchStr.length);
    var paramArr = strLink.split("&");
    var linkObj = {};
    for(var i = 0; i < paramArr.length; i++){
        var col = paramArr[i].split("=");
        if(col.length > 0){
            linkObj[col[0]] = col.length > 1?col[1]:"";
        }
    }
    if(isIE6){
        $("#my_tools").find("li").hover(
        function(){
            $(this).addClass("hover");
        },
        function(){
            $(this).removeClass("hover");
        }
        );
    }
    if(linkObj["ac"] != undefined && linkObj["ac"] == "my"){
        grid_obj=$("#my_tools li").not($("#blank"));
        blank_box=$("#blank");
        grid_obj.each(function(){
            var panel=$(this);
            panel.find("a.handle-dele").bind("click",function(){
                if(DeleteTool(panel.attr("rel"))){
                    panel.empty();
                    panel.remove();
                    if($("#my_tools li").not($("#blank")).length <= 0){
                        $("#js_tools_list_box").hide();
                        $("#js_tools_none_box").show();
                    }
                }
            });

            panel.find("a.handle-move").bind("mousedown",{obj:panel},mouse_down);
        })
    }

    var t = new TextBoxDrop("tool_kw","js_search_msg");
    t.SetEnterHandler (function(value){
        document.getElementById("js_search_self").click();
    });
    t.SetAjaxMethod($.get);
    t.Url(TOOL_URL + '/witcms/index.php');
    t.SetContentStyle(function(intput,contentbox){
        var inputBox = $(intput);
        if($.browser.ie){
            contentbox.style.left = inputBox.offset().left;
            contentbox.style.top = inputBox.offset().top + 27;
        }
        else{
            $(contentbox).css({
                top : inputBox.offset().top + 27,
                left: inputBox.offset().left
            });
        }
    });
});

var IndexSearchTool  = function(){
    var url = TOOL_URL + '/witcms/index.php?ct=index&ac=search';
    url += '&q=' + encodeURIComponent(document.getElementById('tool_kw').value);
    window.location.href=url;
}
</script>
<style type="text/css">
	.js_search_msg{ position:absolute; background:#fff; border:1px solid #A8C5EE;}
	.js_search_msg li{ padding:3px 5px; cursor:pointer;}
	.js_search_msg li.active{ background:#A6C6F4}
	a.a_button{ 
		display:block;width:85px; color:#000;  font-size:14px; text-align:center; vertical-align:middle; padding:0;
		height:26px;  line-height:26px;
	}
	
    #histroy{ border-bottom:1px #ccc dashed; } 
    #histroy span{float:left; color:#999; width:100px; text-align:right; padding-right:15px;}
    #histroy li{padding:3px;}	
</style>
<script type="text/javascript" src="<?php echo $systemurl?>/static/defaltpage.js"></script>
<script type="text/javascript">
	MouseUpHandler = function(){
		var liCol = $("#my_tools li").not("#blank");
		var col = [];
		liCol.each(function(i){
			col.push($(this).attr("rel"));
		});
		DefaultPage.Sort(col);
	}
</script>
<style type="text/css">
	body.dragable{
		cursor:move;
	}
	body.dragable .tools-list li.hover,body.dragable .tools-list li:hover{
		background:none;
	}
	body.dragable li:hover .handle-bar,body.dragable li.hover .handle-bar{
		display:none;
	}
	#blank{
		display:none;
		border:2px #369 dashed;
		width:236px;
		height:66px;
	}
	#my_tools li{
		z-index:1;
	}
	body.dragable li.draging{
		background-position:-35px -7px;
		position:absolute;
		filter:alpha(opacity=50);
		opacity:0.5;
		-ms-filter:"alpha(opacity=50)";
		z-index:999;
		height:70px;
		width:240px;
	}
	
</style>

<TITLE><?php echo $systemweb?></TITLE>
</HEAD><BODY>
	<DIV id="topbar">
		<DIV class="nav" id="topbar_nav"><p> 您的IP：<?=$ip?>&nbsp;&nbsp; <a href="<?php echo $systemurl?>" onClick="this.style.behavior='url(#default#homepage)';this.setHomePage('<?php echo $systemurl?>');return(false);" style="behavior: url(#default#homepage)">设为主页</a> <a title="把站长工具添加到收藏夹，方便日后查询！）" href="#" onclick="window.external.AddFavorite('<?php echo $systemurl?>', '站长工具 - 致力于专业权威、数据准确的实用工具,站长帮手查询站!'); return false;">加入收藏</a>-站长工具 - 致力于专业权威、数据准确的实用工具,站长帮手查询站!</p></DIV>
		<DIV id="topbar_login"><A href="<?php echo $systemurl?>/admin">登录</A></DIV>
	</DIV>
	<!--/#top_bar-->

	<DIV id="wrap">
		<DIV id="header">
			<H1 id="logo"><A href="<?php echo $systemurl?>"><SPAN class="hide">来啦工具箱</SPAN></A></H1>
			<FORM id="tool_search" action="javascript://" onsubmit="IndexSearchTool();return false;">
				<INPUT type="text" id="tool_kw" class="text-input blue-input" autocomplete="off">
				<SPAN STYLE="border:1px #a8c5ee solid;float:left;padding:1px;margin-right:8px"><INPUT type="button" id="js_search_self" value="在线代理" class="button" onclick="IndexSearchTool(); "></SPAN>
				<SPAN STYLE="border:1px #a8c5ee solid;float:left;padding:1px;">
               	<A href="<?php echo $systemurl?>" onclick="google();return false;"  class="button a_button">搜索网页</A>
                </SPAN>
			</FORM>

				
		</DIV>    	
<?php if($_GET['ac']=='index'or $_GET['ac']==''){
echo '<DIV id="menu"><UL> <LI class="current"><A href="?ac=index">推荐工具</A></LI>';
echo '<LI><A href="?ac=my">我的工具</A></LI>';
echo '<LI><A href="?ac=all">所有工具</A></LI></UL></DIV>';
include_once("menu1.php");};
if($_GET['ac']=='all'){
echo '<DIV id="menu"><UL> <LI><A href="?ac=index">推荐工具</A></LI>';
echo '<LI><A href="?ac=my">我的工具</A></LI>';
echo '<LI class="current"><A href="?ac=all">所有工具</A></LI></UL></DIV>';
include_once("menu2.php");};
if($_GET['ac']=='my'){
echo '<DIV id="menu"><UL> <LI><A href="?ac=index">推荐工具</A></LI>';
echo '<LI class="current"><A href="?ac=my">我的工具</A></LI>';
echo '<LI><A href="?ac=all">所有工具</A></LI></UL></DIV>';
include_once("menu3.php");};
?>
		
		<DIV id="footer" class="text-center gray6">
			<P>
			<?php echo $copyright?>
			

<A href="http://www.miibeian.gov.cn/" target="_blank"><?php echo $icp?></A>
						</P>

	

		</DIV>
		<!--/#footer-->
	</DIV>
    <UL id="js_search_msg" style="display: none; width: 356px; top: 91px; left: 361px; " class="js_search_msg">
    </UL>


</BODY></HTML>