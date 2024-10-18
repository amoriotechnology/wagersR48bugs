<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller {

    public $user_id;

    function __construct() {
        parent::__construct();
        $this->load->library('auth');
        $this->load->library('lusers');
        $this->load->library('session');
        $this->load->model('Userm');
        $this->auth->check_admin_auth();
    }
    

  
#=============User Manage Company===============#
// public function managecompany()
// {
//   $content = $this->lusers->manage_company();
//         $this->template->full_admin_html_view($content);
// }   

   public function managecompany()
   {   
        $CI = & get_instance();

        $CI->load->model('Companies');

        $cl=$CI->Companies->company_list();

        // print_r($cl); die();

        foreach ($cl as $key => $value) {
            $id = $value['company_id'];
        }
        
        // $notifyFlag = $this->notificationEmail(false);
        $notifyFlag = $this->notificationEmail($id);

        $data['company_info']=$cl;

        $content = $this->load->view('users/mange_company', $data, true);

        $this->template->full_admin_html_view($content);
    }
    #==============User page load============#
    
    public function notificationEmail($id = null)
   {    
        $CI = & get_instance();
        $this->auth->check_admin_auth();
        $CI->load->model('Companies');
        $cl=$CI->Companies->companyList($id);
        // $bill_history = $CI->Companies->billHistoryList($id);
        // print_r($cl[0]['files']); die();
        // $mail_set = $CI->Companies->getemailConfig();
        // $stm_user = $mail_set[0]->smtp_user;
        // $stm_pass = $mail_set[0]->smtp_pass;
        // $domain_name = $mail_set[0]->smtp_host;
        // $protocol = $mail_set[0]->protocol;

        $paymentReminder = $cl[0]['payment_reminder_date'];
        $dueDate = $cl[0]['due_date'];
        $s_fees = $cl[0]['subscription_fees'];
        $currency = $cl[0]['currency'];
        $reminderEmail = $cl[0]['mail'];
        $company_id = $cl[0]['company_id'];
        // $company_name = $cl[0]['company_name'];
            
        $cal = $dueDate - $paymentReminder;
        $final_date = date('Y-m-' . $cal);
        $current_date = date('Y-m-d');
        // echo $final_date .' '.$current_date; die();
        $currentFinalDate = new DateTime($final_date);
        $nextBillingDate = clone $currentFinalDate;
        $currentYear = date('Y', strtotime($current_date));
        $currentMonth = date('m', strtotime($current_date));
        $nextBillingDate->setDate($currentYear, $currentMonth + 1, $cal);
        $nextBillingPeriod = $nextBillingDate->format('Y-m-d');


        // if ($final_date > $current_date) {
        //     echo "Final Date is greater than Current Date: $final_date"; 
        // } else if ($final_date == $current_date) {
        //     echo "Final Date is equal to Current Date: $final_date"; 
        // } else {
        //     echo "Final Date is less than Current Date: $final_date"; 
        // }
        
        if($final_date == $current_date){
           // echo "if"; die();
            $config = array(
              'protocol' => 'smtp',
              'smtp_host' => 'ssl://smtp.googlemail.com',
              'smtp_user' => 'madhu.amoriotech@gmail.com',
              'smtp_pass' => 'qpyu nlvg xnsy ovro',
              'smtp_port' => 465,
              'smtp_timeout' => 30,
              'charset' => 'utf-8',
              'newline' => '\r\n',
              'mailtype' => 'html',
            );
        
            $this->load->library('email');
            $this->email->initialize($config);
            $this->email->set_newline("\r\n");
            $this->email->set_crlf("\r\n");
            $this->email->from('madhu.amoriotech@gmail.com', 'Stockeai');
            $this->email->to($reminderEmail);
            $this->email->subject('Stockeai billing reminder.');
            $this->email->message('Stockeai billing reminder');
            $file_location = FCPATH . 'uploads/Pdf/'.$cl[0]['files']; 
            // $this->email->attach($file_location);
            if(!empty($cl[0]['files'])){
               $file_location = FCPATH . 'uploads/Pdf/'.$cl[0]['files']; 
               $this->email->attach($file_location);
            }
            // $send = $this->email->send();
            if ($this->email->send()) {
                echo "<script>alert('Email Send successfully');</script>"; 
                $data = array(
                    'status' => 'Success',
                    'notification_sent_date' => $final_date,
                    'company_id' => $company_id,
                    'created_date' => $final_date,
                    'invoice_number' => $this->Invoicegenerator(10),
                    'bill_period' => $nextBillingPeriod
                );
            $this->db->insert('bill_history', $data);
             // return true;
            // echo "success";
            // echo $this->db->last_query(); die();
            // redirect(base_url('user/managecompany'));
            }else{
                echo "<script>alert('Email Send Failed !!!!!');</script>";
                echo 'Error sending email: ' . $this->email->print_debugger();
            }   
              
        } else if ($final_date > $current_date) {
             // echo "else"; die();
            
            $config = array(
              'protocol' => $protocol,
              'smtp_host' => $domain_name,
              'smtp_user' => $stm_user,
              'smtp_pass' => $stm_pass,
              'smtp_port' => 465,
              'smtp_timeout' => 30,
              'charset' => 'utf-8',
              'newline' => '\r\n',
              'mailtype' => 'html',
            );
        
            $this->load->library('email');
            $this->email->initialize($config);
            $this->email->set_newline("\r\n");
            $this->email->set_crlf("\r\n");
            $this->email->from($stm_user, 'Stockeai');
            $this->email->to($reminderEmail);
            $this->email->subject('Your subscription payment is past due');
            $this->email->message('Your subscription payment is past due. Please proceed to subscribe to continue your service.');
            // $send = $this->email->send();
            if ($this->email->send()) {
                echo "<script>alert('Email Send successfully');</script>"; 
            }else{
                echo "<script>alert('Email Send Failed !!!!!');</script>";
                echo 'Error sending email: ' . $this->email->print_debugger();
            }   
        }
   }

    

    public function adadmin()
    {
    $content = $this->lusers->useraddforms();
        $this->template->full_admin_html_view($content);
    }
    

    public function index() {
        $content = $this->lusers->index();
        $this->template->full_admin_html_view($content);
    }


    public function insert_admin_user()
    {
        $num_str = sprintf("%03d", mt_rand(1, 999));
        // $password=md5($_REQUEST['password']);

        $password = md5("gef" . $this->input->post('password',true));


        $uid=$_SESSION['user_id'];
     $data = array(
            
               'unique_id'  =>    "AD".$_POST['companyid'].$num_str, 
               
             
                'create_by'     => $uid,
               
            );
             $insert=$this->db->insert('users',$data);

        $sql='insert into user_login(
            `user_id`,
        `username`,
        `unique_id`,
        `password`,

        `user_type`,

        `email_id`,
        `cid`,
        `u_type`,
        `create_by`
    )
    
    
    values(
        "'.$_POST['companyid'].'",
    "'.$_POST['username'].'",
    "'."AD".$_POST['companyid'].$num_str.'",  

    "'.$password.'",

    "2",

    "'.$_POST['email'].'",
    "'.$_POST['companyid'].'",
    "2",
    "'.$uid.'")';
   


//   echo $sql;
//    die();


   $query=$this->db->query($sql);
     if($query)
    {
         $this->session->set_userdata(array('message' => display('successfully_added')));
    redirect('User/adadmin');
    }
 


}


public function company_insert_branch(){
        $uid=$_SESSION['user_id'];
        $url=$this->input->post('url',TRUE);
        $url_st=$this->input->post('url_st',TRUE);
        $url_lctx=$this->input->post('url_lctx',TRUE);
        $url_sstx=$this->input->post('url_sstx',TRUE);
   $c_id=$this->input->post('company_id',TRUE);
   $this->db->where('company_id',$c_id,TRUE);
   $this->db->delete('company_information');
   $this->db->where('company_id',$c_id,TRUE);
   $this->db->delete('url');
   $this->db->where('company_id',$c_id,TRUE);
   $this->db->delete('url_st');
   $this->db->where('company_id',$c_id,TRUE);
   $this->db->delete('url_lctx');
   $this->db->where('company_id',$c_id,TRUE);
   $this->db->delete('url_sstx');
    $data = array(
      //  'company_id'   => $uid,
        'company_name'    =>$this->input->post('company_name',true),
        'email' => $this->input->post('email',true),
        'address'      => $this->input->post('address',true),
        'mobile'   => $this->input->post('mobile',true),
        'website'  => $this->input->post('website',true),
        'c_city'      => $this->input->post('c_city',true),
                'c_state'      => $this->input->post('c_state',true),
        'Bank_Name'      => $this->input->post('Bank_Name',true),
        'Account_Number'      => $this->input->post('Account_Number',true),
        'Bank_Routing_Number'      => $this->input->post('Bank_Routing_Number',true),
        'Bank_Address'      => $this->input->post('Bank_Address',true),
        'Federal_Pin_Number'      => $this->input->post('Federal_Pin_Number',true),
        'st_tax_id'      => $this->input->post('statetx',true),
        'lc_tax_id'      => $this->input->post('localtx',true),
        'State_Sales_Tax_Number'      => $this->input->post('State_Sales_Tax_Number',true),
        'create_by'     => $uid,
        'status'     => 0
    );
    $insert=  $this->db->insert('company_information',$data);  // echo $this->db->last_query();
    $insert_id = $this->db->insert_id();
    $user_name=$this->input->post('user_name',TRUE);
    $password=$this->input->post('password',TRUE);
    $pin_number=$this->input->post('pin_number',TRUE);
      if($url){
    for ($i = 0, $n = count($url); $i < $n; $i++) {
        $url1 = $url[$i];
        $user_name1 = $user_name[$i];
        $password1 = $password[$i];
        $pin_number1 = $pin_number[$i];
        $data = array(
        'url'         =>$url1,
        'user_name'         =>$user_name1,
        'password'         =>$password1,
        'create_by'     => $uid,
        'company_id'  =>$insert_id,
        'pin_number'         =>$pin_number1
        );
        $this->db->insert('url', $data);
    }
}
    //echo $this->db->last_query();
        // echo "<br/>";
        $user_name_st=$this->input->post('user_name_st',TRUE);
        $password_st=$this->input->post('password_st',TRUE);
        $pin_number_st=$this->input->post('pin_number_st',TRUE);
        if($url_st){
        for ($i = 0, $n = count($url_st); $i < $n; $i++) {
            $url_st1 = $url_st[$i];
            $user_name_st1 = $user_name_st[$i];
            $password_st1 = $password_st[$i];
            $pin_number_st1 = $pin_number_st[$i];
            $data = array(
            'url_st'         =>$url_st1,
            'user_name_st'    =>$user_name_st1,
            'password_st'         =>$password_st1,
            'create_by'     => $uid,
            'company_id'  =>$insert_id,
            'pin_number_st'         =>$pin_number_st1
            );
            $this->db->insert('url_st', $data);
// echo $this->db->last_query(); die();
        } 
    }
        
        //echo $this->db->last_query();
        // echo "<br/>";
        $user_name_lctx=$this->input->post('user_name_lctx',TRUE);
        $password_lctx=$this->input->post('password_lctx',TRUE);
        $pin_number_lctx=$this->input->post('pin_number_lctx',TRUE);
          if($url_lctx){
        for ($i = 0, $n = count($url_lctx); $i < $n; $i++) {
            $url_lctx1 = $url_lctx[$i];
            $user_name_lctx1 = $user_name_lctx[$i];
            $password_lctx1 = $password_lctx[$i];
            $pin_number_lctx1 = $pin_number_lctx[$i];
            $data = array(
            'url_lctx'         =>$url_lctx1,
            'user_name_lctx'    =>$user_name_lctx1,
            'password_lctx'         =>$password_lctx1,
            'create_by'     => $uid,
            'company_id'  =>$insert_id,
            'pin_number_lctx'         =>$pin_number_lctx1
            );
            $this->db->insert('url_lctx', $data);
// echo $this->db->last_query(); die();
        } 
    }
        //echo $this->db->last_query();
         //echo "<br/>";
        $user_name_sstx=$this->input->post('user_name_sstx',TRUE);
        $password_sstx=$this->input->post('password_sstx',TRUE);
        $pin_number_sstx=$this->input->post('pin_number_sstx',TRUE);
          if($url_sstx){
        for ($i = 0, $n = count($url_sstx); $i < $n; $i++) {
            $url_sstx1 = $url_sstx[$i];
            $user_name_sstx1 = $user_name_sstx[$i];
            $password_sstx1 = $password_sstx[$i];
            $pin_number_sstx1 = $pin_number_sstx[$i];
            $data = array(
            'url_sstx'         =>$url_sstx1,
            'user_name_sstx'    =>$user_name_sstx1,
            'password_sstx'         =>$password_sstx1,
            'create_by'     => $uid,
            'company_id'  =>$insert_id,
            'pin_number_sstx'         =>$pin_number_sstx1
            );
            $this->db->insert('url_sstx', $data);
// echo $this->db->last_query(); die();
        } 
    }
        //echo $this->db->last_query();
//die();
    if($insert)
    {
       redirect('Company_setup/manage_company');
    }
}
public function company_update_branch($company_id){
        $uid=$_SESSION['user_id'];
     $id=$company_id;
        $url=$this->input->post('url',TRUE);
        $url_st=$this->input->post('url_st',TRUE);
        $url_lctx=$this->input->post('url_lctx',TRUE);
        $url_sstx=$this->input->post('url_sstx',TRUE);
   $c_id=$this->input->post('company_id',TRUE);
   $this->db->where('company_id',$c_id,TRUE);
   $this->db->delete('company_information');
   $this->db->where('company_id',$c_id,TRUE);
   $this->db->delete('url');
   $this->db->where('company_id',$c_id,TRUE);
   $this->db->delete('url_st');
   $this->db->where('company_id',$c_id,TRUE);
   $this->db->delete('url_lctx');
   $this->db->where('company_id',$c_id,TRUE);
   $this->db->delete('url_sstx');
    $data = array(
        'company_id'   => $id,
        'company_name'    =>$this->input->post('company_name',true),
        'email' => $this->input->post('email',true),
        'address'      => $this->input->post('address',true),
        'mobile'   => $this->input->post('mobile',true),
        'website'  => $this->input->post('website',true),
        'Bank_Name'      => $this->input->post('Bank_Name',true),
        'Account_Number'      => $this->input->post('Account_Number',true),
        'Bank_Routing_Number'      => $this->input->post('Bank_Routing_Number',true),
        'Bank_Address'      => $this->input->post('Bank_Address',true),
        'Federal_Pin_Number'      => $this->input->post('Federal_Pin_Number',true),
        'st_tax_id'      => $this->input->post('statetx',true),
        'lc_tax_id'      => $this->input->post('localtx',true),
        'State_Sales_Tax_Number'      => $this->input->post('State_Sales_Tax_Number',true),
        'create_by'     => $uid,
        'status'     => 0
    );
    $insert=  $this->db->insert('company_information',$data);  // echo $this->db->last_query();
    $insert_id = $this->db->insert_id();
    $user_name=$this->input->post('user_name',TRUE);
    $password=$this->input->post('password',TRUE);
    $pin_number=$this->input->post('pin_number',TRUE);
    if($url){
    for ($i = 0, $n = count($url); $i < $n; $i++) {
        $url1 = $url[$i];
        $user_name1 = $user_name[$i];
        $password1 = $password[$i];
        $pin_number1 = $pin_number[$i];
        $data = array(
            'company_id'   => $id,
        'url'         =>$url1,
        'user_name'         =>$user_name1,
        'password'         =>$password1,
        'create_by'     => $uid,
        'company_id'  =>$insert_id,
        'pin_number'         =>$pin_number1
        );
        $this->db->insert('url', $data);
    }
}
    
        $user_name_st=$this->input->post('user_name_st',TRUE);
        $password_st=$this->input->post('password_st',TRUE);
        $pin_number_st=$this->input->post('pin_number_st',TRUE);
           if($url_st){
        for ($i = 0, $n = count($url_st); $i < $n; $i++) {
            $url_st1 = $url_st[$i];
            $user_name_st1 = $user_name_st[$i];
            $password_st1 = $password_st[$i];
            $pin_number_st1 = $pin_number_st[$i];
            $data = array(
                'company_id'   => $id,
            'url_st'         =>$url_st1,
            'user_name_st'    =>$user_name_st1,
            'password_st'         =>$password_st1,
            'create_by'     => $uid,
            'company_id'  =>$insert_id,
            'pin_number_st'         =>$pin_number_st1
            );
            $this->db->insert('url_st', $data);

        }}
        
        $user_name_lctx=$this->input->post('user_name_lctx',TRUE);
        $password_lctx=$this->input->post('password_lctx',TRUE);
        $pin_number_lctx=$this->input->post('pin_number_lctx',TRUE);
          if($url_lctx){
        for ($i = 0, $n = count($url_lctx); $i < $n; $i++) {
            $url_lctx1 = $url_lctx[$i];
            $user_name_lctx1 = $user_name_lctx[$i];
            $password_lctx1 = $password_lctx[$i];
            $pin_number_lctx1 = $pin_number_lctx[$i];
            $data = array(
                'company_id'   => $id,
            'url_lctx'         =>$url_lctx1,
            'user_name_lctx'    =>$user_name_lctx1,
            'password_lctx'         =>$password_lctx1,
            'create_by'     => $uid,
            'company_id'  =>$insert_id,
            'pin_number_lctx'         =>$pin_number_lctx1
            );
            $this->db->insert('url_lctx', $data);

        }
    }
       
        $user_name_sstx=$this->input->post('user_name_sstx',TRUE);
        $password_sstx=$this->input->post('password_sstx',TRUE);
        $pin_number_sstx=$this->input->post('pin_number_sstx',TRUE);
         if($url_sstx){
        for ($i = 0, $n = count($url_sstx); $i < $n; $i++) {
            $url_sstx1 = $url_sstx[$i];
            $user_name_sstx1 = $user_name_sstx[$i];
            $password_sstx1 = $password_sstx[$i];
            $pin_number_sstx1 = $pin_number_sstx[$i];
            $data = array(
                'company_id'   => $id,
            'url_sstx'         =>$url_sstx1,
            'user_name_sstx'    =>$user_name_sstx1,
            'password_sstx'         =>$password_sstx1,
            'create_by'     => $uid,
            'company_id'  =>$insert_id,
            'pin_number_sstx'         =>$pin_number_sstx1
            );
            $this->db->insert('url_sstx', $data);
// echo $this->db->last_query(); die();
        }
    }
     
    if($insert)
    {
       redirect('Company_setup/manage_company');
    }
}

public function company_insert(){
 if ($_FILES['image']['name']) {
        $config['upload_path']    = 'my-assets/image/logo/';
        $config['allowed_types']  = 'gif|jpg|png|jpeg|JPEG|GIF|JPG|PNG';
        $config['encrypt_name']   = TRUE;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('image')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_userdata(array('error_message' => $this->upload->display_errors()));
                redirect(base_url('Admin_dashboard/edit_profile'));
            } else {
            $data = $this->upload->data();
            $logo = $config['upload_path'].$data['file_name'];
            $config['image_library']  = 'gd2';
            $config['source_image']   = $logo;
            $config['create_thumb']   = false;
            $config['maintain_ratio'] = TRUE;
            $config['width']          = 200;
            $config['height']         = 200;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $logo =  $logo;
            }
        }
            // insert Company information///////////////
            $uid=$_SESSION['user_id'];
            $data = array(
                'company_name'    =>$this->input->post('company_name',true),
                'email' => $this->input->post('email',true),
                'c_city'      => $this->input->post('c_city',true),
                'c_state'      => $this->input->post('c_state',true),
                'address'      => $this->input->post('address',true),
                'mobile'   => $this->input->post('mobile',true),
                'website'  => $this->input->post('website',true),
                'Bank_Name'      => $this->input->post('Bank_Name',true),
                'Account_Number'      => $this->input->post('Account_Number',true),
                'Bank_Routing_Number'      => $this->input->post('Bank_Routing_Number',true),
                'Bank_Address'      => $this->input->post('Bank_Address',true),
                'Federal_Pin_Number'      => $this->input->post('Federal_Pin_Number',true),
                'user_name'      => $this->input->post('user_name',true),
                'password'      => $this->input->post('password',true),
                'pin_number'      => $this->input->post('pin_number',true),
                // 'user_name_st'      => $this->input->post('user_name_st',true),
                // 'password_st'      => $this->input->post('password_st',true),
                // 'pin_number_st'      => $this->input->post('pin_number_st',true),
                // 'user_name_lctx'      => $this->input->post('user_name_lctx',true),
                // 'password_lctx'      => $this->input->post('password_lctx',true),
                // 'pin_number_lctx'      => $this->input->post('pin_number_lctx',true),
                // 'user_name_sstx'      => $this->input->post('user_name_sstx',true),
                // 'password_sstx'      => $this->input->post('password_sstx',true),
                // 'pin_number_sstx'      => $this->input->post('pin_number_sstx',true),
                // 'url'      => $this->input->post('url',true),
                // 'url1'      => $this->input->post('url1',true),
                // 'url'         =>$url[$i],
                // 'url_st'         =>$url_st[$i],
                // 'url_lctx'         =>$url_lctx[$i],
                // 'url_sstx'         =>$url_sstx[$i],
                // 'user_name'         =>$user_name[$i],
                // 'password'         =>$password[$i],
                // 'pin_number'         =>$pin_number[$i],
                // 'user_name_st'         =>$user_name_st[$i],
                // 'password_st'         =>$password_st[$i],
                // 'pin_number_st'         =>$pin_number_st[$i],
                // 'user_name_lctx'         =>$user_name_lctx[$i],
                // 'password_lctx'         =>$password_lctx[$i],
                // 'pin_number_lctx'         =>$pin_number_lctx[$i],
                // 'user_name_sstx'         =>$user_name_sstx[$i],
                // 'password_sstx'         =>$password_sstx[$i],
                // 'pin_number_sstx'         =>$pin_number_sstx[$i],
                // 'st_tax_id'      => $this->input->post('statetx',true),
                // 'lc_tax_id'      => $this->input->post('localtx',true),
                // 'State_Sales_Tax_Number'      => $this->input->post('State_Sales_Tax_Number',true),
                'logo'       => $logo,
                'create_by'     => $uid,
                'status'     => 0
            );
             $this->db->insert('company_information',$data);
              $cid= $this->db->insert_id();
             $data1 = array(
                'create_by'     => $cid,
             );
             $this->db->insert('web_setting',$data1);
             $data2 = array(
                'create_by'     => $cid,
                 'uid'     => $cid
             );
             $this->db->insert('invoice_design',$data2);
             $num_str = sprintf("%03d", mt_rand(1, 999));
     $data = array(
               'unique_id'  =>   "AD".$cid.$num_str,
                'create_by'     => $uid,
                'user_id'     => $cid
            );
             $insert=$this->db->insert('users',$data);
             $data = array(
                'username'    =>$this->input->post('username',true),
                'password' => md5("gef" . $this->input->post('password',true)),
               'unique_id'  =>   "AD".$cid.$num_str,
                'user_type'      => 1+1,
                'u_type'      => 1+1,
                'security_code'   => $this->input->post('mobile',true),
                'email_id'  => $this->input->post('user_email',true),
                'status'       =>0,
                'cid'     => $cid,
                'user_id' =>$cid,
                'create_by'     => $uid,
            );
             $insert=$this->db->insert('user_login',$data);
    $data2 = array(
                'cid'     => $cid,
                'user_id' =>$cid,
                'create_by'     => $uid,
            );
            $insert=$this->db->insert('payslip_invoice_design',$data2);
             if($insert)
             {
                redirect('user/managecompany');
             }
    }













public function add_user()
{


    

       $content = $this->lusers->ad_user();
        $this->template->full_admin_html_view($content);
    }



#==============Chnage Status=============#

    public function chnage_company_status($value,$id)
    {
       
     echo $sql='update company_information set status ="'.$value.'" where company_id='.$id;
     $query=$this->db->query($sql);
       echo $sql='update user_login set status ="'.$value.'" where cid='.$id;
     $query=$this->db->query($sql);
     if($query)
    {
          redirect('user/managecompany');
    }


    }
    #===============User Search Item===========#

 public function company_edit($id){


  $sql='select * from company_information where company_id='.$id;
 $query=$this->db->query($sql);
$row=$query->result_array();  
  $sql='select * from user_login where cid='.$id;
 $query=$this->db->query($sql);
$row1=$query->result_array(); 
   
    $data=array(
        'company_info'=>$row,
        'user_info'=>$row1,
);
 
   $content = $this->lusers->company_edit_form($data);
        
 $this->template->full_admin_html_view($content);


 }
public function company_update()
{

}


public function insert_users()
{

$password=md5('gef'.$_POST['password']);


      $sql='select * from user_login
      where user_id='.$_SESSION['user_id'];
    $query=$this->db->query($sql);
    $row=$query->result_array();


     $cid=$row[0]['cid'];
     
     // print_r($_REQUEST);    
     
$sql='SELECT * FROM `users` ORDER BY `id` DESC';
$query=$this->db->query($sql);
    
    $row=$query->result_array();
  $finalid=$row[0]['id']+1;
 $id=$this->db->insert_id();
    $num_str = sprintf("%03d", mt_rand(1, 999));
    
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $combinedValue = isset($_POST['employee_name']) ? $_POST['employee_name'] : ''; // Check if set to avoid Undefined index error
    $splitValues = explode(' ', $combinedValue);
    if (count($splitValues) >= 3) {
        $id = $splitValues[0];
        $first_name = $splitValues[1];
        $last_name = $splitValues[2];
        $data = array(
            'last_name' => $last_name,   // Corrected to use $last_name
            'first_name' => $first_name, // Corrected to use $first_name
            'employee_id' => $id,        // Corrected to use $id
            'company_name' => $_SESSION['user_id'],
            'phone' => $_POST['phone'],
            'user_id' => $_SESSION['user_id'],
            'gender' => $_POST['gender'],
            'unique_id' => "UD" . $_SESSION['user_id'] . $num_str,
            'date_of_birth' => $_POST['Date'],
            'create_by' => $_SESSION['user_id']
        );
        $this->db->insert('users', $data);
    }
}
    
    
    
//      $sql='insert into users(

//   last_name,
//   first_name,
//   company_name,
//   phone,
//   user_id,
//   gender,
//   unique_id,
//   date_of_birth,
// create_by

//   )

//   values(

//   "'.$_POST['lname'].'",
//   "'.$_POST['fname'].'",            
//   "'.$_SESSION['user_id'].'",            
//   "'.$_POST['phone'].'",    
//   "'.$_SESSION['user_id'].'",   
//   "'.$_POST['gender'].'",    
//  "'."UD".$_SESSION['user_id'].$num_str.'",
//   "'.$_POST['Date'].'" , 
//   "'.$_SESSION['user_id'].'" 
//   )

//   ';
   
   // $this->db->query($sql);

  

$query='insert into user_login(
    
    username,
    password,
    unique_id,
    user_id,
    u_type,
    email_id,
    user_delete_id,
    cid
)

values(
    "'.$_POST['username'].'",
    "'.$password.'",
    "'."UD".$_SESSION['user_id'].$num_str.'",
    "'.$_SESSION['user_id'].'",
    "3",
    "'.$_POST['email'].'",
    "'.$id.'",
    "'.$_SESSION['user_id'].'"
    
) ';

  $this->db->query($query);

$this->session->set_userdata(array('message' => display('successfully_added')));
    redirect('User/manage_user');

}

 
    public function user_search_item() {
        $user_id = $this->input->post('user_id');
        $content = $this->lusers->user_search_item($user_id);
        $this->template->full_admin_html_view($content);
    }

    #================Manage User===============#

    public function manage_user() {
        $content = $this->lusers->user_list();
        $this->template->full_admin_html_view($content);
    }


    #==============Add  Company and admin user==============#


    #==============Insert User==============#

    public function insert_user() {
        $this->load->library('upload');
        if (($_FILES['logo']['name'])) {
            $files = $_FILES;
            $config = array();
            $config['upload_path'] = 'assets/dist/img/profile_picture/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG|GIF|JPG|PNG';
            $config['max_size'] = '1000000';
            $config['max_width'] = '1024000';
            $config['max_height'] = '768000';
            $config['overwrite'] = FALSE;
            $config['encrypt_name'] = true;

            $this->upload->initialize($config);
              if (!$this->upload->do_upload('logo')) {
                $data['error_message'] = $this->upload->display_errors();
                $this->session->set_userdata($sdata);
                redirect('user');
            } else {
                $view = $this->upload->data();
                $logo = base_url($config['upload_path'] . $view['file_name']);
            }
            
        }
        $data = array(
            'user_id'    => $this->generator(15),
            'first_name' => $this->input->post('first_name',true),
            'last_name'  => $this->input->post('last_name',true),
            'email'      => $this->input->post('email',true),
            'password'   => md5("gef" . $this->input->post('password',true)),
            'user_type'  => $this->input->post('user_type',true),
            'logo'       => (!empty($logo)?$logo:base_url().'assets/dist/img/profile_picture/profile.jpg'),
            'status'     => 1
        );

        $this->lusers->insert_user($data);
        $this->session->set_userdata(array('message' => display('successfully_added')));
        if (isset($_POST['add-user'])) {
            redirect('User/manage_user');
        } elseif (isset($_POST['add-user-another'])) {
            redirect(base_url('User/manage_user'));
        }
    }

    #===============User update form================#

    public function user_update_form($user_id) {
        $user_id = $user_id;
        $content = $this->lusers->user_edit_data($user_id);
        $this->template->full_admin_html_view($content);
    }

    #===============User update===================#

    public function user_update() {
      $this->load->library('upload');
        if (($_FILES['logo']['name'])) {
            $files = $_FILES;
            $config = array();
            $config['upload_path'] = 'assets/dist/img/profile_picture/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG|GIF|JPG|PNG';
            $config['max_size'] = '1000000';
            $config['max_width'] = '1024000';
            $config['max_height'] = '768000';
            $config['overwrite'] = FALSE;
            $config['encrypt_name'] = true;

            $this->upload->initialize($config);
              if (!$this->upload->do_upload('logo')) {
                $sdata['error_message'] = $this->upload->display_errors();
                $this->session->set_userdata($sdata);
                redirect('user');
            } else {
                $view = $this->upload->data();
                $logo = base_url($config['upload_path'] . $view['file_name']);
            }
        }
        $user_id = $this->input->post('user_id');
        $data['user_id'] = $user_id;
        $data['logo']   = $logo;
        $this->Userm->update_user($data);
        $this->session->set_userdata(array('message' => display('successfully_updated')));
        redirect(base_url('User/manage_user'));
    }


   
    #============User delete===========#

    public function user_delete($user_id) {
        $this->Userm->delete_user($user_id);
        $this->session->set_userdata(array('message' => display('successfully_delete')));
      redirect(base_url('User/manage_user'));
    }

    // Random Id generator
    public function generator($lenth) {
        $number = array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "N", "M", "O", "P", "Q", "R", "S", "U", "V", "T", "W", "X", "Y", "Z", "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z", "1", "2", "3", "4", "5", "6", "7", "8", "9", "0");

        for ($i = 0; $i < $lenth; $i++) {
            $rand_value = rand(0, 61);
            $rand_number = $number["$rand_value"];

            if (empty($con)) {
                $con = $rand_number;
            } else {
                $con = "$con" . "$rand_number";
            }
        }
        return $con;
    }

    #============User delete===========#

    public function addusers() { 

         $content = $this->lusers->addusers();
        $this->template->full_admin_html_view($content);
    }

     public function edit_user($id)
     {
        $content = $this->lusers->edit_user($id);
            $this->template->full_admin_html_view($content);
     }
     
     public function Invoicegenerator($length) {
        $number = array("1", "2", "3", "4", "5", "6", "7", "8", "9");
        $con = "INV-"; 

        for ($i = 0; $i < $length; $i++) {
            $rand_value = rand(0, 8);
            $rand_number = $number[$rand_value];

            $con .= $rand_number;
        }

        return $con;
    }

}
