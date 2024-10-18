<?php
error_reporting(1);
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cweb_setting extends CI_Controller {

    public $menu;

    function __construct() {
        parent::__construct();
        $this->load->library('auth');
        $this->load->library('lweb_setting');
        $this->load->library('session');
        $this->load->library('ciqrcode');
        $this->load->model('Web_settings');
        $this->auth->check_admin_auth();
        $this->template->current_menu = 'web_setting';

      
    }
   public function agree_view()
    {
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
         $postData = $this->input->post('new_payment_terms');
        $setting_detail = $CI->Web_settings->retrieve_setting_editdata();
        $searchall_data = $CI->Web_settings->searchalldata($postData);
        // echo "<pre>";
        // print_r($searchall_data); die();
        // echo "</pre>";
        $data = array(
            'title' => 'View',
            'setting_detail' => $setting_detail,
            'search_datas' => $searchall_data
        );
        $content = $this->load->view('web_setting/agree_view', $data, true);
        $this->template->full_admin_html_view($content);
    }
     public function new_funcion()
    {
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $postData = $this->input->post('new_payment_terms');
        $get_info_data = $CI->Web_settings->get_info_data($postData);
        echo json_encode($get_info_data);
    }
    public function fetchAttachments()
    {   
        $CI = & get_instance();
        $id = $this->input->post('inbox_id'); 
        $email_attach = $CI->Web_settings->Fetchemailattachment($id);
        // print_r($email_attach); die();
        // $files_attachment = explode(",", $email_attach[0]->files);
        echo json_encode($email_attach);
    }
    
     public function sendReplyEmail() {
        $CI = & get_instance();
        $csrfToken = $this->input->post($this->security->get_csrf_token_name());
        $email = $this->input->post('email');
        $replyContent = $this->input->post('replyContent');
        $mail_set = $CI->Web_settings->getemailConfig();
        $stm_user = $mail_set[0]->smtp_user;
        $stm_pass = $mail_set[0]->smtp_pass;
        $domain_name = $mail_set[0]->smtp_host;
        $protocol = $mail_set[0]->protocol;
        $EMAIL_ADDRESS = $mail_set[0]->smtp_user;
        $DOMAIN = substr(strrchr($EMAIL_ADDRESS, "@"), 1);
        if(strtolower($DOMAIN) === 'gmail.com'){
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
        }else{
            $config = array(
              'protocol' => $protocol,
              'smtp_host' => 'ssl://' . $domain_name,
              'smtp_user' => $stm_user,
              'smtp_pass' => $stm_pass,
              'smtp_port' => 465,
              'smtp_timeout' => 30,
              'charset' => 'utf-8',
              'newline' => '\r\n',
              'mailtype' => 'html',
              'validate' => true,
            );
        }
        $this->load->library('email');
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");
        $this->email->set_crlf("\r\n");
        $this->email->from($stm_user, 'Your Name');
        $this->email->to($email);
        $this->email->subject('Reply Email');
        $this->email->message($replyContent);
        if ($this->email->send()) {
            $response = array('success' => true, 'message' => 'Email sent successfully.');
            echo json_encode($response);
        } else {
            $response = array('success' => false, 'message' => 'Email sending failed.'. $this->email->print_debugger());
            echo json_encode($response);
        }
    }
   public function send_mail_cronjob() {
    $CI = &get_instance();
    $this->load->library('email');
    $get_emails = $CI->Web_settings->get_email_scheduled();
 
    $todaysql = $CI->Web_settings->getDataForTodayEmailSchedule();
         foreach ($get_emails as $email_data) {
        $subject = "Reminder: " . $email_data->title . " Update";
        $message = $email_data->title." Update for Invoice Number ".$email_data->invoice_no.": Expected Date : " . $email_data->start;
    if (!empty($todaysql) && isset($todaysql[0]->email) && isset($todaysql[0]->company_name)) {
        $to = $todaysql[0]->email;
        $name = $todaysql[0]->company_name;
        $mail_set = $CI->Web_settings->getemailConfig();
         $stm_user = $mail_set[0]->smtp_user;
        $stm_pass = $mail_set[0]->smtp_pass;
        $domain_name = $mail_set[0]->smtp_host;
        $protocol = $mail_set[0]->protocol;
        $EMAIL_ADDRESS = $mail_set[0]->smtp_user;
        $DOMAIN = substr(strrchr($EMAIL_ADDRESS, "@"), 1);
        if(strtolower($DOMAIN) === 'gmail.com'){
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
        }else{
            $config = array(
              'protocol' => $protocol,
              'smtp_host' => 'ssl://' . $domain_name,
              'smtp_user' => $stm_user,
              'smtp_pass' => $stm_pass,
              'smtp_port' => 465,
              'smtp_timeout' => 30,
              'charset' => 'utf-8',
              'newline' => '\r\n',
              'mailtype' => 'html',
              'validate' => true,
            );
        }

            $this->email->initialize($config);
            $this->email->from($to);
            $this->email->to($to);
            $this->email->subject($subject);
            $this->email->message($message);

            if ($this->email->send()) {
                echo "Email sent successfully";
            }  else {
                echo $this->email->print_debugger();
            }
    }
}

}

    public function download_email()
    {
        $CI = & get_instance();
        $email_con = $this->db->select('*')->from('email_config')->get()->result();
        $EMAIL_ADDRESS = $email_con[0]->smtp_user;
        $DOMAIN = substr(strrchr($EMAIL_ADDRESS, "@"), 1);
        if(strtolower($DOMAIN) === 'gmail.com'){
            foreach ($email_con as $key => $value) {
              $stm_user = $value->smtp_user;
              $stm_pass = $value->smtp_pass;
            }
            $hostname = '{imap.gmail.com:993/imap/ssl}INBOX';
            $username = $stm_user;
            $password = $stm_pass;
        }else{
            foreach ($email_con as $key => $value) {
              $stm_user = $value->smtp_user;
              $stm_pass = $value->smtp_pass;
              $domain_name = $value->smtp_host;
            }
            $hostname = '{'.$domain_name.':993/imap/ssl}INBOX';
            $username = $stm_user;
            $password = $stm_pass;
        }
        $inbox = imap_open($hostname, $username, $password) or die('Cannot connect to Gmail: ' . imap_last_error());
        // $emails = imap_search($inbox, 'SEEN');
        // print_r($emails); die();
        
        $todayDate = date('d-M-Y', strtotime('today'));
        $searchCriteria = 'SINCE "' . $todayDate . '"';
        $emails = imap_search($inbox, $searchCriteria);
        
        
        if ($emails) {
            foreach ($emails as $email_number) {
                $header = imap_headerinfo($inbox, $email_number);
                // $subject = preg_replace('/[^A-Za-z0-9\s]/', '', $header->subject);
                $subject = imap_utf8($header->subject);
                $from = $header->from[0]->mailbox . "@" . $header->from[0]->host;
                date_default_timezone_set('Asia/Kolkata');
                $date = date('d/m/Y H:i:A', strtotime($header->date));
                $message = imap_fetchbody($inbox, $email_number, 1);
                if (!$message) {
                  throw new Exception('Failed to fetch email message body.');
                }
                if (strpos($message, "Content-Type:") !== false) {
                  $message = preg_replace('/^[^\n]*\n?/', '', $message);
                  $message = preg_replace("/Content-Type:.*?\r?\n/m", "", $message);
                }
                if (strpos($message, "Content-Transfer-Encoding:") !== false) {
                 $message = preg_replace('/^[^\n]*\n?/', '', $message);
                  $message = preg_replace("/Content-Transfer-Encoding:.*?\r?\n/m", "", $message);
                }
                try {
                  $decodedMessage = quoted_printable_decode($message);
                } catch (Exception $e) {
                  throw new Exception("Failed to decode message body: " . $e->getMessage());
                }
                $finalMessageHTML = nl2br($decodedMessage);
                $structure = imap_fetchstructure($inbox, $email_number);
                if ($structure) {
                    $decodedContent = '';
                    foreach ($structure->parts as $partNum => $part) {
                        if ($part->subtype == 'HTML') {
                            $message = imap_fetchbody($inbox, $email_number, $partNum + 1);
                            $decodedContent = quoted_printable_decode($message);
                            break;
                        }
                       
                    }
            
                
                $emailData = array(
                    'subject' => $subject,
                    'to_address' => $from,
                    'email_date' => $date,
                    'identify' => $DOMAIN,
                    'created_by' => $this->session->userdata('user_id'),
                );
                if(strtolower($domain_from) === 'gmail.com'){
                        $emailData['message'] = $decodedContent;
                    }else{
                       $emailData['message'] = $finalMessageHTML;
                    }
                $this->db->insert('email_inbox', $emailData);
            }
                
            }
            imap_expunge($inbox);
        }
        imap_close($inbox);
        header('Content-Type: application/json');
        echo json_encode($emailData);
    }
     // Calendar Views 
    public function calender_view()
    {
        $CI = &get_instance();
        $CI->auth->check_admin_auth();

        $insertdata = $CI->Web_settings->insertDateforSchedule();
        $alldata = $CI->Web_settings->insertDateforScheduleStatus();

        $data = array(
            'title' => 'Calendar',
            'insertdata' => json_encode($insertdata),
            'allData' => $alldata
        );

        $content = $this->load->view('web_setting/calendar_views', $data, true);
        $this->template->full_admin_html_view($content);
    }


    // Add Reminder

    public function add_reminder()
    {
       $CI = & get_instance();
       $CI->auth->check_admin_auth();

       $title = $this->input->post('title');
       $description = $this->input->post('description');
       $start = $this->input->post('start');
       $end = $this->input->post('end');

       $data = array(
         'title' => $title,
         'description' => $description,
         'start' => $start,
         'end' => $end,
         'created_by' => $this->session->userdata('user_id')
       );

       $this->db->insert('schedule_list', $data);
       // echo $this->db->last_query(); die();
       redirect(base_url('Cweb_setting/calender_view'));
    }
    
   
    // sendAlerts Sale
    public function sendAlerts()
    {
       $CI = & get_instance();
       $CI->auth->check_admin_auth();
       $this->load->library('email');

       $SelectedDate = $this->input->post('select_date');
       $SelectedSource = $this->input->post('select_source');
       $selectedStatus = $this->input->post('status');
       $selectedCompany = $this->input->post('company');
     

       if ($SelectedDate === '1 Day Before') {
            $today = date('Y-m-d');
            // echo $today; 
            $yesterdaysql = $CI->Web_settings->getDataForyesterday($selectedStatus);
            
            if(!empty($yesterdaysql && $yesterdaysql[0]->etd) && (isset($yesterdaysql[0]->etd))){
                $dateString = $yesterdaysql[0]->etd;
                $dateTime = new DateTime($dateString);
                $previousDate = $dateTime->modify('-1 day')->format('Y-m-d');
                
                if(trim($SelectedSource) === 'CALENDER'){
                
                if ($selectedStatus === 'NewSaleETD') {
                    $start_date = $yesterdaysql[0]->etd;
                    $id = $yesterdaysql[0]->invoice_id;
                } else if ($selectedStatus === 'NewSaleETA') {
                    $start_date = $yesterdaysql[0]->eta;
                    $id = $yesterdaysql[0]->invoice_id;
                } else if ($selectedStatus === 'NewSalePAYMENTDUEDATE') {
                    $start_date = $yesterdaysql[0]->payment_due_date;
                    $id = $yesterdaysql[0]->invoice_id;
                } else if ($selectedStatus === 'OceanexporttrackingETD') {
                    $start_date = $yesterdaysql[0]->etd;
                    $id = $yesterdaysql[0]->ocean_export_tracking_id;
                }else if ($selectedStatus === 'OceanexporttrackingETA') {
                    $start_date = $yesterdaysql[0]->eta;
                    $id = $yesterdaysql[0]->ocean_export_tracking_id;
                }
                else if ($selectedStatus === 'TRUCKINGCONTAINERPICKUPDATE') {
                    $start_date = $yesterdaysql[0]->container_pickup_date;
                    $id = $yesterdaysql[0]->trucking_id;
                } else if ($selectedStatus === 'TRUCKINGDELIVERYDATE') {
                    $start_date = $yesterdaysql[0]->delivery_date;
                    $id = $yesterdaysql[0]->trucking_id;
                }

                if ($selectedStatus === 'NewSaleETD') {
                    $title = 'NEW SALE - ETD';
                } else if ($selectedStatus === 'NewSaleETA') {
                    $title = 'NEW SALE - ETA';
                } else if ($selectedStatus === 'NewSalePAYMENTDUEDATE') {
                    $title = 'NEW SALE - Payment Due date';
                } else if ($selectedStatus === 'OceanexporttrackingETD') {
                    $title = 'Ocean Export Tracking - ETD';
                }else if ($selectedStatus === 'OceanexporttrackingETA') {
                    $title = 'Ocean Export Tracking - ETA';
                }
                else if ($selectedStatus === 'TRUCKINGCONTAINERPICKUPDATE') {
                    $title = 'TRUCKING - Shipment company';
                } else if ($selectedStatus === 'TRUCKINGDELIVERYDATE') {
                    $title = 'TRUCKING - Delivery date';
                }

                for ($i = 0, $n = count($start_date); $i < $n; $i++) {
                date_default_timezone_set('Asia/Kolkata'); 
                $current_time = date("H:i");
                $start_datetime = $start_date . 'T' . $current_time;
                $data = array(
                    'name_id' => $id,
                   'title' => $title,
                   'description' => $yesterdaysql[$i]->remark,
                   'start' => $start_datetime,
                   'schedule_status' => 1,
                   'created_by' => $this->session->userdata('user_id')
                );

                $this->db->insert('schedule_list', $data);
                // echo $this->db->last_query(); die();
                redirect(base_url('Cweb_setting/calender_view'));
            }
        }

                if($SelectedSource === 'EMAIL'){
                // if($SelectedSource === 'EMAIL' && $today === $previousDate){

                      $todaysql = $CI->Web_settings->getDataForTodayEmailSchedule($selectedCompany);
                     
                      $to = $todaysql[0]->email;
                      $name = $todaysql[0]->company_name;

                      $mail_set = $this->db->select('*')->from('email_config ')->get()->result_array();
                        foreach ($mail_set as $key => $value) {
                            $stm_user = $value['smtp_user'];
                            $stm_pass = $value['smtp_pass'];
                        }

                        $config = array(
                          'protocol' => 'smtp',
                          'smtp_host' => 'ssl://smtp.gmail.com',
                          'smtp_user' => $stm_user,
                          'smtp_pass' => $stm_pass,
                          'smtp_port' => 465,
                          'smtp_timeout' => 30,
                          'charset' => 'utf-8',
                          'newline' => '\r\n',
                          'mailtype' => 'html',
                          
                        );

                        $this->email->initialize($config);
                        $this->email->set_newline("\r\n");
                        $this->email->set_crlf("\r\n");
                        $this->email->from($to, $name);
                        $this->email->to($to);
                        $this->email->subject($selectedStatus);

                        if ($selectedStatus === 'NewSaleETD') {
                            $this->email->message('Estimated Time of Arrival Date: ' . $yesterdaysql[0]->etd);
                        } else if ($selectedStatus === 'NewSaleETA') {
                            $this->email->message('Estimated Time of Departure Date: '. $yesterdaysql[0]->eta);
                        } else if ($selectedStatus === 'NewSalePAYMENTDUEDATE') {
                            $this->email->message('Payment Due Date: ' . $yesterdaysql[0]->payment_due_date);
                        } else if ($selectedStatus === 'TRUCKINGCONTAINERPICKUPDATE') {
                            $this->email->message('Container Pickup Date: ' . $yesterdaysql[0]->container_pickup_date);
                        } else if ($selectedStatus === 'TRUCKINGDELIVERYDATE') {
                            $this->email->message('Delivery Date: ' . $yesterdaysql[0]->delivery_date);
                        }

                        if ($this->email->send()) {
                            echo "<script>alert('Email Send successfully');</script>";
                            redirect(base_url('Cweb_setting'));
                        } else {
                            echo "<script>alert('Email Send Failed !!!!!');</script>";
                        }


            }
            

        }


        } elseif ($SelectedDate === '3 Days Before') {
            $today = date('Y-m-d');

            $threeDaysAgosql = $CI->Web_settings->getDataForThreedaysAgo($selectedStatus);
            $dateString = $threeDaysAgosql[0]->etd;
            $dateTime = new DateTime($dateString);
            $threeDaysAgo = $dateTime->modify('-3 day')->format('Y-m-d');

            if($SelectedSource === 'CALENDER'){

                if ($selectedStatus === 'NewSaleETD') {
                    $start_date = $threeDaysAgosql[0]->etd;
                    $id = $threeDaysAgosql[0]->invoice_id;
                } else if ($selectedStatus === 'NewSaleETA') {
                    $start_date = $threeDaysAgosql[0]->eta;
                    $id = $threeDaysAgosql[0]->invoice_id;
                } else if ($selectedStatus === 'NewSalePAYMENTDUEDATE') {
                    $start_date = $threeDaysAgosql[0]->payment_due_date;
                    $id = $threeDaysAgosql[0]->invoice_id;
                } else if ($selectedStatus === 'OceanexporttrackingETD') {
                    $start_date = $threeDaysAgosql[0]->etd;
                    $id = $threeDaysAgosql[0]->ocean_export_tracking_id;
                }else if ($selectedStatus === 'OceanexporttrackingETA') {
                    $start_date = $threeDaysAgosql[0]->eta;
                    $id = $threeDaysAgosql[0]->ocean_export_tracking_id;
                }
                else if ($selectedStatus === 'TRUCKINGCONTAINERPICKUPDATE') {
                    $start_date = $threeDaysAgosql[0]->container_pickup_date;
                    $id = $threeDaysAgosql[0]->trucking_id;
                } else if ($selectedStatus === 'TRUCKINGDELIVERYDATE') {
                    $start_date = $threeDaysAgosql[0]->delivery_date;
                    $id = $threeDaysAgosql[0]->trucking_id;
                }


                if ($selectedStatus === 'NewSaleETD') {
                    $title = 'NEW SALE - ETD';
                } else if ($selectedStatus === 'NewSaleETA') {
                    $title = 'NEW SALE - ETA';
                } else if ($selectedStatus === 'NewSalePAYMENTDUEDATE') {
                    $title = 'NEW SALE - Payment Due date';
                } else if ($selectedStatus === 'OceanexporttrackingETD') {
                    $title = 'Ocean Export Tracking - ETD';
                }else if ($selectedStatus === 'OceanexporttrackingETA') {
                    $title = 'Ocean Export Tracking - ETA';
                }
                else if ($selectedStatus === 'TRUCKINGCONTAINERPICKUPDATE') {
                    $title = 'TRUCKING - Shipment company';
                } else if ($selectedStatus === 'TRUCKINGDELIVERYDATE') {
                    $title = 'TRUCKING - Delivery date';
                }

                for ($i = 0, $n = count($start_date); $i < $n; $i++) {
                date_default_timezone_set('Asia/Kolkata'); 
                $current_time = date("H:i");
                $start_datetime = $start_date . 'T' . $current_time;
                $data = array(
                    'name_id' => $id,
                   'title' => $title,
                   'description' => $threeDaysAgosql[$i]->remark,
                   'start' => $start_datetime,
                   'schedule_status' => 1,
                   'created_by' => $this->session->userdata('user_id')
                );

                $this->db->insert('schedule_list', $data);
                redirect(base_url('Cweb_setting/calender_view'));
            }
        }


            if($SelectedSource === 'EMAIL'){
                // if($SelectedSource === 'EMAIL' && $today === $previousDate){

                      $todaysql = $CI->Web_settings->getDataForTodayEmailSchedule($selectedCompany);
                     
                      $to = $todaysql[0]->email;
                      $name = $todaysql[0]->company_name;

                      $mail_set = $this->db->select('*')->from('email_config ')->get()->result_array();
                        foreach ($mail_set as $key => $value) {
                            $stm_user = $value['smtp_user'];
                            $stm_pass = $value['smtp_pass'];
                        }

                        $config = array(
                          'protocol' => 'smtp',
                          'smtp_host' => 'ssl://smtp.gmail.com',
                          'smtp_user' => $stm_user,
                          'smtp_pass' => $stm_pass,
                          'smtp_port' => 465,
                          'smtp_timeout' => 30,
                          'charset' => 'utf-8',
                          'newline' => '\r\n',
                          'mailtype' => 'html',
                          
                        );

                        $this->email->initialize($config);
                        $this->email->set_newline("\r\n");
                        $this->email->set_crlf("\r\n");
                        $this->email->from($to, $name);
                        $this->email->to($to);
                        $this->email->subject($selectedStatus);

                        if ($selectedStatus === 'NewSaleETD') {
                            $this->email->message('Estimated Time of Arrival Date: ' . $threeDaysAgosql[0]->etd);
                        } else if ($selectedStatus === 'NewSaleETA') {
                            $this->email->message('Estimated Time of Departure Date: '. $threeDaysAgosql[0]->eta);
                        } else if ($selectedStatus === 'NewSalePAYMENTDUEDATE') {
                            $this->email->message('Payment Due Date: ' . $threeDaysAgosql[0]->payment_due_date);
                        } else if ($selectedStatus === 'TRUCKINGCONTAINERPICKUPDATE') {
                            $this->email->message('Container Pickup Date: ' . $threeDaysAgosql[0]->container_pickup_date);
                        } else if ($selectedStatus === 'TRUCKINGDELIVERYDATE') {
                            $this->email->message('Delivery Date: ' . $threeDaysAgosql[0]->delivery_date);
                        }

                        if ($this->email->send()) {
                            echo "<script>alert('Email Send successfully');</script>";
                            redirect(base_url('Cweb_setting'));
                        } else {
                            echo "<script>alert('Email Send Failed !!!!!');</script>";
                        }


            }



        } elseif ($SelectedDate === '1 Week Before') {
            $today = date('Y-m-d');

            $sevenDaysAgosql = $CI->Web_settings->getDataForSevendaysAgo($selectedStatus);

            $dateString = $sevenDaysAgosql[0]->etd;
            echo $dateString;
            $dateTime = new DateTime($dateString);
            $sevenDaysAgo = $dateTime->modify('-7 day')->format('Y-m-d');

            if($SelectedSource === 'CALENDER'){

                if ($selectedStatus === 'NewSaleETD') {
                    $start_date = $sevenDaysAgosql[0]->etd;
                    $id = $sevenDaysAgosql[0]->invoice_id;
                } else if ($selectedStatus === 'NewSaleETA') {
                    $start_date = $sevenDaysAgosql[0]->eta;
                    $id = $sevenDaysAgosql[0]->invoice_id;
                } else if ($selectedStatus === 'NewSalePAYMENTDUEDATE') {
                    $start_date = $sevenDaysAgosql[0]->payment_due_date;
                    $id = $sevenDaysAgosql[0]->invoice_id;
                } else if ($selectedStatus === 'OceanexporttrackingETD') {
                    $start_date = $sevenDaysAgosql[0]->etd;
                    $id = $sevenDaysAgosql[0]->ocean_export_tracking_id;
                }else if ($selectedStatus === 'OceanexporttrackingETA') {
                    $start_date = $sevenDaysAgosql[0]->eta;
                    $id = $sevenDaysAgosql[0]->ocean_export_tracking_id;
                }
                else if ($selectedStatus === 'TRUCKINGCONTAINERPICKUPDATE') {
                    $start_date = $sevenDaysAgosql[0]->container_pickup_date;
                    $id = $sevenDaysAgosql[0]->trucking_id;
                } else if ($selectedStatus === 'TRUCKINGDELIVERYDATE') {
                    $start_date = $sevenDaysAgosql[0]->delivery_date;
                    $id = $sevenDaysAgosql[0]->trucking_id;
                }

                if ($selectedStatus === 'NewSaleETD') {
                    $title = 'NEW SALE - ETD';
                } else if ($selectedStatus === 'NewSaleETA') {
                    $title = 'NEW SALE - ETA';
                } else if ($selectedStatus === 'NewSalePAYMENTDUEDATE') {
                    $title = 'NEW SALE - Payment Due date';
                } else if ($selectedStatus === 'OceanexporttrackingETD') {
                    $title = 'Ocean Export Tracking - ETD';
                }else if ($selectedStatus === 'OceanexporttrackingETA') {
                    $title = 'Ocean Export Tracking - ETA';
                }
                else if ($selectedStatus === 'TRUCKINGCONTAINERPICKUPDATE') {
                    $title = 'TRUCKING - Shipment company';
                } else if ($selectedStatus === 'TRUCKINGDELIVERYDATE') {
                    $title = 'TRUCKING - Delivery date';
                }

                for ($i = 0, $n = count($start_date); $i < $n; $i++) {
                date_default_timezone_set('Asia/Kolkata'); 
                $current_time = date("H:i");
                $start_datetime = $start_date . 'T' . $current_time;
                $data = array(
                   'name_id' => $id,
                   'title' => $title,
                   'description' => $sevenDaysAgosql[$i]->remark,
                   'start' => $start_datetime,
                   'schedule_status' => 1,
                   'created_by' => $this->session->userdata('user_id')
                );

                $this->db->insert('schedule_list', $data);
                redirect(base_url('Cweb_setting/calender_view'));
            }
        }


            if($SelectedSource === 'EMAIL'){
                // if($SelectedSource === 'EMAIL' && $today === $previousDate){

                      $todaysql = $CI->Web_settings->getDataForTodayEmailSchedule($selectedCompany);
                     
                      $to = $todaysql[0]->email;
                      $name = $todaysql[0]->company_name;

                      $mail_set = $this->db->select('*')->from('email_config ')->get()->result_array();
                        foreach ($mail_set as $key => $value) {
                            $stm_user = $value['smtp_user'];
                            $stm_pass = $value['smtp_pass'];
                        }

                        $config = array(
                          'protocol' => 'smtp',
                          'smtp_host' => 'ssl://smtp.gmail.com',
                          'smtp_user' => $stm_user,
                          'smtp_pass' => $stm_pass,
                          'smtp_port' => 465,
                          'smtp_timeout' => 30,
                          'charset' => 'utf-8',
                          'newline' => '\r\n',
                          'mailtype' => 'html',
                          
                        );

                        $this->email->initialize($config);
                        $this->email->set_newline("\r\n");
                        $this->email->set_crlf("\r\n");
                        $this->email->from($to, $name);
                        $this->email->to($to);
                        $this->email->subject($selectedStatus);

                        if ($selectedStatus === 'NewSaleETD') {
                            $this->email->message('Estimated Time of Arrival Date: ' . $sevenDaysAgosql[0]->etd);
                        } else if ($selectedStatus === 'NewSaleETA') {
                            $this->email->message('Estimated Time of Departure Date: '. $sevenDaysAgosql[0]->eta);
                        } else if ($selectedStatus === 'NewSalePAYMENTDUEDATE') {
                            $this->email->message('Payment Due Date: ' . $sevenDaysAgosql[0]->payment_due_date);
                        } else if ($selectedStatus === 'TRUCKINGCONTAINERPICKUPDATE') {
                            $this->email->message('Container Pickup Date: ' . $sevenDaysAgosql[0]->container_pickup_date);
                        } else if ($selectedStatus === 'TRUCKINGDELIVERYDATE') {
                            $this->email->message('Delivery Date: ' . $sevenDaysAgosql[0]->delivery_date);
                        }

                        if ($this->email->send()) {
                            echo "<script>alert('Email Send successfully');</script>";
                            redirect(base_url('Cweb_setting'));
                        } else {
                            echo "<script>alert('Email Send Failed !!!!!');</script>";
                        }


            }
            
            
            

        } elseif ($SelectedDate === 'On Date') {

            

            $today = date('Y-m-d');

            $todaysql = $CI->Web_settings->getDataForToday($selectedStatus);
            

            if($SelectedSource === 'CALENDER'){

                if ($selectedStatus === 'NewSaleETD') {
                    $start_date = $todaysql[0]->etd;
                    $id = $todaysql[0]->invoice_id;
                } else if ($selectedStatus === 'NewSaleETA') {
                    $start_date = $todaysql[0]->eta;
                    $id = $todaysql[0]->invoice_id;
                } else if ($selectedStatus === 'NewSalePAYMENTDUEDATE') {
                    $start_date = $todaysql[0]->payment_due_date;
                    $id = $todaysql[0]->invoice_id;
                } else if ($selectedStatus === 'OceanexporttrackingETD') {
                    $start_date = $todaysql[0]->etd;
                    $id = $todaysql[0]->ocean_export_tracking_id;
                }else if ($selectedStatus === 'OceanexporttrackingETA') {
                    $start_date = $todaysql[0]->eta;
                    $id = $todaysql[0]->ocean_export_tracking_id;
                }
                else if ($selectedStatus === 'TRUCKINGCONTAINERPICKUPDATE') {
                    $start_date = $todaysql[0]->container_pickup_date;
                    $id = $todaysql[0]->trucking_id;
                } else if ($selectedStatus === 'TRUCKINGDELIVERYDATE') {
                    $start_date = $todaysql[0]->delivery_date;
                    $id = $todaysql[0]->trucking_id;
                }

                if ($selectedStatus === 'NewSaleETD') {
                    $title = 'NEW SALE - ETD';
                } else if ($selectedStatus === 'NewSaleETA') {
                    $title = 'NEW SALE - ETA';
                } else if ($selectedStatus === 'NewSalePAYMENTDUEDATE') {
                    $title = 'NEW SALE - Payment Due date';
                } else if ($selectedStatus === 'OceanexporttrackingETD') {
                    $title = 'Ocean Export Tracking - ETD';
                }else if ($selectedStatus === 'OceanexporttrackingETA') {
                    $title = 'Ocean Export Tracking - ETA';
                }
                else if ($selectedStatus === 'TRUCKINGCONTAINERPICKUPDATE') {
                    $title = 'TRUCKING - Shipment company';
                } else if ($selectedStatus === 'TRUCKINGDELIVERYDATE') {
                    $title = 'TRUCKING - Delivery date';
                }

                for ($i = 0, $n = count($start_date); $i < $n; $i++) {
                date_default_timezone_set('Asia/Kolkata'); 
                $current_time = date("H:i");
                $data = array(
                   'name_id' => $id,
                   'title' => $title,
                   'description' => $todaysql[$i]->remark,
                   'start' => $start_date . 'T' . $current_time,
                   'schedule_status' => 1,
                   'created_by' => $this->session->userdata('user_id')
                );

                $this->db->insert('schedule_list', $data);
                redirect(base_url('Cweb_setting/calender_view'));
            }
        }

            // print_r($todaysql); die();

                $dateString = $todaysql[0]->eta;
                $dateTime = new DateTime($dateString);
                $todayDate = $dateTime->format('Y-m-d');
                $today = date('Y-m-d');

                if($SelectedSource === 'EMAIL'){

                    $todaysqlemail = $CI->Web_settings->getDataForTodayEmailSchedule($selectedCompany);
                      $to = $todaysqlemail[0]->email;
                      $name = $todaysqlemail[0]->company_name;

                      $mail_set = $this->db->select('*')->from('email_config ')->get()->result_array();
                        foreach ($mail_set as $key => $value) {
                            $stm_user = $value['smtp_user'];
                            $stm_pass = $value['smtp_pass'];
                        }

                        $config = array(
                          'protocol' => 'smtp',
                          'smtp_host' => 'ssl://smtp.gmail.com',
                          'smtp_user' => $stm_user,
                          'smtp_pass' => $stm_pass,
                          'smtp_port' => 465,
                          'smtp_timeout' => 30,
                          'charset' => 'utf-8',
                          'newline' => '\r\n',
                          'mailtype' => 'html',
                          
                        );

                        $this->email->initialize($config);
                        $this->email->set_newline("\r\n");
                        $this->email->set_crlf("\r\n");
                        $this->email->from($to, $name);
                        $this->email->to($to);
                        $this->email->subject($selectedStatus);

                        if ($selectedStatus === 'NewSaleETD') {
                            $this->email->message('Estimated Time of Arrival Date: ' . $todaysql[0]->etd);
                        } else if ($selectedStatus === 'NewSaleETA') {
                            $this->email->message('Estimated Time of Departure Date: '.  $todaysql[0]->eta);
                        } else if ($selectedStatus === 'NewSalePAYMENTDUEDATE') {
                            $this->email->message('Payment Due Date: ' . $todaysql[0]->payment_due_date);
                        } else if ($selectedStatus === 'TRUCKINGCONTAINERPICKUPDATE') {
                            $this->email->message('Container Pickup Date: ' . $todaysql[0]->container_pickup_date);
                        } else if ($selectedStatus === 'TRUCKINGDELIVERYDATE') {
                            $this->email->message('Delivery Date: ' . $todaysql[0]->delivery_date);
                        }

                        if ($this->email->send()) {
                            echo "<script>alert('Email Send successfully');</script>";
                            redirect(base_url('Cweb_setting'));
                        } else {
                            echo "<script>alert('Email Send Failed !!!!!');</script>";
                        }
            }
            
        
           
        }

        $data = array(
            'today' => $todaysql,
            'yesterday' => $yesterdaysql,
            'threeDay' => $threeDaysAgosql,
            'sevenDay' => $sevenDaysAgosql,
            'status' => $selectedStatus,
            'selecteddate' => $SelectedDate
        );

        // print_r($data); die();

        $content = $this->load->view('web_setting/view_alerts', $data, true);
        $this->template->full_admin_html_view($content);

    }

    // send Alerts expense
    public function sendAlertsexpense()
    {
       $CI = & get_instance();
       $CI->auth->check_admin_auth();
       $this->load->library('email');


        $SelectedDate = $this->input->post('select_date');
        $SelectedSource = $this->input->post('select_source');
        $selectedStatus = $this->input->post('status');
        $selectedCompany = $this->input->post('company');

        if ($SelectedDate === '1 Day Before') {
            $today = date('Y-m-d');
            $yesterdaysql = $CI->Web_settings->getDataForExpenseyesterday($selectedStatus);
            
            $dateString = $yesterdaysql[0]->eta;
            $dateTime = new DateTime($dateString);
            $yesterdayAgo = $dateTime->modify('-1 day')->format('Y-m-d');

            if($SelectedSource === 'CALENDER'){

                if ($selectedStatus === 'PaymentDuedate') {
                    $start_date = $yesterdaysql[0]->payment_due_date;
                    $id = $yesterdaysql[0]->purchase_id;
                } else if ($selectedStatus === 'Estshipmentdate') {
                    $start_date = $yesterdaysql[0]->etd;
                    $id = $yesterdaysql[0]->purchase_id;
                } else if ($selectedStatus === 'oceanimportETA') {
                    $start_date = $yesterdaysql[0]->eta;
                    $id = $yesterdaysql[0]->ocean_import_tracking_id    ;
                } else if ($selectedStatus === 'oceanimportETD') {
                    $start_date = $yesterdaysql[0]->etd;
                    $id = $yesterdaysql[0]->ocean_import_tracking_id    ;
                }else if ($selectedStatus === 'ContainerGoodspickupdate') {
                    $start_date = $yesterdaysql[0]->container_pickup_date;
                    $id = $yesterdaysql[0]->trucking_id;
                }else if ($selectedStatus === 'DELIVERYDATE') {
                    $start_date = $yesterdaysql[0]->delivery_date;
                    $id = $yesterdaysql[0]->trucking_id;
                } 

                if ($selectedStatus === 'PaymentDuedate') {
                    $title = 'NEW EXPENSE - Payment Due date';
                } else if ($selectedStatus === 'Estshipmentdate') {
                    $title = 'Purchase Order - ETD';
                } else if ($selectedStatus === 'oceanimportETA') {
                    $title = 'Ocean Import Tracking - ETA';
                } else if ($selectedStatus === 'oceanimportETD') {
                    $title = 'Ocean Import Tracking - ETD';
                }else if ($selectedStatus === 'ContainerGoodspickupdate') {
                    $title = 'TRUCKING - Container / Goods pickup date';
                }else if ($selectedStatus === 'DELIVERYDATE') {
                    $title = 'TRUCKING - Delivery date';
                } 

                for ($i = 0, $n = count($start_date); $i < $n; $i++) {
                date_default_timezone_set('Asia/Kolkata'); 
                $current_time = date("H:i");
                $data = array(
                    'name_id' => $id,
                   'title' => $title,
                   'description' => $yesterdaysql[$i]->remarks,
                   'start' => $start_date . 'T' . $current_time,
                   'schedule_status' => 1,
                   'created_by' => $this->session->userdata('user_id')
                );

                $this->db->insert('schedule_list', $data);
                redirect(base_url('Cweb_setting/calender_view'));
            }
        }

            if($SelectedSource === 'EMAIL'){

            $todaysqlemail = $CI->Web_settings->getDataForTodayEmailSchedule($selectedCompany);
            $to = $todaysqlemail[0]->email;
            $name = $todaysqlemail[0]->company_name;

                      $mail_set = $this->db->select('*')->from('email_config ')->get()->result_array();
                        foreach ($mail_set as $key => $value) {
                            $stm_user = $value['smtp_user'];
                            $stm_pass = $value['smtp_pass'];
                        }

                        $config = array(
                          'protocol' => 'smtp',
                          'smtp_host' => 'ssl://smtp.gmail.com',
                          'smtp_user' => $stm_user,
                          'smtp_pass' => $stm_pass,
                          'smtp_port' => 465,
                          'smtp_timeout' => 30,
                          'charset' => 'utf-8',
                          'newline' => '\r\n',
                          'mailtype' => 'html',
                          
                        );

                        $this->email->initialize($config);
                        $this->email->set_newline("\r\n");
                        $this->email->set_crlf("\r\n");
                        $this->email->from($to, $name);
                        $this->email->to($to);
                        $this->email->subject($selectedStatus);

                        if ($selectedStatus === 'PaymentDuedate') {
                            $this->email->message('Payment Due Date: ' . $yesterdaysql[0]->payment_due_date);
                        } else if ($selectedStatus === 'Estshipmentdate') {
                            $this->email->message('Estimated Time of Departure Date: '. $yesterdaysql[0]->etd);
                        } else if ($selectedStatus === 'oceanimportETA') {
                            $this->email->message('Estimated Time of Arrival Date: ' . $yesterdaysql[0]->eta);
                        } else if ($selectedStatus === 'oceanimportETD') {
                            $this->email->message('Estimated Time of Departure Date: ' . $yesterdaysql[0]->etd);
                        } else if ($selectedStatus === 'ContainerGoodspickupdate') {
                            $this->email->message('Container Pickup Date: ' . $yesterdaysql[0]->container_pickup_date);
                        }else if ($selectedStatus === 'DELIVERYDATE') {
                            $this->email->message('Delivery Date: ' . $yesterdaysql[0]->delivery_date);
                        }

                        if ($this->email->send()) {
                            echo "<script>alert('Email Send successfully');</script>";
                            redirect(base_url('Cweb_setting'));
                        } else {
                            echo "<script>alert('Email Send Failed !!!!!');</script>";
                        }
            }


           

        } elseif ($SelectedDate === '3 Days Before') {
            $today = date('Y-m-d');
        
            $threeDaysAgosql = $CI->Web_settings->getDataForExpenseThreedaysAgo($selectedStatus);
            $dateString = $threeDaysAgosql[0]->eta;
            $dateTime = new DateTime($dateString);
            $threeDaysAgo = $dateTime->modify('-3 day')->format('Y-m-d');

            if($SelectedSource === 'CALENDER'){

                if ($selectedStatus === 'PaymentDuedate') {
                    $start_date = $threeDaysAgosql[0]->payment_due_date;
                    $id = $threeDaysAgosql[0]->purchase_id;
                } else if ($selectedStatus === 'Estshipmentdate') {
                    $start_date = $threeDaysAgosql[0]->etd;
                    $id = $threeDaysAgosql[0]->purchase_id;
                } else if ($selectedStatus === 'oceanimportETA') {
                    $start_date = $threeDaysAgosql[0]->eta;
                    $id = $threeDaysAgosql[0]->ocean_import_tracking_id    ;
                } else if ($selectedStatus === 'oceanimportETD') {
                    $start_date = $threeDaysAgosql[0]->etd;
                    $id = $threeDaysAgosql[0]->ocean_import_tracking_id    ;
                }else if ($selectedStatus === 'ContainerGoodspickupdate') {
                    $start_date = $threeDaysAgosql[0]->container_pickup_date;
                    $id = $threeDaysAgosql[0]->trucking_id;
                }else if ($selectedStatus === 'DELIVERYDATE') {
                    $start_date = $threeDaysAgosql[0]->delivery_date;
                    $id = $threeDaysAgosql[0]->trucking_id;
                }

                if ($selectedStatus === 'PaymentDuedate') {
                    $title = 'NEW EXPENSE - Payment Due date';
                } else if ($selectedStatus === 'Estshipmentdate') {
                    $title = 'Purchase Order - ETD';
                } else if ($selectedStatus === 'oceanimportETA') {
                    $title = 'Ocean Import Tracking - ETA';
                } else if ($selectedStatus === 'oceanimportETD') {
                    $title = 'Ocean Import Tracking - ETD';
                }else if ($selectedStatus === 'ContainerGoodspickupdate') {
                    $title = 'TRUCKING - Container / Goods pickup date';
                }else if ($selectedStatus === 'DELIVERYDATE') {
                    $title = 'TRUCKING - Delivery date';
                } 

                for ($i = 0, $n = count($start_date); $i < $n; $i++) {
                date_default_timezone_set('Asia/Kolkata'); 
                $current_time = date("H:i");
                $data = array(
                    'name_id' => $id,
                   'title' => $title,
                   'description' => $threeDaysAgosql[$i]->remarks,
                   'start' => $start_date . 'T' . $current_time,
                   'schedule_status' => 1,
                   'created_by' => $this->session->userdata('user_id')
                );

                $this->db->insert('schedule_list', $data);
                redirect(base_url('Cweb_setting/calender_view'));
            }
        }

            if($SelectedSource === 'EMAIL'){

            $todaysqlemail = $CI->Web_settings->getDataForTodayEmailSchedule($selectedCompany);
            $to = $todaysqlemail[0]->email;
            $name = $todaysqlemail[0]->company_name;

                      $mail_set = $this->db->select('*')->from('email_config ')->get()->result_array();
                        foreach ($mail_set as $key => $value) {
                            $stm_user = $value['smtp_user'];
                            $stm_pass = $value['smtp_pass'];
                        }

                        $config = array(
                          'protocol' => 'smtp',
                          'smtp_host' => 'ssl://smtp.gmail.com',
                          'smtp_user' => $stm_user,
                          'smtp_pass' => $stm_pass,
                          'smtp_port' => 465,
                          'smtp_timeout' => 30,
                          'charset' => 'utf-8',
                          'newline' => '\r\n',
                          'mailtype' => 'html',
                          
                        );

                        $this->email->initialize($config);
                        $this->email->set_newline("\r\n");
                        $this->email->set_crlf("\r\n");
                        $this->email->from($to, $name);
                        $this->email->to($to);
                        $this->email->subject($selectedStatus);

                        if ($selectedStatus === 'PaymentDuedate') {
                            $this->email->message('Payment Due Date: ' . $threeDaysAgosql[0]->payment_due_date);
                        } else if ($selectedStatus === 'Estshipmentdate') {
                            $this->email->message('Estimated Time of Departure Date: '. $threeDaysAgosql[0]->etd);
                        } else if ($selectedStatus === 'oceanimportETA') {
                            $this->email->message('Estimated Time of Arrival Date: ' . $threeDaysAgosql[0]->eta);
                        } else if ($selectedStatus === 'oceanimportETD') {
                            $this->email->message('Estimated Time of Departure Date: ' . $threeDaysAgosql[0]->etd);
                        } else if ($selectedStatus === 'ContainerGoodspickupdate') {
                            $this->email->message('Container Pickup Date: ' . $threeDaysAgosql[0]->container_pickup_date);
                        }else if ($selectedStatus === 'DELIVERYDATE') {
                            $this->email->message('Delivery Date: ' . $threeDaysAgosql[0]->delivery_date);
                        }

                        if ($this->email->send()) {
                            echo "<script>alert('Email Send successfully');</script>";
                            redirect(base_url('Cweb_setting'));
                        } else {
                            echo "<script>alert('Email Send Failed !!!!!');</script>";
                        }
            }

           

        } elseif ($SelectedDate === '1 Week Before') {
            $today = date('Y-m-d');
            
            $sevenDaysAgosql = $CI->Web_settings->getDataForExpenseSevendaysAgo($selectedStatus);

            $dateString = $sevenDaysAgosql[0]->eta;
            $dateTime = new DateTime($dateString);
            $sevenDaysAgo = $dateTime->modify('-7 day')->format('Y-m-d');

            if($SelectedSource === 'CALENDER'){

                if ($selectedStatus === 'PaymentDuedate') {
                    $start_date = $sevenDaysAgosql[0]->payment_due_date;
                    $id = $sevenDaysAgosql[0]->purchase_id;
                } else if ($selectedStatus === 'Estshipmentdate') {
                    $start_date = $sevenDaysAgosql[0]->etd;
                    $id = $sevenDaysAgosql[0]->purchase_id;
                } else if ($selectedStatus === 'oceanimportETA') {
                    $start_date = $sevenDaysAgosql[0]->eta;
                    $id = $sevenDaysAgosql[0]->ocean_import_tracking_id    ;
                } else if ($selectedStatus === 'oceanimportETD') {
                    $start_date = $sevenDaysAgosql[0]->etd;
                    $id = $sevenDaysAgosql[0]->ocean_import_tracking_id    ;
                }else if ($selectedStatus === 'ContainerGoodspickupdate') {
                    $start_date = $sevenDaysAgosql[0]->container_pickup_date;
                    $id = $sevenDaysAgosql[0]->trucking_id;
                }else if ($selectedStatus === 'DELIVERYDATE') {
                    $start_date = $sevenDaysAgosql[0]->delivery_date;
                    $id = $sevenDaysAgosql[0]->trucking_id;
                } 

                if ($selectedStatus === 'PaymentDuedate') {
                    $title = 'NEW EXPENSE - Payment Due date';
                } else if ($selectedStatus === 'Estshipmentdate') {
                    $title = 'Purchase Order - ETD';
                } else if ($selectedStatus === 'oceanimportETA') {
                    $title = 'Ocean Import Tracking - ETA';
                } else if ($selectedStatus === 'oceanimportETD') {
                    $title = 'Ocean Import Tracking - ETD';
                }else if ($selectedStatus === 'ContainerGoodspickupdate') {
                    $title = 'TRUCKING - Container / Goods pickup date';
                }else if ($selectedStatus === 'DELIVERYDATE') {
                    $title = 'TRUCKING - Delivery date';
                } 

                for ($i = 0, $n = count($start_date); $i < $n; $i++) {
                date_default_timezone_set('Asia/Kolkata'); 
                $current_time = date("H:i");
                $data = array(
                    'name_id' => $id,
                   'title' => $title,
                   'description' => $sevenDaysAgosql[$i]->remarks,
                   'start' => $start_date . 'T' . $current_time,
                   'schedule_status' => 1,
                   'created_by' => $this->session->userdata('user_id')
                );

                $this->db->insert('schedule_list', $data);
                redirect(base_url('Cweb_setting/calender_view'));
            }
        }


            if($SelectedSource === 'EMAIL'){

            $todaysqlemail = $CI->Web_settings->getDataForTodayEmailSchedule($selectedCompany);
            $to = $todaysqlemail[0]->email;
            $name = $todaysqlemail[0]->company_name;

                      $mail_set = $this->db->select('*')->from('email_config ')->get()->result_array();
                        foreach ($mail_set as $key => $value) {
                            $stm_user = $value['smtp_user'];
                            $stm_pass = $value['smtp_pass'];
                        }

                        $config = array(
                          'protocol' => 'smtp',
                          'smtp_host' => 'ssl://smtp.gmail.com',
                          'smtp_user' => $stm_user,
                          'smtp_pass' => $stm_pass,
                          'smtp_port' => 465,
                          'smtp_timeout' => 30,
                          'charset' => 'utf-8',
                          'newline' => '\r\n',
                          'mailtype' => 'html',
                          
                        );

                        $this->email->initialize($config);
                        $this->email->set_newline("\r\n");
                        $this->email->set_crlf("\r\n");
                        $this->email->from($to, $name);
                        $this->email->to($to);
                        $this->email->subject($selectedStatus);

                        if ($selectedStatus === 'PaymentDuedate') {
                            $this->email->message('Payment Due Date: ' . $sevenDaysAgosql[0]->payment_due_date);
                        } else if ($selectedStatus === 'Estshipmentdate') {
                            $this->email->message('Estimated Time of Departure Date: '. $sevenDaysAgosql[0]->etd);
                        } else if ($selectedStatus === 'oceanimportETA') {
                            $this->email->message('Estimated Time of Arrival Date: ' . $sevenDaysAgosql[0]->eta);
                        } else if ($selectedStatus === 'oceanimportETD') {
                            $this->email->message('Estimated Time of Departure Date: ' . $sevenDaysAgosql[0]->etd);
                        } else if ($selectedStatus === 'ContainerGoodspickupdate') {
                            $this->email->message('Container Pickup Date: ' . $sevenDaysAgosql[0]->container_pickup_date);
                        }else if ($selectedStatus === 'DELIVERYDATE') {
                            $this->email->message('Delivery Date: ' . $sevenDaysAgosql[0]->delivery_date);
                        }

                        if ($this->email->send()) {
                            echo "<script>alert('Email Send successfully');</script>";
                            redirect(base_url('Cweb_setting'));
                        } else {
                            echo "<script>alert('Email Send Failed !!!!!');</script>";
                        }
            }

            


        } elseif ($SelectedDate === 'On Date') {
            $today = date('Y-m-d');
            $todaysql = $CI->Web_settings->getDataForExpenseToday($selectedStatus);

            $dateString = $todaysql[0]->eta;
            
            $dateTime = new DateTime($dateString);
            $todayDate = $dateTime->format('Y-m-d');

            if($SelectedSource === 'CALENDER'){

                if ($selectedStatus === 'PaymentDuedate') {
                    $start_date = $todaysql[0]->payment_due_date;
                    $id = $todaysql[0]->purchase_id;
                } else if ($selectedStatus === 'Estshipmentdate') {
                    $start_date = $todaysql[0]->etd;
                    $id = $todaysql[0]->purchase_id;
                } else if ($selectedStatus === 'oceanimportETA') {
                    $start_date = $todaysql[0]->eta;
                    $id = $todaysql[0]->ocean_import_tracking_id    ;
                } else if ($selectedStatus === 'oceanimportETD') {
                    $start_date = $todaysql[0]->etd;
                    $id = $todaysql[0]->ocean_import_tracking_id    ;
                }else if ($selectedStatus === 'ContainerGoodspickupdate') {
                    $start_date = $todaysql[0]->container_pickup_date;
                    $id = $todaysql[0]->trucking_id;
                }else if ($selectedStatus === 'DELIVERYDATE') {
                    $start_date = $todaysql[0]->delivery_date;
                    $id = $todaysql[0]->trucking_id;
                }

                if ($selectedStatus === 'PaymentDuedate') {
                    $title = 'NEW EXPENSE - Payment Due date';
                } else if ($selectedStatus === 'Estshipmentdate') {
                    $title = 'Purchase Order - ETD';
                } else if ($selectedStatus === 'oceanimportETA') {
                    $title = 'Ocean Import Tracking - ETA';
                } else if ($selectedStatus === 'oceanimportETD') {
                    $title = 'Ocean Import Tracking - ETD';
                }else if ($selectedStatus === 'ContainerGoodspickupdate') {
                    $title = 'TRUCKING - Container / Goods pickup date';
                }else if ($selectedStatus === 'DELIVERYDATE') {
                    $title = 'TRUCKING - Delivery date';
                } 

                for ($i = 0, $n = count($start_date); $i < $n; $i++) {
                date_default_timezone_set('Asia/Kolkata'); 
                $current_time = date("H:i");
                $data = array(
                   'name_id' => $id,
                   'title' => $title,
                   'description' => $todaysql[$i]->remarks,
                   'start' => $start_date . 'T' . $current_time,
                   'schedule_status' => 1,
                   'created_by' => $this->session->userdata('user_id')
                );

                $this->db->insert('schedule_list', $data);
                // echo $this->db->last_query(); die();
                redirect(base_url('Cweb_setting/calender_view'));
            }
        }

                if($SelectedSource === 'EMAIL'){

                      $todaysqlemail = $CI->Web_settings->getDataForTodayEmailSchedule($selectedCompany);
                      $to = $todaysqlemail[0]->email;
                      $name = $todaysqlemail[0]->company_name;

                      $mail_set = $this->db->select('*')->from('email_config ')->get()->result_array();
                        foreach ($mail_set as $key => $value) {
                            $stm_user = $value['smtp_user'];
                            $stm_pass = $value['smtp_pass'];
                        }

                        $config = array(
                          'protocol' => 'smtp',
                          'smtp_host' => 'ssl://smtp.gmail.com',
                          'smtp_user' => $stm_user,
                          'smtp_pass' => $stm_pass,
                          'smtp_port' => 465,
                          'smtp_timeout' => 30,
                          'charset' => 'utf-8',
                          'newline' => '\r\n',
                          'mailtype' => 'html',
                          
                        );

                        $this->email->initialize($config);
                        $this->email->set_newline("\r\n");
                        $this->email->set_crlf("\r\n");
                        $this->email->from($to, $name);
                        $this->email->to($to);
                        $this->email->subject($selectedStatus);

                        if ($selectedStatus === 'PaymentDuedate') {
                            $this->email->message('Payment Due Date: ' . $todaysql[0]->payment_due_date);
                        } else if ($selectedStatus === 'Estshipmentdate') {
                            $this->email->message('Estimated Time of Departure Date: '. $todaysql[0]->etd);
                        } else if ($selectedStatus === 'oceanimportETA') {
                            $this->email->message('Estimated Time of Arrival Date: ' . $todaysql[0]->eta);
                        } else if ($selectedStatus === 'oceanimportETD') {
                            $this->email->message('Estimated Time of Departure Date: ' . $todaysql[0]->etd);
                        } else if ($selectedStatus === 'ContainerGoodspickupdate') {
                            $this->email->message('Container Pickup Date: ' . $todaysql[0]->container_pickup_date);
                        }else if ($selectedStatus === 'DELIVERYDATE') {
                            $this->email->message('Delivery Date: ' . $todaysql[0]->delivery_date);
                        }

                        if ($this->email->send()) {
                            echo "<script>alert('Email Send successfully');</script>";
                            redirect(base_url('Cweb_setting'));
                        } else {
                            echo "<script>alert('Email Send Failed !!!!!');</script>";
                        }
            }


        }  


        $data = array(
            'todays' => $todaysql,
            'yesterdays' => $yesterdaysql,
            'threeDays' => $threeDaysAgosql,
            'sevenDays' => $sevenDaysAgosql,
            'statuses' => $selectedStatus,
            'selecteddates' => $SelectedDate
        );


        $content = $this->load->view('web_setting/view_alerts', $data, true);
        $this->template->full_admin_html_view($content);

    }

   

    public function inbox_delete()
    {
        $file = 'assets/Email/inbox.txt';  // Replace with your file path
        $specificWord = $this->input->post('id');  // The specific word to search for (change as needed)
        // Open the original file in read mode
        $handle = fopen($file, 'r');
        if ($handle) {
            $lines = [];
            // Read the original file line by line
            while (($line = fgets($handle)) !== false) {
                // If the line doesn't contain the specific word, store it in the array
                if (strpos($line, $specificWord) === false) {
                    $lines[] = $line;
                }
            }
            // Close the file handle
            fclose($handle);
            // Open the file in write mode to overwrite its contents
            $handle = fopen($file, 'w');
            // Write the lines from the array to the file
            foreach ($lines as $line) {
                fwrite($handle, $line);
            }
            // Close the file handle
            fclose($handle);
            echo "Lines containing '$specificWord' have been unset from the file.";
        } else {
            echo "Unable to open the file.";
        }
    }
    public function trash_email()
    {   
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->model('Web_settings');
        $alld_id = $this->input->post('Trashid');
        $data_email = array(
          'is_deleted' => 2,
        );
        $this->db->where('id', $alld_id);
        $this->db->update('email_data', $data_email);
        
        // $id = $this->input->post('Trashid');
        // $this->db->where('id', $id);
        // $delete = $this->db->delete('email_data');
        // return $delete;
    }
    
    public function Inboxdelete_email()
    {
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->model('Web_settings');
        $in_id = $this->input->post('id');
        $data_inboxemail = array(
          'is_deletedinbox' => 1,
        );
        $this->db->where('id', $in_id);
       $this->db->update('email_inbox', $data_inboxemail);
    }
    
     public function inboxDatadelete_email()
    {
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->model('Web_settings');
        $delin_id = $this->input->post('inTrashid');
        $datainbox_email = array(
          'is_deletedinbox' => 2,
        );
        $this->db->where('id', $delin_id);
        $this->db->update('email_inbox', $datainbox_email);
    }
    
     public function RestoreEmailFirstsentbox()
    {
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->model('Web_settings');
        $res_id = $this->input->post('id');
        $data_email = array(
          'is_deleted' => 0,
        );
        $this->db->where('id', $res_id);
        $this->db->update('email_data', $data_email);
    }
    
    public function RestoreEmailsecondInbox()
    {
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->model('Web_settings');
        $restore_id = $this->input->post('id');
        $data_email = array(
          'is_deletedinbox' => 0,
        );
        $this->db->where('id', $restore_id);
        $this->db->update('email_inbox', $data_email);
    }
    
    public function delete_email()
    {
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->model('Web_settings');
        $d_id = $this->input->post('id');
        $data_email = array(
          'is_deleted' => 1,
        );
        $this->db->where('id', $d_id);
        $this->db->update('email_data', $data_email);
    }
    public function update_email()
	{
		$pad_id = $this->input->post('pad_id');
        $email = $this->input->post('email');
        $message = $this->input->post('message');
	    $data = array(
	      'pad_id' => $pad_id,
	    );
        $this->db->where('to_email',$email);
        $this->db->where('message',$message);
        $this->db->update('email_data', $data);
        $this->template->full_admin_html_view($mail_setting);
	}
    public function sendemail()
    {
        $CI = & get_instance();
        $CI->load->library('phpmailer_lib');
        $mail_set = $this->db->select('*')->from('email_config')->get()->result_array();

        $data = array(
            'title' => display('Compose'),
            'email_setting' => $mail_set,
        );
        $content = $CI->parser->parse('web_setting/email_sendcus.php', $data, true);
        $this->template->full_admin_html_view($content);
    }
    public function emailSending()
    {
         $CI = & get_instance();
        $to = $this->input->post('to_email');
        $cc = $this->input->post('cc_email');
        $cc_emails_array = explode(';', $cc);
        $cc_emails_arrays = array_map('trim', $cc_emails_array);
        $subject = $this->input->post('subject');
        $message = $this->input->post('message');
        $reply = $this->input->post('replyEmail');
        $created = $this->session->userdata('user_id');
        // $random_id = rand(10,100);
        $upload_directory = 'uploads/email/';
        $no_files = count($_FILES["files"]['name']);
        for ($i = 0; $i < $no_files; $i++) {
            if ($_FILES["files"]["error"][$i] > 0) {
                echo "Error: " . $_FILES["files"]["error"][$i] . "<br>";
            } else {
                move_uploaded_file($_FILES["files"]["tmp_name"][$i], $upload_directory . $_FILES["files"]["name"][$i]);
                $images[] = $_FILES["files"]["name"][$i];
                $insertImages = implode(', ', $images);
            }
        }
        // print_r($no_files); die();
      $mail_set = $CI->Web_settings->getemailConfig();
        // $mail_set = $this->db->select('*')->from('email_config')->get()->result_array();
        $stm_user = $mail_set[0]->smtp_user;
        $stm_pass = $mail_set[0]->smtp_pass;
        $domain_name = $mail_set[0]->smtp_host;
        $protocol = $mail_set[0]->protocol;
        $EMAIL_ADDRESS = $mail_set[0]->smtp_user;
        $DOMAIN = substr(strrchr($EMAIL_ADDRESS, "@"), 1);
       // print_r($DOMAIN); die();
        if(strtolower($DOMAIN) === 'gmail.com'){
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
        }else{
            $config = array(
              'protocol' => $protocol,
              'smtp_host' => 'ssl://' . $domain_name,
              'smtp_user' => $stm_user,
              'smtp_pass' => $stm_pass,
              'smtp_port' => 465,
              'smtp_timeout' => 30,
              'charset' => 'utf-8',
              'newline' => '\r\n',
              'mailtype' => 'html',
              'validate' => true,
            );
        }
        $this->load->library('email');
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");
        $this->email->set_crlf("\r\n");
        $this->email->from($to, 'Your Name');
        $this->email->to($to);
      if (!empty($cc_emails_arrays)) {
            $this->email->cc($cc_emails_arrays);
        }
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->reply_to($reply);
        $upload_directory = 'uploads/email/';
        foreach ($_FILES["files"]["tmp_name"] as $key => $tmp_name) {
            $file_name = $_FILES["files"]["name"][$key];
            $file_path = $upload_directory . $file_name;
            move_uploaded_file($_FILES["files"]["tmp_name"][$key], $file_path);
            $this->email->attach($file_path);
        }
        if ($this->email->send()) {
            echo "<script>alert('Email Send successfully');</script>";
            // file_put_contents("assets/Email/sendemail.txt", ("\n".$random_id.'|'.$to.'|'.$cc.'|'.$subject.'|'.$message.'|'),FILE_APPEND);
            $data = array(
                'to_email' => $to,
                'cc_email' => $cc,
                'subject' => $subject,
                'message' => $message,
                 'files' => $insertImages,
                'created_by' => $created
            );
            $this->db->insert('email_data', $data);
            // echo  $this->db->last_query(); die();
            redirect(base_url('Cweb_setting/email_setting'));
            // echo  $this->db->last_query(); die();
        } else {
            echo "<script>alert('Email Send Failed !!!!!');</script>";
            echo 'Error sending email: ' . $this->email->print_debugger();
        }
    }
    // public function emailSending()
    // {
    //     $to = $this->input->post('to_email');
    //     $cc = $this->input->post('cc_email');
    //     $subject = $this->input->post('subject');
    //     $message = $this->input->post('message');
    //     $created = $this->session->userdata('user_id');
    //     $random_id = rand(10,100);

    //     $mail_set = $this->db->select('*')->from('email_config ')->get()->result_array();

    //     foreach ($mail_set as $key => $value) {
    //         $stm_user = $value['smtp_user'];
    //         $stm_pass = $value['smtp_pass'];
    //     }

    //     $this->load->library('email');
    //     $config = array(
    //       'protocol' => 'smtp',
    //       'smtp_host' => 'ssl://smtp.gmail.com',
    //       'smtp_user' => $stm_user,
    //       'smtp_pass' => $stm_pass,
    //       'smtp_port' => 465,
    //       'smtp_timeout' => 30,
    //       'charset' => 'utf-8',
    //       'newline' => '\r\n',
    //       'mailtype' => 'html',
          
    //     );

    //     $this->email->initialize($config);
    //     $this->email->set_newline("\r\n");
    //     $this->email->set_crlf("\r\n");
    //     $this->email->from($to, 'Your Name');
    //     $this->email->to($to);
    //     $this->email->cc($cc);
    //     $this->email->subject($subject);
    //     $this->email->message($message);

    //     if ($this->email->send()) {
    //         echo "<script>alert('Email Send successfully');</script>";

    //         file_put_contents("assets/Email/sendemail.txt", ("\n".$random_id.'|'.$to.'|'.$cc.'|'.$subject.'|'.$message.'|'),FILE_APPEND);

    //         $data = array(
    //             'to_email' => $to,
    //             'cc_email' => $cc,
    //             'subject' => $subject,
    //             'message' => $message,
    //             'created_by' => $created
    //         );

    //         $this->db->insert('email_data', $data);

    //         redirect(base_url('Cweb_setting/email_setting'));
    //         // echo  $this->db->last_query(); die();
    //     } else {
    //         echo "<script>alert('Email Send Failed !!!!!');</script>";
    //         // echo 'Error sending email: ' . $this->email->print_debugger();
    //     }
    // }
    

    function invoice_design()
{
   $content = $this->lweb_setting->invoice_design();
        $this->template->full_admin_html_view($content);

   
}
    function update_templates()
{
      $this->db->select('*');

    $this->db->from('invoice_design');

    $this->db->where('uid', $this->session->userdata('user_id'));
  
 $query = $this->db->get()->num_rows();

if (empty($query) ) {
 
	if($_REQUEST['input']=='header')
			{
  $data=array(
        'header' => $_REQUEST['value'],
        'uid' => $_REQUEST['id']
    );
      $this->db->insert('invoice_design', $data);
        // echo $this->db->last_query();
   
	}
			if($_REQUEST['input']=='color')
			{
                  $data=array(
        'color' => $_REQUEST['value'],
        'uid' => $_REQUEST['id']
    );
    //   $this->db->insert('invoice_design', $data);
    //          echo $this->db->last_query();

	}
             $this->db->insert('invoice_design', $data);
  
		}
		else
		{
			
			if($_REQUEST['input']=='header')
			{
			//	 $query='update invoice_design set header="'.$_REQUEST['value'].'" where uid='.$_REQUEST['id'];
 $data=array(
        'header' => $_REQUEST['value'],
        'uid' => $_REQUEST['id']
    );
 $this->db->where('uid', $_REQUEST['id']);
            $this->db->update('invoice_design', $data);
            //  echo $this->db->last_query();
			}
			if($_REQUEST['input']=='color')
			{
                 $data=array(
        'color' => $_REQUEST['value'],
        'uid' => $_REQUEST['id']
    );
     $this->db->where('uid', $_REQUEST['id']);
            $this->db->update('invoice_design', $data);
        
			}
		}
       

		// $sql=mysqli_query($con,$query);
		// if($sql)
		// {
		 //	echo 'Updated';
		// }

}
function invoice_content()
{
   $content = $this->lweb_setting->invoice_content();
        $this->template->full_admin_html_view($content);
}










function updateinvoice2()
{
    $id=$_SESSION['user_id'];
    $this->db->select('*');
     $this->db->from('invoice_content');
    $this->db->where('uid', $id );
     $query = $this->db->get();
    if ( $query->num_rows() > 0 )
    {
        $sql='update invoice_content set
        company_name="'.$_REQUEST['name'].'",
        mobile="'.$_REQUEST['phone'].'",
        email="'.$_REQUEST['email'].'",
        reg_number="'.$_REQUEST['regno'].'",
        website="'.$_REQUEST['website'].'",
        address="'.$_REQUEST['address'].'"
        where uid=
        '.$id;
    }
else
{
     $sql = "insert into invoice_content(company_name,mobile,email,reg_number,website,address,uid) VALUES(
   '".$_REQUEST['name']."',
   '".$_REQUEST['phone']."',
   '".$_REQUEST['email']."',
   '".$_REQUEST['regno']."',
   '".$_REQUEST['website']."',
   '".$_REQUEST['address']."',
   '".$_SESSION['user_id']."'
) ";
}
$query=$this->db->query($sql);
// echo $this->db->last_query();
if($query)
{
    ?>
    <script type="text/javascript">
        // alert('Updated');
        location.href='invoice_content';
    </script>
    <?php
}
}




























    public function index() {
        $content = $this->lweb_setting->setting_add_form();
        $this->template->full_admin_html_view($content);
    }
    public function admin_user_mail_ids(){
         $val=$this->input->post('dataString');
           $CI = & get_instance();
           $CI->auth->check_admin_auth();
           $CI->load->model('Web_settings');
        $data = $CI->Web_settings->admin_user_mail_ids($val);
   echo json_encode($data);
   
       }
function email_template()
{
  $content = $this->lweb_setting->email_template();
        $this->template->full_admin_html_view($content);
}
public function insert_email() {
    $pdf=0;
    $pdf = $this->input->post('pdf',TRUE);
    $greeting =$this->input->post('select1',TRUE).'_'.$this->input->post('select2',TRUE);
    
    $id=$_SESSION['user_id'];

    $this->db->select('*');

    $this->db->from('invoice_email');

    $this->db->where('uid', $id);

    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        $this->db->set('pdf_attached', $pdf);
        $this->db->set('subject',$this->input->post('subject',TRUE));
        $this->db->set('greeting',  $greeting);
        $this->db->set('message', $this->input->post('message',TRUE));
        $this->db->where('uid', $id);
        $this->db->update('invoice_email');
    }else{
        $data = array(
        'pdf_attached'=>$this->input->post('pdf'),
        'subject'=>$this->input->post('subject'),
        'greeting'=> $greeting,
         'message'  => $this->session->userdata('message'),
         'uid'   => $id
     );

     $this->db->insert('nvoice_email', $data);
     echo $this->db->last_query();
    }

}

    public function email_setting() {
        $CI = & get_instance();
        
        $view_email = $this->db->select('*')->from('email_data')->where('is_deleted', 0)->get()->result();
        $email_con = $this->db->select('*')->from('email_config')->get()->result();
        // $del_email = $this->db->select('*')->from('email_data')->where('is_deleted', 1)->get()->result();
        // print_r($email_con); die();
        $content = $this->lweb_setting->email_setting($view_email, $email_con);
        $this->template->full_admin_html_view($content);
    }
    
    public function getrelativeInboxData()
    {
        $CI = & get_instance();
        $CI->load->model('Web_settings');

        $msg_id = $this->input->post('messageid');

        $content = $this->Web_settings->getInboxmessagedata($msg_id);
        
        echo json_encode($content);
    }


    

   public function invoice_template() {

        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->model('Web_settings');


        $content = $this->lweb_setting->invoice_setting();
        $setting_detail = $CI->Web_settings->retrieve_setting_editdata();
        $CI->Web_settings->update_invoice_set();

        $data=array(
            'setting_detail' => $setting_detail, 
        );
 
        $this->template->full_admin_html_view($content);
    }


    
      public function expense_invoice_template() {
        $content = $this->lweb_setting->expense_invoice_setting();
        $this->template->full_admin_html_view($content);
    }

    
   public function web_Invoice(){
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->model('Web_settings');


        $setting_detail = $CI->Web_settings->retrieve_setting_editdata();
        $data=array(
           
            'setting_detail' => $setting_detail, 
        );

        $CI->Web_settings->update_invoice_set();

    //    print_r( $data);die();

        $this->session->set_userdata(array('message' => display('successfully_added')));
        
        if (isset($_POST['add-customer'])) {
           // print_r($_POST['add-ocean-export']);
           
          redirect(base_url('Cweb_setting/invoice_template'));
            exit;
            
        }
    
    }



    
  public function invoice_desgn(){
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->model('Web_settings');
        $setting_detail = $CI->Web_settings->retrieve_setting_editdata();

        $CI->Web_settings->invoice_desgn();


        $data=array(
           
            'setting_detail' => $setting_detail, 
        );

        
        $this->session->set_userdata(array('message' => display('successfully_added')));
        if (isset($_POST['add-customer'])) {
           // print_r($_POST['add-ocean-export']);
          redirect(base_url('Cweb_setting/invoice_template'));
            exit;
        }
    
    }


     public function update_invoice_setting($param="") {
        
        $this->load->model('Web_settings');



        if($param=='new_sale')
        {
                  if ($_FILES['logo']['name']) {
          

        $config['upload_path']    = './my-assets/image/invoice_logo/sale/new_sale/';
        $config['allowed_types']  = 'gif|jpg|png|jpeg|JPEG|GIF|JPG|PNG'; 
        $config['encrypt_name']   = TRUE;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('logo')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_userdata(array('error_message' => $this->upload->display_errors()));
                redirect(base_url('Cweb_setting'));
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
            $logo = base_url() . $logo;

            }
        } 

        $old_logo = $this->input->post('old_logo',true);
        // $old_invoice_logo = $this->input->post('old_invoice_logo',true);
        // $old_favicon = $this->input->post('old_favicon',true);

        $data = array(
        'invoice_heading'          => $this->input->post('invoice_heading',true),
        'logo'              => (!empty($logo) ? $logo : $old_logo),
        'company_address' => $this->input->post('company_address',true),
        );

        $invoice_type = $this->input->post('invoice_type',true);
        $user_id = $this->session->userdata('user_id');

        }

        if($param=='profarma_invoice')
        {

              if ($_FILES['logo']['name']) {
          

        $config['upload_path']    = './my-assets/image/invoice_logo/sale/profarma/';
        $config['allowed_types']  = 'gif|jpg|png|jpeg|JPEG|GIF|JPG|PNG'; 
        $config['encrypt_name']   = TRUE;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('logo')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_userdata(array('error_message' => $this->upload->display_errors()));
                redirect(base_url('Cweb_setting'));
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
            $logo = base_url() . $logo;

            }
        } 

        $old_logo = $this->input->post('old_logo',true);
        // $old_invoice_logo = $this->input->post('old_invoice_logo',true);
        // $old_favicon = $this->input->post('old_favicon',true);

        $data = array(
        'invoice_heading'          => $this->input->post('invoice_heading',true),
        'logo'              => (!empty($logo) ? $logo : $old_logo),
        'company_address' => $this->input->post('company_address',true),
        );

        $invoice_type = $this->input->post('invoice_type',true);
        $user_id = $this->session->userdata('user_id');

        }


         if($param=='packing_list')
        {

              if ($_FILES['logo']['name']) {
          

        $config['upload_path']    = './my-assets/image/invoice_logo/sale/packinglist/';
        $config['allowed_types']  = 'gif|jpg|png|jpeg|JPEG|GIF|JPG|PNG'; 
        $config['encrypt_name']   = TRUE;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('logo')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_userdata(array('error_message' => $this->upload->display_errors()));
                redirect(base_url('Cweb_setting'));
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
            $logo = base_url() . $logo;

            }
        } 

        $old_logo = $this->input->post('old_logo',true);
        // $old_invoice_logo = $this->input->post('old_invoice_logo',true);
        // $old_favicon = $this->input->post('old_favicon',true);

        $data = array(
        'invoice_heading'          => $this->input->post('invoice_heading',true),
        'logo'              => (!empty($logo) ? $logo : $old_logo),
        'company_address' => $this->input->post('company_address',true),
        );

        $invoice_type = $this->input->post('invoice_type',true);
        $user_id = $this->session->userdata('user_id');
        
        }

     


         if($param=='oet')
        {

              if ($_FILES['logo']['name']) {
          

        $config['upload_path']    = './my-assets/image/invoice_logo/sale/oet/';
        $config['allowed_types']  = 'gif|jpg|png|jpeg|JPEG|GIF|JPG|PNG'; 
        $config['encrypt_name']   = TRUE;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('logo')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_userdata(array('error_message' => $this->upload->display_errors()));
                redirect(base_url('Cweb_setting'));
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
            $logo = base_url() . $logo;

            }
        } 

        $old_logo = $this->input->post('old_logo',true);
        // $old_invoice_logo = $this->input->post('old_invoice_logo',true);
        // $old_favicon = $this->input->post('old_favicon',true);

        $data = array(
        'invoice_heading'          => $this->input->post('invoice_heading',true),
        'logo'              => (!empty($logo) ? $logo : $old_logo),
        'company_address' => $this->input->post('company_address',true),
        );

        $invoice_type = $this->input->post('invoice_type',true);
        $user_id = $this->session->userdata('user_id');
        
        }

         if($param=='trucking')
        {

              if ($_FILES['logo']['name']) {
          

        $config['upload_path']    = './my-assets/image/invoice_logo/sale/trucking/';
        $config['allowed_types']  = 'gif|jpg|png|jpeg|JPEG|GIF|JPG|PNG'; 
        $config['encrypt_name']   = TRUE;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('logo')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_userdata(array('error_message' => $this->upload->display_errors()));
                redirect(base_url('Cweb_setting'));
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
            $logo = base_url() . $logo;

            }
        } 

        $old_logo = $this->input->post('old_logo',true);
        // $old_invoice_logo = $this->input->post('old_invoice_logo',true);
        // $old_favicon = $this->input->post('old_favicon',true);

        $data = array(
        'invoice_heading'          => $this->input->post('invoice_heading',true),
        'logo'              => (!empty($logo) ? $logo : $old_logo),
        'company_address' => $this->input->post('company_address',true),
        );

        $invoice_type = $this->input->post('invoice_type',true);
        $user_id = $this->session->userdata('user_id');
        
        }
  

        $json = json_encode($data);
        $insertField = array('invoice_template'=>$invoice_type,'user_id'=>$user_id,'data' => $json);

        $this->Web_settings->update_invoice_setting($insertField);

        $this->session->set_userdata(array('message' => display('successfully_updated')));
        redirect(base_url('Cweb_setting/invoice_template'));
        exit;
    }




    public function update_expense_invoice_setting($param=""){
        $this->load->model('Web_settings');



        if($param=='new_expense')
        {
                  if ($_FILES['logo']['name']) {
          

        $config['upload_path']    = './my-assets/image/invoice_logo/sale/new_sale/';
        $config['allowed_types']  = 'gif|jpg|png|jpeg|JPEG|GIF|JPG|PNG'; 
        $config['encrypt_name']   = TRUE;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('logo')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_userdata(array('error_message' => $this->upload->display_errors()));
                redirect(base_url('Cweb_setting'));
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
            $logo = base_url() . $logo;

            }
        } 

        $old_logo = $this->input->post('old_logo',true);
        // $old_invoice_logo = $this->input->post('old_invoice_logo',true);
        // $old_favicon = $this->input->post('old_favicon',true);

        $data = array(
        'invoice_heading'          => $this->input->post('invoice_heading',true),
        'logo'              => (!empty($logo) ? $logo : $old_logo),
        'company_address' => $this->input->post('company_address',true),
        );

        $invoice_type = $this->input->post('invoice_type',true);
        $user_id = $this->session->userdata('user_id');

        }

        if($param=='purchase_order')
        {

              if ($_FILES['logo']['name']) {
          

        $config['upload_path']    = './my-assets/image/invoice_logo/sale/profarma/';
        $config['allowed_types']  = 'gif|jpg|png|jpeg|JPEG|GIF|JPG|PNG'; 
        $config['encrypt_name']   = TRUE;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('logo')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_userdata(array('error_message' => $this->upload->display_errors()));
                redirect(base_url('Cweb_setting'));
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
            $logo = base_url() . $logo;

            }
        } 

        $old_logo = $this->input->post('old_logo',true);
        // $old_invoice_logo = $this->input->post('old_invoice_logo',true);
        // $old_favicon = $this->input->post('old_favicon',true);

        $data = array(
        'invoice_heading'          => $this->input->post('invoice_heading',true),
        'logo'              => (!empty($logo) ? $logo : $old_logo),
        'company_address' => $this->input->post('company_address',true),
        );

        $invoice_type = $this->input->post('invoice_type',true);
        $user_id = $this->session->userdata('user_id');

        }


         if($param=='oit')
        {

              if ($_FILES['logo']['name']) {
          

        $config['upload_path']    = './my-assets/image/invoice_logo/sale/packinglist/';
        $config['allowed_types']  = 'gif|jpg|png|jpeg|JPEG|GIF|JPG|PNG'; 
        $config['encrypt_name']   = TRUE;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('logo')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_userdata(array('error_message' => $this->upload->display_errors()));
                redirect(base_url('Cweb_setting'));
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
            $logo = base_url() . $logo;

            }
        } 

        $old_logo = $this->input->post('old_logo',true);
        // $old_invoice_logo = $this->input->post('old_invoice_logo',true);
        // $old_favicon = $this->input->post('old_favicon',true);

        $data = array(
        'invoice_heading'          => $this->input->post('invoice_heading',true),
        'logo'              => (!empty($logo) ? $logo : $old_logo),
        'company_address' => $this->input->post('company_address',true),
        );

        $invoice_type = $this->input->post('invoice_type',true);
        $user_id = $this->session->userdata('user_id');
        
        }


        

         if($param=='trucking_expense')
        {

              if ($_FILES['logo']['name']) {
          

        $config['upload_path']    = './my-assets/image/invoice_logo/sale/trucking/';
        $config['allowed_types']  = 'gif|jpg|png|jpeg|JPEG|GIF|JPG|PNG'; 
        $config['encrypt_name']   = TRUE;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('logo')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_userdata(array('error_message' => $this->upload->display_errors()));
                redirect(base_url('Cweb_setting'));
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
            $logo = base_url() . $logo;

            }
        } 

        $old_logo = $this->input->post('old_logo',true);
        // $old_invoice_logo = $this->input->post('old_invoice_logo',true);
        // $old_favicon = $this->input->post('old_favicon',true);

        $data = array(
        'invoice_heading'          => $this->input->post('invoice_heading',true),
        'logo'              => (!empty($logo) ? $logo : $old_logo),
        'company_address' => $this->input->post('company_address',true),
        );

        $invoice_type = $this->input->post('invoice_type',true);
        $user_id = $this->session->userdata('user_id');
        
        }
  

        $json = json_encode($data);
        $insertField = array('invoice_template'=>$invoice_type,'user_id'=>$user_id,'data' => $json);

        $this->Web_settings->update_invoice_setting($insertField);

        $this->session->set_userdata(array('message' => display('successfully_updated')));
        redirect(base_url('Cweb_setting/invoice_template'));
        exit;
    }

    // Update setting
    public function update_setting() {
        $this->load->model('Web_settings');
        
        $status = $this->input->post('status_logo');
        // $fav_icon = $this->input->post('favicon_logo');
        // $inv_logo = $this->input->post('inv_logo');
        // $OLD_logo = $this->input->post('o_logo');

        if ($_FILES['logo']['name']) {
          

        $config['upload_path']    = './my-assets/image/logo/';
        $config['allowed_types']  = 'gif|jpg|png|jpeg|JPEG|GIF|JPG|PNG'; 
        $config['encrypt_name']   = TRUE;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('logo')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_userdata(array('error_message' => $this->upload->display_errors()));
                redirect(base_url('Cweb_setting'));
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

        if ($_FILES['favicon']['name']) {
            $config['upload_path']   = './my-assets/image/logo/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG|GIF|JPG|PNG';
            $config['max_size']      = "*";
            $config['max_width']     = "*";
            $config['max_height']    = "*";
            $config['encrypt_name']  = TRUE;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('favicon')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_userdata(array('error_message' => $this->upload->display_errors()));
                redirect(base_url('Cweb_setting'));
            } else {
                $image = $this->upload->data();
                $favicon = base_url(). "my-assets/image/logo/" . $image['file_name'];
            }
        }

        if ($_FILES['invoice_logo']['name']) {

        $config['upload_path']    = './my-assets/image/logo/';
        $config['allowed_types']  = 'gif|jpg|png|jpeg|JPEG|GIF|JPG|PNG'; 
        $config['encrypt_name']   = TRUE;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('invoice_logo')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_userdata(array('error_message' => $this->upload->display_errors()));
                redirect(base_url('Cweb_setting'));
            } else {
            $data = $this->upload->data();  
            $invoice_logo = $config['upload_path'].$data['file_name']; 
            $config['image_library']  = 'gd2';
            $config['source_image']   = $invoice_logo;
            $config['create_thumb']   = false;
            $config['maintain_ratio'] = TRUE;
            $config['width']          = 200;
            $config['height']         = 200;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $invoice_logo = $invoice_logo;

            }
        }
        
        if ($_FILES['logo']['name']) {
            $config['upload_path']   = './my-assets/image/logo/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG|GIF|JPG|PNG';
            $config['max_size']      = "*";
            $config['max_width']     = "*";
            $config['max_height']    = "*";
            $config['encrypt_name']  = TRUE;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('logo')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_userdata(array('error_message' => $this->upload->display_errors()));
                redirect(base_url('Cweb_setting'));
            } else {
                $image = $this->upload->data();
                // $company_logo = base_url() . "my-assets/image/logo/" . $image['file_name'];
                $logo = "my-assets/image/logo/" . $image['file_name'];
                // print_r($logo); die();
            }
        }

        $old_logo = $this->input->post('old_logo',true);
        $old_invoice_logo = $this->input->post('old_invoice_logo',true);
        $old_favicon = $this->input->post('old_favicon',true);
        $old_officelogo = $this->input->post('old_officelogo',true);

    $data = array(
    'logo'              => (!empty($logo) ? $logo : $old_logo),
    'invoice_logo'      => (!empty($invoice_logo) ? $invoice_logo : $old_invoice_logo),
    'favicon'           => (!empty($favicon) ? $favicon : $old_favicon),
    'start_week' => $this->input->post('start_week',true),    'end_week' => $this->input->post('end_week',true),
    'currency'          => $this->input->post('currency',true),
    'currency_position' => $this->input->post('currency_position',true),
    'footer_text'       => $this->input->post('footer_text',true),
    'language'          => $this->input->post('language',true),
    'rtr'               => $this->input->post('rtr',true),
    'timezone'          => $this->input->post('timezone',true),
    'captcha'           => $this->input->post('captcha',true),
    'site_key'          => $this->input->post('site_key',true),
    'secret_key'        => $this->input->post('secret_key',true),
    'discount_type'     => $this->input->post('discount_type',true),
    'side_menu_bar'     => $this->input->post('side_menu_bar',true),
    'top_menu_bar'     => $this->input->post('top_menu_bar',true),
    'button_color'     => $this->input->post('button_color',true),
    'create_by'         => $this->session->userdata('user_id')
    );
    $fav_icon = $this->input->post('favicon_logo');
        $inv_logo = $this->input->post('inv_logo');
        $OLD_logo = $this->input->post('o_logo');
        
        if($status === 'OfficeLogo'){
            $data1 = array(
               'logo' => (!empty($logo) ? $logo : $old_officelogo)
            );
            $this->db->where('company_id', $this->session->userdata('user_id'));
            $this->db->update('company_information', $data1);
            // echo $this->db->last_query(); die();
       }

        $this->Web_settings->update_setting($data);

        $this->session->set_userdata(array('message' => display('successfully_updated')));
        redirect(base_url('Cweb_setting'));
        exit;
    }


        public function app_setting() {
         $data['qr_image'] = "";
         $data['server_image'] = "";
         $data['hotspotqrimg'] = "";
          $app_settingdata = $this->Web_settings->app_settingsdata();
           $this->load->library('ciqrcode');
            $qr_image=rand().'.png';
            $params['data'] = $app_settingdata[0]['localhserver'];
            $params['level'] = 'L';
            $params['size'] = 8;
            $params['savename'] =FCPATH."my-assets/image/qr/".$qr_image;
            if($this->ciqrcode->generate($params))
            {
                $localqr = $qr_image;
            }


             $serverqr=rand().'.png';
            $params['data'] = $app_settingdata[0]['onlineserver'];
            $params['level'] = 'O';
            $params['size'] = 8;
            $params['savename'] =FCPATH."my-assets/image/qr/".$serverqr;
            if($this->ciqrcode->generate($params))
            {
                $server_qrimg = $serverqr;
            }



             $hotspotqr=rand().'.png';
            $params['data'] = $app_settingdata[0]['hotspot'];
            $params['level'] = 'U';
            $params['size'] = 8;
            $params['savename'] =FCPATH."my-assets/image/qr/".$hotspotqr;
            if($this->ciqrcode->generate($params))
            {
                $hotspot_qrimg = $hotspotqr;
            }


             $data = array(
            'title'           => display('print_qrcode'),
            'qr_image'        => $localqr,
            'server_image'    => $server_qrimg,
            'hotspotqrimg'    => $hotspot_qrimg,
            'localhserver'    => $app_settingdata[0]['localhserver'],
            'onlineserver'    => $app_settingdata[0]['onlineserver'],
            'hotspot'         => $app_settingdata[0]['hotspot'],
            'id'              => $app_settingdata[0]['id'],
        ); 


        $content = $this->parser->parse('web_setting/app_setting', $data, true);

        $this->template->full_admin_html_view($content);
    }

    public function update_app_setting(){

        $id = $this->input->post('id',TRUE);
        $data  = array(
        'localhserver' => $this->input->post('localurl',true),
        'onlineserver' => $this->input->post('onlineurl',true),
        'hotspot'      => $this->input->post('hotspoturl',true),

        );
        if(!empty($this->input->post('localurl',TRUE)) || !empty($this->input->post('onlineurl',true)) || !empty($this->input->post('hotspoturl',true)))

     if(!empty($id)){
            $this->db->where('id',$id)
                     ->update('app_setting',$data);
                 }else{
                    $this->db->insert('app_setting',$data);
                 }

         $this->session->set_flashdata('message', 'Successfully Updated');
         redirect(base_url('Cweb_setting/app_setting'));          
    }

      //    =========== its for mail settings ===============
    public function mail_setting() {
        $data['title'] = display('mail_configuration');
        $data['mail_setting'] = $this->db->select('*')->from('email_config')->where('created_by', $this->session->userdata('user_id'))->get()->result();       
        $content = $this->parser->parse('web_setting/mail_setting', $data, true);
        $this->template->full_admin_html_view($content);
    }

//    ============ its for mail_config_update ============
    public function mail_config_update() {
        $protocol  = $this->input->post('protocol',true);
        $smtp_host = $this->input->post('smtp_host',true);
        $smtp_port = $this->input->post('smtp_port',true);
        $smtp_user = $this->input->post('smtp_user',true);
        $smtp_pass = $this->input->post('smtp_pass',true);
        $mailtype  = $this->input->post('mailtype',true);
        $invoice   = $this->input->post('isinvoice',true);
        $service   = $this->input->post('isservice',true);
        $quotation  = $this->input->post('isquotation',true);
        $isattachment  = $this->input->post('isattachment',true);
$userId = $this->session->userdata('user_id');
        $this->db->where('created_by', $userId);
        $count = $this->db->count_all_results('email_inbox');
        if ($count > 1) {
            $this->db->where('created_by', $userId);
            $this->db->delete('email_inbox');
        }
        $mail_data = array(
            'protocol' => $protocol,
            'smtp_host' => $smtp_host,
            'smtp_port' => $smtp_port,
            'smtp_user' => $smtp_user,
            'smtp_pass' => $smtp_pass,
            'mailtype'  => $mailtype,
            'isinvoice' => $invoice,
            'isservice' => $service,
            'isquotation'=>$quotation,
            'isattachment'=>$isattachment,
            'created_by'=>$this->session->userdata('user_id')
        );
         $mail_set = $this->db->select('*')->from('email_config ')->where('created_by',$this->session->userdata('user_id'))->get()->result_array();
      //   print_r($mail_set);die();
         if(empty($mail_set)){
               $this->db->insert('email_config',$mail_data);
         }else{
              $this->db->where('created_by',$this->session->userdata('user_id'))->update('email_config', $mail_data);
         }
       
        $this->session->set_userdata(array('message' => display('update_successfully')));
        redirect(base_url('Cweb_setting/mail_setting'));
    }


}
