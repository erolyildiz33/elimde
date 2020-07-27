
<style>
    td.details-control {
        background: url('<?php echo base_url('assets/images').'/details_open.png';?>') no-repeat center center;
        cursor: pointer;
    }
    tr.in td.details-control { 
        background: url('<?php echo base_url('assets/images').'/details_close.png';?>') no-repeat center center;
    }
</style>
<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="panel-title">
                    <h2><?php echo (!empty($title)?$title:null) ?></h2>
                </div>
            </div>
            <div class="panel-body">
                <?php  $user_level=$this->db->select("level")
                ->from('team_bonus')
                ->where('user_id',$this->session->userdata('user_id'))
                ->get()
                ->row()->level;
                if ($user_level>=1 && !empty($uyeler)){ $sl=1; ?>
                    <table class="table table-bordered table-hover table-stripe" data-ordering="false">
                        <thead>
                            <tr>
                               <th><?php echo display('action') ?></th>
                               <th><?php echo display('sl_no') ?></th>
                               <th><?php echo display('sponsor_id') ?></th>
                               <th><?php echo display('user_id') ?></th>
                               <th><?php echo display('username') ?></th>
                           </tr>
                       </thead>    
                       <tbody id="kontrol" class="var">
                        <?php foreach ($uyeler as $key => $value) { ?>
                           <tr data-toggle="collapse" data-target="#<?php echo $value->username; ?>" class='bir'>
                            <td id="td_<?php echo $value->username; ?>"  class="<?php if (!empty($value->sub)){ ?>details-control<?php } ?>">
                            </td> 
                            <td><?php echo $sl++; ?></td> 
                            <th><?php echo $this->session->userdata('user_id') ?></th>
                            <td><?php echo $value->user_id; ?></td>
                            <td><?php echo $value->username; ?></td>
                        </tr>  
                        <?php if ($user_level>=2 && !empty($value->sub)) { $sl1=1; ?>
                            <?php foreach ($value->sub as $key2 => $value2) { ?>
                                <tr id="<?php echo $value->username; ?>" class="iki table-bordered table-hover collapse out" data-toggle="collapse" data-target="#<?php echo $value2->username; ?>">
                                    <td id="td_<?php echo $value2->username; ?>" class="<?php if (!empty($value2->sub)){ ?>details-control<?php } ?>">
                                        <td><?php echo $sl1++; ?></td> 
                                        <td><?php echo $value->user_id; ?></td>
                                        <td><?php echo $value2->user_id; ?></td>
                                        <td><?php echo $value2->username; ?></td>
                                    </tr> 
                                    <?php if (!empty($value2->sub) && $user_level>=3) { $sl2=1; ?>
                                        <?php foreach ($value2->sub as $key3 => $value3) { ?>
                                            <tr id="<?php echo $value2->username; ?>" class="uc table-bordered table-hover collapse out" data-toggle="collapse" data-target="#<?php echo $value3->username; ?>">
                                             <td id="td_<?php echo $value3->username; ?>" class="<?php if (!empty($value3->sub)){ ?>details-control<?php } ?>">
                                                 <td><?php echo $sl2++; ?></td> 
                                                 <td><?php echo $value2->user_id; ?></td>
                                                 <td><?php echo $value3->user_id; ?></td>
                                                 <td><?php echo $value3->username; ?></td>
                                             </tr>
                                             <?php if ($user_level>=4 && !empty($value3->sub)) { $sl3=1; ?>
                                                <?php  foreach ($value3->sub as $key4 => $value4) { ?>
                                                    <tr id="<?php echo $value3->username; ?>" class="dort  table-bordered table-hover collapse out" data-toggle="collapse" data-target="#<?php echo $value4->username; ?>">
                                                     <td id="td_<?php echo $value4->username; ?>" class="<?php if (!empty($value4->sub)){ ?>details-control<?php } ?>">
                                                     </td>  
                                                     <td><?php echo $sl3++; ?></td> 
                                                     <td><?php echo $value3->user_id; ?></td>
                                                     <td><?php echo $value4->user_id; ?></td>
                                                     <td><?php echo $value4->username; ?></td>
                                                 </tr>
                                                 <?php if (!empty($value4->sub && $user_level>=5)){ $sl4=1; ?>
                                                    <?php  foreach ($value4->sub as $key5 => $value5) { ?>
                                                        <tr id="<?php echo $value4->username; ?>" class="bes table table-bordered table-hover">
                                                           <td></td>
                                                           <td><?php echo $sl4++; ?></td> 
                                                           <td>Sponsor id = <?php echo $value4->user_id; ?></td>
                                                           <td><?php echo $value5->user_id; ?></td>
                                                           <td><?php echo $value5->username; ?></td>
                                                       </tr>
                                                   <?php }
                                               }
                                           }
                                       }
                                   }
                               }
                           }
                       } 
                   } 
               }
               ?> 

           </tbody> </table>
       </div> 
   </div>
</div>
</div>

<script type="text/javascript">
    $( document ).ready(function() {
     $('.iki').on('shown.bs.collapse', function () {
         $('#kontrol').removeClass('var');
        //$('.bir').removeClass('ust');
    });

     $('.iki').on('hidden.bs.collapse', function () {
         $('#kontrol').addClass('var');
         
         $('.iki').collapse("hide");
         $('.uc').collapse("hide");
         $('.dort').collapse("hide");
         $('.bes').collapse("hide");

     });



     $('.dort').on('shown.bs.collapse', function () {
        $('#uc').attr('style', 'background-image: url("<?php echo base_url('assets/images').'/details_close.png';?>");background-repeat:no-repeat;background-position:center');


    });

     $('.dort').on('hidden.bs.collapse', function () {
         $('#uc').attr('style', 'background-image: url(" <?php echo base_url('assets/images').'/details_open.png';?>");background-repeat:no-repeat;background-position:center');
         $('.dort').collapse("hide");
         $('.bes').collapse("hide"); 
     });
     $('.bes').on('shown.bs.collapse', function () {
        $('#dort').attr('style', 'background-image: url("<?php echo base_url('assets/images').'/details_close.png';?>");background-repeat:no-repeat;background-position:center');


    });

     $('.bes').on('hidden.bs.collapse', function () {
         $('#dort').attr('style', 'background-image: url(" <?php echo base_url('assets/images').'/details_open.png';?>");background-repeat:no-repeat;background-position:center');
         $('.bes').collapse("hide"); 
     });
 });
</script>