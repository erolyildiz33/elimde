<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prediction extends CI_Controller 
{
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

        $user_id = $this->session->userdata('user_id'); 
        $data['cryptolist']=$this->db->SELECT('*')->FROM('crypto_currency')->order_by('rank', 'ASC')->LIMIT(20)->get()->result();  
        $data['wallets']=$this->db->SELECT('*')->FROM('users_wallets')->where('user_id',$user_id)->get()->result();
        $data['plan']=$this->db->SELECT('*')->FROM('prediction_rates')->get()->result();     
        $data['user']=$user_id;
        $data['title']   = display('prediction');
        $data['tahminler']=$this->db->SELECT('*')->FROM('tahminler')->get()->result();
        $data['content'] = $this->load->view('customer/pages/prediction', $data, true);
        $this->load->view('customer/layout/main_wrapper', $data);  
    }
    public function addnew(){

        $data=[ 'user_id'=>$this->session->userdata('user_id'),
                'coin_name'=>$this->input->post('coin_name'),
                'tahmin_sekli'=>$this->input->post('tahmin_sekli'),
                'yatirim'=>explode(" ",$this->input->post('estimate'))[1],
                'tarih'=>$this->input->post('datepicker_exact'),


        ];
        $offertype=$this->input->post("offertype");
        if (isset($offertype)){
            $data['tahmini_fiyat']=explode(" ",$this->input->post('exactprediction'))[1]+"x";
        }
        else{
            $data['plan']=$this->input->post('plan');
            $data['tahmini_fiyat']=explode(" ",$this->input->post('approximativeprediction'))[1]+"x";
        }
        print_r($data);

        die();



        $this->db->insert('tahminler',$data);
        $this->session->set_flashdata('message',display('save_successfully'));
        redirect('customer/prediction');

    }
    public function tahminzamani(){
        $timestamp=time();
        echo $timestamp."</br>";
        $son=0;
        $dakika=date('i',strtotime($timestamp));
        if ($dakika==00) {$son='10';}
        elseif ($dakika<=10) {$son='20';}
        elseif ($dakika<=20) {$son='30';}
        elseif ($dakika<=30) {$son='40';}
        elseif ($dakika<=40) {$son='50';}
        elseif ($dakika<=50) {$son='00';$timestamp=strtotime("+1 hour",$timestamp);}
        elseif ($dakika<=59) {$son='10';$timestamp=strtotime("+1 hour",$timestamp);}
        echo (date('m/d/Y H',strtotime($timestamp)).':'.$son);
    }
    public function get_deposit()
    {
     $user_id = $this->session->userdata('user_id');
     if ($this->input->post('coin')!="USD"){
     $coin_id=$this->db->select('id')->from('cuzdanlar')->where('symbol',$this->input->post('coin'))->get()->row()->id;
     $result=$this->db->select_sum('deposit_amount')->from('deposit_p')->where("user_id",$user_id)->where('deposit_method',$coin_id)->get()->row()->deposit_amount;
 }
 else {
    $result = $data = $this->deshboard_model->get_cata_wais_transections()["balance"];
 }
     echo $result;
 }

}