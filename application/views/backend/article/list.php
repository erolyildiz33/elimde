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
        },{
          field:'headline_en',
          title: '<?php echo display('headline_en');?>',
          align: 'center',
          valign: 'middle'
        }, {
          formatter:me.editcat ,
          title: '<?php echo display('category');?>',
          align: 'center',
          sortable:true,
          valign: 'middle'
        }, {
          field: 'position_serial',
          title: '<?php echo display('sl_no');?>',
          align: 'center',
          sortable:true,
          valign: 'middle'
        }]
      });
    };
    me.editstatus=function(value,row,index){ if (row.status==1) {return "<?php echo display('active');?>"} else{ return "<?php echo display('inactive'); ?>" };};

    me.editmenu=function(value, row, index){
     return '<a href="<?php echo base_url("backend/cms/".$this->uri->segment(3)."/form/")?>'+row.article_id+'" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="Update"><i class="fa fa-pencil" aria-hidden="true"></i></a><a href="<?php echo base_url("backend/cms/".$this->uri->segment(3)."/delete/")?>'+row.article_id+'" onclick="return confirm("<?php echo display("are_you_sure") ?>")" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="right" title="Delete "><i class="fa fa-trash-o" aria-hidden="true"></i></a>';

   }
   me.runningFormatter=function(value, row, index) {return index+1;}

me.editcat=function(value,row,index){

  return me.ajal(row.cat_id);
}
me.ajal=function(cat_id){
{
    var result;
    $.ajax({
      type: "POST",
      async:false,
      url: '<?php  echo base_url("backend/Ajax_load/articlesingle");?>',
      data: {'cat_id':cat_id,<?php echo $this->security->get_csrf_token_name(); ?>:'<?php echo $this->security->get_csrf_hash(); ?>'},
      success: function(data){
        if (data){
          result=data;
        }
      }
    });
    return result;
  };
}
   me.ajaxme=function(){
    var result;
    $.ajax({
      type: "POST",
      async:false,
      url: '<?php  echo base_url("backend/Ajax_load/article");?>',
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


