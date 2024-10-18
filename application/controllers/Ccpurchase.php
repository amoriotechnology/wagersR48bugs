<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ccpurchase extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->db->query('SET SESSION sql_mode = ""');
            $this->load->model(array(
            'accounts_model','Purchases','Web_settings'
        )); 
    }

    public function index() {
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('llpurchase');
        $content = $CI->llpurchase->purchase_add_form();
        $this->template->full_admin_html_view($content);
    }
    
    
    public function insert_expensetruckingtax()
{
    $CI = & get_instance();

        // print_r($this->input->post()); die();

        $data = array(
            'tax_id' => $this->auth->generator(10),
            'tax' => $this->input->post('tax'), 
            'description' => $this->input->post('description'),
            'state' => $this->input->post('state'),
            'tax_agency' => $this->input->post('tax_agency'),
            'account' => $this->input->post('account'),
            'show_taxonreturn' => $this->input->post('show_taxonreturn'),
            'status_type' => $this->input->post('status_type'),
            'created_by' => $this->session->userdata('user_id'),
        );
        
        $this->db->insert('tax_information', $data);

        $result = $this->db->select('*')->from('tax_information')->where('status_type','expenses')->get()->result_array();

        echo json_encode($result);
}







 #==============trucking_delete==============#

 public function trucking_delete_form($trucking_id)
 {
     $data['trucking_id'] = $this->input->post('trucking_id',TRUE);


     $expense_trucking_id = $this->db->select('expense_trucking_id')->from('expense_trucking_details')->where('expense_trucking_id' , $trucking_id)->get()->row()->expense_trucking_id;

// echo $this ->db ->last_query(); die();

     $result = $this->db->delete('expense_trucking', array('trucking_id' => $trucking_id));
     $result = $this->db->delete('expense_trucking_details', array('expense_trucking_id' => $expense_trucking_id));

 
     $this->session->set_flashdata('show', display('successfully_delete'));

    //  if ($result == true) {
    //     $this->session->set_userdata(array('message'=>display('successfully_delete')));
    //  }
     redirect('Ccpurchase/manage_trucking');
 }























    public function manage_packing_list(){
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('llpurchase');
        $content = $CI->llpurchase->packing_add_form();
        $this->template->full_admin_html_view($content);
    }

    //Manage purchase
    public function manage_purchase() {
        $this->load->library('Llpurchase');
        $content = $this->llpurchase->purchase_list();
        $this->template->full_admin_html_view($content);
    }

     public function manage_purchase_order() {
        $this->load->library('Llpurchase');
        $content = $this->llpurchase->purchase_order_list();
        $this->template->full_admin_html_view($content);
    }

  public function manage_ocean_import_tracking() {
        $date = $this->input->post("daterangepicker-field");
         $this->load->library('Llpurchase');    
         $CI = & get_instance();
         $CI->load->model('Purchases');
         $content1  =   $this->llpurchase->ocean_import_list();
         $expense   =   $CI->Purchases->ocean_import($date);
         $oceanImports   =   $CI->Purchases->getOceanImportData();
             $setting_detail = $CI->Web_settings->retrieve_setting_editdata();

        $data = array(
            'invoice'         =>  $content1,
            'oceanImports'  => $oceanImports,
            'expense' => $expense,
                        'setting_detail' => $setting_detail

            );

        $content = $this->load->view('purchase/ocean_import_list', $data, true);
        $this->template->full_admin_html_view($content);
    }










 public function manage_trucking() {
        $this->session->unset_userdata('expensetruckingid');
        $date = $this->input->post("daterange");
        $this->load->library('Llpurchase');
        $content1 = $this->llpurchase->trucking_list();
        $CI = & get_instance();
        $CI->load->model('Purchases');
        $truck = $CI->Purchases->expense_trucking($date);
        $roadTransports = $CI->Purchases-> getRoadTransportData();
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
           $setting_detail = $CI->Web_settings->retrieve_setting_editdata();

        $data = array(
            'currency' =>$currency_details[0]['currency'],
            'invoice'         =>  $content1,
            'truck' => $truck,
            'roadTransports' => $roadTransports,
                       'setting_detail' => $setting_detail

            );

            
        $content = $this->load->view('purchase/trucking_list', $data, true);
        $this->template->full_admin_html_view($content);
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    public function oceanimport_file_upload(){
        // $purchase_id = date('YmdHis');
        $booking_no = $this->input->post('booking_no',TRUE);
        // print_r($_FILES); die();
    if (isset($_FILES['files']) && !empty($_FILES['files'])) {
        $no_files = count($_FILES["files"]['name']);
        for ($i = 0; $i < $no_files; $i++) {
            if ($_FILES["files"]["error"][$i] > 0) {
                echo "Error: " . $_FILES["files"]["error"][$i] . "<br>";
            } else {
                if (file_exists('uploads/' . $_FILES["files"]["name"][$i])) {
                    echo 'File already exists : uploads/' . $_FILES["files"]["name"][$i];
                    return false;
                } else {
                    move_uploaded_file($_FILES["files"]["tmp_name"][$i], 'uploads/' . $_FILES["files"]["name"][$i]);
                    echo 'File successfully uploaded : uploads/' . $_FILES['files']['name'][$i] . ' ';
                   
                    $data = array(
                        'attachment_id' => $booking_no,
                        'files' => $_FILES['files']['name'][$i],
                        'created_by'=> $this->session->userdata('user_id'),
                        'sub_menu' => 'Ocean Import',
                    );

                    $this->db->insert('attachments', $data);
                    // echo $this->db->last_query();
                }
            }
        }
    } else {
        echo 'Please choose at least one file';
    }
}





     public function purchase_order() {
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('llpurchase');
        $content = $CI->llpurchase->purchase_order_form();
        $this->template->full_admin_html_view($content);



       //  $CI = & get_instance();

       //  $CI->auth->check_admin_auth();

       //  $CI->load->library('llpurchase');
       //  $data=array();
       // // echo $content = $CI->linvoice->invoice_add_form();
       //  $content = $this->load->view('purchase/purchase_order', $data, true);
       //  //$content='';
       //  $this->template->full_admin_html_view($content);

    }

    public function ocean_import_tracking(){
        $CI = & get_instance();

        $CI->auth->check_admin_auth();

        $CI->load->library('llpurchase');
       // $data=array();
        $content = $CI->llpurchase->ocean_import_form();
        
        $this->template->full_admin_html_view($content);
    }


       public function trucking(){

         $CI = & get_instance();

        $CI->auth->check_admin_auth();

        $CI->load->library('linvoice');
        $CI->load->model('Purchases');
        $CI->load->model('Web_settings');
        $CI->load->model('Invoices');

        $CI1 = & get_instance();
        $CI1->load->model('Purchases');
        $dropdown = $CI1->Purchases->invoice_dropdown();
        $expense_trucking = $CI1->Purchases->getTruckingExpenseallData();
        $all_supplier = $CI1->Purchases->select_all_supplier();
         $get_customer= $this->accounts_model->get_customer();
         $bank_list        = $this->Web_settings->bank_list();
        $voucher_no = $this->Purchases->trucking_voucher_no();
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
                   $setting_detail = $CI->Web_settings->retrieve_setting_editdata();

        
        $curn_info_default = $CI->db->select('*')->from('currency_tbl')->where('icon',$currency_details[0]['currency'])->get()->result_array();
        $taxfield1 = $CI->Invoices->tax_data();
      
        $data = array(
            'curn_info_default' =>$curn_info_default[0]['currency_name'],
          
              'currency'  =>$currency_details[0]['currency'],
            'title'         => "Add Trucking",
            'all_supplier'  => $all_supplier,
            'dropdown'    =>   $dropdown,
            'customer_list' => $get_customer,
            'voucher_no'  => $voucher_no,
            'bank_list'     => $bank_list,
            'tax'         => $taxfield1,
            'expense_trucking' => $expense_trucking,
                       'setting_detail' => $setting_detail

        );

       // echo $content = $CI->linvoice->invoice_add_form();
        $content = $this->load->view('purchase/trucking', $data, true);
        //$content='';
        $this->template->full_admin_html_view($content);
    }


    

        public function CheckPurchaseList(){
        // GET data
        $this->load->model('Ppurchases');
        $postData = $this->input->post();
        $data = $this->Ppurchases->getPurchaseList($postData);
        echo json_encode($data);
    }

     public function CheckOceanImportList(){
        // GET data
        $this->load->model('Ppurchases');
        $postData = $this->input->post();
        $data = $this->Ppurchases->getOceanImportList($postData);
        echo json_encode($data);
    } 

     public function CheckPurchaseOrderList(){
         $this->load->model('Ppurchases');
        $postData = $this->input->post();
        $data = $this->Ppurchases->getPurchaseOrderList($postData);
        echo json_encode($data);
     }

       public function CheckTruckingList(){
         $this->load->model('Ppurchases');
        $postData = $this->input->post();
        $data = $this->Ppurchases->getTruckingList($postData);
        echo json_encode($data);
     }
    // search purchase by supplier 
    public function purchase_search() {
        $CI = & get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('llpurchase');
        $CI->load->model('Ppurchases');
        $supplier_id = $this->input->get('supplier_id');
        #
        #pagination starts
        #
        $config["base_url"] = base_url('Cpurchase/purchase_search/');
        $config["total_rows"] = $this->Ppurchases->count_purchase_seach($supplier_id);
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;
        $config['suffix'] = '?' . http_build_query($_GET);
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
        $content = $this->llpurchase->purchase_search_supplier($supplier_id, $links, $config["per_page"], $page);
        $this->template->full_admin_html_view($content);
    }

//purchase list by invoice no
    public function purchase_info_id() {
        $CI = & get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('llpurchase');
        $CI->load->model('Ppurchases');
        $invoice_no = $this->input->post('invoice_no',TRUE);
        $content = $this->llpurchase->purchase_list_invoice_no($invoice_no);
        $this->template->full_admin_html_view($content);
    }

    //Insert purchase
    public function insert_purchase() {
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->model('Ppurchases');
        $CI->Ppurchases->purchase_entry();
        $this->session->set_userdata(array('message' => display('successfully_added')));
        if (isset($_POST['add-purchase'])) {
            redirect(base_url('Cpurchase/manage_purchase'));
            exit;
        } elseif (isset($_POST['add-purchase-another'])) {
            redirect(base_url('Cpurchase'));
            exit;
        }
    }


      //Insert purchase
    public function insert_packing_list() {
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->model('Ppurchases');
        $CI->Ppurchases->packing_list_entry();
        $this->session->set_userdata(array('message' => display('successfully_added')));
        if (isset($_POST['add-packing-list'])) {
            redirect(base_url('Cpurchase/manage_packing_list'));
            exit;
        } elseif (isset($_POST['add-packing-list-another'])) {
            redirect(base_url('Cpurchase'));
            exit;
        }
    }




      public function insert_purchase_order() {
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->model('Ppurchases');
        $CI->Ppurchases->purchase_order_entry();
        $this->session->set_userdata(array('message' => display('successfully_added')));
        if (isset($_POST['add-purchase-order'])) {
            redirect(base_url('Cpurchase/manage_purchase_order'));
            exit;
        } elseif (isset($_POST['add-purchase-order-another'])) {
            redirect(base_url('Cpurchase/insert_purchase_order'));
            exit;
        }
    }


       public function insert_ocean_import() {
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->model('Ppurchases');
        $CI->Ppurchases->ocean_import_entry();
        $this->session->set_userdata(array('message' => display('successfully_added')));
        if (isset($_POST['add-ocean-import'])) {
            redirect(base_url('Cpurchase/manage_ocean_import_tracking'));
            exit;
        } elseif (isset($_POST['add-ocean-import-another'])) {
            redirect(base_url('Cpurchase/ocean_import_tracking'));
            exit;
        }
    }



      public function insert_trucking() {
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->model('Ppurchases');
        $CI->Ppurchases->trucking_entry();
        $this->session->set_userdata(array('message' => display('successfully_added')));
        if (isset($_POST['add-trucking'])) {
            redirect(base_url('Cpurchase/manage_trucking'));
            exit;
        } elseif (isset($_POST['add-trucking-another'])) {
            redirect(base_url('Cpurchase/trucking'));
            exit;
        }
    }


    //purchase Update Form
    public function purchase_update_form($purchase_id) {
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('llpurchase');
        $content = $CI->llpurchase->purchase_edit_data($purchase_id);
        $this->template->full_admin_html_view($content);
    }

      //purchase order Update Form
    public function purchase_order_update_form($purchase_id) {
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('llpurchase');
        $content = $CI->llpurchase->purchase_order_edit_data($purchase_id);
        $this->template->full_admin_html_view($content);
    }


      //Ocean Import Tracking Update Form
    public function ocean_import_tracking_update_form($purchase_id) {
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('llpurchase');
        $content = $CI->llpurchase->ocean_import_tracking_edit_data($purchase_id);
        $this->template->full_admin_html_view($content);
    }

        //Trucking Update Form
    public function trucking_update_form($purchase_id) {
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('llpurchase');
        $content = $CI->llpurchase->trucking_edit_data($purchase_id);
        $this->template->full_admin_html_view($content);
    } 

    // purchase Update
    public function purchase_update() {

        //print_r($this->input->post()); die;
        
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->model('Ppurchases');
        $CI->Ppurchases->update_purchase();
        $this->session->set_userdata(array('message' => display('successfully_updated')));
        redirect(base_url('Cpurchase/manage_purchase'));
        exit;
    }

      // purchase Update
    public function purchase_order_update() {

        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->model('Ppurchases');
        $CI->Ppurchases->update_purchase_order();
        $this->session->set_userdata(array('message' => display('successfully_updated')));
        redirect(base_url('Cpurchase/manage_purchase'));
        exit;
    }


       // purchase Update
    public function update_ocean_import() {

        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->model('Ppurchases');
        $CI->Ppurchases->update_ocean_import();
        $this->session->set_userdata(array('message' => display('successfully_updated')));
        redirect(base_url('Cpurchase/manage_ocean_import_tracking'));
        exit;
    }


    //Purchase item by search
    public function purchase_item_by_search() {
        $CI = & get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('llpurchase');
        $supplier_id = $this->input->post('supplier_id',TRUE);
        $content = $CI->llpurchase->purchase_by_search($supplier_id);
        $this->template->full_admin_html_view($content);
    }



    //Product search by product name
    public function product_search_from_expense(){
          $CI = & get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('llpurchase');
        $CI->load->model('Suppliers');
        $supplier_id = $this->input->post('supplier_id',TRUE);
        $product_name = $this->input->post('product_name',TRUE);
        $product_info = $CI->Suppliers->product_search_by_name($product_name);
        if(!empty($product_info)){
        $list[''] = '';
        foreach ($product_info as $value) {
            $json_product[] = array('label'=>$value['product_name'].'('.$value['product_model'].')','value'=>$value['product_id']);
        } 
    }else{
        $json_product[] = 'No Product Found';
        }
        echo json_encode($json_product);
    }

    //Product search by supplier id
    public function product_search_by_supplier() {


        $CI = & get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('llpurchase');
        $CI->load->model('Suppliers');
        $supplier_id = $this->input->post('supplier_id',TRUE);
        $product_name = $this->input->post('product_name',TRUE);
        $product_info = $CI->Suppliers->product_search_item($supplier_id, $product_name);
        if(!empty($product_info)){
        $list[''] = '';
        foreach ($product_info as $value) {
            $json_product[] = array('label'=>$value['product_name'].'('.$value['product_model'].')','value'=>$value['product_id']);
        } 
    }else{
        $json_product[] = 'No Product Found';
        }
        echo json_encode($json_product);
    }

    //Retrive right now inserted data to cretae html
    public function purchase_details_data($purchase_id) {
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('llpurchase');
        $content = $CI->llpurchase->purchase_details_data($purchase_id);
        $this->template->full_admin_html_view($content);
    }


     //Retrive right now inserted data to cretae html
    public function ocean_import_tracking_details_data($purchase_id) {

        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('llpurchase');
        $content = $CI->llpurchase->ocean_import_tracking_details_data($purchase_id);
       
        $this->template->full_admin_html_view($content);
    }


     //Retrive right now inserted data to cretae html
    public function purchase_order_details_data() {

           $CI = & get_instance();

        $CI->auth->check_admin_auth();

        $CI->load->library('linvoice');
        $data=array();
       // echo $content = $CI->linvoice->invoice_add_form();
        $content = $this->load->view('purchase/purchase_order_invoice', $data, true);
        //$content='';
        $this->template->full_admin_html_view($content);


      
    }

      public function ocean_import_details_data() {

        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('linvoice');
        $data=array();
       // echo $content = $CI->linvoice->invoice_add_form();
        $content = $this->load->view('purchase/ocean_import_invoice_html', $data, true);
        //$content='';
        $this->template->full_admin_html_view($content);

    }


   

    public function trucking_details_data($purchase_id) {

        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('llpurchase');
       // $value = $this->input->post('value',TRUE);
        $content = $CI->llpurchase->trucking_details_data($purchase_id);
     
        $this->template->full_admin_html_view($content);

    }
    public function trucking_details_data_print($purchase_id) {

        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('llpurchase');
       // $value = $this->input->post('value',TRUE);
        $content = $CI->llpurchase->trucking_details_data_print($purchase_id);
     
        $this->template->full_admin_html_view($content);

    }


    public function delete_purchase($purchase_id = null) {
        $this->load->model('Ppurchases');
        if ($this->Ppurchases->purchase_delete($purchase_id)) {
            #set success message
            $this->session->set_flashdata('message', display('delete_successfully'));
        } else {
            #set exception message
            $this->session->set_flashdata('exception', display('please_try_again'));
        }
        redirect(base_url('Cpurchase/manage_purchase'));
    }

    // purchase info date to date
    public function manage_purchase_date_to_date() {
        $CI = & get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('llpurchase');
        $CI->load->model('Ppurchases');
        $start = $this->input->post('from_date',TRUE);
        $end = $this->input->post('to_date',TRUE);

        $content = $this->llpurchase->purchase_list_date_to_date($start, $end);
        $this->template->full_admin_html_view($content);
    }
//purchase pdf download
      public function purchase_downloadpdf(){
        $CI = & get_instance();
        $CI->load->model('Ppurchases');
        $CI->load->model('Web_settings');
        $CI->load->model('Invoices');
        $CI->load->library('pdfgenerator'); 
        $purchase_list = $CI->Ppurchases->pdf_purchase_list();
        if (!empty($purchase_list)) {
            $i = 0;
            if (!empty($purchase_list)) {
                foreach ($purchase_list as $k => $v) {
                    $i++;
                    $purchase_list[$k]['sl'] = $i + $CI->uri->segment(3);
                }
            }
        }
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Invoices->retrieve_company();
        $data = array(
            'title'         => display('manage_purchase'),
            'purchase_list' => $purchase_list,
            'currency'      => $currency_details[0]['currency'],
            'logo'          => $currency_details[0]['logo'],
            'position'      => $currency_details[0]['currency_position'],
            'company_info'  => $company_info
        );
            $this->load->helper('download');
            $content = $this->parser->parse('purchase/purchase_list_pdf', $data, true);
            $time = date('Ymdhi');
            $dompdf = new DOMPDF();
            $dompdf->load_html($content);
            $dompdf->render();
            $output = $dompdf->output();
            file_put_contents('assets/data/pdf/'.'purchase'.$time.'.pdf', $output);
            $file_path = 'assets/data/pdf/'.'purchase'.$time.'.pdf';
           $file_name = 'purchase'.$time.'.pdf';
            force_download(FCPATH.'assets/data/pdf/'.$file_name, null);
    }
   
}
