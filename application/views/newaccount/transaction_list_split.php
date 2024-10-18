<?php  error_reporting(1); ?>

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
tbody tr:nth-child(even) {
    background-color: #f2f2f2;
}

tbody tr:hover {
    background-color: #ddd;
}

tbody td {
    padding: 10px;
    border: 1px solid #000;
    text-align: center;
}
th{
    text-align:center;
    padding:10px !important;
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
    <section class="content-header">
        <div class="header-icon">
            
            <figure class="one">
               <img src="<?php echo base_url()  ?>asset/images/transactionlistsplit.png"  class="headshotphoto" style="height:50px;" />
      </div>

          <div class="header-title">
          <div class="logo-holder logo-9">
          <h1><?php echo "Transaction List Split"; ?></h1>
       </div>

         <small><?php echo ""; ?></small>
         <ol class="breadcrumb"   style=" border: 3px solid #d7d4d6;"   >
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo "Accounts"; ?></a></li>
                <li class="active" style="color:orange;"><?php echo "Transaction List Split"; ?></li>
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
        <div class="panel panel-bd lobidrag" style=" border: 3px solid #d7d4d6;">
       
            <div class="panel-body" style='height:60px;'>

                <div class="row" id="">
                      <div class="col-sm-12" style='height:10px;'>
                    <div class="col-sm-5"></div>
    <?php echo form_open_multipart('accounts/transaction_split', array('class' => 'form-vertical', 'id' => 'insert_sale', 'name' => 'insert_sale')) ?>
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
        </ul>&nbsp;
      
       
        
 
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
	
				
				
				
        <div class="panel panel-bd lobidrag" id="printableArea" style="border: 3px solid #d7d4d6;" >
            <div class="panel-body">
                <div class="">
     <table class="print-table " width="100%">

                      
                        <tr>
                            <td style='height:10px;padding: 0px;' colspan="3" align="center">
                                <h2 class="statement"><?php echo "Transaction List Split"; ?> </h2>
                            </td>
                        </tr>
                        <?php // print_r($start); 
                        if($start){ ?>
                        <tr class="table_head">
                            <td colspan="3" align="center"  style='border:none;background-color:white;' class="equivalent"><b>From
                                    <?php echo html_escape($start); ?> To
                                    <?php echo html_escape($end); ?></b></td>
                        </tr>
                        <?php  } ?>
                    </table>
       <table width="80%" class="table_boxnew table-bordered"  id='ProfarmaInvList'  style='text-align:center;border:none;border: 3px solid #d7d4d6;' cellpadding="0" cellspacing="0">
    <thead>
             <td style='background-color:white;'></td>
 
             <th class="btnclr" >Date</th>
            <th class="btnclr">Transaction Type</th>
            <th class="btnclr">Num</th>
            <th class="btnclr">Name</th>
            <th class="btnclr">Description</th>
            <th class="btnclr">Account Category</th>
            <th class="btnclr">Sub Category</th>
            <th class="btnclr">Amount</th>
        </tr>
    </thead>
    <tbody>
        <?php
       // print_r($exp_serv);
        // Sort the $sales array by invoice number
        if ($sales) {
            // Sort the $sales array by invoice number
             usort($sales, function ($a, $b) {
        $invoiceNumberA = $a->commercial_invoice_number;
        $invoiceNumberB = $b->commercial_invoice_number;

        return strnatcmp($invoiceNumberA, $invoiceNumberB);
    });

            $previousInvoiceNumber = '';

            foreach ($sales as $sale):
                $invoiceNumber = $sale->commercial_invoice_number;

                // Check if the invoice number has changed
                if ($invoiceNumber !== $previousInvoiceNumber) {
                    // Close the previous table row (if any)
                    if ($previousInvoiceNumber !== '') {
                        echo '</tr>';
                    }

                    // Start a new table row for general information
                    echo '<tr class="invoice-info">';
                    echo '<td style="border:none;"><span class="toggle-arrow" data-invoice-number="' . $invoiceNumber . '">▼</span></td>';
                    echo '<td>' . $sale->date . '</td>';
                    echo '<td>' . 'Invoice' . '</td>';
                    echo '<td>' . $invoiceNumber . '</td>';
                    echo '<td>' . $sale->customer_name . '</td>';

                    // Add a toggle arrow in the last cell of the row
                    echo '<td colspan="5" style="text-align:center;font-weight:bold;" class="sum_amount"><span>Total Amount : </span>' . $currency . $sale->gtotal . '</td>'; // Add data-invoice-number attribute
                    echo '</tr>';

                    // Create a hidden table row for invoice details
                    echo '<tr class="invoice-details" style="display: table-row;">'; // Initially visible
                }

                // Split the description, sub_category, and amount into separate rows within the details row
                echo '<tr class="invoice-details" style="display: table-row;">';
                echo '<td style="border:none;background-color:white;"></td>'; // Empty cell for spacing
                echo '<td></td>'; // Empty cell for spacing
                echo '<td></td>'; // Empty cell for spacing
                echo '<td></td>'; // Empty cell for spacing
                echo '<td></td>'; // Empty cell for spacing
                echo '<td style="word-wrap: break-word;max-width: 300px;">' . ($sale->description ?: 'N/A') . '</td>';
                echo '<td>' . ($sale->account_category ?: 'N/A') . '</td>'; // Account Category
                echo '<td>' . ($sale->sub_category ?: 'N/A') . '</td>';
                echo '<td>' . (is_numeric($sale->total_price) ? $currency . $sale->total_price : 'N/A') . '</td>';

                echo '</tr>';

                // Update the previous invoice number
                $previousInvoiceNumber = $invoiceNumber;
            endforeach;

            // Close the final table row (if any)
            if ($previousInvoiceNumber !== '') {
                echo '</tr>';
            }
        }

        if ($expense) {
           usort($expense, function ($a, $b) {
        $chalanNoA = $a->chalan_no;
        $chalanNoB = $b->chalan_no;

        return strnatcmp($chalanNoA, $chalanNoB);
    });

            $previousChalanNo = '';

            foreach ($expense as $sale):
                $chalanNo = $sale->chalan_no;

                // Check if the chalan_no has changed
                if ($chalanNo !== $previousChalanNo) {
                    // Close the previous table row (if any)
                    if ($previousChalanNo !== '') {
                        echo '</tr>';
                    }

                    // Start a new table row for general information
                    echo '<tr class="invoice-info">';
                    echo '<td style="border:none;"><span class="toggle-arrow" data-chalan-no="' . $chalanNo . '">▼</span></td>';
                    echo '<td>' . $sale->purchase_date . '</td>';
                    echo '<td>' . 'Bill' . '</td>';
                    echo '<td>' . $chalanNo . '</td>';
                    echo '<td>' . $sale->supplier_name . '</td>';

                    // Add a toggle arrow in the last cell of the row
                    echo '<td colspan="5" style="text-align:center;font-weight:bold;" class="sum_amount"><span>Total Amount : </span>' . $currency . $sale->grand_total_amount . '</td>'; // Add data-chalan-no attribute
                    echo '</tr>';

                    // Create a hidden table row for invoice details
                    echo '<tr class="invoice-details" style="display: table-row;">'; // Initially visible
                }

                // Split the description, sub_category, and amount into separate rows within the details row
                echo '<tr class="invoice-details" style="display: table-row;">';
                echo '<td style="border:none;background-color:white;"></td>'; // Empty cell for spacing
                echo '<td></td>'; // Empty cell for spacing
                echo '<td></td>'; // Empty cell for spacing
                echo '<td></td>'; // Empty cell for spacing
                echo '<td></td>'; // Empty cell for spacing
                echo '<td style="word-wrap: break-word;max-width: 300px;">' . ($sale->description ?: 'N/A') . '</td>';
                echo '<td>' . ($sale->account_category ?: 'N/A') . '</td>'; // Account Category
                echo '<td>' . ($sale->sub_category ?: 'N/A') . '</td>';
                echo '<td>' . (is_numeric($sale->total) ? $currency . $sale->total : 'N/A') . '</td>';

                echo '</tr>';

                // Update the previous chalan_no
                $previousChalanNo = $chalanNo;
            endforeach;

            // Close the final table row (if any)
            if ($previousChalanNo !== '') {
                echo '</tr>';
            }
        }
             if ($exp_serv) {
           usort($exp_serv, function ($a, $b) {
        $chalanNoA = $a->bill_number;
        $chalanNoB = $b->bill_number;

        return strnatcmp($chalanNoA, $chalanNoB);
    });

            $previousChalanNo = '';

            foreach ($exp_serv as $sale):
                $chalanNo = $sale->bill_number;

                // Check if the chalan_no has changed
                if ($chalanNo !== $previousChalanNo) {
                    // Close the previous table row (if any)
                    if ($previousChalanNo !== '') {
                        echo '</tr>';
                    }

                    // Start a new table row for general information
                    echo '<tr class="invoice-info">';
                    echo '<td style="border:none;"><span class="toggle-arrow" data-chalan-no="' . $chalanNo . '">▼</span></td>';
                    echo '<td>' . $sale->bill_date . '</td>';
                    echo '<td>' . 'Bill' . '</td>';
                    echo '<td>' . $chalanNo . '</td>';
                    echo '<td>' . $sale->service_provider_name . '</td>';

                    // Add a toggle arrow in the last cell of the row
                    echo '<td colspan="5" style="text-align:center;font-weight:bold;" class="sum_amount"><span>Total Amount : </span>' . $currency . $sale->gtotals . '</td>'; // Add data-chalan-no attribute
                    echo '</tr>';

                    // Create a hidden table row for invoice details
                    echo '<tr class="invoice-details" style="display: table-row;">'; // Initially visible
                }

                // Split the description, sub_category, and amount into separate rows within the details row
                echo '<tr class="invoice-details" style="display: table-row;">';
                echo '<td style="border:none;background-color:white;"></td>'; // Empty cell for spacing
                echo '<td></td>'; // Empty cell for spacing
                echo '<td></td>'; // Empty cell for spacing
                echo '<td></td>'; // Empty cell for spacing
                echo '<td></td>'; // Empty cell for spacing
                echo '<td style="word-wrap: break-word;max-width: 300px;">' . ($sale->description ?: 'N/A') . '</td>';
                echo '<td>' . ($sale->acc_cat_name ?: 'N/A') . '</td>'; // Account Category
                echo '<td>' . ($sale->acc_cat ?: 'N/A') . '</td>';
                echo '<td>' . (is_numeric($sale->total_price) ? $currency . $sale->total_price : 'N/A') . '</td>';

                echo '</tr>';

                // Update the previous chalan_no
                $previousChalanNo = $chalanNo;
            endforeach;

            // Close the final table row (if any)
            if ($previousChalanNo !== '') {
                echo '</tr>';
            }
        }
        ?>
    </tbody>
</table>

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
<script src="https://cdn.jsdelivr.net/g/filesaver.js/1.3.8/FileSaver.min.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery.bootgrid.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.0.0-alpha.1/jspdf.plugin.autotable.js"></script>
 <script type="text/javascript" src="<?php echo base_url()?>my-assets/js/profarma.js"></script>

<script>
 $(document).ready(function() {
    // Calculate the sum amount for each invoice


    // Toggle details on arrow click
  $(".toggle-arrow").click(function() {
        var invoiceInfoRow = $(this).closest("tr.invoice-info");
        var invoiceDetailsRows = invoiceInfoRow.nextUntil(":not(.invoice-details)");
        invoiceDetailsRows.toggle();

        // Toggle the arrow direction
        if (invoiceDetailsRows.is(":visible")) {
            $(this).text("▼");
        } else {
            $(this).text("▲");
        }
    });
});
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
function fnExcelReport() {
  // Clone the table and manipulate the cloned table
  var table = $('#ProfarmaInvList').clone();
  var hyperLinks = table.find('a');
  var tab_text = "<table border='2px'><tr bgcolor='#87AFC6'>";

  // Use table.rows.length since it's a cloned table
  for (var j = 0; j < table[0].rows.length; j++) {
    var sp = $(hyperLinks[j]).text();
    tab_text = tab_text + table[0].rows[j].innerHTML + "</tr>";
    console.log(sp);
  }

  tab_text = tab_text + "</table>";
  tab_text = tab_text.replace(/<a[^>]*>/g, "");
  tab_text = tab_text.replace(/<A[^>]*>|<\/A>/g, "");
  tab_text = tab_text.replace(/<img[^>]*>/gi, "");
  tab_text = tab_text.replace(/<input[^>]*>|<\/input>/gi, "");

  // Create a Blob from the HTML table content
  var blob = new Blob([tab_text], { type: "application/vnd.ms-excel" });

  // Trigger the download using FileSaver.js
  saveAs(blob, "ExcelReport.xls");
}

    </script>
</section>
</div>





