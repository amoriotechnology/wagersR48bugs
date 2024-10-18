<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cproduct extends CI_Controller {

    public $product_id;

    function __construct() {
        parent::__construct();
        $this->db->query('SET SESSION sql_mode = ""');
        $this->load->model('Suppliers');
        $this->load->model('Categories');
           $this->load->model('Units');
         $this->load->library('auth');
    }

    //Index page load
    public function index() {
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('lproduct');
        $content = $CI->lproduct->product_add_form();
        $this->template->full_admin_html_view($content);
    }
    
    
    
    
    
    
    
    
      public function product_info(){
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('lproduct');
        $CI->load->model('Products');
        $CI->load->model('Web_settings');

        $data['setting_detail'] = $CI->Web_settings->retrieve_setting_editdata();
        $data['list']  =$this->lproduct->product_list();
        $company_info = $CI->Products->retrieve_company();
        $data['getsupplier']      = $CI->Suppliers->get_all_supplier();
        $data['total_product']    = $CI->Products->count_product();
        $data['products']    = $CI->Products->product_info_report();
        $data['company_info']     = $company_info;
        $data['sale_count']     = $CI->Products->sales_product_all();
        $data['expense_count']     = $CI->Products->expense_product_all();
        $data['category']= $CI->Products->get_products();
        $content = $CI->parser->parse('report/product_report', $data, true);
        $this->template->full_admin_html_view($content);
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
      public function product_info_stock(){
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('lproduct');
        $CI->load->model('Products');

        $CI->load->model('Web_settings');

        $setting_detail = $CI->Web_settings->retrieve_setting_editdata();


        $data['list']  =$this->lproduct->product_list();
        $company_info = $CI->Products->retrieve_company();
        $data['getsupplier']      = $CI->Suppliers->get_all_supplier();
        $data['total_product']    = $CI->Products->count_product();
        $data['products']    = $CI->Products->product_info_report();
         $data['company_info']     = $company_info;

         $data['setting_detail']     = $setting_detail;


        $data['sale_count']     = $CI->Products->sales_product_all();
        $data['expense_count']     = $CI->Products->expense_product_all();
        $data['category']= $CI->Products->get_products();
        $content = $CI->parser->parse('report/product_stock', $data, true);
        $this->template->full_admin_html_view($content);
    }
    
    
    
    // Search Product

    public function searchproduct(){
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->model('Products');
        $search_items = $this->input->post('searchField');
        $result = $CI->Products->searchproduct_entry($search_items);
        // $this->template->full_admin_html_view($result);
        // $response = ['results' => $result];
        echo json_encode($result);
    }

    // unique product name

    public function uniqueproductname()
    {
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->model('Products');
        $uniqueproduct_name = $this->input->post('unique_pname');
        $uniqueproduct_model = $this->input->post('product_model');
        $uniquecategory_name = $this->input->post('category_name');
        $exists = $CI->Products->uniqueProductname($uniqueproduct_name, $uniqueproduct_model, $uniquecategory_name);
        // print_r($exists);
        // $this->template->full_admin_html_view($exists);
        // echo json_encode(['exists' => $exists]);
        // print_r($result); die();
        // echo json_encode($exists);
    }





    #==============product delete==============#

    public function product_delete_form($product_id)
    {
        $dataw['product_id'] = $this->input->post('product_id',TRUE);

        
        $result = $this->db->delete('product_information', array('product_id' => $product_id)); 

        $result2 = $this->db->delete('product_details', array('product_id' => $product_id)); 




        if ($result == true) {
           $this->session->set_userdata(array('message'=>display('successfully_delete')));
        }
        redirect('Cproduct/manage_product');
    }
















  public function delete_img()
    {
            $s = $this->input->post();
      // echo $s;die();

           $this->db->where('group_id', $group_id);

                unlink(base_url("uploads/".$group_picture));

                $this->db->delete('product_group', array('group_id' => $group_id));
    }
   
   
   
// public function insert_product_from_expense(){
//   //  echo "sss";
//         $CI = & get_instance();
//         $CI->auth->check_admin_auth();
//         $CI->load->model('Products');
           
//         $product_id = $this->input->post('product_id',TRUE);
//               $quantity = (!empty($this->input->post('quantity',TRUE))?$this->input->post('quantity',TRUE):1);
//               if($quantity<1){
//                   $quantity=1;
//               }
//               $check_product = $this->db->select('*')->from('product_information')->where('product_id',$product_id)->get()->num_rows();
//               $sup_price = $this->input->post('supplier_price',TRUE);
//               $s_id = $this->input->post('product_id',TRUE);
//               $product_model = $this->input->post('model',TRUE);
//               $date=date('d-m-Y');
//              //  $product_id= $this->input->post('product_id',TRUE);
//               $supplier_id= $this->input->post('supplier_id',TRUE);
//               $supplier_price= $this->input->post('price',TRUE);
//               $products_model= $this->input->post('model',TRUE);
//                   $supp_prd = array(
//                       'created_by'       =>  $this->session->userdata('user_id'),
//                       'product_id'     => $product_id,
//                       'supplier_id'    => $supplier_id,
//                       'supplier_price' => $supplier_price,
//                       'products_model' => $product_model,
//                   );
//                   // print_r($supp_prd);
//                     $purchase_id_1 = $this->db->where('product_id',$product_id);
//         $q=$this->db->get('supplier_product');
//         $row = $q->row_array();

//   if(!empty($row['product_id'])){
      
//          $this->db->where('product_id',$product_id);
    
//         $this->db->delete('supplier_product');
//   // echo $this->db->last_query();
//  $this->db->insert('supplier_product', $supp_prd);
//   // echo $this->db->last_query();
//   }   
//     else{
  
//  $this->db->insert('supplier_product', $supp_prd);
//  // echo $this->db->last_query();
 
//     }

                  
//           $thickness=$this->input->post('thickness',TRUE);
//             $desc =$this->input->post('description_table',TRUE);
//              $supplier_b_no=$this->input->post('supplier_block_no',TRUE);
//               $supplier_slab_no=$this->input->post('supplier_slab_no',TRUE);
//               $gross_width=$this->input->post('gross_width',TRUE);
//                 $gross_height=$this->input->post('gross_height',TRUE);
//                  $gross_sq_ft=$this->input->post('gross_sq_ft',TRUE);
//                   $bundle_no=$this->input->post('bundle_no',TRUE);
//                   $net_width=$this->input->post('net_width',TRUE);
//                     $net_height=$this->input->post('net_height',TRUE);
//                      $net_sq_ft=$this->input->post('net_sq_ft',TRUE);
//                       $cost_sq_ft=$this->input->post('cost_sq_ft',TRUE);
//                       $cost_sq_slab=$this->input->post('cost_sq_slab',TRUE);
//                         $sales_amt_sq_ft=$this->input->post('sales_amt_sq_ft',TRUE);
//                          $sales_slab_amt=$this->input->post('sales_slab_amt',TRUE);
//                           $weight=$this->input->post('weight',TRUE);
//                           $origin=$this->input->post('origin',TRUE);
//                             $total_amt=$this->input->post('total_amt',TRUE);
//                              $product_id=$product_id;
//                      $purchase_id_2 = $this->db->where('product_id',$product_id);
//         $q2=$this->db->get('product_details');
//         $row2 = $q2->row_array();

//   if(!empty($row2['product_id'])){
      
//          $this->db->where('product_id',$product_id);
    
//         $this->db->delete('product_details');
  
  
    
      
//   } 
   
//                   for ($i = 0, $n = count($thickness); $i < $n; $i++) {
//                       $prodt_name = $thickness[$i];
//           $data1 = array(
//                           'product_id'     => $product_id,
//                           'create_by'       =>  $this->session->userdata('user_id'),
//                           'thickness'           => $thickness[$i],
//                           'description_table'          => $desc[$i],
//                           'supplier_block_no'               => $supplier_b_no[$i],
//                           'supplier_slab_no'           => $supplier_slab_no[$i],
//                           'total_amt'  => $total_amt[$i],
//                           'g_width'       => $gross_width[$i],
//                           'g_height'                => $gross_height[$i],
//                           'gross_sqft'        => $gross_sq_ft[$i],
//                           'bundle_no'         => $bundle_no[$i],
//                           'n_width'      => $net_width[$i],
//                           'n_height'        => $net_height[$i],
//                           'net_sqft'       => $net_sq_ft[$i],
//                           'cost_sqft'                => $cost_sq_ft[$i],
//                           'cost_slab'        => $cost_sq_slab[$i],
//                           'sales_price_sqft'         => $sales_amt_sq_ft[$i],
//                           'sales_slab_price'      => $sales_slab_amt[$i],
//                             'weight'        => $weight[$i],
//                             'origin'        => $origin[$i],
//                             'status'             => 1
//                       );
                      

//                      //  $this->db->insert('product_details', $data1);
//                      $where = array('product_id ' => $product_id , 'bundle_no' =>  $bundle_no[$i]);
//                               $purchase_id_4 = $this->db->where($where);
//         $q3=$this->db->get('product_information');
//         $row3 = $q3->row_array();

//   if(!empty($row3['product_id']) && !empty($row3['bundle_no'])){
      
//          $this->db->where('product_id',$product_id);
//           $this->db->where('bundle_no',$bundle_no[$i]);
    
//         $this->db->delete('product_details');
   
//      $this->db->insert('product_details', $data1);
//     //  echo $this->db->last_query();
 
//   } else{
//       $this->db->insert('product_details', $data1);
//   //  echo $this->db->last_query();

//   }
//                 }
//               $price = $this->input->post('price',TRUE);
//               $tax_percentage = $this->input->post('tax',TRUE);
//         //       $tablecolumn = $this->db->list_fields('tax_collection');
//         //       $num_column = count($tablecolumn)-4;
//         //       if($num_column > 0){
//         //       $taxfield = [];
//         //       for($i=0;$i<$num_column;$i++){
//         //       $taxfield[$i] = 'tax'.$i;
//         //       }
//         //       foreach ($taxfield as $key => $value) {
//         //       $dataa[$value] = $this->input->post($value)/100;
//         //       }
//         //   }
//              $serial_no=substr(time(),-7,-1);
//               if($this->input->post('serial_no',TRUE)){
//           $serial_no=$this->input->post('serial_no',TRUE);
//       }

//   $data['barcode']          = $this->input->post('barcode',TRUE);
//           $data['product_id']   = $product_id;
//           $data['created_by']   = $this->session->userdata('user_id');
//           $data['product_name'] = $this->input->post('product_name',TRUE);
//           $data['category_id']  = $this->input->post('category_id',TRUE);
//           $data['unit']         = $this->input->post('unit',TRUE);
//           $data['product_sub_category']          = $this->input->post('product_sub_category',TRUE);
//           $data['account_category_name']          = $this->input->post('account_category_name',TRUE);
//           $data['account_sub_category']          = $this->input->post('account_sub_category',TRUE);
//           $data['account_category']          = $this->input->post('account_category',TRUE);
//           $data['country']          = $this->input->post('country',TRUE);
//           $data['sub_category']          = $this->input->post('sub_category',TRUE);
//           $data['oa_total']          = $this->input->post('oa_total',TRUE);
//         //   $data['gtotal']          = $this->input->post('gtotal',TRUE);
//           $data['supplier_name']          = $this->input->post('supplier_id',TRUE);
//           $data['tax']          = $this->input->post('tax',TRUE);
//           $data['p_quantity']   = $quantity;
//           $data['serial_no']    = $serial_no;
//           $data['price']        = $price;
//           $data['product_model']= $this->input->post('model',TRUE);
//           $data['product_details'] = $this->input->post('description',TRUE);
//           // $data['image']        = '../../my-assets/image/product/'.$_FILES['product_image']['name'];
//           $data['status']      = 1;
          
//               $purchase_id_3 = $this->db->where('product_id',$product_id);
//         $q3=$this->db->get('product_information');
//         $row3 = $q3->row_array();

//   if(!empty($row3['product_id'])){
      
//          $this->db->where('product_id',$product_id);
    
//         $this->db->delete('product_information');
   
//      $this->db->insert('product_information', $data);
//     //  echo $this->db->last_query();
 
//   } else{
//       $this->db->insert('product_information', $data);
//     // echo $this->db->last_query();

//   }

//   echo json_encode($data);
//   }




  
public function insert_product_from_expense(){

//   echo "sss"; die();
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->model('Products');
           
        $product_id = $this->input->post('product_id',TRUE);
               $quantity = (!empty($this->input->post('quantity',TRUE))?$this->input->post('quantity',TRUE):1);
              if($quantity<1){
                  $quantity=1;
              }
               $check_product = $this->db->select('*')->from('product_information')->where('product_id',$product_id)->get()->num_rows();
               $sup_price = $this->input->post('supplier_price',TRUE);
               $s_id = $this->input->post('product_id',TRUE);
               $product_model = $this->input->post('model',TRUE);
               $date=date('d-m-Y');
             //  $product_id= $this->input->post('product_id',TRUE);
               $supplier_id= $this->input->post('supplier_id',TRUE);
               $supplier_price= $this->input->post('price',TRUE);
               $products_model= $this->input->post('model',TRUE);
                   $supp_prd = array(
                       'created_by'       =>  $this->session->userdata('user_id'),
                       'product_id'     => $product_id,
                       'supplier_id'    => $supplier_id,
                       'supplier_price' => $supplier_price,
                       'products_model' => $product_model,
                   );
                //  print_r($supp_prd); die();




                    $purchase_id_1 = $this->db->where('product_id',$product_id);
        $q=$this->db->get('supplier_product');
        $row = $q->row_array();

   if(!empty($row['product_id'])){
      
         $this->db->where('product_id',$product_id);
    
        $this->db->delete('supplier_product');
  // echo $this->db->last_query();
 $this->db->insert('supplier_product', $supp_prd);
  // echo $this->db->last_query();
  }   
    else{
  
 $this->db->insert('supplier_product', $supp_prd);
 // echo $this->db->last_query();
 
    }

                  
           $thickness=$this->input->post('thickness',TRUE);
            $desc =$this->input->post('description_table',TRUE);
             $supplier_b_no=$this->input->post('supplier_block_no',TRUE);
              $supplier_slab_no=$this->input->post('supplier_slab_no',TRUE);
               $gross_width=$this->input->post('gross_width',TRUE);
                $gross_height=$this->input->post('gross_height',TRUE);
                 $gross_sq_ft=$this->input->post('gross_sq_ft',TRUE);
                  $bundle_no=$this->input->post('bundle_no',TRUE);
                   $net_width=$this->input->post('net_width',TRUE);
                    $net_height=$this->input->post('net_height',TRUE);
                     $net_sq_ft=$this->input->post('net_sq_ft',TRUE);
                      $cost_sq_ft=$this->input->post('cost_sq_ft',TRUE);
                       $cost_sq_slab=$this->input->post('cost_sq_slab',TRUE);
                        $sales_amt_sq_ft=$this->input->post('sales_amt_sq_ft',TRUE);
                         $sales_slab_amt=$this->input->post('sales_slab_amt',TRUE);
                          $weight=$this->input->post('weight',TRUE);
                           $origin=$this->input->post('origin',TRUE);
                            $total_amt=$this->input->post('total_amt',TRUE);
                            
                             $product_id=$product_id;
                     $purchase_id_2 = $this->db->where('product_id',$product_id);
        $q2=$this->db->get('product_details');
        $row2 = $q2->row_array();

   if(!empty($row2['product_id'])){
      
         $this->db->where('product_id',$product_id);
    
        $this->db->delete('product_details');
  
  
    
      
  } 
   
                   for ($i = 0, $n = count($thickness); $i < $n; $i++) {
                       $prodt_name = $thickness[$i];
           $data1 = array(
                           'product_id'     => $product_id,
                           'create_by'       =>  $this->session->userdata('user_id'),
                           'thickness'           => trim($thickness[$i]),
                           'description_table'          => trim($desc[$i]),
                           'supplier_block_no'               => trim($supplier_b_no[$i]),
                           'supplier_slab_no'           => trim($supplier_slab_no[$i]),
                           'total_amt'  => trim($total_amt[$i]),
                           'g_width'       => trim($gross_width[$i]),
                           'g_height'                => trim($gross_height[$i]),
                           'gross_sqft'        => trim($gross_sq_ft[$i]),
                           'bundle_no'         => trim($bundle_no[$i]),
                           'n_width'      => trim($net_width[$i]),
                           'n_height'        => trim($net_height[$i]),
                          'net_sqft'       => trim($net_sq_ft[$i]),
                           'cost_sqft'                => trim($cost_sq_ft[$i]),
                           'cost_slab'        => trim($cost_sq_slab[$i]),
                           'sales_price_sqft'         => trim($sales_amt_sq_ft[$i]),
                           'sales_slab_price'      => trim($sales_slab_amt[$i]),
                            'weight'        => trim($weight[$i]),
                            'origin'        => trim($origin[$i]),
                            
                            'status'             => 1
                       );
                      

                       $this->db->insert('product_details', $data1);
                     
                  // echo $this->db->last_query();
                }
               $price = $this->input->post('price',TRUE);
               $tax_percentage = $this->input->post('tax',TRUE);
        //       $tablecolumn = $this->db->list_fields('tax_collection');
        //       $num_column = count($tablecolumn)-4;
        //       if($num_column > 0){
        //       $taxfield = [];
        //       for($i=0;$i<$num_column;$i++){
        //       $taxfield[$i] = 'tax'.$i;
        //       }
        //       foreach ($taxfield as $key => $value) {
        //       $dataa[$value] = $this->input->post($value)/100;
        //       }
        //   }
             $serial_no=substr(time(),-7,-1);
              if($this->input->post('serial_no',TRUE)){
           $serial_no=$this->input->post('serial_no',TRUE);
       }

           $data['barcode']          = $this->input->post('barcode',TRUE);
           $data['product_id']   = $product_id;
           $data['created_by']   = $this->session->userdata('user_id');
           $data['product_name'] = $this->input->post('product_name',TRUE);
           $data['category_id']  = $this->input->post('category_id',TRUE);
           $data['unit']         = $this->input->post('unit',TRUE);
       
           $data['country']          = $this->input->post('country',TRUE);
           $data['sub_category']          = $this->input->post('sub_category',TRUE);
          $data['oa_total']          = $this->input->post('oa_total',TRUE);
           $data['supplier_name']          = $this->input->post('supplier_id',TRUE);
           $data['tax']          = $this->input->post('tax',TRUE);
           
           $data['account_category']  = $this->input->post('account_category',TRUE);
           $data['account_sub_category']          = $this->input->post('account_sub_category',TRUE);
           $data['account_subcat'] = $this->input->post('account_subcat',TRUE);
           $data['p_quantity']   = $quantity;
           $data['serial_no']    = $serial_no;
           $data['price']        = $price;
           $data['product_model']= $this->input->post('model',TRUE);
           $data['product_details'] = $this->input->post('description',TRUE);
          
           $data['status']      = 1;
          
           $data['cost_persqft']= $cost_sq_ft[0];
           $data['cost_perslab']= $cost_sq_slab[0];
           $data['sales_pricepersqft']= $sales_amt_sq_ft[0];
           $data['sales_slabprice']= $sales_slab_amt[0];
          
          
          
          
          
          
              $purchase_id_3 = $this->db->where('product_id',$product_id);
        $q3=$this->db->get('product_information');
        $row3 = $q3->row_array();

   if(!empty($row3['product_id'])){
      
         $this->db->where('product_id',$product_id);
    
        $this->db->delete('product_information');
   
     $this->db->insert('product_information', $data);
    //   echo $this->db->last_query();die();
 
  } else{
       $this->db->insert('product_information', $data);
    //  echo $this->db->last_query();die();

  }

  echo json_encode($data);
   }














public function insert_product() {
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('lproduct');
        $CI->load->model('Products');
      
        $quantity = (!empty($this->input->post('quantity',TRUE))?$this->input->post('quantity',TRUE):1);
        if($quantity<1){
            $quantity=1;
        }
        $sup_price = $this->input->post('supplier_price',TRUE);
       $product_id = $this->generator(10);
        $s_id = $this->input->post('supplier_id',TRUE);
      //  echo $s_id;
        $product_model = $this->input->post('model',TRUE);
            $supp_prd = array(
                'created_by'       =>  $this->session->userdata('user_id'),
                'product_id'     => $product_id,
                'supplier_id'    => $s_id,
                'supplier_price' => $sup_price,
                'products_model' => $product_model = $this->input->post('model',TRUE)
            );
            $this->db->insert('supplier_product', $supp_prd);
        $price = $this->input->post('price',TRUE);
        $tax_percentage = $this->input->post('tax',TRUE);
        // $tax = $tax_percentage / 100;
        $tablecolumn = $this->db->list_fields('tax_collection');
        $num_column = count($tablecolumn)-4;
        if($num_column > 0){
       $taxfield = [];
       for($i=0;$i<$num_column;$i++){
        $taxfield[$i] = 'tax'.$i;
       }
       foreach ($taxfield as $key => $value) {
        $dataa[$value] = $this->input->post($value)/100;
       }
    }
        $serial_no=substr(time(),-7,-1);
        if($this->input->post('serial_no',TRUE)){
        $serial_no=$this->input->post('serial_no',TRUE);
    }
    $data['barcode']          = $this->input->post('barcode',TRUE);
 $data['product_id']   =$product_id;
    $data['created_by']   = $this->session->userdata('user_id');
    $data['product_name'] = $this->input->post('product_name',TRUE);
    $data['category_id']  = $this->input->post('category_id',TRUE);
    $data['unit']         = $this->input->post('unit',TRUE);
    $data['product_sub_category']          = $this->input->post('product_sub_category',TRUE);
    $data['account_category_name']          = $this->input->post('account_category_name',TRUE);
    $data['account_sub_category']          = $this->input->post('account_sub_category',TRUE);
    $data['account_category']          = $this->input->post('account_category',TRUE);
    $data['country']          = $this->input->post('country',TRUE);
    $data['sub_category']          = $this->input->post('sub_category',TRUE);
    // $data['oa_total']          = $this->input->post('oa_total',TRUE);
    // $data['gtotal']          = $this->input->post('gtotal',TRUE);
    $data['supplier_name']          = $this->input->post('supplier_id',TRUE);
    $data['tax']          = $this->input->post('tax',TRUE);
    $data['p_quantity']   = $quantity;
    $data['serial_no']    = $serial_no;
    $data['price']        = $price;
    $data['product_model']= $this->input->post('model',TRUE);
    $data['cost_persqft'] = $this->input->post('costpersqft',TRUE);
    $data['cost_perslab'] = $this->input->post('costperslab',TRUE);
    $data['sales_pricepersqft'] = $this->input->post('salespricepersqft',TRUE);
    $data['sales_slabprice'] = $this->input->post('salesslabprice',TRUE);
    $data['product_details'] = $this->input->post('description',TRUE);
   // $data['image']        = '../../my-assets/image/product/'.$_FILES['product_image']['name'];
    $data['status']      = 1;
   $purchase_id_3 = $this->db->where('product_id',$product_id);
 $q3=$this->db->get('product_information');
 $row3 = $q3->row_array();
if(!empty($row3['product_id'])){
  $this->db->where('product_id',$product_id);
 $this->db->delete('product_information');
//   echo $this->db->last_query();
$this->db->insert('product_information', $data);
 //echo $this->db->last_query();
} else{
$this->db->insert('product_information', $data);
//echo $this->db->last_query();
}
   $all_product = $CI->Products->get_all_products();
echo json_encode($all_product);
}




















            //Insert category and upload
            public function insert_instant_cat() {
                $category_id = $this->auth->generator(15);
                $data = array(
                    'created_by'       =>  $this->session->userdata('user_id'),
                    'category_id'   => $category_id,
                    'category_name' => $this->input->post('category_name',TRUE),
                    'status'        => 1
                );
               //   print_r($data); die();
                $result = $this->Categories->category_entry($data);
                echo json_encode( $result);
            }


            public function insert_instant_unit() {
                $unit_id = $this->auth->generator(15);
                $data = array(
                    'created_by'  =>  $this->session->userdata('user_id'),
                    'unit_id'   => $unit_id,
                    'unit_name' => $this->input->post('unit_name',TRUE),
                    'status'    => 1
                );
                $result = $this->Units->insert_unit($data);
                  echo json_encode( $result);
            }

    //Product Update Form
    public function product_update_form($product_id) {
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('lproduct');
        $content = $CI->lproduct->product_edit_data($product_id);
        $this->template->full_admin_html_view($content);
    }

    // Product Update
    public function product_update() {
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->model('Products');

        $product_id = $this->input->post('product_id',TRUE);
        $quantity = (!empty($this->input->post('quantity',TRUE))?$this->input->post('quantity',TRUE):1);
        if($quantity<1){
            $quantity=1;
        }
        $this->db->where('product_id', $product_id);
        $this->db->delete('supplier_product');
        $sup_price = $this->input->post('supplier_price',TRUE);
        $s_id = $this->input->post('supplier_id',TRUE);
        for ($i = 0, $n = count($s_id); $i < $n; $i++) {
            $supplier_price = $sup_price[$i];
            $supp_id = $s_id[$i];

            $supp_prd = array(
                'created_by'       =>  $this->session->userdata('user_id'),
                'product_id'     => $product_id,
                'supplier_id'    => $supp_id,
                'supplier_price' => $supplier_price
            );

            $this->db->insert('supplier_product', $supp_prd);
        }
        // configure for upload 
        $config = array(
            'upload_path'   => "./my-assets/image/product/",
            'allowed_types' => "png|jpg|jpeg|gif|bmp|tiff",
            'overwrite'     => TRUE,
             'encrypt_name' => TRUE,
            'max_size'      => '0',
        );
        $image_data = array();
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('image')) {
            $image_data = $this->upload->data();
            $image_name = base_url() . "my-assets/image/product/" . $image_data['file_name'];
            $config['image_library'] = 'gd2';
            $config['source_image'] = $image_data['full_path']; 
            $config['maintain_ratio'] = TRUE;
            $config['height'] = '100';
            $config['width'] = '100';
            $this->load->library('image_lib', $config);
            $this->image_lib->clear();
            $this->image_lib->initialize($config);
            if (!$this->image_lib->resize()) {
                echo $this->image_lib->display_errors();
            }
        } else {
            $image_name = $this->input->post('old_image',TRUE);
        }


        $price = $this->input->post('price',TRUE);
       
        $tablecolumn = $this->db->list_fields('tax_collection');
        $num_column = count($tablecolumn)-4;
        if($num_column > 0){
       $taxfield = [];
       for($i=0;$i<$num_column;$i++){
        $taxfield[$i] = 'tax'.$i;
       }
       foreach ($taxfield as $key => $value) {
        $dataa[$value] = $this->input->post($value)/100;
       }
    }
            $data['product_name']   = $this->input->post('product_name',TRUE);
            $data['category_id']    = $this->input->post('category_id',TRUE);
            $data['price']          = $price;
            $data['serial_no']      = $this->input->post('serial_no',TRUE);
            $data['product_model']  = $this->input->post('model',TRUE);
            $data['product_details']= $this->input->post('description',TRUE);
            $data['unit']           = $this->input->post('unit',TRUE);
            $data['p_quantity']     = $quantity;
            $data['tax']            = 0;
            $data['image']          = $image_name;
       
        $result = $CI->Products->update_product($data, $product_id);
        if ($result == true) {
            $this->session->set_userdata(array('message' => display('successfully_updated')));
            redirect(base_url('Cproduct/manage_product'));
        } else {
            $this->session->set_userdata(array('error_message' => display('product_model_already_exist')));
            redirect(base_url('Cproduct/manage_product'));
        }
    }

    //Manage Product
    public function manage_product()
    {   
        $category_id = $this->uri->segment(3);
        echo $category_id;
        if(isset($category_id))
        {
        $CI =& get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lproduct');
        $CI->load->model('Products');
        $content =$this->lproduct->product_list($category_id);
        $this->template->full_admin_html_view($content);
        }  
        else{
        $CI =& get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lproduct');
        $CI->load->model('Products');
        $content =$this->lproduct->product_list();
        $this->template->full_admin_html_view($content);
        }  
      

    
    }




    public function scrape(){
      
        $this->load->library('simple_html_dom');
$html = file_get_html('https://www.x-rates.com/table/?from=USD&amount=1');
foreach($html->find('table.table-dark') as $elements) {
    // echo $elements->plaintext;
    $output = preg_replace('!\s+!', ' ', $elements->plaintext);
    $output = str_replace("Today's Best Exchange Rate Currency Buy Rate Sell Rate","",$output);
  
     //break;
 }
 $se = explode(' ', $output);
 $s = '';
 
 $i = 0;
 while ($i < count($se)) {
     $i++;
     $s .= $se[$i+1];
     if ($i !== count($se)) {
         if ($i%3 == 0) {
             $s .= '\n';
         } else {
             $s .= ' ';
         }
     }
 }
 $split = explode('\n', $s);
 foreach ($split as $spl){
 $val=explode(' ', $spl);
  $dat=array(
'currency' => $val[0],
'buy'  => $val[1],
'sell' => $val[2]

    );
    $this->db->insert('currency_details',$dat);
    echo json_encode($dat);
 }

}
   // }
    public function get_all_tax(){
        $CI = & get_instance();
        $taxfield = $CI->db->select('tax_id,tax')
        ->from('tax_information')
        ->get()
        ->result_array();
       echo json_encode($taxfield);
    }
public function product_details_edit()
{
//    var_dump($_FILES['image']['tmp_name']);
//    var_dump($_FILES['image']['name']);
//   die();
 $id =$this->input->post('id',TRUE);
        $desc =$this->input->post('description',TRUE);
         $notes=$this->input->post('notes',TRUE);
      
                  $block=$this->input->post('block',TRUE);
                    $product_id=$this->input->post('product_id',TRUE);
                                for ($i = 1, $n = count($desc); $i < $n; $i++) {



                                }
               for ($i = 0, $n = count($desc); $i < $n; $i++) {
                // print_r($i); die();
                 $target_path=$_SERVER['DOCUMENT_ROOT'].'/Stockeai/my-assets/image/product/';
    $file='';
if (file_exists($_FILES['image']['tmp_name'][$i]) || is_uploaded_file($_FILES['image']['tmp_name'][$i])) {

//$filename = $_FILES['image']['name'];


// If no errors, upload the file
  $target=$_SERVER['DOCUMENT_ROOT'].'/Stockeai/my-assets/image/product/';  // example.com/entities/
//$target = "../fisiere_pub/"; //choose your upload folder
move_uploaded_file($_FILES["image"]["tmp_name"][$i], $target. $_FILES["image"]["name"][$i]);
$file = $target . $_FILES["image"]["name"][$i];

       $data1 = array(
                       'block'   => $block[$i],
                        'img' => '../../my-assets/image/product/'.$_FILES["image"]["name"][$i],
                       'notes'   =>$notes[$i],
                    //  'create_by'      => $this->session->userdata('user_id')
                   );
                       print_r($data1);
                                    $this->db->where("description_table",$desc[$i]);
                                    $this->db->where("id",$id[$i]);
                    $this->db->where("product_id",$product_id[$i]);
$this->db->update("product_details",$data1);  
                }else{
$data1 = array(
                       'block'   => $block[$i],
                       
                       'notes'   =>$notes[$i],
                    //  'create_by'      => $this->session->userdata('user_id')
                   );
                   print_r($data1);
                 $this->db->where("description_table",$desc[$i]);
                   $this->db->where("id",$id[$i]);
                    $this->db->where("product_id",$product_id[$i]);
$this->db->update("product_details",$data1);  
                }
              

                 //  $this->db->insert('product_details', $data1);
                }
               

}

    public function product_view($id)
    {
         $CI =& get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lproduct');
     $content =$this->lproduct->product_view($id);
        $this->template->full_admin_html_view($content);
    }








    
    public function get_all_product1(){
        $CI = & get_instance();
        $prodt = $CI->db->select('product_name,product_model,p_quantity')
            ->from('product_information')
            ->get()
            ->result_array();
         
       echo json_encode($prodt);
    }
public function get_all_product(){
    $CI = & get_instance();
    $prodt = $CI->db->select('product_name,product_model,p_quantity')
        ->from('product_information')
        ->get()
        ->result_array();
 
        $data2 = array(
           
            'product'           => $prodt,
           
        );
        $invoiceForm1 = $CI->parser->parse('invoice/add_invoice_form', $data2, true);
     //   $invoiceForm1 = $CI->parser->parse('invoice/profarma_invoice', $data2, true);
        return $invoiceForm1;
}
    public function CheckProductList(){
        // GET data
        $this->load->model('Products');
        $postData = $this->input->post();
        
        $data = $this->Products->getProductList($postData);
        $content = $CI->parser->parse('invoice/add_invoice_form', $data, true);
        $content = $CI->parser->parse('invoice/profarma_invoice', $data, true);
      ///  echo json_encode($data);
      return $content;
    } 
    //Add Product CSV
    public function add_product_csv() {
        $CI = & get_instance();
          
        $data = array(
            'title' => display('add_product_csv')
        );
        $content = $CI->parser->parse('product/add_product_csv', $data, true);
        $this->template->full_admin_html_view($content);
    }

    //CSV Upload File
    function uploadCsv()
    {
         $this->load->model('suppliers');
             $CI = & get_instance();
    $CI->load->model('Products');
         $filename = $_FILES['upload_csv_file']['name'];  
        //$ext = end(explode('.', $filename));
        $ext = substr(strrchr($filename, '.'), 1);

        if($ext == 'csv'){
        $count=0;
        $fp = fopen($_FILES['upload_csv_file']['tmp_name'],'r') or die("can't open file");

        if (($handle = fopen($_FILES['upload_csv_file']['tmp_name'], 'r')) !== FALSE)
        {
  
  // $head = fgetcsv($fp, 4096, ';', '"');
         while($csv_line = fgetcsv($fp,1024)){
                
                //keep this if condition if you want to remove the first row
                for($i = 0, $j = count($csv_line); $i < $j; $i++)
                {      
                           
               $product_id = $this->generator(10);
                                         
                  $insert_csv = array();
                    //    $insert_csv['product_id']=      if(!empty($product_no[0]['number'])){
                    //                     $curYear = date('Y');
                    //                     $month = date('m');
                    //                 $vn = substr($product_no[0]['number'],9)+1;
                    //                 echo $voucher_n = 'PI'. $curYear.$month.'-'.$vn;
                    //                 }else{
                    //                         $curYear = date('Y');
                    //                     $month = date('m');
                    //                 echo $voucher_n = 'PI'. $curYear.$month.'-'.'1';
                    //                 }
                    $product_name=(!empty($csv_line[2])?$csv_line[2]:null);
                     $title= explode('-', $product_name);
                 $name=trim($title[0]);
if(empty($title[1])){
     $model='';
}else{
                   $model=trim($title[1]);
}
                  $insert_csv['supplier_id']    = (!empty($csv_line[1])?$csv_line[1]:null);
                  $insert_csv['product_name']   = $name;
                  $insert_csv['product_model']  = $model;
                  $insert_csv['category_id']    = (!empty($csv_line[3])?$csv_line[3]:null);
                  $insert_csv['price']          = (!empty($csv_line[4])?$csv_line[4]:null);
                  $insert_csv['supplier_price'] = (!empty($csv_line[5])?$csv_line[5]:null);
                    $insert_csv['Barcode'] = (!empty($csv_line[6])?$csv_line[6]:null);
                   $insert_csv['quantity'] = (!empty($csv_line[7])?$csv_line[7]:null);
                   $insert_csv['unit'] = (!empty($csv_line[8])?$csv_line[8]:null);
                   $insert_csv['Productsubcategory'] = (!empty($csv_line[9])?$csv_line[9]:null);
                   $insert_csv['Accountcategoryname'] = (!empty($csv_line[10])?$csv_line[10]:null);
                   $insert_csv['accountsubcategory'] = (!empty($csv_line[11])?$csv_line[11]:null);
                   $insert_csv['Sales_des'] = (!empty($csv_line[12])?$csv_line[12]:null);
                   $insert_csv['SKU'] = (!empty($csv_line[13])?$csv_line[13]:null);
                     $insert_csv['Type'] = (!empty($csv_line[14])?$csv_line[14]:null);
                      $insert_csv['Taxable'] = (!empty($csv_line[15])?$csv_line[15]:null);
                       $insert_csv['Income_Account'] = (!empty($csv_line[16])?$csv_line[16]:null);
                         $insert_csv['Purchase_Description'] = (!empty($csv_line[17])?$csv_line[17]:null);
                           $insert_csv['Expense_Account'] = (!empty($csv_line[18])?$csv_line[18]:null);
                             $insert_csv['Reorder_Point'] = (!empty($csv_line[19])?$csv_line[19]:null);
                               $insert_csv['Inventory_Asset_Account'] = (!empty($csv_line[20])?$csv_line[20]:null);
                                 $insert_csv['Quantity_as_of_Date'] = (!empty($csv_line[21])?$csv_line[21]:null);
                                  

        
                   
                }
                 $check_supplier = $this->db->select('*')->from('supplier_information')->where('supplier_name',$insert_csv['supplier_id'])->get()->row();
                if(!empty($check_supplier)){
                    $supplier_id = $check_supplier->supplier_id;
                }else{
                     $supplierinfo=array(
            'created_by'       =>  $this->session->userdata('user_id'),
            'supplier_name' => $insert_csv['supplier_id'],
            'address'           => '',
            'mobile'            => '',
            'details'           => '',
            'status'            => 1
            );
                     if ($count > 0) {
            $this->db->insert('supplier_information',$supplierinfo);
             echo $this->db->last_query();
        }
            $supplier_id = $this->db->insert_id();
            $coa = $this->suppliers->headcode();
        if($coa->HeadCode!=NULL){
            $headcode=$coa->HeadCode+1;
        }
        else{
            $headcode="50205000001";
        }
        $c_acc=$supplier_id.'-'.$insert_csv['supplier_id'];
        $createby=$this->session->userdata('user_id');
        $createdate=date('Y-m-d H:i:s');

       
         $supplier_coa = [
            'HeadCode'         => $headcode,
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

        if ($count > 0) {
        $this->db->insert('acc_coa',$supplier_coa);
    }
                }
if(!empty($insert_csv['category_id']) && $insert_csv['category_id']!="Category Name"){
        $check_category = $this->db->select('*')->from('product_category')->where('category_name',$insert_csv['category_id'])->get()->row();
     //   echo  $check_category;
        if(!empty($check_category)){
            $category_id = $check_category->category_id;
           
           
        }else{
            $category_id =   $this->auth->generator(15);
            $categorydata=array(
            'created_by'       =>  $this->session->userdata('user_id'),
            'category_id'           => $category_id,
            'category_name'         => $insert_csv['category_id'],
            'status'                => 1
            );
           
            if ($count > 0) {
        $this->db->insert('product_category',$categorydata);
       
}
        }
    }
    if(!empty($insert_csv['unit']) && $insert_csv['unit']!="Unit"){
        $check_unit = $this->db->select('*')->from('units')->where('unit_name', $insert_csv['unit'])->get()->row();
        if(!empty($check_unit)){
            $unit_id = $check_unit->unit_id;
        }else{
               $unit_id = $this->auth->generator(15);
        $unitdata = array(
            'created_by'  =>  $this->session->userdata('user_id'),
            'unit_id'   => $unit_id,
            'unit_name' => $insert_csv['unit'],
            'status'    => 1
        );

            if ($count > 0) {
        $this->db->insert('units',$unitdata);
       //  echo $this->db->last_query();
}
        }
    }
         $data = array(
                    'product_id'           =>  $product_id,
                    'created_by'       =>  $this->session->userdata('user_id'),
                  'p_quantity'    => $insert_csv['quantity'],
                    'category_id'   =>$insert_csv['category_id'],
                    'product_name'  => $insert_csv['product_name'],
                    'product_model' => $insert_csv['product_model'],
                    'price'         => $insert_csv['price'],
                    'unit'          =>  $insert_csv['unit'],
                    'tax'           => '',
                   // 'product_details'=>'Csv Product',
                    'image'         => base_url('my-assets/image/product.png'),
                    'status'        => 1,
                  'product_details'  =>'Sales Description :'. $insert_csv['Sales_des']." ;".'SKU :'. $insert_csv['SKU']." ;".
  'Type :'. $insert_csv['Type']." ;".
  'Taxable :'.  $insert_csv['Taxable']." ;".
   'Income Account :'. $insert_csv['Income_Account']." ;".
  'Purchase_Description :'. $insert_csv['Purchase_Description']." ;".
  'Expense_Account :'. $insert_csv['Expense_Account']." ;".
    'Reorder_Point :'. $insert_csv['Reorder_Point']." ;".
      'Inventory Asset Account :'. $insert_csv['Inventory_Asset_Account']." ;".
        'Quantity as of Date :'. $insert_csv['Quantity_as_of_Date']." ;"
                );

                if ($count > 0) {

                                 $result = $this->db->select('*')
                                        ->from('product_information')
                                        ->where('product_name',$data['product_name'])
                                        ->where('product_model',$data['product_model'])
                                        ->where('category_id',$category_id)
                                        ->get()
                                        ->row();
                    if (empty($result)){
                        $this->db->insert('product_information',$data);
                     //  echo $this->db->last_query();
                        $product_id = $product_id;//die();
                         }else {
                    $product_id = $result->product_id;      
                      $udata = array(
                        'created_by'       =>  $this->session->userdata('user_id'),
                        'product_id'     => $result->product_id,
                        'category_id'    => $category_id,
                        'product_name'   => $result->product_name,
                        'product_model'  => $insert_csv['product_model'],
                        'price'          => $insert_csv['price'],
                        'unit'           => '',
                        'tax'            => '',
                        'product_details'=> 'Csv Uploaded Product',
                        'image'         => base_url('my-assets/image/product.png'),
                        'status'        => 1
                     );
                   $this->db->where('product_id',$result->product_id);
                   $this->db->update('product_information',$udata);
                      // echo $this->db->last_query();die();
                    }

                     $supp_prd = array(
                    'created_by'       =>  $this->session->userdata('user_id'),
                    'product_id'     => $product_id,
                    'supplier_id'    => $supplier_id,
                    'supplier_price' => $insert_csv['supplier_price'],
                    'products_model' => $insert_csv['product_model'],
                );

                       $splprd = $this->db->select('*')
                            ->from('supplier_product')
                            ->where('supplier_id', $supplier_id)
                            ->where('product_id', $product_id)
                            ->get()
                            ->num_rows();

                    if ($splprd == 0) {
                        $this->db->insert('supplier_product', $supp_prd);
                         echo $this->db->last_query();
                    } else {
                        $supp_prd = array(
                            'supplier_id'    => $supplier_id,
                            'supplier_price' => $insert_csv['supplier_price'],
                            'products_model' => $insert_csv['product_model']
                        );
                        $this->db->where('product_id', $product_id);
                        $this->db->where('supplier_id', $supplier_id);
                        $this->db->update('supplier_product', $supp_prd);
                      
                    }
    
                }  
                $count++; 
            }
            
        
                        $this->db->select('*');
                        $this->db->from('product_information');
                        $this->db->where('status',1);
                        $query = $this->db->get();
                        foreach ($query->result() as $row) {
                            $json_product[] = array('label'=>$row->product_name."-(".$row->product_model.")",'value'=>$row->product_id);
                        }
                        $cache_file = './my-assets/js/admin_js/json/product.json';
                        $productList = json_encode($json_product);
                        file_put_contents($cache_file,$productList);
        fclose($fp) or die("can't close file");
        $this->session->set_userdata(array('message'=>display('successfully_added')));
        redirect(base_url('Cproduct/manage_product'));
    }else{
        $this->session->set_userdata(array('error_message'=>'Please Import Only Csv File'));
        redirect(base_url('Cproduct/manage_product'));
    }
    
    }
    }

    //Add supplier by ajax
    public function add_supplier() {
        $this->load->model('Suppliers');

        $data = array(
            'supplier_id'   => $this->auth->generator(20),
            'supplier_name' => $this->input->post('supplier_name',TRUE),
            'address'       => $this->input->post('address',TRUE),
            'mobile'        => $this->input->post('mobile',TRUE),
            'details'       => $this->input->post('details',TRUE),
            'status'        => 1
        );

        $supplier = $this->Suppliers->supplier_entry($data);

        if ($supplier == TRUE) {
            $this->session->set_userdata(array('message' => display('successfully_added')));
            echo TRUE;
        } else {
            $this->session->set_userdata(array('error_message' => display('already_exists')));
            echo FALSE;
        }
    }

    // Insert category by ajax
    public function insert_category() {
        $this->load->model('Categories');
        $category_id = $this->auth->generator(15);

        //Customer  basic information adding.
        $data = array(
            'created_by'       =>  $this->session->userdata('user_id'),
            'category_id'   => $category_id,
            'category_name' => $this->input->post('category_name',TRUE),
            'status'        => 1
        );

        $result = $this->Categories->category_entry($data);

        if ($result == TRUE) {
            $this->session->set_userdata(array('message' => display('successfully_added')));
            echo TRUE;
        } else {
            $this->session->set_userdata(array('error_message' => display('already_exists')));
            echo FALSE;
        }
    }

    // product_delete
    public function product_delete($product_id) {
        $CI = & get_instance();
        $this->auth->check_admin_auth();
        $CI->load->model('Products');
        $check_calculation = $CI->Products->check_calculaton($product_id);
        if($check_calculation > 0){
            $this->session->set_userdata(array('error_message' => display('you_cant_delete_this_product')));
            redirect(base_url('Cproduct/manage_product'));

        }else{
        $result = $CI->Products->delete_product($product_id);
         $this->session->set_userdata(array('message' => display('successfully_delete')));
        redirect(base_url('Cproduct/manage_product'));
    }
    }

    //Retrieve Single Item  By Search
    public function product_by_search() {
        $CI = & get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lproduct');
        $product_id = $this->input->post('product_id',TRUE);

        $content = $CI->lproduct->product_search_list($product_id);
        $this->template->full_admin_html_view($content);
    }

    //Retrieve Single Item  By Search
    public function product_details($product_id) {
        $this->product_id = $product_id;
        $CI = & get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lproduct');
        $content = $CI->lproduct->product_details($product_id);
        $this->template->full_admin_html_view($content);
    }

    //Retrieve Single Item  By Search
    public function product_sales_supplier_rate($product_id = null, $startdate = null, $enddate = null) {
        if ($startdate == null) {
            $startdate = date('Y-m-d', strtotime('-30 days'));
        }
        if ($enddate == null) {
            $enddate = date('Y-m-d');
        }
        $product_id_input = $this->input->post('product_id',TRUE);
        if (!empty($product_id_input)) {
            $product_id = $this->input->post('product_id',TRUE);
            $startdate  = $this->input->post('from_date',TRUE);
            $enddate    = $this->input->post('to_date',TRUE);
        }

        $this->product_id = $product_id;

        $CI = & get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lproduct');
        $content = $CI->lproduct->product_sales_supplier_rate($product_id, $startdate, $enddate);
        $this->template->full_admin_html_view($content);
    }

    //This function is used to Generate Key
    public function generator($lenth) {
        $CI = & get_instance();
        $this->auth->check_admin_auth();
        $CI->load->model('Products');

        $number = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0");
        for ($i = 0; $i < $lenth; $i++) {
            $rand_value = rand(0, 8);
            $rand_number = $number["$rand_value"];

            if (empty($con)) {
                $con = $rand_number;
            } else {
                $con = "$con" . "$rand_number";
            }
        }

        $result = $this->Products->product_id_check($con);

        if ($result === true) {
            $this->generator(8);
        } else {
            return $con;
        }
    }

    //Export CSV
    public function exportCSV() {
        // file name 
        $this->load->model('Products');
        $filename = 'product_' . date('Ymd') . '.csv';
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/csv; ");

        // get data 
        $usersData = $this->Products->product_csv_file();

        // file creation 
        $file = fopen('php://output', 'w');

        $header = array('product_id', 'supplier_id', 'category_id', 'product_name', 'price', 'supplier_price', 'unit', 'tax', 'product_model', 'product_details', 'image', 'status');
        fputcsv($file, $header);
        foreach ($usersData as $line) {
            fputcsv($file, $line);
        }
        fclose($file);
        exit;
    }

// product pdf download 
        public function product_downloadpdf(){
        $CI = & get_instance();
        $CI->load->model('Products');
        $CI->load->model('Invoices');
        $CI->load->model('Web_settings');
        $CI->load->library('pdfgenerator'); 
        $product_list = $CI->Products->product_list_pdf();
        if (!empty($product_list)) {
            $i = 0;
            if (!empty($product_list)) {
                foreach ($product_list as $k => $v) {
                    $i++;
                    $product_list[$k]['sl'] = $i + $CI->uri->segment(3);
                }
            }
        }
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
           $company_info = $CI->Invoices->retrieve_company();
        $data = array(
            'title'         => display('manage_product'),
            'product_list'  => $product_list,
            'currency'      => $currency_details[0]['currency'],
            'logo'          => $currency_details[0]['logo'],
            'position'      => $currency_details[0]['currency_position'],
            'company_info'  => $company_info
        );
            $this->load->helper('download');
            $content = $this->parser->parse('product/product_list_pdf', $data, true);
            $time = date('Ymdhi');
            $dompdf = new DOMPDF();
            $dompdf->load_html($content);
            $dompdf->render();
            $output = $dompdf->output();
            file_put_contents('assets/data/pdf/'.'product'.$time.'.pdf', $output);
            $file_path = 'assets/data/pdf/'.'product'.$time.'.pdf';
           $file_name = 'product'.$time.'.pdf';
            force_download(FCPATH.'assets/data/pdf/'.$file_name, null);
    }

}
