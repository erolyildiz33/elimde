<?php
$cat_title1  = isset($lang) && $lang =="french"?$cat_info->cat_title1_fr:$cat_info->cat_title1_en;
$cat_title2  = isset($lang) && $lang =="french"?$cat_info->cat_title2_fr:$cat_info->cat_title2_en;
?>
        <div class="page_header" data-parallax-bg-image="<?php echo base_url($cat_info->cat_image); ?>" data-parallax-direction="">
            <div class="header-content">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2">
                            <div class="haeder-text">
                                <h1><?php echo $cat_title1; ?></h1>
                                <p><?php echo $cat_title2; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--  /.End of page header -->
        <div class="pricing">


    <?php if($package!=NULL){
        $i=1;


        $blockday=$this->db->select("day")->from('blockday')->where('uid',1)->get()->row()->day;
        foreach ($package as $key => $value) {
            ?>
            <div class="col-sm-4">
                <div class="item">
                    <div class="pricing__item shadow navy__blue_<?php echo $i++;?>">
			<h3 class="pricing__title" style="font-size:45px;font-weight:bold;color:#FFF;"><?php echo $value->package_name;?></h3>
<p class="pricing_sentence" style="color:#FFF;"><?php echo $value->package_deatils;?></p>
                        <div class="pricing__price"><span class="pricing__currency">$</span><?php echo $value->package_amount;?></div>
                        <ul class="pricing__feature-list">
                            <li class="pricing__feature"><?php echo display('period');?> <span><?php echo $value->period;?> day</span></li>
                            <li class="pricing__feature"><?php echo display('total_percent');?><span>$<?php if ($value->p_type==1){echo ($value->daily_roi*$value->period);}else {echo (($value->weekly_roi/7)*$value->period);} ?></span></li>
                            <li class="pricing__feature"><?php echo display('monthly_roi');?> <span>$<?php echo $value->monthly_roi;?></span></li>
                            <?php if ($value->p_type=='0'){ ?>
                                <li class="pricing__feature"><?php echo display('weekly_roi');?> <span>$<?php echo $value->weekly_roi;?></span></li>
                                <li class="pricing__feature"><?php echo display('days_roi');?> <span>$<?php echo number_format(($value->weekly_roi/7)*$blockday,2);?></span></li><?php } ?>
                                <?php if ($value->p_type=='1'){ ?>
                                    <li class="pricing__feature"><?php echo display('daily_roi');?> <span>$<?php echo $value->daily_roi;?></span></li>
                                    <li class="pricing__feature"><?php echo display('days_roi');?> <span>$<?php echo number_format($value->daily_roi*$blockday,2);?></span></li> <?php } ?>

                                            </ul>
                                            <a href="<?php echo base_url('customer/package/confirm_package/'.$value->package_id);?>" class="pricing__action center-block"><?php echo display('buy');?></a>
                                        </div>
                                        <!-- /.End of price item -->
                                    </div></div>
                                <?php } }?>


           
        </div>
        <!-- /.End of pricing -->
