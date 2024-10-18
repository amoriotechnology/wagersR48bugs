

<div class="content-wrapper">
    <section class="content-header" >
       
    </section>
  <!-- Invoice information -->
 
 <style>
    .sidebar-mini{
  background-color:#38469f;
    }
   body{
       background-color:#38469f;
   }
       #head{
    text-align: center;
    margin-top: 250px;
}

#content{display:none;} 
@media print 
{ 
#head{display:none;} 
#content{display:block;} 
} 
 </style>

<div id="head"></div>
        <?php

    $m=1;
     if($template==2)
            {
            ?>

     <div class="container" id="content">

<?php if(empty($header)){ ?>
         <div class="col-sm-4text-center" style="color:black;">
            <h3  style="text-align: center;" ><?php echo "SERVICE PROVIDER"; ?></h3>
         </div>
         <?php } 
            else
            {  ?>
                   <h3 style="text-align: center;color:black;" ><?php echo $header; ?></h3>

         <?php } ?>





       <div class="brand-section" style="background-color:<?php echo '#' . $color; ?>">
        <div class="row" >
     
 
 
 <div class="col-sm-2" style="margin-top:-30px;position: relative; text-align: center;">
            <img src="<?php echo base_url().$logo; ?>" style="width: 130%; position: absolute; top: 0; right: 0;" />
         </div>
    
    
   <div class="col-sm-5 text-center" style="color:white;"> </div>
  

    
    
    
    
    
    
      <div class="col-sm-5" style="color:white;font-weight:bold ;" id='company_info'>
           
          <b> <?php echo display('Company name') ?>:</b><?php echo $company_info[0]['company_name']; ?><br>
          <b>    <?php echo display('Address') ?> : </b><?php echo $company_info[0]['address']; ?><br>
          <b>   <?php echo display('Email') ?>:</b><?php echo $company_info[0]['email']; ?><br>
          <b>   <?php echo display('Contact') ?> : </b><?php echo $company_info[0]['mobile']; ?><br>
       </div>
        </div>
     </div>
       
       
<div class="body-section"    >
            <div class="row">
                <div class="col-6">
                <table id="one" style="border:none;">

    <tr class="avoid-page-break " ><td  class="key"><?php  echo  display('Service Provider Name');?></td><td >:&nbsp;</td><td class="value"><?php echo $service_provider_name;  ?></td></tr>
    <tr class="avoid-page-break " ><td  class="key"><?php  echo  display('Payment Terms');?></td><td >:&nbsp;</td><td class="value"><?php echo $payment_terms;  ?></td></tr>
    <tr class="avoid-page-break " ><td  class="key"><?php  echo  display('Bill Date');?></td><td >:&nbsp;</td><td class="value"><?php echo $bill_date;  ?></td></tr>
    <tr class="avoid-page-break " ><td  class="key"><?php  echo  display('Account Category Name');?></td><td >:&nbsp;</td><td class="value"><?php echo $acc_cat_name;  ?></td></tr>
    <tr class="avoid-page-break " ><td  class="key"><?php  echo  display('Account Sub Category');?></td><td >:&nbsp;</td><td class="value"><?php echo $acc_sub_name;  ?></td></tr>

</table>

                </div>
                <div class="col-6">
                <table id="two">

                <tr class="avoid-page-break " ><td  class="key"><?php  echo  display('Service Provider complete address');?></td><td >:&nbsp;</td><td class="value"><?php echo $sp_address; ?></td></tr>
<tr class="avoid-page-break " ><td  class="key"><?php  echo  ('Phone Number');?></td><td >:&nbsp;</td><td class="value"><?php echo $phone_num;  ?></td></tr>
<tr class="avoid-page-break " ><td  class="key"><?php  echo  display('Bill Number');?></td><td>:&nbsp;</td><td class="value"><?php echo $bill_number;  ?></td></tr>
<tr class="avoid-page-break " ><td  class="key"><?php  echo  display('Account Sub Category');?></td><td >:&nbsp;</td><td class="value"><?php echo $acc_cat;  ?></td></tr>


</table> </div> 


            </div>
        </div>
        <div class="body-section">
          <div class="table-responsive">
     
 

<?php 



    ?>
    <table class="table table-bordered normalinvoice table-hover" id="normalinvoice_<?php  echo $m; ?>" >
            <thead>
                  <tr  class="avoid-page-break "  style="font-weight:bold;height:40px;font-size:12px;background-color:<?php echo '#' . $color; ?>">
                      <th rowspan="1" class="absorbing-column text-center text-white" style=" font-size:12px;width:13px;"><?php  echo   ('Product Name');?></th>
                      <th rowspan="1" class="text-center text-white"style=" font-size:12px;width:15px;"><?php echo display('description'); ?></th>
                    <th rowspan="1" class="text-center text-white"style=" font-size:12px;width:13px;"><?php  echo  ('Quality'); ?></th>
                    <th rowspan="1" class="text-center text-white"style=" font-size:12px;width:10px;"><?php echo display('amount'); ?></th> 
                     </tr> 

            </thead>
               <tbody id="addPurchaseItem_<?php echo $m;  ?>">
                                    <?php  $n=0; ?>
                                    <?php foreach($service_detail as $inv){   ?>

                                                                                                       
                                      
                                        <tr class="avoid-page-break">
                         <td style="font-size: 16px;"><?php echo $inv['productname']; ?></td>
                         <td style="font-size: 16px;"><?php echo $inv['description']; ?></td>
                       <td style="font-size: 16px;"><?php echo $inv['quality']; ?></td>
                       <td style="font-size: 16px;"><?php echo $icon; ?><?php echo $inv['total_price']; ?></td>
                     
                     </tr>
<?php } ?>


</tbody>
                    
				 

                       <tfoot>
                       <tr class="avoid-page-break">
                        <td colspan="3" style="text-align:right;font-weight:bold;"><?php echo display('Total') ?>:</td>
                        <td style="font-size: 16px;"><?php echo $icon; ?><?php echo $total;  ?></td>
                    </tr>
                    <tr class="avoid-page-break">
                       
                       <td colspan="3" style="text-align:right;font-weight:bold;"><?php echo  "Tax (".$tax_des;  ?></td>
                              <td style="font-size: 16px;"><?php  echo $icon; ?><?php echo $tax_detail;  ?></td>
                          </tr>
                       <tr>
                       <tr class="avoid-page-break">
                        <td colspan="3" style="text-align:right;font-weight:bold;"><?php echo display('Grand Total') ?>:</td>
                        <td style="font-size: 16px;"><?php  echo $icon; ?><?php echo $gtotals;  ?></td>
                    </tr>
                    <tr class="avoid-page-break">
                        <td colspan="3" style="text-align:right;font-weight:bold;"><?php echo display('Grand Total') ?> <?php echo display('Preferred Currency') ?>:</td>
                        <td style="font-size: 16px;"><?php echo $currency_type." ".$vendor_gtotals;  ?></td>
                    </tr>
                    <tr class="avoid-page-break">
                    <td style="text-align:right;"  colspan="3"><b><?php echo display('Amount Paid') ?>:</b></td>
                        <td style="font-size: 16px;"> <?php echo $currency_type." ".$amount_paids;?></td>
                    </tr>
                    <tr class="avoid-page-break">
                    <td style="text-align:right;"  colspan="3"><b><?php echo display('Balance') ?>:</b></td>
                        <td style="font-size: 16px;"> <?php echo $currency_type." ".$balances;?></td>
                    </tr>
                    </tfoot>
                    </table> 
     

                  
            <br>
<h4 class="avoid-page-break"><?php echo display('Memo / Details')?> :</h4><?php echo $memo_details; ?><br>
<br><br>
      
</div>
<?php 

}
elseif($template==3)
{
?>
     <div class="container" id="content">

    <div class="brand-section" style="background-color:<?php echo  '#'. $color; ?>">
    <div class="row" >



      <?php if(empty($header)){ ?>
  <div class="col-sm-4 text-center" style="color:white;"><h3><?php echo "SERVICE PROVIDER"; ?></h3></div>
 <?php } 
else
{  ?>
             <h3 style="text-align: center;color:black;" ><?php echo $header; ?></h3>
<?php } ?>








        <div class="col-sm-2 mx-auto" style='margin-top:-30px;'>
    <img src="<?php echo base_url().$logo; ?>" style="display: block; margin: 0 auto; max-width: 150%;">
</div>
    
   </div>
   
  
   
   

 <div class="col-sm-5" style="color:white;font-weight:bold ;"  id='company_info'>
       
      <b> <?php echo display('Company name') ?> : </b><?php echo $company_info[0]['company_name']; ?><br>
      <b>  <?php echo display('Address') ?> : </b><?php echo $company_info[0]['address']; ?><br>
      <b>   <?php echo display('Email') ?> : </b><?php echo $company_info[0]['email']; ?><br>
      <b>   <?php echo display('Contact') ?> : </b><?php echo $company_info[0]['mobile']; ?><br>
   </div>
    </div>
 </div>
   
<div class="body-section" >
        <div class="row">
            <div class="col-6">
                        <table id="one" style="border:none;">

                        <tr class="avoid-page-break " ><td  class="key"><?php  echo  display('Service Provider Name');?></td><td >:</td><td class="value"><?php echo $service_provider_name;  ?></td></tr>
    <tr class="avoid-page-break " ><td  class="key"><?php  echo  display('Payment Terms');?></td><td >:</td><td class="value"><?php echo $payment_terms;  ?></td></tr>
    <tr class="avoid-page-break " ><td  class="key"><?php  echo  display('Bill Date');?></td><td >:</td><td class="value"><?php echo $bill_date;  ?></td></tr>
    <tr class="avoid-page-break " ><td  class="key"><?php  echo  display('Account Category Name');?></td><td >:</td><td class="value"><?php echo $acc_cat_name;  ?></td></tr>
    <tr><td  class="key"><?php  echo  display('Account Sub Category');?></td><td >:</td><td class="value"><?php echo $acc_sub_name;  ?></td></tr>

</table>

                </div>
                <div class="col-6">
                <table id="two">

                <tr class="avoid-page-break " ><td  class="key"><?php  echo  display('Service Provider complete address');?></td><td >:</td><td class="value"><?php echo $sp_address; ?></td></tr>
<tr class="avoid-page-break "><td  class="key"><?php  echo  ('Phone Number');?></td><td >:</td><td class="value"><?php echo $phone_num;  ?></td></tr>
<tr class="avoid-page-break " ><td  class="key"><?php  echo  display('Bill Number');?></td><td>:</td><td class="value"><?php echo $bill_number;  ?></td></tr>
<tr class="avoid-page-break "><td  class="key"><?php  echo  display('Account Category');?></td><td >:</td><td class="value"><?php echo $acc_cat;  ?></td></tr>


</table> </div> 


            </div>
        </div>
        <div class="body-section">
          <div class="table-responsive">
     
 

<?php 



    ?>
    <table class="table table-bordered normalinvoice table-hover" id="normalinvoice_<?php  echo $m; ?>" >
            <thead>
                  <tr class="avoid-page-break " style="font-weight:bold;height:40px;font-size:12px;background-color:<?php echo '#' .$color; ?>">
                      <th rowspan="1" class="text-center text-white" style=" font-size:12px;width:13px;"><?php  echo  ('Product Name');?></th>
                      <th rowspan="1" class="text-center text-white"style=" font-size:12px;width:15px;"><?php echo display('description'); ?></th>
                    <th rowspan="1" class="text-center text-white"style=" font-size:12px;width:13px;"><?php  echo  ('Quality'); ?></th>
                    <th rowspan="1" class="text-center text-white"style=" font-size:12px;width:10px;"><?php echo display('amount'); ?></th> 
                     </tr> 

            </thead>
               <tbody id="addPurchaseItem_<?php echo $m;  ?>">
                                    <?php  $n=0; ?>
                                    <?php foreach($service_detail as $inv){   ?>

                                                                                                       
                                      
                    <tr class="avoid-page-break" >
                         <td style="font-size: 16px;"><?php echo $inv['productname']; ?></td>
                         <td style="font-size: 16px;"><?php echo $inv['description']; ?></td>
                       <td style="font-size: 16px;"><?php echo $inv['quality']; ?></td>
                       <td style="font-size: 16px;"><?php echo $icon; ?><?php echo $inv['total_price']; ?></td>
                     
                     </tr>
<?php } ?>


</tbody>
                    
				 

<tfoot>
                    <tr class="avoid-page-break">
                        <td colspan="3" style="text-align:right;font-weight:bold;"><?php echo display('Total') ?>:</td>
                        <td style="font-size: 16px;"><?php echo $icon; ?><?php echo $total;  ?></td>
                    </tr>
                    <tr class="avoid-page-break">
                       
                       <td colspan="3" style="text-align:right;font-weight:bold;"><?php echo  "Tax (".$tax_des;  ?></td>
                              <td style="font-size: 16px;"><?php  echo $icon; ?><?php echo $tax_detail;  ?></td>
                          </tr>
                       <tr>
                       <tr class="avoid-page-break">
                        <td colspan="3" style="text-align:right;font-weight:bold;"><?php echo display('Grand Total') ?>:</td>
                        <td style="font-size: 16px;"><?php  echo $icon; ?><?php echo $gtotals;  ?></td>
                    </tr>
                    <tr class="avoid-page-break">
                        <td colspan="3" style="text-align:right;font-weight:bold;"><?php echo display('Grand Total') ?> <?php echo display('Preferred Currency') ?>:</td>
                        <td style="font-size: 16px;"><?php echo $currency_type." ".$vendor_gtotals;  ?></td>
                    </tr>
                    <tr class="avoid-page-break">
                    <td style="text-align:right;"  colspan="3"><b><?php echo display('Amount Paid') ?>:</b></td>
                        <td style="font-size: 16px;"> <?php echo $currency_type." ".$amount_paids;?></td>
                    </tr>
                    <tr class="avoid-page-break">
                    <td style="text-align:right;"  colspan="3"><b><?php echo display('Balance') ?>:</b></td>
                        <td style="font-size: 16px;"> <?php echo $currency_type." ".$balances;?></td>
                    </tr>
                    </tfoot>










                </table> 
 

              
        <br>
<h4 class="avoid-page-break" ><?php echo display('Memo / Details')?> :</h4><?php echo $memo_details; ?><br>
<br><br>
  

</div>

 <?php 

}
elseif($template==1)
{
?>     
     <div class="container" id="content">


<?php if(empty($header)){ ?>
         <div class="col-sm-4text-center" style="color:black;">
            <h3  style="text-align: center;" ><?php echo "SERVICE PROVIDER"; ?></h3>
         </div>
         <?php } 
            else
            {  ?>
        
         
                      <h3 style="text-align: center;color:black;" ><?php echo $header; ?></h3>

         
         <?php } ?>








    <div class="brand-section" style="background-color:<?php echo '#' . $color; ?>">
    <div class="row" >
 

   



 <div class="col-sm-6" id='company_info' style="color:white;font-weight:bold ;">
            
            <b>  <?php echo display('Company name') ?> : </b><?php echo $company_info[0]['company_name']; ?><br>
            <b>  <?php echo display('Address') ?> : </b><?php echo $company_info[0]['address']; ?><br>
            <b>   <?php echo display('Email') ?> : </b><?php echo $company_info[0]['email']; ?><br>
            <b>  <?php echo display('Contact') ?> : </b><?php echo $company_info[0]['mobile']; ?><br>
          </div>
        


 
   <div class="col-sm-4 text-center" style="color:white;"> </div>
 



          
        <div class="col-sm-2 mx-auto" style='margin-top:-20px;'>
    <img src="<?php echo base_url().$logo; ?>" style="display: block; margin: 0 auto; max-width: 160%;">
</div>

           </div>
 </div>






<div class="body-section" >
        <div class="row">
            <div class="col-6">
                       <table id="one" style="border:none;">

                       <tr class="avoid-page-break " ><td  class="key"><?php  echo  display('Service Provider Name');?></td><td >:&nbsp;</td><td class="value"><?php echo $service_provider_name;  ?></td></tr>
    <tr class="avoid-page-break " ><td  class="key"><?php  echo  display('Payment Terms');?></td><td >:&nbsp;</td><td class="value"><?php echo $payment_terms;  ?></td></tr>
    <tr class="avoid-page-break " ><td  class="key"><?php  echo  display('Bill Date');?></td><td >:&nbsp;</td><td class="value"><?php echo $bill_date;  ?></td></tr>
    <tr class="avoid-page-break " ><td  class="key"><?php  echo  display('Account Category Name');?></td><td >:&nbsp;</td><td class="value"><?php echo $acc_cat_name;  ?></td></tr>
    <tr class="avoid-page-break "><td  class="key"><?php  echo  display('Account Sub Category');?></td><td >:&nbsp;</td><td class="value"><?php echo $acc_sub_name;  ?></td></tr>

</table>

                </div>
                <div class="col-6">
                <table id="two">

                <tr class="avoid-page-break " ><td  class="key"><?php  echo  display('Service Provider complete address');?></td><td >:&nbsp;</td><td class="value"><?php echo $sp_address; ?></td></tr>
<tr class="avoid-page-break " ><td  class="key"><?php  echo  ('Phone Number');?></td><td >:&nbsp;</td><td class="value"><?php echo $phone_num;  ?></td></tr>
<tr class="avoid-page-break " ><td  class="key"><?php  echo  display('Bill Number');?></td><td>:&nbsp;</td><td class="value"><?php echo $bill_number;  ?></td></tr>
<tr class="avoid-page-break "><td  class="key"><?php  echo  display('Account Sub Category');?></td><td >:&nbsp;</td><td class="value"><?php echo $acc_cat;  ?></td></tr>


</table> </div> 


            </div>
        </div>
        <div class="body-section">
          <div class="table-responsive">
     
 

<?php 



    ?>
    <table class="table table-bordered normalinvoice table-hover" id="normalinvoice_<?php  echo $m; ?>" >
            <thead>
                  <tr class="avoid-page-break " style="font-weight:bold;height:40px;font-size:12px;background-color:<?php echo '#' . $color; ?>">
                      <th rowspan="1" class="absorbing-column text-center text-white" style=" font-size:12px;width:13px;"><?php  echo   ('Product Name');?></th>
                      <th rowspan="1" class="text-center text-white"style=" font-size:12px;width:15px;"><?php echo display('description'); ?></th>
                    <th rowspan="1" class="text-center text-white"style=" font-size:12px;width:13px;"><?php  echo  ('Quality'); ?></th>
                    <th rowspan="1" class="text-center text-white"style=" font-size:12px;width:10px;"><?php echo display('amount'); ?></th> 
                     </tr> 

            </thead>
               <tbody id="addPurchaseItem_<?php echo $m;  ?>">
                                    <?php  $n=0; ?>
                                    <?php foreach($service_detail as $inv){   ?>

                                                                                                       
                                      
                    <tr class="avoid-page-break" >
                         <td style="font-size: 16px;"><?php echo $inv['productname']; ?></td>
                         <td style="font-size: 16px;"><?php echo $inv['description']; ?></td>
                       <td style="font-size: 16px;"><?php echo $inv['quality']; ?></td>
                       <td style="font-size: 16px;"><?php echo $icon; ?><?php echo $inv['total_price']; ?></td>
                     
                     </tr>
<?php } ?>


</tbody>
                    
				 

                     <tfoot>
                    <tr class="avoid-page-break">
                        <td colspan="3" style="text-align:right;font-weight:bold;"><?php echo display('Total') ?>:</td>
                        <td style="font-size: 16px;"><?php echo $icon; ?><?php echo $total;  ?></td>
                    </tr>
                    <tr class="avoid-page-break">
                       
                       <td colspan="3" style="text-align:right;font-weight:bold;"><?php echo  "Tax (".$tax_des;  ?></td>
                              <td style="font-size: 16px;"><?php  echo $icon; ?><?php echo $tax_detail;  ?></td>
                          </tr>
                       <tr>
                    <tr class="avoid-page-break">
                        <td colspan="3" style="text-align:right;font-weight:bold;"><?php echo display('Grand Total') ?>:</td>
                        <td style="font-size: 16px;"><?php  echo $icon; ?><?php echo $gtotals;  ?></td>
                    </tr>
                    <tr class="avoid-page-break">
                        <td colspan="3" style="text-align:right;font-weight:bold;"><?php echo display('Grand Total') ?> <?php echo display('Preferred Currency') ?>:</td>
                        <td style="font-size: 16px;"><?php echo $currency_type." ".$vendor_gtotals;  ?></td>
                    </tr>
                    <tr class="avoid-page-break">
                    <td style="text-align:right;"  colspan="3"><b><?php echo display('Amount Paid') ?>:</b></td>
                        <td style="font-size: 16px;"> <?php echo $currency_type." ".$amount_paids;?></td>
                    </tr>
                    <tr class="avoid-page-break">
                    <td style="text-align:right;"  colspan="3"><b><?php echo display('Balance') ?>:</b></td>
                        <td style="font-size: 16px;"> <?php echo $currency_type." ".$balances;?></td>
                    </tr>
                    </tfoot>
                
                
                
                
                
                </table> 
 

              
        <br>
<h4 class="avoid-page-break" ><?php echo display('Memo / Details')?> :</h4><?php echo $memo_details; ?><br>
<br><br>
  
</div>

 <?php 

}
elseif($template==4)
{
?>  



<div class="invoice-12 invoice-content"  id= "content" style="padding:0px;">
    <div class="container" style="padding:0px;">
        <div class="row">
            <div class="col-lg-12">
                <div class="invoice-inner clearfix">
                  <div style="color:red;"></div>
                   <div style="color:red;"></div>
                    <div class="invoice-info clearfix" id="invoice_wrapper">
                        <div class="invoice-contant">


 

 <div class="row"  style="text-align: center;" >
 <div class="col-sm-12" >
 <div class="col-sm-3"></div>
                        <?php if(empty($header)){ ?>
         <div class="col-sm-5 text-center" style="color:black;">
             
              <h3 style="text-align:center;"><?php echo "SERVICE PROVIDER"; ?></h3>
             
          </div>
         <?php } 
            else
            {  ?>
 <div class="col-sm-5 text-center" style="color:black;">
            <h3  style="text-align:start;" ><?php echo $header; ?></h3>
         </div>
         <?php } ?>
          <div class="col-sm-4"></div>
        </div> </div>



<br>


      <div class="row"  style="text-align: center;" >
          
          
          
                                    <!--<div class="col-sm-3"><img src="<?php echo  base_url().$logo; ?>"   style='max-width:50%;'  /></div>-->
                                 
                                 
                                  <div class="col-sm-3" style="margin-top:-50px;position: relative; text-align: center;">
            <img src="<?php echo base_url().$logo; ?>" style="width: 70%; position: absolute; top: 0; right: 0;" />
         </div>
                                 
                                 
                                    <div class="col-sm-5 text-center" style="color:black;">
                                    </div>
                                 
                                 
                                 
                                 
                                 
                                 
                                 
                                 
                                 
                                 
                                 
                                    <div class="col-sm-4"  style="text-align:start" id='company_info'>
<h2 class="name"><?php  echo  display('Bill Number');?>:<?php  echo $bill_number; ?></h2>
                                            <p class="mb-0"><?php  echo  display('Bill Date');?>:<span><?php  echo $bill_date; ?></span></p>
                                    </div>
                                 </div>
                            <hr>
                            <div class="invoice-top">
                                <div class="row">
                                    <div class="col-md-4 col-sm-6 mb-30">
                                        <div class="invoice-number">
                                            <h4 class="inv-title-1" style="font-weight:bold;color:<?php echo '#' . $color; ?> "><?php  echo  display('Service Provider Name');?></h4>
                                            <h2 class="name mb-10"><?php echo $service_provider_name; ?></h2>
                                            <p class="invo-addr-1 mb-0">
                                            <?php  echo $sp_address; ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 mb-30">
                                        <div class="invoice-number">
                                            <div class="invoice-number-inner">
                                                <h4 class="inv-title-1" style="font-weight:bold;color:<?php echo '#' . $color; ?> "> </h4>
                                                <h2 class="name mb-10"><?php //echo $customer_name; ?></h2>
                                                <p class="invo-addr-1 mb-0">
                                                    <?php // echo $all_invoice[0]['shipping_address'] ; ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 mb-30 invoice-contact-us">
                                        <h4 class="inv-title-1" style="font-weight:bold;color:<?php echo '#' . $color; ?> ">Company Information</h4>
                                        <h2 class="name mb-10"></h2>
                                        <ul class="link">

                                        <li>
                                                <i class="fas fa-building"></i> <?php echo  $company_info[0]['company_name']; ?>
                                            </li>

                                            <li>
                                                <i class="fa fa-map-marker"></i> <?php echo $company_info[0]['address']; ?>
                                            </li>
                                            <li>
                                                <i class="fa fa-envelope"></i> <?php echo $company_info[0]['email']; ?> 
                                            </li>
                                            <li>
                                                <i class="fa fa-phone"></i>  <?php echo $company_info[0]['mobile']; ?> 
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                             <div class="invoice-center">
                                <div class="order-summary">
                                    <div class="table-outer">
                                        <table class="default-table invoice-table" border="1"  style='border-color:gray;' cellpadding="0" cellspacing="0">
                                            <thead  style="background-color:<?php  echo  '#' . $color; ?>;color:black;">
                                            <tr class="avoid-page-break " >
                                                <th><?php  echo  display('Account Category Name');?></th>
                                                <th><?php  echo  display('Account Sub Category');?></th>
                                                <th><?php  echo  display('Account Sub Category');?></th>
                                                <th><?php  echo  ('Phone Number');?></th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            <tr class="avoid-page-break "  style="text-align:center;">
                                                <td><?php  echo $acc_cat_name; ?></td>
                                                <td><?php  echo $acc_sub_name ; ?></td>
                                                <td><?php  echo $acc_cat; ?></td>
                                                <td><?php echo $phone_num; ?></td>
                                            </tr>
                                           
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="invoice-center">
                                <div class="order-summary">
                                    <div class="table-outer">

                                    <table class="table table-bordered normalinvoice table-hover" id="normalinvoice_<?php  echo $m; ?>" >
            <thead>
                  <tr style="font-weight:bold;height:40px;font-size:12px;background-color:<?php echo '#' . $color; ?>">
                      <th rowspan="1" class="absorbing-column text-center text-white" style=" font-size:12px;width:13px;"><?php  echo  display('Product Name');?></th>
                      <th rowspan="1" class="text-center text-white"style=" font-size:12px;width:15px;"><?php echo display('description'); ?></th>
                    <th rowspan="1" class="text-center text-white"style=" font-size:12px;width:13px;"><?php  echo  ('Quality'); ?></th>
                    <th rowspan="1" class="text-center text-white"style=" font-size:12px;width:10px;"><?php echo display('amount'); ?></th> 
                     </tr> 

            </thead>
               <tbody id="addPurchaseItem_<?php echo $m;  ?>">
                                    <?php  $n=0; ?>
                                    <?php foreach($service_detail as $inv){   ?>

                                                                                                       
                                      
                    <tr class="avoid-page-break">
                         <td style="color:white;font-size: 16px;text-align: center;"><?php echo $inv['productname']; ?></td>
                         <td style="font-size: 16px;text-align: center;"><?php echo $inv['description']; ?></td>
                       <td style="font-size: 16px;text-align: center;"><?php echo $inv['quality']; ?></td>
                       <td style="font-size: 16px;text-align: center;"><?php echo $icon; ?><?php echo $inv['total_price']; ?></td>
                     
                     </tr>
<?php } ?>


</tbody>
                    
				 

                             <tfoot>
                    <tr class="avoid-page-break">
                        <td colspan="3" style="text-align:right;font-weight:bold;"><?php echo display('Total') ?>:</td>
                        <td style="font-size: 16px;"><?php echo $icon; ?><?php echo $total;  ?></td>
                    </tr>
                    <tr class="avoid-page-break">
                       
                       <td colspan="3" style="text-align:right;font-weight:bold;"><?php echo  "Tax (".$tax_des;  ?></td>
                              <td style="font-size: 16px;"><?php  echo $icon; ?><?php echo $tax_detail;  ?></td>
                          </tr>
                       <tr>
                    <tr class="avoid-page-break">
                        <td colspan="3" style="text-align:right;font-weight:bold;"><?php echo display('Grand Total') ?>:</td>
                        <td style="font-size: 16px;"><?php  echo $icon; ?><?php echo $gtotals;  ?></td>
                    </tr>
                    <tr class="avoid-page-break">
                        <td colspan="3" style="text-align:right;font-weight:bold;"><?php echo display('Grand Total') ?> <?php echo display('Preferred Currency') ?>:</td>
                        <td style="font-size: 16px;"><?php echo $currency_type." ".$vendor_gtotals;  ?></td>
                    </tr>
                    <tr class="avoid-page-break">
                    <td style="text-align:right;"  colspan="3"><b><?php echo display('Amount Paid') ?>:</b></td>
                        <td style="font-size: 16px;"> <?php echo $currency_type." ".$amount_paids;?></td>
                    </tr>
                    <tr class="avoid-page-break">
                    <td style="text-align:right;"  colspan="3"><b><?php echo display('Balance') ?>:</b></td>
                        <td style="font-size: 16px;"> <?php echo $currency_type." ".$balances;?></td>
                    </tr>
                    </tfoot>
                    
                    
                    
                    
                    
                    
                    </table> 

                                    </div>
                                </div>
                            </div>
                            
                             <div class="invoice-bottom">
                                <div class="row">
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                        <div class="terms-conditions mb-30">
                                            <h3 class="inv-title-1 mb-10 avoid-page-break" style="font-size: 18px;font-weight:bold;"><?php echo display('Memo / Details')?></h3>
                                            <?php echo $memo_details;  ?>
                                        </div>
                                          
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <div class="payment-method mb-30">
                                            <h3 style="font-size: 18px;font-weight:bold;" class="inv-title-1 mb-10 avoid-page-break">Payment Info :</h3>
                                            <ul class="payment-method-list-1 text-14" style="font-size: 16px;">
                                                <li><strong><?php  echo  display('Payment Terms');?> : &nbsp;</strong><?php  echo $payment_terms; ?></li>
                                              </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="invoice-btn-section clearfix d-print-none">
                        <a href="javascript:window.print()" class="btn btn-lg btn-print">
                            <i class="fa fa-print"></i> Print Invoice
                        </a>
                        <a id="invoice_download_btn" class="btn btn-lg btn-download btn-theme">
                            <i class="fa fa-download"></i> Download Invoice
                        </a>
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
 <?php } ?>    
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
 background-color:<?php  echo '#' . $color; ?>;
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
    background-color: <?php  echo '#' . $color; ?>;
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
     background-color: <?php  echo '#' . $color; ?>;
    background-size: cover;
    z-index: -1;
}
.invoice-12 .default-table thead {
  
   background-color: <?php  echo '#' . $color; ?>;
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
 background-color:<?php  echo '#' . $color; ?>;
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
    background-color: <?php  echo '#' . $color; ?>;
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
     background-color: <?php  echo '#' . $color; ?>;
    background-size: cover;
    z-index: -1;
}
.invoice-12 .default-table thead {
   background-color: <?php  echo '#' . $color; ?>;
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
  </style>
</div>

</div>

</div> 



    </section> 
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
  $("#content").attr("hidden", true);

  var img = document.createElement("img");
  img.src = "<?php echo base_url() ?>/asset/images/icons/loading.gif";
  var src = document.getElementById("head");
  src.appendChild(img);

  const element = document.getElementById("content");

  // change display of cloned element 
  $(element).css("display", "block");

  var opt = {
    margin: 2, // Adjust this value as needed
    filename: 'Expenses.pdf',
    image: { type: 'jpeg', quality: 0.98 },
    html2canvas: { scale: 3 },
    jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
  };

  function first(callback1, callback2) {
    setTimeout(function () {
      html2pdf().from(element).set(opt).toPdf().output('blob').then(function (blob) {
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
        window.location='<?php  echo base_url();   ?>'+'Cpurchase/manage_purchase';
      window.close();
    }, 4000);
  }

  first(second, third);
});
 











</script>


<style>

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
























