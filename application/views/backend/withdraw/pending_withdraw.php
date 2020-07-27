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
<input type="hidden" id="pssm">
			</div>
		</div>
	</div>
</div>
<div class="modal fade modal-success" id="newModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
   <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h1 class="modal-title"><?php echo display('profile');?></h1>
        </div>
        <div class="modal-body">
            <table>
                <tr><td><strong><?php echo display('name');?> : </strong></td> <td id="name"></td></tr>
                <tr><td><strong><?php echo display('email');?> : </strong></td> <td id="email"></td></tr>
                <tr><td><strong><?php echo display('mobile');?> : </strong></td> <td id="phone"></td></tr>
                <tr><td><strong><?php echo display('user_id');?> : </strong></td> <td id="user_id"></td></tr>
            </table>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
    </div><!-- /.modal-content -->
  </div>
</div>
<!-- Modal body load from ajax end-->

<!-- Modal ajax call start -->
<script type="text/javascript">

    $(".AjaxModal").click(function(){
      var url = $(this).attr("href");
      var href = url.split("#");  
      
      jquery_ajax(href[1]);
    });

    function jquery_ajax(id) {
           $.ajax({
                url : "<?php echo site_url('backend/Ajax_load/user_info_load/')?>" + id,
                type: "GET",
                data: {'id':id},
                dataType: "JSON",
                success: function(data)
                {

                    $('#name').text(data.f_name+' '+data.l_name);
                    $('#email').text(data.email);
                    $('#phone').text(data.phone);
                    $('#user_id').text(data.user_id);
                  
                   
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error get data from ajax');
                }
            });

    }
</script>
<script type="text/javascript">


	function MyClass() {
		var me = this;
		me.MainTable = $('#roottable');
	        me.Sendmodal= $('#sendModal');
		me.pssfd=$('#pssm');
		me.ReadySystem = function () {
		me.Sendmodal.on('show.bs.modal', function (e) {
                var userid = $(e.relatedTarget).attr('data-userid');
                var walet=$(e.relatedTarget).attr('data-walletid');
                $(this).find('#userid').val(userid);
                $(this).find('#walletid').val(walet);
});

			
			
			me.Sendmodal.on('click','#pswss', function (e) {
		me.pssfd.val($('#passwd').val());

			
			
		
window.location.href ='<?php echo base_url("backend/withdraw/withdraw/");?>confirm_withdraw?id='+$('#walletid').val()+'&user_id='+$('#userid').val()+'&set_status=2&pss='+$('#passwd').val();



});



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
					field: 'method',
					title: '<?php echo display('payment_method');?>',
					align: 'center',
					sortable:true,
					valign: 'middle'
				}, {
					field:'walletid',
					title: '<?php echo display('wallet_id');?>',
					align: 'center',
					sortable:true,
					valign: 'middle'
				},{
					field:'amount',
					title: '<?php echo display('amount');?>',
					align: 'center',
					sortable:true,
					valign: 'middle'
				},{
                                        field:'g_amount',
                                        title: '<?php echo display('amount_s');?>',
                                        align: 'center',
                                        sortable:true,
                                        valign: 'middle'
                                },{
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
		me.editstatus=function(value,row,index){
			if (row.status==1){return '<a class="btn btn-warning btn-sm"><?php echo display('pending_withdraw')?></a>';}
			else if(row.status==2){ return '<a  class="btn btn-success btn-sm"><?php echo display('success')?></a>';}
			else {return '<a  class="btn btn-danger btn-sm"><?php echo display('cancel')?></a>';}
		}


		me.editaction=function(value,row,index){
  if (row.status==1){return '<a  class="btn btn-success btn-sm" data-toggle="modal" data-userid="'+row.user_id+'" data-walletid="'+row.withdraw_id+'" data-target="#sendModal" ><?php echo display('confirm')?></a><a href="<?php echo base_url()?>backend/withdraw/withdraw/cancel_withdraw?id='+row.deposit_id+'&user_id='+row.user_id+'&set_status=2" class="btn btn-danger btn-sm"><?php echo display('cancel')?></a>';}			
else if(row.status==2){return {}}
else { return '<a href="#'+row.user_id+'" class="AjaxModal btn btn-info btn-sm" data-toggle="modal" data-target="#newModal"> Information</a>';}
		}


		me.runningFormatter=function(value, row, index) {return index+1;}


		me.ajaxme=function(){
			var result;
			$.ajax({
				type: "POST",
				async:false,
				url: '<?php  echo base_url("backend/withdraw/withdraw/w_p_l");?>',
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
<div class="modal fade modal-success" id="sendModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
 <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirm</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  <div class="modal-body">
      <div class="form-group">
        <label for="recipient-name" class="col-form-label">Wallet Password:</label>
	<input type="password" class="form-control" id="passwd">
<input type="hidden" id="walletid">
<input type="hidden" id="userid">
    </div>
    <div class="form-group">
       <button type="submit" id="pswss" class="btn btn-primary"><?php echo display('confirm');?></button>
   </div>

</form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

</div>
</div>
</div>
</div>
