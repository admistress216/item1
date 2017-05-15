<?php 

//$self = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']; 
$self = $_SERVER['PHP_SELF']; 
if(isset($_POST['downTime'])&&isset($_POST['upTime'])){ 
    if(is_numeric($_POST['downTime'])&&is_numeric($_POST['upTime'])){ 
        showResult(); 
    }else{ 
        showTest(); 
    } 
}elseif($_POST['action']=='uploadTest'){ 
    echo 'ok'; 
}else{ 
    showTest(); 
} 

function showTest(){?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0020)http://tool.115.com/ -->
<HTML xmlns="http://www.w3.org/1999/xhtml"><HEAD><META http-equiv="Content-Type" content="text/html; charset=UTF-8">

<META name="keywords" content="">
<META name="description" content="">
<META http-equiv="X-UA-Compatible" content="IE=EmulateIE7">
<LINK type="text/css" rel="stylesheet" href="http://www.laii.cn/witcms/static/main.css">
<LINK type="text/css" rel="stylesheet" href="http://www.laii.cn/witcms/static/icon.css">
<LINK rel="search" type="application/opensearchdescription+xml" href="" title="115 聚合搜索">
<SCRIPT src="http://www.laii.cn/witcms/static/jquery.js" type="text/javascript"></SCRIPT>
<SCRIPT src="http://www.laii.cn/witcms/static/common.js" type="text/javascript"></SCRIPT>
<STYLE type="text/css">
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
</STYLE>
<SCRIPT type="text/javascript" src="./static/defaltpage.js"></SCRIPT>

<TITLE>115工具箱 </TITLE>
</HEAD><BODY>
	<DIV id="topbar">
		<DIV class="nav" id="topbar_nav"><A href="http://115.com/s?">聚合搜索</A><A href="http://v.115.com/?">影视聚搜</A><A href="http://u.115.com/">网络U盘</A><STRONG>工具箱</STRONG><A href="http://fav.115.com/">收藏夹</A></DIV>
		<DIV id="topbar_login"><A href="http://my.115.com/">登录</A></DIV>
		<DIV id="topbar_info" style="display:none;"><B id="topbar_acc"></B>&nbsp;|&nbsp;<A href="http://my.115.com/?ctl=user_manage">我的帐户</A>&nbsp;|&nbsp;<A href="http://my.115.com/?ctl=auth&action=logout">退出</A></DIV>
	</DIV>
	<!--/#top_bar-->

	<DIV id="wrap">
		<DIV id="header">
			<H1 id="logo"><A href="./static/115工具箱.htm"><SPAN class="hide">115实用工具箱</SPAN></A></H1>
			<FORM id="tool_search" action="javascript://" onsubmit="IndexSearchTool();return false;">
				<INPUT type="text" id="tool_kw" class="text-input blue-input" autocomplete="off">
				<SPAN class="button-border"><INPUT type="button" id="js_search_self" value="搜索工具" class="button" onclick="IndexSearchTool(); "></SPAN>
			</FORM>
			<FORM id="agg_search" action="http://tool.115.com/#">
				<INPUT type="text" id="search_kw" class="hide">
				<SPAN class="button-border">
               <!-- <input type="button" value="搜索网页" class="button" onclick="window.location.href='http://115.com/s?q=' + encodeURIComponent(document.getElementById('tool_kw').value);"/>-->
               	<A href="http://115.com/s?q=" onclick="this.href=&#39;http://115.com/s?q=&#39;+encodeURIComponent(document.getElementById(&#39;tool_kw&#39;).value)" target="_blank" class="button a_button">搜索网页</A>
                </SPAN>
                                &nbsp;&nbsp;<SPAN style="line-height:30px;"><A href="http://feedback.115.com/?action=ask&app=4" target="_blank">意见反馈</A></SPAN>
			</FORM>
		</DIV>
        
		<!--/#header-->
		<DIV id="menu">
			<UL>            
               <LI> <A onclick="selectTag('main0',this)" href="#">推荐工具</A></LI>
                <LI><A onclick="selectTag('main1',this)" href="#">所有工具</A></LI>
                <LI class="current"><A onclick="selectTag('main0',this)" href="#">推荐工具</A></LI>          
                
								
				
			</UL>
		</DIV>
		<!--/#menu1-->

		<DIV id="main0" class="clearfix">
			<DIV id="leftbar" class="fl">
				<!--widget-->
				<DIV class="rn shadow">
					<DIV class="shadow-rt">
						<DIV class="shadow-lb">
							<DIV class="shadow-rb">
								<DIV class="shadow-lt">
									<DIV class="rn-header">
										<DIV class="rn-border rn-border-1"></DIV>
										<DIV class="rn-border rn-border-2"></DIV>
										<DIV class="rn-border rn-border-3"></DIV>
										<DIV class="rn-border rn-border-4"></DIV>
										<DIV class="rn-border rn-border-5"></DIV>
									</DIV>
									<!--rn inner-->
									<DIV class="rn-inner clearfix">
										<H4 class="hide">推荐工具</H4>
										<UL id="my_tools" class="tools-list">
										
										
										
        <table align="center" cellpadding="1" cellspacing="0"> 
            <tr> 
                <td height="30" colspan="2" align="center"><b>下载速度测试中</b></td> 
            </tr> 
            <tr> 
                <td width="300" style="border:1px solid blue"><table cellpadding="0" cellspacing="0"> 
                        <tr> 
                            <td id="downProgressBar" bgcolor="blue" style="width:0px; height:17px"></td> 
                        </tr> 
                    </table></td> 
                <td id="downProgressNum" align="right" width="35">0%</td> 
            </tr> 
            <form id="TestForm" action="" method="post"><input name="downTime" id="downTime" type="hidden" /><input name="upTime" id="upTime" type="hidden" /></form> 
        </table> 
        <script type="text/javascript"> 
            <!-- 
            function $id(id){ 
                return document.getElementById(id); 
            } 
  
            function setDownProgress(){ 
                Percentage++; 
                dpb.style.width=(Percentage*3)+'px'; 
                dpn.innerHTML = Percentage+'%'; 
            } 
  
            function setUpProgress(){ 
                Percentage+=10; 
                upb.style.width=(Percentage*3)+'px'; 
                upn.innerHTML = Percentage+'%'; 
                if(Percentage==100){ 
                    upTime =(new Date()).getTime() - upTime; 
                    submitTest(); 
                } 
            } 
  
            function XmlHttp(){ 
                try{ 
                    if(window.XMLHttpRequest){ 
                        var req = new XMLHttpRequest(); 
                        if(req.readyState == null){ 
                            req.readyState = 1; 
                            req.addEventListener("load", function(){ 
                                req.readyState = 4; 
                                if(typeof req.onreadystatechange == "function") 
                                    req.onreadystatechange(); 
                            }, false); 
                        } 
                        return req; 
                    } 
                    if(window.ActiveXObject){ 
                        return new ActiveXObject(getXmlHttpPrefix() + ".XmlHttp"); 
                    } 
                } 
                catch(e){} 
            } 
  
            function getXmlHttpPrefix(){ 
                if(getXmlHttpPrefix.prefix) 
                    return getXmlHttpPrefix.prefix; 
                var prefixes = ["MSXML2","Microsoft","MSXML","MSXML3"]; 
                var o; 
                for(var i=0;i<prefixes.length;i++){ 
                    try{ 
                        o = new ActiveXObject(prefixes[i] + ".XmlHttp"); 
                        return getXmlHttpPrefix.prefix = prefixes[i]; 
                    } 
                    catch(ex){}; 
                } 
            } 
  
            function upTest(){ 
                var xmlHttp = XmlHttp(); 
                if(!xmlHttp)errorSubmit(); 
                xmlHttp.open('POST','<?=$GLOBALS['self']?>',true); 
                xmlHttp.setRequestHeader("Content-Length",upBody.length); 
                xmlHttp.setRequestHeader("CONTENT-TYPE","application/x-www-form-urlencoded"); 
                xmlHttp.onreadystatechange = function(){ 
                    if(xmlHttp.readyState == 4){ 
                        setUpProgress(); 
                    }else if(xmlHttp.readyState == 3){ 
                        upTest(); 
                    } 
                } 
                xmlHttp.send(upBody); 
            } 
  
            function submitTest(){ 
                $id('downTime').value=downTime; 
                $id('upTime').value=upTime; 
                $id('TestForm').submit(); 
            } 
  
            function errorSubmit(t){ 
                if(t) 
                    upTime = t; 
                else 
                    upTime = 0; 
                submitTest(); 
            } 
  
            var dpb = $id("downProgressBar"); 
            var dpn = $id("downProgressNum"); 
            var upClickCount = Percentage = 0; 
            var downTime =(new Date()).getTime(); 
            --> 
        </script>

		
		<?php 
            $outText = getTestText(); 
            for($i = 1;$i<100;$i++){ 
                echo '<!--'.$outText."-->\n"; 
                echo "<script type=\"text/javascript\">setDownProgress();</script>\n"; 
            } 
            ?> 
		       <script type="text/javascript"> 
            var outstr = '<?=$outText?>'; 
            setDownProgress(); 
            downTime =(new Date()).getTime()-downTime; 
        </script> 
        <table align="center" cellpadding="1" cellspacing="0"> 
            <tr> 
                <td height="30" colspan="2" align="center"><b>上转速度测试中</b></td> 
            </tr> 
            <tr> 
                <td width="300" style="border:1px solid blue"><table cellpadding="0" cellspacing="0"> 
                        <tr> 
                            <td id="upProgressBar" bgcolor="blue" style="width:0px; height:17px"></td> 
                        </tr> 
                    </table></td> 
                <td id="upProgressNum" align="right" width="35">0%</td> 
            </tr> 
        </table> 
        <script type="text/javascript"> 
            Percentage =0; 
            var upb = $id("upProgressBar"); 
            var upn = $id("upProgressNum"); 
            var upBody=''; 
            for(i=0;i<10;i++)upBody +=outstr; 
            upBody = 'action=uploadTest&content='+upBody; 
            setTimeout('errorSubmit(-1)',300000); 
            upTest(); 
            var upTime =(new Date()).getTime(); 
        </script> 
 
		
												</UL>
									</DIV>
									<!--/rn inner-->
									<DIV class="rn-footer">
										<DIV class="rn-border rn-border-5"></DIV>
										<DIV class="rn-border rn-border-4"></DIV>
										<DIV class="rn-border rn-border-3"></DIV>
										<DIV class="rn-border rn-border-2"></DIV>
										<DIV class="rn-border rn-border-1"></DIV>
									</DIV>
								</DIV>
							</DIV>
						</DIV>
					</DIV>	
				</DIV>
				<!--/widget-->	
									
									
									


			</DIV>
			<!--/#leftbar-->
			
			
			
			
			<DIV id="rightbar" class="fr">
            			
	<!--widget-->
				<DIV id="other_tools" class="rn shadow">
					<DIV class="shadow-rt">
						<DIV class="shadow-lb">
							<DIV class="shadow-rb">
								<DIV class="shadow-lt">
									<DIV class="blue-header">
										<DIV class="blue-header-left"></DIV>
										<DIV class="blue-header-right"></DIV>
										<H4>其他实用工具</H4>
									</DIV>
									<!--rn inner-->
									<DIV class="rn-inner pt5">
										<UL class="side-list">
                                        		<LI><A href="http://tool.115.com/?ct=live&ac=mobile">手机号码归属地查询</A></LI>
                                        		<LI><A href="http://tool.115.com/?ct=live&ac=speed">上网速度测试</A></LI>
                                        		<LI><A href="http://tool.115.com/?ct=live&ac=zip">邮编区号查询</A></LI>
                                        		<LI><A href="http://tool.115.com/?ct=live&ac=idcard">身份证归属地查询</A></LI>
                                        		<LI><A href="http://tool.115.com/?ct=live&ac=calendar">万年历</A></LI>
                                        		<LI><A href="http://tool.115.com/?ct=live&ac=translate">免费在线翻译</A></LI>
                                        		<LI><A href="http://tool.115.com/?ct=live&ac=car">车辆违章查询</A></LI>
                                        		<LI><A href="http://tool.115.com/?ct=finance&ac=rate">实时汇率转换</A></LI>
                                            
										</UL>
									</DIV>
									<!--/rn inner-->
									<DIV class="rn-footer">
										<DIV class="rn-border rn-border-5"></DIV>
										<DIV class="rn-border rn-border-4"></DIV>
										<DIV class="rn-border rn-border-3"></DIV>
										<DIV class="rn-border rn-border-2"></DIV>
										<DIV class="rn-border rn-border-1"></DIV>
									</DIV>
								</DIV>
							</DIV>
						</DIV>
					</DIV>	
				</DIV>
    <!--/widget-->
										            					
			</DIV>
			<!--/#rightbar-->
			
		</DIV>
		<!--/#main1-->
		
		
		

		
		<DIV id="footer" class="text-center gray6">
			<P>
			Copyright ? 2009 115.com All Rights Reserved 
			

<A href="http://www.miibeian.gov.cn/" target="_blank">粤ICP备09096758号</A>
						</P>

		
		</DIV>
		<!--/#footer-->
	</DIV>
    <UL id="js_search_msg" style="display: none; width: 356px; top: 91px; left: 361px; " class="js_search_msg">
    </UL>
   


</BODY></HTML>	
<?php 
} 
function showResult(){?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0020)http://tool.115.com/ -->
<HTML xmlns="http://www.w3.org/1999/xhtml"><HEAD><META http-equiv="Content-Type" content="text/html; charset=UTF-8">

<META name="keywords" content="">
<META name="description" content="">
<META http-equiv="X-UA-Compatible" content="IE=EmulateIE7">
<LINK type="text/css" rel="stylesheet" href="http://www.laii.cn/witcms/static/main.css">
<LINK type="text/css" rel="stylesheet" href="http://www.laii.cn/witcms/static/icon.css">
<LINK rel="search" type="application/opensearchdescription+xml" href="" title="115 聚合搜索">
<SCRIPT src="http://www.laii.cn/witcms/static/jquery.js" type="text/javascript"></SCRIPT>
<SCRIPT src="http://www.laii.cn/witcms/static/common.js" type="text/javascript"></SCRIPT>
<STYLE type="text/css">
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
</STYLE>
<SCRIPT type="text/javascript" src="./static/defaltpage.js"></SCRIPT>

<TITLE>115工具箱 </TITLE>
</HEAD><BODY>
	<DIV id="topbar">
		<DIV class="nav" id="topbar_nav"><A href="http://115.com/s?">聚合搜索</A><A href="http://v.115.com/?">影视聚搜</A><A href="http://u.115.com/">网络U盘</A><STRONG>工具箱</STRONG><A href="http://fav.115.com/">收藏夹</A></DIV>
		<DIV id="topbar_login"><A href="http://my.115.com/">登录</A></DIV>
		<DIV id="topbar_info" style="display:none;"><B id="topbar_acc"></B>&nbsp;|&nbsp;<A href="http://my.115.com/?ctl=user_manage">我的帐户</A>&nbsp;|&nbsp;<A href="http://my.115.com/?ctl=auth&action=logout">退出</A></DIV>
	</DIV>
	<!--/#top_bar-->

	<DIV id="wrap">
		<DIV id="header">
			<H1 id="logo"><A href="./static/115工具箱.htm"><SPAN class="hide">115实用工具箱</SPAN></A></H1>
			<FORM id="tool_search" action="javascript://" onsubmit="IndexSearchTool();return false;">
				<INPUT type="text" id="tool_kw" class="text-input blue-input" autocomplete="off">
				<SPAN class="button-border"><INPUT type="button" id="js_search_self" value="搜索工具" class="button" onclick="IndexSearchTool(); "></SPAN>
			</FORM>
			<FORM id="agg_search" action="http://tool.115.com/#">
				<INPUT type="text" id="search_kw" class="hide">
				<SPAN class="button-border">
               <!-- <input type="button" value="搜索网页" class="button" onclick="window.location.href='http://115.com/s?q=' + encodeURIComponent(document.getElementById('tool_kw').value);"/>-->
               	<A href="http://115.com/s?q=" onclick="this.href=&#39;http://115.com/s?q=&#39;+encodeURIComponent(document.getElementById(&#39;tool_kw&#39;).value)" target="_blank" class="button a_button">搜索网页</A>
                </SPAN>
                                &nbsp;&nbsp;<SPAN style="line-height:30px;"><A href="http://feedback.115.com/?action=ask&app=4" target="_blank">意见反馈</A></SPAN>
			</FORM>
		</DIV>
        
		<!--/#header-->
		<DIV id="menu">
			<UL>            
               <LI> <A  href="http://www.laii.cn/witcms/">推荐工具</A></LI>
                <LI><A  href="http://www.laii.cn/witcms/">所有工具</A></LI>
                <LI class="current"><A  href="#">推荐工具</A></LI>          
                
								
				
			</UL>
		</DIV>
		<!--/#menu1-->

		<DIV id="main0" class="clearfix">
			<DIV id="leftbar" class="fl">
				<!--widget-->
				<DIV class="rn shadow">
					<DIV class="shadow-rt">
						<DIV class="shadow-lb">
							<DIV class="shadow-rb">
								<DIV class="shadow-lt">
									<DIV class="rn-header">
										<DIV class="rn-border rn-border-1"></DIV>
										<DIV class="rn-border rn-border-2"></DIV>
										<DIV class="rn-border rn-border-3"></DIV>
										<DIV class="rn-border rn-border-4"></DIV>
										<DIV class="rn-border rn-border-5"></DIV>
									</DIV>
									<!--rn inner-->
									<DIV class="rn-inner clearfix">
										<H4 class="hide">推荐工具</H4>
										<UL id="my_tools" class="tools-list">


        说明，本程序测试的上传速度为上传到本站的速度<br /><br /><?php 
            $dKBps = round(500000/$_POST['downTime'],2); 
            $dKbps = $dKBps * 8; 
            echo '下载速度：'.$dKbps.'Kbps，相当于'.$dKBps."KB/s<br />\n"; 
            if($_POST['upTime']=='-1'){ 
                echo '上转测试超时。'; 
            }else if($_POST['upTime']=='0'){ 
                    echo '您的浏览器不支持本上传测试程序，请使用IE6.0以上或FireFox。'; 
                }else{ 
                    $uKBps = round(500000/$_POST['upTime'],2); 
                    $uKbps = $uKBps * 8; 
                    echo '上传速度：'.$uKbps.'Kbps，相当于'.$uKBps.'KB/s'; 
                } 
            echo '<br /><br /><br /><span style="padding-left:100px"><a href="'.$GLOBALS['self'].'">再测一次</a></span>'?> 
			
			
			
			                                           
										</UL>
									</DIV>
									<!--/rn inner-->
									<DIV class="rn-footer">
										<DIV class="rn-border rn-border-5"></DIV>
										<DIV class="rn-border rn-border-4"></DIV>
										<DIV class="rn-border rn-border-3"></DIV>
										<DIV class="rn-border rn-border-2"></DIV>
										<DIV class="rn-border rn-border-1"></DIV>
									</DIV>
								</DIV>
							</DIV>
						</DIV>
					</DIV>	
				</DIV>
				<!--/widget-->	
									
									
									


			</DIV>
			<!--/#leftbar-->
			
			
			
			
			<DIV id="rightbar" class="fr">
            			
	<!--widget-->
				<DIV id="other_tools" class="rn shadow">
					<DIV class="shadow-rt">
						<DIV class="shadow-lb">
							<DIV class="shadow-rb">
								<DIV class="shadow-lt">
									<DIV class="blue-header">
										<DIV class="blue-header-left"></DIV>
										<DIV class="blue-header-right"></DIV>
										<H4>其他实用工具</H4>
									</DIV>
									<!--rn inner-->
									<DIV class="rn-inner pt5">
										<UL class="side-list">
                                        		<LI><A href="http://tool.115.com/?ct=live&ac=mobile">手机号码归属地查询</A></LI>
                                        		<LI><A href="http://tool.115.com/?ct=live&ac=speed">上网速度测试</A></LI>
                                        		<LI><A href="http://tool.115.com/?ct=live&ac=zip">邮编区号查询</A></LI>
                                        		<LI><A href="http://tool.115.com/?ct=live&ac=idcard">身份证归属地查询</A></LI>
                                        		<LI><A href="http://tool.115.com/?ct=live&ac=calendar">万年历</A></LI>
                                        		<LI><A href="http://tool.115.com/?ct=live&ac=translate">免费在线翻译</A></LI>
                                        		<LI><A href="http://tool.115.com/?ct=live&ac=car">车辆违章查询</A></LI>
                                        		<LI><A href="http://tool.115.com/?ct=finance&ac=rate">实时汇率转换</A></LI>
                                            
										</UL>
									</DIV>
									<!--/rn inner-->
									<DIV class="rn-footer">
										<DIV class="rn-border rn-border-5"></DIV>
										<DIV class="rn-border rn-border-4"></DIV>
										<DIV class="rn-border rn-border-3"></DIV>
										<DIV class="rn-border rn-border-2"></DIV>
										<DIV class="rn-border rn-border-1"></DIV>
									</DIV>
								</DIV>
							</DIV>
						</DIV>
					</DIV>	
				</DIV>
    <!--/widget-->
										            					
			</DIV>
			<!--/#rightbar-->
			
		</DIV>
		<!--/#main1-->
		
		
		

		
		<DIV id="footer" class="text-center gray6">
			<P>
			Copyright ? 2009 115.com All Rights Reserved 
			

<A href="http://www.miibeian.gov.cn/" target="_blank">粤ICP备09096758号</A>
						</P>

		
		</DIV>
		<!--/#footer-->
	</DIV>
    <UL id="js_search_msg" style="display: none; width: 356px; top: 91px; left: 361px; " class="js_search_msg">
    </UL>
   


</BODY></HTML>
<?php 
} 
function getTestText(){ 
    $result; 
    for($i = 0;$i<5000;$i++){ 
        $result .= '*'; 
    } 
    return $result; 
} 

?> 
