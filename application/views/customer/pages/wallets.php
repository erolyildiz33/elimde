<style type="text/css">
	.modal {
		text-align: center;
		padding: 0!important;
	}
	.modal-body{
		overflow-y: scroll;
	}

	.modal:before {
		content: '';
		display: inline-block;
		height: 100%;
		vertical-align: middle;
		margin-right: -4px; /* Adjusts for spacing */
	}

	.modal-dialog {
		display: inline-block;
		text-align: left;
		vertical-align: middle;
	}
</style>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="panel panel-bd lobidrag">
			<div class="panel-heading">
				<div class="panel-title">
					<h4><?php echo display('wallets');?></h4>
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="border_preview">
							<div class="form-group row">
								<?php foreach ($wallets as $key => $value) { ?>
									<div class="col-sm-4 text-center border_preview" style="padding: 10px;">
										<img src="<?php echo base_url('assets/images/logos/').$value->logo;?>" width="200">
										<?php  $wid=""; 

										foreach ($my_cuzdan as $key2 => $value2) {
											if($value2->symbol==$value->symbol){ $wid=$value2->wallet;} 
										}
										if ($wid){ ?>
											<div data-symbol="<?php echo $value->symbol;?>" class="colum_panel walletdetail" style="padding: 10px;">
												<span class="btn btn-primary btn-block ">
													<?php echo display("wallet_address").": ".$wid; ?>
												</span>
											</div>
										<?php }else{ ?>
											<div data-symbol="<?php echo $value->symbol;?>" class="colum_panel walletdetail"  style="padding: 10px;">
												<input type="button"  data-symbol="<?php echo $value->symbol;?>" value="<?php echo display('creat_address');?>" class="btn btn-primary btn-block creatwallet">
											</div>
										<?php	} ?>
									</div>
								<?php }  ?>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				<h4 class="modal-title sendSymbol" id="myModalLabel"></h4>
			</div>
			<div class="modal-body">
				...
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">

	function MyClass() {
		var me = this;
		me.curr_price=$('#curr_price').text();
		me.curr_price=$('#curr_price');
		me.offertype=$('#offertype');
		me.datepicker_exact=$('#datepicker_exact');
		me.curr_time=$("#curr_time");
		me.coinslider=$("#coin-slider");
		me.curr_balance=$("#curr_balance");

		me.walletDetailCLS=$(".walletdetail");
		me.creatwalletCLS=$(".creatwallet")
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
		me.approximativeCls=$(".approximative");
		me.yollaCls=$(".yolla");

		me.coin_info;
		me.coin;
		me.get_date;
		me.get_time;


		me.ReadySystem = function () {


			$('.modal').on('show.bs.modal', me.centerModal);
			$(window).on("resize", function () {
				$('.modal:visible').each(me.centerModal);
			});






			me.creatwalletCLS.on("click",function(event){
				var yeni=me.ajax("<?php echo base_url('customer/wallets/creat');?>",$(this).data('symbol'));
				if (yeni!="oldu"){
					$(this).val("<?php echo display("wallet_address");?>"+": "+yeni);
				}
			});
			me.walletDetailCLS.on("click",function(e){
				
				e.preventDefault();
				var symbol = $(this).attr('data-symbol');
				var cuzdandetay=jQuery.parseJSON(me.ajax("<?php echo base_url('customer/wallets/get_all');?>",symbol.toString()))[0] ;
				var body="<?php echo display('your_wallet_id');?> :"+cuzdandetay.wallet_id+
				"<?php echo display('your_private_key');?> :"+cuzdandetay.private_key+
				"<?php echo display('your_public_key');?> :"+cuzdandetay.public_key;
				if(cuzdandetay.wif){
					body+="<?php echo display('your_wif');?> :"+cuzdandetay.wif;
				}
				$('.sendSymbol').html(symbol+" <?php echo display('walletdetail');?>");
				$('.modal-body').html(body);
				$('#myModal').modal("show");

				


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
			me.coinslider.slick({
				dots: false,
				infinite: true,
				slidesToShow: 1,
			}).on('afterChange', function(event, slick, currentSlide, nextSlide){
				var dataId = $('.slick-current').attr("data-walletid"); 
				var balance=me.ajax("<?php echo( base_url("customer/prediction/get_deposit"));?>",dataId);
				var length=0;
				if (dataId!="USD"){
					me.curr_balance.text(balance+" "+dataId);
					me.dolar.addClass('hide');
					me.offertype.prop('checked', true).change();


					length=me.get_update_time(dataId,'USD')['RAW'][dataId]['USD']['PRICE'].toString().split('.')[1].length;
					me.estimateCls.maskMoney({thousands:'', allowZero:false, allowNegative:true, defaultZero:false,precision:length,prefix:dataId+" "});
				}
				else {
					me.curr_balance.text(balance+" USD");
					me.dolar.removeClass('hide');

					me.offertype.prop('checked', true).change();

					me.estimateCls.maskMoney({thousands:'', allowZero:false, allowNegative:true, defaultZero:false,precision:0,prefix:"$ "});

				}

			});

			me.datepicker_exact.datetimepicker({
				format:'d/m/Y H:i',
				formatTime:'H:i',
				formatDate:'d/m/Y',
				step: 10,
			});

			me.cuzdanCls.attr("src","https://www.cryptocompare.com"+me.get_update_time('BTC','USD')['RAW']['BTC']['USD']['IMAGEURL']);
			me.curr_price.text(me.get_update_time('BTC','USD')['RAW']['BTC']['USD']['PRICE']);
			me.curr_time.text(me.tahminzamani(me.get_update_time('BTC','USD')['RAW']['BTC']['USD'].LASTUPDATE));

			me.CoinSelectCls.on('change', function(){
				me.coin=this.value+" ";
				me.coin_info=me.get_update_time(this.value,'USD')['RAW'][this.value]['USD'];
				var text=me.coin_info['PRICE'];
				if (text[0]!='Error') {
					if (this.value!='BTC'){
						var val='$ 0.';
						me.curr_price.text("$ "+text);
						var length=0;
						if (text.toString().split('.')[1]){
							length=text.toString().split('.')[1].length;
						};
						for (var i = 0; i < length; i++) {
							val+='0'
						}
						me.predictionamountCls.val=val;
						me.predictionamountCls.maskMoney({precision: length,prefix:me.coin});
					}else{
						me.predictionamountCls.val=val;
						me.predictionamountCls.maskMoney({precision: 8,prefix:me.coin});
					}
				};
				var bosdeger=new Date(me.coin_info.LASTUPDATE * 1000).toLocaleDateString();
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
		me.centerModal=function() {
			$(this).css('display', 'block');
			var $dialog = $(this).find(".modal-dialog");
			var offset = ($(window).height() - $dialog.height()) / 2;
    // Center modal vertically in window
    $dialog.css("margin-top", offset);
}
me.afterAction=function(){
	console.log(this.owl.currentItem);
}
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





