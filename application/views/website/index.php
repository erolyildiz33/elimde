<?php
$settings = $this->db->select("*")
->get('setting')
->row();
?>

<?php 
$i=1; 
foreach ($article as $hom_key => $hom_value) {
	$hom_headline[]     =   isset($lang) && $lang =="french"?$hom_value->headline_fr:$hom_value->headline_en;
	$hom_article1[]     =   isset($lang) && $lang =="french"?$hom_value->article1_fr:$hom_value->article1_en;
	$hom_article2[]     =   isset($lang) && $lang =="french"?$hom_value->article2_fr:$hom_value->article2_en;
	$hom_article_image[]=   $hom_value->article_image;

	$i++;

}

?>
<div role="main" class="main">

	<div class="slider-container rev_slider_wrapper" style="height: 670px;">
		<div id="revolutionSlider" class="slider rev_slider" data-version="5.4.8" data-plugin-revolution-slider data-plugin-options="{'delay': 9000, 'gridwidth': 1170, 'gridheight': 670, 'disableProgressBar': 'on', 'responsiveLevels': [4096,1200,992,500], 'parallax': { 'type': 'scroll', 'origo': 'enterpoint', 'speed': 1000, 'levels': [2,3,4,5,6,7,8,9,12,50], 'disable_onmobile': 'on' }, 'navigation' : {'arrows': { 'enable': false }, 'bullets': {'enable': true, 'style': 'bullets-style-1', 'h_align': 'center', 'v_align': 'bottom', 'space': 7, 'v_offset': 70, 'h_offset': 0}}}">
			<ul>
				<li class="slide-overlay slide-overlay-primary" data-transition="fade">
					<img src="img/slides/slide-corporate-1-1.jpg"  
					alt=""
					data-bgposition="center center" 
					data-bgfit="cover" 
					data-bgrepeat="no-repeat" 
					class="rev-slidebg">

					<?php $page_name=$settings->domain;
					$offset_start=-230; 
					$offset=75;
					$slider_time=-370;
					$slider_dec=115;
					$delay=1700;
					$delay_dec=400;
					foreach (str_split($page_name) as $key => $value) {
						$offset_start=$offset_start+$offset;
						$slider_time=$slider_time+$slider_dec;
						$delay=$delay+$delay_dec;
						?>
						<div class="tp-caption font-weight-extra-bold text-color-light"
						data-frames='[{"delay":<?php echo $delay; ?>,"speed":1000,"frame":"0","from":"opacity:0;x:-50%;","to":"opacity:0.7;x:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
						data-x="center" data-hoffset="['<?php if ($value=='I') echo ($offset_start-35); else echo $offset_start  ?>','<?php echo $offset_start; ?>','<?php echo $offset_start; ?>','<?php echo $slider_time; ?>']"
						data-y="center"
						data-fontsize="['145','145','145','250']"
						data-lineheight="['150','150','150','260']"><?php echo $value ?></div>
					<?php } ?>


					<div class="tp-caption font-weight-light text-color-light"
					data-frames='[{"from":"opacity:0;","speed":300,"to":"o:1;","delay":2300,"split":"chars","splitdelay":0.05,"ease":"Power2.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
					data-x="center"
					data-y="center" data-voffset="['85','85','85','140']" data-hoffset="['-30','-60','-60','140']"
					data-fontsize="['18','18','18','40']"
					data-lineheight="['26','26','26','45']"><?php echo $settings->message; ?></div>

				</li>
				<?php 
				$i=0; 
				foreach ($slider as $key => $value) {
					$slide_h1 =  isset($lang) && $lang =="french"?$value->slider_h1_fr:$value->slider_h1_en;
					$slide_h2 =  isset($lang) && $lang =="french"?$value->slider_h2_fr:$value->slider_h2_en;
					$slide_h3 =  isset($lang) && $lang =="french"?$value->slider_h3_fr:$value->slider_h3_en;
					$custom_url = $value->custom_url;
					?>
					<li class="slide-overlay" data-transition="fade">
						<img src="<?php echo base_url($value->slider_img); ?>"  
						alt=""
						data-bgposition="center center" 
						data-bgfit="cover" 
						data-bgrepeat="no-repeat" 
						class="rev-slidebg">

						<h1 class="tp-caption font-weight-extra-bold text-color-light negative-ls-2"
						data-frames='[{"delay":1000,"speed":2000,"frame":"0","from":"sX:1.5;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
						data-x="center"
						data-y="center" data-voffset="['-55','-55','-55','-55']"
						data-fontsize="['50','50','50','90']"
						data-lineheight="['55','55','55','95']"
						data-letterspacing="-1"><?php echo $slide_h1; ?></h1>

						<div class="tp-caption font-weight-light text-color-light"
						data-frames='[{"from":"opacity:0;","speed":300,"to":"o:0.8;","delay":2000,"split":"chars","splitdelay":0.05,"ease":"Power2.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
						data-x="center"
						data-y="center" data-voffset="['30','-5','-5','15']"
						data-fontsize="['18','18','18','35']"
						data-lineheight="['20','20','20','40']"><?php echo $slide_h2; ?></div>

						<a class="tp-caption btn btn-light font-weight-bold text-color-primary"
						href="<?php echo $custom_url; ?>"
						data-frames='[{"delay":3000,"speed":2000,"frame":"0","from":"y:50%;opacity:0;","to":"y:0;o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
						data-x="center" data-hoffset="['-120','-120','-120','-195']"
						data-y="center" data-voffset="['85','85','85','105']"
						data-paddingtop="['15','15','15','30']"
						data-paddingbottom="['15','15','15','30']"
						data-paddingleft="['33','33','33','50']"
						data-paddingright="['33','33','33','50']"
						data-fontsize="['13','13','13','25']"
						data-lineheight="['20','20','20','25']"><?php echo $slide_h3; ?></a>

						
					</li>
				<?php } ?>
			</ul>
		</div>
	</div>
</div>
<div class="ticker">
	<div class="list-wrpaaer">
		<ul id="marquee-horizontal">
			<?php foreach ($cryptocoins as $coin_key => $coin_value) {?>
				<li class="list-item" id="<?php echo $coin_value->Symbol ?>">
					<div class="list-item-currency" ><?php echo $coin_value->Symbol ?></div>
					<div class="list-item-currency upgrade">
						<span></span>
					</div>
				</li>
			<?php  } ?>
		</ul>
	</div>
</div>
<section class="section bg-color-grey-scale-1 section-height-3 border-0 m-0">
	<div class="container">

		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<div class="section_title">
					<h3><?php echo @$hom_headline[0]; ?></h3>
					<?php echo @$hom_article1[0]; ?>
				</div>
			</div>
		</div>
		<div class="row justify-content">
			<div class="col-sm-4">
				<div class="bitcoin-sack">
					<img src="<?php echo base_url(@$hom_article_image[0]); ?>" class="img-responsive center-block" alt="<?php echo strip_tags(@$hom_headline[0]); ?>">
				</div>
			</div>
			<div class="row">
				<div class="exchange-content">
					<form class="form-inline exchange-form" >
						<div class="input-group">
							<div class="input-group-btn">
								<select class="selectpicker convertfromcryptolist" id="convertfromcryptolist" data-width="80px" name="convertfromcryptolist">                                            
									<?php foreach ($cryptocoins as $coin_key => $coin_value) { ?>
										<option value="<?php echo $coin_value->Symbol; ?>"><?php echo $coin_value->Name; ?></option>
									<?php } ?>
									<option value="USD">USD</option>
								</select>
							</div>
							<input type="number" class="form-control convertfromcrypto" id="convertfromcrypto" name="convertfromcrypto">
						</div>
						<div class="exchange-btn">
							<span class="lnr lnr-arrow-right"></span>
						</div>
						<div class="input-group">
							<div class="input-group-btn">
								<select class="selectpicker converttocryptolist" id="converttocryptolist" data-width="80px" name="converttocryptolist">
									<option value="USD" selected>USD</option>
									<?php foreach ($cryptocoins as $coin_key => $coin_value) { ?>
										<option <?php echo $coin_value->Symbol=='USD'?'selected':NULL ?> value="<?php echo $coin_value->Symbol; ?>"><?php echo $coin_value->Name; ?></option>
									<?php } ?>
								</select>
							</div>
							<input type="number" class="form-control converttocrypto" id="converttocrypto" name="converttocrypto">
						</div>
					</form>

				</div>
			</div>
		</div>

	</div>
</section>
<div class="container">
	<div class="row counters counters-sm py-4 mt-5">
		<div class="currency-table">
			<div class="with-nav-tabs currency-tabs">
				<div class="tab-header">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#crypto" data-toggle="tab"><?php echo display('cryptocoins'); ?></a></li>
					</ul>
				</div>
				<div class="container">
					<div class="tab-content">
						<div class="tab-pane fade in active" id="crypto">
							<!-- <table id="cryptoTable" class="table table-striped table-hover nowrap" width="100%" cellspacing="0"> -->
								<table class="table table-striped table-hover nowrap" width="100%" cellspacing="0">
									<thead>
										<tr>
											<th><?php echo display('name'); ?></th>
											<th><?php echo display('ticker'); ?></th>
											<th><?php echo display('price'); ?></th>
											<th><?php echo display('24h_volume'); ?></th>
											<th><?php echo display('24h_change'); ?></th>
											<th><?php echo display('graph_24h'); ?></th>
										</tr>
									</thead>
									<tbody>

										<?php
										foreach ($cryptocoins as $cry_key => $cry_value) {
											$id                     = $cry_value->Id;
											$url                    = $cry_value->Url;
											$image                  = $cry_value->ImageUrl;
											$name                   = $cry_value->Name;
											$symbol                 = $cry_value->Symbol;
											$coinname               = $cry_value->CoinName;
											$fullname               = $cry_value->FullName;

											?>
											<tr data-href="<?php echo base_url("coin-details/$id"); ?>" id="BGCOLOR_<?php echo $symbol; ?>">
												<td>
													<div class="logo-name">
														<div class="item-logo">
															<img src="<?php echo base_url("$image"); ?>" class="img-responsive" alt="<?php echo strip_tags($fullname) ?>">
														</div>
														<span class="item_name_value"><?php echo $coinname; ?></span>
													</div>
												</td>
												<td><span class="value_ticker"><?php echo $symbol; ?></span></td>
												<td>$ <span class="price value_cap" id="PRICE_<?php echo $symbol; ?>"></span></td>
												<td><span class="value_max_quantity" id="VOLUME24HOURTO_<?php echo $symbol; ?>"></span></td>
												<td><span id="CHANGE24HOUR_<?php echo $symbol; ?>"></span><span id="CHANGE24HOURPCT_<?php echo $symbol; ?>"></span></td>


												<td>
													<span class="bdtasksparkline value_graph" id="GRAPH_<?php echo $symbol; ?>"></span>
												</td>
											</tr>

											<?php
										}
										?>
									</tbody>

								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<section class="section bg-color-grey-scale-1 section-height-3 border-0 m-0">
	<?php 
	$j=1; 
	foreach ($about as $abo_key => $abo_value) {
		$abo_headline[]     =   isset($lang) && $lang =="french"?$abo_value->headline_fr:$abo_value->headline_en;
		$abo_article1[]     =   isset($lang) && $lang =="french"?$abo_value->article1_fr:$abo_value->article1_en;
		$abo_article2[]     =   isset($lang) && $lang =="french"?$abo_value->article2_fr:$abo_value->article2_en;
		$abo_article_image[]=   $abo_value->article_image;
		$abo_article_video[]=   $abo_value->video;

		$j++;

	}

	?>


	<div class="about_content">
		<div class="container">
			<div class="row about-text justify-content">
				<div class="col-md-6">
					<div class="about-info">
						<h2><?php echo @$abo_headline[0]; ?></h2>
						<div class="definition"><?php echo @$abo_article1[0]; ?></div>
						<?php echo @$abo_article2[0]; ?>
						<a href="<?php echo base_url('contact'); ?>" class="btn btn-default mr-20 mb-10"><?php echo display('contact_us'); ?></a>
						<div class="play-button">
							<a href="<?php echo @$abo_article_video[0]; ?>" class="btn-play popup-youtube">
								<div class="play-icon"><i class="fa fa-play"></i></div>
								<div class="play-text">
									<div class="btn-title-inner">
										<div class="btn-title"><span><?php echo display('watch_video'); ?></span></div>
										<div class="btn-subtitle"><span><?php echo display('about_bitcoin'); ?></span></div>
									</div>
								</div>
							</a>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="text-right">
						<img src="<?php echo base_url(@$abo_article_image[1]); ?>" class="img-responsive" alt="<?php echo strip_tags(@$abo_headline[1]); ?>">
					</div>
					<div class="quote">
						<?php echo @$abo_article1[1]; ?>
						<div class="author-address"><?php echo @$abo_headline[1]; ?></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php 
$k=1; 
foreach ($service as $ser_key => $ser_value) {
	$ser_slug[]         =   $ser_value->slug;
	$ser_headline[]     =   isset($lang) && $lang =="french"?$ser_value->headline_fr:$ser_value->headline_en;
	$ser_article1[]     =   isset($lang) && $lang =="french"?$ser_value->article1_fr:$ser_value->article1_en;
	$ser_icon[]         =   $ser_value->video;

	$k++;

}

?> 
<div class="features__content">
	<div id="content__bg"></div>
	<div class="container">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<div class="section_title">
					<h3><?php echo @$hom_headline[1]; ?></h3>
					<?php echo @$hom_article1[1]; ?>
				</div>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="feature__box">
				<i class="<?php echo @$ser_icon[0]; ?>"></i>
				<div class="feature__content">
					<h3><a href="<?php echo base_url("service/".@$ser_slug[0]) ?>"><?php echo @$ser_headline[0]; ?></a></h3>
					<p><?php echo @$ser_article1[0]; ?></p>
				</div>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="feature__box">
				<i class="<?php echo @$ser_icon[1]; ?>"></i>
				<div class="feature__content">
					<h3><a href="<?php echo base_url("service/".@$ser_slug[1]) ?>"><?php echo @$ser_headline[1]; ?></a></h3>
					<p><?php echo @$ser_article1[1]; ?></p>
				</div>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="feature__box">
				<i class="<?php echo @$ser_icon[2]; ?>"></i>
				<div class="feature__content">
					<h3><a href="<?php echo base_url("service/".@$ser_slug[2]) ?>"><?php echo @$ser_headline[2]; ?></a></h3>
					<p><?php echo @$ser_article1[2]; ?></p>
				</div>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="feature__box">
				<i class="<?php echo @$ser_icon[3]; ?>"></i>
				<div class="feature__content">
					<h3><a href="<?php echo base_url("service/".@$ser_slug[3]) ?>"><?php echo @$ser_headline[3]; ?></a></h3>
					<p><?php echo @$ser_article1[3]; ?></p>
				</div>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="feature__box">
				<i class="<?php echo @$ser_icon[4]; ?>"></i>
				<div class="feature__content">
					<h3><a href="<?php echo base_url("service/".@$ser_slug[4]) ?>"><?php echo @$ser_headline[4]; ?></a></h3>
					<p><?php echo @$ser_article1[4]; ?></p>
				</div>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="feature__box">
				<i class="<?php echo @$ser_icon[5]; ?>"></i>
				<div class="feature__content">
					<h3><a href="<?php echo base_url("service/".@$ser_slug[5]) ?>"><?php echo @$ser_headline[5]; ?></a></h3>
					<p><?php echo @$ser_article1[5]; ?></p>
				</div>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="feature__box">
				<i class="<?php echo @$ser_icon[6]; ?>"></i>
				<div class="feature__content">
					<h3><a href="<?php echo base_url("service/".@$ser_slug[6]) ?>"><?php echo @$ser_headline[6]; ?></a></h3>
					<p><?php echo @$ser_article1[6]; ?></p>
				</div>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="feature__box">
				<i class="<?php echo @$ser_icon[7]; ?>"></i>
				<div class="feature__content">
					<h3><a href="<?php echo base_url("service/".@$ser_slug[7]) ?>"><?php echo @$ser_headline[7]; ?></a></h3>
					<p><?php echo @$ser_article1[7]; ?></p>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="crypto-strat">
	<div class="container">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<div class="section_title">
					<h3><?php echo @$hom_headline[2]; ?></h3>
					<?php echo @$hom_article1[2]; ?>                            
				</div>
			</div>
		</div>
		<div class="start-steps">
			<div class="start-step">
				<i class="step-icon flaticon-wallet"></i>
				<div class="start-step-info">
					<div class="step-name">
						<span><?php echo @$hom_headline[3]; ?></span>
					</div>
					<div class="step-text">
						<span><?php echo @$hom_article1[3]; ?></span>
					</div>
				</div>
			</div>
			<div class="start-step">
				<i class="step-icon flaticon-credit-card"></i>
				<div class="start-step-info">
					<div class="step-name">
						<span><?php echo @$hom_headline[4]; ?></span>
					</div>
					<div class="step-text">
						<span><?php echo @$hom_article1[4]; ?></span>
					</div>
				</div>
			</div>
			<div class="start-step">
				<!--<span class="start-step-number">3</span>-->
				<i class="step-icon flaticon-money-1"></i>
				<div class="start-step-info">
					<div class="step-name">
						<span><?php echo @$hom_headline[5]; ?></span>
					</div>
					<div class="step-text">
						<span><?php echo @$hom_article1[5]; ?></span>
					</div>
				</div>
			</div>
		</div>
		<a href="<?php echo base_url('buy'); ?>" class="btn btn-default"><?php echo display('get_start'); ?></a>
	</div>
</div>


<section class="section section-height-3 section-background section-text-light section-center overlay overlay-show overlay-op-9 overlay-color-primary m-0 appear-animation" data-appear-animation="fadeIn" >
	<div class="container">

		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<div class="section_title">
					<h3><?php echo @$hom_headline[6]; ?></h3>
					<?php echo @$hom_article1[6]; ?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="owl-testimonial owl-carousel owl-theme">
					<?php

					foreach ($testimonial as $tes_key => $tes_value) {
						$tes_headline     =   $tes_value->headline_en;
						$tes_article1     =   $tes_value->article1_en;
						$tes_article2     =   $tes_value->article2_en;
						$tes_article_image=   $tes_value->article_image;

						?>
						<div class="testimonial-panel">
							<div class="tes-quoteInfo">
								<img src="<?php echo base_url($tes_article_image); ?>" class="quoteAvatar" alt="<?php echo strip_tags($tes_headline); ?>">
								<div>
									<div class="quoteAuthor"><span><?php echo $tes_headline; ?></span></div>
									<div class="quotePosition">
										<span><?php echo $tes_article1; ?></span>
									</div>
								</div>
							</div>
							<div class="testimonial--body">
								<?php echo $tes_article2; ?>
							</div>
							<!-- /.testimonial-body end -->
						</div>
						<?php

					}

					?>
				</div>
			</div>
			<div class="col-sm-12">
				<div class="client-logo">

					<?php
					foreach ($client as $cli_key => $cli_value) {
						$cli_headline     =   $cli_value->headline_en;
						$cli_article1     =   $cli_value->article1_en;
						$cli_article_image=   $cli_value->article_image;

						?>
						<div class="logo-item">
							<a href="<?php echo $cli_article1; ?>" target="_blank"><img src="<?php echo base_url($cli_article_image); ?>" class="img-responsive" alt="<?php echo strip_tags($cli_headline); ?>"></a>
						</div>
						<?php

					}

					?>
					<!-- /.End of client logo -->
				</div>
			</div>
		</div>

	</div>
</section>



<section class="call-to-action call-to-action-strong-grey content-align-center call-to-action-in-footer">
	<div class="container">
		<div class="row">
			<div class="blog_content">
				<div class="container">
					<div class="row">
						<div class="col-sm-8 col-sm-offset-2">
							<div class="section_title">
								<h3><?php echo @$hom_headline[7]; ?></h3>
								<?php echo @$hom_article1[7]; ?>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="owl-blog owl-carousel owl-theme">

							<?php  
							foreach ($news as $news_key => $news_value) {
								$article_id         =   $news_value->article_id;
								$cat_id             =   $news_value->cat_id;
								$slug               =   $news_value->slug;
								$news_headline      =   isset($lang) && $lang =="french"?$news_value->headline_fr:$news_value->headline_en;
								$news_article1      =   isset($lang) && $lang =="french"?$news_value->article1_fr:$news_value->article1_en;
								$news_article_image =   $news_value->article_image;
								$publish_date       =   $news_value->publish_date;

								$cat_slug = $this->db->select("slug, cat_name_en, cat_name_fr")->from('web_category')->where('cat_id', $cat_id)->get()->row();
								?>
								<div class="item">
									<div class="post_grid">
										<div class="grid_img">
											<img src="<?php echo base_url($news_article_image); ?>" class="img-responsive" alt="<?php echo strip_tags($news_headline); ?>">
										</div>
										<div class="grid_body">
											<h3 class="post_heading"><a href="<?php echo base_url('news/'.$cat_slug->slug."/$slug"); ?>"><?php echo $news_headline; ?></a></h3>
											<time datetime="<?php echo $publish_date ?>" class="time">
												<?php
												$date=date_create($publish_date);
												echo date_format($date,"jS, F Y");
												?>    
											</time>
											<p><?php echo substr(strip_tags($news_article1), 0, 110); ?></p>
										</div>
									</div>
								</div>
								<?php

							}

							?>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

</div>

