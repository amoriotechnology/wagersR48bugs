

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
    
     if($template==3)
            {
            ?>
      <div class="brand-section" style="background-color:<?php echo '#' .$color; ?>" >
   <div class="row">
      


   


   <?php if(empty($header)){ ?>
  <div class="col-sm-4 text-center" style="color:white;"><h3><?php echo "PACKING LIST"; ?></h3></div>
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

        <div class="body-section">
            <div class="row">
                <div class="col-6">
                <table id="one" >
    <tr><td  class="key">Packing List NO</td><td style="width:10px;">:</td><td calss="value"><?php echo $all_invoice[0]['commercial_invoice_number'];  ?></td></tr>
    <tr><td  class="key">Gross Weight</td><td style="width:10px;">:</td><td calss="value"><?php echo $all_invoice[0]['total_amount']; ?></td></tr>
</table>
               </div>
                <div class="col-sm-6">
                <table id="two">
<tr><td  class="key">Invoice Date</td><td style="width:10px;">:</td><td calss="value"><?php echo $all_invoice[0]['date'];  ?></td></tr>
    <tr><td  class="key">Container No</td><td style="width:10px;">:</td><td calss="value"><?php echo $all_invoice[0]['container_no'];  ?></td></tr>
   </table> </div> 
            </div>
        </div>
         <div class="body-section">
          <div class="table-responsive">
     

   
<?php 


for($m=1;$m<count($all_invoice);$m++){ 
    ?>
    <table class="table table-bordered normalinvoice table-hover" id="normalinvoice_<?php  echo $m; ?>" >
            <thead style="background-color:<?php echo '#' .$color;  ?>">
                    <tr>                
                           <th rowspan="1" class="absorbing-column text-center text-white">Product Name</th>
                           <th rowspan="1" class="text-center text-white">Descrip<br/>tion</th>
                           <th rowspan="1" class="text-center text-white">Thick<br/>ness</th>


                        

                           <th rowspan="1" class="text-center text-white">Bundle No</th>
                           <th rowspan="1" class="text-center text-white">Slab No</th>
                           <th colspan="2" class="text-center text-white">Net<br/> Measure<br/>Width&#9475;Height</th>

                           <th rowspan="1" class="text-center text-white">Net <br/>Sq. Ft</th>                        
                           <!-- <th rowspan="1"  class="text-center text-white">sales_slab_price </th> -->


                    </tr> 
 </thead>
                <tbody id="addPurchaseItem_<?php echo $m;  ?>">
                                    <?php  $n=0; ?>
                                    <?php foreach($all_invoice as $inv){
                                        
                                      

$a = substr($inv['tableid'], 0, 1);
if($a==$m){
                                    
                                        ?>

                    <tr>

                       <td style="font-size: 10px;"><?php  echo $inv['product_name'];  ?></td>
                       <td style="font-size: 10px;"><?php  echo $inv['description'];  ?></td>
                       <td style="font-size: 10px;"><?php  echo $inv['thickness'];  ?></td>
                    

                         <td style="font-size: 10px;"><?php  echo $inv['bundle_no'];  ?></td>
                       <td style="font-size: 10px;"><?php echo $i+1; ?></td>
                       <td style="font-size: 10px;" class="net_width"><?php  echo $inv['n_width'];  ?></td>
                           <td style="font-size: 10px;" class="net_height"><?php  echo $inv['n_height'];  ?></td>
                                     <td style="font-size: 10px;" class="net_sq_ft"><?php  echo $inv['net_sqft'];  ?></td>
                     

                            <!-- <td style="font-size: 10px;"><?php  //echo $currency; ?><?php//echo $inv['sales_slab_price'];  ?></td> -->



                    </tr>
                    <?php $n++;}}  ?>

                </tbody>
                          <tfoot>
                                    <tr>
                                 
             <td style="text-align:right;" colspan="7"><b>Net Sq.ft :</b></td>
                                        <td >
             <input type="text" id="overall_net_<?php echo $m; ?>" name="overall_net[]"  class="overall_net"  style="border:none;width: 60px"   readonly="readonly"  /> 
            </td>

                                  
                                    </tr>

                                            </tfoot>
                            </table>
                            <?php   } ?>
            </table>
            <br>
          <h4>Remarks :</h4><?php echo $all_invoice[0]['remark']; ?>
        </div>    </div>

        <?php 

}
elseif($template==1)
{
?>     
   <div class="brand-section" style="background-color:<?php echo '#' .$color;  ?>" >
   <div class="row">
      



     <div class="col-sm-5" style="color:white;font-weight:bold;" id='company_info'>
            
           <b> Company name : </b><?php echo $company[0]['company_name']; ?><br>
           <b>   Address : </b><?php echo $company[0]['address']; ?><br>
           <b>   Email : </b><?php echo $company[0]['email']; ?><br>
           <b>   Contact : </b><?php echo $company[0]['mobile']; ?><br>
        </div>

        
       



        <?php if(empty($header)){ ?>
  <div class="col-sm-5 text-center" style="color:white;"><h3><?php echo "PACKING LIST"; ?></h3></div>
 <?php } 
else
{  ?>
        <div class="col-sm-5 text-center" style="color:white;"><h3><?php echo $header; ?></h3></div>
<?php } ?>






        <div class="col-sm-2"><img src="<?php echo  base_url().$logo; ?>"   style='width: 70%;'  /></div>









 </div>
        </div>

        <div class="body-section">
            <div class="row">
                <div class="col-6">
                <table id="one" >
    <tr><td  class="key">Packing List NO</td><td style="width:10px;">:</td><td calss="value"><?php echo $all_invoice[0]['commercial_invoice_number'];  ?></td></tr>
    <tr><td  class="key">Gross Weight</td><td style="width:10px;">:</td><td calss="value"><?php echo $all_invoice[0]['total_amount']; ?></td></tr>
</table>
               </div>
                <div class="col-sm-6">
                <table id="two">
<tr><td  class="key">Invoice Date</td><td style="width:10px;">:</td><td calss="value"><?php echo $all_invoice[0]['date'];  ?></td></tr>
    <tr><td  class="key">Container No</td><td style="width:10px;">:</td><td calss="value"><?php echo $all_invoice[0]['container_no'];  ?></td></tr>
   </table> </div> 
            </div>
        </div>
         <div class="body-section">
          <div class="table-responsive">
     

   
<?php 


for($m=1;$m<count($all_invoice);$m++){ 
    ?>
    <table class="table table-bordered normalinvoice table-hover" id="normalinvoice_<?php  echo $m; ?>" >
            <thead style="background-color:<?php echo '#' .$color;  ?>">
                    <tr>                
                           <th rowspan="1" class="absorbing-column text-center text-white">Product Name</th>
                           <th rowspan="1" class="text-center text-white">Descrip<br/>tion</th>
                           <th rowspan="1" class="text-center text-white">Thick<br/>ness</th>


                        

                           <th rowspan="1" class="text-center text-white">Bundle No</th>
                           <th rowspan="1" class="text-center text-white">Slab No</th>
                           <th colspan="2" class="text-center text-white">Net<br/> Measure<br/>Width&#9475;Height</th>

                           <th rowspan="1" class="text-center text-white">Net <br/>Sq. Ft</th>                        


                    </tr> 
 </thead>
                <tbody id="addPurchaseItem_<?php echo $m;  ?>">
                                    <?php  $n=0; ?>
                                    <?php foreach($all_invoice as $inv){
                                        
                                      

$a = substr($inv['tableid'], 0, 1);
if($a==$m){
                                    
                                        ?>

                    <tr>

                       <td style="font-size: 10px;"><?php  echo $inv['product_name'];  ?></td>
                       <td style="font-size: 10px;"><?php  echo $inv['description'];  ?></td>
                       <td style="font-size: 10px;"><?php  echo $inv['thickness'];  ?></td>
                    

                         <td style="font-size: 10px;"><?php  echo $inv['bundle_no'];  ?></td>
                       <td style="font-size: 10px;"><?php echo $i+1; ?></td>
                       <td style="font-size: 10px;" class="net_width"><?php  echo $inv['n_width'];  ?></td>
                           <td style="font-size: 10px;" class="net_height"><?php  echo $inv['n_height'];  ?></td>
                                     <td style="font-size: 10px;" class="net_sq_ft"><?php  echo $inv['net_sqft'];  ?></td>
                     




                    </tr>
                    <?php $n++;}}  ?>

                </tbody>
                          <tfoot>
                                    <tr>
                                 
             <td style="text-align:right;" colspan="7"><b>Net Sq.ft :</b></td>
                                        <td >
             <input type="text" id="overall_net_<?php echo $m; ?>" name="overall_net[]"  class="overall_net"  style="border:none;width: 60px"   readonly="readonly"  /> 
            </td>

                                  
                                    </tr>

                                            </tfoot>
                            </table>
                            <?php   } ?>
            </table>
            <br>
          <h4>Remarks :</h4><?php echo $all_invoice[0]['remark']; ?>
        </div>        </div>


        <?php 

}
elseif($template==2)
{
?> 
  <div class="brand-section" style="background-color:<?php echo '#' .$color;  ?>" >
   <div class="row">
      



   
   <div class="col-sm-3"><img src="<?php echo  base_url().$logo; ?>"   style='width: 70%;'  /></div>




<?php if(empty($header)){ ?>
  <div class="col-sm-3 text-center" style="color:white;"><h3><?php echo "PACKING LIST"; ?></h3></div>
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

        <div class="body-section">
            <div class="row">
                <div class="col-6">
                <table id="one" >
    <tr><td  class="key">Packing List NO</td><td style="width:10px;">:</td><td calss="value"><?php echo $all_invoice[0]['commercial_invoice_number'];  ?></td></tr>
    <tr><td  class="key">Gross Weight</td><td style="width:10px;">:</td><td calss="value"><?php echo $all_invoice[0]['total_amount']; ?></td></tr>
</table>
               </div>
                <div class="col-sm-6">
                <table id="two">
<tr><td  class="key">Invoice Date</td><td style="width:10px;">:</td><td calss="value"><?php echo $all_invoice[0]['date'];  ?></td></tr>
    <tr><td  class="key">Container No</td><td style="width:10px;">:</td><td calss="value"><?php echo $all_invoice[0]['container_no'];  ?></td></tr>
   </table> </div> 
            </div>
        </div>
         <div class="body-section">
          <div class="table-responsive">
     

   
<?php 


for($m=1;$m<count($all_invoice);$m++){ 
    ?>
    <table class="table table-bordered normalinvoice table-hover" id="normalinvoice_<?php  echo $m; ?>" >
            <thead style="background-color:<?php echo '#' .$color;  ?>">
                    <tr>                
                           <th rowspan="1" class="absorbing-column text-center text-white">Product Name</th>
                           <th rowspan="1" class="text-center text-white">Descrip<br/>tion</th>
                           <th rowspan="1" class="text-center text-white">Thick<br/>ness</th>


                        

                           <th rowspan="1" class="text-center text-white">Bundle No</th>
                           <th rowspan="1" class="text-center text-white">Slab No</th>
                           <th colspan="2" class="text-center text-white">Net<br/> Measure<br/>Width&#9475;Height</th>

                           <th rowspan="1" class="text-center text-white">Net <br/>Sq. Ft</th>                        


                    </tr> 
 </thead>
                <tbody id="addPurchaseItem_<?php echo $m;  ?>">
                                    <?php  $n=0; ?>
                                    <?php foreach($all_invoice as $inv){
                                        
                                      

$a = substr($inv['tableid'], 0, 1);
if($a==$m){
                                    
                                        ?>

                    <tr>

                       <td style="font-size: 10px;"><?php  echo $inv['product_name'];  ?></td>
                       <td style="font-size: 10px;"><?php  echo $inv['description'];  ?></td>
                       <td style="font-size: 10px;"><?php  echo $inv['thickness'];  ?></td>
                    

                         <td style="font-size: 10px;"><?php  echo $inv['bundle_no'];  ?></td>
                       <td style="font-size: 10px;"><?php echo $i+1; ?></td>
                       <td style="font-size: 10px;" class="net_width"><?php  echo $inv['n_width'];  ?></td>
                           <td style="font-size: 10px;" class="net_height"><?php  echo $inv['n_height'];  ?></td>
                                     <td style="font-size: 10px;" class="net_sq_ft"><?php  echo $inv['net_sqft'];  ?></td>
                     




                    </tr>
                    <?php $n++;}}  ?>

                </tbody>
                          <tfoot>
                                    <tr>
                                 
             <td style="text-align:right;" colspan="7"><b>Net Sq.ft :</b></td>
                                        <td >
             <input type="text" id="overall_net_<?php echo $m; ?>" name="overall_net[]"  class="overall_net"  style="border:none;width: 60px"   readonly="readonly"  /> 
            </td>

                                  
                                    </tr>

                                            </tfoot>
                            </table>
                            <?php   } ?>
            </table>
            <br>
          <h4>Remarks :</h4><?php echo $all_invoice[0]['remark']; ?>
        </div>
        
        
        
        
        
        
        
        
              <?php 

}
elseif($template==4)
{
?>  
        
        
        <div class="invoice-12 invoice-content" style="padding:0px;" >
    <div class="container" style="padding:0px;" >
        <div class="row">
            <div class="col-lg-12">
                <div class="invoice-inner clearfix">
                  <div style="color:red;"></div>
                   <div style="color:red;"></div>
                    <div class="invoice-info clearfix" id="invoice_wrapper">
                        <div class="invoice-contant">
                            <div class="invoice-headar">
                                <div class="row">
                                    <div class="col-md-8 col-sm-6">
                                        <div class="invoice-logo">
                                            <!-- logo started -->
                                            <div class="logo">
                                                <img crossorigin="anonymous" src="<?php echo  base_url().$logo; ?>" style="width:80px;height:80px;" alt="logo">
                                            </div>
                                            <!-- logo ended -->
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <div class="invoice-number-inner">
                                             <p class="mb-0"><strong>Invoice Date: <span><?php  echo $all_invoice[0]['date'] ; ?></strong></span></p>
                                             <p class="mb-0">Packing List NO: <span><?php  echo $all_invoice[0]['commercial_invoice_number'] ; ?></span></p>

                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="invoice-top">
                                <div class="row">
                                    <div class="col-md-4 col-sm-6 mb-30">
                                        <div class="invoice-number">
                                            <h4 class="inv-title-1" style="font-weight:bold;color:<?php echo $color; ?> ">Container No</h4>
                                            <h2 class="name mb-10"><?php echo $customer_name; ?></h2>
                                            <p class="invo-addr-1 mb-0">
                                            <?php  echo $all_invoice[0]['container_no'] ; ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 mb-30">
                                        <div class="invoice-number">
                                            <div class="invoice-number-inner">
                                                <h4 class="inv-title-1" style="font-weight:bold;color:<?php echo $color; ?> "> </h4>
                                                <h2 class="name mb-10"><?php //echo $customer_name; ?></h2>
                                                <p class="invo-addr-1 mb-0">
                                                    <?php  //echo $all_invoice[0]['shipping_address'] ; ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 mb-30 invoice-contact-us">
                                        <h4 class="inv-title-1" style="font-weight:bold;color:<?php echo $color; ?> ">Company Information</h4>
                                        <h2 class="name mb-10"></h2>
                                        <ul class="link">
                                          
                                          <li>
                                                <i class="fas fa-building"></i> <?php echo  $company[0]['company_name']; ?>
                                            </li>
                                        
                                        <li>
                                                <i class="fa fa-map-marker"></i> <?php echo $company[0]['address']; ?>
                                            </li>
                                            <li>
                                                <i class="fa fa-envelope"></i> <a href="<?php echo $company[0]['email']; ?>"><?php echo $company[0]['email']; ?></a>
                                            </li>
                                            <li>
                                                <i class="fa fa-phone"></i> <a href="tel:+55-417-634-7071"><?php echo $company[0]['mobile']; ?></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                             <!-- <div class="invoice-center">
                                <div class="order-summary">
                                    <div class="table-outer">
                                        <table class="default-table invoice-table" border="1" cellpadding="0" cellspacing="0">
                                            <thead  style="background-color:<?php  echo  $color; ?>;color:black;">
                                            <tr>
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
                            </div> -->
                            <div class="invoice-center">
                                <div class="order-summary">
                                    <div class="table-outer">
                                        
<?php 


for($m=1;$m<count($all_invoice);$m++){ 
    ?>
    <table class="table table-bordered normalinvoice table-hover" id="normalinvoice_<?php  echo $m; ?>" >
            <thead style="background-color:<?php echo $color; ?>">
                    <tr>                
                           <th rowspan="1" class="absorbing-column text-center text-white">Product Name</th>
                           <th rowspan="1" class="text-center text-white">Description</th>
                           <th rowspan="1" class="text-center text-white">Thickness</th>


                        

                           <th rowspan="1" class="text-center text-white">Bundle No</th>
                           <th rowspan="1" class="text-center text-white">Slab No</th>
                           <th colspan="2" class="text-center text-white">Net<br/> Measure<br/>Width&#9475;Height</th>

                           <th rowspan="1" class="text-center text-white">Net <br/>Sq. Ft</th>                        
                           <!-- <th rowspan="1"  class="text-center text-white">sales_slab_price </th> -->


                    </tr> 
 </thead>
                <tbody id="addPurchaseItem_<?php echo $m;  ?>">
                                    <?php  $n=0; ?>
                                    <?php foreach($all_invoice as $inv){
                                        
                                      

$a = substr($inv['tableid'], 0, 1);
if($a==$m){
                                    
                                        ?>

                    <tr>

                       <td style="font-size: 10px;"><?php  echo $inv['product_name'];  ?></td>
                       <td style="font-size: 10px;"><?php  echo $inv['description'];  ?></td>
                       <td style="font-size: 10px;"><?php  echo $inv['thickness'];  ?></td>
                    

                         <td style="font-size: 10px;"><?php  echo $inv['bundle_no'];  ?></td>
                       <td style="font-size: 10px;"><?php echo $i+1; ?></td>
                       <td style="font-size: 10px;" class="net_width"><?php  echo $inv['n_width'];  ?></td>
                           <td style="font-size: 10px;" class="net_height"><?php  echo $inv['n_height'];  ?></td>
                                     <td style="font-size: 10px;" class="net_sq_ft"><?php  echo $inv['net_sqft'];  ?></td>
                     

                            <!-- <td style="font-size: 10px;"><?php  //echo $currency; ?><?php//echo $inv['sales_slab_price'];  ?></td> -->



                    </tr>
                    <?php $n++;}}  ?>

                </tbody>
                          <tfoot>
                                    <tr>
                                 
             <td style="text-align:right;" colspan="7"><b>Net Sq.ft :</b></td>
                                        <td >
             <input type="text" id="overall_net_<?php echo $m; ?>" name="overall_net[]"  class="overall_net"  style="border:none;width: 60px"   readonly="readonly"  /> 
            </td>

                                  
                                    </tr>

                                            </tfoot>
                            </table>
                            <?php   } ?>
            </table>
                                    </div>
                                </div>
                            </div>
                            
                             
                            <div class="invoice-bottom">
                                <div class="row">
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                        <!-- <div class="terms-conditions mb-30">
                                            <h3 class="inv-title-1 mb-10" style="font-size: 18px;font-weight:bold;">Account Details/ Information</h3>
                                            <?php //echo $all_invoice[0]['ac_details'];  ?>
                                        </div> -->
                                          <div class="terms-conditions mb-30">
                                            <h3 class="inv-title-1 mb-10" style="font-size: 18px;font-weight:bold;">Remarks/Conditions</h3>
                                            <?php echo $all_invoice[0]['remark'];  ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <div class="payment-method mb-30">
                                            <h3 style="font-size: 18px;font-weight:bold;" class="inv-title-1 mb-10">PACKING Info :</h3>
                                            <ul class="payment-method-list-1 text-14" style="font-size: 18px;">
                                                <li><strong>Gross Weight : &nbsp;</strong><?php  echo $all_invoice[0]['total_amount']; ?></li>
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

<script src="<?php echo base_url()?>assets/css/Invoice/app.js"></script>    
        
        
        
        
    <style>

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
  </style>    
        
        
        
        
        
        
        <?php  } ?>

    </div>

</div>

<div class="modal fade" id="myModal_ex" role="dialog" >
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="width: 500px;height:100px;text-align:center;margin-bottom: 300px;">
        <div class="modal-header" style="color:white;background-color:#38469f;">
      
          <h4 class="modal-title">Sale</h4>
        </div>
        <div class="content">

        <div class="modal-body">
          
          <h4>Packing List Downloaded Successfully</h4>
     
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
}
.key{
    border:none;
    text-align:left;
font-weight:bold;

}
.value{
    border:none;
    text-align:left;
}
#one,#two{
float:left;
width:100%;
}
body{
    background-color: #38469f; 
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
th{
    font-size:12px;
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
   
    /*background-color: #fff;*/
    width: 100%;
    border-collapse: collapse;
   
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

#content{display:none;} 
@media print 
{ 
#head{display:none;} 
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


//   var sum=0;

//  $('#normalinvoice_'+idt  +  '> tbody > tr').find('.total_price').each(function() {
// var v=$(this).html();
//   sum += parseFloat(v);

// });

//  $(this).closest('table').find('#Total_'+idt).val(sum.toFixed(3));

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

             console.log(clonedElement);
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
  }).save('Sale_PackingList_<?php echo $chalan_no.'.pdf'  ?>');
    callback1();
    callback2();
             clonedElement.remove();
 $("#content").attr("hidden", true);
 }, 2500 );
}
function second(){
setTimeout( function(){
    $( '#myModal_ex' ).addClass( 'open' );
if ( $( '#myModal_ex' ).hasClass( 'open' ) ) {
  $( '.container' ).addClass( 'blur' );
}
$( '.close' ).click(function() {
  $( '#myModal_ex' ).removeClass( 'open' );
  $( '.cont' ).removeClass( 'blur' );
});
}, 3000 );
}
function third(){
    setTimeout( function(){
        window.location='<?php  echo base_url();   ?>'+'Cpurchase/manage_purchase';
        window.close();
    }, 3500 );
}
first(second,third);
});

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


