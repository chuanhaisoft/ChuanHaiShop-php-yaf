<td colspan="5" style=""><form action="/mall/order_shop/replypingjia.html?ID=<?php echo $pingjia_info['ID']?>" method="post">
									<div class="comment">
										<div class="score_bg">
											<div class="score">评分：</div>
											<div class="star">
											
											<?php for($i=1;$i<=5;$i++){?>
											<?php if($i<=$pingjia_info['PING_FEN']){?>
												<img val="1" class="" src="http://jshmart.com/images/star2.png">
										      <?php }else{?>
												<img val="2" class="" src="http://jshmart.com/images/star1.png">
												<?php }?>
											<?php }?>
												
											</div>
											<div class="" style="    width: 300px;    height: 50px;    position: absolute;    left: 250px;">
													评价时间: <?php echo $pingjia_info['ADD_TIME']?>
											</div>	
										</div>
										
										
										<div class="comment_content" style="height:100px;">
    										
    										<input type="hidden" name="PRO_ID" value="<?php echo $pingjia_info['PRO_ID']?>">
    										<input type="hidden" name="USER_ID" value="<?php echo $pingjia_info['USER_ID']?>">
    										<input type="hidden" name="SHOP_ID" value="<?php echo $pingjia_info['SHOP_ID']?>">
    											<div class="score">评论： </div>
    											<div class="content">
    												<textarea style="height:90px;" readonly="readonly" name="MESS"><?php echo $pingjia_info['MESS']?></textarea>
    											</div>
										</div>
										<div class="comment_content" style="height:120px;">
										
										<?php if($pingjia_info['SHOP_ID']==SysFram::GetLoginID()||$pingjia_info['REPLY']){?>
											<div class="score">回复： </div>
											<div class="content">
												<textarea style="height:90px;"  name="REPLY"><?php echo $pingjia_info['REPLY']?></textarea>
											</div>
											
											<?php }?>
											<div class="content_commit" style="top:92px;"> 
											<?php if($pingjia_info['SHOP_ID']==SysFram::GetLoginID()){?>
												<input  type="submit" class="commit_btn" value="提交评论">
												<div class="sm_comment_wrap">
													<input <?php if($pingjia_info['ANONYMOUS']){?> checked <?php }?> class="sm_comment" name="ANONYMOUS" type="checkbox" value="1">
													匿名评论
												</div>
											<?php }?>
											</div>	
										</div>
									<div>
								</div></div>
								
								</form></td>