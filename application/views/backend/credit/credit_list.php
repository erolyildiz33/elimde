
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
					field: 'user_id',
					title: '<?php echo display('user_id');?>',
					align: 'center',
					sortable:true,
					valign: 'middle'
				}, {
					field: 'deposit_amount',
					title: '<?php echo display('amount');?>',
					align: 'center',
					sortable:true,
					valign: 'middle'
				},{
					field: 'comments',
					title: '<?php echo display('comment');?>',
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


		

		me.editaction=function(value,row,index){
			return ' <a class="btn btn-success" href="<?php echo base_url('backend/dashboard/credit/credit_details/')?>'+row.deposit_id+'"><?php echo display('view');?></a>';
		}


		me.runningFormatter=function(value, row, index) {return index+1;}


		me.ajaxme=function(){
			var result;
			$.ajax({
				type: "POST",
				async:false,
				url: '<?php  echo base_url("backend/dashboard/credit/c_list");?>',
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


