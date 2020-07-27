<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once FCPATH.'/vendor/autoload.php';
use \RestApis\Blockchain\Constants;
class Wallets extends CI_Controller 
{ 
//
    public function __construct()
    {
      parent::__construct();



      if (!$this->session->userdata('isLogIn')) 
        redirect('login');

    if (!$this->session->userdata('user_id')) 
        redirect('login');  
    $this->load->model(array(


        'customer/deshboard_model'

    ));

}


public function index()
{ 
    $apiKey = 'f948a21f3508949dd6252e609c840deae816fe2c';
    $instance = new \RestApis\Factory($apiKey);

    $user_id = $this->session->userdata('user_id'); 
    $data['my_cuzdan']=$this->db->select("u.wallet_id as wallet,c.symbol as symbol")
    ->from("users_wallets u")
    ->join("cuzdanlar c","c.id=u.wallet_type")
    ->where("u.status",1)
    ->where("c.status",1)
    ->where("u.user_id",$this->session->userdata('user_id'))
    ->get()
    ->result();

    $data['wallets']=$this->db->select("*")->from("cuzdanlar")->where("status",1)->get()->result();
    $data['user']=$user_id;
    $data['title']   = display('wallets'); 
    $data['content'] = $this->load->view('customer/pages/wallets', $data, true);
    $this->load->view('customer/layout/main_wrapper', $data);  
}
public function creat()
{
    $symbol=$this->input->post("coin");
    
    $apiKey = 'f948a21f3508949dd6252e609c840deae816fe2c';
    $instance = new \RestApis\Factory($apiKey);
    $ek="addressApi".ucfirst($symbol)."GenerateAddress";
    $detail=$instance->$ek()->create("mainnet");

    $indata=["wallet_type"=>$this->db->select("id")->from("cuzdanlar")->where("symbol",$symbol)->get()->result()[0]->id,
    "user_id"=> $this->session->userdata('user_id'),
    "private_key"=>$detail->payload->privateKey,
    "public_key"=>$detail->payload->publicKey,
    
    "wallet_id"=>$detail->payload->address,
    "status"=>1

];
if (isset($detail->payload->wif)){
    $indata["wif"]=$detail->payload->wif;
}
$check=$this->db->select("id")->from("users_wallets")->where("wallet_type",$indata["wallet_type"])->get()->result();
if(!$check){
    $this->db->insert('users_wallets',$indata);
    echo $detail->payload->address;
}
else {echo "oldu";}
}
public function get_all()
{
   
 $symbol=$this->input->post("coin");
 $user_id = $this->session->userdata('user_id'); 
 $wid=$this->db->select("id")->from("cuzdanlar")->where("symbol",$symbol)->get()->result()[0]->id;
 
 echo json_encode($this->db->select("private_key,public_key,wif,wallet_id")
    ->from("users_wallets")
    ->where("user_id",$user_id)
    ->where("status",1)
    ->where("wallet_type",$wid)
    ->get()
    ->result());
}

}