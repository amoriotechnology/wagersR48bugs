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
<script type="text/javascript" src="<?php echo base_url()?>my-assets/js/tableManager.js"></script>
<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
<script type="text/javascript" src="http://mrrio.github.io/jsPDF/dist/jspdf.debug.js"></script>
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" />
<script type="text/javascript" src="http://www.bacubacu.com/colresizable/js/colResizable-1.5.min.js"></script>
<!-- Cheaque Manager Start -->
 
   
   
<style>

.btnclr{
       background-color:<?php echo $setting_detail[0]['button_color']; ?>;
       color: white;

   }
</style>   
   
   
   
  
<div class="content-wrapper">

	<section class="content-header">

	    <div class="header-icon">

	   <figure class="one">
               <img src="<?php echo base_url()  ?>asset/images/tax.png"  class="headshotphoto" style="height:50px;" />      </div>
   









 

	     
	          <div class="header-title">
          <div class="logo-holder logo-9">
	        <h1><?php echo display('manage_tax') ?></h1>
       </div>
	     
	     
	     
	     
	        <small><?php //echo display('manage_tax') ?></small>

	        <ol class="breadcrumb" style="border:3px solid #D7D4D6;"  >

	            <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>

	            <li><a href="#"><?php echo display('accounts') ?></a></li>

	            <li class="active" style="color:orange;" ><?php echo display('manage_tax') ?></li>

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
    <div>
         <div class="panel panel-bd lobidrag">
            <div class="panel-heading" style="height: 60px;border: 3px solid #D7D4D6;">
            <div class="col-sm-18">
            <div class="col-sm-6" style="display: flex; align-items: left;">
                  <?php    foreach(  $this->session->userdata('perm_data') as $test){
                     $split=explode('-',$test);
                     if(trim($split[0])=='tax' && $_SESSION['u_type'] ==3 && trim($split[1])=='1000'){
                        
                        ?>
                  <a href="<?php  echo base_url(); ?>/Caccounts/add_taxes " class="btnclr btn btn-default dropdown-toggle"   style="height:fit-content;"><i class="far fa-file-alt"> </i> &nbsp;<?php echo display('Create Tax') ?></a>                  
                  <?php break;}} 
                     if($_SESSION['u_type'] ==2){ ?>
                  <a href="<?php  echo base_url(); ?>/Caccounts/add_taxes " class="btnclr btn btn-default dropdown-toggle"   style="height:fit-content;"><i class="far fa-file-alt"> </i>&nbsp;<?php echo display('Create Tax') ?></a>
                  <?php  } ?>
                  &nbsp;
                  <a  class="btnclr btn btn-default dropdown-toggle"  style="height:fit-content;"  id="s_icon"><b class="fa fa-search"></b>&nbsp;Advance search  </a> 
               &nbsp;&nbsp;

               <div class="dropdown bootcol" id="drop" style="    width: 300px;">
                           <button class="btnclr btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" style="float:left;"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" >
                           <span class="fa fa-download"></span> <?php echo display('download') ?>
                           </button>
                           <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <li><a href="#" onclick="generate()"> <img src="<?php echo base_url() ?>assets/images/pdf.png" width="24px"> <?php echo display('PDF') ?></a></li>
                              <li class="divider"></li>
                              <li><a href="#" onclick="$('#ProfarmaInvList').tableExport({type:'excel',escape:'false'});"> <img src="<?php echo base_url() ?>assets/images/xls.png" width="24px"> <?php echo display('XLS') ?></a></li>
                           </ul>&nbsp;
                  
                  <button type="button"    class="btnclr btn btn-default dropdown-toggle" id="btnPrint"   onclick="printDiv('printArea')"><b class="ti-printer"></b>&nbsp;<?php echo display('print') ?></button>
               </div>
            </div>

            <div class="col-sm-2" style="float:right;" >
               <div class="" style="float: right;">  <a onclick="reload(); " id="removeButton">  <i class="fa fa-refresh fa-spin" style="font-size:25px;float:right; margin-top: 5px;" aria-hidden="true"></i> </a>    &nbsp;    &nbsp;    &nbsp;    &nbsp;
                <i class="fa fa-gear fa-spin"  aria-hidden="true" id="myBtn" style="margin-right:20px;font-size:25px;float:right; margin-top: 5px;" onClick="columnSwitchMODAL()"></i></div>
            </div>
         </div>
       
         </div>
             <!-- </div>
         </div> -->

 

         <div id="search_area" style="border:4px solid #004d99;border-radius:7px;">
   <table class="table">
      <thead>
         <tr class="filters">
            <th class="search_dropdown" style="width: 22%;">
               <span><?php echo ('Tax') ?> </span>
               <select id="pname-filter" class="form-control">
                  <option>Any</option>
                  <?php 
                     $tax  = array();
                     foreach ($gettax_info as $taxss) {
                     $tax [] = $taxss['tax'];
                     }
                     $unique_tax  = array_unique($tax);
                     
                     
                     $tax_agency = array();
                     foreach ($gettax_info as $tax) {
                     $tax_agency[] = $tax['tax_agency'];
                     }
                     $unique_tax_agency = array_unique($tax_agency);
                     
                     
                     $account = array();
                     foreach ($gettax_info as $tax) {
                     $account[] = $tax['account'];
                     }
                     $unique_account = array_unique($account);


                     $show_taxonreturn = array();
                     foreach ($gettax_info as $tax) {
                     $show_taxonreturn[] = $tax['show_taxonreturn'];
                     }
                     $unique_show_taxonreturn= array_unique($show_taxonreturn);
                     
                     
                     $status_type = array();
                     foreach ($gettax_info as $tax) {
                     $status_type[] = $tax['status_type'];
                     }
                     $unique_status_type = array_unique($status_type); 
                    



                      foreach($unique_tax as $taxes){  ?>
                  <option value="<?php echo $taxes; ?>"><?php echo $taxes; ?> %</option>
                  <?php }  ?>
               </select>
            </th>
            <th class="search_dropdown" style="width: 22%;">
               <span>Tax Agency</span>
               <select id="model-filter" class="form-control">
                  <option>Any</option>
                  <?php foreach($unique_tax_agency as $taxes){  ?>
                  <option value="<?php echo $taxes; ?>"><?php echo $taxes; ?></option>
                  <?php }  ?>
               </select>
            </th>
            <th class="search_dropdown" style="width: 22%;">
               <span>Account</span>
               <select id="category-filter" class="form-control">
                  <option>Any</option>
                  <?php foreach($unique_account as $taxes){  ?>
                  <option value="<?php echo $taxes; ?>"><?php echo $taxes; ?></option>
                  <?php }  ?>
               </select>
            </th>
            <th class="search_dropdown" style="width: 200px;">
               <span>Show Tax On Return</span>
               <select id="unit-filter" class="form-control">
                  <option>Any</option>
                  <?php foreach($unique_show_taxonreturn as $taxes){  ?>
                  <option value="<?php echo $taxes; ?>"><?php echo $taxes; ?></option>
                  <?php }  ?>
               </select>
            </th>
            <th class="search_dropdown" style="width: 22%;">
               <span>Type</span>
               <select id="supplier-filter" class="form-control">
                  <option>Any</option>
                  <?php foreach($unique_status_type as $taxes){  ?>
                  <option value="<?php echo $taxes; ?>"><?php echo $taxes; ?></option>
                  <?php }  ?>
               </select>
            </th>
         </tr>
      </thead>
   </table>
   <table>
      <tr>
         <td style="width:10px;"></td>
         <td style="width:22%;">   <input type="text" class="form-control" id="myInput1" onkeyup="search()" placeholder="Search for Tax.."></td>
         <td style="width:10px;"></td>
         <td style="width:22%;"> <input type="text" class="form-control" id="myInput2" onkeyup="search()" placeholder="Search for Tax Agency.."></td>
         <td style="width:10px;"></td>
         <td style="width:20%;">  <input type="text" class="form-control" id="myInput3" onkeyup="search()" placeholder="Search for   Account.."></td>
         <td style="width:10px;"></td>
         <td style="width:20%;"> <input type="text" class="form-control" id="myInput4" onkeyup="search()" placeholder="Search for   Show Tax On Return.."></td>
         <td style="width:10px;"></td>
         <td style="width: 203px;"> <input type="text" class="form-control" id="myInput5" onkeyup="search()" placeholder="Search for Type.."></td>
      </tr>
   </table>
   <br/>
   <div class="col-sm-12">
      <input id="search" type="text" class="form-control"  placeholder="Search for Manage Tax">
 </div>
</div>
</div>


 












<div class="row">
   <div class="col-sm-12">
      <div class="panel panel-bd lobidrag">
      <div class="panel-body" style="    border: 3px solid #D7D4D6;">
               <div class="sortableTable__container">
               <div id="for_filter_by" class="for_filter_by" style="display: inline;">
                  <label for="filter_by"><?php echo display('Filter By') ?>&nbsp;&nbsp;
                  </label>
                     <select id="filterby" style="border-radius:5px;height:25px;">
                        <option value="1"><?php echo display('S.No') ?></option>
                        <option value="2"><?php echo display('Tax') ?></option>
                        <option value="3"><?php echo display('Tax ID') ?></option>
                        <option value="4"><?php echo display('Description') ?></option>
                        <option value="5"><?php echo display('Tax Agency') ?></option>
                        <option value="6"><?php echo display('Account') ?></option>
                        <option value="7"><?php echo display('Show Tax On Return') ?></option>  
                        <option value="8">Type</option>  
                     </select>
                     <input id="filterinput" style="height:25px;" type="text">
                  </div>
               



           

               <div id="printArea">
               <div class="sortableTable__discard">
                     </div>
                  <div id="dataTableExample3">
                     <table class="table table-bordered" cellspacing="0" width="100%" id="ProfarmaInvList">
                        <thead class="sortableTable">
                           <tr class="sortableTable__header btnclr">





                                       <th class="1 value"  data-col="1"    style="width: 100px; height: 40.0114px;" ><?php echo display('S.No') ?></th>
                                       <th class="2 value"  data-col="2"    style="height: 45.0114px; width: 274.011px" ><?php echo display('Tax') ?></th>
                                       <th class="3 value"  data-col="3"     ><?php echo display('Tax ID') ?></th>
                                       <th class="4 value"  data-col="4"    style="width: 278.011px;"        ><?php echo display('Description') ?></th>
                                       <th class="5 value"  data-col="5"    style="width: 298.011px;"       ><?php echo display('Tax Agency') ?></th>
                           
                                       <th class="6 value" data-col="6"    style="width: 198.011px;"       ><?php echo display('Account') ?></th>
                                       <th class="7 value" data-col="7"    style="width: 598.011px;"       ><?php echo display('Show Tax On Return Line') ?></th>
                                       <th class="8 value" data-col="8"    style="width: 598.011px;"       >Type</th>
                                        
                                       <div class="myButtonClass Action">
                                          <th class="9 value" data-col="9" data-resizable-column-id="6"    style="width: 198.011px;"       ><?php echo display('Action') ?></th>
                                       </div>
                                    </tr>
                                 </thead>
                                 <tbody class="sortableTable__body" id="tab">
                                    <?php $i=1; if($tax_list){  foreach ($tax_list as $tax) { ?>
 

                                    <tr style="text-align:center" class="task-list-row" data-task-id="<?php echo $count; ?>" data-pname="<?php echo  $tax->tax; ?>" data-model="<?php echo $tax->tax_agency; ?>" data-category="<?php echo $tax->account; ?>" data-unit="<?php echo $tax->show_taxonreturn; ?>" data-supplier="<?php echo $tax->status_type;  ?>">







                                       <td data-col="1" class="1"><?php echo $i; ?></td>
                                       <td data-col="2" class="2"><?php echo $tax->tax; ?>%</td>
                                       <td data-col="3" class="3"><?php echo  $tax->tax_id; ?></td>
                                       <td data-col="4" class="4"><?php echo $tax->description;  ?></td>
                                       <td data-col="5" class="5"><?php echo $tax->tax_agency; ?></td>
                                       <td data-col="6" class="6"><?php echo $tax->account;  ?></td>
                                       <td data-col="7" class="7"><?php echo $tax->show_taxonreturn; ?></td>
                                       <td data-col="8" class="8">
                                           <?php if($tax->status_type === 'sales'){ ?>
                                          <label class="badge badge-success"><?php echo $tax->status_type; ?></label>
                                          <?php } elseif($tax->status_type === 'expenses'){ ?>
                                            <label class="badge badge-info"><?php echo $tax->status_type; ?></label>
                                          <?php }else{ ?>
                                             <label class="badge badge-warning">Sales & Expenses</label>
                                          <?php } ?>





                                       </td>
                                      
                                       <td  data-col="9" class="9" >
                                          <div class="form-group">
                                             <center>
                                                <?php    foreach(  $this->session->userdata('perm_data') as $test){
                                                   $split=explode('-',$test);
                                                   if(trim($split[0])=='tax' && $_SESSION['u_type'] ==3 && trim($split[1])=='0010'){
                                                     
                                                     
                                                      ?>
                                                <a href="<?php echo base_url().'Caccounts/tax_edit/'.$tax->tax_id; ?>" class="btnclr btn  btn-sm manage_edit" data-toggle="tooltip" data-placement="right" title="" data-original-title="<?php echo display('update') ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                <?php break;}} 
                                                   if($_SESSION['u_type'] ==2){ ?>
                                                <a href="<?php echo base_url().'Caccounts/tax_edit/'.$tax->tax_id; ?>" class="btnclr btn  btn-sm managetax_edit"  data-toggle="tooltip" data-placement="right" title="" data-original-title="<?php echo display('update') ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                <?php  } ?>
                                                <?php    foreach(  $this->session->userdata('perm_data') as $test){
                                                   $split=explode('-',$test);
                                                   if(trim($split[0])=='tax' && $_SESSION['u_type'] ==3 && trim($split[1])=='0001'){
                                                     
                                                     
                                                      ?>
                                                <a href="<?php echo base_url().'Caccounts/tax_delete/'.$tax->tax_id; ?>" class="btnclr btn  btn-sm" onclick="return confirm('<?php echo display('are_you_sure') ?>')"    data-toggle="tooltip" data-placement="right" title="" data-original-title="<?php echo display('delete') ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                <?php break;}} 
                                                   if($_SESSION['u_type'] ==2){ ?>
                                                <a href="<?php echo base_url().'Caccounts/tax_delete/'.$tax->tax_id; ?>" class="btnclr btn  btn-sm" onclick="return confirm('<?php echo display('are_you_sure') ?>')"    data-toggle="tooltip" data-placement="right" title="" data-original-title="<?php echo display('delete') ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                <?php  } ?>
                                             </center>
                                          </div>
                                       </td>
                                    </tr>
                                    <?php $i++; }}else{ ?>
                                    
                                    	<tr><td style="text-align:center;" colspan="9">No Records Found</td></tr>
                                    <?php    }   ?>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               
  

<!-- Cheaque Manager End -->
<script src="<?php echo base_url()?>assets/js/jquery.bootgrid.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.0.0-alpha.1/jspdf.plugin.autotable.js"></script>
<div id="myModal_colSwitch"  name="mytaxName"    class="modal_colSwitch" >
   <div class="modal-content_colSwitch" style="width:25%;height:20%;">
      <span class="close_colSwitch" style="margin-right:20px">&times;</span>
      <div class="col-sm-1" ></div>
      <div class="col-sm-3" >
         <br>
         <div class="form-group row"  > 
            <br><input type="checkbox"  data-control-column="1"   class="1" value="1"/> &nbsp;<?php echo display('S.No') ?><br>
            <!-- <br><input type="checkbox"  data-control-column="2" checked="checked"   class="2" value="2"/>&nbsp;<?php echo display('Tax');?><br> -->
            <br><input type="checkbox"  data-control-column="3"     class="3 " value="3  "/>&nbsp;<?php  echo  display('Tax ID');?> <br>
          
         </div>
      </div>
      <div class="col-sm-4" >
         <br>
         <div class="form-group row"  >
         <br><input type="checkbox"  data-control-column="4"       class="4" value="4"/>&nbsp;<?php  echo  display('Description');?><br>
         <!-- <br><input type="checkbox"  data-control-column="5" checked="checked"   class="5" value="5"/>&nbsp;<?php  echo  display('Tax Agency');?><br> -->
            <br><input type="checkbox"  data-control-column="6"     class="6" value="6"/>&nbsp;<?php  echo  display('Account');?><br>

           
         </div>
      </div>
      <div class="col-sm-3"  >
      <br>
         <div class="form-group row"  >
         <!-- <br><input type="checkbox"  data-control-column="7"  checked="checked"  class="7" value="7"/>&nbsp;<?php echo display('Show Tax on Return Line');?><br> -->
         <!-- <br><input type="checkbox"  data-control-column="9"  checked="checked"   class="9" value="9"/>&nbsp;<?php echo display('Action');?><br> -->
            <br><input type="checkbox"  data-control-column="8"     class="8" value="8"/>&nbsp;Type<br>
            
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
$(document).ready(function() {
       var localStorageName = "mytaxName"; // Set your desired localStorage name
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

   $(document).on('keyup', '#filterinput', function(){
   
   var value = $(this).val().toLowerCase();
   var filter=$("#filterby").val();
   $("#ProfarmaInvList tr:not(:eq(0))").filter(function() {
       $(this).toggle($(this).find("td."+filter).text().toLowerCase().indexOf(value) > -1)
   });
   });
   
   // $("input:checkbox:not(:checked)").each(function() {
   // var column = "table ." + $(this).attr("value");
   // console.log("Heyy : "+column);
   // $(column).hide();
   // });
   
   // $("input:checkbox").click(function(){
   // var column = "table ." + $(this).attr("value");
   //   console.log("Heyy : "+column);
   // $(column).toggle();
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
    td1 = tr[i].getElementsByTagName("td")[4];
    td2 = tr[i].getElementsByTagName("td")[5];
    td3 = tr[i].getElementsByTagName("td")[6];
    td4 = tr[i].getElementsByTagName("td")[7];




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
   
   // $('#for_numrows,#pagesControllers').hide();

   $(document).ready(function() {
    $("input:checkbox").each(function() {
        var column = ".table ." + $(this).attr("value"); // Adjust the class name here
        var isChecked = localStorage.getItem(column) === "true";
        $(this).prop("checked", isChecked);
        $(column).toggle(isChecked); // Show/hide based on the stored state
    });
    // When a checkbox is clicked, update localStorage and toggle column visibility
    $("input:checkbox").click(function() {
        var column = ".table ." + $(this).attr("value"); // Adjust the class name here
        var isChecked = $(this).is(":checked");
        localStorage.setItem(column, isChecked); // Store checkbox state in localStorage
        $(column).toggle(isChecked); // Show/hide based on the clicked state
    });
});







$(document).ready(function() {
            // Function to store the visibility state of rows in localStorage
            function storeVisibilityState() {
                var manageTaxDetails = {};
                $("#ProfarmaInvList tr").each(function(index, element) {
                    var row = $(element);
                    var rowID = index;
                    var isVisible = row.is(':visible');
                    manageTaxDetails[rowID] = isVisible;
                });
                // Store the visibility states in localStorage
                localStorage.setItem("manageTaxDetails", JSON.stringify(manageTaxDetails));
            }
            // Apply the stored visibility state on page load
            function applyVisibilityState() {
                var storedVisibilityStates = JSON.parse(localStorage.getItem("manageTaxDetails")) || {};
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
            $(".managetax_edit").on('click', function() {
                var row = $(this);
                // row.toggle();
                storeVisibilityState(); // Store the updated visibility state
            });
            applyVisibilityState(); // Apply the stored visibility state on page load
        });






















</script>

<style type="text/css">
   .badge-success {
    color: #fff;
    background-color: #28a745 !important;
}

.badge-info {
    color: #fff;
    background-color: #17a2b8 !important;
}

.select2-selection__rendered{
  display:none;
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
    width: 130px;
  } 
  
  
  
  
  
  
  
  
</style>