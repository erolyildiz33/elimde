<div class="row">
	<div class="col-sm-12 col-md-12">
		<div class="panel panel-bd lobidrag">
			<div class="panel-heading">
				<div class="panel-title">
					<h2><?php echo (!empty($title)?$title:null) ?></h2>
				</div>
			</div>
			<div class="panel-body">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="border_preview">
						<?php echo form_open_multipart("backend/cms/web_language") ?>
						<?php echo form_hidden('id', $language->id) ?> 
						<div class="form-group row">
							<label for="name" class="col-sm-2 col-form-label"><?php echo display('name') ?><i class="text-danger">*</i></label>
							<div class="col-sm-10">
								<input name="name" value="<?php echo htmlspecialchars($language->name) ?>" class="form-control" placeholder="Ex: French" type="text" id="name">
							</div>
						</div>

						<div class="form-group row">
							<label for="flag" class="col-sm-2 col-form-label"><?php echo display('flag') ?><i class="text-danger">*</i></label>
							<div class="col-sm-10">
								<input name="flag" value="<?php echo strtolower($language->flag) ?>" class="form-control" placeholder="<?php echo display('for_flag_use_country_code_bellow_table') ?>" type="text" id="flag">
							</div>
						</div>
						<div class="row">
							<div class="col-sm-9 col-sm-offset-3">
								<a href="<?php echo base_url('admin'); ?>" class="btn btn-primary  w-md m-b-5"><?php echo display("cancel") ?></a>
								<button type="submit" class="btn btn-success  w-md m-b-5"><?php echo display("update"); ?></button>
							</div>
						</div>
						<?php echo form_close() ?>
					</div>
				</div>
			</div>
			 <div class="panel-body">
                <table id="roottable"></table>
            </div></div></div></div>
			<script type="text/javascript">


				function MyClass() {
					var me = this;
					me.MainTable = $('#roottable');
					me.ReadySystem = function () {
						me.MainTable.bootstrapTable({
							locale:'<?php echo display('table_lang');?>',
							search:true,

							rowStyle:me.rowStyle,
							sidepagination:"server",
							data:$.parseJSON(me.ajaxme()),
							columns: [
							{
								formatter: me.runningFormatter,
								title: '<?php echo display('sl_no');?>',
								align: 'center',
								valign: 'middle'
							}, {
								formatter:me.editcode,
								title: '<?php echo display('code');?>',
								align: 'center',
								sortable:true,
								valign: 'middle'
							}, {
								title: '<?php echo display('name');?>',
								align: 'center',
								sortable:true,
								valign: 'middle'
							}]
						});
					};


					String.prototype.ucwords=function(){
						ucwords = function() {
							str = this.toLowerCase();
							return str.replace(/(^([a-zA-Z\p{M}]))|([ -][a-zA-Z\p{M}])/g,
								function($1){
									return $1.toUpperCase();
								});
						}
					}
me.editcode=function(value,row,index){
	
	console.log(index);
	
	return (row[0]);
					}

					me.editname=function(value,row,index){
						return row.name;
					}
					me.runningFormatter=function(value, row, index) {return index+1;}


					me.ajaxme=function(){
						var result;
						$.ajax({
							type: "POST",
							async:false,
							url: '<?php  echo base_url("backend/dashboard/language/l_list");?>',
							data: {<?php echo $this->security->get_csrf_token_name(); ?>:'<?php echo $this->security->get_csrf_hash(); ?>'},
							success: function(data){
								if (data){
									result=data;
								}
							}
						});
						return result;
					};
				}


				var My_do = null;

				$(function () {
					My_do = new MyClass();
					My_do.ReadySystem();
				});
			</script>


