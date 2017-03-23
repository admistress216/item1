<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0020)http://tool.115.com/ -->
<HTML xmlns="http://www.w3.org/1999/xhtml"><HEAD><META http-equiv="Content-Type" content="text/html; charset=UTF-8">

<META name="keywords" content="">
<META name="description" content="">
<META http-equiv="X-UA-Compatible" content="IE=EmulateIE7">
<LINK type="text/css" rel="stylesheet" href="<?php echo $systemurl?>/static/main.css">
<LINK type="text/css" rel="stylesheet" href="<?php echo $systemurl?>/static/icon.css">
<LINK rel="search" type="application/opensearchdescription+xml" href="" title="115 聚合搜索">
<SCRIPT src="<?php echo $systemurl?>/static/jquery.js" type="text/javascript"></SCRIPT>
<SCRIPT src="<?php echo $systemurl?>/static/common.js" type="text/javascript"></SCRIPT>
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
               <LI> <A href="<?php echo $systemurl?>/">推荐工具</A></LI>
			   <LI><A href="<?php echo $systemurl?>/?ac=my">我的工具</A></LI>
                <LI><A href="<?php echo $systemurl?>/?ac=all">所有工具</A></LI>
                <LI class="current"><A href="#">alexa排名查询</A></LI>          
                
								
				
			</UL>
		</DIV>
		<!--/#menu1-->

		<DIV id="toolmain" class="clearfix">
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

<?php  include_once("alexa.php") ?>
                                            

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