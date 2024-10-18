<!-- Manage Invoice Start -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
<script src="https://cdn.jsdelivr.net/npm/jquery-base64-js@1.0.1/jquery.base64.min.js"></script> 
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
<style>
   .table{
   /* display: block; */
   overflow-x: auto;
   }
   th{
   text-align:left;
   }
</style>
<div class="content-wrapper">
<section class="content-header">
   <div class="header-icon">
      <i class="pe-7s-note2"></i>
   </div>
   <div class="header-title">
      <h1><?php echo display('profit_report') ?></h1>
      <small><?php //echo display('profit_report') ?></small>
      <ol class="breadcrumb">
         <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
         <li><a href="#"><?php echo display('report') ?></a></li>
         <li class="active" style="color:orange;"><?php echo display('profit_report') ?></li>
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
      </div>
   </div>
   <!-- Sales report -->
   <div class="row">
      <div class="panel panel-default">
         <div class="panel-body">
            <div class="col-sm-3"></div>
            <div class="col-sm-4" style="text-align:center;">
               <?php echo form_open('Admin_dashboard/retrieve_dateWise_profit_report',array('class' => 'form-inline','method' => 'get'))?>
               <?php
                  $today = date('Y-m-d');
                  ?>
               <div class="form-group">
                  <label class="" for="from_date"><?php echo display('start_date') ?></label>
                  <input type="date" required name="from_date" class="form-control datepicker" id="from_date" placeholder="<?php echo display('start_date') ?>" value="<?php echo $today ?>">
               </div>
               <div class="form-group">
                  <label class="" for="to_date"><?php echo display('end_date') ?></label>
                  <input type="date" required name="to_date" class="form-control datepicker" id="to_date" placeholder="<?php echo display('end_date') ?>" value="<?php echo $today ?>">
               </div>
               <button type="submit" name="btnSave" class="btn btnclr"><?php echo display('find') ?></button>
               <?php if(isset($_GET['btnSave']))
                  {
                   ?>   <?php  } ?>
               <?php echo form_close() ?> 
            </div>
            <?php if(isset($_GET['btnSave']))
               {
                ?>
            <div class="col-sm-3"></div>
            <div class="col-sm-2" style="text-align:center;">
               <i class="fa fa-cog"  aria-hidden="true"  id="myBtn" style="font-size:25px;" onClick="columnSwitchMODAL()"></i>
               <div class="dropdown bootcol" id="drop" style="float:right;padding-right:20px;padding-bottom:10px;">
                  <button class="btnclr btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                  <span class="glyphicon glyphicon-th-list"></span> Download
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                     <li><a href="#" onclick="generate()" id="cmd"> <img src="<?php echo base_url()?>assets/images/pdf.png" width="24px"> PDF</a></li>
                     <li class="divider"></li>
                     <li><a href="#" onclick="$('#ProfarmaInvList').tableExport({type:'excel',escape:'false'});"> <img src="<?php echo base_url()?>assets/images/xls.png" width="24px"> XLS</a></li>
                  </ul>
                  <a  class="btn btnclr" href="#" onclick="printDiv('printable')"><?php echo display('print') ?></a>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Manage Invoice report -->
   <div class="row">
   <div class="col-sm-12">
      <div class="panel panel-bd lobidrag">
         <div class="panel-heading">
            <div class="row">
               <div id="for_filter_by" class="for_filter_by" style="display: inline;">
                  <label for="filter_by">Filter By&nbsp;&nbsp;
                  </label>
                  <select id="filterby" style="border-radius:5px;height:25px;">
                     <option value="1">Sale Date</option>
                     <option value="2">Invoice No</option>
                     <option value="3">Supplier Amount</option>
                     <option value="4">My Sale Amount</option>
                     <option value="5">Total Profit</option>
                  </select>
                  <input id="filterinput" type="text" style="border-radius:5px;height:25px;">
               </div>
            </div>
         </div>
         <div id="content">
            <div class="panel-body" >
               <div  class="table-responsive" id="printable">
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
                  <div class="panel-body" style="padding-top: 0px;">
                     <div class="sortableTable__container">
                        <div class="sortableTable__discard">
                        </div>
                        <div id="customers">
                           <table class="table"  id="ProfarmaInvList">
                              <thead class="sortableTable">
                                 <tr style="background-color: #337ab7;border-color: #2e6da4;" class="sortableTable__header">
                                    <th data-col="1" data-control-column="1" class="1 value" name="Sale Date" style="height: 35.0114px;">Sale Date</th>
                                    <th  data-col="2" data-control-column="2" class="2 value" name="Invoice No" style="height: 35.0114px;">Invoice No</th>
                                    <th data-col="3" data-control-column="3" class="3 value" name="Supplier Amount" style="height: 35.0114px;">Supplier Amount</th class="text-center">
                                    <th data-col="4" data-control-column="4" class="4 value" name="My Sale Amount" style="height: 35.0114px;">My Sale Amount</th>
                                    <th data-col="5" data-control-column="5" class="5 value" name="Total Profit" style="height: 35.0114px;">Total Profit</th>
                                 </tr>
                              </thead>
                              <tbody class="sortableTable__body">
                                 <?php
                                    if($total_profit_report) {
                                    	// print_r($total_profit_report);
                                    ?>
                                 <?php 
                                    $subtotal = 0;
                                     $i=0;
                                    foreach($total_profit_report as $sales){
                                       
                                         if($i&1)
                                    $bg="#e2e4ed";
                                    else
                                    $bg="#FFFFFF";
                                        ?>   
                                 <tr class="task-list-row">
                                    <td data-col="1" class="1" bgcolor="<?php echo $bg; ?>"><?php echo $sales['prchse_date']; ?></td>
                                    <td data-col="2" class="2" bgcolor="<?php echo $bg; ?>">
                                       <?php echo $sales['invoice_id']; ?>
                                    </td>
                                    <td data-col="3"  class="3 text-left" bgcolor="<?php echo $bg; ?>"><?php if($sales['total_supplier_rate']){ echo $currency.$sales['total_supplier_rate'];}else{ echo $currency."0.00";} ?></td>
                                    <td data-col="4"  class="4 text-left" bgcolor="<?php echo $bg; ?>">
                                       <?php if($sales['total_sale']){ echo $currency.$sales['total_sale'];}else{ echo $currency."0.00";} ?>
                                    </td>
                                    <td data-col="5" class="5 text-left" bgcolor="<?php echo $bg; ?>"><?php if($sales['total_profit']){ echo $currency.$sales['total_profit'];}else{ echo $currency."0.00";}  ?></td>
                                 </tr>
                                 <?php $i++; } ?>
                                 <tr class="task-list-row">
                                    <td data-col="1" class="1">&nbsp; </td>
                                    <td data-col="2" class="2" align="left">&nbsp; <b><?php echo display('total') ?>: </b></td>
                                    <td data-col="3" class="3 text-left"><b><?php echo (($position==0)?"$currency {SubTotalSupAmnt}":"{SubTotalSupAmnt} $currency") ?></b></td>
                                    <td data-col="4" class="4 text-left"><b><?php echo (($position==0)?"$currency {SubTotalSaleAmnt}":"{SubTotalSaleAmnt} $currency") ?></b></td>
                                    <td data-col="5" class="5 text-left"><b><?php echo (($position==0)?"$currency {profit_ammount}":"{profit_ammount} $currency") ?></b></td>
                                 </tr>
                                 <?php } else {
                                    ?>
                                 <tr>
                                    <td class="text-center" colspan="5"><?php echo display('not_found'); ?></td>
                                 </tr>
                                 <?php } ?>
                              </tbody>
                           </table>
                        </div>
                        <?php }?>
                     </div>
                  </div>
               </div>
            </div>
</section>
<script src="<?php echo base_url()?>assets/js/jquery.bootgrid.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.0.0-alpha.1/jspdf.plugin.autotable.js"></script>
<div id="myModal_colSwitch"  class="modal_colSwitch">
<div class="modal-content_colSwitch" style="width:25%;height:30%;">
<span class="close_colSwitch">&times;</span>
<div class="col-sm-2" ></div>
<div class="col-sm-4" ><br>
<div class="form-group row"  > 
<br><input type="checkbox"  data-control-column="1" checked = "checked" class="1" value="1"/>&nbsp;<?php echo ('Sale Date')?><br>
<br><input type="checkbox"  data-control-column="2" checked = "checked" class="2" value="2"/>&nbsp;<?php echo ('Invoice No')?><br>
<br><input type="checkbox"  data-control-column="3" checked = "checked" class="3 " value="3  "/>&nbsp;<?php echo ('Supplier Name')?> <br>
</div>
</div>
<div class="col-sm-4" ><br>
<div class="form-group row"  >
<br><input type="checkbox"  data-control-column="4" checked = "checked" class="4" value="4"/>&nbsp;<?php echo ('My Sale Amount')?> <br>
<br><input type="checkbox"  data-control-column="5" checked = "checked" class="5" value="5"/>&nbsp;<?php echo ('Total Profit')?> <br>
</div>
</div>
</div>
</section>
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
   $(document).on('keyup', '#filterinput', function(){
    
      var value = $(this).val().toLowerCase();
      var filter=$("#filterby").val();
      $("#ProfarmaInvList tr:not(:eq(0))").filter(function() {
          $(this).toggle($(this).find("td."+filter).text().toLowerCase().indexOf(value) > -1)
      });
   });
</script>
<script>
   function reload(){
       location.reload();
   }
       var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
   var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';
   $editor = $('#submit'),
     $editor.on('click', function(e) {
       if (this.checkValidity && !this.checkValidity()) return;
       e.preventDefault();
       var yourArray = [];
       //loop through all checkboxes which is checked
       $('.modal-content_colSwitch input[type=checkbox]:not(:checked)').each(function() {
         yourArray.push($(this).val());//push value in array
       });
      
       values = {
       
         extralist_text: yourArray
       
       };
       console.log(values)
       var json=values;
       var data = {
           page:$('#url').val(),
             content: yourArray
          
          };
          data[csrfName] = csrfHash;
   $.ajax({
       
       type: "POST",  
       url:'<?php echo base_url();?>Cinvoice/setting',
      
       data: data,
       dataType: "json", 
       success: function(data) {
           if(data) {
              console.log(data);
           }
       }  
   });
     });
   
     $( document ).ready(function() {
      
      var page=$('#url').val();
      page=page.split('/');
       var data = {
           'menu':page[0],
           'submenu':page[1]
            
          
          };
         
          data[csrfName] = csrfHash;
       $.ajax({
       
       type: "POST",  
       url:'<?php echo base_url();?>Cinvoice/get_setting',
      
       data: data,
       dataType: "json", 
       success: function(data) {
        var menu=data.menu;
        var submenu=data.submenu;
        if(menu=='Sale' && submenu=='New Sale'){
        var s=data.setting;
   s=JSON.parse(s);
   console.log(s);
   for (var i = 0; i < s.length; i++) {
       console.log(s[i]);
       $('td.'+s[i]).hide(); // hide the column header th
       $('th.'+s[i]).hide();
   $('tr').each(function(){
        $(this).find('td:eq('+$('td.'+s[i]).index()+')').hide();
   });
       }
       for (var i = 0; i < s.length; i++) {
           if( $('.'+s[i]))
     $('.'+s[i]).prop('checked', false); //check the box from the array, note: you need to add a class to your checkbox group to only select the checkboxes, right now it selects all input elements that have the values in the array 
       }  
   }
       }
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
     }).save('invoice_no.pdf');
       setTimeout( function(){
         $('#for_numrows,#pagesControllers').show();
       }, 4500 );
   });
   
//   $("input:checkbox:not(:checked)").each(function() {
//       var column = "table ." + $(this).attr("value");
//       console.log("Heyy : "+column);
//       $(column).hide();
//   });
   
//   $("input:checkbox").click(function(){
//       var column = "table ." + $(this).attr("value");
//          console.log("Heyy : "+column);
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
            var ProfitReportlistvisibilityStates = {};
            $("#ProfarmaInvList tr").each(function(index, element) {
                var row = $(element);
                var rowID = index;
                var isVisible = row.is(':visible');
                ProfitReportlistvisibilityStates[rowID] = isVisible;
            });
            // Store the visibility states in localStorage
            localStorage.setItem("ProfitReportlistvisibilityStates", JSON.stringify(ProfitReportlistvisibilityStates));
         }
         // Apply the stored visibility state on page load
         function applyVisibilityState() {
            var storedVisibilityStates = JSON.parse(localStorage.getItem("ProfitReportlistvisibilityStates")) || {};
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