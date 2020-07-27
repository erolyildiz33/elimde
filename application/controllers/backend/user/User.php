<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array(
			'backend/user/user_model'  
		));

		if (!$this->session->userdata('isAdmin')) 
			redirect('logout');

		if (!$this->session->userdata('isLogin') 
			&& !$this->session->userdata('isAdmin'))
			redirect('admin');
	}

	public function index()
	{  
		$data['title']  = display('user_list');
 		
		$data['content'] = $this->load->view("backend/user/ulist", $data, true);
		$this->load->view("backend/layout/main_wrapper", $data);
	}
     

    public function allbalance()
    {
        $data = $this->db->select('*')
        ->from('transections')
        ->where('user_id',$this->uri->segment(5))
        ->where('status',1)
        ->order_by('transection_date_timestamp','DESC')
        ->get()
        ->result();
        $commission = $this->db->select("*")
        ->from('earnings')
        ->where('user_id',$this->uri->segment(5))
        ->where('earning_type','type3')
        ->where('status',1)
        ->get()
        ->result();
        $team_bonus= $this->db->select("*")
        ->from('earnings')
        ->where('user_id',$this->uri->segment(5))
        ->where('earning_type','team')
        ->where('status',1)
        ->get()
        ->result();
        $my_payout=$this->db->select('sum(amount) as total')
        ->from('earnings')
        ->where('earning_type','type2')
        ->where('user_id',$this->uri->segment(5))
        ->where('status',1)
        ->get()
        ->row()->total;
        $grand_data=[];
        $i=1;
	foreach ($data as $key => $value) {
            if ($value->transection_category=='deposit'){
                $result=$this->db->select('deposit_method')->from('deposit')->where('deposit_id',$value->releted_id)->get()->row()->deposit_method;
                $grand_data[]=array('id'=>$i,
                    'user_id'=>$value->user_id,
                    'category'=>'Deposit',
                    'amount'=>$value->amount,
                    'comment'=>'Deposit: '.$result,
                    'date'=>$value->transection_date_timestamp
                );
                $i++;
            }
            if ($value->transection_category=='withdraw'){
                $result=$this->db->select('walletid')->from('withdraw')->where('withdraw_id',$value->releted_id)->get()->row()->walletid;
                $grand_data[]=array('id'=>$i,
                    'user_id'=>$value->user_id,
                    'category'=>'Withdraw',
                    'amount'=>$value->amount,
                    'comment'=>'Walletid: '.$result,
                    'date'=>$value->transection_date_timestamp
                );
                $i++;
            }
            if ($value->transection_category=='transfer'){
                $result=$this->db->select("CONCAT_WS(' ', u.f_name, u.l_name) as FullName")
                ->from("transfer t")
                ->join("user_registration u","u.user_id=t.receiver_user_id")
                ->where("t.transfer_id",$value->releted_id)
                ->get()
                ->row()->FullName;
                $grand_data[]=array('id'=>$i,
                    'user_id'=>$value->user_id,
                    'category'=>'Transfer',
                    'amount'=>$value->amount,
                    'comment'=>'Tranfer To : '.$result,
                    'date'=>$value->transection_date_timestamp
                );
                $i++;
            }
            if ($value->transection_category=='investment'){
                $result=$this->db->select('p.package_name as name')->from('investment i')
                ->join('package p','p.package_id=i.package_id')
                ->where('i.order_id',$value->releted_id)
                ->get()
                ->row()->name;
                $grand_data[]=array('id'=>$i,
                    'user_id'=>$value->user_id,
                    'category'=>'Investment',
                    'amount'=>$value->amount,
                    'comment'=>'Invest Package Name is : '.$result,
                    'date'=>$value->transection_date_timestamp
                );
                $i++;
            }
            if ($value->transection_category=='reciver'){
                $result=$this->db->select('CONCAT_WS(" ", u.f_name, u.l_name) as FullName')->from('transfer t')
                ->join('user_registration u','u.user_id=t.receiver_user_id')
                ->where('transfer_id',$value->releted_id)
                ->get()
                ->row()->FullName;
                $grand_data[]=array('id'=>$i,
                    'user_id'=>$value->user_id,
                    'category'=>'Reciver',
                    'amount'=>$value->amount,
                    'comment'=>'Receive From : '.$result,
                    'date'=>$value->transection_date_timestamp
                );
                $i++;
            }
		}
        if ($my_payout){
           $grand_data[]=array('id'=>$i,
            'user_id'=>$value->user_id,
            'category'=>'Total Packets Earn',
            'amount'=>number_format($my_payout,2),
            'comment'=>'',
            'date'=>date_create()->format('Y-m-d')
        );
           $i++;
       }
       foreach ($team_bonus as $key => $value) {
           $level=$this->db->select('level_name')->from('setup_commission')->where('team_bonus',$value->amount)->get()->row()->level_name;
           $grand_data[]=array('id'=>$i,
            'user_id'=>$value->user_id,
            'category'=>'Level Bonus',
            'amount'=>$value->amount,
            'comment'=>'Level '.$level.'Bonus',
            'date'=>$value->date
        );
           $i++;
       }
       foreach ($commission as $key => $value) {
        $result=$this->db->select('CONCAT_WS(" ", f_name, l_name) as FullName')->from('user_registration')
        ->where('user_id',$value->Purchaser_id)
        ->get()
        ->row()->FullName;
        $grand_data[]=array('id'=>$i,
            'user_id'=>$value->user_id,
            'category'=>'Referans Bonus',
            'amount'=>$value->amount,
            'comment'=>'From '.$result,
            'date'=>$value->date
        );
        $i++;
    }
    echo json_encode($grand_data);
}

	public function allcount()
    {

        echo json_encode($this->db->select("
                u.*, 
                CONCAT_WS(' ', u.f_name, u.l_name) AS fullname, 
            IF(t.user_id is  null,0,1) as statuss,t.level as level")
            ->from('user_registration u')
            ->join('team_bonus t', 'u.user_id = t.user_id', 'left')
            ->order_by('statuss', 'desc')
            ->get()
            ->result());
    }
	public function orderingslide(){
	
            foreach($_GET['order'] as $value =>$key)
	    {
		    echo $query='UPDATE web_slider SET s_status='.$value.' where slider_id='.$key;
  		    $this->db->query($query);

	    }
	}

	/*
    |----------------------------------------------
    |   Datatable Ajax data Pagination+Search
    |----------------------------------------------     
    */
    public function ajax_list()
    {
    	$list = $this->user_model->get_datatables();
    	
    	$data = array();
    	$no = $_POST['start'];
    	foreach ($list as $users) {
    		$row = array();
    		
    			$no++;
    			
    			$row[] = '<a href="'.base_url("backend/user/user/form/$users->uid").'"'.' class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="Update"><i class="fa fa-pencil" aria-hidden="true"></i></a>';
    			$row[] = $no;
    			$row[] = '<a href="'.base_url("backend/user/user/user_details/$users->uid").'">'.$users->user_id.'</a>';
    			$row[] = $users->sponsor_id;
    			$row[] = '<a href="'.base_url("backend/user/user/user_details/$users->uid").'">'.$users->f_name." ".$users->l_name.'</a>';
    			$row[] = '<a href="'.base_url("backend/user/user/user_details/$users->uid").'">'.$users->username.'</a>';
    			$row[] = $users->email;
    			$row[] = $users->phone;
if (@$users->id) {$row[]='Active';}else{$row[]='Passive';}
    			//$row[] = $users->phone;
    			$data[] = $row;

    		}

    		$output = array(
    			"draw" => $_POST['draw'],
    			"recordsTotal" => $this->user_model->count_all(),
    			"recordsFiltered" => $this->user_model->count_filtered(),
    			"data" => $data,
    		);
		//output to json format
    		echo json_encode($output);
    	}


    	public function email_check($email, $uid)
    	{ 
    		$emailExists = $this->db->select('email')
    		->where('email',$email) 
    		->where_not_in('uid',$uid) 
    		->get('user_registration')
    		->num_rows();

    		if ($emailExists > 0) {
    			$this->form_validation->set_message('email_check', 'The {field} is already registered.');
    			return false;
    		} else {
    			return true;
    		}
    	} 

    	public function username_check($username, $uid)
    	{ 
    		$usernameExists = $this->db->select('username')
    		->where('username',$username) 
    		->where_not_in('uid',$uid) 
    		->get('user_registration')
    		->num_rows();

    		if ($usernameExists > 0) {
    			$this->form_validation->set_message('username_check', 'The {field} is already registered.');
    			return false;
    		} else {
    			return true;
    		}
    	} 


    	public function form($uid = null)
    	{ 
    		$data['title']  = display('add_user');
    		/*-----------------------------------*/
    		$this->form_validation->set_rules('username', display('username'),'required|max_length[20]');
    		$this->form_validation->set_rules('sponsor_id', display('sponsor_id'),'required|max_length[6]');
    		$this->form_validation->set_rules('f_name', display('firstname'),'required|max_length[50]');
    		$this->form_validation->set_rules('l_name', display('lastname'),'required|max_length[50]');
		#------------------------#
    		if (!empty($uid)) {   
    			$this->form_validation->set_rules('username', display("username"), "required|max_length[100]|callback_username_check[$uid]|trim"); 
    		} else {
    			$this->form_validation->set_rules('username', display('username'),'required|is_unique[user_registration.username]|max_length[20]');
    		} 
		#------------------------#
    		if (!empty($uid)) {   
    			$this->form_validation->set_rules('email', 'Email Address', "required|valid_email|max_length[100]|callback_email_check[$uid]|trim"); 
    		} else {
    			$this->form_validation->set_rules('email', display('email'),'required|valid_email|is_unique[user_registration.email]|max_length[100]');
    		}


		#------------------------#
    		$this->form_validation->set_rules('password', display('password'),'required|min_length[6]|max_length[32]|md5');
    		$this->form_validation->set_rules('conf_password', display('conf_password'),'required|min_length[6]|max_length[32]|md5|matches[password]');
    		$this->form_validation->set_rules('mobile', display('mobile'),'max_length[30]');
    		$this->form_validation->set_rules('status', display('status'),'required|max_length[1]');
    		/*-----------------------------------*/ 
    		if (empty($uid))
    		{ 
    			$data['user'] = (object)$userdata = array(
    				'uid' 		  => $this->input->post('uid'),
    				'user_id' 	  => $this->randomID(),
    				'sponsor_id'  => $this->input->post('sponsor_id'),
    				'username'    => $this->input->post('username'),
    				'f_name' 	  => $this->input->post('f_name'),
    				'l_name' 	  => $this->input->post('l_name'),
    				'email' 	  => $this->input->post('email'),
    				'password' 	  => md5($this->input->post('password')),
    				'phone' 	  => $this->input->post('mobile'),
    				'reg_ip'      => $this->input->ip_address(),
    				'status'      => $this->input->post('status'),
    			);
    		}
    		else
    		{
    			$data['user'] = (object)$userdata = array(
    				'uid' 		  => $this->input->post('uid'),
    				'user_id' 	  => $this->input->post('user_id'),
    				'sponsor_id'  => $this->input->post('sponsor_id'),
    				'username'    => $this->input->post('username'),
    				'f_name' 	  => $this->input->post('f_name'),
    				'l_name' 	  => $this->input->post('l_name'),
    				'email' 	  => $this->input->post('email'),
    				'password' 	  => md5($this->input->post('password')),
    				'phone' 	  => $this->input->post('mobile'),
    				'reg_ip'      => $this->input->ip_address(),
    				'status'      => $this->input->post('status'),
    			);
    		}
    		/*-----------------------------------*/
    		if ($this->form_validation->run()) 
    		{

    			$uid_query = $this->db->select('user_id')->where('user_id', $this->input->post('sponsor_id'))->get('user_registration')->row();
    			if (!$uid_query) {
    				$this->session->set_flashdata('exception', "Valid Sponsor Id Required");
    				redirect("backend/user/user/form");
    			}


    			if (empty($uid)) 
    			{
    				if ($this->user_model->create($userdata)) {
    					$this->session->set_flashdata('message', display('save_successfully'));
    				} else {
    					$this->session->set_flashdata('exception', display('please_try_again'));
    				}
    				redirect("backend/user/user/form");

    			} 
    			else 
    			{
    				if ($this->user_model->update($userdata)) {
    					$this->session->set_flashdata('message', display('update_successfully'));
    				} else {
    					$this->session->set_flashdata('exception', display('please_try_again'));
    				}
    				redirect("backend/user/user/form/$uid");
    			}
    		} 
    		else 
    		{ 
    			if(!empty($uid)) {
    				$data['title'] = display('edit_user');
    				$data['user']   = $this->user_model->single($uid);
    			}

    			$data['content'] = $this->load->view("backend/user/form", $data, true);
    			$this->load->view("backend/layout/main_wrapper", $data);
    		}
    	}

    	public function user_details($uid = null)
    	{ 
    		$data['title']  = display('details');

    		if(!empty($uid)) {
    			$data['user']   	= $this->user_model->single($uid);
    			$data['deposit']   	= $this->db->select('*')->from('deposit')->limit(10)->where('user_id', $data['user']->user_id)->get()->result();
    			$data['investment']   	= $this->db->select('*')->from('investment')->limit(10)->where('user_id', $data['user']->user_id)->get()->result();
    		}

    		$data['content'] = $this->load->view("backend/user/user_details", $data, true);
    		$this->load->view("backend/layout/main_wrapper", $data);
    	}


    	public function delete($user_id = null)
    	{  
    		if ($this->user_model->delete($user_id)) {
    			$this->session->set_flashdata('message', display('delete_successfully'));
    		} else {
    			$this->session->set_flashdata('exception', display('please_try_again'));
    		}
    		redirect("backend/user/user/");
    	}

    /*
    |----------------------------------------------
    |        id genaretor
    |----------------------------------------------     
    */
    public function randomID($mode = 2, $len = 6)
    {
    	$result = "";
    	if($mode == 1):
    		$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    	elseif($mode == 2):
    		$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    	elseif($mode == 3):
    		$chars = "abcdefghijklmnopqrstuvwxyz0123456789";
    	elseif($mode == 4):
    		$chars = "0123456789";
    	endif;

    	$charArray = str_split($chars);
    	for($i = 0; $i < $len; $i++) {
    		$randItem = array_rand($charArray);
    		$result .="".$charArray[$randItem];
    	}
    	return $result;
    }
    /*
    |----------------------------------------------
    |         Ends of id genaretor
    |----------------------------------------------
    */

}

