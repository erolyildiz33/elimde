
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
          formatter: me.runningFormatter,
          title: '<?php echo display('sl_no');?>',
          align: 'center',
          valign: 'middle'
        }, {
          formatter: me.editcoin_name,
          title: '<?php echo display('coin_name');?>',
          align: 'center',
          sortable:true,
          valign: 'middle'
        }, {
          formatter: me.editfullname,
          title: '<?php echo display('fullname');?>',
          align: 'center',
          sortable:true,
          valign: 'middle'
        }, {
          field: 'coin_wallet_id',
          title: '<?php echo display('wallet_data');?>',
          align: 'center',
          sortable:true,
          valign: 'middle'
        }, {
          field: 'transection_type',
          title: '<?php echo display('transection_type');?>',
          align: 'center',
          sortable:true,
          valign: 'middle'
        },{
          field: 'coin_amount',
          title: '<?php echo display('coin_amount');?>',
          align: 'center',
          sortable:true,
          valign: 'middle'
        }, {
          field: 'usd_amount',
          title: '<?php echo display('usd_amount');?>',
          align: 'center',
          sortable:true,
          valign: 'middle'
        },{
          field: 'local_amount',
          title: '<?php echo display('local_amount');?>',
          align: 'center',
          sortable:true,
          valign: 'middle'
        },{
          field: 'payment_method',
          title: '<?php echo display('payment_method');?>',
          align: 'center',
          sortable:true,
          valign: 'middle'
        }, {
          field: 'date_time',
          title: '<?php echo display('date');?>',
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
    me.editstatus=function(value,row,index){if (row.status==0){return "<?php echo display('cancel');?>";}else{if (row.status==1){return "<?php echo display('request');?>";}else{return "<?php echo display('complete');?>";}};};
    me.editfullname=function(value,row,index){
      var result;
      $.ajax({
        type: "POST",
        async:false,
        url: '<?php  echo base_url("backend/exchange/Exchange/userinfo/");?>'+row.user_id,
        data: {<?php echo $this->security->get_csrf_token_name(); ?>:'<?php echo $this->security->get_csrf_hash(); ?>'},
        success: function(data){
          if (data){
            result=data;
          }
        }
      });
      return result;
    }
    me.editcoin_name=function(value,row,index){
      var result;
      $.ajax({
        type: "POST",
        async:false,
        url: '<?php  echo base_url("backend/exchange/Exchange/currency/");?>'+row.coin_id,
        data: {<?php echo $this->security->get_csrf_token_name(); ?>:'<?php echo $this->security->get_csrf_hash(); ?>'},
        success: function(data){
          if (data){
            result=data;
          }
        }
      });
      return result;
    };



    me.editaction=function(value,row,index){
      return '<a href="<?php echo base_url("backend/exchange/exchange/form/");?>'+row.ext_exchange_id+'" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="Update"><i class="fa fa-pencil" aria-hidden="true"></i></a>';

    }


    me.runningFormatter=function(value, row, index) {return index+1;}


    me.ajaxme=function(){
      var result;
      $.ajax({
        type: "POST",
        async:false,
        url: '<?php  echo base_url("backend/exchange/Exchange/ex_list");?>',
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

