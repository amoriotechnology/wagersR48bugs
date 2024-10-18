    

<div class="content-wrapper">
    <section class="content-header" >
        <div class="header-icon">
           
        </div>
        <div class="header-title" >
          
        </div>
    </section>
  <!-- Invoice information -->
 <style>
      .sidebar-mini{
  background-color:#38469f;
    }
   body{
       background-color:#38469f;
   }
 </style>



     <div class="container" id="content">
        <?php
    $m=1;
     if($template==2)
            {
            ?>
        <div class="brand-section" style="background-color:<?php echo $color; ?>">
        <div class="row" >
     
     <div class="col-sm-2"><img src="<?php echo $logo; ?>" style='width: 100%;'>
        
       </div>





<?php if(empty($header)){ ?>
  <div class="col-sm-6 text-center" style="color:white;"><h3><?php echo "SERVICE PROVIDER"; ?></h3></div>
 <?php } 
else
{  ?>
      <div class="col-sm-6 text-center" style="color:white;"><h3><?php echo $header; ?></h3></div>
<?php } ?>





     <div class="col-sm-4" style="color:white;font-weight:bold ;" id='company_info'>
           
          <b> <?php echo display('Company name') ?> : </b><?php echo $company_info[0]['company_name']; ?><br>
          <b>    <?php echo display('Address') ?> : </b><?php echo $company_info[0]['address']; ?><br>
          <b>   <?php echo display('Email') ?> : </b><?php echo $company_info[0]['email']; ?><br>
          <b>   <?php echo display('Contact') ?> : </b><?php echo $company_info[0]['mobile']; ?><br>
       </div>
        </div>
     </div>
       
        <div class="body-section">
            <div class="row">
                <div class="col-6">
                <table id="one" style="border:none;">

                <tr><td  class="key"><?php  echo  display('Service Provider Name');?></td><td >:</td><td class="value"><?php echo $service_provider_name;  ?></td></tr>
    <tr><td  class="key"><?php  echo  display('Payment Terms');?></td><td >:</td><td class="value"><?php echo $payment_terms;  ?></td></tr>
    <tr><td  class="key"><?php  echo  display('Bill Date');?></td><td >:</td><td class="value"><?php echo $bill_date;  ?></td></tr>
    <tr><td  class="key"><?php  echo  display('Account Category Name');?></td><td >:</td><td class="value"><?php echo $acc_cat_name;  ?></td></tr>
    <tr><td  class="key"><?php  echo  display('Account Sub Category');?></td><td >:</td><td class="value"><?php echo $acc_sub_name;  ?></td></tr>

   
</table>

                </div>
                <div class="col-6">
                <table id="two">

                <tr><td  class="key"><?php  echo  display('Service Provider complete address');?></td><td >:</td><td class="value"><?php echo $sp_address; ?></td></tr>
<tr><td  class="key"><?php  echo  ('Phone Number');?></td><td >:</td><td class="value"><?php echo $phone_num;  ?></td></tr>
<tr><td  class="key"><?php  echo  display('Bill Number');?></td><td>:</td><td class="value"><?php echo $bill_number;  ?></td></tr>
<tr><td  class="key"><?php  echo  display('Account Category');?></td><td >:</td><td class="value"><?php echo $acc_cat;  ?></td></tr>

</table> </div> 


            </div>
        </div>
        <div class="body-section">
          <div class="table-responsive">
     
 

<?php 



    ?>
    <table class="table table-bordered normalinvoice table-hover" id="normalinvoice_<?php  echo $m; ?>" >
            <thead>
                  <tr style="font-weight:bold;height:40px;font-size:12px;background-color:<?php echo $color; ?>">
                  <th rowspan="1" class="absorbing-column text-center text-white" style=" font-size:12px;width:13px;"><?php  echo  ('Product Name');?></th>
                      <th rowspan="1" class="text-center text-white"style=" font-size:12px;width:15px;"><?php echo display('description'); ?></th>
                    <th rowspan="1" class="text-center text-white"style=" font-size:12px;width:13px;"><?php  echo  ('Quality'); ?></th>
                    <th rowspan="1" class="text-center text-white"style=" font-size:12px;width:10px;"><?php echo display('amount'); ?></th> 
                     </tr> 

            </thead>
               <tbody id="addPurchaseItem_<?php echo $m;  ?>">
                                    <?php  $n=0; ?>
                                    <?php foreach($service_detail as $inv){   ?>

                                                                                                       
                                      
                    <tr>
                    <td style="font-size: 16px;"><?php echo $inv['productname']; ?></td>
                         <td style="font-size: 16px;"><?php echo $inv['description']; ?></td>
                       <td style="font-size: 16px;"><?php echo $inv['quality']; ?></td>
                       <td style="font-size: 16px;"><?php echo $icon; ?><?php echo $inv['total_price']; ?></td>
                     </tr>
<?php } ?>


</tbody>
                    
				 

                            <tfoot>
                    <tr>
                           <td colspan="3" style="text-align:right;font-weight:bold;"><?php echo display('total'); ?>:</td>
                        <td style="font-size: 16px;"><?php echo $icon; ?><?php echo $total;  ?></td>
                    </tr>
                    </tfoot>
                    </table> 
     

                  
            <br>
<h4><?php echo display('Memo / Details')?> :</h4><?php echo $memo_details; ?><br>
<br><br>
      

<?php 

}
elseif($template==3)
{
?>

    <div class="brand-section" style="background-color:<?php echo $color; ?>">
    <div class="row" >


   <?php if(empty($header)){ ?>
  <div class="col-sm-2 text-center" style="color:white;"><h3><?php echo "SERVICE PROVIDER"; ?></h3></div>
 <?php } 
else
{  ?>
   <div class="col-sm-2 text-center" style="color:white;"><h3><?php echo $header; ?></h3></div>
<?php } ?>







 <div class="col-sm-4"><img src="<?php echo $logo; ?>" style='width: 30%;float:right;'>
    
   </div>

 <div class="col-sm-6" style="color:white;font-weight:bold ;  "  id='company_info'>
       
      <b>  <?php echo display('Company name') ?> : </b><?php echo $company_info[0]['company_name']; ?><br>
      <b>   <?php echo display('Address') ?> : </b><?php echo $company_info[0]['address']; ?><br>
      <b>    <?php echo display('Email') ?> : </b><?php echo $company_info[0]['email']; ?><br>
      <b>    <?php echo display('Contact') ?> : </b><?php echo $company_info[0]['mobile']; ?><br>
   </div>
    </div>
 </div>
   
    <div class="body-section">
        <div class="row">
            <div class="col-6">
                        <table id="one" style="border:none;">

                        <tr><td  class="key"><?php  echo  display('Service Provider Name');?></td><td >:</td><td class="value"><?php echo $service_provider_name;  ?></td></tr>
    <tr><td  class="key"><?php  echo  display('Payment Terms');?></td><td >:</td><td class="value"><?php echo $payment_terms;  ?></td></tr>
    <tr><td  class="key"><?php  echo  display('Bill Date');?></td><td >:</td><td class="value"><?php echo $bill_date;  ?></td></tr>
    <tr><td  class="key"><?php  echo  display('Account Category Name');?></td><td >:</td><td class="value"><?php echo $acc_cat_name;  ?></td></tr>
    <tr><td  class="key"><?php  echo  display('Account Sub Category');?></td><td >:</td><td class="value"><?php echo $acc_sub_name;  ?></td></tr>

   
</table>

                </div>
                <div class="col-6">
                <table id="two">

                <tr><td  class="key"><?php  echo  display('Service Provider complete address');?></td><td >:</td><td class="value"><?php echo $sp_address; ?></td></tr>
<tr><td  class="key"><?php  echo  ('Phone Number');?></td><td >:</td><td class="value"><?php echo $phone_num;  ?></td></tr>
<tr><td  class="key"><?php  echo  display('Bill Number');?></td><td>:</td><td class="value"><?php echo $bill_number;  ?></td></tr>
<tr><td  class="key"><?php  echo  display('Account Category');?></td><td >:</td><td class="value"><?php echo $acc_cat;  ?></td></tr>

</table> </div> 


            </div>
        </div>
        <div class="body-section">
          <div class="table-responsive">
     
 

<?php 



    ?>
    <table class="table table-bordered normalinvoice table-hover" id="normalinvoice_<?php  echo $m; ?>" >
            <thead>
                  <tr style="font-weight:bold;height:40px;font-size:12px;background-color:<?php echo $color; ?>">
                  <th rowspan="1" class="absorbing-column text-center text-white" style=" font-size:12px;width:13px;"><?php  echo  ('Product Name');?></th>
                      <th rowspan="1" class="text-center text-white"style=" font-size:12px;width:15px;"><?php echo display('description'); ?></th>
                    <th rowspan="1" class="text-center text-white"style=" font-size:12px;width:13px;"><?php  echo  ('Quality'); ?></th>
                    <th rowspan="1" class="text-center text-white"style=" font-size:12px;width:10px;"><?php echo display('amount'); ?></th> 
                     </tr> 

            </thead>
               <tbody id="addPurchaseItem_<?php echo $m;  ?>">
                                    <?php  $n=0; ?>
                                    <?php foreach($service_detail as $inv){   ?>

                                                                                                       
                                      
                    <tr>
                    <td style="font-size: 16px;"><?php echo $inv['productname']; ?></td>
                         <td style="font-size: 16px;"><?php echo $inv['description']; ?></td>
                       <td style="font-size: 16px;"><?php echo $inv['quality']; ?></td>
                       <td style="font-size: 16px;"><?php echo $icon; ?><?php echo $inv['total_price']; ?></td>
                     
                     </tr>
<?php } ?>


</tbody>
                    
				 

                            <tfoot>
                    <tr>
                          <td colspan="3" style="text-align:right;font-weight:bold;"><?php echo display('total'); ?>:</td>
                        <td style="font-size: 16px;"><?php echo $icon; ?><?php echo $total;  ?></td>
                </tr>
                </tfoot>
                </table> 
 

              
        <br>
<h4><?php echo display('Memo / Details')?> :</h4><?php echo $memo_details; ?><br>
<br><br>
  


    
 

 <?php 

}
elseif($template==1)
{
?>     
    <div class="brand-section" style="background-color:<?php echo $color; ?>">
    <div class="row" >
 

   



 <div class="col-sm-4" id='company_info' style="color:white;font-weight:bold ;">
            
            <b> <?php echo display('Company name') ?> : </b><?php echo $company_info[0]['company_name']; ?><br>
            <b><?php echo display('Address') ?> : </b><?php echo $company_info[0]['address']; ?><br>
            <b>   <?php echo display('Email') ?>  : </b><?php echo $company_info[0]['email']; ?><br>
            <b>  <?php echo display('Contact') ?> : </b><?php echo $company_info[0]['mobile']; ?><br>
          </div>
        
          <?php if(empty($header)){ ?>
  <div class="col-sm-5 text-center" style="color:white;"><h3><?php echo "SERVICE PROVIDER"; ?></h3></div>
 <?php } 
else
{  ?>
          <div class="col-sm-5 text-center" style="color:white;"><h3><?php echo $header; ?></h3></div>
<?php } ?>



          <div class="col-sm-3"><img src="<?php echo $logo; ?>" style='width: 70%;'>
           
           </div>

           </div>
 </div>






    <div class="body-section">
        <div class="row">
            <div class="col-6">
                       <table id="one" style="border:none;">
                       <tr><td  class="key"><?php  echo  display('Service Provider Name');?></td><td >:</td><td class="value"><?php echo $service_provider_name;  ?></td></tr>
    <tr><td  class="key"><?php  echo  display('Payment Terms');?></td><td >:</td><td class="value"><?php echo $payment_terms;  ?></td></tr>
    <tr><td  class="key"><?php  echo  display('Bill Date');?></td><td >:</td><td class="value"><?php echo $bill_date;  ?></td></tr>
    <tr><td  class="key"><?php  echo  display('Account Category Name');?></td><td >:</td><td class="value"><?php echo $acc_cat_name;  ?></td></tr>
    <tr><td  class="key"><?php  echo  display('Account Sub Category');?></td><td >:</td><td class="value"><?php echo $acc_sub_name;  ?></td></tr>

   
</table>

                </div>
                <div class="col-6">
                <table id="two">

                <tr><td  class="key"><?php  echo  display('Service Provider complete address');?></td><td >:</td><td class="value"><?php echo $sp_address; ?></td></tr>
<tr><td  class="key"><?php  echo  ('Phone Number');?></td><td >:</td><td class="value"><?php echo $phone_num;  ?></td></tr>
<tr><td  class="key"><?php  echo  display('Bill Number');?></td><td>:</td><td class="value"><?php echo $bill_number;  ?></td></tr>
<tr><td  class="key"><?php  echo  display('Account Category');?></td><td >:</td><td class="value"><?php echo $acc_cat;  ?></td></tr>

</table> </div> 


            </div>
        </div>
        <div class="body-section">
          <div class="table-responsive">
     
 

<?php 



    ?>
    <table class="table table-bordered normalinvoice table-hover" id="normalinvoice_<?php  echo $m; ?>" >
            <thead>
                  <tr style="font-weight:bold;height:40px;font-size:12px;background-color:<?php echo $color; ?>">
                  <th rowspan="1" class="absorbing-column text-center text-white" style=" font-size:12px;width:13px;"><?php  echo  ('Product Name');?></th>
                      <th rowspan="1" class="text-center text-white"style=" font-size:12px;width:15px;"><?php echo display('description'); ?></th>
                    <th rowspan="1" class="text-center text-white"style=" font-size:12px;width:13px;"><?php  echo  ('Quality'); ?></th>
                    <th rowspan="1" class="text-center text-white"style=" font-size:12px;width:10px;"><?php echo display('amount'); ?></th> 
                     </tr> 

            </thead>
               <tbody id="addPurchaseItem_<?php echo $m;  ?>">
                                    <?php  $n=0; ?>
                                    <?php foreach($service_detail as $inv){   ?>

                                                                                                       
                                      
                    <tr>
                    <td style="font-size: 16px;"><?php echo $inv['productname']; ?></td>
                         <td style="font-size: 16px;"><?php echo $inv['description']; ?></td>
                       <td style="font-size: 16px;"><?php echo $inv['quality']; ?></td>
                       <td style="font-size: 16px;"><?php echo $icon; ?><?php echo $inv['total_price']; ?></td>
                     
                     </tr>
<?php } ?>


</tbody>
                    
				 

                            <tfoot>
                    <tr>
                        <td colspan="3" style="text-align:right;font-weight:bold;"><?php echo display('total'); ?>:</td>
                        <td style="font-size: 16px;"><?php echo $icon; ?><?php echo $total;  ?></td>
                </tr>
                </tfoot>
                </table> 
 

              
        <br>
<h4><?php echo display('Memo / Details')?> :</h4><?php echo $memo_details; ?><br>
<br><br>
  



 <?php } ?>    

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
printDiv('content')
});
function printDiv(elementId) {
    var a = document.getElementById('content').value;
    var b = document.getElementById(elementId).innerHTML;
    window.frames["print_frame"].document.title = document.title;
    window.frames["print_frame"].document.body.innerHTML = '<style> .key{ text-align:left; font-weight:bold;  }, .value{ text-align:left; }, #one,#two{ float:left; width:100%; }, body{ background-color: #fcf8f8; margin: 0; padding: 0; }, h1,h2,h3,h4,h5,h6{ margin: 0; padding: 0; }, p{ margin: 0; padding: 0; }, .heading_name{ font-weight: bold; }, .container{ width: 100%; margin-right: auto; margin-left: auto; margin-top: 50px; }, .brand-section{ background-color: #5961b3; padding: 10px 40px; }, .logo{ width: 50%; },  .row{ display: flex; flex-wrap: wrap;  }, .col-6{ width: 50%; flex: 0 0 auto;  }, .{ color: #fff; }, .company-details{ float: right; text-align: right; },  .body-section{ padding: 16px; border: 1px solid gray;  }, .heading{ font-size: 20px; margin-bottom: 08px; }, .sub-heading{ color: #262626; margin-bottom: 05px; }, table{  background-color: #fff; width: 100%; border-collapse: collapse;  },  table thead tr{ border: 1px solid #111; background-color: #5961b3;  }, .table-bordered td{ text-align:center; }, table td { vertical-align: middle !important;  word-wrap: break-word; }, th{  }, table th, table td { padding-top: 08px; padding-bottom: 08px; }, .table-bordered{ box-shadow: 0px 0px 5px 0.5px gray !important; }, .table-bordered td, .table-bordered th { border: 1px solid #dee2e6 !important; }, .text-right{ text-align: right; }, .w-20{ width: 20%; }, .float-right{ float: right; }, @media only screen and (max-width: 600px) {  }, .modal { position: fixed; top: 0; left: 0; display: flex; width: 100%; height: 100vh; justify-content: center; align-items: center; opacity: 0; visibility: hidden; },  .modal .content { position: relative; padding: 10px;  border-radius: 8px; background-color: #fff; box-shadow: rgba(112, 128, 175, 0.2) 0px 16px 24px 0px; transform: scale(0); transition: transform 300ms cubic-bezier(0.57, 0.21, 0.69, 1.25); },  .modal .close { position: absolute; top: 5px; right: 5px; width: 30px; height: 30px; cursor: pointer; border-radius: 8px; background-color: #7080af; clip-path: polygon(0 10%, 10% 0, 50% 40%, 89% 0, 100% 10%, 60% 50%, 100% 90%, 90% 100%, 50% 60%, 10% 100%, 0 89%, 40% 50%); },  .modal.open { background-color:#38469f; opacity: 1; visibility: visible; }, .modal.open .content { transform: scale(1); }, .content-wrapper.blur { filter: blur(5px); }, .content { min-height: 0px; }</style>' + b;
    window.frames["print_frame"].window.focus();
    window.frames["print_frame"].window.print();
}
   </script>







<style>

.key{
  text-align:left;
font-weight:bold;
width:250px;

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
  color:black;
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
#head{display:none;} 
#content{display:block;} 
} 
  #head{
    text-align: center;
    margin-top: 250px;
}
   
</style>

























