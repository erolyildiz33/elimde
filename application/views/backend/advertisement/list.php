<div class="row">
<div class="col-sm-12 col-md-12">
  <div class="panel panel-bd lobidrag">
    <div class="panel-heading">
      <div class="panel-title">
	<h2><?php echo (!empty($title)?$title:null) ?></h2>
<div class="col-sm-3 col-md-3 pull-right">
                        <a class="btn btn-success w-md m-b-5 pull-right" href="<?php echo base_url("backend/cms/".$this->uri->segment(3)."/form") ?>"><i class="fa fa-plus" aria-hidden="true"></i> <?php echo display($this->uri->segment(3)); ?></a>
                    </div>
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
          field: 'name',
          title: '<?php echo display('name');?>',
          align: 'center',
          sortable:true,
          valign: 'middle'
        }, {
          formatter:me.editimage,
          title: '<?php echo display('image');?>',
          align: 'center',
          sortable:true,
          valign: 'middle'
        }, {
          field: 'script',
          title: '<?php echo display('embed_code');?>',
          align: 'center',
          sortable:true,
          valign: 'middle'
        },{
          formatter: me.editstatus,
          title: '<?php echo display('status');?>',
          align: 'center',
          sortable:true,
          formatter:me.editabout ,
          valign: 'middle'
        }]
      });
    };
    me.editstatus=function(value,row,index){ if (row.status==1) {return <?php echo display('active');?>} else{ return <?php echo display('inactive'); ?> };};
    me.editimage=function(value, row, index){
      if (!row.image) {return '<a href="'+row.url+'"><img src="<?php echo base_url(); ?>'+value.image+'" width="350" /></a>';}else{return '<a href="'+row.url+'"></a>';};};

      me.editabout=function(value,row,index){
        if(row.about.length > 20) {return row.about.substring(0,20);}else {return row.about;}
      }
      me.editmenu=function(value, row, index){
       if (row.is_admin == 1) { return 
        '<a href="<?php echo base_url("backend/cms/advertisement/form/");?>'+row.id+'" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="Update"><i class="fa fa-pencil" aria-hidden="true"></i></a><a href="<?php echo base_url("backend/cms/advertisement/delete/") ?>'+row.id+'" onclick="return confirm("<?php echo display("are_you_sure") ?>") class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="right" title="Delete "><i class="fa fa-trash-o" aria-hidden="true"></i></a>';
        
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
    var result;
    $.ajax({
      type: "POST",
      async:false,
      url: '<?php  echo base_url("backend/Ajax_load/advertisement");?>',
      data: {<?php echo $this->security->get_csrf_token_name(); ?>:'<?php echo $this->security->get_csrf_hash(); ?>'},
      success: function(data){
        if (data){
          result=data;
        }
      }
    });
    return result;
  };
  };

var My_do = null;

$(function () {
    Mydo = new MyClass();
    Mydo.ReadySystem();
});
</script>


