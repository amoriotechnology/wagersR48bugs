 <?php
error_reporting(1);
if (!defined('BASEPATH'))

    exit('No direct script access allowed');



class Invoices extends CI_Model {



    public function __construct() {

        parent::__construct();

        $this->load->library('auth');

        $this->load->library('lcustomer');

        $this->load->library('Smsgateway');

        $this->load->library('session');

        $this->load->model('Customers');

        $this->auth->check_admin_auth();

    }
    
    public function fetchCompanydata(){
        $this->db->select('a.*,b.*');
        $this->db->from('company_information a');
        $this->db->join('bill_history b', 'a.company_id=b.company_id');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }

    public function currenyDetails()
    {
        $this->db->select('a.*,b.*');
        $this->db->from('company_information a');
        $this->db->join('currency_tbl b', 'a.currency=b.currency_name');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }
    
    
        public function get_agent_data(){
        $this->db->select('*');
        $this->db->from('agent');
        $this->db->where('create_by',$this->session->userdata('user_id'));
        $query = $this->db->get();
         return $query->result_array();
    }
public function employee_id_get(){
        $this->db->select('*');
        $this->db->from('employee_history');
        $this->db->where('create_by',$this->session->userdata('user_id'));
        $query = $this->db->get();
         return $query->result_array();
    }
    public function user_id_get(){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('create_by',$this->session->userdata('user_id'));
        $query = $this->db->get();
        
      //  echo $this->db->last_query();die();
        
         return $query->result_array();
    }
    
    
    public function company_bill_info($id = null){
        $this->db->select('a.*,b.*');
        $this->db->from('company_information a');
        $this->db->join('bill_history b', 'a.company_id=b.company_id');
        $this->db->where('b.id', $id);
        // $this->db->where('b.company_id' ,$this->session->userdata('user_id'));
        $query = $this->db->get();
        // echo $this->db->last_query(); die();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }
    
    
    
    public function packing_dropdown() {
        $this->db->select('product_name');
        $this->db->from('product_information ');
        $query = $this->db->get();
    //    echo $this->db->lastquery();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
      
    }
    public function insertBankName(){
    $this->db->select('*');
    $this->db->from('bank_add');
    $this->db->where('created_by' ,$this->session->userdata('user_id'));
    $query = $this->db->get();
    // echo $this->db->last_query(); die();
    return $query->result_array();
}

public function delete_pay_info() {
    $payment_id = $this->input->post('payment_id');
    $bal = $this->input->post('bal');
    $paid_amt = $this->input->post('paid_amt');
    $this->db->query("DELETE FROM `payment` WHERE `payment_id` = $payment_id AND `balance` = $bal AND `amt_paid` = $paid_amt");
    //echo $this->db->last_query();
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
                 'due_amount'             => $balance1,
                 'paid_amount'             =>  $totalPaid,
                  );
                  $this->db->where('commercial_invoice_number', $unq_inv);
                 $this->db->update('invoice', $data1);
// echo $this->db->last_query();
// die();
    return ['status' => 'success', 'message' => 'Payment information deleted successfully.'];
}
    public function sales_tax() {
    $this->db->select('*');
    $this->db->from('invoice');
   $this->db->where('total_tax !=', '0.00 ( 0 )');
   $this->db->where('total_tax !=', '0.00 (  )');
     $this->db->where('total_tax !=', '');
        $this->db->where("total_tax NOT LIKE", "0.00%");
    $this->db->where('sales_by', $this->session->userdata('user_id'));
   $query = $this->db->get();

    if ($query->num_rows() > 0) {
        return $query->result_array();
    }
}
public function expense_tax() {
    $this->db->select('*');
    $this->db->from('product_purchase');
   $this->db->where('total_tax !=', '0.00 ( 0 )');
   $this->db->where('total_tax !=', '0.00 (  )');
    $this->db->where('total_tax !=', '0.000 (  )');
       $this->db->where('total_tax !=', '');
        $this->db->where("total_tax NOT LIKE", "0.00%");
    $this->db->where('create_by', $this->session->userdata('user_id'));
   $query = $this->db->get();

    if ($query->num_rows() > 0) {
        return $query->result_array();
    }
}
public function service_provider_expense_tax() {
    $this->db->select('*');
    $this->db->from('service');
   $this->db->where('tax_detail !=', '0.00 ( 0 )');
   $this->db->where('tax_detail !=', '0.00 (  )');
    $this->db->where('tax_detail !=', '0.000 (  )');
       $this->db->where('tax_detail !=', '');
        $this->db->where("tax_detail NOT LIKE", "0.00%");
    $this->db->where('create_by', $this->session->userdata('user_id'));
   $query = $this->db->get();

    if ($query->num_rows() > 0) {
        return $query->result_array();
    }
}
public function tax_inf() {
    $this->db->select('*');
    $this->db->from('tax_information');
  
    $this->db->where('created_by', $this->session->userdata('user_id'));
  

    $query = $this->db->get();

    if ($query->num_rows() > 0) {
        return $query->result_array();
    }
}
    
    public function noofpayment_type(){
    $this->db->select('*');
    $this->db->from('noofpaymentterms');
   $this->db->where('create_by', $this->session->userdata('user_id'));
    $query = $this->db->get();
 
     if ($query->num_rows() > 0) {
         return $query->result_array();
     }

}

    

    
    
    public function supplier_list() {
        $this->db->select('*');
        $this->db->from('supplier_information');
        $this->db->where('created_by',$this->session->userdata('user_id'));
        $query = $this->db->get();
       // echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

    public function open_invoices_exp(){
        
          $this->db->select('i.*,cs.*');
    $this->db->from('product_purchase i');
    $this->db->join('supplier_information cs', 'i.supplier_id=cs.supplier_id');
    $this->db->where('i.balance !=', '0');
    $this->db->where('i.balance !=', '0.00');
 
    $this->db->where('i.create_by', $this->session->userdata('user_id'));

    // Add the new condition to ensure due_amount does not start with a minus sign
    $this->db->where("i.balance NOT LIKE '-%'");

    $query = $this->db->get();

    if ($query->num_rows() > 0) {
        return $query->result_array();
    }
        
        
    }
   public function open_invoices_sales() {
    $this->db->select('i.*,cs.*,i.payment_terms as pterms');
    $this->db->from('invoice i');
    $this->db->join('customer_information cs', 'i.customer_id=cs.customer_id');
    $this->db->where('i.due_amount !=', '0');
    $this->db->where('i.due_amount !=', '0.00');
 
    $this->db->where('i.sales_by', $this->session->userdata('user_id'));

    // Add the new condition to ensure due_amount does not start with a minus sign
    $this->db->where("i.due_amount NOT LIKE '-%'");

    $query = $this->db->get();

    if ($query->num_rows() > 0) {
        return $query->result_array();
    }
}
    public function retrieve_attachmentdata($inv_id) {
        // echo $inv_id; die();
        $this->db->select('a.*, b.* ' );
        $this->db->from('invoice a');
        $this->db->join('attachments b', 'b.attachment_id = a.commercial_invoice_number');
        $this->db->where('a.invoice_id', $inv_id);
        $this->db->where('a.sales_by',$this->session->userdata('user_id'));
        $query = $this->db->get();
       // echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
      
    }
    
    public function retrieve_attach($inv_id) {
        $this->db->select('a.*, b.* ' );
        $this->db->from('invoice a');
        $this->db->join('attachments b', 'b.attachment_id = a.commercial_invoice_number');
        $this->db->where('a.invoice_id', $inv_id);
        $this->db->where('a.sales_by',$this->session->userdata('user_id'));
        $query = $this->db->get();
       // echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
      
    }
    
    public function retrieve_oceanattachmentdata_view($ocean_id) {
        $this->db->select('o.*, b.* ' );
        $this->db->from('ocean_export_tracking o');
        $this->db->join('attachments b', 'b.attachment_id = o.booking_no');
        $this->db->where('o.ocean_export_tracking_id', $ocean_id);
        $this->db->where('o.create_by',$this->session->userdata('user_id'));
        $query = $this->db->get();
       // echo $this->db->last_query(); die();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
      
    }
    
     public function retrieve_oceanattachmentdata($ocean_id) {
        $this->db->select('o.*, b.* ' );
        $this->db->from('ocean_export_tracking o');
        $this->db->join('attachments b', 'b.attachment_id = o.booking_no');
        $this->db->where('o.ocean_export_tracking_id', $ocean_id);
        $this->db->where('o.create_by',$this->session->userdata('user_id'));
        $query = $this->db->get();
       // echo $this->db->last_query(); die();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
      
    }
    
    public function retrieve_ocean($ocean_id) {
        $this->db->select('o.*, b.* ' );
        $this->db->from('ocean_export_tracking o');
        $this->db->join('attachments b', 'b.attachment_id = o.booking_no');
        $this->db->where('o.ocean_export_tracking_id', $ocean_id);
        $this->db->where('o.create_by',$this->session->userdata('user_id'));
        $query = $this->db->get();
       // echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
      
    }
    
    
    public function retrieve_truckingattachmentdata_view($truck_id) {
        $this->db->select('s.*, b.* ');
        $this->db->from('sale_trucking s');
        $this->db->join('attachments b', 'b.attachment_id = s.invoice_no');
        $this->db->where('s.trucking_id', $truck_id);
        $this->db->where('s.create_by',$this->session->userdata('user_id'));
        $query = $this->db->get();
       // echo $this->db->last_query(); die();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
      
    }


    public function retrieve_truckingattachmentdata($truck_id) {
        $this->db->select('s.*, b.* ');
        $this->db->from('sale_trucking s');
        $this->db->join('attachments b', 'b.attachment_id = s.invoice_no');
        $this->db->where('s.invoice_no', $truck_id);
        $this->db->where('s.create_by',$this->session->userdata('user_id'));
        $query = $this->db->get();
        // echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
      
    }
    
    public function retrieve_trucking($truck_id) {
         $this->db->select('s.*, b.* ');
        $this->db->from('sale_trucking s');
        $this->db->join('attachments b', 'b.attachment_id = s.invoice_no');
        $this->db->where('s.trucking_id', $truck_id);
        $this->db->where('s.create_by',$this->session->userdata('user_id'));
        $query = $this->db->get();
       // echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
      
    }
    

    
    
     public function getEmailConfigdata() {
        $this->db->select('*');
        $this->db->from('email_config ');
        $this->db->where('isattachment', '1');
        $query = $this->db->get();
  
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
      
    }
    
    
    // public function get_taxDatadetails()
    // {
    //     $this->db->select('*'); 
    //     $this->db->from('tax_information');
    //     $this->db->where('status_type', 'sales');
    //     $this->db->or_where('status_type', 'Both');
    //     $this->db->where('created_by' ,$this->session->userdata('user_id'));
    //     $query = $this->db->get();
    //     // echo $this->db->last_query();
    //     if ($query->num_rows() > 0) {
    //         return $query->result_array();
    //     }
    // }
    
    public function get_taxDatadetails()
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
    
    public function get_product_bundle(){
   $this->db->select('bundle_no');
    $this->db->from('product_details');
    $this->db->where('create_by',$this->session->userdata('user_id'));
    $query = $this->db->get();
  //  echo $this->db->last_query();die();
    return $query->result_array();
}
public function additional_cost_details($invoice_no){
    $this->db->select('a.*, b.* ' );
     $this->db->from('invoice_servide_details a');
     $this->db->join('invoice  b', 'b.commercial_invoice_number =a.invoice_id');
   $this->db->where('a.created_by',$this->session->userdata('user_id'));
        // $this->db->where('a.product_name', $product_nam);
   $this->db->where('a.invoice_id', $invoice_no);

   $query = $this->db->get();
 
     if ($query->num_rows() > 0) {
         return $query->result_array();
     }
}
    public function get_all_invoice_sale() {
        $this->db->select('i.*,cs.*,i.payment_terms as pterms');
        $this->db->from('invoice i');
        $this->db->join('customer_information cs' , 'i.customer_id=cs.customer_id');
        $this->db->where('sales_by' ,$this->session->userdata('user_id'));
        $query = $this->db->get();
       //  echo $this->db->last_query();die();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }
    
    
    public function getprofarma_data() {
        $this->db->select('*');
        $this->db->from('profarma_invoice i');
        $this->db->join('customer_information cs' , 'i.customer_id=cs.customer_id');
        $this->db->where('sales_by' ,$this->session->userdata('user_id'));
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }
    
    
    public function editAlldatainvoice()
    {
       $user_id = $this->session->userdata('user_id');

        $sql="SELECT * FROM `tax_information` WHERE (`status_type` = 'sales' OR `status_type` = 'Both') AND `created_by` = $user_id";

        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {

            return $query->result_array();

        }

        return false;
    }
    
    public function editAlldataprofarma()
    {
       $user_id = $this->session->userdata('user_id');

        $sql="SELECT * FROM `tax_information` WHERE (`status_type` = 'sales' OR `status_type` = 'Both') AND `created_by` = $user_id";

        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {

            return $query->result_array();

        }

        return false;
    }
    
    public function getAllTruckingdata()
    {
       $user_id = $this->session->userdata('user_id');

        $sql="SELECT * FROM `tax_information` WHERE (`status_type` = 'sales' OR `status_type` = 'Both') AND `created_by` = $user_id";

        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {

            return $query->result_array();

        }

        return false;
    }
    
    
    public function getRoadTransportData() {
        $this->db->select('*');
        $this->db->from('sale_trucking');
        $this->db->where('create_by' ,$this->session->userdata('user_id'));
        // $this->db->join('customer_information cs' , 'ox.consignee=cs.customer_id');
        // $this->db->join('supplier_information si' , 'ox.supplier_id=si.supplier_id');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }
    
    public function getOceanExportsdata() {
        $this->db->select('*');
        $this->db->from('ocean_export_tracking ox');
        // $this->db->join('customer_information cs' , 'ox.consignee=cs.customer_id');
        $this->db->join('supplier_information si' , 'ox.supplier_id=si.supplier_id');
        $this->db->where('create_by' ,$this->session->userdata('user_id'));
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }
    
    
    public function edit_Trucking_taxdata()
    {
       $user_id = $this->session->userdata('user_id');

        $sql="SELECT * FROM `tax_information` WHERE (`status_type` = 'sales' OR `status_type` = 'Both') AND `created_by` = $user_id";

        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {

            return $query->result_array();

        }

        return false;
    }



   public function sales_cost_permission(){

        $this->db->select('*');
        $this->db->from('role_permission');
        $this->db->where('admin_id',$this->session->userdata('unique_id'));
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
              return $query->result_array();
          }

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
    
    
    
    
     public function getInvoiceEditfiles($invoice_id)
    {
        $this->db->select('*'); 
        $this->db->from('attachments');
        $this->db->where('attachment_id' ,$invoice_id);
        $this->db->where('created_by' ,$this->session->userdata('user_id'));
        $this->db->where('sub_menu' ,'invoice');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }
    
    public function all_datainvoice($invoice_id)
    {
       $this->db->select('*'); 
        $this->db->from('invoice');
        $this->db->where('invoice_id' ,$invoice_id);
        $this->db->where('sales_by' ,$this->session->userdata('user_id'));
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } 
    }
    
    
  public function get_cust_payment_info($customer_id,$current_in_id=null){
$this->db->select('a.*');
$this->db->from('invoice a');

$this->db->where("(a.paid_amount != a.gtotal)");
$this->db->where("(a.due_amount > 0)");
if($current_in_id){
$this->db->where("(a.commercial_invoice_number != '$current_in_id')");
}
$this->db->where('a.sales_by', $this->session->userdata('user_id'));
$this->db->where('a.customer_id', $customer_id);

        $query = $this->db->get();
    // echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;

    }
   public function bulk_payment_unique($payment_unique){
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
                'due_amount'             => (!empty($updated_balance)?$updated_balance:'0'),    
                 'paid_amount'             =>  $tl_amt,
                // 'gtotal'     =>$total_amt[$i]
                 );
             //    print_r($data1);
                 $this->db->where('commercial_invoice_number', $unq_inv);
                 $this->db->update('invoice', $data1);
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
public function get_cust_payment_overall_info($customer_id){
  $this->db->select('sum(a.gtotal) as overall_gtotal, sum(a.due_amount) as overall_due, sum(a.paid_amount) as overall_paid');
        $this->db->from('invoice a');
          $this->db->where('a.customer_id',$customer_id);

        $this->db->where('a.sales_by',$this->session->userdata('user_id'));
        $query = $this->db->get();
     //   echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;

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
        $customer_id=$this->input->post('customer_id',TRUE);
 
        $data5 = array(
            'advanceamount' => $advanceamount,
            'customer_id'   => $customer_id,
             );
        $this->db->where('customer_id', $customer_id);
        $this->db->update('customer_information', $data5);
  
   
  
   for ($i = 0, $n = count($payment_id); $i < $n; $i++) {
    if($amount_pay[$i] > 0){
           $data1 = array(
                'payment_id' =>$payment_id[$i],
                //'inv_no'        =>$invoice_no[$i],
               // 'amt_pay'         => $amount_pay[$i],
                'due_amount'             =>  (!empty($updated_bal[$i])?$updated_bal[$i]:''),
                 'paid_amount'             =>  $total_amt[$i]-$updated_bal[$i],
                // 'gtotal'     =>$total_amt[$i]
                 );
             //    print_r($data1);
                 $this->db->where('commercial_invoice_number', $invoice_no[$i]);
                 $this->db->update('invoice', $data1);
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


                }
       echo 'done';
           // $this->db->insert('product_purchase_details', $data1);
    }//die();
}




public function getvendor_products($value){
    $this->db->select('*');
    $this->db->from('supplier_product a');
        $this->db->join('supplier_information ac' , 'a.supplier_id=ac.supplier_id');
        $this->db->join('product_information b' , 'a.product_id = b.product_id');
   $this->db->where('a.supplier_id' , $value);
    $this->db->where('a.created_by' ,$this->session->userdata('user_id'));
 $query = $this->db->get(); 

    if ($query->num_rows() > 0) {
        return $query->result_array();
    }

}

    //Count invoice

    public function count_invoice() {

        //return $this->db->count_all("invoice");
        $this->db->where('sales_by',$this->session->userdata('user_id'));
        $query=$this->db->get('invoice');
        return $query->num_rows();

    } 
       public function commercial_inv_number()
    {
   return  $data = $this->db->select("commercial_invoice_number as voucher")
            ->from('invoice') 
            ->like('commercial_invoice_number', 'NS', 'after')
            ->order_by('ID','desc')
             ->where('sales_by',$this->session->userdata('user_id'))
            ->get()
            ->result_array();
           
    }
    public function packing_list_no()
    {
        return  $data = $this->db->select("invoice_no as voucher")
        ->from('sale_packing_list') 
        ->like('invoice_no', 'PL', 'after')
        ->order_by('ID','desc')
        ->get()
        ->result_array();
           
    }
    public function sale_trucking_voucher()
    {
        return  $data = $this->db->select("invoice_no as voucher")
        ->from('sale_trucking') 
        ->like('invoice_no', 'T', 'after')
         ->where('create_by',$this->session->userdata('user_id'))
        ->order_by('ID','desc')
        ->get()
        ->result_array();
           
    }
    public function servic_provider(){
        $this->db->select("*");
        $this->db->from('supplier_information') ;
        $this->db->where('created_by',$this->session->userdata('user_id'));
     //   $this->db->where('service_provider','1');
     

       $query = $this->db->get();
       if ($query->num_rows() > 0) {
           return $query->result_array();
       }
      // return false;

       

   }
   
   
   public function editMultiplefiles($purchase_id)
    {
        $this->db->select('*'); 
        $this->db->from('attachments');
        $this->db->where('attachment_id' ,$purchase_id);
        $this->db->where('created_by' ,$this->session->userdata('user_id'));
        $this->db->where('sub_menu' ,'ocean_export_tracking');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }
    
    
    public function getTruckingeditdata($purchase_id)
    {
        $this->db->select('*'); 
        $this->db->from('attachments');
        $this->db->where('attachment_id' ,$purchase_id);
        $this->db->where('created_by' ,$this->session->userdata('user_id'));
        $this->db->where('sub_menu' ,'Sales Trucking');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }

   
   
   
   
   public function servic_provider_amount(){
    
       
      $this->db->select('a.supplier_id,b.supplier_id,b.supplier_name,sum(a.grand_total_amount) as total_sale,b.service_provider,b.created_by');
      $this->db->from('purchase_order a');
      $this->db->join('supplier_information b', 'b.supplier_id = a.supplier_id');
      $this->db->where('b.created_by',$this->session->userdata('user_id'));
        $this->db->where('b.service_provider','1');

      
        $query = $this->db->get()->row();
      return $query->total_sale;
    
  }
         public function profarma_voucher_no()
    {
      return  $data = $this->db->select("chalan_no as voucher")
            ->from('profarma_invoice') 
            ->like('chalan_no', 'PI', 'after')
            ->where('sales_by',$this->session->userdata('user_id'))
            ->order_by('ID','desc')
            ->get()
            ->result_array();
           
    }

     public function packing_pdf() {
        $this->db->select('a.*, pi.product_name');

        $this->db->from('sale_packing_list in');

        $this->db->join('product_information pi', 'pi.product_id = a.product_id');

       // $this->db->where('in.invoice_id', $invoice_id);
       
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;

    }



    
     public function invoice_pdf($invoice_id) {
        $this->db->select('in.*, ci.customer_name');
        $this->db->from('invoice in');
        $this->db->join('customer_information ci', 'ci.customer_id = in.customer_id');
        $this->db->where('in.invoice_id', $invoice_id);
       
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
      

    }






    
  

    public function all_invoice($invoice_id) {
        $this->db->select('a.*,b.*');
        $this->db->from('invoice_details a');
        $this->db->join('invoice b', 'b.invoice_id = a.invoice_id');
        $this->db->where('b.invoice_id', $invoice_id);
        
        $query = $this->db->get();
    
          if ($query->num_rows() > 0) {
              return $query->result_array();
          }
        
    }
    



    public function profarma_pdf($purchase_id) {
        $this->db->select('pi.*, ci.customer_name');
        $this->db->from('profarma_invoice pi');
        $this->db->join('customer_information ci', 'ci.customer_id = pi.customer_id');
        $this->db->where('pi.purchase_id', $purchase_id);
       
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;

  }
  public function all_profarma($purchase_id) {
    $this->db->select('a.*,b.*,c.*');
    $this->db->from('profarma_invoice_details a');
    $this->db->join('product_information c', 'a.product_id = c.product_id');
    $this->db->join('profarma_invoice b', 'b.purchase_id = a.purchase_id');
     // echo $this->db->last_query(); die();
    $this->db->where('b.purchase_id', $purchase_id);
    $this->db->group_by('a.product_id');
   
    $query = $this->db->get();

   //   if ($query->num_rows() > 0) {
          return $query->result_array();
   //   }
    //  return false;
}

public function add_payment_type($postData){
    $data=array(
        'payment_type' => $postData,
        'create_by' => $this->session->userdata('user_id')
    );
    $this->db->insert('payment_type', $data);
    //echo $this->db->last_query();
    $this->db->select('*');
    $this->db->from('payment_type');
    $this->db->where('create_by' ,$this->session->userdata('user_id'));
   //   $this->db->order_by('payment_type','desc');
    $query = $this->db->get();
    return $query->result_array();
}
public function add_state_tax_id($postData){
    $data=array(
        'state_tax_id' => $postData,
        'create_by' => $this->session->userdata('user_id')
    );
    $this->db->insert('state_tax_id', $data);
    //echo $this->db->last_query();
    $this->db->select('*');
    $this->db->from('state_tax_id');
    $this->db->where('create_by' ,$this->session->userdata('user_id'));
   //   $this->db->order_by('state_tax_id','desc');
    $query = $this->db->get();
    return $query->result_array();
}
//manage my company--->add local tax id number
public function add_local_tax_id($postData){
    $data=array(
        'local_tax_id' => $postData,
        'create_by' => $this->session->userdata('user_id')
    );
    $this->db->insert('local_tax_id', $data);
    //echo $this->db->last_query();
    $this->db->select('*');
    $this->db->from('local_tax_id');
    $this->db->where('create_by' ,$this->session->userdata('user_id'));
   //   $this->db->order_by('local_tax_id','desc');
    $query = $this->db->get();
    return $query->result_array();
}
public function add_city_tax($postData){
    $data=array(
        'city_tax' => $postData,
        'created_by' => $this->session->userdata('user_id')
    );
    $this->db->insert('city_tax', $data);
    //echo $this->db->last_query();
    $this->db->select('*');
    $this->db->from('city_tax');
    $this->db->where('created_by' ,$this->session->userdata('user_id'));
   //   $this->db->order_by('city_tax','desc');
    $query = $this->db->get();
    return $query->result_array();
}
public function add_paymentroll_type(){
    $this->db->select('*');
    $this->db->from('payroll_type');
    $this->db->where('created_by' ,$this->session->userdata('user_id'));
    $query = $this->db->get();
    return $query->result_array();
}

public function add_employees_type(){
    $this->db->select('*');
    $this->db->from('employee_type');
    $this->db->where('created_by' ,$this->session->userdata('user_id'));
    $query = $this->db->get();
    return $query->result_array();
}


public function packing_details_data($expense_id) {

    $this->db->select('*');
    $this->db->from('sale_packing_list a');
        $this->db->join('sale_packing_list_detail ac' , 'a.expense_packing_id=ac.expense_packing_id');
        $this->db->join('product_information b' , 'b.product_id = a.product_id');
    $this->db->where('a.expense_packing_id' , $expense_id);


   // $sql = 'SELECT * FROM sale_packing_list as a JOIN sale_packing_list_detail as ac JOIN product_information as b ON b.product_id = a.product_id';
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
            'thickness' => $this->input->post('thickness',TRUE),
            'description'=> $this->input->post('description',TRUE),
            'product_id' => $this->input->post('product_id',TRUE),
           'container_no'     => $this->input->post('container_no',TRUE),
            'grand_total_amount'      => $this->input->post('total',TRUE),
            'status'             => 1,
            'remarks' => $this->input->post('remarks',TRUE)
        );
       $purchase_id_1 = $this->db->where('invoice_no',$this->input->post('invoice_no',TRUE));
        $q=$this->db->get('sale_packing_list');
        $row = $q->row_array();
    if(!empty($row['expense_packing_id'])){
        $this->session->set_userdata("spacking_1",$row['expense_packing_id']);
      
        $this->db->where('invoice_no',$this->input->post('invoice_no',TRUE));
 
        $this->db->delete('sale_packing_list');
      //  echo $this->db->last_query();
        $this->db->insert('sale_packing_list', $data);
 //echo $this->db->last_query();
    }   
    else{
    $this->db->insert('sale_packing_list', $data);
   // echo $this->db->last_query();
    }
   //
   
      $purchase_id = $this->db->select('expense_packing_id')->from('sale_packing_list')->where('invoice_no',$this->input->post('invoice_no',TRUE))->get()->row()->expense_packing_id;
 
       $this->session->set_userdata("spacking_2",$purchase_id);

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
        $slab_no = $this->input->post('slab_no',TRUE);
        $height = $this->input->post('height',TRUE);
        $width = $this->input->post('width',TRUE);
        $area = $this->input->post('total_price',TRUE);
     //   echo count($slab_no);
        
       for ($i = 0, $n = count($slab_no); $i < $n; $i++) {
            $serial = $serial_number[$i];
            $slabno = $slab_no[$i];
            $heightt = $height[$i];
            $widthh = $width[$i];
            $areaa = $area[$i];
          $data1 = array(
                'product_id'   =>  $p_id,
                'expense_packing_detail_id' => $this->generator(15),
                'expense_packing_id'        => $this->session->userdata("spacking_2"),
                'serial_no'         => $serial,
                'slab_no'               => $slabno,
                'height' => $heightt,
                'width' => $widthh,
                'net_measure'       => 'cm',
                'area' => $areaa,
                'create_by'          =>  $this->session->userdata('user_id'),
                'status'             => 1
            );
          //  print_r($data1);
       //  $this->db->where('expense_packing_id', $this->session->userdata("spacking_1"));
       //     $this->db->delete('sale_packing_list_detail');
            $this->db->insert('sale_packing_list_detail', $data1);
         //  echo $this->db->last_query();
    }
        return $purchase_id."/".$invoice_no;
       
    }

public function fetch_data($day){
    //$fromdate = $this->input->post('prodt',TRUE);
  //  echo "sad";
  //  echo $day;
    $split=explode("-",$day);
   // print_r($split);
  
      $data = $this->db->select("p_quantity,price")
    ->from('product_information') 
    ->where('product_name', $split[0])
    ->where('product_model',$split[1])
    ->order_by('Time','desc')
    ->get()
    ->result_array();
   
   
}

public function add_profarma_invoice()
{    $purchase_id = date('YmdHis');
 
    $data = array(
               'billing_address'=>$this->input->post('billing_address'),
               'purchase_id' => $purchase_id,
               'purchase_date'=>$this->input->post('purchase_date'),
               'chalan_no'=>$this->input->post('chalan_no'),
               'customer_id'=>$this->input->post('customer_id'),
               'pre_carriage_'=>$this->input->post('pre_carriage_'),
               'receipt'=>$this->input->post('receipt'),
               'country_goods'=>$this->input->post('country_goods'),
               'country_destination'=>$this->input->post('country_destination'),
               'loading'=>$this->input->post('loading'),
               'tax_details'=>$this->input->post('tax_details'),
               'gtotal'=>$this->input->post('gtotal'),
               'discharge'=>$this->input->post('discharge'),
               'terms_payment'=>$this->input->post('terms_payment'),
               'description_goods'=>$this->input->post('description_goods'),
               'total'=>$this->input->post('total'),
               'remarks'=>$this->input->post('remark'),
               'ac_details'=>$this->input->post('ac_details'),
                'sales_by'        => $this->session->userdata('user_id')
            );

        //   $CI->load->model('Invoices');
          //  $this->Invoices->add_profarma_invoice($data);
            $this->db->insert('profarma_invoice', $data);
          //  echo $this->db->last_query();
            $p_id = $this->input->post('product_id');
          
            $quantity = $this->input->post('product_quantity');
            $rate = $this->input->post('product_rate');
            $t_price = $this->input->post('total_price');
            $rowCount = count($this->input->post('product_id',TRUE));
//echo $quantity;
            for ($i = 0; $i < $rowCount; $i++) {
   
               $product_quantity = $quantity[$i];
               $product_rate = $rate[$i];
               $product_id = $p_id[$i];
               $total_price = $t_price[$i];
           
   
               $data1 = array(
                   'purchase_detail_id' => $this->generator(15),
                   'purchase_id'        => $purchase_id,
                   'product_id'         => $product_id,
                   'quantity'           => $product_quantity,
                   'rate'               => $product_rate,
                   'total_amount'       => $total_price,
                   'create_by'          =>  $this->session->userdata('user_id'),
                   'status'             => 1
               );
             //  print_r($data1);
           
               $this->db->insert('profarma_invoice_details', $data);
           }         

  
}

public function get_profarma_invoice()
{
$this->db->select('pi.*, ci.customer_name');
$this->db->from('profarma_invoice pi');
$this->db->join('customer_information ci', 'ci.customer_id = pi.customer_id');
$query = $this->db->get()->result();

return $query;
}
public function get_email_data(){
    $id=$_SESSION['user_id'];
    $this->db->select('*');
    $this->db->from('invoice_email');
    $this->db->where('uid', $id);
    $query = $this->db->get();

    if ($query->num_rows() > 0) {

        return $query->result_array();

    }

    return false;

}
public function get_setting($user,$menu,$submenu){
 
    $this->db->select('*');
    $this->db->from('bootgrid_data');
    $this->db->where('user', $user);
    $this->db->where('menu', $menu);
    $this->db->where('submenu', $submenu);
    $query = $this->db->get()->result();

     return $query;

}


public function availability($product_nam,$product_model){
    $this->db->select('p_quantity,price,cost_persqft,cost_perslab,sales_pricepersqft,product_id');
    $this->db->from('product_information');
    $this->db->where('product_name', $product_nam);
    $this->db->where('product_model', $product_model);
    $query = $this->db->get()->result();
 return $query;
}




public function payment_type(){
    $this->db->select('payment_type');
    $this->db->from('payment_type');
   $this->db->where('create_by', $this->session->userdata('user_id'));
     $this->db->order_by('payment_type','asc');
   $query = $this->db->get();
 
     if ($query->num_rows() > 0) {
         return $query->result_array();
     }

}
public function product_id($product_nam,$product_model){
 
    $this->db->select('product_id,price');
       $this->db->from('product_information');
     
       $this->db->where('product_name', $product_nam);
       $this->db->where('product_model', $product_model);
 
    $query = $this->db->get()->result();
    
    return $query;
}
public function retrieve_packing_editdata($purchase_id) {
    $this->db->select('a.*, b.* ' );
     $this->db->from('sale_packing_list a');
     $this->db->join('sale_packing_list_detail b', 'b.expense_packing_id =a.expense_packing_id');
  

     $this->db->where('a.create_by',$this->session->userdata('user_id'));
     $this->db->where('b.expense_packing_id', $purchase_id);
    // $this->db->order_by('a.purchase_details', 'asc');
     $query = $this->db->get();

     if ($query->num_rows() > 0) {
         return $query->result_array();
     }

 }

     public function getInvoiceList($postData=null){

       $this->load->library('occational');

         $response = array();

         $usertype = $this->session->userdata('user_type');

         $fromdate = $this->input->post('fromdate',TRUE);

         $todate   = $this->input->post('todate',TRUE);

         if(!empty($fromdate)){

            $datbetween = "(a.date BETWEEN '$fromdate' AND '$todate')";

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

            $searchQuery = " (b.customer_name like '%".$searchValue."%' or a.invoice like '%".$searchValue."%' or a.date like'%".$searchValue."%' or a.invoice_id like'%".$searchValue."%' or u.first_name like'%".$searchValue."%'or u.last_name like'%".$searchValue."%')";

         }



         ## Total number of records without filtering

         $this->db->select('count(*) as allcount');

         $this->db->from('invoice a');

         $this->db->join('customer_information b', 'b.customer_id = a.customer_id','left');

         $this->db->join('users u', 'u.user_id = a.sales_by','left');

         if($usertype == 2){

          $this->db->where('a.sales_by',$this->session->userdata('user_id'));

         }

          if(!empty($fromdate) && !empty($todate)){

             $this->db->where($datbetween);

         }

          if($searchValue != '')

          $this->db->where($searchQuery);

          

         $records = $this->db->get()->result();

         $totalRecords = $records[0]->allcount;



         ## Total number of record with filtering

         $this->db->select('count(*) as allcount');

         $this->db->from('invoice a');

         $this->db->join('customer_information b', 'b.customer_id = a.customer_id','left');

         $this->db->join('users u', 'u.user_id = a.sales_by','left');

        if($usertype == 2){

          $this->db->where('a.sales_by',$this->session->userdata('user_id'));

     }

         if(!empty($fromdate) && !empty($todate)){

             $this->db->where($datbetween);

         }

         if($searchValue != '')

            $this->db->where($searchQuery);

          

         $records = $this->db->get()->result();

         $totalRecordwithFilter = $records[0]->allcount;



         ## Fetch records

         $this->db->select("a.*,b.customer_name,u.first_name,u.last_name");

         $this->db->from('invoice a');

         $this->db->join('customer_information b', 'b.customer_id = a.customer_id','left');

         $this->db->join('users u', 'u.user_id = a.sales_by','left');

        if($usertype == 2){

          $this->db->where('a.sales_by',$this->session->userdata('user_id'));

        }

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



           $button .='  <a href="'.$base_url.'Cinvoice/invoice_inserted_data/'.$record->invoice_id.'" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="left" title="'.display('invoice').'"><i class="fa fa-window-restore" aria-hidden="true"></i></a>';



         // $button .='  <a href="'.$base_url.'Cinvoice/min_invoice_inserted_data/'.$record->invoice_id.'" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="left" title="'.display('mini_invoice').'"><i class="fa fa-fax" aria-hidden="true"></i></a>';



         // $button .='  <a href="'.$base_url.'Cinvoice/pos_invoice_inserted_data/'.$record->invoice_id.'" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="left" title="'.display('pos_invoice').'"><i class="fa fa-fax" aria-hidden="true"></i></a>';

          // $button .='  <a href="'.$base_url.'Cinvoice/invoicdetails_download/'.$record->invoice_id.'" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="left" title="'.display('download').'"><i class="fa fa-download"></i></a>';



      if($this->permission1->method('manage_invoice','update')->access()){

         $button .=' <a href="'.$base_url.'Cinvoice/invoice_update_form/'.$record->invoice_id.'" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="'. display('update').'"><i class="fa fa-pencil" aria-hidden="true"></i></a> ';

     }



       



          $details ='  <a href="'.$base_url.'Cinvoice/invoice_inserted_data/'.$record->invoice_id.'" class="" >'.$record->invoice.'</a>';

               

            $data[] = array( 

                'sl'               =>$sl,

                'invoice'          =>$details,

                'salesman'         =>$record->first_name.' '.$record->last_name,

                'customer_name'    =>$record->customer_name,

                'final_date'       =>$this->occational->dateConvert($record->date),

                'total_amount'     =>$record->total_amount,

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

       //Ocean Import Tracking details_data
    public function ocean_export_tracking_details_data($purchase_id) {
        $this->db->select('*');
        $this->db->from('ocean_export_tracking a');
        $this->db->join('supplier_information b', 'b.supplier_id = a.supplier_id');
        $this->db->where('a.ocean_export_tracking_id', $purchase_id);
     
        $query = $this->db->get();
      
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
     
    }



         public function update_ocean_export() {
        //print_r($this->input->post()); die;
        $purchase_id  = $this->input->post('ocean_export_tracking_id',TRUE);
        
  
        $receive_by=$this->session->userdata('user_id');
        $receive_date=date('Y-m-d');
        $createdate=date('Y-m-d H:i:s');



         $data = array(

        

            'ocean_export_tracking_id'   => $purchase_id,

            'booking_no'     => $this->input->post('booking_no',TRUE),

            'supplier_id'   => $this->input->post('supplier_id',TRUE),

            'container_no' => $this->input->post('container_no',TRUE),

            'seal_no'   => $this->input->post('seal_no',TRUE),

            'etd'   => $this->input->post('etd',TRUE),

            'eta'   => $this->input->post('eta',TRUE),

            'shipper' => $this->input->post('shipper',TRUE),

            'invoice_date' => $this->input->post('invoice_date',TRUE),

            'consignee' => $this->input->post('consignee',TRUE),

            'notify_party' => $this->input->post('notify_party',TRUE),

            'vessel' =>  $this->input->post('vessel',TRUE),

            'voyage_no' => $this->input->post('voyage_no',TRUE),

            'port_of_loading' =>  $this->input->post('port_of_loading',TRUE),

            'port_of_discharge' => $this->input->post('port_of_discharge',TRUE),

            'place_of_delivery' => $this->input->post('place_of_delivery',TRUE),

            'freight_forwarder'  => $this->input->post('freight_forwarder',TRUE),

            'particular' => $this->input->post('particulars',TRUE),

            'status'  => 1,

        );

  



      
        if ($purchase_id != '') {
            $this->db->where('ocean_export_tracking_id', $purchase_id);
            $this->db->update('ocean_export_tracking', $data);
            //account transaction update
     
        }

        return true;
    }


    
     public function get_customer_data($customer_id){
        $this->db->select('*');
    
        $this->db->from('customer_information');
        $this->db->where('customer_id',$customer_id);
      
        $query = $this->db->get();
    
        if ($query->num_rows() > 0) {
    
            return $query->result_array();
    
        }
    
        return false;
    
    }

       public function getOceanExportList($postData=null){
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
        $this->db->from('ocean_export_tracking a');
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
        $this->db->from('ocean_export_tracking a');
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
        $this->db->from('ocean_export_tracking a');
        $this->db->join('supplier_information b', 'b.supplier_id = a.supplier_id','left');
        $this->db->where('a.create_by',$this->session->userdata('user_id'));
          if(!empty($fromdate) && !empty($todate)){
             $this->db->where($datbetween);
         }
         if($searchValue != '')
         $this->db->where($searchQuery);
       
         // $this->db->order_by($columnName, $columnSortOrder);
         // $this->db->limit($rowperpage, $start);
         $records = $this->db->get()->result();
         $data = array();
         $sl =1;
         foreach($records as $record ){
          $button = '';
          $base_url = base_url();
          $jsaction = "return confirm('Are You Sure ?')";
          $button .='  <a href="'.$base_url.'Cinvoice/ocean_export_tracking_details_data/'.$record->ocean_export_tracking_id.'" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="left" title="'.display('purchase_details').'"><i class="fa fa-download" aria-hidden="true"></i></a>';
    
           $button .='  <a href="'.$base_url.'Cinvoice/ocean_export_tracking_details_data/'.$record->ocean_export_tracking_id.'" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="left" title="'.display('purchase_details').'"><i class="fa fa-window-restore" aria-hidden="true"></i></a>';
      if($this->permission1->method('manage_purchase','update')->access()){
         $button .=' <a href="'.$base_url.'Cinvoice/ocean_export_tracking_update_form/'.$record->ocean_export_tracking_id.'" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="'. display('update').'"><i class="fa fa-pencil" aria-hidden="true"></i></a> ';
     }

     

         $purchase_ids ='<a href="'.$base_url.'Cinvoice/ocean_export_tracking_update_form/'.$record->ocean_export_tracking_id.'">'.$record->ocean_export_tracking_id.'</a>';
               
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
        $this->db->from('sale_trucking a');
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
        $this->db->from('sale_trucking a');
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
          $this->db->from('sale_trucking a');
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

           $button .='  <a href="'.$base_url.'Cinvoice/trucking_details_data/'.$record->trucking_id.'" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="left" title="'.display('purchase_details').'"><i class="fa fa-download" aria-hidden="true"></i></a>';
      if($this->permission1->method('manage_purchase','update')->access()){
         $button .=' <a href="'.$base_url.'Cinvoice/trucking_update_form/'.$record->trucking_id.'" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="'. display('update').'"><i class="fa fa-pencil" aria-hidden="true"></i></a> ';
     }

     

         $purchase_ids ='<a href="'.$base_url.'Cinvoice/trucking_update_form/'.$record->trucking_id.'">'.$record->trucking_id.'</a>';
               
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


    public function trucking_details_data($purchase_id) {
        $this->db->select('a.*,b.*,c.*');
        $this->db->from('sale_trucking a');
        $this->db->join('customer_information b', 'b.customer_id = a.bill_to');
        $this->db->join('sale_trucking_details c', 'c.sale_trucking_id = a.trucking_id');
        $this->db->where('a.trucking_id', $purchase_id);
        //$this->db->group_by('d.product_id');
        $query = $this->db->get();
      //  echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

        //Retrieve trucking Edit Data
    public function retrieve_trucking_editdata($purchase_id) {

       $this->db->select('a.*,
                        b.*,
                        d.customer_id,
                        d.customer_name'
        );
        $this->db->from('sale_trucking a');
        $this->db->join('sale_trucking_details b', 'b.sale_trucking_id =a.trucking_id');
        $this->db->join('customer_information d', 'd.customer_id = a.bill_to');
         $this->db->where('a.create_by',$this->session->userdata('user_id'));
         $this->db->where('a.trucking_id', $purchase_id);
       // $this->db->order_by('a.purchase_details', 'asc');
        $query = $this->db->get();
      
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    
    }







    //Count todays_sales_report

    public function todays_sales_report() {
        $today = date('Y-m-d');
        $this->db->select('a.*,b.customer_name, b.customer_id, a.invoice_id,a.invoice');
        $this->db->from('invoice a');
        $this->db->join('customer_information b', 'b.customer_id = a.customer_id');
        $this->db->where('a.date', $today);
        $this->db->where('a.sales_by',$this->session->userdata('user_id'));
        $this->db->order_by('a.invoice', 'desc');
        $query = $this->db->get();
       // echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }
    
    
    // Number of Invoices in User End
    public function getRowCountInvoices() {
        $this->db->select_sum('expense_amount');
        $this->db->where('create_by',$this->session->userdata('user_id'));  
        $query = $this->db->get('expense');
        // echo $this->db->last_query();
        $result = $query->row();

        return $result->expense_amount;
    }


    // Overall Expenses Amount in User End
    public function getoverallExpensesAmount() {

        $this->db->select_sum('expense_amount');
        $this->db->where('create_by',$this->session->userdata('user_id'));  
        $query = $this->db->get('expense');
        // echo $this->db->last_query();
        $result = $query->row();

        return $result->expense_amount;

    }


     // Overall Expenses Amount in User End
   public function getoverallExpensesAmountarray() {
        $this->db->select_sum('expense_amount');
        $this->db->from('expense');
        $this->db->where('create_by',$this->session->userdata('user_id'));
        $query = $this->db->get();
        // echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;

    }


    // Number of Expenses in User End
    public function getRowCountexpenses() {
        $this->db->select('*');
        $this->db->from('product_purchase');
        $this->db->where('create_by',$this->session->userdata('user_id'));
        $query = $this->db->get();
       // echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }

     // Number of Timesheets in User End
    public function getRowCountTimesheet() {
        $this->db->select('*');
        $this->db->from('timesheet_info');
        $this->db->where('create_by',$this->session->userdata('user_id'));
        $query = $this->db->get();
       // echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }


    // Piechart Dynamic Data in Sales
    public function getPiechartsalesData() {
        $this->db->select('a. total_amount, b.product_name');
        $this->db->from('invoice a');
        $this->db->join('invoice_details b', 'b.invoice_id = a.invoice_id');
        $this->db->where('a.sales_by',$this->session->userdata('user_id'));
        $query = $this->db->get();
       // echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }


    // Number of Working Hours in User End
    public function getnumberofWorkinghours() {
        $this->db->select_sum('total_hours');
        $this->db->where('create_by',$this->session->userdata('user_id'));  
        $this->db->group_by('month');
        $query = $this->db->get('timesheet_info');
        // echo $this->db->last_query();
        $result = $query->row();

        return $result->total_hours;

        // $query = $this->db->select_sum('total_hours')->from('timesheet_info')->where('create_by', $this->session->userdata('user_id'))->get();
        // $result = $query->row();
        // return $result->total_hours;
    }

    // Number of LOan Outstanding amount in User End
    public function getTotalOutstandingamt() {
        $this->db->select_sum('out_standing');
        $this->db->where('create_by',$this->session->userdata('user_id'));  
        $query = $this->db->get('person_ledger');
        // echo $this->db->last_query();
        $result = $query->row();

        return $result->out_standing;

    }


    // Today Working Hours 
    
    public function getCountTodayWorkingHour()
    {
       // $date = new DateTime("now");
        $date = new DateTime();
         $curr_date = $date->format('d/m/Y');
         // print_r($curr_date);
         $this->db->select_sum('hours_per_day');
         $this->db->from('timesheet_info_details'); 
         $this->db->where('created_by',$this->session->userdata('user_id'));
         $this->db->where('Date', $curr_date);
         $query = $this->db->get();
       // echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;

    }



//    ======= its for  best_sales_products ===========

    public function best_sales_products() {
$firststart= date('Y-m-d', strtotime('first day of january this year'));
$yearEnd = date('Y-m-d', strtotime('last day of december this year'));

          $this->db->select('a.create_by,b.date,a.product_name, count(*) as quantity');

         $this->db->from('invoice_details a');
         $this->db->join('invoice b', 'b.invoice_id = a.invoice_id');
         $this->db->where('a.create_by',$this->session->userdata('user_id'));
      $this->db->where('b.date >=', $firststart);
        $this->db->where('b.date <=', $yearEnd);
         $this->db->group_by('a.product_name', 'desc');
        $this->db->order_by('count(*)', 'desc');
         $this->db->limit(10);
    $query = $this->db->get();
     //echo $this->db->last_query();
  $rows = array();
  $result =  $query->result(); 

 foreach($result as $r) { 
     $rows['name'][]=$r->product_name;
         $rows['data'][] = $r->quantity;

 }
 
$result = array();
array_push($result,$rows);
//echo json_encode($result, JSON_NUMERIC_CHECK);
   }







//    ======= its for  best_sales_products ===========

    public function best_saler_product_list() {

        $this->db->select('b.product_id, b.product_name, sum(a.quantity) as quantity');

        $this->db->from('invoice_details a');

        $this->db->join('product_information b', 'b.product_id = a.product_id');

        $this->db->where('a.create_by',$this->session->userdata('user_id'));

        $this->db->group_by('b.product_id');

        $this->db->order_by('quantity', 'desc');

        $query = $this->db->get();

        return $query->result();

    }



//    ======= its for  todays_customer_receipt ===========

    public function todays_customer_receipt($today = null) {

         $this->db->select('a.*,b.HeadName,c.customer_name');

        $this->db->from('acc_transaction a');

        $this->db->join('acc_coa b','a.COAID=b.HeadCode');

         $this->db->join('customer_information c','b.customer_id=c.customer_id');
         $this->db->where('c.create_by',$this->session->userdata('user_id'));

        $this->db->where('a.Credit >',0);

        $this->db->where('DATE(a.VDate)',$today);

        $this->db->where('a.IsAppove',1);

        $query = $this->db->get();
//echo $this->db->last_query();
        return $query->result();

    }



//    ======= its for  todays_customer_receipt ===========

    public function filter_customer_wise_receipt($custome_id = null, $from_date = null) {

        $this->db->select('a.*,b.HeadName');

        $this->db->from('acc_transaction a');

        $this->db->join('acc_coa b','a.COAID=b.HeadCode');

        $this->db->where('b.customer_id',$custome_id);

        $this->db->where('a.Credit >',0);

        $this->db->where('DATE(a.VDate)',$from_date);

        $this->db->where('a.IsAppove',1);

        $query = $this->db->get();

        return $query->result();







    }



    //invoice List

    public function invoice_list($perpage, $page) {

        $this->db->select('a.*,b.customer_name');

        $this->db->from('invoice a');

        $this->db->join('customer_information b', 'b.customer_id = a.customer_id','left');
        $this->db->where('a.sales_by',$this->session->userdata('user_id'));

        $this->db->order_by('a.invoice', 'desc');

        $this->db->limit($perpage, $page);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            return $query->result_array();

        }

        return false;

    }



    public function todays_invoice(){

        $this->db->select('a.*,b.customer_name');

        $this->db->from('invoice a');

        $this->db->join('customer_information b', 'b.customer_id = a.customer_id','left');
        $this->db->where('a.sales_by',$this->session->userdata('user_id'));

        $this->db->where('a.date',date('Y-m-d'));

        $this->db->order_by('a.invoice', 'desc');

        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            return $query->result_array();

        }

        return false;

    }

    // pdf list

      public function invoice_list_pdf() {

        $this->db->select('a.*,b.customer_name');

        $this->db->from('invoice a');

        $this->db->join('customer_information b', 'b.customer_id = a.customer_id');
        $this->db->where('a.sales_by',$this->session->userdata('user_id'));
        $this->db->order_by('a.invoice', 'desc');

        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            return $query->result_array();

        }

        return false;

    }

 

 public function user_invoice_data($user_id){

   return  $this->db->select('*')->from('users')->where('user_id',$user_id)->get()->row();

 }

    // search invoice by customer id

    public function invoice_search($customer_id, $per_page, $page) {

        $this->db->select('a.*,b.customer_name');

        $this->db->from('invoice a');

        $this->db->join('customer_information b', 'b.customer_id = a.customer_id');
        $this->db->where('a.sales_by',$this->session->userdata('user_id'));

        $this->db->where('a.customer_id', $customer_id);

        $this->db->order_by('a.invoice', 'desc');

        $this->db->limit($per_page, $page);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            return $query->result_array();

        }

        return false;

    }



    // invoice search by invoice id

    public function invoice_list_invoice_id($invoice_no) {

        $this->db->select('a.*,b.customer_name');

        $this->db->from('invoice a');

        $this->db->join('customer_information b', 'b.customer_id = a.customer_id');

        $this->db->where('a.sales_by',$this->session->userdata('user_id'));

        $this->db->where('invoice', $invoice_no);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            return $query->result_array();

        }

        return false;

    }



    // date to date invoice list

    public function invoice_list_date_to_date($from_date, $to_date, $perpage, $page) {

        $dateRange = "a.date BETWEEN '$from_date' AND '$to_date'";

        $this->db->select('a.*,b.customer_name');

        $this->db->from('invoice a');

        $this->db->join('customer_information b', 'b.customer_id = a.customer_id');

        $this->db->where('a.sales_by',$this->session->userdata('user_id'));

        $this->db->where($dateRange, NULL, FALSE);

        $this->db->order_by('a.invoice', 'desc');

        $this->db->limit($perpage, $page);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            return $query->result_array();

        }

        return false;

    }



    // Invoiec list date to date 

    public function invoice_list_date_to_date_count($from_date, $to_date) {

        $dateRange = "a.date BETWEEN '$from_date%' AND '$to_date%'";

        $this->db->select('a.*,b.customer_name');

        $this->db->from('invoice a');

        $this->db->join('customer_information b', 'b.customer_id = a.customer_id');

        $this->db->where('a.sales_by',$this->session->userdata('user_id'));

        $this->db->where($dateRange, NULL, FALSE);

        $this->db->order_by('a.invoice', 'desc');

        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            return $query->num_rows();

        }

        return false;

    }



    //invoice List

    public function invoice_list_count() {

        $this->db->select('a.*,b.customer_name');

        $this->db->from('invoice a');

        $this->db->join('customer_information b', 'b.customer_id = a.customer_id');

        $this->db->where('a.sales_by',$this->session->userdata('user_id'));

        $this->db->order_by('a.invoice', 'desc');

        $this->db->limit('500');

        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            return $query->num_rows();

        }

        return false;

    }



// count invoice search by customer

    public function invoice_search_count($customer_id) {

        $this->db->select('a.*,b.customer_name');

        $this->db->from('invoice a');

        $this->db->join('customer_information b', 'b.customer_id = a.customer_id');

        $this->db->where('a.sales_by',$this->session->userdata('user_id'));

        $this->db->where('a.customer_id', $customer_id);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            return $query->num_rows();

        }

        return false;

    }



    //invoice Search Item

    public function search_inovoice_item($customer_id) {

        $this->db->select('a.*,b.customer_name');

        $this->db->from('invoice a');

        $this->db->join('customer_information b', 'b.customer_id = a.customer_id');

        $this->db->where('a.sales_by',$this->session->userdata('user_id'));

        $this->db->where('b.customer_id', $customer_id);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            return $query->result_array();

        }

        return false;

    }



    //POS invoice entry

    public function pos_invoice_setup($product_id) {

        $product_information = $this->db->select('*')

                ->from('product_information')

                ->join('supplier_product', 'product_information.product_id = supplier_product.product_id')
                ->where('product_information.created_by',$this->session->userdata('user_id'))

                ->where('product_information.product_id', $product_id)

                ->get()

                ->row();



        if ($product_information != null) {



            $this->db->select('SUM(a.quantity) as total_purchase');

            $this->db->from('product_purchase_details a');

            $this->db->where('a.product_id', $product_id);

            $total_purchase = $this->db->get()->row();



            $this->db->select('SUM(b.quantity) as total_sale');

            $this->db->from('invoice_details b');

            $this->db->where('b.product_id', $product_id);

            $total_sale = $this->db->get()->row();



            $available_quantity = ($total_purchase->total_purchase - $total_sale->total_sale);

          

          $data2 = (object) array(

                        'total_product'  => $available_quantity,

                        'supplier_price' => $product_information->supplier_price,

                        'price'          => $product_information->price,

                        'supplier_id'    => $product_information->supplier_id,

                        'product_id'     => $product_information->product_id,

                        'product_name'   => $product_information->product_name,

                        'product_model'  => $product_information->product_model,

                        'unit'           => $product_information->unit,

                        'tax'            => $product_information->tax,

                        'image'          => $product_information->image,

                        'serial_no'      => $product_information->serial_no,

            );



        



            return $data2;

        } else {

            return false;

        }

    }



    //POS customer setup

    public function pos_customer_setup() {

        $query = $this->db->select('*')

                ->from('customer_information')
                ->where('create_by',$this->session->userdata('user_id'))
               
->order_by("customer_name", "asc")
                ->get();

        if ($query->num_rows() > 0) {
          //  print_r($query->result_array());
            return $query->result_array();

        }
 }
public function get_product_info($product_nam,$product_model){
 $this->db->select('a.*, b.* ' );
     $this->db->from('product_information a');
     $this->db->join('product_details b', 'b.product_id =a.product_id');
   $this->db->where('a.created_by',$this->session->userdata('user_id'));
         $this->db->where('a.product_name', $product_nam);
       $this->db->where('a.product_model', $product_model);
 $query = $this->db->get()->result();
  return $query;
}

 public function pro_number(){
    $this->db->select('commercial_invoice_number');
    $this->db->from('invoice');
    $this->db->where('sales_by',$this->session->userdata('user_id'));
    $query = $this->db->get();
  //  echo $this->db->last_query();die();
    return $query->result_array();
}



 public function container_booking_no(){
    $this->db->select('booking_no,container_no');
    $this->db->from('ocean_export_tracking');
    $this->db->where('create_by',$this->session->userdata('user_id'));
    $query = $this->db->get();
   
    return $query->result_array();
}
    //Count invoice


function applyDateAdjustment($date, $adjustment_type ) {
   $adjustment_type = strtolower(trim($adjustment_type));
   $adjusted_date = $date;
 switch ($adjustment_type) {
        case 'on date':
           $adjusted_date = $date;
            break;
        case '1 day before':
            $adjusted_date = date('Y-m-d', strtotime('-1 day', strtotime($date)));
            break;
        case '3 days before':
           $adjusted_date = date('Y-m-d', strtotime('-3 days', strtotime($date)));
            break;
        case '1 week before':
           $adjusted_date = date('Y-m-d', strtotime('-7 days', strtotime($date)));
            break;
        default:
            break;
    }

    return $adjusted_date;
}

function adjustDatesBasedOnNotifications($eta, $etd, $payment_due_date) {
    $eta_notification = $this->db->select('notification_time, notification_source')->from('notification')
        ->where('menu', 'SALE - NEW SALE - ETA')->where('unique_id', $_SESSION['unique_id'])->get()->row();

    $etd_notification = $this->db->select('notification_time, notification_source')->from('notification')
        ->where('menu', 'SALE - NEW SALE - ETD') ->where('unique_id', $_SESSION['unique_id']) ->get()->row();

    $payment_due_date_notification = $this->db->select('notification_time, notification_source')->from('notification')
        ->where('menu', 'SALE - NEW SALE - PAYMENT DUE DATE')->where('unique_id', $_SESSION['unique_id']) ->get()->row();

    $adjusted_eta = $eta_notification ? $this->applyDateAdjustment($eta, $eta_notification->notification_time, $eta_notification->notification_source) : $eta;
    $adjusted_etd = $etd_notification ? $this->applyDateAdjustment($etd, $etd_notification->notification_time, $etd_notification->notification_source) : $etd;
    $adjusted_payment_due_date = $payment_due_date_notification ? $this->applyDateAdjustment($payment_due_date, $payment_due_date_notification->notification_time, $payment_due_date_notification->notification_source) : $payment_due_date;

    return [
        'adjusted_eta' => $adjusted_eta,
        'adjusted_eta_notification_time' => $eta_notification ? $eta_notification->notification_time : null,
        'adjusted_eta_notification_source' => $eta_notification ? $eta_notification->notification_source : null,
        'adjusted_etd' => $adjusted_etd,
        'adjusted_etd_notification_time' => $etd_notification ? $etd_notification->notification_time : null,
        'adjusted_etd_notification_source' => $etd_notification ? $etd_notification->notification_source : null,
        'adjusted_payment_due_date' => $adjusted_payment_due_date,
        'adjusted_payment_due_date_notification_time' => $payment_due_date_notification ? $payment_due_date_notification->notification_time : null,
        'adjusted_payment_due_date_notification_source' => $payment_due_date_notification ? $payment_due_date_notification->notification_source : null,
    ];
}
function adjustDatesBasedOnNotifications_ocean($eta, $etd) {
    $eta_notification = $this->db->select('notification_time, notification_source')->from('notification')
        ->where('menu', 'SALE - OCEAN EXPORT TRACKING - ETA')->where('unique_id', $_SESSION['unique_id'])->get()->row();

    $etd_notification = $this->db->select('notification_time, notification_source')->from('notification')
        ->where('menu', 'SALE - OCEAN EXPORT TRACKING - ETD') ->where('unique_id', $_SESSION['unique_id']) ->get()->row();

    $adjusted_eta = $eta_notification ? $this->applyDateAdjustment($eta, $eta_notification->notification_time, $eta_notification->notification_source) : $eta;
    $adjusted_etd = $etd_notification ? $this->applyDateAdjustment($etd, $etd_notification->notification_time, $etd_notification->notification_source) : $etd;
   

    return [
        'adjusted_eta' => $adjusted_eta,
        'adjusted_eta_notification_time' => $eta_notification ? $eta_notification->notification_time : null,
        'adjusted_eta_notification_source' => $eta_notification ? $eta_notification->notification_source : null,
        'adjusted_etd' => $adjusted_etd,
        'adjusted_etd_notification_time' => $etd_notification ? $etd_notification->notification_time : null,
        'adjusted_etd_notification_source' => $etd_notification ? $etd_notification->notification_source : null
        ];
}
function adjustDatesBasedOnNotifications_truck($delivery_date,$container_pickup_date) {
 
        $eta_notification = $this->db->select('notification_time, notification_source')->from('notification')
        ->where('menu', 'SALE - TRUCKING - DELIVERY DATE')->where('unique_id', $_SESSION['unique_id'])->get()->row();

    $etd_notification = $this->db->select('notification_time, notification_source')->from('notification')
        ->where('menu', 'SALE - TRUCKING - CONTAINER PICKUP DATE') ->where('unique_id', $_SESSION['unique_id']) ->get()->row();

    $delivery_date_adj = $eta_notification ? $this->applyDateAdjustment($delivery_date, $eta_notification->notification_time, $eta_notification->notification_source) : $eta;
    $container_pickupdate_adj = $etd_notification ? $this->applyDateAdjustment($container_pickup_date, $etd_notification->notification_time, $etd_notification->notification_source) : $etd;
   

    return [
        'delivery_date' => $delivery_date_adj,
        'adjusted_delivery_time' => $delivery_date_adj ? $eta_notification->notification_time : null,
        'adjusted_delivery_source' => $delivery_date_adj ? $eta_notification->notification_source : null,
        'container_pickupdate' => $container_pickupdate_adj,
        'adjusted_container_pickupdate_time' => $container_pickupdate_adj ? $etd_notification->notification_time : null,
        'adjusted_container_pickupdate_source' => $container_pickupdate_adj ? $etd_notification->notification_source : null
        ];
}




    public function invoice_entry() {

       $this->load->model('Web_settings');
        $tablecolumn = $this->db->list_fields('tax_collection');
        $num_column = count($tablecolumn)-4;
        $invoice_id = $this->generator(10);
      //  $invoice_id = strtoupper($invoice_id);
        $createby=$this->session->userdata('user_id');
        $createdate=date('Y-m-d H:i:s');
        $quantity = $this->input->post('product_quantity',TRUE);
        $invoice_no_generated = $this->number_generator();
        $changeamount = $this->input->post('change',TRUE);
        if($changeamount > 0){
           $paidamount = $this->input->post('n_total',TRUE);
        }else{
             $paidamount = $this->input->post('paid_amount',TRUE);
        }
     $bank_id = $this->input->post('bank_id',TRUE);
        if(!empty($bank_id)){
       $bankname = $this->db->select('bank_name')->from('bank_add')->where('bank_id',$bank_id)->get()->row()->bank_name;
       $bankcoaid = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName',$bankname)->get()->row()->HeadCode;
   }else{
    $bankcoaid='';
   }
        $available_quantity = $this->input->post('available_quantity',TRUE);
        $currency_details = $this->Web_settings->retrieve_setting_editdata();
        $result = array();
        $product_id = $this->input->post('product_id',TRUE);
        if ($product_id == null) {
        }
        if (($this->input->post('customer_id') == null ) && ($this->input->post('customer_name') == null )) {
            $data = array(
            'create_by'    =>$this->session->userdata('user_id'),
            'customer_name'    => $this->input->post('customer_name',TRUE),
            'customer_address' => $this->input->post('customer_address',TRUE),
            'customer_mobile'  => $this->input->post('customer_mobile',TRUE),
            'customer_email'   => "",
            'status'           => 2
            );
            $this->db->insert('customer_information', $data);
            $customer_id = $this->db->insert_id();
             $coa = $this->headcode();

           if($coa->HeadCode!=NULL){
                $headcode=$coa->HeadCode+1;
              // die();
           }else{
                $headcode="102030001";
            }
             $c_acc=$customer_id.'-'.$this->input->post('customer_name',TRUE);
            $createby=$this->session->userdata('user_id');
            $createdate=date('Y-m-d H:i:s');
            $customer_coa = [
                'HeadCode'         => $headcode,
                'HeadName'         => $c_acc,
                'PHeadName'        => 'Customer Receivable',
                'HeadLevel'        => '4',
                'IsActive'         => '1',
                'IsTransaction'    => '1',
                'IsGL'             => '0',
                'HeadType'         => 'A',
                'IsBudget'         => '0',
                'IsDepreciation'   => '0',
                'DepreciationRate' => '0',
                'CreateBy'         => $createby,
                'CreateDate'       => $createdate,
           ];
      $this->db->insert('acc_coa',$customer_coa);

            $this->db->select('*');
            $this->db->from('customer_information');
            $this->db->where('create_by',$this->session->userdata('user_id'));
            $query = $this->db->get();
            foreach ($query->result() as $row) {
                $json_customer[] = array('label' => $row->customer_name, 'value' => $row->customer_id);
            }
            $cache_file = './my-assets/js/admin_js/json/customer.json';
            $customerList = json_encode($json_customer);
            file_put_contents($cache_file, $customerList);
            //Previous balance adding -> Sending to customer model to adjust the data.
            $this->Customers->previous_balance_add(0, $customer_id);
        } else {
            $customer_id = $this->input->post('customer_id',TRUE);
        }
        //Full or partial Payment record.
        $paid_amount = $this->input->post('paid_amount',TRUE);
        if ($this->input->post('paid_amount',TRUE) >= 0) {
            $this->db->set('status', '1');
            $this->db->where('customer_id', $customer_id);
            $this->db->update('customer_information');
               }
            $transection_id = $this->auth->generator(15);
             for($j=0;$j<$num_column;$j++){
                $taxfield = 'tax'.$j;
                $taxvalue = 'total_tax'.$j;
              $taxdata[$taxfield]=$this->input->post($taxvalue);
            }
            $taxdata['customer_id'] = $customer_id;
            $taxdata['date']        = (!empty($this->input->post('invoice_date',TRUE))?$this->input->post('invoice_date',TRUE):date('Y-m-d'));
          //  $taxdata['relation_id'] = $invoice_id;
            $this->db->insert('tax_collection',$taxdata);
            // Inserting for Accounts adjustment.
            ############ default table :: customer_payment :: inflow_92mizdldrv #################
            $payment_id=$this->input->post('payment_id');
        //Data inserting into invoice table
        $datainv = array(
            'sales_by'        => $this->session->userdata('user_id'),
            'status'          => 1,
             'invoice_id'      => $invoice_id,
            'customer_id'     => $this->input->post('customer_name',TRUE),
            'date'            => $this->input->post('invoice_date',TRUE),
              'commercial_invoice_number' => $this->input->post('commercial_invoice_number',TRUE),
            'billing_address' => $this->input->post('billing_address',TRUE),
            'container_no' => $this->input->post('container_no',TRUE),
            'bl_no' => $this->input->post('bl_no',TRUE),
           'gtotal'    => $this->input->post('gtotal',TRUE),
              'gtotal_preferred_currency'    => $this->input->post('customer_gtotal',TRUE),
            'total_amount'    => $this->input->post('Over_all_Total',TRUE),
            'total_tax'       => $this->input->post('tax_details',TRUE),
             'etd' =>$this->input->post('etd',TRUE),
             
               'Port_of_discharge' => $this->input->post('Port_of_discharge',TRUE),
               'sc_emp_name' => $this->input->post('selected_text',TRUE),
               
             'user_emp_id' => $this->input->post('emp_id',TRUE),
              'eta'  =>$this->input->post('eta',TRUE),
               'payment_terms'   =>$this->input->post('terms',TRUE),
               'remark' =>$this->input->post('remark',TRUE),
               'ac_details' => $this->input->post('ac_details',TRUE),
             'due_amount'      => $this->input->post('balance',TRUE),
           'total_gross' =>  $this->input->post('total_gross',TRUE),
            'amount_pay_usd'    =>  $this->input->post('paid_convert',TRUE),
            'due_amount_usd'    =>  $this->input->post('bal_convert',TRUE)    ,
                'total_net' =>  $this->input->post('total_net',TRUE),
             'paid_amount'     => $this->input->post('amount_paid',TRUE),
             'payment_id'=>$this->input->post('payment_id',TRUE),
                'total_weight'=>$this->input->post('total_weight',TRUE),
             'payment_due_date'     => $this->input->post('payment_due_date',TRUE),
            'shipping_address'   => $this->input->post('shipping_address',TRUE),
            'payment_type'    =>  $this->input->post('paytype',TRUE),
            'bank_id'         =>  $this->input->post('bank',TRUE),
            'account_category' => $this->input->post('account_category', true),  
            'sub_category' => $this->input->post('sub_category', true),
            'account_subcat' => $this->input->post('account_subcat', true),
        );
     $purchase_id_1 = $this->db->where('commercial_invoice_number',$this->input->post('commercial_invoice_number',TRUE));
        $q=$this->db->get('invoice');
        $row = $q->row_array();
   if(!empty($row['invoice_id'])){
        $this->session->set_userdata("sale_1",$row['invoice_id']);
        $this->db->where('commercial_invoice_number',$this->input->post('commercial_invoice_number',TRUE));
        $this->db->delete('invoice');
        $this->db->insert('invoice', $datainv);
// echo $this->db->last_query();
    }
    else{
    //    print_r($datainv);
    //    die("here it is");
    $this->db->insert('invoice', $datainv);
  //   echo $this->db->last_query();
    }
      $purchase_id = $this->db->select('invoice_id')->from('invoice')->where('invoice_id',$invoice_id)->get()->row()->invoice_id;
       $this->session->set_userdata("sale_2",$purchase_id);
 $eta =  date('Y-m-d', strtotime($this->input->post('eta', TRUE))); 
  $etd = date('Y-m-d', strtotime($this->input->post('etd', TRUE))); 
   $payment_due_date = date('Y-m-d', strtotime($this->input->post('payment_due_date', TRUE))); 
 $adjusted_date = $this->adjustDatesBasedOnNotifications($eta, $etd, $payment_due_date, $unique_id);

    if($adjusted_date['adjusted_eta'] && $adjusted_date['adjusted_eta_notification_source']){
        $data_eta=array(
             'unique_id'  =>$this->session->userdata('unique_id'),
             'invoice_no'       =>$this->input->post('commercial_invoice_number',TRUE),
             'title'     => 'SALE - NEW SALE - ETA',
             'description'   => 'Scheduled ETA for Invoice ' .$this->input->post('commercial_invoice_number',TRUE).' SALE',
             'created_by' => $this->session->userdata('user_id'),
             'start'    =>$adjusted_date['adjusted_eta'],
             'invoice_id' => $invoice_id,
             'bell_notification' => ($adjusted_date['adjusted_eta_notification_source'] === 'STOCKEAI') ? 1 : '',
             'source'  => $adjusted_date['adjusted_eta_notification_source'],
             'schedule_status' =>1,
             'create_date'   => date("Y-m-d")

        );
    }
        if($adjusted_date['adjusted_etd'] && $adjusted_date['adjusted_etd_notification_source']){
        $data_etd=array(
             'unique_id'  =>$this->session->userdata('unique_id'),
             'invoice_no'       =>$this->input->post('commercial_invoice_number',TRUE),
             'title'     => 'SALE - NEW SALE - ETD',
              'invoice_id' => $invoice_id,
              'description'   => 'Scheduled ETD for Invoice ' .$this->input->post('commercial_invoice_number',TRUE).' SALE',
              'created_by' => $this->session->userdata('user_id'),
               'bell_notification' => ($adjusted_date['adjusted_etd_notification_source'] === 'STOCKEAI') ? 1 : '',
              'source'  => $adjusted_date['adjusted_etd_notification_source'],
             'start'    =>$adjusted_date['adjusted_etd'],
             'schedule_status' =>1,
             'create_date'   => date("Y-m-d")

        );
    }
       if($adjusted_date['adjusted_payment_due_date'] && $adjusted_date['adjusted_payment_due_date_notification_source']){
        $data_adjusted_payment_due_date=array(
             'unique_id'  =>$this->session->userdata('unique_id'),
             'invoice_no'       =>$this->input->post('commercial_invoice_number',TRUE),
             'title'     => 'SALE - NEW SALE - PAYMENT DUE DATE',
              'invoice_id' =>$invoice_id,
             'description'   => 'Scheduled Payment Due date for Invoice ' .$this->input->post('commercial_invoice_number',TRUE).' SALE',
              'created_by' => $this->session->userdata('user_id'),
              'source'  => $adjusted_date['adjusted_payment_due_date_notification_source'],
              'bell_notification' => ($adjusted_date['adjusted_payment_due_date_notification_source'] === 'STOCKEAI') ? 1 : '',
             'start'    =>$adjusted_date['adjusted_payment_due_date'],
             'schedule_status' =>1,
             'create_date'   => date("Y-m-d")

        );
    }
     if($adjusted_date['adjusted_eta']){
         $this->db->where('invoice_no',$this->input->post('commercial_invoice_number',TRUE));
         $this->db->where('title','SALE - NEW SALE - ETA');$this->db->delete('schedule_list');
         $this->db->insert('schedule_list', $data_eta);
    
       }
        if($adjusted_date['adjusted_etd']){
         $this->db->where('invoice_no',$this->input->post('commercial_invoice_number',TRUE));
         $this->db->where('title','SALE - NEW SALE - ETD');$this->db->delete('schedule_list');
         $this->db->insert('schedule_list', $data_etd);
         
       }
        if($adjusted_date['adjusted_payment_due_date']){
         $this->db->where('invoice_no',$this->input->post('commercial_invoice_number',TRUE));
         $this->db->where('title','SALE - NEW SALE - PAYMENT DUE DATE');$this->db->delete('schedule_list');
         $this->db->insert('schedule_list', $data_adjusted_payment_due_date);
        
       } 
//    $this->db->insert('invoice', $datainv);
        $prinfo  = $this->db->select('product_id,Avg(rate) as product_rate')->from('product_purchase_details')->where_in('product_id',$product_id)->group_by('product_id')->get()->result();
    $purchase_ave = [];
    $i=0;
    foreach ($prinfo as $avg) {
      $purchase_ave [] =  $avg->product_rate*$quantity[$i];
      $i++;
    }
   $sumval = array_sum($purchase_ave);
   $cusifo = $this->db->select('*')->from('customer_information')->where('customer_id',$customer_id)->get()->row();
    $headn = $customer_id.'-'.$cusifo->customer_name;
    $coainfo = $this->db->select('*')->from('acc_coa')->where('HeadName',$headn)->get()->row();
    $customer_headcode = $coainfo->HeadCode;
// Cash in Hand debit
      $cc = array(
      'VNo'            =>  $invoice_id,
      'Vtype'          =>  'INV',
      'VDate'          =>  $createdate,
      'COAID'          =>  1020101,
      'Narration'      =>  'Cash in Hand in Sale for Invoice No - '.$invoice_no_generated.' customer- '.$cusifo->customer_name,
      'Debit'          =>  $paidamount,
      'Credit'         =>  0,
      'IsPosted'       =>  1,
      'CreateBy'       =>  $createby,
      'CreateDate'     =>  $createdate,
      'IsAppove'       =>  1
    );
     // bank ledger
 $bankc = array(
      'VNo'            =>  $invoice_id,
      'Vtype'          =>  'INV',
      'VDate'          =>  $createdate,
      'COAID'          =>  $bankcoaid,
      'Narration'      =>  'Paid amount for customer  Invoice No - '.$invoice_no_generated.' customer -'.$cusifo->customer_name,
      'Debit'          =>  $paidamount,
      'Credit'         =>  0,
      'IsPosted'       =>  1,
      'CreateBy'       =>  $createby,
      'CreateDate'     =>  $createdate,
      'IsAppove'       =>  1
    );
       ///Inventory credit
       $coscr = array(
      'VNo'            =>  $invoice_id,
      'Vtype'          =>  'INV',
      'VDate'          =>  $createdate,
      'COAID'          =>  10107,
      'Narration'      =>  'Inventory credit For Invoice No'.$invoice_no_generated,
      'Debit'          =>  0,
      'Credit'         =>  $sumval,//purchase price asbe
      'IsPosted'       => 1,
      'CreateBy'       => $createby,
      'CreateDate'     => $createdate,
      'IsAppove'       => 1
    );
       $this->db->insert('acc_transaction',$coscr);
    // Customer Transactions
    //Customer debit for Product Value
    $cosdr = array(
      'VNo'            =>  $invoice_id,
      'Vtype'          =>  'INV',
      'VDate'          =>  $createdate,
      'COAID'          =>  $customer_headcode,
      'Narration'      =>  'Customer debit For Invoice No -  '.$invoice_no_generated.' Customer '.$cusifo->customer_name,
      'Debit'          =>  $this->input->post('n_total',TRUE)-(!empty($this->input->post('previous',TRUE))?$this->input->post('previous',TRUE):0),
      'Credit'         =>  0,
      'IsPosted'       => 1,
      'CreateBy'       => $createby,
      'CreateDate'     => $createdate,
      'IsAppove'       => 1
    );
       $this->db->insert('acc_transaction',$cosdr);
         $pro_sale_income = array(
      'VNo'            =>  $invoice_id,
      'Vtype'          =>  'INV',
      'VDate'          =>  $createdate,
      'COAID'          =>  303,
      'Narration'      =>  'Sale Income For Invoice NO - '.$invoice_no_generated.' Customer '.$cusifo->customer_name,
      'Debit'          =>  0,
      'Credit'         =>  $this->input->post('n_total',TRUE)-(!empty($this->input->post('previous',TRUE))?$this->input->post('previous',TRUE):0),
      'IsPosted'       => 1,
      'CreateBy'       => $createby,
      'CreateDate'     => $createdate,
      'IsAppove'       => 1
    );
       $this->db->insert('acc_transaction',$pro_sale_income);
       ///Customer credit for Paid Amount
       $cuscredit = array(
      'VNo'            =>  $invoice_id,
      'Vtype'          =>  'INV',
      'VDate'          =>  $createdate,
      'COAID'          =>  $customer_headcode,
      'Narration'      =>  'Customer credit for Paid Amount For Customer Invoice NO- '.$invoice_no_generated.' Customer- '.$cusifo->customer_name,
      'Debit'          =>  0,
      'Credit'         =>  $paidamount,
      'IsPosted'       => 1,
      'CreateBy'       => $createby,
      'CreateDate'     => $createdate,
      'IsAppove'       => 1
    );
       if(!empty($this->input->post('paid_amount',TRUE))){
            $this->db->insert('acc_transaction',$cuscredit);
       }
            if($this->input->post('paytype',TRUE) == "CASH"){
        $this->db->insert('acc_transaction',$cc);
        }
        else {
                $this->db->insert('acc_transaction',$bankc);
        }
     $customerinfo = $this->db->select('*')->from('customer_information')->where('customer_id',$customer_id)->get()->row();
        $prodt                = $this->input->post('prodt',TRUE);
        $product_id =$this->input->post('product_id',TRUE);
  $desc =$this->input->post('description',TRUE);
  $thickness=$this->input->post('thickness',TRUE);
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
               $slab_no=$this->input->post('slab_no',TRUE);
               $weight=$this->input->post('weight',TRUE);
                $origin=$this->input->post('origin',TRUE);
                $tableid=$this->input->post('tableid',TRUE);
                 $total_amt=$this->input->post('total_amt',TRUE);
                 $total=$this->input->post('total',TRUE);
                 $landing_cost =$this->input->post('l_cost',TRUE);
                   $landing_cost_slab =$this->input->post('l_cost_slab',TRUE);
                   $overall_gross=$this->input->post('overall_gross',TRUE);
                   $overall_net=$this->input->post('overall_net',TRUE);
$product_id=$this->input->post('product_id',TRUE);
$this->db->where('invoice_id', $this->session->userdata("sale_1"));
            $this->db->delete('invoice_details');
          //   echo $this->db->last_query();
        for ($i = 0, $n = count($product_id); $i < $n; $i++) {
            $prodt_name = $prodt[$i];
$data1 = array(
     'create_by'        => $this->session->userdata('user_id'),
                // 'invoice_details_id' => $this->generator(15),
                'invoice_id'         => $invoice_id,
                'product_id'         =>$product_id[$i],
                'product_name'   => $prodt[$i],
                'description'          => $desc[$i],
                'thickness'           => $thickness[$i],
                'tableid'   => $tableid[$i],
                'landing_cost' => $landing_cost[$i],
                'landing_cost_slab'   => $landing_cost_slab[$i],
                'supplier_block_no'               => $supplier_b_no[$i],
                'supplier_slab_no'           => $supplier_slab_no[$i],
              'total_price'  => $total_amt[$i],
              'overall_total'   => $total[$i],
              'slab_no' => $slab_no[$i],
              'overall_gross'  => $overall_gross[$i],
               'overall_net'  =>$overall_net[$i],
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
            $this->db->insert('invoice_details', $data1);
  $invoice_get_info2 = array(
                                    'create_by'           => $this->session->userdata('user_id'),                       
                                    'product_id'          =>$product_id[$i],
                                    'description_table'         => trim($desc[$i]),
                                    'thickness'           => trim($thickness[$i]),
                                    'supplier_block_no'   => $supplier_b_no[$i],
                                    'supplier_slab_no'    => $supplier_slab_no[$i],
                                    'g_width'             => $gross_width[$i],
                                    'g_height'            => $gross_height[$i],
                                    'bundle_no'           => $bundle_no[$i],
                                    'n_width'             => $net_width[$i],
                                    'n_height'            => $net_height[$i],
                                    'cost_sqft'           => $cost_sq_ft[$i],
                                    'cost_slab'           => $cost_sq_slab[$i],
                                    'sales_price_sqft'    => $sales_amt_sq_ft[$i],
                                    'weight'              => $weight[$i]
                                 );
                                // Check if the record already exists
                                $this->db->where($invoice_get_info2);
                                $query = $this->db->get('product_details');
                               $num_rows = mysqli_num_rows($query);
                             
                                if ($query->num_rows() <= 0) {
                                    $invoice_get_info3 = array(
                                        'invoice_id'         => $this->session->userdata("sale_2"),
                                        'create_by'           => $this->session->userdata('user_id'),                       
                                        'product_id'          =>$product_id[$i],
                                        'description_table'         => trim($desc[$i]),
                                        'thickness'           => trim($thickness[$i]),
                                        'supplier_block_no'   => $supplier_b_no[$i],
                                        'supplier_slab_no'    => $supplier_slab_no[$i],
                                        'g_width'             => $gross_width[$i],
                                        'g_height'            => $gross_height[$i],
                                        'bundle_no'           => $bundle_no[$i],
                                        'n_width'             => $net_width[$i],
                                        'n_height'            => $net_height[$i],
                                        'cost_sqft'           => $cost_sq_ft[$i],
                                        'cost_slab'           => $cost_sq_slab[$i],
                                        'sales_price_sqft'    => $sales_amt_sq_ft[$i],
                                        'weight'              => $weight[$i],
                                        'sales'           => 'sales'

                                     );
                                    // Check if the record already exists
                                    $this->db->where($invoice_get_info3);
                                    $query2 = $this->db->get('product_details_history');
                                 //   $this->db->insert('product_details_history', $invoice_get_info2);
                                   // echo $this->db->last_query();
                                 
                                    if ($query2->num_rows() <= 0) {
                                    // Record does not exist, insert the data
                                    $this->db->insert('product_details_history', $invoice_get_info3);
                                  //   echo $this->db->last_query();
                                    }else{
                                        $this->db->delete('product_details_history', $invoice_get_info3);
                                        //  echo $this->db->last_query();
                                    }
                   
                                }


         }
 

        $message = 'Mr.'.$customerinfo->customer_name.',
        '.'You have purchase  '.$this->input->post('grand_total_price',TRUE).' '. $currency_details[0]['currency'].' You have paid .'.$this->input->post('paid_amount',TRUE).' '. $currency_details[0]['currency'];
   $config_data = $this->db->select('*')->from('sms_settings')->get()->row();
        if($config_data->isinvoice == 1){
          $this->smsgateway->send([
            'apiProvider' => 'nexmo',
            'username'    => $config_data->api_key,
            'password'    => $config_data->api_secret,
            'from'        => $config_data->from,
            'to'          => $customerinfo->customer_mobile,
            'message'     => $message
        ]);
      }
        return $invoice_id."/".$this->input->post('commercial_invoice_number',TRUE);
    

 }















    public function get_product_supplier_block($supplier_block_no=null){
  $this->db->select('*');

        $this->db->from('product_information a');
        $this->db->join('product_details b', 'b.product_id = a.product_id');
         $this->db->where('b.supplier_block_no', $supplier_block_no);
          
        $this->db->where('b.create_by',$this->session->userdata('user_id'));

        $query = $this->db->get();
        return $query->result_array();
    }
          public function servic_provider_list(){
        $this->db->select("*");
        $this->db->from('service') ;
        $this->db->where('create_by',$this->session->userdata('user_id'));
     //   $this->db->where('service_provider','1');
     

       $query = $this->db->get();
       if ($query->num_rows() > 0) {
           return $query->result_array();
       }
      // return false;

       

   }
    public function product_bundle_datas($bundle_no){
  $this->db->select('*');

        $this->db->from('product_information a');
        $this->db->join('product_details b', 'b.product_id = a.product_id');
         $this->db->where('b.bundle_no', $bundle_no);
          
        $this->db->where('b.create_by',$this->session->userdata('user_id'));

        $query = $this->db->get();
        return $query->result_array();

}
    public function service_invoice_details(){
        $invoice_id=  $this->input->post('dum_invoice',TRUE);
                   $s_p =$this->input->post('s_p',TRUE);
           $sp_description =$this->input->post('sp_description',TRUE);
           $sp_qty=$this->input->post('sp_qty',TRUE);
           $sp_rate =$this->input->post('sp_rate',TRUE);
           $sp_total =$this->input->post('sp_total',TRUE);

              $purchase_id_1 = $this->db->where('invoice_id', $invoice_id);
        $q=$this->db->get('invoice_servide_details');
        $row = $q->row_array();
   if(!empty($row['invoice_id'])){
       
        $this->db->where('invoice_id',$invoice_id);
        $this->db->delete('invoice_servide_details');
       
   }


          
           for ($i = 0, $n = count($sp_total); $i < $n; $i++) {
            $sp = $s_p[$i];
            $spdescription = $sp_description[$i];
            $spqty = $sp_qty[$i];
            $sprate = $sp_rate[$i];
            $sptotal = $sp_total[$i];
$data = array(
     'created_by'        => $this->session->userdata('user_id'),
     'invoice_id'         => $invoice_id,
     'service_provider'         =>$s_p[$i],
     'Description'         =>$sp_description[$i],
     'Quantity'         =>$sp_qty[$i],
     'Rate'         =>$sp_rate[$i],
     'Total'         =>$sp_total[$i],
);

 $this->db->insert('invoice_servide_details', $data);

           }
    }




    public function getAllProfarmadata()
    {
       $user_id = $this->session->userdata('user_id');

        $sql="SELECT * FROM `tax_information` WHERE (`status_type` = 'sales' OR `status_type` = 'Both') AND `created_by` = $user_id";

        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {

            return $query->result_array();

        }

        return false;
    }







    private function stripHTMLtags($str)
    {
        $t = preg_replace('/<[^<|>]+?>/', '', htmlspecialchars_decode($str));
        $t = htmlentities($t, ENT_QUOTES, "UTF-8");
        return $t;
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
           
          $button .='  <a href="'.$base_url.'Cinvoice/packing_list_details_data/'.$record->expense_packing_id.'" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="left" title="Packing Download"><i class="fa fa-window-restore" aria-hidden="true"></i></a>';

           $button .='  <a href="'.$base_url.'Cinvoice/packing_list_details_data/'.$record->expense_packing_id.'" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="left" title="Packing List Detail"><i class="fa fa-window-restore" aria-hidden="true"></i></a>';
              if($this->permission1->method('manage_purchase','update')->access()){
                 $button .=' <a href="'.$base_url.'Cpurchase/packing_list_update_form/'.$record->expense_packing_id.'" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="'. display('update').'"><i class="fa fa-pencil" aria-hidden="true"></i></a> ';
             }

     

         $purchase_ids ='<a href="'.$base_url.'Cinvoice/packing_details_data/'.$record->expense_packing_id.'">'.$record->expense_packing_id.'</a>';
               
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




         //Ocean Import Entry
         public function ocean_export_entry() {
            $purchase_id = date('YmdHis');
          
       $data = array(
            'customs_broker_name' => $this->input->post('customs_broker_name',TRUE),
              'mbl_no' => $this->input->post('mbl_no',TRUE),
              'hbl_no' => $this->input->post('hbl_no',TRUE),
              'obl_no' => $this->input->post('obl_no',TRUE),
              'ams_no' => $this->input->post('ams_no',TRUE),
              'isf_no' => $this->input->post('isf_no',TRUE),
               'ocean_export_tracking_id'        => $purchase_id,
                'booking_no'          => $this->input->post('booking_no',TRUE),
                'container_no' =>$this->input->post('container_no',TRUE),
                'seal_no'      =>$this->input->post('seal_no',TRUE),
                'etd'   => $this->input->post('etd',TRUE),
                'eta'   => $this->input->post('eta',TRUE),
                'supplier_id'        => $this->input->post('supplier_id',TRUE),
                'shipper' => $this->input->post('supplier_id',TRUE),
                'invoice_date' => $this->input->post('invoice_date',TRUE),
             
                'consignee' => $this->input->post('consignee',TRUE),
                'notify_party' => $this->input->post('notify_party',TRUE),
                'vessel' => $this->input->post('vessel',TRUE),
                'voyage_no' =>$this->input->post('voyage_no',TRUE),
                'port_of_loading' => $this->input->post('port_of_loading',TRUE),
                'port_of_discharge' => $this->input->post('port_of_discharge',TRUE),
                'place_of_delivery' =>$this->input->post('place_of_delivery',TRUE),
                'freight_forwarder' =>$this->input->post('freight_forwarder',TRUE),
                'particular'   => $this->input->post('particulars',TRUE),
              
               
                'status'             => 1,
                'create_by'       =>  $this->session->userdata('user_id'),
            );
          
            $purchase_id_1 = $this->db->where('booking_no',$this->input->post('booking_no',TRUE));
            $q=$this->db->get('ocean_export_tracking');
            $row = $q->row_array();
        if(!empty($row['booking_no'])){
            $this->session->set_userdata("ocean_export_1",$row['booking_no']);
          
            $this->db->where('booking_no',$this->input->post('booking_no',TRUE));
     
            $this->db->delete('ocean_export_tracking');
           $this->db->insert('ocean_export_tracking', $data);
       }   
        else{
        $this->db->insert('ocean_export_tracking', $data);
    
     
        }
     return $purchase_id."/".$this->input->post('booking_no',TRUE);
        }
    




    //Get Supplier rate of a product

    public function supplier_rate($product_id) {

        $this->db->select('supplier_price');

        $this->db->from('supplier_product');

        $this->db->where(array('product_id' => $product_id));
        $this->db->where('created_by',$this->session->userdata('user_id'));

        $query = $this->db->get();

        return $query->result_array();



        $this->db->select('Avg(rate) as supplier_price');

        $this->db->from('product_purchase_details');
        $this->db->where('create_by',$this->session->userdata('user_id'));
        $this->db->where(array('product_id' => $product_id));

        $query = $this->db->get()->row();

        return $query->result_array();

    }



     public function supplier_price($product_id) {
        $this->db->where('created_by',$this->session->userdata('user_id'));
        $this->db->where(array('product_id' => $product_id));
       
        $q = $this->db->get('supplier_product');
        $data = $q->result_array();
       


        $this->db->select('Avg(rate) as supplier_price');
        $this->db->where('create_by',$this->session->userdata('user_id'));
        $this->db->where(array('product_id' => $product_id));
        $q = $this->db->get('product_purchase_details');
        $data1 = $q->result_array();
        
    
   if (!empty($data[0]['supplier_price']) && $data[0]['supplier_price'] !== '') {
     
       
        return $data[0]['supplier_price'];

      }elseif (!empty($data1[0]['supplier_price']) &&  $data1[0]['supplier_price']!== '') {
       
      
        return $data1[0]['supplier_price'];
      }else{
      
        $price= '0';
       
        return $price;
      }

    

    }

    public function product_search_item($product_model, $product_name) {
        $this->db->select('*');

        $this->db->from('product_information a');
        $this->db->join('product_details b', 'b.product_id = a.product_id');
         $this->db->where('a.product_name', $product_name);
            $this->db->where('a.product_model', $product_model);
        $this->db->where('created_by',$this->session->userdata('user_id'));

        $query = $this->db->get();
        // echo $this->db->last_query();
        return $query->result_array();
      


    }



    //Retrieve invoice Edit Data

    public function retrieve_invoice_editdata($invoice_id) {

   $this->db->select('a.*, sum(c.quantity) as sum_quantity, a.total_tax as taxs,a. due_amount,a. paid_amount,b.customer_name,c.*,c.tax as total_tax,c.product_id,d.product_name,d.product_model,d.tax,d.unit,d.*');

      //  $this->db->select('a.*, sum(c.quantity) as sum_quantity, a.total_tax as taxs,a. due_amount,a. paid_amount,b.customer_name,c.*,c.tax as total_tax,c.product_id,d.product_name,d.product_model,d.tax,d.unit,d.*');
        $this->db->from('invoice a');

        $this->db->join('customer_information b', 'b.customer_id = a.customer_id');

        $this->db->join('invoice_details c', 'c.invoice_id = a.invoice_id');

        $this->db->join('product_information d', 'd.product_id = c.product_id');

        $this->db->where('a.invoice_id', $invoice_id);
        $this->db->where('a.sales_by',$this->session->userdata('user_id'));
      //  $this->db->group_by('c.tableid');



        $query = $this->db->get();

//echo $this->db->last_query();

        if ($query->num_rows() > 0) {
 
            return $query->result_array();

        }

  

    }


    public function retrieve_profarma_invoice_editdata($invoice_id) {

        $this->db->select('a.*, sum(c.quantity) as sum_quantity,b.customer_name,c.*,c.product_id,d.product_name,d.product_model,d.tax,d.unit');

        $this->db->from('profarma_invoice a');

        $this->db->join('customer_information b', 'b.customer_id = a.customer_id');

        $this->db->join('profarma_invoice_details c', 'c.purchase_id = a.purchase_id');

        $this->db->join('product_information d', 'd.product_id = c.product_id');

        $this->db->where('a.purchase_id', $invoice_id);
        $this->db->where('a.sales_by',$this->session->userdata('user_id'));
        $this->db->group_by('c.tableid');



        $query = $this->db->get();




 // print_r($sql);
  //die();

        if ($query->num_rows() > 0) {

            return $query->result_array();

        }

      //  return true;

    }


    //update_invoice

    public function update_invoice() {

        $tablecolumn = $this->db->list_fields('tax_collection');

        $num_column  = count($tablecolumn)-4;

        $invoice_id  = $this->input->post('invoice_id',TRUE);



        $invoice_no  = $this->input->post('invoice',TRUE);

        $createby    = $this->session->userdata('user_id');

        $createdate  = date('Y-m-d H:i:s');

        $customer_id = $this->input->post('customer_id',TRUE);

        $quantity    = $this->input->post('product_quantity',TRUE);

        $product_id  = $this->input->post('product_id',TRUE);



       $changeamount = $this->input->post('change',TRUE);

        if($changeamount > 0){

        $paidamount = $this->input->post('n_total',TRUE);



        }else{

        $paidamount = $this->input->post('paid_amount',TRUE);

        }





   $bank_id = $this->input->post('bank_id',TRUE);

        if(!empty($bank_id)){

       $bankname = $this->db->select('bank_name')->from('bank_add')->where('bank_id',$bank_id)->get()->row()->bank_name;

    

       $bankcoaid = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName',$bankname)->get()->row()->HeadCode;

   }else{

    $bankcoaid='';

   }

   

             $transection_id = $this->auth->generator(15);





            $this->db->where('VNo', $invoice_id);

            $this->db->delete('acc_transaction');

            $this->db->where('relation_id', $invoice_id);

            $this->db->delete('tax_collection');

      

        $data = array(

            'invoice_id'      => $invoice_id,

            'customer_id'     => $this->input->post('customer_id',TRUE),

            'date'            => $this->input->post('invoice_date',TRUE),

              'commercial_invoice_number' => $this->input->post('commercial_invoice_number',TRUE),

            'billing_address' => $this->input->post('billing_address',TRUE),

            'container_no' => $this->input->post('container_no',TRUE),

            'bl_no' => $this->input->post('bl_no',TRUE),

           'gtotal'    => $this->input->post('gtotal',TRUE),
 'gtotal_preferred_currency'    => $this->input->post('customer_gtotal',TRUE),
            'total_amount'    => $this->input->post('total',TRUE),

            'total_tax'       => $this->input->post('tax_details',TRUE),
             'etd' =>$this->input->post('etd',TRUE),
              'eta'  =>$this->input->post('eta',TRUE),
               'payment_terms'   =>$this->input->post('payment_terms',TRUE),  
               'remark' =>$this->input->post('remark',TRUE),  
               'ac_details' => $this->input->post('ac_details',TRUE),  
             'due_amount'      => $this->input->post('balance',TRUE),

             'paid_amount'     => $this->input->post('amount_paid',TRUE),
             'payment_id'=>$this->input->post('payment_id',TRUE),

            // 'invoice_discount'=> $this->input->post('invoice_discount',TRUE),

            // 'total_discount'  => $this->input->post('total_discount',TRUE),

            // 'prevous_due'     => $this->input->post('previous',TRUE),

            'shipping_address'   => $this->input->post('shipping_address',TRUE),

            'payment_type'    =>  $this->input->post('paytype',TRUE),

            'bank_id'         =>  $this->input->post('bank',TRUE),

        );

   

      



     

        $prinfo  = $this->db->select('product_id,Avg(rate) as product_rate')->from('product_purchase_details')->where_in('product_id',$product_id)->group_by('product_id')->get()->result(); 

    $purchase_ave = [];

    $i=0;

    foreach ($prinfo as $avg) {

      $purchase_ave [] =  $avg->product_rate*$quantity[$i];

      $i++;

    }

   $sumval = array_sum($purchase_ave);



   $cusifo = $this->db->select('*')->from('customer_information')->where('customer_id',$customer_id)->get()->row();

    $headn = $customer_id.'-'.$cusifo->customer_name;

    $coainfo = $this->db->select('*')->from('acc_coa')->where('HeadName',$headn)->get()->row();

    $customer_headcode = $coainfo->HeadCode;

// Cash in Hand debit

      $cc = array(

      'VNo'            =>  $invoice_id,

      'Vtype'          =>  'INV',

      'VDate'          =>  $createdate,

      'COAID'          =>  1020101,

      'Narration'      =>  'Cash in Hand for sale for Invoice No -'.$invoice_no.' Customer '.$cusifo->customer_name,

      'Debit'          =>  $paidamount,

      'Credit'         =>  0,

      'IsPosted'       =>  1,

      'CreateBy'       =>  $createby,

      'CreateDate'     =>  $createdate,

      'IsAppove'       =>  1

    ); 

     



       ///Inventory credit

       $coscr = array(

      'VNo'            =>  $invoice_id,

      'Vtype'          =>  'INV',

      'VDate'          =>  $createdate,

      'COAID'          =>  10107,

      'Narration'      =>  'Inventory credit For Invoice No'.$invoice_no,

      'Debit'          =>  0,

      'Credit'         =>  $sumval,//purchase price asbe

      'IsPosted'       => 1,

      'CreateBy'       => $createby,

      'CreateDate'     => $createdate,

      'IsAppove'       => 1

    ); 

       $this->db->insert('acc_transaction',$coscr);

       

        // bank ledger

 $bankc = array(

      'VNo'            =>  $invoice_id,

      'Vtype'          =>  'INVOICE',

      'VDate'          =>  $createdate,

      'COAID'          =>  $bankcoaid,

      'Narration'      =>  'Paid amount for  Invoice NO- '.$invoice_no.' customer '.$cusifo->customer_name,

      'Debit'          =>  $paidamount,

      'Credit'         =>  0,

      'IsPosted'       =>  1,

      'CreateBy'       =>  $createby,

      'CreateDate'     =>  $createdate,

      'IsAppove'       =>  1

    ); 



/// Sale income

   $pro_sale_income = array(

      'VNo'            =>  $invoice_id,

      'Vtype'          =>  'INVOICE',

      'VDate'          =>  $createdate,

      'COAID'          =>  303,

      'Narration'      =>  'Sale Income From Invoice NO - '.$invoice_no.' Customer '.$cusifo->customer_name,

      'Debit'          =>  0,

      'Credit'         =>  $this->input->post('n_total',TRUE)-(!empty($this->input->post('previous',TRUE))?$this->input->post('previous',TRUE):0),

      'IsPosted'       => 1,

      'CreateBy'       => $createby,

      'CreateDate'     => $createdate,

      'IsAppove'       => 1

    ); 

       $this->db->insert('acc_transaction',$pro_sale_income);

    //Customer debit for Product Value

    $cosdr = array(

      'VNo'            =>  $invoice_id,

      'Vtype'          =>  'INV',

      'VDate'          =>  $createdate,

      'COAID'          =>  $customer_headcode,

      'Narration'      =>  'Customer debit For Invoice NO - '.$invoice_no.' customer-  '.$cusifo->customer_name,

      'Debit'          =>  $this->input->post('grand_total_price',TRUE),

      'Credit'         =>  0,

      'IsPosted'       => 1,

      'CreateBy'       => $createby,

      'CreateDate'     => $createdate,

      'IsAppove'       => 1

    ); 

       $this->db->insert('acc_transaction',$cosdr);



       ///Customer credit for Paid Amount

       $customer_credit = array(

      'VNo'            =>  $invoice_id,

      'Vtype'          =>  'INV',

      'VDate'          =>  $createdate,

      'COAID'          =>  $customer_headcode,

      'Narration'      =>  'Customer credit for Paid Amount For Invoice No -'.$invoice_no.' Customer '.$cusifo->customer_name,

      'Debit'          =>  0,

      'Credit'         =>  $paidamount,

      'IsPosted'       => 1,

      'CreateBy'       => $createby,

      'CreateDate'     => $createdate,

      'IsAppove'       => 1

    ); 



if ($invoice_id != '') {

            $this->db->where('invoice_id', $invoice_id);

            $this->db->update('invoice', $data);

        }

if(!empty($this->input->post('paid_amount',TRUE))){

            $this->db->insert('acc_transaction',$customer_credit);

        if($this->input->post('paytype') == 2){

        $this->db->insert('acc_transaction',$bankc);

   

        }

            if($this->input->post('paytype') == 1){

        $this->db->insert('acc_transaction',$cc);

        }

       

  }



     



         for($j=0;$j<$num_column;$j++){

                $taxfield = 'tax'.$j;

                $taxvalue = 'total_tax'.$j;

              $taxdata[$taxfield]=$this->input->post($taxvalue);

            }

            $taxdata['customer_id'] = $customer_id;

            $taxdata['date']        = (!empty($this->input->post('invoice_date',TRUE))?$this->input->post('invoice_date',TRUE):date('Y-m-d'));

            $taxdata['relation_id'] = $invoice_id;

            $this->db->insert('tax_collection',$taxdata);



        // Inserting for Accounts adjustment.

        ############ default table :: customer_payment :: inflow_92mizdldrv #################



        $invoice_d_id  = $this->input->post('invoice_details_id',TRUE);

        $cartoon       = $this->input->post('cartoon',TRUE);

        $quantity      = $this->input->post('product_quantity',TRUE);

        $rate          = $this->input->post('product_rate',TRUE);

        $p_id          = $this->input->post('product_id',TRUE);

        $total_amount  = $this->input->post('total_price',TRUE);

        $discount_rate = $this->input->post('discount_amount',TRUE);

        $discount_per  = $this->input->post('discount',TRUE);

        $invoice_description = $this->input->post('desc',TRUE);

        $this->db->where('invoice_id', $invoice_id);

        $this->db->delete('invoice_details');

        $serial_n       = $this->input->post('serial_no',TRUE);

        for ($i = 0, $n = count($p_id); $i < $n; $i++) {

            // $cartoon_quantity = $cartoon[$i];

            $product_quantity = $quantity[$i];

            $product_rate     = $rate[$i];

            $product_id       = $p_id[$i];

            $serial_no        = (!empty($serial_n[$i])?$serial_n[$i]:null);

            $total_price      = $total_amount[$i];

            $supplier_rate    = $this->supplier_price($product_id);

            $discount         = $discount_rate[$i];

            // $dis_per          = $discount_per[$i];

            $dis_per          = 0;

           $desciption        = $invoice_description[$i];

            if (!empty($tax_amount[$i])) {

                $tax = $tax_amount[$i];

            } else {

                $tax = $this->input->post('tax');

            }
       $data1 = array(
                'create_by'=>$this->session->userdata('user_id'),
                'invoice_details_id' => $this->generator(15),

                'invoice_id'         => $invoice_id,

                'product_id'         => $product_id,

                'serial_no'          => $serial_no,

                'quantity'           => $product_quantity,

                'rate'               => $product_rate,

                'discount'           => $discount,

                'total_price'        => $total_price,

                'discount_per'       => $dis_per,

                'tax'                => $this->input->post('total_tax',TRUE),

                'paid_amount'        => $paidamount,

                 'supplier_rate'     => $supplier_rate,

                'due_amount'         => $this->input->post('due_amount',TRUE),

                 'description'       => $desciption,

            );

            $this->db->insert('invoice_details', $data1);







           



            $customer_id = $this->input->post('customer_id',TRUE);

          

        }



        return $invoice_id;

    }

      //Retrieve ocean import tracking Edit Data
    public function retrieve_ocean_export_tracking_editdata($purchase_id) {

         $this->db->select('a.*,
                        d.supplier_id,
                        d.supplier_name'
        );
        $this->db->from('ocean_export_tracking a');
     
        $this->db->join('supplier_information d', 'd.supplier_id = a.supplier_id');
        $this->db->where('a.create_by',$this->session->userdata('user_id'));
        $this->db->where('a.ocean_export_tracking_id', $purchase_id);
      
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
      


    }
    public function company_information() {
        $this->db->select('*');
        $this->db->from('company_information');
        $this->db->where('create_by',$this->session->userdata('user_id'));
        $query = $this->db->get();
      
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
     }
    public function get_payment_info($payment_id){
        
      //,sum(amt_paid) as total_paid
$this->db->select('payment_date,reference_no,bank_name,amt_paid,balance,details');
$this->db->from('payment');
$this->db->where('payment_id',$payment_id);


        $query = $this->db->get();
//echo $this->db->last_query();
        if ($query->num_rows() > 0) {

            return $query->result_array();

        }

       
    }
    public function add_payment_info(){
       $payment_id=$this->input->post('payment_id');
      
        $data=array(
            'payment_id' => $payment_id,
            'customer_name' =>$this->input->post('customer_name_modal'),
            'payment_date'  =>$this->input->post('payment_date'),
            'reference_no' => $this->input->post('ref_no'),
            'bank_name' => $this->input->post('bank'),
            'total_amt' => $this->input->post('amount_to_pay'),
            'amt_received' =>$this->input->post('amount_received') ,
            'balance' => $this->input->post('balance_modal'),
            'amt_paid' =>$this->input->post('payment') ,
            'details' => $this->input->post('details'),
            'attachement' => $this->input->post('attachement'),
            'create_by'  => $this->session->userdata('user_id')
           );
           $this->db->insert('payment', $data);

//echo $this->db->last_query();

    }
    //update ocean import trucking















 public function get_payment_infos($payment_id){
        
        //,sum(amt_paid) as total_paid
  $this->db->select('payment_date,reference_no,bank_name,amt_paid,balance,details');
  $this->db->from('payment');
  $this->db->where('payment_id',$payment_id);
  
          $query = $this->db->get();
    //  echo $this->db->last_query(); die();
          if ($query->num_rows() > 0) {
  
              return $query->result_array();
  
          }
  
         
      }
  
  
  
      public function add_payment_infos(){
        //  $payment_id_service=
        
          $data=array(

              'payment_id' => $this->input->post('payment_id_service'),
               'payment_date'  =>$this->input->post('payment_date'),
              'reference_no' => $this->input->post('ref_no'),
              'bank_name' => $this->input->post('bank'),



              'total_amt' => $this->input->post('amount_to_pays'),
              'amt_received' =>$this->input->post('payment_from_modals') ,
              'balance' => $this->input->post('balance_modals'),
              'amt_paid' =>$this->input->post('payment_from_modals') ,





              'details' => $this->input->post('details'),
              'attachement' => $this->input->post('attachement'),
              'create_by'  => $this->session->userdata('user_id')
             );
             $this->db->insert('payment', $data);
            //  echo $this->db->last_query();
      }



























     public function update_ocean_import() {
        //print_r($this->input->post()); die;
        $purchase_id  = $this->input->post('ocean_export_tracking_id',TRUE);
        
  
        $receive_by=$this->session->userdata('user_id');
        $receive_date=date('Y-m-d');
        $createdate=date('Y-m-d H:i:s');



         $data = array(

        

            'ocean_export_tracking_id'   => $purchase_id,

            'booking_no'     => $this->input->post('booking_no',TRUE),

            'supplier_id'   => $this->input->post('supplier_id',TRUE),

            'container_no' => $this->input->post('container_no',TRUE),

            'seal_no'   => $this->input->post('seal_no',TRUE),

            'etd'   => $this->input->post('etd',TRUE),

            'eta'   => $this->input->post('eta',TRUE),

            'shipper' => $this->input->post('shipper',TRUE),

            'invoice_date' => $this->input->post('invoice_date',TRUE),

            'consignee' => $this->input->post('consignee',TRUE),

            'notify_party' => $this->input->post('notify_party',TRUE),

            'vessel' =>  $this->input->post('vessel',TRUE),

            'voyage_no' => $this->input->post('voyage_no',TRUE),

            'port_of_loading' =>  $this->input->post('port_of_loading',TRUE),

            'port_of_discharge' => $this->input->post('port_of_discharge',TRUE),

            'place_of_delivery' => $this->input->post('place_of_delivery',TRUE),

            'freight_forwarder'  => $this->input->post('freight_forwarder',TRUE),

            'particular' => $this->input->post('particular',TRUE),

            'status'  => 1,

        );

  



      
        if ($purchase_id != '') {
            $this->db->where('ocean_export_tracking_id', $purchase_id);
            $this->db->update('ocean_export_tracking', $data);
            //account transaction update
     
        }

        return true;
    }

public function profarma_invoice_customer()
{
    $this->db->select('*');
    $this->db->from('customer_information');
    $this->db->where('create_by',$this->session->userdata('user_id'));
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        return $query->result_array();
    }
    return true;
}

    //Retrieve invoice_html_data

    public function retrieve_invoice_html_data($invoice_id) {



        $this->db->select('a.total_tax,

                        a.*,

                        b.*,

                        c.*,

                        d.product_id,

                        d.product_name,

                        d.product_details,

                        d.unit,

                        d.product_model,

                        a.paid_amount as paid_amount,

                        a.due_amount as due_amount'

                    );

        $this->db->from('invoice a');

        $this->db->join('invoice_details c', 'c.invoice_id = a.invoice_id');

        $this->db->join('customer_information b', 'b.customer_id = a.customer_id');

        $this->db->join('product_information d', 'd.product_id = c.product_id');
        $this->db->where('a.sales_by',$this->session->userdata('user_id'));

        $this->db->where('a.invoice_id', $invoice_id);

        $this->db->where('c.quantity >', 0);

        $query = $this->db->get();


        if ($query->num_rows() > 0) {

            return $query->result_array();

        }

        return false;

    }



    // Delete invoice Item

    public function retrieve_product_data($product_id) {

        $this->db->select('supplier_price,price,supplier_id,tax');

        $this->db->from('product_information a');

        $this->db->join('supplier_product b', 'a.product_id=b.product.id');
        $this->db->where('a.created_by',$this->session->userdata('user_id'));

        $this->db->where(array('a.product_id' => $product_id, 'a.status' => 1));

        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            foreach ($query->result() as $row) {

                $data[] = $row;

            }

            return $data;

        }

        return false;

    }
 function getProfarmaInvoiceList(){
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
    $this->db->select('a.invoice_id, a.date,a.sales_by, b.customer_name');
 
    $this->db->from('invoice a');

    $this->db->join('customer_information b', 'b.customer_id = a.customer_id','left');

    $this->db->join('users u', 'u.user_id = a.sales_by','left');

    if($usertype == 2){

     $this->db->where('a.sales_by',$this->session->userdata('user_id'));

    }

     if(!empty($fromdate) && !empty($todate)){

        $this->db->where($datbetween);

    }
   
    if(!empty($_POST["searchPhrase"]))
    {
     $query .= 'WHERE (a.invoice_id LIKE "%'.$_POST["searchPhrase"].'%" ';
     $query .= 'OR a.date LIKE "%'.$_POST["searchPhrase"].'%" ';
     $query .= 'OR b.customer_name LIKE "%'.$_POST["searchPhrase"].'%" ';
     $query .= 'OR a.total_amount LIKE "%'.$_POST["searchPhrase"].'%" ) ';
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
     $query .= 'ORDER BY a.invoice_id DESC ';
    }
    if($order_by != '')
    {
     $query .= ' ORDER BY ' . substr($order_by, 0, -2);
    }
    
    if($records_per_page != -1)
    {
     $query .= " LIMIT " . $start_from . ", " . $records_per_page;
    }
   
       $query = $this->db->get();
   // $result = $this->db->query($query); 
   $result = $query->result_array();
   foreach($result as $row)
{
    $data[] = $row;
}
  
    
    
    $this->db->select('*');
 
    $this->db->from('invoice');
    $query1 = $this->db->get();
    $result1 = $query1->result_array();
  
    $total_records = $query1->num_rows();
    $output = array(
     'current'  => 10,
     'rowCount'  => 10,
     'total'   => intval($total_records),
     'rows'   => $data
    );
   // print_r($output);
    echo json_encode($output);
  
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



    // Delete invoice Item

    public function delete_invoice($invoice_id) {

        

        $this->db->where('invoice_id', $invoice_id)->delete('invoice');

        //Delete invoice_details table

        $this->db->where('invoice_id', $invoice_id)->delete('invoice_details');

        //Delete transaction from customer_ledger table

        return true;

    }

public function get_expense_datas($product_nam,$product_model,$bun_num){
$this->db->select('*');
       $this->db->from('product_purchase_details');
     
       $this->db->where('product_name', $product_nam."-"."$product_model");
       $this->db->where('bundle_no', $bun_num);
 
    $query = $this->db->get()->result();
  //  echo $this->db->last_query();
    return $query;

}

    public function invoice_search_list($cat_id, $company_id) {

        $this->db->select('a.*,b.sub_category_name,c.category_name');

        $this->db->from('invoices a');

        $this->db->join('invoice_sub_category b', 'b.sub_category_id = a.sub_category_id');

        $this->db->join('invoice_category c', 'c.category_id = b.category_id');

        $this->db->where('a.sister_company_id', $company_id);

        $this->db->where('c.category_id', $cat_id);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            return $query->result_array();

        }

        return false;

    }



    // GET TOTAL PURCHASE PRODUCT

    public function get_total_purchase_item($product_id) {

        $this->db->select('SUM(quantity) as total_purchase');

        $this->db->from('product_purchase_details');

       // $this->db->where('create_by',$this->session->userdata('user_id'));

        $this->db->where('product_id', $product_id);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            return $query->result_array();

        }

        return false;

    }



    // GET TOTAL SALES PRODUCT

    public function get_total_sales_item($product_id) {

        $this->db->select('SUM(quantity) as total_sale');

        $this->db->from('invoice_details');

        $this->db->where('create_by',$this->session->userdata('user_id'));

        $this->db->where('product_id', $product_id);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            return $query->result_array();

        }

        return false;

    }

    //get_total_product_from_purchase_order

public function items_insert()
   {
            $tableid = $this->input->post('tableid',TRUE);
            $product_id = $this->input->post('product_id',TRUE);
            $description = $this->input->post('description',TRUE);
            $thickness = $this->input->post('thickness',TRUE);
            $supplier_block_no = $this->input->post('supplier_block_no',TRUE);
            $supplier_slab_no = $this->input->post('supplier_slab_no',TRUE);
            $g_width = $this->input->post('g_width',TRUE);
            $g_height = $this->input->post('g_height',TRUE);
            $gross_sq_ft = $this->input->post('gross_sq_ft',TRUE);
            $bundle_no =  $this->input->post('bundle_no',TRUE);
            $slab_no = $this->input->post('slab_no',TRUE);
            $n_width = $this->input->post('n_width',TRUE);
            $n_height = $this->input->post('n_height',TRUE);
            $net_sq_ft = $this->input->post('net_sq_ft',TRUE);
            $cost_sq_ft   =  $this->input->post('cost_sq_ft',TRUE);
            $cost_sq_slab = $this->input->post('cost_sq_slab',TRUE);
            $sales_amt_sq_ft = $this->input->post('sales_amt_sq_ft',TRUE);
            $sales_slab_amt   =  $this->input->post('sales_slab_amt',TRUE);
            $sales_amt_sq_ft = $this->input->post('sales_amt_sq_ft',TRUE);
            $weight   =  $this->input->post('weight',TRUE);
            $origin = $this->input->post('origin',TRUE);
            $total_amt   =  $this->input->post('total_amt',TRUE);
            $radio_action   =  $this->input->post('radio_action',TRUE);
            // print_r($radio_button ); die();
            $create_by = $this->session->userdata('user_id');
            for ($i = 0, $n = count($description); $i < $n; $i++) {
                $data = array(
                    'create_by' => $this->session->userdata('user_id'),
                    'tableid' => $tableid[$i],
                    'product_id' => $product_id[$i],
                    'description' => $description[$i],
                    'thickness' => $thickness[$i],
                    'supplier_block_no' => $supplier_block_no[$i],
                    'g_width' => $g_width[$i],
                    'g_height' => $g_height[$i],
                    'supplier_slab_no' => $supplier_slab_no[$i],
                    'gross_sq_ft' => $gross_sq_ft[$i],
                    'bundle_no' =>  $bundle_no[$i],
                    'slab_no' => $slab_no[$i],
                    'n_width' => $n_width[$i],
                    'n_height' => $n_height[$i],
                    'net_sq_ft' => $net_sq_ft[$i],
                    'cost_sq_ft'   =>  $cost_sq_ft[$i],
                    'cost_sq_slab' => $cost_sq_slab[$i],
                    'sales_amt_sq_ft' => $sales_amt_sq_ft[$i],
                    'sales_slab_amt'   =>  $sales_slab_amt[$i],
                    'sales_amt_sq_ft' => $sales_amt_sq_ft[$i],
                    'weight'   =>  $weight[$i],
                    'origin' => $origin[$i],
                    'total_amt'   =>  $total_amt[$i],
                    'radio_action'   =>  $radio_action
                );
                $this->db->where('product_id', $product_id[$i]);
                $this->db->where('create_by', $this->session->userdata('user_id'));
                $this->db->where('bundle_no', $bundle_no[$i]);
                $this->db->delete('add_cart');
                $this->db->insert('add_cart',$data);
                // echo $this->db->last_query();
            }
   }
   // Cart Items Fetch data
    public function cart_items()
    {
       $this->db->select("a.*,b.product_name,b.product_model");
        $this->db->from('add_cart a') ;
           $this->db->join('product_information b' , 'a.product_id = b.product_id');
        $this->db->where('create_by',$this->session->userdata('user_id'));
       $query = $this->db->get();
       // echo $this->db->last_query();
       if ($query->num_rows() > 0) {
           return $query->result_array();
       }
    }
     public function get_total_product_from_purchase_order($product_id, $supplier_id) {

        $this->db->select('SUM(a.quantity) as total_purchase,b.*');

        $this->db->from('product_purchase_details a');

        $this->db->join('supplier_product b', 'a.product_id=b.product_id');

        $this->db->where('a.create_by',$this->session->userdata('user_id'));

        $this->db->where('a.product_id', $product_id);

       // $this->db->where('b.supplier_id', $supplier_id);

        $total_purchase = $this->db->get()->row();



        $this->db->select('SUM(b.quantity) as total_sale');

        $this->db->from('invoice_details b');
        $this->db->where('b.create_by',$this->session->userdata('user_id'));

        $this->db->where('b.product_id', $product_id);

        $total_sale = $this->db->get()->row();



        $this->db->select('a.*,b.*');

        $this->db->from('product_information a');

        $this->db->join('supplier_product b', 'a.product_id=b.product_id');
        $this->db->where('a.created_by',$this->session->userdata('user_id'));

        $this->db->where(array('a.product_id' => $product_id, 'a.status' => 1));

      //  $this->db->where('b.supplier_id', $supplier_id);

        $product_information = $this->db->get()->row();



        $available_quantity = ($total_purchase->total_purchase - $total_sale->total_sale);



        $CI = & get_instance();

        $CI->load->model('Web_settings');

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();



        $data2 = array(

            'total_product'  => $available_quantity,

            'supplier_price' => $product_information->supplier_price,

            'price'          => $product_information->price,

            'supplier_id'    => $product_information->supplier_id,

            'unit'           => $product_information->unit,

            'tax'            => $product_information->tax,

            'discount_type'  => $currency_details[0]['discount_type'],

        );



        return $data2;

    }


    //Get total product

    public function get_total_product($product_id, $supplier_id) {

        $this->db->select('SUM(a.quantity) as total_purchase,b.*');

        $this->db->from('product_purchase_details a');

        $this->db->join('supplier_product b', 'a.product_id=b.product_id');

        $this->db->where('a.create_by',$this->session->userdata('user_id'));

        $this->db->where('a.product_id', $product_id);

        $this->db->where('b.supplier_id', $supplier_id);

        $total_purchase = $this->db->get()->row();



        $this->db->select('SUM(b.quantity) as total_sale');

        $this->db->from('invoice_details b');
        $this->db->where('b.create_by',$this->session->userdata('user_id'));

        $this->db->where('b.product_id', $product_id);

        $total_sale = $this->db->get()->row();



        $this->db->select('a.*,b.*');

        $this->db->from('product_information a');

        $this->db->join('supplier_product b', 'a.product_id=b.product_id');
        $this->db->where('a.created_by',$this->session->userdata('user_id'));

        $this->db->where(array('a.product_id' => $product_id, 'a.status' => 1));

        $this->db->where('b.supplier_id', $supplier_id);

        $product_information = $this->db->get()->row();



        $available_quantity = ($total_purchase->total_purchase - $total_sale->total_sale);



        $CI = & get_instance();

        $CI->load->model('Web_settings');

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();



        $data2 = array(

            'total_product'  => $available_quantity,

            'supplier_price' => $product_information->supplier_price,

            'price'          => $product_information->price,

            'supplier_id'    => $product_information->supplier_id,

            'unit'           => $product_information->unit,

            'tax'            => $product_information->tax,

            'discount_type'  => $currency_details[0]['discount_type'],

        );



        return $data2;

    }



// product information retrieve by product id

    public function get_total_product_invoic($product_id) {

        $this->db->select('SUM(a.quantity) as total_purchase');

        $this->db->from('product_purchase_details a');
      //  $this->db->where('a.create_by',$this->session->userdata('user_id'));

        $this->db->where('a.product_id', $product_id);

        $total_purchase = $this->db->get()->row();



        $this->db->select('SUM(b.quantity) as total_sale');

        $this->db->from('invoice_details b');
     //   $this->db->where('b.create_by',$this->session->userdata('user_id'));

        $this->db->where('b.product_id', $product_id);

        $total_sale = $this->db->get()->row();



        $this->db->select('a.*,b.*');

        $this->db->from('product_information a');

        $this->db->join('supplier_product b', 'a.product_id=b.product_id');

     //   $this->db->where('a.created_by',$this->session->userdata('user_id'));

        $this->db->where(array('a.product_id' => $product_id, 'a.status' => 1));

        $product_information = $this->db->get()->row();



        $available_quantity = ($total_purchase->total_purchase - $total_sale->total_sale);



        $CI = & get_instance();

        $CI->load->model('Web_settings');

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();

         $tablecolumn = $this->db->list_fields('tax_collection');

               $num_column = count($tablecolumn)-4;

          $taxfield='';

          $taxvar = [];

           // for($i=0;$i<$num_column;$i++){

           //  $taxfield = 'tax'.$i;

           //  $data2[$taxfield] = $product_information->$taxfield;

           //  $taxvar[$i]       = $product_information->$taxfield;

           //  $data2['taxdta']  = $taxvar;

           // }



    $content ='';



        $html = "";

        if (empty($content)) {

            $html .="No Serial Found !";

        }else{

            // Select option created for product

            $html .="<select name=\"serial_no[]\"   class=\"serial_no_1 form-control\" id=\"serial_no_1\">";

                $html .= "<option value=''>".display('select_one')."</option>";

                foreach ($content as $serial) {

                    $html .="<option value=".$serial.">".$serial."</option>";

                }   

            $html .="</select>";

        }



       

            $data2['total_product']  = $available_quantity;

            $data2['supplier_price'] = $product_information->supplier_price;

            $data2['price']          = $product_information->price;

            $data2['supplier_id']    = $product_information->supplier_id;

            $data2['unit']           = $product_information->unit;

            $data2['tax']            = $product_information->tax;

            $data2['serial']         = $html;

            $data2['discount_type']  = $currency_details[0]['discount_type'];

            $data2['txnmber']        = $num_column;

        



        return $data2;

    }



    //This function is used to Generate Key

    public function generator($lenth) {

        $number = array("1", "2", "3", "4", "5", "6", "7", "8", "9");



        for ($i = 0; $i < $lenth; $i++) {

            $rand_value = rand(0, 8);

            $rand_number = $number["$rand_value"];



            if (empty($con)) {

                $con = $rand_number;

            } else {

                $con = "$con" . "$rand_number";

            }

        }

        return $con;

    }



    //NUMBER GENERATOR

    public function number_generator() {

        $this->db->select_max('invoice', 'invoice_no');

        $query = $this->db->get('invoice');

        $result = $query->result_array();

        $invoice_no = $result[0]['invoice_no'];

        if ($invoice_no != '') {

            $invoice_no = $invoice_no + 1;

        } else {

            $invoice_no = 1000;

        }

        return $invoice_no;

    }

     public function headcode(){

        $query=$this->db->query("SELECT MAX(HeadCode) as HeadCode FROM acc_coa WHERE HeadLevel='4' And HeadCode LIKE '102030001%'");

        return $query->row();



    }

    //csv invoice

    public function invoice_csv_file() {

         $query = $this->db->select('a.invoice,a.invoice_id,b.customer_name,a.date,a.total_amount')

                ->from('invoice a')

                ->join('customer_information b', 'b.customer_id = a.customer_id', 'left')

                ->where('a.sales_by',$this->session->userdata('user_id'))

                ->get();

        if ($query->num_rows() > 0) {

            return $query->result_array();

        }

        return false;

    }



     public function category_dropdown()

    {

        $data = $this->db->select("*")

            ->from('product_category')

            ->get()

            ->result();



        $list = array('' => 'select_category');

        if (!empty($data)) {

            foreach($data as $value)

                $list[$value->category_id] = $value->category_name;

            return $list;

        } else {

            return false; 

        }

    }



    public function customer_dropdown()

    {

        $data = $this->db->select("*")

            ->from('customer_information')

            ->where('create_by',$this->session->userdata('user_id'))

            ->get()

            ->result();



        $list[''] = 'Select Customer';

        if (!empty($data)) {

            foreach($data as $value)

                $list[$value->customer_id] = $value->customer_name;

            return $list;

        } else {

            return false; 

        }

    }



    public function walking_customer(){

       return $data = $this->db->select('*')->from('customer_information')->where('create_by',$this->session->userdata('user_id'))->like('customer_name','walking','after')->get()->result_array();

    }



        public function allproduct(){

        $this->db->select('*');

        $this->db->from('product_information');

        $this->db->where('created_by',$this->session->userdata('user_id'));

        $this->db->order_by('product_name','asc');

        $query = $this->db->get();

        $itemlist=$query->result();

        return $itemlist;

        }



 public function searchprod($cid = null,$pname= null)

    { 

        $this->db->select('*');

        $this->db->from('product_information');
        $this->db->where('created_by',$this->session->userdata('user_id'));
        $this->db->like('category_id',$cid);

        $this->db->like('product_name',$pname);

        $this->db->order_by('product_name','asc');

        $query = $this->db->get();

        $itemlist=$query->result();

        return $itemlist;

    }









public function service_invoice_taxinfo($invoice_id){

       return $this->db->select('*')   

            ->from('tax_collection')

            ->where('relation_id',$invoice_id)

            ->get()

            ->result_array(); 

    }
  /*  public function getcusto_currency(){
        $this->db->select('*');
        $this->db->from('currency_tbl');
        $this->db->where('customer_name', $value);
        $query = $this->db->get()->result();
        return $query;
        $curn_info_customer = $CI->db->select('*')->from('currency_tbl')->where('icon',$value)->get()->result_array();
    }
*/
    public function getcustomer_data($value){
        $this->db->select('*');
        $this->db->from('customer_information');
        $this->db->where('customer_id', $value);
        $query = $this->db->get()->result();
    //   echo $this->db->last_query();
        return $query;
    
    }


    public function customerinfo_rpt($customer_id){

       $this->db->select('*')   ;
       $this->db->from('customer_information');
       $this->db->where('customer_id', $customer_id);
       $query = $this->db->get()->result();
       return $query;

    }



    

        public function autocompletproductdata($product_name){

        $query=$this->db->select('*')

                ->from('product_information')
              //  ->where('created_by',$this->session->userdata('user_id'))

                ->like('product_name', $product_name, 'both')

                ->or_like('product_model', $product_name, 'both')

                ->order_by('product_name','asc')

                ->limit(15)

                ->get();

        if ($query->num_rows() > 0) {

            return $query->result_array();  

        }

        return false;

    }





    public function stock_qty_check($product_id){

        $this->db->select('SUM(a.quantity) as total_purchase');

        $this->db->from('product_purchase_details a');

       // $this->db->where('a.create_by',$this->session->userdata('user_id'));

        $this->db->where('a.product_id', $product_id);

        $total_purchase = $this->db->get()->row();



        $this->db->select('SUM(b.quantity) as total_sale');

        $this->db->from('invoice_details b');
        $this->db->where('b.create_by',$this->session->userdata('user_id'));

        $this->db->where('b.product_id', $product_id);

        $total_sale = $this->db->get()->row();



        $this->db->select('a.*,b.*');

        $this->db->from('product_information a');

        $this->db->join('supplier_product b', 'a.product_id=b.product_id');
        $this->db->where('a.created_by',$this->session->userdata('user_id'));

        $this->db->where(array('a.product_id' => $product_id, 'a.status' => 1));

        $product_information = $this->db->get()->row();



        $available_quantity = ($total_purchase->total_purchase - $total_sale->total_sale);

        return (!empty($available_quantity)?$available_quantity:0);



    }
    public function sale_trucking($date=null) {
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
     $usertype = $this->session->userdata('user_type');
     $this->db->select('a.*,b.customer_name');
     $this->db->from('sale_trucking a');
    $this->db->join('customer_information b', 'b.customer_id = a.bill_to','left');
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
      $query .= 'OR b.customer_name LIKE "%'.$_POST["searchPhrase"].'%" ';
      $query .= 'OR a.grand_total_amount LIKE "%'.$_POST["searchPhrase"].'%" ) ';
      $query .= 'OR a.shipment_company LIKE "%'.$_POST["searchPhrase"].'%" ) ';
      $query .= 'OR a.container_pickup_date LIKE "%'.$_POST["searchPhrase"].'%" ) ';
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
     $query .= 'ORDER BY a.trucking_id DESC ';
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
      // echo $this->db->last_query();
    // $result = $this->db->query($query); 
    $result = $query->result_array();
    foreach($result as $row)
 {
     $data[] = $row;
 }
   
     
     
     $this->db->select('*');
  
     $this->db->from('sale_trucking');
     $query1 = $this->db->get();
     $result1 = $query1->result_array();
   
     $total_records = $query1->num_rows();
     $output = array(
  
      'rows'   => $data
     );
   return $output;
//  echo json_encode($output);

 }



 public function newsale($date=null) {
        if($date) {
            // echo $date."<br/>";
// $split = array_map(
//  function($value) {
//      return implode(' ', $value);
//  },
//  array_chunk(explode('to', $date), 3)
// );

$split=explode(' to ',$date);
 //print_r($split ); die();
    //  $start = str_replace(' ', '-', $split[0]);
    //  $end = str_replace(' ', '-', $split[1]);


     $start =  $split[0];
     $end = $split[1];

//print_r($start);
// print_r($end);

     //$start = rtrim($start, "-");
   //  $end= preg_replace('/' . '-' . '/', '', $end, 1);
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
    //   b.customer_name, b.customer_id,
     $this->db->select('a.*,a.id,a.invoice_id, a.date,a.sales_by,a.commercial_invoice_number,a.total_amount,b.customer_name');
  
     $this->db->from('invoice a');
 
    // $this->db->join('customer_information b', 'b.customer_id = a.customer_id','left');
 
    //  $this->db->join('users u', 'u.user_id = a.sales_by','left');
    $this->db->join('customer_information b', 'b.customer_id = a.customer_id','left');

 
      $this->db->where('a.sales_by',$this->session->userdata('user_id'));
 
    //   
    //  print_r($date);  
     if($date) {
      if(!empty($start) && !empty($end)){
         $this->db->where('a.date >=',$start);
         $this->db->where('a.date <=',$end);
      }
 
     }

     if(!empty($_POST["searchPhrase"]))
     {
      $query .= 'WHERE (a.invoice_id LIKE "%'.$_POST["searchPhrase"].'%" ';
      $query .= 'OR a.date LIKE "%'.$_POST["searchPhrase"].'%" ';
      $query .= 'OR b.customer_name LIKE "%'.$_POST["searchPhrase"].'%" ';
      $query .= 'OR a.total_amount LIKE "%'.$_POST["searchPhrase"].'%" ) ';
      $query .= 'OR u.first_name LIKE "%'.$_POST["searchPhrase"].'%" ) ';
      $query .= 'OR u.last_name LIKE "%'.$_POST["searchPhrase"].'%" ) ';
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
     $query .= 'ORDER BY a.id DESC ';
     }
     if($order_by != '')
     {
      $query .= ' ORDER BY ' . substr($order_by, 0, -2);
     }
     
     if($records_per_page != -1)
     {
      $query .= " LIMIT " . $start_from . ", " . $records_per_page;
     }
    
        $query = $this->db->get();
        //  echo $this->db->last_query();  //die();
//    echo $this->db->last_query();
    // $result = $this->db->query($query); 
    $result = $query->result_array();
    foreach($result as $row)
 {
     $data[] = $row;
 }
   
     
     
     $this->db->select('*');
  
     $this->db->from('invoice');
     $query1 = $this->db->get();
     $result1 = $query1->result_array();
   
     $total_records = $query1->num_rows();
     $output = array(
  
      'rows'   => $data
     );
   return $output;
//  echo json_encode($output);

 }
 
 
 
 
 
 
 public function ocean_export($date=null) {
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
 $start_from = ($current_page_number - 1) * $records_per_page;        $this->db->select('a.*,b.supplier_name');



 $this->db->select('a.*,b.*');

 $this->db->from('ocean_export_tracking a');
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
  $query .= 'OR a.place_of_delivery LIKE "%'.$_POST["searchPhrase"].'%" ) ';
  $query .= 'OR b.supplier_name LIKE "%'.$_POST["searchPhrase"].'%" ) ';
  $query .= 'OR a.ocean_export_tracking_id LIKE "%'.$_POST["searchPhrase"].'%" ) ';
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
 $query .= 'ORDER BY a.ocean_export_tracking_id DESC ';
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
   // echo $this->db->last_query();
// $result = $this->db->query($query); 
$result = $query->result_array();
foreach($result as $row)
{
 $data[] = $row;
}

 
 
 $this->db->select('*');

 $this->db->from('ocean_export_tracking');
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
 $usertype = $this->session->userdata('user_type');
 $this->db->select('a.*, a.expense_packing_id, u.first_name,u.last_name');

 $this->db->from('sale_packing_list a');



 $this->db->join('users u', 'u.user_id = a.create_by','left');



  $this->db->where('a.create_by',$this->session->userdata('user_id'));




 if(!empty($_POST["searchPhrase"]))
 {
  $query .= 'WHERE (a.invoice_date LIKE "%'.$_POST["searchPhrase"].'%" ';
  $query .= 'OR a.expense_packing_id LIKE "%'.$_POST["searchPhrase"].'%" ';
  $query .= 'OR a.invoice_no LIKE "%'.$_POST["searchPhrase"].'%" ';
  $query .= 'OR a.grand_total_amount LIKE "%'.$_POST["searchPhrase"].'%" ) ';
  $query .= 'OR u.first_name LIKE "%'.$_POST["searchPhrase"].'%" ) ';
  $query .= 'OR u.last_name LIKE "%'.$_POST["searchPhrase"].'%" ) ';
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
 $query .= 'ORDER BY a.expense_packing_id DESC ';
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
 
// $result = $this->db->query($query); 
$result = $query->result_array();
foreach($result as $row)
{
 $data[] = $row;
}

 
 
 $this->db->select('*');

 $this->db->from('sale_packing_list');
 $query1 = $this->db->get();
 $result1 = $query1->result_array();

 $total_records = $query1->num_rows();
 $output = array(

  'rows'   => $data
 );
return $output;
//  echo json_encode($output);

}


    public function sample($date=null) {
//           if($date) {
//         $split = array_map(
//     function($value) {
//         return implode(' ', $value);
//     },
//     array_chunk(explode('-', $date), 3)
// );


//         $start = str_replace(' ', '-', $split[0]);
//         $end = str_replace(' ', '-', $split[1]);
//         $start = rtrim($start, "-");
//         $end= preg_replace('/' . '-' . '/', '', $end, 1);
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
        $usertype = $this->session->userdata('user_type');
        $this->db->select('a.*,a.purchase_id,a.chalan_no, a.purchase_date,a.sales_by, b.customer_name,a.total');
     
        $this->db->from('profarma_invoice a');
    
        $this->db->join('customer_information b', 'b.customer_id = a.customer_id','left');
    
        // $this->db->join('users u', 'u.user_id = a.sales_by','left');
    
        
    
         $this->db->where('a.sales_by',$this->session->userdata('user_id'));
    
        
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
         $query .= 'OR b.customer_name LIKE "%'.$_POST["searchPhrase"].'%" ';
         $query .= 'OR a.total LIKE "%'.$_POST["searchPhrase"].'%" ) ';
         $query .= 'OR u.first_name LIKE "%'.$_POST["searchPhrase"].'%" ) ';
         $query .= 'OR u.last_name LIKE "%'.$_POST["searchPhrase"].'%" ) ';
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
     
        $this->db->from('profarma_invoice');
        $query1 = $this->db->get();
        $result1 = $query1->result_array();
      
        $total_records = $query1->num_rows();
        $output = array(
     
         'rows'   => $data
        );
      return $output;
  //  echo json_encode($output);

    }
     //Trucking Entry
     public function trucking_entry() {

  $trucking_date = $this->input->post('trucking_date',TRUE);
        $invoice_no= $this->input->post('invoice_no',TRUE);
  
        $payment_id=$this->input->post('payment_id');
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
         }else{
             $bankcoaid = '';
         }
  
          $purchase_id = date('YmdHis');
  
          $data = array(
            'payment_id' => $payment_id,
            'delivery_time_from' =>$this->input->post('delivery_time_from',TRUE),
               'delivery_time_to' =>$this->input->post('delivery_time_to',TRUE),
              'truck_no' =>$this->input->post('truck_no',TRUE),
              'trucking_id'        => $purchase_id,
              'create_by'       =>  $this->session->userdata('user_id'),
              'invoice_no' => $this->input->post('invoice_no',TRUE),
              'invoice_date' =>$this->input->post('invoice_date',TRUE),
              'bill_to'      =>$this->input->post('bill_to',TRUE),
              'shipment_company'   => $this->input->post('shipment_company',TRUE),
              'container_pickup_date'   => $this->input->post('container_pick_up_date',TRUE),
              'delivery_date' => $this->input->post('delivery_date',TRUE),
              'total_amt' => $this->input->post('total',TRUE),
              'tax' => $this->input->post('tax_details',TRUE),
              'grand_total_amount' => $this->input->post('gtotal',TRUE),
              'customer_gtotal' =>$this->input->post('customer_gtotal',TRUE),

            'delivery_to' =>$this->input->post('delivery_to',TRUE),


              'amt_paid'    => $this->input->post('amount_paid',TRUE),
            'balance'    => $this->input->post('balance',TRUE),
              'remarks' => $this->input->post('remarks',TRUE),
             'status'             => 1,
           
          );
  
          $purchase_id_1 = $this->db->where('invoice_no',$this->input->post('invoice_no',TRUE));
          $q=$this->db->get('sale_trucking');
          $row = $q->row_array();
      if(!empty($row['trucking_id'])){
          $this->session->set_userdata("sale_trucking_1",$row['trucking_id']);
        
          $this->db->where('invoice_no',$this->input->post('invoice_no',TRUE));
   
          $this->db->delete('sale_trucking');
     //   echo $this->db->last_query();echo "<br/>";
          $this->db->insert('sale_trucking', $data);
       // echo $this->db->last_query();echo "<br/>";
     }   
      else{
      $this->db->insert('sale_trucking', $data);
 // echo $this->db->last_query();echo "<br/>";
      }
         $purchase_id = $this->db->select('trucking_id')->from('sale_trucking')->where('invoice_no',$this->input->post('invoice_no',TRUE))->get()->row()->trucking_id;
       //  echo  $purchase_id;
         $this->session->set_userdata("sale_trucking_2",$purchase_id);
   $rowCount = count($this->input->post('trucking_date',TRUE));
   $this->db->where('sale_trucking_id', $this->session->userdata("sale_trucking_1"));
                  $this->db->delete('sale_trucking_details');
                // echo $this->db->last_query();
          for ($i = 0; $i < $rowCount; $i++) {
              $t_date = $this->input->post('trucking_date',TRUE);
              $trucking_rate = $this->input->post('product_rate',TRUE);
              $quantity = $this->input->post('product_quantity',TRUE);
              $trucking_description = $this->input->post('description',TRUE);
              $trucking_pro_no =  $this->input->post('pro_no',TRUE);
              $t_price = $this->input->post('total_price',TRUE);
            //  if(!empty($_POST['trucking_date']) && !empty($_POST['product_quantity']) && !empty($_POST['description']) && 
           //   !empty($_POST['product_rate']) && !empty($_POST['pro_no']) && !empty($_POST['total_price'])){
                  $trucking_date = $t_date[$i];
                  $product_quantity = $quantity[$i];
                  $description = $trucking_description[$i];
                  $product_rate =  $trucking_rate[$i];
                  $pro_no = $trucking_pro_no[$i];
                  $total =  $t_price[$i];
                  $data1 = array(
                      'sale_trucking_detail_id' => $this->generator(15),
                      'sale_trucking_id'        =>  $this->session->userdata("sale_trucking_2"),
                      'trucking_date' =>$trucking_date,
                     
                      'qty'           => $product_quantity,
                      'description'               => $description,
                      'rate'              =>  $product_rate ,
                    
                      'pro_no_reference'           => $pro_no,



                      'total'       => $total,
                      'create_by'          =>  $this->session->userdata('user_id'),
                      'status'             => 1
                  );

              

                 
    
                  $this->db->insert('sale_trucking_details', $data1);
            //  echo $this->db->last_query();
               //   die();
            //  if (!empty($quantity)) {
                
            //  }
     
      }
       
  
        
  
  
  
      return $purchase_id."/".$invoice_no;
      }


    public function company_info()
    {

       
      $sql='SELECT * from company_information as c 
      join 

      user_login as u
      on 
      u.cid=c.company_id 
      where u.id='.$_SESSION['user_id'];

        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {

            return $query->result_array();

        }

        return false;




    } 

    public function invoice_form($invoice_id)
    {

          $sql='SELECT * FROM `invoice` where invoice_id='.$invoice_id;

        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {

            return $query->result_array();

        }

        return false;



        
    }
    public function bill_to($invoice_id)
    {

              $sql='SELECT c.* from invoice as i JOIN customer_information as c on c.customer_id=i.customer_id where i.invoice_id='.$invoice_id;


            $query = $this->db->query($sql);

            if ($query->num_rows() > 0) {

                return $query->result_array();

            }

            return false;



            
    }

      public function product($invoice_id)
    {
        
        $this->db->select('a.*,b.*');
        $this->db->from('invoice_details a');
        $this->db->join('product_information b', 'a.product_id=b.product_id');
        $this->db->where('a.invoice_id', $invoice_id);
       
        $query = $this->db->get();


            if ($query->num_rows() > 0) {

return $query->result_array();
    
    }

}

public function get_datas()
    {
        return $this->db->get('bootgrid_data')->result();
    }
 public function tempdesign()
    {
        
        


              $sql='SELECT * FROM `invoice_design` where uid='.$_SESSION['user_id'];


            $query = $this->db->query($sql);

            if ($query->num_rows() > 0) {

                return $query->result_array();

    }



}

public function sales_packing_list()
{

    $this->db->select('*');
    $this->db->from('sale_packing_list');
   
    $this->db->where('create_by', $_SESSION['user_id']);

    $query = $this->db->get();


    if ($query->num_rows() > 0) {

return $query->result_array();

}
}

}