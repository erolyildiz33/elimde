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
	sortName:'quaranti',
	sortOrder:'asc',
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
          field: 'quaranti',
          title: '<?php echo display('quaranti');?>',
          align: 'center',
          sortable:true,
          valign: 'middle'
      }, {
          field: 'date',
          title: '<?php echo display('date');?>',
          align: 'center',
          sortable:true,
          valign: 'middle'
      }, {
          field: 'package_name',
          title: '<?php echo display('package_name');?>',
          align: 'center',
          sortable:true,
          valign: 'middle'
      },{
          field: 'p_amount',
          title: '<?php echo display('p_amount');?>',
          align: 'center',
          sortable:true,
          valign: 'middle'
      }, {
          field: 'amount',
          title: '<?php echo display('amount');?>',
          align: 'center',
          sortable:true,
          valign: 'middle'
      },{
        field: 'earning_types',
        title: '<?php echo display('earning_types');?>',
        align: 'center',
        sortable:true,
        valign: 'middle'
    },{
      field: 'yuzde',
      title: '<?php echo display('Percent');?>',
      align: 'center',
      sortable:true,
      valign: 'middle'
  },{
      field: 'Purchaser_id',
      title: '<?php echo display('Purchaser_id');?>',
      align: 'center',
      sortable:true,
      valign: 'middle'
  },{
      field: 'fullname',
      title: '<?php echo display('name');?>',
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
    url: '<?php  echo base_url("customer/Commission/allcount");?>',
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


