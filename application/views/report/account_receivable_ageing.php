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
    width: 180px;
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
          <h1><?php echo 'Receivables Ageing Details' ?></h1>
       </div>
        
        
        
        
        
        
         <small><?php //echo display('user_wise_sale_report') ?></small>
         <ol class="breadcrumb"   style=" border: 3px solid #d7d4d6;"   >
            <li><a href="<?php echo base_url()?>"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
            <li><a href="#"><?php echo display('report') ?></a></li>
            <li class="active" style="color:orange"><?php echo 'Receivables Ageing Details';?></li>
            <div class="load-wrapp">
       <div class="load-10">
         <div class="bar"></div>
       </div>
       </div>
         </ol>
      </div>
   </section>
   <script></script>
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
            <div class="panel panel-bd lobidrag" style="height: 80px;    border: 3px solid #d7d4d6;"  >
                <div class='col-sm-8'>
               <table class="table" align="center">
                  <tr style='text-align:center;font-weight:bold;' class="filters">
                     <td style='width:500px;'></td>
                     <td class="search_dropdown">
                        <span><?php echo 'Customer Name'; ?></span>
                        <select id="customer-name-filter" class="form-control">
                           <option value="Any">Any</option>
                           <?php
                              foreach ($unique_commercial_invoice_number as $invoice) {
                              ?>
                           <option value="<?php echo $invoice; ?>"><?php echo $invoice; ?></option>
                           <?php } ?>
                        </select>
                     </td>
                     <td class="search_dropdown" style="width: 22%; color: black;">
                        <span>Past Due</span>
                        <select id="payment-details-filter" class="form-control">
                           <option value="Any">Any</option>
                           <option value="1-30">1-30</option>
                           <option value="30-60">30-60</option>
                           <option value="60-90">60-90</option>
                           <option value="Above 90">Above 90</option>
                        </select>
                     </td>
                  </tr>
               </table>
               </div>
                <div class='col-sm-2' style='margin-top: 20px;
    margin-left: 140px;text-align:end;'>
    <div class="dropdown bootcol" id="drop" style="width: 300px;">
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
      <?php //echo form_close() ?>
      <!-- Manage Invoice report -->
      
      
 
              
                <div class="row">
         <div class="col-sm-16 col-md-14">
            <div class="panel panel-bd lobidrag" id="printableArea"   style="border: 3px solid #d7d4d6;" >
               <div class="panel-body">
                   <div class="sortableTable__container">
                    <div class="sortableTable__discard">
                    </div>

              
                    <div id='printableArea'>

              
                <table class="table table-bordered" cellspacing="0" width="100%" id="ProfarmaInvList" >
                  <thead class="sortableTable">
                     <tr  class="sortableTable__header btnclr">
                        <th class="1 value"  data-col="1" style="height: 45.0114px; width: 234.011px; text-align:center; " > <?php echo display('Invoice No')?></th>
                        <th class="2 value" data-col="2"  style="width: 198.011px; text-align:center;"><?php echo display('Sales Invoice date')?></th>
                        <th class="3 value" data-col="3" style="width: 198.011px; text-align:center;"><?php echo display('Grand Total')?></th>
                        <th class="4 value" data-col="4" style="width: 198.011px; text-align:center;"><?php echo 'Customer Name ';?></th>
                        <th class="5 value" data-col="5" style="width: 198.011px; text-align:center;"><?php echo 'Payment Due Date';?></th>
                        <th class="6 value" data-col="6" style="width: 198.011px; text-align:center;"><?php echo 'Past Due';?></th>
                        <th class="7 value" data-col="7" style="width: 198.011px; text-align:center;"><?php echo display('Amount Paid')?></th>
                        <th class="8 value" data-col="8" style="width: 198.011px; text-align:center;"><?php echo display('Balance Amount')?></th>
                     </tr>
                  </thead>
                  <tbody class="sortableTable__body" id="tab">
                     <?php
                        $count=1;
                          if($get_all_invoice_sale){
                         foreach($get_all_invoice_sale as $arr){
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
                        <td data-col="1" class="1 value" style="text-align:center;"><?php   echo $arr['commercial_invoice_number'];  ?></td>
                        <td data-col="2" class="2 value" style="text-align:center;" ><?php   echo $arr['date'];  ?></td>
                        <td data-col="3" class="3 value" style="text-align:center;"><?php  echo $currency; ?><?php   echo $arr['gtotal'];  ?></td>
                        <td data-col="4" class="4 value" style="text-align:center;     text-wrap: nowrap;"><?php   echo $arr['customer_name'];  ?></td>
                        <td data-col="5" class="5 value" style="text-align:center;">
                           <?php
                              echo $arr['payment_due_date'];
                              
                              ?>
                        </td>
                        <td  data-col="6" class="6 value" style='text-align:center;'><?php  
                           if ($status != 'Paid') {
                            echo '<span style="color: red; font-weight: bold;">' . $numberOfDays . '</span>';
                           }else{
                            echo '<span style="color: balck; font-weight: bold;">0</span>';
                           }
                           ?></td>
                        <td data-col="7" class="7 value" style="text-align:center;"><?php  echo $currency; ?><?php   echo $arr['paid_amount'];  ?></td>
                        <td data-col="8" class="8 value" style="text-align:center;"><?php  echo $currency; ?><?php   echo $arr['due_amount'];  ?></td>
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
  doc.save("Account_Receivable_Ageing_"+utc+".pdf");
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
   $(document).ready(function () {
       function filterTable() {
           var selectedCustomer = $("#customer-name-filter").val();
           var selectedRange = $("#payment-details-filter").val();
   
           $("#ProfarmaInvList tbody tr").each(function () {
               var customerName = $(this).find("td[data-col='15']").text(); // Corrected data-col attribute
               var pastDue = parseInt($(this).find("td[data-col='17']").text());
   
               var customerNameMatch = (selectedCustomer === "Any" || customerName === selectedCustomer);
               var pastDueMatch = (selectedRange === "Any" || isInRange(pastDue, selectedRange));
   
               if (customerNameMatch && pastDueMatch) {
                   $(this).show();
               } else {
                   $(this).hide();
               }
           });
       }
   
       function isInRange(number, selectedRange) {
           switch (selectedRange) {
               case "1-30":
                   return number >= 1 && number <= 30;
               case "30-60":
                   return number > 30 && number <= 60;
               case "60-90":
                   return number > 60 && number <= 90;
               case "Above 90":
                   return number > 90;
               default:
                   return true;
           }
       }
   
       filterTable();
   
       $("#customer-name-filter, #payment-details-filter").change(function () {
           filterTable();
       });
   });
</script>



<script type="text/javascript">
         $(document).ready(function() {
         // Function to store the visibility state of rows in localStorage
         function storeVisibilityState() {
            var ReceivablesAgeingvisibilityStates = {};
            $("#ProfarmaInvList tr").each(function(index, element) {
                var row = $(element);
                var rowID = index;
                var isVisible = row.is(':visible');
                ReceivablesAgeingvisibilityStates[rowID] = isVisible;
            });
            // Store the visibility states in localStorage
            localStorage.setItem("ReceivablesAgeingvisibilityStates", JSON.stringify(ReceivablesAgeingvisibilityStates));
         }
         // Apply the stored visibility state on page load
         function applyVisibilityState() {
            var storedVisibilityStates = JSON.parse(localStorage.getItem("ReceivablesAgeingvisibilityStates")) || {};
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



<style>
   .select2{
   display:none;
   }
</style>