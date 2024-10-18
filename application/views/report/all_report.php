<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.base64.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/drag_drop_index_table.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>my-assets/js/tableManager.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" />
<!-- All Report Start  -->
<style>

.btnclr{
       background-color:<?php echo $setting_detail[0]['button_color']; ?>;
       color: white;

   }




   td{
   text-align:center;
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
   
   
   
   
   
   
   
   
   
   
</style>
<div class="content-wrapper">
<section class="content-header">
   <div class="header-icon">
       
       
        <figure class="one">
               <img src="<?php echo base_url()  ?>asset/images/closing.png"  class="headshotphoto" style="height:50px;" />
      </div>
      
      
      
       <div class="header-title">
          <div class="logo-holder logo-9">
      <h1><?php echo display('todays_report') ?></h1>
       </div>
            
      
      
      
      
      <small><?php //echo display('todays_sales_and_purchase_report') ?></small>
   
   
         <ol class="breadcrumb"   style=" border: 3px solid #d7d4d6;"   >
        
        
        
         <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
         <li><a href="#"><?php echo display('report') ?></a></li>
         <li class="active"><?php echo display('todays_report') ?></li>
    
       <div class="load-wrapp">
       <div class="load-10">
         <div class="bar"></div>
       </div>
       </div>
    
    
      </ol>
   </div>
</section>








<section class="content">
   <div class="row">
      <div class="col-sm-12">
         <?php if($this->permission1->method('todays_sales_report','read')->access()){ ?>
         <a href="<?php echo base_url('Admin_dashboard/todays_sales_report') ?>" class="btn btn-info m-b-5 m-r-2"><i class="ti-align-justify"> </i> <?php echo display('sales_report') ?> </a>
         <?php }?>
         <?php if($this->permission1->method('todays_purchase_report','read')->access()){ ?>
         <a href="<?php echo base_url('Admin_dashboard/todays_purchase_report') ?>" class="btn btn-success m-b-5 m-r-2"><i class="ti-align-justify"> </i>  <?php echo display('purchase_report') ?> </a>
         <?php }?>
         <?php if($this->permission1->method('product_sales_reports_date_wise','read')->access()){ ?>
         <a href="<?php echo base_url('Admin_dashboard/product_sales_reports_date_wise') ?>" class="btn btn-primary m-b-5 m-r-2"><i class="ti-align-justify"> </i>  <?php echo display('sales_report_product_wise') ?> </a>
         <?php }?>
         <?php if($this->permission1->method('todays_sales_report','read')->access() && $this->permission1->method('todays_purchase_report','read')->access()){ ?>
         <a href="<?php echo base_url('Admin_dashboard/total_profit_report') ?>" class="btn btn-warning m-b-5 m-r-2"><i class="ti-align-justify"> </i>  <?php echo display('profit_report') ?> </a>
         <?php }?>
      </div>
   </div>
   <!-- Todays sales report -->
   <div class="row">
   <div class="col-sm-14">
      <div class="panel panel-bd lobidrag" style=" border: 3px solid #d7d4d6;"  >
         <div class="panel-heading">
            <div class="panel-title">
               <h4><?php echo "Sales : " ?> </h4>
               <p class="text-right">
                  <!-- <i class="fa fa-cog"  aria-hidden="true" id="myBtn" style="font-size:25px;" onClick="columnSwitchMODAL()"></i> -->
                  <a  class="btn btnclr" href="#" onclick="printDiv('printableArea')"><?php echo display('print') ?></a>
               </p>
            </div>
         </div>
         <div class="panel-body">
            <div id="printableArea">
               <table class="print-table" width="100%">
                  <tr>
                     <td align="left" class="print-table-tr">
                        <img src="<?php echo  base_url().$logo; ?>"   style='width: 90px;'  />
                     </td>
                     <td align="center" class="print-cominfo">
                        <span class="company-txt">
                        <h3> <?php echo $company; ?> </h3>
                        <h4></b><?php echo $address; ?> </h4>
                        <h4></b><?php echo $email; ?> </h4>
                        <h4></b><?php echo $phone; ?> </h4>
                     </td>
                     <td align="right" class="print-table-tr">
                        <date>
                           <?php echo display('date')?>: <?php
                              echo date('d-M-Y');
                              ?> 
                        </date>
                     </td>
                  </tr>
               </table>
               <div class="table-responsive">
                    <div class="sortableTable__container">
                    <div class="sortableTable__discard">
                    </div>
                  <table class="table table-striped " id="ProfarmaInvList">
                     <thead class="sortableTable">
                        <tr   class="sortableTable__header btnclr">
                           <th data-col="1" class="1 value" style="height: 35.0114px;">Sale Date</th>
                           <th data-col="2" class="2 value" style="height: 35.0114px;">Invoice No</th>
                           <th data-col="3" class="3 value" style="height: 35.0114px;">Customer Name</th>
                           <th data-col="4" class="4 value" style="height: 35.0114px;">Total Amount</th>
                        </tr>
                     </thead>
                     <tbody class="sortableTable__body">
                        <?php
                           if ($sales_report) {
                               ?>
                        {sales_report}
                        <tr class="task-list-row">
                           <td data-col="1" class="1 value">{sales_date}</td>
                           <td data-col="2" class="2 value">
                              <?php  'Cinvoice/invoice_inserted_data/{invoice_id}'; ?>
                              {invoice_id}
                           </td>
                           <td data-col="3" class="3 value">{customer_name}</td>
                           <td data-col="4" class="4 value"><?php
                              echo (($position == 0) ? "$currency {total_amount}" : "{total_amount} $currency") ?></td>
                        </tr>
                        {/sales_report}
                        <tr class="task-list-row">
                           <td data-col="1" class="1 value">&nbsp;</td>
                           <td data-col="2" class="2 value">&nbsp;</td>
                           <td data-col="3" class="3 value" style="text-align:right;"><b><?php echo display('total_sales') ?>:</b></td>
                           <td data-col="4" class="4 value"><b><?php
                              echo (($position == 0) ? $currency.' ' .$sales_amount: $sales_amount.' '. $currency) ?></b></td>
                        </tr>
                        <?php } else {
                           ?>
                        <tr>
                           <td class="text-center" colspan="4"><?php echo display('not_found'); ?></td>
                        </tr>
                        <?php } ?>
                     </tbody>
                  </table>
                  </div>
                  <!-- <div id="myModal_colSwitch" class="modal_colSwitch" >
                     <div class="modal-content_colSwitch" style="width:10%;height:20%;">
                           <span class="close_colSwitch">&times;</span>
                     <input type="checkbox"  data-control-column="1" checked = "checked" class="1"  value="1"/>Sales Date <br>
                     <input type="checkbox"  data-control-column="2" checked = "checked" class="2"  value="2"/>Invoice No<br>
                     <input type="checkbox"  data-control-column="3" checked = "checked" class="3"   value="3"/>Supplier Name<br>
                     <input type="checkbox"  data-control-column="4" checked = "checked" class="4"   value="4"/>Total Amount<br>    
                     </div>
                     </div>         -->
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Todays purchase report -->
   <div class="row">
      <div class="col-sm-12">
         <div class="panel panel-bd lobidrag" style=" border: 3px solid #d7d4d6;"  >
            <div class="panel-heading">
               <div class="panel-title">
                  <h4><?php echo "Expense : " ?></h4>
                  <p class="text-right">
                     <a  class="btn btnclr" href="#" onclick="printDiv('purchase_div')"><?php echo display('print') ?></a>
                  </p>
               </div>
            </div>
            <div class="panel-body">
               <div id="purchase_div">
                  <table class="print-table" width="100%">
                     <tr>
                        <td align="left" class="print-table-tr">
                           <img src="<?php echo  base_url().$logo; ?>"   style='width: 90px;'  />
                        </td>
                        <td align="center" class="print-cominfo">
                           <span class="company-txt">
                           <h3> <?php echo $company; ?> </h3>
                           <h4></b><?php echo $address; ?> </h4>
                           <h4></b><?php echo $email; ?> </h4>
                           <h4></b><?php echo $phone; ?> </h4>
                        </td>
                        <td align="right" class="print-table-tr">
                           <date>
                              <?php echo display('date')?>: <?php
                                 echo date('d-M-Y');
                                 ?> 
                           </date>
                        </td>
                     </tr>
                  </table>
                  <div class="table-responsive">
                    <div class="sortableTable__container">
                    <div class="sortableTable__discard">
                    </div>
                     <table class="table table-striped " id="ProfarmaInvList">
                        <thead class="sortableTable">
                           <tr  class="sortableTable__header btnclr">
                              <th data-col="5" class="5 value" style="height: 35.0114px;">Purchase Date</th>
                              <th data-col="6" class="6 value" style="height: 35.0114px;">Invoice No</th>
                              <th data-col="7" class="7 value" style="height: 35.0114px;">Supplier Name</th>
                              <th data-col="8" class="8 value" style="height: 35.0114px;">Total Amount</th>
                           </tr>
                        </thead>
                        <tbody class="sortableTable__body">
                           <?php
                              if ($purchase_report) {
                                  ?>
                           {purchase_report}
                           <tr class="task-list-row">
                              <td data-col="5" class="5 value">{prchse_date}</td>
                              <td data-col="6" class="6 value">
                                 <?php 'Cpurchase/purchase_details_data/{purchase_id}'; ?>
                                 {chalan_no}
                              </td>
                              <td data-col="7" class="7 value">{supplier_name}</td>
                              <td data-col="8" class="8 value"><?php echo (($position == 0) ? "$currency {grand_total_amount}" : "{grand_total_amount} $currency") ?></td>
                           </tr>
                           {/purchase_report}
                           <tr class="task-list-row">
                              <td data-col="5" class="5 value">&nbsp;</td>
                              <td data-col="6" class="6 value">&nbsp;</td>
                              <td data-col="7" class="7 value" style="text-align:right;"><b><?php echo "Total Expense" ?>:</b></td>
                              <td data-col="8" class="8 value"  class="text-left"><b><?php echo (($position == 0) ? "$currency {purchase_amount}" : "{purchase_amount} $currency") ?></b></td>
                           </tr>
                           <?php } else {
                              ?>
                           <tr>
                              <td class="text-center" colspan="4"><?php echo display('not_found'); ?></td>
                           </tr>
                           <?php }
                              ?>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
</section>
</div>
<!-- All Report End -->
<script>
   $(document).on('keyup', '#filterinput', function(){
    debugger;
      var value = $(this).val().toLowerCase();
      var filter=$("#filterby").val();
      $("#printableArea tr:not(:eq(0))").filter(function() {
          $(this).toggle($(this).find("td."+filter).text().toLowerCase().indexOf(value) > -1)
      });
   });
   $(document).on('keyup', '#filterinput', function(){
    debugger;
      var value = $(this).val().toLowerCase();
      var filter=$("#filter").val();
      $("#purchase_div tr:not(:eq(0))").filter(function() {
          $(this).toggle($(this).find("td."+filter).text().toLowerCase().indexOf(value) > -1)
      });
   });
   
   
//   $("input:checkbox:not(:checked)").each(function() {
//       var column = "table ." + $(this).attr("value");
//       $(column).hide();
//   });
   
//   $("input:checkbox").click(function(){
//       var column = "table ." + $(this).attr("value");
//       $(column).toggle();
//   });


$(document).ready(function() {
  // Function to toggle column visibility
  function toggleColumnVisibility(columnSelector, isChecked) {
    $(columnSelector).toggle(isChecked);
  }

  // Loop through checkboxes and initialize column visibility
  $("input:checkbox").each(function() {
    var columnValue = $(this).attr("value");
    var columnSelector = "table ." + columnValue;
    var isChecked = localStorage.getItem(columnSelector) === "true" || $(this).prop("checked");
    
    // Store checkbox state in localStorage
    localStorage.setItem(columnSelector, isChecked);

    // Toggle column visibility based on checkbox state
    toggleColumnVisibility(columnSelector, isChecked);
    
    // Set checkbox state
    $(this).prop("checked", isChecked);
  });

  // When a checkbox is clicked, update localStorage and toggle column visibility
  $("input:checkbox").click(function() {
    var columnValue = $(this).attr("value");
    var columnSelector = "table ." + columnValue;
    var isChecked = $(this).is(":checked");
    
    // Store checkbox state in localStorage
    localStorage.setItem(columnSelector, isChecked);

    // Toggle column visibility based on checkbox state
    toggleColumnVisibility(columnSelector, isChecked);
  });
});
      
</script>


      <script type="text/javascript">
         $(document).ready(function() {
         // Function to store the visibility state of rows in localStorage
         function storeVisibilityState() {
            var todaysreportlistvisibilityStates = {};
            $("#ProfarmaInvList tr").each(function(index, element) {
                var row = $(element);
                var rowID = index;
                var isVisible = row.is(':visible');
                todaysreportlistvisibilityStates[rowID] = isVisible;
            });
            // Store the visibility states in localStorage
            localStorage.setItem("todaysreportlistvisibilityStates", JSON.stringify(todaysreportlistvisibilityStates));
         }
         // Apply the stored visibility state on page load
         function applyVisibilityState() {
            var storedVisibilityStates = JSON.parse(localStorage.getItem("todaysreportlistvisibilityStates")) || {};
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
         $(".bank_edit").on('click', function() {
            var row = $(this);
            row.toggle();
            storeVisibilityState(); // Store the updated visibility state
         });
         applyVisibilityState(); 
         });
    </script>


