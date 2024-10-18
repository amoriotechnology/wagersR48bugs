<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin_dashboard extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->db->query('SET SESSION sql_mode = ""');
        $this->template->current_menu = 'home';
        $this->load->model('Web_settings');
        $this->load->model('Reports');
        $this->load->database();
    }




public function dashboardsetting()
    {
        $CI = & get_instance();
        $CI->load->library('lreport');
        $CI->load->library('occational');
         $CI->load->model('Web_settings');
         $CI->load->model('Customers');
        if (!$this->auth->is_logged()) {
            $this->output->set_header("Location: " . base_url() . 'Admin_dashboard/login', TRUE, 302);
        }
        $pageen=array();
        $data['page_setting']=$page_setting=array(array("slug"=>"TotalSale","status"=>"enable"),array("slug"=>"TotalExpense","status"=>"enable"),array("slug"=>"Profit","status"=>"enable"),array("slug"=>"NoofProduct","status"=>"enable"),array("slug"=>"Sale_Expense_Overview","status"=>"enable"),array("slug"=>"Pie_Chart","status"=>"enable"),array("slug"=>"No_of_Vendor","status"=>"enable"),array("slug"=>"No_of_Customer","status"=>"enable"),array("slug"=>"No_of_Employee","status"=>"enable"),array("slug"=>"Best_10_Sales_Product","status"=>"enable"));
        if($this->input->post('page_status')){
        $pagedata=$this->input->post('page_status');
//    echo $pagedata;
  // echo "sadasd";
        foreach ($page_setting as  $single) {
              //die();
            if(isset($pagedata[$single['slug']])){
                $pageen[]=array("slug"=>$single['slug'],"status"=>"enable");
            }else{
               $pageen[]=array("slug"=>$single['slug'],"status"=>"disable");
            }
        }
        $arr['section_setting']=json_encode($pageen);
              $CI->Web_settings->update_user_setting($this->session->userdata('user_id'),$arr);
              $this->session->set_userdata(array('message'=>'Settings successfully updated'));
        }
        $page_details    = $CI->Web_settings->get_user_setting($this->session->userdata('user_id'));
         if(isset($page_details['section_setting']) && $page_details['section_setting']!='')
         {
            $pagen=array();
            $da=json_decode($page_details['section_setting']);
            foreach ($da as $single) {
                $pagen[]=array("slug"=>$single->slug,"status"=>$single->status);
        }
            $data['page_setting']=$pagen;
         }
        $content = $CI->parser->parse('include/dashboard_setting', $data, true);
//  print_r($data);die();
       $this->template->full_admin_html_view($content);
    }


    
    public function dashboardsettingUser()
    {
       $CI = & get_instance();

       if (!$this->auth->is_logged()) {
            $this->output->set_header("Location: " . base_url() . 'Admin_dashboard/login', TRUE, 302);
        }

        $data['user_setting']=$user_setting=array(array("slug"=>"No_of_Invoices","status"=>"enable"),array("slug"=>"No_of_Expenses","status"=>"enable"),array("slug"=>"No_of_Timesheet","status"=>"enable"),array("slug"=>"No_of_Workinghours","status"=>"enable"));

        if($this->input->post('userpage_status')){
        $pagedata=$this->input->post('userpage_status');
        foreach ($user_setting as  $single) {
        
            if(isset($pagedata[$single['slug']])){
                $pageen[]=array("slug"=>$single['slug'],"status"=>"enable");
            }else{
               $pageen[]=array("slug"=>$single['slug'],"status"=>"disable");
            }
        }
        $arr['user_section_setting']=json_encode($pageen);
              $CI->Web_settings->update_userlogin_setting($this->session->userdata('user_id'),$arr);
              $this->session->set_userdata(array('message'=>'Settings successfully updated'));
        }

        $page_details    = $CI->Web_settings->get_userlogin_setting($this->session->userdata('user_id'));
         if(isset($page_details['user_section_setting']) && $page_details['user_section_setting']!='')
         {
            $pagen=array();
            $da=json_decode($page_details['user_section_setting']);
            foreach ($da as $single) {
                $pagen[]=array("slug"=>$single->slug,"status"=>$single->status);
        }
            $data['user_setting']=$pagen;
         }

        

       $content = $CI->parser->parse('include/dashboard_setting_user', $data, true);

       $this->template->full_admin_html_view($content);
    }




    public function index() {
        
        $date = $this->input->post('daterangepicker-field',TRUE);
        if($date==''){
            $prev_month = date('Y-m-d', strtotime("-1 months", strtotime("NOW"))); 
$current=date('Y-m-d');
 $date= $prev_month."to". $current;

        }
        
        $date = str_replace(' ', '', $date);
        $split=explode("to",$date);
      
        $CI = & get_instance();
        $CI->load->library('lreport');
        $CI->load->library('occational');
        if (!$this->auth->is_logged()) {
            $this->output->set_header("Location: " . base_url() . 'Admin_dashboard/login', TRUE, 302);
        }

        $this->auth->check_admin_auth();

        $CI->load->model('Customers');
        $CI->load->model('Products');
        $CI->load->model('Suppliers');
        $CI->load->model('Invoices');
        $CI->load->model('Purchases');
        $CI->load->model('Reports');
        $CI->load->model('Web_settings');
        $total_customer      = $CI->Customers->count_customer();
        $total_product       = $CI->Products->count_product();
        $total_suppliers     = $CI->Suppliers->count_supplier();
       
         $todays_sales_report_detail = $CI->Invoices->todays_sales_report();
         $monthly_sales_report= $CI->Reports->monthly_sales_report();
         $overall_sales= $CI->Reports->overall_sales();
         $overall_sale_no        = $CI->Reports->overall_sale_no();
         $no_of_sale     = $CI->Reports->total_sales_report($split[0],$split[1]);
         $sales_paid     = $CI->Reports->sales_paid();
         $sales_due   = $CI->Reports->sales_due();


         
         $exp_paid     = $CI->Reports->exp_paid();
         $exp_due   = $CI->Reports->exp_due();
         $overall_exp_no        = $CI->Reports->overall_exp_no();
         
         $getrowcount_invoices = $CI->Invoices->getRowCountInvoices();
         $getrowcount_expenses = $CI->Invoices->getRowCountExpenses();
         $getrowcount_timesheet = $CI->Invoices->getRowCountTimesheet();

         $getTodayWorkingHours = $CI->Invoices->getCountTodayWorkingHour();
         
         $gettotal_Workinghours = $CI->Invoices->getnumberofWorkinghours();
 
         $getPiechart = $CI->Invoices->getPiechartsalesData();

         $getoverallExpensesamt = $CI->Invoices->getoverallExpensesAmount();

         $getoverallExpensesamtArray = $CI->Invoices->getoverallExpensesAmountarray();
         
        //  print_r($getoverallExpensesamtArray);

         $getTotalOutstand = $CI->Invoices->getTotalOutstandingamt();
         
         
         


        $no_of_expense     = $CI->Reports->total_purchase_report($split[0],$split[1]);
        $total_sales_invoice         = $CI->Reports->total_sale_invoice();
        $service_provider_list = $CI->Invoices->servic_provider();
      
        $total_sales         = $CI->Reports->total_sales_amount($split[0],$split[1]);
        $total_purchase      = $CI->Reports->total_purchase_amount($split[0],$split[1]);
      //  print_r($total_purchase);die();
        $total_expenses      =$CI->Reports->total_expense_amount($split[0],$split[1]);
        $salesamount         = $CI->Reports->todays_total_sales_amount($split[0],$split[1]);
        $total_employee_salary       = $CI->Reports->total_employee_salary($split[0],$split[1]);
        $total_service     = $CI->Reports->total_service_amount($split[0],$split[1]);
        $purchase_report     = $CI->Reports->todays_total_purchase_report();

        $todaysale=$CI->Reports->todays_total_sales_amount();
        $today_n_sale=$CI->Reports->today_no_of_sale();
        $today_sale_due=$CI->Reports->today_sale_due();
        $today_sale_paid=$CI->Reports->today_sale_paid();

          $todayex=$CI->Reports->todays_total_purchase_report();
        $today_n_ex=$CI->Reports->today_no_of_ex();
        $today_ex_due=$CI->Reports->today_ex_due();
        $today_ex_paid=$CI->Reports->today_ex_paid();




     $overall_purchase_amt= $CI->Reports->overall_purchase_amt();
        $todays_sale_product = $CI->Reports->todays_sale_product();
        $total_profit        = ($sales_report[0]['total_sale'] - $sales_report[0]['total_supplier_rate']);
        $currency_details    = $CI->Web_settings->retrieve_setting_editdata();
        $Best_10_Sales_Product  = $CI->Invoices->best_sales_products();
    $total_sales_product =$CI->Reports->total_sales_product();
    $total_expense_product =$CI->Reports->total_expense_product();
         $tlvmonth = '';
                    $month = ["January","February","March","April","May","June","July","August","September","October","November","December"];
                    for ($i=0; $i <= 11; $i++) {
                        $tlvmonth.=  $month[$i].',';
                            }

       $currentyearsale='';
                      for ($i=1; $i <= 12; $i++) {
                               $sold = $CI->Reports->yearly_invoice_report($i);
                               if (!empty($sold)) {
                                    $currentyearsale.=$sold->total_sale.",";
                                     }else{
                                $currentyearsale.=",";
                               }
                            } 

        $currentyearpurchase='';
                      for ($i=1; $i <= 12; $i++) {
                               $purchase = $CI->Reports->yearly_purchase_report($i);
                               if (!empty($purchase)) {
                                    $currentyearpurchase.=$purchase->total_purchase.",";
                                     }else{
                                $currentyearpurchase.=",";
                               }
                            }                     

                      
$chart_label = $chart_data = '';

    for ($i = 0; $i < 12; $i++) {
        $chart_label .= (!empty($Best_10_Sales_Product[$i]) ?  $Best_10_Sales_Product[$i]->product_name . ', ' : null);
        $chart_data .= (!empty($Best_10_Sales_Product[$i]) ? $Best_10_Sales_Product[$i]->quantity . ', ' : null);
    }

    $page_details    = $CI->Web_settings->get_user_setting($this->session->userdata('user_id'));
   
    $Sale=$Expense=$Sale_invoice=$Expense_invoice=$Product_sold=$Product_purchased=$Best_10_Sales_Product=$todays_overview=$yearly_report=$todays_sales_report='enable';
    if(isset($page_details['section_setting']) && $page_details['section_setting']!='')
         {
             $data['page_setting']=$p=json_decode($page_details['section_setting']);
           
             $Sale=isset($p[0]->slug)?$p[0]->status:'enable';
             $Expense=isset($p[1]->slug)?$p[1]->status:'enable';
             $Sale_invoice=isset($p[2]->slug)?$p[2]->status:'enable';
             $Expense_invoice=isset($p[3]->slug)?$p[3]->status:'enable';
             $Product_sold=isset($p[4]->slug)?$p[4]->status:'enable';
             $Product_purchased=isset($p[5]->slug)?$p[5]->status:'enable';
             $no_of_vendor=isset($p[6]->slug)?$p[6]->status:'enable';
             $todays_overview=isset($p[7]->slug)?$p[7]->status:'enable';
             $yearly_report=isset($p[8]->slug)?$p[8]->status:'enable';
             $bestofProduct=isset($p[9]->slug)?$p[9]->status:'enable';
            
         }
         
         
         $pageuser_details = $CI->Web_settings->get_userlogin_setting($this->session->userdata('user_id'));
    
    $No_of_Invoices = $No_of_Expenses = $No_of_Timesheet = $No_of_Workinghours='enable';
    if(isset($pageuser_details['user_section_setting']) && $pageuser_details['user_section_setting']!=''){
        $data['user_setting']=$u=json_decode($pageuser_details['user_section_setting']);
        // print_r($data['user_setting']);

        $No_of_Invoices=isset($u[0]->slug)?$u[0]->status:'enable';
        $No_of_Expenses=isset($u[1]->slug)?$u[1]->status:'enable';
        $No_of_Timesheet=isset($u[2]->slug)?$u[2]->status:'enable';
        $No_of_Workinghours=isset($u[3]->slug)?$u[3]->status:'enable';
    }
         //$data1 is for sample can be delete
     $data1 = array(
        'total_sales'         => $total_sales,
        'total_purchase'     => $total_purchase,
        'total_expenses'      =>$total_expenses,
        'salesamount'         => $salesamount,
        'total_employee_salary'       => $total_employee_salary,
       'total_service'  =>$total_service

     );
//    print_r($data1);
   
        $data = array(
            'total_sales_product'  =>$total_sales_product,
            'total_expense_product' => $total_expense_product,
            'no_of_expense' => $no_of_expense,
            'overall_purchase_amt'  => $overall_purchase_amt,
            'total_expenses'      =>$total_expenses,
            'salesamount'         => $salesamount,
            'total_employee_salary'       => $total_employee_salary,
           'total_service'  =>$total_service,
           'no_of_sale' =>$no_of_sale,
           'total_sales_invoice'=>$total_sales_invoice,
    'title'               => display('dashboard'),
    'total_customer'      => $total_customer,
    'no_of_vendor' => $no_of_vendor,
    'total_product'       => $total_product,
   'bestofProduct'=> $bestofProduct,
    'total_suppliers'     => $total_suppliers,
  //  'total_suppliersetting'=> $total_suppliersetting,
    'tlvmonthsale'        => $currentyearsale,
    'tlvmonthpurchase'    => $currentyearpurchase,
    'month'               => $tlvmonth,
    'total_sales'         => $total_sales,
 
    'todays_sales_report_detail' =>$todays_sales_report_detail,
    'service_provider_list'  => $service_provider_list,
    'sale_setting'  => $Sale,
    'expense_setting'  => $Expense,
    'sale_invoice_setting'  => $Sale_invoice,
    'expense_invoice_setting'  => $Expense_invoice,
    'product_sold'  => $Product_sold,
    'product_purchased'  => $Product_purchased,
    'Best_10_Sales_Product'  => $Best_10_Sales_Product,
    'todays_overviewsetting'  => $todays_overview,
    'yearly_reportsetting'  => $yearly_report,
    'todays_sales_reportsetting'=> $todays_sales_report_set,
    'total_purchase'      => $total_purchase,
    'todays_total_sales_report' => $todays_total_sales_amount,
    'chart_data'          => $chart_data,
    'purchase_amount'     => number_format($sales_report[0]['total_supplier_rate'], 2, '.', ','),
    'sales_amount'        => number_format($salesamount[0]['total_amount'], 2, '.', ','),
    'todays_sale_product' => $todays_sale_product,
    'todays_total_purchase'=> number_format($purchase_report[0]['ttl_purchase_amount'], 2, '.', ','),
    'total_profit'        => number_format($total_profit, 2, '.', ','),
    'monthly_sales_report'=> $monthly_sales_report,
    'count_invoices' => $getrowcount_invoices,
    'count_expenses' => $getrowcount_expenses,
    'count_timesheets' => $getrowcount_timesheet,
    'total_workinghours' => $gettotal_Workinghours,
    'getHours' => $getTodayWorkingHours,
    'getPiechart' => $getPiechart,
    'invoice_setting' => $No_of_Invoices,
    'expense_settings' => $No_of_Expenses,
    'timesheet_setting' => $No_of_Timesheet,
    'workinghours_setting' => $No_of_Workinghours,
    'expenseamt' => $getoverallExpensesamt,
    'arrayexpenseamt' => $getoverallExpensesamtArray,
    'outstanding_loan' => $getTotalOutstand,
    
    'currency'            => $currency_details[0]['currency'],
    'position'            => $currency_details[0]['currency_position'],
        );
   
        $content = $CI->parser->parse('include/admin_home', $data, true);
        // print_r($data); die();
        $this->template->full_admin_html_view($content);
    }









    public function chart() {
        $start=$_GET['start'];
        $end=$_GET['end'];
        
           
        $CI = & get_instance();
        $CI->load->model('Reports');
        //$info = $CI->Reports->chart($start,$end);
        $info = $CI->Reports->chart_exp($start,$end);
       

  }
//    ============ its for see_all_best_sales =============
    public function see_all_best_sales() {
        $CI = & get_instance();
        $CI->load->library('lreport');
        $CI->load->library('occational');
        $this->auth->check_admin_auth();
        $CI->load->model('Invoices');
        $CI->load->model('Customers');
        if (!$this->auth->is_logged()) {
            $this->output->set_header("Location: " . base_url() . 'Admin_dashboard/login', TRUE, 302);
        }
        $company_info = $CI->Customers->retrieve_company();
        $best_saler_product_list = $CI->Invoices->best_saler_product_list();
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $data = array(
            'title'                   => display('dashboard'),
            'best_saler_product_list' => $best_saler_product_list,
            'company_info'            => $company_info,
            'currency'                => $currency_details[0]['currency'],
            'position'                => $currency_details[0]['currency_position'],
        );

        $content = $CI->parser->parse('report/best_saler_product_list', $data, true);
        $this->template->full_admin_html_view($content);
    }



//    ============ its for todays_customer_receipt =============
    public function todays_customer_receipt() {
        $CI = & get_instance();
        //$CI->load->library('lreport');
        $CI->load->library('occational');
        if (!$this->auth->is_logged()) {
            $this->output->set_header("Location: " . base_url() . 'Admin_dashboard/login', TRUE, 302);
        }
        $this->auth->check_admin_auth();
        $CI->load->model('Invoices');
        $today = date('Y-m-d');

        $company_info = $CI->Customers->retrieve_company();
        // $all_customer = $this->db->select('*')->from('customer_information')->get()->result();
        
        $created_by   = $this->session->userdata('user_id');
        $all_customer = $this->db->select('*')
        ->from('customer_information')
        ->where('create_by',$created_by)
        ->get()
        ->result();

        
        $todays_customer_receipt = $CI->Invoices->todays_customer_receipt($today);
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $data = array(
            'title'                   => "Received From Customer",
            'all_customer'            => $all_customer,
            'todays_customer_receipt' => $todays_customer_receipt,
            'today'                   => $today,
            'company_info'            => $company_info,
            'currency'                => $currency_details[0]['currency'],
            'position'                => $currency_details[0]['currency_position'],
            'software_info'           => $currency_details,
            'customer_info'           => '',
            'company'                 => $company_info,
        );
        $content = $CI->parser->parse('report/todays_customer_receipt', $data, true);
        $this->template->full_admin_html_view($content);
    }

//    ============ its for todays_customer_receipt =============
    public function filter_customer_wise_receipt() {
        $CI = & get_instance();
        $CI->load->library('lreport');
        $CI->load->library('occational');

        $w = & get_instance();
        $w->load->model('Ppurchases');
        $CI->load->model('Web_settings');

        $company_info = $w->Ppurchases->retrieve_company();
        // print_r( $company_info); 
        $setting=  $CI->Web_settings->retrieve_setting_editdata();
        // print_r( $setting); die();
        if (!$this->auth->is_logged()) {
            $this->output->set_header("Location: " . base_url() . 'Admin_dashboard/login', TRUE, 302);
        }
        $this->auth->check_admin_auth();
        $CI->load->model('Invoices');
        $customer_id = $this->input->post('customer_id',TRUE);
        $from_date   = $this->input->post('from_date',TRUE);
        $today       = date('Y-m-d');
            
        // $company_info = $CI->Customers->retrieve_company();

        $created_by   = $this->session->userdata('user_id');
        $all_customer = $this->db->select('*')
        ->from('customer_information')
        ->where('create_by',$created_by)
        ->get()
        ->result();

        // ->where('created_by',$purchase_detail[0]['create_by'])


        // print_r( $all_customer); die();
        $filter_customer_wise_receipt = $CI->Invoices->filter_customer_wise_receipt($customer_id, $from_date);
        $todays_customer_receipt = $CI->Invoices->todays_customer_receipt($today);
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();


        $data = array(
            'title'                   => "Received From Customer",
            'all_customer'            => $all_customer,
            'todays_customer_receipt' => $filter_customer_wise_receipt,
            'today'                   => $today,
            'customer_info'           =>  $CI->Invoices->customerinfo_rpt($customer_id),
            // 'company_info'            => $company_info,
            'currency'                => $currency_details[0]['currency'],
            'position'                => $currency_details[0]['currency_position'],
            // 'software_info'           => $currency_details,
            // 'company'                 => $company_info,
            'logo'  =>(!empty($setting[0]['invoice_logo'])?$setting[0]['invoice_logo']:$company_info[0]['logo']),  
            'company'=>(!empty($datacontent[0]['company_name'])?$datacontent[0]['company_name']:$company_info[0]['company_name']),   
            'phone'=>(!empty($datacontent[0]['mobile'])?$datacontent[0]['mobile']:$company_info[0]['mobile']),   
            'email'=>(!empty($datacontent[0]['email'])?$datacontent[0]['email']:$company_info[0]['email']),   
            'address'=>(!empty($datacontent[0]['address'])?$datacontent[0]['address']:$company_info[0]['address']), 
        );
// print_r($data);

        $content = $CI->parser->parse('report/todays_customer_receipt', $data,true);
        $this->template->full_admin_html_view($content);
    }





    //Today All Report
    public function all_report() {
        $CI = & get_instance();
        $CI->load->library('lreport');
        if (!$this->auth->is_logged()) {
            $this->output->set_header("Location: " . base_url() . 'Admin_dashboard/login', TRUE, 302);
        }
          $user_type = $this->session->userdata('user_type');
            $content = $CI->lreport->retrieve_all_reports();
            $this->template->full_admin_html_view($content);
    }

    #==============Todays_sales_report============#

    public function todays_sales_report() {
        $CI = & get_instance();
        $CI->load->library('lreport');
        $this->auth->check_admin_auth();

        #
        #pagination starts
        #
        $config["base_url"] = base_url('Admin_dashboard/todays_sales_report/');
        $config["total_rows"] = $this->Reports->todays_sales_report_count();
        $config["per_page"] = 50;
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;
        /* This Application Must Be Used With BootStrap 3 * */
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $links = $this->pagination->create_links();
        #
        #pagination ends
        # 

        $content = $CI->lreport->todays_sales_report($links, $config["per_page"], $page);
        $this->template->full_admin_html_view($content);
    }
 // ========================= User Sales Report ==================

    #==============Todays_sales_report============#

    public function user_sales_report() {
        $CI = & get_instance();
        $CI->load->library('lreport');
        $user_id = (!empty($this->input->get('user_id'))?$this->input->get('user_id'):$this->session->userdata('user_id'));
        $star_date = (!empty($this->input->get('from_date'))?$this->input->get('from_date'):date('Y-m-d'));
        $end_date = (!empty($this->input->get('to_date'))?$this->input->get('to_date'):date('Y-m-d'));
        $this->auth->check_admin_auth();
        #
        #pagination starts
        #
        $config["base_url"] = base_url('Admin_dashboard/user_sales_report/');
        $config["total_rows"] = $this->Reports->user_sales_count($star_date,$end_date,$user_id);
        $config["per_page"] = 50;
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;
        /* This Application Must Be Used With BootStrap 3 * */
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $links = $this->pagination->create_links();
        #
        #pagination ends
        # 

        $content = $CI->lreport->user_sales_report($links, $config["per_page"], $page,$star_date,$end_date,$user_id);
        $this->template->full_admin_html_view($content);
    }
       public function forgot()
        {
                 $CI = & get_instance();
        $this->load->model('Users');
        
                     $this->form_validation->set_rules('email', 'Email', 'required|valid_email'); 
   
                $email = $this->input->post('email');  
                 $clean = $this->security->xss_clean($email);

            $userInfo = $CI->Users->getUserInfoByEmail($clean);
    //  print_r($userInfo);
                $email = $this->input->post('email');  
                 $clean = $this->security->xss_clean($email);
   $to = $email;
                
                
                if(empty($userInfo)){
                    $this->session->set_flashdata('flash_message', 'We cant find your email address');
                  //  redirect(site_url().'Admin_dashboard/login');
                }   
                
              
  
  $token = $CI->Users->insertToken($userInfo[0]['unique_id']);        
      
                             
                $qstring = $this->base64url_encode($token);                  
                $url = site_url() . 'Admin_dashboard/reset_password/token/' . $qstring;
                $link = '<a href="' . $url . '">' . $url . '</a>'; 
                $subject="Stockeai - Reset Password";
                $message = '';                     
                $message .= '<strong>Greeting from Stockeai</strong><br>
There was a request to change your password!
If you did not make this request then please ignore this email.
Otherwise, please click this link to change your password:</strong><br>';
                $message .= '<strong>' . $link.'</strong> ';             

        

        try {
          $setting_detail = $this->db->select('*')->from('email_config')->get()->row();

    

        $config = Array(

        'protocol'  => $setting_detail->protocol,

        'smtp_host' => $setting_detail->smtp_host,

        'smtp_port' => $setting_detail->smtp_port,

        'smtp_user' => $setting_detail->smtp_user,

        'smtp_pass' => $setting_detail->smtp_pass,

        'mailtype'  => 'html', 

        'charset'   => 'utf-8',

        'wordwrap'  => TRUE

        );
     $this->load->library('email', $config);

        $this->email->set_newline("\r\n");

        $this->email->from($setting_detail->smtp_user);

        $this->email->to($to);

        $this->email->subject($subject);

        $this->email->message($message);

       // $this->email->attach($file_path);

        $check_email = $this->test_input($email);
        $this->email->send();
            // echo 'Message has been sent';
            echo "<script>alert('Email Send Successfully')</script>";
        
         sleep(2);
redirect(base_url()."Admin_dashboard/login");
  $this->session->set_flashdata('flash_message', 'Your password has been updated. You may now login');
                // if($result){
                //    echo "<script>alert('Inserted Success')</script>";
                // }else{
                //     echo "<script>alert('Inserted Failed !!!')</script>";
                // }
            // echo "<script>window.location.href='select_quote.html'</script>";
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
       
    
                
            
            
    
    }
      public function test_input($data) {

        $data = trim($data);

        $data = stripslashes($data);

        $data = htmlspecialchars($data);

        return $data;

    }

           public function reset_password()
        {
                $CI = & get_instance();
        $this->load->model('Users');
            $token = $this->base64url_decode($this->uri->segment(4));                  
            $cleanToken = $this->security->xss_clean($token);
            
            $user_info = $CI->Users->isTokenValid($cleanToken); //either false or array();               
          
            if(!$user_info){
                $this->session->set_flashdata('flash_message', 'Token is invalid or expired');
                redirect(site_url().'Admin_dashboard/login');
            }            
            $data = array(
                'firstName'=> $user_info->username, 
                'email'=>$user_info->email_id, 
//                'user_id'=>$user_info->id, 
                'token'=>$this->base64url_encode($token)
            );
           
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
            $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');              
            
            if ($this->form_validation->run() == FALSE) {   
               
                $this->load->view('reset_password', $data);
    
            }else{
                                
                $this->load->library('password');                 
                $post = $this->input->post(NULL, TRUE);                
                $cleanPost = $this->security->xss_clean($post);                
              //  $hashed = $this->password->create_hash($cleanPost['password']);      
                
                  $hashed=md5('gef'.$cleanPost['password']);     
                $cleanPost['password'] = $hashed;
                $cleanPost['unique_id'] = $user_info->unique_id;
                unset($cleanPost['passconf']);                
                if(!$CI->Users->updatePassword($cleanPost)){
                    $this->session->set_flashdata('flash_message', 'There was a problem updating your password');
                }else{
                    ?>
<script type="text/javascript">
window.history.go(-2);
</script>
<?php
                    sleep(5);
                   $this->session->set_flashdata('flash_message', 'Your password has been updated. You may now login');
                      header("Location:".base_url()."/Admin_dashboard/login/");
                }
               // redirect(site_url().'Admin_dashboard/login');                
            }
        }
            public function base64url_encode($data) { 
      return rtrim(strtr(base64_encode($data), '+/', '-_'), '='); 
    } 

    public function base64url_decode($data) { 
      return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT)); 
    } 
    #================todays_purchase_report========#

    public function todays_purchase_report() {
        $CI = & get_instance();
        $CI->load->library('lreport');
        $this->auth->check_admin_auth();

        #
        #pagination starts
        #
        $config["base_url"] = base_url('Admin_dashboard/todays_purchase_report/');
        $config["total_rows"] = $this->Reports->todays_sales_report_count();
        $config["per_page"] = 50;
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;
        /* This Application Must Be Used With BootStrap 3 * */
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $links = $this->pagination->create_links();
        #
        #pagination ends
        # 

        $content = $CI->lreport->todays_purchase_report($links, $config["per_page"], $page);
        $this->template->full_admin_html_view($content);
    }

    #=============Total purchase_report_category_wise ===================#

    public function purchase_report_category_wise() {
        $CI = & get_instance();
        $CI->load->library('lreport');
        $this->auth->check_admin_auth();

        #
        #pagination starts
        #
        $config["base_url"] = base_url('Admin_dashboard/purchase_report_category_wise/');
        $config["total_rows"] = $this->Reports->purchase_report_category_wise_count();
        $config["per_page"] = 50;
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;
        /* This Application Must Be Used With BootStrap 3 * */
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $links = $this->pagination->create_links();

        #
        #pagination ends
        # 

        $content = $CI->lreport->purchase_report_category_wise($links, $config["per_page"], $page);
        $this->template->full_admin_html_view($content);
    }

//    ========= its for filter_purchase_report_category_wise ==============
    public function filter_purchase_report_category_wise() {
        $CI = & get_instance();
        $CI->load->library('lreport');
        $category  = $this->input->post('category',TRUE);
        $from_date = $this->input->post('from_date',TRUE);
        $to_date   = $this->input->post('to_date',TRUE);
        $content   = $this->lreport->filter_purchase_report_category_wise($category, $from_date, $to_date);
        $this->template->full_admin_html_view($content);
    }

//    ============== sales report category wise =================
    public function sales_report_category_wise() {
        $CI = & get_instance();
        $CI->load->library('lreport');
        $this->auth->check_admin_auth();

        #
        #pagination starts
        #
        $config["base_url"] = base_url('Admin_dashboard/sales_report_category_wise/');
        $config["total_rows"] = $this->Reports->sales_report_category_wise_count();
        $config["per_page"] = 50;
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;
        /* This Application Must Be Used With BootStrap 3 * */
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $links = $this->pagination->create_links();

        #
        #pagination ends
        # 

        $content = $CI->lreport->sales_report_category_wise($links, $config["per_page"], $page);
        $this->template->full_admin_html_view($content);
    }

//    ========= its for filter_sales_report_category_wise ==============
    public function filter_sales_report_category_wise() {
        $CI = & get_instance();
        $CI->load->library('lreport');
        $category  = $this->input->post('category',TRUE);
        $from_date = $this->input->post('from_date',TRUE);
        $to_date   = $this->input->post('to_date',TRUE);
        $content   = $this->lreport->filter_sales_report_category_wise($category, $from_date, $to_date);
        $this->template->full_admin_html_view($content);
    }

    #=============Total profit report===================#

    public function total_profit_report() {
        $CI = & get_instance();
        $CI->load->library('lreport');
        $CI->load->model('Reports');
        $this->auth->check_admin_auth();

        #
        #pagination starts
        #
        $config["base_url"] = base_url('Admin_dashboard/total_profit_report/');
        $config["total_rows"] = $this->Reports->total_profit_report_count();
        $config["per_page"] = 50;
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;
        /* This Application Must Be Used With BootStrap 3 * */
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $links = $this->pagination->create_links();
        #
        #pagination ends
        #  
        $content = $this->lreport->total_profit_report($links, $config["per_page"], $page);

        $this->template->full_admin_html_view($content);
    }

    #============Date wise sales report==============#

    public function retrieve_dateWise_SalesReports() {
        $CI = & get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lreport');
        $from_date = $this->input->get('from_date');
        $to_date   = $this->input->get('to_date');
         $alldata  = $this->input->get('all');
        if(!empty($alldata)){
      $perpagdata  = $this->Reports->count_retrieve_dateWise_SalesReports($from_date, $to_date);
        }else{
          $perpagdata = 50;  
        }
        $config["base_url"] = base_url('Admin_dashboard/retrieve_dateWise_SalesReports/');
        $config["total_rows"] = $this->Reports->count_retrieve_dateWise_SalesReports($from_date, $to_date);
        $config["per_page"] = $perpagdata;
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;
        $config['suffix'] = '?' . http_build_query($_GET, '', '&');
        $config['first_url'] = $config["base_url"] . $config['suffix'];
        /* This Application Must Be Used With BootStrap 3 * */
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $links = $this->pagination->create_links();

        $content = $CI->lreport->retrieve_dateWise_SalesReports($from_date, $to_date, $links, $config["per_page"], $page);
        $this->template->full_admin_html_view($content);
    }


// ===================== Due Report Start=============================

    public function retrieve_dateWise_DueReports() {
        $CI = & get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lreport');
        $from_date =(!empty($this->input->get('from_date'))?$this->input->get('from_date'):date('Y-m-d')) ;
        $to_date = (!empty($this->input->get('to_date'))?$this->input->get('to_date'):date('Y-m-d'));
         $alldata = $this->input->get('all');
        if(!empty($alldata)){
      $perpagdata = $this->Reports->count_retrieve_dateWise_SalesReports($from_date, $to_date);
        }else{
          $perpagdata = 50;  
        }
        $config["base_url"] = base_url('Admin_dashboard/retrieve_dateWise_DueReports/');
        $config["total_rows"] = $this->Reports->count_retrieve_dateWise_SalesReports($from_date, $to_date);
        $config["per_page"] = $perpagdata;
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;
        $config['suffix'] = '?' . http_build_query($_GET, '', '&');
        $config['first_url'] = $config["base_url"] . $config['suffix'];
        /* This Application Must Be Used With BootStrap 3 * */
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $links = $this->pagination->create_links();

        $content = $CI->lreport->retrieve_dateWise_DueReports($from_date, $to_date, $links, $config["per_page"], $page);
        $this->template->full_admin_html_view($content);
    }
    // ====================  Due Report End ============================
    #==============Date wise purchase report=============#

    public function retrieve_dateWise_PurchaseReports() {
        $CI = & get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lreport');
        $start_date = $this->input->get('from_date');
        $end_date   = $this->input->get('to_date');
        #exit;
        #pagination starts
        #
         $alldata = $this->input->get('all');
        if(!empty($alldata)){
            $perpagdata = $this->Reports->count_retrieve_dateWise_PurchaseReports($start_date, $end_date);
        }else{
          $perpagdata = 25;  
        }
        $config["base_url"] = base_url('Admin_dashboard/retrieve_dateWise_PurchaseReports/');
        $config["total_rows"] = $this->Reports->count_retrieve_dateWise_PurchaseReports($start_date, $end_date);
        $config["per_page"] = $perpagdata;
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;
        $config['suffix'] = '?' . http_build_query($_GET, '', '&');
        $config['first_url'] = $config["base_url"] . $config['suffix'];
        /* This Application Must Be Used With BootStrap 3 * */
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $links = $this->pagination->create_links();
        #   
        $content = $CI->lreport->retrieve_dateWise_PurchaseReports($start_date, $end_date, $links, $config["per_page"], $page);
        $this->template->full_admin_html_view($content);
    }

    #==============Product sales report date wise===========#

    public function product_sales_reports_date_wise() {
        $CI = & get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lreport');
        $CI->load->model('Reports');
        #
        #pagination starts
        #
        $config["base_url"] = base_url('Admin_dashboard/product_sales_reports_date_wise/');
        $config["total_rows"] = $this->Reports->retrieve_product_sales_report_count();
        $config["per_page"] = 25;
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;
        /* This Application Must Be Used With BootStrap 3 * */
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $links = $this->pagination->create_links();
        #
        #pagination ends
        #  
        $content = $this->lreport->get_products_report_sales_view($links, $config["per_page"], $page);

        $this->template->full_admin_html_view($content);
    }

    #==============Date wise purchase report=============#

    public function retrieve_dateWise_profit_report() {
        $CI = & get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lreport');
        $CI->load->model('Reports');
        $start_date = $this->input->get('from_date');
        $end_date   = $this->input->get('to_date');
        #
        #pagination starts
        #
        $config["base_url"] = base_url('Admin_dashboard/retrieve_dateWise_profit_report/');
        $config["total_rows"] = $this->Reports->retrieve_dateWise_profit_report_count($start_date, $end_date);
        $config["per_page"] = 25;
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;
        $config['suffix'] = '?' . http_build_query($_GET, '', '&');
        $config['first_url'] = $config["base_url"] . $config['suffix'];
        /* This Application Must Be Used With BootStrap 3 * */
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $links = $this->pagination->create_links();
        #
        #pagination ends
        #  
        $content = $this->lreport->retrieve_dateWise_profit_report($start_date, $end_date, $links, $config["per_page"], $page);

        $this->template->full_admin_html_view($content);
    }

    #==============Product sales search reports============#

    public function product_sales_search_reports() {
        $CI = & get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lreport');
        $CI->load->model('Reports');
        $from_date  = $this->input->get('from_date');
        $to_date    = $this->input->get('to_date');
        $product_id = $this->input->get('product_id');
        #
        #pagination starts
        #
        $config["base_url"] = base_url('Admin_dashboard/product_sales_search_reports/');
        $config["total_rows"] = $this->Reports->retrieve_product_search_sales_report_count($from_date, $to_date,$product_id);
        $config["per_page"] = 25;
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;
        $config['suffix'] = '?' . http_build_query($_GET, '', '&');
        $config['first_url'] = $config["base_url"] . $config['suffix'];
        /* This Application Must Be Used With BootStrap 3 * */
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $links = $this->pagination->create_links();
        #
        #pagination ends
        #  
        $content = $this->lreport->get_products_search_report($from_date, $to_date,$product_id, $links, $config["per_page"], $page);

        $this->template->full_admin_html_view($content);
    }

    #============User login=========#

    public function login() {


        
        if ($this->auth->is_logged()) {
            $this->output->set_header("Location: " . base_url() . 'Admin_dashboard', TRUE, 302);
        }
        $data['title'] = display('admin_login_area');
        $content = $this->parser->parse('user/admin_login_form', $data, true);
        $this->template->full_admin_html_view($content);
    }

 public function userauth() {

 $this->load->library('session');
 $this->session;

  $query='select * from user_login where username="'.$_REQUEST['username'].'"';
  $query=$this->db->query($query);
  $row=$query->result_array();

$u_type=$row[0]['u_type'];
         $this->session->set_userdata('u_type',$u_type); 
         $this->session->set_userdata('u_name',$row[0]['username']);
         $this->session->set_userdata('unique_id',$row[0]['unique_id']); 

$sql='select * from user_login where username="'.$_POST['username'].'"';


$query=$this->db->query($sql);

$row=$query->result_array();
$user_id=$row[0]['user_id']; 
$unique_id=$row[0]['unique_id']; 
$this->session->set_userdata('unique_id',$unique_id); 
$query1='select * from company_information where company_id="'.$row[0]['cid'].'"';

$query1=$this->db->query($query1);

$row1=$query1->result_array();
$logo=$row1[0]['logo']; 
   $this->session->set_userdata('logo',$row1[0]['logo']); 
   $this->session->set_userdata('company_name',$row1[0]['company_name']);


$sql='select * from sec_userrole  where user_id="'.$user_id.'"';

echo $sql;

$query=$this->db->query($sql);

echo $this->db->last_query(); 

$row=$query->result_array();
 $num=$query->num_rows();
 if($num>0)
 {
 $roleid=$row[0]['roleid'];

 $sql='SELECT GROUP_CONCAT(CONCAT(`menu`, " - ", `create`,`price`,`update`,`delete`) SEPARATOR ", ") AS items FROM role_permission where role_id="'.$roleid.'"';
 echo $sql;

$query=$this->db->query($sql);
$row=$query->result_array();
$sale=array();$product=array();

foreach($row as $val){
foreach($val as $perm_data){
     $perm_data=explode(',',$perm_data);
     $this->session->set_userdata('perm_data',$perm_data); 
}



}

   }



     
       //admin role access
$sql2='select * from company_assignrole  where user_id="'.$user_id.'"';
 $query=$this->db->query($sql2);
 $row=$query->result_array();
 $nums=$query->num_rows();
// print_r($nums); die();
// echo $sql2; die();
 if($nums>0)
 {
 $roleid=$row[0]['roleid'];
//  print_r($roleid);
 $sql2='SELECT GROUP_CONCAT(CONCAT(`menu`, " - ", `create`) SEPARATOR ", ") AS items FROM super_permission where role_id="'.$roleid.'"';
//  echo $sql2; die();
$query=$this->db->query($sql2);
$row2=$query->result_array();
$sale=array();$product=array();
// print_r($row2); die();
     foreach($row2 as $val1){
     foreach($val1 as $admin_data){
     $admin_data=explode(',',$admin_data);
    //  print_r($admin_data); die();
     $this->session->set_userdata('admin_data',$admin_data);
      }
     }
    }
        if (!$this->input->post('username',TRUE)) {
            $this->output->set_header("Location: " . base_url() . 'Admin_dashboard/login', TRUE, 302);
        }
        if ($this->auth->is_logged()) {
            $this->output->set_header("Location: " . base_url() . 'Admin_dashboard', TRUE, 302);
        }
        $dat['username'] = $this->input->post('username',TRUE);
        $dat['password']= $this->input->post('password',TRUE);
        $dat['otp']=$otp=rand(1000,9999);
        $this->session->set_userdata($dat);
        $data['title'] = display('admin_login_area');
        $from_email = "info@gmail.com";
         $to_email = $this->input->post('username');
         //Load email library
         $this->load->library('email');
         $this->email->from($from_email, 'kptest');
         $this->email->to($to_email);
         $this->email->subject('Email Test');
         $this->email->message('One time OTP Passkey .'.$otp);
         //Send mail
         if($this->email->send())
         $this->session->set_flashdata("email_sent","Email sent successfully.");
         else
         $this->session->set_flashdata("email_sent","Error in sending Email.");
        //$this->load->view('user/admin_auth_form', $data, true);
        //echo $this->session->userdata('otp');
     redirect(base_url() . 'Admin_dashboard/do_login');
       echo $content = $this->parser->parse('user/admin_auth_form', $data, true);
        //$this->template->full_admin_html_view($content);
    }













    #==============Valid user check=======#

     public function do_login() {
        $error = '';
        $setting_detail = $this->Web_settings->retrieve_setting_editdata();

        if ($setting_detail[0]['captcha'] == 0 && $setting_detail[0]['secret_key'] != null && $setting_detail[0]['site_key'] != null) {

            $this->form_validation->set_rules('g-recaptcha-response', 'recaptcha validation', 'required|callback_validate_captcha');
            $this->form_validation->set_message('validate_captcha', 'Please check the the captcha form');

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_userdata(array('error_message' => display('please_enter_valid_captcha')));
                $this->output->set_header("Location: " . base_url() . 'Admin_dashboard/login', TRUE, 302);
            } else {
                $username = $this->input->post('username',TRUE);
                $password = $this->input->post('password',TRUE);
                if ($username == '' || $password == '' || $this->auth->login($username, $password) === FALSE) {
                    $error = display('wrong_username_or_password');
                }
                if ($error != '') {
                    $this->session->set_userdata(array('error_message' => $error));
                    $this->output->set_header("Location: " . base_url() . 'Admin_dashboard/login', TRUE, 302);
                } else {
                    $this->output->set_header("Location: " . base_url(), TRUE, 302);
                }
            }
        } else {
            // $username = $this->input->post('username',TRUE);
            // $password = $this->input->post('password',TRUE);
            //if ($this->session->userdata('otp')==$this->input->post('otp',TRUE)) {
            if ($this->session->userdata('otp')) {
             
            $username =  $this->session->userdata('username');
            $password = $this->session->userdata('password');
            
            if ($username == '' || $password == '' || $this->auth->login($username, $password) === FALSE) {
                $error = display('wrong_username_or_password');
            }
            }else{
            $error = 'invalid otp';
        }
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('password');
            if ($error != '') {
                $this->session->set_userdata(array('error_message' => $error));
                $this->output->set_header("Location: " . base_url() . 'Admin_dashboard/login', TRUE, 302);
            } else {

                 // Remove Sql Mode Only full group by
                $sqlmode= $this->db->query('select @@sql_mode')->row_array();
                if(stristr(@$sqlmode['@@sql_mode'], 'ONLY_FULL_GROUP_BY')){
                     $this->db->query("SET GLOBAL sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''))");
                     redirect(base_url());
                }

                $this->output->set_header("Location: " . base_url(), TRUE, 302);
            }

        }
    }

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

    //Valid captcha check
    function validate_captcha() {
        $setting_detail = $this->Web_settings->retrieve_setting_editdata();
        $captcha = $this->input->post('g-recaptcha-response',TRUE);
        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . $setting_detail[0]['secret_key'] . ".&response=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']);
        if ($response . 'success' == false) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    #===============Logout=======#

    public function logout() {
        if ($this->auth->logout())
            $this->output->set_header("Location: " . base_url() . 'Admin_dashboard/login', TRUE, 302);
    }

    #=============Edit Profile======#

    public function edit_profile() {
        $CI = & get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('luser');
        $content = $CI->luser->edit_profile_form();
        $this->template->full_admin_html_view($content);
    }

    #=============Update Profile========#

    public function update_profile() {
        $CI = & get_instance();
        $this->auth->check_admin_auth();
        $CI->load->model('Users');
        $this->Users->profile_update();
        $this->session->set_userdata(array('message' => display('successfully_updated')));
        redirect(base_url('Admin_dashboard/edit_profile'));
    }

    #=============Change Password=========# 

    public function change_password_form() {
        $CI = & get_instance();
        $this->auth->check_admin_auth();
        $content = $CI->parser->parse('user/change_password', array('title' => display('change_password')), true);
        $this->template->full_admin_html_view($content);
    }

    #============Change Password===========#

    public function change_password() {
        $CI = & get_instance();
        $this->auth->check_admin_auth();
        $CI->load->model('Users');

        $error = '';
        $email = $this->input->post('email',TRUE);
        $old_password = $this->input->post('old_password',TRUE);
        $new_password = $this->input->post('password',TRUE);
        $repassword = $this->input->post('repassword',TRUE);

        if ($email == '' || $old_password == '' || $new_password == '') {
            $error = display('blank_field_does_not_accept');
        } else if ($email != $this->session->userdata('u_name')) {
            $error = display('Wrong Username');
        } else if (strlen($new_password) < 6) {
            $error = display('new_password_at_least_six_character');
        } else if ($new_password != $repassword) {
            $error = display('password_and_repassword_does_not_match');
        } else if ($CI->Users->change_password($email, $old_password, $new_password) === FALSE) {
            $error = display('you_are_not_authorised_person');
        }

        if ($error != '') {
            $this->session->set_userdata(array('error_message' => $error));
            $this->output->set_header("Location: " . base_url() . 'Admin_dashboard/change_password_form', TRUE, 302);
        } else {
            $this->session->set_userdata(array('message' => display('successfully_changed_password')));
            $this->output->set_header("Location: " . base_url() . 'Admin_dashboard/change_password_form', TRUE, 302);
        }
    }
  #==============Closing form==========#

    public function closing() {
        $CI = & get_instance();
        $CI->load->model('Reports');
        $data = array('title' => "Reports | Daily Closing");
        $data = $this->Reports->accounts_closing_data();
        $content = $this->parser->parse('accounts/closing_form', $data, true);
        $this->template->full_admin_html_view($content);
    }

  //Closing report
    public function closing_report()
    {
        $CI = & get_instance();
        $CI->load->library('laccounts');
        $content =$this->laccounts->daily_closing_list();
        $this->template->full_admin_html_view($content);
    }
    // Date wise closing reports 
    public function date_wise_closing_reports()
    {    
        $CI = & get_instance();
        $CI->load->library('laccounts');
         $CI->load->model('Accounts');
        $from_date = $this->input->get('from_date');       
        $to_date = $this->input->get('to_date');
        #
        #pagination starts
        #
        $config["base_url"]     = base_url('Admin_dashboard/date_wise_closing_reports/');
        $config["total_rows"]   = $this->Accounts->get_date_wise_closing_report_count($from_date,$to_date);
        $config["per_page"] = 50;
        $config["uri_segment"] = 3;
        $config["num_links"] = 5; 
        $config['suffix'] = '?'. http_build_query($_GET, '', '&');
        $config['first_url'] = $config["base_url"] . $config['suffix'];
        /* This Application Must Be Used With BootStrap 3 * */
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $links = $this->pagination->create_links();
        #
        #pagination ends
        # 
        
        $content = $this->laccounts->get_date_wise_closing_reports($links,$config["per_page"],$page,$from_date,$to_date );
       
        $this->template->full_admin_html_view($content);
    }
    
    //password recovery 
    public function password_recovery(){
         $CI = & get_instance();
         $CI->load->model('Settings');
    $this->form_validation->set_rules('rec_email', display('email'), 'required|valid_email|max_length[100]|trim');  
    $userData = array(
            'email' => $this->input->post('rec_email',TRUE)
        );
    if ($this->form_validation->run())
        {
    $user = $this->Settings->password_recovery($userData);
     $ptoken = date('ymdhis');
        if($user->num_rows() > 0) {
            $email =$user->row()->username;
            $precdat = array(
            'username'      => $email,
            'security_code' => $ptoken,
                
        );
        
        $this->db->where('username',$email)
            ->update('user_login',$precdat);
             $send_email = '';
             if (!empty($email)) {
                $send_email = $this->setmail($email,$ptoken);
                
             }
           if($send_email){
             $this->session->set_userdata(array('message' => 'Forget link sent to your email. Please Check your email'));
          // $user_data['success']    = 'Check Your email';
          //  $user_data['status']    = 1; 
           }else{
              $this->session->set_userdata(array('message' => 'Sorry Email Not Send'));
           // $user_data['exception'] = 'Sorry Email Not Send';
           // $user_data['status']    = 0; 
           }

        }else{
             $this->session->set_userdata(array('message' => 'Email Not found'));
            // $user_data['exception']='Email Not found';
            // $user_data['status']   = 0; 
        }
    }else{
         $this->session->set_userdata(array('message' => 'Please try again'));
            // $user_data['exception']='please try again';
            // $user_data['status']   = 0; 
        }

         echo json_encode($user_data);
    }
    
     public function setmail($email,$ptoken)
    {
$msg = "Hi,
There was a request to change your password!
If you did not make this request then please ignore this email.
Otherwise, please click this link to change your password: ".base_url().'Admin_dashboard/recovery_form/'.$ptoken;

// send email
mail($email,"passwordrecovery",$msg);
return true;
}

public function recovery_form($token_id = null){
        $CI = & get_instance();
        $CI->load->model('Settings');
        $tokeninfo = $this->Settings->token_matching($token_id);
      if($tokeninfo->num_rows() > 0) {
        $data['token'] = $token_id;
        $data['title'] = display('recovery_form');
        $this->load->view('user/user_recovery_form', $data);
      }else{
        redirect(base_url('Admin_dashboard/login'));  
      }
       
    
}
public function recovery_update(){
    $token = $this->input->post('token',TRUE);
    $newpassword = $this->input->post('newpassword',TRUE);
    $userdata = array(
        'password'      =>  md5("gef" . $newpassword),
        'security_code' => '001'
        );
        $this->db->where('security_code',$token)
            ->update('user_login',$userdata);
            redirect(base_url('Admin_dashboard/login')); 
}

 // Shipping cost report
public function retrieve_dateWise_Shippingcost() {
        $CI = & get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lreport');
        $from_date =(!empty($this->input->get('from_date'))?$this->input->get('from_date'):date('Y-m-d')) ;
        $to_date = (!empty($this->input->get('to_date'))?$this->input->get('to_date'):date('Y-m-d'));
         $alldata = $this->input->get('all');
        if(!empty($alldata)){
      $perpagdata = $this->Reports->count_retrieve_dateWise_SalesReports($from_date, $to_date);
        }else{
          $perpagdata = 50;  
        }
        $config["base_url"] = base_url('Admin_dashboard/retrieve_dateWise_Shippingcost/');
        $config["total_rows"] = $this->Reports->count_retrieve_dateWise_SalesReports($from_date, $to_date);
        $config["per_page"] = $perpagdata;
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;
        $config['suffix'] = '?' . http_build_query($_GET, '', '&');
        $config['first_url'] = $config["base_url"] . $config['suffix'];
        /* This Application Must Be Used With BootStrap 3 * */
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $links = $this->pagination->create_links();

        $content = $CI->lreport->retrieve_dateWise_shippingcost($from_date, $to_date, $links, $config["per_page"], $page);
        $this->template->full_admin_html_view($content);
    }

    //sales return list
      public function sales_return() {
        $CI = & get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lreport');
        $CI->load->model('Reports');
        $from_date = $this->input->post('from_date',TRUE);
        $to_date = $this->input->post('to_date',TRUE);
        $start = (!empty($from_date)?$from_date:date('Y-m-d'));
        $end = (!empty($to_date)?$to_date:date('Y-m-d'));
        #
        #pagination starts
        #
        $config["base_url"] = base_url('Admin_dashboard/sales_return/');
        $config["total_rows"] = $this->Reports->sales_return_count($start,$end);
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;
        /* This Application Must Be Used With BootStrap 3 * */
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $links = $this->pagination->create_links();
        #
        #pagination ends
        #  
        $content = $this->lreport->sales_return_data($links, $config["per_page"], $page,$start,$end);
        $this->template->full_admin_html_view($content);
    }
    // supplier return report
      public function supplier_return() {
        $CI = & get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lreport');
        $CI->load->model('Reports');
        $from_date = $this->input->post('from_date',TRUE);
        $to_date   = $this->input->post('to_date',TRUE);
        $start     = (!empty($from_date)?$from_date:date('Y-m-d'));
        $end       = (!empty($to_date)?$to_date:date('Y-m-d'));
        #
        #pagination starts
        #
        $config["base_url"] = base_url('Admin_dashboard/supplier_return/');
        $config["total_rows"] = $this->Reports->count_supplier_return($start,$end);
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;
        /* This Application Must Be Used With BootStrap 3 * */
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $links = $this->pagination->create_links();
        #
        #pagination ends
        #  
        $content = $this->lreport->supplier_return_data($links, $config["per_page"], $page,$start,$end);
        $this->template->full_admin_html_view($content);
    }
    //  TAX Report start
    public function retrieve_dateWise_tax() {
        $CI = & get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lreport');
        $from_date =(!empty($this->input->get('from_date'))?$this->input->get('from_date'):date('Y-m-d')) ;
        $to_date = (!empty($this->input->get('to_date'))?$this->input->get('to_date'):date('Y-m-d'));
         $alldata = $this->input->get('all');
        if(!empty($alldata)){
      $perpagdata = $this->Reports->count_retrieve_dateWise_SalesReports($from_date, $to_date);
        }else{
          $perpagdata = 50;  
        }
        $config["base_url"] = base_url('Admin_dashboard/retrieve_dateWise_tax/');
        $config["total_rows"] = $this->Reports->count_retrieve_dateWise_SalesReports($from_date, $to_date);
        $config["per_page"] = $perpagdata;
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;
        $config['suffix'] = '?' . http_build_query($_GET, '', '&');
        $config['first_url'] = $config["base_url"] . $config['suffix'];
        /* This Application Must Be Used With BootStrap 3 * */
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $links = $this->pagination->create_links();

        $content = $CI->lreport->retrieve_dateWise_tax($from_date, $to_date, $links, $config["per_page"], $page);
        $this->template->full_admin_html_view($content);
    }

}
