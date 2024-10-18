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
<script type="text/javascript" src="<?php echo base_url()?>my-assets/js/profarma.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
<!-- Closing Report Start -->
<style>


.btnclr{
       background-color:<?php echo $setting_detail[0]['button_color']; ?>;
       color: white;

   }


   td,th{
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
         <h1><?php echo display('closing_report') ?></h1>
       </div>
	        
         <small><?php //echo display('account_closing_report') ?></small>
       
         <ol class="breadcrumb"   style=" border: 3px solid #d7d4d6;"   >
           
            <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
            <li><a href="#"><?php echo display('report') ?></a></li>
            <li class="active" style="color:orange;"><?php echo display('closing_report') ?></li>
       
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
         <div class="panel panel-default" style=" border: 3px solid #d7d4d6;">
            <div class="panel-body">
               <div class="col-sm-2">


               <div class="dropdown bootcol" id="drop" style="float:right;">
               <a  class="btn btnclr" href="#" onclick="printDiv('printable')"><?php echo display('print') ?></a>
     
               <button class="btnclr btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                     &nbsp;
                     <span class="glyphicon glyphicon-th-list"></span> Download
                     </button>
                     <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li><a href="#" onclick="generate()" id="cmd"> <img src="<?php echo base_url()?>assets/images/pdf.png" width="24px"> PDF</a></li>
                        <li class="divider"></li>
                        <li><a href="#" onclick="$('#ProfarmaInvList').tableExport({type:'excel',escape:'false'});"> <img src="<?php echo base_url()?>assets/images/xls.png" width="24px"> XLS</a></li>
                     </ul>
                     &nbsp;
                  </div>
               </div>
               <div class="col-sm-7" style="text-align:center;">



               <?php echo form_open('Admin_dashboard/date_wise_closing_reports/', array('class' => 'form-inline', 'method' => 'get')) ?>
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
                  
               </div>
             
               <div class="col-sm-3"></div>
         

                  <div class="col-sm-2" style="float:right;">
          <div class="" style="float: right;">  <a onclick="reload();"  id="removeButton">  <i class="fa fa-refresh fa-spin" style="font-size:25px;float:right;" aria-hidden="true"></i> </a>    &nbsp;    &nbsp;    &nbsp;    &nbsp; <i class="fa fa-gear fa-spin"  aria-hidden="true" id="myBtn" style="margin-right:20px;font-size:25px;float:right;" onClick="columnSwitchMODAL()"></i></div>
      </div>





             </div>
         </div>
      </div>























         <div class="panel-title">
            <div id="for_filter_by" class="for_filter_by" style="display: inline;">
               <label for="filter_by">Filter By&nbsp;&nbsp;
               </label>
               <select id="filterby" style="height:25px;">
                  <option value="1">S.No</option>
                  <option value="2">Date</option>
                  <option value="3">Cash In</option>
                  <option value="4">Cash Out</option>
                  <option value="5">Balance</option>
               </select>
               <input id="filterinput" style=" height:25px;" type="text">
            </div>
         </div>
         <div class="row" style="background-color:white;border: 3px solid #d7d4d6;">
            <div class="col-sm-12">
               <div class="panel panel-bd lobidrag" style=" border: 3px solid #d7d4d6;"  >
                  <div class="panel-heading" style="border: none;" >
                  </div>
                  <div class="panel-body" id="content">
                     <div id="printableArea">
                        <table class="print-table" width="100%">
                           <tr>
                              <td align="left" class="print-table-tr">
                                 <img src="<?php echo  base_url().$logo; ?>"   style='width: 90px;'  />
                              </td>
                              <td align="center" class="print-cominfo">
                                 <span class="company-txt">
                                 <h3> <?php echo $company; ?> </h3>
                                 <h4></b><?php echo $email; ?> </h4>
                                 <h4></b><?php echo $phone; ?> </h4>
                                 <h4></b><?php echo $address; ?> </h4>
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
                              <p style="text-align:center;">
                                 <caption class="text-center"><?php
                                    $from_date = (!empty($from_date)?$from_date:'');
                                     if($from_date){?><?php echo display('closing_report').'('.display('from').' '?>{from_date} <?php echo display('to').' '?>{to_date})
                                    <?php }?>
                              </caption></p>
                                <div class="sortableTable__container">
                                <div class="sortableTable__discard">
                                </div>
                              <table class="table table-striped " id="ProfarmaInvList">
                                 <thead class="sortableTable">
                                    <tr class="sortableTable__header">
                                       <th class="1 value" data-col="1" data-resizable-column-id="1" style=" color: black;"><?php echo display('sl') ?></th>
                                       <th class="2 value" data-col="2" data-resizable-column-id="2" style=" color: black;"><?php echo 'date' ;?></th>
                                       <th class="3 value" data-col="3" data-resizable-column-id="3" style=" color: black;"><?php echo display('cash_in') ?></th>
                                       <th class="4 value" data-col="4" data-resizable-column-id="4" style=" color: black;"><?php echo display('cash_out') ?></th>
                                       <th class="5 value" data-col="5" data-resizable-column-id="5" style=" color: black;"><?php echo display('balance') ?></th>
                                    </tr>
                                 </thead>
                                 <tbody class="sortableTable__body">
                                    <?php
                                       if ($daily_closing_data) {
                                           ?>
                                    <?php $i = 1;
                                       foreach ($daily_closing_data as $row) {
                                            if($i&1)
                                       $bg="#e2e4ed";
                                       else
                                       $bg="#FFFFFF";
                                           ?>
                                    <tr>
                                       <td data-col="1" class="1 value"   bgcolor="<?php echo $bg; ?>"><?php echo $i ?></td>
                                       <td data-col="2" class="2 value"  bgcolor="<?php echo $bg; ?>"><?php echo html_escape($row['final_date']); ?></td>
                                       <td data-col="3" class="3 value"  bgcolor="<?php echo $bg; ?>" ><?php
                                          echo (($position == 0) ? "$currency " : " $currency");
                                          
                                          echo html_escape(number_format($row['cash_in'], 2, '.', ','));
                                          ?></td>
                                       <td data-col="4" class="4 value"  bgcolor="<?php echo $bg; ?>" ><?php
                                          echo (($position == 0) ? "$currency " : " $currency");
                                          echo html_escape(number_format($row['cash_out'], 2, '.', ','));
                                          ?></td>
                                       <td data-col="5" class="5 value"  bgcolor="<?php echo $bg; ?>" ><?php
                                          echo (($position == 0) ? "$currency " : " $currency");
                                          
                                          echo html_escape(number_format($row['cash_in_hand'], 2, '.', ','));
                                                  ?></td>
                                    </tr>
                                    <?php $i++;
                                       }
                                       ?>
                                    <?php
                                       }
                                       ?>
                                 </tbody>
                              </table>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="text-right"><?php echo html_escape($links) ?></div>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>
<script src="<?php echo base_url()?>assets/js/jquery.bootgrid.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.0.0-alpha.1/jspdf.plugin.autotable.js"></script>
<div id="myModal_colSwitch"  name="myclosingreportName"      class="modal_colSwitch" >
   <div class="modal-content_colSwitch" style="width:15%;height:20%;">
      <span class="close_colSwitch">&times;</span>
      <div class="col-sm-3" ></div>
      <div class="col-sm-4" >
         <br>
         <div class="form-group row"  > 
            <br><input type="checkbox"  data-control-column="1"  class="1" value="1"/>&nbsp;<?php echo display('S.NO')?><br>
            <!-- <br><input type="checkbox"  data-control-column="2"  class="2" value="2"/>&nbsp;<?php echo display('Date')?><br> -->
            <!-- <br><input type="checkbox"  data-control-column="3"  class="3 " value="3  "/>&nbsp;<?php echo ('Cash In')?> <br> -->
             <!-- <br><input type="checkbox"  data-control-column="4"  class="4" value="4"/>&nbsp;<?php echo ('Cash Out')?><br> -->
             <br><input type="checkbox"  data-control-column="5"  class="5" value="5"/>&nbsp;<?php echo display('Balance')?><br>
         </div>
      </div>
     
   </div>
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
   }).save('invoice_no.pdf');
   setTimeout( function(){
     $('#for_numrows,#pagesControllers').show();
   }, 4500 );
   });
   
   
   
   function reload(){
   location.reload();
   }
   
   
</script>


<script type="text/javascript">
$(document).ready(function() {
       var localStorageName = "myclosingreportName"; // Set your desired localStorage name
      $("input:checkbox").each(function() {
          var columnValue = $(this).attr("value");
          var columnSelector = ".table ." + columnValue;
        //   var isChecked = localStorage.getItem(columnSelector) === "true";
                    var isChecked = localStorage.getItem(localStorageName  + columnSelector) === "true";
          // Check if the checkbox is checked or the stored state is true
          if (isChecked || $(this).prop("checked")) {
              $(columnSelector).show(); // Show the column
          } else {
              $(columnSelector).hide(); // Hide the column
          }
          $(this).prop("checked", isChecked);
      });
      // When a checkbox is clicked, update localStorage and toggle column visibility
      $("input:checkbox").click(function() {
          var columnValue = $(this).attr("value");
          var columnSelector = ".table ." + columnValue; // Corrected class name construction
          var isChecked = $(this).is(":checked");
        //   localStorage.setItem(columnSelector, isChecked); // Store checkbox state in localStorage
                    localStorage.setItem(localStorageName + columnSelector, isChecked); // Store checkbox state in localStorage
          // Toggle column visibility based on the checkbox state
          if (isChecked) {
              $(columnSelector).show(); // Show the column
          } else {
              $(columnSelector).hide(); // Hide the column
          }
      });
});
         $(document).ready(function() {
         // Function to store the visibility state of rows in localStorage
         function storeVisibilityState() {
            var closingreportlistvisibilityStates = {};
            $("#ProfarmaInvList tr").each(function(index, element) {
                var row = $(element);
                var rowID = index;
                var isVisible = row.is(':visible');
                closingreportlistvisibilityStates[rowID] = isVisible;
            });
            // Store the visibility states in localStorage
            localStorage.setItem("closingreportlistvisibilityStates", JSON.stringify(closingreportlistvisibilityStates));
         }
         // Apply the stored visibility state on page load
         function applyVisibilityState() {
            var storedVisibilityStates = JSON.parse(localStorage.getItem("closingreportlistvisibilityStates")) || {};
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


<!-- Closing Report End -->