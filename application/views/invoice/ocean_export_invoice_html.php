

   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    
  
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
    <div class="">
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
      <!-- <table id="tab"> -->
           
   <div id="head"></div>      
 <div class="container" id="content">
 <?php 
 // $template=2;
  if($template==2)
  {
    ?>
     
     
   

     <?php if(empty($header)){ ?>
         <div class="col-sm-4text-center" style="color:black;">
            <h3  style="text-align: center;" ><?php echo "OCEAN EXPORT"; ?></h3>
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
    



       <div class="col-sm-4 text-center" style="color:white;"><h3 style="text-align: center;" > </h3></div>






     <!--<div class="col-sm-6" style="color:white;font-weight:bold;position: absolute;right:-100;" id='company_info'>-->
     <!--     <b> <?php echo display('Company name') ?> : </b><?php echo $business_name; ?><br>-->
     <!--     <b>   <?php echo display('Address') ?>  : </b><?php echo $address; ?><br>-->
     <!--     <b>   <?php echo display('Email') ?>  : </b><?php echo $email; ?><br>-->
     <!--     <b>   <?php echo display('Contact') ?>  : </b><?php echo $phone; ?><br>-->
     <!--  </div>-->
       
       
       
       
        <div class="col-sm-5" style="color:white;font-weight:bold;absolute;right:-100;" id='company_info'>          
     <b>  <?php echo display('Company name') ?> : </b><?php echo $business_name; ?><br>
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
    <tr><td  class="key"><?php echo display('Shipper') ?> </td><td style="width:10px;">:</td><td calss="value"><?php echo $supplier;  ?></td></tr>
    <tr><td  class="key"><?php echo display('Invoice Date') ?> </td><td style="width:10px;">:</td><td calss="value"><?php echo $invoice_date;  ?></td></tr>
    <tr><td  class="key"><?php echo display('Notify Party') ?> </td><td style="width:10px;">:</td><td calss="value"><?php echo $notify_party; ?></td></tr>
    <tr><td  class="key"><?php echo display('Voyage No') ?> </td><td style="width:10px;">:</td><td calss="value"> <?php echo $voyage_no;  ?></td></tr>
    <tr><td  class="key"><?php echo display('Port of discharge') ?> </td><td style="width:10px;">:</td><td calss="value"><?php echo $port_of_discharge;  ?></td></tr>
    <tr><td  class="key"><?php echo display('Customs Broker Name') ?> </td><td style="width:10px;">:</td><td calss="value"><?php echo $customs_broker_name;  ?></td></tr>
    <tr><td  class="key"><?php echo display('HBL NO') ?> </td><td style="width:10px;">:</td><td calss="value"> <?php echo $hbl_no;  ?></td></tr>
    <tr><td  class="key"><?php echo display('AMS NO') ?> </td><td style="width:10px;">:</td><td calss="value"><?php echo $ams_no;  ?></td></tr>
    <tr><td  class="key"><?php echo display('Container No') ?> </td><td style="width:10px;">:</td><td calss="value"><?php echo $container_no;  ?></td></tr>
    <tr><td  class="key"><?php echo display('Freight forwarder') ?> </td><td style="width:10px;">:</td><td calss="value"> <?php echo $freight_forwarder;  ?></td></tr>
    <tr><td  class="key"><?php echo display('Estimated time of departure') ?> </td><td style="width:10px;">:</td><td calss="value"><?php echo $etd;  ?></td></tr>
   <!-- <tr><td  class="key"><?php echo display('Country of Origin') ?> </td><td style="width:10px;">:</td><td calss="value"><?php //echo $country_of_origin;  ?></td></tr>-->
    
</table>

                </div>
                <div class="col-6">
                <table id="two">
<tr><td  class="key"><?php echo display('Booking No') ?> </td><td style="width:10px;">:</td><td calss="value"><?php echo $booking_no;  ?></td></tr>
    <tr><td  class="key"><?php echo display('Customer / Consignee')?> </td><td style="width:10px;">:</td><td calss="value"><?php echo $customer_name;  ?></td></tr>
    <tr><td  class="key"><?php echo display('Vessel') ?> </td><td style="width:10px;">:</td><td calss="value"><?php  echo $vessel;   ?></td></tr>
    <tr><td class="key"><?php echo display('Port of loading') ?> </td><td style="width:10px;">:</td><td calss="value"><?php echo $port_of_loading;  ?></td></tr>
    <tr><td  class="key"><?php echo display('Place of Delivery') ?> </td><td style="width:10px;">:</td><td calss="value"><?php echo $place_of_delivery;  ?></td></tr>
    <tr><td  class="key"><?php echo display('MBL NO') ?> </td><td style="width:10px;">:</td><td calss="value"><?php echo $mbl_no;  ?></td></tr>
    <tr><td  class="key"><?php echo display('OBL NO') ?> </td><td style="width:10px;">:</td><td calss="value"><?php echo $obl_no;  ?></td></tr>
    <tr><td  class="key"><?php echo display('ISF NO') ?> </td><td style="width:10px;">:</td><td calss="value"><?php echo $isf_no;  ?></td></tr>
    <tr><td  class="key"><?php echo display('Seal NO') ?> </td><td style="width:10px;">:</td><td calss="value"><?php echo $seal_no;  ?></td></tr>
    <tr><td  class="key"><?php echo display('Estimated time of Arrival') ?> </td><td style="width:10px;">:</td><td calss="value"><?php echo $eta;  ?></td></tr>
    <tr><td  class="key"><?php echo 'Remarks/Particulars';?> </td><td style="width:10px;">:</td><td calss="value"><?php echo $particular;  ?></td></tr>
</table>
    </div>
               
             
            </div>
            <br>
        </div>
        <?php 

}
elseif($template==1)
{
?> 
<div>

<?php if(empty($header)){ ?>
  <div class="col-sm-4text-center" style="color:black;"><h3  style="text-align: center;" ><?php echo "OCEAN EXPORT"; ?></h3></div>
 <?php } 
else
{  ?>
  <h3 style="text-align: center;color:black;" ><?php echo $header; ?></h3>
<?php } ?>






 <div class="brand-section" style="background-color:<?php echo '#' .$color; ?>">
<div class="row" >

    
<div class="col-sm-5" style="color:white;font-weight:bold;" id='company_info'>
   
 <b> <?php echo display('Company name') ?> : </b><?php echo $business_name; ?><br>
          <b>   <?php echo display('Address') ?>  : </b><?php echo $address; ?><br>
          <b>   <?php echo display('Email') ?>  : </b><?php echo $email; ?><br>
          <b>   <?php echo display('Contact') ?>  : </b><?php echo $phone; ?><br>
       </div>

<div class="col-sm-5"></div>
 <div class="col-sm-2" style="margin-top:-50px;position: relative; text-align: center;">
            <img src="<?php echo base_url().$logo; ?>" style="width: 150%; position: absolute; top: 0; right: 0;" />
         </div>

</div>
</div>













        <div class="body-section">
            <div class="row">
            <div class="col-6">
            <table id="one" >
            <tr><td  class="key"><?php echo display('Shipper') ?> </td><td style="width:10px;">:</td><td calss="value"><?php echo $supplier;  ?></td></tr>
    <tr><td  class="key"><?php echo display('Invoice Date') ?> </td><td style="width:10px;">:</td><td calss="value"><?php echo $invoice_date;  ?></td></tr>
    <tr><td  class="key"><?php echo display('Notify Party') ?> </td><td style="width:10px;">:</td><td calss="value"><?php echo $notify_party; ?></td></tr>
    <tr><td  class="key"><?php echo display('Voyage No') ?> </td><td style="width:10px;">:</td><td calss="value"> <?php echo $voyage_no;  ?></td></tr>
    <tr><td  class="key"><?php echo display('Port of discharge') ?> </td><td style="width:10px;">:</td><td calss="value"><?php echo $port_of_discharge;  ?></td></tr>
    <tr><td  class="key"><?php echo display('Customs Broker Name') ?> </td><td style="width:10px;">:</td><td calss="value"><?php echo $customs_broker_name;  ?></td></tr>
    <tr><td  class="key"><?php echo display('HBL NO') ?> </td><td style="width:10px;">:</td><td calss="value"> <?php echo $hbl_no;  ?></td></tr>
    <tr><td  class="key"><?php echo display('AMS NO') ?> </td><td style="width:10px;">:</td><td calss="value"><?php echo $ams_no;  ?></td></tr>
    <tr><td  class="key"><?php echo display('Container No') ?> </td><td style="width:10px;">:</td><td calss="value"><?php echo $container_no;  ?></td></tr>
    <tr><td  class="key"><?php echo display('Freight forwarder') ?> </td><td style="width:10px;">:</td><td calss="value"> <?php echo $freight_forwarder;  ?></td></tr>
    <tr><td  class="key"><?php echo display('Estimated time of departure') ?> </td><td style="width:10px;">:</td><td calss="value"><?php echo $etd;  ?></td></tr>
   <!-- <tr><td  class="key">Country of Origin</td><td style="width:10px;">:</td><td calss="value"><?php// echo $country_of_origin;  ?></td></tr>-->
   
</table>

                </div>
                <div class="col-6">
                <table id="two">
                <tr><td  class="key"><?php echo display('Booking No') ?> </td><td style="width:10px;">:</td><td calss="value"><?php echo $booking_no;  ?></td></tr>
    <tr><td  class="key"><?php echo display('Customer / Consignee')?> </td><td style="width:10px;">:</td><td calss="value"><?php echo $customer_name;  ?></td></tr>
    <tr><td  class="key"><?php echo display('Vessel') ?> </td><td style="width:10px;">:</td><td calss="value"><?php  echo $vessel;   ?></td></tr>
    <tr><td class="key"><?php echo display('Port of loading') ?> </td><td style="width:10px;">:</td><td calss="value"><?php echo $port_of_loading;  ?></td></tr>
    <tr><td  class="key"><?php echo display('Place of Delivery') ?> </td><td style="width:10px;">:</td><td calss="value"><?php echo $place_of_delivery;  ?></td></tr>
    <tr><td  class="key"><?php echo display('MBL NO') ?> </td><td style="width:10px;">:</td><td calss="value"><?php echo $mbl_no;  ?></td></tr>
    <tr><td  class="key"><?php echo display('OBL NO') ?> </td><td style="width:10px;">:</td><td calss="value"><?php echo $obl_no;  ?></td></tr>
    <tr><td  class="key"><?php echo display('ISF NO') ?> </td><td style="width:10px;">:</td><td calss="value"><?php echo $isf_no;  ?></td></tr>
    <tr><td  class="key"><?php echo display('Seal NO') ?> </td><td style="width:10px;">:</td><td calss="value"><?php echo $seal_no;  ?></td></tr>
    <tr><td  class="key"><?php echo display('Estimated time of Arrival') ?> </td><td style="width:10px;">:</td><td calss="value"><?php echo $eta;  ?></td></tr>
    <tr><td  class="key"><?php echo 'Remarks/Particulars';?> </td><td style="width:10px;">:</td><td calss="value"><?php echo $particular;  ?></td></tr>
</table>
    </div>
               
             
            </div>
            <br>
        </div>

        <?php 

}
elseif($template==3)
{
?>
<div class="brand-section" style="background-color:<?php echo '#' . $color;  ?>">


<div class="row" >
        <?php if(empty($header)){ ?>
  <div class="col-sm-4 text-center" style="color:white;"><h3><?php echo "OCEAN EXPORT"; ?></h3></div>
 <?php } 
else
{  ?>
  <h3 style="text-align: center;color:black;" ><?php echo $header; ?></h3>
<?php } ?>


        <div class="col-sm-3"><img src="<?php echo  base_url().$logo; ?>"   style='width: 50%;float:right;'  /></div>

    
     <div class="col-sm-5" style="color:white;font-weight:bold ;" id='company_info'>
           
     <b> <?php echo display('Company name') ?> : </b><?php echo $business_name; ?><br>
          <b>   <?php echo display('Address') ?>  : </b><?php echo $address; ?><br>
          <b>   <?php echo display('Email') ?>  : </b><?php echo $email; ?><br>
          <b>   <?php echo display('Contact') ?>  : </b><?php echo $phone; ?><br>
       </div>
     </div>







        </div>
        <div class="body-section">
        <div class="row">
        <div class="col-sm-6 "></div>
            <div class="col-sm-6 " style="width:50%;">
             <table>
          
     
</tr>        
             
</table>
            </div></div>
              <div class="row"> <div class="col-sm-12 ">&nbsp;</div></div>
            <div class="row">
            <div class="col-6">
                <table id="one" >
                <tr><td  class="key"><?php echo display('Shipper') ?> </td><td style="width:10px;">:</td><td calss="value"><?php echo $supplier;  ?></td></tr>
    <tr><td  class="key"><?php echo display('Invoice Date') ?> </td><td style="width:10px;">:</td><td calss="value"><?php echo $invoice_date;  ?></td></tr>
    <tr><td  class="key"><?php echo display('Notify Party') ?> </td><td style="width:10px;">:</td><td calss="value"><?php echo $notify_party; ?></td></tr>
    <tr><td  class="key"><?php echo display('Voyage No') ?> </td><td style="width:10px;">:</td><td calss="value"> <?php echo $voyage_no;  ?></td></tr>
    <tr><td  class="key"><?php echo display('Port of discharge') ?> </td><td style="width:10px;">:</td><td calss="value"><?php echo $port_of_discharge;  ?></td></tr>
    <tr><td  class="key"><?php echo display('Customs Broker Name') ?> </td><td style="width:10px;">:</td><td calss="value"><?php echo $customs_broker_name;  ?></td></tr>
    <tr><td  class="key"><?php echo display('HBL NO') ?> </td><td style="width:10px;">:</td><td calss="value"> <?php echo $hbl_no;  ?></td></tr>
    <tr><td  class="key"><?php echo display('AMS NO') ?> </td><td style="width:10px;">:</td><td calss="value"><?php echo $ams_no;  ?></td></tr>
    <tr><td  class="key"><?php echo display('Container No') ?> </td><td style="width:10px;">:</td><td calss="value"><?php echo $container_no;  ?></td></tr>
    <tr><td  class="key"><?php echo display('Freight forwarder') ?> </td><td style="width:10px;">:</td><td calss="value"> <?php echo $freight_forwarder;  ?></td></tr>
    <tr><td  class="key"><?php echo display('Estimated time of departure') ?> </td><td style="width:10px;">:</td><td calss="value"><?php echo $etd;  ?></td></tr>
   
 
</table>

                </div>
                <div class="col-6">
                <table id="two">
                <tr><td  class="key"><?php echo display('Booking No') ?> </td><td style="width:10px;">:</td><td calss="value"><?php echo $booking_no;  ?></td></tr>
    <tr><td  class="key"><?php echo display('Customer / Consignee')?> </td><td style="width:10px;">:</td><td calss="value"><?php echo $customer_name;  ?></td></tr>
    <tr><td  class="key"><?php echo display('Vessel') ?> </td><td style="width:10px;">:</td><td calss="value"><?php  echo $vessel;   ?></td></tr>
    <tr><td class="key"><?php echo display('Port of loading') ?> </td><td style="width:10px;">:</td><td calss="value"><?php echo $port_of_loading;  ?></td></tr>
    <tr><td  class="key"><?php echo display('Place of Delivery') ?> </td><td style="width:10px;">:</td><td calss="value"><?php echo $place_of_delivery;  ?></td></tr>
    <tr><td  class="key"><?php echo display('MBL NO') ?> </td><td style="width:10px;">:</td><td calss="value"><?php echo $mbl_no;  ?></td></tr>
    <tr><td  class="key"><?php echo display('OBL NO') ?> </td><td style="width:10px;">:</td><td calss="value"><?php echo $obl_no;  ?></td></tr>
    <tr><td  class="key"><?php echo display('ISF NO') ?> </td><td style="width:10px;">:</td><td calss="value"><?php echo $isf_no;  ?></td></tr>
    <tr><td  class="key"><?php echo display('Seal NO') ?> </td><td style="width:10px;">:</td><td calss="value"><?php echo $seal_no;  ?></td></tr>
    <tr><td  class="key"><?php echo display('Estimated time of Arrival') ?> </td><td style="width:10px;">:</td><td calss="value"><?php echo $eta;  ?></td></tr>
    <tr><td  class="key"><?php echo 'Remarks/Particulars';?> </td><td style="width:10px;">:</td><td calss="value"><?php echo $particular;  ?></td></tr>
</table>
    </div>
               
             
            </div>
            <br>
          
        </div>
        
        
        
        
        
        
      
        <?php 

}
elseif($template==4)
{
?>  
           <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" rel="stylesheet">
     
        
 


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
            <h3  style="text-align:start;" ><?php echo "OCEAN EXPORT"; ?></h3>
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
     
 
     <div class="col-sm-3" style='margin-top:-50px;'><img src="<?php echo  base_url().$logo; ?>"   style='width: 100%;'  /></div>

 
 
<div class="col-sm-5 text-center" style="color:white;"> </div>
 

 <div class="col-sm-4"  style="text-align:start" id='company_info'>
 

                                   <p class="mb-0"><strong><?php echo display('Invoice Date') ?></strong> : <span><strong><?php  echo $invoice_date; ?></strong></span></p>
                                            <p class="mb-0"> <?php echo display('Container No') ?>  : <span><?php  echo $container_no; ?></span></p>
                                            <p><?php echo display('Booking No') ?>  : <span><?php  echo $booking_no; ?></span></p>

 
  </div>

                                </div>
 
<hr>


                    <div class="invoice-top"  style="background-color:white;" >
                                <div class="row">
                                    <div class="col-md-4 col-sm-6 mb-30">
                                        <div class="invoice-number">
                                            <h4 class="inv-title-1" style="font-weight:bold;color:<?php echo '#' . $color;  ?> "><?php echo display('Shipper') ?></h4>
                                            <h2 class="name mb-10"><?php echo $supplier; ?></h2>
                                            <p class="invo-addr-1 mb-0">
                                            <?php  //echo $all_invoice[0]['shipping_address'] ; ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 mb-30">
                                        <div class="invoice-number">
                                            <div class="invoice-number-inner">
                                                <h4 class="inv-title-1" style="font-weight:bold;color:<?php echo '#' . $color;  ?> "><?php echo  ('Customer')?></h4>
                                                <h2 class="name mb-10"><?php echo $customer_name; ?></h2>
                                                <p class="invo-addr-1 mb-0">
                                                    <?php//  echo $all_invoice[0]['shipping_address'] ; ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 mb-30 invoice-contact-us">
                                        <h4 class="inv-title-1" style="font-weight:bold;color:<?php echo '#' . $color;  ?> ">Company Information</h4>
                                        <h2 class="name mb-10"></h2>
                                        <ul class="link">

                                            <li>
                                                <i class="fas fa-building"></i> <?php echo $business_name; ?>
                                            </li>

                                             <li>
                                                <i class="fa fa-map-marker"></i> <?php echo $address; ?>
                                            </li>
                                            <li>
                                                  <i class="fa fa-envelope"></i> <a> <?php echo $email; ?></a>
                                            </li>
                                            <li>
                                                <i class="fa fa-phone"></i> <a href="tel:+55-417-634-7071"><?php echo $phone; ?></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                                  
                            
                
                            
                            <div class="invoice-center">
                                <div class="order-summary"  style="background-color:white;" >
                                    <div class="table-outer">
                                        <table class="default-table invoice-table" border="1" cellpadding="0" cellspacing="0">
                                            <thead  style="background-color:<?php  echo '#' . $color;  ?>;color:black;">
                                            <tr>
                                                <th><?php echo display('Port of discharge');?></th>
                                                <th><?php echo display('Place of Delivery');?></th>
                                                <th><?php echo display('Estimated Time Of Depature');?></th>
                                                <th><?php echo display('Estimated time of Arrival');?></th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            <tr style="text-align:center;">
                                                <td><?php  echo $port_of_discharge ; ?></td>
                                                <td><?php  echo $place_of_delivery ; ?></td>
                                                <td><?php  echo $etd ; ?></td>
                                                <td><?php echo $eta; ?></td>
                                            </tr>
                                           
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        


                            <div class="invoice-center">
                                <div class="order-summary"  style="background-color:white;">
                                    <div class="table-outer">
                                        <table class="default-table invoice-table" border="1" cellpadding="0" cellspacing="0">
                                            <thead  style="background-color:<?php  echo '#' . $color;  ?>;color:black;">
                                            <tr>
                                                <th><?php echo display('Customs Broker Name') ?></th>
                                                <th><?php echo display('HBL NO') ?></th>
                                                <th><?php echo display('AMS NO') ?></th>
                                                <th><?php echo display('MBL NO') ?> </th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            <tr style="text-align:center;">
                                                <td><?php  echo $customs_broker_name ; ?></td>
                                                <td><?php  echo $hbl_no ; ?></td>
                                                <td><?php  echo $ams_no ; ?></td>
                                                <td><?php echo $mbl_no; ?></td>
                                            </tr>
                                           
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

 


                    
  

                            <div class="invoice-center"  style="background-color:white;">
                                <div class="order-summary" >
                                    <div class="table-outer">
                                        <table class="default-table invoice-table" border="1" cellpadding="0" cellspacing="0">
                                            <thead  style="background-color:<?php  echo  $color; ?>;color:black;">
                                            <tr>
                                                <th><?php echo display('Voyage No');?></th>
                                                <th><?php echo display('Vessel');?></th>
                                                <th><?php echo display('Notify Party Email');?></th>
                                                <th><?php echo display('Freight Forwarder');?> </th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            <tr style="text-align:center;">
                                                <td><?php  echo $voyage_no ; ?></td>
                                                <td><?php  echo $vessel ; ?></td>
                                                <td><?php  echo $notify_party ; ?></td>
                                                <td><?php echo $freight_forwarder; ?></td>
                                            </tr>
                                           
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>






                            <div class="invoice-center" >
                                <div class="order-summary"  style="background-color:white;">
                                    <div class="table-outer">
                                        <table class="default-table invoice-table" border="1" cellpadding="0" cellspacing="0">
                                            <thead  style="background-color:<?php  echo  $color; ?>;color:black;">
                                            <tr>
                                                <th><?php echo display('Port of loading') ?></th>
                                                <th><?php echo display('OBL NO') ?></th>
                                                <th><?php echo display('ISF NO') ?></th>
                                                <th><?php echo display('Seal NO') ?> </th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            <tr style="text-align:center;">
                                                <td><?php  echo $port_of_loading ; ?></td>
                                                <td><?php  echo $obl_no ; ?></td>
                                                <td><?php  echo $isf_no ; ?></td>
                                                <td><?php echo $seal_no; ?></td>
                                            </tr>
                                           
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>











                            <div class="invoice-bottom"  style="background-color:white;">
                                <div class="row">
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                   
                                          <div class="terms-conditions mb-30">
                                            <h3 class="inv-title-1 mb-10" style="font-size: 18px;font-weight:bold;"><?php echo 'Remarks/Particulars' ; ?></h3>
                                            <?php echo $particular;  ?>
                                            
                                         
                                        
                                        </div>
                                    </div>
                                    <!-- <div class="col-lg-4 col-md-4 col-sm-4">
                                        <div class="payment-method mb-30">
                                            <h3 style="font-size: 18px;font-weight:bold;" class="inv-title-1 mb-10">Payment Info :</h3>
                                            <ul class="payment-method-list-1 text-14" style="font-size: 18px;">
                                                <li><strong>Payment Terms : &nbsp;</strong><?php  echo $payment_terms; ?></li>
                                                <li><strong>Payment Type    :&nbsp;&nbsp;&nbsp; </strong><?php  echo $paytype ; ?></li>
                                                <li><strong>Due date      : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong> <?php  echo $all_invoice[0]['payment_due_date'] ; ?></li>
                                            </ul>
                                        </div>
                                    </div> -->
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
        
        
        
    <style>

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
     background-color: <?php  echo '#' . $color;  ?>;
    background-size: cover;
    z-index: -1;
}
.invoice-12 .default-table thead {
  
   background-color: <?php  echo '#' . $color;  ?>;
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
 background-color:<?php  echo'#' . $color;  ?>;
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
  </style>    
        
        
        
  <?php  } ?>
    </div>
    </section> <!-- /.content -->
</div> <!-- /.content-wrapper -->
      <!-- </table> -->
      <div class="modal fade" id="myModal_download" role="dialog" >
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="width: 500px;margin-bottom:300px;height:100px;text-align:center;margin-top: 100px;">
        <div class="modal-header" style="color:white;background-color:#38469f;">
      
          <h4 class="modal-title"><?php echo display('Sales - Ocean Export') ?></h4>
        </div>
        <div class="content">

        <div class="modal-body">
          
          <h4><?php echo display('Ocean Export Downloaded Successfully') ?></h4>
     
        </div>
        <div class="modal-footer">
        </div>
        </div>
      </div>
      
    </div>
  </div>

      <style>

.key{
    text-align:left;
font-weight:bold;

}
.value{
    text-align:left;
}
#one,#two{
float:left;
width:100%;
}
body{
    width:100%;
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
    padding: 16px;
    border: 1px solid gray;
    
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
   
    background-color: #fff;
    width: 100%;
    border-collapse: collapse;
   
}

table thead tr{
    vertical-align: text-bottom;
    border-bottom: none !important;
            border: 1px solid #5961b3;
            background-color:  #5961b3;
   
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
    padding:10px;
    padding-top: 08px;
    padding-bottom: 05px;
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
  #head{
    text-align: center;
    margin-top: 250px;
}


@media print 
{ 
#head{display:none;} 
#content{display:block;} 
} 
#content{
    padding:0px;
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

$(document).ready(function () {
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
 
             console.log(window);
             var pageWidth = 8.5;
             var margin=0.5;
             var opt = {
   lineHeight : 1.2,
   margin : 0.2,
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
 
  }).save('Ocean_Export_<?php echo $booking_no.'.pdf'  ?>');
    callback1();
    callback2();
             clonedElement.remove();
 $("#content").attr("hidden", true);
 }, 2500 );

}

function second(){


setTimeout( function(){
    $( '#myModal_download' ).addClass( 'open' );

if ( $( '#myModal_download' ).hasClass( 'open' ) ) {
  $( '.container' ).addClass( 'blur' );
} 
$( '.close' ).click(function() {
  $( '#myModal_download' ).removeClass( 'open' );
  $( '.cont' ).removeClass( 'blur' );
});

}, 2500 );
}
function third(){
    setTimeout( function(){
        window.location='<?php  echo base_url();   ?>'+'Cinvoice/manage_ocean_export_tracking';
        window.close();
        
    }, 3500 );    
}
first(second,third); 

});
   </script>
 

  