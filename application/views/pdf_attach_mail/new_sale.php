
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script type="text/javascript">
  $(function(){

    $('.normalinvoice').each(function(){

    //   $(".normalinvoice").each(function(i,v){
    //   if($(this).find("tbody > tr").html().trim().length === 0){
    //     $(this).hide()
    //   }
    // });

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
      $('.normalinvoice > tbody > tr').find('.total_price').each(function() {
        var v=$(this).html();
        sum += parseFloat(v);
      }
                                                                           );
      $(this).closest('table').find('.b_total').val(sum.toFixed(3));
      var sum_net=0;
      $('.normalinvoice > tbody > tr').find('.net_sq_ft').each(function() {
        var v=$(this).val();
        sum_net += parseFloat(v);
      }
                                                                         );
      $(this).closest('table').find('.overall_net').val(sum_net.toFixed(3));
    });
  });

      
    });
</script>

<?php                

error_reporting(1);
include_once('tcpdf_6_2_13/tcpdf.php'); 
$base_url=$this->session->userdata('base');
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
  
 
//  $myArray = explode('(',$invoice_info[0]['total_tax']); 
//  // print_r($myArray); die();
//  $tax_amt=$myArray[0];
//  $tax_des=$myArray[1];


  $myArray = explode('(',$invoice_informtn[0]['total_tax']) ; 
 // print_r($myArray); die();
 $tax_amt=$myArray[0];
 $tax_des=$myArray[1];



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
    padding: 20px;
 
    font-size:12px;
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



  if($template==2){ 


     $content .= ' <table>
      <tr class="header_view">
        <td style="border: none">
         <img src="'.$this->session->userdata('image_email').'" width="100px" />
        </td>
        <td style="border: none; text-align: center; color: white">'. $head[0]['header'].'</td>
        <td style="border: none; text-align: right; color: white">'.display("Company Name").': '.$company_content[0]['company_name'].'<br>'.display("Email").': '.$company_content[0]['email'].'<br>'.display("Mobile").': '.$company_content[0]['mobile'].'<br>'.display("Address").': '.$company_content[0]['address'].'</td>
      
      </tr>
    </table>
    <br> <br>

    <table>
    <tr>
    <td style="border: none; font-size: 14px;"> <b>'.display("Invoice Number").':</b>:&nbsp;<span style="font-weight: normal;">'.$invoice[0]['commercial_invoice_number'].'</span></td>
<td style="border: none; font-size: 14px;"><b>'.display("Customer Name").':</b>&nbsp;<span style="font-weight: normal;">'.$customer_info[0]['customer_name'].'</span></td>
</tr>



<tr>
  <td style="border: none; font-size: 14px;"><b>'.display("Sales Invoice Date").':</b>&nbsp;<span style="font-weight: normal;">'.$invoice[0]['date'].'</span></td>
  <td style="border: none; font-size: 14px;"><b>'.display("Shipping Address").':</b>&nbsp;<span style="font-weight: normal;">'.$invoice[0]['shipping_address'].'</span></td>
</tr>

<tr>
  <td style="border: none; font-size: 14px;"><b>'.display("Payment due date").':</b>&nbsp;<span style="font-weight: normal;">'.$invoice[0]['payment_due_date'].'</span></td>
  <td style="border: none; font-size: 14px;"><b>'.display("Payment Terms").':</b>&nbsp;<span style="font-weight: normal;">'.$invoice[0]['payment_terms'].'</span></td>
  <td style="border: none; font-size: 14px;"><b>'."Account Category".':</b>&nbsp;<span style="font-weight: normal;">'.$invoice[0]['account_category'].'</span></td>
  <td style="border: none; font-size: 14px;"><b>'."Account Subcategory".':</b>&nbsp;<span style="font-weight: normal;">'.$invoice[0]['sub_category'].'</span></td>
  <td style="border: none; font-size: 14px;"><b>'."Account Subcategory".':</b>&nbsp;<span style="font-weight: normal;">'.$invoice[0]['account_subcat'].'</span></td>
</tr>
<tr>
<td style="border: none; font-size: 14px;"><b>'.display("Container Number").':</b>&nbsp;<span style="font-weight: normal;">'.$invoice[0]['container_no'].'</span></td>
<td style="border: none; font-size: 14px;"><b>'.display("B/L No").':</b>&nbsp;<span style="font-weight: normal;">'.$invoice[0]['bl_no'].'</span></td>
</tr>
<tr>
<td style="border: none; font-size: 14px;"><b>'.display("Estimated Time of Arrival").':</b>&nbsp;<span style="font-weight: normal;">'.$invoice[0]['eta'].'</span></td>
<td style="border: none; font-size: 14px;"><b>'.display("Estimated Time of Departure").':</b>&nbsp;<span style="font-weight: normal;">'.$invoice[0]['etd'].'</span></td>
</tr>
<tr>
<td style="border: none; font-size: 14px;"><b>'.display("Payment Type").':</b>&nbsp;<span style="font-weight: normal;">'.$invoice[0]['payment_type'].'</span></td>
<td style="border: none; font-size: 14px;"><b>'.display("Billing address").':</b>&nbsp;<span style="font-weight: normal;">'.$invoice[0]['billing_address'].'</span></td>
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
        <td>'.$n.'</td>
        <td>'.$inv['product_name'].'</td>
          <td>'.$inv['description'].'</td>
          <td>'.$inv['thickness'].'</td>
          <td>'.$inv['bundle_no'].'</td>
          <td class="data_view">'.$n.'</td>
          <td>'.$inv['n_width'].'|'.$inv['n_height'].'</td>
          <td>'.$currency[0]['currency'].''.$inv['sales_price_sqft'].'</td>
          <td>'.$currency[0]['currency'].''.$inv['sales_slab_price'].'</td>
          <td class="total_price">'.$inv['total_price'].'</td>
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




$content .='<table>

<tr>
<td colspan="7" style="text-align: right; width:250px;  border: none;  ">'.display("Overall TOTAL").' :</td>
<td  style="text-align: left;  width:260px;  border: none;  ">'.$currency[0]['currency'].''.$invoice[0]['total_amount'].'</td>
</tr> 

<tr>
<td colspan="7" style="text-align: right;   width:250px;     border: none;  ">'.display("Overall Net Sq.Ft ").' :</td>
<td  style="text-align: left; width:260px;   border: none;  ">'.$invoice[0]['total_net'].'</td>
</tr>


<tr>
<td colspan="7" style="text-align: right;  width:250px;     border: none; ">'.display("Tax").' :</td>
<td  style="text-align: left ;  width:260px;  border: none;  "> '.$currency[0]['currency'].' '.$invoice[0]['total_tax'].'</td>
</tr>



<tr>
<td colspan="7" style="text-align: right; width:250px;      border: none; ">'.display("GRAND TOTAL ").' :</td>
<td  style="text-align: left;   width:260px;  border: none;  ">'.$currency[0]['currency'].''.$invoice[0]['gtotal'].'</td>
</tr>



<tr>
<td colspan="7" style="text-align: right;   width:250px;       border: none; ">'.display("GRAND TOTAL").''.display("Preferred Currency").' :</td>
<td  style="text-align: left; width:260px;  border: none;  ">'.$customer_info[0]['currency_type'].''.$invoice[0]['gtotal_preferred_currency'].'</td>
</tr>

<tr>
<td colspan="7" style="text-align: right;   width:250px;     border: none; ">'.display("Amount Paid ").':</td>
<td  style="text-align: left;   width:360px;   border: none;  "><span style="width:400px;">'.$customer_info[0]['currency_type'].'</span>'.$invoice[0]['paid_amount'].'</td>
</tr>

<tr>
<td colspan="7" style="text-align: right;  width:250px;    border: none;   ">'.display("Balance Amount").':</td>
<td  style="text-align: left;    border: none;  ">'.$customer_info[0]['currency_type'].''.$invoice[0]['due_amount'].'</td>
</tr>

</table>
<br><h3 class="heading_view">'.display("Account Details/Additional Information").' :<span style="font-weight: normal;">'.$invoice[0]['ac_details'].'</span></h3>
<h3 class="heading_view">'.display("Remarks/Conditions").' :<span style="font-weight: normal;">'.$invoice[0]['remark'].'</span></h3>'; 

}
elseif($template==1) 
{


  $content .= ' <table>
  <tr class="header_view">


    <td style="border: none; text-align: left; color: white">'.display("Company Name").': '.$company_content[0]['company_name'].'<br>'.display("Email").': '.$company_content[0]['email'].'<br>'.display("Mobile").': '.$company_content[0]['mobile'].'<br>'.display("Address").': '.$company_content[0]['address'].'</td>
  
    <td style="border: none; text-align: center; color: white">'. $head[0]['header'].'</td>

    <td style="border: none">
    <img src="'.$this->session->userdata('image_email').'" width="100px" />
    </td>
  </tr>
</table>







<br> <br>
<table>
<tr>
<td style="border: none; font-size: 14px;"> <b>'.display("Invoice Number").':</b>:&nbsp;<span style="font-weight: normal;">'.$invoice[0]['commercial_invoice_number'].'</span></td>
<td style="border: none; font-size: 14px;"><b>'.display("Customer Name").':</b>&nbsp;<span style="font-weight: normal;">'.$customer_info[0]['customer_name'].'</span></td>
</tr>



<tr>
  <td style="border: none; font-size: 14px;"><b>'.display("Sales Invoice Date").':</b>&nbsp;<span style="font-weight: normal;">'.$invoice[0]['date'].'</span></td>
  <td style="border: none; font-size: 14px;"><b>'.display("Shipping Address").':</b>&nbsp;<span style="font-weight: normal;">'.$invoice[0]['shipping_address'].'</span></td>
</tr>

<tr>
  <td style="border: none; font-size: 14px;"><b>'.display("Payment due date").':</b>&nbsp;<span style="font-weight: normal;">'.$invoice[0]['payment_due_date'].'</span></td>
  <td style="border: none; font-size: 14px;"><b>'.display("Payment Terms").':</b>&nbsp;<span style="font-weight: normal;">'.$invoice[0]['payment_terms'].'</span></td>
  <td style="border: none; font-size: 14px;"><b>'."Account Category".':</b>&nbsp;<span style="font-weight: normal;">'.$invoice[0]['account_category'].'</span></td>
  <td style="border: none; font-size: 14px;"><b>'."Account Subcategory".':</b>&nbsp;<span style="font-weight: normal;">'.$invoice[0]['sub_category'].'</span></td>
  <td style="border: none; font-size: 14px;"><b>'."Account Subcategory".':</b>&nbsp;<span style="font-weight: normal;">'.$invoice[0]['account_subcat'].'</span></td>
</tr>
<tr>
<td style="border: none; font-size: 14px;"><b>'.display("Container Number").':</b>&nbsp;<span style="font-weight: normal;">'.$invoice[0]['container_no'].'</span></td>
<td style="border: none; font-size: 14px;"><b>'.display("B/L No").':</b>&nbsp;<span style="font-weight: normal;">'.$invoice[0]['bl_no'].'</span></td>
</tr>
<tr>
<td style="border: none; font-size: 14px;"><b>'.display("Estimated Time of Arrival").':</b>&nbsp;<span style="font-weight: normal;">'.$invoice[0]['eta'].'</span></td>
<td style="border: none; font-size: 14px;"><b>'.display("Estimated Time of Departure").':</b>&nbsp;<span style="font-weight: normal;">'.$invoice[0]['etd'].'</span></td>
</tr>
<tr>
<td style="border: none; font-size: 14px;"><b>'.display("Payment Type").':</b>&nbsp;<span style="font-weight: normal;">'.$invoice[0]['payment_type'].'</span></td>
<td style="border: none; font-size: 14px;"><b>'.display("Billing address").':</b>&nbsp;<span style="font-weight: normal;">'.$invoice[0]['billing_address'].'</span></td>
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
    <td>'.$n.'</td>
    <td>'.$inv['product_name'].'</td>
      <td>'.$inv['description'].'</td>
      <td>'.$inv['thickness'].'</td>
      <td>'.$inv['bundle_no'].'</td>
      <td class="data_view">'.$n.'</td>
      <td>'.$inv['n_width'].'|'.$inv['n_height'].'</td>
      <td>'.$currency[0]['currency'].''.$inv['sales_price_sqft'].'</td>
      <td>'.$currency[0]['currency'].''.$inv['sales_slab_price'].'</td>
      <td class="total_price">'.$inv['total_price'].'</td>
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




$content .='<table>

<tr>
<td colspan="7" style="text-align: right; width:250px;  border: none;  ">'.display("Overall TOTAL").' :</td>
<td  style="text-align: left;  width:260px;  border: none;  ">'.$currency[0]['currency'].''.$invoice[0]['total_amount'].'</td>
</tr> 

<tr>
<td colspan="7" style="text-align: right;   width:250px;     border: none;  ">'.display("Overall Net Sq.Ft ").' :</td>
<td  style="text-align: left; width:260px;   border: none;  ">'.$invoice[0]['total_net'].'</td>
</tr>


<tr>
<td colspan="7" style="text-align: right;  width:250px;     border: none; ">'.display("Tax").' :</td>
<td  style="text-align: left ;  width:260px;  border: none;  "> '.$currency[0]['currency'].' '.$invoice[0]['total_tax'].'</td>
</tr>



<tr>
<td colspan="7" style="text-align: right; width:250px;      border: none; ">'.display("GRAND TOTAL ").' :</td>
<td  style="text-align: left;   width:260px;  border: none;  ">'.$currency[0]['currency'].''.$invoice[0]['gtotal'].'</td>
</tr>



<tr>
<td colspan="7" style="text-align: right;   width:250px;       border: none; ">'.display("GRAND TOTAL").''.display("Preferred Currency").' :</td>
<td  style="text-align: left; width:260px;  border: none;  ">'.$customer_info[0]['currency_type'].''.$invoice[0]['gtotal_preferred_currency'].'</td>
</tr>

<tr>
<td colspan="7" style="text-align: right;   width:250px;     border: none; ">'.display("Amount Paid ").':</td>
<td  style="text-align: left;   width:360px;   border: none;  "><span style="width:400px;">'.$customer_info[0]['currency_type'].'</span>'.$invoice[0]['paid_amount'].'</td>
</tr>

<tr>
<td colspan="7" style="text-align: right;  width:250px;    border: none;   ">'.display("Balance Amount").':</td>
<td  style="text-align: left;    border: none;  ">'.$customer_info[0]['currency_type'].''.$invoice[0]['due_amount'].'</td>
</tr>

</table>
<br><h3 class="heading_view">'.display("Account Details/Additional Information").' :<span style="font-weight: normal;">'.$invoice[0]['ac_details'].'</span></h3>
<h3 class="heading_view">'.display("Remarks/Conditions").' :<span style="font-weight: normal;">'.$invoice[0]['remark'].'</span></h3>'; 

}
elseif($template==3)
{



  $content .= ' <table>
  <tr class="header_view">

  <td style="border: none; text-align: center; color: white">'. $head[0]['header'].'</td>

    <td style="border: none">
         <img src="'.$this->session->userdata('image_email').'" width="100px" />
             
    </td>
    <td style="border: none; text-align: right; color: white">'.display("Company Name").': '.$company_content[0]['company_name'].'<br>'.display("Email").': '.$company_content[0]['email'].'<br>'.display("Mobile").': '.$company_content[0]['mobile'].'<br>'.display("Address").': '.$company_content[0]['address'].'</td>
  
  </tr>
</table>







<br> <br>
<table>
<tr>
<td style="border: none; font-size: 14px;"> <b>'.display("Invoice Number").':</b>:&nbsp;<span style="font-weight: normal;">'.$invoice[0]['commercial_invoice_number'].'</span></td>
<td style="border: none; font-size: 14px;"><b>'.display("Customer Name").':</b>&nbsp;<span style="font-weight: normal;">'.$customer_info[0]['customer_name'].'</span></td>
</tr>



<tr>
  <td style="border: none; font-size: 14px;"><b>'.display("Sales Invoice Date").':</b>&nbsp;<span style="font-weight: normal;">'.$invoice[0]['date'].'</span></td>
  <td style="border: none; font-size: 14px;"><b>'.display("Shipping Address").':</b>&nbsp;<span style="font-weight: normal;">'.$invoice[0]['shipping_address'].'</span></td>
</tr>

<tr>
  <td style="border: none; font-size: 14px;"><b>'.display("Payment due date").':</b>&nbsp;<span style="font-weight: normal;">'.$invoice[0]['payment_due_date'].'</span></td>
  <td style="border: none; font-size: 14px;"><b>'.display("Payment Terms").':</b>&nbsp;<span style="font-weight: normal;">'.$invoice[0]['payment_terms'].'</span></td>
  <td style="border: none; font-size: 14px;"><b>'."Account Category".':</b>&nbsp;<span style="font-weight: normal;">'.$invoice[0]['account_category'].'</span></td>
  <td style="border: none; font-size: 14px;"><b>'."Account Subcategory".':</b>&nbsp;<span style="font-weight: normal;">'.$invoice[0]['sub_category'].'</span></td>
  <td style="border: none; font-size: 14px;"><b>'."Account Subcategory".':</b>&nbsp;<span style="font-weight: normal;">'.$invoice[0]['account_subcat'].'</span></td>
</tr>
<tr>
<td style="border: none; font-size: 14px;"><b>'.display("Container Number").':</b>&nbsp;<span style="font-weight: normal;">'.$invoice[0]['container_no'].'</span></td>
<td style="border: none; font-size: 14px;"><b>'.display("B/L No").':</b>&nbsp;<span style="font-weight: normal;">'.$invoice[0]['bl_no'].'</span></td>
</tr>
<tr>
<td style="border: none; font-size: 14px;"><b>'.display("Estimated Time of Arrival").':</b>&nbsp;<span style="font-weight: normal;">'.$invoice[0]['eta'].'</span></td>
<td style="border: none; font-size: 14px;"><b>'.display("Estimated Time of Departure").':</b>&nbsp;<span style="font-weight: normal;">'.$invoice[0]['etd'].'</span></td>
</tr>
<tr>
<td style="border: none; font-size: 14px;"><b>'.display("Payment Type").':</b>&nbsp;<span style="font-weight: normal;">'.$invoice[0]['payment_type'].'</span></td>
<td style="border: none; font-size: 14px;"><b>'.display("Billing address").':</b>&nbsp;<span style="font-weight: normal;">'.$invoice[0]['billing_address'].'</span></td>
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
    <td>'.$n.'</td>
    <td>'.$inv['product_name'].'</td>
      <td>'.$inv['description'].'</td>
      <td>'.$inv['thickness'].'</td>
      <td>'.$inv['bundle_no'].'</td>
      <td class="data_view">'.$n.'</td>
      <td>'.$inv['n_width'].'|'.$inv['n_height'].'</td>
      <td>'.$currency[0]['currency'].''.$inv['sales_price_sqft'].'</td>
      <td>'.$currency[0]['currency'].''.$inv['sales_slab_price'].'</td>
      <td class="total_price">'.$inv['total_price'].'</td>
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




$content .='<table>

<tr>
<td colspan="7" style="text-align: right; width:250px;  border: none;  ">'.display("Overall TOTAL").' :</td>
<td  style="text-align: left;  width:260px;  border: none;  ">'.$currency[0]['currency'].''.$invoice[0]['total_amount'].'</td>
</tr> 

<tr>
<td colspan="7" style="text-align: right;   width:250px;     border: none;  ">'.display("Overall Net Sq.Ft ").' :</td>
<td  style="text-align: left; width:260px;   border: none;  ">'.$invoice[0]['total_net'].'</td>
</tr>


<tr>
<td colspan="7" style="text-align: right;  width:250px;     border: none; ">'.display("Tax").' :</td>
<td  style="text-align: left ;  width:260px;  border: none;  "> '.$currency[0]['currency'].' '.$invoice[0]['total_tax'].'</td>
</tr>



<tr>
<td colspan="7" style="text-align: right; width:250px;      border: none; ">'.display("GRAND TOTAL ").' :</td>
<td  style="text-align: left;   width:260px;  border: none;  ">'.$currency[0]['currency'].''.$invoice[0]['gtotal'].'</td>
</tr>



<tr>
<td colspan="7" style="text-align: right;   width:250px;       border: none; ">'.display("GRAND TOTAL").''.display("Preferred Currency").' :</td>
<td  style="text-align: left; width:260px;  border: none;  ">'.$customer_info[0]['currency_type'].''.$invoice[0]['gtotal_preferred_currency'].'</td>
</tr>

<tr>
<td colspan="7" style="text-align: right;   width:250px;     border: none; ">'.display("Amount Paid ").':</td>
<td  style="text-align: left;   width:360px;   border: none;  "><span style="width:400px;">'.$customer_info[0]['currency_type'].'</span>'.$invoice[0]['paid_amount'].'</td>
</tr>

<tr>
<td colspan="7" style="text-align: right;  width:250px;    border: none;   ">'.display("Balance Amount").':</td>
<td  style="text-align: left;    border: none;  ">'.$customer_info[0]['currency_type'].''.$invoice[0]['due_amount'].'</td>
</tr>

</table>
<br><h3 class="heading_view">'.display("Account Details/Additional Information").' :<span style="font-weight: normal;">'.$invoice[0]['ac_details'].'</span></h3>
<h3 class="heading_view">'.display("Remarks/Conditions").' :<span style="font-weight: normal;">'.$invoice[0]['remark'].'</span></h3>'; 
}













$content .= '</body></html>';    
$content;


// echo $content;
// die();


$pdf->writeHTML($content);

// $file_location =  base_url()."Pdf/"; //add your full path of your server
//$file_location = "/opt/lampp/htdocs/examples/generate_pdf/uploads/"; //for local xampp server

$file_location = "";

$datetime=date('dmY_hms');
$file_name = $invoiceid."_".$datetime.".pdf";
//echo $file_location.$file_name;die();
ob_end_clean();


if(1==1)
{

$pdf->Output($file_location.$file_name, 'F',777); // F means upload PDF file on some folder
$files_ar = array();
   foreach ($attach as $key => $value) {
            $files_ar[]= $value['image_dir'];
        }    
        $file = $files_ar;

include 'mail.php';
}
else 
{
$pdf->Output($file_location.$file_name, 'F'); // F means upload PDF file on some folder
//echo "Email send successfully!!";

 include_once('PHPMailer/class.phpmailer.php');  
 require ('PHPMailer/PHPMailerAutoload.php');

 $body='';
 $body .="<html>
 <head>
 <style type='text/css'> 
 body {
 font-family: Calibri;
 font-size:1px;
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
 // echo "Mailer Error: " . $mail->ErrorInfo;
    echo "<script>$('#myModal1').modal('show');</script>";
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


<div class="modal fade" id="myModal1" role="dialog" >
   <div class="modal-dialog">
   
     <!-- Modal content-->
     <div class="modal-content" style="margin-top: 190px;">
       <div class="modal-header" style="">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title"><?php echo display('New Sale') ?> </h4>
       </div>
       <div class="modal-body" id="bodyModal1" style="text-align:center;font-weight:bold;">
         
       <?php echo display('Mail Send Successfully') ?>
    
       </div>
       <div class="modal-footer">
         
       </div>
     </div>
     
   </div>
 </div>