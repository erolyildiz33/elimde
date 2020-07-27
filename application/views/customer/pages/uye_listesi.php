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
        <div id="dialogRemove"></div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">


  function FaturaSinif() {
    var me = this;
    me.AnaTablo = $('#roottable');
    me.dialogRemove = $('dialogRemove');
    me.AgacYol = [];
    me.detailTableRowClicked = false;
    me.sonOkunanUser = null;
    

    me.HazirlikIslemleri = function () {

      me.AnaTablo.bootstrapTable({
        locale:'<?php echo display('table_lang');?>',
        search:true,
        showrefresh:true,
        showtoggle:true,
        showfullscreen:true,
        showcolumns:true,
        showexport:true,
        clicktoselect:true,
        pagination:true,
        pagelist:'[10, 25, 50, 100, all]',
        detailFilter:me.detailFilter,
        sidepagination:"server",
        detailView:true,
        data:$.parseJSON(me.ajaxyap('<?php echo $this->session->userdata("user_id"); ?>','<?php  echo base_url("customer/t/kol1");?>')),
        detailFormatter:me.detailFormatterana,
        columns: [{
          formatter: me.runningFormatter,
          title: '<?php echo display('sl_no');?>',
          align: 'center',
          valign: 'middle'
        }, {
          field: 'user_id',
          title: '<?php echo display('user_id');?>',
          align: 'center',
          valign: 'middle'
        }, {
          field: 'username',
          title: '<?php echo display('username');?>',
          align: 'center',
          valign: 'middle'
        }, {
          field: 'yatirim',
          title: '<?php echo display('personal_invest');?>',
          align: 'center',
          valign: 'middle'
        }, {
          field: 'level',
          title: 'User level',
          align: 'center',
          valign: 'middle'
        }, {
          field:'derinlik',
          visible:true,
          title: '<?php echo display('deep');?>',
          align: 'center',
          valign: 'middle',
          formatter: '1'
        }]

      });

      me.AnaTablo.on('check.bs.table', function (e, row, $el) 
      {

        if (!me.detailTableRowClicked) 
        {  
          me.removeConfirmationDialog(null, row, this.user_id);
        }
        me.detailTableRowClicked = false;
      });

    };
    me.removeConfirmationDialog=function(expandedRow, row, caller) {
      me.dialogRemove.dialog({
        modal: true,
        buttons: [{
          text: "OK",
          click: function() {          
            $(this).dialog("close");
          }
        },{
          text: "Cancel",
          click: function() {  
            if (caller == "roottable") {
              $('#'+caller).bootstrapTable('uncheck', row.user_id-1);  
            } else if (caller == "detailTable"+expandedRow) {
              $('#detailTable'+expandedRow).bootstrapTable('uncheck', row.user_id-1);
            }
            $(this).dialog("close");
          }
        }
        ],
      });  

    };


    me.detailFormatter=function(index, row, element) {
      me.sonOkunanUser = row;
      if(me.AgacYol[row.sponsor_id]){
        me.AgacYol[row.user_id] = me.AgacYol[row.sponsor_id] + 1;
      } else {
        me.AgacYol[row.user_id] = 2;
      }

    
      var expandedRow = row.user_id;
      $(element).html("<table id='detailTable"+expandedRow+"' ></table>");
 
      $('#detailTable'+expandedRow).bootstrapTable({
        locale:'<?php echo display('table_lang');?>',
        data:$.parseJSON(me.ajaxyap(expandedRow)),
        detailView:true,
        detailFilter:me.detailFilter,
        detailFormatter:me.detailFormatter,
        showHeader: false ,
        columns: [{
          formatter: me.runningFormatter,
          title: '<?php echo display('sl_no');?>',
          align: 'center',
          valign: 'middle'
        }, {
          field: 'user_id',
          title: '<?php echo display('user_id');?>',
          align: 'center',
          valign: 'middle'
        }, {
          field: 'username',
          title: '<?php echo display('username');?>',
          align: 'center',
          valign: 'middle'
        }, {
          field: 'yatirim',
          title: 'personal_invest',
          align: 'center',
          valign: 'middle'
        }, {
          field: 'level',
          title: '<?php echo display('level');?>',
          align: 'center',
          valign: 'middle'
        }, {
          field:'derinlik',
          visible:true,
          title: '<?php echo display('deep');?>',
          formatter:  me.derinlikFormatter,
          align: 'center',
          valign: 'middle'
        }]

      });

      $('#detailTable'+expandedRow).on('check.bs.table', function (e, row, $el) {

        me.detailTableRowClicked = true;
        me.removeConfirmationDialog(expandedRow, row, this.user_id);
      });

    };

    me.detailFormatterana=function(index, row, element) {
      me.sonOkunanUser = row;
      if(me.AgacYol[row.sponsor_id]){
        me.AgacYol[row.user_id] = me.AgacYol[row.sponsor_id] + 1;
      } else {
        me.AgacYol[row.user_id] = 2;
      }

      $('.detail-view').css("background-color","#F3E5C3");
      var expandedRow = row.user_id;
      $(element).html("<table id='detailTable"+expandedRow+"' ></table>");

      $('#detailTable'+expandedRow).bootstrapTable({
        locale:'<?php echo display('table_lang');?>',
        data:$.parseJSON(me.ajaxyap(expandedRow)),
        detailView:true,
        detailFilter:me.detailFilter,
        detailFormatter:me.detailFormatter,
        showHeader: false ,
        columns: [{
          formatter: me.runningFormatter,
          title: '<?php echo display('sl_no');?>',
          align: 'center',
          valign: 'middle'
        }, {
          field: 'user_id',
          title: '<?php echo display('user_id');?>',
          align: 'center',
          valign: 'middle'
        }, {
          field: 'username',
          title: '<?php echo display('username');?>',
          align: 'center',
          valign: 'middle'
        }, {
          field: 'yatirim',
          title: '<?php echo display('personal_invest');?>',
          align: 'center',
          valign: 'middle'
        }, {
          field: 'level',
          title: '<?php echo display('level');?>',
          align: 'center',
          valign: 'middle'
        }, {
          field:'derinlik',
          visible:true,
          title: '<?php echo display('deep');?>',
          formatter:  me.derinlikFormatter,
          align: 'center',
          valign: 'middle'
        }]

      });

      $('#detailTable'+expandedRow).on('check.bs.table', function (e, row, $el) {

        me.detailTableRowClicked = true;
        me.removeConfirmationDialog(expandedRow, row, this.user_id);
      });

    };
   
    me.derinlikFormatter=function(value, row, index) {return me.AgacYol[me.sonOkunanUser.user_id];}
    me.runningFormatter=function(value, row, index) {return index+1;}
    me.detailFilter=function(index, row) {if ($.parseJSON(me.ajaxyap(row.user_id))[0]){return 1;}else{return 0;}}
    me.ajaxyap=function(user_id,url='<?php  echo base_url("customer/t/altgetir");?>'){
      var sonuc;
      $.ajax({
        type: "POST",
        async:false,
        url: url,
        data: {'user_id':user_id,<?php echo $this->security->get_csrf_token_name(); ?>:'<?php echo $this->security->get_csrf_hash(); ?>'},

        success: function(data){

          if (data){
            sonuc=data;
            
            
          }
        }

      });

      return sonuc;
    }

  }

  var Fatura = null;

  $(function () {
    Fatura = new FaturaSinif();
    Fatura.HazirlikIslemleri();
  });
</script>

