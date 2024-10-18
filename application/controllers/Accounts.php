<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accounts extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		 $this->load->model('Web_settings');
		$this->db->query('SET SESSION sql_mode = ""');
		$this->load->model(array(
			'accounts_model','Web_settings'
		));	
    $this->load->library('laccounting');
    $this->auth->check_admin_auth();
	}


		public function C_O_A() 
	{ 
        $content = $this->laccounting->coa_form();
        $this->template->full_admin_html_view($content);
	}

public function treeview_form($id = null) {
    $date = $this->input->post("daterangepicker-field");
  $content = $this->laccounting->tableview_form($date);
        $this->template->full_admin_html_view($content);
  
}
   
   
public function expenseReport()
    {
      $CI = & get_instance();
      $CI->load->model('Accounts_model');

      $CI->load->model('Web_settings');

      $setting_detail = $CI->Web_settings->retrieve_setting_editdata();
      $currency_details = $CI->Web_settings->retrieve_setting_editdata();
      $expenses_data = $CI->accounts_model->view_expensedataReport();
      $getexpenses_data = $CI->accounts_model->get_expensedataReport();
    
      $data = array(
        'title' => 'Expense Report',
        'currency' => $currency_details[0]['currency'],
        'expense_data' => $expenses_data,
        'setting_detail' => $setting_detail,

        'getexpenseData' => $getexpenses_data
      );
      $content = $this->parser->parse('newaccount/expense_report', $data, true);
      $this->template->full_admin_html_view($content);
    }
    
    
    public function getexpenseDateresults()
    {
      $CI = & get_instance();
      $CI->load->model('Accounts_model');
      $date = $this->input->post("dateresults");
    
      $getexpense_data = $CI->accounts_model->getexpenseDateallResults($date);
    
      echo json_encode($getexpense_data);
    
    }








   

   public function salesReport()
    {
      $CI = & get_instance();
      $CI->load->model('Accounts_model');
      $CI->load->model('Web_settings');

      $setting_detail = $CI->Web_settings->retrieve_setting_editdata();

      $currency_details = $CI->Web_settings->retrieve_setting_editdata();
      $sales_data = $CI->accounts_model->view_salesdataReport();
      $getsales_data = $CI->accounts_model->get_salesdataReport();
    
      // print_r($getsales_data); die();
    
      $data = array(
        'title' => 'Sales Report',
        'currency' => $currency_details[0]['currency'],
        'sale_datas' => $sales_data,
        'get_salesdata' => $getsales_data,
        'setting_detail' => $setting_detail

      );
      $content = $this->parser->parse('newaccount/sale_report', $data, true);
      $this->template->full_admin_html_view($content);
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    public function getDateresults()
    {
      $CI = & get_instance();
      $CI->load->model('Accounts_model');
      $date = $this->input->post("dateresults");
    
      $getsales_data = $CI->accounts_model->getDateallResults($date);
    
      echo json_encode($getsales_data);
    
    }


        public function payable_ageing_details() {

  $CI = & get_instance();
        $this->load->model('Invoices');
          $this->load->model('Suppliers');
          
            $CI->load->model('Web_settings');

          $data['setting_detail']  = $CI->Web_settings->retrieve_setting_editdata();
          
          $vendor = $CI->Suppliers->suppliers_list();
              $data['vendor_data']=$vendor;
         $data['get_all_invoice_sale'] = $this->Suppliers->amountGetPurchase();
            //   $data['vendor_data']=$vendor;
       $data['supplier_name']= $this->Invoices->supplier_list();
    //    print_r($data['get_all_invoice_sale']);
        $content = $CI->parser->parse('report/payable_ageing', $data, true);
        $this->template->full_admin_html_view($content);

    }
    
    
    
public function account_receivable_ageing(){
    $CI = & get_instance();
        $this->load->model('Invoices');
          $this->load->model('Customers');
          $CI->load->model('Web_settings');

          $data['setting_detail']  = $CI->Web_settings->retrieve_setting_editdata();



         $data['customer_name'] = $this->Customers->all_customer();
        $data['get_all_invoice_sale']= $this->Invoices->get_all_invoice_sale();
      $content = $this->parser->parse('report/account_receivable_ageing', $data, true);
        $this->template->full_admin_html_view($content);

}






public function open_invoices_debt(){
     $CI = & get_instance();
        $this->load->model('Invoices');
            $this->load->model('Suppliers');

            $CI->load->model('Web_settings');

          $data['setting_detail']  = $CI->Web_settings->retrieve_setting_editdata();
          $vendor = $CI->Suppliers->suppliers_list();
              $data['vendor_data']=$vendor;
        $data['get_outstanding_inv']= $this->Invoices->open_invoices_exp();
 //print_r($data['vendor_data']);
      $content = $this->parser->parse('report/open_bills', $data, true);
        $this->template->full_admin_html_view($content);
    
}




public function open_invoices(){
    
      $CI = & get_instance();
        $this->load->model('Invoices');
          $this->load->model('Customers');
          $CI->load->model('Web_settings');

          $data['setting_detail']  = $CI->Web_settings->retrieve_setting_editdata();

         $data['customer_name'] = $this->Customers->all_customer();
        $data['get_outstanding_inv']= $this->Invoices->open_invoices_sales();
       $content = $this->parser->parse('report/open_invoices', $data, true);
        $this->template->full_admin_html_view($content);
}






public function account_receivable_ageing_summary(){
   $CI =& get_instance();
        $CI->load->model('Customers');
        $CI->load->model('Web_settings');
        $company_info = $CI->Customers->retrieve_company();
          $customer = $CI->Customers->customers_list();
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        
       $customerdataget = $CI->Customers->get_all_customers();

        
       $data['setting_detail']  = $CI->Web_settings->retrieve_setting_editdata();

        $data['total_customer']    = $CI->Customers->count_customer();
        $data['currency']          = $currency_details[0]['currency'];
        $data['title']             = display('manage_customer');
        $data['company_info']      = $company_info;
        $data['customer_data']=$customer;
        
        $data['getcust']=$customerdataget;

        
  
      $content = $this->parser->parse('report/account_receivable_ageing_summary', $data, true);
        $this->template->full_admin_html_view($content);

}
















public function account_payable_ageing_summary(){
 
        $CI =& get_instance();

        $CI->load->model('Suppliers');

        $CI->load->model('Web_settings');
  $vendor = $CI->Suppliers->suppliers_list();
  
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $data['currency']          = $currency_details[0]['currency'];
        $data['total_supplier']    = $CI->Suppliers->count_supplier();

       
        $data['vendor_data']=$vendor;
        
        $data['company_info']      = $CI->Suppliers->retrieve_company();


        $data['getsupplier']      = $CI->Suppliers->get_all_supplier();

        $data['setting_detail']  = $CI->Web_settings->retrieve_setting_editdata();

      
        
  
      $content = $this->parser->parse('report/payable_ageing_summary', $data, true);
        $this->template->full_admin_html_view($content);

}
    public function profit_loss(){
        
            $CI = & get_instance();
            $CI->load->model('Accounts_model');
            
                $CI->load->model('Web_settings');

            $setting_detail = $CI->Web_settings->retrieve_setting_editdata();
            
            $data['title'] = display('profit_loss_report');
          
            $date = $this->input->post("daterangepicker-field");
            $from_date           = (!empty($this->input->post('dtpFromDate'))?$this->input->post('dtpFromDate'):date('Y-m-d'));
             $to_date             = (!empty($this->input->post('dtpToDate'))?$this->input->post('dtpToDate'):date('Y-m-d'));
             $data['from_date']   = $from_date;
             $data['to_date']     = $to_date;

             $acc_data = $CI->accounts_model->get_closing_report($date);
             $acc_receivables_arec = $CI->accounts_model->get_receivables_arec2($date);
            
            $data = array(
                            'acc_cat'       => $acc_data,
                            'arec_trade'       => $acc_receivables_arec,
                                                       'dates'     => $date,
                                                         'from_date'   => $from_date,
                                                         'to_date'    =>  $to_date,
                                                                                                                  'setting_detail'    =>  $setting_detail     


                        );
            $content = $this->parser->parse('newaccount/profit_loss', $data, true);
           $this->template->full_admin_html_view($content);
    }



    public function profit_loss_comparison(){
        
        
                    $CI = & get_instance();
                    $CI->load->model('Accounts_model');
                    
                    $CI->load->model('Web_settings');

                    $setting_detail = $CI->Web_settings->retrieve_setting_editdata();
                    
                    $data['title'] = display('profit_loss_comparison');
                    $date = $this->input->post("daterangepicker-field");
                    $from_date           = (!empty($this->input->post('dtpFromDate'))?$this->input->post('dtpFromDate'):date('Y-m-d'));
                    $to_date             = (!empty($this->input->post('dtpToDate'))?$this->input->post('dtpToDate'):date('Y-m-d'));
                    $data['from_date']   = $from_date;
                    $data['to_date']     = $to_date;
                    $gtsa_info = $this->accounts_model->get_total_sale_amount($date);
                    $servicpro_info = $this->accounts_model->get_service_pro();
                    $data = array(
                         'gtsa_info'         => $gtsa_info,
                         'servicpro_info'    => $servicpro_info,
                                                       'dates'     => $date,
                                                         'from_date'   => $from_date,
                                                         'to_date'    =>  $to_date,
                                                                                                                  'setting_detail'    =>  $setting_detail     


                     );
 
                    $content = $this->parser->parse('newaccount/profit_loss_comparison', $data, true);
                    $this->template->full_admin_html_view($content);
    }


















     // tree view controller
    public function show_tree($id = null){
		   $content = $this->laccounting->treeview_form();
        $this->template->full_admin_html_view($content);
    }
    
    
    
    
    
    
    
    
    
    
    
    
   public function transaction_split(){
     $CI = & get_instance();
      $CI->load->model('Accounts_model');
      
            $setting_detail = $CI->Web_settings->retrieve_setting_editdata();

       $currency_details = $CI->Web_settings->retrieve_setting_editdata();
       $data['currency']=$currency_details[0]['currency'];
   $from_date           = (!empty($this->input->post('dtpFromDate'))?$this->input->post('dtpFromDate'):date('Y-m-d'));
      $to_date             = (!empty($this->input->post('dtpToDate'))?$this->input->post('dtpToDate'):date('Y-m-d'));

      $date = $this->input->post("daterangepicker-field");
        if($date) {
$split=explode(' to ',$date);
$start =  $split[0];
$end = $split[1];

$data=array(
'start'=>$start,
'end' => $end


);
}
      $data['sales']    =  $CI->Accounts_model->accounts_sale($date);
      $data['setting_detail']    =  $setting_detail;
       $data['expense']    =  $CI->Accounts_model->accounts_expense($date);
          $data['exp_serv']    =  $CI->Accounts_model->accounts_expense_service($date);
    $content = $this->parser->parse('newaccount/transaction_list_split', $data, true);
     $this->template->full_admin_html_view($content);
    }
   public function fin_yearlist(){
      $data['title'] = display('financial_year');
   
      $data['yearlist']   = $this->accounts_model->get_yearlist();   
      $data['page']   = "financial_year";   

           $content = $this->parser->parse('newaccount/financial_year', $data, true);
    $this->template->full_admin_html_view($content); 
    }
    
    
          public function financial_year_update(){
       $this->form_validation->set_rules('yearname', display('title')  ,'required|xss_clean|trim');
      $this->form_validation->set_rules('start_date',display('from_date'),'required|xss_clean|trim');
      $this->form_validation->set_rules('end_date',display('to_date'),'required|xss_clean|trim');
         $title = $this->input->post('yearname',TRUE);
        $start_date = $this->input->post('start_date',TRUE);
        $end_date = $this->input->post('end_date',TRUE);
        $date_time = date("Y-m-d H:i:s");
        $is_active = $this->input->post('status',TRUE);
        $create_by = $this->session->userdata('user_id');
        $postData = array(
          'title'       =>  $title,
          'start_date'       =>  $start_date,
          'end_date'      =>  $end_date,
          'date_time'      =>  $date_time,
          'is_active'       =>  $is_active,
          'create_by'  =>  $create_by,
        );
        $initial = $this->db->select('*')->from('tbl_financialyear')->get()->row();
        if($start_date > $end_date){
          $this->session->set_flashdata('exception',  "Invalid Date, End date must be greater than Start date");
        }
      
        
        else{   
          $deleteQuery = "DELETE FROM tbl_financialyear WHERE title = ?";
$this->db->query($deleteQuery, array($title));
          $this->db->insert('tbl_financialyear',$postData);
        //  echo $this->db->last_query();die();
          redirect('accounts/financial_manager'); // Correct placement of redirect

   
        }
  
      $data['yearlist']   = $this->accounts_model->get_yearlist();  
               $data['title'] = display('financial_year');

           $content = $this->parser->parse('newaccount/financial_year', $data, true);
    $this->template->full_admin_html_view($content); 
    }

    
    
    
    
    
      public function financial_year_create(){
       $this->form_validation->set_rules('yearname', display('title')  ,'required|xss_clean|trim');
      $this->form_validation->set_rules('start_date',display('from_date'),'required|xss_clean|trim');
      $this->form_validation->set_rules('end_date',display('to_date'),'required|xss_clean|trim');
         $title = $this->input->post('yearname',TRUE);
        $start_date = $this->input->post('start_date',TRUE);
        $end_date = $this->input->post('end_date',TRUE);
        $date_time = date("Y-m-d H:i:s");
        $is_active = $this->input->post('status',TRUE);
        $create_by = $this->session->userdata('user_id');
        $postData = array(
          'title'       =>  $title,
          'start_date'       =>  $start_date,
          'end_date'      =>  $end_date,
          'date_time'      =>  $date_time,
          'is_active'       =>  $is_active,
          'create_by'  =>  $create_by,
        );
        $initial = $this->db->select('*')->from('tbl_financialyear')->get()->row();
        if($start_date > $end_date){
          $this->session->set_flashdata('exception',  "Invalid Date, End date must be greater than Start date");
        }
      
        
        else{   
          
          $this->db->insert('tbl_financialyear',$postData);
        //  echo $this->db->last_query();die();
          redirect('accounts/financial_manager'); // Correct placement of redirect

   
        }
  
      $data['yearlist']   = $this->accounts_model->get_yearlist();  
               $data['title'] = display('financial_year');

           $content = $this->parser->parse('newaccount/financial_year', $data, true);
    $this->template->full_admin_html_view($content); 
    }

    
    
    
    
    
    
    public function financial_manager(){
               $CI = & get_instance();
               $CI->load->model('Web_settings');
               $data['yearlist']   = $this->accounts_model->get_yearlist();  
               $data['title'] = display('financial_year');
               $data['setting_detail']  = $CI->Web_settings->retrieve_setting_editdata();

               $content = $this->parser->parse('newaccount/financial_manager', $data, true);
               $this->template->full_admin_html_view($content); 
    }




    // public function financial_edit($id){
    //   $CI = & get_instance();
    //   $CI->load->model('Web_settings');
 
    //   $setting_detail  = $CI->Web_settings->retrieve_setting_editdata();
    //   $fin_edit  = $CI->accounts_model->fin_edit($id);

    //   $data=array(
    //     'financialdata'    => $fin_edit,
    //     'setting_detail'    => $setting_detail,
    //   );
 
    //   $content = $this->parser->parse('newaccount/financial_edit', $data, true);
    // $this->template->full_admin_html_view($content); 
    // }




     public function financial_year(){
      $CI = & get_instance();

      $CI->load->model('Web_settings');
      $data['yearlist']   = $this->accounts_model->get_yearlist();  
               $data['title'] = display('financial_year');
               $data['setting_detail']  = $CI->Web_settings->retrieve_setting_editdata();

           $content = $this->parser->parse('newaccount/financial_year', $data, true);
    $this->template->full_admin_html_view($content); 
    }



















 
    public function financial_edit($id){
      $CI = & get_instance();
      $CI->load->model('Web_settings');
 
       $setting_detail  = $CI->Web_settings->retrieve_setting_editdata();
       $fin_edit  = $CI->accounts_model->fin_edit($id);

      $data=array(
        'financialdata'    => $fin_edit,
        'setting_detail'    => $setting_detail,
      );
 
      $content = $this->parser->parse('newaccount/financial_edit', $data, true);
    $this->template->full_admin_html_view($content); 
    }








    public function finyear_delete($id){
     // $this->permission->method('accounts','delete')->redirect();
      $fin_id = $this->db->select("fiyear_id")->from("tbl_financialyear")->where("start_date<=",date("Y-m-d"))->where("end_date>=",date("Y-m-d"))->where("fiyear_id", $id)->get()->row();
   //  print_r($fin_id);
      if(empty($fin_id)){
        // echo $id;die();
        $this->session->set_flashdata('exception',  "You can not delete current financial year");
        redirect($_SERVER['HTTP_REFERER']);
      }
      $delete = $this->db->where("fiyear_id", $id)->delete("tbl_financialyear");
    //  echo $id;
    //  echo $this->db->last_query();die();
      if($delete){
        $this->session->set_flashdata('message', "Deleted Successfully");
        redirect($_SERVER['HTTP_REFERER']);
      }else{
        $this->session->set_flashdata('exception',  display('please_try_again'));
        redirect($_SERVER['HTTP_REFERER']);
      }

    }
    public function finyear_update(){
      $id = $this->input->post('id',TRUE);
      $title = $this->input->post('title',TRUE);
      $start = $this->input->post('start',TRUE);
      $end = $this->input->post('end',TRUE);
      $status = $this->input->post('status',TRUE);
      $postData = array(
        'title'       =>  $title,
        'start_date'       =>  $start,
        'end_date'      =>  $end,
        'is_active'       =>  $status,
        'create_by'  =>  $this->session->userdata('id'),
      );
      $initial = $this->db->select('*')->from('tbl_financialyear')->where("fiyear_id!=",$id)->get()->row();
      $start_date = $this->db->select('start_date')->from('tbl_financialyear')->where("fiyear_id=",$id)->get()->row();
      $yearinfo = $this->db->select('*')->from('tbl_financialyear')->where('end_date>=',$start)->where("fiyear_id!=",$id)->get()->row();
      if($start > $end){
      echo "1";
        $this->session->set_flashdata('exception',  "Invalid Date, End date must be greater than Start date");
      }
      else if(empty($initial) & $start<$start_date->start_date){ echo "2";
        $this->session->set_flashdata('exception',  "Invalid Date, Start date must be greater than Previous date");
      }
      else if(!empty($yearinfo)){ echo "3";
        $this->session->set_flashdata('exception',  "Invalid Date, Start date must be greater than Previous Financial year date");
      }else{ echo "4";
        $update = $this->db->where("fiyear_id", $id)->update("tbl_financialyear",$postData);
       // echo $this->db->last_query();
        if($update){
          $this->session->set_flashdata('message', "Updated Successfully");
        }else{
          $this->session->set_flashdata('exception',  display('please_try_again'));
        } 
      }
    }
    // public function financial_edit($id){
    //   $CI = & get_instance();
    //   $CI->load->model('Web_settings');
    //   $setting_detail  = $CI->Web_settings->retrieve_setting_editdata();
    //   $fin_edit  = $CI->accounts_model->fin_edit($id);
    //   $data=array(
    //     'financialdata'    => $fin_edit,
    //     'setting_detail'    => $setting_detail,
    //   );
    //   $content = $this->parser->parse('newaccount/financial_edit', $data, true);
    // $this->template->full_admin_html_view($content);
    // }
    public function financial_year_end(){
      $data['title'] = display('financial_year_end');
    
   $content = $this->parser->parse('newaccount/endfinancial_year', $data, true);
    $this->template->full_admin_html_view($content); 
    }
    public function finyear_end(){
      $status = $this->input->post('status',TRUE);
      $postData = array(
        'is_active'       =>  $status,
        'create_by'  =>  $this->session->userdata('id'),
      );
      $year_end = $this->db->select("fiyear_id")->from('tbl_financialyear')->where("end_date=",date("Y-m-d"))->where("is_active=",2)->get()->row();
      $next_year = $this->db->select("fiyear_id")->from('tbl_financialyear')->where("start_date>=",date('Y-m-d', strtotime(' +1 day')))->where("is_active=",2)->get()->row();
      if(empty($year_end)){
        $this->session->set_flashdata('exception',  "You can end financial year only the last date of financial year");
      }
      else if(empty($next_year)){
        $this->session->set_flashdata('exception',  "You did not set next financial year");
      }else{
        $update = $this->db->where("fiyear_id", $year_end->fiyear_id)->update("tbl_financialyear",$postData);
        if($update){
          $old_year = $this->db->select("*")->from("tbl_openingbalance")->where("fiyear_id", $year_end->fiyear_id)->get()->result();
          foreach($old_year as $key => $value){
            $acc_head = $value->headcode;
            $head_type = $this->db->select("HeadType")->from("acc_coa")->where("HeadCode", $acc_head)->where('IsActive',1)->get()->row();
            $cb=0;
            if(substr($acc_head,0,1)!=2 & ($head_type->HeadType=="A" | $head_type->HeadType=="L")){
              $cb = $value->current_balance;
            }
            $data = array(
              'fiyear_id' => $next_year->fiyear_id,
              'opening_balance' => !empty($value->current_balance)?$value->current_balance:0,
              'current_balance' => !empty($cb)?$cb:0,
              'headcode' => $value->headcode,
              'remark' => "Auto inserted while year end",
            );
            $this->db->insert("tbl_openingbalance", $data);
          }
          $this->session->set_flashdata('message', display('save_successfully'));
        }else{
          $this->session->set_flashdata('exception',  display('please_try_again'));
        } 
      }
    }

  public function selectedform($id){
        $CI = & get_instance();
        $CI->load->model('Accounts_model');
		   $role_reult = $CI->Accounts_model->treeview_selectform($id);
					$baseurl = base_url().'accounts/insert_coa';


		if ($role_reult){
			$html = "";
			$html .= form_open_multipart('accounts/insert_coa','id="form"');
      $html .= "<div id=\"newData\">
   <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"5\">
      <tr>
        <td>Head Code</td>
        <td><input type=\"text\" name=\"txtHeadCode\" id=\"txtHeadCode\" class=\"form_input\"  value=\"".$role_reult->HeadCode."\" readonly=\"readonly\"/></td>
      </tr>
      <tr>
        <td>Head Name</td>
        <td><input type=\"text\" name=\"txtHeadName\" id=\"txtHeadName\" class=\"form_input\" value=\"".$role_reult->HeadName."\"/>
<input type=\"hidden\" name=\"HeadName\" id=\"HeadName\" class=\"form_input\" value=\"".$role_reult->HeadName."\"/>
        </td>
      </tr>
      <tr>
        <td>Parent Head</td>
        <td><input type=\"text\" name=\"txtPHead\" id=\"txtPHead\" class=\"form_input\" readonly=\"readonly\" value=\"".$role_reult->PHeadName."\"/></td>
      </tr>
      <tr>

        <td>Head Level</td>
        <td><input type=\"text\" name=\"txtHeadLevel\" id=\"txtHeadLevel\" class=\"form_input\" readonly=\"readonly\" value=\"".$role_reult->HeadLevel."\"/></td>
      </tr>
       <tr>
        <td>Head Type</td>
        <td><input type=\"text\" name=\"txtHeadType\" id=\"txtHeadType\" class=\"form_input\" readonly=\"readonly\" value=\"".$role_reult->HeadType."\"/></td>
      </tr>

       <tr>
         <td>&nbsp;</td>
         <td><input type=\"checkbox\" name=\"IsTransaction\" value=\"1\" id=\"IsTransaction\" size=\"28\"  onchange=\"IsTransaction_change()\"";
         if($role_reult->IsTransaction==1){ $html .="checked";}
          $html .= "/><label for=\"IsTransaction\"> IsTransaction</label>
         <input type=\"checkbox\" value=\"1\" name=\"IsActive\" id=\"IsActive\" size=\"28\"";
          if($role_reult->IsActive==1){ $html .="checked";}
          $html .= "/><label for=\"IsActive\"> IsActive</label>
         <input type=\"checkbox\" value=\"1\" name=\"IsGL\" id=\"IsGL\" size=\"28\" onchange=\"IsGL_change();\"";
         if($role_reult->IsGL==1){ $html .="checked";}
          $html .= "/><label for=\"IsGL\"> IsGL</label>

        </td>";
      $html .= "</tr>
       <tr>
                    <td>&nbsp;</td>
                    <td>";
                     $html .="<input type=\"button\" name=\"btnNew\" id=\"btnNew\" value=\"New\" onClick=\"newHeaddata(".$role_reult->HeadCode.")\" />
                      <input type=\"submit\" name=\"btnSave\" id=\"btnSave\" value=\"Save\" disabled=\"disabled\"/>";
                     
          $html .=" <input type=\"submit\" name=\"btnUpdate\" id=\"btnUpdate\" value=\"Update\" />";
    $html .= "</tr></table>
 </form>
			";
		}

		echo json_encode($html);
	}

  public function newform($id){

    $newdata = $this->db->select('*')
            ->from('acc_coa')
            ->where('HeadCode',$id)
            ->get()
            ->row();

           
  $newidsinfo = $this->db->select('*,count(HeadCode) as hc')
            ->from('acc_coa')
            ->where('PHeadName',$newdata->HeadName)
            ->get()
            ->row();

$nid  = $newidsinfo->hc;
$n =$nid + 1;
if ($n / 10 < 1)
  $HeadCode = $id . "0" . $n;
else
  $HeadCode = $id . $n;

  $info['headcode'] =  $HeadCode;
  $info['rowdata'] =  $newdata;
  $info['headlabel'] =  $newdata->HeadLevel+1;
    echo json_encode($info);
  }

  public function insert_coa(){
    $headcode    = $this->input->post('txtHeadCode',TRUE);
    $HeadName    = $this->input->post('txtHeadName',TRUE);
    $PHeadName   = $this->input->post('txtPHead',TRUE);
    $HeadLevel   = $this->input->post('txtHeadLevel',TRUE);
    $txtHeadType = $this->input->post('txtHeadType',TRUE);
    $isact       = $this->input->post('IsActive',TRUE);
    $IsActive    = (!empty($isact)?$isact:0);
    $trns        = $this->input->post('IsTransaction',TRUE);
    $IsTransaction = (!empty($trns)?$trns:0);
    $isgl        = $this->input->post('IsGL',TRUE);
     $IsGL       = (!empty($isgl)?$isgl:0);
    $createby=$this->session->userdata('user_id');
    $createdate=date('Y-m-d H:i:s');
       $postData = array(
      'HeadCode'       =>  $headcode,
      'HeadName'       =>  $HeadName,
      'PHeadName'      =>  $PHeadName,
      'HeadLevel'      =>  $HeadLevel,
      'IsActive'       =>  $IsActive,
      'IsTransaction'  =>  $IsTransaction,
      'IsGL'           =>  $IsGL,
      'HeadType'       => $txtHeadType,
      'IsBudget'       => 0,
      'CreateBy'       => $createby,
      'CreateDate'     => $createdate,
    ); 
 $upinfo = $this->db->select('*')
            ->from('acc_coa')
            ->where('HeadCode',$headcode)
            ->get()
            ->row();
            if(empty($upinfo)){
  $this->db->insert('acc_coa',$postData);
}else{

$hname =$this->input->post('HeadName',TRUE);
$updata = array(
'PHeadName'      =>  $HeadName,
);

            
  $this->db->where('HeadCode',$headcode)
      ->update('acc_coa',$postData);
  $this->db->where('PHeadName',$hname)
      ->update('acc_coa',$updata);
}
    redirect($_SERVER['HTTP_REFERER']);
  }



  
  
   public function debit_voucher(){
    $CI = & get_instance();
     $CI->load->model('Web_settings');
      
    $data['title'] = display('credit_voucher');
    $data['acc'] = $this->accounts_model->Transacc();
       $data['bank_list'] = $this->Web_settings->bank_list();
       
           $currency_details = $CI->Web_settings->retrieve_setting_editdata();
           	     $data['currency'] = $currency_details[0]['currency'];
    $data['voucher_no'] = $this->accounts_model->dbVno();
    $data['crcc'] = $this->accounts_model->Transacc();

    $content = $this->parser->parse('newaccount/debit_voucher', $data, true);
    $this->template->full_admin_html_view($content);  
  }
  
  
  
  
  
  public function debit_manager(){
     $CI = & get_instance();
     $CI->load->model('Web_settings');
     $data['title'] = display('debit_voucher');
          $data['crv'] = $this->accounts_model->dbtv_data();
    $content = $this->parser->parse('newaccount/debit_manager', $data, true);
    $this->template->full_admin_html_view($content); 
}


// public function debit_edit(){
//   $CI = & get_instance();
//   $CI->load->model('Web_settings');
//   $data['title'] = display('debit_voucher');
    
//  $content = $this->parser->parse('newaccount/debit_edit', $data, true);
//  $this->template->full_admin_html_view($content); 
// }


  
  public function debit_edit($uniq_id){
    
      $CI = & get_instance();
     $CI->load->model('Web_settings');
           $currency_details = $CI->Web_settings->retrieve_setting_editdata();
    $data['title'] = display('journal_voucher');
    $data['acc'] = $this->accounts_model->edit_debit_voucher_data_passing($uniq_id);
       $data['bank_list'] = $this->Web_settings->bank_list();
       $data['currency']        = $currency_details[0]['currency'];
     $data['ac_detail'] = $this->accounts_model->Transacc();
    $content = $this->parser->parse('newaccount/debit_edit', $data, true);
    $this->template->full_admin_html_view($content);   
    
}
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  

  // cash adjustment
  public function cash_adjustment(){
      $CI = & get_instance();
     $CI->load->model('Web_settings');
           $currency_details = $CI->Web_settings->retrieve_setting_editdata();
          $data['currency']   = $currency_details[0]['currency'];
    $data['title']      = display('cash_adjustment');
    $data['voucher_no'] = $this->accounts_model->Cashvoucher();
    $content = $this->parser->parse('newaccount/cash_adjustment', $data, true);
    $this->template->full_admin_html_view($content); 
  }





  public function cash_adjustment_manager(){
 
    $data['title'] = display('cash_adjustment');

$content = $this->parser->parse('newaccount/cash_adjustment_manager', $data, true);
$this->template->full_admin_html_view($content); 
}


public function cash_adjustment_edit(){

    $data['title'] = display('cash_adjustment');

$content = $this->parser->parse('newaccount/cash_adjustment_edit', $data, true);
$this->template->full_admin_html_view($content); 
}



























    //Create Cash Adjustment
 public function create_cash_adjustment(){
    $this->form_validation->set_rules('txtAmount', display('amount')  ,'max_length[100]');
         if ($this->form_validation->run()) { 
        if ($this->accounts_model->insert_cashadjustment()) { 
          $this->session->set_flashdata('message', display('save_successfully'));
          redirect('accounts/cash_adjustment/');
        }else{
          $this->session->set_flashdata('error_message',  display('please_try_again'));
        }
        redirect("accounts/cash_adjustment");
    }else{
      $this->session->set_flashdata('error_message',  display('please_try_again'));
      redirect("accounts/cash_adjustment");
     }

}

   // Debit voucher code select onchange
  public function debtvouchercode($id){

    $debitvcode = $this->db->select('*')
            ->from('acc_coa')
            ->where('HeadCode',$id)
            ->get()
            ->row();
      $code = $debitvcode->HeadCode;       
echo json_encode($code);

   }
   //Supplier code 
    public function supplier_headcode($id){
$supplier_info = $this->db->select('supplier_id')->from('supplier_information')->where('supplier_id',$id)->get()->row();
$code =$supplier_info->supplier_id;
   
echo json_encode($code);

   }
   //Create Debit Voucher
 public function create_debit_voucher(){
    $this->form_validation->set_rules('cmbDebit', display('cmbDebit')  ,'max_length[100]');
         if ($this->form_validation->run()) { 
        if ($this->accounts_model->insert_debitvoucher()) { 
          $this->session->set_flashdata('message', display('save_successfully'));
          redirect('accounts/debit_voucher/');
        }else{
          $this->session->set_flashdata('error_message',  display('please_try_again'));
        }
        redirect("accounts/debit_voucher");
    }else{
      $this->session->set_flashdata('error_message',  display('please_try_again'));
      redirect("accounts/debit_voucher");
     }

}

 //Credit voucher 
 public function credit_voucher(){
    $CI = & get_instance();
     $CI->load->model('Web_settings');
      
    $data['title'] = display('credit_voucher');
    $data['acc'] = $this->accounts_model->Transacc();
       $data['bank_list'] = $this->Web_settings->bank_list();
       
           $currency_details = $CI->Web_settings->retrieve_setting_editdata();
           	     $data['currency'] = $currency_details[0]['currency'];
    $data['voucher_no'] = $this->accounts_model->crVno();
    $data['crcc'] = $this->accounts_model->Cracc();
    $content = $this->parser->parse('newaccount/credit_voucher', $data, true);
    $this->template->full_admin_html_view($content);  
  }



  public function credit_voucher_manager(){
 
    $CI = & get_instance();
     $CI->load->model('Web_settings');
    $data['crv'] = $this->accounts_model->crv_data();

$content = $this->parser->parse('newaccount/credit_voucher_manager', $data, true);
$this->template->full_admin_html_view($content); 
}


// public function credit_voucher_edit(){

//     $data['title'] = display('credit_voucher');

// $content = $this->parser->parse('newaccount/credit_voucher_edit', $data, true);
// $this->template->full_admin_html_view($content); 
// }




























   //Create Credit Voucher
 public function create_credit_voucher(){
    $this->form_validation->set_rules('cmbDebit', display('cmbDebit')  ,'max_length[100]');
         if ($this->form_validation->run()) { 
        if ($this->accounts_model->insert_creditvoucher()) { 
          $this->session->set_flashdata('message', display('save_successfully'));
          redirect('accounts/credit_voucher/');
        }else{
          $this->session->set_flashdata('error_message',  display('please_try_again'));
        }
        redirect("accounts/credit_voucher");
    }else{
      $this->session->set_flashdata('error_message',  display('please_try_again'));
      redirect("accounts/credit_voucher");
     }

}
 // Contra Voucher form
 public function contra_voucher(){
    $CI = & get_instance();
     $CI->load->model('Web_settings');
           $currency_details = $CI->Web_settings->retrieve_setting_editdata();
    $data['title'] = display('contra_voucher');
    $data['acc'] = $this->accounts_model->Transacc();

       $data['currency']        = $currency_details[0]['currency'];
    $data['voucher_no'] = $this->accounts_model->contra();
    $content = $this->parser->parse('newaccount/contra_voucher', $data, true);
    $this->template->full_admin_html_view($content);
  }
  
  
  
  
  public function contra_voucher_manager(){
 
   $data['title'] = display('journal_voucher');
    $data['cv'] = $this->accounts_model->cv_data();
//print_r($data['cv']);

$content = $this->parser->parse('newaccount/contra_voucher_manager', $data, true);
$this->template->full_admin_html_view($content); 
}


public function contra_voucher_edit(){

    $data['title'] = display('contra_voucher');

$content = $this->parser->parse('newaccount/contra_voucher_edit', $data, true);
$this->template->full_admin_html_view($content); 
}

  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  

   //Create Contra Voucher
 public function create_contra_voucher(){
    $this->form_validation->set_rules('cmbDebit', display('cmbDebit')  ,'max_length[100]');
         if ($this->form_validation->run()) { 
        if ($this->accounts_model->insert_contravoucher()) { 
          $this->session->set_flashdata('message', display('save_successfully'));
          redirect('accounts/contra_voucher/');
        }else{
          $this->session->set_flashdata('error_message',  display('please_try_again'));
        }
        redirect("accounts/contra_voucher");
    }else{
      $this->session->set_flashdata('error_message',  display('please_try_again'));
      redirect("accounts/contra_voucher");
     }

}
public function get_bank_name(){
    
     $postData = $this->input->post('ac_name');
       $bank_name = $this->db->select('*')->from('bank_add')->where("ac_name",$postData)->get()->result_array();
       $data=array(
           'bnk_name' =>$bank_name
           );
           echo json_encode($data);
}
 // Journal voucher
 public function journal_voucher(){
   $CI = & get_instance();
     $CI->load->model('Web_settings');
           $currency_details = $CI->Web_settings->retrieve_setting_editdata();
    $data['title'] = display('journal_voucher');
    $data['acc'] = $this->accounts_model->Transacc();
       $data['currency']        = $currency_details[0]['currency'];
    $data['voucher_no'] = $this->accounts_model->journal();
  //  print_r( $data['voucher_no']);
    $content = $this->parser->parse('newaccount/journal_voucher', $data, true);
    $this->template->full_admin_html_view($content); 
  }

public function edit_jv($uniq_id){
     $CI = & get_instance();
     $CI->load->model('Web_settings');
           $currency_details = $CI->Web_settings->retrieve_setting_editdata();
    $data['title'] = display('journal_voucher');
    $data['acc'] = $this->accounts_model->edit_jv_data_passing($uniq_id);
       $data['currency']        = $currency_details[0]['currency'];
     $data['ac_detail'] = $this->accounts_model->Transacc();
    $content = $this->parser->parse('newaccount/journal_voucher_edit', $data, true);
    $this->template->full_admin_html_view($content);   
    
}
public function edit_cv($uniq_id){
     $CI = & get_instance();
     $CI->load->model('Web_settings');
           $currency_details = $CI->Web_settings->retrieve_setting_editdata();
    $data['title'] = display('journal_voucher');
    $data['acc'] = $this->accounts_model->edit_cv_data_passing($uniq_id);
       $data['currency']        = $currency_details[0]['currency'];
     $data['ac_detail'] = $this->accounts_model->Transacc();
    $content = $this->parser->parse('newaccount/contra_voucher_edit', $data, true);
    $this->template->full_admin_html_view($content);   
    
}
public function edit_credit_voucher($uniq_id){
    
      $CI = & get_instance();
     $CI->load->model('Web_settings');
           $currency_details = $CI->Web_settings->retrieve_setting_editdata();
    $data['title'] = display('journal_voucher');
    $data['acc'] = $this->accounts_model->edit_credit_voucher_data_passing($uniq_id);
       $data['currency']        = $currency_details[0]['currency'];
     $data['ac_detail'] = $this->accounts_model->Transacc();
    $content = $this->parser->parse('newaccount/credit_voucher_edit', $data, true);
    $this->template->full_admin_html_view($content);   
    
}
public function edit_journal_voucher(){
    
      $this->form_validation->set_rules('cmbDebit', display('cmbDebit')  ,'max_length[100]');
         $auto_increment = $this->input->post('uniq_id', TRUE);
         if ($this->form_validation->run()) { 
        if ($this->accounts_model->edit_jv()) { 
           
          $this->session->set_flashdata('message', display('save_successfully'));
          redirect('accounts/edit_jv/'.$auto_increment);
        }else{
          $this->session->set_flashdata('error_message',  display('please_try_again'));
        }
         redirect('accounts/edit_jv/'.$auto_increment);
    }else{
      $this->session->set_flashdata('error_message',  display('please_try_again'));
     redirect('accounts/edit_jv/'.$auto_increment);
     }

    
}
public function edit_contra_voucher(){
    
      $this->form_validation->set_rules('cmbDebit', display('cmbDebit')  ,'max_length[100]');
         $auto_increment = $this->input->post('uniq_id', TRUE);
         if ($this->form_validation->run()) { 
        if ($this->accounts_model->edit_cv()) { 
           
          $this->session->set_flashdata('message', display('save_successfully'));
          redirect('accounts/edit_cv/'.$auto_increment);
        }else{
          $this->session->set_flashdata('error_message',  display('please_try_again'));
        }
         redirect('accounts/edit_cv/'.$auto_increment);
    }else{
      $this->session->set_flashdata('error_message',  display('please_try_again'));
     redirect('accounts/edit_cv/'.$auto_increment);
     }

    
}
  public function journal_voucher_manager(){
 
    $data['title'] = display('journal_voucher');
    $data['jv'] = $this->accounts_model->jv_data();

$content = $this->parser->parse('newaccount/journal_voucher_manager', $data, true);
$this->template->full_admin_html_view($content); 
}


// public function journal_voucher_edit(){

//     $data['title'] = display('journal_voucher');

// $content = $this->parser->parse('newaccount/journal_voucher_edit', $data, true);
// $this->template->full_admin_html_view($content); 
// }






























    //Create Journal Voucher
 public function create_journal_voucher(){
    $this->form_validation->set_rules('cmbDebit', display('cmbDebit')  ,'max_length[100]');
         if ($this->form_validation->run()) { 
        if ($this->accounts_model->insert_journalvoucher()) { 
          $this->session->set_flashdata('message', display('save_successfully'));
          redirect('accounts/journal_voucher/');
        }else{
          $this->session->set_flashdata('error_message',  display('please_try_again'));
        }
        redirect("accounts/journal_voucher");
    }else{
      $this->session->set_flashdata('error_message',  display('please_try_again'));
      redirect("accounts/journal_voucher");
     }

}

public function update_journal_voucher(){
    $this->form_validation->set_rules('cmbDebit', display('cmbDebit')  ,'max_length[100]');
         if ($this->form_validation->run()) { 
        if ($this->accounts_model->update_journalvoucher()) { 
          $this->session->set_flashdata('message', display('successfully_updated'));
          redirect('accounts/aprove_v');
        }else{
          $this->session->set_flashdata('error_message',  display('please_try_again'));
        }
        redirect("accounts/aprove_v");
    }else{
      $this->session->set_flashdata('error_message',  display('please_try_again'));
      redirect("accounts/aprove_v");
     }

}
public function edit_contra($uniq_id){
     $CI = & get_instance();
     $CI->load->model('Web_settings');
           $currency_details = $CI->Web_settings->retrieve_setting_editdata();
    $data['title'] = display('journal_voucher');
    $data['acc'] = $this->accounts_model->edit_cv_data_passing($uniq_id);
       $data['currency']        = $currency_details[0]['currency'];
     $data['ac_detail'] = $this->accounts_model->Transacc();
    $content = $this->parser->parse('newaccount/journal_voucher_edit', $data, true);
    $this->template->full_admin_html_view($content);   
    
}
public function update_contra_voucher($uniq_id){
      $this->form_validation->set_rules('cmbDebit', display('cmbDebit')  ,'max_length[100]');
         $auto_increment = $this->input->post('uniq_id', TRUE);
         if ($this->form_validation->run()) { 
        if ($this->accounts_model->contra_voucher_edit()) { 
           
          $this->session->set_flashdata('message', display('save_successfully'));
          redirect('accounts/contra_voucher_edit/'.$auto_increment);
        }else{
          $this->session->set_flashdata('error_message',  display('please_try_again'));
        }
         redirect('accounts/contra_voucher_edit/'.$auto_increment);
    }else{
      $this->session->set_flashdata('error_message',  display('please_try_again'));
     redirect('accounts/contra_voucher_edit/'.$auto_increment);
     }

}
 //Aprove voucher
  public function aprove_v(){
    $CI = & get_instance();
     $CI->load->model('Web_settings');
           $currency_details = $CI->Web_settings->retrieve_setting_editdata();
    $data['title'] = display('voucher_approve');
     $data['currency']        = $currency_details[0]['currency'];
    $data['aprrove'] = $this->accounts_model->approve_voucher();  
    $content = $this->parser->parse('newaccount/voucher_approve', $data, true);
    $this->template->full_admin_html_view($content); 
}
 // isApprove
 public function isactive($id = null, $action = null)
  {
    $action = ($action=='active'?1:0);
    $postData = array(
      'VNo'     => $id,
      'IsAppove' => $action
    );

    if ($this->accounts_model->approved($postData)) {
      $this->session->set_flashdata('message', display('successfully_approved'));
    } else {
      $this->session->set_flashdata('error_message', display('please_try_again'));
    }

    redirect($_SERVER['HTTP_REFERER']);
  }

  public function voucher_delete($voucher){
     if ($this->accounts_model->delete_voucher($voucher)) {
      $this->session->set_flashdata('message', display('successfully_delete'));
    } else {
      $this->session->set_flashdata('error_message', display('please_try_again'));
    }

    redirect($_SERVER['HTTP_REFERER']);

  }

   //Update voucher 
  public function voucher_update($id= null){
    $vtype =$this->db->select('*')
                    ->from('acc_transaction')
                    ->where('VNo',$id)
                    ->get()
                    ->result_array();
                   
                    if($vtype[0]['Vtype'] =="DV"){
    $data['title'] = display('update_debit_voucher');
    $data['dbvoucher_info'] = $this->accounts_model->dbvoucher_updata($id);
    $data['credit_info'] = $this->accounts_model->crvoucher_updata($id);
    $page =  'newaccount/update_dbt_crtvoucher';    
    } 

     if($vtype[0]['Vtype'] =="JV"){
    $data['title'] = 'Update'.' '.display('journal_voucher');
    $data['acc'] = $this->accounts_model->Transacc();
    $data['voucher_info'] = $this->accounts_model->journal_updata($id);
    $page =  'newaccount/update_journal_voucher';    
    } 


     if($vtype[0]['Vtype'] =="Contra"){
    $data['title'] = 'Update'.' '.display('contra_voucher');
    $data['acc'] = $this->accounts_model->Transacc();
    $data['voucher_info'] = $this->accounts_model->journal_updata($id);
    $page =  'newaccount/update_contra_voucher';    
    } 

    if($vtype[0]['Vtype'] =="CV"){
    $data['title'] = display('update_credit_voucher');
    $data['crvoucher_info'] = $this->accounts_model->crdtvoucher_updata($id);
    $data['debit_info'] = $this->accounts_model->debitvoucher_updata($id);
    $page =  'newaccount/update_credit_bdtvoucher';  
    }
    $data['crcc'] = $this->accounts_model->Cracc();
    $data['acc'] = $this->accounts_model->Transacc();
     $content = $this->parser->parse($page, $data, true);
    $this->template->full_admin_html_view($content); 
  }
  // update credit voucher 
  public function update_credit_voucher(){
        $auto_increment = $this->input->post('uniq_id', TRUE);
    $this->form_validation->set_rules('cmbDebit', display('cmbDebit')  ,'max_length[100]');
         if ($this->form_validation->run()) { 
        if ($this->accounts_model->update_creditvoucher()) { 
          $this->session->set_flashdata('message', display('save_successfully'));
          redirect('accounts/edit_credit_voucher/'.$auto_increment);
        }else{
          $this->session->set_flashdata('error_message',  display('please_try_again'));
        }
       redirect('accounts/edit_credit_voucher/'.$auto_increment);
    }else{
      $this->session->set_flashdata('error_message',  display('please_try_again'));
     redirect('accounts/edit_credit_voucher/'.$auto_increment);
     }

}
  public function update_debit_voucher(){
        $auto_increment = $this->input->post('uniq_id', TRUE);
    $this->form_validation->set_rules('cmbDebit', display('cmbDebit')  ,'max_length[100]');
         if ($this->form_validation->run()) { 
        if ($this->accounts_model->update_debitvoucher()) { 
          $this->session->set_flashdata('message', display('save_successfully'));
          redirect('accounts/debit_edit/'.$auto_increment);
        }else{
          $this->session->set_flashdata('error_message',  display('please_try_again'));
        }
       redirect('accounts/debit_edit/'.$auto_increment);
    }else{
      $this->session->set_flashdata('error_message',  display('please_try_again'));
     redirect('accounts/debit_edit/'.$auto_increment);
     }

}
  //Trial Balance Report New
  public function trail_balance_reports()
  {

    $CI = & get_instance();

    $CI->load->model('Accounts_model');

    $date = $this->input->post("daterangepicker-field"); 
    
    $currency_details = $CI->Web_settings->retrieve_setting_editdata();

    $sale_trial_balances = $this->Accounts_model->trial_balance_credit($date);

    $expense_trial_balances = $this->Accounts_model->trial_balance_debit($date);
    
    $serviceprovider_trial_balances = $this->Accounts_model->trial_balance_serviceprovider($date);
    $setting_detail = $CI->Web_settings->retrieve_setting_editdata();

    $data = array(
      'title' => 'trial_balance_report',
      'date' => $date,
      'currency'  =>$currency_details[0]['currency'],
      'sale_trial_balances' => $sale_trial_balances,
      'expense_trial_balances' => $expense_trial_balances,
      'servide_provider' => $serviceprovider_trial_balances,
            'setting_detail' => $setting_detail

    );

    $content = $this->parser->parse('newaccount/trial_balance_without_opening', $data, true);

    $this->template->full_admin_html_view($content);
  }
  
  
  // Transcation Details

  public function transcation_details()
  {
    $CI = & get_instance();

    $CI->load->model('Accounts_model');

    $date = $this->input->post("daterangepicker-field");
    
    $currency_details = $CI->Web_settings->retrieve_setting_editdata();

    $invoice_transcationdetails = $this->Accounts_model->transcation_invoice_results();

    $invoice_transcationdetailsalldata = $this->Accounts_model->transcation_invoice_resultsofAll($date);

    $expense_transcationdetails = $this->Accounts_model->transcation_expense_results($date);
    
    $serviceprovider_transcationdetails = $this->Accounts_model->transcation_serviceprovider($date);

    $setting_detail = $CI->Web_settings->retrieve_setting_editdata();

    $data = array(
      'title' => 'Transaction Detail by Account',
      'date' => $date,
      'currency'  =>$currency_details[0]['currency'],
      'invoice_list' => $invoice_transcationdetails,
      'invoice_alldata' => $invoice_transcationdetailsalldata,
      'expense_list' => $expense_transcationdetails,
      'serviceprovider' => $serviceprovider_transcationdetails,
            'setting_detail' => $setting_detail,
    
    );

    $content = $this->parser->parse('newaccount/transcation_detail', $data, true);

    $this->template->full_admin_html_view($content);
  }
  
  
  
  // General Ledger Details

  public function generalLedger()
  {
    $CI = & get_instance();

    $CI->load->model('Accounts_model');

    $date = $this->input->post("daterangepicker-field");
    
    $currency_details = $CI->Web_settings->retrieve_setting_editdata();
    
    $invoice_generalledger = $this->Accounts_model->generalLedger_invoice_results($date);

    $invoice_generalledgerAll = $this->Accounts_model->generalLedger_invoice_resultsALLDATA();

    $expense_generalledger = $this->Accounts_model->generalLedger_expense_results($date);
    
    $serviceprovider_generalledger = $this->Accounts_model->generalledger_serviceprovider($date);
    $setting_detail = $CI->Web_settings->retrieve_setting_editdata();

    $data = array(
      'title' => 'General Ledger',
      'date' => $date,
      'currency'  =>$currency_details[0]['currency'],
      'sale_generalledger' => $invoice_generalledger,
      'sale_generalledgerAll' => $invoice_generalledgerAll,
      'exp_generalledger' => $expense_generalledger,
      'serviceprovider' => $serviceprovider_generalledger,
            'setting_detail' => $setting_detail,

    );

    $content = $this->parser->parse('newaccount/generalledgers.php', $data, true);

    $this->template->full_admin_html_view($content);
  }
  
  
  
  // Journal
  public function journal()
  {
    $CI = & get_instance();

    $CI->load->model('Accounts_model');

    $date = $this->input->post("daterangepicker-field");

    $currency_details = $CI->Web_settings->retrieve_setting_editdata();

    $invoice_journal = $this->Accounts_model->journal_invoice_results($date);
    $expense_journal = $this->Accounts_model->journal_expense_results($date);
    $serviceprovider_journal = $this->Accounts_model->journal_serviceprovider($date);
    
    $setting_detail = $CI->Web_settings->retrieve_setting_editdata();

    $data = array(
      'title' => 'Journal',
      'date' => $date,
      'sales_journal' => $invoice_journal,
      'expense_journals' => $expense_journal,
      'currency'  =>$currency_details[0]['currency'],
      'serviceprovider' => $serviceprovider_journal,
            'setting_detail' => $setting_detail,

    );

    $content = $this->parser->parse('newaccount/journal.php', $data, true);

    $this->template->full_admin_html_view($content);
  }
  
  
  
  

  //Trial Balannce
    public function trial_balance(){
        $data['title']  = display('trial_balance');
         $content = $this->parser->parse('newaccount/trial_balance', $data, true);
    $this->template->full_admin_html_view($content); 
        }
     //Trial Balance Report
    public function trial_balance_report(){
      $CI = & get_instance();
      $CI->load->model('Accounts_model');
      $CI->load->model('Invoices');
      $data['company'] = $CI->Invoices->retrieve_company();
      $data['software_info'] = $CI->Accounts_model->software_setting_info();
       $dtpFromDate     = $this->input->post('dtpFromDate',TRUE);
       $dtpToDate       = $this->input->post('dtpToDate',TRUE);
       $chkWithOpening  = $this->input->post('chkWithOpening',TRUE);

       $results         = $this->accounts_model->trial_balance_report($dtpFromDate,$dtpToDate,$chkWithOpening);

       if ($results['WithOpening']) {
            $data['oResultTr']    = $results['oResultTr'];
            $data['oResultInEx']  = $results['oResultInEx'];
            $data['dtpFromDate']  = $dtpFromDate;
            $data['dtpToDate']    = $dtpToDate;

            // PDF Generator 
            $this->load->library('pdfgenerator');
            $dompdf = new DOMPDF();
            $page = $this->load->view('newaccount/trial_balance_with_opening_pdf',$data,true);
            $dompdf->load_html($page);
            $dompdf->render();
            $output = $dompdf->output();
            file_put_contents('assets/data/pdf/Trial Balance With Opening As On '.$dtpFromDate.' To '.$dtpToDate.'.pdf', $output);


            $data['pdf']    = 'assets/data/pdf/Trial Balance With Opening As On '.$dtpFromDate.' To '.$dtpToDate.'.pdf';
            $data['title']  = display('trial_balance_report');
            $content = $this->parser->parse('newaccount/trial_balance_with_opening', $data, true);
    $this->template->full_admin_html_view($content);
       }else{

            $data['oResultTr']    = $results['oResultTr'];
            $data['oResultInEx']  = $results['oResultInEx'];
            $data['dtpFromDate']  = $dtpFromDate;
            $data['dtpToDate']    = $dtpToDate;

            // PDF Generator 
            $this->load->library('pdfgenerator');
            $dompdf = new DOMPDF();
            $page = $this->load->view('newaccount/trial_balance_without_opening_pdf',$data,true);
            $dompdf->load_html($page);
            $dompdf->render();
            $output = $dompdf->output();
            file_put_contents('assets/data/pdf/Trial Balance As On '.$dtpFromDate.' To '.$dtpToDate.'.pdf', $output);
            $data['pdf']    = 'assets/data/pdf/Trial Balance As On '.$dtpFromDate.' To '.$dtpToDate.'.pdf';

            $data['title']  = display('trial_balance_report');
            $content = $this->parser->parse('newaccount/trial_balance_without_opening', $data, true);
    $this->template->full_admin_html_view($content);
       }

    }

    public function balance_sheet_compare(){
$CI = & get_instance();




      $CI->load->model('Accounts_model');

 
      $CI->load->model('Web_settings');

      $setting_detail = $CI->Web_settings->retrieve_setting_editdata();





   $date = $this->input->post("daterangepicker-field");
     $from_date           = (!empty($this->input->post('dtpFromDate'))?$this->input->post('dtpFromDate'):date('Y-m-d'));
      $to_date             = (!empty($this->input->post('dtpToDate'))?$this->input->post('dtpToDate'):date('Y-m-d'));
      $data['from_date']   = $from_date;
      $data['to_date']     = $to_date;
      $data['fixed_assets']=  $CI->Accounts_model->fixed_assets();
      $data['liabilities'] =  $CI->Accounts_model->liabilities_data();
      $data['incomes']     =  $CI->Accounts_model->income_fields();
       $currency_details = $CI->Web_settings->retrieve_setting_editdata();
       $data['currency']=$currency_details[0]['currency'];
      $data['balance_comparision']    =  $CI->Accounts_model->balance_comparision($date);
        $data['results']    =  $CI->Accounts_model->invoice_paid_amount($date);
         $data['purchase_paid_amount']    =  $CI->Accounts_model->purchase_paid_amount($date);
         $purchase_paid_amount    =  $CI->Accounts_model->purchase_paid_amount($date);
           $data['provider_paid_amount']    =  $CI->Accounts_model->provider_paid_amount($date);
          $provider_paid_amount   =  $CI->Accounts_model->provider_paid_amount($date);
          $data['setting_detail']    =  $setting_detail;


    $results = $this->Accounts_model->invoice_paid_amount($date);
   $summed_values = [];

// Iterate through the keys of the arrays
foreach (array_keys($purchase_paid_amount) as $key) {
    // Sum the values for each key
    $sum = $purchase_paid_amount[$key] + $provider_paid_amount[$key];
    
    // Store the summed value in the new array
    $summed_values[$key] = $sum;
}
$data['summed_values']=$summed_values;
$content = $this->parser->parse('newaccount/balance_sheet_comparision', $data, true);
     $this->template->full_admin_html_view($content);
    }








public function balance_sheet(){
     $CI = & get_instance();
      $CI->load->model('Accounts_model');
      $CI->load->model('Web_settings');

      $setting_detail = $CI->Web_settings->retrieve_setting_editdata();

   $date = $this->input->post("daterangepicker-field");
      $data['title']  = display('balance_sheet');
      $from_date           = (!empty($this->input->post('dtpFromDate'))?$this->input->post('dtpFromDate'):date('Y-m-d'));
      $to_date             = (!empty($this->input->post('dtpToDate'))?$this->input->post('dtpToDate'):date('Y-m-d'));
      $data['from_date']   = $from_date;
      $data['to_date']     = $to_date;
       $currency_details = $CI->Web_settings->retrieve_setting_editdata();
       $data['currency']=$currency_details[0]['currency'];
      $data['fixed_assets']=  $CI->Accounts_model->fixed_assets();
      $data['liabilities'] =  $CI->Accounts_model->liabilities_data();
      $data['all_account_cat']     =  $CI->Accounts_model->balance_sheet();
      $data['expenses']    =  $CI->Accounts_model->expense_fields();
        $data['invoice_paid_amount']    =  $CI->Accounts_model->invoice_paid_amount_bs($date);
         $data['purchase_paid_amount']    =  $CI->Accounts_model->purchase_paid_amount_bs($date);
 
         $data['setting_detail']     = $setting_detail;


       $content = $this->parser->parse('newaccount/balance_sheet', $data, true);
     $this->template->full_admin_html_view($content);
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    public function vouchar_cash($date){
        $vouchar_view = $this->accounts_model->get_vouchar_view($date);
        $data = array(
            'vouchar_view' => $vouchar_view,
        );

    $data['title'] = display('accounts_form');
     $content = $this->parser->parse('newaccount/vouchar_cash', $data, true);
    $this->template->full_admin_html_view($content);
    }




    public function general_ledger(){

        $general_ledger = $this->accounts_model->get_general_ledger();
        $data = array(
            'general_ledger' => $general_ledger,
        );

        $data['title'] = display('general_ledger');
         $content = $this->parser->parse('newaccount/general_ledger', $data, true);
    $this->template->full_admin_html_view($content);
    }

    public function general_led($Headid = NULL){
        $Headid = $this->input->post('Headid',TRUE);
        $HeadName = $this->accounts_model->general_led_get($Headid);
        echo  "<option>Transaction Head</option>";
        $html = "";
        foreach($HeadName as $data){
            $html .="<option value='$data->HeadCode'>$data->HeadName</option>";
            
        }
        echo $html;
    }
//      working
    public function voucher_report_serach($vouchar=NULL){
       echo $vouchar = $this->input->post('vouchar',TRUE);

        $voucher_report_serach = $this->accounts_model->voucher_report_serach($vouchar);

        if($voucher_report_serach->Amount==''){
             $pay='0.00';
        }else{
             $pay=$voucher_report_serach->Amount;
        }
        $baseurl = base_url().'accounts/vouchar_cash/'.$vouchar;
         $html = "";
         $html.="<td>
                   <a href=\"$baseurl\">CV-BAC-$vouchar</a>
                 </td>
                 <td>Aggregated Cash Credit Voucher of $vouchar</td>
                 <td>$pay</td>
                 <td align=\"center\">$vouchar</td>";
         echo $html;
    }
    //general ledger working
    public function accounts_report_search(){
      $CI = & get_instance();
      $CI->load->model('Accounts_model');
    $CI->load->model('Web_settings');
      $CI->load->model('Invoices');
        $cmbGLCode   = $this->input->post('cmbGLCode',TRUE);
        $cmbCode     = $this->input->post('cmbCode',TRUE);
        $dtpFromDate = $this->input->post('dtpFromDate',TRUE);
        $dtpToDate   = $this->input->post('dtpToDate',TRUE);
        $chkIsTransction = $this->input->post('chkIsTransction',TRUE);
        $HeadName    = $this->accounts_model->general_led_report_headname($cmbGLCode);
        $HeadName2   = $this->accounts_model->general_led_report_headname2($cmbGLCode,$cmbCode,$dtpFromDate,$dtpToDate,$chkIsTransction);
         $pre_balance = $this->accounts_model->general_led_report_prebalance($cmbGLCode,$dtpFromDate);
 $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $data = array(
            'dtpFromDate' => $dtpFromDate,
            'dtpToDate'   => $dtpToDate,
            'HeadName'    => $HeadName,
            'HeadName2'   => $HeadName2,
              'currency'        => $currency_details[0]['currency'],
            'prebalance'  =>  $pre_balance,
            'chkIsTransction' => $chkIsTransction,

        );
        $data['company'] = $CI->Invoices->retrieve_company();
      $data['software_info'] = $CI->Accounts_model->software_setting_info();
        $data['ledger'] = $this->db->select('*')->from('acc_coa')->where('HeadCode',$cmbCode)->get()->result_array();
        $data['title'] = display('general_ledger_report');
         $content = $this->parser->parse('newaccount/general_ledger_report', $data, true);
    $this->template->full_admin_html_view($content);

    }




    public function cash_book(){
        $CI = & get_instance();
        $CI->load->model('Accounts_model');
        $CI->load->model('Invoices');
          $CI->load->model('Web_settings');
        $data['title'] = display('cash_book');
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
          $data['currency']        = $currency_details[0]['currency'];

        $w = & get_instance();
        $w->load->model('Ppurchases');
        $CI->load->model('Web_settings');

        $company_info = $w->Ppurchases->retrieve_company();
        $setting=  $CI->Web_settings->retrieve_setting_editdata();

        $data = array(

        'logo'=>(!empty($setting[0]['invoice_logo'])?$setting[0]['invoice_logo']:$company_info[0]['logo']),  
        'company'=>(!empty($datacontent[0]['company_name'])?$datacontent[0]['company_name']:$company_info[0]['company_name']),   
        'phone'=>(!empty($datacontent[0]['mobile'])?$datacontent[0]['mobile']:$company_info[0]['mobile']),   
        'email'=>(!empty($datacontent[0]['email'])?$datacontent[0]['email']:$company_info[0]['email']),   
        'address'=>(!empty($datacontent[0]['address'])?$datacontent[0]['address']:$company_info[0]['address']), 
      );



        $content = $this->parser->parse('newaccount/cash_book', $data, true);
       $this->template->full_admin_html_view($content);
    }


    
    
    
    
    
    
    
    
    
    
    
    
    
    
    public function bank_book(){
        $CI = & get_instance();
        $CI->load->model('Accounts_model');
        $CI->load->model('Invoices');
          $CI->load->model('Web_settings');
           $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $data['title'] = display('bank_book');
         $data['currency']        = $currency_details[0]['currency'];
        $data['company'] = $CI->Invoices->retrieve_company();
        $data['software_info'] = $CI->Accounts_model->software_setting_info();
      $content = $this->parser->parse('newaccount/bank_book', $data, true);
    $this->template->full_admin_html_view($content);
    }
    // Inventory Report
    
    
    
    
    
    
    
     public function inventory_ledger(){
      $CI = & get_instance();
         $CI->load->model('Web_settings');
      $CI->load->model('Accounts_model');
      $CI->load->model('Invoices');
       $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $data['currency']        = $currency_details[0]['currency'];
      // $data['company'] = $CI->Invoices->retrieve_company();
      $data['software_info'] = $CI->Accounts_model->software_setting_info();

      $w = & get_instance();
      $w->load->model('Ppurchases');
      $CI->load->model('Web_settings');
      $company_info = $w->Ppurchases->retrieve_company();
      $setting=  $CI->Web_settings->retrieve_setting_editdata();


      $data = array(

        'logo'=>(!empty($setting[0]['invoice_logo'])?$setting[0]['invoice_logo']:$company_info[0]['logo']),  
        'company'=>(!empty($datacontent[0]['company_name'])?$datacontent[0]['company_name']:$company_info[0]['company_name']),   
        'phone'=>(!empty($datacontent[0]['mobile'])?$datacontent[0]['mobile']:$company_info[0]['mobile']),   
        'email'=>(!empty($datacontent[0]['email'])?$datacontent[0]['email']:$company_info[0]['email']),   
        'address'=>(!empty($datacontent[0]['address'])?$datacontent[0]['address']:$company_info[0]['address']), 
      );


      $data['title'] = display('Inventory_ledger');
      $content = $this->parser->parse('newaccount/inventory_ledger', $data, true);
    $this->template->full_admin_html_view($content);
    }

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
     public function voucher_report(){
      $CI = & get_instance();
         $CI->load->model('Web_settings');
      $CI->load->model('Accounts_model');
       $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $data['currency']        = $currency_details[0]['currency'];
     $data['title']  = display('accounts_form');
    $content = $this->parser->parse('newaccount/coa', $data, true);
    $this->template->full_admin_html_view($content);
  }
 
 
 
 
 
 
 
 
 
 
 
   public function coa_print(){
     $CI = & get_instance();
      $CI->load->model('Accounts_model');
      $CI->load->model('Invoices');
      // $data['company'] = $CI->Invoices->retrieve_company();
      // $data['software_info'] = $CI->Accounts_model->software_setting_info();
      $data['title'] = display('accounts_form');


      $w = & get_instance();
      $w->load->model('Ppurchases');
      $CI->load->model('Web_settings');
      $company_info = $w->Ppurchases->retrieve_company();
      $setting=  $CI->Web_settings->retrieve_setting_editdata();

      $data = array(
        'logo'=>(!empty($setting[0]['invoice_logo'])?$setting[0]['invoice_logo']:$company_info[0]['logo']),  
        'company'=>(!empty($datacontent[0]['company_name'])?$datacontent[0]['company_name']:$company_info[0]['company_name']),   
        'phone'=>(!empty($datacontent[0]['mobile'])?$datacontent[0]['mobile']:$company_info[0]['mobile']),   
        'email'=>(!empty($datacontent[0]['email'])?$datacontent[0]['email']:$company_info[0]['email']),   
        'address'=>(!empty($datacontent[0]['address'])?$datacontent[0]['address']:$company_info[0]['address']), 
      );
       $content = $this->parser->parse('newaccount/coa_print', $data, true);
    $this->template->full_admin_html_view($content);
    }

    
    
    
    
    
    
    
    
    
    
    
    
      //Profit loss report page
    public function profit_loss_report(){
        $data['title'] = display('profit_loss_report');
        $content = $this->parser->parse('newaccount/profit_loss_report', $data, true);
    $this->template->full_admin_html_view($content);
    }
    //Profit loss serch result
    public function profit_loss_report_search(){
        $dtpFromDate = $this->input->post('dtpFromDate',TRUE);
        $dtpToDate   = $this->input->post('dtpToDate',TRUE);

        $get_profit  = $this->accounts_model->profit_loss_serach();

        $data['oResultAsset'] = $get_profit['oResultAsset'];
        $data['oResultLiability']  = $get_profit['oResultLiability'];
        $data['dtpFromDate']  = $dtpFromDate;
        $data['dtpToDate']    = $dtpToDate;
        $data['pdf']    = 'assets/data/pdf/Statement of Comprehensive Income From '.$dtpFromDate.' To '.$dtpToDate.'.pdf';
        $data['title']  = display('profit_loss_report');
         $content = $this->parser->parse('newaccount/profit_loss_report_search', $data, true);
    $this->template->full_admin_html_view($content);
    }
    
    
    
    
    
    
    
    
    
    
        
     //Cash flow page
  public function cash_flow_report(){
         $CI = & get_instance();
        $data['title']  = display('cash_flow_report');
         $currency_details = $CI->Web_settings->retrieve_setting_editdata();
                  $setting_detail = $CI->Web_settings->retrieve_setting_editdata();

       $data['currency']=$currency_details[0]['currency'];
          $date = $this->input->post("daterangepicker-field");
        if($date) {
$split=explode(' to ',$date);
$start =  $split[0];
$end = $split[1];

$data=array(
'start'=>$start,
'end' => $end


);
        }
         $get_data  = $this->accounts_model->get_receivables_arec($date);
         $data['setting_detail']=$setting_detail;
        $data['get_receivables_arec']=$get_data;
        $content = $this->parser->parse('newaccount/cash_flow_report', $data, true);
    $this->template->full_admin_html_view($content);
    }
     //Cash flow report search
     
     
     
     
     
  

    //Supplier payment information 
 public function cash_flow_report_search(){
      $CI = & get_instance();
      $CI->load->model('Accounts_model');
      $CI->load->model('Invoices');



      $w = & get_instance();
      $w->load->model('Ppurchases');
      $CI->load->model('Web_settings');

      $company_info = $w->Ppurchases->retrieve_company();
      $setting=  $CI->Web_settings->retrieve_setting_editdata();



      $data = array(

        'logo'=>(!empty($setting[0]['invoice_logo'])?$setting[0]['invoice_logo']:$company_info[0]['logo']),  
        'company'=>(!empty($datacontent[0]['company_name'])?$datacontent[0]['company_name']:$company_info[0]['company_name']),   
        'phone'=>(!empty($datacontent[0]['mobile'])?$datacontent[0]['mobile']:$company_info[0]['mobile']),   
        'email'=>(!empty($datacontent[0]['email'])?$datacontent[0]['email']:$company_info[0]['email']),   
        'address'=>(!empty($datacontent[0]['address'])?$datacontent[0]['address']:$company_info[0]['address']), 
      );








      $data['software_info'] = $CI->Accounts_model->software_setting_info();
        $dtpFromDate          = $this->input->post('dtpFromDate',TRUE);
        $dtpToDate            = $this->input->post('dtpToDate',TRUE);
        $data['dtpFromDate']  = $dtpFromDate;
        $data['dtpToDate']    = $dtpToDate;

        // PDF Generator 
        $this->load->library('pdfgenerator');
        $dompdf = new DOMPDF();
        $page = $this->load->view('newaccount/cash_flow_report_search_pdf',$data,true);
        $dompdf->load_html($page);
        $dompdf->render();
        $output = $dompdf->output();
        file_put_contents('assets/data/pdf/Cash Flow Statement '.$dtpFromDate.' To '.$dtpToDate.'.pdf', $output);

        $data['pdf']    = 'assets/data/pdf/Cash Flow Statement '.$dtpFromDate.' To '.$dtpToDate.'.pdf';
        $data['title']  = display('cash_flow_report');
        $content = $this->parser->parse('newaccount/cash_flow_report_search', $data, true);
    $this->template->full_admin_html_view($content);
    }




    //Supplier payment information 
    public function supplier_payment(){
       $CI = & get_instance();
       $CI->load->model('Purchases');
        $CI->load->model('Web_settings');
        $get_supplier= $this->accounts_model->get_supplier();
        $bank_list   = $this->Web_settings->bank_list();
         $currency_details = $CI->Web_settings->retrieve_setting_editdata();
          $payment_type_dropdown = $CI->Purchases->payment_type_dropdown();
        $data = array(
           'currency'        => $currency_details[0]['currency'],
            'supplier_list' => $get_supplier,
            'payment_type' =>   $payment_type_dropdown,
            'bank_list'     => $bank_list,
        );
        $data['voucher_no'] = $this->accounts_model->Spayment();
        $data['title']  = display('supplier_payment_form');
        $content = $this->parser->parse('newaccount/supplier_payment_form', $data, true);
    $this->template->full_admin_html_view($content);
    }




    public function supplier_payment_edit($cust_incremnt_id){
                $CI = & get_instance();
                $CI->load->model('Accounts_model');
                $data['title'] = display('supplier_payment');
                $CI->load->model('Web_settings');
                  $CI->load->model('Purchases');

                $supplier_payment_edit = $CI->Accounts_model->supplier_payment_edit($cust_incremnt_id);
                $get_supplier= $this->accounts_model->get_supplier();
                $setting_detail = $CI->Web_settings->retrieve_setting_editdata();
  $payment_type_dropdown = $CI->Purchases->payment_type_dropdown();
                $data =array(
                  'supplier_payment_edit' => $supplier_payment_edit,
                  'supplier_list' => $get_supplier,
                   'payment_type' =>   $payment_type_dropdown,
                  'setting_detail' => $setting_detail

                );
                          
                // print_r($data);
           $content = $this->parser->parse('newaccount/supplier_payment_edit', $data, true);
           $this->template->full_admin_html_view($content); 
    }

public function supplier_payment_manager(){
          
           $CI = & get_instance();
           $CI->load->model('Accounts_model');
           $CI->load->model('Web_settings');

 
           $data['setting_detail'] = $CI->Web_settings->retrieve_setting_editdata();

           $data['sp_info'] = $CI->Accounts_model->supplier_payment_indexpage();
          
           $content = $this->parser->parse('newaccount/supplier_payment_manager', $data, true);
           $this->template->full_admin_html_view($content); 
    }




 public function update_supplier_payment(){
 
    $voucher_no = addslashes(trim($this->input->post('txtVNo',TRUE)));
    $Vtype = "SupplierPayment";
    $VDate = $this->input->post('dtpDate',TRUE);

    $cust_incremnt_id = $this->input->post('cust_incremnt_id',TRUE);


    $paytype = $this->input->post('paytype',TRUE);
    $bank_name = $this->input->post('bank_id',TRUE);
    $Narration = addslashes(trim($this->input->post('txtRemarks',TRUE)));
    $total_amount = $this->input->post('txtAmount',TRUE);
    $CreateBy = $this->session->userdata('user_id');

    $data1 = array(
        'type' => $Vtype,
        'voucher_no' => $voucher_no,
        'date' => $VDate,
        'remark' => $Narration,
        'bank' => $bank_name,
        'pay_type' => $paytype,
        'g_total1' => $total_amount,
        'cust_incremnt_id' => $cust_incremnt_id,
        'created_by' => $CreateBy,
    );

     $this->db->where('cust_incremnt_id', $cust_incremnt_id); // Use the appropriate primary key field
     $this->db->update('accounts', $data1);
 
    //  echo $this->db->last_query();


    $supplier_id = $this->input->post('supplier_id',TRUE);
    $txtCode = $this->input->post('txtCode',TRUE);
    $txtAmount = $this->input->post('txtAmount',TRUE);

    $contrainsert = array(
        'cust_incremnt_id' => $cust_incremnt_id,
        'account_name' => $supplier_id,
        'account_id' => $txtCode,
        'gtotal' => $txtAmount,
        'created_by' => $CreateBy
    );

     $this->db->where('cust_incremnt_id', $cust_incremnt_id); // Use the appropriate primary key field
     $this->db->update('account_details', $contrainsert); 
    //  echo $this->db->last_query(); die();

   
   
     redirect('accounts/supplier_payment_manager'); // Correct placement of redirect
     return true; // Moved return statement here
}






















 //supplier payment submit
     public function create_supplier_payment(){
    $this->form_validation->set_rules('txtCode', display('txtCode')  ,'max_length[100]');
         if ($this->form_validation->run()) { 
        // if ($this->accounts_model->supplier_payment_insert())
        
        if ($this->accounts_model->insert_Supplier_payment())

        
        { 
          $this->session->set_flashdata('message', display('save_successfully'));
          redirect('accounts/supplier_payment/');
        }else{
          $this->session->set_flashdata('error_message',  display('please_try_again'));
        }
         redirect("accounts/supplier_payment");
    }else{
      $this->session->set_flashdata('error_message',  display('please_try_again'));
        redirect("accounts/supplier_payment");
     }

}
















 







//Customer Receive
// public function customer_receive(){
//     $this->load->model('Web_settings');
//     $get_customer= $this->accounts_model->get_customer();
//     $bank_list        = $this->Web_settings->bank_list();
//       $currency_details      = $this->Web_settings->retrieve_setting_editdata();
//         $data = array(
//             'customer_list' => $get_customer,
//             'currency'  => $currency_details[0]['currency'],
//             'bank_list'     => $bank_list,
//         );
//         $data['voucher_no'] = $this->accounts_model->Creceive();
//         $data['title']      = display('customer_receive_form');
//     $content = $this->parser->parse('newaccount/customer_receive_form', $data, true);
//     $this->template->full_admin_html_view($content);
// }



public function customer_receive_manager(){
 
  $data['title'] = display('customer_receive');

  $CI = & get_instance();
  $CI->load->model('Accounts_model');
  $CI->load->model('Web_settings');


  $data['setting_detail'] = $CI->Web_settings->retrieve_setting_editdata();

  $data['cust_rec_info'] = $CI->Accounts_model->customer_receive_indexpage();
 
  
$content = $this->parser->parse('newaccount/customer_receive_manager', $data, true);
$this->template->full_admin_html_view($content); 
}




public function customer_receive_edit($cust_incremnt_id){

  $CI = & get_instance();
  $CI->load->model('Accounts_model');
  $data['title'] = display('supplier_payment');
  $CI->load->model('Web_settings');


  $get_customer= $this->accounts_model->get_customer();           

  $customer_receive_edit = $CI->Accounts_model->customer_receive_edit($cust_incremnt_id);
   $setting_detail = $CI->Web_settings->retrieve_setting_editdata();

  $data =array(
    'customer_receive_edit' => $customer_receive_edit,
     'setting_detail' => $setting_detail,
    'customer_list' => $get_customer,
  );

$content = $this->parser->parse('newaccount/customer_receive_edit', $data, true);
$this->template->full_admin_html_view($content); 
}





//Customer Receive
public function customer_receive(){
  $CI = & get_instance();


  $this->load->model('Web_settings');
  $get_customer= $this->accounts_model->get_customer();           

  $bank_list        = $this->Web_settings->bank_list();
    $currency_details      = $this->Web_settings->retrieve_setting_editdata();
    $setting_detail = $CI->Web_settings->retrieve_setting_editdata();

      $data = array(
          'customer_list' => $get_customer,
          'currency'  => $currency_details[0]['currency'],
          'bank_list'     => $bank_list,
          'setting_detail' => $setting_detail

      );
      $data['voucher_no'] = $this->accounts_model->Creceive();
      $data['title']      = display('customer_receive_form');
  $content = $this->parser->parse('newaccount/customer_receive_form', $data, true);
  $this->template->full_admin_html_view($content);
}



public function customer_receive_delete($cust_incremnt_id){
  $this->db->select('*');
  $this->db->from('accounts');
  $this->db->join('account_details', 'accounts.cust_incremnt_id = account_details.cust_incremnt_id', 'left'); // Joining on cust_incremnt_id
  $this->db->where('accounts.created_by', $this->session->userdata('user_id'));
  $this->db->where('type','CustomerReceive');

                    $this->db->where('cust_incremnt_id', $cust_incremnt_id);
                    $this->db->delete('accounts');
                    $this->db->where('cust_incremnt_id', $cust_incremnt_id);
                    $this->db->delete('account_details');

                    redirect('accounts/customer_receive_manager'); // Correct placement of redirect
                    return true; // Moved return statement here
               }
               







               public function update_customer_receive(){
 
                $voucher_no = addslashes(trim($this->input->post('txtVNo',TRUE)));
                $Vtype = "CustomerReceive";
                $VDate = $this->input->post('dtpDate',TRUE);
            
                $cust_incremnt_id = $this->input->post('cust_incremnt_id',TRUE);
            
            
                $paytype = $this->input->post('paytype',TRUE);
                $bank_name = $this->input->post('bank_id',TRUE);
                $Narration = addslashes(trim($this->input->post('txtRemarks',TRUE)));
                $total_amount = $this->input->post('txtAmount',TRUE);
                $CreateBy = $this->session->userdata('user_id');
            
                $data1 = array(
                    'type' => $Vtype,
                    'voucher_no' => $voucher_no,
                    'date' => $VDate,
                    'remark' => $Narration,
                    'bank' => $bank_name,
                    'pay_type' => $paytype,
                    'g_total1' => $total_amount,
                    'cust_incremnt_id' => $cust_incremnt_id,
                    'created_by' => $CreateBy,
                );
            
                 $this->db->where('cust_incremnt_id', $cust_incremnt_id); // Use the appropriate primary key field
                 $this->db->update('accounts', $data1);
             
                // echo $this->db->last_query();
            
            
                $customer_id = $this->input->post('customer_id',TRUE);
                $txtCode = $this->input->post('txtCode',TRUE);
                $txtAmount = $this->input->post('txtAmount',TRUE);
            
                $contrainsert = array(
                    'cust_incremnt_id' => $cust_incremnt_id,
                    'account_name' => $customer_id,
                    'account_id' => $txtCode,
                    'gtotal' => $txtAmount,
                    'created_by' => $CreateBy
                );
            
                 $this->db->where('cust_incremnt_id', $cust_incremnt_id); // Use the appropriate primary key field
                 $this->db->update('account_details', $contrainsert); 
            // echo $this->db->last_query(); die();
            
               
               
                 redirect('accounts/customer_receive_manager'); // Correct placement of redirect
                 return true; // Moved return statement here
            }

























 public function customer_headcode($id){
$customer_info = $this->db->select('customer_id')->from('customer_information')->where('customer_id',$id)->get()->row();
// $head_name =$id.'-'.$customer_info->customer_name;
//     $customerhcode = $this->db->select('*')
//             ->from('acc_coa')
//             ->where('HeadName',$head_name)
//             ->get()
//             ->row();
      $code = $customer_info->customer_id;       
echo json_encode($code);

   }

public function create_customer_receive(){
  
  $this->form_validation->set_rules('txtCode', display('txtCode')  ,'max_length[100]');
      if ($this->form_validation->run()) { 
    
      if ($this->accounts_model->insert_customer_receive()) { 

       $this->session->set_flashdata('message', display('save_successfully'));
       redirect('accounts/customer_receive/');
     }else{
       $this->session->set_flashdata('error_message',  display('please_try_again'));
     }
     redirect("accounts/customer_receive");
 }else{
   $this->session->set_flashdata('error_message',  display('please_try_again'));
   redirect("accounts/customer_receive");
  }

}


   public function customer_receipt($customer_id,$voucher_no,$coaid){
    $this->load->model('Purchases');
    $this->load->model('Web_settings');
    $data['customer_info'] = $this->accounts_model->custoinfo($customer_id);
    $data['payment_info']  = $this->accounts_model->customerreceiptinfo($voucher_no,$coaid);
    $currency_details      = $this->Web_settings->retrieve_setting_editdata();
    $company_info          = $this->Purchases->retrieve_company();
    $data['company_info']  = $company_info;
    $data['currency']      = $currency_details[0]['currency'];
    $data['position']      = $currency_details[0]['currency_position'];
    $data['title']         = display('supplier_payment_form');
    $content = $this->parser->parse('newaccount/customer_payment_receipt', $data, true);
    $this->template->full_admin_html_view($content);
}









public function supplier_paymentreceipt($supplier_id,$voucher_no,$coaid){
    $this->load->model('Purchases');
    $this->load->model('Web_settings');
    $data['supplier_info'] = $this->accounts_model->supplierinfo($supplier_id);
    $data['payment_info']  = $this->accounts_model->supplierpaymentinfo($voucher_no,$coaid);
    $currency_details      = $this->Web_settings->retrieve_setting_editdata();
    $company_info          = $this->Purchases->retrieve_company();
    $data['company_info']  = $company_info;
    $data['currency']      = $currency_details[0]['currency'];
    $data['position']      = $currency_details[0]['currency_position'];
    $data['title']         = display('supplier_payment_form');
    $content = $this->parser->parse('newaccount/supplier_payment_receipt', $data, true);
    $this->template->full_admin_html_view($content);
}























}
