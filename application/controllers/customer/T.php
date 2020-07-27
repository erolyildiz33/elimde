<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class T extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();

        if (!$this->session->userdata('isLogIn')) 
            redirect('login');

        if (!$this->session->userdata('user_id')) 
            redirect('login');  



    }


    public function index()
    { 

        $user_id = $this->session->userdata('user_id'); 
        $data['uyeler']=uye_listesi($user_id);
        $data['user']=$user_id;
        $data['title']   = display('uye_listesi'); 
        $data['content'] = $this->load->view('customer/pages/uye_listesi', $data, true);
        $this->load->view('customer/layout/main_wrapper', $data);  
    }
    public function altgetir(){
        $level=$this->db->select('level')
        ->from('team_bonus')
        ->where('user_id',$this->session->userdata('user_id'))
        ->get()
        ->row()->level;
        $derinlik=$this->input->post('derinlik');
        $user_id=$this->input->post('user_id');
        $result=$this->db->select("u.user_id,u.username,u.sponsor_id")
        ->from('user_registration u')
        ->join('team_bonus t','u.user_id=t.user_id')
        ->where('u.sponsor_id',$user_id)
        ->where('t.level >',0)
        ->get()
        ->result();
        $arr=[];
        foreach ($result as $key => $value) {
         array_push($arr, $this->db->select("u.user_id,u.username,u.sponsor_id,level, sum(i.amount) yatirim")
            ->from('user_registration u')
            ->join ('team_bonus t','t.user_id=u.user_id')
            ->join ('investment i','i.user_id=u.user_id','left')
            ->where('i.user_id',$value->user_id)
            ->get()
            ->row());
     }
     echo (json_encode($arr));
 }

 public function kol1()
 {
    $user_id = $this->input->post('user_id');
    $result=$this->db->select('user_id,username,sponsor_id')
    ->from('user_registration')
    ->where('sponsor_id',$user_id)
    ->get()
    ->result();
    $arr=[];
foreach ($result as $key => $value) {
        $user=$this->db->select("u.user_id,u.username,u.sponsor_id,level, sum(i.amount) yatirim")
            ->from('user_registration u')
            ->join ('team_bonus t','t.user_id=u.user_id')
            ->join ('investment i','i.user_id=u.user_id','left')
            ->where('i.user_id',$value->user_id)
            
            ->get()
	    ->row();
	   if (!empty($user->user_id)){array_push($arr,$user);}

        
    }
    echo json_encode($arr);
}
}

