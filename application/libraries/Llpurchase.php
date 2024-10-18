<?php



if (!defined('BASEPATH'))

    exit('No direct script access allowed');



class Llpurchase {



    //Purchase add form

    public function purchase_add_form() {

        $CI = & get_instance();

        $CI->load->model('Ppurchases');

        $CI->load->model('Categories');
        $CI->load->model('Units');
   



        $CI->load->model('Web_settings');

        $all_supplier = $CI->Ppurchases->select_all_supplier();

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();

        $bank_list        = $CI->Web_settings->bank_list();


        $category_list = $CI->Categories->category_list_product();

        $unit_list     = $CI->Units->unit_list();


        $data = array(

            'title'         => display('add_purchase'),

            'all_supplier'  => $all_supplier,

            'invoice_no'    => $CI->auth->generator(10),

            'category_list'=> $category_list,

            'unit_list'    => $unit_list,

            'discount_type' => $currency_details[0]['discount_type'],

            'bank_list'     => $bank_list,

        );

        $purchaseForm = $CI->parser->parse('purchase/add_purchase_form', $data, true);

        return $purchaseForm;

    }


      public function packing_add_form() {

        $CI = & get_instance();

        $CI->load->model('Ppurchases');

        $CI->load->model('Categories');

        $CI->load->model('Units');
   



        $CI->load->model('Web_settings');

        $all_supplier = $CI->Ppurchases->select_all_supplier();

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();

        $bank_list        = $CI->Web_settings->bank_list();


        $category_list = $CI->Categories->category_list_product();

        $unit_list     = $CI->Units->unit_list();


        $data = array(

            'title'         => display('add_purchase'),

            'all_supplier'  => $all_supplier,

            'invoice_no'    => $CI->auth->generator(10),

            'category_list'=> $category_list,

            'unit_list'    => $unit_list,

            'discount_type' => $currency_details[0]['discount_type'],

            'bank_list'     => $bank_list,

        );

        $purchaseForm = $CI->parser->parse('purchase/add_packing_list', $data, true);

        return $purchaseForm;

    }

    


       //Purchase add form

    public function ocean_import_form() {

        $CI = & get_instance();

        $CI->load->model('Ppurchases');

        $CI->load->model('Categories');
        $CI->load->model('Units');
        $CI->load->model('Accounts_model');

        $CI->load->model('Web_settings');

        $all_supplier = $CI->Ppurchases->select_all_supplier();
           $setting_detail = $CI->Web_settings->retrieve_setting_editdata();

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();

        $bank_list        = $CI->Web_settings->bank_list();

        $get_customer= $CI->Accounts_model->get_customer();
        $category_list = $CI->Categories->category_list_product();

        $unit_list     = $CI->Units->unit_list();


        $data = array(
            'customer_list' => $get_customer,
            'title'         => "Add Ocean Import",

            'all_supplier'  => $all_supplier,

            'invoice_no'    => $CI->auth->generator(10),

            'category_list'=> $category_list,

            'unit_list'    => $unit_list,

            'discount_type' => $currency_details[0]['discount_type'],

            'bank_list'     => $bank_list,
                       'setting_detail' => $setting_detail


        );

        $purchaseForm = $CI->parser->parse('purchase/ocean_import_tracking', $data, true);

        return $purchaseForm;

    }




      //Purchase Order form

    public function purchase_order_form() {

        $CI = & get_instance();

        $CI->load->model('Ppurchases');

          $CI->load->model('Categories');
        $CI->load->model('Units');
   



        $CI->load->model('Web_settings');

        $all_supplier = $CI->Ppurchases->select_all_supplier();

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();

        $bank_list        = $CI->Web_settings->bank_list();


        $category_list = $CI->Categories->category_list_product();

        $unit_list     = $CI->Units->unit_list();
        $taxfield1 = $CI->db->select('tax_id,tax')
        ->from('tax_information')
        ->get()
        ->result_array();

        $data = array(

            'title'         => display('add_purchase'),

            'all_supplier'  => $all_supplier,
            'tax'           => $taxfield1,
            'invoice_no'    => $CI->auth->generator(10),

            'category_list'=> $category_list,

            'unit_list'    => $unit_list,

            'discount_type' => $currency_details[0]['discount_type'],

            'bank_list'     => $bank_list,

        );

        $purchaseForm = $CI->parser->parse('purchase/purchase_order', $data, true);

        return $purchaseForm;

    }


    // Retrieve Purchase List

    public function purchase_list() {

        $CI = & get_instance();

        $CI->load->model('Ppurchases');

        $CI->load->model('Web_settings');

        $CI->load->library('occational');

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();

        $company_info = $CI->Ppurchases->retrieve_company();

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();

        $data = array(

            'title'          => display('manage_purchase'),

            'company_info'   => $company_info,

            'currency'       => $currency_details[0]['currency'],

            'total_purhcase' => $CI->Ppurchases->count_purchase(),

        );



        $purchaseList = $CI->parser->parse('purchase/purchase', $data, true);

        return $purchaseList;

    }


    public function purchase_order_list() {

        $CI = & get_instance();

        $CI->load->model('Ppurchases');

        $CI->load->model('Web_settings');

        $CI->load->library('occational');

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();

        $company_info = $CI->Ppurchases->retrieve_company();

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();

        $data = array(

            'title'          => display('manage_purchase'),

            'company_info'   => $company_info,

            'currency'       => $currency_details[0]['currency'],

            'total_purhcase' => $CI->Ppurchases->count_purchase_order(),

        );




        $purchaseList = $CI->parser->parse('purchase/purchase_order_list', $data, true);

        return $purchaseList;

    }


     public function ocean_import_list() {


        $CI = & get_instance();

        $CI->load->model('Ppurchases');


        $CI->load->model('Web_settings');

        $CI->load->library('occational');

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();

        $company_info = $CI->Ppurchases->retrieve_company();

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();

        $data = array(

            'title'          => 'Manage Ocean Import List',

            'company_info'   => $company_info,

            'currency'       => $currency_details[0]['currency'],

            'total_purhcase' => $CI->Ppurchases->count_ocean_import(),

        );



        $purchaseList = $CI->parser->parse('purchase/ocean_import_list', $data, true);

        return $purchaseList;

    }


     public function trucking_list() {

        $CI = & get_instance();

        $CI->load->model('Ppurchases');

        $CI->load->model('Web_settings');

        $CI->load->library('occational');

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();

        $company_info = $CI->Ppurchases->retrieve_company();

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();

        $data = array(

            'title'          => 'Manage Trucking',

            'company_info'   => $company_info,

            'currency'       => $currency_details[0]['currency'],

            'total_purhcase' => $CI->Ppurchases->count_trucking(),

        );



        $purchaseList = $CI->parser->parse('purchase/trucking_list', $data, true);

        return $purchaseList;

    }



    //purchase search by supplier

    public function purchase_search_supplier($supplier_id, $links, $per_page, $page) {

        $CI = & get_instance();

        $CI->load->model('Ppurchases');

        $CI->load->model('Web_settings');

        $CI->load->library('occational');

        $Ppurchases_list = $CI->Ppurchases->purchase_search($supplier_id, $per_page, $page);

        if (!empty($Ppurchases_list)) {

            $j = 0;

            foreach ($Ppurchases_list as $k => $v) {

                $Ppurchases_list[$k]['final_date'] = $CI->occational->dateConvert($Ppurchases_list[$j]['purchase_date']);

                $j++;

            }



            $i = 0;

            foreach ($Ppurchases_list as $k => $v) {

                $i++;

                $Ppurchases_list[$k]['sl'] = $i + $CI->uri->segment(3);

            }

        }

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();

        $data = array(

            'title'          => display('manage_purchase'),

            'Ppurchases_list' => $Ppurchases_list,

            'links'          => $links,

            'currency'       => $currency_details[0]['currency'],

            'position'       => $currency_details[0]['currency_position'],

        );



        $purchaseList = $CI->parser->parse('purchase/purchase', $data, true);

        return $purchaseList;

    }



// purchase info by invoice no

    public function purchase_list_invoice_no($invoice_no) {

        $CI = & get_instance();

        $CI->load->model('Ppurchases');

        $CI->load->model('Web_settings');

        $CI->load->library('occational');

        $Ppurchases_list = $CI->Ppurchases->purchase_list_invoice_id($invoice_no);

        if (!empty($Ppurchases_list)) {

            $j = 0;

            foreach ($Ppurchases_list as $k => $v) {

                $Ppurchases_list[$k]['final_date'] = $CI->occational->dateConvert($Ppurchases_list[$j]['purchase_date']);

                $j++;

            }



            $i = 0;

            foreach ($Ppurchases_list as $k => $v) {

                $i++;

                $Ppurchases_list[$k]['sl'] = $i + $CI->uri->segment(3);

            }

        }

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();

        $data = array(

            'title'          => display('manage_purchase'),

            'Ppurchases_list' => $Ppurchases_list,

            'links'          => '',

            'currency'       => $currency_details[0]['currency'],

            'position'       => $currency_details[0]['currency_position'],

        );



        $purchaseList = $CI->parser->parse('purchase/purchase', $data, true);

        return $purchaseList;

    }



    //Purchase Item By Search

    public function purchase_by_search($supplier_id) {

        $CI = & get_instance();

        $CI->load->model('Ppurchases');

        $CI->load->library('occational');

        $Ppurchases_list = $CI->Ppurchases->purchase_by_search($supplier_id);

        $j = 0;

        if (!empty($Ppurchases_list)) {

            foreach ($Ppurchases_list as $k => $v) {

                $Ppurchases_list[$k]['final_date'] = $CI->occational->dateConvert($Ppurchases_list[$j]['purchase_date']);

                $j++;

            }

            $i = 0;

            foreach ($Ppurchases_list as $k => $v) {

                $i++;

                $Ppurchases_list[$k]['sl'] = $i;

            }

        }

        $data = array(

            'title' => display('manage_purchase'),

            'Ppurchases_list' => $Ppurchases_list

        );

        $purchaseList = $CI->parser->parse('purchase/purchase', $data, true);

        return $purchaseList;

    }



    //Insert Purchase

    public function insert_purchase($data) {

        $CI = & get_instance();

        $CI->load->model('Ppurchases');

        $CI->Ppurchases->purchase_entry($data);

        return true;

    }



    //purchase Edit Data

    public function purchase_edit_data($purchase_id) {

        $CI = & get_instance();

        $CI->load->model('Ppurchases');

        $CI->load->model('Suppliers');

        $CI->load->model('Web_settings');

        $bank_list        = $CI->Web_settings->bank_list();

        $purchase_detail = $CI->Ppurchases->retrieve_purchase_editdata($purchase_id);

        $supplier_id = $purchase_detail[0]['supplier_id'];

        $supplier_list = $CI->Suppliers->supplier_list("110", "0");

        $supplier_selected = $CI->Suppliers->supplier_search_item($supplier_id);



        if (!empty($purchase_detail)) {

            $i = 0;

            foreach ($purchase_detail as $k => $v) {

                $i++;

                $purchase_detail[$k]['sl'] = $i;

            }

        }



        $currency_details = $CI->Web_settings->retrieve_setting_editdata();

        $data = array(

            'title'         => display('purchase_edit'),

            'purchase_id'   => $purchase_detail[0]['purchase_id'],

            'chalan_no'     => $purchase_detail[0]['chalan_no'],

            'supplier_name' => $purchase_detail[0]['supplier_name'],

            'supplier_id'   => $purchase_detail[0]['supplier_id'],

             'description'   => $purchase_detail[0]['description'],

            'grand_total'   => $purchase_detail[0]['grand_total_amount'],

            'purchase_details' => $purchase_detail[0]['purchase_details'],

            'purchase_date' => $purchase_detail[0]['purchase_date'],

            'remarks'       => $purchase_detail[0]['remarks'],

            'total_discount'=> $purchase_detail[0]['total_discount'],

            'total'         => number_format($purchase_detail[0]['grand_total_amount'] + (!empty($purchase_detail[0]['total_discount'])?$purchase_detail[0]['total_discount']:0),2),

            'bank_id'       =>  $purchase_detail[0]['bank_id'],

            'purchase_info' => $purchase_detail,

            'supplier_list' => $supplier_list,

            'paid_amount'   => $purchase_detail[0]['paid_amount'],

            'due_amount'    => $purchase_detail[0]['due_amount'],

            'bank_list'     => $bank_list,

            'supplier_selected' => $supplier_selected,

            'discount_type' => $currency_details[0]['discount_type'],

            'paytype'       => $purchase_detail[0]['payment_type'],

        );



        $chapterList = $CI->parser->parse('purchase/edit_purchase_form', $data, true);

        return $chapterList;

    }



        //purchase Edit Data

    public function purchase_order_edit_data($purchase_id) {

        $CI = & get_instance();

        $CI->load->model('Ppurchases');

        $CI->load->model('Suppliers');

        $CI->load->model('Web_settings');

         $bank_list        = $CI->Web_settings->bank_list();

        $purchase_detail = $CI->Ppurchases->retrieve_purchase_order_editdata($purchase_id);



        $supplier_id = $purchase_detail[0]['supplier_id'];

        $supplier_list = $CI->Suppliers->supplier_list("110", "0");

        $supplier_selected = $CI->Suppliers->supplier_search_item($supplier_id);



        if (!empty($purchase_detail)) {

            $i = 0;

            foreach ($purchase_detail as $k => $v) {

                $i++;

                $purchase_detail[$k]['sl'] = $i;

            }

        }

    

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();

        $data = array(

            'title'  => display('purchase_edit'),

            'ship_to'  => $purchase_detail[0]['ship_to'],

            'quantity'  => $purchase_detail[0]['quantity'],

            'created_by' => $purchase_detail[0]['created_by'],

            'payment_terms' => $purchase_detail[0]['payment_terms'],
            
            'shipment_terms' => $purchase_detail[0]['shipment_terms'],

            'est_ship_date' => $purchase_detail[0]['est_ship_date'],

            'slabs' => $purchase_detail[0]['slabs'],

            'purchase_id'   => $purchase_detail[0]['purchase_id'],

            'chalan_no'     => $purchase_detail[0]['chalan_no'],

            'supplier_name' => $purchase_detail[0]['supplier_name'],

            'supplier_id'   => $purchase_detail[0]['supplier_id'],

            'grand_total_amount'   => $purchase_detail[0]['grand_total_amount'],

            'purchase_details' => $purchase_detail[0]['purchase_details'],

            'purchase_date' => $purchase_detail[0]['purchase_date'],

            'remarks'       => $purchase_detail[0]['remarks'],

            'total_discount'=> $purchase_detail[0]['total_discount'],

            'total'         => number_format($purchase_detail[0]['grand_total_amount'] + (!empty($purchase_detail[0]['total_discount'])?$purchase_detail[0]['total_discount']:0),2),

            'bank_id'       =>  $purchase_detail[0]['bank_id'],

            'purchase_info' => $purchase_detail,

            'supplier_list' => $supplier_list,

            'paid_amount'   => $purchase_detail[0]['paid_amount'],

            'due_amount'    => $purchase_detail[0]['due_amount'],

            'bank_list'     => $bank_list,
            'gtotal_preferred_currency' => $purchase_detail[0]['gtotal_preferred_currency'],
            'supplier_selected' => $supplier_selected,

            'discount_type' => $currency_details[0]['discount_type'],

            'paytype'       => $purchase_detail[0]['payment_type'],

        );

       // print_r($purchase_detail);die();
        $chapterList = $CI->parser->parse('purchase/edit_purchase_order_form', $data, true);

        return $chapterList;

    }


        //ocean import tracking Edit Data

    public function trucking_list_edit_data($purchase_id) {

        $CI = & get_instance();

        $CI->load->model('Ppurchases');

        $CI->load->model('Suppliers');

        $CI->load->model('Web_settings');

        $bank_list       = $CI->Web_settings->bank_list();

        $purchase_detail = $CI->Ppurchases->retrieve_ocean_import_tracking_editdata($purchase_id);

       


        $supplier_id = $purchase_detail[0]['supplier_id'];

        $supplier_name = $purchase_detail[0]['supplier_name'];

        $supplier_list = $CI->Suppliers->supplier_list("110", "0");

        $supplier_selected = $CI->Suppliers->supplier_search_item($supplier_id);



        if (!empty($purchase_detail)) {

            $i = 0;

            foreach ($purchase_detail as $k => $v) {

                $i++;

                $purchase_detail[$k]['sl'] = $i;

            }

        }



        $currency_details = $CI->Web_settings->retrieve_setting_editdata();

        $data = array(

            'title'         => 'Edit Ocean Import Tracking Invoice',

            'ocean_import_tracking_id'   => $purchase_detail[0]['ocean_import_tracking_id'],

            'booking_no'     => $purchase_detail[0]['booking_no'],

            'supplier_name' => $supplier_name,

            'supplier_id'   => $supplier_id,

            'container_no' => $purchase_detail[0]['container_no'],

            'seal_no'   => $purchase_detail[0]['seal_no'],

            'shipper' => $purchase_detail[0]['shipper'],

            'invoice_date' => $purchase_detail[0]['invoice_date'],

            'consignee' => $purchase_detail[0]['consignee'],

            'notify_party' => $purchase_detail[0]['notify_party'],

            'vessel' =>  $purchase_detail[0]['vessel'],

            'voyage_no' =>  $purchase_detail[0]['voyage_no'],

            'port_of_loading' =>  $purchase_detail[0]['port_of_loading'],

            'port_of_discharge' => $purchase_detail[0]['port_of_discharge'],

            'place_of_delivery' => $purchase_detail[0]['place_of_delivery'],

            'freight_forwarder'  => $purchase_detail[0]['freight_forwarder'],

            'particular' => $purchase_detail[0]['particular'],

            'attachment' => $purchase_detail[0]['attachment'],

            'status'  => $purchase_detail[0]['status'],

        );

print_r($purchase_detail);

        $chapterList = $CI->parser->parse('purchase/edit_ocean_import_tracking_form', $data, true);

        return $chapterList;

    }




        //trucking Edit Data

        public function trucking_edit_data($purchase_id) {

            $CI = & get_instance();
    
            $CI->load->model('Ppurchases');
    
            $CI->load->model('Suppliers');
    
            $CI->load->model('Web_settings');
                     $CI->load->model('Invoices');
    
             //$bank_list        = $CI->Web_settings->bank_list();
    
            $purchase_detail = $CI->Ppurchases->retrieve_trucking_editdata($purchase_id);
            $dropdown = $CI->Purchases->invoice_dropdown();
            $pro_number = $CI->Purchases->pro_number_exp();
           
            $customer_id = $purchase_detail[0]['customer_id'];
    
            if (!empty($purchase_detail)) {
    
                $i = 0;
    
                foreach ($purchase_detail as $k => $v) {
    
                    $i++;
    
                    $purchase_detail[$k]['sl'] = $i;
    
                }
    
            }
            $get_customer= $CI->accounts_model->get_customer();
                      $setting_detail = $CI->Web_settings->retrieve_setting_editdata();

            $all_supplier = $CI->Purchases->select_all_supplier();
      $pro_number = $CI->Invoices->pro_number();
            $currency_details = $CI->Web_settings->retrieve_setting_editdata();
            $curn_info_default = $CI->db->select('*')->from('currency_tbl')->where('icon',$currency_details[0]['currency'])->get()->result_array();
            $taxfield = $CI->db->select('tax_name,default_value')->from('tax_settings')->get()->result_array();
            $taxfield1 = $CI->db->select('tax_id,tax')
            ->from('tax_information')
            ->get()
            ->result_array();
            $bank_list      = $CI->Web_settings->bank_list();
          $dropdown = $CI->Purchases->invoice_dropdown();
            $data = array(
                'shipment_bl_number' =>$purchase_detail[0]['shipment_number'],
                'curn_info_default' =>$curn_info_default[0]['currency_name'],
                'currency'  =>$currency_details[0]['currency'],
                'title'         => 'Edit Trucking Invoice',
                'taxes'         => $taxfield,
                'tax'         => $taxfield1,
                'trucking_id'   => $purchase_detail[0]['trucking_id'],
                'customer_list' => $get_customer,
                'all_supplier'           =>  $all_supplier,
                'dropdown'    =>   $dropdown,
                'invoice_no'     => $purchase_detail[0]['invoice_no'],
                'remarks'    => $purchase_detail[0]['remarks'],
                'customer_name' => $purchase_detail[0]['customer_name'],
    
                'customer_id'   => $purchase_detail[0]['customer_id'],
                'bank_list'       => $bank_list,
                'bill_to'   => $purchase_detail[0]['bill_to'],
                'container_no'   => $purchase_detail[0]['container_no'],
    
                'purchase_info' => $purchase_detail,
    
                'shipment_company'   => $purchase_detail[0]['shipment_company'],
    
                'container_pickup_date'   => $purchase_detail[0]['container_pickup_date'],
    
                'delivery_date'   => $purchase_detail[0]['delivery_date'],
                    
                 'payment_id'   =>  $purchase_detail[0]['payment_id'],
                'total'         => number_format($purchase_detail[0]['grand_total_amount'] + (!empty($purchase_detail[0]['total_discount'])?$purchase_detail[0]['total_discount']:0),2),
    
       'dropdown'    =>   $dropdown,

           'setting_detail' => $setting_detail

            );
 
    
    
            $chapterList = $CI->parser->parse('purchase/edit_trucking_form', $data, true);
    
            return $chapterList;
    
        }
    



    //Search purchase

    public function purchase_search_list($cat_id, $company_id) {

        $CI = & get_instance();

        $CI->load->model('Ppurchases');

        $category_list = $CI->Ppurchases->retrieve_category_list();

        $Ppurchases_list = $CI->Ppurchases->purchase_search_list($cat_id, $company_id);

        $data = array(

            'title'          => display('manage_purchase'),

            'Ppurchases_list' => $Ppurchases_list,

            'category_list'  => $category_list

        );

        $purchaseList = $CI->parser->parse('purchase/purchase', $data, true);

        return $purchaseList;

    }



    //Purchase details data

    public function purchase_details_data($purchase_id) {



        $CI = & get_instance();

        $CI->load->model('Ppurchases');

        $CI->load->model('Web_settings');

        $CI->load->library('occational');



        $purchase_detail = $CI->Ppurchases->purchase_details_data($purchase_id);



        if (!empty($purchase_detail)) {

            $i = 0;

            foreach ($purchase_detail as $k => $v) {

                $i++;

                $purchase_detail[$k]['sl'] = $i;

            }



            foreach ($purchase_detail as $k => $v) {

                $purchase_detail[$k]['convert_date'] = $CI->occational->dateConvert($purchase_detail[$k]['purchase_date']);

            }

        }



        $currency_details = $CI->Web_settings->retrieve_setting_editdata();

        $company_info = $CI->Ppurchases->retrieve_company();

        $data = array(

            'title'            => display('purchase_details'),

            'purchase_id'      => $purchase_detail[0]['purchase_id'],

            'purchase_details' => $purchase_detail[0]['purchase_details'],

            'supplier_name'    => $purchase_detail[0]['supplier_name'],

            'final_date'       => $purchase_detail[0]['convert_date'],

            'sub_total_amount' => number_format($purchase_detail[0]['grand_total_amount'], 2, '.', ','),

            'chalan_no'        => $purchase_detail[0]['chalan_no'],

            'total'            =>  number_format($purchase_detail[0]['grand_total_amount']+(!empty($purchase_detail[0]['total_discount'])?$purchase_detail[0]['total_discount']:0), 2),

            'discount'         => number_format((!empty($purchase_detail[0]['total_discount'])?$purchase_detail[0]['total_discount']:0),2),

            'paid_amount'      => number_format($purchase_detail[0]['paid_amount'],2),

            'due_amount'      => number_format($purchase_detail[0]['due_amount'],2),

            'purchase_all_data'=> $purchase_detail,

            'company_info'     => $company_info,

            'currency'         => $currency_details[0]['currency'],

            'position'         => $currency_details[0]['currency_position'],

            'Web_settings'     => $currency_details,

        );



        $chapterList = $CI->parser->parse('purchase/purchase_detail', $data, true);

        return $chapterList;

    }



    //Purchase details data

    public function ocean_import_tracking_details_data($purchase_id) {



        $CI = & get_instance();

        $CI->load->model('Ppurchases');
   $CI->load->model('invoice_content');
        $CI->load->model('Web_settings');

        $CI->load->library('occational');

   $w = & get_instance();
     $w->load->model('Ppurchases');

        $purchase_detail = $CI->Ppurchases->ocean_import_tracking_details_data($purchase_id);
  $datacontent = $CI->invoice_content->retrieve_info_data();
     

        if (!empty($purchase_detail)) {

            $i = 0;

            foreach ($purchase_detail as $k => $v) {

                $i++;

                $purchase_detail[$k]['sl'] = $i;

            }



            foreach ($purchase_detail as $k => $v) {

                $purchase_detail[$k]['convert_date'] = $CI->occational->dateConvert($purchase_detail[$k]['invoice_date']);

            }

        }

        $CII = & get_instance();
       
        $CII->load->model('invoice_design');
      

       $dataw = $CII->invoice_design->retrieve_data1();

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $customer_name = $CI->db->select('*')->from('customer_information')->where('customer_id', $purchase_detail[0]['consignee'])->get()->result_array();
    
   $company_info = $w->Ppurchases->retrieve_company();
       
        $data = array(
            'header'=> $dataw[0]['header'],
      
          'logo'=>(!empty($setting[0]['invoice_logo'])?$setting[0]['invoice_logo']:base_url().$company_info[0]['logo']), 
        'color'=> $dataw[0]['color'],
        'template'=> $dataw[0]['template'],
            'customer_name'  => $customer_name[0]['customer_name'],
            'country_origin' => $purchase_detail[0]['country'],

        'title'            => 'Ocean Import Tracking Invoice Detail',

        'ocean_import_tracking_id'      => $purchase_detail[0]['ocean_import_tracking_id'],

            'booking_no' => $purchase_detail[0]['booking_no'],

            'container_no'    => $purchase_detail[0]['container_no'],

            'seal_no'       => $purchase_detail[0]['seal_no'],
            'etd' => $purchase_detail[0]['etd'],
            'eta' => $purchase_detail[0]['eta'],
            'supplier_id' => $purchase_detail[0]['supplier_id'],
            'supplier_name' => $purchase_detail[0]['supplier_name'],
            'shipper' => $purchase_detail[0]['shipper'],
            'invoice_date' => $purchase_detail[0]['invoice_date'],
            'consignee' => $purchase_detail[0]['consignee'],
            'notify_party' => $purchase_detail[0]['notify_party'],
            'vessel' => $purchase_detail[0]['vessel'],
            'voyage_no' => $purchase_detail[0]['voyage_no'],
            'port_of_loading' => $purchase_detail[0]['port_of_loading'],
            'port_of_discharge' => $purchase_detail[0]['port_of_discharge'],
            'place_of_delivery' => $purchase_detail[0]['place_of_delivery'],
            'freight_forwarder' => $purchase_detail[0]['freight_forwarder'],
            'particular' => $purchase_detail[0]['particular'],
            'attachment' => $purchase_detail[0]['attachment'],
            'status' => $purchase_detail[0]['status'],
            'create_by' => $purchase_detail[0]['create_by'],
            'remarks' => $purchase_detail[0]['remarks'],
            // 'sub_total_amount' => number_format($purchase_detail[0]['grand_total_amount'], 2, '.', ','),

          'company_info'=> (!empty($datacontent)?$datacontent:$company_info)

        );



        $chapterList = $CI->parser->parse('purchase/ocean_import_invoice_html', $data, true);

        return $chapterList;

    }




       //Trucking details data

       public function trucking_details_data($purchase_id) {
      
        $CI = & get_instance();
        $CI->load->model('Ppurchases');
        $CI->load->model('Web_settings');
              $CI->load->model('invoice_content'); 
        $CI->load->library('occational');
        $purchase_detail = $CI->Ppurchases->trucking_details_data($purchase_id);
                  $w = & get_instance();
     $w->load->model('Ppurchases');
        if (!empty($purchase_detail)) {
            $i = 0;
            foreach ($purchase_detail as $k => $v) {
                $i++;
                $purchase_detail[$k]['sl'] = $i;
            }
            foreach ($purchase_detail as $k => $v) {
                $purchase_detail[$k]['convert_date'] = $CI->occational->dateConvert($purchase_detail[$k]['invoice_date']);
            }
        }
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
       
        $curn_info_default = $CI->db->select('*')->from('currency_tbl')->where('icon',$currency_details[0]['currency'])->get()->result_array();
        $shipment_currency = $CI->db->select('*')->from('supplier_information')->where('supplier_name',$purchase_detail[0]['shipment_company'])->get()->result_array();
        $setting=  $CI->Web_settings->retrieve_setting_editdata();

    
        $CII = & get_instance();
        $CC = & get_instance();
        $company_info = $w->Ppurchases->retrieve_company();
        // print_r($company_info); die();
        $CII->load->model('invoice_design');
        $CC->load->model('invoice_content');


        $CI1 = & get_instance();
        $CI1->load->model('Purchases');
        $all_supplier = $CI1->Purchases->select_all_supplier();
          // print_r($all_supplier); die();
        $dataw = $CI->invoice_design->retrieve_data();
    
       // print_r($datacontent); die();

       $datacontent = $CI->invoice_content->retrieve_info_data();

// print_r( $datacontent);die();



     $data = array(
   //     'value'=>$value,
       'shipment_currency'  => $shipment_currency[0]['currency_type'],
        'curn_info_default' =>$curn_info_default[0]['currency_name'],
        'currency'  =>$currency_details[0]['currency'],
            'header'=> $dataw[0]['header'],
            'pro_no_reference' => $purchase_detail[0]['pro_no_reference'],
          'logo'=>(!empty($setting[0]['invoice_logo'])?$setting[0]['invoice_logo']:$company_info[0]['logo']), 
            'color'=> $dataw[0]['color'],
            'template'=> $dataw[0]['template'],
            'all_supplier' => $all_supplier,
           

           
 

  'business_name'=>(!empty($datacontent[0]['company_name'])?$datacontent[0]['company_name']:$company_info[0]['company_name']),   
            'phone'=>(!empty($datacontent[0]['mobile'])?$datacontent[0]['mobile']:$company_info[0]['mobile']),   
            'email'=>(!empty($datacontent[0]['email'])?$datacontent[0]['email']:$company_info[0]['email']),   
            'reg_number'=>(!empty($datacontent[0]['reg_number'])?$datacontent[0]['reg_number']:''),  
            'website'=>(!empty($datacontent[0]['website'])?$datacontent[0]['website']:$company_info[0]['website']),   
            'address'=>(!empty($datacontent[0]['address'])?$datacontent[0]['address']:$company_info[0]['address']),   
         

          //  'reg_number'=>$datacontent[0]['reg_number'],
         //   'website'=>$datacontent[0]['website'],
          
            'title'            => display('purchase_details'),
            'trucking_id'      => $purchase_detail[0]['trucking_id'],
            'grand_total' => $purchase_detail[0]['grand_total_amount'],
           
            'invoice_no' =>  $purchase_detail[0]['invoice_no'],
            'supplier' => $all_supplier[0]['supplier_name'],
            'invoice_date' => $purchase_detail[0]['invoice_date'],
            'truckingdate' => $purchase_detail[0]['trucking_date'],
            'bill_to' => $purchase_detail[0]['bill_to'],
            'shipment_company' => $purchase_detail[0]['shipment_company'],
            'container_pickup_date' => $purchase_detail[0]['container_pickup_date'],
            'delivery_date' => $purchase_detail[0]['delivery_date'],
            'customer_name' => $purchase_detail[0]['customer_name'],
            'container_no'  =>$purchase_detail[0]['container_no'],
            'qty' => $purchase_detail[0]['qty'],
            'description' => $purchase_detail[0]['description'],
            'rate' => $purchase_detail[0]['rate'],
            'remarks' => $purchase_detail[0]['remarks'],
            'pro_no_reference' => $purchase_detail[0]['pro_no_reference'],
            'total' =>  $purchase_detail[0]['total'],
            'purchase_all_data'=> $purchase_detail,
            'company_info'     => $company_info,
            'Web_settings'     => $currency_details,
            'shipment_number' => $purchase_detail[0]['shipment_number']
        );
     //  Print_r($dataw[0]['color']);
     //  print_r($data);die();
        $chapterList = $CI->parser->parse('purchase/trucking_invoice_html', $data, true);
        return $chapterList;
    }


    public function trucking_details_data_print($purchase_id) {
      
        $CI = & get_instance();
        $CI->load->model('Ppurchases');
        $CI->load->model('Web_settings');
              $CI->load->model('invoice_content'); 
        $CI->load->library('occational');
        $purchase_detail = $CI->Ppurchases->trucking_details_data($purchase_id);
                  $w = & get_instance();
     $w->load->model('Ppurchases');
        if (!empty($purchase_detail)) {
            $i = 0;
            foreach ($purchase_detail as $k => $v) {
                $i++;
                $purchase_detail[$k]['sl'] = $i;
            }
            foreach ($purchase_detail as $k => $v) {
                $purchase_detail[$k]['convert_date'] = $CI->occational->dateConvert($purchase_detail[$k]['invoice_date']);
            }
        }
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
       
        $curn_info_default = $CI->db->select('*')->from('currency_tbl')->where('icon',$currency_details[0]['currency'])->get()->result_array();
        $shipment_currency = $CI->db->select('*')->from('supplier_information')->where('supplier_name',$purchase_detail[0]['shipment_company'])->get()->result_array();
        $setting=  $CI->Web_settings->retrieve_setting_editdata();

    
        $CII = & get_instance();
        $CC = & get_instance();
      
        // print_r($company_info); die();
        $CII->load->model('invoice_design');
        $CC->load->model('invoice_content');


        $CI1 = & get_instance();
        $CI1->load->model('Purchases');
        $all_supplier = $CI1->Purchases->select_all_supplier();
          // print_r($all_supplier); die();
        $dataw = $CI->invoice_design->retrieve_data();
       $company_info = $w->Ppurchases->retrieve_company();
       // print_r($datacontent); die();

       $datacontent = $CI->invoice_content->retrieve_info_data();

// print_r( $datacontent);die();



     $data = array(
   //     'value'=>$value,
       'shipment_currency'  => $shipment_currency[0]['currency_type'],
        'curn_info_default' =>$curn_info_default[0]['currency_name'],
        'currency'  =>$currency_details[0]['currency'],
            'header'=> $dataw[0]['header'],
            'pro_no_reference' => $purchase_detail[0]['pro_no_reference'],
            // 'logo'=> $setting[0]['invoice_logo'],
            'color'=> $dataw[0]['color'],
            'template'=> $dataw[0]['template'],
            'all_supplier' => $all_supplier,
           

          
 
            'logo'=>(!empty($setting[0]['invoice_logo'])?$setting[0]['invoice_logo']:base_url().$company_info[0]['logo']),  
            'business_name'=>(!empty($datacontent[0]['company_name'])?$datacontent[0]['company_name']:$company_info[0]['company_name']),   
            'phone'=>(!empty($datacontent[0]['mobile'])?$datacontent[0]['mobile']:$company_info[0]['mobile']),   
            'email'=>(!empty($datacontent[0]['email'])?$datacontent[0]['email']:$company_info[0]['email']),   
            'reg_number'=>(!empty($datacontent[0]['reg_number'])?$datacontent[0]['reg_number']:''),  
            'website'=>(!empty($datacontent[0]['website'])?$datacontent[0]['website']:$company_info[0]['website']),   
            'address'=>(!empty($datacontent[0]['address'])?$datacontent[0]['address']:$company_info[0]['address']),   
            'title'            => display('purchase_details'),
            'trucking_id'      => $purchase_detail[0]['trucking_id'],
            'grand_total' => $purchase_detail[0]['grand_total_amount'],
           
            'invoice_no' =>  $purchase_detail[0]['invoice_no'],
            'supplier' => $all_supplier[0]['supplier_name'],
            'invoice_date' => $purchase_detail[0]['invoice_date'],
            'truckingdate' => $purchase_detail[0]['trucking_date'],
            'bill_to' => $purchase_detail[0]['bill_to'],
            'shipment_company' => $purchase_detail[0]['shipment_company'],
            'container_pickup_date' => $purchase_detail[0]['container_pickup_date'],
            'delivery_date' => $purchase_detail[0]['delivery_date'],
            'customer_name' => $purchase_detail[0]['customer_name'],
            'container_no'  =>$purchase_detail[0]['container_no'],
            'qty' => $purchase_detail[0]['qty'],
            'description' => $purchase_detail[0]['description'],
            'rate' => $purchase_detail[0]['rate'],
            'remarks' => $purchase_detail[0]['remarks'],
            'pro_no_reference' => $purchase_detail[0]['pro_no_reference'],
            'total' =>  $purchase_detail[0]['total'],
            'purchase_all_data'=> $purchase_detail,
            'company_info'     => $company_info,
            'Web_settings'     => $currency_details,
            'shipment_number' => $purchase_detail[0]['shipment_number']
        );
        // echo "<pre>";
       
        $chapterList = $CI->parser->parse('purchase/trucking_invoice_print', $data, true);
        return $chapterList;
    }
    // purchase list date to date

    public function purchase_list_date_to_date($start, $end) {

        $CI = & get_instance();

        $CI->load->model('Ppurchases');

        $CI->load->model('Web_settings');

        $CI->load->library('occational');

        $Ppurchases_list = $CI->Ppurchases->purchase_list_date_to_date($start, $end);

        if (!empty($Ppurchases_list)) {

            $j = 0;

            foreach ($Ppurchases_list as $k => $v) {

                $Ppurchases_list[$k]['final_date'] = $CI->occational->dateConvert($Ppurchases_list[$j]['purchase_date']);

                $j++;

            }



            $i = 0;

            foreach ($Ppurchases_list as $k => $v) {

                $i++;

                $Ppurchases_list[$k]['sl'] = $i + $CI->uri->segment(3);

            }

        }

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();

        $data = array(

            'title'          => display('manage_purchase'),

            'Ppurchases_list' => $Ppurchases_list,

            'links'          => '',

            'currency'       => $currency_details[0]['currency'],

            'position'       => $currency_details[0]['currency_position'],

        );



        $purchaseList = $CI->parser->parse('purchase/purchase', $data, true);

        return $purchaseList;

    }



}



?>