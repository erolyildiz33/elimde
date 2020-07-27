 <div class="row">
 	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
 		<div class="panel panel-bd lobidrag">
 			<div class="panel-heading">
 				<div class="panel-title">
 					<h4><?php echo display('prediction');?></h4>
 				</div>
 			</div>
 			<div class="panel-body">
 				<div class="row">
 					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
 						<div class="border_preview">

              <?php echo form_open('customer/prediction/addnew',['name'=>"tahminform",'id'=>"tahminform"]);?>
              <div class="form-group row dolar">
                <label  class="col-sm-12 col-form-label"><?php echo display('coin_name');?> *</label>
                <div class="col-sm-12">
                  <select name="coin_name"  class="selectpicker show-tick" data-width="100%">
                    <?php foreach ($cryptolist as $key => $value) { ?>
                      <option data-subtext="<?php echo $value->name ?>"><?php echo $value->symbol ?></option>
                    <?php }?>
                  </select>
                </div>
              </div>
              <div class="form-group row yontem">
                <label class="col-sm-12 col-form-label"><?php echo display('prediction_method');?> *</label>
                <div class="col-sm-12">

                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline1" name="tahmin_sekli" value="0" class="custom-control-input">
                    <label class="custom-control-label" for="customRadioInline1">Seçilen Tarihte</label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline2" name="tahmin_sekli" value="1" class="custom-control-input">
                    <label class="custom-control-label" for="customRadioInline2">Seçilen Tarihe Kadar</label>
                  </div>

                  <input id="offertype" name="offertype" readonly="readonly" type="checkbox" data-width="100%" checked data-toggle="toggle" disabled data-on="<?php echo display('exact');?>" data-off="<?php echo display('approximative');?>" data-onstyle="primary" data-offstyle="info">
                </div>
              </div>
              <div class="form-group row">
                <label  class="col-sm-12 col-form-label"><?php echo display('predic_date');?> *</label>
                <div class="col-sm-12">
                  <input type="text" id="datepicker_exact" name="datepicker_exact"   readonly="readonly" class="form-control"  required type="text" placeholder="Tarih Seçiniz" >
                </div>
              </div>


              <div class="form-group row yatirim">
               <label  class="col-sm-12 col-form-label"><?php echo display('estimate_ammount');?> *</label>
               <div class="col-sm-12">
                <input class="form-control estimate" id="estimate" name="estimate" required type="text">
              </div>
            </div>



            <div class="form-group row exact">
             <label  class="col-sm-12 col-form-label"><?php echo display('prediction_exact_price');?> *</label>
             <span  class="col-sm-12 col-form-label text-danger"> (Örnek:<span class="fiyat"></span>)</span>
             <div class="col-sm-12">
              <input class="form-control predictionamount" id="exactprediction" name="exactprediction" required type="text" value="$ 0.00">
            </div>
          </div>
          <div class="form-group row hide approximative">
           <label  class="col-sm-12 col-form-label"><?php echo display('prediction_approximative_price');?> *</label>
           <div class="col-sm-12">
            <input class="form-control predictionamount" id="approximativeprediction" name="approximativeprediction" required type="text" value="$ 0.00">
          </div>
        </div>
        <div class="form-group row hide approximative">
         <label  class="col-sm-12 col-form-label"><?php echo display('plan');?> *</label>
         <div class="col-sm-12">
          <select id="plan" name="plan" class="selectpicker show-tick" data-width="100%">
           <?php foreach ($plan as $key => $value) { ?>
            <option data-subtext="<?php echo '± '.$value->rate ?>"><?php echo $value->name ?></option>
          <?php }?>
        </select>
      </div>
    </div>
    <div class="form-group row yolla">
     <div class="col-sm-8">
      <button type="button" id="kayitet" class="btn btn-success"><?php echo display("save") ?></button>
    </div>
  </div>
  <?php echo form_close();?>
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
 <div class="border_preview">
  <div class="count_panel">
   <div class="stats-title ">
    <h4><?php echo display('your_total_balance_is');?></h4>
  </div>
  <h1 id="curr_balance" class="currency_text text-success" style='font-family: Tahoma, Geneva, sans-serif;'></h1>
</div>
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
 <div class="border_preview">
  <div class="count_panel">
   <div class="stats-title ">
    <h4><?php echo display('current_price');?></h4>
  </div>
  <h1 id="curr_price" class="currency_text text-warning">$0.0</h1>
</div>
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
 <div class="border_preview">
  <div class="count_panel">
   <div class="stats-title ">
    <h4><?php echo display('predic_time');?></h4>
  </div>
  <h1 id="curr_time" class="currency_text text-danger"></h1>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
 <div class="panel panel-bd lobidrag">
  <div class="panel-heading">
   <div class="panel-title">
    <h4><?php echo display('prediction_list'); ?></h4>
  </div>
</div>
<div class="panel-body">
 <div class="table-responsive">
  <table class="table table-striped table-bordered table-hover">
   <thead>
    <tr>
     <th>Sıra No</th>
     <th>Para Adı</th>
     <th>Tahmin Türü</th>
     <th>Yatırım Miktarı</th>
     <th>Tahmin Fiyat</th>
     <th>Tarih</th>
     <th>Plan</th>
     <th>Durum</th>
   </tr>
 </thead>
 <tbody>
  <?php $i=0;foreach ($tahminler as $tahmin){ ?>
    <tr>
     <td><?php echo ++$i; ?></td>
     <td><?php echo $tahmin->coin_name; ?></td>
     <td><?php echo $tahmin->tahmin_sekli; ?></td>
     <td> <?php echo "$ ".$tahmin->yatirim; ?> </td>
     <td> <?php echo "$ ".$tahmin->tahmini_fiyat; ?> </td>
     <td><?php echo $tahmin->tarih; ?></td>
     <td><?php echo $tahmin->plan; ?></td>
     <td>
       <?php if ($tahmin->durum=="0"){ $durum="Beklemede"; $btn="warning";}
       elseif ($tahmin->durum=="1") {$durum="Kazandı";$btn="success";}
       elseif ($tahmin->durum=="2") {$durum="Kaybetti";$btn="danger";}
       elseif ($tahmin->durum=="3"){ $durum="İptal";$btn="default";} ?>
       <a  class="btn btn-<?php echo $btn;?> btn-xs"><?php echo $durum; ?></a>
     </td>
   </tr>
 <?php } ?>
</tbody>
</table>
</div>
<a href="http://localhost/customer/commission/my_payout">See all | See Payout</a>
</div>
</div>
</div>
</div>
<script type="text/javascript">
  function MyClass() {
   var me = this;
   me.tahmin_sekli= $('input:radio[name="tahmin_sekli"]');
   me.curr_price=$('#curr_price').text();
   me.curr_price=$('#curr_price');

   me.offertype=$('#offertype');
   me.datepicker_exact=$('#datepicker_exact');
   me.curr_time=$("#curr_time");
   me.coinslider=$("#coin-slider");
   me.curr_balance=$("#curr_balance");
   me.kayit=$("#kayitet");

   me.dolar=$(".dolar");
   me.cuzdanCls=$(".cuzdan");
   me.CoinSelectCls=$('.selectpicker');
   me.predictionamountCls=$('.predictionamount');
   me.approximativeCls=$('.approximative');
   me.exactCls=$('.exact');
   me.estimateCls=$('.estimate');
   me.dolarCls=$(".dolar");
   me.yatirimCls=$(".yatirim");
   me.yontemCls=$(".yontem");
   me.exactCls=$(".exact");
   me.fiyat=$('.fiyat');
   me.approximativeCls=$(".approximative");
   me.yollaCls=$(".yolla");
   me.tahminform=$("#tahminform");

   me.coin_info;
   me.coin;
   me.get_date;
   me.get_time;


   me.ReadySystem = function () {
     jQuery.datetimepicker.setLocale('tr');
     me.kayit.on("click",function () {
      if (!$("input[name='tahmin_sekli']:checked").val()) {
        alert('Tahmin Türü Seçiniz!');
        return false;
      }
      else{ 
        if (!me.datepicker_exact.val()) {
          alert('Tahmin Tarihi Seçiniz!');
          return false;
        }
        else if (!$("#estimate").val()) {
          alert('Yatırım Miktarı Giriniz!');
          return false;
        }
        if ($("input[name='tahmin_sekli']:checked").val()=="0"){
          if (me.offertype.prop('checked')==true) {
            if($('#exactprediction').val()=="$ 0.00"){
              alert('Kesin Tahmin Fiyatı Seçiniz!');
              return false;
            }
            else{
              var start =new Date(me.cevirDateTime(me.tahminzamani(me.get_update_time('BTC','USD')['RAW']['BTC']['USD'].LASTUPDATE))) ;
              var end = new Date(me.cevirDateTime(me.datepicker_exact.val()));
              var diff = end - start;
              if (diff<0){
                alert("Tahmin Süresi Gecikti.. Tekrar Deneyin.");
                return false;
              }
            }
          }else{
            if($('#approximativeprediction').val()=="$ 0.00"){
              alert('Yaklaşık Tahmin Fiyatı Seçiniz!');
              return false;
            }
            else
            {
              var start =new Date(me.cevirDateTime(me.tahminzamani(me.get_update_time('BTC','USD')['RAW']['BTC']['USD'].LASTUPDATE))) ;
              var end = new Date(me.cevirDateTime(me.datepicker_exact.val()));
              var diff = end - start;

              if (diff<0){
                alert("Tahmin Süresi Gecikti.. Tekrar Deneyin.");
                return false;
              }
            }
          }

        }
        else{
         if (me.offertype.prop('checked')==true) {
          if($('#exactprediction').val()=="$ 0.00"){
            alert('Kesin Tahmin Fiyatı Seçiniz!');
            return false;
          }
          else{
            var start =new Date(me.cevirDate(me.tahminzamani(me.get_update_time('BTC','USD')['RAW']['BTC']['USD'].LASTUPDATE))) ;
            var end = new Date(me.cevirDate(me.datepicker_exact.val()));
            var diff = end - start;
            if (diff<0){
              alert("Tahmin Süresi Gecikti.. Tekrar Deneyin.");
              return false;
            }
          }
        }else{
          if($('#approximativeprediction').val()=="$ 0.00"){
            alert('Yaklaşık Tahmin Fiyatı Seçiniz!');
            return false;
          }
          else
          {
            var start =new Date(me.cevirDate(me.tahminzamani(me.get_update_time('BTC','USD')['RAW']['BTC']['USD'].LASTUPDATE))) ;
            var end = new Date(me.cevirDate(me.datepicker_exact.val()));
            var diff = end - start;

            if (diff<0){
              alert("Tahmin Süresi Gecikti.. Tekrar Deneyin.");
              return false;
            }
          }
        }
      }
    }
    me.tahminform.submit();
  });
     me.cevirDate=function(zaman){
       var deger=zaman.split(" ");
       var tarih=deger[0].split("/");
       var gun=parseInt(tarih[0])+1;
       return tarih[2]+"/"+tarih[1]+"/"+ gun +" "+ deger[1];
     }
     me.date = new Date(me.cevirDate(me.tahminzamani(me.get_update_time('BTC','USD')['RAW']['BTC']['USD'].LASTUPDATE)));
     me.cevirDateTime=function(zaman){
      var deger=zaman.split(" ");
      var tarih=deger[0].split("/");
      return tarih[2]+"/"+tarih[1]+"/"+tarih[0]+" "+deger[1];
    }
    me.tahmin_sekli.change(function(){
      me.offertype.removeAttr('disabled');
      me.offertype.removeAttr('readonly');
      if($(this).val()=="1"){
        me.datepicker_exact.datetimepicker('destroy')
        .val('')
        .datetimepicker({
          format:'d/m/Y',
          formatDate:'d/m/Y',
          timepicker:false,
          minDate:me.date,
          startDate: me.date,
        });
      }
      else if($(this).val()=="0"){
        me.datepicker_exact.datetimepicker('destroy')
        .val('')
        .datetimepicker({
          format:'d/m/Y H:i',
          formatTime:'H:i',
          formatDate:'d/m/Y',
          step: 10,
          timepicker:true,
          minDateTime:me.tahminzamani(me.get_update_time('BTC','USD')['RAW']['BTC']['USD'].LASTUPDATE),
        });
      }
    });
    var balance=me.ajax("<?php echo( base_url("customer/prediction/get_deposit"));?>","USD");
    me.curr_balance.text(balance+" USD");
    me.estimateCls.maskMoney({
     thousands:'', 
     allowZero:false, 
     allowNegative:true, 
     defaultZero:false,
     precision:0,
     prefix:"$ ",
   });
    me.predictionamountCls.maskMoney({
      thousands:'',
      allowZero:false,
      allowNegative:true,
      defaultZero:false,
      precision:1,
      prefix:"$ ",
    });

   me.curr_price.text(me.get_update_time('BTC','USD')['RAW']['BTC']['USD']['PRICE']);
   me.curr_time.text(me.tahminzamani(me.get_update_time('BTC','USD')['RAW']['BTC']['USD'].LASTUPDATE));
   me.CoinSelectCls.on('change', function(){

     me.coin=this.value+" ";
     me.coin_info=me.get_update_time(this.value,'USD')['RAW'][this.value]['USD'];
     var text=me.coin_info['PRICE'];
     me.curr_price.text("$ "+text);

     if (text[0]!='Error') {
      if (this.value!='BTC'){
       var val='$ 0.';
       
       var length=0;
       if (text.toString().split('.')[1]){
        length=text.toString().split('.')[1].length;
      };
      for (var i = 0; i < length; i++) {
        val+='0'
      }
      me.predictionamountCls.val=val;
      me.predictionamountCls.maskMoney({precision: length-1,prefix:me.coin});
    }else{

     me.predictionamountCls.val=val;
     me.predictionamountCls.maskMoney({precision: 7,prefix:me.coin});
   }
  
 };

 me.fiyat.text("$ "+text.toString().substring(0,text.toString().length-1)+"x");

 me.datepicker_exact.datetimepicker('setOptions',{minDateTime:me.tahminzamani(me.coin_info.LASTUPDATE)});
});
   me.offertype.on('change', function(){
     if($(this).prop('checked')==true){
      me.approximativeCls.addClass('hide');
      me.exactCls.removeClass('hide');
    }else{
      me.approximativeCls.removeClass('hide');
      me.exactCls.addClass('hide');
    }
  });				
 };
 me.tahminzamani=function(timestamp){
  var dt = new Date(timestamp * 1000);
  if (dt.getMinutes()==0) {dt.setMinutes("10");}
  else if (dt.getMinutes()<=10) {dt.setMinutes("20");}
  else if (dt.getMinutes()<=20) {dt.setMinutes("30");}
  else if (dt.getMinutes()<=30) {dt.setMinutes("40");}
  else if (dt.getMinutes()<=40) {dt.setMinutes("50");}
  else if (dt.getMinutes()<=50) {dt.setMinutes("00");dt.setHours(dt.getHours() + 1 );}
  else if (dt.getMinutes()<=59) {dt.setMinutes("10");dt.setHours(dt.getHours() + 1 );}
  var dateStr =
  ("00" + dt.getDate()).slice(-2) + "/" +
  ("00" + (dt.getMonth() + 1)).slice(-2) + "/" +
  dt.getFullYear() + " " +
  ("00" + dt.getHours()).slice(-2) + ":" +
  ("00" + dt.getMinutes()).slice(-2) ;
  return (dateStr);
};
me.ajax=function(url,coin){
  var result;
  $.ajax({
   type: "POST",
   async:false,
   url: url,
   data: {<?php echo $this->security->get_csrf_token_name(); ?>:'<?php echo $this->security->get_csrf_hash(); ?>',coin:coin},
   success: function(data){
    if (data){
     result=data;						
   }
 }
});
  return result;
};
me.get_update_time=function(fromcoin,tocoin){
  var result;
  $.ajax({
   type: "GET",
   async:false,
   url: 'https://min-api.cryptocompare.com/data/pricemultifull',
   data: {<?php echo $this->security->get_csrf_token_name(); ?>:'<?php echo $this->security->get_csrf_hash(); ?>',fsyms:fromcoin,tsyms:tocoin},
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





