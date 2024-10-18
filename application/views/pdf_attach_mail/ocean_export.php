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
  
  $content = ''; 

  $content .= '<!DOCTYPE html>
<html>
  <head>
    <style>
      body {
        border: 1px solid #dee2e6;
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
      }

      .header_view {
        background-color: #5961b3;
        padding: 10px 40px;
      }
    </style>
  </head>
  <body>';


  if($template == 2){
 
   $content .= '<table>
      <tr class="header_view"  >
      
      
  
        
        
        
        <td style="border: none; text-align: left; color: white">'.display("Company Name").' : '.$company_content[0]['company_name'].'<br>'.display("Email").': '.$company_content[0]['email'].'<br>'.display("Mobile").': '.$company_content[0]['mobile'].'<br>'.display("Address").': '.$company_content[0]['address'].'</td>
      
              <td style="border: none; text-align: center; color: white">'. $head[0]['header'].'</td>

            <td style="border: none">
           <img src="'.$this->session->userdata('image_email').'" width="100px" />
        </td>
        
        </tr>
        
        
        
        
        
    </table>
    <br> <br>

    <table>
    <tr>                                               
    <td style="border: none; font-weight: normal; line-height: 20px;"><b>'.display("Shipper").'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;: &nbsp;'.$supplier_info[0]['supplier_name'].'</span></td>

     <td style="border: none; font-weight: normal; line-height: 20px;"><b> '.display("Booking No").'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="margin-left: 20px;">&nbsp;: &nbsp;'.$ocean[0]['booking_no'].'</span></td>
</tr>


<tr>
 <td style="border: none; font-weight: normal; line-height: 20px;"><b> '.display("Invoive Date").'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="margin-left: 31px;">&nbsp;: &nbsp;'.$ocean[0]['invoice_date'].'</span></td>

 <td style="border: none; font-weight: normal; line-height: 20px;"><b> '.display("Customer / Consignee").'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;: &nbsp;'.$customername[0]['customer_name'].'</span></td>

</tr>

<tr>
<td style="border: none; font-weight: normal; line-height: 20px;"><b> '.display("Notify Party").'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="margin-left: 30px;">&nbsp;: '.$ocean[0]['notify_party'].'</span></td>

<td style="border: none; font-weight: normal; line-height: 20px;"><b> '.display("Vessel").'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;: &nbsp;'.$ocean[0]['vessel'].'</span></td>

</tr>


<tr>
 <td style="border: none; font-weight: normal; line-height: 20px;"><b> '.display("Voyage No").'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;: &nbsp;'.$ocean[0]['voyage_no'].'</span></td>

 <td style="border: none; font-weight: normal; line-height: 20px;"><b> '.display("Port Of Loading").'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;: &nbsp;'.$ocean[0]['port_of_loading'].'</span></td>

</tr>


<tr>
  <td style="border: none; font-weight: normal; line-height: 20px;"><b> '.display("Port of Discharge").'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;: &nbsp;'.$ocean[0]['port_of_discharge'].'</span></td>

  <td style="border: none; font-weight: normal; line-height: 20px;"><b> '.display("Place of Delivery").'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;: &nbsp;'.$ocean[0]['place_of_delivery'].'</span></td>

</tr>



<tr>
<td style="border: none; font-weight: normal; line-height: 20px;"><b> '.display("Customs Broker").'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;: &nbsp;'.$ocean[0]['customs_broker_name'].'</span></td>

<td style="border: none; font-weight: normal; line-height: 20px;"><b> '.display("MBL NO").'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;: &nbsp;'.$ocean[0]['mbl_no'].'</span></td>

</tr>






<tr>
<td style="border: none; font-weight: normal; line-height: 20px;"><b> '.display("HBL NO").'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;: &nbsp;'.$ocean[0]['hbl_no'].'</span></td>

<td style="border: none; font-weight: normal; line-height: 20px;"><b> '.display("OBL NO").'</b>&nbsp;&nbsp;&nbsp;&nbsp;<span style="margin-left: 117px;">&nbsp;: &nbsp;'.$ocean[0]['obl_no'].'</span></td>

</tr>


<tr>
<td style="border: none; font-weight: normal; line-height: 20px;"><b> '.display("AMS NO").'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;: &nbsp;'.$ocean[0]['ams_no'].'</span></td>

<td style="border: none; font-weight: normal; line-height: 20px;"><b> '.display("ISF NO").'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;: &nbsp;'.$ocean[0]['isf_no'].'</span></td>

</tr>





<tr>
<td style="border: none; font-weight: normal; line-height: 20px;"><b> '.display("Container No").'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;: &nbsp;'.$ocean[0]['container_no'].'</span></td>

 <td style="border: none; font-weight: normal; line-height: 20px;"><b> '.display("Seal No").'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;: &nbsp;'.$ocean[0]['seal_no'].'</span></td>

</tr>



<tr>
<td style="border: none; font-weight: normal; line-height: 20px;"><b> '.display("Freight Forwarder").'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;: &nbsp;'.$ocean[0]['freight_forwarder'].'</span></td>

<th style="border: none; font-weight: normal; line-height: 20px;"><b> '.display("Estimate time of arrival").'</b>&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;: &nbsp;'.$ocean[0]['eta'].'</span></th>

</tr>


<tr>
 <td style="border: none; font-weight: normal; line-height: 20px;"><b> Estimate time of<br> depature</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="margin-left: 63px;">&nbsp;: &nbsp;'.$ocean[0]['etd'].'</span></td>

 <td style="border: none; font-weight: normal; line-height: 20px;"><b> '.display("Particulars").'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="margin-left: 20px;">&nbsp;: &nbsp;'.$ocean[0]['particular'].'</span></td>

</tr>
    </table>';


  }elseif($template == 1){
$content .= '<table>
      <tr class="header_view"  >
      
      
  
        
        
        
        <td style="border: none; text-align: left; color: white">'.display("Company Name").' : '.$company_content[0]['company_name'].'<br>'.display("Email").': '.$company_content[0]['email'].'<br>'.display("Mobile").': '.$company_content[0]['mobile'].'<br>'.display("Address").': '.$company_content[0]['address'].'</td>
      
              <td style="border: none; text-align: center; color: white">'. $head[0]['header'].'</td>

            <td style="border: none">
           <img src="'.$this->session->userdata('image_email').'" width="100px" />
        </td>
        
        </tr>
        
        
        
        
        
    </table>
    <br> <br>

    <table>
    <tr>                                               
    <td style="border: none; font-weight: normal; line-height: 20px;"><b>'.display("Shipper").'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;: &nbsp;'.$supplier_info[0]['supplier_name'].'</span></td>

     <td style="border: none; font-weight: normal; line-height: 20px;"><b> '.display("Booking No").'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="margin-left: 20px;">&nbsp;: &nbsp;'.$ocean[0]['booking_no'].'</span></td>
</tr>


<tr>
 <td style="border: none; font-weight: normal; line-height: 20px;"><b> '.display("Invoive Date").'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="margin-left: 31px;">&nbsp;: &nbsp;'.$ocean[0]['invoice_date'].'</span></td>

 <td style="border: none; font-weight: normal; line-height: 20px;"><b> '.display("Customer / Consignee").'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;: &nbsp;'.$customername[0]['customer_name'].'</span></td>

</tr>

<tr>
<td style="border: none; font-weight: normal; line-height: 20px;"><b> '.display("Notify Party").'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="margin-left: 30px;">&nbsp;: '.$ocean[0]['notify_party'].'</span></td>

<td style="border: none; font-weight: normal; line-height: 20px;"><b> '.display("Vessel").'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;: &nbsp;'.$ocean[0]['vessel'].'</span></td>

</tr>


<tr>
 <td style="border: none; font-weight: normal; line-height: 20px;"><b> '.display("Voyage No").'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;: &nbsp;'.$ocean[0]['voyage_no'].'</span></td>

 <td style="border: none; font-weight: normal; line-height: 20px;"><b> '.display("Port Of Loading").'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;: &nbsp;'.$ocean[0]['port_of_loading'].'</span></td>

</tr>


<tr>
  <td style="border: none; font-weight: normal; line-height: 20px;"><b> '.display("Port of Discharge").'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;: &nbsp;'.$ocean[0]['port_of_discharge'].'</span></td>

  <td style="border: none; font-weight: normal; line-height: 20px;"><b> '.display("Place of Delivery").'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;: &nbsp;'.$ocean[0]['place_of_delivery'].'</span></td>

</tr>



<tr>
<td style="border: none; font-weight: normal; line-height: 20px;"><b> '.display("Customs Broker").'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;: &nbsp;'.$ocean[0]['customs_broker_name'].'</span></td>

<td style="border: none; font-weight: normal; line-height: 20px;"><b> '.display("MBL NO").'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;: &nbsp;'.$ocean[0]['mbl_no'].'</span></td>

</tr>






<tr>
<td style="border: none; font-weight: normal; line-height: 20px;"><b> '.display("HBL NO").'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;: &nbsp;'.$ocean[0]['hbl_no'].'</span></td>

<td style="border: none; font-weight: normal; line-height: 20px;"><b> '.display("OBL NO").'</b>&nbsp;&nbsp;&nbsp;&nbsp;<span style="margin-left: 117px;">&nbsp;: &nbsp;'.$ocean[0]['obl_no'].'</span></td>

</tr>


<tr>
<td style="border: none; font-weight: normal; line-height: 20px;"><b> '.display("AMS NO").'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;: &nbsp;'.$ocean[0]['ams_no'].'</span></td>

<td style="border: none; font-weight: normal; line-height: 20px;"><b> '.display("ISF NO").'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;: &nbsp;'.$ocean[0]['isf_no'].'</span></td>

</tr>





<tr>
<td style="border: none; font-weight: normal; line-height: 20px;"><b> '.display("Container No").'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;: &nbsp;'.$ocean[0]['container_no'].'</span></td>

 <td style="border: none; font-weight: normal; line-height: 20px;"><b> '.display("Seal No").'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;: &nbsp;'.$ocean[0]['seal_no'].'</span></td>

</tr>



<tr>
<td style="border: none; font-weight: normal; line-height: 20px;"><b> '.display("Freight Forwarder").'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;: &nbsp;'.$ocean[0]['freight_forwarder'].'</span></td>

<th style="border: none; font-weight: normal; line-height: 20px;"><b> '.display("Estimate time of arrival").'</b>&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;: &nbsp;'.$ocean[0]['eta'].'</span></th>

</tr>


<tr>
 <td style="border: none; font-weight: normal; line-height: 20px;"><b> Estimate time of<br> depature</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="margin-left: 63px;">&nbsp;: &nbsp;'.$ocean[0]['etd'].'</span></td>

 <td style="border: none; font-weight: normal; line-height: 20px;"><b> '.display("Particulars").'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="margin-left: 20px;">&nbsp;: &nbsp;'.$ocean[0]['particular'].'</span></td>

</tr>
    </table>';



  }elseif($template == 3){

    $content .= '<table>
      <tr class="header_view"  >
      
      
  
        
        
        
        <td style="border: none; text-align: left; color: white">'.display("Company Name").' : '.$company_content[0]['company_name'].'<br>'.display("Email").': '.$company_content[0]['email'].'<br>'.display("Mobile").': '.$company_content[0]['mobile'].'<br>'.display("Address").': '.$company_content[0]['address'].'</td>
      
              <td style="border: none; text-align: center; color: white">'. $head[0]['header'].'</td>

            <td style="border: none">
           <img src="'.$this->session->userdata('image_email').'" width="100px" />
        </td>
        
        </tr>
        
        
        
        
        
    </table>
    <br> <br>

    <table>
    <tr>                                               
    <td style="border: none; font-weight: normal; line-height: 20px;"><b>'.display("Shipper").'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;: &nbsp;'.$supplier_info[0]['supplier_name'].'</span></td>

     <td style="border: none; font-weight: normal; line-height: 20px;"><b> '.display("Booking No").'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="margin-left: 20px;">&nbsp;: &nbsp;'.$ocean[0]['booking_no'].'</span></td>
</tr>


<tr>
 <td style="border: none; font-weight: normal; line-height: 20px;"><b> '.display("Invoive Date").'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="margin-left: 31px;">&nbsp;: &nbsp;'.$ocean[0]['invoice_date'].'</span></td>

 <td style="border: none; font-weight: normal; line-height: 20px;"><b> '.display("Customer / Consignee").'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;: &nbsp;'.$customername[0]['customer_name'].'</span></td>

</tr>

<tr>
<td style="border: none; font-weight: normal; line-height: 20px;"><b> '.display("Notify Party").'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="margin-left: 30px;">&nbsp;: '.$ocean[0]['notify_party'].'</span></td>

<td style="border: none; font-weight: normal; line-height: 20px;"><b> '.display("Vessel").'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;: &nbsp;'.$ocean[0]['vessel'].'</span></td>

</tr>


<tr>
 <td style="border: none; font-weight: normal; line-height: 20px;"><b> '.display("Voyage No").'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;: &nbsp;'.$ocean[0]['voyage_no'].'</span></td>

 <td style="border: none; font-weight: normal; line-height: 20px;"><b> '.display("Port Of Loading").'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;: &nbsp;'.$ocean[0]['port_of_loading'].'</span></td>

</tr>


<tr>
  <td style="border: none; font-weight: normal; line-height: 20px;"><b> '.display("Port of Discharge").'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;: &nbsp;'.$ocean[0]['port_of_discharge'].'</span></td>

  <td style="border: none; font-weight: normal; line-height: 20px;"><b> '.display("Place of Delivery").'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;: &nbsp;'.$ocean[0]['place_of_delivery'].'</span></td>

</tr>



<tr>
<td style="border: none; font-weight: normal; line-height: 20px;"><b> '.display("Customs Broker").'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;: &nbsp;'.$ocean[0]['customs_broker_name'].'</span></td>

<td style="border: none; font-weight: normal; line-height: 20px;"><b> '.display("MBL NO").'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;: &nbsp;'.$ocean[0]['mbl_no'].'</span></td>

</tr>






<tr>
<td style="border: none; font-weight: normal; line-height: 20px;"><b> '.display("HBL NO").'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;: &nbsp;'.$ocean[0]['hbl_no'].'</span></td>

<td style="border: none; font-weight: normal; line-height: 20px;"><b> '.display("OBL NO").'</b>&nbsp;&nbsp;&nbsp;&nbsp;<span style="margin-left: 117px;">&nbsp;: &nbsp;'.$ocean[0]['obl_no'].'</span></td>

</tr>


<tr>
<td style="border: none; font-weight: normal; line-height: 20px;"><b> '.display("AMS NO").'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;: &nbsp;'.$ocean[0]['ams_no'].'</span></td>

<td style="border: none; font-weight: normal; line-height: 20px;"><b> '.display("ISF NO").'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;: &nbsp;'.$ocean[0]['isf_no'].'</span></td>

</tr>





<tr>
<td style="border: none; font-weight: normal; line-height: 20px;"><b> '.display("Container No").'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;: &nbsp;'.$ocean[0]['container_no'].'</span></td>

 <td style="border: none; font-weight: normal; line-height: 20px;"><b> '.display("Seal No").'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;: &nbsp;'.$ocean[0]['seal_no'].'</span></td>

</tr>



<tr>
<td style="border: none; font-weight: normal; line-height: 20px;"><b> '.display("Freight Forwarder").'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;: &nbsp;'.$ocean[0]['freight_forwarder'].'</span></td>

<th style="border: none; font-weight: normal; line-height: 20px;"><b> '.display("Estimate time of arrival").'</b>&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;: &nbsp;'.$ocean[0]['eta'].'</span></th>

</tr>


<tr>
 <td style="border: none; font-weight: normal; line-height: 20px;"><b> Estimate time of<br> depature</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="margin-left: 63px;">&nbsp;: &nbsp;'.$ocean[0]['etd'].'</span></td>

 <td style="border: none; font-weight: normal; line-height: 20px;"><b> '.display("Particulars").'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="margin-left: 20px;">&nbsp;: &nbsp;'.$ocean[0]['particular'].'</span></td>

</tr>
    </table>';

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
   foreach ($ocean_attach as $key => $value) {
       
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