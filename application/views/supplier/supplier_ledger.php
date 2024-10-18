<?php error_reporting(1);  ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.base64.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/html2canvas.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jspdf.plugin.autotable"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jspdf.umd.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
<script type="text/javascript" src="<?php echo base_url()?>assets/js/drag_drop_index_table.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>my-assets/js/quotation_tableManager.js"></script>
<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
<script type="text/javascript" src="http://mrrio.github.io/jsPDF/dist/jspdf.debug.js"></script>
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<script src="<?php echo base_url() ?>assets/js/dashboard.js" ></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet">
<link href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.2.2/css/bootstrap.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="<?php echo base_url() ?>my-assets/css/style.css">
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript" src="http://www.bacubacu.com/colresizable/js/colResizable-1.5.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" />
<script type="text/javascript" src="<?php echo base_url()?>my-assets/js/profarma.js"></script>
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" />
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" />

<style>


   .select2{
   display:none;
   }

   
   
    .logo-9 i{
    font-size:80px;
    position:absolute;
    z-index:0;
    text-align:center;
    width:100%;
    left:0;
    top:-10px;
    color:#34495e;
    -webkit-animation:ring 2s ease infinite;
    animation:ring 2s ease infinite;
}
.logo-9 h1{
    font-family: 'Lora', serif;
    font-weight:600;
    text-transform:uppercase;
    font-size:40px;
    position:relative;
    z-index:1;
    color:#e74c3c;
    text-shadow: 3px 3px 0 #fff, -3px -3px 0 #fff, 3px -3px 0 #fff, -3px 3px 0 #fff;
}
   
   
  
   .logo-9{
    position:relative;
} 
   
   /*//side*/
   
.bar {
  float: left;
  width: 25px;
  height: 3px;
  border-radius: 4px;
  background-color: #4b9cdb;
}


.load-10 .bar {
  animation: loadingJ 2s cubic-bezier(0.17, 0.37, 0.43, 0.67) infinite;
}


@keyframes loadingJ {
  0%,
  100% {
    transform: translate(0, 0);
  }

  50% {
    transform: translate(80px, 0);
    background-color: #f5634a;
    width: 110px;
  }  
}
   
    
   .select2{
   display:none;
   }


   .btnclr{
       background-color:<?php echo $setting_detail[0]['button_color']; ?>;
       color: white;

   }
</style>








<!-- Supplier Ledger Start -->
<div class="content-wrapper">
<section class="content-header">
   <div class="header-icon">
    <figure class="one">
               <img src="<?php echo base_url()  ?>asset/images/supplier.png"  class="headshotphoto" style="height:50px;" />
      </div>
   
   
   
   
   
      
        <div class="header-title">
          <div class="logo-holder logo-9">
      <h1><?php echo ('Vendor Ledger') ?></h1>
       </div>
     
     
     
     
      <small></small>
      <ol class="breadcrumb">
         <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
         <li><a href="#"><?php echo display('vendor') ?></a></li>
         <li class="active" style="color:orange"><?php echo ('Vendor Ledger') ?></li>
     
     
       <div class="load-wrapp">
       <div class="load-10">
         <div class="bar"></div>
       </div>
       </div>
     
     
     
     
     
     
     
     
      </ol>
   </div>
</section>














<!-- Supplier information -->
<section class="content">
   <!-- Alert Message -->
   <?php
      $message = $this->session->userdata('message');
      if (isset($message)) {
          ?>
   <div class="alert alert-info alert-dismissable" style="background-color:#38469f;color:white;font-weight:bold;">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <?php echo $message ?>                    
   </div>
   <?php
      $this->session->unset_userdata('message');
      }
      $error_message = $this->session->userdata('error_message');
      if (isset($error_message)) {
      ?>
   <div class="alert alert-danger alert-dismissable" style="background-color:#38469f;color:white;font-weight:bold;">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <?php echo $error_message ?>                    
   </div>
   <?php
      $this->session->unset_userdata('error_message');
      }
      ?>
   <script>
      $('.alert').delay(1000).fadeOut('slow');
   </script>  








 




   <div class="panel panel-bd lobidrag" >
      <div class="panel-heading" style="height: 60px;    border: 3px solid #d7d4d6;">
         <div class="col-sm-12" style="height:69px;">
<div class="col-sm-4" style="display: flex; justify-content: space-between; align-items: left;height:fit-content;">

 <a href="<?php echo base_url('Csupplier') ?>" class="btn btnclr" style="color:white;float:right;height:fit-content; " ><i class="ti-plus"></i> <?php echo display('Add Vendor') ?></a> &nbsp;&nbsp;



&nbsp;&nbsp;
<a href="<?php echo base_url('Csupplier/manage_supplier') ?>"  class="btnclr btn" style="float: right;height: fit-content; "><i class="ti-align-justify"> </i>  <?php echo ('Manage Vendor') ?> </a>&nbsp;  
     &nbsp;&nbsp;
    &nbsp;&nbsp;
                        <div class="dropdown bootcol" id="drop" style="    width: 300px;">
                           <button class="btnclr btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" style="float:left;"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" >
                           <span class="fa fa-download"></span> <?php echo display('download') ?>
                           </button>
                           <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <li><a href="#" onclick="generate()"> <img src="<?php echo base_url() ?>assets/images/pdf.png" width="24px"> <?php echo display('PDF') ?></a></li>
                              <li class="divider"></li>
                              <li><a href="#" onclick="$('#ProfarmaInvList').tableExport({type:'excel',escape:'false'});"> <img src="<?php echo base_url() ?>assets/images/xls.png" width="24px"> <?php echo display('XLS') ?></a></li>
                           </ul>&nbsp;
        <button type="button" style="margin-right: 10px;height:fit-content;" class="btnclr btn"   onclick="printDiv('printableArea')">    <b class="ti-printer"></b>&nbsp;    <?php echo display('print') ?></button>
        </div>
    </div>  
    



    <div class="col-sm-6" style="text-align: center;">
    <?php echo form_open('Csupplier/supplier_ledger/'.$this->uri->segment(3).'/'.$this->uri->segment(4), array('class' => '', 'id' => 'validate')) ?>
                     <?php $today = date('Y-m-d'); ?>
                   
                      <div class="col-sm-6">
                        <div class="form-group row"     style="width: 300px;">
                        <input type="hidden" name="seg_3" value="<?php echo  $this->uri->segment(3) ; ?>"/>
                        <input type="hidden" name="seg_4" value="<?php echo  $this->uri->segment(4) ; ?>"/>
                         <input style="width: 300px;text-align:center;" class="form-control daterangepicker-field" name="daterangepicker-field" autocomplete="off" id="daterangepicker-field" <?php  if(empty($start)){ echo "value=''";}else{ echo "value=".$start ;}  ?>>
                           &nbsp; &nbsp; &nbsp;
                         
                         
                        </div>
                       
                     </div>
                      <div class="col-sm-1">
                         <div class="form-group">
                             <button type="submit" class="btnclr btn" style="float:right;" ><i class="fa fa-search" aria-hidden="true"></i> <?php echo display('search') ?></button> 
                         </div>
                     </div>
                      <?php echo form_close() ?>
    </div>



     <div class="col-sm-2" style="float:right;">
          <div class="" style="float: right;">  <a onclick="reload();"  id="removeButton">  <i class="fa fa-refresh fa-spin" style="font-size:25px;float:right;" aria-hidden="true"></i> </a>    &nbsp;    &nbsp;    &nbsp;    &nbsp; <i class="fa fa-gear fa-spin"  aria-hidden="true" id="myBtn" style="margin-right:20px;font-size:25px;float:right;" onClick="columnSwitchMODAL()"></i></div>
      </div>
 

      </div>
      </div>
      </div>

         


           

            <!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>AA&Y Granite</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

.btnclr{
   background-color:<?php echo $setting_detail[0]['button_color']; ?>;
   color: white;
   }



  .container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    color: black;
    width: 98%;
  }
  .company-details {
    flex: 1;
  }
  .summary {
    text-align: right;
  }
  .icon {
    font-size: 20px;
    margin-right: 5px;
  }
  .open-balance .fa-hand-holding-usd {
    color: green; /* Yellow for Amount Paid */
  }
  .overdue-payment .fa-money-bill-alt {
    color: red; /* Red for Due Amount */
    font-size: initial;
  }    
  .fa-solid, .fas {
  /* font-weight: 900; */
    color: #1ecf36;
    /* size: 10px; */
    font-size: large;
    }
</style>
</head>
<body>


<?php         if($ledgers[0]['vendor_type']=='Product Supplier'){   ?>


<div class="container" style="border: 2px solid #d4dbdf;">
  <div class="company-details" style="font-weight: bold;font-size: large; padding-bottom: 47px;">
    <?php echo $ledgers[0]['supplier_name']; ?>
    <div class="address" style="font-size:13px;">
       <?php if($ledgers[0]['address']){   ?>
                        <h4><?php echo display('address') ?> : <?php  echo $ledgers[0]['address'] ; ?></h4>
                        <?php   }   ?>
    </div>
  </div>
   <div class="summary" style="width: 12%;  height: 10%;">
    <div class="open-balance"> 
      <i class="fas fa-hand-holding-usd"></i><strong style="font-size: large;"> <?php  echo '$'. $paid_total;?></strong><br>
     Total Paid Amount
    </div>

    <div class="overdue-payment">
      <i class="fa fa-money-bill-alt"></i><strong style="font-size: large;"> <?php  echo '$'. $due_total; ?></strong><br>
      Total Due Amount
    </div>
  </div>
</div>

</body>
</html>

 

<?php }  else if(($ledgers[0]['vendor_type']=='Service Vendor')){ ?>





<div class="container" style="border: 3px solid #d4dbdf;">
  <div class="company-details" style="font-weight: bold;font-size: large; padding-bottom: 47px;">
    <?php echo $ledgers[0]['supplier_name']; ?>
    <div class="address" style="font-size:13px;">
       <?php if($ledgers[0]['address']){   ?>
                        <h4><?php echo display('address') ?> : <?php  echo $ledgers[0]['address'] ; ?></h4>
                        <?php   }   ?>
    </div>
  </div>
   <div class="summary" style="width: 12%;  height: 10%;">
    <div class="open-balance"> 
      <i class="fas fa-hand-holding-usd"></i><strong style="font-size: large;"> <?php  echo '$'. $service_pa;?></strong><br>
     Total Paid Amount
    </div>

    <div class="overdue-payment">
      <i class="fa fa-money-bill-alt"></i><strong style="font-size: large;"> <?php  echo '$'. $service_da; ?></strong><br>
      Total Due Amount
    </div>
  </div>
</div>

</body>
</html>
 
<?php } ?>

<br>
   
   
   
   
   <!-- Supplier ledger -->
   <div class="row">
      <div class="col-sm-12">
         <div class="panel panel-bd lobidrag"  style="border: 3px solid #d7d4d6;" >
            <div>
             
               <div class="panel-body">
                  <div id="printableArea">
                   
                     <div class="table-responsive">
                        <?php      ?>
                         <table class="table table-bordered Vendor_list" cellspacing="0" width="100%" id="ProfarmaInvList">
                           <thead>
                        <?php         if($ledgers[0]['vendor_type']=='Product Supplier'){   ?>
                          <tr class="btnclr">
                                 <th   class="1 value" data-col="1"   data-resizable-column-id="1"    style="width: 100px; height: 40.0114px;text-align: center;" ><?php echo display('Date') ?></th>
                                 <th   class="2 value" data-col="2"   data-resizable-column-id="2"  style="height: 42.0114px; width: 234.011px;text-align: center;"   >Ledger NO</th>
                                 <th   class="3 value" data-col="3"    data-resizable-column-id="3"  style="width: 200.011px;text-align: center;">Invoice NO</th>
                                 <th   class="4 value" data-col="4"    data-resizable-column-id="4"    style="width: 198.011px;text-align: center;">Open Balance</th>
                                 <th   class="5 value" data-col="5"     data-resizable-column-id="5" style="width: 190.011px; height: 44.0114px;text-align: center;">Past Due</th>
                            
                              </tr>
                              <?php  }else{  ?>
                              <tr class="btnclr">
                                 <th  class="1 value" data-col="1"     data-resizable-column-id="1"    style="width: 100px; height: 40.0114px;text-align: center;" ><?php echo display('Date') ?></th>
                                 <th  class="2 value" data-col="2"    data-resizable-column-id="2"  style="width: 200.011px;text-align: center;">Bill NO</th>
                                 <th  class="3 value" data-col="3"   data-resizable-column-id="3"  style="height: 42.0114px; width: 234.011px;text-align: center;"   ><?php echo "Ledger NO" ?></th>
                                 <th  class="4 value" data-col="4"     data-resizable-column-id="4"    style="width: 198.011px;text-align: center;">Open Balance</th>
                                 <th  class="5 value" data-col="5"     data-resizable-column-id="5" style="width: 190.011px; height: 44.0114px;text-align: center;">Past Due</th>
                          
                             </tr>


                                 <?php  }  ?>
                           </thead>
                           <tbody>
                                <?php
                             
                              
                                 if (!empty($ledgers)) {
                                    // print_r($ledgers);
                                    if($ledgers[0]['vendor_type']=='Product Supplier'){
                                           $totalAmount = 0;
                                 $outstandingAmount = 0;
$numberOfDays='';
                                  //  print_r($ledgers);
                                    $sl = 0;
                                    foreach ($ledgers as $ledger) {
                                                    //   echo "mmm".$ledger['balance'];        
                                                    if($ledger['payment_due_date'] !==''){
                                            $dateStr1=$ledger['payment_due_date'];
                                            $dateStr2=date('Y-m-d');
                                            $date1 = new DateTime($dateStr1);
$date2 = new DateTime($dateStr2);

// Calculate the interval between the two dates
$interval = $date1->diff($date2);

// Get the number of days from the interval
$numberOfDays = $interval->days;


                                        }
                                    $sl++;
                                         $totalAmount += $ledger['amount_pay_usd'];
 
                                    if (is_numeric($ledger['due_amount_usd'])) {
                                        $outstandingAmount += $ledger['due_amount_usd'];
                                    }else{
                                          $outstandingAmount += $ledger['balance'];
                                    }
                                ?>
                              <tr>
                                 <td  data-col="1" class="1"  class="text-center"  style="text-align: center;color:black;" ><?php echo $ledger['purchase_date']; ?></td>
                               
                                 <td  data-col="2" class="2"  style="text-align: center;color:black;" ><a href="<?php echo base_url(); ?>Cpurchase/purchase_update_form/<?php echo $ledger['purchase_id']; ?>"><?php echo $ledger['purchase_id']; ?></a></td>
                               
                                    <td data-col="3" class="3"  style="text-align: center;color:black;"><?php echo $ledger['chalan_no']; ?></td> 
                             
                                  <td data-col="4" class="4"   align="right" style="text-align: center;color:black;" ><?php 
                                    echo (($position == 0) ? "$currency " : " $currency");
                                      
                                      if($ledger['due_amount_usd'] !==''){
                                          echo $ledger['due_amount_usd'];
                                      }else{
                                    echo $ledger['balance'];
                                      }
                                   //   echo (isset($ledger['due_amount_usd']) && $ledger['due_amount_usd'] != 0) ? $ledger['due_amount_usd'] : "0.00"; ?>
                                       </td>
                                       
                                       
                                       
                                       
                                       
                                 
                                     <td  data-col="5" class="5"    align='right' style="text-align: center;color:black;">
                                        <?php
                                    
                                    
                                    
                                    
                                      if((!empty($numberOfDays)) &&  (!empty($ledger['due_amount_usd']) || ! empty($ledger['balance'])) 
                                        && (($ledger['due_amount_usd'] !=='0.00' && $ledger['balance'] !=='0.00') && ($ledger['due_amount_usd'] !=='0.0' && $ledger['balance'] !=='0.0') && ($ledger['due_amount_usd'] !=='0' || $ledger['balance'] !=='0')) ) 
               
                                    
                                    
                                    
                                    
                                    
                                    //  if((!empty($ledger['due_amount_usd'])) && ($ledger['due_amount_usd'] !=='0.00') && ($ledger['due_amount_usd'] !=='0.0') )
                                     
                                     
                                     {
                                             echo (isset($numberOfDays) && $numberOfDays != 0) ? $numberOfDays : "0"; 
                                  
                                           }else if((!empty($ledger['balance'])) && ($ledger['balance'] !=='0.00') && ($ledger['balance'] !=='0') && ($ledger['balance'] !=='0.0') ){
                                             echo (isset($numberOfDays) && $numberOfDays != 0) ? $numberOfDays : "0"; 
                                  
                                           }else
                                           
                                           {
                                           
                                           echo  "0";
                                           } ?>
                                     </td>
                                     
                                     
                                     
                                     
                                     
                                     
                                     
                                     
                              </tr>
                              <?php }} else{        
                                      $sl = 0;
                                         $totalAmount1 = 0;
                                 $outstandingAmount1 = 0;
                                    foreach ($ledgers as $ledger) {
                                       
                                    $sl++;
                                   //  if (is_numeric($ledger['amount_paids'])) {
                                        $totalAmount1 += $ledger['amount_paids'];
                                  //  }

                                  //  if (is_numeric($ledger['due_amount_usd'])) {
                                        $outstandingAmount1 += $ledger['balances'];
                                   // }
                                ?>
                              <tr>
                                 <td     data-col="1" class="1"   class="text-center" style="text-align: center;color:black;" ><?php echo $ledger['bill_date']; ?></td>
                                 
                                  <td data-col="2" class="2"   style="text-align: center;"><?php echo $ledger['bill_number']; ?></td> 

                                 <td data-col="3" class="3"    style="text-align: center;" ><a href="<?php echo base_url(); ?>Cpurchase/serviceprovider_update_form/<?php echo $ledger['serviceprovider_id']; ?>"><?php echo $ledger['serviceprovider_id']; ?></a></td>
                                  <td   data-col="4" class="4"    align="right" style="text-align: center;" ><?php 
                                    echo (($position == 0) ? "$currency " : " $currency");
                                 echo $ledger['balances'];
                                      
                                       if($ledger['due_amount_usd'] !==''){
                                           
                                          echo $ledger['due_amount_usd'];
                                      }elseif($ledger['balances'] !==''){
                                            echo (($position == 0) ? "$currency " : " $currency");
                                    echo   $ledger['balances'] ;        
                                      }else{
                                          echo "0.00";
                                      }
                                      ?>
                                       </td>
                                    <!-- <td align="right" class="total_amount_credit"> 
                                      <?php
                                       //   echo (($position == 0) ? "$currency " : " $currency");
                                      // echo (isset($ledger['amount_paids']) && $ledger['amount_paids'] != 0) ? $ledger['amount_paids'] : "0.00"; ?>
    
                                    </td> -->
                                     <td  data-col="5" class="5"    align='right' style="text-align: center;" >
                                        <?php
                                         //  echo (($position == 0) ? "$currency " : " $currency");
                                        // if((!empty($ledger['due_amount_usd'])) && ($ledger['due_amount_usd'] !=='0.00') && ($ledger['due_amount_usd'] !=='0') && ($ledger['due_amount_usd'] !=='0.0'))
                                              if((!empty($numberOfDays)) &&  (!empty($ledger['due_amount_usd']) || ! empty($ledger['balance'])) 
                                        && (($ledger['due_amount_usd'] !=='0.00' && $ledger['balance'] !=='0.00') && ($ledger['due_amount_usd'] !=='0.0' && $ledger['balance'] !=='0.0') && ($ledger['due_amount_usd'] !=='0' || $ledger['balance'] !=='0')) ) 
               
                                        
                                        {
                                             echo (isset($numberOfDays) && $numberOfDays != 0) ? $numberOfDays : "0"; 
                                  
                                           }else if((!empty($ledger['balances'])) && ($ledger['balances'] !=='0.00') && ($ledger['balances'] !=='0') && ($ledger['balances'] !=='0.0') ){
                                             echo (isset($numberOfDays) && $numberOfDays != 0) ? $numberOfDays : "0"; 
                                  
                                           }else
                                           
                                           {
                                           
                                           echo  "0";
                                           }  ?>
                                           
                                     </td>
                              </tr>











                      <?php        }}}//else{ 
                      ?>
                              <?php //$sl = 0; foreach ($getAlldataproduct as $ledger) { $sl++; ?>
                              <!-- <tr>-->
                              <!--   <td class="text-center"><?php// echo $ledger['purchase_date']; ?></td>-->
                              <!--   <td><?php //echo $ledger['supplier_name']; ?></td>-->
                              <!--   <td><a href="<?php //echo base_url(); ?>Cpurchase/purchase_update_form/<?php //echo $ledger['purchase_id']; ?>"><?php //echo $ledger['purchase_id']; ?></a></td>-->
                              <!--  <td align="right"> -->
                              <!--    //  echo (($position == 0) ? "$currency " : " $currency");-->
                                      
                              <!--      //  echo (isset($ledger['amount_pay_usd']) && $ledger['amount_pay_usd'] != 0) ? $ledger['amount_pay_usd'] : "0.00"; ?>-->
                              <!--         </td>-->
                              <!--   <td align="right" class="total_amount_credit"> -->
                              <!--   \-->
                              <!--     //   echo (($position == 0) ? "$currency " : " $currency");-->
                              <!--  //   echo (isset($ledger['amount_pay_usd']) && $ledger['amount_pay_usd'] != 0) ? $ledger['amount_pay_usd'] : "0.00"; ?>-->

                              <!--  </td>-->
                              <!--   <td align='right'>-->
                              <!--     \-->
                              <!--      //   echo (($position == 0) ? "$currency " : " $currency");-->
                              <!--      //  echo (isset($ledger['due_amount_usd']) && $ledger['due_amount_usd'] != 0) ? $ledger['due_amount_usd'] : "0.00"; ?>-->
                                       
                              <!--   </td>-->
                              <!--</tr>-->
                              <?php// } } ?>
                           </tbody>
                           <tfoot>
                                 <?php         if($ledgers[0]['vendor_type']=='Product Supplier'){   ?>
                              <tr  >

                              <td   data-col="1" class="1"  > </td>
                              <td   data-col="2" class="2"  > </td>
                                 <td   data-col="3" class="3"    style="text-align:end"><b><?php echo display('grand_total') ?>:</b></td>
                                
                                 <!--<td align="right" id="total_credit" style="font-weight: bold;">-->
                                 <!--   <b>-->
                                 <!--   // echo (($position == 0) ? "$currency " : "$currency");-->
                                 <!--   ?> <?php //echo $totalAmount ?></b>-->
                                 <!-- </td>-->
                                 <td    data-col="4" class="4"     align="right" style="text-align:center;"><b>
                                 <?php
                                    echo (($position == 0) ? "$currency " : " $currency");
                                   //    echo (isset($ledger['due_amount_usd']) && $ledger['due_amount_usd'] != 0) ? $outstandingAmount : "0.00"; 
                                      ?>
                                       <?php echo $outstandingAmount; ?>
                                    
                                     
                                    </b></td>

                                    <td   data-col="5" class="5"  > </td>

                              </tr>
                              <?php    } else{  ?>

 <tr>
                                
 <td   data-col="1" class="1"  > </td>
 <td   data-col="2" class="2"  > </td>
 <td  data-col="3" class="3"   style="text-align:end"><b><?php echo display('grand_total') ?>:</b></td>
 <td   data-col="4" class="4"   align="right" style="text-align:center;"><b>
                                 <?php
                                      echo (($position == 0) ? "$currency " : " $currency");
                                       echo (isset($outstandingAmount1) && $outstandingAmount1 != 0) ? $outstandingAmount1 : "0.00"; 
                                      ?>
                                       <?php //echo $outstandingAmount1; ?>
                                    
                                     
                                    </b></td>
                                    
                                    
                                     <td  data-col="5" class="5"   align="right" id="total_credit" style="font-weight: bold;">
                                    <b><?php
                                    // echo (($position == 0) ? "$currency " : "$currency");
                                    ?> <?php //echo //$totalAmount ?></b>
                                  </td>

 

                              </tr>
                                 <?php  }  ?>
                           </tfoot>
                        </table>
                     </div>
                  </div>
                  <!-- <div class="text-right"><?php echo $links ?></div> -->
               </div>
            </div>
         </div>
      </div>
</section>






<script src="<?php echo base_url()?>assets/js/jquery.bootgrid.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.0.0-alpha.1/jspdf.plugin.autotable.js"></script>
 


<?php if($ledgers[0]['vendor_type']=='Product Supplier'){ ?>
<div id="myModal_colSwitch"  class="modal_colSwitch">
<div class="modal-content_colSwitch" style="width:20%;height:35%;">
<span class="close_colSwitch">&times;</span>
<div class="col-sm-2" ></div>
<div class="col-sm-4" ><br>
<div class="form-group row"  > 
<br><input type="checkbox"  data-control-column="1" checked = "checked" class="1" value="1"/> &nbsp;<?php echo display('Date') ?><br>
            <br><input type="checkbox"  data-control-column="2" checked = "checked" class="2" value="2"/>&nbsp;<?php echo "Ledger No"; ?><br>
            <br><input type="checkbox"  data-control-column="3" checked = "checked" class="3 " value="3  "/>&nbsp;<?php echo "Invoice No"; ?> <br>
            <br><input type="checkbox"  data-control-column="4" checked = "checked" class="4" value="4"/>&nbsp;<?php echo 'Open Balance'; ?><br>
            <br><input type="checkbox"  data-control-column="5" checked = "checked" class="5" value="5"/>&nbsp;<?php echo "Past Due"; ?><br>



</div>
</div>
 
<div class="col-sm-1"  ><br>
<div class="form-group row"  >
</div>
</div>
</div>
</div>
<?php }else{ ?>
<div id="myModal_colSwitch"  class="modal_colSwitch">
<div class="modal-content_colSwitch" style="width:20%;height:30%;">
<span class="close_colSwitch">&times;</span>
<div class="col-sm-2" ></div>
<div class="col-sm-3" ><br>
<div class="form-group row"  > 
 
<br><input type="checkbox"  data-control-column="1" checked = "checked" class="1" value="1"/> &nbsp;<?php echo display('Date') ?><br>
            <br><input type="checkbox"  data-control-column="2" checked = "checked" class="2" value="2"/>&nbsp;<?php echo "Bill No"; ?><br>
            <br><input type="checkbox"  data-control-column="3" checked = "checked" class="3 " value="3  "/>&nbsp;<?php echo "Ledger No"; ?> <br>
            <br><input type="checkbox"  data-control-column="4" checked = "checked" class="4" value="4"/>&nbsp;<?php echo 'Open Balance'; ?><br>
            <br><input type="checkbox"  data-control-column="5" checked = "checked" class="5" value="5"/>&nbsp;<?php echo "Past Due"; ?><br>


</div>
</div>

<div class="col-sm-1"  ><br>
<div class="form-group row"  >
</div>
</div>
</div>
</div>

<?php   }   ?>
</section>
</div>
<!-- partial --> <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/knockout/3.4.0/knockout-debug.js'></script>
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
<script  src="<?php echo base_url() ?>my-assets/js/script.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery.bootgrid.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.0.0-alpha.1/jspdf.plugin.autotable.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>my-assets/js/profarma.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- xcharts includes -->




<script src="<?php echo base_url() ?>assets/js/script.js"></script>
<script>
   $(document).ready(function(){
   
   $(".sidebar-mini").addClass('sidebar-collapse') ;
   });
$(document).ready(function(){
$('#daterangepicker-field').val(<?php  echo $start;  ?>);
   //  var storedDateRange = localStorage.getItem('selectedDateRange');
    
   //  var initialStartDate, initialEndDate;
    
   //  if (storedDateRange) {
   //      var dateRange = JSON.parse(storedDateRange);
   //      initialStartDate = moment(dateRange.startDate);
   //      initialEndDate = moment(dateRange.endDate);
   //  } else {
   //      // Set default values if no stored date range is found
   //      initialStartDate = moment().startOf('week');
   //      initialEndDate = moment().endOf('week');
   //  }


//  var startDate    = initialStartDate,    // 7 days ago
//       endDate       = initialEndDate;                // today
   
//   var range = $('#daterangepicker-field');
   
//   // Show the dates in the range input
//   range.val(startDate.format('{MM}/{dd}/{yyyy}') + ' - ' + endDate.format('{MM}/{dd}/{yyyy}'));
   
//   // Load chart
//   ajaxLoadChart(startDate,endDate);
   
//   range.daterangepicker({
      
//       startDate: startDate,
//       endDate: endDate,
      
//       ranges: {
//           'Today': ['today', 'today'],
//           'Yesterday': ['yesterday', 'yesterday'],
//           'Last 7 Days': [Date.create().addDays(-6), 'today'],
//           'Last 30 Days': [Date.create().addDays(-29), 'today']
//       }
//   },function(start, end){
      
//       ajaxLoadChart(start, end);
      
//   });



// // Function to load the chart with selected date range
// function ajaxLoadChart(start, end) {
//     // Your chart loading logic here
// }
});

// $("#datepicker").datepicker({
//     format: "yyyy",
//     viewMode: "years", 
//     minViewMode: "years"
// });




    // $(document).ready(function(){
    //   $('.date1picker').datepicker({
    //     format: "yyyy",
    //     startView: "years",
    //     minViewMode: "years",
    //     autoclose: true
    //   });
    //   $('#allYearsButton').click(function() {
    //     alert("You selected 'All Years'");
    //     // Perform actions for displaying all years here
    //   });
    // });
    $(document).ready(function() {
    $("input:checkbox").each(function() {
        var column = "table ." + $(this).attr("value");
        var isChecked = localStorage.getItem(column) === "true";
        $(this).prop("checked", isChecked);
        $(column).toggle(isChecked); // Show/hide based on the stored state
    });
});
// When a checkbox is clicked, update localStorage and toggle column visibility
$("input:checkbox").click(function() {
    var column = "table ." + $(this).attr("value");
    var isChecked = $(this).is(":checked");
    localStorage.setItem(column, isChecked); // Store checkbox state in localStorage
    $(column).toggle(isChecked); // Show/hide based on the clicked state
});
   $(document).ready(function(){
   
   $(".sidebar-mini").addClass('sidebar-collapse') ;
   });
   function reload(){
   location.reload();
   }
   var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
   var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';
   $editor = $('#submit'),
   $editor.on('click', function(e) {
   if (this.checkValidity && !this.checkValidity()) return;
   e.preventDefault();
   var yourArray = [];
   $('.modal-content_colSwitch input[type=checkbox]:not(:checked)').each(function() {
   yourArray.push($(this).val());//push value in array
   });
   
   values = {
   
   extralist_text: yourArray
   
   };
   console.log(values)
   var json=values;
   var data = {
   page:$('#url').val(),
   content: yourArray
   
   };
   data[csrfName] = csrfHash;
   $.ajax({
   
   type: "POST",  
   url:'<?php echo base_url();?>Cinvoice/setting',
   
   data: data,
   dataType: "json", 
   success: function(data) {
   if(data) {
   console.log(data);
   }
   }  
   });
   });
   
    $(document).ready(function() {
    function sortTableDesc() {
        var $tableBody = $('#ProfarmaInvList tbody');
        var $tableRows = $tableBody.find('tr').toArray();

        $tableRows.sort(function(a, b) {
            var pastDueA = parseInt($(a).find('td:nth-child(5)').text());
            var pastDueB = parseInt($(b).find('td:nth-child(5)').text());

            return pastDueB - pastDueA;
        });

        $tableBody.empty().append($tableRows);
    }

    // Initial sorting in descending order
    sortTableDesc();

    $('#sortDescending').on('click', function() {
        sortTableDesc();
    });
});

$(document).ready(function() {
      // Function to store the visibility state of rows in localStorage
      function storeVisibilityState() {
          var suppliervisibilityStates = {};
          $("#ProfarmaInvList tr").each(function(index, element) {
              var row = $(element);
              var rowID = index;
              var isVisible = row.is(':visible');
              suppliervisibilityStates[rowID] = isVisible;
          });
          // Store the visibility states in localStorage
          localStorage.setItem("suppliervisibilityStates", JSON.stringify(suppliervisibilityStates));
      } });
</script>