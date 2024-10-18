<?php error_reporting(1);  ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/drag_drop_index_table.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.base64.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/html2canvas.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jspdf.plugin.autotable"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jspdf.umd.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>my-assets/js/invoice_tableManager.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
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
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" />
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" />
<style>
    
    .btnclr{
       background-color:<?php echo $setting_detail[0]['button_color']; ?>;
       color: white;

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
    width: 185px;
  }
}


 @media (max-width:1024px){
   #insert_sale{
   display: flex !important;
   justify-content: flex-end !important;
   }
   .mob_topview{
   position: relative;
   right: 33px;
   }
   #removeButton{
   position: absolute;
   left: 145px;
   }
   .fa.fa-gear::before {
   position: absolute;
   left: 111px;
   }
   .mobile_daterangepicker{
   position: relative;
   right: 36px;
   }
   .mob_search{
   position: absolute;
   left: 108px;
   font-size: 11px;
   }
   .mobile_para{
      font-size: 11px !important; 
   }
   }
</style>



<div class="content-wrapper">
   <section class="content-header">
      <div class="header-icon">
<figure class="one">
               <img src="<?php echo base_url()  ?>asset/images/purchase.png"  class="headshotphoto" style="height:50px;" />      </div>
         
        
          <div class="header-title">
          <div class="logo-holder logo-9">
         <h1><strong><?php echo display('Manage Purchase Order') ?></strong></h1>
       </div>
        
        
        
        
        
         <small><?php //echo display('manage_your_purchase') ?></small>
         <ol class="breadcrumb"  style="border: 3px solid #d7d4d6;"" >
            <li><a href="<?php   echo base_url(); ?>"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
            <li><a href="#"><?php echo display('purchase') ?></a></li>
            <li class="active" style="color:orange;"><?php echo display('Manage Purchase Order') ?></li>
       
       
       
             <div class="load-wrapp">
       <div class="load-10">
         <div class="bar"></div>
       </div>
       </div>
       
       
       
         </ol>
      </div>
   </section>
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
      <div class="alert alert-danger alert-dismissable">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
         <?php echo $error_message ?>                    
      </div>
      <?php 
         $this->session->unset_userdata('error_message');
         }
         ?>


<div class="panel panel-bd lobidrag" >
      <div class="panel-heading" style="height: 60px;    border: 3px solid #d7d4d6;">
         <div class="col-sm-12 mob_topview" style="height:69px;">
<div class="col-sm-4" style="display: flex; justify-content: space-between; align-items: left;">
<?php foreach($this->session->userdata('perm_data') as $test) {
            $split = explode('-', $test);
            if(trim($split[0])=='expense' && $_SESSION['u_type'] ==3 && trim($split[1])=='1000'){
               ?>
                
 
                         <a href="<?php echo base_url('Cpurchase/purchase_order') ?>" class="btnclr btn btn-default dropdown-toggle boxes filip-horizontal mobile_para"   style="height:fit-content;"  ><i class="far fa-file-alt"> </i> <?php echo display('Create Purchase Order') ?> </a>



 
 



                <?php break;
            }
        }
        if ($_SESSION['u_type'] == 2) { ?>
  
                                 <a href="<?php echo base_url('Cpurchase/purchase_order') ?>" class="btnclr btn btn-default dropdown-toggle boxes filip-horizontal mobile_para"   style="height:fit-content;"  ><i class="far fa-file-alt"> </i> <?php echo display('Create Purchase Order') ?> </a>



        <?php } ?>
        &nbsp;&nbsp;

 
         <a  class="btnclr btn btn-default dropdown-toggle  boxes filip-horizontal  mobile_para"  style="height:fit-content;"  id="s_icon"><b class="fa fa-search"></b>&nbsp;Advance search  </a>
         &nbsp;&nbsp;
                        <div class="dropdown bootcol" id="drop" style="    width: 300px;">
                           <button class="btnclr btn btn-default dropdown-toggle  boxes filip-horizontal mobile_para" type="button" id="dropdownMenu1" style="float:left;"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" >
                           <span  class="fa fa-download"  ></span> <?php echo display('download') ?>
                           </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
            <li><a href="#" onclick="generate()"> <img src="<?php echo base_url() ?>assets/images/pdf.png" width="24px"> <?php echo display('PDF') ?></a></li>
            <li class="divider"></li>
            <li><a href="#" onclick="$('#ProfarmaInvList').tableExport({type:'excel',escape:'false'});"> <img src="<?php echo base_url() ?>assets/images/xls.png" width="24px"> <?php echo display('XLS') ?></a></li>
        </ul>
        &nbsp;&nbsp;
        </div>


    </div>



    <div class="col-sm-6" style="text-align: center;">
     <?php echo form_open_multipart('Cpurchase/manage_purchase_order',array('class' => 'form-vertical', 'id' => 'insert_sale','name' => 'insert_sale'))?>
        <?php
        $today = date('Y-m-d');
        ?>            
                     <div class="col-sm-2">
                         <div class="form-group" style="display: inline-block; vertical-align: middle;">
            <input type="text" class="form-control daterangepicker-field mobile_daterangepicker" name="daterangepicker-field"
                   style="padding: 5px;width: 180px;border-radius: 8px;height: inherit;"/>
                           &nbsp; &nbsp; &nbsp;
                         
                         
                        </div>
                       
                     </div>
                      <div class="col-sm-3">
                         <div class="form-group">
                             <button type="submit" class="btn btnclr dropdown-toggle mob_search" style="float:right;" ><i class="fa fa-search-plus" aria-hidden="true"></i> <?php echo display('search') ?></button> 
                         </div>
                     </div>
                      <?php echo form_close() ?>
                   </div>
  


     <div class="col-sm-2" style="float:right;">
          <div class="" style="float: right;">  <a onclick="reload();"  id="removeButton">  <i class="fa fa-refresh fa-spin" style="font-size:25px;float:right;" aria-hidden="true"></i> </a>    &nbsp;    &nbsp;    &nbsp;    &nbsp; <i class="fa fa-gear fa-spin"  aria-hidden="true" id="myBtn" style="margin-right:20px;font-size:25px;float:right;" onClick="columnSwitchMODAL()"></i></div>
      </div>
 

      </div>

            <br>
            <br> 
            <br> 


           
            <div id="search_area" style="border:4px solid #004d99;border-radius:7px;">
               <table class="table">
                  <thead>
                     <tr class="filters">
                        <th class="search_dropdown" style="width: 22%;color: black;">
                           <span><?php echo display('Invoice No') ?> </span>
                           <select id="pname-filter" class="form-control">
                              <option>Any</option>
                              <?php 
                                 $chalan_no  = array();
                                 foreach ($purchase_search as $invoice) {
                                 $chalan_no [] = $invoice['chalan_no'];
                                 }
                                 $unique_product = array_unique($chalan_no);
                                 
                                 
                                 $payment_terms = array();
                                 foreach ($purchase_search as $invoice) {
                                 $payment_terms[] = $invoice['payment_terms'];
                                 }
                                 $unique_model = array_unique($payment_terms);
                                 
                                 
                                 $shipment_terms = array();
                                 foreach ($purchase_search as $invoice) {
                                 $shipment_terms[] = $invoice['shipment_terms'];
                                 }
                                 $unique_category = array_unique($shipment_terms);
                                 
                                 
                                 $supplier_name = array();
                                 foreach ($purchase_search as $invoice) {
                                 $supplier_name[] = $invoice['supplier_name'];
                                 }
                                 $unique_unit = array_unique($supplier_name);
                                 
                                 $ship_to = array();
                                 foreach ($purchase_search as $invoice) {
                                 $ship_to[] = $invoice['ship_to'];
                                 }
                                 $unique_supplier_name = array_unique($ship_to);
                                 
                                
                                  foreach($unique_product as $product){  ?>
                              <option value="<?php echo $product; ?>"><?php echo $product; ?></option>
                              <?php }  ?>
                           </select>
                        </th>
                        <th class="search_dropdown" style="width: 22%;color: black;color: black;">
                           <span>Payment Terms</span>
                           <select id="model-filter" class="form-control">
                              <option>Any</option>
                              <?php foreach($unique_model as $invoice){  ?>
                              <option value="<?php echo $invoice; ?>"><?php echo $invoice; ?></option>
                              <?php }  ?>
                           </select>
                        </th>
                        <th class="search_dropdown" style="width: 22%;color: black;">
                           <span>Shipping Terms </span>
                           <select id="category-filter" class="form-control">
                              <option>Any</option>
                              <?php foreach($unique_category as $invoice){  ?>
                              <option value="<?php echo $invoice; ?>"><?php echo $invoice; ?></option>
                              <?php }  ?>
                           </select>
                        </th>
                        <th class="search_dropdown" style="width: 22%;color: black;">
                           <span>Vendor</span>
                           <select id="unit-filter" class="form-control">
                              <option>Any</option>
                              <?php foreach($unique_unit as $invoice){  ?>
                              <option value="<?php echo $invoice; ?>"><?php echo $invoice; ?></option>
                              <?php }  ?>
                           </select>
                        </th>
                        <th class="search_dropdown" style="width: 200px;color: black;">
                           <span>Ship To</span>
                           <select id="supplier-filter" class="form-control">
                              <option>Any</option>
                              <?php foreach($unique_supplier_name as $invoice){  ?>
                              <option value="<?php echo $invoice; ?>"><?php echo $invoice; ?></option>
                              <?php }  ?>
                           </select>
                        </th>
                     </tr>
                  </thead>
               </table>
               <table>
                  <tr>
                     <td style="width:10px;"></td>
                     <td style="width:22%;">   <input type="text" style="height:inherit;"  class="form-control" id="myInput1" onkeyup="search()" placeholder="Search for Invoice No.."></td>
                     <td style="width:10px;"></td>
                     <td style="width:22%;"> <input type="text" style="height:inherit;"  class="form-control" id="myInput2" onkeyup="search()" placeholder="Search for Payment Terms.."></td>
                     <td style="width:10px;"></td>
                     <td style="width:20%;">  <input type="text" style="height:inherit;" class="form-control" id="myInput3" onkeyup="search()" placeholder="Search for Shipping Terms.."></td>
                     <td style="width:10px;"></td>
                     <td style="width:20%;"> <input type="text" style="height:inherit;" class="form-control" id="myInput4" onkeyup="search()" placeholder="Search for Vendor.."></td>
                     <td style="width:10px;"></td>
                     <td style="width: 203px;"> <input type="text" style="height:inherit;" class="form-control" id="myInput5" onkeyup="search()" placeholder="Search for Ship To.."></td>
                  </tr>
               </table>
               <br/>
               <div class="col-sm-12">
                  <input id="search" type="text" class="form-control" style="height:inherit;"  placeholder="Search for Purchase Order">
                  <br>
               </div>
               <br>
            </div>
         </div>
      </div>




   <div class="row">
         <div class="col-sm-12"  >
            <div class="panel panel-bd lobidrag"     style="border: 3px solid #d7d4d6;">
               <div class="panel-heading"  style="border-color:white;" >
                  <div class="row"   style="height:0px;">
                     <input type="hidden" class="txt_csrfname" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                     <div id="for_filter_by" class="for_filter_by" style="display: inline;padding-top: -1px;    margin-right: 13px;">
                        <label for="filter_by"> <?php echo display('Filter By') ?> &nbsp;&nbsp;
                        </label>
                        <select id="filterby" style="border-radius:5px;height:25px;">
                              <option value="1"><?php echo display('ID')?></option>
                              <option value="2"><?php echo display('Invoice No')?></option>
                              <option value="3"><?php echo display('purchase_date')?></option>
                              <option value="4"><?php echo display('Ship to')?></option>
                              <option value="5"><?php echo display('Payment Terms')?></option>
                              <option value="6"><?php echo display('Shipment Terms')?></option>
                              <option value="7"><?php echo display('Estimated Shipment Date')?></option>
                              <option value="8"><?php echo display('Amount Paid')?></option>
                              <option value="9"><?php echo display('due_amount'); ?></option>
                              <option value="10"><?php echo display('total_amount')?></option>
                              <option value="11"><?php echo display('Vendor')?></option>
                              <option value="13"><?php echo display('Created By')?></option>
                              <option value="14"><?php echo display('P.O Number')?></option>
                              <option value="15"><?php echo display('Tax Details')?></option>
                              <option value="16"><?php echo display('Grand Total').display('Preferred Currency');?></option>
                              <option value="17"><?php echo display('Remarks / Details')?></option>
                           </select>
                        <input id="filterinput" style="border-radius:5px;height:25px;margin-bottom: 0px;" type="text"> 

                     </div>
                  </div>
               </div>





 

                           <div class="panel-body" style="margin-top: -35px;">
                  <div class="sortableTable__container">
                     <div class="sortableTable__discard">
                     </div>
                     <div id="customers">
                        <table class="table table-bordered" cellspacing="0" width="100%" id="ProfarmaInvList">
                           <thead class="sortableTable">
                           <tr   class="sortableTable__header btnclr">

 
                                 <th data-col="1" class="1 value"  data-control-column="1" name="ID" style="height: 39.0114px; width: 150.011px;text-align:center;color: white;"  ><?php echo display('ID')?></th>
                                 <th data-col="2" class="2 value" name="InvoiceNo"data-control-column="2" style="height: 39.0114px; width: 200.011px;text-align:center;color: white;" ><?php echo display('Invoice No')?></th>
                                 <th data-col="3" class="3 value" name="PurchaseDate" data-control-column="3" style="height: 39.0114px; width: 200.011px;text-align:center;color: white;" ><?php echo display('purchase_date')?></th>
                                 <th data-col="4" class="4 value" name="Shipto" data-control-column="4" style="height: 39.0114px; width: 150.011px;text-align:center;color: white;" ><?php echo display('Ship to')?></th>
                                 <th data-col="5" class="5 value" name="PaymentTerms"  data-control-column="5" style="height: 39.0114px; width: 150.011px;text-align:center;color: white;" ><?php echo display('Payment Terms')?></th>
                                 <th data-col="6" class="6 value" name="ShipmentTerms" data-control-column="6" style="height: 39.0114px; width: 150.011px;text-align:center;color: white;" ><?php echo display('Shipment Terms')?></th>
                                 <th data-col="7"  name="EstimatedShipDate"data-control-column="7" class="7 value" style="height: 39.0114px; width: 150.011px;text-align:center;color: white;"  ><?php echo display('Estimated Shipment Date')?></th>
                                 <th data-col="8" class="8 value" name="AmountPaid"data-control-column="8" style="height: 39.0114px; width: 200.011px;text-align:center;color: white;" ><?php echo display('Amount Paid')?></th>
                                 <th data-col="9" class="9 value" name="DueAmount" data-control-column="9"  style="height: 39.0114px; width: 200.011px;text-align:center;color: white;" ><?php echo display('due_amount'); ?></th>
                                 <th data-col="10" class="10 value" name="TotalAmount" data-control-column="10" style="height: 39.0114px; width: 200.011px;text-align:center;color: white;" ><?php echo display('total_amount')?></th>
                                 <th data-col="11" class="11 value" name="Vendor"data-control-column="11" style="height: 39.0114px; width:250.011px;text-align:center;color: white;"><?php echo display('Vendor')?></th>
                                 <th data-col="13" class="13 value" name="CreatedBy"data-control-column="13" style="height: 39.0114px; width: 150.011px;text-align:center;color: white;" ><?php echo display('Created By')?></th>
                                 <th data-col="14" class="14 value" name="P.ONumber" data-control-column="14" style="height: 39.0114px; width: 150.011px;text-align:center;color: white;" ><?php echo display('P.O Number')?></th>
                                 <th data-col="15" class="15 value" name="TaxDetails"data-control-column="15" style="height: 39.0114px; width: 150.011px;text-align:center;color: white;"  ><?php echo display('Tax Details')?></th>
                                 <th data-col="16" name="GrandTotal(Preferred Currency)" class="16 value" data-control-column="16" style="height: 39.0114px; width: 150.011px;text-align:center;color: white;" ><?php echo display('Grand Total').display('Preferred Currency');?></th>
                                 <th data-col="17" name="Remarks/Details" data-control-column="17" class="17 value" style="height: 39.0114px; width: 150.011px;text-align:center;color: white;" ><?php echo display('Remarks / Details')?></th>
                                 

                                 <div class="myButtonClass">
                                    <th class="text-center 18 value" data-col="18" style="width:380px;text-align:center;color: white;" data-formatter="commands" data-sortable="false" name="Action"><?php echo display('action')?></th>
                                 </div>

 


                                 
                              </tr>
                           </thead>
                            <tbody class="sortableTable__body" id="tab">
                              <?php
                                 $count=1;
                                 
                                 if(count($expense['rows'])>0){
                                     foreach($expense['rows'] as $k=>$arr){
                                       ?>


                              <tr style="text-align:center" class="task-list-row" data-task-id="<?php echo $count; ?>" data-pname="<?php echo $arr['chalan_no']; ?>" data-model="<?php echo $arr['payment_terms']; ?>" data-category="<?php echo $arr['shipment_terms']; ?>" data-unit="<?php echo $arr['supplier_name'] ?>" data-supplier="<?php echo $arr['ship_to'];  ?>">
                                                  <tr id="task-<?php echo $i; ?>"
                                                class="task-list-row"
                                                  data-task-id="<?php echo $i; ?>"
                                                  data-pname="<?php echo $arr['chalan_no']; ?>"
                                                  data-model="<?php echo $arr['payment_terms']; ?>"
                                                  data-category="<?php echo $arr['shipment_terms']; ?>"
                                                  data-unit="<?php echo $arr['supplier_name']; ?>"
                                                  data-supplier="<?php echo $arr['ship_to']; ?>">
                              
                                 <td data-col="1" class="1" style="text-align:center;"><?php  echo $count;  ?></td>
                                 <td data-col="2" class="2" style="text-align:center;white-space: nowrap;"><?php   echo $arr['chalan_no'];  ?></td>
                                 <td data-col="3" class="3" style="text-align:center;"><?php   echo $arr['purchase_date'];  ?></td>
                                 <td data-col="4" class="4" style="text-align:center;white-space: nowrap;"><?php   echo $arr['ship_to'];  ?></td>
                                 <td data-col="5" class="5" style="text-align:center;"><?php   echo $arr['payment_terms'];  ?></td>
                                 <td data-col="6" class="6" style="text-align:center;"><?php   echo $arr['shipment_terms'];  ?></td>
                                 <td data-col="7" class="7" style="text-align:center;"><?php   echo $arr['est_ship_date'];  ?></td>
                                 <td data-col="8" class="8" style="text-align:center;"><?php   echo $currency." ".$arr['paid_amount'];  ?></td>
                                 <td data-col="9" class="9" style="text-align:center;"><?php   echo $currency." ".$arr['due_amount'];  ?></td>
                                 <td data-col="10" class="10" style="text-align:center;"><?php    echo $currency." ".$arr['grand_total_amount'];  ?></td>
                                 <td data-col="11" class="11" style="text-align:center;white-space: nowrap;"><?php   echo $arr['supplier_name'];  ?></td>
                                 <td data-col="13" class="13" style="text-align:center;"><?php   echo $arr['created_by'];  ?></td>
                                 <td data-col="14" class="14" style="text-align:center;"><?php   echo $arr['purchase_order_id'];  ?></td>
                                 <td data-col="15" class="15 ads" style="text-align:center;"><?php   echo $currency." ".$arr['tax_details'];  ?></td>
                                 <td data-col="16" class="16 " style="text-align:center;"><?php   echo $currency." ".$arr['gtotal_preferred_currency'];  ?></td>
                                 <td data-col="17" class="17 ads" style="text-align:center;"><?php   echo $arr['remarks'];  ?></td>
                                 <td text-align="center"data-col="18" class="18" style="text-align:center;">
                                    <a class="btnclr btn  btn-sm"  href="<?php echo base_url()?>Cpurchase/purchase_order_details_data/<?php echo  $arr['purchase_order_id'];  ?>"><i class="fa fa-download" aria-hidden="true"></i></a>
                                    <?php    foreach(  $this->session->userdata('perm_data') as $test){
                                       $split=explode('-',$test);
                                       if(trim($split[0])=='expense' && $_SESSION['u_type'] ==3 && trim($split[1])=='0010'){
                                         
                                         
                                          ?>
                                    <a class="btnclr btn  btn-sm purchaseorder-edit"  href="<?php echo base_url()?>Cpurchase/purchase_order_update_form/<?php echo  $arr['purchase_order_id'];  ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                    <?php break;}} 
                                       if($_SESSION['u_type'] ==2){ ?>
                                    <a class="btnclr btn  btn-sm purchaseorder-edit"  href="<?php echo base_url()?>Cpurchase/purchase_order_update_form/<?php echo  $arr['purchase_order_id'];  ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                    <?php  } ?>
                                    <?php    foreach(  $this->session->userdata('perm_data') as $test){
                                       $split=explode('-',$test);
                                       if(trim($split[0])=='expense' && $_SESSION['u_type'] ==3 && trim($split[1])=='0001'){
                                          ?>
                                    <a class="btnclr btn  btn-sm"  onclick="return confirm('<?php echo display('are_you_sure') ?>')" href="<?php echo base_url()?>Cpurchase/purchase_order_delete_form/<?php echo  $arr['purchase_order_id'];  ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                    <?php break;}} 
                                       if($_SESSION['u_type'] ==2){ ?>
                                    <a class="btnclr btn  btn-sm"  onclick="return confirm('<?php echo display('are_you_sure') ?>')" href="<?php echo base_url()?>Cpurchase/purchase_order_delete_form/<?php echo  $arr['purchase_order_id'];  ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                    <?php  } ?>
                                 </td>
                              </tr>
                              <?php   
                                 $count++;
                                      
                                               
                                                 
                                 } }  else{
                                     ?>
                              <tr>
                                 <td colspan="14" style="text-align:center;font-weight:bold;"><?php  echo "No Records Found"  ;?></td>
                              </tr>
                              <?php
                                 }
                                 
                                 ?>
                           </tbody>
                       
                        </table>
                     </div>
                  </div>
               </div>
            </div>
            <input type="hidden" id="total_purchase_no" value="<?php echo $total_purhcase;?>" name="">
            <input type="hidden" id="currency" value="{currency}" name="">
         </div>
      </div>
   </section>















<!-- Manage Purchase End -->
   <input type="hidden" value="Sale/New Sale" id="url"/>
   <script src="<?php echo base_url()?>assets/js/jquery.bootgrid.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.0.0-alpha.1/jspdf.plugin.autotable.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.js'></script>
   <script src='https://cdnjs.cloudflare.com/ajax/libs/knockout/3.4.0/knockout-debug.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
   <script  src="<?php echo base_url() ?>my-assets/js/script.js"></script> 
   
 

   <script  src="<?php echo base_url() ?>my-assets/js/script.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery.bootgrid.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.0.0-alpha.1/jspdf.plugin.autotable.js"></script>
 
  
   <!-- The Modal Column Switch -->
   
   <div id="myModal_colSwitch"   name="myPurchaseorderName"      class="modal_colSwitch" >
                    <div class="modal-content_colSwitch" style="width:75%;height:30%;">
                          <span class="close_colSwitch">&times;</span>

                          <div class="col-sm-1"></div>

                          <div class="col-sm-3"><br><br>
                          <div class="form-group row">
               

                          <input type="checkbox"    data-control-column="1"    class=" 1" value="1"/>&nbsp; <?php echo display('ID')?><br><br>
                          <input type="checkbox"  checked="checked"  data-control-column="2"    class=" 2" value="2"/>&nbsp;<?php echo display('Invoice No')?><br><br>
                          <input type="checkbox"  checked="checked"  data-control-column="3"    class=" 3" value="3"/>&nbsp;<?php echo display('purchase_date')?><br><br>
                           
                         </div>  
                         </div>


                          <div class="col-sm-3"><br><br>
                          <div class="form-group row">

                          <input type="checkbox"     data-control-column="4"    class=" 4" value="4"/>&nbsp;<?php echo display('Ship to')?><br><br>

                          <input type="checkbox"     data-control-column="5"   class=" 5" value="5"/>&nbsp;<?php echo display('Payment Terms')?><br><br>
                          <input type="checkbox"  data-control-column="6"   class=" 6" value="6"/>&nbsp;<?php echo display('Shipment Terms')?><br><br>
                          <!-- <input type="checkbox"  data-control-column="8"  checked="checked" class="8" value="8"/>&nbsp;<?php echo display('Amount Paid')?><br><br> -->
              
                          </div>
                          </div>



                            <div class="col-sm-2"><br><br>
                            <div class="form-group row">
                            <input type="checkbox"  data-control-column="7"   class=" 7" value="7"/>&nbsp;<?php echo display('Estimated Shipment Date')?><br><br>

                            <!-- <input type="checkbox"  data-control-column="9"  checked="checked" class="9" value="9"/>&nbsp;<?php echo  ('Due Amount')?><br><br> -->
                            <input type="checkbox"  data-control-column="16"     class="16" value="16"/>&nbsp;<?php echo  ('Grand TotalPreferred Currency')?><br><br>
                            <!-- <input type="checkbox"  data-control-column="10" checked="checked"   class="10" value="10"/>&nbsp;<?php echo display('total_amount')?><br><br> -->
                            <!-- <input type="checkbox"  data-control-column="11"  checked="checked" class=" 11" value="11"/>&nbsp;<?php echo display('Vendor')?><br><br> -->
                            <input type="checkbox"  data-control-column="13"  class="13" value="13"/>&nbsp;<?php echo display('Created By')?><br><br>
           
                            </div>
                             </div>



                          <div class="col-sm-2"><br><br>
                          <div class="form-group row">


                          <input type="checkbox"  data-control-column="14"    class=" 14" value="14"/>&nbsp;<?php echo display('P.O Number')?><br>   <br>                                         
                          <input type="checkbox"  data-control-column="15"  class=" 15" value="15"/>&nbsp;<?php echo display('Tax Details')?><br><br>
                          <input type="checkbox"  data-control-column="17"  class="17" value="17"/>&nbsp;<?php echo display('Remarks / Details')?><br><br>
                          <!-- <input type="checkbox"  data-control-column="18" checked = "checked" class=" 18" value="18"/>&nbsp;<?php echo display('action')?><br><br> -->
                         
                           </div>
                           </div>

                          

                </div>
                </div>
</section>

</div> 







 


</div>
</div>
</section>
</div>
<script type="text/javascript" src="<?php echo base_url()?>my-assets/js/profarma.js"></script>
<input type="hidden" value="Purchase/PurchaseOrder" id="url"/>
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
<script>
   $(document).on('keyup', '#filterinput', function(){
    debugger;
      var value = $(this).val().toLowerCase();
      var filter=$("#filterby").val();
      $("#ProfarmaInvList tr:not(:eq(0))").filter(function() {
          $(this).toggle($(this).find("td."+filter).text().toLowerCase().indexOf(value) > -1)
      });
   });
</script>
<script>
   var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
   var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';
   $editor = $('#submit'),
   $editor.on('click', function(e) {
   if (this.checkValidity && !this.checkValidity()) return;
   e.preventDefault();
   var yourArray = [];
   //loop through all checkboxes which is checked
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
   
   $( document ).ready(function() {
   var page=$('#url').val();
   page=page.split('/');
   var data = {
       'menu':page[0],
       'submenu':page[1]
        
      
      };
     console.log(page[0]+"-"+page[1]);
      data[csrfName] = csrfHash;
   $.ajax({
   
   type: "POST",  
   url:'<?php echo base_url();?>Cinvoice/get_setting',
   
   data: data,
   dataType: "json", 
   success: function(data) {
    var menu=data.menu;
    var submenu=data.submenu;
    if(menu=='Purchase' && submenu=='PurchaseOrder'){
    var s=data.setting;
   s=JSON.parse(s);
   console.log(s);
   for (var i = 0; i < s.length; i++) {
   console.log(s[i]);
   $('td.'+s[i]).hide(); // hide the column header th
   $('th.'+s[i]).hide();
   $('tr').each(function(){
    $(this).find('td:eq('+$('td.'+s[i]).index()+')').hide();
   });
   }
   for (var i = 0; i < s.length; i++) {
      // if( $('.'+s[i]))
   $('.'+s[i]).prop('checked', false); //check the box from the array, note: you need to add a class to your checkbox group to only select the checkboxes, right now it selects all input elements that have the values in the array 
   }  
   }
   }
   });
   
   
   });
   





   $(document).ready(function() {
   
   
   
      var localStorageName = "myPurchaseorderName"; // Set your desired localStorage name

      $("input:checkbox").each(function() {
          var columnValue = $(this).attr("value");
          var columnSelector = ".table ." + columnValue;
          
           
                    var isChecked = localStorage.getItem(localStorageName  + columnSelector) === "true";

          
          // Check if the checkbox is checked or the stored state is true
          if (isChecked || $(this).prop("checked")) {
              $(columnSelector).show(); // Show the column
          } else {
              $(columnSelector).hide(); // Hide the column
          }
          $(this).prop("checked", isChecked);
      });
      // When a checkbox is clicked, update localStorage and toggle column visibility
      $("input:checkbox").click(function() {
          var columnValue = $(this).attr("value");
          var columnSelector = ".table ." + columnValue; // Corrected class name construction
          var isChecked = $(this).is(":checked");
           
                    localStorage.setItem(localStorageName + columnSelector, isChecked); // Store checkbox state in localStorage

          
          // Toggle column visibility based on the checkbox state
          if (isChecked) {
              $(columnSelector).show(); // Show the column
          } else {
              $(columnSelector).hide(); // Hide the column
          }
      });
});















   // $(document).ready(function() {
   //  $("input:checkbox").each(function() {
   //      var purchaseorder = "table ." + $(this).attr("value");
   //      var isChecked = localStorage.getItem(purchaseorder) === "true";
   //      $(this).prop("checked", isChecked);
   //      $(purchaseorder).toggle(isChecked); // Show/hide based on the stored state
   //  });
   //  });
   //  // When a checkbox is clicked, update localStorage and toggle column visibility
   //  $("input:checkbox").click(function() {
   //      var purchaseorder = "table ." + $(this).attr("value");
   //      var isChecked = $(this).is(":checked");
   //      localStorage.setItem(purchaseorder, isChecked); // Store checkbox state in localStorage
   //      $(purchaseorder).toggle(isChecked); // Show/hide based on the clicked state
   //  });
   








//   $("input:checkbox:not(:checked)").each(function() {
//   var column = "table ." + $(this).attr("value");
//   $(column).hide();
//   });
   
//   $("input:checkbox").click(function(){
//   var column = "table ." + $(this).attr("value");
//   $(column).toggle();
//   });
   
   
   
      $(document).ready(function(){
    $('#search_area').hide();
   });
   $('#s_icon').click(function(){
       $('#search_area').toggle();
   });
   
   
   $("#search").on("keyup", function() {
   var value = $(this).val().toLowerCase();
    $("#ProfarmaInvList tr:not(:eq(0))").filter(function() {
   
    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
   });
   });
   



   function search() {
   var input_pname,
    input_model,
    input_category,
    input_unit,
    input_supplier,
   
    filter_pname,filter_model,filter_category,filter_unit,filter_supplier,
    table,
    tr,
    td,
    i,
   
   input_pname = document.getElementById("myInput1");
   input_model = document.getElementById("myInput2");
   input_category = document.getElementById("myInput3");
   input_unit = document.getElementById("myInput4");
   input_supplier = document.getElementById("myInput5");
   
   filter_pname = input_pname.value.toUpperCase();   
   filter_model = input_model.value.toUpperCase();
   filter_category = input_category.value.toUpperCase();    
   filter_unit = input_unit.value.toUpperCase();
   filter_supplier = input_supplier.value.toUpperCase();
   
   
   
   table = document.getElementById("ProfarmaInvList");
   tr = table.getElementsByTagName("tr");
   for (i = 0; i < tr.length; i++) {
    
    td = tr[i].getElementsByTagName("td")[1];
    td1 = tr[i].getElementsByTagName("td")[4];
    td2 = tr[i].getElementsByTagName("td")[5];
    td3 = tr[i].getElementsByTagName("td")[10];
    td4 = tr[i].getElementsByTagName("td")[3];



    if (td && td1 && td2 && td3 && td4) {
      input_pname = (td.textContent || td.innerText).toUpperCase();
      input_model = (td1.textContent || td1.innerText).toUpperCase();
      input_category = (td2.textContent || td2.innerText).toUpperCase();
      input_unit = (td3.textContent || td3.innerText).toUpperCase();
      input_supplier = (td4.textContent || td4.innerText).toUpperCase();
      if (
        input_pname.indexOf(filter_pname) > -1 &&
        input_model.indexOf(filter_model) > -1 &&
        input_category.indexOf(filter_category) > -1 &&
        input_unit.indexOf(filter_unit) > -1 &&
        input_supplier.indexOf(filter_supplier) > -1
      ) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
   }
   }
   



 
   $("#search").on("keyup", function() {
   var value = $(this).val().toLowerCase();
    $("#ProfarmaInvList tr:not(:eq(0))").filter(function() {
   
    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
   });
   });
   
   
   
    var
  filters = {
    user: null,
    status: null,
    milestone: null,
    priority: null,
    tags: null
  };




   function updateFilters() {
  $('.task-list-row').hide().filter(function() {
    var
      self = $(this),
      result = true; // not guilty until proven guilty
    
    Object.keys(filters).forEach(function (filter) {
      if (filters[filter] && (filters[filter] != 'None') && (filters[filter] != 'Any')) {
        result = result && filters[filter] == self.data(filter);
      
      }
    });

    return result;
  }).show();
}


    function changeFilter(filterName) {
  filters[filterName] = this.value;
  updateFilters();
}
      
    // Assigned User Dropdown Filter
    $('#pname-filter').on('change', function() {
        // alert('hi');
      changeFilter.call(this, 'pname');
    });
    
    // Task Status Dropdown Filter
    $('#model-filter').on('change', function() {
      changeFilter.call(this, 'model');
    });
    
    // Task Milestone Dropdown Filter
    $('#category-filter').on('change', function() {
      changeFilter.call(this, 'category');
    });
    
    // Task Priority Dropdown Filter
    $('#unit-filter').on('change', function() {
      changeFilter.call(this, 'unit');
    });
    
    // Task Tags Dropdown Filter
    $('#supplier-filter').on('change', function() {
      changeFilter.call(this, 'supplier');
    });
  

   function reload(){
       location.reload();
   }
   
   
   
        
    
        










        
        
    $(document).ready(function() {
    // Function to store the visibility state of rows in localStorage
    function storeVisibilityState() {
        var purchaseordervisibilityStates = {};
        $("#ProfarmaInvList tr").each(function(index, element) {
            var row = $(element);
            var rowID = index;
            var isVisible = row.is(':visible');
            purchaseordervisibilityStates[rowID] = isVisible;
        });
        // Store the visibility states in localStorage
        localStorage.setItem("purchaseordervisibilityStates", JSON.stringify(purchaseordervisibilityStates));
    }

    // Apply the stored visibility state on page load
    function applyVisibilityState() {
        var storedVisibilityStates = JSON.parse(localStorage.getItem("purchaseordervisibilityStates")) || {};
        $("#ProfarmaInvList tr").each(function(index, element) {
            var row = $(element);
            var rowID = index;
            if (storedVisibilityStates.hasOwnProperty(rowID) && !storedVisibilityStates[rowID]) {
                row.hide();
            } else {
                row.show();
            }
        });
    }

    // Event listener for row clicks to toggle row visibility
    $(".purchaseorder-edit").on('click', function() {
        var row = $(this);
        storeVisibilityState(); // Store the updated visibility state
    });

    // Event listener for submitting edited data
    $(".final_submit").on('submit', function(event) {
        event.preventDefault();
        var editedData = $("#editedData").val();
        // Store the edited data in localStorage
        localStorage.setItem("editedData", editedData);
    });

    // Display the stored edited data
    function displayEditedData() {
        var editedData = localStorage.getItem("editedData");
        if (editedData) {
            $("#displayEditedData").text(editedData);
        }
    }

    applyVisibilityState(); // Apply the stored visibility state on page load
    displayEditedData(); // Display the stored edited data on page load
});
        
        
        
        function removeItemFromLocalStorage() {
         
          const keyToRemove = 'purchaseordervisibilityStates';
        
          // Check if the item exists in localStorage
          if (localStorage.getItem(keyToRemove)) {
            // Remove the item from localStorage
            localStorage.removeItem(keyToRemove);
            console.log("Item removed from localStorage");
          } else {
            console.log("Item not found in localStorage");
          }
        }
        
        // Add a click event listener to the button
        const removeButton = document.getElementById('purchaseorderRemove');
        removeButton.addEventListener('click', removeItemFromLocalStorage);

</script>








<style>
   .table{
   display: block;
   overflow-x: auto;
   }
   .Row {
   display: table;
   width: 100%; /*Optional*/
   table-layout: fixed; /*Optional*/
   border-spacing: 5px; /*Optional*/
   }
   .Column {
   display: table-cell;
   }
   th {
   padding: 10px !important;
   }
   .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
   vertical-align: middle;
   }
   .search_dropdown{
   background:center;
   }
   /* th{
   color:black;
   } */
   .select2{
   display:none;
   }



   .pagecontroller {
         margin: 5px;
    }


    /* .filip-horizontal:hover{
    background-color: crimson;
    transition: all 1s;
    -webkit-transform: rotateY(-360deg);
        -ms-transform: rotateY(-360deg);
        transform: rotateY(-360deg);
} */


.ads{
   max-width: 0px !important;
   white-space: nowrap;
   overflow: hidden;
   text-overflow: ellipsis;
   }









</style>