<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Csupplier extends CI_Controller {

    public $supplier_id;

    function __construct() {
        parent::__construct();
        $this->db->query('SET SESSION sql_mode = ""');
        $this->load->library('auth');
        $this->load->library('lsupplier');
        $this->load->library('session');
        $this->load->model('Suppliers');
        $this->auth->check_admin_auth();
    }
    public function add_payment_terms(){
        $this->load->model('Suppliers');
        $postData = $this->input->post('new_payment_type');
        //  echo $postData;
        $data = $this->Suppliers->add_payment_terms($postData);
        echo json_encode($data);
    }
    public function index() {
        $content = $this->lsupplier->supplier_add_form();
        $this->template->full_admin_html_view($content);
    }



    public function add_vendor_csv() {
        $CI = & get_instance();
          
        $data = array(
            'title' => display('add_vendor_csv')
        );
        $content = $CI->parser->parse('supplier/add_vendor_csv', $data, true);
        $this->template->full_admin_html_view($content);
    }



    #==============supplier_delete==============#

    public function supplier_delete_form($supplier_id)
    {

        $data['supplier_id'] = $this->input->post('supplier_id',TRUE);


        $result1 = $this->db->delete('supplier_information', array('supplier_id' => $supplier_id)); 
        $result2 = $this->db->delete('supplier_product', array('supplier_id' => $supplier_id)); 

        // if ($result == true) {
        //    $this->session->set_userdata(array('message'=>display('successfully_delete')));
        // }
        $this->session->set_flashdata('message', display('successfully_delete'));

        
        redirect('Csupplier/manage_supplier');
    }



public function transaction_list(){
          $CI = & get_instance();
          $CI->load->model('Suppliers');
          $CI->load->model('Web_settings');

          $setting_detail = $CI->Web_settings->retrieve_setting_editdata();

          $supplier1 =$this->Suppliers->transaction_supplier();




          $data['supplier_info']=$supplier1;

          $data['setting_detail']=$setting_detail;


          $content = $CI->parser->parse('report/transaction_list_vendor', $data, true);
          $this->template->full_admin_html_view($content);


}









    //Insert supplier
        //Insert supplier
       
public function insert_supplier() {
            $CI =& get_instance();
            $this->auth->check_admin_auth();
            $CI->load->model('Suppliers');
                 $data = array(
                'vendor_type'  => $this->input->post('vendor_type',TRUE),
                'created_by'       =>  $this->session->userdata('user_id'),
                'supplier_name' => $this->input->post('supplier_name',TRUE),
                'address'       => $this->input->post('address',TRUE),
                'mobile'        => $this->input->post('mobile',TRUE),
                'businessphone'         => $this->input->post('phone',TRUE),
                'contactperson'       => $this->input->post('contact',TRUE),
                'primaryemail'   => $this->input->post('email',TRUE),
                'secondaryemail' => $this->input->post('emailaddress',TRUE),
                'taxcollected'   => $this->input->post('service_provider',TRUE),
                'credit_limit'   => $this->input->post('previous_balance',TRUE),
                'previous_balance'   => $this->input->post('p_b',TRUE),
                 'attachments'   => $this->input->post('attachments',TRUE),
                'fax'           => $this->input->post('fax',TRUE),
                'city'          => $this->input->post('city',TRUE),
                'state'         => $this->input->post('state',TRUE),
                'currency_type'         => $this->input->post('currency1',TRUE),
                'zip'           => $this->input->post('zip',TRUE),
                'country'       => $this->input->post('country',TRUE),
                'details'       => $this->input->post('details',TRUE),
                'paymentterms'       => $this->input->post('terms',TRUE),
                'status'        => 1,
                 'supplier_id'       => $this->input->post('supplier_id',TRUE)

            );
               $purchase_id_1 = $this->db->where('supplier_name',$this->input->post('supplier_name',TRUE));
        $q=$this->db->get('supplier_information');
        $row = $q->row_array();

   if(!empty($row['supplier_name'])){
      
        $this->db->where('supplier_name',$this->input->post('supplier_name',TRUE));
    
        $this->db->delete('supplier_information');
  
     
     
    }   
   
      // print_r($data); die();
            $content =$this->Suppliers->insert_supplier($data);
            $all_supplier =$this->Suppliers->supplier_list();
            echo json_encode($all_supplier);
        }
           
         /*
        public function insert_supplier() {
            $data = array(
                'service_provider' => $this->input->post('service_provider',TRUE),
                'category' => $this->input->post('vendor_type',TRUE),
                'created_by'       =>  $this->session->userdata('user_id'),
                'supplier_name' => $this->input->post('supplier_name',TRUE),
                'address'       => $this->input->post('address',TRUE),
                'address2'      => $this->input->post('address2',TRUE),
                'mobile'        => $this->input->post('mobile',TRUE),
                'phone'         => $this->input->post('phone',TRUE),
                'contact'       => $this->input->post('contact',TRUE),
                'emailnumber'   => $this->input->post('email',TRUE),
                'email_address' => $this->input->post('emailaddress',TRUE),
                'fax'           => $this->input->post('fax',TRUE),
                'city'          => $this->input->post('city',TRUE),
                'state'         => $this->input->post('state',TRUE),
                                'currency_type'         => $this->input->post('currency1',TRUE),
                'zip'           => $this->input->post('zip',TRUE),
                'country'       => $this->input->post('country',TRUE),
                'details'       => $this->input->post('details',TRUE),
                'status'        => 1,
                );
            $this->db->insert('supplier_information',$data);
            echo $this->db->last_query();
                $supplier_id = $this->db->insert_id();
              $coa = $this->Suppliers->headcode();
            if($coa->HeadCode!=NULL){
                $headcode=$coa->HeadCode+1;
            }
            else{
                $headcode="502000001";
            }
                 $c_acc=$supplier_id.'-'.$this->input->post('supplier_name',TRUE);
            $createby=$this->session->userdata('user_id');
            $createdate=date('Y-m-d H:i:s');
            $supplier_coa = [
                  'HeadCode'       => $headcode,
                'HeadName'         => $c_acc,
                'PHeadName'        => 'Account Payable',
                'HeadLevel'        => '3',
                'IsActive'         => '1',
                'IsTransaction'    => '1',
                'IsGL'             => '0',
                'HeadType'         => 'L',
                'IsBudget'         => '0',
                'supplier_id'      => $supplier_id,
                'IsDepreciation'   => '0',
                'DepreciationRate' => '0',
                'CreateBy'         => $createby,
                'CreateDate'       => $createdate,
            ];
                //Previous balance adding -> Sending to supplier model to adjust the data.
                $this->db->insert('acc_coa',$supplier_coa);
                $this->Suppliers->previous_balance_add($this->input->post('previous_balance',TRUE), $supplier_id,$c_acc,$this->input->post('supplier_name',TRUE));
                $this->session->set_userdata(array('message' => display('successfully_added')));
                 if (isset($_POST['add-supplier-from-expense'])) {
                    redirect(base_url('Cpurchase'));
                    exit;
                }
                if (isset($_POST['add-supplier-from-oit'])) {
                    redirect(base_url('Ccpurchase/ocean_import_tracking'));
                    exit;
                }
                if (isset($_POST['add-supplier-from-trucking-sale'])) {
                    redirect(base_url('Cinvoice/trucking'));
                    exit;
                }
                if (isset($_POST['add-supplier'])) {
                    redirect(base_url('Csupplier/manage_supplier'));
                    exit;
                } elseif (isset($_POST['add-supplier-another'])) {
                    redirect(base_url('Csupplier'));
                    exit;
                }
        }
        */
    //Manage supplier


    public function manage_supplier() {
        $CI =& get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lsupplier');
        $CI->load->model('Suppliers');
        $content =$this->lsupplier->supplier_list();
        $this->template->full_admin_html_view($content);
    }

        public function CheckSupplierList(){
        // GET data
        $this->load->model('Suppliers');
        $postData = $this->input->post();
        $data = $this->Suppliers->getSupplierList($postData);
        echo json_encode($data);
    } 

    // search supplier 
    public function search_supplier() {
        $supplier_id = $this->input->post('supplier_id',TRUE);
        $content = $this->lsupplier->supplier_search($supplier_id);
        $this->template->full_admin_html_view($content);
    }

    //Supplier Update Form
    public function supplier_update_form($supplier_id) {
        $content = $this->lsupplier->supplier_edit_data($supplier_id);

        $this->template->full_admin_html_view($content);
    }

    // Supplier Update
    public function supplier_update() {
        $supplier_id = $this->input->post('supplier_id',TRUE);
        $old_headnam = $supplier_id.'-'.$this->input->post('oldname',TRUE);
        $c_acc=$supplier_id.'-'.$this->input->post('supplier_name',TRUE);
        $data = array(
            'supplier_name' => $this->input->post('supplier_name',TRUE),
            'address'       => $this->input->post('address',TRUE),
            'address2'      => $this->input->post('address2',TRUE),
            'mobile'        => $this->input->post('mobile',TRUE),
            'phone'         => $this->input->post('phone',TRUE),
            'contact'       => $this->input->post('contact',TRUE),
            'emailnumber'   => $this->input->post('email',TRUE),
            'email_address' => $this->input->post('emailaddress',TRUE),
            'fax'           => $this->input->post('fax',TRUE),
            'city'          => $this->input->post('city',TRUE),
            'state'         => $this->input->post('state',TRUE),
            'zip'           => $this->input->post('zip',TRUE),
            'country'       => $this->input->post('country',TRUE),
            'details'       => $this->input->post('details',TRUE),
            'currency_type'       => $this->input->post('currency_type',TRUE)
        );
         $supplier_coa = [
             'HeadName'         => $c_acc
        ];
        $result = $this->Suppliers->update_supplier($data, $supplier_id);
        if ($result == TRUE) {
        $this->db->where('HeadName', $old_headnam);
        $this->db->update('acc_coa', $supplier_coa);
        $this->session->set_userdata(array('message' => display('successfully_updated')));
        redirect(base_url('Csupplier/manage_supplier'));
        exit;
    }else{
        $this->session->set_userdata(array('error_message' => display('please_try_again'))); 
         redirect(base_url('Csupplier/manage_supplier'));
    }
    }

    //Supplier Search Item
    public function supplier_search_item() {
        $supplier_id = $this->input->post('supplier_id',TRUE);
        $content = $this->lsupplier->supplier_search_item($supplier_id);
        $this->template->full_admin_html_view($content);
    }

    // Supplier Delete from System
    public function supplier_delete($supplier_id) {
         $invoiceinfo = $this->db->select('*')->from('product_purchase')->where('supplier_id',$supplier_id)->get()->num_rows();
    if($invoiceinfo > 0){
      $this->session->set_userdata(array('error_message' => 'Sorry !! You can not delete this Supplier.This Supplier already Engaged in calculation system!'));
   redirect(base_url('Csupplier/manage_supplier'));
    }else{
        $this->Suppliers->delete_supplier($supplier_id);
        $this->session->set_userdata(array('message' => display('successfully_delete')));
       redirect(base_url('Csupplier/manage_supplier'));
   }
    }


    public function supplier_details($supplier_id) {
        $content = $this->lsupplier->supplier_detail_data($supplier_id);
        $this->supplier_id = $supplier_id;
        $this->template->full_admin_html_view($content);
    }

    //Supplier Ledger Book
   public function supplier_ledger() {
        $date = $this->input->post('daterangepicker-field',TRUE);
     $explode=explode(" to ",$date);
     $start=$explode[0];
     $end=$explode[1];

        $supplier_id = $this->input->post('supplier_id',TRUE);
        $page = $this->input->post('seg_3',TRUE);
   //  $pro_sup=$this->uri->segment(3);
                $pro_sup= str_replace('_', ' ', $page);
        $sup_id = $this->input->post('seg_4',TRUE);
 $sup_id=   str_replace("%20"," ",$sup_id);

        $content = $this->lsupplier->supplier_ledger($sup_id, $start,$end ,$pro_sup,$date);

        $this->template->full_admin_html_view($content);
    }

 public function supplier_ledger_report() {
        $config["base_url"] = base_url('Csupplier/supplier_ledger_report/');
        $config["total_rows"] = $this->Suppliers->count_supplier_product_info();
        $config["per_page"] = 100;
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
        $sup_id = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
       // echo $page;die();
        $links = $this->pagination->create_links();
        
                     $pro_sup= str_replace('_', ' ', $page);
        $content = $this->lsupplier->supplier_ledger_report($links, $config["per_page"], $pro_sup,$sup_id);
        $this->template->full_admin_html_view($content);
    }

    // Supplier wise sales report details
public function supplier_sales_details() {
        $start = $this->input->post('from_date',TRUE);
        $end = $this->input->post('to_date',TRUE);
        $supplier_id = $this->uri->segment(3);

        $content = $this->lsupplier->supplier_sales_details($supplier_id, $start, $end);
        $this->template->full_admin_html_view($content);
    }




    // search report 
    public function search_supplier_report() {
        $start = $this->input->post('from_date',TRUE);
        $end = $this->input->post('to_date',TRUE);

        $content = $this->lpayment->result_datewise_data($start, $end);
        $this->template->full_admin_html_view($content);
    }

    //Supplier sales details all from menu
    public function supplier_sales_details_all() {
        $config["base_url"] = base_url('Csupplier/supplier_sales_details_all/');
        $config["total_rows"] = $this->Suppliers->supplier_sales_details_count_all();
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
        $content = $this->lsupplier->supplier_sales_details_allm($links, $config["per_page"], $page);

        $this->template->full_admin_html_view($content);
    }



        public function supplier_sales_details_datewise() {
          $date = $this->input->post('daterangepicker-field', TRUE);
        $explode = explode(" to ", $date);
        $fromdate = isset($explode[0]) ? $explode[0] : null;
        $todate = isset($explode[1]) ? $explode[1] : null;
        $config["base_url"] = base_url('Csupplier/supplier_sales_details_datewise/');
        $config["total_rows"] = $this->Suppliers->supplier_sales_details_datewise_count($fromdate,$todate);
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
        $content = $this->lsupplier->supplier_sales_details_datewise($links, $config["per_page"], $page,$fromdate,$todate);

        $this->template->full_admin_html_view($content);
    }

    // supplier ledger for supplier information 
    public function supplier_ledger_info($supplier_id) {
        $content = $this->lsupplier->supplier_ledger_info($supplier_id);
        $this->supplier_id = $supplier_id;
        $this->template->full_admin_html_view($content);
    }
// ============================= CSV SUPPLIER UPLOAD  ======================================
        //CSV Manufacturer Add From here
    function uploadCsv_Supplier()
    {
        $filename = $_FILES['upload_csv_file']['name'];
        
      //  $ext = end(explode('.', $filename));
        // $tmp = explode('.', $filename);
        //  $ext = end($tmp);
        $ext = substr(strrchr($filename, '.'), 1);
        if($ext == 'csv'){
        $count=0;
        $fp = fopen($_FILES['upload_csv_file']['tmp_name'],'r') or die("can't open file");

        if (($handle = fopen($_FILES['upload_csv_file']['tmp_name'], 'r')) !== FALSE)
        {
  
         while($csv_line = fgetcsv($fp,1024)){
                //keep this if condition if you want to remove the first row
                for($i = 0, $j = count($csv_line); $i < $j; $i++)
                {              //   echo $csv_line[13]; print_r($csv_line)."<br/>";
           $insert_csv = array();
           $insert_csv['supplier_name'] = (!empty($csv_line[0])?$csv_line[0]:null);
           $insert_csv['mobile'] = (!empty($csv_line[3])?$csv_line[3]:'');
           $insert_csv['phone'] = (!empty($csv_line[3])?$csv_line[3]:'');
           $insert_csv['email'] = (!empty($csv_line[1])?$csv_line[1]:'');
           $insert_csv['emailaddress'] = (!empty($csv_line[2])?$csv_line[2]:'');
           $insert_csv['contact'] = (!empty($csv_line[4])?$csv_line[4]:'');
           $insert_csv['fax'] = (!empty($csv_line[5])?$csv_line[5]:'');
           $insert_csv['city'] = (!empty($csv_line[7])?$csv_line[7]:'');
           $insert_csv['address'] = (!empty($csv_line[11])?$csv_line[11]:'');
           $insert_csv['state'] = (!empty($csv_line[8])?$csv_line[8]:'');
           $insert_csv['zip'] = (!empty($csv_line[9])?$csv_line[9]:'');
           $insert_csv['details'] = (!empty($csv_line[11])?$csv_line[11]:'');
           $insert_csv['previousbalance'] = (!empty($csv_line[13])?$csv_line[13]:'');
            $insert_csv['credit_limit'] = (!empty($csv_line[14])?$csv_line[14]:'');
             $insert_csv['country'] = (!empty($csv_line[10])?$csv_line[10]:'');
           $insert_csv['terms'] = '';
                }
                $depid = date('Ymdis');
                $supplierdata = array(  
                    'created_by'       =>  $this->session->userdata('user_id'),
           'supplier_name'  => $insert_csv['supplier_name'],
             'mobile'        => $insert_csv['mobile'],
            'primaryemail'      =>  $insert_csv['email'],
            'secondaryemail'        =>  $insert_csv['emailaddress'],
            'contactperson'         =>  $insert_csv['phone'],
            'businessphone'       => $insert_csv['contact'],
            'fax'   =>  $insert_csv['fax'],
            'city' => $insert_csv['city'],
            'state'           => $insert_csv['state'],
            'zip'          => $insert_csv['zip'],
            'address'           => $insert_csv['details'],
            'paymentterms'       => $insert_csv['terms'],
             'previous_balance'       => $insert_csv['previousbalance'],
              'credit_limit'       => $insert_csv['credit_limit'],
              'country'       => $insert_csv['country'],
            'status'        => 1
                );
             //   print_r($supplierdata);die();

                if ($count > 0) {
                    $this->db->insert('supplier_information',$supplierdata);

                $supplier_id    = $this->db->insert_id();
                $transaction_id = $this->auth->generator(10);


        $coa = $this->Suppliers->headcode();
        if($coa->HeadCode!=NULL){
            $headcode=$coa->HeadCode+1;
        }
        else{
            $headcode="5020001";
        }
        $c_acc=$supplier_id.'-'.$insert_csv['supplier_name'];
        $createby=$this->session->userdata('user_id');
        $createdate=date('Y-m-d H:i:s');

         $supplier_coa = [
            'HeadCode'       => $headcode,
            'HeadName'         => $c_acc,
            'PHeadName'        => 'Account Payable',
            'HeadLevel'        => '3',
            'IsActive'         => '1',
            'IsTransaction'    => '1',
            'IsGL'             => '0',
            'HeadType'         => 'L',
            'IsBudget'         => '0',
            'IsDepreciation'   => '0',
            'supplier_id'      => $supplier_id,
            'DepreciationRate' => '0',
            'CreateBy'         => $createby,
            'CreateDate'       => $createdate,
        ];

                     $this->db->insert('acc_coa', $supplier_coa);
                     $headcode = $this->db->select('HeadCode')->from('acc_coa')->where('supplier_id',$supplier_id)->get()->row();

                          $previous = array(
          'VNo'            =>  $transaction_id,
          'Vtype'          =>  'Previous',
          'VDate'          =>  date('Y-m-d'),
          'COAID'          =>  $headcode->HeadCode,
          'Narration'      =>  'Previous Balane For New Supplier',
          'Debit'          =>  0,
          'Credit'         =>  $insert_csv['previous_balance'],
          'IsPosted'       =>  1,
          'CreateBy'       =>  $this->session->userdata('user_id'),
          'CreateDate'     =>  date('Y-m-d H:i:s'),
          'IsAppove'       =>  1
        ); 
                    
                    if($insert_csv['previous_balance'] > 0){
                    $this->db->insert('acc_transaction', $previous);
                    }
                    }  
                $count++; 
            }
            
        }
                        $this->db->select('*');
                        $this->db->from('supplier_information');
                        $this->db->where('status',1);
                    $query = $this->db->get();
                    foreach ($query->result() as $row) {
                        $json_supplier[] = array('label'=>$row->supplier_name,'value'=>$row->supplier_id);
                    }
                    $cache_file = './my-assets/js/admin_js/json/supplier.json';
                    $supplierlist = json_encode($json_supplier);
                    file_put_contents($cache_file,$supplierlist);
        fclose($fp) or die("can't close file");
        $this->session->set_userdata(array('message'=>display('successfully_added')));
        redirect(base_url('Csupplier/manage_supplier'));
    }else{
        $this->session->set_userdata(array('error_message'=>'Please Import Only Csv File'));
        redirect(base_url('Csupplier/manage_supplier'));
    }
    
    }
     public function supplier_list() {

   

        $CI =& get_instance();

        $CI->load->model('Suppliers');

        $CI->load->model('Web_settings');
  $vendor = $CI->Suppliers->suppliers_list();
           $setting_detail = $CI->Web_settings->retrieve_setting_editdata();

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $data['currency']          = $currency_details[0]['currency'];
        $data['total_supplier']    = $CI->Suppliers->count_supplier();

       
        $data['vendor_data']=$vendor;
                $data['setting_detail']=$setting_detail;

        $data['company_info']      = $CI->Suppliers->retrieve_company();


        $data['getsupplier']      = $CI->Suppliers->get_all_supplier();


              $content = $CI->parser->parse('report/vendor_info_report', $data, true);
        $this->template->full_admin_html_view($content);

    }
   
        /// Supplier Advance Form
      public function supplier_advance(){
    $data['title'] = display('supplier_advance');
    $data['supplier_list'] = $this->Suppliers->supplier_list_advance();
    $content = $this->parser->parse('supplier/supplier_advance', $data, true);
    $this->template->full_admin_html_view($content); 
  }
  // supplier advane insert
  public function insert_supplier_advance(){
    $advance_type = $this->input->post('type',TRUE);
    if($advance_type ==1){
        $dr = $this->input->post('amount',TRUE);
        $tp = 'd';
    }else{
        $cr = $this->input->post('amount',TRUE);
        $tp = 'c';
    }
    
            $createby=$this->session->userdata('user_id');
            $createdate=date('Y-m-d H:i:s');
            $transaction_id=$this->auth->generator(10);
            $supplier_id = $this->input->post('supplier_id',TRUE);
            $supifo = $this->db->select('*')->from('supplier_information')->where('supplier_id',$supplier_id)->get()->row();
    $headn = $supplier_id.'-'.$supifo->supplier_name;
    $coainfo = $this->db->select('*')->from('acc_coa')->where('HeadName',$headn)->get()->row();
    $supplier_headcode = $coainfo->HeadCode;
               


                   $supplier_accledger = array(
      'VNo'            =>  $transaction_id,
      'Vtype'          =>  'Advance',
      'VDate'          =>  date("Y-m-d"),
      'COAID'          =>  $supplier_headcode,
      'Narration'      =>  'supplier Advance For '.$supifo->supplier_name,
      'Debit'          =>  (!empty($dr)?$dr:0),
      'Credit'         =>  (!empty($cr)?$cr:0),
      'IsPosted'       => 1,
      'CreateBy'       => $this->session->userdata('user_id'),
      'CreateDate'     => date('Y-m-d H:i:s'),
      'IsAppove'       => 1
    );
                    $cc = array(
      'VNo'            =>  $transaction_id,
      'Vtype'          =>  'Advance',
      'VDate'          =>  date("Y-m-d"),
      'COAID'          =>  1020101,
      'Narration'      =>  'Cash in Hand  For '.$supifo->supplier_name.' Advance',
      'Debit'          =>  (!empty($dr)?$dr:0),
      'Credit'         =>  (!empty($cr)?$cr:0),
      'IsPosted'       =>  1,
      'CreateBy'       =>  $this->session->userdata('user_id'),
      'CreateDate'     =>  date('Y-m-d H:i:s'),
      'IsAppove'       =>  1
    ); 
                   
       $this->db->insert('acc_transaction',$supplier_accledger);
       $this->db->insert('acc_transaction',$cc);
        redirect(base_url('Csupplier/supplier_advancercpt/'.$transaction_id.'/'.$supplier_id));

  }


    public function supplier_advancercpt($receiptid = null,$supplier_id = null) {
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('lsupplier');
        $content = $CI->lsupplier->advance_details_data($receiptid,$supplier_id);
        $this->template->full_admin_html_view($content);
    }



}
?>