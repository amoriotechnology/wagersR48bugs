<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Products extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

public function get_invoice_product($purchase_id) {
    $sql='SELECT b.* from product_purchase_details a join product_information b on b.product_id=a.product_id where a.purchase_id='.$purchase_id;
        $query = $this->db->query($sql);
       
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
      
    }
    public function product_info_report() {
  $this->db->select('a.*, b.*, COUNT(c.product_id) AS product_quantity');
    $this->db->from('product_information a');

    $this->db->join('supplier_information b', 'b.supplier_id = a.supplier_name', 'left');
    $this->db->join('purchase_order_details c', 'c.product_id = a.product_id', 'left');
    $this->db->where('a.created_by', $this->session->userdata('user_id'));
    $this->db->group_by('a.product_id, a.product_name'); // Group by both product_id and product_name
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
        return $query->result_array();
    }
} 
    public function product_id_number()
    {
      return  $data = $this->db->select("product_id as number")
            ->from('product_information')
            ->like('product_id', 'PI', 'after')
            ->order_by('ID','desc')
            ->get()
            ->result_array();
    }
    //Count Product
    public function count_product() {
        //return $this->db->count_all("product_information");
        $query = $this->db->select('*')
                ->from('product_information')
                ->where('created_by',$this->session->userdata('user_id'))
                ->get();
                return $query->num_rows();
    }

    //Product List
    public function product_list($per_page, $page) {
        $query = $this->db->select('supplier_information.*,product_information.*,supplier_product.*')
                ->from('product_information')
                ->join('supplier_product', 'product_information.product_id = supplier_product.product_id', 'left')
                ->join('supplier_information', 'supplier_information.supplier_id = supplier_product.supplier_id', 'left')
                ->where('product_information.created_by',$this->session->userdata('user_id'))
                ->order_by('product_information.product_name', 'asc')
                ->limit($per_page, $page)
                ->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    //All Product List
  public function all_product_list() {
        $query = $this->db->select('supplier_information.*,product_information.*,supplier_product.*')
                ->from('product_information')
                ->join('supplier_product', 'product_information.product_id = supplier_product.product_id', 'left')
                ->join('supplier_information', 'supplier_information.supplier_id = supplier_product.supplier_id', 'left')
                ->where('product_information.created_by',$this->session->userdata('user_id'))
                ->order_by('product_information.product_id', 'desc')
                ->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }
    public function get_profarma_product()
    {
          $this->db->select('a.*,b.*');
          $this->db->from('profarma_invoice a');
          $this->db->join('profarma_invoice_details b', 'b.purchase_id = a.purchase_id');
          $this->db->where('a.sales_by',$this->session->userdata('user_id'));
     $query = $this->db->get();
      if ($query->num_rows() > 0) {
                return $query->result_array();
            }
    }

public function get_products() {
        $sql='select a.*,b.category_name  from product_information a 
        join
        product_category b 
        on b.category_id=a.category_id
        
         limit 10

        ';
        $query = $this->db->query($sql);
        //echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
      
    }
    public function get_product()
    {
        // $query = $this->db->get('invoice');
      $this->db->select('a.*,b.*');
      $this->db->from('invoice a');
      $this->db->join('invoice_details b', 'b.invoice_id = a.invoice_id');
      $this->db->where('a.sales_by',$this->session->userdata('user_id'));
     $query = $this->db->get();
      if ($query->num_rows() > 0) {
                return $query->result_array();
            }
        }
        public function get_all_products() {
      

            $this->db->select('*');
            $this->db->from('product_information');
          //  $this->db->where('status', 1);
            $this->db->where('created_by',$this->session->userdata('user_id'));
            $query = $this->db->get();
 
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        
        }
        public function get_all_products_with_supplier_details() {
        $this->db->select('a.*,b.supplier_price,c.supplier_name');
        $this->db->from('product_information a');
        $this->db->join('supplier_product b', 'b.product_id = a.product_id');
        $this->db->join('supplier_information c', 'b.supplier_id =c.supplier_id');
        $this->db->where('a.created_by',$this->session->userdata('user_id'));
        $query = $this->db->get();
    //  echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        
        }
              public function get_all_products_with_supplier() {
    //     $this->db->select('a.*,b.*');
    //     $this->db->from('product_information a');
   
    //     $this->db->join('supplier_information b', 'b.supplier_id =a.supplier_name');
    //     $this->db->where('a.created_by',$this->session->userdata('user_id'));
    //     $query = $this->db->get();
    // // echo $this->db->last_query();
    //     if ($query->num_rows() > 0) {
    //         return $query->result_array();
    //     }else{
              $this->db->select('*');
        $this->db->from('product_information');
   
    
        $this->db->where('created_by',$this->session->userdata('user_id'));
        $query = $this->db->get();
    // echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        }
        
        
 public function sales_product_all() {

     $this->db->select('a.product_id,a.product_name,COUNT(*) as available ,b.p_quantity');
        $this->db->from('invoice_details a');
        $this->db->join('product_information b', 'b.product_id = a.product_id');
        $this->db->group_by('a.product_id'); 
    //   $this->db->join('supplier_information c', 'a.supplier_id =c.supplier_id');
        $this->db->where('a.create_by',$this->session->userdata('user_id'));
        $query = $this->db->get();
     // echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }

       
    }
    
    
    
    
    // Search Query

   public function searchproduct_entry($search_items)
    {
        $this->db->select("p.product_name, p.product_model, p.category_id, c.category_name");
        $this->db->from('product_information p');
        $this->db->join('product_category c', 'c.category_name = p.category_id');
        $this->db->like('product_name', $search_items);
        $this->db->where('p.created_by',$this->session->userdata('user_id'));
        $query = $this->db->get();
        // echo $this->db->last_query(); die();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }


    // unique Product

    // public function uniqueProductname($uniqueproduct_name)
    // {
    //     $this->db->select("product_name, product_model, price");
    //     $this->db->from('product_information');
    //     $this->db->where('product_name',$uniqueproduct_name);
    //     $this->db->where('created_by',$this->session->userdata('user_id'));
    //     $query = $this->db->get();
    //     // echo $this->db->last_query();
        
    //     if ($query->num_rows() > 0) {
    //         return $query->result_array();
    //     }else{
    //         echo "not available";
    //     }
    // }
    
    
    public function uniqueProductname($uniqueproduct_name, $uniqueproduct_model, $uniquecategory_name)
    {
        $this->db->select("p.product_name, p.product_model, p.category_id, c.category_name");
        $this->db->from('product_information p');
        $this->db->join('product_category c', 'c.category_name = p.category_id');
        $this->db->where('product_name', $uniqueproduct_name);
        $this->db->where('p.product_model', $uniqueproduct_model);
        $this->db->where('c.category_name', $uniquecategory_name);

        $this->db->where('p.created_by', $this->session->userdata('user_id'));
        
        $query = $this->db->get();
        // echo $this->db->last_query(); die();
        
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } 
        else {
            echo "not available";
        }
    }
    
    
    
    
    
       
    
  public function get_sales_product_history($pid) {

  $this->db->select('b.product_id,a.invoice_id as inv,a.commercial_invoice_number,b.*');
    $this->db->from('invoice a');
    // $this->db->join('invoice c', 'a.invoice_id =c.invoice_id');
    $this->db->join('product_details_history b', 'b.invoice_id = a.invoice_id'); 
    $this->db->where('a.sales_by',$this->session->userdata('user_id'));
    $this->db->where('b.product_id',$pid);
    $this->db->where('b.sales','sales');
  $this->db->order_by("a.commercial_invoice_number", "asc");
    $query = $this->db->get();
// echo $this->db->last_query();
    if ($query->num_rows() > 0) {
        return $query->result_array();
    }
}

  
  
  
  
   public function get_expense_product_history($pid) {
    $this->db->select('a.product_id,a.product_name,a.bundle_no,b.chalan_no,a.purchase_id,c.*');
    $this->db->from('product_purchase_details a');
    $this->db->join('product_purchase b', 'b.purchase_id = a.purchase_id');
    $this->db->join('product_details_history c', 'a.product_id = c.product_id');
    $this->db->where('a.create_by',$this->session->userdata('user_id'));
    $this->db->where('a.product_id',$pid);
    $this->db->where('c.expenses','expenses');
    $this->db->group_by('a.bundle_no'); 
     $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
  }
  
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
        public function expense_product_all() {
            $this->db->select('a.product_id,a.product_name,COUNT(*) as available,b.p_quantity');
        $this->db->from('product_purchase_details a');
        $this->db->join('product_information b', 'b.product_id = a.product_id');
      $this->db->group_by('a.product_id'); 
       // $this->db->where('a.created_by',$this->session->userdata('user_id'));
        $query = $this->db->get();

 //echo $this->db->last_query();
        
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
           
    }


    public function sales_products($id) {
         $sql='SELECT * FROM `invoice_details` where product_id='.$id;
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        }
        else
        {
            return 0;
        }
        return false;
    }
    

 public function expense_products($id) {
         $sql='SELECT * FROM `product_purchase_details` where product_id='.$id;
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        }
        else
        {
            return 0;
        }
        return false;
    }








    public function getProductList($postData=null){

         $response = array();

         ## Read value
         $draw = $postData['draw'];
         $start = $postData['start'];
         $rowperpage = $postData['length']; // Rows display per page
         $columnIndex = $postData['order'][0]['column']; // Column index
         $columnName = $postData['columns'][$columnIndex]['data']; // Column name
         $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
         $searchValue = $postData['search']['value']; // Search value
       //  $cat_id = $postData['category_id'];
         $cat_id = 0;

         ## Search 
         $searchQuery = "";
         if($searchValue != ''){
            $searchQuery = " (a.product_name like '%".$searchValue."%' or a.product_model like '%".$searchValue."%' or a.price like'%".$searchValue."%' or c.supplier_price like'%".$searchValue."%' or m.supplier_name like'%".$searchValue."%') ";
         }

         ## Total number of records without filtering
         $this->db->select('count(*) as allcount');
         $this->db->from('product_information a');
         $this->db->join('supplier_product c','c.product_id = a.product_id','left');
         $this->db->join('supplier_information m','m.supplier_id = c.supplier_id','left');
         $this->db->where('a.created_by',$this->session->userdata('user_id'));

          if($searchValue != '')
         $this->db->where($searchQuery);
         $records = $this->db->get()->result();
         $totalRecords = $records[0]->allcount;

         ## Total number of record with filtering
         $this->db->select('count(*) as allcount');
         $this->db->from('product_information a');
         $this->db->join('supplier_product c','c.product_id = a.product_id','left');
         $this->db->join('supplier_information m','m.supplier_id = c.supplier_id','left');
         $this->db->where('a.created_by',$this->session->userdata('user_id'));
         if($searchValue != '')
            $this->db->where($searchQuery);
         $records = $this->db->get()->result();
         $totalRecordwithFilter = $records[0]->allcount;

         ## Fetch records
         $this->db->select("a.*,
                a.product_name,
                a.product_id,
                a.product_model,
                a.image,
                c.supplier_price,
                c.supplier_id,
                m.supplier_name
                ");
         $this->db->from('product_information a');
         $this->db->join('supplier_product c','c.product_id = a.product_id','left');
         $this->db->join('supplier_information m','m.supplier_id = c.supplier_id','left');
         $this->db->where('a.created_by',$this->session->userdata('user_id'));
            if($cat_id != '')
             $this->db->where('a.category_id',$cat_id);
         if($searchValue != '')
         $this->db->where($searchQuery);
         $this->db->order_by($columnName, $columnSortOrder);
         $this->db->limit($rowperpage, $start);
         $records = $this->db->get()->result();
         $data = array();
         $sl =1;
  
         foreach($records as $record ){
          $button = '';
          $base_url = base_url();
          $jsaction = "return confirm('Are You Sure ?')";
            $image = '<img src="'.$record->image.'" class="img img-responsive" height="50" width="50">';
           if($this->permission1->method('manage_product','delete')->access()){
                                  
           $button .= '<a href="'.$base_url.'Cproduct/product_delete/'.$record->product_id.'" class="btn btn-xs btn-danger "  onclick="'.$jsaction.'"><i class="fa fa-trash"></i></a>';
         }

         $button .='  <a href="'.$base_url.'Cqrcode/qrgenerator/'.$record->product_id.'" class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="left" title="'.display('qr_code').'"><i class="fa fa-qrcode" aria-hidden="true"></i></a>';

         $button .='  <a href="'.$base_url.'Cbarcode/barcode_print/'.$record->product_id.'" class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="left" title="'.display('barcode').'"><i class="fa fa-barcode" aria-hidden="true"></i></a>';
      if($this->permission1->method('manage_product','update')->access()){
         $button .=' <a href="'.$base_url.'Cproduct/product_update_form/'.$record->product_id.'" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="left" title="'. display('update').'"><i class="fa fa-pencil" aria-hidden="true"></i></a>';
     }

         $product_name = '<a href="'.$base_url.'Cproduct/product_details/'.$record->product_id.'">'.$record->product_name.'</a>';
         $supplier = '<a href="'.$base_url.'Csupplier/supplier_ledger_info/'.$record->supplier_id.'">'.$record->supplier_name.'</a>';
               
            $data[] = array( 
                'sl'               =>$sl,
                'product_name'     =>$product_name,
                'product_model'    =>$record->product_model,
                'supplier_name'    =>$supplier,
                'price'            =>$record->price,
                'purchase_p'       =>$record->supplier_price,
                'image'            =>$image,
                'button'           =>$button,
                
            ); 
            $sl++;
         }

         ## Response
         $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecordwithFilter,
            "iTotalDisplayRecords" => $totalRecords,
            "aaData" => $data
         );

         return $response; 
    }

    //Product List
    public function product_list_count() {
        $query = $this->db->select('supplier_information.*,product_information.*,supplier_product.*')
                ->from('product_information')
                ->join('supplier_product', 'product_information.product_id = supplier_product.product_id', 'left')
                ->join('supplier_information', 'supplier_information.supplier_id = supplier_product.supplier_id', 'left')
                ->where('product_information.created_by',$this->session->userdata('user_id'))
                ->order_by('product_information.product_name', 'asc')
                ->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        }
        return false;
    }

    //Product tax list
    public function retrieve_product_tax() {
        $result = $this->db->select('*')
                ->from('tax_information')
                ->where('create_by',$this->session->userdata('user_id'))
                ->get()
                ->result();

        return $result;
    }

    //Tax selected item
    public function tax_selected_item($tax_id) {
        $result = $this->db->select('*')
                ->from('tax_information')
                ->where('tax_id', $tax_id)
                ->where('create_by',$this->session->userdata('user_id'))
                ->get()
                ->result();

        return $result;
    }

    //Product generator id check 
    public function product_id_check($product_id) {
        $query = $this->db->select('*')
                ->from('product_information')
                ->where('product_id', $product_id)
                ->where('created_by',$this->session->userdata('user_id'))
                ->get();
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

 //Count Product
 /*
 public function product_entry($data) {
       
    $this->db->insert('product_information', $data);
    $this->db->select('*');
    $this->db->from('product_information');
    $this->db->where('status', 1);
    $this->db->where('created_by',$this->session->userdata('user_id'));
    $query = $this->db->get();
    foreach ($query->result() as $row) {
        $json_product[] = array('label' => $row->product_name . "-(" . $row->product_model . ")", 'value' => $row->product_id);
    }
    $cache_file = './my-assets/js/admin_js/json/product.json';
    $productList = json_encode($json_product);
    file_put_contents($cache_file, $productList);
   
// echo json_encode( $data);
}
*/
// public function product_entry($data) {
   
// redirect 
    
// }
public function retrieve_product_datas($product_id) {
    $this->db->select('*');
    $this->db->from('product_details');
    $this->db->where('product_id', $product_id);
    // $this->db->where('created_by',$this->session->userdata('user_id'));
    $query = $this->db->get();
    // echo $this->db->last_query();
    if ($query->num_rows() > 0) {
        return $query->result_array();
    }
    return false;
}
public function product_table($product_id) {
     $this->db->select('*');
     $this->db->from('product_details');
      $this->db->where('product_id',$product_id );
      $this->db->where('create_by',$this->session->userdata('user_id'));
    $query = $this->db->get();
    //  echo $this->db->last_query();
    if ($query->num_rows() > 0) {
        return $query->result_array();
    }
    return false;
}
    //Retrieve Product Edit Data
    public function retrieve_product_editdata($product_id) {
        $this->db->select('*');
        $this->db->from('product_information');
        $this->db->where('product_id', $product_id);
        $this->db->where('created_by',$this->session->userdata('user_id'));
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    // Supplier product information
    public function supplier_product_editdata($product_id) {
        $this->db->select('a.*,b.*');
        $this->db->from('supplier_product a');
        $this->db->join('supplier_information b', 'a.supplier_id=b.supplier_id');
        $this->db->where('a.created_by',$this->session->userdata('user_id'));
        $this->db->where('a.product_id', $product_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

//selected supplier product
    public function supplier_selected($product_id) {
        $this->db->select('*');
        $this->db->from('supplier_product');
        $this->db->where('product_id', $product_id);
        $this->db->where('created_by',$this->session->userdata('user_id'));
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    //Retrieve company Edit Data
    public function retrieve_company() {
        $this->db->select('*');
        $this->db->from('company_information');
        $this->db->limit('1');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    //Update Categories
    public function update_product($data, $product_id) {
            $this->db->where('product_id', $product_id);
            $this->db->update('product_information', $data);
            $this->db->select('*');
            $this->db->from('product_information');
            $this->db->where('created_by',$this->session->userdata('user_id'));
            $this->db->where('status', 1);
            $query = $this->db->get();
            foreach ($query->result() as $row) {
                $json_product[] = array('label' => $row->product_name . "-(" . $row->product_model . ")", 'value' => $row->product_id);
            }
            $cache_file = './my-assets/js/admin_js/json/product.json';
            $productList = json_encode($json_product);
            file_put_contents($cache_file, $productList);
            return true;
        
    }


    public function check_calculaton($product_id){
        $this->db->select('*');
        $this->db->from('product_purchase_details');
        $this->db->where('product_id', $product_id);
        $this->db->where('create_by',$this->session->userdata('user_id'));
        $query = $this->db->get();
        return $query->num_rows();
    }

    // Delete Product Item
    public function delete_product($product_id) {


            $this->db->where('product_id', $product_id);
            $this->db->delete('product_information');
            $this->db->where('product_id', $product_id);
            $this->db->delete('supplier_product');
            return true;
       
    }

    //Product By Search 
    public function product_search_item($product_id) {

        $query = $this->db->select('supplier_information.*,product_information.*,supplier_product.*')
                ->from('product_information')
                ->join('supplier_product', 'product_information.product_id = supplier_product.product_id', 'left')
                ->join('supplier_information', 'supplier_product.supplier_id = supplier_information.supplier_id', 'left')
                ->order_by('product_information.product_id', 'desc')
                ->where('product_information.created_by',$this->session->userdata('user_id'))
                ->where('product_information.product_id', $product_id)
                ->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    //Duplicate Entry Checking 
    public function product_model_search($product_model) {
        $this->db->select('*');
        $this->db->from('product_information');
        $this->db->where('product_model', $product_model);
        $this->db->where('created_by',$this->session->userdata('user_id'));
        $query = $this->db->get();
        return $this->db->affected_rows();
    }

    public function product_details($id)
    {
        $sql='SELECT b.*,a.products_model,d.iso3,a.supplier_price,c.supplier_name,c.country,c.address,c.email_address FROM `supplier_product` a join product_information b on a.product_id=b.product_id JOIN supplier_information c on c.supplier_id=a.product_id
            join country d 
            on d.name=c.country
        where b.id='.$id;
       $query=$this->db->query($sql);
   //    echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        
    }

    //Product Details
    public function prodt_info() {
        $this->db->select('*');
        $this->db->from('product_details');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }
    public function retrieve_product_details($id) {
        $this->db->select('*');
        $this->db->from('product_information');
        $this->db->where ('product_id',$id);
        // where product_id='.$id;
        $query = $this->db->get();
      //echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }
public function  product_details_pdv($product_id) {
        $this->db->select('a.*,b.*');
      $this->db->from('product_information a');
      $this->db->join('product_details b', 'b.product_id = a.product_id');
      $this->db->where('a.product_id', $product_id);
      $query = $this->db->get();
     // echo $this->db->last_query();
      if ($query->num_rows() > 0) {
          return $query->result_array();
      }else{
       $this->db->select('a.*');
      $this->db->from('product_information a');
   
      $this->db->where('a.product_id', $product_id);
        $query = $this->db->get();
           return $query->result_array();
      }
      return false;
  }
public function product_details_info($product_id) {
        $this->db->select('*');
        $this->db->from('product_information');
        $this->db->where('product_id', $product_id);
        $this->db->where('created_by',$this->session->userdata('user_id'));
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    // Product Purchase Report
    public function product_purchase_info($product_id) {
        $this->db->select('a.*,b.*,sum(b.quantity) as quantity,sum(b.total_amount) as total_amount,c.supplier_name');
        $this->db->from('product_purchase a');
        $this->db->join('product_purchase_details b', 'b.purchase_id = a.purchase_id');
        $this->db->join('supplier_information c', 'c.supplier_id = a.supplier_id');
        $this->db->where('b.product_id', $product_id);
        $this->db->where('a.create_by',$this->session->userdata('user_id'));
        $this->db->order_by('a.purchase_id', 'asc');
        $this->db->group_by('a.purchase_id');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    // Invoice Data for specific data
    public function invoice_data($product_id) {
        $this->db->select('a.*,b.*,c.customer_name');
        $this->db->from('invoice a');
        $this->db->join('invoice_details b', 'b.invoice_id = a.invoice_id');
        $this->db->join('customer_information c', 'c.customer_id = a.customer_id');
        $this->db->where('b.product_id', $product_id);
        $this->db->where('a.sales_by',$this->session->userdata('user_id'));
        $this->db->order_by('a.invoice_id', 'asc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

      // Packing List Data for specific data
    public function packing_list_data($product_id) {
        $this->db->select('a.*,b.*');
        $this->db->from('product_information a');
        $this->db->join('product_details b', 'b.product_id = a.product_id');
        $this->db->where('a.product_id', $product_id);
      //  $this->db->where('a.sales_by',$this->session->userdata('user_id'));
     //   $this->db->order_by('a.expense_packing_id', 'asc');
        $query = $this->db->get();
        echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    public function previous_stock_data($product_id, $startdate) {

        $this->db->select('date,sum(quantity) as quantity');
        $this->db->from('product_report');
        $this->db->where('product_id', $product_id);
        $this->db->where('create_by',$this->session->userdata('user_id'));
        $this->db->where('date <=', $startdate);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }




}
