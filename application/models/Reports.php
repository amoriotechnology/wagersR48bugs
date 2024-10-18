<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class reports extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    //Count report
    public function count_stock_report() {
        $this->db->select("a.unit,a.product_name,a.product_id,a.price,a.product_model,(select sum(quantity) from invoice_details where product_id= `a`.`product_id`) as 'totalSalesQnty',(select sum(quantity) from product_purchase_details where product_id= `a`.`product_id`) as 'totalBuyQnty'");
        $this->db->from('product_information a');
        $this->db->where('created_by',$this->session->userdata('user_id'));
        $this->db->where(array('a.status' => 1));
        $this->db->group_by('a.product_id');
        $query = $this->db->get();
         $result = $query->result_array();
         $stock = 0;
         $i = 0;
         foreach ($result as $stockproduct) {
            $stokqty = $stockproduct['totalBuyQnty']-$stockproduct['totalSalesQnty'];
            if($stokqty < 10){

             $stock =$stock+1;
           
         }
             $i++;
         }
        return $stock;
    }
    public function list()
    {
        return $this->db->get('users')->result();
    }
    //Out of stock
    public function out_of_stock() {

         $this->db->select("a.unit,a.product_name,a.product_id,a.price,a.product_model,(select sum(quantity) from invoice_details where product_id= `a`.`product_id`) as 'totalSalesQnty',(select sum(quantity) from product_purchase_details where product_id= `a`.`product_id`) as 'totalBuyQnty'");
        $this->db->from('product_information a');
        $this->db->where('a.created_by',$this->session->userdata('user_id'));
        $this->db->where(array('a.status' => 1));
        $this->db->group_by('a.product_id');
        $query = $this->db->get();
         $result = $query->result_array();
         $stock = [];
         $i = 0;
         foreach ($result as $stockproduct) {
            $stokqty = $stockproduct['totalBuyQnty']-$stockproduct['totalSalesQnty'];
            if($stokqty < 10){

             $stock[$i]['stock']         = $stockproduct['totalBuyQnty']-$stockproduct['totalSalesQnty'];
             $stock[$i]['product_id']    = $stockproduct['product_id'];
             $stock[$i]['product_name']  = $stockproduct['product_name'];
             $stock[$i]['product_model'] = $stockproduct['product_model'];
             $stock[$i]['unit']          = $stockproduct['unit'];
         }
             $i++;
         }
        return $stock;
    }

    //Out of stock count
    public function out_of_stock_count() {

         $this->db->select("a.unit,a.product_name,a.product_id,a.price,a.product_model,(select sum(quantity) from invoice_details where product_id= `a`.`product_id`) as 'totalSalesQnty',(select sum(quantity) from product_purchase_details where product_id= `a`.`product_id`) as 'totalBuyQnty'");
        $this->db->from('product_information a');
         $this->db->where('a.created_by',$this->session->userdata('user_id'));
        $this->db->where(array('a.status' => 1));
        $this->db->group_by('a.product_id');
        $query = $this->db->get();
         $result = $query->result_array();
         $stock = 0;
         $i = 0;
         foreach ($result as $stockproduct) {
            $stokqty = $stockproduct['totalBuyQnty']-$stockproduct['totalSalesQnty'];
            if($stokqty < 10){

             $stock =$stock+1;
           
         }
             $i++;
         }
        return $stock;

    }

    //Retrieve Single Item Stock Stock Report
    public function stock_report($limit, $page) {
        $this->db->select("a.product_name,a.product_id,a.cartoon_quantity,a.price, a.product_model,sum(b.quantity) as 'totalSalesQnty',(select sum(product_purchase_details.quantity) from product_purchase_details where product_id= `a`.`product_id`) as 'totalBuyQnty'");
        $this->db->from('product_information a');
        $this->db->join('invoice_details b', 'b.product_id = a.product_id');
         $this->db->where('a.created_by',$this->session->userdata('user_id'));
        $this->db->where(array('a.status' => 1, 'b.status' => 1));
        $this->db->group_by('a.product_id');
        $this->db->order_by('a.product_id', 'desc');
        $this->db->limit($limit, $page);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    //Retrieve Single Item Stock Stock Report
    public function stock_report_single_item($product_id) {
        $this->db->select("a.product_name,a.cartoon_quantity,a.price,a.product_model,sum(b.quantity) as 'totalSalesQnty',sum(c.quantity) as 'totalBuyQnty'");
        $this->db->from('product_information a');
        $this->db->join('invoice_details b', 'b.product_id = a.product_id');
        $this->db->join('product_purchase_details c', 'c.product_id = a.product_id');
         $this->db->where('a.created_by',$this->session->userdata('user_id'));
        $this->db->where(array('a.product_id' => $product_id, 'a.status' => 1, 'b.status' => 1));
        $this->db->group_by('a.product_id');
        $this->db->order_by('a.product_id', 'desc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    //Stock Report by date
    public function stock_report_bydate($product_id, $date, $limit, $page) {

        $this->db->select("a.*,
                a.product_name,
                a.product_id,
                a.product_model,
                sum(b.sell) as 'totalSalesQnty',
                sum(b.Purchase) as 'totalPurchaseQnty',
                AVG(c.supplier_price) as 'purchasprice'
                ");
        $this->db->from('product_information a');

        $this->db->join('stock_history b', 'b.product_id = a.product_id', 'left');
        $this->db->join('supplier_product c', 'c.product_id = a.product_id', 'left');
         $this->db->where('a.created_by',$this->session->userdata('user_id'));
        if (empty($product_id)) {
            $this->db->where(array('a.status' => 1));
        } else {
            //Single product information 
            $this->db->where(array('a.status' => 1, 'b.vdate <= ' => $date, 'a.product_id' => $product_id));
        }

        $this->db->group_by('a.product_id');
        $this->db->order_by('a.product_name', 'asc');
        $this->db->limit($limit, $page);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }


        public function totalnumberof_product(){

        $this->db->select("a.*,
                a.product_name,
                a.product_id,
                a.product_model,
                c.supplier_price
                ");
        $this->db->from('product_information a');
    
        $this->db->join('supplier_product c','c.product_id = a.product_id','left');
         $this->db->where('a.created_by',$this->session->userdata('user_id'));
        $this->db->group_by('a.product_id');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();  
        }
        return false;

    }
 public function bank_info_sales($bank_id = null,$date=null){
    if($date) {
$split=explode(' to ',$date);
$start =  $split[0];
$end = $split[1];
}
 $this->db->select("i.*,p.*, SUM(p.amt_paid) AS total_amt_paid, SUM(p.balance) AS total_balance");

$this->db->from('payment p');
$this->db->join('invoice i', 'p.payment_id = i.payment_id');
 $this->db->where('p.create_by',$this->session->userdata('user_id'));
     if($date) {
   $this->db->where('p.payment_date >',$start );
      $this->db->where('p.payment_date <',$end );
     }
     if($bank_id){
 $this->db->where('p.bank_name',$bank_id);

     }
$this->db->group_by('p.payment_id');

$query = $this->db->get();
return $query->result();
 }
 public function bank_info_purchase($bank_id = null,$date=null){
       if($date) {
$split=explode(' to ',$date);
$start =  $split[0];
$end = $split[1];
}
 $this->db->select("i.*,p.*, SUM(p.amt_paid) AS total_amt_paid, SUM(p.balance) AS total_balance");

$this->db->from('payment p');
$this->db->join('product_purchase i', 'p.payment_id = i.payment_id');
 $this->db->where('p.create_by',$this->session->userdata('user_id'));
  if($date) {
   $this->db->where('p.payment_date >',$start );
      $this->db->where('p.payment_date <',$end );
     }
     if($bank_id){
 $this->db->where('p.bank_name',$bank_id);

     }
$this->db->group_by('p.payment_id');

$query = $this->db->get();
return $query->result();
 }
 public function bank_info_service($bank_id = null,$date=null){
       if($date) {
$split=explode(' to ',$date);
$start =  $split[0];
$end = $split[1];
}
 $this->db->select("i.*,p.*, SUM(p.amt_paid) AS total_amt_paid, SUM(p.balance) AS total_balance");

$this->db->from('payment p');
$this->db->join('service i', 'p.payment_id = i.payment_id');
 $this->db->where('p.create_by',$this->session->userdata('user_id'));
  if($date) {
   $this->db->where('p.payment_date >',$start );
      $this->db->where('p.payment_date <',$end );
     }
     if($bank_id){
 $this->db->where('p.bank_name',$bank_id);

     }
$this->db->group_by('p.payment_id');

$query = $this->db->get();
return $query->result();
 }


    public function getCheckList($postData=null){

         $response = array();

         ## Read value
         $draw = $postData['draw'];
         $start = $postData['start'];
         $rowperpage = $postData['length']; // Rows display per page
         $columnIndex = $postData['order'][0]['column']; // Column index
         $columnName = $postData['columns'][$columnIndex]['data']; // Column name
         $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
         $searchValue = $postData['search']['value']; // Search value

         ## Search 
         $searchQuery = "";
         if($searchValue != ''){
            $searchQuery = " (a.product_name like '%".$searchValue."%' or a.product_model like '%".$searchValue."%') ";
         }

         ## Total number of records without filtering
         $this->db->select('count(*) as allcount');
         $this->db->from('product_information a');
          $this->db->where('a.created_by',$this->session->userdata('user_id'));
          if($searchValue != ''){
         $this->db->where($searchQuery);
     }
        $this->db->group_by('a.product_id');
         $records = $this->db->get()->num_rows();
         $totalRecords = $records;

         ## Total number of record with filtering
         $this->db->select('count(*) as allcount');
         $this->db->from('product_information a');
          $this->db->where('a.created_by',$this->session->userdata('user_id'));
         if($searchValue != ''){
            $this->db->where($searchQuery);
        }
         $this->db->group_by('a.product_id');
         $records = $this->db->get()->num_rows();
         $totalRecordwithFilter = $records;

         ## Fetch records
         $this->db->select("a.*,
                a.product_name,
                a.product_id,
                a.product_model
                ");
         $this->db->from('product_information a');
          $this->db->where('a.created_by',$this->session->userdata('user_id'));
         if($searchValue != '')
         $this->db->where($searchQuery);
         $this->db->order_by($columnName, $columnSortOrder);
         $this->db->group_by('a.product_id');
         $this->db->limit($rowperpage, $start);
         $records = $this->db->get()->result();
         $data = array();
         $sl =1;
         foreach($records as $record ){
          $stockin = $this->db->select('sum(quantity) as totalSalesQnty')->from('invoice_details')->where('product_id',$record->product_id)->get()->row();
         $stockout = $this->db->select('sum(quantity) as totalPurchaseQnty,Avg(rate) as purchaseprice')->from('product_purchase_details')->where('product_id',$record->product_id)->get()->row();
            

            $sprice = (!empty($record->price)?$record->price:0);
            $pprice = (!empty($stockout->purchaseprice)?sprintf('%0.2f',$stockout->purchaseprice):0); 
            $stock =  (!empty($stockout->totalPurchaseQnty)?$stockout->totalPurchaseQnty:0)-(!empty($stockin->totalSalesQnty)?$stockin->totalSalesQnty:0);
            $data[] = array( 
                'sl'            =>   $sl,
                'product_name'  =>  $record->product_name,
                'product_model' =>  $record->product_model,
                'sales_price'   =>  sprintf('%0.2f',$sprice),
                'purchase_p'    =>  $pprice,
                'totalPurchaseQnty'=>$stockout->totalPurchaseQnty,
                'totalSalesQnty'=>  $stockin->totalSalesQnty,
                'stok_quantity' => sprintf('%0.2f',$stock),
                'total_sale_price'=> ($stockout->totalPurchaseQnty-$stockin->totalSalesQnty)*$sprice,
                'purchase_total' =>  ($stockout->totalPurchaseQnty-$stockin->totalSalesQnty)*$pprice,
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


// supplier wise stock list
        public function getSupplierStockList($postData=null){

         $response = array();

         ## Read value
         $draw = $postData['draw'];
         $start = $postData['start'];
         $rowperpage = $postData['length']; // Rows display per page
         $columnIndex = $postData['order'][0]['column']; // Column index
         $columnName = $postData['columns'][$columnIndex]['data']; // Column name
         $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
         $searchValue = $postData['search']['value']; // Search value

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
          if($searchValue != ''){
         $this->db->where($searchQuery);
     }
         $records = $this->db->get()->result();
         $totalRecords = $records[0]->allcount;

         ## Total number of record with filtering
         $this->db->select('count(*) as allcount');
         $this->db->from('product_information a');
         $this->db->join('supplier_product c','c.product_id = a.product_id','left');
         $this->db->join('supplier_information m','m.supplier_id = c.supplier_id','left');
          $this->db->where('a.created_by',$this->session->userdata('user_id'));
         if($searchValue != ''){
            $this->db->where($searchQuery);
        }
         $records = $this->db->get()->result();
         $totalRecordwithFilter = $records[0]->allcount;

         ## Fetch records
         $this->db->select("a.*,
                a.product_name,
                a.product_id,
                a.product_model,
                c.supplier_price,
                m.supplier_name,
                m.supplier_id,
                ");
         $this->db->from('product_information a');
         $this->db->join('supplier_product c','c.product_id = a.product_id','left');
         $this->db->join('supplier_information m','m.supplier_id = c.supplier_id','left');
          $this->db->where('a.created_by',$this->session->userdata('user_id'));
         if($searchValue != '')
         $this->db->where($searchQuery);
         $this->db->order_by($columnName, $columnSortOrder);
         $this->db->limit($rowperpage, $start);
         $records = $this->db->get()->result();
         $data = array();
         $sl =1;
         foreach($records as $record ){
          $stockin = $this->db->select('sum(quantity) as totalSalesQnty')->from('invoice_details')->where('product_id',$record->product_id)->get()->row();
         $stockout = $this->db->select('sum(quantity) as totalPurchaseQnty,Avg(rate) as purchaseprice')->from('product_purchase_details')->where('product_id',$record->product_id)->get()->row();
            
               
            $data[] = array( 
                'sl'            =>   $sl,
                'product_name'  =>  $record->product_name,
                'supplier_name' =>  $record->supplier_name,
                'product_model' =>  $record->product_model,
                'sales_price'   =>  $record->price,
                'purchase_p'    =>   number_format($stockout->purchaseprice,2),
                'totalPurchaseQnty'=>$stockout->totalPurchaseQnty,
                'totalSalesQnty'=>  $stockin->totalSalesQnty,
                'stok_quantity' =>  $stockout->totalPurchaseQnty-$stockin->totalSalesQnty,
                'total_sale_price'=> ($stockout->totalPurchaseQnty-$stockin->totalSalesQnty)*$record->price,
                'purchase_total' =>  ($stockout->totalPurchaseQnty-$stockin->totalSalesQnty)*$record->supplier_price,
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

    //Retrieve todays_total_sales_report
    public function todays_total_sales_report() {
        $today = date('Y-m-d');
        $this->db->select("a.date,a.invoice,b.invoice_id, sum(a.gtotal) as total_amt, sum(b.total_price) as total_sale,sum(`quantity`*`supplier_rate`) as total_supplier_rate,(SUM(total_price) - SUM(`quantity`*`supplier_rate`)) AS total_profit");
        $this->db->from('invoice a');
        $this->db->join('invoice_details b', 'b.invoice_id = a.invoice_id');
        $this->db->where('a.sales_by',$this->session->userdata('user_id'));
        $this->db->where('a.date', $today);
        $this->db->order_by('a.invoice_id', 'desc');
        $query = $this->db->get();
      //  echo $this->db->last_query();
       // die();
        if ($query->num_rows() > 0) {
           return $query->total_amt;
        }
        return false;
    }
   
    public function total_sale_invoice(){
        $this->db->select(" sum(b.total_price) as total_sale,sum(`quantity`*`supplier_rate`) as total_supplier_rate,(SUM(total_price) - SUM(`quantity`*`supplier_rate`)) AS total_profit");
        $this->db->from('invoice a');
        $this->db->join('invoice_details b', 'b.invoice_id = a.invoice_id');
        $this->db->where('a.sales_by',$this->session->userdata('user_id'));
       
        $this->db->order_by('a.invoice_id', 'desc');
        $query = $this->db->get()->row();
   
        return $query->total_sale;
    }
    public function total_sales_report($date1,$date2) {
     
        $this->db->select("*");
        $this->db->from('invoice');
     
        $this->db->where('sales_by',$this->session->userdata('user_id'));
     $this->db->where('date >=',$date1);
        $this->db->where('date <=',$date2);
        $query = $this->db->get();
    
        if ($query->num_rows() > 0) {
            return $query->num_rows();
          
        }
        return false;
    }

    public function total_sales_product() {
        $this->db->select("*");
        $this->db->from('invoice_details');
        $this->db->where('create_by',$this->session->userdata('user_id'));
        $query = $this->db->get();
        // echo $this->db->last_query(); die();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        }
        // return false;
    }
    public function chart($start,$end) {
     
     $val=  $this->db->select("*")
         ->from('invoice')
         ->where('sales_by',$this->session->userdata('user_id'))
       ->where('date >=', $start)
        ->where('date <=', $end);
        $query =  $val->get()->result();
       
        $category = array();
        $category['name'] = 'sale';
$series1 = array();
$series1['name'] = 'expense';
 foreach ($query as $row)
       {
        
       $category['date'][] = $row->date;
       $category['amount'][] = $row->gtotal;
    }
       $result = array();
array_push($result,$category);

$qury=$this->db->select("*")
->from('purchase_order')
->where('create_by',$this->session->userdata('user_id'))
->where('purchase_date >=', $start)
->where('purchase_date <=', $end);
$query1 = $qury->get()->result();
$data1 = array();
 foreach ($query1 as $row1)
 {
 $series1['date'][] = $row1->purchase_date;
 $series1['amount'][] = $row1->grand_total_amount;
}

array_push($result,$series1);
        echo json_encode($result);die();
  
    }
 public function chart_exp($start,$end) {
     
                $this->db->select("*")
         ->from('invoice')
         ->where('sales_by',$this->session->userdata('user_id'))
       ->where('date >=', $start)
        ->where('date <=', $end);
        $query = $this->db->get();
        $results=$query->result_array();
        $data = array();
        foreach ($results as $key => $value) {
            $data[$key]['label'] = $value['date'];
            $data[$key]['value'] = $value['gtotal'];
        }
    
         json_encode($data);
      //  $results=$query->result_array();
      //  return $query->result();
      
      
    
       
     

 }
    public function total_expense_product() {
     
        $this->db->select("*");
        $this->db->from('product_purchase_details');
     
        $this->db->where('create_by',$this->session->userdata('user_id'));
   
        $query = $this->db->get();
    
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        }
        return false;
    }
     public function todays_total_sales_amount() {
        $today = date('Y-m-d');
  $this->db->select("sum(gtotal) as gtotal");
        $this->db->from('invoice');
        $this->db->where('sales_by',$this->session->userdata('user_id'));
        $this->db->where('date', $today);
     $query = $this->db->get()->row();
   //  echo $this->db->last_query();
       // if ($query->num_rows() > 0) {
            return $query->gtotal;
      //  }
      //  return false;
    }
  public function today_no_of_sale() {
        $today = date('Y-m-d');
        $this->db->select("*");
        $this->db->from('invoice');
        $this->db->where('sales_by',$this->session->userdata('user_id'));
        $this->db->where('date', $today);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
             return $query->num_rows();
        }
        return false;
    }
      public function today_no_of_ex() {
        $today = date('Y-m-d');
        $this->db->select("*");
        $this->db->from('product_purchase');
        $this->db->where('create_by',$this->session->userdata('user_id'));
        $this->db->where('purchase_date', $today);
        $query = $this->db->get();
       // echo $this->db->last_query();
        if ($query->num_rows() > 0) {
             return $query->num_rows();
        }
        return false;
    }

    
    //Retrieve todays_total_sales_report
    public function todays_total_purchase_report() {
        $today = date('Y-m-d');
        $this->db->select("sum(grand_total_amount) as ttl_purchase_amount");
        $this->db->from('product_purchase');
        $this->db->where('create_by',$this->session->userdata('user_id'));
        $this->db->where('purchase_date', $today);
        $query = $this->db->get()->row();
   //  echo $this->db->last_query();
       // if ($query->num_rows() > 0) {
            return $query->ttl_purchase_amount;
       // }
       // return false;
    }
    public function total_purchase_report($date1,$date2) {
       
        $this->db->select("*");
        $this->db->from('product_purchase');
        $this->db->where('create_by',$this->session->userdata('user_id'));
       
            $this->db->where('purchase_date >=',$date1);
        $this->db->where('purchase_date <=',$date2);
        $query = $this->db->get();
    
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        }
        return false;
    }
    // todays sales product
    public function todays_sale_product() {
        $today = date('Y-m-d');
        $this->db->select("c.product_name,c.price");
        $this->db->from('invoice a');
        $this->db->join('invoice_details b', 'b.invoice_id = a.invoice_id');
        $this->db->join('product_information c', 'c.product_id = b.product_id');
        $this->db->where('a.sales_by',$this->session->userdata('user_id'));
        $this->db->order_by('a.date', 'desc');
        $this->db->where('a.date', $today);
        $this->db->limit('3');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    //Retrieve todays_sales_report
    public function todays_sales_report($per_page, $page) {
        $today = date('Y-m-d');
        $this->db->select("a.*,b.customer_id,b.customer_name");
        $this->db->from('invoice a');
        $this->db->join('customer_information b', 'b.customer_id = a.customer_id');
        $this->db->where('a.sales_by',$this->session->userdata('user_id'));
        $this->db->where('a.date', $today);
      
        $this->db->order_by('a.invoice_id', 'desc');
        $query = $this->db->get();
       // echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }
    // ======================= user sales report ================
    public function user_sales_report($per_page, $page,$from_date,$to_date,$user_id) {
        $this->db->select("sum(gtotal) as amount,count(a.invoice_id) as toal_invoice,a.*,b.first_name,b.last_name");
        $this->db->from('invoice a');
        $this->db->join('users b', 'b.user_id = a.sales_by','left');
        if(!empty($user_id)){
        $this->db->where('a.sales_by', $user_id);    
        }
        $this->db->where('a.date >=', $from_date);
        $this->db->where('a.date <=', $to_date);
        $this->db->limit($per_page, $page);
        $this->db->group_by('a.sales_by');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }
    // ====================== user sales count ==========================
    public function user_sales_count($from_date,$to_date,$user_id){
$this->db->select("sum(a.gtotal) as amount,count(a.invoice_id) as toal_invoice,a.*,b.first_name,b.last_name");
        $this->db->from('invoice a');
        $this->db->join('users b', 'b.user_id = a.sales_by','left');
        if(!empty($user_id)){
        $this->db->where('a.sales_by', $user_id);    
        }
        $this->db->where('a.date >=', $from_date);
        $this->db->where('a.date <=', $to_date);
        $this->db->group_by('a.sales_by');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        }
        return false;
    }

    //Retrieve todays_sales_report_count
    public function todays_sales_report_count() {
        $today = date('Y-m-d');
        $this->db->select("a.*,b.customer_id,b.customer_name");
        $this->db->from('invoice a');
        $this->db->join('customer_information b', 'b.customer_id = a.customer_id');
        $this->db->where('a.sales_by',$this->session->userdata('user_id'));
        $this->db->where('a.date', $today);
        $this->db->order_by('a.invoice_id', 'desc');
        $query = $this->db->get();
        return $query->num_rows();
    }

//     =============== its for purchase_report_category_wise_count =============
    public function purchase_report_category_wise_count() {
        
    }

//    ============= its for purchase_report_category_wise ===============
    public function purchase_report_category_wise($per_page = null, $page = null) {
        $this->db->select('b.product_name, b.product_model, SUM(a.quantity) as quantity, SUM(a.total_amount) as total_amount, d.purchase_date, c.category_name');
        $this->db->group_by('b.product_id, c.category_id');
        $this->db->from('product_purchase_details a');
        $this->db->join('product_information b', 'b.product_id = a.product_id');
        $this->db->join('product_category c', 'c.category_id = b.category_id');
        $this->db->join('product_purchase d', 'd.purchase_id = a.purchase_id');
        $this->db->where('a.create_by',$this->session->userdata('user_id'));
        $this->db->limit($per_page, $page);
        $query = $this->db->get();
        return $query->result();
    }

//    ============= its for purchase_report_category_wise ===============
    public function filter_purchase_report_category_wise($category = null, $from_date = null, $to_date = null, $per_page = null, $page = null) {
        $dateRange = "d.purchase_date BETWEEN '$from_date' AND '$to_date'";
        $this->db->select('b.product_name, b.product_model,b.p_quantity, SUM(a.quantity) as quantity, SUM(a.total) as total_amount, d.purchase_date, c.category_name');
        $this->db->group_by('b.product_id, c.category_id');
        $this->db->from('product_purchase_details a');
        $this->db->join('product_information b', 'b.product_id = a.product_id');
        $this->db->join('product_category c', 'c.category_name = b.category_id');
        $this->db->join('product_purchase d', 'd.purchase_id = a.purchase_id');
        $this->db->where('a.create_by',$this->session->userdata('user_id'));
        if ($category) {
            $this->db->where('b.category_id', $category);
        }
        if ($category && $from_date && $to_date) {
            $this->db->where('b.category_id', $category);
            $this->db->where($dateRange);
        }
        if ($from_date && $to_date) {
            $this->db->where($dateRange);
        }
        $this->db->limit($per_page, $page);
        $query = $this->db->get();
      //  echo $this->db->last_query();
        return $query->result();
    }

//    =============== its for sales_report_category_wise_count =============
    public function sales_report_category_wise_count() {
        
    }

    //    ============= its for sales_report_category_wise ===============
    public function sales_report_category_wise($per_page = null, $page = null) {
        $this->db->select('b.product_name, b.product_model, sum(a.quantity) as quantity, sum(a.total_price) as total_price, d.date, c.category_name');
        $this->db->from('invoice_details a');
        $this->db->join('product_information b', 'b.product_id = a.product_id');
        $this->db->join('product_category c', 'c.category_id = b.category_id');
        $this->db->join('invoice d', 'd.invoice_id = a.invoice_id');
        $this->db->where('a.create_by',$this->session->userdata('user_id'));
        $this->db->group_by('b.product_id, c.category_id');

        $this->db->limit($per_page, $page);
        $query = $this->db->get();
        return $query->result();
    }

    //    ============= its for filter_sales_report_category_wise ===============
    public function filter_sales_report_category_wise($category = null, $from_date = null, $to_date = null, $per_page = null, $page = null) {
        $dateRange = "d.date BETWEEN '$from_date' AND '$to_date'";
        $this->db->select('b.product_name, b.product_model, sum(a.quantity) as quantity, sum(a.total_price) as total_price, d.date, c.category_name');
        $this->db->group_by('b.product_id, c.category_id');
        $this->db->from('invoice_details a');
        $this->db->join('product_information b', 'b.product_id = a.product_id');
        $this->db->join('product_category c', 'c.category_id = b.category_id');
        $this->db->join('invoice d', 'd.invoice_id = a.invoice_id');
        $this->db->where('a.create_by',$this->session->userdata('user_id'));
        if ($category) {
            $this->db->where('b.category_id', $category);
        }
        if ($category && $from_date && $to_date) { 
            $this->db->where('b.category_id', $category);
            $this->db->where($dateRange);
        }
        if ($from_date && $to_date) {
            $this->db->where($dateRange);
        }
        $this->db->limit($per_page, $page);
        $query = $this->db->get();
        return $query->result();
    }

    //Retrieve todays_purchase_report
    public function todays_purchase_report($per_page = null, $page = null) {
        $today = date('Y-m-d');
        $this->db->select("a.*,b.supplier_id,b.supplier_name");
        $this->db->from('product_purchase a');
        $this->db->join('supplier_information b', 'b.supplier_id = a.supplier_id');
        $this->db->where('a.create_by',$this->session->userdata('user_id'));
        $this->db->where('a.purchase_date', $today);
        $this->db->order_by('a.purchase_id', 'desc');
        $this->db->limit($per_page, $page);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    //Retrieve todays_purchase_report count
    public function todays_purchase_report_count() {
        $today = date('Y-m-d');
        $this->db->select("a.*,b.supplier_id,b.supplier_name");
        $this->db->from('product_purchase a');
        $this->db->join('supplier_information b', 'b.supplier_id = a.supplier_id');
        $this->db->where('a.create_by',$this->session->userdata('user_id'));
        $this->db->where('a.purchase_date', $today);
        $this->db->order_by('a.purchase_id', 'desc');
        $this->db->limit('500');
        $query = $this->db->get();
        return $query->num_rows();
    }

    //Total profit report
    public function total_profit_report($perpage, $page) {

        $this->db->select("a.date,a.invoice,b.invoice_id,
            CAST(sum(total_price) AS DECIMAL(16,2)) as total_sale");
        $this->db->select('CAST(sum(`quantity`*`supplier_rate`) AS DECIMAL(16,2)) as total_supplier_rate', FALSE);
        $this->db->select("CAST(SUM(total_price) - SUM(`quantity`*`supplier_rate`) AS DECIMAL(16,2)) AS total_profit");
        $this->db->from('invoice a');
        $this->db->join('invoice_details b', 'b.invoice_id = a.invoice_id');
        $this->db->where('a.sales_by',$this->session->userdata('user_id'));
        $this->db->group_by('b.invoice_id');
        $this->db->order_by('a.invoice', 'desc');
        $this->db->limit($perpage, $page);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    //Total profit report
    public function total_profit_report_count() {

        $this->db->select("a.date,a.invoice,b.invoice_id,sum(total_price) as total_sale");
        $this->db->select('sum(`quantity`*`supplier_rate`) as total_supplier_rate', FALSE);
        $this->db->select("(SUM(total_price) - SUM(`quantity`*`supplier_rate`)) AS total_profit");
        $this->db->from('invoice a');
        $this->db->join('invoice_details b', 'b.invoice_id = a.invoice_id');
        $this->db->where('a.sales_by',$this->session->userdata('user_id'));
        $this->db->group_by('b.invoice_id');
        $this->db->order_by('a.invoice', 'desc');
        $query = $this->db->get();
        return $query->num_rows();
    }

    //Retrieve Monthly Sales Report
    public function monthly_sales_report() {
        $query1 = $this->db->query("
            SELECT 
                date,
                EXTRACT(MONTH FROM STR_TO_DATE(date,'%Y-%m-%d')) as month, 
                COUNT(invoice_id) as total
            FROM 
                invoice
            WHERE 
                EXTRACT(YEAR FROM STR_TO_DATE(date,'%Y-%m-%d'))  >= EXTRACT(YEAR FROM NOW())
            GROUP BY 
                EXTRACT(YEAR_MONTH FROM STR_TO_DATE(date,'%Y-%m-%d'))
            ORDER BY
                month ASC
        ")->result();

        $query2 = $this->db->query("
            SELECT 
                purchase_date,
                EXTRACT(MONTH FROM STR_TO_DATE(purchase_date,'%Y-%m-%d')) as month, 
                COUNT(purchase_id) as total_month
            FROM 
                product_purchase
            WHERE 
                EXTRACT(YEAR FROM STR_TO_DATE(purchase_date,'%Y-%m-%d'))  >= EXTRACT(YEAR FROM NOW())
            GROUP BY 
                EXTRACT(YEAR_MONTH FROM STR_TO_DATE(purchase_date,'%Y-%m-%d'))
            ORDER BY
                month ASC
        ")->result();
        return [$query1, $query2];
    }

    //Retrieve all Report
    public function retrieve_dateWise_SalesReports($from_date, $to_date, $per_page, $page) {
        $this->db->select("a.*,b.*");
        $this->db->from('invoice a');
        $this->db->join('customer_information b', 'b.customer_id = a.customer_id');
        $this->db->where('a.sales_by',$this->session->userdata('user_id'));
        $this->db->where('a.date >=', $from_date);
        $this->db->where('a.date <=', $to_date);
        $this->db->order_by('a.date', 'desc');
        $this->db->limit($per_page, $page);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }
    //due report
     //Retrieve all Report
    public function retrieve_dateWise_DueReports($from_date, $to_date, $per_page, $page) {
        $this->db->select("a.*,b.*,c.*");
        $this->db->from('invoice a');
        $this->db->join('invoice_details c', 'c.invoice_id = a.invoice_id');
        $this->db->join('customer_information b', 'b.customer_id = a.customer_id');
        $this->db->where('a.sales_by',$this->session->userdata('user_id'));
        $this->db->where('a.date >=', $from_date);
        $this->db->where('a.date <=', $to_date);
         $this->db->group_by('a.invoice_id');
        $this->db->order_by('a.invoice', 'desc');
        $this->db->limit($per_page, $page);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    // count sales report data
    public function count_retrieve_dateWise_SalesReports($from_date, $to_date) {
        $this->db->select("a.*,b.*");
        $this->db->from('invoice a');
        $this->db->join('customer_information b', 'b.customer_id = a.customer_id');
        $this->db->where('a.sales_by',$this->session->userdata('user_id'));
        $this->db->where('a.date >=', $from_date);
        $this->db->where('a.date <=', $to_date);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        }
        return false;
    }

    //Retrieve all Report
    public function retrieve_dateWise_PurchaseReports($start_date, $end_date, $per_page, $page) {

        $this->db->select("a.*,b.supplier_id,b.supplier_name");
        $this->db->from('product_purchase a');
        $this->db->join('supplier_information b', 'b.supplier_id = a.supplier_id');
        $this->db->where('a.create_by',$this->session->userdata('user_id'));
        $this->db->where('a.purchase_date >=', $start_date);
        $this->db->where('a.purchase_date <=', $end_date);
        $this->db->group_by('a.purchase_id');
        $this->db->order_by('a.purchase_date', 'desc');
        $this->db->limit($per_page, $page);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    // count purchase report data
    public function count_retrieve_dateWise_PurchaseReports($start_date, $end_date) {
        $this->db->select("a.*,b.supplier_id,b.supplier_name");
        $this->db->from('product_purchase a');
        $this->db->join('supplier_information b', 'b.supplier_id = a.supplier_id');
        $this->db->where('a.create_by',$this->session->userdata('user_id'));
        $this->db->where('a.purchase_date >=', $start_date);
        $this->db->where('a.purchase_date <=', $end_date);
        $this->db->group_by('a.purchase_id');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        }
        return false;
    }

    //Retrieve date wise profit report
    public function retrieve_dateWise_profit_report($start_date, $end_date, $per_page, $page) {
        $this->db->select("a.date,a.invoice,b.invoice_id,
            CAST(sum(total_price) AS DECIMAL(16,2)) as total_sale");
        $this->db->select('CAST(sum(`quantity`*`supplier_rate`) AS DECIMAL(16,2)) as total_supplier_rate', FALSE);
        $this->db->select("CAST(SUM(total_price) - SUM(`quantity`*`supplier_rate`) AS DECIMAL(16,2)) AS total_profit");

        $this->db->from('invoice a');
        $this->db->join('invoice_details b', 'b.invoice_id = a.invoice_id');
        $this->db->where('a.sales_by',$this->session->userdata('user_id'));
        $this->db->where('a.date >=', $start_date);
        $this->db->where('a.date <=', $end_date);

        $this->db->group_by('b.invoice_id');
        $this->db->order_by('a.invoice', 'desc');
        $this->db->limit($per_page, $page);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    //Retrieve date wise profit report
    public function retrieve_dateWise_profit_report_count($start_date, $end_date) {
        $this->db->select("a.date,a.invoice,b.invoice_id,sum(total_price) as total_sale");
        $this->db->select('sum(`quantity`*`supplier_rate`) as total_supplier_rate', FALSE);
        $this->db->select("(SUM(total_price) - SUM(`quantity`*`supplier_rate`)) AS total_profit");
        $this->db->from('invoice a');
        $this->db->join('invoice_details b', 'b.invoice_id = a.invoice_id');
        $this->db->where('a.sales_by',$this->session->userdata('user_id'));
        $this->db->where('a.date >=', $start_date);
        $this->db->where('a.date <=', $end_date);
        $this->db->group_by('b.invoice_id');
        $this->db->order_by('a.invoice', 'desc');
        $query = $this->db->get();
        return $query->num_rows();
    }

    //Product wise sales report
    public function product_wise_report() {
        $today = date('Y-m-d');
        $this->db->select("a.*,b.customer_id,b.customer_name");
        $this->db->from('invoice a');
        $this->db->join('customer_information b', 'b.customer_id = a.customer_id');
        $this->db->where('a.sales_by',$this->session->userdata('user_id'));
        $this->db->where('a.date', $today);
        $this->db->order_by('a.invoice_id', 'desc');
        $this->db->limit('500');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    //RETRIEVE DATE WISE SINGE PRODUCT REPORT
    public function retrieve_product_sales_report($perpage, $page) {
        $this->db->select("a.*,b.product_name,b.product_model,c.date,c.invoice,c.gtotal,d.customer_name");
        $this->db->from('invoice_details a');
        $this->db->join('product_information b', 'b.product_id = a.product_id');
        $this->db->join('invoice c', 'c.invoice_id = a.invoice_id');
        $this->db->join('customer_information d', 'd.customer_id = c.customer_id');
        $this->db->where('a.create_by',$this->session->userdata('user_id'));
        $this->db->order_by('c.date', 'desc');
        $this->db->limit($perpage, $page);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    //RETRIEVE DATE WISE SINGE PRODUCT REPORT
    public function retrieve_product_sales_report_count() {
        $this->db->select("a.*,b.product_name,b.product_model,c.date,c.gtotal,d.customer_name");
        $this->db->from('invoice_details a');
        $this->db->join('product_information b', 'b.product_id = a.product_id');
        $this->db->join('invoice c', 'c.invoice_id = a.invoice_id');
        $this->db->join('customer_information d', 'd.customer_id = c.customer_id');
        $this->db->where('a.create_by',$this->session->userdata('user_id'));
        $this->db->order_by('c.date', 'desc');
        $query = $this->db->get();
        return $query->num_rows();
    }

    //RETRIEVE DATE WISE SEARCH SINGLE PRODUCT REPORT
    public function retrieve_product_search_sales_report($start_date, $end_date,$product_id, $perpage, $page) {
        $this->db->select("a.*,b.product_name,b.product_model,b.cost_perslab,c.invoice,c.date,d.customer_name");
        $this->db->from('invoice_details a');
        $this->db->join('product_information b', 'b.product_id = a.product_id');
        $this->db->join('invoice c', 'c.invoice_id = a.invoice_id');
        $this->db->join('customer_information d', 'd.customer_id = c.customer_id');
        $this->db->where('a.create_by',$this->session->userdata('user_id'));
        $this->db->where('b.product_id', $product_id);
        $this->db->where('c.date >=', $start_date);
        $this->db->where('c.date <=', $end_date);
        $this->db->order_by('c.date', 'desc');
        $this->db->limit($perpage, $page);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;

    }

    //RETRIEVE DATE WISE SEARCH SINGLE PRODUCT REPORT
    public function retrieve_product_search_sales_report_count($start_date, $end_date,$product_id) {
        $this->db->select("a.*,b.product_name,b.product_model,c.date,d.customer_name");
        $this->db->from('invoice_details a');
        $this->db->join('product_information b', 'b.product_id = a.product_id');
        $this->db->join('invoice c', 'c.invoice_id = a.invoice_id');
        $this->db->join('customer_information d', 'd.customer_id = c.customer_id');
        $this->db->where('a.create_by',$this->session->userdata('user_id'));
        $this->db->where('b.product_id',$product_id);
        $this->db->where('c.date >=', $start_date);
        $this->db->where('c.date <=', $end_date);
        $this->db->order_by('c.date', 'desc');
        $query = $this->db->get();
        return $query->num_rows();
    }
   public function overall_sale_no(){
        $this->db->select('*');
        $this->db->from('invoice');
        $this->db->where('sales_by',$this->session->userdata('user_id'));
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
             return $query->num_rows();
        }
        return false;
    }

      public function overall_exp_no(){
        $this->db->select('*');
        $this->db->from('product_purchase');
        $this->db->where('create_by',$this->session->userdata('user_id'));
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
             return $query->num_rows();
        }
        return false;
    }
    public function product_list(){
        $this->db->select('*');
        $this->db->from('product_information');
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

    // date to date product stock report



//BANKING ENTRY
    public function daily_closing_entry($data) {
        $this->db->insert('daily_closing', $data);
    }








    // This function will find out all closing information of daily closing.
    
    
 public function accounts_closing_data() {
        $CI = & get_instance();     

        $w = & get_instance();
        $w->load->model('Ppurchases');
        $CI->load->model('Web_settings');

        $last_closing_amount = $this->get_last_closing_amount();
        $cash_in = $this->cash_data_receipt();
        $cash_out = $this->cash_data();
        if ($last_closing_amount != null) {
            $last_closing_amount = $last_closing_amount[0]['amount'];
            $cash_in_hand = ($last_closing_amount+$cash_in) - $cash_out;
        } else {
            $last_closing_amount = 0;
            $cash_in_hand = $cash_in - $cash_out;
        }
         $currency_details = $CI->Web_settings->retrieve_setting_editdata();
         


        $company_info = $w->Ppurchases->retrieve_company();
        $setting=  $CI->Web_settings->retrieve_setting_editdata();


        return array(
            "last_day_closing" => number_format($last_closing_amount, 2, '.', ','),
            "cash_in"          => number_format($cash_in, 2, '.', ','),
              'currency'       => $currency_details[0]['currency'],
            "cash_out"         => number_format($cash_out, 2, '.', ','),


            'company'=>(!empty($datacontent[0]['company_name'])?$datacontent[0]['company_name']:$company_info[0]['company_name']),   
            'email'=>(!empty($datacontent[0]['email'])?$datacontent[0]['email']:$company_info[0]['email']),   


            "cash_in_hand"     => number_format($cash_in_hand, 2, '.', ',')
        );
    }

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
        public function get_last_closing_amount() {
        $sql = "SELECT amount FROM daily_closing WHERE date = (SELECT MAX(date) FROM daily_closing)";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        if ($result) {
            return $result;
        } else {
            return FALSE;
        }
    }
    
    
    
    
    
    
    
    
    
    
        public function cash_data_receipt() {
        //-----------
        $cash = 0;
        $datse = date('Y-m-d');
        $this->db->select('sum(Debit) as amount');
        $this->db->from('acc_transaction');
        $this->db->where('COAID', 1020101);
        $this->db->where('VDate', $datse);
        $result_amount = $this->db->get();
      
        $amount = $result_amount->result_array();
        $cash += $amount[0]['amount'];
        return $cash;
    }
        public function cash_data() {
        //-----------
        $cash = 0;
        $datse = date('Y-m-d');
        $this->db->select('sum(Credit) as amount');
        $this->db->from('acc_transaction');
        $this->db->where('COAID', 1020101);
        $this->db->where('VDate', $datse);
        $result_amount = $this->db->get();
        $amount = $result_amount->result_array();
        $cash += $amount[0]['amount'];
        return $cash;
    }

    // ================= Shipping cost ===========================
        public function retrieve_dateWise_Shippingcost($from_date, $to_date, $per_page, $page) {
        $this->db->select("a.*");
        $this->db->from('invoice a');
        $this->db->where('a.sales_by',$this->session->userdata('user_id'));
        $this->db->where('a.date >=', $from_date);
        $this->db->where('a.date <=', $to_date);
         $this->db->group_by('a.invoice_id');
        $this->db->order_by('a.date', 'desc');
        $this->db->limit($per_page, $page);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }
    //stock report pdg
        
// sales return data
        public function sales_return_list($perpage, $page,$start,$end) {
        $this->db->select('a.net_total_amount,a.*,b.customer_name');
        $this->db->from('product_return a');
        $this->db->join('customer_information b', 'b.customer_id = a.customer_id');
        $this->db->where('b.create_by',$this->session->userdata('user_id'));
        $this->db->where('usablity', 1);
        $this->db->where('a.date_return >=', $start);
        $this->db->where('a.date_return <=', $end);
        $this->db->group_by('a.invoice_id', 'desc');
        $this->db->limit($perpage, $page);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }
    // count sales return
      public function sales_return_count($start,$end) {
        $this->db->select('a.net_total_amount,a.*,b.customer_name');
        $this->db->from('product_return a');
        $this->db->join('customer_information b', 'b.customer_id = a.customer_id');
        $this->db->where('b.create_by',$this->session->userdata('user_id'));
        $this->db->where('usablity', 1);
        $this->db->where('a.date_return >=', $start);
        $this->db->where('a.date_return <=', $end);
        $this->db->group_by('a.invoice_id', 'desc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        }
        return false;
    }
    // return supplier
     public function supplier_return($perpage, $page,$start,$end) {
        $this->db->select('a.net_total_amount,a.*,b.supplier_name');
        $this->db->from('product_return a');
        $this->db->join('supplier_information b', 'b.supplier_id = a.supplier_id');
        $this->db->where('a.create_by',$this->session->userdata('user_id'));
        $this->db->where('a.usablity', 2);
        $this->db->where('a.date_return >=', $start);
        $this->db->where('a.date_return <=', $end);
        $this->db->group_by('a.purchase_id', 'desc');
        $this->db->limit($perpage, $page);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }
    // count supplier return list
    public function count_supplier_return($start,$end) {
        $this->db->select('a.net_total_amount,a.*,b.supplier_name');
        $this->db->from('product_return a');
        $this->db->join('supplier_information b', 'b.supplier_id = a.supplier_id');
        $this->db->where('a.create_by',$this->session->userdata('user_id'));
        $this->db->where('a.usablity', 2);
        $this->db->where('a.date_return >=', $start);
        $this->db->where('a.date_return <=', $end);
        $this->db->group_by('a.purchase_id', 'desc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        }
        return false;
    }

// tax report query
 public function retrieve_dateWise_tax($from_date, $to_date, $per_page, $page) {
        $this->db->select("a.*");
        $this->db->from('invoice a');
        $this->db->where('a.sales_by',$this->session->userdata('user_id'));
        $this->db->where('a.date >=', $from_date);
        $this->db->where('a.date <=', $to_date);
         $this->db->group_by('a.invoice_id');
        $this->db->order_by('a.date', 'desc');
        $this->db->limit($per_page, $page);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }


   public function userList(){
        $this->db->select("*");
        $this->db->from('users');
        $this->db->where('create_by',$this->session->userdata('user_id'));

        $this->db->order_by('first_name', 'asc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    public function yearly_invoice_report($month=null){

        $result = $this->db->query("
                            SELECT sum(gtotal) as total_sale FROM `invoice`
                            WHERE 'sales_by' = '".$this->session->userdata('user_id')."' AND MONTH(date)  = $month
                                AND YEAR(date) = YEAR(CURRENT_TIMESTAMP);
                            ");

        return $result->row();
    }

     public function yearly_purchase_report($month=null){

        $result = $this->db->query("
                            SELECT sum(grand_total_amount) as total_purchase FROM `product_purchase`
                            WHERE 'create_by' = '".$this->session->userdata('user_id')."' AND MONTH(purchase_date)  = $month
                                AND YEAR(purchase_date) = YEAR(CURRENT_TIMESTAMP);
                            ");

        return $result->row();
    }



    /// Total Report part

        public function total_sales_amount($date1,$date2) {
       
        $this->db->select("sum(gtotal) as totalsales");
        $this->db->from('invoice');
        $this->db->where('sales_by',$this->session->userdata('user_id'));
        $this->db->where('date >=',$date1);
        $this->db->where('date <=',$date2);
        $query = $this->db->get()->row();
   
      //  echo $this->db->last_query();

        return $query->totalsales;
    }



      public function overall_sales() {
       
        $this->db->select("sum(gtotal) as totalsales");
        $this->db->from('invoice');
        $this->db->where('sales_by',$this->session->userdata('user_id'));
 
        $query = $this->db->get()->row();
   
        return $query->totalsales;
    }

     public function total_purchase_amount($date1,$date2) {
       
    
        $this->db->select("sum(grand_total_amount) as totalpurchase");
        $this->db->from('product_purchase');
        $this->db->where('create_by',$this->session->userdata('user_id'));
        $this->db->where('purchase_date >=',$date1);
        $this->db->where('purchase_date <=', $date2);
        $query = $this->db->get();
 //  return $query->totalpurchase;
          //  echo $this->db->last_query();
  
        if(!empty($query->row()->totalpurchase)){
            return $query->row()->totalpurchase;
        }else{
            return 0;
        }
    }
    public function overall_purchase_amt() {
       
    
        $this->db->select("sum(grand_total_amount) as totalpurchase");
        $this->db->from('product_purchase');
        $this->db->where('create_by',$this->session->userdata('user_id'));
       
        $query = $this->db->get()->row();
        return $query->totalpurchase;
  
    }
    public function total_expense_amount($date1,$date2) {
       

        $this->db->select("*");
        $this->db->where('PHeadName','Expence');
        $this->db->from('acc_coa');
        $query = $this->db->get();
        $result =  $query->result_array();
        $totalamount = 0;
        foreach ($result as $expense) {
           $amount = $this->db->select('ifnull(sum(Debit),0) as amount')->from('acc_transaction')->where('VDate >=',$date1)->where('VDate <=',$date2)->where('COAID',$expense['HeadCode'])->get()->row();
           $totalamount = $totalamount+$amount->amount;
        }

        return $totalamount;
    }

// Total Employee Salary
     public function total_employee_salary($date1,$date2) {
      
        $this->db->select("sum(total_salary) as totalsalary");
        $this->db->from('employee_salary_payment');
        $this->db->where('paid_by',$this->session->userdata('user_id'));
        $this->db->where('payment_date >=',$date1);
      $this->db->where('payment_date <=',$date2);
        $query = $this->db->get();
        if(!empty($query->row()->totalsalary)){
            return $query->row()->totalsalary;
        }else{
            return 0.00;
        }
    }

    // Total Employee Salary
     public function total_service_amount($date1,$date2) {
     
        $this->db->select("sum(total_amount) as totalservice");
        $this->db->from('service_invoice');
        $this->db->where('create_by',$this->session->userdata('user_id'));
        $this->db->where('date >=',$date1);
        $this->db->where('date <=',$date2);
        $query = $this->db->get();
      //  if(!empty($query->row()->totalservice)){
         //   return $query->row()->totalservice;
      //  }else{
        //    return 0.00;
       // }
    }
 public function sales_paid(){
  $this->db->select("sum(amount_pay_usd) as totalpaid");
        $this->db->from('invoice');
        $this->db->where('sales_by',$this->session->userdata('user_id'));
   
 $query = $this->db->get();

//   echo $this->db->last_query();

 if ($query->num_rows() > 0) {
           return $query->row()->totalpaid;
        }
        return false;
 }
  public function today_sale_paid(){
     $today = date('Y-m-d');
  $this->db->select("sum(amount_pay_usd) as totalpaid");
        $this->db->from('invoice');
        $this->db->where('sales_by',$this->session->userdata('user_id'));
    $this->db->where('date',$today);
 $query = $this->db->get();
//echo $this->db->last_query();



 if ($query->num_rows() > 0) {
           return $query->row()->totalpaid;
        }
        return false;
 }
   public function today_sale_due(){
     $today = date('Y-m-d');
  $this->db->select("sum(due_amount_usd) as totaldue");
        $this->db->from('invoice');
        $this->db->where('sales_by',$this->session->userdata('user_id'));
    $this->db->where('date',$today);
 $query = $this->db->get();

 if ($query->num_rows() > 0) {
           return $query->row()->totaldue;
        }
        return false;
 }
 public function sales_due(){
  $this->db->select("sum(due_amount_usd) as totaldue");
        $this->db->from('invoice');
        $this->db->where('sales_by',$this->session->userdata('user_id'));
   
 $query = $this->db->get();

 if ($query->num_rows() > 0) {
         return $query->row()->totaldue;
          
        }
       }
  public function exp_paid(){
  $this->db->select("sum(amount_pay_usd) as totalpaid");
        $this->db->from('product_purchase');
        $this->db->where('create_by',$this->session->userdata('user_id'));
   
 $query = $this->db->get();

 if ($query->num_rows() > 0) {
           return $query->row()->totalpaid;
        }
        return false;
 }


  public function today_ex_due(){
       $today = date('Y-m-d');
  $this->db->select("sum(due_amount_usd) as due_amount_usd");
        $this->db->from('product_purchase');
        $this->db->where('create_by',$this->session->userdata('user_id'));
      $this->db->where('purchase_date',$today);
 $query = $this->db->get();

//  echo $this->db->last_query();

 if ($query->num_rows() > 0) {
           return $query->row()->due_amount_usd;
        }
        return false;
 }





  public function today_ex_paid(){
       $today = date('Y-m-d');
  $this->db->select("sum(amount_pay_usd) as amount_pay_usd");
        $this->db->from('product_purchase');
        $this->db->where('create_by',$this->session->userdata('user_id'));
      $this->db->where('purchase_date',$today);
 $query = $this->db->get();

 if ($query->num_rows() > 0) {
           return $query->row()->amount_pay_usd;
        }
        return false;
 }
 public function exp_due(){
  $this->db->select("sum(due_amount_usd) as totaldue");
        $this->db->from('product_purchase');
        $this->db->where('create_by',$this->session->userdata('user_id'));
   
 $query = $this->db->get();

 if ($query->num_rows() > 0) {
         return $query->row()->totaldue;
          
        }
       
 }
    public function dashboard_query1($invoice_id,$customer_id){
       $sql =  "SELECT (SELECT SUM(total_price) FROM invoice_details a JOIN invoice b ON b.invoice_id = a.invoice_id WHERE a.invoice_id = '" . $invoice_id . "' AND 'create_by' = '".$this->session->userdata('user_id')."' AND b.customer_id = '" . $customer_id . "') as gtotal, 
    (SELECT SUM(amount_pay_usd) FROM invoice_details a JOIN invoice b ON b.invoice_id = a.invoice_id WHERE a.invoice_id = '" . $invoice_id . "' AND 'create_by' = '".$this->session->userdata('user_id')."' AND b.customer_id = '" . $customer_id . "') as total_paid, 
    (SELECT SUM(due_amount) FROM invoice_details a JOIN invoice b ON b.invoice_id = a.invoice_id WHERE a.invoice_id = '" . $invoice_id . "' AND 'create_by' = '".$this->session->userdata('user_id')."' AND b.customer_id = '" . $customer_id . "') as total_due, 
    (SELECT SUM(total_discount) FROM invoice_details a JOIN invoice b ON b.invoice_id = a.invoice_id WHERE a.invoice_id = '" . $invoice_id . "' AND 'create_by' = '".$this->session->userdata('user_id')."' AND b.customer_id = '" . $customer_id . "') as total_discount";
    return $sql;

    }

}
