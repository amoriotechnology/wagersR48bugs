<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mollie extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 public function __construct() 
    {
        parent::__construct();
        $this->load->database();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->library('API/mollie_api_autoloader');
		$this->load->library('API/mollie_api_client');
		if($this->config->item('Mollie_status')=="test"){
			$this->mollie_api_client->setApiKey($this->config->item("test_UUuDN5feMAjzUBDsU4SfNCT4fqN37m"));
		}else{
  			$this->mollie_api_client->setApiKey($this->config->item("test_UUuDN5feMAjzUBDsU4SfNCT4fqN37m"));
		}
		 
    }
	public function index()
	{ 
		 $this->load->view('payment');
	
	}
	public function makePayment(){

 		// load url helper
		$order_id=rand(10,100);
		$subscription = $this->input->post('payment_type');
 		if($subscription==1){
			$customer = $this->mollie_api_client->customers->create(array(
			"name"     => $this->input->post('consumerName'),
			"email"    => $this->input->post('email'),
		));

		echo "<p>Customer created with id ". $customer->id."</p>";

		$mandate = $this->mollie_api_client->customers_mandates->withParentId($customer->id)->create(array(
			"method" => 'directdebit',
			"consumerAccount" => $this->input->post('consumerAccount'),
			"consumerName" =>  $this->input->post('consumerName'),
		));
		echo "<p>Mandate created with id ". $mandate->id."</p>";


			$payment = $this->mollie_api_client->payments->create([
				'amount'        => 0.01,          // 1 cent or higher
				'customerId'    => $customer->id,
				'recurringType' => 'first',       // important
				'description'   => 'First payment',
				"redirectUrl" => "http://megaclassifieds.in/ci/Mollie/order/".$order_id."/?type=1",
				"webhookUrl"  => "http://megaclassifieds.in/ci/Mollie/mollie_webhook/",
			]);

		/*	 $subscription =$this->mollie_api_client->customers_subscriptions->withParentId($customer->id)->create(array(
				"amount"      => $this->input->post('amount'),
				"times"       => 12, // recurring membership for 1 year
				"interval"    => "1 months", // every month
				"description" => "Subscription ".$order_id,
				"webhookUrl"  => "http://megaclassifieds.in/ci/Mollie/mollie_webhook/",
				"metadata" => array(
					"order_id" => $order_id,
				),
    ));*/
				//$mandates = $this->mollie_api_client->customers_mandates->withParentId($customer->id)->all();
		 

			  $query = $this->db->query("insert into payment(payment_id,order_id,customer_id,mandate_id,mode,amount,subscription_amount,description,status,createdDatetime) values ('".$payment->id."','".$order_id."','".$customer->id."','".$mandate->id."','".$payment->mode."','".$payment->amount."','".$this->input->post('amount')."','".$payment->description."','".$payment->status."','".$payment->startDate."')");
			
			   $this->session->set_userdata('payment_id', $payment->id);
		  header("Location: " . $payment->getPaymentUrl());
			 
		}else{
			$payment = $this->mollie_api_client->payments->create(array(
							"amount"      => $this->input->post('amount1'),
							"description" => $this->input->post('desc1'),
							"redirectUrl" => "http://megaclassifieds.in/ci/Mollie/order/".$order_id."/?type=0",
							"webhookUrl"  => "http://megaclassifieds.in/ci/Mollie/mollie_webhook/",
						));
			$this->database_write($order_id, $payment->id);
			 $query = $this->db->query("insert into payment(payment_id,order_id,mode,amount,description,status,createdDatetime) values ('".$payment->id."','".$order_id."','".$payment->mode."','".$payment->amount."','".$payment->description."','".$payment->status."','".$payment->createdDatetime."')");
			
			 $this->session->set_userdata('payment_id', $payment->id);
			 
			 header("Location: " . $payment->getPaymentUrl());
		}
 	}

	public function order($orderID){
			 
		$query = $this->db->query("select * from payment where order_id = '".$orderID."'");
		$res = $query->result();
		$payment_id =$res[0]->payment_id;

		$type=$_GET['type'];

		if($type==1){
			$customer_id =$res[0]->customer_id;
			$amount =$res[0]->subscription_amount;
		 
			$subscription =$this->mollie_api_client->customers_subscriptions->withParentId($customer_id)->create(array(
				"amount"      => $amount,
				"times"       => 12, // recurring membership for 1 year
				"interval"    => "1 months", // every month
				"description" => "Subscription ".$orderID,
				"webhookUrl"  => "http://megaclassifieds.in/ci/Mollie/mollie_webhook/",
				"metadata" => array(
					"order_id" => $orderID,
				),
			));
			$payment    = $this->mollie_api_client->payments->get($payment_id);


			 
 
   			$this->db->query("update payment set status='".$payment->status."' , subscription_id='".$subscription->id."'  ,  paidDatetime='".$payment->paidDatetime."' where order_id='".$orderID."'");
 		
		}else{
 		  $payment    = $this->mollie_api_client->payments->get($payment_id);
 		  $this->db->query("update payment set status='".$payment->status."' and  paidDatetime='".$payment->paidDatetime."' where order_id='".$orderID."'");
  			 
		}

		if ($payment->isPaid())
			{
				echo "ORDER PAID";
				echo "<br>";
				echo "<a href='".base_url('Mollie')."'>Make New Payment</a>";
			}
			elseif (! $payment->isOpen())
			{
				echo "ORDER OPEN";
				echo "<br>";
				echo "<a href='".base_url('Mollie')."'>Make New Payment</a>";
			}
	}

	public function mollie_webhook(){
		echo "IN Webhook";

	}

	public function database_write ($order_id, $status)
	{
		$order_id = intval($order_id);
 
		$database = dirname(__FILE__) . "/orders/order-{$order_id}.txt";
 
		file_put_contents($database, $status);
	}

	public function listMandate(){
		$query = $this->db->query("select * from payment");
		$res = $query->result();
		echo "<pre>";
 		foreach($res as $cust_mandate){
  			//$customers_mandates =$this->mollie_api_client->customers_mandates->withParentId($cust_mandate->customer_id)->all();
			$customer = $this->mollie_api_client->customers->get($cust_mandate->customer_id);
			//$customer[] = $this->mollie_api_client->customers_mandates->withParentId($cust_mandate->customer_id)->get($cust_mandate->mandate_id);
			$customer = $this->mollie_api_client->customers->delete1($customer);
 		}
 

			}



 }
