<?php



if (!defined('BASEPATH'))

    exit('No direct script access allowed');



class Lproduct {

    /*

     * * Retrieve  Quize List From DB 

     */

    public function product_list($cat_id="")

    {

        $CI =& get_instance();

        $CI->load->model('Products');

        $CI->load->model('Web_settings');

        $company_info = $CI->Products->retrieve_company();
               $setting_detail = $CI->Web_settings->retrieve_setting_editdata();

        $data['total_product']    = $CI->Products->count_product();
        $data['products']    = $CI->Products->get_all_products_with_supplier();

        $data['company_info']     = $company_info;
        $data['sale_count']     = $CI->Products->sales_product_all();
        $data['expense_count']     = $CI->Products->expense_product_all();
        $data['category']= $CI->Products->get_products();
              $data['setting_detail']     = $setting_detail;


        if(isset($cat_id))
        $data['category_id'] = $cat_id;

        $productList = $CI->parser->parse('product/product',$data,true);

        return $productList;

    }








     public function product_view($id)
    {
        $CI =& get_instance();
        $CI->load->model('Products');
        $CI->load->model('Web_settings');
        $products = $CI->Products->retrieve_product_details($id);
     //   print_r($products);
        $prodt_info = $CI->Products->prodt_info();
        $product_details_pdv = $CI->Products->product_details_pdv($id);
         // print_r($product_details_pdv);
          $currency_details = $CI->Web_settings->retrieve_setting_editdata();
          if($products[0]['supplier_name']){
            $supplier_name = $CI->db->select('supplier_name')->from('supplier_information')->where('supplier_id',$products[0]['supplier_name'])->get()->row()->supplier_name;
          
            // print_r( $supplier_name);

      $supplier_price = $CI->db->select('supplier_price')->from('supplier_product')->where('supplier_id',$products[0]['supplier_name'])->get()->row()->supplier_price;
     
           }
    //       if($products[0]['category_id']){
    //           echo $products[0]['category_id'];
    //         $category_name = $CI->db->select('category_name')->from('product_category')->where('category_name',$products[0]['category_id'])->get()->row()->category_name;   
    //         echo  $category_name;die();
    // //  print_r($product_details_pdv);
    //       }
       $data ['currency']   = $currency_details[0]['currency'];
           $data['description_table']       = (isset($product_details_pdv[0]['description_table']) ? isset($product_details_pdv[0]['description_table']): NULL);

             $data['thickness']                  =(isset($product_details_pdv[0]['thickness']) ? isset($product_details_pdv[0]['thickness']): NULL); 
             $data['supplier_block_no']                    =(isset($product_details_pdv[0]['supplier_block_no']) ? isset($product_details_pdv[0]['supplier_block_no']): NULL);  
             $data['supplier_slab_no']                    = (isset($product_details_pdv[0]['supplier_slab_no']) ? isset($product_details_pdv[0]['supplier_slab_no']): NULL);  
            $data['g_width']                 = (isset($product_details_pdv[0]['g_width']) ? isset($product_details_pdv[0]['g_width']): NULL);
              $data['g_height']                 =(isset($product_details_pdv[0]['g_height']) ? isset($product_details_pdv[0]['g_height']): NULL);
             $data ['gross_sqft']                =(isset($product_details_pdv[0]['gross_sqft']) ? isset($product_details_pdv[0]['gross_sqft']): NULL); 
             $data ['bundle_no']                 =(isset($product_details_pdv[0]['bundle_no']) ? isset($product_details_pdv[0]['bundle_no']): NULL);  
             $data ['n_width' ]                = (isset( $product_details_pdv[0]['n_width']) ? isset( $product_details_pdv[0]['n_width']): NULL); 
             $data ['n_height']                 =(isset(  $product_details_pdv[0]['n_height']) ? isset(  $product_details_pdv[0]['n_height']): NULL); 
            $data  ['net_sqft']                 = (isset( $product_details_pdv[0]['net_sqft']) ? isset(  $product_details_pdv[0]['net_sqft']): NULL); 
             $data ['cost_sqft']                 =(isset(  $product_details_pdv[0]['cost_sqft']) ? isset(  $product_details_pdv[0]['cost_sqft']): NULL); 
              $data['cost_slab']                 =(isset(  $product_details_pdv[0]['cost_perslab']) ? isset(  $product_details_pdv[0]['cost_perslab']): NULL); 
             $data ['sales_price_sqft']                 =(isset(  $product_details_pdv[0]['sales_price_sqft']) ? isset(  $product_details_pdv[0]['sales_price_sqft']): NULL); 
              $data['sales_slab_price']                 =(isset(  $product_details_pdv[0]['sales_slab_price']) ? isset(  $product_details_pdv[0]['sales_slab_price']): NULL); 
              $data['weight']                 = (isset(  $product_details_pdv[0]['weight']) ? isset(  $product_details_pdv[0]['weight']): NULL);
             $data ['origin']                 =(isset(  $product_details_pdv[0]['origin']) ? isset(  $product_details_pdv[0]['origin']): NULL); 
              $data['total_amt']                 =(isset(  $product_details_pdv[0]['total_amt']) ? isset(  $product_details_pdv[0]['total_amt']): NULL); 
               $data['notes']                 = (isset(  $product_details_pdv[0]['notes']) ? isset(  $product_details_pdv[0]['notes']): NULL);
                $data ['block']                 =(isset(  $product_details_pdv[0]['block']) ? isset(  $product_details_pdv[0]['block']): NULL); 
            $data ['category_name']  = (isset(  $product_details_pdv[0]['category_id']) ? isset(  $product_details_pdv[0]['category_id']): NULL);
             $data['all_product_detail']     = $product_details_pdv;
             $data['product_info']     =  $products;
             $data['supplier_name']   = (isset($supplier_name) ? isset($supplier_name): NULL); 
             $data['supplier_price']  = (isset($supplier_price) ? isset($supplier_price): NULL) ;
            
             $data['supplier_name1']   =(isset($supplier_name) ? isset($supplier_name): NULL); 
       //  $data['products']=$products;
        $data['sale_history']     = $CI->Products->get_sales_product_history($product_details_pdv[0]['product_id']);
        $data['expense_history']     = $CI->Products->get_expense_product_history($product_details_pdv[0]['product_id']);
         $data['sale_count']     = $CI->Products->sales_product_all();
        $data['expense_count']     = $CI->Products->expense_product_all();
  
             $data['setting_detail']  = $CI->Web_settings->retrieve_setting_editdata();

        $productList = $CI->parser->parse('product/product-details',$data,true);
        return $productList;
             }



    //Sub Category Add
/*
    public function product_add_form() {

        $CI = & get_instance();

        $CI->load->model('Products');

        $CI->load->model('Suppliers');

        $CI->load->model('Categories');

        $CI->load->model('Units');

        $supplier      = $CI->Suppliers->supplier_list("110", "0");

        $category_list = $CI->Categories->category_list_product();

        $unit_list     = $CI->Units->unit_list();

      

        $taxfield = $CI->db->select('tax_name,default_value')

                ->from('tax_settings')

                ->get()

                ->result_array();        

        $data = array(

            'title'        => display('add_product'),

            'supplier'     => $supplier,

            'category_list'=> $category_list,

            'unit_list'    => $unit_list,

            'taxfield'     => $taxfield

        );

        $productForm = $CI->parser->parse('product/add_product_form', $data, true);

        return $productForm;

    }

*/
public function product_add_form() {
    $CI = & get_instance();
    $CI->load->model('Products');
    $CI->load->model('Suppliers');
    $CI->load->model('Categories');
    $CI->load->model('Units');
    $CI->load->model('Web_settings');
   $currency_details = $CI->Web_settings->retrieve_setting_editdata();
    $supplier      = $CI->Suppliers->supplier_list("110", "0");
    $category_list = $CI->Categories->category_list_product();
    $product_no = $CI->Products->product_id_number();
    $unit_list     = $CI->Units->unit_list();
    
               $setting_detail = $CI->Web_settings->retrieve_setting_editdata();

    
    $taxfield = $CI->db->select('tax_name,default_value')
            ->from('tax_settings')
            ->get()
            ->result_array();
    $country_code = $CI->db->select('*')->from('country')->get()->result_array();            
        
    $data = array(
        'currency'     => $currency_details[0]['currency'],
        'title'        => display('add_product'),
        'product_no' => $product_no,
        'supplier'     => $supplier,
        'category_list'=> $category_list,
        'unit_list'    => $unit_list,
        'taxfield'     => $taxfield,
        'country_code' => $country_code,
                   'setting_detail' => $setting_detail

    );
    $productForm = $CI->parser->parse('product/add_product_form', $data, true);
    return $productForm;
}
    public function insert_product($data) {

        $CI = & get_instance();

        $CI->load->model('Products');

        $result = $CI->Products->product_entry($data);

        if ($result == 1) {

            return TRUE;

        } else {

            return FALSE;

        }

    }



    //Product Edit Data

  public function product_edit_data($product_id) {
        $CI = & get_instance();
        $CI->load->model('Products');
        $CI->load->model('Suppliers');
        $CI->load->model('Categories');
        $CI->load->model('Units');
        $CI->load->model('Web_settings');
        $product_detail = $CI->Products->retrieve_product_editdata($product_id);
     //   print_r( $product_detail );
        $supplier_product_detail = $CI->Products->supplier_product_editdata($product_id);
        @$supplier_id = $product_detail[0]['supplier_id'];
        $product_table = $CI->Products->product_table($product_id);
                            //   retrieve_product_editdata($product_id)
           $getdata_info = $CI->Products-> retrieve_product_datas($product_id);
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
 //print_r($product_table);
        @$category_id = $product_detail[0]['category_id'];
        $supplier_list = $CI->Suppliers->supplier_list();
        $supplier_selected = $CI->Products->supplier_selected($product_id);
        $category_list = $CI->Categories->category_list_product();
        $unit_list = $CI->Units->unit_list();
        $category_selected = $CI->Categories->category_search_item($product_detail[0]['category_id']);
        $setting_detail = $CI->Web_settings->retrieve_setting_editdata();
   $supplierid='';
      if(!empty($product_detail[0]['supplier_name'])){
                  $supplierid = $CI->db->select('supplier_name')->from('supplier_information')->where('supplier_id',$product_detail[0]['supplier_name'])->get()->row()->supplier_name;
      }        //  echo $this->db->last_query();die();
          $taxfield = $CI->db->select('tax_name,default_value')
                ->from('tax_settings')
                ->get()
                ->result_array();
                 $i = 0;
                 $sup_names = $CI->Suppliers->supplier_list();
                 $i = 0;
//  print_r( $sup_names);
  $data['supid']    = $supplierid;
          $data['sup_names_dropdown']    = $sup_names;
            $data['supplier_list']    = $supplier_list;
            $data['supplier_selected']= $supplier_selected;
            $data['unit_list']        = $unit_list;
            $data['category_list']    = $category_list;
            $data['category_name'] =$product_detail[0]['category_id'];
            $data['currency']  = $currency_details[0]['currency'];
            $data['product_detail']=$product_detail;
             $data['supplier_product_data'] = $supplier_product_detail;
            //  $data['product_sub_category'] = $product_detail[0]['product_sub_category'];
             $data['category_id']= $product_detail[0]['category_id'];
             $data['unit']             = $product_detail[0]['unit'];
             $data['price'] = $product_detail[0]['price'];
             $data['product_model'] = $product_detail[0]['product_model'];
             $data['product_name']  = $product_detail[0]['product_name'];
             $data['serial_no'] = $product_detail[0]['serial_no'];
             $data['p_quantity'] = $product_detail[0]['p_quantity'];
             $data['account_subcat'] = $product_detail[0]['account_subcat'];
             $data['account_sub_category'] =$product_detail[0]['account_sub_category'];
             $data['account_category'] = $product_detail[0]['account_category'];
             $data['country'] =$product_detail[0]['country'];
             $data['sub_category']          = $product_detail[0]['sub_category'];
             $data['oa_total']   = $product_detail[0]['oa_total'];
             $data['tax']   = $product_detail[0]['tax'];
             $data['product_details']   = $product_detail[0]['product_details'];
             $data['supplier_name']   = $product_detail[0]['supplier_name'];
             $data['description_table'] = (!empty($product_table[0]['description_table'])?$product_table[0]['description_table']:'') ;
             $data['thickness']   = (!empty($product_table[0]['thickness'])?$product_table[0]['thickness']:'') ; 
             $data['supplier_block_no']   = (!empty($product_table[0]['supplier_block_no'])?$product_table[0]['supplier_block_no']:'') ; 
             $data['supplier_slab_no']   = (!empty($product_table[0]['supplier_slab_no'])?$product_table[0]['supplier_slab_no']:'') ; 
             $data['gross_width']   = (!empty($product_table[0]['g_width'])?$product_table[0]['g_width']:'') ; 
             $data['gross_height']   = (!empty($product_table[0]['g_height'])?$product_table[0]['g_height']:'') ; 
             $data['gross_sq_ft']   = (!empty($product_table[0]['gross_sqft'])?$product_table[0]['gross_sqft']:'') ; 
             $data['bundle_no']   = (!empty($product_table[0]['bundle_no'])?$product_table[0]['bundle_no']:'') ; 
             $data['net_width']   = (!empty($product_table[0]['n_width'])?$product_table[0]['n_width']:'') ; 
             $data['net_height']   = (!empty($product_table[0]['n_height'])?$product_table[0]['n_height']:'') ; 
             $data['net_sq_ft']   = (!empty($product_table[0]['net_sqft'])?$product_table[0]['net_sqft']:'') ; 
             $data['weight']   = (!empty($product_table[0]['weight'])?$product_table[0]['weight']:'') ; 
             $data['origin']   = (!empty($product_table[0]['origin'])?$product_table[0]['origin']:'') ; 
             $data['total_amt']   = (!empty($product_table[0]['total_amt'])?$product_table[0]['total_amt']:'') ; 
             $data['product_id']   = (!empty($product_table[0]['product_id'])?$product_table[0]['product_id']:'') ;
             $data['cost_slab']   = (!empty($product_table[0]['cost_slab'])?$product_table[0]['cost_slab']:'') ;
             $data['cost_sqft']   = (!empty($product_table[0]['cost_sqft'])?$product_table[0]['cost_sqft']:'') ; 
             $data['oa_total']=(!empty($product_table[0]['oa_total'])?$product_table[0]['oa_total']:'') ; 
          //   $data['gtotal']=$product_detail[0]['gtotal'];
             $data['sales_price_sqft']   = (!empty($product_table[0]['sales_price_sqft'])?$product_table[0]['sales_price_sqft']:'') ;
             $data['sales_slab_price']   =(!empty($product_table[0]['sales_slab_price'])?$product_table[0]['sales_slab_price']:'') ; 
             $data['setting_detail']              =  $setting_detail;
             $data['data_products']              =  $product_table;
    //  print_r( $data );
        $chapterList = $CI->parser->parse('product/edit_product_form', $data, true);
        return $chapterList;
    }



    //Search Product

    public function product_search_list($product_id) {

        $CI = & get_instance();

        $CI->load->model('Products');

        $CI->load->model('Web_settings');

        $products_list = $CI->Products->product_search_item($product_id);

        $all_product_list = $CI->Products->all_product_list();



        $i = 0;

        if ($products_list) {

            foreach ($products_list as $k => $v) {

                $i++;

                $products_list[$k]['sl'] = $i;

                 $products_list[$k]['serial'] =substr($products_list[$k]['serial_no'], 0, 20) . '...';

            }



            $currency_details = $CI->Web_settings->retrieve_setting_editdata();

            $data = array(

                'title'            => display('manage_product'),

                'products_list'    => $products_list,

                'all_product_list' => $all_product_list,

                'links'            => "",

                'currency'         => $currency_details[0]['currency'],

                'position'         => $currency_details[0]['currency_position'],

            );

            $productList = $CI->parser->parse('product/product', $data, true);

            return $productList;

        } else {

            redirect('Cproduct/manage_product');

        }

    }



    //Product Details

    public function product_details($product_id) {

        $CI = & get_instance();

        $CI->load->model('Products');

        $CI->load->library('occational');

        $CI->load->model('Web_settings');

        $details_info = $CI->Products->product_details_info($product_id);

        $purchaseData = $CI->Products->product_purchase_info($product_id);



        $totalPurchase = 0;

        $totalPrcsAmnt = 0;



        if (!empty($purchaseData)) {

            foreach ($purchaseData as $k => $v) {

                $purchaseData[$k]['final_date'] = $CI->occational->dateConvert($purchaseData[$k]['purchase_date']);

                $totalPrcsAmnt = ($totalPrcsAmnt + $purchaseData[$k]['total_amount']);

                $totalPurchase = ($totalPurchase + $purchaseData[$k]['quantity']);

            }

        }



        $salesData = $CI->Products->invoice_data($product_id);



        $totalSales = 0;

        $totaSalesAmt = 0;

        if (!empty($salesData)) {

            foreach ($salesData as $k => $v) {

                $salesData[$k]['final_date'] = $CI->occational->dateConvert($salesData[$k]['date']);

                $totalSales = ($totalSales + $salesData[$k]['quantity']);

                $totaSalesAmt = ($totaSalesAmt + $salesData[$k]['total_amount']);

            }

        }



        $packingListData = $CI->Products->packing_list_data($product_id);

print_r($packingListData);
        $totalHeight = 0;

        $totalWidth = 0;  


        // $totalSales = 0;

        // $totaSalesAmt = 0;

        if (!empty($packingListData)) {

            foreach ($packingListData as $k => $v) {



                $packingListData[$k]['invoice_date'] = $CI->occational->dateConvert($packingListData[$k]['invoice_date']);

                $totalHeight = ($totalHeight + $packingListData[$k]['height']);

                $totalWidth = ($totalWidth + $packingListData[$k]['width']);

            }

        }



        $stock = ($totalPurchase - $totalSales);

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();

        $data = array(

            'title'               => display('product_report'),

            'product_name'        => $details_info[0]['product_name'],

            'product_model'       => $details_info[0]['product_model'],

            'price'               => $details_info[0]['price'],

            'purchaseTotalAmount' => number_format($totalPrcsAmnt, 2, '.', ','),

            'salesTotalAmount'    => number_format($totaSalesAmt, 2, '.', ','),

            'img'                 => $details_info[0]['image'],

            'total_purchase'      => $totalPurchase,

            'total_sales'         => $totalSales,

            'purchaseData'        => $purchaseData,

            'salesData'           => $salesData,

            'packingListData'     => $packingListData,

            'stock'               => $stock,

            'product_statement'   => 'Cproduct/product_sales_supplier_rate/' . $product_id,

            'currency'            => $currency_details[0]['currency'],

            'position'            => $currency_details[0]['currency_position'],

        );



        $productList = $CI->parser->parse('product/product_details', $data, true);

        return $productList;

    }



    //Product Details

    public function product_sales_supplier_rate($product_id, $startdate, $enddate) {

        $CI = & get_instance();

        $CI->load->model('Products');

        $CI->load->model('Web_settings');

        $CI->load->library('occational');



        //Product Summary

        $details_info = $CI->Products->product_details_info($product_id);

        $opening_balance = $CI->Products->previous_stock_data($product_id, $startdate);

        $salesData = $CI->Products->invoice_data_supplier_rate($product_id, $startdate, $enddate);



        $stock = $opening_balance[0]['quantity'];

        $totalIn = 0;

        $totalOut = 0;

        $totalstock = 0;

        $gtotal_sell = 0;

        $gtotal_purchase = 0;



        if (!empty($salesData)) {

            foreach ($salesData as $k => $v) {

                $salesData[$k]['fdate'] = $CI->occational->dateConvert($salesData[$k]['date']);



                if ($salesData[$k]['account'] == "a") {

                    $salesData[$k]['in'] = round($salesData[$k]['quantity'], 0);

                    $salesData[$k]['total_purchase'] = $salesData[$k]['total_price'];

                    $salesData[$k]['total_sell'] = 0;

                    $salesData[$k]['out'] = 0;

                    $stock = $stock + $salesData[$k]['out'] + $salesData[$k]['in'];

                    $totalIn += $salesData[$k]['in'];



                    $gtotal_purchase += $salesData[$k]['total_purchase'];

                } else {

                    $salesData[$k]['out'] = round($salesData[$k]['quantity'], 0);

                    $salesData[$k]['in'] = 0;

                    $stock = $stock + $salesData[$k]['out'] + $salesData[$k]['in'];

                    $totalOut += $salesData[$k]['out'];



                    $salesData[$k]['total_purchase'] = 0;

                    $salesData[$k]['total_sell'] = $salesData[$k]['total_price'];

                    $gtotal_sell += $salesData[$k]['total_sell'];

                }

                $salesData[$k]['stock'] = $stock;



                $totalstock = $salesData[$k]['stock'];

            }

        }

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();

        $company_info = $CI->Products->retrieve_company();



        $data = array(

            'title'             => display('product_statement'),

            'product_id'        => $details_info[0]['product_id'],

            'product_name'      => $details_info[0]['product_name'],

            'product_model'     => $details_info[0]['product_model'],

            'startdate'         => $startdate,

            'enddate'           => $enddate,

            'price'             => $details_info[0]['price'],

            'totalIn'           => $totalIn,

            'totalOut'          => $totalOut,

            'totalstock'        => $totalstock,

            'gtotal_sell'       => number_format($gtotal_sell, 2, '.', ','),

            'gtotal_purchase'   => number_format($gtotal_purchase, 2, '.', ','),

            'opening_balance'   => round($opening_balance[0]['quantity'], 0),

            'salesData'         => $salesData,

            'company_info'      => $company_info,

            'currency'          => $currency_details[0]['currency'],

            'position'          => $currency_details[0]['currency_position'],

        );

        $productList = $CI->parser->parse('product/product_sales_supplier_rate', $data, true);

        return $productList;

    }



}



?>