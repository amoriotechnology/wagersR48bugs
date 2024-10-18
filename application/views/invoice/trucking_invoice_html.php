<?php
$CI = & get_instance();
$CI->load->model('Web_settings');
$Web_settings = $CI->Web_settings->retrieve_setting_editdata();
?>
<style>
.img {
  display: block;
  width:100%;
  margin: auto;
}
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
 



<div class="container" >
<?php

  $myArray = explode('(',$tax); 
  $tax_amt=$myArray[0];
  if($myArray[1] !==''){
  $tax_des=$myArray[1];
  }
  //$template=4;
      //////////////Design one/////////////  
            if($template==1)
            {
            ?>
        








<div id="head"></div>
<div class="container" id="content"> 


<?php if(empty($header)){ ?>
 
 <div class="text-center" ><h3  style="color:black;" ><?php echo "TRUCKING"; ?></h3></div>


<?php } 
else
{  ?>
  <h3 style="text-align: center;color:black;" ><?php echo $header; ?></h3>
<?php } ?>



<div class="brand-section" style="background-color:<?php echo '#'.$color; ?>">
<div class="row" >



<div class="col-sm-5" style="color:white;font-weight:bold;" id='company_info'>
   
<b> <?php echo display('Company name') ?> : </b><?php echo $cname; ?><br>
          <b>   <?php echo display('Address') ?>  : </b><?php echo $address; ?><br>
          <b>   <?php echo display('Email') ?>  : </b><?php echo $email; ?><br>
          <b>   <?php echo display('Contact') ?>  : </b><?php echo $phone; ?><br>
       </div>


<div class="col-sm-5"></div>

 
 <div class="col-sm-2" style="margin-top:-50px;position: relative; text-align: center;">
            <img src="<?php echo base_url().$logo; ?>" style="width: 150%; position: absolute; top: 0; right: 0;" /></div>



</div>
</div>


<div class="body-section"     style="padding: inherit;" >
    <div class="row" style="border:none;">
    <div class="col-6" >
    <table id="one" >
   	
					
<tr style="border:none;"><td  class="key" style="border:none;" > <?php echo display('Invoice No') ?></td><td style="width:10px;border:none;">:</td><td style="border:none;" calss="value"><?php echo$invoice_no;  ?></td></tr>
<tr style="border:none;" ><td  class="key" style="border:none;" ><?php echo display('Customer Name') ?></td><td style="width:10px;border:none;">:</td><td style="border:none;" calss="value"><?php echo  $customer_name; ?></td></tr>
<tr style="border:none;"><td  class="key" style="border:none;" ><?php echo display('Container / Goods Pick up date') ?></td><td style="width:10px;border:none;">:</td><td style="border:none;" calss="value">{container_pickup_date}</td></tr>
<tr style="border:none;" ><td  class="key" style="border:none;" ><?php echo display('Delivery to') ?></td><td style="width:10px;border:none; ">:</td><td style="border:none;" calss="value"><?php echo  $delivery_to; ?></td></tr>
<tr style="border:none;" ><td  class="key" style="border:none;" ><?php echo display('Truck No') ?></td><td style="width:10px;border:none; ">:</td><td  style="border:none;" calss="value"><?php echo  $truck_no; ?></td></tr>
</table>

            </div>
            <div class="col-6">
            <table id="two">
<tr style="border:none;" ><td  style="border:none;" class="key"><?php echo display('Invoice Date') ?></td><td style="width:10px;border:none;">:</td><td  style="border:none;" calss="value"><?php echo $invoice_date;  ?></td></tr>
<tr style="border:none;"><td  style="border:none;" class="key"><?php echo display('Shipment company') ?></td><td style="width:10px;border:none;">:</td><td style="border:none;" calss="value"><?= $shipment_company; ?></td></tr>
<tr style="border:none;"><td  style="border:none;" class="key"><?php echo display('Delivery Time') ?></td><td style="width:10px;border:none;">:</td><td  style="border:none;" calss="value"><?php echo "<span style='font-weight:bold'>From :</span>".$delivery_time_from." <span style='font-weight:bold'>To :</span>".$delivery_time_to; ?></td></tr>
<tr style="border:none;"><td  style="border:none;" class="key"><?php echo display('Delivery Date') ?></td><td style="width:10px;border:none;">:</td><td style="border:none;" calss="value">{delivery_date}</td></tr>
 
</table>
               

               </div>
                 
          
       </div>
           </div>
   
           <div class="body-section">
               <table class="table-bordered">
                   <thead style="background-color:<?php echo '#'.$color; ?>">
                       <tr class="avoid-page-break" >
                       <th data-column-id="id" class="ID"   style="width:30px;" ><?php echo display('S.No') ?></th>
                           <th class="text-center text-white"><?php echo display('Date') ?></th>
                           <th class="text-center text-white"><?php echo display('Quantity') ?></th>
                           <th class="text-center text-white"><?php echo display('Description') ?></th>
                           <th class="text-center text-white"><?php echo display('Rate') ?></th>
                           <th class="text-center text-white"><?php echo display('Pro No / Reference') ?></th>
                           <th class="text-center text-white"><?php echo display('Total') ?></th>
                       </tr>
                   </thead>
   
   
   
   
                       <tbody>
                   <?php
                                       if ($purchase_all_data) {
                                  $count=1;
                                      for($i=0;$i<sizeof($purchase_all_data);$i++){ ?>
                       <tr class="avoid-page-break" >
                           
                            <td style="font-size: 15px;"><?php echo $count; ?></td>
   
                            <td style="font-size: 15px;"><?php  echo $purchase_all_data[$i]['trucking_date']; ?></td>
                            <td style="font-size: 15px;"><?php echo $purchase_all_data[$i]['qty']; ?></td>
                            <td style="font-size: 15px;"><?php echo $purchase_all_data[$i]['description']; ?></td>
                            <td style="font-size: 15px;"><?php  echo $currency; ?><?php echo $purchase_all_data[$i]['rate']; ?></td>
                            <td style="font-size: 15px;"><?php echo $purchase_all_data[$i]['pro_no_reference']; ?></td>
                            <td style="font-size: 15px;"><?php  echo $currency; ?><?php  echo $purchase_all_data[$i]['total']; ?></td> 
                       </tr>
                       <?php $count++;}} ?>
                       </tbody>
                                      
                       <tbody>
                   <?php ?>
                                
                   <tfoot>
                       <tr style="border:none;" class="avoid-page-break">
                       <td colspan="6" style="text-align:right;font-weight:bold;"><?php echo display('Total') ?>:</td>
                           <td style="font-size: 16px;"><?php  echo $currency; ?><?php echo $total_amt;  ?></td>
                       </tr>
                       <tr style="border:none;" class="avoid-page-break">
                          
                          <td colspan="6" style="text-align:right;font-weight:bold;"><?php echo  "Tax (".$tax_des;  ?></td>
                                 <td style="font-size: 16px;"><?php  echo $currency; ?><?php echo $tax_amt;  ?></td>
                             </tr>
                          <tr>
                       <tr style="border:none;" class="avoid-page-break">
                           <td colspan="6" style="text-align:right;font-weight:bold;"><?php echo display('Grand Total') ?>:</td>
                           <td style="font-size: 16px;"><?php  echo $currency; ?><?php echo $grandtotal;  ?></td>
                       </tr>
                       <tr style="border:none;" class="avoid-page-break">
                           <td colspan="6" style="text-align:right;font-weight:bold;"><?php echo display('Grand Total') ?> <?php echo display('Preferred Currency') ?>:</td>
                           <td style="font-size: 16px;"><?php echo $customer_currency." ".$purchase_all_data[0]['customer_gtotal'];  ?></td>
                       </tr>
                       <tr style="border:none;" class="avoid-page-break">
                       <td style="text-align:right;"  colspan="6"><b><?php echo display('Amount Paid') ?>:</b></td>
                           <td style="font-size: 16px;"> <?php echo $customer_currency." ".$purchase_all_data[0]['amt_paid'] ;?></td>
                       </tr>
                       <tr style="border:none;" class="avoid-page-break">
                       <td style="text-align:right;"  colspan="6"><b><?php echo display('Balance') ?>:</b></td>
                           <td style="font-size: 16px;"> <?php echo $customer_currency." ".$purchase_all_data[0]['balance'] ;?></td>
                       </tr>
                      
                       </tfoot>
               </table>
               <br>
   
               <h4 class="avoid-page-break" ><?php echo display('Remarks') ?>:</h4> <?php echo $remarks;  ?> <br/><br/> 
            </div>
       

            <?php 
 } 
 elseif($template==2)
{
    ?>



<div id="head"></div>
    <div class="container" id="content">
  
  
    <?php if(empty($header)){ ?>
         <div class="col-sm-4text-center" style="color:black;">
            <h3  style="text-align: center;" ><?php echo "TRUCKING"; ?></h3>
         </div>
         <?php } 
            else
            {  ?>
      <h3 style="text-align: center;color:black;" ><?php echo $header; ?></h3>

         <?php } ?>










<div class="brand-section" style="background-color:<?php echo '#'.$color; ?>">
<div class="row" >


   <div class='col-sm-1'></div>
 
     <div class="col-sm-2" style="margin-top:-50px;position: relative; text-align: center;">
            <img src="<?php echo base_url().$logo; ?>" style="width: 150%; position: absolute; top: 0; right: 0;" />
         </div>


 
    <div class="col-sm-4 text-center"  > </div>
   
 
 
 
 
   <div class="col-sm-5" id='company_info' style="color:white;">
          
   <b> <?php echo display('Company name') ?> : </b><?php echo $cname; ?><br>
           <b>   <?php echo display('Address') ?> : </b><?php echo $address; ?><br>
           <b>   <?php echo display('Email') ?> : </b><?php echo $email; ?><br>
           <b>   <?php echo display('Contact') ?> : </b><?php echo $phone; ?><br>

           </div>


</div>
     </div>
            
 



<div class="body-section"     style="padding: inherit;" >
    <div class="row">
    <div class="col-6">
    <table id="one" >
   	
					
<tr style="border:none;"><td  class="key" style="border:none;" > <?php echo display('Invoice No') ?></td><td style="width:10px;border:none;">:</td><td style="border:none;" calss="value"><?php echo$invoice_no;  ?></td></tr>
<tr style="border:none;" ><td  class="key" style="border:none;" ><?php echo display('Customer Name') ?></td><td style="width:10px;border:none;">:</td><td style="border:none;" calss="value"><?php echo  $customer_name; ?></td></tr>
<tr style="border:none;"><td  class="key" style="border:none;" ><?php echo display('Container / Goods Pick up date') ?></td><td style="width:10px;border:none;">:</td><td style="border:none;" calss="value">{container_pickup_date}</td></tr>
<tr style="border:none;" ><td  class="key" style="border:none;" ><?php echo display('Delivery to') ?></td><td style="width:10px;border:none; ">:</td><td style="border:none;" calss="value"><?php echo  $delivery_to; ?></td></tr>
<tr style="border:none;" ><td  class="key" style="border:none;" ><?php echo display('Truck No') ?></td><td style="width:10px;border:none; ">:</td><td  style="border:none;" calss="value"><?php echo  $truck_no; ?></td></tr>
</table>

            </div>
            <div class="col-6">
            <table id="two">
<tr style="border:none;" ><td  style="border:none;" class="key"><?php echo display('Invoice Date') ?></td><td style="width:10px;border:none;">:</td><td  style="border:none;" calss="value"><?php echo $invoice_date;  ?></td></tr>
<tr style="border:none;"><td  style="border:none;" class="key"><?php echo display('Shipment company') ?></td><td style="width:10px;border:none;">:</td><td style="border:none;" calss="value"><?= $shipment_company; ?></td></tr>
<tr style="border:none;"><td  style="border:none;" class="key"><?php echo display('Delivery Time') ?></td><td style="width:10px;border:none;">:</td><td  style="border:none;" calss="value"><?php echo "<span style='font-weight:bold'>From :</span>".$delivery_time_from." <span style='font-weight:bold'>To :</span>".$delivery_time_to; ?></td></tr>
<tr style="border:none;"><td  style="border:none;" class="key"><?php echo display('Delivery Date') ?></td><td style="width:10px;border:none;">:</td><td style="border:none;" calss="value">{delivery_date}</td></tr>
 
</table>
               

               </div>
                 
          
       </div>
           </div>
   
           <div class="body-section">
               <table class="table-bordered">
                   <thead style="background-color:<?php echo '#'.$color; ?>">
                       <tr class="avoid-page-break" >
                       <th data-column-id="id" class="ID"   style="width:30px;" ><?php echo display('S.No') ?></th>
                           <th class="text-center text-white"><?php echo display('Date') ?></th>
                           <th class="text-center text-white"><?php echo display('Quantity') ?></th>
                           <th class="text-center text-white"><?php echo display('Description') ?></th>
                           <th class="text-center text-white"><?php echo display('Rate') ?></th>
                           <th class="text-center text-white"><?php echo display('Pro No / Reference') ?></th>
                           <th class="text-center text-white"><?php echo display('Total') ?></th>
                       </tr>
                   </thead>
   
   
   
   
                       <tbody>
                   <?php
                                       if ($purchase_all_data) {
                                  $count=1;
                                      for($i=0;$i<sizeof($purchase_all_data);$i++){ ?>
                       <tr class="avoid-page-break">
                           
                            <td style="font-size: 15px;"><?php echo $count; ?></td>
   
                            <td style="font-size: 15px;"><?php  echo $purchase_all_data[$i]['trucking_date']; ?></td>
                            <td style="font-size: 15px;"><?php echo $purchase_all_data[$i]['qty']; ?></td>
                            <td style="font-size: 15px;"><?php echo $purchase_all_data[$i]['description']; ?></td>
                            <td style="font-size: 15px;"><?php  echo $currency; ?><?php echo $purchase_all_data[$i]['rate']; ?></td>
                            <td style="font-size: 15px;"><?php echo $purchase_all_data[$i]['pro_no_reference']; ?></td>
                            <td style="font-size: 15px;"><?php  echo $currency; ?><?php  echo $purchase_all_data[$i]['total']; ?></td> 
                       </tr>
                       <?php $count++;}} ?>
                       </tbody>
                                      
                       <tbody>
                   <?php ?>
                                
                   <tfoot>
                       <tr class="avoid-page-break">
                       <td colspan="6" style="text-align:right;font-weight:bold;"><?php echo display('Total') ?>:</td>
                           <td style="font-size: 16px;"><?php  echo $currency; ?><?php echo $total_amt;  ?></td>
                       </tr>
                       <tr class="avoid-page-break">
                          
                          <td colspan="6" style="text-align:right;font-weight:bold;"><?php echo  "Tax (".$tax_des;  ?></td>
                                 <td style="font-size: 16px;"><?php  echo $currency; ?><?php echo $tax_amt;  ?></td>
                             </tr>
                          <tr>
                       <tr class="avoid-page-break">
                           <td colspan="6" style="text-align:right;font-weight:bold;"><?php echo display('Grand Total') ?>:</td>
                           <td style="font-size: 16px;"><?php  echo $currency; ?><?php echo $grandtotal;  ?></td>
                       </tr>
                       <tr class="avoid-page-break">
                           <td colspan="6" style="text-align:right;font-weight:bold;"><?php echo display('Grand Total') ?> <?php echo display('Preferred Currency') ?>:</td>
                           <td style="font-size: 16px;"><?php echo $customer_currency." ".$purchase_all_data[0]['customer_gtotal'];  ?></td>
                       </tr>
                       <tr class="avoid-page-break">
                       <td style="text-align:right;"  colspan="6"><b><?php echo display('Amount Paid') ?>:</b></td>
                           <td style="font-size: 16px;"> <?php echo $customer_currency." ".$purchase_all_data[0]['amt_paid'] ;?></td>
                       </tr>
                       <tr class="avoid-page-break">
                       <td style="text-align:right;"  colspan="6"><b><?php echo display('Balance') ?>:</b></td>
                           <td style="font-size: 16px;"> <?php echo $customer_currency." ".$purchase_all_data[0]['balance'] ;?></td>
                       </tr>
                      
                       </tfoot>
               </table>
               <br>
   
               <h4 class="avoid-page-break"><?php echo display('Remarks') ?>:</h4> <?php echo $remarks;  ?> <br/> 
            </div>
       

            <?php 

}
elseif($template==3)
{
    ?>  



<div id="head"></div>
    <div class="container" id="content">
  
  

	<div class="brand-section" style="background-color:<?php echo '#' .$color; ?>">
     <div class="row">
 
   
       
     <?php if(empty($header)){ ?>
  <div class="col-sm-2 text-center"  ><h3 style="color:white;" ><?php echo "TRUCKING"; ?></h3></div>
 <?php } 
else
{  ?>
  <h3 style="text-align: center;color:black;" ><?php echo $header; ?></h3>
<?php } ?>


       
       
       
       
        <div class="col-sm-5"><img class='img' src="<?php echo  base_url().$logo; ?>" style='float:right;'> </div>

        
 
     <div class="col-sm-5" style="color:white;font-weight:bold ;" id='company_info'>
           
     <b> <?php echo display('Company name') ?> : </b><?php echo $cname; ?><br>
          <b>   <?php echo display('Address') ?> : </b><?php echo $address; ?><br>
          <b>   <?php echo display('Email') ?> : </b><?php echo $email; ?><br>
          <b>   <?php echo display('Contact') ?> : </b><?php echo $phone; ?><br>
     </div>
</div>
     </div>
            


<div class="body-section"     style="padding: inherit;" >
    <div class="row">
    <div class="col-6">
    <table id="one" >
   	
					
<tr style="border:none;"><td  class="key" style="border:none;" > <?php echo display('Invoice No') ?></td><td style="width:10px;border:none;">:</td><td style="border:none;" calss="value"><?php echo$invoice_no;  ?></td></tr>
<tr style="border:none;" ><td  class="key" style="border:none;" ><?php echo display('Customer Name') ?></td><td style="width:10px;border:none;">:</td><td style="border:none;" calss="value"><?php echo  $customer_name; ?></td></tr>
<tr style="border:none;"><td  class="key" style="border:none;" ><?php echo display('Container / Goods Pick up date') ?></td><td style="width:10px;border:none;">:</td><td style="border:none;" calss="value">{container_pickup_date}</td></tr>
<tr style="border:none;" ><td  class="key" style="border:none;" ><?php echo display('Delivery to') ?></td><td style="width:10px;border:none; ">:</td><td style="border:none;" calss="value"><?php echo  $delivery_to; ?></td></tr>
<tr style="border:none;" ><td  class="key" style="border:none;" ><?php echo display('Truck No') ?></td><td style="width:10px;border:none; ">:</td><td  style="border:none;" calss="value"><?php echo  $truck_no; ?></td></tr>
</table>

            </div>
            <div class="col-6">
            <table id="two">
<tr style="border:none;" ><td  style="border:none;" class="key"><?php echo display('Invoice Date') ?></td><td style="width:10px;border:none;">:</td><td  style="border:none;" calss="value"><?php echo $invoice_date;  ?></td></tr>
<tr style="border:none;"><td  style="border:none;" class="key"><?php echo display('Shipment company') ?></td><td style="width:10px;border:none;">:</td><td style="border:none;" calss="value"><?= $shipment_company; ?></td></tr>
<tr style="border:none;"><td  style="border:none;" class="key"><?php echo display('Delivery Time') ?></td><td style="width:10px;border:none;">:</td><td  style="border:none;" calss="value"><?php echo "<span style='font-weight:bold'>From :</span>".$delivery_time_from." <span style='font-weight:bold'>To :</span>".$delivery_time_to; ?></td></tr>
<tr style="border:none;"><td  style="border:none;" class="key"><?php echo display('Delivery Date') ?></td><td style="width:10px;border:none;">:</td><td style="border:none;" calss="value">{delivery_date}</td></tr>
 
</table>
               

               </div>
                 
          
       </div>
           </div>
   
           <div class="body-section">
               <table class="table-bordered">
                   <thead style="background-color:<?php echo '#'.$color; ?>">
                       <tr>
                       <th data-column-id="id" class="ID"   style="width:30px;" ><?php echo display('S.No') ?></th>
                           <th class="text-center text-white"><?php echo display('Date') ?></th>
                           <th class="text-center text-white"><?php echo display('Quantity') ?></th>
                           <th class="text-center text-white"><?php echo display('Description') ?></th>
                           <th class="text-center text-white"><?php echo display('Rate') ?></th>
                           <th class="text-center text-white"><?php echo display('Pro No / Reference') ?></th>
                           <th class="text-center text-white"><?php echo display('Total') ?></th>
                       </tr>
                   </thead>
   
   
   
   
                       <tbody>
                   <?php
                                       if ($purchase_all_data) {
                                  $count=1;
                                      for($i=0;$i<sizeof($purchase_all_data);$i++){ ?>
                       <tr class="avoid-page-break">
                           
                            <td style="font-size: 15px;"><?php echo $count; ?></td>
   
                            <td style="font-size: 15px;"><?php  echo $purchase_all_data[$i]['trucking_date']; ?></td>
                            <td style="font-size: 15px;"><?php echo $purchase_all_data[$i]['qty']; ?></td>
                            <td style="font-size: 15px;"><?php echo $purchase_all_data[$i]['description']; ?></td>
                            <td style="font-size: 15px;"><?php  echo $currency; ?><?php echo $purchase_all_data[$i]['rate']; ?></td>
                            <td style="font-size: 15px;"><?php echo $purchase_all_data[$i]['pro_no_reference']; ?></td>
                            <td style="font-size: 15px;"><?php  echo $currency; ?><?php  echo $purchase_all_data[$i]['total']; ?></td> 
                       </tr>
                       <?php $count++;}} ?>
                       </tbody>
                                      
                       <tbody>
                   <?php ?>
                                
                   <tfoot>
                       <tr class="avoid-page-break">
                       <td colspan="6" style="text-align:right;font-weight:bold;"><?php echo display('Total') ?>:</td>
                           <td style="font-size: 16px;"><?php  echo $currency; ?><?php echo $total_amt;  ?></td>
                       </tr>
                       <tr class="avoid-page-break">
                          
                          <td colspan="6" style="text-align:right;font-weight:bold;"><?php echo  "Tax (".$tax_des;  ?></td>
                                 <td style="font-size: 16px;"><?php  echo $currency; ?><?php echo $tax_amt;  ?></td>
                             </tr>
                          <tr>
                       <tr class="avoid-page-break">
                           <td colspan="6" style="text-align:right;font-weight:bold;"><?php echo display('Grand Total') ?>:</td>
                           <td style="font-size: 16px;"><?php  echo $currency; ?><?php echo $grandtotal;  ?></td>
                       </tr>
                       <tr class="avoid-page-break">
                           <td colspan="6" style="text-align:right;font-weight:bold;"><?php echo display('Grand Total') ?> <?php echo display('Preferred Currency') ?>:</td>
                           <td style="font-size: 16px;"><?php echo $customer_currency." ".$purchase_all_data[0]['customer_gtotal'];  ?></td>
                       </tr>
                       <tr class="avoid-page-break">
                       <td style="text-align:right;"  colspan="6"><b><?php echo display('Amount Paid') ?>:</b></td>
                           <td style="font-size: 16px;"> <?php echo $customer_currency." ".$purchase_all_data[0]['amt_paid'] ;?></td>
                       </tr>
                       <tr class="avoid-page-break">
                       <td style="text-align:right;"  colspan="6"><b><?php echo display('Balance') ?>:</b></td>
                           <td style="font-size: 16px;"> <?php echo $customer_currency." ".$purchase_all_data[0]['balance'] ;?></td>
                       </tr>
                      
                       </tfoot>
               </table>
               <br>
   
               <h4 class="avoid-page-break"><?php echo display('Remarks') ?>:</h4> <?php echo $remarks;  ?> <br/><br/> 
            </div>



            <?php 

}
elseif($template==4)
{
    ?>    
        
        
    
        
      
        <div id="head"></div>

        




        <div class="invoice-12 invoice-content" id="content"  style="padding:0px;">
    <div class="container" style="padding:0px;" >
        <div class="row">
            <div class="col-lg-12">
                <div class="invoice-inner clearfix">
                  <div style="color:red;"></div>
                   <div style="color:red;"></div>
                    <div class="invoice-info clearfix" >
                        <div class="invoice-contant">



 
 <div class="row"  style="text-align: center;" >
 <div class="col-sm-12" >
 <div class="col-sm-4"></div>
                        <?php if(empty($header)){ ?>
         <div class="col-sm-4 text-center" style="color:black;">
            <h3  style="text-align:start;" ><?php echo "TRUCKING"; ?></h3>
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
                                          <p class="mb-0"><strong><?php echo display('Invoice No') ?></strong> : <span><strong><?php  echo $invoice_no; ?></strong></span></p>
                                            <p class="mb-0"> <?php echo display('Invoice Date') ?>  : <span><?php  echo $invoice_date; ?></span></p>
                                    </div>
                                 </div>
                              
                            
                            
                            
                            <hr>
                          
                            
                            <div class="invoice-top">
                                <div class="row">
                                    <div class="col-md-4 col-sm-6 mb-30">
                                        <div class="invoice-number">
                                             <h4 class="inv-title-1" style="font-weight:bold;color:<?php echo '#' . $color ?> "><?php echo display('Customer Name') ?></h4>
                                            <h2 class="name mb-10"><?php echo $customer_name; ?></h2>
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-sm-6 mb-30">
                                        <div class="invoice-number">
                                            <div class="invoice-number-inner">
                                                        <h4 class="inv-title-1" style="font-weight:bold;color:<?php echo '#' . $color ?> "><?php echo display('Shipment company') ?></h4>
                                                <h2 class="name mb-10"><?php echo $shipment_company; ?></h2>
                                            </div>
                                        </div>
                                    </div>

                                           <div class="col-md-4 col-sm-6 mb-30 invoice-contact-us">
                                    <h4 class="inv-title-1" style="font-weight:bold;color:<?php echo "#".$color; ?> ">Company Information</h4>
                                    <h2 class="name mb-10"></h2>
                                    <ul class="link">

                                       
                                       <li>
                                                <i class="fas fa-building"></i> <?php echo $cname; ?>
                                            </li>
                                            <li>
                                                <i class="fa fa-map-marker"></i> <?php echo $address; ?>
                                            </li>
                                            <li>
                                                <i class="fa fa-envelope"></i> <a> <?php echo $email; ?></a>
                                            </li>
                                            <li>
                                                <i class="fa fa-phone"></i> <a><?php echo $phone; ?></a>
                                            </li>
                        
                                        </ul>  
                                    </div>
                                </div>
                            </div>
                             
                             
                             
                             
                            
                            
                             <div class="invoice-center">
                                <div class="order-summary">
                                    <div class="table-outer">
                                        <table style="width:100%" class="default-table invoice-table" border="1" cellpadding="0" cellspacing="0">
                                            <thead  style="background-color:<?php  echo  $color; ?>;color:black;">
                                            <tr>
                                                <th><?php echo display('Container / Goods Pick up date') ?></th>
                                                <th><?php echo display('Delivery to') ?></th>
                                                <th><?php   echo display('Truck No') ?></th>
                                             </tr>
                                            </thead>

                                            <tbody>
                                            <tr style="text-align:center;">
                                                <td><?php  echo $container_pickup_date; ?></td>
                                                <td><?php  echo $delivery_to ; ?></td>
                                                <td><?php  echo $truck_no; ?></td>
                                             </tr>
                                           
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="invoice-center">
                                <div class="order-summary">
                                    <div class="table-outer">
                   
                                    <table class="table-bordered">
                <thead style="background-color:<?php echo '#' . $color ?>">
                    <tr class="avoid-page-break" >

                        <th data-column-id="id" class="ID"   style="width:30px;" ><?php echo display('S.No') ?></th>
                        <th class="text-center text-white"><?php echo display('Date') ?></th>
                        <th class="text-center text-white"><?php echo display('Quantity') ?></th>
                        <th class="text-center text-white"><?php echo display('Description') ?></th>
                        <th class="text-center text-white"><?php echo display('Rate') ?></th>
                        <th class="text-center text-white"><?php echo display('Pro No / Reference') ?></th>
                        <th class="text-center text-white"><?php echo display('Total') ?></th>
                    </tr>
                </thead>




                    <tbody>
                <?php
                                    if ($purchase_all_data) {
                               $count=1;
                                   for($i=0;$i<sizeof($purchase_all_data);$i++){ ?>
              
                    <tr class="avoid-page-break" >
                    <td style="font-size: 15px;"><?php echo $count; ?></td>
                        <td style="font-size: 15px;"><?php  echo $purchase_all_data[$i]['trucking_date']; ?></td>
                         <td style="font-size: 15px;"><?php echo $purchase_all_data[$i]['qty']; ?></td>

                         <td style="font-size: 15px;"><?php echo $purchase_all_data[$i]['description']; ?></td>

                       


                         <td style="font-size: 15px;"><?php  echo $currency; ?><?php echo $purchase_all_data[$i]['rate']; ?></td>
                         <td style="font-size: 15px;"><?php echo $purchase_all_data[$i]['pro_no_reference']; ?></td>

                         <td style="font-size: 15px;"><?php  echo $currency; ?><?php  echo $purchase_all_data[$i]['total']; ?></td> 
                    </tr>
                    <?php $count++;}} ?>
                    </tbody>
                                   
                    <tbody>
                <?php ?>
                             
                <tfoot>
                    <tr class="avoid-page-break">
                        <td colspan="6" style="text-align:right;font-weight:bold;"><?php echo display('Total') ?>:</td>
                        <td style="font-size: 16px;"><?php  echo $currency; ?><?php echo $total_amt;  ?></td>
                    </tr>
                    <tr class="avoid-page-break">
                       
                       <td colspan="6" style="text-align:right;font-weight:bold;"><?php echo  "Tax (".$tax_des;  ?></td>
                              <td style="font-size: 16px;"><?php  echo $currency; ?><?php echo $tax_amt;  ?></td>
                          </tr>
                       <tr>
                    <tr class="avoid-page-break">
                        <td colspan="6" style="text-align:right;font-weight:bold;"><?php echo display('Grand Total') ?>:</td>
                        <td style="font-size: 16px;"><?php  echo $currency; ?><?php echo $grandtotal;  ?></td>
                    </tr>
                    <tr class="avoid-page-break">
                        <td colspan="6" style="text-align:right;font-weight:bold;"><?php echo display('Grand Total') ?> <?php echo display('Preferred Currency') ?>:</td>
                        <td style="font-size: 16px;"><?php echo $customer_currency." ".$purchase_all_data[0]['customer_gtotal'];  ?></td>
                    </tr>
                    <tr class="avoid-page-break">
                    <td style="text-align:right;"  colspan="6"><b><?php echo display('Amount Paid') ?>:</b></td>
                        <td style="font-size: 16px;"> <?php echo $customer_currency." ".$purchase_all_data[0]['amt_paid'] ;?></td>
                    </tr>
                    <tr class="avoid-page-break">
                    <td style="text-align:right;"  colspan="6"><b><?php echo display('Balance') ?>:</b></td>
                        <td style="font-size: 16px;"> <?php echo $customer_currency." ".$purchase_all_data[0]['balance'] ;?></td>
                    </tr>
                    </tfoot>
            </table>
                                    </div>
                            
                                    </div>
                                    </div>



                              
                            <div class="invoice-bottom">
                                <div class="row">
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                        <!-- <div class="terms-conditions mb-30">
                                            <h3 class="inv-title-1 mb-10" style="font-size: 18px;font-weight:bold;">Account Details/Additional Information</h3>
                                            <?php echo $all_invoice[0]['ac_details'];  ?>
                                        </div> -->
                                          <div class="terms-conditions mb-30">
                                            <h3 class="inv-title-1 mb-10 avoid-page-break" style="font-size: 18px;font-weight:bold;">Remarks</h3>
                                            <?php echo $remarks;  ?>
                                        </div>


                                

                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <div class="payment-method mb-30">
                                            <h3 style="font-size: 18px;font-weight:bold;" class="inv-title-1 mb-10 avoid-page-break">Payment Info :</h3>
                                            <ul class="payment-method-list-1 text-14" style="font-size: 12px;">
                                            <li><strong><?php echo display('Delivery Date') ?>  : &nbsp;</strong> <?php  echo $delivery_date; ?></li>

                                            <li><strong><?php echo display('Delivery Time') ?>  : &nbsp;</strong><?php echo "<span style='font-weight:bold'>From :</span>".$delivery_time_from." <span style='font-weight:bold'>To :</span>".$delivery_time_to; ?></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
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

         
        
        
        
        
        
 

        
        
        
        <?php 
}
 ?>
 
 



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
 background-color:<?php  echo '#' . $color ?>;
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
    width: 100px;
    height: 300px;
    position: absolute;
    bottom: 0;
    right: 0;
    background-color: <?php  echo '#' . $color ?>;
    background-size: cover;
    z-index: -1;
}
.invoice-12 .invoice-info:before {
    content: "";
    width: 100px;
    height: 300px;
    position: absolute;
    top: 0;
    left: 0;
     background-color: <?php  echo '#' . $color ?>;
    background-size: cover;
    z-index: -1;
}
.invoice-12 .default-table thead {
  
   background-color: <?php  echo '#' . $color ?>;
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
 background-color:<?php  echo '#' . $color ?>;
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
    background-color: <?php  echo '#' . $color ?>;
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
     background-color: <?php  echo '#' . $color ?>;
    background-size: cover;
    z-index: -1;
}
.invoice-12 .default-table thead {
   background-color: <?php  echo '#' . $color ?>;
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

<div class="modal fade" id="myModal_sale" role="dialog" >
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="width: 500px;height:100px;text-align:center;margin-bottom: 300px;">
        <div class="modal-header" style="color:white;background-color:#38469f;">
      
        <h4 class="modal-title"><?php echo 'Sales - Road Transport' ?></h4>
        </div>
        <div class="content">

        <div class="modal-body" style="text-align:center;font-weight:bold;">
          
        <h4><?php echo 'Road Transport Downloaded Successfully' ?></h4>
     
        </div>
        <div class="modal-footer">
        </div>
        </div>
      </div>
      
    </div>
  </div>




  

            
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



<script>

$(document).ready(function () {
  // window.onload =function (){
  $("#content").attr("hidden", true);

 var img = document.createElement("img");
img.src = "<?php  echo  base_url() ?>/asset/images/icons/loading.gif";
var src = document.getElementById("head");
src.appendChild(img);


     const element = document.getElementById("content");

    // clone the element
    var clonedElement = element.cloneNode(true);

    // change display of cloned element 
    $(clonedElement).css("display", "block");
    var pdf = new jsPDF('p','pt','a4');

function first(callback1,callback2){
setTimeout( function(){
    // var pdf = new jsPDF('p','pt','a4');
    // const invoice = document.getElementById("content");
            // console.log(invoice);
             console.log(window);
             var pageWidth = 8.5;
             var margin=0.5;
             var opt = {
  lineHeight : 1.2,
  margin : 0,
  maxLineWidth : pageWidth - margin *1,
                 filename: 'invoice'+'.pdf',
                 allowTaint: true,
                 html2canvas: { scale: 3 },
                 jsPDF: { unit: 'in', format: 'a4', orientation: 'portrait' }
             };
              html2pdf().from(clonedElement).set(opt).toPdf().get('pdf').then(function (pdf) {
  var totalPages = pdf.internal.getNumberOfPages();
 for (var i = 1; i <= totalPages; i++) {
    pdf.setPage(i);
    pdf.setFontSize(10);
    pdf.setTextColor(150);
  }
  }).save('TRUCKING_<?php  echo $invoice_no.'.pdf'  ?>');
   
 
  
  callback1();
    callback2();
         clonedElement.remove();
 $("#content").attr("hidden", true);
 }, 3000 );
}
function second(){
setTimeout( function(){
    $( '#myModal_sale' ).addClass( 'open' );
if ( $( '#myModal_sale' ).hasClass( 'open' ) ) {
  $( '.container' ).addClass( 'blur' );
}
$( '.close' ).click(function() {
  $( '#myModal_sale' ).removeClass( 'open' );
  $( '.cont' ).removeClass( 'blur' );
});
}, 3500 );
}
function third(){
    setTimeout( function(){
        window.location='<?php  echo base_url();   ?>'+'Cinvoice/manage_trucking';
        window.close();
    }, 4000 );
}
first(second,third);
});

   </script>

