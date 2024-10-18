    <?php error_reporting(1);  ?>
<script src="<?php echo base_url() ?>my-assets/js/admin_js/account.js" type="text/javascript"></script>
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
<script type="text/javascript" src="<?php echo base_url()?>my-assets/js/banktranscation_tableManager.js"></script>
<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
<script type="text/javascript" src="http://mrrio.github.io/jsPDF/dist/jspdf.debug.js"></script>
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" />
<script type="text/javascript" src="http://www.bacubacu.com/colresizable/js/colResizable-1.5.min.js"></script>
<!-- Cheaque Manager Start -->
<div class="content-wrapper">
<section class="content-header">
   <div class="header-icon">
      <i class="pe-7s-note2"></i>
   </div>
   <div class="header-title">
      <h1><?php echo ('Manage Transaction') ?></h1>
      <small></small>
      <ol class="breadcrumb">
         <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
         <li><a href="#"><?php echo display('accounts') ?></a></li>
         <li class="active" style="color:orange;"><?php echo display('bank_transaction') ?></li>
      </ol>
   </div>
</section>
<section class="content">


<style>
   .btnclr{
       background-color:<?php echo $setting_detail[0]['button_color']; ?>;
       color: white;

   }
</style>


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
   <div class="panel panel-bd lobidrag">
      <div class="panel-heading" style="height: 60px;">
         <div class="col-sm-9">
            <?php    foreach(  $this->session->userdata('perm_data') as $test){
               $split=explode('-',$test);
               if(trim($split[0])=='bank' && $_SESSION['u_type'] ==3 && trim($split[1])=='1000'){
                 
                 
                  ?>
            <a href="<?php  echo base_url(); ?>/Csettings/bank_transaction " class="btnclr btn m-b-5 m-r-2" ><?php echo ('Create Transaction') ?></a>
            <?php break;}} 
               if($_SESSION['u_type'] ==2){ ?>
            <a href="<?php  echo base_url(); ?>/Csettings/bank_transaction " class="btnclr btn m-b-5 m-r-2" ><?php echo ('Create Transaction') ?></a>
            <?php  } ?>
            <a onclick="reload();"  >  <i class="fa fa-refresh" id="banktransRemove" style="font-size:25px;float:right;" aria-hidden="true"></i> </a>
         </div>
         <div class="col-sm-2">
            <i class="fa fa-cog"  aria-hidden="true" id="myBtn" style="font-size:25px;" onClick="columnSwitchMODAL()"></i> <!-- onclick opens MODAL -->
            <div class="dropdown bootcol" id="drop" style="float:right;padding-right:20px;padding-bottom:10px;">
               <button class="btnclr btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
               <span class="glyphicon glyphicon-th-list"></span> <?php  echo  display('download')?>
               </button>
               <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                  <li><a href="#" onclick="generate()"> <img src="<?php echo base_url()?>assets/images/pdf.png" width="24px"> <?php  echo  display('PDF')?></a></li>
                  <li class="divider"></li>
                  <li><a href="#" onclick="$('#ProfarmaInvList').tableExport({type:'excel',escape:'false'});"> <img src="<?php echo base_url()?>assets/images/xls.png" width="24px"> <?php  echo  display('XLS')?></a></li>
               </ul>
               &nbsp;
               <input type="button" class="btn btnclr" name="btnPrint" id="btnPrint"   value="Print" onclick="printDiv('printArea');"/>
            </div>
         </div>
         <a style="float:left;font-size: larger;" id="s_icon"><i class="fa fa-search"   aria-hidden="true"></i></a>
      </div>
      <div id="search_area" style="border:4px solid #004d99;border-radius:7px;">
         <table class="table">
            <thead>
               <tr class="filters">
                  <th class="search_dropdown" style="width: 22%;">
                     <span><?php echo ('Date') ?> </span>
                     <select id="pname-filter" class="form-control">
                        <option>Any</option>
                        <?php 
                           $bank_name  = array();
                           foreach ($get_bank_search as $bank) {
                           $bank_name [] = $bank['bank_name'];
                           }
                           $unique_bank_name  = array_unique($bank_name);
                           
                           
                           $ac_name = array();
                           foreach ($get_bank_search as $bank) {
                           $ac_name[] = $bank['ac_name'];
                           }
                           $unique_ac_name = array_unique($ac_name);
                           
                           
                           $ac_number = array();
                           foreach ($get_bank_search as $bank) {
                           $ac_number[] = $bank['ac_number'];
                           }
                           $unique_ac_number = array_unique($ac_number);
                           
                           
                           $branch = array();
                           foreach ($get_bank_search as $bank) {
                           $branch[] = $bank['branch'];
                           }
                           $unique_branch= array_unique($branch);
                           
                           
                           $country = array();
                           foreach ($get_bank_search as $bank) {
                           $country[] = $bank['country'];
                           }
                           $unique_country = array_unique($country); 
                            foreach($unique_bank_name as $bankdata){  ?>
                        <option value="<?php echo $bankdata; ?>"><?php echo $bankdata; ?> </option>
                        <?php }  ?>
                     </select>
                  </th>
                  <th class="search_dropdown" style="width: 22%;">
                     <span>Debit</span>
                     <select id="model-filter" class="form-control">
                        <option>Any</option>
                        <?php foreach($unique_ac_name as $bankdata){  ?>
                        <option value="<?php echo $bankdata; ?>"><?php echo $bankdata; ?></option>
                        <?php }  ?>
                     </select>
                  </th>
                  <th class="search_dropdown" style="width: 22%;">
                     <span>Credit</span>
                     <select id="category-filter" class="form-control">
                        <option>Any</option>
                        <?php foreach($unique_ac_number as $bankdata){  ?>
                        <option value="<?php echo $bankdata; ?>"><?php echo $bankdata; ?></option>
                        <?php }  ?>
                     </select>
                  </th>
                  <th class="search_dropdown" style="width: 200px;">
                     <span>Description</span>
                     <select id="unit-filter" class="form-control">
                        <option>Any</option>
                        <?php foreach($unique_branch as $bankdata){  ?>
                        <option value="<?php echo $bankdata; ?>"><?php echo $bankdata; ?></option>
                        <?php }  ?>
                     </select>
                  </th>
                  <th class="search_dropdown" style="width: 22%;">
                     <span>Withdraw/Deposite ID</span>
                     <select id="supplier-filter" class="form-control">
                        <option>Any</option>
                        <?php foreach($unique_country as $bankdata){  ?>
                        <option value="<?php echo $bankdata; ?>"><?php echo $bankdata; ?></option>
                        <?php }  ?>
                     </select>
                  </th>
               </tr>
            </thead>
         </table>
         <table>
            <tr>
               <td style="width:10px;"></td>
               <td style="width:22%;">   <input type="text" class="form-control" id="myInput1" onkeyup="search()" placeholder="Search for Date.."></td>
               <td style="width:10px;"></td>
               <td style="width:22%;"> <input type="text" class="form-control" id="myInput2" onkeyup="search()" placeholder="Search for Debit.."></td>
               <td style="width:10px;"></td>
               <td style="width:20%;">  <input type="text" class="form-control" id="myInput3" onkeyup="search()" placeholder="Search for   Credit.."></td>
               <td style="width:10px;"></td>
               <td style="width:20%;"> <input type="text" class="form-control" id="myInput4" onkeyup="search()" placeholder="Search for   Description.."></td>
               <td style="width:10px;"></td>
               <td style="width: 213px;"> <input type="text" class="form-control" id="myInput5" onkeyup="search()" placeholder="Search for Withdraw/Deposite ID.."></td>
            </tr>
         </table>
         <br/>
         <div class="col-sm-12">
            <input id="search" type="text" class="form-control"  placeholder="Search for Transaction">
         </div>
      </div>
   </div>
   <br>
   <!-- Manage Invoice report -->
   <div class="row">
   <div class="col-sm-12">
   <div class="panel panel-bd lobidrag">
   <div class="panel-heading">
      <div class="row">
         <div id="for_filter_by" class="for_filter_by" style="display: inline;">
            <label for="filter_by"> <?php echo display('Filter By') ?> &nbsp;&nbsp;
            </label>
            <select id="filterby" style="border-radius:5px;height:25px;">
               <option value="1"> <?php echo display('ID') ?></option>
               <option value="2"> <?php echo display('Date')?></option>
               <option value="3"> <?php echo display('Debit')?></option>
               <option value="4"><?php echo display('Credit')?></option>
               <option value="5"><?php echo ('COAID')?></option>
               <option value="6"><?php echo display('Description')?></option>
               <option value="7"><?php echo ('Withdraw/Deposite ID')?></option>
            </select>
            <input id="filterinput" style="border-radius:5px;height:25px;" type="text">
         </div>
      </div>
   </div>
   <div class="panel-body" style="padding-top: 0px;">
      <div class="sortableTable__container">
         <div  id="printArea">
            <div id="content" id="printArea">
               <div class="sortableTable__discard"></div>
               <div id="customers">
                  <table class="table table-bordered" cellspacing="0" width="100%" id="ProfarmaInvList">
                     <thead class="sortableTable">
                        <tr  class="sortableTable__header btnclr">
                           <th class="1 value" data-col="1"      style="width: 80px; height: 40.0114px;" ><?php echo display('ID') ?></th>
                           <th class="2 value"  data-col="2"    style="height: 45.0114px; width: 234.011px" > <?php echo ('Date')?></th>
                           <th class="3 value"  data-col="3"   style="width: 248.011px;"        ><?php echo ('Debit')?></th>
                           <th class="4 value"  data-col="4"   style="width: 248.011px;"        ><?php echo ('Credit')?></th>
                           <th class="5 value" data-col="5" data-resizable-column-id="5"    style="width: 298.011px;"       ><?php echo ('COAID')?></th>
                           <th class="6 value" data-col="6" data-resizable-column-id="6"    style="width: 258.011px;"       ><?php echo display('Description')?></th>
                           <th class="7 value" data-col="7" data-resizable-column-id="7"    style="width: 298.011px;"       ><?php echo ('Withdraw / Deposite ID')?></th>
                           <th class="8 value" data-col="8" style="  width: 480.011px;  height: 39.0114px;"  ><?php echo display('Action')?></th>
                           <!-- <div class="myButtonClass Action">
                              <th class="8 text-center" data-col="8" data-column-id="8" data-formatter="commands" data-sortable="false"   style="  width: 480.011px;  height: 39.0114px;"  ><?php echo display('Action')?></th>
                              </div> -->
                        </tr>
                     </thead>
                     <tbody class="sortableTable__body" id="tab">
                        <?php
                           // print_r($sale['rows']);
                                   // print_r($transaction_information);
                           
                           $count=1;
                           if(!empty($transaction_information)){
                           foreach($transaction_information as $k=>$arr){
                           ?>
                        <tr style="text-align:center" >
                           <td data-col="1" class="1"><?php  echo $count;  ?></td>
                           <td data-col="2" class="2"><?php   echo $arr['VDate'];  ?></td>
                           <td data-col="3" class="3"><?php   echo $arr['Debit'];  ?></td>
                           <td data-col="4" class="4"><?php   echo $arr['Credit'];  ?></td>
                           <td data-col="5" class="5"><?php   echo $arr['COAID'];  ?></td>
                           <td data-col="6" class="6"><?php   echo $arr['Narration'];  ?></td>
                           <td data-col="7" class="7"><?php  echo $currency; ?><?php   echo $arr['VNo'];  ?></td>
                           <td data-col="8" class="8">
                              <div class="form-group">
                                 <?php    foreach(  $this->session->userdata('perm_data') as $test){
                                    $split=explode('-',$test);
                                    if(trim($split[0])=='bank' && $_SESSION['u_type'] ==3 && trim($split[1])=='0010'){
                                      
                                      
                                       ?>
                                 <a class="btnclr btn  btn-sm bank_transcationedit" id="bank_transcationedit" style="background-color: #3ca5de; color: #fff;" href="<?php echo base_url()?>Csettings/edit_transaction/<?php echo  $arr['rand_id'];  ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                 <?php break;}} 
                                    if($_SESSION['u_type'] ==2){ ?>
                                 <a class="btnclr btn  btn-sm bank_transcationedit" id="bank_transcationedit" style="background-color: #3ca5de; color: #fff;" href="<?php echo base_url()?>Csettings/edit_transaction/<?php echo  $arr['rand_id'];  ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                 <?php  } ?>
                                 <?php    foreach(  $this->session->userdata('perm_data') as $test){
                                    $split=explode('-',$test);
                                    if(trim($split[0])=='bank' && $_SESSION['u_type'] ==3 && trim($split[1])=='0001'){
                                      
                                      
                                       ?>
                                 <a class="btnclr btn  btn-sm" onclick="return confirm('<?php echo display('are_you_sure') ?>')" style="background-color: #3ca5de; color: #fff;" href="<?php echo base_url()?>Csettings/delete_transaction/<?php echo  $arr['VNo'];  ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                 <?php break;}} 
                                    if($_SESSION['u_type'] ==2){ ?>
                                 <a class="btnclr btn  btn-sm" onclick="return confirm('<?php echo display('are_you_sure') ?>')" style="background-color: #3ca5de; color: #fff;" href="<?php echo base_url()?>Csettings/delete_transaction/<?php echo  $arr['VNo'];  ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                 <?php  } ?>
                           </td>
                           </div>
                        </tr>
                        <?php   
                           $count++;
                           } }  else{
                           ?>
                        <tr>
                           <td colspan="12" style="text-align:center;font-weight:bold;"><?php  echo "No Records Found"  ;?></td>
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
</div>
<script src="<?php echo base_url()?>assets/js/jquery.bootgrid.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.0.0-alpha.1/jspdf.plugin.autotable.js"></script>
<div id="myModal_colSwitch"  name="mybanktransactionName"      class="modal_colSwitch" >
<div class="modal-content_colSwitch" style="width:20%;height:20%;">
<span class="close_colSwitch">&times;</span>
<div class="col-sm-1" ></div>
<div class="col-sm-4" ><br>
<div class="form-group row"  > 

<!-- <br><input type="checkbox"  data-control-column="2" class="2" value="2"/>&nbsp;<?php echo display('date');?><br> -->
<!-- <br><input type="checkbox"  data-control-column="3" class="3 " value="3  "/>&nbsp;<?php  echo  display('Debit');?> <br> -->
<!-- <br><input type="checkbox"  data-control-column="4" class="4" value="4"/>&nbsp;<?php  echo  display('Credit');?><br> -->
<br><input type="checkbox"  data-control-column="5" class="5" value="5"/>&nbsp;<?php  echo  ('COAID');?><br>

</div>
</div>
<div class="col-sm-6" ><br>
<div class="form-group row"  >
<br><input type="checkbox"  data-control-column="6" class="6" value="6"/>&nbsp;<?php  echo  display('Description');?><br>

<!-- <br><input type="checkbox"  data-control-column="8" class="8"    value="8"/>&nbsp;<?php echo display('Action');?><br> -->
</div>
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
   
   
   
   // $(document).ready(function() {
   //     $("input:checkbox").each(function() {
   //         var column = "table ." + $(this).attr("value");
   //         var isChecked = localStorage.getItem(column) === "true";
   //         $(this).prop("checked", isChecked);
   //         $(column).toggle(isChecked); 
   //     });
   // });
   // $("input:checkbox").click(function() {
   //     var column = "table ." + $(this).attr("value");
   //     var isChecked = $(this).is(":checked");
   //     localStorage.setItem(column, isChecked); 
   //     $(column).toggle(isChecked); 
   // });
   
   // $("input:checkbox:not(:checked)").each(function() {
   //     var column = "table ." + $(this).attr("value");
   //     console.log("Heyy : "+column);
   //     $(column).hide();
   // });
   
   // $("input:checkbox").click(function(){
   //     var column = "table ." + $(this).attr("value");
   //       console.log("Heyy : "+column);
   //     $(column).toggle();
   // });
   
   
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
                filename: 'tax_details'+'.pdf',
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
   }).save('tax_details.pdf');
   setTimeout( function(){
     $('#for_numrows,#pagesControllers').show();
   }, 4500 );
   });
   
   
   
   
   function reload(){
   location.reload();
   }
   
   
   
   
   
   
   
   
   $(document).ready(function(){
   $('#search_area').hide();
   });
   $('#s_icon').click(function(){
      $('#search_area').toggle();
   });
   
   
   $("#search").on("keyup", function() {
   var value = $(this).val().toLowerCase();
   $("#ProfarmaInvList tr:not(:eq(0))").filter(function() {
   
   $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
   });
   });
   
   
   
   function search() {
   var input_pname,
   input_model,
   input_category,
   input_unit,
   input_supplier,
   
   filter_pname,filter_model,filter_category,filter_unit,filter_supplier,
   table,
   tr,
   td,
   i,
   
   input_pname = document.getElementById("myInput1");
   input_model = document.getElementById("myInput2");
   input_category = document.getElementById("myInput3");
   input_unit = document.getElementById("myInput4");
   input_supplier = document.getElementById("myInput5");
   
   filter_pname = input_pname.value.toUpperCase();   
   filter_model = input_model.value.toUpperCase();
   filter_category = input_category.value.toUpperCase();    
   filter_unit = input_unit.value.toUpperCase();
   filter_supplier = input_supplier.value.toUpperCase();
   
   
   
   table = document.getElementById("ProfarmaInvList");
   tr = table.getElementsByTagName("tr");
   for (i = 0; i < tr.length; i++) {
   
     td = tr[i].getElementsByTagName("td")[1];
   td1 = tr[i].getElementsByTagName("td")[2];
   td2 = tr[i].getElementsByTagName("td")[3];
   td3 = tr[i].getElementsByTagName("td")[4];
   td4 = tr[i].getElementsByTagName("td")[6];
   
   
   
   
   if (td && td1 && td2 && td3 && td4) {
     input_pname = (td.textContent || td.innerText).toUpperCase();
     input_model = (td1.textContent || td1.innerText).toUpperCase();
     input_category = (td2.textContent || td2.innerText).toUpperCase();
     // alert('jki');
     input_unit = (td3.textContent || td3.innerText).toUpperCase();
     input_supplier = (td4.textContent || td4.innerText).toUpperCase();
     if (
       input_pname.indexOf(filter_pname) > -1 &&
       input_model.indexOf(filter_model) > -1 &&
       input_category.indexOf(filter_category) > -1 &&
       input_unit.indexOf(filter_unit) > -1 &&
       input_supplier.indexOf(filter_supplier) > -1
     ) {
       tr[i].style.display = "";
     } else {
       tr[i].style.display = "none";
     }
   }
   }
   }
   
   
   
   
   
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
   $('#pname-filter').on('change', function() {
       // alert('hi');
     changeFilter.call(this, 'pname');
   });
   
   // Task Status Dropdown Filter
   $('#model-filter').on('change', function() {
     changeFilter.call(this, 'model');
   });
   
   // Task Milestone Dropdown Filter
   $('#category-filter').on('change', function() {
     changeFilter.call(this, 'category');
   });
   
   // Task Priority Dropdown Filter
   $('#unit-filter').on('change', function() {
     changeFilter.call(this, 'unit');
   });
   
   // Task Tags Dropdown Filter
   $('#supplier-filter').on('change', function() {
     changeFilter.call(this, 'supplier');
   });
   
   
   
    $(document).ready(function() {
           // Function to store the visibility state of rows in localStorage
           function storeVisibilityState() {
               var banktranscationtransvisibilityStates = {};
               $("#ProfarmaInvList tr").each(function(index, element) {
                   var row = $(element);
                   var rowID = index;
                   var isVisible = row.is(':visible');
                   banktranscationtransvisibilityStates[rowID] = isVisible;
               });
               // Store the visibility states in localStorage
               localStorage.setItem("banktranscationtransvisibilityStates", JSON.stringify(banktranscationtransvisibilityStates));
           }
           // Apply the stored visibility state on page load
           function applyVisibilityState() {
               var storedVisibilityStates = JSON.parse(localStorage.getItem("banktranscationtransvisibilityStates")) || {};
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
           $(".bank_transcationedit").on('click', function() {
               var row = $(this);
               row.toggle();
               storeVisibilityState(); // Store the updated visibility state
           });
           applyVisibilityState(); // Apply the stored visibility state on page load
       });
       
        $(document).ready(function() {
       var localStorageName = "mybanktransactionName"; // Set your desired localStorage name
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
   
   
       
   
   
   
   
   
</script>
<style>
   .select2-selection{
   display:none;
   }
   .select2-selection__rendered{
   display:none;
   }
</style>