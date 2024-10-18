<?php



if (!defined('BASEPATH'))

    exit('No direct script access allowed');



class Lpurchase {



    //Purchase add form

    public function purchase_add_form() {

        $CI = & get_instance();
        $CI1 = & get_instance();
        $CI1->load->model('Purchases');
            $CI->load->model('Suppliers');
        $CI->load->model('Categories');
        $CI->load->model('Units');
        $CI->load->model('Products');
   



        $CI->load->model('Web_settings');

        $all_product_list = $CI1->Products->all_product_list();
        $all_supplier = $CI1->Purchases->select_all_supplier();
           $supplier      = $CI->Suppliers->supplier_list("110", "0");

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
            'product_list'  => $all_product_list,

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
    
    
    
    
    
    
  public function servicepro_details_data_print($serviceprovider_id) {
    $CI = & get_instance();
    $CI->load->model('Purchases');
       $CI->load->model('Web_settings');
    $CI->load->model('Products');
         $CI->load->model('invoice_content');
    $CI->load->library('occational');
     $w = & get_instance();
     $w->load->model('Ppurchases');
       $datacontent = $CI->invoice_content->retrieve_info_data();
    // $CI->load->library('Products');
      $service_detail = $CI->Purchases->service_provider_details($serviceprovider_id);
//    print_r($service_detail); die();
    // $Products = $CI->Products->get_invoice_product($purchase_id);
    $get_invoice_design = $CI->Purchases->get_invoice_design();
    $CI->load->model('invoice_design');
    if (!empty($service_detail)) {
        $i = 0;
        foreach ($service_detail as $k => $v) {
            $i++;
            $service_detail[$k]['sl'] = $i;
        }
    }
    $currency_details = $CI->Web_settings->retrieve_setting_editdata();
 $company_info = $w->Ppurchases->retrieve_company();
    $curn_info_default = $CI->db->select('*')->from('currency_tbl')->where('icon',$currency_details[0]['currency'])->get()->result_array();
    $dataw = $CI->invoice_design->retrieve_data();
    $serviceprovider =$CI->Purchases->serpro_info($service_detail[0]['serviceprovider_id']);
     $setting=  $CI->Web_settings->retrieve_setting_editdata();
  //  print_r($serviceprovider);
 $data = array(
        'header'=> $dataw[0]['header'],
        'logo'=>(!empty($setting[0]['invoice_logo'])?$setting[0]['invoice_logo']:base_url().$company_info[0]['logo']),  
        'color'=> $dataw[0]['color'],
        'template'=> $dataw[0]['template'],
        'curn_info_default' =>$curn_info_default[0]['currency_name'],
        'icon' =>$curn_info_default[0]['icon'],
        'title'            => display('purchase_details'),
        'service_provider_name'                    =>    $serviceprovider[0]['service_provider_name'],
         'sp_address'                    =>    $serviceprovider[0]['sp_address'],
         'payment_terms'                    =>    $serviceprovider[0]['payment_terms'],
         'bill_number'                    =>    $serviceprovider[0]['bill_number'],
         'bill_date'                    =>    $serviceprovider[0]['bill_date'],
         'phone_num'                    =>    $serviceprovider[0]['phone_num'],

         'acc_cat_name'                    =>    $serviceprovider[0]['acc_cat_name'],
         'acc_sub_name'                    =>    $serviceprovider[0]['acc_sub_name'],
         'acc_cat'                    =>    $serviceprovider[0]['acc_cat'],


         'total'                    =>    $serviceprovider[0]['total'],
         'memo_details'                    =>    $serviceprovider[0]['memo_details'],
         'id'      =>    $serviceprovider[0]['id'],
         'productname'                    =>    $service_detail[0]['productname'],
         'quality'                    =>    $service_detail[0]['quality'],
         'description'                    =>    $service_detail[0]['description'],
         'total_price'                    =>    $service_detail[0]['total_price'],
         'service_detail'      =>    $service_detail,
       'company_info'=> (!empty($datacontent)?$datacontent:$company_info)
        );
  echo $dataw[0]['color'];
        $chapterList = $CI->parser->parse('purchase/servicepro_detail_print', $data, true);
        return $chapterList;
    }
    
    
    
    
    
       
      public function servicepro_details_data($serviceprovider_id) {
    $CI = & get_instance();
    $CI->load->model('Purchases');
    $CI->load->model('Products');
     $CI->load->model('invoice_content');
      $CI->load->model('Web_settings');
    $CI->load->library('occational');
   $w = & get_instance();
     $w->load->model('Ppurchases');
      $service_detail = $CI->Purchases->service_provider_details($serviceprovider_id);
    // $Products = $CI->Products->get_invoice_product($purchase_id);
    $get_invoice_design = $CI->Purchases->get_invoice_design();
    $CI->load->model('invoice_design');
    if (!empty($service_detail)) {
        $i = 0;
        foreach ($service_detail as $k => $v) {
            $i++;
            $service_detail[$k]['sl'] = $i;
        }
    }
     $datacontent = $CI->invoice_content->retrieve_info_data();
       $setting=  $CI->Web_settings->retrieve_setting_editdata();
    $currency_details = $CI->Web_settings->retrieve_setting_editdata();
   $company_info = $w->Ppurchases->retrieve_company();
    $curn_info_default = $CI->db->select('*')->from('currency_tbl')->where('icon',$currency_details[0]['currency'])->get()->result_array();
    $dataw = $CI->invoice_design->retrieve_data();
    $serviceprovider =$CI->Purchases->serpro_info($service_detail[0]['serviceprovider_id']);
 
 
    $customer_currency = $CI->db->select('*')->from('supplier_information')->where('supplier_name',$serviceprovider[0]['service_provider_name'])->get()->result_array();
// print_r($customer_currency); die();
 
    $data = array(
        'header'=> $dataw[0]['header'],
      
          'logo'=>(!empty($setting[0]['invoice_logo'])?$setting[0]['invoice_logo']:base_url().$company_info[0]['logo']), 
     
          'color'=> $dataw[0]['color'],
        'template'=> $dataw[0]['template'],
        'curn_info_default' =>$curn_info_default[0]['currency_name'],
        'icon' =>$curn_info_default[0]['icon'],
        'title'            => display('purchase_details'),
        'service_provider_name'                    =>    $serviceprovider[0]['service_provider_name'],
         'sp_address'                    =>    $serviceprovider[0]['sp_address'],
         'payment_terms'                    =>    $serviceprovider[0]['payment_terms'],
         'bill_number'                    =>    $serviceprovider[0]['bill_number'],
         'bill_date'                    =>    $serviceprovider[0]['bill_date'],
         'phone_num'                    =>    $serviceprovider[0]['phone_num'],

         'acc_cat_name'                    =>    $serviceprovider[0]['acc_cat_name'],
         'acc_sub_name'                    =>    $serviceprovider[0]['acc_sub_name'],
         'acc_cat'                    =>    $serviceprovider[0]['acc_cat'],



         'total'                    =>    $serviceprovider[0]['total'],
         'memo_details'                    =>    $serviceprovider[0]['memo_details'],


         'tax_detail'                        =>    $serviceprovider[0]['tax_detail'],
         'gtotals'                           =>    $serviceprovider[0]['gtotals'],
         'vendor_gtotals'                    =>    $serviceprovider[0]['vendor_gtotals'],
         'amount_paids'                      =>    $serviceprovider[0]['amount_paids'],
         'balances'                          =>    $serviceprovider[0]['balances'],
         'currency_type'=>    $customer_currency[0]['currency_type'],




         'id'      =>    $serviceprovider[0]['id'],
         'productname'                    =>    $service_detail[0]['productname'],
         'quality'                    =>    $service_detail[0]['quality'],
         'description'                    =>    $service_detail[0]['description'],
         'total_price'                    =>    $service_detail[0]['total_price'],
         'service_detail'      =>    $service_detail,
         'company_info'=> (!empty($datacontent)?$datacontent:$company_info)
        );
//   echo $dataw[0]['color'];
        $chapterList = $CI->parser->parse('purchase/servicepro_detail_html', $data, true);
        return $chapterList;
    }
    
    
    
    
    
    
    
    
  public function purchase_add_form1() {
        $CI = & get_instance();
        $CI1 = & get_instance();
        $CI1->load->model('Purchases');
        $CI->load->model('Suppliers');
        $CI->load->model('Categories');
        $CI->load->model('Units');
        $CI->load->model('Products');
        $CI->load->model('Invoices');
        $CI->load->model('Web_settings');
           $bank_list        = $CI->Web_settings->bank_list();
        $purchase_detail = $CI->Purchases->retrieve_purchase_order_editdata($purchase_id);
        $taxfield1 = $CI->db->select('tax_id,tax')
        ->from('tax_information')
        ->get()
        ->result_array();
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
                   $setting_detail = $CI->Web_settings->retrieve_setting_editdata();

        
        $curn_info_default = $CI->db->select('*')->from('currency_tbl')->where('icon',$currency_details[0]['currency'])->get()->result_array();
        $products = $CI->Products->get_all_products();
        $all_product_list = $CI1->Products->all_product_list();
        $all_supplier = $CI1->Purchases->select_all_supplier();
        $payment_type_dropdown = $CI1->Purchases->payment_type_dropdown();
        $payment_terms_dropdown = $CI1->Purchases->payment_terms_dropdown();
        $expense_packing_list        = $CI1->Purchases->expense_package();
        $supplier      = $CI->Suppliers->supplier_list("110", "0");
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $bank_list        = $CI->Web_settings->bank_list();
        $category_list = $CI->Categories->category_list_product();
        $unit_list     = $CI->Units->unit_list();
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $curn_info_default = $CI->db->select('*')->from('currency_tbl')->where('icon',$currency_details[0]['currency'])->get()->result_array();
        $products=$CI->Invoices->allproduct();
        $taxfield1 = $CI->Invoices->tax_data();
        $sale_costpersqft_per = $CI->Invoices->sales_cost_permission();
        $po_number =  $CI1->Purchases->get_po_num();
        $expense_tax =  $CI1->Purchases->getexpense_taxinfo();
        $expense_data = $CI1->Purchases->getExpenseallData();
      //  print_r($expense_data);
    
        $country_code = $CI->db->select('*')->from('country')->get()->result_array();


        $data = array(
            'curn_info_default' =>$curn_info_default[0]['currency_name'],
            'currency' => $currency_details[0]['currency'],
            'title'  => display('purchase_edit'),
            'ship_to'  => $purchase_detail[0]['ship_to'],
            'gtotal_preferred_currency' => $purchase_detail[0]['gtotal_preferred_currency'],
            'price'  =>$sale_costpersqft_per[1]['price'],
            'tax' =>$taxfield1,
            'created_by' => $purchase_detail[0]['created_by'],
            'payment_terms' => $purchase_detail[0]['payment_terms'],
            'shipment_terms' => $purchase_detail[0]['shipment_terms'],
            'est_ship_date' => $purchase_detail[0]['est_ship_date'],
            'purchase_id'   => $purchase_detail[0]['purchase_id'],
            'chalan_no'     => $purchase_detail[0]['chalan_no'],
            'supplier_name' => $purchase_detail[0]['supplier_name'],
            'supplier_id'   => $purchase_detail[0]['supplier_id'],
            'grand_total_amount'   => $purchase_detail[0]['grand_total_amount'],
            'gtotal_preferred_currency'   => $purchase_detail[0]['gtotal_preferred_currency'],
            'tax_details'   => $purchase_detail[0]['tax_details'],
            'purchase_details' => $purchase_detail[0]['purchase_details'],
            'purchase_date' => $purchase_detail[0]['purchase_date'],
            'remarks'       => $purchase_detail[0]['remarks'],
             'est_ship_date'       => $purchase_detail[0]['est_ship_date'],
            'total_discount'=> $purchase_detail[0]['total_discount'],
            'total'             =>$purchase_detail[0]['total'],
            'bank_id'       =>  $purchase_detail[0]['bank_id'],
            'purchase_info' => $purchase_detail,
            'supplier_list' => $supplier_list,
            'paid_amount'   => $purchase_detail[0]['paid_amount'],
            'due_amount'    => $purchase_detail[0]['due_amount'],
            'bank_list'     => $bank_list,
            'supplier_selected' => $supplier_selected,
            'discount_type' => $currency_details[0]['discount_type'],
            'paytype'       => $purchase_detail[0]['payment_type'],
             'payment_id'       => $purchase_detail[0]['payment_id'],
            'message_invoice'       => $purchase_detail[0]['message_invoice'],
            'purchase_detail' =>$purchase_detail,
            'title'         => display('add_purchase'),
            'all_supplier'  => $all_supplier,
            'product_list'  => $all_product_list,
            'tax'           => $taxfield1,
            'products' =>$products,
            'po'  => $po_number,
            'expense_tax' => $expense_tax,
            'invoice_no'    => $CI->auth->generator(10),
            'category_list'=> $category_list,
            'unit_list'    => $unit_list,
            'discount_type' => $currency_details[0]['discount_type'],
            'bank_list'     => $bank_list,
            'expense_data' => $expense_data,
            'country_code' => $country_code,
            'packinglist'=>$expense_packing_list,
             'payment_type' =>   $payment_type_dropdown,
            'payment_terms' => $payment_terms_dropdown,
                       'setting_detail' => $setting_detail

        );
        
        $purchaseForm = $CI->parser->parse('purchase/add_purchase_form', $data, true);
        return $purchaseForm;
    }

     
 
    public function packing_add_form() {

        $CI = & get_instance();

        
        $CI->auth->check_admin_auth();
        $CI->load->model('Products');
     
        $CI->load->library('linvoice');


        $products=$CI->Products->get_all_products();




        $CI->load->model('Purchases');

        $CI->load->model('Categories');

        $CI->load->model('Units');


        $CI->load->model('Web_settings');

        $all_supplier = $CI->Purchases->select_all_supplier();

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();

        $bank_list        = $CI->Web_settings->bank_list();
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $curn_info_default = $CI->db->select('*')->from('currency_tbl')->where('icon',$currency_details[0]['currency'])->get()->result_array();

        $category_list = $CI->Categories->category_list_product();

        $unit_list     = $CI->Units->unit_list();

        $voucher_no = $CI->Purchases->packing_voucher_no();
       

     

        $data = array(
            'curn_info_default' =>$curn_info_default[0]['currency_name'],
            'currency' => $currency_details[0]['currency'],
            'title'         => 'Add Packing List',

            'all_supplier'  => $all_supplier,

            'invoice_no'    => $CI->auth->generator(10),

            'category_list'=> $category_list,

       

            'voucher_no'   => $voucher_no,

        //    'product_id'    => $product_id,
        'products'=> $products,

            'discount_type' => $currency_details[0]['discount_type'],

            'bank_list'     => $bank_list,
            'unit'  => $unit_list

        );

        $purchaseForm = $CI->parser->parse('purchase/add_packing_list', $data, true);

        return $purchaseForm;

    }


    
    public function packing_list() {

        $CI = & get_instance();

        $CI->load->model('Purchases');

        $CI->load->model('Categories');

        $CI->load->model('Units');

        $CI->load->model('Web_settings');

        $all_supplier = $CI->Purchases->select_all_supplier();

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();

        $bank_list        = $CI->Web_settings->bank_list();


        $category_list = $CI->Categories->category_list_product();

        $unit_list     = $CI->Units->unit_list();


        $data = array(

            'title'         => 'Packing List',

            'all_supplier'  => $all_supplier,

            'invoice_no'    => $CI->auth->generator(10),

            'category_list'=> $category_list,

            'unit_list'    => $unit_list,

            'discount_type' => $currency_details[0]['discount_type'],

            'bank_list'     => $bank_list,

        );

        $purchaseForm = $CI->parser->parse('purchase/packing_list', $data, true);

        return $purchaseForm;

    }


       //Purchase add form

    public function ocean_import_form() {

        $CI = & get_instance();

        $CI->load->model('Purchases');

        $CI->load->model('Categories');
        $CI->load->model('Units');
   



        $CI->load->model('Web_settings');

        $all_supplier = $CI->Purchases->select_all_supplier();

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

        $purchaseForm = $CI->parser->parse('purchase/ocean_import_tracking', $data, true);

        return $purchaseForm;

    }




      //Purchase Order form

      public function purchase_order_form() {

        $CI = & get_instance();

        $CI->load->model('Purchases');

        $CI->load->model('Categories');

        $CI->load->model('Units');
   
        $CI->load->model('Web_settings');
        $CI->load->model('Products');
        $CI->load->model('Invoices');
      

        $all_supplier = $CI->Purchases->select_all_supplier();
        $products = $CI->Products->get_all_products();
                  $setting_detail = $CI->Web_settings->retrieve_setting_editdata();
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $curn_info_default = $CI->db->select('*')->from('currency_tbl')->where('icon',$currency_details[0]['currency'])->get()->result_array();
      

        $bank_list        = $CI->Web_settings->bank_list();

        $category_list = $CI->Categories->category_list_product();

        $unit_list     = $CI->Units->unit_list();

     
        $voucher_no = $CI->Purchases->voucher_no();
$taxfield1 = $CI->Invoices->tax_data();
$purchasetaxes = $CI->Purchases->getpurchasetaxdetails();
      
        $payment_type = $CI->Purchases->drop_payment_type();
$payment_terms_dropdown = $CI->Purchases->payment_terms_dropdown();
$product_no = $CI->Products->product_id_number();
 $product_bundle = $CI->Invoices->get_product_bundle();
   $supplier_block_no = $CI->Invoices->get_product_supplier_block();
$country_code = $CI->db->select('*')->from('country')->get()->result_array();
        $data = array(
            'supplier_block_no'=>$supplier_block_no,
         'curn_info_default' =>$curn_info_default[0]['currency_name'],
       'bundle' => $product_bundle,
          
            'currency' => $currency_details[0]['currency'],
            'title'         => 'Add Purchase Order',

            'all_supplier'  => $all_supplier,
            'tax'           => $taxfield1,
            'product_no' => $product_no,
            'voucher_no' => $voucher_no ,
            'payment_type'  => $payment_type,

            'invoice_no'    => $CI->auth->generator(10),

            'category_list'=> $category_list,
            'payment_terms'   =>    $payment_terms_dropdown,

            'unit_list'    => $unit_list,
            'country_code' => $country_code,

            'discount_type' => $currency_details[0]['discount_type'],
            
            'bank_list'     => $bank_list,
            'products'  => $products,
            'purchasetaxes' => $purchasetaxes,
            'setting_detail' => $setting_detail,

        );

      //   echo "<pre>";   print_r($products);

 //   print_r($products);

        $purchaseForm = $CI->parser->parse('purchase/purchase_order', $data, true);

        return $purchaseForm;

    }


       public function random_no()
    {
        $inc_id = '';
        do {
            $id = rand(100000, 999999);
            $id2 = "PO" . $id;
            // $newcheck = $this->AdminInvestmentModel->random($id2);

            foreach ($newcheck as $newcheck) {
                if ($newcheck->c > 0) {
                    $id = rand(100000, 999999);
                } else {
                    $inc_id = "PO" . $id;
                }
            }
        } while ($inc_id == '');
        echo $inc_id;
    }


    // Retrieve Purchase List

    public function purchase_list() {

        $CI = & get_instance();

        $CI->load->model('Purchases');

        $CI->load->model('Web_settings');

        $CI->load->library('occational');

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();

        $company_info = $CI->Purchases->retrieve_company();
        
        $expenses = $CI->Purchases->get_allexpense();

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();

        $data = array(

            'title'          => display('manage_purchase'),

            'company_info'   => $company_info,

            'currency'       => $currency_details[0]['currency'],

            'total_purhcase' => $CI->Purchases->count_purchase(),
            
            'expenses' => $expenses

        );



        $purchaseList = $CI->parser->parse('purchase/purchase', $data, true);

        return $purchaseList;

    }


    public function purchase_order_list() {

        $CI = & get_instance();

        $CI->load->model('Purchases');

        $CI->load->model('Web_settings');

        $CI->load->library('occational');

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();

        $company_info = $CI->Purchases->retrieve_company();

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();

        $data = array(

            'title'          => 'Manage Purchase Order',

            'company_info'   => $company_info,

            'currency'       => $currency_details[0]['currency'],

            'total_purhcase' => $CI->Purchases->count_purchase_order(),

        );




        $purchaseList = $CI->parser->parse('purchase/purchase_order_list', $data, true);

        return $purchaseList;

    }



     


     public function ocean_import_list() {

        $CI = & get_instance();

        $CI->load->model('Purchases');

        $CI->load->model('Web_settings');

        $CI->load->library('occational');

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();

        $company_info = $CI->Purchases->retrieve_company();

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();

        $data = array(

            'title'          => display('manage_purchase'),

            'company_info'   => $company_info,

            'currency'       => $currency_details[0]['currency'],

            'total_purhcase' => $CI->Purchases->count_ocean_import(),

        );



        $purchaseList = $CI->parser->parse('purchase/ocean_import_list', $data, true);

        return $purchaseList;

    }


    //  public function trucking_list() {

    //     $CI = & get_instance();

    //     $CI->load->model('Purchases');

    //     $CI->load->model('Web_settings');

    //     $CI->load->library('occational');

    

    //     $company_info = $CI->Purchases->retrieve_company();

    //     $currency_details = $CI->Web_settings->retrieve_setting_editdata();
    //     $curn_info_default = $CI->db->select('*')->from('currency_tbl')->where('icon',$currency_details[0]['currency'])->get()->result_array();
      

    //     $data = array(
    //         'curn_info_default' =>$curn_info_default[0]['currency_name'],
            
    //           'currency'  =>$currency_details[0]['currency'],
    //         'title'          => display('manage_purchase'),

    //         'company_info'   => $company_info,

    //         'currency'       => $currency_details[0]['currency'],

    //         'total_purhcase' => $CI->Purchases->count_trucking(),

    //     );



    //     $purchaseList = $CI->parser->parse('purchase/trucking_list', $data, true);

    //     return $purchaseList;

    // }

public function trucking_list($date=null) {
        $CI = & get_instance();
        $CI->load->model('Purchases');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');
        $company_info = $CI->Purchases->retrieve_company();
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $curn_info_default = $CI->db->select('*')->from('currency_tbl')->where('icon',$currency_details[0]['currency'])->get()->result_array();
        $truckin = $CI->Purchases->expense_trucking($date);
        $data = array(
            'curn_info_default' =>$curn_info_default[0]['currency_name'],
              'currency'  =>$currency_details[0]['currency'],
            'title'          => display('manage_purchase'),
            'company_info'   => $company_info,
            'currency'       => $currency_details[0]['currency'],
            'total_purhcase' => $CI->Purchases->count_trucking(),
            'truck' =>$truckin
        );
        $purchaseList = $CI->parser->parse('purchase/trucking_list', $data, true);
        return $purchaseList;
    }

    //purchase search by supplier

    public function purchase_search_supplier($supplier_id, $links, $per_page, $page) {

        $CI = & get_instance();

        $CI->load->model('Purchases');

        $CI->load->model('Web_settings');

        $CI->load->library('occational');

        $purchases_list = $CI->Purchases->purchase_search($supplier_id, $per_page, $page);

        if (!empty($purchases_list)) {

            $j = 0;

            foreach ($purchases_list as $k => $v) {

                $purchases_list[$k]['final_date'] = $CI->occational->dateConvert($purchases_list[$j]['purchase_date']);

                $j++;

            }



            $i = 0;

            foreach ($purchases_list as $k => $v) {

                $i++;

                $purchases_list[$k]['sl'] = $i + $CI->uri->segment(3);

            }

        }

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();

        $data = array(

            'title'          => display('manage_purchase'),

            'purchases_list' => $purchases_list,

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

        $CI->load->model('Purchases');

        $CI->load->model('Web_settings');

        $CI->load->library('occational');

        $purchases_list = $CI->Purchases->purchase_list_invoice_id($invoice_no);

        if (!empty($purchases_list)) {

            $j = 0;

            foreach ($purchases_list as $k => $v) {

                $purchases_list[$k]['final_date'] = $CI->occational->dateConvert($purchases_list[$j]['purchase_date']);

                $j++;

            }



            $i = 0;

            foreach ($purchases_list as $k => $v) {

                $i++;

                $purchases_list[$k]['sl'] = $i + $CI->uri->segment(3);

            }

        }

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();

        $data = array(

            'title'          => display('manage_purchase'),

            'purchases_list' => $purchases_list,

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

        $CI->load->model('Purchases');

        $CI->load->library('occational');

        $purchases_list = $CI->Purchases->purchase_by_search($supplier_id);

        $j = 0;

        if (!empty($purchases_list)) {

            foreach ($purchases_list as $k => $v) {

                $purchases_list[$k]['final_date'] = $CI->occational->dateConvert($purchases_list[$j]['purchase_date']);

                $j++;

            }

            $i = 0;

            foreach ($purchases_list as $k => $v) {

                $i++;

                $purchases_list[$k]['sl'] = $i;

            }

        }

        $data = array(

            'title' => display('manage_purchase'),

            'purchases_list' => $purchases_list

        );

        $purchaseList = $CI->parser->parse('purchase/purchase', $data, true);

        return $purchaseList;

    }



    //Insert Purchase

    public function insert_purchase($data) {

        $CI = & get_instance();

        $CI->load->model('Purchases');

        $CI->Purchases->purchase_entry($data);

        return true;

    }

 //purchase Edit Data
public function purchase_edit_data($purchase_id) {
        $CI = & get_instance();
        $CI->load->model('Purchases');
        $CI->load->model('Suppliers');
        $CI->load->model('Web_settings');
        $CI->load->model('Products');
        $CI->load->model('Invoices');       
        $bank_list        = $CI->Web_settings->bank_list();
        
                   $setting_detail = $CI->Web_settings->retrieve_setting_editdata();

        $purchase_detail = $CI->Purchases->retrieve_purchase_editdata($purchase_id);
        // echo "<pre>";
        // print_r($purchase_detail);die();
        // echo "</pre>";
        $expense_edit = $CI->Purchases->getEditExpensesData($purchase_detail[0]['chalan_no']);
        $payment_type_dropdown = $CI->Purchases->payment_type_dropdown();
        $payment_terms_dropdown = $CI->Purchases->payment_terms_dropdown();
        $edit_purchasedata = $CI->Purchases->editPurchaseallData();
        $all_supplier = $CI->Purchases->select_all_supplier();
        $all_product_list = $CI->Products->all_product_list();
        $supplier_list = $CI->Suppliers->supplier_list("110", "0");
        $supplier_selected = $CI->Suppliers->supplier_search_item($purchase_id);
           $product_bundle = $CI->Invoices->get_product_bundle();
   $supplier_block_no = $CI->Invoices->get_product_supplier_block();
        if (!empty($purchase_detail)) {
            $i = 0;
            foreach ($purchase_detail as $k => $v) {
                $i++;
                $purchase_detail[$k]['sl'] = $i;
            }
        }
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();

        $curn_info_default = $CI->db->select('*')->from('currency_tbl')->where('icon',$currency_details[0]['currency'])->get()->result_array();
        $details =$CI->Purchases->retrieve_purchasedata($purchase_id);
        // print_r($details);
        
        $bank_list        = $CI->Web_settings->bank_list();
        $expense_packing_list        = $CI->Purchases->expense_package();
        $taxfield1 = $CI->Purchases->tax_info();
        $sale_costpersqft_per = $CI->Invoices->sales_cost_permission();
        $po_number = $CI->db->select('chalan_no')
        ->from('purchase_order')
        ->get()
        ->result_array();
        $country_code = $CI->db->select('*')->from('country')->get()->result_array();
        // print_r($country_code);

        $data = array(
                'supplier_block_no'=>$supplier_block_no,
                   'bundle' => $product_bundle,
            'curn_info_default' =>$curn_info_default[0]['currency_name'],
            'currency' => $currency_details[0]['currency'],
            'all_tax' =>$taxfield1,
            'po'  => $po_number,
             'price'  =>$sale_costpersqft_per[1]['price'],
            'all_supplier'  => $all_supplier,
            'product_list'  => $all_product_list,
            'edit_purchasedata' => $edit_purchasedata,
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
            'message_invoice' =>$purchase_detail[0]['message_invoice'],
            'total_discount'=> $purchase_detail[0]['total_discount'],
            'total'         => number_format($purchase_detail[0]['grand_total_amount'] + (!empty($purchase_detail[0]['total_discount'])?$purchase_detail[0]['total_discount']:0),2),
            'bank_id'       =>  $purchase_detail[0]['bank_id'],
            'purchase_info' => $purchase_detail,
            'supplier_list' => $supplier_list,
            'paid_amount'   => $purchase_detail[0]['paid_amount'],
            'balance'    => $purchase_detail[0]['balance'],
            'payment_id'    => $purchase_detail[0]['payment_id'],
            'bank_list'     => $bank_list,
            'supplier_selected' => $supplier_selected,
            'discount_type' => $currency_details[0]['discount_type'],
             'paytype'       => $purchase_detail[0]['payment_type'],
           'total_tax'       => $purchase_detail[0]['total_tax'],
           'packing_id'    => $purchase_detail[0]['packing_id'],
           'isf_filling'    => $purchase_detail[0]['isf_filling'],
           'packinglist'=>$expense_packing_list,
           'country_code' => $country_code,
           'payment_type' =>   $payment_type_dropdown,
           'payment_terms' => $payment_terms_dropdown,
           'isf_filling'   =>  $purchase_detail[0]['isf_filling'],
           'bl_number'   =>  $purchase_detail[0]['bl_number'],
           'container_no'   =>  $purchase_detail[0]['container_no'],
           'etd'   =>  $purchase_detail[0]['etd'],
           'eta'   =>  $purchase_detail[0]['eta'],
           'purchase_info'  =>$purchase_detail,
           'Port_of_discharge'   =>  $purchase_detail[0]['Port_of_discharge'],
           'payment_due_date'  =>  $purchase_detail[0]['payment_due_date'],
           'payment_terms'  =>  $purchase_detail[0]['payment_terms'],
           'payment_type'  =>  $purchase_detail[0]['payment_type'],
           'product_name'    =>  $purchase_detail[0][ 'product_name'],
           'thickness'    =>  $purchase_detail[0][ 'thickness'],
               'paid_amount'    =>  $purchase_detail[0][ 'paid_amount'],
               'balance'    =>  $purchase_detail[0][ 'balance'],
               'description'    =>  $purchase_detail[0][ 'description'],
              'total'             =>   $purchase_detail[0]['total_amt'],
              'total_tax'             =>   $purchase_detail[0]['total_tax'],
              'grand_total_amount'              =>$purchase_detail[0]['grand_total_amount'],
              'gtotal_preferred_currency'       =>$purchase_detail[0]['gtotal_preferred_currency'],
           'supplier_block_no'     =>  $purchase_detail[0][ 'supplier_block_no'],
           'supplier_slab_no'      =>  $purchase_detail[0][ 'supplier_slab_no'],
           'gross_width'           =>  $purchase_detail[0][ 'gross_width'],
           'gross_height'          =>  $purchase_detail[0][ 'gross_height'],
           'gross_sq_ft_1'             =>  $purchase_detail[0][ 'gross_sq_ft_1'],
           'bundle_no'    =>  $purchase_detail[0][ 'bundle_no'],
           'slab_no'    =>  $purchase_detail[0][ 'slab_no'],
           'net_width'    =>  $purchase_detail[0][ 'net_width'],
           'net_height'    =>  $purchase_detail[0][ 'net_height'],
           'net_sq_ft'    =>  $purchase_detail[0][ 'net_sq_ft'],
           'weight'    =>  $purchase_detail[0][ 'weight'],
              'overall_gross'  =>$purchase_detail[0]['overall_gross'],
                'overall_net'  =>$purchase_detail[0]['overall_net'],
           'origin'    =>  $purchase_detail[0][ 'origin'],
           'cost_sq_ft'    =>  $purchase_detail[0][ 'cost_sq_ft'],
           'cost_sq_slab'    =>  $purchase_detail[0][ 'cost_sq_slab'],
           'sales_amt_sq_ft'    =>  $purchase_detail[0][ 'sales_amt_sq_ft'],
           'sales_slab_amt'    =>  $purchase_detail[0][ 'sales_slab_amt'],
           'account_category'    =>  $details[0]['account_category'],
           'sub_category'    =>  $details[0]['sub_category'],
           'account_subcat'    =>  $details[0]['account_subcat'],
           'tableid'    =>  $purchase_detail[0][ 'tableid'],
           'expense_edit' => $expense_edit,
           'setting_detail' => $setting_detail

        );
        // product_list
//   print_r( $data);

        $chapterList = $CI->parser->parse('purchase/edit_purchase_form', $data, true);
        return $chapterList;
    }






 
  //purchase Edit Data
public function servprovider_edit_data($serviceprovider_id) {
        $CI = & get_instance();
        $CI->load->model('Purchases');
        $CI->load->model('Suppliers');
        $CI->load->model('Web_settings');
        $CI->load->model('Products');



         $purchase_detail = $CI->Purchases->retrieve_supplier_data();

         $all_product_list = $CI->Products->all_product_list();
               $setting_detail = $CI->Web_settings->retrieve_setting_editdata();


         $bank_list        = $CI->Web_settings->bank_list();
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $curn_info_default = $CI->db->select('*')->from('currency_tbl')->where('icon',$currency_details[0]['currency'])->get()->result_array();
        $bank_list        = $CI->Web_settings->bank_list();
        $info_service= $CI->Purchases->service_provider($serviceprovider_id);
        $expense_data = $CI->Purchases->editAlldataserviceprovider();
         $s_p_name = $CI->db->select('*')->from('supplier_information')->where('supplier_name',$info_service[0]['service_provider_name'])->get()->result_array();


    
    $data = array(
        's_id' =>$s_p_name[0]['supplier_id'],
        'curn_info_default' =>$curn_info_default[0]['currency_name'],
        'currency' => $currency_details[0]['currency'],
        'service_provider_name'   => $info_service[0]['service_provider_name'],
        'sp_address'   => $info_service[0]['sp_address'],
        'payment_terms'   => $info_service[0]['payment_terms'],
        'bill_number'   => $info_service[0]['bill_number'],
        'bill_dating'   => $info_service[0]['bill_date'],
        'total'   => $info_service[0]['total'],

        'serviceprovider_id'   => $info_service[0]['serviceprovider_id'],
        'product_list'  => $all_product_list,

        'phone_num'   => $info_service[0]['phone_num'],
        'acc_cat_name'   => $info_service[0]['acc_cat_name'],
        'acc_sub_name'   => $info_service[0]['acc_sub_name'],
        'acc_cat'   => $info_service[0]['acc_cat'],

 
        'supplier_id'   => $purchase_detail,

        'tax_detail'   => $info_service[0]['tax_detail'],
        'gtotals'   => $info_service[0]['gtotals'],
        'vendor_gtotals'   => $info_service[0]['vendor_gtotals'],
        'amount_paids'   => $info_service[0]['amount_paids'],
        'balances'   => $info_service[0]['balances'],
 
        'payment_id_service'   => $info_service[0]['payment_id'],

        'memo_details'   => $info_service[0]['memo_details'],
        'info_service' => $info_service,
        
         'details_info' => $info_service,
         'expense_tax' => $expense_data,
           'setting_detail' => $setting_detail

 );
 
//  print_r($data['expense_tax'][0]['tax']);
   
   
    $chapterList = $CI->parser->parse('purchase/edit_serviceprovider_form', $data, true);
    return $chapterList;
}




















public function po_details($po_num){

         
     $CI = & get_instance();
        $CI->load->model('Purchases');
        $CI->load->model('Suppliers');
            $CI->load->model('Invoices');
        $CI->load->model('Web_settings');
        $CI->load->model('Products');
         $bank_list        = $CI->Web_settings->bank_list();
           $purchase_id = $CI->db->select('purchase_order_id')->from('purchase_order')->where('chalan_no' , $po_num)->get()->row()->purchase_order_id;
        $purchase_detail = $CI->Purchases->retrieve_purchase_order_editdata($purchase_id);
       // print_r($purchase_detail);
        $taxfield1 = $CI->db->select('tax_id,tax')
        ->from('tax_information')
        ->get()
        ->result_array();
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
        $taxfield1 = $CI->db->select('tax_id,tax')
        ->from('tax_information')
        ->get()
        ->result_array();
       // print_r($purchase_detail);
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $curn_info_default = $CI->db->select('*')->from('currency_tbl')->where('icon',$currency_details[0]['currency'])->get()->result_array();
  $products = $CI->Products->get_all_products();
        $data = array(
            'curn_info_default' =>$curn_info_default[0]['currency_name'],
            'currency' => $currency_details[0]['currency'],
            'title'  => display('purchase_edit'),
            'ship_to'  => $purchase_detail[0]['ship_to'],
            'gtotal_preferred_currency' => $purchase_detail[0]['gtotal_preferred_currency'],
          //  'quantity'  => $purchase_detail[0]['quantity'],
            'tax' =>$taxfield1,
            'port_of_discharge' =>(!empty($purchase_detail[0]['port_of_discharge'])?$purchase_detail[0]['port_of_discharge']:0),
            'isf_filling' =>$purchase_detail[0]['isf_filling'],
            'created_by' => $purchase_detail[0]['created_by'],
            'payment_terms' => $purchase_detail[0]['payment_terms'],
            'shipment_terms' => $purchase_detail[0]['shipment_terms'],
            'est_ship_date' => $purchase_detail[0]['est_ship_date'],
           'total_tax'       => $purchase_detail[0]['tax_details'],
            'purchase_id'   => $purchase_detail[0]['purchase_id'],
            'chalan_no'     => $purchase_detail[0]['chalan_no'],
            'supplier_name' => $purchase_detail[0]['supplier_name'],
            'supplier_id'   => $purchase_detail[0]['supplier_id'],
            'grand_total_amount'   => $purchase_detail[0]['grand_total_amount'],
            'gtotal_preferred_currency'   => $purchase_detail[0]['gtotal_preferred_currency'],
            'tax_details'   => $purchase_detail[0]['tax_details'],
            'purchase_details' => $purchase_detail[0]['purchase_details'],
            'purchase_date' => $purchase_detail[0]['purchase_date'],
            'remarks'       => $purchase_detail[0]['remarks'],
             'est_ship_date'       => $purchase_detail[0]['est_ship_date'],
            'total_discount'=> $purchase_detail[0]['total_discount'],
            'payment_type'       => $purchase_detail[0]['payment_type'],
            // 'total'         => number_format($purchase_detail[0]['total'] + (!empty($purchase_detail[0]['total_discount'])?$purchase_detail[0]['total_discount']:0),2),
            'total'             =>$purchase_detail[0]['total'],
             'g_width'           =>  $purchase_detail[0][ 'g_width'],
           'g_height'          =>  $purchase_detail[0][ 'g_height'],
           'gross_sqft'             =>  $purchase_detail[0][ 'gross_sqft'],
            'n_width'    =>  $purchase_detail[0][ 'n_width'],
           'n_height'    =>  $purchase_detail[0][ 'n_height'],
           'net_sqft'    =>  $purchase_detail[0][ 'net_sqft'],
            'bank_id'       =>  $purchase_detail[0]['bank_id'],
            'purchase_info' => $purchase_detail,
            'supplier_list' => $supplier_list,
           'all_tax' =>$taxfield1,
                'overall_gross'  =>$purchase_detail[0]['total_gross'],
                'overall_net'  =>$purchase_detail[0]['total_net'],
                'weight'    =>  $purchase_detail[0][ 'total_weight'],
                'cost_per_slab'    =>  $purchase_detail[0][ 'cost_per_slab'],
           'cost_per_sqft'    =>  $purchase_detail[0][ 'cost_per_sqft'],
           'sales_price_sqft'    =>  $purchase_detail[0][ 'sales_price_sqft'],
           'sales_slab_price'    =>  $purchase_detail[0][ 'sales_slab_price'],
            'bl_number'   =>  $purchase_detail[0]['bl_number'],
            'paid_amount'   => $purchase_detail[0]['paid_amount'],
            'balance'    => $purchase_detail[0]['due_amount'],
            'bank_list'     => $bank_list,
            'supplier_selected' => $supplier_selected,
            'discount_type' => $currency_details[0]['discount_type'],
           'container_no'   =>  $purchase_detail[0]['container_no'],
             'payment_id1'       => $purchase_detail[0]['payment_id'],
            'message_invoice'       => $purchase_detail[0]['message_invoice'],
            'purchase_detail' =>$purchase_detail,
            //  'remarks'       => $purchase_detail[0]['remarks'],
           'products' =>$products
        );
   //   print_r($data);
        $chapterList = $CI->parser->parse('purchase/final_purchase', $data, true);
        return $chapterList;
    }
public function purchase_order_edit_data($purchase_id) {
        $CI = & get_instance();
        $CI->load->model('Purchases');
        $CI->load->model('Suppliers');
        $CI->load->model('Web_settings');
        $CI->load->model('Products');
           $CI->load->model('Invoices');
         $bank_list        = $CI->Web_settings->bank_list();
        $purchase_detail = $CI->Purchases->retrieve_purchase_order_editdata($purchase_id);
        $purchase_data = $CI->Purchases->geteditPurchasedata($purchase_detail[0]['chalan_no']);
        $editPurchase_data = $CI->Purchases->editPurchaseGetdata();
           $setting_detail = $CI->Web_settings->retrieve_setting_editdata();

           $product_bundle = $CI->Invoices->get_product_bundle();
   $supplier_block_no = $CI->Invoices->get_product_supplier_block();
        // print_r($purchase_detail); die();
        $taxfield1 = $CI->Purchases->getexpense_taxinfo();
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
        $curn_info_default = $CI->db->select('*')->from('currency_tbl')->where('icon',$currency_details[0]['currency'])->get()->result_array();
$products = $CI->Products->get_all_products();
$edit_purdata = $CI->Purchases->editPurallData();


$country_code = $CI->db->select('*')->from('country')->get()->result_array();


        $data = array(
           'supplier_block_no'=>$supplier_block_no,
         'curn_info_default' =>$curn_info_default[0]['currency_name'],
       'bundle' => $product_bundle,
            'currency' => $currency_details[0]['currency'],
            'title'  => display('purchase_edit'),
            'ship_to'  => $purchase_detail[0]['ship_to'],
            'gtotal_preferred_currency' => $purchase_detail[0]['gtotal_preferred_currency'],
          //  'quantity'  => $purchase_detail[0]['quantity'],
            'tax' =>$taxfield1,
            'edit_purdata' => $edit_purdata,
            'created_by' => $purchase_detail[0]['created_by'],
            'payment_terms' => $purchase_detail[0]['payment_terms'],
            'shipment_terms' => $purchase_detail[0]['shipment_terms'],
            'est_ship_date' => $purchase_detail[0]['est_ship_date'],
            //'description' => $purchase_detail[0]['description'],
            'purchase_id'   => $purchase_detail[0]['purchase_id'],
            'chalan_no'     => $purchase_detail[0]['chalan_no'],
            'supplier_name' => $purchase_detail[0]['supplier_name'],
            'supplier_id'   => $purchase_detail[0]['supplier_id'],
            'grand_total_amount'   => $purchase_detail[0]['grand_total_amount'],
            'gtotal_preferred_currency'   => $purchase_detail[0]['gtotal_preferred_currency'],
            'tax_details'   => $purchase_detail[0]['tax_details'],
            'purchase_details' => $purchase_detail[0]['purchase_details'],
            'purchase_date' => $purchase_detail[0]['purchase_date'],
            'remarks'       => $purchase_detail[0]['remarks'],
             'est_ship_date'       => $purchase_detail[0]['est_ship_date'],
            'total_discount'=> $purchase_detail[0]['total_discount'],
            // 'total'         => number_format($purchase_detail[0]['total'] + (!empty($purchase_detail[0]['total_discount'])?$purchase_detail[0]['total_discount']:0),2),
            'total'             =>$purchase_detail[0]['total'],
            'bank_id'       =>  $purchase_detail[0]['bank_id'],
            'purchase_info' => $purchase_detail,
            'supplier_list' => $supplier_list,
            'paid_amount'   => $purchase_detail[0]['paid_amount'],
            'due_amount'    => $purchase_detail[0]['due_amount'],
            'bank_list'     => $bank_list,
            'supplier_selected' => $supplier_selected,
            'discount_type' => $currency_details[0]['discount_type'],
            'paytype'       => $purchase_detail[0]['payment_type'],
             'payment_id'       => $purchase_detail[0]['payment_id'],
            'message_invoice'       => $purchase_detail[0]['message_invoice'],
            'purchase_detail' =>$purchase_detail,
            //  'remarks'       => $purchase_detail[0]['remarks'],
            'products'  => $products,
            'purchase_data' => $purchase_data,
            'country_code' => $country_code,

            'editPurchase_data' => $editPurchase_data,
            
                       'setting_detail' => $setting_detail

            
        );
    //   print_r($data);
        $chapterList = $CI->parser->parse('purchase/edit_purchase_order_form', $data, true);
        return $chapterList;
    }


        //ocean import tracking Edit Data
    public function ocean_import_tracking_edit_data($purchase_id) {
        $CI = & get_instance();
        $CI->load->model('Purchases');
        $CI->load->model('Suppliers');
        $CI->load->model('Web_settings');
        $bank_list        = $CI->Web_settings->bank_list();
        $purchase_detail = $CI->Purchases->retrieve_ocean_import_tracking_editdata($purchase_id);
           $setting_detail = $CI->Web_settings->retrieve_setting_editdata();
        $oceanimportdata = $CI->Purchases->getEditOceanImportdata($purchase_detail[0]['booking_no']);
        $edit_oceanimport  = $CI->Purchases->edit_oceanimport();
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
            $customer_name = $CI->db->select('*')->from('customer_information')->where('customer_id', $purchase_detail[0]['consignee'])->get()->result_array();
           $data = array(
            'title'         => display('purchase_edit'),
            'ocean_import_tracking_id'   => $purchase_detail[0]['ocean_import_tracking_id'],
            'booking_no'     => $purchase_detail[0]['booking_no'],
            'container_no' => $purchase_detail[0]['container_no'],
            'seal_no'   => $purchase_detail[0]['seal_no'],
            'shipper' => $purchase_detail[0]['shipper'],
            'invoice_date' => $purchase_detail[0]['invoice_date'],
             'consignee' => $purchase_detail[0]['consignee'],
            'notify_party' => $purchase_detail[0]['notify_party'],
            'vessel' =>  $purchase_detail[0]['vessel'],
              'eta' =>  $purchase_detail[0]['eta'],
                'etd' =>  $purchase_detail[0]['etd'],
                          'invoice_date' =>  $purchase_detail[0]['invoice_date'],
            'voyage_no' =>  $purchase_detail[0]['voyage_no'],
            'port_of_loading' =>  $purchase_detail[0]['port_of_loading'],
            'port_of_discharge' => $purchase_detail[0]['port_of_discharge'],
            'place_of_delivery' => $purchase_detail[0]['place_of_delivery'],
            'freight_forwarder'  => $purchase_detail[0]['freight_forwarder'],
            'particular' => $purchase_detail[0]['particular'],
            'attachment' => $purchase_detail[0]['attachment'],
             'remarks' => $purchase_detail[0]['remarks'],
            'status'  => $purchase_detail[0]['status'],
            'country_origin'  => $purchase_detail[0]['country_origin'],
          'supplier_list'=>$supplier_list,
            'c_name' =>  $edit_oceanimport,
            'supplier_name'   => $purchase_detail[0]['supplier_name'],
            'supplier_id'   => $purchase_detail[0]['supplier_id'],
            'customer'  => $customer_name[0]['customer_name'],
            'oceanimportdata' => $oceanimportdata,
                       'setting_detail' => $setting_detail

        );
         $chapterList = $CI->parser->parse('purchase/edit_ocean_import_tracking_form', $data, true);
        return $chapterList;
    }


        //trucking Edit Data

    // public function trucking_edit_data($purchase_id) {

    //     $CI = & get_instance();
    //     $CI->load->model('Invoices');
    //     $CI->load->model('Purchases');

    //     $CI->load->model('Suppliers');

    //     $CI->load->model('Web_settings');

    //      //$bank_list        = $CI->Web_settings->bank_list();

    //     $purchase_detail = $CI->Purchases->retrieve_trucking_editdata($purchase_id);

    //     $customer_id = $purchase_detail[0]['customer_id'];

    //     // $supplier_list = $CI->Suppliers->supplier_list("110", "0");

    //     // $supplier_selected = $CI->Suppliers->supplier_search_item($supplier_id);



    //     if (!empty($purchase_detail)) {

    //         $i = 0;

    //         foreach ($purchase_detail as $k => $v) {

    //             $i++;

    //             $purchase_detail[$k]['sl'] = $i;

    //         }

    //     }



    //     $currency_details = $CI->Web_settings->retrieve_setting_editdata();
    //     $all_supplier = $CI1->Purchases->select_all_supplier();
    //     $get_customer= $this->accounts_model->get_customer();
        
    //     $taxfield = $CI->db->select('tax_name,default_value')->from('tax_settings')->get()->result_array();
    //     $taxfield1 = $CI->db->select('tax_id,tax')
    //     ->from('tax_information')
    //     ->get()
    //     ->result_array();
    //       $pro_number = $CI->Invoices->pro_number();
    //     $dropdown = $CI->Purchases->invoice_dropdown();
    //     $currency_details = $CI->Web_settings->retrieve_setting_editdata();
    //     $curn_info_default = $CI->db->select('*')->from('currency_tbl')->where('icon',$currency_details[0]['currency'])->get()->result_array();
    //     $data = array(
    //         'curn_info_default' =>$curn_info_default[0]['currency_name'],
    //         'currency'  =>$currency_details[0]['currency'],
    //         'customer_list' => $get_customer,
    //         'all_supplier'  => $all_supplier,
    //         'title'         => display('purchase_edit'),
    //         'taxes'         => $taxfield,
    //         'dropdown'    =>   $dropdown,
    //         'tax'         => $taxfield1,
    //         'trucking_id'   => $purchase_detail[0]['trucking_id'],

    //         'invoice_no'     => $purchase_detail[0]['invoice_no'],

    //         'customer_name' => $purchase_detail[0]['customer_name'],

    //         'customer_id'   => $purchase_detail[0]['customer_id'],

    //         'bill_to'   => $purchase_detail[0]['bill_to'],
    //          'payment_id'   => $purchase_detail[0]['payment_id'],

    //         'shipment_company'   => $purchase_detail[0]['shipment_company'],

    //         'container_pickup_date'   => $purchase_detail[0]['container_pickup_date'],

    //         'delivery_date'   => $purchase_detail[0]['delivery_date'],

    //         'total'         => number_format($purchase_detail[0]['grand_total_amount'] + (!empty($purchase_detail[0]['total_discount'])?$purchase_detail[0]['total_discount']:0),2),

    //        'invoice'  => $pro_number

    //     );



    //     $chapterList = $CI->parser->parse('purchase/edit_trucking_form', $data, true);

    //     return $chapterList;

    // }



         //trucking Edit Data

    public function packing_list_edit_data($purchase_id) {

        $CI = & get_instance();

        $CI->load->model('Purchases');

        $CI->load->model('Suppliers');

        $CI->load->model('Web_settings');

         //$bank_list        = $CI->Web_settings->bank_list();

        $purchase_detail = $CI->Purchases->retrieve_packing_editdata($purchase_id);
   
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



        $currency_details = $CI->Web_settings->retrieve_setting_editdata();

        $data = array(

            'title'         => 'Packing List Edit',

            'expense_packing_id'   => $purchase_detail[0]['expense_packing_id'],

            'invoice_no'     => $purchase_detail[0]['invoice_no'],

            'invoice_date'   => $purchase_detail[0]['invoice_date'],

            'gross_weight' => $purchase_detail[0]['gross_weight'],

            'container_no' => $purchase_detail[0]['container_no'],

            'thickness' => $purchase_detail[0]['thickness'],

            'description' =>  $purchase_detail[0]['description'],

            'grand_total_amount' =>  $purchase_detail[0]['grand_total_amount'],

            'serial_no' =>   $purchase_detail[0]['serial_no'],

            'purchase_info' => $purchase_detail,

            'slab_no' =>   $purchase_detail[0]['slab_no'],

            'prouduct_name' =>  $purchase_detail[0]['product_name'],

            'net_measure' =>   $purchase_detail[0]['net_measure'],

            'height' =>   $purchase_detail[0]['height'],

            'width'=>   $purchase_detail[0]['width'],
            'area'=>   $purchase_detail[0]['area'],

        );
print_r($purchase_detail);
die();

        $chapterList = $CI->parser->parse('purchase/edit_packing_form', $data, true);
      //  $chapterList = $CI->parser->parse('purchase/editpackinglist', $data, true);
        return $chapterList;

    }



    //Search purchase

    public function purchase_search_list($cat_id, $company_id) {

        $CI = & get_instance();

        $CI->load->model('Purchases');

        $category_list = $CI->Purchases->retrieve_category_list();

        $purchases_list = $CI->Purchases->purchase_search_list($cat_id, $company_id);

        $data = array(

            'title'          => display('manage_purchase'),

            'purchases_list' => $purchases_list,

            'category_list'  => $category_list

        );

        $purchaseList = $CI->parser->parse('purchase/purchase', $data, true);

        return $purchaseList;

    }



public function purchase_details_data($purchase_id) {
    $CI = & get_instance();
    $CI->load->model('Purchases');
    $CI->load->model('Products');
    $CI->load->library('occational');
    $CI->load->library('Products');
    $CI->load->model('invoice_content');
    $CI->load->model('Web_settings');
   $w = & get_instance();
     $w->load->model('Ppurchases');
    $purchase_detail = $CI->Purchases->retrieve_purchase_editdata($purchase_id);
    $pdetails = $CI->Purchases->retrieve_purchasedata($purchase_id);
    
    $Products = $CI->Products->get_invoice_product($purchase_id);
    $get_invoice_design = $CI->Purchases->get_invoice_design();
    $CI->load->model('invoice_design');
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
   $company_info = $w->Ppurchases->retrieve_company();
    $curn_info_default = $CI->db->select('*')->from('currency_tbl')->where('icon',$currency_details[0]['currency'])->get()->result_array();
    $dataw = $CI->invoice_design->retrieve_data();


    $datacontent = $CI->invoice_content->retrieve_info_data();
    $setting=  $CI->Web_settings->retrieve_setting_editdata();

 //   print_r($purchase_detail);
     $supplier_currency =$CI->Purchases->supplier_info($purchase_detail[0]['supplier_id']);
  //    print_r($supplier_currency);die();
// $supplier_currency = $CI->db->select('*')->from('supplier_information')->where('supplier_name',$purchase_detail[0]['supplier_name'])->get()->result_array();
//   echo $this->db->last_query(); die();
  // print_r($dataw);die();
 $data = array(
        'header'=> $dataw[0]['header'],
       'logo'=>(!empty($setting[0]['invoice_logo'])?$setting[0]['invoice_logo']:$company_info[0]['logo']), 
        'color'=> $dataw[0]['color'],
        'template'=> $dataw[0]['template'],
        'curn_info_default' =>$curn_info_default[0]['currency_name'],
        'title'            => display('purchase_details'),
         'address' => $supplier_currency[0]['address'],
         'city' => $supplier_currency[0]['city'],
         'state' => $supplier_currency[0]['state'],
         'supplier_nam' =>  $supplier_currency[0]['supplier_name'],
         'zip' => $supplier_currency[0]['zip'],
         'country' => $supplier_currency[0]['country'],
         'primaryemail' => $supplier_currency[0]['primaryemail'],
         'mobile' => $supplier_currency[0]['mobile'],
        'purchase_id'      => $purchase_detail[0]['purchase_id'],
      'overall_total'      => $purchase_detail[0]['total_amt'],
        // 'mobile'      => $purchase_detail[0]['mobile'],
        // 'address'      => $purchase_detail[0]['address'],
        'message_invoice' => $purchase_detail[0]['message_invoice'],
        'purchase_details' => $purchase_detail[0]['purchase_details'],
        'remarks'  => $purchase_detail[0]['remarks'],
        'packing_id'    => $purchase_detail[0]['packing_id'],
                'currency_type'  =>$supplier_currency[0]['currency_type'],
        'isf_filling'    => $purchase_detail[0]['isf_filling'],
        'Port_of_discharge'    => $purchase_detail[0]['Port_of_discharge'],
        'eta'    => $purchase_detail[0]['eta'],
        'bl_number'    => $purchase_detail[0]['bl_number'],
        'container_no'    => $purchase_detail[0]['container_no'],
        'etd'    => $purchase_detail[0]['etd'],
        'vendor_type'    => $supplier_currency[0]['vendor_type'],
        'payment_terms'    => $purchase_detail[0]['payment_terms'],
        'payment_type'    => $purchase_detail[0]['payment_type'],
        'product'  => $Products[0]['product_name'],
        'supplier_name'    => $purchase_detail[0]['supplier_name'],
        'desc'    => $purchase_detail[0]['description'],
        'final_date'       => $purchase_detail[0]['purchase_date'],
        'payment_due_date'       => $purchase_detail[0]['payment_due_date'],
        'sub_total_amount' => number_format($purchase_detail[0]['grand_total_amount'], 2, '.', ','),
        'chalan_no'        => $purchase_detail[0]['chalan_no'],
        'grand_total_amount'            => $purchase_detail[0]['grand_total_amount'],
         'total'            => $purchase_detail[0]['total'],
        'discount'         => number_format((!empty($purchase_detail[0]['total_discount'])?$purchase_detail[0]['total_discount']:0),2),
        'paid_amount'      => $purchase_detail[0]['paid_amount'],
        'purchase_all_data'   => $purchase_detail,
         'company_info'=> (!empty($datacontent)?$datacontent:$company_info), 
        'currency'            => $currency_details[0]['currency'],
        'position'            => $currency_details[0]['currency_position'],
        'total_tax'           => $purchase_detail[0]['total_tax'],
        'net_height'  =>    $purchase_detail[0]['net_height'],
        
        'account_category'  => $pdetails[0]['account_category'],
        'sub_category'  => $pdetails[0]['sub_category'],
        'account_subcat'  => $pdetails[0]['account_subcat'],
    );
    
  
  // print_r($dataw[0]['color']);


    $chapterList = $CI->parser->parse('purchase/purchase_detail', $data, true);
    return $chapterList;
}

public function purchase_details_data_print($purchase_id) {
   $CI = & get_instance();
    $CI->load->model('Purchases');
    $CI->load->model('Products');
    $CI->load->library('occational');
     $CI->load->model('invoice_content');
    $CI->load->library('Products');
    $CI->load->model('Web_settings');
  $w = & get_instance();
     $w->load->model('Ppurchases');
      $purchase_detail = $CI->Purchases->retrieve_purchase_editdata($purchase_id);
  //print_r($purchase_detail); die();
    $Products = $CI->Products->get_invoice_product($purchase_id);
    $get_invoice_design = $CI->Purchases->get_invoice_design();
    $CI->load->model('invoice_design');
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

    $setting=  $CI->Web_settings->retrieve_setting_editdata();
  $datacontent = $CI->invoice_content->retrieve_info_data();
    $currency_details = $CI->Web_settings->retrieve_setting_editdata();
     $company_info = $w->Ppurchases->retrieve_company();
    $curn_info_default = $CI->db->select('*')->from('currency_tbl')->where('icon',$currency_details[0]['currency'])->get()->result_array();
    $dataw = $CI->invoice_design->retrieve_data();
     $supplier_currency =$CI->Purchases->supplier_info($purchase_detail[0]['supplier_id']);
  //    print_r($supplier_currency);die();
// $supplier_currency = $CI->db->select('*')->from('supplier_information')->where('supplier_name',$purchase_detail[0]['supplier_name'])->get()->result_array();
//   echo $this->db->last_query(); die();
//   print_r($purchase_detail[0]['supplier_name']);die();
 $data = array(
        'header'=> $dataw[0]['header'],
         'logo'=>(!empty($setting[0]['invoice_logo'])?$setting[0]['invoice_logo']:$company_info[0]['logo']), 
        'color'=> $dataw[0]['color'],
        'template'=> $dataw[0]['template'],
        'curn_info_default' =>$curn_info_default[0]['currency_name'],
        'title'            => display('purchase_details'),
         'address' => $supplier_currency[0]['address'],
         'city' => $supplier_currency[0]['city'],
         'state' => $supplier_currency[0]['state'],
         'supplier_nam' =>  $supplier_currency[0]['supplier_name'],
         'zip' => $supplier_currency[0]['zip'],
         'country' => $supplier_currency[0]['country'],
         'primaryemail' => $supplier_currency[0]['primaryemail'],
         'mobile' => $supplier_currency[0]['mobile'],
        'purchase_id'      => $purchase_detail[0]['purchase_id'],
      'overall_total'      => $purchase_detail[0]['total_amt'],
        // 'mobile'      => $purchase_detail[0]['mobile'],
        // 'address'      => $purchase_detail[0]['address'],
        'message_invoice' => $purchase_detail[0]['message_invoice'],
        'purchase_details' => $purchase_detail[0]['purchase_details'],
        'remarks'  => $purchase_detail[0]['remarks'],
        'packing_id'    => $purchase_detail[0]['packing_id'],
                'currency_type'  =>$supplier_currency[0]['currency_type'],
        'isf_filling'    => $purchase_detail[0]['isf_filling'],
        'Port_of_discharge'    => $purchase_detail[0]['Port_of_discharge'],
        'eta'    => $purchase_detail[0]['eta'],
        'bl_number'    => $purchase_detail[0]['bl_number'],
        'container_no'    => $purchase_detail[0]['container_no'],
        'etd'    => $purchase_detail[0]['etd'],
        'vendor_type'    => $supplier_currency[0]['vendor_type'],
        'payment_terms'    => $purchase_detail[0]['payment_terms'],
        'payment_type'    => $purchase_detail[0]['payment_type'],
        'product'  => $Products[0]['product_name'],
        'supplier_name'    => $purchase_detail[0]['supplier_name'],
        'desc'    => $purchase_detail[0]['description'],
        'final_date'       => $purchase_detail[0]['convert_date'],
        'payment_due_date'       => $purchase_detail[0]['payment_due_date'],
        'sub_total_amount' => number_format($purchase_detail[0]['grand_total_amount'], 2, '.', ','),
        'chalan_no'        => $purchase_detail[0]['chalan_no'],
        'grand_total_amount'            => $purchase_detail[0]['grand_total_amount'],
         'total'            => $purchase_detail[0]['total'],
        'discount'         => number_format((!empty($purchase_detail[0]['total_discount'])?$purchase_detail[0]['total_discount']:0),2),
        'paid_amount'      => $purchase_detail[0]['paid_amount'],
        'purchase_all_data'   => $purchase_detail,
      'company_info'=> (!empty($datacontent)?$datacontent:$company_info), 
        'currency'            => $currency_details[0]['currency'],
        'position'            => $currency_details[0]['currency_position'],
        'total_tax'           => $purchase_detail[0]['total_tax'],
           'net_height'                    =>    $purchase_detail[0]['net_height'],
    );
// print_r($purchase_detail);
  $chapterList = $CI->parser->parse('purchase/purchase_detail_print', $data, true);
  return $chapterList;
}


   //Purchase details data

  public function ocean_import_tracking_details_data($purchase_id) {
        $CI = & get_instance();
        $CI->load->model('Purchases');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');
        $CI->load->model('invoice_content');
            $w = & get_instance();
     $w->load->model('Ppurchases');

        $purchase_detail = $CI->Purchases->ocean_import_tracking_details_data($purchase_id);
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
        $CI->load->model('invoice_design');
            $dataw = $CI->invoice_design->retrieve_data();
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
     

 $company_info = $w->Ppurchases->retrieve_company();
        $setting=  $CI->Web_settings->retrieve_setting_editdata();

		        
                //    print_r($datacontent); die();
    $datacontent = $CI->invoice_content->retrieve_info_data();
        $customer_name = $CI->db->select('*')->from('customer_information')->where('customer_id', $purchase_detail[0]['consignee'])->get()->result_array();
        $data = array(
            'header'=> $dataw[0]['header'],
            'color'=> $dataw[0]['color'],
             'logo'=>(!empty($setting[0]['invoice_logo'])?$setting[0]['invoice_logo']:base_url().$company_info[0]['logo']),  

            'template'=> $dataw[0]['template'],

  'business_name'=>(!empty($datacontent[0]['company_name'])?$datacontent[0]['company_name']:$company_info[0]['company_name']),   
            'phone'=>(!empty($datacontent[0]['mobile'])?$datacontent[0]['mobile']:$company_info[0]['mobile']),   
            'email'=>(!empty($datacontent[0]['email'])?$datacontent[0]['email']:$company_info[0]['email']),   
            'reg_number'=>(!empty($datacontent[0]['reg_number'])?$datacontent[0]['reg_number']:''),  
            'website'=>(!empty($datacontent[0]['website'])?$datacontent[0]['website']:$company_info[0]['website']),   
            'address'=>(!empty($datacontent[0]['address'])?$datacontent[0]['address']:$company_info[0]['address']),   
         



          



            'title'            => display('purchase_details'),
            'ocean_import_tracking_id'      => $purchase_detail[0]['ocean_import_tracking_id'],
            'booking_no' => $purchase_detail[0]['booking_no'],
            'remarks' => $purchase_detail[0]['remarks'],
            'container_no'    => $purchase_detail[0]['container_no'],
            'origin'  =>$purchase_detail[0]['country_origin'],
            'seal_no'       => $purchase_detail[0]['seal_no'],
            'etd' => $purchase_detail[0]['etd'],
            'eta' => $purchase_detail[0]['eta'],
            'bl_shipment' =>$purchase_detail[0]['bl_shipment_date'],
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
            'customer_id' => $purchase_detail[0]['consignee'],
            'status' => $purchase_detail[0]['status'],
            'create_by' => $purchase_detail[0]['create_by'],
            'customer'  => $customer_name[0]['customer_name'],
            'remarks' => $purchase_detail[0]['remarks']
        );

 

        $chapterList = $CI->parser->parse('purchase/ocean_import_invoice_html', $data, true);
        return $chapterList;
    }
   public function ocean_import_tracking_details_data_print($purchase_id) {
        $CI = & get_instance();
        $CI->load->model('Purchases');
        $CI->load->model('Web_settings');
        $CI->load->library('occational');
        $CI->load->model('invoice_content');
            $w = & get_instance();
     $w->load->model('Ppurchases');

        $purchase_detail = $CI->Purchases->ocean_import_tracking_details_data($purchase_id);
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
        $CI->load->model('invoice_design');
            $dataw = $CI->invoice_design->retrieve_data();
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
     

 $company_info = $w->Ppurchases->retrieve_company();
        $setting=  $CI->Web_settings->retrieve_setting_editdata();

		        
                //    print_r($datacontent); die();
    $datacontent = $CI->invoice_content->retrieve_info_data();
        $customer_name = $CI->db->select('*')->from('customer_information')->where('customer_id', $purchase_detail[0]['consignee'])->get()->result_array();
        $data = array(
            'header'=> $dataw[0]['header'],
            'color'=> $dataw[0]['color'],
            // 'logo'=> $setting[0]['invoice_logo'],

             'logo'=>(!empty($setting[0]['invoice_logo'])?$setting[0]['invoice_logo']:base_url().$company_info[0]['logo']),  

            'template'=> $dataw[0]['template'],

            'business_name'=>(!empty($datacontent[0]['company_name'])?$datacontent[0]['company_name']:$company_info[0]['company_name']),   
            'phone'=>(!empty($datacontent[0]['mobile'])?$datacontent[0]['mobile']:$company_info[0]['mobile']),   
            'email'=>(!empty($datacontent[0]['email'])?$datacontent[0]['email']:$company_info[0]['email']),   
            'reg_number'=>(!empty($datacontent[0]['reg_number'])?$datacontent[0]['reg_number']:''),  
            'website'=>(!empty($datacontent[0]['website'])?$datacontent[0]['website']:$company_info[0]['website']),   
            'address'=>(!empty($datacontent[0]['address'])?$datacontent[0]['address']:$company_info[0]['address']),   
         



          



            'title'            => display('purchase_details'),
            'ocean_import_tracking_id'      => $purchase_detail[0]['ocean_import_tracking_id'],
            'booking_no' => $purchase_detail[0]['booking_no'],
            'remarks' => $purchase_detail[0]['remarks'],
            'container_no'    => $purchase_detail[0]['container_no'],
            'origin'  =>$purchase_detail[0]['country_origin'],
            'seal_no'       => $purchase_detail[0]['seal_no'],
            'etd' => $purchase_detail[0]['etd'],
            'eta' => $purchase_detail[0]['eta'],
            'bl_shipment' =>$purchase_detail[0]['bl_shipment_date'],
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
            'customer_id' => $purchase_detail[0]['consignee'],
            'status' => $purchase_detail[0]['status'],
            'create_by' => $purchase_detail[0]['create_by'],
            'customer'  => $customer_name[0]['customer_name'],
            'remarks' => $purchase_detail[0]['remarks']
        );

 //  print_r($dataw[0]['color']);

        $chapterList = $CI->parser->parse('purchase/ocean_import_invoice_print', $data, true);
        return $chapterList;
    }
    // purchase list date to date

    public function purchase_list_date_to_date($start, $end) {

        $CI = & get_instance();

        $CI->load->model('Purchases');

        $CI->load->model('Web_settings');

        $CI->load->library('occational');

        $purchases_list = $CI->Purchases->purchase_list_date_to_date($start, $end);

        if (!empty($purchases_list)) {

            $j = 0;

            foreach ($purchases_list as $k => $v) {

                $purchases_list[$k]['final_date'] = $CI->occational->dateConvert($purchases_list[$j]['purchase_date']);

                $j++;

            }



            $i = 0;

            foreach ($purchases_list as $k => $v) {

                $i++;

                $purchases_list[$k]['sl'] = $i + $CI->uri->segment(3);

            }

        }

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();

        $data = array(

            'title'          => display('manage_purchase'),

            'purchases_list' => $purchases_list,

            'links'          => '',

            'currency'       => $currency_details[0]['currency'],

            'position'       => $currency_details[0]['currency_position'],

        );



        $purchaseList = $CI->parser->parse('purchase/purchase', $data, true);

        return $purchaseList;

    }

    public function packing_update_form($purchase_id)
    {
         $CI = & get_instance();
         $CI->load->model('Purchases');
          $invoice = $CI->Purchases->invoice_edit($purchase_id);
    
          $invoice_detail = $CI->Purchases->invoice_detail_edit($purchase_id);
          $purchase_detail = $CI->Purchases->retrieve_packing_editdata($purchase_id);
       
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
    
          $currency_details = $CI->Web_settings->retrieve_setting_editdata();
          $get_invoice_product = $CI->Purchases->invoice_product_edit($purchase_id);
    
          $data['packinglist']=$purchase_detail;
        $data['invoice']=$invoice;
        $data['invoice_detail']=$invoice_detail;
        $data['invoice_product']=$get_invoice_product;
        $prodt = $CI->db->select('product_name,product_model,p_quantity')
        ->from('product_information')
        ->where('created_by',$get_invoice_product[0]['create_by'])
        ->get()
        ->result_array();
      $data=array(
        'packinglist'  =>$purchase_detail,
        'invoice'   => $invoice,
        'invoice_detail'   => $invoice_detail,
        'invoice_product'  => $get_invoice_product,
        'prodt'   =>  $prodt,
        'currency'   => $currency_details[0]['currency']

      );
   
        
    $packingedit  = $CI->parser->parse('purchase/editpackinglist', $data, true);
    return $packingedit;
    }

}



?>