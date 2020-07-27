<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Deshboard_model extends CI_Model {

	public function get_cata_wais_transections()
	{
		
		// My Payout
		$my_payout = $this->db->select("sum(amount) as earns2")
		->from('earnings')
		->where('user_id',$this->session->userdata('user_id'))
		->where('earning_type','type2')
		->where('status',1)
		->get()
		->row();
		$pay = $my_payout->earns2;

		//Package Commission
		$commission = $this->db->select("sum(amount) as earns3")
		->from('earnings')
		->where('user_id',$this->session->userdata('user_id'))
		->where('earning_type','type3')
		->where('status',1)
		->get()
		->row();
		$pack_commission = $commission->earns3;

		//team bonus
		$team_bonus= @$this->db->select("sum(amount) as earns3")
		->from('earnings')
		->where('user_id',$this->session->userdata('user_id'))
		->where('earning_type','team')
		->where('status',1)
		->get()
		->row()->earns3;
		//total earning
		@$total_earn = @$pay+@$pack_commission+@$team_bonus;
		
		

		$data = $this->db->select('*')
		->from('transections')
		->where('user_id',$this->session->userdata('user_id'))
		->where('status',1)
		->get()
		->result();

		$dep = 0;
		$dep_f = 0;
		$w_f = 0;
		$t_f = 0;
		$we = 0;
		$invest = 0;
		$tras = 0;
		$reciver = 0;
		$individule = array();

		foreach ($data as $value) {

			if(@$value->transection_category=='deposit'){

				$deposit = $this->getFees('deposit',$value->releted_id);
				@$dep_f = $dep_f + $deposit->fees;
				$individule['d_fees'] = $dep_f;

				$dep = $dep + $value->amount;
				$individule['deposit'] = $dep;
			}

			if(@$value->transection_category=='withdraw'){

				$withdraw = $this->getFees('withdraw',$value->releted_id);
				@$w_f = $w_f + $withdraw->fees;
				$individule['w_fees'] = $w_f;

				$we = $we+$value->amount;
				$individule['withdraw'] = $we;

			}

			if(@$value->transection_category=='transfer'){

				$transfer = $this->getFees('transfer',$value->releted_id);
				@$t_f = $t_f + $transfer->fees;
				$individule['t_fees'] = $t_f;

				$tras = $tras+$value->amount;
				$individule['transfar'] = $tras;
			}

			if(@$value->transection_category=='investment'){
				$invest = $invest+$value->amount;
				$individule['investment'] = $invest;
			}

			if(@$value->transection_category=='reciver'){
				$reciver = $reciver+$value->amount;
				$individule['reciver'] = $reciver;
			}
		}

		$team_data=$this->db->select('*')
		->from('team_bonus')
		->where('user_id',$this->session->userdata('user_id'))
		->get()
		->row();
		$individule['commission'] = @$pack_commission;
		$individule['my_earns'] = @$pay;
		$individule['team_bonus'] = @$team_bonus;
		$individule['team_commission'] = @$team_data->team_commission;
		$individule['sponser_commission'] = @$team_data->sponser_commission;

			//TOTAL FEES
		$total_fees = (@$individule['d_fees']+@$individule['w_fees']+@$individule['t_fees']);
			#-----------------------

		$individule['balance'] = (@$individule['deposit']+@$total_earn+@$individule['reciver'])-(@$individule['withdraw']+@$individule['investment']+@$individule['transfar']+@$total_fees);
		
		$total_freeze=$this->db->select("sum(amount) as total")
		->from('earnings')
		->where('user_id',$this->session->userdata('user_id'))
		->where('status',0)
		->get()
		->row()->total;

		if (!empty($total_freeze)) {$individule['freeze']=$total_freeze;}else{$individule['freeze']='0';}
		return $individule;
		
	}

	public function getFees($table,$id)
	{
		return $this->db->select('*')
		->from($table)
		->where($table.'_id',$id)
		->where('status',1)
		->get()
		->row();
	}


	public function all_package()
	{
		return $this->db->select("*")
		->from('package')
		->where('status',1)
		->get()
		->result();
	}

	public function my_info()
	{
		$user_id = $this->session->userdata('user_id');

		$my_info = $this->db->select('*')
		->from('user_registration')
		->where('user_id',$user_id)
		->get()
		->row();
		


		$sponser_info = $this->db->select('*')
		->from('user_registration')
		->where('user_id',@$my_info->sponsor_id)
		->get()
		->row();
		

		return array('my_info'=>$my_info,'sponser_info'=>$sponser_info);
	}	


	public function my_sales()
	{
		$user_id = $this->session->userdata('user_id');
		$result1 = $this->db->select("*")
		->from('user_registration')
		->where('sponsor_id',$user_id)
		->limit(5)
		->order_by('created', 'DESC')
		->get()
		->result();
		return $result1;		
	}


	public function my_payout()
	{
		$user_id = $this->session->userdata('user_id');
		
		$result1 = $this->db->select("*")
		->from('earnings')
		->where('user_id',$user_id)
		->where('earning_type','type2')
		->limit(5)
		->order_by('date', 'DESC')
		->get()
		->result();

		return $result1;		
	}	


	public function my_bangk_info()
	{
		$user_id = $this->session->userdata('user_id');
		$result1 = $this->db->select("*")
		->from('bank_info')
		->where('user_id',$user_id)
		->get()
		->row();
		return $result1;		
	}


	public function my_total_investment($user_id)
	{
		$result = $this->db->select("sum(amount) as total_amount")
		->from('investment')
		->where('user_id',$user_id)
		->get()
		->row();
		return $result;		
	}

	public function pending_withdraw()
	{
		$user_id = $this->session->userdata('user_id');
		return $this->db->select("*")
		->from('withdraw')
		->where('status',1)
		->where('user_id',$user_id)
		->limit(5)
		->order_by('request_date', 'DESC')
		->get()
		->result();
	}	

	public function my_level_information($user_id)
	{
		
		return $this->db->select('level')
		->from('team_bonus')
		->where('user_id',$user_id)
		->get()
		->row();
	}



}

