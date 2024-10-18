<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Linvoice {

    //Retrieve  Invoice List
    public function invoice_list() {
        $CI = & get_instance();
        $CI->load->model('Invoices');
        $CI->load->model('Web_settings');
        $CI->load->model('Permission_model');
        $assign_role=$CI->Permission_model->assign_role();
        $email_setting=$CI->Web_settings->retrieve_email_setting();

        $sale = $CI->Invoices->newsale();
 

        // print_r($sale); die();
        $CI->load->library('occational');
        $company_info = $CI->Invoices->retrieve_company();
        $invoices   = $CI->Invoices->get_all_invoice_sale();
        $invoices   = $CI->Invoices->get_all_invoice_sale();
        
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $data = array(
            'currency'       => $currency_details[0]['currency'],
            'title'         => display('manage_invoice'),
            'total_invoice' => $CI->Invoices->count_invoice(),
            'currency'      => $currency_details[0]['currency'],
            'company_info'  => $company_info,
            'role'  => $assign_role,
            'email_setting'  => $email_setting,
            'sale' => $sale,
            'invoices' => $invoices
        );
        // echo '<pre>';

        // echo '</pre>';
        $invoiceList = $CI->parser->parse('invoice/invoice', $data, true);
        return $invoiceList;
    }
public function dataCart()
     {
        $CI = & get_instance();
        $CI->load->model('Invoices');
        $customer_details = $CI->Invoices->pos_customer_setup();
        $dataFetch = $CI->Invoices->cart_items();
        $paytype=$CI->Invoices->payment_type();
        $prodt = $CI->db->select('product_name,product_model,p_quantity')->from('product_information')->get()->result_array();
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $curn_info_default = $CI->db->select('*')->from('currency_tbl')->where('icon',$currency_details[0]['currency'])->get()->result_array();
        $taxfield1 = $CI->db->select('tax_id,tax')->from('tax_information')->get()->result_array();
        $taxfield = $CI->db->select('tax_name,default_value')->from('tax_settings')->get()->result_array();
        $product_name= $CI->db->select('product_name,product_model')->from('product_information')->where('product_id',
        $dataFetch[0]['product_id'])->get()->result_array();
        $data = array(
           'title' => display('Cart'),
           'addcart_details' => $dataFetch,
           'product' =>$prodt,
           'product_name' =>$product_name[0]['product_name'].'-'.$product_name[0]['product_model'],
           'taxes' => $taxfield,
           'tax'   => $taxfield1,
           'curn_info_default' =>$curn_info_default[0]['currency_name'],
           'currency'  =>$currency_details[0]['currency'],
           'customer_details'   => $customer_details,
           'payment_typ'  =>$paytype,
           'customer' => $CI->Invoices->profarma_invoice_customer(),
        );
        if($dataFetch[0]['radio_action']=='invoice'){
        $cartdataList = $CI->parser->parse('invoice/cart_invoice_form', $data, true);
        return $cartdataList;
        }else{
        $cartdataList = $CI->parser->parse('invoice/cart_quotation_form', $data, true);
        return $cartdataList;
        }
     }
    // add cart items
    public function add_cartitems()
    {
        $CI = & get_instance();
        $data = array(
            'title' => display('View cart'),
        );
        $cartList = $CI->parser->parse('invoice/addcart_details', $data, true);
        return $cartList;
    }
    public function packing_list_edit_data($purchase_id) {

        $CI = & get_instance();
    
        $CI->load->model('Invoices');
    
        $CI->load->model('Suppliers');
    
        $CI->load->model('Web_settings');
    
         //$bank_list        = $CI->Web_settings->bank_list();
    
        $purchase_detail = $CI->Invoices->retrieve_packing_editdata($purchase_id);
   // print_r($purchase_detail);
        // $customer_id = $purchase_detail[0]['customer_id'];
    
        // $supplier_list = $CI->Suppliers->supplier_list("110", "0");
    
        // $supplier_selected = $CI->Suppliers->supplier_search_item($supplier_id);
   
    
    
        if (!empty($purchase_detail)) {
    
            $i = 0;
    
            foreach ($purchase_detail as $k => $v) {
    
                $i++;
    
                $purchase_detail[$k]['sl'] = $i;
    
            }
    
        }
    
        $prodt = $CI->db->select('product_name,product_model,p_quantity')
        ->from('product_information')
        ->where('created_by',$purchase_detail[0]['create_by'])
        ->get()
        ->result_array();
    
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
    
        $data = array(
    
            'title'         => 'Packing List Edit',
    
            'expense_packing_id'   => $purchase_detail[0]['expense_packing_id'],
    
            'invoice_no'     => $purchase_detail[0]['invoice_no'],
    
            'invoice_date'   => $purchase_detail[0]['invoice_date'],
    
            'gross_weight' => $purchase_detail[0]['gross_weight'],
    
            'container_no' => $purchase_detail[0]['container_no'],
    
            'thickness' => $purchase_detail[0]['thickness'],
    
          'remarks' =>$purchase_detail[0]['remarks'],
          'currencyd' => $currency_details[0]['currency'],
    'quantity_per_package'   =>$purchase_detail[0]['quantity_per_package'],
            'grand_total_amount' =>  $purchase_detail[0]['grand_total_amount'],
    
            'serial_no' =>   $purchase_detail[0]['serial_no'],
    
            'purchase_info' => $purchase_detail,
    
         'products' =>$prodt
    
          //  'prouduct_name' =>  $purchase_detail[0]['product_name'],
    
          
    
        );
 
    
  
      
        $chapterList = $CI->parser->parse('invoice/edit_packing_form', $data, true);
    
        return $chapterList;
    
    }

     public function profarma_invoice_list() {
        $CI = & get_instance();
        $CI->load->model('Invoices');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');
        $company_info = $CI->Invoices->retrieve_company();
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        // $email_setting = $CI->Web_settings->retrieve_email_setting();
        $sale = $CI->Invoices->newsale();
    $customer=  $CI->Invoices->profarma_invoice_customer();

        // print_r($email_setting); die();
        $data = array(
               'customer' => $customer,
            'title'         => display('manage_invoice'),
            'total_invoice' => $CI->Invoices->count_invoice(),
            'currency'      => $currency_details[0]['currency'],
            'company_info'  => $company_info,
            // 'email_setting'  => $email_setting,
            'sale' => $sale
        );
        $invoiceList = $CI->parser->parse('invoice/profarma_invoice_list', $data, true);
        return $invoiceList;
    }


     public function packing_invoice_list() {
     

        $CI = & get_instance();
        // $CII = & get_instance();
        $CI->load->model('Invoices');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');
        // $CII->load->model('invoice_design');
        // $C->load->model('invoice_content');
        $company_info = $CI->Invoices->retrieve_company();
        // $dataw = $CII->invoice_design->retrieve_data();
        // $datacontent = $CI->invoice_content->retrieve_data();
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $data = array(
            'title'         => display('manage_invoice'),
            'total_invoice' => $CI->Invoices->count_invoice(),
            'currency'      => $currency_details[0]['currency'],
            'company_info'  => $company_info,
        );

        // $data = array(
        //     'header'=> $dataw[0]['header'],
        //     'logo'=> $dataw[0]['logo'],
        //     'color'=> $dataw[0]['color'],
        //     'template'=> $dataw[0]['template'],
        //     'title'         => display('manage_invoice'),
        //     'total_invoice' => $CI->Invoices->count_invoice(),
        //     'currency'      => $currency_details[0]['currency'],
        //     'company_info'  => $company_info,
        // );

        $invoiceList = $CI->parser->parse('invoice/packing_list', $data, true);
        return $invoiceList;
    }

     public function ocean_export_tracking_invoice_list() {
     

        $CI = & get_instance();
        $CI->load->model('Invoices');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');
        $company_info = $CI->Invoices->retrieve_company();
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $ocean_exports = $CI->Invoices->getOceanExportsdata();
        $data = array(
            'title'         => 'Manage Ocean Export Invoices',
            'total_invoice' => $CI->Invoices->count_invoice(),
            'currency'      => $currency_details[0]['currency'],
            'company_info'  => $company_info,
            'ocean_exports' => $ocean_exports
        );
        $invoiceList = $CI->parser->parse('invoice/ocean_export_tracking_invoice_list', $data, true);
        return $invoiceList;
    }


         //ocean import tracking Edit Data

         public function ocean_export_tracking_edit_data($purchase_id) {

            $CI = & get_instance();
    
           $CI->load->model('Invoices');
    
            $CI->load->model('Suppliers');
    
            $CI->load->model('Web_settings');
    
            $bank_list       = $CI->Web_settings->bank_list();
    
            $purchase_detail = $CI->Invoices->retrieve_ocean_export_tracking_editdata($purchase_id);
            
            $view_attachments = $CI->Invoices->editMultiplefiles($purchase_detail[0]['booking_no']);
    
            $customer_name = $CI->db->select('*')->from('customer_information')->where('customer_id', $purchase_detail[0]['consignee'])->get()->result_array();
    
    
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
    
        $setting_detail = $CI->Web_settings->retrieve_setting_editdata();

    
            $currency_details = $CI->Web_settings->retrieve_setting_editdata();
            $customer=  $CI->Invoices->profarma_invoice_customer();
            $data = array(
    
                'title'         => 'Edit Ocean Import Tracking Invoice',
           'customs_broker_name' => $purchase_detail[0]['customs_broker_name'],
                'mbl_no' => $purchase_detail[0]['mbl_no'],
                'hbl_no'  => $purchase_detail[0]['hbl_no'],
                'obl_no' => $purchase_detail[0]['obl_no'],
                'ams_no' => $purchase_detail[0]['ams_no'],
                'isf_no'  => $purchase_detail[0]['isf_no'],
                'ocean_export_tracking_id'   => $purchase_detail[0]['ocean_export_tracking_id'],
    
                'booking_no'     => $purchase_detail[0]['booking_no'],
                'customer_name'  => $customer_name[0]['customer_name'],
                'customer_id'  => $customer_name[0]['customer_id'],
                'supplier_name' => $supplier_name,
                'supplier_list' =>$supplier_list,
    
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
                'customer' =>$customer,
                'view_attachments' => $view_attachments,
                           'setting_detail' => $setting_detail

    
            );
    
    
    
            $chapterList = $CI->parser->parse('invoice/edit_ocean_export_tracking_form', $data, true);
    
            return $chapterList;
    
        }

    
public function ocean_export_tracking_details_data_print($purchase_id) {
            $CI = & get_instance();
            $CI->load->model('Invoices');
            $CI->load->model('Web_settings');
               $CI->load->model('invoice_content');
            $CI->load->library('occational');
             $w = & get_instance();



        $w->load->model('Ppurchases');
        $company_info = $w->Ppurchases->retrieve_company();
            $purchase_detail = $CI->Invoices->ocean_export_tracking_details_data($purchase_id);
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
              $datacontent = $CI->invoice_content->retrieve_info_data();
            $currency_details = $CI->Web_settings->retrieve_setting_editdata();

            $dataw = $CII->invoice_design->retrieve_data();

            $setting=  $CI->Web_settings->retrieve_setting_editdata();

          
            $customer_name = $CI->db->select('*')->from('customer_information')->where('customer_id', $purchase_detail[0]['consignee'])->get()->result_array();
                     $setting=  $CI->Web_settings->retrieve_setting_editdata();

         
            $data = array(
                'header'=> $dataw[0]['header'],
              'logo'=>(!empty($setting[0]['invoice_logo'])?$setting[0]['invoice_logo']:$company_info[0]['logo']),  
                'color'=> $dataw[0]['color'],
                'template'=> $dataw[0]['template'],
            'title'            => 'Ocean Export Tracking Invoice Detail',
            'ocean_import_tracking_id'      => $purchase_detail[0]['ocean_export_tracking_id'],
                'booking_no' => $purchase_detail[0]['booking_no'],
              'customer_name'  => $customer_name[0]['customer_name'],
                'supplier'    => $purchase_detail[0]['supplier_name'],
                'container_no'    => $purchase_detail[0]['container_no'],
                    

          'company'=>(!empty($datacontent[0]['company_name'])?$datacontent[0]['company_name']:$company_info[0]['company_name']),   
            'phone'=>(!empty($datacontent[0]['mobile'])?$datacontent[0]['mobile']:$company_info[0]['mobile']),   
            'email'=>(!empty($datacontent[0]['email'])?$datacontent[0]['email']:$company_info[0]['email']),   
            'reg_number'=>(!empty($datacontent[0]['reg_number'])?$datacontent[0]['reg_number']:$company_info[0]['reg_number']),  
            'website'=>(!empty($datacontent[0]['website'])?$datacontent[0]['website']:$company_info[0]['website']),   
            'address'=>(!empty($datacontent[0]['address'])?$datacontent[0]['address']:$company_info[0]['address']),  
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
                'customs_broker_name' => $purchase_detail[0]['customs_broker_name'],
                'mbl_no' => $purchase_detail[0]['mbl_no'],
                'hbl_no'  => $purchase_detail[0]['hbl_no'],
                'obl_no' => $purchase_detail[0]['obl_no'],
                'ams_no' => $purchase_detail[0]['ams_no'],
                'isf_no'  => $purchase_detail[0]['isf_no'],
                'status' => $purchase_detail[0]['status'],
                'create_by' => $purchase_detail[0]['create_by'],
                // 'sub_total_amount' => number_format($purchase_detail[0]['grand_total_amount'], 2, '.', ','),
            );
            $chapterList = $CI->parser->parse('invoice/ocean_export_invoice_print', $data, true);
            return $chapterList;
        }

    


   public function ocean_export_tracking_details_data($purchase_id) {
        $CI = & get_instance();
        $CI->load->model('Invoices');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');
        $CI->load->model('invoice_content');
 $w = & get_instance();

        $w->load->model('Ppurchases');
        $company_info = $w->Ppurchases->retrieve_company();
        $purchase_detail = $CI->Invoices->ocean_export_tracking_details_data($purchase_id);
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
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $dataw = $CII->invoice_design->retrieve_data();

        $datacontent = $CI->invoice_content->retrieve_info_data();
        //  print_r($datacontent); die();
        $setting=  $CI->Web_settings->retrieve_setting_editdata();


    
        $customer_name = $CI->db->select('*')->from('customer_information')->where('customer_id', $purchase_detail[0]['consignee'])->get()->result_array();
        $data = array(
            'header'=> $dataw[0]['header'],
            'logo'=>(!empty($setting[0]['invoice_logo'])?$setting[0]['invoice_logo']:$company_info[0]['logo']),  
            'color'=> $dataw[0]['color'],
            'template'=> $dataw[0]['template'],
        'title'            => 'Ocean Export Tracking Invoice Detail',
        'ocean_import_tracking_id'      => $purchase_detail[0]['ocean_export_tracking_id'],
            'booking_no' => $purchase_detail[0]['booking_no'],
          'customer_name'  => $customer_name[0]['customer_name'],
            'supplier'    => $purchase_detail[0]['supplier_name'],
            'container_no'    => $purchase_detail[0]['container_no'],


         

 'business_name'=>(!empty($datacontent[0]['company_name'])?$datacontent[0]['company_name']:$company_info[0]['company_name']),   
            'phone'=>(!empty($datacontent[0]['mobile'])?$datacontent[0]['mobile']:$company_info[0]['mobile']),   
            'email'=>(!empty($datacontent[0]['email'])?$datacontent[0]['email']:$company_info[0]['email']),   
            'reg_number'=>(!empty($datacontent[0]['reg_number'])?$datacontent[0]['reg_number']:$company_info[0]['reg_number']),  
            'website'=>(!empty($datacontent[0]['website'])?$datacontent[0]['website']:$company_info[0]['website']),   
            'address'=>(!empty($datacontent[0]['address'])?$datacontent[0]['address']:$company_info[0]['address']),  




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
            'customs_broker_name' => $purchase_detail[0]['customs_broker_name'],
            'mbl_no' => $purchase_detail[0]['mbl_no'],
            'hbl_no'  => $purchase_detail[0]['hbl_no'],
            'obl_no' => $purchase_detail[0]['obl_no'],
            'ams_no' => $purchase_detail[0]['ams_no'],
            'isf_no'  => $purchase_detail[0]['isf_no'],
            'status' => $purchase_detail[0]['status'],
            'create_by' => $purchase_detail[0]['create_by'],
            // 'sub_total_amount' => number_format($purchase_detail[0]['grand_total_amount'], 2, '.', ','),
        );

 
        $chapterList = $CI->parser->parse('invoice/ocean_export_invoice_html', $data, true);
        return $chapterList;
    }

    public function trucking_edit_data($purchase_id) {

        $CI = & get_instance();
       
        $CI->load->model('Invoices');

        $CI->load->model('Suppliers');
        $CI->load->model('Ppurchases');
        
        $CI->load->model('Web_settings');
        $CI->load->model('Accounts_model');
         //$bank_list        = $CI->Web_settings->bank_list();

        $purchase_detail = $CI->Invoices->retrieve_trucking_editdata($purchase_id);
        
        $trucking_data = $CI->Invoices->getTruckingeditdata($purchase_detail[0]['invoice_no']);

        $setting_detail = $CI->Web_settings->retrieve_setting_editdata();

     
        $customer_id = $purchase_detail[0]['customer_id'];

        // $supplier_list = $CI->Suppliers->supplier_list("110", "0");

        // $supplier_selected = $CI->Suppliers->supplier_search_item($supplier_id);



        if (!empty($purchase_detail)) {

            $i = 0;

            foreach ($purchase_detail as $k => $v) {

                $i++;

                $purchase_detail[$k]['sl'] = $i;

            }

        }

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $curn_info_default = $CI->db->select('*')->from('currency_tbl')->where('icon',$currency_details[0]['currency'])->get()->result_array();
       $customer_name = $CI->db->select('*')->from('customer_information')->where('customer_id', $purchase_detail[0]['delivery_to'])->get()->result_array();
    
        $taxfield = $CI->db->select('tax_name,default_value')->from('tax_settings')->get()->result_array();
        $taxfield1 = $CI->db->select('tax_id,tax')
        ->from('tax_information')
        ->get()
        ->result_array();
        $get_customer= $CI->Accounts_model->get_customer();
        $all_supplier = $CI->Ppurchases->select_all_supplier_trucker();
        $pro_number = $CI->Invoices->pro_number();
        $company_info = $CI->Ppurchases->retrieve_company();
        $edit_tax = $CI->Invoices->edit_Trucking_taxdata();
        $supplier_data = $CI->Invoices->supplier_list();
      //  $pro_number = $CI->Invoices->pro_number();
        $bank_list      = $CI->Web_settings->bank_list();
        $data = array(
            'all_supplier'  => $all_supplier,
            'curn_info_default' =>$curn_info_default[0]['currency_name'],
            'currency'  =>$currency_details[0]['currency'],
'delivery_to'   => $purchase_detail[0]['delivery_to'],
            'truck_no'   => $purchase_detail[0]['truck_no'],
            'delivery_time_from' =>$purchase_detail[0]['delivery_time_from'],
                'delivery_time_to' =>$purchase_detail[0]['delivery_time_to'],
            'title'         => 'Edit Trucking Invoice',
            'taxes'         => $taxfield,
            'tax'         => $taxfield1,
            'payment_id' =>  $purchase_detail[0]['payment_id'],
            'trucking_id'   => $purchase_detail[0]['trucking_id'],

            'invoice_no'     => $purchase_detail[0]['invoice_no'],
          
            'customer_name' => $purchase_detail[0]['customer_name'],

            'customer_id'   => $purchase_detail[0]['customer_id'],
            'bank_list'       => $bank_list,
            'bill_to'   => $purchase_detail[0]['bill_to'],

            'purchase_info' => $purchase_detail,

            'shipment_company'   => $purchase_detail[0]['shipment_company'],

            'container_pickup_date'   => $purchase_detail[0]['container_pickup_date'],

            'delivery_date'   => $purchase_detail[0]['delivery_date'],

            'total'         => number_format($purchase_detail[0]['grand_total_amount'] + (!empty($purchase_detail[0]['total_discount'])?$purchase_detail[0]['total_discount']:0),2),

            'customer_list' => $get_customer,
            'company_info' => $company_info,
            'invoice'  => $pro_number,
            'trucking_data' => $trucking_data,
            'edit_tax' => $edit_tax,
            'get_supplier' => $supplier_data,
           'setting_detail' => $setting_detail

        );



        $chapterList = $CI->parser->parse('invoice/edit_trucking_form', $data, true);

        return $chapterList;

    }
   
    
   
    public function trucking_details_data($purchase_id) {
        $CI = & get_instance();
        $CI->load->model('Invoices');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');
        $purchase_detail = $CI->Invoices->trucking_details_data($purchase_id);
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

//print_r($purchase_detail);
        $setting=  $CI->Web_settings->retrieve_setting_editdata();

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $curn_info_default = $CI->db->select('*')->from('currency_tbl')->where('icon',$currency_details[0]['currency'])->get()->result_array();
              $customer_name = $CI->db->select('*')->from('customer_information')->where('customer_id', $purchase_detail[0]['delivery_to'])->get()->result_array();
        $CII = & get_instance();
        $CC = & get_instance();
        $w = & get_instance();
        $w->load->model('Ppurchases');
       $company_info = $w->Ppurchases->retrieve_company();
       // print_r($company_info); die();
        $CII->load->model('invoice_design');
        $CC->load->model('invoice_content');
        $CI1 = & get_instance();
        $CI1->load->model('Purchases');
        $all_supplier = $CI1->Purchases->select_all_supplier();
       $dataw = $CII->invoice_design->retrieve_data();
        $setting_detail = $CI->Web_settings->retrieve_setting_editdata();

       $datacontent = $CI->invoice_content->retrieve_data();
        //   print_r($datacontent); die();


     $data = array(
            'curn_info_default' =>$curn_info_default[0]['currency_name'],
            'currency'  =>$currency_details[0]['currency'],
            'header'=> $dataw[0]['header'],
          'logo'=>(!empty($setting[0]['invoice_logo'])?$setting[0]['invoice_logo']:$company_info[0]['logo']),  
            'color'=> $dataw[0]['color'],
            'template'=> $dataw[0]['template'],
            'all_supplier' => $all_supplier,
            'add'=>$company_info[0]['address'],
            'company'=>$company_info[0]['company_name'],
  


             'cname'=>(!empty($datacontent[0]['company_name'])?$datacontent[0]['company_name']:$company_info[0]['company_name']),   
            'phone'=>(!empty($datacontent[0]['mobile'])?$datacontent[0]['mobile']:$company_info[0]['mobile']),   
            'email'=>(!empty($datacontent[0]['email'])?$datacontent[0]['email']:$company_info[0]['email']),   
            'reg_number'=>(!empty($datacontent[0]['reg_number'])?$datacontent[0]['reg_number']:$company_info[0]['reg_number']),  
            'website'=>(!empty($datacontent[0]['website'])?$datacontent[0]['website']:$company_info[0]['website']),   
            'address'=>(!empty($datacontent[0]['address'])?$datacontent[0]['address']:$company_info[0]['address']),  





            'title'            => display('purchase_details'),
            'trucking_id'      => $purchase_detail[0]['trucking_id'],
            'invoice_no' =>  $purchase_detail[0]['invoice_no'],
            'invoice_date' => $purchase_detail[0]['invoice_date'],
            'bill_to' => $purchase_detail[0]['bill_to'],
            'shipment_company' => $purchase_detail[0]['shipment_company'],
            'container_pickup_date' => $purchase_detail[0]['container_pickup_date'],
            'delivery_date' => $purchase_detail[0]['delivery_date'],
            'truckingdate' => $purchase_detail[0]['trucking_date'],
          'delivery_to'   => $purchase_detail[0]['delivery_to'],
            'truck_no'   => $purchase_detail[0]['truck_no'],
            'delivery_time_from' =>$purchase_detail[0]['delivery_time_from'],
       'delivery_time_to' =>$purchase_detail[0]['delivery_time_to'],
            'customer_name' => $purchase_detail[0]['customer_name'],
            'customer_currency' => $purchase_detail[0]['currency_type'],
            'qty' => $purchase_detail[0]['qty'],
            'description' => $purchase_detail[0]['description'],
            'rate' => $purchase_detail[0]['rate'],
           // 'pro_no_reference' => $purchase_detail[0]['pro_no_reference'],
            'total_amt' =>  $purchase_detail[0]['total_amt'],
            'tax' =>  $purchase_detail[0]['tax'],
            'grandtotal' =>  $purchase_detail[0]['grand_total_amount'],
            'remarks' =>  $purchase_detail[0]['remarks'],
            'purchase_all_data'=> $purchase_detail,
           // 'company_info'     => $company_info,
            'Web_settings'     => $currency_details,
                       'setting_detail' => $setting_detail

        );

     /// print_r($dataw[0]['color']);

        // echo "<pre>";
        $chapterList = $CI->parser->parse('invoice/trucking_invoice_html', $data, true);
        return $chapterList;
    }

   public function trucking_details_data_print($purchase_id) {
        $CI = & get_instance();
        $CI->load->model('Invoices');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');
        $purchase_detail = $CI->Invoices->trucking_details_data($purchase_id);
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
  $customer_name = $CI->db->select('*')->from('customer_information')->where('customer_id', $purchase_detail[0]['delivery_to'])->get()->result_array();
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $curn_info_default = $CI->db->select('*')->from('currency_tbl')->where('icon',$currency_details[0]['currency'])->get()->result_array();
        $CII = & get_instance();
        $CC = & get_instance();
        $w = & get_instance();
        $w->load->model('Ppurchases');
       $company_info = $w->Ppurchases->retrieve_company();
       // print_r($company_info); die();
        $CII->load->model('invoice_design');
        $CC->load->model('invoice_content');
        $CI1 = & get_instance();
        $CI1->load->model('Purchases');

        $setting=  $CI->Web_settings->retrieve_setting_editdata();
        $all_supplier = $CI1->Purchases->select_all_supplier();
       $dataw = $CII->invoice_design->retrieve_data();
       $datacontent = $CI->invoice_content->retrieve_data();
     $data = array(
        'curn_info_default' =>$curn_info_default[0]['currency_name'],
        'currency'  =>$currency_details[0]['currency'],
            'header'=> $dataw[0]['header'],
           'logo'=>(!empty($setting[0]['invoice_logo'])?$setting[0]['invoice_logo']:$company_info[0]['logo']),  
            'color'=> $dataw[0]['color'],
            'template'=> $dataw[0]['template'],
            'all_supplier' => $all_supplier,
            'add'=>$company_info[0]['address'],
            'company'=>$company_info[0]['company_name'],
            'cname'=>(!empty($datacontent[0]['company_name'])?$datacontent[0]['company_name']:$company_info[0]['company_name']),   
            'phone'=>(!empty($datacontent[0]['mobile'])?$datacontent[0]['mobile']:$company_info[0]['mobile']),   
            'email'=>(!empty($datacontent[0]['email'])?$datacontent[0]['email']:$company_info[0]['email']),   
            'reg_number'=>(!empty($datacontent[0]['reg_number'])?$datacontent[0]['reg_number']:$company_info[0]['reg_number']),  
            'website'=>(!empty($datacontent[0]['website'])?$datacontent[0]['website']:$company_info[0]['website']),   
            'address'=>(!empty($datacontent[0]['address'])?$datacontent[0]['address']:$company_info[0]['address']),  
            'title'            => display('purchase_details'),
            'trucking_id'      => $purchase_detail[0]['trucking_id'],
            'invoice_no' =>  $purchase_detail[0]['invoice_no'],
            'invoice_date' => $purchase_detail[0]['invoice_date'],
            'bill_to' => $purchase_detail[0]['bill_to'],
            'shipment_company' => $purchase_detail[0]['shipment_company'],
            'container_pickup_date' => $purchase_detail[0]['container_pickup_date'],
            'delivery_date' => $purchase_detail[0]['delivery_date'],
            'truckingdate' => $purchase_detail[0]['trucking_date'],
            'delivery_to'   => $purchase_detail[0]['delivery_to'],
            'truck_no'   => $purchase_detail[0]['truck_no'],
           'delivery_time_from' =>$purchase_detail[0]['delivery_time_from'],
       'delivery_time_to' =>$purchase_detail[0]['delivery_time_to'],
            'customer_name' => $purchase_detail[0]['customer_name'],
            'customer_currency' => $purchase_detail[0]['currency_type'],
            'qty' => $purchase_detail[0]['qty'],
            'description' => $purchase_detail[0]['description'],
            'rate' => $purchase_detail[0]['rate'],
           // 'pro_no_reference' => $purchase_detail[0]['pro_no_reference'],
            'total_amt' =>  $purchase_detail[0]['total_amt'],
            'tax' =>  $purchase_detail[0]['tax'],
            'grandtotal' =>  $purchase_detail[0]['grand_total_amount'],
            'remarks' =>  $purchase_detail[0]['remarks'],
            'purchase_all_data'=> $purchase_detail,
           // 'company_info'     => $company_info,
            'Web_settings'     => $currency_details,
        );
        // echo "<pre>";
        $chapterList = $CI->parser->parse('invoice/trucking_invoice_print', $data, true);
        return $chapterList;
    }

    public function trucking_invoice_list() {
     

        $CI = & get_instance();
        $CI->load->model('Invoices');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');
        $company_info = $CI->Invoices->retrieve_company();
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $transports = $CI->Invoices->getRoadTransportData();
        // print_r($transports);
        $data = array(
            'title'         => display('manage_invoice'),
            'total_invoice' => $CI->Invoices->count_invoice(),
            'currency'      => $currency_details[0]['currency'],
            'company_info'  => $company_info,
            'transports' => $transports,
        );
        $invoiceList = $CI->parser->parse('invoice/trucking_invoice_list', $data, true);
        return $invoiceList;
    }

    //pdf download
    public function pdf_download(){
             $CI = & get_instance();
        $CI->load->model('Invoices');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');

        $invoices_list = $CI->Invoices->invoice_list_pdf();
        if (!empty($invoices_list)) {
            $i = 0;
            if (!empty($invoices_list)) {
                 foreach ($invoices_list as $k => $v) {
                $invoices_list[$k]['final_date'] = $CI->occational->dateConvert($invoices_list[$k]['date']);
            }
                foreach ($invoices_list as $k => $v) {
                    $i++;
                    $invoices_list[$k]['sl'] = $i + $CI->uri->segment(3);
                }
            }
        }
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
       
        $data = array(
            'title'         => display('manage_invoice'),
            'invoices_list' => $invoices_list,
            'currency'      => $currency_details[0]['currency'],
            'position'      => $currency_details[0]['currency_position']
        );
        $invoiceList = $CI->parser->parse('invoice/invoice_list_pdf', $data, true);
        return $invoiceList;
    }

    // Search invoice by customer id
    public function invoice_search($customer_id, $links, $per_page, $page) {

        $CI = & get_instance();
        $CI->load->model('Invoices');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');

        $invoices_list = $CI->Invoices->invoice_search($customer_id, $per_page, $page);
        if (!empty($invoices_list)) {
            foreach ($invoices_list as $k => $v) {
                $invoices_list[$k]['final_date'] = $CI->occational->dateConvert($invoices_list[$k]['date']);
            }
            $i = 0;
            if (!empty($invoices_list)) {
                foreach ($invoices_list as $k => $v) {
                    $i++;
                    $invoices_list[$k]['sl'] = $i + $CI->uri->segment(3);
                }
            }
        }
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $data = array(
            'title'         => display('manage_invoice'),
            'invoices_list' => $invoices_list,
            'links'         => $links,
            'currency'      => $currency_details[0]['currency'],
            'position'      => $currency_details[0]['currency_position'],
        );
        $invoiceList = $CI->parser->parse('invoice/invoice', $data, true);
        return $invoiceList;
    }

    //inovie_manage search by invoice id
    public function invoice_list_invoice_no($invoice_no) {

        $CI = & get_instance();
        $CI->load->model('Invoices');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');

        $invoices_list = $CI->Invoices->invoice_list_invoice_id($invoice_no);
        if (!empty($invoices_list)) {
            foreach ($invoices_list as $k => $v) {
                $invoices_list[$k]['final_date'] = $CI->occational->dateConvert($invoices_list[$k]['date']);
            }
            $i = 0;
            if (!empty($invoices_list)) {
                foreach ($invoices_list as $k => $v) {
                    $i++;
                    $invoices_list[$k]['sl'] = $i + $CI->uri->segment(3);
                }
            }
        }
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $data = array(
            'title'         => display('manage_invoice'),
            'invoices_list' => $invoices_list,
            'links'         => '',
            'currency'      => $currency_details[0]['currency'],
            'position'      => $currency_details[0]['currency_position'],
        );
        $invoiceList = $CI->parser->parse('invoice/invoice', $data, true);
        return $invoiceList;
    }

    // date to date invoice list 
    public function invoice_list_date_to_date($from_date, $to_date, $links, $perpage, $page) {

        $CI = & get_instance();
        $CI->load->model('Invoices');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');

        $invoices_list = $CI->Invoices->invoice_list_date_to_date($from_date, $to_date, $perpage, $page);
        if (!empty($invoices_list)) {
            foreach ($invoices_list as $k => $v) {
                $invoices_list[$k]['final_date'] = $CI->occational->dateConvert($invoices_list[$k]['date']);
            }
            $i = 0;
            if (!empty($invoices_list)) {
                foreach ($invoices_list as $k => $v) {
                    $i++;
                    $invoices_list[$k]['sl'] = $i + $CI->uri->segment(3);
                }
            }
        }
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $data = array(
            'title'         => display('manage_invoice'),
            'invoices_list' => $invoices_list,
            'links'         => $links,
            'currency'      => $currency_details[0]['currency'],
            'position'      => $currency_details[0]['currency_position'],
        );
        $invoiceList = $CI->parser->parse('invoice/invoice', $data, true);
        return $invoiceList;
    }

    //Pos invoice add form
    public function pos_invoice_add_form() {

        $CI = & get_instance();
        $CI->load->model('Invoices');
        $CI->load->model('Web_settings');
        $customer_details = $CI->Invoices->pos_customer_setup();
        $bank_list        = $CI->Web_settings->bank_list();
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $taxfield = $CI->db->select('tax_name,default_value')
                ->from('tax_settings')
                ->get()
                ->result_array();
                $tablecolumn = $CI->db->list_fields('tax_collection');
                $num_column = count($tablecolumn)-4;
        $data = array(
            'title'         => display('pos_invoice'),
            'customer_name' => $customer_details[0]['customer_name'],
            'customer_id'   => $customer_details[0]['customer_id'],
            'discount_type' => $currency_details[0]['discount_type'],
            'taxes'         => $taxfield,
            'taxnumber'     => $num_column,
            'bank_list'     => $bank_list,
        );
        $invoiceForm = $CI->parser->parse('invoice/add_pos_invoice_form', $data, true);
        return $invoiceForm;
    }

    //Retrieve  Invoice List
    public function search_inovoice_item($customer_id) {
        $CI = & get_instance();
        $CI->load->model('Invoices');
        $CI->load->library('occational');
        $invoices_list = $CI->Invoices->search_inovoice_item($customer_id);
        if (!empty($invoices_list)) {
            foreach ($invoices_list as $k => $v) {
                $invoices_list[$k]['final_date'] = $CI->occational->dateConvert($invoices_list[$k]['date']);
            }
            $i = 0;
            if (!empty($invoices_list)) {
                foreach ($invoices_list as $k => $v) {
                    $i++;
                    $invoices_list[$k]['sl'] = $i + $CI->uri->segment(3);
                }
            }
        }
        $data = array(
            'title' => display('manage_invoice'),
            'invoices_list' => $invoices_list
        );
        $invoiceList = $CI->parser->parse('invoice/invoice', $data, true);
        return $invoiceList;
    }


public function tax_data() {
        $this->db->select('tax_id,tax');
        $this->db->from('tax_information');
        $this->db->where('created_by' ,$this->session->userdata('user_id'));
        $query = $this->db->get();
    //    echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }




    
public function invoice_add_form() {
        $CI = & get_instance();
        ////////////Tax value////////////////
        $tx=& get_instance();
        $tx->load->model('Tax');
        $tx->Tax->taxlist();
        $CI = & get_instance();
        $CI->load->model('Invoices');
        $CI->load->model('Web_settings');
        $CI->load->model('Products');
        $CI->load->model('Categories');
        $CI->load->model('Units');
        $CI->load->model('Purchases');
        $CI->load->model('Suppliers');
        $CI->load->model('Hrm_model');
        $employee_id_get1 = $CI->Invoices->employee_id_get();
        $get_user_id = $CI->Invoices->user_id_get();
        $customer_details = $CI->Invoices->pos_customer_setup();
        $payment_type= $CI->Invoices->payment_type();
        $tax_data = $CI->Invoices->get_taxDatadetails();
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $product_bundle = $CI->Invoices->get_product_bundle();
        $supplier_block_no = $CI->Invoices->get_product_supplier_block();
        $update_invoice_set = $CI->Web_settings->update_invoice();
        $taxfield1 =  $CI->Invoices->tax_data();
        $curn_info_default = $CI->db->select('*')->from('currency_tbl')->where('icon',$currency_details[0]['currency'])->get()->result_array();
        $product_no = $CI->Products->product_id_number();
        $bank_name = $CI->db->select('bank_name')
        ->from('bank_add')
        ->get()
        ->result_array();
        $container_booking_no= $CI->Invoices->container_booking_no();
        $taxfield = $CI->db->select('tax_name,default_value')
                ->from('tax_settings')
                ->get()
                ->result_array();
                $get_agent_data = $CI->Invoices->get_agent_data();
        $bank_list          = $CI->Web_settings->bank_list();
        $prodt = $CI->Products->get_all_products();
        $payment_terms_dropdown = $CI->Suppliers->payment_terms_dropdown();
        $category_list = $CI->Categories->category_list_product();
        $unit_list     = $CI->Units->unit_list();
        $all_supplier = $CI->Purchases->select_all_supplier();
        $paytype=$CI->Invoices->payment_type();
        $voucher_no = $CI->Invoices->commercial_inv_number();
        $servic_provider = $CI->Invoices->servic_provider_list();
        $sales_packing_list = $CI->Invoices->sales_packing_list();
        $setting_detail = $CI->Web_settings->retrieve_setting_editdata();
        $designation = $CI->Hrm_model->designation_dropdown();
        $PayType = $CI->Hrm_model->paytype_dropdown();
        $bankData = $CI->Hrm_model->bankdataDetails();
        $state_tx = $CI->Hrm_model->state_tax();
        $get_info_city_tax = $CI->Hrm_model->get_info_city_tax();
        $get_info_county_tax = $CI->Hrm_model->get_info_county_tax();
        $getEmployeeData = $CI->Hrm_model->get_employeeTypedata();
        $data = array(
            'supplier_block_no'=>$supplier_block_no,
            'curn_info_default' =>$curn_info_default[0]['currency_name'],
            'bundle' => $product_bundle,
            'currency'  =>$currency_details[0]['currency'],
            'title'         => display('add_new_invoice'),
            'discount_type' => $currency_details[0]['discount_type'],
            'taxes'         => $taxfield,
            'payment_terms' => $payment_terms_dropdown,
            'bank_name'  =>$bank_name,
            'servic_provider'=>$servic_provider,
            'tax'           => $taxfield1,
            'product_no' => $product_no,
            'category_list'=> $category_list,
            'unit_list'    => $unit_list,
            'all_supplier'  => $all_supplier,
            'booking_no'=>$container_booking_no,
            'get_agent_data' =>  $get_agent_data,
            'container_no'=>$container_booking_no,
            'product'       =>$prodt,
            'tax_data' => $tax_data,
            'customer_details'   => $customer_details,
            'customer_currency' =>isset($customer_details[0]['currency_type'])?$customer_details[0]['currency_type']:'',
            'customer_name' => isset($customer_details[0]['customer_name'])?$customer_details[0]['customer_name']:'',
            'customer_id'   => isset($customer_details[0]['customer_id'])?$customer_details[0]['customer_id']:'',
            'bank_list'     => $bank_list,
            'voucher_no' => $voucher_no,
            'tax_name'=>'ww',
            'packinglist'=>$sales_packing_list,
            'payment_typ'  =>$paytype,
            'update_invoice_set' =>$update_invoice_set,
            'setting_detail' => $setting_detail,
            'account' =>$update_invoice_set[0]->account,
            'remarks' =>  $update_invoice_set[0]->remarks,
            'employee_id_get' =>  $employee_id_get1,
            'get_user_id' =>  $get_user_id,
            'desig' => $designation,
            'paytype' => $PayType,
            'bank_data' => $bankData,
            'state_tx' => $state_tx,
            'get_info_city_tax' => $get_info_city_tax,
            'get_info_county_tax' => $get_info_county_tax,
            'emp_data' => $getEmployeeData
        );
        // print_r($get_user_id);
        $invoiceForm = $CI->parser->parse('invoice/add_invoice_form', $data, true);
        return $invoiceForm;
    }
    
    
    
    
    
    
    
    public function invoice_add_form1() {
        $CI = & get_instance();
        ////////////Tax value////////////////
        $tx=& get_instance();
        $tx->load->model('Tax');
        $tx->Tax->taxlist();
       // $taxfield = $CI->db->select('tax_name,default_value')
       // ->from('tax_settings')
       // ->get()
       // ->result_array();
       // $data1 = array(
       //     'taxes'         => $taxfield
      //  );
      //  $invoiceForm = $CI->parser->parse('invoice/add_invoice_form', $data1, true);
        $CI = & get_instance();
        $CI->load->model('Invoices');
        $CI->load->model('Web_settings');
                $CI->load->model('Purchases');

        $CI->load->model('Categories');
        $CI->load->model('Units');
        $customer_details = $CI->Invoices->pos_customer_setup();
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $curn_info_default = $CI->db->select('*')->from('currency_tbl')->where('icon',$currency_details[0]['currency'])->get()->result_array();
        $taxfield1 = $CI->db->select('tax_id,tax')
        ->from('tax_information')
        ->get()
        ->result_array();
        $taxfield = $CI->db->select('tax_name,default_value')
                ->from('tax_settings')
                ->get()
                ->result_array();
        $bank_list          = $CI->Web_settings->bank_list();
        $prodt = $CI->db->select('product_name,product_model,p_quantity')
        ->from('product_information')
        ->get()
        ->result_array();
      //  print_r($prodt);
        $voucher_no = $CI->Invoices->commercial_inv_number();
                   $category_list = $CI->Categories->category_list_product();
        $unit_list     = $CI->Units->unit_list();
         $all_supplier = $CI->Purchases->select_all_supplier();
        $data = array(

            'curn_info_default' =>$curn_info_default[0]['currency_name'],
            //  'curn_info_customer'=>$curn_info_customer[0]['currency_name'],
              'currency'  =>$currency_details[0]['currency'],
            'title'         => display('add_new_invoice'),
            'discount_type' => $currency_details[0]['discount_type'],
            'taxes'         => $taxfield,
            'tax'           => $taxfield1,
             'all_supplier'  => $all_supplier,
               'category_list'=> $category_list,
            'unit_list'    => $unit_list,
            'product'       =>$prodt,
            'customer_currency' =>isset($customer_details[0]['currency_type'])?$customer_details[0]['currency_type']:'',
            'customer_name' => isset($customer_details[0]['customer_name'])?$customer_details[0]['customer_name']:'',
            'customer_id'   => isset($customer_details[0]['customer_id'])?$customer_details[0]['customer_id']:'',
            'bank_list'     => $bank_list,
            'voucher_no' => $voucher_no,
                'tax_name'=>'ww',
        );
      //  $invoiceForm = $CI->parser->parse('invoice/add_invoice_form', $data, true);
        $invoiceForm = $CI->parser->parse('invoice/profarma_invoice', $data, true);
        return $invoiceForm;
    }

      //ocean_export_tracking_add_form
      public function ocean_export_tracking_add_form() {
        $CI = & get_instance();
        $CI->load->model('Invoices');
        $CI->load->model('Ppurchases');
        $CI->load->model('Web_settings');
        $all_supplier = $CI->Ppurchases->select_all_supplier();
        $customer_details = $CI->Invoices->pos_customer_setup();
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();


        $ocean_remarks = $CI->Web_settings->ocean_remarks();

        $setting_detail = $CI->Web_settings->retrieve_setting_editdata();

        $taxfield = $CI->db->select('tax_name,default_value')->from('tax_settings')->get()->result_array();
        $bank_list          = $CI->Web_settings->bank_list();
        $data = array(
            'title'         => 'Add New Export Invoice',
            'discount_type' => $currency_details[0]['discount_type'],
            'taxes'         => $taxfield,
            'customer_name' => $CI->Invoices->pos_customer_setup(),
            'customer_id'   => isset($customer_details[0]['customer_id'])?$customer_details[0]['customer_id']:'',
            'bank_list'     => $bank_list,
               'all_supplier'  => $all_supplier,

                'ocean_remarks' =>$ocean_remarks,   
                'remarks' =>  $ocean_remarks[0]->remarks,
                           'setting_detail' => $setting_detail

        );

        // print_r(   $data);


        $invoiceForm = $CI->parser->parse('invoice/ocean_export_tracking', $data, true);
        return $invoiceForm;
    }









      //Invoice add form
    public function trucking_add_form() {
        $CI = & get_instance();
        $CI->load->model('Invoices');
        $CI->load->model('Accounts_model');
        $CI->load->model('Web_settings');
        $CI->load->model('Ppurchases');
        $all_supplier = $CI->Ppurchases->select_all_supplier_trucker();
        $customer_details = $CI->Invoices->pos_customer_setup();
        $get_customer= $CI->Accounts_model->get_customer();


        $pro_number = $CI->Invoices->pro_number();
        $voucher = $CI->Invoices->sale_trucking_voucher();
       // print_r($customer_details);
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $curn_info_default = $CI->db->select('*')->from('currency_tbl')->where('icon',$currency_details[0]['currency'])->get()->result_array();
        $taxfield = $CI->db->select('tax_name,default_value')->from('tax_settings')->get()->result_array();
        // $taxfield1 = $CI->db->select('tax_id,tax')
        // ->from('tax_information')
        // ->get()
        // ->result_array();
        $company_info = $CI->Invoices->company_information();
        
        $trucking_data = $CI->Invoices->getAllTruckingdata();
       
               $setting_detail = $CI->Web_settings->retrieve_setting_editdata();

        $roadtransport_remarks = $CI->Web_settings->roadtransport_remarks();

    //    print_r($roadtransport_remarks);
       
       $taxfield1 =  $CI->Invoices->tax_data();
        $bank_list = $CI->Web_settings->bank_list();
        $data = array(
            'curn_info_default' =>$curn_info_default[0]['currency_name'],
            'currency'  =>$currency_details[0]['currency'],
            'title'         => 'Add New Trucking Invoice',
            'discount_type' => $currency_details[0]['discount_type'],
            'all_supplier'  => $all_supplier,
            'taxes'         => $taxfield,
            'tax'         => $taxfield1,
            'company_name' =>$company_info,
            'customer_name' => isset($customer_details[0]['customer_name'])?$customer_details[0]['customer_name']:'',
            'customer_id'   => isset($customer_details[0]['customer_id'])?$customer_details[0]['customer_id']:'',
            'bank_list'     => $bank_list,
            'customer_list' => $get_customer,
           'setting_detail' => $setting_detail,

            'invoice'  => $pro_number,
          'voucher_no' => $voucher,
          'trucking_data' => $trucking_data,

          
   'roadtransport_remarks' =>$roadtransport_remarks,   
   'remarks' =>  $roadtransport_remarks[0]->remarks
        );

        

        $invoiceForm = $CI->parser->parse('invoice/trucking', $data, true);
        return $invoiceForm;
    }
    public function trucking_add_form1() {
        $CI = & get_instance();
        $CI->load->model('Invoices');
        $CI->load->model('Accounts_model');
        $CI->load->model('Web_settings');
        $CI->load->model('Ppurchases');
        $all_supplier = $CI->Ppurchases->select_all_supplier_trucker();
        $customer_details = $CI->Invoices->pos_customer_setup();
        $get_customer= $CI->Accounts_model->get_customer();
       // print_r($customer_details);
     
        $taxfield = $CI->db->select('tax_name,default_value')
                ->from('tax_settings')
                ->get()
                ->result_array();
        $bank_list          = $CI->Web_settings->bank_list();
        $data = array(
           
            'title'         => 'Add New Trucking Invoice',
            'discount_type' => $currency_details[0]['discount_type'],
                 'all_supplier'  => $all_supplier,
            'taxes'         => $taxfield,
            'customer_name' => isset($customer_details[0]['customer_name'])?$customer_details[0]['customer_name']:'',
            'customer_id'   => isset($customer_details[0]['customer_id'])?$customer_details[0]['customer_id']:'',
            'bank_list'     => $bank_list,
              'customer_list' => $get_customer
        );

        $invoiceForm = $CI->parser->parse('purchase/trucking', $data, true);
      
        return $invoiceForm;
    }

    public function profarma_invoice_add() {
        $CI = & get_instance();
        $CI->load->model('Invoices');
        $data = $CI->Invoices->profarma_invoice_customer();
       
        $profarma_customer = $CI->parser->parse('invoice/profarma_invoice', $data, true);

       // print_r($data); die;
        return $profarma_customer;
    }
    //Insert invoice
    public function insert_invoice($data) {
        $CI = & get_instance();
        $CI->load->model('Invoices');
        $CI->Invoices->invoice_entry($data);
        return true;
    }









    //Invoice Edit Data
   public function invoice_edit_data($invoice_id) {
        $CI = & get_instance();
        $CI->load->model('Invoices');
        $CI->load->model('Web_settings');
        $CI->load->model('Products');
        $CI->load->model('Suppliers');
        $customer = $CI->Invoices->profarma_invoice_customer();
        $invoice_detail = $CI->Invoices->retrieve_invoice_editdata($invoice_id);
        $get_alldata =  $CI->Invoices->all_datainvoice($invoice_id);
        $employee_id_get = $CI->Invoices->employee_id_get();
        $get_user_id = $CI->Invoices->user_id_get();
        $edit_files = $CI->Invoices->getInvoiceEditfiles($get_alldata[0]['commercial_invoice_number']);
        $edit_invoicedata = $CI->Invoices->editAlldatainvoice();
        $bank_list      = $CI->Web_settings->bank_list();
        $taxinfo        = $CI->Invoices->service_invoice_taxinfo($invoice_id);
        $taxfield       = $CI->db->select('tax_name,default_value')
                ->from('tax_settings')
                ->get()
                ->result_array();
        $i = 0;
        if (!empty($invoice_detail)) {
            foreach ($invoice_detail as $k => $v) {
                $i++;
                $invoice_detail[$k]['sl'] = $i;
                $stock = $CI->Invoices->stock_qty_check($invoice_detail[$k]['product_id']);
                $invoice_detail[$k]['stock_qty'] = $stock + $invoice_detail[$k]['quantity'];
            }
        }
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $product_bundle = $CI->Invoices->get_product_bundle();
        $supplier_block_no = $CI->Invoices->get_product_supplier_block();
        $paytype=$CI->Invoices->payment_type();
        $curn_info_default = $CI->db->select('*')->from('currency_tbl')->where('icon',$currency_details[0]['currency'])->get()->result_array();
        $prodt = $CI->Products->get_all_products();
        $taxfield1 = $CI->db->select('tax_id,tax')
        ->from('tax_information')
        ->get()
        ->result_array();
        $all_invoice = $CI->Invoices->all_invoice($invoice_id);
         $user_name = $CI->db->select('first_name, last_name')
        ->from('users')
        ->where('id', $all_invoice[0]['user_emp_id'])
        ->get()
        ->result_array();
        $sales_packing_list = $CI->Invoices->sales_packing_list();
        $servic_provider = $CI->Invoices->servic_provider_list();
        $payment_terms_dropdown = $CI->Suppliers->payment_terms_dropdown();
        $setting_detail = $CI->Web_settings->retrieve_setting_editdata();
        $agent_name = $CI->db->select('*')
       ->from('agent')
       ->where('id', $all_invoice[0]['user_emp_id'])
       ->get()
       ->result_array();
       $get_agent_data = $CI->Invoices->get_agent_data();
        $additional_cost_details = $CI->Invoices->additional_cost_details($invoice_detail[0]['commercial_invoice_number']);
        $data = array(
                 'supplier_block_no'=>$supplier_block_no,
                  'bundle' => $product_bundle,
                    'servic_provider'=>$servic_provider,
                    'additional_cost' =>$additional_cost_details,
          'customer'  => $customer,
            'curn_info_default' =>$curn_info_default[0]['currency_name'],
            'currency'  =>$currency_details[0]['currency'],
            'title'           => display('invoice_edit'),
            'invoice_id'      => $invoice_detail[0]['invoice_id'],
            'customer_id'     => $invoice_detail[0]['customer_id'],
            'customer_name'   => $invoice_detail[0]['customer_name'],
            'date'            => $invoice_detail[0]['date'],
            'commercial_invoice_number' => $invoice_detail[0]['commercial_invoice_number'],
            'billing_address' => $invoice_detail[0]['billing_address'],
            'container_no'=> $invoice_detail[0]['container_no'],
            'bl_no'=> $invoice_detail[0]['bl_no'],
            'product'       =>$prodt,
            'port_of_discharge' => $invoice_detail[0]['port_of_discharge'],
            'invoice_detail' => $invoice_detail[0]['invoice_details'],
            'invoice'         => $invoice_detail[0]['invoice'],
            'total_amount'    => $invoice_detail[0]['total_amount'],
            'paid_amount'     => $invoice_detail[0]['amount_paid'],
            'due_amount'      => $all_invoice[0]['due_amount'],
            'invoice_discount'=> $invoice_detail[0]['invoice_discount'],
            'total_discount'  => $invoice_detail[0]['total_discount'],
            'unit'            => $invoice_detail[0]['unit'],
            'tax'             => $invoice_detail[0]['tax'],
            'payment_terms'             => $invoice_detail[0]['payment_terms'],
            'payment_term' => $payment_terms_dropdown,
             'user_emp_id'         => $all_invoice[0]['user_emp_id'],
              'user_name'         => $user_name,
            'number_of_days'  =>$invoice_detail[0]['number_of_days'],
            'etd'  =>$invoice_detail[0]['etd'],
            'eta'  =>$invoice_detail[0]['eta'],
            'all_tax' =>$taxfield1,
            'payment_due_date' =>$invoice_detail[0]['payment_due_date'],
            'taxes'          => $taxfield,
            'prev_due'        => $invoice_detail[0]['prevous_due'],
            'net_total'       => $invoice_detail[0]['prevous_due'] + $invoice_detail[0]['total_amount'],
            'shipping_cost'   => $invoice_detail[0]['shipping_cost'],
            'total_tax'       => $invoice_detail[0]['taxs'],
            'invoice_all_data'=> $invoice_detail,
            'taxvalu'         => $taxinfo,
            'payment_type'  =>$paytype,
            'all_invoice'=>$all_invoice,
            'date'=> $all_invoice[0]['date'],
            'rate'=> $all_invoice[0]['rate'],
            'ac_details'=> $all_invoice[0]['ac_details'],
            'remark'=> $all_invoice[0]['remark'],
            'total'=> $all_invoice[0]['total_price'],
            'tax_details'=> $all_invoice[0]['total_tax'],
            'etd'=> $all_invoice[0]['etd'],
            'eta'=> $all_invoice[0]['eta'],
            'gtotal'       => $all_invoice[0]['gtotal'],
            'discount_type'   => $currency_details[0]['discount_type'],
            'bank_list'       => $bank_list,
            'bank_id'         => $invoice_detail[0]['bank_id'],
            'paytype'         => $invoice_detail[0]['payment_type'],
            'account_category'         => $all_invoice[0]['account_category'],
            'sub_category'         => $all_invoice[0]['sub_category'],
            'account_subcat'         => $all_invoice[0]['account_subcat'],
            'invoice_detail'=>$invoice_detail,
            'employee_id_get' =>  $employee_id_get,
            'edit_invoicedata' => $edit_invoicedata,
            'edit_files' => $edit_files,
            'setting_detail' => $setting_detail,
            'get_user_id' =>  $get_user_id,
              'get_agent_data' =>  $get_agent_data,
             'agent_name'         => $agent_name
        );
        $chapterList = $CI->parser->parse('invoice/edit_invoice_form', $data, true);
        return $chapterList;
    }
 
     










  public function profarma_edit_data($invoice_id) {
        $CI = & get_instance();
        $CI->load->model('Invoices');
        $CI->load->model('Suppliers');
        $CI->load->model('Web_settings');
        $CI->load->model('Products');
         //$bank_list        = $CI->Web_settings->bank_list();
        $purchase_detail = $CI->Invoices->retrieve_profarma_invoice_editdata($invoice_id);
        $edit_profarmadata = $CI->Invoices->editAlldataprofarma();
        // print_r($edit_profarmadata);
        // echo "<pre>";
        $customer_id = $purchase_detail[0]['customer_id'];
        if (!empty($purchase_detail)) {
            $i = 0;
            foreach ($purchase_detail as $k => $v) {
                $i++;
                $purchase_detail[$k]['sl'] = $i;
            }
        }
        
        
                $setting_detail = $CI->Web_settings->retrieve_setting_editdata();

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $curn_info_default = $CI->db->select('*')->from('currency_tbl')->where('icon',$currency_details[0]['currency'])->get()->result_array();
        $customer = $CI->Invoices->profarma_invoice_customer();
        $taxfield1 = $CI->db->select('tax_id,tax')
        ->from('tax_information')
        ->get()
        ->result_array();
         $prodt = $CI->Products->get_all_products();
         
         
            $bank_name = $CI->db->select('bank_name')
         ->from('bank_add')
         ->get()
         ->result_array();

         
         
         
       // print_r($taxfield1);
        $data = array(
            'customer'  => $customer,
            'curn_info_default' =>$curn_info_default[0]['currency_name'],
            'currency'  =>$currency_details[0]['currency'],
            'title'         => 'Edit Profarma Invoice',
              'product'       =>$prodt,
            'all_tax' =>$taxfield1,
            'purchase_id'   => $purchase_detail[0]['purchase_id'],
            'chalan_no'     => $purchase_detail[0]['chalan_no'],
            'purchase_date'  => $purchase_detail[0]['purchase_date'],
            'billing_address'  => $purchase_detail[0]['billing_address'],
            'pre_carriage' => $purchase_detail[0]['pre_carriage'],
            'receipt'    =>  $purchase_detail[0]['receipt'],
            'country_goods'    =>  $purchase_detail[0]['country_goods'],
            'country_destination' =>  $purchase_detail[0]['country_destination'],
            'purchase_info' => $purchase_detail,
            'loading' =>  $purchase_detail[0]['loading'],
            'discharge'=>  $purchase_detail[0]['discharge'],
            'terms_payment'=>  $purchase_detail[0]['terms_payment'],
            'description_goods'=>  $purchase_detail[0]['description_goods'],
            'ac_details' =>  $purchase_detail[0]['ac_details'],
             'remarks' =>  $purchase_detail[0]['remarks'],
            'customer_name' => $purchase_detail[0]['customer_name'],
            'customer_id'   => $purchase_detail[0]['customer_id'],
            'total'         => $purchase_detail[0]['total_amount'],
                        'thickness'   => $purchase_detail[0]['thickness'],
                        'supplier_block_no'   => $purchase_detail[0]['supplier_block_no'],
                             'supplier_slab_no'   => $purchase_detail[0]['supplier_slab_no'],
                                              'gross_width'   => $purchase_detail[0]['gross_width'],
                                                'gross_height'   => $purchase_detail[0]['gross_height'],
                                                'customer_gtotal' =>$purchase_detail[0]['customer_gtotal'],
                                                 'bal_amt' =>$purchase_detail[0]['bal_amt'],
                                                  'amt_paid' =>$purchase_detail[0]['amt_paid'],
                                                   'tax_details' =>$purchase_detail[0]['tax_details'],
                                                    'overall_total' =>$purchase_detail[0]['total'],
                                                      'overall_gross' =>$purchase_detail[0]['overall_gross'],
                                                         'overall_net' =>$purchase_detail[0]['overall_net'],
                                                        'overall_total' =>$purchase_detail[0]['total'],
                                                     'gtotal' =>$purchase_detail[0]['gtotal'],
                                                'gross_sq_ft'   => $purchase_detail[0]['gross_sq_ft'],
                                                'bundle_no'   => $purchase_detail[0]['bundle_no'],
                                                'slab_no'   => $purchase_detail[0]['slab_no'],
                                                'net_width'   => $purchase_detail[0]['net_width'],
                                                'net_height'   => $purchase_detail[0]['net_height'],
                                                'tax_id'   => $purchase_detail[0]['tax_id'],
                                                'payment_id'  =>$purchase_detail[0]['payment_id'],
                                                'purchase_info'   =>$purchase_detail,
                                                 'description_goods'   => $purchase_detail[0]['description_goods'],
                                                                        'sales_amt_sq_ft'   => $purchase_detail[0]['sales_amt_sq_ft'],
                                                                        'sales_slab_amt'   => $purchase_detail[0]['sales_slab_amt'],
                                                                        'weight'   => $purchase_detail[0]['weight'],
                                                                        'origin'   => $purchase_detail[0]['origin'],
                                                                        'product_name'   => $purchase_detail[0]['product_name'],
                                                                        'edit_profarmadata' => $edit_profarmadata,
                                                                        'bank_name'  =>$bank_name,
                                                                        'tax_view' => $edit_profarmadata[0]['tax_id'],
                                                                        'taxView' => $edit_profarmadata[0]['tax'],
                                                                                   'setting_detail' => $setting_detail


        );
    //     echo $purchase_detail[0]['gtotal'];
   //   print_r($purchase_detail);
        $chapterList = $CI->parser->parse('invoice/profarma_invoice_update', $data, true);

        return $chapterList;
    }

    //Invoice html Data
    public function invoice_html_data($invoice_id) {
        // $CI = & get_instance();
        // $CI->load->model('Invoices');
        // $CI->load->model('Web_settings');
        // $CI->load->library('occational');
        // $CI->load->library('numbertowords');
        // $invoice_detail = $CI->Invoices->retrieve_invoice_html_data($invoice_id);
        // $taxfield = $CI->db->select('*')
        //         ->from('tax_settings')
        //         ->where('is_show',1)
        //         ->get()
        //         ->result_array();
        // $txregname ='';
        // foreach($taxfield as $txrgname){
        // $regname = $txrgname['tax_name'].' Reg No  - '.$txrgname['reg_no'].', ';
        // $txregname .= $regname;
        // }       
        // $subTotal_quantity = 0;
        // $subTotal_cartoon = 0;
        // $subTotal_discount = 0;
        // $subTotal_ammount = 0;
        // $descript = 0;
        // $isserial = 0;
        // $isunit = 0;
        // $is_discount = 0;
        // if (!empty($invoice_detail)) {
        //     foreach ($invoice_detail as $k => $v) {
        //         $invoice_detail[$k]['final_date'] = $CI->occational->dateConvert($invoice_detail[$k]['date']);
        //         $subTotal_quantity = $subTotal_quantity + $invoice_detail[$k]['quantity'];
        //         $subTotal_ammount = $subTotal_ammount + $invoice_detail[$k]['total_price'];
               
        //     }

        //     $i = 0;
        //     foreach ($invoice_detail as $k => $v) {
        //         $i++;
        //         $invoice_detail[$k]['sl'] = $i;
        //         if(!empty($invoice_detail[$k]['description'])){
        //             $descript = $descript+1;
                    
        //         }
        //          if(!empty($invoice_detail[$k]['serial_no'])){
        //             $isserial = $isserial+1;
                    
        //         }
        //          if(!empty($invoice_detail[$k]['discount_per'])){
        //             $is_discount = $is_discount+1;
                    
        //         }

        //         if(!empty($invoice_detail[$k]['unit'])){
        //             $isunit = $isunit+1;
                    
        //         }
   
        //     }
        // }

        // $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        // $company_info = $CI->Invoices->retrieve_company();
        // // $totalbal = $invoice_detail[0]['total_amount']+$invoice_detail[0]['prevous_due'];
        // $totalbal = $invoice_detail[0]['total_amount']+0;
        // $amount_inword = $CI->numbertowords->convert_number($totalbal);
        // $user_id = $invoice_detail[0]['sales_by'];
        // $users = $CI->Invoices->user_invoice_data($user_id);
        // $data = array(
        // 'title'             => display('invoice_details'),
        // 'invoice_id'        => $invoice_detail[0]['invoice_id'],
        // 'invoice_no'        => $invoice_detail[0]['invoice'],
        // 'commercial_invoice_number' => $invoice_detail[0]['commercial_invoice_number'],
        // 'payment_due_date' =>$invoice_detail[0]['payment_due_date'],
        // 'payment_terms'=> $invoice_detail[0]['payment_terms'],
        // 'container_no'=> $invoice_detail[0]['container_no'],
        // 'customer_name'     => $invoice_detail[0]['customer_name'],
        // 'customer_address'  => $invoice_detail[0]['customer_address'],
        // 'customer_mobile'   => $invoice_detail[0]['customer_mobile'],
        // 'customer_email'    => $invoice_detail[0]['customer_email'],
        // 'final_date'        => $invoice_detail[0]['final_date'],
        // 'invoice_details'   => $invoice_detail[0]['invoice_details'],
        // 'total_amount'      => number_format($invoice_detail[0]['total_amount']+$invoice_detail[0]['prevous_due'], 2, '.', ','),
        // 'subTotal_quantity' => $subTotal_quantity,
        // 'total_discount'    => number_format($invoice_detail[0]['total_discount'], 2, '.', ','),
        // 'total_tax'         => number_format($invoice_detail[0]['total_tax'], 2, '.', ','),
        // 'subTotal_ammount'  => number_format($subTotal_ammount, 2, '.', ','),
        // 'paid_amount'       => number_format($invoice_detail[0]['paid_amount'], 2, '.', ','),
        // 'due_amount'        => number_format($invoice_detail[0]['due_amount'], 2, '.', ','),
        // 'previous'          => number_format($invoice_detail[0]['prevous_due'], 2, '.', ','),
        // 'shipping_cost'     => number_format($invoice_detail[0]['shipping_cost'], 2, '.', ','),
        // 'invoice_all_data'  => $invoice_detail,
        // 'company_info'      => $company_info,
        // 'currency'          => $currency_details[0]['currency'],
        // 'position'          => $currency_details[0]['currency_position'],
        // 'discount_type'     => $currency_details[0]['discount_type'],
        // 'am_inword'         => $amount_inword,
        // 'is_discount'       => $is_discount,
        // 'users_name'        => $users->first_name.' '.$users->last_name,
        // 'tax_regno'         => $txregname,
        // 'is_desc'           => $descript,
        // 'is_serial'         => $isserial,
        // 'is_unit'           => $isunit,
        // );

    $data=array();
    $data['ramji']=1;

        $chapterList = $CI->parser->parse('invoice/invoice_html', $data, true);
        return $chapterList;
    }


        //Invoice html Data manual
    public function invoice_html_data_manual($invoice_id) {
        $CI = & get_instance();
        $CI->load->model('Invoices');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');
        $CI->load->library('numbertowords');
        $invoice_detail = $CI->Invoices->retrieve_invoice_html_data($invoice_id);
        $taxfield = $CI->db->select('*')
                ->from('tax_settings')
                ->where('is_show',1)
                ->get()
                ->result_array();
        $txregname ='';
        foreach($taxfield as $txrgname){
        $regname = $txrgname['tax_name'].' Reg No  - '.$txrgname['reg_no'].', ';
        $txregname .= $regname;
        }       
        $subTotal_quantity = 0;
        $subTotal_cartoon = 0;
        $subTotal_discount = 0;
        $subTotal_ammount = 0;
        $descript = 0;
        $isserial = 0;
        $isunit = 0;
        if (!empty($invoice_detail)) {
            foreach ($invoice_detail as $k => $v) {
                $invoice_detail[$k]['final_date'] = $CI->occational->dateConvert($invoice_detail[$k]['date']);
                $subTotal_quantity = $subTotal_quantity + $invoice_detail[$k]['quantity'];
                $subTotal_ammount = $subTotal_ammount + $invoice_detail[$k]['total_price'];
            }

            $i = 0;
            foreach ($invoice_detail as $k => $v) {
                $i++;
                $invoice_detail[$k]['sl'] = $i;
                  if(!empty($invoice_detail[$k]['description'])){
                    $descript = $descript+1;
                    
                }
                 if(!empty($invoice_detail[$k]['serial_no'])){
                    $isserial = $isserial+1;
                    
                }
                 if(!empty($invoice_detail[$k]['unit'])){
                    $isunit = $isunit+1;
                    
                }
   
            }
        }

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Invoices->retrieve_company();
        $totalbal = $invoice_detail[0]['total_amount']+$invoice_detail[0]['prevous_due'];
        $amount_inword = $CI->numbertowords->convert_number($totalbal);
        $user_id = $invoice_detail[0]['sales_by'];
        $users = $CI->Invoices->user_invoice_data($user_id);
        $data = array(
        'title'             => display('invoice_details'),
        'invoice_id'        => $invoice_detail[0]['invoice_id'],
        'invoice_no'        => $invoice_detail[0]['invoice'],
        'customer_name'     => $invoice_detail[0]['customer_name'],
        'customer_address'  => $invoice_detail[0]['customer_address'],
        'customer_mobile'   => $invoice_detail[0]['customer_mobile'],
        'customer_email'    => $invoice_detail[0]['customer_email'],
        'final_date'        => $invoice_detail[0]['final_date'],
        'invoice_details'   => $invoice_detail[0]['invoice_details'],
        'total_amount'      => number_format($invoice_detail[0]['total_amount']+$invoice_detail[0]['prevous_due'], 2, '.', ','),
        'subTotal_quantity' => $subTotal_quantity,
        'total_discount'    => number_format($invoice_detail[0]['total_discount'], 2, '.', ','),
        'total_tax'         => number_format($invoice_detail[0]['total_tax'], 2, '.', ','),
        'subTotal_ammount'  => number_format($subTotal_ammount, 2, '.', ','),
        'paid_amount'       => number_format($invoice_detail[0]['paid_amount'], 2, '.', ','),
        'due_amount'        => number_format($invoice_detail[0]['due_amount'], 2, '.', ','),
        'previous'          => number_format($invoice_detail[0]['prevous_due'], 2, '.', ','),
        'shipping_cost'     => number_format($invoice_detail[0]['shipping_cost'], 2, '.', ','),
        'invoice_all_data'  => $invoice_detail,
        'company_info'      => $company_info,
        'currency'          => $currency_details[0]['currency'],
        'position'          => $currency_details[0]['currency_position'],
        'discount_type'     => $currency_details[0]['discount_type'],
        'am_inword'         => $amount_inword,
        'is_discount'       => $invoice_detail[0]['total_discount']-$invoice_detail[0]['invoice_discount'],
        'users_name'        => $users->first_name.' '.$users->last_name,
        'tax_regno'         => $txregname,
        'is_desc'           => $descript,
        'is_serial'         => $isserial,
        'is_unit'           => $isunit,
        );

        $chapterList = $CI->parser->parse('invoice/invoice_html_manual', $data, true);
        return $chapterList;
    }

    //POS invoice html Data
    public function pos_invoice_html_data($invoice_id) {
        $CI = & get_instance();
        $CI->load->model('Invoices');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');
        $invoice_detail = $CI->Invoices->retrieve_invoice_html_data($invoice_id);
         $taxfield = $CI->db->select('*')
                ->from('tax_settings')
                ->where('is_show',1)
                ->get()
                ->result_array();
        $txregname ='';
        foreach($taxfield as $txrgname){
        $regname = $txrgname['tax_name'].' Reg No  - '.$txrgname['reg_no'].', ';
        $txregname .= $regname;
        }  
        $subTotal_quantity = 0;
        $subTotal_cartoon = 0;
        $subTotal_discount = 0;
        $subTotal_ammount = 0;
        $descript = 0;
        $isserial = 0;
        $isunit = 0;
        $is_discount = 0;
        if (!empty($invoice_detail)) {
            foreach ($invoice_detail as $k => $v) {
                $invoice_detail[$k]['final_date'] = $CI->occational->dateConvert($invoice_detail[$k]['date']);
                $subTotal_quantity = $subTotal_quantity + $invoice_detail[$k]['quantity'];
                $subTotal_ammount = $subTotal_ammount + $invoice_detail[$k]['total_price'];
            }

            $i = 0;
            foreach ($invoice_detail as $k => $v) {
                $i++;
                $invoice_detail[$k]['sl'] = $i;
                 if(!empty($invoice_detail[$k]['description'])){
                    $descript = $descript+1;
                    
                }
                 if(!empty($invoice_detail[$k]['serial_no'])){
                    $isserial = $isserial+1;
                    
                }

                 if(!empty($invoice_detail[$k]['discount_per'])){
                    $is_discount = $is_discount+1;
                    
                }
                 if(!empty($invoice_detail[$k]['unit'])){
                    $isunit = $isunit+1;
                    
                }
            }
        }

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Invoices->retrieve_company();
        $totalbal = $invoice_detail[0]['total_amount']+$invoice_detail[0]['prevous_due'];
         $user_id = $invoice_detail[0]['sales_by'];
        $users = $CI->Invoices->user_invoice_data($user_id);
        $data = array(
        'title'                => display('invoice_details'),
        'invoice_id'           => $invoice_detail[0]['invoice_id'],
        'invoice_no'           => $invoice_detail[0]['invoice'],
        'customer_name'        => $invoice_detail[0]['customer_name'],
        'customer_address'     => $invoice_detail[0]['customer_address'],
        'customer_mobile'      => $invoice_detail[0]['customer_mobile'],
        'customer_email'       => $invoice_detail[0]['customer_email'],
        'final_date'           => $invoice_detail[0]['final_date'],
        'invoice_details'      => $invoice_detail[0]['invoice_details'],
        'total_amount'         => number_format($totalbal, 2, '.', ','),
        'subTotal_cartoon'     => $subTotal_cartoon,
        'subTotal_quantity'    => $subTotal_quantity,
        'invoice_discount'     => number_format($invoice_detail[0]['invoice_discount'], 2, '.', ','),
        'total_discount'       => number_format($invoice_detail[0]['total_discount'], 2, '.', ','),
        'total_tax'            => number_format($invoice_detail[0]['total_tax'], 2, '.', ','),
        'subTotal_ammount'     => number_format($subTotal_ammount, 2, '.', ','),
        'paid_amount'          => number_format($invoice_detail[0]['paid_amount'], 2, '.', ','),
        'due_amount'           => number_format($invoice_detail[0]['due_amount'], 2, '.', ','),
        'shipping_cost'        => number_format($invoice_detail[0]['shipping_cost'], 2, '.', ','),
        'invoice_all_data'     => $invoice_detail,
        'previous'             => number_format($invoice_detail[0]['prevous_due'], 2, '.', ','),
        'company_info'         => $company_info,
         'is_discount'         => $is_discount,
        'currency'             => $currency_details[0]['currency'],
        'position'             => $currency_details[0]['currency_position'],
        'users_name'           => $users->first_name.' '.$users->last_name,
        'tax_regno'            => $txregname,
        'is_desc'              => $descript,
        'is_serial'            => $isserial,
        'is_unit'              => $isunit,

        );

        $chapterList = $CI->parser->parse('invoice/pos_invoice_html', $data, true);
        return $chapterList;
    }

    /// Manual invoice insert data
    public function pos_invoice_html_data_manual($invoice_id,$url) {
        $CI = & get_instance();
        $CI->load->model('Invoices');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');
        $invoice_detail = $CI->Invoices->retrieve_invoice_html_data($invoice_id);
         $taxfield = $CI->db->select('*')
                ->from('tax_settings')
                ->where('is_show',1)
                ->get()
                ->result_array();
        $txregname ='';
        foreach($taxfield as $txrgname){
        $regname = $txrgname['tax_name'].' Reg No  - '.$txrgname['reg_no'].', ';
        $txregname .= $regname;
        }  
        $subTotal_quantity = 0;
        $subTotal_cartoon = 0;
        $subTotal_discount = 0;
        $subTotal_ammount = 0;
        $descript = 0;
        $isserial = 0;
        $is_discount = 0;
        $isunit = 0;
        if (!empty($invoice_detail)) {
            foreach ($invoice_detail as $k => $v) {
                $invoice_detail[$k]['final_date'] = $CI->occational->dateConvert($invoice_detail[$k]['date']);
                $subTotal_quantity = $subTotal_quantity + $invoice_detail[$k]['quantity'];
                $subTotal_ammount = $subTotal_ammount + $invoice_detail[$k]['total_price'];
            }

            $i = 0;
            foreach ($invoice_detail as $k => $v) {
                $i++;
                $invoice_detail[$k]['sl'] = $i;
                 if(!empty($invoice_detail[$k]['description'])){
                    $descript = $descript+1;
                    
                }
                 if(!empty($invoice_detail[$k]['serial_no'])){
                    $isserial = $isserial+1;
                    
                }
                 if(!empty($invoice_detail[$k]['unit'])){
                    $isunit = $isunit+1;
                    
                }
                    if(!empty($invoice_detail[$k]['discount_per'])){
                    $is_discount = $is_discount+1;
                    
                }
            }
        }

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Invoices->retrieve_company();
        $totalbal = $invoice_detail[0]['total_amount']+$invoice_detail[0]['prevous_due'];
         $user_id = $invoice_detail[0]['sales_by'];
        $users = $CI->Invoices->user_invoice_data($user_id);
        $data = array(
        'title'                => display('invoice_details'),
        'invoice_id'           => $invoice_detail[0]['invoice_id'],
        'invoice_no'           => $invoice_detail[0]['invoice'],
        'customer_name'        => $invoice_detail[0]['customer_name'],
        'customer_address'     => $invoice_detail[0]['customer_address'],
        'customer_mobile'      => $invoice_detail[0]['customer_mobile'],
        'customer_email'       => $invoice_detail[0]['customer_email'],
        'final_date'           => $invoice_detail[0]['final_date'],
        'invoice_details'      => $invoice_detail[0]['invoice_details'],
        'total_amount'         => number_format($totalbal, 2, '.', ','),
        'subTotal_cartoon'     => $subTotal_cartoon,
        'subTotal_quantity'    => $subTotal_quantity,
        'invoice_discount'     => number_format($invoice_detail[0]['invoice_discount'], 2, '.', ','),
        'total_discount'       => number_format($invoice_detail[0]['total_discount'], 2, '.', ','),
        'total_tax'            => number_format($invoice_detail[0]['total_tax'], 2, '.', ','),
        'subTotal_ammount'     => number_format($subTotal_ammount, 2, '.', ','),
        'paid_amount'          => number_format($invoice_detail[0]['paid_amount'], 2, '.', ','),
        'due_amount'           => number_format($invoice_detail[0]['due_amount'], 2, '.', ','),
        'shipping_cost'        => number_format($invoice_detail[0]['shipping_cost'], 2, '.', ','),
        'invoice_all_data'     => $invoice_detail,
        'previous'             => number_format($invoice_detail[0]['prevous_due'], 2, '.', ','),
        'company_info'         => $company_info,
         'is_discount'         => $is_discount,
        'currency'             => $currency_details[0]['currency'],
        'position'             => $currency_details[0]['currency_position'],
        'users_name'           => $users->first_name.' '.$users->last_name,
        'tax_regno'            => $txregname,
        'is_desc'              => $descript,
        'is_serial'            => $isserial,
        'is_unit'              => $isunit,
        'url'                  => $url,

        );

        $chapterList = $CI->parser->parse('invoice/pos_invoice_html_direct', $data, true);
        return $chapterList;
    }
    // min invoice data 
    public function min_invoice_html_data($invoice_id) {
        $CI = & get_instance();
        $CI->load->model('Invoices');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');
        $CI->load->library('numbertowords');
        $invoice_detail = $CI->Invoices->retrieve_invoice_html_data($invoice_id);
         $taxfield = $CI->db->select('*')
                ->from('tax_settings')
                ->where('is_show',1)
                ->get()
                ->result_array();
        $txregname ='';
        foreach($taxfield as $txrgname){
        $regname = $txrgname['tax_name'].' Reg No  - '.$txrgname['reg_no'].', ';
        $txregname .= $regname;
        }       
        $subTotal_quantity = 0;
        $subTotal_cartoon = 0;
        $subTotal_discount = 0;
        $subTotal_ammount = 0;
        $descript = 0;
        $isserial = 0;
        $isunit = 0;
        if (!empty($invoice_detail)) {
            foreach ($invoice_detail as $k => $v) {
                $invoice_detail[$k]['final_date'] = $CI->occational->dateConvert($invoice_detail[$k]['date']);
                $subTotal_quantity = $subTotal_quantity + $invoice_detail[$k]['quantity'];
                $subTotal_ammount = $subTotal_ammount + $invoice_detail[$k]['total_price'];
            }

            $i = 0;
            foreach ($invoice_detail as $k => $v) {
                $i++;
                $invoice_detail[$k]['sl'] = $i;
                 if(!empty($invoice_detail[$k]['description'])){
                    $descript = $descript+1;
                    
                }
                 if(!empty($invoice_detail[$k]['serial_no'])){
                    $isserial = $isserial+1;
                    
                }
                 if(!empty($invoice_detail[$k]['unit'])){
                    $isunit = $isunit+1;
                    
                }
            }
        }

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Invoices->retrieve_company();
         $totalbal = $invoice_detail[0]['total_amount']+$invoice_detail[0]['prevous_due'];
        $amount_inword = $CI->numbertowords->convert_number($totalbal);
        $user_id = $invoice_detail[0]['sales_by'];
        $users = $CI->Invoices->user_invoice_data($user_id);
        $data = array(
        'title'            => display('invoice_details'),
        'invoice_id'       => $invoice_detail[0]['invoice_id'],
        'invoice_no'       => $invoice_detail[0]['invoice'],
        'customer_name'    => $invoice_detail[0]['customer_name'],
        'customer_address' => $invoice_detail[0]['customer_address'],
        'customer_mobile'  => $invoice_detail[0]['customer_mobile'],
        'customer_email'   => $invoice_detail[0]['customer_email'],
        'final_date'       => $invoice_detail[0]['final_date'],
        'invoice_details'  => $invoice_detail[0]['invoice_details'],
        'total_amount'     => number_format($totalbal, 2, '.', ','),
        'subTotal_cartoon' => $subTotal_cartoon,
        'subTotal_quantity'=> $subTotal_quantity,
        'invoice_discount' => number_format($invoice_detail[0]['invoice_discount'], 2, '.', ','),
        'total_discount'   => number_format($invoice_detail[0]['total_discount'], 2, '.', ','),
        'total_tax'        => number_format($invoice_detail[0]['total_tax'], 2, '.', ','),
        'subTotal_ammount' => number_format($subTotal_ammount, 2, '.', ','),
        'paid_amount'      => number_format($invoice_detail[0]['paid_amount'], 2, '.', ','),
        'due_amount'       => number_format($invoice_detail[0]['due_amount'], 2, '.', ','),
         'shipping_cost'   => number_format($invoice_detail[0]['shipping_cost'], 2, '.', ','),
        'invoice_all_data' => $invoice_detail,
        'previous'         => number_format($invoice_detail[0]['prevous_due'], 2, '.', ','),
        'company_info'     => $company_info,
        'currency'         => $currency_details[0]['currency'],
        'logo'             => $currency_details[0]['logo'],
        'am_inword'        => $amount_inword,
        'is_discount'      => $invoice_detail[0]['total_discount']-$invoice_detail[0]['invoice_discount'],
        'position'         => $currency_details[0]['currency_position'],
        'users_name'       => $users->first_name.' '.$users->last_name,
        'tax_regno'        => $txregname,
        'is_desc'          => $descript,
        'is_serial'        => $isserial,
        'is_unit'          => $isunit,
        );

        $chapterList = $CI->parser->parse('invoice/min_invoice_html', $data, true);
        return $chapterList;
    }

}

?>