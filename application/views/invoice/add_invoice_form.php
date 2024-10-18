<script src="<?php echo base_url() ?>my-assets/js/admin_js/invoice.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>my-assets/js/countrypicker.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>my-assets/js/admin_js/product_country.js" type="text/javascript"></script>
<style>
   /* START SELECT3.css */
   .hidden_button{
   display:none;
   }
   .btnclr{
   background-color:<?php echo $setting_detail[0]['button_color']; ?>;
   color: white;
   }
   .panel-body {
   padding: 10px;
   }
   .removebundle, .addbundle{
   padding: 10px 12px 10px 12px;
   border-radius:5px;
   }
   /*   Bootstrap Country Select CSS  */
   button[data-toggle="dropdown"].btn-default,
   button[data-toggle="dropdown"]:hover {
   background-color: white !important;
   color: #2c3e50 !important;
   border: 2px solid #dce4ec;
   }
   .bootstrap-select:not([class*=col-]):not([class*=form-control]):not(.input-group-btn) {
   width: 420px;
   }
   .cus{
   text-align: center;
   }
   .ui-front{
   display:none;
   }
   #block_container
   {height:40px;
   text-align:center;
   }
   #bloc1, #bloc2
   {text-align:center;
   font-weight:bold;
   display:inline;
   }
   .Row {
   display: table;
   width: 100%; /*Optional*/
   table-layout: fixed; /*Optional*/
   border-spacing: 10px; /*Optional*/
   }
   tfoot tr{
   height: 45px;
   }
   .Column {
   display: table-cell;
   }
   .input-symbol-euro {
   position: absolute;
   font-size: 14px;
   }
   .input-symbol-euro input {
   padding-left: 18px;
   }
   .input-symbol-euro:after {
   position: absolute;
   top: 7px;
   content: '<?php echo $currency; ?>';
   left: 5px;
   }
   /*//front*/
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
   width: 100px;
   }
   }
   
    @media only screen and (min-width:1024px){{
       .mobile_iconcus{
        position: relative !important;
        right: 23px;
       }
   }
   
   @media (min-width: 768px) {
     .mobile_iconcus{
        position: relative !important;
        right: 23px;
       }  
   }
   
   }
   .ads{
   max-width: 0px !important;
   white-space: nowrap;
   overflow: hidden;
   text-overflow: ellipsis;
   }
 
</style>
<!-- Add New Invoice Start -->
<div class="content-wrapper">
<section class="content-header">
   <div class="header-icon">
      <figure class="one">
      <img src="<?php echo base_url()  ?>asset/images/sales.png"  class="headshotphoto" style="height:50px;" />
   </div>
   <div class="header-title">
      <div class="logo-holder logo-9">
         <h1>Create Sale</h1>
      </div>
      <!--   <small><?php echo "" ?></small>-->
      <!--   <ol class="breadcrumb">-->
      <!--      <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>-->
      <!--      <li><a href="#"><?php echo display('invoice') ?></a></li>-->
      <!--      <li class="active" style="color:orange;"> <?php echo display('Create Sale') ?></li>-->
      <!--   </ol>-->
      <!--</div>-->
      <small><?php echo "" ?></small>
      <ol class="breadcrumb" style="border: 3px solid #d7d4d6;">
         <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
         <li><a href="#"><?php echo display('invoice') ?></a></li>
         <li class="active" style="color:orange;"> <?php echo display('Create Sale') ?></li>
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
   <!--Add Invoice -->
   <div class="row">
      <div class="col-sm-12">
         <div class="panel panel-bd lobidrag" style="border: 3px solid #d7d4d6;" >
            <div class="panel-heading">
               <div class="panel-title">
                  <div id="block_container">
                     <div id="bloc1" style="float:left;">
                        <h4><?php //echo "Create Invoice" ?></h4>
                     </div>
                     <div id="bloc2" style="float:right;">
                        <?php //if($this->permission1->method('manage_invoice','read')->access()){ ?>
                        <a   href="<?php echo base_url('Cinvoice/manage_invoice') ?>" class="btnclr btn  m-b-5 m-r-2"><i class="ti-align-justify"> </i> <?php echo display('manage_invoice') ?> </a>
                        <?php //}?>
                     </div>
                  </div>
               </div>
            </div>
            <?php    $payment_id=rand(); ?>
            <form id="histroy" style="display:none;" method="post" >
               <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
               <input type="hidden"  value="<?php echo $payment_id; ?>" name="payment_id" class="payment_id" id="payment_id"/>
               <input type="submit" id="payment_history" name="payment_history" class="btn" style="float:right;color:white;background-color: #38469f;" value="Payment History" style="float:right;margin-bottom:30px;"/>
            </form>
            <div class="panel-body">
               <form id="insert_trucking"  method="post">
                  <div class="row">
                     <div class="col-sm-6" id="payment_from_1">
                        <div class="form-group row">
                           <label for="customer_name" class="col-sm-4 col-form-label"><?php
                              echo display('customer_name');
                              ?><i class="text-danger">*</i> </label>
                           <div class="col-sm-7">
                              <select name="customer_name" required class="form-control customer_name" onselect="calculate();" id="customer_name" style="border:2px solid #d7d4d6;" >
                                 <option value=""><?php echo display('Select Customer'); ?></option>
                                 <?php foreach($customer_details as $customer){?>
                                 <option value="<?php echo html_escape($customer['customer_id'])?>"><?php echo html_escape($customer['customer_name']);?></option>
                                 <?php }?>
                              </select>
                              <input id="autocomplete_customer_id" class="customer_hidden_value abc" style="border: 2px solid #d7d4d6;"  type="hidden" name="customer_id"  >
                           </div>
                           <div class="col-sm-1 mobile_iconcus">
                              <?php //if($this->permission1->method('add_customer','create')->access()){ ?>
                              <a href="#" class="client-add-btn btn btnclr" aria-hidden="true" data-toggle="modal" data-target="#cust_info"><i class="fa fa-user-circle"></i></a>
                              <?php //} ?>
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-6" id="payment_from">
                        <div class="form-group row">
                           <label for="payment_type" class="col-sm-4 col-form-label"><?php
                              echo display('payment_type');
                              ?> </label>
                           <div class="col-sm-7">
                              <select name="paytype" id="paytype" class="form-control"  style="border: 2px solid #d7d4d6;"   tabindex="3" style="width100">
                                 <option value=""> <?php echo display('Select Payment Type') ?></option>
                                 <?php  foreach($payment_typ as $pt){ ?>
                                 <option value="<?php  echo $pt['payment_type'] ;?>"><?php  echo $pt['payment_type'] ;?></option>
                                 <?php  } ?>
                              </select>
                           </div>
                           <div  class=" col-sm-1 mobile_iconcus">
                              <a  class="client-add-btn btn btnclr" aria-hidden="true" id="myBtn2"  data-toggle="modal" data-target="#payment_Type" ><i class="fa fa-plus"></i></a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                  <input type="hidden" id="invoice_hdn"/> <input type="hidden" id="invoice_hdn1"/>
                  <input type="hidden"  value="<?php echo $payment_id; ?>"  name="payment_id"/>
                  <div class="row">
                     <div class="col-sm-6">
                        <div class="form-group row">
                           <label for="date" class="col-sm-4 col-form-label"><?php echo display('Sales Invoice date') ?> <i class="text-danger">*</i></label>
                           <div class="col-sm-8">
                              <?php
                                 $date = date('Y-m-d');
                                 ?>
                              <input class=" form-control" type="date" size="50" name="invoice_date" style="border: 2px solid #d7d4d6;"  id="date" required value="<?php echo html_escape($date); ?>" tabindex="4" />
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="billing_address" class="col-sm-4 col-form-label"><?php echo display('Billing Address') ?><i class="text-danger">*</i></label>
                           <div class="col-sm-8">
                              <!--<textarea rows="5" cols="50" name="billing_address" class="form-control" style="border: 2px solid #d7d4d6;"  placeholder='Billing Address' id="billing_address"> </textarea>-->
                              <textarea rows="5" cols="50" style="border:2px solid #d7d4d6;" name="billing_address" class="form-control" placeholder='Billing Address' id="billing_address"></textarea>
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="shipping_address" class="col-sm-4 col-form-label"><?php echo display('Shipping Address') ?></label>
                           <div class="col-sm-8">
                              <!--<textarea rows="5" cols="50" name="shipping_address" class="form-control" placeholder='Shipping Address' id="shipping_address"> </textarea>-->
                              <textarea rows="5" cols="50" style="border:2px solid #d7d4d6;" name="shipping_address" class="form-control" placeholder='Shipping Address' id="shipping_address"></textarea>
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="payment_terms" class="col-sm-4 col-form-label"><?php echo display('Payment Terms') ?><i class="text-danger">*</i></label>
                           <div class="col-sm-7">
                              <select   name="terms" id="terms" class=" form-control"   style="border: 2px solid #d7d4d6;"  required>
                                 <option   value=""><?php echo display('Select Payment Terms') ?></option>
                                 <option value="CAD">CAD</option>
                                 <option value="COD">COD</option>
                                 <option value="ADVANCE">ADVANCE</option>
                                 <option value="7DAYS">7 DAYS</option>
                                 <option value="15DAYS">15 DAYS</option>
                                 <option value="30DAYS">30 DAYS</option>
                                 <option value="45DAYS">45 DAYS</option>
                                 <option value="60DAYS">60 DAYS</option>
                                 <option value="75DAYS">75 DAYS</option>
                                 <option value="90DAYS">90 DAYS</option>
                                 <option value="180DAYS">180 DAYS</option>
                                 <?php foreach($payment_terms as $inv){ ?>
                                 <option value="<?php echo $inv['payment_terms'] ; ?>"><?php echo $inv['payment_terms'] ; ?></option>
                                 <?php    }?>
                              </select>
                           </div>
                           <div class="col-sm-1 mobile_iconcus">
                              <a href="#" class="client-add-btn btn btnclr" aria-hidden="true"  data-toggle="modal" data-target="#payment_type_new" ><i class="fa fa-plus"></i></a>
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="account_category" class="col-sm-4 col-form-label">Account Category</label>
                           <div class="col-sm-8">
                              <select id="ddl"  name="account_category" class="form-control" style="border: 2px solid #d7d4d6;"  onchange="configureDropDownLists(this,document.getElementById('ddl2'))">
                                 <option value="">Select the Account Category</option>
                                 <option value="ASSETS"><?php echo  display('ASSETS');?></option>
                                 <option value="RECEIVABLES"><?php echo  display('RECEIVABLES');?></option>
                                 <option value="INVENTORIES"><?php echo  display('INVENTORIES');?></option>
                                 <option value="PREPAID EXPENSES & OTHER CURRENT ASSETS"><?php echo  display('PREPAID EXPENSES & OTHER CURRENT ASSETS');?></option>
                                 <option value="PROPERTY PLANT & EQUIPMENT"><?php echo  display('PROPERTY PLANT & EQUIPMENT');?></option>
                                 <option value="ACCUMULATED DEPRECIATION & AMORTIZATION"><?php echo  display('ACCUMULATED DEPRECIATION & AMORTIZATION');?></option>
                                 <option value="NON – CURRENT RECEIVABLES"><?php echo  display('NON – CURRENT RECEIVABLES');?></option>
                                 <option value="INTERCOMPANY RECEIVABLES & OTHER NON-CURRENT ASSETS"><?php echo  display('INTERCOMPANY RECEIVABLES & OTHER NON-CURRENT ASSETS');?></option>
                                 <option value="LIABILITIES & PAYABLES"><?php echo  display('LIABILITIES & PAYABLES');?></option>
                                 <option value="ACCRUED COMPENSATION & RELATED ITEMS"><?php echo  display('ACCRUED COMPENSATION & RELATED ITEMS');?></option>
                                 <option value="OTHER ACCRUED EXPENSES"><?php echo  display('OTHER ACCRUED EXPENSES');?></option>
                                 <option value="ACCRUED TAXES"><?php echo  display('ACCRUED TAXES');?></option>
                                 <option value="DEFERRED TAXES"><?php echo  display('DEFERRED TAXES');?></option>
                                 <option value="LONG-TERM DEBT"><?php echo  display('LONG-TERM DEBT');?></option>
                                 <option value="INTERCOMPANY PAYABLES & OTHER NON CURRENT LIABILITIES & OWNERS EQUITIES"><?php echo  display('INTERCOMPANY PAYABLES & OTHER NON CURRENT LIABILITIES & OWNERS EQUITIES');?></option>
                                 <option value="REVENUE"><?php echo  display('REVENUE');?></option>
                                 <option value="COST OF GOODS SOLD"><?php echo  display('COST OF GOODS SOLD');?></option>
                                 <option value="OPERATING EXPENSES"><?php echo  display('OPERATING EXPENSES');?></option>
                              </select>
                           </div>
                        </div>
                        <div class="form-group row">
                           <label  class="col-sm-4 col-form-label">Account Subcategory</label>
                           <div class="col-sm-8">
                              <input class="form-control" name ="account_subcat" id="account_subcat" type="text" style="border: 2px solid #d7d4d6;"  placeholder=" Account Sub Category"  tabindex="1" >
                           </div>
                        </div>
                            <?php
                     if($_SESSION['u_type']==3)
                                 { ?>
                        <input type="hidden"  name="emp_id"  id="emp_id"  value="<?php  echo $get_user_id[0]['user_id'] ;?>" >
                        <?php   }
                      if($_SESSION['u_type']==2)
                        { ?>
                        <div class="form-group row">
                           <label for="sold_by" class="col-sm-4 col-form-label">Sold By</label>
                           <div class="col-sm-7">
                           <select name="emp_id" id="emp_id" class="form-control" style="border: 2px solid #D7D4D6;" tabindex="4">
                           <option value=""> <?php echo ('Select Employee / Sales Partner') ?></option>
                           <?php foreach($employee_id_get as $pt) { ?>
                           <option value="<?php echo $pt['id']; ?>"><?php echo $pt['first_name'] . ' ' . $pt['last_name']; ?></option>
                           <?php } ?>
                           <?php foreach($get_agent_data as $agent) { ?>
                           <option value="<?php echo $agent['id']; ?>"><?php echo $agent['agent_name']; ?></option>
                           <?php } ?>
                           </select>
                           <input type="hidden" name="selected_text" id="selected_text" >
                           </div>
                           <div class="col-sm-1 mobile_iconcus">
                              <!-- <a href="#" class="client-add-btn btn btnclr" aria-hidden="true"  data-toggle="modal" data-target="#add_agent" ><i class="fa fa-plus"></i></a> -->

                              <a href="#" class="client-add-btn btn btnclr" aria-hidden="true"  data-toggle="modal" data-target="#checkemployeeModal" ><i class="fa fa-plus"></i></a>
                           </div>
                           </div>
                           <?php   } ?>
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group row">
                           <label for="date" class="col-sm-4 col-form-label"> <?php echo display('invoice_no') ?><i class="text-danger">*</i></label>
                           <div class="col-sm-8">
                              <input class="form-control" id="invoice" placeholder="Commercial Invoice Number" type="text" name="commercial_invoice_number"  value="<?php if(!empty($voucher_no[0]['voucher'])){
                                 $curYear = date('Y');
                                 $month = date('m');
                                 $vn = substr($voucher_no[0]['voucher'],9)+1;
                                 echo $voucher_n = 'NS'. $curYear.$month.'-'.$vn;
                                 }else{
                                     $curYear = date('Y');
                                 $month = date('m');
                                 echo $voucher_n = 'NS'. $curYear.$month.'-'.'1';
                                 } ?>"  />
                           </div>
                           <input class="form-control" type="hidden" name="attachment_id" id="attachment_id"  value="<?php if(!empty($voucher_no[0]['voucher'])){
                              $curYear = date('Y');
                              $month = date('m');
                              $vn = substr($voucher_no[0]['voucher'],9)+1;
                              echo $voucher_n = 'NS'. $curYear.$month.'-'.$vn;
                              }else{
                                  $curYear = date('Y');
                              $month = date('m');
                              echo $voucher_n = 'NS'. $curYear.$month.'-'.'1';
                              } ?>" readonly />
                        </div>
                        <div class="form-group row">
                           <label for="container_number" class="col-sm-4 col-form-label"><?php echo display('Container Number') ?> </label>
                           <div class="col-sm-8">
                              <input type="text" name="container_no" style="border: 2px solid #d7d4d6;" placeholder="Container Number"   class="form-control">
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group row">
                           <label for="date" class="col-sm-4 col-form-label"><?php echo display('B/L No') ?></label>
                           <div class="col-sm-8">
                              <input type="text" name="bl_no"  style="border: 2px solid #d7d4d6;"  placeholder="B/L No"  class="form-control">
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="port_of_discharge" class="col-sm-4 col-form-label">  <?php echo display('Payment Due date') ?><i class="text-danger">*</i></label>
                           <div class="col-sm-8">
                              <input class="form-control" type="date" size="50" name="payment_due_date" id="payment_due_date"  style="border: 2px solid #d7d4d6;"   required  tabindex="4" />
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="ETA" class="col-sm-4 col-form-label"><?php echo display('Estimated Time of Arrival') ?> </label>
                           <div class="col-sm-8">
                              <input class="form-control" type="date" size="50" name="eta" id="date2" style="border: 2px solid #d7d4d6;"   tabindex="4" />
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="ETA" class="col-sm-4 col-form-label"> <?php echo display('Estimated Time of Departure') ?></label>
                           <div class="col-sm-8">
                              <input type="date" name="etd"  style="border: 2px solid #d7d4d6;" class="form-control">
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="port_of_discharge" class="col-sm-4 col-form-label">  <?php echo display('Port Of Discharge') ?></label>
                           <div class="col-sm-8">
                              <input class="form-control" type="" size="50" name="Port_of_discharge" style="border: 2px solid #d7d4d6;" placeholder="Port Of Discharge" id="date1"   tabindex="4" />
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="port_of_discharge" class="col-sm-4 col-form-label">Account Subcategory</label>
                           <div class="col-sm-8">
                              <select class="form-control" style="border: 2px solid #d7d4d6;" name="sub_category"   placeholder="Account Subcategory"  id="ddl2">
                                 <option value="" disabled>Select Sub Category</option>
                              </select>
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="ETA" class="col-sm-4 col-form-label"><?php echo display('Attachments ') ?></label>
                           <div class="col-sm-6">
                              <p>
                                 <label for="attachment">
                                 <a class="btnclr btn   text-light" role="button" aria-disabled="false"><i class="fa fa-upload"></i>&nbsp; Choose Files</a>
                                 </label>
                                 <!-- <p id="msg"></p> -->
                                 <!-- <input type="hidden" name="sub_menu" value="ocean_export_tracking"> -->
                                 <input type="file" name="files[]" class="upload" id="attachment" style="visibility: hidden; position: absolute;" multiple/>
                              </p>
                              <p id="files-area">
                                 <span id="filesList">
                                 <span id="files-names"></span>
                                 </span>
                              </p>
                              <!-- <input type="file" name="image" class="form-control" multiple> -->
                           </div>
                        </div>
                        
                  
                        
                     </div>
                  </div>
                  <br>
                  <style>
                     .taxtab {
                     table-layout: fixed;
                     width: 100%;
                     text-align: center;
                     border-collapse: collapse;
                     }
                     .taxtab td{
                     border: 1px solid #dddddd;
                     padding: 8px;
                     }
                     table th{
                     font-size:12px;
                     }
                     input[type=number]::-webkit-inner-spin-button, 
                     input[type=number]::-webkit-outer-spin-button { 
                     -webkit-appearance: none;
                     -moz-appearance: none;
                     appearance: none;
                     margin: 0; 
                     }
                  </style>
                  <div class="table-responsive">
                     <div id="content" style="overflow-x: auto;">
                        <table class="table normalinvoice table-bordered table-hover" id="normalinvoice_1" style="border:2px solid #d7d4d6;" >
                           <thead>
                              <tr>
                                 <th rowspan="2" class="text-center" style="width:170px;" ><?php echo display('product_name') ?><i class="text-danger">*</i>  &nbsp;&nbsp; </th>
                                 <th rowspan="2" class="text-center" ><?php echo display('Bundle No') ?><i class="text-danger">*</i></th>
                                 <th rowspan="2"  class="text-center"><?php echo display('Description') ?></th>
                                 <th rowspan="2" class="text-center" style="width:60px;"><?php echo display('Thick ness') ?><i class="text-danger">*</i></th>
                                 <th rowspan="2" class="text-center"><?php echo display('Supplier Block No') ?><i class="text-danger">*</i></th>
                                 <th rowspan="2" class="text-center" ><?php echo display('Supplier Slab No') ?><i class="text-danger">*</i> </th>
                                 <th colspan="2"   style="width:150px;" class="text-center"><?php echo display('Gross Measurement') ?><i class="text-danger">*</i> </th>
                                 <th rowspan="2" class="text-center"><?php echo display('Gross Sq.Ft') ?></th>
                                 <th rowspan="2" style="width:40px;" class="text-center"><?php echo display('Slab No') ?><i class="text-danger">*</i></th>
                                 <th colspan="2"  style="width:150px;" class="text-center"><?php echo display('Net Measure') ?><i class="text-danger">*</i></th>
                                 <th rowspan="2" class="text-center"><?php echo display('Net Sq.Ft') ?></th>
                                 <th rowspan="2"  class="text-center"><?php echo display('Cost per Sq.Ft') ?></th>
                                 <th rowspan="2"  class="text-center"><?php echo display('Cost per Slab') ?></th>
                                 <th rowspan="2" class="land_th" style="width: 100px" class="text-center"><?php echo "Landing Cost per Sq.Ft" ?></th>
                                 <th rowspan="2" class="land_th" style="width: 100px" class="text-center"><?php echo "Landing Cost per Slab" ?></th>
                                 <th rowspan="2"  class="text-center"><?php echo display('Sales') ?><br/><?php echo display('Price per Sq.Ft') ?></th>
                                 <th rowspan="2"  class="text-center"><?php echo display('Sales Slab Price') ?></th>
                                 <th rowspan="2" class="text-center"><?php echo display('Weight') ?></th>
                                 <th rowspan="2" style="width: 100px" class="text-center"><?php echo display('total') ?></th>
                                 <th rowspan="2" class="text-center"><?php echo display('Action') ?></th>
                              </tr>
                              <tr>
                                 <th class="text-center"><?php echo display('Width') ?></th>
                                 <th class="text-center"><?php echo display('Height') ?></th>
                                 <th class="text-center"  ><?php echo display('Width') ?></th>
                                 <th class="text-center" ><?php echo display('Height') ?></th>
                              </tr>
                           </thead>
                           <style>
                              input{
                              border:none;
                              }
                              textarea:focus, input:focus{
                              outline: none;
                              }
                              .text-right {
                              text-align: left; 
                              }
                              .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
                              padding:5px;
                              }
                              table {
                              table-layout: fixed;
                              width: 100px;> 1
                              }
                              th,
                              td {
                              word-wrap: break-word
                              border: 1px solid black;
                              width: 80px;
                              }
                              .select2 {
                              display:none;
                              }
                              #download_select:focus option:first-of-type , #print_select:focus option:first-of-type{
                              display: none;
                              }
                           </style>
                           <tbody class="tbody" id="addPurchaseItem_1">
                              <tr>
                                 <td>
                                    <input type="hidden" name="tableid[]" id="tableid_1"/>
                                    <input list="magicHouses" name="prodt[]" id="prodt_1"  style="width:160px;" class="form-control product_name"  placeholder="Search Product"       onchange="this.blur();" />
                                    <datalist id="magicHouses">
                                       <?php                                
                                          foreach($product as $tx){?>
                                       <option value="<?php echo $tx['product_name'].'-'.$tx['product_model'];?>">  <?php echo $tx['product_name'].'-'.$tx['product_model'];  ?></option>
                                       <?php } ?>
                                    </datalist>
                                    <input type='hidden' class='common_product autocomplete_hidden_value  product_id_1' name='product_id[]' id='SchoolHiddenId_1' />
                                 </td>
                                 <td>
                                    <input list="magic_bundle" name="bundle_no[]" id="bundle_no_1"   class="form-control bundle_no"  placeholder="Search Product"  onchange="this.blur();" />
                                    <datalist id="magic_bundle">
                                       <?php                                
                                          foreach($bundle as $tx){?>
                                       <option value="<?php echo $tx['bundle_no'];?>">  <?php echo $tx['bundle_no'];  ?></option>
                                       <?php } ?>
                                    </datalist>
                                    <!-- <input type="text" id="bundle_no_1" name="bundle_no[]" required="" class="bundle_no form-control" /> -->
                                 </td>
                                 <td>
                                    <input type="text" id="description_1" name="description[]" class="form-control" />
                                 </td>
                                 <td >
                                    <input type="text" name="thickness[]" id="thickness_1" required="" class="form-control"/>
                                 </td>
                                 <td>
                                    <input list="magic_supplier_block" name="supplier_block_no[]"  id="supplier_b_no_1"   class="form-control supplier_block_no"  placeholder="Search Product"        onchange="this.blur();" />
                                    <datalist id="magic_supplier_block">
                                       <?php                                
                                          foreach($supplier_block_no as $tx){?>
                                       <option value="<?php echo $tx['supplier_block_no'];?>">  <?php echo $tx['supplier_block_no'];  ?></option>
                                       <?php } ?>
                                    </datalist>
                                 </td>
                                 <td >
                                    <input type="text"  id="supplier_s_no_1" name="supplier_slab_no[]" required="" class="form-control"/>
                                 </td>
                                 <td>
                                    <input type="text" id="gross_width_1" name="gross_width[]" required="" class="gross_width  form-control" />
                                 </td>
                                 <td>
                                    <input type="text" id="gross_height_1" name="gross_height[]"  required="" class="gross_height form-control" />
                                 </td>
                                 <td >
                                    <input type="text"   style="width:60px;" readonly id="gross_sq_ft_1" name="gross_sq_ft[]" class="gross_sq_ft form-control"/>
                                 </td>
                                 <td style="text-align:center;" >
                                    <input type="text"   style="width:20px;" value="1" class="slab_no" id="slab_no_1" name="slab_no[]"  readonly  required=""/> 
                                 </td>
                                 <td>
                                    <input type="text" id="net_width_1" name="net_width[]"  required="" class="net_width form-control" />
                                 </td>
                                 <td>
                                    <input type="text" id="net_height_1" name="net_height[]"   required="" class="net_height form-control" />
                                 </td>
                                 <td >
                                    <input type="text"   style="width:60px;" readonly id="net_sq_ft_1" name="net_sq_ft[]" class="net_sq_ft form-control"/>
                                 </td>
                                 <td>
                                    <span class="input-symbol-euro"><input type="text" id="cost_sq_ft_1"  name="cost_sq_ft[]"  readonly  style="width:70px;" value="0.00"  class="cost_sq_ft form-control" ></span>
                                 <td >
                                    <span class="input-symbol-euro"> <input type="text"  id="cost_sq_slab_1" name="cost_sq_slab[]"  readonly  style="width:70px;" value="0.00"  class="cost_sq_slab form-control"/></span>
                                 </td>
                                 <td>
                                    <span class="input-symbol-euro">  <input type="text" id="sales_amt_sq_ft_1"  name="sales_amt_sq_ft[]"  style="width:70px;"  placeholder="0.00" class="sales_amt_sq_ft form-control" /></span>
                                 </td>
                                 <td >
                                    <span class="input-symbol-euro">   <input type="text"  id="sales_slab_amt_1" name="sales_slab_amt[]"  style="width:70px;" placeholder="0.00"  class="sales_slab_amt form-control"/>
                                 </td>
                                 </span>
                                 </td>
                                 <td>
                                    <input type="text" id="weight_1" name="weight[]"  class="weight form-control" />
                                 </td>
                                 <td >
                                    <span class="input-symbol-euro"><input  type="text" class="total_price form-control" style="width:80px;" readonly value="0.00"  id="total_amt_1"     name="total_amt[]"/></span>
                                 </td>
                                 <td style="text-align:center;">
                                    <button  class='delete btn btn-danger' id="delete_1" type='button' value='Delete'><i class="fa fa-trash"></i></button>
                                 </td>
                              </tr>
                           </tbody>
                           <tfoot>
                              <tr>
                                 <td style="text-align:right;" colspan="8"><b><?php echo display('Gross Sq.Ft') ?> </b></td>
                                 <td >
                                    <input type="text" id="overall_gross_1" name="overall_gross[]"   class="overall_gross form-control" style="width: 60px"  readonly="readonly"  /> 
                                 </td>
                                 <td style="text-align:right;" colspan="3"><b><?php echo display('Net Sq.Ft') ?> :</b></td>
                                 <td >
                                    <input type="text" id="overall_net_1" name="overall_net[]"  class="overall_net form-control"  style="width: 60px"  readonly="readonly"  /> 
                                 </td>
                                 <td >
                                    <input type="text" id="costpersqft_1" name="costpersqft[]"  class="costpersqft form-control"  style="width: 60px"  readonly="readonly"  /> 
                                 </td>
                                 <td >
                                    <input type="text" id="costperslab_1" name="costperslab[]"  class="costperslab form-control"  style="width: 60px"  readonly="readonly"  /> 
                                 </td>
                                 <td class="lc">
                                    <input type="text" id="landingpersqft_1" name="landingpersqft[]"  class="landingpersqft form-control"  style="width: 60px"  readonly="readonly"  /> 
                                 </td>
                                 <td class="lc">
                                    <input type="text" id="landingperslab_1" name="landingperslab[]"  class="landingperslab form-control"  style="width: 60px"  readonly="readonly"  /> 
                                 </td>
                                 <td >
                                    <input type="text" id="salespricepersqft_1" name="salespricepersqft[]"  class="salespricepersqft form-control"  style="width: 60px"  readonly="readonly"  /> 
                                 </td>
                                 <td >
                                    <input type="text" id="salesslabprice_1" name="salesslabprice[]"  class="salesslabprice form-control"  style="width: 60px"  readonly="readonly"  /> 
                                 </td>
                                 <td >
                                    <input type="text" id="overall_weight_1" name="overall_weight[]"  class="overall_weight form-control"  style="width: 70px"  readonly="readonly"  /> 
                                 </td>
                                 <td >
                                    <span class="input-symbol-euro">    <input type="text" id="Total_1" name="total[]"   class="b_total form-control"  style="width: 80px" value="0.00"  readonly="readonly"  /> </span>
                                 </td>
                              </tr>
                           </tfoot>
                        </table>
                        <i id="buddle_1" class="btnclr addbundle fa fa-plus" style="margin-right:25px; padding: 10px 12px 10px 12px;float:right;color:white;"   onclick="addbundle(); "aria-hidden="true"></i>
                     </div>
                     <table class="taxtab table table-bordered table-hover" style="border:2px solid #d7d4d6;" >
                        <tr>
                           <td class="hiden" style="width:31%;border:none;text-align:end;font-weight:bold;">
                              <?php echo display('Live Rate') ?> : 
                           </td>
                           <td class="hiden btnclr" style="width:13%;text-align-last: center;padding:5px; border:none;font-weight:bold;color:white;">1 <?php  echo $curn_info_default;  ?>
                              = <input style="width: 80px;text-align:center;color:black;padding:5px;" type="text" class="custocurrency_rate"/>&nbsp;<label for="custocurrency"  ></label>
                           </td>
                           <td style="border:none;text-align:right;font-weight:bold;"><?php echo display('Tax') ?> : 
                           </td>
                           <td style="width:12%">
                              <!-- <select name="tx"  id="product_tax" class="form-control" >
                                 <option value="Select the Tax" selected="selected"><?php echo display('Select the Tax') ?></option>
                                 <?php foreach($tax as $tx){?>
                                   
                                     <option value="<?php echo $tx['tax_id'].'-'.$tx['tax'].'%';?>">  <?php echo $tx['tax_id'].'-'.$tx['tax'].'%';  ?></option>
                                 <?php } ?>
                                 </select> -->
                              <input list="magic_tax" name="tx"  id="product_tax" class="form-control"   onchange="this.blur();" />
                              <datalist id="magic_tax">
                                 <?php                                
                                    foreach($tax_data as $tx){?>
                                 <option value="<?php echo $tx['tax_id'].'-'.$tx['tax'].'%';?>">  <?php echo $tx['tax_id'].'-'.$tx['tax'].'%';  ?></option>
                                 <?php } ?>
                              </datalist>
                           </td>
                           <td  style="width:20%;"><a href="#" class="client-add-btn btn btnclr" aria-hidden="true" style="color:white;  margin-right: 295px;"  data-toggle="modal" data-target="#tax_info" ><i class="fa fa-plus"></i></a></td>
                        </tr>
                     </table>
                     <input type="hidden" id="paid_convert" name="paid_convert"/>   <input type="hidden" id="bal_convert" name="bal_convert"/>
                     <table border="0" style="table-layout: auto;" class="overall table table-bordered table-hover" style="border:2px solid #d7d4d6;" >
                        <tr>
                           <td   style="vertical-align:top;text-align:right;border:none;"></td>
                           <td  style="text-align:right;border:none;"></td>
                           <td  style="text-align:right;border:none;"></td>
                           <td  style="text-align:right;border:none;"> </td>
                        </tr>
                        <tr>
                           <td  colspan="2" style="vertical-align:top;text-align:right;border:none;"><b><?php echo display('Overall TOTAL') ?> :</b></td>
                           <td colspan="1" style="border:none;padding-bottom: 40px;"><span class="input-symbol-euro"><input type="text" id="Over_all_Total" name="Over_all_Total"  style="width:260px;" class="form-control" value="0.00"  readonly="readonly"  /> </span></td>
                           <td colspan="4" style="text-align:right;border:none;"><b><?php echo display('TAX DETAILS') ?> :</b></td>
                           <td colspan="1" style="border:none;">  <span class="input-symbol-euro">     <input type="text" class="form-control" style="width:150px;"  id="tax_details" value="0.00" name="tax_details"  readonly="readonly" /></span></td>
                        </tr>
                        <tr>
                           <td  colspan="2" style="vertical-align:top;text-align:right;border:none;"><b><?php echo display('Overall Gross Sq.Ft') ?> :</b></td>
                           <td colspan="1" style="border:none;"><input type="text" id="total_gross" name="total_gross"   class="form-control"   readonly="readonly"  /> </td>
                           <td colspan="4" style="text-align:right;border:none;"><b><?php echo display('GRAND TOTAL ') ?>:</b></td>
                           <td colspan="1" style="border:none;">  <span class="input-symbol-euro">    <span class="input-symbol-euro">   <input type="text" id="gtotal"   class="form-control" style="width:150px;" name="gtotal" value="0.00"  readonly="readonly" /></td>
                        </tr>
                        <tr>
                           <td  colspan="2" style="vertical-align:top;text-align:right;border:none;"><b><?php echo display('Overall Net Sq.Ft') ?> :</b></td>
                           <td colspan="1" style="border:none;"><input type="text" id="total_net" name="total_net"  class="form-control"    readonly="readonly"  /> </td>
                           <td colspan="4" style="text-align:right;border:none;"><b><?php echo display('GRAND TOTAL') ?> :<br/><?php echo display('Preferred Currency') ?></b></td>
                           <td colspan="1" style="border:none;">
                              <table>
                                 <tr>
                                    <td class="cus" name="cus" style="width: 40px;"></td>
                                    <td style="width: 20px;">&nbsp</td>
                                    <td><input  type="text"  readonly id="customer_gtotal"     name="customer_gtotal"  required   /></td>
                                 </tr>
                              </table>
                           </td>
                        </tr>
                        <tr>
                           <td colspan="2"  style="vertical-align:top;text-align:right;border:none;"><b><?php echo display('Overall Weight') ?> :</b></td>
                           <td colspan="1" style="border:none;"><input type="text" id="total_weight" name="total_weight"   class="form-control"   readonly="readonly"  /></td>
                           <td colspan="4" class="amt" style="text-align:right;border:none;"><b><?php echo display('Amount Paid') ?> :</b></td>
                           <td style="border:none;">
                              <table border="0">
                                 <tr class="amt">
                                    <td class="cus" name="cus" style="width: 40px;"></td>
                                    <td style="width: 20px;">&nbsp</td>
                                    <td> <input  type="text"  readonly id="amount_paid" style="width:-webkit-fill-available;"  name="amount_paid"  required   /></td>
                                 </tr>
                              </table>
                           </td>
                        </tr>
                        <tr>
                           <td colspan="2"  style="vertical-align:top;text-align:right;border:none;"></td>
                           <td colspan="1" style="border:none;"></td>
                           <td class="amt" colspan="4"  style="vertical-align:top;text-align:right;border:none;"><b><?php echo display('Balance Amount') ?> :</b></td>
                           <td class="amt" style="border:none;" colspan="1">
                              <table border="0">
                                 <tr class="amt">
                                    <td class="cus" name="cus" style="border:none;width: 40px;"></td>
                                    <td style="width: 20px;">&nbsp</td>
                                    <td>    <input  type="text"   readonly id="balance"  name="balance"  required   />                     
                                    </td>
                                 </tr>
                              </table>
                           </td>
                        </tr>
                        <input type="hidden" id="final_gtotal"  name="final_gtotal" />
                        <input type="hidden" name="baseUrl" class="baseUrl" value="<?php echo base_url();?>"/></td>
                        <tr style="border-right:none;border-left:none;border-bottom:none;border-top:none">
                           <td colspan="21" style="text-align: end;">
                              <input type="submit" value="<?php echo "Additional Cost"; ?>" style="color:white; " class="btnclr btn btn-large" id="landing_cost"/>
                              <input type="submit" value="<?php echo display('Make Payment') ?>" style="color:white; " class="btnclr btn btn-large" id="paypls"/>
                           </td>
                        </tr>
                        </tfoot>
                     </table>
                  </div>
                  <div class="form-group row">
                     <div class="col-sm-12 ">
                        <table>
                        <tr>
                           <td>
                              <input type="submit" id="add_purchase"   class="btn btn-large btnclr" name="add-packing-list" value=<?php echo display('Save') ?>>
                           </td>
                           <td class="hidden_button"> 
                              <a    id="final_submit"   class='final_submit btn btnclr'> <?php echo display('submit') ?></a>
                           </td>
                            <td class="hidden_button">         
                     <select name="download_select" id="download_select" class="form-control"   style="background-color:<?php echo $setting_detail[0]['button_color']; ?>; color:white;width:auto;"  >
                     <option value="Download"  class="btnclr"   selected><?php echo display('Download') ?></option>
                     <option value="Invoice" ><?php echo display('New Invoice') ?></option>
                     <option value="Packing" ><?php echo display('Packing List') ?></option>
                     </select>
                     </td>       
                            <td style="width:20px;" class="hidden_button"></td>
                     <td class="hidden_button">
                     <select name="print_select" id="print_select" class="form-control"  style="background-color:<?php echo $setting_detail[0]['button_color']; ?>; color:white;width:auto;"  >
                     <option class="btnclr"  value="Print" selected><?php echo display('Print') ?></option>
                     <option value="Invoice" ><?php echo display('New Invoice') ?></option>
                     <option value="Packing" ><?php echo display('Packing List') ?></option>
                     </select>
                     </td>              
                        </tr>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="billing_address" class="col-sm-2 col-form-label"><?php echo display('Account Details/Additional Information') ?></label>
                     <div class="col-sm-8">
                        <textarea cols="50" rows="4" id="details" name="ac_details" class=" form-control" style="border:2px solid #d7d4d6;"  placeholder='Account Details/Additional Information' id="ac_details" ><?php   if(!empty($update_invoice_set[0]->account)){echo trim($update_invoice_set[0]->account);} ?></textarea>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="remark" class="col-sm-2 col-form-label"><?php echo display('Remarks/Conditions') ?></label>
                     <div class="col-sm-8">
                        <textarea rows="3" cols="50" id="remarks" name="remark" class="tass form-control"  style="border:2px solid #d7d4d6;"  placeholder='Remarks/Conditions'     ><?php   if(!empty($update_invoice_set[0]->remarks)){echo trim($update_invoice_set[0]->remarks);} ?></textarea>
                     </div>
                  </div>
                  <div class="table-responsive" >
                     <table class='table' style="display:none;">
                        <tr>
                           <th colspan='7'>
                           </th>
                        </tr>
                     </table>
                  </div>
                  <div id='customer-data' style='color:red;'></div>
               </form>
            </div>
            <input type="hidden" id="hdn"/>
            <input type="hidden" id="gtotal_dup"/>
            <div class="modal fade" id="myModal1" role="dialog" >
               <div class="modal-dialog">
                  <!-- Modal content-->
                  <div class="modal-content" style="margin-top: 190px; text-align:center;">
                     <div class="modal-header btnclr">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"><?php echo display('Sales - New Invoice') ?></h4>
                     </div>
                     <div class="modal-body" id="bodyModal1" style="text-align:center;font-weight:bold;">
                     </div>
                     <div class="modal-footer">
                     </div>
                  </div>
               </div>
            </div>
            <div class="modal fade" id="product_model_info" style="margin-right: 900px;width:2000px;">
               <div class="modal-dialog" style="float:left;">
                  <!-- Modal content-->
                  <div class="modal-content" style="width: fit-content;margin-top: 100px;margin-left:300px;text-align:center;">
                     <div class="modal-header btnclr">
                       
                          <button type="button" class="close" data-dismiss="modal"  style="color: #6f2937; background: #cdc222;" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                          </button>
                       
                        <h4 class="modal-title"><?php echo display('Product') ?></h4>
                     </div>
                     <div class="modal-body1">
                        <div id="salle_list" style="padding:20px;"></div>
                     </div>
                     <div class="modal-footer">
                     </div>
                  </div>
               </div>
            </div>
            <div id="myModal3" class="modal fade">
               <div class="modal-dialog">
                  <div class="modal-content" style="text-align:center;" >
                     <div class="modal-header btnclr">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"><?php echo display('Confirmation') ?></h4>
                     </div>
                     <div class="modal-body">
                        <p><?php echo display('Your Invoice is not submitted. Would you like to submit or discard') ?>
                        </p>
                        <p class="text-warning">
                           <small> <?php echo display ('If you dont submit your changes will not be saved') ?></small>
                        </p>
                     </div>
                     <div class="modal-footer">
                        <input type="submit" id="ok" class="btn btnclr"  onclick="submit_redirect()"  value=<?php echo display('Submit') ?> />
                        <button id="btdelete" type="button" class="btn btnclr"  onclick="discard()"><?php echo display('Discard') ?></button>
                     </div>
                  </div>
               </div>
            </div>
            <script>
            $(document).ready(function() {
    $('#emp_id').change(function() {
        var selectedText = $('#emp_id option:selected').text(); // Get selected text
        $('#selected_text').val(selectedText); // Set hidden input value
    });
});
               localStorage.setItem('currency', '<?php echo $currency;?>');  
                       var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
               var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';
               
               $(document).on('change select input','.product_name', function (e) {
               
                  
                   var id= $(this).attr('id');
               
               var parts = id.split('_');
               var answer_id = parts[parts.length - 1];
               
                   var pdt=$('#prodt_'+answer_id).val();
               
               
                   localStorage.setItem('tab_id', '#prodt_'+answer_id);  
                   console.log('#prodt_'+answer_id);
               
                   console.log(pdt);
                   const myArray = pdt.split("-");
                   var product_nam=myArray[0];
                   var product_model=myArray[1];
                  var data = {
                   
                       product_nam:product_nam,
                       product_model:product_model,
                  
                    };
                    data[csrfName] = csrfHash;
               
                    $.ajax({
                        type:'POST',
                        data: data, 
                     dataType:"json",
                        url:'<?php echo base_url();?>Cinvoice/product_info',
                        success: function(result, statut) {
                           //    ;
                            console.log(' result length :'+result.length);
                         if(result.length >0){
                        var total="<table style='width:100%;table-layout: fixed' > <tr> <td style='width: 130px;'></td>  <td><input type='text' style='width: max-content;'  class='form-control' id='myInput1' onkeyup='search()' placeholder='Search for Supplier Block no..'></td> <td></td> <td> <input type='text' style='width: max-content;'  class='form-control' id='myInput2' onkeyup='search()' placeholder='Search for Supplier Slab no..'></td> <td></td> <td>  <input type='text' style='width: max-content;' class='form-control' id='myInput3' onkeyup='search()' placeholder='Search for Bundle no..'></td> <td></td> <td></td>  </tr></table><br/>";
               var table_header = "<table style='width:auto;table-layout: fixed;word-wrap:break-word;' class='table table-bordered table-hover'  id='product_table1'> <thead> <tr><th rowspan='2' class='text-center'>Select All</th> <th rowspan='2' style='width: max-content;' class='text-center'>Product Name</th>   <th rowspan='2' style='width: max-content;' class='text-center'>Bundle No</th> <th rowspan='2' style='width: max-content;' class='text-center'>Description</th> <th rowspan='2' class='text-center'>Thick ness<i class='text-danger'>*</i></th> <th rowspan='2' class='text-center'>Supplier Block No<i class='text-danger'>*</i></th>  <th rowspan='2' class='text-center' >Supplier Slab No<i class='text-danger'>*</i> </th> <th colspan='2' style='width: max-content;' class='text-center'>Gross Measurement<i class='text-danger'>*</i> </th> <th rowspan='2' class='text-center'>Gross Sq. Ft</th> <th rowspan='2' style='width: min-content;' class='text-center'>Bundle No<i class='text-danger'>*</i></th> <th rowspan='2' style='width: min-content;' class='text-center'>Slab No<i class='text-danger'>*</i></th> <th colspan='2' style='width: max-content;' class='text-center'>Net Measure<i class='text-danger'>*</i></th> <th rowspan='2' class='text-center'>Net Sq. Ft</th> <th rowspan='2' style='width: 80px;' class='text-center'>Cost per Sq. Ft</th> <th rowspan='2' style='width: 80px;' class='text-center'>Cost per Slab</th> <th rowspan='2' style='width: 80px;' class='text-center'>Sales<br/>Price per Sq. Ft</th> <th rowspan='2'  style='width: 80px;' class='text-center'>Sales Slab Price</th> <th rowspan='2' class='text-center'>Weight</th>   <th rowspan='2' style='width: 100px' class='text-center'>Total</th> </tr>  <tr> <th class='text-center'>Width</th> <th class='text-center'>Height</th> <th class='text-center'>Width</th> <th class='text-center'>Height</th> </tr>  </thead><tbody>";
               var html ="";
               var count=1;
               result.forEach(function(element) {
                var sales_price = isNaN(element.price) ? 0 : element.price;
               html += "<tr><td><input type='checkbox' name='case[]' class='checkbox'/></td><td>"+element.product_name+'-'+element.product_model+"</td><td>"+element.bundle_no+"</td><td  class='ads'  >"+element.description_table +"</td><td>"+element.thickness+"</td><td>"+element.supplier_block_no+"</td><td>"+element.supplier_slab_no+"</td><td>"+element.g_width+"</td><td>"+element.g_height+"</td><td>"+element.gross_sqft+"</td><td>"+element.bundle_no+"</td><td>"+count+"</td><td>"+element.n_width+"</td><td>"+element.n_height+"</td><td>"+element.net_sqft+"</td><td>"+element.cost_sqft+"</td><td>"+element.cost_slab+"</td><td>"+element.sales_price_sqft+"</td><td>"+element.sales_slab_price+"</td><td>"+element.weight+"</td><td>"+element.total_amt+"</td><td style='display:none'>"+sales_price+"</td></tr>";
               count++;
                           });
               
               
               
                              var all = total+table_header+html ;
               
                               $('#salle_list').html(all);
                                           $('#product_model_info').modal('show');
                       
               
                          }else{
                             $('#product_model_info').modal('hide');
                          }
                    
                        }
                    });
                    calculate();
                });
               
               $(document).on('change select input','.bundle_no', function (e) {
               
                  
                   var id= $(this).attr('id');
               
               var parts = id.split('_');
               var answer_id = parts[parts.length - 1];
               
                   var pdt=$('#bundle_no_'+answer_id).val();
                localStorage.setItem('tab_id', '#bundle_no_'+answer_id);  
                  var data = { bundle_no:pdt };
                    data[csrfName] = csrfHash;
               
                    $.ajax({
                        type:'POST',
                        data: data, 
                     dataType:"json",
                        url:'<?php echo base_url();?>Cinvoice/bundle_info',
                        success: function(result, statut) {
                         
                             console.log(result);
                         if(result.length >0){
                             
                          var total="<table style='width:100%;table-layout: fixed' > <tr> <td style='width: 130px;'></td>  <td><input type='text' style='width: max-content;'  class='form-control' id='myInput1' onkeyup='search()' placeholder='Search for Supplier Block no..'></td> <td></td> <td> <input type='text' style='width: max-content;'  class='form-control' id='myInput2' onkeyup='search()' placeholder='Search for Supplier Slab no..'></td> <td></td> <td>  <input type='text' style='width: max-content;' class='form-control' id='myInput3' onkeyup='search()' placeholder='Search for Bundle no..'></td> <td></td> <td></td>  </tr></table><br/>";
               var table_header = "<table style='width:auto;table-layout: fixed;word-wrap:break-word;' class='table table-bordered table-hover'  id='product_table1'> <thead> <tr><th rowspan='2' class='text-center'>Select All</th> <th rowspan='2' style='width: max-content;' class='text-center'>Product Name</th>   <th rowspan='2' style='width: max-content;' class='text-center'>Bundle No</th> <th rowspan='2' style='width: max-content;' class='text-center'>Description</th> <th rowspan='2' class='text-center'>Thick ness<i class='text-danger'>*</i></th> <th rowspan='2' class='text-center'>Supplier Block No<i class='text-danger'>*</i></th>  <th rowspan='2' class='text-center' >Supplier Slab No<i class='text-danger'>*</i> </th> <th colspan='2' style='width: max-content;' class='text-center'>Gross Measurement<i class='text-danger'>*</i> </th> <th rowspan='2' class='text-center'>Gross Sq. Ft</th> <th rowspan='2' style='width: min-content;' class='text-center'>Bundle No<i class='text-danger'>*</i></th> <th rowspan='2' style='width: min-content;' class='text-center'>Slab No<i class='text-danger'>*</i></th> <th colspan='2' style='width: max-content;' class='text-center'>Net Measure<i class='text-danger'>*</i></th> <th rowspan='2' class='text-center'>Net Sq. Ft</th> <th rowspan='2' style='width: 80px;' class='text-center'>Cost per Sq. Ft</th> <th rowspan='2' style='width: 80px;' class='text-center'>Cost per Slab</th> <th rowspan='2' style='width: 80px;' class='text-center'>Sales<br/>Price per Sq. Ft</th> <th rowspan='2'  style='width: 80px;' class='text-center'>Sales Slab Price</th> <th rowspan='2' class='text-center'>Weight</th>   <th rowspan='2' style='width: 100px' class='text-center'>Total</th> </tr>  <tr> <th class='text-center'>Width</th> <th class='text-center'>Height</th> <th class='text-center'>Width</th> <th class='text-center'>Height</th> </tr>  </thead><tbody>";
               var html ="";
               var count=1;
               result.forEach(function(element) {
                var sales_price = isNaN(element.price) ? 0 : element.price;
               html += "<tr><td><input type='checkbox' name='case[]' class='checkbox'/></td><td>"+element.product_name+'-'+element.product_model+"</td><td>"+element.bundle_no+"</td><td>"+element.description_table +"</td><td>"+element.thickness+"</td><td>"+element.supplier_block_no+"</td><td>"+element.supplier_slab_no+"</td><td>"+element.g_width+"</td><td>"+element.g_height+"</td><td>"+element.gross_sqft+"</td><td>"+element.bundle_no+"</td><td>"+count+"</td><td>"+element.n_width+"</td><td>"+element.n_height+"</td><td>"+element.net_sqft+"</td><td>"+element.cost_sqft+"</td><td>"+element.cost_slab+"</td><td>"+element.sales_price_sqft+"</td><td>"+element.sales_slab_price+"</td><td>"+element.weight+"</td><td>"+element.total_amt+"</td><td style='display:none'>"+sales_price+"</td></tr>";
               count++;
                           });
               
               
                              var all = total+table_header+html ;
               
                               $('#salle_list').html(all);
                                           $('#product_model_info').modal('show');
                       
               
                          }else{
                             $('#product_model_info').modal('hide');
                          }
                    
                        }
                    });
                     calculate();
                });
               
               
               
               
               
               
               
               
               
               
               
               function search() {
               // ;
                 var input_supplier_block_no,
                         input_supplier_slab_no,
                         input_bundle_no,
                         // input_origin,
               
               
                    
               
                       filter_supplier_block_no,filter_supplier_slab_no,filter_bundle_no,
                       table,
                       tr,
                       td,
                       i,
                       name;
                       
               
               
               
                      input_supplier_block_no = document.getElementById("myInput1");
                      input_supplier_slab_no = document.getElementById("myInput2");
                      input_bundle_no = document.getElementById("myInput3");
                     //  input_origin = document.getElementById("myInput4");
                       
               
                     filter_supplier_block_no = input_supplier_block_no.value.toUpperCase();    
                     filter_supplier_slab_no = input_supplier_slab_no.value.toUpperCase();    
                     filter_bundle_no = input_bundle_no.value.toUpperCase();   
                     // filter_origin = input_origin.value.toUpperCase();
               
               
                     
                   table = document.getElementById("product_table1");
                   tr = table.getElementsByTagName("tr");
               
                       for (i = 0; i < tr.length; i++) {
                           td = tr[i].getElementsByTagName("td")[5];
                           td1 = tr[i].getElementsByTagName("td")[6];
                           td2 = tr[i].getElementsByTagName("td")[2];
                         //   td3 = tr[i].getElementsByTagName("td")[5];
                          
                     
                         if (td && td1 && td2  ) {
               
                           supplier_block_no = (td.textContent || td.innerText).toUpperCase();
                           supplier_slab_no = (td1.textContent || td1.innerText).toUpperCase();
                           bundle_no = (td2.textContent || td2.innerText).toUpperCase();
                         //   origin = (td3.textContent || td3.innerText).toUpperCase();
                          
               
               
                           if (
                             supplier_block_no.indexOf(filter_supplier_block_no) > -1 &&
                             supplier_slab_no.indexOf(filter_supplier_slab_no) > -1 &&
                             bundle_no.indexOf(filter_bundle_no) > -1 
                             //   origin.indexOf(filter_origin) > -1  
               
                           ) {
                               tr[i].style.display = "";
                           } else {
                               tr[i].style.display = "none";
                           }
                       }
                   }
               }
               
               
               
               
               
               
               
               
               
               $(document).on('change select input','.supplier_block_no', function (e) {
               
                  
                   var id= $(this).attr('id');
               
               var parts = id.split('_');
               var answer_id = parts[parts.length - 1];
               
                   var pdt=$('#supplier_b_no_'+answer_id).val();
                localStorage.setItem('tab_id', '#supplier_b_no_'+answer_id);  
                  var data = { supplier_block_no:pdt };
                    data[csrfName] = csrfHash;
               
                    $.ajax({
                        type:'POST',
                        data: data, 
                     dataType:"json",
                        url:'<?php echo base_url();?>Cinvoice/supplier_block_info',
                        success: function(result, statut) {
                         
                             console.log(result);
                         if(result.length >0){
                             
                             
                            var total="<table style='width:100%;table-layout: fixed' > <tr> <td style='width: 130px;'></td>  <td><input type='text' style='width: max-content;'  class='form-control' id='myInput1' onkeyup='search()' placeholder='Search for Supplier Block no..'></td> <td></td> <td> <input type='text' style='width: max-content;'  class='form-control' id='myInput2' onkeyup='search()' placeholder='Search for Supplier Slab no..'></td> <td></td> <td>  <input type='text' style='width: max-content;' class='form-control' id='myInput3' onkeyup='search()' placeholder='Search for Bundle no..'></td> <td></td> <td></td>  </tr></table><br/>";
               var table_header = "<table style='width:auto;table-layout: fixed;word-wrap:break-word;' class='table table-bordered table-hover'  id='product_table1'> <thead> <tr><th rowspan='2' class='text-center'>Select All</th> <th rowspan='2' style='width: max-content;' class='text-center'>Product Name</th>   <th rowspan='2' style='width: max-content;' class='text-center'>Bundle No</th> <th rowspan='2' style='width: max-content;' class='text-center'>Description</th> <th rowspan='2' class='text-center'>Thick ness<i class='text-danger'>*</i></th> <th rowspan='2' class='text-center'>Supplier Block No<i class='text-danger'>*</i></th>  <th rowspan='2' class='text-center' >Supplier Slab No<i class='text-danger'>*</i> </th> <th colspan='2' style='width: max-content;' class='text-center'>Gross Measurement<i class='text-danger'>*</i> </th> <th rowspan='2' class='text-center'>Gross Sq. Ft</th> <th rowspan='2' style='width: min-content;' class='text-center'>Bundle No<i class='text-danger'>*</i></th> <th rowspan='2' style='width: min-content;' class='text-center'>Slab No<i class='text-danger'>*</i></th> <th colspan='2' style='width: max-content;' class='text-center'>Net Measure<i class='text-danger'>*</i></th> <th rowspan='2' class='text-center'>Net Sq. Ft</th> <th rowspan='2' style='width: 80px;' class='text-center'>Cost per Sq. Ft</th> <th rowspan='2' style='width: 80px;' class='text-center'>Cost per Slab</th> <th rowspan='2' style='width: 80px;' class='text-center'>Sales<br/>Price per Sq. Ft</th> <th rowspan='2'  style='width: 80px;' class='text-center'>Sales Slab Price</th> <th rowspan='2' class='text-center'>Weight</th>   <th rowspan='2' style='width: 100px' class='text-center'>Total</th> </tr>  <tr> <th class='text-center'>Width</th> <th class='text-center'>Height</th> <th class='text-center'>Width</th> <th class='text-center'>Height</th> </tr>  </thead><tbody>";
               var html ="";
               var count=1;
               result.forEach(function(element) {
                var sales_price = isNaN(element.price) ? 0 : element.price;
               html += "<tr><td><input type='checkbox' name='case[]' class='checkbox'/></td><td>"+element.product_name+'-'+element.product_model+"</td><td>"+element.bundle_no+"</td><td>"+element.description_table +"</td><td>"+element.thickness+"</td><td>"+element.supplier_block_no+"</td><td>"+element.supplier_slab_no+"</td><td>"+element.g_width+"</td><td>"+element.g_height+"</td><td>"+element.gross_sqft+"</td><td>"+element.bundle_no+"</td><td>"+count+"</td><td>"+element.n_width+"</td><td>"+element.n_height+"</td><td>"+element.net_sqft+"</td><td>"+element.cost_sqft+"</td><td>"+element.cost_slab+"</td><td>"+element.sales_price_sqft+"</td><td>"+element.sales_slab_price+"</td><td>"+element.weight+"</td><td>"+element.total_amt+"</td><td style='display:none'>"+sales_price+"</td></tr>";
               count++;
                           });
               
               
                              var all = total+table_header+html ;
               
                               $('#salle_list').html(all);
                                           $('#product_model_info').modal('show');
                       
               
                          }else{
                             $('#product_model_info').modal('hide');
                          }
                    
                        }
                    });
                     calculate();
                });
               $(document).ready(function(){
                 
               //$('.download').hide();
               $('.amt').hide();
               
               $('#email_btn').hide();
               
               });
               
               $("#reset").on("click", function () {
                   $('#product_tax').val("Select the Tax");
               
               });
                   $('#terms').change(function(){
                      $('#payment_due_date').val('');
                 var sd = $(this).val().replace(/[^0-9]/gi, ''); 
               var number = parseInt(sd, 10);
                      var data = {
                          sales_invoice_date : $('#date').val(),
                          days :number,   
                          pterms : $('#payment_terms').val()
                      
                      };
                      data[csrfName] = csrfHash;
                  
                      $.ajax({
                          type:'POST',
                          data: data, 
                         dataType:"json",
                          url:'<?php echo base_url();?>Cinvoice/getdate',
                          success: function(result, statut) {
                           
                             $('#payment_due_date').val(result);
                         }
                      });
                  });
               
               //   function discard(){
               //      $.get(
               //       "<?php //echo base_url(); ?>Cinvoice/deletesale/", 
               //      { val: $("#invoice_hdn1").val(), csrfName:csrfHash,payment_id:$('#payment_id').val() }, // put your parameters here
               //      function(responseText){
               //       console.log(responseText);
               //      // window.btn_clicked = true;      //set btn_clicked to true
               //       var input_hdn="Your Invoice No :"+$('#invoice_hdn').val()+" has been Discared";
                 
               //       console.log(input_hdn);
               //       $('#myModal3').modal('hide');
               //       $("#bodyModal1").html(input_hdn);
               //           $('#myModal1').modal('show');
               //       window.setTimeout(function(){
                      
               
               //           window.location = "<?php  //echo base_url(); ?>Cinvoice/manage_invoice";
               //         }, 2000);
               //      }
               //   ); 
               //   }
               //       function submit_redirect(){
               //         //  window.btn_clicked = true;      //set btn_clicked to true
               //       var input_hdn="Your Invoice No :"+$('#invoice_hdn').val()+" has been created Successfully";
                 
               //       console.log(input_hdn);
               //       $('#myModal3').modal('hide');
               //       $("#bodyModal1").html(input_hdn);
               //       $('#myModal1').modal('show');
               //       window.setTimeout(function(){
                      
               
               //           window.location = "<?php  echo base_url(); ?>Cinvoice/manage_invoice";
               //         }, 2000);
               //       }
               
               $('#insert_trucking').submit(function(e) {
                 $.ajax({
                   url:"<?php echo base_url(); ?>Cinvoice/manual_sales_insert",
                   type: 'POST',
                   data: $('#insert_trucking').serialize(),
                 })
                 .done((response) => {
                       var split = response.split("/");
                          $('.hidden_button').show();
                                var input_hdn2="New Sale created Successfully";
                       $("#bodyModal1").html(input_hdn2);
                       $('#myModal1').modal('show');
                   window.setTimeout(function(){
                       $('.modal').modal('hide');
                      
               $('.modal-backdrop').remove();
                },2500);
                            $('#invoice_hdn1').val(split[0]);
                      
                    
                         $('#invoice_hdn').val(split[1]);
                   console.log(response);
                 });
                 e.preventDefault();
                 return false;
               });
               
               
               
               
               $('#insert_trucking').submit(function(e) {
                 var form_data = new FormData();
               //  var formData = new FormData($('form')[0]);
               form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>', '<?php echo $this->security->get_csrf_hash(); ?>');
                  form_data.append('attachment_id', document.getElementById('attachment_id').value);
               //    form_data.append('csrfName', '{{ csrfHash }}');
                 var ins = document.getElementById('attachment').files.length;
                 for (var x = 0; x < ins; x++) {
                     form_data.append("files[]", document.getElementById('attachment').files[x]);
                 }
                 $.ajax({
                     url: '<?php echo base_url(); ?>Cinvoice/invoice_file_upload', // point to server-side controller method
                     dataType: 'text', // what to expect back from the server
                     cache: false,
                     contentType: false,
                     processData: false,
                     data: form_data,
                     type: 'post',
                     success: function (response) {
                         $('#msg').html(response); // display success response from the server
                     },
                     error: function (response) {
                         $('#msg').html(response); // display error response from the server
                     }
                 });
               });
               
               
               $('#download').on('click', function (e) {
               
                var popout = window.open("<?php  echo base_url(); ?>Cinvoice/invoice_inserted_data/"+$('#invoice_hdn1').val());
                
                 
               
               });  
               
               
               $('.final_submit').on('click', function (e) {
               
               //  window.btn_clicked = true;      //set btn_clicked to true
                var input_hdn='Your Invoice No : "'+$('#invoice_hdn').val()+" has been Created Successfully";
               
               console.log(input_hdn);
               $("#bodyModal1").html(input_hdn);
                   $('#myModal1').modal('show');
               window.setTimeout(function(){
                  
               
                   window.location = "<?php  echo base_url(); ?>Cinvoice/manage_invoice";
                 }, 2000);
                  
               });
               
               
               
               
               
               
               
               
               function calculate(){
               ;
               var total=$('#Over_all_Total').val();
               var tax= $('#product_tax').val();
               var percent='';
               var hypen='-';
               if(tax.indexOf(hypen) != -1){
               var field = tax.split('-');
               var percent = field[1];
               
               }else{
               percent=tax;
               }
               percent=percent.replace("%","");
               var answer = (percent / 100) * parseFloat(total);
               var gtotal = parseFloat(total + answer);//fix
               console.log("gtotal :" +gtotal);
               var final_g= $('#final_gtotal').val();
               var amt=parseFloat(answer)+parseFloat(total);
               var num = isNaN(parseFloat(amt)) ? 0 : parseFloat(amt)
               $('#gtotal').val(num.toFixed(2)); 
               var custo_amt=$('.custocurrency_rate').val(); 
               console.log("numhere :"+num +"-"+custo_amt);
               var value=num*custo_amt;
               var custo_final = isNaN(parseFloat(value)) ? 0 : parseFloat(value)
               $('#customer_gtotal').val(custo_final.toFixed(2)); 
               $('#tax_details').val(answer.toFixed(2) +" ( "+tax+" )");
               var bal_amt=custo_final-$('#amount_paid').val();
               $('#balance').val(bal_amt.toFixed(2));
               
               }
               
               
               
               
               
               
               
               
               
               
               
               
               
               
               
               
               
               
               $( document ).ready(function() {
               //$('.hidden_button').hide();
               
               
                   $('#instant_customer').submit(function (event) {
               
                   var dataString = {
                       dataString : $("#instant_customer").serialize()
                  };
                  dataString[csrfName] = csrfHash;
                   $.ajax({
                       type:"POST",
                       dataType:"json",
                       url:"<?php echo base_url(); ?>Cinvoice/instant_customer",
                       data:$("#instant_customer").serialize(),
                       success:function (data1) {
                  
                       var $select = $('select#customer_name');
                           $select.empty();
                   
                             for(var i = 0; i < data1.length; i++) {
                       var option = $('<option/>').attr('value', data1[i].customer_id).text(data1[i].customer_name);
                       $select.append(option); // append new options
                   }
               var data = {
                     
                       value:$('#customer_name').val()
                   };
                   data[csrfName] = csrfHash;
               
                   $.ajax({
                       type:'POST',
                       data: data, 
                      dataType:"json",
                       url:'<?php echo base_url();?>Cinvoice/getcustomer_data',
                       success: function(result, statut) {
                           if(result.csrfName){
                              csrfName = result.csrfName;
                              csrfHash = result.csrfHash;
                           }
                            $('#vendor_add').val(result[0]['address']+'\n'+result[0]['city']+'\n'+result[0]['state']+"-"+result[0]['zip']+"-"+result[0]['country']+'\n'+result[0]['primaryemail']+"-"+result[0]['businessphone']       );
                      
                           $('#billing_address').html(result[0]['customer_address']+'\n'+result[0]['city']+'\n'+result[0]['state']+"-"+result[0]['zip']+"-"+result[0]['country']+'\n'+result[0]['customer_email']+'\n'+result[0]['phone']);
                           $('#shipping_address').html(result[0]['address2']+'\n'+result[0]['city']+'\n'+result[0]['state']+"-"+result[0]['zip']+"-"+result[0]['country']+'\n'+result[0]['customer_email']+'\n'+result[0]['phone']);
                   $('#email_info').val(result[0]['customer_email']);
                           $(".cus").html(result[0]['currency_type']);
                       $("#autocomplete_customer_id").val(result[0]['customer_id']);
                       $("label[for='custocurrency']").html(result[0]['currency_type']);
                    
                      $.getJSON('https://open.er-api.com/v6/latest/<?php echo $curn_info_default; ?>', 
               function(data) {
                var custo_currency=result[0]['currency_type'];
                   var x=data['rates'][custo_currency];
                var Rate =parseFloat(x).toFixed(2);
                Rate = isNaN(Rate) ? 0 : Rate;
                 console.log(Rate);
                 $('.hiden').show();
                 $(".custocurrency_rate").val(Rate);
               });
                   
                       }
                   });
                  $("#instant_customer").find('input:text').val(''); 
                  $("#bodyModal1").html("New Customer Added Successfully");
                     $('#myModal1').modal('show');
                     $('#cust_info').modal('hide');
                    $('#customer_name').show();
                   
                    $('#instant_customer')[0].reset();
               
                     window.setTimeout(function(){
                      $('#myModal1').modal('hide');
                      $('.modal-backdrop').remove();
               
               },2500);
               
                       }
                   });
                   event.preventDefault();
               });
               $('.hiden').css("display","none");
               
               });
               
               var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
               var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';
               
               
               
                 $( "body" ).on( "click", ".checkbox", function() {
               
                $('#product_model_info').modal('hide');
                    var values = new Array();
               
                      $.each($("input[name='case[]']:checked").closest("td").siblings("td"),
                             function () {
                                  values.push($(this).text());
                             });
                         console.log(values);
                         console.log(table_id_product);
               
                    var table_id_product=localStorage.getItem("tab_id");
                  var netheight = $(table_id_product).attr('id');
               const indexLastDot = netheight.lastIndexOf('_');
               var id = netheight.slice(indexLastDot + 1);
                $(table_id_product).closest("tr").find('#prodt_'+id).val(values[0]);
                    $(table_id_product).closest("tr").find('#bundle_no_'+id).val(values[1]);
                      $(table_id_product).closest("tr").find('#description_'+id).val(values[2]);
                        $(table_id_product).closest("tr").find('#thickness_'+id).val(values[3]);
                          $(table_id_product).closest("tr").find('#supplier_b_no_'+id).val(values[4]);
                            $(table_id_product).closest("tr").find('#supplier_s_no_'+id).val(values[5]);
                              $(table_id_product).closest("tr").find('#gross_width_'+id).val(values[6]);
                                $(table_id_product).closest("tr").find('#gross_height_'+id).val(values[7]);
                                  $(table_id_product).closest("tr").find('#gross_sq_ft_'+id).val(values[8]);
                                    $(table_id_product).closest("tr").find('#net_width_'+id).val(values[11]);
                                      $(table_id_product).closest("tr").find('#net_height_'+id).val(values[12]);
                                        $(table_id_product).closest("tr").find('#net_sq_ft_'+id).val(values[13]);
                                          $(table_id_product).closest("tr").find('#cost_sq_ft_'+id).val(values[14]);
                                           $(table_id_product).closest("tr").find('#cost_sq_slab_'+id).val(values[15]);
                                              $(table_id_product).closest("tr").find('#sales_amt_sq_ft_'+id).val(values[16]);
                                                $(table_id_product).closest("tr").find('#sales_slab_amt_'+id).val(values[20]);
                                                  $(table_id_product).closest("tr").find('#weight_'+id).val(values[18]);
                                                 //   $(table_id_product).closest("tr").find('#origin_'+id).val(values[19]);
                                                      $(table_id_product).closest("tr").find('#total_amt_'+id).val(values[20]);
                                         var tid=$(table_id_product).closest('table').attr('id');
               
               
                                        
               const indexLast = tid.lastIndexOf('_');
               var idt = tid.slice(indexLast + 1);
               
                 var sum_net_val=0;
                  $(table_id_product).closest('table').find('.net_sq_ft').each(function() {
                       var precio = $(this).val();
                       if (!isNaN(precio) && precio.length !== 0) {
                         sum_net_val += parseFloat(precio);
                       }
                     });
               $('#overall_net_'+idt).val(sum_net_val).trigger('change');
                 var costpersqft=0;
                  $(table_id_product).closest('table').find('.cost_sq_ft').each(function() {
                       var precio = $(this).val();
                       if (!isNaN(precio) && precio.length !== 0) {
                         costpersqft += parseFloat(precio);
                       }
                     });
               $('#costpersqft_'+idt).val(costpersqft).trigger('change');
                 var cost_sq_slab=0;
                  $(table_id_product).closest('table').find('.cost_sq_slab').each(function() {
                       var precio = $(this).val();
                       if (!isNaN(precio) && precio.length !== 0) {
                         cost_sq_slab += parseFloat(precio);
                       }
                     });
               $('#costperslab_'+idt).val(cost_sq_slab).trigger('change');
                 var sales_amt_sq_ft=0;
                  $(table_id_product).closest('table').find('.sales_amt_sq_ft').each(function() {
                       var precio = $(this).val();
                       if (!isNaN(precio) && precio.length !== 0) {
                         sales_amt_sq_ft += parseFloat(precio);
                       }
                     });
               $('#salespricepersqft_'+idt).val(sales_amt_sq_ft).trigger('change');
                 var sales_slab_amt=0;
                  $(table_id_product).closest('table').find('.sales_slab_amt').each(function() {
                       var precio = $(this).val();
                       if (!isNaN(precio) && precio.length !== 0) {
                         sales_slab_amt += parseFloat(precio);
                       }
                     });
               $('#salesslabprice_'+idt).val(sales_slab_amt).trigger('change');
                 var sum_w=0;
                  $(table_id_product).closest('table').find('.weight').each(function() {
                       var precio = $(this).val();
                       if (!isNaN(precio) && precio.length !== 0) {
                         sum_w += parseFloat(precio);
                       }
                     });
               $('#overall_weight_'+idt).val(sum_w).trigger('change');
                 var sum_gross_val=0;
                  $(table_id_product).closest('table').find('.gross_sq_ft').each(function() {
                       var precio = $(this).val();
                       if (!isNaN(precio) && precio.length !== 0) {
                         sum_gross_val += parseFloat(precio);
                       }
                     });
               $('#overall_gross_'+idt).val(sum_gross_val).trigger('change');
                 var sum_total_val=0;
                  $(table_id_product).closest('table').find('.total_price').each(function() {
                       var precio = $(this).val();
                       if (!isNaN(precio) && precio.length !== 0) {
                         sum_total_val += parseFloat(precio);
                       }
                     });
               $('#Total_'+idt).val(sum_total_val).trigger('change');
               
               var total_net=0;
                $('.table').each(function() {
                   $(this).find('.net_sq_ft').each(function() {
                       var precio = $(this).val();
                       if (!isNaN(precio) && precio.length !== 0) {
                         total_net += parseFloat(precio);
                       }
                     });
               
                 });
               $('#total_net').val(total_net.toFixed(2)).trigger('change');
               var total_w=0;
                $('.table').each(function() {
                   $(this).find('.weight').each(function() {
                       var precio = $(this).val();
                       if (!isNaN(precio) && precio.length !== 0) {
                         total_w += parseFloat(precio);
                       }
                     });
               
                 });
               $('#total_weight').val(total_w.toFixed(2)).trigger('change');
                 var overall_gs=0;
                $('.table').each(function() {
                   $(this).find('.gross_sq_ft').each(function() {
                       var precio = $(this).val();
                       if (!isNaN(precio) && precio.length !== 0) {
                         overall_gs += parseFloat(precio);
                       }
                     });
                });
               
               $('#total_gross').val(overall_gs).trigger('change');
               
               var overall_sum=0;
                $('.table').each(function() {
                   $(this).find('.total_price').each(function() {
                       var precio = $(this).val();
                       if (!isNaN(precio) && precio.length !== 0) {
                         overall_sum += parseFloat(precio);
                       }
                     });
               
               
                 });
               
               $('#Over_all_Total').val(overall_sum.toFixed(2)).trigger('change');
                
                  calculate();
               });
               $(document).on('change input keyup','.sales_amt_sq_ft', function (e) {
               
                  var netheight = $(this).attr('id');
               const indexLastDot = netheight.lastIndexOf('_');
               var id_num = netheight.slice(indexLastDot + 1);
                  var sales_amt_sq_ft=$('#sales_amt_sq_ft_'+id_num).val();
                  var net_sq_ft=$('#net_sq_ft_'+id_num).val();
                var netresult =sales_amt_sq_ft* net_sq_ft;
               netresult = isNaN(netresult) ? 0 : netresult;
               var nresult=netresult.toFixed(2);
               $('#'+'sales_slab_amt_'+id_num).val(netresult.toFixed(2));
               $(this).closest('tr').find('.total_price').val(netresult.toFixed(2));
               var overall_sum=0;
                    $('.table').find('.total_price').each(function() {
               var v=$(this).val();
                 overall_sum += parseFloat(v);
               });
                $('#Over_all_Total').val(overall_sum.toFixed(2)).trigger('change');
                      var sum=0;
                    $(this).closest('table').find('.total_price').each(function() {
               var v=$(this).val();
                 sum += parseFloat(v);
               });
                $(this).closest('table').find('.b_total').val(sum.toFixed(2)).trigger('change');
                  var sales_amt_sq_ft=0;
                  $(this).closest('table').find('.sales_amt_sq_ft').each(function() {
                       var precio = $(this).val();
                       if (!isNaN(precio) && precio.length !== 0) {
                         sales_amt_sq_ft += parseFloat(precio);
                       }
                     });
                $(this).closest('table').find('.salespricepersqft').val(sales_amt_sq_ft).trigger('change');
                  var sales_slab_amt=0;
                  $(this).closest('table').find('.sales_slab_amt').each(function() {
                       var precio = $(this).val();
                       if (!isNaN(precio) && precio.length !== 0) {
                         sales_slab_amt += parseFloat(precio);
                       }
                     });
               $(this).closest('table').find('.salesslabprice').val(sales_slab_amt).trigger('change');
                  
                calculate();
                 });
                       $(document).on('change input keyup','.cost_sq_slab', function (e) {
                  var sales_slab_amt=0;
                  $(this).closest('table').find('.cost_sq_slab').each(function() {
                       var precio = $(this).val();
                       if (!isNaN(precio) && precio.length !== 0) {
                         sales_slab_amt += parseFloat(precio);
                       }
                     });
               $(this).closest('table').find('.costperslab').val(sales_slab_amt).trigger('change');
                
               
                 });
                 $(document).on('change input keyup','.cost_sq_ft', function (e) {
               
                  var sales_amt_sq_ft=0;
                  $(this).closest('table').find('.cost_sq_ft').each(function() {
                       var precio = $(this).val();
                       if (!isNaN(precio) && precio.length !== 0) {
                         sales_amt_sq_ft += parseFloat(precio);
                       }
                     });
                $(this).closest('table').find('.costpersqft').val(sales_amt_sq_ft).trigger('change');
               
                 });
                   $(document).on('change input keyup','.sales_slab_amt', function (e) {
                     
                 var netheight = $(this).attr('id');
               const indexLastDot = netheight.lastIndexOf('_');
               var id_num = netheight.slice(indexLastDot + 1);
                 
                  var sales_slab_amt=$('#sales_slab_amt_'+id_num).val();
                  var net_sq_ft=$('#net_sq_ft_'+id_num).val();
                var netresult =sales_slab_amt/net_sq_ft;
               netresult = isNaN(netresult) ? 0 : netresult;
               var nresult=netresult.toFixed(2);
               $('#'+'sales_amt_sq_ft_'+id_num).val(netresult.toFixed(2));
               $('#total_amt_'+id_num).val(sales_slab_amt);
               var overall_sum=0;
                    $('.table').find('.total_price').each(function() {
               var v=$(this).val();
                 overall_sum += parseFloat(v);
               });
                $('#Over_all_Total').val(overall_sum.toFixed(2)).trigger('change');
                      var sum=0;
                    $(this).closest('table').find('.total_price').each(function() {
               var v=$(this).val();
                 sum += parseFloat(v);
               });
                $(this).closest('table').find('.b_total').val(sum.toFixed(2)).trigger('change');
                 var sales_slab_amt=0;
                  $(this).closest('table').find('.sales_slab_amt').each(function() {
                       var precio = $(this).val();
                       if (!isNaN(precio) && precio.length !== 0) {
                         sales_slab_amt += parseFloat(precio);
                       }
                     });
               $(this).closest('table').find('.salesslabprice').val(sales_slab_amt).trigger('change');
                   var sales_amt_sq_ft=0;
                  $(this).closest('table').find('.sales_amt_sq_ft').each(function() {
                       var precio = $(this).val();
                       if (!isNaN(precio) && precio.length !== 0) {
                         sales_amt_sq_ft += parseFloat(precio);
                       }
                     });
                $(this).closest('table').find('.salespricepersqft').val(sales_amt_sq_ft).trigger('change');
                
               calculate();
                 });
               $(document).on('change', '.product_name', function(){
               
                var netheight = $(this).attr('id');
               const indexLastDot = netheight.lastIndexOf('_');
               var id = netheight.slice(indexLastDot + 1);
               $('#tableid_'+id).val(id);
               var net_width='net_width_'+id;
               var net_height = 'net_height_'+ id;
               var netwidth=$('#'+net_width).val();
               var netheight=$('#'+net_height).val();
               var netresult=parseFloat(netwidth) * parseFloat(netheight);
               netresult=netresult/144;
               netresult = isNaN(netresult) ? 0 : netresult;
               var nresult=netresult.toFixed(2);
               
               $('#'+'net_sq_ft_'+id).val(netresult.toFixed(2));
               var sales_slab_price=$('#sales_slab_amt_'+id).val();
               
               var sales_amt_sq_ft=sales_slab_price / nresult;
               
               sales_amt_sq_ft = isNaN(sales_amt_sq_ft) ? 0 : sales_amt_sq_ft;
               $('#'+'sales_amt_sq_ft_'+id).val(sales_amt_sq_ft.toFixed(2));
               $('#'+'total_amt_'+id).val(sales_slab_price.toFixed(2));
               calculate();
               });
               
               // Restricts input for each element in the set of matched elements to the given inputFilter.
               (function($) {
                 $.fn.inputFilter = function(callback, errMsg) {
                   return this.on("input keydown keyup mousedown mouseup select contextmenu drop focusout", function(e) {
                     if (callback(this.value)) {
                       // Accepted value
                       if (["keydown","mousedown","focusout"].indexOf(e.type) >= 0){
                         $(this).removeClass("input-error");
                         this.setCustomValidity("");
                       }
                       this.oldValue = this.value;
                       this.oldSelectionStart = this.selectionStart;
                       this.oldSelectionEnd = this.selectionEnd;
                     } else if (this.hasOwnProperty("oldValue")) {
                       // Rejected value - restore the previous one
                       $(this).addClass("input-error");
                       this.setCustomValidity(errMsg);
                       this.reportValidity();
                       this.value = this.oldValue;
                       this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
                     } else {
                       // Rejected value - nothing to restore
                       this.value = "";
                     }
                   });
                 };
               }(jQuery));
               
               $(".custocurrency_rate").inputFilter(function(value) {
                 return /^-?\d*[.,]?\d*$/.test(value); }, "Must be a floating (real) Number");
               $('#customer_name').on('change', function (e) {
                   localStorage.setItem("sale_customer_name",$('#customer_name').val());
                  
                   var data = {
                       value: $('#customer_name').val()
               
                    };
                   data[csrfName] = csrfHash;
                   $.ajax({
                       type:'POST',
                       data: data,
                     dataType:"json",
                       url:'<?php echo base_url();?>Cinvoice/getcustomer_data',
                       success: function(result, statut) {
                           console.log(result);
                           if(result.csrfName){
                             csrfName = result.csrfName;
                              csrfHash = result.csrfHash;
                           }
                        console.log(result[0]['currency_type']);
                       $(".cus").html(result[0]['currency_type']);
                       $("#autocomplete_customer_id").val(result[0]['customer_id']);
                       $("label[for='custocurrency']").html(result[0]['currency_type']);
                    
                      $.getJSON('https://open.er-api.com/v6/latest/<?php echo $curn_info_default; ?>', 
               function(data) {
                var custo_currency=result[0]['currency_type'];
                   var x=data['rates'][custo_currency];
                var Rate =parseFloat(x).toFixed(2);
                Rate = isNaN(Rate) ? 0 : Rate;
                 console.log(Rate);
                 $('.hiden').show();
                 $(".custocurrency_rate").val(Rate);
               });
                     
                       }
                   });
               <?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
               
               });
               
               
               $('#product_tax').on('change', function (e) {
                   
                  // ;
               
                    var optionSelected = $("option:selected", this);
                   var valueSelected = this.value;
                   var total=$('#Over_all_Total').val();
               var tax= $('#product_tax').val();
                 var percent='';
                 var hypen='-';
               if(tax.indexOf(hypen) != -1){
                var field = tax.split('-');
               
                var percent = field[1];
               
               }else{
               percent=tax;
               }
                percent=percent.replace("%","");
                var answer = (percent / 100) * parseFloat(total);
               
                 
                 var gtotal = parseFloat(total + answer);
                 console.log("gtotal :" +gtotal);
                 $('#gtotal').val(gtotal); 
                 
                
                 var amt=parseFloat(answer)+parseFloat(total);
               
                 var num = isNaN(parseFloat(amt.toFixed(2))) ? 0 : parseFloat(amt.toFixed(2))
               var custo_amt=$('.custocurrency_rate').val(); 
                 console.log("numhere :"+num +"-"+custo_amt);
                 var value=num*custo_amt;
                 var custo_final = isNaN(parseFloat(value.toFixed(2))) ? 0 : parseFloat(value.toFixed(2))
                $('#customer_gtotal').val(custo_final.toFixed(2));  
               $('#final_gtotal').val(answer.toFixed(2));
                  $('#hdn').val(valueSelected);
                  console.log("taxi :"+valueSelected);
                 $('#tax_details').val(answer.toFixed(2) +" ( "+tax+" )");
                 calculate();
                  payment_info();
               });
               $('#product_tax').on('change', function (e) {
               
               var total=$('#Over_all_Total').val();
                var tax= $('#product_tax').val();
               
                
               
                 var percent='';
                 var hypen='-';
               if(tax.indexOf(hypen) != -1){
                var field = tax.split('-');
               
                var percent = field[1];
               
               }else{
               percent=tax;
               }
                percent=percent.replace("%","");
                 var answer = (percent / 100) * parseFloat(total);
               
                 
                  var gtotal = parseFloat(total + answer);
                  console.log("gtotal :" +gtotal);
               
               
               
                 var final_g= $('#final_gtotal').val();
               
               
                 var amt=parseFloat(answer)+parseFloat(total);
                 var num = isNaN(parseFloat(amt)) ? 0 : parseFloat(amt)
                   $('#gtotal').val(num.toFixed(2)); 
                 var custo_amt=$('.custocurrency_rate').val(); 
                 console.log("numhere :"+num +"-"+custo_amt);
                 var value=num*custo_amt;
                 var custo_final = isNaN(parseFloat(value)) ? 0 : parseFloat(value)
                $('#customer_gtotal').val(custo_final.toFixed(2));  
                calculate();
                });
               var arr=[];
               
               
               function gt(id){
               
               var final_g= $('#final_gtotal').val();
               
               var first=$("#Over_all_Total").val();
                   var tax= $('#product_tax').val();
                 var percent='';
                 var hypen='-';
               if(tax.indexOf(hypen) != -1){
                var field = tax.split('-');
               
                var percent = field[1];
               
               }else{
               percent=tax;
               }
                percent=percent.replace("%","");
                
               var answer=0;
                 var answer =(parseFloat(percent) / 100) * parseFloat(first);
                   answer = isNaN(parseFloat(answer)) ? 0 : parseFloat(answer);
                  console.log(answer);
                  $('#tax_details').val(answer.toFixed(2) +" ( "+tax+" )");
               
                 var gtotal = parseFloat(first + answer);
                 console.log(gtotal);
               var amt=parseFloat(answer)+parseFloat(first);
                var num = isNaN(parseFloat(amt.toFixed(2))) ? 0 : parseFloat(amt.toFixed(2));
                var custo_amt=$('.custocurrency_rate').val();
                $("#gtotal").val(num.toFixed(2));  
                console.log(num +"-"+custo_amt);
                localStorage.setItem("customer_grand_amount_sale",num);
               
                var value=num*custo_amt;
                var custo_final = isNaN(parseFloat(value)) ? 0 : parseFloat(value)
               $('#customer_gtotal').val(custo_final.toFixed(2));
               var bal_amt=custo_final-$('#amount_paid').val();
               $('#balance').val(bal_amt.toFixed(2));
               
               
               
               }
               
               
               function payment_info(){
                  
                 var data = {
                      gtotal:$('#gtotal').val(),
                      customer_name:$('#customer_name').val()
                 
                   };
                   data[csrfName] = csrfHash;
               
                   $.ajax({
                       type:'POST',
                       data: data, 
                    dataType:"json",
                       url:'<?php echo base_url();?>Cinvoice/get_payment_info',
                       success: function(result, statut) {
                          
                         $("#amount_paid").val(result[0]['amt_paid']);
                         $("#balance").val(result[0]['balance']);
                           console.log(result);
                       }
                   });
               }
               
            </script>
         </div>
      </div>
      <div class="modal fade" id="printconfirmodal" tabindex="-1" role="dialog" aria-labelledby="printconfirmodal" aria-hidden="true">
         <div class="modal-dialog modal-sm">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="myModalLabel"><?php echo display('print') ?></h4>
               </div>
               <div class="modal-body">
                  <?php echo form_open('Cinvoice/invoice_inserted_data_manual', array('class' => 'form-vertical', 'id' => '', 'name' => '')) ?>
                  <div id="outputs" class="hide alert alert-danger"></div>
                  <h3> <?php echo display('successfully_inserted') ?></h3>
                  <h4><?php echo display('do_you_want_to_print') ?> ??</h4>
                  <input type="hidden" name="invoice_id" id="inv_id">
               </div>
               <div class="modal-footer">
                  <button type="button" onclick="cancelprint()" class="btn btn-default" data-dismiss="modal"><?php echo display('no') ?></button>
                  <button type="submit" class="btn btn-primary" id="yes"><?php echo display('yes') ?></button>
                  <?php echo form_close() ?>
               </div>
            </div>
         </div>
      </div>
      <!-- <div id="landing_modal" class="modal fade" role="dialog">
         <div class="modal-dialog">
           <div class="modal-content" style="width: 130%;">
             <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal">&times;</button>
               <h4 class="modal-title">Landing Cost </h4>
             </div>
             <div class="modal-body">
               <table class="table table-bordered">
                   <tr><th>Amount  </th></tr>
                <tr>  <td><input type="text" id="landing_amount"/></td> </tr>
         
               </table>
             </div>
             
           </div>
         
         </div>
         </div> -->
      <div class="modal fade in" id="landing_modal" role="dialog">
         <div class="modal-dialog" style="padding-right: 1200px;">
            <!-- Modal content-->
            <div class="modal-content" style="width: 1500px;margin-top: 190px;text-aling:center;">
               <div class="modal-header btnclr" style="color:white;font-weight:bold;">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title" style="font-weight:bold;font-size:18px;"><?php echo "Additional Cost"; ?></h4>
               </div>
               <div class="modal-body">
                  <form id="land_form" method="post">
                     <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                     <input type="hidden" id="dum_invoice" name="dum_invoice"/>
                     <table class="serviceprovider table table-bordered" id="service_1">
                        <thead>
                           <tr style="text-align:center;">
                              <th style="font-size:15px;width: 35px;text-align:center;">Service Provider</th>
                              <th style="font-size:15px;width: 35px;text-align:center;">Description</th>
                              <th style="font-size:15px;width: 35px;text-align:center;">Quantity</th>
                              <th style="font-size:15px;width: 35px;text-align:center;">Rate</th>
                              <th style="font-size:15px;width: 35px;text-align:center;">Total</th>
                              <th style="font-size:15px;width: 5px;text-align:center;" >Action</th>
                           </tr>
                        </thead>
                        <tbody id="service_pro">
                           <tr>
                              <td style="text-align:center;">
                                 <input list="magic_pro" id="service_provider_1" class="form-control sp" name="s_p[]"   onchange="this.blur();" />
                                 <datalist id="magic_pro">
                                    <?php                                
                                       foreach($servic_provider as $tx){?>
                                    <option value="<?php echo $tx['service_provider_name'];?>">  <?php echo $tx['service_provider_name'];  ?></option>
                                    <?php } ?>
                                 </datalist>
                                 <!-- <input type="text" id="service_provider_1" class="sp" name="s_p[]"/></td> -->
                              <td style="text-align:center;"><input type="text" id="sp_description_0"  class="sp_description form-control" name="sp_description[]"/></td>
                              <td style="text-align:center;"><input type="text" id="sp_qty_0"  class="sp_qty form-control" name="sp_qty[]"/></td>
                              <td style="text-align:center;"><input type="text" id="sp_rate_0"  class="sp_rate form-control" name="sp_rate[]"/></td>
                              <td style="text-align:center;"><input type="text" id="sp_total_0" class="form-control sp_total"   name="sp_total[]"/></td>
                              <td style="text-align:center;">
                                 <button  class='delete_provider btn btn-danger' type='button' value='Delete'><i class="fa fa-trash"></i></button>
                              </td>
                           </tr>
                        </tbody>
                        <tfoot>
                           <tr>
                              <td colspan="4" style="text-align:right;font-weight:bold;">Total :</td>
                              <td colspan="2"  ><input type="text" id="landing_amount" style="float: left;"/></td>
                           </tr>
                           <tr>
                              <td colspan="4"></td>
                              <td colspan="2"><input type="submit" id="land_amt" class="btnclr"  style="border-radius: 5px;padding: 4px;float:left;color:white;font-weight:bold;"  value="Apply to the Invoice"/></td>
                           </tr>
                        </tfoot>
                     </table>
                  </form>
               </div>
               <!-- <div class="modal-footer">
                  </div> -->
            </div>
         </div>
      </div>
      <!------ add new Payment Type -->
      <!------ add new Payment Type -->
      <div class="modal fade" id="tax_info" role="dialog">
         <div class="modal-dialog" role="document">
            <div class="modal-content" style="text-align:center;" >
               <div class="modal-header btnclr">
                  <a href="#" class="close" data-dismiss="modal">&times;</a>
                  <h4 class="modal-title"> Add Tax </h4>
               </div>
               <div class="modal-body">
                  <div id="customeMessage" class="alert hide"></div>
                  <form id="tax_btn" class="frm" method="post">
                     <div class="panel-body">
                        <input type ="hidden" name="csrf_test_name" id="" value="<?php echo $this->security->get_csrf_hash();?>">
                        <input type ="hidden" name="status_type" value="sales">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label>Enter Tax percent % <span class="text-danger">*</span></label>
                                 <input type="text" class="form-control" name="tax" id="enter_tax" step="0.01" maxlength="3" required="" placeholder="%" />
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label>Description</label>
                                 <input type="text" class="form-control" name ="description" id="description" type="text" placeholder="Description">
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label>State <span class="text-danger">*</span></label>
                                 <select name="state" class="form-control" required>
                                    <option selected="true" disabled="disabled" value="">Please Select State</option>
                                    <option value="Alabama">AL - State of Alabama</option>
                                    <option value="Alaska">AK - State of Alaska</option>
                                    <option value="Arizona">AZ - State of Arizona</option>
                                    <option value="Arkansas">AR - State of Arkansas</option>
                                    <option value="California">CA - State of California</option>
                                    <option value="Colorado">CO - State of Colorado</option>
                                    <option value="Connecticut">CT - State of Connecticut</option>
                                    <option value="Delaware">DE - State of Delaware</option>
                                    <option value="Florida">FL - State of Florida</option>
                                    <option value="Georgia">GA - State of Georgia</option>
                                    <option value="Hawaii">HI - State of Hawaii</option>
                                    <option value="Idaho">ID - State of Idaho</option>
                                    <option value="Illinois">IL - State of Illinois</option>
                                    <option value="Indiana">IN - State of Indiana</option>
                                    <option value="Iowa">IA - State of Iowa</option>
                                    <option value="Kansas">KS - State of Kansas</option>
                                    <option value="Kentucky">KY - State of Kentucky</option>
                                    <option value="Louisiana">LA - State of Louisiana</option>
                                    <option value="Maine">ME - State of Maine</option>
                                    <option value="Maryland">MD - State of Maryland</option>
                                    <option value="Massachusetts">MA - State of Massachusetts</option>
                                    <option value="Michigan">MI - State of Michigan</option>
                                    <option value="Minnesota">MN - State of Minnesota</option>
                                    <option value="Mississippi">MS - State of Mississippi</option>
                                    <option value="Missouri">MO - State of Missouri</option>
                                    <option value="Montana">MT - State of Montana</option>
                                    <option value="Nebraska">NE - State of Nebraska</option>
                                    <option value="Nevada">NV - State of Nevada</option>
                                    <option value="New Hampshire">NH - State of New Hampshire</option>
                                    <option value="New Jersey">NJ - State of New Jersey</option>
                                    <option value="New Mexico">NM - State of New Mexico</option>
                                    <option value="New York">NY - State of New York</option>
                                    <option value="North Carolina">NC - State of North Carolina</option>
                                    <option value="North Dakota">ND - State of North Dakota</option>
                                    <option value="Ohio">OH - State of Ohio</option>
                                    <option value="Oklahoma">OK - State of Oklahoma</option>
                                    <option value="Oregon">OR - State of Oregon</option>
                                    <option value="Pennsylvania">PA - State of Pennsylvania</option>
                                    <option value="Rhode Island">RI - State of Rhode Island</option>
                                    <option value="South Carolina">SC - State of South Carolina</option>
                                    <option value="South Dakota">SD - State of South Dakota</option>
                                    <option value="Tennessee">TN - State of Tennessee</option>
                                    <option value="Texas">TX - State of Texas</option>
                                    <option value="Utah">UT - State of Utah</option>
                                    <option value="Vermont">VT - State of Vermont</option>
                                    <option value="Virginia">VA - State of Virginia</option>
                                    <option value="Washington">WA - State of Washington</option>
                                    <option value="West Virginia">WV - State of West Virginia</option>
                                    <option value="Wisconsin">WI - State of Wisconsin</option>
                                    <option value="Wyoming">WY - State of Wyoming</option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label>Tax Agency <span class="text-danger">*</span></label>
                                 <select name="tax_agency" class="form-control" required="required">
                                    <option selected="true" disabled="disabled" value="">Please Select Taxes</option>
                                    <option value="Federal Taxes">Federal Taxes</option>
                                    <option value="State Taxes">State Taxes</option>
                                    <option value="Municipal Taxes">Municipal Taxes</option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label>Account <span class="text-danger">*</span></label>
                                 <select name="account" class="form-control" required="required">
                                    <option selected="true" disabled="disabled" value="">Please Select Accounts</option>
                                    <option value="Accounts receivable">Accounts receivable</option>
                                    <option value="Accounts payable">Accounts payable</option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label>Show Tax On Return Line <span class="text-danger">*</span></label>
                                 <select name="show_taxonreturn" class="form-control" required="required">
                                    <option selected="true" disabled="disabled" value="">Please Select tax on return line</option>
                                    <option>Tax collected on sales</option>
                                    <option>Adjustments to tax on sales</option>
                                    <option>Other adjustments</option>
                                 </select>
                              </div>
                           </div>
                        </div>
                     </div>
               </div>
               <div class="modal-footer">
               <a href="#" class="btn btnclr"   data-dismiss="modal"><?php echo display('Close') ?> </a>
               <input type="submit" class="btn btnclr"   value=<?php echo display('Submit') ?>>
               </div>
               </form>
               <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
         </div>
         <!-- /.modal -->
      </div>
</section>
</div>
<div class="modal fade" id="payment_modal" role="dialog">
   <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content" style="    margin-top: 190px;text-align:center;">
         <div class="modal-header btnclr">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"> <?php echo display('ADD PAYMENT') ?></h4>
         </div>
         <div class="modal-body">
            <form id="add_payment_info"  method="post" >
               <div class="row">
                  <div class="form-group row">
                     <label for="date" style="text-align:end;" class="col-sm-3 col-form-label">  <?php echo display('Payment Date') ?> <i class="text-danger">*</i></label>
                     <div class="col-sm-5">
                        <input class=" form-control" type="date"  name="payment_date" id="payment_date" required value="<?php echo html_escape($date); ?>" tabindex="4" />
                     </div>
                  </div>
                  <input type="hidden" id="cutomer_name" name="cutomer_name"/>
                  <input type="hidden"  value="<?php echo $payment_id; ?>"  name="payment_id" id="payment_id"/>
                  <div class="form-group row">
                     <label for="billing_address" style="text-align:end;" class="col-sm-3 col-form-label"><?php echo display('Reference No') ?><i class="text-danger">*</i></label>
                     <div class="col-sm-5">
                        <input class=" form-control" type="text"  name="ref_no" id="ref_no" required   />
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="bank" style="text-align:end;" class="col-sm-3 col-form-label"><?php echo display('Select Bank') ?>:<i class="text-danger">*</i></label>
                     <a data-toggle="modal" href="#add_bank_info"   class="btn btnclr"><i class="fa fa-university"></i></a>
                     <div class="col-sm-5">
                        <select name="bank" id="bank"  class="form-control bankpayment" >
                           <option value="JPMorgan Chase">JPMorgan Chase</option>
                           <option value="New York City">New York City</option>
                           <option value="Bank of America">Bank of America</option>
                           <option value="Citigroup">Citigroup</option>
                           <option value="Wells Fargo">Wells Fargo</option>
                           <option value="Goldman Sachs">Goldman Sachs</option>
                           <option value="Morgan Stanley">Morgan Stanley</option>
                           <option value="U.S. Bancorp">U.S. Bancorp</option>
                           <option value="PNC Financial Services">PNC Financial Services</option>
                           <option value="Truist Financial">Truist Financial</option>
                           <option value="Charles Schwab Corporation">Charles Schwab Corporation</option>
                           <option value="TD Bank, N.A.">TD Bank, N.A.</option>
                           <option value="Capital One">Capital One</option>
                           <option value="The Bank of New York Mellon">The Bank of New York Mellon</option>
                           <option value="State Street Corporation">State Street Corporation</option>
                           <option value="American Express">American Express</option>
                           <option value="Citizens Financial Group">Citizens Financial Group</option>
                           <option value="HSBC Bank USA">HSBC Bank USA</option>
                           <option value="SVB Financial Group">SVB Financial Group</option>
                           <option value="First Republic Bank ">First Republic Bank </option>
                           <option value="Fifth Third Bank">Fifth Third Bank</option>
                           <option value="BMO USA">BMO USA</option>
                           <option value="USAA">USAA</option>
                           <option value="UBS">UBS</option>
                           <option value="M&T Bank">M&T Bank</option>
                           <option value="Ally Financial">Ally Financial</option>
                           <option value="KeyCorp">KeyCorp</option>
                           <option value="Huntington Bancshares">Huntington Bancshares</option>
                           <option value="Barclays">Barclays</option>
                           <option value="Santander Bank">Santander Bank</option>
                           <option value="RBC Bank">RBC Bank</option>
                           <option value="Ameriprise">Ameriprise</option>
                           <option value="Regions Financial Corporation">Regions Financial Corporation</option>
                           <option value="Northern Trust">Northern Trust</option>
                           <option value="BNP Paribas">BNP Paribas</option>
                           <option value="Discover Financial">Discover Financial</option>
                           <option value="First Citizens BancShares">First Citizens BancShares</option>
                           <option value="Synchrony Financial">Synchrony Financial</option>
                           <option value="Deutsche Bank">Deutsche Bank</option>
                           <option value="New York Community Bank">New York Community Bank</option>
                           <option value="Comerica">Comerica</option>
                           <option value="First Horizon National Corporation">First Horizon National Corporation</option>
                           <option value="Raymond James Financial">Raymond James Financial</option>
                           <option value="Webster Bank">Webster Bank</option>
                           <option value="Western Alliance Bank">Western Alliance Bank</option>
                           <option value="Popular, Inc.">Popular, Inc.</option>
                           <option value="CIBC Bank USA">CIBC Bank USA</option>
                           <option value="East West Bank">East West Bank</option>
                           <option value="Synovus">Synovus</option>
                           <option value="Valley National Bank">Valley National Bank</option>
                           <option value="Credit Suisse ">Credit Suisse </option>
                           <option value="Mizuho Financial Group">Mizuho Financial Group</option>
                           <option value="Wintrust Financial">Wintrust Financial</option>
                           <option value="Cullen/Frost Bankers, Inc.">Cullen/Frost Bankers, Inc.</option>
                           <option value="John Deere Capital Corporation">John Deere Capital Corporation</option>
                           <option value="MUFG Union Bank">MUFG Union Bank</option>
                           <option value="BOK Financial Corporation">BOK Financial Corporation</option>
                           <option value="Old National Bank">Old National Bank</option>
                           <option value="South State Bank">South State Bank</option>
                           <option value="FNB Corporation">FNB Corporation</option>
                           <option value="Pinnacle Financial Partners">Pinnacle Financial Partners</option>
                           <option value="PacWest Bancorp">PacWest Bancorp</option>
                           <option value="TIAA">TIAA</option>
                           <option value="Associated Banc-Corp">Associated Banc-Corp</option>
                           <option value="UMB Financial Corporation">UMB Financial Corporation</option>
                           <option value="Prosperity Bancshares">Prosperity Bancshares</option>
                           <option value="Stifel">Stifel</option>
                           <option value="BankUnited">BankUnited</option>
                           <option value="Hancock Whitney">Hancock Whitney</option>
                           <option value="MidFirst Bank">MidFirst Bank</option>
                           <option value="Sumitomo Mitsui Banking Corporation">Sumitomo Mitsui Banking Corporation</option>
                           <option value="Beal Bank">Beal Bank</option>
                           <option value="First Interstate BancSystem">First Interstate BancSystem</option>
                           <option value="Commerce Bancshares">Commerce Bancshares</option>
                           <option value="Umpqua Holdings Corporation">Umpqua Holdings Corporation</option>
                           <option value="United Bank (West Virginia)">United Bank (West Virginia)</option>
                           <option value="Texas Capital Bank">Texas Capital Bank</option>
                           <option value="First National of Nebraska">First National of Nebraska</option>
                           <option value="FirstBank Holding Co">FirstBank Holding Co</option>
                           <option value="Simmons Bank">Simmons Bank</option>
                           <option value="Fulton Financial Corporation">Fulton Financial Corporation</option>
                           <option value="Glacier Bancorp">Glacier Bancorp</option>
                           <option value="Arvest Bank">Arvest Bank</option>
                           <option value="BCI Financial Group">BCI Financial Group</option>
                           <option value="Ameris Bancorp">Ameris Bancorp</option>
                           <option value="First Hawaiian Bank">First Hawaiian Bank</option>
                           <option value="United Community Bank">United Community Bank</option>
                           <option value="Bank of Hawaii">Bank of Hawaii</option>
                           <option value="Home BancShares">Home BancShares</option>
                           <option value="Eastern Bank">Eastern Bank</option>
                           <option value="Cathay Bank">Cathay Bank</option>
                           <option value="Pacific Premier Bancorp">Pacific Premier Bancorp</option>
                           <option value="Washington Federal">Washington Federal</option>
                           <option value="Customers Bancorp">Customers Bancorp</option>
                           <option value="Atlantic Union Bank">Atlantic Union Bank</option>
                           <option value="Columbia Bank">Columbia Bank</option>
                           <option value="Heartland Financial USA">Heartland Financial USA</option>
                           <option value="WSFS Bank">WSFS Bank</option>
                           <option value="Central Bancompany">Central Bancompany</option>
                           <option value="Independent Bank">Independent Bank</option>
                           <option value="Hope Bancorp">Hope Bancorp</option>
                           <option value="SoFi">SoFi</option>
                           <?php foreach($bank_list as $b){ ?>
                           <option value="<?=$b['bank_name']; ?>"><?=$b['bank_name']; ?></option>
                           <?php } ?>
                        </select>
                     </div>
                  </div>
                  <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                  <input class=" form-control" type="hidden"  readonly name="customer_name_modal" id="customer_name_modal" required   />    
                  <div class="form-group row">
                     <label for="billing_address" style="text-align:end;" class="col-sm-3 col-form-label"><?php echo display ('Amount to be paid') ?> : </label>
                     <div class="col-sm-5">
                        <table border="0">
                           <tr>
                              <td class="cus" name="cus"></td>
                              <td><input  type="text"  readonly name="amount_to_pay" id="amount_to_pay"   style="width:190%;" class="form-control" required   /></td>
                           </tr>
                        </table>
                     </div>
                  </div>
                  <div class="form-group row" style="display:none;">
                     <label for="billing_address" style="text-align:end;" class="col-sm-3 col-form-label"><?php echo display ('Amount Received ') ?>: </label>
                     <div class="col-sm-5">
                        <table border="0">
                           <tr>
                              <td class="cus" name="cus"></td>
                              <td><input  type="text"  readonly name="amount_received" value="0.00"  style="width:190%;" id="amount_received" class="form-control"required   /></td>
                           </tr>
                        </table>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="billing_address" style="text-align:end;"    class="col-sm-3 col-form-label"><?php echo display ('Balance ') ?> : </label>
                     <div class="col-sm-5">
                        <table border="0">
                           <tr>
                              <td class="cus" name="cus"></td>
                              <td><input  type="text"   readonly name="balance_modal"    style="width:190%;" id="balance_modal" class="form-control" required  /></td>
                           </tr>
                        </table>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="billing_address" style="text-align:end;" class="col-sm-3 col-form-label"><?php echo display ('Balance ') ?>: <i class="text-danger">*</i></label>
                     <div class="col-sm-5">
                        <table border="0">
                           <tr>
                              <td class="cus" name="cus"></td>
                              <td><input  type="text"   name="payment" id="payment_from_modal"     style="width:190%;" class="form-control"required   /></td>
                           </tr>
                        </table>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="billing_address" style="text-align:end;" class="col-sm-3 col-form-label"><?php echo display ('Additional Information') ?>  : </label>
                     <div class="col-sm-5">
                        <input class=" form-control" type="text"  name="details" id="details"/>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="billing_address" style="text-align:end;" class="col-sm-3 col-form-label"><?php echo display ('Attachments ') ?> : </label>
                     <div class="col-sm-5">
                        <input class=" form-control" type="file"  name="attachement" id="attachement" />
                     </div>
                  </div>
               </div>
         </div>
         <div class="modal-footer">
         <div class="col-sm-8"></div>
         <div class="col-sm-4">
         <a href="#" class="btn btnclr"  data-dismiss="modal"><?php echo display ('Close ') ?></a>
         <input class="btn btnclr" type="submit"    name="submit_pay" id="submit_pay" value=<?php echo display ('submit') ?>  required   />
         </div>
         </div>
      </div>
      </form>
   </div>
</div>
<div class="modal fade" id="add_bank_info">
   <div class="modal-dialog">
      <div class="modal-content" style="text-align:center;" >
         <div class="modal-header btnclr" >
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title"><?php echo display ('ADD BANK ') ?></h4>
         </div>
         <div class="container"></div>
         <div class="modal-body">
            <div id="customeMessage" class="alert hide"></div>
            <form id="add_bank"  method="post">
               <div class="panel-body">
                  <input type ="hidden" name="csrf_test_name" id="" value="<?php echo $this->security->get_csrf_hash();?>">
                  <div class="form-group row">
                     <label for="bank_name" class="col-sm-4 col-form-label"><?php echo display('bank_name') ?> <i class="text-danger">*</i></label>
                     <div class="col-sm-6">
                        <input type="text" class="form-control" name="bank_name" id="bank_name" required="" placeholder="<?php echo display('bank_name') ?>" tabindex="1"/>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="ac_name" class="col-sm-4 col-form-label"><?php echo display('ac_name') ?> <i class="text-danger">*</i></label>
                     <div class="col-sm-6">
                        <input type="text" class="form-control" name="ac_name" id="ac_name" required="" placeholder="<?php echo display('ac_name') ?>" tabindex="2"/>
                     </div>
                  </div>
                  <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                  <div class="form-group row">
                     <label for="ac_no" class="col-sm-4 col-form-label"><?php echo display('ac_no') ?> <i class="text-danger">*</i></label>
                     <div class="col-sm-6">
                        <input type="text" class="form-control" name="ac_no" id="ac_no" required="" placeholder="<?php echo display('ac_no') ?>" tabindex="3"/>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="branch" class="col-sm-4 col-form-label"><?php echo display('branch') ?> <i class="text-danger">*</i></label>
                     <div class="col-sm-6">
                        <input type="text" class="form-control" name="branch" id="branch" required="" placeholder="<?php echo display('branch') ?>" tabindex="4"/>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="shipping_line" class="col-sm-4 col-form-label"><?php echo display('Country') ?>
                     <i class="text-danger"></i>
                     </label>
                     <div class="col-sm-6">
                        <select class="selectpicker countrypicker form-control"  data-live-search="true" data-default="United States"  name="country" id="country" style="width:100%"></select>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="previous_balance" class="col-sm-4 col-form-label"><?php echo display('Currency') ?></label>
                     <div class="col-sm-6">
                        <select  class="form-control" id="currency" name="currency1" class="form-control"  style="width: 100%;" required=""  style="max-width: -webkit-fill-available;">
                           <option>Select currency</option>
                           <option value="AFN">AFN - Afghan Afghani</option>
                           <option value="ALL">ALL - Albanian Lek</option>
                           <option value="DZD">DZD - Algerian Dinar</option>
                           <option value="AOA">AOA - Angolan Kwanza</option>
                           <option value="ARS">ARS - Argentine Peso</option>
                           <option value="AMD">AMD - Armenian Dram</option>
                           <option value="AWG">AWG - Aruban Florin</option>
                           <option value="AUD">AUD - Australian Dollar</option>
                           <option value="AZN">AZN - Azerbaijani Manat</option>
                           <option value="BSD">BSD - Bahamian Dollar</option>
                           <option value="BHD">BHD - Bahraini Dinar</option>
                           <option value="BDT">BDT - Bangladeshi Taka</option>
                           <option value="BBD">BBD - Barbadian Dollar</option>
                           <option value="BYR">BYR - Belarusian Ruble</option>
                           <option value="BEF">BEF - Belgian Franc</option>
                           <option value="BZD">BZD - Belize Dollar</option>
                           <option value="BMD">BMD - Bermudan Dollar</option>
                           <option value="BTN">BTN - Bhutanese Ngultrum</option>
                           <option value="BTC">BTC - Bitcoin</option>
                           <option value="BOB">BOB - Bolivian Boliviano</option>
                           <option value="BAM">BAM - Bosnia-Herzegovina Convertible Mark</option>
                           <option value="BWP">BWP - Botswanan Pula</option>
                           <option value="BRL">BRL - Brazilian Real</option>
                           <option value="GBP">GBP - British Pound Sterling</option>
                           <option value="BND">BND - Brunei Dollar</option>
                           <option value="BGN">BGN - Bulgarian Lev</option>
                           <option value="BIF">BIF - Burundian Franc</option>
                           <option value="KHR">KHR - Cambodian Riel</option>
                           <option value="CAD">CAD - Canadian Dollar</option>
                           <option value="CVE">CVE - Cape Verdean Escudo</option>
                           <option value="KYD">KYD - Cayman Islands Dollar</option>
                           <option value="XOF">XOF - CFA Franc BCEAO</option>
                           <option value="XAF">XAF - CFA Franc BEAC</option>
                           <option value="XPF">XPF - CFP Franc</option>
                           <option value="CLP">CLP - Chilean Peso</option>
                           <option value="CNY">CNY - Chinese Yuan</option>
                           <option value="COP">COP - Colombian Peso</option>
                           <option value="KMF">KMF - Comorian Franc</option>
                           <option value="CDF">CDF - Congolese Franc</option>
                           <option value="CRC">CRC - Costa Rican ColÃ³n</option>
                           <option value="HRK">HRK - Croatian Kuna</option>
                           <option value="CUC">CUC - Cuban Convertible Peso</option>
                           <option value="CZK">CZK - Czech Republic Koruna</option>
                           <option value="DKK">DKK - Danish Krone</option>
                           <option value="DJF">DJF - Djiboutian Franc</option>
                           <option value="DOP">DOP - Dominican Peso</option>
                           <option value="XCD">XCD - East Caribbean Dollar</option>
                           <option value="EGP">EGP - Egyptian Pound</option>
                           <option value="ERN">ERN - Eritrean Nakfa</option>
                           <option value="EEK">EEK - Estonian Kroon</option>
                           <option value="ETB">ETB - Ethiopian Birr</option>
                           <option value="EUR">EUR - Euro</option>
                           <option value="FKP">FKP - Falkland Islands Pound</option>
                           <option value="FJD">FJD - Fijian Dollar</option>
                           <option value="GMD">GMD - Gambian Dalasi</option>
                           <option value="GEL">GEL - Georgian Lari</option>
                           <option value="DEM">DEM - German Mark</option>
                           <option value="GHS">GHS - Ghanaian Cedi</option>
                           <option value="GIP">GIP - Gibraltar Pound</option>
                           <option value="GRD">GRD - Greek Drachma</option>
                           <option value="GTQ">GTQ - Guatemalan Quetzal</option>
                           <option value="GNF">GNF - Guinean Franc</option>
                           <option value="GYD">GYD - Guyanaese Dollar</option>
                           <option value="HTG">HTG - Haitian Gourde</option>
                           <option value="HNL">HNL - Honduran Lempira</option>
                           <option value="HKD">HKD - Hong Kong Dollar</option>
                           <option value="HUF">HUF - Hungarian Forint</option>
                           <option value="ISK">ISK - Icelandic KrÃ³na</option>
                           <option value="INR">INR - Indian Rupee</option>
                           <option value="IDR">IDR - Indonesian Rupiah</option>
                           <option value="IRR">IRR - Iranian Rial</option>
                           <option value="IQD">IQD - Iraqi Dinar</option>
                           <option value="ILS">ILS - Israeli New Sheqel</option>
                           <option value="ITL">ITL - Italian Lira</option>
                           <option value="JMD">JMD - Jamaican Dollar</option>
                           <option value="JPY">JPY - Japanese Yen</option>
                           <option value="JOD">JOD - Jordanian Dinar</option>
                           <option value="KZT">KZT - Kazakhstani Tenge</option>
                           <option value="KES">KES - Kenyan Shilling</option>
                           <option value="KWD">KWD - Kuwaiti Dinar</option>
                           <option value="KGS">KGS - Kyrgystani Som</option>
                           <option value="LAK">LAK - Laotian Kip</option>
                           <option value="LVL">LVL - Latvian Lats</option>
                           <option value="LBP">LBP - Lebanese Pound</option>
                           <option value="LSL">LSL - Lesotho Loti</option>
                           <option value="LRD">LRD - Liberian Dollar</option>
                           <option value="LYD">LYD - Libyan Dinar</option>
                           <option value="LTL">LTL - Lithuanian Litas</option>
                           <option value="MOP">MOP - Macanese Pataca</option>
                           <option value="MKD">MKD - Macedonian Denar</option>
                           <option value="MGA">MGA - Malagasy Ariary</option>
                           <option value="MWK">MWK - Malawian Kwacha</option>
                           <option value="MYR">MYR - Malaysian Ringgit</option>
                           <option value="MVR">MVR - Maldivian Rufiyaa</option>
                           <option value="MRO">MRO - Mauritanian Ouguiya</option>
                           <option value="MUR">MUR - Mauritian Rupee</option>
                           <option value="MXN">MXN - Mexican Peso</option>
                           <option value="MDL">MDL - Moldovan Leu</option>
                           <option value="MNT">MNT - Mongolian Tugrik</option>
                           <option value="MAD">MAD - Moroccan Dirham</option>
                           <option value="MZM">MZM - Mozambican Metical</option>
                           <option value="MMK">MMK - Myanmar Kyat</option>
                           <option value="NAD">NAD - Namibian Dollar</option>
                           <option value="NPR">NPR - Nepalese Rupee</option>
                           <option value="ANG">ANG - Netherlands Antillean Guilder</option>
                           <option value="TWD">TWD - New Taiwan Dollar</option>
                           <option value="NZD">NZD - New Zealand Dollar</option>
                           <option value="NIO">NIO - Nicaraguan CÃ³rdoba</option>
                           <option value="NGN">NGN - Nigerian Naira</option>
                           <option value="KPW">KPW - North Korean Won</option>
                           <option value="NOK">NOK - Norwegian Krone</option>
                           <option value="OMR">OMR - Omani Rial</option>
                           <option value="PKR">PKR - Pakistani Rupee</option>
                           <option value="PAB">PAB - Panamanian Balboa</option>
                           <option value="PGK">PGK - Papua New Guinean Kina</option>
                           <option value="PYG">PYG - Paraguayan Guarani</option>
                           <option value="PEN">PEN - Peruvian Nuevo Sol</option>
                           <option value="PHP">PHP - Philippine Peso</option>
                           <option value="PLN">PLN - Polish Zloty</option>
                           <option value="QAR">QAR - Qatari Rial</option>
                           <option value="RON">RON - Romanian Leu</option>
                           <option value="RUB">RUB - Russian Ruble</option>
                           <option value="RWF">RWF - Rwandan Franc</option>
                           <option value="SVC">SVC - Salvadoran ColÃ³n</option>
                           <option value="WST">WST - Samoan Tala</option>
                           <option value="SAR">SAR - Saudi Riyal</option>
                           <option value="RSD">RSD - Serbian Dinar</option>
                           <option value="SCR">SCR - Seychellois Rupee</option>
                           <option value="SLL">SLL - Sierra Leonean Leone</option>
                           <option value="SGD">SGD - Singapore Dollar</option>
                           <option value="SKK">SKK - Slovak Koruna</option>
                           <option value="SBD">SBD - Solomon Islands Dollar</option>
                           <option value="SOS">SOS - Somali Shilling</option>
                           <option value="ZAR">ZAR - South African Rand</option>
                           <option value="KRW">KRW - South Korean Won</option>
                           <option value="XDR">XDR - Special Drawing Rights</option>
                           <option value="LKR">LKR - Sri Lankan Rupee</option>
                           <option value="SHP">SHP - St. Helena Pound</option>
                           <option value="SDG">SDG - Sudanese Pound</option>
                           <option value="SRD">SRD - Surinamese Dollar</option>
                           <option value="SZL">SZL - Swazi Lilangeni</option>
                           <option value="SEK">SEK - Swedish Krona</option>
                           <option value="CHF">CHF - Swiss Franc</option>
                           <option value="SYP">SYP - Syrian Pound</option>
                           <option value="STD">STD - São Tomé and Príncipe Dobra</option>
                           <option value="TJS">TJS - Tajikistani Somoni</option>
                           <option value="TZS">TZS - Tanzanian Shilling</option>
                           <option value="THB">THB - Thai Baht</option>
                           <option value="TOP">TOP - Tongan pa'anga</option>
                           <option value="TTD">TTD - Trinidad & Tobago Dollar</option>
                           <option value="TND">TND - Tunisian Dinar</option>
                           <option value="TRY">TRY - Turkish Lira</option>
                           <option value="TMT">TMT - Turkmenistani Manat</option>
                           <option value="UGX">UGX - Ugandan Shilling</option>
                           <option value="UAH">UAH - Ukrainian Hryvnia</option>
                           <option value="AED">AED - United Arab Emirates Dirham</option>
                           <option value="UYU">UYU - Uruguayan Peso</option>
                           <option selected value="USD">USD - US Dollar</option>
                           <option value="UZS">UZS - Uzbekistan Som</option>
                           <option value="VUV">VUV - Vanuatu Vatu</option>
                           <option value="VEF">VEF - Venezuelan BolÃ­var</option>
                           <option value="VND">VND - Vietnamese Dong</option>
                           <option value="YER">YER - Yemeni Rial</option>
                           <option value="ZMK">ZMK - Zambian Kwacha</option>
                        </select>
                     </div>
                  </div>
               </div>
         </div>
         <div class="modal-footer">
         <div class="row">
         <div class="col-sm-8">
         </div>
         <div class="col-sm-4">
         <a href="#" class="btn btnclr"  data-dismiss="modal"><?php echo display('Close') ?></a>
         <input type="submit" id="addBank"    class="btn btnclr" name="addBank" value="<?php echo display('save') ?>"/>
         </div>
         </div>  </div>
         </form>
      </div>
   </div>
</div>
<!------ add new customer -->
<div class="modal fade" id="cust_info">
   <div class="modal-dialog modal-lg">
      <div class="modal-content" style="text-align:center;">
         <div class="modal-header btnclr" >
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title"><?php echo display('ADD NEW CUSTOMER') ?></h4>
         </div>
         <div class="container"></div>
         <div class="modal-body">
            <div id="customeMessage" class="alert hide"></div>
            <form id="instant_customer"  method="post">
               <div id="customeMessage" class="alert hide"></div>
               <div class="panel-body">
                  <div class="col-sm-6">
                     <div class="form-group row">
                        <label for="customer_name" class="col-sm-4 col-form-label"><?php echo display('Company Name') ?><i class="text-danger">*</i></label>
                        <div class="col-sm-8">
                           <input class="form-control" name ="customer_name" id="customer_name" type="text" placeholder=" Company Name"   required="" tabindex="1" >
                        </div>
                     </div>
                     <input type ="hidden" name="csrf_test_name" id="" value="<?php echo $this->security->get_csrf_hash();?>">
                     <div class="form-group row">
                        <label for="customer_type" class="col-sm-4 col-form-label"> <?php echo display('Customer Type') ?></label>
                        <div class="col-sm-8">
                           <select   name="customer_type" id="customer_type" class=" form-control" placeholder="Customer Type" >
                              <option value=""><?php echo display('Select Customer Type') ?></option>
                              <option value="Distributor"><?php echo display('Distributor') ?></option>
                              <option value="Fabricator"><?php echo display('Fabricator') ?></option>
                              <option value="Kitchen"><?php echo display('Kitchen') ?></option>
                              <option value="Dealer"><?php echo display('Dealer') ?></option>
                              <option value="Contractor"><?php echo display('Contractor') ?></option>
                              <option value="Builder"><?php echo display('Builder') ?></option>
                              <option value="Others"><?php echo display('Others') ?></option>
                           </select>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="email" class="col-sm-4 col-form-label"><?php echo display('Primary Email') ?><i class="text-danger">*</i></label>
                        <div class="col-sm-8">
                           <input class="form-control" name ="email" id="email" type="email" required="" placeholder="Primary Email" > 
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="emailaddress" class="col-sm-4 col-form-label"><?php echo display('Secondary Email ') ?></label>
                        <div class="col-sm-8">
                           <input class="form-control" name="emailaddress" id="emailaddress" type="email" placeholder="Secondary Email"  >
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="mobile" class="col-sm-4 col-form-label"><?php echo display('Business Phone') ?><i class="text-danger">*</i></label>
                        <div class="col-sm-8">
                           <input class="form-control" name ="phone" id="mobile" type="number" placeholder="Business Phone" min="0" tabindex="3" required="">
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="mobile" class="col-sm-4 col-form-label"><?php echo display('Mobile') ?></label>
                        <div class="col-sm-8">
                           <input class="form-control" name="mobile" id="mobile" type="number" placeholder="Mobile"  min="0" tabindex="2" >
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="contact" class="col-sm-4 col-form-label"><?php echo display('Contact Person ') ?><i class="text-danger">*</i></label>
                        <div class="col-sm-8">
                           <input class="form-control" name="contact" id="contact" type="text" placeholder="Contact Person" required="" >
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="ETA" class="col-sm-4 col-form-label"><?php echo display('Attachments') ?></label>
                        <div class="col-sm-8">
                           <input type="file" name="file" class="form-control">
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="Preferred currency" class="col-sm-4 col-form-label"> <?php echo display('Preferred currency') ?><i class="text-danger">*</i></label>
                        <div class="col-sm-8">
                           <select  class="form-control" id="currency" name="currency1"  style="width: 100%;" required=""  style="max-width: -webkit-fill-available;">
                              <option value="USD">USD - US Dollar - $</option>
                              <option value="AFN">AFN - Afghan Afghani - ؋</option>
                              <option value="ALL">ALL - Albanian Lek - Lek</option>
                              <option value="DZD">DZD - Algerian Dinar - دج</option>
                              <option value="AOA">AOA - Angolan Kwanza - Kz</option>
                              <option value="ARS">ARS - Argentine Peso - $</option>
                              <option value="AMD">AMD - Armenian Dram - ֏</option>
                              <option value="AWG">AWG - Aruban Florin - ƒ</option>
                              <option value="AUD">AUD - Australian Dollar - $</option>
                              <option value="AZN">AZN - Azerbaijani Manat - m</option>
                              <option value="BSD">BSD - Bahamian Dollar - B$</option>
                              <option value="BHD">BHD - Bahraini Dinar - .د.ب</option>
                              <option value="BDT">BDT - Bangladeshi Taka - ৳</option>
                              <option value="BBD">BBD - Barbadian Dollar - Bds$</option>
                              <option value="BYR">BYR - Belarusian Ruble - Br</option>
                              <option value="BEF">BEF - Belgian Franc - fr</option>
                              <option value="BZD">BZD - Belize Dollar - $</option>
                              <option value="BMD">BMD - Bermudan Dollar - $</option>
                              <option value="BTN">BTN - Bhutanese Ngultrum - Nu.</option>
                              <option value="BTC">BTC - Bitcoin - ฿</option>
                              <option value="BOB">BOB - Bolivian Boliviano - Bs.</option>
                              <option value="BAM">BAM - Bosnia-Herzegovina Convertible Mark - KM</option>
                              <option value="BWP">BWP - Botswanan Pula - P</option>
                              <option value="BRL">BRL - Brazilian Real - R$</option>
                              <option value="GBP">GBP - British Pound Sterling - £</option>
                              <option value="BND">BND - Brunei Dollar - B$</option>
                              <option value="BGN">BGN - Bulgarian Lev - Лв.</option>
                              <option value="BIF">BIF - Burundian Franc - FBu</option>
                              <option value="KHR">KHR - Cambodian Riel - KHR</option>
                              <option value="CAD">CAD - Canadian Dollar - $</option>
                              <option value="CVE">CVE - Cape Verdean Escudo - $</option>
                              <option value="KYD">KYD - Cayman Islands Dollar - $</option>
                              <option value="XOF">XOF - CFA Franc BCEAO - CFA</option>
                              <option value="XAF">XAF - CFA Franc BEAC - FCFA</option>
                              <option value="XPF">XPF - CFP Franc - ₣</option>
                              <option value="CLP">CLP - Chilean Peso - $</option>
                              <option value="CNY">CNY - Chinese Yuan - ¥</option>
                              <option value="COP">COP - Colombian Peso - $</option>
                              <option value="KMF">KMF - Comorian Franc - CF</option>
                              <option value="CDF">CDF - Congolese Franc - FC</option>
                              <option value="CRC">CRC - Costa Rican ColÃ³n - ₡</option>
                              <option value="HRK">HRK - Croatian Kuna - kn</option>
                              <option value="CUC">CUC - Cuban Convertible Peso - $, CUC</option>
                              <option value="CZK">CZK - Czech Republic Koruna - Kč</option>
                              <option value="DKK">DKK - Danish Krone - Kr.</option>
                              <option value="DJF">DJF - Djiboutian Franc - Fdj</option>
                              <option value="DOP">DOP - Dominican Peso - $</option>
                              <option value="XCD">XCD - East Caribbean Dollar - $</option>
                              <option value="EGP">EGP - Egyptian Pound - ج.م</option>
                              <option value="ERN">ERN - Eritrean Nakfa - Nfk</option>
                              <option value="EEK">EEK - Estonian Kroon - kr</option>
                              <option value="ETB">ETB - Ethiopian Birr - Nkf</option>
                              <option value="EUR">EUR - Euro - €</option>
                              <option value="FKP">FKP - Falkland Islands Pound - £</option>
                              <option value="FJD">FJD - Fijian Dollar - FJ$</option>
                              <option value="GMD">GMD - Gambian Dalasi - D</option>
                              <option value="GEL">GEL - Georgian Lari - ლ</option>
                              <option value="DEM">DEM - German Mark - DM</option>
                              <option value="GHS">GHS - Ghanaian Cedi - GH₵</option>
                              <option value="GIP">GIP - Gibraltar Pound - £</option>
                              <option value="GRD">GRD - Greek Drachma - ₯, Δρχ, Δρ</option>
                              <option value="GTQ">GTQ - Guatemalan Quetzal - Q</option>
                              <option value="GNF">GNF - Guinean Franc - FG</option>
                              <option value="GYD">GYD - Guyanaese Dollar - $</option>
                              <option value="HTG">HTG - Haitian Gourde - G</option>
                              <option value="HNL">HNL - Honduran Lempira - L</option>
                              <option value="HKD">HKD - Hong Kong Dollar - $</option>
                              <option value="HUF">HUF - Hungarian Forint - Ft</option>
                              <option value="ISK">ISK - Icelandic KrÃ³na - kr</option>
                              <option value="INR">INR - Indian Rupee - ₹</option>
                              <option value="IDR">IDR - Indonesian Rupiah - Rp</option>
                              <option value="IRR">IRR - Iranian Rial - ﷼</option>
                              <option value="IQD">IQD - Iraqi Dinar - د.ع</option>
                              <option value="ILS">ILS - Israeli New Sheqel - ₪</option>
                              <option value="ITL">ITL - Italian Lira - L,£</option>
                              <option value="JMD">JMD - Jamaican Dollar - J$</option>
                              <option value="JPY">JPY - Japanese Yen - ¥</option>
                              <option value="JOD">JOD - Jordanian Dinar - ا.د</option>
                              <option value="KZT">KZT - Kazakhstani Tenge - лв</option>
                              <option value="KES">KES - Kenyan Shilling - KSh</option>
                              <option value="KWD">KWD - Kuwaiti Dinar - ك.د</option>
                              <option value="KGS">KGS - Kyrgystani Som - лв</option>
                              <option value="LAK">LAK - Laotian Kip - ₭</option>
                              <option value="LVL">LVL - Latvian Lats - Ls</option>
                              <option value="LBP">LBP - Lebanese Pound - £</option>
                              <option value="LSL">LSL - Lesotho Loti - L</option>
                              <option value="LRD">LRD - Liberian Dollar - $</option>
                              <option value="LYD">LYD - Libyan Dinar - د.ل</option>
                              <option value="LTL">LTL - Lithuanian Litas - Lt</option>
                              <option value="MOP">MOP - Macanese Pataca - $</option>
                              <option value="MKD">MKD - Macedonian Denar - ден</option>
                              <option value="MGA">MGA - Malagasy Ariary - Ar</option>
                              <option value="MWK">MWK - Malawian Kwacha - MK</option>
                              <option value="MYR">MYR - Malaysian Ringgit - RM</option>
                              <option value="MVR">MVR - Maldivian Rufiyaa - Rf</option>
                              <option value="MRO">MRO - Mauritanian Ouguiya - MRU</option>
                              <option value="MUR">MUR - Mauritian Rupee - ₨</option>
                              <option value="MXN">MXN - Mexican Peso - $</option>
                              <option value="MDL">MDL - Moldovan Leu - L</option>
                              <option value="MNT">MNT - Mongolian Tugrik - ₮</option>
                              <option value="MAD">MAD - Moroccan Dirham - MAD</option>
                              <option value="MZM">MZM - Mozambican Metical - MT</option>
                              <option value="MMK">MMK - Myanmar Kyat - K</option>
                              <option value="NAD">NAD - Namibian Dollar - $</option>
                              <option value="NPR">NPR - Nepalese Rupee - ₨</option>
                              <option value="ANG">ANG - Netherlands Antillean Guilder - ƒ</option>
                              <option value="TWD">TWD - New Taiwan Dollar - $</option>
                              <option value="NZD">NZD - New Zealand Dollar - $</option>
                              <option value="NIO">NIO - Nicaraguan CÃ³rdoba - C$</option>
                              <option value="NGN">NGN - Nigerian Naira - ₦</option>
                              <option value="KPW">KPW - North Korean Won - ₩</option>
                              <option value="NOK">NOK - Norwegian Krone - kr</option>
                              <option value="OMR">OMR - Omani Rial - .ع.ر</option>
                              <option value="PKR">PKR - Pakistani Rupee - ₨</option>
                              <option value="PAB">PAB - Panamanian Balboa - B/.</option>
                              <option value="PGK">PGK - Papua New Guinean Kina - K</option>
                              <option value="PYG">PYG - Paraguayan Guarani - ₲</option>
                              <option value="PEN">PEN - Peruvian Nuevo Sol - S/.</option>
                              <option value="PHP">PHP - Philippine Peso - ₱</option>
                              <option value="PLN">PLN - Polish Zloty - zł</option>
                              <option value="QAR">QAR - Qatari Rial - ق.ر</option>
                              <option value="RON">RON - Romanian Leu - lei</option>
                              <option value="RUB">RUB - Russian Ruble - ₽</option>
                              <option value="RWF">RWF - Rwandan Franc - FRw</option>
                              <option value="SVC">SVC - Salvadoran ColÃ³n - ₡</option>
                              <option value="WST">WST - Samoan Tala - SAT</option>
                              <option value="SAR">SAR - Saudi Riyal - ﷼</option>
                              <option value="RSD">RSD - Serbian Dinar - din</option>
                              <option value="SCR">SCR - Seychellois Rupee - SRe</option>
                              <option value="SLL">SLL - Sierra Leonean Leone - Le</option>
                              <option value="SGD">SGD - Singapore Dollar - $</option>
                              <option value="SKK">SKK - Slovak Koruna - Sk</option>
                              <option value="SBD">SBD - Solomon Islands Dollar - Si$</option>
                              <option value="SOS">SOS - Somali Shilling - Sh.so.</option>
                              <option value="ZAR">ZAR - South African Rand - R</option>
                              <option value="KRW">KRW - South Korean Won - ₩</option>
                              <option value="XDR">XDR - Special Drawing Rights - SDR</option>
                              <option value="LKR">LKR - Sri Lankan Rupee - Rs</option>
                              <option value="SHP">SHP - St. Helena Pound - £</option>
                              <option value="SDG">SDG - Sudanese Pound - .س.ج</option>
                              <option value="SRD">SRD - Surinamese Dollar - $</option>
                              <option value="SZL">SZL - Swazi Lilangeni - E</option>
                              <option value="SEK">SEK - Swedish Krona - kr</option>
                              <option value="CHF">CHF - Swiss Franc - CHf</option>
                              <option value="SYP">SYP - Syrian Pound - LS</option>
                              <option value="STD">STD - São Tomé and Príncipe Dobra - Db</option>
                              <option value="TJS">TJS - Tajikistani Somoni - SM</option>
                              <option value="TZS">TZS - Tanzanian Shilling - TSh</option>
                              <option value="THB">THB - Thai Baht - ฿</option>
                              <option value="TOP">TOP - Tongan pa'anga - $</option>
                              <option value="TTD">TTD - Trinidad & Tobago Dollar - $</option>
                              <option value="TND">TND - Tunisian Dinar - ت.د</option>
                              <option value="TRY">TRY - Turkish Lira - ₺</option>
                              <option value="TMT">TMT - Turkmenistani Manat - T</option>
                              <option value="UGX">UGX - Ugandan Shilling - USh</option>
                              <option value="UAH">UAH - Ukrainian Hryvnia - ₴</option>
                              <option value="AED">AED - United Arab Emirates Dirham - إ.د</option>
                              <option value="UYU">UYU - Uruguayan Peso - $</option>
                              <option value="UZS">UZS - Uzbekistan Som - лв</option>
                              <option value="VUV">VUV - Vanuatu Vatu - VT</option>
                              <option value="VEF">VEF - Venezuelan BolÃvar - Bs</option>
                              <option value="VND">VND - Vietnamese Dong - ₫</option>
                              <option value="YER">YER - Yemeni Rial - ﷼</option>
                              <option value="ZMK">ZMK - Zambian Kwacha - ZK</option>
                           </select>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group row">
                        <label for="fax" class="col-sm-4 col-form-label"><?php echo display('fax'); ?> <i class="text-danger"></i></label>
                        <div class="col-sm-8">
                           <input class="form-control" name="fax" id="fax" type="text" placeholder="Fax" >
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="address2 " class="col-sm-4 col-form-label"><?php echo display('Billing Address') ?><i class="text-danger">*</i></label>
                        <div class="col-sm-8">
                           <textarea class="form-control" required="" name="address2" id="address2" rows="2"   placeholder="Billing Address" ></textarea>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="address " class="col-sm-4 col-form-label"><?php echo display('Shipping Address') ?></label>
                        <div class="col-sm-8">
                           <textarea class="form-control" name="address" id="address "    rows="2" placeholder="Shipping Address"></textarea>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="city" class="col-sm-4 col-form-label"><?php echo display('City') ?> <i class="text-danger">*</i></label>
                        <div class="col-sm-8">
                           <input class="form-control" name="city" id="city" type="text" placeholder="City" required="" >
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="state" class="col-sm-4 col-form-label"><?php echo display('State') ?> <i class="text-danger">*</i></label>
                        <div class="col-sm-8">
                           <input class="form-control" name="state" id="state" type="text" placeholder="State" required="" >
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="zip" class="col-sm-4 col-form-label"><?php echo display('Zip') ?> <i class="text-danger">*</i></label>
                        <div class="col-sm-8">
                           <input class="form-control" name="zip" id="zip" type="text" placeholder="Zip"  required="">
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="country" class="col-sm-4 col-form-label"><?php echo display('Country') ?><i class="text-danger">*</i></label>
                        <div class="col-sm-8">
                           <select class=" countrypicker form-control"  data-live-search="true" data-default="United States"  name="country" id="country" ></select>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="billing_address" class="col-sm-4 col-form-label"><?php echo display('Payment Terms') ?><i class="text-danger">*</i></label>
                        <div class="col-sm-8">
                           <select   name="payment" id="payment_terms" class=" form-control" placeholder='Payment Terms'  required="" >
                              <option value="">Select Payment Terms </option>
                              <option value="COD">COD</option>
                              <option value="30 Days">30 Days</option>
                              <option value="45 Days">45 Days</option>
                              <option value="60 Days">60 Days</option>
                              <option value="90 Days">90 Days</option>
                              <?php foreach($payment_terms as $inv){ ?>
                              <option value="<?php echo $inv['payment_terms'] ; ?>"><?php echo $inv['payment_terms'] ; ?></option>
                              <?php    }?>
                           </select>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="previous_balance" class="col-sm-4 col-form-label"><?php echo display('Credit Limit') ?> <i class="text-danger">*</i></label>
                        <div class="col-sm-8">
                           <input class="form-control" name="previous_balance" id="previous_balance" type="text" min="0" placeholder="Credit Limit" tabindex="5" required="">
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="invoice_no" class="col-sm-4 col-form-label"><?php echo display('Sales Tax') ?>
                        </label>
                        <div class="col-sm-8">
                           <select name="sales_taxes" class="form-control"  id="tax_dropdown" tabindex="3">
                              <option value=""selected>Select Sales Tax</option>
                              <option value="1"><?php echo display('NO') ?></option>
                              <option value="2"><?php echo display('YES') ?></option>
                           </select>
                        </div>
                        &nbsp;&nbsp;
                        <div class="form-group row" id="tax">
                           <div class="row">
                              <div class="col-sm-12">
                                 <label for="sales" class="col-sm-4 col-form-label"><?php echo display('Sales Tax') ?></label>
                                 <div class="col-sm-8">
                                    <select  class="form-control" name="tax" value="" tabindex="3" style="width:95%"  >
                                       <option value="">Select the State</option>
                                       <option value="Alabama">Alabama</option>
                                       <option value="Alaska">Alaska</option>
                                       <option value="Arizona">Arizona</option>
                                       <option value="Arkansas">Arkansas</option>
                                       <option value="California">California</option>
                                       <option value="Colorado">Colorado</option>
                                       <option value="Connecticut">Connecticut</option>
                                       <option value="Delaware">Delaware</option>
                                       <option value="District Of Columbia">District Of Columbia</option>
                                       <option value="Florida">Florida</option>
                                       <option value="Georgia">Georgia</option>
                                       <option value="Hawaii">Hawaii</option>
                                       <option value="Idaho">Idaho</option>
                                       <option value="Illinois">Illinois</option>
                                       <option value="Indiana">Indiana</option>
                                       <option value="Iowa">Iowa</option>
                                       <option value="Kansas">Kansas</option>
                                       <option value="Kentucky">Kentucky</option>
                                       <option value="Louisiana">Louisiana</option>
                                       <option value="Maine">Maine</option>
                                       <option value="Maryland">Maryland</option>
                                       <option value="Massachusetts">Massachusetts</option>
                                       <option value="Michigan">Michigan</option>
                                       <option value="Minnesota">Minnesota</option>
                                       <option value="Mississippi">Mississippi</option>
                                       <option value="Missouri">Missouri</option>
                                       <option value="Montana">Montana</option>
                                       <option value="Nebraska">Nebraska</option>
                                       <option value="Nevada">Nevada</option>
                                       <option value="New Hampshire">New Hampshire</option>
                                       <option value="New Jersey">New Jersey</option>
                                       <option value="New Mexico">New Mexico</option>
                                       <option value="New York">New York</option>
                                       <option value="North Carolina">North Carolina</option>
                                       <option value="North Dakota">North Dakota</option>
                                       <option value="Ohio">Ohio</option>
                                       <option value="Oklahoma">Oklahoma</option>
                                       <option value="Oregon">Oregon</option>
                                       <option value="Pennsylvania">Pennsylvania</option>
                                       <option value="Rhode Island">Rhode Island</option>
                                       <option value="South Carolina">South Carolina</option>
                                       <option value="South Dakota">South Dakota</option>
                                       <option value="Tennessee">Tennessee</option>
                                       <option value="Texas">Texas</option>
                                       <option value="Utah">Utah</option>
                                       <option value="Vermont">Vermont</option>
                                       <option value="Virginia">Virginia</option>
                                       <option value="Washington">Washington</option>
                                       <option value="West Virginia">West Virginia</option>
                                       <option value="Wisconsin">Wisconsin</option>
                                       <option value="Wyoming">Wyoming</option>
                                    </select>
                                 </div>
                              </div>
                           </div>
                           &nbsp;&nbsp;
                           <div class="form-group row" id="tax">
                              <div class="col-sm-12">
                                 <label for="sales" class="col-sm-4 col-form-label"><?php echo display('Tax Rates') ?> </label>
                                 <div class="col-sm-8">
                                    <input name="taxes"  class="form-control taxes"  placeholder="%"   style="width:95%" tabindex="4">
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
         </div>
         <div class="modal-footer">
         <a href="#" class="btn btnclr" data-dismiss="modal"  ><?php echo display('Close') ?></a>
         <input type="submit" class="btn btnclr"   value=<?php echo display('Submit') ?> >
         </div>
         </form>
      </div>
   </div>
</div>
<!------ add new Payment Type -->
<div class="modal fade" id="payment_type_new" role="dialog">
   <div class="modal-dialog" role="document">
      <div class="modal-content" style="text-align:center;">
         <div class="modal-header btnclr">
            <a href="#" class="close" data-dismiss="modal">&times;</a>
            <h4 class="modal-title"> <?php echo display('Add New Payment Terms') ?> </h4>
         </div>
         <div class="modal-body">
            <div id="customeMessage" class="alert hide"></div>
            <form id="add_pay_terms" method="post">
               <div class="panel-body">
                  <input type ="hidden" name="csrf_test_name" id="" value="<?php echo $this->security->get_csrf_hash();?>">
                  <div class="form-group row">
                     <label for="customer_name" style="width: auto;" class="col-sm-3 col-form-label"><?php echo display('New Payment Terms') ?> <i class="text-danger">*</i></label>
                     <div class="col-sm-6">
                        <input class="form-control" name ="new_payment_terms" id="new_payment_terms" type="text" placeholder="New Payment Terms"  required="" tabindex="1">
                     </div>
                  </div>
               </div>
         </div>
         <div class="modal-footer">
         <a href="#" class="btn btnclr"  data-dismiss="modal"><?php echo display('Close') ?> </a>
         <input type="submit" class="btn btnclr"  value=<?php echo display('Submit') ?>>
         </div>
         </form>
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!------ add new Payment Type -->
<div class="modal fade" id="payment_type" role="dialog">
   <div class="modal-dialog" role="document">
      <div class="modal-content" style="text-align:center;">
         <div class="modal-header btnclr" >
            <a href="#" class="close" data-dismiss="modal">&times;</a>
            <h4 class="modal-title"> <?php echo display('Add New Payment Terms') ?> </h4>
         </div>
         <div class="modal-body">
            <div id="customeMessage" class="alert hide"></div>
            <form id="add_pay_terms" method="post">
               <div class="panel-body">
                  <input type ="hidden" name="csrf_test_name" id="" value="<?php echo $this->security->get_csrf_hash();?>">
                  <div class="form-group row">
                     <label for="customer_name" style="width: auto;" class="col-sm-3 col-form-label"><?php echo display('New Payment Terms') ?> <i class="text-danger">*</i></label>
                     <div class="col-sm-6">
                        <input class="form-control" name ="new_payment_terms" id="new_payment_terms" type="text" placeholder="New Payment Terms"  required="" tabindex="1">
                     </div>
                  </div>
               </div>
         </div>
         <div class="modal-footer">
         <a href="#" class="btn btnclr"  data-dismiss="modal"><?php echo display('Close') ?> </a>
         <input type="submit" class="btn btnclr"  value=<?php echo display('Submit') ?>>
         </div>
         </form>
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- <div class="modal fade" id="add_agent" role="dialog">
   <div class="modal-dialog" role="document">
      <div class="modal-content" style="text-align:center;">
         <div class="modal-header btnclr">
            <a href="#" class="close" data-dismiss="modal">&times;</a>
            <h4 class="modal-title"> <?php echo  ('Add New Sales Partner') ?> </h4>
         </div>
         <div class="modal-body">
            <div id="customeMessage" class="alert hide"></div>
            <form id="add_agent_data" method="post">
               <div class="panel-body">
                  <input type ="hidden" name="csrf_test_name" id="" value="<?php echo $this->security->get_csrf_hash();?>">
                  <div class="form-group row">
                     <label for="new_agent"  class="col-sm-4 col-form-label"><?php echo  ('Name') ?> <i class="text-danger">*</i></label>
                     <div class="col-sm-6">
                        <input class="form-control" name ="new_agent" id="new_agent" type="text" style="left: 65px;" placeholder="Sales Partner Name"  required="" tabindex="1">
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="agent_commission"  class="col-sm-4 col-form-label"><?php echo  'Commission(%)' ?> <i class="text-danger">*</i></label>
                     <div class="col-sm-6">
                        <input class="form-control" name ="agent_commission" id="agent_commission" type="number" placeholder="Sales Partner Commission"  required="" tabindex="1">
                     </div>
                  </div>
               </div>
         </div>
         <div class="modal-footer">
         <a href="#" class="btn btnclr"  data-dismiss="modal"><?php echo display('Close') ?> </a>
         <input type="submit" class="btn btnclr"  value=<?php echo display('Submit') ?>>
         </div>
         </form>
      </div>
   </div>
</div> -->

<!-- Employee Create Start -->
<div class="modal fade employeeAddModalsdata" id="add_agent" role="dialog">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content" style="text-align:center;">
         <div class="modal-header btnclr">
            <a href="#" class="close" data-dismiss="modal">&times;</a>
            <h4 class="modal-title"> <?php echo ('Add Employee'); ?> </h4>
         </div>
         <div class="modal-body" style="max-height: 600px; overflow-y: auto;">
            <div id="customeMessage" class="alert hide"></div>
            <form id="add_agent_data" method="post">
               <div class="panel-body">
                  <input type ="hidden" name="csrf_test_name" id="" value="<?php echo $this->security->get_csrf_hash();?>">
                  <div class="col-md-6">
                     <div class="form-group" style="text-align: left;">
                        <label><?php echo ('First Name') ?> <i class="text-danger">*</i></label>
                        <input name="first_name" class="form-control" type="text" placeholder="<?php echo display('first_name') ?>" required oninput="this.value = this.value.replace(/[^A-Za-z]/g, '')">
                     </div>
                  </div>

                  <div class="col-md-6">
                     <div class="form-group" style="text-align: left;">
                        <label><?php echo  ('Sales Commission') ?> <i class="text-danger">*</i></label>
                        <input name="sc" class="form-control" type="text" placeholder="<?php echo 'sales commission percentage' ?>">
                     </div>
                  </div>

                  <div class="col-md-6">
                     <div class="form-group" style="text-align: left;">
                        <label><?php echo ('Middle Name') ?></label>
                        <input name="middle_name" class="form-control" type="text" placeholder="<?php echo "Middle Name"; ?>" oninput="this.value = this.value.replace(/[^A-Za-z]/g, '')">
                     </div>
                  </div>

                  <div class="col-md-6">
                     <div class="form-group" style="text-align: left;">
                        <label><?php echo ('Payroll Type') ?> <i class="text-danger">*</i></label>
                        <select  name="payroll_type" id="payroll_type" requried class="form-control">
                           <option value="">Select the Payroll Type</option>
                           <option value="Hourly">Hourly</option>
                           <option value="Salaried-weekly">Salaried-Weekly</option>
                           <option value="Salaried-BiWeekly">Salaried-BiWeekly</option>
                           <option value="Salaried-Monthly">Salaried-Monthly</option>
                           <option value="Salaried-BiMonthly">Salaried-BiMonthly</option>
                           <option value="SalesCommission">SalesCommission</option>
                           <?php foreach($payroll_data as $prolltype){ ?>
                           <option value="<?php  echo $prolltype['payroll_type'] ;?>"><?php  echo $prolltype['payroll_type'] ;?></option>
                           <?php  } ?>
                        </select>
                     </div>
                  </div>

                  <div class="col-md-6">
                     <div class="form-group" style="text-align: left;">
                        <label><?php echo ('Last Name') ?> <i class="text-danger">*</i></label>
                        <input name="last_name" class="form-control" type="text" placeholder="<?php echo display('last_name') ?>" required oninput="this.value = this.value.replace(/[^A-Za-z]/g, '')">
                     </div>
                  </div>

                  <div class="col-md-6">
                     <div class="form-group" style="text-align: left;">
                        <label>Pay rate(<?php echo $currency; ?>) <i class="text-danger">*</i></label>
                        <input name="hrate" class="form-control" type="text" placeholder="<?php echo "Pay rate" ?>" id="hrate" oninput="validateInput(this)">
                     </div>
                  </div>

                  <div class="col-md-6">
                     <div class="row">
                        <div class="col-md-10">
                           <div class="form-group" style="text-align: left;">
                              <label><?php echo ('Designation') ?> <i class="text-danger">*</i></label>
                              <select name="designation"  id="desig"  class="form-control" style="width: 100%;"required>
                                 <option value="">Select Designation</option>
                                 <?php  foreach($desig as $ds){ ?>
                                 <option value="<?php  echo $ds['designation'] ;?>"><?php  echo $ds['designation'] ;?></option>
                                 <?php  } ?>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-2">
                           <a class="btnclr client-add-btn btn" aria-hidden="true" data-toggle="modal" data-target="#designation_modal" style="margin-top: 25px;"><i class="fa fa-plus"></i></a>
                        </div>
                     </div>
                  </div>

                   <div class="col-md-6">
                     <div class="row">
                        <div class="col-md-10">
                           <div class="form-group" style="text-align: left;">
                              <label><?php echo ('Payment Type') ?> <i class="text-danger">*</i></label>
                              <select name="paytype"  id="paytype" class="form-control" style="width: 100%;" >
                                 <option value="">Select Type</option>
                                 <option value="Cheque">Cheque</option>
                                 <option value="Direct Deposit">Direct Deposit</option>
                                 <option value="Cash">Cash</option>
                                 <?php  foreach($paytype as $ptype){ ?>
                                 <option value="<?php  echo $ptype['payment_type'] ;?>"><?php  echo $ptype['payment_type'] ;?></option>
                                 <?php  } ?>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-2">
                           <a class="btnclr client-add-btn btn" aria-hidden="true" data-toggle="modal" data-target="#payment_type" style="margin-top: 25px;"><i class="fa fa-plus"></i></a>
                        </div>
                     </div>
                  </div>

                  <div class="col-md-6">
                     <div class="form-group" style="text-align: left;">
                        <label><?php echo ('Phone') ?> <i class="text-danger">*</i></label>
                        <input name="phone" class="form-control" type="number" placeholder="<?php echo display('phone') ?>" id="phone" required>
                     </div>
                  </div>

                  <div class="col-md-6">
                     <div class="form-group" style="text-align: left;">
                        <label><?php echo ('Social security number') ?> <i class="text-danger">*</i></label>
                        <input name="ssn" class="form-control" type="text" placeholder="Social security number" required oninput="exitsocialsecurity(this, 9)">
                     </div>
                  </div>

                  <div class="col-md-6">
                     <div class="form-group" style="text-align: left;">
                        <label><?php echo ('Email') ?> <i class="text-danger">*</i> &nbsp; <span id="validateemails"></span></label>
                         <input name="email" class="form-control" type="email" placeholder="<?php echo display('email') ?>" id="email" oninput="validateEmail(this)">
                     </div>
                  </div>

                  <div class="col-md-6">
                      <div class="row">
                        <div class="col-md-10">
                           <div class="form-group" style="text-align: left;">
                              <label><?php echo ('Bank') ?></label>
                               <select name="bank_name" id="bank_name"  class="form-control bankpayment">
                                 <option>Select Bank</option>
                                 <option value="NA">NA (Not Applicable)</option>
                                 <option value="JPMorgan Chase">JPMorgan Chase</option>
                                 <option value="New York City">New York City</option>
                                 <option value="Bank of America">Bank of America</option>
                                 <option value="Citigroup">Citigroup</option>
                                 <option value="Wells Fargo">Wells Fargo</option>
                                 <option value="Goldman Sachs">Goldman Sachs</option>
                                 <option value="Morgan Stanley">Morgan Stanley</option>
                                 <option value="U.S. Bancorp">U.S. Bancorp</option>
                                 <option value="PNC Financial Services">PNC Financial Services</option>
                                 <option value="Truist Financial">Truist Financial</option>
                                 <option value="Charles Schwab Corporation">Charles Schwab Corporation</option>
                                 <option value="TD Bank, N.A.">TD Bank, N.A.</option>
                                 <option value="Capital One">Capital One</option>
                                 <option value="The Bank of New York Mellon">The Bank of New York Mellon</option>
                                 <option value="State Street Corporation">State Street Corporation</option>
                                 <option value="American Express">American Express</option>
                                 <option value="Citizens Financial Group">Citizens Financial Group</option>
                                 <option value="HSBC Bank USA">HSBC Bank USA</option>
                                 <option value="SVB Financial Group">SVB Financial Group</option>
                                 <option value="First Republic Bank ">First Republic Bank </option>
                                 <option value="Fifth Third Bank">Fifth Third Bank</option>
                                 <option value="BMO USA">BMO USA</option>
                                 <option value="USAA">USAA</option>
                                 <option value="UBS">UBS</option>
                                 <option value="M&T Bank">M&T Bank</option>
                                 <option value="Ally Financial">Ally Financial</option>
                                 <option value="KeyCorp">KeyCorp</option>
                                 <option value="Huntington Bancshares">Huntington Bancshares</option>
                                 <option value="Barclays">Barclays</option>
                                 <option value="Santander Bank">Santander Bank</option>
                                 <option value="RBC Bank">RBC Bank</option>
                                 <option value="Ameriprise">Ameriprise</option>
                                 <option value="Regions Financial Corporation">Regions Financial Corporation</option>
                                 <option value="Northern Trust">Northern Trust</option>
                                 <option value="BNP Paribas">BNP Paribas</option>
                                 <option value="Discover Financial">Discover Financial</option>
                                 <option value="First Citizens BancShares">First Citizens BancShares</option>
                                 <option value="Synchrony Financial">Synchrony Financial</option>
                                 <option value="Deutsche Bank">Deutsche Bank</option>
                                 <option value="New York Community Bank">New York Community Bank</option>
                                 <option value="Comerica">Comerica</option>
                                 <option value="First Horizon National Corporation">First Horizon National Corporation</option>
                                 <option value="Raymond James Financial">Raymond James Financial</option>
                                 <option value="Webster Bank">Webster Bank</option>
                                 <option value="Western Alliance Bank">Western Alliance Bank</option>
                                 <option value="Popular, Inc.">Popular, Inc.</option>
                                 <option value="CIBC Bank USA">CIBC Bank USA</option>
                                 <option value="East West Bank">East West Bank</option>
                                 <option value="Synovus">Synovus</option>
                                 <option value="Valley National Bank">Valley National Bank</option>
                                 <option value="Credit Suisse ">Credit Suisse </option>
                                 <option value="Mizuho Financial Group">Mizuho Financial Group</option>
                                 <option value="Wintrust Financial">Wintrust Financial</option>
                                 <option value="Cullen/Frost Bankers, Inc.">Cullen/Frost Bankers, Inc.</option>
                                 <option value="John Deere Capital Corporation">John Deere Capital Corporation</option>
                                 <option value="MUFG Union Bank">MUFG Union Bank</option>
                                 <option value="BOK Financial Corporation">BOK Financial Corporation</option>
                                 <option value="Old National Bank">Old National Bank</option>
                                 <option value="South State Bank">South State Bank</option>
                                 <option value="FNB Corporation">FNB Corporation</option>
                                 <option value="Pinnacle Financial Partners">Pinnacle Financial Partners</option>
                                 <option value="PacWest Bancorp">PacWest Bancorp</option>
                                 <option value="TIAA">TIAA</option>
                                 <option value="Associated Banc-Corp">Associated Banc-Corp</option>
                                 <option value="UMB Financial Corporation">UMB Financial Corporation</option>
                                 <option value="Prosperity Bancshares">Prosperity Bancshares</option>
                                 <option value="Stifel">Stifel</option>
                                 <option value="BankUnited">BankUnited</option>
                                 <option value="Hancock Whitney">Hancock Whitney</option>
                                 <option value="MidFirst Bank">MidFirst Bank</option>
                                 <option value="Sumitomo Mitsui Banking Corporation">Sumitomo Mitsui Banking Corporation</option>
                                 <option value="Beal Bank">Beal Bank</option>
                                 <option value="First Interstate BancSystem">First Interstate BancSystem</option>
                                 <option value="Commerce Bancshares">Commerce Bancshares</option>
                                 <option value="Umpqua Holdings Corporation">Umpqua Holdings Corporation</option>
                                 <option value="United Bank (West Virginia)">United Bank (West Virginia)</option>
                                 <option value="Texas Capital Bank">Texas Capital Bank</option>
                                 <option value="First National of Nebraska">First National of Nebraska</option>
                                 <option value="FirstBank Holding Co">FirstBank Holding Co</option>
                                 <option value="Simmons Bank">Simmons Bank</option>
                                 <option value="Fulton Financial Corporation">Fulton Financial Corporation</option>
                                 <option value="Glacier Bancorp">Glacier Bancorp</option>
                                 <option value="Arvest Bank">Arvest Bank</option>
                                 <option value="BCI Financial Group">BCI Financial Group</option>
                                 <option value="Ameris Bancorp">Ameris Bancorp</option>
                                 <option value="First Hawaiian Bank">First Hawaiian Bank</option>
                                 <option value="United Community Bank">United Community Bank</option>
                                 <option value="Bank of Hawaii">Bank of Hawaii</option>
                                 <option value="Home BancShares">Home BancShares</option>
                                 <option value="Eastern Bank">Eastern Bank</option>
                                 <option value="Cathay Bank">Cathay Bank</option>
                                 <option value="Pacific Premier Bancorp">Pacific Premier Bancorp</option>
                                 <option value="Washington Federal">Washington Federal</option>
                                 <option value="Customers Bancorp">Customers Bancorp</option>
                                 <option value="Atlantic Union Bank">Atlantic Union Bank</option>
                                 <option value="Columbia Bank">Columbia Bank</option>
                                 <option value="Heartland Financial USA">Heartland Financial USA</option>
                                 <option value="WSFS Bank">WSFS Bank</option>
                                 <option value="Central Bancompany">Central Bancompany</option>
                                 <option value="Independent Bank">Independent Bank</option>
                                 <option value="Hope Bancorp">Hope Bancorp</option>
                                 <option value="SoFi">SoFi</option>
                                 <?php foreach($bank_data as $bank){  ?>
                                 <option value="<?php  echo $bank['bank_name'] ;?>"><?php  echo $bank['bank_name'] ;?></option>
                                 <?php  } ?>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-2">
                           <a class="btnclr client-add-btn btn" aria-hidden="true" data-toggle="modal" data-target="#payment_type" style="margin-top: 25px;"><i class="fa fa-plus"></i></a>
                        </div>
                     </div>
                  </div>

                  <div class="col-md-6">
                     <div class="form-group" style="text-align: left;">
                        <label><?php echo ('Address Line 1') ?></label>
                        <textarea name="address_line_1" rows='1' class="form-control" placeholder="<?php echo display('address_line_1') ?>" id="address_line_1"></textarea> 
                     </div>
                  </div>

                  <div class="col-md-6">
                     <div class="form-group" style="text-align: left;">
                        <label><?php echo ('Routing number') ?> </label>
                        <input name="routing_number" class="form-control" type="text" placeholder="Routing number" oninput="routingrestrict(this, 15)">
                     </div>
                  </div>

                  <div class="col-md-6">
                     <div class="form-group" style="text-align: left;">
                        <label><?php echo ('Address Line 2') ?> </label>
                        <textarea name="address_line_2" rows='1' class="form-control" placeholder="<?php echo display('address_line_2') ?>" id="address_line_2"></textarea> 
                     </div>
                  </div>

                  <div class="col-md-6">
                     <div class="form-group" style="text-align: left;">
                        <label><?php echo ('Account Number') ?> </label>
                        <input type="text" name="account_number" class="form-control" placeholder="Account Number" oninput="routingrestrict(this, 15)">
                     </div>
                  </div>

                  <div class="col-md-6">
                     <div class="form-group" style="text-align: left;">
                        <label><?php echo ('City') ?> </label>
                        <input name="city" class="form-control" type="text" placeholder="<?php echo display('city') ?>" id="city" oninput="this.value = this.value.replace(/[^A-Za-z ]/g, '')">
                     </div>
                  </div>

                  <div class="col-md-6">
                     <div class="form-group" style="text-align: left;">
                        <label><?php echo ('Employee Tax') ?> <i class="text-danger">*</i></label>
                        <select  name="emp_tax_detail" id="emp_tax_detail" class="form-control" required>
                           <option value="">Select Tax</option>
                           <option value="single">Single</option>
                           <option value="tax_filling">Tax Filling</option>
                           <option value="married">Married</option>
                           <option value="head_household">Head Household</option>
                        </select>
                     </div>
                  </div>

                  <div class="col-md-6">
                     <div class="form-group" style="text-align: left;">
                        <label><?php echo ('State') ?> </label>
                        <input class="form-control" name="state" id="state" type="text" style="border:2px solid #D7D4D6;"    placeholder="<?php echo display('state') ?>"  oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '')">
                     </div>
                  </div>
                  
                  <div class="col-md-6">
                     <div class="form-group" style="text-align: left;">
                        <label><?php echo ('Zip code') ?> </label>
                        <input name="zip" class="form-control" type="text" placeholder="<?php echo display('zip') ?>" id="zip" oninput="exitnumbers(this, 10)">
                     </div>
                  </div>

                  <div class="col-md-6">
                     <div class="form-group" style="text-align: left;">
                        <label><?php echo ('Country') ?> </label>
                        <select name="country" class="form-control">
                           <option value="United States of America" rel="">United States of America</option>
                           <option value="Afganistan" rel="">Afghanistan</option>
                           <option value="Albania" rel="">Albania</option>
                           <option value="Algeria" rel="">Algeria</option>
                           <option value="American Samoa" rel="">American Samoa</option>
                           <option value="Andorra" rel="">Andorra</option>
                           <option value="Angola" rel="">Angola</option>
                           <option value="Anguilla" rel="">Anguilla</option>
                           <option value="Antigua &amp; Barbuda" rel="">Antigua &amp; Barbuda</option>
                           <option value="Argentina" rel="">Argentina</option>
                           <option value="Armenia" rel="">Armenia</option>
                           <option value="Aruba" rel="">Aruba</option>
                           <option value="Australia" rel="">Australia</option>
                           <option value="Austria" rel="">Austria</option>
                           <option value="Azerbaijan" rel="">Azerbaijan</option>
                           <option value="Bahamas" rel="">Bahamas</option>
                           <option value="Bahrain" rel="">Bahrain</option>
                           <option value="Bangladesh" rel="">Bangladesh</option>
                           <option value="Barbados" rel="">Barbados</option>
                           <option value="Belarus" rel="">Belarus</option>
                           <option value="Belgium" rel="">Belgium</option>
                           <option value="Belize" rel="">Belize</option>
                           <option value="Benin" rel="">Benin</option>
                           <option value="Bermuda" rel="">Bermuda</option>
                           <option value="Bhutan" rel="">Bhutan</option>
                           <option value="Bolivia" rel="">Bolivia</option>
                           <option value="Bonaire" rel="">Bonaire</option>
                           <option value="Bosnia &amp; Herzegovina" rel="">Bosnia &amp; Herzegovina</option>
                           <option value="Botswana" rel="">Botswana</option>
                           <option value="Brazil" rel="">Brazil</option>
                           <option value="British Indian Ocean Ter" rel="">British Indian Ocean Ter</option>
                           <option value="Brunei" rel="">Brunei</option>
                           <option value="Bulgaria" rel="">Bulgaria</option>
                           <option value="Burkina Faso" rel="">Burkina Faso</option>
                           <option value="Burundi" rel="">Burundi</option>
                           <option value="Cambodia" rel="">Cambodia</option>
                           <option value="Cameroon" rel="">Cameroon</option>
                           <option value="Canada" rel="">Canada</option>
                           <option value="Canary Islands" rel="">Canary Islands</option>
                           <option value="Cape Verde" rel="">Cape Verde</option>
                           <option value="Cayman Islands" rel="">Cayman Islands</option>
                           <option value="Central African Republic" rel="">Central African Republic</option>
                           <option value="Chad" rel="">Chad</option>
                           <option value="Channel Islands" rel="">Channel Islands</option>
                           <option value="Chile" rel="">Chile</option>
                           <option value="China" rel="">China</option>
                           <option value="Christmas Island" rel="">Christmas Island</option>
                           <option value="Cocos Island" rel="">Cocos Island</option>
                           <option value="Colombia" rel="">Colombia</option>
                           <option value="Comoros" rel="">Comoros</option>
                           <option value="Congo" rel="">Congo</option>
                           <option value="Cook Islands" rel="">Cook Islands</option>
                           <option value="Costa Rica" rel="">Costa Rica</option>
                           <option value="Cote DIvoire" rel="">Cote D'Ivoire</option>
                           <option value="Croatia" rel="">Croatia</option>
                           <option value="Cuba" rel="">Cuba</option>
                           <option value="Curaco" rel="">Curacao</option>
                           <option value="Cyprus" rel="">Cyprus</option>
                           <option value="Czech Republic" rel="">Czech Republic</option>
                           <option value="Denmark" rel="">Denmark</option>
                           <option value="Djibouti" rel="">Djibouti</option>
                           <option value="Dominica" rel="">Dominica</option>
                           <option value="Dominican Republic" rel="">Dominican Republic</option>
                           <option value="East Timor" rel="">East Timor</option>
                           <option value="Ecuador" rel="">Ecuador</option>
                           <option value="Egypt" rel="">Egypt</option>
                           <option value="El Salvador" rel="">El Salvador</option>
                           <option value="Equatorial Guinea" rel="">Equatorial Guinea</option>
                           <option value="Eritrea" rel="">Eritrea</option>
                           <option value="Estonia" rel="">Estonia</option>
                           <option value="Ethiopia" rel="">Ethiopia</option>
                           <option value="Falkland Islands" rel="">Falkland Islands</option>
                           <option value="Faroe Islands" rel="">Faroe Islands</option>
                           <option value="Fiji" rel="">Fiji</option>
                           <option value="Finland" rel="">Finland</option>
                           <option value="France" rel="">France</option>
                           <option value="French Guiana" rel="">French Guiana</option>
                           <option value="French Polynesia" rel="">French Polynesia</option>
                           <option value="French Southern Ter">French Southern Ter</option>
                           <option value="Gabon">Gabon</option>
                           <option value="Gambia">Gambia</option>
                           <option value="Georgia">Georgia</option>
                           <option value="Germany" rel="">Germany</option>
                           <option value="Ghana">Ghana</option>
                           <option value="Gibraltar">Gibraltar</option>
                           <option value="Great Britain">Great Britain</option>
                           <option value="Greece" rel="">Greece</option>
                           <option value="Greenland" rel="">Greenland</option>
                           <option value="Grenada">Grenada</option>
                           <option value="Guadeloupe">Guadeloupe</option>
                           <option value="Guam">Guam</option>
                           <option value="Guatemala">Guatemala</option>
                           <option value="Guinea">Guinea</option>
                           <option value="Guyana">Guyana</option>
                           <option value="Haiti">Haiti</option>
                           <option value="Hawaii">Hawaii</option>
                           <option value="Honduras">Honduras</option>
                           <option value="Hong Kong" rel="">Hong Kong</option>
                           <option value="Hungary">Hungary</option>
                           <option value="Iceland">Iceland</option>
                           <option value="India" rel="">India</option>
                           <option value="Indonesia" rel="">Indonesia</option>
                           <option value="Iran" rel="">Iran</option>
                           <option value="Iraq" rel="">Iraq</option>
                           <option value="Ireland" rel="">Ireland</option>
                           <option value="Isle of Man">Isle of Man</option>
                           <option value="Israel">Israel</option>
                           <option value="Italy" rel="">Italy</option>
                           <option value="Jamaica">Jamaica</option>
                           <option value="Japan" rel="">Japan</option>
                           <option value="Jordan">Jordan</option>
                           <option value="Kazakhstan">Kazakhstan</option>
                           <option value="Kenya" rel="">Kenya</option>
                           <option value="Kiribati">Kiribati</option>
                           <option value="Korea North" rel="">Korea North</option>
                           <option value="Korea Sout" rel="">Korea South</option>
                           <option value="Kuwait">Kuwait</option>
                           <option value="Kyrgyzstan">Kyrgyzstan</option>
                           <option value="Laos">Laos</option>
                           <option value="Latvia">Latvia</option>
                           <option value="Lebanon">Lebanon</option>
                           <option value="Lesotho">Lesotho</option>
                           <option value="Liberia">Liberia</option>
                           <option value="Libya">Libya</option>
                           <option value="Liechtenstein">Liechtenstein</option>
                           <option value="Lithuania">Lithuania</option>
                           <option value="Luxembourg">Luxembourg</option>
                           <option value="Macau">Macau</option>
                           <option value="Macedonia">Macedonia</option>
                           <option value="Madagascar">Madagascar</option>
                           <option value="Malaysia">Malaysia</option>
                           <option value="Malawi">Malawi</option>
                           <option value="Maldives">Maldives</option>
                           <option value="Mali">Mali</option>
                           <option value="Malta">Malta</option>
                           <option value="Marshall Islands">Marshall Islands</option>
                           <option value="Martinique">Martinique</option>
                           <option value="Mauritania">Mauritania</option>
                           <option value="Mauritius">Mauritius</option>
                           <option value="Mayotte">Mayotte</option>
                           <option value="Mexico">Mexico</option>
                           <option value="Midway Islands">Midway Islands</option>
                           <option value="Moldova">Moldova</option>
                           <option value="Monaco">Monaco</option>
                           <option value="Mongolia">Mongolia</option>
                           <option value="Montserrat">Montserrat</option>
                           <option value="Morocco">Morocco</option>
                           <option value="Mozambique">Mozambique</option>
                           <option value="Myanmar">Myanmar</option>
                           <option value="Nambia">Nambia</option>
                           <option value="Nauru">Nauru</option>
                           <option value="Nepal">Nepal</option>
                           <option value="Netherland Antilles">Netherland Antilles</option>
                           <option value="Netherlands">Netherlands (Holland, Europe)</option>
                           <option value="Nevis">Nevis</option>
                           <option value="New Caledonia">New Caledonia</option>
                           <option value="New Zealand">New Zealand</option>
                           <option value="Nicaragua">Nicaragua</option>
                           <option value="Niger">Niger</option>
                           <option value="Nigeria">Nigeria</option>
                           <option value="Niue">Niue</option>
                           <option value="Norfolk Island">Norfolk Island</option>
                           <option value="Norway">Norway</option>
                           <option value="Oman">Oman</option>
                           <option value="Pakistan">Pakistan</option>
                           <option value="Palau Island">Palau Island</option>
                           <option value="Palestine">Palestine</option>
                           <option value="Panama">Panama</option>
                           <option value="Papua New Guinea">Papua New Guinea</option>
                           <option value="Paraguay">Paraguay</option>
                           <option value="Peru">Peru</option>
                           <option value="Phillipines" rel="">Philippines</option>
                           <option value="Pitcairn Island">Pitcairn Island</option>
                           <option value="Poland">Poland</option>
                           <option value="Portugal">Portugal</option>
                           <option value="Puerto Rico">Puerto Rico</option>
                           <option value="Qatar" rel="">Qatar</option>
                           <option value="Republic of Montenegro">Republic of Montenegro</option>
                           <option value="Republic of Serbia" rel="">Republic of Serbia</option>
                           <option value="Reunion">Reunion</option>
                           <option value="Romania">Romania</option>
                           <option value="Russia" rel="">Russia</option>
                           <option value="Rwanda">Rwanda</option>
                           <option value="St Barthelemy">St Barthelemy</option>
                           <option value="St Eustatius">St Eustatius</option>
                           <option value="St Helena">St Helena</option>
                           <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                           <option value="St Lucia">St Lucia</option>
                           <option value="St Maarten">St Maarten</option>
                           <option value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>
                           <option value="St Vincent &amp; Grenadines">St Vincent &amp; Grenadines</option>
                           <option value="Saipan">Saipan</option>
                           <option value="Samoa">Samoa</option>
                           <option value="Samoa American">Samoa American</option>
                           <option value="San Marino">San Marino</option>
                           <option value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>
                           <option value="Saudi Arabia">Saudi Arabia</option>
                           <option value="Senegal">Senegal</option>
                           <option value="Serbia">Serbia</option>
                           <option value="Seychelles">Seychelles</option>
                           <option value="Sierra Leone">Sierra Leone</option>
                           <option value="Singapore" rel="">Singapore</option>
                           <option value="Slovakia">Slovakia</option>
                           <option value="Slovenia">Slovenia</option>
                           <option value="Solomon Islands">Solomon Islands</option>
                           <option value="Somalia">Somalia</option>
                           <option value="South Africa" rel="">South Africa</option>
                           <option value="Spain">Spain</option>
                           <option value="Sri Lanka" rel="">Sri Lanka</option>
                           <option value="Sudan">Sudan</option>
                           <option value="Suriname">Suriname</option>
                           <option value="Swaziland">Swaziland</option>
                           <option value="Sweden" rel="">Sweden</option>
                           <option value="Switzerland">Switzerland</option>
                           <option value="Syria">Syria</option>
                           <option value="Tahiti">Tahiti</option>
                           <option value="Taiwan">Taiwan</option>
                           <option value="Tajikistan">Tajikistan</option>
                           <option value="Tanzania">Tanzania</option>
                           <option value="Thailand" rel="">Thailand</option>
                           <option value="Togo">Togo</option>
                           <option value="Tokelau">Tokelau</option>
                           <option value="Tonga">Tonga</option>
                           <option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
                           <option value="Tunisia">Tunisia</option>
                           <option value="Turkey">Turkey</option>
                           <option value="Turkmenistan">Turkmenistan</option>
                           <option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>
                           <option value="Tuvalu">Tuvalu</option>
                           <option value="Uganda">Uganda</option>
                           <option value="Ukraine">Ukraine</option>
                           <option value="United Arab Erimates" rel="">United Arab Emirates</option>
                           <option value="United Kingdom" rel="">United Kingdom</option>
                           <option value="Uraguay">Uruguay</option>
                           <option value="Uzbekistan">Uzbekistan</option>
                           <option value="Vanuatu">Vanuatu</option>
                           <option value="Vatican City State" rel="">Vatican City State</option>
                           <option value="Venezuela">Venezuela</option>
                           <option value="Vietnam">Vietnam</option>
                           <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                           <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                           <option value="Wake Island">Wake Island</option>
                           <option value="Wallis &amp; Futana Is">Wallis &amp; Futana Is</option>
                           <option value="Yemen" rel="">Yemen</option>
                           <option value="Zaire">Zaire</option>
                           <option value="Zambia">Zambia</option>
                           <option value="Zimbabwe">Zimbabwe</option>
                        </select>
                     </div>
                  </div>

                  <div class="col-md-6">
                     <div class="row">
                        <div class="col-md-10">
                           <div class="form-group" style="text-align: left;">
                              <label><?php echo ('Payment Type') ?> <i class="text-danger">*</i></label>
                              <select  name="employee_type" id="emp_type" class="required form-control" required>
                                 <option value="">Select Employee Type</option>
                                 <option value="Full Time (W4)">Full Time (W4)</option>
                                 <option value="Contractor (W9)">Contractor (W9)</option>
                                 <option value="Part time">Part time</option>
                                 <?php foreach($emp_data as $emp_type){ ?>
                                 <option value="<?php  echo $emp_type['employee_type'] ;?>"><?php  echo $emp_type['employee_type'] ;?></option>
                                 <?php  } ?>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-2">
                           <a class="btnclr client-add-btn btn" aria-hidden="true" data-toggle="modal" data-target="#employees_type" style="margin-top: 25px;"><i class="fa fa-plus"></i></a>
                        </div>
                     </div>
                  </div>

                  <div class="col-md-6">
                     <div class="form-group" style="text-align: left;">
                        <label><?php echo ('Emergency Contact Person') ?> </label>
                        <input class="form-control" name="emergencycontact" id="emergencycontact" type="text"  style="border:2px solid #D7D4D6;"   placeholder="Emergency Contact person"  oninput="limitAlphabetical(this, 20)">
                     </div>
                  </div>

                  <div class="col-md-6">
                     <div class="form-group" style="text-align: left;">
                        <label><?php echo ('Emergency Contact number') ?> </label>
                        <input class="form-control" name="emergencycontactnum" id="emergencycontactnum" type="number" style="border:2px solid #D7D4D6;" placeholder="Emergency Contact  number"  oninput="exitnumbers(this, 10)">
                     </div>
                  </div>

                  <div class="col-md-6">
                     <div class="form-group" style="text-align: left;">
                        <label><?php echo ('Withholding Tax') ?> </label><br>
                        <button type="button" class="btnclr btn" id="showPopup">Add Withholding Tax</button>
                     </div>
                  </div>

                  <div class="col-md-6">
                     <div class="form-group" style="text-align: left;">
                        <label><?php echo ('Attachments') ?> </label><br>
                        <input type="file" name="files[]" class="form-control" id="employee_attachment" multiple/>
                       <!--  <p>
                           <label for="attachment">
                           <a class="btnclr btn   text-light" role="button" aria-disabled="false"><i class="fa fa-upload"></i>&nbsp; Choose Files</a>
                           </label>
                           <input type="file" name="files[]" class="upload" id="employee_attachment" style="visibility: hidden; position: absolute;" multiple/>
                        </p>
                        <p id="files-area-employee">
                           <span id="filesList">
                           <span id="files-names"></span>
                           </span>
                        </p> -->
                     </div>
                  </div>

                  <div class="col-md-6">
                     <div class="form-group" style="text-align: left;">
                        <label><?php echo ('Profile Image') ?> </label><br>
                        <input type="file" name="profile_image" class="form-control">
                     </div>
                  </div>

               </div>
               <!-- Tax popup Modal -->
               <div id="popup" class="btnclr popup">
                     <!-- Popup content -->
                     <div class="row">
                        <!-- Working Taxes -->
                        <div class="col-sm-6">
                           <h4 style="text-align:center;margin-left: 140px;">WORK LOCATION TAXES</h4>
                           <br>
                           <div class="form-group fg" >
                              <label for="stateTaxDropdown">State Tax<i class="text-danger">*</i></label>
                              <input list="magic_state_tax" name="state_tax" id="stateTaxDropdown" class="form-control">
                              <datalist id="magic_state_tax">
                                 <?php foreach ($state_tx as $st) { ?>
                                 <option value="<?php echo $st['state']; ?>"><?php echo $st['state']; ?></option>
                                 <?php } ?>
                                 <option value="Not Applicable">Not Applicable</option>
                              </datalist>
                           </div>
                           <div class="form-group fg">
                              <label for="localTaxDropdown">City Tax<i class="text-danger">*</i></label>
                              <input list="magic_local_tax" name="city_tax" id="localTaxDropdown" class="form-control">
                              <datalist id="magic_local_tax">
                                 <?php foreach ($get_info_city_tax as $gtct) { ?>
                                 <option value="<?php echo $gtct['state']; ?>"><?php echo $gtct['state']; ?></option>
                                 <?php } ?>
                                 <option value="Not Applicable">Not Applicable</option>
                              </datalist>
                           </div>
                           <div class="form-group fg">
                              <label for="stateLocalTaxDropdown">County Tax<i class="text-danger">*</i></label>
                              <input list="magic_state_local_tax" name="county_tax" id="stateLocalTaxDropdown" class="form-control">
                              <datalist id="magic_state_local_tax">
                                 <?php foreach ($get_info_county_tax as $gtcty) { ?>
                                 <option value="<?php echo $gtcty['state']; ?>"><?php echo $gtcty['state']; ?></option>
                                 <?php } ?>
                                 <option value="Not Applicable">Not Applicable</option>
                              </datalist>
                           </div>
                           <div class="form-group fg">
                              <label for="stateTax2Dropdown">Other Work Tax<i class="text-danger">*</i></label>
                              <input list="magic_state_tax_2" name="other_working_tax" id="stateTax2Dropdown" class="form-control">
                              <datalist id="magic_state_tax_2">
                                 <!--<?php //foreach ($state_tx as $st) { ?>-->
                                 <!--    <option value="<?php //echo $st['state']; ?>"><?php //echo $st['state']; ?></option>-->
                                 <!--<?php// } ?>-->
                                 <option value="Not Applicable">Not Applicable</option>
                              </datalist>
                           </div>
                        </div>
                        <!-- Living Taxes -->
                        <div class="col-sm-6">
                           <h4 style="text-align:center;margin-left:140px;">LIVING LOCATION TAXES</h4>
                           <br>
                           <div class="form-group fg">
                              <label for="livingStateTax">State Tax<i class="text-danger">*</i></label>
                              <input list="magic_living_state_tax" name="living_state_tax" id="livingStateTax" class="form-control">
                              <datalist id="magic_living_state_tax">
                                 <?php foreach ($state_tx as $st) { ?>
                                 <option value="<?php echo $st['state']; ?>"><?php echo $st['state']; ?></option>
                                 <?php } ?>
                                 <option value="Not Applicable">Not Applicable</option>
                              </datalist>
                           </div>
                           <div class="form-group fg">
                              <label for="livingCityTax">City Tax<i class="text-danger">*</i></label>
                              <input list="magic_living_city_tax" name="living_city_tax" id="livingCityTax" class="form-control">
                              <datalist id="magic_living_city_tax">
                                 <?php foreach ($get_info_city_tax as $gtct) { ?>
                                 <option value="<?php echo $gtct['state']; ?>"><?php echo $gtct['state']; ?></option>
                                 <?php } ?>
                                 <option value="Not Applicable">Not Applicable</option>
                              </datalist>
                           </div>
                           <div class="form-group fg">
                              <label for="livingCountyTax">County Tax<i class="text-danger">*</i></label>
                              <input list="magic_living_county_tax" name="living_county_tax" id="livingCountyTax" class="form-control">
                              <datalist id="magic_living_county_tax">
                                 <?php foreach ($get_info_county_tax as $gtcty) { ?>
                                 <option value="<?php echo $gtcty['state']; ?>"><?php echo $gtcty['state']; ?></option>
                                 <?php } ?>
                                 <option value="Not Applicable">Not Applicable</option>
                              </datalist>
                           </div>
                           <div class="form-group fg">
                              <label for="livingOtherTax">Other living Tax<i class="text-danger">*</i></label>
                              <input list="magic_living_other_tax" name="other_living_tax" id="livingOtherTax" class="form-control">
                              <datalist id="magic_living_other_tax">
                                 <!--<?php //foreach ($state_tx as $st) { ?>-->
                                 <!--    <option value="<?php //echo $st['state']; ?>"><?php //echo $st['state']; ?></option>-->
                                 <!--<?php //} ?>-->
                                 <option value="Not Applicable">Not Applicable</option>
                              </datalist>
                           </div>
                        </div>
                     </div>
                     <br>
                     <div style='float:right;font-weight:bold;'>
                        <!-- Button to add popup data -->
                        <button type="button"   style="background-color:green;margin-left: 335px;width:60px;"  class="btn btnclr"   id="addPopupData">Save</button>
                        <button type="button" class="btn btn-danger"   onclick="closeModal()">Close</button>
                     </div>
                     <br>
                     <br>
                  </div>
         </div>
         <div class="modal-footer">
         <a href="#" class="btn btnclr"  data-dismiss="modal"><?php echo display('Close') ?> </a>
         <input type="submit" class="btn btnclr" id="checkSubmit" value=<?php echo display('Submit') ?>>
         </div>
         </form>
      </div>
   </div>
</div>

<!-- Employee Create End -->



<!-- Sales Partner Start -->
<div class="modal fade salespartnerAddModalsdata" id="salesPartners" role="dialog">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content" style="text-align:center;">
         <div class="modal-header btnclr">
            <a href="#" class="close" data-dismiss="modal">&times;</a>
            <h4 class="modal-title"> <?php echo ('Add Sales Partner'); ?> </h4>
         </div>
         <div class="modal-body" style="max-height: 600px; overflow-y: auto;">
            <div id="customeMessage" class="alert hide"></div>
            <form id="add_salesPartners" method="post">
               <div class="panel-body">
                  <input type ="hidden" name="csrf_test_name" id="" value="<?php echo $this->security->get_csrf_hash();?>">
                  <div class="col-md-6">
                     <div class="form-group" style="text-align: left;">
                        <label><?php echo ('First Name') ?> <i class="text-danger">*</i></label>
                        <input name="first_name" class="form-control" type="text" placeholder="<?php echo display('first_name') ?>" required oninput="this.value = this.value.replace(/[^A-Za-z]/g, '')">
                     </div>
                  </div>

                  <div class="col-md-6">
                     <div class="form-group" style="text-align: left;">
                        <label><?php echo  ('Sales Commission') ?> <i class="text-danger">*</i></label>
                        <input name="sc" class="form-control" type="text" placeholder="<?php echo 'sales commission percentage' ?>">
                     </div>
                  </div>

                  <div class="col-md-6">
                     <div class="form-group" style="text-align: left;">
                        <label><?php echo ('Middle Name') ?></label>
                        <input name="middle_name" class="form-control" type="text" placeholder="<?php echo "Middle Name"; ?>" oninput="this.value = this.value.replace(/[^A-Za-z]/g, '')">
                     </div>
                  </div>

                  <div class="col-md-6">
                     <div class="form-group" style="text-align: left;">
                        <label><?php echo ('Social security number') ?> <i class="text-danger">*</i></label>
                        <input name="ssn" class="form-control" type="text" placeholder="Social security number" required oninput="exitsocialsecurity(this, 9)">
                     </div>
                     <span style="position: absolute; top: 68px; left: 364px; font-weight: bold;">(OR)</span>
                  </div>

                  <div class="col-md-6">
                     <div class="form-group" style="text-align: left;">
                        <label><?php echo ('Last Name') ?> <i class="text-danger">*</i></label>
                        <input name="last_name" class="form-control" type="text" placeholder="<?php echo display('last_name') ?>" required oninput="this.value = this.value.replace(/[^A-Za-z]/g, '')">
                     </div>
                  </div>

                  <div class="col-md-6">
                     <div class="form-group" style="text-align: left;">
                        <label><?php echo ('Federal Identification Number') ?><i class="text-danger">*</i></label>
                        <input name="federalidentificationnumber" class="form-control" type="text" placeholder="Federal Identification Number" oninput="exitsocialsecurity(this, 9)">
                     </div>
                  </div>

                  <div class="col-md-6">
                     <div class="form-group" style="text-align: left;">
                        <label>Business Name<i class="text-danger">*</i></label>
                        <input name="salesbusiness_name" class="form-control" type="text" placeholder="<?php echo "Business Name" ?>" id="salesbusiness_name" oninput="this.value = this.value.replace(/[^A-Za-z]/g, '')">
                     </div>
                  </div>

                  <div class="col-md-6">
                     <div class="form-group" style="text-align: left;">
                        <label><?php echo ('Federal Tax Classification') ?> <i class="text-danger">*</i></label>
                        <select name="federaltaxclassification" id="federaltaxclassification" class="form-control" style="width: 100%;" required>
                           <option value="">Select Federal Tax Classification</option>
                           <option value="Individual/sole proprietor">Individual/sole proprietor</option>
                           <option value="C corporation">C corporation</option>
                           <option value="S corporation">S corporation</option>
                           <option value="Partnership">Partnership</option>
                           <option value="Trust/estate">Trust/estate</option>
                        </select>
                     </div>
                  </div>

                  <div class="col-md-6">
                     <div class="form-group" style="text-align: left;">
                        <label><?php echo ('Phone') ?> <i class="text-danger">*</i></label>
                        <input name="phone" class="form-control" type="number" placeholder="<?php echo display('phone') ?>" id="phone" required>
                     </div>
                  </div>

                   <div class="col-md-6">
                     <div class="row">
                        <div class="col-md-10">
                           <div class="form-group" style="text-align: left;">
                              <label><?php echo ('Payment Type') ?> <i class="text-danger">*</i></label>
                              <select name="paytype"  id="paytype" class="form-control" style="width: 100%;" >
                                 <option value="">Select Type</option>
                                 <option value="Cheque">Cheque</option>
                                 <option value="Direct Deposit">Direct Deposit</option>
                                 <option value="Cash">Cash</option>
                                 <?php  foreach($paytype as $ptype){ ?>
                                 <option value="<?php  echo $ptype['payment_type'] ;?>"><?php  echo $ptype['payment_type'] ;?></option>
                                 <?php  } ?>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-2">
                           <a class="btnclr client-add-btn btn" aria-hidden="true" data-toggle="modal" data-target="#payment_type" style="margin-top: 25px;"><i class="fa fa-plus"></i></a>
                        </div>
                     </div>
                  </div>

                  <div class="col-md-6">
                     <div class="form-group" style="text-align: left;">
                        <label><?php echo ('Email') ?> <i class="text-danger">*</i> &nbsp; <span id="validateemails"></span></label>
                         <input name="email" class="form-control" type="email" placeholder="<?php echo display('email') ?>" id="email" oninput="validateEmail(this)">
                     </div>
                  </div>

                  <div class="col-md-6">
                      <div class="row">
                        <div class="col-md-10">
                           <div class="form-group" style="text-align: left;">
                              <label><?php echo ('Bank') ?></label>
                               <select name="bank_name" id="bank_name"  class="form-control bankpayment">
                                 <option>Select Bank</option>
                                 <option value="NA">NA (Not Applicable)</option>
                                 <option value="JPMorgan Chase">JPMorgan Chase</option>
                                 <option value="New York City">New York City</option>
                                 <option value="Bank of America">Bank of America</option>
                                 <option value="Citigroup">Citigroup</option>
                                 <option value="Wells Fargo">Wells Fargo</option>
                                 <option value="Goldman Sachs">Goldman Sachs</option>
                                 <option value="Morgan Stanley">Morgan Stanley</option>
                                 <option value="U.S. Bancorp">U.S. Bancorp</option>
                                 <option value="PNC Financial Services">PNC Financial Services</option>
                                 <option value="Truist Financial">Truist Financial</option>
                                 <option value="Charles Schwab Corporation">Charles Schwab Corporation</option>
                                 <option value="TD Bank, N.A.">TD Bank, N.A.</option>
                                 <option value="Capital One">Capital One</option>
                                 <option value="The Bank of New York Mellon">The Bank of New York Mellon</option>
                                 <option value="State Street Corporation">State Street Corporation</option>
                                 <option value="American Express">American Express</option>
                                 <option value="Citizens Financial Group">Citizens Financial Group</option>
                                 <option value="HSBC Bank USA">HSBC Bank USA</option>
                                 <option value="SVB Financial Group">SVB Financial Group</option>
                                 <option value="First Republic Bank ">First Republic Bank </option>
                                 <option value="Fifth Third Bank">Fifth Third Bank</option>
                                 <option value="BMO USA">BMO USA</option>
                                 <option value="USAA">USAA</option>
                                 <option value="UBS">UBS</option>
                                 <option value="M&T Bank">M&T Bank</option>
                                 <option value="Ally Financial">Ally Financial</option>
                                 <option value="KeyCorp">KeyCorp</option>
                                 <option value="Huntington Bancshares">Huntington Bancshares</option>
                                 <option value="Barclays">Barclays</option>
                                 <option value="Santander Bank">Santander Bank</option>
                                 <option value="RBC Bank">RBC Bank</option>
                                 <option value="Ameriprise">Ameriprise</option>
                                 <option value="Regions Financial Corporation">Regions Financial Corporation</option>
                                 <option value="Northern Trust">Northern Trust</option>
                                 <option value="BNP Paribas">BNP Paribas</option>
                                 <option value="Discover Financial">Discover Financial</option>
                                 <option value="First Citizens BancShares">First Citizens BancShares</option>
                                 <option value="Synchrony Financial">Synchrony Financial</option>
                                 <option value="Deutsche Bank">Deutsche Bank</option>
                                 <option value="New York Community Bank">New York Community Bank</option>
                                 <option value="Comerica">Comerica</option>
                                 <option value="First Horizon National Corporation">First Horizon National Corporation</option>
                                 <option value="Raymond James Financial">Raymond James Financial</option>
                                 <option value="Webster Bank">Webster Bank</option>
                                 <option value="Western Alliance Bank">Western Alliance Bank</option>
                                 <option value="Popular, Inc.">Popular, Inc.</option>
                                 <option value="CIBC Bank USA">CIBC Bank USA</option>
                                 <option value="East West Bank">East West Bank</option>
                                 <option value="Synovus">Synovus</option>
                                 <option value="Valley National Bank">Valley National Bank</option>
                                 <option value="Credit Suisse ">Credit Suisse </option>
                                 <option value="Mizuho Financial Group">Mizuho Financial Group</option>
                                 <option value="Wintrust Financial">Wintrust Financial</option>
                                 <option value="Cullen/Frost Bankers, Inc.">Cullen/Frost Bankers, Inc.</option>
                                 <option value="John Deere Capital Corporation">John Deere Capital Corporation</option>
                                 <option value="MUFG Union Bank">MUFG Union Bank</option>
                                 <option value="BOK Financial Corporation">BOK Financial Corporation</option>
                                 <option value="Old National Bank">Old National Bank</option>
                                 <option value="South State Bank">South State Bank</option>
                                 <option value="FNB Corporation">FNB Corporation</option>
                                 <option value="Pinnacle Financial Partners">Pinnacle Financial Partners</option>
                                 <option value="PacWest Bancorp">PacWest Bancorp</option>
                                 <option value="TIAA">TIAA</option>
                                 <option value="Associated Banc-Corp">Associated Banc-Corp</option>
                                 <option value="UMB Financial Corporation">UMB Financial Corporation</option>
                                 <option value="Prosperity Bancshares">Prosperity Bancshares</option>
                                 <option value="Stifel">Stifel</option>
                                 <option value="BankUnited">BankUnited</option>
                                 <option value="Hancock Whitney">Hancock Whitney</option>
                                 <option value="MidFirst Bank">MidFirst Bank</option>
                                 <option value="Sumitomo Mitsui Banking Corporation">Sumitomo Mitsui Banking Corporation</option>
                                 <option value="Beal Bank">Beal Bank</option>
                                 <option value="First Interstate BancSystem">First Interstate BancSystem</option>
                                 <option value="Commerce Bancshares">Commerce Bancshares</option>
                                 <option value="Umpqua Holdings Corporation">Umpqua Holdings Corporation</option>
                                 <option value="United Bank (West Virginia)">United Bank (West Virginia)</option>
                                 <option value="Texas Capital Bank">Texas Capital Bank</option>
                                 <option value="First National of Nebraska">First National of Nebraska</option>
                                 <option value="FirstBank Holding Co">FirstBank Holding Co</option>
                                 <option value="Simmons Bank">Simmons Bank</option>
                                 <option value="Fulton Financial Corporation">Fulton Financial Corporation</option>
                                 <option value="Glacier Bancorp">Glacier Bancorp</option>
                                 <option value="Arvest Bank">Arvest Bank</option>
                                 <option value="BCI Financial Group">BCI Financial Group</option>
                                 <option value="Ameris Bancorp">Ameris Bancorp</option>
                                 <option value="First Hawaiian Bank">First Hawaiian Bank</option>
                                 <option value="United Community Bank">United Community Bank</option>
                                 <option value="Bank of Hawaii">Bank of Hawaii</option>
                                 <option value="Home BancShares">Home BancShares</option>
                                 <option value="Eastern Bank">Eastern Bank</option>
                                 <option value="Cathay Bank">Cathay Bank</option>
                                 <option value="Pacific Premier Bancorp">Pacific Premier Bancorp</option>
                                 <option value="Washington Federal">Washington Federal</option>
                                 <option value="Customers Bancorp">Customers Bancorp</option>
                                 <option value="Atlantic Union Bank">Atlantic Union Bank</option>
                                 <option value="Columbia Bank">Columbia Bank</option>
                                 <option value="Heartland Financial USA">Heartland Financial USA</option>
                                 <option value="WSFS Bank">WSFS Bank</option>
                                 <option value="Central Bancompany">Central Bancompany</option>
                                 <option value="Independent Bank">Independent Bank</option>
                                 <option value="Hope Bancorp">Hope Bancorp</option>
                                 <option value="SoFi">SoFi</option>
                                 <?php foreach($bank_data as $bank){  ?>
                                 <option value="<?php  echo $bank['bank_name'] ;?>"><?php  echo $bank['bank_name'] ;?></option>
                                 <?php  } ?>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-2">
                           <a class="btnclr client-add-btn btn" aria-hidden="true" data-toggle="modal" data-target="#payment_type" style="margin-top: 25px;"><i class="fa fa-plus"></i></a>
                        </div>
                     </div>
                  </div>

                  <div class="col-md-6">
                     <div class="form-group" style="text-align: left;">
                        <label><?php echo ('Address Line 1') ?></label>
                        <textarea name="address_line_1" rows='1' class="form-control" placeholder="<?php echo display('address_line_1') ?>" id="address_line_1"></textarea> 
                     </div>
                  </div>

                  <div class="col-md-6">
                     <div class="form-group" style="text-align: left;">
                        <label><?php echo ('Routing number') ?> </label>
                        <input name="routing_number" class="form-control" type="text" placeholder="Routing number" oninput="routingrestrict(this, 15)">
                     </div>
                  </div>

                  <div class="col-md-6">
                     <div class="form-group" style="text-align: left;">
                        <label><?php echo ('Address Line 2') ?> </label>
                        <textarea name="address_line_2" rows='1' class="form-control" placeholder="<?php echo display('address_line_2') ?>" id="address_line_2"></textarea> 
                     </div>
                  </div>

                  <div class="col-md-6">
                     <div class="form-group" style="text-align: left;">
                        <label><?php echo ('Account Number') ?> </label>
                        <input type="text" name="account_number" class="form-control" placeholder="Account Number" oninput="routingrestrict(this, 15)">
                     </div>
                  </div>

                  <div class="col-md-6">
                     <div class="form-group" style="text-align: left;">
                        <label><?php echo ('City') ?> </label>
                        <input name="city" class="form-control" type="text" placeholder="<?php echo display('city') ?>" id="city" oninput="this.value = this.value.replace(/[^A-Za-z ]/g, '')">
                     </div>
                  </div>

                  <div class="col-md-6">
                     <div class="form-group" style="text-align: left;">
                        <label><?php echo ('Employee Tax') ?> <i class="text-danger">*</i></label>
                        <select  name="emp_tax_detail" id="emp_tax_detail" class="form-control" required>
                           <option value="">Select Tax</option>
                           <option value="single">Single</option>
                           <option value="tax_filling">Tax Filling</option>
                           <option value="married">Married</option>
                           <option value="head_household">Head Household</option>
                        </select>
                     </div>
                  </div>

                  <div class="col-md-6">
                     <div class="form-group" style="text-align: left;">
                        <label><?php echo ('State') ?> </label>
                        <input class="form-control" name="state" id="state" type="text" style="border:2px solid #D7D4D6;"    placeholder="<?php echo display('state') ?>"  oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '')">
                     </div>
                  </div>
                  
                  <div class="col-md-6">
                     <div class="form-group" style="text-align: left;">
                        <label><?php echo ('Zip code') ?> </label>
                        <input name="zip" class="form-control" type="text" placeholder="<?php echo display('zip') ?>" id="zip" oninput="exitnumbers(this, 10)">
                     </div>
                  </div>

                  <div class="col-md-6">
                     <div class="form-group" style="text-align: left;">
                        <label><?php echo ('Country') ?> </label>
                        <select name="country" class="form-control">
                           <option value="United States of America" rel="">United States of America</option>
                           <option value="Afganistan" rel="">Afghanistan</option>
                           <option value="Albania" rel="">Albania</option>
                           <option value="Algeria" rel="">Algeria</option>
                           <option value="American Samoa" rel="">American Samoa</option>
                           <option value="Andorra" rel="">Andorra</option>
                           <option value="Angola" rel="">Angola</option>
                           <option value="Anguilla" rel="">Anguilla</option>
                           <option value="Antigua &amp; Barbuda" rel="">Antigua &amp; Barbuda</option>
                           <option value="Argentina" rel="">Argentina</option>
                           <option value="Armenia" rel="">Armenia</option>
                           <option value="Aruba" rel="">Aruba</option>
                           <option value="Australia" rel="">Australia</option>
                           <option value="Austria" rel="">Austria</option>
                           <option value="Azerbaijan" rel="">Azerbaijan</option>
                           <option value="Bahamas" rel="">Bahamas</option>
                           <option value="Bahrain" rel="">Bahrain</option>
                           <option value="Bangladesh" rel="">Bangladesh</option>
                           <option value="Barbados" rel="">Barbados</option>
                           <option value="Belarus" rel="">Belarus</option>
                           <option value="Belgium" rel="">Belgium</option>
                           <option value="Belize" rel="">Belize</option>
                           <option value="Benin" rel="">Benin</option>
                           <option value="Bermuda" rel="">Bermuda</option>
                           <option value="Bhutan" rel="">Bhutan</option>
                           <option value="Bolivia" rel="">Bolivia</option>
                           <option value="Bonaire" rel="">Bonaire</option>
                           <option value="Bosnia &amp; Herzegovina" rel="">Bosnia &amp; Herzegovina</option>
                           <option value="Botswana" rel="">Botswana</option>
                           <option value="Brazil" rel="">Brazil</option>
                           <option value="British Indian Ocean Ter" rel="">British Indian Ocean Ter</option>
                           <option value="Brunei" rel="">Brunei</option>
                           <option value="Bulgaria" rel="">Bulgaria</option>
                           <option value="Burkina Faso" rel="">Burkina Faso</option>
                           <option value="Burundi" rel="">Burundi</option>
                           <option value="Cambodia" rel="">Cambodia</option>
                           <option value="Cameroon" rel="">Cameroon</option>
                           <option value="Canada" rel="">Canada</option>
                           <option value="Canary Islands" rel="">Canary Islands</option>
                           <option value="Cape Verde" rel="">Cape Verde</option>
                           <option value="Cayman Islands" rel="">Cayman Islands</option>
                           <option value="Central African Republic" rel="">Central African Republic</option>
                           <option value="Chad" rel="">Chad</option>
                           <option value="Channel Islands" rel="">Channel Islands</option>
                           <option value="Chile" rel="">Chile</option>
                           <option value="China" rel="">China</option>
                           <option value="Christmas Island" rel="">Christmas Island</option>
                           <option value="Cocos Island" rel="">Cocos Island</option>
                           <option value="Colombia" rel="">Colombia</option>
                           <option value="Comoros" rel="">Comoros</option>
                           <option value="Congo" rel="">Congo</option>
                           <option value="Cook Islands" rel="">Cook Islands</option>
                           <option value="Costa Rica" rel="">Costa Rica</option>
                           <option value="Cote DIvoire" rel="">Cote D'Ivoire</option>
                           <option value="Croatia" rel="">Croatia</option>
                           <option value="Cuba" rel="">Cuba</option>
                           <option value="Curaco" rel="">Curacao</option>
                           <option value="Cyprus" rel="">Cyprus</option>
                           <option value="Czech Republic" rel="">Czech Republic</option>
                           <option value="Denmark" rel="">Denmark</option>
                           <option value="Djibouti" rel="">Djibouti</option>
                           <option value="Dominica" rel="">Dominica</option>
                           <option value="Dominican Republic" rel="">Dominican Republic</option>
                           <option value="East Timor" rel="">East Timor</option>
                           <option value="Ecuador" rel="">Ecuador</option>
                           <option value="Egypt" rel="">Egypt</option>
                           <option value="El Salvador" rel="">El Salvador</option>
                           <option value="Equatorial Guinea" rel="">Equatorial Guinea</option>
                           <option value="Eritrea" rel="">Eritrea</option>
                           <option value="Estonia" rel="">Estonia</option>
                           <option value="Ethiopia" rel="">Ethiopia</option>
                           <option value="Falkland Islands" rel="">Falkland Islands</option>
                           <option value="Faroe Islands" rel="">Faroe Islands</option>
                           <option value="Fiji" rel="">Fiji</option>
                           <option value="Finland" rel="">Finland</option>
                           <option value="France" rel="">France</option>
                           <option value="French Guiana" rel="">French Guiana</option>
                           <option value="French Polynesia" rel="">French Polynesia</option>
                           <option value="French Southern Ter">French Southern Ter</option>
                           <option value="Gabon">Gabon</option>
                           <option value="Gambia">Gambia</option>
                           <option value="Georgia">Georgia</option>
                           <option value="Germany" rel="">Germany</option>
                           <option value="Ghana">Ghana</option>
                           <option value="Gibraltar">Gibraltar</option>
                           <option value="Great Britain">Great Britain</option>
                           <option value="Greece" rel="">Greece</option>
                           <option value="Greenland" rel="">Greenland</option>
                           <option value="Grenada">Grenada</option>
                           <option value="Guadeloupe">Guadeloupe</option>
                           <option value="Guam">Guam</option>
                           <option value="Guatemala">Guatemala</option>
                           <option value="Guinea">Guinea</option>
                           <option value="Guyana">Guyana</option>
                           <option value="Haiti">Haiti</option>
                           <option value="Hawaii">Hawaii</option>
                           <option value="Honduras">Honduras</option>
                           <option value="Hong Kong" rel="">Hong Kong</option>
                           <option value="Hungary">Hungary</option>
                           <option value="Iceland">Iceland</option>
                           <option value="India" rel="">India</option>
                           <option value="Indonesia" rel="">Indonesia</option>
                           <option value="Iran" rel="">Iran</option>
                           <option value="Iraq" rel="">Iraq</option>
                           <option value="Ireland" rel="">Ireland</option>
                           <option value="Isle of Man">Isle of Man</option>
                           <option value="Israel">Israel</option>
                           <option value="Italy" rel="">Italy</option>
                           <option value="Jamaica">Jamaica</option>
                           <option value="Japan" rel="">Japan</option>
                           <option value="Jordan">Jordan</option>
                           <option value="Kazakhstan">Kazakhstan</option>
                           <option value="Kenya" rel="">Kenya</option>
                           <option value="Kiribati">Kiribati</option>
                           <option value="Korea North" rel="">Korea North</option>
                           <option value="Korea Sout" rel="">Korea South</option>
                           <option value="Kuwait">Kuwait</option>
                           <option value="Kyrgyzstan">Kyrgyzstan</option>
                           <option value="Laos">Laos</option>
                           <option value="Latvia">Latvia</option>
                           <option value="Lebanon">Lebanon</option>
                           <option value="Lesotho">Lesotho</option>
                           <option value="Liberia">Liberia</option>
                           <option value="Libya">Libya</option>
                           <option value="Liechtenstein">Liechtenstein</option>
                           <option value="Lithuania">Lithuania</option>
                           <option value="Luxembourg">Luxembourg</option>
                           <option value="Macau">Macau</option>
                           <option value="Macedonia">Macedonia</option>
                           <option value="Madagascar">Madagascar</option>
                           <option value="Malaysia">Malaysia</option>
                           <option value="Malawi">Malawi</option>
                           <option value="Maldives">Maldives</option>
                           <option value="Mali">Mali</option>
                           <option value="Malta">Malta</option>
                           <option value="Marshall Islands">Marshall Islands</option>
                           <option value="Martinique">Martinique</option>
                           <option value="Mauritania">Mauritania</option>
                           <option value="Mauritius">Mauritius</option>
                           <option value="Mayotte">Mayotte</option>
                           <option value="Mexico">Mexico</option>
                           <option value="Midway Islands">Midway Islands</option>
                           <option value="Moldova">Moldova</option>
                           <option value="Monaco">Monaco</option>
                           <option value="Mongolia">Mongolia</option>
                           <option value="Montserrat">Montserrat</option>
                           <option value="Morocco">Morocco</option>
                           <option value="Mozambique">Mozambique</option>
                           <option value="Myanmar">Myanmar</option>
                           <option value="Nambia">Nambia</option>
                           <option value="Nauru">Nauru</option>
                           <option value="Nepal">Nepal</option>
                           <option value="Netherland Antilles">Netherland Antilles</option>
                           <option value="Netherlands">Netherlands (Holland, Europe)</option>
                           <option value="Nevis">Nevis</option>
                           <option value="New Caledonia">New Caledonia</option>
                           <option value="New Zealand">New Zealand</option>
                           <option value="Nicaragua">Nicaragua</option>
                           <option value="Niger">Niger</option>
                           <option value="Nigeria">Nigeria</option>
                           <option value="Niue">Niue</option>
                           <option value="Norfolk Island">Norfolk Island</option>
                           <option value="Norway">Norway</option>
                           <option value="Oman">Oman</option>
                           <option value="Pakistan">Pakistan</option>
                           <option value="Palau Island">Palau Island</option>
                           <option value="Palestine">Palestine</option>
                           <option value="Panama">Panama</option>
                           <option value="Papua New Guinea">Papua New Guinea</option>
                           <option value="Paraguay">Paraguay</option>
                           <option value="Peru">Peru</option>
                           <option value="Phillipines" rel="">Philippines</option>
                           <option value="Pitcairn Island">Pitcairn Island</option>
                           <option value="Poland">Poland</option>
                           <option value="Portugal">Portugal</option>
                           <option value="Puerto Rico">Puerto Rico</option>
                           <option value="Qatar" rel="">Qatar</option>
                           <option value="Republic of Montenegro">Republic of Montenegro</option>
                           <option value="Republic of Serbia" rel="">Republic of Serbia</option>
                           <option value="Reunion">Reunion</option>
                           <option value="Romania">Romania</option>
                           <option value="Russia" rel="">Russia</option>
                           <option value="Rwanda">Rwanda</option>
                           <option value="St Barthelemy">St Barthelemy</option>
                           <option value="St Eustatius">St Eustatius</option>
                           <option value="St Helena">St Helena</option>
                           <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                           <option value="St Lucia">St Lucia</option>
                           <option value="St Maarten">St Maarten</option>
                           <option value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>
                           <option value="St Vincent &amp; Grenadines">St Vincent &amp; Grenadines</option>
                           <option value="Saipan">Saipan</option>
                           <option value="Samoa">Samoa</option>
                           <option value="Samoa American">Samoa American</option>
                           <option value="San Marino">San Marino</option>
                           <option value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>
                           <option value="Saudi Arabia">Saudi Arabia</option>
                           <option value="Senegal">Senegal</option>
                           <option value="Serbia">Serbia</option>
                           <option value="Seychelles">Seychelles</option>
                           <option value="Sierra Leone">Sierra Leone</option>
                           <option value="Singapore" rel="">Singapore</option>
                           <option value="Slovakia">Slovakia</option>
                           <option value="Slovenia">Slovenia</option>
                           <option value="Solomon Islands">Solomon Islands</option>
                           <option value="Somalia">Somalia</option>
                           <option value="South Africa" rel="">South Africa</option>
                           <option value="Spain">Spain</option>
                           <option value="Sri Lanka" rel="">Sri Lanka</option>
                           <option value="Sudan">Sudan</option>
                           <option value="Suriname">Suriname</option>
                           <option value="Swaziland">Swaziland</option>
                           <option value="Sweden" rel="">Sweden</option>
                           <option value="Switzerland">Switzerland</option>
                           <option value="Syria">Syria</option>
                           <option value="Tahiti">Tahiti</option>
                           <option value="Taiwan">Taiwan</option>
                           <option value="Tajikistan">Tajikistan</option>
                           <option value="Tanzania">Tanzania</option>
                           <option value="Thailand" rel="">Thailand</option>
                           <option value="Togo">Togo</option>
                           <option value="Tokelau">Tokelau</option>
                           <option value="Tonga">Tonga</option>
                           <option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
                           <option value="Tunisia">Tunisia</option>
                           <option value="Turkey">Turkey</option>
                           <option value="Turkmenistan">Turkmenistan</option>
                           <option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>
                           <option value="Tuvalu">Tuvalu</option>
                           <option value="Uganda">Uganda</option>
                           <option value="Ukraine">Ukraine</option>
                           <option value="United Arab Erimates" rel="">United Arab Emirates</option>
                           <option value="United Kingdom" rel="">United Kingdom</option>
                           <option value="Uraguay">Uruguay</option>
                           <option value="Uzbekistan">Uzbekistan</option>
                           <option value="Vanuatu">Vanuatu</option>
                           <option value="Vatican City State" rel="">Vatican City State</option>
                           <option value="Venezuela">Venezuela</option>
                           <option value="Vietnam">Vietnam</option>
                           <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                           <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                           <option value="Wake Island">Wake Island</option>
                           <option value="Wallis &amp; Futana Is">Wallis &amp; Futana Is</option>
                           <option value="Yemen" rel="">Yemen</option>
                           <option value="Zaire">Zaire</option>
                           <option value="Zambia">Zambia</option>
                           <option value="Zimbabwe">Zimbabwe</option>
                        </select>
                     </div>
                  </div>

                  <div class="col-md-6">
                     <div class="row">
                        <div class="col-md-10">
                           <div class="form-group" style="text-align: left;">
                              <label><?php echo ('Payment Type') ?> <i class="text-danger">*</i></label>
                              <select  name="employee_type" id="emp_type" class="required form-control" required>
                                 <option value="">Select Employee Type</option>
                                 <option value="Full Time (W4)">Full Time (W4)</option>
                                 <option value="Contractor (W9)">Contractor (W9)</option>
                                 <option value="Part time">Part time</option>
                                 <?php foreach($emp_data as $emp_type){ ?>
                                 <option value="<?php  echo $emp_type['employee_type'] ;?>"><?php  echo $emp_type['employee_type'] ;?></option>
                                 <?php  } ?>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-2">
                           <a class="btnclr client-add-btn btn" aria-hidden="true" data-toggle="modal" data-target="#employees_type" style="margin-top: 25px;"><i class="fa fa-plus"></i></a>
                        </div>
                     </div>
                  </div>

                  <div class="col-md-6">
                     <div class="form-group" style="text-align: left;">
                        <label><?php echo ('Emergency Contact Person') ?> </label>
                        <input class="form-control" name="emergencycontact" id="emergencycontact" type="text"  style="border:2px solid #D7D4D6;"   placeholder="Emergency Contact person"  oninput="limitAlphabetical(this, 20)">
                     </div>
                  </div>

                  <div class="col-md-6">
                     <div class="form-group" style="text-align: left;">
                        <label><?php echo ('Emergency Contact number') ?> </label>
                        <input class="form-control" name="emergencycontactnum" id="emergencycontactnum" type="number" style="border:2px solid #D7D4D6;" placeholder="Emergency Contact  number"  oninput="exitnumbers(this, 10)">
                     </div>
                  </div>

                  <div class="col-md-6">
                     <div class="form-group" style="text-align: left;">
                        <label><?php echo ('Withholding Tax') ?> </label><br>
                        <button type="button" class="btnclr btn" id="showPopupsalespartner">Add Withholding Tax</button>
                     </div>
                  </div>

                  <div class="col-md-6">
                     <div class="form-group" style="text-align: left;">
                        <label><?php echo ('Attachments') ?> </label><br>
                        <input type="file" name="files[]" class="form-control" id="salesPartner_attachment" multiple/>
                     </div>
                  </div>

                  <div class="col-md-6">
                     <div class="form-group" style="text-align: left;">
                        <label><?php echo ('Profile Image') ?> </label><br>
                        <input type="file" name="profile_image" class="form-control">
                     </div>
                  </div>

               </div>
               <!-- Tax popup Modal -->
               <div id="popupsalespartner" class="btnclr popupsalespartner">
                     <!-- Popup content -->
                     <div class="row">
                        <!-- Working Taxes -->
                        <div class="col-sm-6">
                           <h4 style="text-align:center;margin-left: 140px;">WORK LOCATION TAXES</h4>
                           <br>
                           <div class="form-group fg" >
                              <label for="stateTaxDropdown">State Tax<i class="text-danger">*</i></label>
                              <input list="magic_state_tax" name="state_tax" id="stateTaxDropdown" class="form-control">
                              <datalist id="magic_state_tax">
                                 <?php foreach ($state_tx as $st) { ?>
                                 <option value="<?php echo $st['state']; ?>"><?php echo $st['state']; ?></option>
                                 <?php } ?>
                                 <option value="Not Applicable">Not Applicable</option>
                              </datalist>
                           </div>
                           <div class="form-group fg">
                              <label for="localTaxDropdown">City Tax<i class="text-danger">*</i></label>
                              <input list="magic_local_tax" name="city_tax" id="localTaxDropdown" class="form-control">
                              <datalist id="magic_local_tax">
                                 <?php foreach ($get_info_city_tax as $gtct) { ?>
                                 <option value="<?php echo $gtct['state']; ?>"><?php echo $gtct['state']; ?></option>
                                 <?php } ?>
                                 <option value="Not Applicable">Not Applicable</option>
                              </datalist>
                           </div>
                           <div class="form-group fg">
                              <label for="stateLocalTaxDropdown">County Tax<i class="text-danger">*</i></label>
                              <input list="magic_state_local_tax" name="county_tax" id="stateLocalTaxDropdown" class="form-control">
                              <datalist id="magic_state_local_tax">
                                 <?php foreach ($get_info_county_tax as $gtcty) { ?>
                                 <option value="<?php echo $gtcty['state']; ?>"><?php echo $gtcty['state']; ?></option>
                                 <?php } ?>
                                 <option value="Not Applicable">Not Applicable</option>
                              </datalist>
                           </div>
                           <div class="form-group fg">
                              <label for="stateTax2Dropdown">Other Work Tax<i class="text-danger">*</i></label>
                              <input list="magic_state_tax_2" name="other_working_tax" id="stateTax2Dropdown" class="form-control">
                              <datalist id="magic_state_tax_2">
                                 <!--<?php //foreach ($state_tx as $st) { ?>-->
                                 <!--    <option value="<?php //echo $st['state']; ?>"><?php //echo $st['state']; ?></option>-->
                                 <!--<?php// } ?>-->
                                 <option value="Not Applicable">Not Applicable</option>
                              </datalist>
                           </div>
                        </div>
                        <!-- Living Taxes -->
                        <div class="col-sm-6">
                           <h4 style="text-align:center;margin-left:140px;">LIVING LOCATION TAXES</h4>
                           <br>
                           <div class="form-group fg">
                              <label for="livingStateTax">State Tax<i class="text-danger">*</i></label>
                              <input list="magic_living_state_tax" name="living_state_tax" id="livingStateTax" class="form-control">
                              <datalist id="magic_living_state_tax">
                                 <?php foreach ($state_tx as $st) { ?>
                                 <option value="<?php echo $st['state']; ?>"><?php echo $st['state']; ?></option>
                                 <?php } ?>
                                 <option value="Not Applicable">Not Applicable</option>
                              </datalist>
                           </div>
                           <div class="form-group fg">
                              <label for="livingCityTax">City Tax<i class="text-danger">*</i></label>
                              <input list="magic_living_city_tax" name="living_city_tax" id="livingCityTax" class="form-control">
                              <datalist id="magic_living_city_tax">
                                 <?php foreach ($get_info_city_tax as $gtct) { ?>
                                 <option value="<?php echo $gtct['state']; ?>"><?php echo $gtct['state']; ?></option>
                                 <?php } ?>
                                 <option value="Not Applicable">Not Applicable</option>
                              </datalist>
                           </div>
                           <div class="form-group fg">
                              <label for="livingCountyTax">County Tax<i class="text-danger">*</i></label>
                              <input list="magic_living_county_tax" name="living_county_tax" id="livingCountyTax" class="form-control">
                              <datalist id="magic_living_county_tax">
                                 <?php foreach ($get_info_county_tax as $gtcty) { ?>
                                 <option value="<?php echo $gtcty['state']; ?>"><?php echo $gtcty['state']; ?></option>
                                 <?php } ?>
                                 <option value="Not Applicable">Not Applicable</option>
                              </datalist>
                           </div>
                           <div class="form-group fg">
                              <label for="livingOtherTax">Other living Tax<i class="text-danger">*</i></label>
                              <input list="magic_living_other_tax" name="other_living_tax" id="livingOtherTax" class="form-control">
                              <datalist id="magic_living_other_tax">
                                 <!--<?php //foreach ($state_tx as $st) { ?>-->
                                 <!--    <option value="<?php //echo $st['state']; ?>"><?php //echo $st['state']; ?></option>-->
                                 <!--<?php //} ?>-->
                                 <option value="Not Applicable">Not Applicable</option>
                              </datalist>
                           </div>
                        </div>
                     </div>
                     <br>
                     <div style='float:right;font-weight:bold;'>
                        <!-- Button to add popup data -->
                        <button type="button"   style="background-color:green;margin-left: 335px;width:60px;"  class="btn btnclr"   id="addPopupsalespartnerData">Save</button>
                        <button type="button" class="btn btn-danger"   onclick="closeModal()">Close</button>
                     </div>
                     <br>
                     <br>
                  </div>
         </div>
         <div class="modal-footer">
         <a href="#" class="btn btnclr"  data-dismiss="modal"><?php echo display('Close') ?> </a>
         <input type="submit" class="btn btnclr" id="checkSubmit" value=<?php echo display('Submit') ?>>
         </div>
         </form>
      </div>
   </div>
</div>

<!-- Sales Partner Create End -->




<!-- Check Modal Employee -->  
<div class="modal fade" id="checkemployeeModal" role="dialog">
   <div class="modal-dialog modal-sm" role="document">
      <!-- <div class="modal-dialog" role="document"> -->
      <div class="modal-content">
         <div class="modal-header btnclr"  style="text-align:center;" >
            <a href="#" class="close" data-dismiss="modal">&times;</a>
            <h5 class="modal-title"><?php echo ('Select Employee / Sales Partner') ?></h5>
         </div>
         <div class="modal-body">
            <select class="form-control" id="getemployeeTypes" required>
               <option value="">Select Employee / Sales Partner</option>
               <option value="addEmployees">Add Employee</option>
               <option value="salesPartner">Add Sales Partner</option>
            </select>
         </div>
         <div class="modal-footer">
            <a href="#" class="btn btnclr"   data-dismiss="modal"><?php echo display('Close') ?> </a>
         </div>
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>


<!------ add new designation_modal -->  
<div class="modal fade" id="designation_modal" role="dialog">
   <div class="modal-dialog" role="document">
      <!-- <div class="modal-dialog" role="document"> -->
      <div class="modal-content">
         <div class="modal-header btnclr"  style="text-align:center;" >
            <a href="#" class="close" data-dismiss="modal">&times;</a>
            <h4 class="modal-title"><?php echo ('Add New Designation ') ?></h4>
         </div>
         <div class="modal-body">
            <div id="customeMessage" class="alert hide"></div>
            <form id="add_designation" method="post">
               <div class="panel-body">
                  <input type ="hidden" name="csrf_test_name" id="" value="<?php echo $this->security->get_csrf_hash();?>">
                  <div class="form-group row">
                     <label for="customer_name" class="col-sm-3 col-form-label" style="width: auto;"><?php echo ('New Designation') ?> <i class="text-danger">*</i></label>
                     <div class="col-sm-6">
                        <input class="form-control" name ="designation" id="designation" type="text" placeholder=""  required="" tabindex="1">
                     </div>
                  </div>
               </div>
         </div>
         <div class="modal-footer">
         <a href="#" class="btn btnclr"   data-dismiss="modal"><?php echo display('Close') ?> </a>
         <input type="submit" class="btn btnclr"   value=<?php echo display('Submit') ?>>
         </div>
         </form>
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>

<!------ add new Payment Type -->  
<div class="modal fade" id="payment_type" role="dialog">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header btnclr"  style="text-align:center;" >
            <a href="#" class="close" data-dismiss="modal">&times;</a>
            <h4 class="modal-title"><?php echo display('Add New Payment Type') ?></h4>
         </div>
         <div class="modal-body">
            <div id="customeMessage" class="alert hide"></div>
            <form id="add_pay_type" method="post">
               <div class="panel-body">
                  <input type ="hidden" name="csrf_test_name" id="" value="<?php echo $this->security->get_csrf_hash();?>">
                  <div class="form-group row">
                     <label for="customer_name" class="col-sm-3 col-form-label" style="width: auto;"><?php echo display('New Payment Type') ?> <i class="text-danger">*</i></label>
                     <div class="col-sm-6">
                        <input class="form-control" name ="new_payment_type" id="new_payment_type" type="text" placeholder="New Payment Type"  required="" tabindex="1">
                     </div>
                  </div>
               </div>
         </div>
         <div class="modal-footer">
         <a href="#" class="btn btnclr"  data-dismiss="modal"><?php echo display('Close') ?> </a>
         <input type="submit" class="btn btnclr "  value=<?php echo display('Submit') ?>>
         </div>
         </form>
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>

<!-- Bank modal -->
<div class="modal fade" id="add_bank_info">
   <div class="modal-dialog">
      <div class="modal-content" style="text-align:center;" >
         <div class="modal-header btnclr" >
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title"><?php echo display ('ADD BANK ') ?></h4>
         </div>
         <div class="container"></div>
         <div class="modal-body">
            <div id="customeMessage" class="alert hide"></div>
            <form id="add_bank"  method="post">
               <div class="panel-body">
                  <input type ="hidden" name="csrf_test_name" id="" value="<?php echo $this->security->get_csrf_hash();?>">
                  <div class="form-group row">
                     <label for="bank_name" class="col-sm-4 col-form-label"><?php echo display('bank_name') ?> <i class="text-danger">*</i></label>
                     <div class="col-sm-6">
                        <input type="text" class="form-control" name="bank_name" id="bank_name" required="" placeholder="<?php echo display('bank_name') ?>" tabindex="1"/>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="ac_name" class="col-sm-4 col-form-label"><?php echo display('ac_name') ?> <i class="text-danger">*</i></label>
                     <div class="col-sm-6">
                        <input type="text" class="form-control" name="ac_name" id="ac_name" required="" placeholder="<?php echo display('ac_name') ?>" tabindex="2"/>
                     </div>
                  </div>
                  <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                  <div class="form-group row">
                     <label for="ac_no" class="col-sm-4 col-form-label"><?php echo display('ac_no') ?> <i class="text-danger">*</i></label>
                     <div class="col-sm-6">
                        <input type="text" class="form-control" name="ac_no" id="ac_no" required="" placeholder="<?php echo display('ac_no') ?>" tabindex="3"/>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="branch" class="col-sm-4 col-form-label"><?php echo display('branch') ?> <i class="text-danger">*</i></label>
                     <div class="col-sm-6">
                        <input type="text" class="form-control" name="branch" id="branch" required="" placeholder="<?php echo display('branch') ?>" tabindex="4"/>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="shipping_line" class="col-sm-4 col-form-label"><?php echo display('Country') ?>
                     <i class="text-danger"></i>
                     </label>
                     <div class="col-sm-6">
                        <select class="selectpicker countrypicker form-control"  data-live-search="true" data-default="United States"  name="country" id="country" style="width:100%"></select>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="previous_balance" class="col-sm-4 col-form-label"><?php echo display('Currency') ?></label>
                     <div class="col-sm-6">
                        <select  class="form-control" id="currency" name="currency1" class="form-control"  style="width: 100%;" required=""  style="max-width: -webkit-fill-available;">
                           <option>Select currency</option>
                           <option value="AFN">AFN - Afghan Afghani</option>
                           <option value="ALL">ALL - Albanian Lek</option>
                           <option value="DZD">DZD - Algerian Dinar</option>
                           <option value="AOA">AOA - Angolan Kwanza</option>
                           <option value="ARS">ARS - Argentine Peso</option>
                           <option value="AMD">AMD - Armenian Dram</option>
                           <option value="AWG">AWG - Aruban Florin</option>
                           <option value="AUD">AUD - Australian Dollar</option>
                           <option value="AZN">AZN - Azerbaijani Manat</option>
                           <option value="BSD">BSD - Bahamian Dollar</option>
                           <option value="BHD">BHD - Bahraini Dinar</option>
                           <option value="BDT">BDT - Bangladeshi Taka</option>
                           <option value="BBD">BBD - Barbadian Dollar</option>
                           <option value="BYR">BYR - Belarusian Ruble</option>
                           <option value="BEF">BEF - Belgian Franc</option>
                           <option value="BZD">BZD - Belize Dollar</option>
                           <option value="BMD">BMD - Bermudan Dollar</option>
                           <option value="BTN">BTN - Bhutanese Ngultrum</option>
                           <option value="BTC">BTC - Bitcoin</option>
                           <option value="BOB">BOB - Bolivian Boliviano</option>
                           <option value="BAM">BAM - Bosnia-Herzegovina Convertible Mark</option>
                           <option value="BWP">BWP - Botswanan Pula</option>
                           <option value="BRL">BRL - Brazilian Real</option>
                           <option value="GBP">GBP - British Pound Sterling</option>
                           <option value="BND">BND - Brunei Dollar</option>
                           <option value="BGN">BGN - Bulgarian Lev</option>
                           <option value="BIF">BIF - Burundian Franc</option>
                           <option value="KHR">KHR - Cambodian Riel</option>
                           <option value="CAD">CAD - Canadian Dollar</option>
                           <option value="CVE">CVE - Cape Verdean Escudo</option>
                           <option value="KYD">KYD - Cayman Islands Dollar</option>
                           <option value="XOF">XOF - CFA Franc BCEAO</option>
                           <option value="XAF">XAF - CFA Franc BEAC</option>
                           <option value="XPF">XPF - CFP Franc</option>
                           <option value="CLP">CLP - Chilean Peso</option>
                           <option value="CNY">CNY - Chinese Yuan</option>
                           <option value="COP">COP - Colombian Peso</option>
                           <option value="KMF">KMF - Comorian Franc</option>
                           <option value="CDF">CDF - Congolese Franc</option>
                           <option value="CRC">CRC - Costa Rican ColÃ³n</option>
                           <option value="HRK">HRK - Croatian Kuna</option>
                           <option value="CUC">CUC - Cuban Convertible Peso</option>
                           <option value="CZK">CZK - Czech Republic Koruna</option>
                           <option value="DKK">DKK - Danish Krone</option>
                           <option value="DJF">DJF - Djiboutian Franc</option>
                           <option value="DOP">DOP - Dominican Peso</option>
                           <option value="XCD">XCD - East Caribbean Dollar</option>
                           <option value="EGP">EGP - Egyptian Pound</option>
                           <option value="ERN">ERN - Eritrean Nakfa</option>
                           <option value="EEK">EEK - Estonian Kroon</option>
                           <option value="ETB">ETB - Ethiopian Birr</option>
                           <option value="EUR">EUR - Euro</option>
                           <option value="FKP">FKP - Falkland Islands Pound</option>
                           <option value="FJD">FJD - Fijian Dollar</option>
                           <option value="GMD">GMD - Gambian Dalasi</option>
                           <option value="GEL">GEL - Georgian Lari</option>
                           <option value="DEM">DEM - German Mark</option>
                           <option value="GHS">GHS - Ghanaian Cedi</option>
                           <option value="GIP">GIP - Gibraltar Pound</option>
                           <option value="GRD">GRD - Greek Drachma</option>
                           <option value="GTQ">GTQ - Guatemalan Quetzal</option>
                           <option value="GNF">GNF - Guinean Franc</option>
                           <option value="GYD">GYD - Guyanaese Dollar</option>
                           <option value="HTG">HTG - Haitian Gourde</option>
                           <option value="HNL">HNL - Honduran Lempira</option>
                           <option value="HKD">HKD - Hong Kong Dollar</option>
                           <option value="HUF">HUF - Hungarian Forint</option>
                           <option value="ISK">ISK - Icelandic KrÃ³na</option>
                           <option value="INR">INR - Indian Rupee</option>
                           <option value="IDR">IDR - Indonesian Rupiah</option>
                           <option value="IRR">IRR - Iranian Rial</option>
                           <option value="IQD">IQD - Iraqi Dinar</option>
                           <option value="ILS">ILS - Israeli New Sheqel</option>
                           <option value="ITL">ITL - Italian Lira</option>
                           <option value="JMD">JMD - Jamaican Dollar</option>
                           <option value="JPY">JPY - Japanese Yen</option>
                           <option value="JOD">JOD - Jordanian Dinar</option>
                           <option value="KZT">KZT - Kazakhstani Tenge</option>
                           <option value="KES">KES - Kenyan Shilling</option>
                           <option value="KWD">KWD - Kuwaiti Dinar</option>
                           <option value="KGS">KGS - Kyrgystani Som</option>
                           <option value="LAK">LAK - Laotian Kip</option>
                           <option value="LVL">LVL - Latvian Lats</option>
                           <option value="LBP">LBP - Lebanese Pound</option>
                           <option value="LSL">LSL - Lesotho Loti</option>
                           <option value="LRD">LRD - Liberian Dollar</option>
                           <option value="LYD">LYD - Libyan Dinar</option>
                           <option value="LTL">LTL - Lithuanian Litas</option>
                           <option value="MOP">MOP - Macanese Pataca</option>
                           <option value="MKD">MKD - Macedonian Denar</option>
                           <option value="MGA">MGA - Malagasy Ariary</option>
                           <option value="MWK">MWK - Malawian Kwacha</option>
                           <option value="MYR">MYR - Malaysian Ringgit</option>
                           <option value="MVR">MVR - Maldivian Rufiyaa</option>
                           <option value="MRO">MRO - Mauritanian Ouguiya</option>
                           <option value="MUR">MUR - Mauritian Rupee</option>
                           <option value="MXN">MXN - Mexican Peso</option>
                           <option value="MDL">MDL - Moldovan Leu</option>
                           <option value="MNT">MNT - Mongolian Tugrik</option>
                           <option value="MAD">MAD - Moroccan Dirham</option>
                           <option value="MZM">MZM - Mozambican Metical</option>
                           <option value="MMK">MMK - Myanmar Kyat</option>
                           <option value="NAD">NAD - Namibian Dollar</option>
                           <option value="NPR">NPR - Nepalese Rupee</option>
                           <option value="ANG">ANG - Netherlands Antillean Guilder</option>
                           <option value="TWD">TWD - New Taiwan Dollar</option>
                           <option value="NZD">NZD - New Zealand Dollar</option>
                           <option value="NIO">NIO - Nicaraguan CÃ³rdoba</option>
                           <option value="NGN">NGN - Nigerian Naira</option>
                           <option value="KPW">KPW - North Korean Won</option>
                           <option value="NOK">NOK - Norwegian Krone</option>
                           <option value="OMR">OMR - Omani Rial</option>
                           <option value="PKR">PKR - Pakistani Rupee</option>
                           <option value="PAB">PAB - Panamanian Balboa</option>
                           <option value="PGK">PGK - Papua New Guinean Kina</option>
                           <option value="PYG">PYG - Paraguayan Guarani</option>
                           <option value="PEN">PEN - Peruvian Nuevo Sol</option>
                           <option value="PHP">PHP - Philippine Peso</option>
                           <option value="PLN">PLN - Polish Zloty</option>
                           <option value="QAR">QAR - Qatari Rial</option>
                           <option value="RON">RON - Romanian Leu</option>
                           <option value="RUB">RUB - Russian Ruble</option>
                           <option value="RWF">RWF - Rwandan Franc</option>
                           <option value="SVC">SVC - Salvadoran ColÃ³n</option>
                           <option value="WST">WST - Samoan Tala</option>
                           <option value="SAR">SAR - Saudi Riyal</option>
                           <option value="RSD">RSD - Serbian Dinar</option>
                           <option value="SCR">SCR - Seychellois Rupee</option>
                           <option value="SLL">SLL - Sierra Leonean Leone</option>
                           <option value="SGD">SGD - Singapore Dollar</option>
                           <option value="SKK">SKK - Slovak Koruna</option>
                           <option value="SBD">SBD - Solomon Islands Dollar</option>
                           <option value="SOS">SOS - Somali Shilling</option>
                           <option value="ZAR">ZAR - South African Rand</option>
                           <option value="KRW">KRW - South Korean Won</option>
                           <option value="XDR">XDR - Special Drawing Rights</option>
                           <option value="LKR">LKR - Sri Lankan Rupee</option>
                           <option value="SHP">SHP - St. Helena Pound</option>
                           <option value="SDG">SDG - Sudanese Pound</option>
                           <option value="SRD">SRD - Surinamese Dollar</option>
                           <option value="SZL">SZL - Swazi Lilangeni</option>
                           <option value="SEK">SEK - Swedish Krona</option>
                           <option value="CHF">CHF - Swiss Franc</option>
                           <option value="SYP">SYP - Syrian Pound</option>
                           <option value="STD">STD - São Tomé and Príncipe Dobra</option>
                           <option value="TJS">TJS - Tajikistani Somoni</option>
                           <option value="TZS">TZS - Tanzanian Shilling</option>
                           <option value="THB">THB - Thai Baht</option>
                           <option value="TOP">TOP - Tongan pa'anga</option>
                           <option value="TTD">TTD - Trinidad & Tobago Dollar</option>
                           <option value="TND">TND - Tunisian Dinar</option>
                           <option value="TRY">TRY - Turkish Lira</option>
                           <option value="TMT">TMT - Turkmenistani Manat</option>
                           <option value="UGX">UGX - Ugandan Shilling</option>
                           <option value="UAH">UAH - Ukrainian Hryvnia</option>
                           <option value="AED">AED - United Arab Emirates Dirham</option>
                           <option value="UYU">UYU - Uruguayan Peso</option>
                           <option selected value="USD">USD - US Dollar</option>
                           <option value="UZS">UZS - Uzbekistan Som</option>
                           <option value="VUV">VUV - Vanuatu Vatu</option>
                           <option value="VEF">VEF - Venezuelan BolÃ­var</option>
                           <option value="VND">VND - Vietnamese Dong</option>
                           <option value="YER">YER - Yemeni Rial</option>
                           <option value="ZMK">ZMK - Zambian Kwacha</option>
                        </select>
                     </div>
                  </div>
               </div>
         </div>
         <div class="modal-footer">
         <div class="row">
         <div class="col-sm-8">
         </div>
         <div class="col-sm-4">
         <a href="#" class="btn btnclr"  data-dismiss="modal"><?php echo display('Close') ?></a>
         <input type="submit" id="addBank"    class="btn btnclr" name="addBank" value="<?php echo display('save') ?>"/>
         </div>
         </div>  </div>
         </form>
      </div>
   </div>
</div>

<!------ add new Payment Type -->  
<div class="modal fade" id="employees_type" role="dialog">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header btnclr"  style="text-align:center;" >
            <a href="#" class="close" data-dismiss="modal">&times;</a>
            <h4 class="modal-title">Add Employee Type</h4>
         </div>
         <div class="modal-body">
            <div id="customeMessage" class="alert hide"></div>
            <form id="add_employee_type" method="post">
               <div class="panel-body">
                  <input type ="hidden" name="csrf_test_name" id="" value="<?php echo $this->security->get_csrf_hash();?>">
                  <div class="form-group row">
                     <label for="customer_name" class="col-sm-3 col-form-label" style="width: auto;">New Employee Type <i class="text-danger">*</i></label>
                     <div class="col-sm-6">
                        <input class="form-control" name ="employee_type" id="emps_type" type="text" placeholder="New Employee Type"  required="" tabindex="1">
                     </div>
                  </div>
               </div>
         </div>
         <div class="modal-footer">
         <a href="#" class="btn btnclr"  data-dismiss="modal"><?php echo display('Close') ?> </a>
         <input type="submit" class="btn btnclr"  value=<?php echo display('Submit') ?>>
         </div>
         </form>
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>


<!-- /.modal -->
<!------ add new Payment Type -->  
<div class="modal fade" id="payment_Type" role="dialog">
   <div class="modal-dialog" role="document">
      <div class="modal-content" style="text-align:center;">
         <div class="modal-header btnclr" >
            <a href="#" class="close" data-dismiss="modal">&times;</a>
            <h4 class="modal-title"><?php echo display('Add New Payment Type') ?></h4>
         </div>
         <div class="modal-body">
            <div id="customeMessage" class="alert hide"></div>
            <form id="add_pay_type" method="post">
               <div class="panel-body">
                  <input type ="hidden" name="csrf_test_name" id="" value="<?php echo $this->security->get_csrf_hash();?>">
                  <div class="form-group row">
                     <label for="customer_name" class="col-sm-3 col-form-label" style="width: auto;"><?php echo display('New Payment Type') ?> <i class="text-danger">*</i></label>
                     <div class="col-sm-6">
                        <input class="form-control" name ="new_payment_type" id="new_payment_type" type="text" placeholder="New Payment Type"  required="" tabindex="1">
                     </div>
                  </div>
               </div>
         </div>
         <div class="modal-footer">
         <a href="#" class="btn btnclr"  data-dismiss="modal"><?php echo display('Close') ?> </a>
         <input type="submit" class="btn btnclr"  value=<?php echo display('Submit') ?>>
         </div>
         </form>
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!------ add new product-->
<form id="insert_product"  method="post">
   <div class="modal fade" id="product_info" role="dialog">
   <div class="modal-dialog">
      <div class="modal-content" style="width: 150%; height: 140%;text-align:center;">
         <div class="modal-header btnclr" >
            <a href="#" class="close" data-dismiss="modal">&times;</a>
            <h3 class="modal-title"><?php echo display('add_new_product')?></h3>
         </div>
         <div class="modal-body">
            <div id="customeMessage" class="alert hide"></div>
<form action="ada">
<div class="panel-body">
<input type ="hidden" name="csrf_test_name" id="" value="<?php echo $this->security->get_csrf_hash();?>">
<div class="col-sm-6">
<div class="form-group row">
<label for="product_name" class="col-sm-4 col-form-label"><?php echo display('product_name') ?> <i class="text-danger">*</i></label>
<div class="col-sm-8">
<input class="form-control" name="product_name" type="text" id="product_name" placeholder="<?php echo display('product_name') ?>" required tabindex="1" >
</div>
</div>
</div>
<div class="col-sm-6">
<div class="form-group row">
<label for="barcode_or_qrcode" class="col-sm-4 col-form-label"><?php echo display('barcode_or_qrcode') ?> <i class="text-danger"></i></label>
<div class="col-sm-8">
<input type="text" tabindex="3" class="form-control"  style="width: 100%;" name="barcode" value=""  placeholder="Barcode/QR-code"   />
</div>
</div>
</div>
<div class="col-sm-6">
<div class="form-group row">
<label for="quantity" class="col-sm-4 col-form-label"><?php echo display('Quantity') ?> <i class="text-danger">*</i></label>
<div class="col-sm-8">
<input class="form-control" name="quantity" type="number" id="quantity" placeholder="Enter Product Quantity only" required tabindex="1" >
</div>
</div>
</div>
<div class="col-sm-6">
<div class="form-group row">
<label for="product_model" class="col-sm-4 col-form-label"><?php echo display('model') ?> <i class="text-danger">*</i></label>
<div class="col-sm-8">
<input type="text" tabindex="" class="form-control" id="product_model" name="model" required="" placeholder="<?php echo display('model') ?>" />
</div>
</div>
</div>
<div class="col-sm-6">
<div class="form-group row">
<label for="category_id" class="col-sm-4 col-form-label"><?php echo display('category') ?></label>
<div class="col-sm-7">
<select class="form-control" id="category_id" style="width: 250px;"  name="category_id" tabindex="3">
<option value="">Select the Category</option>
<?php if ($category_list) { ?>
{category_list}
<option value="{category_name}">{category_name}</option>
{/category_list}
<?php } ?>
</select>
</div>
</div>
</div>
<div class="col-sm-6">
<div class="form-group row">
<label for="sell_price" class="col-sm-4 col-form-label"><?php echo display('sell_price') ?> <i class="text-danger"></i> </label>
<div class="col-sm-8">
<input class="form-control" id="sell_price" name="price" type="text"  placeholder="0.00" tabindex="5" min="0">
</div>
</div>
</div>
<div class="col-sm-6">
<div class="form-group row">
<label for="" class="col-sm-4 col-form-label"><?php echo display('Supplier') ?> <i class="text-danger">*</i> </label>
<div class="col-sm-7">
<select name="supplier_id" id="supplier_id" required="" class="form-control " style="width:118%;"  tabindex="1">
<option value="">Select Supplier</option>
{all_supplier}
<option value="{supplier_id}">{supplier_name}</option>
{/all_supplier}
</select>
</div>
</div>
</div>
<div class="col-sm-6">
<div class="form-group row">
<label for="unit" class="col-sm-4 col-form-label"><?php echo display('unit') ?></label>
<div class="col-sm-7">
<select class="form-control" id="unit" name="unit"  style="width:250px;" tabindex="-1" aria-hidden="true">
<option value="">Select the Unit</option>
<?php if ($unit_list) { ?>
{unit_list}
<option value="{unit_name}">{unit_name}</option>
{/unit_list}
<?php } ?>
</select>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-12">
<div class="col-sm-6">
<div class="form-group row">
<label for="account_category_name" class="col-sm-4 col-form-label"><?php echo display('Account Category Name') ?></label>
<div class="col-sm-8">
<input class="form-control" name ="account_category_name" id="account_category_name" type="text" placeholder=" Account Category Name"   tabindex="1" >
</div>
</div>
</div>
<div class="col-sm-6">
<div class="form-group row">
<label for="account_sub_category"  class="col-sm-4 col-form-label"><?php echo display('Account Sub Category') ?></label>
<div class="col-sm-8">
<input class="form-control" name ="account_sub_category" id="account_sub_category" type="text" placeholder=" Account Sub Category"  tabindex="1" >
</div>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-12">
<div class="col-sm-6">
<div class="form-group row">
<label for="account_category" class="col-sm-4 col-form-label"><?php echo display('Account Category') ?></label>
<div class="col-sm-8">
<select id="ddl"  name="account_category" class="form-control" onchange="configureDropDownLists(this,document.getElementById('ddl2'))">
<option value="">Select the Account Category</option>
<option value="ASSETS"><?php echo  display('ASSETS');?></option>
<option value="RECEIVABLES"><?php echo  display('RECEIVABLES');?></option>
<option value="INVENTORIES"><?php echo  display('INVENTORIES');?></option>
<option value="PREPAID EXPENSES & OTHER CURRENT ASSETS"><?php echo  display('PREPAID EXPENSES & OTHER CURRENT ASSETS');?></option>
<option value="PROPERTY PLANT & EQUIPMENT"><?php echo  display('PROPERTY PLANT & EQUIPMENT');?></option>
<option value="ACCUMULATED DEPRECIATION & AMORTIZATION"><?php echo  display('ACCUMULATED DEPRECIATION & AMORTIZATION');?></option>
<option value="NON – CURRENT RECEIVABLES"><?php echo  display('NON – CURRENT RECEIVABLES');?></option>
<option value="INTERCOMPANY RECEIVABLES & OTHER NON-CURRENT ASSETS"><?php echo  display('INTERCOMPANY RECEIVABLES & OTHER NON-CURRENT ASSETS');?></option>
<option value="LIABILITIES & 2100 PAYABLES"><?php echo  display('LIABILITIES & PAYABLES');?></option>
<option value="ACCRUED COMPENSATION & RELATED ITEMS"><?php echo  display('ACCRUED COMPENSATION & RELATED ITEMS');?></option>
<option value="OTHER ACCRUED EXPENSES"><?php echo  display('OTHER ACCRUED EXPENSES');?></option>
<option value="ACCRUED TAXES"><?php echo  display('ACCRUED TAXES');?></option>
<option value="DEFERRED TAXES"><?php echo  display('DEFERRED TAXES');?></option>
<option value="LONG-TERM DEBT"><?php echo  display('LONG-TERM DEBT');?></option>
<option value="INTERCOMPANY PAYABLES & OTHER NON CURRENT LIABILITIES & OWNERS EQUITIES"><?php echo  display('INTERCOMPANY PAYABLES & OTHER NON CURRENT LIABILITIES & OWNERS EQUITIES');?></option>
<option value="REVENUE"><?php echo  display('REVENUE');?></option>
<option value="COST OF GOODS SOLD"><?php echo  display('COST OF GOODS SOLD');?></option>
<option value="OPERATING EXPENSES"><?php echo  display('OPERATING EXPENSES');?></option>
</select>
</div>
</div>
</div>
<div class="col-sm-6">
<div class="form-group row">
<label for="product_sub_category" class="col-sm-4 col-form-label"><?php echo display('Product Sub Category') ?><i class="text-danger">*</i></label>
<div class="col-sm-8">
<select   name="product_sub_category" id="product_sub_category" class=" form-control"  required placeholder="product_sub_category" style="width:100%;">
<option value=""><?php echo display('Select the Product Sub Category') ?></option>
<option value="Granite"><?php echo display('Granite') ?></option>
<option value="Marble"><?php echo display('Marble') ?></option>
<option value="Quartz"><?php echo display('Quartz') ?></option>
<option value="Quartzite"><?php echo display('Quartzite') ?></option>
<option value="Lime Stone"><?php echo display('Lime Stone') ?></option>
<option value="Dolomite"><?php echo display('Dolomite') ?></option>
<option value="Sand Stone"><?php echo display('Sand Stone') ?></option>
<option value="Soap Stone"><?php echo display('Soap Stone') ?></option>
</select>
</div>
</div>
</div>
</div>
</div>
<div class="col-sm-6">
<div class="form-group row">
<label for="sub_category"  class="col-sm-4 col-form-label"><?php echo display('Account Sub Category') ?></label>
<div class="col-sm-8">
<select class="form-control" name="sub_category" id="ddl2">
<option value="Select Sub Category"><?php echo display('Select Sub Category') ?></option>
</select>
</div>
</div>
</div>
<div class="col-sm-6">
<div class="form-group row">
<label for="image" class="col-sm-4 col-form-label"><?php echo display('Product Image') ?> </label>
<div class="col-sm-8">
<input type="file" name="product_image" class="form-control" id="product_image"  tabindex="4">
</div>
</div>
</div>
<div class="row">
<div class="col-sm-12">
<div class="col-sm-6">
<div class="form-group row">
<label for="cost_per_sqft" class="col-sm-4 col-form-label"><?php echo display('Cost per Sq.Ft') ?> </label>
<div class="col-sm-8">
<input type="text" name="costpersqft" class="form-control" id="cost_per_sqft" tabindex="4" placeholder="cost persqft" />
</div>
</div>
<div class="form-group row">
<label for="cost_per_slab" class="col-sm-4 col-form-label"><?php echo display('Cost per Slab') ?><i class="text-danger">*</i> </label>
<div class="col-sm-8">
<input type="text" name="costperslab" class="form-control" id="cost_per_slab" tabindex="4"  required="" placeholder="Cost per Slab" />
</div>
</div>
</div>
<div class="col-sm-6">
<div class="form-group row">
<label for="sales_price" class="col-sm-4 col-form-label"><?php echo display('Sales Price per Sq.Ft') ?> </label>
<div class="col-sm-8">
<input type="text" name="salespricepersqft" class="form-control" id="sales_price_per_sqft" tabindex="4"  placeholder=" Sales Price perSq.Ft" />
</div>
</div>
<div class="form-group row">
<label for="sales_slab_price" class="col-sm-4 col-form-label"><?php echo display('Sales Slab Price') ?> </label>
<div class="col-sm-8">
<input type="text" name="salesslabprice" class="form-control" id="sales_slab_price" tabindex="4" placeholder=" Sales Slab Price"  />
</div>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-12">
<div class="col-sm-6">
<div class="form-group row">
<label for="tax_id" class="col-sm-4 col-form-label"><?php echo display('Tax') ?> </label>
<div class="col-sm-8">
<input type="text" name="tax" class="form-control" id="tax_id" tabindex="4" placeholder=" Tax" />
</div>
</div>
</div>
<div class="col-sm-6">
<div class="form-group row">
<label for="country" class="col-sm-4 col-form-label"><?php echo display('Country') ?></label>
<div class="col-sm-8">
<select class="selectpicker countpicker form-control"  data-live-search="true" data-default="US-United States"
   name="country" id="country" ></select>      
</div>
</div>
</div>
<div class="col-sm-6">
<div class="form-group row">
<label for="serial_no" class="col-sm-4 col-form-label"><?php echo display('Serial No') ?></label>
<div class="col-sm-8">
<input type="text" tabindex="" class="form-control " id="serial_no" name="serial_no" placeholder="111,abc,XYz"   />
</div>
</div>
</div>
<div class="row">
<div class="col-sm-12">
<center><label for="description" class="col-form-label"><?php echo display('product_details') ?></label></center>
<textarea class="form-control" name="description" id="description" rows="2" placeholder="<?php echo display('product_details') ?>" tabindex="2"></textarea>
</div>
</div><br>
<div class="form-group row">
<div class="col-sm-6"></div>
<div class="col-sm-6" style="text-align: -webkit-right;">
<a href="#" class="btn" style="color:white;background-color:#38469f;" data-dismiss="modal"><?php echo display('Close') ?></a>
<input type="submit" id="add-product" style="color:white;background-color:#38469f;" class="btn btn-primary btn-large" name="insert_product" value="<?php echo display('save') ?>" tabindex="10"/>
</div>
</div>
</div>
</div>
</div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</form>
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="formModalLabel"><?php echo display('Contact Us') ?></h4>
         </div>
         <div class="modal-body">
            <div class="alert alert-success hidden" id="contactSuccess">
               <strong><?php echo display('Success') ?>!</strong><?php echo display(' Your message has been sent to us.') ?>
            </div>
            <div class="alert alert-danger hidden" id="contactError">
               <strong><?php echo display('Error') ?>!</strong> <?php echo display('There was an error sending your message.') ?>
            </div>
            <div class="row">
               <div class="form-group">
                  <div class="col-md-6">
                     <label><?php echo display('Your name') ?> *</label>
                     <input type="text"  data-msg-required="Please enter your name." maxlength="100" class="form-control" name="name" id="name_email" required>
                  </div>
                  <div class="col-md-6">
                     <label><?php echo display('Your email address') ?> *</label>
                     <input type="email"  data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control" name="email" id="email_info" required>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="form-group">
                  <div class="col-md-12">
                     <label><?php echo display('Subject') ?></label>
                     <input type="text"  data-msg-required="Please enter the subject." maxlength="100" class="form-control" name="subject" id="subject_email" required>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="form-group">
                  <div class="col-md-12">
                     <label><?php echo display('Message') ?> *</label>
                     <textarea maxlength="5000" data-msg-required="Please enter your message." rows="10" class="form-control" name="message" id="message_email" required></textarea>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <input type="submit" value="Send Message" id="email_send" name="email_send"  class="btnclr btn btn-lg mb-xlg" data-loading-text="Loading...">
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- start Modal for all action -->
<div class="modal fade" id="myModal1" role="dialog">
   <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content" style="text-align:center;margin-top: 190px;">
         <div class="modal-header btnclr" >
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><?php echo display('New Sale') ?></h4>
         </div>
         <div class="modal-body">
            <h4><?php echo display('Sales Invoice Created Succefully') ?></h4>
         </div>
         <div class="modal-footer">
         </div>
      </div>
   </div>
</div>
<script type="text/javascript">
   $(document).ready(function(){
   
     $('.land_th').hide();
       $('.landing_cost').hide();
         $('.lc').hide();
   
   });
   var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
   var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';
    $('#customer_name').change(function(e){
   
       var data = {
         
           value:$(this).val()
       };
       data[csrfName] = csrfHash;
   
       $.ajax({
           type:'POST',
           data: data, 
          dataType:"json",
           url:'<?php echo base_url();?>Cinvoice/getcustomer_data',
           success: function(result, statut) {
               if(result.csrfName){
                  csrfName = result.csrfName;
                  csrfHash = result.csrfHash;
               }
                $('#vendor_add').val(result[0]['address']+'\n'+result[0]['city']+'\n'+result[0]['state']+"-"+result[0]['zip']+"-"+result[0]['country']+'\n'+result[0]['primaryemail']+"-"+result[0]['businessphone']       );
          
               $('#billing_address').html(result[0]['customer_address']+'\n'+result[0]['city']+'\n'+result[0]['state']+"-"+result[0]['zip']+"-"+result[0]['country']+'\n'+result[0]['customer_email']+'\n'+result[0]['phone']);
               $('#shipping_address').html(result[0]['address2']+'\n'+result[0]['city']+'\n'+result[0]['state']+"-"+result[0]['zip']+"-"+result[0]['country']+'\n'+result[0]['customer_email']+'\n'+result[0]['phone']);
       $('#email_info').val(result[0]['customer_email']);
       if(result[0]['tax_status']==1){
           $('#product_tax').val(result[0]['tax_percent']);
       }else{
          $('#product_tax').val(0);
       }
           }
       });
   });
   
   
   
   
   $('#tax_btn').submit(function (event) {
   
      
   var dataString = {
      dataString : $("#tax_btn").serialize()
   
   };
   dataString[csrfName] = csrfHash;
   
   $.ajax({
      type:"POST",
      dataType:"json",
      url:"<?php echo base_url(); ?>Cinvoice/insert_taxinfodata",
      data:$("#tax_btn").serialize(),
   
      success: function (data1) {
      console.log(data1);
      $("#magic_tax").empty();
       for (var i in data1) {
         // console.log(data1);
          $("<option/>").html(data1[i].tax_id +'-'+ data1[i].tax+'%').appendTo("#magic_tax");
       }
   
     $("#magic_tax").focus();
     
     $("#bodyModal1").html("Tax Added Successfully");
      
     $('#myModal1').modal('show');
   
     window.setTimeout(function(){
       $('#tax_info').modal('hide');
       $('.modal-backdrop').remove();
      $('#myModal1').modal('hide');
   }, 2000);
        
      }
   
   });
   event.preventDefault();
   });
   
   
   
</script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<!-- jQuery library -->
<!-- Latest compiled JavaScript -->
<script type="text/javascript">
   function configureDropDownLists(ddl1,ddl2) {
   var assets = ['CASH Operating Account', 'CASH Debitors', 'CASH Petty Cash'];
   var receivables = ['A/REC Trade', 'A/REC Trade Notes Receivable', 'A/REC Installment Receivables','A/REC Retainage Withheld','A/REC Allowance for Uncollectible Accounts'];
   var inventories = ['INV – Reserved', 'INV – Work-in-Progress', 'INV – Finished Goods','INV – Reserved','INV – Unbilled Cost & Fees','INV – Reserve for Obsolescence'];
   var prepaid_expense = ['PREPAID – Insurance', 'PREPAID – Real Estate Taxes', 'PREPAID – Repairs & Maintenance','PREPAID – Rent','PREPAID – Deposits'];
   var property_plant = ['PPE – Buildings', 'PPE – Machinery & Equipment', 'PPE – Vehicles','PPE – Computer Equipment','PPE – Furniture & Fixtures','PPE – Leasehold Improvements'];
   var acc_dep = ['ACCUM DEPR Buildings', 'ACCUM DEPR Machinery & Equipment', 'ACCUM DEPR Vehicles','ACCUM DEPR Computer Equipment','ACCUM DEPR Furniture & Fixtures','ACCUM DEPR Leasehold Improvements'];
   var noncurrenctreceivables = ['NCA – Notes Receivable', 'NCA – Installment Receivables', 'NCA – Retainage Withheld'];
   var intercompany_receivables = ['Organization Costs', 'Patents & Licenses', 'Intangible Assets – Capitalized Software Costs'];
   var liabilities = ['A/P Trade', 'A/P Accrued Accounts Payable', 'A/P Retainage Withheld','Current Maturities of Long-Term Debt','Bank Notes Payable','Construction Loans Payable'];
   var accrued_compensation = ['Accrued – Payroll', 'Accrued – Commissions', 'Accrued – FICA','Accrued – Unemployment Taxes','Accrued – Workmen’s Comp'];
   var other_accrued_expenses = ['Accrued – Rent', 'Accrued – Interest', 'Accrued – Property Taxes', 'Accrued – Warranty Expense'];
   var accrued_taxes= ['Accrued – Federal Income Taxes', 'Accrued – State Income Taxes', 'Accrued – Franchise Taxes','Deferred – FIT Current','Deferred – State Income Taxes'];
   var deferred_taxes= ['D/T – FIT – NON CURRENT', 'D/T – SIT – NON CURRENT'];
   var long_term_debt=['LTD – Notes Payable','LTD – Mortgages Payable','LTD – Installment Notes Payable'];
   var intercompany_payables=['Common Stock','Preferred Stock','Paid in Capital','Partners Capital','Member Contributions','Retained Earnings'];
   var revenue=['REVENUE – PRODUCT 1','REVENUE – PRODUCT 2','REVENUE – PRODUCT 3','REVENUE – PRODUCT 4','Interest Income','Other Income','Finance Charge Income','Sales Returns and Allowances','Sales Discounts'];
   var cost_goods= ['COGS – PRODUCT 1', 'COGS – PRODUCT 2','COGS – PRODUCT 3','COGS – PRODUCT 4','Freight','Inventory Adjustments','Purchase Returns and Allowances','Reserved'];
   var operating_expenses=['Advertising Expense','Amortization Expense','Auto Expense','Bad Debt Expense','Bad Debt Expense','Bank Charges','Cash Over and Short','Commission Expense','Depreciation Expense','Employee Benefit Program','Freight Expense','Gifts Expense','Insurance – General','Interest Expense','Professional Fees','License Expense','Maintenance Expense','Meals and Entertainment','Office Expense','Payroll Taxes','Printing','Postage','Rent','Repairs Expense','Salaries Expense','Supplies Expense','Taxes – FIT Expense','Utilities Expense','Gain/Loss on Sale of Assets'];
   switch (ddl1.value) {
   case 'ASSETS':
   ddl2.options.length = 0;
   for (i = 0; i < assets.length; i++) {
   createOption(ddl2, assets[i], assets[i]);
   }
   break;
   case 'RECEIVABLES':
   ddl2.options.length = 0;
   for (i = 0; i < receivables.length; i++) {
   createOption(ddl2, receivables[i], receivables[i]);
   }
   break;
   case 'INVENTORIES':
   ddl2.options.length = 0;
   for (i = 0; i < inventories.length; i++) {
   createOption(ddl2, inventories[i], inventories[i]);
   }
   break;
   case 'PREPAID EXPENSES & OTHER CURRENT ASSETS':
   ddl2.options.length = 0;
   for (i = 0; i < prepaid_expense.length; i++) {
   createOption(ddl2, prepaid_expense[i], prepaid_expense[i]);
   }
   break;
   case 'PROPERTY PLANT & EQUIPMENT':
   ddl2.options.length = 0;
   for (i = 0; i < property_plant.length; i++) {
   createOption(ddl2, property_plant[i], property_plant[i]);
   }
   break;
   case 'ACCUMULATED DEPRECIATION & AMORTIZATION':
   ddl2.options.length = 0;
   for (i = 0; i < acc_dep.length; i++) {
   createOption(ddl2, acc_dep[i], acc_dep[i]);
   }
   break;
   case 'NON – CURRENT RECEIVABLES':
   ddl2.options.length = 0;
   for (i = 0; i < noncurrenctreceivables.length; i++) {
   createOption(ddl2, noncurrenctreceivables[i], noncurrenctreceivables[i]);
   }
   break;
   case 'INTERCOMPANY RECEIVABLES & OTHER NON-CURRENT ASSETS':
   ddl2.options.length = 0;
   for (i = 0; i < intercompany_receivables.length; i++) {
   createOption(ddl2, intercompany_receivables[i], intercompany_receivables[i]);
   }
   break;
   case 'LIABILITIES & PAYABLES':
   ddl2.options.length = 0;
   for (i = 0; i < liabilities.length; i++) {
   createOption(ddl2, liabilities[i], liabilities[i]);
   }
   break;
   case 'ACCRUED COMPENSATION & RELATED ITEMS':
   ddl2.options.length = 0;
   for (i = 0; i < accrued_compensation.length; i++) {
   createOption(ddl2, accrued_compensation[i], accrued_compensation[i]);
   }
   break;
   case 'OTHER ACCRUED EXPENSES':
   ddl2.options.length = 0;
   for (i = 0; i < other_accrued_expenses.length; i++) {
   createOption(ddl2, other_accrued_expenses[i], other_accrued_expenses[i]);
   }
   break;
   case 'ACCRUED TAXES':
   ddl2.options.length = 0;
   for (i = 0; i < accrued_taxes.length; i++) {
   createOption(ddl2, accrued_taxes[i], accrued_taxes[i]);
   }
   break;
   case 'DEFERRED TAXES':
   ddl2.options.length = 0;
   for (i = 0; i < deferred_taxes.length; i++) {
   createOption(ddl2, deferred_taxes[i], deferred_taxes[i]);
   }
   break;
   case 'LONG-TERM DEBT':
   ddl2.options.length = 0;
   for (i = 0; i < long_term_debt.length; i++) {
   createOption(ddl2, long_term_debt[i], long_term_debt[i]);
   }
   break;
   case 'INTERCOMPANY PAYABLES & OTHER NON CURRENT LIABILITIES & OWNERS EQUITIES':
   ddl2.options.length = 0;
   for (i = 0; i < intercompany_payables.length; i++) {
   createOption(ddl2, intercompany_payables[i], intercompany_payables[i]);
   }
   break;
   case 'REVENUE':
   ddl2.options.length = 0;
   for (i = 0; i < revenue.length; i++) {
   createOption(ddl2, revenue[i], revenue[i]);
   }
   break;
   case 'COST OF GOODS SOLD':
   ddl2.options.length = 0;
   for (i = 0; i < cost_goods.length; i++) {
   createOption(ddl2, cost_goods[i], cost_goods[i]);
   }
   break;
   case 'OPERATING EXPENSES':
   ddl2.options.length = 0;
   for (i = 0; i < operating_expenses.length; i++) {
   createOption(ddl2, operating_expenses[i], operating_expenses[i]);
   }
   break;
   default:
   ddl2.options.length = 0;
   break;
   }
   }
   function createOption(ddl, text, value) {
   var opt = document.createElement('option');
   opt.value = value;
   opt.text = text;
   ddl.options.add(opt);
   }
   let dynamic_id=2;
   function addbundle(){
        $(this).closest('table').find('.addbundle').css("display","none");
     $(this).closest('table').find('.removebundle').css("display","block");
   
   var newdiv = document.createElement('div');
   var tabin="crate_wrap_"+dynamic_id;
   
   newdiv = document.createElement("div");
   
   
//   newdiv.innerHTML ='<table class="table normalinvoice table-bordered table-hover"   style="border:2px solid #d7d4d6;"                                               id="normalinvoice_'+ dynamic_id +'"> <thead> <tr> <th rowspan="2" class="text-center" style="width: 170px;" ><?php echo display('product_name'); ?><i class="text-danger">*</i></th> <th rowspan="2"  class="text-center"><?php echo display('Bundle No');?><i class="text-danger">*</i></th> <th rowspan="2"  class="text-center"><?php echo  display('description'); ?></th> <th rowspan="2" style="width:60px;" class="text-center"><?php echo display('Thick ness');?><i class="text-danger">*</i></th> <th rowspan="2" class="text-center"><?php echo display('Supplier Block No');?><i class="text-danger">*</i></th>  <th rowspan="2" class="text-center" ><?php echo display('Supplier Slab No');?><i class="text-danger">*</i> </th> <th colspan="2" style="width:150px;" class="text-center"><?php echo display('Gross Measurement');?><i class="text-danger">*</i> </th> <th rowspan="2" class="text-center"><?php echo display('Gross Sq.Ft');?></th>  <th rowspan="2" style="width:40px;" class="text-center"><?php echo display('Slab No');?><i class="text-danger">*</i></th> <th colspan="2" style="width:150px;" class="text-center"><?php echo display('Net Measure');?><i class="text-danger">*</i></th> <th rowspan="2" class="text-center"><?php echo display('Net Sq.Ft');?></th> <th rowspan="2" class="text-center"><?php echo display('Cost per Sq.Ft');?></th><th rowspan="2"  class="text-center"><?php echo display('Cost per Slab');?></th><th rowspan="2" class="land_th" style="width: 100px" class="text-center"><?php echo "Landing Cost per Sq.Ft" ?></th><th rowspan="2" class="land_th" style="width: 100px" class="text-center"><?php echo "Landing Cost per Slab" ?></th>  <th rowspan="2"  class="text-center"><?php echo display('sales'); ?><br/><?php echo display('Price per Sq.Ft');?></th> <th rowspan="2"  class="text-center"><?php echo display('Sales Slab Price');?></th> <th rowspan="2" class="text-center"><?php echo display('Weight');?></th>   <th rowspan="2" style="width: 100px" class="text-center"><?php  echo  display('total'); ?></th><th rowspan="2" class="text-center"><?php  echo  display('action'); ?></th> </tr>  <tr> <th class="text-center"><?php echo display('Width');?></th> <th class="text-center"><?php echo display('Height');?></th> <th class="text-center"><?php echo display('Width');?></th> <th class="text-center"><?php echo display('Height');?></th> </tr>  </thead> <tbody class="tbody" id="addPurchaseItem_'+ dynamic_id +'"> <tr> <input type="hidden" name="tableid[]" id="tableid_'+ dynamic_id +'"/><td> <input   list="magicHouses"  style="width:160px;" name="prodt[]" id="prodt_'+ dynamic_id +'"   class="form-control product_name"  placeholder="Search Product" > <datalist id="magicHouses"> <option value="Select the Product" selected>Select the Product</option> <?php  foreach($product as $tx){?>  <option value="<?php echo $tx["product_name"]."-".$tx["product_model"];?>">  <?php echo $tx["product_name"]."-".$tx["product_model"];  ?></option> <?php } ?> </datalist> <input type="hidden" class="common_product autocomplete_hidden_value  product_id_'+ dynamic_id +'" name="product_id[]"        id="SchoolHiddenId_'+ dynamic_id +'" /> </td> <td>  <input list="magic_bundle" name="bundle_no[]" id="bundle_no_'+ dynamic_id +'"   class="form-control bundle_no"'+'onchange="this.reset();" /><datalist id="magic_bundle"><?php foreach($bundle as $tx){?> <option value="<?php echo $tx['bundle_no'];?>">  <?php echo $tx['bundle_no'];  ?></option> <?php } ?>'+
   
//   '</datalist></td> <td> <input type="text" id="description_'+ dynamic_id +'" name="description[]" class="form-control" /> </td>  <td > <input type="text" name="thickness[]" id="thickness_'+ dynamic_id +'" required="" class="form-control"/> </td>  <td><input list="magic_supplier_block" name="supplier_block_no[]"  id="supplier_b_no_'+ dynamic_id +'"   class="form-control supplier_block_no"  placeholder="Search Product"  onchange="this.blur();" /><datalist id="magic_supplier_block"><?php foreach($supplier_block_no as $tx){?><option value="<?php echo $tx['supplier_block_no'];?>">  <?php echo $tx['supplier_block_no'];  ?></option><?php } ?></datalist> </td>  <td > <input type="text"  id="supplier_s_no_'+ dynamic_id +'" name="supplier_slab_no[]" required="" class="form-control"/> </td> <td> <input type="text" id="gross_width_'+ dynamic_id +'" name="gross_width[]" required="" class="gross_width  form-control" /> </td> <td> <input type="text" id="gross_height_'+ dynamic_id +'" name="gross_height[]"  required="" class="gross_height form-control" /> </td>  <td > <input type="text"   style="width:60px;" readonly id="gross_sq_ft_'+ dynamic_id +'" name="gross_sq_ft[]" class="gross_sq_ft form-control"/> </td>   <td style="text-align:center;" >  <input type="text"   style="width:20px;" value="1" class="slab_no" id="slab_no_'+ dynamic_id +'" name="slab_no[]"   readonly  required=""/>  </td> <td> <input type="text" id="net_width_'+ dynamic_id +'" name="net_width[]" required="" class="net_width form-control" /> </td> <td> <input type="text" id="net_height_'+ dynamic_id +'" name="net_height[]"    required="" class="net_height form-control" /> </td> <td > <input type="text"   style="width:60px;" readonly id="net_sq_ft_'+ dynamic_id +'" name="net_sq_ft[]" class="net_sq_ft form-control"/> </td> <td>   <span class="input-symbol-euro"><input type="text" id="cost_sq_ft_'+ dynamic_id +'"  name="cost_sq_ft[]"  readonly  style="width:70px;" placeholder="0.00"  class="cost_sq_ft form-control" ></span>   <td >  <span class="input-symbol-euro"> <input type="text"  id="cost_sq_slab_'+ dynamic_id +'" name="cost_sq_slab[]"  readonly  style="width:70px;" placeholder="0.00"  class="cost_sq_slab form-control"/></span>     </td> <td>  <span class="input-symbol-euro">  <input type="text" id="sales_amt_sq_ft_'+ dynamic_id +'"  name="sales_amt_sq_ft[]"  style="width:70px;"  placeholder="0.00" class="sales_amt_sq_ft form-control" /></span>     </td>  <td >  <span class="input-symbol-euro">   <input type="text"  id="sales_slab_amt_'+ dynamic_id +'" name="sales_slab_amt[]"  style="width:70px;" placeholder="0.00"  class="sales_slab_amt form-control"/></td> </span>     </td> <td> <input type="text" id="weight_'+ dynamic_id +'" name="weight[]"  class="weight form-control" /> </td>   <td > <span class="input-symbol-euro"><input  type="text" class="total_price form-control" style="width:80px;" readonly value="0.00"  id="total_amt_'+ dynamic_id +'"     name="total_amt[]"/></span> </td>  <td style="text-align:center;"> <button  class="delete btn btn-danger" id="delete_'+ dynamic_id +'" type="button" value="Delete" ><i class="fa fa-trash"></i></button> </td>  </tr> </tbody> <tfoot> <tr> <td style="text-align:right;" colspan="8"><b>Gross Sq.Ft :</b></td> <td > <input type="text" id="overall_gross_'+ dynamic_id +'" name="overall_gross[]"   class="overall_gross form-control" style="width: 60px"  readonly="readonly"  /> </td> <td style="text-align:right;" colspan="3"><b>Net Sq.Ft :</b></td> <td > <input type="text" id="overall_net_'+ dynamic_id +'" name="overall_net[]"  class="overall_net form-control"  style="width: 60px"  readonly="readonly"  /> </td>  <td><span class="input-symbol-euro"><input type="text" id="costpersqft_'+ dynamic_id +'"  name="costpersqft[]"   style="width:70px;" placeholder="0.00"  readonly class="costpersqft form-control" /></span></td>'+
//   '<td ><span class="input-symbol-euro"> <input type="text"  id="costperslab_'+ dynamic_id +'" name="costperslab[]"    style="width:70px;" placeholder="0.00" readonly class="costperslab form-control"/></span></td><td class="lc"><input type="text" id="landingpersqft_'+ dynamic_id +'" name="landingpersqft[]"  class="landingpersqft form-control"  style="width: 60px"  readonly="readonly"  /> </td><td class="lc"><input type="text" id="landingperslab_'+ dynamic_id +'" name="landingperslab[]"  class="landingperslab form-control"  style="width: 60px"  readonly="readonly"  /> '+
//   '</td><td><span class="input-symbol-euro">  <input type="text" id="salespricepersqft_'+ dynamic_id +'"  name="salespricepersqft[]" readonly  style="width:70px;"  placeholder="0.00" class="salespricepersqft form-control" /></span></td><td ><span class="input-symbol-euro">   <input type="text"  id="salesslabprice_'+ dynamic_id +'" name="salesslabprice[]" readonly  style="width:70px;" placeholder="0.00"  class="salesslabprice form-control"/></td> </span><td ><input type="text" id="overall_weight_'+ dynamic_id +'" name="overall_weight[]"  class="overall_weight form-control"  style="width: 70px"  readonly="readonly"  /></td><td ><span class="input-symbol-euro">    <input type="text" id="Total_'+ dynamic_id +'" name="total[]"   class="b_total form-control"  style="width: 80px" value="0.00"  readonly="readonly"  /></span></td>  <td  style="text-align:center;"><i id="buddle_'+ dynamic_id +'" onclick="removebundle(); " class="btn-danger removebundle fa fa-minus" aria-hidden="true"></i></td>   </tr> </foot></table> <i id="buddle_'+ dynamic_id +'"  style="margin-right:25px;float:right;color:white; "   onclick="addbundle(); " class="btnclraddbundle fa fa-plus" aria-hidden="true"></i>';  
   
   
      newdiv.innerHTML ='<table class="table normalinvoice table-bordered table-hover" id="normalinvoice_'+ dynamic_id +'"> <thead> <tr> <th rowspan="2" class="text-center" style="width: 170px;" ><?php echo display('product_name'); ?><i class="text-danger">*</i></th> <th rowspan="2"  class="text-center"><?php echo display('Bundle No');?><i class="text-danger">*</i></th> <th rowspan="2"  class="text-center"><?php echo  display('description'); ?></th> <th rowspan="2" style="width:60px;" class="text-center"><?php echo display('Thick ness');?><i class="text-danger">*</i></th> <th rowspan="2" class="text-center"><?php echo display('Supplier Block No');?><i class="text-danger">*</i></th>  <th rowspan="2" class="text-center" ><?php echo display('Supplier Slab No');?><i class="text-danger">*</i> </th> <th colspan="2" style="width:150px;" class="text-center"><?php echo display('Gross Measurement');?><i class="text-danger">*</i> </th> <th rowspan="2" class="text-center"><?php echo display('Gross Sq.Ft');?></th>  <th rowspan="2" style="width:40px;" class="text-center"><?php echo display('Slab No');?><i class="text-danger">*</i></th> <th colspan="2" style="width:150px;" class="text-center"><?php echo display('Net Measure');?><i class="text-danger">*</i></th> <th rowspan="2" class="text-center"><?php echo display('Net Sq.Ft');?></th> <th rowspan="2" class="text-center"><?php echo display('Cost per Sq.Ft');?></th><th rowspan="2"  class="text-center"><?php echo display('Cost per Slab');?></th><th rowspan="2" class="land_th" style="width: 100px" class="text-center"><?php echo "Landing Cost per Sq.Ft" ?></th><th rowspan="2" class="land_th" style="width: 100px" class="text-center"><?php echo "Landing Cost per Slab" ?></th>  <th rowspan="2"  class="text-center"><?php echo display('sales'); ?><br/><?php echo display('Price per Sq.Ft');?></th> <th rowspan="2"  class="text-center"><?php echo display('Sales Slab Price');?></th> <th rowspan="2" class="text-center"><?php echo display('Weight');?></th>   <th rowspan="2" style="width: 100px" class="text-center"><?php  echo  display('total'); ?></th><th rowspan="2" class="text-center"><?php  echo  display('action'); ?></th> </tr>  <tr> <th class="text-center"><?php echo display('Width');?></th> <th class="text-center"><?php echo display('Height');?></th> <th class="text-center"><?php echo display('Width');?></th> <th class="text-center"><?php echo display('Height');?></th> </tr>  </thead> <tbody class="tbody" id="addPurchaseItem_'+ dynamic_id +'"> <tr> <input type="hidden" name="tableid[]" id="tableid_'+ dynamic_id +'"/><td> <input   list="magicHouses"  style="width:160px;" name="prodt[]" id="prodt_'+ dynamic_id +'"   class="form-control product_name"  placeholder="Search Product" > <datalist id="magicHouses"> <option value="Select the Product" selected>Select the Product</option> <?php  foreach($product as $tx){?>  <option value="<?php echo $tx["product_name"]."-".$tx["product_model"];?>">  <?php echo $tx["product_name"]."-".$tx["product_model"];  ?></option> <?php } ?> </datalist> <input type="hidden" class="common_product autocomplete_hidden_value  product_id_'+ dynamic_id +'" name="product_id[]"        id="SchoolHiddenId_'+ dynamic_id +'" /> </td> <td>  <input list="magic_bundle" name="bundle_no[]" id="bundle_no_'+ dynamic_id +'"   class="form-control bundle_no"'+'onchange="this.reset();" /><datalist id="magic_bundle"><?php foreach($bundle as $tx){?> <option value="<?php echo $tx['bundle_no'];?>">  <?php echo $tx['bundle_no'];  ?></option> <?php } ?>'+
   
   '</datalist></td> <td> <input type="text" id="description_'+ dynamic_id +'" name="description[]" class="form-control" /> </td>  <td > <input type="text" name="thickness[]" id="thickness_'+ dynamic_id +'" required="" class="form-control"/> </td>  <td><input list="magic_supplier_block" name="supplier_block_no[]"  id="supplier_b_no_'+ dynamic_id +'"   class="form-control supplier_block_no"  placeholder="Search Product"  onchange="this.blur();" /><datalist id="magic_supplier_block"><?php foreach($supplier_block_no as $tx){?><option value="<?php echo $tx['supplier_block_no'];?>">  <?php echo $tx['supplier_block_no'];  ?></option><?php } ?></datalist> </td>  <td > <input type="text"  id="supplier_s_no_'+ dynamic_id +'" name="supplier_slab_no[]" required="" class="form-control"/> </td> <td> <input type="text" id="gross_width_'+ dynamic_id +'" name="gross_width[]" required="" class="gross_width  form-control" /> </td> <td> <input type="text" id="gross_height_'+ dynamic_id +'" name="gross_height[]"  required="" class="gross_height form-control" /> </td>  <td > <input type="text"   style="width:60px;" readonly id="gross_sq_ft_'+ dynamic_id +'" name="gross_sq_ft[]" class="gross_sq_ft form-control"/> </td>   <td style="text-align:center;" >  <input type="text"   style="width:20px;" value="1" class="slab_no" id="slab_no_'+ dynamic_id +'" name="slab_no[]"   readonly  required=""/>  </td> <td> <input type="text" id="net_width_'+ dynamic_id +'" name="net_width[]" required="" class="net_width form-control" /> </td> <td> <input type="text" id="net_height_'+ dynamic_id +'" name="net_height[]"    required="" class="net_height form-control" /> </td> <td > <input type="text"   style="width:60px;" readonly id="net_sq_ft_'+ dynamic_id +'" name="net_sq_ft[]" class="net_sq_ft form-control"/> </td> <td>   <span class="input-symbol-euro"><input type="text" id="cost_sq_ft_'+ dynamic_id +'"  name="cost_sq_ft[]"  readonly  style="width:70px;" placeholder="0.00"  class="cost_sq_ft form-control" ></span>   <td >  <span class="input-symbol-euro"> <input type="text"  id="cost_sq_slab_'+ dynamic_id +'" name="cost_sq_slab[]"  readonly  style="width:70px;" placeholder="0.00"  class="cost_sq_slab form-control"/></span>     </td> <td>  <span class="input-symbol-euro">  <input type="text" id="sales_amt_sq_ft_'+ dynamic_id +'"  name="sales_amt_sq_ft[]"  style="width:70px;"  placeholder="0.00" class="sales_amt_sq_ft form-control" /></span>     </td>  <td >  <span class="input-symbol-euro">   <input type="text"  id="sales_slab_amt_'+ dynamic_id +'" name="sales_slab_amt[]"  style="width:70px;" placeholder="0.00"  class="sales_slab_amt form-control"/></td> </span>     </td> <td> <input type="text" id="weight_'+ dynamic_id +'" name="weight[]"  class="weight form-control" /> </td>   <td > <span class="input-symbol-euro"><input  type="text" class="total_price form-control" style="width:80px;" readonly value="0.00"  id="total_amt_'+ dynamic_id +'"     name="total_amt[]"/></span> </td>  <td style="text-align:center;"> <button  class="delete btn btn-danger" id="delete_'+ dynamic_id +'" type="button" value="Delete" ><i class="fa fa-trash"></i></button> </td>  </tr> </tbody> <tfoot> <tr> <td style="text-align:right;" colspan="8"><b>Gross Sq.Ft :</b></td> <td > <input type="text" id="overall_gross_'+ dynamic_id +'" name="overall_gross[]"   class="overall_gross form-control" style="width: 60px"  readonly="readonly"  /> </td> <td style="text-align:right;" colspan="3"><b>Net Sq.Ft :</b></td> <td > <input type="text" id="overall_net_'+ dynamic_id +'" name="overall_net[]"  class="overall_net form-control"  style="width: 60px"  readonly="readonly"  /> </td>  <td><span class="input-symbol-euro"><input type="text" id="costpersqft_'+ dynamic_id +'"  name="costpersqft[]"   style="width:70px;" placeholder="0.00"  readonly class="costpersqft form-control" /></span></td>'+
   '<td ><span class="input-symbol-euro"> <input type="text"  id="costperslab_'+ dynamic_id +'" name="costperslab[]"    style="width:70px;" placeholder="0.00" readonly class="costperslab form-control"/></span></td><td class="lc"><input type="text" id="landingpersqft_'+ dynamic_id +'" name="landingpersqft[]"  class="landingpersqft form-control"  style="width: 60px"  readonly="readonly"  /> </td><td class="lc"><input type="text" id="landingperslab_'+ dynamic_id +'" name="landingperslab[]"  class="landingperslab form-control"  style="width: 60px"  readonly="readonly"  /> '+
   '</td><td><span class="input-symbol-euro">  <input type="text" id="salespricepersqft_'+ dynamic_id +'"  name="salespricepersqft[]" readonly  style="width:70px;"  placeholder="0.00" class="salespricepersqft form-control" /></span></td><td ><span class="input-symbol-euro">   <input type="text"  id="salesslabprice_'+ dynamic_id +'" name="salesslabprice[]" readonly  style="width:70px;" placeholder="0.00"  class="salesslabprice form-control"/></td> </span><td ><input type="text" id="overall_weight_'+ dynamic_id +'" name="overall_weight[]"  class="overall_weight form-control"  style="width: 70px"  readonly="readonly"  /></td><td ><span class="input-symbol-euro">    <input type="text" id="Total_'+ dynamic_id +'" name="total[]"   class="b_total form-control"  style="width: 80px" value="0.00"  readonly="readonly"  /></span></td>  <td  style="text-align:center;"><i id="buddle_'+ dynamic_id +'" onclick="removebundle(); " class="btn-danger removebundle fa fa-minus" aria-hidden="true"></i></td>   </tr> </foot></table> <i id="buddle_'+ dynamic_id +'"  style="margin-right:25px;float:right;color:white;"   onclick="addbundle(); " class="btnclr addbundle fa fa-plus" aria-hidden="true"></i>';  
   
   
   
   document.getElementById('content').appendChild(newdiv);
   $("#normalinvoice_"+ dynamic_id).find('.land_th').hide();
   $("#normalinvoice_"+ dynamic_id).find('.landing_cost').hide();
   $("#normalinvoice_"+ dynamic_id).find('.lc').hide();
   dynamic_id++;
   
   }
   function clearField(ele) {
   
    document.getElementsByClassName("product_name").reset();
       ele.value = '';
   }
   $(document).on('click', '.delete', function(){
   
   
   var tid=$(this).closest('table').attr('id');
   localStorage.setItem("delete_table",tid);
   console.log(localStorage.getItem("delete_table"));
   var netheight = $('#'+localStorage.getItem("delete_table")).find('.net_height').attr('id');
   const indexLastDot = netheight.lastIndexOf('_');
   var id = netheight.slice(indexLastDot + 1);
   var rowCount = $(this).closest('tbody').find('tr').length;
   
   if(rowCount>1){
   $(this).closest('tr').remove();
   }
   
   var costpersqft=0;
   $('#'+localStorage.getItem("delete_table")).find('.cost_sq_ft').each(function() {
       var precio = $(this).val();
       if (!isNaN(precio) && precio.length !== 0) {
         costpersqft += parseFloat(precio);
       }
     });
   $('#'+localStorage.getItem("delete_table")).find('.costpersqft').val(costpersqft).trigger('change');
   var cost_sq_slab=0;
   $('#'+localStorage.getItem("delete_table")).find('.cost_sq_slab').each(function() {
       var precio = $(this).val();
       if (!isNaN(precio) && precio.length !== 0) {
         cost_sq_slab += parseFloat(precio);
       }
     });
   $('#'+localStorage.getItem("delete_table")).find('.costperslab').val(cost_sq_slab).trigger('change');
   var sales_amt_sq_ft=0;
   $('#'+localStorage.getItem("delete_table")).find('.sales_amt_sq_ft').each(function() {
       var precio = $(this).val();
       if (!isNaN(precio) && precio.length !== 0) {
         sales_amt_sq_ft += parseFloat(precio);
       }
     });
   $('#'+localStorage.getItem("delete_table")).find('.salespricepersqft').val(sales_amt_sq_ft).trigger('change');
   var sales_slab_amt=0;
   $('#'+localStorage.getItem("delete_table")).find('.sales_slab_amt').each(function() {
       var precio = $(this).val();
       if (!isNaN(precio) && precio.length !== 0) {
         sales_slab_amt += parseFloat(precio);
       }
     });
   $('#'+localStorage.getItem("delete_table")).find('.salesslabprice').val(sales_slab_amt).trigger('change');
   var sum=0;
   $('#'+localStorage.getItem("delete_table")).find('.total_price').each(function() {
   var v=$(this).val();
   sum += parseFloat(v);
   });
   $('#'+localStorage.getItem("delete_table")).find('.b_total').val(sum).trigger('change');
   var sumnet=0;
   
   $('#'+localStorage.getItem("delete_table")).find('.net_sq_ft').each(function() {
   var v=$(this).val();
   if (!isNaN(v) && v.length !== 0) {
         sumnet += parseFloat(v);
       }
   
   });
   $('#'+localStorage.getItem("delete_table")).find('.overall_net').val(sumnet.toFixed(2));
   
   
   var sumgross=0;
   
   $('#'+localStorage.getItem("delete_table")).find('.gross_sq_ft').each(function() {
   var v=$(this).val();
   if (!isNaN(v) && v.length !== 0) {
         sumgross += parseFloat(v);
       }
   
   });
   $('#'+localStorage.getItem("delete_table")).find('.overall_gross').val(sumgross.toFixed(2));
   var total_net=0;
   $('.table').each(function() {
   $(this).find('.net_sq_ft').each(function() {
       var precio = $(this).val();
       if (!isNaN(precio) && precio.length !== 0) {
         total_net += parseFloat(precio);
       }
     });
   
    
   
   
   });
   $('#total_net').val(total_net.toFixed(2)).trigger('change');
   var overall_gs=0;
   $('.table').each(function() {
   $(this).find('.gross_sq_ft').each(function() {
       var precio = $(this).val();
       if (!isNaN(precio) && precio.length !== 0) {
         overall_gs += parseFloat(precio);
       }
     });
   });
   
   $('#total_gross').val(overall_gs).trigger('change');
   var sum_w=0;
   $('.table').each(function() {
   $(this).find('.weight').each(function() {
   
       var precio = $(this).val();
       if (!isNaN(precio) && precio.length !== 0) {
         sum_w += parseFloat(precio);
       }
     });
     });
   $('#'+localStorage.getItem("delete_table")).find('.overall_weight').val(sum_w).trigger('change');
   var total_w=0;
   $('.table').each(function() {
   $(this).find('.overall_weight').each(function() {
       var precio = $(this).val();
       if (!isNaN(precio) && precio.length !== 0) {
         total_w += parseFloat(precio);
       }
     });
   
   });
   $('#total_weight').val(total_w.toFixed(2)).trigger('change');
   var overall_sum=0;
   $('.table').each(function() {
    $(this).find('.b_total').each(function() {
   
   var v=$(this).val();
   overall_sum += parseFloat(v);
   
   });});
   $('#Over_all_Total').val(overall_sum).trigger('change');
   //;
   var rowCount = $('.tbody tr').length;
   //;
   var l = $('#landing_amount').val();
   console.log("Count :"+rowCount);
   var l_amt=l/rowCount;
   const rows = Array.from(document.querySelectorAll('tr.xdc'));
   rows.forEach(row => {
   row.classList.remove('deleted_row');
   });
   $('.normalinvoice tbody').find('tr').each(function(){
   $(this).closest('table').find('.landing_cost').val(0);
   });
   var lc=$(this).closest('table').find('.landing_cost').val();
   
   
   $('.table').each(function() {
    $('.normalinvoice tbody').find('tr').each(function(){
      //$("td.l_cost").remove();
     var tid=$(this).closest('table').attr('id');
   const indexLast = tid.lastIndexOf('_');
   var idt = tid.slice(indexLast + 1);
   var t_amt=   $(this).find('.cost_sq_slab').val();
    var net=   $(this).find('.net_sq_ft').val();
       net = isNaN(net) ? 0 : net;
   console.log("t_amt :"+t_amt);
   var final= parseInt(l_amt)+parseInt(t_amt);
   var l_cost_sqft=(parseInt(l_amt)+parseInt(t_amt))/net;
   console.log(parseInt(l_amt)+"."+parseInt(t_amt)+","+net);
     console.log("final :"+t_amt);
    
    //  $(this).find('.xdc').remove();
       $(this).find('.l_cost').val(l_cost_sqft);
        $(this).find('.l_cost_slab').val(final);
         if(lc != '' && typeof lc !== "undefined"){
       $('.land_th').show();
       $('.landing_cost').show();
        $('.lc').show();
     }
          var lcc=0;
               $('.table').each(function() {
   
   $(this).find('.l_cost').each(function() {
       var precio = $(this).val();
       if (!isNaN(precio) && precio.length !== 0) {
         lcc += parseFloat(precio);
       }
     });
   
   $(this).closest('table').find('.landingpersqft').val(lcc).trigger('change');
               });
   var  lcc2=0;
                $('.table').each(function() {
   
   $(this).find('.l_cost_slab').each(function() {
       var precio = $(this).val();
       if (!isNaN(precio) && precio.length !== 0) {
         lcc2 += parseFloat(precio);
       }
     });
   
   $(this).closest('table').find('.landingperslab').val(lcc2).trigger('change');
               });
               
               
               
   
   });});
   
   gt(id);
   
   
   
   
   
   });
   
    $('#payment_from_modal').on('input',function(e){
   
   var payment=parseFloat($('#payment_from_modal').val());
   var amount_to_pay=parseFloat($('#amount_to_pay').val());
   console.log(payment+"/"+amount_to_pay);
   console.log(parseFloat(amount_to_pay.toFixed(2))-parseFloat(payment.toFixed(2)));
   var value=parseFloat(amount_to_pay.toFixed(2))-parseFloat(payment.toFixed(2));
   $('#balance_modal').val(value.toFixed(2));
   if (isNaN(value)) {
   $('#balance_modal').val("0");
   }
   });
     $('#bank_id').change(function(){
       localStorage.setItem("selected_bank_name",$('#bank_id').val());
   
     });
   
   $('#add_pay_type').submit(function(e){
   e.preventDefault();
     var data = {
       
       
       new_payment_type : $('#new_payment_type').val()
     
     };
     data[csrfName] = csrfHash;
   
     $.ajax({
         type:'POST',
         data: data, 
        dataType:"json",
         url:'<?php echo base_url();?>Cinvoice/add_payment_type',
         success: function(data1, statut) {
    
      var $select = $('select#paytype');
   
           $select.empty();
           console.log(data);
             for(var i = 0; i < data1.length; i++) {
       var option = $('<option/>').attr('value', data1[i].payment_type).text(data1[i].payment_type);
       $select.append(option); // append new options
   }
     $('#new_payment_type').val('');
   
     $("#bodyModal1").html("Payment Added Successfully");
     $('#payment_Type').modal('hide');
     
     $('#paytype').show();
      $('#myModal1').modal('show');
     window.setTimeout(function(){
       $('#payment_Type').modal('hide');
       $('.modal-backdrop').remove();
      $('#myModal1').modal('hide');
   
   }, 2000);
   
    }
     });
   });
   $(document).on('click', '.addbundle', function(){
        $(this).css("display","none");
     $(this).closest('table').find('.removebundle').css("display","block");
   });
   
   $(document).ready(function(){
   
   
   
   var tid=$('.table').closest('table').attr('id');
   const indexLast = tid.lastIndexOf('_');
   var id = tid.slice(indexLast + 1);
   
   
   for (j = 0; j < 6; j++) {
      var $last = $('#addPurchaseItem_1 tr:last');
   
   var num = id+($last.index()+1);
   
   
   
   
    $('#addPurchaseItem_1 tr:last').clone().find('input,select,button').attr('id', function(i, current) {
       return current.replace(/\d+$/, num);
       
   }).end().appendTo('#addPurchaseItem_1');
    $.each($('#normalinvoice_1 > tbody > tr'), function (index, el) {
           $(this).find(".slab_no").val(index + 1); // Simply couse the first "prototype" is not counted in the list                
       })
     
   }
   
   
   
   });

   
   // Employee Insert data
   $('#add_agent_data').submit(function(e) {
    e.preventDefault();
    
    var formData = new FormData($(this)[0]); 
    
    var files = document.getElementById('employee_attachment').files;
    for (var i = 0; i < files.length; i++) {
        formData.append('files[]', files[i]);
    }
    
    $.ajax({
        type: 'POST',
        data: formData, 
        dataType: "json",
        url: '<?php echo base_url();?>Cinvoice/add_agent_info',
        processData: false,  
        contentType: false,  
        success: function(data1, statut) {
            console.log(data1);
            var $select = $('select#emp_id');
            $select.empty();
            for (var i = 0; i < data1.length; i++) {
               var optionText = (data1[i].first_name && data1[i].last_name) ? (data1[i].first_name + ' ' + data1[i].last_name) : (data1[i].first_name || data1[i].last_name || 'Unnamed');
               var option = $('<option/>').attr('value', data1[i].id).text(optionText);
               $select.append(option);
            }

           $('#new_agent').val('');
           $("#bodyModal1").html("Successfully Added Employee");
           $('#add_agent').modal('hide');
           $('#new_agent').show();
           $('#myModal1').modal('show');
           window.setTimeout(function(){
           $('#add_agent').modal('hide');
           $('#myModal1').modal('hide');
           $('.modal-backdrop').remove();
           }, 2500); 
        }
    });
});


// Sales Partner Insert Data
$('#add_salesPartners').submit(function(e) {
    e.preventDefault();
    
    var formData = new FormData($(this)[0]); 
    
    var files = document.getElementById('salesPartner_attachment').files;
    for (var i = 0; i < files.length; i++) {
        formData.append('files[]', files[i]);
    }
    
    $.ajax({
        type: 'POST',
        data: formData, 
        dataType: "json",
        url: '<?php echo base_url();?>Cinvoice/add_salespartner',
        processData: false,  
        contentType: false,  
        success: function(data1, statut) {
            console.log(data1);
            var $select = $('select#emp_id');
            $select.empty();
            for (var i = 0; i < data1.length; i++) {
               var optionText = (data1[i].first_name && data1[i].last_name) ? (data1[i].first_name + ' ' + data1[i].last_name) : (data1[i].first_name || data1[i].last_name || 'Unnamed');
               var option = $('<option/>').attr('value', data1[i].id).text(optionText);
               $select.append(option);
            }

           $('#salesPartners').val('');
           $("#bodyModal1").html("Successfully Added Sales Partner");
           $('#salesPartners').modal('hide');
           $('#salesPartners').show();
           $('#myModal1').modal('show');
           window.setTimeout(function(){
           $('#salesPartners').modal('hide');
           $('#myModal1').modal('hide');
           $('.modal-backdrop').remove();
           }, 2500); 
        }
    });
});

   
   
// $('#add_agent_data').submit(function(e) {
//     e.preventDefault();
//     var formData = $(this).serialize(); 

//     $.ajax({
//         type: 'POST',
//         data: formData, 
//         dataType: "json",
//         url: '<?php echo base_url();?>Cinvoice/add_agent_info',
//         success: function(data1, statut) {
//          console.log(data1);
//             var $select = $('select#emp_id');
//             $select.empty();
//             console.log(data1);
//             for (var i = 0; i < data1.length; i++) {
//                 var option = $('<option/>').attr('value', data1[i].id).text(
//                     data1[i].first_name ? data1[i].first_name + ' ' + data1[i].last_name
//                 );
//                 $select.append(option);
//            }
//            $('#new_agent').val('');
//            $("#bodyModal1").html("Employee Added Successfully");
//            $('#add_agent').modal('hide');
//            $('#new_agent').show();
//            $('#myModal1').modal('show');
//            window.setTimeout(function(){
//            $('#add_agent').modal('hide');
//            $('#myModal1').modal('hide');
//            $('.modal-backdrop').remove();
//            }, 2500);
//         }
//     });
// });

   
   
   
   
   $(document).on('keyup','.normalinvoice tbody tr:last',function (e) {
      // debugger;
   var tid=$(this).closest('table').attr('id');
   const indexLast = tid.lastIndexOf('_');
   var id = tid.slice(indexLast + 1);
   
   
   
    var $last = $('#addPurchaseItem_'+id + ' tr:last');
   
   var num = id+($last.index()+1);
   
   $('#addPurchaseItem_'+id  + ' tr:last').clone().find('datalist,input,select').attr('id', function(i, current) {
       return current.replace(/\d+$/, num);
       
   }).end().appendTo('#addPurchaseItem_'+id );
   
   $.each($('#normalinvoice_'+id  +  '> tbody > tr'), function (index, el) {
           $(this).find(".slab_no").val(index + 1); // Simply couse the first "prototype" is not counted in the list                
       })
   
   var id1= $(this).closest('tr').find('.product_name').attr('id');
   var id_num = id1.substring(id1.indexOf('_') + 1);
   var pdt=$('#'+id1).val();
   console.log(pdt);
   const myArray = pdt.split("-");
   var product_nam=myArray[0];
   var product_model=myArray[1];
   var product_model=myArray[1];
   // var sales_slab_amt =myArray[14];  
   
   
   var data = {
      product_nam:product_nam,
      product_model:product_model,
   
      //sales_slab_amt:sales_slab_amt
   
   };
   data[csrfName] = csrfHash;
   $.ajax({
       type:'POST',
       data: data,
    dataType:"json",
       url:'<?php echo base_url();?>Cinvoice/availability',
       success: function(result, statut) {
           console.log(result);
           if(result.csrfName){
              csrfName = result.csrfName;
              csrfHash = result.csrfHash;
           }
           $("#total_amt_"+ id_num).val(result[0]['price']);
          $("#sales_slab_amt_"+ id_num).val(result[0]['price']);
         $("#SchoolHiddenId_"+ id_num).val(result[0]['product_id']);
           console.log(result);
       }
   });
   
      // debugger;
   
   var sum=0;
     $(this).closest('table').find('.total_price').each(function() {
   var v=$(this).val();
   sum += parseFloat(v);
   
   });
   $(this).closest('table').find('.b_total').val(sum).trigger('change');
   
   
   
   var sum=0;
     $(this).closest('table').find('.weight').each(function() {
   var v=$(this).val();
   sum += parseFloat(v);
   
   });
   $(this).closest('table').find('.overall_weight').val(sum).trigger('change');
   
   
   
   
   var sum=0;
     $(this).closest('table').find('.sales_slab_amt').each(function() {
   var v=$(this).val();
   sum += parseFloat(v);
   
   });
   $(this).closest('table').find('.salesslabprice').val(sum).trigger('change');
   
   
   var sum=0;
     $(this).closest('table').find('.sales_amt_sq_ft').each(function() {
   var v=$(this).val();
   sum += parseFloat(v);
   
   });
   $(this).closest('table').find('.salespricepersqft').val(sum).trigger('change');
   
   
   var sum=0;
     $(this).closest('table').find('.cost_sq_slab').each(function() {
   var v=$(this).val();
   sum += parseFloat(v);
   
   });
   $(this).closest('table').find('.costperslab').val(sum).trigger('change');
   
   
   
   var sum=0;
     $(this).closest('table').find('.cost_sq_ft').each(function() {
   var v=$(this).val();
   sum += parseFloat(v);
   
   });
   $(this).closest('table').find('.costpersqft').val(sum).trigger('change');
   
   
   
   
   var sum=0;
     $(this).closest('table').find('.gross_sq_ft ').each(function() {
   var v=$(this).val();
   sum += parseFloat(v);
   
   });
   $(this).closest('table').find('.overall_gross').val(sum).trigger('change');
   
   var sum=0;
     $(this).closest('table').find('.net_sq_ft').each(function() {
   var v=$(this).val();
   sum += parseFloat(v);
   
   });
   $(this).closest('table').find('.overall_net').val(sum).trigger('change');
   
   
   
   var overall_sum=0;
     $('.table').find('.total_price').each(function() {
    var v=$(this).val();
    overall_sum += parseFloat(v);
   }); 
   $('#Over_all_Total').val(overall_sum.toFixed(2)).trigger('change');
   $('#gtotal').val(overall_sum.toFixed(2)).trigger('change');
   $('#customer_gtotal').val(overall_sum.toFixed(2)).trigger('change');
   
   
   var overall_gs=0;
     $('.table').find('.gross_sq_ft').each(function() {
    var v=$(this).val();
    overall_gs += parseFloat(v);
   }); 
   $('#total_gross').val(overall_gs.toFixed(2)).trigger('change');
   
   
   var total_net=0;
     $('.table').find('.net_sq_ft').each(function() {
    var v=$(this).val();
    total_net += parseFloat(v);
   }); 
   $('#total_net').val(total_net.toFixed(2)).trigger('change');
   
   
   var overall_weight=0;
     $('.table').find('.weight').each(function() {
    var v=$(this).val();
    overall_weight += parseFloat(v);
   }); 
   $('#total_weight').val(overall_weight.toFixed(2)).trigger('change');
   
   
      calculate_ONROWADD();
   
       });
   
   
       function calculate_ONROWADD(){
   
                  var total=$('#Over_all_Total').val();
                  var tax= $('#product_tax').val();
                  var percent='';
                  var hypen='-';
                if(tax.indexOf(hypen) != -1){
                 var field = tax.split('-');
                 var percent = field[1];
              
               }else{
                percent=tax;
                }
                  percent=percent.replace("%","");
                  var answer = (percent / 100) * parseFloat(total);
                  var gtotal = parseFloat(total + answer);//fix
                  console.log("gtotal :" +gtotal);
                  var final_g= $('#final_gtotal').val();
                  var amt=parseFloat(answer)+parseFloat(total);
                  var num = isNaN(parseFloat(amt)) ? 0 : parseFloat(amt)
                  $('#gtotal').val(num.toFixed(2)); 
                  var custo_amt=$('.custocurrency_rate').val(); 
                  console.log("numhere :"+num +"-"+custo_amt);
                  var value=num*custo_amt;
                  var custo_final = isNaN(parseFloat(value)) ? 0 : parseFloat(value)
                  $('#customer_gtotal').val(custo_final.toFixed(2)); 
                  $('#tax_details').val(answer.toFixed(2) +" ( "+tax+" )");
                  var bal_amt=custo_final-$('#amount_paid').val();
                  $('#balance').val(bal_amt.toFixed(2));
                
                }
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   function cal_all(){
   var netheight = $(this).closest('table').find('.net_height').attr('id');
   const indexLastDot = netheight.lastIndexOf('_');
   var id = netheight.slice(indexLastDot + 1);
   var net_width='net_width_'+id;
   var net_height = 'net_height_'+ id;
   var netwidth=$('#'+net_width).val();
   var netheight=$('#'+net_height).val();
   var netresult=parseInt(netwidth) * parseInt(netheight);
   netresult=netresult/144;
   netresult = isNaN(netresult) ? 0 : netresult;
   var nresult=netresult.toFixed(2);
   $('#'+'net_sq_ft_'+id).val(netresult.toFixed(2));
   var cost_sqft=$('#cost_sq_ft_'+id).val();
   var tid=$(this).closest('table').attr('id');
   const indexLast = tid.lastIndexOf('_');
   var idt = tid.slice(indexLast + 1);
   var sales_sqft=cost_sqft *nresult;
   var x = $('#slab_no_'+id).val();
   var sales_slab_price=cost_sqft *nresult*x;
   
   console.log(parseInt(cost_sqft) +"*"+parseInt(nresult)+"*"+idt);
   $('#'+'sales_slab_amt_'+id).val(sales_slab_price.toFixed(2));
   $(this).closest('tr').find('.total_price').val(sales_slab_price.toFixed(2));
   sales_sqft = isNaN(sales_sqft) ? 0 : sales_sqft;
   $('#'+'sales_amt_sq_ft_'+id).val(sales_sqft.toFixed(2));
   $('.table').each(function() {
   
     var sum=0;
   
    $(this).closest('table').find('.total_price').each(function() {
   var v=$(this).val();
   sum += parseFloat(v);
   
   });
   $('#Total_'+idt).val(sum).trigger('change');
   var total_net=0;
   $('.table').each(function() {
   $(this).find('.net_sq_ft').each(function() {
       var precio = $(this).val();
       if (!isNaN(precio) && precio.length !== 0) {
         total_net += parseFloat(precio);
       }
     });
   
    
   
   
   });
   $('#total_net').val(total_net.toFixed(2)).trigger('change');
   var costpersqft=0;
   $(this).find('.cost_sq_ft').each(function() {
       var precio = $(this).val();
       if (!isNaN(precio) && precio.length !== 0) {
         costpersqft += parseFloat(precio);
       }
     });
   $('#costpersqft_'+idt).val(costpersqft).trigger('change');
   var cost_sq_slab=0;
   $(this).find('.cost_sq_slab').each(function() {
       var precio = $(this).val();
       if (!isNaN(precio) && precio.length !== 0) {
         cost_sq_slab += parseFloat(precio);
       }
     });
   $('#costperslab_'+idt).val(cost_sq_slab).trigger('change');
   var sales_amt_sq_ft=0;
   $(this).find('.sales_amt_sq_ft').each(function() {
       var precio = $(this).val();
       if (!isNaN(precio) && precio.length !== 0) {
         sales_amt_sq_ft += parseFloat(precio);
       }
     });
   $('#salespricepersqft_'+idt).val(sales_amt_sq_ft).trigger('change');
   var sales_slab_amt=0;
   $(this).find('.sales_slab_amt').each(function() {
       var precio = $(this).val();
       if (!isNaN(precio) && precio.length !== 0) {
         sales_slab_amt += parseFloat(precio);
       }
     });
   $('#salesslabprice_'+idt).val(sales_slab_amt).trigger('change');
   var overall_gs=0;
   $('.table').each(function() {
   $(this).find('.gross_sq_ft').each(function() {
       var precio = $(this).val();
       if (!isNaN(precio) && precio.length !== 0) {
         overall_gs += parseFloat(precio);
       }
     });
   });
   
   $('#total_gross').val(overall_gs).trigger('change');
   
   var overall_sum=0;
    $('.table').find('.b_total').each(function() {
   var v=$(this).val();
   overall_sum += parseFloat(v);
   
   });
   $('#Over_all_Total').val(overall_sum.toFixed(2)).trigger('change');
   
   
   
   
   });
   
   
   
   gt(id);
   }
   $(document).on('click', '.removebundle', function(){
   
   
   var tid=$(this).closest('table').attr('id');
   localStorage.setItem("delete_table",tid);
   console.log(localStorage.getItem("delete_table"));
   var remove_id=$(this).closest('table').attr('id');
   $('#'+remove_id).remove();
     var sum=0;
      $('#'+localStorage.getItem("delete_table")).find('.total_price').each(function() {
   var v=$(this).val();
    sum += parseFloat(v);
   });
    $('#'+localStorage.getItem("delete_table")).find('.b_total').val(sum).trigger('change');
     var sumnet=0;
   
     $('#'+localStorage.getItem("delete_table")).find('.net_sq_ft').each(function() {
   var v=$(this).val();
   if (!isNaN(v) && v.length !== 0) {
            sumnet += parseFloat(v);
          }
   
   });
    $('#'+localStorage.getItem("delete_table")).find('.overall_net').val(sumnet.toFixed(2));
   
   
      var sumgross=0;
   
      $('#'+localStorage.getItem("delete_table")).find('.gross_sq_ft').each(function() {
   var v=$(this).val();
   if (!isNaN(v) && v.length !== 0) {
            sumgross += parseFloat(v);
          }
   
   });
    $('#'+localStorage.getItem("delete_table")).find('.overall_gross').val(sumgross.toFixed(2));
   var total_net=0;
   $('.table').each(function() {
      $(this).find('.net_sq_ft').each(function() {
          var precio = $(this).val();
          if (!isNaN(precio) && precio.length !== 0) {
            total_net += parseFloat(precio);
          }
        });
   
   
   
    });
   $('#total_net').val(total_net.toFixed(2)).trigger('change');
    var overall_gs=0;
   $('.table').each(function() {
      $(this).find('.gross_sq_ft').each(function() {
          var precio = $(this).val();
          if (!isNaN(precio) && precio.length !== 0) {
            overall_gs += parseFloat(precio);
          }
        });
   });
   
   $('#total_gross').val(overall_gs).trigger('change');
    var sum_w=0;
    $('#'+localStorage.getItem("delete_table")).find('.weight').each(function() {
          var precio = $(this).val();
          if (!isNaN(precio) && precio.length !== 0) {
            sum_w += parseFloat(precio);
          }
        });
    $('#'+localStorage.getItem("delete_table")).find('.overall_weight').val(sum_w).trigger('change');
   var total_w=0;
   $('.table').each(function() {
      $(this).find('.weight').each(function() {
          var precio = $(this).val();
          if (!isNaN(precio) && precio.length !== 0) {
            total_w += parseFloat(precio);
          }
        });
   
    });
   $('#total_weight').val(total_w.toFixed(2)).trigger('change');
   var overall_sum=0;
       $('.table').find('.total_price').each(function() {
   var v=$(this).val();
    overall_sum += parseFloat(v);
   
   });
   $('#Over_all_Total').val(overall_sum.toFixed(2)).trigger('change');
   var rowCount = $('.tbody tr').length;
   //;
   var l = $('#landing_amount').val();
   console.log("Count :"+rowCount);
   var l_amt=l/rowCount;
   const rows = Array.from(document.querySelectorAll('tr.xdc'));
   rows.forEach(row => {
   row.classList.remove('deleted_row');
   });
   $('.normalinvoice tbody').find('tr').each(function(){
   $(this).closest('table').find('.landing_cost').val(0);
   });
   var lc=$(this).closest('table').find('.landing_cost').val();
   
   
   $('.table').each(function() {
    $('.normalinvoice tbody').find('tr').each(function(){
      //$("td.l_cost").remove();
     var tid=$(this).closest('table').attr('id');
   const indexLast = tid.lastIndexOf('_');
   var idt = tid.slice(indexLast + 1);
   var t_amt=   $(this).find('.cost_sq_slab').val();
    var net=   $(this).find('.net_sq_ft').val();
       net = isNaN(net) ? 0 : net;
   console.log("t_amt :"+t_amt);
   var final= parseInt(l_amt)+parseInt(t_amt);
   var l_cost_sqft=(parseInt(l_amt)+parseInt(t_amt))/net;
   console.log(parseInt(l_amt)+"."+parseInt(t_amt)+","+net);
     console.log("final :"+t_amt);
    
    //  $(this).find('.xdc').remove();
       $(this).find('.l_cost').val(l_cost_sqft);
        $(this).find('.l_cost_slab').val(final);
         if(lc != '' && typeof lc !== "undefined"){
       $('.land_th').show();
       $('.landing_cost').show();
        $('.lc').show();
     }
          var lcc=0;
               $('.table').each(function() {
   
   $(this).find('.l_cost').each(function() {
       var precio = $(this).val();
       if (!isNaN(precio) && precio.length !== 0) {
         lcc += parseFloat(precio);
       }
     });
   
   $(this).closest('table').find('.landingpersqft').val(lcc).trigger('change');
               });
   var  lcc2=0;
                $('.table').each(function() {
   
   $(this).find('.l_cost_slab').each(function() {
       var precio = $(this).val();
       if (!isNaN(precio) && precio.length !== 0) {
         lcc2 += parseFloat(precio);
       }
     });
   
   $(this).closest('table').find('.landingperslab').val(lcc2).trigger('change');
               });
               
               
               
   
   });});
   gt(id);
   
   });
   $(document).ready(function(){
   $('.removebundle').hide();
   $('#amt').hide();
   $('#bal').hide();
   });
   $('#paypls').on('click', function (e) {
   $('#amount_to_pay').val($('#customer_gtotal').val());
   $('#payment_modal').modal('show');
   
   e.preventDefault();
   
   });
   $('#landing_cost').on('click', function (e) {
   var bla = $('#invoice').val();
   
   //Set
   $('#dum_invoice').val(bla);
   $('#landing_modal').modal('show');
   
   e.preventDefault();
   
   });
   
   
   
   
   
   
   
   
   
   
   
   
   $('#insert_product').submit(function (event) {
    event.preventDefault();
   if($('#product_name').val()!='' && $('#product_model').val()!='' && $('#sell_price').val()!='' && $('#quantity').val()!='' && $('#supplier_id').val()!='' && $('#product_sub_category').val()!='')
   {
   
   
   var dataString = {
       dataString : $("#insert_product").serialize()
   };
   dataString[csrfName] = csrfHash;
   $.ajax({
       type:"POST",
       dataType:"json",
       url:"<?php echo base_url(); ?>Cproduct/insert_product",
       data:$("#insert_product").serialize(),
       success:function (data1) {
       console.log(data1);
   
       $("#magicHouses").empty();
       for (var i in data1) {
          $("<option/>").html(data1[i].product_name +'-'+ data1[i].product_model).appendTo("#magicHouses");
       }
     
      $("#magicHouses").focus();
   
     $("#bodyModal1").html("Product Added Successfully");
      
     $('#myModal1').modal('show');
   
     window.setTimeout(function(){
       $('#product_info').modal('hide');
       $('.modal-backdrop').remove();
      $('#myModal1').modal('hide');
   }, 2000);
   }
   });
   }
   });
   
   
   
   
   
   
   
   
   
   
   $('#land_form').submit(function (event) {
    event.preventDefault();
   
   var dataString = {
       dataString : $("#land_form").serialize()
   };
   dataString[csrfName] = csrfHash;
   $.ajax({
       type:"POST",
       dataType:"json",
       url:"<?php echo base_url(); ?>Cinvoice/service_invoice_details",
       data:$("#land_form").serialize(),
       success:function (data1) {
           var rowCount = $('.tbody tr').length;
   
   var l = $('#landing_amount').val();
   console.log("Count :"+rowCount);
   var l_amt=l/rowCount;
   const rows = Array.from(document.querySelectorAll('tr.xdc'));
   rows.forEach(row => {
   row.classList.remove('deleted_row');
   });
   $('.normalinvoice tbody').find('tr').each(function(){
   $(this).closest('table').find('.landing_cost').val(0);
   });
   $('.normalinvoice tbody').find('tr').each(function(){
      //$("td.l_cost").remove();
     var tid=$(this).closest('table').attr('id');
   const indexLast = tid.lastIndexOf('_');
   var idt = tid.slice(indexLast + 1);
   var t_amt=   $(this).find('.cost_sq_slab').val();
    var net=   $(this).find('.net_sq_ft').val();
       net = isNaN(net) ? 0 : net;
   console.log("t_amt :"+t_amt);
   var final= parseInt(l_amt)+parseInt(t_amt);
   var l_cost_sqft=(parseInt(l_amt)+parseInt(t_amt))/net;
   console.log(parseInt(l_amt)+"."+parseInt(t_amt)+","+net);
     console.log("final :"+t_amt);
      $(this).find('.xdc').remove();
       $(this).find('td').eq(14).after('<td class="xdc"><span class="input-symbol-euro"><input type="text" readonly style="width:80px;" name="l_cost[]" value="'+l_cost_sqft+'" class="form-control l_cost"></span></td><td class="xdc"><span class="input-symbol-euro"><input type="text" style="width:80px;" readonly name="l_cost_slab[]" value="'+final+'" class="form-control l_cost_slab"></span></td>');
       $('.land_th').show();
       $('.landing_cost').show();
        $('.lc').show();
   
          var lcc=0;
               $('.table').each(function() {
                  
   $(this).find('.l_cost').each(function() {
       var precio = $(this).val();
       if (!isNaN(precio) && precio.length !== 0) {
         lcc += parseFloat(precio);
       }
     });
   
   $(this).closest('table').find('.landingpersqft').val(lcc).trigger('change');
               });
   
   
    var lcc2=0;
    $('.table').each(function() {
   $(this).find('.l_cost_slab').each(function() {
       var precio = $(this).val();
       if (!isNaN(precio) && precio.length !== 0) {
         lcc2 += parseFloat(precio);
       }
     });
       var b2= $(this).closest('table').find('.landingperslab').val();
    if(b2==''){
       b2==0;
   }
   b2 = isNaN(b2) ? 0 : b2;
   var f2=parseInt(b2)+parseInt(lcc2);
   $(this).closest('table').find('.landingperslab').val(f2).trigger('change');
    });
   });
                $("#bodyModal1").html("Landing Cost Added Successfully");
      
      
     $('#myModal1').modal('show');
   $('#landing_modal').modal('hide');
    
     window.setTimeout(function(){
       $('#product_info').modal('hide');
       $('.modal-backdrop').remove();
      $('#myModal1').modal('hide');
   }, 2000);
   
   }
   });
   
     
   
   });
   
   function add_cost(){
   
   
   // });
   
   
   
   
   }
   // function lsx(){
   //               var lcc=0;
   //  $('.table').each(function() {
   //     $(this).find('.l_cost').each(function() {
   //         var precio = $(this).val();
   //         if (!isNaN(precio) && precio.length !== 0) {
   //           lcc += parseFloat(precio);
   //         }
   //       });
   
    
   
   
   //   });
   
   
   // }
   
   
   $('#add_payment_info').submit(function (event) {    
   var dataString = {
      dataString : $("#add_payment_info").serialize()
   };
   dataString[csrfName] = csrfHash;
   
   $.ajax({
      type:"POST",
      dataType:"json",
      url:"<?php echo base_url(); ?>Cinvoice/add_payment_info",
      data:$("#add_payment_info").serialize(),
   
      success:function (data) {
   $('.amt').show();
   
   $('#payment_modal').modal('hide');
   $("#bodyModal1").html("Payment Successfully Completed");
      $('#myModal1').modal('show');
   
   window.setTimeout(function(){
       $('#myModal1').modal('hide');
   },2500);
   
   var dataString = {
      dataString : $("#histroy").serialize()
   
   };
   dataString[csrfName] = csrfHash;
   
   $.ajax({
      type:"POST",
      dataType:"json",
      url:"<?php echo base_url(); ?>Cinvoice/payment_history",
      data:$("#histroy").serialize(),
   
      success:function (data) {
       console.log(data);
       var gt=$('#customer_gtotal').val();
       var amtpd=parseFloat(data.amt_paid).toFixed(2);
       console.log(data);
       var bal= $('#customer_gtotal').val() - amtpd;
   $('#balance').val(bal.toFixed(2));
   
   if(amtpd){
   $('#amount_paid').val(amtpd);
   }else{
   $('#amount_paid').val("0.00"); 
   }
   
   
   
   var t_rate=$('.custocurrency_rate').val();
   document.getElementById("paid_convert").value=
   (amtpd /t_rate ).toFixed(2);
   document.getElementById("bal_convert").value=
   (bal /t_rate ).toFixed(2);
   
     }
   });
     $('#add_payment_info')[0].reset();
     }
   
   });
   event.preventDefault();
   });
   
   
   $('#add_bank').submit(function (event) {
   
      
   var dataString = {
      dataString : $("#add_bank").serialize()
   
   };
   dataString[csrfName] = csrfHash;
   
   $.ajax({
      type:"POST",
      dataType:"json",
      url:"<?php echo base_url(); ?>Csettings/add_new_bank",
      data:$("#add_bank").serialize(),
   
      success: function (data) {
       $.each(data, function (i, item) {
          
           result = '<option value=' + data[i].bank_name + '>' + data[i].bank_name + '</option>';
       });
     
       $('.bankpayment').selectmenu(); 
       $('.bankpayment').append(result).selectmenu('refresh',true);
      $("#bodyModal1").html("Bank Added Successfully");
      $('#myModal3').modal('hide');
      $('#add_bank_info').modal('hide');
      $('#bank').show();
       $('#myModal1').modal('show');
      window.setTimeout(function(){
     
       $('#myModal5').modal('hide');
       $('#myModal1').modal('hide');
   
    }, 2000);
    
     }
   
   });
   event.preventDefault();
   });
   
   
   
     $(document).ready(function () {
     
     $('#bank').selectize({
         sortField: 'text'
     });
   });
   
   var isChange;
   $("input[type='text'], textarea").keyup(function () {
   
   isChange = true;
   
   });
   
   
   $(document).ready(function () {
   
   $('#openBtn').click(function () {
   $('#payment_modal').modal({
       show: true
   })
   });
   
   $(document).on('show.bs.modal', '.modal', function (event) {
       var zIndex = 1040 + (10 * $('.modal:visible').length);
       $(this).css('z-index', zIndex);
       setTimeout(function() {
           $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack');
       }, 0);
   });
   
   
   });
</script>
<style>
   .ui-selectmenu-text{
   display:none;
   }
</style>
<script>
   $('#tax_dropdown').on('change', function() {
     if ( this.value == '2')
       $("#tax").show();     
     else
       $("#tax").hide();
   }).trigger("change");
   $('#add_pay_terms').submit(function(e){
       e.preventDefault();
         var data = {
           new_payment_terms : $('#new_payment_terms').val()
         };
         data[csrfName] = csrfHash;
         $.ajax({
             type:'POST',
             data: data,
            dataType:"json",
             url:'<?php echo base_url();?>Cpurchase/add_payment_terms',
             success: function(data1, statut) {
       
          var $select = $('select#terms');
               $select.empty();
               console.log(data);
                 for(var i = 0; i < data1.length; i++) {
           var option = $('<option/>').attr('value', data1[i].payment_terms).text(data1[i].payment_terms);
           $select.append(option); // append new options
       }
       $('#new_payment_terms').val('');
         $("#bodyModal1").html("Payment Terms Added Successfully");
         $('#payment_type').modal('hide');
         $('#terms').show();
          $('#myModal1').modal('show');
         window.setTimeout(function(){
           $('#payment_type_new').modal('hide');
          $('#myModal1').modal('hide');
           $('.modal-backdrop').remove();
       }, 2500);
        }
         });
     });
   
   
   $(document).on('keyup', '.weight', function(){
   var weight=0;
        $(this).closest('table').find('.weight').each(function() {
   var v=$(this).val();
    if (!isNaN(v) && v.length !== 0) {
             weight += parseFloat(v);
           }
   });
    $(this).closest('table').find('.overall_weight').val(weight.toFixed(2));
   var total_weight=0;
    $('.table').each(function() {
       $(this).find('.weight').each(function() {
           var precio = $(this).val();
           if (!isNaN(precio) && precio.length !== 0) {
             total_weight += parseFloat(precio);
           }
         });
   
        
   
   
     });
   $('#total_weight').val(total_weight.toFixed(2)).trigger('change');
   
   });
   $(document).on('keyup', '.net_height,.net_width', function(){
     
   var tid=$(this).closest('table').attr('id');
   const indexLast1 = tid.lastIndexOf('_');
   var idt = tid.slice(indexLast1 + 1);
    var netheight = $(this).attr('id');
   const indexLastDot = netheight.lastIndexOf('_');
   var id = netheight.slice(indexLastDot + 1);
   var net_width='net_width_'+id;
   var net_height = 'net_height_'+ id;
   var netwidth=$('#'+net_width).val();
   var netheight=$('#'+net_height).val();
   var netresult=parseInt(netwidth) * parseInt(netheight);
   netresult=netresult/144;
   netresult = isNaN(netresult) ? 0 : netresult;
   var nresult=netresult.toFixed(2);
   $('#'+'net_sq_ft_'+id).val(netresult.toFixed(2));
   var sales_slab_price=$('#sales_amt_sq_ft_'+id).val();
   var tid=$(this).closest('table').attr('id');
   const indexLast = tid.lastIndexOf('_');
   var idt = tid.slice(indexLast + 1);
   var sales_amt_sq_ft=sales_slab_price * nresult;
   
   sales_amt_sq_ft = isNaN(sales_amt_sq_ft) ? 0 : sales_amt_sq_ft;
   $('#'+'sales_slab_amt_'+id).val(sales_amt_sq_ft.toFixed(2));
   $('#'+'total_amt_'+id).val(sales_amt_sq_ft.toFixed(2));
    var sumnet=0;
    $(this).closest('table').find('.net_sq_ft').each(function() {
   var v=$(this).val();
    if (!isNaN(v) && v.length !== 0) {
             sumnet += parseFloat(v);
           }
   
   });
   $('#overall_net_'+idt).val(sumnet.toFixed(2));
   var total_net=0;
    $('.table').each(function() {
       $(this).find('.net_sq_ft').each(function() {
           var precio = $(this).val();
           if (!isNaN(precio) && precio.length !== 0) {
             total_net += parseFloat(precio);
           }
         });
   
        
   
   
     });
   $('#total_net').val(total_net.toFixed(2)).trigger('change');
   
   
     var sum=0;
   
        $(this).closest('table').find('.total_price').each(function() {
   var v=$(this).val();
     sum += parseFloat(v);
   
   });
   
   var overall_sum=0;
    $('.table').each(function() {
       $(this).find('.total_price').each(function() {
           var precio = $(this).val();
           if (!isNaN(precio) && precio.length !== 0) {
             overall_sum += parseFloat(precio);
           }
         });
   
        
   
   
     });
   
   $('#Over_all_Total').val(overall_sum.toFixed(2)).trigger('change');
   $('#Total_'+idt).val(sum);
   var total_net=0;
    $('.table').each(function() {
       $(this).find('.sales_amt_sq_ft').each(function() {
           var precio = $(this).val();
           if (!isNaN(precio) && precio.length !== 0) {
             total_net += parseFloat(precio);
           }
         });
   
        
   
   
     });
    
   $('#salespricepersqft_'+idt).val(total_net.toFixed(2)).trigger('change');
   calculate();
   });
   
   $(document).on('input', '.gross_height,.gross_width', function(){
   
    var netheight = $(this).attr('id');
   const indexLastDot = netheight.lastIndexOf('_');
   var id = netheight.slice(indexLastDot + 1);
   var net_width='gross_width_'+id;
   var net_height = 'gross_height_'+ id;
   var tid=$(this).closest('table').attr('id');
   const indexLast = tid.lastIndexOf('_');
   var idt = tid.slice(indexLast + 1);
   var netwidth=$('#'+net_width).val();
   var netheight=$('#'+net_height).val();
   var netresult=parseFloat(netwidth) * parseFloat(netheight);
   netresult=netresult/144;
   netresult = isNaN(netresult) ? 0 : netresult;
   var nresult=netresult.toFixed(2);
   
   $('#'+'gross_sq_ft_'+id).val(netresult.toFixed(2));
   
       var sumgross=0;
   
        $(this).closest('table').find('.gross_sq_ft').each(function() {
   var v=$(this).val();
    if (!isNaN(v) && v.length !== 0) {
             sumgross += parseFloat(v);
           }
   
   });
   $('#overall_gross_'+idt).val(sumgross.toFixed(2));
      
   
   var overall_gs=0;
    $('.table').each(function() {
       $(this).find('.gross_sq_ft').each(function() {
           var precio = $(this).val();
           if (!isNaN(precio) && precio.length !== 0) {
             overall_gs += parseFloat(precio);
           }
         });
    });
   
   $('#total_gross').val(overall_gs).trigger('change');
   
   gt(id);
   
   });
   $(document).on("input change", ".total_price", function(e){
   
   var netheight = $(this).attr('id');
   const indexLastDot = netheight.lastIndexOf('_');
   var id = netheight.slice(indexLastDot + 1);
   var net_width='net_width_'+id;
   var net_height = 'net_height_'+ id;
   var netwidth=$('#'+net_width).val();
   var netheight=$('#'+net_height).val();
   var netresult=parseInt(netwidth) * parseInt(netheight);
   netresult=netresult/144;
   netresult = isNaN(netresult) ? 0 : netresult;
   var nresult=netresult.toFixed(2);
   $('#'+'net_sq_ft_'+id).val(netresult.toFixed(2));
   var cost_sqft=$('#cost_sq_ft_'+id).val();
   var tid=$(this).closest('table').attr('id');
   const indexLast = tid.lastIndexOf('_');
   var idt = tid.slice(indexLast + 1);
   var sales_sqft=cost_sqft *nresult;
   var x = $('#slab_no_'+id).val();
   var sales_slab_price=cost_sqft *nresult*x;
   
   console.log(parseInt(cost_sqft) +"*"+parseInt(nresult)+"*"+idt);
   $('#'+'sales_slab_amt_'+id).val(sales_slab_price.toFixed(2));
   $(this).closest('tr').find('.total_price').val(sales_slab_price.toFixed(2));
   sales_sqft = isNaN(sales_sqft) ? 0 : sales_sqft;
   $('#'+'sales_amt_sq_ft_'+id).val(sales_sqft.toFixed(2));
       var sum_net=0;
   
         $(this).closest('table').find('.net_sq_ft').each(function() {
           var v=$(this).val();
          
       sum_net += parseFloat(v);
       
       sum_net = isNaN(sum_net) ? 0 : sum_net;
      
   });
   $('#overall_net_'+idt).val(sum_net.toFixed(2));
       var sum_gross=0;
       
       $(this).closest('table').find('.gross_sq_ft').each(function() {
           var v=$(this).val();
          
       sum_gross += parseFloat(v);
        
         
       sum_gross = isNaN(sum_gross) ? 0 : sum_gross;
       
   });
   $('#overall_gross_'+idt).val(sum_gross.toFixed(2));
   var total_net=0;
    $('.table').each(function() {
       $(this).find('.net_sq_ft').each(function() {
           var precio = $(this).val();
           if (!isNaN(precio) && precio.length !== 0) {
             total_net += parseFloat(precio);
           }
         });
   
        
   
   
     });
   $('#total_net').val(total_net.toFixed(2)).trigger('change');
     var overall_gs=0;
    $('.table').each(function() {
       $(this).find('.gross_sq_ft').each(function() {
           var precio = $(this).val();
           if (!isNaN(precio) && precio.length !== 0) {
             overall_gs += parseFloat(precio);
           }
         });
    });
   
   $('#total_gross').val(overall_gs).trigger('change');
     var sum=0;
   
        $(this).closest('table').find('.total_price').each(function() {
   var v=$(this).val();
     sum += parseFloat(v);
   
   });
   
   var overall_sum=0;
    $('.table').each(function() {
       $(this).find('.total_price').each(function() {
           var precio = $(this).val();
           if (!isNaN(precio) && precio.length !== 0) {
             overall_sum += parseFloat(precio);
           }
         });
   
   
   calculate();
     });
   
   
   $('#Over_all_Total').val(overall_sum.toFixed(2)).trigger('change');
   $('#Total_'+idt).val(sum);
   });
   
   $('#Total').on('change textInput input', function (e) {
       calculate();
   });
   
   $('.custocurrency_rate').on('change textInput input', function (e) {
       calculate();
   });
   
   $(document).on('change select input','.product_name', function (e) {
   var netheight = $(this).attr('id');
   const indexLastDot = netheight.lastIndexOf('_');
   var id = netheight.slice(indexLastDot + 1);
   var net_width='net_width_'+id;
   var net_height = 'net_height_'+ id;
   var netwidth=$('#'+net_width).val();
   var netheight=$('#'+net_height).val();
   var netresult=parseInt(netwidth) * parseInt(netheight);
   netresult=netresult/144;
   netresult = isNaN(netresult) ? 0 : netresult;
   var nresult=netresult.toFixed(2);
   $('#'+'net_sq_ft_'+id).val(netresult.toFixed(2));
   var cost_sqft=$('#cost_sq_ft_'+id).val();
   var tid=$(this).closest('table').attr('id');
   const indexLast = tid.lastIndexOf('_');
   var idt = tid.slice(indexLast + 1);
   var sales_slab_price=$('#sales_slab_amt_'+id).val();
   var tid=$(this).closest('table').attr('id');
   
   var sales_amt_sq_ft=sales_slab_price / nresult;
   
   sales_amt_sq_ft = isNaN(sales_amt_sq_ft) ? 0 : sales_amt_sq_ft;
   $('#'+'sales_amt_sq_ft_'+id).val(sales_amt_sq_ft.toFixed(2));
   $('#'+'total_amt_'+id).val(sales_amt_sq_ft.toFixed(2));
   var costpersqft=0;
       $(this).closest('table').find('.cost_sq_ft').each(function() {
           var precio = $(this).val();
           if (!isNaN(precio) && precio.length !== 0) {
             costpersqft += parseFloat(precio);
           }
         });
   $('#costpersqft_'+idt).val(costpersqft).trigger('change');
     var cost_sq_slab=0;
     $(this).closest('table').find('.cost_sq_slab').each(function() {
           var precio = $(this).val();
           if (!isNaN(precio) && precio.length !== 0) {
             cost_sq_slab += parseFloat(precio);
           }
         });
   $('#costperslab_'+idt).val(cost_sq_slab).trigger('change');
     var sales_amt_sq_ft=0;
        $(this).closest('table').find('.sales_amt_sq_ft').each(function() {
           var precio = $(this).val();
           if (!isNaN(precio) && precio.length !== 0) {
             sales_amt_sq_ft += parseFloat(precio);
           }
         });
   $('#salespricepersqft_'+idt).val(sales_amt_sq_ft).trigger('change');
     var sales_slab_amt=0;
      $(this).closest('table').find('.sales_slab_amt').each(function() {
           var precio = $(this).val();
           if (!isNaN(precio) && precio.length !== 0) {
             sales_slab_amt += parseFloat(precio);
           }
         });
   $('#salesslabprice_'+idt).val(sales_slab_amt).trigger('change');
    var sumnet=0;
   
        $(this).closest('table').find('.net_sq_ft').each(function() {
   var v=$(this).val();
    if (!isNaN(v) && v.length !== 0) {
             sumnet += parseFloat(v);
           }
   
   });
   $('#overall_net_'+idt).val(sumnet.toFixed(2));
       var sumgross=0;
   
        $(this).closest('table').find('.gross_sq_ft').each(function() {
   var v=$(this).val();
    if (!isNaN(v) && v.length !== 0) {
             sumgross += parseFloat(v);
           }
   
   });
   $('#overall_gross_'+idt).val(sumgross.toFixed(2));
   var total_net=0;
    $('.table').each(function() {
       $(this).find('.net_sq_ft').each(function() {
           var precio = $(this).val();
           if (!isNaN(precio) && precio.length !== 0) {
             total_net += parseFloat(precio);
           }
         });
   
   
     });
   $('#total_net').val(total_net.toFixed(2)).trigger('change');
     var overall_gs=0;
    $('.table').each(function() {
       $(this).find('.gross_sq_ft').each(function() {
           var precio = $(this).val();
           if (!isNaN(precio) && precio.length !== 0) {
             overall_gs += parseFloat(precio);
           }
         });
    });
   
   $('#total_gross').val(overall_gs).trigger('change');
   
   
   var overall_sum=0;
    $('.table').each(function() {
       $(this).find('.total_price').each(function() {
           var precio = $(this).val();
           if (!isNaN(precio) && precio.length !== 0) {
             overall_sum += parseFloat(precio);
           }
         });
   
   
     });
   
   
   $('#Over_all_Total').val(overall_sum.toFixed(2)).trigger('change');
     var sum=0;
   
        $(this).closest('table').find('.total_price').each(function() {
   var v=$(this).val();
     sum += parseFloat(v);
   
   });
   $('#Total_'+idt).val(sum);
   
   
   gt(id);
      var id= $(this).attr('id');
     var id_num = id.substring(id.indexOf('_') + 1);
      var pdt=$('#'+id).val();
      console.log(pdt);
      const myArray = pdt.split("-");
      var product_nam=myArray[0];
      var product_model=myArray[1];
     var data = {
          product_nam:product_nam,
          product_model:product_model
       };
       data[csrfName] = csrfHash;
       $.ajax({
           type:'POST',
           data: data,
        dataType:"json",
           url:'<?php echo base_url();?>Cinvoice/availability',
           success: function(result, statut) {
               console.log(result);
               if(result.csrfName){
                  csrfName = result.csrfName;
                  csrfHash = result.csrfHash;
               }
             $("#total_amt_"+ id_num).val(result[0]['price']);
              $("#sales_slab_amt_"+ id_num).val(result[0]['price']);
             $("#SchoolHiddenId_"+ id_num).val(result[0]['product_id']);
               console.log(result);
           }
       });
   });
   
   
     $(document).on('change','#download_select', function (e) {
   var selected_option=$(this).val();
   var text = $('#invoice_hdn1').val().toString().replace('"', '');
   
   if(selected_option=='Invoice'){
   
    var popout = window.open("<?php  echo base_url(); ?>Cinvoice/invoice_inserted_data/"+text);
   }else{
       
     var popout = window.open("<?php  echo base_url(); ?>Cinvoice/packing_list_details_data/"+text);
   }
   
   });
     $(document).on('change','#print_select', function (e) {
   var selected_option=$(this).val();
   var text = $('#invoice_hdn1').val().toString().replace('"', '');
   if(selected_option=='Invoice'){
    var popout = window.open("<?php  echo base_url(); ?>Cinvoice/invoice_inserted_data_print/"+text);
   }else{
      var popout = window.open("<?php  echo base_url(); ?>Cinvoice/packing_list_details_data_print/"+text);
   }
   
   });
   $(document).on('click', '.delete_provider', function(){
       var tid=$(this).closest('table').attr('id');
   localStorage.setItem("delete_table",tid);
   console.log(localStorage.getItem("delete_table"));
    var netheight = $('#'+localStorage.getItem("delete_table")).find('.sp').attr('id');
    const indexLastDot = netheight.lastIndexOf('_');
   var id = netheight.slice(indexLastDot + 1);
   var rowCount = $(this).closest('tbody').find('tr').length;
   
   if(rowCount>1){
   $(this).closest('tr').remove();
   }
      var sump=0;
       $('#'+localStorage.getItem("delete_table")).find('.sp_total').each(function() {
   var v=$(this).val();
    if (!isNaN(v) && v.length !== 0) {
     sump += parseFloat(v);
    }
   });
     $('#'+localStorage.getItem("delete_table")).find('#landing_amount').val(sump).trigger('change');
       
       
   });
   
   
                 $(document).on('keyup', '.serviceprovider > tbody > tr:last-child', function (e) {
   var tid=$(this).closest('table').attr('id');
   const indexLast = tid.lastIndexOf('_');
   var id = tid.slice(indexLast + 1);
   
     var $last = $('#service_pro tr:last');
       var num = ($last.index()+1);
       $('#service_pro tr:last').clone().find('datalist,input,select').attr('id', function(i, current) {
           return current.replace(/\d+$/, num);
       }).end().appendTo('#service_pro');
   
   
   });
   
    $(document).on('change input keyup','.sp_total',function (e) {
   var sum = 0;
   
   	
   		$(".sp_total").each(function() {
   
   
   			if(!isNaN(this.value) && this.value.length!=0) {
   				sum += parseFloat(this.value);
   			}
   
   		});
   
   		$("#landing_amount").val(sum.toFixed(2));
   });
   $('#transaction').on('change','.l_cost',function() {
       console.log('hi');
   }); 
   $("body").on('change input keyup','.l_cost', function (e) {
   
   var sum = 0;
   
   	
   		$(".l_cost").each(function() {
   
   
   			if(!isNaN(this.value) && this.value.length!=0) {
   				sum += parseFloat(this.value);
   			}
   
   		});
   
   	$(this).closest('table').find(".landingpersqft").val(sum.toFixed(2));
   
   
   });
    $(document).on('change input keyup','.sp_total',function (e) {
   var sum = 0;
   
   	
   		$(".sp_total").each(function() {
   
   
   			if(!isNaN(this.value) && this.value.length!=0) {
   				sum += parseFloat(this.value);
   			}
   
   		});
   
   		$("#landing_amount").val(sum.toFixed(2));
   });
    $(document).on('keyup', '.sp_qty,.sp_rate', function (e) {
      ;
   var rate=$(this).closest('table tr').find('.sp_rate').val();
   var qty=$(this).closest('table tr').find('.sp_qty').val();
   var total=rate * qty;
   $(this).closest('table tr').find('.sp_total').val(total);
   
   var sum = 0;
   
   	
   		$(".sp_total").each(function() {
   
   
   			if(!isNaN(this.value) && this.value.length!=0) {
   				sum += parseFloat(this.value);
   			}
   
   		});
   
   	$(this).closest('table').find("#landing_amount").val(sum.toFixed(2));
   
   
     });
       
</script>

<script type="text/javascript">
   const dt = new DataTransfer(); // Permet de manipuler les fichiers de l'input file
   
   $("#attachment").on('change', function(e){
       // alert('hi');
       for(var i = 0; i < this.files.length; i++){
           let fileBloc = $('<span/>', {class: 'file-block'}),
                fileName = $('<span/>', {class: 'name', text: this.files.item(i).name});
           fileBloc.append('<span class="file-delete"><span><i class="fa fa-trash-o"></i></span></span>')
               .append(fileName);
           $("#filesList > #files-names").append(fileBloc);
       };
       // Ajout des fichiers dans l'objet DataTransfer
       for (let file of this.files) {
           dt.items.add(file);
       }
       // Mise à jour des fichiers de l'input file après ajout
       this.files = dt.files;
   
       // EventListener pour le bouton de suppression créé
       $('span.file-delete').click(function(){
           let name = $(this).next('span.name').text();
           // Supprimer l'affichage du nom de fichier
           $(this).parent().remove();
           for(let i = 0; i < dt.items.length; i++){
               // Correspondance du fichier et du nom
               if(name === dt.items[i].getAsFile().name){
                   // Suppression du fichier dans l'objet DataTransfer
                   dt.items.remove(i);
                   continue;
               }
           }
           // Mise à jour des fichiers de l'input file après suppression
           document.getElementById('attachment').files = dt.files;
       });
   });
   
   
   //   $("#myBtn2").click(function(){
   //     //   alert('hi');
   //     // $("#payment_type").modal({backdrop: false});
   //     $('#payment_type').modal('show');
   // });
   
</script>
<style>
   #files-area{
   /*  width: 30%;*/
   margin: 0 auto;
   }
   .file-block{
   border-radius: 10px;
   background-color: #38469f;
   margin: 5px;
   color: #fff;
   display: inline-flex;
   padding: 4px 10px 4px 4px;
   }
   .file-delete{
   display: flex;
   width: 24px;
   color: initial;
   background-color: #38469f;
   font-size: large;
   justify-content: center;
   margin-right: 3px;
   cursor: pointer;
   color: #fff;
   }
   span.name{
   position: relative;
   top: 2px;
   }
   .btn-primary {
   color: #fff;
   background-color: #38469f !important;
   border-color: #38469f !important;
   }
</style>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
   var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
   var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';
   $(document).ready(function () {
        $('#add_city_tax').submit(function (e) {
            e.preventDefault();
            var formData = $("#add_city_tax").serialize();
            formData += "&" + $.param({ csrf_test_name: csrfHash });
            $.ajax({
                type: 'POST',
                data: formData,
                dataType: "json",
                url: '<?php echo base_url(); ?>Cinvoice/add_city_tax',
                success: function (data1, statut) {
                    var $datalist = $('#magic_city_tax');
                    // Clear existing options
                    $datalist.empty();
                    // Add new options
                    for (var i = 0; i < data1.length; i++) {
                        var option = $('<option/>').attr('value', data1[i].city_tax).text(data1[i].city_tax);
                        $datalist.append(option);
                    }
                    $('#new_city_tax').val('');
                    $("#bodyModal1").html("City Tax Added Successfully");
                    $('#city_tax').modal('hide');
                    $('#citytx').show();
                    $('#myModal1').modal('show');
                    window.setTimeout(function () {
                        $('#city_tax').modal('hide');
                        $('#myModal1').modal('hide');
                    }, 2000);
                }
            });
        });
    });
   5.
   // Payroll Insert Data
     $('#add_payroll_type').submit(function(e){
       e.preventDefault();
         var data = {
           data : $("#add_payroll_type").serialize()
         };
         data[csrfName] = csrfHash;
         $.ajax({
             type:'POST',
             data: $("#add_payroll_type").serialize(),
            dataType:"json",
             url:'<?php echo base_url();?>Cinvoice/add_paymentroll_type',
             success: function(data2, statut) {
          var $select = $('select#payroll_type');
               $select.empty();
               console.log(data);
                 for(var i = 0; i < data2.length; i++) {
                    console.log(data2);
           var option = $('<option/>').attr('value', data2[i].proll_type).text(data2[i].proll_type);
           $select.append(option); // append new options
       }
         $('#new_payroll_type').val('');
         $("#bodyModal1").html("Payroll Added Successfully");
         $('#proll_type').modal('hide');
         $('#payroll_type').show();
          $('#myModal1').modal('show');
         window.setTimeout(function(){
           $('#proll_type').modal('hide');
          $('#myModal1').modal('hide');
       }, 2000);
        }
         });
     });
   
   
     $('#add_pay_type').submit(function(e){
       e.preventDefault();
         var data = {
           
           
           data : $("#add_pay_type").serialize()
         
         };
         data[csrfName] = csrfHash;
     
         $.ajax({
             type:'POST',
             data: $("#add_pay_type").serialize(), 
            dataType:"json",
             url:'<?php echo base_url();?>Cinvoice/add_payment_type',
             success: function(data1, statut) {
        
          var $select = $('select#paytype');
      
               $select.empty();
               console.log(data);
                 for(var i = 0; i < data1.length; i++) {
           var option = $('<option/>').attr('value', data1[i].payment_type).text(data1[i].payment_type);
           $select.append(option); // append new options
       }
         $('#new_payment_type').val('');
         $("#bodyModal1").html("Payment Added Successfully");
         $('#payment_type').modal('hide');
         
         $('#paytype').show();
          $('#myModal1').modal('show');
         window.setTimeout(function(){
           $('#payment_type').modal('hide');
        
          $('#myModal1').modal('hide');
      
       }, 2000);
       
        }
         });
     });
     
     
     // Insert Employeee Type
   
     $('#add_employee_type').submit(function(e){
       e.preventDefault();
         var data = {
           
           
           data : $("#add_employee_type").serialize()
         
         };
         data[csrfName] = csrfHash;
     
         $.ajax({
             type:'POST',
             data: $("#add_employee_type").serialize(), 
            dataType:"json",
             url:'<?php echo base_url();?>Cinvoice/add_employee_type',
             success: function(data2, statut) {
        
          var $select = $('select#emp_type');
      
               $select.empty();
               console.log(data);
                 for(var i = 0; i < data2.length; i++) {
                    console.log(data2);
           var option = $('<option/>').attr('value', data2[i].employee_type).text(data2[i].employee_type);
           $select.append(option); // append new options
       }
         $('#emps_type').val('');
         $("#bodyModal1").html("Employee Type Added Successfully");
         $('#employees_type').modal('hide');
         
         $('#emp_type').show();
          $('#myModal1').modal('show');
         window.setTimeout(function(){
           $('#employees_type').modal('hide');
        
          $('#myModal1').modal('hide');
      
       }, 2000);
       
        }
         });
     });
   
   
     // End Employee Type
     
     $(function() {  
       $("#instuc_p2").hide();
       $(".emply_form").hide();
       
       $(".next_pg").click(function(){  
       $("#instuc_p2").show();
       $("#instuc_p1").hide();
   });  
   
   $(".emply_form_btn").click(function(){
       $(".emply_form").show();
       $("#instuc_p2").hide();
       $("#instuc_p1").hide();
       
   
   })
   });  
     // Payroll Insert Data
   
     $('#add_payroll_type').submit(function(e){
       e.preventDefault();
         var data = {
           
           
           data : $("#add_payroll_type").serialize()
         
         };
         data[csrfName] = csrfHash;
     
         $.ajax({
             type:'POST',
             data: $("#add_payroll_type").serialize(), 
            dataType:"json",
             url:'<?php echo base_url();?>Cinvoice/add_paymentroll_type',
             success: function(data2, statut) {
        
          var $select = $('select#payrolltype');
      
               $select.empty();
               console.log(data);
                 for(var i = 0; i < data2.length; i++) {
                    console.log(data2);
           var option = $('<option/>').attr('value', data2[i].payroll_type).text(data2[i].payroll_type);
           $select.append(option); // append new options
       }
         $('#new_payroll_type').val('');
         $("#bodyModal1").html("Payroll Added Successfully");
         $('#payroll_type').modal('hide');
         
         $('#payrolltype').show();
          $('#myModal1').modal('show');
         window.setTimeout(function(){
           $('#payroll_type').modal('hide');
        
          $('#myModal1').modal('hide');
      
       }, 2000);
       
        }
         });
     });
   
     // End Payroll Type
   
   
     $('#add_designation').submit(function(e){
       e.preventDefault();
         var data = {
           
           
           data : $("#add_designation").serialize()
         
         };
         data[csrfName] = csrfHash;
     
         $.ajax({
             type:'POST',
             data: $("#add_designation").serialize(),
            dataType:"json",
             url:'<?php echo base_url();?>Chrm/add_designation_data',
             success: function(data1, statut) {
        
          var $select = $('select#desig');
      
               $select.empty();
               console.log(data);
                 for(var i = 0; i < data1.length; i++) {
           var option = $('<option/>').attr('value', data1[i].id).text(data1[i].designation);
           $select.append(option); // append new options
       }
        $('#designation').val('');
       //    $('#desig').append(result).selectmenu('refresh',true);
         $("#bodyModal1").html("Designation  Added Successfully");
         $('#designation_modal').modal('hide');
         
         $('#desig').show();
          $('#myModal1').modal('show');
         window.setTimeout(function(){
           $('#designation_modal').modal('hide');
        
          $('#myModal1').modal('hide');
      
       }, 2000);
       
        }
         });
     });
   
   
   
   
   
   
     $('#add_bank').submit(function (event) {
   var dataString = {
      dataString : $("#add_bank").serialize()
   };
   dataString[csrfName] = csrfHash;
   $.ajax({
      type:"POST",
      dataType:"json",
      url:"<?php echo base_url(); ?>Csettings/add_new_bank",
      data:$("#add_bank").serialize(),
      success: function (data) {
       $.each(data, function (i, item) {
           result = '<option value=' + data[i].bank_name + '>' + data[i].bank_name + '</option>';
       });
       $('.bankpayment').selectmenu(); 
       $('.bankpayment').append(result).selectmenu('refresh',true);
      $("#bodyModal1").html("Bank Added Successfully");
      $('#myModal3').modal('hide');
      $('#add_bank_info').modal('hide');
      $('#bank').show();
       $('#myModal1').modal('show');
      window.setTimeout(function(){
       $('#myModal5').modal('hide');
       $('#myModal1').modal('hide');
    }, 2000);
     }
   });
   event.preventDefault();
   });



      var payrollTypeSelect = document.getElementById('payroll_type');
       var asteriskSpan = document.getElementById('asterisk');
    
       payrollTypeSelect.addEventListener('change', function() {
           var hrateInput = document.getElementById('hrate');
           if (this.value === 'SalesCommission') {
               hrateInput.removeAttribute('required');
              
           } else {
               hrateInput.setAttribute('required', '');
            
           }
       });
   
       // Trigger change event on page load to initialize the asterisk
       payrollTypeSelect.dispatchEvent(new Event('change'));
   $(document).ready(function(){
       $('#payroll_type').change(function(){
           var selectedOption = $(this).val();
           if(selectedOption === 'Hourly') {
               $('#cost').text('Pay rate (Hourly)').show(); // Show the label
               $('#hrate').show(); // Show the input field
           } else if (selectedOption === 'SalesCommission') {
               $('#cost').hide(); // Hide the label
               $('#hrate').hide(); // Hide the input field
           } else {
               $('#cost').text('Pay rate (Daily)').show(); // Show the label
               $('#hrate').show(); // Show the input field
           }
       });
   });

</script>

<script type="text/javascript">
   // JavaScript to show the popup
       document.getElementById("showPopup").addEventListener("click", function() {
       document.getElementById("popup").style.display = "block";
       });
   
       function closeModal() {
       document.getElementById("showPopup").style.display = "none";
       }
   
       document.getElementById("addPopupData").addEventListener("click", function() {
           document.getElementById("popup").style.display = "none";
       });
      
        function closeModal() {
           document.getElementById("popup").style.display = "none";
       }


      // Sales Partner
      document.getElementById("showPopupsalespartner").addEventListener("click", function() {
       document.getElementById("popupsalespartner").style.display = "block";
       });
   
       function closeModal() {
       document.getElementById("showPopupsalespartner").style.display = "none";
       }
   
       document.getElementById("addPopupsalespartnerData").addEventListener("click", function() {
           document.getElementById("popupsalespartner").style.display = "none";
       });
      
        function closeModal() {
           document.getElementById("popupsalespartner").style.display = "none";
       }
       
      // Validate Email
      function validateEmail(input) {
         var regex = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/;
         var submitButton = document.getElementById("checkSubmit");
          input.addEventListener("input", function(event) {
              var value = input.value;
              var newValue = '';
              for (var i = 0; i < value.length; i++) {
                  var char = value.charAt(i);
                  if (/[@._A-Za-z0-9-]/.test(char) || event.shiftKey) {
                      newValue += char;
                  }
              }
              input.value = newValue;

              var isValid = regex.test(input.value);
              
              if (isValid) {
                  // Check if there are additional characters after .com or .in
                  var lastPart = input.value.split('.').pop();
                  if (lastPart !== 'com' && lastPart !== 'in') {
                      isValid = false;
                  }
              }

              if (isValid) {
                  document.getElementById("validateemails").style.color = "green";
                  document.getElementById("validateemails").textContent = "Valid email address";
                  submitButton.disabled = false;
              } else {
                  document.getElementById("validateemails").style.color = "red";
                  document.getElementById("validateemails").textContent = "Invalid email address";
                  submitButton.disabled = true;

              }
          });
      }

      
   
      // Allow Numbers
      function validateInput(input) {
         // Remove any non-numeric and non-decimal characters from the input value
         input.value = input.value.replace(/[^0-9.]/g, '');
      }
   
      // Allow Numbers Remove Decimal
      function exitnumbers(input, maxLength) {
         input.value = input.value.replace(/\D/g, '');
         if (input.value.length > maxLength) {
            input.value = input.value.slice(0, maxLength);
         }
      }
   
      // Only Allow 20 Characters
      function limitAlphabetical(input, maxLength) {
         input.value = input.value.replace(/[^A-Za-z ]/g, '');
   
         if (input.value.length > maxLength) {
            input.value = input.value.slice(0, maxLength);
         }
      }
   
      // Sales Commision allow 2 digits
      function exitsalecommission(input, maxLength) {
         input.value = input.value.replace(/\D/g, '');
         if (input.value.length > maxLength) {
            input.value = input.value.slice(0, maxLength);
         }
      }

      // Social Security number 
      function exitsocialsecurity(input, maxLength) {
         input.value = input.value.replace(/\D/g, '');
         if (input.value.length > maxLength) {
            input.value = input.value.slice(0, maxLength);
         }
      }

      // Routing Number
      function routingrestrict(input, maxLength) {
         input.value = input.value.replace(/\D/g, '');
         if (input.value.length > maxLength) {
            input.value = input.value.slice(0, maxLength);
         }
      }


      // get Employee select dropdown
      $(document).ready(function(){
         $('#getemployeeTypes').change(function() {
              var selectedValue = $(this).val();
              if(selectedValue == 'addEmployees') {
                  $('.employeeAddModalsdata').modal('show');
                  $('#checkemployeeModal').modal('hide');
              } else if(selectedValue == 'salesPartner') {
                  $('.salespartnerAddModalsdata').modal('show');
                  $('#checkemployeeModal').modal('hide');
              }
          });
      });

   
</script>

<style>
   #files-area{
   /*  width: 30%;*/
   margin: 0 auto;
   }
   .file-block{
   border-radius: 10px;
   background-color: #38469f;
   margin: 5px;
   color: #fff;
   display: inline-flex;
   padding: 4px 10px 4px 4px;
   }
   .file-delete{
   display: flex;
   width: 24px;
   color: initial;
   background-color: #38469f;
   font-size: large;
   justify-content: center;
   margin-right: 3px;
   cursor: pointer;
   color: #fff;
   }
   span.name{
   position: relative;
   top: 2px;
   }
   .btn-primary {
   color: #fff;
   background-color: #38469f !important;
   border-color: #38469f !important;
   }
   .fg {
   display: flex;
   flex-direction: row;
   justify-content: space-between;
   align-items: center;
   margin-bottom: 15px;
   }
   .fg label {
   width: 40%; /* Adjust the width as needed */
   }
   .fg input {
   width: 60%; /* Adjust the width as needed */
   }

   .popup label{
      color:white;
      }
      .popup {
      border-top-right-radius: 20px;
      border-bottom-left-radius: 20px;
      display: none;
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      border: 1px solid #000;
      padding: 20px;
      background-color: #fff;
      z-index: 9999;
      width: 90%;
      max-width: 800px;
      box-sizing: border-box;
      }
      .popup .row {
      margin-top: 10px;
      }
      .popup .col-sm-6 {
      width: 50%;
      box-sizing: border-box;
      }


      .popupsalespartner label{
      color:white;
      }
      .popupsalespartner {
      border-top-right-radius: 20px;
      border-bottom-left-radius: 20px;
      display: none;
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      border: 1px solid #000;
      padding: 20px;
      background-color: #fff;
      z-index: 9999;
      width: 90%;
      max-width: 800px;
      box-sizing: border-box;
      }
      .popupsalespartner .row {
      margin-top: 10px;
      }
      .popupsalespartner .col-sm-6 {
      width: 50%;
      box-sizing: border-box;
      }
      input[type=number]::-webkit-inner-spin-button, 
      input[type=number]::-webkit-outer-spin-button { 
      -webkit-appearance: none;
      -moz-appearance: none;
      appearance: none;
      margin: 0; 
      }
      .select2-selection{
      display:none;
      }
      .btnclr{
      background-color:<?php echo $setting_detail[0]['button_color']; ?>;
      color: white;
      }
      .ui-selectmenu-text{
      display:none;
      }
</style>
