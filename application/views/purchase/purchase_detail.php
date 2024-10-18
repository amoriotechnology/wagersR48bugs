
<style>
    .img {
  display: block;
  width:100%;
  margin: auto;
}
    .body-section{
        padding:0px;
        
    }
</style>
<div class="content-wrapper">
    <section class="content-header" >
 
    </section>
  <!-- Invoice information -->
  <?php
        $myArray = explode('(',$total_tax); 
       $tax_amt=$myArray[0];
       $tax_des=$myArray[1];
      
     
      ?>
      <div id="head"></div>
     <div class="container" id="content">
        <?php
 
    if($template==2)
    {
    ?>



<?php if(empty($header)){ ?>
         <div class="col-sm-4text-center" style="color:black;">
            <h3  style="text-align: center;padding:10px;" ><?php echo "EXPENSE INVOICE"; ?></h3>
         </div>
         <?php } 
            else
            {  ?>
                    <h3 style="text-align: center;color:black;padding:10px;" ><?php echo $header; ?></h3>

         <?php } ?>



 <div class="brand-section" style="background-color:<?php echo "#".$color; ?>">
<div class="row" >
     <div class='col-sm-1'></div>
 <div class="col-sm-2" style="margin-top:-40px;position: relative; text-align: center;">
            <img src="<?php echo base_url().$logo; ?>" style="width: 150%; position: absolute; top: 0; right: 0;" />
         </div>





 
  <div class="col-sm-4 text-center" style="color:white;"></div>
 






<div class="col-sm-5" style="color:white;font-weight:bold;" id='company_info'>
   
  <b> Company name : </b><?php echo $company_info[0]['company_name']; ?><br>
  <b>   Address : </b><?php echo $company_info[0]['address']; ?><br>
  <b>   Email : </b><?php echo $company_info[0]['email']; ?><br>
  <b>   Contact : </b><?php echo $company_info[0]['mobile']; ?><br>
</div>
</div>
</div>

        <div class="body-section" >
    <div class="row">
        <div class="col-sm-6">
         <table id="one" style="border:none;">
<tr><td  class="key"><?php echo display('Vendor');?></td><td >:</td><td calss="value"><?php echo $supplier_nam;  ?></td></tr>
<tr><td  class="key"><?php echo display('Vendor Type');?></td><td >:</td><td calss="value"><?php echo $vendor_type;  ?></td></tr>
<tr><td  class="key"><?php echo display('invoice_no');  ?></td><td >:</td><td calss="value"><?php echo $chalan_no;  ?></td></tr>
 <tr>
                     <td  class="key" style="font-weight:700;" >Account Category</td>
                     <td >:</td>
                     <td calss="value"><?php echo $account_category;  ?></td>
                  </tr>
                  
                
                  
                  <tr>
                     <td  class="key" style="font-weight:700;" >Account Subcategory</td>
                     <td >:</td>
                     <td calss="value"><?php echo $account_subcat;  ?></td>
                  </tr>
                  
<tr><td  class="key"><?php echo display('Payment Due Date');?></td><td >:</td><td calss="value"><?php echo $payment_due_date;  ?></td></tr>
<tr><td  class="key"><?php echo display('Payment Terms');?></td><td >:</td><td calss="value"><?php echo $payment_terms;  ?></td></tr>
<tr><td  class="key"><?php
        echo display('payment_type');
        ?></td><td >:</td><td calss="value"><?php echo $payment_type;  ?></td></tr>
        <tr><td  class="key"><?php echo display('B/L No');?></td><td >:</td><td calss="value"><?php echo $bl_number;  ?></td></tr>


<?php  if(!empty($isf_filling)) { ?>
<tr><td  class="key"><?php echo display('ISF NO');?></td><td >:</td><td calss="value"><?php echo $isf_filling;  ?></td></tr>

<?php   }  ?>

</table>

        </div>
        <div class="col-sm-6">
        <table id="two">
       
<tr><td  class="key"><?php echo display('Expenses / Bill date');?></td><td >:</td><td calss="value"><?php echo $final_date;  ?></td></tr>
<tr><td  class="key"><?php echo display('Container Number');?></td><td>:</td><td calss="value"><?php echo $container_no;  ?></td></tr>


<tr><td  class="key"><?php echo display('Port Of Discharge');?></td><td>:</td><td calss="value"><?php echo $Port_of_discharge;  ?></td></tr>
  <tr>
                     <td  class="key" style="font-weight:700;" >Account Subcategory</td>
                     <td >:</td>
                     <td calss="value"><?php echo $sub_category;  ?></td>
                  </tr>
<tr><td  class="key"><?php echo display('Estimated Time Of Depature');?></td><td >:</td><td calss="value"><?php echo $etd;  ?></td></tr>
<tr><td  class="key"><?php echo display('Estimated Time Of Arrival');?></td><td >:</td><td calss="value"><?php echo $eta;  ?></td></tr>
 <tr><td  class="key"><?php echo display('Vendor Address');?></td><td >:</td><td calss="value"><?php echo $address."-".$city ."<br/>".$state."-".$zip."-".$country ."<br/>".$primaryemail."-".$mobile ; ?></td></tr>

</table> </div> 
    </div>
</div>
 <div class="body-section" >
          <div class="table-responsive">
     
  

<?php 


for($m=1;$m<count($purchase_all_data);$m++){ 
    ?>
    <table class="table table-bordered normalinvoice table-hover" style="border:none;" id="normalinvoice_<?php  echo $m; ?>" >
            <thead style="background-color:<?php echo "#".$color; ?>">
                    <tr class="avoid-page-break ">
                    <!-- <th rowspan="1" style="border-style : hidden!important; class="text-center ">S.No</th> -->
                        <th rowspan="1" class="absorbing-column text-center " style="width:6px;">Product<br/> Name</th>
                        <th rowspan="1" class="text-center "style="width:4px;">Des<br/>crip<br/>tion</th>
                        <th rowspan="1" class="text-center "style="width:3px;">Thick<br/>ness</th>
                        <th rowspan="1" class="text-center "style="width:4px;">Supp<br/>lier<br/> Block<br/> No</th>
                        <th rowspan="1" class="text-center "style="width:4px;">Supp<br/>lier<br/>Slab<br/> No</th> 
                   
                        <th rowspan="1" class="text-center "style="width:5px;">Bun<br/>dle <br/>No</th>
                         <th rowspan="1" class="text-center "style="width:3px;">Slab No</th>
                         <th colspan="2" class="text-center "style="width:4px;">Net<br/> Mea<br/>sure<br/>Wth&#9474;Hght</th>
                            <th rowspan="1" class="text-center "style="width:6px;">Net Sq.Ft</th>
                            <th rowspan="1"  class="text-center "style="width:4px;">Cost<br/>per Sq.Ft</th>
                            <th rowspan="1" class="text-center"style="width:5px;">Cost <br/>per <br/>Slab</th>
                        <th rowspan="1"  class="text-center "style="width:2px;">Ori<br/>gin </th>
                        <th rowspan="1" style="width:5px;"  class="text-left ">Total</th>
                    </tr> 
<tr>

   </tr>
                </thead>
               <tbody id="addPurchaseItem_<?php echo $m;  ?>">
                                    <?php  $n=0; ?>
                                    <?php foreach($purchase_all_data as $inv){
                                        
                                      

$a = substr($inv['tableid'], 0, 1);
if($a==$m){
                                    
                                        ?>

                    <tr class="avoid-page-break" >
                  
                         <td style="font-size: 9px;"><?php echo $inv['product_name']; ?></td>
                       <td  class="aaa" style="font-size: 9px;"><?php echo $inv['description']; ?></td>
                       <td style="font-size: 9px;"><?php echo $inv['thickness']; ?></td>
                       <td style="font-size: 9px;"><?php echo $inv['supplier_block_no']; ?></td>
                       <td style="font-size: 9px;"><?php echo $inv['supplier_slab_no']; ?></td>
                     
                         <td style="font-size: 9px;"><?php echo $inv['bundle_no']; ?></td>
                 <td style="font-size: 9px;"><?php echo $n+1;?></td>
                   <td style="font-size: 9px;width:5px; text-align:center;"><?php echo $inv['net_width']?></td>
                           <td style="font-size: 9px;width:5px; text-align:center;"><?php echo  $inv['net_height']; ?></td>
                           
                         <td style="font-size: 9px;width:5px;" class="net_sq_ft"><?php  echo $inv['net_sq_ft'];  ?></td>
                      <td style="font-size: 9px;    text-align: center;"><?php  echo $currency ?><?php echo number_format($inv['cost_sq_ft'], 2) ;   ?></td>
                     <td style="font-size: 9px;    text-align: center;"><?php  echo $currency ; ?><?php echo number_format($inv['cost_sq_slab'], 2) ; ?></td>
                       <td style="font-size: 9px;"><?php echo $inv['origin']; ?></td>
                       <td style="font-size: 9px;" >            <table><tr><td class='total_price' style=" text-align: left;border: none !important;"><?php  echo $currency ; ?><?php echo number_format($inv['total'], 2) ; ?></td>
</tr></table></td> 
                    </tr>
                    <?php $n++;}}  ?>
                         
                            
                            <?php   } ?>
        
                            <table border="0" class="overall table table-hover" style="border:none;">
<tr  class="avoid-page-break" style="border:none;">

 <td colspan="2" style="text-align:left;border:none;"><b><?php  echo display('Overall TOTAL');?>  :</b></td><td style="border:none;"> <?php  echo $currency; ?><?php echo number_format($overall_total, 2) ;    ?> </td>
 <td style="text-align:right;border:none;" colspan="12"><b><?php echo  "Tax( ".$tax_des;  ?></b></td>
                         
                   <td  style="border:none;"><?php  echo $currency; ?><?php echo $tax_amt;  ?></td>
</tr>
<tr class="avoid-page-break" style="border:none;">
<td colspan="2"  style="vertical-align:top;text-align:left;border:none;"><b><?php  echo display('Overall Gross Sq.Ft');?> :</b></td><td style="border:none;" colspan="3"><?php echo  $purchase_all_data[0]['total_gross'];  ?></td>
<td style="text-align:right;border:none;" colspan="10"><b><?php  echo display('GRAND TOTAL');?> :</b></td>
                            <td style="border:none;">
     <?php  echo $currency; ?><?php echo $purchase_all_data[0]['grand_total_amount']; ?></span>
</td>
</tr>
                          
                            <tr class="avoid-page-break"  style="border:none;">
                                
                            <td colspan="2"  style="vertical-align:top;text-align:left;border:none;"><b><?php  echo display('Overall Net Sq.Ft');?> :</b></td><td style="border:none;" colspan="3"><?php echo  $purchase_all_data[0]['total_net'];  ?></td>
                            
                            <td style="text-align:right;border:none;"  colspan="10"><b><?php  echo display('GRAND TOTAL');?> :</br><b>(<?php  echo display('Preferred Currency');?>)</b></td>
                            <td style="border:none;">
  <table border="0">
<tr class="avoid-page-break" >

<td style=style="border:none;">    <?php echo $currency_type." ".$purchase_all_data[0]['gtotal_preferred_currency'] ;?></td>
  </tr>
  
</table>                               

                                    <input type="hidden" id="final_gtotal"  name="final_gtotal" />

                                    <input type="hidden" name="baseUrl" class="baseUrl" value="<?php echo base_url();?>"/></td>
                            </tr> 
<?php  //  if($all_invoice[0]['amt_paid'] !==''){   ?>
                                <tr  class="avoid-page-break" id="amt">
                               
                                        <td style="border:none;text-align:right;"  colspan="15"><b><?php  echo display('Amount Paid');?>:</b></td>
                                      
                                        <td style="border:none;">
                                   <?php echo $currency_type." ".$purchase_all_data[0]['paid_amount'] ;?>
                                   </td>

                                        
                                      
                                        </tr> 
                                        <tr class="avoid-page-break"  id="bal">
                                        <td style="border:none;text-align:right;"  colspan="15"><b><?php echo display('balance_ammount');  ?>:</b></td>
                                        <td style="border:none;">
                                       
                                      <?php echo $currency_type." ".$purchase_all_data[0]['balance'];?>
                                     
                                        </td>
                                        </tr> 
</table></table>
                           

                  
            <br>
<h4 class="avoid-page-break" ><?php echo  display('Remarks / Details');?> :</h4><?php echo $purchase_all_data[0]['remarks']; ?><br>
<h4 class="avoid-page-break" ><?php echo  display('Message on Invoice');?> :</h4><?php echo $purchase_all_data[0]['message_invoice']; ?>
<br><br>
        </div> </div>


        <?php  

}
elseif($template==1)
{
?>     

<?php if(empty($header)){ ?>
         <div class="col-sm-4text-center" style="color:black;">
            <h3  style="text-align: center;" ><?php echo "EXPENSES"; ?></h3>
         </div>
         <?php } 
            else
            {  ?>
                <h3 style="text-align: center;color:black;" ><?php echo $header; ?></h3>

         <?php } ?>


 <div class="brand-section" style="background-color:<?php echo "#".$color; ?>">
   <div class="row">
      

     <div class="col-sm-5" id='company_info' style="color:white;">
            
          <b>  Company name : </b><?php echo $company_info[0]['company_name']; ?><br>
          <b> Address : </b><?php echo $company_info[0]['address']; ?><br>
          <b>  Email : </b><?php echo $company_info[0]['email']; ?><br>
          <b>  Contact : </b><?php echo $company_info[0]['mobile']; ?><br>
        </div>
      
      
        <div class="col-sm-5"></div>
      
      
      
   <div class="col-sm-2" style="margin-top:-40px;position: relative; text-align: center;">
            <img src="<?php echo base_url().$logo; ?>" style="width: 150%; position: absolute; top: 0; right: 0;" />
         </div>
      
  </div>
        </div>
        <div class="body-section" >
    <div class="row">
        <div class="col-sm-6">
              <table id="one" style="border:none;">
<tr><td  class="key"><?php echo display('Vendor');?></td><td >:</td><td calss="value"><?php echo $supplier_nam;  ?></td></tr>
<tr><td  class="key"><?php echo display('Vendor Type');?></td><td >:</td><td calss="value"><?php echo $vendor_type;  ?></td></tr>
<tr><td  class="key"><?php echo display('invoice_no');  ?></td><td >:</td><td calss="value"><?php echo $chalan_no;  ?></td></tr>
 <tr>
                     <td  class="key" style="font-weight:700;" >Account Category</td>
                     <td >:</td>
                     <td calss="value"><?php echo $account_category;  ?></td>
                  </tr>
                  
                
                  
                  <tr>
                     <td  class="key" style="font-weight:700;" >Account Subcategory</td>
                     <td >:</td>
                     <td calss="value"><?php echo $account_subcat;  ?></td>
                  </tr>
                  
<tr><td  class="key"><?php echo display('Payment Due Date');?></td><td >:</td><td calss="value"><?php echo $payment_due_date;  ?></td></tr>
<tr><td  class="key"><?php echo display('Payment Terms');?></td><td >:</td><td calss="value"><?php echo $payment_terms;  ?></td></tr>
<tr><td  class="key"><?php
        echo display('payment_type');
        ?></td><td >:</td><td calss="value"><?php echo $payment_type;  ?></td></tr>
        <tr><td  class="key"><?php echo display('B/L No');?></td><td >:</td><td calss="value"><?php echo $bl_number;  ?></td></tr>


<?php  if(!empty($isf_filling)) { ?>
<tr><td  class="key"><?php echo display('ISF NO');?></td><td >:</td><td calss="value"><?php echo $isf_filling;  ?></td></tr>

<?php   }  ?>

</table>

        </div>
        <div class="col-sm-6">
        <table id="two">
       
<tr><td  class="key"><?php echo display('Expenses / Bill date');?></td><td >:</td><td calss="value"><?php echo $final_date;  ?></td></tr>
<tr><td  class="key"><?php echo display('Container Number');?></td><td>:</td><td calss="value"><?php echo $container_no;  ?></td></tr>


<tr><td  class="key"><?php echo display('Port Of Discharge');?></td><td>:</td><td calss="value"><?php echo $Port_of_discharge;  ?></td></tr>
  <tr>
                     <td  class="key" style="font-weight:700;" >Account Subcategory</td>
                     <td >:</td>
                     <td calss="value"><?php echo $sub_category;  ?></td>
                  </tr>
<tr><td  class="key"><?php echo display('Estimated Time Of Depature');?></td><td >:</td><td calss="value"><?php echo $etd;  ?></td></tr>
<tr><td  class="key"><?php echo display('Estimated Time Of Arrival');?></td><td >:</td><td calss="value"><?php echo $eta;  ?></td></tr>
 <tr><td  class="key"><?php echo display('Vendor Address');?></td><td >:</td><td calss="value"><?php echo $address."-".$city ."<br/>".$state."-".$zip."-".$country ."<br/>".$primaryemail."-".$mobile ; ?></td></tr>

</table> </div> 
    </div>
</div>
<div class="body-section" >
          <div class="table-responsive">
     
  

<?php 


for($m=1;$m<count($purchase_all_data);$m++){ 
    ?>
    <table class="table table-bordered normalinvoice table-hover" style="border:none;" id="normalinvoice_<?php  echo $m; ?>" >
            <thead style="background-color:<?php echo "#".$color; ?>">
                    <tr class="avoid-page-break ">
                    <!-- <th rowspan="1" style="border-style : hidden!important; class="text-center ">S.No</th> -->
                        <th rowspan="1" class="absorbing-column text-center " style="width:6px;">Product<br/> Name</th>
                        <th rowspan="1" class="text-center "style="width:4px;">Des<br/>crip<br/>tion</th>
                        <th rowspan="1" class="text-center "style="width:3px;">Thick<br/>ness</th>
                        <th rowspan="1" class="text-center "style="width:4px;">Supp<br/>lier<br/> Block<br/> No</th>
                        <th rowspan="1" class="text-center "style="width:4px;">Supp<br/>lier<br/>Slab<br/> No</th> 
                       <!--<th colspan="2"  class="text-center "style="width:6px;">Gross<br/> Mea<br/>sure<br/>ment<br/>Wth&#9474;Hght</th>-->
                       <!-- <th rowspan="1" class="text-center "style="width:5px;">Gross<br/>Sq.<br/>ft</th>-->
                        <th rowspan="1" class="text-center "style="width:5px;">Bun<br/>dle <br/>No</th>
                         <th rowspan="1" class="text-center "style="width:3px;">Slab No</th>
                         <th colspan="2" class="text-center "style="width:4px;">Net<br/> Mea<br/>sure<br/>Wth&#9474;Hght</th>
                           <th rowspan="1" class="text-center "style="width:6px;">Net Sq.Ft</th>
                            <th rowspan="1"  class="text-center "style="width:4px;">Cost<br/>per Sq.Ft</th>
                            <th rowspan="1" class="text-center"style="width:5px;">Cost <br/>per <br/>Slab</th>
                        <th rowspan="1"  class="text-center "style="width:2px;">Ori<br/>gin </th>
                          <th rowspan="1" style="width:5px;"  class="text-left ">Total</th>
                    </tr> 
<tr>

   </tr>
                </thead>
               <tbody id="addPurchaseItem_<?php echo $m;  ?>">
                                    <?php  $n=0; ?>
                                    <?php foreach($purchase_all_data as $inv){
                                        
                                      

$a = substr($inv['tableid'], 0, 1);
if($a==$m){
                                    
                                        ?>

                      <tr  class="avoid-page-break">
                    <!-- <td style="font-size: 10px;"><?php //echo $count; ?></td> -->
                         <td style="font-size: 9px;"><?php echo $inv['product_name']; ?></td>
                       <td  class="aaa" style="font-size: 9px;"><?php echo $inv['description']; ?></td>
                       <td style="font-size: 9px;"><?php echo $inv['thickness']; ?></td>
                       <td style="font-size: 9px;"><?php echo $inv['supplier_block_no']; ?></td>
                       <td style="font-size: 9px;"><?php echo $inv['supplier_slab_no']; ?></td>
                     
               
                     <!--  <td style="font-size: 9px;"><?php echo $inv['gross_width']; ?></td> -->
                     <!--<td style="font-size: 9px;"><?php echo $inv['gross_height']; ?></td> -->
                     <!--     <td style="font-size: 9px;" class="gross_sq_ft"><?php  echo $inv['gross_sq_ft_1'];  ?></td> -->
                  
                         <td style="font-size: 9px;"><?php echo $inv['bundle_no']; ?></td>
                  
                         <td style="font-size: 9px;"><?php echo $n+1;?></td>
                       <td style="font-size: 9px;width:5px; text-align:center;"><?php echo $inv['net_width']?></td>
                           <td style="font-size: 9px;width:5px;text-align:center;"><?php echo  $inv['net_height']; ?></td>
                            <td style="font-size: 9px;width:5px;" class="net_sq_ft"><?php  echo $inv['net_sq_ft'];  ?></td>
                     <td style="font-size: 9px;    text-align: center;"><?php  echo $currency ?><?php echo number_format($inv['cost_sq_ft'], 2) ;   ?></td>
                     <td style="font-size: 9px;    text-align: center;"><?php  echo $currency ; ?><?php echo number_format($inv['cost_sq_slab'], 2) ; ?></td>
                       <td style="font-size: 9px;"><?php echo $inv['origin']; ?></td>
                       <td style="font-size: 9px;" >            <table><tr><td class="total_price" style=" text-align: left;border: none !important;"><?php  echo $currency ; ?><?php echo number_format($inv['total'], 2) ; ?></td>
</tr></table></td> 
                    </tr>
                    <?php $n++;}}  ?>
                         
                            
                            <?php   } ?>
        
                                             <table border="0" class="overall table table-hover" style="border:none;">
<tr  class="avoid-page-break" style="border:none;">

 <td colspan="2" style="text-align:left;border:none;"><b><?php  echo display('Overall TOTAL');?>  :</b></td><td style="border:none;"> <?php  echo $currency; ?><?php echo number_format($overall_total, 2) ;    ?> </td>
 <td style="text-align:right;border:none;" colspan="12"><b><?php echo  "Tax( ".$tax_des;  ?></b></td>
                         
                   <td  style="border:none;"><?php  echo $currency; ?><?php echo $tax_amt;  ?></td>
</tr>
<tr  class="avoid-page-break" style="border:none;">
<td colspan="2"  style="vertical-align:top;text-align:left;border:none;"><b><?php  echo display('Overall Gross Sq.Ft');?> :</b></td><td style="border:none;" colspan="3"><?php echo  $purchase_all_data[0]['total_gross'];  ?></td>
<td style="text-align:right;border:none;" colspan="10"><b><?php  echo display('GRAND TOTAL');?> :</b></td>
                            <td style="border:none;">
     <?php  echo $currency; ?><?php echo $purchase_all_data[0]['grand_total_amount']; ?></span>
</td>
</tr>
                          
                            <tr class="avoid-page-break " style="border:none;">
                                
                            <td  class="avoid-page-break" colspan="2"  style="vertical-align:top;text-align:left;border:none;"><b><?php  echo display('Overall Net Sq.Ft');?> :</b></td><td style="border:none;" colspan="3"><?php echo  $purchase_all_data[0]['total_net'];  ?></td>
                            
                            <td style="text-align:right;border:none;"  colspan="10"><b><?php  echo display('GRAND TOTAL');?> :</br><b>(<?php  echo display('Preferred Currency');?>)</b></td>
                            <td style="border:none;">
  <table border="0">
<tr  class="avoid-page-break">

<td style="border:none;">    <?php echo $currency_type." ".$purchase_all_data[0]['gtotal_preferred_currency'] ;?></td>
  </tr>
  
</table>                               

                                    <input type="hidden" id="final_gtotal"  name="final_gtotal" />

                                    <input type="hidden" name="baseUrl" class="baseUrl" value="<?php echo base_url();?>"/></td>
                            </tr> 
<?php  //  if($all_invoice[0]['amt_paid'] !==''){   ?>
                                <tr id="amt"  class="avoid-page-break">
                               
                                        <td style="border:none;text-align:right;"  colspan="15"><b><?php  echo display('Amount Paid');?>:</b></td>
                                      
                                        <td style="border:none;">
                                   <?php echo $currency_type." ".$purchase_all_data[0]['paid_amount'] ;?>
                                   </td>

                                        
                                      
                                        </tr> 
                                        <tr  class="avoid-page-break" id="bal">
                                        <td style="border:none;text-align:right;"  colspan="15"><b><?php echo display('balance_ammount');  ?>:</b></td>
                                        <td style="border:none;">
                                       
                                      <?php echo $currency_type." ".$purchase_all_data[0]['balance'];?>
                                     
                                        </td>
                                        </tr> 
</table></table>
                           

                  
            <br>
<h4  class="avoid-page-break"><?php echo  display('Remarks / Details');?> :</h4><?php echo $purchase_all_data[0]['remarks']; ?><br>
<h4  class="avoid-page-break"><?php echo  display('Message on Invoice');?> :</h4><?php echo $purchase_all_data[0]['message_invoice']; ?>
<br><br>
        </div> </div>


        <?php   

}
elseif($template==3)
{
?>



    <div class="brand-section" style="background-color:<?php echo '#'. $color; ?>">
<div class="row" >




<?php if(empty($header)){ ?>
  <div class="col-sm-4 text-center" style="color:white;"><h3><?php echo "EXPENSE INVOICE"; ?></h3></div>
 <?php } 
else
{  ?>
             <h3 style="text-align: center;color:black;" ><?php echo $header; ?></h3>
<?php } ?>





  
<div class="col-sm-3" style='text-align:end;'><img src="<?php echo  base_url().$logo; ?>" class='img'> </div>


<div class="col-sm-5" style="color:white;font-weight:bold ; " id='company_info'>
  
<b> Company name : </b><?php echo $company_info[0]['company_name']; ?><br>
  <b>   Address : </b><?php echo $company_info[0]['address']; ?><br>
  <b>   Email : </b><?php echo $company_info[0]['email']; ?><br>
  <b>   Contact : </b><?php echo $company_info[0]['mobile']; ?><br>
</div>


    



</div>
</div>










        <div class="body-section" >
    <div class="row">
        <div class="col-sm-6">
            <table id="one" style="border:none;">
<tr><td  class="key"><?php echo display('Vendor');?></td><td >:</td><td calss="value"><?php echo $supplier_nam;  ?></td></tr>
<tr><td  class="key"><?php echo display('Vendor Type');?></td><td >:</td><td calss="value"><?php echo $vendor_type;  ?></td></tr>
<tr><td  class="key"><?php echo display('invoice_no');  ?></td><td >:</td><td calss="value"><?php echo $chalan_no;  ?></td></tr>
 <tr>
                     <td  class="key" style="font-weight:700;" >Account Category</td>
                     <td >:</td>
                     <td calss="value"><?php echo $account_category;  ?></td>
                  </tr>
                  
                
                  
                  <tr>
                     <td  class="key" style="font-weight:700;" >Account Subcategory</td>
                     <td >:</td>
                     <td calss="value"><?php echo $account_subcat;  ?></td>
                  </tr>
                  
<tr><td  class="key"><?php echo display('Payment Due Date');?></td><td >:</td><td calss="value"><?php echo $payment_due_date;  ?></td></tr>
<tr><td  class="key"><?php echo display('Payment Terms');?></td><td >:</td><td calss="value"><?php echo $payment_terms;  ?></td></tr>
<tr><td  class="key"><?php
        echo display('payment_type');
        ?></td><td >:</td><td calss="value"><?php echo $payment_type;  ?></td></tr>
        <tr><td  class="key"><?php echo display('B/L No');?></td><td >:</td><td calss="value"><?php echo $bl_number;  ?></td></tr>


<?php  if(!empty($isf_filling)) { ?>
<tr><td  class="key"><?php echo display('ISF NO');?></td><td >:</td><td calss="value"><?php echo $isf_filling;  ?></td></tr>

<?php   }  ?>

</table>

        </div>
        <div class="col-sm-6">
        <table id="two">
       
<tr><td  class="key"><?php echo display('Expenses / Bill date');?></td><td >:</td><td calss="value"><?php echo $final_date;  ?></td></tr>
<tr><td  class="key"><?php echo display('Container Number');?></td><td>:</td><td calss="value"><?php echo $container_no;  ?></td></tr>


<tr><td  class="key"><?php echo display('Port Of Discharge');?></td><td>:</td><td calss="value"><?php echo $Port_of_discharge;  ?></td></tr>
  <tr>
                     <td  class="key" style="font-weight:700;" >Account Subcategory</td>
                     <td >:</td>
                     <td calss="value"><?php echo $sub_category;  ?></td>
                  </tr>
<tr><td  class="key"><?php echo display('Estimated Time Of Depature');?></td><td >:</td><td calss="value"><?php echo $etd;  ?></td></tr>
<tr><td  class="key"><?php echo display('Estimated Time Of Arrival');?></td><td >:</td><td calss="value"><?php echo $eta;  ?></td></tr>
 <tr><td  class="key"><?php echo display('Vendor Address');?></td><td >:</td><td calss="value"><?php echo $address."-".$city ."<br/>".$state."-".$zip."-".$country ."<br/>".$primaryemail."-".$mobile ; ?></td></tr>

</table>
 </div> 
    </div>
</div>
<div class="body-section" >
          <div class="table-responsive">
     
  

<?php 


for($m=1;$m<count($purchase_all_data);$m++){ 
    ?>
    <table class="table table-bordered normalinvoice table-hover" style="border:none;" id="normalinvoice_<?php  echo $m; ?>" >
            <thead style="background-color:<?php echo "#".$color; ?>">
                    <tr>
                    <!-- <th rowspan="1" style="border-style : hidden!important; class="text-center ">S.No</th> -->
                        <th rowspan="1" class="absorbing-column text-center " style="width:6px;">Product<br/> Name</th>
                        <th rowspan="1" class="text-center "style="width:4px;">Des<br/>crip<br/>tion</th>
                        <th rowspan="1" class="text-center "style="width:3px;">Thick<br/>ness</th>
                        <th rowspan="1" class="text-center "style="width:4px;">Supp<br/>lier<br/> Block<br/> No</th>
                        <th rowspan="1" class="text-center "style="width:4px;">Supp<br/>lier<br/>Slab<br/> No</th> 
                       <!--<th colspan="2"  class="text-center "style="width:6px;">Gross<br/> Mea<br/>sure<br/>ment<br/>Wth&#9474;Hght</th>-->
                       <!-- <th rowspan="1" class="text-center "style="width:5px;">Gross<br/>Sq.<br/>ft</th>-->
                        <th rowspan="1" class="text-center "style="width:5px;">Bun<br/>dle <br/>No</th>
                         <th rowspan="1" class="text-center "style="width:3px;">Slab No</th>
                         <th colspan="2" class="text-center "style="width:4px;">Net<br/> Mea<br/>sure<br/>Wth&#9474;Hght</th>
                           <th rowspan="1" class="text-center "style="width:6px;">Net Sq.Ft</th>
                            <th rowspan="1"  class="text-center "style="width:4px;">Cost<br/>per Sq.Ft</th>
                            <th rowspan="1" class="text-center"style="width:5px;">Cost <br/>per <br/>Slab</th>
                        <th rowspan="1"  class="text-center "style="width:2px;">Ori<br/>gin </th>
                        <th rowspan="1" style="width:5px;"  class="text-left ">Total</th>
                    </tr> 
<tr>

   </tr>
                </thead>
               <tbody id="addPurchaseItem_<?php echo $m;  ?>">
                                    <?php  $n=0; ?>
                                    <?php foreach($purchase_all_data as $inv){
                                        
                                      

$a = substr($inv['tableid'], 0, 1);
if($a==$m){
                                    
                                        ?>

                    <tr class="avoid-page-break" >
                    <!-- <td style="font-size: 10px;"><?php //echo $count; ?></td> -->
                         <td style="font-size: 9px;"><?php echo $inv['product_name']; ?></td>
                       <td class="aaa" style="font-size: 9px;"><?php echo $inv['description']; ?></td>
                       <td style="font-size: 9px;"><?php echo $inv['thickness']; ?></td>
                       <td style="font-size: 9px;"><?php echo $inv['supplier_block_no']; ?></td>
                       <td style="font-size: 9px;"><?php echo $inv['supplier_slab_no']; ?></td>
                     
               
                     <!--  <td style="font-size: 9px;"><?php echo $inv['gross_width']; ?></td> -->
                     <!--<td style="font-size: 9px;"><?php echo $inv['gross_height']; ?></td> -->
                     <!--     <td style="font-size: 9px;" class="gross_sq_ft"><?php  echo $inv['gross_sq_ft_1'];  ?></td> -->
                  
                         <td style="font-size: 9px;"><?php echo $inv['bundle_no']; ?></td>
                  
                         <td style="font-size: 9px;"><?php echo $n+1;?></td>
                       <td style="font-size: 9px;width:5px;text-align:center; "><?php echo $inv['net_width']?></td>
                           <td style="font-size: 9px;width:5px;text-align:center; "><?php echo  $inv['net_height']; ?></td>
                            <td style="font-size: 9px;width:5px;" class="net_sq_ft"><?php  echo $inv['net_sq_ft'];  ?></td>
                   <td style="font-size: 9px;    text-align: center;"><?php  echo $currency ?><?php echo number_format($inv['cost_sq_ft'], 2) ;   ?></td>
                     <td style="font-size: 9px;    text-align: center;"><?php  echo $currency ; ?><?php echo number_format($inv['cost_sq_slab'], 2) ; ?></td>
                       <td style="font-size: 9px;"><?php echo $inv['origin']; ?></td>
                       <td style="font-size: 9px;" >            <table><tr><td class="total_price" style=" text-align: left;border: none !important;"> <?php  echo $currency ; ?><?php echo number_format($inv['total'], 2) ; ?></td>
</tr></table></td> 
                    </tr>
                    <?php $n++;}}  ?>
                         
                            
                            <?php   } ?>
        
                                                  <table border="0" class="overall table table-hover" style="border:none;">
<tr class="avoid-page-break"  style="border:none;">

 <td colspan="2" style="text-align:left;border:none;"><b><?php  echo display('Overall TOTAL');?>  :</b></td><td style="border:none;"> <?php  echo $currency; ?><?php echo number_format($overall_total, 2) ;  ?> </td>
 <td style="text-align:right;border:none;" colspan="12"><b><?php echo  "Tax( ".$tax_des;  ?></b></td>
                         
                   <td  style="border:none;"><?php  echo $currency; ?><?php echo $tax_amt;  ?></td>
</tr>
<tr class="avoid-page-break" style="border:none;">
<td colspan="2"  style="vertical-align:top;text-align:left;border:none;"><b><?php  echo display('Overall Gross Sq.Ft');?> :</b></td><td style="border:none;" colspan="3"><?php echo  $purchase_all_data[0]['total_gross'];  ?></td>
<td style="text-align:right;border:none;" colspan="10"><b><?php  echo display('GRAND TOTAL');?> :</b></td>
                            <td style="border:none;">
     <?php  echo $currency; ?><?php echo $purchase_all_data[0]['grand_total_amount']; ?></span>
</td>
</tr>
                          
                            <tr class="avoid-page-break" style="border:none;">
                                
                            <td colspan="2"  style="vertical-align:top;text-align:left;border:none;"><b><?php  echo display('Overall Net Sq.Ft');?> :</b></td><td style="border:none;" colspan="3"><?php echo  $purchase_all_data[0]['total_net'];  ?></td>
                            
                            <td style="text-align:right;border:none;"  colspan="10"><b><?php  echo display('GRAND TOTAL');?> :</br><b>(<?php  echo display('Preferred Currency');?>)</b></td>
                            <td style="border:none;">
  <table border="0">
<tr class="avoid-page-break" >

<td style=style="border:none;">    <?php echo $currency_type." ".$purchase_all_data[0]['gtotal_preferred_currency'] ;?></td>
  </tr>
  
</table>                               

                                    <input type="hidden" id="final_gtotal"  name="final_gtotal" />

                                    <input type="hidden" name="baseUrl" class="baseUrl" value="<?php echo base_url();?>"/></td>
                            </tr> 
<?php  //  if($all_invoice[0]['amt_paid'] !==''){   ?>
                                <tr class="avoid-page-break" id="amt">
                               
                                        <td style="border:none;text-align:right;"  colspan="15"><b><?php  echo display('Amount Paid');?>:</b></td>
                                      
                                        <td style="border:none;">
                                   <?php echo $currency_type." ".$purchase_all_data[0]['paid_amount'] ;?>
                                   </td>

                                        
                                      
                                        </tr> 
                                        <tr class="avoid-page-break" id="bal">
                                        <td style="border:none;text-align:right;"  colspan="15"><b><?php echo display('balance_ammount');  ?>:</b></td>
                                        <td style="border:none;">
                                       
                                      <?php echo $currency_type." ".$purchase_all_data[0]['balance'];?>
                                     
                                        </td>
                                        </tr> 
</table></table>
                           

                  
            <br>
<h4 class="avoid-page-break" ><?php echo  display('Remarks / Details');?> :</h4><?php echo $purchase_all_data[0]['remarks']; ?><br>
<h4 class="avoid-page-break" ><?php echo  display('Message on Invoice');?> :</h4><?php echo $purchase_all_data[0]['message_invoice']; ?>
<br><br>
        </div> </div>






      <?php   

}
elseif($template==4)
{
?>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/Invoice/style.css" />
















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
         <div class="col-sm-4 text-center" style="color:black;font-size: 16px;">
            <h3  style="text-align:start;" ><?php echo "EXPENSE INVOICE"; ?></h3>
         </div>
         <?php } 
            else
            {  ?>
 <div class="col-sm-4 text-center" style="color:black;">
            <h3  style="text-align:start;" ><?php echo $header; ?></h3>
         </div>
         <?php } ?>
          <div class="col-sm-4"></div>
        </div> 
        </div>







<br>


                         
                            
                            
                            <div class="row"  style="text-align: center;" >
     
 
   <div class="col-sm-3" style='margin-top:-50px;'><img src="<?php echo  base_url().$logo; ?>"   style='width: 100%;'  /></div>

 
<div class="col-sm-5 text-center" style="color:white;"><h3 style="text-align:center;" ></div>



 <div class="col-sm-4"  style="text-align:start" id='company_info'>
 <h2 class="name" style="font-size: 15px;"><?php echo display('invoice_no');  ?>: <?php  echo $chalan_no; ?></h2>
 <p class="mb-0"><?php echo  ('Expenses/Bill date');?>:<span><?php  echo $final_date; ?></span></p>                              
     </div>  

  </div>

                            
                            <hr>
                            
                            <div class="invoice-top">
                                <div class="row">
                                    <div class="col-md-4 mb-30">
                                        <div class="invoice-number">
                                            <h4 class="inv-title-1" style="font-weight:bold;color:<?php echo "#".$color; ?> "><?php echo display('Vendor');?></h4>
                                            <h2 class="name mb-10"><?php echo $supplier_nam; ?></h2>
                                            <p class="invo-addr-1 mb-0">
                                            <?php echo $address."-".$city ."<br/>".$state."-".$zip."-".$country ."<br/>".$primaryemail."-".$mobile ; ?>                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-30">
                                        <div class="invoice-number">
                                            <div class="invoice-number-inner">
                                                <h4 class="inv-title-1" style="font-weight:bold;color:<?php echo "#".$color; ?> "></h4>
                                                <h2 class="name mb-10"><?php //echo $customer_name; ?></h2>
                                                <p class="invo-addr-1 mb-0">
                                                    <?php /// echo $all_invoice[0]['shipping_address'] ; ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-30 invoice-contact-us">
                                        <h4 class="inv-title-1" style="font-weight:bold;color:<?php echo "#".$color; ?> ">Company Information</h4>
                                        <h2 class="name mb-10"></h2>
                                        <ul class="link">
                                          
                                              
                                            <li>
                                                <i class="fas fa-building"  ></i> <?php echo $company_info[0]['company_name']; ?>
                                            </li>
                                          
                                          
                                          
                                            <li>
                                                <i class="fa fa-map-marker"></i> <?php echo $company_info[0]['address']; ?>
                                            </li>
                                            <li>
                                                <i class="fa fa-envelope"></i> <a href="<?php echo $company_info[0]['email']; ?>"><?php echo $company_info[0]['email']; ?></a>
                                            </li>
                                            <li>
                                                <i class="fa fa-phone"></i> <a href="tel:+55-417-634-7071"><?php echo $company_info[0]['mobile']; ?></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>


 

                             <div class="invoice-center">
                                <div class="order-summary">
                                    <div class="table-outer">
                                        <table class="default-table invoice-table" border="1" cellpadding="0" cellspacing="0">
                                            <thead  style="background-color:<?php  echo  $color; ?>;color:black;">
                                            <tr>
                                                <th><?php echo display('Vendor Type');?></th>
                                                <th><?php echo display('B/L No');?></th>
                                                <th><?php echo display('Container Number');?></th>
                                                <th><?php echo display('Port Of Discharge');?></th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            <tr style="text-align:center;">
                                                <td><?php  echo $vendor_type; ?></td>
                                                <td><?php  echo $bl_number ; ?></td>
                                                <td><?php  echo $container_no; ?></td>
                                                <td><?php echo $Port_of_discharge; ?></td>
                                            </tr>
                                           
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>


 

                             <div class="invoice-center">
                                <div class="order-summary">
                                    <div class="table-outer">
                                        <table class="default-table invoice-table" border="1" cellpadding="0" cellspacing="0">
                                            <thead  style="background-color:<?php  echo  $color; ?>;color:black;">
                                            <tr>
                                                <th style="width:15px;" ><?php echo display('Estimated Time Of Depature');?></th>
                                                <th style="width:10px;" ><?php echo display('Estimated Time Of Arrival');?></th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            <tr style="text-align:center;">
                                                <td><?php  echo $etd; ?></td>
                                                <td><?php  echo $eta ; ?></td>
                                          
                                            </tr>
                                           
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>




                            <div class="invoice-center">
                                <div class="order-summary">
                                    <div class="table-outer">
                                      <?php 


for($m=1;$m<count($purchase_all_data);$m++){ 
  ?>
  <table class="table table-bordered normalinvoice table-hover" style="border:none;" id="normalinvoice_<?php  echo $m; ?>" >
          <thead style="background-color:<?php echo "#".$color; ?>">
                  <tr class="avoid-page-break">
                  <!-- <th rowspan="1" style="border-style : hidden!important; class="text-center ">S.No</th> -->
                      <th rowspan="1" class="absorbing-column text-center text-white" style="width:6px;">Product<br/> Name</th>
                      <th rowspan="2" class="text-center text-white"style="width:4px;">Des<br/>crip<br/>tion</th>
                      <th rowspan="1" class="text-center text-white "style="width:3px;">Thick<br/>ness</th>
                      <th rowspan="1" class="text-center text-white"style="width:4px;">Supp<br/>lier<br/> Block<br/> No</th>
                      <th rowspan="1" class="text-center text-white"style="width:4px;">Supp<br/>lier<br/>Slab<br/> No</th> 
                     <!--<th colspan="2"  class="text-center text-white"style="width:6px;">Gross<br/> Mea<br/>sure<br/>ment<br/>Wth&#9474;Hght</th>-->
                     <!-- <th rowspan="1" class="text-center text-white"style="width:5px;">Gross<br/>Sq.<br/>ft</th>-->
                      <th rowspan="1" class="text-center text-white"style="width:4px;">Bun<br/>dle <br/>No</th>
                       <th rowspan="1" class="text-center text-white"style="width:3px;">Slab No</th>
                       
                       
                       <th colspan="2"   class="text-center text-white" >Net<br/>Measure<br/>Wth&#9474;Hght</th>
                          <th rowspan="1" class="text-center text-white"style="width:4px;">Net Sq.Ft</th>
                          
                           <!-- <th colspan="2" style="width:10px;" class="text-center ">Net<br/> Measure<br/>Width&#9474;Height</th>-->
                           <!--<th rowspan="1" class="text-center ">Net <br/>Sq. Ft</th>-->
                          
                          <th rowspan="1"  class="text-center text-white"style="width:4px;">Cost<br/>per Sq.Ft</th>
                          <th rowspan="1" class="text-center text-white"style="width:5px;">Cost <br/>per <br/>Slab</th>
                      <th rowspan="1"  class="text-center text-white"style="width:3px;">Origin </th>
                        <th rowspan="1" style="width:5px !important;"  class="text-center text-white">Total</th>
                  </tr> 
<tr>

 </tr>
              </thead>
             <tbody id="addPurchaseItem_<?php echo $m;  ?>">
                                  <?php  $n=0; ?>
                                  <?php foreach($purchase_all_data as $inv){
                                      
                                    

$a = substr($inv['tableid'], 0, 1);
if($a==$m){
                                  
                                      ?>

                  <tr class="avoid-page-break" >
                  <!-- <td style="font-size: 10px;"><?php //echo $count; ?></td> -->
                       <td style="font-size: 9px;text-align: center;"><?php echo $inv['product_name']; ?></td>
                     <td style="font-size: 9px;text-align: center;"><?php echo $inv['description']; ?></td>
                     <td style="font-size: 9px;text-align: center;"><?php echo $inv['thickness']; ?></td>
                     <td style="font-size: 9px;text-align: center;"><?php echo $inv['supplier_block_no']; ?></td>
                     <td style="font-size: 9px;text-align: center;"><?php echo $inv['supplier_slab_no']; ?></td>
                   
             
                   <!--  <td style="font-size: 9px;    text-align: center;"><?php echo $inv['gross_width']; ?></td> -->
                   <!--<td style="font-size: 9px;    text-align: center;"><?php echo $inv['gross_height']; ?></td> -->
                   <!--     <td style="font-size: 9px;    text-align: center;" class="gross_sq_ft"><?php  echo $inv['gross_sq_ft_1'];  ?></td> -->
                
                          <td style="font-size: 9px;    text-align: center;"><?php echo $inv['bundle_no']; ?></td>
                
                          <td style="font-size: 9px;    text-align: center;"><?php echo $n+1;?></td>
                          
                          <td style="font-size: 9px;width:5px;    text-align: center;"><?php echo $inv['net_width']?></td>
                          <td style="font-size: 9px; width:5px;    text-align: center;"><?php echo  $inv['net_height']; ?></td>
                          <td style="font-size: 9px;    text-align: center;width:5px;" class="net_sq_ft"><?php  echo $inv['net_sq_ft'];  ?></td>
                          
                            <!-- <td class="text-center "  style="" class="net_width"><?php  echo $inv['net_width'];  ?></td>-->
                            <!--<td class="text-center " class="net_height"><?php  echo $inv['net_height'];  ?></td>-->
                            <!--<td class="text-center "  class="net_sq_ft"> <?php  echo $inv['net_sq_ft'];  ?></td>-->
                          
                     <td style="font-size: 9px;    text-align: center;"><?php  echo $currency ?><?php echo number_format($inv['cost_sq_ft'], 2) ;   ?></td>
                     <td style="font-size: 9px;    text-align: center;"><?php  echo $currency ; ?><?php echo number_format($inv['cost_sq_slab'], 2) ; ?></td>
                     <td style="font-size: 9px;    text-align: center;"><?php echo $inv['origin']; ?></td>
                     <td style="font-size: 9px;    text-align: center;" >            <table><tr style="border:none;"><td class="total_price" style=" text-align: center;border: none !important;"><?php  echo $currency ; ?><?php echo number_format($inv['total'], 2) ; ?></td>
</tr></table></td> 
                  </tr>
                  <?php $n++;}}  ?>
                       
                          
                          <?php   } ?>
      
                          <table border="0" class="overall table table-hover" style="border:none;">
<tr class="avoid-page-break"  style="border:none;">

<td colspan="2" style="text-align:left;border:none;"><b><?php  echo display('Overall TOTAL');?>  :</b></td><td style="border:none;text-align: initial;"> <?php  echo $currency; ?><?php echo number_format($overall_total, 2) ;  ?> </td>
<td style="text-align:right;border:none;" colspan="12"><b><?php echo  "Tax( ".$tax_des;  ?>:</b></td>
                       
                 <td  style="border:none;    text-align: initial;"><?php  echo $currency; ?><?php echo $tax_amt;  ?></td>
</tr>
<!--<tr style="border:none;">-->
<!--<td colspan="2"  style="vertical-align:top;text-align:left;border:none;"><b><?php  echo display('Overall Gross Sq.Ft');?> :</b></td><td style="border:none;    text-align: initial;" colspan="3"><?php echo  $purchase_all_data[0]['total_gross'];  ?></td>-->




  <tr  class="avoid-page-break" id="amt" style="border:none;">
                             
                                      <td style="border:none;text-align:right;"  colspan="15"><b><?php  echo display('GRAND TOTAL');?> :</b></td>
                                    
                          <td style="border:none;    text-align: initial;">
   <?php  echo $currency; ?><?php echo $purchase_all_data[0]['grand_total_amount']; ?></span>
                                 </td>

                                      
                                    
                                      </tr> 




<!--<td style="text-align:right;border:none;" colspan="10"><b><?php  echo display('GRAND TOTAL');?> :</b></td>-->
<!--                          <td style="border:none;    text-align: initial;">-->
<!--   <?php  echo $currency; ?><?php echo $purchase_all_data[0]['grand_total_amount']; ?></span>-->
<!--</td>-->
<!--</tr>-->
                        
                          <tr class="avoid-page-break"  style="border:none;">
                              
                          <td colspan="2"  style="vertical-align:top;text-align:left;border:none;"><b><?php  echo display('Overall Net Sq.Ft');?> :</b></td><td style="border:none;    text-align: initial;" colspan="3"><?php echo  $purchase_all_data[0]['total_net'];  ?></td>
                          
                          <td style="text-align:right;border:none;"  colspan="10"><b><?php  echo display('GRAND TOTAL');?> :</br><b>(<?php  echo display('Preferred Currency');?>)</b></td>
                          <td style="border:none;">
<table border="0">
<tr class="avoid-page-break" style="border:none;">

<td style="border:none;    text-align: initial;">    <?php echo $currency_type." ".$purchase_all_data[0]['gtotal_preferred_currency'] ;?></td>
</tr>

</table>                               

                                  <input type="hidden" id="final_gtotal"  name="final_gtotal" />

                                  <input type="hidden" name="baseUrl" class="baseUrl" value="<?php echo base_url();?>"/></td>
                          </tr> 
<?php  //  if($all_invoice[0]['amt_paid'] !==''){   ?>
                              <tr class="avoid-page-break" id="amt" style="border:none;">
                             
                                      <td style="border:none;text-align:right;"  colspan="15"><b><?php  echo display('Amount Paid');?>:</b></td>
                                    
                                      <td style="border:none;text-align: initial;">
                                 <?php echo $currency_type." ".$purchase_all_data[0]['paid_amount'] ;?>
                                 </td>

                                      
                                    
                                      </tr> 
                                      <tr class="avoid-page-break" id="bal" style="border:none;">
                                      <td style="border:none;text-align:right;"  colspan="15"><b><?php echo display('balance_ammount');  ?>:</b></td>
                                      <td style="border:none;    text-align: initial;">
                                     
                                    <?php echo $currency_type." ".$purchase_all_data[0]['balance'];?>
                                   
                                      </td>
                                      </tr> 
</table></table>
                                    </div>
                                </div>
                            </div>
                            
                             <div class="invoice-bottom">
                                <div class="row">
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                        <div class="avoid-page-break terms-conditions mb-30">
                                            <h3 class="inv-title-1 mb-10 avoid-page-break" style="font-size: 18px;font-weight:bold;"><?php echo  display('Message on Invoice');?></h3>
                                            <?php echo $purchase_all_data[0]['message_invoice'];  ?>
                                        </div>
                                          <div class="avoid-page-break terms-conditions mb-30">
                                            <h3 class="inv-title-1 mb-10 avoid-page-break" style="font-size: 18px;font-weight:bold;"><?php echo  display('Remarks / Details');?></h3>
                                            <?php echo $purchase_all_data[0]['remarks'];  ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <div class="avoid-page-break payment-method mb-30">
                                            <h3 style="font-size: 18px;font-weight:bold;" class="inv-title-1 mb-10">Payment Info :</h3>
                                            <ul class="payment-method-list-1 text-14" style="font-size: 11px;">
                                                <li><strong>Payment Terms : &nbsp;</strong><?php  echo $payment_terms; ?></li>
                                                <li><strong>Payment Type    :&nbsp;&nbsp;&nbsp; </strong><?php  echo $payment_type ; ?></li>
                                                <li><strong>Due date      : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong> <?php  echo $payment_due_date; ?></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--<div class="invoice-btn-section clearfix d-print-none">-->
                    <!--    <a href="javascript:window.print()" class="btn btn-lg btn-print">-->
                    <!--        <i class="fa fa-print"></i> Print Invoice-->
                    <!--    </a>-->
                    <!--    <a id="invoice_download_btn" class="btn btn-lg btn-download btn-theme">-->
                    <!--        <i class="fa fa-download"></i> Download Invoice-->
                    <!--    </a>-->
                    <!--</div>-->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Invoice 12 end -->



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




        <?php    } ?>

    </div>


</div>

<div class="modal fade" id="myModal_ex" role="dialog" >
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="width: 500px;height:100px;text-align:center;margin-bottom: 300px;">
        <div class="modal-header" style="color:white;background-color:#38469f;">
      
          <h4 class="modal-title">Expenses</h4>
        </div>
        <div class="content">

        <div class="modal-body">
          
          <h4>New Expense Downloaded Successfully</h4>
     
        </div>
        <div class="modal-footer">
        </div>
        </div>
      </div>
      
    </div>
  </div>



 <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>

 

<script>


  $(document).ready(function(){
  $(".normalinvoice").each(function() {
        // Check if the table does not contain any tr elements in tbody
        if ($(this).find('tbody tr').length === 0) {
            // Remove the table if it doesn't have any rows
            $(this).remove();
        }
    });  
      $('.normalinvoice').each(function(){
      // debugger;  
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
 $(this).closest('table').find('#Total_'+idt).val("<?php echo $currency;  ?>"+sum.toFixed(3));
  var sum_gross=0;

 $('#normalinvoice_'+idt  +  '> tbody > tr').find('.gross_sq_ft').each(function() {
var v=$(this).html();
  sum_gross += parseFloat(v);

});
 $(this).closest('table').find('#overall_gross_'+idt).val(sum_gross.toFixed(3));

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
  $("#content").css("display", 'none');
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
         $("#content").css("display", 'none');
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
  window.location = '<?php echo base_url(); ?>' + 'Cpurchase/manage_purchase';
      window.close();
    }, 4000);
  }

  first(second, third);
});


  

</script>



<style>



.invoice-center{
        background-color: transparent !important;

}





.aaa{
  flex-wrap: wrap;
  
}





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
 background-color:<?php  echo "#".$color ?>;
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
    width: 400px;
    height: 300px;
    position: absolute;
    bottom: 0;
    right: 0;
    background-color: <?php  echo "#".$color ?>;
    background-size: cover;
    z-index: -1;
}
.invoice-12 .invoice-info:before {
    content: "";
    width: 400px;
    height: 300px;
    position: absolute;
    top: 0;
    left: 0;
     background-color: <?php  echo "#".$color ?>;
    background-size: cover;
    z-index: -1;
}
.invoice-12 .default-table thead {
  
   background-color: <?php  echo "#".$color ?>;
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
 background-color:<?php  echo "#".$color ?>;
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
    width: 400px;
    height: 300px;
    position: absolute;
    bottom: 0;
    right: 0;
    background-color: <?php  echo "#".$color ?>;
    background-size: cover;
    z-index: -1;
}
.invoice-12 .invoice-info:before {
    content: "";
    width: 400px;
    height: 300px;
    position: absolute;
    top: 0;
    left: 0;
     background-color: <?php  echo "#".$color ?>;
    background-size: cover;
    z-index: -1;
}
.invoice-12 .default-table thead {
   background-color: <?php  echo "#".$color ?>;
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














.key{
    width: auto;
    text-align:left;
font-weight:bold;

}
.value{
    text-align:left;
}
#one,#two{
    margin-top:20px;
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
   padding: 10px 40px;
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
    padding: 16px;
    border: 1px solid gray;
    
}
th{
    text-align:center;
  }
</style>
  </style>




