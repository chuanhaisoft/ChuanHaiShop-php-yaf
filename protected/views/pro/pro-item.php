<?php 
    if(!isset($pro))$pro=null;
    if(!isset($type))$type = \Pub\Fram::GetNumValue('type_id','');
    if(!isset($size))$size=5;
    if(!isset($FirstClass) || !$FirstClass)
        $FirstClass='';
    else
        $FirstClass=' class="firstli"';
?>
<div class="pro-list-span4">
				<ul class="clearfix">
					<?php
						$num = $youhui = 0;
						foreach ($pro as $v) :
							$num++;
							$youhui = ($v['SHI_CHANG_PRICE'] / $v['PRICE'] >=1.2) ? 1 : 0;
					?>
					<li <?php if($num==1){echo $FirstClass;} ?>>
						<dl>
							<dt class="photo">
								<a href="<?php echo Pub\SysPara::Pro_Detail_Url(array('id'=>$v['ID']));?>" target="_blank" class="img-h"><img src="<?php echo Pub\Fram::Img_Url(Pub\Fram::GetSuoLue($v['PIC'])); ?>" alt="" /></a>
								<?php if ($youhui) :?>
								<span class="tag c1">优惠</span>
								<?php endif; ?>
							</dt>
							<dd class="info">
								<h3 class="name">
									<a href="<?php echo Pub\SysPara::Pro_Detail_Url(array('id'=>$v['ID']));?>" target="_blank"><?php echo $v['NAME']?></a>
								</h3>
								<div class="price-box">
									<span class="price-sc bk"><i>¥</i><b><?php echo $v['PRICE']?></b></span>
									<?php if ($youhui) :?>
									<span class="price-yj bk"><span class="wz">市场价</span><span class="num"><i>¥</i><b><?php echo $v['SHI_CHANG_PRICE']?></b></span></span>
									<?php endif; ?>
								</div>
								<!-- / price-box -->
							</dd>
							<?php if($type==2): ?>
							<dd class="huidian-proaction clearfix">
				                <p class="u-price"><i class="bk"></i><b><?php echo $v['HUI_DIAN'];?></b><span class="dw bk">积分</span></p>
				                <a class="u-action" href="<?php echo Pub\SysPara::Pro_Detail_Url(array('id'=>$v['ID']));?>" target="_blank">抢购</a>
				            </dd>
							<?php endif; ?>
						</dl>
					</li>
					<?php endforeach; ?>
				</ul>
			</div>