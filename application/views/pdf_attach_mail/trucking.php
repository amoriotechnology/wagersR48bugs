
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<?php                

include_once('tcpdf_6_2_13/tcpdf.php'); 

         
  
if(1==1) 
{


  //----- Code for generate pdf
  $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
  $pdf->SetCreator(PDF_CREATOR);  
  //$pdf->SetTitle("Export HTML Table data to PDF using TCPDF in PHP");  
  $pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
  $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
  $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
  $pdf->SetDefaultMonospacedFont('helvetica');  
  $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
  $pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
  $pdf->setPrintHeader(false);  
  $pdf->setPrintFooter(false);  
  $pdf->SetAutoPageBreak(TRUE, 10);  
  $pdf->SetFont('helvetica', '', 12);  
  $pdf->AddPage(); //default A4
  //$pdf->AddPage('P','A5'); //when you require custome page size 

  $myArray = explode('(',$customer_info[0]['tax']); 
 // print_r($myArray); die();
 $tax_amt=$myArray[0];
 $tax_des=$myArray[1];
  
  $content = ''; 

  $content .= '<!DOCTYPE html>
  <html>
    <head>
      <style>
        body {
          border: 1px solid #dee2e6;
          margin-top:50px;
        }
        table {
          font-family: arial, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }
  
        td,
        th {
          border: 1px solid #dddddd;
          text-align: left;
          padding: 10px;
        }
        .table_view {
          border: 1px solid #111;
          background-color: #5961b3;
          color:#fff;
        }
  
        .header_view {
          background-color: #5961b3;
          padding: 10px 40px;
        }
        table .heading{
              border: 1px solid #111;
              background-color:#5961b3;
          }
          .text_color{
              color: #fff;
          }
          .heading_view{
             margin-left: 10px;
          }
          .data_view{
            text-align: center;
          }
      </style>
    </head>
    <body>';

  if($template == 2) {
  
    $content .= '<table>
      <tr class="header_view" >
        <td style="border: none">
            <img src="'.$this->session->userdata('image_email').'" width="100px" />

        </td>
        <td style="border: none; text-align: center; color: white">'. $head[0]['header'].'</td>
           
        <td style="border: none; text-align: right; color: white">'.display("Company Name").': '.$company_content[0]['company_name'].'<br>'.display("Email").': '.$company_content[0]['email'].'<br>'.display("Mobile").': '.$company_content[0]['mobile'].'<br>'.display("Address").': '.$company_content[0]['address'].'</td>


        </tr>
    </table>
    <br><br>

    <table>
      <tr>                                                      
      <td style="border: none; font-weight: normal; line-height: 20px;"><b>'.display("Invoice No").'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;: &nbsp;'.$sale_trucking[0]['trucking_id'].'</span></td>

      <td style="border: none; font-weight: normal; line-height: 20px;"><b>'.display("Invoice Date").'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;: &nbsp;'.$sale_trucking[0]['invoice_date'].'</span></td>
      </tr>
      

    
     

      <tr>

      <td style="border: none; font-weight: normal; line-height: 20px;"><b>'.display("Customer Name").'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;: &nbsp;'.$customer_info[0]['customer_name'].'</span></td>

      <td style="border: none; font-weight: normal; "><b>'.display("Shipping Company").'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;: &nbsp;'.$customer_info[0]['shipment_company'].'</span></td>

      </tr>


      <tr>
      <td style="border: none; font-weight: normal; line-height: 20px;"><b>'.display("Container / Goods pickup date").'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;: &nbsp;'.$sale_trucking[0]['container_pickup_date'].'</span></td>

      <td style="border: none; font-weight: normal; line-height: 20px;"><b>'.display("Delivery Time").'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;: &nbsp;'.$sale_trucking[0]['delivery_time_from'].'--'.$sale_trucking[0]['delivery_time_from'].'</span></td>

      </tr>






      <tr>
     <td style="border: none; font-weight: normal; line-height: 20px;"><b>'.display("Delivery to").'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;: &nbsp;'.$sale_trucking[0]['delivery_to'].'</span></td>
       <td style="border: none; font-weight: normal; line-height: 20px;"><b>'.display("Delivery Date").'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;: &nbsp;'.$sale_trucking[0]['delivery_date'].'</span></td>

      </tr>


      <tr>
      <td style="border: none; font-weight: normal; line-height: 20px;"><b>'.display("Truck No").'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;: &nbsp;'.$sale_trucking[0]['truck_no'].'</span></td>


      </tr>








    </table>
    <br><br>
    <table>
      <tr class="table_view" >
      <th style="color: #fff; text-align: center">'.display("S.No").'</th>
      <th style="color: #fff; text-align: center">'.display("Date").'</th>
      <th style="color: #fff; text-align: center">'.display("Quantity").'</th>
           <th style="color: #fff; text-align: center">'.display("Description").'</th>
      <th style="color: #fff; text-align: center">'.display("Rate").'</th>
      <th style="color: #fff; text-align: center">'.display("Pro No / Reference").'</th>
      <th style="color: #fff; text-align: center">'.display("Total").'</th>
      </tr>';

      if ($sale_trucking_details) {
        $count=1;
        for($i=0;$i<sizeof($sale_trucking_details);$i++){

        $content .='<tr>
        <td style="text-align: center">'.$count.'</td>
        <td style="text-align: center">'.$sale_trucking_details[$i]['trucking_date'].'</td>
        <td style="text-align: center">'.$sale_trucking_details[$i]['qty'].'</td>
        <td style="text-align: center">'.$sale_trucking_details[$i]['description'].'</td>
        <td style="text-align: center">'.$currency[0]['currency'].' '.$sale_trucking_details[$i]['rate'].'</td>
        <td style="text-align: center">'.$sale_trucking_details[$i]['pro_no_reference'].'</td>
        <td style="text-align: center">'.$currency[0]['currency'].' '.$total=$sale_trucking_details[$i]['qty']*$sale_trucking_details[$i]['rate'].'.00</td></tr>';

        $count++;
        }
      }


       $content .=' <tr>
       
       


      <td colspan="6" style="text-align: right">'.display("Total").':</td>
      <td class="data_view">'.$currency[0]['currency'].''.$customer_info[0]['total_amt'].'</td>
    </tr>

    <tr>
    <td colspan="6" style="text-align:right;">Tax:&nbsp;('.$tax_des.'</td>
    <td class="data_view">'.$currency[0]['currency'].''.$tax_amt.'</td>
  </tr>

  <tr>
  <td colspan="6" style="text-align: right">'.display("Grand Total").':</td>
  <td class="data_view">'.$currency[0]['currency'].''.$sale_trucking[0]['grand_total_amount'].'</td>
</tr>




<tr>
<td colspan="6" style="text-align:right;">'.display("Grand Total").''.display("Preferred Currency").':</td>
<td class="data_view">'.$customer_info[0]['currency_type'].''.$sale_trucking[0]['customer_gtotal'].'</td>
  </tr>

       
       
  <tr>
  <td style="text-align:right;"  colspan="6">'.display("Amount Paid").':</td>
  <td class="data_view">'.$customer_info[0]['currency_type'].''.$sale_trucking[0]['amt_paid'].'</td>
    </tr>
  

    <tr>
    <td style="text-align:right;"  colspan="6">'.display("Balance").'</td>
        <td class="data_view">'.$customer_info[0]['currency_type'].''.$sale_trucking[0]['balance'].'</td>

        </tr>
     


     
     
    </table>
    <br>
  <h3 class="heading_view">'.display("Remarks").' : <span style="font-weight: normal;">'.$sale_trucking[0]['remarks'].'</span></h3>';


  }
  elseif($template == 3) {
  
    $content .= '<table>
      <tr class="header_view"  >
      
      
    
        <td style="border: none; text-align: left; color: white">'. $head[0]['header'].'</td>
           
            <td style="border: none">
           <img src="'.$this->session->userdata('image_email').'" width="100px" />

        </td>   
           
           
        <td style="border: none; text-align: right; color: white">'.display("Company Name").': '.$company_content[0]['company_name'].'<br>'.display("Email").': '.$company_content[0]['email'].'<br>'.display("Mobile").': '.$company_content[0]['mobile'].'<br>'.display("Address").': '.$company_content[0]['address'].'</td>

       
       
       
       
        </tr>
    </table>
    <br><br>

    <table>
      <tr>
      <td style="border: none; font-weight: normal; line-height: 20px;"><b>'.display("Invoice No").'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;: &nbsp;'.$sale_trucking[0]['trucking_id'].'</span></td>

      <td style="border: none; font-weight: normal; line-height: 20px;"><b>'.display("Invoice Date").'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;: &nbsp;'.$sale_trucking[0]['invoice_date'].'</span></td>
      </tr>
      

    
     

      <tr>

      <td style="border: none; font-weight: normal; line-height: 20px;"><b>'.display("Customer Name").'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;: &nbsp;'.$customer_info[0]['customer_name'].'</span></td>

      <td style="border: none; font-weight: normal; "><b>'.display("Shipping Company").'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;: &nbsp;'.$customer_info[0]['shipment_company'].'</span></td>

      </tr>


      <tr>
      <td style="border: none; font-weight: normal; line-height: 20px;"><b>'.display("Container / Goods pickup date").'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;: &nbsp;'.$sale_trucking[0]['container_pickup_date'].'</span></td>

      <td style="border: none; font-weight: normal; line-height: 20px;"><b>'.display("Delivery Time").'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;: &nbsp;'.$sale_trucking[0]['delivery_time_from'].'--'.$sale_trucking[0]['delivery_time_from'].'</span></td>

      </tr>






      <tr>
     <td style="border: none; font-weight: normal; line-height: 20px;"><b>'.display("Delivery to").'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;: &nbsp;'.$sale_trucking[0]['delivery_to'].'</span></td>
       <td style="border: none; font-weight: normal; line-height: 20px;"><b>'.display("Delivery Date").'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;: &nbsp;'.$sale_trucking[0]['delivery_date'].'</span></td>

      </tr>


      <tr>
      <td style="border: none; font-weight: normal; line-height: 20px;"><b>'.display("Truck No").'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;: &nbsp;'.$sale_trucking[0]['truck_no'].'</span></td>



      </tr>








    </table>
    <br><br>
    <table>
      <tr class="table_view"  >
        <th style="color: #fff; text-align: center">'.display("S.No").'</th>
        <th style="color: #fff; text-align: center">'.display("Date").'</th>
        <th style="color: #fff; text-align: center">'.display("Quantity").'</th>
             <th style="color: #fff; text-align: center">'.display("Description").'</th>
        <th style="color: #fff; text-align: center">'.display("Rate").'</th>
        <th style="color: #fff; text-align: center">'.display("Pro No / Reference").'</th>
        <th style="color: #fff; text-align: center">'.display("Total").'</th>



        






      </tr>';

      if ($sale_trucking_details) {
        $count=1;
        for($i=0;$i<sizeof($sale_trucking_details);$i++){

        $content .='<tr>
        <td style="text-align: center">'.$count.'</td>
        <td style="text-align: center">'.$sale_trucking_details[$i]['trucking_date'].'</td>
        <td style="text-align: center">'.$sale_trucking_details[$i]['qty'].'</td>
        <td style="text-align: center">'.$sale_trucking_details[$i]['description'].'</td>
        <td style="text-align: center">'.$currency[0]['currency'].' '.$sale_trucking_details[$i]['rate'].'</td>
        <td style="text-align: center">'.$sale_trucking_details[$i]['pro_no_reference'].'</td>
        <td style="text-align: center">'.$currency[0]['currency'].' '.$total=$sale_trucking_details[$i]['qty']*$sale_trucking_details[$i]['rate'].'.00</td></tr>';

        $count++;
        }
      }


       $content .=' <tr>
       
       


       <td colspan="6" style="text-align: right">'.display("Total").':</td>
       <td class="data_view">'.$currency[0]['currency'].''.$customer_info[0]['total_amt'].'</td>
     </tr>
 
     <tr>
     <td colspan="6" style="text-align:right;">Tax:&nbsp;('.$tax_des.'</td>
     <td class="data_view">'.$currency[0]['currency'].''.$tax_amt.'</td>
   </tr>
 
   <tr>
   <td colspan="6" style="text-align: right">'.display("Grand Total").':</td>
   <td class="data_view">'.$currency[0]['currency'].''.$sale_trucking[0]['grand_total_amount'].'</td>
 </tr>
 
 
 
 
 <tr>
 <td colspan="6" style="text-align:right;">'.display("Grand Total").''.display("Preferred Currency").':</td>
 <td class="data_view">'.$customer_info[0]['currency_type'].''.$sale_trucking[0]['customer_gtotal'].'</td>
   </tr>
 
        
        
   <tr>
   <td style="text-align:right;"  colspan="6">'.display("Amount Paid").':</td>
   <td class="data_view">'.$customer_info[0]['currency_type'].''.$sale_trucking[0]['amt_paid'].'</td>
     </tr>
   
 
     <tr>
     <td style="text-align:right;"  colspan="6">'.display("Balance").'</td>
        <td class="data_view">'.$customer_info[0]['currency_type'].''.$sale_trucking[0]['balance'].'</td>

        </tr>
     


     
     
    </table>
    <br>
    <h3 class="heading_view">'.display("Remarks").' : <span style="font-weight: normal;">'.$sale_trucking[0]['remarks'].'</span></h3>';


  }
  
  elseif($template == 1){

  $content .= '<table>
      <tr class="header_view" >
       
           
      <td style="border: none; text-align: left; color: white">'.display("Company Name").': '.$company_content[0]['company_name'].'<br>'.display("Email").': '.$company_content[0]['email'].'<br>'.display("Mobile").': '.$company_content[0]['mobile'].'<br>'.display("Address").': '.$company_content[0]['address'].'</td>


        <td style="border: none; text-align: center; color: white">'. $head[0]['header'].'</td>

 <td style="border: none">
        
        <img src="'.$this->session->userdata('image_email').'" width="100px" />

        </td>

      </tr>




    </table>
    <br><br>

        <table>
        <tr>
        <td style="border: none; font-weight: normal; line-height: 20px;"><b>'.display("Invoice No").'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;: &nbsp;'.$sale_trucking[0]['trucking_id'].'</span></td>

        <td style="border: none; font-weight: normal; line-height: 20px;"><b>'.display("Invoice Date").'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;: &nbsp;'.$sale_trucking[0]['invoice_date'].'</span></td>
        </tr>
        
  
      
       
  
        <tr>
  
        <td style="border: none; font-weight: normal; line-height: 20px;"><b>'.display("Customer Name").'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;: &nbsp;'.$customer_info[0]['customer_name'].'</span></td>
  
        <td style="border: none; font-weight: normal; "><b>'.display("Shipping Company").'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;: &nbsp;'.$customer_info[0]['shipment_company'].'</span></td>
  
        </tr>
  
  
        <tr>
        <td style="border: none; font-weight: normal; line-height: 20px;"><b>'.display("Container / Goods pickup date").'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;: &nbsp;'.$sale_trucking[0]['container_pickup_date'].'</span></td>
  
        <td style="border: none; font-weight: normal; line-height: 20px;"><b>'.display("Delivery Time").'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;: &nbsp;'.$sale_trucking[0]['delivery_time_from'].'--'.$sale_trucking[0]['delivery_time_from'].'</span></td>
  
        </tr>
  
  
  
  
  
  
        <tr>
       <td style="border: none; font-weight: normal; line-height: 20px;"><b>'.display("Delivery to").'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;: &nbsp;'.$sale_trucking[0]['delivery_to'].'</span></td>
         <td style="border: none; font-weight: normal; line-height: 20px;"><b>'.display("Delivery Date").'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;: &nbsp;'.$sale_trucking[0]['delivery_date'].'</span></td>
  
        </tr>
  
  
        <tr>
        <td style="border: none; font-weight: normal; line-height: 20px;"><b>'.display("Truck No").'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;: &nbsp;'.$sale_trucking[0]['truck_no'].'</span></td>
  
  
        </tr>
  
  
  
  
  
  
  
  
      </table>
      <br><br>
      <table>
        <tr class="table_view" >
        <th style="color: #fff; text-align: center">'.display("S.No").'</th>
        <th style="color: #fff; text-align: center">'.display("Date").'</th>
        <th style="color: #fff; text-align: center">'.display("Quantity").'</th>
             <th style="color: #fff; text-align: center">'.display("Description").'</th>
        <th style="color: #fff; text-align: center">'.display("Rate").'</th>
        <th style="color: #fff; text-align: center">'.display("Pro No / Reference").'</th>
        <th style="color: #fff; text-align: center">'.display("Total").'</th>
        </tr>';
  
        if ($sale_trucking_details) {
          $count=1;
          for($i=0;$i<sizeof($sale_trucking_details);$i++){
  
          $content .='<tr>
          <td style="text-align: center">'.$count.'</td>
          <td style="text-align: center">'.$sale_trucking_details[$i]['trucking_date'].'</td>
          <td style="text-align: center">'.$sale_trucking_details[$i]['qty'].'</td>
          <td style="text-align: center">'.$sale_trucking_details[$i]['description'].'</td>
          <td style="text-align: center">'.$currency[0]['currency'].' '.$sale_trucking_details[$i]['rate'].'</td>
          <td style="text-align: center">'.$sale_trucking_details[$i]['pro_no_reference'].'</td>
          <td style="text-align: center">'.$currency[0]['currency'].' '.$total=$sale_trucking_details[$i]['qty']*$sale_trucking_details[$i]['rate'].'.00</td></tr>';
  
          $count++;
          }
        }
        
       $content .=' <tr>
       
       


       <td colspan="6" style="text-align: right">'.display("Total").':</td>
       <td class="data_view">'.$currency[0]['currency'].''.$customer_info[0]['total_amt'].'</td>
     </tr>
 
     <tr>
     <td colspan="6" style="text-align:right;">Tax:&nbsp;('.$tax_des.'</td>
     <td class="data_view">'.$currency[0]['currency'].''.$tax_amt.'</td>
   </tr>
 
   <tr>
   <td colspan="6" style="text-align: right">'.display("Grand Total").':</td>
   <td class="data_view">'.$currency[0]['currency'].''.$sale_trucking[0]['grand_total_amount'].'</td>
 </tr>
 
 
 
 
 <tr>
 <td colspan="6" style="text-align:right;">'.display("Grand Total").''.display("Preferred Currency").':</td>
 <td class="data_view">'.$customer_info[0]['currency_type'].''.$sale_trucking[0]['customer_gtotal'].'</td>
   </tr>
 
        
        
   <tr>
   <td style="text-align:right;"  colspan="6">'.display("Amount Paid").':</td>
   <td class="data_view">'.$customer_info[0]['currency_type'].''.$sale_trucking[0]['amt_paid'].'</td>
     </tr>
   
 
     <tr>
     <td style="text-align:right;"  colspan="6">'.display("Balance").'</td>
         <td class="data_view">'.$customer_info[0]['currency_type'].''.$sale_trucking[0]['balance'].'</td>
 
         </tr>
      
 
 
      
      
     </table>
    <br>
    <h3 class="heading_view">'.display("Remarks").' : <span style="font-weight: normal;">'.$sale_trucking[0]['remarks'].'</span></h3>';

 }

$content .= '</body></html>';     
$content;
// echo $content;
// die();
$pdf->writeHTML($content);

$file_location = ""; //add your full path of your server
//$file_location = "/opt/lampp/htdocs/examples/generate_pdf/uploads/"; //for local xampp server

$datetime=date('dmY_hms');
$file_name = $invoiceid."_".$datetime.".pdf";
ob_end_clean();


 if(1==1)
{

$pdf->Output($file_location.$file_name, 'F',777); // F means upload PDF file on some folder
$files_ar = array();
   foreach ($trucking as $key => $value) {
            $files_ar[]= $value['image_dir'];
        }    
        $file = $files_ar;

include 'mail.php';
}
else 
{
$pdf->Output($file_location.$file_name, 'F'); // F means upload PDF file on some folder
//echo "Email send successfully!!";
  error_reporting(E_ALL ^ E_DEPRECATED);  
  include_once('PHPMailer/class.phpmailer.php');  
  require ('PHPMailer/PHPMailerAutoload.php');

  $body='';
  $body .="<html>
  <head>
  <style type='text/css'> 
  body {
  font-family: Calibri;
  font-size:16px;
  color:#000;
  }
  </style>
  </head>
  <body>
  Dear Customer,
  <br>
  Please find attached invoice copy.
  <br>
  Thank you!
  </body>
  </html>";

  $mail = new PHPMailer();
  $mail->CharSet = 'UTF-8';
  $mail->IsMAIL();
  $mail->IsSMTP();
  $mail->Subject    = "Invoice details";
  $mail->From = "mail@shinerweb.com";
  $mail->FromName = "Shinerweb Technologies";
  $mail->IsHTML(true);
  $mail->AddAddress('rammg1985@gmail.com'); // To mail id
  //$mail->AddCC('info.shinerweb@gmail.com'); // Cc mail id
  //$mail->AddBCC('info.shinerweb@gmail.com'); // Bcc mail id

  $mail->AddAttachment($file_location.$file_name);
  $mail->MsgHTML ($body);
  $mail->WordWrap = 50;
  $mail->Send();  
  $mail->SmtpClose();
  if($mail->IsError()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
  } else {
    echo "Message sent!"; 
            
  };
}
//----- End Code for generate pdf
  
}
else
{
  echo 'Record not found for PDF.';
}

?>