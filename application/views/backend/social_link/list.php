
<div class="row">
	<div class="col-sm-12 col-md-12">
		<div class="panel panel-bd lobidrag">
			<div class="panel-heading">
				<div class="panel-title">
					<h2><?php echo (!empty($title)?$title:null) ?></h2>
				</div>
			</div>
			<div class="panel-body">

				<table   id="roottable"></table>
			</div>
		</div>
	</div>
</div>
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
					field: 'name',
					title: '<?php echo display('name');?>',
					align: 'center',
					sortable:true,
					valign: 'middle'
				}, {
					field: 'link',
					title: '<?php echo display('link');?>',
					align: 'center',
					sortable:true,
					valign: 'middle'
				}, {
					formatter:me.editicon,
					title: '<?php echo display('icon');?>',
					align: 'center',
					sortable:true,
					valign: 'middle'
				}, {
					formatter:me.editstatus,
					title: '<?php echo display('status');?>',
					align: 'center',
					sortable:true,
					valign: 'middle'
				},{
					formatter:me.editaction,
					title: '<?php echo display('action');?>',
					align: 'center',
					sortable:true,
					valign: 'middle'
				}]
			});
		};

me.editicon=function(value,row,index){return '<h1><i class="fa fa-'+row.icon+'"></i></h1>';}
me.editstatus=function(value,row,index){
	if (row.status==1){return "<?php echo display('active');?>";}else{ return "<?php echo display('inactive');?>";}
}


		me.editaction=function(value,row,index){
			return ' <a href="<?php echo base_url("backend/cms/social_link/form/");?>'+row.id+'" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="Update"><i class="fa fa-pencil" aria-hidden="true"></i></a>';

		}


		me.runningFormatter=function(value, row, index) {return index+1;}


		me.ajaxme=function(){
			var result;
			$.ajax({
				type: "POST",
				async:false,
				url: '<?php  echo base_url("backend/cms/social_link/s_list");?>',
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


