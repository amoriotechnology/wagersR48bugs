<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.base64.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/drag_drop_index_table.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/html2canvas.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jspdf.plugin.autotable"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jspdf.umd.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<script type="text/javascript" src="<?php echo base_url()?>my-assets/js/tableManager.js"></script>
<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
<script type="text/javascript" src="http://mrrio.github.io/jsPDF/dist/jspdf.debug.js"></script>
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" />
<script type="text/javascript" src="http://www.bacubacu.com/colresizable/js/colResizable-1.5.min.js"></script>
<!-- All Report Start  -->
<style>
   td{
   text-align:center;
   }
   .select2{
   display:none;
   }
</style>
<div class="content-wrapper">
   <section class="content-header">
      <div class="header-icon">
         <i class="pe-7s-note2"></i>
      </div>
      <div class="header-title">
         <h1><?php echo "Customer Receipt"; ?></h1>
         <small><?php //echo display('todays_customer_receipt') ?></small>
         <ol class="breadcrumb">
            <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
            <li><a href="#"><?php echo display('report') ?></a></li>
            <li class="active" style="color:orange;"><?php echo "Customer Receipt"; ?></li>
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
            <a href="<?php echo base_url('Admin_dashboard/product_sales_reports_date_wise') ?>" class="btn btn-primary m-b-5 m-r-2"><i class="ti-align-justify"> </i>  <?php echo display('sales_report_product_wise'); ?> </a>
            <?php }?>
            <?php if($this->permission1->method('todays_sales_report','read')->access() && $this->permission1->method('todays_purchase_report','read')->access()){ ?>
            <a href="<?php echo base_url('Admin_dashboard/total_profit_report'); ?>" class="btn btn-warning m-b-5 m-r-2"><i class="ti-align-justify"> </i>  <?php echo display('profit_report'); ?> </a>
            <?php }?>
         </div>
      </div>
      <div class="row">
         <div class="panel panel-default">
            <div class="panel-body">
               <div class="col-sm-12">
                  <?php echo form_open('Admin_dashboard/filter_customer_wise_receipt', array('class' => 'form-inline', 'method' => 'post')); ?>
                  <?php
                     $today = date('Y-m-d');
                     
                     
                     
                     ?>
                  <div class="col-sm-2"></div>
                  <div class="col-sm-3">
                     <div class="form-group">
                        <label class="" for="customer_id"><?php echo display('customer_name').":"; ?></label>
                        <select  name="customer_id" required class="form-control"   id="customer_id">
                           <option value="">Select Customer </option>
                           <?php
                              foreach ($all_customer as $customer) {
                              
                                  ?>
                           <option value="<?php echo $customer->customer_id; ?>"><?php echo $customer->customer_name; ?></option>
                           <?php } ?>
                        </select>
                     </div>
                  </div>
                  <div class="col-sm-2">
                     <div class="form-group">
                        <label class="" for="from_date"><?php echo display('date').":"; ?></label>
                        <input type="date" name="from_date" required class="form-control datepicker" id="from_date" placeholder="<?php echo display('date'); ?>" value="">
                     </div>
                  </div>
                  <div class="col-sm-1">
                     <div class="form-group">
                        <button type="submit" name="btnSave" class="btn btnclr"><?php echo display('find') ?></button>
                        <?php if(isset($_POST['btnSave']))
                           {
                            ?> <?php }  ?>
                     </div>
                  </div>
                  <div class="col-sm-2"></div>
                  <?php if(isset($_POST['btnSave']))
                     {
                      ?>
                  <div class="col-sm-2">
                     <i class="fa fa-cog"  aria-hidden="true" id="myBtn" style="font-size:25px;" onClick="columnSwitchMODAL()"></i> <!-- onclick opens MODAL -->
                     <div class="dropdown bootcol" id="drop" style="float:right;padding-right:20px;padding-bottom:10px;">
                        <button class="btn btnclr dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <span class="glyphicon glyphicon-th-list"></span> Download
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                           <li><a href="#" id="cmd"> <img src="<?php echo base_url()?>assets/images/pdf.png" width="24px"> PDF</a></li>
                           <li class="divider"></li>
                           <li><a href="#" onclick="$('#ProfarmaInvList').tableExport({type:'excel',escape:'false'});"> <img src="<?php echo base_url()?>assets/images/xls.png" width="24px"> XLS</a></li>
                        </ul>
                        &nbsp;&nbsp;
                        <a  class="btn btnclr" href="#" onclick="printDiv('printableArea')"><?php echo display('print'); ?></a> 
                     </div>
                     <?php   } ?>
                  </div>
                  <?php echo form_close(); ?>
               </div>
            </div>
         </div>
      </div>
      <?php if(isset($_POST['btnSave']))
         {
          ?>
      <div class="panel-title">
         <div id="for_filter_by" class="for_filter_by" style="display: inline;">
            <label for="filter_by">Filter By&nbsp;&nbsp;
            </label>
            <select id="filterby" style="border-radius:5px;height:25px;">
               <option value="1">S.No</option>
               <option value="2">Customer Name</option>
               <option value="3">Description</option>
               <option value="4">Receipt</option>
            </select>
            <input id="filterinput" style="border-radius:5px;height:25px;" type="text">
         </div>
      </div>
      <!-- Todays sales report -->
      <div class="row" style="background-color:white;">
         <div class="col-sm-12">
            <div class="panel panel-bd lobidrag">
               <div class="panel-heading">
                  <div class="panel-title">
                  </div>
               </div>
               <div class="panel-body" id="content">
                  <div id="printableArea" class="table-responsive">
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
                                 <?php echo display('date'); ?>: <?php
                                    echo date('d-M-Y');
                                    
                                    ?> 
                              </date>
                           </td>
                        </tr>
                     </table>
                     <br>
                     <div class="table-responsive">
                        <div class="sortableTable__container">
                           <div class="sortableTable__discard">
                           </div>
                           <table width="100%" class="table table-stripped" id="ProfarmaInvList">
                              <thead class="sortableTable" style="height:30px;">
                                 <tr class="sortableTable__header">
                                    <th class="1 value" data-col="1"><?php echo display('sl'); ?></th>
                                    <th class="2 value" data-col="2"><?php echo display('customer_name'); ?></th>
                                    <th class="3 value" data-col="3"><?php echo display('description'); ?></th>
                                    <th class="4 value" data-col="4"><?php echo display('receipt'); ?></th>
                                 </tr>
                              </thead>
                              <tbody class="sortableTable__body">
                                 <?php
                                    $totals = 0;
                                    
                                    if ($todays_customer_receipt) {
                                    
                                    $sl = 0;
                                    
                                    foreach ($todays_customer_receipt as $single) {
                                    
                                       $sl++;
                                    if($i&1)
                                    $bg="#e2e4ed";
                                    else
                                    $bg="#FFFFFF";
                                       ?>
                                 <tr class="task-list-row">
                                    <td  data-col="1" class="1 value" bgcolor="<?php echo $bg; ?>"> <?php echo $sl; ?></td>
                                    <td  data-col="2" class="2 value" bgcolor="<?php echo $bg; ?>"> <?php echo html_escape($single->HeadName); ?></td>
                                    <td  data-col="3" class="3 value" bgcolor="<?php echo $bg; ?>"><?php echo html_escape($single->Narration); ?></td>
                                    <td  data-col="4" class="4 value" bgcolor="<?php echo $bg; ?>"><?php
                                       echo (($position == 0) ? $currency.' ' . number_format($single->Credit,2) : number_format($single->Credit,2).' '. $currency); 
                                       
                                       $totals +=$single->Credit;
                                       
                                       ?></td>
                                 </tr>
                                 <?php
                                    }
                                    
                                    } else {
                                    
                                    ?>
                                 <tr>
                                    <td class="text-center" colspan="4"><?php echo display('not_found'); ?></td>
                                 </tr>
                                 <?php }
                                    ?>
                              </tbody>
                              <tfoot>
                                 <tr class="task-list-row">
                                    <td  data-col="1" class="1 value">&nbsp;</td>
                                    <td  data-col="2" class="2 value">&nbsp;</td>
                                    <td  data-col="3" class="3 value" style="text-align:right;"><b><?php echo display('total'); ?></b></td>
                                    <td data-col="4" class="4 value"><b><?php
                                       echo (($position == 0) ? $currency.' ' .number_format($totals,2) :number_format($totals,2).' '. $currency); 
                                       ?></b></td>
                                 </tr>
                              </tfoot>
                           </table>
                           <?php } ?>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
</div>
</section>
</div>
<script src="<?php echo base_url()?>assets/js/jquery.bootgrid.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.0.0-alpha.1/jspdf.plugin.autotable.js"></script>
<div id="myModal_colSwitch"  class="modal_colSwitch">
   <div class="modal-content_colSwitch" style="width:25%;height:30%;">
      <span class="close_colSwitch">&times;</span>
      <div class="col-sm-1" ></div>
      <div class="col-sm-4" >
         <br>
         <div class="form-group row"  > 
            <br><input type="checkbox"  data-control-column="1" checked = "checked" class="1" value="1"/>&nbsp;<?php echo display('S.NO')?><br>
            <br><input type="checkbox"  data-control-column="2" checked = "checked" class="2" value="2"/>&nbsp;<?php echo ('Customer Name')?><br>
         </div>
      </div>
      <div class="col-sm-3" >
         <br>
         <div class="form-group row"  >
            <br><input type="checkbox"  data-control-column="3" checked = "checked" class="3 " value="3  "/>&nbsp;<?php echo display('Description')?> <br>
            <br><input type="checkbox"  data-control-column="4" checked = "checked" class="4" value="4"/>&nbsp;<?php echo ('Receipt')?><br>
         </div>
      </div>
   </div>
   </section>
</div>
<script type="text/javascript" src="<?php echo base_url()?>my-assets/js/profarma.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
<script>
   $(document).on('keyup', '#filterinput', function(){
   
   var value = $(this).val().toLowerCase();
   var filter=$("#filterby").val();
   $("#ProfarmaInvList tr:not(:eq(0))").filter(function() {
       $(this).toggle($(this).find("td."+filter).text().toLowerCase().indexOf(value) > -1)
   });
   });
   
   
//   $("input:checkbox:not(:checked)").each(function() {
//   var column = "table ." + $(this).attr("value");
//   console.log("Heyy : "+column);
//   $(column).hide();
//   });
   
//   $("input:checkbox").click(function(){
//   var column = "table ." + $(this).attr("value");
//      console.log("Heyy : "+column);
//   $(column).toggle();
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
   
   
   $('#cmd').click(function() {
   
   var pdf = new jsPDF('p','pt','a4');
   $('#for_numrows,#pagesControllers').hide();
   const invoice = document.getElementById("content");
            console.log(invoice);
            console.log(window);
            var pageWidth = 8.5;
            var margin=0.5;
            var opt = {
   lineHeight : 1.2,
   margin : 0.2,
   maxLineWidth : pageWidth - margin *1,
                filename: 'invoice'+'.pdf',
                allowTaint: true,
                html2canvas: { scale: 3 },
                jsPDF: { unit: 'in', format: 'a4', orientation: 'portrait' }
            };
             html2pdf().from(invoice).set(opt).toPdf().get('pdf').then(function (pdf) {
   var totalPages = pdf.internal.getNumberOfPages();
   for (var i = 1; i <= totalPages; i++) {
   pdf.setPage(i);
   pdf.setFontSize(10);
   pdf.setTextColor(150);
   }
   }).save('Customers Receipt.pdf');
   setTimeout( function(){
     $('#for_numrows,#pagesControllers').show();
   }, 4500 );
   });
   
</script>


<script type="text/javascript">
         $(document).ready(function() {
         // Function to store the visibility state of rows in localStorage
         function storeVisibilityState() {
            var bankaccountlistvisibilityStates = {};
            $("#ProfarmaInvList tr").each(function(index, element) {
                var row = $(element);
                var rowID = index;
                var isVisible = row.is(':visible');
                bankvisibilityStates[rowID] = isVisible;
            });
            // Store the visibility states in localStorage
            localStorage.setItem("bankaccountlistvisibilityStates", JSON.stringify(bankaccountlistvisibilityStates));
         }
         // Apply the stored visibility state on page load
         function applyVisibilityState() {
            var storedVisibilityStates = JSON.parse(localStorage.getItem("bankaccountlistvisibilityStates")) || {};
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


<!-- All Report End -->