
   <?php


if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cpurchase extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->db->query('SET SESSION sql_mode = ""');
            $this->load->model(array(
            'accounts_model','Web_settings'
        )); 
    }
    public function process_form() {
    $CI = & get_instance();
    $CI->load->model('Purchases');
    $config['upload_path'] = './uploads/';
    $config['allowed_types'] = 'jpg|jpeg|png|pdf';
    $this->load->library('upload', $config);
    if (!$this->upload->do_upload('form_image')) {
        // Handle upload error
    } else {
        $upload_data = $this->upload->data();
        $image_path = $upload_data['full_path'];
        // 2. OCR Processing
        $text = (new TesseractOCR($image_path))->run();
        // 3. Extract Field Names
        $field_data = $this->extractFieldData($text);
        // print_r($field_data); die();
        // Extracting due date from the field data
        $bill_date = "";
        if(preg_match('/Date\s+(\d{4}\/\d{1,2}\s+\d{1,2}\/\d{1,2})/', $field_data[1], $matches)) {
            $bill_date = $matches[1];
        }
        // Extracting bill date from the field data
        $bill_number = substr($field_data[4], strpos($field_data[4], '|'));
        $company_name = isset($field_data[1]) ? trim($field_data[1]) : "";
        $company_address = "";
        $address_line = $field_data[2];
        $matches = [];
            if (preg_match('/^(.*?)REG NO:/i', $address_line, $matches)) {
            $company_address = trim($matches[1]);
        }
        $company_address1 = "";
        $address_line1 = $field_data[3];
        $matches1 = [];
        if (preg_match('/^(.*?)VAT NO:/i', $address_line1, $matches1)) {
            $company_address1 = trim($matches1[1]);
        }
        $value_line = $field_data[4];
        $matches2 = [];
        if (preg_match('/^\d+/', $value_line, $matches2)) {
            $value = $matches2[0];
        }
        $productname = "";
        foreach ($field_data as $line) {
            if (strpos($line, "COUNTRY OF ORIGIN :") !== false) {
                // Adjusted regular expression pattern to directly capture "AFRICAN RAINBOW"
                if (preg_match('/\b\d+\s(AF.+?)\s\d/', $line, $matches)) {
                    $productname = trim($matches[1]);
                    break;
                }
            }
        }
        $product_names1 = [];
        $product_thicknesses = [];
        $product_finishes = [];
        $product_sfs = [];
        $product_prices = [];
        $product_amounts = [];
        foreach ($field_data as $line) {
            if (preg_match_all('/\b(\d+)\s+(AF.+?)\s+(\d+)\s+(\w+)\s+([\d,\.]+)\s+\$\s+([\d,\.]+)/', $line, $matches, PREG_SET_ORDER)) {
                foreach ($matches as $match) {
                    $product_name = isset($match[2]) ? trim($match[2]) : '';
                    $product_thickness = isset($match[3]) ? trim($match[3]) : '';
                    $product_finish = isset($match[4]) ? trim($match[4]) : '';
                    $product_sf = isset($match[5]) ? trim($match[5]) : '';
                    $product_price = isset($match[6]) ? trim($match[6]) : '';
                    $product_amount = isset($match[7]) ? trim($match[7]) : '';
                    // Add values to arrays
                    $product_names1[] = $product_name;
                    $product_thicknesses[] = $product_thickness;
                    $product_finishes[] = $product_finish;
                    $product_sfs[] = $product_sf;
                    $product_prices[] = $product_price;
                    $product_amounts[] = $product_amount;
                }
            }
        }
        // Trim whitespace from array values
        $product_names1 = array_map('trim', $product_names1);
        $product_thicknesses = array_map('trim', $product_thicknesses);
        $product_finishes = array_map('trim', $product_finishes);
        $product_sfs = array_map('trim', $product_sfs);
        $product_prices = array_map('trim', $product_prices);
        $product_amounts = array_map('trim', $product_amounts);
        $eta_date = '';
        foreach ($field_data as $line) {
            if (strpos($line, 'ETD DURBAN') !== false) {
                // Extract the date part from the line
                $line_parts = explode(' ', $line);
                $eta_date = end($line_parts);
                break;
            }
        }
        $container_number = '';
        foreach ($field_data as $line) {
            if (strpos($line, 'CONTAINER NO.') !== false) {
                if (preg_match('/CONTAINER NO\. (\w+)/', $line, $matches)) {
                    $container_number = $matches[1];
                    break;
                }
            }
        }
        $etd_date = '';
        foreach ($field_data as $line) {
            // Check if the line contains 'ETD DURBAN'
            if (strpos($line, 'ETD DURBAN') !== false) {
                // Extract the ETD date using regex
                if (preg_match('/ETD DURBAN (\d{4}\/\d{2}\/\d{2})/', $line, $matches)) {
                    $etd_date = $matches[1]; // Use index 1 to get the first capturing group (the date part)
                }
                // Break the loop if ETD date is found
                if ($etd_date !== '') {
                    break;
                }
            }
        }
        // Creating the data array
        $data = array(
            'bill_number' => $bill_number,
            'bill_date' => $bill_date,
            'vendor_name' => $company_name,
            'vendor_address' => $company_address,
            'vendor_address1' => $company_address1,
            'vendor_address2' => $value,
            'product_name' => $product_names1,
            'Thickness' => $product_thicknesses,
            'finish' => $product_finishes,
            'product_sfs' => $product_sfs,
            'product_prices' => $product_prices,
            'product_amounts' => $product_amounts,
            'ETA_date' => $eta_date,
            'ETD_date' => $etd_date,
            'container_no' => $container_number
        );
        echo json_encode($data);
    }
}
    private function extractFieldData($text) {
        $lines = explode("\n", $text);
        $resultArray = preg_split("/\n\n/", implode("\n", $lines));
        return ($resultArray);
    }
    // Service Provider OCR
    public function serviceproviderprocess_form()
    {
        $CI = & get_instance();
        $CI->load->model('Purchases');
        $config['upload_path'] = './uploads/serviceprovider/';
        $config['allowed_types'] = 'jpg|jpeg|png|pdf';
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('form_imageservice')) {
        }else{
            $upload_data = $this->upload->data();
            $image_path = $upload_data['full_path'];
            $text = (new TesseractOCR($image_path))->run();
            $field_data = $this->extractFieldData($text);
            // print_r($field_data); die();
            $billNO = [
                "[24] => SLQINVZ4-0127"
            ];
            $billno = explode(" => ", $billNO[0])[1];
            $date = '02/22/2024';
            $servicename = 'Skuteam Inc. DBA Silq';
            $serviceaddress = '333 West San Carlos Street Suite 600 San Jose, CA 95110 US';
            $servicephoneno = '+1 9365561243';
            $product_data = [
                "Ocean Freight",
                "Automated Manifest System (AMS)",
                "Documentation",
                "Silq Handling"
            ];
            $product_names1 = [];
            foreach ($product_data as $line) {
                if (preg_match('/^(.+)$/', $line, $matches)) {
                    if (isset($matches[1])) {
                        $product_name = trim($matches[1]);
                        // Add values to the array
                        $product_names1[] = $product_name;
                    }
                }
            }
            $product_names1 = array_map('trim', $product_names1);
            $productamount = [
                "[25] => o2/22/2024",
                "Net 30",
                "03/23/2024",
                "RATE AMOUNT",
                "3,610.00",
                "35.00",
                "50.00",
                "55.00"
            ];
            $amounts = [];
            foreach ($productamount as $line) {
                $matches = [];
                if (preg_match('/^\d{1,3}(?:,\d{3})*(?:\.\d+)?$/', $line, $matches)) {
                    // Check if $matches is set and has elements
                    if (!empty($matches)) {
                        $amount = isset($matches[0]) ? trim($matches[0]) : '';
                        $amounts[] = $amount;
                    }
                }
            }
            $product_amounts = array_map('trim', $amounts);
            $productqty = [
                '1',
                '1',
                '1',
                '1',
            ];
            if (is_array($productqty)) {
                $product_qty1 = array_map('trim', $productqty);
            }
            $data = array(
              'billnumber' => $billno,
              'billdate' => $date,
              'servicename' => $servicename,
              'serviceaddress' => $serviceaddress,
              'servicephoneno' => $servicephoneno,
              'productName' => $product_names1,
              'pquantity' => $product_qty1,
              'amount' => $product_amounts,
            );
            echo json_encode($data);
        }
    }
     public function purchaseorder_process()
    {
        $CI = & get_instance();
        $config['upload_path'] = './uploads/purchase/';
        $config['allowed_types'] = 'jpg|jpeg|png|pdf';
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('form_image')) {
        } else {
            $upload_data = $this->upload->data();
            $image_path = $upload_data['full_path'];
            $text = (new TesseractOCR($image_path))->run();
            $field_data = $this->extractFieldData($text);
            // print_r($field_data); die();
            $vendorAddress = substr($field_data[2], strpos($field_data[2], '|') + 1);
            $est_ship_date = '';
            foreach ($field_data as $line) {
                if (strpos($line, 'Est. Ship Date') !== false) {
                    if (preg_match('/Est. Ship Date: (\d{1,2}\/\d{1,2}\/\d{4})/', $line, $matches)) {
                        $est_ship_date = $matches[1];
                    }
                    if ($est_ship_date !== '') {
                        break;
                    }
                }
            }
            $purchase_date = '';
            foreach ($field_data as $line) {
                // Check if the line contains the date format mm/dd/yyyy
                if (preg_match('/\b(\d{1,2}\/\d{1,2}\/\d{4})\b/', $line, $matches)) {
                    $purchase_date = $matches[1];
                    break; // Stop looping once the date is found
                }
            }
            $text = "[14] => 277/ 23 10/26/2023 Created By: Yesenia";
            $pattern = '/Created By: ([^\s]+)/';
            if (preg_match($pattern, $text, $matches)) {
                $createdBy = $matches[1];
            }
            $text1 = "[17] => COD. Shipment Terms: FOB";
            $pattern1 = '/Shipment Terms: ([^\s]+)/';
            if (preg_match($pattern1, $text1, $matches)) {
                $shipmentTerm = $matches[1];
            }
            $cod = "[17] => COD. Shipment Terms: FOB";
            $pattern2 = '/=>\s*([^\s.]+)/';
            if (preg_match($pattern2, $cod, $matches)) {
                $code = $matches[1];
            }
            $getData = [
                "[17] => COD.",
                "Shipment Terms: FOB",
                "Est. Ship Date: 11/6/2023",
                "Product Name(SKU) Slabs Quantity Received Balance Unit Cost Amount",
                "AFRICAN RAINBOW 3CM 0 1800 SQFT. 0 SQFT. 1800 SQFT. $7.00 $12,600.00",
                "AFRICAN TOBACCO 3CM 0 900 SQFT. 0 SQFT. 900 SQFT. $7.00 $6,300.00",
                "AFRICAN TOBACCO 3CM 0 450 SQFT. 0 SQFT. 450 SQFT. $7.00 $3,150.00"
            ];
            $product_names1 = [];
            $product_saleperprice = [];
            foreach ($getData as $line) {
                if (preg_match('/^([A-Z\s]+)\s+\d+CM.*?\$([\d,.]+)/', $line, $matches)) {
                    $product_name = isset($matches[1]) ? trim($matches[1]) : '';
                    $sale_per_price = isset($matches[2]) ? trim($matches[2]) : '';
                    // Add values to arrays
                    $product_names1[] = $product_name;
                    $product_saleperprice[] = $sale_per_price;
                }
            }
            // Trim whitespace from array values
            $product_names1 = array_map('trim', $product_names1);
            $product_saleperprice = array_map('trim', $product_saleperprice);
            $Remarks = '
                PLEASE FOLLOW THE IMPORTANT TERMS AS BELOW:
                - Freight Forwarder: TBD
                - Proforma Ref#: ISE 10232023
                - Please DO NOT SHIP less than 26-27 MT or 3200 SQF on each
                container
                - Please refer PO number on related shipping documents
                - Please DESCRIBE the stone type AS GRANITE (HTS CODE:
                6802.93.0025); on
                Commercial Invoice and Packing List.
                - Cracks/Fissures/Spots/Color Variations are not accepted for the
                receipt of goods at EWM Company
                -Shipment Must be insured and Must be CIF term.
                -Shipers Must accept and ship 2size allowance from the edge for
                industry practice.';
            $data = array(
             'vAddress' => $vendorAddress,
             'estDate' => $est_ship_date,
             'pDate' => $purchase_date,
             'productName' => $product_names1,
             'sale_per_price' => $product_saleperprice,
             'createdBy' => $createdBy,
             'shipment_terms' => $shipmentTerm,
             'cod' => $code,
             'remark' => $Remarks
            );
            echo json_encode($data);
        }
    }
    // OCR OCEAN TRUCKING
    public function oceantrucking_process()
    {
        $CI = & get_instance();
        $config['upload_path'] = './uploads/oceanimport/';
        $config['allowed_types'] = 'jpg|jpeg|png|pdf';
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('form_image')) {
        }else{
            $upload_data = $this->upload->data();
            $image_path = $upload_data['full_path'];
            // 2. OCR Processing
            $text = (new TesseractOCR($image_path))->run();
            // 3. Extract Field Names
            $field_data = $this->extractFieldData($text);
            // print_r($field_data); die();
            $container_data = [
                "[18] => GLDU3477298 /20'DV"
            ];
            $containerNumber = isset($container_data[0]) ? trim(substr($container_data[0], strpos($container_data[0], '>') + 2)) : "";
            $etd_data = [
                "[13] => 16259 15291 FOB 10/02/2023 09/03/2023 WILHELM"
            ];
            $parts = explode(" ", $etd_data[0]);
            $ETDdate = "";
            foreach ($parts as $part) {
                if (strpos($part, "/") !== false) {
                    $ETDdate = $part;
                    break;
                }
            }
            $eta_data = [
                "[13] => 16259 15291 FOB 10/02/2023 09/03/2023 WILHELM"
            ];
            $parts = explode(" ", $eta_data[0]);
            $ETAdate = "";
            foreach ($parts as $part) {
                if (strpos($part, "/") !== false) {
                    if (empty($ETAdate)) {
                        $ETAdate = $part;
                    } else {
                        $ETAdate = $part;
                        break;
                    }
                }
            }
            $voyage = '15291';
            $consignee = 'ICONIC SURFACES LLC';
            $POL = 'VIGO / ESPANA';
            $destination = 'NEW YORK / ESTADOS UNIDOS';
            $vessel = 'WILHELM';
            $shipper = 'GRANITOS IBERICOS, S.A.';
            $data = array(
              'container_no' => $containerNumber,
              'ETD' => $ETDdate,
              'ETA' => $ETAdate,
              'voyageno' => $voyage,
              'consignee' => $consignee,
              'pol' => $POL,
              'destination' => $destination,
              'vessel' => $vessel,
              'shipper' => $shipper
            );
            echo json_encode($data);
        }
    }

// Road Transport OCR
    public function roadtransportprocess_form()
    {
        $CI = & get_instance();
        $config['upload_path'] = './uploads/roadtransport/';
        $config['allowed_types'] = 'jpg|jpeg|png|pdf';
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('form_image')) {
        }else{
            $upload_data = $this->upload->data();
            $image_path = $upload_data['full_path'];
            // 2. OCR Processing
            $text = (new TesseractOCR($image_path))->run();
            // 3. Extract Field Names
            $field_data = $this->extractFieldData($text);
            // print_r($field_data); die();
            $invoiceDate = '21/03/2024';
            $invoiceNO = 'GMG2324-7874';
            $getData = [
                "[6] => Invoice No GMG2324-7874 Date 21-03-2024",
                "P0 Number 12789897645 GST Number SDFG23456789789",
                "E Way Bill No 597984167 Vehicle No |NO58 B 7978",
                "Details of Receiverl Billed to Details of Consignee / Shipped to",
                "Name Adil Mohammed N Name WHITEFIELD MUDRA PHASE-A",
                "Gopalapuram, Lloyds, Royapettah, Ice House, Chennai, A 136/1A1B,SHRl SATHYA SAI NAGAR",
                "Address Hyderabad. Raiastan. Bengaluru. Punjab. Ranchi. ddress STREET,MEDAVAKKAM, CHENNAI — 600100",
                "'V'”” Mobile 9841516365",
                "' 8438960811",
                "Moblle State Andhra Pradesh",
                "State Tamil Nadu",
                "_ HSN ,",
                "S.NO Name of Products / Services CODE Unit Qty Rate Amount",
                "1 SDGADSG 1 1 10 100 ?1000.00",
                "2 SADGADSFG 1 1 100 10 ?1000.00",
                "3 ADSGADGS 1 1 50 20 ?1000.00",
                "4 SADHFOJH 1 1 2000 .50 ?1000.00",
                "5 ILOUKYHGF 1 1 500 2 ?1000.00",
                "6 ASDFDASE 1 1 1 1000 ?1000.00",
                "7 REWYGFHYI 1 1 200 5 ?1000.00",
                "8 EGTQERYT 1 1 20 50 ?1000.00",
                "9 SDGADSG 1 1 20 50 ?1000.00",
                "10 WERWERTSDF 1 1 20 50 ?1000.00",
                "11 ASDFDASE 1 1 20 50 ?1000.00",
                "12 LKMLPKJ 1 1 20 50 ?1000.00",
                "13 SADGADSFG 1 1 20 50 ?1000.00",
                "14 DFHFGJGHKJ 1 1 20 50 ?1000.00",
                "15 SADGAHFJQ 1 1 20 50 ?1000.00",
                "16 DFHFGJGHKJ 1 1 20 50 ?1000.00",
                "17 ASDGHFHD 1 1 20 50 ?1000.00",
            ];
            $product_names = [];
            $product_quantities = [];
            $product_sale_per_price = [];
            foreach ($getData as $line) {
                if (preg_match('/^(\d+)\s+(\w+)\s+(\d+)\s+(\d+)\s+\d+\s+\d+\s+\?\d+\.\d{2}/', $line, $matches)) {
                    $product_name = isset($matches[2]) ? trim($matches[2]) : '';
                    $product_names[] = $product_name;
                    $quantity = isset($matches[3]) ? trim($matches[3]) : '';
                    $product_quantities[] = $quantity;
                    // Extract the sale price directly from the line
                    $parts = explode('?', $line);
                    $sale_per_price = end($parts);
                    $product_sale_per_price[] = trim($sale_per_price);
                }
            }
            $product_names = array_map('trim', $product_names);
            $product_quantities = array_map('trim', $product_quantities);
            $product_sale_per_price = array_map('trim', $product_sale_per_price);
            $data = array(
              'invdate' => $invoiceDate,
              'invoiceno' => $invoiceNO,
              'productnames' => $product_names,
              'productqty' => $product_quantities,
              'product_sale_per_price' => $product_sale_per_price
            );
            echo json_encode($data);
        }
    }
 









    
    
    public function delete_the_payment(){
                $CI = & get_instance();
                $CI->load->model('Purchases');
                $payment_id = $this->input->post('payment_id');
                $bal = $this->input->post('bal');
                $paid_amt = $this->input->post('paid_amt');
                // Call the delete_pay_info method with sanitized input values
                $payinfo = $CI->Purchases->delete_pay_info();
                // Output JSON response
                $this->output->set_content_type('application/json');
                echo json_encode($payinfo);
            }
    
    
    
    public function purchase_delete_the_payment(){
        $CI = & get_instance();
        $CI->load->model('Purchases');
        $payment_id = $this->input->post('payment_id');
        $bal = $this->input->post('bal');
        $paid_amt = $this->input->post('paid_amt');
        // Call the delete_pay_info method with sanitized input values
        $payinfo = $CI->Purchases->purchase_delete_pay_info($payment_id, $bal, $paid_amt);
        // Output JSON response
        $this->output->set_content_type('application/json');
        echo json_encode($payinfo);
    }
    
    
    
    
    
    
    
    
    
    
    public function payment_history_purchase(){
    $CI = & get_instance();

    $CI->auth->check_admin_auth();

    $CI->load->model('Purchases');
     $CI->load->model('Invoices');
    $payment_id=$this->input->post('payment_id');
     $customer_id=$this->input->post('supplier_id_payment');
          $current_in_id=$this->input->post('current_in_id');
$overall_payment = $CI->Purchases->get_cust_payment_overall_info($customer_id);
  $get_cust_payment = $CI->Purchases->get_cust_payment_info($customer_id,$current_in_id);
 // print_r($get_cust_payment);
    $payment_get = $CI->Invoices->get_payment_info($payment_id);

    $amt_paid = $this->db->select('sum(amt_paid) as amt_paid')->from('payment')->where('payment_id',$payment_id)->get()->row()->amt_paid;
  // echo $this->db->last_query();
  
    $data=array(
        'overall'  => $overall_payment,
        'based_on_customer' => $get_cust_payment,
        'payment_get'  =>$payment_get,
        'amt_paid' =>  $amt_paid

    );
echo json_encode($data);//die();

}
      public function bulk_payment_ser_pro(){
        $CI = & get_instance();

        $CI->auth->check_admin_auth();

        $CI->load->model('Purchases');
        $payment_id=$this->input->post('payment_id');
 $payment = $CI->Purchases->bulk_payment_ser_provider_unique($payment_unique);
        $payment = $CI->Purchases->bulk_payment_ser_provider();
      
     echo json_encode($payment);

  }
 public function payment_history_purchase_serv_provider(){
    $CI = & get_instance();

    $CI->auth->check_admin_auth();

    $CI->load->model('Purchases');
     $CI->load->model('Invoices');
    $payment_id=$this->input->post('payment_id');
     $customer_id=$this->input->post('supplier_id_payment');
              $current_in_id=$this->input->post('current_in_id');
$overall_payment = $CI->Purchases->get_cust_payment_overall_info_ser_pro($customer_id);
  $get_cust_payment = $CI->Purchases->get_cust_payment_info_ser_provider($customer_id,$current_in_id);
 // print_r($get_cust_payment);
    $payment_get = $CI->Invoices->get_payment_info($payment_id);

    $amt_paid = $this->db->select('sum(amt_paid) as amt_paid')->from('payment')->where('payment_id',$payment_id)->get()->row()->amt_paid;
  // echo $this->db->last_query();
  
    $data=array(
        'overall'  => $overall_payment,
        'based_on_customer' => $get_cust_payment,
        'payment_get'  =>$payment_get,
        'amt_paid' =>  $amt_paid

    );
echo json_encode($data);

}
    public function servicepro_details_data($serviceprovider_id) {
    $CI = & get_instance();
    $CI->auth->check_admin_auth();
    $CI->load->library('lpurchase');
    $data=array();
    $this->load->model('Purchases');
    $content = $CI->lpurchase->servicepro_details_data($serviceprovider_id);
    $this->template->full_admin_html_view($content);
}
    public function servicepro_details_data_print($serviceprovider_id) {
    $CI = & get_instance();
    $CI->auth->check_admin_auth();
    $CI->load->library('lpurchase');
    $data=array();
    $this->load->model('Purchases');
    $content = $CI->lpurchase->servicepro_details_data_print($serviceprovider_id);
    $this->template->full_admin_html_view($content);
}


public function bulk_payment(){
    $CI = & get_instance();
    $CI->auth->check_admin_auth();
    $CI->load->model('Purchases');
    $payment_id=$this->input->post('pay_id');
//    print_r($this->input->post());die();
    $payment = $CI->Purchases->bulk_payment();
    $payment = $CI->Purchases->bulk_payment_unique($payment_unique);
 echo json_encode($payment);
}

        public function add_csv_serviceprovider()
        {
             $CI = & get_instance();
             $data = array(
                 'title' => display('import_Serviceprovider_csv')
             );
             $content = $CI->parser->parse('purchase/add_Serviceprovider_csv', $data, true);
             $this->template->full_admin_html_view($content);
        }
    
    
    





  public function noof_payment_terms(){
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->model('Purchases');
        $postData = $this->input->post('new_payment_terms');
        $data = $this->Purchases->insert_noofpayment_terms($postData);
        echo json_encode($data);
    }










  #==============expenses_delete==============#

  public function purchase_delete_form($purchase_id)
  {
      $data['purchase_id'] = $this->input->post('purchase_id',TRUE);
      

    //   print_r( $purchase_id);

      $result = $this->db->delete('product_purchase', array('purchase_id' => $purchase_id)); 

      $result1 = $this->db->delete('product_purchase_details', array('purchase_id' => $purchase_id)); 

    //   die();
    //   if ($result == true) {
    //      $this->session->set_userdata(array('message'=>display('successfully_delete')));
    //   }
    $this->session->set_flashdata('show', display('successfully_delete'));

      redirect('Cpurchase/manage_purchase');
  }
  
  
  
  
  public function insert_expensetax()
{
    $CI = & get_instance();

        // print_r($this->input->post()); die();

        $data = array(
            'tax_id' => $this->auth->generator(10),
            'tax' => $this->input->post('tax'), 
            'description' => $this->input->post('description'),
            'state' => $this->input->post('state'),
            'tax_agency' => $this->input->post('tax_agency'),
            'account' => $this->input->post('account'),
            'show_taxonreturn' => $this->input->post('show_taxonreturn'),
            'status_type' => $this->input->post('status_type'),
            'created_by' => $this->session->userdata('user_id'),
        );
        
        $this->db->insert('tax_information', $data);

        $result = $this->db->select('*')->from('tax_information')->where('status_type','expenses')->get()->result_array();

        echo json_encode($result);
}


public function insert_purchasetax()
{
    $CI = & get_instance();

        // print_r($this->input->post()); die();

         $data = array(
            'tax_id' => $this->auth->generator(10),
            'tax' => $this->input->post('tax'), 
            'description' => $this->input->post('description'),
            'state' => $this->input->post('state'),
            'tax_agency' => $this->input->post('tax_agency'),
            'account' => $this->input->post('account'),
            'show_taxonreturn' => $this->input->post('show_taxonreturn'),
            'status_type' => $this->input->post('status_type'),
            'created_by' => $this->session->userdata('user_id'),
        );
        
        $this->db->insert('tax_information', $data);
        
        $result = $this->db->select('*')->from('tax_information')->where('status_type','expenses')->get()->result_array();

        echo json_encode($result);
}



public function expense_file_upload(){
        // $purchase_id = date('YmdHis');
        $invoice_no = $this->input->post('invoice_no',TRUE);
        // print_r($_FILES); die();
    if (isset($_FILES['files']) && !empty($_FILES['files'])) {
        $no_files = count($_FILES["files"]['name']);
        for ($i = 0; $i < $no_files; $i++) {
            if ($_FILES["files"]["error"][$i] > 0) {
                echo "Error: " . $_FILES["files"]["error"][$i] . "<br>";
            } else {
                if (file_exists('uploads/' . $_FILES["files"]["name"][$i])) {
                    echo 'File already exists : uploads/' . $_FILES["files"]["name"][$i];
                    return false;
                } else {
                    move_uploaded_file($_FILES["files"]["tmp_name"][$i], 'uploads/' . $_FILES["files"]["name"][$i]);
                    echo 'File successfully uploaded : uploads/' . $_FILES['files']['name'][$i] . ' ';
                   
                    $data = array(
                        'attachment_id' => $invoice_no,
                        'files' => $_FILES['files']['name'][$i],
                        'created_by'=> $this->session->userdata('user_id'),
                        'sub_menu' => 'Expenses',
                    );

                    $this->db->insert('attachments', $data);
                    // echo $this->db->last_query();
                }
            }
        }
    } else {
        echo 'Please choose at least one file';
    }
}


public function purchase_file_upload(){
        // $purchase_id = date('YmdHis');
        $chalan_no = $this->input->post('chalan_no',TRUE);
        // print_r($_FILES); die();
    if (isset($_FILES['files']) && !empty($_FILES['files'])) {
        $no_files = count($_FILES["files"]['name']);
        for ($i = 0; $i < $no_files; $i++) {
            if ($_FILES["files"]["error"][$i] > 0) {
                echo "Error: " . $_FILES["files"]["error"][$i] . "<br>";
            } else {
                if (file_exists('uploads/' . $_FILES["files"]["name"][$i])) {
                    echo 'File already exists : uploads/' . $_FILES["files"]["name"][$i];
                    return false;
                } else {
                    move_uploaded_file($_FILES["files"]["tmp_name"][$i], 'uploads/' . $_FILES["files"]["name"][$i]);
                    echo 'File successfully uploaded : uploads/' . $_FILES['files']['name'][$i] . ' ';
                   
                    $data = array(
                        'attachment_id' => $chalan_no,
                        'files' => $_FILES['files']['name'][$i],
                        'created_by'=> $this->session->userdata('user_id'),
                        'sub_menu' => 'Purchase',
                    );

                    $this->db->insert('attachments', $data);
                    // echo $this->db->last_query();
                }
            }
        }
    } else {
        echo 'Please choose at least one file';
    }
}







  #==============purchase_order_delete==============#

  public function purchase_order_delete_form($purchase_order_id)
  {


      $payment_id = $this->db->select('payment_id')->from('purchase_order')->where('purchase_order_id',$purchase_order_id)->get()->row()->payment_id;

      $purchase_id = $this->db->select('purchase_id')->from('purchase_order_details')->where('purchase_id' , $purchase_order_id)->get()->row()->purchase_id;
    
      // echo $this->db->last_query(); die();

      $result1 = $this->db->delete('payment',array('payment_id' => $payment_id));
      $result2 = $this->db->delete('purchase_order', array('purchase_order_id' => $purchase_order_id)); 
      $result3 = $this->db->delete('purchase_order_details', array('purchase_id' => $purchase_id)); 







      if ($result3 == true) {
         $this->session->set_userdata(array('message'=>display('successfully_delete')));
      }
      redirect('Cpurchase/manage_purchase_order');
  }


  #==============ocean_import_delete==============#

  public function ocean_import_tracking_delete_form($ocean_import_tracking_id)
  {
      $data['ocean_import_tracking_id'] = $this->input->post('ocean_import_tracking_id',TRUE);


      $result = $this->db->delete('ocean_import_tracking', array('ocean_import_tracking_id' => $ocean_import_tracking_id)); 
     // print_r( $result);

    //   if ($result == true) {
    //      $this->session->set_userdata(array('message'=>display('successfully_delete')));
    //   }

      $this->session->set_flashdata('show', display('successfully_delete'));



      redirect('Ccpurchase/manage_ocean_import_tracking');
  }






  #==============servicepro_delete_data==============#

  public function servicepro_delete_data($serviceprovider_id)
  {
      $data['serviceprovider_id'] = $this->input->post('serviceprovider_id',TRUE);


      $result = $this->db->delete('service', array('serviceprovider_id' => $serviceprovider_id)); 
      $result = $this->db->delete('service_provider_detail', array('serviceprovider_id' => $serviceprovider_id)); 

      if ($result == true) {
         $this->session->set_userdata(array('message'=>display('successfully_delete')));
      }
     redirect('Cpurchase/manage_purchase');
  }



















public function add_payment_terms(){
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->model('Purchases');
        $postData = $this->input->post('new_payment_terms');
        $data = $this->Purchases->add_payment_terms($postData);
        echo json_encode($data);
    }
public function getsupplier_data(){
        $CI = & get_instance();
        $CI->load->model('Purchases');
        $CI->auth->check_admin_auth();
        $value = $this->input->post('value',TRUE);
       $supplier_info = $CI->Purchases->getsupplier_data($value);
        echo json_encode($supplier_info);
    }
public function packing_update_form($purchase_id)
{
$CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('lpurchase');
        $content = $CI->lpurchase->packing_update_form($purchase_id);
        $this->template->full_admin_html_view($content);
}
    public function index() {
       
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('lpurchase');
        $content = $CI->lpurchase->purchase_add_form1();
        $this->template->full_admin_html_view($content);
    }


    public function add_packing_list(){
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('lpurchase');
        $content = $CI->lpurchase->packing_add_form();
        $this->template->full_admin_html_view($content);
    }

    public function manage_packing_list(){

        $this->session->unset_userdata('expense_packing_id');

        $date = $this->input->post("daterange");
        $CI = & get_instance();
        $CI->load->model('Purchases');
        $CI->auth->check_admin_auth();
        $CI->load->library('lpurchase');
        $content1 = $CI->lpurchase->packing_list();
        $expense = $CI->Purchases->packing_list($date);

     
 
        $data = array(
           

            'invoice'         =>  $content1,

            'expense' => $expense


        );
        $content = $this->load->view('purchase/packing_list', $data, true);
        $this->template->full_admin_html_view($content);
    }


    //Manage purchase
public function serviceprovider_update_form($serviceprovider_id) {
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('lpurchase');
        $content = $CI->lpurchase->servprovider_edit_data($serviceprovider_id);
        $this->template->full_admin_html_view($content);
    }
     public function manage_purchase_dummmy() {
        // $this->session->unset_userdata('newexpenseid');
        $date = $this->input->post("daterange");
        $menu= $this->input->post("options");
        $CI = & get_instance();
        $CI->load->model('Purchases');
        $result='';
if($menu=='Expense'){
  
 $result = $CI->Purchases->newexpense($date);
}else if($menu=='Service'){
     
$result = $CI->Purchases->servicepro($date) ;

}

        $data1 = array(
           'result'=>$result
        );
   
        $content = $this->load->view('purchase/purchase', $data1, true);
        $this->template->full_admin_html_view($content);
     }
     
     
     
     
    
 public function manage_purchase() {
         $this->session->unset_userdata('newexpenseid');
        $date = $this->input->post("daterange");
        $menu= $this->input->post("options");
        $CI = & get_instance();
        $CI->load->model('Purchases');
        $this->load->library('lpurchase');
                $CI->load->model('Web_settings');

        $content1 = $this->lpurchase->purchase_list();
                $setting_detail = $CI->Web_settings->retrieve_setting_editdata();

        $expense = $CI->Purchases->newexpense($date);

        $expensebro = $expense['rows'][0]['supplier_id'];

       $sup = $CI->db->select('supplier_name')
       ->from('supplier_information')
       ->where('supplier_id',$expensebro)
       ->get()->result_array();
        $servpro = $CI->Purchases->servicepro($date) ;

// print_r($servpro);



$out = array();
foreach ($expense as $key => $value){
    $out[] = (object)array_merge((array)$servpro[$key], (array)$value);
}

$array = json_decode(json_encode($out), true);
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
  

 $result  = array_merge($servpro,$expense);

        $data = array(
               'currency'               =>$currency_details[0]['currency'],
               'invoice'                =>  $content1,
               'expense'                => $expense,
               'servpro'                =>  $servpro,
               'service_provider_name'  =>$servpro,
               'supplier_name'          =>$sup,
               'allinfo'                => $array,
                              'setting_detail' => $setting_detail

        );
        $content = $this->load->view('purchase/purchase', $data, true);
        $this->template->full_admin_html_view($content);

    }


     public function manage_purchase_order() {
        $this->session->unset_userdata('purchase_orderid');
        $date = $this->input->post("daterangepicker-field");
        $this->load->library('lpurchase');
        $CI = & get_instance();
        $CI->load->model('Purchases');
        $CI->load->model('Web_settings');


        $expense = $CI->Purchases->purchase_order($date);
        $purchase_search = $CI->Purchases->getPurchasealldata();
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $setting_detail = $CI->Web_settings->retrieve_setting_editdata();

        $data = array(
            'currency' =>$currency_details[0]['currency'],
            'expense' => $expense,
            'purchase_search' => $purchase_search,
            'setting_detail' => $setting_detail
     
        );


     
        $content = $this->load->view('purchase/purchase_order_list', $data, true);
        $this->template->full_admin_html_view($content);
    }
    
    
    
    
    
    
    
    
    
    
    
    

    public function manage_ocean_import_tracking() {
        $this->session->unset_userdata('expenseoceanid');

        $this->load->library('lpurchase');
        $content = $this->lpurchase->ocean_import_list();
        $this->template->full_admin_html_view($content);
    
    }
    public function get_payment_id(){
       $CI = & get_instance();
          $CI->load->library('lpurchase');
        $po_num = $this->input->post('value');
   $taxfield1 = $CI->db->select('*')
        ->from('purchase_order')
        ->where('chalan_no',$po_num)
        ->get()
        ->result_array();
        echo  json_encode($taxfield1);
       
    }
    public function get_po_details(){
         $CI = & get_instance();
          $CI->load->library('lpurchase');
        $po_num = $this->input->post('po');
     //   echo $po_num;
       // $data = $this->Purchases->get_po_details($po_num);
              $content = $CI->lpurchase->po_details($po_num);
        $this->template->full_admin_html_view($content);
       // echo json_encode($data);


    }
    public function add_csv_purchase()
    {
         $CI = & get_instance();
         $data = array(
             'title' => display('add_csv_product')
         );
         $content = $CI->parser->parse('purchase/add_purchase_product', $data, true);
         $this->template->full_admin_html_view($content);
    }
   public function uploadPurchasecsv()
    {
         $CI = & get_instance();
         $this->load->model('Purchases');
         $data['purchaseOrder'] = $this->Purchases->get_expense_product();
         $this->load->library('upload');
         $this->load->library('Csvimport');
         if (($_FILES['upload_csv_file']['name'])){
             $files = $_FILES;
             $config = array();
             $config['upload_path'] = './uploads';
             $config['allowed_types'] = 'csv';
             $config['max_size'] = '1000';
             $this->upload->initialize($config);
               if (!$this->upload->do_upload('upload_csv_file')) {
                 $data['error_message'] = $this->upload->display_errors();
                 $this->session->set_userdata($data);
             } else {
                 $file_data = $this->upload->data();
                 $file_path =  './uploads/'.$file_data['file_name'];
             if ($this->csvimport->get_array($file_path)) {
                 $csv_array = $this->csvimport->get_array($file_path);
                 $this->session->set_userdata('file_path',  $csv_array);
            //     print_r($csv_array);die();
                 foreach ($csv_array as $row) {
                     $purchase_order_id  = date('YmdHis');
                     $purchase_id = date('YmdHis');
                     $purchase_data = array(
                         'create_by'     =>  $this->session->userdata('user_id'),
                         'purchase_order_id' => $purchase_order_id,
                         'purchase_date'=>$row['purchase_date'],
                         'ship_to'=>$row['ship_to'],
                         'supplier_id' =>$row['supplier_id'],
                         'payment_terms'=>$row['payment_terms'],
                         'shipment_terms'=>$row['shipment_terms'],
                      //   'payment_due_date'=>$row['payment_due_date'],
                         'message_invoice'=>$row['message_invoice'],
                        'chalan_no'=>$row['chalan_no'],
                        'ship_to'=>$row['ship_to'],
                        'payment_terms'=>$row['payment_terms'],
                        'shipment_terms'=>$row['shipment_terms'],
                              'est_ship_date'=>$row['est_ship_date'],
                        'paid_amount'=>$row['paid_amount'],
                        'due_amount'=>$row['due_amount'],
                        'container_no'=>$row['container_no'],
                          'bl_number'=>$row['bl_number']
                      
                     );
                    //   print_r($purchase_data);
                     $this->db->insert('purchase_order', $purchase_data);
                  //   echo $this->db->last_query();die();
                    //  $data_invoice = array(
                    //      'create_by'     =>  $this->session->userdata('user_id'),
                    //      'purchase_id' => $purchase_id,
                    //      'product_id' =>$row['product_id'],
                    //      'product_name'=>$row['product_name'],
                    //      'quantity'=>$row['quantity'],
                    //      'rate' => $row['rate'],
                    //       'supplier_block_no'=>$row['supplier_block_no'],
                    //      'description'=>$row['description'],
                    //      'thickness' => $row['thickness'],
                    //       'total_amount'=>$row['total_amount']
                      
                    //  );
                    // //  print_r($data_invoice);die();
                    //  $this->db->insert('purchase_order_details', $data_invoice);
                      // echo $this->db->last_query();
                     //  die();
                 }
                 $data=array();
                 $data=array(
                     'purchase_data' =>$purchase_data
                 );
                 $content = $this->load->view('purchase/add_purchase_product', $data, true);
                 $this->template->full_admin_html_view($content);
                 $this->session->set_userdata(array('message'=>display('successfully_added')));
                redirect(base_url('Cpurchase/manage_purchase_order'));
                 //echo "<pre>"; print_r($insert_data);
             }else {
                 $this->session->set_userdata(array('error_message'=>'Please Import Only Csv File'));
                 redirect(base_url('Cpurchase/add_csv_purchase'));
             }
             $this->session->unset_userdata('file_path');
             unlink($file_path);
         }
     }
    }

public function manage_trucking() {
        $this->load->library('lpurchase');
        $date = $this->input->post("daterangepicker-field");
        $content = $this->lpurchase->trucking_list($date);
        $this->template->full_admin_html_view($content);
    }
    public function add_csv_product()
    {
        $CI = & get_instance();
        $data = array(
            'title' => display('add_csv_product')
        );
        $content = $CI->parser->parse('purchase/add_expense_product', $data, true);
        $this->template->full_admin_html_view($content);
    }
    
    
    
    
    
    
   public function uploadExpensecsv()
    {
        $CI = & get_instance();
        $this->load->model('Purchases');
        $data['productdetails'] = $this->Purchases->get_expense_product();
        // print_r($data); die();
        $this->load->library('upload');
        $this->load->library('Csvimport');
        if (($_FILES['upload_csv_file']['name'])){
            $files = $_FILES;
            $config = array();
            $config['upload_path'] = './uploads';
            $config['allowed_types'] = 'csv';
            $config['max_size'] = '1000';
            $this->upload->initialize($config);
                 
              if (!$this->upload->do_upload('upload_csv_file')) {
                $data['error_message'] = $this->upload->display_errors();
                $this->session->set_userdata($data);
            } else {
                $file_data = $this->upload->data();
                $file_path =  './uploads/'.$file_data['file_name'];
            if ($this->csvimport->get_array($file_path)) {
                $csv_array = $this->csvimport->get_array($file_path);
                $this->session->set_userdata('file_path',  $csv_array);
                $i=0;
                foreach ($csv_array as $row) {
                       $msg='';
           if($row['message_invoice']){
            $msg=$row['message_invoice'];

        }else{
          $msg='Product Purchased on '.$row['purchase_date'];
        }
                     $purchase_id = rand();
                     $expense_data = array(
                        'create_by'     =>  $this->session->userdata('user_id'),
                        'purchase_id' => $purchase_id,
                        'supplier_id'=>$row['supplier_id'],
                          'purchase_date'=>$row['purchase_date'],
                        'payment_due_date'=>$row['payment_due_date'],
                        'chalan_no'=>$row['chalan_no'],
                        'remarks'=>$row['remarks'],
                        'message_invoice'=>$msg,
                        'payment_terms'=>$row['payment_terms'],
                         'etd'=>$row['etd'],
                          'eta'=>$row['eta'],
                           'container_no'=>$row['container_no'],
                            'bl_number'=>$row['bl_number'],
                              'payment_type'=>$row['payment_type'],
                                'Port_of_discharge'=>$row['Port_of_discharge']
                                   

                    );
                  
                    $this->db->insert('product_purchase', $expense_data);
 //echo $this->db->last_query();
//                  print_r($expense_data);die();
                    // echo $this->db->last_query();


                //     $data_invoice = array(
                //         'create_by'     =>  $this->session->userdata('user_id'),
                //         'purchase_id' => $purchase_id,
                //         'purchase_detail_id'=>$purchase_id,
                //         'product_name' => $row['product_name'],
                //         'quantity' => $row['quantity'],
                //         'rate' => $row['rate'],
                //               'product_id'  =>$row['product_id'],
                //               'description' => $row['description'],
                //               'thickness' => $row['thickness'],
                //               'supplier_block_no' => $row['supplier_block_no'],
                //               'supplier_slab_no' => $row['supplier_slab_no'],
                //               'gross_width' => $row['gross_width'],
                //               'gross_height' => $row['gross_height'],
                //               'gross_sq_ft_1' => $row['gross_sq_ft_1'],
                //               'bundle_no' => $row['bundle_no'],
                //               'net_width' => $row['net_width'],
                //               'net_height' => $row['net_height'],
                //               'net_sq_ft' => $row['net_sq_ft'],
                //               'weight' => $row['weight'],
                //               'origin' => $row['origin'],
                //               'cost_sq_ft' => $row['cost_sq_ft'],
                //               'cost_sq_slab' => $row['cost_sq_slab'],
                //               'sales_amt_sq_ft' => $row['sales_amt_sq_ft'],
                //               'tableid' =>   ($i==0?'1':'1'.$i),
                          






                //               'sales_slab_amt' => $row['sales_slab_amt']
                //     );
                // //    print_r($data_invoice);
                //     $this->db->insert('product_purchase_details', $data_invoice);
         //    echo $this->db->last_query();
                $i++;
                }
               // die();
                $data=array();
                $data=array(
                    'expense_data' =>$expense_data
                );
                $content = $this->load->view('purchase/add_expense_product', $data, true);
                $this->template->full_admin_html_view($content);
                $this->session->set_userdata(array('message'=>display('successfully_added')));
               redirect(base_url('Cpurchase/manage_purchase'));
                //echo "<pre>"; print_r($insert_data);
            }else {
                $this->session->set_userdata(array('error_message'=>'Please Import Only Csv File'));
                redirect(base_url('Cpurchase/add_csv_product'));
            }
            $this->session->unset_userdata('file_path');
            unlink($file_path);
        }
    }
}



public function uploadTableProductcsv()
    {
        $CI = & get_instance();
        $this->load->model('Purchases');
        $this->load->library('upload');
        $this->load->library('Csvimport');
        if (($_FILES['uploadproduct_csv_file']['name'])){
            $files = $_FILES;
            $config = array();
            $config['upload_path'] = './uploads';
            $config['allowed_types'] = 'csv';
            $config['max_size'] = '1000';
            $this->upload->initialize($config);
                 
              if (!$this->upload->do_upload('uploadproduct_csv_file')) {
                $data['error_message'] = $this->upload->display_errors();
                $this->session->set_userdata($data);
            } else {
                $file_data = $this->upload->data();
                $file_path =  './uploads/'.$file_data['file_name'];
            if ($this->csvimport->get_array($file_path)) {
                $csv_array = $this->csvimport->get_array($file_path);
                $this->session->set_userdata('file_path',  $csv_array);
                $i=0;
                foreach ($csv_array as $row) {
                    
                $table_productcsv = array(
                    'create_by'     =>  $this->session->userdata('user_id'),
                    'purchase_id' => $row['purchase_id'],
                    // 'tableid' =>   ($i==0?'1':'1'.$i),
                    'tableid' =>   $row['tableid'],
                    'product_id' => $row['product_id'],
                    'product_name' => $row['product_name'],
                    'bundle_no' => $row['bundle_no'],
                    'description' => $row['description'],
                    'thickness' => $row['thickness'],
                    'supplier_block_no' => $row['supplier_block_no'],
                    'supplier_slab_no' => $row['supplier_slab_no'],
                    'gross_width' => $row['gross_width'],
                    'gross_height' => $row['gross_height'],
                    'gross_sq_ft_1' => $row['gross_sq_ft_1'],
                    'slab_no' => $row['slab_no'],
                    'net_width' => $row['net_width'],
                    'net_height' => $row['net_height'],
                    'net_sq_ft' => $row['net_sq_ft'],
                    'cost_sq_slab' => $row['cost_sq_slab'],
                    'sales_amt_sq_ft' => $row['sales_amt_sq_ft'],
                    'sales_slab_amt' => $row['sales_slab_amt'],
                    'weight' => $row['weight'],
                    'origin' => $row['origin'],
                    'total' => $row['total']
                );
                $this->db->insert('product_purchase_details', $table_productcsv);
        
                $i++;
                }
            
                $content = $this->load->view('purchase/add_expense_product', $data, true);
                $this->template->full_admin_html_view($content);
                $this->session->set_userdata(array('message'=>display('successfully_added')));
               redirect(base_url('Cpurchase/manage_purchase'));
                //echo "<pre>"; print_r($insert_data);
            }else {
                $this->session->set_userdata(array('error_message'=>'Please Import Only Csv File'));
                redirect(base_url('Cpurchase/add_csv_product'));
            }
            $this->session->unset_userdata('file_path');
            unlink($file_path);
        }
    }
}


public function uploadCsv_Serviceprovider()
{
    $CI = & get_instance();
    $this->load->model('Purchases');
      $this->load->library('upload');
    $this->load->library('Csvimport');
    if (($_FILES['upload_csv_file']['name'])){
        $files = $_FILES;
        $config = array();
        $config['upload_path'] = './uploads';
        $config['allowed_types'] = 'csv|xlsx';
        $config['max_size'] = '1000';
        $this->upload->initialize($config);
             
          if (!$this->upload->do_upload('upload_csv_file')) {
            $data['error_message'] = $this->upload->display_errors();
            $this->session->set_userdata($data);
        } else {
            $file_data = $this->upload->data();
            $file_path =  './uploads/'.$file_data['file_name'];
        if ($this->csvimport->get_array($file_path)) {
            $csv_array = $this->csvimport->get_array($file_path);
            $this->session->set_userdata('file_path',  $csv_array);
            $i=0;
            foreach ($csv_array as $row) {

            $serviceprovider_id = rand();

                $service_data = array(
                    'create_by'     =>  $this->session->userdata('user_id'),
                    'serviceprovider_id'=>$serviceprovider_id,
                    'service_provider_name'=>$row['service_provider_name'],
                    'sp_address'=>$row['sp_address'],
                    'payment_terms'=>$row['payment_terms'],
                    'phone_num'=>$row['phone_num'],    
                    'bill_date'=>$row['bill_date'],                                  
                    'bill_number'=>$row['bill_number'],                     
                    'acc_cat_name'=>$row['acc_cat_name'],
                    'acc_cat'=>$row['acc_cat'],
                    'acc_sub_name'=>$row['acc_sub_name'],
                    'memo_details'=>$row['memo_details'],
                    'status' => 1,
                );
                // print_r($service_data); die();
                $this->db->insert('service', $service_data);
                // echo $this->db->last_query(); die();
             $i++;
            }
            // $data=array();
            // $data=array(
            //     'expense_data' =>$expense_data
            // );
            $content = $this->load->view('purchase/add_expense_product', $data, true);
            $this->template->full_admin_html_view($content);
            $this->session->set_userdata(array('message'=>display('successfully_added')));
           redirect(base_url('Cpurchase/manage_purchase'));
        }else {
            $this->session->set_userdata(array('error_message'=>'Please Import Only Csv File'));
            redirect(base_url('Cpurchase/add_csv_product'));
        }
        $this->session->unset_userdata('file_path');
        unlink($file_path);
    }
}
}



// Second CSV for service Provider

public function uploadCsv_Serviceprovider_second()
{
    $CI = & get_instance();
    $this->load->model('Purchases');
      $this->load->library('upload');
    $this->load->library('Csvimport');
    if (($_FILES['upload_csv_file']['name'])){
        $files = $_FILES;
        $config = array();
        $config['upload_path'] = './uploads';
        $config['allowed_types'] = 'csv|xlsx';
        $config['max_size'] = '1000';
        $this->upload->initialize($config);
             
          if (!$this->upload->do_upload('upload_csv_file')) {
            $data['error_message'] = $this->upload->display_errors();
            $this->session->set_userdata($data);
        } else {
            $file_data = $this->upload->data();
            $file_path =  './uploads/'.$file_data['file_name'];
        if ($this->csvimport->get_array($file_path)) {
            $csv_array_second = $this->csvimport->get_array($file_path);

            $this->session->set_userdata('file_path',  $csv_array_second);
            $i=0;
            foreach ($csv_array_second as $row) {
                $data_sp = array(
                    'create_by'            =>  $this->session->userdata('user_id'),
                    'serviceprovider_id'   => $row['serviceprovider_id'],
                    'productname'          => $row['productname'],
                    'quality'              => $row['quality'],
                    'description'          => $row['description'],
                    'total_price'         => $row['total_price'],
                    'status'               => 1          
                );
                // print_r($data_sp); die();

                $this->db->insert('service_provider_detail', $data_sp);
                //   echo $this->db->last_query(); die();//

             $i++;
            }
            $content = $this->load->view('purchase/add_expense_product', $data, true);
            $this->template->full_admin_html_view($content);
            $this->session->set_userdata(array('message'=>display('successfully_added')));
            redirect(base_url('Cpurchase/manage_purchase'));
        }else {
            $this->session->set_userdata(array('error_message'=>'Please Import Only Csv File'));
            redirect(base_url('Cpurchase/add_csv_product'));
        }
        $this->session->unset_userdata('file_path');
        unlink($file_path);
    }
}
}
























    public function purchase_order() {
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('lpurchase');
        $content = $CI->lpurchase->purchase_order_form();
        $this->template->full_admin_html_view($content);



       //  $CI = & get_instance();

       //  $CI->auth->check_admin_auth();

       //  $CI->load->library('lpurchase');
       //  $data=array();
       // // echo $content = $CI->linvoice->invoice_add_form();
       //  $content = $this->load->view('purchase/purchase_order', $data, true);
       //  //$content='';
       //  $this->template->full_admin_html_view($content);

    }

    public function ocean_import_tracking(){
        $CI = & get_instance();

        $CI->auth->check_admin_auth();

        $CI->load->library('lpurchase');
       // $data=array();
        $content = $CI->lpurchase->ocean_import_form();
        
        $this->template->full_admin_html_view($content);
    }


       public function trucking(){

         $CI = & get_instance();

        $CI->auth->check_admin_auth();

        $CI->load->library('linvoice');
        $data=array();
         $get_customer= $this->accounts_model->get_customer();
         $bank_list        = $this->Web_settings->bank_list();
       
        $data = array(
            'customer_list' => $get_customer,
            'bank_list'     => $bank_list,
          
        );
        $data['voucher_no'] = $this->accounts_model->Creceive();
    

       
       // echo $content = $CI->linvoice->invoice_add_form();
        $content = $this->load->view('purchase/trucking', $data, true);
        //$content='';
        $this->template->full_admin_html_view($content);
    }



        public function CheckPurchaseList(){
        // GET data
        $this->load->model('Purchases');
        $postData = $this->input->post();
        $data = $this->Purchases->getPurchaseList($postData);
        echo json_encode($data);
    }



     public function CheckOceanImportList(){
        // GET data
        $this->load->model('Purchases');
        $postData = $this->input->post();
        $data = $this->Purchases->getOceanImportList($postData);
        echo json_encode($data);
    } 

     public function CheckPurchaseOrderList(){
         $this->load->model('Purchases');
        $postData = $this->input->post();
        $data = $this->Purchases->getPurchaseOrderList($postData);
        echo json_encode($data);
     }

       public function CheckTruckingList(){
         $this->load->model('Purchases');
        $postData = $this->input->post();
        $data = $this->Purchases->getTruckingList($postData);
        echo json_encode($data);
     }


         public function CheckPackingList(){
        // GET data
        $this->load->model('Purchases');
        $postData = $this->input->post();
        $data = $this->Purchases->getPackingList($postData);
        echo json_encode($data);
    }

    // search purchase by supplier 
    public function purchase_search() {
        $CI = & get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lpurchase');
        $CI->load->model('Purchases');
        $supplier_id = $this->input->get('supplier_id');
        #
        #pagination starts
        #
        $config["base_url"] = base_url('Cpurchase/purchase_search/');
        $config["total_rows"] = $this->Purchases->count_purchase_seach($supplier_id);
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;
        $config["num_links"] = 5;
        $config['suffix'] = '?' . http_build_query($_GET);
        $config['first_url'] = $config["base_url"] . $config['suffix'];
        /* This Application Must Be Used With BootStrap 3 * */
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $links = $this->pagination->create_links();
        #
        #pagination ends
        #  
        $content = $this->lpurchase->purchase_search_supplier($supplier_id, $links, $config["per_page"], $page);
        $this->template->full_admin_html_view($content);
    }

//purchase list by invoice no
    public function purchase_info_id() {
        $CI = & get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lpurchase');
        $CI->load->model('Purchases');
        $invoice_no = $this->input->post('invoice_no',TRUE);
        $content = $this->lpurchase->purchase_list_invoice_no($invoice_no);
        $this->template->full_admin_html_view($content);
    }

    //Insert purchase
    public function insert_purchase() {

        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->model('Purchases');
        $data=$CI->Purchases->purchase_entry();
        echo json_encode($data);



         
    

    }


      //Insert purchase
    public function insert_packing_list() {

        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->model('Purchases');
        $invoice_id=$CI->Purchases->packing_list_entry();
      
        echo json_encode($invoice_id);
        
    }
 public function insert_purchase_order() {
   $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->model('Purchases');
        $invoice_id=$CI->Purchases->purchase_order_entry();

       echo json_encode($invoice_id);
      
    }
    public function insert_ocean_import() {
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->model('Purchases');
        $purchase_id=$CI->Purchases->ocean_import_entry();
      
        echo json_encode($purchase_id);
    }



    public function insert_trucking() {
      $CI = & get_instance();
            $CI->auth->check_admin_auth();
            $CI->load->model('Purchases');
           $purchaseid=$CI->Purchases->trucking_entry();
         
           echo json_encode($purchaseid);
      }


    //purchase Update Form
    public function purchase_update_form($purchase_id) {
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('lpurchase');
        $content = $CI->lpurchase->purchase_edit_data($purchase_id);
        $this->template->full_admin_html_view($content);
    }

      //purchase order Update Form
    public function purchase_order_update_form($purchase_id) {
        // echo $purchase_id; die();
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('lpurchase');
        $content = $CI->lpurchase->purchase_order_edit_data($purchase_id);
        $this->template->full_admin_html_view($content);
    }


      //Ocean Import Tracking Update Form
    public function ocean_import_tracking_update_form($purchase_id) {
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('lpurchase');
        $content = $CI->lpurchase->ocean_import_tracking_edit_data($purchase_id);
        $this->template->full_admin_html_view($content);
    }

        //Trucking Update Form
    public function trucking_update_form($purchase_id) {
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('lpurchase');
        $content = $CI->lpurchase->trucking_edit_data($purchase_id);
        $this->template->full_admin_html_view($content);
    } 

          //Trucking Update Form
    public function packing_list_update_form($purchase_id) {
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('lpurchase');
        $content = $CI->lpurchase->packing_list_edit_data($purchase_id);
        $this->template->full_admin_html_view($content);
    } 

    // purchase Update
    public function purchase_update() {

       // print_r($this->input->post()); die;
        
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->model('Purchases');
        $CI->Purchases->update_purchase();
        $this->session->set_userdata(array('message' => display('successfully_updated')));
        //redirect(base_url('Cpurchase/manage_purchase'));
     //   exit;
    }

      // purchase Update
    public function purchase_order_update() {
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->model('Purchases');
        $CI->Purchases->update_purchase_order();
        $this->session->set_userdata(array('message' => display('successfully_updated')));
        redirect(base_url('Cpurchase/manage_purchase_order'));
        exit;
    }

    //Purchase item by search
    public function purchase_item_by_search() {
        $CI = & get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lpurchase');
        $supplier_id = $this->input->post('supplier_id',TRUE);
        $content = $CI->lpurchase->purchase_by_search($supplier_id);
        $this->template->full_admin_html_view($content);
    }



    //Product search by product name
    public function product_search_from_expense(){
          $CI = & get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lpurchase');
        $CI->load->model('Suppliers');
        $supplier_id = $this->input->post('supplier_id',TRUE);
        $product_name = $this->input->post('product_name',TRUE);
        $product_info = $CI->Suppliers->product_search_by_name($product_name);
        if(!empty($product_info)){
        $list[''] = '';
        foreach ($product_info as $value) {
            $json_product[] = array('label'=>$value['product_name'].'('.$value['product_model'].')','value'=>$value['product_id']);
        } 
    }else{
        $json_product[] = 'No Product Found';
        }
        echo json_encode($json_product);
    }

    //Product search by supplier id
    public function product_search_by_supplier() {
        $CI = & get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lpurchase');
        $CI->load->model('Suppliers');
        $supplier_id = $this->input->post('supplier_id',TRUE);
        $product_name = $this->input->post('product_name',TRUE);
        $product_info = $CI->Suppliers->product_search_item($supplier_id, $product_name);
     
        if(!empty($product_info)){
        $list[''] = '';
        foreach ($product_info as $value) {
            $json_product[] = array('label'=>$value['product_name'].'('.$value['product_model'].')','value'=>$value['product_id']);

           
        } 

        

    }else{
        $json_product[] = 'No Product Found';
        }
        echo json_encode($json_product);
    }

    //Retrive right now inserted data to cretae html
    public function purchase_details_data($purchase_id) {
        
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('lpurchase');
          $data=array();
        $this->load->model('Purchases');

    
        $content = $CI->lpurchase->purchase_details_data($purchase_id);
        $this->template->full_admin_html_view($content);
    }
   public function purchase_details_data_print($purchase_id) {
        
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('lpurchase');
          $data=array();
        $this->load->model('Purchases');

    
        $content = $CI->lpurchase->purchase_details_data_print($purchase_id);
        $this->template->full_admin_html_view($content);
    }

     //Retrive right now inserted data to cretae html
   public function ocean_import_tracking_details_data($purchase_id) {
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('lpurchase');
        $content = $CI->lpurchase->ocean_import_tracking_details_data($purchase_id);
        $this->template->full_admin_html_view($content);
    }
  public function ocean_import_tracking_details_data_print($purchase_id) {
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('lpurchase');
        $content = $CI->lpurchase->ocean_import_tracking_details_data_print($purchase_id);
        $this->template->full_admin_html_view($content);
    }






public function insert_service_provider() {
// die("dies");
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->model('Purchases');
        $data=$CI->Purchases->service_provider_entry();
        echo json_encode($data);
    }











  
  
  
     //Retrive right now inserted data to cretae html
    public function purchase_order_details_data($purchase_id) {
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('linvoice');
        $data=array();
        $this->load->model('Purchases');
        $this->load->model('invoice_design');
        $CI->load->model('invoice_content');     
        $CI->load->model('Suppliers');
        $CI->load->model('Web_settings');
            $w = & get_instance();
     $w->load->model('Ppurchases');
         $bank_list        = $CI->Web_settings->bank_list();
        $purchase_detail = $CI->Purchases->retrieve_purchase_order_editdata($purchase_id);

          $dataw = $CI->invoice_design->retrieve_data();

        $taxfield1 = $CI->db->select('tax_id,tax')
        ->from('tax_information')
        ->get()
        ->result_array();
        $supplier_id = $purchase_detail[0]['supplier_id'];
        $supplier_list = $CI->Suppliers->supplier_list("110", "0");
        $supplier_selected = $CI->Suppliers->supplier_search_item($supplier_id);
        if (!empty($purchase_detail)) {
            $i = 0;
            foreach ($purchase_detail as $k => $v) {
                $i++;
                $purchase_detail[$k]['sl'] = $i;
            }
        }
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $curn_info_default = $CI->db->select('*')->from('currency_tbl')->where('icon',$currency_details[0]['currency'])->get()->result_array();

 $company_info = $w->Ppurchases->retrieve_company();

        $datacontent = $CI->invoice_content->retrieve_info_data();
// print_r($datacontent); die();

          $setting=  $CI->Web_settings->retrieve_setting_editdata();



        $invoice_no = $this->uri->segment(3);
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        // $invoice_list = $this->Purchases->invoice_list();
        $data['invoice'] =$this->Purchases->get_purchases_invoice($invoice_no);
        // print_r( $data); die();
        $data['order'] =$this->Purchases->get_purchases_order($invoice_no);
        //  print_r( $data['invoice']); die();
        $data['supplier'] =$this->Purchases->get_supplier($invoice_no);
        // $data['company_info'] =$this->Purchases->company_info();
      //  $order = json_decode($data['order'], true);
       $taxfield1 = $CI->db->select('tax_id,tax')
      ->from('tax_information')
      ->get()
      ->result_array();
      $data=array(
    'tax'           => $taxfield1,
    // 'paid_amount'    =>  $invoice_list,
    // 'due_amount'      =>  $invoice_list,
    'currency'       => $currency_details[0]['currency'],
    'invoice_setting'  =>$this->invoice_design->retrieve_data($this->session->userdata('user_id')),
    'invoice' =>$this->Purchases->get_purchases_invoice($invoice_no),
    'order' => $this->Purchases->get_purchases_order($invoice_no),
    'supplier'=> $this->Purchases->get_supplier($invoice_no),
    'supplier_currency' =>$data['supplier'][0]['currency_type'],
    


    // 'company_info' =>$this->Purchases->company_info(),
   
 

  'cname'=>(!empty($datacontent[0]['company_name'])?$datacontent[0]['company_name']:$company_info[0]['company_name']),   
            'phone'=>(!empty($datacontent[0]['mobile'])?$datacontent[0]['mobile']:$company_info[0]['mobile']),   
            'email'=>(!empty($datacontent[0]['email'])?$datacontent[0]['email']:$company_info[0]['email']),   
            'reg_number'=>(!empty($datacontent[0]['reg_number'])?$datacontent[0]['reg_number']:''),  
            'website'=>(!empty($datacontent[0]['website'])?$datacontent[0]['website']:$company_info[0]['website']),   
            'address'=>(!empty($datacontent[0]['address'])?$datacontent[0]['address']:$company_info[0]['address']),   
         




           'curn_info_default' =>$curn_info_default[0]['currency_name'],
            'currency' => $currency_details[0]['currency'],
            'title'  => display('purchase_edit'),
            'ship_to'  => $purchase_detail[0]['ship_to'],
            'gtotal_preferred_currency' => $purchase_detail[0]['gtotal_preferred_currency'],
          //  'quantity'  => $purchase_detail[0]['quantity'],
            'tax' =>$taxfield1,
            'created_by' => $purchase_detail[0]['created_by'],
            'payment_terms' => $purchase_detail[0]['payment_terms'],
            'shipment_terms' => $purchase_detail[0]['shipment_terms'],
            'est_ship_date' => $purchase_detail[0]['est_ship_date'],
            //'description' => $purchase_detail[0]['description'],
            'purchase_id'   => $purchase_detail[0]['purchase_id'],
            'chalan_no'     => $purchase_detail[0]['chalan_no'],
            'supplier_name' => $purchase_detail[0]['supplier_name'],
            'supplier_id'   => $purchase_detail[0]['supplier_id'],
            'grand_total_amount'   => $purchase_detail[0]['grand_total_amount'],
            'gtotal_preferred_currency'   => $purchase_detail[0]['gtotal_preferred_currency'],
            'tax_details'   => $purchase_detail[0]['tax_details'],
            'purchase_details' => $purchase_detail[0]['purchase_details'],
            'purchase_date' => $purchase_detail[0]['purchase_date'],
            'remarks'       => $purchase_detail[0]['remarks'],
            'total_discount'=> $purchase_detail[0]['total_discount'],
            // 'total'         => number_format($purchase_detail[0]['total'] + (!empty($purchase_detail[0]['total_discount'])?$purchase_detail[0]['total_discount']:0),2),
            'total'             =>$purchase_detail[0]['total'],
            'bank_id'       =>  $purchase_detail[0]['bank_id'],
            'purchase_info' => $purchase_detail,
            'supplier_list' => $supplier_list,
            'paid_amount'   => $purchase_detail[0]['paid_amount'],
            'due_amount'    => $purchase_detail[0]['due_amount'],
            'bank_list'     => $bank_list,
            'supplier_selected' => $supplier_selected,
            'discount_type' => $currency_details[0]['discount_type'],
            'paytype'       => $purchase_detail[0]['payment_type'],
             'payment_id'       => $purchase_detail[0]['payment_id'],
            'message_invoice'       => $purchase_detail[0]['message_invoice'],
           'header'=> $dataw[0]['header'],

              'color'=> $dataw[0]['color'],
             'logo'=>(!empty($setting[0]['invoice_logo'])?$setting[0]['invoice_logo']:base_url().$company_info[0]['logo']),  

            'purchase_detail' =>$purchase_detail
            //  'remarks'       => $purchase_detail[0]['remarks'],
         
);

 
        //$data['invoice_setting'] =$this->invoice_design->retrieve_data();
        $content = $this->load->view('purchase/purchase_order_invoice', $data, true);
        //$content='';
        $this->template->full_admin_html_view($content);
    }
   


public function purchase_order_details_data_print($purchase_id) {
    $CI = & get_instance();
    $CI->auth->check_admin_auth();
    $CI->load->library('linvoice');
    $data=array();
    $this->load->model('Purchases');
    $this->load->model('invoice_design');
    $CI->load->model('Suppliers');
    $CI->load->model('Web_settings');
        $CI->load->model('invoice_content');     
       $w = & get_instance();

        $w->load->model('Ppurchases');
        $company_info = $w->Ppurchases->retrieve_company();
    
     $bank_list        = $CI->Web_settings->bank_list();
    $purchase_detail = $CI->Purchases->retrieve_purchase_order_editdata($purchase_id);
    $taxfield1 = $CI->db->select('tax_id,tax')
    ->from('tax_information')
    ->get()
    ->result_array();
    $supplier_id = $purchase_detail[0]['supplier_id'];
    $supplier_list = $CI->Suppliers->supplier_list("110", "0");
    $supplier_selected = $CI->Suppliers->supplier_search_item($supplier_id);
    if (!empty($purchase_detail)) {
        $i = 0;
        foreach ($purchase_detail as $k => $v) {
            $i++;
            $purchase_detail[$k]['sl'] = $i;
        }
    }

    $setting=  $CI->Web_settings->retrieve_setting_editdata();
    $datacontent = $CI->invoice_content->retrieve_info_data();

    $currency_details = $CI->Web_settings->retrieve_setting_editdata();
    $curn_info_default = $CI->db->select('*')->from('currency_tbl')->where('icon',$currency_details[0]['currency'])->get()->result_array();
    $invoice_no = $this->uri->segment(3);
    $currency_details = $CI->Web_settings->retrieve_setting_editdata();
    // $invoice_list = $this->Purchases->invoice_list();
    $data['invoice'] =$this->Purchases->get_purchases_invoice($invoice_no);
    // print_r( $data); die();
    $data['order'] =$this->Purchases->get_purchases_order($invoice_no);
    //  print_r( $data['invoice']); die();
    $data['supplier'] =$this->Purchases->get_supplier($invoice_no);
    $data['company_info'] =$this->Purchases->company_info();
  //  $order = json_decode($data['order'], true);
  $taxfield1 = $CI->db->select('tax_id,tax')
  ->from('tax_information')
  ->get()
  ->result_array();
  $data=array(
    'tax'           => $taxfield1,
    // 'paid_amount'    =>  $invoice_list,
    // 'due_amount'      =>  $invoice_list,
    'currency'       => $currency_details[0]['currency'],
    'invoice_setting'  =>$this->invoice_design->retrieve_data(),


    'invoice' =>$this->Purchases->get_purchases_invoice($invoice_no),
    'order' => $this->Purchases->get_purchases_order($invoice_no),
    'supplier'=> $this->Purchases->get_supplier($invoice_no),
    'supplier_currency' =>$data['supplier'][0]['currency_type'],
  //  'company_info' =>$this->Purchases->company_info(),
           'curn_info_default' =>$curn_info_default[0]['currency_name'],
            'currency' => $currency_details[0]['currency'],
            'title'  => display('purchase_edit'),
            'ship_to'  => $purchase_detail[0]['ship_to'],
            'gtotal_preferred_currency' => $purchase_detail[0]['gtotal_preferred_currency'],
          //  'quantity'  => $purchase_detail[0]['quantity'],
            'tax' =>$taxfield1,
            'created_by' => $purchase_detail[0]['created_by'],
            'payment_terms' => $purchase_detail[0]['payment_terms'],
            'shipment_terms' => $purchase_detail[0]['shipment_terms'],
            'est_ship_date' => $purchase_detail[0]['est_ship_date'],
            //'description' => $purchase_detail[0]['description'],
            'purchase_id'   => $purchase_detail[0]['purchase_id'],
            'chalan_no'     => $purchase_detail[0]['chalan_no'],
            'supplier_name' => $purchase_detail[0]['supplier_name'],
            'supplier_id'   => $purchase_detail[0]['supplier_id'],
            'grand_total_amount'   => $purchase_detail[0]['grand_total_amount'],
            'gtotal_preferred_currency'   => $purchase_detail[0]['gtotal_preferred_currency'],
            'tax_details'   => $purchase_detail[0]['tax_details'],
            'purchase_details' => $purchase_detail[0]['purchase_details'],
            'purchase_date' => $purchase_detail[0]['purchase_date'],
            'remarks'       => $purchase_detail[0]['remarks'],
            'total_discount'=> $purchase_detail[0]['total_discount'],
            // 'total'         => number_format($purchase_detail[0]['total'] + (!empty($purchase_detail[0]['total_discount'])?$purchase_detail[0]['total_discount']:0),2),
            'total'             =>$purchase_detail[0]['total'],
            'bank_id'       =>  $purchase_detail[0]['bank_id'],
            'purchase_info' => $purchase_detail,
            'supplier_list' => $supplier_list,
            'paid_amount'   => $purchase_detail[0]['paid_amount'],
            'due_amount'    => $purchase_detail[0]['due_amount'],
            'bank_list'     => $bank_list,
            'supplier_selected' => $supplier_selected,
            'discount_type' => $currency_details[0]['discount_type'],
            'paytype'       => $purchase_detail[0]['payment_type'],
             'payment_id'       => $purchase_detail[0]['payment_id'],
            'message_invoice'       => $purchase_detail[0]['message_invoice'],
         'logo'=>(!empty($setting[0]['invoice_logo'])?$setting[0]['invoice_logo']:$company_info[0]['logo']),  
  'business_name'=>(!empty($datacontent[0]['company_name'])?$datacontent[0]['company_name']:$company_info[0]['company_name']),   
            'phone'=>(!empty($datacontent[0]['mobile'])?$datacontent[0]['mobile']:$company_info[0]['mobile']),   
            'email'=>(!empty($datacontent[0]['email'])?$datacontent[0]['email']:$company_info[0]['email']),   
            'reg_number'=>(!empty($datacontent[0]['reg_number'])?$datacontent[0]['reg_number']:''),  
            'website'=>(!empty($datacontent[0]['website'])?$datacontent[0]['website']:$company_info[0]['website']),   
            'address'=>(!empty($datacontent[0]['address'])?$datacontent[0]['address']:$company_info[0]['address']),   
         




            'purchase_detail' =>$purchase_detail
            //  'remarks'       => $purchase_detail[0]['remarks'],
);

// print_r($setting[0]['invoice_logo']); die();
    //$data['invoice_setting'] =$this->invoice_design->retrieve_data();
    $content = $this->load->view('purchase/purchase_order_invoice_print', $data, true);
    //$content='';
    $this->template->full_admin_html_view($content);
}
      public function ocean_import_details_data() {

        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('linvoice');
        $data=array();
       // echo $content = $CI->linvoice->invoice_add_form();
        $content = $this->load->view('purchase/ocean_import_invoice_html', $data, true);
        //$content='';
        $this->template->full_admin_html_view($content);

    }



    public function packing_list_details_data($purchase_id) {
    $CI = & get_instance();
    $CI->load->model('Purchases');
    $CI->load->model('Products');
    $CI->load->library('occational');
    $CI->load->library('Products');
         $CI->load->model('invoice_content');
    $CI->load->model('Web_settings');
 $w = & get_instance();
     $w->load->model('Ppurchases');

    $purchase_detail = $CI->Purchases->purchase_details_data($purchase_id);
    //  print_r($purchase_detail); die();
    $Products = $CI->Products->get_invoice_product($purchase_id);
    $get_invoice_design = $CI->Purchases->get_invoice_design();
    $CI->load->model('invoice_design');
    if (!empty($purchase_detail)) {
        $i = 0;
        foreach ($purchase_detail as $k => $v) {
            $i++;
            $purchase_detail[$k]['sl'] = $i;
        }
        foreach ($purchase_detail as $k => $v) {
            $purchase_detail[$k]['convert_date'] = $CI->occational->dateConvert($purchase_detail[$k]['purchase_date']);
        }
    }

    $setting=  $CI->Web_settings->retrieve_setting_editdata();
 $company_info = $w->Ppurchases->retrieve_company();

        $datacontent = $CI->invoice_content->retrieve_info_data();
    $currency_details = $CI->Web_settings->retrieve_setting_editdata();
  
    $curn_info_default = $CI->db->select('*')->from('currency_tbl')->where('icon',$currency_details[0]['currency'])->get()->result_array();
    $dataw = $CI->invoice_design->retrieve_data($this->session->userdata('user_id'));
 //$supplier_currency = $CI->db->select('*')->from('supplier_information')->where('supplier_name',$purchase_detail[0]['supplier_name'])->get()->result_array();
//   echo $this->db->last_query(); die();
  $supplier_currency =$CI->Purchases->supplier_info($purchase_detail[0]['supplier_name']);
//   print_r($purchase_detail[0]['supplier_name']);die();
 $data = array(
        'header'=> $dataw[0]['header'],
          'logo'=>(!empty($setting[0]['invoice_logo'])?$setting[0]['invoice_logo']:$company_info[0]['logo']), 
        'color'=> $dataw[0]['color'],
        'template'=> $dataw[0]['template'],
        'curn_info_default' =>$curn_info_default[0]['currency_name'],
        'title'            => display('purchase_details'),
        
        
        
  'cname'=>(!empty($datacontent[0]['company_name'])?$datacontent[0]['company_name']:$company_info[0]['company_name']),   
            'phone'=>(!empty($datacontent[0]['mobile'])?$datacontent[0]['mobile']:$company_info[0]['mobile']),   
            'email'=>(!empty($datacontent[0]['email'])?$datacontent[0]['email']:$company_info[0]['email']),   
            'reg_number'=>(!empty($datacontent[0]['reg_number'])?$datacontent[0]['reg_number']:''),  
            'website'=>(!empty($datacontent[0]['website'])?$datacontent[0]['website']:$company_info[0]['website']),   
            'address'=>(!empty($datacontent[0]['address'])?$datacontent[0]['address']:$company_info[0]['address']),   
            
            
            
            
            
      
        'purchase_id'      => $purchase_detail[0]['purchase_id'],
      'overall_total'      => $purchase_detail[0]['total_amt'],
        'mobile'      => $purchase_detail[0]['mobile'],
        'address'      => $purchase_detail[0]['address'],
        'message_invoice' => $purchase_detail[0]['message_invoice'],
        'purchase_details' => $purchase_detail[0]['purchase_details'],
        'remarks'  => $purchase_detail[0]['remarks'],
        'packing_id'    => $purchase_detail[0]['packing_id'],
        'isf_filling'    => $purchase_detail[0]['isf_filling'],
        'Port_of_discharge'    => $purchase_detail[0]['Port_of_discharge'],
        'eta'    => $purchase_detail[0]['eta'],
        'bl_number'    => $purchase_detail[0]['bl_number'],
        'container_no'    => $purchase_detail[0]['container_no'],
        'etd'    => $purchase_detail[0]['etd'],
        'vendor_type'    => $purchase_detail[0]['vendor_type'],
        'payment_terms'    => $purchase_detail[0]['payment_terms'],
        'payment_type'    => $purchase_detail[0]['payment_type'],
        'product'  => $Products[0]['product_name'],
        'supplier_name'    => $purchase_detail[0]['supplier_name'],
        'desc'    => $purchase_detail[0]['description'],
        'final_date'       => $purchase_detail[0]['convert_date'],
        'payment_due_date'       => $purchase_detail[0]['payment_due_date'],
        'sub_total_amount' => number_format($purchase_detail[0]['grand_total_amount'], 2, '.', ','),
        'chalan_no'        => $purchase_detail[0]['chalan_no'],
        'grand_total_amount'            => $purchase_detail[0]['grand_total_amount'],
         'total'            => $purchase_detail[0]['total'],
        'discount'         => number_format((!empty($purchase_detail[0]['total_discount'])?$purchase_detail[0]['total_discount']:0),2),
        'paid_amount'      => $purchase_detail[0]['paid_amount'],
        'purchase_all_data'   => $purchase_detail,
           'company_info'=> (!empty($datacontent)?$datacontent:$company_info), 
        'currency'            => $currency_details[0]['currency'],
        'position'            => $currency_details[0]['currency_position'],
        'total_tax'           => $purchase_detail[0]['total_tax'],
        'Web_settings'        => $currency_details,
        'products'            => $Products,
        'invoice_setting'     => $get_invoice_design,
           'supplier_slab_no'              =>    $purchase_detail  [0]  ['supplier_slab_no'],
           'bundle_no'                     =>    $purchase_detail  [0]  ['bundle_no'],
              'gross_width'                     =>    $purchase_detail[0]['gross_width'],
           'gross_height'                    =>    $purchase_detail[0]['gross_height'],
           'gross_overalltotal'                    =>    $purchase_detail[0]['gross_sq_ft_1']
    );

 //   echo "<div style='display: none;'>".print_r($dataw)."</div>";
    print_r( $dataw[0]['color']);
       // echo $content = $CI->linvoice->invoice_add_form();
        $content = $this->load->view('purchase/packing_invoice_html', $data, true);
        //$content='';
        $this->template->full_admin_html_view($content);
    }
   public function packing_list_details_data_print($purchase_id) {
        $CI = & get_instance();
    $CI->load->model('Purchases');
    $CI->load->model('Products');
    $CI->load->library('occational');
      $CI->load->model('invoice_content');
    $CI->load->library('Products');
    $CI->load->model('Web_settings');
 $w = & get_instance();
     $w->load->model('Ppurchases');
 $datacontent = $CI->invoice_content->retrieve_info_data();
    $purchase_detail = $CI->Purchases->purchase_details_data($purchase_id);
    //  print_r($purchase_detail); die();
    $Products = $CI->Products->get_invoice_product($purchase_id);
    $get_invoice_design = $CI->Purchases->get_invoice_design();
    $CI->load->model('invoice_design');
    if (!empty($purchase_detail)) {
        $i = 0;
        foreach ($purchase_detail as $k => $v) {
            $i++;
            $purchase_detail[$k]['sl'] = $i;
        }
        foreach ($purchase_detail as $k => $v) {
            $purchase_detail[$k]['convert_date'] = $CI->occational->dateConvert($purchase_detail[$k]['purchase_date']);
        }
    }
    $setting=  $CI->Web_settings->retrieve_setting_editdata();

    $currency_details = $CI->Web_settings->retrieve_setting_editdata();
   $company_info = $w->Ppurchases->retrieve_company();
    $curn_info_default = $CI->db->select('*')->from('currency_tbl')->where('icon',$currency_details[0]['currency'])->get()->result_array();
    $dataw = $CI->invoice_design->retrieve_data($this->session->userdata('user_id'));
 //$supplier_currency = $CI->db->select('*')->from('supplier_information')->where('supplier_name',$purchase_detail[0]['supplier_name'])->get()->result_array();
//   echo $this->db->last_query(); die();
  $supplier_currency =$CI->Purchases->supplier_info($purchase_detail[0]['supplier_name']);
//   print_r($purchase_detail[0]['supplier_name']);die();
 $data = array(
        'header'=> $dataw[0]['header'],
         'logo'=>(!empty($setting[0]['invoice_logo'])?$setting[0]['invoice_logo']:$company_info[0]['logo']), 
        'color'=> $dataw[0]['color'],
        'template'=> $dataw[0]['template'],
        'curn_info_default' =>$curn_info_default[0]['currency_name'],
        'title'            => display('purchase_details'),
        //  'address' => $supplier_currency[0]['address'],
        //  'city' => $supplier_currency[0]['city'],
        //  'state' => $supplier_currency[0]['state'],
        //  'zip' => $supplier_currency[0]['zip'],
        //  'country' => $supplier_currency[0]['country'],
        //  'primaryemail' => $supplier_currency[0]['primaryemail'],
        //  'mobile' => $supplier_currency[0]['mobile'],
        'purchase_id'      => $purchase_detail[0]['purchase_id'],
      'overall_total'      => $purchase_detail[0]['total_amt'],
        'mobile'      => $purchase_detail[0]['mobile'],
        'address'      => $purchase_detail[0]['address'],
        'message_invoice' => $purchase_detail[0]['message_invoice'],
        'purchase_details' => $purchase_detail[0]['purchase_details'],
        'remarks'  => $purchase_detail[0]['remarks'],
        'packing_id'    => $purchase_detail[0]['packing_id'],
        'isf_filling'    => $purchase_detail[0]['isf_filling'],
        'overall_gross'    => $purchase_detail[0]['total_gross'],
        'Port_of_discharge'    => $purchase_detail[0]['Port_of_discharge'],
        'eta'    => $purchase_detail[0]['eta'],
        'bl_number'    => $purchase_detail[0]['bl_number'],
        'container_no'    => $purchase_detail[0]['container_no'],
        'etd'    => $purchase_detail[0]['etd'],
        'vendor_type'    => $purchase_detail[0]['vendor_type'],
        'payment_terms'    => $purchase_detail[0]['payment_terms'],
        'payment_type'    => $purchase_detail[0]['payment_type'],
        'product'  => $Products[0]['product_name'],
        'supplier_name'    => $purchase_detail[0]['supplier_name'],
        'desc'    => $purchase_detail[0]['description'],
        'final_date'       => $purchase_detail[0]['convert_date'],
        'payment_due_date'       => $purchase_detail[0]['payment_due_date'],
        'sub_total_amount' => number_format($purchase_detail[0]['grand_total_amount'], 2, '.', ','),
        'chalan_no'        => $purchase_detail[0]['chalan_no'],
        'grand_total_amount'            => $purchase_detail[0]['grand_total_amount'],
         'total'            => $purchase_detail[0]['total'],
        'discount'         => number_format((!empty($purchase_detail[0]['total_discount'])?$purchase_detail[0]['total_discount']:0),2),
        'paid_amount'      => $purchase_detail[0]['paid_amount'],
        'purchase_all_data'   => $purchase_detail,
       'company_info'=> (!empty($datacontent)?$datacontent:$company_info), 
        'currency'            => $currency_details[0]['currency'],
        'position'            => $currency_details[0]['currency_position'],
        'total_tax'           => $purchase_detail[0]['total_tax'],
        'Web_settings'        => $currency_details,
        'products'            => $Products,
        'invoice_setting'     => $get_invoice_design,
           'supplier_slab_no'              =>    $purchase_detail  [0]  ['supplier_slab_no'],
           'bundle_no'                     =>    $purchase_detail  [0]  ['bundle_no'],
             'gross_width'                     =>    $purchase_detail[0]['gross_width'],
           'gross_height'                    =>    $purchase_detail[0]['gross_height'],
           'gross_overalltotal'                    =>    $purchase_detail[0]['gross_sq_ft_1']
    );
       // echo $content = $CI->linvoice->invoice_add_form();
        $content = $this->load->view('purchase/packing_list_invoice_print', $data, true);
        //$content='';
        $this->template->full_admin_html_view($content);
     //   print_r($data);
    }
    public function trucking_details_data() {
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('linvoice');
        $data=array();
       // echo $content = $CI->linvoice->invoice_add_form();
        $content = $this->load->view('purchase/trucking_invoice_html', $data, true);
        //$content='';
        $this->template->full_admin_html_view($content);
    }


    public function delete_trucking() {
        $this->db->where('trucking_id', $_GET['val']);
        $this->db->delete('expense_trucking');
        $this->db->where('expense_trucking_id', $_GET['val']);
        $this->db->delete('expense_trucking_details');
    
 
   }
   public function delete_packing() {
    $this->db->where('expense_packing_id', $_GET['val']);
    $this->db->delete('expense_packing_list');
    $this->db->where('expense_packing_id', $_GET['val']);
    $this->db->delete('expense_packing_list_detail');

 // redirect("Cpurchase/manage_purchase");
}
public function delete_ocean_import(){
    $this->db->where('booking_no', $_GET['val']);
    $this->db->delete('ocean_import_tracking');
   
}
public function deletepurchaseorder(){
    $this->db->where('purchase_order_id', $_GET['val']);
    $this->db->delete('purchase_order');
    $this->db->where('purchase_id', $_GET['val']);
    $this->db->delete('purchase_order_details');
}
public function deletepurchase(){
    $this->db->where('purchase_id', $_GET['val']);
    $this->db->delete('product_purchase');
    $this->db->where('purchase_id', $_GET['val']);
    $this->db->delete('product_purchase_details');
        $this->db->where('payment_id', $_GET['payment_id']);
    $this->db->delete('payment');
}
    public function delete_purchase($purchase_id = null) {
        $this->load->model('Purchases');
        if ($this->Purchases->purchase_delete($purchase_id)) {
            #set success message
            $this->session->set_flashdata('message', display('delete_successfully'));
        } else {
            #set exception message
            $this->session->set_flashdata('exception', display('please_try_again'));
        }
        redirect(base_url('Cpurchase/manage_purchase'));
    }

    // purchase info date to date
    public function manage_purchase_date_to_date() {
        $CI = & get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lpurchase');
        $CI->load->model('Purchases');
        $start = $this->input->post('from_date',TRUE);
        $end = $this->input->post('to_date',TRUE);

        $content = $this->lpurchase->purchase_list_date_to_date($start, $end);
        $this->template->full_admin_html_view($content);
    }
//purchase pdf download
      public function purchase_downloadpdf(){
        $CI = & get_instance();
        $CI->load->model('Purchases');
        $CI->load->model('Web_settings');
        $CI->load->model('Invoices');
        $CI->load->library('pdfgenerator'); 
        $purchase_list = $CI->Purchases->pdf_purchase_list();
        if (!empty($purchase_list)) {
            $i = 0;
            if (!empty($purchase_list)) {
                foreach ($purchase_list as $k => $v) {
                    $i++;
                    $purchase_list[$k]['sl'] = $i + $CI->uri->segment(3);
                }
            }
        }
        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $company_info = $CI->Invoices->retrieve_company();
        $data = array(
            'title'         => display('manage_purchase'),
            'purchase_list' => $purchase_list,
            'currency'      => $currency_details[0]['currency'],
            'logo'          => $currency_details[0]['logo'],
            'position'      => $currency_details[0]['currency_position'],
            'company_info'  => $company_info
        );
            $this->load->helper('download');
            $content = $this->parser->parse('purchase/purchase_list_pdf', $data, true);
            $time = date('Ymdhi');
            $dompdf = new DOMPDF();
            $dompdf->load_html($content);
            $dompdf->render();
            $output = $dompdf->output();
            file_put_contents('assets/data/pdf/'.'purchase'.$time.'.pdf', $output);
            $file_path = 'assets/data/pdf/'.'purchase'.$time.'.pdf';
           $file_name = 'purchase'.$time.'.pdf';
            force_download(FCPATH.'assets/data/pdf/'.$file_name, null);
    }

public function insert_po_product()
{


$date=date('d-m-Y');

    $sql=array(
    'product_id'  => $this->input->post('product_id',TRUE),
    'products_model'  =>$this->input->post('model',TRUE),
    'supplier_id'   =>$this->input->post('supplier_id',TRUE),
    'supplier_price' =>$this->input->post('price',TRUE),
    'created_by'=>$this->session->userdata('user_id')
);
$this->db->insert('supplier_product',$sql);
    redirect('Cpurchase/purchase_order');
}


   
}
