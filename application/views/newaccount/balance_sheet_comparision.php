<?php  error_reporting(1); ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
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

   .table_boxnew {
   width: 80%; /* Adjust the width as needed */
   margin: 0 auto; /* Center the table horizontally */
   border-collapse: collapse;
   }
   .table_boxnew th, .table_boxnew td {
   border: 1px solid #ddd;
   padding: 8px;
   text-align: center; /* Center-align table content */
   }
   thead {
   background-color: #333;
   color: #fff;
   text-align: center;
   }
   thead th {
   padding: 10px;
   border: 1px solid #000;
   }
   tbody td {
   padding: 10px;
   border: 1px solid #000;
   text-align: center;
   }
   .table_boxnew th {
   background-color: #f2f2f2;
   font-weight: bold;
   }
   /* Styling for the total liabilities and total assets */
   .bsb_2px {
   font-weight: bold;
   }
   /* Reduce the height of the h2 element */
   .statement {
   font-size: 20px; /* Adjust the font size as needed */
   margin: 0; /* Remove any default margins */
   padding: 5px 0; /* Adjust the padding to reduce height */
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
    width: 225px;
  }
}
</style>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/balance_sheet.css" />








<div class="content-wrapper">
   <section class="content-header">
      <div class="header-icon">
         <figure class="one">
               <img src="<?php echo base_url()  ?>asset/images/balacesheetcom.png"  class="headshotphoto" style="height:50px;" />
      </div>
      
      
      
       <div class="header-title">
          <div class="logo-holder logo-9">
         <h1><?php echo "Balance Sheet Comparision"; ?></h1>
       </div>
      
          <small><?php //echo "Vocher Report"; ?></small>
         <ol class="breadcrumb">
            <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
            <li><a href="#"><?php echo "Accounts"; ?></a></li>
            <li class="active" style="color:orange;"><?php echo "Balance Sheet Comparision"; ?></li>
        
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
     
 

      <div class="row">
         <div class="col-sm-12 col-md-12">
            <div class="panel panel-bd lobidrag"      style="border:3px solid #d7d4d6;"    >
               <div class="panel-body" style='height:60px;'>
                  <div class="row" id="">
                     <div class="col-sm-12" style='height:10px;'>
                        <div class="col-sm-5"></div>
                        <?php echo form_open_multipart('accounts/balance_sheet_compare', array('class' => 'form-vertical', 'id' => 'insert_sale', 'name' => 'insert_sale')) ?>
                        <?php
                           $today = date('Y-m-d');
                           ?>            
                        <div class="col-sm-4 form-group" style="display: inline-block; vertical-align: middle;">
                           <!-- <div class="form-group row"     style="width: 300px;"> -->
                           <input type="text" class="form-control daterangepicker-field" name="daterangepicker-field"
                              style="padding: 5px;width: 200px;border-radius: 8px;height: inherit;"/>
                           <button type="submit" class="btn btnclr dropdown-toggle" style="margin-bottom: 10px;" ><i class="fa fa-search-plus" aria-hidden="true"></i> <?php echo display('search') ?></button> 
                        </div>
                        <div class='col-sm-2' style='text-align:end;'>
                           <div class="dropdown bootcol" id="drop" style="    width: 300px;">
                              <button class="btnclr btn btn-default dropdown-toggle" type="button"   id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              <span class="fa fa-download"></span> <?php echo display('download') ?>
                              </button>
                              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                 <li><a href="#" onclick="generate()"> <img src="<?php echo base_url() ?>assets/images/pdf.png" width="24px"> <?php echo display('PDF') ?></a></li>
                                 <li class="divider"></li>
                                 <li><a href="#" onclick="fnExcelReport()"> <img src="<?php echo base_url() ?>assets/images/xls.png" width="24px"> <?php echo display('XLS') ?></a></li>
                              </ul>
                              &nbsp;
                              <button type="button"   class="btnclr btn btn-default dropdown-toggle"  onclick="printDiv('printableArea')"><b class="ti-printer"></b>&nbsp;<?php echo display('print') ?></button>
                           </div>
                        </div>
                        <?php echo form_close() ?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <div class="row">
         <div class="col-sm-12 col-md-12">
            <style>
               .table_boxnew td {
               font-size: 15px;
               padding: 10px; /* Increase the padding as needed */
               }
               .statement {
               font-size: 18px;
               font-weight: bold;
               }
               .table-content {
               font-size: 15px; /* Custom font size for table content */
               }
               .table-container {
               overflow-x: auto; /* Add horizontal scrolling */
               max-width: 100%; /* Ensure the container is responsive */
               }
               .hide-row {
               display: none;
               }
               table.table_boxnew td:first-child {
               border: none;
               background-color:none;
               }
               .toggle-button {
               cursor: pointer;
               color: blue; /* Change color as desired */
               }
            </style>
            <div class="panel panel-bd lobidrag" id="printableArea" style="border: 3px solid #d7d4d6;" >
               <div class="panel-body">
                     
                     <div class="table-container" id='invoice_wrapper'>
                        <div style='font-weight:bold;text-align:center;' class="statement">
                     </div>
                    <div class="sortableTable__container">
                        <div class="sortableTable__discard">
                        </div>

                        <tr>
                            <td style='height:10px;padding: 0px;' colspan="3" align="center">
                                <h2 class="statement" style="    text-align: center;border: 1px solid black; height: 60px; padding: 25px;    font-size: x-large;font-weight: 300;"   ><?php echo "Balance Sheet Comparision"; ?> </h2>
                            </td>
                        </tr>
                        <br>
                        <table width="80%" class="table_boxnew" id='ProfarmaInvList' style='text-align:center;' cellpadding="0" cellspacing="0">
                        <thead class="sortableTable">
                           <tr class="sortableTable__header">
                              <th  style='border:none;' class=" btnclr cashflowparticular 1 value" data-col="1">
                              </th>
                              <th  class="btnclr cashflowparticular 2 value" data-col="2">
                                 <b><?php echo display('particulars');?></b>
                              </th>
                              <?php foreach ($results as $year => $amount) { ?>
                              <th class="btnclr 3 value" style='font-weight:bold;' data-col="3"><?php echo $year; ?></th>
                              <?php } ?>
                           </tr>
                           </thead>
                           <tbody class="sortableTable__body" id="tab">
                           <?php  foreach ($balance_comparision as $category => $subcategories): if (!empty($category)): ?>
                           <tr class="parent-row" style="cursor: pointer;" >
                              <td style='border:none' class="1 value" data-col="1"> <span class="toggle-arrow">▼</span></td>
                              <td style='text-align:center;border-left: none;' class="2 value" data-col=2>
                                 <span class="category-title"><?php echo $category; ?></span>
                              </td>
                              <?php foreach ($results as $year => $amount) { ?>
                              <td class="3 value" data-col="3"></td>
                              <?php } ?>
                           </tr>
                           <?php foreach ($subcategories['subcategories'] as $subCategory => $arecTrade): ?>
                           <tr class="child-row">
                              <td colspan='2' style='text-align:end;' class="1 value" data-col=1><?php echo $subCategory; ?></td>
                              <?php foreach ($results as $year => $amount) { ?>
                              <td class="paddingleft10px text-right bsp_10 2 value" data-col=2>
                                 <?php
                                    if (isset($arecTrade[$year])) {
                                        echo $currency.number_format($arecTrade[$year], 2, '.', '');
                                    } else {
                                        echo '0.00';
                                    }
                                    ?>
                              </td>
                              <?php } ?>
                           </tr>
                           <?php endforeach; ?>
                           <?php endif; endforeach;  ?>
                           <?php   if(!empty($balance_comparision[$category]['subcategories'])){ ?>
                           <!-- Add a row to display the sum amounts -->
                           <tr class="">
                              <td colspan='2' style='text-align:end;font-weight:bold;' class="1 value" data-col="1">Total</td>
                              <?php foreach ($results as $year => $amount) { ?>
                              <td style='font-weight:bold;' class="2 value" data-col="2">
                                 <?php
                                    $sum = 0;
                                    foreach ($balance_comparision as $category => $subcategories) {
                                        if (!empty($category)) {
                                            foreach ($subcategories['subcategories'] as $subCategory => $arecTrade) {
                                                if (isset($arecTrade[$year])) {
                                                    $sum += $arecTrade[$year];
                                                }
                                            }
                                        }
                                    }
                                    echo  $currency.number_format($sum, 2, '.', '');
                                    ?>
                              </td>
                              <?php } ?>
                           </tr>
                           <?php } ?>
                           <!-- Contents of the second table -->
                           <tr class="parent-row initially-visible important-row">
                              <td style='border:none;backgroud-color:white;' class="1 value" data-col="1"> <span class="toggle-arrow">▼</span></td>
                              <td style='border-left: none;' class="2 value" data-col="2">
                                 <span class="category-title"><?php echo 'Accounts Receivable (A/R)'; ?></span>
                              </td>
                              <?php foreach ($results as $year => $amount) { ?>
                              <td class="paddingleft10px text-right bsp_10">
                                 <?php echo  $currency.number_format($amount, 2, '.', ''); ?>
                              </td>
                              <?php } ?>
                           </tr>
                           <tr class="hidden-row initially-visible">
                              <td colspan='2' style='text-align:end' class="toggle paddingleft10px text-right bsp_10 1 value" data-col="1">
                                 <b><?php echo 'Total Accounts Receivable' ?></b>
                              </td>
                              <?php foreach ($results as $year => $amount) { ?>
                              <td class="paddingleft10px text-right bsp_10 2 value" data-col="2">
                                 <b><?php echo  $currency.number_format($amount, 2, '.', ''); ?></b>
                              </td>
                              <?php } ?>
                           </tr>
                           <tr class="parent-row initially-visible important-row">
                              <td style='border:none;backgroud-color:white;' class="1 value" data-col="1">  <span class="toggle-arrow">▼</span></td>
                              <td style='border-left: none;' class="2 value" data-col="2">
                                 <span class="category-title"><?php echo 'Accounts Payable (A/P)'; ?></span>
                              </td>
                              <?php foreach ($summed_values as $year => $amount) { ?>
                              <td class="paddingleft10px text-right bsp_10 3 value" data-col="1">
                                 <?php echo  $currency.number_format($amount, 2, '.', ''); ?>
                              </td>
                              <?php } ?>
                           </tr>
                           <tr class="hidden-row initially-visible">
                              <td colspan='2' style='text-align:end' class="toggle paddingleft10px text-right bsp_10" class="1 value" data-col="1">
                                 <b><?php echo 'Total Accounts Payable'; ?></b>
                              </td>
                              <?php foreach ($summed_values as $year => $amount) { ?>
                              <td class="paddingleft10px text-right bsp_10 2 value" data-col="2">
                                 <b><?php echo  $currency.number_format($amount, 2, '.', ''); ?></b>
                              </td>
                              <?php } ?>
                           </tr>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.71/pdfmake.min.js"></script>
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
   <script  src="<?php echo base_url() ?>my-assets/js/script.js"></script>
   <script src="<?php echo base_url()?>assets/js/jquery.bootgrid.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.0.0-alpha.1/jspdf.plugin.autotable.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/exceljs/4.1.1/excel.min.js"></script>
   <script>
      function printDiv(divId) {
      var divToPrint = document.getElementById(divId);
      var htmlToPrint = '' +
          '<style type="text/css">' +
          'table th, table td {' +
          'border:1px solid #000;' +
          'padding:0.5em;' +
          '}' +
          '</style>';
      htmlToPrint += divToPrint.outerHTML;
      newWin = window.open("");
      newWin.document.write(htmlToPrint);
      newWin.print();
      newWin.close();
      }
      
      document.getElementById("download_xls_button").addEventListener("click", function (event) {
      event.preventDefault();
      var table = document.querySelector("#invoice_wrapper table");
      var wb = XLSX.utils.book_new();
      var ws = XLSX.utils.aoa_to_sheet([]);
      
      for (var i = 0; i < table.rows.length; i++) {
          var row = table.rows[i];
          if (!row.classList.contains("toggle")) {
              var rowData = [];
              for (var j = 0; j < row.cells.length; j++) {
                  var cell = row.cells[j];
                  if (cell.hasAttribute("colspan")) {
                      var colspan = parseInt(cell.getAttribute("colspan"));
                      for (var c = 0; c < colspan; c++) {
                          if (j === 0) {
                              rowData.push(cell.textContent); // Copy text to the second column
                          } else {
                              rowData.push(cell.textContent);
                          }
                      }
                  } else {
                      rowData.push(cell.textContent);
                  }
              }
              XLSX.utils.sheet_add_aoa(ws, [rowData], { origin: -1 });
          }
      }
      
      XLSX.utils.book_append_sheet(wb, ws, "Sheet 1");
      XLSX.writeFile(wb, "invoice.xlsx");
      });
      $(function () {
      'use strict';
      
      /**
       * Generating JPEG image from HTML using jQuery
       */
      $(document).on('click', '#invoice_download_btn', function (event) {
          event.preventDefault(); // Prevent the default behavior (page refresh)
      
          const element = document.getElementById("invoice_wrapper");
      
          // Clone the element to manipulate the clone
          const cloneElement = element.cloneNode(true);
      
          // Change display of cloned element
          $(cloneElement).css("display", "block");
      
          // Function to check if an element has the class "toggle-arrow"
          function hasToggleArrowClass(element) {
              return $(element).hasClass("toggle-arrow");
          }
      
          // Filter out elements with the class "toggle-arrow" from the clone
          $(cloneElement)
              .find(".toggle-arrow")
              .remove();
               $(cloneElement)
              .find("#hidden")
              .remove();
      
          var opt = {
              margin: [10, 20, 10, 10], // Adjust this value as needed
              filename: 'invoice.pdf',
               title: 'Your Static Title Here', // Set your static title
              image: { type: 'jpeg', quality: 0.98 },
              html2canvas: { scale: 3 },
              jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
          };
      
          var pdf = new jsPDF(opt.jsPDF);
      
          // Add static title at the top center
          pdf.setFontSize(15); // Adjust font size as needed
       
      
          html2pdf().from(cloneElement).set(opt).toPdf(pdf).output('blob').then(function (blob) {
              var url = URL.createObjectURL(blob);
              var a = document.createElement('a');
              a.href = url;
              a.download = opt.filename;
              document.body.appendChild(a);
              a.click();
              window.URL.revokeObjectURL(url);
          });
      });
      });
      
      
      $(document).ready(function() {
      $(".category").click(function() {
          $(this).next(".subcategory").toggle();
          $(this).find(".toggle-arrow").text(function(_, text) {
              return text === "▶" ? "▼" : "▶";
          });
      });
      });
      $(document).ready(function() {
      // Initially hide all rows with the "hide-row" class except those with "initially-visible"
      $('.hide-row:not(.initially-visible)').hide();
      
      // Toggle rows when clicking on the parent row
      $(".parent-row").click(function() {
          if (!$(this).hasClass('important-row')) {
              $(this).nextUntil(".parent-row").toggleClass('hide-row'); // Toggle the "hide-row" class
      
              // Toggle the arrow icon (▶ or ▼)
              $(this).find(".toggle-arrow").text(function(_, text) {
                  return text === "▶" ? "▼" : "▶";
              });
          }
      });
      });
      $(document).ready(function() {
      // Initialize the date range picker
      $('input[name="daterangepicker-field"]').daterangepicker();
      
      // Get the default start and end dates
      var defaultStartDate = <?php if (empty($from_date)) { echo 'moment().subtract(1, "year")'; } else { echo 'moment("'.$from_date.'")'; } ?>;
      var defaultEndDate = <?php echo 'moment("'.$to_date.'")'; ?>;
      
      // Set the default date range
      $('input[name="daterangepicker-field"]').data('daterangepicker').setStartDate(defaultStartDate);
      $('input[name="daterangepicker-field"]').data('daterangepicker').setEndDate(defaultEndDate);
      });
   </script>
   
   
   <!--<script type="text/javascript">-->
   <!--      $(document).ready(function() {-->
   <!--      function storeVisibilityState() {-->
   <!--         var bankbalancelistvisibilityStates = {};-->
   <!--         $("#ProfarmaInvList tr").each(function(index, element) {-->
   <!--             var row = $(element);-->
   <!--             var rowID = index;-->
   <!--             var isVisible = row.is(':visible');-->
   <!--             bankbalancelistvisibilityStates[rowID] = isVisible;-->
   <!--         });-->
            
   <!--         localStorage.setItem("bankbalancelistvisibilityStates", JSON.stringify(bankbalancelistvisibilityStates));-->
   <!--      }-->
         
   <!--      function applyVisibilityState() {-->
   <!--         var storedVisibilityStates = JSON.parse(localStorage.getItem("bankbalancelistvisibilityStates")) || {};-->
   <!--         $("#ProfarmaInvList tr").each(function(index, element) {-->
   <!--             var row = $(element);-->
   <!--             var rowID = index;-->
   <!--             if (storedVisibilityStates.hasOwnProperty(rowID) && !storedVisibilityStates[rowID]) {-->
   <!--                 row.hide();-->
   <!--             } else {-->
   <!--                 row.show();-->
   <!--             }-->
   <!--         });-->
   <!--      }-->
         
   <!--      $(".bank_edit").on('click', function() {-->
   <!--         var row = $(this);-->
   <!--         row.toggle();-->
   <!--         storeVisibilityState(); -->
   <!--      });-->
   <!--      applyVisibilityState(); -->
   <!--      });-->
         
        
   <!--   </script>-->
</div>