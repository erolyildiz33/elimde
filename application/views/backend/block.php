<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="panel-title">
                    <h2><?php echo (!empty($title)?$title:null) ?></h2>
                </div>
            </div>
            <div class="panel-body">
               <div class="row">
                <div class="col-sm-4">
                    <?php echo form_open('home/block','class="form-inner"') ?>



                    <div class="form-group row">
                        <label for="blockday" class="col-xs-3 col-form-label"><?php echo display('blockday') ?> *</label>
                        <div class="col-xs-9">
                            <input name="blockday"  type="text" value="<?php if (!empty($blockday)){ echo $blockday;} ?>" class="form-control" id="user_id" placeholder="<?php echo display('blockday') ?>" >
                        </div>
                    </div>


                    <div class="form-group  text-right">
                        <button type="submit" class="btn btn-success w-md m-b-5"><?php echo display('update') ?></button>
                    </div>

                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </div>
</div>
