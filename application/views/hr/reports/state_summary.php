<?php error_reporting(1);  ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.base64.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/drag_drop_index_table.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/html2canvas.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jspdf.plugin.autotable"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jspdf.umd.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>my-assets/js/invoice_tableManager.js"></script>

<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<script type="text/javascript" src="<?php echo base_url()?>my-assets/js/tableManager.js"></script>
<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
<script type="text/javascript" src="http://mrrio.github.io/jsPDF/dist/jspdf.debug.js"></script>

<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<script src="<?php echo base_url() ?>assets/js/dashboard.js" ></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<link href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.2.2/css/bootstrap.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" />
<script type="text/javascript" src="http://www.bacubacu.com/colresizable/js/colResizable-1.5.min.js"></script>


<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<link href="<?php echo base_url() ?>assets/css/daterangepicker.css" rel="stylesheet">
<link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">
<script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/calanderstyle.css">


<style>
   .btnclr{
   background-color:<?php echo $setting_detail[0]['button_color']; ?>;
   color: white;
   }
   .table td{
   text-align:center;
   }
   .table{
   display: block;
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
</style>
<div class="content-wrapper">
   <section class="content-header">
      <div class="header-icon">
         <figure class="one">
         <img src="<?php echo base_url()  ?>asset/images/salesreport.png"  class="headshotphoto" style="height:50px;" />
      </div>
      <div class="header-title">
         <div class="logo-holder logo-9">
            <h1><?php echo 'State Overall Summary' ?></h1>
         </div>
         <small><?php //echo display('user_wise_sale_report') ?></small>
         <ol class="breadcrumb"   style=" border: 3px solid #d7d4d6;"   >
            <li><a href="<?php echo base_url()?>"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
            <li><a href="#"><?php echo display('report') ?></a></li>
            <li class="active" style="color:orange"><?php echo 'Federal Overall Summary';?></li>
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
    <?php //echo form_open('Admin_dashboard/user_sales_report', array('class' => 'form-inline', 'method' => 'get')) ?>
    
<div class="row">
<div class="col-sm-12 col-md-12">
    <div class="panel panel-bd lobidrag" style='height:80px; border: 3px solid #d7d4d6;'>
        <div class='col-sm-12'>
            <form id="fetch_tax">
                <table class="table" align="center" style="overflow-x: unset;position: relative;">
                <tr style='text-align:center;font-weight:bold;' class="filters">
                    <!-- <td style='width:200px;'></td> -->
                    <td class="search_dropdown" style="color: black;">
                        <input type="hidden" class="txt_csrfname" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                        <span><?php echo 'Employee'; ?></span>
                        <select id="customer-name-filter" name="employee_name" class="form-control">
                            <option value="All">All</option>
                            <?php
                            foreach ($emp_name as $emp) {
                                $emp['first_name']=trim($emp['first_name']);
                                $emp['last_name']=trim($emp['last_name']);
                            ?>
                            <option value="<?php echo $emp['first_name']." ".$emp['middle_name']." ".$emp['last_name']; ?>"><?php echo $emp['first_name']." ".$emp['middle_name']." ".$emp['last_name']; ?></option>
                            <?php } ?>
                        </select>
                    </td>
                    
                    <td class="search_dropdown" style="color: black;">
                        <span>Tax Choice </span>
                        <select id="tax_Choice" name='tax_choice' class="tax_choice form-control" >
                        <option value="All">All</option>
                            <option value="living_state_tax">Living</option>
                            <option value="state_tax">Working</option>
                        </select>
                    </td>

                    <td class="search_dropdown" style="color: black;">
                        <span>State <span class="text-danger">*</span></span>
                        <select id="tax_Choice" name='selectState' class="selectState form-control" >
                            <option value="">Select Your State</option>
                            <?php foreach ($state_list as $value) { ?>
                            <option value="<?php echo $value['state_code']; ?>"><?php echo $value['state']; ?></option>
                            <?php } ?>
                        </select>
                    </td>

                    <td class="search_dropdown" style="color: black;">
                        <span>Tax Type </span>
                        <select id="tax_Choice" name='taxType' class="taxType form-control" >
                            <option value="">Select Your Tax Type</option>
                            <?php foreach ($state_tax_list as $value) { ?>
                            <option value="<?php echo $value['tax']; ?>"><?php echo $value['tax']; ?></option>
                            <?php } ?>
                        </select>
                    </td>

                    <td class="search_dropdown" style="color: black; position: relative; top: 4px;">
                        <div id="datepicker-container">
                            <input type="text" class="form-control daterangepicker_field getdate_reults" id="daterangepicker-field" name="daterangepicker-field" style="margin-top: 15px;padding: 5px; width: 200px; border-radius: 8px; height: 35px;" />
                        </div>
                    </td>
                    <input type="hidden" class="getcurrency" value="<?php echo $currency; ?>">
                    <td style='float: left;width:30px; position: relative; top: 4px;'>
                        <input type="submit"  name="btnSave" class="btn btnclr" style='margin-top: 15px;' value='Search'/>
                    </td>
                </tr>
                </table>
        </div>
        <!-- <div class='col-sm-2'> -->
        <div class="dropdown bootcol" id="drop">
    
        <button type="button" class="btnclr btn btn-default dropdown-toggle"  onclick="printDiv('printableArea')" style="margin-top: -54px; margin-left: 304px;float:left; position: relative; top: 54px;"><b class="ti-printer"></b>&nbsp;<?php echo display('print') ?></button>
        </div>
        <!-- </div> -->
    </div>
    </div>
</div>
<?php //echo form_close() ?>
<!-- Manage Invoice report -->
</form>
      
<div class="row">
    <div class="panel panel-bd lobidrag" id="" style="border: 3px solid #d7d4d6;">
        <div class="panel-body">
            <div class="sortableTable__container">
                <div class="sortableTable__discard"></div>
                <div id='printableArea'>
                <div id='search_details'></div>
                <div id='period'></div>
                    <div class="panel-body">
                    <div class="sortableTable__container">
                    <div class="sortableTable__discard"></div>
                    <div id='printableArea'></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
</div>


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
   <!-- <script  src="<?php //echo base_url() ?>my-assets/js/script.js"></script>  -->
   <!--<script type="text/javascript" src="<?php echo base_url()?>my-assets/js/profarma.js"></script>-->
   <!-- <script  src="<?php //echo base_url() ?>my-assets/js/script.js"></script> -->
   <script src="<?php echo base_url()?>assets/js/jquery.bootgrid.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.0.0-alpha.1/jspdf.plugin.autotable.js"></script>
   <!--<script type="text/javascript" src="<?php echo base_url()?>my-assets/js/profarma.js"></script>-->
   
    <script src="https://cdn.jsdelivr.net/npm/table2excel@1.0.4/dist/table2excel.min.js"></script>
  
   <!-- The Modal Column Switch -->
   <div id="myModal_colSwitch" class="modal_colSwitch" >
   <div class="modal-content_colSwitch" style="width:10%;height:25%;">
    <span class="close_colSwitch">&times;</span>
        <input type="checkbox"  data-control-column="1" checked = "checked" class="1"  value="1"/>Sl.No<br>
        <input type="checkbox"  data-control-column="2" checked = "checked" class="2"  value="2"/>User Name<br>
        <input type="checkbox"  data-control-column="3" checked = "checked" class="3"   value="3"/> Total Invoice<br>
        <input type="checkbox"  data-control-column="4" checked = "checked" class="4"   value="4"/>Total Amount<br>
    </div>
   </div>
   </div>
   </div>
   </div>
</div>
<input type="hidden" id="total_invoice" value="<?php echo $total_invoice;?>" name="">
<input type="hidden" id="currency" value="{currency}" name="">
</div>
</div>
</section>
<input type ="hidden" name="csrf_test_name" id="csrf_test_name" value="<?php echo $this->security->get_csrf_hash();?>">
</div>
<!-- Manage Invoice End -->
<script type="text/javascript" src="<?php echo base_url()?>my-assets/js/profarma.js"></script>
<script src='<?php echo base_url();?>assets/js/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/knockout/3.4.0/knockout-debug.js'></script>
<script  src="<?php echo base_url() ?>assets/js/scripts.js"></script>

<script>
$(function() {
  // Initialize the daterangepicker with desired date format
  $(".daterangepicker-field").daterangepicker({
    dateFormat: 'mm/dd/yy' // Setting the desired date format
  });
});

var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';

$(function() {
  var start = moment().startOf('isoWeek'); // Start of the current week
  var end = moment().endOf('isoWeek'); // End of the current week
  var startOfLastWeek = moment().subtract(1, 'week').startOf('week'); // Start of last week
  var endOfLastWeek = moment().subtract(1, 'week').endOf('week').add(1, 'day'); // End of last week (with one extra day)

  // Function to update the date field
  function cb(start, end) {
    $('#daterangepicker-field').val(start.format('DD/MM/YYYY') + ' - ' + end.format('DD/MM/YYYY'));
  }

  // Initialize daterangepicker
  $('#daterangepicker-field').daterangepicker({
    startDate: start,
    endDate: end,
    ranges: {
      'Last 30 Days': [moment().subtract(29, 'days'), moment()],
      'Last 90 Days': [moment().subtract(89, 'days'), moment()],
      'Last Year': [moment().subtract(1, 'year').startOf('year'), moment().subtract(1, 'year').endOf('year')],
      'All Time': [moment().subtract(50, 'years'), moment()], // Example for 'All Time', adjust as needed
      'Custom Range': [moment().subtract(1, 'month'), moment()], // Default custom range (can be updated by user)
      'Last Week Before': [moment().subtract(2, 'week').startOf('week'), moment().subtract(2, 'week').endOf('week')],
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

    $('#printableArea').hide();
    $('#fetch_tax').submit(function (event) {
        event.preventDefault();
        initializeTable();
        var formData = $(this).serialize();

        $.ajax({
            type: "POST",
            dataType: "json",
            url: "<?php echo base_url('Chrm/state_tax_search_summary'); ?>",
            data: formData,
            success: function (response) {
                $('#printableArea').show();
                   if(($('#daterangepicker-field').val() !='')){
               $('#date_period_range').html("Pay Range : " +$('#daterangepicker-field').val());
              }
                $('#hidden_block').css('display', 'block');
                console.log(response);
                populateTable(response);
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
});

function initializeTable() {
    var printableArea = $("#printableArea");
    printableArea.empty();
    var tableHtml = `
     <div id='date_period_range' style='text-align: center;font-weight: bolder;font-size: x-large;color: #337ab7;'></div>
        <table class="table table-bordered" cellspacing="0" width="100%"   id="ProfarmaInvList">
            <thead></thead>
            <tbody></tbody>
            <tfoot></tfoot>
         </table>
    `;
    printableArea.append(tableHtml);
}

function populateTable(response) {
    var ProfarmaInvList = $("#ProfarmaInvList");

    // Destroy the DataTable if it exists
    if ($.fn.DataTable.isDataTable('#ProfarmaInvList')) {
        ProfarmaInvList.DataTable().clear().destroy();
    }

    ProfarmaInvList.find("thead, tbody, tfoot").empty(); // Clear table
    var hasEmployerContributions = Object.keys(response.employer_contribution).length > 0;
    var hasEmployeeContributions = Object.keys(response.employee_contribution).length > 0;

    if (!hasEmployerContributions && !hasEmployeeContributions) {
        ProfarmaInvList.find("tbody").append("<tr><td colspan='100%' style='text-align:center;'>No data found</td></tr>");
        ProfarmaInvList.DataTable(); // Initialize DataTable again
        return; // Stop execution here as there's no data
    }

    var allTaxTypes = {};
    var taxTypeCounts = {};

    // Collect unique tax codes from both employer and employee contributions
    Object.keys(response.employer_contribution).forEach(function (taxType) {
        response.employer_contribution[taxType].forEach(function (item) {
          var tax = item.tax ? item.tax.trim() : '';  
            var code = item.code ? item.code.trim() : '';  
            var taxKey = tax + "-" + code;
            allTaxTypes[taxKey] = item.taxType || ''; // Store tax type
            taxTypeCounts[taxKey] = (taxTypeCounts[taxKey] || 0) + 1; // Count occurrences
        });
    });

    Object.keys(response.employee_contribution).forEach(function (taxType) {
        response.employee_contribution[taxType].forEach(function (item) {
            var tax = item.tax ? item.tax.trim() : '';  
            var code = item.code ? item.code.trim() : '';  
            var taxKey = tax + "-" + code;
            allTaxTypes[taxKey] = item.taxType || '';
            taxTypeCounts[taxKey] = (taxTypeCounts[taxKey] || 0) + 1;
        });
    });

    var taxTypeMap = {};
    Object.keys(allTaxTypes).forEach(function (taxKey) {
        var taxType = allTaxTypes[taxKey];
        if (!taxTypeMap[taxType]) {
            taxTypeMap[taxType] = [];
        }
        taxTypeMap[taxType].push(taxKey);
    });

    if (Object.keys(taxTypeMap).length > 0) {
        // Create table headers dynamically
        var taxHeaders = "<tr class='btnclr'><th rowspan='2' style='border-bottom:none;text-align:center'>Employee Name</th><th rowspan='2' style='border-bottom:none;text-align:center'>Gross</th><th rowspan='2' style='border-bottom:none;text-align:center'>Net</th>";

        Object.keys(taxTypeMap).forEach(function (taxType) {
            var taxes = taxTypeMap[taxType];
            var displayTaxType = (taxType === "living_state_tax") ? "LIVING STATE TAX" : "WORKING STATE TAX";
            taxHeaders += "<th colspan='" + (2 * taxes.length) + "' style='text-align:center'>" + displayTaxType + "</th>";
        });

        taxHeaders += "</tr><tr class='btnclr'>";

        // Tax names and codes
        Object.keys(taxTypeMap).forEach(function (taxType) {
            var taxes = taxTypeMap[taxType];
            taxes.forEach(function (taxKey) {
                var taxName = taxKey.split('-')[0];
                var code = taxKey.split('-')[1];
                var changecode = code === 'PS' ? 'Pennsylvania' : code === 'ML' ? 'Maryland' : code === 'NJ' ? 'New Jersey' : 'New Jersey';
                taxHeaders += "<th colspan='2' style='text-align:center'>" + taxName + "-" + changecode + "</th>";
            });
        });

        taxHeaders += "</tr><tr class='btnclr'><th></th><th></th><th></th>";

        Object.keys(taxTypeMap).forEach(function (taxType) {
            var taxes = taxTypeMap[taxType];
            taxes.forEach(function () {
                taxHeaders += "<th style='text-align:center'>Employee Contribution</th><th style='text-align:center'>Employer Contribution</th>";
            });
        });

        taxHeaders += "</tr>";
        ProfarmaInvList.find("thead").append(taxHeaders);

        // Consolidate contributions by employee and tax
        var consolidatedContributions = {};
        var employeeGrossNet = {};
        var totalGross = 0; // Initialize total gross
        var totalNet = 0; // Initialize total net
        Object.keys(response.employer_contribution).forEach(function (taxType) {
            response.employer_contribution[taxType].forEach(function (item) {
                var employeeName = item.employee_name;
                var tax = item.tax ? item.tax.trim() : '';  
                var code = item.code ? item.code.trim() : '';  
                var taxKey = tax + "-" + code;
                if (!consolidatedContributions[employeeName]) {
                    consolidatedContributions[employeeName] = {};
                }
                if (!consolidatedContributions[employeeName][taxKey]) {
                    consolidatedContributions[employeeName][taxKey] = { employee: "0.00", employer: "0.00" };
                }
                consolidatedContributions[employeeName][taxKey].employer = parseFloat(item.total_amount).toFixed(3) || "0.00";
            });
        });

        var i = 0;
        Object.keys(response.employee_contribution).forEach(function (taxType) {
            response.employee_contribution[taxType].forEach(function (item) {
                var employeeName = item.employee_name;
                var tax = item.tax ? item.tax.trim() : '';  
                var code = item.code ? item.code.trim() : '';  
                var taxKey = tax + "-" + code;
                var employeeName = item.employee_name || 'Unknown'; // Handle possible null
                var totalDeduction = parseFloat(item.total_deduction) || 0; // Get total deduction
                var federalDeduction = parseFloat(item.federal_deduction) || 0; // Get federal deduction
                
                if (!consolidatedContributions[employeeName]) {
                    consolidatedContributions[employeeName] = {};
                }
                if (!consolidatedContributions[employeeName][taxKey]) {
                    consolidatedContributions[employeeName][taxKey] = { employee: "0.00", employer: "0.00" };
                }
                consolidatedContributions[employeeName][taxKey].employee = parseFloat(item.total_amount).toFixed(3) || "0.00";
                 // Store gross and net values
                if (!employeeGrossNet[employeeName]) {
                    var gross = parseFloat(item.gross) || 0; // Get gross income
                    var net = parseFloat(item.net) || 0; 
                    totalGross += gross;
                    totalNet += net;
                    employeeGrossNet[employeeName] = { gross: gross.toFixed(3), net: net.toFixed(3) };
                }
            });
        });

        // Populate rows for each employee
        var tbody = ProfarmaInvList.find("tbody");
        Object.keys(consolidatedContributions).forEach(function (employeeName) {
            var contributions = consolidatedContributions[employeeName];
            var row = $("<tr>");
            row.append("<td>" + employeeName + "</td>");
             row.append("<td>$" + (employeeGrossNet[employeeName] ? employeeGrossNet[employeeName].gross : "0.00") + "</td>"); // Gross
            row.append("<td>$" + (employeeGrossNet[employeeName] ? employeeGrossNet[employeeName].net : "0.00") + "</td>"); // Net
            Object.keys(taxTypeMap).forEach(function (taxType) {
                var taxes = taxTypeMap[taxType];
                taxes.forEach(function (taxKey) {
                    var taxData = contributions[taxKey] || { employee: "0.00", employer: "0.00" };
                    row.append("<td>$" + taxData.employee + "</td>");
                    row.append("<td>$" + taxData.employer + "</td>");
                });
            });

            tbody.append(row);
        });

        // Populate footer with total contributions
        var tfoot = ProfarmaInvList.find("tfoot");
       var footerRow = $("<tr class='btnclr'>").append("<td>Total</td><td>$" + totalGross.toFixed(3) + "</td><td>$" + totalNet.toFixed(3) + "</td>"); // Total gross and net

        Object.keys(taxTypeMap).forEach(function (taxType) {
            var taxes = taxTypeMap[taxType];
            taxes.forEach(function (taxKey) {
                var totalEmployeeContribution = 0;
                var totalEmployerContribution = 0;
                Object.keys(consolidatedContributions).forEach(function (employeeName) {
                    var contribution = consolidatedContributions[employeeName][taxKey];
                    if (contribution) {
                        totalEmployeeContribution += parseFloat(contribution.employee);
                        totalEmployerContribution += parseFloat(contribution.employer);
                    }
                });
                footerRow.append("<td>$" + totalEmployeeContribution.toFixed(3) + "</td>");
                footerRow.append("<td>$" + totalEmployerContribution.toFixed(3) + "</td>");
            });
        });

        tfoot.append(footerRow);
    } else {
        var columnCount = ProfarmaInvList.find("thead th").length;

        // Append "No data found" message
        ProfarmaInvList.find("tbody").append(
            "<tr style='border:none;'>" +
            "<td colspan='" + columnCount + "' style='width:2%;padding:20px;text-align:center;'>" +
            "<p style='text-align:center; margin:0; font-weight:bold;'>No data found</p>" +
            "</td>" +
            "</tr>"
        );
    }
    // Re-initialize DataTable
    ProfarmaInvList.DataTable();
}

// document.getElementById("btn").addEventListener("click", () => {
//   let table2excel = new Table2Excel();
//   table2excel.export(document.querySelector("#ProfarmaInvList"));
// });


function generateExcel(el) {
    var clon = el.clone();
    var html = clon.wrap('<div>').parent().html();

    //add more symbols if needed...
    while (html.indexOf('á') != -1) html = html.replace(/á/g, '&aacute;');
    while (html.indexOf('é') != -1) html = html.replace(/é/g, '&eacute;');
    while (html.indexOf('í') != -1) html = html.replace(/í/g, '&iacute;');
    while (html.indexOf('ó') != -1) html = html.replace(/ó/g, '&oacute;');
    while (html.indexOf('ú') != -1) html = html.replace(/ú/g, '&uacute;');
    while (html.indexOf('º') != -1) html = html.replace(/º/g, '&ordm;');
    html = html.replace(/<td>/g, "<td>&nbsp;");

    window.open('data:application/vnd.ms-excel,' + encodeURIComponent(html));
}
$("#download").click(function (event) {
 	generateExcel($("#ProfarmaInvList"));
});


// $(document).ready(function() {
//    if ($.fn.dataTable.isDataTable('#ProfarmaInvList')) {
//       $('#ProfarmaInvList').DataTable().destroy();
//    }
//    $('#ProfarmaInvList').DataTable();
// }); 
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
    left: 900px !important;
    bottom: 68px !important;
   }
</style>
