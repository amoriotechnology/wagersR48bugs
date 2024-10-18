<?php error_reporting(1);  ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.base64.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/drag_drop_index_table.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/html2canvas.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jspdf.plugin.autotable"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jspdf.umd.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>my-assets/js/invoice_tableManager.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
<!--<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>-->
<!--<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />-->
<!-- <script type="text/javascript" src="<?php echo base_url()?>my-assets/js/tableManager.js"></script> -->
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
<!-- <script type="text/javascript" src="http://www.bacubacu.com/colresizable/js/colResizable-1.5.min.js"></script> -->
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" />
<style>

.btnclr{
       background-color:<?php echo $setting_detail[0]['button_color']; ?>;
       color: white;

   }

   #pagesControllers{
   padding:20px;
   }
   .select2{
   display:none;
   }
   table {
   border-collapse: collapse;
   width: 100%;
   margin-bottom: 20px;
   }
   /* Style the table header */
   thead {
   background-color: #333;
   color: #fff;
   text-align: center;
   }
   thead th {
   padding: 10px;
   border: 1px solid #000;
   }
   /* Style the table rows */
   /* tbody tr:nth-child(even) {
   background-color: #f2f2f2;
   }
   tbody tr:hover {
   background-color: #ddd;
   } */
   tbody td {
   padding: 10px;
   border: 1px solid #000;
   text-align: center !important;
   }
   th{
   text-align:center !important;
   padding:10px !important;
   }
   .table1 td , .table1 tr{
   text-align:center;
   border:none !important;
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
    width: 150px;
  }

   
}
</style>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/balance_sheet.css" />
<div class="content-wrapper">
   <section class="content-header" style='height:70px;'>
      <div class="header-icon">
 
         <figure class="one">
               <img src="<?php echo base_url()  ?>asset/images/productreport.png"  class="headshotphoto" style="height:50px;" />
      </div>

          <div class="header-title">
          <div class="logo-holder logo-9">
          <h1><?php echo "Transaction By Vendor"; ?></h1>
       </div>

         <small><?php echo ""; ?></small>
         <ol class="breadcrumb"   style=" border: 3px solid #d7d4d6;"   >


            <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
            <li><a href="#"><?php echo "Accounts"; ?></a></li>
            <li class="active" style="color:orange;"><?php echo "Transaction By Vendor"; ?></li>
        
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
      <?php  
         $commercial_invoice_number  = array();
                                 foreach ($supplier_info as $invoice) {
                                 $commercial_invoice_number [] = $invoice['supplier_name'];
                                 }
                                 $unique_commercial_invoice_number = array_unique($commercial_invoice_number);
         ?>
      <div class="row">
         <div class="col-sm-12">
            <div class="panel panel-bd lobidrag" style='height:70px;  border: 3px solid #d7d4d6; ' >
                <div class='col-sm-8'>
               <div class="panel-body" >
                  <!-- <div  style="display: inline-block; vertical-align: middle;"> -->
                  <table class="table1 table-bordered" style='border:none;margin-top: -10px;' cellspacing="0" width="100%"  style='border:none;'>
                     <tr style="text-align: center; font-weight: bold;" class="filters">
                        <td style="width: 100px;"> </td>
                        <td style="width: 100px;">Supplier Name </td>
                        <td style="width: 100px;">
                           <select id="customer-name-filter" style="width: 100%;" class="form-control">
                              <option value="Any">Any</option>
                              <?php
                                 // Use PHP to populate the options dynamically
                                 foreach ($unique_commercial_invoice_number as $invoice) {
                                     echo '<option value="' . $invoice . '">' . $invoice . '</option>';
                                 }
                                 ?>
                           </select>
                        </td>
                        <td style="width: 50px;text-align:end;">Date</td>
                        <td class="search_dropdown" style="width: 100px; color: black; padding: 5px;">
                           <select id="payment-filter" style="width: 100px;" class="form-control">
                              <option value="Any">Any</option>
                              <option value="Custom">Custom</option>
                           </select>
                        </td>
                        <td class="search_dropdown" style="width: 15%; color: black; padding: 5px;">
                           <div id="datepicker-container">
                              <input type="text" class="form-control daterangepicker-field" id="daterangepicker-field" name="daterangepicker-field" style="width: 180px; border-radius: 8px; height: 35px;" />
                           </div>
                        </td>
                        <td style="width: 20px; padding: 5px;">
                           <input type="submit" id="search" name="btnSave" class="btn btnclr" style="margin-top: -12px;" value="Search" />
                        </td>
                        <td style="width: 100px;"></td>
                     </tr>
                  </table>
                   </div> 
               </div>
                                                         <div class='col-sm-2' style='margin-top: 20px;
    margin-left: 140px;text-align:end;'>
    <div class="dropdown bootcol" id="drop" style="margin-top:-10px;width: 300px;">
        <button class="btnclr btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            <span class="fa fa-download"></span> <?php echo display('download') ?>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
            <li><a href="#" onclick="generate()"><img src="<?php echo base_url() ?>assets/images/pdf.png" width="24px"> <?php echo display('PDF') ?></a></li>
            <li class="divider"></li>
            <li><a href="#" onclick="fnExcelReport()"><img src="<?php echo base_url() ?>assets/images/xls.png" width="24px"> <?php echo display('XLS') ?></a></li>
        </ul>&nbsp;
        <button type="button" class="btnclr btn btn-default dropdown-toggle" onclick="printDiv('printableArea')"><b class="ti-printer"></b>&nbsp;<?php echo display('print') ?></button>
    </div>
</div>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-sm-12 col-md-12">
            <div class="panel panel-bd lobidrag" id="printArea" style=" border: 3px solid #d7d4d6;" >
               <div class="panel-body">
                <div class="sortableTable__container">
                <div class="sortableTable__discard">
                </div>
                <div id='printableArea'>
                  <table class="table table-bordered"  id="ProfarmaInvList" cellspacing="0" width="100%">
                     <thead class="sortableTable">
                        <tr class="sortableTable__header btnclr">
                           <th class="1 value" data-col="1">Supplier Name</th>
                           <th class="2 value" data-col="2">Invoice Number</th>
                           <th class="3 value" data-col="3">Payment ID</th>
                           <th class="4 value" data-col="4">Payment Date</th>
                           <th class="5 value" data-col="5">Total Amount</th>
                           <th class="6 value" data-col="6">Amount Paid</th>
                           <th class="7 value" data-col="7">Balance</th>
                           <th class="8 value" data-col="8">Details</th>
                           <th class="9 value" data-col="9">Status</th>
                        </tr>
                     </thead>
                     <tbody class="sortableTable__body">
                        <tr class="task-list-row">
                        <?php
                           // Check if $supplier contains data and if it's an array
                           if ($supplier_info) {
                               $previousSupplierName = null;
                               $previousInvoiceNumber = null;
                               $previousPaymentID = null;
                           
                               foreach ($supplier_info as $arr) {
                                   $status = '';
                           
                                   if ($arr['total_amt'] == $arr['amt_paid']) {
                                       $status = 'Paid';
                                   } else if ($arr['total_amt'] != $arr['amt_paid'] && $arr['amt_paid'] !== '0.00' && $arr['amt_paid'] !== '0' && substr($arr['due_amount'], 0, 1) !== '-') {
                                       $status = 'Partially Paid';
                                   } else if ($arr['total_amt'] != $arr['amt_paid'] && $arr['amt_paid'] == '0.00') {
                                       $status = 'Not Paid';
                                   } else if (substr($arr['balance'], 0, 1) == '-') {
                                       $status = 'Paid';
                                   }
                           
                                   // Display the "Supplier Name" only when it changes
                                
                                       echo '<td class="1 value" data-col="1">' . $arr['supplier_name'] . '</td>';
                                 
                                   // Display the "Invoice Number" only when it changes
                                 
                                       echo '<td class="2 value" data-col="2">' . $arr['chalan_no'] . '</td>';
                                     
                           
                                   // Display the "Payment ID" only when it changes
                              
                                       echo '<td class="3 value" data-col="3">' . $arr['payment_id'] . '</td>';
                                     
                           
                                   // Continue displaying the rest of the data
                                   echo '<td data-col="4" class="4 value" style="text-align:center;">' . $arr['payment_date'] . '</td>';
                                   echo '<td data-col="5" class="5 value" style="text-align:center;">' . $currency . number_format($arr['total_amt'] , 2); '</td>';
                                   echo '<td data-col="6" class="6 value" style="text-align:center; text-wrap: nowrap;">' . number_format($arr['amt_paid'] , 2); '</td>';
                                   echo '<td data-col="7" class="7 value" style="text-align:center;">' . $currency . number_format($arr['balance'] , 2);  '</td>';
                                   echo '<td data-col="8" class="8 value" style="text-align:center;">' . $currency . $arr['details'] . '</td>';
                                   echo '<td data-col="9" class="9 value" style="text-align:center;">' . $currency;
                                   if ($status == 'Paid') {
                                       echo '<span style="color: green; font-weight: bold;">' . $status . '</span>';
                                   } else if ($status == 'Partially Paid') {
                                       echo '<span style="color: #4E11A8; font-weight: bold;">' . $status . '</span>';
                                   } else if ($status == 'Not Paid') {
                                       echo '<span style="color: red; font-weight: bold;">' . $status . '</span>';
                                   }
                                   echo '</td>';
                                   echo '</tr>';
                           
                                   echo '</tr>';
                               }
                           } else {
                               // No records found
                               echo '<tr>';
                               echo '<td colspan="9" style="text-align:center; font-weight:bold;">No Records Found</td>';
                               echo '</tr>';
                           }
                           ?>
                           </tr>
                     </tbody>
                  </table>
                  </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
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
      <script src="<?php echo base_url()?>assets/js/jquery.bootgrid.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.0.0-alpha.1/jspdf.plugin.autotable.js"></script>
      <script>
        $(document).ready(function() {
    $(".btnclr").click(function() {
        $(this).siblings('.dropdown-menu').toggle();
    });
});
      function generate() {
                 var utc = new Date().toJSON().slice(0,10).replace(/-/g,'/');
  $(".myButtonClass").hide();
  var doc = new jsPDF("p", "pt");
  var res = doc.autoTableHtmlToJson(document.getElementById("ProfarmaInvList"));
  var height = doc.internal.pageSize.height;
  //doc.text("Generated PDF", 50, 50);

  doc.autoTable(res.columns, res.data, {
    startY: doc.autoTableEndPosY() + 50,
  });
  doc.save("Vendor_Transaction_List_"+utc+".pdf");
}
        function fnExcelReport()
{
 table = $('#ProfarmaInvList').clone();
    
      
    
    var hyperLinks = table.find('a');
    
    var tab_text="<table border='2px'><tr bgcolor='#87AFC6'>";
    var textRange; var j=0;
    tab = document.getElementById('ProfarmaInvList'); // id of table

    for(j = 0 ; j < tab.rows.length ; j++) 
    {   var sp=  $(hyperLinks[j]).text();
        tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";
        //tab_text=tab_text+"</tr>";
          console.log(sp);
    }

    tab_text=tab_text+"</table>";
   tab_text= tab_text.replace(/<a[^>]*>/g, "");
    tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
    tab_text= tab_text.replace(/<img[^>]*>/gi,""); // remove if u want images in your table
    tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE "); 

    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
    {
        txtArea1.document.open("txt/html","replace");
        txtArea1.document.write(tab_text);
        txtArea1.document.close();
        txtArea1.focus(); 
        sa=txtArea1.document.execCommand("SaveAs",true,"");
    }  
    else                 //other browser not tested on IE 11
        sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));  

    return (sa);
}
         $(document).ready(function(){
          $('#datepicker-container').hide();
         });
         $(document).on('change', '#payment-filter', function () {
             var selectedValue = $(this).val().trim();
           
             if (selectedValue == 'Custom') {
                 // If "custom" is selected, show the date picker and filter the table based on it
                 $('#datepicker-container').show();
             
             }  else {
                 // For other options, hide the date picker and show all table rows
                 $('#datepicker-container').hide();
               
             }
         });
         document.getElementById('search').addEventListener('click', function (e) {
             e.preventDefault(); // Prevent the default form submission
         
             // Get selected filter values
             var selectedCustomer = document.getElementById('customer-name-filter').value;
           
             var selectedPaymentFilter = document.getElementById('payment-filter').value;
         
             // Get all rows in the table
             var rows = document.querySelectorAll("table.table tbody tr");
             var dateRange = document.getElementById('daterangepicker-field').value;
             var dateRangeParts = dateRange.split(' to ');
         
             var selectedStartDate = new Date(dateRangeParts[0]);
             var selectedEndDate = new Date(dateRangeParts[1]);
         
             // Check if the payment date filter is set to "Custom"
             var isCustomDateFilter = selectedPaymentFilter === 'custom';
         
             // Loop through each row and check filter conditions
             for (var i = 0; i < rows.length; i++) {
                 var row = rows[i];
                 var customerName = row.querySelector("td:nth-child(1)").textContent.trim();
                 var paymentDetails = row.querySelector("td:nth-child(6)").textContent.trim();
                 var paymentDate = row.querySelector("td:nth-child(4)").textContent.trim();
                 var paymentDateObj = new Date(paymentDate);
         
                 // Check filter conditions
                 var customerFilterMatch = (selectedCustomer === 'Any' || selectedCustomer === customerName);
              
         
                 // Check if the payment date filter is set to "Custom"
                 if (isCustomDateFilter) {
                     var dateFilterMatch = (paymentDateObj >= selectedStartDate && paymentDateObj <= selectedEndDate);
                     if (customerFilterMatch && dateFilterMatch) {
                         row.style.display = "";
                     } else {
                         row.style.display = "none";
                     }
                 } else {
                     // If payment date filter is not "Custom," check regular filter conditions
                     if (customerFilterMatch ) {
                         row.style.display = "";
                     } else {
                         row.style.display = "none";
                     }
                 }
             }
         });

      </script>
      
      
      <script type="text/javascript">
         $(document).ready(function() {
         // Function to store the visibility state of rows in localStorage
         function storeVisibilityState() {
            var TransactionvendorlistvisibilityStates = {};
            $("#ProfarmaInvList tr").each(function(index, element) {
                var row = $(element);
                var rowID = index;
                var isVisible = row.is(':visible');
                TransactionvendorlistvisibilityStates[rowID] = isVisible;
            });
            // Store the visibility states in localStorage
            localStorage.setItem("TransactionvendorlistvisibilityStates", JSON.stringify(TransactionvendorlistvisibilityStates));
         }
         // Apply the stored visibility state on page load
         function applyVisibilityState() {
            var storedVisibilityStates = JSON.parse(localStorage.getItem("TransactionvendorlistvisibilityStates")) || {};
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
   </section>
</div>