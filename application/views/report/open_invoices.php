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

a:link, a:visited {
    color: black;
  
}
#pagesControllers{
    padding:20px;
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
               <img src="<?php echo base_url()  ?>asset/images/debtor.png"  class="headshotphoto" style="height:50px;" />
      </div>

          <div class="header-title">
          <div class="logo-holder logo-9">
          <h1><?php echo 'Unpaid Invoices' ?></h1>
       </div>
        
          
          
          
          
            <small><?php //echo display('user_wise_sale_report') ?></small>
            <ol class="breadcrumb"   style=" border: 3px solid #d7d4d6;"   >
                <li><a href="<?php echo base_url()?>"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('report') ?></a></li>
                <li class="active" style="color:orange"><?php echo 'Unpaid Invoices';?></li>
                <div class="load-wrapp">
       <div class="load-10">
         <div class="bar"></div>
       </div>
       </div>
           
            </ol>
        </div>
    </section>
<script>

    </script>
    <section class="content">


        <div class="row">
         
        </div>

        <!-- Sales report -->
       
                    <?php  
                       
                                 $commercial_invoice_number  = array();
                                 foreach ($customer_name as $invoice) {
                                 $commercial_invoice_number [] = $invoice['customer_name'];
                                 }
                                 $unique_commercial_invoice_number = array_unique($commercial_invoice_number);
                                 
                                 
                                 $container_no = array();
                                 foreach ($invoices as $invoice) {
                                 $container_no[] = $invoice['container_no'];
                                 }
                                 $unique_container_no = array_unique($container_no);
                                 
                                 
                                 $customer_name = array();
                                 foreach ($invoices as $invoice) {
                                 $customer_name[] = $invoice['customer_name'];
                                 }
                                 $unique_customer_name = array_unique($customer_name);
                                 
                                 
                                 $date = array();
                                 foreach ($invoices as $invoice) {
                                 $date[] = $invoice['date'];
                                 }
                                 $unique_date = array_unique($date);
                                 
                                 $payment_terms = array();
                                 foreach ($invoices as $invoice) {
                                    print_r($invoice);
                                 $payment_terms[] = $invoice['pterms'];
                                 }
                                 $unique_payment_terms = array_unique($payment_terms);
                    ?>
                        <?php //echo form_open('Admin_dashboard/user_sales_report', array('class' => 'form-inline', 'method' => 'get')) ?>
   <div class="row">
   <div class="col-sm-16 col-md-14">
                <div class="panel panel-bd lobidrag"   style="border: 3px solid #d7d4d6;height:80px;" >
                    <div class='col-sm-8'>
                         <table class="table" align="center">
               
                     <tr style='text-align:center;font-weight:bold;' class="filters">
                     <td style='width:200px;'></td>
                    <td style='width:200px;' class="search_dropdown">
   <span><?php echo 'Customer Name'; ?></span>
   <select style='width:200px;' id="customer-name-filter" class="form-control">
      <option value="Any">Any</option>
      <?php
      foreach ($unique_commercial_invoice_number as $invoice) {
      ?>
         <option value="<?php echo $invoice; ?>"><?php echo $invoice; ?></option>
      <?php } ?>
   </select>
      </td>
                        
                       <td class="search_dropdown" style="width: 22%; color: black;">
   <span>Payment Details</span>
   <select id="payment-details-filter" class="form-control">
      <option value="Any">Any</option>
      <option value="Paid">Paid</option>
      <option value="Partially Paid">Partially Paid</option>
      <option value="Not Paid">Not Paid</option>
   </select>
</td>
 
   <td class="search_dropdown" style="width: 15%;color: black;">
                         <div id="datepicker-container">
                         
                        
    <input type="text" class="form-control daterangepicker-field" id="daterangepicker-field" name="daterangepicker-field" style="margin-top: 15px;padding: 5px; width: 175px; border-radius: 8px; height: 35px;" />
</div>
                        </td>
               <td><input type='submit' class="btn btnclr" style='color:white;margin-top: 15px;' value='submit' id='submit_btn'/></td>
           
                              </tr>
      </table></div>
         <div class='col-sm-2'>
                  <div class="dropdown bootcol" id="drop" style="    width: 300px;">
                     <button class="btnclr btn btn-default dropdown-toggle" type="button"  style="margin-top: 20px;
    margin-left: 120px;float:left;" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                     <span class="fa fa-download"></span> <?php echo display('download') ?>
                     </button>
                     <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li><a href="#" onclick="generate()"> <img src="<?php echo base_url() ?>assets/images/pdf.png" width="24px"> <?php echo display('PDF') ?></a></li>
                        <li class="divider"></li>
                        <li><a href="#" onclick="$('#ProfarmaInvList').tableExport({type:'excel',escape:'false'});"> <img src="<?php echo base_url() ?>assets/images/xls.png" width="24px"> <?php echo display('XLS') ?></a></li>
                     </ul>
                     &nbsp;
                     <button type="button"   class="btnclr btn btn-default dropdown-toggle"  onclick="printDiv('printableArea')"><b class="ti-printer"></b>&nbsp;<?php echo display('print') ?></button>
                  </div>
               </div>
</div></div></div>
                        <?php //echo form_close() ?>
                  

 


        <!-- Manage Invoice report -->
     
   
                <div class="row">
         <div class="col-sm-16 col-md-14">
            <div class="panel panel-bd lobidrag" id="printableArea"   style="border: 3px solid #d7d4d6;" >
               <div class="panel-body">
                   <div class="sortableTable__container">
                    <div class="sortableTable__discard">
                    </div>








            <!-- <table class="table table-bordered" cellspacing="0" width="100%" >        -->
   <table class="table table-bordered" cellspacing="0" width="100%" id="ProfarmaInvList" >
                           <thead class="sortableTable">
                              <tr  class="sortableTable__header btnclr">
                                <th class="2 value"  data-col="2"    style="height: 45.0114px; width: 234.011px; text-align:center; " > <?php echo display('Invoice No')?></th>
                                <th class="4 value" data-col="4"    style="width: 198.011px; text-align:center;"       ><?php echo display('Sales Invoice date')?></th>
 <th class="7 value" data-col="7" data-resizable-column-id="7"    style="width: 198.011px; text-align:center;"       ><?php echo display('Grand Total')?></th>
  <th class="16 value" data-col="16" data-resizable-column-id="16"    style="width: 198.011px; text-align:center;"       ><?php echo 'Customer Name ';?></th>
  <th class="16 value" data-col="16" data-resizable-column-id="16"    style="width: 198.011px; text-align:center;"       ><?php echo 'Payment Due Date';?></th>
    <th class="16 value" data-col="16" data-resizable-column-id="16" id="pastDueHeader"   style="width: 198.011px; text-align:center;"       ><?php echo 'Past Due';?></th>
                                 <th class="21 value" data-col="21" data-resizable-column-id="21"    style="width: 198.011px; text-align:center;"       ><?php echo display('Amount Paid')?></th>
                                 <th class="22" data-col="22" data-resizable-column-id="22"    style="width: 198.011px; text-align:center;"       ><?php echo display('Balance Amount')?></th>
                                 <th class="22" data-col="22" data-resizable-column-id="22"    style="width: 198.011px; text-align:center;"       ><?php echo 'Status';?></th>
                              </tr>
                           </thead>
                           <tbody class="sortableTable__body" id="tab">
                              <?php
                                 $count=1;
                             //    print_r($get_outstanding_inv);
                                   if($get_outstanding_inv){
                                  foreach($get_outstanding_inv as $arr){
                                    $status='';
                                    if($arr['gtotal']==$arr['paid_amount'] && ($arr['due_amount']=='0' || $arr['due_amount']=='0.00' )){
                                        $status='Paid';
                                    }else if($arr['gtotal'] != $arr['paid_amount'] && $arr['paid_amount'] !=='0.00'  && $arr['paid_amount'] !=='0' && substr($arr['due_amount'], 0, 1) !== '-'){
                                        $status='Partially Paid';
                                    }else if($arr['gtotal'] != $arr['paid_amount'] && $arr['paid_amount'] =='0.00'){
                                        $status='Not Paid';
                                    }else if( substr($arr['due_amount'], 0, 1) == '-'){
                                          $status='Paid';
                                    }
                                       ?>
                                         <?php 
                                           $numberOfDays='';
                                             $date_now = date("Y-m-d");
                                             if($arr['payment_due_date'] !=='' && $invdatcus['payment_due_date'] < $date_now){
                                            $dateStr1=$arr['payment_due_date'];
                                            $dateStr2=date('Y-m-d');
                                            $date1 = new DateTime($dateStr1);
                      $date2 = new DateTime($dateStr2);
                      $interval = $date1->diff($date2);
                      $numberOfDays = $interval->days;
                    }
                                       ?>
                              <tr style="text-align:center" class="task-list-row" data-task-id="<?php echo $count; ?>" data-pname="<?php echo $arr['commercial_invoice_number'];  ?>" data-model="<?php echo $status; ?>" data-category="<?php echo $arr['customer_name']; ?>" data-unit="<?php echo $arr['date'] ?>" data-supplier="<?php echo $arr['payment_due_date'];  ?>">
                                 <!--<td style="display: none;"><input type="hidden" class="form-control" id="rowinvoice_id" value="<?php echo $arr['invoice_id'];  ?>" /></td>-->
            
                                 <td data-col="2" class="2" style="text-align:center;">                    <a   target="_blank"  href="<?php echo base_url()?>Cinvoice/invoice_update_form/<?php echo  $arr['invoice_id'];  ?>"><?php   echo $arr['commercial_invoice_number'];  ?></a></td>
                               
                                 <td data-col="4" class="4" style="text-align:center;" ><?php   echo $arr['date'];  ?></td>
                                
                           
                                 <td data-col="7" class="7" style="text-align:center;"><?php  echo $currency; ?><?php   echo $arr['gtotal'];  ?></td>
                                 
                               
                                 <td data-col="15" class="15" style="text-align:center;     text-wrap: nowrap;"><?php   echo $arr['customer_name'];  ?></td>
                                <td data-col="16" class="16" style="text-align:center;">
    <?php
    echo $arr['payment_due_date'];
   
    ?>
</td>
<td style='text-align:center;'><?php  
      if ($status != 'Paid') {
       echo '<span style="color: red; font-weight: bold;">' . $numberOfDays . '</span>';
   }else{
       echo '<span style="color: balck; font-weight: bold;">0</span>';
   }
     ?></td>

                                 <td data-col="21" class="21" style="text-align:center;"><?php  echo $currency; ?><?php   echo $arr['paid_amount'];  ?></td>
                                 <td data-col="22" class="22" style="text-align:center;"><?php  echo $currency; ?><?php   echo $arr['due_amount'];  ?></td>

                <td data-col="22" class="22" style="text-align:center;">
    <?php echo $currency; ?>
    <?php
    if ($status == 'Paid') {
        echo '<span style="color: green; font-weight: bold;">' . $status . '</span>';
    } else if ($status == 'Partially Paid') {
        echo '<span style="color: #4E11A8; font-weight: bold;">' . $status . '</span>';
    } else if ($status == 'Not Paid') {
        echo '<span style="color: red; font-weight: bold;">' . $status . '</span>';
    }
    ?>
</td>
                              </tr>
                              <?php   
                                 $count++;
                                  } }  else{
                                     ?>
                              <tr>
                                 <td colspan="17" style="text-align:center;font-weight:bold;"><?php  echo "No Records Found"  ;?></td>
                              </tr>
                              <?php
                                 }
                                 
                                 ?>
                           </tbody>
                     </table>

</section></div>
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
<!--<script type="text/javascript" src="<?php echo base_url()?>my-assets/js/profarma.js"></script>-->






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
  doc.save("Open_Invoices_"+utc+".pdf");
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
var showAllData = true;

$(document).on('click', '#submit_btn', function (e) {
     e.preventDefault()
    filterTable();
});
 $('#daterangepicker-field').on('apply.daterangepicker', function () {
        filterTable();
    });
$(document).on('change', '#payment-filter', function () {
    var selectedValue = $(this).val().trim();
    if (selectedValue == 'custom') {
        // If "custom" is selected, show the date picker
        $('#datepicker-container').show();
    } else {
        // For other options, hide the date picker
        $('#datepicker-container').hide();
    }
    // Trigger filtering when payment filter changes
    filterTable();
});

function showAllDataInTable() {
    $('tr.task-list-row').show();
}
$(document).ready(function () {
    // Initialize the date picker using daterangepicker
    $('#daterangepicker-field').daterangepicker();

    // Add an event listener for the 'apply.daterangepicker' event
    $('#daterangepicker-field').on('apply.daterangepicker', function () {
        filterTable();
    });
});

function filterTable() {
      var selectedCustomer = $('#customer-name-filter').val();
    var selectedPaymentDetails = $('#payment-details-filter').val();
    var selectedPaymentFilter = $('#payment-filter').val();
    var selectedStartDate, selectedEndDate;

    var dateRange = $('#daterangepicker-field').val();
    if (dateRange) {
        var [startDate, endDate] = dateRange.split(' to ');
        selectedStartDate = startDate;
        selectedEndDate = endDate;
    }

    $('tr.task-list-row').each(function () {

   var customer = $(this).data('category');
        var paymentDetails = $(this).data('model');
        var paymentDueDate = $(this).data('supplier');

        var showRow = true;

        if (selectedCustomer !== 'Any' && customer !== selectedCustomer) {
            showRow = false;
        }

        if (selectedPaymentDetails !== 'Any' && paymentDetails !== selectedPaymentDetails) {
            showRow = false;
        }

        if (selectedStartDate && selectedEndDate) {
            if (paymentDueDate < selectedStartDate || paymentDueDate > selectedEndDate) {
                showRow = false;
            }
        }

        if (showRow) {
            $(this).show();
        } else {
            $(this).hide();
        }
    });
}
// $(function() {
//   $('input[name="daterangepicker-field"]').daterangepicker({
//     opens: 'left'
//   }, function(start, end, label) {
//     console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
//   });
// });
  $(document).ready(function() {
   var table = document.getElementById("ProfarmaInvList");
    var rows = table.tBodies[0].rows;

    // Get the "Past Due" column index
    var pastDueIndex;
    for (var i = 0; i < table.rows[0].cells.length; i++) {
        if (table.rows[0].cells[i].id === "pastDueHeader") {
            pastDueIndex = i;
            break;
        }
    }

    // Sort the rows based on the "Past Due" values (assumes numeric values)
    var sortedRows = Array.from(rows);
    sortedRows.sort(function(a, b) {
        var pastDueA = parseInt(a.cells[pastDueIndex].textContent);
        var pastDueB = parseInt(b.cells[pastDueIndex].textContent);
        return pastDueB - pastDueA; // Sort from higher to lower
    });

    // Clear the existing table
    while (table.tBodies[0].firstChild) {
        table.tBodies[0].removeChild(table.tBodies[0].firstChild);
    }

    // Append the sorted rows to the table
    sortedRows.forEach(function(row) {
        table.tBodies[0].appendChild(row);
    });
});

</script>
    <style>
        .select2{
display:none;
        }
    </style>


