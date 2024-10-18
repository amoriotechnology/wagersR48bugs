<?php defined('BASEPATH') OR exit('No direct script access allowed');



class Accounts_model extends CI_Model {

    public function __construct() {

        parent::__construct();

        $this->load->library('Smsgateway');

        $this->auth->check_admin_auth();

    }
    
    public function tax_information_report(){
     $this->db->select('*');
    $this->db->from('tax_information');
  
    $this->db->where('created_by', $this->session->userdata('user_id'));
  

    $query = $this->db->get();

    if ($query->num_rows() > 0) {
        return $query->result_array();
    }
}



public function insert_customer_receive(){
    $auto_increment = rand();
    $voucher_no = addslashes(trim($this->input->post('txtVNo',TRUE)));
    $Vtype = "CustomerReceive";
    $VDate = $this->input->post('dtpDate',TRUE);
    $paytype = $this->input->post('paytype',TRUE);
    $bank_name = $this->input->post('bank_id',TRUE);
    $Narration = addslashes(trim($this->input->post('txtRemarks',TRUE)));
    $total_amount = $this->input->post('txtAmount',TRUE);
    $CreateBy = $this->session->userdata('user_id');
  
    $data1 = array(
        'type' => $Vtype,
        'voucher_no' => $voucher_no,
        'date' => $VDate,
        'remark' => $Narration,
        'bank' => $bank_name,
        'pay_type' => $paytype,
        'g_total1' => $total_amount,
        'cust_incremnt_id' => $auto_increment,
        'created_by' => $CreateBy,
    );
  
    $this->db->insert('accounts', $data1);
//    echo $this->db->last_query();
  
    $customer_id = $this->input->post('customer_id',TRUE);
    $txtCode = $this->input->post('txtCode',TRUE);
    $txtAmount = $this->input->post('txtAmount',TRUE);
  
    $contrainsert = array(
        'cust_incremnt_id' => $auto_increment,
        'account_name' => $customer_id,
        'account_id' => $txtCode,
        'gtotal' => $txtAmount,
        'created_by' => $CreateBy
    );
  
    $this->db->insert('account_details', $contrainsert);
    // echo $this->db->last_query(); die();

    
    redirect('accounts/customer_receive_manager'); // Correct placement of redirect
  
    return true; // Moved return statement here
  }
  


 public function customer_receive_indexpage(){
    $this->db->select('*');
    $this->db->from('accounts');
    $this->db->join('account_details', 'accounts.cust_incremnt_id = account_details.cust_incremnt_id', 'left'); // Joining on cust_incremnt_id
    $this->db->where('accounts.created_by', $this->session->userdata('user_id'));
 
    $this->db->where('type','CustomerReceive');
    $query = $this->db->get();
     if ($query->num_rows() > 0) {
        return $query->result_array();
    }
}




public function customer_receive_edit($cust_incremnt_id){
    $this->db->select('*');
    $this->db->from('accounts');
    $this->db->join('account_details', 'accounts.cust_incremnt_id = account_details.cust_incremnt_id', 'left');
  ///   $this->db->join('customer_information', 'account_details.account_name = customer_information.customer_name');
    $this->db->where('accounts.created_by', $this->session->userdata('user_id'));
    $this->db->where('accounts.cust_incremnt_id', $cust_incremnt_id);
    $this->db->where('account_details.cust_incremnt_id', $cust_incremnt_id);
    $query = $this->db->get();
  ///  echo $this->db->last_query();
    if ($query === false) {
        echo $this->db->error(); // Display the error for debugging
        return false;
    }
    if ($query->num_rows() > 0) {
        return $query->result_array();
    }
    return false; // No matching records found
}







  


















    public function accounts_expense_service($date=null){
  if($date) {
$split=explode(' to ',$date);
$start =  $split[0];
$end = $split[1];
}
        $this->db->select('c.supplier_name,a.bill_number,a.acc_cat,a.acc_cat_name,a.service_provider_name,a.serviceprovider_id,a.bill_date,a.memo_details,b.description,b.total_price,a.gtotals');
        $this->db->from('service a');
        $this->db->join('service_provider_detail b', 'b.serviceprovider_id = a.serviceprovider_id');
         $this->db->join('supplier_information c', 'c.supplier_name = a.service_provider_name');
       //  $this->db->group_by('a.chalan_no');
       if($date){
 $this->db->where('a.purchase_date > ', $start) ;
            $this->db->where('a.purchase_date < ', $end) ;

       }
        $this->db->where('a.create_by', $this->session->userdata('user_id')) ;

        $query = $this->db->get();
  // echo $this->db->last_query();
        return $query->result();
}
    
    public function view_expensedataReport()
    {
        $this->db->select('pp.*,si.* , si.supplier_name as suppliers,p.*, pd.*, pi.*');
        $this->db->from('product_purchase pp');
        $this->db->join('supplier_information si','pp.supplier_id=si.supplier_id');
        $this->db->join('payment p','p.payment_id=pp.payment_id');
        $this->db->join('product_purchase_details pd','pd.purchase_id=pp.purchase_id');
        $this->db->join('product_information pi','pi.product_id=pd.product_id');
        $this->db->where('pp.create_by' ,$this->session->userdata('user_id'));
        $query = $this->db->get();
        // echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }

public function create_customer_receive(){
    
}

    public function get_expensedataReport()
    {
     
        $this->db->select('pp.*, pp.paid_amount as total_amountpaidexpense, si.* , si.supplier_name as suppliers, pd.purchase_id, pd.product_id, pi.*');
        $this->db->from('product_purchase pp');
        $this->db->join('supplier_information si', 'pp.supplier_id=si.supplier_id');
        $this->db->join('product_purchase_details pd', 'pd.purchase_id=pp.purchase_id');
        $this->db->join('product_information pi', 'pi.product_id=pd.product_id');
        $this->db->where('pp.create_by', $this->session->userdata('user_id'));

        $query = $this->db->get();
        
        // echo  $this->db->last_query();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }
    
    
    public function getexpenseDateallResults($date = null)
    {
        if($date) {
            $split=explode(' to ',$date);
            $start =  $split[0];
            $end = $split[1];
        }

        $this->db->select('pp.*, pp.paid_amount as total_amountpaidexpense, si.* , si.supplier_name as suppliers, pd.purchase_id, pd.product_id, pi.*');
        $this->db->from('product_purchase pp');
        $this->db->join('supplier_information si', 'pp.supplier_id=si.supplier_id');
        $this->db->join('product_purchase_details pd', 'pd.purchase_id=pp.purchase_id');
        $this->db->join('product_information pi', 'pi.product_id=pd.product_id');
        $this->db->where('pp.create_by', $this->session->userdata('user_id'));
        
        if($date) {
          $this->db->where('pp.payment_due_date >',$start );
          $this->db->where('pp.payment_due_date <',$end ); 
        }


        $query = $this->db->get();

        // echo $this->db->last_query();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }
    
    
    
    
    
    public function view_salesdataReport()
    {
        $this->db->select('i.*, ci.*, d.*, pi.*');
        $this->db->from('invoice i');
        $this->db->join('customer_information ci','ci.customer_id=i.customer_id');
        $this->db->join('invoice_details d','d.invoice_id=i.invoice_id');
        $this->db->join('product_information pi','pi.product_id=d.product_id');
        $this->db->where('i.sales_by' ,$this->session->userdata('user_id'));
        $query = $this->db->get();
        // echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }


    public function get_salesdataReport()
    {
        $this->db->select('i.*,i.paid_amount as total_amountpaid, ci.*, d.*, pi.*');
        $this->db->from('invoice i');
        $this->db->join('customer_information ci','ci.customer_id=i.customer_id');
        $this->db->join('invoice_details d','d.invoice_id=i.invoice_id');
        $this->db->join('product_information pi','pi.product_id=d.product_id');
        $this->db->where('i.sales_by' ,$this->session->userdata('user_id'));

        $query = $this->db->get();
// echo $this->db->last_query(); die();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }
    
    public function getDateallResults($date = null)
    {
        if($date) {
            $split=explode(' to ',$date);
            $start =  $split[0];
            $end = $split[1];
        }
        
        $this->db->select('i.*,i.paid_amount as total_amountpaid, ci.*, d.*, pi.*');
        $this->db->from('invoice i');
        $this->db->join('customer_information ci','ci.customer_id=i.customer_id');
        $this->db->join('invoice_details d','d.invoice_id=i.invoice_id');
        $this->db->join('product_information pi','pi.product_id=d.product_id');
        $this->db->where('i.sales_by' ,$this->session->userdata('user_id'));
        
        if($date) {
          $this->db->where('i.payment_due_date >',$start );
          $this->db->where('i.payment_due_date <',$end ); 
        }

        $query = $this->db->get();
       // echo $this->db->last_query(); die();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }
    
    
    
    
    public function get_total_sale_amount($date = null) {
       
    if($date) {
    $split=explode(' to ',$date);
    $start =  $split[0];
    $end = $split[1];
    }
        $this->db->select("sum(gtotal) as grand_total,sum(total_amount) as product_sold");
        $this->db->from('invoice');
        $this->db->where('status', 1);
        $this->db->where('sales_by',$this->session->userdata('user_id'));
           if($date) {
   $this->db->where('date >',$start );
      $this->db->where('date <',$end );
     }
        $query = $this->db->get();
        return $query->result_array();
    
    }
    


 

    public function get_service_pro() {
        $this->db->select("sum(total_price) as grand_sp,productname");
        $this->db->from('service_provider_detail');
         $this->db->group_by('productname');
        $this->db->where('create_by',$this->session->userdata('user_id'));
        $query = $this->db->get();
        return $query->result_array();
    
    }
    
    
      public function get_closing_report($date = null) {
       
    if($date) {
        $split=explode(' to ',$date);
        $start =  $split[0];
        $end = $split[1];
        }
       
       
       
         $this->db->select("account_category,account_subcat,sum(paid_amount) as amountss,");
         $this->db->from('invoice');
         $this->db->where('status', 1);
         $this->db->group_by('account_category');
         $this->db->where('sales_by',$this->session->userdata('user_id'));
          
         if($date) {
         $this->db->where('date >',$start );
         $this->db->where('date <',$end );
         }


         $query = $this->db->get();
          
         return $query->result_array();
 
    }
    
    
    
    
    
public function get_receivables_arec($date= null) {
    if($date) {
$split=explode(' to ',$date);
$start =  $split[0];
$end = $split[1];
}
   // $dateRange = "date BETWEEN '$start' AND '$end'";
$this->db->select("sum(paid_amount) as arec_trade, account_category, sub_category");
$this->db->from('invoice');
$this->db->where('status', 1);
$this->db->group_by('account_category, sub_category'); // Include both columns in GROUP BY
$this->db->where('sales_by', $this->session->userdata('user_id'));

if ($date) {
   $this->db->where('date >', $start);
   $this->db->where('date <', $end);
}

$query = $this->db->get();
 //   echo $this->db->last_query();
    return $query->result_array();
}




 public function get_receivables_arec2($date= null) {
     
    if($date) {
        $split=explode(' to ',$date);
        $start =  $split[0];
        $end = $split[1];
        }
       

            $this->db->select("sum(paid_amount) as arec_trade,account_category,sub_category");
            $this->db->from('invoice');
            $this->db->where('status', 1);
            $this->db->group_by('sub_category');
            $this->db->where('sales_by',$this->session->userdata('user_id'));
            if($date) {
                $this->db->where('date >',$start );
                $this->db->where('date <',$end );
                }
       
         
             $query = $this->db->get();
            // echo $this->db->last_query();
            return $query->result_array();
        }
    






 public function invoice_paid_amount_bs($date=null){
  if($date) {
$split=explode(' to ',$date);
$start =  $split[0];
$end = $split[1];
}
        $this->db->select('sum(paid_amount) as invoice_paid_amount');
        $this->db->from('invoice');
         if($date){
          $this->db->where('date > ', $start) ;
            $this->db->where('date < ', $end) ;
         }
        $this->db->where('sales_by', $this->session->userdata('user_id')) ;
      
        $query = $this->db->get();
        return $query->result();
}
public function purchase_paid_amount_bs($date=null){
  if($date) {
$split=explode(' to ',$date);
$start =  $split[0];
$end = $split[1];
}
        $this->db->select('sum(paid_amount) as purchase_paid_amount');
        $this->db->from('product_purchase');
       if($date){
 $this->db->where('purchase_date > ', $start) ;
            $this->db->where('purchase_date < ', $end) ;

       }
        $this->db->where('create_by', $this->session->userdata('user_id')) ;
      
        $query = $this->db->get();
        return $query->result();
}
public function invoice_paid_amount($date = null)
{
    $results = array();

    if ($date) {
        $split = explode(' to ', $date);
        $startDate = $split[0];
        $endDate = $split[1];

        $startYear = date('Y', strtotime($startDate));
        $endYear = date('Y', strtotime($endDate));

        for ($year = $startYear; $year <= $endYear; $year++) {
            $startOfYear = $year . '-01-01';
            $endOfYear = $year . '-12-31';

            $this->db->select('sum(paid_amount) as invoice_paid_amount');
            $this->db->from('invoice');
            $this->db->where('date >=', $startOfYear);
            $this->db->where('date <=', $endOfYear);
            $this->db->where('sales_by', $this->session->userdata('user_id'));

            $query = $this->db->get();
            $results[$year] = $query->row()->invoice_paid_amount;
        }
    } else {
        $currentYear = date('Y');
        $prevYear = $currentYear - 1;

        $startOfYear = $currentYear . '-01-01';
        $endOfYear = date('Y-m-d'); // Today's date

        $this->db->select('sum(paid_amount) as invoice_paid_amount');
        $this->db->from('invoice');
        $this->db->where('date >=', $startOfYear);
        $this->db->where('date <=', $endOfYear);
        $this->db->where('sales_by', $this->session->userdata('user_id'));

        $query = $this->db->get();
        $results[$currentYear] = $query->row()->invoice_paid_amount;

        $startOfYear = $prevYear . '-01-01';
        $endOfYear = $prevYear . '-' . date('m-d'); // Previous year's today's date

        $this->db->select('sum(paid_amount) as invoice_paid_amount');
        $this->db->from('invoice');
        $this->db->where('date >=', $startOfYear);
        $this->db->where('date <=', $endOfYear);
        $this->db->where('sales_by', $this->session->userdata('user_id'));

        $query = $this->db->get();
        $results[$prevYear] = $query->row()->invoice_paid_amount;
    }

    return $results;
}
public function provider_paid_amount($date=null){
     $results1 = array();

    if ($date) {
        $split = explode(' to ', $date);
        $startDate = $split[0];
        $endDate = $split[1];

        $startYear = date('Y', strtotime($startDate));
        $endYear = date('Y', strtotime($endDate));

        for ($year = $startYear; $year <= $endYear; $year++) {
            $startOfYear = $year . '-01-01';
            $endOfYear = $year . '-12-31';

            $this->db->select('sum(amount_paids) as purchase_paid_amount');
            $this->db->from('service');
            $this->db->where('bill_date >=', $startOfYear);
            $this->db->where('bill_date <=', $endOfYear);
            $this->db->where('create_by', $this->session->userdata('user_id'));

            $query = $this->db->get();
            $results1[$year] = $query->row()->purchase_paid_amount;
        }
    } else {
        $currentYear = date('Y');
        $prevYear = $currentYear - 1;

        $startOfYear = $currentYear . '-01-01';
        $endOfYear = date('Y-m-d'); // Today's date

        $this->db->select('sum(amount_paids) as purchase_paid_amount');
        $this->db->from('service');
        $this->db->where('bill_date >=', $startOfYear);
        $this->db->where('bill_date <=', $endOfYear);
        $this->db->where('create_by', $this->session->userdata('user_id'));

        $query = $this->db->get();
        $results1[$currentYear] = $query->row()->purchase_paid_amount;

        $startOfYear = $prevYear . '-01-01';
        $endOfYear = $prevYear . '-' . date('m-d'); // Previous year's today's date

        $this->db->select('sum(amount_paids) as purchase_paid_amount');
        $this->db->from('service');
        $this->db->where('bill_date >=', $startOfYear);
        $this->db->where('bill_date <=', $endOfYear);
        $this->db->where('create_by', $this->session->userdata('user_id'));

        $query = $this->db->get();
        $results1[$prevYear] = $query->row()->purchase_paid_amount;
    }

    return $results1;
}
public function purchase_paid_amount($date = null)
{
    $results1 = array();

    if ($date) {
        $split = explode(' to ', $date);
        $startDate = $split[0];
        $endDate = $split[1];

        $startYear = date('Y', strtotime($startDate));
        $endYear = date('Y', strtotime($endDate));

        for ($year = $startYear; $year <= $endYear; $year++) {
            $startOfYear = $year . '-01-01';
            $endOfYear = $year . '-12-31';

            $this->db->select('sum(paid_amount) as purchase_paid_amount');
            $this->db->from('product_purchase');
            $this->db->where('purchase_date >=', $startOfYear);
            $this->db->where('purchase_date <=', $endOfYear);
            $this->db->where('create_by', $this->session->userdata('user_id'));

            $query = $this->db->get();
            $results1[$year] = $query->row()->purchase_paid_amount;
        }
    } else {
        $currentYear = date('Y');
        $prevYear = $currentYear - 1;

        $startOfYear = $currentYear . '-01-01';
        $endOfYear = date('Y-m-d'); // Today's date

        $this->db->select('sum(paid_amount) as purchase_paid_amount');
        $this->db->from('product_purchase');
        $this->db->where('purchase_date >=', $startOfYear);
        $this->db->where('purchase_date <=', $endOfYear);
        $this->db->where('create_by', $this->session->userdata('user_id'));

        $query = $this->db->get();
        $results1[$currentYear] = $query->row()->purchase_paid_amount;

        $startOfYear = $prevYear . '-01-01';
        $endOfYear = $prevYear . '-' . date('m-d'); // Previous year's today's date

        $this->db->select('sum(paid_amount) as purchase_paid_amount');
        $this->db->from('product_purchase');
        $this->db->where('purchase_date >=', $startOfYear);
        $this->db->where('purchase_date <=', $endOfYear);
        $this->db->where('create_by', $this->session->userdata('user_id'));

        $query = $this->db->get();
        $results1[$prevYear] = $query->row()->purchase_paid_amount;
    }

    return $results1;
}
public function balance_comparision($date = null)
{
    $results = array();

    if ($date) {
        $split = explode(' to ', $date);
        $startDate = $split[0];
        $endDate = $split[1];

        $startYear = date('Y', strtotime($startDate));
        $endYear = date('Y', strtotime($endDate));

        for ($year = $startYear; $year <= $endYear; $year++) {
            $startOfYear = $year . '-01-01';
            $endOfYear = $year . '-12-31';

            $this->db->select('account_category, sub_category, SUM(paid_amount) AS arec_trade');
            $this->db->from('invoice');
            $this->db->where('status', 1);
            $this->db->where('sales_by', $this->session->userdata('user_id'));
            $this->db->where('date >=', $startOfYear);
            $this->db->where('date <=', $endOfYear);
            $this->db->group_by('account_category, sub_category');

            $query = $this->db->get();

            foreach ($query->result_array() as $row) {
                $category = $row['account_category'];
                $subCategory = $row['sub_category'];
                $arecTrade = $row['arec_trade'];

                // Create a hierarchical structure
                $results[$category]['subcategories'][$subCategory][$year] = $arecTrade;
            }
        }
    }  else {
        // Handle the case when no date is provided
        // For example, you can retrieve data for the current year
        $currentYear = date('Y');
        $startOfYear = $currentYear . '-01-01';
        $endOfYear = $currentYear . '-12-31';

        $this->db->select('account_category, sub_category, SUM(paid_amount) AS arec_trade');
        $this->db->from('invoice');
        $this->db->where('status', 1);
        $this->db->where('sales_by', $this->session->userdata('user_id'));
        $this->db->where('date >=', $startOfYear);
        $this->db->where('date <=', $endOfYear);
        $this->db->group_by('account_category, sub_category');

        $query = $this->db->get();

        foreach ($query->result_array() as $row) {
            $category = $row['account_category'];
            $subCategory = $row['sub_category'];
            $arecTrade = $row['arec_trade'];

            // Create a hierarchical structure
            $results[$category]['subcategories'][$subCategory][$currentYear] = $arecTrade;
        }
    }
//echo $this->db->last_query();
    return $results;
}
public function balance_sheet($date= null) {
    if($date) {
$split=explode(' to ',$date);
$start =  $split[0];
$end = $split[1];
}
   // $dateRange = "date BETWEEN '$start' AND '$end'";
    $this->db->select("sum(paid_amount) as arec_trade,account_category,sub_category");
    $this->db->from('invoice');
    $this->db->where('status', 1);
    $this->db->group_by('sub_category');
    //$this->db->where('account_subcat' ,'A/REC Trade'); // Add this line
    $this->db->where('sales_by',$this->session->userdata('user_id'));
     if($date) {
   $this->db->where('date >',$start );
      $this->db->where('date <',$end );
     }
//    $this->db->order_by('date', 'desc');
    $query = $this->db->get();
 //   echo $this->db->last_query();
    return $query->result_array();
}

     function get_userlist()

    {

        $this->db->select('*');

        $this->db->from('acc_coa');

        $this->db->where('IsActive',1);

        $this->db->order_by('HeadName');

        $query = $this->db->get();

        if ($query->num_rows() >= 1) {

            return $query->result();

        } else {

            return false;

        }

    }
public function accounts_expense($date=null){
  if($date) {
$split=explode(' to ',$date);
$start =  $split[0];
$end = $split[1];
}
        $this->db->select('c.supplier_name,a.chalan_no,a.sub_category,a.account_category,a.chalan_no,a.supplier_id,a.purchase_id,a.purchase_date,a.remarks,b.description,b.total,a.grand_total_amount');
        $this->db->from('product_purchase a');
        $this->db->join('product_purchase_details b', 'b.purchase_id = a.purchase_id');
         $this->db->join('supplier_information c', 'c.supplier_id = a.supplier_id');
       //  $this->db->group_by('a.chalan_no');
       if($date){
 $this->db->where('a.purchase_date > ', $start) ;
            $this->db->where('a.purchase_date < ', $end) ;

       }
        $this->db->where('a.create_by', $this->session->userdata('user_id')) ;

        $query = $this->db->get();
  // echo $this->db->last_query();
        return $query->result();
}
public function accounts_sale($date=null){
 if($date) {
$split=explode(' to ',$date);
$start =  $split[0];
$end = $split[1];
}
        $this->db->select('c.customer_name,a.commercial_invoice_number,a.sub_category,a.account_category,a.gtotal,a.customer_id,a.invoice_id,a.date,a.remark,b.description,b.total_price');
        $this->db->from('invoice a');
        $this->db->join('invoice_details b', 'b.invoice_id = a.invoice_id');
         $this->db->join('customer_information c', 'c.customer_id = a.customer_id');
       if($date){
 $this->db->where('a.date > ', $start) ;
            $this->db->where('a.date < ', $end) ;

       }
        $this->db->where('a.sales_by', $this->session->userdata('user_id')) ;

        $query = $this->db->get();
//   echo $this->db->last_query();
        return $query->result();
}

    public function get_dataof_invoice($date=null)
    {   
       if($date) {
        $split=explode(' to ',$date);
        $start =  $split[0];
        $end = $split[1];
        }
    
        $this->db->select('s.date, s.account_category, s.sub_category, s.account_subcat,s.commercial_invoice_number, s.remark, SUM(s.due_amount) as providerdue_amount, p.*');
        $this->db->from('invoice s');
        $this->db->join('customer_information p', 'p.customer_id = s.customer_id');
        if($date){
            $this->db->where('s.date > ', $start) ;
            $this->db->where('s.date < ', $end) ;
        }
        $this->db->where('s.sales_by', $this->session->userdata('user_id'));
        $this->db->group_by('s.sub_category');
        $query = $this->db->get();
    
        if ($query->num_rows() > 0) {
            $result = $query->result();
            foreach ($result as &$row) {
                $row->providerdue_amount = number_format($row->providerdue_amount, 2);
            }
            
            return $result;
        }
    
        return false;
    }
    
    public function get_dataof_expense($date=null)
    {   
       if($date) {
        $split=explode(' to ',$date);
        $start =  $split[0];
        $end = $split[1];
        }
    
        $this->db->select('purchase_date, account_category, sub_category, account_subcat, remarks, SUM(balance) as providerbalance_amount');
        $this->db->from('product_purchase');
        if($date){
            $this->db->where('purchase_date > ', $start) ;
            $this->db->where('purchase_date < ', $end) ;
        }
        $this->db->where('create_by', $this->session->userdata('user_id'));
        $this->db->group_by('sub_category');
        $query = $this->db->get();
    
        if ($query->num_rows() > 0) {
            $result = $query->result();
            foreach ($result as &$row) {
                $row->providerbalance_amount = number_format($row->providerbalance_amount, 2);
            }
            
            return $result;
        }
    
        return false;
    }
    
    
    public function get_dataof_service($date=null)
    {   
       if($date) {
        $split=explode(' to ',$date);
        $start =  $split[0];
        $end = $split[1];
        }
    
        $this->db->select('bill_date, acc_cat_name, acc_sub_name, acc_cat, memo_details, SUM(balances) as providerbalances_amount');
        $this->db->from('service');
        if($date){
            $this->db->where('bill_date > ', $start) ;
            $this->db->where('bill_date < ', $end) ;
        }
        $this->db->where('create_by', $this->session->userdata('user_id'));
        $this->db->group_by('acc_cat');
        $query = $this->db->get();
    
        if ($query->num_rows() > 0) {
            $result = $query->result();
            foreach ($result as &$row) {
                $row->providerbalances_amount = number_format($row->providerbalances_amount, 2);
            }
            
            return $result;
        }
    
        return false;
    }



public function get_invoice_data($date=null)
{
if($date) {
$split=explode(' to ',$date);
$start =  $split[0];
$end = $split[1];
}

    $this->db->select('
         at.date,at.account_category,at.sub_category,at.account_subcat, at.gtotal,at.paid_amount,at.commercial_invoice_number,
        at.remark,
        ci.customer_name AS customer_name'
    );
    $this->db->from('invoice at');
    $this->db->join('customer_information ci', 'at.customer_id = ci.customer_id', 'left');
       $this->db->where('at.sales_by',$this->session->userdata('user_id'));
         if($date) {
        $this->db->where('at.date >',$start);
            $this->db->where('at.date <',$end);
         }
        $this->db->order_by('ci.customer_name','asc');
    $query = $this->db->get();
//echo $this->db->last_query();
    if ($query->num_rows() >= 1) {
        return $query->result();
    } else {
        return false;
    }
}
public function get_product_purchase_data($date=null)
{if($date) {
$split=explode(' to ',$date);
$start =  $split[0];
$end = $split[1];
}

    $this->db->select('
        pp.purchase_date,pp.account_category,pp.sub_category,pp.account_subcat,  pp.grand_total_amount,pp.paid_amount,pp.chalan_no,
     pp.remarks,
        si.supplier_name AS supplier_name'
    );
    $this->db->from('product_purchase pp');
    $this->db->join('supplier_information si', 'pp.supplier_id = si.supplier_id', 'left');
    $this->db->where('pp.create_by',$this->session->userdata('user_id'));
     if($date) {
        $this->db->where('pp.purchase_date >',$start);
            $this->db->where('pp.purchase_date <',$end);
         }
      $this->db->order_by('si.supplier_name','asc');
    $query = $this->db->get();

    if ($query->num_rows() >= 1) {
        return $query->result();
    } else {
        return false;
    }
}
public function get_product_provider_data($date=null)
{if($date) {
$split=explode(' to ',$date);
$start =  $split[0];
$end = $split[1];
}

    $this->db->select('
        pp.bill_date,pp.acc_cat_name,pp.acc_sub_name,pp.acc_cat,  pp.gtotals,pp.amount_paids,pp.bill_number,
     pp.memo_details,
        si.supplier_name AS supplier_name'
    );
    $this->db->from('service pp');
    $this->db->join('supplier_information si', 'pp.service_provider_name = si.supplier_name', 'left');
    $this->db->where('pp.create_by',$this->session->userdata('user_id'));
     if($date) {
        $this->db->where('pp.bill_date >',$start);
            $this->db->where('pp.bill_date <',$end);
         }
      $this->db->order_by('si.supplier_name','asc');
    $query = $this->db->get();

    if ($query->num_rows() >= 1) {
        return $query->result();
    } else {
        return false;
    }
}
    function dfs($HeadName,$HeadCode,$oResult,$visit,$d)

    {

        if($d==0) echo "<li class=\"jstree-open \">$HeadName";

        else if($d==1) echo "<li class=\"jstree-open\"><a href='javascript:' onclick=\"loadCoaData('".$HeadCode."')\">$HeadName</a>";

        else echo "<li><a href='javascript:' onclick=\"loadCoaData('".$HeadCode."')\">$HeadName</a>";

        $p=0;

        for($i=0;$i< count($oResult);$i++)

        {



            if (!$visit[$i])

            {

                if ($HeadName==$oResult[$i]->PHeadName)

                {

                    $visit[$i]=true;

                    if($p==0) echo "<ul>";

                    $p++;

                    $this->dfs($oResult[$i]->HeadName,$oResult[$i]->HeadCode,$oResult,$visit,$d+1);

                }

            }

        }

        if($p==0)

            echo "</li>";

        else

            echo "</ul>";

    }





// Accounts list

      public function Transacc()

    {
 $this->db->select('*');
        $this->db->from('bank_add');
        $this->db->where('created_by', $this->session->userdata('user_id'));
        $this->db ->order_by('bank_name');
        $query = $this->db->get();
  //echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    
    }

// Credit Account Head

     public function Cracc()

    {

      return  $data = $this->db->select("*")

            ->from('acc_coa') 

            ->like('HeadCode',1020102, 'after')

            ->where('IsTransaction', 1) 
           
            ->where('CreateBy', $this->session->userdata('id')) 
            

            ->order_by('HeadName')

            ->get()

            ->result();

    }





// Trail invoice query 
public function trial_balance_credit($date = null)
{
    
    if($date) {
    $split=explode(' to ',$date);
    $start =  $split[0];
    $end = $split[1];
    }

    $this->db->select('account_category, date, SUM(paid_amount) as amount');
    $this->db->from('invoice');
    if($date){
        $this->db->where('date > ', $start) ;
        $this->db->where('date < ', $end) ;
    }
    $this->db->where('sales_by', $this->session->userdata('user_id'));
    $this->db->group_by('account_category');
    $query = $this->db->get();
    // echo $this->db->last_query(); die();
    if ($query->num_rows() > 0) {
        $result = $query->result();
        // Format the sum to display with two decimal places
        foreach ($result as &$row) {
            $row->amount = number_format($row->amount, 2);
        }
        
        return $result;
    }

    return false;

}


// Trail expense query 
public function trial_balance_debit($date = null)
{   
    if($date) {
    $split=explode(' to ',$date);
    $start =  $split[0];
    $end = $split[1];
    }

    $this->db->select('account_category, purchase_date, SUM(paid_amount) as expense_amount');
    $this->db->from('product_purchase');
    if($date){
        $this->db->where('purchase_date > ', $start) ;
        $this->db->where('purchase_date < ', $end) ;
    }
    $this->db->where('create_by', $this->session->userdata('user_id'));
    $this->db->group_by('account_category');
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
        $result = $query->result();
        // Format the sum to display with two decimal places
        foreach ($result as &$row) {
            $row->expense_amount = number_format($row->expense_amount, 2);
        }
        
        return $result;
    }

    return false;

}


// Trail ServiceProvider query 
public function trial_balance_serviceprovider($date = null)
{   
    if($date) {
    $split=explode(' to ',$date);
    $start =  $split[0];
    $end = $split[1];
    }

    $this->db->select('acc_cat_name, bill_date, SUM(amount_paids) as provider_amount');
    $this->db->from('service');
    if($date){
        $this->db->where('bill_date > ', $start) ;
        $this->db->where('bill_date < ', $end) ;
    }
    $this->db->where('create_by', $this->session->userdata('user_id'));
    $this->db->group_by('acc_cat_name');
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
        $result = $query->result();
        // Format the sum to display with two decimal places
        foreach ($result as &$row) {
            $row->provider_amount = number_format($row->provider_amount, 2);
        }
        
        return $result;
    }

    return false;

}

// Transcation ServiceProvider query 
public function transcation_serviceprovider($date = null)
{   
    if($date) {
    $split=explode(' to ',$date);
    $start =  $split[0];
    $end = $split[1];
    }

    $this->db->select('acc_cat_name, bill_date, SUM(amount_paids) as provider_amount');
    $this->db->from('service');
    if($date){
        $this->db->where('bill_date > ', $start) ;
        $this->db->where('bill_date < ', $end) ;
    }
    $this->db->where('create_by', $this->session->userdata('user_id'));
    $this->db->group_by('acc_cat_name');
    $query = $this->db->get();
    // echo $this->db->last_query();

    if ($query->num_rows() > 0) {
        $result = $query->result();
        // Format the sum to display with two decimal places
        foreach ($result as &$row) {
            $row->provider_amount = number_format($row->provider_amount, 2);
        }
        
        return $result;
    }

    return false;

}


// Invoice Transcation Deatils

public function transcation_invoice_results()
{

    $this->db->select('a.date, SUM(a.paid_amount) as total_paid_amount, SUM(a.due_amount) as total_due_amount , p.* ');

    $this->db->from('invoice a');

    $this->db->join('payment p', 'p.payment_id = a.payment_id');

    $this->db->where('a.sales_by',$this->session->userdata('user_id'));

    $query = $this->db->get();

    // echo $this->db->last_query(); die();

    if ($query->num_rows() > 0) {

     $result = $query->result();
        // Format the sum to display with two decimal places
        foreach ($result as &$row) {
            $row->total_paid_amount = number_format($row->total_paid_amount, 2);
            $row->total_due_amount = number_format($row->total_due_amount, 2);
        }
        
        return $result;

    }

    return false;
}

// Invoice get all data
public function transcation_invoice_resultsofAll($date = null)
{
    if($date) {
    $split=explode(' to ',$date);
    $start =  $split[0];
    $end = $split[1];
    }

    $this->db->select('a.*, p.* ');

    $this->db->from('invoice a');

    $this->db->join('payment p', 'p.payment_id = a.payment_id');

    if($date){
        $this->db->where('a.date > ', $start) ;
        $this->db->where('a.date < ', $end) ;
    }

    $this->db->where('a.sales_by',$this->session->userdata('user_id'));

    $query = $this->db->get();

        if ($query->num_rows() > 0) {

            return $query->result();

        }

    return false;
}

// Expense get all data
public function transcation_expense_results($date = null)
{
    if($date) {
    $split=explode(' to ',$date);
    $start =  $split[0];
    $end = $split[1];
    }

    $this->db->select('a.*, p.* ');

    $this->db->from('product_purchase a');

    $this->db->join('payment p', 'p.payment_id = a.payment_id');

    if($date){
        $this->db->where('a.purchase_date > ', $start) ;
        $this->db->where('a.purchase_date < ', $end) ;
    }

    $this->db->where('a.create_by',$this->session->userdata('user_id'));

    $query = $this->db->get();

        if ($query->num_rows() > 0) {

            return $query->result();

        }

    return false;
}


// General Ledger query 
public function generalledger_serviceprovider($date = null)
{   
    if($date) {
    $split=explode(' to ',$date);
    $start =  $split[0];
    $end = $split[1];
    }

    $this->db->select('acc_cat_name, bill_date, SUM(gtotals) as provider_amount');
    $this->db->from('service');
    if($date){
        $this->db->where('bill_date > ', $start) ;
        $this->db->where('bill_date < ', $end) ;
    }
    $this->db->where('create_by', $this->session->userdata('user_id'));
    $this->db->group_by('acc_cat_name');
    $query = $this->db->get();
    // echo $this->db->last_query();

    if ($query->num_rows() > 0) {
        $result = $query->result();
        // Format the sum to display with two decimal places
        foreach ($result as &$row) {
            $row->provider_amount = number_format($row->provider_amount, 2);
        }
        
        return $result;
    }

    return false;

}


// General Ledger Invoice
public function generalLedger_invoice_results($date =null)
{   
    if($date) {
    $split=explode(' to ',$date);
    $start =  $split[0];
    $end = $split[1];
    }

    $this->db->select('a.date, a.gtotal, p.* ');

    $this->db->from('invoice a');

    $this->db->join('payment p', 'p.payment_id = a.payment_id');

    if($date){
        $this->db->where('a.date > ', $start) ;
        $this->db->where('a.date < ', $end) ;
    }

    $this->db->where('a.sales_by',$this->session->userdata('user_id'));

    $this->db->order_by('a.date', 'desc');

    $query = $this->db->get();

        if ($query->num_rows() > 0) {

            return $query->result();

        }

    return false;
}

// General Ledger Invoice  all
public function generalLedger_invoice_resultsALLDATA()
{
    $this->db->select('a.date, SUM(a.paid_amount) as total_paid_amount, SUM(a.due_amount) as total_due_amount , p.* ');

    $this->db->from('invoice a');

    $this->db->join('payment p', 'p.payment_id = a.payment_id');

    $this->db->where('a.sales_by',$this->session->userdata('user_id'));

    $this->db->order_by('a.date', 'desc');

    $query = $this->db->get();

      if ($query->num_rows() > 0) {

         $result = $query->result();
            // Format the sum to display with two decimal places
            foreach ($result as &$row) {
                $row->total_paid_amount = number_format($row->total_paid_amount, 2);
                $row->total_due_amount = number_format($row->total_due_amount, 2);
            }
            
            return $result;

        }

    return false;
}


// General Ledger Expense
public function generalLedger_expense_results($date = null)
{
    if($date) {
    $split=explode(' to ',$date);
    $start =  $split[0];
    $end = $split[1];
    }

    $this->db->select('a.purchase_date, a.grand_total_amount , p.* ');

    $this->db->from('product_purchase a');

    $this->db->join('payment p', 'p.payment_id = a.payment_id');

    if($date){
        $this->db->where('a.purchase_date > ', $start) ;
        $this->db->where('a.purchase_date < ', $end) ;
    }

    $this->db->where('a.create_by',$this->session->userdata('user_id'));

    $this->db->order_by('a.purchase_date', 'desc');

    $query = $this->db->get();

        if ($query->num_rows() > 0) {

            return $query->result();

        }

    return false;
}


// General Ledger query 
public function journal_serviceprovider($date = null)
{   
    if($date) {
    $split=explode(' to ',$date);
    $start =  $split[0];
    $end = $split[1];
    }

    $this->db->select('*');
    $this->db->from('service');
    if($date){
        $this->db->where('bill_date > ', $start) ;
        $this->db->where('bill_date < ', $end) ;
    }
    $this->db->where('create_by', $this->session->userdata('user_id'));
    $this->db->group_by('acc_cat_name');

    $query = $this->db->get();
    // echo $this->db->last_query();

        if ($query->num_rows() > 0) {

            return $query->result();

        }

    return false;

}



// Journal Invoice
public function journal_invoice_results($date = null)
{   
    if($date) {
    $split=explode(' to ',$date);
    $start =  $split[0];
    $end = $split[1];
    }

    $this->db->select('a.*, p.*, c.*');

    $this->db->from('invoice a');

    $this->db->join('customer_information p', 'p.customer_id = a.customer_id');

    $this->db->join('payment c', 'c.payment_id = a.payment_id');

    if($date){
        $this->db->where('a.date > ', $start) ;
        $this->db->where('a.date < ', $end) ;
    }

    $this->db->where('a.sales_by',$this->session->userdata('user_id'));

    $this->db->group_by('a.account_category');

   $query = $this->db->get();

        if ($query->num_rows() > 0) {

            return $query->result();

        }

    return false;
}

// Journal Expenses
public function journal_expense_results($date = null)
{   
    if($date) {
    $split=explode(' to ',$date);
    $start =  $split[0];
    $end = $split[1];
    }

    $this->db->select('a.*, p.*, c.*');

    $this->db->from('product_purchase a');

    $this->db->join('supplier_information p', 'p.supplier_id = a.supplier_id');

    $this->db->join('payment c', 'c.payment_id = a.payment_id');

    if($date){
        $this->db->where('a.purchase_date > ', $start) ;
        $this->db->where('a.purchase_date < ', $end) ;
    }

    $this->db->where('a.create_by',$this->session->userdata('user_id'));

    $this->db->group_by('a.account_category');

   $query = $this->db->get();

        if ($query->num_rows() > 0) {

            return $query->result();

        }

    return false;
}



// Update debit voucher

   public function update_debitvoucher(){

         
           $auto_increment = $this->input->post('uniq_id', TRUE);
    $voucher_no = addslashes(trim($this->input->post('txtVNo', TRUE)));
    $Vtype = "DB-V";
       $pay_type = $this->input->post('cmbDebit', TRUE);
    $bank_name = $this->input->post('txtCode', TRUE);
    $ac_name = $this->input->post('cmbCode', TRUE);
    $credit = $this->input->post('txtAmount', TRUE);
  
    $VDate = $this->input->post('dtpDate', TRUE);
    $gtotal = $this->input->post('grand_total', TRUE);
  
    $CreateBy = $this->session->userdata('user_id');
    $Narration = addslashes(trim($this->input->post('txtRemarks', TRUE)));
    
    // Initialize an error array
    $errors = array();

    // Update the main voucher information
    $data1 = array(
        'type' => $Vtype,
        'voucher_no' => $voucher_no,
        'date' => $VDate,
        'remark' => $Narration,
        'g_total1' => $gtotal,
       'pay_type' => $pay_type,
        'cust_incremnt_id' => $auto_increment,
        'created_by' => $CreateBy,
    );

    $this->db->where('cust_incremnt_id', $auto_increment);
    if (!$this->db->update('accounts', $data1)) {
        $errors[] = "Failed to update main voucher information.";
    }

    // Delete existing details for the voucher
    $this->db->where('cust_incremnt_id', $auto_increment);
    if (!$this->db->delete('account_details')) {
        $errors[] = "Failed to delete existing details.";
    }

    // Insert updated details
    for ($i = 0; $i < count($bank_name); $i++) {
        $b_name = $bank_name[$i];
        $ac1_name = $this->input->post('cmbCode', TRUE)[$i];
       
        $credt = $credit[$i];
        
        $contrainsert = array(
            'cust_incremnt_id' => $auto_increment,
            'account_name' => $ac1_name,
            'bank_name' => $b_name,
            
            'debit' => $credt,
            'created_by' => $CreateBy,
        );

        if (!$this->db->insert('account_details', $contrainsert)) {
            $errors[] = "Failed to insert details for entry $i.";
        }
    }

    if (empty($errors)) {
        // Success
        return true;
    } else {
        // Handle the errors, e.g., log or display them
        foreach ($errors as $error) {
            log_message('error', $error);
        }
        return false;
    }


}

//Generate Voucher No

public function voNO()

    {

      return  $data = $this->db->select("VNo as voucher")

            ->from('acc_transaction') 

            ->like('VNo', 'DV-', 'after')

            ->order_by('ID','desc')

            ->limit(1)

            ->get()

            ->result_array();

          

    }



    public function Cashvoucher()

    {

      return  $data = $this->db->select("VNo as voucher")

            ->from('acc_transaction') 

            ->like('VNo', 'CHV-', 'after')

            ->order_by('ID','desc')

            ->get()

            ->result_array();

           

    }

    // Credit voucher no

    public function crVno()

    {
        
             return  $data = $this->db->select("Max(voucher_no) as voucher")

            ->from('accounts') 

            ->like('voucher_no', 'CV-', 'after')

            ->order_by('ID','desc')

            ->get()

            ->result_array();
            
            



          

    }
   public function dbVno()

    {
        
             return  $data = $this->db->select("Max(voucher_no) as voucher")

            ->from('accounts') 

            ->like('voucher_no', 'DV-', 'after')

            ->order_by('ID','desc')

            ->get()

            ->result_array();
            
            



          

    }


 // Contra voucher 



    public function contra()

    {

 

                return  $data = $this->db->select("Max(voucher_no) as voucher")

            ->from('accounts') 

            ->like('voucher_no', 'Contra-', 'after')

            ->order_by('ID','desc')

            ->get()

            ->result_array();

    }





  // Insert Credit voucher 

    public function insert_creditvoucher(){

$auto_increment=rand();

           $voucher_no = addslashes(trim($this->input->post('txtVNo',TRUE)));

            $Vtype="CR-V";

            $bank_name = $this->input->post('txtCode',TRUE);

            $ac_name = $this->input->post('cmbCode',TRUE);
              $pay_type = $this->input->post('cmbDebit',TRUE);

         

            $credit= $this->input->post('txtAmount',TRUE);

            $VDate = $this->input->post('dtpDate',TRUE);
                        $gtotal = $this->input->post('grand_total',TRUE);
                            
                                    $VDate = $this->input->post('dtpDate',TRUE);
   $CreateBy=$this->session->userdata('user_id');
            $Narration=addslashes(trim($this->input->post('txtRemarks',TRUE)));
            $data1=array(
                'type'=>$Vtype,
                'voucher_no'=>$voucher_no,
                'date' =>$VDate,
                'remark'=>$Narration,
                'g_total1' =>  $gtotal,
                'pay_type' => $pay_type,
                'cust_incremnt_id' => $auto_increment,
                     'created_by'       => $CreateBy,
                
                );
  $this->db->insert('accounts',$data1);

            $IsPosted=1;

            $IsAppove=0;

         

           $createdate=date('Y-m-d H:i:s');



            for ($i=0; $i < count($bank_name); $i++) {

                $b_name= $bank_name[$i];

                $ac_name=$this->input->post('cmbCode',TRUE)[$i];

            

              $credt =$credit[$i]; 
              

                $contrainsert = array(

          'cust_incremnt_id'            =>  $auto_increment,

          'account_name'          =>   $ac_name,

          'bank_name'          =>   $b_name,

     //     'debit'          =>  $bedt,

          'credit'      =>  $credt,

        //   'gtotal'          =>  $grandtotal,

        //   'gtotal_2'         =>  $grandtotal1,

       

          'created_by'       => $CreateBy,




        ); 

          

              $this->db->insert('account_details',$contrainsert);



    }

    return true;


}

 public function insert_debitvoucher(){

$auto_increment=rand();

           $voucher_no = addslashes(trim($this->input->post('txtVNo',TRUE)));

            $Vtype="DB-V";

            $bank_name = $this->input->post('txtCode',TRUE);

            $ac_name = $this->input->post('cmbCode',TRUE);
              $pay_type = $this->input->post('cmbDebit',TRUE);

         

            $credit= $this->input->post('txtAmount',TRUE);

            $VDate = $this->input->post('dtpDate',TRUE);
                        $gtotal = $this->input->post('grand_total',TRUE);
                            
                                    $VDate = $this->input->post('dtpDate',TRUE);
   $CreateBy=$this->session->userdata('user_id');
            $Narration=addslashes(trim($this->input->post('txtRemarks',TRUE)));
            $data1=array(
                'type'=>$Vtype,
                'voucher_no'=>$voucher_no,
                'date' =>$VDate,
                'remark'=>$Narration,
                'g_total1' =>  $gtotal,
                'pay_type' => $pay_type,
                'cust_incremnt_id' => $auto_increment,
                     'created_by'       => $CreateBy,
                
                );
  $this->db->insert('accounts',$data1);

            $IsPosted=1;

            $IsAppove=0;

         

           $createdate=date('Y-m-d H:i:s');



            for ($i=0; $i < count($bank_name); $i++) {

                $b_name= $bank_name[$i];

                $ac_name=$ac_name[$i];

            

              $credt =$credit[$i]; 
              

                $contrainsert = array(

          'cust_incremnt_id'            =>  $auto_increment,

          'account_name'          =>   $ac_name,

          'bank_name'          =>   $b_name,

         'debit'          =>  $credt,

        //  'credit'      =>  $credt,

        //   'gtotal'          =>  $grandtotal,

        //   'gtotal_2'         =>  $grandtotal1,

       

          'created_by'       => $CreateBy,




        ); 

          

              $this->db->insert('account_details',$contrainsert);



    }

    return true;


}


// Insert Countra voucher 

    public function insert_contravoucher(){
  $auto_increment=rand();

           $voucher_no = addslashes(trim($this->input->post('txtVNo',TRUE)));

            $Vtype="CV";

            $bank_name = $this->input->post('txtCode',TRUE);

            $ac_name = $this->input->post('cmbCode',TRUE);

            $debit =$this->input->post('txtAmount',TRUE);

            $credit= $this->input->post('txtAmountcr',TRUE);

            $VDate = $this->input->post('dtpDate',TRUE);
                        $gtotal = $this->input->post('grand_total',TRUE);
                              $gtotal1 = $this->input->post('grand_total1',TRUE);
                                    $VDate = $this->input->post('dtpDate',TRUE);
   $CreateBy=$this->session->userdata('user_id');
            $Narration=addslashes(trim($this->input->post('txtRemarks',TRUE)));
            $data1=array(
                'type'=>$Vtype,
                'voucher_no'=>$voucher_no,
                'date' =>$VDate,
                'remark'=>$Narration,
                'g_total1' =>  $gtotal,
                 'g_total2' =>  $gtotal1,
                'cust_incremnt_id' => $auto_increment,
                     'created_by'       => $CreateBy,
                
                );
  $this->db->insert('accounts',$data1);

            $IsPosted=1;

            $IsAppove=0;

         

           $createdate=date('Y-m-d H:i:s');



            for ($i=0; $i < count($bank_name); $i++) {

                $b_name= $bank_name[$i];

                $ac_name=$this->input->post('cmbCode',TRUE)[$i];

               $bedt =$debit[$i]; 

              $credt =$credit[$i]; 
              

                $contrainsert = array(

          'cust_incremnt_id'            =>  $auto_increment,

          'account_name'          =>   $ac_name,

          'bank_name'          =>   $b_name,

          'debit'          =>  $bedt,

          'credit'      =>  $credt,

        //   'gtotal'          =>  $grandtotal,

        //   'gtotal_2'         =>  $grandtotal1,

       

          'created_by'       => $CreateBy,




        ); 

          

              $this->db->insert('account_details',$contrainsert);



    }

    return true;

}


public function jv_data(){
    
 $this->db->select('*');
$this->db->from('accounts');
 $this->db->where('type','JV');
 $this->db->where('created_by',$this->session->userdata('user_id'));
$query = $this->db->get()->result();

return $query;   
    
    
}
public function crv_data(){
    
 $this->db->select('*');
$this->db->from('accounts');
 $this->db->where('type','CR-V');
 $this->db->where('created_by',$this->session->userdata('user_id'));
$query = $this->db->get()->result();
//echo $this->db->last_query();
return $query;   
    
    
}
public function dbtv_data(){
    
 $this->db->select('*');
$this->db->from('accounts');
 $this->db->where('type','DB-V');
 $this->db->where('created_by',$this->session->userdata('user_id'));
$query = $this->db->get()->result();
//echo $this->db->last_query();
return $query;   
    
    
}
public function cv_data(){
     $this->db->select('*');
$this->db->from('accounts');
 $this->db->where('type',"CV");
 $this->db->where('created_by',$this->session->userdata('user_id'));
$query = $this->db->get()->result();
//echo $this->db->last_query();
return $query;   
    
}

public function edit_jv_data_passing($uniq_id){
 $this->db->select('a.*, b.* ' );
     $this->db->from('accounts a');
     $this->db->join('account_details  b', 'b.cust_incremnt_id =a.cust_incremnt_id');
   $this->db->where('a.created_by',$this->session->userdata('user_id'));
      $this->db->where('b.cust_incremnt_id',$uniq_id);
      $this->db->where('a.type','JV');
  $query = $this->db->get();

     if ($query->num_rows() > 0) {
         return $query->result_array();
     }  
    
}
public function edit_cv_data_passing($uniq_id){
 $this->db->select('a.*, b.* ' );
     $this->db->from('accounts a');
     $this->db->join('account_details  b', 'b.cust_incremnt_id =a.cust_incremnt_id');
   $this->db->where('a.created_by',$this->session->userdata('user_id'));
    $this->db->where('b.cust_incremnt_id',$uniq_id);
    $this->db->where('a.type','CV');
  $query = $this->db->get();

     if ($query->num_rows() > 0) {
         return $query->result_array();
     }  
    
}

public function edit_credit_voucher_data_passing($uniq_id){
     $this->db->select('a.*, b.* ' );
     $this->db->from('accounts a');
     $this->db->join('account_details  b', 'b.cust_incremnt_id =a.cust_incremnt_id');
   $this->db->where('a.created_by',$this->session->userdata('user_id'));
       $this->db->where('b.cust_incremnt_id',$uniq_id);
    $this->db->where('a.type','CR-V');
  $query = $this->db->get();

     if ($query->num_rows() > 0) {
         return $query->result_array();
     }  
    
}
public function edit_debit_voucher_data_passing($uniq_id){
     $this->db->select('a.*, b.* ' );
     $this->db->from('accounts a');
     $this->db->join('account_details  b', 'b.cust_incremnt_id =a.cust_incremnt_id');
   $this->db->where('a.created_by',$this->session->userdata('user_id'));
       $this->db->where('b.cust_incremnt_id',$uniq_id);
    $this->db->where('a.type','DB-V');
  $query = $this->db->get();

     if ($query->num_rows() > 0) {
         return $query->result_array();
     }  
    
}
   public function edit_jv()
{
    $auto_increment = $this->input->post('uniq_id', TRUE);
    $voucher_no = addslashes(trim($this->input->post('txtVNo', TRUE)));
    $Vtype = "JV";
    $bank_name = $this->input->post('txtCode', TRUE);
    $ac_name = $this->input->post('cmbCode', TRUE);
    $debit = $this->input->post('txtAmount', TRUE);
    $credit = $this->input->post('txtAmountcr', TRUE);
    $VDate = $this->input->post('dtpDate', TRUE);
    $gtotal = $this->input->post('grand_total', TRUE);
    $gtotal1 = $this->input->post('grand_total1', TRUE);
    $CreateBy = $this->session->userdata('user_id');
    $Narration = addslashes(trim($this->input->post('txtRemarks', TRUE)));
    
    // Initialize an error array
    $errors = array();

    // Update the main voucher information
    $data1 = array(
        'type' => $Vtype,
        'voucher_no' => $voucher_no,
        'date' => $VDate,
        'remark' => $Narration,
        'g_total1' => $gtotal,
        'g_total2' => $gtotal1,
        'cust_incremnt_id' => $auto_increment,
        'created_by' => $CreateBy,
    );

    $this->db->where('cust_incremnt_id', $auto_increment);
    if (!$this->db->update('accounts', $data1)) {
        $errors[] = "Failed to update main voucher information.";
    }

    // Delete existing details for the voucher
    $this->db->where('cust_incremnt_id', $auto_increment);
    if (!$this->db->delete('account_details')) {
        $errors[] = "Failed to delete existing details.";
    }

    // Insert updated details
    for ($i = 0; $i < count($bank_name); $i++) {
        $b_name = $bank_name[$i];
        $ac1_name = $ac_name[$i];
        $bedt = $debit[$i];
        $credt = $credit[$i];
        
        $contrainsert = array(
            'cust_incremnt_id' => $auto_increment,
            'account_name' => $ac1_name,
            'bank_name' => $b_name,
            'debit' => $bedt,
            'credit' => $credt,
            'created_by' => $CreateBy,
        );

        if (!$this->db->insert('account_details', $contrainsert)) {
            $errors[] = "Failed to insert details for entry $i.";
        }
    }

    if (empty($errors)) {
        // Success
        return true;
    } else {
        // Handle the errors, e.g., log or display them
        foreach ($errors as $error) {
            log_message('error', $error);
        }
        return false;
    }
}




     public function update_creditvoucher(){

           $auto_increment = $this->input->post('uniq_id', TRUE);
    $voucher_no = addslashes(trim($this->input->post('txtVNo', TRUE)));
    $Vtype = "CR-V";
       $pay_type = $this->input->post('cmbDebit', TRUE);
    $bank_name = $this->input->post('txtCode', TRUE);
    $ac_name = $this->input->post('cmbCode', TRUE);
    $credit = $this->input->post('txtAmount', TRUE);
  
    $VDate = $this->input->post('dtpDate', TRUE);
    $gtotal = $this->input->post('grand_total', TRUE);
  
    $CreateBy = $this->session->userdata('user_id');
    $Narration = addslashes(trim($this->input->post('txtRemarks', TRUE)));
    
    // Initialize an error array
    $errors = array();

    // Update the main voucher information
    $data1 = array(
        'type' => $Vtype,
        'voucher_no' => $voucher_no,
        'date' => $VDate,
        'remark' => $Narration,
        'g_total1' => $gtotal,
       'pay_type' => $pay_type,
        'cust_incremnt_id' => $auto_increment,
        'created_by' => $CreateBy,
    );

    $this->db->where('cust_incremnt_id', $auto_increment);
    if (!$this->db->update('accounts', $data1)) {
        $errors[] = "Failed to update main voucher information.";
    }

    // Delete existing details for the voucher
    $this->db->where('cust_incremnt_id', $auto_increment);
    if (!$this->db->delete('account_details')) {
        $errors[] = "Failed to delete existing details.";
    }

    // Insert updated details
    for ($i = 0; $i < count($bank_name); $i++) {
        $b_name = $bank_name[$i];
        $ac1_name = $this->input->post('cmbCode', TRUE)[$i];
       
        $credt = $credit[$i];
        
        $contrainsert = array(
            'cust_incremnt_id' => $auto_increment,
            'account_name' => $ac1_name,
            'bank_name' => $b_name,
            
            'credit' => $credt,
            'created_by' => $CreateBy,
        );

        if (!$this->db->insert('account_details', $contrainsert)) {
            $errors[] = "Failed to insert details for entry $i.";
        }
    }

    if (empty($errors)) {
        // Success
        return true;
    } else {
        // Handle the errors, e.g., log or display them
        foreach ($errors as $error) {
            log_message('error', $error);
        }
        return false;
    }

}


   public function edit_cv()
{
    $auto_increment = $this->input->post('uniq_id', TRUE);
    $voucher_no = addslashes(trim($this->input->post('txtVNo', TRUE)));
    $Vtype = "CV";
    $bank_name = $this->input->post('txtCode', TRUE);
    $ac_name = $this->input->post('cmbCode', TRUE);
    $debit = $this->input->post('txtAmount', TRUE);
    $credit = $this->input->post('txtAmountcr', TRUE);
    $VDate = $this->input->post('dtpDate', TRUE);
    $gtotal = $this->input->post('grand_total', TRUE);
    $gtotal1 = $this->input->post('grand_total1', TRUE);
    $CreateBy = $this->session->userdata('user_id');
    $Narration = addslashes(trim($this->input->post('txtRemarks', TRUE)));
    
    // Initialize an error array
    $errors = array();

    // Update the main voucher information
    $data1 = array(
        // 'type' => $Vtype,
        // 'voucher_no' => $voucher_no,
        'date' => $VDate,
        'remark' => $Narration,
        'g_total1' => $gtotal,
        'g_total2' => $gtotal1,
        // 'cust_incremnt_id' => $auto_increment,
        // 'created_by' => $CreateBy,
    );

    $this->db->where('cust_incremnt_id', $auto_increment);
    $this->db->update('accounts', $data1);
   // echo $this->db->last_query();die();
  
  $this->db->where('cust_incremnt_id', $auto_increment);
    if (!$this->db->delete('account_details')) {
        $errors[] = "Failed to delete existing details.";
    }
 //  echo $this->db->last_query();
    // Insert updated details
    for ($i = 0; $i < count($bank_name); $i++) {
        $b_name = $bank_name[$i];
        $ac1_name = $this->input->post('cmbCode', TRUE)[$i];
        $bedt = $debit[$i];
        $credt = $credit[$i];
        
        $contrainsert = array(
            'cust_incremnt_id' => $auto_increment,
            'account_name' => $ac1_name,
            'bank_name' => $b_name,
            'debit' => $bedt,
            'credit' => $credt,
            'created_by' => $CreateBy,
        );
$this->db->insert('account_details', $contrainsert);
//echo $this->db->last_query();
       
    }

    if (empty($errors)) {
        // Success
        return true;
    } else {
        // Handle the errors, e.g., log or display them
        foreach ($errors as $error) {
            log_message('error', $error);
        }
        return false;
    }
}
    public function insert_journalvoucher(){
        $auto_increment=rand();

           $voucher_no = addslashes(trim($this->input->post('txtVNo',TRUE)));

            $Vtype="JV";

            $bank_name = $this->input->post('txtCode',TRUE);

            $ac_name = $this->input->post('cmbCode',TRUE);

            $debit =$this->input->post('txtAmount',TRUE);

            $credit= $this->input->post('txtAmountcr',TRUE);

            $VDate = $this->input->post('dtpDate',TRUE);
                        $gtotal = $this->input->post('grand_total',TRUE);
                              $gtotal1 = $this->input->post('grand_total1',TRUE);
                                    $VDate = $this->input->post('dtpDate',TRUE);
   $CreateBy=$this->session->userdata('user_id');
            $Narration=addslashes(trim($this->input->post('txtRemarks',TRUE)));
            $data1=array(
                'type'=>$Vtype,
                'voucher_no'=>$voucher_no,
                'date' =>$VDate,
                'remark'=>$Narration,
                'g_total1' =>  $gtotal,
                 'g_total2' =>  $gtotal1,
                'cust_incremnt_id' => $auto_increment,
                     'created_by'       => $CreateBy,
                
                );
  $this->db->insert('accounts',$data1);

            $IsPosted=1;

            $IsAppove=0;

         

           $createdate=date('Y-m-d H:i:s');



            for ($i=0; $i < count($bank_name); $i++) {

                $b_name= $bank_name[$i];

                $ac_name=$this->input->post('cmbCode',TRUE)[$i];

               $bedt =$debit[$i]; 

              $credt =$credit[$i]; 
              

                $contrainsert = array(

          'cust_incremnt_id'            =>  $auto_increment,

          'account_name'          =>   $ac_name,

          'bank_name'          =>   $b_name,

          'debit'          =>  $bedt,

          'credit'      =>  $credt,

        //   'gtotal'          =>  $grandtotal,

        //   'gtotal_2'         =>  $grandtotal1,

       

          'created_by'       => $CreateBy,




        ); 

         // print_r($contrainsert);

              $this->db->insert('account_details',$contrainsert);

//echo $this->db->last_query();


    }

    return true;

}



 public function update_journalvoucher(){

         

           $voucher_no = addslashes(trim($this->input->post('txtVNo',TRUE)));

            $Vtype="JV";

            $dAID = $this->input->post('cmbDebit',TRUE);

            $cAID = $this->input->post('txtCode',TRUE);

            $debit =$this->input->post('txtAmount',TRUE);

            $credit= $this->input->post('txtAmountcr',TRUE);

            $VDate = $this->input->post('dtpDate',TRUE);

            $Narration=addslashes(trim($this->input->post('txtRemarks',TRUE)));

            $IsPosted=1;

            $IsAppove=0;

            $CreateBy=$this->session->userdata('id');

            $createdate=date('Y-m-d H:i:s');

            $this->db->where(' VNo', $voucher_no);

            $this->db->delete('acc_transaction');



            for ($i=0; $i < count($cAID); $i++) {

                $crtid=$cAID[$i];

                $Cramnt=$credit[$i];

                $debits =$debit[$i]; 

               

                $contrainsert = array(

          'VNo'            =>  $voucher_no,

          'Vtype'          =>  $Vtype,

          'VDate'          =>  $VDate,

          'COAID'          =>  $crtid,

          'Narration'      =>  $Narration,

          'Debit'          =>  $debits,

          'Credit'         =>  $Cramnt,

          'IsPosted'       => $IsPosted,

          'CreateBy'       => $CreateBy,

          'CreateDate'     => $createdate,

          'IsAppove'       => 0

        ); 

           

              $this->db->insert('acc_transaction',$contrainsert);

            



    }

     

    return true;

}



 public function contra_voucher_edit(){
 $auto_increment = $this->input->post('uniq_id', TRUE);
    $voucher_no = addslashes(trim($this->input->post('txtVNo', TRUE)));
    $Vtype = "JV";
    $bank_name = $this->input->post('txtCode', TRUE);
    $ac_name = $this->input->post('cmbCode', TRUE);
    $debit = $this->input->post('txtAmount', TRUE);
    $credit = $this->input->post('txtAmountcr', TRUE);
    $VDate = $this->input->post('dtpDate', TRUE);
    $gtotal = $this->input->post('grand_total', TRUE);
    $gtotal1 = $this->input->post('grand_total1', TRUE);
    $CreateBy = $this->session->userdata('user_id');
    $Narration = addslashes(trim($this->input->post('txtRemarks', TRUE)));
    
    // Initialize an error array
    $errors = array();

    // Update the main voucher information
    $data1 = array(
        'type' => $Vtype,
        'voucher_no' => $voucher_no,
        'date' => $VDate,
        'remark' => $Narration,
        'g_total1' => $gtotal,
        'g_total2' => $gtotal1,
        'cust_incremnt_id' => $auto_increment,
        'created_by' => $CreateBy,
    );

    $this->db->where('cust_incremnt_id', $auto_increment);
    if (!$this->db->update('accounts', $data1)) {
        $errors[] = "Failed to update main voucher information.";
    }

    // Delete existing details for the voucher
    $this->db->where('cust_incremnt_id', $auto_increment);
    if (!$this->db->delete('account_details')) {
        $errors[] = "Failed to delete existing details.";
    }

    // Insert updated details
    for ($i = 0; $i < count($bank_name); $i++) {
        $b_name = $bank_name[$i];
        $ac1_name = $ac_name[$i];
        $bedt = $debit[$i];
        $credt = $credit[$i];
        
        $contrainsert = array(
            'cust_incremnt_id' => $auto_increment,
            'account_name' => $ac1_name,
            'bank_name' => $b_name,
            'debit' => $bedt,
            'credit' => $credt,
            'created_by' => $CreateBy,
        );

        if (!$this->db->insert('account_details', $contrainsert)) {
            $errors[] = "Failed to insert details for entry $i.";
        }
    }

    if (empty($errors)) {
        // Success
        return true;
    } else {
        // Handle the errors, e.g., log or display them
        foreach ($errors as $error) {
            log_message('error', $error);
        }
        return false;
    }
      

}

// journal voucher

public function journal()

    {

      return  $data = $this->db->select("Max(voucher_no) as voucher")

            ->from('accounts') 

            ->like('voucher_no', 'Journal-', 'after')

            ->order_by('ID','desc')

            ->get()

            ->result_array();

           

    }



    // voucher Aprove 

    public function approve_voucher(){

        $values = array("DV", "CV", "JV","Contra");

      

       return $approveinfo = $this->db->select('*,sum(Credit) as Credit,sum(Debit) as Debit')

                               ->from('acc_transaction')

                               ->where_in('Vtype',$values)

                               ->where('IsAppove',0)

                               ->group_by('VNo')

                               ->get()

                               ->result();



    }

//approved

        public function approved($data = [])

    {

        return $this->db->where('VNo',$data['VNo'])

            ->update('acc_transaction',$data); 

    } 





    public function delete_voucher($voucher){

      $this->db->where('VNo', $voucher)

               ->delete('acc_transaction');

      if ($this->db->affected_rows()) {

      return true;

    } else {

      return false;

    }

    }



    //debit update voucher

    public function dbvoucher_updata($id){

      return  $vou_info = $this->db->select('*')

                 ->from('acc_transaction')

                 ->where('VNo',$id)

                 ->where('Credit <',1)

                 ->get()

                 ->result();

    }



        public function journal_updata($id){

      return  $vou_info = $this->db->select('*')

                 ->from('acc_transaction')

                 ->where('VNo',$id)

                 ->get()

                 ->result_array();

    }



     //credit voucher update 

    public function crdtvoucher_updata($id){

      return  $vou_info = $this->db->select('*')

                 ->from('acc_transaction')

                 ->where('VNo',$id)

                 ->where('Debit <',1)

                 ->get()

                 ->result();



    }

    //Debit voucher inof



    public function debitvoucher_updata($id){

      return $cr_info = $this->db->select('*')

                 ->from('acc_transaction')

                 ->where('VNo',$id)

                 ->where('Credit<',1)

                 ->get()

                 ->result_array();



    }

     // debit update voucher credit info

    public function crvoucher_updata($id){

       return $v_info = $this->db->select('*')

                 ->from('acc_transaction')

                 ->where('VNo',$id)

                 ->where('Debit<',1)

                 ->get()

                 ->result_array();

    }



    // update Credit voucher



 //Trial Balance Report 

   public function trial_balance_report($FromDate,$ToDate,$WithOpening){
        if($WithOpening)
            $WithOpening=true;
        else
            $WithOpening=false;
        // $sql="SELECT * FROM acc_coa WHERE IsGL=1 AND IsActive=1 AND HeadType IN ('A','L') ORDER BY HeadCode";
        $sql="SELECT * FROM acc_coa WHERE IsGL=0 AND IsActive=1 AND HeadType IN ('A','L') ORDER BY HeadCode";
        // print_r($sql);
        $oResultTr = $this->db->query($sql);
        // $sql="SELECT * FROM acc_coa WHERE IsGL=1 AND IsActive=1 AND HeadType IN ('I','E') ORDER BY HeadCode";
        $sql="SELECT * FROM acc_coa WHERE IsGL=0 AND IsActive=1 AND HeadType IN ('I','E') ORDER BY HeadCode";
        // print_r($sql);
        $oResultInEx = $this->db->query($sql);
        $data = array(
            'oResultTr'   => $oResultTr->result_array(),
            'oResultInEx' => $oResultInEx->result_array(),
            'WithOpening' => $WithOpening
        );
        return $data;
    }



      public  function get_vouchar_bydate($date=null){


          $sql="SELECT *, VNo, Vtype,VDate, SUM(Debit+Credit)/2 as Amount FROM acc_transaction  WHERE VDate='$date' AND VType IN ('DV','JV','CV') GROUP BY VNO, Vtype, VDate ORDER BY VDate";
 $query = $this->db->query($sql);
 //echo $this->db->last_query();
  if ($query->num_rows() > 0) {
         return  json_decode(json_encode($query->result()), true);
        }
        return false;
        

    }
   public  function get_vouchar(){
  $date=date('Y-m-d');

          $sql="SELECT *, VNo, Vtype,VDate, SUM(Debit+Credit)/2 as Amount FROM acc_transaction  WHERE VDate='$date' AND VType IN ('DV','JV','CV') GROUP BY VNO, Vtype, VDate ORDER BY VDate";
 $query = $this->db->query($sql);
  if ($query->num_rows() > 0) {
         return  json_decode(json_encode($query->result()), true);
        }
        return false;
        

    }

    public function fixed_assets()
	{
      return   $this->db->select('*')
            ->from('acc_coa')
            ->where('PHeadName','Assets')
            ->where('IsActive',1)
            ->get()
            ->result_array();
	}
	public function liabilities_data()
	{
	  return   $this->db->select('*')
            ->from('acc_coa')
            ->where('PHeadName','Liabilities')
            ->where('IsActive',1)
            ->get()
            ->result_array();
	}
	public function income_fields()
	{
	  return   $this->db->select('*')
            ->from('acc_coa')
            ->where('PHeadName','Income')
            ->where('IsActive',1)
            ->get()
            ->result_array();
	}
	public function expense_fields()
	{
	   return   $this->db->select('*')
            ->from('acc_coa')
            ->where('PHeadName','Expence')
            ->where('IsActive',1)
            ->get()
            ->result_array();
	}
      public function net_income($from_date,$to_date)
	{
        $this->db->select("(sum(at.Credit)-sum(at.Debit)) as balance");
        $this->db->from('acc_transaction at');
        $this->db->join('acc_coa ac','ac.HeadCode=at.COAID','left');
        $this->db->where('at.VDate >=',$from_date);
        $this->db->where('at.VDate <=',$to_date);
        $this->db->where('ac.HeadType IN ("I","E")');
        $this->db->where('at.IsAppove',1);
        $result = $this->db->get()->row(); 
        return $result->balance;
	}
    public  function get_vouchar_view($date){

        $sql="SELECT acc_transaction.COAID,SUM(acc_transaction.Credit) AS Amount, acc_coa.HeadName FROM acc_transaction INNER JOIN acc_coa ON acc_coa.HeadCode=acc_transaction.COAID WHERE VDate='$date' AND acc_transaction.IsAppove=1  GROUP BY acc_transaction.COAID, acc_coa.HeadName ORDER BY acc_coa.HeadName";

        $query = $this->db->query($sql);
  if ($query->num_rows() > 0) {
          $array = json_decode(json_encode($query->result()), true);
           return $array;
        }
         return false;

    }



    public  function get_cash_bydate($date=null){
    $sql="SELECT SUM(Debit) as Amount FROM acc_transaction WHERE VDate='$date' AND COAID ='1020101' AND VType NOT IN ('DV','JV','CV') AND IsAppove='1'";

        $query = $this->db->query($sql);
       // echo $this->db->last_query();
 if ($query->num_rows() > 0) {
    $array = json_decode(json_encode($query->row()), true);
           return $array;
        }
        return false;
 }
    public  function get_cash(){
      $date=date('Y-m-d');
    $sql="SELECT SUM(Debit) as Amount FROM acc_transaction WHERE VDate='$date' AND COAID ='1020101' AND VType NOT IN ('DV','JV','CV') AND IsAppove='1'";

        $query = $this->db->query($sql);
 if ($query->num_rows() > 0) {
    $array = json_decode(json_encode($query->row()), true);
           return $array;
        }
        return false;
 }


  public  function get_general_ledger(){

        $this->db->select('*');
        $this->db->from('acc_coa');
        $this->db->where('IsGL',0);
        $this->db->where('CreateBy', $this->session->userdata('user_id')) ;
        $this->db->order_by('HeadName', 'asc');
        $query = $this->db->get();
        return $query->result();
    }



    public function general_led_get($Headid){



        $sql="SELECT * FROM acc_coa WHERE HeadCode='$Headid' ";

        $query = $this->db->query($sql);

        $rs=$query->row();





        $sql="SELECT * FROM acc_coa WHERE IsTransaction=1 AND PHeadName='".$rs->HeadName."' ORDER BY HeadName";

        $query = $this->db->query($sql);

        return $query->result();

    }

    public function voucher_report_serach($vouchar){

        $sql="SELECT SUM(Debit) as Amount FROM acc_transaction WHERE VDate='$vouchar' AND COAID ='1020101' AND VType NOT IN ('DV','JV','CV') AND IsAppove='1'";

        $query = $this->db->query($sql);

        return $query->row();



    }





    public function general_led_report_headname($cmbGLCode){

        $this->db->select('*');

        $this->db->from('acc_coa');

        $this->db->where('HeadCode',$cmbGLCode);

        $query = $this->db->get();
//echo $this->db->last_query();
        return $query->result_array();

    }

    public function general_led_report_headname2($cmbGLCode,$cmbCode,$dtpFromDate,$dtpToDate,$chkIsTransction){



            if($chkIsTransction){

        

                $this->db->select('acc_transaction.VNo, acc_transaction.Vtype, acc_transaction.VDate, acc_transaction.Narration, acc_transaction.Debit, acc_transaction.Credit, acc_transaction.IsAppove, acc_transaction.COAID,acc_coa.HeadName, acc_coa.PHeadName, acc_coa.HeadType');

                $this->db->from('acc_transaction');

                $this->db->join('acc_coa','acc_transaction.COAID = acc_coa.HeadCode', 'left');

                $this->db->where('acc_transaction.IsAppove',1);

                $this->db->where('VDate BETWEEN "'.$dtpFromDate. '" and "'.$dtpToDate.'"');

                $this->db->where('acc_transaction.COAID',$cmbGLCode);

              



                $query = $this->db->get();
//echo $this->db->last_query();
                return $query->result();

            }

            else{

               

                $this->db->select('acc_transaction.COAID,acc_transaction.Debit, acc_transaction.Credit,acc_coa.HeadName,acc_transaction.IsAppove, acc_coa.PHeadName, acc_coa.HeadType');

                $this->db->from('acc_transaction');

                $this->db->join('acc_coa','acc_transaction.COAID = acc_coa.HeadCode', 'left');

                $this->db->where('acc_transaction.IsAppove',1);

                $this->db->where('VDate BETWEEN "'.$dtpFromDate. '" and "'.$dtpToDate.'"');

                $this->db->where('acc_transaction.COAID',$cmbGLCode);

               

                $query = $this->db->get();
//echo $this->db->last_query();
                return $query->result();

            }



    }

    // prebalance calculation

      public function general_led_report_prebalance($cmbGLCode,$dtpFromDate){



            

              

                $this->db->select('sum(acc_transaction.Debit) as predebit, sum(acc_transaction.Credit) as precredit');

                $this->db->from('acc_transaction');

                $this->db->where('acc_transaction.IsAppove',1);

                $this->db->where('VDate < ',$dtpFromDate);

                $this->db->where('acc_transaction.COAID',$cmbGLCode);

                



                $query = $this->db->get()->row();

      //   echo $this->db->last_query();

                return $balance=$query->predebit - $query->precredit;



    }



    public function get_status(){



        $this->db->select('*');

        $this->db->from('acc_coa');

        $this->db->where('IsTransaction',1);

        $this->db->like('HeadCode','1020102','after');

        $this->db->order_by('HeadName', 'asc');

        $query = $this->db->get();

        return $query->result();

      

    }

   

     //Profict loss report search

    public function profit_loss_serach(){

       

        $sql="SELECT * FROM acc_coa WHERE acc_coa.HeadType='I'";

        $sql1 = $this->db->query($sql);



        $sql="SELECT * FROM acc_coa WHERE acc_coa.HeadType='E'";

        $sql2 = $this->db->query($sql);

        

        $data = array(

          'oResultAsset'     => $sql1->result(),

          'oResultLiability' => $sql2->result(),

        );

        return $data;

    } 

    public function profit_loss_serach_date($dtpFromDate,$dtpToDate){

       $sqlF="SELECT  acc_transaction.VDate, acc_transaction.COAID, acc_coa.HeadName FROM acc_transaction INNER JOIN acc_coa ON acc_transaction.COAID = acc_coa.HeadCode WHERE acc_transaction.VDate BETWEEN '$dtpFromDate' AND '$dtpToDate' AND acc_transaction.IsAppove = 1 AND  acc_transaction.COAID LIKE '301%'";

       $query = $this->db->query($sqlF);

       return $query->result();

    }



    public function treeview_selectform($id){

     $data = $this->db->select('*')

            ->from('acc_coa')

            ->where('HeadCode',$id)

            ->get()

            ->row();

            return $data;



    }

     public function get_supplier(){

        $this->db->select('*');

        $this->db->from('supplier_information');
        $this->db->where('created_by',$this->session->userdata('user_id'));
        $this->db->where('status',1);

        $this->db->order_by('supplier_id', 'desc');

        $query = $this->db->get();

        return $query->result();  

    }

    // Customer list

    public function get_customer(){

        $this->db->select('*');

        $this->db->from('customer_information');
        $this->db->where('create_by',$this->session->userdata('user_id'));

        $query = $this->db->get();

        return $query->result();  

    }

public function fin_edit($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_financialyear');
        $this->db->where('fiyear_id' ,$id);
        $this->db->where('create_by' ,$this->session->userdata('user_id'));
        $query = $this->db->get();
         if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }

    public function Spayment()

    {
        
         return  $data = $this->db->select("Max(voucher_no) as voucher")

            ->from('accounts') 

            ->like('voucher_no', 'SP-', 'after')

            ->order_by('ID','desc')

            ->get()

            ->result_array();
            
            

  

           

    }

// customer code

     public function Creceive()

    {
 return  $data = $this->db->select("Max(voucher_no) as voucher")

            ->from('accounts') 

            ->like('voucher_no', 'CUSRESV-', 'after')

            ->order_by('ID','desc')

            ->get()

            ->result_array();
            
    

           

    }

     public function supplier_payment_insert(){



       $bank_id = $this->input->post('bank_id',TRUE);
//echo $bank_id;
        if(!empty($bank_id)){

       $bankname = $this->db->select('bank_name')->from('bank_add')->where('created_by',$this->session->userdata('user_id'))->where('bank_id',$bank_id)->get()->row()->bank_name;

   // echo $bankname;

       $bankcoaid = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName',$bankname)->get()->row()->HeadCode;
 //echo $bankcoaid;
   }else{

    $bankcoaid='';

   }

           $this->load->model('Web_settings');

           $currency_details = $this->Web_settings->retrieve_setting_editdata();

           $voucher_no = addslashes(trim($this->input->post('txtVNo',TRUE)));

            $Vtype="PM";

            $cAID = $this->input->post('cmbDebit',TRUE);

            $dAID = $this->input->post('txtCode',TRUE);

            $Debit =$this->input->post('txtAmount',TRUE);

            $Credit= 0;

            $VDate = $this->input->post('dtpDate',TRUE);

            $Narration=addslashes(trim($this->input->post('txtRemarks',TRUE)));

            $IsPosted=1;

            $IsAppove=1;

            $sup_id = $this->input->post('supplier_id',TRUE);



            $CreateBy=$this->session->userdata('user_id');

           $createdate=date('Y-m-d H:i:s');



                $dbtid=$dAID;

                $Damnt=$Debit;

                $supplier_id = $sup_id;

                $supinfo =$this->db->select('*')->from('supplier_information')->where('supplier_id',$supplier_id)->get()->row();

                    $supplierdebit = array(

              'VNo'            =>  $voucher_no,

              'Vtype'          =>  $Vtype,

              'VDate'          =>  $VDate,

              'COAID'          =>  $dbtid,

              'Narration'      =>  $Narration,

              'Debit'          =>  $Damnt,

              'Credit'         =>  0,

              'IsPosted'       => $IsPosted,

              'CreateBy'       => $CreateBy,

              'CreateDate'     => $createdate,

              'IsAppove'       => 1

            ); 

             $cc = array(

              'VNo'            =>  $voucher_no,

              'Vtype'          =>  $Vtype,

              'VDate'          =>  $VDate,

              'COAID'          =>  1020101,

              'Narration'      =>  'Paid to '.$supinfo->supplier_name,

              'Debit'          =>  0,

              'Credit'         =>  $Damnt,

              'IsPosted'       =>  1,

              'CreateBy'       =>  $CreateBy,

              'CreateDate'     =>  $createdate,

              'IsAppove'       =>  1

            ); 

             $bankc = array(

              'VNo'            =>  $voucher_no,

              'Vtype'          =>  $Vtype,

              'VDate'          =>  $VDate,

              'COAID'          =>  $bankcoaid,

              'Narration'      =>  'Supplier Payment To '.$supinfo->supplier_name,

              'Debit'          =>  0,

              'Credit'         =>  $Damnt,

              'IsPosted'       =>  1,

              'CreateBy'       =>  $CreateBy,

              'CreateDate'     =>  $createdate,

              'IsAppove'       =>  1

            ); 

              



           

              $this->db->insert('acc_transaction',$supplierdebit);



              if($this->input->post('paytype',TRUE) == 2){

                 $this->db->insert('acc_transaction',$bankc); 

              }

                if($this->input->post('paytype',TRUE) == 1){

                   $this->db->insert('acc_transaction',$cc);

                }

 $this->session->set_flashdata('message', display('save_successfully'));

          redirect('accounts/supplier_paymentreceipt/'.$supplier_id.'/'.$voucher_no.'/'.$dbtid);

    

}



public function insert_cashadjustment(){

            $this->load->model('Web_settings');

           $currency_details = $this->Web_settings->retrieve_setting_editdata();

           $voucher_no       = $this->input->post('txtVNo',TRUE);

            $Vtype           = "AD";

            $amount          = $this->input->post('txtAmount',TRUE);

            $type            = $this->input->post('type',TRUE);

            if($type == 1){

              $debit = $amount;

              $credit = 0;

            }

            if($type == 2){

              $debit = 0;

              $credit = $amount;

            }

            $VDate = $this->input->post('dtpDate',TRUE);

            $Narration=$this->input->post('txtRemarks',TRUE);

            $IsPosted=1;

            $IsAppove=1;

            $CreateBy=$this->session->userdata('user_id');

           $createdate=date('Y-m-d H:i:s');

 

     $cc = array(

      'VNo'            =>  $voucher_no,

      'Vtype'          =>  $Vtype,

      'VDate'          =>  $VDate,

      'COAID'          =>  1020101,

      'Narration'      =>  $Narration,

      'Debit'          =>  $debit,

      'Credit'         =>  $credit,

      'IsPosted'       =>  1,

      'CreateBy'       =>  $CreateBy,

      'CreateDate'     =>  $createdate,

      'IsAppove'       =>  1

    ); 



              $this->db->insert('acc_transaction',$cc);

          

 return true;



}



public function supplierinfo($supplier_id){

       return          $this->db->select('*')

                  ->from('supplier_information')
                    ->where('created_by',$this->session->userdata('user_id'))

                  ->where('supplier_id',$supplier_id)

                  ->get()

                  ->result_array();
                   

}



public function supplierpaymentinfo($voucher_no,$coaid){

  return   $this->db->select('*')

                  ->from('acc_transaction')

                  ->where('VNo',$voucher_no)

                  ->where('COAID',$coaid)

                  ->get()

                  ->result_array();



}
    function get_yearlist()
    {
        $this->db->select('*');
        $this->db->from('tbl_financialyear');
        $query = $this->db->get();
        if ($query->num_rows() >= 1) {
            return $query->result();
        } else {
            return false;
        }
    }
 public function assets_info($head_name)
	{
			 $this->db->select("*");
			 $this->db->from('acc_coa');
			 $this->db->where('PHeadName',$head_name);
			 $this->db->where('IsActive',1);
			 $this->db->group_by('HeadCode');
		   return  $records = $this->db->get()->result_array();     
	
	} 

     public function customer_receive_insert(){



      $bank_id = $this->input->post('bank_id',TRUE);

        if(!empty($bank_id)){

       $bankname = $this->db->select('bank_name')->from('bank_add')->where('a.create_by',$this->session->userdata('user_id'))->where('bank_id',$bank_id)->get()->row()->bank_name;

    

       $bankcoaid = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName',$bankname)->get()->row()->HeadCode;

   }else{

    $bankcoaid='';

   }

           $this->load->model('Web_settings');

           $currency_details = $this->Web_settings->retrieve_setting_editdata();

           $voucher_no       = addslashes(trim($this->input->post('txtVNo',TRUE)));

            $Vtype           = "CR";

            $cAID            = $this->input->post('cmbDebit',TRUE);

            $dAID            = $this->input->post('txtCode',TRUE);

            $Debit           = 0;

            $Credit          = $this->input->post('txtAmount',TRUE);

            $VDate           = $this->input->post('dtpDate',TRUE);

            $customer_id     = $this->input->post('customer_id',TRUE);

            $Narration       = addslashes(trim($this->input->post('txtRemarks',TRUE)));

            $IsPosted=1;

            $IsAppove=1;

            $CreateBy        = $this->session->userdata('user_id');

            $createdate      = date('Y-m-d H:i:s');

            $dbtid           = $dAID;

            $Credit          = $Credit;

            $customerid      = $customer_id;

             $customerinfo = $this->db->select('*')->from('customer_information')->where('customer_id',$customerid)->get()->row();

            $customercredit = array(

      'VNo'            =>  $voucher_no,

      'Vtype'          =>  $Vtype,

      'VDate'          =>  $VDate,

      'COAID'          =>  $dbtid,

      'Narration'      =>  $Narration,

      'Debit'          =>  0,

      'Credit'         =>  $Credit,

      'IsPosted'       => $IsPosted,

      'CreateBy'       => $CreateBy,

      'CreateDate'     => $createdate,

      'IsAppove'       => 1

    ); 

           

             $cc = array(

      'VNo'            =>  $voucher_no,

      'Vtype'          =>  $Vtype,

      'VDate'          =>  $createdate,

      'COAID'          =>  1020101,

      'Narration'      =>  'Cash in Hand For  '.$customerinfo->customer_name,

      'Debit'          =>  $Credit,

      'Credit'         =>  0,

      'IsPosted'       =>  1,

      'CreateBy'       =>  $CreateBy,

      'CreateDate'     =>  $createdate,

      'IsAppove'       =>  1

    ); 

       $bankc = array(

      'VNo'            =>  $voucher_no,

      'Vtype'          =>  $Vtype,

      'VDate'          =>  $createdate,

      'COAID'          =>  $bankcoaid,

      'Narration'      =>  'Customer Receive From '.$customerinfo->customer_name,

      'Debit'          =>  $Credit,

      'Credit'         =>  0,

      'IsPosted'       =>  1,

      'CreateBy'       =>  $CreateBy,

      'CreateDate'     =>  $createdate,

      'IsAppove'       =>  1

    ); 

       



            

          

              $this->db->insert('acc_transaction',$customercredit);

              if($this->input->post('paytype',TRUE) == 2){

                 $this->db->insert('acc_transaction',$bankc);

                

              }

                if($this->input->post('paytype',TRUE) == 1){

                   $this->db->insert('acc_transaction',$cc);

                }

             

               $message = 'Mr.'.$customerinfo->customer_name.',

        '.'You have Paid '.$Credit.' '.$currency_details[0]['currency'];

      

      $config_data = $this->db->select('*')->from('sms_settings')->get()->row();

        if($config_data->isreceive == 1){

          $this->smsgateway->send([

            'apiProvider' => 'nexmo',

            'username'    => $config_data->api_key,

            'password'    => $config_data->api_secret,

            'from'        => $config_data->from,

            'to'          => $customerinfo->customer_mobile,

            'message'     => $message

        ]);

      }

    

    $this->session->set_flashdata('message', display('save_successfully'));

          redirect('accounts/customer_receipt/'.$customerid.'/'.$voucher_no.'/'.$dbtid);

        }





public function custoinfo($customer_id){

  return $this->db->select('*')

                  ->from('customer_information')
                    ->where('create_by',$this->session->userdata('user_id'))

                  ->where('customer_id',$customer_id)

                  ->get()

                  ->result_array();

}



public function customerreceiptinfo($voucher_no,$coaid){

  return   $this->db->select('*')

                  ->from('acc_transaction')

                  ->where('VNo',$voucher_no)

                  ->where('COAID',$coaid)

                  ->get()

                  ->result_array();
              //    echo $this->db->last_query();



}

// =================== Settings data ==============================

public function software_setting_info(){

        $this->db->select('*');

        $this->db->from('web_setting');

        $this->db->where('setting_id', 1);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            return $query->result();

        }

        return false;

}





public function bankbook_firstqury($FromDate,$ToDate,$HeadCode){



  $sql = "SELECT SUM(Debit) Debit, SUM(Credit) Credit, IsAppove, COAID FROM acc_transaction

              WHERE VDate BETWEEN '$FromDate' AND '$ToDate' AND COAID = '$HeadCode' AND IsAppove =1 GROUP BY IsAppove, COAID";

              return  $sql;



}



public function bankbook_secondqury($FromDate,$HeadCode,$ToDate){

  $sql = "SELECT acc_transaction.VNo, acc_transaction.Vtype, acc_transaction.VDate, acc_transaction.Debit, acc_transaction.Credit, acc_transaction.IsAppove, acc_transaction.COAID, acc_coa.HeadName, acc_coa.PHeadName, acc_coa.HeadType, acc_transaction.Narration 

     FROM acc_transaction INNER JOIN acc_coa ON acc_transaction.COAID = acc_coa.HeadCode

         WHERE acc_transaction.IsAppove =1 AND VDate BETWEEN '$FromDate 00:00:00' AND '$ToDate 00:00:00' AND acc_transaction.COAID='$HeadCode' ORDER BY  acc_transaction.VDate, acc_transaction.VNo";



         return $sql;

}



public function cashbook_firstqury($FromDate,$ToDate,$HeadCode){

    $sql = "SELECT *,SUM(Debit) Debit, SUM(Credit) Credit, IsAppove, COAID FROM acc_transaction

              WHERE VDate BETWEEN '$FromDate' AND '$ToDate' AND COAID LIKE '$HeadCode%' AND IsAppove =1 GROUP BY IsAppove, COAID";

              return  $sql;

}





public function cashbook_secondqury($FromDate,$HeadCode,$ToDate){

   $sql = "SELECT acc_transaction.ID,acc_transaction.VNo, acc_transaction.Vtype, acc_transaction.VDate, acc_transaction.Debit, acc_transaction.Credit, acc_transaction.IsAppove, acc_transaction.COAID, acc_coa.HeadName, acc_coa.PHeadName, acc_coa.HeadType, acc_transaction.Narration 

        FROM acc_transaction INNER JOIN acc_coa ON acc_transaction.COAID = acc_coa.HeadCode

        WHERE acc_transaction.IsAppove =1 AND acc_transaction.VDate BETWEEN '$FromDate' AND '$ToDate' AND acc_transaction.COAID LIKE '$HeadCode%' GROUP BY acc_transaction.VNo, acc_transaction.Vtype, acc_transaction.VDate, acc_transaction.IsAppove, acc_transaction.COAID, acc_coa.HeadName, acc_coa.PHeadName, acc_coa.HeadType, acc_transaction.Narration

               HAVING SUM(acc_transaction.Debit)-SUM(acc_transaction.Credit)<>0

               ORDER BY  acc_transaction.VDate, acc_transaction.VNo";



         return $sql;

}





public function inventoryledger_firstqury($FromDate,$ToDate,$HeadCode){

   $sql = "SELECT SUM(Debit) Debit, SUM(Credit) Credit, IsAppove, COAID FROM acc_transaction

              WHERE VDate BETWEEN '$FromDate'  AND '$ToDate' AND COAID = '$HeadCode' AND IsAppove =1 GROUP BY IsAppove, COAID";

              return  $sql;

}





public function inventoryledger_secondqury($FromDate,$HeadCode,$ToDate){

   $sql = "SELECT acc_transaction.VNo, acc_transaction.Vtype, acc_transaction.VDate, acc_transaction.Debit, acc_transaction.Credit, acc_transaction.IsAppove, acc_transaction.COAID, acc_coa.HeadName, acc_coa.PHeadName, acc_coa.HeadType, acc_transaction.Narration 

     FROM acc_transaction INNER JOIN acc_coa ON acc_transaction.COAID = acc_coa.HeadCode

         WHERE acc_transaction.IsAppove =1 AND VDate BETWEEN '$FromDate 00:00:00' AND '$ToDate 00:00:00' AND acc_transaction.COAID='$HeadCode' ORDER BY  acc_transaction.VDate, acc_transaction.VNo";

          return  $sql;

}





public function trial_balance_firstquery($dtpFromDate,$dtpToDate,$COAID){

  $sql = "SELECT SUM(acc_transaction.Debit) AS Debit, SUM(acc_transaction.Credit) AS Credit FROM acc_transaction WHERE acc_transaction.IsAppove =1 AND VDate BETWEEN '".$dtpFromDate."' AND '".$dtpToDate."' AND COAID LIKE '$COAID%' ";

  return $sql;

}





public function trial_balance_secondquery($dtpFromDate,$dtpToDate,$COAID){

  $sql = "SELECT SUM(acc_transaction.Debit) AS Debit, SUM(acc_transaction.Credit) AS Credit FROM acc_transaction WHERE acc_transaction.IsAppove =1 AND VDate BETWEEN '".$dtpFromDate."' AND '".$dtpToDate."' AND COAID LIKE '$COAID%' ";

  

  return $sql;

}



public function profitloss_firstquery($dtpFromDate,$dtpToDate,$COAID){



   $sql ="SELECT SUM(acc_transaction.Debit)-SUM(acc_transaction.Credit) AS Amount FROM acc_transaction INNER JOIN acc_coa ON acc_transaction.COAID = acc_coa.HeadCode WHERE VDate BETWEEN '$dtpFromDate' AND '$dtpToDate' AND COAID LIKE '$COAID%'";

  

    return $sql;

}



public function profitloss_secondquery($dtpFromDate,$dtpToDate,$COAID){

  $sql = "SELECT SUM(acc_transaction.Credit)-SUM(acc_transaction.Debit) AS Amount FROM acc_transaction INNER JOIN acc_coa ON acc_transaction.COAID = acc_coa.HeadCode WHERE acc_transaction.IsAppove = 1 AND VDate BETWEEN '$dtpFromDate' AND '$dtpToDate' AND COAID LIKE '$COAID%'";

  

   return $sql;

}



public function cashflow_firstquery(){

   $sql = "SELECT * FROM acc_coa WHERE acc_coa.IsTransaction=1 AND acc_coa.HeadType='A' AND acc_coa.IsActive=1 AND acc_coa.HeadCode LIKE '1020101%'";

  

   return $sql;



}



public function cashflow_secondquery($dtpFromDate,$dtpToDate,$COAID){

    $sql = "SELECT SUM(acc_transaction.Debit)- SUM(acc_transaction.Credit) AS Amount FROM acc_transaction INNER JOIN acc_coa ON acc_transaction.COAID = acc_coa.HeadCode WHERE acc_transaction.IsAppove =1 AND VDate BETWEEN '".$dtpFromDate."' AND '".$dtpToDate."' AND COAID LIKE '$COAID%'";

  

   return $sql;

}



public function cashflow_thirdquery(){

    $sql = "SELECT * FROM acc_coa WHERE IsGL=1 AND HeadCode LIKE '102%' AND IsActive=1 AND HeadCode NOT LIKE '1020101%' AND HeadCode!='102' ";

  

   return $sql;

}



public function cashflow_forthquery($dtpFromDate,$dtpToDate,$COAID){

   $sql = "SELECT  SUM(acc_transaction.Credit) - SUM(acc_transaction.Debit) AS Amount FROM acc_transaction INNER JOIN acc_coa ON acc_transaction.COAID = acc_coa.HeadCode WHERE acc_transaction.IsAppove = 1 AND VDate BETWEEN '".$dtpFromDate."' AND '".$dtpToDate."' AND COAID LIKE '$COAID%' AND VNo in (SELECT VNo FROM acc_transaction WHERE COAID LIKE '1020101%') ";

  

   return $sql;

}





public function cashflow_fifthquery($dtpFromDate,$dtpToDate,$COAID){

   $sql = "SELECT  SUM(acc_transaction.Credit) - SUM(acc_transaction.Debit) AS Amount FROM acc_transaction INNER JOIN acc_coa ON acc_transaction.COAID = acc_coa.HeadCode WHERE acc_transaction.IsAppove = 1 AND VDate BETWEEN '".$dtpFromDate."' AND '".$dtpToDate."' AND COAID LIKE '4%' AND VNo in (SELECT VNo FROM acc_transaction WHERE COAID LIKE '1020101%') ";

  

   return $sql;

}





public function cashflow_sixthquery(){

   $sql = "SELECT * FROM acc_coa WHERE IsGL=1 AND HeadCode LIKE '3%' AND IsActive=1 ";

   return $sql;

}



public function cashflow_seventhquery($dtpFromDate,$dtpToDate,$COAID){

     $sql = "SELECT  SUM(acc_transaction.Credit) - SUM(acc_transaction.Debit) AS Amount FROM acc_transaction INNER JOIN acc_coa ON acc_transaction.COAID = acc_coa.HeadCode WHERE acc_transaction.IsAppove = 1 AND VDate BETWEEN '".$dtpFromDate."' AND '".$dtpToDate."' AND COAID LIKE '$COAID%' AND VNo in (SELECT VNo FROM acc_transaction WHERE COAID LIKE '1020101%') ";

   return $sql;

}


















  public function insert_Supplier_payment(){
        $auto_increment = rand();
        $voucher_no = addslashes(trim($this->input->post('txtVNo',TRUE)));
        $Vtype = "SupplierPayment";
        $VDate = $this->input->post('dtpDate',TRUE);
        $paytype = $this->input->post('paytype',TRUE);
        $bank_name = $this->input->post('bank_id',TRUE);
        $Narration = addslashes(trim($this->input->post('txtRemarks',TRUE)));
        $total_amount = $this->input->post('txtAmount',TRUE);
        $CreateBy = $this->session->userdata('user_id');

        $data1 = array(
            'type' => $Vtype,
            'voucher_no' => $voucher_no,
            'date' => $VDate,
            'remark' => $Narration,
            'bank' => $bank_name,
            'pay_type' => $paytype,
            'g_total1' => $total_amount,
            'cust_incremnt_id' => $auto_increment,
            'created_by' => $CreateBy,
        );
    
        $this->db->insert('accounts', $data1);
    // echo $this->db->last_query();

        $supplier_id = $this->input->post('supplier_id',TRUE);
        $txtCode = $this->input->post('txtCode',TRUE);
        $txtAmount = $this->input->post('txtAmount',TRUE);
    
        $contrainsert = array(
            'cust_incremnt_id' => $auto_increment,
            'account_name' => $supplier_id,
            'account_id' => $txtCode,
            'gtotal' => $txtAmount,
            'created_by' => $CreateBy
        );
    
        $this->db->insert('account_details', $contrainsert);
        
        
        redirect('accounts/supplier_payment_manager'); // Correct placement of redirect

        return true; // Moved return statement here
    }
    



 

    public function supplier_payment_indexpage(){
        $this->db->select('*');
        $this->db->from('accounts');
        $this->db->join('account_details', 'accounts.cust_incremnt_id = account_details.cust_incremnt_id', 'left'); // Joining on cust_incremnt_id
        $this->db->where('accounts.created_by', $this->session->userdata('user_id'));
     
        $this->db->where('type','SupplierPayment');
        $query = $this->db->get();
         if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }
    



 
 
 public function supplier_payment_edit($cust_incremnt_id){
        $this->db->select('*');
        $this->db->from('accounts');
        $this->db->join('account_details', 'accounts.cust_incremnt_id = account_details.cust_incremnt_id', 'left');
        $this->db->where('accounts.created_by', $this->session->userdata('user_id'));
        $this->db->where('accounts.cust_incremnt_id', $cust_incremnt_id);
        $this->db->where('account_details.cust_incremnt_id', $cust_incremnt_id);
        $query = $this->db->get();
        // echo $this->db->last_query();
        if ($query === false) {
            echo $this->db->error(); // Display the error for debugging
            return false;
        }
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false; // No matching records found
    }



//   public function fin_edit($id)
//     {
//         $this->db->select('*');
//         $this->db->from('tbl_financialyear');
//         $this->db->where('fiyear_id' ,$id);
//         $this->db->where('create_by' ,$this->session->userdata('user_id'));
//         $query = $this->db->get();
//          if ($query->num_rows() > 0) {
//             return $query->result_array();
//         }
//     }

























}

