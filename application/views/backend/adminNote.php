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

                <div class="col-sm-8">
                    <?php echo form_open('home/adminNoteupdate','class="form-inner"') ?>



                    <div class="form-group row">
                        <label for="title" class="col-xs-3 col-form-label"><?php echo display('title') ?> *</label>
                        <div class="col-xs-9">
                            <input name="title"  type="text" value="<?php echo $admin_note->title; ?>" class="form-control"  >
                        </div>
                    </div>
                     <div class="form-group row">
                        <label for="content" class="col-xs-3 col-form-label"><?php echo display('content') ?> *</label>
			<div class="col-xs-9">
<textarea rows="2" name="content" class="form-control" style="resize: none;" ><?php echo $admin_note->content; ?>
                      </textarea>  </div>
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
