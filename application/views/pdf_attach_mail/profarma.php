
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){

//  $(".normalinvoice").each(function(i,v){
//    if($(this).find("tbody").html().trim().length === 0){
//        $(this).hide()
//    }
// })
      $('.normalinvoice').each(function(){
       
var tid=$(this).attr('id');
 const indexLast = tid.lastIndexOf('_');
var idt = tid.slice(indexLast + 1);
var count=$('#normalinvoice_'+idt  +  '> tbody').find('tr').length;

//   if (count <= 2){
//     var removeTab = document.getElementById('#normalinvoice_'+idt);

// var parentEl = removeTab.parentElement;

// parentEl.removeChild(removeTab);
//   //  $('#normalinvoice_'+idt).remove();
//   }
  var sum=0;
 $('#normalinvoice_'+idt  +  '> tbody > tr').find('.total_price').each(function() {
var v=$(this).html();
  sum += parseFloat(v);
});
 $(this).closest('table').find('#Total_'+idt).val(sum.toFixed(3));
  var sum_net=0;
 $('#normalinvoice_'+idt  +  '> tbody > tr').find('.net_sq_ft').each(function() {
var v=$(this).html();
  sum_net += parseFloat(v);
});
 $(this).closest('table').find('#overall_net_'+idt).val(sum_net.toFixed(3));
    });
});
</script>


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

 $myArray = explode('(',$customer_info[0]['tax_details']); 
 // print_r($myArray); die();
 $tax_amt=$myArray[0];
 $tax_des=$myArray[1];
 $tax_des=str_replace(")","%)", $tax_des);
  
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
  

//  print_r($color);

 if($template == 2) {

     $content .= ' <table>
      <tr class="header_view"  >
        <td style="border: none">
        <img src="'.$this->session->userdata('image_email').'" width="100px" />
        </td>
        <td style="border: none; text-align: center; color: white">'. $head[0]['header'].'</td>
        <td style="border: none; text-align: right; color: white">Company Name: '.$company_content[0]['company_name'].'<br>Email: '.$company_content[0]['email'].'<br>Mobile: '.$company_content[0]['mobile'].'<br>Address: '.$company_content[0]['address'].'</td>
      
      </tr>
    </table>
    <br> <br>

    <table>
      <tr>
        <td style="border: none; font-weight: normal; line-height: 20px;"><b>Date</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;: &nbsp;'.$invoice[0]['purchase_date'].'</span></td>
         <td style="border: none; font-weight: normal; line-height: 20px;"><b>Buyer / Customer</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp; : &nbsp;'.$invoice[0]['purchase_date'].'</span></td>
      </tr>

      <tr>
      <td style="border: none; font-weight: normal; line-height: 20px;"><b>Invoice No</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp; : &nbsp;'.$invoice[0]['purchase_id'].'</span></td>

      <td style="border: none; font-weight: normal; line-height: 20px;"><b>Place of Receipt</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp; : &nbsp;'.$invoice[0]['receipt'].'</span></td>
      </tr>
      

      <tr>
      <td style="border: none; font-weight: normal; line-height: 20px;"><b>Pre Carriage By</b>&nbsp;&nbsp;<span>&nbsp; : &nbsp;'.$invoice[0]['pre_carriage'].'</span></td>

         <td style="border: none; font-weight: normal; line-height: 20px;"><b>Country of <br> Final Destination</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp; : &nbsp;'.$invoice[0]['country_destination'].'</span></td>
      </tr>

      <tr>
      <td style="border: none; font-weight: normal; line-height: 20px;"><b>Port of Loading</b>&nbsp;&nbsp;<span>&nbsp; : &nbsp;'.$invoice[0]['loading'].'</span></td>


       <td style="border: none; font-weight: normal;line-height: 20px;"><b>Port of Discharge</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp; : &nbsp;'.$invoice[0]['country_goods'].'</span></td>
    
      </tr>

      <tr>
      <td style="border: none; font-weight: normal;"><b>Terms of <br>Payment</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp; : &nbsp;'.$invoice[0]['terms_payment'].'</span></td>

      <td style="border: none; font-weight: normal; line-height: 20px;"><b>Description of Goods</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp; : &nbsp;'.$invoice[0]['description_goods'].'</span></td>

      </tr>
      <tr>
      <td style="border: none; font-weight: normal;"><b>Country of <br> Final Origin<br> of Goods</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp; : &nbsp;'.$invoice[0]['country_goods'].'</span></td>

     
      </tr>
    </table>

    <br> <br>';
   
   for($m=1;$m<count($product_info);$m++){
    foreach($product_info as $inv){
      $a = substr($inv['tableid'], 0, 1);
      if($a==$m){
     
$content .='<table class="normalinvoice" id="normalinvoice_'.$m.'">
      <tr class="header_view">
        <th style="color: #fff">S.No</th>
        <th style="color: #fff">Product Name</th>
        <th style="color: #fff">Description</th>
        <th style="color: #fff">Thick<br/>ness</th>
        <th style="color: #fff">Bundle No</th>
        <th style="color: #fff">Slab No</th>
        <th style="color: #fff">Net<br/> Measure<br/>Width|Height</th>
        <th style="color: #fff">Net <br/>Sq. Ft</th>
        <th style="color: #fff">Sales<br/>Price per Sq. Ft</th>
        <th style="color: #fff">Sales Slab Price</th>
        <th style="color: #fff">Total</th>
      </tr> ';
      break;
      }
      }
  
$n=1;
foreach($product_info as $inv){
  // echo "<pre>";
  // print_r($inv);
  //  echo "</pre>"; 
  //echo $inv['tableid']."<br/>";
      $a = substr($inv['tableid'], 0, 1);
       if($a==$m){
     
      //for($i=0;$i<sizeof($product_info);$i++){
    $content .='<tr>
      <td class="data_view">'.$n.'</td>
        <td class="data_view">'.$inv['product_name'].'</td>
        <td class="data_view">'.$inv['description'].'</td>
        <td class="data_view">'.$inv['thickness'].'</td>
        <td class="data_view">'.$inv['bundle_no'].'</td>
        <td class="data_view">'.$n.'</td>
        <td class="data_view">'.$inv['net_width'].'|'.$inv['net_height'].'</td>
      
        <td class="data_view  net_sq_ft">'.$inv['net_sq_ft'].'</td>
        <td class="data_view">'.$currency[0]['currency'].''.$inv['sales_amt_sq_ft'].'</td>
        <td class="data_view">'.$currency[0]['currency'].''.$inv['sales_slab_amt'].'</td>
        <td class="data_view total_price">'.$inv['total_amount'].'.00</td>
      </tr></tbody>
      ';

     $n++;
    }
  }
  $content .='<tr>
  
</tr>

</table>
<br/>';
}




  $content .='<table  >


  <tr>
  <td colspan="7" style="text-align: right; width:250px;  border: none;  ">Overall TOTAL :</td>
  <td  style="text-align: left;  width:260px;  border: none;  ">'.$currency[0]['currency'].''.$inv['total_amount'].'</td>
  </tr>  


<tr>
<td colspan="7" style="text-align: right;   width:250px;     border: none;  ">Overall Net Sq.Ft :</td>
<td  style="text-align: left; width:260px;   border: none;  ">'.$inv['net_sq_ft'].'</td>
</tr>

<tr>
<td colspan="7" style="text-align: right;  width:250px;     border: none; ">Tax :</td>
<td  style="text-align: left ;  width:260px;  border: none;  "> '.$currency[0]['currency'].' '.$tax_amt.' ('.$tax_des.')</td>
</tr>


<tr>
   <td colspan="7" style="text-align: right; width:250px;      border: none; ">GRAND TOTAL :</td>
   <td  style="text-align: left;   width:260px;  border: none;  ">'.$currency[0]['currency'].''.$inv['gtotal'].'</td>
</tr>


<tr>
   <td colspan="7" style="text-align: right;   width:250px;       border: none; ">GRAND TOTAL (Preferred Currency) :</td>
   <td  style="text-align: left; width:260px;  border: none;  ">'.$curn_info_default.''.$inv['customer_gtotal'].'</td>
</tr>

<tr>
   <td colspan="7" style="text-align: right;   width:250px;     border: none; ">Amount Paid :</td>
   <td  style="text-align: left;   width:260px;   border: none;  ">'.$curn_info_default.''.$inv['amt_paid'].'</td>
</tr>

<tr>
   <td colspan="7" style="text-align: right;  width:250px;    border: none;   ">Balance Amount :</td>
   <td  style="text-align: left;  width:260px;  border: none;  ">'.$curn_info_default.''.$inv['bal_amt'].'</td>


</tr>

</table>
  <br><h3 class="heading_view">Account Details/Additional Information : <span style="font-weight: normal;">'.$invoice[0]['ac_details'].'</span></h3>
  <h3 class="heading_view">Remarks/Conditions : <span style="font-weight: normal;">'.$invoice[0]['remarks'].'</span></h3>'; 

}
elseif($template==1)
{


  $content .= ' <table>
  <tr class="header_view" >

  <td style="border: none; text-align: left; color: white">Company Name: '.$company_content[0]['company_name'].'<br>Email: '.$company_content[0]['email'].'<br>Mobile: '.$company_content[0]['mobile'].'<br>Address: '.$company_content[0]['address'].'</td>

   
    <td style="border: none; text-align: center; color: white">'. $head[0]['header'].'</td>
   <td style="border: none">
             <img src="'.$this->session->userdata('image_email').'" width="100px" />

    </td>
  </tr>
</table>
<br> <br>

<table>
  <tr>
    <td style="border: none; font-weight: normal; line-height: 20px;"><b>Date</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;: &nbsp;'.$invoice[0]['purchase_date'].'</span></td>
     <td style="border: none; font-weight: normal; line-height: 20px;"><b>Buyer / Customer</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp; : &nbsp;'.$invoice[0]['purchase_date'].'</span></td>
  </tr>

  <tr>
  <td style="border: none; font-weight: normal; line-height: 20px;"><b>Invoice No</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp; : &nbsp;'.$invoice[0]['purchase_id'].'</span></td>

  <td style="border: none; font-weight: normal; line-height: 20px;"><b>Place of Receipt</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp; : &nbsp;'.$invoice[0]['receipt'].'</span></td>
  </tr>
  

  <tr>
  <td style="border: none; font-weight: normal; line-height: 20px;"><b>Pre Carriage By</b>&nbsp;&nbsp;<span>&nbsp; : &nbsp;'.$invoice[0]['pre_carriage'].'</span></td>

     <td style="border: none; font-weight: normal; line-height: 20px;"><b>Country of <br> Final Destination</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp; : &nbsp;'.$invoice[0]['country_destination'].'</span></td>
  </tr>

  <tr>
  <td style="border: none; font-weight: normal; line-height: 20px;"><b>Port of Loading</b>&nbsp;&nbsp;<span>&nbsp; : &nbsp;'.$invoice[0]['loading'].'</span></td>


   <td style="border: none; font-weight: normal;line-height: 20px;"><b>Port of Discharge</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp; : &nbsp;'.$invoice[0]['country_goods'].'</span></td>

  </tr>

  <tr>
  <td style="border: none; font-weight: normal;"><b>Terms of <br>Payment</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp; : &nbsp;'.$invoice[0]['terms_payment'].'</span></td>

  <td style="border: none; font-weight: normal; line-height: 20px;"><b>Description of Goods</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp; : &nbsp;'.$invoice[0]['description_goods'].'</span></td>

  </tr>
  <tr>
  <td style="border: none; font-weight: normal;"><b>Country of <br> Final Origin<br> of Goods</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp; : &nbsp;'.$invoice[0]['country_goods'].'</span></td>

 
  </tr>
</table>

<br> <br>';
for($m=1;$m<count($product_info);$m++){
foreach($product_info as $inv){
  $a = substr($inv['tableid'], 0, 1);
  if($a==$m){
 
$content .='<table class="normalinvoice" id="normalinvoice_'.$m.'">
  <tr class="header_view" >
    <th style="color: #fff">S.No</th>
    <th style="color: #fff">Product Name</th>
    <th style="color: #fff">Description</th>
    <th style="color: #fff">Thick<br/>ness</th>
    <th style="color: #fff">Bundle No</th>
    <th style="color: #fff">Slab No</th>
    <th style="color: #fff">Net<br/> Measure<br/>Width|Height</th>
    <th style="color: #fff">Net <br/>Sq. Ft</th>
    <th style="color: #fff">Sales<br/>Price per Sq. Ft</th>
    <th style="color: #fff">Sales Slab Price</th>
    <th style="color: #fff">Total</th>
  </tr> ';
  break;
  }
  }

$n=1;
foreach($product_info as $inv){
// echo "<pre>";
// print_r($inv);
//  echo "</pre>"; 
//echo $inv['tableid']."<br/>";
  $a = substr($inv['tableid'], 0, 1);
   if($a==$m){
 
  //for($i=0;$i<sizeof($product_info);$i++){
$content .='<tr>
  <td class="data_view">'.$n.'</td>
    <td class="data_view">'.$inv['product_name'].'</td>
    <td class="data_view">'.$inv['description'].'</td>
    <td class="data_view">'.$inv['thickness'].'</td>
    <td class="data_view">'.$inv['bundle_no'].'</td>
    <td class="data_view">'.$n.'</td>
    <td class="data_view">'.$inv['net_width'].'|'.$inv['net_height'].'</td>
  
    <td class="data_view  net_sq_ft">'.$inv['net_sq_ft'].'</td>
    <td class="data_view">'.$currency[0]['currency'].''.$inv['sales_amt_sq_ft'].'</td>
    <td class="data_view">'.$currency[0]['currency'].''.$inv['sales_slab_amt'].'</td>
    <td class="data_view total_price">'.$inv['total_amount'].'.00</td>
  </tr></tbody>
  ';

 $n++;
}
}
$content .='<tr>

</tr>

</table>
<br/>';
}




$content .='<table  >


<tr>
<td colspan="7" style="text-align: right; width:250px;  border: none;  ">Overall TOTAL :</td>
<td  style="text-align: left;  width:260px;  border: none;  ">'.$currency[0]['currency'].''.$inv['total_amount'].'</td>
</tr>  


<tr>
<td colspan="7" style="text-align: right;   width:250px;     border: none;  ">Overall Net Sq.Ft :</td>
<td  style="text-align: left; width:260px;   border: none;  ">'.$inv['net_sq_ft'].'</td>
</tr>

<tr>
<td colspan="7" style="text-align: right;  width:250px;     border: none; ">Tax :</td>
<td  style="text-align: left ;  width:260px;  border: none;  "> '.$currency[0]['currency'].' '.$tax_amt.' ('.$tax_des.')</td>
</tr>


<tr>
<td colspan="7" style="text-align: right; width:250px;      border: none; ">GRAND TOTAL :</td>
<td  style="text-align: left;   width:260px;  border: none;  ">'.$currency[0]['currency'].''.$inv['gtotal'].'</td>
</tr>


<tr>
<td colspan="7" style="text-align: right;   width:250px;       border: none; ">GRAND TOTAL (Preferred Currency) :</td>
<td  style="text-align: left; width:260px;  border: none;  ">'.$curn_info_default.''.$inv['customer_gtotal'].'</td>
</tr>

<tr>
<td colspan="7" style="text-align: right;   width:250px;     border: none; ">Amount Paid :</td>
<td  style="text-align: left;   width:260px;   border: none;  ">'.$curn_info_default.''.$inv['amt_paid'].'</td>
</tr>

<tr>
<td colspan="7" style="text-align: right;  width:250px;    border: none;   ">Balance Amount :</td>
<td  style="text-align: left;  width:260px;  border: none;  ">'.$curn_info_default.''.$inv['bal_amt'].'</td>


</tr>

</table>
<br><h3 class="heading_view">Account Details/Additional Information : <span style="font-weight: normal;">'.$invoice[0]['ac_details'].'</span></h3>
<h3 class="heading_view">Remarks/Conditions : <span style="font-weight: normal;">'.$invoice[0]['remarks'].'</span></h3>'; 

}
elseif($template==3)
{

  $content .= ' <table>
  <tr class="header_view" >

  <td style="border: none; text-align: left; color: white">'. $head[0]['header'].'</td>

    <td style="border: none; text-align: left;">
        <img src="'.$this->session->userdata('image_email').'" width="100px" />
    </td>

    <td style="border: none; text-align: right; color: white">Company Name: '.$company_content[0]['company_name'].'<br>Email: '.$company_content[0]['email'].'<br>Mobile: '.$company_content[0]['mobile'].'<br>Address: '.$company_content[0]['address'].'</td>
  
  </tr>
</table>
<br> <br>

<table>
  <tr>
    <td style="border: none; font-weight: normal; line-height: 20px;"><b>Date</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;: &nbsp;'.$invoice[0]['purchase_date'].'</span></td>
     <td style="border: none; font-weight: normal; line-height: 20px;"><b>Buyer / Customer</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp; : &nbsp;'.$invoice[0]['purchase_date'].'</span></td>
  </tr>

  <tr>
  <td style="border: none; font-weight: normal; line-height: 20px;"><b>Invoice No</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp; : &nbsp;'.$invoice[0]['purchase_id'].'</span></td>

  <td style="border: none; font-weight: normal; line-height: 20px;"><b>Place of Receipt</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp; : &nbsp;'.$invoice[0]['receipt'].'</span></td>
  </tr>
  

  <tr>
  <td style="border: none; font-weight: normal; line-height: 20px;"><b>Pre Carriage By</b>&nbsp;&nbsp;<span>&nbsp; : &nbsp;'.$invoice[0]['pre_carriage'].'</span></td>

     <td style="border: none; font-weight: normal; line-height: 20px;"><b>Country of <br> Final Destination</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp; : &nbsp;'.$invoice[0]['country_destination'].'</span></td>
  </tr>

  <tr>
  <td style="border: none; font-weight: normal; line-height: 20px;"><b>Port of Loading</b>&nbsp;&nbsp;<span>&nbsp; : &nbsp;'.$invoice[0]['loading'].'</span></td>


   <td style="border: none; font-weight: normal;line-height: 20px;"><b>Port of Discharge</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp; : &nbsp;'.$invoice[0]['country_goods'].'</span></td>

  </tr>

  <tr>
  <td style="border: none; font-weight: normal;"><b>Terms of <br>Payment</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp; : &nbsp;'.$invoice[0]['terms_payment'].'</span></td>

  <td style="border: none; font-weight: normal; line-height: 20px;"><b>Description of Goods</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp; : &nbsp;'.$invoice[0]['description_goods'].'</span></td>

  </tr>
  <tr>
  <td style="border: none; font-weight: normal;"><b>Country of <br> Final Origin<br> of Goods</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp; : &nbsp;'.$invoice[0]['country_goods'].'</span></td>

 
  </tr>
</table>

<br> <br>';
for($m=1;$m<count($product_info);$m++){
foreach($product_info as $inv){
  $a = substr($inv['tableid'], 0, 1);
  if($a==$m){
 
$content .='<table class="normalinvoice" id="normalinvoice_'.$m.'">
  <tr class="header_view" >
    <th style="color: #fff">S.No</th>
    <th style="color: #fff">Product Name</th>
    <th style="color: #fff">Description</th>
    <th style="color: #fff">Thick<br/>ness</th>
    <th style="color: #fff">Bundle No</th>
    <th style="color: #fff">Slab No</th>
    <th style="color: #fff">Net<br/> Measure<br/>Width|Height</th>
    <th style="color: #fff">Net <br/>Sq. Ft</th>
    <th style="color: #fff">Sales<br/>Price per Sq. Ft</th>
    <th style="color: #fff">Sales Slab Price</th>
    <th style="color: #fff">Total</th>
  </tr> ';
  break;
  }
  }

$n=1;
foreach($product_info as $inv){
// echo "<pre>";
// print_r($inv);
//  echo "</pre>"; 
//echo $inv['tableid']."<br/>";
  $a = substr($inv['tableid'], 0, 1);
   if($a==$m){
 
  //for($i=0;$i<sizeof($product_info);$i++){
$content .='<tr>
  <td class="data_view">'.$n.'</td>
    <td class="data_view">'.$inv['product_name'].'</td>
    <td class="data_view">'.$inv['description'].'</td>
    <td class="data_view">'.$inv['thickness'].'</td>
    <td class="data_view">'.$inv['bundle_no'].'</td>
    <td class="data_view">'.$n.'</td>
    <td class="data_view">'.$inv['net_width'].'|'.$inv['net_height'].'</td>
  
    <td class="data_view  net_sq_ft">'.$inv['net_sq_ft'].'</td>
    <td class="data_view">'.$currency[0]['currency'].''.$inv['sales_amt_sq_ft'].'</td>
    <td class="data_view">'.$currency[0]['currency'].''.$inv['sales_slab_amt'].'</td>
    <td class="data_view total_price">'.$inv['total_amount'].'.00</td>
  </tr></tbody>
  ';

 $n++;
}
}
$content .='<tr>

</tr>

</table>
<br/>';
}




$content .='<table  >


<tr>
<td colspan="7" style="text-align: right; width:250px;  border: none;  ">Overall TOTAL :</td>
<td  style="text-align: left;  width:260px;  border: none;  ">'.$currency[0]['currency'].''.$inv['total_amount'].'</td>
</tr>  


<tr>
<td colspan="7" style="text-align: right;   width:250px;     border: none;  ">Overall Net Sq.Ft :</td>
<td  style="text-align: left; width:260px;   border: none;  ">'.$inv['net_sq_ft'].'</td>
</tr>

<tr>
<td colspan="7" style="text-align: right;  width:250px;     border: none; ">Tax :</td>
<td  style="text-align: left ;  width:260px;  border: none;  "> '.$currency[0]['currency'].' '.$tax_amt.' ('.$tax_des.')</td>
</tr>


<tr>
<td colspan="7" style="text-align: right; width:250px;      border: none; ">GRAND TOTAL :</td>
<td  style="text-align: left;   width:260px;  border: none;  ">'.$currency[0]['currency'].''.$inv['gtotal'].'</td>
</tr>


<tr>
<td colspan="7" style="text-align: right;   width:250px;       border: none; ">GRAND TOTAL (Preferred Currency) :</td>
<td  style="text-align: left; width:260px;  border: none;  ">'.$curn_info_default.''.$inv['customer_gtotal'].'</td>
</tr>

<tr>
<td colspan="7" style="text-align: right;   width:250px;     border: none; ">Amount Paid :</td>
<td  style="text-align: left;   width:260px;   border: none;  ">'.$curn_info_default.''.$inv['amt_paid'].'</td>
</tr>

<tr>
<td colspan="7" style="text-align: right;  width:250px;    border: none;   ">Balance Amount :</td>
<td  style="text-align: left;  width:260px;  border: none;  ">'.$curn_info_default.''.$inv['bal_amt'].'</td>


</tr>

</table>
<br><h3 class="heading_view">Account Details/Additional Information : <span style="font-weight: normal;">'.$invoice[0]['ac_details'].'</span></h3>
<h3 class="heading_view">Remarks/Conditions : <span style="font-weight: normal;">'.$invoice[0]['remarks'].'</span></h3>'; 
}



  $content .= '</body></html>'; 
 $content;




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
  $mail->AddAddress('Suryakala@amoriotech.com'); // To mail id
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