<?php
   $CI = & get_instance();
   $CI->load->model('Web_settings');
   $Web_settings = $CI->Web_settings->retrieve_setting_editdata();
   ?>
<style>
   input {
   border: none;
   }
   textarea:focus, input:focus{
   outline: none;
   }
   .text-right {
   text-align: left; 
   }
   th{
   font-size:10px;
   }
   #content {
   padding: 30px;
   }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
   <!-- <div class="header-title">
      <h1><?php echo display('Sale Invoice') ?></h1>
      <small><?php echo display('invoice_details') ?></small>
      <ol class="breadcrumb">
          <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
          <li><a href="#"><?php echo display('invoice') ?></a></li>
          <li class="active"><?php echo display('invoice_details') ?></li>
      </ol>
      </div> -->
</section>
<!-- Main content -->
<section class="content">
   <!-- Alert Message -->
   <?php
      $message = $this->session->userdata('message');
      if (isset($message)) {
          ?>
   <div class="alert alert-info alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <?php echo $message ?>                    
   </div>
   <?php
      $this->session->unset_userdata('message');
      }
      $error_message = $this->session->userdata('error_message');
      if (isset($error_message)) {
      ?>
   <div class="alert alert-danger alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <?php echo $error_message ?>                    
   </div>
   <?php
      $this->session->unset_userdata('error_message');
      }
      ?>
   <?php

      $myArray = explode('(',$tax_details); 
      $tax_amt=$myArray[0];
      $tax_des=$myArray[1];
 //$template=1;
      
      ?>
   <div id="head"></div>
   <div class="container" id="content">
   <?php
      if($template==3)
              {
              ?>
   <div class="brand-section"  style="background-color:<?php echo '#' .$color; ?>">
      <div class="row" >
         <?php if(empty($header)){ ?>
         <div class="col-sm-3 text-center" style="color:white;">
            <h3><?php echo "SALE INVOICE"; ?></h3>
         </div>
         <?php } 
            else
            {  ?>
                 <h3 style="text-align: center;color:black;" ><?php echo $header; ?></h3>

         <?php } ?>
         <div class="col-sm-4"><img src="<?php echo  base_url().$logo; ?>"        style='width:30%; float:right;'       /></div>
         <div class="col-sm-5" style="color:white;font-weight:bold;" id='company_info'>
            <b><?php echo display('Company name') ?> : </b><?php echo $company[0]['company_name']; ?><br>
            <b>  <?php echo display('Address ') ?>: </b><?php echo $company[0]['address']; ?><br>
            <b> <?php echo display('Email ') ?>: </b><?php echo $company[0]['email']; ?><br>
            <b>  <?php echo display('Contact ') ?>: </b><?php echo $company[0]['mobile']; ?><br>
         </div>
      </div>
   </div>
   <div class="body-section"   >
   <div class="row" style="padding:22px;">
      <div class="col-sm-6">
         <table id="one" >
            <tr>
               <td  class="key"><?php echo display('Invoice Number') ?></td>
               <td style="width:10px;">:</td>
               <td calss="value"><?php  echo $all_invoice[0]['commercial_invoice_number'] ; ?></td>
            </tr>
            <tr>
               <td  class="key"><?php echo display('Customer Name') ?></td>
               <td style="width:10px;">:</td>
               <td calss="value"><?php echo $customer_name; ?></td>
            </tr>
            <tr>
               <td class="key"><?php echo display('B/L No') ?></td>
               <td style="width:10px;">:</td>
               <td calss="value"><?php  echo $all_invoice[0]['bl_no'] ; ?></td>
            </tr>
            <tr>
               <td  class="key"><?php echo display('Payment Due date') ?></td>
               <td style="width:10px;">:</td>
               <td calss="value"><?php  echo $all_invoice[0]['payment_due_date'] ; ?></td>
            </tr>
            <tr>
               <td  class="key"><?php echo display('ETA') ?></td>
               <td style="width:10px;">:</td>
               <td calss="value"><?php echo $all_invoice[0]['eta'] ; ?></td>
            </tr>
            <tr>
               <td  class="key"><?php echo display('Port of Discharge') ?></td>
               <td style="width:7px;">:</td>
               <td calss="value" style="white-space: pre-wrap;"><?php  echo $invoice_detail[0]['Port_of_discharge']  ; ?> </td>
            </tr>
           <tr>
                <td  class="key">Account Category</td>
                <td style="width:7px;">:</td>
                <td calss="value" style="white-space: pre-wrap;"><?php  echo $all_invoice[0]['account_category'] ; ?> </td>
            </tr>
            <tr>
                <td  class="key">Account Sub Category</td>
                <td style="width:7px;">:</td>
                <td calss="value" style="white-space: pre-wrap;"><?php  echo $all_invoice[0]['sub_category'] ; ?> </td>
            </tr>
            <tr>
                <td  class="key">Account Sub Category</td>
                <td style="width:7px;">:</td>
                <td calss="value" style="white-space: pre-wrap;"><?php  echo $all_invoice[0]['account_subcat'] ; ?> </td>
            </tr>
         </table>
      </div>
      <div class="col-sm-6">
         <table id="two">
            <tr>
               <td  class="key"><?php echo display('Sales Invoice date') ?></td>
               <td style="width:10px;">:</td>
               <td calss="value"><?php  echo $all_invoice[0]['date'] ; ?></td>
            </tr>
            <tr>
               <td  class="key"><?php echo display('Container Number') ?></td>
               <td style="width:10px;">:</td>
               <td calss="value"><?php  echo $container_no ; ?></td>
            </tr>
            <tr>
               <td  class="key"><?php echo display('Payment Terms') ?></td>
               <td style="width:10px;">:</td>
               <td calss="value"><?php  echo $payment_terms; ?></td>
            </tr>
            <tr>
               <td  class="key"><?php echo display('ETD') ?></td>
               <td style="width:10px;">:</td>
               <td calss="value"><?php  echo $all_invoice[0]['etd'] ; ?></td>
            </tr>
            <tr>
               <td  class="key"><?php echo display('Payment Type') ?></td>
               <td style="width:10px;">:</td>
               <td calss="value"><?php  echo $paytype ; ?></td>
            </tr>
            <tr>
               <td  class="key"><?php echo display('Billing Address') ?></td>
               <td style="width:7px;">:</td>
               <td calss="value" style="white-space: pre-wrap;"> <?php  echo $all_invoice[0]['billing_address'] ; ?></td>
            </tr>
            <tr>
               <td  class="key"><?php echo display('Shipping Address') ?></td>
               <td style="width:7px;">:</td>
               <td calss="value" style="white-space: pre-wrap;"><?php  echo $all_invoice[0]['shipping_address'] ; ?> </td>
            </tr>
         </table>
      </div>
   </div>
   <div class="body-section">
   <div class="table-responsive">
   <div id="content">
      <?php 
         for($m=1;$m<count($all_invoice);$m++){ 
             ?>
      <table class="table table-bordered normalinvoice table-hover" id="normalinvoice_<?php  echo $m; ?>" >
         <thead style="background-color:<?php echo '#' .$color; ?>">
            <tr class="avoid-page-break">
               <th rowspan="1"  class="text-center text-white">S.No</th>
               <th rowspan="1" class="absorbing-column text-center text-white">Product Name</th>
               <th rowspan="1" class="text-center text-white">Description</th>
               <th rowspan="1" class="text-center text-white">Thick<br/>ness</th>
               <th rowspan="1" class="text-center text-white">Bundle No</th>
               <th rowspan="1" class="text-center text-white">Slab No</th>
               <th colspan="2" class="text-center text-white">Net<br/> Measure<br/>Width&#9474;Height</th>
               <th rowspan="1" class="text-center text-white">Net <br/>Sq. Ft</th>
               <th rowspan="1"  class="text-center text-white">Sales<br/>Price per Sq. Ft</th>
               <th rowspan="1"  class="text-center text-white">Sales Slab Price</th>
               <th rowspan="1"  class="text-center text-white">Total</th>
            </tr>
         </thead>
         <tbody id="addPurchaseItem_<?php echo $m;  ?>">
            <?php  $n=0; ?>
            <?php foreach($all_invoice as $inv){
               $a = substr($inv['tableid'], 0, 1);
               if($a==$m){ ?>
                      <tr  class="avoid-page-break">
               <td style="font-size: 9px;"><?php echo $n+1; ?></td>
               <td style="font-size: 9px;word-wrap: break-word;"><?php  echo $inv['product_name'];  ?></td>
               <td style="font-size: 9px;word-wrap: break-word;"><?php  echo $inv['description'];  ?></td>
               <td style="font-size: 9px;"><?php  echo $inv['thickness'];  ?></td>
               <td style="font-size: 9px;"><?php  echo $inv['bundle_no'];  ?></td>
               <td style="font-size: 9px;"><?php echo $n+1; ?></td>
               <td style="font-size: 9px;" class="net_width"><?php  echo $inv['n_width'];  ?></td>
               <td style="font-size: 9px;" class="net_height"><?php  echo $inv['n_height'];  ?></td>
               <td style="font-size:9px;" class="net_sq_ft"> <?php  echo $inv['net_sqft'];  ?></td>
               <td style="font-size: 9px;"><?php  echo $currency; ?><?php  echo $inv['sales_price_sqft'];  ?></td>
               <td style="font-size: 9px;"><?php  echo $currency; ?><?php  echo $inv['sales_slab_price'];  ?></td>
               <td style="text-align:start;" > <span style="font-size: 9px;"><?php  echo $currency; ?> <span class="total_price"><?php  echo  $inv['total_price'];  ?></span></span></td>
            </tr>
            <?php $n++;   } }  ?>
         </tbody>
         <tfoot>
            <tr class="avoid-page-break" >
               <td style="text-align:right;font-size: 9px;" colspan="8"><b><?php echo display('Net Sq.Ft') ?> :</b></td>
               <td >
                  <input type="text" id="overall_net_<?php echo $m; ?>" name="overall_net[]"  class="overall_net"  style="width: 60px;font-size: 9px;"   readonly="readonly"  /> 
               </td>
               <td style="text-align:right;font-size: 8px;" colspan="2"><b><?php echo display('TOTAL') ?> :</b></td>
               <td style="text-align:start;font-size: 8px;">
                  <input type="text" id="Total_<?php echo $m; ?>" name="total[]"   class="b_total"   style="padding-top: 6px;width: 50px;font-size: 9px;"    readonly="readonly"  />
               </td>
            </tr>
         </tfoot>
      </table>
      <?php   } ?>
      <table border="0" class="overall table table-hover">
         <tr class="avoid-page-break">
            <td  colspan="2" style="vertical-align:top;text-align:right;border:none;"><b><?php  echo display('Overall TOTAL');?> :</b></td>
            <td colspan="1" style="border:none;"><?php  echo $currency ; ?><?php echo $all_invoice[0]['total_amount']; ?> </td>
            <td style="text-align:right;border:none;" colspan="5"><b><?php echo  display('tax')." (".$tax_des;  ?></b>:</td>
            <td style='border:none;'><?php  echo $currency; ?><?php echo $tax_amt;  ?></td>
         </tr>
         <tr class="avoid-page-break">
            <td  colspan="2" style="vertical-align:top;text-align:right;border:none;"><b><?php  echo display('Overall Gross Sq.Ft');?> :</b></td>
            <td colspan="1" style="border:none;"><?php echo  $invoice_detail[0]['total_gross'];  ?></td>
            <td colspan="5" style="text-align:right;border:none;"><b><?php  echo display('GRAND TOTAL');?> :</b></td>
            <td colspan="1" style="border:none;"><?php  echo $currency ; ?><?php  echo $all_invoice[0]['gtotal'];    ?></td>
         </tr>
         <tr class="avoid-page-break">
            <td  colspan="2" style="vertical-align:top;text-align:right;border:none;"><b>Overall Net Sq.Ft :</b></td>
            <td colspan="1" style="border:none;"><?php echo  $invoice_detail[0]['total_net'];  ?>   </td>
            <td colspan="5" style="text-align:right;border:none;"><b><?php  echo display('GRAND TOTAL');?> :</b><br/><b><?php  echo display('Preferred Currency');?></b></td>
            <td colspan="1" style="border:none;">
               <table>
                  <tr class="avoid-page-break">
                     <td class="cus" name="cus" style="border:none;"></td>
                     <td style="border:none;text-align:left;"> <?php echo $customer_currency." ".$all_invoice[0]['gtotal_preferred_currency'] ;?></td>
                  </tr>
               </table>
            </td>
         </tr>
         <tr class="avoid-page-break">
            <td colspan="2"  style="vertical-align:top;text-align:right;border:none;"><b><?php  echo display('Overall Weight');?> :</b></td>
            <td colspan="1" style="border:none;"><?php echo  $invoice_detail[0]['total_weight'];  ?> </td>
            <td colspan="5" class="amt" style="text-align:right;border:none;"><b><?php  echo display('Amount Paid');?> :</b></td>
            <td style="border:none;">
               <table border="0">
                  <tr class="amt avoid-page-break" >
                     <td class="cus" name="cus" style="text-align:left;"></td>
                     <td>  <?php echo $customer_currency." ".$paid_amount ;?></td>
                  </tr>
               </table>
            </td>
         </tr>
         <tr class="avoid-page-break">
            <td colspan="2"  style="vertical-align:top;text-align:right;border:none;"></td>
            <td colspan="1" style="border:none;"></td>
            <td class="amt" colspan="5"  style="vertical-align:top;text-align:right;border:none;"><b><?php echo display('balance_ammount');  ?> :</b></td>
            <td class="amt" style="border:none;" colspan="1">
               <table border="0">
                  <tr class="amt avoid-page-break">
                     <td class="cus" name="cus" style="border:none;"></td>
                     <td style="border:none;">
                        <?php echo $supplier_currency." ".$purchase_detail[0]['due_amount'];  ?>     
                     <td style='border:none;'>
                        <?php echo $customer_currency." ".$due_amount;?>
                     </td>
                  </tr>
               </table>
      </table>
      <br>
      <th class="heading  avoid-page-break" style="font-size: 9px;"><b><?php echo display('Account Details/Additional Information') ?></b> : </th>
      </br><?php echo $all_invoice[0]['ac_details'];  ?>  <br/><br/>
      <th class="heading avoid-page-break" style="font-size: 9px;"><b><?php echo display('Remarks/Conditions') ?>:</b> </th>
      </br><?php  echo $all_invoice[0]['remark']; ?>  <br/><br/> 
   </div>
   <?php 
      }
      elseif($template==1)
      {
      ?>  
      
      <?php if(empty($header)){ ?>
         <div class="col-sm-4text-center" style="color:black;">
            <h3  style="text-align: center;" ><?php echo "SALE INVOICE"; ?></h3>
         </div>
         <?php } 
            else
            {  ?>
                    <h3 style="text-align: center;color:black;" ><?php echo $header; ?></h3>

         <?php } ?>


   <div class="brand-section" style="background-color:<?php echo '#' .$color; ?>;padding-left: 2px;">
      <div class="row" >
         <div class="col-sm-5" style="color:white;font-weight:bold;" id='company_info'>
            <b><?php echo display('Company name') ?> : </b><?php echo $company[0]['company_name']; ?><br>
            <b>  <?php echo display('Address ') ?>: </b><?php echo $company[0]['address']; ?><br>
            <b> <?php echo display('Email ') ?>: </b><?php echo $company[0]['email']; ?><br>
            <b>  <?php echo display('Contact ') ?>: </b><?php echo $company[0]['mobile']; ?><br>
         </div>

<div class="col-sm-5"></div>

         <div class="col-sm-2" style="margin-top:-50px;position: relative; text-align: center;">
            <img src="<?php echo base_url().$logo; ?>" style="width: 150%; position: absolute; top: 0; right: 0;" />
         </div>
      </div>
   </div>
   <div class="body-section">
   <div class="row" style="padding:22px;">
      <div class="col-sm-6">
         <table id="one" >
            <tr>
               <td  class="key"><?php echo display('Invoice Number') ?></td>
               <td style="width:10px;">:</td>
               <td calss="value"><?php  echo $all_invoice[0]['commercial_invoice_number'] ; ?></td>
            </tr>
            <tr>
               <td  class="key"><?php echo display('Customer Name') ?></td>
               <td style="width:10px;">:</td>
               <td calss="value"><?php echo $customer_name; ?></td>
            </tr>
            <tr>
               <td class="key"><?php echo display('B/L No') ?></td>
               <td style="width:10px;">:</td>
               <td calss="value"><?php  echo $all_invoice[0]['bl_no'] ; ?></td>
            </tr>
            <tr>
               <td  class="key"><?php echo display('Payment Due date') ?></td>
               <td style="width:10px;">:</td>
               <td calss="value"><?php  echo $all_invoice[0]['payment_due_date'] ; ?></td>
            </tr>
            <tr>
               <td  class="key"><?php echo display('ETA') ?></td>
               <td style="width:10px;">:</td>
               <td calss="value"><?php echo $all_invoice[0]['eta'] ; ?></td>
            </tr>
            <tr>
               <td  class="key"><?php echo display('Port of Discharge') ?></td>
               <td style="width:7px;">:</td>
               <td calss="value" style="white-space: pre-wrap;"><?php  echo $invoice_detail[0]['Port_of_discharge']  ; ?> </td>
            </tr>
            <tr>
                <td  class="key">Account Category</td>
                <td style="width:7px;">:</td>
                <td calss="value" style="white-space: pre-wrap;"><?php  echo $all_invoice[0]['account_category'] ; ?> </td>
            </tr>
            <tr>
                <td  class="key">Account Sub Category</td>
                <td style="width:7px;">:</td>
                <td calss="value" style="white-space: pre-wrap;"><?php  echo $all_invoice[0]['sub_category'] ; ?> </td>
            </tr>
            <tr>
                <td  class="key">Account Sub Category</td>
                <td style="width:7px;">:</td>
                <td calss="value" style="white-space: pre-wrap;"><?php  echo $all_invoice[0]['account_subcat'] ; ?> </td>
            </tr>
            
         </table>
      </div>
      <div class="col-sm-6">
         <table id="two">
            <tr>
               <td  class="key"><?php echo display('Sales Invoice date') ?></td>
               <td style="width:10px;">:</td>
               <td calss="value"><?php  echo $all_invoice[0]['date'] ; ?></td>
            </tr>
            <tr>
               <td  class="key"><?php echo display('Container Number') ?></td>
               <td style="width:10px;">:</td>
               <td calss="value"><?php  echo $container_no ; ?></td>
            </tr>
            <tr>
               <td  class="key"><?php echo display('Payment Terms') ?></td>
               <td style="width:10px;">:</td>
               <td calss="value"><?php  echo $payment_terms; ?></td>
            </tr>
            <tr>
               <td  class="key"><?php echo display('ETD') ?></td>
               <td style="width:10px;">:</td>
               <td calss="value"><?php  echo $all_invoice[0]['etd'] ; ?></td>
            </tr>
            <tr>
               <td  class="key"><?php echo display('Payment Type') ?></td>
               <td style="width:10px;">:</td>
               <td calss="value"><?php  echo $paytype ; ?></td>
            </tr>
            <tr>
               <td  class="key"><?php echo display('Billing Address') ?></td>
               <td style="width:7px;">:</td>
               <td calss="value" style="white-space: pre-wrap;"> <?php  echo $all_invoice[0]['billing_address'] ; ?></td>
            </tr>
            <tr>
               <td  class="key"><?php echo display('Shipping Address') ?></td>
               <td style="width:7px;">:</td>
               <td calss="value" style="white-space: pre-wrap;"><?php  echo $all_invoice[0]['shipping_address'] ; ?> </td>
            </tr>
         </table>
      </div>
   </div>
   <br>
   <div class="body-section">
   <div class="table-responsive">
   <div id="content">
      <?php 
         for($m=1;$m<count($all_invoice);$m++){ 
         ?>
      <table class="table table-bordered normalinvoice table-hover" id="normalinvoice_<?php  echo $m; ?>" >
         <thead style="background-color:<?php echo '#'.$color; ?>">
            <tr class="avoid-page-break">
               <th rowspan="1"  class="text-center text-white">S.No</th>
               <th rowspan="1" class="absorbing-column text-center text-white">Product Name</th>
               <th rowspan="1" class="text-center text-white">Description</th>
               <th rowspan="1" class="text-center text-white">Thick<br/>ness</th>
               <th rowspan="1" class="text-center text-white">Bundle No</th>
               <th rowspan="1" class="text-center text-white">Slab No</th>
               <th colspan="2" class="text-center text-white">Net<br/> Measure<br/>Width&#9474;Height</th>
               <th rowspan="1" class="text-center text-white">Net <br/>Sq. Ft</th>
               <th rowspan="1"  class="text-center text-white">Sales<br/>Price per Sq. Ft</th>
               <th rowspan="1"  class="text-center text-white">Sales Slab Price</th>
               <th rowspan="1"  class="text-left text-white">Total</th>
            </tr>
         </thead>
         <tbody id="addPurchaseItem_<?php echo $m;  ?>">
            <?php  $n=0; ?>
            <?php foreach($all_invoice as $inv){
               // $n=1;   
               
               $a = substr($inv['tableid'], 0, 1);
               if($a==$m){
                 
                     ?>
         <tr class="avoid-page-break">
               <td style="font-size: 9px;"><?php echo $n+1; ?></td>
               <td style="font-size: 9px;word-wrap: break-word;"><?php  echo $inv['product_name'];  ?></td>
               <td style="font-size: 9px;word-wrap: break-word;"><?php  echo $inv['description'];  ?></td>
               <td style="font-size: 9px;"><?php  echo $inv['thickness'];  ?></td>
               <td style="font-size: 9px;"><?php  echo $inv['bundle_no'];  ?></td>
               <td style="font-size: 9px;"><?php echo $n+1; ?></td>
               <td style="font-size: 9px;" class="net_width"><?php  echo $inv['n_width'];  ?></td>
               <td style="font-size: 9px;" class="net_height"><?php  echo $inv['n_height'];  ?></td>
               <td style="font-size:9px;" class="net_sq_ft"> <?php  echo $inv['net_sqft'];  ?></td>
               <td style="font-size: 9px;"><?php  echo $currency; ?><?php  echo $inv['sales_price_sqft'];  ?></td>
               <td style="font-size: 9px;"><?php  echo $currency; ?><?php  echo $inv['sales_slab_price'];  ?></td>
               <td style="text-align:start;" > <span style="font-size: 9px;"><?php  echo $currency; ?> <span class="total_price"><?php  echo  $inv['total_price'];  ?></span></span></td>
            </tr>
            <?php $n++;   } }  ?>
         </tbody>
         <tfoot>
            <tr class="avoid-page-break" >
               <td style="text-align:right;font-size: 9px;" colspan="8"><b><?php echo display('Net Sq.Ft') ?> :</b></td>
               <td >
                  <input type="text" id="overall_net_<?php echo $m; ?>" name="overall_net[]"  class="overall_net"  style="width: 60px;font-size: 9px;"   readonly="readonly"  /> 
               </td>
               <td style="text-align:right;font-size: 8px;" colspan="2"><b><?php echo display('TOTAL') ?> :</b></td>
               <td style="text-align:start;font-size: 8px;">
                  <input type="text" id="Total_<?php echo $m; ?>" name="total[]"   class="b_total"   style="padding-top: 6px;width: 50px;font-size: 9px;"    readonly="readonly"  />
               </td>
            </tr>
         </tfoot>
      </table>
      <?php   } ?>
      <table border="0" class="overall table table-hover">
         <tr class="avoid-page-break" >
            <td  colspan="2" style="vertical-align:top;text-align:right;border:none;"><b><?php  echo display('Overall TOTAL');?> :</b></td>
            <td colspan="1" style="border:none;"><?php  echo $currency ; ?><?php echo $all_invoice[0]['total_amount']; ?> </td>
            <td style="text-align:right;border:none;" colspan="5"><b><?php echo  display('tax')." (".$tax_des;  ?></b>:</td>
            <td style='border:none;'><?php  echo $currency; ?><?php echo $tax_amt;  ?></td>
         </tr>
         <tr class="avoid-page-break" >
            <td  colspan="2" style="vertical-align:top;text-align:right;border:none;"><b><?php  echo display('Overall Gross Sq.Ft');?> :</b></td>
            <td colspan="1" style="border:none;"><?php echo  $invoice_detail[0]['total_gross'];  ?></td>
            <td colspan="5" style="text-align:right;border:none;"><b><?php  echo display('GRAND TOTAL');?> :</b></td>
            <td colspan="1" style="border:none;"><?php  echo $currency ; ?><?php  echo $all_invoice[0]['gtotal'];    ?></td>
         </tr>
         <tr class="avoid-page-break" >
            <td  colspan="2" style="vertical-align:top;text-align:right;border:none;"><b>Overall Net Sq.Ft :</b></td>
            <td colspan="1" style="border:none;"><?php echo  $invoice_detail[0]['total_net'];  ?>   </td>
            <td colspan="5" style="text-align:right;border:none;"><b><?php  echo display('GRAND TOTAL');?> :</b><br/><b><?php  echo display('Preferred Currency');?></b></td>
            <td colspan="1" style="border:none;">
               <table>
                  <tr class="avoid-page-break" >
                     <td class="cus" name="cus" style="border:none;"></td>
                     <td style="border:none;text-align:left;"> <?php echo $customer_currency." ".$all_invoice[0]['gtotal_preferred_currency'] ;?></td>
                  </tr>
               </table>
            </td>
         </tr>
         <tr class="avoid-page-break" >
            <td colspan="2"  style="vertical-align:top;text-align:right;border:none;"><b><?php  echo display('Overall Weight');?> :</b></td>
            <td colspan="1" style="border:none;"><?php echo  $invoice_detail[0]['total_weight'];  ?> </td>
            <td colspan="5" class="amt" style="text-align:right;border:none;"><b><?php  echo display('Amount Paid');?> :</b></td>
            <td style="border:none;">
               <table border="0">
                  <tr class="amt">
                     <td class="cus" name="cus" style="text-align:left;"></td>
                     <td>  <?php echo $customer_currency." ".$paid_amount ;?></td>
                  </tr>
               </table>
            </td>
         </tr>
         <tr class="avoid-page-break">
            <td colspan="2"  style="vertical-align:top;text-align:right;border:none;"></td>
            <td colspan="1" style="border:none;"></td>
            <td class="amt" colspan="5"  style="vertical-align:top;text-align:right;border:none;"><b><?php echo display('balance_ammount');  ?> :</b></td>
            <td class="amt" style="border:none;" colspan="1">
               <table border="0">
                  <tr class="amt">
                     <td class="cus" name="cus" style="border:none;"></td>
                     <td style="border:none;">
                        <?php echo $supplier_currency." ".$purchase_detail[0]['due_amount'];  ?>     
                     <td style='border:none;'>
                        <?php echo $customer_currency." ".$due_amount;?>
                     </td>
                  </tr>
               </table>
      </table>
      <br>
      <th class="heading avoid-page-break " style="font-size: 9px;"><b><?php echo display('Account Details/Additional Information') ?></b> : </th>
      </br><?php echo $all_invoice[0]['ac_details'];  ?>  <br/><br/>
      <th class="heading avoid-page-break" style="font-size: 9px;"><b><?php echo display('Remarks/Conditions') ?>:</b> </th>
      </br><?php  echo $all_invoice[0]['remark']; ?>  <br/><br/> 
   </div>
   <?php 
      }
      elseif($template==2)
      {
      ?>

<?php if(empty($header)){ ?>
         <div class="col-sm-4text-center" style="color:black;">
            <h3  style="text-align: center;" ><?php echo "SALE INVOICE"; ?></h3>
         </div>
         <?php } 
            else
            {  ?>
                    <h3 style="text-align: center;color:black;" ><?php echo $header; ?></h3>

         <?php } ?>








   <div class="brand-section" style="background-color:<?php echo  '#' .$color; ?>">
   <div class="row" style="padding:22px;">
       <div class='col-sm-1'></div>
        <div class="col-sm-2" style="margin-top:-50px;position: relative; text-align: center;">
            <img src="<?php echo base_url().$logo; ?>" style="width: 150%; position: absolute; top: 0; right: 0;" />
         </div>

         
         
         <div class="col-sm-4 text-center" style="color:white;">
          </div>
        
         <div class="col-sm-5" style="color:white;font-weight:bold ;text-align:start;" id='company_info'>          
            <b><?php echo display('Company name') ?> : &nbsp;</b><?php echo $company[0]['company_name']; ?><br>
            <b>  <?php echo display('Address ') ?>:  &nbsp;</b><?php echo $company[0]['address']; ?><br>
            <b> <?php echo display('Email ') ?>:  &nbsp;</b><?php echo $company[0]['email']; ?><br>
            <b>  <?php echo display('Contact ') ?>: &nbsp; </b><?php echo $company[0]['mobile']; ?><br>
         </div>
      </div>
   </div>
   <div class="body-section"      >
      <div class="row">
         <div class="col-sm-6">
            <table id="one" >
               <tr>
                  <td  class="key"><?php echo display('Invoice Number') ?></td>
                  <td style="width:10px;">:</td>
                  <td calss="value"><?php  echo $all_invoice[0]['commercial_invoice_number'] ; ?></td>
               </tr>
               <tr>
                  <td  class="key"><?php echo display('Customer Name') ?></td>
                  <td style="width:10px;">:</td>
                  <td calss="value"><?php echo $customer_name; ?></td>
               </tr>
               <tr>
                  <td class="key"><?php echo display('B/L No') ?></td>
                  <td style="width:10px;">:</td>
                  <td calss="value"><?php  echo $all_invoice[0]['bl_no'] ; ?></td>
               </tr>
               <tr>
                  <td  class="key"><?php echo display('Payment Due date') ?></td>
                  <td style="width:10px;">:</td>
                  <td calss="value"><?php  echo $all_invoice[0]['payment_due_date'] ; ?></td>
               </tr>
               <tr>
                  <td  class="key"><?php echo display('ETA') ?></td>
                  <td style="width:10px;">:</td>
                  <td calss="value"><?php echo $all_invoice[0]['eta'] ; ?></td>
               </tr>
               <tr>
                  <td  class="key"><?php echo display('Port of Discharge') ?></td>
                  <td style="width:7px;">:</td>
                  <td calss="value" style="white-space: pre-wrap;"><?php  echo $invoice_detail[0]['Port_of_discharge']  ; ?> </td>
               </tr>
                <tr>
                   <td  class="key">Account Category</td>
                   <td style="width:7px;">:</td>
                   <td calss="value" style="white-space: pre-wrap;"><?php  echo $all_invoice[0]['account_category'] ; ?> </td>
                </tr>
                <tr>
                   <td  class="key">Account Sub Category</td>
                   <td style="width:7px;">:</td>
                   <td calss="value" style="white-space: pre-wrap;"><?php  echo $all_invoice[0]['sub_category'] ; ?> </td>
                </tr>
                <tr>
                   <td  class="key">Account Sub Category</td>
                   <td style="width:7px;">:</td>
                   <td calss="value" style="white-space: pre-wrap;"><?php  echo $all_invoice[0]['account_subcat'] ; ?> </td>
                </tr>
              
            </table>
         </div>
         <div class="col-sm-6">
            <table id="two">
               <tr>
                  <td  class="key"><?php echo display('Sales Invoice date') ?></td>
                  <td style="width:10px;">:</td>
                  <td calss="value"><?php  echo $all_invoice[0]['date'] ; ?></td>
               </tr>
               <tr>
                  <td  class="key"><?php echo display('Container Number') ?></td>
                  <td style="width:10px;">:</td>
                  <td calss="value"><?php  echo $container_no ; ?></td>
               </tr>
               <tr>
                  <td  class="key"><?php echo display('Payment Terms') ?></td>
                  <td style="width:10px;">:</td>
                  <td calss="value"><?php  echo $payment_terms; ?></td>
               </tr>
               <tr>
                  <td  class="key"><?php echo display('ETD') ?></td>
                  <td style="width:10px;">:</td>
                  <td calss="value"><?php  echo $all_invoice[0]['etd'] ; ?></td>
               </tr>
               <tr>
                  <td  class="key"><?php echo display('Payment Type') ?></td>
                  <td style="width:10px;">:</td>
                  <td calss="value"><?php  echo $paytype ; ?></td>
               </tr>
               <tr>
                  <td  class="key"><?php echo display('Billing Address') ?></td>
                  <td style="width:7px;">:</td>
                  <td calss="value" style="white-space: pre-wrap;"> <?php  echo $all_invoice[0]['billing_address'] ; ?></td>
               </tr>
                <tr>
                  <td  class="key"><?php echo display('Shipping Address') ?></td>
                  <td style="width:7px;">:</td>
                  <td calss="value" style="white-space: pre-wrap;"><?php  echo $all_invoice[0]['shipping_address'] ; ?> </td>
               </tr>
            </table>
         </div>
      </div>
      <div class="body-section">
         <div class="table-responsive">
            <div id="content">
               <?php 
                  for($m=1;$m<count($all_invoice);$m++){ 
                      ?>
               <table class="table table-bordered normalinvoice table-hover" id="normalinvoice_<?php  echo $m; ?>" >
                  <thead  style="background-color:<?php echo  '#' .$color; ?>">
                     <tr class="avoid-page-break">
                        <th rowspan="1"  class="text-center text-white">S.No</th>
                        <th rowspan="1" class="absorbing-column text-center text-white">Product Name</th>
                        <th rowspan="1" class="text-center text-white">Description</th>
                        <th rowspan="1" class="text-center text-white">Thick<br/>ness</th>
                        <th rowspan="1" class="text-center text-white">Bundle No</th>
                        <th rowspan="1" class="text-center text-white">Slab No</th>
                        <th colspan="2" class="text-center text-white">Net<br/> Measure<br/>Width&#9474;Height</th>
                        <th rowspan="1" class="text-center text-white">Net <br/>Sq. Ft</th>
                        <th rowspan="1"  class="text-center text-white">Sales<br/>Price per Sq. Ft</th>
                        <th rowspan="1"  class="text-center text-white">Sales Slab Price</th>
                        <th rowspan="1"  class="text-left text-white">Total</th>
                     </tr>
                  </thead>
                  <tbody id="addPurchaseItem_<?php echo $m;  ?>">
                     <?php  $n=0; ?>
                     <?php foreach($all_invoice as $inv){
                        $a = substr($inv['tableid'], 0, 1);
                        if($a==$m){
                                                            
                                                                ?>
         <tr class="avoid-page-break">
                        <td style="font-size: 9px;"><?php echo $n+1; ?></td>
                        <td style="font-size: 9px;word-wrap: break-word;"><?php  echo $inv['product_name'];  ?></td>
                        <td style="font-size: 9px;word-wrap: break-word;"><?php  echo $inv['description'];  ?></td>
                        <td style="font-size: 9px;"><?php  echo $inv['thickness'];  ?></td>
                        <td style="font-size: 9px;"><?php  echo $inv['bundle_no'];  ?></td>
                        <td style="font-size: 9px;"><?php echo $n+1; ?></td>
                        <td style="font-size: 9px;" class="net_width"><?php  echo $inv['n_width'];  ?></td>
                        <td style="font-size: 9px;" class="net_height"><?php  echo $inv['n_height'];  ?></td>
                        <td style="font-size:9px;" class="net_sq_ft"> <?php  echo $inv['net_sqft'];  ?></td>
                        <td style="font-size: 9px;"><?php  echo $currency; ?><?php  echo $inv['sales_price_sqft'];  ?></td>
                        <td style="font-size: 9px;"><?php  echo $currency; ?><?php  echo $inv['sales_slab_price'];  ?></td>
                        <td style="text-align:start;" > <span style="font-size: 9px;"><?php  echo $currency; ?> <span class="total_price"><?php  echo  $inv['total_price'];  ?></span></span></td>
                     </tr>
                     <?php $n++;   } }  ?>
                  </tbody>
                  <tfoot>
                     <tr class="avoid-page-break" >
                        <td style="text-align:right;font-size: 9px;" colspan="8"><b><?php echo display('Net Sq.Ft') ?> :</b></td>
                        <td >
                           <input type="text" id="overall_net_<?php echo $m; ?>" name="overall_net[]"  class="overall_net"  style="width: 60px;font-size: 9px;"   readonly="readonly"  /> 
                        </td>
                        <td style="text-align:right;font-size: 8px;" colspan="2"><b><?php echo display('TOTAL') ?> :</b></td>
                        <td style="text-align:start;font-size: 8px;">
                           <input type="text" id="Total_<?php echo $m; ?>" name="total[]"   class="b_total"   style="padding-top: 6px;width: 50px;font-size: 9px;"    readonly="readonly"  />
                        </td>
                     </tr>
                  </tfoot>
               </table>
               <?php   } ?>
               <table border="0" class="overall table table-hover">
                  <tr class="avoid-page-break">
                     <td  colspan="2" style="vertical-align:top;text-align:right;border:none;"><b><?php  echo display('Overall TOTAL');?> :</b></td>
                     <td colspan="1" style="border:none;"><?php  echo $currency ; ?><?php echo $all_invoice[0]['total_amount']; ?> </td>
                     <td style="text-align:right;border:none;" colspan="5"><b><?php echo  display('tax')." (".$tax_des;  ?></b>:</td>
                     <td style='border:none;'><?php  echo $currency; ?><?php echo $tax_amt;  ?></td>
                  </tr>
                  <tr class="avoid-page-break">
                     <td  colspan="2" style="vertical-align:top;text-align:right;border:none;"><b><?php  echo display('Overall Gross Sq.Ft');?> :</b></td>
                     <td colspan="1" style="border:none;"><?php echo  $invoice_detail[0]['total_gross'];  ?></td>
                     <td colspan="5" style="text-align:right;border:none;"><b><?php  echo display('GRAND TOTAL');?> :</b></td>
                     <td colspan="1" style="border:none;"><?php  echo $currency ; ?><?php  echo $all_invoice[0]['gtotal'];    ?></td>
                  </tr>
                  <tr class="avoid-page-break" >
                     <td  colspan="2" style="vertical-align:top;text-align:right;border:none;"><b>Overall Net Sq.Ft :</b></td>
                     <td colspan="1" style="border:none;"><?php echo  $invoice_detail[0]['total_net'];  ?>   </td>
                     <td colspan="5" style="text-align:right;border:none;"><b><?php  echo display('GRAND TOTAL');?> :</b><br/><b><?php  echo display('Preferred Currency');?></b></td>
                     <td colspan="1" style="border:none;">
                        <table>
                           <tr class="avoid-page-break">
                              <td class="cus" name="cus" style="border:none;"></td>
                              <td style="border:none;text-align:left;"> <?php echo $customer_currency." ".$all_invoice[0]['gtotal_preferred_currency'] ;?></td>
                           </tr>
                        </table>
                     </td>
                  </tr>
                  <tr class="avoid-page-break">
                     <td colspan="2"  style="vertical-align:top;text-align:right;border:none;"><b><?php  echo display('Overall Weight');?> :</b></td>
                     <td colspan="1" style="border:none;"><?php echo  $invoice_detail[0]['total_weight'];  ?> </td>
                     <td colspan="5" class="amt" style="text-align:right;border:none;"><b><?php  echo display('Amount Paid');?> :</b></td>
                     <td style="border:none;">
                        <table border="0">
                           <tr class="amt avoid-page-break">
                              <td class="cus" name="cus" style="text-align:left;"></td>
                              <td>  <?php echo $customer_currency." ".$paid_amount ;?></td>
                           </tr>
                        </table>
                     </td>
                  </tr>
                  <tr class="avoid-page-break">
                     <td colspan="2"  style="vertical-align:top;text-align:right;border:none;"></td>
                     <td colspan="1" style="border:none;"></td>
                     <td class="amt" colspan="5"  style="vertical-align:top;text-align:right;border:none;"><b><?php echo display('balance_ammount');  ?> :</b></td>
                     <td class="amt" style="border:none;" colspan="1">
                        <table border="0">
                           <tr class="amt">
                              <td class="cus avoid-page-break" name="cus" style="border:none;"></td>
                              <td style="border:none;">
                                 <?php echo $supplier_currency." ".$purchase_detail[0]['due_amount'];  ?>     
                              <td style='border:none;'>
                                 <?php echo $customer_currency." ".$due_amount;?>
                              </td>
                           </tr>
                        </table>
               </table>
               <br>
               <th class="heading avoid-page-break" style="font-size: 9px;"><b><?php echo display('Account Details/Additional Information') ?></b> : </th>
               </br><?php echo $all_invoice[0]['ac_details'];  ?>  <br/><br/>
               <th class="heading avoid-page-break" style="font-size: 9px;"><b><?php echo display('Remarks/Conditions') ?>:</b> </th>
               </br><?php  echo $all_invoice[0]['remark']; ?>  <br/><br/> 
            </div>
            <?php 
               }
               elseif($template==4)
               {
               ?>
          
    <div class="invoice-12 invoice-content" style="padding:0px;">
    <div class="container" style="padding:0px;" >
        <div class="row">
            <div class="col-lg-12">
                <div class="invoice-inner clearfix">
                  <div style="color:red;"></div>
                   <div style="color:red;"></div>
                    <div class="invoice-info clearfix" id="invoice_wrapper">
                        <div class="invoice-contant">

 <div class="row"  style="text-align: center;" >
 <div class="col-sm-12" >
 <div class="col-sm-4"></div>
                        <?php if(empty($header)){ ?>
         <div class="col-sm-4 text-center" style="color:black;">
            <h3  style="text-align:start;" ><?php echo "SALE INVOICE"; ?></h3>
         </div>
         <?php } 
            else
            {  ?>
 <div class="col-sm-4 text-center" style="color:black;">
            <h3  style="text-align:start;" ><?php echo $header; ?></h3>
         </div>
         <?php } ?>
          <div class="col-sm-4"></div>
        </div> </div>

<br>

 
  
  
  
  
     <div class="row"  style="height:60px;text-align: center;" >
                                    <div class="col-sm-3" style='margin-top:-50px;'><img src="<?php echo  base_url().$logo; ?>"   style='width: 90%;'  /></div>
                             
                                    <div class="col-sm-5 text-center" style="color:black;">
                                     </div>

 
                                    <div class="col-sm-4"  style="text-align:start" id='company_info'>
                                          <p class="mb-0"><strong><?php echo display('Invoice No') ?></strong> : <span><strong><?php  echo $all_invoice[0]['commercial_invoice_number']; ?></strong></span></p>
                                            <p class="mb-0"> <?php echo display('Invoice Date') ?>  : <span><?php  echo $all_invoice[0]['date']; ?></span></p>
                                    </div>
                                 </div>
                              
  
  
  
  
  

                                             <hr>
            
                    
                            
                          <!--<div class="invoice-top" style="background-color:white;">-->
                          <!--      <div class="row">-->
                          <!--          <div class="col-md-4 col-sm-6 mb-30">-->
                          <!--              <div class="invoice-number">-->
                          <!--                  <h4 class="inv-title-1" style="font-weight:bold;color:<?php echo '#'.$color; ?> "><?php echo  ('Customer') ?></h4>-->
                          <!--                  <h2 class="name mb-10"><?php echo $customer_name; ?></h2>-->
                          <!--                  <p class="invo-addr-1 mb-0">-->
                          <!--                  <?php  echo $all_invoice[0]['shipping_address'] ; ?>-->
                          <!--                  </p>-->
                          <!--              </div>-->
                          <!--          </div>-->
              

                          <!--          <div class="col-md-4 col-sm-6 mb-30 invoice-contact-us">-->
                          <!--              <h4 class="inv-title-1" style="font-weight:bold;color:<?php echo '#'.$color; ?> ">Company Information</h4>-->
                          <!--              <h2 class="name mb-10"></h2>-->
                          <!--              <ul class="link">-->
                                             
                          <!--              <li>-->
                          <!--                      <i class="fas fa-building"></i> <?php echo $company[0]['company_name']; ?>-->
                          <!--                  </li>-->
                                        
                          <!--              <li>-->
                          <!--                      <i class="fa fa-map-marker"></i> <?php echo $company[0]['address']; ?>-->
                          <!--                  </li>-->
                          <!--                  <li>-->
                          <!--                      <i class="fa fa-envelope"></i> <?php echo $company[0]['email']; ?> -->
                          <!--                  </li>-->
                          <!--                  <li>-->
                          <!--                      <i class="fa fa-phone"></i> <a href="tel:+55-417-634-7071"><?php echo $company[0]['mobile']; ?></a>-->
                          <!--                  </li>-->
                          <!--              </ul>-->
                          <!--          </div>-->
                          <!--      </div>-->
                          <!--  </div>-->

                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                              <div class="invoice-top">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="invoice-number">
                                               <h4 class="inv-title-1" style="font-weight:bold;color:<?php echo '#'.$color; ?> "><?php echo  ('Customer') ?></h4>
                                            <h2 class="name mb-10"><?php echo $customer_name; ?></h2>
                                        </div>
                                    </div>

                                                              <div class="col-md-4"></div>


                                           <div class="col-md-4 invoice-contact-us">
                                    <h4 class="inv-title-1" style="font-weight:bold;color:<?php echo "#".$color; ?> ">Company Information</h4>
                                    <h2 class="name mb-10"></h2>
                                      <ul class="link">
                                             
                                        <li>
                                                <i class="fas fa-building"></i> <?php echo $company[0]['company_name']; ?>
                                            </li>
                                        
                                        <li>
                                                <i class="fa fa-map-marker"></i> <?php echo $company[0]['address']; ?>
                                            </li>
                                            <li>
                                                <i class="fa fa-envelope"></i> <?php echo $company[0]['email']; ?> 
                                            </li>
                                            <li>
                                                <i class="fa fa-phone"></i> <a href="tel:+55-417-634-7071"><?php echo $company[0]['mobile']; ?></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                             <div class="invoice-center">
                                <div class="order-summary"  style="background-color:white;">
                                    <div class="table-outer">
                                        <table class="default-table invoice-table" border="1" cellpadding="0" cellspacing="0">
                                            <thead  style="background-color:<?php  echo '#'.$color; ?>;color:black;">
                                            <tr >
                                                   <th>B/L No</th>
                                                   <th>Container Number</th>
                                                   <th>ETD</th>
                                                   <th>ETA</th>
                                                </tr>
                                             </thead>
                                             <tbody>
                                                <tr style="text-align:center;">
                                                   <td><?php  echo $all_invoice[0]['bl_no'] ; ?></td>
                                                   <td><?php  echo $container_no ; ?></td>
                                                   <td><?php  echo $all_invoice[0]['etd'] ; ?></td>
                                                   <td><?php echo $all_invoice[0]['eta'] ; ?></td>
                                                </tr>
                                           
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>


 





                            <div class="invoice-center">
                            <div class="order-summary"  style="background-color:white;">
                                    <div class="table-outer">
 
 
  <?php 
                                             for($m=1;$m<count($all_invoice);$m++){ 
                                                 ?>
                                          <table class="normalinvoice invoice-table" style="width:100%;"   id="normalinvoice_<?php  echo $m; ?>" border="1" cellpadding="0" cellspacing="0">
                                             <thead style="background-color:<?php  echo '#'. $color; ?>;color:black;">
                                                <tr class="avoid-page-break">
                                                     <th rowspan="1"  class="absorbing-column text-center text-white">S.No</th>  
                    <th rowspan="1"  class="text-center text-white">Product </br>Name</th>
                    <th rowspan="1"  class="text-center text-white">Description</th>
                    <th rowspan="1"  class="text-center text-white">Thick<br/>ness</th>
                    <th rowspan="1"  class="text-center text-white">Bundle No</th>
                    <th rowspan="1"  class="text-center text-white">Slab No</th>
                    <th colspan="2"  class="text-center text-white">Net<br/> Measure<br/>Width&#9474;Height</th>
                    <th rowspan="1"  class="text-center text-white">Net <br/>Sq. Ft</th>
                    <th rowspan="1"  class="text-center text-white">Sales<br/>Price per Sq. Ft</th>
                    <th rowspan="1"  class="text-center text-white">Sales<br/> Slab Price</th>
                    <th rowspan="1"  class="text-center text-white">Total</th>
                                                </tr>
                                             </thead>
                                             <tbody id="addPurchaseItem_<?php echo $m;  ?>">
                                                <?php  $n=0; ?>
                                                <?php foreach($all_invoice as $inv){
                                                   $a = substr($inv['tableid'], 0, 1);
                                                   if($a==$m){
                                                                                       
                                                                                           ?>
                                                <tr class="avoid-page-break">
                                                   <td class="text-center " ><?php echo $n+1; ?></td>
                                                   <td class="text-center "  style="word-wrap: break-word;"><?php  echo $inv['product_name'];  ?></td>
                                                   <td class="text-center " style="word-wrap: break-word;"><?php  echo $inv['description'];  ?></td>
                                                   <td class="text-center " style=""><?php  echo $inv['thickness'];  ?></td>
                                                   <td class="text-center " style=""><?php  echo $inv['bundle_no'];  ?></td>
                                                   <td class="text-center " style=""><?php echo $n+1; ?></td>
                                                   <td class="text-center "  style="" class="net_width"><?php  echo $inv['n_width'];  ?></td>
                                                   <td class="text-center " class="net_height"><?php  echo $inv['n_height'];  ?></td>
                                                   <td class="text-center "  class="net_sq_ft"> <?php  echo $inv['net_sqft'];  ?></td>
                                                   <td class="text-center " ><?php  echo $currency; ?><?php  echo $inv['sales_price_sqft'];  ?></td>
                                                   <td class="text-center "  ><?php  echo $currency; ?><?php  echo $inv['sales_slab_price'];  ?></td>
                                                   <td class="text-center " > <span class="text-center "><?php  echo $currency; ?> <span class="total_price"><?php  echo  $inv['total_price'];  ?></span></span></td>
                                                </tr>
                                                <?php $n++;   } }  ?>
                                                </tbody>
                                             <tfoot>
                                                <tr class="avoid-page-break">
                                                   <td style="text-align:right;" colspan="8"><b><?php echo display('Net Sq.Ft') ?> :</b></td>
                                                   <td >
                                                      <input type="text" id="overall_net_<?php echo $m; ?>" name="overall_net[]"  class="overall_net"  style="width: 60px;text-center;"   readonly="readonly"  /> 
                                                   </td>
                                                   <td style="text-align:right;font-size: 14px;" colspan="2"><b><?php echo display('TOTAL') ?> :</b></td>
                                                   <td style="text-align:start;font-size: 14px;">
                                                      <input type="text" id="Total_<?php echo $m; ?>" name="total[]"   class="b_total"   style="padding-top: 6px;text-center;"    readonly="readonly"  />
                                                   </td>
                                                </tr>
                                             </tfoot>
                                          </table>
                                        
                                          <?php   } ?>
                                          <table class="default-table invoice-table">
                                             <!-- <table border="0" class="overall table table-hover"> -->
                                             <tr style='border:none;' class="avoid-page-break">
                                                <td  colspan="2" style="vertical-align:top;text-align:right;border:none;"><b><?php  echo display('Overall TOTAL');?> :</b></td>
                                                <td colspan="1" style="border:none;"><?php  echo $currency ; ?><?php echo $all_invoice[0]['total_amount']; ?> </td>
                                                <td style="text-align:right;border:none;" colspan="6"><b><?php echo  display('tax')." (".$tax_des;  ?></b>:</td>
                                                <td style='border:none;'><?php  echo $currency; ?><?php echo $tax_amt;  ?></td>
                                             </tr>
                                             <tr style='border:none;' class="avoid-page-break">
                                                <td  colspan="2" style="vertical-align:top;text-align:right;border:none;"><b><?php  echo display('Overall Gross Sq.Ft');?> :</b></td>
                                                <td colspan="1" style="border:none;"><?php echo  $invoice_detail[0]['total_gross'];  ?></td>
                                                <td colspan="6" style="text-align:right;border:none;"><b><?php  echo display('GRAND TOTAL');?> :</b></td>
                                                <td colspan="1" style="border:none;"><?php  echo $currency ; ?><?php  echo $all_invoice[0]['gtotal'];    ?></td>
                                             </tr>
                                             <tr style='border:none;' class="avoid-page-break">
                                                <td  colspan="2" style="vertical-align:top;text-align:right;border:none;"><b>Overall Net Sq.Ft :</b></td>
                                                <td colspan="1" style="border:none;"><?php echo  $invoice_detail[0]['total_net'];  ?>   </td>
                                                <td colspan="6" style="text-align:right;border:none;"><b><?php  echo display('GRAND TOTAL');?> :</b><br/><b><?php  echo display('Preferred Currency');?></b></td>
                                                <td colspan="1" style="border:none;">  <?php echo $customer_currency." ".$all_invoice[0]['gtotal_preferred_currency'] ;?></td>
                                             </tr>
                                             <tr style='border:none;' class="avoid-page-break">
                                                <td colspan="2"  style="vertical-align:top;text-align:right;border:none;"><b><?php  echo display('Overall Weight');?> :</b></td>
                                                <td colspan="1" style="border:none;"><?php echo  $invoice_detail[0]['total_weight'];  ?> </td>
                                                <td colspan="6" class="amt" style="text-align:right;border:none;"><b><?php  echo display('Amount Paid');?> :</b></td>
                                                <td style="border:none;"> 
                                                   <?php echo $customer_currency." ".$paid_amount ;?>
                                                </td>
                                                </td>
                                             </tr>
                                             <tr style='border:none;' class="avoid-page-break">
                                                <td colspan="2"  style="vertical-align:top;text-align:right;border:none;"></td>
                                                <td colspan="1" style="border:none;"></td>
                                                <td class="amt" colspan="6"  style="vertical-align:top;text-align:right;border:none;"><b><?php echo display('balance_ammount');  ?> :</b></td>
                                                <td class="amt" style="border:none;" colspan="1">
                                                   <?php echo $customer_currency." ".$due_amount;?>
                                                </td>
                                             </tr>
                                          </table>
                                       </div>
                                    </div>
                                 </div>
                                 <div class=" invoice-bottom"   style="background-color:white;">
                                    <div class="row">
                                       <div class="avoid-page-break col-lg-8 col-md-8 col-sm-8">
                                          <div class="terms-conditions mb-30">
                                             <h3 class="inv-title-1 mb-10" style="font-size: 18px;font-weight:bold;">Account Details/Additional Information</h3>
                                             <?php echo $all_invoice[0]['ac_details'];  ?>
                                          </div>
                                          <div class="terms-conditions mb-30">
                                             <h3 class="inv-title-1 mb-10" style="font-size: 18px;font-weight:bold;">Remarks/Conditions</h3>
                                             <?php echo $all_invoice[0]['remark'];  ?>
                                          </div>
                                       </div>
                                       <div class="avoid-page-break col-lg-4 col-md-4 col-sm-4">
                                          <div class="payment-method mb-30">
                                             <h3 style="font-size: 18px;font-weight:bold;" class="inv-title-1 mb-10">Payment Info :</h3>
                                             <ul class="payment-method-list-1 text-14" style="font-size: 12px;">
                                                <li><strong>Payment Terms : &nbsp;</strong><?php  echo $payment_terms; ?></li>
                                                <li><strong>Payment Type    :&nbsp;&nbsp;&nbsp; </strong><?php  echo $paytype ; ?></li>
                                                <li><strong>Due date      : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong> <?php  echo $all_invoice[0]['payment_due_date'] ; ?></li>
                                             </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- </div>
                    </div>       
             </div>
             </div>
             </div> -->

               
                </div>
            </div>
        </div>
    </div>
</div>
            <!-- Invoice 12 end -->
            
            
            
            
            <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/Invoice/style.css" />
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
            <script src="<?php echo base_url()?>assets/css/Invoice/jspdf.min.js"></script>
            <script src="<?php echo base_url()?>assets/css/Invoice/app.js"></script>
          
          
          
          
            <style>
.avoid-page-break {
  page-break-inside: avoid;
}
  th{
    text-align:center;
  }
  .invoice-12 .default-table thead th {
   
    position: relative;
    color:white;
    font-size: 15px;
 background-color:<?php  echo $color ?>;
}
input{
  border: none;
}
.tm{
background-color:red;
    position: absolute;
    height: 30%;
    width: 70%;
    -webkit-transform: skewX(-35deg);
    /* transform: skewX(35deg); */
  
    right: -100px;
    overflow: hidden;
}
.tm_accent_bg, .tm_accent_bg_hover:hover {
    background-color: #007aff;
}
.invoice-12 .invoice-info:after {
    content: "";
    width: 300px;
    height: 300px;
    position: absolute;
    bottom: 0;
    right: 0;
    background-color: <?php  echo $color ?>;
    background-size: cover;
    z-index: -1;
}
.invoice-12 .invoice-info:before {
    content: "";
    width: 300px;
    height: 300px;
    position: absolute;
    top: 0;
    left: 0;
     background-color: <?php  echo $color ?>;
    background-size: cover;
    z-index: -1;
}
.invoice-12 .default-table thead {
  
   background-color: <?php  echo $color ?>;
    border-radius: 8px;
    color: black;
}

@media (max-width: 992px) {

  th{
    text-align:center;
  }
  .invoice-12 .default-table thead th {
   
    position: relative;
    color:white;
    font-size: 15px;
 background-color:<?php  echo $color ?>;
}
input{
  border: none;
}
.tm{
background-color:red;
    position: absolute;
    height: 30%;
    width: 70%;
    -webkit-transform: skewX(-35deg);
    /* transform: skewX(35deg); */
  
    right: -100px;
    overflow: hidden;
}
.tm_accent_bg, .tm_accent_bg_hover:hover {
    background-color: #007aff;
}
.invoice-12 .invoice-info:after {
    content: "";
    width: 300px;
    height: 300px;
    position: absolute;
    bottom: 0;
    right: 0;
    background-color: <?php  echo $color ?>;
    background-size: cover;
    z-index: -1;
}
.invoice-12 .invoice-info:before {
    content: "";
    width: 300px;
    height: 300px;
    position: absolute;
    top: 0;
    left: 0;
     background-color: <?php  echo $color ?>;
    background-size: cover;
    z-index: -1;
}
.invoice-12 .default-table thead {
   background-color: <?php  echo $color ?>;
    border-radius: 8px;
    color: black;
}


}
.b_total{
  width:70px;
}
.invoice-contant{
  /* border:2px solid black; */
}


      .body-section{
            padding: 16px;
            border: 1px solid gray;
            
        }



  </style>
            <?php 
               }
               ?>
         </div>
      </div>
</section>
<!-- /.content -->
</div> <!-- /.content-wrapper -->
<style>

.avoid-page-break {
  page-break-inside: avoid;
}

   .key{
       padding:10px;
   width: auto;
   text-align:left;
   font-weight:bold;
   }
   .value{
   text-align:left;
   }
   #one,#two{
   /* float:left; */
   /* width:100%; */
   }
   body{
   background-color: #fcf8f8; 
   margin: 0;
   padding: 0;
   }
   h1,h2,h3,h4,h5,h6{
   margin: 0;
   padding: 0;
   }
   p{
   margin: 0;
   padding: 0;
   }
   .heading_name{
   font-weight: bold;
   }
   .container{
   width: 100%;
   margin-right: auto;
   margin-left: auto;
   margin-top: 50px;
   }
   .brand-section{
   /* background-color: #5961b3; */
   padding: 7px 7px;
   }
   .logo{
   width: 50%;
   }
   .row{
   display: flex;
   flex-wrap: wrap;
   /* padding-left: 24px; */
   }
   .col-sm-6{
   width: 50%;
   flex: 0 0 auto;
   }
   .text-white{
   color: #fff;
   }
   .company-details{
   float: right;
   text-align: right;
   }
   .body-section{
   padding: 0px;
   }
   .heading{
   font-size: 10px;
   margin-bottom: 08px;
   }
   .sub-heading{
   color: #262626;
   margin-bottom: 05px;
   }
   table{
   /*background-color: #fff;*/
   width: 100%;
   border-collapse: collapse;
   /* text-align: center; */
   }
   table thead tr{
   border: 1px solid #111;
   /* background-color: #5961b3; */
   }
   .table-bordered td{
   text-align:center;
   }
   table td {
   vertical-align: middle !important;
   word-wrap: break-word;
   }
   th{
   text-align:center;
   color:white;
   }
   table th, table td {
   padding-top: 08px;
   padding-bottom: 08px;
   }
   .table-bordered{
   box-shadow: 0px 0px 5px 0.5px gray !important;
   }
   .table-bordered td, .table-bordered th {
   border: 1px solid #dee2e6 !important;
   }
   .text-right{
   text-align: right;
   }
   .w-20{
   width: 20%;
   }
   .float-right{
   float: right;
   }
   @media only screen and (max-width: 600px) {
   }
   .modal {
   position: fixed;
   top: 0;
   left: 0;
   display: flex;
   width: 100%;
   height: 100vh;
   justify-content: center;
   align-items: center;
   opacity: 0;
   visibility: hidden;
   }
   .modal .content {
   position: relative;
   padding: 10px;
   border-radius: 3px;
   background-color: #fff;
   box-shadow: rgba(112, 128, 175, 0.2) 0px 16px 24px 0px;
   transform: scale(0);
   transition: transform 300ms cubic-bezier(0.57, 0.21, 0.69, 1.25);
   }
   .modal .close {
   position: absolute;
   top: 5px;
   right: 5px;
   width: 30px;
   height: 30px;
   cursor: pointer;
   border-radius: 8px;
   background-color: #7080af;
   clip-path: polygon(0 10%, 10% 0, 50% 40%, 89% 0, 100% 10%, 60% 50%, 100% 90%, 90% 100%, 50% 60%, 10% 100%, 0 89%, 40% 50%);
   }
   .modal.open {
   background-color:#38469f;
   opacity: 1;
   visibility: visible;
   }
   .modal.open .content {
   transform: scale(1);
   }
   .content-wrapper.blur {
   filter: blur(5px);
   }
   .content {
   min-height: 0px;
   }
   body {
   margin: 0;
   padding: 0;
   background: #38469f;
   }
   #head{
   text-align: center;
   margin-top: 250px;
   }
   @media print 
   { 
   #head{display:none;} 
   #content{display:block;} 
   }
   .body-section{
   /* padding: 16px; */
   border: 1px solid gray;
   }
   th{
   text-align:center;
   }


   .key{
    width: auto;
    text-align:left;
font-weight:bold;

}
.value{
    text-align:left;
}
#one,#two{
/* float:left; */
/* width:100%; */
}
body{
    background-color: #fcf8f8; 
    margin: 0;
    padding: 0;
}
h1,h2,h3,h4,h5,h6{
    margin: 0;
    padding: 0;
}
p{
    margin: 0;
    padding: 0;
}
.heading_name{
    font-weight: bold;
}
.container{
    width: 100%;
    margin-right: auto;
    margin-left: auto;
    margin-top: 50px;
}
.brand-section{
   /* background-color: #5961b3; */
   /* padding: 10px 40px; */
}
.logo{
    width: 50%;
}

.row{
    display: flex;
    flex-wrap: wrap;
    
}
.col-sm-6{
    width: 50%;
    flex: 0 0 auto;
   
}
.text-white{
    color: #fff;
}
.company-details{
    float: right;
    text-align: right;
}

.body-section{
    padding: 0px;
    
    
}
.heading{
    font-size: 10px;
    margin-bottom: 08px;
}
.sub-heading{
    color: #262626;
    margin-bottom: 05px;
}
table{
   
    /*background-color: #fff;*/
    width: 100%;
    border-collapse: collapse;
    /* text-align: center; */

}

table thead tr{
    border: 1px solid #111;
    /* background-color: #5961b3; */
   
}
.table-bordered td{
    text-align:center;
}
table td {
    vertical-align: middle !important;
  
    word-wrap: break-word;
}
th{
    text-align:center;
    color:white;
}
table th, table td {
    padding-top: 08px;
    padding-bottom: 08px;
}
.table-bordered{
    box-shadow: 0px 0px 5px 0.5px gray !important;
}
.table-bordered td, .table-bordered th {
    border: 1px solid #dee2e6 !important;
}
.text-right{
    text-align: right;
}
.w-20{
    width: 20%;
}
.float-right{
    float: right;
}
@media only screen and (max-width: 600px) {
    
}
.modal {
  position: fixed;
  top: 0;
  left: 0;
  display: flex;
  width: 100%;
  height: 100vh;
  justify-content: center;
  align-items: center;
  opacity: 0;
  visibility: hidden;
}

.modal .content {
  position: relative;
  padding: 10px;
 
  border-radius: 3px;
  background-color: #fff;
  box-shadow: rgba(112, 128, 175, 0.2) 0px 16px 24px 0px;
  transform: scale(0);
  transition: transform 300ms cubic-bezier(0.57, 0.21, 0.69, 1.25);
}

.modal .close {
  position: absolute;
  top: 5px;
  right: 5px;
  width: 30px;
  height: 30px;
  cursor: pointer;
  border-radius: 8px;
  background-color: #7080af;
  clip-path: polygon(0 10%, 10% 0, 50% 40%, 89% 0, 100% 10%, 60% 50%, 100% 90%, 90% 100%, 50% 60%, 10% 100%, 0 89%, 40% 50%);
}

.modal.open {
    background-color:#38469f;
  opacity: 1;
  visibility: visible;
}
.modal.open .content {
  transform: scale(1);
}
.content-wrapper.blur {
  filter: blur(5px);
}
.content {
   min-height: 0px;
}
body {
    margin: 0;
    padding: 0;
    background: #38469f;
}
#head{
    text-align: center;
    margin-top: 250px;
}


@media print 
{ 
#head{display:none;} 
#content{display:block;} 
}


.body-section{
    /* padding: 16px; */
    border: 1px solid gray;
    
}
th{
    text-align:center;
  }




</style>

</style>
<div class="modal fade" id="myModal_sale" role="dialog" >
   <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content" style="width: 500px;height:100px;text-align:center;margin-bottom: 300px;">
         <div class="modal-header" style="color:white;background-color:#38469f;">
            <h4 class="modal-title"><?php echo display('New Sale') ?></h4>
         </div>
         <div class="content">
            <div class="modal-body" style="text-align:center;font-weight:bold;">
               <h4><?php echo display('New Sale Downloaded Successfully') ?></h4>
            </div>
            <div class="modal-footer">
            </div>
         </div>
      </div>
   </div>
</div>


   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>    



<script>
                    $(document).ready(function(){
                  // window.onload = function (){ 
 $(".normalinvoice").each(function(i,v){
   if($(this).find("tbody").html().trim().length === 0){
       $(this).hide()
   }
})
      $('.normalinvoice').each(function(){
var tid=$(this).attr('id');
 const indexLast = tid.lastIndexOf('_');
var idt = tid.slice(indexLast + 1);


  if ($(".normalinvoice td:not(:empty)").length == 0){
    alert("hurru");
    $(".normalinvoice").hide();
  }


  var sum=0;

 $('#normalinvoice_'+idt  +  '> tbody > tr').find('.total_price').each(function() {
var v=$(this).html();
  sum += parseFloat(v);

});

 $(this).closest('table').find('#Total_'+idt).val("<?php   echo $currency ; ?>"+sum.toFixed(3));

  var sum_net=0;

 $('#normalinvoice_'+idt  +  '> tbody > tr').find('.net_sq_ft').each(function() {
var v=$(this).html();
  sum_net += parseFloat(v);

});

 $(this).closest('table').find('#overall_net_'+idt).val(sum_net.toFixed(3));


    });
});







$(document).ready(function () {
  $("#content").attr("hidden", true);

  var img = document.createElement("img");
  img.src = "<?php echo base_url() ?>/asset/images/icons/loading.gif";
  var src = document.getElementById("head");
  src.appendChild(img);

  const element = document.getElementById("content");

var clonedElement = element.cloneNode(true);

    // change display of cloned element 
    $(clonedElement).css("display", "block");


  var opt = {
    margin: 2, // Adjust this value as needed
    filename: 'invoice.pdf',
    image: { type: 'jpeg', quality: 0.98 },
    html2canvas: { scale: 3 },
    jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
  };

  function first(callback1, callback2) {
    setTimeout(function () {
      html2pdf().from(clonedElement).set(opt).toPdf().output('blob').then(function (blob) {
        var url = URL.createObjectURL(blob);
        var a = document.createElement('a');
        a.href = url;
        a.download = opt.filename;
        document.body.appendChild(a);
        a.click();
        window.URL.revokeObjectURL(url);

        callback1();
        callback2();
        $("#content").attr("hidden", true);
      });
    }, 2500);
  }

  function second() {
    setTimeout(function () {
      $('#myModal_sale').addClass('open');
      if ($('#myModal_sale').hasClass('open')) {
        $('.container').addClass('blur');
      }
      $('.close').click(function () {
        $('#myModal_sale').removeClass('open');
        $('.cont').removeClass('blur');
      });
    }, 3500);
  }

  function third() {
    setTimeout(function () {
      window.location = '<?php echo base_url(); ?>' + 'Cinvoice/manage_invoice';
      window.close();
    }, 4000);
  }

  first(second, third);
});


</script>

 
