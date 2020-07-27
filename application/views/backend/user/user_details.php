<div class="row">
    <div class="col-sm-6 col-md-6">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="panel-title">
                    <h2><?php echo display('user_info') ?></h2>
                </div>
            </div>
            <div class="panel-body">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group row">
                        <label for="cid" class="col-sm-4 col-form-label"><?php echo display('user_id') ?></label>
                        <div class="col-sm-8">
                            <?php echo $user->user_id ?></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cid" class="col-sm-4 col-form-label"><?php echo display('username') ?></label>
                        <div class="col-sm-8">
                            <?php echo $user->username ?></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cid" class="col-sm-4 col-form-label"><?php echo display('sponsor_id') ?></label>
                        <div class="col-sm-8">
                            <?php echo $user->sponsor_id ?></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cid" class="col-sm-4 col-form-label"><?php echo display('language') ?></label>
                        <div class="col-sm-8">
                            <?php echo $user->language ?></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cid" class="col-sm-4 col-form-label"><?php echo display('firstname') ?></label>
                        <div class="col-sm-8">
                            <?php echo $user->f_name ?></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cid" class="col-sm-4 col-form-label"><?php echo display('lastname') ?></label>
                        <div class="col-sm-8">
                            <?php echo $user->l_name ?></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cid" class="col-sm-4 col-form-label"><?php echo display('email') ?></label>
                        <div class="col-sm-8">
                            <?php echo $user->email ?></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cid" class="col-sm-4 col-form-label"><?php echo display('mobile') ?></label>
                        <div class="col-sm-8">
                            <?php echo $user->phone ?></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cid" class="col-sm-4 col-form-label"><?php echo display('registered_ip') ?></label>
                        <div class="col-sm-8">
                            <?php echo $user->reg_ip ?></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cid" class="col-sm-4 col-form-label"><?php echo display('status') ?></label>
                        <div class="col-sm-8">
                            <?php echo ($user->status==1)?display('active'):display('inactive'); ?></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cid" class="col-sm-4 col-form-label">Registered Date</label>
                        <div class="col-sm-8">
                            <?php 
                                $date=date_create($user->created);
                                echo date_format($date,"jS F Y");  
                            ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>














    <div class="col-sm-6 col-md-6">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="panel-title">
                    <h2>Deposit<?php //echo display('user_info') ?></h2>
                </div>
            </div>

            <div class="panel-body">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr> 
                                <th><?php echo display('sl_no') ?></th>
                                <th><?php echo display('deposit_amount') ?></th> 
                                <th><?php echo display('deposit_method') ?></th> 
                                <th><?php echo display('date') ?></th> 
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($deposit)) ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($deposit as $value) { ?>
 <tr>
                                <td><?php echo $sl++; ?></td>
                                <td><?php echo $value->deposit_amount; ?></td>
                                <td><?php echo $value->deposit_method; ?></td>
                                <td><?php 
                                        $date=date_create($value->deposit_date);
                                        echo date_format($date,"jS F Y"); ?></td>
                            </tr>
                            <?php } ?> 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



    <div class="col-sm-6 col-md-6">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="panel-title">
                    <h2>Investment<?php //echo display('user_info') ?></h2>
                </div>
            </div>

            <div class="panel-body">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr> 
                                <th><?php echo display('sl_no') ?></th>
                                <th><?php echo display('sponsor_id') ?></th> 
                                <th><?php echo display('amount') ?></th> 
                                <th><?php echo display('date') ?></th> 
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($investment)) ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($investment as $value) { ?>
                            <tr>
                                <td><?php echo $sl++; ?></td>
                                <td><?php echo $value->sponsor_id; ?></td>
                                <td><?php echo $value->amount; ?></td>
                                <td>
                                    <?php 
                                        $date=date_create($value->invest_date);
                                        echo date_format($date,"jS F Y"); 
                                    ?>
                                </td>
                            </tr>
                            <?php } ?> 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



</div>


<div class="row">
  <div class="col-sm-12 col-md-12">
    <div class="panel panel-bd lobidrag">
      <div class="panel-heading">
        <div class="panel-title">
          <h2>Balance</h2>
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
        url: '<?php  echo base_url("backend/user/User/allbalance/").$this->db->select('user_id')->from('user_registration')->where('uid',$this->uri->segment(5))->get()->row()->user_id;?>',
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
 
