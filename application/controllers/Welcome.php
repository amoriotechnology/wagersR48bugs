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
    }
	public function index($records)
	{$this->load->database();
        $this->db->select('*');
        $this->db->from('product_purchase');
        $this->db->where('purchase_id',$records);
        $query = $this->db->get();
 
$val=$query->result_array();
$mysqltime = date ('Y-m-d H:i:s');

        $mollie = new \Mollie\Api\MollieApiClient();
        $mollie->setApiKey("test_UUuDN5feMAjzUBDsU4SfNCT4fqN37m");
        $orderId = strtotime(date('H:i:s'));
        $id=$val[0]['id'];
        $total_price=$val[0]['grand_total_amount'];
        $description=$val[0]['message_invoice'];
        $_SESSION['purchase_id']=$records;
        $data1 = [
            'payment_id' =>$id,
            'order_id' => $orderId,
            'purchase_id' => $records,
            'description' => $description,
            'mode' => 'Mollie Payment',
            'total_amt' => $total_price,
           'create_by'       =>  $val[0]['create_by'],
           'status' =>''
      
        ];
           $this->db->insert('payment',$data1) ;
	    try{
            $payment = $mollie->payments->create([
                "amount" => [
                    "currency" => "EUR",
                    "value" => $val[0]['grand_total_amount']
                ],
                "description" => $val[0]['message_invoice'],
                "redirectUrl" => "https://1ba4-14-140-167-238.in.ngrok.io/R11_030323/Payment_Gateway/welcome/returnURL/".$orderId,
                "webhookUrl"  => "https://1ba4-14-140-167-238.in.ngrok.io/R11_030323/stockie_Final_Payment_Gateway/Payment_Gateway/welcome/webhookURL",
                "metadata" => ["order_id" => $orderId]
             ]);
            redirect($payment->getCheckoutUrl(),'refresh',303);
        }catch(Exception $e){
	        echo  $e;
        }

	}

    public function returnURL($orderID='')
    {$this->load->database();
        $this->db->select('*');
        $this->db->from('payment');
        $this->db->where('order_id',$orderID);
   
        $query1 = $this->db->get();
$tab_detail=$query1->result_array();

$data = array(
    'detail' =>  $tab_detail,
    'status' => $this->database_read($orderID)
);
$update = array(
    'status' => $this->database_read($orderID)
   
    );
   $this->db->set($update);
   $this->db->where('order_id', $orderID);
   $this->db->update('payment');
  $this->load->view('welcome_message',$data);
    
        sleep(2);

	}
	public function webhookURL(){
       try {
           $mollie = new \Mollie\Api\MollieApiClient();
           $mollie->setApiKey("test_UUuDN5feMAjzUBDsU4SfNCT4fqN37m");
           $id = $this->input->post('id');
           $payment = $mollie->payments->get($id);
           $orderId = $payment->metadata->order_id;
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
           $this->database_write($orderId, $status);
    } catch (\Mollie\Api\Exceptions\ApiException $e) {
        echo "API call failed: " . \htmlspecialchars($e->getMessage());
    }
 }

    public function database_write($orderId,$status)
    {
        $orderId = \intval($orderId);
        $database = FCPATH . "assets\order-{$orderId}.txt";
     //  $wrt=$description." ".$total_price." ".$status;
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

