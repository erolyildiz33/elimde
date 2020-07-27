 <div class="row">
    <div class="form-group">
        <label class="col-sm-2 col-form-label"><?php echo display('affiliate_url');?> </label>
        <div class="col-sm-5">
            <div class="input-group">
                <input type="text" class="form-control" id="copyed" value="<?php echo base_url()?>register?ref=<?php echo $this->session->userdata('user_id')?>">
                <span class="input-group-btn">
                    <button class="btn btn-primary" type="button" onclick="myFunction()"><?php echo display('copy');?></button>
                </span>
            </div>
        </div>
    </div>
    <?php  if(@$level_info->level!=NULL AND $level_info->level!=0){ ?>
        <div class="form-group">
            <div class="col-sm-4 award-img">
               <a href="<?php echo base_url()?>customer/commission/my_level_info"><img src="<?php echo base_url()?>assets/award/0<?php echo @$level_info->level;?>.png"></a>
           </div>
       </div>
   <?php } ?>
</div>
<br>

<div class="social_share">
    <ul>
        <li class="whatsapp"><a href="<?php echo base_url()?>customer/commission/my_payout"> <span><?php echo display('my_payout')?> $<?php echo (@$my_earns?number_format($my_earns, 2):'0.0');?></span></a></li>
        <li class="facebook"><a href="<?php echo base_url()?>customer/commission/my_commission"> <span><?php echo display('ref_bonus')?> $<?php echo (@$commission?number_format($commission, 2):'0.0');?></span></a></li>
        <li class="twitter"><a href="<?php echo base_url()?>customer/commission/team_bonus"> <span><?php echo display('lvl_bonus')?>  $<?php echo ($team_bonus?number_format($team_bonus, 2):'0.0');?></span></a></li>
    </ul>
</div>

<!-- /.Social share -->
<div class="row">

    <div class="col-sm-6 col-md-3">
        <div class="count_panel">
            <div class="stats-title ">
                <h4><?php echo display('withdraw');?></h4>
            </div>
            <h1 class="currency_text text-warning">$<?php echo (@$withdraw!=0?number_format($withdraw, 2):'0.0');?></h1>
        </div>
    </div>

<a href="<?php echo base_url('customer/Commission/freeze')?>">
    <div class="col-sm-6 col-md-3">
        <div class="count_panel">
            <div class="stats-title ">
                <h4><?php echo display('payable');?></h4>
            </div>
            <h1 class="currency_text text-danger"> $<?php echo (@$freeze!=0?number_format($freeze, 2):'0.0');?></h1>
        </div>
    </div> </a>
<a href="<?php echo base_url('customer/Commission/balance')?>">

    <div class="col-sm-6 col-md-3">
        <div class="count_panel">
            <div class="stats-title ">
                <h4><?php echo display('balance');?></h4>
            </div>
            <h1 class="currency_text text-success"> $<?php echo number_format($balance, 2);?></h1>
        </div>
    </div></a>
    <div class="col-sm-6 col-md-3">
        <div class="count_panel">
            <div class="stats-title ">
                <h4><?php echo display('team_turnover')?></h4>
            </div>
            <h1 class="currency_text text-info">$<?php echo (@$team_commission!=0?number_format($team_commission, 2):'0.0');?></h1>
        </div>
    </div>


    <div class="col-sm-6 col-md-3">
        <div class="count_panel">
            <div class="stats-title ">
                <h4><?php echo display('investment');?></h4>
            </div>
            <h1 class="currency_text text-info">$<?php echo $investment->total_amount;?></h1>
        </div>
    </div>


</div>
<div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4><?php echo display('prediction_list'); ?></h4>
                </div>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Sıra No</th>
                                <th>Para Adı</th>
                                <th>Türü</th>
                                <th>Mikrar</th>
                                <th>Tahmin</th>
                                <th>Tarih</th>
                                <th>Durum</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>1</td>
                                <td>BTC</td>
                                <td>Kesin</td>
                                <td> 0.0033 BTC </td>
                                <td>$1.666</td>
                                <td>2019-12-15</td>
                                <td><a href="http://localhost/customer/commission/payout_receipt/619" class="btn btn-success btn-xs">View</a></td>
                            </tr>




                        </tbody>
                    </table>
                </div>
                <a href="http://localhost/customer/commission/my_payout">See all | See Payout</a>
            </div>
        </div>
    </div>
</div>
<div class="row">

   <h3 class="block_title"><?php echo display('package');?></h3>



   <?php if($package!=NULL){
    $i=1;


    $blockday=$this->db->select("day")->from('blockday')->where('uid',1)->get()->row()->day;
    foreach ($package as $key => $value) {
        ?>
        <div class="col-sm-4">
            <div class="item">
                <div class="pricing__item shadow navy__blue_<?php echo $i++;?>">
                    <h3 class="pricing__title" style="font-size:45px;font-weight:bold;color:#FFF;"><?php echo $value->package_name;?></h3>

                    <p class="pricing_sentence"><?php echo $value->package_deatils;?></p>
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


                <!-- /.Packages -->
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4><?php echo display('my_payout');?></h4>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table  class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th><?php echo display('date');?></th>
                                        <th><?php echo display('amount');?></th>
                                        <th><?php echo display('action');?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if($my_payout){
                                        foreach ($my_payout as $key => $value) {
                                            ?>

                                            <tr>
                                                <td><?php echo $value->date;?></td>
                                                <td>$<?php echo $value->amount;?></td>
                                                <td><a href="<?php echo base_url()?>customer/commission/payout_receipt/<?php echo $value->earning_id;?>" class="btn btn-success btn-xs">View</a></td>
                                            </tr>

                                        <?php  } }?>

                                    </tbody>
                                </table>
                            </div>
                            <a href="<?php echo base_url()?>customer/commission/my_payout">See all | See Payout</a>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <h4><?php echo display('sponsor_info');?></h4>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="table-responsive">
                                        <table  class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th><?php echo display('title');?></th>
                                                    <th><?php echo display('details');?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><?php echo display('username');?></td>
                                                    <td><?php echo @$info['sponser_info']->username;?></td>
                                                </tr>
                                                <tr>
                                                    <td><?php echo display('name');?></td>
                                                    <td><?php echo @$info['sponser_info']->f_name.' '.@$info['sponser_info']->l_name;?></td>
                                                </tr>
                                                <tr>
                                                    <td><?php echo display('email');?></td>
                                                    <td><?php echo @$info['sponser_info']->email;?></td>
                                                </tr>
                                                <tr>
                                                    <td><?php echo display('mobile');?></td>
                                                    <td><?php echo @$info['sponser_info']->phone;?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- /.row -->
            <div class="row">


                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <h4><?php echo display('personal_info');?></h4>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table  class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th><?php echo display('title');?></th>
                                            <th><?php echo display('details');?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?php echo display('username');?></td>
                                            <td><?php echo $info['my_info']->username;?></td>
                                        </tr>
                                        <tr>
                                            <td><?php echo display('name');?></td>
                                            <td><?php echo $info['my_info']->f_name.' '.$info['my_info']->l_name;?></td>
                                        </tr>
                                        <tr>
                                            <td><?php echo display('email');?></td>
                                            <td><?php echo $info['my_info']->email;?></td>
                                        </tr>
                                        <tr>
                                            <td><?php echo display('mobile');?></td>
                                            <td><?php echo $info['my_info']->phone;?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                    <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <h4><?php echo display('pending_withdraw');?></h4>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table  class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th><?php echo display('date');?></th>
                                            <th><?php echo display('amount');?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if($pending_withdraw){
                                            foreach ($pending_withdraw as $key => $value) {
                                                ?>

                                                <tr>
                                                    <td><?php echo $value->request_date;?></td>
                                                    <td>$<?php echo $value->amount;?></td>
                                                </tr>

                                            <?php  } }?>
                                        </tbody>
                                    </table>
                                    <a href="<?php echo base_url("customer/withdraw/withdraw_list")?>">See all | Pending Withdraw</a>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="panel panel-bd lobidrag">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    <h4><?php echo display('personal_sales');?> </h4>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table  class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th><?php echo display('name');?></th>
                                                <th><?php echo display('mobile');?></th>
                                                <th><?php echo display('status');?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if($my_sales){
                                                foreach ($my_sales as $key => $value) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $value->f_name.' '.$value->l_name;?></td>
                                                        <td><?php echo $value->phone;?></td>
                                                        <td><?php echo $value->status;?></td>
                                                    </tr>
                                                <?php  } }?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <a href="<?php echo base_url("customer/team")?>">See all | See Genealogy</a>
                                </div>
                            </div>

                        </div>
                    </div>

