  <?PHP $tools=$_COOKIE['tools_my'] ;?>
   <?php if($tools!=''){ ?>
			<DIV id="main" class="clearfix">
			<DIV id="leftbar" class="fl">


							<!--widget-->
				<DIV class="rn shadow" id="js_tools_list_box">
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
<?php mytools($tools);?>	
									
<LI id="blank" style="display: none; visibility: inherit; ">
                            
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
                    <DIV class="rn shadow hide" id="js_tools_none_box">
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
                                            <DIV class="result-inner yellow" style="padding:100px 30px;">
                                                <DIV style="float:left; background:url(static/images/icon.gif) no-repeat left -285px; width:32px; height:32px; margin-right:10px;"></DIV>
                                                <H5 class="font-14">还没有添加任何工具呢！</H5>
                                                <P>快根据你的需要，在“<A href="<?php echo $systemurl?>">推荐工具</A>”窗口选择推荐工具，或者在“<A href="<?php echo $systemurl?>/?ac=all">所有工具</A>”库进行添加吧！</P>
                                            </DIV>
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
							</DIV>
			<!--/#leftbar-->							
										

				<?php }else{?>
		<div id="main" class="clearfix"> 
			<div id="leftbar" class="fl"> 
 
 
			
<!--widget--> 
				<div class="rn shadow"> 
					<div class="shadow-rt"> 
						<div class="shadow-lb"> 
							<div class="shadow-rb"> 
								<div class="shadow-lt"> 
									<div class="rn-header"> 
										<div class="rn-border rn-border-1"></div> 
										<div class="rn-border rn-border-2"></div> 
										<div class="rn-border rn-border-3"></div> 
										<div class="rn-border rn-border-4"></div> 
										<div class="rn-border rn-border-5"></div> 
									</div> 
									<!--rn inner--> 
									<div class="rn-inner clearfix"> 
										<h4 class="hide">推荐工具</h4> 
										<div class="result-inner yellow" style="padding:100px 30px;"> 
											<div style="float:left; background:url(static/images/icon.gif) no-repeat left -285px; width:32px; height:32px; margin-right:10px;"></div> 
											<h5 class="font-14">还没有添加任何工具呢！</h5> 
											<p>快根据你的需要，在“<a href="<?php echo $systemurl?>">推荐工具</a>”窗口选择推荐工具，或者在“<a href="<?php echo $systemurl?>/?ac=all">所有工具</a>”库进行添加吧！</p> 
										</div> 
									</div> 
									<!--/rn inner--> 
									<div class="rn-footer"> 
										<div class="rn-border rn-border-5"></div> 
										<div class="rn-border rn-border-4"></div> 
										<div class="rn-border rn-border-3"></div> 
										<div class="rn-border rn-border-2"></div> 
										<div class="rn-border rn-border-1"></div> 
									</div> 
								</div> 
							</div> 
						</div> 
					</div>	
				</div> 
				<!--/widget--> 
							</div> 
			<!--/#leftbar--> 
<?php };?>
			<div id="rightbar" class="fr">        
 
					
	<!--widget--> 
				<div id="other_tools" class="rn shadow"> 
					<div class="shadow-rt"> 
						<div class="shadow-lb"> 
							<div class="shadow-rb"> 
								<div class="shadow-lt"> 
									<div class="blue-header"> 
										<div class="blue-header-left"></div> 
										<div class="blue-header-right"></div> 
										<h4>其他实用工具</h4> 
									</div> 
									<!--rn inner--> 
									<div class="rn-inner pt5"> 
										<ul class="side-list"> 
<?php sidetools(0,8); ?>           
										</ul> 
									</div> 
									<!--/rn inner--> 
									<div class="rn-footer"> 
										<div class="rn-border rn-border-5"></div> 
										<div class="rn-border rn-border-4"></div> 
										<div class="rn-border rn-border-3"></div> 
										<div class="rn-border rn-border-2"></div> 
										<div class="rn-border rn-border-1"></div> 
									</div> 
								</div> 
							</div> 
						</div> 
					</div>	
				</div> 
    <!--/widget--> 
	                			                  
			</div> 
			<!--/#rightbar--> 
			
		</div> 