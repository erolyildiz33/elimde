<?php
$settings = $this->db->select("*")
->get('setting')
->row();

?>

<?php 

$i=1; 

foreach ($article as $key => $value) { 

    $article_image[] = $value->article_image;



    $i++;

} 



?>



<?php

$countryArray = array(

    'AD'=>array('name'=>'ANDORRA','code'=>'376'),

    'AE'=>array('name'=>'UNITED ARAB EMIRATES','code'=>'971'),

    'AF'=>array('name'=>'AFGHANISTAN','code'=>'93'),

    'AG'=>array('name'=>'ANTIGUA AND BARBUDA','code'=>'1268'),

    'AI'=>array('name'=>'ANGUILLA','code'=>'1264'),

    'AL'=>array('name'=>'ALBANIA','code'=>'355'),

    'AM'=>array('name'=>'ARMENIA','code'=>'374'),

    'AN'=>array('name'=>'NETHERLANDS ANTILLES','code'=>'599'),

    'AO'=>array('name'=>'ANGOLA','code'=>'244'),

    'AQ'=>array('name'=>'ANTARCTICA','code'=>'672'),

    'AR'=>array('name'=>'ARGENTINA','code'=>'54'),

    'AS'=>array('name'=>'AMERICAN SAMOA','code'=>'1684'),

    'AT'=>array('name'=>'AUSTRIA','code'=>'43'),

    'AU'=>array('name'=>'AUSTRALIA','code'=>'61'),

    'AW'=>array('name'=>'ARUBA','code'=>'297'),

    'AZ'=>array('name'=>'AZERBAIJAN','code'=>'994'),

    'BA'=>array('name'=>'BOSNIA AND HERZEGOVINA','code'=>'387'),

    'BB'=>array('name'=>'BARBADOS','code'=>'1246'),

    'BD'=>array('name'=>'BANGLADESH','code'=>'880'),

    'BE'=>array('name'=>'BELGIUM','code'=>'32'),

    'BF'=>array('name'=>'BURKINA FASO','code'=>'226'),

    'BG'=>array('name'=>'BULGARIA','code'=>'359'),

    'BH'=>array('name'=>'BAHRAIN','code'=>'973'),

    'BI'=>array('name'=>'BURUNDI','code'=>'257'),

    'BJ'=>array('name'=>'BENIN','code'=>'229'),

    'BL'=>array('name'=>'SAINT BARTHELEMY','code'=>'590'),

    'BM'=>array('name'=>'BERMUDA','code'=>'1441'),

    'BN'=>array('name'=>'BRUNEI DARUSSALAM','code'=>'673'),

    'BO'=>array('name'=>'BOLIVIA','code'=>'591'),

    'BR'=>array('name'=>'BRAZIL','code'=>'55'),

    'BS'=>array('name'=>'BAHAMAS','code'=>'1242'),

    'BT'=>array('name'=>'BHUTAN','code'=>'975'),

    'BW'=>array('name'=>'BOTSWANA','code'=>'267'),

    'BY'=>array('name'=>'BELARUS','code'=>'375'),

    'BZ'=>array('name'=>'BELIZE','code'=>'501'),

    'CA'=>array('name'=>'CANADA','code'=>'1'),

    'CC'=>array('name'=>'COCOS (KEELING) ISLANDS','code'=>'61'),

    'CD'=>array('name'=>'CONGO, THE DEMOCRATIC REPUBLIC OF THE','code'=>'243'),

    'CF'=>array('name'=>'CENTRAL AFRICAN REPUBLIC','code'=>'236'),

    'CG'=>array('name'=>'CONGO','code'=>'242'),

    'CH'=>array('name'=>'SWITZERLAND','code'=>'41'),

    'CI'=>array('name'=>'COTE D IVOIRE','code'=>'225'),

    'CK'=>array('name'=>'COOK ISLANDS','code'=>'682'),

    'CL'=>array('name'=>'CHILE','code'=>'56'),

    'CM'=>array('name'=>'CAMEROON','code'=>'237'),

    'CN'=>array('name'=>'CHINA','code'=>'86'),

    'CO'=>array('name'=>'COLOMBIA','code'=>'57'),

    'CR'=>array('name'=>'COSTA RICA','code'=>'506'),

    'CU'=>array('name'=>'CUBA','code'=>'53'),

    'CV'=>array('name'=>'CAPE VERDE','code'=>'238'),

    'CX'=>array('name'=>'CHRISTMAS ISLAND','code'=>'61'),

    'CY'=>array('name'=>'CYPRUS','code'=>'357'),

    'CZ'=>array('name'=>'CZECH REPUBLIC','code'=>'420'),

    'DE'=>array('name'=>'GERMANY','code'=>'49'),

    'DJ'=>array('name'=>'DJIBOUTI','code'=>'253'),

    'DK'=>array('name'=>'DENMARK','code'=>'45'),

    'DM'=>array('name'=>'DOMINICA','code'=>'1767'),

    'DO'=>array('name'=>'DOMINICAN REPUBLIC','code'=>'1809'),

    'DZ'=>array('name'=>'ALGERIA','code'=>'213'),

    'EC'=>array('name'=>'ECUADOR','code'=>'593'),

    'EE'=>array('name'=>'ESTONIA','code'=>'372'),

    'EG'=>array('name'=>'EGYPT','code'=>'20'),

    'ER'=>array('name'=>'ERITREA','code'=>'291'),

    'ES'=>array('name'=>'SPAIN','code'=>'34'),

    'ET'=>array('name'=>'ETHIOPIA','code'=>'251'),

    'FI'=>array('name'=>'FINLAND','code'=>'358'),

    'FJ'=>array('name'=>'FIJI','code'=>'679'),

    'FK'=>array('name'=>'FALKLAND ISLANDS (MALVINAS)','code'=>'500'),

    'FM'=>array('name'=>'MICRONESIA, FEDERATED STATES OF','code'=>'691'),

    'FO'=>array('name'=>'FAROE ISLANDS','code'=>'298'),

    'FR'=>array('name'=>'FRANCE','code'=>'33'),

    'GA'=>array('name'=>'GABON','code'=>'241'),

    'GB'=>array('name'=>'UNITED KINGDOM','code'=>'44'),

    'GD'=>array('name'=>'GRENADA','code'=>'1473'),

    'GE'=>array('name'=>'GEORGIA','code'=>'995'),

    'GH'=>array('name'=>'GHANA','code'=>'233'),

    'GI'=>array('name'=>'GIBRALTAR','code'=>'350'),

    'GL'=>array('name'=>'GREENLAND','code'=>'299'),

    'GM'=>array('name'=>'GAMBIA','code'=>'220'),

    'GN'=>array('name'=>'GUINEA','code'=>'224'),

    'GQ'=>array('name'=>'EQUATORIAL GUINEA','code'=>'240'),

    'GR'=>array('name'=>'GREECE','code'=>'30'),

    'GT'=>array('name'=>'GUATEMALA','code'=>'502'),

    'GU'=>array('name'=>'GUAM','code'=>'1671'),

    'GW'=>array('name'=>'GUINEA-BISSAU','code'=>'245'),

    'GY'=>array('name'=>'GUYANA','code'=>'592'),

    'HK'=>array('name'=>'HONG KONG','code'=>'852'),

    'HN'=>array('name'=>'HONDURAS','code'=>'504'),

    'HR'=>array('name'=>'CROATIA','code'=>'385'),

    'HT'=>array('name'=>'HAITI','code'=>'509'),

    'HU'=>array('name'=>'HUNGARY','code'=>'36'),

    'ID'=>array('name'=>'INDONESIA','code'=>'62'),

    'IE'=>array('name'=>'IRELAND','code'=>'353'),

    'IL'=>array('name'=>'ISRAEL','code'=>'972'),

    'IM'=>array('name'=>'ISLE OF MAN','code'=>'44'),

    'IN'=>array('name'=>'INDIA','code'=>'91'),

    'IQ'=>array('name'=>'IRAQ','code'=>'964'),

    'IR'=>array('name'=>'IRAN, ISLAMIC REPUBLIC OF','code'=>'98'),

    'IS'=>array('name'=>'ICELAND','code'=>'354'),

    'IT'=>array('name'=>'ITALY','code'=>'39'),

    'JM'=>array('name'=>'JAMAICA','code'=>'1876'),

    'JO'=>array('name'=>'JORDAN','code'=>'962'),

    'JP'=>array('name'=>'JAPAN','code'=>'81'),

    'KE'=>array('name'=>'KENYA','code'=>'254'),

    'KG'=>array('name'=>'KYRGYZSTAN','code'=>'996'),

    'KH'=>array('name'=>'CAMBODIA','code'=>'855'),

    'KI'=>array('name'=>'KIRIBATI','code'=>'686'),

    'KM'=>array('name'=>'COMOROS','code'=>'269'),

    'KN'=>array('name'=>'SAINT KITTS AND NEVIS','code'=>'1869'),

    'KP'=>array('name'=>'KOREA DEMOCRATIC PEOPLES REPUBLIC OF','code'=>'850'),

    'KR'=>array('name'=>'KOREA REPUBLIC OF','code'=>'82'),

    'KW'=>array('name'=>'KUWAIT','code'=>'965'),

    'KY'=>array('name'=>'CAYMAN ISLANDS','code'=>'1345'),

    'KZ'=>array('name'=>'KAZAKSTAN','code'=>'7'),

    'LA'=>array('name'=>'LAO PEOPLES DEMOCRATIC REPUBLIC','code'=>'856'),

    'LB'=>array('name'=>'LEBANON','code'=>'961'),

    'LC'=>array('name'=>'SAINT LUCIA','code'=>'1758'),

    'LI'=>array('name'=>'LIECHTENSTEIN','code'=>'423'),

    'LK'=>array('name'=>'SRI LANKA','code'=>'94'),

    'LR'=>array('name'=>'LIBERIA','code'=>'231'),

    'LS'=>array('name'=>'LESOTHO','code'=>'266'),

    'LT'=>array('name'=>'LITHUANIA','code'=>'370'),

    'LU'=>array('name'=>'LUXEMBOURG','code'=>'352'),

    'LV'=>array('name'=>'LATVIA','code'=>'371'),

    'LY'=>array('name'=>'LIBYAN ARAB JAMAHIRIYA','code'=>'218'),

    'MA'=>array('name'=>'MOROCCO','code'=>'212'),

    'MC'=>array('name'=>'MONACO','code'=>'377'),

    'MD'=>array('name'=>'MOLDOVA, REPUBLIC OF','code'=>'373'),

    'ME'=>array('name'=>'MONTENEGRO','code'=>'382'),

    'MF'=>array('name'=>'SAINT MARTIN','code'=>'1599'),

    'MG'=>array('name'=>'MADAGASCAR','code'=>'261'),

    'MH'=>array('name'=>'MARSHALL ISLANDS','code'=>'692'),

    'MK'=>array('name'=>'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF','code'=>'389'),

    'ML'=>array('name'=>'MALI','code'=>'223'),

    'MM'=>array('name'=>'MYANMAR','code'=>'95'),

    'MN'=>array('name'=>'MONGOLIA','code'=>'976'),

    'MO'=>array('name'=>'MACAU','code'=>'853'),

    'MP'=>array('name'=>'NORTHERN MARIANA ISLANDS','code'=>'1670'),

    'MR'=>array('name'=>'MAURITANIA','code'=>'222'),

    'MS'=>array('name'=>'MONTSERRAT','code'=>'1664'),

    'MT'=>array('name'=>'MALTA','code'=>'356'),

    'MU'=>array('name'=>'MAURITIUS','code'=>'230'),

    'MV'=>array('name'=>'MALDIVES','code'=>'960'),

    'MW'=>array('name'=>'MALAWI','code'=>'265'),

    'MX'=>array('name'=>'MEXICO','code'=>'52'),

    'MY'=>array('name'=>'MALAYSIA','code'=>'60'),

    'MZ'=>array('name'=>'MOZAMBIQUE','code'=>'258'),

    'NA'=>array('name'=>'NAMIBIA','code'=>'264'),

    'NC'=>array('name'=>'NEW CALEDONIA','code'=>'687'),

    'NE'=>array('name'=>'NIGER','code'=>'227'),

    'NG'=>array('name'=>'NIGERIA','code'=>'234'),

    'NI'=>array('name'=>'NICARAGUA','code'=>'505'),

    'NL'=>array('name'=>'NETHERLANDS','code'=>'31'),

    'NO'=>array('name'=>'NORWAY','code'=>'47'),

    'NP'=>array('name'=>'NEPAL','code'=>'977'),

    'NR'=>array('name'=>'NAURU','code'=>'674'),

    'NU'=>array('name'=>'NIUE','code'=>'683'),

    'NZ'=>array('name'=>'NEW ZEALAND','code'=>'64'),

    'OM'=>array('name'=>'OMAN','code'=>'968'),

    'PA'=>array('name'=>'PANAMA','code'=>'507'),

    'PE'=>array('name'=>'PERU','code'=>'51'),

    'PF'=>array('name'=>'FRENCH POLYNESIA','code'=>'689'),

    'PG'=>array('name'=>'PAPUA NEW GUINEA','code'=>'675'),

    'PH'=>array('name'=>'PHILIPPINES','code'=>'63'),

    'PK'=>array('name'=>'PAKISTAN','code'=>'92'),

    'PL'=>array('name'=>'POLAND','code'=>'48'),

    'PM'=>array('name'=>'SAINT PIERRE AND MIQUELON','code'=>'508'),

    'PN'=>array('name'=>'PITCAIRN','code'=>'870'),

    'PR'=>array('name'=>'PUERTO RICO','code'=>'1'),

    'PT'=>array('name'=>'PORTUGAL','code'=>'351'),

    'PW'=>array('name'=>'PALAU','code'=>'680'),

    'PY'=>array('name'=>'PARAGUAY','code'=>'595'),

    'QA'=>array('name'=>'QATAR','code'=>'974'),

    'RO'=>array('name'=>'ROMANIA','code'=>'40'),

    'RS'=>array('name'=>'SERBIA','code'=>'381'),

    'RU'=>array('name'=>'RUSSIAN FEDERATION','code'=>'7'),

    'RW'=>array('name'=>'RWANDA','code'=>'250'),

    'SA'=>array('name'=>'SAUDI ARABIA','code'=>'966'),

    'SB'=>array('name'=>'SOLOMON ISLANDS','code'=>'677'),

    'SC'=>array('name'=>'SEYCHELLES','code'=>'248'),

    'SD'=>array('name'=>'SUDAN','code'=>'249'),

    'SE'=>array('name'=>'SWEDEN','code'=>'46'),

    'SG'=>array('name'=>'SINGAPORE','code'=>'65'),

    'SH'=>array('name'=>'SAINT HELENA','code'=>'290'),

    'SI'=>array('name'=>'SLOVENIA','code'=>'386'),

    'SK'=>array('name'=>'SLOVAKIA','code'=>'421'),

    'SL'=>array('name'=>'SIERRA LEONE','code'=>'232'),

    'SM'=>array('name'=>'SAN MARINO','code'=>'378'),

    'SN'=>array('name'=>'SENEGAL','code'=>'221'),

    'SO'=>array('name'=>'SOMALIA','code'=>'252'),

    'SR'=>array('name'=>'SURINAME','code'=>'597'),

    'ST'=>array('name'=>'SAO TOME AND PRINCIPE','code'=>'239'),

    'SV'=>array('name'=>'EL SALVADOR','code'=>'503'),

    'SY'=>array('name'=>'SYRIAN ARAB REPUBLIC','code'=>'963'),

    'SZ'=>array('name'=>'SWAZILAND','code'=>'268'),

    'TC'=>array('name'=>'TURKS AND CAICOS ISLANDS','code'=>'1649'),

    'TD'=>array('name'=>'CHAD','code'=>'235'),

    'TG'=>array('name'=>'TOGO','code'=>'228'),

    'TH'=>array('name'=>'THAILAND','code'=>'66'),

    'TJ'=>array('name'=>'TAJIKISTAN','code'=>'992'),

    'TK'=>array('name'=>'TOKELAU','code'=>'690'),

    'TL'=>array('name'=>'TIMOR-LESTE','code'=>'670'),

    'TM'=>array('name'=>'TURKMENISTAN','code'=>'993'),

    'TN'=>array('name'=>'TUNISIA','code'=>'216'),

    'TO'=>array('name'=>'TONGA','code'=>'676'),

    'TR'=>array('name'=>'TURKEY','code'=>'90'),

    'TT'=>array('name'=>'TRINIDAD AND TOBAGO','code'=>'1868'),

    'TV'=>array('name'=>'TUVALU','code'=>'688'),

    'TW'=>array('name'=>'TAIWAN, PROVINCE OF CHINA','code'=>'886'),

    'TZ'=>array('name'=>'TANZANIA, UNITED REPUBLIC OF','code'=>'255'),

    'UA'=>array('name'=>'UKRAINE','code'=>'380'),

    'UG'=>array('name'=>'UGANDA','code'=>'256'),

    'US'=>array('name'=>'UNITED STATES','code'=>'1'),

    'UY'=>array('name'=>'URUGUAY','code'=>'598'),

    'UZ'=>array('name'=>'UZBEKISTAN','code'=>'998'),

    'VA'=>array('name'=>'HOLY SEE (VATICAN CITY STATE)','code'=>'39'),

    'VC'=>array('name'=>'SAINT VINCENT AND THE GRENADINES','code'=>'1784'),

    'VE'=>array('name'=>'VENEZUELA','code'=>'58'),

    'VG'=>array('name'=>'VIRGIN ISLANDS, BRITISH','code'=>'1284'),

    'VI'=>array('name'=>'VIRGIN ISLANDS, U.S.','code'=>'1340'),

    'VN'=>array('name'=>'VIET NAM','code'=>'84'),

    'VU'=>array('name'=>'VANUATU','code'=>'678'),

    'WF'=>array('name'=>'WALLIS AND FUTUNA','code'=>'681'),

    'WS'=>array('name'=>'SAMOA','code'=>'685'),

    'XK'=>array('name'=>'KOSOVO','code'=>'381'),

    'YE'=>array('name'=>'YEMEN','code'=>'967'),

    'YT'=>array('name'=>'MAYOTTE','code'=>'262'),

    'ZA'=>array('name'=>'SOUTH AFRICA','code'=>'27'),

    'ZM'=>array('name'=>'ZAMBIA','code'=>'260'),

    'ZW'=>array('name'=>'ZIMBABWE','code'=>'263')

);



?>

<!DOCTYPE html>
<html>
<head>
    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
    <title><?php echo ucwords($title).' - '.$settings->title; ?></title>  
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo base_url($settings->favicon); ?>" type="image/x-icon" />
    <link rel="apple-touch-icon" href="<?php echo base_url("assets/website/"); ?>img/apple-touch-icon.png">
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
    <!-- Web Fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light%7CPlayfair+Display:400" rel="stylesheet" type="text/css">
    <!-- Vendor CSS -->
    <link rel="stylesheet" href="<?php echo base_url("assets/website/"); ?>vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url("assets/website/"); ?>vendor/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url("assets/website/"); ?>vendor/animate/animate.min.css">
    <link rel="stylesheet" href="<?php echo base_url("assets/website/"); ?>vendor/simple-line-icons/css/simple-line-icons.min.css">
    <link rel="stylesheet" href="<?php echo base_url("assets/website/"); ?>vendor/owl.carousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url("assets/website/"); ?>vendor/owl.carousel/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo base_url("assets/website/"); ?>vendor/magnific-popup/magnific-popup.min.css">
    <!-- Theme CSS -->
    <link rel="stylesheet" href="<?php echo base_url("assets/website/"); ?>css/theme.css">
    <link rel="stylesheet" href="<?php echo base_url("assets/website/"); ?>css/theme-elements.css">
    <link rel="stylesheet" href="<?php echo base_url("assets/website/"); ?>css/theme-blog.css">
    <link rel="stylesheet" href="<?php echo base_url("assets/website/"); ?>css/theme-shop.css">
    <!-- Current Page CSS -->
    <link rel="stylesheet" href="<?php echo base_url("assets/website/"); ?>vendor/rs-plugin/css/settings.css">
    <link rel="stylesheet" href="<?php echo base_url("assets/website/"); ?>vendor/rs-plugin/css/layers.css">
    <link rel="stylesheet" href="<?php echo base_url("assets/website/"); ?>vendor/rs-plugin/css/navigation.css">
    <!-- Demo CSS -->
    <link href="<?php echo base_url('assets/website/css/style.css'); ?>" rel="stylesheet">
    <!-- Skin CSS -->
    <link rel="stylesheet" href="<?php echo base_url("assets/website/"); ?>css/skins/default.css"> 
    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="<?php echo base_url("assets/website/"); ?>css/custom.css">
    <link rel="stylesheet" href="<?php echo base_url("assets/"); ?>sweetalert2/dist/sweetalert2.min.css">
    <!-- Head Libs -->
    <script src="<?php echo base_url("assets/website/"); ?>vendor/modernizr/modernizr.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style type="text/css">
        #header{
            background-color: transparent!important;
        }
        #loginbtn a,#signbtn a{

        }
        #loginbtn a:hover{
            background-color: #007bff!important;
            color: #fff!important;

        }
        #signbtn a:hover{
            background-color: orange!important;
            color: #fff!important;
        }
        .btn-slider{
            font-family: Raleway-SemiBold;
            background-color: #00a3cc;
            font-size: 13px;
            color: white;
            letter-spacing: 1px;
            line-height: 14px;
            border: 2px solid white;
            border-radius: 40px;
            transition: all 0.3s ease 0s;

        }
        .btn-slider:hover{

            background-color: white;
            color: #00a3cc!important;
            border: 2px solid #00a3cc;
        }
        .bs-caret {
            display:none;
        }
        .modal-dialog {
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            margin: auto;
            width:500px;
            height:300px;
        }
        #signup .modal-dialog{
            min-width:1000px!important;
            margin: 0;
            margin-left: auto;
            margin-right: auto;
        }
        .modal-body{
            background-color: #0088cc;
            padding-top: 30px;
        }
        .modalbtn:hover{
            color: red!important;
            font-weight: bold;
        }
        .btn-reg:hover{
            background-color: orange;
            color: white!important;
            border: 1px white solid;

        }
        .btn-danger:hover{
            background-color: red!important;
            color: white!important;
            border: 1px white solid!important;
        }
    </style>
</head>
<body class="loading-overlay-showing" data-plugin-page-transition data-loading-overlay data-plugin-options="{'hideDelay': 500}">
    <div class="loading-overlay">
        <div class="bounce-loader">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>
    <div class="body">
        <header id="header"  class="header-effect-shrink " data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'shrink', 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyChangeLogo': true, 'stickyStartAt': 30, 'stickyHeaderContainerHeight': 70}">
            <div class="header-body">
                <div class="header-container container">
                    <div class="header-row">
                        <div class="header-column">
                            <div class="header-row">
                                <div class="header-logo">
                                    <a href="<?php echo base_url(); ?>">
                                        <img width="100" height="48" data-sticky-width="82" data-sticky-height="40" src="<?php echo base_url($settings->logo_web); ?>" alt="<?php echo strip_tags($settings->title) ?>"/>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="header-column justify-content-end">
                            <div class="header-row">
                                <div class="header-nav header-nav-line header-nav-top-line header-nav-top-line-with-border order-2 order-lg-1 ">
                                    <div class="header-nav-main header-nav-main-square header-nav-main-effect-2 header-nav-main-sub-effect-1">
                                        <nav class="collapse">
                                            <ul class="nav nav-pills" id="mainNav">
                                                <?php
                                                foreach ($category as $cat_key => $cat_value) {                                
                                                    if ($cat_value->parent_id==0 && ($cat_value->menu==1 || $cat_value->menu==3)) {
                                                        $cat_name = isset($lang) && $lang =="french"?$cat_value->cat_name_fr:$cat_value->cat_name_en;
                                                        $where = "(status =1 OR status = 3)";
                                                        $child_cat = $this->db->select("cat_name_en,cat_name_fr,slug,menu")->from('web_category')->where('parent_id', $cat_value->cat_id)->where($where)->order_by('position_serial', 'asc')->get()->result();
                                                        ?>
                                                        <li class="<?php echo ($this->uri->segment(1) == $cat_value->slug)?"active ":null ?><?php echo $child_cat?"dropdown":null ?>"><a <?php echo $child_cat?'href="#" class="dropdown-toggle" data-toggle="dropdown"':'href="'.base_url($cat_value->slug).'"'; ?>><?php echo $cat_name; ?></a>
                                                            <?php
                                                            if ($child_cat) { ?>
                                                                <ul class="dropdown-menu">
                                                                    <?php
                                                                    foreach ($child_cat as $chi_key => $chi_value) {
                                                                        if ($chi_value->menu==1 || $chi_value->menu==3) {
                                                                            $chi_cat_name = isset($lang) && $lang =="french"?$chi_value->cat_name_fr:$chi_value->cat_name_en;
                                                                            ?>
                                                                            <li class=""><a href="<?php echo base_url($chi_value->slug) ?>"><?php echo $chi_cat_name; ?></a></li>
                                                                        <?php  }  }  ?>
                                                                    </ul> 
                                                                <?php  }  ?>
                                                            </li>
                                                        <?php  }  }  ?>
                                                    </ul>
                                                    <ul class="header-nav-features order-1 order-lg-2">
                                                       <?php if($this->session->userdata('user_id')!=NULL){?>
                                                        <li class="dropdown">
                                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:orange!important"><?php echo display('account'); ?></a>
                                                            <ul class="dropdown-menu">
                                                                <li><a target="_blank" href="<?php echo base_url('customer/home'); ?>"><?php echo display('dashboard'); ?></a></li>
                                                                <li><a href="<?php echo base_url('customer/auth/logout'); ?>"><?php echo display('logout'); ?></a></li>
                                                            </ul>
                                                        </li>
                                                    <?php } else{ ?>
                                                        <li id="loginbtn" style="display: inline;" ><a href="<?php echo base_url('home/login'); ?>"  class="text-color-primary" ><?php echo display('login'); ?></a></li>
                                                        <li id="signbtn" class="signbtn"  style="position: relative; display: inline;"><a href="<?php echo base_url('home/register'); ?>" style="color:orange;"><?php echo display('sign_up'); ?></a></li>
                                                    <?php } ?>
                                                </ul>
                                            </nav>
                                        </div>
                                        <button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main nav">
                                            <i class="fas fa-bars"></i>
                                        </button>
                                    </div>
                                    <div class="header-nav-features order-1 order-lg-2">
                                        <div class="header-nav-feature header-nav-features-social-icons d-inline-flex">
                                            <ul class="header-social-icons social-icons d-none d-sm-block social-icons-clean ml-0">
                                                <?php 
                                                foreach ($social_link as $key => $value) {
                                                    if ($value->status==1){ ?> 
                                                        <li class="social-icons-<?php echo $value->name; ?>"> <a href="<?php echo $value->link; ?>" target="_blank" title="<?php echo $value->name; ?>"><i class="fab fa-<?php echo $value->icon ?>"></i></a></li>
                                                    <?php } ?>
                                                <?php }   ?>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="header-nav-features order-1 order-lg-2">
                                        <div class="header-nav header-nav-line header-nav-top-line header-nav-top-line-with-border order-2 order-lg-1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>


            <div id="login" class="modal" role="dialog">
                <?php echo form_open('home/login','id="loginForm" '); ?>
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header"> 
                        <h4 class="modal-title"><?php echo display('login'); ?></h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                    </div>
                    <div class="modal-body">
                        <div class="row">    
                            <div class="col-sm-12">
                                <div class="input">
                                    <input class="input__field" type="text" name="email" id="useremail" autocomplete="off" required>
                                    <label class="input__label" for="input">
                                        <span class="input__label-content" data-content="<?php echo display('username_or_email'); ?>"><?php echo display('username_or_email'); ?></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">    
                            <div class="col-sm-12">
                                <div class="input">
                                    <input class="input__field" type="password" name="password" id="password" required>
                                    <label class="input__label" for="password">
                                        <span class="input__label-content" data-content="<?php echo display('password'); ?>"><?php echo display('password'); ?></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">    
                            <div class="col-sm-12">
                                <div class="input">
                                    <a  id="btnckeck" href="#" class="forgotbtn modalbtn" style="color: #fff;"><?php echo display('forgot_password'); ?>? </a>
                                    <span style="color: yellow!important"><?php echo display('dont_have_an_account'); ?>?</span> 
                                    <a class="modalbtn signbtn" style="color: orange; "><?php echo display('sign_up_now'); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-reg" style="color: orange;border: 1px orange solid;"><?php echo display('login'); ?></button>
                        <button type="button" class="btn btn-danger" style="background-color: white;color: red;border: 1px red solid;" data-dismiss="modal"><?php echo display("cancel");?></button>
                    </div>
                </div>

            </div>
            <?php echo form_close();?>

        </div>
        <div id="forgotModal" class="modal" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title"><?php echo display('forgot_password'); ?></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                
            </div>
            <div class="modal-body">
                <?php echo form_open('home/forgotPassword','id="forgotPassword"'); ?>
                <div class="form-group">
                    <input class="form-control" name="email" id="f_email" placeholder="<?php echo display('email'); ?>" type="text" autocomplete="off">
                </div>
                <button  type="submit" class="btn btn-reg btn-block" style="color: orange;border: 1px orange solid;"><?php echo display('send_code'); ?></button>
                <?php echo form_close();?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" style="background-color: white;color: red;border: 1px red solid;" data-dismiss="modal"><?php echo display('close'); ?></button>
            </div>
        </div>
    </div>
</div>
<div id="signup" class="modal" role="dialog">
   <?php echo form_open('register','id="registerForm" name="registerForm" onsubmit="return validateForm()" '); ?>
   <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><?php echo display('register'); ?></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
    <div class="modal-body">
        <div class="row">    
            <div class="col-sm-6">
                <div class="input">
                    <input class="input__field" type="text" name="sponsor_id" id="sponsor_id" value="<?php if(isset($_GET['ref'])) {echo $_GET['ref'];} ?>"   required>
                    <label class="input__label" for="sponsor_id">
                        <span class="input__label-content" data-content="<?php echo display('sponsor_id'); ?>"></span>
                    </label>
                </div>
            </div>         
            <div class="col-sm-6">
                <div class="input">
                    <input class="input__field" type="text" name="username" id="username" required>
                    <label class="input__label" for="username">
                        <span class="input__label-content" data-content="<?php echo display('username'); ?>"><?php echo display('username'); ?></span>
                    </label>
                </div>
            </div>    
        </div>
        <div class="row">    
            <div class="col-sm-6">
                <div class="input">
                    <input class="input__field" type="text"  name="f_name" id="f_name" value="<?php echo $this->session->userData['f_name']; ?>" autocomplete="off" required>
                    <label class="input__label" for="f_name">
                        <span class="input__label-content" data-content="<?php echo display('firstname'); ?>"><?php echo display('firstname'); ?></span>
                    </label>
                </div>
            </div>    
            <div class="col-sm-6">
                <div class="input">
                    <input class="input__field" type="text"  name="l_name" id="l_name" value="<?php echo $this->session->userData['l_name']; ?>" autocomplete="off" required>
                    <label class="input__label" for="l_name">
                        <span class="input__label-content" data-content="<?php echo display('lastname'); ?>"><?php echo display('lastname'); ?></span>
                    </label>
                </div>
            </div>
        </div>  
        <div class="row">    
            <div class="col-sm-6">
                <div class="input">
                    <select  class="selectpicker" data-width="100%" class="country input__field" id="country" name="country">
                        <option value="" selected>Select Country</option>
                        <?php
                        foreach($countryArray as $code => $country){
                            $countryName = ucwords(strtolower($country["name"])); ?>
                            <option value="<?=$country["code"]?>"><?=$countryName." (+".$country["code"].")"?></option>
                        <?php } ?>
                    </select>
                    <label class="input__label" for="country">
                        <span class="input__label-content" data-content="<?php echo display('country'); ?>"><?php echo display('country'); ?></span>
                    </label>
                </div>
            </div>    
            <div class="col-sm-6">
                <div class="input">
                    <input class="input__field" type="number" name="phone" id="phone" autocomplete="off" required>
                    <label class="input__label" for="phone">
                        <span class="input__label-content" data-content="<?php echo display('phone'); ?>"><?php echo display('phone'); ?></span>
                    </label>
                </div>
            </div>
        </div>
        <div class="row">    
            <div class="col-sm-12">
                <div class="input">
                    <input class="input__field" type="email" id="email" name="email" id="email" onkeydown="checkEmail()" value="<?php echo $this->session->userData['email']; ?>" autocomplete="off" required>
                    <label class="input__label" for="email">
                        <span class="input__label-content" data-content="<?php echo display('email'); ?>"><?php echo display('email'); ?></span>
                    </label>
                </div>
            </div>
        </div>
        <div class="row">    
            <div class="col-sm-12">
                <div class="input">
                    <input class="input__field" type="password" name="pass" id="pass" onkeyup="strongPassword()" required>
                    <label class="input__label" for="pass">
                        <span class="input__label-content" data-content="<?php echo display('password'); ?>"><?php echo display('password'); ?></span>
                    </label>
                    <div id="message">
                      <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                      <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                      <p id="special" class="invalid">A <b>special</b></p>
                      <p id="number" class="invalid">A <b>number</b></p>
                      <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                  </div>
              </div>
          </div>
      </div>
      <div class="row">    
        <div class="col-sm-12">
            <div class="input">
                <input class="input__field" type="password" name="r_pass" id="r_pass" onkeyup="rePassword()" required>
                <label class="input__label" for="r_pass">
                    <span class="input__label-content" data-content="<?php echo display('conf_password'); ?>"><?php echo display('conf_password'); ?></span>
                </label>
            </div>
        </div>
    </div>
    <div class="row">    
        <div class="col-sm-12">
            <div class="input" style="color: yellow;">
                <label>
                    <input type="checkbox" id="checkbox" name="accept_terms" value="ptConfirm"> 
                </label >
                <?php echo display('your_password_at_global_crypto_are_encrypted_and_secured'); ?> <a target="_blank" href="<?php echo base_url(@$article_image[0]); ?>">Privacy policy</a> and 
                <a target="_blank" href="<?php echo base_url(@$article_image[0]); ?>">Terms of Use</a>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="submit" class="btn btn-reg" style="color: orange;border: 1px orange solid;"><?php echo display('sign_up'); ?></button>
    <button type="button" class="btn btn-danger" style="background-color: white;color: red;border: 1px red solid;" data-dismiss="modal"><?php echo display('close'); ?></button>
</div>
</div>
</div>
<?php echo form_close() ?>
</div>




<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">


<script type="text/javascript">


    <?php if ($this->session->flashdata('success')) {?>
        toastr.success("<?php echo $this->session->flashdata('success'); ?>");
    <?php } else if ($this->session->flashdata('error')) {?>
        toastr.error("<?php echo $this->session->flashdata('error'); ?>");
    <?php } else if ($this->session->flashdata('warning')) {?>
        toastr.warning("<?php echo $this->session->flashdata('warning'); ?>");
    <?php } else if ($this->session->flashdata('info')) {?>
        toastr.info("<?php echo $this->session->flashdata('info'); ?>");
    <?php }?>


</script>

