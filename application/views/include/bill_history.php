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
   .table{
   display: block;
   overflow-x: auto;
   }
   .btnclr{
   background-color:<?php echo $setting_detail[0]['button_color']; ?>;
   color: black;
   }
   .Row {
   display: table;
   width: 100%; /*Optional*/
   table-layout: fixed; /*Optional*/
   border-spacing: 5px; /*Optional*/
   }
   .Column {
   display: table-cell;
   }
   th {
   padding: 10px !important;
   }
   .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
   vertical-align: middle;
   }
   .search_dropdown{
   background:center;
   }
   /*th{*/
   /*color:black;*/
   /*}*/
   .select2{
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
   width: 110px;
   }
   }
</style>
<div class="content-wrapper">
   <section class="content-header">
      <div class="header-icon">
         <figure class="one">
         <img src="<?php echo base_url()  ?>asset/images/sales.png"  class="headshotphoto" style="height:50px;" />
      </div>
      <div class="header-title">
         <div class="logo-holder logo-9">
            <h1>  <?php echo display('manage_invoice') ?></h1>
         </div>
         <small><?php echo ""; ?></small>
         <ol class="breadcrumb"   style=" border: 3px solid #d7d4d6;"   >
            <li><a href="<?php   echo base_url(); ?>"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
            <li><a href="#"><?php echo display('invoice') ?></a></li>
            <li class="active" style="color:orange;"><?php echo display('manage_invoice') ?></li>
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
         $message = $this->session->userdata('show');
         
         if (isset($message)) {
         
             ?>
      <div class="alert alert-info alert-dismissable" style="background-color:#38469f;color:white;font-weight:bold;">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
         <?php echo $message; ?>                    
      </div>
      <?php
         // $this->session->unset_userdata('message');
         
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
      <div class="panel panel-bd lobidrag" >
         <div class="panel-heading" style="height: 60px;    border: 3px solid #d7d4d6;">
            <div class="col-sm-12 mob_topview" style="height:69px;">
               <div class="col-sm-4" style="display: flex; justify-content: space-between; align-items: left;">
                  <?php foreach($this->session->userdata('perm_data') as $test) {
                     $split = explode('-', $test);
                     if (trim($split[0]) == 'sales' && $_SESSION['u_type'] == 3 && trim($split[1]) == '1000') {
                         ?>
                  <a href="<?php echo base_url('Cinvoice') ?>" class="btnclr btn btn-default dropdown-toggle boxes filip-horizontal mobile_para"   style="height:fit-content;"  ><i class="far fa-file-alt"> </i> <?php echo display('Create Sale') ?> </a>
                  <?php break;
                     }
                     }
                     if ($_SESSION['u_type'] == 2) { ?>
                  <a href="<?php echo base_url('Cinvoice') ?>" class="btnclr btn btn-default dropdown-toggle boxes filip-horizontal mobile_para"   style="height:fit-content;"  ><i class="far fa-file-alt"> </i> <?php echo display('Create Sale') ?> </a>
                  <?php } ?>
                  &nbsp;&nbsp;
                  <!-- <a  class="btnclr btn btn-default dropdown-toggle  boxes filip-horizontal  mobile_para"  style="height:fit-content;"  id="s_icon"><b class="fa fa-search"></b>&nbsp;Advance search  </a> -->
                  &nbsp;&nbsp;
                  <div class="dropdown bootcol" id="drop" style="    width: 300px;">
                     <button class="btnclr btn btn-default dropdown-toggle  boxes filip-horizontal mobile_para" type="button" id="dropdownMenu1" style="float:left;"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" >
                     <span  class="fa fa-download"  ></span> <?php echo display('download') ?>
                     </button>
                     <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li><a href="#" onclick="generate()"> <img src="<?php echo base_url() ?>assets/images/pdf.png" width="24px"> <?php echo display('PDF') ?></a></li>
                        <li class="divider"></li>
                        <li><a href="#" onclick="$('#ProfarmaInvList').tableExport({type:'excel',escape:'false'});"> <img src="<?php echo base_url() ?>assets/images/xls.png" width="24px"> <?php echo display('XLS') ?></a></li>
                     </ul>
                     &nbsp;&nbsp;
                  </div>
               </div>
               <div class="col-sm-6" style="text-align: center;">
                  <?php echo form_open_multipart('Cinvoice/manage_invoice', array('class' => 'form-vertical', 'id' => 'insert_sale', 'name' => 'insert_sale')) ?>
                  <?php
                     $today = date('Y-m-d');
                     ?>            
                  <div class="col-sm-2">
                     <!-- <div class="form-group row"     style="width: 300px;"> -->
                     <div class="form-group" style="display: inline-block; vertical-align: middle;">
                        <input type="text" class="form-control daterangepicker-field mobile_daterangepicker" name="daterangepicker-field"
                           style="padding: 5px;width: 175px;border-radius: 8px;height: 35px;"/>
                        &nbsp; &nbsp; &nbsp;
                     </div>
                  </div>
                  <div class="col-sm-3">
                     <div class="form-group">
                        <button type="submit" class="btn btnclr dropdown-toggle boxes filip-horizontal mob_search" style="float:right;" ><i class="fa fa-search" aria-hidden="true"></i> <?php echo display('search') ?></button> 
                     </div>
                  </div>
                  <?php echo form_close() ?>
               </div>
               <div class="col-sm-2" style="float:right;">
                  <div class="" style="float: right;">  <a onclick="reload();"  id="removeButton">  <i class="fa fa-refresh fa-spin" style="font-size:25px;float:right;" aria-hidden="true"></i> </a>    &nbsp;    &nbsp;    &nbsp;    &nbsp; <i class="fa fa-gear fa-spin"  aria-hidden="true" id="myBtn" style="margin-right:20px;font-size:25px;float:right;" onClick="columnSwitchMODAL()"></i></div>
               </div>
            </div>
            <br>
            <br> 
            <br> 
            <div id="search_area" style="border:4px solid #004d99;border-radius:7px;">
               <table class="table">
                  <thead>
                     <tr class="filters">
                        <th class="search_dropdown" style="width: 22%; color: black;">
                           <span><?php echo display('Invoice No') ?> </span>
                           <select id="pname-filter" class="form-control">
                              <option>Any</option>
                              <?php 
                                 $commercial_invoice_number  = array();
                                 foreach ($invoices as $invoice) {
                                 $commercial_invoice_number [] = $invoice['commercial_invoice_number'];
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
                                 
                                 
                                  foreach($unique_commercial_invoice_number as $invoice){  ?>
                              <option value="<?php echo $invoice; ?>"><?php echo $invoice; ?></option>
                              <?php }  ?>
                           </select>
                        </th>
                        <th class="search_dropdown" style="width: 22%;color: black;">
                           <span>Container No</span>
                           <select id="model-filter" class="form-control">
                              <option>Any</option>
                              <?php foreach($unique_container_no as $invoice){  ?>
                              <option value="<?php echo $invoice; ?>"><?php echo $invoice; ?></option>
                              <?php }  ?>
                           </select>
                        </th>
                        <th class="search_dropdown" style="width: 22%;color: black;">
                           <span>Customer Name </span>
                           <select id="category-filter" class="form-control">
                              <option>Any</option>
                              <?php foreach($unique_customer_name as $invoice){  ?>
                              <option value="<?php echo $invoice; ?>"><?php echo $invoice; ?></option>
                              <?php }  ?>
                           </select>
                        </th>
                        <th class="search_dropdown" style="width: 20%;color: black;">
                           <span>Date</span>
                           <select id="unit-filter" class="form-control">
                              <option>Any</option>
                              <?php foreach($unique_date as $invoice){  ?>
                              <option value="<?php echo $invoice; ?>"><?php echo $invoice; ?></option>
                              <?php }  ?>
                           </select>
                        </th>
                        <th class="search_dropdown" style="width: 310px;color: black;">
                           <span>Payment Terms</span>
                           <select id="supplier-filter" class="form-control">
                              <option>Any</option>
                              <?php foreach($unique_payment_terms as $invoice){  ?>
                              <option value="<?php echo $invoice; ?>"><?php echo $invoice; ?></option>
                              <?php }  ?>
                           </select>
                        </th>
                     </tr>
                  </thead>
               </table>
               <table>
                  <tr>
                     <td style="width:10px;"></td>
                     <td style="width:22%;">   <input type="text" class="form-control"  style="height: inherit;" id="myInput1" onkeyup="search()" placeholder="Search for Invoice No.."></td>
                     <td style="width:10px;"></td>
                     <td style="width:22%;"> <input type="text" class="form-control" style="height: inherit;" id="myInput2" onkeyup="search()" placeholder="Search for Container No.."></td>
                     <td style="width:10px;"></td>
                     <td style="width:20%;">  <input type="text" class="form-control" style="height: inherit;"  id="myInput3" onkeyup="search()" placeholder="Search for Customer Name.."></td>
                     <td style="width:10px;"></td>
                     <td style="width:20%;"> <input type="text" class="form-control" style="height: inherit;"  id="myInput4" onkeyup="search()" placeholder="Search for Date.."></td>
                     <td style="width:10px;"></td>
                     <td style="width: 203px;"> <input type="text" class="form-control"  style="height: inherit;"  id="myInput5" onkeyup="search()" placeholder="Search for Payment Terms.."></td>
                  </tr>
               </table>
               <br/>
               <div class="col-sm-12">
                  <input id="search" type="text" class="form-control" style="height: inherit;"  placeholder="Search for Sale">
                  <br>
               </div>
               <br>
            </div>
         </div>
      </div>
      <div class="panel panel-bd lobidrag" style="padding: 10px;">
         <div class="sortableTable__container">
            <div class="sortableTable__discard">
            </div>
            <div id="customers">
               <table class="table table-bordered" cellspacing="0" width="100%" id="ProfarmaInvList">
                  <thead class="sortableTable">
                     <tr  class="sortableTable__header btnclr">
                        <th class="1 value" data-col="1"      style="width: 80px; height: 40.0114px; text-align:center;" ><?php echo ('S.No') ?></th>
                        <th class="2 value"  data-col="2"    style="height: 45.0114px; width: 234.011px; text-align:center; " > <?php echo display('Invoice No')?></th>
                        <th class="3 value"  data-col="3"   style="width: 248.011px; text-align:center;"        ><?php echo ('Billing Date')?></th>
                        <th class="4 value" data-col="4"    style="width: 198.011px; text-align:center;"       ><?php echo ('Billing Period')?></th>
                        <th class="4 value" data-col="4"    style="width: 198.011px; text-align:center;"       ><?php echo ('Payment Due Date')?></th>
                        <th class="5 value" data-col="5" data-resizable-column-id="5"    style="width: 198.011px; text-align:center;"       ><?php echo ('Status')?></th>
                        <div class="myButtonClass Action">
                           <th class="25 text-center" data-col="25" data-column-id="25" data-formatter="commands" data-sortable="false"   style="  width: 480.011px;  height: 39.0114px; text-align:center;"  ><?php echo display('Action')?></th>
                        </div>
                     </tr>
                  </thead>
                  <tbody class="sortableTable__body" id="tab">
                     <?php
                        // print_r($company_info);die();
                        $count=1;
                          if(count($company_info)>0){
                         foreach($company_info as $k=>$arr){
                              ?>
                     <tr style="text-align:center" class="task-list-row" data-task-id="<?php echo $count; ?>" data-pname="<?php echo $arr['invoice_number'];  ?>" data-model="<?php echo $arr['notification_sent_date']; ?>" data-category="<?php echo $arr['due_date']; ?>" data-unit="<?php echo $arr['bill_period'] ?>" data-supplier="<?php echo $arr['status'];  ?>">
                        <!--<td style="display: none;"><input type="hidden" class="form-control" id="rowinvoice_id" value="<?php echo $arr['invoice_id'];  ?>" /></td>-->
                        <td data-col="1" class="1" style="text-align:center;" ><?php  echo $count;  ?></td>
                        <td data-col="2" class="2" style="text-align:center;"><?php   echo $arr['invoice_number'];  ?></td>
                        <td data-col="3" class="3" style="text-align:center;" ><?php   echo $arr['notification_sent_date'];  ?></td>
                        <td data-col="3" class="3" style="text-align:center;" ><?php   echo $arr['bill_period'];  ?></td>
                        <td data-col="4" class="4" style="text-align:center;" ><?php   echo $arr['due_date'];  ?></td>
                        <td data-col="5" class="5" style="text-align:center;" ><?php   echo $arr['status'];  ?></td>
                        <td data-col="25" class="25" style="text-align:center;">
                           <div class="form-group">
                              <a class="btnclr btn  btn-sm"  href="<?php echo base_url()?>Cinvoice/bill_invoice/<?php echo $arr['id'];  ?>"><i class="fa fa-download" aria-hidden="true"></i></a>
                           </div>
                        </td>
            </div>
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
</div>
</section>
</div> 
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<input type="hidden" id="total_invoice" value="<?php echo $total_invoice;?>" name="">
<input type="hidden" id="currency" value="{currency}" name="">
<input type="hidden" id="base_url" value="<?php  echo base_url();  ?>">
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
   

   ///************** */
   
   
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
    td2 = tr[i].getElementsByTagName("td")[14];
    td3 = tr[i].getElementsByTagName("td")[3];
    td4 = tr[i].getElementsByTagName("td")[11];
   
    if (td && td1 && td2 && td3 && td4) {
      input_pname = (td.textContent || td.innerText).toUpperCase();
      input_model = (td1.textContent || td1.innerText).toUpperCase();
      input_category = (td2.textContent || td2.innerText).toUpperCase();
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
   
   
   
     $(document).ready(function(){
    $('#search_area').hide();
   });
   $('#s_icon').click(function(){
       $('#search_area').toggle();
   });
   
       
</script>
<style>
   th{
   color:black;
   }
   #numrows{
   width: 75px !important;
   }
   /* pagecontroller pagecontroller-n */
   .pagecontroller {
   margin: 5px;
   }
   /* .filip-horizontal:hover{
   background-color: crimson;
   transition: all 1s;
   -webkit-transform: rotateY(-360deg);
   -ms-transform: rotateY(-360deg);
   transform: rotateY(-360deg);
   } */
   .ads{
   max-width: 0px !important;
   white-space: nowrap;
   overflow: hidden;
   text-overflow: ellipsis;
   }
   @media (max-width:1024px){
   #insert_sale{
   display: flex !important;
   justify-content: flex-end !important;
   }
   .mob_topview{
   position: relative;
   right: 33px;
   }
   #removeButton{
   position: absolute;
   left: 145px;
   }
   .fa.fa-gear::before {
   position: absolute;
   left: 111px;
   }
   .mobile_daterangepicker{
   position: relative;
   right: 36px;
   }
   .mob_search{
   position: absolute;
   left: 108px;
   font-size: 11px;
   }
   .mobile_para{
   font-size: 11px !important; 
   }
   }
</style>