<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_load extends CI_Controller {
 	
 	public function __construct()
 	{
 		parent::__construct();
 		$this->load->model(array(
 			'backend/withdraw/withdraw_model'  
 		));
 		
		if (!$this->session->userdata('isLogin') 
			&& !$this->session->userdata('isAdmin'))
			redirect('admin');
 	}

	public function user_info_load($id)
	{  

		$user_id = $this->input->get('id');
		$data = $this->db->select('*')
		->from('user_registration')
		->where('user_id',$user_id)
		->get()
		->row();
		
		echo json_encode($data);
	
	}
public function admin(){
		echo (json_encode( $this->db->select("
				admin.*, 
				CONCAT_WS(' ', firstname, lastname) AS fullname 
			")
			->from('admin')
			->order_by('id', 'desc')
			->get()
			->result()));
	}
public function advertisement(){
		echo (json_encode($this->db->select('*')
			->from('advertisement')
			->get()
			->result()));
}
public function article(){
		echo (json_encode($this->db->select('*')
			->from('web_article')
			->get()
			->result()));
	}

public function articlesingle(){
echo ($this->db->select("cat_name_en, cat_name_fr")->from('web_category')->where('cat_id',$this->input->post('cat_id'))->get()->row()->cat_name_en);
}
public function category(){
		echo (json_encode($this->db->select('*')
			->from('web_category')
			->get()
			->result()));
	}


public function findlocalCurrency()
{
	return ($this->db->select('usd_exchange_rate, currency_name, currency_iso_code, currency_symbol, currency_position')
	->from('local_currency')
	->where('currency_id', 1)
	->get()
	->row());
}
public function editcurr()
{
	$localcurrency = $this->findlocalCurrency();
	$price_usd=$this->input->post('price_usd');
if  ($localcurrency->currency_position=='l'){ echo $localcurrency->currency_symbol." ".$price_usd*$localcurrency->usd_exchange_rate;}else{echo $price_usd*$localcurrency->usd_exchange_rate." ".$localcurrency->currency_symbol;}
}
public function all()
	{
	 echo json_encode($this->db->select('*')
			->from('crypto_currency')
			->get()
			->result());
	}

	public function datecoment(){
		$date=date_create($this->input->post('deposit_date'));
		echo date_format($date,"jS F Y"); 

	}

	public function deposit_all(){

		echo (json_encode($this->db->select('*')
			->from('deposit')
			->where('status',$this->input->post('status'))
			->get()
			->result()));
	}
	public function slider(){

		echo (json_encode($this->db->select('*')
			->from('web_slider')
			->where('status',1)
			->order_by('s_status',"ASC")
			->get()
			->result()));
	}
}
