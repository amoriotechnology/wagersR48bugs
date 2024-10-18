<?php  error_reporting(1);?>
<script src="<?php echo base_url()?>my-assets/js/admin_js/oceanImport.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/drag_drop_index_table.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.base64.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/html2canvas.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jspdf.plugin.autotable"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jspdf.umd.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<script type="text/javascript" src="<?php echo base_url()?>my-assets/js/expense_tableManager.js"></script>
<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
<script type="text/javascript" src="http://mrrio.github.io/jsPDF/dist/jspdf.debug.js"></script>
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" />
<input type="hidden" value="Sale/New Sale" id="url"/>
<script src="<?php echo base_url()?>assets/js/jquery.bootgrid.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.0.0-alpha.1/jspdf.plugin.autotable.js"></script>
<!--<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>-->
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/knockout/3.4.0/knockout-debug.js'></script>
<!--<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
<script  src="<?php echo base_url() ?>my-assets/js/script.js"></script> 
<!--<script type="text/javascript" src="<?php echo base_url()?>my-assets/js/profarma.js"></script>-->
<script  src="<?php echo base_url() ?>my-assets/js/script.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery.bootgrid.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.0.0-alpha.1/jspdf.plugin.autotable.js"></script>
<style>
   .btnclr{
   background-color:<?php echo $setting_detail[0]['button_color']; ?>;
   color: white;
   }
</style>
<div class="content-wrapper">
   <section class="content-header">
      <div class="header-icon">
         <figure class="one">
         <img src="<?php echo base_url()  ?>asset/images/expenses.png"  class="headshotphoto" style="height:50px;" />      
      </div>
      <div class="header-title">
         <div class="logo-holder logo-9">
            <h1><strong><?php echo display('manage_purchase') ?></strong></h1>
         </div>
         <small><?php //echo display('manage_your_purchase') ?></small>
         <ol class="breadcrumb"  style="border: 3px solid #d7d4d6;"  >
            <li><a href="<?php   echo base_url(); ?>"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
            <li><a href="#"><?php echo display('purchase') ?></a></li>
            <li class="active" style="color:orange;"><?php echo display('manage_purchase') ?></li>
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
         $message = $this->session->userdata('show');
         
         if (isset($message)) {
         
             ?>
      <div class="alert alert-info alert-dismissable" style="background-color:#38469f;color:white;font-weight:bold;">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
         <?php echo $message; ?>                    
      </div>
      <?php
         // $this->session->unset_userdata('message');
         
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
      <!-- Alert Message -->
      <?php
         $message = $this->session->userdata('alert');
         if (isset($message)) {
         ?>
      <script type="text/javascript">
         $(window).on('load', function() {
             $('#myModal').modal('show');
         });
      </script>
      <?php } 
         ?>
      <div class="panel panel-bd lobidrag" >
         <div class="panel-heading" style="height: 60px;    border: 3px solid #d7d4d6;">
            <div class="col-sm-12" style="height:69px;">
               <div class="col-sm-4" style="display: flex; justify-content: space-between; align-items: left;">
                  <?php foreach($this->session->userdata('perm_data') as $test) {
                     $split = explode('-', $test);
                     if(trim($split[0])=='expense' && $_SESSION['u_type'] ==3 && trim($split[1])=='1000'){
                        ?>
                  <a href="<?php echo base_url('Cpurchase') ?>" class="btnclr btn btn-default dropdown-toggle boxes filip-horizontal"   style="height:fit-content;"  ><i class="far fa-file-alt"> </i> <?php echo display('Create Expense') ?> </a>
                  <?php break;
                     }
                     }
                     if ($_SESSION['u_type'] == 2) { ?>
                  <a href="<?php echo base_url('Cpurchase') ?>" class="btnclr btn btn-default dropdown-toggle boxes filip-horizontal"   style="height:fit-content;"  ><i class="far fa-file-alt"> </i> <?php echo display('Create Expense') ?> </a>
                  <?php } ?>
                  &nbsp;&nbsp;
                  <a  class="btnclr btn btn-default dropdown-toggle  boxes filip-horizontal "  style="height:fit-content;"  id="s_icon"><b class="fa fa-search"></b>&nbsp;Advance search  </a>
                  &nbsp;&nbsp;
                  <div class="dropdown bootcol" id="drop" style="    width: 300px;">
                     <button class="btnclr btn btn-default dropdown-toggle  boxes filip-horizontal" type="button" id="dropdownMenu1" style="float:left;"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" >
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
               <div class="col-sm-2" style="float:right;">
                  <div class="mobile_view" style="float: right;">  <a onclick="reload();"  id="removeButton"> <i class="fa fa-refresh fa-spin" style="font-size:25px;float:right;" aria-hidden="true"></i> </a>    &nbsp;    &nbsp;    &nbsp;    &nbsp; <i class="fa fa-gear fa-spin"  aria-hidden="true" id="myBtn" style="margin-right:20px;font-size:25px;float:right;" onClick="columnSwitchMODAL()"></i></div>
               </div>
            </div>
            <br>
            <br> 
            <br> 
            <div id="search_area" style="border:4px solid #004d99;border-radius:7px;">
               <table class="table">
                  <thead>
                     <tr class="filters">
                        <th class="search_dropdown" style="width: 22%;">
                           <span><?php echo display('Invoice No') ?> </span>
                           <select id="pname-filter" class="form-control">
                              <option>Any</option>
                              <?php 
                                 $chalan_no  = array();
                                 foreach ($expenses as $expense) {
                                 $chalan_no [] = $expense['chalan_no'];
                                 }
                                 $unique_product = array_unique($chalan_no);
                                 
                                 
                                 $container_no = array();
                                 foreach ($expenses as $expense) {
                                 $container_no[] = $expense['container_no'];
                                 }
                                 $unique_model = array_unique($container_no);
                                 
                                 
                                 $payment_terms = array();
                                 foreach ($expenses as $expense) {
                                 $payment_terms[] = $expense['vendor_type'];
                                 }
                                 $unique_category = array_unique($payment_terms);
                                 
                                 
                                 $supplier_name = array();
                                 foreach ($expenses as $expense) {
                                 $supplier_name[] = $expense['supplier_name'];
                                 }
                                 $unique_unit = array_unique($supplier_name);
                                                                                          
                                 $purchase_date = array();
                                 foreach ($expenses as $expense) {
                                 $purchase_date[] = $expense['purchase_date'];
                                 }
                                 $unique_supplier_name = array_unique($purchase_date);
                                 
                                 $payment_due_date = array();
                                 foreach ($expenses as $expense) {
                                 $payment_due_date[] = $expense['payment_due_date'];
                                 }
                                 $unique_supplier = array_unique($payment_due_date);
                                 
                                 
                                  foreach($unique_product as $product){  ?>
                              <option value="<?php echo $product; ?>"><?php echo $product; ?></option>
                              <?php }  ?>
                           </select>
                        </th>
                        <th class="search_dropdown" style="width: 18%;">
                           <span>Container No</span>
                           <select id="model-filter" class="form-control">
                              <option>Any</option>
                              <?php foreach($unique_model as $invoice){  ?>
                              <option value="<?php echo $invoice; ?>"><?php echo $invoice; ?></option>
                              <?php }  ?>
                           </select>
                        </th>
                        <th class="search_dropdown" style="width: 18%;">
                           <span>Vendor Type</span>
                           <select id="category-filter" class="form-control">
                              <option>Any</option>
                              <?php foreach($unique_category as $invoice){  ?>
                              <option value="<?php echo $invoice; ?>"><?php echo $invoice; ?></option>
                              <?php }  ?>
                           </select>
                        </th>
                        <th class="search_dropdown" style="width: 18%;">
                           <span>Vendor</span>
                           <select id="unit-filter" class="form-control">
                              <option>Any</option>
                              <?php foreach($unique_unit as $invoice){  ?>
                              <option value="<?php echo $invoice; ?>"><?php echo $invoice; ?></option>
                              <?php }  ?>
                           </select>
                        </th>
                        <th class="search_dropdown" style="width: 200px;">
                           <span>Purchase Date</span>
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
                     <td style="width:16%;">   <input type="text" class="form-control" id="myInput1" onkeyup="search()" placeholder="Search for Invoice No.."></td>
                     <td style="width:10px;"></td>
                     <td style="width:16%;"> <input type="text" class="form-control" id="myInput2" onkeyup="search()" placeholder="Search for Container No.."></td>
                     <td style="width:10px;"></td>
                     <td style="width:16%;">  <input type="text" class="form-control" id="myInput3" onkeyup="search()" placeholder="Search for Payment Terms.."></td>
                     <td style="width:10px;"></td>
                     <td style="width:18%;"> <input type="text" class="form-control" id="myInput4" onkeyup="search()" placeholder="Search for Vendor.."></td>
                     <td style="width:10px;"></td>
                     <td style="width:18%;"> <input type="text" class="form-control" id="myInput5" onkeyup="search()" placeholder="Search for Purchase Date.."></td>
                     <td style="width:10px;"></td>
                     <td style="width: 193px;"> <input type="text" class="form-control" id="myInput6" onkeyup="search()" placeholder="Search for Purchase I.."></td>
                  </tr>
               </table>
               <br/>
               <div class="col-sm-12">
                  <input id="search" type="text" class="form-control"  placeholder="Search for Expenses">
                  <br>
               </div>
               <br>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-sm-12"  >
            <div class="panel panel-bd lobidrag"    id="panel"  style="border: 3px solid #d7d4d6;">
               <div class="panel-heading"  style="border-color:white;" >
                  <div class="row"   style="height:0px;">
                     <input type="hidden" class="txt_csrfname" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                     <div id="for_filter_by" class="for_filter_by" style="display: inline;padding-top: -1px;    margin-right: 13px;">
                        <label for="filter_by"> <?php echo display('Filter By') ?> &nbsp;&nbsp;
                        </label>
                        <select id="filterby" style="border-radius:5px;height:25px;">
                           <option value="0"><?php echo display('ID')?></option>
                           <option value="1"><?php echo ('Name')?></option>
                           <option value="2"><?php echo  ('Bill No')?></option>
                           <option value="3"><?php echo display('purchase_id')?></option>
                           <option value="4"><?php echo display('purchase_date')?></option>
                           <option value="5"><?php echo display('Container Number')?></option>
                           <option value="6"><?php echo display('Estimated Time of Arrival')?></option>
                           <option value="7"><?php echo display('Estimated Time of Departure')?></option>
                           <option value="8"><?php echo display('Bl Number')?></option>
                           <option value="9"><?php echo display('Payment Terms')?></option>
                           <option value="10"><?php echo display('Port of Discharge')?></option>
                           <option value="11"><?php echo display('Overall Gross')?></option>
                           <option value="12"><?php echo display('Overall Net')?></option>
                           <option value="13"><?php echo  ('tax Details')?></option>
                           <option value="14"><?php echo ('Grand Total')?></option>
                           <option value="15"><?php echo  ('Grand Total Preferred Currency')?></option>
                           <option value="16"><?php echo display('Amount Paid')?></option>
                           <option value="17"><?php echo display('Balance Amount')?></option>
                           <option value="18"><?php echo display('Vendor Type')?></option>
                           <option value="19"><?php echo display('Service Provider Address')?></option>
                           <option value="20"><?php echo ('Phone Number')?></option>
                           <option value="21"><?php echo  ('Account Category Name')?></option>
                           <option value="22"><?php echo  ('Account Sub Name')?></option>
                           <option value="23"><?php echo  ('Account  category')?></option>
                        </select>
                        <input id="filterinput" style="border-radius:5px;height:25px;" type="text">
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
                                 <th data-col="0" class="0 value" name="ID" data-control-column="0"  style="height: 39.0114px; width: 150.011px;text-align:center;color: white;"><?php echo display('ID')?></th>
                                 <th data-col="1" class="1 value" name="ID" data-control-column="1"  style="height: 39.0114px; width: 150.011px;text-align:center;color: white;"><?php echo  ('Name')?></th>
                                 <th data-col="2" class="2 value" name="InvoiceNo " data-control-column="2"  style="height: 39.0114px; width: 150.011px;text-align:center;color: white;" ><?php echo  ('Bill No')?></th>
                                 <th data-col="3" class="3 value" name="Purchase" data-control-column="3" style="height: 39.0114px; width: 150.011px;text-align:center;color: white;"><?php echo display('purchase_id')?></th>
                                 <th data-col="4" class="4 value" name="PurchaseDate" data-control-column="5" style="width: 200.011px; height: 43.0114px;text-align:center;color: white;"><?php echo display('purchase_date')?></th>
                                 <th data-col="5" class="5 value" name="ContainerNo"  data-control-column="4" style="width: 253.011px;text-align:center;color: white;"><?php echo display('Container Number')?></th>

                                  <th data-col="25" class="25 value" name="Paymentduedate"  data-control-column="25" style="width: 253.011px;text-align:center;color: white;"><?php echo ('Payment Due date')?></th>

                                 <th data-col="6" data-control-column="6 " name="EstimatedTimeofArrival" class="6 value" style="width: 253.011px;text-align:center;color: white;" ><?php echo display('Estimated Time of Arrival')?></th>
                                 <th data-col="7"data-control-column="7 "name="EstimatedTimeofDeparture" class="7 value" style="width: 253.011px;text-align:center;color: white;" ><?php echo display('Estimated Time of Departure')?></th>
                                 <th data-col="8" class="8 value" data-control-column="8" name="BlNumber"  style="width: 253.011px;text-align:center;color: white;" ><?php echo display('Bl Number')?></th>
                                 <th data-col="9" class="9 value"data-control-column="9" style="width: 100.011px;text-align:center;color: white;" name="PaymentTerms"><?php echo display('Payment Terms')?></th>
                                 <th data-col="10"class="10 value" data-control-column="10" style="width:100px;text-align:center;color: white;"name="PortofDischarge"><?php echo display('Port of Discharge')?></th>
                                 <th data-col="11" class="11 value"data-control-column="11"  style="width:100px;text-align:center;color: white;" name="OverallGross"><?php echo display('Overall Gross')?></th>
                                 <th data-col="12" class="12 value" data-control-column="12" style="width:100px;text-align:center;color: white;" name="OverallNet"><?php echo display('Overall Net')?></th>
                                 <th data-col="13" class="13 value"data-control-column="13" style="width: 250.011px;text-align:center;color: white;"name="AmountPaid" ><?php echo  ('Tax Details')?></th>
                                 <th data-col="14" class="14 value" style="width: 199.011px; height: 37.0114px;text-align:center;color: white;"data-control-column="14"name="TotalAmount"><?php echo  ('Grand Total')?></th>
                                 <th data-col="15" class="15 value" data-control-column="15" style="width:100px;text-align:center;color: white;" name="Service Provider ID"><?php echo  ('Grand Total Preferred Currency')?></th>
                                 <th data-col="16" class="16 value"data-control-column="16" style="width: 250.011px;text-align:center;color: white;"name="Vendor Type" ><?php echo display('Amount Paid')?></th>
                                 <th data-col="17" class="17 value"data-control-column="17" style="width: 250.011px;text-align:center;color: white;"name="Vendor Type" ><?php echo display('Balance Amount')?></th>
                                 <th data-col="18" class="18 value" style="width: 199.011px; height: 37.0114px;text-align:center;color: white;"data-control-column="18"name="Vendor Type"><?php echo ('Vendor Type')?></th>
                                 <th data-col="19" class="19 value" style="width: 199.011px; height: 37.0114px;text-align:center;color: white;"data-control-column="19"name="Service Provider Address"><?php echo display('Service Provider Address')?></th>
                                 <th data-col="20" class="20 value" style="width: 199.011px; height: 37.0114px;text-align:center;color: white;"data-control-column="20"name="TotalAmount"><?php echo ('Phone Number')?></th>
                                 <th data-col="21" class="21 value"data-control-column="21" style="width: 250.011px;text-align:center;color: white;"name="Account Category Name" ><?php echo display('Account Category Name')?></th>
                                 <th data-col="22" class="22 value"data-control-column="22" style="width: 250.011px;text-align:center;color: white;"name="Account Sub category" ><?php echo display('Account Sub category')?></th>
                                 <th data-col="23" class="23 value "data-control-column="23" style="width: 250.011px;text-align:center;color: white;"name="Account Category" ><?php echo display('Account Category')?></th>
                                 <div class="myButtonClass">
                                    <th class="text-center 24 value" data-col="24" style="width:380px;text-align:center;color: white;" data-formatter="commands" data-sortable="false" name="Action"><?php echo display('action')?></th>
                                 </div>
                              </tr>
                           </thead>
                           <tbody class="sortableTable__body" id="tab">
                              <?php
                                 //  print_r($allinfo);
                                 $count=1;
                                 if(count($allinfo)>0){
                                 foreach($allinfo[0] as $arr){
                                 //  print_r($arr);
                                 ?>
                              <tr style="text-align:center" class="task-list-row" data-task-id="<?php echo $count; ?>" data-pname="<?php echo $arr['chalan_no']; ?>" data-model="<?php echo $arr['container_no']; ?>" data-category="<?php echo $arr['vendor_type']; ?>" data-unit="<?php echo $arr['supplier_name'] ?>" data-supplier="<?php echo $arr['purchase_date'];  ?>">
                                 <td data-col="0" class="0"><?php  echo $count;  ?></td>
                                 <td data-col="1" class="1" style="text-align:center;white-space:nowrap;" ><?php  if(!empty($arr['service_provider_name']  && $arr['service_provider_name'] !== 'N/A' )) { echo $arr['service_provider_name'];}    else if(!empty($arr['supplier_name'] && $arr['supplier_name'] !== 'N/A' )){echo $arr['supplier_name'];}     else if($arr['service_provider_name'] == 'N/A' || $arr['supplier_name'] == 'N/A'){echo 'N/A';}  ?></td>
                                 <td data-col="2" class="2"style="text-align:center;" ><?php  if(!empty($arr['bill_number']  && $arr['bill_number'] !== 'N/A' )) { echo $arr['bill_number'];}    else if(!empty($arr['chalan_no'] && $arr['chalan_no'] !== 'N/A' )){echo $arr['chalan_no'];}     else {echo 'N/A';}  ?></td>
                                 <td data-col="3" class="3" style="text-align:center;" ><?php  if(!empty($arr['purchase_id']  && $arr['purchase_id'] !== 'N/A' )) { echo $arr['purchase_id'];}    else if(!empty($arr['serviceprovider_id'] && $arr['serviceprovider_id'] !== 'N/A' )){echo $arr['serviceprovider_id'];}     else if($arr['purchase_id'] == 'N/A' || $arr['serviceprovider_id'] == 'N/A'){echo 'N/A';}  ?></td>
                                 <td data-col="4" class="4 ads"style="text-align:center;"><?php  if(!empty($arr['purchase_date']  && $arr['purchase_date'] !== 'N/A' )) { echo $arr['purchase_date'];}    else if(!empty($arr['bill_date'] && $arr['bill_date'] !== 'N/A' )){echo $arr['bill_date'];}     else if($arr['purchase_date'] == 'N/A' || $arr['bill_date'] == 'N/A'){echo 'N/A';}  ?></td>
                                 <td data-col="5" class="5 ads" style="text-align:center;"><?php   if(!empty($arr['container_no'])) { echo $arr['container_no'];}else{echo "N/A";}  ?></td>
                                
                                 <td data-col="25" class="25" style="text-align:center;"><?php   if(!empty($arr['payment_due_date'])) { echo $arr['payment_due_date'];}else{echo "N/A";}  ?></td>

                                 <td data-col="6" class="6 ads" style="text-align:center;"><?php    if(!empty($arr['eta'])) { echo $arr['eta'];}else{echo "N/A";}   ?></td>
                                 <td data-col="7" class="7 ads" style="text-align:center;"><?php    if(!empty($arr['eta'])) { echo $arr['eta'];}else{echo "N/A";}   ?></td>
                                 <td data-col="8" class="8" style="text-align:center;"> <?php  if(!empty($arr['bl_number'])) { echo $arr['bl_number'];}else{echo "N/A";}     ?></td>
                                 <!-- <td data-col="9" class="9"><?php  //if(!empty($arr['payment_terms']  && $arr['payment_terms'] !== 'N/A' )) { echo $arr['payment_terms'];}    else if(!empty($arr['payment_terms'] && $arr['payment_terms'] !== 'N/A' )){echo $arr['payment_terms'];}     else{echo 'N/A';}  ?></td> -->
                                 <td data-col="9" class="9 ads" style="text-align:center;"> <?php  if(!empty($arr['payment_terms'])) { echo $arr['payment_terms'];}else{echo "N/A";}     ?></td>
                                 <td data-col="10 " class="10" style="text-align:center;"><?php  if(!empty($arr['Port_of_discharge'])) { echo $arr['Port_of_discharge'];}else{echo "N/A";}   ?></td>
                                 <td data-col="11" class="11" style="text-align:center;"><?php     if(!empty($arr['total_gross'])) { echo $arr['total_gross'];}else{echo "N/A";}   ?></td>
                                 <td data-col="12" class="12" style="text-align:center;"><?php   if(!empty($arr['total_net'])) { echo $arr['total_net'];}else{echo "N/A";}      ?></td>
                                 <td data-col="13" class="13" style="text-align:center;"><?php  if(!empty($arr['tax_detail']  && $arr['tax_detail'] !== 'N/A' )) { echo $arr['tax_detail'];}    else if(!empty($arr['total_tax'] && $arr['total_tax'] !== 'N/A' )){echo $arr['total_tax'];}     else {echo 'N/A';}  ?></td>
                                 <td data-col="14" class="14" style="text-align:center;"><?php  if(!empty($arr['grand_total_amount']  && $arr['grand_total_amount'] !== 'N/A' )) { echo $currency." ".$arr['grand_total_amount'];}    else if(!empty($arr['total'] && $arr['total'] !== 'N/A' )){echo $currency." ".$arr['total'];}     else {echo 'N/A';}  ?></td>
                                 <td data-col="15" class="15" style="text-align:center;" ><?php  if(!empty($arr['gtotal_preferred_currency']  && $arr['gtotal_preferred_currency'] !== 'N/A' )) { echo $currency." ".$arr['gtotal_preferred_currency'];}    else if(!empty($arr['vendor_gtotals'] && $arr['vendor_gtotals'] !== 'N/A' )){echo $currency." ".$arr['vendor_gtotals'];}     else {echo 'N/A';}  ?></td>
                                 <td data-col="16" class="16" style="text-align:center;"><?php  if(!empty($arr['paid_amount']  && $arr['paid_amount'] !== 'N/A' )) { echo $currency." ".$arr['paid_amount'];}    else if(!empty($arr['amount_paids'] && $arr['amount_paids'] !== 'N/A' )){echo $currency." ".$arr['amount_paids'];}     else{echo 'N/A';}  ?></td>
                                 <td data-col="17" class="17" style="text-align:center;"><?php  if(!empty($arr['balance']  && $arr['balance'] !== 'N/A' )) { echo $currency." ".$arr['balance'];}    else if(!empty($arr['balances'] && $arr['balances'] !== 'N/A' )){echo $currency." ".$arr['balances'];}     else{echo 'N/A';}  ?></td>
                                 <td data-col="18" class="18" style="text-align:center;"><?php  if(!empty($arr['vendor_type'] )) { echo $arr['vendor_type'];}else{echo "N/A";}  ?></td>
                                 <td data-col="19" class="19 ads" style="text-align:center;"><?php  if(!empty($arr['sp_address'])) { echo $arr['sp_address'];}else{echo "N/A";}  ?></td>
                                 <td data-col="20" class="20 ads" style="text-align:center;"><?php   if(!empty($arr['phone_num'])) { echo $arr['phone_num'];}else{echo "N/A";}    ?></td>
                                 <td data-col="21" class="21 ads" style="text-align:center;"><?php   if(!empty($arr['account_category'])) { echo $arr['account_category'];}else{echo "N/A";}   ?></td>
                                 <td data-col="22" class="22 ads" style="text-align:center;"><?php   if(!empty($arr['amount_pay_usd'])) { echo $arr['sub_category'];}else{echo "N/A";}   ?></td>
                                 <td data-col="23" class="23 ada" style="text-align:center;"><?php   if(!empty($arr['acc_cat'])) { echo $arr['acc_cat'];}else{echo "N/A";}   ?></td>
                                 <td data-col="24" class="24" style="text-align:center;">
                                    <?php   if(!empty($arr['purchase_id'])) { ?> <a href="<?php echo base_url()?>Payment_Gateway/Welcome/index/<?php echo  $arr['purchase_id'];  ?>" class="btnclr btn btn-sm" data-toggle="tooltip" data-placement="left" title="Payment"><i class="fa fa-credit-card"></i></a> <?php  } ?>
                                    <!-- <a href="<?php //echo base_url()?>Cpurchase/purchase_details_data/<?php echo  $arr['purchase_id'];  ?>"  class="btnclr btn btn-success btn-sm" data-toggle="tooltip" data-placement="left" title="" data-original-title="Expenses Details"><i class="fa fa-download" aria-hidden="true"></i></a> -->
                                    <?php   foreach(  $this->session->userdata('perm_data') as $test){
                                       $split=explode('-',$test);
                                        if(trim($split[0])=='expense' && $_SESSION['u_type'] ==3 && trim($split[1])=='0010'){
                                            
                                          
                                           ?>
                                    <a class="btnclr btn btn-success btn-sm expenselocal-edit"  href="<?php if(!empty($arr['purchase_id'])) 
                                       { 
                                         echo base_url()?>Cpurchase/purchase_update_form/<?php echo  $arr['purchase_id']; }else{
                                       echo base_url()?>Cpurchase/serviceprovider_update_form/<?php echo  $arr['serviceprovider_id'];
                                       } ?>"><i class="fa fa-pencil"  aria-hidden="true"></i></a>
                                    <?php break;}} 
                                       if($_SESSION['u_type'] ==2){ ?>
                                    <a class="btnclr btn btn-success btn-sm expenselocal-edit"  href="<?php if(!empty($arr['purchase_id'])) 
                                       { 
                                         echo base_url()?>Cpurchase/purchase_update_form/<?php echo  $arr['purchase_id']; }else{
                                       echo base_url()?>Cpurchase/serviceprovider_update_form/<?php echo  $arr['serviceprovider_id'];
                                       } ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                    <?php  } ?>
                                    <a class="btnclr btn  btn-sm"  onclick="return confirm('<?php echo display('are_you_sure') ?>')"  href="<?php if(!empty($arr['purchase_id'])) 
                                       { 
                                         echo base_url()?>Cpurchase/purchase_delete_form/<?php echo  $arr['purchase_id']; }else{
                                       echo base_url()?>Cpurchase/servicepro_delete_data/<?php echo  $arr['serviceprovider_id'];
                                       } ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>  
                                    <a class="btnclr btn btn-success btn-sm"   href="<?php if(!empty($arr['purchase_id'])) 
                                       { 
                                         echo base_url()?>Cpurchase/purchase_details_data/<?php echo  $arr['purchase_id']; }else{
                                       echo base_url()?>Cpurchase/servicepro_details_data/<?php echo  $arr['serviceprovider_id'];
                                       } ?>"><i class="fa fa-download" aria-hidden="true"></i></a>  
                                 </td>
                              </tr>
                              <?php
                                 $count++;
                                 } }  else{
                                     ?>
                              <tr>
                                 <td colspan="25" style="text-align:center;font-weight:bold;"><?php  echo "No Records Found"  ;?></td>
                              </tr>
                              <?php
                                 }
                                 ?>
                           </tbody>
                           <tfoot>
                           </tfoot>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <input type="hidden" id="total_purchase_no" value="<?php echo $total_purhcase;?>" name="">
         <input type="hidden" id="currency" value="{currency}" name="">
      </div>
      <script src="<?php echo base_url()?>assets/js/jquery.bootgrid.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.0.0-alpha.1/jspdf.plugin.autotable.js"></script>
      
      
      <div id="myModal_colSwitch"  name="myPurchaseName"  class="modal_colSwitch" >
          
          
         <div class="modal-content_colSwitch" style="width:75%;height:35%;">
            <span class="close_colSwitch">&times;</span>
            <div class="col-sm-1"></div>
            <div class="col-sm-3">
               <br><br>
               <div class="form-group row">
                  <input type="checkbox"  data-control-column="0"   class="0" value="0"/> &nbsp;<?php echo  ('ID')?><br><br>
                  <!-- <input type="checkbox"  data-control-column="1"  checked = "checked"  class=" 1" value="1"/> &nbsp;<?php echo  ('Name')?><br><br> -->
                  <!-- <input type="checkbox"  data-control-column="2"  checked = "checked" class=" 2"  value="2"/>&nbsp;<?php echo  ('Bill No')?><br><br> -->
                  <input type="checkbox"  data-control-column="3"    class=" 3" value="3"/>&nbsp;<?php echo display('purchase_id')?><br><br>
                  <!-- <input type="checkbox"  data-control-column="4"  checked = "checked"  class="4" value="4"/>&nbsp;<?php echo display('purchase_date')?><br><br> -->
                  <input type="checkbox"  data-control-column="5"   class="5" value="5"/>&nbsp;<?php echo display('Container Number')?><br><br>
             
                  <!-- <input type="checkbox"  data-control-column="25"  checked = "checked" class="25" value="25"/>&nbsp;<?php echo ('Payment Due date')?><br><br> -->
                  <input type="checkbox"  data-control-column="6"   class="6" value="6"/>&nbsp;<?php echo display('Estimated Time of Arrival')?><br><br>

               </div>
            </div>
            <div class="col-sm-3">
               <br><br>
               <div class="form-group row">
                  <input type="checkbox"  data-control-column="7"   class="7" value="7"/>&nbsp;<?php echo display('Estimated Time of Departure')?><br><br>
                  <input type="checkbox"  data-control-column="8"  class="8" value="8"/>&nbsp;<?php echo display('Bl Number')?><br><br>
                  <input type="checkbox"  data-control-column="9"  class="9" value="9"/>&nbsp;<?php echo display('Payment Terms')?><br><br>
                  <input type="checkbox"  data-control-column="10"   class="10" value="10"/>&nbsp;<?php echo display('Port of Discharge')?><br><br>
               </div>
            </div>
            <div class="col-sm-2">
               <br><br>
               <div class="form-group row">
               <input type="checkbox"  data-control-column="11"  class="11" value="11"/>&nbsp;<?php echo display('Overall Gross')?><br><br>

                  <!-- <input type="checkbox"  data-control-column="14"   checked = "checked"  class="14" value="14"/>&nbsp;<?php echo('Grand Total')?><br><br> -->
                  <input type="checkbox"  data-control-column="13"  class="13" value="13"/>&nbsp;<?php echo display('Tax Details')?><br><br>
                  <input type="checkbox"  data-control-column="12"  class="12" value="12"/>&nbsp;<?php echo display('Overall Net')?><br><br>
                  <input type="checkbox"  data-control-column="15"  class="15" value="15"/>&nbsp;<?php echo  ('Grand Total Preferred Currency')?><br><br>
                  <!-- <input type="checkbox"  data-control-column="16"  checked = "checked"  class="16" value="16"/>&nbsp;<?php echo display('Amount Paid')?><br><br> -->
                  <!-- <input type="checkbox"  data-control-column="17"  checked = "checked" class="17" value="17"/>&nbsp;<?php echo display('Due Amount')?><br><br> -->
               </div>
            </div>
            <div class="col-sm-2">
               <br><br>
               <div class="form-group row">
                  <!-- <input type="checkbox"  data-control-column="18"  checked = "checked" class="18" value="18"/>&nbsp;<?php echo display('Vendor Type')?><br><br> -->
                  <input type="checkbox"  data-control-column="19"   class="19" value="19"/>&nbsp;<?php echo display('Service Provider Address')?><br><br>
                  <input type="checkbox"  data-control-column="20"  class="20" value="20"/>&nbsp;<?php echo ('Phone Number')?><br><br>
                  <input type="checkbox"  data-control-column="21"  class="21" value="21"/>&nbsp;Account Category Name<br><br>
                  <input type="checkbox"  data-control-column="22"  class="22" value="22"/>&nbsp;<?php echo  ('Account Sub Name')?><br><br>
                  <input type="checkbox"  data-control-column="23"  class="23" value="23"/>&nbsp;<?php echo  ('Account category')?><br><br>
                  <!-- <input type="checkbox"  data-control-column="24"  checked = "checked" class="24" value="24"/>&nbsp;<?php echo ('Action')?><br><br> -->
               </div>
            </div>
         </div>
      </div>
   </section>
</div>
<input type="hidden" id="total_invoice" value="<?php echo $total_invoice;?>" name="">
<input type="hidden" id="currency" value="{currency}" name="">
</div>
</div>
</section>
</div>
<style>
   #select2-po-container{
   display:none;
   }
   .main-footer {
   display:none;
   }
   textarea:focus, input:focus{
   outline: none;
   }
   .text-right {
   text-align: left; 
   }
   .content {
   min-height: 20px;
   /* margin-right: auto; */
   /* margin-left: auto; */
   /* padding: 0 30px 10px; */
   }
   .simpleTab .tab-content{float:right;font-family:'cairo',serif;text-align: right;}
   .simpleTab .tab-wrapper li{float:left;font-family:'cairo',serif;}
   .simpleTab.verti .tab-wrapper{float:right}
   .simpleTab.verti .tab-content{float:right}
   .com-tab-title{overflow:hidden;border-bottom:2px solid #fb4834}
   .com-tab-title h3{color:#fff;font-family:lato,Sans-Serif;font-size:13px;font-weight:bold;text-transform:uppercase;line-height:32px;position:relative;overflow:hidden}
   .com-tab-title h3 span{line-height:32px;background:#fb4834;position:relative;padding:8px 10px;border-top-right-radius:1px;border-top-left-radius:1px;border-bottom-left-radius:0;border-bottom-right-radius:1px}
   .com-tab-title h3 span:before{font-family:FontAwesome;font-style:normal;font-weight:normal;font-size:15px;color:#fff}
   .com-tab.simpleTab .tab-content{background-color:transparent;margin-top:20px;float:none!important}
   .com-tab.simpleTab{border:1px solid #eee;padding:15px;margin-top:22px!important;background-color:#fff;margin:0}
   .com-tab .simpleTab .tab-wrapper li{display:inline-block;margin:0;padding:0}
   .com-tab .simpleTab .tab-wrapper li a{font-family:Oswald,open sans,sans-serif,arial;font-weight:400;font-size:13px;background-color:dimgrey;color:#FFF;padding:10px 25px!important;display:block}
   .com-tab.simpleTab .tab-wrapper li:before{content:'';display:none}
   .com-tab.simpleTab .tab-wrapper li a.activeTab{background-color:#666;color:#fff}
   .com-tab.simpleTab .tab-wrapper li{display:inline-block}
   .com-tab.simpleTab .tab-wrapper li a{font-family:'Archivo Narrow',Sans-Serif;font-size:13px;font-weight:600;background-color:#eee;color:dimgrey;padding:0 10px;display:block;line-height:30px;text-transform:uppercase}
   .simpleTab .tab-wrapper li{display:inline-block;margin:0;padding:0}
   .simpleTab .tab-wrapper li a{background-color:dimgrey;color:#FFF;padding:10px 25px;display:block}
   .simpleTab .tab-wrapper li:before{display:none}
   .simpleTab{margin:10px 0}
   .simpleTab .tab-content{padding:15px;background-color:#f2f2f2;width:100%;}
   .simpleTab .tab-wrapper li a.activeTab{background: -webkit-linear-gradient(90deg, hsla(210, 90%, 80%, 1) 0%, hsla(212, 93%, 49%, 1) 100%);color:#fff}
   .simpleTab{transition:all 0 ease;-webkit-transition:all 0 ease;-moz-transition:all 0 ease;-o-transition:all 0 ease}
   .simpleTab.verti .tab-wrapper{width:30%;margin:0!important;padding:0!important}
   .simpleTab .tab-wrapper{padding:0!important;margin:0!important}
   .simpleTab.verti .tab-content{width:60%;}
   .simpleTab.verti .tab-wrapper li{width:100%;display:block;text-align:center}
   .simpleTab.verti .tab-wrapper li a{padding:10px 0}
   .simpleTab.verti{overflow:hidden}
</style>
<script type="text/javascript" src="<?php echo base_url()?>my-assets/js/profarma.js"></script>
<input type="hidden" value="Purchase/PurchaseOrder" id="url"/>
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
<script>
   $(document).on('keyup', '#filterinput', function(){
    // debugger;
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
       
       
          var localStorageName = "myPurchaseName"; // Set your desired localStorage name

      $("input:checkbox").each(function() {
          var columnValue = $(this).attr("value");
          var columnSelector = ".table ." + columnValue;
        //   var isChecked = localStorage.getItem(columnSelector) === "true";
          
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
          
          
        //   localStorage.setItem(columnSelector, isChecked); // Store checkbox state in localStorage
          
                    localStorage.setItem(localStorageName + columnSelector, isChecked); // Store checkbox state in localStorage

          
          // Toggle column visibility based on the checkbox state
          if (isChecked) {
              $(columnSelector).show(); // Show the column
          } else {
              $(columnSelector).hide(); // Hide the column
          }
      });
});

   
   
   
   
   
   
   
   
   
   
 
   
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
    td1 = tr[i].getElementsByTagName("td")[3];
    td2 = tr[i].getElementsByTagName("td")[8];
    td3 = tr[i].getElementsByTagName("td")[15];
    td4 = tr[i].getElementsByTagName("td")[4];
    td5 = tr[i].getElementsByTagName("td")[2];
   
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
        var expensevisibilityStates = {};
        $("#ProfarmaInvList tr").each(function(index, element) {
            var row = $(element);
            var rowID = index;
            var isVisible = row.is(':visible');
            expensevisibilityStates[rowID] = isVisible;
        });
        // Store the visibility states in localStorage
        localStorage.setItem("expensevisibilityStates", JSON.stringify(expensevisibilityStates));
    }
   
    // Apply the stored visibility state on page load
    function applyVisibilityState() {
        var storedVisibilityStates = JSON.parse(localStorage.getItem("expensevisibilityStates")) || {};
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
    $(".expenselocal-edit").on('click', function() {
        var row = $(this);
        storeVisibilityState(); // Store the updated visibility state
    });
   
    // Event listener for submitting edited data
    $(".expense_submit").on('submit', function(event) {
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
         
          const keyToRemove = 'expensevisibilityStates';
        
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
        const removeButton = document.getElementById('expenseRemove');
        removeButton.addEventListener('click', removeItemFromLocalStorage);
   
   
   
</script>
<style>
   th {
   padding: 10px !important;
   }
   .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
   vertical-align: middle;
   }
   .search_dropdown{
   background:center;
   }
   th{
   color:black;
   }
   .select2{
   display:none;
   }
   #numrows{
   width: 75px !important;
   }
   /* pagecontroller pagecontroller-n */
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
   #panel {
   overflow-x: auto; /* Enable horizontal scrolling */
   white-space: nowrap; /* Prevent text from wrapping */
   }
   #panel-bd {
   overflow-x: auto; /* Enable horizontal scrolling */
   white-space: nowrap; /* Prevent text from wrapping */
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
   width: 160px;
   }
   
   @media only screen and (min-width:1024px){
       .mobile_view{
           display: flex;
       }
   }
</style>
<div id="Customer_modal" class="modal fade" role="dialog">
   <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header" style="color:white;background-color:#38469f;">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><?php echo  ('Service Provider Csv Upload'); ?></h4>
         </div>
         <div class="modal-body">
            <div class="panel">
               <div class="panel-heading" style="height:50px;">
                  <div><a href="<?php echo base_url('asset/data/csv/serviceprovider_csv_sample.csv') ?>" class="btn btn-primary pull-right" style="color:white;background-color:#38469f;"><i class="fa fa-download"></i><?php echo display('download_sample_file')?> </a> </div>
               </div>
               <div class="panel-body">
                  <?php echo form_open_multipart('Cpurchase/uploadCsv_Serviceprovider',array('class' => 'form-vertical', 'id' => 'validate','name' => 'insert_customer'))?>
                  <div class="col-sm-12">
                     <div class="form-group row">
                        <label for="upload_csv_file" class="col-sm-4 col-form-label"><?php echo display('upload_csv_file') ?> <i class="text-danger">*</i></label>
                        <div class="col-sm-8">
                           <input class="form-control" name="upload_csv_file" type="file" id="upload_csv_file" placeholder="<?php echo display('upload_csv_file') ?>" required>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-12">
                     <div class="form-group row">
                        <div class="col-sm-12 text-right">
                           <input type="submit" id="add-product" class="btn " style="color:white;background-color:#38469f;" name="add-product" value="<?php echo display('submit') ?>" />
                           <button type="button" class="btn " style="color:white;background-color:#38469f;"  data-dismiss="modal">Close</button>
                        </div>
                     </div>
                  </div>
                  <?php echo form_close()?>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
