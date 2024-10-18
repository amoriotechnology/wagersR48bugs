<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require 'vendor/mollie-api-php/examples/initialize.php';

class Welcome extends CI_Controller {

   public function __construct()
    {
        parent::__construct();
       $this->load->helper('file');
        $this->load->model('Payment_model');
        $this->load->library('session');
    }
    public function index($records)
    {
        $this->load->database();
        $this->db->select('*');
        $this->db->from('product_purchase');
        $this->db->where('purchase_id',$records);
        $query = $this->db->get();
        $val=$query->result_array();
     
        $mysqltime = date ('Y-m-d H:i:s');
        $mollie = new \Mollie\Api\MollieApiClient();
        $mollie->setApiKey("test_UUuDN5feMAjzUBDsU4SfNCT4fqN37m");
        $orderId = strtotime(date('H:i:s'));
        if($val[0]['payment_id']){
              $id=$val[0]['payment_id']; 
        }else{
         $eightDigitNumber = random_int(10000000, 99999999);
           
               $id=$eightDigitNumber;
        }
     
        $total_price=$val[0]['grand_total_amount'];
        $paid_amount = $val[0]['paid_amount'];
        $this->session->set_userdata('totalPrice', $total_price);
        $description=$val[0]['message_invoice'];
        $company_id=$val[0]['create_by'];
         
        $this->session->set_userdata('purchase', $records);
         $this->session->set_userdata('order', $orderId);
        $purchaseId = $records;
        $this->session->set_userdata('purchase_id', $purchaseId);
        $data1 = [
            'payment_id' =>$id,
            'order_id' => $orderId,
            'purchase_id' => $records,
            'payment_date' => $mysqltime,
            'description' =>  $description,
            'mode' => 'Mollie Payment',
            'total_amt' => $total_price,
            'create_by'       =>  $val[0]['create_by'],
            'status' =>''
      
        ];
           $this->session->set_userdata('paymentIds', $id);
           $this->db->insert('payment',$data1) ;
       //  echo $this->db->last_query();die();
   
  
        try {
            // Create a payment with Mollie
            $payment = $mollie->payments->create([
                "amount" => [
                    "currency" => "EUR",
                    "value" => $val[0]['grand_total_amount']
                ],
                "description" => $val[0]['message_invoice']."-".$company_id,
                "redirectUrl" => "http://amoriotech.net/UAT/Wagers/Payment_Gateway/welcome/returnURL/".$orderId,
                "webhookUrl" => "http://amoriotech.net/UAT/Wagers/Payment_Gateway/welcome/webhookURL",
                "metadata" => ["order_id" => $orderId]
            ]);
            
           $paymentId = $payment->id;
         

            $status = $payment->status;
           

            redirect($payment->getCheckoutUrl(), 'refresh', 303);
        } catch (Mollie\Api\Exceptions\ApiException $e) {
            echo "API call failed: " . htmlspecialchars($e->getMessage());
        } catch (Exception $e) {
            // Handle other exceptions
            echo "An error occurred: " . htmlspecialchars($e->getMessage());
        }
    }

    public function returnURL($orderID = '') 
    {   
        $purchase_id = $this->session->userdata('purchase_id');
         $order = $this->session->userdata('order');
        $paymentIds = $this->session->userdata('paymentIds');
        $paid_amount = $this->session->userdata('paidamount');
        $totalprice = $this->session->userdata('totalPrice');
        $p_date = date('Y-m-d H:i:s');

        $this->load->database();
$read = $this->database_read($orderID); // Assuming this function retrieves a string from the database

$explode = explode(' ', $read);
        $updatePayment = array(
         
            'status' => $explode[1],
            'payment_id' => $paymentIds,
            'reference_no' => $explode[0],
            'payment_date' => $p_date
        );

        $this->db->set($updatePayment);
        $this->db->where('order_id', $order);
        $this->db->update('payment');

       //  echo $this->db->last_query();die();
           $dataToUpdateProductPurchase = [
           'paid_amount' => $totalprice,
         'payment_id' =>$paymentIds,
         'balance'  => 0
          ];

       $this->db->where('purchase_id', $purchase_id);
       $this->db->update('product_purchase', $dataToUpdateProductPurchase);
   //echo $this->db->last_query();die();
        $tab_detail = $this->db->select('*')->from('payment')->where('order_id',$orderID)->get()->result_array();

        // Prepare data for view
        $data = array(
            'detail' => $tab_detail,
        );

        // Load the view
        $this->load->view('welcome_message', $data);

        // Delay execution for 2 seconds (optional)
        sleep(2);
    }



    public function webhookURL(){
       try {
           $mollie = new \Mollie\Api\MollieApiClient();
           $mollie->setApiKey("test_UUuDN5feMAjzUBDsU4SfNCT4fqN37m");
           $id = $this->input->post('id');
           $payment = $mollie->payments->get($id);
         //  print_r($payment );die();
           $orderId = $payment->metadata->order_id;
           $p_id=$payment->metadata->id;
           $status = '';
       if ($payment->isPaid() && !$payment->hasRefunds() && !$payment->hasChargebacks()) {
            /*
             * The payment is paid and isn't refunded or charged back.
             * At this point you'd probably want to start the process of delivering the product to the customer.
             */
           $status = 'Paid';
        } elseif ($payment->isOpen()) {
            /*
             * The payment is open.
             */
           $status = 'Open';
        } elseif ($payment->isPending()) {
            /*
             * The payment is pending.
             */
           $status = 'Pending';
        } elseif ($payment->isFailed()) {
            /*
             * The payment has failed.
             */
           $status = 'Failed';
        } elseif ($payment->isExpired()) {
            /*
             * The payment is expired.
             */
           $status = 'Expired';
        } elseif ($payment->isCanceled()) {
            /*
             * The payment has been canceled.
             */
           $status = 'Canceled';
        } elseif ($payment->hasRefunds()) {
            /*
             * The payment has been (partially) refunded.
             * The status of the payment is still "paid"
             */
           $status = 'Partially Refunded';
        } elseif ($payment->hasChargebacks()) {
            /*
             * The payment has been (partially) charged back.
             * The status of the payment is still "paid"
             */
           $status = 'Partially Charged back';
        }
           $this->database_write($orderId, $status,$p_id,$id);
    } catch (\Mollie\Api\Exceptions\ApiException $e) {
        echo "API call failed: " . \htmlspecialchars($e->getMessage());
    }
 }

    public function database_write($orderId,$status,$p_id,$id)
    {
        $orderId = \intval($orderId);
        $database = FCPATH . "assets\order-{$orderId}.txt";
      $status=$id." ".$status." ".$p_id;
       \file_put_contents($database, $status);
     
   }
 
  public function database_read($orderId)
    {
        
        $orderId = \intval($orderId);
        $database = FCPATH . "assets\order-{$orderId}.txt";
        $status = @\file_get_contents($database);
     
        return $status ? $status : "u order";
    }
   

}

?>

