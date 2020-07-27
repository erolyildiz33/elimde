<div class="row">
  <div class="col-sm-12 col-md-12">
    <div class="panel panel-bd lobidrag">
      <div class="panel-heading">
        <div class="panel-title">
          <h2><?php echo (!empty($title)?$title:null) ?></h2>
          <div class="col-sm-3 col-md-3 pull-right">
            <a class="btn btn-success w-md m-b-5 pull-right" href="<?php echo base_url("backend/currency/Currency_cronjob/updateCurency") ?>"><i class="fa fa-refresh" aria-hidden="true"></i> <?php echo display('refresh_currency'); ?></a>
          </div>
        </div>
      </div>
      <div class="panel-body">
        <table   id="roottable"></table> 
      </div>
    </div>
  </div>
</div>
<?php $this->load->model(array(
      'backend/currency/currency_model'  
    ));

    $localcurrency = $this->currency_model->findlocalCurrency();

    ?>
<script type="text/javascript">


  function FaturaSinif() {
    var me = this;
    me.AnaTablo = $('#roottable');

    me.HazirlikIslemleri = function () {
      me.AnaTablo.bootstrapTable({
        locale:'<?php echo display('table_lang');?>',
        search:true,
        pagination:true,
        pageList :"[10, 25, 50, 100, 200, All]",
        sidepagination:"server",
        data:$.parseJSON(me.ajaxyap()),
        columns: [
        { 
          title:'<?php echo display('action');?>',
          align: 'center',
          valign: 'middle',
          formatter:me.editmenu   
        },{
          formatter:me.runningFormatter,
          title: '<?php echo display('sl_no');?>',
          align: 'center',
          valign: 'middle'
        },{
          field:'name',
          title: '<?php echo display('name');?>',
          align: 'center',
          valign: 'middle'
        }, {
          field: 'symbol',
          title: '<?php echo display('symbol');?>',
          align: 'center',
          sortable:true,
          valign: 'middle'
        },{
          field: 'price_usd',
          title: 'USD',
          align: 'center',
          sortable:true,
          valign: 'middle'
        },{
          formatter: me.editcurr,
          title: '<?php echo $localcurrency->currency_name; ?>',
          align: 'center',
          sortable:true,
          valign: 'middle'
        },{
          field: 'price_btc',
          title: 'BTC',
          align: 'center',
          sortable:true,
          valign: 'middle'
        }, {
          formatter: me.editstatus,
          title: '<?php echo display('status');?>',
          align: 'center',
          sortable:true,
          valign: 'middle'
        }]
      });
    };
    me.editstatus=function(value,row,index){ if (row.status==1) {return "<?php echo display('active');?>"} else{ return "<?php echo display('inactive'); ?>" };};

    me.editmenu=function(value, row, index){
     return '<a href="<?php echo base_url("backend/currency/currency/form/")?>'+row.cid+'" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="Update"><i class="fa fa-pencil" aria-hidden="true"></i></a>';



   }

   me.editcurr=function(value,row,index){
    var sonuc;
    $.ajax({
      type: "POST",
      async:false,
      url: '<?php  echo base_url("backend/Ajax_load/editcurr");?>',
      data: {'price_usd':row.price_usd,<?php echo $this->security->get_csrf_token_name(); ?>:'<?php echo $this->security->get_csrf_hash(); ?>'},
      success: function(data){
        if (data){
          sonuc=data;
        }
      }
    });
    return sonuc;
  };


   
   me.runningFormatter=function(value, row, index) {return index+1;}

   me.ajaxyap=function(){
    var sonuc;
    $.ajax({
      type: "POST",
      async:false,
      url: '<?php  echo base_url("backend/Ajax_load/all");?>',
      data: {<?php echo $this->security->get_csrf_token_name(); ?>:'<?php echo $this->security->get_csrf_hash(); ?>'},
      success: function(data){
        if (data){
          sonuc=data;
        }
      }
    });
    return sonuc;
  };
}


var Fatura = null;

$(function () {
  Fatura = new FaturaSinif();
  Fatura.HazirlikIslemleri();
});
</script>


