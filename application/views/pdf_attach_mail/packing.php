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
      <tr class="header_view">
        <td style="border: none">
           <img src="../../assets/'.$company_info[0]['logo'].'" width="100px" />
        </td>
        <td style="border: none; color: white">'.$company_info[0]['company_name'].'</td>
        <td style="border: none; text-align: right; color: white">'.$company_info[0]['address'].'</td>
      </tr>
    </table>
    <br />

    <table>
      <tr>
      <td style="border: none; font-weight: normal; line-height: 20px;"><b>Packing List No</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;: &nbsp;'.$invoice[0]['invoice_no'].'</span></td>

      <td style="border: none; font-weight: normal; line-height: 20px;"><b>Invoice Date</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;: &nbsp;'.$invoice[0]['invoice_date'].'</span></td>
      
      </tr>

      <tr>
      <td style="border: none; font-weight: normal; line-height: 20px;"><b>Gross Weight</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="margin-left: 2px;">&nbsp;: &nbsp;'.$invoice[0]['gross_weight'].'</span></td>
      
       <td style="border: none; font-weight: normal; line-height: 20px;"><b>Container No</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="margin-left: 2px;">&nbsp;: &nbsp;'.$invoice[0]['container_no'].'</span></td>
      </tr>  
      
    </table>
    

    <br><br>
    <table>
      <tr class="table_view">
        <th style="color: #fff; text-align: center">Product</th>
        <th style="color: #fff; text-align: center">Description</th>
        <th style="color: #fff; text-align: center">Thickness</th>
       
      </tr>

      <tr>
        <td style="text-align: center;">'.$product_info[0]['product_name'].'</td>
        <td style="text-align: center;">'.$invoice[0]['description'].'</td>
        <td style="text-align: center;">'.$invoice[0]['thickness'].'</td>
      
      </tr>
     
    </table>

     <br><br>
    <table>
      <tr  class="table_view">
        <th rowspan="2" style="color:#fff; text-align: center;">Serial No</th>
        <th rowspan="2" style="color:#fff; text-align: center;">SLAB NO</th>
        <th colspan="2" style="color:#fff; text-align: center;">Net Measurement (Inches)</th>
        <th rowspan="2" style="color:#fff; text-align: center;">Area (Sq. Ft)</th>
      </tr>
      <tr class="table_view"> 
        <th style="color:#fff; text-align: center;">Width</th>
        <th style="color:#fff; text-align: center;">Height</th>
      </tr>';
      if ($product_info) {
        $count=1;
        for($i=0;$i<sizeof($product_info);$i++){
        $content .='<tr><td style="text-align: center;">'.$count.'</td>
        <td style="text-align: center;">'.$product_info[0]['slab_no'].'</td>
        <td style="text-align: center;">'.$product_info[0]['width'].'</td>
        <td style="text-align: center;">'.$product_info[0]['height'].'</td>
        <td style="text-align: center;">'.$product_info[0]['area'].'</td></tr>';
      $count++;
      }
    }  
   $content .='
      <tr>
        <td colspan="4" style="text-align: right">Total:</td>
        <td class="data_view">'.$invoice[0]['grand_total_amount'].'</td>
      </tr>
      </table>
     <br>

     <h4 style="margin-left: 10px;">Remarks/Conditions</h4>'.$invoice[0]['remarks'].'<br><br>';


 }elseif($template == 1){

       $content .= '<table>
      <tr class="header_view">
        <td style="border: none">
           <img src="../../assets/'.$company_info[0]['logo'].'" width="100px" />
        </td>
        <td style="border: none; color: white">'.$company_info[0]['company_name'].'</td>
        <td style="border: none; text-align: right; color: white">'.$company_info[0]['address'].'</td>
      </tr>
    </table>
    <br />

    <table>
      <tr>
      <td style="border: none; font-weight: normal; line-height: 20px;"><b>Packing List No</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;: &nbsp;'.$invoice[0]['invoice_no'].'</span></td>

      <td style="border: none; font-weight: normal; line-height: 20px;"><b>Invoice Date</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;: &nbsp;'.$invoice[0]['invoice_date'].'</span></td>
      
      </tr>

      <tr>
      <td style="border: none; font-weight: normal; line-height: 20px;"><b>Gross Weight</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="margin-left: 2px;">&nbsp;: &nbsp;'.$invoice[0]['gross_weight'].'</span></td>
      
       <td style="border: none; font-weight: normal; line-height: 20px;"><b>Container No</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="margin-left: 2px;">&nbsp;: &nbsp;'.$invoice[0]['container_no'].'</span></td>
      </tr>  
      
    </table>
    

    <br><br>
    <table>
      <tr class="table_view">
        <th style="color: #fff; text-align: center">Product</th>
        <th style="color: #fff; text-align: center">Description</th>
        <th style="color: #fff; text-align: center">Thickness</th>
       
      </tr>

      <tr>
        <td style="text-align: center;">'.$product_info[0]['product_name'].'</td>
        <td style="text-align: center;">'.$invoice[0]['description'].'</td>
        <td style="text-align: center;">'.$invoice[0]['thickness'].'</td>
      
      </tr>
     
    </table>

     <br><br>
    <table>
      <tr  class="table_view">
        <th rowspan="2" style="color:#fff; text-align: center;">Serial No</th>
        <th rowspan="2" style="color:#fff; text-align: center;">SLAB NO</th>
        <th colspan="2" style="color:#fff; text-align: center;">Net Measurement (Inches)</th>
        <th rowspan="2" style="color:#fff; text-align: center;">Area (Sq. Ft)</th>
      </tr>
      <tr class="table_view"> 
        <th style="color:#fff; text-align: center;">Width</th>
        <th style="color:#fff; text-align: center;">Height</th>
      </tr>';
      if ($product_info) {
        $count=1;
        for($i=0;$i<sizeof($product_info);$i++){
        $content .='<tr><td style="text-align: center;">'.$count.'</td>
        <td style="text-align: center;">'.$product_info[0]['slab_no'].'</td>
        <td style="text-align: center;">'.$product_info[0]['width'].'</td>
        <td style="text-align: center;">'.$product_info[0]['height'].'</td>
        <td style="text-align: center;">'.$product_info[0]['area'].'</td></tr>';
      $count++;
      }
    }  
   $content .='
      <tr>
        <td colspan="4" style="text-align: right">Total:</td>
        <td class="data_view">'.$invoice[0]['grand_total_amount'].'</td>
      </tr>
      </table>
     <br>

     <h4 style="margin-left: 10px;">Remarks/Conditions</h4>'.$invoice[0]['remarks'].'<br><br>';



 }elseif($template == 3){

      $content .= '<table>
      <tr class="header_view">
        <td style="border: none">
           <img src="../../assets/'.$company_info[0]['logo'].'" width="100px" />
        </td>
        <td style="border: none; color: white">'.$company_info[0]['company_name'].'</td>
        <td style="border: none; text-align: right; color: white">'.$company_info[0]['address'].'</td>
      </tr>
    </table>
    <br />

    <table>
      <tr>
      <td style="border: none; font-weight: normal; line-height: 20px;"><b>Packing List No</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;: &nbsp;'.$invoice[0]['invoice_no'].'</span></td>

      <td style="border: none; font-weight: normal; line-height: 20px;"><b>Invoice Date</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;: &nbsp;'.$invoice[0]['invoice_date'].'</span></td>
      
      </tr>

      <tr>
      <td style="border: none; font-weight: normal; line-height: 20px;"><b>Gross Weight</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="margin-left: 2px;">&nbsp;: &nbsp;'.$invoice[0]['gross_weight'].'</span></td>
      
       <td style="border: none; font-weight: normal; line-height: 20px;"><b>Container No</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="margin-left: 2px;">&nbsp;: &nbsp;'.$invoice[0]['container_no'].'</span></td>
      </tr>  
      
    </table>
    

    <br><br>
    <table>
      <tr class="table_view">
        <th style="color: #fff; text-align: center">Product</th>
        <th style="color: #fff; text-align: center">Description</th>
        <th style="color: #fff; text-align: center">Thickness</th>
       
      </tr>

      <tr>
        <td style="text-align: center;">'.$product_info[0]['product_name'].'</td>
        <td style="text-align: center;">'.$invoice[0]['description'].'</td>
        <td style="text-align: center;">'.$invoice[0]['thickness'].'</td>
      
      </tr>
     
    </table>

     <br><br>
    <table>
      <tr  class="table_view">
        <th rowspan="2" style="color:#fff; text-align: center;">Serial No</th>
        <th rowspan="2" style="color:#fff; text-align: center;">SLAB NO</th>
        <th colspan="2" style="color:#fff; text-align: center;">Net Measurement (Inches)</th>
        <th rowspan="2" style="color:#fff; text-align: center;">Area (Sq. Ft)</th>
      </tr>
      <tr class="table_view"> 
        <th style="color:#fff; text-align: center;">Width</th>
        <th style="color:#fff; text-align: center;">Height</th>
      </tr>';
      if ($product_info) {
        $count=1;
        for($i=0;$i<sizeof($product_info);$i++){
        $content .='<tr><td style="text-align: center;">'.$count.'</td>
        <td style="text-align: center;">'.$product_info[0]['slab_no'].'</td>
        <td style="text-align: center;">'.$product_info[0]['width'].'</td>
        <td style="text-align: center;">'.$product_info[0]['height'].'</td>
        <td style="text-align: center;">'.$product_info[0]['area'].'</td></tr>';
      $count++;
      }
    }  
   $content .='
      <tr>
        <td colspan="4" style="text-align: right">Total:</td>
        <td class="data_view">'.$invoice[0]['grand_total_amount'].'</td>
      </tr>
      </table>
     <br>

     <h4 style="margin-left: 10px;">Remarks/Conditions</h4>'.$invoice[0]['remarks'].'<br><br>';

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