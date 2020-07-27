
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
        sortName:'date',
        sortOrder:'desc',
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
          field: 'amount',
          title: '<?php echo display('amount');?>',
          align: 'center',
          sortable:true,
          valign: 'middle'
      }, {
          field: 'category',
          title: '<?php echo display('category');?>',
          align: 'center',
          sortable:true,
          valign: 'middle'
      }, {
          field: 'comment',
          title: '<?php echo display('comment');?>',
          align: 'center',
          sortable:true,
          valign: 'middle'
      },{
          field: 'date',
          title: '<?php echo display('date');?>',
          align: 'center',
          sortable:true,
          valign: 'middle'
    }]
    });
  };



  me.runningFormatter=function(value, row, index) {return index+1;}


me.ajaxme=function(){
  var result;
  $.ajax({
    type: "POST",
    async:false,
    url: '<?php  echo base_url("customer/Commission/allbalance/").$this->session->userdata('user_id');?>',
    data: {<?php echo $this->security->get_csrf_token_name(); ?>:'<?php echo $this->security->get_csrf_hash(); ?>'},
    success: function(data){
      if (data){
        result=data;
    }
}
});
  return result;
};

me.rowStyle=function (row) {
    if (row.category =='Transfer' || row.category=='Investment' || row.category=='Withdraw') {
      return {
        classes: 'text-danger'
      }
    }
    else if (row.category =='Deposit' || row.category=='Reciver' || row.category=='Total Packets Earn' || row.category=='Referans Bonus' || row.category=='Level Bonus')  {
      return {
        classes: 'text-primary'
      }
    }
    else return {}
  };
  }

var My_do = null;

$(function () {
  My_do = new MyClass();
  My_do.ReadySystem();
});
</script>

