<!-- Purchase Payment Ledger Start -->
<div class="content-wrapper">
	<section class="content-header">

	</section>

	<!-- Invoice information -->
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

<div class="container" id="content">
<?php

   $myArray = explode('(',$tax); 
 $tax_amt=$myArray[0];
 $tax_des=$myArray[1];
 $tax_des=str_replace(")","%)", $tax_des);


            //////////////Design one///////////// 
            if($template==2)
            {
            ?>
        <div class="brand-section">
        <div class="row" >
     
        




       <div class="col-sm-2"><img src="<?php echo  $logo; ?>" style='width: 100%;'>
        
        </div>
    
    
      <?php if(empty($header)){ ?>
  <div class="col-sm-6 text-center" style="color:white;"><h3><?php echo "QUOTATION"; ?></h3></div>
 <?php } 
else
{  ?>
  <div class="col-sm-6 text-center" style="color:white;"><h3><?php echo $header; ?></h3></div>
<?php } ?>

    
    
    
    
    
    
      <div class="col-sm-4" style="color:white;font-weight:bold;" id='company_info'>
            
          <b> <?php echo display('Company name') ?> : </b><?php echo $cname; ?><br>
          <b>   <?php echo display('Address') ?> : </b><?php echo $address; ?><br>
          <b>   <?php echo display('Email') ?> : </b><?php echo $email; ?><br>
          <b>   <?php echo display('Contact') ?> : </b><?php echo $phone; ?><br>
        </div>





 </div>
        </div>

        <div class="body-section">
            <div class="row">
                <div class="col-6">
                <table id="one" cellspacing="0" cellpadding="0">
    <tr><td  class="key"><?php echo display('Date') ?></td><td style="width:10px;">:</td><td calss="value"><?php echo $purchase_date; ?></td></tr>
    <tr><td  class="key"><?php echo display('Invoice No') ?></td><td style="width:10px;">:</td><td calss="value"><?php echo $chalan_no;  ?></td></tr>
    <tr><td  class="key"><?php echo display('Pre Carriage') ?></td><td style="width:10px;">:</td><td calss="value">{pre_carriage}</td></tr>
    <tr><td  class="key"><?php echo display('Country of origin of goods') ?></td><td style="width:10px;">:</td><td calss="value"> <?php echo $country_goods;  ?></td></tr>
    <tr><td  class="key"><?php echo display('Port of loading') ?></td><td style="width:10px;">:</td><td calss="value"><?php echo $loading;  ?></td></tr>
    <tr><td  class="key"><?php echo display('Terms of payment and delivery') ?></td><td style="width:10px;">:</td><td calss="value"><?php echo $terms_payment;  ?></td></tr>
 
</table>

                </div>
                <div class="col-6">
                <table id="two" cellspacing="0" cellpadding="0">
<tr><td  class="key"><?php echo display('Buyer/Customer') ?> </td><td style="width:10px;">:</td><td calss="value"><?php echo $customer_name; ?></td></tr>
    <tr><td  class="key"><?php echo display('Place of Receipt') ?> </td><td style="width:10px;">:</td><td calss="value"><?php echo $receipt;  ?></td></tr>
    <tr><td  class="key"><?php echo display('Country of final destination') ?>  </td><td style="width:10px;">:</td><td calss="value">{country_destination}</td></tr>
    <tr><td  class="key"><?php echo display('Description of goods') ?>  </td><td style="width:10px;">:</td><td calss="value"><?php  echo  $description_goods ; ?></td></tr>
   
    <tr><td class="key"><?php echo display('Port of discharge') ?>  </td><td style="width:10px;">:</td><td calss="value"><?php echo $discharge;  ?></td></tr>
    
 
</table>
    </div>
            </div>
        </div>

      <div class="body-section">
       <div class="table-responsive">
     
<div id="table_content" style="padding:20px;">
        <?php
    //   /  print_r($purchase_info);
        $count='';
        $list_count=array();
        foreach($purchase_info as $inv){
            $count = substr($inv['tableid'], 0, 1);
         $items[] =$count   ;                            
                                      




        }
     
  
        
?>
<?php 


for($m=1;$m<count($purchase_info);$m++){ ?>
<table class="table normalinvoice table-bordered table-hover" id="normalinvoice_<?php  echo $m; ?>" style="width: -webkit-fill-available;">
            <thead>
                    <tr>
                    
                        <th rowspan="1" class="absorbing-column text-center">Product </br>Name</th>
                        <th rowspan="1" class="text-center">Description</th>
                        <th rowspan="1" class="text-center">Thick<br/>ness</th>
                        <th rowspan="1" class="text-center">Bundle No</th>
                        <th rowspan="1" class="text-center">Slab No</th>
                         <th colspan="2" class="text-center">Net<br/> Measure<br/>Width&#9474;Height</th>
                           <th rowspan="1" class="text-center">Net <br/>Sq. Ft</th>
                            <th rowspan="1"  class="text-center">Sales<br/>Price per Sq. Ft</th>
                        <th rowspan="1" class="text-center">Sales<br/> Slab Price</th>
                          <th rowspan="1"  class="text-center">Total</th>
                    </tr>
                    <tr>
                </thead>
              <tbody id="addPurchaseItem_<?php echo $m;  ?>">
                                    <?php  $n=0; ?>
                                    <?php foreach($purchase_info as $inv){
                                        
                                  

$a = substr($inv['tableid'], 0, 1);
//echo $a."-".$m."<br/>";
if($a==$m){
                                    
                                        ?>

                                    <tr>
                  
                       <td style="font-size: 9px;"><?php echo $inv['product_name'].'-'.$inv['product_model'];  ?></td>
                       <td style="font-size: 9px;"><?php echo $inv['description']; ?></td>
                       <td style="font-size: 9px;"><?php echo $inv['thickness'];  ?></td>
                         <td style="font-size: 9px;"><?php echo $inv['bundle_no']; ?></td>
                       <td style="font-size: 9px;"><?php echo $n+1; ?></td>
                       <td style="font-size: 9px;"><?php echo $inv['net_width']; ?></td>
                           <td style="font-size: 9px;"><?php echo $inv['net_height']; ?></td>
                             <td style="font-size: 9px;" class="net_sq_ft"><?php  echo $inv['net_sq_ft'];  ?></td>
                       <td style="font-size: 9px;"><?php echo $currency;   ?><?php echo $inv['sales_amt_sq_ft']; ?></td>
                       <td style="font-size: 9px;"><?php  echo $currency;  ?><?php  echo $inv['sales_slab_amt']; ?></td>
                       <td style="font-size: 9px;" >
                       <table><tr><td style=" font-size: 9px;border: none !important;">
                       <?php  echo $currency;  ?></td><td style=" font-size: 9px;text-align: left;border: none !important;"><input  type="text" class="total_price" style="border:none;width:80px;font-size: 9px;"   value="<?php  echo $inv['total_amount'];  ?>"  id="total_<?php  echo $m.$n; ?>"     name="total_amt[]"/></td>
</tr></table>
                    </tr>
                  
                    <?php $n++;}}  ?>
                    </tbody>
                  
                            </table>
                            <?php   } ?>
        
                            <table border="0" class="overall table table-hover">
    <tr>
    <td  colspan="2" style="vertical-align:top;text-align:right;border:none;"><b><?php  echo display('Overall TOTAL');?> :</b></td>
        <td colspan="1" style="border:none;"><?php  echo $currency; ?><?php echo $purchase_info[0]['total']; ?> </td>
        
   
    <td style="text-align:right;border:none;" colspan="5"><b><?php echo  display('tax')." (".$tax_des;  ?></b>:</td>
                                 
                                 <td style='border:none;'><?php  echo $currency; ?><?php echo $tax_amt;  ?></td>
        

</tr>
   <tr>
        <td  colspan="2" style="vertical-align:top;text-align:right;border:none;"><b><?php  echo display('Overall Gross Sq.Ft');?> :</b></td>
        <td colspan="1" style="border:none;"><?php echo  $purchase_info[0]['total_gross'];  ?></td>
         <td colspan="5" style="text-align:right;border:none;"><b><?php  echo display('GRAND TOTAL');?> :</b></td><td colspan="1" style="border:none;"><?php  echo $currency ; ?><?php  echo $purchase_info[0]['gtotal'];    ?></td>

</tr>
    <tr>
        <td  colspan="2" style="vertical-align:top;text-align:right;border:none;"><b>Overall Net Sq.Ft :</b></td>
        <td colspan="1" style="border:none;"><?php echo  $purchase_info[0]['total_net'];  ?>   </td>
<td colspan="5" style="text-align:right;border:none;"><b><?php  echo display('GRAND TOTAL');?> :</b><br/><b><?php  echo display('Preferred Currency');?></b></td><td colspan="1" style="border:none;"> <table><tr> <td class="cus" name="cus" style="border:none;"></td> <td style="border:none;text-align:left;"> <?php echo $customer_currency." ".$purchase_info[0]['customer_gtotal'] ;?> </td></tr></table></td> 

</tr>

    <tr>
        <td colspan="2"  style="vertical-align:top;text-align:right;border:none;"><b><?php  echo display('Overall Weight');?> :</b></td><td colspan="1" style="border:none;"><?php echo  $purchase_info[0]['total_weight'];  ?> </td>
         <td colspan="5" class="amt" style="text-align:right;border:none;"><b><?php  echo display('Amount Paid');?> :</b></td><td style="border:none;"> 
                                        <table border="0">
      <tr class="amt">

        <td class="cus" name="cus" style="text-align:left;"></td>
<td>  <?php echo $customer_currency." ".$purchase_info[0]['amt_paid']; ;?>  </td> 





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
        <?php echo $customer_currency." ".$purchase_info[0]['bal_amt'];?>
                                              


                                                </tr> 
 </table>
            </table>
            <br/>
    
            <h4><?php echo display('Account Details/Additional Information') ?> : </h4><?php  echo  $ac_details ; ?><br><br>

<h4><?php echo display('Remarks/Conditions') ?>: </h4><?php  echo  $remarks; ?><br><br>
        
            
        </div>
</div>
        
    </div>
    <?php 

}
elseif($template==1)
{
?>     
   <div class="brand-section">
   <div class="row">
      
    






   <div class="col-sm-4" style="color:white;font-weight:bold;" id='company_info'>
   
   <b>  <?php echo display('Company name') ?> : </b><?php echo $cname; ?><br>
  <b>   <?php echo display('Address') ?> : </b><?php echo $address; ?><br>
  <b>   <?php echo display('Email') ?> : </b><?php echo $email; ?><br>
  <b>   <?php echo display('Contact') ?> : </b><?php echo $phone; ?><br>
          </div>
   
   
          <?php if(empty($header)){ ?>
  <div class="col-sm-5 text-center" style="color:white;"><h3><?php echo "QUOTATION"; ?></h3></div>
 <?php } 
else
{  ?>
  <div class="col-sm-5 text-center" style="color:white;"><h3><?php echo $header; ?></h3></div>
<?php } ?>

    
   
   
   
   <div class="col-sm-3"><img src="<?php echo  $logo; ?>"   style='width: 70%;'  /></div>
   



  </div>
        </div>
        <div class="body-section">
            <div class="row">
                <div class="col-6">
                <table id="one" >
                <tr><td  class="key"><?php echo display('Date') ?></td><td style="width:10px;">:</td><td calss="value"><?php echo $purchase_date; ?></td></tr>
    <tr><td  class="key"><?php echo display('Invoice No') ?></td><td style="width:10px;">:</td><td calss="value"><?php echo $chalan_no;  ?></td></tr>
    <tr><td  class="key"><?php echo display('Pre Carriage') ?></td><td style="width:10px;">:</td><td calss="value">{pre_carriage}</td></tr>
    <tr><td  class="key"><?php echo display('Country of origin of goods') ?></td><td style="width:10px;">:</td><td calss="value"> <?php echo $country_goods;  ?></td></tr>
    <tr><td  class="key"><?php echo display('Port of loading') ?></td><td style="width:10px;">:</td><td calss="value"><?php echo $loading;  ?></td></tr>
    <tr><td  class="key"><?php echo display('Terms of payment and delivery') ?></td><td style="width:10px;">:</td><td calss="value"><?php echo $terms_payment;  ?></td></tr>
 
</table>

                </div>
                <div class="col-6">
                <table id="two" cellspacing="0" cellpadding="0">
<tr><td  class="key"><?php echo display('Buyer/Customer') ?></td><td style="width:10px;">:</td><td calss="value"><?php echo $customer_name; ?></td></tr>
    <tr><td  class="key"><?php echo display('Place of Receipt') ?></td><td style="width:10px;">:</td><td calss="value"><?php echo $receipt;  ?></td></tr>
    <tr><td  class="key"><?php echo display('Country of final destination') ?></td><td style="width:10px;">:</td><td calss="value">{country_destination}</td></tr>
    <tr><td  class="key"><?php echo display('Description of goods') ?> </td><td style="width:10px;">:</td><td calss="value"><?php  echo  $description_goods ; ?></td></tr>
    <tr><td class="key"><?php echo display('Port of discharge') ?></td><td style="width:10px;">:</td><td calss="value"><?php echo $discharge;  ?></td></tr>
    
 
</table>
    </div>
            </div>
        </div>

      <div class="body-section">
       <div class="table-responsive">
     
<div id="table_content" style="padding:20px;">
        <?php
    //   /  print_r($purchase_info);
        $count='';
        $list_count=array();
        foreach($purchase_info as $inv){
            $count = substr($inv['tableid'], 0, 1);
         $items[] =$count   ;                            
                                      




        }
     
  
        
?>
<?php 


for($m=1;$m<count($purchase_info);$m++){ ?>
<table class="table normalinvoice table-bordered table-hover" id="normalinvoice_<?php  echo $m; ?>" style="width: -webkit-fill-available;">
            <thead>
                    <tr>
                    
                        <th rowspan="1" class="absorbing-column text-center">Product </br>Name</th>
                        <th rowspan="1" class="text-center">Description</th>
                        <th rowspan="1" class="text-center">Thick<br/>ness</th>
                        <th rowspan="1" class="text-center">Bundle No</th>
                        <th rowspan="1" class="text-center">Slab No</th>
                         <th colspan="2" class="text-center">Net<br/> Measure<br/>Width&#9474;Height</th>
                           <th rowspan="1" class="text-center">Net <br/>Sq. Ft</th>
                            <th rowspan="1"  class="text-center">Sales<br/>Price per Sq. Ft</th>
                        <th rowspan="1" class="text-center">Sales<br/> Slab Price</th>
                          <th rowspan="1"  class="text-center">Total</th>
                    </tr>
                    <tr>
                </thead>
              <tbody id="addPurchaseItem_<?php echo $m;  ?>">
                                    <?php  $n=0; ?>
                                    <?php foreach($purchase_info as $inv){
                                        
                                  

$a = substr($inv['tableid'], 0, 1);
//echo $a."-".$m."<br/>";
if($a==$m){
                                    
                                        ?>

                                    <tr>
                  
                       <td style="font-size: 9px;"><?php echo $inv['product_name'].'-'.$inv['product_model'];  ?></td>
                       <td style="font-size: 9px;"><?php echo $inv['description']; ?></td>
                       <td style="font-size: 9px;"><?php echo $inv['thickness'];  ?></td>
                         <td style="font-size: 9px;"><?php echo $inv['bundle_no']; ?></td>
                       <td style="font-size: 9px;"><?php echo $n+1; ?></td>
                       <td style="font-size: 9px;"><?php echo $inv['net_width']; ?></td>
                           <td style="font-size: 9px;"><?php echo $inv['net_height']; ?></td>
                             <td style="font-size: 9px;" class="net_sq_ft"><?php  echo $inv['net_sq_ft'];  ?></td>
                       <td style="font-size: 9px;"><?php echo $currency;   ?><?php echo $inv['sales_amt_sq_ft']; ?></td>
                       <td style="font-size: 9px;"><?php  echo $currency;  ?><?php  echo $inv['sales_slab_amt']; ?></td>
                       <td style="font-size: 9px;" >
                       <table><tr><td style="font-size: 9px; border: none !important;">
                       <?php  echo $currency;  ?></td><td style=" font-size: 9px;text-align: left;border: none !important;"><input  type="text" class="total_price" style="border:none;width:80px;font-size: 9px;"   value="<?php  echo $inv['total_amount'];  ?>"  id="total_<?php  echo $m.$n; ?>"     name="total_amt[]"/></td>
</tr></table>
                    </tr>
                  
                    <?php $n++;}}  ?>
                    </tbody>
                   
                            </table>
                            <?php   } ?>
        
                            <table border="0" class="overall table table-hover">
    <tr>
    <td  colspan="2" style="vertical-align:top;text-align:right;border:none;"><b><?php  echo display('Overall TOTAL');?> :</b></td>
        <td colspan="1" style="border:none;"><?php  echo $currency; ?><?php echo $purchase_info[0]['total']; ?> </td>
        
   
    <td style="text-align:right;border:none;" colspan="5"><b><?php echo  display('tax')." (".$tax_des;  ?></b>:</td>
                                 
                                 <td style='border:none;'><?php  echo $currency; ?><?php echo $tax_amt;  ?></td>
        

</tr>
   <tr>
        <td  colspan="2" style="vertical-align:top;text-align:right;border:none;"><b><?php  echo display('Overall Gross Sq.Ft');?> :</b></td>
        <td colspan="1" style="border:none;"><?php echo  $purchase_info[0]['total_gross'];  ?></td>
         <td colspan="5" style="text-align:right;border:none;"><b><?php  echo display('GRAND TOTAL');?> :</b></td><td colspan="1" style="border:none;"><?php  echo $currency ; ?><?php  echo $purchase_info[0]['gtotal'];    ?></td>

</tr>
    <tr>
        <td  colspan="2" style="vertical-align:top;text-align:right;border:none;"><b>Overall Net Sq.Ft :</b></td>
        <td colspan="1" style="border:none;"><?php echo  $purchase_info[0]['total_net'];  ?>   </td>
<td colspan="5" style="text-align:right;border:none;"><b><?php  echo display('GRAND TOTAL');?> :</b><br/><b><?php  echo display('Preferred Currency');?></b></td><td colspan="1" style="border:none;"> <table><tr> <td class="cus" name="cus" style="border:none;"></td> <td style="border:none;text-align:left;"> <?php echo $customer_currency." ".$purchase_info[0]['customer_gtotal'] ;?> </td></tr></table></td> 

</tr>

    <tr>
        <td colspan="2"  style="vertical-align:top;text-align:right;border:none;"><b><?php  echo display('Overall Weight');?> :</b></td><td colspan="1" style="border:none;"><?php echo  $purchase_info[0]['total_weight'];  ?> </td>
         <td colspan="5" class="amt" style="text-align:right;border:none;"><b><?php  echo display('Amount Paid');?> :</b></td><td style="border:none;"> 
                                        <table border="0">
      <tr class="amt">

        <td class="cus" name="cus" style="text-align:left;"></td>
<td>  <?php echo $customer_currency." ".$purchase_info[0]['amt_paid']; ;?>  </td> 





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
        <?php echo $customer_currency." ".$purchase_info[0]['bal_amt'];?>
                                              


                                                </tr> 
 </table>
            </table>
            <br/>
    
            <h4><?php echo display('Account Details/Additional Information') ?> : </h4><?php  echo  $ac_details ; ?><br><br>

<h4><?php echo display('Remarks/Conditions') ?>: </h4><?php  echo  $remarks; ?><br><br>
        
            
        </div>
</div>
        
    </div>
    <?php 

}
elseif($template==3)
{
?>
<div class="brand-section">
<div class="row">
       
       
<?php if(empty($header)){ ?>
  <div class="col-sm-2 text-center" style="color:white;"><h3><?php echo "QUOTATION"; ?></h3></div>
 <?php } 
else
{  ?>
  <div class="col-sm-2 text-center" style="color:white;"><h3><?php echo $header; ?></h3></div>
<?php } ?>

    

<div class="col-sm-4"><img src="<?php echo  $logo; ?>"   style='width: 30%;float:right;'  /></div>



<div class="col-sm-6" style="color:white;font-weight:bold ;text-align: end;" id='company_info'>
   
<b>  <?php echo display('Company name') ?> : </b><?php echo $cname; ?><br>
  <b>   <?php echo display('Address') ?> : </b><?php echo $address; ?><br>
  <b>   <?php echo display('Email') ?> : </b><?php echo $email; ?><br>
  <b>   <?php echo display('Contact') ?> : </b><?php echo $phone; ?><br>
</div>





   </div>
        </div>

        <div class="body-section">
            <div class="row">
                <div class="col-6">
                <table id="one" >
                <tr><td  class="key"><?php echo display('Date') ?></td><td style="width:10px;">:</td><td calss="value"><?php echo $purchase_date; ?></td></tr>
    <tr><td  class="key"><?php echo display('Invoice No') ?></td><td style="width:10px;">:</td><td calss="value"><?php echo $chalan_no;  ?></td></tr>
    <tr><td  class="key"><?php echo display('Pre Carriage') ?></td><td style="width:10px;">:</td><td calss="value">{pre_carriage}</td></tr>
    <tr><td  class="key"><?php echo display('Country of origin of goods') ?></td><td style="width:10px;">:</td><td calss="value"> <?php echo $country_goods;  ?></td></tr>
    <tr><td  class="key"><?php echo display('Port of loading') ?></td><td style="width:10px;">:</td><td calss="value"><?php echo $loading;  ?></td></tr>
    <tr><td  class="key"><?php echo display('Terms of payment and delivery') ?></td><td style="width:10px;">:</td><td calss="value"><?php echo $terms_payment;  ?></td></tr>
 
</table>

                </div>
                <div class="col-6">
                <table id="two" cellspacing="0" cellpadding="0">
<tr><td  class="key"><?php echo display('Buyer/Customer') ?></td><td style="width:10px;">:</td><td calss="value"><?php echo $customer_name; ?></td></tr>
    <tr><td  class="key"><?php echo display('Place of Receipt') ?></td><td style="width:10px;">:</td><td calss="value"><?php echo $receipt;  ?></td></tr>
    <tr><td  class="key"><?php echo display('Country of final destination') ?></td><td style="width:10px;">:</td><td calss="value">{country_destination}</td></tr>
    <tr><td  class="key"><?php echo display('Description of goods') ?> </td><td style="width:10px;">:</td><td calss="value"><?php  echo  $description_goods ; ?></td></tr>
    <tr><td class="key"><?php echo display('Port of discharge') ?></td><td style="width:10px;">:</td><td calss="value"><?php echo $discharge;  ?></td></tr>
    
 
</table>
    </div>
            </div>
        </div>

      <div class="body-section">
       <div class="table-responsive">
     
<div id="table_content" style="padding:20px;">
        <?php
    //   /  print_r($purchase_info);
        $count='';
        $list_count=array();
        foreach($purchase_info as $inv){
            $count = substr($inv['tableid'], 0, 1);
         $items[] =$count   ;                            
                                      




        }
     
  
        
?>
<?php 


for($m=1;$m<count($purchase_info);$m++){ ?>
<table class="table normalinvoice table-bordered table-hover" id="normalinvoice_<?php  echo $m; ?>" style="width: -webkit-fill-available;">
            <thead>
                    <tr>
                    
                        <th rowspan="1" class="absorbing-column text-center">Product </br>Name</th>
                        <th rowspan="1" class="text-center">Description</th>
                        <th rowspan="1" class="text-center">Thick<br/>ness</th>
                        <th rowspan="1" class="text-center">Bundle No</th>
                        <th rowspan="1" class="text-center">Slab No</th>
                         <th colspan="2" class="text-center">Net<br/> Measure<br/>Width&#9474;Height</th>
                           <th rowspan="1" class="text-center">Net <br/>Sq. Ft</th>
                            <th rowspan="1"  class="text-center">Sales<br/>Price per Sq. Ft</th>
                        <th rowspan="1" class="text-center">Sales<br/> Slab Price</th>
                          <th rowspan="1"  class="text-center">Total</th>
                    </tr>
                    <tr>
                </thead>
              <tbody id="addPurchaseItem_<?php echo $m;  ?>">
                                    <?php  $n=0; ?>
                                    <?php foreach($purchase_info as $inv){
                                        
                                  

$a = substr($inv['tableid'], 0, 1);
//echo $a."-".$m."<br/>";
if($a==$m){
                                    
                                        ?>

                                    <tr>
                  
                       <td style="font-size: 9px;"><?php echo $inv['product_name'].'-'.$inv['product_model'];  ?></td>
                       <td style="font-size: 9px;"><?php echo $inv['description']; ?></td>
                       <td style="font-size: 9px;"><?php echo $inv['thickness'];  ?></td>
                         <td style="font-size: 9px;"><?php echo $inv['bundle_no']; ?></td>
                       <td style="font-size: 9px;"><?php echo $n+1; ?></td>
                       <td style="font-size: 9px;"><?php echo $inv['net_width']; ?></td>
                           <td style="font-size: 9px;"><?php echo $inv['net_height']; ?></td>
                             <td style="font-size: 9px;" class="net_sq_ft"><?php  echo $inv['net_sq_ft'];  ?></td>
                       <td style="font-size: 9px;"><?php echo $currency;   ?><?php echo $inv['sales_amt_sq_ft']; ?></td>
                       <td style="font-size: 9px;"><?php  echo $currency;  ?><?php  echo $inv['sales_slab_amt']; ?></td>
                       <td style="font-size: 9px;" >
                       <table><tr><td style="font-size: 9px; border: none !important;">
                       <?php  echo $currency;  ?></td><td style=" font-size: 9px;text-align: left;border: none !important;"><input  type="text" class="total_price" style="border:none;width:80px;font-size: 9px;"   value="<?php  echo $inv['total_amount'];  ?>"  id="total_<?php  echo $m.$n; ?>"     name="total_amt[]"/></td>
</tr></table>
                    </tr>
                  
                    <?php $n++;}}  ?>
                    </tbody>
                
                            </table>
                            <?php   } ?>
        
                            <table border="0" class="overall table table-hover">
    <tr>
    <td  colspan="2" style="vertical-align:top;text-align:right;border:none;"><b><?php  echo display('Overall TOTAL');?> :</b></td>
        <td colspan="1" style="border:none;"><?php  echo $currency; ?><?php echo $purchase_info[0]['total']; ?> </td>
        
   
    <td style="text-align:right;border:none;" colspan="5"><b><?php echo  display('tax')." (".$tax_des;  ?></b>:</td>
                                 
                                 <td style='border:none;'><?php  echo $currency; ?><?php echo $tax_amt;  ?></td>
        

</tr>
   <tr>
        <td  colspan="2" style="vertical-align:top;text-align:right;border:none;"><b><?php  echo display('Overall Gross Sq.Ft');?> :</b></td>
        <td colspan="1" style="border:none;"><?php echo  $purchase_info[0]['total_gross'];  ?></td>
         <td colspan="5" style="text-align:right;border:none;"><b><?php  echo display('GRAND TOTAL');?> :</b></td><td colspan="1" style="border:none;"><?php  echo $currency ; ?><?php  echo $purchase_info[0]['gtotal'];    ?></td>

</tr>
    <tr>
        <td  colspan="2" style="vertical-align:top;text-align:right;border:none;"><b>Overall Net Sq.Ft :</b></td>
        <td colspan="1" style="border:none;"><?php echo  $purchase_info[0]['total_net'];  ?>   </td>
<td colspan="5" style="text-align:right;border:none;"><b><?php  echo display('GRAND TOTAL');?> :</b><br/><b><?php  echo display('Preferred Currency');?></b></td><td colspan="1" style="border:none;"> <table><tr> <td class="cus" name="cus" style="border:none;"></td> <td style="border:none;text-align:left;"> <?php echo $customer_currency." ".$purchase_info[0]['customer_gtotal'] ;?> </td></tr></table></td> 

</tr>

    <tr>
        <td colspan="2"  style="vertical-align:top;text-align:right;border:none;"><b><?php  echo display('Overall Weight');?> :</b></td><td colspan="1" style="border:none;"><?php echo  $purchase_info[0]['total_weight'];  ?> </td>
         <td colspan="5" class="amt" style="text-align:right;border:none;"><b><?php  echo display('Amount Paid');?> :</b></td><td style="border:none;"> 
                                        <table border="0">
      <tr class="amt">

        <td class="cus" name="cus" style="text-align:left;"></td>
<td>  <?php echo $customer_currency." ".$purchase_info[0]['amt_paid']; ;?>  </td> 





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
        <?php echo $customer_currency." ".$purchase_info[0]['bal_amt'];?>
                                              


                                                </tr> 
 </table>
            </table>
            <br/>
    
            <h4><?php echo display('Account Details/Additional Information') ?> : </h4><?php  echo  $ac_details ; ?><br><br>

<h4><?php echo display('Remarks/Conditions') ?>: </h4><?php  echo  $remarks; ?><br><br>
        
            
        </div>
</div>
        
    </div>
    <?php  } ?>
    </div>
	</section>

<!-- Purchase ledger End  -->

<div class="modal fade" id="myModal_profarma" role="dialog" >
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="width: 500px;height:100px;text-align:center;margin-bottom: 300px;">
        <div class="modal-header" style="color:white;background-color:#38469f;">
      
          <h4 class="modal-title"><?php echo display('Sales - Profarma Invoice') ?></h4>
        </div>
        <div class="content">

        <div class="modal-body" style="text-align:center;font-weight:bold;">
          
          <h4><?php echo display('Profarma Invoice Downloaded Successfully') ?></h4>
     
        </div>
        <div class="modal-footer">
        </div>
        </div>
      </div>
      
    </div>
  </div>
    <style>
#content{
    padding:10px;
    display:none;
}
   
.key{
    text-align:left;
font-weight:bold;

}
.value{
    text-align:left;
}
#one,#two{
    border:none ;
float:left;
width:100%;
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
    width: 50%;
    flex: 0 0 auto;
   
}
.{
    color: #fff;
}
.company-details{
    float: right;
    text-align: right;
}

.body-section{
    padding: 16px;
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
  
    background-color: #5961b3;
   
}
.table-bordered td, .table-bordered th {
     border: 1px solid black !important; 
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
    font-size:9px;
}
table th, table td {
    padding-top: 08px;
    padding-bottom: 08px;
}
.table-bordered{
    box-shadow: 0px 0px 5px 0.5px gray !important;
    
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
#content{display:none;} 
    @media print 
{ 

#content{display:block;} 
}    
    </style>
    
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
var v=$(this).val();
  sum += parseFloat(v);

});

 $(this).closest('table').find('#Total_'+idt).val("<?php  echo $currency; ?>"+sum.toFixed(3));

  var sum_net=0;

 $('#normalinvoice_'+idt  +  '> tbody > tr').find('.net_sq_ft').each(function() {
var v=$(this).val();
  sum_net += parseFloat(v);

});

 $(this).closest('table').find('#overall_net_'+idt).val(sum_net.toFixed(3));


    });
});
$(document).ready(function () {
printDiv('content');

});
function printDiv(elementId) {
    var a = document.getElementById('content').value;
    var b = document.getElementById(elementId).innerHTML;
    window.frames["print_frame"].document.title = document.title;
    window.frames["print_frame"].document.body.innerHTML = '<style> .key{ text-align:left; font-weight:bold;  }, .value{ text-align:left; }, #one,#two{border:none; float:left; width:100%; }, body{ background-color: #fcf8f8; margin: 0; padding: 0; }, h1,h2,h3,h4,h5,h6{ margin: 0; padding: 0; }, p{ margin: 0; padding: 0; }, .heading_name{ font-weight: bold; }, .container{ width: 100%; margin-right: auto; margin-left: auto; margin-top: 50px; }, .brand-section{ background-color: #5961b3; padding: 10px 40px; }, .logo{ width: 50%; },  .row{ display: flex; flex-wrap: wrap;  }, .col-6{ width: 50%; flex: 0 0 auto;  }, .{ color: #fff; }, .company-details{ float: right; text-align: right; },  .body-section{ padding: 16px; border: 1px solid gray;  }, .heading{ font-size: 20px; margin-bottom: 08px; }, .sub-heading{ color: #262626; margin-bottom: 05px; }, table{  background-color: #fff; width: 100%; border-collapse: collapse;  },  table thead tr{ border: 1px solid #111; background-color: #5961b3;  }, .table-bordered td{ text-align:center; }, table td { vertical-align: middle !important;  word-wrap: break-word; }, th{  }, table th, table td { padding-top: 08px; padding-bottom: 08px; }, .table-bordered{ box-shadow: 0px 0px 5px 0.5px gray !important; }, .table-bordered td, .table-bordered th { border: 1px solid #dee2e6 !important; }, .text-right{ text-align: right; }, .w-20{ width: 20%; }, .float-right{ float: right; }, @media only screen and (max-width: 600px) {  }, .modal { position: fixed; top: 0; left: 0; display: flex; width: 100%; height: 100vh; justify-content: center; align-items: center; opacity: 0; visibility: hidden; },  .modal .content { position: relative; padding: 10px;  border-radius: 8px; background-color: #fff; box-shadow: rgba(112, 128, 175, 0.2) 0px 16px 24px 0px; transform: scale(0); transition: transform 300ms cubic-bezier(0.57, 0.21, 0.69, 1.25); },  .modal .close { position: absolute; top: 5px; right: 5px; width: 30px; height: 30px; cursor: pointer; border-radius: 8px; background-color: #7080af; clip-path: polygon(0 10%, 10% 0, 50% 40%, 89% 0, 100% 10%, 60% 50%, 100% 90%, 90% 100%, 50% 60%, 10% 100%, 0 89%, 40% 50%); },  .modal.open { background-color:#38469f; opacity: 1; visibility: visible; }, .modal.open .content { transform: scale(1); }, .content-wrapper.blur { filter: blur(5px); }, .content { min-height: 0px; }</style>' + b;
    window.frames["print_frame"].window.focus();
    window.frames["print_frame"].window.print();
}

   </script> 