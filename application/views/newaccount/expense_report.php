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
               <img src="<?php echo base_url()  ?>asset/images/expensesreport.png"  class="headshotphoto" style="height:50px;" />
      </div>
      
      
         
        
          <div class="header-title">
          <div class="logo-holder logo-9">
         <h1><?php echo 'Expense Report' ?></h1>
       </div>
        
        
        
        
         <small><?php //echo display('user_wise_sale_report') ?></small>
         <ol class="breadcrumb"   style=" border: 3px solid #d7d4d6;"   >
            <li><a href="<?php echo base_url()?>"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
            <li><a href="#"><?php echo display('report') ?></a></li>
            <!--<li><a href="#"><?php echo display('expense') ?></a></li>-->
            <li class="active" style="color:orange"><?php echo 'Expense Report';?></li>
       
       
       
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
       <input type="hidden" class="txt_csrfname" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
      <div class="row">
         <div class="col-sm-12">
            <?php if($this->permission1->method('all_report','read')->access()){ ?>
            <a class="btn btn-primary m-b-5 m-r-2" href="<?php echo base_url('Admin_dashboard/all_report') ?>"><?php echo display('todays_report') ?></a>
            <?php } ?>
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
      <!-- Sales report -->
      <?php  
         $commercial_invoice_number  = array();
         foreach ($expense_data as $invoice) {
         $commercial_invoice_number [] = $invoice['suppliers'];
         }
         $unique_commercial_invoice_number = array_unique($commercial_invoice_number);
         
         
         $container_no = array();
         foreach ($expense_data as $invoice) {
         $container_no[] = $invoice['product_name'];
         }
         $unique_container_no = array_unique($container_no);
         
         
         $customer_name = array();
         foreach ($expense_data as $invoice) {
         $customer_name[] = $invoice['payment_due_date'];
         }
         $unique_customer_name = array_unique($customer_name);
         
         
         $payment_terms = array();
         foreach ($expense_data as $invoice) {
         $payment_terms[] = $invoice['details'];
         }
         $unique_payment_terms = array_unique($payment_terms);
         ?>
      <?php //echo form_open('Admin_dashboard/user_sales_report', array('class' => 'form-inline', 'method' => 'get')) ?>
      <div class="row">
      <div class="col-sm-16 col-md-14">
            <div class="panel panel-bd lobidrag" style='height:80px; border: 3px solid #d7d4d6;  '   >
                <div class='col-sm-8'>
               <table class="table" align="center" style="overflow-x: unset;position: relative; left: 100px;">
                  <tr style='text-align:center;font-weight:bold;' class="filters">
                     <!-- <td style='width:200px;'></td> -->
                     <td class="search_dropdown" style="width: 15%; color: black;">
                        <span><?php echo 'Vendor'; ?></span>
                        <select id="customer-name-filter" class="form-control">
                           <option value="Any">Any</option>
                           <?php
                              foreach ($unique_commercial_invoice_number as $invoice) {
                              ?>
                           <option value="<?php echo $invoice; ?>"><?php echo $invoice; ?></option>
                           <?php } ?>
                        </select>
                     </td>
                      <td class="search_dropdown" style="width: 15%; color: black;">
                        <span>Product wise</span>
                        <select id="payment-filter" class="form-control">
                            <option value="Any">Any</option>
                            <?php
                              foreach ($unique_container_no as $invoice) {
                              ?>
                                <option value="<?php echo $invoice; ?>"><?php echo $invoice; ?></option>
                            <?php } ?>
                        </select>
                     </td>
                     <td class="search_dropdown" style="width: 15%; color: black;">
                        <span>Payment Due date</span>
                        <select id="payment-date-filter" class="form-control">
                            <option value="Any">Any</option>
                            <?php
                              foreach ($unique_customer_name as $invoice) {
                              ?>
                                <option value="<?php echo $invoice; ?>"><?php echo $invoice; ?></option>
                            <?php } ?>
                        </select>
                     </td>
                      <td class="search_dropdown" style="width: 15%; color: black;">
                        <span>Payment Details</span>
                        <select id="payment-details-filter" class="form-control">
                           <option value="Any">Any</option>
                           <option value="Paid">Paid</option>
                           <option value="Partially Paid">Partially Paid</option>
                           <option value="Not Paid">Not Paid</option>
                        </select>
                     </td>
                    
                     <td class="search_dropdown" style="width: 15%; color: black; position: relative; top: 4px;">
                        <div id="datepicker-container">
                           <input type="text" class="form-control daterangepicker-field getdate_reults" id="daterangepicker-field" name="daterangepicker-field" style="margin-top: 15px;padding: 5px; width: 200px; border-radius: 8px; height: 35px;" />
                        </div>
                     </td>
                     <input type="hidden" class="getcurrency" value="<?php echo $currency; ?>">
                     <td style='width:30px; position: relative; top: 4px;'>
                        <!--<input type="submit"  name="btnSave" class="btn btnclr" style='margin-top: 15px;' value='Search'/>-->
                     </td>
                    
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
               <table class="table table-bordered" cellspacing="0" width="100%" id="ProfarmaInvList" style=" border: 3px solid #d7d4d6;"  >
                  <thead class="sortableTable">
                     <tr class="sortableTable__header btnclr">
                        <th class="1 value" data-col="1" style="height: 45.0114px; text-align:center; width: 300px;"><?php echo 'Purchase Id'?></th>
                        <th class="2 value" data-col="2" style="text-align:center; width: 300px;"><?php echo 'Vendor'?></th>
                        <th class="3 value" data-col="3" style="text-align:center; width: 300px;"><?php echo 'Product Name'?></th>
                        <th class="4 value" data-col="4" style="text-align:center;width: 200px;"><?php echo display('Grand Total')?></th>
                        <th class="5 value" data-col="5" style="text-align:center;width: 300px;"><?php echo 'Payment Due Date';?></th>
                        <th class="6 value" data-col="6" style="text-align:center;width: 300px;"><?php echo display('Amount Paid')?></th>
                        <th class="7 value" data-col="7" style="text-align:center;width: 300px;"><?php echo display('Balance Amount')?></th>
                        <th class="8 value" data-col="8" style="text-align:center;width: 300px;"><?php echo 'Status';?></th>
                     </tr>
                  </thead>
                  <tbody class="sortableTable__body" id="tab">
                     <?php
                        $count=1;
                          if($getexpenseData){
                            $previousPurchaseID = null;
                            $previousSupplierName = null;
                            $previousProductName = null;

                            foreach ($getexpenseData as $key => $arr) {
                           $status='';
                           if($arr['grand_total_amount']==$arr['total_amountpaidexpense']){
                               $status='Paid';
                           }else if($arr['grand_total_amount'] != $arr['total_amountpaidexpense'] && $arr['total_amountpaidexpense'] !=='0.00'  && $arr['total_amountpaidexpense'] !=='0' && substr($arr['balance'], 0, 1) !== '-'){
                               $status='Partially Paid';
                           }else if($arr['grand_total_amount'] != $arr['total_amountpaidexpense'] && $arr['total_amountpaidexpense'] =='0.00'){
                               $status='Not Paid';
                           }else if( substr($arr['balance'], 0, 1) == '-'){
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
                     <tr style="text-align:center" class="task-list-row" data-task-id="<?php echo $count; ?>" data-pname="<?php echo $arr['suppliers'];  ?>" data-category="<?php echo $arr['product_name']; ?>" data-supplier="<?php echo $arr['payment_due_date'] ?>" data-model="<?php echo $status; ?>">

                        <?php 
                         
                        if ($arr['purchase_id'] != $previousPurchaseID) {
                            echo '<td class="1 value" data-col="1" style="text-align: center;">' . $arr['purchase_id'] . '</td>';
                            $previousPurchaseID = $arr['purchase_id'];
                        } else {
                            echo '<td class="1 value" data-col="1"></td>';
                        }

                        if ($arr['suppliers'] != $previousSupplierName) {
                            echo '<td class="2 value" data-col="2" style="text-align: center;">' . $arr['suppliers'] . '</td>';
                            $previousSupplierName = $arr['suppliers'];
                        } else {
                            echo '<td class="2 value" data-col="2"></td>';
                        }

                        // if ($arr['product_name'] != $previousProductName) {
                        //     echo '<td style="text-align: center;">' . $arr['product_name'] . '</td>';
                        //     $previousProductName = $arr['product_name'];
                        // } else {
                        //     echo '<td></td>';
                        // }


                        ?>
                        <td class="3 value" data-col="3" style="text-align:center;"><?php echo $arr['product_name']; ?></td> 
                        <td class="4 value" data-col="4" style="text-align:center;"><?php echo $currency . $arr['grand_total_amount']; ?></td>
                        <td class="5 value" data-col="5" style="text-align:center;"><?php echo $arr['payment_due_date']; ?></td>
                        <td class="6 value" data-col="6" style="text-align:center;"><?php echo $arr['total_amountpaidexpense'] ? $currency . $arr['total_amountpaidexpense'] : '0.00'; ?></td>
                        <td class="7 value" data-col="7" style="text-align:center;"><?php echo $currency . $arr['balance']; ?></td>
                        <td class="8 value" data-col="8" style="text-align:center;">
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
                     <?php $count++; } } else{ ?>
                     <tr>
                        <td colspan="8" style="text-align:center;font-weight:bold;"><?php  echo "No Records Found"  ;?></td>
                     </tr>
                     <?php } ?>
                  </tbody>
               </table></div>
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
 var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
   var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';

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
    $('#customer-name-filter').on('change', function() {
        // alert('hi');
      changeFilter.call(this, 'pname');
    });
    
    // Task Status Dropdown Filter
    $('#payment-filter').on('change', function() {
      changeFilter.call(this, 'category');
    });
    
    // Task Milestone Dropdown Filter
    $('#payment-date-filter').on('change', function() {
      changeFilter.call(this, 'supplier');
    });
    
    // Task Priority Dropdown Filter
    $('#payment-details-filter').on('change', function() {
      changeFilter.call(this, 'model');
    });
    
   
   
   function search() {
   var input_pname,
    input_category,
    input_supplier,
    input_model,
   
    filter_pname,filter_category,filter_supplier,filter_model,
    table,
    tr,
    td,
    i,
   
   input_pname = document.getElementById("myInput1");
   input_category = document.getElementById("myInput2");
   input_supplier = document.getElementById("myInput3");
   input_model = document.getElementById("myInput4");
   
   filter_pname = input_pname.value.toUpperCase();    
   filter_category = input_category.value.toUpperCase();    
   filter_supplier = input_supplier.value.toUpperCase();
   filter_model = input_model.value.toUpperCase();
   
   
   
   table = document.getElementById("ProfarmaInvList");
   tr = table.getElementsByTagName("tr");
   for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    td1 = tr[i].getElementsByTagName("td")[2];
    td2 = tr[i].getElementsByTagName("td")[14];
    td3 = tr[i].getElementsByTagName("td")[3];
    td4 = tr[i].getElementsByTagName("td")[11];
   
    if (td && td1 && td2 && td3 && td4) {
      input_pname = (td.textContent || td.innerText).toUpperCase();
      input_category = (td2.textContent || td2.innerText).toUpperCase();
      input_supplier = (td4.textContent || td4.innerText).toUpperCase();
      input_model = (td1.textContent || td1.innerText).toUpperCase();
      if (
        input_pname.indexOf(filter_pname) > -1 &&
        input_category.indexOf(filter_category) > -1 &&
        input_supplier.indexOf(filter_supplier) > -1 &&
        input_model.indexOf(filter_model) > -1 
      ) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
   }
   }
   
   
   $(document).ready(function() {
  $('.apply-btn').click(function(event) {
    var dateresults = $('.getdate_reults').val();
    var currency = $('.getcurrency').val();
    $.ajax({
      type: "POST",
      url: "<?php echo base_url(); ?>accounts/getexpenseDateresults",
      data: {
        <?php echo $this->security->get_csrf_token_name(); ?>: csrfHash,
        dateresults: dateresults
      },
      success: function(data) {
        var dataArray = JSON.parse(data);
        $("#ProfarmaInvList tbody").empty();
        dataArray.forEach(function(item) {
          var status = "";
          var gtotal = item.grand_total_amount;
          var amountpaid = item.total_amountpaidexpense;
          if (gtotal == amountpaid) {
            status = '<span style="color: green; font-weight: bold;">Paid</span>';
          } else if (gtotal != amountpaid && amountpaid != '0.00') {
            status = '<span style="color: #4E11A8; font-weight: bold;">Partially Paid</span>';
          } else if (gtotal != amountpaid && amountpaid == '0.00') {
            status = '<span style="color: red; font-weight: bold;">Not Paid</span>';
          } else if (gtotal < amountpaid) {
            status = '<span style="color: orange; font-weight: bold;">Overpaid</span>';
          }
          console.log(item, "item");
          var row = "<tr>";
          row += "<td style='text-align: center;'>" + item.purchase_id + "</td>";
          row += "<td style='text-align: center;'>" + item.suppliers + "</td>";
          row += "<td style='text-align: center;'>" + item.product_name + "</td>";
          row += "<td style='text-align: center;'>" + currency + item.grand_total_amount + "</td>"; 
          row += "<td style='text-align: center;'>" + item.payment_due_date + "</td>";
          row += "<td style='text-align: center;'>" + currency + item.total_amountpaidexpense + "</td>"; 
          row += "<td style='text-align: center;'>" + currency + item.balance + "</td>"; // Add currency symbol here
          row += "<td style='text-align: center;'>" + status + "</td>";
          row += "</tr>";

          $("#ProfarmaInvList tbody").append(row);
        });
      }
    });
    event.preventDefault();
  });
});




$(document).ready(function() {
  $('.range').click(function(event) {
    var dateresults = $('.getdate_reults').val();
    var currency = $('.getcurrency').val();
    $.ajax({
      type: "POST",
      url: "<?php echo base_url(); ?>accounts/getexpenseDateresults",
      data: {
        <?php echo $this->security->get_csrf_token_name(); ?>: csrfHash,
        dateresults: dateresults
      },
      success: function(data) {
        var dataArray = JSON.parse(data);
        $("#ProfarmaInvList tbody").empty();
        dataArray.forEach(function(item) {
          var status = "";
          var gtotal = item.grand_total_amount;
          var amountpaid = item.total_amountpaidexpense;
          if (gtotal == amountpaid) {
            status = '<span style="color: green; font-weight: bold;">Paid</span>';
          } else if (gtotal != amountpaid && amountpaid != '0.00') {
            status = '<span style="color: #4E11A8; font-weight: bold;">Partially Paid</span>';
          } else if (gtotal != amountpaid && amountpaid == '0.00') {
            status = '<span style="color: red; font-weight: bold;">Not Paid</span>';
          } else if (gtotal < amountpaid) {
            status = '<span style="color: orange; font-weight: bold;">Overpaid</span>';
          }
          console.log(item, "item");
          var row = "<tr>";
          row += "<td style='text-align: center;'>" + item.purchase_id + "</td>";
          row += "<td style='text-align: center;'>" + item.suppliers + "</td>";
          row += "<td style='text-align: center;'>" + item.product_name + "</td>";
          row += "<td style='text-align: center;'>" + currency + item.grand_total_amount + "</td>"; 
          row += "<td style='text-align: center;'>" + item.payment_due_date + "</td>";
          row += "<td style='text-align: center;'>" + currency + item.total_amountpaidexpense + "</td>"; 
          row += "<td style='text-align: center;'>" + currency + item.balance + "</td>"; // Add currency symbol here
          row += "<td style='text-align: center;'>" + status + "</td>";
          row += "</tr>";

          $("#ProfarmaInvList tbody").append(row);
        });
      }
    });
    event.preventDefault();
  });
});
</script>


<script type="text/javascript">
         $(document).ready(function() {
         // Function to store the visibility state of rows in localStorage
         function storeVisibilityState() {
            var expensereportlistvisibilityStates = {};
            $("#ProfarmaInvList tr").each(function(index, element) {
                var row = $(element);
                var rowID = index;
                var isVisible = row.is(':visible');
                expensereportlistvisibilityStates[rowID] = isVisible;
            });
            // Store the visibility states in localStorage
            localStorage.setItem("expensereportlistvisibilityStates", JSON.stringify(expensereportlistvisibilityStates));
         }
         // Apply the stored visibility state on page load
         function applyVisibilityState() {
            var storedVisibilityStates = JSON.parse(localStorage.getItem("expensereportlistvisibilityStates")) || {};
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
   .select2{display:none;}
   #pagesControllers{
    padding:20px;
}
</style>