<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auto_commission extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array(
            'customer/auth_model',
            'customer/package_model',
            'customer/transections_model',
            'customer/investment_model',
            'common_model',
        ));
    }
    public function payout(){
     
        $blockday=intval($this->db->select("day")->from('blockday')->where('uid',1)->get()->row()->day);
        $usere = $this->db->select("*")
        ->from('earnings')
        ->where('status',0)
        ->get()
        ->result();
        foreach ($usere as $key => $value) {
            $date_1 = date_create(date('Y-m-d'));
            $date_2 = date_create($value->date);
            $diff = date_diff($date_2, $date_1);
            if($diff->days>=$blockday){
                $this->db->where('earning_id', $value->earning_id)
                ->update("earnings",array("status"=>1));
            }
        }
        $userem = $this->db->select("*")
        ->from('user_registration')
        ->get()
        ->result();
        foreach ($userem as $key => $value) {
            $date_1 = date_create(date('Y-m-d'));
            $date_2 = date_create($value->created);
	    $diff = date_diff($date_2, $date_1);
            if($diff->days>$blockday){
                $inivest= $this->db->select("*")
                ->from('investment')
                ->where('user_id',$value->user_id)
                ->get()
                ->result();
                if (!$inivest){
                    $this->db->where('user_id', $value->user_id)
                    ->delete("user_registration");
                }
            }
        }
        $day = date('N');
        $investment = $this->db->select("*")
        ->from('investment')
        ->order_by('order_id','DESC')
        ->get()
        ->result();
        if($investment!=NULL){
            foreach ($investment as  $value) {
                $date_1 = date_create(date('Y-m-d'));
                $date_2 = date_create($value->invest_date);
                $diff = date_diff($date_2, $date_1);
                $package_periodp = $this->db->select('period')->from('package')->where('package_id',$value->package_id)->get()->row();
                if ($package_periodp) {
                    $package_period = $package_periodp->period;
                }else{
                    $package_period = 0;
                }
                $p_type=$this->db->select("p_type")->from("package")->where("package_id",$value->package_id)->get()->row()->p_type;
                if ($p_type==0){
                   if($diff->days>0  && $diff->days<=$package_period){
                    $days = floor($diff->format("%R%a")%7);} else { $days = 1;}
                    if($days==0){
                        $rio = $this->db->select('package_id,weekly_roi')->from('package')->where('package_id',$value->package_id)->get()->row();
                        $user_info = $this->db->select('user_id,f_name,l_name,username,phone,email')->from('user_registration')->where('user_id',$value->user_id)->get()->row();
                        $amount = $rio->weekly_roi;
                        $paydata = array(
                            'user_id'       => $value->user_id,
                            'Purchaser_id'  => $value->user_id,
                            'earning_type'  => 'type2',
                            'package_id'    => $value->package_id,
                            'order_id'      => $value->order_id,
                            'amount'        => $amount,
                            'status'        => 1,
                            'date'          => date('Y-m-d'),
                        );
                        $check = $this->db->select('*')
                        ->from('earnings')
                        ->where('package_id',$value->package_id)
                        ->where('order_id',$value->order_id)
                        ->where('user_id',$value->user_id)
                        ->where('earning_type','type2')
                        ->where('status',1)
                        ->where('date',date('Y-m-d'))
                        ->get()->num_rows();
                        if(empty($check)){
                            $this->db->insert('earnings',$paydata);
                            $balance = $this->common_model->get_all_transection_by_user($user_info->user_id);
                            $this->load->library('sms_lib');
                            $template = array(
                                'name'      => $user_info->f_name.' '.$user_info->l_name,
                                'new_balance'=> $balance['balance'],
                                'date'      => date('d F Y')
                            );
                            $send_sms = $this->sms_lib->send(array(
                                'to'              => $user_info->phone,
                                'template'        => 'You received your payout. Your new balance is $%new_balance%',
                                'template_config' => $template,
                            ));
                            if($send_sms){
                                $message_data = array(
                                    'sender_id' =>1,
                                    'receiver_id' => $user_info->user_id,
                                    'subject' => 'Payout',
                                    'message' => 'You received your payout. Your new balance is $'.$balance['balance'],
                                    'datetime' => date('Y-m-d h:i:s'),
                                );
                                $this->db->insert('message',$message_data);
                            }
                            $set = $this->common_model->email_sms('email');
                            $appSetting = $this->common_model->get_setting();
                            $post = array(
                                'title'             => $appSetting->title,
                                'subject'           => 'Payout',
                                'to'                => $user_info->email,
                                'message'           => 'You received your payout. Your new balance is $'.$balance['balance'],
                            );
                            $send_email = $this->common_model->send_email($post);
                            if($send_email){
                                $n = array(
                                    'user_id'                => $user_info->user_id,
                                    'subject'                => 'Payout',
                                    'notification_type'      => 'Payout',
                                    'details'                => 'You received your payout. Your new balance is $'.$balance['balance'],
                                    'date'                   => date('Y-m-d h:i:                                                                                                                                                             s'),
                                    'status'                 => '0'
                                );
                                $this->db->insert('notifications',$n);
                            }
                        }
                    }
		}else {
                    if($diff->days>0  && $diff->days<=$package_period){
                        $rio = $this->db->select('package_id,daily_roi')->from('package')->where('package_id',$value->package_id)->get()->row();
                        $user_info = $this->db->select('user_id,f_name,l_name,username,phone,email')->from('user_registration')->where('user_id',$value->user_id)->get()->row();
			$amount = $rio->daily_roi;
                        $paydata = array(
                            'user_id'       => $value->user_id,
                            'Purchaser_id'  => $value->user_id,
                            'earning_type'  => 'type2',
                            'package_id'    => $value->package_id,
                            'order_id'      => $value->order_id,
                            'amount'        => $amount,
                            'status'        => 0,
                            'date'          => date('Y-m-d'),
                        );
                        $check = $this->db->select('*')
                        ->from('earnings')
                        ->where('package_id',$value->package_id)
                        ->where('order_id',$value->order_id)
                        ->where('user_id',$value->user_id)
                        ->where('earning_type','type2')
                        ->where('status',0)
                        ->where('date',date('Y-m-d'))
			->get()->num_rows();
	                if(empty($check)){
                            $this->db->insert('earnings',$paydata);
                            $balance = $this->common_model->get_all_transection_by_user($user_info->user_id);
                            $this->load->library('sms_lib');
                            $template = array(
                                'name'      => $user_info->f_name.' '.$user_info->l_name,
                                'new_balance'=> $balance['balance'],
                                'date'      => date('d F Y')
                            );
                            $send_sms = $this->sms_lib->send(array(

                                'to'              => $user_info->phone,
                                'template'        => 'You received your payout.Your new balance is $%new_balance%',
                                'template_config' => $template,
                            ));
                            if($send_sms){
                                $message_data = array(
                                    'sender_id' =>1,
                                    'receiver_id' => $user_info->user_id,
                                    'subject' => 'Payout',
                                    'message' => 'You received your payout. Your new balance is $'.$balance['balance'],
                                    'datetime' => date('Y-m-d h:i:s'),
                                );
                                $this->db->insert('message',$message_data);
                            }
                            $set = $this->common_model->email_sms('email');
                            $appSetting = $this->common_model->get_setting();
                            $post = array(
                                'title'             => $appSetting->title,
                                'subject'           => 'Payout',
                                'to'                => $user_info->email,
                                'message'           => 'You received your payout. Your new balance is $'.$balance['balance'],
                            );
                            $send_email = $this->common_model->send_email($post);
                            if($send_email){
                                $n = array(
                                    'user_id'                => $user_info->user_id,
                                    'subject'                => 'Payout',
                                    'notification_type'      => 'Payout',
                                    'details'                => 'You received your payout. Your new balance is $'.$balance['balance'],
                                    'date'                   => date('Y-m-d h:i:s'),
                                    'status'                 => '0'
                                );
                                $this->db->insert('notifications',$n);
                            }

                        }
                    }
                }
            }
        }
    }
}


