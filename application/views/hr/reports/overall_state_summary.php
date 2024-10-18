<?php error_reporting(1);  ?>

<script type="text/javascript" src="<?= base_url()?>assets/js/jquery.base64.js"></script>
<script type="text/javascript" src="<?= base_url()?>assets/js/drag_drop_index_table.js"></script>
<script type="text/javascript" src="<?= base_url()?>assets/js/html2canvas.js"></script>
<script type="text/javascript" src="<?= base_url()?>assets/js/jspdf.plugin.autotable"></script>
<script type="text/javascript" src="<?= base_url()?>assets/js/jspdf.umd.js"></script>

<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<script type="text/javascript" src="<?= base_url()?>my-assets/js/tableManager.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>
<script type="text/javascript" src="http://mrrio.github.io/jsPDF/dist/jspdf.debug.js"></script>

<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<script src="<?= base_url() ?>assets/js/dashboard.js" ></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="<?= base_url() ?>my-assets/css/style.css">
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript" src="http://www.bacubacu.com/colresizable/js/colResizable-1.5.min.js"></script>

<script type="text/javascript" src="http://www.bacubacu.com/colresizable/js/colResizable-1.5.min.js"></script>


<link rel="stylesheet" type="text/css" href="<?= base_url()?>my-assets/css/css.css" />
<input type="hidden" name="<?= $this->security->get_csrf_token_name();?>" value="<?= $this->security->get_csrf_hash();?>">
 <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>

<!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script> -->
<!-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" /> -->
<link href="<?= base_url() ?>assets/css/daterangepicker.css" rel="stylesheet">
<link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/css/calanderstyle.css">

<!-- <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script> -->

<style>
.btnclr{
   background-color:<?= $setting_detail[0]['button_color']; ?>;
   color: white;
}

.btnclr > th {
   text-align: center;
}

.table td{
   text-align:center;
}
#fetch_tax .table{
   display: block;
   overflow-x: auto;
}
.table{
   overflow-x: auto;
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

.tax_head {
   text-align:center;
   background-color: #34495e;
   color: #fff;
}

.tax_head >label {
   color: #fff;
}
</style>

<div class="content-wrapper">
   <section class="content-header" style="height:70px;">
      <div class="header-icon">
         <figure class="one">
         <img src="<?= base_url('asset/images/salesreport.png'); ?>"  class="headshotphoto" style="height:50px;" />
      </div>
      <div class="header-title">
         <div class="logo-holder logo-9">
            <h1><?= 'Overall Summary' ?></h1>
         </div>
        
         <ol class="breadcrumb"   style=" border: 3px solid #d7d4d6;"   >
            <li><a href="<?= base_url()?>"><i class="pe-7s-home"></i> <?= display('home') ?></a></li>
            <li><a href="#"><?= display('report') ?></a></li>
            <li class="active" style="color:orange"><?= 'Overall Summary';?></li>
            <div class="load-wrapp">
               <div class="load-10">
                  <div class="bar"></div>
               </div>
            </div>
         </ol>
      </div>
   </section>

   <section class="content">
   <!-- Sales report -->
   <?php  
      $commercial_invoice_number  = array();
      foreach ($sale_datas as $invoice) {
      $commercial_invoice_number [] = $invoice['customer_name'];
      }
      $unique_commercial_invoice_number = array_unique($commercial_invoice_number);
      
      $container_no = array();
      foreach ($sale_datas as $invoice) {
      $container_no[] = $invoice['product_name'];
      }
      $unique_container_no = array_unique($container_no);
      
      $customer_name = array();
      foreach ($sale_datas as $invoice) {
      $customer_name[] = $invoice['payment_due_date'];
      }
      $unique_customer_name = array_unique($customer_name);
      
      $payment_terms = array();
      foreach ($sale_datas as $invoice) {
      $payment_terms[] = $invoice['details'];
      }
      $unique_payment_terms = array_unique($payment_terms);
   ?>
     
   <div class="row">
      <div class="col-sm-12 col-md-12">
         <div class="panel panel-bd lobidrag" style='height:80px; border: 3px solid #d7d4d6;'>
            <div class='col-sm-12'>
               <form id="fetch_tax">
                  <table class="table" align="center" style="overflow-x: unset;position: relative;">
                     <tr style='text-align:center;font-weight:bold;' class="filters">
                        <td style='visibility:hidden' class="search_dropdown" style="width:1px;color: black;">
                           <span>Tax Choice </span>
                           <select id="tax_Choice" name='tax_choice' class="tax_choice form-control" >
                              <option value="All">All</option>
                              <option value="living_state_tax">Living</option>
                              <option value="state_tax">Working</option>
                           </select>
                           </td>
                        <td style='visibility:hidden' class="search_dropdown" style="width:1px;color: black;">
                           <span>State <span class="text-danger">*</span></span>
                           <select id="tax_Choice" name='selectState' class="selectState form-control" >
                              <option value="">Select Your State</option>
                              <?php 
                                 foreach ($state_list as $value) {
                              ?>
                              <option value="<?= $value['state_code']; ?>"><?= $value['state']; ?></option>
                              <?php } ?>
                           </select>
                        </td>
                           <td style='visibility:hidden' class="search_dropdown" style="width:1px;color: black;">
                           <span>Tax Type </span>
                           <select id="tax_Choice" name='taxType' class="taxType form-control" >
                              <option value="">Select Your Tax Type</option>
                              <?php foreach ($state_tax_list as $value) { ?>
                              <option value="<?= $value['tax']; ?>"><?= $value['tax']; ?></option>
                              <?php } ?>
                           </select>
                           </td>
                           <td class="search_dropdown" style="color: black;">
                           <span><?= 'Tax Type'; ?></span>
                           <select id="taxtyp-filter" name="taxtyp" class="form-control">
                              <option value="All">All</option>
                              <option value="federal">Federal Tax</option>
                              <option value="working_state">Working State Tax</option>
                                 <option value="living_state">Living State Tax</option>
                                 <option value="city_tax">City Tax</option>
                                 <option value="county_tax">County Tax</option>
                           </select>
                        </td>
                        <td class="search_dropdown" style="color: black;">
                           <input type="hidden" class="txt_csrfname" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                           <span><?= 'Employee'; ?></span>
                           <select id="customer-name-filter" name="employee_name" class="form-control">
                              <option value="All">All</option>
                              <?php
                                 foreach ($emp_name as $emp) {
                                    $emp['first_name']=trim($emp['first_name']);
                                    $emp['last_name']=trim($emp['last_name']);
                                 ?>
                              <option value="<?= $emp['first_name']." ".$emp['middle_name']." ".$emp['last_name']; ?>"><?= $emp['first_name']." ".$emp['middle_name']." ".$emp['last_name']; ?></option>
                              <?php } ?>
                           </select>
                        </td>
                        <td class="search_dropdown" style="color: black; position: relative; top: 4px;">
                           <div id="datepicker-container">
                              <input type="text" class="form-control daterangepicker_field getdate_reults" id="daterangepicker-field" name="daterangepicker-field" style="margin-top: 15px;padding: 5px; width: 200px; border-radius: 8px; height: 35px;" />
                           </div>
                        </td>
                        <input type="hidden" class="getcurrency" value="<?= $currency; ?>">
                        <td style='float: left;width:30px; position: relative; top: 4px;'>
                           <input type="submit"  name="btnSave" class="btn btnclr" style='margin-top: 15px;' value='Search'/>
                        </td>
                     </tr>
                  </table>
            </div>
            <!-- <div class='col-sm-2'> -->
            <div class="dropdown bootcol" id="drop">
               <button class="btnclr btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="position: relative; left: 185px;">
               <span class="fa fa-download"></span> <?= display('download') ?>
               </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
               <li><a href="#" id="generateXls"> <img src="<?= base_url() ?>assets/images/xls.png" width="24px"> <?= display('XLS') ?></a></li>
            </ul>
               <button type="button" class="btnclr btn btn-default dropdown-toggle"  onclick="printDiv('printableArea')" style="margin-top: -54px; margin-left: 304px;float:left; position: relative; top: 54px;"><b class="ti-printer"></b>&nbsp;<?= display('print') ?></button>
            </div>
            <!-- </div> -->
         </div>
      </div>
   </div>
   <?php //echo form_close() ?>
   <!-- Manage Invoice report -->
   </form>
   <div class="row">
      <div class="col-sm-12 col-md-12">
         <div class="panel panel-bd lobidrag" id="printableArea"> 
         <div class="row">
      <div class="col-sm-12 col-md-12">
         <div id="tablesContainer" style='padding-left:20px;padding-right:20px;'>
         <div class="panel panel-bd lobidrag">
            <div class="panel-body federal table-responsive">
            <p class="tax_head"><label>FEDERAL TAX</label></p>
               <table class="federal table table-bordered" cellspacing="0" width="100%" id="federal_summary">
                  <thead class="sortableTable">
                     <tr class="sortableTable__header btnclr">
                        <th rowspan="2" class="1 value" data-col="1" style="height: 45.0114px; text-align:center; "> <?= 'S.NO'?> </th>
                        <th rowspan="2" class="2 value" data-col="2" style="text-align:center; width: 250px;"> <?= 'Employee Name'?> </th>
                        <th rowspan="2" class="3 value" data-col="3" style="text-align:center;width: 120px; "> <?= 'Gross'?> </th>
                        <th rowspan="2" class="3 value" data-col="3" style="text-align:center;width: 120px; "> <?= 'Net'?> </th>
                        <th colspan="2" class="4 value" data-col="4" style="text-align:center;width: 200px;"> <?= ('Federal Income Tax')?> </th>
                        <th colspan="2" class="4 value" data-col="4" style="text-align:center;width: 200px;"> <?= ('Social Security Tax')?> </th>
                        <th colspan="2" class="4 value" data-col="4" style="text-align:center;width: 200px;"> <?= ('Medicare Tax')?> </th>
                        <th colspan="2" class="4 value" data-col="4" style="text-align:center;width: 200px;"> <?= ('Unemployment Tax')?> </th>
                     </tr>
                     <tr class="btnclr" >
                        <th class="4 value" data-col="4" style="text-align:center;width: 200px;"> <?= ('Employee Contribution')?> </th>
                        <th class="4 value" data-col="4" style="text-align:center;width: 200px;"> <?= ('Employer Contribution')?> </th>
                        <th class="4 value" data-col="4" style="text-align:center;width: 200px;"> <?= ('Employee Contribution')?> </th>
                        <th class="4 value" data-col="4" style="text-align:center;width: 200px;"> <?= ('Employer Contribution')?> </th>
                        <th class="4 value" data-col="4" style="text-align:center;width: 200px;"> <?= ('Employee Contribution')?> </th>
                        <th class="4 value" data-col="4" style="text-align:center;width: 200px;"> <?= ('Employer Contribution')?> </th>
                        <th class="4 value" data-col="4" style="text-align:center;width: 200px;"> <?= ('Employee Contribution')?> </th>
                        <th class="4 value" data-col="4" style="text-align:center;width: 200px;"> <?= ('Employer Contribution')?> </th>
                     </tr>
                  </thead>
                  <tbody class="sortableTable__body" id="tab">
                     <?php
                        $count=1;
                        if(empty($tax)){  
                           $i=0;
                           foreach($fed_tax as $f_tax) { ?> 
                     <tr>
                        <td> <?= $count; ?> </td>
                        <td> <?=  $f_tax['first_name']." ".$f_tax['middle_name']." ".$f_tax['last_name']; ?> </td>
                        <td> <?=  $f_tax['gross']; ?> </td>
                        <td> <?=  $f_tax['net']; ?> </td>
                        <td> <?=  round($f_tax['f_ftax_sum'],2); ?> </td>
                        <td> <?php if($mergedArray[$i]['f_ftax_sum_er']){echo  round($mergedArray[$i]['f_ftax_sum_er'],2); }else{echo '0';}?> </td>
                        <td> <?=  round($f_tax['s_stax_sum'],2); ?> </td>
                        <td> <?php if($mergedArray[$i]['s_stax_sum_er']){echo  round($mergedArray[$i]['s_stax_sum_er'],2); }else{echo '0';}?> </td>
                        <td> <?=  round($f_tax['m_mtax_sum'],2); ?> </td>
                        <td> <?php if($mergedArray[$i]['m_mtax_sum_er']){echo  round($mergedArray[$i]['m_mtax_sum_er'],2); }else{echo '0';}?> </td>
                        <td> <?=  round($f_tax['u_utax_sum'],2); ?> </td>
                        <td> <?php if($mergedArray[$i]['u_utax_sum_er']){echo  round($mergedArray[$i]['u_utax_sum_er'],2); }else{echo '0';}?> </td>
                     </tr>
                     <?php $count++;$i++; }}  ?> 
                  </tbody>
                  <tfoot>
                     <?php
                        $employeeContributionTotal_f = 0;
                        $employerContributionTotal_ff = 0;
                           $i=0;
                        foreach($fed_tax as $f_tax) {
                              $employeeContributionTotal_f += $f_tax['f_ftax_sum'];
                              $employerContributionTotal_ff += ($mergedArray[$i]['f_ftax_sum_er']) ? $mergedArray[$i]['f_ftax_sum_er'] : 0;
                        $i++; }
                           $employeeContributionTotal_s = 0;
                        $employerContributionTotal_ss = 0;
                           $i=0;
                        foreach($fed_tax as $f_tax) {
                              $employeeContributionTotal_s += $f_tax['s_stax_sum'];
                              $employerContributionTotal_ss += ($mergedArray[$i]['s_stax_sum_er']) ? $mergedArray[$i]['s_stax_sum_er'] : 0;
                        $i++; }
                           $employeeContributionTotal_m = 0;
                        $employerContributionTotal_mm = 0;
                           $i=0;
                        foreach($fed_tax as $f_tax) {
                              $employeeContributionTotal_m += $f_tax['m_mtax_sum'];
                              $employerContributionTotal_mm += ($mergedArray[$i]['m_mtax_sum_er']) ? $mergedArray[$i]['m_mtax_sum_er'] : 0;
                        $i++; }
                           $employeeContributionTotal_u = 0;
                        $employerContributionTotal_uu = 0;
                           $i=0;
                        foreach($fed_tax as $f_tax) {
                              $employeeContributionTotal_u += $f_tax['u_utax_sum'];
                              $employerContributionTotal_uu += ($mergedArray[$i]['u_utax_sum_er']) ? $mergedArray[$i]['u_utax_sum_er'] : 0;
                        $i++; }
                     ?> 
                     <tr class="btnclr" >
                        <td colspan="3" style="text-align:end;" >Total :</td>
                        <td> <?= round($employeeContributionTotal_f,2); ?> </td>
                        <td> <?= round($employerContributionTotal_ff,2); ?> </td>
                        <td> <?= round($employeeContributionTotal_s,2); ?> </td>
                        <td> <?= round($employerContributionTotal_ss,2); ?> </td>
                        <td> <?= round($employeeContributionTotal_m,2); ?> </td>
                        <td> <?= round($employerContributionTotal_mm,2); ?> </td>
                        <td> <?= round($employeeContributionTotal_u,2); ?> </td>
                        <td> <?= round($employerContributionTotal_uu,2); ?> </td>
                     </tr>
                  </tfoot>
               </table>
            </div>

            <div class="panel-body work_state table-responsive">
               <p class="tax_head"><label>WORKING STATE TAX </label></p>
               <table class="work_state table table-bordered" cellspacing="0" width="100%" id="StateTaxTable">
                  <thead></thead>
                  <tbody></tbody>
                  <tfoot></tfoot>
               </table>
            </div>

            <div class="panel-body living_state table-responsive">
               <p class="tax_head"><label>LIVING STATE TAX </label></p>
               <table class="living_state table table-bordered" cellspacing="0" width="100%" id="LivingStateTaxTable">
                  <thead></thead>
                  <tbody></tbody>
                  <tfoot></tfoot>
               </table>
            </div>
         </div>

         <!-- City Tax -->
         <div class="panel-body city_tax table-responsive">
            <p class="tax_head"><label>CITY TAX </label></p>
            <table class="table table-bordered" cellspacing="0" width="100%" id="CityTax">
               <thead class="btnclr">
                  <tr>
                     <th>S.No</th>
                     <th>Employee Name</th>
                     <th>Employee Tax</th>
                     <th>Working Local Tax</th>
                     <th>Working Local Tax</th>
                     <th>Living Local Tax</th>
                     <th>Month</th>
                     <th>Timesheet ID</th>
                     <th>Living Location Tax - Employee Contributions</th>
                  </tr>
               </thead>
               <tbody>
                  <?php 
                  if($getEmployeeContributions > 0){
                  $c=1;
                  foreach ($getEmployeeContributions as $employeeData){ ?>
                        <tr>
                           <td><?php  echo $c; ?></td>
                           <td><?= $employeeData['first_name'] . ' ' . $employeeData['last_name']; ?></td>
                           <td><?= $employeeData['employee_tax']; ?></td>
                           <td><?= $employeeData['local_tax']; ?></td>
                           <td><?= $employeeData['living_local_tax']; ?></td>
                           <td><?= $employeeData['month']; ?></td>
                           <td><?= $employeeData['time_sheet_id']; ?></td>
                           <td><?= round($employeeData['amount'],3); ?></td>
                        </tr>
                  <?php $c++; } } else{ ?>
                     <tr>
                     <td colspan="9" class="text-center">No Data Found</td>
                     </tr>
                  <?php } ?>
               </tbody>
            </table>
         </div>

         <!-- County Tax -->
         <div class="panel-body county_tax table-responsive">
            <p class="tax_head"><label>COUNTY TAX </label></p>
            <table class="table table-bordered" cellspacing="0" width="100%" id="CountyTax">
               <thead class="btnclr">
                  <tr>
                     <th>S.No</th>
                     <th>Employee Name</th>
                     <th>Employee Tax</th>
                     <th>Working Local Tax</th>
                     <th>Working Local Tax</th>
                     <th>Living Local Tax</th>
                     <th>Month</th>
                     <th>Timesheet ID</th>
                     <th>Living Location Tax - Employee Contributions</th>
                  </tr>
               </thead>
               <tbody>
                  <?php 
                  if($getEmployeeContributions > 0){
                  $c=1;
                  foreach ($getEmployeeContributions as $employeeData){ ?>
                        <tr>
                           <td><?php  echo $c; ?></td>
                           <td><?= $employeeData['first_name'] . ' ' . $employeeData['last_name']; ?></td>
                           <td><?= $employeeData['employee_tax']; ?></td>
                           <td><?= $employeeData['local_tax']; ?></td>
                           <td><?= $employeeData['living_local_tax']; ?></td>
                           <td><?= $employeeData['month']; ?></td>
                           <td><?= $employeeData['time_sheet_id']; ?></td>
                           <td><?= round($employeeData['amount'],3); ?></td>
                        </tr>
                  <?php $c++; } }else{ ?>
                     <tr>
                     <td colspan="9" class="text-center">No Data Found</td>
                     </tr>
                  <?php } ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</section>
 
 <input type="hidden" value="Sale/New Sale" id="url"/>
 
<script src="<?= base_url()?>assets/js/jquery.bootgrid.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.0.0-alpha.1/jspdf.plugin.autotable.js"></script>

<script src='https://cdnjs.cloudflare.com/ajax/libs/knockout/3.4.0/knockout-debug.js'></script>
<!--<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
<!-- <script  src="<?php //echo base_url() ?>my-assets/js/script.js"></script> -->

<script src="https://cdn.jsdelivr.net/npm/table2excel@1.0.4/dist/table2excel.min.js"></script>
<!-- The Modal Column Switch -->

</div>
</div>
</div>
</div>
<input type="hidden" id="currency" value="{currency}" name="">

</section>
<input type ="hidden" name="csrf_test_name" id="csrf_test_name" value="<?= $this->security->get_csrf_hash();?>">
</div>
<!-- Manage Invoice End -->
<script src='<?= base_url();?>assets/js/moment.min.js'></script>
<script  src="<?= base_url() ?>assets/js/scripts.js"></script>

<script>
$( function() {
   $('#tablesContainer').css('display','none');
   $( ".daterangepicker-field" ).daterangepicker({
      dateFormat: 'mm/dd/yy' // Setting the desired date format
   });
});

var csrfName = "<?= $this->security->get_csrf_token_name();?>";
var csrfHash = "<?= $this->security->get_csrf_hash();?>";

$(function() {
   var start = moment().startOf('isoWeek'); // Start of the current week
   var end = moment().endOf('isoWeek'); // End of the current week
   var startOfLastWeek = moment().subtract(1, 'week').startOf('week');
   var endOfLastWeek = moment().subtract(1, 'week').endOf('week').add(1, 'day');
   // Add one extra day
   function cb(start, end) {
      $('#daterangepicker-field').val(start.format('DD/MM/YYYY') + ' - ' + end.format('DD/MM/YYYY'));
   }

   $('#daterangepicker-field').daterangepicker({
      startDate: start,
      endDate: end,
      ranges: {
         'Last Week Before': [moment().subtract(2,  'week').startOf('week') , moment().subtract(2, 'week').endOf('week')],
         'Last Week': [startOfLastWeek, endOfLastWeek],
         'This Week': [moment().startOf('week'), moment().endOf('week')],
         'This Month': [moment().startOf('month'), moment().endOf('month')],
         'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
      }
   }, cb);

});


$(document).ready(function(){
   // $('#printableArea').hide();
   function removeDuplicates() {
    var selectElement = document.getElementById("customer-name-filter");
    var options = selectElement.options;
    var uniqueValues = [];

    // Iterate over each option
    for (var i = 0; i < options.length; i++) {
        var optionValue = options[i].value;
        
        // Check if the value is not already in the unique array
        if (uniqueValues.indexOf(optionValue) === -1) {
         uniqueValues.push(optionValue);
        }
    }

   // Clear the select element
   selectElement.innerHTML = '';

    // Append unique options back to the select element
   uniqueValues.forEach(function(value) {
      var option = document.createElement('option');
      option.value = value;
      option.textContent = value;
      selectElement.appendChild(option);
   });
}

   // Call the function to remove duplicates
   removeDuplicates(); 
});


$(document).ready(function () {
  
   $('#fetch_tax').submit(function (event) {
      event.preventDefault();
      var formData = $(this).serialize();
      var taxtpe = $('#taxtyp-filter').val();
      
      $.ajax({
         type: "POST",
         dataType: "json",
         url: "<?= base_url('Chrm/state_tax_search_summary'); ?>",
         data: formData,
         success: function (response) {
            // $("#federal_summary tbody").empty();            
            $('#tablesContainer').css('display', 'block');
             $('.federal, .work_state, .living_state, .city_tax, .county_tax').show();
               $('#LivingStateTaxTable_wrapper, #StateTaxTable_wrapper').css('display','block'); 
            federal_summary();
            
            if(taxtpe == 'federal'){
               $('.work_state, .living_state, .city_tax, .county_tax').hide();
               $('.federal').show();
               $('#StateTaxTable_wrapper').css('display','none');
               $('#LivingStateTaxTable_wrapper').css('display','none'); 
               
            } else if(taxtpe == 'working_state') {
               $('.federal, .living_state, .city_tax, .county_tax').hide();
               $('.work_state').show();               
               $('#LivingStateTaxTable_wrapper').css('display','none');
               
            } else if( taxtpe == 'living_state'){
               $('.federal, .work_state, .city_tax, .county_tax').hide();
               $('.living_state').show();               
               $('#StateTaxTable_wrapper').css('display','none');
               
            } else if( taxtpe == 'city_tax'){
               $('.federal, .work_state, .living_state, .county_tax').hide();
               $('.city_tax').show();
               
            } else if( taxtpe == 'county_tax'){
               $('.federal, .work_state, .living_state, .city_tax').hide();
               $('.county_tax').show();
            } 
            populateTable(response);
         },
         error: function (xhr, status, error) {
            console.error("Error:", xhr.responseText);
         }
      });
   });
});


function federal_summary(){
   var dataString = $("#fetch_tax").serialize();
   dataString[csrfName] = csrfHash; 
   
   $.ajax({
      type: "POST",
      dataType: "json",
      url: "<?= base_url('Chrm/social_taxsearch'); ?>",
      data: dataString,
      success: function(response) {
         var employeeData = response.aggregated_employe; 
         var employerData = response.aggregated_employer; 
         $('#federal_summary').DataTable().destroy(); 
         // Clear table body first
         var tbody = $("#federal_summary tbody").empty();

         // Display employee and employer contributions side by side for each tax type
         for (var i = 0; i < employeeData.length; i++) {
            var employee = employeeData[i];
            var employer = employerData[i] || {}; // Handle missing data gracefully

            var row = "<tr>";
            row += "<td style='text-align: center;'>" + (i + 1) + "</td>";
            row += "<td style='text-align: center;'>" + (employee['first_name'] || '') + " " +(employee['middle_name'] || '')+" "+ (employee['last_name'] || '') + "</td>";
            row += "<td style='text-align: center;'>" + (employee['gross'] ? parseFloat(employee['gross']).toFixed(2) : '0.00') + "</td>";
            row += "<td style='text-align: center;'>" + (employee['net'] ? parseFloat(employee['net']).toFixed(2) : '0.00') + "</td>";
            row += "<td style='text-align: center;'>" + (employee['fftax'] ? parseFloat(employee['fftax']).toFixed(2) : '0.00') + "</td>";
            row += "<td style='text-align: center;'>" + (employer['fftax'] ? parseFloat(employer['fftax']).toFixed(2) : '0.00') + "</td>";
            row += "<td style='text-align: center;'>" + (employee['sstax'] ? parseFloat(employee['sstax']).toFixed(2) : '0.00') + "</td>";
            row += "<td style='text-align: center;'>" + (employer['sstax'] ? parseFloat(employer['sstax']).toFixed(2) : '0.00') + "</td>";
            row += "<td style='text-align: center;'>" + (employee['mmtax'] ? parseFloat(employee['mmtax']).toFixed(2) : '0.00') + "</td>";
            row += "<td style='text-align: center;'>" + (employer['mmtax'] ? parseFloat(employer['mmtax']).toFixed(2) : '0.00') + "</td>";
            row += "<td style='text-align: center;'>" + (employee['uutax'] ? parseFloat(employee['uutax']).toFixed(2) : '0.00') + "</td>";
            row += "<td style='text-align: center;'>" + (employer['uutax'] ? parseFloat(employer['uutax']).toFixed(2) : '0.00') + "</td>";
            row += "</tr>";
            tbody.append(row);
         }

         // Display totals
         var totalEmployeeContribution = {
               'gross': 0,
               'net': 0,
               'FederalIncomeTax': 0,
               'SocialSecurityTax': 0,
               'MedicareTax': 0,
               'UnemploymentTax': 0
         };
         var totalEmployerContribution = {
               'FederalIncomeTax': 0,
               'SocialSecurityTax': 0,
               'MedicareTax': 0,
               'UnemploymentTax': 0
         };

         // Calculate totals
         for (var i = 0; i < employeeData.length; i++) {
            var employee = employeeData[i];
            var employer = employerData[i] || {}; // Handle missing data gracefully
            totalEmployeeContribution['gross'] += parseFloat(employee['gross']) || 0;
            totalEmployeeContribution['net'] += parseFloat(employee['net']) || 0;
            totalEmployeeContribution['FederalIncomeTax'] += parseFloat(employee['fftax']) || 0;
            totalEmployeeContribution['SocialSecurityTax'] += parseFloat(employee['sstax']) || 0;
            totalEmployeeContribution['MedicareTax'] += parseFloat(employee['mmtax']) || 0;
            totalEmployeeContribution['UnemploymentTax'] += parseFloat(employee['u_utax']) || 0;
            totalEmployerContribution['FederalIncomeTax'] += parseFloat(employer['fftax']) || 0;
            totalEmployerContribution['SocialSecurityTax'] += parseFloat(employer['sstax']) || 0;
            totalEmployerContribution['MedicareTax'] += parseFloat(employer['mmtax']) || 0;
            totalEmployerContribution['UnemploymentTax'] += parseFloat(employer['uutax']) || 0;
         }

         var tfoot = $("#federal_summary tfoot").empty();
         // Append total row
         var totalRow = "<tr class='btnclr'>";
         totalRow += "<td style='text-align:end;' colspan='2'>Total </td>";
         totalRow += "<td>" + totalEmployeeContribution['gross'].toFixed(2) + "</td>";
         totalRow += "<td>" + totalEmployeeContribution['net'].toFixed(2) + "</td>";
         totalRow += "<td>" + totalEmployeeContribution['FederalIncomeTax'].toFixed(2) + "</td>";
         totalRow += "<td>" + totalEmployerContribution['FederalIncomeTax'].toFixed(2) + "</td>";
         totalRow += "<td>" + totalEmployeeContribution['SocialSecurityTax'].toFixed(2) + "</td>";
         totalRow += "<td>" + totalEmployerContribution['SocialSecurityTax'].toFixed(2) + "</td>";
         totalRow += "<td>" + totalEmployeeContribution['MedicareTax'].toFixed(2) + "</td>";
         totalRow += "<td>" + totalEmployerContribution['MedicareTax'].toFixed(2) + "</td>";
         totalRow += "<td>" + totalEmployeeContribution['UnemploymentTax'].toFixed(2) + "</td>";
         totalRow += "<td>" + totalEmployerContribution['UnemploymentTax'].toFixed(2) + "</td>";
         totalRow += "</tr>";
         tfoot.append(totalRow);
         // if ($.fn.DataTable.isDataTable('#federal_summary')) {
         //     $('#federal_summary').DataTable().destroy(); 
         // }
         $('#federal_summary').DataTable({
            paging: true,
            searching: true,
            ordering: true,
            info: true,
         });
      },
      error: function(xhr, status, error) {
         console.error("Error:", error);
      }
   });
}


// Function to generate the tax table for a given tax type
function generateTaxTable(taxType, employerContributions, employeeContributions, table) {
   const allTaxTypes = {};
   const taxTypeCounts = {};
   
   // Collect unique tax codes
   employerContributions.forEach(item => {
      const taxKey = item.tax.trim() + "-" + (item.code ? item.code.trim() : "");
      allTaxTypes[taxKey] = item.taxType || '';  
      taxTypeCounts[taxKey] = (taxTypeCounts[taxKey] || 0) + 1;
   });

   employeeContributions.forEach(item => {
      const taxKey = item.tax.trim() + "-" + (item.code ? item.code.trim() : "");
      allTaxTypes[taxKey] = item.taxType || '';
      taxTypeCounts[taxKey] = (taxTypeCounts[taxKey] || 0) + 1;
   });

   const taxTypeMap = {};
   Object.keys(allTaxTypes).forEach(taxKey => {
      const taxType = allTaxTypes[taxKey];
      if (!taxTypeMap[taxType]) {
         taxTypeMap[taxType] = [];
      }
      taxTypeMap[taxType].push(taxKey);
   });

   // Create table headers dynamically
   if (Object.keys(taxTypeMap).length > 0) {
      let taxHeaders = "<tr class='btnclr'><th rowspan='2'>S.No</th><th rowspan='2'>Employee Name</th>";
      taxHeaders += "<th rowspan='2' style='border-bottom:none;text-align:center'>Gross</th><th rowspan='2' style='border-bottom:none;text-align:center'>Net</th>";
      Object.keys(taxTypeMap).forEach(taxType => {
         const taxes = taxTypeMap[taxType];
         const displayTaxType = (taxType === "living_state_tax") ? "LIVING STATE TAX" : "WORKING STATE TAX";
         taxHeaders += "<th colspan='" + (2 * taxes.length) + "' style='text-align:center'>" + displayTaxType + "</th>";
      });
      taxHeaders += "</tr><tr class='btnclr'>";

      Object.keys(taxTypeMap).forEach(taxType => {
         const taxes = taxTypeMap[taxType];
         taxes.forEach(taxKey => {
            const taxName = taxKey.split('-')[0];
            const code = taxKey.split('-')[1];
            var changecode = code === 'PS' ? 'Pennsylvania' : code === 'ML' ? 'Maryland' : code === 'NJ' ? 'New Jersey' : 'New Jersey';
            taxHeaders += "<th colspan='2' style='text-align:center'>" + taxName + "-" + changecode + "</th>";
         });
      });

      taxHeaders += "</tr><tr class='btnclr'><th></th><th></th><th></th><th></th>"; // Add empty cell for S.No
      Object.keys(taxTypeMap).forEach(taxType => {
         const taxes = taxTypeMap[taxType];
         taxes.forEach(() => {
         taxHeaders += "<th style='text-align:center'>Employee Contribution</th><th style='text-align:center'>Employer Contribution</th>";
         });
      });
      taxHeaders += "</tr>";
      table.find("thead").append(taxHeaders);

      // Consolidate contributions
      const consolidatedContributions = {};
      employerContributions.forEach(item => {
         const employeeName = item.employee_name;
         const taxKey = item.tax.trim() + "-" + (item.code ? item.code.trim() : "");
         if (!consolidatedContributions[employeeName]) {
            consolidatedContributions[employeeName] = {};
         }
         if (!consolidatedContributions[employeeName][taxKey]) {
            consolidatedContributions[employeeName][taxKey] = { employee: "0.00", employer: "0.00" };
         }
         consolidatedContributions[employeeName][taxKey].employer = parseFloat(item.total_amount).toFixed(2) || "0.00";
      });

      employeeContributions.forEach(item => {
         const employeeName = item.employee_name;
         const taxKey = item.tax.trim() + "-" + (item.code ? item.code.trim() : "");
         if (!consolidatedContributions[employeeName]) {
            consolidatedContributions[employeeName] = {};
         }
         if (!consolidatedContributions[employeeName]) {
            consolidatedContributions[employeeName] = { gross: item.gross || 0, net: item.net || 0 };
         }
         if (!consolidatedContributions[employeeName][taxKey]) {
            consolidatedContributions[employeeName][taxKey] = { employee: "0.00", employer: "0.00" };
         }
            consolidatedContributions[employeeName][taxKey].employee = parseFloat(item.total_amount).toFixed(2) || "0.00";
         consolidatedContributions[employeeName].gross = item.gross || consolidatedContributions[employeeName].gross;
         consolidatedContributions[employeeName].net = item.net || consolidatedContributions[employeeName].net;
      });

      // Populate rows for each employee
      const tbody = table.find("tbody");
      let serialNumber = 1; // Initialize serial number
      Object.keys(consolidatedContributions).forEach(employeeName => {
         const contributions = consolidatedContributions[employeeName];
         const row = $("<tr>");
         row.append("<td>" + serialNumber++ + "</td>"); // Add serial number
         row.append("<td>" + employeeName + "</td>");
         row.append("<td>$" + (isNaN(parseFloat(contributions.gross)) ? '0.00' : parseFloat(contributions.gross).toFixed(2)) + "</td>");
         row.append("<td>$" + (isNaN(parseFloat(contributions.net)) ? '0.00' : parseFloat(contributions.net).toFixed(2)) + "</td>");

         Object.keys(taxTypeMap).forEach(taxType => {
            const taxes = taxTypeMap[taxType];
            taxes.forEach(taxKey => {
               const taxData = contributions[taxKey] || { employee: "0.00", employer: "0.00" };
               row.append("<td>$" + taxData.employee + "</td>");
               row.append("<td>$" + taxData.employer + "</td>");
            });
         });
         tbody.append(row);
      });

      // Populate footer with total contributions
      const tfoot = table.find("tfoot");
      let totalGross = 0;
      let totalNet = 0;
      Object.keys(consolidatedContributions).forEach(employeeName => {
         const contributions = consolidatedContributions[employeeName];
         totalGross += isNaN(parseFloat(contributions.gross)) ? 0 : parseFloat(contributions.gross);
         totalNet += isNaN(parseFloat(contributions.net)) ? 0 : parseFloat(contributions.net);
      });
      const footerRow = $("<tr class='btnclr'>").append("<td colspan='2'>Total</td>");
      footerRow.append("<td>$" + totalGross.toFixed(2) + "</td>");
      footerRow.append("<td>$" + totalNet.toFixed(2) + "</td>");

      Object.keys(taxTypeMap).forEach(taxType => {
         const taxes = taxTypeMap[taxType];
         taxes.forEach(taxKey => {
            let totalEmployeeContribution = 0;
            let totalEmployerContribution = 0;
            
            Object.keys(consolidatedContributions).forEach(employeeName => {
               const contribution = consolidatedContributions[employeeName][taxKey];
      
               if (contribution) {
                  totalEmployeeContribution += parseFloat(contribution.employee);
                  totalEmployerContribution += parseFloat(contribution.employer);
               }
            });
            footerRow.append("<td>$" + totalEmployeeContribution.toFixed(2) + "</td>");
            footerRow.append("<td>$" + totalEmployerContribution.toFixed(2) + "</td>");
         });
      });

      tfoot.append(footerRow);
   } else {
      const columnCount = table.find("thead th").length;
      table.find("tbody").append(
         "<tr style='border:none;'>" +
         "<td colspan='" + columnCount + "' style='width:2%;padding:20px;text-align:center;'>" +
         "<p style='text-align:center; margin:0; font-weight:bold;'>No data found</p>" +
         "</td>" +
         "</tr>"
      );
   }
}


function populateTable(response) {
   // Clear existing tables
   const stateTaxTable = $("#StateTaxTable");
   const livingStateTaxTable = $("#LivingStateTaxTable");
   stateTaxTable.find("thead, tbody, tfoot").empty();
   livingStateTaxTable.find("thead, tbody, tfoot").empty();

   const hasEmployerContributions = Object.keys(response.employer_contribution).length > 0;
   const hasEmployeeContributions = Object.keys(response.employee_contribution).length > 0;

   if (!hasEmployerContributions && !hasEmployeeContributions) {
      stateTaxTable.find("tbody").append("<tr><td colspan='100%' style='text-align:center;'>No data found</td></tr>");
      livingStateTaxTable.find("tbody").append("<tr><td colspan='100%' style='text-align:center;'>No data found</td></tr>");
      return;  // Stop execution here as there's no data
   }

   // Generate tables for state_tax and living_state_tax
   generateTaxTable("state_tax", response.employer_contribution.state_tax, response.employee_contribution.state_tax, stateTaxTable);
   generateTaxTable("living_state_tax", response.employer_contribution.living_state_tax, response.employee_contribution.living_state_tax, livingStateTaxTable);   

   var rowCount = $('#livingStateTaxTable tr').length;
   stateTaxTable.DataTable();
   // if(rowCount >= 2){
      livingStateTaxTable.DataTable();
    //}
}

// Generate Xlsx Format

// function generateExcel(el) {
//     var clon = el.clone();
//     var html = clon.wrap('<div>').parent().html();

//     //add more symbols if needed...
//     while (html.indexOf('á') != -1) html = html.replace(/á/g, '&aacute;');
//     while (html.indexOf('é') != -1) html = html.replace(/é/g, '&eacute;');
//     while (html.indexOf('í') != -1) html = html.replace(/í/g, '&iacute;');
//     while (html.indexOf('ó') != -1) html = html.replace(/ó/g, '&oacute;');
//     while (html.indexOf('ú') != -1) html = html.replace(/ú/g, '&uacute;');
//     while (html.indexOf('º') != -1) html = html.replace(/º/g, '&ordm;');
//     html = html.replace(/<td>/g, "<td>&nbsp;");

//     window.open('data:application/vnd.ms-excel,' + encodeURIComponent(html));
// }
// $("#download").click(function (event) {
//  	generateExcel($("#ProfarmaInvList"));
// });

$(document).ready(function() {
   $('#download').click(function() {
       const wb = XLSX.utils.book_new();

       function addTableToWorkbook(tableId, sheetName) {
         const table = document.getElementById(tableId);
         const worksheet = XLSX.utils.table_to_sheet(table);
         XLSX.utils.book_append_sheet(wb, worksheet, sheetName);
       }

       addTableToWorkbook('.federal', 'Data Table 1');
       addTableToWorkbook('.work_state', 'Data Table 2');
       addTableToWorkbook('.living_state', 'Data Table 3');
       addTableToWorkbook('.city_tax', 'Data Table 4');
       addTableToWorkbook('.county_tax', 'Data Table 5');
       XLSX.writeFile(wb, 'data_tables.xlsx');
   });
});


$(document).ready(function() {
   $('#CityTax').DataTable({
      "pageLength": 10,  
      "searching": true, 
      "ordering": true,  
      "lengthChange": true, 
      "info": true, 
      "paging": true 
   });

   $('#CountyTax').DataTable({
      "pageLength": 10,  
      "searching": true, 
      "ordering": true,  
      "lengthChange": true, 
      "info": true, 
      "paging": true 
   });
});

</script>

<style>
th,td{
   text-align:center;
}

.select2{display:none;}

#pagesControllers{
   padding:20px;
}
.dropdown-menu{
   left: 229px !important;
}
.dropdown{
   position: relative;
   left: 1263px !important;
   bottom: 68px !important;
}
</style>