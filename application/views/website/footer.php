<?php
$settings = $this->db->select("*")
->get('setting')
->row();
?>

<footer id="footer" class="border-0" style="background: url('<?php echo base_url("assets/website/img");?>/parallax-8.jpg'); background-size:cover; background-position: 0 100%;">



    <div class="main_footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-md-4">
                    <div class="widget-contact">
                        <ul class="list-icon">
                            <li><i class="fas fa-map-marker-alt"></i> <?php echo $settings->description ?></li>
                            <li><i class="fas fa-phone-alt"></i> <?php echo $settings->phone ?> </li>
                            <li><i class="fa fa-envelope"></i> <a href="mailto:<?php echo $settings->email ?>"><?php echo $settings->email ?></a>
                            </li>
                            <li>
                                <br><i class="far fa-clock"></i><?php echo $settings->office_time ?>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-5 col-md-4 col-md-offset-1">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="footer-box">
                                <h3 class="footer-title"><?php echo display('our_company'); ?></h3>
                                <ul class="footer-list">
                                    <?php
                                    foreach ($category as $cat_key => $cat_value) {
                                        if ($cat_value->menu==2 || $cat_value->menu==3) { 
                                           $cat_name = isset($lang) && $lang =="french"?$cat_value->cat_name_fr:$cat_value->cat_name_en;
                                           $cat_slug = $cat_value->slug;
                                           ?>
                                           <li><a href="<?php echo base_url($cat_slug); ?>"><?php echo  $cat_name ?></a></li>
                                           <?php
                                       }                               
                                   }
                                   ?>
                               </ul>
                           </div>
                       </div>
                       <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="footer-box">
                            <h3 class="footer-title"><?php echo display('services'); ?></h3>
                            <ul class="footer-list">
                                <?php 

                                foreach ($service as $ser_key => $ser_value) {

                                    $ser_headline    =   isset($lang) && $lang =="french"?$ser_value->headline_fr:$ser_value->headline_en;
                                    ?>

                                    <li><a href="<?php echo base_url("service/".$ser_value->slug); ?>"><?php echo $ser_headline ?></a></li>
                                    <?php

                                }

                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 col-md-3">
                <div class="newsletter-box">
                    <h3 class="footer-title"><?php echo display('email_newslatter'); ?></h3>
                    <p><?php echo display('subscribe_to_our_newsletter'); ?></p>
                    <?php echo form_open('#','id="subscribeForm"  class="newsletter-form" name="subscribeForm" '); ?>
                    <form class='newsletter-form' action='#' method='post'>
                        <input name="subscribe_email" placeholder="<?php echo display('email'); ?>" type="email">
                        <button type="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                        <div class="envelope">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </div>
                        <?php echo form_close() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.End of main footer -->
    <div class="sub_footer">
        <div class="container">
            <div class="logos-wrapper">
                <div class="logos-row">
                    <div class="social-content">
                        <div class="social-row">
                            <div class="social_icon">
                                <?php foreach ($social_link as $key => $value) {
                                if ($value->status==1) { ?>
                                    <a href="<?php echo $value->link; ?>" class=""><i class="fab fa-<?php echo $value->icon; ?>"></i></a>
                                <?php } }?>
                            </div>

                        </div>
                    </div>
                    <div class="copyright">
                        <span><?php echo $settings->footer_text; ?></span>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- /.End of sub footer -->

    <!-- /.End of footer -->

        <style>

            #message {

                display:none;

                position: relative;

                padding: 20px;

                margin-top: 10px;

            }

            #message p {

                margin-bottom: 0;

            }

            .input .valid {

                color: green;

            }

            .input .valid:before {

                position: relative;

                left: -10px;

                content: "✔";

            }

            .input .invalid {

                color: red;

            }

            .input .invalid:before {

                position: relative;

                left: -10px;

                content: "✖";

            }

        </style>

        <script type="text/javascript">

            var myInput = document.getElementById("pass");

            var letter  = document.getElementById("letter");

            var capital = document.getElementById("capital");

            var special = document.getElementById("special");

            var number  = document.getElementById("number");

            var length  = document.getElementById("length");



            myInput.onfocus = function() {

                document.getElementById("message").style.display = "block";

            }

            myInput.onblur = function() {

                document.getElementById("message").style.display = "none";

            }



            myInput.onkeyup = function() {



              var lowerCaseLetters = /[a-z]/g;

              if(myInput.value.match(lowerCaseLetters)) {  

                letter.classList.remove("invalid");

                letter.classList.add("valid");

              } else {

                letter.classList.remove("valid");

                letter.classList.add("invalid");

              }



              var upperCaseLetters = /[A-Z]/g;

              if(myInput.value.match(upperCaseLetters)) {  

                capital.classList.remove("invalid");

                capital.classList.add("valid");

              } else {

                capital.classList.remove("valid");

                capital.classList.add("invalid");

              }



              var specialCharacter = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/g;

              if(myInput.value.match(specialCharacter)) {  

                special.classList.remove("invalid");

                special.classList.add("valid");

              } else {

                special.classList.remove("valid");

                special.classList.add("invalid");

              }



              var numbers = /[0-9]/g;

              if(myInput.value.match(numbers)) {  

                number.classList.remove("invalid");

                number.classList.add("valid");

              } else {

                number.classList.remove("valid");

                number.classList.add("invalid");

              }



              if(myInput.value.length >= 8) {

                length.classList.remove("invalid");

                length.classList.add("valid");

              } else {

                length.classList.remove("valid");

                length.classList.add("invalid");

              }

            }



            //Confirm Password check

            function rePassword() {

                var pass = document.getElementById("pass").value;

                var r_pass = document.getElementById("r_pass").value;



                if (pass !== r_pass) {

                    document.getElementById("r_pass").style.borderColor = '#f00';

                    return false;

                }

                else{

                    document.getElementById("r_pass").style.borderColor = 'unset';

                    return true;

                }

            }

            //Valid Email Address Check

            function checkEmail() {

                var email = document.getElementById('email');

                var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;



                if (!filter.test(email.value)) {

                    document.getElementById("email").style.borderColor = '#f00';

                    return false;

                }

                else{

                    document.getElementById("email").style.borderColor = 'unset';

                    return true;

                }

            }

            //Registration From validation check

            function validateForm() {

                var f_name    = document.forms["registerForm"]["f_name"].value;

                var l_name    = document.forms["registerForm"]["l_name"].value;

                var username  = document.forms["registerForm"]["username"].value;

                // var sponsor_id= document.forms["registerForm"]["sponsor_id"].value;

                var email     = document.forms["registerForm"]["email"].value;

                var phone     = document.forms["registerForm"]["phone"].value;

                var country   = document.forms["registerForm"]["country"].value;

                var pass      = document.forms["registerForm"]["pass"].value;

                var r_pass    = document.forms["registerForm"]["r_pass"].value;

                var checkbox  = document.forms["registerForm"]["accept_terms"].value;



                if (f_name == "") {

                    alert("First Name Required");

                    return false;

                }

                if (l_name == "") {

                    alert("Last Name Required");

                    return false;

                }

                if (username == "") {

                    alert("User Name Required");

                    return false;

                }

                if (country == "") {

                    alert("Country Required");

                    return false;

                }

                if (phone == "") {

                    alert("Phone Required");

                    return false;

                }

                if (email == "") {

                    alert("Email Required");

                    return false;

                }

                if (pass == "") {

                    alert("Password Required.");

                    return false;

                }

                if (pass.length < 8) {

                    alert("Please Enter at least 8 Characters input");

                    return false;

                }

                if (r_pass == "") {

                    alert("Confirm Password must be filled out");

                    return false;

                }

                if (checkbox == "") {

                    alert("Must Confirm Privacy Policy and Terms and Conditions");

                    return false;

                }

            }

        </script>
    <!-- Home nad Coin Market Page Script -->
    <?php if ($this->uri->segment(1)=='' || $this->uri->segment(1)=='home' || $this->uri->segment(1)=='coinmarket') { ?>
        <style type="text/css">
            /*#crypto  table tbody tr td > .up {
                color: green;
            }

            #crypto  table tbody tr td > .down {
                color: red;
                }*/
                #crypto  table tbody tr.upbg {
                    background-color: rgba(255, 78,34,.2);
                }

                #crypto  table tbody tr.downbg {
                    background-color: rgba(37,37,142,0.2);
                }

                #crypto  table tbody tr td > .exchange {
                    color: #42f492;
                }
            </style>
            <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.6/angular.min.js"></script>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/1.7.2/socket.io.js"></script>
            <script src="<?php echo base_url('assets/website/streamer/ccc-streamer-utilities.js'); ?>"></script>
            <script type="text/javascript">

                $(document).ready(function() {

                    var currentPrice = {};
                    var socket = io.connect('https://streamer.cryptocompare.com/');
            //Format: {SubscriptionId}~{ExchangeName}~{FromSymbol}~{ToSymbol}
            //Use SubscriptionId 0 for TRADE, 2 for CURRENT and 5 for CURRENTAGG
            //For aggregate quote updates use CCCAGG as market

            <?php 

            $coin_stream="";
            foreach ($cryptocoins as $coin_key => $coin_value) {
                $coin_stream .= "'5~CCCAGG~".$coin_value->Symbol."~USD',";
            }
            ?>
            var subscription = [<?php echo rtrim($coin_stream, ','); ?>];
            socket.emit('SubAdd', { subs: subscription });
            socket.on("m", function(message) {
                var messageType = message.substring(0, message.indexOf("~"));
                var res = {};
                if (messageType == CCC.STATIC.TYPE.CURRENTAGG) {
                    res = CCC.CURRENT.unpack(message);
                    dataUnpack(res);
                }
            });

            var dataUnpack = function(data) {
                var from = data['FROMSYMBOL'];
                var to = data['TOSYMBOL'];
                var fsym = CCC.STATIC.CURRENCY.getSymbol(from);
                var tsym = CCC.STATIC.CURRENCY.getSymbol(to);
                var pair = from + to;

                if (!currentPrice.hasOwnProperty(pair)) {
                    currentPrice[pair] = {};
                }

                for (var key in data) {
                    currentPrice[pair][key] = data[key];
                }

                if (currentPrice[pair]['LASTTRADEID']) {
                    currentPrice[pair]['LASTTRADEID'] = parseInt(currentPrice[pair]['LASTTRADEID']).toFixed(0);
                }
                currentPrice[pair]['CHANGE24HOUR'] = CCC.convertValueToDisplay(tsym, (currentPrice[pair]['PRICE'] - currentPrice[pair]['OPEN24HOUR']));
                currentPrice[pair]['CHANGE24HOURPCT'] = ((currentPrice[pair]['PRICE'] - currentPrice[pair]['OPEN24HOUR']) / currentPrice[pair]['OPEN24HOUR'] * 100).toFixed(2) + "%";;
                displayData(currentPrice[pair], from, tsym, fsym);
            };

            var displayData = function(current, from, tsym, fsym) {
                var priceDirection = current.FLAGS;
                for (var key in current) {
                    if (key == 'CHANGE24HOURPCT') {
                        $('#' + key + '_' + from).text(' (' + current[key] + ')');
                    }
                    else if (key == 'LASTVOLUMETO' || key == 'VOLUME24HOURTO') {
                        $('#' + key + '_' + from).text(CCC.convertValueToDisplay(tsym, current[key]));
                    }
                    else if (key == 'LASTVOLUME' || key == 'VOLUME24HOUR' || key == 'OPEN24HOUR' || key == 'OPENHOUR' || key == 'HIGH24HOUR' || key == 'HIGHHOUR' || key == 'LOWHOUR' || key == 'LOW24HOUR') {
                        $('#' + key + '_' + from).text(CCC.convertValueToDisplay(fsym, current[key]));
                    }
                    else {
                        $('#' + key + '_' + from).text(current[key]);
                    }
                }

                $('#PRICE_' + from).removeClass();
                $('#BGCOLOR_' + from).removeClass();
                if (priceDirection & 1) {
                    $('#PRICE_' + from).addClass("up");
                    $('#BGCOLOR_' + from).addClass("upbg");
                }
                else if (priceDirection & 2) {
                    $('#PRICE_' + from).addClass("down");
                    $('#BGCOLOR_' + from).addClass("downbg");
                }
                if (current['PRICE'] > current['OPEN24HOUR']) {
                    $('#CHANGE24HOURPCT_' + from).removeClass();
                    $('#CHANGE24HOURPCT_' + from).addClass("up");
                }
                else if (current['PRICE'] < current['OPEN24HOUR']) {
                    $('#CHANGE24HOURPCT_' + from).removeClass();
                    $('#CHANGE24HOURPCT_' + from).addClass("down");
                }
            };
        });

    </script>

    <!-- Sparkline Ajax 
    <script type="text/javascript">
        $(function(){
            window.setTimeout(function(){
                $( ".value_graph").text("Loading...");
                $.ajax({
                    url: "<?php echo base_url('home/coingraphdata/'.$this->uri->segment(2)) ?>",
                    type: "GET",
                    dataType : "json",
                    success: function(result,status,xhr) {

                        var keys = Object.keys(result);
                        for(var i=0;i<keys.length;i++){
                            var key = keys[i];
                            $( "#GRAPH_"+key).text(result[key]);
                            $('#GRAPH_'+key).sparkline('html', {type:'line', height:'40px', lineWidth:1, lineColor:'#35a947', fillColor:false, spotColor:'red'} );
                        }

                    },
                    error: function(xhr,status,error){
                        console.log("No Grap Found!!!");

                    }
                });
            }, 500);
        });

    </script>-->
<?php } ?>

</form></div></div></div></div></div></footer>

<!-- Vendor -->
<script src="<?php echo base_url("assets/website/"); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url("assets/website/"); ?>vendor/jquery.appear/jquery.appear.min.js"></script>
<script src="<?php echo base_url("assets/website/"); ?>vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="<?php echo base_url("assets/website/"); ?>vendor/jquery.cookie/jquery.cookie.min.js"></script>
<script src="<?php echo base_url("assets/website/"); ?>vendor/popper/umd/popper.min.js"></script>
<script src="<?php echo base_url("assets/website/"); ?>vendor/bootstrap/js/bootstrap.min.js"></script>
 


<script src="<?php echo base_url("assets/website/"); ?>vendor/common/common.min.js"></script>


<script src="<?php echo base_url('assets/website/js/jquery.marquee.min.js'); ?>"></script>
<script src="<?php echo base_url("assets/website/"); ?>vendor/jquery.validation/jquery.validate.min.js"></script>
<script src="<?php echo base_url("assets/website/"); ?>vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
<script src="<?php echo base_url("assets/website/"); ?>vendor/jquery.gmap/jquery.gmap.min.js"></script>
<script src="<?php echo base_url("assets/website/"); ?>vendor/jquery.lazyload/jquery.lazyload.min.js"></script>
<script src="<?php echo base_url("assets/website/"); ?>vendor/isotope/jquery.isotope.min.js"></script>
<script src="<?php echo base_url("assets/website/"); ?>vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="<?php echo base_url("assets/website/"); ?>vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
<script src="<?php echo base_url("assets/website/"); ?>vendor/vide/jquery.vide.min.js"></script>
<script src="<?php echo base_url("assets/website/"); ?>vendor/vivus/vivus.min.js"></script>

<script src="<?php echo base_url('assets/website/js/parallax-background.min.js'); ?>"></script>


<script src="<?php echo base_url("assets/website/"); ?>js/bootstrap-select.min.js"></script>


<!-- Theme Base, Components and Settings -->
<script src="<?php echo base_url("assets/website/"); ?>js/theme.js"></script>

<!-- Current Page Vendor and Views -->
<script src="<?php echo base_url("assets/website/"); ?>vendor/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
<script src="<?php echo base_url("assets/website/"); ?>vendor/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
<script src="<?php echo base_url("assets/website/"); ?>js/classie.min.js"></script>
<!-- Theme Custom -->
<script src="<?php echo base_url("assets/website/"); ?>js/custom.js"></script>

<!-- Theme Initialization Files -->
<script src="<?php echo base_url("assets/website/"); ?>js/theme.init.js"></script>
<script src="<?php echo base_url("assets/"); ?>sweetalert2/dist/sweetalert2.min.js"></script>

        <!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information.
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
        
            ga('create', 'UA-12345678-1', 'auto');
            ga('send', 'pageview');
        </script>
    -->

    <script type="text/javascript">
        $(function(){

            var cryptolistfrom;
            var cryptolistto;
            var amountfrom;
            var amountto;

            $("#convertfromcryptolist").on("change", function(event) {
                event.preventDefault();
                $( "#convertfromcrypto").val(1);
                cryptolistfrom = $("#convertfromcryptolist").val(); 
                cryptolistto = $("#converttocryptolist").val();

                $.getJSON("https://min-api.cryptocompare.com/data/price?fsym="+cryptolistfrom+"&tsyms="+cryptolistto+"", function(result) {
                    if (result[Object.keys(result)[0]]=='Error') {
                     alert("No Conversion Found!!!");
                 }
                 else {
                    $( "#converttocrypto").val(result[Object.keys(result)[0]]);
                };
            });
            });

            $("#converttocryptolist").on("change", function(event) {
                event.preventDefault();
                $( "#converttocrypto").val(1);
                cryptolistfrom = $("#convertfromcryptolist").val(); 
                cryptolistto = $("#converttocryptolist").val();

                $.getJSON("https://min-api.cryptocompare.com/data/price?fsym="+cryptolistto+"&tsyms="+cryptolistfrom+"", function(result) {
                    if (result[Object.keys(result)[0]]=='Error') {
                     alert("No Conversion Found!!!");
                 }
                 else {
                    $( "#convertfromcrypto").val(result[Object.keys(result)[0]]);
                };
            });
            });

            $("#convertfromcrypto").on("keyup", function(event) {
                event.preventDefault();
                cryptolistfrom = $("#convertfromcryptolist").val();
                cryptolistto = $("#converttocryptolist").val();
                amountfrom = parseFloat($("#convertfromcrypto").val())|| 1;

                $.getJSON("https://min-api.cryptocompare.com/data/price?fsym="+cryptolistfrom+"&tsyms="+cryptolistto+"", function(result) {
                    if (result[Object.keys(result)[0]]=='Error') {
                     alert("No Conversion Found!!!");
                 }
                 else {
                    $( "#converttocrypto").val(result[Object.keys(result)[0]]*amountfrom);
                };
            });

            });

            $("#converttocrypto").on("keyup", function(event) {
                event.preventDefault();
                cryptolistfrom = $("#convertfromcryptolist").val();
                cryptolistto = $("#converttocryptolist").val();
                amountto = parseFloat($("#converttocrypto").val())|| 1;

                $.getJSON("https://min-api.cryptocompare.com/data/price?fsym="+cryptolistto+"&tsyms="+cryptolistfrom+"", function(result) {
                    if (result[Object.keys(result)[0]]=='Error') {
                     alert("No Conversion Found!!!");
                 }
                 else {
                    $("#convertfromcrypto").val(result[Object.keys(result)[0]]*amountto);
                };
            });

            });               

        });
    </script>


    <script type="text/javascript">
        function isValidEmailAddress(emailAddress) {
            var pattern = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            return pattern.test(emailAddress);
        }

        $(function(){
            $("#subscribeForm").on("submit", function(event) {
                event.preventDefault();
                var inputdata = $("#subscribeForm").serialize();
                var email = $('input[name=subscribe_email]').val();

                if (email == "") {
                    alert("Please Input Your Email !!!");
                    return false;
                }
                if (!isValidEmailAddress(email)) {
                    alert("Please Enter Valid Email !!!");
                    return false;
                }

                $.ajax({
                    url: "<?php echo base_url('home/subscribe'); ?>",
                    type: "post",
                    data: inputdata,
                    success: function(result,status,xhr) {
                        alert("Subscribtion complete");
                        location.reload();
                    },
                    error: function (xhr,status,error) {
                        if (xhr.status===500) {
                            alert("This Email Address already subscribed");
                        }
                    }
                });
            });
        }); 
    </script>
    <?php if ($this->uri->segment(1)=='' || $this->uri->segment(1)=='home' || $this->uri->segment(1)=='news') { ?>
        <!-- News Tricker -->
        <script type="text/javascript">
            $(function(){
             window.setTimeout(function(){
                $( ".list-item-currency span").text("Loading...");
                $.ajax({
                    url: "<?php echo base_url('home/cointrickerdata/') ?>",
                    type: "GET",
                    dataType : "json",
                    success: function(result,status,xhr) {

                        var keys = Object.keys(result);
                        for(var i=0;i<keys.length;i++){
                            var key = keys[i];
                            $( "#"+key+" .list-item-currency").text(key+"USD");
                            $( "#"+key+" .upgrade").html("<span>"+result[key]+"</span>");
                        }

                    },
                    error: function(xhr,status,error){

                    }
                });
            }, 100);

         });                    
     </script>

 <?php } ?>

 <script>
    (function () {
                // trim polyfill : https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/String/Trim
                if (!String.prototype.trim) {
                    (function () {
                        // Make sure we trim BOM and NBSP
                        var rtrim = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
                        String.prototype.trim = function () {
                            return this.replace(rtrim, '');
                        };
                    })();
                }

                [].slice.call(document.querySelectorAll('input.input__field')).forEach(function (inputEl) {
                    // in case the input is already filled..
                    if (inputEl.value.trim() !== '') {
                        classie.add(inputEl.parentNode, 'input--filled');
                    }

                    // events:
                    inputEl.addEventListener('focus', onInputFocus);
                    inputEl.addEventListener('blur', onInputBlur);
                });

                function onInputFocus(ev) {
                    classie.add(ev.target.parentNode, 'input--filled');
                }

                function onInputBlur(ev) {
                    if (ev.target.value.trim() === '') {
                        classie.remove(ev.target.parentNode, 'input--filled');
                    }
                }
            })();
        </script>
        <?php if ($this->uri->segment(1)=='contact') { ?>
            <script>
            // When the window has finished loading create our google map below
            //google.maps.event.addDomListener(window, 'load', initMap);

            function initMap() {
                // Basic options for a simple Google Map
                // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
                var mapOptions = {
                    // How zoomed in you want the map to start at (always required)
                    zoom: 11,
                    // The latitude and longitude to center the map (always required)
                    center: new google.maps.LatLng(<?php echo $settings->latitude ?>), // New York

                    // How you would like to style the map. 
                    // This is where you would paste any style found on Snazzy Maps.
                    styles: [{"stylers": [{"hue": "#007fff"}, {"saturation": 89}]}, {"featureType": "water", "stylers": [{"color": "#ffffff"}]}, {"featureType": "administrative.country", "elementType": "labels", "stylers": [{"visibility": "off"}]}]
                };

                // Get the HTML DOM element that will contain your map 
                // We are using a div with id="map" seen below in the <body>
                var mapElement = document.getElementById('map');
                // AIzaSyAUmj7I0GuGJWRcol-pMUmM4rrnHS90DE8
                // Create the Google Map using our element and options defined above
                var map = new google.maps.Map(mapElement, mapOptions);

                // Let's also add a marker while we're at it
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(<?php echo $settings->latitude ?>),
                    map: map,
                    title: 'Snazzy!'
                });
            }
        </script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAUmj7I0GuGJWRcol-pMUmM4rrnHS90DE8&callback=initMap" type="text/javascript"></script>
        <!-- Ajax Contract From -->
        <script type="text/javascript">
            $(function(){
                $("#contactForm").on("submit", function(event) {
                    event.preventDefault();
                    var inputdata = $("#contactForm").serialize();
                    $.ajax({
                        url: "<?php echo base_url('home/contactMsg'); ?>",
                        type: "post",
                        data: inputdata,
                        success: function(d) {
                            alert("Message send successfuly");
                            location.reload();
                        },
                        error: function(){
                            alert("Message send Fail");
                        }
                    });
                });
            }); 
        </script>
    <?php } ?>

    <?php if ($this->uri->segment(1)=='buy') { 

        $gateway = $this->db->select('*')->from('payment_gateway')->where('id',4)->where('status',1)->get()->row();
        ?>
        <!-- Ajax Buy Crypto -->
        <script type="text/javascript">
            $(function(){ 
                $("#cid").on("change", function(event) {
                    event.preventDefault();
                    var cid = $("#cid").val()|| 0;

                    var inputdata = 'cid='+cid+"&<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>";
                    $.ajax({
                        url: "<?php echo base_url('home/buypayable'); ?>",
                        type: "post",
                        data: inputdata,
                        success: function(data) {
                            $( ".buy_payable").html(data);
                            $( "#buy_amount" ).prop( "disabled", false );
                        },
                        error: function(){

                        }
                    });
                });

                $("#buy_amount").on("keyup", function(event) {
                    event.preventDefault();
                    var buy_amount = parseFloat($("#buy_amount").val())|| 0;
                    var cid = $("#cid").val()|| 0;
                    if (cid=="") {
                        alert("<?php echo display("please_select_cryptocurrency_first") ?>");
                        return false;
                    } else {
                        var inputdata = "cid="+cid+"&amount="+buy_amount+"&<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>";
                        $.ajax({
                            url: "<?php echo base_url('home/buypayable'); ?>",
                            type: "post",
                            data: inputdata,
                            success: function(data) {
                                $( ".buy_payable").html(data);
                            },
                            error: function(){
                                return false;
                            }
                        });
                    }
                });

                $("#payment_method").on("change", function(event) {
                    event.preventDefault();
                    var payment_method = $("#payment_method").val()|| 0;
                    var cid = $("#cid").val()|| 0;

                    if (payment_method==='bitcoin' && cid==1) {
                        alert("<?php echo display("please_select_diffrent_payment_method") ?>");
                        $('#payment_method option:selected').removeAttr('selected');
                        return false;
                    }
                    
                    if (payment_method==='phone') {
                        $(".payment_info").html("<div class='form-group row'><label for='send_money' class='col-sm-4 control-label'><?php echo display("send_money") ?></label><div class='col-sm-8'><h2><a href='tel:<?=@$gateway->public_key?>'><?=@$gateway->public_key?></a></h2></div></div><div class='form-group row'><label class='col-sm-4 control-label'><?php echo display("om_name") ?></label><div class='col-sm-8'><input name='om_name' class='form-control input-solid om_name' type='text' id='om_name' autocomplete='off'></div></div><div class='form-group row'><label class='col-sm-4 control-label'><?php echo display("om_mobile_no") ?></label><div class='col-sm-8'><input name='om_mobile' class='form-control input-solid om_mobile' type='text' id='om_mobile' autocomplete='off'></div></div><div class='form-group row'><label class='col-sm-4 control-label'><?php echo display("transaction_no") ?></label><div class='col-sm-8'><input name='transaction_no' class='form-control input-solid transaction_no' type='text' id='transaction_no' autocomplete='off'></div></div><div class='form-group row'><label class='col-sm-4 control-label'><?php echo display("idcard_no") ?></label><div class='col-sm-8'><input name='idcard_no' class='form-control input-solid idcard_no' type='text' id='idcard_no' autocomplete='off'></div></div>");
                    }
                    else{
                        $(".payment_info").html("<div class='form-group row'><label class='col-sm-4 control-label'><?php echo display("comments") ?></label><div class='col-sm-8'><textarea name='comments' class='form-control input-solid' placeholder='' type='text' id='comments' autocomplete='off'></textarea></div></div>");
                    }
                });

            }); 
        </script>
    <?php } ?>
    <?php if ($this->uri->segment(1)=='sells' || $this->uri->segment(1)=='sell')  { 

        $gateway = $this->db->select('*')->from('payment_gateway')->where('id',4)->where('status',1)->get()->row();
        ?>
        <!-- Ajax Sell -->
        <script type="text/javascript">
            $(function(){
                $("#cid").on("change", function(event) {
                    event.preventDefault();
                    var cid = $("#cid").val()|| 0;

                    var inputdata = 'cid='+cid+"&<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>";
                    $.ajax({
                        url: "<?php echo base_url('home/sellpayable'); ?>",
                        type: "post",
                        data: inputdata,
                        success: function(data) {
                            $( ".sell_payable").html(data);
                            $( "#sell_amount" ).prop( "disabled", false );
                        },
                        error: function(x){
                            return false;
                        }
                    });
                });

                $("#sell_amount").on("keyup", function(event) {
                    event.preventDefault();
                    var sell_amount = parseFloat($("#sell_amount").val())|| 0;
                    var cid = $("#cid").val()|| 0;
                    if (cid=="") {
                        alert("<?php echo display("please_select_cryptocurrency_first") ?>");
                        return false;
                    } else {
                        var inputdata = "cid="+cid+"&amount="+sell_amount+"&<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>";

                        $.ajax({
                            url: "<?php echo base_url('home/sellpayable'); ?>",
                            type: "post",
                            data: inputdata,
                            success: function(data) {
                                $( ".sell_payable").html(data);
                            },
                            error: function(){
                                return false;
                            }
                        });
                    }
                });

                $("#payment_method").on("change", function(event) {
                    event.preventDefault();
                    var payment_method = $("#payment_method").val()|| 0;

                    if (payment_method==='bitcoin') {
                        $(".payment_info").html("<div class='form-group row'><label class='col-sm-4 control-label comments_level'><?php echo display("bitcoin_wallet_id") ?></label><div class='col-sm-8'><textarea name='comments' class='form-control input-solid input-solid input-solid' placeholder='' type='text' id='comments' autocomplete='off'></textarea></div></div>");
                    }else if(payment_method==='payeer'){
                     $(".payment_info").html("<div class='form-group row'><label class='col-sm-4 control-label comments_level'><?php echo display("payeer_wallet_id") ?></label><div class='col-sm-8'><textarea name='comments' class='form-control input-solid input-solid input-solid' placeholder='' type='text' id='comments' autocomplete='off'></textarea></div></div>");
                 }else if(payment_method==='phone'){
                    $(".payment_info").html("<div class='form-group row'><label for='send_money' class='col-sm-4 control-label'><?php echo display("send_money") ?></label><div class='col-sm-8'><h2><a href='tel:<?=@$gateway->public_key?>'><?=@$gateway->public_key?></a></h2></div></div><div class='form-group row'><label class='col-sm-4 control-label'><?php echo display("om_name") ?></label><div class='col-sm-8'><input name='om_name' class='form-control input-solid input-solid om_name' type='text' id='om_name' autocomplete='off'></div></div><div class='form-group row'><label class='col-sm-4 control-label'><?php echo display("om_mobile_no") ?></label><div class='col-sm-8'><input name='om_mobile' class='form-control input-solid input-solid om_mobile' type='text' id='om_mobile' autocomplete='off'></div></div><div class='form-group row'><label class='col-sm-4 control-label'><?php echo display("transaction_no") ?></label><div class='col-sm-8'><input name='transaction_no' class='form-control input-solid input-solid transaction_no' type='text' id='transaction_no' autocomplete='off'></div></div><div class='form-group row'><label class='col-sm-4 control-label'><?php echo display("idcard_no") ?></label><div class='col-sm-8'><input name='idcard_no' class='form-control input-solid input-solid idcard_no' type='text' id='idcard_no' autocomplete='off'></div></div>");
                }
                else{
                    $(".payment_info").html("<div class='form-group row'><label class='col-sm-4 control-label'><?php echo display("comments") ?></label><div class='col-sm-8'><textarea name='comments' class='form-control input-solid' placeholder='' type='text' id='comments' autocomplete='off'></textarea></div></div>");
                }
            });

            }); 
        </script>
    <?php } ?>
</body>
</html>
