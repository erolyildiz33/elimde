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
        pagination:true,
        pageList :"[10, 25, 50, 100, 200, All]",
        sidepagination:"server",
        data:$.parseJSON(me.ajaxme()),
        columns: [
        {
          title:'<?php echo display('action')."/".display('status'); ?>',
          align: 'center',
          valign: 'middle',
          formatter:me.editmenu
        },{
          formatter: me.runningFormatter,
          title: '<?php echo display('sl_no');?>',
          align: 'center',
          valign: 'middle'
        }, {
          field: 'user_id' ,
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
        }, {
          field: 'deposit_method',
          title: '<?php echo display('payment_method');?>',
          align: 'center',
          sortable:true,
          valign: 'middle'
        },{
          field: 'fees',
          title: '<?php echo display('fees');?>',
          align: 'center',
          sortable:true,
          valign: 'middle'
        }, {
          formatter:me.editcoment,
          title: '<?php echo display('comments');?>',
          align: 'center',
          sortable:true,
          valign: 'middle'
        },{
          formatter:me.dateForm,
          title: '<?php echo display('date');?>',
          align: 'center',
          sortable:true,
          valign: 'middle'
        }]
      });
    };
me.dateForm=function(value,row,index){

   var resul;
  $.ajax({
    type: "POST",
    async:false,
    url: '<?php  echo base_url("backend/Ajax_load/datecoment");?>',
    data: {'deposit_date':row.deposit_date,<?php echo $this->security->get_csrf_token_name(); ?>:'<?php echo $this->security->get_csrf_hash(); ?>'},
    success: function(data){
      if (data){
        result=data;
      }
    }
  });
  return result;
}
    me.editcoment=function(value,row,index){
      if (typeof row.comments == "string" && typeof row.comments == "array") {

        var mobiledata = row.comments;
        return '<b>OM Name:</b> '+mobiledata.om_name+'<br><b>OM Phone No:</b> '+mobiledata.om_mobile+'<br><b>Transaction No:</b> '+mobiledata.transaction_no+'<br><b>ID Card No:</b> '.mobiledata.idcard_no;
      } else {
        return row.comments;
      } 
    }


    me.editmenu=function(value, row, index){

if (row.status==1){
return '<a class="btn btn-success btn-sm"><?php echo display('success')?></a>';

} else if(row.status==2){
  return '<a class="btn btn-danger btn-sm"><?php echo display('cancel')?></a>';
} else {
return '<a href="<?php echo base_url()?>backend/deposit/deposit/confirm_deposit?id='+row.deposit_id+'&user_id='+row.user_id+'&set_status=1" class="btn btn-success btn-sm"><?php echo display('confirm')?></a><a href="<?php echo base_url()?>backend/deposit/deposit/cancel_deposit?id='+row.deposit_id+'&user_id='+row.user_id+'&set_status=2" class="btn btn-danger btn-sm"><?php echo display('cancel')?></a>';

}

}
me.runningFormatter=function(value, row, index) {return index+1;}

me.ajaxme=function(){
	var resul;
	var statusme;
	var pageURL = window.location.href;
	var url = pageURL.substr(pageURL.lastIndexOf('/') + 1);
	if (url=='pending_deposit'){statusme=0;}
	if (url=='deposit_list'){statusme=1;}
  $.ajax({
    type: "POST",
    async:false,
    url: '<?php  echo base_url("backend/Ajax_load/deposit_all");?>',
    data: {'status':statusme,<?php echo $this->security->get_csrf_token_name(); ?>:'<?php echo $this->security->get_csrf_hash(); ?>'},
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
  Mydo = new MyClass();
  Mydo.ReadySystem();
});
</script>

