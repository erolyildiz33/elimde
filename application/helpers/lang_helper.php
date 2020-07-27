<?php 
defined('BASEPATH') OR exit('No direct script access allowed');



function get_coin_info($cryptolistfrom,$cryptolistto){
  $url = 'https://min-api.cryptocompare.com/data/pricemultifull';
  $parameters = [
    'fsyms' =>$cryptolistfrom,
    'tsyms' => $cryptolistto
];
$qs = http_build_query($parameters); 
$request = "{$url}?{$qs}";
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => $request,
  CURLOPT_RETURNTRANSFER => 1,
  CURLOPT_SSL_VERIFYPEER=>false
));

$response = curl_exec($curl);
curl_close($curl);
$son=json_decode($response,true);
return $son['RAW']['BTC']['USD'];
};
function decimal_to_time($cryptolistfrom,$cryptolistto) {
    $timestamp = get_coin_info($cryptolistfrom,$cryptolistto)['LASTUPDATE'];
    $datetimeFormat = 'd/m/Y H:i';
    $date = new \DateTime();
    $date->setTimestamp($timestamp);
    return $date->format($datetimeFormat);
};
function tahminzamani($timestamp){
    $son=0;
    $dakika=date('i',strtotime($timestamp));
    if ($dakika==00) {$son='10';}
    elseif ($dakika<=10) {$son='20';}
    elseif ($dakika<=20) {$son='30';}
    elseif ($dakika<=30) {$son='40';}
    elseif ($dakika<=40) {$son='50';}
    elseif ($dakika<=50) {$son='00';$timestamp=strtotime("+1 hour",$timestamp);}
    elseif ($dakika<=59) {$son='10';$timestamp=strtotime("+1 hour",$timestamp);}
    return (date('d/m/Y H',strtotime($timestamp)).':'.$son);
};


function altgetirget($user_id){
    $ci=&get_instance();
    echo (json_encode($ci->db->select("user_id,username,sponsor_id")
        ->from('user_registration')
        ->where('sponsor_id',$user_id)
        ->get()
        ->result()));
}
function kol1()
{
 $ci=&get_instance();
 $user_id = $ci->session->userdata('user_id');

 echo json_encode($ci->db->select("u.user_id,u.username,u.sponsor_id, sum(i.amount) yatirim")
     ->from('user_registration u')
    //->join ('team_bonus t','t.user_id=i.user_id')
     ->join ('investment i','i.user_id=u.user_id','left')
     ->where('i.user_id',$user_id)
           // ->where('yatirim.user_id',$user_id)
     ->get()
     ->result());
}
function Uye_Listesi($user_id){
    $ci=&get_instance();
    $ci->db->select('user_id,username');
    $ci->db->from('user_registration');
    $ci->db->where('sponsor_id', $user_id);

    $parent = $ci->db->get();

    $categories = $parent->result();
    $i=0;
    foreach($categories as $p_cat){
       // print_r($p_cat);exit();
        $categories[$i]->sub = sub_categories($p_cat->user_id);
        $i++;
    }
    return $categories;
}

function sub_categories($id){
    $ci=&get_instance();
    $ci->db->select('user_id,username');
    $ci->db->from('user_registration');
    $ci->db->where('sponsor_id', $id);

    $child = $ci->db->get();
    $categories = $child->result();
    $i=0;
    foreach($categories as $p_cat){

        $categories[$i]->sub = sub_categories($p_cat->user_id);
        $i++;
    }
    return $categories;       
}



if (!function_exists('display')) {

    function display($text = null)
    {
        $ci =& get_instance();
        $ci->load->database();
        $table  = 'language';
        $phrase = 'phrase';

        #---------------------------------------
        #   modify function 30-01-2018
        #--------------------------------------
        $user_id = $ci->session->userdata('user_id');
        if(!empty($user_id)){
            $default_lang  = 'english';
            $setting_table = 'user_registration';
            $data = $ci->db->where('user_id',$user_id)->get($setting_table)->row();
        } else {

            $default_lang  = 'english';
            $setting_table = 'setting';
                    //set language  
            $data = $ci->db->get($setting_table)->row();
                }#end

                if (!empty($data->language)) {
                    $language = $data->language; 
                } else {
                    $language = $default_lang; 
                } 

                if (!empty($text)) {

                    if ($ci->db->table_exists($table)) { 

                        if ($ci->db->field_exists($phrase, $table)) { 

                            if ($ci->db->field_exists($language, $table)) {

                                $row = $ci->db->select($language)
                                ->from($table)
                                ->where($phrase, $text)
                                ->get()
                                ->row(); 

                                if (!empty($row->$language)) {
                                    return $row->$language;
                                } else {
                                    return false;
                                }

                            } else {
                                return false;
                            }

                        } else {
                            return false;
                        }

                    } else {
                        return false;
                    }            
                } else {
                    return false;
                }  

            }

        }




// $autoload['helper'] =  array('language_helper');

        /*display a language*/
// echo display('helloworld'); 

        /*display language list*/
// $lang = languageList(); 
