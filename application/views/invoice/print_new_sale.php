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

</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

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


?>
   <div class="container" id="content">
        <?php
    
    if($template==3)
            {
            ?>
        <div class="brand-section">
        <div class="row" >
     



   
       <?php if(empty($header)){ ?>
  <div class="col-sm-4 text-center" style="color:white;"><h3><?php echo "SALE INVOICE"; ?></h3></div>
 <?php } 
else
{  ?>
  <div class="col-sm-4 text-center" style="color:white;"><h3><?php echo $header; ?></h3></div>
<?php } ?>


   <div class="col-sm-5"><img src="<?php echo  base_url().$logo; ?>"   style='width: 50%;'  /></div>

   <div class="col-sm-3" style="color:white;font-weight:bold;" id='company_info'>
   
   <b><?php echo display('Company name') ?> : </b><?php echo $company[0]['company_name']; ?><br>
             <b>  <?php echo display('Address ') ?>: </b><?php echo $company[0]['address']; ?><br>
             <b> <?php echo display('Email ') ?>: </b><?php echo $company[0]['email']; ?><br>
             <b>  <?php echo display('Contact ') ?>: </b><?php echo $company[0]['mobile']; ?><br>
          </div>




 </div>
        </div>



      <div class="body-section" >
            <div class="row">&nbsp; &nbsp;&nbsp; &nbsp;
            <div class="col-6">
            <table id="one" >
            <tr><td  class="key"> <?php echo display('Invoice Number ') ?></td><td style="width:10px;">:</td><td calss="value"><?php  echo $all_invoice[0]['commercial_invoice_number'] ; ?></td></tr>

    <tr><td  class="key"> <?php echo display('Customer Name ') ?></td><td style="width:10px;">:</td><td calss="value"><?php echo $customer_name; ?></td></tr>
     <tr><td class="key"> <?php echo display('B/L No ') ?></td><td style="width:10px;">:</td><td calss="value"><?php  echo $all_invoice[0]['bl_no'] ; ?></td></tr>
    <tr><td  class="key"> <?php echo display('Payment Due date ') ?></td><td style="width:10px;">:</td><td calss="value"><?php  echo $all_invoice[0]['payment_due_date'] ; ?></td></tr>

    <tr><td  class="key"> <?php echo display('ETA ') ?></td><td style="width:10px;">:</td><td calss="value"><?php echo $all_invoice[0]['eta'] ; ?></td></tr>
       <tr><td  class="key"> <?php echo display('Shipping Address ') ?></td><td style="width:10px;">:</td><td calss="value" style="white-space: pre-wrap;"><?php  echo $all_invoice[0]['shipping_address'] ; ?> </td></tr>
    
</table>

                </div>
                <div class="col-6">
                <table id="two">
   <tr><td  class="key"> <?php echo display('Sales Invoice date ') ?></td><td style="width:10px;">:</td><td calss="value"><?php  echo $all_invoice[0]['date'] ; ?></td></tr>


 <tr><td  class="key"> <?php echo display('Container Number ') ?></td><td style="width:10px;">:</td><td calss="value"><?php  echo $container_no ; ?></td></tr>
    <tr><td  class="key"> <?php echo display('Payment Terms ') ?></td><td style="width:10px;">:</td><td calss="value"><?php  echo $payment_terms; ?></td></tr>
     <tr><td  class="key"> <?php echo display('ETD ') ?></td><td style="width:10px;">:</td><td calss="value"><?php  echo $all_invoice[0]['etd'] ; ?></td></tr>

   
   
<tr><td  class="key"> <?php echo display('Payment Type ') ?></td><td style="width:10px;">:</td><td calss="value"><?php  echo $paytype ; ?></td></tr>
     <tr><td  class="key"> <?php echo display('Billing Address') ?></td><td style="width:10px;">:</td><td calss="value" style="white-space: pre-wrap;"> <?php  echo $all_invoice[0]['billing_address'] ; ?></td></tr>

</table>
    </div>
            
        </div>     
        </div>

                <div class="body-section">
          <div class="table-responsive">
     
   <div id="content">
        <?php
        // $count='';
        // $list_count=array();
        // foreach($all_invoice as $inv){
        //     $count = substr($inv['tableid'], 0, 1);
        //  $items[] =$count   ;                            
                                      




        // }
  
  
        
?>
<?php 


for($m=1;$m<count($all_invoice);$m++){ 
    ?>
   <table class="table table-bordered normalinvoice table-hover" id="normalinvoice_<?php  echo $m; ?>" >
                <thead>
                    <tr>
                    <th rowspan="1"  class="text-centere">S.No</th>
                        <th rowspan="1" class="absorbing-column text-centere">Product Name</th>
                        <th rowspan="1" class="text-centere">Description</th>
                        <th rowspan="1" class="text-centere">Thick<br/>ness</th>
                        <th rowspan="1" class="text-centere">Bundle No</th>
                        <th rowspan="1" class="text-centere">Slab No</th>
                         <th colspan="2" class="text-centere">Net<br/> Measure<br/>Width&#9474;Height</th>
                           <th rowspan="1" class="text-centere">Net <br/>Sq. Ft</th>
                            <th rowspan="1"  class="text-centere">Sales<br/>Price<br/> per <br/>Sq. Ft</th>
                        <th rowspan="1"  class="text-centere">Sales <br/>Slab<br/> Price</th>
                          <th rowspan="1"  class="text-centere">Total</th>
                    </tr>
      
                </thead>
              <tbody id="addPurchaseItem_<?php echo $m;  ?>">
                                    <?php  $n=0; ?>
                                    <?php foreach($all_invoice as $inv){
                                        
                                      

$a = substr($inv['tableid'], 0, 1);
if($a==$m){
                                    
                                        ?>

                   <tr>
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
                                   

                                            </tfoot>
                            </table>
                            <?php   } ?>
       
<table border="0" class="overall table table-hover">
    <tr>
    <td  colspan="2" style="vertical-align:top;text-align:right;border:none;"><b><?php  echo display('Overall TOTAL');?> :</b></td>
        <td colspan="1" style="border:none;"><?php  echo $currency ; ?><?php echo $all_invoice[0]['total_amount']; ?> </td>
        
   
    <td style="text-align:right;border:none;" colspan="5"><b><?php echo  display('tax')." (".$tax_des;  ?></b>:</td>
                                 
                                 <td style='border:none;'><?php  echo $currency; ?><?php echo $tax_amt;  ?></td>
        

</tr>
   <tr>
        <td  colspan="2" style="vertical-align:top;text-align:right;border:none;"><b><?php  echo display('Overall Gross Sq.Ft');?> :</b></td>
        <td colspan="1" style="border:none;"><?php echo  $invoice_detail[0]['total_gross'];  ?></td>
         <td colspan="5" style="text-align:right;border:none;"><b><?php  echo display('GRAND TOTAL');?> :</b></td><td colspan="1" style="border:none;"><?php  echo $currency ; ?><?php  echo $all_invoice[0]['gtotal'];    ?></td>

</tr>
    <tr>
        <td  colspan="2" style="vertical-align:top;text-align:right;border:none;"><b>Overall Net Sq.Ft :</b></td>
        <td colspan="1" style="border:none;"><?php echo  $invoice_detail[0]['total_net'];  ?>   </td>
         <td colspan="5" style="text-align:right;border:none;"><b><?php  echo display('GRAND TOTAL');?> :</b><br/><b><?php  echo display('Preferred Currency');?></b></td><td colspan="1" style="border:none;"> <table><tr> <td class="cus" name="cus" style="border:none;"></td> <td style="border:none;text-align:left;"> <?php echo $customer_currency." ".$all_invoice[0]['gtotal_preferred_currency'] ;?></td></tr></table></td>
        
                      
                  
</tr>

    <tr>
        <td colspan="2"  style="vertical-align:top;text-align:right;border:none;"><b><?php  echo display('Overall Weight');?> :</b></td><td colspan="1" style="border:none;"><?php echo  $invoice_detail[0]['total_weight'];  ?> </td>
         <td colspan="5" class="amt" style="text-align:right;border:none;"><b><?php  echo display('Amount Paid');?> :</b></td><td style="border:none;"> 
                                        <table border="0">
      <tr class="amt">

        <td class="cus" name="cus" style="text-align:left;"></td>
<td>  <?php echo $customer_currency." ".$paid_amount ;?></td> 




     </tr>
   </table>
  </td>
                                            </tr> 
                                           <tr>
      <td colspan="2"  style="vertical-align:top;text-align:right;border:none;"></td><td colspan="1" style="border:none;"></td>
        <td class="amt" colspan="5"  style="vertical-align:top;text-align:right;border:none;"><b><?php echo display('balance_ammount');  ?> :</b></td>
        <td class="amt" style="border:none;" colspan="1">
            <table border="0">
      <tr class="amt">
        <td class="cus" name="cus" style="border:none;"></td>  <td style="border:none;">
                                          <?php echo $supplier_currency." ".$purchase_detail[0]['due_amount'];  ?>     
                                                <td style='border:none;'>
                                               
                                              <?php echo $customer_currency." ".$due_amount;?>
                                             
                                                </td>
                                                </tr> 
 </table>
            </table>
            <br>
            <th class="heading" style="font-size: 9px;"><b><?php echo display('Account Details/Additional Information') ?></b> : </th> </br><?php echo $all_invoice[0]['ac_details'];  ?>  <br/><br/>
            <th class="heading" style="font-size: 9px;"><b><?php echo display('Remarks/Conditions') ?>:</b> </th></br><?php  echo $all_invoice[0]['remark']; ?>  <br/><br/> 
</div>
        <?php 

}




elseif($template==1)
{
?>   <div class="brand-section">
<div class="row">


   


<div class="col-sm-4" style="color:white;font-weight:bold;" id='company_info'>
   
<b><?php echo display('Company name') ?> : </b><?php echo $company[0]['company_name']; ?><br>
          <b>  <?php echo display('Address ') ?>: </b><?php echo $company[0]['address']; ?><br>
          <b> <?php echo display('Email ') ?>: </b><?php echo $company[0]['email']; ?><br>
          <b>  <?php echo display('Contact ') ?>: </b><?php echo $company[0]['mobile']; ?><br>
       </div>


       <?php if(empty($header)){ ?>
  <div class="col-sm-5 text-center" style="color:white;"><h3><?php echo "SALE INVOICE"; ?></h3></div>
 <?php } 
else
{  ?>
  <div class="col-sm-5 text-center" style="color:white;"><h3><?php echo $header; ?></h3></div>
<?php } ?>




<div class="col-sm-3"><img src="<?php echo  base_url().$logo; ?>"   style='width: 70%;'  /></div>




</div>
     </div>




     <div class="body-section" >
            <div class="row">&nbsp; &nbsp;&nbsp; &nbsp;
            <div class="col-6">
            <table id="one" >
            <tr><td  class="key"> <?php echo display('Invoice Number') ?></td><td style="width:10px;">:</td><td calss="value"><?php  echo $all_invoice[0]['commercial_invoice_number'] ; ?></td></tr>

    <tr><td  class="key"> <?php echo display('Customer Name') ?></td><td style="width:10px;">:</td><td calss="value"><?php echo $customer_name; ?></td></tr>
     <tr><td class="key"> <?php echo display('B/L No') ?></td><td style="width:10px;">:</td><td calss="value"><?php  echo $all_invoice[0]['bl_no'] ; ?></td></tr>
    <tr><td  class="key"> <?php echo display('Payment Due date')?></td><td style="width:10px;">:</td><td calss="value"><?php  echo $all_invoice[0]['payment_due_date'] ; ?></td></tr>

    <tr><td  class="key"> <?php echo display('ETA') ?></td><td style="width:10px;">:</td><td calss="value"><?php echo $all_invoice[0]['eta'] ; ?></td></tr>
       <tr><td  class="key"> <?php echo display('Shipping Address') ?></td><td style="width:10px;">:</td><td calss="value" style="white-space: pre-wrap;"><?php  echo $all_invoice[0]['shipping_address'] ; ?> </td></tr>
    
</table>

                </div>
                <div class="col-6">
                <table id="two">
   <tr><td  class="key"> <?php echo display('Sales Invoice date') ?></td><td style="width:10px;">:</td><td calss="value"><?php  echo $all_invoice[0]['date'] ; ?></td></tr>


 <tr><td  class="key"> <?php echo display('Container Number') ?></td><td style="width:10px;">:</td><td calss="value"><?php  echo $container_no ; ?></td></tr>
    <tr><td  class="key"> <?php echo display('Payment Terms') ?></td><td style="width:10px;">:</td><td calss="value"><?php  echo $payment_terms; ?></td></tr>
     <tr><td  class="key"> <?php echo display('ETD') ?></td><td style="width:10px;">:</td><td calss="value"><?php  echo $all_invoice[0]['etd'] ; ?></td></tr>

   
   
<tr><td  class="key"> <?php echo display('Payment Type') ?></td><td style="width:10px;">:</td><td calss="value"><?php  echo $paytype ; ?></td></tr>
     <tr><td  class="key"> <?php echo display('Billing Address') ?></td><td style="width:10px;">:</td><td calss="value" style="white-space: pre-wrap;"> <?php  echo $all_invoice[0]['billing_address'] ; ?></td></tr>

</table>
    </div>
            
        </div>     
        </div>

                <div class="body-section">
          <div class="table-responsive">
     
   <div id="content">
        <?php
     
?>
<?php 


for($m=1;$m<count($all_invoice);$m++){ 
    ?>
   <table class="table table-bordered normalinvoice table-hover" id="normalinvoice_<?php  echo $m; ?>" >
                <thead>
                    <tr>
                    <th rowspan="1"  class="text-centere">S.No</th>
                        <th rowspan="1" class="absorbing-column text-centere">Product Name</th>
                        <th rowspan="1" class="text-centere">Description</th>
                        <th rowspan="1" class="text-centere">Thick<br/>ness</th>
                        <th rowspan="1" class="text-centere">Bundle No</th>
                        <th rowspan="1" class="text-centere">Slab No</th>
                         <th colspan="2" class="text-centere">Net<br/> Measure<br/>Width&#9474;Height</th>
                           <th rowspan="1" class="text-centere">Net <br/>Sq. Ft</th>
                            <th rowspan="1"  class="text-centere">Sales<br/>Price<br/> per <br/>Sq. Ft</th>
                        <th rowspan="1"  class="text-centere">Sales <br/>Slab<br/> Price</th>
                          <th rowspan="1"  class="text-centere">Total</th>
                    </tr>
                   
                </thead>
              <tbody id="addPurchaseItem_<?php echo $m;  ?>">
                                    <?php  $n=0; ?>
                                    <?php foreach($all_invoice as $inv){
                                        
                                      

$a = substr($inv['tableid'], 0, 1);
if($a==$m){
                                    
                                        ?>

                    <tr>
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
                  

                                            </tfoot>
                            </table>
                            <?php   } ?>
        
      
                            <table border="0" class="overall table table-hover">
    <tr>
    <td  colspan="2" style="vertical-align:top;text-align:right;border:none;"><b><?php  echo display('Overall TOTAL');?> :</b></td>
        <td colspan="1" style="border:none;"><?php  echo $currency ; ?><?php echo $all_invoice[0]['total_amount']; ?> </td>
        
   
    <td style="text-align:right;border:none;" colspan="5"><b><?php echo  display('tax')." (".$tax_des;  ?></b>:</td>
                                 
                                 <td style='border:none;'><?php  echo $currency; ?><?php echo $tax_amt;  ?></td>
        

</tr>
   <tr>
        <td  colspan="2" style="vertical-align:top;text-align:right;border:none;"><b><?php  echo display('Overall Gross Sq.Ft');?> :</b></td>
        <td colspan="1" style="border:none;"><?php echo  $invoice_detail[0]['total_gross'];  ?></td>
         <td colspan="5" style="text-align:right;border:none;"><b><?php  echo display('GRAND TOTAL');?> :</b></td><td colspan="1" style="border:none;"><?php  echo $currency ; ?><?php  echo $all_invoice[0]['gtotal'];    ?></td>

</tr>
    <tr>
        <td  colspan="2" style="vertical-align:top;text-align:right;border:none;"><b>Overall Net Sq.Ft :</b></td>
        <td colspan="1" style="border:none;"><?php echo  $invoice_detail[0]['total_net'];  ?>   </td>
         <td colspan="5" style="text-align:right;border:none;"><b><?php  echo display('GRAND TOTAL');?> :</b><br/><b><?php  echo display('Preferred Currency');?></b></td><td colspan="1" style="border:none;"> <table><tr> <td class="cus" name="cus" style="border:none;"></td> <td style="border:none;text-align:left;"> <?php echo $customer_currency." ".$all_invoice[0]['gtotal_preferred_currency'] ;?></td></tr></table></td>
        
                      
                  
</tr>

    <tr>
        <td colspan="2"  style="vertical-align:top;text-align:right;border:none;"><b><?php  echo display('Overall Weight');?> :</b></td><td colspan="1" style="border:none;"><?php echo  $invoice_detail[0]['total_weight'];  ?> </td>
         <td colspan="5" class="amt" style="text-align:right;border:none;"><b><?php  echo display('Amount Paid');?> :</b></td><td style="border:none;"> 
                                        <table border="0">
      <tr class="amt">

        <td class="cus" name="cus" style="text-align:left;"></td>
<td>  <?php echo $customer_currency." ".$paid_amount ;?></td> 




     </tr>
   </table>
  </td>
                                            </tr> 
                                           <tr>
      <td colspan="2"  style="vertical-align:top;text-align:right;border:none;"></td><td colspan="1" style="border:none;"></td>
        <td class="amt" colspan="5"  style="vertical-align:top;text-align:right;border:none;"><b><?php echo display('balance_ammount');  ?> :</b></td>
        <td class="amt" style="border:none;" colspan="1">
            <table border="0">
      <tr class="amt">
        <td class="cus" name="cus" style="border:none;"></td>  <td style="border:none;">
                                          <?php echo $supplier_currency." ".$purchase_detail[0]['due_amount'];  ?>     
                                                <td style='border:none;'>
                                               
                                              <?php echo $customer_currency." ".$due_amount;?>
                                             
                                                </td>
                                                </tr> 
 </table>
            </table>
            <br>
            <th class="heading" style="font-size: 9px;"><b><?php echo display('Account Details/Additional Information') ?></b> : </th> </br><?php echo $all_invoice[0]['ac_details'];  ?>  <br/><br/>
            <th class="heading" style="font-size: 9px;"><b><?php echo display('Remarks/Conditions') ?>:</b> </th></br><?php  echo $all_invoice[0]['remark']; ?>  <br/><br/> 
</div>
        <?php 

}






elseif($template==2)
{
?>
<div class="brand-section">
<div class="row">
       



<div class="col-sm-3"><img src="<?php echo  base_url().$logo; ?>"   style='width: 70%;'  /></div>



<?php if(empty($header)){ ?>
  <div class="col-sm-3 text-center" style="color:white;"><h3><?php echo "SALE INVOICE"; ?></h3></div>
 <?php } 
else
{  ?>
<div class="col-sm-3 text-center" style="color:white;     text-align: end;"><h3><?php echo $header; ?></h3></div>
<?php } ?>


<div class="col-sm-6" style="color:white;font-weight:bold ;text-align: end;" id='company_info'>          
<b><?php echo display('Company name') ?> : </b><?php echo $company[0]['company_name']; ?><br>
   <b>  <?php echo display('Address ') ?>: </b><?php echo $company[0]['address']; ?><br>
   <b> <?php echo display('Email ') ?>: </b><?php echo $company[0]['email']; ?><br>
   <b>  <?php echo display('Contact ') ?>: </b><?php echo $company[0]['mobile']; ?><br>
</div>







            </div>
        </div>


            <div class="body-section" >
            <div class="row">&nbsp; &nbsp;&nbsp; &nbsp;
            <div class="col-6">
            <table id="one" >
            <tr><td  class="key"> <?php echo display('Invoice Number') ?></td><td style="width:10px;">:</td><td calss="value"><?php  echo $all_invoice[0]['commercial_invoice_number'] ; ?></td></tr>

    <tr><td  class="key"> <?php echo display('Customer Name') ?></td><td style="width:10px;">:</td><td calss="value"><?php echo $customer_name; ?></td></tr>
     <tr><td class="key"> <?php echo display('B/L No') ?></td><td style="width:10px;">:</td><td calss="value"><?php  echo $all_invoice[0]['bl_no'] ; ?></td></tr>
    <tr><td  class="key"> <?php echo display('Payment Due date') ?></td><td style="width:10px;">:</td><td calss="value"><?php  echo $all_invoice[0]['payment_due_date'] ; ?></td></tr>

    <tr><td  class="key"> <?php echo display('ETA') ?></td><td style="width:10px;">:</td><td calss="value"><?php echo $all_invoice[0]['eta'] ; ?></td></tr>
       <tr><td  class="key"> <?php echo display('Shipping Address') ?></td><td style="width:10px;">:</td><td calss="value" style="white-space: pre-wrap;"><?php  echo $all_invoice[0]['shipping_address'] ; ?> </td></tr>
    
</table>

                </div>
                <div class="col-6">
                <table id="two">
   <tr><td  class="key"> <?php echo display('Sales Invoice date') ?></td><td style="width:10px;">:</td><td calss="value"><?php  echo $all_invoice[0]['date'] ; ?></td></tr>


 <tr><td  class="key"> <?php echo display('Container Number') ?></td><td style="width:10px;">:</td><td calss="value"><?php  echo $container_no ; ?></td></tr>
    <tr><td  class="key"> <?php echo display('Payment Terms') ?></td><td style="width:10px;">:</td><td calss="value"><?php  echo $payment_terms; ?></td></tr>
     <tr><td  class="key"> <?php echo display('ETD') ?></td><td style="width:10px;">:</td><td calss="value"><?php  echo $all_invoice[0]['etd'] ; ?></td></tr>

   
   
<tr><td  class="key"> <?php echo display('Payment Type') ?></td><td style="width:10px;">:</td><td calss="value"><?php  echo $paytype ; ?></td></tr>
     <tr><td  class="key"> <?php echo display('Billing Address') ?></td><td style="width:10px;">:</td><td calss="value" style="white-space: pre-wrap;"> <?php  echo $all_invoice[0]['billing_address'] ; ?></td></tr>

</table>
    </div>
            
        </div>     
        </div>

                <div class="body-section">
          <div class="table-responsive">
     
   <div id="content">
        <?php
        // $count='';
        // $list_count=array();
        // foreach($all_invoice as $inv){
        //     $count = substr($inv['tableid'], 0, 1);
        //  $items[] =$count   ;                            
                                      




        // }
  
  
        
?>
<?php 


for($m=1;$m<count($all_invoice);$m++){ 
    ?>
   <table class="table table-bordered normalinvoice table-hover" id="normalinvoice_<?php  echo $m; ?>" >
                <thead>
                    <tr>
                    <th rowspan="1"  class="text-centere">S.No</th>
                        <th rowspan="1" class="absorbing-column text-centere">Product Name</th>
                        <th rowspan="1" class="text-centere">Description</th>
                        <th rowspan="1" class="text-centere">Thick<br/>ness</th>
                        <th rowspan="1" class="text-centere">Bundle No</th>
                        <th rowspan="1" class="text-centere">Slab No</th>
                         <th colspan="2" class="text-centere">Net<br/> Measure<br/>Width&#9474;Height</th>
                           <th rowspan="1" class="text-centere">Net <br/>Sq. Ft</th>
                            <th rowspan="1"  class="text-centere">Sales<br/>Price<br/> per <br/>Sq. Ft</th>
                        <th rowspan="1"  class="text-centere">Sales <br/>Slab<br/> Price</th>
                          <th rowspan="1"  class="text-centere">Total</th>
                    </tr>
                    <!-- <tr>
                    <th  class="text-center"></th>
                                            <th  class="text-center"></th>    
                                            <th  class="text-center"></th>   
                                            <th  class="text-center"></th>   
                                            <th  class="text-center"></th>  
                                            <th  class="text-center"></th>  
                                             <th  class="text-center">Width </th>
                                            <th  class="text-center">Height</th>  
                                            <th  class="text-center"></th>   
                                            <th  class="text-center"></th>   
                                            <th  class="text-center"></th>  
                                            <th  class="text-center"></th> 
                                        </tr> -->
                </thead>
              <tbody id="addPurchaseItem_<?php echo $m;  ?>">
                                    <?php  $n=0; ?>
                                    <?php foreach($all_invoice as $inv){
                                        
                                      

$a = substr($inv['tableid'], 0, 1);
if($a==$m){
                                    
                                        ?>

                   <tr>
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
                    

                                            </tfoot>
                            </table>
                            <?php   } ?>
  

      
                            <table border="0" class="overall table table-hover">
    <tr>
    <td  colspan="2" style="vertical-align:top;text-align:right;border:none;"><b><?php  echo display('Overall TOTAL');?> :</b></td>
        <td colspan="1" style="border:none;"><?php  echo $currency ; ?><?php echo $all_invoice[0]['total_amount']; ?> </td>
        
   
    <td style="text-align:right;border:none;" colspan="5"><b><?php echo  display('tax')." (".$tax_des;  ?></b>:</td>
                                 
                                 <td style='border:none;'><?php  echo $currency; ?><?php echo $tax_amt;  ?></td>
        

</tr>
   <tr>
        <td  colspan="2" style="vertical-align:top;text-align:right;border:none;"><b><?php  echo display('Overall Gross Sq.Ft');?> :</b></td>
        <td colspan="1" style="border:none;"><?php echo  $invoice_detail[0]['total_gross'];  ?></td>
         <td colspan="5" style="text-align:right;border:none;"><b><?php  echo display('GRAND TOTAL');?> :</b></td><td colspan="1" style="border:none;"><?php  echo $currency ; ?><?php  echo $all_invoice[0]['gtotal'];    ?></td>

</tr>
    <tr>
        <td  colspan="2" style="vertical-align:top;text-align:right;border:none;"><b>Overall Net Sq.Ft :</b></td>
        <td colspan="1" style="border:none;"><?php echo  $invoice_detail[0]['total_net'];  ?>   </td>
         <td colspan="5" style="text-align:right;border:none;"><b><?php  echo display('GRAND TOTAL');?> :</b><br/><b><?php  echo display('Preferred Currency');?></b></td><td colspan="1" style="border:none;"> <table><tr> <td class="cus" name="cus" style="border:none;"></td> <td style="border:none;text-align:left;"> <?php echo $customer_currency." ".$all_invoice[0]['gtotal_preferred_currency'] ;?></td></tr></table></td>
        
                      
                  
</tr>

    <tr>
        <td colspan="2"  style="vertical-align:top;text-align:right;border:none;"><b><?php  echo display('Overall Weight');?> :</b></td><td colspan="1" style="border:none;"><?php echo  $invoice_detail[0]['total_weight'];  ?> </td>
         <td colspan="5" class="amt" style="text-align:right;border:none;"><b><?php  echo display('Amount Paid');?> :</b></td><td style="border:none;"> 
                                        <table border="0">
      <tr class="amt">

        <td class="cus" name="cus" style="text-align:left;"></td>
<td>  <?php echo $customer_currency." ".$paid_amount ;?></td> 




     </tr>
   </table>
  </td>
                                            </tr> 
                                           <tr>
      <td colspan="2"  style="vertical-align:top;text-align:right;border:none;"></td><td colspan="1" style="border:none;"></td>
        <td class="amt" colspan="5"  style="vertical-align:top;text-align:right;border:none;"><b><?php echo display('balance_ammount');  ?> :</b></td>
        <td class="amt" style="border:none;" colspan="1">
            <table border="0">
      <tr class="amt">
        <td class="cus" name="cus" style="border:none;"></td>  <td style="border:none;">
                                          <?php echo $supplier_currency." ".$purchase_detail[0]['due_amount'];  ?>     
                                                <td style='border:none;'>
                                               
                                              <?php echo $customer_currency." ".$due_amount;?>
                                             
                                                </td>
                                                </tr> 
 </table>
            </table>
            <br>
            <th class="heading" style="font-size: 9px;"><b><?php echo display('Account Details/Additional Information') ?></b> : </th> </br><?php echo $all_invoice[0]['ac_details'];  ?>  <br/><br/>
            <th class="heading" style="font-size: 9px;"><b><?php echo display('Remarks/Conditions') ?>:</b> </th></br><?php  echo $all_invoice[0]['remark']; ?>  <br/><br/> 
</div>
        <?php 

}

?>
        
    </div>   

    
    </section> <!-- /.content -->
</div> <!-- /.content-wrapper -->


<style>

.key{
    text-align:left;
font-weight:bold;

}
.value{
    text-align:left;
}
/* #one,#two{
float:left;
width:100%;
padding-right:4px;
} */
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
   background-color: #5961b3;
   padding: 10px 40px;
}
.logo{
    width: 50%;
}

.row{
    display: flex;
    flex-wrap: wrap;
    
}
.col-6{
    width: 48%;
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
    padding: 1px;
    border: 1px solid gray;
    
}
th{
    font-size: 15px;
    font-weight:bold;
}
.heading{
    font-size: 20px;
    margin-bottom: 08px;
}
.sub-heading{
    color: #262626;
    margin-bottom: 05px;
}
table{
    padding:10px;
   font-size:15px;
    /*background-color: #fff;*/
    width: 100%;
    border-collapse: collapse;
   
}

table thead tr{
    border: 1px solid #111;
    background-color: #5961b3;
   
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
    font-size:8px;
}
table th, table td {
    padding-top: 08px;
    padding-bottom: 08px;
}
.table-bordered{
    box-shadow: 0px 0px 5px 0.5px gray !important;
}
.table-bordered td, .table-bordered th {
    border: 1px solid black !important;
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
 
  border-radius: 8px;
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
    @media only print {
      
   
        .content-header{
             display:none;
        }
 
        footer, header, .sidebar {
            display:none;
        }
    }
@page {
    size: auto;
    size: A3;
    margin: 0mm;
}
#content{
    display:none;
}
@media print 
{ 

#content{display:block;} 
}
</style>

<div class="modal fade" id="myModal_sale" role="dialog" >
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="width: 500px;height:100px;text-align:center;margin-bottom: 300px;">
        <div class="modal-header" style="">
      
          <h4 class="modal-title"> <?php echo display('New Sale') ?></h4>
        </div>
        <div class="content">

        <div class="modal-body" style="text-align:center;font-weight:bold;">
          
          <h4> <?php echo display('New Sale Downloaded Successfully') ?></h4>
     
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


$(document).ready(function () {
printDiv('content')
});
function printDiv(elementId) {
    var a = document.getElementById('content').value;
    var b = document.getElementById(elementId).innerHTML;
    window.frames["print_frame"].document.title = document.title;
    window.frames["print_frame"].document.body.innerHTML = '<style> .key{ text-align:left; font-weight:bold;  }, .value{ text-align:left; }, #one,#two{ float:left; width:100%; }, body{ background-color: #fcf8f8; margin: 0; padding: 0; }, h1,h2,h3,h4,h5,h6{ margin: 0; padding: 0; }, p{ margin: 0; padding: 0; }, .heading_name{ font-weight: bold; }, .container{ width: 100%; margin-right: auto; margin-left: auto; margin-top: 50px; }, .brand-section{ background-color: #5961b3; padding: 10px 40px; }, .logo{ width: 50%; },  .row{ display: flex; flex-wrap: wrap;  }, .col-6{ width: 50%; flex: 0 0 auto;  }, .text-white{ color: #fff; }, .company-details{ float: right; text-align: right; },  .body-section{ padding: 1px; border: 1px solid gray;  }, .heading{ font-size: 20px; margin-bottom: 08px; }, .sub-heading{ color: #262626; margin-bottom: 05px; }, table{  background-color: #fff; width: 100%; border-collapse: collapse;  },  table thead tr{ border: 1px solid #111; background-color: #5961b3;  }, .table-bordered td{ text-align:center; }, table td { vertical-align: middle !important;  word-wrap: break-word; }, th{  }, table th, table td { padding-top: 08px; padding-bottom: 08px; }, .table-bordered{ box-shadow: 0px 0px 5px 0.5px gray !important; }, .table-bordered td, .table-bordered th { border: 1px solid #dee2e6 !important; }, .text-right{ text-align: right; }, .w-20{ width: 20%; }, .float-right{ float: right; }, @media only screen and (max-width: 600px) {  }, .modal { position: fixed; top: 0; left: 0; display: flex; width: 100%; height: 100vh; justify-content: center; align-items: center; opacity: 0; visibility: hidden; },  .modal .content { position: relative; padding: 10px;  border-radius: 8px; background-color: #fff; box-shadow: rgba(112, 128, 175, 0.2) 0px 16px 24px 0px; transform: scale(0); transition: transform 300ms cubic-bezier(0.57, 0.21, 0.69, 1.25); },  .modal .close { position: absolute; top: 5px; right: 5px; width: 30px; height: 30px; cursor: pointer; border-radius: 8px; background-color: #7080af; clip-path: polygon(0 10%, 10% 0, 50% 40%, 89% 0, 100% 10%, 60% 50%, 100% 90%, 90% 100%, 50% 60%, 10% 100%, 0 89%, 40% 50%); },  .modal.open { background-color:#38469f; opacity: 1; visibility: visible; }, .modal.open .content { transform: scale(1); }, .content-wrapper.blur { filter: blur(5px); }, .content { min-height: 0px; }</style>' + b;
    window.frames["print_frame"].window.focus();
    window.frames["print_frame"].window.print();
}
   </script>
   <script>
                        $(document).ready(function(){
                     
                     $(".normalinvoice").each(function(i,v){
                       if($(this).find("tbody").html().trim().length === 0){
                           $(this).hide()
                       }
                    });
                });
   </script>

