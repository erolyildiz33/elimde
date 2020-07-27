<link href="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table.min.css" rel="stylesheet">

<script src="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table-locale-all.min.js"></script>
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
            title:'<?php echo display('edit');?>',
            align: 'center',
            valign: 'middle',
            formatter:me.editmenu   
        },{
          formatter: me.runningFormatter,
          title: '<?php echo display('sl_no');?>',
          align: 'center',
          valign: 'middle'
      }, {
          field: 'user_id',
          formatter:me.operateFormatter,
          title: '<?php echo display('user_id');?>',
          align: 'center',
          sortable:true,
          valign: 'middle'
      }, {
          field: 'sponsor_id',
          title: '<?php echo display('sponsor_id');?>',
          align: 'center',
          sortable:true,
          valign: 'middle'
      }, {
          field: 'fullname',
          title: '<?php echo display('fullname');?>',
          align: 'center',
          sortable:true,
          valign: 'middle'
      },{
          field: 'username',
          title: '<?php echo display('username');?>',
          align: 'center',
          sortable:true,
          valign: 'middle'
      }, {
          field: 'email',
          title: '<?php echo display('email');?>',
          align: 'center',
          sortable:true,
          valign: 'middle'
      },{
        field: 'phone',
        title: '<?php echo display('mobile');?>',
        align: 'center',
        sortable:true,
        valign: 'middle'
    },{
        field: 'level',
        title: '<?php echo display('level');?>',
        align: 'center',
        sortable:true,
        valign: 'middle'
    },{
      field: 'statuss',
      title: '<?php echo display('status');?>',
      align: 'center',
      sortable:true,
      valign: 'middle'
  }]
});
  };
me.operateFormatter=function(value, row, index) {
    return [
      
      '<a href="<?php echo base_url();?>backend/user/user/user_details/' + row.uid + '" target="_blank">' + value + '</a>',
     
    ].join('')
  }
  
  me.editmenu=function(value, row, index){return '<a href="form/'+row.uid+'" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="Update"><i class="fa fa-pencil" aria-hidden="true"></i></a>';}
  me.runningFormatter=function(value, row, index) {return index+1;}
  me.rowStyle=function (row) {
    if (row.statuss ==0) {
      return {
        classes: 'bg-info'
      }
    }
    return {}
  }

 me.ajaxme=function(){
  var resul;
  $.ajax({
    type: "POST",
    async:false,
    url: '<?php  echo base_url("backend/user/User/allcount");?>',
    data: {<?php echo $this->security->get_csrf_token_name(); ?>:'<?php echo $this->security->get_csrf_hash(); ?>'},
    success: function(data){
      if (data){
	      result=data;
	      console.log(result);
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


