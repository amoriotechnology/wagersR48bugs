<?php
error_reporting(1);
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Purchases extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
public function add_payment_terms($postData){
        $data=array(
            'payment_terms' => $postData,
            'create_by' => $this->session->userdata('user_id')
        );
        $this->db->insert('payment_terms', $data);
        //echo $this->db->last_query();
        $this->db->select('*');
        $this->db->from('payment_terms');
        $this->db->where('create_by' ,$this->session->userdata('user_id'));
        $query = $this->db->get();
        return $query->result_array();
    }
    
    
    
            public function delete_pay_info() {
    $payment_id = $this->input->post('payment_id');
        $bal = $this->input->post('bal');
                $paid_amt = $this->input->post('paid_amt');
   
    $this->db->query("DELETE FROM `payment` WHERE `payment_id` = $payment_id AND `balance` = $bal AND `amt_paid` = $paid_amt");

$this->db->select('SUM(amt_paid) as total_paid', FALSE);
$this->db->select('total_amt');
$this->db->from('payment');
$this->db->where('payment_id', $payment_id);
$query = $this->db->get();
  //echo $this->db->last_query();
$totalPaid=0;
$balance1=0;

if ($query->num_rows() > 0) {
    $result = $query->row();
    $totalPaid = $result->total_paid;
    $totalAmt = $result->total_amt;

    $balance1 = $totalAmt - $totalPaid;
}
  $unq_inv=$this->input->post('unq_inv',TRUE);
        $data1 = array(
                'payment_id' => $payment_id,
               'balances'             => $balance1,
                 'amount_paids'             =>  $totalPaid,
                // 'gtotal'     =>$total_amt[$i]
                 );
             //    print_r($data1);
                 $this->db->where('bill_number', $unq_inv);
                 $this->db->update('service', $data1);


//echo $this->db->last_query();
//die();


    return ['status' => 'success', 'message' => 'Payment information deleted successfully.'];
}
    
    
    
    // public function purchase_delete_pay_info($payment_id, $bal, $paid_amt) {
    //     // Sanitize input values
    //     $payment_id = $this->db->escape($payment_id);
    //     $bal = $this->db->escape($bal);
    //     $paid_amt = $this->db->escape($paid_amt);
    //     // Use query binding for the SQL query
    //     $this->db->query("DELETE FROM `payment` WHERE `payment_id` = $payment_id AND `balance` = $bal AND `amt_paid` = $paid_amt");
    //     // Output the last query (optional for debugging)
    //     //  echo $this->db->last_query();  die();
    //     // Assuming you want to return something after deletion, you can return a message or status
    //     return ['status' => 'success', 'message' => 'Payment information deleted successfully.'];
    // }
    
    public function purchase_delete_pay_info() {
    $payment_id = $this->input->post('payment_id');
    $bal = $this->input->post('bal');
    $paid_amt = $this->input->post('paid_amt');
    $this->db->query("DELETE FROM `payment` WHERE `payment_id` = $payment_id AND `balance` = $bal AND `amt_paid` = $paid_amt");
    //  echo $this->db->last_query();
$this->db->select('SUM(amt_paid) as total_paid', FALSE);
$this->db->select('total_amt');
$this->db->from('payment');
$this->db->where('payment_id', $payment_id);
$query = $this->db->get();
//  echo $this->db->last_query();
$totalPaid=0;
$balance1=0;
if ($query->num_rows() > 0) {
$result = $query->row();
$totalPaid = $result->total_paid;
$totalAmt = $result->total_amt;
$balance1 = $totalAmt - $totalPaid;
}
$unq_inv=$this->input->post('unq_inv',TRUE);
    $data1 = array(
             'payment_id' => $payment_id,
             'balance'             => $balance1,
             'paid_amount'             =>  $totalPaid,
              );
              $this->db->where('chalan_no', $unq_inv);
             $this->db->update('product_purchase', $data1);
// echo $this->db->last_query();
// die();
return ['status' => 'success', 'message' => 'Payment information deleted successfully.'];
}
    
    
    
    
    
    public function get_cust_payment_overall_info_ser_pro($customer_id){

  $this->db->select('sum(a.gtotals) as overall_gtotal, sum(a.balances) as overall_due, sum(a.amount_paids) as overall_paid');
        $this->db->from('service a');
          $this->db->where('a.service_provider_name',$customer_id);

        $this->db->where('a.create_by',$this->session->userdata('user_id'));
        $query = $this->db->get();
   //   echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;

    }
           public function get_cust_payment_info_ser_provider($customer_id,$current_in_id=null){
$this->db->select('a.*');
$this->db->from('service a');
 
$this->db->where("(a.amount_paids != a.gtotals)");
$this->db->where("(a.balances > 0)");
if($current_in_id){
$this->db->where("(a.bill_number != '$current_in_id')");
}
$this->db->where('a.create_by', $this->session->userdata('user_id'));
$this->db->where('a.service_provider_name', $customer_id);

        $query = $this->db->get();
    //echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;

    } 

   public function bulk_payment_ser_provider_unique(){
            $payment_id=$this->input->post('payment_id_this_invoice',TRUE); 
      $amount_pay =$this->input->post('amount_pay_1',TRUE);
        $balance =$this->input->post('my_bal_1',TRUE);
        $t_amt_paid=$this->input->post('tl_amt_pd',TRUE);
        $tl_amt=$t_amt_paid+$amount_pay;
        
          $unq_inv=$this->input->post('unq_inv',TRUE);
           $updated_balance = $balance-$amount_pay;
    //  echo $payment_id."/".$amount_pay;die();
        $data1 = array(
                'payment_id' => $payment_id,
                //'inv_no'        =>$invoice_no[$i],
               // 'amt_pay'         => $amount_pay[$i],
                'balances'             => $updated_balance,
                 'amount_paids'             =>  $tl_amt,
                // 'gtotal'     =>$total_amt[$i]
                 );
             //    print_r($data1);
                 $this->db->where('bill_number', $unq_inv);
                 $this->db->update('service', $data1);
                 echo $this->db->last_query();
                               $bulk_payment_date =$this->input->post('bulk_payment_date',TRUE);
  $bulk_pay_ref=$this->input->post('bulk_pay_ref',TRUE);
  $bulk_bank=$this->input->post('bulk_bank',TRUE);
                  $data2 = array(
                'payment_id' =>$payment_id,
                'payment_date'        =>$bulk_payment_date,
                'reference_no'         => $bulk_pay_ref,
                'total_amt'             => $this->input->post('t_unique',TRUE),
                 'amt_received'             => $amount_pay,
                  'amt_paid'             => $amount_pay,
                 'balance'     => $updated_balance,
                 'bank_name'  => $bulk_bank,
                 'create_by' =>$this->session->userdata('user_id')
                 );
                 $this->db->insert('payment', $data2);
                  echo $this->db->last_query();
    }
    
    
    
    
    
    
    
    
        public function bulk_payment_ser_provider(){
 $payment_id                = $this->input->post('payment_id',TRUE);
        $invoice_no =$this->input->post('invoice_no',TRUE);
      $amount_pay =$this->input->post('amount_pay',TRUE);
     $updated_bal=$this->input->post('updated_bal',TRUE);
     $total_amt=$this->input->post('total_amt',TRUE);
     $amt_pay=$this->input->post('amount_pay',TRUE);
     $total_amt=$this->input->post('total_amt',TRUE);
     $bulk_payment_date =$this->input->post('bulk_payment_date',TRUE);
     $bulk_pay_ref=$this->input->post('bulk_pay_ref',TRUE);
     $bulk_bank=$this->input->post('bulk_bank',TRUE);
  
  
  
  $advanceamount=$this->input->post('advanceamount',TRUE);
  $supplier_id=$this->input->post('supplier_id',TRUE);
 
  $data5 = array(
    'advanceamount' => $advanceamount,
    'supplier_id'   => $supplier_id,
     );
    $this->db->where('supplier_id', $supplier_id);
    $this->db->update('supplier_information', $data5);
  
   
   for ($i = 0, $n = count($payment_id); $i < $n; $i++) {
    if($amount_pay[$i]){
           $data1 = array(
                'payment_id' =>$payment_id[$i],
                //'inv_no'        =>$invoice_no[$i],
               // 'amt_pay'         => $amount_pay[$i],
                'balances'             => $updated_bal[$i],
                 'amount_paids'             =>  $total_amt[$i]-$updated_bal[$i],
                // 'gtotal'     =>$total_amt[$i]
                 );
             //    print_r($data1);
                 $this->db->where('bill_number', $invoice_no[$i]);
                 $this->db->update('service', $data1);
              echo $this->db->last_query();
   $data2 = array(
                'payment_id' =>$payment_id[$i],
                'payment_date'        =>$bulk_payment_date,
                'reference_no'         => $bulk_pay_ref,
                'total_amt'             => $total_amt[$i],
                 'amt_received'             => $amt_pay[$i],
                  'amt_paid'             => $amt_pay[$i],
                 'balance'     =>$updated_bal[$i],
                 'bank_name'  => $bulk_bank,
                 'create_by' =>$this->session->userdata('user_id')
                 );
                 $this->db->insert('payment', $data2);
                echo $this->db->last_query();
//

                }
       echo 'done';
           // $this->db->insert('product_purchase_details', $data1);
    }//die();
}







  public function get_cust_payment_overall_info($customer_id){
  $this->db->select('sum(a.grand_total_amount) as overall_gtotal, sum(a.balance) as overall_due, sum(a.paid_amount) as overall_paid');
        $this->db->from('product_purchase a');
          $this->db->where('a.supplier_id',$customer_id);

        $this->db->where('a.create_by',$this->session->userdata('user_id'));
        $query = $this->db->get();
     // echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;

    }
public function bulk_payment_unique(){
    $payment_id=$this->input->post('pay_id',TRUE);
    $amount_pay =$this->input->post('amount_pay_1',TRUE);
      $balance =$this->input->post('my_bal_1',TRUE);
      $t_amt_paid=$this->input->post('tl_amt_pd',TRUE);
      $tl_amt=$t_amt_paid+$amount_pay;
        $unq_inv=$this->input->post('unq_inv',TRUE);
         $updated_balance = $balance-$amount_pay;
  //  echo $payment_id."/".$amount_pay;die();
      $data1 = array(
                      'payment_id' => $payment_id,
                      'balance' => (!empty($updated_balance) ? $updated_balance : '0'),
                      'paid_amount' => $tl_amt,
               );
           //    print_r($data1);
               $this->db->where('chalan_no', $unq_inv);
               $this->db->update('product_purchase', $data1);
                // echo $this->db->last_query();
                             $bulk_payment_date =$this->input->post('bulk_payment_date',TRUE);
$bulk_pay_ref=$this->input->post('bulk_pay_ref',TRUE);
$bulk_bank=$this->input->post('bulk_bank',TRUE);
                $data2 = array(
              'payment_id' =>$payment_id,
              'payment_date'        =>$bulk_payment_date,
              'reference_no'         => $bulk_pay_ref,
              'total_amt'             => $this->input->post('t_unique',TRUE),
               'amt_received'             => $amount_pay,
                'amt_paid'             => $amount_pay,
               'balance'     => $updated_balance,
               'bank_name'  => $bulk_bank,
               'create_by' =>$this->session->userdata('user_id')
               );
               $this->db->insert('payment', $data2);
  }
    
    
    public function bulk_payment(){
    $payment_id                = $this->input->post('payment_id',TRUE);
           $invoice_no =$this->input->post('invoice_no',TRUE);
     $amount_pay =$this->input->post('amount_pay',TRUE);
     $updated_bal=$this->input->post('updated_bal',TRUE);
      $total_amt=$this->input->post('total_amt',TRUE);
       $amt_pay=$this->input->post('amount_pay',TRUE);
        $total_amt=$this->input->post('total_amt',TRUE);
        $bulk_payment_date =$this->input->post('bulk_payment_date',TRUE);
        $bulk_pay_ref=$this->input->post('bulk_pay_ref',TRUE);
        $bulk_bank=$this->input->post('bulk_bank',TRUE);
        $advanceamount=$this->input->post('advanceamount',TRUE);
        $supplier_id=$this->input->post('supplier_id',TRUE);
        $data5 = array(
          'advanceamount' => $advanceamount,
          'supplier_id'   => $supplier_id,
           );
          $this->db->where('supplier_id', $supplier_id);
          $this->db->update('supplier_information', $data5);
      for ($i = 0, $n = count($payment_id); $i < $n; $i++) {
       if($amount_pay[$i]){
              $data1 = array(
                   'payment_id' =>$payment_id[$i],
                   //'inv_no'        =>$invoice_no[$i],
                  // 'amt_pay'         => $amount_pay[$i],
                   'balance'             => (!empty($updated_bal[$i])?$updated_bal[$i]:''),
                    'paid_amount'             =>  $total_amt[$i]-$updated_bal[$i],
                   // 'gtotal'     =>$total_amt[$i]
                    );
                //    print_r($data1);
                    $this->db->where('chalan_no', $invoice_no[$i]);
                    $this->db->update('product_purchase', $data1);
               //  echo $this->db->last_query();
      $data2 = array(
                   'payment_id' =>$payment_id[$i],
                   'payment_date'        =>$bulk_payment_date,
                   'reference_no'         => $bulk_pay_ref,
                   'total_amt'             => $total_amt[$i],
                    'amt_received'             => $amt_pay[$i],
                     'amt_paid'             => $amt_pay[$i],
                    'balance'     =>$updated_bal[$i],
                    'bank_name'  => $bulk_bank,
                    'create_by' =>$this->session->userdata('user_id')
                    );
                    $this->db->insert('payment', $data2);
             //     echo $this->db->last_query();
   //
                   }
          echo 'done';
              // $this->db->insert('product_purchase_details', $data1);
       }//die();
   }
    


 public function get_cust_payment_info($customer_id,$current_in_id=null){
$this->db->select('a.*');
$this->db->from('product_purchase a');

$this->db->where("(a.paid_amount != a.grand_total_amount)");
$this->db->where("(a.balance > 0)");
if($current_in_id){
$this->db->where("(a.chalan_no != '$current_in_id')");
}
$this->db->where('a.create_by', $this->session->userdata('user_id'));
$this->db->where('a.supplier_id', $customer_id);

        $query = $this->db->get();
    // echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;

    } 
    
    
    
    
    
    
    public function insert_noofpayment_terms($postData){
        $data=array(
            'noofpay_terms' => $postData,
            'create_by' => $this->session->userdata('user_id')
        );
        $this->db->insert('noofpaymentterms', $data);
        //echo $this->db->last_query();
        $this->db->select('*');
        $this->db->from('noofpaymentterms');
        $this->db->where('create_by' ,$this->session->userdata('user_id'));
        $query = $this->db->get();
        return $query->result_array();
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    //Count purchase
    public function count_purchase() {
        $this->db->select('a.*,b.supplier_name');
        $this->db->from('product_purchase a');
        $this->db->join('supplier_information b', 'b.supplier_id = a.supplier_id');
         $this->db->where('a.create_by',$this->session->userdata('user_id'));
        $this->db->order_by('a.purchase_date', 'desc');
        $this->db->order_by('purchase_id', 'desc');
        $query = $this->db->get();

        $last_query = $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        }
        return false;
    }
    
    public function getexpense_taxinfo()
     {
        $user_id = $this->session->userdata('user_id');

        $sql="SELECT * FROM `tax_information` WHERE (`status_type` = 'expenses' OR `status_type` = 'Both') AND `created_by` = $user_id";

        $query = $this->db->query($sql);
        // echo $this->db->last_query();

        if ($query->num_rows() > 0) {

            return $query->result_array();

        }

        return false;
     }
    
    
    public function get_allexpense() {
        $this->db->select('*');
        $this->db->from('product_purchase pp');
        $this->db->join('supplier_information si' , 'pp.supplier_id=si.supplier_id');
        $this->db->where('create_by' ,$this->session->userdata('user_id'));
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }


    public function getPurchasealldata() {
        $this->db->select('*');
        $this->db->from('purchase_order po');
        $this->db->join('supplier_information si' , 'po.supplier_id=si.supplier_id');
        $this->db->where('create_by' ,$this->session->userdata('user_id'));
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }



    public function getOceanImportData() {
        $this->db->select('*');
        $this->db->from('ocean_import_tracking oi');
        $this->db->join('customer_information ci' , 'oi.consignee=ci.customer_id ');
        $this->db->join('supplier_information si' , 'oi.supplier_id=si.supplier_id');
        $this->db->where('created_by' ,$this->session->userdata('user_id'));
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }


    public function getRoadTransportData() {
        $this->db->select('*');
        $this->db->from('expense_trucking');
        $this->db->where('create_by' ,$this->session->userdata('user_id'));
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }
    
    
    
     public function getExpenseallData()
    {
       $user_id = $this->session->userdata('user_id');

        $sql="SELECT * FROM `tax_information` WHERE (`status_type` = 'expenses' OR `status_type` = 'Both') AND `created_by` = $user_id";

        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {

            return $query->result_array();

        }

        return false;
    }
    
    public function getTruckingExpenseallData()
    {
        $user_id = $this->session->userdata('user_id');

        $sql="SELECT * FROM `tax_information` WHERE (`status_type` = 'expenses' OR `status_type` = 'Both') AND `created_by` = $user_id";

        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {

            return $query->result_array();

        }

        return false;
    }
    
    
     public function editPurchaseGetdata()
    {
       $user_id = $this->session->userdata('user_id');

        $sql="SELECT * FROM `tax_information` WHERE (`status_type` = 'expenses' OR `status_type` = 'Both') AND `created_by` = $user_id";

        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {

            return $query->result_array();

        }

        return false;
    }
    
    public function getpurchasetaxdetails()
    {
       $user_id = $this->session->userdata('user_id');

        $sql="SELECT * FROM `tax_information` WHERE (`status_type` = 'expenses' OR `status_type` = 'Both') AND `created_by` = $user_id";

        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {

            return $query->result_array();

        }

        return false;
    }
    
    
    public function editPurchaseallData()
    {
        $user_id = $this->session->userdata('user_id');

        $sql="SELECT * FROM `tax_information` WHERE (`status_type` = 'expenses' OR `status_type` = 'Both') AND `created_by` = $user_id";

        $query = $this->db->query($sql);


//  echo $this->db->last_query();

        if ($query->num_rows() > 0) {

            return $query->result_array();

        }

        return false;
    }
    
    
    public function editPurallData()
    {
       $user_id = $this->session->userdata('user_id');

        $sql="SELECT * FROM `tax_information` WHERE (`status_type` = 'expenses' OR `status_type` = 'Both') AND `created_by` = $user_id";

        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {

            return $query->result_array();

        }

        return false;
    }




  public function tax_info() {
      $this->db->select('tax_id,tax');
      $this->db->from('tax_information');
      $this->db->where('created_by',$this->session->userdata('user_id'));
      $query = $this->db->get();
    //  echo $this->db->last_query(); die();
      return $query->result_array();
  }




   public function edit_oceanimport() {
        $this->db->select('*');
        $this->db->from('customer_information');
        $query = $this->db->get();
        // $last_query = $this->db->last_query();
        return $query->result_array();
    }



    public function expense_package()
    {
        $sql='select * from expense_packing_list where create_by='.$_SESSION['user_id'];
        $query=$this->db->query($sql);
 if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }
    
    
    public function getEditExpensesData($purchase_id)
    {
        $this->db->select('*'); 
        $this->db->from('attachments');
        $this->db->where('attachment_id' ,$purchase_id);
        $this->db->where('created_by' ,$this->session->userdata('user_id'));
        $this->db->where('sub_menu' ,'Expenses');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }
    
     public function getEditOceanImportdata($purchase_id)
    {
        $this->db->select('*'); 
        $this->db->from('attachments');
        $this->db->where('attachment_id' ,$purchase_id);
        $this->db->where('created_by' ,$this->session->userdata('user_id'));
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }
    
    
     public function geteditPurchasedata($purchase_id)
    {
        $this->db->select('*'); 
        $this->db->from('attachments');
        $this->db->where('attachment_id' ,$purchase_id);
        $this->db->where('created_by' ,$this->session->userdata('user_id'));
        $this->db->where('sub_menu' ,'Purchase');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }

        //Count purchase
    public function count_purchase_order() {
        $this->db->select('*');
        $this->db->from('purchase_order');
  //  $this->db->join('supplier_information b', 'b.supplier_id = a.supplier_id');
       ////  $this->db->where('a.create_by',$this->session->userdata('user_id'));
//$this->db->order_by('a.purchase_date', 'desc');
     //   $this->db->order_by('purchase_id', 'desc');
        $query = $this->db->get();

        $last_query = $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        }
        return false;
    }

           //Count Ocean Import
    public function count_ocean_import() {
        
        
        $this->db->select('*');
        $this->db->from('ocean_import_tracking');
  //  $this->db->join('supplier_information b', 'b.supplier_id = a.supplier_id');
       ////  $this->db->where('a.create_by',$this->session->userdata('user_id'));
//$this->db->order_by('a.purchase_date', 'desc');
     //   $this->db->order_by('purchase_id', 'desc');
        $query = $this->db->get();

        $last_query = $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        }
        return false;
    }


               //Count Trucking
    public function count_trucking() {
        $this->db->select('*');
        $this->db->from('expense_trucking');
  //    $this->db->join('supplier_information b', 'b.supplier_id = a.supplier_id');
       ////  $this->db->where('a.create_by',$this->session->userdata('user_id'));
//$this->db->order_by('a.purchase_date', 'desc');
     //   $this->db->order_by('purchase_id', 'desc');
        $query = $this->db->get();

        $last_query = $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        }
        return false;
    }
    

    


     public function getPurchaseList($postData=null){
         $this->load->library('occational');
         $this->load->model('Web_settings');
         $currency_details = $this->Web_settings->retrieve_setting_editdata();
         $response = array();
         $fromdate = $this->input->post('fromdate');
         $todate   = $this->input->post('todate');
         if(!empty($fromdate)){
            $datbetween = "(a.purchase_date BETWEEN '$fromdate' AND '$todate')";
         }else{
            $datbetween = "";
         }
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
            $searchQuery = " (b.supplier_name like '%".$searchValue."%' or a.chalan_no like '%".$searchValue."%' or a.purchase_date like'%".$searchValue."%')";
         }

         ## Total number of records without filtering
        $this->db->select('count(*) as allcount');
        $this->db->from('product_purchase a');
        $this->db->join('supplier_information b', 'b.supplier_id = a.supplier_id','left');
        $this->db->where('a.create_by',$this->session->userdata('user_id'));
          if(!empty($fromdate) && !empty($todate)){
             $this->db->where($datbetween);
         }
          if($searchValue != '')
          $this->db->where($searchQuery);
          
         $records = $this->db->get()->result();
         $totalRecords = $records[0]->allcount;

         ## Total number of record with filtering
         $this->db->select('count(*) as allcount');
        $this->db->from('product_purchase a');
        $this->db->join('supplier_information b', 'b.supplier_id = a.supplier_id','left');
        $this->db->where('a.create_by',$this->session->userdata('user_id'));
         if(!empty($fromdate) && !empty($todate)){
             $this->db->where($datbetween);
         }
         if($searchValue != '')
            $this->db->where($searchQuery);
          
         $records = $this->db->get()->result();
         $totalRecordwithFilter = $records[0]->allcount;

         ## Fetch records
        $this->db->select('a.*,b.supplier_name');
        $this->db->from('product_purchase a');
        $this->db->join('supplier_information b', 'b.supplier_id = a.supplier_id','left');
        $this->db->where('a.create_by',$this->session->userdata('user_id'));
          if(!empty($fromdate) && !empty($todate)){
             $this->db->where($datbetween);
         }
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

           $button .='  <a href="'.$base_url.'Cpurchase/purchase_details_data/'.$record->purchase_id.'" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="left" title="'.display('purchase_details').'"><i class="fa fa-window-restore" aria-hidden="true"></i></a>';
      if($this->permission1->method('manage_purchase','update')->access()){
         $button .=' <a href="'.$base_url.'Cpurchase/purchase_update_form/'.$record->purchase_id.'" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="'. display('update').'"><i class="fa fa-pencil" aria-hidden="true"></i></a> ';
     }

     

         $purchase_ids ='<a href="'.$base_url.'Cpurchase/purchase_update_form/'.$record->purchase_id.'">'.$record->purchase_id.'</a>';
               
            $data[] = array( 
                'sl'               =>$sl,
                'chalan_no'        =>$record->chalan_no,
                 'etd'        =>$record->etd,
                  'eta'        =>$record->eta,
                'purchase_id'      =>$purchase_ids,
                'supplier_name'    =>$record->supplier_name,
                'purchase_date'    =>$this->occational->dateConvert($record->purchase_date),
                'total_amount'     =>$record->grand_total_amount,
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





       public function getPurchaseOrderList($postData=null){
         $this->load->library('occational');
         $this->load->model('Web_settings');
         $currency_details = $this->Web_settings->retrieve_setting_editdata();
         $response = array();
         $fromdate = $this->input->post('fromdate');
         $todate   = $this->input->post('todate');
         if(!empty($fromdate)){
            $datbetween = "(a.est_ship_date BETWEEN '$fromdate' AND '$todate')";
         }else{
            $datbetween = "";
         }
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
            $searchQuery = " (b.supplier_name like '%".$searchValue."%' or a.chalan_no like '%".$searchValue."%' or a.purchase_date like'%".$searchValue."%')";
         }

        ## Total number of records without filtering
        $this->db->select('count(*) as allcount');
        $this->db->from('purchase_order a');
        $this->db->join('supplier_information b', 'b.supplier_id = a.supplier_id','left');
       // $this->db->where('a.create_by',$this->session->userdata('user_id'));
        if(!empty($fromdate) && !empty($todate)){
             $this->db->where($datbetween);
         }
          if($searchValue != '')
          $this->db->where($searchQuery);
          
         $records = $this->db->get()->result();
         $totalRecords = $records[0]->allcount;

         ## Total number of record with filtering
         $this->db->select('count(*) as allcount');
        $this->db->from('purchase_order a');
        $this->db->join('supplier_information b', 'b.supplier_id = a.supplier_id','left');
        $this->db->where('a.create_by',$this->session->userdata('user_id'));
         if(!empty($fromdate) && !empty($todate)){
             $this->db->where($datbetween);
         }
         if($searchValue != '')
            $this->db->where($searchQuery);
          
         $records = $this->db->get()->result();
         $totalRecordwithFilter = $records[0]->allcount;

         ## Fetch records
        $this->db->select('a.*,b.supplier_name');
        $this->db->from('purchase_order a');
        $this->db->join('supplier_information b', 'b.supplier_id = a.supplier_id','left');
        $this->db->where('a.create_by',$this->session->userdata('user_id'));
          if(!empty($fromdate) && !empty($todate)){
             $this->db->where($datbetween);
         }
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

           $button .='  <a href="'.$base_url.'Cpurchase/purchase_order_details_data/'.$record->purchase_order_id.'" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="left" title="'.display('purchase_details').'"><i class="fa fa-window-restore" aria-hidden="true"></i></a>';
      if($this->permission1->method('manage_purchase','update')->access()){
         $button .=' <a href="'.$base_url.'Cpurchase/purchase_order_update_form/'.$record->purchase_order_id.'" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="'. display('update').'"><i class="fa fa-pencil" aria-hidden="true"></i></a> ';
     }

     

         $purchase_ids ='<a href="'.$base_url.'Cpurchase/purchase_order_update_form/'.$record->purchase_order_id.'">'.$record->purchase_order_id.'</a>';
               
               $data[] = array( 
                'sl'               =>$sl,
                'chalan_no'        =>$record->chalan_no,
                'etd'        =>$record->etd,
                'eta'        =>$record->eta,
                'purchase_id'      =>$purchase_ids,
                'supplier_name'    =>$record->supplier_name,
                'purchase_date'    =>$this->occational->dateConvert($record->purchase_date),
                'total_amount'     =>$record->grand_total_amount,
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



      public function getOceanImportList($postData=null){
         $this->load->library('occational');
         $this->load->model('Web_settings');
         $currency_details = $this->Web_settings->retrieve_setting_editdata();
         $response = array();
         $fromdate = $this->input->post('fromdate');
         $todate   = $this->input->post('todate');
         if(!empty($fromdate)){
            $datbetween = "(a.est_ship_date BETWEEN '$fromdate' AND '$todate')";
         }else{
            $datbetween = "";
         }
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
            $searchQuery = " (b.supplier_name like '%".$searchValue."%' or a.chalan_no like '%".$searchValue."%' or a.purchase_date like'%".$searchValue."%')";
         }

        ## Total number of records without filtering
        $this->db->select('count(*) as allcount');
        $this->db->from('ocean_import_tracking a');
        $this->db->join('supplier_information b', 'b.supplier_id = a.supplier_id','left');
       // $this->db->where('a.create_by',$this->session->userdata('user_id'));
        if(!empty($fromdate) && !empty($todate)){
             $this->db->where($datbetween);
         }
          if($searchValue != '')
          $this->db->where($searchQuery);
          
         $records = $this->db->get()->result();
         $totalRecords = $records[0]->allcount;

         ## Total number of record with filtering
         $this->db->select('count(*) as allcount');
        $this->db->from('ocean_import_tracking a');
        $this->db->join('supplier_information b', 'b.supplier_id = a.supplier_id','left');
        $this->db->where('a.create_by',$this->session->userdata('user_id'));
         if(!empty($fromdate) && !empty($todate)){
             $this->db->where($datbetween);
         }
         if($searchValue != '')
            $this->db->where($searchQuery);
          
         $records = $this->db->get()->result();
         $totalRecordwithFilter = $records[0]->allcount;

         ## Fetch records
        $this->db->select('a.*,b.supplier_name');
        $this->db->from('ocean_import_tracking a');
        $this->db->join('supplier_information b', 'b.supplier_id = a.supplier_id','left');
        $this->db->where('a.create_by',$this->session->userdata('user_id'));
          if(!empty($fromdate) && !empty($todate)){
             $this->db->where($datbetween);
         }
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

           $button .='  <a href="'.$base_url.'Cpurchase/ocean_import_tracking_details_data/'.$record->ocean_import_tracking_id.'" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="left" title="'.display('purchase_details').'"><i class="fa fa-window-restore" aria-hidden="true"></i></a>';
      if($this->permission1->method('manage_purchase','update')->access()){
         $button .=' <a href="'.$base_url.'Cpurchase/ocean_import_tracking_update_form/'.$record->ocean_import_tracking_id.'" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="'. display('update').'"><i class="fa fa-pencil" aria-hidden="true"></i></a> ';
     }

     

         $purchase_ids ='<a href="'.$base_url.'Cpurchase/ocean_import_tracking_update_form/'.$record->ocean_import_tracking_id.'">'.$record->ocean_import_tracking_id.'</a>';
               
               $data[] = array( 
                'sl'               =>$sl,
                'booking_no'        =>$record->booking_no,
                 'container_no'        =>$record->container_no,
                  'seal_no'        =>$record->seal_no,
                'ocean_import_tracking_id'      =>$purchase_ids,
                'supplier_name'    =>$record->supplier_name,
                'invoice_date'    =>$this->occational->dateConvert($record->invoice_date),
                'place_of_delivery'     =>$record->place_of_delivery,
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




        public function getTruckingList($postData=null){
         $this->load->library('occational');
         $this->load->model('Web_settings');
         $currency_details = $this->Web_settings->retrieve_setting_editdata();
         $response = array();
         $fromdate = $this->input->post('fromdate');
         $todate   = $this->input->post('todate');
         if(!empty($fromdate)){
            $datbetween = "(a.est_ship_date BETWEEN '$fromdate' AND '$todate')";
         }else{
            $datbetween = "";
         }
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
            $searchQuery = " (b.supplier_name like '%".$searchValue."%' or a.chalan_no like '%".$searchValue."%' or a.purchase_date like'%".$searchValue."%')";
         }

        ## Total number of records without filtering
        $this->db->select('count(*) as allcount');
        $this->db->from('expense_trucking a');
        $this->db->join('customer_information b', 'b.customer_id = a.bill_to','left');
       // $this->db->where('a.create_by',$this->session->userdata('user_id'));
        if(!empty($fromdate) && !empty($todate)){
             $this->db->where($datbetween);
         }
          if($searchValue != '')
          $this->db->where($searchQuery);
          
         $records = $this->db->get()->result();
         $totalRecords = $records[0]->allcount;

         ## Total number of record with filtering
         $this->db->select('count(*) as allcount');
        $this->db->from('expense_trucking a');
         $this->db->join('customer_information b', 'b.customer_id = a.bill_to','left');
        $this->db->where('a.create_by',$this->session->userdata('user_id'));
         if(!empty($fromdate) && !empty($todate)){
             $this->db->where($datbetween);
         }
         if($searchValue != '')
            $this->db->where($searchQuery);
          
         $records = $this->db->get()->result();
         $totalRecordwithFilter = $records[0]->allcount;

         ## Fetch records
        $this->db->select('a.*,b.customer_name');
          $this->db->from('expense_trucking a');
         $this->db->join('customer_information b', 'b.customer_id = a.bill_to','left');
        $this->db->where('a.create_by',$this->session->userdata('user_id'));
          if(!empty($fromdate) && !empty($todate)){
             $this->db->where($datbetween);
         }
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

           $button .='  <a href="'.$base_url.'Cpurchase/trucking_details_data/'.$record->trucking_id.'" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="left" title="'.display('purchase_details').'"><i class="fa fa-window-restore" aria-hidden="true"></i></a>';
      if($this->permission1->method('manage_purchase','update')->access()){
         $button .=' <a href="'.$base_url.'Cpurchase/trucking_update_form/'.$record->trucking_id.'" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="'. display('update').'"><i class="fa fa-pencil" aria-hidden="true"></i></a> ';
     }

     

         $purchase_ids ='<a href="'.$base_url.'Cpurchase/trucking_update_form/'.$record->trucking_id.'">'.$record->trucking_id.'</a>';
               
               $data[] = array( 
                'sl'               =>$sl,
                'invoice_no'        =>$record->invoice_no,
                'trucking_id'      =>$purchase_ids,
                'customer_name'    =>$record->customer_name,
                'container_pickup_date' => $record->container_pickup_date,
                'delivery_date' => $record->delivery_date,
                'invoice_date'    =>$this->occational->dateConvert($record->invoice_date),
                'shipment_company'     =>$record->shipment_company,
                'total' => $record->grand_total_amount,
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
    public function expense_trucking($date=null) {
      
 
 
 
 if($date) {
$split=explode(' to ',$date);
$start =  $split[0];
$end = $split[1];
}
 
 
 
 
 
 
 
$query = '';
     $data = array();

     $records_per_page = 10;
     $start_from = 0;
     $current_page_number = 0;
     if(isset($_POST["rowCount"]))
     {
      $records_per_page = $_POST["rowCount"];
     }
     else
     {
      $records_per_page = 10;
     }
     if(isset($_POST["current"]))
     {
      $current_page_number = $_POST["current"];
     }
     else
     {
      $current_page_number = 1;
     }
     $start_from = ($current_page_number - 1) * $records_per_page;
     $this->db->select('a.*,b.customer_name,c.supplier_name');
     $this->db->from('expense_trucking a');
    $this->db->join('customer_information b', 'b.customer_id = a.bill_to','left');
        $this->db->join('supplier_information c', 'c.supplier_id = a.shipment_company','left');
   $this->db->where('a.create_by',$this->session->userdata('user_id'));

   



     if($date) {
      if(!empty($start) && !empty($end)){
         $this->db->where('a.invoice_date >=',$start);
     $this->db->where('a.invoice_date <=',$end);
      }
 
     }
    
     if(!empty($_POST["searchPhrase"]))
     {
      $query .= 'WHERE (a.invoice_no LIKE "%'.$_POST["searchPhrase"].'%" ';
      $query .= 'OR a.invoice_date LIKE "%'.$_POST["searchPhrase"].'%" ';
      $query .= 'OR a.bill_to LIKE "%'.$_POST["searchPhrase"].'%" ';
      $query .= 'OR b.customer_name LIKE "%'.$_POST["searchPhrase"].'%" ) ';
    
     }
     
     $order_by = '';
     if(isset($_POST["sort"]) && is_array($_POST["sort"]))
     {
      foreach($_POST["sort"] as $key => $value)
      {
       $order_by .= " $key $value, ";
      }
     }
     else
     {
     $query .= 'ORDER BY trucking_id DESC ';
     }
    // if($order_by != '')
   //  {
   //   $query .= ' ORDER BY ' . substr($order_by, 0, -2);
  //   }
     
     if($records_per_page != -1)
     {
      $query .= " LIMIT " . $start_from . ", " . $records_per_page;
     }
    
        $query = $this->db->get();
   //    echo $this->db->last_query();
    // $result = $this->db->query($query); 
    $result = $query->result_array();
    foreach($result as $row)
 {
     $data[] = $row;
 }
   
     
     
     $this->db->select('*');
  
     $this->db->from('expense_trucking');
     $query1 = $this->db->get();
     $result1 = $query1->result_array();
   
     $total_records = $query1->num_rows();
     $output = array(
  
      'rows'   => $data
     );
   return $output;
//  echo json_encode($output);

 }
        public function ocean_import($date=null) {
            
            
            
//         if($date) {
// $split = array_map(
//  function($value) {
//      return implode(' ', $value);
//  },
//  array_chunk(explode('-', $date), 3)
// );


//      $start = str_replace(' ', '-', $split[0]);
//      $end = str_replace(' ', '-', $split[1]);
//      $start = rtrim($start, "-");
//      $end= preg_replace('/' . '-' . '/', '', $end, 1);
// }


if($date) {
$split=explode(' to ',$date);
$start =  $split[0];
$end = $split[1];
}




$query = '';
     $data = array();

     $records_per_page = 10;
     $start_from = 0;
     $current_page_number = 0;
     if(isset($_POST["rowCount"]))
     {
      $records_per_page = $_POST["rowCount"];
     }
     else
     {
      $records_per_page = 10;
     }
     if(isset($_POST["current"]))
     {
      $current_page_number = $_POST["current"];
     }
     else
     {
      $current_page_number = 1;
     }
     $start_from = ($current_page_number - 1) * $records_per_page;
     $this->db->select('a.*,b.supplier_name');
     $this->db->from('ocean_import_tracking a');
     $this->db->join('supplier_information b', 'b.supplier_id = a.supplier_id','left');
     $this->db->where('a.create_by',$this->session->userdata('user_id'));



     if($date) {
      if(!empty($start) && !empty($end)){
         $this->db->where('a.invoice_date >=',$start);
     $this->db->where('a.invoice_date <=',$end);
      }
 
     }
    
     if(!empty($_POST["searchPhrase"]))
     {
      $query .= 'WHERE (a.booking_no LIKE "%'.$_POST["searchPhrase"].'%" ';
      $query .= 'OR a.container_no LIKE "%'.$_POST["searchPhrase"].'%" ';
      $query .= 'OR a.seal_no LIKE "%'.$_POST["searchPhrase"].'%" ';
      $query .= 'OR b.supplier_name LIKE "%'.$_POST["searchPhrase"].'%" ) ';
    
     }
     
     $order_by = '';
     if(isset($_POST["sort"]) && is_array($_POST["sort"]))
     {
      foreach($_POST["sort"] as $key => $value)
      {
       $order_by .= " $key $value, ";
      }
     }
     else
     {
     $query .= 'ORDER BY ocean_import_tracking_id DESC ';
     }
    // if($order_by != '')
   //  {
   //   $query .= ' ORDER BY ' . substr($order_by, 0, -2);
  //   }
     
     if($records_per_page != -1)
     {
      $query .= " LIMIT " . $start_from . ", " . $records_per_page;
     }
    
        $query = $this->db->get();
   //    echo $this->db->last_query();
    // $result = $this->db->query($query); 
    $result = $query->result_array();
    foreach($result as $row)
 {
     $data[] = $row;
 }
   
     
     
     $this->db->select('*');
  
     $this->db->from('ocean_import_tracking');
     $query1 = $this->db->get();
     $result1 = $query1->result_array();
   
     $total_records = $query1->num_rows();
     $output = array(
  
      'rows'   => $data
     );
   return $output;
//  echo json_encode($output);

 }
    public function packing_list($date=null) {
        if($date) {
$split = array_map(
 function($value) {
     return implode(' ', $value);
 },
 array_chunk(explode('-', $date), 3)
);


     $start = str_replace(' ', '-', $split[0]);
     $end = str_replace(' ', '-', $split[1]);
     $start = rtrim($start, "-");
     $end= preg_replace('/' . '-' . '/', '', $end, 1);
}
$query = '';
     $data = array();

     $records_per_page = 10;
     $start_from = 0;
     $current_page_number = 0;
     if(isset($_POST["rowCount"]))
     {
      $records_per_page = $_POST["rowCount"];
     }
     else
     {
      $records_per_page = 10;
     }
     if(isset($_POST["current"]))
     {
      $current_page_number = $_POST["current"];
     }
     else
     {
      $current_page_number = 1;
     }
     $start_from = ($current_page_number - 1) * $records_per_page;

     $this->db->select('*');
     $this->db->from('expense_packing_list');
    $this->db->where('create_by',$this->session->userdata('user_id'));

     if($date) {
      if(!empty($start) && !empty($end)){
         $this->db->where('invoice_date >=',$start);
     $this->db->where('invoice_date <=',$end);
      }
 
     }
    
     if(!empty($_POST["searchPhrase"]))
     {
      $query .= 'WHERE (a.invoice_no LIKE "%'.$_POST["searchPhrase"].'%" ';
      $query .= 'OR invoice_date LIKE "%'.$_POST["searchPhrase"].'%" ';
      $query .= 'OR expense_packing_id LIKE "%'.$_POST["searchPhrase"].'%" ';
      $query .= 'OR grand_total_amount LIKE "%'.$_POST["searchPhrase"].'%" ) ';
    
     }
     
     $order_by = '';
     if(isset($_POST["sort"]) && is_array($_POST["sort"]))
     {
      foreach($_POST["sort"] as $key => $value)
      {
       $order_by .= " $key $value, ";
      }
     }
     else
     {
     $query .= 'ORDER BY expense_packing_id DESC ';
     }
    // if($order_by != '')
   //  {
   //   $query .= ' ORDER BY ' . substr($order_by, 0, -2);
  //   }
     
     if($records_per_page != -1)
     {
      $query .= " LIMIT " . $start_from . ", " . $records_per_page;
     }
    
        $query = $this->db->get();
   //    echo $this->db->last_query();
    // $result = $this->db->query($query); 
    $result = $query->result_array();
    foreach($result as $row)
 {
     $data[] = $row;
 }
   
     
     
     $this->db->select('*');
  
     $this->db->from('expense_packing_list');
     $query1 = $this->db->get();
     $result1 = $query1->result_array();
   
     $total_records = $query1->num_rows();
     $output = array(
  
      'rows'   => $data
     );
   return $output;
//  echo json_encode($output);

 }
 
 
 
   
      public function newexpense($date=null) {
        if($date) {
$split = array_map(
 function($value) {
     return implode(' ', $value);
 },
 array_chunk(explode('-', $date), 3)
);  


     $start = str_replace(' ', '-', $split[0]);
     $end = str_replace(' ', '-', $split[1]);
     $start = rtrim($start, "-");
     $end= preg_replace('/' . '-' . '/', '', $end, 1);
}
$query = '';
     $data = array();

     $records_per_page = 10;
     $start_from = 0;
     $current_page_number = 0;
     if(isset($_POST["rowCount"]))
     {
      $records_per_page = $_POST["rowCount"];
     }
     else
     {
      $records_per_page = 10;
     }
     if(isset($_POST["current"]))
     {
      $current_page_number = $_POST["current"];
     }
     else
     {
      $current_page_number = 1;
     }
     $start_from = ($current_page_number - 1) * $records_per_page;
     $usertype = $this->session->userdata('user_type');
     $this->db->select('a.*,b.*');
     $this->db->from('product_purchase a');
    $this->db->join('supplier_information b', 'b.supplier_id = a.supplier_id');

     $this->db->where('a.create_by',$this->session->userdata('user_id'));


     if($date) {
      if(!empty($start) && !empty($end)){
         $this->db->where('a.purchase_date >=',$start);
     $this->db->where('a.purchase_date <=',$end);
      }
 
     }
    
     if(!empty($_POST["searchPhrase"]))
     {
      $query .= 'WHERE (a.chalan_no LIKE "%'.$_POST["searchPhrase"].'%" ';
      $query .= 'OR a.purchase_date LIKE "%'.$_POST["searchPhrase"].'%" ';
      $query .= 'OR b.supplier_name LIKE "%'.$_POST["searchPhrase"].'%" ';
      $query .= 'OR a.grand_total_amount LIKE "%'.$_POST["searchPhrase"].'%" ) ';
    
     }
     
     $order_by = '';
     if(isset($_POST["sort"]) && is_array($_POST["sort"]))
     {
      foreach($_POST["sort"] as $key => $value)
      {
       $order_by .= " $key $value, ";
      }
     }
     else
     {
     $query .= 'ORDER BY a.purchase_id DESC ';
     }
 
     
     if($records_per_page != -1)
     {
      $query .= " LIMIT " . $start_from . ", " . $records_per_page;
     }
    
        $query = $this->db->get();
   // echo $this->db->last_query();
    $result = $query->result_array();
    foreach($result as $row)
 {
     $data[] = $row;
 }
   
     
     
     $this->db->select('*');
  
     $this->db->from('product_purchase');
     $query1 = $this->db->get();
     $result1 = $query1->result_array();
 //  echo $this->db->last_query();
     $total_records = $query1->num_rows();
     $output = array(
  
      'rows'   => $data
     );
   return $output;

 }

   
   
   
   
   

 public function purchase_order($date=null) {
 
 
//     if($date) {
// $split = array_map(
// function($value) {
//  return implode(' ', $value);
// },
// array_chunk(explode('-', $date), 3)
// );


//  $start = str_replace(' ', '-', $split[0]);
//  $end = str_replace(' ', '-', $split[1]);
//  $start = rtrim($start, "-");
//  $end= preg_replace('/' . '-' . '/', '', $end, 1);
// }

if($date) {
$split=explode(' to ',$date);
$start =  $split[0];
$end = $split[1];
}



$query = '';
 $data = array();

 $records_per_page = 10;
 $start_from = 0;
 $current_page_number = 0;
 if(isset($_POST["rowCount"]))
 {
  $records_per_page = $_POST["rowCount"];
 }
 else
 {
  $records_per_page = 10;
 }
 if(isset($_POST["current"]))
 {
  $current_page_number = $_POST["current"];
 }
 else
 {
  $current_page_number = 1;
 }
 $start_from = ($current_page_number - 1) * $records_per_page;
 $this->db->select('po.*,po.created_by AS create');
 $this->db->from('purchase_order po');
 //$this->db->join('supplier_information si', 'po.supplier_id = si.supplier_id'); 
 $this->db->where('po.create_by',$this->session->userdata('user_id'));



 if($date) {
  if(!empty($start) && !empty($end)){
     $this->db->where('po.purchase_date >=',$start);
 $this->db->where('po.purchase_date <=',$end);
  }

 }

 if(!empty($_POST["searchPhrase"]))
 {
  $query .= 'WHERE (po.chalan_no LIKE "%'.$_POST["searchPhrase"].'%" ';
  $query .= 'OR po.purchase_date LIKE "%'.$_POST["searchPhrase"].'%" ';
  $query .= 'OR si.supplier_name LIKE "%'.$_POST["searchPhrase"].'%" ';
  $query .= 'OR a.grand_total_amount LIKE "%'.$_POST["searchPhrase"].'%" ) ';

 }
 
 $order_by = '';
 if(isset($_POST["sort"]) && is_array($_POST["sort"]))
 {
  foreach($_POST["sort"] as $key => $value)
  {
   $order_by .= " $key $value, ";
  }
 }
 else
 {
 $query .= 'ORDER BY po.purchase_order_id DESC ';
 }
// if($order_by != '')
//  {
//   $query .= ' ORDER BY ' . substr($order_by, 0, -2);
//   }
 
 if($records_per_page != -1)
 {
  $query .= " LIMIT " . $start_from . ", " . $records_per_page;
 }

    $query = $this->db->get();
 //  echo $this->db->last_query();
//$this->db->query($query); 
$result = $query->result_array();
foreach($result as $row)
{
 $data[] = $row;
}

 
 
 $this->db->select('*');

 $this->db->from('purchase_order');
 $query1 = $this->db->get();
 $result1 = $query1->result_array();

 $total_records = $query1->num_rows();
 $output = array(

  'rows'   => $data
 );
return $output;
//  echo json_encode($output);

}
       public function getPackingList($postData=null){
         $this->load->library('occational');
         $this->load->model('Web_settings');
         $currency_details = $this->Web_settings->retrieve_setting_editdata();
         $response = array();
         $fromdate = $this->input->post('fromdate');
         $todate   = $this->input->post('todate');
         if(!empty($fromdate)){
            $datbetween = "(a.est_ship_date BETWEEN '$fromdate' AND '$todate')";
         }else{
            $datbetween = "";
         }
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
            $searchQuery = " (b.supplier_name like '%".$searchValue."%' or a.chalan_no like '%".$searchValue."%' or a.purchase_date like'%".$searchValue."%')";
         }

        ## Total number of records without filtering
        $this->db->select('count(*) as allcount');
        $this->db->from('expense_packing_list');
     //   $this->db->join('customer_information b', 'b.customer_id = a.bill_to','left');
       // $this->db->where('a.create_by',$this->session->userdata('user_id'));
        if(!empty($fromdate) && !empty($todate)){
             $this->db->where($datbetween);
         }
          if($searchValue != '')
          $this->db->where($searchQuery);
          
         $records = $this->db->get()->result();
         $totalRecords = $records[0]->allcount;

         ## Total number of record with filtering
         $this->db->select('count(*) as allcount');
        $this->db->from('expense_packing_list');
        // $this->db->join('customer_information b', 'b.customer_id = a.bill_to','left');
        $this->db->where('create_by',$this->session->userdata('user_id'));
         if(!empty($fromdate) && !empty($todate)){
             $this->db->where($datbetween);
         }
         if($searchValue != '')
            $this->db->where($searchQuery);
          
         $records = $this->db->get()->result();
         $totalRecordwithFilter = $records[0]->allcount;

         ## Fetch records
        $this->db->select('*');
        $this->db->from('expense_packing_list');
         // $this->db->join('customer_information b', 'b.customer_id = a.bill_to','left');
        $this->db->where('create_by',$this->session->userdata('user_id'));
          if(!empty($fromdate) && !empty($todate)){
             $this->db->where($datbetween);
         }
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
           
          $button .='  <a href="'.$base_url.'Cpurchase/packing_list_details_data/'.$record->expense_packing_id.'" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="left" title="Packing Download"><i class="fa fa-window-restore" aria-hidden="true"></i></a>';

           $button .='  <a href="'.$base_url.'Cpurchase/packing_list_details_data/'.$record->expense_packing_id.'" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="left" title="Packing List Detail"><i class="fa fa-window-restore" aria-hidden="true"></i></a>';
              if($this->permission1->method('manage_purchase','update')->access()){
                 $button .=' <a href="'.$base_url.'Cpurchase/packing_list_update_form/'.$record->expense_packing_id.'" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="'. display('update').'"><i class="fa fa-pencil" aria-hidden="true"></i></a> ';
             }

     

         $purchase_ids ='<a href="'.$base_url.'Cpurchase/packing_details_data/'.$record->expense_packing_id.'">'.$record->expense_packing_id.'</a>';
               
               $data[] = array(
                'sl'               =>$sl,
                'invoice_no'        =>$record->invoice_no,
                'expense_packing_id'  =>$purchase_ids,
                'gross_weight' => $record->gross_weight,
                'container_no' => $record->container_no,
                'invoice_date'    =>$record->invoice_date,
                // 'invoice_date'    =>$this->occational->dateConvert($record->invoice_date),
                'total' => $record->grand_total_amount,
                'thickness' => $record->thickness,
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

public function supplier_info($supplier){
     $this->db->select('*');
        $this->db->from('supplier_information');
      
    $this->db->where('supplier_id',$supplier);
        $this->db->where('created_by',$this->session->userdata('user_id'));
 $query = $this->db->get();

   //  echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }


   
}
    //purchase List
    public function purchase_list($per_page, $page) {
        $this->db->select('a.*,b.supplier_name');
        $this->db->from('product_purchase a');
        $this->db->join('supplier_information b', 'b.supplier_id = a.supplier_id');
        $this->db->where('a.create_by',$this->session->userdata('user_id'));
        $this->db->order_by('a.purchase_date', 'desc');
        $this->db->order_by('purchase_id', 'desc');
        $this->db->limit($per_page, $page);
        $query = $this->db->get();

        $last_query = $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    // purchase search by suppplier
    public function purchase_search($supplier_id, $per_page, $page) {
        $this->db->select('a.*,b.supplier_name');
        $this->db->from('product_purchase a');
        $this->db->join('supplier_information b', 'b.supplier_id = a.supplier_id');
        $this->db->where('a.create_by',$this->session->userdata('user_id'));
        $this->db->where('a.supplier_id', $supplier_id);
        $this->db->order_by('a.purchase_date', 'desc');
        $this->db->limit($per_page, $page);
        $query = $this->db->get();

        $last_query = $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }




    // purchase search count
    public function count_purchase_seach($supplier_id) {
        $this->db->select('a.*,b.supplier_name');
        $this->db->from('product_purchase a');
        $this->db->join('supplier_information b', 'b.supplier_id = a.supplier_id');
        $this->db->where('a.create_by',$this->session->userdata('user_id'));
        $this->db->where('a.supplier_id', $supplier_id);
        $query = $this->db->get();

        $last_query = $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        }
        return false;
    }

//purchase info by invoice id
    public function purchase_list_invoice_id($invoice_no) {
        $this->db->select('a.*,b.supplier_name');
        $this->db->from('product_purchase a');
        $this->db->join('supplier_information b', 'b.supplier_id = a.supplier_id');
        $this->db->where('a.create_by',$this->session->userdata('user_id'));
        $this->db->where('a.chalan_no', $invoice_no);
        $this->db->order_by('a.purchase_date', 'desc');
        $this->db->order_by('purchase_id', 'desc');
        $query = $this->db->get();

        $last_query = $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }
  //  $this->db->select('*')->from('supplier_information')->where('supplier_id',$supplier_id)->get()->row();
    //Select All Supplier List
    public function serpro_info($serviceprovider_id){
  $this->db->select('*');
     $this->db->from('service');
     $this->db->where('serviceprovider_id',$serviceprovider_id);
     $query = $this->db->get();
  // echo $this->db->last_query();
     if ($query->num_rows() > 0) {
         return $query->result_array();
     }
}
public function service_provider_details($serviceprovider_id) {
  $this->db->select('a.*,b.*');
  $this->db->from('service a');
  $this->db->join('service_provider_detail b', 'b.serviceprovider_id = a.serviceprovider_id');
  $this->db->where('a.create_by',$this->session->userdata('user_id'));
  $this->db->where('a.serviceprovider_id', $serviceprovider_id);
  $query = $this->db->get();
// echo $this->db->last_query();
  if ($query->num_rows() > 0) {
      return $query->result_array();
  }
}
public function ret_company_info() {
      $this->db->select('*');
      $this->db->from('company_information');
      $this->db->limit('1');
      $query = $this->db->get();
      if ($query->num_rows() > 0) {
          return $query->result_array();
      }
      return false;
  }
    public function select_all_supplier() {
        $query = $this->db->select('*')
                ->from('supplier_information')
                ->where('created_by',$this->session->userdata('user_id'))
                ->where('status', '1')
                ->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }
    public function select_supplier($value) {
        $query = $this->db->select('*')
                ->from('supplier_information')
                ->where('created_by',$this->session->userdata('user_id'))
                ->where('supplier_id',$value)
                ->where('status', '1')
                ->get();
          //   echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
      
    }
    public function select_supplierbyname($value) {
        $query = $this->db->select('*')
                ->from('supplier_information')
                ->where('created_by',$this->session->userdata('user_id'))
                ->where('supplier_name',$value)
                ->where('status', '1')
                ->get();
             
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
      
    }
    //purchase Search  List
    public function purchase_by_search($supplier_id) {
        $this->db->select('a.*,b.supplier_name');
        $this->db->from('product_purchase a');
        $this->db->join('supplier_information b', 'b.supplier_id = a.supplier_id');
        $this->db->where('a.create_by',$this->session->userdata('user_id'));
        $this->db->where('b.supplier_id', $supplier_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    //Count purchase

//  public function purchase_entry() {
//         $purchase_id = date('YmdHis');
//         $chalan_no =$this->input->post('invoice_no',TRUE);
//         $p_id = $this->input->post('product_id',TRUE);
//         $supplier_id = $this->input->post('supplier_id',TRUE);
//         $supinfo =$this->db->select('*')->from('supplier_information')->where('supplier_id',$supplier_id)->get()->row();
//         $sup_head = $supinfo->supplier_id.'-'.$supinfo->supplier_name;
//         $sup_coa = $this->db->select('*')->from('acc_coa')->where('HeadName',$sup_head)->get()->row();
//      //   echo $this->db->last_query();
//         $receive_by=$this->session->userdata('user_id');
//         $receive_date=date('Y-m-d');
//         $createdate=date('Y-m-d H:i:s');
//         $paid_amount = $this->input->post('paid_amount',TRUE);
//         $due_amount = $this->input->post('due_amount',TRUE);
//         $discount = $this->input->post('discount',TRUE);
//           $bank_id = $this->input->post('bank_id',TRUE);
//         if(!empty($bank_id)){
//          $bankname = $this->db->select('bank_name')->from('bank_add')->where('bank_id',$bank_id)->get()->row()->bank_name;
//          $bankcoaid = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName',$bankname)->get()->row()->HeadCode;
//       }else{
//           $bankcoaid = '';
//       }
//       if(!empty($_FILES['attachments']['name'])){
//         $config['upload_path'] = 'my-assets/productnewimg/';
//         $config['allowed_types'] = 'jpg|jpeg|png|gif';
//         $config['file_name'] = $_FILES['attachments']['name'];
//         //Load upload library and initialize here configuration
//         $this->load->library('upload',$config);
//         $this->upload->initialize($config);
//         if($this->upload->do_upload('attachments')){
//             $uploadData = $this->upload->data();
//             $profile_img = $uploadData['file_name'];
//         }else{
//             $profile_img = '';
//         }
//     }else{
//         $profile_img = '';
//     }
//         //supplier & product id relation ship checker.
//         for ($i = 0, $n = count($p_id); $i < $n; $i++) {
//             $product_id = $p_id[$i];
//             $value = $this->product_supplier_check($product_id, $supplier_id);
//             if ($value == 0) {
//                 $this->session->set_flashdata('message', display('product_and_supplier_did_not_match'));
//             }
//         }
//         $msg='';
//         if($this->input->post('message_invoice',TRUE)){
// $msg=$this->input->post('message_invoice',TRUE);
//         }else{
//           $msg='Product Purchased on '.$this->input->post('bill_date',TRUE);
//         }
//       $data = array(
//              'purchase_id'        => $purchase_id,
//              'create_by'       =>  $this->session->userdata('user_id'),
//              'chalan_no'          => $this->input->post('invoice_no',TRUE),
//              'supplier_id'        => $this->input->post('supplier_id',TRUE),
//              'total_amt' => $this->input->post('overall_total',TRUE),
//              'grand_total_amount' => $this->input->post('gtotal',TRUE),
//              'g_weight'   =>$this->input->post('hidden_weight',TRUE),
//              'total_discount'     => $this->input->post('discount',TRUE),
//              'purchase_date'      => $this->input->post('bill_date',TRUE),
//              'purchase_details'   => $this->input->post('purchase_details',TRUE),
//              'payment_due_date'   => $this->input->post('payment_due_date',TRUE),
//              'remarks'            => $this->input->post('remark',TRUE),
//              'message_invoice'    => $msg,
//              'total_tax'  =>  $this->input->post('tax_details',TRUE),
//              'packing_id' => $this->input->post('packing_id',TRUE),
//              'etd'   => $this->input->post('etd',TRUE),
//              'eta'   => $this->input->post('eta',TRUE),
//              'gtotal_preferred_currency'  => $this->input->post('vendor_gtotal',TRUE),
//              'shipping_line'   => $this->input->post('shipping_line',TRUE),
//              'container_no'   => $this->input->post('container_no',TRUE),
//              'bl_number'   => $this->input->post('bl_number',TRUE),
//              'isf_filling'   => $this->input->post('isf_no',TRUE),
//              'paid_amount'    => $this->input->post('amount_paid',TRUE),
//              'balance'    => $this->input->post('balance',TRUE),
//              'payment_id'    => $this->input->post('payment_id',TRUE),
//              'status'             => 1,
//              'bank_id'            =>  $this->input->post('bank_id',TRUE),
//              'packing_id'            =>  $this->input->post('packing_id',TRUE),
//              'total_amt'  => $this->input->post('Over_all_Total',TRUE),
//              'payment_type'       =>  $this->input->post('paytype_drop',TRUE),
//              'total_gross' =>  $this->input->post('total_gross',TRUE),
//              'total_net' =>  $this->input->post('total_net',TRUE),
//              'total_weight' => $this->input->post('total_weight',TRUE),
//              'payment_terms'       =>  $this->input->post('payment_terms',TRUE),
//              'Port_of_discharge'       =>  $this->input->post('Port_of_discharge',TRUE),
//              'amount_pay_usd'=>$this->input->post('paid_convert'),
//              'due_amount_usd'=>$this->input->post('bal_convert'),
//              'image'              =>  $profile_img,
//         );
//         $purchase_id_1 = $this->db->where('chalan_no',$this->input->post('invoice_no',TRUE));
//         $q=$this->db->get('product_purchase');
//         $row = $q->row_array();
//     if(!empty($row['purchase_id'])){
//         $this->session->set_userdata("purchase_1",$row['purchase_id']);
//   $this->db->where('purchase_id', $this->session->userdata("purchase_1"));
//   $this->db->delete('product_purchase');
   
//         $this->db->insert('product_purchase', $data);//echo $this->db->last_query();
     
//   }
//     else{
//     $this->db->insert('product_purchase', $data);//echo $this->db->last_query();
   
//     }
//     $purchase_id_2 = $this->db->select('purchase_id')->from('product_purchase')->where('chalan_no',$this->input->post('invoice_no',TRUE))->get()->row()->purchase_id;
//     $this->session->set_userdata("purchase_2",$purchase_id_2);
//     $purchasecoatran = array(
//           'VNo'            =>  $purchase_id,
//           'Vtype'          =>  'Purchase',
//           'VDate'          =>  $this->input->post('bill_date',TRUE),
//           'COAID'          =>  $sup_coa->HeadCode,
//           'Narration'      =>  'Supplier .'.$supinfo->supplier_name,
//           'Debit'          =>  0,
//           'Credit'         =>  $this->input->post('grand_total_price',TRUE),
//           'IsPosted'       =>  1,
//           'CreateBy'       =>  $receive_by,
//           'CreateDate'     =>  $receive_date,
//           'IsAppove'       =>  1
//         );
//           ///Inventory Debit
//       $coscr = array(
//       'VNo'            =>  $purchase_id,
//       'Vtype'          =>  'Purchase',
//       'VDate'          =>  $this->input->post('bill_date',TRUE),
//       'COAID'          =>  10107,
//       'Narration'      =>  'Inventory Debit For Supplier '.$supinfo->supplier_name,
//       'Debit'          =>  $this->input->post('grand_total_price',TRUE),
//       'Credit'         =>  0,//purchase price asbe
//       'IsPosted'       => 1,
//       'CreateBy'       => $receive_by,
//       'CreateDate'     => $createdate,
//       'IsAppove'       => 1
//     );
//       // Expense for company
//          $expense = array(
//       'VNo'            => $purchase_id,
//       'Vtype'          => 'Purchase',
//       'VDate'          => $this->input->post('bill_date',TRUE),
//       'COAID'          => 402,
//       'Narration'      => 'Company Credit For  '.$supinfo->supplier_name,
//       'Debit'          => $this->input->post('grand_total_price',TRUE),
//       'Credit'         => 0,//purchase price asbe
//       'IsPosted'       => 1,
//       'CreateBy'       => $receive_by,
//       'CreateDate'     => $createdate,
//       'IsAppove'       => 1
//     );
//              $cashinhand = array(
//       'VNo'            =>  $purchase_id,
//       'Vtype'          =>  'Purchase',
//       'VDate'          =>  $this->input->post('bill_date',TRUE),
//       'COAID'          =>  1020101,
//       'Narration'      =>  'Cash in Hand For Supplier '.$supinfo->supplier_name,
//       'Debit'          =>  0,
//       'Credit'         =>  $paid_amount,
//       'IsPosted'       =>  1,
//       'CreateBy'       =>  $receive_by,
//       'CreateDate'     =>  $createdate,
//       'IsAppove'       =>  1
//     );
//      $supplierdebit = array(
//           'VNo'            =>  $purchase_id,
//           'Vtype'          =>  'Purchase',
//           'VDate'          =>  $this->input->post('bill_date',TRUE),
//           'COAID'          =>  $sup_coa->HeadCode,
//           'Narration'      =>  'Supplier .'.$supinfo->supplier_name,
//           'Debit'          =>  $paid_amount,
//           'Credit'         =>  0,
//           'IsPosted'       =>  1,
//           'CreateBy'       =>  $receive_by,
//           'CreateDate'     =>  $receive_date,
//           'IsAppove'       =>  1
//         );
//               // bank ledger
//  $bankc = array(
//       'VNo'            =>  $purchase_id,
//       'Vtype'          =>  'Purchase',
//       'VDate'          =>  $this->input->post('bill_date',TRUE),
//       'COAID'          =>  $bankcoaid,
//       'Narration'      =>  'Paid amount for Supplier  '.$supinfo->supplier_name,
//       'Debit'          =>  0,
//       'Credit'         =>  $paid_amount,
//       'IsPosted'       =>  1,
//       'CreateBy'       =>  $receive_by,
//       'CreateDate'     =>  $createdate,
//       'IsAppove'       =>  1
//     );
// // Bank summary for credit
//       //new end
//         $this->db->insert('acc_transaction',$coscr);
//         $this->db->insert('acc_transaction',$purchasecoatran);
//         $this->db->insert('acc_transaction',$expense);
//         if($this->input->post('paytype_drop',TRUE) == 'CASH'){
//           if(!empty($paid_amount)){
//         $this->db->insert('acc_transaction',$cashinhand);
//         $this->db->insert('acc_transaction',$supplierdebit);
//         }
//         }else {
//           if(!empty($paid_amount)){
//         $this->db->insert('acc_transaction',$bankc);
//         $this->db->insert('acc_transaction',$supplierdebit);
//       }
//     }
//           $prodt                = $this->input->post('prodt',TRUE);
//           $product_id =$this->input->post('product_id',TRUE);
//           $desc =$this->input->post('description',TRUE);
//           $thickness=$this->input->post('thickness',TRUE);
//           $supplier_b_no=$this->input->post('supplier_block_no',TRUE);
//           $supplier_slab_no=$this->input->post('supplier_slab_no',TRUE);
//           $gross_width=$this->input->post('gross_width',TRUE);
//           $gross_height=$this->input->post('gross_height',TRUE);
//           $gross_sq_ft=$this->input->post('gross_sq_ft',TRUE);
//           $bundle_no=$this->input->post('bundle_no',TRUE);
//           $net_width=$this->input->post('net_width',TRUE);
//           $net_height=$this->input->post('net_height',TRUE);
//           $net_sq_ft=$this->input->post('net_sq_ft',TRUE);
//             $cost_sq_ft=$this->input->post('cost_sq_ft',TRUE);
//             $cost_sq_slab=$this->input->post('cost_sq_slab',TRUE);
//             $sales_amt_sq_ft=$this->input->post('sales_amt_sq_ft',TRUE);
//             $sales_slab_amt=$this->input->post('sales_slab_amt',TRUE);
//             $weight=$this->input->post('weight',TRUE);
//             $origin=$this->input->post('origin',TRUE);
//             $tableid=$this->input->post('tableid',TRUE);
//             $total_amt=$this->input->post('total_amt',TRUE);
//             $total=$this->input->post('total',TRUE);
//             $overall_gross=$this->input->post('overall_gross',TRUE);
//             $overall_net=$this->input->post('overall_net',TRUE);
//             $description =$this->input->post('description',TRUE);

//             $slab_no =$this->input->post('slab_no',TRUE);


//             $this->db->where('purchase_id', $this->session->userdata("purchase_1"));
//             $this->db->delete('product_purchase_details');
      
//         for ($i = 0, $n = count($p_id); $i < $n; $i++) {
//           $data1 = array(
//                 'purchase_detail_id' => $this->generator(15),
//                 'purchase_id'        => $this->session->userdata("purchase_2"),
//                 'product_id'         => $product_id[$i],
//                 'thickness'             => $thickness[$i],
//                 'supplier_block_no'  =>  $supplier_b_no[$i],
//                 'supplier_slab_no'  => $supplier_slab_no[$i],
//                 'gross_width'  => $gross_width[$i],
//                 'gross_height'  => $gross_height[$i],
//                 'gross_sq_ft_1'  =>$gross_sq_ft[$i],
//                 'bundle_no'  =>$bundle_no[$i],
//                 'total'  => $total_amt[$i],
//                 'tableid'   => $tableid[$i],
//                 'product_name'   => $prodt[$i],
//                 'net_width'  => $net_width[$i],
//                 'net_height'  => $net_height[$i],
//                 'net_sq_ft'  => $net_sq_ft[$i],
//                 'cost_sq_ft'  => $cost_sq_ft[$i],
//                 'cost_sq_slab'  =>   $cost_sq_slab[$i],
//                 'sales_amt_sq_ft ' => $sales_amt_sq_ft[$i],
//                 'sales_slab_amt'   => $sales_slab_amt[$i],
//                 'weight'  =>   $weight[$i],
//                 'origin'  =>$origin[$i],
//                 'slab_no'  =>$slab_no[$i],
//                 'description'       => $description[$i],
//                 'create_by'          =>  $this->session->userdata('user_id'),
//                 'status'             => 1
//             );
//           $this->db->insert('product_purchase_details', $data1);
      


//             $expense_get_info = array(
//                 'create_by'           => $this->session->userdata('user_id'),                       
//                 'product_id'          =>$product_id[$i],
//                 'bundle_no'  =>$bundle_no[$i],
//                 'slab_no'  => $slab_no[$i]              
//              );

//             $this->db->where($expense_get_info);
//             $query1 = $this->db->get('product_details');
//             // echo $this->db->last_query();
//             // $num_rows = mysqli_num_rows($query);
//             // print_r($num_rows); die();
//             // echo     $query->num_rows();


//             if ($query1->num_rows() <= 0) {
//                 $expense_get_info2 = array(
//                     'product_id'         => $product_id[$i],
//                     'thickness'             => $thickness[$i],
//                     'supplier_block_no'  =>  $supplier_b_no[$i],
//                     'supplier_slab_no'  => $supplier_slab_no[$i],
//                     'g_width'  => $gross_width[$i],
//                     'g_height'  => $gross_height[$i],
//                     'gross_sqft'  =>$gross_sq_ft[$i],
//                     'bundle_no'  =>$bundle_no[$i],
//                     'total_amt'  => $total_amt[$i],
//                     'slab_no'  =>$slab_no[$i],
//                     'n_width'  => $net_width[$i],
//                     'n_height'  => $net_height[$i],
//                     'net_sqft'  => $net_sq_ft[$i],
//                     'cost_sqft'  => $cost_sq_ft[$i],
//                     'cost_slab'  =>   $cost_sq_slab[$i],
//                     'sales_price_sqft ' => $sales_amt_sq_ft[$i],
//                     'sales_slab_price'   => $sales_slab_amt[$i],
//                     'weight'  =>   $weight[$i],
//                     'origin'  =>$origin[$i],
//                     'description_table'       => $description[$i],
//                     'create_by'          =>  $this->session->userdata('user_id'),
//                     'status'             => 1
//                  );
//                 // Check if the record already exists
//                 // $this->db->where($expense_get_info2);
//                 // $query2 = $this->db->get('product_purchase_details');
//                 $this->db->insert('product_details', $expense_get_info2);
//                 // echo $this->db->last_query();
//                 //   print_r($expense_get_info2);
//                 // echo "<br/>";

//                 } 

                    
//                 }
//                 // for ($i = 0, $n = count($p_id); $i < $n; $i++) {
//                 //     $data1 = array(
//                 //          'purchase_detail_id' => $this->generator(15),
//                 //          'purchase_id'        => $this->session->userdata("purchase_2"),
//                 //          'product_id'         => $product_id[$i],
//                 //          'thickness'             => $thickness[$i],
//                 //          'supplier_block_no'  =>  $supplier_b_no[$i],
//                 //          'supplier_slab_no'  => $supplier_slab_no[$i],
//                 //          'gross_width'  => $gross_width[$i],
//                 //          'gross_height'  => $gross_height[$i],
//                 //          'gross_sq_ft_1'  =>$gross_sq_ft[$i],
//                 //          'bundle_no'  =>$bundle_no[$i],
//                 //          'total'  => $total_amt[$i],
//                 //          'tableid'   => $tableid[$i],
//                 //          'product_name'   => $prodt[$i],
//                 //          'net_width'  => $net_width[$i],
//                 //          'net_height'  => $net_height[$i],
//                 //          'net_sq_ft'  => $net_sq_ft[$i],
//                 //          'cost_sq_ft'  => $cost_sq_ft[$i],
//                 //          'cost_sq_slab'  =>   $cost_sq_slab[$i],
//                 //          'sales_amt_sq_ft ' => $sales_amt_sq_ft[$i],
//                 //          'sales_slab_amt'   => $sales_slab_amt[$i],
//                 //          'weight'  =>   $weight[$i],
//                 //          'origin'  =>$origin[$i],
//                 //          'slab_no'  =>$slab_no[$i],       
//                 //          'description'       => $description[$i],
//                 //          'create_by'          =>  $this->session->userdata('user_id'),
//                 //          'status'             => 1
//                 //      );
//                 //     $this->db->insert('product_purchase_details', $data1);
               
//                 //     }
//                     for ($i = 0, $n = count($p_id); $i < $n; $i++) {
//                      $expense_get_info = array(
//                          'create_by'           => $this->session->userdata('user_id'),                       
//                          'product_id'          =>$product_id[$i],
//                          'bundle_no'  =>$bundle_no[$i],
//                          'slab_no'  => $slab_no[$i]              
//                       );
         
//                      $this->db->where($expense_get_info);
//                      $query1 = $this->db->get('product_details');
//                      // echo $this->db->last_query();
//                      // $num_rows = mysqli_num_rows($query);
//                      // print_r($num_rows); die();
//                      // echo     $query->num_rows();
          
//                 if ($query1->num_rows() > 0) {

//                     $expense_get_info = array(

//                         'product_id'         => $product_id[$i],
//                         'thickness'             => $thickness[$i],
//                         'supplier_block_no'  =>  $supplier_b_no[$i],
//                         'supplier_slab_no'  => $supplier_slab_no[$i],
//                         'g_width'  => $gross_width[$i],
//                         'g_height'  => $gross_height[$i],
//                         // 'gross_sqft'  =>$gross_sq_ft[$i],
//                         'bundle_no'  =>$bundle_no[$i],
//                         // 'total_amt'  => $total_amt[$i],
//                         'slab_no'  =>$slab_no[$i],
//                         'n_width'  => $net_width[$i],
//                         'n_height'  => $net_height[$i],
//                         // 'net_sqft'  => $net_sq_ft[$i],
//                         // 'cost_sqft'  => $cost_sq_ft[$i],
//                         // 'cost_slab'  =>   $cost_sq_slab[$i],
//                         // 'sales_price_sqft ' => $sales_amt_sq_ft[$i],
//                         // 'sales_slab_price'   => $sales_slab_amt[$i],
//                         'weight'  =>   $weight[$i],
//                         'origin'  =>$origin[$i],
//                         'description_table'       => $description[$i],
//                         'create_by'          =>  $this->session->userdata('user_id'),
//                         'status'             => 1
//                      );

//                     $this->db->where($expense_get_info);
//                     $query3 = $this->db->get('product_details');
//                     // echo $this->db->last_query(); 
//                     //   $num_rows1 = mysqli_num_rows($query3);
//                     //   print_r($expense_get_info);
//                     // echo "<br/>";
//                     if($query3->num_rows() <=0){    
//                     $expense_get_info4 = array(

//                         'product_id'         => $product_id[$i],
//                         'thickness'             => $thickness[$i],
//                         'supplier_block_no'  =>  $supplier_b_no[$i],
//                         'supplier_slab_no'  => $supplier_slab_no[$i],
//                         'g_width'  => $gross_width[$i],
//                         'g_height'  => $gross_height[$i],
//                         // 'gross_sqft'  =>$gross_sq_ft[$i],
//                         'bundle_no'  =>$bundle_no[$i],
//                         // 'total_amt'  => $total_amt[$i],
//                         'slab_no'  =>$slab_no[$i],
//                         'n_width'  => $net_width[$i],
//                         'n_height'  => $net_height[$i],
//                         // 'net_sqft'  => $net_sq_ft[$i],
//                         // 'cost_sqft'  => $cost_sq_ft[$i],
//                         // 'cost_slab'  =>   $cost_sq_slab[$i],
//                         // 'sales_price_sqft ' => $sales_amt_sq_ft[$i],
//                         // 'sales_slab_price'   => $sales_slab_amt[$i],
//                         'weight'  =>   $weight[$i],
//                         'origin'  =>$origin[$i],
//                         'description_table'       => $description[$i],
//                         'create_by'          =>  $this->session->userdata('user_id'),
//                         'invoice_id'          => $this->input->post('invoice_no',TRUE),
//                         'status'             => 1,
//                         'expenses'           => 'expenses'
//                      );
//                   $this->db->insert('product_details_history', $expense_get_info4);
//                 //   echo $this->db->last_query(); die();
//                   }




//         }
//     }
//         return $purchase_id."/".$chalan_no;
//     }







 public function purchase_entry() {
   //  print_r("Hello");die();
//      $v=$this->input->post();
//      print_r($v['val']);
//      $params = array();
// print_r(parse_str($v, $params));

//$get = explode('&', $v); // explode with and


//var_dump($need);
   //die();
     $pur_id=$this->input->post('purchase_id',TRUE);
      $purchase_id='';
     if(empty($pur_id)){
          $purchase_id = date('YmdHis');
     }else{
         $purchase_id =  $pur_id;
     }
       
        $chalan_no =$this->input->post('invoice_no',TRUE);
        $p_id = $this->input->post('product_id',TRUE);
        $supplier_id = $this->input->post('supplier_id',TRUE);
        $supinfo =$this->db->select('*')->from('supplier_information')->where('supplier_id',$supplier_id)->get()->row();
        $sup_head = $supinfo->supplier_id.'-'.$supinfo->supplier_name;
        $sup_coa = $this->db->select('*')->from('acc_coa')->where('HeadName',$sup_head)->get()->row();
     //   echo $this->db->last_query();
        $receive_by=$this->session->userdata('user_id');
        $receive_date=date('Y-m-d');
        $createdate=date('Y-m-d H:i:s');
        $paid_amount = $this->input->post('paid_amount',TRUE);
        $due_amount = $this->input->post('due_amount',TRUE);
        $discount = $this->input->post('discount',TRUE);
          $bank_id = $this->input->post('bank_id',TRUE);
        if(!empty($bank_id)){
         $bankname = $this->db->select('bank_name')->from('bank_add')->where('bank_id',$bank_id)->get()->row()->bank_name;
         $bankcoaid = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName',$bankname)->get()->row()->HeadCode;
       }else{
           $bankcoaid = '';
       }
       if(!empty($_FILES['attachments']['name'])){
        $config['upload_path'] = 'my-assets/productnewimg/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['file_name'] = $_FILES['attachments']['name'];
        //Load upload library and initialize here configuration
        $this->load->library('upload',$config);
        $this->upload->initialize($config);
        if($this->upload->do_upload('attachments')){
            $uploadData = $this->upload->data();
            $profile_img = $uploadData['file_name'];
        }else{
            $profile_img = '';
        }
    }else{
        $profile_img = '';
    }
        //supplier & product id relation ship checker.
        for ($i = 0, $n = count($p_id); $i < $n; $i++) {
            $product_id = $p_id[$i];
            $value = $this->product_supplier_check($product_id, $supplier_id);
            if ($value == 0) {
                $this->session->set_flashdata('message', display('product_and_supplier_did_not_match'));
            }
        }
        $msg='';
        if($this->input->post('message_invoice',TRUE)){
$msg=$this->input->post('message_invoice',TRUE);
        }else{
          $msg='Product Purchased on '.$this->input->post('bill_date',TRUE);
        }
       $data = array(
           'purchase_id'        => $purchase_id,
           'create_by'       =>  $this->session->userdata('user_id'),
           'chalan_no'          => $this->input->post('invoice_no',TRUE),
           'supplier_id'        => $this->input->post('supplier_id',TRUE),
           'total_amt' => $this->input->post('overall_total',TRUE),
           'grand_total_amount' => $this->input->post('gtotal',TRUE),
           'g_weight'   =>$this->input->post('hidden_weight',TRUE),
           'total_discount'     => $this->input->post('discount',TRUE),
           'purchase_date'      => $this->input->post('bill_date',TRUE),
           'purchase_details'   => $this->input->post('purchase_details',TRUE),
            'payment_due_date'   => $this->input->post('payment_due_date',TRUE),
           'remarks'            => $this->input->post('remark',TRUE),
           'message_invoice'    => $msg,
            'total_tax'  =>  $this->input->post('tax_details',TRUE),
            'packing_id' => $this->input->post('packing_id',TRUE),
           'etd'   => $this->input->post('etd',TRUE),
           'eta'   => $this->input->post('eta',TRUE),
           'gtotal_preferred_currency'  => $this->input->post('vendor_gtotal',TRUE),
           'shipping_line'   => $this->input->post('shipping_line',TRUE),
            'container_no'   => $this->input->post('container_no',TRUE),
           'bl_number'   => $this->input->post('bl_number',TRUE),
           'isf_filling'   => $this->input->post('isf_no',TRUE),
            'paid_amount'    => $this->input->post('amount_paid',TRUE),
           'balance'    => $this->input->post('balance',TRUE),
            'payment_id'    => $this->input->post('payment_id',TRUE),
            'status'             => 1,
            'bank_id'            =>  $this->input->post('bank_id',TRUE),
            'packing_id'            =>  $this->input->post('packing_id',TRUE),
'total_amt'  => $this->input->post('Over_all_Total',TRUE),
          'payment_type'       =>  $this->input->post('paytype_drop',TRUE),
'total_gross' =>  $this->input->post('total_gross',TRUE),
'total_net' =>  $this->input->post('total_net',TRUE),
'total_weight' => $this->input->post('total_weight',TRUE),
            'payment_terms'       =>  $this->input->post('payment_terms',TRUE),
            'Port_of_discharge'       =>  $this->input->post('Port_of_discharge',TRUE),
            'amount_pay_usd'=>$this->input->post('paid_convert'),
            'due_amount_usd'=>$this->input->post('bal_convert'),
            'account_category'=>$this->input->post('account_category'),
            'sub_category'=>$this->input->post('sub_category'),
            'account_subcat'=>$this->input->post('account_subcat'),
            'image'              =>  $profile_img,
        );
        $purchase_id_1 = $this->db->where('purchase_id',$this->input->post('purchase_id',TRUE));
        $q=$this->db->get('product_purchase');
        $row = $q->row_array();
    if(!empty($row['purchase_id'])){
        $this->session->set_userdata("purchase_1",$row['purchase_id']);
   $this->db->where('purchase_id', $this->session->userdata("purchase_1"));
  $this->db->delete('product_purchase');
    // echo $this->db->last_query();echo "<br/>";
        $this->db->insert('product_purchase', $data);
    //   echo $this->db->last_query();echo "<br/>";
   }
    else{
    $this->db->insert('product_purchase', $data);
    //  echo $this->db->last_query();echo "<br/>";
    }
    $purchase_id_2 = $this->db->select('purchase_id')->from('product_purchase')->where('chalan_no',$this->input->post('invoice_no',TRUE))->get()->row()->purchase_id;
    $this->session->set_userdata("purchase_2",$purchase_id_2);
    // echo $this->db->last_query();
   
   
   
   
   
    $purchasecoatran = array(
          'VNo'            =>  $purchase_id,
          'Vtype'          =>  'Purchase',
          'VDate'          =>  $this->input->post('bill_date',TRUE),
          'COAID'          =>  $sup_coa->HeadCode,
          'Narration'      =>  'Supplier .'.$supinfo->supplier_name,
          'Debit'          =>  0,
          'Credit'         =>  $this->input->post('grand_total_price',TRUE),
          'IsPosted'       =>  1,
          'CreateBy'       =>  $receive_by,
          'CreateDate'     =>  $receive_date,
          'IsAppove'       =>  1
        );
          ///Inventory Debit
       $coscr = array(
      'VNo'            =>  $purchase_id,
      'Vtype'          =>  'Purchase',
      'VDate'          =>  $this->input->post('bill_date',TRUE),
      'COAID'          =>  10107,
      'Narration'      =>  'Inventory Debit For Supplier '.$supinfo->supplier_name,
      'Debit'          =>  $this->input->post('grand_total_price',TRUE),
      'Credit'         =>  0,//purchase price asbe
      'IsPosted'       => 1,
      'CreateBy'       => $receive_by,
      'CreateDate'     => $createdate,
      'IsAppove'       => 1
    );
       // Expense for company
         $expense = array(
      'VNo'            => $purchase_id,
      'Vtype'          => 'Purchase',
      'VDate'          => $this->input->post('bill_date',TRUE),
      'COAID'          => 402,
      'Narration'      => 'Company Credit For  '.$supinfo->supplier_name,
      'Debit'          => $this->input->post('grand_total_price',TRUE),
      'Credit'         => 0,//purchase price asbe
      'IsPosted'       => 1,
      'CreateBy'       => $receive_by,
      'CreateDate'     => $createdate,
      'IsAppove'       => 1
    );
             $cashinhand = array(
      'VNo'            =>  $purchase_id,
      'Vtype'          =>  'Purchase',
      'VDate'          =>  $this->input->post('bill_date',TRUE),
      'COAID'          =>  1020101,
      'Narration'      =>  'Cash in Hand For Supplier '.$supinfo->supplier_name,
      'Debit'          =>  0,
      'Credit'         =>  $paid_amount,
      'IsPosted'       =>  1,
      'CreateBy'       =>  $receive_by,
      'CreateDate'     =>  $createdate,
      'IsAppove'       =>  1
    );
     $supplierdebit = array(
          'VNo'            =>  $purchase_id,
          'Vtype'          =>  'Purchase',
          'VDate'          =>  $this->input->post('bill_date',TRUE),
          'COAID'          =>  $sup_coa->HeadCode,
          'Narration'      =>  'Supplier .'.$supinfo->supplier_name,
          'Debit'          =>  $paid_amount,
          'Credit'         =>  0,
          'IsPosted'       =>  1,
          'CreateBy'       =>  $receive_by,
          'CreateDate'     =>  $receive_date,
          'IsAppove'       =>  1
        );
               // bank ledger
 $bankc = array(
      'VNo'            =>  $purchase_id,
      'Vtype'          =>  'Purchase',
      'VDate'          =>  $this->input->post('bill_date',TRUE),
      'COAID'          =>  $bankcoaid,
      'Narration'      =>  'Paid amount for Supplier  '.$supinfo->supplier_name,
      'Debit'          =>  0,
      'Credit'         =>  $paid_amount,
      'IsPosted'       =>  1,
      'CreateBy'       =>  $receive_by,
      'CreateDate'     =>  $createdate,
      'IsAppove'       =>  1
    );
// Bank summary for credit
       //new end
        $this->db->insert('acc_transaction',$coscr);
        $this->db->insert('acc_transaction',$purchasecoatran);
        $this->db->insert('acc_transaction',$expense);
        if($this->input->post('paytype_drop',TRUE) == 'CASH'){
          if(!empty($paid_amount)){
        $this->db->insert('acc_transaction',$cashinhand);
        $this->db->insert('acc_transaction',$supplierdebit);
        }
        }else {
          if(!empty($paid_amount)){
        $this->db->insert('acc_transaction',$bankc);
        $this->db->insert('acc_transaction',$supplierdebit);
      }
    }
//           $prodt                = $this->input->post('prodt',TRUE);
//         $product_id =$this->input->post('product_id',TRUE);
//   $desc =$this->input->post('description',TRUE);
//   $thickness=$this->input->post('thickness',TRUE);
//   $supplier_b_no=$this->input->post('supplier_block_no',TRUE);
//   $supplier_slab_no=$this->input->post('supplier_slab_no',TRUE);
//     $gross_width=$this->input->post('gross_width',TRUE);
//      $gross_height=$this->input->post('gross_height',TRUE);
//       $gross_sq_ft=$this->input->post('gross_sq_ft',TRUE);
//       $slab_no=$this->input->post('slab_no',TRUE);
//       $bundle_no=$this->input->post('bundle_no',TRUE);
//         $net_width=$this->input->post('net_width',TRUE);
//          $net_height=$this->input->post('net_height',TRUE);
//           $net_sq_ft=$this->input->post('net_sq_ft',TRUE);
//           $cost_sq_ft=$this->input->post('cost_sq_ft',TRUE);
//             $cost_sq_slab=$this->input->post('cost_sq_slab',TRUE);
//              $sales_amt_sq_ft=$this->input->post('sales_amt_sq_ft',TRUE);
//               $sales_slab_amt=$this->input->post('sales_slab_amt',TRUE);
//               $weight=$this->input->post('weight',TRUE);
//                 $origin=$this->input->post('origin',TRUE);
//               $tableid=$this->input->post('tableid',TRUE);
//                  $total_amt=$this->input->post('total_amt',TRUE);
//                  $total=$this->input->post('total',TRUE);
//                   $overall_gross=$this->input->post('overall_gross',TRUE);
//                   $overall_net=$this->input->post('overall_net',TRUE);
// $description =$this->input->post('description',TRUE);
     
//         $this->db->where('purchase_id', $this->session->userdata("purchase_1"));
//         $this->db->delete('product_purchase_details');
 
 
 
 
 
 
//         for ($i = 0, $n = count($prodt); $i < $n; $i++) {
//           $data1 = array(
//                 'purchase_detail_id' => $this->generator(15),
//                 'purchase_id'        => $this->session->userdata("purchase_2"),
//                 'product_id'         => $product_id[$i],
//                 'thickness'             => $thickness[$i],
//                 'supplier_block_no'  =>  $supplier_b_no[$i],
//                 'supplier_slab_no'  => $supplier_slab_no[$i],
//                 'gross_width'  => $gross_width[$i],
//                 'gross_height'  => $gross_height[$i],
//                 'gross_sq_ft_1'  =>$gross_sq_ft[$i],
//                 'bundle_no'  =>$bundle_no[$i],
//                  'total'  => $total_amt[$i],
//             //   'overall_total'   => $total[$i],
//             //   'overall_gross'  => $overall_gross[$i],
//             //    'overall_net'  =>$overall_net[$i],
//                  'tableid'   => $tableid[$i],
//                 'slab_no'  =>  $slab_no[$i],
//                  'product_name'   => $prodt[$i],
//                 'net_width'  => $net_width[$i],
//                 'net_height'  => $net_height[$i],
//                 'net_sq_ft'  => $net_sq_ft[$i],
//                 'cost_sq_ft'  => $cost_sq_ft[$i],
//                 'cost_sq_slab'  =>   $cost_sq_slab[$i],
//                 'sales_amt_sq_ft ' => $sales_amt_sq_ft[$i],
//                 'sales_slab_amt'   => $sales_slab_amt[$i],
//                 'weight'  =>   $weight[$i],
//                 'origin'  =>$origin[$i],
//                 'description'       => $description[$i],
//                 'create_by'          =>  $this->session->userdata('user_id'),
//                 'status'             => 1
//             );
//             // print_r($data1); die();
//             $this->db->insert('product_purchase_details', $data1);
            
//           // echo $this->db->last_query();
            
//             // if ($this->db->affected_rows() > 0) {
//             // echo "Success";
//             // } else {
//             //     echo "Failed";
//             // }
             
// $data2 = array(
//             'create_by'        => $this->session->userdata('user_id'),
//             'overall_total'         =>    $this->input->post('gtotal',TRUE),
//             'product_id'         =>$product_id[$i],
//             'description_table'          => $desc[$i],
//             'thickness'           => $thickness[$i],
//             'supplier_block_no'               => $supplier_b_no[$i],
//             'supplier_slab_no'           => $supplier_slab_no[$i],
//             'total_amt'  => $total_amt[$i],
//               'slab_no'  =>  $slab_no[$i],
//             'g_width'       => $gross_width[$i],
//             'g_height'                => $gross_height[$i],
//             'gross_sqft'        => $gross_sq_ft[$i],
//             'bundle_no'         => $bundle_no[$i],
//             'n_width'      => $net_width[$i],
//             'n_height'        => $net_height[$i],
//             'net_sqft'       => $net_sq_ft[$i],
//             'cost_sqft'                => $cost_sq_ft[$i],
//             'cost_slab'        => $cost_sq_slab[$i],
//             'sales_price_sqft'         => $sales_amt_sq_ft[$i],
//             'sales_slab_price'      => $sales_slab_amt[$i],
//           'weight'        => $weight[$i],
//              'origin'        => $origin[$i],
//           'status'             => 1
//         );
//             $this->db->where('product_id', $product_id[$i]);
//             $this->db->where('create_by', $this->session->userdata('user_id'));
//             $this->db->where('bundle_no', $bundle_no[$i]);
//             $this->db->where('slab_no', $slab_no[$i]);
//             $this->db->delete('product_details');
//             $this->db->insert('product_details', $data2);

//                   // echo $this->db->last_query();echo "<br/>";
//                     $expense_get_info4 = array(

//                         'product_id'         => $product_id[$i],
//                         'thickness'             => $thickness[$i],
//                         'supplier_block_no'  =>  $supplier_b_no[$i],
//                         'supplier_slab_no'  => $supplier_slab_no[$i],
//                         'g_width'  => $gross_width[$i],
//                         'g_height'  => $gross_height[$i],
//                         'bundle_no'  =>$description[$i],
//                         'slab_no'  =>$slab_no[$i],
//                         'n_width'  => $net_width[$i],
//                         'n_height'  => $net_height[$i],
//                         'net_sqft'  => $net_sq_ft[$i],
//                         'cost_sqft'  => $cost_sq_ft[$i],
//                         'cost_slab'  =>   $cost_sq_slab[$i],
//                         'sales_price_sqft ' => $sales_amt_sq_ft[$i],
//                         'sales_slab_price'   => $sales_slab_amt[$i],
//                         'weight'  =>   $weight[$i],
//                         'origin'  =>$origin[$i],
//                         'description_table'       => $bundle_no[$i],
//                         'create_by'          =>  $this->session->userdata('user_id'),
//                         'invoice_id'          => $this->input->post('invoice_no',TRUE),
//                         'status'             => 1,
//                         'expenses'           => 'expenses'
//                      );
//         }  
//         return $purchase_id."/".$chalan_no;
//     }




        $prodt                = $this->input->post('prodt',TRUE);
        $product_id =$this->input->post('product_id',TRUE);
  $desc =$this->input->post('description',TRUE);
  $thickness=$this->input->post('thickness',TRUE);
  $supplier_b_no=$this->input->post('supplier_block_no',TRUE);
   $supplier_slab_no=$this->input->post('supplier_slab_no',TRUE);
    $gross_width=$this->input->post('gross_width',TRUE);
     $gross_height=$this->input->post('gross_height',TRUE);
      $gross_sq_ft=$this->input->post('gross_sq_ft',TRUE);
       $slab_no=$this->input->post('slab_no',TRUE);
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
               $tableid=$this->input->post('tableid',TRUE);
                 $total_amt=$this->input->post('total_amt',TRUE);
                 $total=$this->input->post('total',TRUE);
                   $overall_gross=$this->input->post('overall_gross',TRUE);
                   $overall_net=$this->input->post('overall_net',TRUE);
$description =$this->input->post('description',TRUE);
      $this->db->where('purchase_id', $this->session->userdata("purchase_1"));
        $this->db->delete('product_purchase_details');
//   echo $this->db->last_query();echo "<br/>";
         for ($i = 0, $n = count($prodt); $i < $n; $i++) {
           $data1 = array(
                'purchase_detail_id' => $this->generator(15),
                'purchase_id'        => $this->session->userdata("purchase_2"),
                'product_id'         => $product_id[$i],
                'thickness'             => $thickness[$i],
                'supplier_block_no'  =>  $supplier_b_no[$i],
                'supplier_slab_no'  => $supplier_slab_no[$i],
                'gross_width'  => $gross_width[$i],
                'gross_height'  => $gross_height[$i],
                'gross_sq_ft_1'  =>$gross_sq_ft[$i],
                'bundle_no'  =>$bundle_no[$i],
                 'total'  => $total_amt[$i],        
                 'tableid'   => $tableid[$i],
                'slab_no'  =>  $slab_no[$i],
                 'product_name'   => $prodt[$i],
                'net_width'  => $net_width[$i],
                'net_height'  => $net_height[$i],
                'net_sq_ft'  => $net_sq_ft[$i],
                'cost_sq_ft'  => $cost_sq_ft[$i],
                'cost_sq_slab'  =>   $cost_sq_slab[$i],
                'sales_amt_sq_ft ' => $sales_amt_sq_ft[$i],
                'sales_slab_amt'   => $sales_slab_amt[$i],
                'weight'  =>   $weight[$i],
                'origin'  =>$origin[$i],
                'description'       => $description[$i],
                'create_by'          =>  $this->session->userdata('user_id'),
                'status'             => 1
            );
            $this->db->insert('product_purchase_details', $data1);
          //  echo $this->db->last_query();echo "<br/>";
$data2 = array(
            'create_by'        => $this->session->userdata('user_id'),
            'overall_total'         =>    $this->input->post('gtotal',TRUE),
            'product_id'         =>$product_id[$i],
            'description_table'          => $desc[$i],
            'thickness'           => $thickness[$i],
            'supplier_block_no'               => $supplier_b_no[$i],
            'supplier_slab_no'           => $supplier_slab_no[$i],
            'total_amt'  => $total_amt[$i],
              'slab_no'  =>  $slab_no[$i],
            'g_width'       => $gross_width[$i],
            'g_height'                => $gross_height[$i],
            'gross_sqft'        => $gross_sq_ft[$i],
            'bundle_no'         => $bundle_no[$i],
            'n_width'      => $net_width[$i],
            'n_height'        => $net_height[$i],
            'net_sqft'       => $net_sq_ft[$i],
            'cost_sqft'                => $cost_sq_ft[$i],
            'cost_slab'        => $cost_sq_slab[$i],
            'sales_price_sqft'         => $sales_amt_sq_ft[$i],
            'sales_slab_price'      => $sales_slab_amt[$i],
           'weight'        => $weight[$i],
             'origin'        => $origin[$i],
           'status'             => 1
        );
   $this->db->where('product_id', $product_id[$i]);
   $this->db->where('create_by', $this->session->userdata('user_id'));
    $this->db->where('bundle_no', $bundle_no[$i]);
        $this->db->where('slab_no', $slab_no[$i]);
            $this->db->delete('product_details');
 
        $this->db->insert('product_details', $data2);

                     $expense_get_info4 = array(

                        'product_id'         => $product_id[$i],
                        'thickness'             => $thickness[$i],
                        'supplier_block_no'  =>  $supplier_b_no[$i],
                        'supplier_slab_no'  => $supplier_slab_no[$i],
                        'g_width'  => $gross_width[$i],
                        'g_height'  => $gross_height[$i],
                        'bundle_no'  =>$description[$i],
                        'slab_no'  =>$slab_no[$i],
                        'n_width'  => $net_width[$i],
                        'n_height'  => $net_height[$i],
                        'net_sqft'  => $net_sq_ft[$i],
                        'cost_sqft'  => $cost_sq_ft[$i],
                        'cost_slab'  =>   $cost_sq_slab[$i],
                        'sales_price_sqft ' => $sales_amt_sq_ft[$i],
                        'sales_slab_price'   => $sales_slab_amt[$i],
                        'weight'  =>   $weight[$i],
                        'origin'  =>$origin[$i],
                        'description_table'       => $bundle_no[$i],
                        'create_by'          =>  $this->session->userdata('user_id'),
                        'invoice_id'          => $this->input->post('invoice_no',TRUE),
                        'status'             => 1,
                        'expenses'           => 'expenses'
                     );
 
          
        }  
         return $purchase_id."/".$chalan_no;
    }







































public function payment_type_dropdown() {
        $this->db->select('*');
        $this->db->from('payment_type');
        $this->db->where('create_by',$this->session->userdata('user_id'));
        $query = $this->db->get();
    //    echo $this->db->last_query(); die();
        return $query->result_array();
    }
    
    
    
    
    
    
    
    
    public function payment_terms_dropdown() {
        $this->db->select('*');
        $this->db->from('payment_terms');
        
                $this->db->where('create_by',$this->session->userdata('user_id'));

        $query = $this->db->get();
    //    echo $this->db->last_query(); die();
        return $query->result_array();
    }
    
    
    
    
    public function drop_payment_type(){
      $this->db->select('*');
      $this->db->from('payment_type');
      $this->db->where('create_by' ,$this->session->userdata('user_id'));
      $query = $this->db->get();
      return $query->result_array();
  }
    public function get_expense_product()
    {
        $this->db->select('a.*,b.*');
        $this->db->from('product_purchase a');
        $this->db->join('product_purchase_details b', 'b.purchase_id = a.purchase_id');
        $this->db->where('a.create_by',$this->session->userdata('user_id'));
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }
    public function get_purchase_product()
    {
        $this->db->select('a.*,b.*');
        $this->db->from('purchase_order a');
        $this->db->join('purchase_order_details b', 'b.purchase_order_detail_id = a.purchase_order_id');
        $this->db->where('a.create_by',$this->session->userdata('user_id'));
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }

       //packing_list_entry
    public function packing_list_entry() {
       
        $purchase_id  = date('YmdHis');
        $invoice_no =$this->input->post('invoice_no',TRUE);
        $p_id = $this->input->post('product_id',TRUE);
     $receive_by=$this->session->userdata('user_id');
        $receive_date=date('Y-m-d');
        $createdate=date('Y-m-d H:i:s');
        $paid_amount = $this->input->post('paid_amount',TRUE);
        $due_amount = $this->input->post('due_amount',TRUE);
        $discount = $this->input->post('discount',TRUE);
          $bank_id = $this->input->post('bank_id',TRUE);
        if(!empty($bank_id)){
         $bankname = $this->db->select('bank_name')->from('bank_add')->where('bank_id',$bank_id)->get()->row()->bank_name;
      
         $bankcoaid = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName',$bankname)->get()->row()->HeadCode;
        }else
        {
               $bankcoaid = '';
        }
        $data = array(
            'expense_packing_id'        => $purchase_id,
            'create_by'       =>  $this->session->userdata('user_id'),
            'invoice_no'          => $this->input->post('invoice_no',TRUE),
            'invoice_date'        => $this->input->post('invoice_date',TRUE),
            'gross_weight' => $this->input->post('gross_weight',TRUE),
            'remarks' => $this->input->post('remarks',TRUE),
           'container_no'     => $this->input->post('container_no',TRUE),
            'grand_total_amount'      => $this->input->post('total',TRUE),
            'thickness'   =>$this->input->post('thickness',TRUE),
            'status'             => 1,
        );
        $purchase_id_1 = $this->db->where('invoice_no',$this->input->post('invoice_no',TRUE));
        $q=$this->db->get('expense_packing_list');
        $row = $q->row_array();
    if(!empty($row['expense_packing_id'])){
   //  echo $row['expense_packing_id'];
        $this->session->set_userdata("packing_1",$row['expense_packing_id']);
      
        $this->db->where('invoice_no',$this->input->post('invoice_no',TRUE));
 
        $this->db->delete('expense_packing_list');
      // echo $this->db->last_query();echo "<br/>";
        $this->db->insert('expense_packing_list', $data);
     //  echo $this->db->last_query();echo "<br/>";
   }   
    else{
    $this->db->insert('expense_packing_list', $data);
    
   //echo $this->db->last_query();echo "<br/>";
    }
      
    $purchase_id = $this->db->select('expense_packing_id')->from('expense_packing_list')->where('invoice_no',$this->input->post('invoice_no',TRUE))->get()->row()->expense_packing_id;

       $this->session->set_userdata("packing_2",$purchase_id);

  if($this->input->post('paytype') == 2){
          if(!empty($paid_amount)){
        $this->db->insert('acc_transaction',$bankc);
       
        $this->db->insert('acc_transaction',$supplierdebit);
      }
        }
        if($this->input->post('paytype') == 1){
          if(!empty($paid_amount)){
        $this->db->insert('acc_transaction',$cashinhand);
        $this->db->insert('acc_transaction',$supplierdebit); 
        }    
        }    

        $serial_number = $this->input->post('serial_number',TRUE);
        $bun_ref = $this->input->post('bun_ref',TRUE);
        $product_name =$this->input->post('product_name',TRUE);
        $bundle_no = $this->input->post('bundle_no',TRUE);
        $quantity = $this->input->post('quantity',TRUE);

        $q_per_bundle=$this->input->post('q_per_bundle',TRUE);
        $q_per_package=$this->input->post('q_per_package',TRUE);
        

        $rate = $this->input->post('rate',TRUE);
        $total_price =$this->input->post('total_price',TRUE);
      //  $bundle = $this->input->post('bundle',TRUE);
        $p_id1 = $this->input->post('product_id',TRUE);
        $rowCount = count($this->input->post('product_name',TRUE));
        $this->db->where('expense_packing_id', $this->session->userdata("packing_1"));
        $this->db->delete('expense_packing_list_detail');
     //   echo $this->db->last_query();echo "<br/>";
        for ($i = 0; $i < $rowCount; $i++) {
            $serial = $serial_number[$i];
            $bun_reff = $bun_ref[$i];
            $p_name=$product_name[$i];
            $b_no =$bundle_no[$i];

            $qnty_bundle =$q_per_bundle[$i];

            $qnty_package=$q_per_package[$i];


            $p_id =$p_id1[$i];
           
          //  $bundlee =$bundle[$i];
            $rte = $rate[$i];
            $t_price = $total_price[$i];
      
            $data1 = array(
             
                'expense_packing_detail_id' => $this->generator(15),
                'expense_packing_id'        =>$this->session->userdata("packing_2"),
                'serial_no'         => $serial,
                'bundle_ref'               => $bun_reff,
               'product_name' =>$p_name,
                'product_id' => $p_id,
                'no_of_bundle' => $b_no,
                
                'quantity_per_bundle'  => $qnty_bundle,
                'quantity_per_package'   => $qnty_package,
                'rate' => $rte,
                'total_price' => $t_price,
                'create_by'          =>  $this->session->userdata('user_id'),
                'status'             => 1
            );
       
        
//$this->db->where('expense_packing_id',$this->session->userdata('sale_p_2'));
//  echo $this->db->last_query();echo "<br/>";
//$this->db->delete('sale_packing_list_detail');
$this->db->insert('expense_packing_list_detail', $data1);
//echo $this->db->last_query();echo "<br/>";

    }

           
         //   $this->db->where('expense_packing_id', $this->session->userdata("packing_1"));
 
         //   $this->db->delete('expense_packing_list_detail');
         //   $this->db->insert('expense_packing_list_detail', $data1);



           
            
       // }
        return $purchase_id."/".$invoice_no;
       
    }




     //Purchase Order Entry
     /*
     public function purchase_order_entry() {
        $purchase_id = date('YmdHis');
$chalan_no =$this->input->post('chalan_no',TRUE);
        $p_id = $this->input->post('product_id',TRUE);
        $supplier_id = $this->input->post('supplier_id',TRUE);
        $supinfo =$this->db->select('*')->from('supplier_information')->where('supplier_id',$supplier_id)->get()->row();
        $sup_head = $supinfo->supplier_id.'-'.$supinfo->supplier_name;
        $sup_coa = $this->db->select('*')->from('acc_coa')->where('HeadName',$sup_head)->get()->row();
        $receive_by=$this->session->userdata('user_id');
        $receive_date=date('Y-m-d');
        $createdate=date('Y-m-d H:i:s');
        $paid_amount = $this->input->post('paid_amount',TRUE);
        $due_amount = $this->input->post('due_amount',TRUE);
        $discount = $this->input->post('discount',TRUE);
          $bank_id = $this->input->post('bank_id',TRUE);
        if(!empty($bank_id)){
         $bankname = $this->db->select('bank_name')->from('bank_add')->where('bank_id',$bank_id)->get()->row()->bank_name;
      
         $bankcoaid = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName',$bankname)->get()->row()->HeadCode;
       }else{
           $bankcoaid = '';
       }

        //supplier & product id relation ship checker.
        for ($i = 0, $n = count($p_id); $i < $n; $i++) {
            $product_id = $p_id[$i];
            $value = $this->product_supplier_check($product_id, $supplier_id);
            if ($value == 0) {
                $this->session->set_flashdata('error_message', display('product_and_supplier_did_not_match'));
             
            }
        }
 
        $data = array(
            'purchase_order_id'        => $purchase_id,
            'create_by'       =>  $this->session->userdata('user_id'),
            'tax_details'  =>  $this->input->post('tax_details',TRUE),

            'ship_to'         =>$this->input->post('ship_to',TRUE),
            'created_by'       =>$this->input->post('created_by',TRUE),
            'payment_terms' => $this->input->post('payment_terms',TRUE),
            'shipment_terms' => $this->input->post('shipment_terms',TRUE),
            'est_ship_date'  => $this->input->post('est_ship_date',TRUE),


            'chalan_no'          => $this->input->post('chalan_no',TRUE),
            'supplier_id'        => $this->input->post('supplier_id',TRUE),
            'total' => $this->input->post('total',TRUE),
            'grand_total_amount' => $this->input->post('gtotal',TRUE),
             'gtotal_preferred_currency' => $this->input->post('vendor_gtotal',TRUE),
            'total_discount'     => $this->input->post('discount',TRUE),
            'purchase_date'      => $receive_date,
            'purchase_details'   => $this->input->post('purchase_details',TRUE),
            'payment_due_date'   => $this->input->post('payment_due_date',TRUE),
            'remarks'            => $this->input->post('remarks',TRUE),
            'message_invoice'    => $this->input->post('message_invoice',TRUE),
          
            'etd'   => $this->input->post('etd',TRUE),
            'eta'   => $this->input->post('eta',TRUE),
            'shipping_line'   => $this->input->post('shipping_line',TRUE),
            'container_no'   => $this->input->post('container_no',TRUE),
            'bl_number'   => $this->input->post('bl_number',TRUE),
            'isf_filling'   => $this->input->post('isf_filling',TRUE),
            'paid_amount'        => $paid_amount,
            'due_amount'         => $due_amount,
            'status'             => 1,
            'bank_id'            =>  $this->input->post('bank_id',TRUE),
            'payment_type'       =>  $this->input->post('paytype',TRUE),
        );
        //Supplier Credit
        $purchasecoatran = array(
          'VNo'            =>  $purchase_id,
          'Vtype'          =>  'Purchase',
          'VDate'          =>  $this->input->post('purchase_date',TRUE),
          'COAID'          =>  $sup_coa->HeadCode,
          'Narration'      =>  'Supplier .'.$supinfo->supplier_name,
          'Debit'          =>  0,
          'Credit'         =>  $this->input->post('grand_total_price',TRUE),
          'IsPosted'       =>  1,
          'CreateBy'       =>  $receive_by,
          'CreateDate'     =>  $receive_date,
          'IsAppove'       =>  1
        ); 
          ///Inventory Debit
       $coscr = array(
      'VNo'            =>  $purchase_id,
      'Vtype'          =>  'Purchase',
      'VDate'          =>  $this->input->post('purchase_date',TRUE),
      'COAID'          =>  10107,
      'Narration'      =>  'Inventory Debit For Supplier '.$supinfo->supplier_name,
      'Debit'          =>  $this->input->post('grand_total_price',TRUE),
      'Credit'         =>  0,//purchase price asbe
      'IsPosted'       => 1,
      'CreateBy'       => $receive_by,
      'CreateDate'     => $createdate,
      'IsAppove'       => 1
    ); 



       // Expense for company
         $expense = array(
      'VNo'            => $purchase_id,
      'Vtype'          => 'Purchase',
      'VDate'          => $this->input->post('purchase_date',TRUE),
      'COAID'          => 402,
      'Narration'      => 'Company Credit For  '.$supinfo->supplier_name,
      'Debit'          => $this->input->post('grand_total_price',TRUE),
      'Credit'         => 0,//purchase price asbe
      'IsPosted'       => 1,
      'CreateBy'       => $receive_by,
      'CreateDate'     => $createdate,
      'IsAppove'       => 1
    ); 
             $cashinhand = array(
      'VNo'            =>  $purchase_id,
      'Vtype'          =>  'Purchase',
      'VDate'          =>  $this->input->post('purchase_date',TRUE),
      'COAID'          =>  1020101,
      'Narration'      =>  'Cash in Hand For Supplier '.$supinfo->supplier_name,
      'Debit'          =>  0,
      'Credit'         =>  $paid_amount,
      'IsPosted'       =>  1,
      'CreateBy'       =>  $receive_by,
      'CreateDate'     =>  $createdate,
      'IsAppove'       =>  1
    ); 

     $supplierdebit = array(
          'VNo'            =>  $purchase_id,
          'Vtype'          =>  'Purchase',
          'VDate'          =>  $this->input->post('purchase_date',TRUE),
          'COAID'          =>  $sup_coa->HeadCode,
          'Narration'      =>  'Supplier .'.$supinfo->supplier_name,
          'Debit'          =>  $paid_amount,
          'Credit'         =>  0,
          'IsPosted'       =>  1,
          'CreateBy'       =>  $receive_by,
          'CreateDate'     =>  $receive_date,
          'IsAppove'       =>  1
        ); 
             
                  // bank ledger
 $bankc = array(
      'VNo'            =>  $purchase_id,
      'Vtype'          =>  'Purchase',
      'VDate'          =>  $this->input->post('purchase_date',TRUE),
      'COAID'          =>  $bankcoaid,
      'Narration'      =>  'Paid amount for Supplier  '.$supinfo->supplier_name,
      'Debit'          =>  0,
      'Credit'         =>  $paid_amount,
      'IsPosted'       =>  1,
      'CreateBy'       =>  $receive_by,
      'CreateDate'     =>  $createdate,
      'IsAppove'       =>  1
    ); 
 // Bank summary for credit

       //new end
     
       $purchase_id_1 = $this->db->where('chalan_no',$this->input->post('chalan_no',TRUE));
       $q=$this->db->get('purchase_order');
       $row = $q->row_array();
     //  echo $row['purchase_order_id'];
      if(!empty($row['purchase_order_id'])){
       $this->session->set_userdata("SESSION_NAME_1",$row['purchase_order_id']);
     
       $this->db->where('chalan_no', $this->input->post('chalan_no',TRUE));

       $this->db->delete('purchase_order');
  
        $this->db->insert('purchase_order', $data);
      
      }
      else{
        $this->db->insert('purchase_order', $data);
       
      }
        $purchase_id = $this->db->select('purchase_order_id')->from('purchase_order')->where('chalan_no',$this->input->post('chalan_no',TRUE))->get()->row()->purchase_order_id;
    
        $this->session->set_userdata("SESSION_NAME",$purchase_id);
       
      
        $this->db->insert('acc_transaction',$coscr);
        $this->db->insert('acc_transaction',$purchasecoatran);  
        $this->db->insert('acc_transaction',$expense);
        if($this->input->post('paytype') == 2){
          if(!empty($paid_amount)){
        $this->db->insert('acc_transaction',$bankc);
       
        $this->db->insert('acc_transaction',$supplierdebit);
      }
        }
        if($this->input->post('paytype') == 1){
          if(!empty($paid_amount)){
        $this->db->insert('acc_transaction',$cashinhand);
        $this->db->insert('acc_transaction',$supplierdebit); 
        }    
        }       

        $rate = $this->input->post('product_rate',TRUE);
        $quantity = $this->input->post('product_quantity',TRUE);
        $slabs_po = $this->input->post('slabs',TRUE);

        $t_price = $this->input->post('total_price',TRUE);
        $discount = $this->input->post('discount',TRUE);

        for ($i = 0, $n = count($p_id); $i < $n; $i++) {
            $slabs = $slabs_po[$i];
            $product_quantity = $quantity[$i];
            $product_rate = $rate[$i];
            $product_id = $p_id[$i];
            $total_price = $t_price[$i];
            $disc = 0;

            $data1 = array(
                'purchase_order_detail_id' => $this->generator(15),
                'purchase_id'        =>  $this->session->userdata("SESSION_NAME"),
                'product_id'         => $product_id,
                'slabs'              => $slabs,
                'quantity'           => $product_quantity,
                'rate'               => $product_rate,
                'total_amount'       => $total_price,
                'discount'           => $disc,
                'create_by'          => $this->session->userdata('user_id'),
                'status'             => 1
            );
          //  
      //    SESSION_NAME_1
          //  echo $purchase_id;
          //  $this->db->where('purchase_id', $purchase_id );

           // $this->db->delete('purchase_order_details');
         //   echo $this->db->last_query();
          //  if (!empty($quantity)) {
          
            $this->db->where('purchase_id', $this->session->userdata("SESSION_NAME_1"));
 
            $this->db->delete('purchase_order_details');
            $this->db->insert('purchase_order_details', $data1);
               
           // }
        }
      
        return $purchase_id."/".$chalan_no;
    }
*/
public function servicepro($date=null) {
  if($date) {
$split = array_map(
function($value) {
return implode(' ', $value);
},
array_chunk(explode('-', $date), 3)
);
$start = str_replace(' ', '-', $split[0]);
$end = str_replace(' ', '-', $split[1]);
$start = rtrim($start, "-");
$end= preg_replace('/' . '-' . '/', '', $end, 1);
}
$query = '';
$data = array();
$records_per_page = 10;
$start_from = 0;
$current_page_number = 0;
if(isset($_POST["rowCount"]))
{
$records_per_page = $_POST["rowCount"];
}
else
{
$records_per_page = 10;
}
if(isset($_POST["current"]))
{
$current_page_number = $_POST["current"];
}
else
{
$current_page_number = 1;
}
$start_from = ($current_page_number - 1) * $records_per_page;
$usertype = $this->session->userdata('user_type');

  //  $this->db->select('a.*,b.*');
  //       $this->db->from('purchase_order a');
  //       $this->db->join('purchase_order_details b', 'b.purchase_order_detail_id = a.purchase_order_id');
  //       $this->db->where('a.create_by',$this->session->userdata('user_id'));


 $this->db->select('a.*,b.*');
$this->db->from('service a');
 $this->db->join('supplier_information b', 'b.supplier_name = a.service_provider_name','right');
$this->db->where('create_by',$this->session->userdata('user_id'));
 
if($date) {
if(!empty($start) && !empty($end)){
   $this->db->where('service_provider_detail >=',$start);
$this->db->where('total <=',$end);
}
}
if(!empty($_POST["searchPhrase"]))
{
$query .= 'WHERE (id LIKE "%'.$_POST["searchPhrase"].'%" ';
 //$query .= 'OR a.purchase_date LIKE "%'.$_POST["searchPhrase"].'%" ';
$query .= 'OR sp_address LIKE "%'.$_POST["searchPhrase"].'%" ';
$query .= 'OR bill_number LIKE "%'.$_POST["searchPhrase"].'%" ) ';
}
$order_by = '';
if(isset($_POST["sort"]) && is_array($_POST["sort"]))
{
foreach($_POST["sort"] as $key => $value)
{
 $order_by .= " $key $value, ";
}
}
else
{
$query .= 'ORDER BY id DESC ';
}
// if($order_by != '')
//  {
//   $query .= ' ORDER BY ' . substr($order_by, 0, -2);
//   }
if($records_per_page != -1)
{
$query .= " LIMIT " . $start_from . ", " . $records_per_page;
}
  $query = $this->db->get();
//   echo $this->db->last_query();
$result = $this->db->query($query);
$result = $query->result_array();
foreach($result as $row)
{
$data[] = $row;
}
$this->db->select('*');
$this->db->from('service');
$query1 = $this->db->get();
$result1 = $query1->result_array();
// echo $this->db->last_query();
$total_records = $query1->num_rows();
$output = array(
'rows'   => $data
);
return $output;
}







public function service_provider($serviceprovider_id) {
             $this->db->select('a.*,b.*');
        $this->db->from('service a');
        $this->db->join('service_provider_detail b', 'b.serviceprovider_id = a.serviceprovider_id');
        $this->db->where('a.create_by',$this->session->userdata('user_id'));
         $this->db->where('a.serviceprovider_id',$serviceprovider_id);
      $query = $this->db->get();

      return $query->result_array();
  }
//   public function service_details() {
//     $this->db->select('*');
//     $this->db->from('service_provider_detail');
//     $query = $this->db->get();
// //    echo $this->db->last_query(); die();
//     return $query->result_array();
// }








public function service_provider_entry() {

  $receive_by=$this->session->userdata('user_id');
  $receive_date=date('Y-m-d');
  $createdate=date('Y-m-d H:i:s');
  $paid_amount = $this->input->post('paid_amount',TRUE);
  $due_amount = $this->input->post('due_amount',TRUE);
  $discount = $this->input->post('discount',TRUE);
  $bank_id = $this->input->post('bank_id',TRUE);
       $supplier_id = $this->db->select('supplier_name')->from('supplier_information')->where('supplier_id',$this->input->post('service_provider_name',TRUE))->get()->row()->supplier_name;
$data = array(
            'serviceprovider_id'         => $this->input->post('serviceprovider_id',TRUE),
            'service_provider_name'     =>$supplier_id,
            'sp_address'    => $this->input->post('sp_address',TRUE),
            'payment_terms' => $this->input->post('pay_terms',TRUE),
            'bill_number'   => $this->input->post('bill_num',TRUE),
            'bill_date'     => $this->input->post('bill_date',TRUE),
            'phone_num'     => $this->input->post('phone_num',TRUE),          
            'acc_cat_name'  => $this->input->post('acc_cat_name',TRUE),
            'acc_cat'       => $this->input->post('acc_cat',TRUE),
            'acc_sub_name'  => $this->input->post('acc_sub_name',TRUE),
            'due_date'      => $this->input->post('due_date',TRUE),
            'total'         => $this->input->post('total',TRUE),
            'memo_details'  => $this->input->post('memo_details',TRUE),
            'tax_detail'  => $this->input->post('tax_detail',TRUE),
            'gtotals'  => $this->input->post('gtotals',TRUE),
            'vendor_gtotals'  => $this->input->post('vendor_gtotals',TRUE),
            'amount_paids'  => $this->input->post('amount_paids',TRUE),
            'balances'  => $this->input->post('balances',TRUE),
            'payment_id'  => $this->input->post('payment_id_service',TRUE),
            'create_by'     =>  $this->session->userdata('user_id'),
            'status'        => 1
  );
  
// print_r($data);



  $q=$this->db->get('service');
  $row = $q->row_array();
  if(!empty($row['serviceprovider_id'])){
  $this->session->set_userdata("spacking_1",$row['serviceprovider_id']);
  $this->db->where('bill_number',$this->input->post('bill_num',TRUE));

   $this->db->delete('service');
   //echo $this->db->last_query();
  $this->db->insert('service', $data);
//   echo $this->db->last_query();die();

}
else{
$this->db->insert('service', $data);
//  echo $this->db->last_query(); die();

}


if($this->input->post('paytype') == 2){
    if(!empty($paid_amount)){
  $this->db->insert('acc_transaction',$bankc);
  $this->db->insert('acc_transaction',$supplierdebit);
}
  }
  if($this->input->post('paytype') == 1){
    if(!empty($paid_amount)){
  $this->db->insert('acc_transaction',$cashinhand);
  $this->db->insert('acc_transaction',$supplierdebit);
  }
  }
  
    $product_name_ser = $this->input->post('product_name', TRUE);
    $description_service = $this->input->post('description_service', TRUE);
    $qua_ser = $this->input->post('quality', TRUE);
    $total_price = $this->input->post('total_price', TRUE);
    $serviceprovider_id = $this->input->post('serviceprovider_id', TRUE);
     $this->session->set_userdata("spacking_1",$row['serviceprovider_id']);
        $this->db->where('serviceprovider_id',$serviceprovider_id);
        $this->db->delete('service_provider_detail');
    for ($i = 0, $n = count($qua_ser); $i < $n; $i++) {
      $productname = $product_name_ser[$i];
      $descser = $description_service[$i];
      $qua_service = $qua_ser[$i];
      $totapri = $total_price[$i];
      $serviceprovider_id   = $this->input->post('serviceprovider_id',TRUE);
    $data1 = array(
          'serviceprovider_id'   =>  $this->input->post('serviceprovider_id',TRUE),
          'productname'         => $productname,
          'description' => $descser,
          'quality'               => $qua_service,
          'total_price' => $totapri,
          'create_by'          =>  $this->session->userdata('user_id'),
          'status'             => 1
      );

     

      $this->db->insert('service_provider_detail', $data1);
         //echo $this->db->last_query(); die();
      


}


  return $serviceprovider_id;
}









  public function retrieve_supplier_data() {
        $this->db->select('*');
        $this->db->from('supplier_information');
         $this->db->where('created_by' ,$this->session->userdata('user_id'));
 
        // echo $this->db->last_query();

        $query = $this->db->get();
        // echo $this->db->last_query();
              return $query->result_array();
          }














public function purchase_order_entry() {
    $purchase_id = date('YmdHis');
$chalan_no =$this->input->post('chalan_no',TRUE);
    $p_id = $this->input->post('product_id',TRUE);
    $supplier_id = $this->input->post('supplier_id',TRUE);
    $supinfo =$this->db->select('*')->from('supplier_information')->where('supplier_id',$supplier_id)->get()->row();
  //  echo $this->db->last_query();
    $sup_head = $supinfo->supplier_id.'-'.$supinfo->supplier_name;
    $sup_coa = $this->db->select('*')->from('acc_coa')->where('HeadName',$sup_head)->get()->row();
    $receive_by=$this->session->userdata('user_id');
    $receive_date=date('Y-m-d');
    $createdate=date('Y-m-d H:i:s');
    $paid_amount = $this->input->post('amount_paid',TRUE);
    $due_amount = $this->input->post('balance',TRUE);
    $discount = $this->input->post('discount',TRUE);
      $bank_id = $this->input->post('bank',TRUE);
// echo $bank_id;
    if(!empty($bank_id)){
     $bankname = $this->db->select('bank_name')->from('bank_add')->where('bank_name',$bank_id)->get()->row()->bank_name;
    //  echo $bankname;
    //  echo "<br/>";
     $bankcoaid = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName',$bankname)->get()->row()->HeadCode;
    //  echo $bankcoid;
    //  echo $this->db->last_query();
   }else{
       $bankcoaid = '';
   }
    //supplier & product id relation ship checker.
    for ($i = 0, $n = count($p_id); $i < $n; $i++) {
        $product_id = $p_id[$i];
        $value = $this->product_supplier_check($product_id, $supplier_id);
        if ($value == 0) {
            $this->session->set_flashdata('error_message', display('product_and_supplier_did_not_match'));
        }
    }
    $data = array(
        'purchase_order_id'        => $purchase_id,
        'create_by'       =>  $this->session->userdata('user_id'),
        'ship_to'         =>$this->input->post('ship_to',TRUE),
        'created_by'       =>$this->input->post('created_by',TRUE),
        'payment_terms' => $this->input->post('payment_terms',TRUE),
        'shipment_terms' => $this->input->post('shipment_terms',TRUE),
        'supplier_id'        => $this->input->post('supplier_id',TRUE),
        'total'             =>$this->input->post('overall_total',TRUE),
        'payment_id'    => $this->input->post('payment_id',TRUE),
        'grand_total_amount' => $this->input->post('gtotal',TRUE),
        'gtotal_preferred_currency' => $this->input->post('vendor_gtotal',TRUE),
        'total_gross' =>  $this->input->post('total_gross',TRUE),
         'total_net' =>  $this->input->post('total_net',TRUE),
       'total_weight' =>  $this->input->post('total_weight',TRUE),
           'total'  => $this->input->post('Over_all_Total',TRUE),
         'est_ship_date'  => $this->input->post('est_ship_date',TRUE),
        'total_discount'     => $this->input->post('discount',TRUE),
        'purchase_date'      => $this->input->post('purchase_date',TRUE),
        'purchase_details'   => $this->input->post('purchase_details',TRUE),
        'payment_due_date'   => $this->input->post('payment_due_date',TRUE),
        'remarks'            => $this->input->post('remark',TRUE),
        'message_invoice'    => $this->input->post('message_invoice',TRUE),
        'tax_details'    => $this->input->post('tax_details',TRUE),
         'chalan_no'    => $this->input->post('chalan_no',TRUE),
         'payment_terms'   => $this->input->post('payment_terms',TRUE),
         'payment_type' =>$this->input->post('paytype_drop',TRUE),
        // 'eta'   => $this->input->post('eta',TRUE),
        // 'shipping_line'   => $this->input->post('shipping_line',TRUE),
        // 'container_no'   => $this->input->post('container_no',TRUE),
        // 'bl_number'   => $this->input->post('bl_number',TRUE),
        // 'isf_filling'   => $this->input->post('isf_filling',TRUE),
        'paid_amount'        => $paid_amount,
        'due_amount'         => $due_amount,
        'status'             => 1,
        'bank_id'            =>  $this->input->post('bank_id',TRUE),
    );
  //  print_r($data); die();
    //Supplier Credit
    $purchasecoatran = array(
      'VNo'            =>  $purchase_id,
      'Vtype'          =>  'Purchase',
      'VDate'          =>  $this->input->post('purchase_date',TRUE),
       'COAID'          =>  $sup_coa->HeadCode,
      'Narration'      =>  'Supplier .'.$supinfo->supplier_name,
      'Debit'          =>  0,
      'Credit'         =>  $this->input->post('grand_total_price',TRUE),
      'IsPosted'       =>  1,
      'CreateBy'       =>  $receive_by,
      'CreateDate'     =>  $receive_date,
      'IsAppove'       =>  1
    );
      ///Inventory Debit
   $coscr = array(
  'VNo'            =>  $purchase_id,
  'Vtype'          =>  'Purchase',
  'VDate'          =>  $this->input->post('purchase_date',TRUE),
  'COAID'          =>  10107,
  'Narration'      =>  'Inventory Debit For Supplier '.$supinfo->supplier_name,
  'Debit'          =>  $this->input->post('grand_total_price',TRUE),
  'Credit'         =>  0,//purchase price asbe
  'IsPosted'       => 1,
  'CreateBy'       => $receive_by,
  'CreateDate'     => $createdate,
  'IsAppove'       => 1
);
   // Expense for company
     $expense = array(
  'VNo'            => $purchase_id,
  'Vtype'          => 'Purchase',
  'VDate'          => $this->input->post('purchase_date',TRUE),
  'COAID'          => 402,
  'Narration'      => 'Company Credit For  '.$supinfo->supplier_name,
  'Debit'          => $this->input->post('grand_total_price',TRUE),
  'Credit'         => 0,//purchase price asbe
  'IsPosted'       => 1,
  'CreateBy'       => $receive_by,
  'CreateDate'     => $createdate,
  'IsAppove'       => 1
);
         $cashinhand = array(
  'VNo'            =>  $purchase_id,
  'Vtype'          =>  'Purchase',
  'VDate'          =>  $this->input->post('purchase_date',TRUE),
  'COAID'          =>  1020101,
  'Narration'      =>  'Cash in Hand For Supplier '.$supinfo->supplier_name,
  'Debit'          =>  0,
  'Credit'         =>  $paid_amount,
  'IsPosted'       =>  1,
  'CreateBy'       =>  $receive_by,
  'CreateDate'     =>  $createdate,
  'IsAppove'       =>  1
);
$supplierdebit = array(
      'VNo'            =>  $purchase_id,
      'Vtype'          =>  'Purchase',
      'VDate'          =>  $this->input->post('purchase_date',TRUE),
      'COAID'          =>  $sup_coa->HeadCode,
      'Narration'      =>  'Supplier .'.$supinfo->supplier_name,
      'Debit'          =>  $paid_amount,
      'Credit'         =>  0,
      'IsPosted'       =>  1,
      'CreateBy'       =>  $receive_by,
      'CreateDate'     =>  $receive_date,
      'IsAppove'       =>  1
    );
              // bank ledger
$bankc = array(
  'VNo'            =>  $purchase_id,
  'Vtype'          =>  'Purchase',
  'VDate'          =>  $this->input->post('purchase_date',TRUE),
  'COAID'          =>  $bankcoaid,
  'Narration'      =>  'Paid amount for Supplier  '.$supinfo->supplier_name,
  'Debit'          =>  0,
  'Credit'         =>  $paid_amount,
  'IsPosted'       =>  1,
  'CreateBy'       =>  $receive_by,
  'CreateDate'     =>  $createdate,
  'IsAppove'       =>  1
);
// Bank summary for credit
   //new end
   $purchase_id_1 = $this->db->where('chalan_no',$this->input->post('chalan_no',TRUE));
   $q=$this->db->get('purchase_order');
 //echo $this->db->last_query();
   $row = $q->row_array();
 //  echo $row['purchase_order_id'];
  if(!empty($row['purchase_order_id'])){
   $this->session->set_userdata("SESSION_NAME_1",$row['purchase_order_id']);
   $this->db->where('chalan_no', $this->input->post('chalan_no',TRUE));
   $this->db->delete('purchase_order');
    $this->db->insert('purchase_order', $data);
     // echo $this->db->last_query();
  }
  else{
    $this->db->insert('purchase_order', $data);
 //  echo $this->db->last_query();
  }
    $purchase_id = $this->db->select('purchase_order_id')->from('purchase_order')->where('chalan_no',$this->input->post('chalan_no',TRUE))->get()->row()->purchase_order_id;
    //print_r($purchase_id); die();
    $this->session->set_userdata("SESSION_NAME",$purchase_id);
    $this->db->insert('acc_transaction',$coscr);
    $this->db->insert('acc_transaction',$purchasecoatran);
    $this->db->insert('acc_transaction',$expense);
    if($this->input->post('paytype_drop') == "CASH"){
      if(!empty($paid_amount)){
    $this->db->insert('acc_transaction',$cashinhand);
    $this->db->insert('acc_transaction',$supplierdebit);
    }
  }
    else {
        if(!empty($paid_amount)){
      $this->db->insert('acc_transaction',$bankc);
      $this->db->insert('acc_transaction',$supplierdebit);
    }
    }
    $p_name = $this->input->post('prodt',TRUE);
     $p_id = $this->input->post('product_id',TRUE);
      $bundle_no = $this->input->post('bundle_no',TRUE);
       $description = $this->input->post('description',TRUE);
        $thickness = $this->input->post('thickness',TRUE);
         $supplier_block_no = $this->input->post('supplier_block_no',TRUE);
          $supplier_slab_no = $this->input->post('supplier_slab_no',TRUE);
           $gross_width = $this->input->post('gross_width',TRUE);
    $gross_height = $this->input->post('gross_height',TRUE);
    $gross_sq_ft = $this->input->post('gross_sq_ft',TRUE);
    $net_width = $this->input->post('net_width',TRUE);
$net_height=$this->input->post('net_height',TRUE);
    $net_sq_ft = $this->input->post('net_sq_ft',TRUE);
    $cost_sq_ft = $this->input->post('cost_sq_ft',TRUE);
    $cost_sq_slab=$this->input->post('cost_sq_slab',TRUE);
    $sales_amt_sq_ft = $this->input->post('sales_amt_sq_ft',TRUE);
    $sales_slab_amt = $this->input->post('sales_slab_amt',TRUE);
        $weight = $this->input->post('weight',TRUE);
    $origin = $this->input->post('origin',TRUE);
    $total = $this->input->post('total_amt',TRUE);
      $tableid=$this->input->post('tableid',TRUE);
    $this->db->where('purchase_id', $this->session->userdata("SESSION_NAME_1"));
    $this->db->delete('purchase_order_details');
    $rowCount = count($p_id);
 //   echo $this->db->last_query();echo "<br/>";
    for ($i = 0; $i < $rowCount; $i++) {
        $data1 = array(
            'purchase_order_detail_id' => $this->generator(15),
            'purchase_id'        =>  $this->session->userdata("SESSION_NAME"),
            'product_id'         => $p_id[$i],
              'tableid'   => $tableid[$i],
              'product_name'  =>$p_name[$i],
              'bundle_no' =>  $bundle_no[$i],
              'description' => $description[$i],
               'thickness' =>$thickness[$i],
               'supplier_block_no' =>  $supplier_block_no[$i],
               'supplier_slab_no' => $supplier_slab_no[$i],
                'g_width' => $gross_width[$i],
                'g_height' => $gross_height[$i] ,
                'gross_sqft' => $gross_sq_ft[$i] ,
                    'n_width' =>  $net_width[$i],
                      'n_height' => $net_height[$i],
                        'net_sqft' =>  $net_sq_ft[$i],
                          'cost_per_sqft' => $cost_sq_ft[$i] ,
                            'cost_per_slab' =>  $cost_sq_slab[$i],
                             'sales_price_sqft' => $sales_amt_sq_ft[$i] ,
                            'sales_slab_price' =>$sales_slab_amt[$i] ,
                              'weight' =>   $weight[$i] ,
                            'origin' => $origin[$i],
                                'total_amount' =>$total[$i] ,
 'create_by'          => $this->session->userdata('user_id'),
            'status'             => 1
        );
        $this->db->insert('purchase_order_details', $data1);
    }
    return $purchase_id."/".$chalan_no;
}
    public function invoice_dropdown(){
        $this->db->select('chalan_no');
        $this->db->from('product_purchase');
        $this->db->where('create_by',$this->session->userdata('user_id'));
        $query = $this->db->get();
       // echo $this->db->last_query();die();
        return $query->result_array();
    }
    public function shipment_bl_number() {
        $query = $this->db->select('shipment_number')
                ->from('expense_trucking')
                ->where('created_by',$this->session->userdata('user_id'))
                // ->where('supplier_name',$value)
                ->where('status', '1')
                ->get();
    }
         //Ocean Import Entry
    public function ocean_import_entry() {

        $purchase_id = date('YmdHis');

        $p_id = $this->input->post('product_id',TRUE);
        $supplier_id = $this->input->post('supplier_id',TRUE);
        $supinfo =$this->db->select('*')->from('supplier_information')->where('supplier_id',$supplier_id)->get()->row();
        $sup_head = $supinfo->supplier_id.'-'.$supinfo->supplier_name;
        $sup_coa = $this->db->select('*')->from('acc_coa')->where('HeadName',$sup_head)->get()->row();
        $receive_by=$this->session->userdata('user_id');
        $receive_date=date('Y-m-d');
        $createdate=date('Y-m-d H:i:s');
        $paid_amount = $this->input->post('paid_amount',TRUE);
        $due_amount = $this->input->post('due_amount',TRUE);
        $discount = $this->input->post('discount',TRUE);
          $bank_id = $this->input->post('bank_id',TRUE);
        if(!empty($bank_id)){
         $bankname = $this->db->select('bank_name')->from('bank_add')->where('bank_id',$bank_id)->get()->row()->bank_name;
      
         $bankcoaid = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName',$bankname)->get()->row()->HeadCode;
       }else{
           $bankcoaid = '';
       }
$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt'); // valid extensions
$path = 'assets/images/ocean_import/'; // upload directory
if(isset($_FILES['image'])){

$img = $_FILES['image']['name'];
$tmp = $_FILES['image']['tmp_name'];
// get uploaded file's extension
$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
// can upload same image using rand function
$final_image = rand(1000,1000000).$img;
// check's valid format
if(in_array($ext, $valid_extensions)) 
{ 
$path = $path.strtolower($final_image); 
}

echo "<img src='$path' />";
//echo $final_image;die();
}
      $data = array(
            'ocean_import_tracking_id'        => $purchase_id,
            'booking_no'          => $this->input->post('booking_no',TRUE),
            'container_no' =>$this->input->post('container_no',TRUE),
            'seal_no'      =>$this->input->post('seal_no',TRUE),
            'etd'   => $this->input->post('etd',TRUE),
            'eta'   => $this->input->post('eta',TRUE),
            'country_origin' => $this->input->post('country',TRUE),
            'supplier_id'        => $this->input->post('supplier_id',TRUE),
            'shipper' => $this->input->post('supplier_id',TRUE),
            'invoice_date' => $this->input->post('invoice_date',TRUE),
            'bl_shipment_date' => $this->input->post('bl_shipment',TRUE),
            'consignee' => $this->input->post('consignee',TRUE),
            'notify_party' => $this->input->post('notify_party',TRUE),
            'vessel' => $this->input->post('vessel',TRUE),
            'voyage_no' =>$this->input->post('voyage_no',TRUE),
            'port_of_loading' => $this->input->post('port_of_loading',TRUE),
            'port_of_discharge' => $this->input->post('port_of_discharge',TRUE),
            'place_of_delivery' =>$this->input->post('place_of_delivery',TRUE),
            'freight_forwarder' =>$this->input->post('freight_forwarder',TRUE),
            'particular'   => $this->input->post('particulars',TRUE),
          //  'country_origin' => $this->input->post('country_of_origin',TRUE),
            'remarks'              => $this->input->post('remark',TRUE),
            'status'             => 1,
            'attachment'   =>     $path,
            'create_by'       =>  $this->session->userdata('user_id'),
            );
//print_r($data);die();

            $purchase_id_1 = $this->db->where('booking_no',$this->input->post('booking_no',TRUE));
            $q=$this->db->get('ocean_import_tracking');
            $row = $q->row_array();
        if(!empty($row['booking_no'])){
            $this->session->set_userdata("ocean_import_1",$row['booking_no']);
          
            $this->db->where('booking_no',$this->input->post('booking_no',TRUE));
     
            $this->db->delete('ocean_import_tracking');
          //  echo $this->db->last_query();
            $this->db->insert('ocean_import_tracking', $data);
      //    echo $this->db->last_query();
        }   
        else{
        $this->db->insert('ocean_import_tracking', $data);
     //  echo $this->db->last_query();
        }
    
           
        
      //    $query= $this->db->insert('ocean_import_tracking', $data);
     

       return $purchase_id."/".$this->input->post('booking_no',TRUE);
    }

        public function voucher_no()
    {
      return  $data = $this->db->select("chalan_no as voucher")
            ->from('purchase_order') 
            ->like('chalan_no', 'PO', 'after')
            ->order_by('ID','desc')
            ->get()
            ->result_array();
           
    }
        public function packing_voucher_no()
    {
      return  $data = $this->db->select("invoice_no as voucher")
            ->from('expense_packing_list') 
            ->like('invoice_no', 'PL', 'after')
            ->order_by('ID','desc')
            ->get()
            ->result_array();
           
    }

            public function trucking_voucher_no()
    {
      return  $data = $this->db->select("invoice_no as voucher")
            ->from('expense_trucking') 
            ->like('invoice_no', 'T', 'after')
            ->order_by('ID','desc')
            ->get()
            ->result_array();
           
    }


           //Trucking 
    //Entry
    public function trucking_entry() {

        $purchase_id = date('YmdHis');
        $invoice_no= $this->input->post('invoice_no',TRUE);
        $p_id = $this->input->post('product_id',TRUE);
      
      //  $supplier_id = $this->input->post('supplier_id',TRUE);
      //  $supinfo =$this->db->select('*')->from('supplier_information')->where('supplier_id',$supplier_id)->get()->row();
      //  $sup_head = $supinfo->supplier_id.'-'.$supinfo->supplier_name;
      //  $sup_coa = $this->db->select('*')->from('acc_coa')->where('HeadName',$sup_head)->get()->row();
        $receive_by=$this->session->userdata('user_id');
        $receive_date=date('Y-m-d');
        $createdate=date('Y-m-d H:i:s');
        $paid_amount = $this->input->post('paid_amount',TRUE);
        $due_amount = $this->input->post('due_amount',TRUE);
        $discount = $this->input->post('discount',TRUE);
          $bank_id = $this->input->post('bank_id',TRUE);
        if(!empty($bank_id)){
         $bankname = $this->db->select('bank_name')->from('bank_add')->where('bank_id',$bank_id)->get()->row()->bank_name;
      
         $bankcoaid = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName',$bankname)->get()->row()->HeadCode;
       }else{
           $bankcoaid = '';
       }
       $payment_id=$this->input->post('payment_id');
       $shipment_number = $this->input->post('shipment_bl_number',TRUE);
   $data = array(
    'payment_id' => $payment_id,
            'trucking_id'        => $purchase_id,
            'create_by'       =>  $this->session->userdata('user_id'),
            'invoice_no' => $this->input->post('invoice_no',TRUE),
            'invoice_date' =>$this->input->post('invoice_date',TRUE),
            'bill_to'      =>$this->input->post('bill_to',TRUE),
            'total_amt' => $this->input->post('total',TRUE),
            'customer_gtotal' =>$this->input->post('customer_gtotal',TRUE),
            'tax' => $this->input->post('tax_details',TRUE),
            'amt_paid'    => $this->input->post('amount_paid',TRUE),
            'balance'    => $this->input->post('balance',TRUE),
            'shipment_company'   => $this->input->post('shipment_company',TRUE),
            'shipment_number' => $this->input->post('shipment_bl_number',TRUE),
            'container_pickup_date'   => $this->input->post('container_pick_up_date',TRUE),
            'container_no'   => $this->input->post('container_number',TRUE),
            'delivery_date' => $this->input->post('delivery_date',TRUE),
            'grand_total_amount' => $this->input->post('gtotal',TRUE),
            'status'             => 1,
            'remarks'             => $this->input->post('remarks',TRUE)
         

          
        );



        $purchase_id_1 = $this->db->where('invoice_no',$this->input->post('invoice_no',TRUE));
        $q=$this->db->get('expense_trucking');
        $row = $q->row_array();
    if(!empty($row['trucking_id'])){
        $this->session->set_userdata("trucking_1",$row['trucking_id']);
      
        $this->db->where('invoice_no',$this->input->post('invoice_no',TRUE));
 
        $this->db->delete('expense_trucking');
        $this->db->insert('expense_trucking', $data);
       // echo $this->db->last_query(); 
       
   }   
    else{
    $this->db->insert('expense_trucking', $data);
    //echo $this->db->last_query();

  
    }
       $purchase_id = $this->db->select('trucking_id')->from('expense_trucking')->where('invoice_no',$this->input->post('invoice_no',TRUE))->get()->row()->trucking_id;
    
       $this->session->set_userdata("trucking_2",$purchase_id);


       if($this->input->post('paytype') == 2){
          if(!empty($paid_amount)){
        $this->db->insert('acc_transaction',$bankc);
       
        $this->db->insert('acc_transaction',$supplierdebit);
      }
        }
        if($this->input->post('paytype') == 1){
          if(!empty($paid_amount)){
        $this->db->insert('acc_transaction',$cashinhand);
        $this->db->insert('acc_transaction',$supplierdebit); 
        }    
        }       

        $trucking_date = $this->input->post('trucking_date',TRUE);
        $rate = $this->input->post('product_rate',TRUE);
        $quantity = $this->input->post('product_quantity',TRUE);
        $description = $this->input->post('description',TRUE);
        $pro_no =  $this->input->post('pro_no',TRUE);
        $t_price = $this->input->post('total_price',TRUE);
      
        $rowCount = count($this->input->post('trucking_date',TRUE));

        for ($i = 0; $i < $rowCount; $i++) {
            $t_date = $this->input->post('trucking_date',TRUE);
            $trucking_rate = $this->input->post('product_rate',TRUE);
            $quantity = $this->input->post('product_quantity',TRUE);
            $trucking_description = $this->input->post('description',TRUE);
            $trucking_pro_no =  $this->input->post('pro_no',TRUE);
            $t_price = $this->input->post('total_price',TRUE);
          $trucking_date = $t_date[$i];
                $product_quantity = $quantity[$i];
                $description = $trucking_description[$i];
                $product_rate =  $trucking_rate[$i];
                $pro_no = $trucking_pro_no[$i];
                $total =  $t_price[$i];
                $data1 = array(
                    'expense_trucking_detail_id' => $this->generator(15),
                    'expense_trucking_id'        =>  $this->session->userdata("trucking_2"),
                    'trucking_date' =>$trucking_date,
                   
                    'qty'           => $product_quantity,
                    'description'               => $description,
                    'rate'              =>  $product_rate ,
                  
                    'pro_no_reference'           => $pro_no,
                    'total'       => $total,
                    'create_by'          =>  $this->session->userdata('user_id'),
                    'status'             => 1
                );
             
            $this->db->where('expense_trucking_id', $this->session->userdata("trucking_1"));
              $this->db->delete('expense_trucking_details');

              $this->db->insert('expense_trucking_details', $data1);
           //   echo $this->db->last_query();
          //  if (!empty($quantity)) {
               
          //  }
   
    }
       // echo $rowCount;

        return $purchase_id."/".$invoice_no;
    }
    //Retrieve purchase Edit Data
    public function retrieve_purchase_editdata($purchase_id) {

        $this->db->select('a.*,b.*,c.*,d.supplier_id,d.supplier_name');
        $this->db->from('product_purchase a');
        $this->db->join('product_purchase_details b', 'b.purchase_id =a.purchase_id');
        $this->db->join('product_information c', 'c.product_id =b.product_id');
        $this->db->join('supplier_information d', 'd.supplier_id = a.supplier_id');
       $this->db->where('a.create_by',$this->session->userdata('user_id'));
        $this->db->where('a.purchase_id', $purchase_id);
       // $this->db->order_by('a.purchase_details', 'asc');
        $query = $this->db->get();

    //   echo $this->db->last_query(); die();
  
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
      
    }
    
    public function retrieve_purchasedata($purchase_id)
    {
        $this->db->select('*');
        $this->db->from('product_purchase');
        $this->db->where('purchase_id', $purchase_id);
        $this->db->where('create_by',$this->session->userdata('user_id'));
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }


       //Retrieve purchase order Edit Data
    public function retrieve_purchase_order_editdata($purchase_id) {
        $this->db->select('a.*,
                        b.*,
                        c.product_id,
                        c.product_name,
                        c.product_model,
                        d.supplier_id,
                        d.supplier_name'
        );
        $this->db->from('purchase_order a');
        $this->db->join('purchase_order_details b', 'b.purchase_id =a.purchase_order_id');
        $this->db->join('product_information c', 'c.product_id =b.product_id');
        $this->db->join('supplier_information d', 'd.supplier_id = a.supplier_id');
        $this->db->where('a.create_by',$this->session->userdata('user_id'));
        $this->db->where('a.purchase_order_id', $purchase_id);
        $this->db->order_by('a.purchase_details', 'asc');
        $query = $this->db->get();
    //  echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
     
        return true;
    }


       //Retrieve ocean import tracking Edit Data
    public function retrieve_ocean_import_tracking_editdata($purchase_id) {
        $this->db->select('a.*,b.*');
        $this->db->from('ocean_import_tracking a');
        $this->db->join('supplier_information b', 'b.supplier_id =a.supplier_id');
        $this->db->where('a.create_by',$this->session->userdata('user_id'));
        $this->db->where('a.ocean_import_tracking_id', $purchase_id);
        // $this->db->order_by('a.purchase_details', 'asc');
        $query = $this->db->get();
      
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return true;
    }

public function pro_number_exp(){
        $this->db->select('chalan_no');
        $this->db->from('product_purchase');
        $this->db->where('create_by',$this->session->userdata('user_id'));
        $query = $this->db->get();
    //    echo $this->db->last_query();die();
        return $query->result_array();
    }
        //Retrieve trucking Edit Data
    public function retrieve_trucking_editdata($purchase_id) {
       $this->db->select('a.*,
                        b.*,
                        c.product_id,
                        c.product_name,
                        c.product_model,
                        d.supplier_id,
                        d.supplier_name'
        );
        $this->db->from('expense_trucking a');
        $this->db->join('expense_trucking_details b', 'b.expense_trucking_id =a.trucking_id');
        $this->db->join('product_information c', 'c.product_id =b.product_id');
        $this->db->join('customer_information d', 'd.customer_id = a.bill_to');
        $this->db->where('a.create_by',$this->session->userdata('user_id'));
        $this->db->where('a.trucking_id', $purchase_id);
       // $this->db->order_by('a.purchase_details', 'asc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }
         //Retrieve trucking Edit Data
    public function retrieve_packing_editdata($purchase_id) {
       $this->db->select('a.*,
                        b.*,c.*
                   '
        );
        $this->db->from('expense_packing_list a');
        $this->db->join('expense_packing_list_detail b', 'b.expense_packing_id =a.expense_packing_id');
        $this->db->join('product_information c', 'c.product_id =b.product_id');
  
        $this->db->where('b.create_by',$this->session->userdata('user_id'));
        $this->db->where('b.expense_packing_id', $purchase_id);
       // $this->db->order_by('a.purchase_details', 'asc');
        $query = $this->db->get();
     // echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
       
    }

public function getsupplier_data($value){
        $this->db->select('*');
        $this->db->from('supplier_information');
        $this->db->where('supplier_id', $value);
        // echo $this->db->last_query(); die();
        $query = $this->db->get()->result();
        return $query;
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
    public function update_purchase() {
          $purchase_id  = $this->input->post('purchase_id',TRUE);
          $paid_amount  = $this->input->post('paid_amount',TRUE);
          $due_amount   = $this->input->post('due_amount',TRUE);
          $bank_id      = $this->input->post('bank_id',TRUE);
        if(!empty($bank_id)){
       $bankname = $this->db->select('bank_name')->from('bank_add')->where('bank_id',$bank_id)->get()->row()->bank_name;
    
       $bankcoaid = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName',$bankname)->get()->row()->HeadCode;
   }
        $p_id = $this->input->post('product_id',TRUE);
        $supplier_id = $this->input->post('supplier_id',TRUE);
        $supinfo =$this->db->select('*')->from('supplier_information')->where('supplier_id',$supplier_id)->get()->row();
        $sup_head = $supinfo->supplier_id.'-'.$supinfo->supplier_name;
        $sup_coa = $this->db->select('*')->from('acc_coa')->where('HeadName',$sup_head)->get()->row();
       $receive_by=$this->session->userdata('user_id');
        $receive_date=date('Y-m-d');
        $createdate=date('Y-m-d H:i:s');


        $data = array(
            'purchase_id'        => $purchase_id,
            'chalan_no'          => $this->input->post('chalan_no',TRUE),
            'supplier_id'        => $this->input->post('supplier_id',TRUE),
            'grand_total_amount' => $this->input->post('total',TRUE),
            'total_discount'     => $this->input->post('discount',TRUE),
            'purchase_date'      => $this->input->post('purchase_date',TRUE),
            'purchase_details'   => $this->input->post('purchase_details',TRUE),
            'paid_amount'        => $paid_amount,
            'due_amount'         => $due_amount,
            'bank_id'           =>  $this->input->post('bank_id',TRUE),
            'payment_type'       =>  $this->input->post('paytype',TRUE),
        );


         $cashinhand = array(
      'VNo'            =>  $purchase_id,
      'Vtype'          =>  'Purchase',
      'VDate'          =>  $this->input->post('purchase_date',TRUE),
      'COAID'          =>  1020101,
      'Narration'      =>  'Cash in Hand For Supplier '.$supinfo->supplier_name,
      'Debit'          =>  0,
      'Credit'         =>  $paid_amount,
      'IsPosted'       =>  1,
      'CreateBy'       =>  $receive_by,
      'CreateDate'     =>  $createdate,
      'IsAppove'       =>  1
    ); 
                  // bank ledger
 $bankc = array(
      'VNo'            =>  $purchase_id,
      'Vtype'          =>  'Purchase',
      'VDate'          =>  $this->input->post('purchase_date',TRUE),
      'COAID'          =>  'test',
      'Narration'      =>  'Paid amount for Supplier  '.$supinfo->supplier_name,
      'Debit'          =>  0,
      'Credit'         =>  $paid_amount,
      'IsPosted'       =>  1,
      'CreateBy'       =>  $receive_by,
      'CreateDate'     =>  $createdate,
      'IsAppove'       =>  1
    ); 

        
         $purchasecoatran = array(
          'VNo'            =>  $purchase_id,
          'Vtype'          =>  'Purchase',
          'VDate'          =>  $this->input->post('purchase_date',TRUE),
          'COAID'          =>  $sup_coa->HeadCode,
          'Narration'      =>  'Supplier -'.$supinfo->supplier_name,
          'Debit'          =>  0,
          'Credit'         =>  $this->input->post('grand_total_price',TRUE),
          'IsPosted'       =>  1,
          'CreateBy'       =>  $receive_by,
          'CreateDate'     =>  $receive_date,
          'IsAppove'       =>  1
        ); 
          ///Inventory credit
       $coscr = array(
      'VNo'            =>  $purchase_id,
      'Vtype'          =>  'Purchase',
      'VDate'          =>  $this->input->post('purchase_date',TRUE),
      'COAID'          =>  10107,
      'Narration'      =>  'Inventory Devit Supplier '.$supinfo->supplier_name,
      'Debit'          =>  $this->input->post('grand_total_price',TRUE),
      'Credit'         =>  0,//purchase price asbe
      'IsPosted'       => 1,
      'CreateBy'       => $receive_by,
      'CreateDate'     => $createdate,
      'IsAppove'       => 1
    ); 
          // Expense for company
         $expense = array(
      'VNo'            => $purchase_id,
      'Vtype'          => 'Purchase',
      'VDate'          => $this->input->post('purchase_date',TRUE),
      'COAID'          => 402,
      'Narration'      => 'Company Credit For Supplier'.$supinfo->supplier_name,
      'Debit'          => $this->input->post('grand_total_price',TRUE),
      'Credit'         => 0,//purchase price asbe
      'IsPosted'       => 1,
      'CreateBy'       => $receive_by,
      'CreateDate'     => $createdate,
      'IsAppove'       => 1
    ); 

         $supplier_debit = array(
          'VNo'            =>  $purchase_id,
          'Vtype'          =>  'Purchase',
          'VDate'          =>  $this->input->post('purchase_date',TRUE),
          'COAID'          =>  $sup_coa->HeadCode,
          'Narration'      =>  'Supplier . '.$supinfo->supplier_name,
          'Debit'          =>  $paid_amount,
          'Credit'         =>  0,
          'IsPosted'       =>  1,
          'CreateBy'       =>  $receive_by,
          'CreateDate'     =>  $receive_date,
          'IsAppove'       =>  1
        ); 

        if ($purchase_id != '') {
            $this->db->where('purchase_id', $purchase_id);
            $this->db->update('product_purchase', $data);
            //account transaction update
             $this->db->where('VNo', $purchase_id);
            $this->db->delete('acc_transaction');
        
            //supplier ledger update

            $this->db->where('purchase_id', $purchase_id);
            $this->db->delete('product_purchase_details');
        }

        $this->db->insert('acc_transaction',$coscr);
        $this->db->insert('acc_transaction',$purchasecoatran);  
        $this->db->insert('acc_transaction',$expense);
        if($this->input->post('paytype') == 2){
          if(!empty($paid_amount)){
        $this->db->insert('acc_transaction',$bankc);
        $this->db->insert('acc_transaction',$supplier_debit);
      }
        }
        if($this->input->post('paytype') == 1){
          if(!empty($paid_amount)){
        $this->db->insert('acc_transaction',$cashinhand);
        $this->db->insert('acc_transaction',$supplier_debit); 
        }    
        }       

        $rate = $this->input->post('product_rate',TRUE);
        $p_id = $this->input->post('product_id',TRUE);
        $description = $this->input->post('description',TRUE);
        // print_r($description);die();

        $quantity = $this->input->post('product_quantity',TRUE);
        $t_price = $this->input->post('total_price',TRUE);

        $discount = $this->input->post('discount',TRUE);

        for ($i = 0, $n = count($p_id); $i < $n; $i++) {
            $product_quantity = $quantity[$i];
            $product_rate = $rate[$i];
            $product_id = $p_id[$i];
            $total_price = $t_price[$i];
            $desc = $description[$i];

            $disc = 0;

            $data1 = array(
                'purchase_detail_id' => $this->generator(15),
                'purchase_id'        => $purchase_id,
                'product_id'         => $product_id,
                'quantity'           => $product_quantity,
                'rate'               => $product_rate,
                'total_amount'       => $total_price,
                'discount'           => $disc,
                'description'       => $desc,
                'status'=> 1,
                'create_by' => $this->session->userdata('user_id'),
            );


            if (($quantity)) {

                $this->db->insert('product_purchase_details', $data1);
            }
        }
       
    }

public function get_purchases_invoice($invoice_no='')
{

    $this->db->where('purchase_order_id',$invoice_no);
    $this->db->select('po.*,si.* ,po.created_by AS create');
    $this->db->from('purchase_order po');
    $this->db->join('supplier_information si', 'po.supplier_id = si.supplier_id'); 
    $query = $this->db->get();
    return $query->result_array();
    

}
public function get_purchases_order($invoice_no)
{

   
    $this->db->where('purchase_id',$invoice_no);
    $this->db->select('po.*,pi.*');
    $this->db->from('purchase_order_details po');
    $this->db->join('product_information pi', 'po.product_id = pi.product_id'); 
    $query = $this->db->get();
    return $query->result_array();

}
public function get_supplier($purchase_id='')
{
   $sql= 'SELECT b.* FROM `purchase_order` a JOIN supplier_information b on a.supplier_id=b.supplier_id where a.purchase_order_id='.$purchase_id;
   $query=$this->db->query($sql);
   if ($query->num_rows() > 0) {
            return $query->result_array();
        }


}
public function company_info()
{
    $this->db->select('c.*,u.*');
    $this->db->from('company_information c');
    $this->db->join('user_login u', 'u.cid = c.company_id'); 
    $this->db->where('u.user_id',$_SESSION['user_id']);
    $query = $this->db->get();

    
    

   if ($query->num_rows() > 0) {
            return $query->result_array();
        }
}

 


 public function update_purchase_order() {
            // echo "<pre>";
            //print_r($this->input->post('slabs')); die;

          $purchase_id  = $this->input->post('purchase_id',TRUE);
          $paid_amount  = $this->input->post('paid_amount',TRUE);
          $due_amount   = $this->input->post('due_amount',TRUE);
          $bank_id      = $this->input->post('bank_id',TRUE);
        if(!empty($bank_id)){
       $bankname = $this->db->select('bank_name')->from('bank_add')->where('bank_id',$bank_id)->get()->row()->bank_name;
    
       $bankcoaid = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName',$bankname)->get()->row()->HeadCode;
   }
        $p_id = $this->input->post('product_id',TRUE);
        $supplier_id = $this->input->post('supplier_id',TRUE);
        $supinfo =$this->db->select('*')->from('supplier_information')->where('supplier_id',$supplier_id)->get()->row();
        $sup_head = $supinfo->supplier_id.'-'.$supinfo->supplier_name;
        $sup_coa = $this->db->select('*')->from('acc_coa')->where('HeadName',$sup_head)->get()->row();
       $receive_by=$this->session->userdata('user_id');
        $receive_date=date('Y-m-d');
        $createdate=date('Y-m-d H:i:s');




        $data = array(
            'purchase_order_id'        => $purchase_id,
            'chalan_no'          => $this->input->post('chalan_no',TRUE),
            'supplier_id'        => $this->input->post('supplier_id',TRUE),
            'grand_total_amount' => $this->input->post('grand_total_price',TRUE),
            'total_discount'     => $this->input->post('discount',TRUE),
            'purchase_date'      => $this->input->post('purchase_date',TRUE),
            'purchase_details'   => $this->input->post('purchase_details',TRUE),
            'grand_total_amount'              => $this->input->post('total',TRUE),
        );
      $cashinhand = array(
      'VNo'            =>  $purchase_id,
      'Vtype'          =>  'Purchase',
      'VDate'          =>  $this->input->post('purchase_date',TRUE),
      'COAID'          =>  1020101,
      'Narration'      =>  'Cash in Hand For Supplier '.$supinfo->supplier_name,
      'Debit'          =>  0,
      'Credit'         =>  $paid_amount,
      'IsPosted'       =>  1,
      'CreateBy'       =>  $receive_by,
      'CreateDate'     =>  $createdate,
      'IsAppove'       =>  1
    ); 
                  // bank ledger
 $bankc = array(
      'VNo'            =>  $purchase_id,
      'Vtype'          =>  'Purchase',
      'VDate'          =>  $this->input->post('purchase_date',TRUE),
      'COAID'          =>  $bankcoaid,
      'Narration'      =>  'Paid amount for Supplier  '.$supinfo->supplier_name,
      'Debit'          =>  0,
      'Credit'         =>  $paid_amount,
      'IsPosted'       =>  1,
      'CreateBy'       =>  $receive_by,
      'CreateDate'     =>  $createdate,
      'IsAppove'       =>  1
    ); 

        
         $purchasecoatran = array(
          'VNo'            =>  $purchase_id,
          'Vtype'          =>  'Purchase',
          'VDate'          =>  $this->input->post('purchase_date',TRUE),
          'COAID'          =>  $sup_coa->HeadCode,
          'Narration'      =>  'Supplier -'.$supinfo->supplier_name,
          'Debit'          =>  0,
          'Credit'         =>  $this->input->post('grand_total_price',TRUE),
          'IsPosted'       =>  1,
          'CreateBy'       =>  $receive_by,
          'CreateDate'     =>  $receive_date,
          'IsAppove'       =>  1
        ); 
          ///Inventory credit
       $coscr = array(
      'VNo'            =>  $purchase_id,
      'Vtype'          =>  'Purchase',
      'VDate'          =>  $this->input->post('purchase_date',TRUE),
      'COAID'          =>  10107,
      'Narration'      =>  'Inventory Devit Supplier '.$supinfo->supplier_name,
      'Debit'          =>  $this->input->post('grand_total_price',TRUE),
      'Credit'         =>  0,//purchase price asbe
      'IsPosted'       => 1,
      'CreateBy'       => $receive_by,
      'CreateDate'     => $createdate,
      'IsAppove'       => 1
    ); 
          // Expense for company
         $expense = array(
      'VNo'            => $purchase_id,
      'Vtype'          => 'Purchase',
      'VDate'          => $this->input->post('purchase_date',TRUE),
      'COAID'          => 402,
      'Narration'      => 'Company Credit For Supplier'.$supinfo->supplier_name,
      'Debit'          => $this->input->post('grand_total_price',TRUE),
      'Credit'         => 0,//purchase price asbe
      'IsPosted'       => 1,
      'CreateBy'       => $receive_by,
      'CreateDate'     => $createdate,
      'IsAppove'       => 1
    ); 

         $supplier_debit = array(
          'VNo'            =>  $purchase_id,
          'Vtype'          =>  'Purchase',
          'VDate'          =>  $this->input->post('purchase_date',TRUE),
          'COAID'          =>  $sup_coa->HeadCode,
          'Narration'      =>  'Supplier . '.$supinfo->supplier_name,
          'Debit'          =>  $paid_amount,
          'Credit'         =>  0,
          'IsPosted'       =>  1,
          'CreateBy'       =>  $receive_by,
          'CreateDate'     =>  $receive_date,
          'IsAppove'       =>  1
        ); 

        if ($purchase_id != '') {

            $this->db->where('purchase_order_id', $purchase_id);
            $this->db->update('purchase_order', $data);
            //account transaction update
             $this->db->where('VNo', $purchase_id);
            $this->db->delete('acc_transaction');
        
            //supplier ledger update

            $this->db->where('purchase_id', $purchase_id);
            $this->db->delete('purchase_order_details');
        }

        $this->db->insert('acc_transaction',$coscr);
        $this->db->insert('acc_transaction',$purchasecoatran);  
        $this->db->insert('acc_transaction',$expense);
        if($this->input->post('paytype') == 2){
          if(!empty($paid_amount)){
        $this->db->insert('acc_transaction',$bankc);
        $this->db->insert('acc_transaction',$supplier_debit);
      }
        }
        if($this->input->post('paytype') == 1){
          if(!empty($paid_amount)){
        $this->db->insert('acc_transaction',$cashinhand);
        $this->db->insert('acc_transaction',$supplier_debit); 
        }    
        }       

        $rate = $this->input->post('product_rate',TRUE);
        $p_id = $this->input->post('product_id',TRUE);

        $quantity = $this->input->post('product_quantity',TRUE);
        $t_price = $this->input->post('total_price',TRUE);

        $discount = $this->input->post('discount',TRUE);

        $slabs_po = $this->input->post('slabs',TRUE);

        for ($i = 0, $n = count($p_id); $i < $n; $i++) {
            $product_quantity = $quantity[$i];
            $product_rate = $rate[$i];
            $product_id = $p_id[$i];
            $total_price = $t_price[$i];
            $slabs = $slabs_po[$i];
            $disc = $discount[$i];

            $data1 = array(
                'purchase_order_detail_id' => $this->generator(15),
                'purchase_id'        => $purchase_id,
                'product_id'         => $product_id,
                'quantity'           => $product_quantity,
                'rate'               => $product_rate,
                'create_by'          =>$this->session->userdata('user_id'),
                'total_amount'       => $total_price,
                'discount'           => $disc,
                'slabs'           => $slabs,
                'create_by'          =>  $this->session->userdata('user_id'),
                'status'             => 1
            );

            //print_r($data1); 


            if (($quantity)) {

                $this->db->insert('purchase_order_details', $data1);
            }
        }
        return true;
    }

    // Delete purchase Item

    public function purchase_search_list($cat_id, $company_id) {
        $this->db->select('a.*,b.sub_category_name,c.category_name');
        $this->db->from('purchases a');
        $this->db->join('purchase_sub_category b', 'b.sub_category_id = a.sub_category_id');
        $this->db->join('purchase_category c', 'c.category_id = b.category_id');
        $this->db->where('a.create_by',$this->session->userdata('user_id'));
        $this->db->where('a.sister_company_id', $company_id);
        $this->db->where('c.category_id', $cat_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    //Retrieve purchase_details_data
  
    public function purchase_details_data($purchase_id) {
        $this->db->select('a.*,b.*,c.*,d.*');
        $this->db->from('product_purchase a');
        $this->db->join('supplier_information b', 'b.supplier_id = a.supplier_id');
        $this->db->join('product_purchase_details c', 'c.purchase_id = a.purchase_id');
        $this->db->join('product_information d', 'd.product_id = c.product_id');
        // $this->db->join('product_purchase e', 'e.purchase_id = c.purchase_id');
        $this->db->where('c.purchase_id', $purchase_id);
      //  $this->db->group_by('d.product_id');
        $query = $this->db->get();
      // echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }
    public function get_po_details($po_num) {
        $this->db->select('a.*,b.*,c.*');
        $this->db->from('purchase_order a');
            $this->db->join('purchase_order_details b' , 'a.purchase_order_id=b.purchase_id');
            $this->db->join('supplier_information c', 'c.supplier_id = a.supplier_id');
        $this->db->where('a.chalan_no' ,$po_num);
            $query = $this->db->get();
         //  $query = $this->db->query($sql);
       
           if ($query->num_rows() > 0) {
               return $query->result_array();
           }

    }



    public function packing_details_data($expense_packing_id) {
       // $sql='SELECT * FROM `expense_packing_list_detail` a JOIN product_information b on b.product_id=a.product_id where a.expense_packing_id="'.$purchase_id.'"';
        // $sql='SELECT * FROM expense_packing_list as a JOIN expense_packing_list_detail as b ON b.product_id = a.product_id WHERE a.expense_packing_id = '.$expense_packing_id;
  //$sql = 'SELECT * FROM expense_packing_list as a JOIN expense_packing_list_detail as ac JOIN product_information as b ON b.product_id = a.product_id WHERE a.expense_packing_id = '.$expense_packing_id;
        $this->db->select('*');
     $this->db->from('expense_packing_list a');
         $this->db->join('expense_packing_list_detail ac' , 'a.expense_packing_id=ac.expense_packing_id');
         $this->db->join('product_information b' , 'b.product_id = ac.product_id');
     $this->db->where('a.expense_packing_id' , $expense_packing_id);
     $this->db->order_by("bundle_ref", "asc");
         $query = $this->db->get();
      //  $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }

   public function get_po_num() {
        $this->db->select('chalan_no');
        $this->db->from('purchase_order');
      
        $this->db->where('create_by', $this->session->userdata('user_id'));
     
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }
      //Ocean Import Tracking details_data
    public function ocean_import_tracking_details_data($purchase_id) {
        $this->db->select('*');
        $this->db->from('ocean_import_tracking a');
        $this->db->join('supplier_information b', 'b.supplier_id = a.supplier_id');
        $this->db->where('a.ocean_import_tracking_id', $purchase_id);
     
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    //This function will check the product & supplier relationship.
    public function product_supplier_check($product_id, $supplier_id) {
        $this->db->select('*');
        $this->db->from('supplier_product');
        $this->db->where('created_by',$this->session->userdata('user_id'));
        $this->db->where('product_id', $product_id);
        $this->db->where('supplier_id', $supplier_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return true;
        }
        return 0;
    }

    //This function is used to Generate Key
    public function generator($lenth) {
        $number = array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "N", "M", "O", "P", "Q", "R", "S", "U", "V", "T", "W", "X", "Y", "Z", "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z", "1", "2", "3", "4", "5", "6", "7", "8", "9", "0");

        for ($i = 0; $i < $lenth; $i++) {
            $rand_value = rand(0, 61);
            $rand_number = $number["$rand_value"];

            if (empty($con)) {
                $con = $rand_number;
            } else {
                $con = "$con" . "$rand_number";
            }
        }
        return $con;
    }

    public function purchase_delete($purchase_id = null) {
        //Delete product_purchase table
        $this->db->where('VNo', $purchase_id);
        $this->db->delete('acc_transaction');
        //Delete acc transaction
        $this->db->where('purchase_id', $purchase_id);
        $this->db->delete('product_purchase');
        //Delete product_purchase_details table
        $this->db->where('purchase_id', $purchase_id);
        $this->db->delete('product_purchase_details');
        return true;
        if ($this->db->affected_rows()) {
            return true;
        } else {
            return false;
        }
    }

//purchase list date to date
    public function purchase_list_date_to_date($start, $end) {
        $this->db->select('a.*,b.supplier_name');
        $this->db->from('product_purchase a');
        $this->db->join('supplier_information b', 'b.supplier_id = a.supplier_id');
        $this->db->where('a.create_by',$this->session->userdata('user_id'));
        $this->db->order_by('a.purchase_date', 'desc');
        $this->db->where('a.purchase_date >=', $start);
        $this->db->where('a.purchase_date <=', $end);
        $query = $this->db->get();

        $last_query = $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }
// purchase list for pdf
     public function pdf_purchase_list() {
        $this->db->select('a.*,b.supplier_name');
        $this->db->from('product_purchase a');
        $this->db->join('supplier_information b', 'b.supplier_id = a.supplier_id');
        $this->db->where('a.create_by',$this->session->userdata('user_id'));
        $this->db->order_by('a.purchase_date', 'desc');
        $query = $this->db->get();

        $last_query = $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }
    public function get_invoice_design()
    {
        $uid=$_SESSION['user_id'];
    $sql='select * from invoice_design where uid="'.$uid.'"';
     $query=$this->db->query($sql); 

        if ($query->num_rows() > 0) {

            return $query->result_array();

        }
        return false;
    }
    public function invoice_detail_edit($purchase_id)
    {
        $sql='SELECT * FROM `expense_packing_list_detail` WHERE expense_packing_id="'.$purchase_id.'"';
       
        $query=$this->db->query($sql);
   
         if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }

    public function invoice_product_edit($purchase_id)
    {
        $sql='SELECT * FROM `expense_packing_list_detail` a JOIN product_information b on b.product_id=a.product_id where a.expense_packing_id="'.$purchase_id.'"';

        $query=$this->db->query($sql);
         if ($query->num_rows() > 0) {
            return $query->result_array();
        }

    }
    public function invoice_edit($purchase_id)
    {
        $sql='SELECT * FROM `expense_packing_list` WHERE expense_packing_id="'.$purchase_id.'"';
      
        $query=$this->db->query($sql);
    
         if ($query->num_rows() > 0) {
            return $query->result_array();
        }

    }
    // csv upload purchase list
        public function purchase_csv_file() {
         $query = $this->db->select('a.chalan_no,a.purchase_id,b.supplier_name,a.purchase_date,a.grand_total_amount')
                ->from('product_purchase a')
                ->join('supplier_information b', 'b.supplier_id = a.supplier_id', 'left')
                ->where('create_by',$this->session->userdata('user_id'))
                ->order_by('a.purchase_date','desc')
                ->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

   
   
   public function editAlldataserviceprovider()
    {
       $user_id = $this->session->userdata('user_id');

        $sql="SELECT * FROM `tax_information` WHERE (`status_type` = 'sales' OR `status_type` = 'Both') AND `created_by` = $user_id";

        $query = $this->db->query($sql);
        
        // echo $this->db->last_query();

        if ($query->num_rows() > 0) {

            return $query->result_array();

        }

        return false;
    }


}
