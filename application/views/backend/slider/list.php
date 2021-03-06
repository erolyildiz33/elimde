
<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="panel-title">
                    <h2><?php echo (!empty($title)?$title:null) ?></h2>
                    <div class="col-sm-3 col-md-3 pull-right">
                        <a class="btn btn-success w-md m-b-5 pull-right" href="<?php echo base_url("backend/cms/slider/form") ?>"><i class="fa fa-plus" aria-hidden="true"></i> <?php echo display('add_slider') ?></a>
                    </div>
                </div>
            </div>
            <div class="panel-body">
<table id="table" ><tbody class="sliderr"></tbody></table>
<div id="orderlist" style="display:none"></div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">


  function MyClass() {
    var me = this;
    me.MainTable = $('#table');
    me.MainTableBody = $('.sliderr');
    me.OrderList = $('#orderlist');
    me.ReadySystem = function () {
      me.MainTable.bootstrapTable({
        locale:'<?php echo display('table_lang');?>',
        search:true,
	rowAttributes:me.rowAttributes,
	pagination:true,
        pageList :"[10, 25, 50, 100, 200, All]",
        sidepagination:"server",
        data:$.parseJSON(me.ajaxme()),
        columns: [
        {
          title:'<?php echo display('action'); ?>',
          align: 'center',
          valign: 'middle',
          formatter:me.editmenu
        },{
          formatter: me.runningFormatter,
          title: '<?php echo display('sl_no');?>',
          align: 'center',
          valign: 'middle'
        }, {
          field: 'slider_h1_en' ,
          title: '<?php echo display('slider_h1_en');?>',
          align: 'center',
          valign: 'middle'
        }, {
          field: 'slider_h1_fr',
          title: '<?php echo display('slider_h1');?>',
          align: 'center',
          valign: 'middle'
        }, {
          formatter: me.editimage,
          title: '<?php echo display('image');?>',
          align: 'center',
          valign: 'middle'
        },{
          formatter:me.editstatus,
          title: '<?php echo display('status');?>',
          align: 'center',
          valign: 'middle'
        }]
      });
    };
me.editstatus=function(value,row,index){

  if (row.status==1){return '<?php echo display ("active");?>';}else{return '<?php echo display("inactive");?>';}

}
    me.editimage=function(value,row,index){

        return '<img src="<?php echo base_url()?>'+row.slider_img+'" width="150" />';

    }
me.rowAttributes=function(row, index) {
    return {
   
      'id':'order_'+row.slider_id,
      }
  }

    me.editmenu=function(value, row, index){

 return '<a href="<?php echo base_url("backend/cms/slider/form/")?>'+row.slider_id+'" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="Update"><i class="fa fa-pencil" aria-hidden="true"></i></a><a href="<?php echo base_url("backend/cms/slider/delete/")?>'+row.slider_id+'" onclick="return confirm("<?php echo display("are_you_sure") ?>")" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="right" title="Delete "><i class="fa fa-trash-o" aria-hidden="true"></i></a>';

}
me.runningFormatter=function(value, row, index) {return index+1;}
me.MainTableBody.sortable({
update: function( event, ui ){
	var newlist=me.MainTableBody.sortable('serialize');
	me.OrderList.load("<?php echo base_url('backend/user/User');?>/orderingslide?"+newlist);
        $(this).find('tr').each(function(i){
            $(this).find('td:nth(1)').text(i+1);
        });
    }
});



me.ajaxme=function(){
  var resul;
  $.ajax({
    type: "POST",
    async:false,
    url: '<?php  echo base_url("backend/Ajax_load/slider");?>',
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

