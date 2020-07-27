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
            title:'<?php echo display('action');?>',
            align: 'center',
            valign: 'middle',
            formatter:me.editmenu   
        },{
          formatter: me.runningFormatter,
          title: '<?php echo display('sl_no');?>',
          align: 'center',
          valign: 'middle'
      }, {
          formatter:me.editimage ,
          title: '<?php echo display('image');?>',
          align: 'center',
          sortable:true,
          valign: 'middle'
      }, {
          field: 'fullname',
          title: '<?php echo display('fullname');?>',
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
          field: 'about',
          title: '<?php echo display('about');?>',
          align: 'center',
          sortable:true,
          formatter:me.editabout ,
          valign: 'middle'
      }, {
          field: 'last_login',
          title: '<?php echo display('last_login');?>',
          align: 'center',
          sortable:true,
          valign: 'middle'
      },{
        field: 'last_logout',
        title: '<?php echo display('last_logout');?>',
        align: 'center',
        sortable:true,
        valign: 'middle'
    },{
      field: 'ip_address',
      title: '<?php echo display('ip_address');?>',
      align: 'center',
      sortable:true,
      valign: 'middle'
  },{
      field: 'status',
      title: '<?php echo display('status');?>',
      align: 'center',
      sortable:true,
      formatter:me.editstatus ,
      valign: 'middle'
  }]
});
  };
   me.editstatus=function(value,row,index){ if (row.status==1) {return '<?php echo display('active');?>'} else{ return '<?php echo display('inactive'); ?>' };
   };
    me.editimage=function(value, row, index){
      if (!row.images) {return '<img src="<?php echo base_url('assets/images/icons/user.png');?>" alt="Image" height="64">';}else {return '<img src="<?php echo base_url();?>'+row.images+'"alt="Image" height="64">';};
    } 
    me.editabout=function(value,row,index){
       return '<?php echo character_limiter("'+row.about+'", 20); ?>';
  }
  me.editmenu=function(value, row, index){
if (row.is_admin == 1) { return '<button class="btn btn-info btn-sm" title="<?php echo display("admin") ?>"><?php echo display("admin")?></button>';
      } else { return  '<button class="btn btn-info btn-sm" title="<?php echo display("sub_admin") ?>"><?php echo display("sub_admin")?></button> <br><br><a href="<?php echo base_url("backend/dashboard/admin/form/")?>'+row.id+'" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="Update"><i class="fa fa-pencil" aria-hidden="true"></i></a><a href="<?php echo base_url("backend/dashboard/admin/delete/")?>'+row.id+'" onclick="return confirm("<?php echo display("are_you_sure")?>") class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="right" title="Delete "><i class="fa fa-trash-o" aria-hidden="true"></i></a>';
      } 

  }
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
    url: '<?php  echo base_url("backend/Ajax_load/admin");?>',
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
    Mydo = new MyClass();
    Mydo.ReadySystem();
});
</script>


