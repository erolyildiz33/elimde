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
                    <table class="datatable2 table table-bordered table-hover" >
                        <thead>
                            <tr> <th><?php echo display('action') ?></th>
                                <th><?php echo display('sl_no') ?></th>
                                <th><?php echo display('user_id') ?></th>
                                <th><?php echo display('username') ?></th>
                            </tr>
                        </thead>    
                        <tbody>
                            <?php foreach ($uyeler as $key => $value) { ?>
                               <tr data-toggle="collapse" data-target="#<?php echo $value->username; ?>">
                                <td>
                                    <?php if (!empty($value->sub)){?><i class="fa fa-plus-circle" aria-hidden="true"></i><?php } ?></td> 
                                    <td><?php echo $sl++; ?></td> 
                                    <td><?php echo $value->user_id; ?></td>
                                    <td><?php echo $value->username; ?></td>
                                </tr>  
                                <?php if ($user_level>=2 && !empty($value->sub)) { $sl1=1; ?>
                                    <?php foreach ($value->sub as $key2 => $value2) { ?>
                                        <tr id="<?php echo $value->username; ?>" class="  table-bordered table-hover collapse out" data-toggle="collapse" data-target="#<?php echo $value2->username; ?>">

                                            <td><?php if (!empty($value2->sub)){?><i class="fa fa-plus-circle" aria-hidden="true"></i><?php } ?></td>
                                            <td><?php echo $sl1++; ?></td> 
                                            <td><?php echo $value2->user_id; ?></td>
                                            <td><?php echo $value2->username; ?></td>
                                        </tr> 
                                        <?php if (!empty($value2->sub) && $user_level>=3) { $sl2=1; ?>
                                            <?php foreach ($value2->sub as $key3 => $value3) { ?>
                                                <tr id="<?php echo $value2->username; ?>" class=" table-bordered table-hover collapse out" data-toggle="collapse" data-target="#<?php echo $value3->username; ?>">
                                                    <td ><?php if (!empty($value3->sub)){?><i class="fa fa-plus-circle" aria-hidden="true"></i><?php } ?></td> 
                                                    <td><?php echo $sl2++; ?></td> 
                                                    <td><?php echo $value3->user_id; ?></td>
                                                    <td><?php echo $value3->username; ?></td>
                                                </tr>
                                                <?php if ($user_level>=4 && !empty($value3->sub)) { $sl3=1; ?>
                                                    <?php  foreach ($value3->sub as $key4 => $value4) { ?>
                                                        <tr id="<?php echo $value3->username; ?>" class="  table-bordered table-hover collapse out" data-toggle="collapse" data-target="#<?php echo $value4->username; ?>">
                                                            <td><?php if (!empty($value4->sub)){?><i class="fa fa-plus-circle" aria-hidden="true"></i><?php } ?></td> 
                                                            <td><?php echo $sl3++; ?></td> 
                                                            <td><?php echo $value4->user_id; ?></td>
                                                            <td><?php echo $value4->username; ?></td>
                                                        </tr>
                                                        <?php if (!empty($value4->sub && $user_level>=5)){ $sl4=1; ?>
                                                            <?php  foreach ($value4->sub as $key5 => $value5) { ?>
                                                                <tr id="<?php echo $value4->username; ?>" class=" table table-bordered table-hover">
                                                                    <td></td>
                                                                    <td><?php echo $sl4++; ?></td> 
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

