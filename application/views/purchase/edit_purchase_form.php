<script src="<?php echo base_url(); ?>my-assets/js/admin_js/json/supplier.js.php" ></script>
<script src="<?php echo base_url()?>my-assets/js/admin_js/purchase.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>my-assets/js/countrypicker.js" type="text/javascript"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<!-- Add New Purchase Start -->

 
        <div class="content-wrapper">
   <section class="content-header">
      <div class="header-icon">
         <!-- <i class="pe-7s-note2"></i> -->
         <figure class="one">
               <img src="<?php echo base_url()  ?>asset/images/expenses.png"  class="headshotphoto" style="height:50px;" />

      </div>
      <div class="header-title">
         
          <div class="logo-holder logo-9">
      <h1><?php echo ('Edit Expense') ?></h1>

       </div>

         <small><?php echo "" ?></small>
         <ol class="breadcrumb" style="border: 3px solid #d7d4d6;">
            <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
            <li><a href="#"><?php echo display('purchase') ?></a></li>
         <li class="active" style="color:orange"><?php echo ('Edit Expense') ?></li>
        
            <div class="load-wrapp">
      <div class="load-10">
         <div class="bar"></div>
      </div>
    </div>
        
        
         </ol>
      </div>
 
</section>
<style>
.btnclr{
       background-color:<?php echo $setting_detail[0]['button_color']; ?>;
       color: white;

   }


   .ui-front{
   display:none;
   }
   .removebundle, .addbundle{
    padding: 10px 12px 10px 12px;
   border-radius:5px;
   }
   #download_select:focus option:first-of-type , #print_select:focus option:first-of-type{
   display: none;
   }
   input {
   border: none;
   }
   textarea:focus, input:focus{
   outline: none;
   }
   .text-right {
   text-align: left; 
   }
   .main-footer{
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
    width: 120px;
  }
}

   
   
   
</style>
<section class="content">
<!-- Alert Message -->
<?php
   $message = $this->session->userdata('message');
   
   if (isset($message)) {
   
   ?>
<div class="alert alert-info alert-dismissable">
   <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
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
   <?php  $payment_id_new=rand(); ?>
<!-- Purchase report -->
<div class="row">
   <div class="col-sm-12">
      <div class="panel panel-bd lobidrag"  style="border:3px solid #d7d4d6;" >
         <div class="panel-heading" style="height:60px;">
            <div class="panel-title">
               <div class="Row">
                  <div class="Column" style="float: left;">
                  </div>
                  <div class="Column" style="float: right;">
                     <form id="histroy" method="post" >
                              <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                              <input type="hidden"  value="<?php if($payment_id){ echo $payment_id; }else{ echo $payment_id_new;}?>" name="payment_id" class="payment_id" id="payment_id"/>
                                <input type="hidden" id='current_in_id' name="current_in_id"/>
                    <input type="hidden" value="<?php  echo  $supplier_id ; ?>" name="supplier_id_payment"/>
                              <input type="submit" id="payment_history" name="payment_history" class="btnclr btn" style="float:right;float:right;margin-bottom:30px;"   value="<?php echo display('Payment History') ?>"/>
                           </form>

                 
                  </div>
                  <div class="Column" style="float: right;">
                     <a  href="<?php echo base_url('Cpurchase/manage_purchase') ?>" class="btnclr btn  m-b-5 m-r-2"><i class="ti-align-justify"> </i> <?php echo "Manage Expense"; ?> </a>
                  </div>
               </div>
            </div>
         </div>
         <div class="panel-body">
            <form id="insert_purchase"  method="post">
               <div class="row">
                  <div class="col-sm-6">
                     <div class="form-group row">
                        <label for="supplier_sss" class="col-sm-4 col-form-label"><?php  echo  display('Vendor'); ?>
                        <i class="text-danger">*</i>
                        </label>
                        <div class="col-sm-8">
                           <select name="supplier_id" id="supplier_id" class="form-control "  style="width:100%;border: 2px solid #d7d4d6;" required=""  tabindex="1">
                              <option value="<?php echo $supplier_id ?> "><?php echo $supplier_name; ?></option>
                              {all_supplier}
                              <option value="{supplier_id}">{supplier_name}</option>
                              {/all_supplier}
                           </select>
                        </div>
                     </div>
                     <input type="hidden" name="purchase_id" value="<?php  echo $purchase_info[0]['purchase_id'] ?>"/>
                     <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label" ><?php  echo  display('Vendor Type');?></label>
                        <div class="col-sm-8">
                           <input type="vendor_type" tabindex="3" class="form-control" name="vendor_type"  style="WIDTH: 100%;border: 2px solid #d7d4d6;" placeholder="" id="vendor_type_details" />
                        </div>
                     </div>
                  </div>
                
                
                  <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                  <input type="hidden"  value="<?php if($payment_id){ echo $payment_id; }else{ echo $payment_id_new;}?>"  name="payment_id"/>
                
                
                
                  <div class="col-sm-6">
                     <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label"><?php  echo  display('Vendor Address');?>
                        <i class="text-danger"></i>
                        </label>
                        <div class="col-sm-8">
                           <textarea class="form-control" tabindex="4" id="vendor_add" rows="4" cols="50"  name="vendor_add" style="border:2px solid #d7d4d6;" placeholder=""   required ></textarea>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-6" id="">
                     <div class="form-group row">
                        <label for="date" class="col-sm-4 col-form-label"><?php echo display('invoice_no');  ?><i class="text-danger">*</i></label>
                        <div class="col-sm-8">
                           <input  class=" form-control" type="" size="50" name="invoice_no" id="invoice_no" style="border: 2px solid #d7d4d6;" required  value="<?php echo $chalan_no; ?>"  tabindex="4" />
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-6" id="">
                     <div class="form-group row">
                        <label for="text" class="col-sm-4 col-form-label"><?php echo display('Expenses / Bill date');?>
                        <i class="text-danger">*</i>
                        </label>
                        <div class="col-sm-5">
                           <input type="date"  style="width:165%;border: 2px solid #d7d4d6;" required tabindex="2" class="form-control datepicker" name="bill_date"  placeholder="Expenses/Billdate"  value="{purchase_date}" id="date"  />
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-6">
                     <div class="form-group row">
                        <label for="port_of_discharge" class="col-sm-4 col-form-label"> <?php echo display('Port Of Discharge');?> </label>
                        <div class="col-sm-8">
                           <input class="form-control" type="" size="50" name="Port_of_discharge" id="date1" style="border: 2px solid #d7d4d6;"  value="<?php echo $Port_of_discharge; ?>"  tabindex="4" />
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="date" class="col-sm-4 col-form-label"><?php echo display('Payment Due Date');?>  <i class="text-danger">*</i></label>
                        <div class="col-sm-8">
                           <input class=" form-control" type="date" size="50" name="payment_due_date" id="payment_due_date"  style="border: 2px solid #d7d4d6;" required value="<?php echo $purchase_info[0]['payment_due_date']; ?>" tabindex="4" />
                        </div>
                     </div>
                     <input type="hidden" id="hidden_weight" name="hidden_weight"/>
                     <div class="form-group row">
                        <label for="billing_address" class="col-sm-4     col-form-label"><?php echo display('Payment Terms');?><i class="text-danger">*</i></label>
                        <div class="col-sm-8">
                           <select  required  name="payment_terms" id="payment_terms" style="width:100%;border: 2px solid #d7d4d6;" class=" form-control" placeholder='Payment Terms' id="payment_terms">
                              <option value="<?php echo $payment_terms; ?>"><?php echo $payment_terms; ?></option>
                              <option value="CAD">CAD</option>
                              <option value="COD">COD</option>
                              <option value="ADVANCE"><?php echo display('ADVANCE');?></option>
                              <option value="7DAYS">7<?php echo display('DAYS');?></option>
                              <option value="15DAYS">15<?php echo display('DAYS');?></option>
                              <option value="30DAYS">30<?php echo display('DAYS');?></option>
                              <option value="45DAYS">45<?php echo display('DAYS');?></option>
                              <option value="60DAYS">60<?php echo display('DAYS');?></option>
                              <option value="75DAYS">75<?php echo display('DAYS');?></option>
                              <option value="90DAYS">90<?php echo display('DAYS');?></option>
                              <option value="180DAYS">180<?php echo display('DAYS');?></option>
                              
                              <?php foreach($payment_terms as $inv){ ?>
          <option value="<?php echo $inv['payment_terms'] ; ?>"><?php echo $inv['payment_terms'] ; ?></option>
                               <?php    }?>
                              
                              
                           </select>
                        </div>
                     </div>
                     <?php ?>
                     <div class="form-group row">
                        <label for="payment_type" class="col-sm-4 col-form-label"><?php
                           echo display('payment_type');
                           ?> <i class="text-danger">*</i></label>
                        <div class="col-sm-8">
                           <select name="paytype_drop" id="paytype_drop" class="form-control" required=""  tabindex="3" style="width:100;border: 2px solid #d7d4d6;">
                              <option value="<?php echo $payment_type; ?>"> <?php echo  $payment_type; ?></option>
                              <option value="CHEQUE"><?php echo display('cheque'); ?></option>
                              <option value="CASH"><?php echo display('cash'); ?></option>
                              <option value="CREDIT/DEBIT CARD"><?php echo display('CREDIT/DEBIT CARD');?></option>
                              <option value="BANK TRANSFER"><?php echo display('BANK TRANSFER');?></option>
                              <?php foreach($payment_type as $ptype){?>
                              <option value="<?php echo $ptype['payment_type'];?>"><?php echo $ptype['payment_type'] ;?></option>
                              <?php }?>
                           </select>
                        </div>
                     </div>
                      <div class="form-group row">
                                 <label for="account_category" class="col-sm-4 col-form-label">Account Category</label>
                                 <div class="col-sm-8">
                                      <select id="ddl"  name="account_category" class="form-control"  style="border:2px solid #d7d4d6;"  onchange="configureDropDownLists(this,document.getElementById('ddl2'))">
                                          <option value="<?php echo $account_category; ?>" <?php if($account_category) { echo 'selected'; } ?>>
                                            <?php echo $account_category; ?>
                                         </option>
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
                                    <label for="port_of_discharge" class="col-sm-4 col-form-label">Account Subcategory</label>
                                    <div class="col-sm-8">
                                      <select class="form-control" name="sub_category"  style="border: 2px solid #d7d4d6;"  id="ddl2">
                                         <option value="<?php echo $sub_category; ?>" <?php if($sub_category) { echo 'selected'; } ?>>
                                            <?php echo $sub_category; ?>
                                         </option>
                                      </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label  class="col-sm-4 col-form-label">Account Subcategory</label>
                                    <div class="col-sm-8">
                                       <input class="form-control" name ="account_subcat" id="account_subcat"  style="border: 2px solid #d7d4d6;"  value="<?php echo $account_subcat; ?>" type="text" placeholder=" Account Sub Category"  tabindex="1" >
                                    </div>
                                </div>
                     <div class="form-group row" id="isf_no1">
                        <label for="ISF" class="col-sm-4 col-form-label" ><?php echo display('ISF NO');?>
                     
                        </label>
                        <div class="col-sm-8">
                           <input name="isf_no"  class="form-control bankpayment"   style="width:100%;border: 2px solid #d7d4d6;" value="<?php echo $isf_filling; ?>"  >
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group row">
                        <label for="container_number" class="col-sm-4 col-form-label"><?php echo display('Container Number');?> </label>
                        <div class="col-sm-8">
                           <input type="text" name="container_no" value="<?php  echo $container_no; ?>" class="form-control"   style="border: 2px solid #d7d4d6;"  placeholder="Container Number">
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group row">
                        <label for="date" class="col-sm-4 col-form-label"><?php echo display('B/L No');?></label>
                        <div class="col-sm-8">
                           <input type="text" name="bl_number" class="form-control"  value="<?php echo $bl_number; ?>"  style="border: 2px solid #d7d4d6;"  placeholder="Bl Number">
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="invoice_no" class="col-sm-4 col-form-label"><?php echo display('Estimated Time Of Arrival');?>
                     
                        </label>
                        <div class="col-sm-8">
                           <input type="date"  tabindex="2" class="form-control datepicker" name="eta"   style="border: 2px solid #d7d4d6;" value="<?php echo $eta; ?>" id="date1"  />
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="supplier_sss" class="col-sm-4 col-form-label"><?php echo display('Estimated Time Of Depature');?>
                     
                        </label>
                        <div class="col-sm-8">
                           <input type="date"  tabindex="2" class="form-control datepicker" name="etd"  style="border: 2px solid #d7d4d6;"  value="<?php echo $etd; ?>" id="date"  />
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="invoice_no" class="col-sm-4 col-form-label"> <?php echo display('ISF FIELD');?>
                        <i class="text-danger">*</i></label>
                        <div class="col-sm-8">
                           <select name="isf_field" class="form-control"  id="isf_dropdown1" tabindex="3" style="width400%;border: 2px solid #d7d4d6;">
                              <option value=""selected><?php echo display('Select ISF NO');?></option>
                              <option value="1"><?php echo display('NO') ?></option>
                              <option value="2"><?php echo display('YES') ?></option>
                           </select>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="ETA" class="col-sm-4 col-form-label"><?php echo display('Attachments');?></label>
                        <div class="col-sm-8">
                            <input type="file" name="files[]" id="attachment" class="form-control" multiple/>
                            <br>

                            <?php foreach ($expense_edit as $key => $attachment) { ?> 
                                       <a href="<?php  echo base_url(); ?>uploads/<?php echo $attachment['files']; ?>" class="file-block" target=_blank><span class="file-delete"><span><i class="fa fa-trash-o"></i></span></span><?php echo $attachment['files']; ?></a>
                                       <?php } ?>
                        </div>
                     </div>
                  </div>
               </div>
               <br>
               <?php  $d= $total_tax; 
                  $t='';
                  if($d !=='' && !empty($d)){
                     preg_match('#\((.*?)\)#', $d, $match);
                  
                     $t=$match[1];$t=trim($t);
                     
                   }else{
                  
                     $t=$t=trim($t);
                     
                   }
                  ?>                                         
               <div class="table-responsive">
                  <div id="content">
                     <?php
                   //  print_r($purchase_info);
                        $count='';
                        $list_count=array();
                        foreach($purchase_info as $inv){
                            $count = substr($inv['tableid'], 0, 1);
                         $items[] =$count   ;                            
                                                      
                        
                        
                        
                        
                        }
                        
                        
                        
                        ?>
                     <?php 
                        for($m=0;$m<=count($purchase_info);$m++){ ?>
                     <table class="table table-bordered normalinvoice table-hover" id="normalinvoice_<?php  echo $m; ?>"  style="border: 2px solid #d7d4d6;" >
                        <thead>
                           <tr>
                              <th rowspan="2" class="text-center" style="width:180px;" ><?php echo display('product_name'); ?><i class="text-danger">*</i>  &nbsp;&nbsp; </th>
                              <th rowspan="2" class="text-center" style="width:60px;"><?php echo display('Bundle No');?><i class="text-danger">*</i></th>
                              <th rowspan="2"  class="text-center"><?php echo  display('description'); ?></th>
                              <th rowspan="2" class="text-center" style="width:60px;"><?php echo display('Thick ness');?><i class="text-danger">*</i></th>
                              <th rowspan="2" class="text-center"><?php echo display('Supplier Block No');?><i class="text-danger">*</i></th>
                              <th rowspan="2" class="text-center" ><?php echo display('Supplier Slab No');?><i class="text-danger">*</i> </th>
                              <th colspan="2"   style="width:150px;" class="text-center"><?php echo display('Gross Measurement');?><i class="text-danger">*</i> </th>
                              <th rowspan="2" class="text-center"><?php echo display('Gross Sq.Ft');?></th>
                              <th rowspan="2" style="width:40px;" class="text-center"><?php echo display('Slab No');?><i class="text-danger">*</i></th>
                              <th colspan="2"  style="width:150px;" class="text-center"><?php echo display('Net Measure');?><i class="text-danger">*</i></th>
                              <th rowspan="2" class="text-center"><?php echo display('Net Sq.Ft');?></th>
                              <th rowspan="2"  style="width:90px;" class="text-center"><?php echo display('Cost per Sq.Ft');?></th>
                              <th rowspan="2"  style="width:90px;" class="text-center"><?php echo display('Cost per Slab');?></th>
                              <th rowspan="2"  style="width:90px;" class="text-center"><?php echo display('sales'); ?><br/><?php echo display('Price per Sq.Ft');?></th>
                              <th rowspan="2"  style="width:90px;" class="text-center"><?php echo display('Sales Slab Price');?></th>
                              <th rowspan="2" class="text-center"><?php echo display('Weight');?></th>
                              <th rowspan="2" class="text-center"><?php echo display('Origin');?></th>
                              <th rowspan="2" style="width: 130px" class="text-center"><?php  echo  display('total'); ?></th>
                              <th rowspan="2" class="text-center"><?php  echo  display('action'); ?></th>
                           </tr>
                           <tr>
                              <th class="text-center"><?php echo display('Width');?></th>
                              <th class="text-center"><?php echo display('Height');?></th>
                              <th class="text-center"  ><?php echo display('Width');?></th>
                              <th class="text-center" ><?php echo display('Height');?></th>
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
                           th,
                           td {
                           word-wrap: break-word
                           border: 1px solid black;
                           width: 80px;
                           }
                           .select2 {
                           display:none;
                           }
                           .Row {
                           display: table;
                           width: 100%; /*Optional*/
                           table-layout: fixed; /*Optional*/
                           border-spacing: 10px; /*Optional*/
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
                           #download_select:focus option:first-of-type , #print_select:focus option:first-of-type{
                           display: none;
                           }
                        </style>
                        <tbody id="addPurchaseItem_<?php echo $m;  ?>">
                           <?php  $n=0; ?>
                           <?php foreach($purchase_info as $inv){
                              $a = substr($inv['tableid'], 0, 1);
                              if($a==$m){
                                                                  
                                                                      ?>
                           <tr>
                              <td>
                                 <input type="hidden" name="tableid[]" id="tableid_1" value="<?php  echo $inv['tableid'];   ?>"/>
                                 <input list="magicHouses" name="prodt[]" id="prodt_<?php  echo $m.$n; ?>" class="form-control product_name" value="<?php  echo $inv['product_name'];  ?>" style="width:160px;" />
                                 <datalist id="magicHouses">
                                    <?php                                
                                       foreach($product_list as $tx){?>
                                    <option value="<?php echo $tx['product_name'].'-'.$tx['product_model'];?>">  <?php echo $tx['product_name'].'-'.$tx['product_model'];  ?></option>
                                    <?php } ?>
                                 </datalist>
                                 <input type='hidden' class='common_product autocomplete_hidden_value  product_id_1' value="<?php  echo $inv['product_id'];  ?>" name='product_id[]' id='SchoolHiddenId_<?php  echo $m.$n; ?>' />
                              </td>
                              <td>
                                 <input type="text" id="bundle_no_<?php  echo $m.$n; ?>" name="bundle_no[]" required="" value="<?php  echo $inv['bundle_no'];  ?>" class="form-control" />
                              </td>
                              <td>
                                 <input type="text" id="description_<?php  echo $m.$n; ?>" name="description[]" value="<?php  echo $inv['description'];  ?>" class="form-control" />
                              </td>
                              <td >
                                 <input type="text" name="thickness[]" id="thickness_<?php  echo $m.$n; ?>" required="" value="<?php  echo $inv['thickness'];  ?>" class="form-control"/>
                              </td>
                              <td>
                                 <input type="text" id="supplier_b_no_<?php  echo $m.$n; ?>" name="supplier_block_no[]" required="" value="<?php  echo $inv['supplier_block_no'];  ?>" class="form-control" />
                              </td>
                              <td >
                                 <input type="text"  id="supplier_s_no_<?php  echo $m.$n; ?>" name="supplier_slab_no[]" required="" value="<?php  echo $inv['supplier_slab_no'];  ?>" class="form-control"/>
                              </td>
                              <td>
                                 <input type="text" id="gross_width_<?php  echo $m.$n; ?>" name="gross_width[]" required="" value="<?php  echo $inv['gross_width'];  ?>" class="gross_width  form-control" />
                              </td>
                              <td>
                                 <input type="text" id="gross_height_<?php  echo $m.$n; ?>" name="gross_height[]"  required=""  value="<?php  echo $inv['gross_height'];  ?>" class="gross_height form-control" />
                              </td>
                              <td >
                                 <input type="text"   style="width:60px;" readonly id="gross_sq_ft_<?php  echo $m.$n; ?>" name="gross_sq_ft[]" value="<?php  echo $inv['gross_sq_ft_1'];  ?>" class="gross_sq_ft form-control"/>
                              </td>
                              <td >
                                 <input type="text"  id="slab_no_<?php  echo $m.$n; ?>" name="slab_no[]" value="<?php  echo $n+1;  ?>" readonly  required="" value="<?php  echo $c;  ?>" class="form-control"/>
                              </td>
                              <td>
                                 <input type="text" id="net_width_<?php  echo $m.$n; ?>" name="net_width[]" required="" value="<?php  echo $inv['net_width'];  ?>" class="net_width form-control" />
                              </td>
                              <td>
                                 <input type="text" id="net_height_<?php  echo $m.$n; ?>" name="net_height[]"    required="" value="<?php  echo $inv['net_height'];  ?>" class="net_height form-control" />
                              </td>
                              <td >
                                 <input type="text"   style="width:60px;" readonly id="net_sq_ft_<?php  echo $m.$n; ?>" name="net_sq_ft[]" value="<?php  echo $inv['net_sq_ft'];  ?>" class="net_sq_ft form-control"/>
                              </td>
                           <td>

       <span class="input-symbol-euro"><input type="text" id="cost_sq_ft_<?php  echo $m.$n; ?>"    <?php foreach($this->session->userdata('perm_data') as $test) { $split=explode('-',$test);      if(trim($split[0])=='expenses'  && trim($split[1])=='0100'){  echo "";  } else{echo "readonly";}}?>   name="cost_sq_ft[]"   style="width:60px;"  value="<?php  echo $inv['cost_sq_ft'];  ?>"  class="cost_sq_ft form-control" ></span>

                                        
                                            <td >
                     
      <span class="input-symbol-euro"> <input type="text"  id="cost_sq_slab_<?php  echo $m.$n; ?>" name="cost_sq_slab[]"    style="width:60px;" value="<?php  echo $inv['cost_sq_slab'];  ?>"      placeholder="0.00"   class="cost_sq_slab form-control"/></span>
 


                                               
                                            </td>
                                            <td>
                                        
         <span class="input-symbol-euro">  <input type="text" id="sales_amt_sq_ft_<?php  echo $m.$n; ?>"  name="sales_amt_sq_ft[]"  style="width:60px;"  value="<?php  echo $inv['sales_amt_sq_ft'];  ?>" class="sales_amt_sq_ft form-control" /></span>



                                               
                                            </td>
                                        
                                            <td >
                                    
      <span class="input-symbol-euro">   <input type="text"  id="sales_slab_amt_<?php  echo $m.$n; ?>" name="sales_slab_amt[]"  style="width:60px;" value="<?php  echo $inv['sales_slab_amt'];  ?>"  class="sales_slab_amt form-control"/></td> </span>
      </td>
                              <td>
                                 <input type="text" id="weight_<?php  echo $m.$n; ?>" name="weight[]"  value="<?php  echo $inv['weight'];  ?>" class="weight form-control" />
                              </td>
                              <td >
                                                <select id="origin_1" name="origin[]" class="origin form-control">      
                                                <?php foreach ($country_code as $key => $value) { ?>
                                                   <option value="<?php echo $value['iso']; ?>"><?php echo $value['iso']; ?></option>
                                                <?php } ?> </select>
                                            
                                             
                                             
                                             
                                            </td>
                              <td >
                                 <span class="input-symbol-euro"><input  type="text" class="total_price form-control" style="width:80px;" readonly  value="<?php  echo $inv['total'];  ?>"  id="total_<?php  echo $m.$n; ?>"     name="total_amt[]"/></span>
                              </td>
                              <td style="text-align:center;">
                                 <button  class='delete btn btn-danger' type='button' value='Delete' ><i class='fa fa-trash'></i></button>
                              </td>
                           </tr>
                           <?php $n++;   } }  ?>
                        </tbody>
                        <tfoot>
                           <tr>
                              <td style="text-align:right;" colspan="8"><b><?php  echo display('Gross Sq.Ft');?>  :</b></td>
                              <td >
                                 <input type="text" id="overall_gross_<?php echo $m; ?>" name="overall_gross[]"    class="overall_gross form-control" style="width: 60px"   readonly="readonly"  /> 
                              </td>
                              <td style="text-align:right;" colspan="3"><b><?php  echo display('Net Sq.Ft');?> :</b></td>
                              <td >
                                 <input type="text" id="overall_net_<?php echo $m; ?>" name="overall_net[]"  class="overall_net form-control"  style="width: 60px"   readonly="readonly"  /> 
                              </td>
                                              <td >
             <input type="text" id="costpersqft_<?php echo $m; ?>" name="costpersqft[]"  class="costpersqft form-control"  style="width: 60px"  readonly="readonly"  /> 
            </td>
            
                                        <td >
             <input type="text" id="costperslab_<?php echo $m; ?>" name="costperslab[]"  class="costperslab form-control"  style="width: 60px"    /> 
            </td>
           
                                        <td >
             <input type="text" id="salespricepersqft_<?php echo $m; ?>" name="salespricepersqft[]"  class="salespricepersqft form-control"  style="width: 60px"  readonly="readonly"  /> 
            </td>
            
                                        <td >
             <input type="text" id="salesslabprice_<?php echo $m; ?>" name="salesslabprice[]"  class="salesslabprice form-control"  style="width: 60px"  readonly="readonly"  /> 
            </td>

                           
                              <td >
                                 <input type="text" id="overall_weight_<?php echo $m; ?>" name="overall_weight[]"  class="overall_weight form-control"  style="width: 70px"  readonly="readonly"  /> 
                              </td>
                              <td style="text-align:right;" colspan="1"><b><?php  echo display('total'); ?> :</b></td>
                              <td >
                                 <span class="input-symbol-euro">     <input type="text" id="Total_<?php echo $m; ?>" name="total[]"   class="b_total form-control"   style="padding-top: 6px;width: 80px"    readonly="readonly"  />
                              </td>
                              <td colspan="2" style="text-align: center;">
                             <i id="buddle_<?php echo $m; ?>"  class="btn-danger removebundle fa fa-minus" aria-hidden="true"></i>
                              
                              </td>
                           </tr>
                        </tfoot>
                     </table>
                     <?php   } ?>
                  
                  <i id="buddle_1" class="btnclr addbundle fa fa-plus" style=" padding: 10px 12px 10px 12px;margin-right: 18px;float:right; "   onclick="addbundle(); "aria-hidden="true"></i>
                
                    </div>
               </div>
               <table class="taxtab table table-bordered table-hover"  style="border: 2px solid #d7d4d6;" >
                  <tr>
                     <td class="hiden" style="width:25%;border:none;text-align:end;font-weight:bold;">
                        <?php  echo display("Live Rate");?> : 
                     </td>
                     <td class="hiden btnclr" style="width:12%;text-align-last: center;padding:5px; border:none;font-weight:bold;color:white;">1 <?php  echo $curn_info_default;  ?>
                        = <input style="width: 80px;text-align:center;color:black;padding:5px;" type="text" class="custocurrency_rate"/>&nbsp;<label for="custocurrency"  ></label>
                     </td>
                     <td style="border:none;text-align:right;font-weight:bold;"><?php  echo display('Tax');?> : 
                     </td>
                     <td style="width:12%">
                         
                         
                           <input list="magic_tax" name="tx"  id="product_tax" value="<?php  echo $t; ?>" class="form-control"   onchange="this.blur();" />
                        	<datalist id="magic_tax">
                              <?php                                
                              foreach($edit_purchasedata as $tx){?>
                              <option value="<?php echo $tx['tax_id'].'-'.$tx['tax'].'%';?>">  <?php echo $tx['tax_id'].'-'.$tx['tax'].'%';  ?></option>
                               <?php } ?>
                        
                            </datalist>

                        
                        
                        
                        
                        
                        
                        
                     </td>
                     <td  style="width:25%;"></td>
                  </tr>
               </table>
               <input type="hidden" id="paid_convert" name="paid_convert"/>   <input type="hidden" id="bal_convert" name="bal_convert"/>
               <table border="0"   class="overall table table-bordered table-hover"     style="border: 2px solid #d7d4d6;table-layout: auto;" >
                  <tr>
                     <td   style="vertical-align:top;text-align:right;border:none;"></td>
                     <td  style="text-align:right;border:none;"></td>
                     <td  style="text-align:right;border:none;"></td>
                     <td  style="text-align:right;border:none;"> </td>
                  </tr>
                  <tr>
                     <td  colspan="2" style="vertical-align:top;text-align:right;border:none;"><b><?php  echo display('Overall TOTAL');?> :</b></td>
                     <td colspan="1" style="border:none;padding-bottom: 40px;"><span class="input-symbol-euro"><input type="text" id="Over_all_Total" name="Over_all_Total"  style="width:180px;" class="form-control" value="<?php echo $purchase_info[0]['total_amt'];  ?>"  readonly="readonly"  /> </span></td>
                     <td colspan="4" style="text-align:right;border:none;"><b><?php  echo display('TAX DETAILS');?> :</b></td>
                     <td colspan="1" style="border:none;">  <span class="input-symbol-euro">     <input type="text" class="form-control" style="width:180px;"  id="tax_details" value="<?php if($purchase_info[0]['total_tax']){echo $purchase_info[0]['total_tax']; }else{echo "0"; }?>" name="tax_details"  readonly="readonly" /></span></td>
                  </tr>
                  <tr>
                     <td  colspan="2" style="vertical-align:top;text-align:right;border:none;"><b><?php  echo display('Overall Gross Sq.Ft');?> :</b></td>
                     <td colspan="1" style="border:none;"><input type="text" id="total_gross" name="total_gross" value="<?php echo  $purchase_info[0]['total_gross'];  ?>"  style="width:180px;" class="form-control"   readonly="readonly"  /> </td>
                     <td colspan="4" style="text-align:right;border:none;"><b><?php  echo display('GRAND TOTAL');?> :</b></td>
                     <td colspan="1" style="border:none;">  <span class="input-symbol-euro">    <span class="input-symbol-euro">   <input type="text" id="gtotal"   class="form-control" style="width:180px;" name="gtotal" value="<?php  echo $purchase_info[0]['grand_total_amount'];   ?>"  readonly="readonly" /></td>
                  </tr>
                  <tr>
                     <td  colspan="2" style="vertical-align:top;text-align:right;border:none;"><b><?php  echo display('Overall Net Sq.Ft');?> :</b></td>
                     <td colspan="1" style="border:none;"><input type="text" id="total_net" name="total_net" value="<?php echo  $purchase_info[0]['total_net'];  ?>" class="form-control"  style="width:180px;"  readonly="readonly"  /> </td>
                     <td colspan="4" style="text-align:right;border:none;"><b><?php  echo display('GRAND TOTAL');?> :</b><br/><b><?php  echo display('Preferred Currency');?></b></td>
                     <td colspan="1" style="border:none;">
                        <table>
                           <tr>
                              <td class="cus" name="cus" style="width: 40px;"></td>
                              <td><input  type="text"  style="width:180px;" readonly id="vendor_gtotal"    name="vendor_gtotal"  required   /></td>
                           </tr>
                        </table>
                     </td>
                  </tr>
                  <tr>
                     <td colspan="2"  style="vertical-align:top;text-align:right;border:none;"><b><?php  echo display('Overall Weight');?> :</b></td>
                     <td colspan="1" style="border:none;"><input type="text" id="total_weight" value="<?php echo  $purchase_info[0]['total_weight'];  ?>" name="total_weight"  style="width:180px;"  class="form-control"   readonly="readonly"  /></td>
                     <td colspan="4" class="amt" style="text-align:right;border:none;"><b><?php  echo display('Amount Paid');?> :</b></td>
                     <td style="border:none;">
                        <table border="0">
                           <tr class="amt">
                              <td class="cus" name="cus" style="width: 40px;"></td>
                              <td> <input  type="text"  readonly id="amount_paid" style="width:-webkit-fill-available;"  name="amount_paid"  value="<?php if($purchase_info[0]['paid_amount']) {echo  $purchase_info[0]['paid_amount'];}else{echo "0.00" ;}  ?>"     /></td>
                           </tr>
                        </table>
                     </td>
                  </tr>
                  <tr>
                     <td colspan="2"  style="vertical-align:top;text-align:right;border:none;"></td>
                     <td colspan="1" style="border:none;"></td>
                     <td class="amt" colspan="4"  style="vertical-align:top;text-align:right;border:none;"><b><?php echo display('balance_ammount');  ?> :</b></td>
                     <td class="amt" style="border:none;" colspan="1">
                        <table border="0">
                           <tr class="amt">
                              <td class="cus" name="cus" style="border:none;width: 40px;"></td>
                              <td style="border:none;">
                                 <input  type="text"   readonly id="balance"  value="<?php echo $purchase_info[0]['balance'];  ?>" name="balance"  required   />                     
                              </td>
                           </tr>
                        </table>
                     </td>
                  </tr>
                  <td colspan="21" style="text-align: end;">
                     <input type="button" value="<?php echo display('Make Payment')?>"   class="btnclr paypls btn btn-large" />
                  </td>
                  <tr>
               </table>
       
      <div class="row">
      <div class="col-sm-12">
      <div class="form-group row">
      <label for="adress" class="col-sm-2 col-form-label"><?php echo  display('Remarks / Details');?>
      </label>
      <div class="col-sm-10">
           <textarea class="form-control" rows="4" cols="50" id="remark" name="remark" placeholder="Remarks"  style="border: 2px solid #d7d4d6;" rows="1"><?php echo $remarks; ?></textarea>

      </div>
      </div> 
      </div>
        </div>
  
      <div class="row">
      <div class="col-sm-12">
      <div class="form-group row">
      <label for="adress" class="col-sm-2 col-form-label"><?php echo  display('Message on Invoice');?>
      </label>
      <div class="col-sm-10">
             <textarea class="form-control" rows="4" cols="50" id="adress" name="message_invoice"  style="border: 2px solid #d7d4d6;"  placeholder="Message on Invoice" rows="1"><?php echo $message_invoice; ?></textarea>

      </div>
      </div> 
      </div>
      </div>
         
      </div>
      <div class="form-group row" style="
         margin-top: 1%;
         ">
      <div class="col-sm-6">
      <table>
      <tr>
      <td>
      <input type="submit" id="add_purchase"   class="btnclr btn btn-large" name="add-packing-list" value="<?php echo display('save'); ?>" />
      </td>
        <td style="width:20px;"></td>
      <td class="button_hide"> 
      <a    id="final_submit"  class='btnclr final_submit btn expense_submit'><?php echo display('submit'); ?></a>
      </td>
        <td style="width:20px;"></td>
      <td class="button_hide">         
      <select name="download_select" id="download_select" class="form-control" style="background-color:<?php echo $setting_detail[0]['button_color']; ?>;width: auto;color:white;" >
      <option value="Download" selected><?php echo display('download'); ?></option>
      <option value="Invoice" ><?php echo  display('New Invoice');?></option>
      <option value="Packing" ><?php echo  display('Packing List');?></option>
      </select>
      </td>   
      <td style="width:20px;"></td>
      <td class="button_hide">
   
      <select name="print_select" id="print_select" class="form-control" style="background-color:<?php echo $setting_detail[0]['button_color']; ?>;width: auto;color:white;" >
      <option value="Print" selected><?php echo display('print');  ?></option>
      <option value="Invoice" ><?php echo  display('New Invoice');?></option>
      <option value="Packing" ><?php echo  display('Packing List');?></option>
      </select>
      </td>                   
      </tr>
      </table>
      </div>
      </div> </div>
      </form>
   </div>
  <div class="modal fade" id="payment_history_modal" role="dialog">
   <div class="modal-dialog" style="margin-right: 1100px;">
      <!-- Modal content-->
      <div class="modal-content" style="width: 1500px;margin-top: 190px;text-align:center;">
         <div class="modal-header btnclr" >
            <button type="button" id="history_close" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><?php echo display('PAYMENT HISTORY') ?></h4>
         </div>
         <div class="modal-body1">
            <form method='post' id='bulk_payment_form'>
                 <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
            <div id="salle_list"></div>
                                       </form>
         </div>
         <div class="modal-footer">
         </div>
      </div>
   </div>
</div>
   <div class="modal fade" id="myModal1" role="dialog" >
      <div class="modal-dialog">
         <!-- Modal content-->
         <div class="modal-content" style="margin-top: 190px;text-align:center;">
            <div class="modal-header btnclr" >
               <button type="button" class="close" data-dismiss="modal">&times;</button>
               <h4 class="modal-title"><?php echo  display('Expenses') ?></h4>
            </div>
            <div class="modal-body" id="bodyModal1" style="font-weight:bold;text-align:center;">
               <h4><?php echo  display('New  Expenses Updated Succefully');?></h4>
            </div>
            <div class="modal-footer">
            </div>
         </div>
      </div>
   </div>
   <div id="myModal3" class="modal fade">
      <div class="modal-dialog">
         <div class="modal-content" style="text-align:center;">
            <div class="modal-header btnclr " >
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
               <h4 class="modal-title"><?php echo  display('Confirmation');?></h4>
            </div>
            <div class="modal-body">
               <p><?php echo  display('Your Invoice is not submitted. Would you like to submit or discard');?>
               </p>
               <p class="text-warning">
                  <small><?php echo  display('If you dont save, your changes will not be saved.');?></small>
               </p>
            </div>
            <div class="modal-footer">
               <input type="submit" id="ok" class="btnclr btn"   onclick="submit_redirect()"  value="<?php  echo  display('submit');?>"/>
               <button id="btdelete" type="button" class="btnclr btn btn-danger"  onclick="discard()"><?php  echo  display('Discard');?></button>
            </div>
         </div>
      </div>
   </div>
   <div class="modal fade" id="exampleModalLong" role="dialog" >
      <div class="modal-dialog">
         <!-- Modal content-->
         <div class="modal-content" style="margin-top: 190px;text-align:center;">
            <div class="modal-header btnclr " >
               <button type="button" class="close" data-dismiss="modal">&times;</button>
               <h4 class="modal-title"><?php echo  display('purchase'); ?>  </h4>
            </div>
            <div class="modal-body" id="bodyModal1" style="font-weight:bold;text-align:center;">
               <h4</h4>
            </div>
            <div class="modal-footer">
            </div>
         </div>
      </div>
   </div>
   <div class="modal fade" id="exampleModalLong" role="dialog" >
      <div class="modal-dialog">
         <!-- Modal content-->
         <div class="modal-content" style="margin-top: 190px;text-align:center;">
         <div class="modal-header btnclr " >
               <button type="button" class="close" data-dismiss="modal">&times;</button>
               <h4 class="modal-title"><?php echo  display('purchase'); ?> </h4>
            </div>
            <div class="modal-body" id="bodyModal1" style="font-weight:bold;text-align:center;">
            </div>
            <div class="modal-footer">
            </div>
         </div>
      </div>
   </div>
</div>
<!-- /.modal -->
<div id="packmodal" class="modal fade" role="dialog">
   <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content" style="width: 163%;">
      <div class="modal-header btnclr " >
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Choose your Package </h4>
         </div>
         <div class="modal-body">
            <table class="table table-bordered">
               <tr>
                  <th>Choose your Package   </th>
                  <th>Sno</th>
                  <th>Novice No</th>
                  <th>Expense Packing ID</th>
                  <th>Gross Weight</th>
                  <th>Container NO</th>
                  <th>Thickness</th>
                  <th>Invoice Date</th>
               </tr>
               <?php 
                  $i=0;
                  foreach($packinglist as $pack)
                      { ?>
               <tr>
                  <td><input type="radio" name="packing" id="packing" onclick="packing('<?php echo $pack['invoice_no']; ?>')" ></td>
                  <td><?php echo $j=$i+1; ?></td>
                  <td><?php echo $pack['invoice_no']; ?></td>
                  <td><?php echo $pack['expense_packing_id']; ?></td>
                  <td><?php echo $pack['gross_weight']; ?></td>
                  <td><?php echo $pack['container_no']; ?></td>
                  <td><?php echo $pack['thickness']; ?></td>
                  <td><?php echo $pack['invoice_date']; ?></td>
               </tr>
               <?php $i++; } ?>
            </table>
         </div>
      </div>
   </div>
</div>
<style>
   .td{
   width: 200px;
   text-align-last: end;
   border-right: hidden;
   }
   input {
   border: none;
   }
   .text-right {
   text-align: left; 
   }
</style>
<script type="text/javascript">
   $(document).ready(function(){
   
   $(".sidebar-mini").addClass('sidebar-collapse') ;
   });
      $(document).ready(function() {
          var data = {
    value: $('#supplier_id').val()
   };
   data[csrfName] = csrfHash;
   $.ajax({
    type:'POST',
    data: data,
   dataType:"json",
    url:'<?php echo base_url();?>Cinvoice/getvendor',
    success: function(result, statut) {
        if(result.csrfName){
           //assign the new csrfName/Hash
           csrfName = result.csrfName;
           csrfHash = result.csrfHash;
        }
      
      console.log(result);
    $("#vendor_add").val(result[0]['address']+"\r\n"+result[0]['city']+"\r\n"+result[0]['state']+"-"+result[0]['zip']+"-"+result[0]['country']+"\n"+result[0]['primaryemail']+"-"+result[0]['mobile']);
   $('#vendor_type_details').val(result[0]['vendor_type']);
    $(".cus").html(result[0]['currency_type']);
      $("label[for='custocurrency']").html(result[0]['currency_type']);
     console.log('https://open.er-api.com/v6/latest/<?php echo $curn_info_default; ?>');
     $.getJSON('https://open.er-api.com/v6/latest/<?php echo $curn_info_default; ?>', 
   function(data) {
   var custo_currency=result[0]['currency_type'];
   var x=data['rates'][custo_currency];
   var Rate =parseFloat(x).toFixed(3);
   Rate = isNaN(Rate) ? 0 : Rate;
   
   $('.hiden').show();
   
   $(".custocurrency_rate").val(Rate);
   var g=$('#gtotal').val();
   $('#vendor_gtotal').val(parseFloat(Rate*g));
   });
    }
   });
   
   });
   
</script>
<style>
   .ui-selectmenu-text{
   display:none;
   }
</style>
<style>
   input {
   border: none;
   }
   textarea:focus, input:focus{
   outline: none;
   }
   .text-right {
   text-align: left; 
   }
   /* .form-control[disabled], .form-control[readonly], fieldset[disabled] .form-control {
   background-color:white;
   } */
</style>
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
   th,
   td {
   word-wrap: break-word
   border: 1px solid black;
   width: 80px;
   }
   #amt,#bal,.select2 {
   display:none;
   }
</style>

<div class="modal fade" id="payment_modal" role="dialog">
   <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content" style="    margin-top: 190px;text-align:center;">
      <div class="modal-header btnclr " >
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><?php echo  display('add_payment'); ?></h4>
         </div>
         <div class="modal-body">
            <form id="add_payment_info"  method="post" >
               <div class="row">
                  <div class="form-group row">
                     <label for="date" style="text-align:end;" class="col-sm-3 col-form-label"><?php  echo  display('payment_date'); ?>  <i class="text-danger">*</i></label>
                     <div class="col-sm-5">
                       <?php
                                        $date = date('Y-m-d');
                                        ?>
                        <input class=" form-control" type="date"  name="payment_date" id="payment_date" required value="<?php echo html_escape($date); ?>" tabindex="4" />
                     </div>
                  </div>
                  <input type="hidden" id="cutomer_name" name="cutomer_name"/>
                  
                  <input type="hidden"  value="<?php if($payment_id){ echo $payment_id; }else{ echo $payment_id_new;}?>"  name="payment_id"/>
                  <div class="form-group row">
                     <label for="billing_address" style="text-align:end;" class="col-sm-3 col-form-label"><?php  echo  display('Reference No'); ?><i class="text-danger">*</i></label>
                     <div class="col-sm-5">
                        <input class=" form-control" type="text"  name="ref_no" id="ref_no" required   />
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="bank" style="text-align:end;" class="col-sm-3 col-form-label"><?php  echo  display('Select Bank'); ?>:<i class="text-danger">*</i></label>
                     <a data-toggle="modal" href="#add_bank_info"    class="btn btnclr"><i class="fa fa-university"></i></a>
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
<option value="First Republic Bank">First Republic Bank</option>
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
<option value="Credit Suisse">Credit Suisse</option>
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
                     <label for="billing_address" style="text-align:end;" class="col-sm-3 col-form-label"><?php  echo display('Amount to be paid'); ?> : </label>
                     <div class="col-sm-5">
                        <table border="0">
                           <tr>
                              <td class="cus" name="cus"></td>
                              <td><input  type="text"  readonly style="width:190%;" class="form-control"  name="amount_to_pay" id="amount_to_pay"  required   /></td>
                           </tr>
                        </table>
                     </div>
                  </div>
                  <div class="form-group row" style="display:none;">
                     <label for="billing_address" style="text-align:end;" class="col-sm-3 col-form-label"><?php  echo display('Amount Received'); ?> : </label>
                     <div class="col-sm-5">
                        <table border="0">
                           <tr>
                              <td class="cus" name="cus"></td>
                              <td><input  type="text"  readonly name="amount_received" id="amount_received" style="width:190%;" class="form-control"required   /></td>
                           </tr>
                        </table>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="billing_address" style="text-align:end;" class="col-sm-3 col-form-label"><?php  echo display('balance'); ?> : </label>
                     <div class="col-sm-5">
                        <table border="0">
                           <tr>
                              <td class="cus" name="cus"></td>
                              <td><input  type="text"  style="width:190%;"  readonly name="balance_modal" id="balance_modal" class="form-control" required  /></td>
                           </tr>
                        </table>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="billing_address" style="text-align:end;" class="col-sm-3 col-form-label"><?php echo display('payment_amount');  ?>: <i class="text-danger">*</i></label>
                     <div class="col-sm-5">
                        <table border="0">
                           <tr>
                              <td class="cus" name="cus"></td>
                              <td><input  type="text"   style="width:190%;" name="payment" id="payment_from_modal" class="form-control" required   /></td>
                           </tr>
                        </table>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="billing_address" style="text-align:end;" class="col-sm-3 col-form-label"><?php  echo display('Additional Information');  ?> : </label>
                     <div class="col-sm-5">
                        <input class=" form-control" type="text"  name="details" id="details"/>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="billing_address" style="text-align:end;" class="col-sm-3 col-form-label"><?php  echo display('Attachments');  ?> : </label>
                     <div class="col-sm-5">
                        <input class=" form-control" type="file"  name="attachement" id="attachement" />
                     </div>
                  </div>
               </div>
         </div>
         <div class="modal-footer">
         <div class="col-sm-8"></div>
         <div class="col-sm-4">
         <a href="#" class="btn btnclr"   data-dismiss="modal"><?php  echo display('Close');  ?></a>
         <input class="btn btnclr" type="submit"     name="submit_pay" id="submit_pay" value="<?php  echo display('submit');  ?>"  required   />
         </div>
         </div>
      </div>
      </form>
   </div>
</div>
<div class="modal fade" id="add_bank_info">
   <div class="modal-dialog">
      <div class="modal-content" style="text-align:center;">
      <div class="modal-header btnclr " >
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title"><?php echo display('add_new_bank');  ?></h4>
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
                     <label for="shipping_line" class="col-sm-4 col-form-label"><?php echo display('country');  ?>
                     <i class="text-danger"></i>
                     </label>
                     <div class="col-sm-6">
                        <select class="selectpicker countrypicker form-control"  data-live-search="true" data-default="United States"  name="country" id="country" style="width:100%"></select>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="previous_balance" class="col-sm-4 col-form-label"><?php echo "Currency" ?></label>
                     <div class="col-sm-6">
                        <select id="currency" name="currency1"  class="form-control" style="max-width: -webkit-fill-available;">
                           <option><?php echo display('Select currency'); ?></option>
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
                           <option value="USD" selected="selected">USD - US Dollar</option>
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
         <a href="#" class="btn btnclr"  data-dismiss="modal">Close</a>
         <input type="submit" id="addBank"    class="btn btnclr" name="addBank" value="<?php echo display('save') ?>"/>
         </div>
         </div>  </div>
         </form>
      </div>
   </div>
</div>
<input type="hidden" id="invoice_hdn"/> <input type="hidden" id="invoice_hdn1"/>
<script>
 $(document).ready(function(){
   
 $(".normalinvoice").each(function(i,v){
   if($(this).find("tbody").html().trim().length === 0){
       $(this).hide()
   }
})
        $('.normalinvoice').each(function(){
     
var tid=$(this).attr('id');
 const indexLast = tid.lastIndexOf('_');
var idt = tid.slice(indexLast + 1);

  var sum=0;

 $('#normalinvoice_'+idt  +  '> tbody > tr').find('.total_price').each(function() {
var v=$(this).val();
  sum += parseFloat(v);

});

$('#Total_'+idt).val(sum.toFixed(3));

  var sum_net=0;

 $('#normalinvoice_'+idt  +  '> tbody > tr').find('.net_sq_ft').each(function() {
var v=$(this).val();
  sum_net += parseFloat(v);

});

$('#overall_net_'+idt).val(sum_net.toFixed(3));
   var sum_weight=0;

 $('#normalinvoice_'+idt  +  '> tbody > tr').find('.weight').each(function() {
var v=$(this).val();
  sum_weight += parseFloat(v);

});

$('#overall_weight_'+idt).val(sum_weight.toFixed(3));
  var sum_gross=0;

 $('#normalinvoice_'+idt  +  '> tbody > tr').find('.gross_sq_ft').each(function() {
var v=$(this).val();
  sum_gross += parseFloat(v);

});

$('#overall_gross_'+idt).val(sum_gross.toFixed(3));
      var sum_cq=0;

 $('#normalinvoice_'+idt  +  '> tbody > tr').find('.cost_sq_ft').each(function() {
var v=$(this).val();
  sum_cq += parseFloat(v);

});

$('#costpersqft_'+idt).val(sum_cq.toFixed(3));

  var sum_ss=0;

 $('#normalinvoice_'+idt  +  '> tbody > tr').find('.cost_sq_slab').each(function() {
var v=$(this).val();
  sum_ss += parseFloat(v);

});

$('#costperslab_'+idt).val(sum_ss.toFixed(3));

  var sum_amt=0;

 $('#normalinvoice_'+idt  +  '> tbody > tr').find('.sales_amt_sq_ft').each(function() {
var v=$(this).val();
  sum_amt += parseFloat(v);

});

$('#salespricepersqft_'+idt).val(sum_amt.toFixed(3));
  var sum_st=0;

 $('#normalinvoice_'+idt  +  '> tbody > tr').find('.sales_slab_amt').each(function() {
var v=$(this).val();
  sum_st += parseFloat(v);

});

$('#salesslabprice_'+idt).val(sum_st.toFixed(3));

var total_w=0;
 $('.table').each(function() {
    $(this).find('.weight').each(function() {
        var precio = $(this).val();
        if (!isNaN(precio) && precio.length !== 0) {
          total_w += parseFloat(precio);
        }
      });

  });
$('#total_weight').val(total_w.toFixed(3)).trigger('change');


    });
});
   function discard(){
   
 
   }
        function submit_redirect(){
    
        }
   $('.final_submit').on('click', function (e) {
   
    //   window.btn_clicked = true;      //set btn_clicked to true
       var input_hdn="Your Invoice No :"+$('#invoice_hdn').val()+" has been Updated Successfully";
     
       console.log(input_hdn);
      
       $("#bodyModal1").html(input_hdn);
       $('#myModal1').modal('show');
       window.setTimeout(function(){
           $('.modal').modal('hide');
          
   $('.modal-backdrop').remove();
    },2500);
       window.setTimeout(function(){
          
   
           window.location = "<?php  echo base_url(); ?>Cpurchase/manage_purchase";
         }, 2500);
          
   });
   

   
     var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
   var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';
   $('#insert_product_from_expense').submit(function (event) {
        event.preventDefault();
       var dataString = {
           dataString : $("#insert_product_from_expense").serialize()
      };
      dataString[csrfName] = csrfHash;
       $.ajax({
           type:"POST",
           dataType:"json",
           url:"<?php echo base_url(); ?>Cproduct/insert_product_from_expense",
           data:$("#insert_product_from_expense").serialize(),
           success:function (data1) {
        console.log(data1);
               $.each(data1, function (i, item) {
              
              result = '<option value=' + data1[i].product_name +'-'+ data1[i].product_model + '>' + data1[i].product_name +'-'+ data1[i].product_model + '</option>';
          });
        
          $('.product_name').selectmenu(); 
          $('.product_name').append(result).selectmenu('refresh',true);
          $('.product_name').show();
         $("#bodyModal1").html("Product Added Successfully");
         $('#payment_type').modal('hide');
         
         
          $('#myModal1').modal('show');
         window.setTimeout(function(){
           $('#product_info').modal('hide');
        
          $('#myModal1').modal('hide');
            
          
   
       }, 2000);
   }
       
   });
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
               console.log(data1);
               $.each(data1, function (i, item) {
              
              result = '<option value=' + data1[i].payment_type + '>' + data1[i].payment_type + '</option>';
          });
        
          $('#paytype_drop').selectmenu(); 
          $('#paytype_drop').append(result).selectmenu('refresh',true);
          $('#paytype_drop').show();
         $("#bodyModal1").html("Payment Type Added Successfully");
         $('#payment_type').modal('hide');
         
         
          $('#myModal1').modal('show');
         window.setTimeout(function(){
           $('#payment_type').modal('hide');
        
          $('#myModal1').modal('hide');
            
          
   
       }, 2000);
       
        }
         });
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
           
          if(result[0]['tax_status']==1){
           $('#product_tax').val(result[0]['tax_percent']);
       }else{
          $('#product_tax').val(0);
       }
           }
       });
   });
   
   
   
   
   
   
   
   
   
   
   
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
               console.log(data1);
               $.each(data1, function (i, item) {
              result = '<option value=' + data1[i].payment_terms + '>' + data1[i].payment_terms + '</option>';
          });
          $('#payment_terms').selectmenu();
          $('#payment_terms').append(result).selectmenu('refresh',true);
         $("#bodyModal1").html("Payment Terms Added Successfully");
         $('#payment_type').modal('hide');
         $('#payment_terms').show();
          $('#myModal1').modal('show');
         window.setTimeout(function(){
           $('#payment_type_new').modal('hide');
          $('#myModal1').modal('hide');
       }, 2000);
        }
         });
     });
   
   
   
   


   
   $('#insert_purchase').submit(function (event) {
       var dataString = {
           dataString : $("#insert_purchase").serialize()
      };
      dataString[csrfName] = csrfHash;
       $.ajax({
           type:"POST",
           dataType:"json",
           url:"<?php echo base_url(); ?>Cpurchase/insert_purchase",
           data:$("#insert_purchase").serialize(),
           success:function (data) {
           console.log(data);
               var split = data.split("/");
               $('#invoice_hdn1').val(split[0]);
            console.log(split[0]+"---"+split[1]);
               $('#invoice_hdn').val(split[1]);
               $("#bodyModal1").html('New Expense Updated  Successfully');
               $('.button_hide').show();
   $('.download').show();
       $('#myModal1').modal('show');
       window.setTimeout(function(){
           $('.modal').modal('hide');
   $('.modal-backdrop').remove();
   $("#bodyModal1").html("");
    },2500);
          }
       });
       event.preventDefault();
   });
   
   

   
   
   $('#insert_purchase1').submit(function (event) {
       var dataString = {
           dataString : $("#insert_purchase1").serialize()
       
      };
      dataString[csrfName] = csrfHash;
     
       $.ajax({
           type:"POST",
           dataType:"json",
           url:"<?php echo base_url(); ?>Cpurchase/insert_purchase",
           data:$("#insert_purchase1").serialize(),
           
   
           success:function (data) {
           console.log(data);
      
               var split = data.split("/");
               $('#invoice_hdn1').val(split[0]);
            console.log(split[0]+"---"+split[1]);
        
               $('#invoice_hdn').val(split[1]);
               $("#bodyModal1").html('New Expense Created Successfully');
           
   $('.button_hide').show();
       $('#myModal1').modal('show');
       window.setTimeout(function(){
           $('.modal').modal('hide');
          
   $('.modal-backdrop').remove();
   $("#bodyModal1").html("");
    },2500);
   
   
          }
   
       });
   
       event.preventDefault();
   });
   
   $('#isf_dropdown').on('change', function() {
     if ( this.value == '2')
       $("#isf_no").show();
     else
       $("#isf_no").hide();
   }).trigger("change");
   $('#isf_dropdown1').on('change', function() {
     if ( this.value == '2')
       $("#isf_no1").show();
     else
       $("#isf_no1").hide();
   }).trigger("change");
   
   //Total
           $(document).ready(function(){
                $('.without_po').show();
               $('.with_po').hide();
   
   
   });
   
   
   
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
          dataString :$("#add_payment_info").serialize()
      
     };
     dataString[csrfName] = csrfHash;
    
      $.ajax({
          type:"POST",
          dataType:"json",
          url:"<?php echo base_url(); ?>Cpurchase/payment_history_purchase",
          data:$("#histroy").serialize(),
   
          success:function (data) {
          // console.log("ssssssss :"+data.payment_get);
        
           var gt=$('#vendor_gtotal').val();
           var amtpd=parseFloat(data.amt_paid);
            
           console.log(data);
           var bal= $('#vendor_gtotal').val() - amtpd;
    $('#balance').val(bal.toFixed(2));
    if(amtpd){
      $('#amount_paid').val(amtpd.toFixed(2));
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
   
   
   function payment_info(){
      
     var data = {
          gtotal:$('#vendor_gtotal').val(),
          customer_name:$('#customer_name').val()
     
       };
       data[csrfName] = csrfHash;
   
       $.ajax({
           type:'POST',
           data: data, 
        dataType:"json",
           url:'<?php echo base_url();?>Cinvoice/get_payment_info',
           success: function(result, statut) {
               if(result[0]['amt_paid']){
      $('#amount_paid').val(amtpd);
    }else{
       $('#amount_paid').val("0.00");
    }
            // $("#amount_paid").val(result[0]['amt_paid']);
             $("#balance").val(result[0]['balance']);
               console.log(result);
           }
       });
   }
   $('#payment_from_modal').on('input',function(e){
   
   var payment=parseFloat($('#payment_from_modal').val());
   var amount_to_pay=parseFloat($('#amount_to_pay').val());
   console.log(payment.toFixed(2)+"/"+amount_to_pay.toFixed(2));
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
        $(document).ready(function(){
      
      $('#amt').hide();
      $('#bal').hide();
          });
   $(document).on('click','.paypls',function (e) {
   $('#amount_to_pay').val($('#balance').val());
       $('#payment_modal').modal('show');
     e.preventDefault();
   
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
           $('#bank').selectmenu();
           $('#bank').append(result).selectmenu('refresh',true);
          $("#bodyModal1").html("Bank Added Successfully");
          $('#myModal1').modal('show');
          $('#add_bank_info').modal('hide');
       //    $('.bank').(show);
          $('#bank').show();
           // .bank(show);
          window.setTimeout(function(){
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
        $(document).ready(function () {
  // submit_pay
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
   function product_detail(id){
   
   var pdt=$('#product_name_'+id).val();
      const myArray = pdt.split("-");
      var product_nam=myArray[0];
      var product_model=myArray[1];
      console.log(product_nam+"^"+product_model);
     var data = {
       
          product_nam:product_nam,
          product_model:product_model
       };
       data[csrfName] = csrfHash;
   
       $.ajax({
           type:'POST',
           data: data, 
        dataType:"json",
           url:'<?php echo base_url();?>Cinvoice/product_id',
           success: function(result, statut) {
         console.log(result);
             $("#prod_id_"+id).val(result[0]['product_id']);
             $("#product_rate_"+id).val(result[0]['price']);
           
           }
       });
   
     
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
$('#'+localStorage.getItem("delete_table")).find('.costpersqft').val(costpersqft.toFixed(2)).trigger('change');
  var cost_sq_slab=0;
   $('#'+localStorage.getItem("delete_table")).find('.cost_sq_slab').each(function() {
        var precio = $(this).val();
        if (!isNaN(precio) && precio.length !== 0) {
          cost_sq_slab += parseFloat(precio);
        }
      });
$('#'+localStorage.getItem("delete_table")).find('.costperslab').val(cost_sq_slab.toFixed(2)).trigger('change');
  var sales_amt_sq_ft=0;
    $('#'+localStorage.getItem("delete_table")).find('.sales_amt_sq_ft').each(function() {
        var precio = $(this).val();
        if (!isNaN(precio) && precio.length !== 0) {
          sales_amt_sq_ft += parseFloat(precio);
        }
      });
 $('#'+localStorage.getItem("delete_table")).find('.salespricepersqft').val(sales_amt_sq_ft.toFixed(3)).trigger('change');
  var sales_slab_amt=0;
  $('#'+localStorage.getItem("delete_table")).find('.sales_slab_amt').each(function() {
        var precio = $(this).val();
        if (!isNaN(precio) && precio.length !== 0) {
          sales_slab_amt += parseFloat(precio);
        }
      });
 $('#'+localStorage.getItem("delete_table")).find('.salesslabprice').val(sales_slab_amt.toFixed(2)).trigger('change');
   var sum=0;
    $('#'+localStorage.getItem("delete_table")).find('.total_price').each(function() {
var v=$(this).val();
  sum += parseFloat(v);
});
  $('#'+localStorage.getItem("delete_table")).find('.b_total').val(sum.toFixed(2)).trigger('change');
   var sumnet=0;

   $('#'+localStorage.getItem("delete_table")).find('.net_sq_ft').each(function() {
var v=$(this).val();
 if (!isNaN(v) && v.length !== 0) {
          sumnet += parseFloat(v);
        }

});
  $('#'+localStorage.getItem("delete_table")).find('.overall_net').val(sumnet.toFixed(3));


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
$('#total_net').val(total_net.toFixed(3)).trigger('change');
  var overall_gs=0;
 $('.table').each(function() {
    $(this).find('.gross_sq_ft').each(function() {
        var precio = $(this).val();
        if (!isNaN(precio) && precio.length !== 0) {
          overall_gs += parseFloat(precio);
        }
      });
 });

$('#total_gross').val(overall_gs.toFixed(2)).trigger('change');
  var sum_w=0;
  $('.table').each(function() {
    $(this).find('.weight').each(function() {
 
        var precio = $(this).val();
        if (!isNaN(precio) && precio.length !== 0) {
          sum_w += parseFloat(precio);
        }
      });
      });
$('#'+localStorage.getItem("delete_table")).find('.overall_weight').val(sum_w.toFixed(2)).trigger('change');
var total_w=0;
 $('.table').each(function() {
    $(this).find('.overall_weight').each(function() {
        var precio = $(this).val();
        if (!isNaN(precio) && precio.length !== 0) {
          total_w += parseFloat(precio);
        }
      });

  });
$('#total_weight').val(total_w.toFixed(3)).trigger('change');
var overall_sum=0;
$('.table').each(function() {
     $(this).find('.b_total').each(function() {
    
var v=$(this).val();
  overall_sum += parseFloat(v);

});});
 $('#Over_all_Total').val(overall_sum.toFixed(2)).trigger('change');



gt(id);





 });
    
   $(document).on('keyup', '.weight', function(){
   var weight=0;
        $(this).closest('table').find('.weight').each(function() {
   var v=$(this).val();
    if (!isNaN(v) && v.length !== 0) {
             weight += parseFloat(v);
           }
   });
    $(this).closest('table').find('.overall_weight').val(weight.toFixed(3));
   var total_w=0;
    $('.table').each(function() {
       $(this).find('.weight').each(function() {
           var precio = $(this).val();
           if (!isNaN(precio) && precio.length !== 0) {
             total_w += parseFloat(precio);
           }
         });
   
     });
   $('#total_weight').val(total_w.toFixed(3)).trigger('change');
   
   });
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
//     $(document).on('keyup','.normalinvoice tbody tr:last',function (e) {
   
// var tid=$(this).closest('table').attr('id');
// const indexLast = tid.lastIndexOf('_');
// var id = tid.slice(indexLast + 1);
//   var $last = $('#addPurchaseItem_'+id + ' tr:last');
//   var num = id+($last.index()+1);
    
//     $('#addPurchaseItem_'+id  + ' tr:last').clone().find('input,select').attr('id', function(i, current) {
//         return current.replace(/\d+$/, num);
        
//     }).end().appendTo('#addPurchaseItem_'+id );
  
//  $.each($('#normalinvoice_'+id  +  '> tbody > tr'), function (index, el) {
//             $(this).find(".slab_no").val(index + 1); // Simply couse the first "prototype" is not counted in the list                
//         })
// var id1= $(this).closest('tr').find('.product_name').attr('id');
//   var id_num = id1.substring(id1.indexOf('_') + 1);
//   var pdt=$('#'+id1).val();
//   console.log(pdt);
//   const myArray = pdt.split("-");
//   var product_nam=myArray[0];
//   var product_model=myArray[1];
//   var data = {
//       product_nam:product_nam,
//       product_model:product_model
//     };
//     data[csrfName] = csrfHash;
//     $.ajax({
//         type:'POST',
//         data: data,
//      dataType:"json",
//         url:'<?php echo base_url();?>Cinvoice/availability',
//         success: function(result, statut) {
//             console.log(result);
//             if(result.csrfName){
//               csrfName = result.csrfName;
//               csrfHash = result.csrfHash;
//             }
//             $("#total_amt_"+ id_num).val(result[0]['price']);


//           $("#cost_sq_ft_"+ id_num).val(result[0]['cost_persqft']);
//           $("#cost_sq_slab_"+ id_num).val(result[0]['cost_perslab']);
//           $("#sales_slab_amt_"+id_num).val(result[0]['price'])
//           $("#sales_amt_sq_ft_"+id_num).val(result[0]['sales_pricepersqft'])


//           $("#SchoolHiddenId_"+ id_num).val(result[0]['product_id']);
//             console.log(result);
//         }
//     });
//     $.ajax({
//         type:'POST',
//         data: data,
//      dataType:"json",
//         url:'<?php echo base_url();?>Cinvoice/get_product_info',
//         success: function(result, statut) {
//             console.log(result);
//             if(result.csrfName){
//               csrfName = result.csrfName;
//               csrfHash = result.csrfHash;
//             }
//             $("#sales_amt_sq_ft_"+ id_num).val(result[0]['sales_price_sqft']);
//             $("#sales_slab_amt_"+ id_num).val(result[0]['sales_slab_price']);
     
//         }
//     });
//         });



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
   
   
   var data = {
      product_nam:product_nam,
      product_model:product_model,


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

   //         $("#total_amt_"+ id_num).val(result[0]['price']);
   //  $("#cost_sq_ft_"+ id_num).val(result[0]['cost_persqft']);
   //   $("#cost_sq_slab_"+ id_num).val(result[0]['cost_perslab']);
   //   $("#sales_slab_amt_"+id_num).val(result[0]['price'])
   //   $("#sales_amt_sq_ft_"+id_num).val(result[0]['sales_pricepersqft'])
    $("#SchoolHiddenId_"+ id_num).val(result[0]['product_id']);
    console.log(result);




            
       }  
   });

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
    if (!isNaN(v) && v.length !== 0) {
    overall_sum += parseFloat(v);
    }
   }); 
   $('#Over_all_Total').val(overall_sum.toFixed(2)).trigger('change');
   $('#gtotal').val(overall_sum.toFixed(2)).trigger('change');
   $('#vendor_gtotal').val(overall_sum.toFixed(2)).trigger('change');
   

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


















       $('#insert_supplier').submit(function (event) {
       var dataString = {
           dataString : $("#insert_supplier").serialize()
      };
      dataString[csrfName] = csrfHash;
       $.ajax({
           type:"POST",
           dataType:"json",
           url:"<?php echo base_url(); ?>Csupplier/insert_supplier",
           data:$("#insert_supplier").serialize(),
           success:function (states) {
               $("#supplier_id").html("");
                if (Object.keys(states).length > 0) {
                   $("#supplier_id").append($('<option></option>').val(0).html('Select a Vendor'));
                }
                else {
                       $("#supplier_id").append($('<option></option>').val(0).html(''));
                }
   
              $.each(states, function (i, state) {
               $("#supplier_id").append($('<option></option>').val(state.supplier_id).html(state.supplier_name));
              });
   
          $('#add_vendor').modal('hide');  
        
         $("#bodyModal1").html("New Vendor Added Successfully");
         
          $('#myModal1').modal('show');
     
         
        
          window.setTimeout(function(){
           $('#myModal1').modal('hide');
           $('.modal-backdrop').remove();
   
    },2500);
       
           }
       });
       event.preventDefault();
   });
       $('.button_hide').hide();
   
                           $('.hiden').css("display","none");
   
     
   
   
   $('#supplier_id').on('change', function (e) {
     
     var data = {
         value: $('#supplier_id').val()
      };
     data[csrfName] = csrfHash;
     $.ajax({
         type:'POST',
         data: data,
      
         dataType:"json",
         url:'<?php echo base_url();?>Cinvoice/getvendor',
         success: function(result, statut) {
             if(result.csrfName){
            
                csrfName = result.csrfName;
                csrfHash = result.csrfHash;
             }
       
           console.log(result[0]['currency_type']);
      
         $(".cus").html(result[0]['currency_type']);
           $("label[for='custocurrency']").html(result[0]['currency_type']);
          console.log('https://open.er-api.com/v6/latest/<?php echo $curn_info_default; ?>');
          $.getJSON('https://open.er-api.com/v6/latest/<?php echo $curn_info_default; ?>', 
   function(data) {
    var custo_currency=result[0]['currency_type'];
       var x=data['rates'][custo_currency];
    var Rate =parseFloat(x).toFixed(3);
    Rate = isNaN(Rate) ? 0 : Rate;
     console.log(Rate);
     $('.hiden').show();
     $(".custocurrency_rate").val(Rate);
   });
         }
     });
   
   
   });
   
   $('#productname').on('change', function() {
       var val=$('#productname').val();
     $('#productid').val(val);
   });
     
   
     
              
$('#supplier_id').on('change', function (e) {
  var data = {
    value: $('#supplier_id').val()
  };
  data[csrfName] = csrfHash;
  
  $.ajax({
    type: 'POST',
    data: data,
    dataType: 'json',
    url: '<?php echo base_url();?>Cinvoice/getvendor',
    success: function (result, statut) {
      if (result.csrfName) {
        csrfName = result.csrfName;
        csrfHash = result.csrfHash;
      }

      console.log(result[0]['currency_type']);
      $(".cus").html(result[0]['currency_type']);
      $("label[for='custocurrency']").html(result[0]['currency_type']);
      console.log('https://open.er-api.com/v6/latest/<?php echo $curn_info_default; ?>');
      
      $.getJSON('https://open.er-api.com/v6/latest/<?php echo $curn_info_default; ?>', function (data) {
        var custo_currency = result[0]['currency_type'];
        var x = data['rates'][custo_currency];
        var Rate = parseFloat(x).toFixed(3);
        Rate = isNaN(Rate) ? 0 : Rate;
        console.log(Rate);
        $('.hiden').show();
        $(".custocurrency_rate").val(Rate);
      });

      // You can log the `data` variable here inside the success callback.
      console.log(data);
    }
  });

  // You can't log the `data` variable here because it's out of scope.
  // console.log(data);
});
   $(function(){
       $(".add_category").hide();
   $("#add_category").click(function() {
       
           $(".add_category").show(300);
      
   });
   $(".checkbox_toggle2").hide();
   
   $("#purchase_tax").click(function() {
       if($(this).is(":checked")) {
           $(".checkbox_toggle2").show(300);
       } else {
           $(".checkbox_toggle2").hide(200);
       }
   });
   
   
   });
   
   
   
   $('#supplier_id').change(function(e){
       var data = {
         
           value:$('#supplier_id').val()
       };
       data[csrfName] = csrfHash;
   
       $.ajax({
           type:'POST',
           data: data, 
          dataType:"json",
           url:'<?php echo base_url();?>Cpurchase/getsupplier_data',
           success: function(result, statut) {
   
   console.log(result);
   
               if(result.csrfName){
                  csrfName = result.csrfName;
                  csrfHash = result.csrfHash;
               }
           $('#vendor_add').val(result[0]['address']+'\n'+result[0]['city']+'\n'+result[0]['state']+"-"+result[0]['zip']+"-"+result[0]['country']+'\n'+result[0]['primaryemail']+"-"+result[0]['businessphone']       );
               $('#vendor_type_details').val(result[0]['vendor_type'])
           
        
           }
       });
   });
   
    //   $("body").on("focus", ".product_name", function() {

   
   $("body").on(".product_name", function() {

   var tid=$(this).closest('tr').find('.product_name').attr('id');
const indexLast = tid.lastIndexOf('_');
var id = tid.slice(indexLast + 1);
  $('#prodt_'+id).val('');
});
       
   
   
   $('.download').on('click', function (e) {
   
    var popout = window.open("<?php  echo base_url(); ?>Cpurchase/purchase_details_data/"+$('#invoice_hdn1').val());
    
         e.preventDefault();
   
   });  
   // $(document).on('change input', '.product_name', function(){
   
   //   var id= $(this).attr('id');
   //   var id_num = id.substring(id.indexOf('_') + 1);
   //    var pdt=$('#'+id).val();
   //    console.log(pdt);
   //    const myArray = pdt.split("-");
   //    var product_nam=myArray[0];
   //    var product_model=myArray[1];
   //   var data = {
   //        product_nam:product_nam,
   //        product_model:product_model
   //     };
   //     data[csrfName] = csrfHash;
   //     $.ajax({
   //         type:'POST',
   //         data: data,
   //      dataType:"json",
   //         url:'<?php echo base_url();?>Cinvoice/availability',
   //         success: function(result, statut) {
   //             console.log(result);
   //             if(result.csrfName){
   //                csrfName = result.csrfName;
   //                csrfHash = result.csrfHash;
   //             }
   //           $("#cost_sq_ft_"+ id_num).val(result[0]['price']);
   //            $("#cost_sq_slab_"+ id_num).val(result[0]['price']);
   //           $("#SchoolHiddenId_"+ id_num).val(result[0]['product_id']);
   //             console.log(result);
   //         }
   //     });
   // });
   
   
   $(document).ready(function(){   
     //  debugger;
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
  var hypen='-';
     var total=$('#Over_all_Total').val();
 var tax= $('#product_tax').val();
if(tax.indexOf(hypen) != -1){
 var field = tax.split('-');

 var percent = field[1];

}else if(tax=='Select the Tax'){

  percent="0";
}

else{
percent=tax;
}
//  var field = tax.split('-');

//  var percent = field[1];

 percent=percent.replace("%","");
  var answer = (percent / 100) * parseFloat(total);

  
   var gtotal = parseFloat(total + answer);
   console.log("gtotal :" +gtotal);



  var final_g= $('#final_gtotal').val();
// var amt='';
// if(answer !==0){
//     amt=parseFloat(answer)+parseFloat(total);
// }else{
//      amt=parseFloat(total);
   
// }
  
//   var num = isNaN(parseFloat(amt)) ? 0 : parseFloat(amt)
//     $('#gtotal').val(num); 
              $.getJSON('https://open.er-api.com/v6/latest/<?php echo $curn_info_default; ?>', 
   function(data) {
       console.log("SXSXS"+data);
    var custo_currency=result[0]['currency_type'];
       var x=data['rates'][custo_currency];
    var Rate =parseFloat(x).toFixed(3);
    Rate = isNaN(Rate) ? 0 : Rate;
     console.log(Rate);
     $('.hiden').show();
     $(".custocurrency_rate").val(Rate);
 
   
  var custo_amt=$(".custocurrency_rate").val(); 
  console.log("numhere :"+num +"-"+custo_amt);
  var value=num*custo_amt;
  var custo_final = isNaN(parseFloat(value)) ? 0 : parseFloat(value)
 $('#vendor_gtotal').val(custo_final);  
 


// var bal_amt=custo_final-$('#amount_paid').val();
// $('#balance').val(bal_amt);
  });

// calculate();
 
 
     $('#product_tax').on('change', function (e) {
  
  var total=$('#Over_all_Total').val();
 var tax= $('#product_tax').val();
if(tax.indexOf(hypen) != -1){
 var field = tax.split('-');

 var percent = field[1];

}else if(tax=='Select the Tax'){

  percent="0";
}

else{
percent=tax;
}
//  var field = tax.split('-');

//  var percent = field[1];

 percent=percent.replace("%","");
  var answer = (percent / 100) * parseFloat(total);

  
   var gtotal = parseFloat(total + answer);
   console.log("gtotal :" +gtotal);



  var final_g= $('#final_gtotal').val();


  var amt=parseFloat(answer)+parseFloat(total);
  var num = isNaN(parseFloat(amt)) ? 0 : parseFloat(amt)
    $('#gtotal').val(num); 
  var custo_amt=$('.custocurrency_rate').val(); 
  console.log("numhere :"+num +"-"+custo_amt);
  var value=num*custo_amt;
  var custo_final = isNaN(parseFloat(value)) ? 0 : parseFloat(value)
 $('#vendor_gtotal').val(custo_final);  
 calculate();
 });
   });
   
   function generateRandom10DigitNumber() {
    // Generate a random 10-digit number
    const min = Math.pow(10, 9); // 10^9
    const max = Math.pow(10, 10) - 1; // 10^10 - 1
    const randomNumber = Math.floor(Math.random() * (max - min + 1)) + min;
    return randomNumber;
}





 





 


// var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
//                      var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';
//    $(document).on('click', '#pay_now', function (event) {
//        event.preventDefault();


       
//       //  var unq_inv=$('#pay_id').val();

//     var dataString = {
//        dataString : $('#bulk_payment_form').serialize()
                  
//     };
                    
//    dataString[csrfName] = csrfHash;
//        $.ajax({
//            type: 'POST',
//            data: $('#bulk_payment_form').serialize(),
//            dataType: 'json',
//             url: '<?php echo base_url();?>Cpurchase/bulk_payment',
//            success: function (result) {
//     $('#payment_history_modal').modal('hide');
//                  $("#bodyModal1").html("Payment Completed Successfully");
//       $('#myModal1').modal('show');
//       window.setTimeout(function(){
//           $('.modal').modal('hide');
         
//    $('.modal-backdrop').remove();
//    },2000);
//            },
//            error: function (xhr, status, error) {
//             $('#payment_history_modal').modal('hide');
//                  $("#bodyModal1").html("Payment Completed Successfully");
//       $('#myModal1').modal('show');
//       window.setTimeout(function(){
//           $('.modal').modal('hide');
         
//    $('.modal-backdrop').remove();
//    },2000);
//            }
//        });
//    });






var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
                  var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';
$(document).on('click', '#pay_now', function (event) {
    event.preventDefault();
 var dataString = {
                          dataString : $('#bulk_payment_form').serialize()
                     };
                     dataString[csrfName] = csrfHash;
    $.ajax({
        type: 'POST',
        data: $('#bulk_payment_form').serialize(),
        dataType: 'json',
         url: '<?php echo base_url();?>Cpurchase/bulk_payment',
 


success: function (result) {
    $('#payment_history_modal').modal('hide');
                 $("#bodyModal1").html("Payment Completed Successfully");
      $('#myModal1').modal('show');
      window.setTimeout(function(){
          $('.modal').modal('hide');
         
   $('.modal-backdrop').remove();
   location.reload();

   },2000);
           },
           
 
          
       });
   });





$(document).on('click', '#edit_payment', function (event) {
var csrf_token = {
    <?php echo $this->security->get_csrf_token_name(); ?>: '<?php echo $this->security->get_csrf_hash(); ?>'
};
    var tableData = [];
    $('#toggle_table tbody tr').each(function () {
        var rowData = {
         
            date: $(this).find('td:eq(0)').text(),
            referenceNo: $(this).find('td:eq(1)').text(),
            bankName: $(this).find('td:eq(2)').text(),
            amountPaid: $(this).find('td:eq(3)').text(),
             balanceamount: $(this).find('td:eq(4)').text(),
              detail: $(this).find('td:eq(5)').text(),
             payment : $('#payment_id').val(),
             gtotal : $('#vendor_gtotal').val(),
               t_amt_paid : $('#tl_amt_pd').val(),
            t_bal_amt : $('#my_bal_1').val(),
            bill_bo : $('#invoice_no').val()
        };
        tableData.push(rowData);
    });

    var postData = {
                          tableData: tableData
                     };
                     postData[csrfName] = csrfHash;
 

    // Perform an AJAX request to send the data to the controller
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "<?php echo base_url(); ?>Cinvoice/payment_edit_exp",
        data: postData,
         success: function (response) {
             $('#payment_history_modal').modal('hide');
              $("#bodyModal1").html("Updated Successfully");
   $('#myModal1').modal('show');
   window.setTimeout(function(){
       $('.modal').modal('hide');
      
$('.modal-backdrop').remove();
},2000);
        },
        error: function (error) {
          $('#payment_history_modal').modal('hide');
            $("#bodyModal1").html("Updated Successfully");
   $('#myModal1').modal('show');
   window.setTimeout(function(){
       $('.modal').modal('hide');
      
$('.modal-backdrop').remove();
},2000);
        }
    });

    // Prevent the default form submission
    event.preventDefault();
});
   $('#payment_history').click(function (event) {
        $('#current_in_id').val($('#invoice_no').val());
    var dataString = {
        dataString: $("#histroy").serialize()
    };
    dataString[csrfName] = csrfHash;

    $.ajax({
        type: "POST",
        dataType: "json",
      url:"<?php echo base_url(); ?>Cpurchase/payment_history_purchase",
        data: $("#histroy").serialize(),

        success: function (data) { 

var basedOnCustomer = data.based_on_customer;
var overallGTotal = parseFloat(data.overall[0].overall_gtotal);
var overall_due = parseFloat(data.overall[0].overall_due);
var overall_paid = parseFloat(data.overall[0].overall_paid);
 console.log("OVER : "+overallGTotal);
 var gt = $('#vendor_gtotal').val();
            var amtpd = data.amt_paid;

            var bal = $('#vendor_gtotal').val() - data.amt_paid;
            
            
          
               var total = "<table id='table2' class='newtable table table-striped table-bordered'><tbody><tr><td rowspan='2' style='vertical-align: middle;text-align-last: center;'><b>Grand Total :  <?php  echo $currency;  ?>"+$('#vendor_gtotal').val()+"<b></td><td class='td' style='text-align:end;border-right: hidden;'><b>Total Amount Paid :<b></td><td style='text-align:start;'><?php  echo $currency;  ?><span class='amt_paid_update'><input type='text' id='tl_amt_pd' value='"+data.amt_paid+"' name='tl_amt_pd'/></span></td><td><input type='hidden' value='"+$('#vendor_gtotal').val()+"' name='t_unique'/><span style='font-weight:bold;'>INVOICE NO</span> :<input type='hidden' id='unq_inv' value='"+$('#invoice_no').val()+"' name='unq_inv'/>"+$('#invoice_no').val()+"</td>               <td rowspan='2' style='vertical-align: middle;text-align-last: center;'><b>Advance :   <input type='text' name='advanceamount' id='advanceamount' readonly ></td>                                                      </tr><tr><td class='td' style='text-align:end;'><b>Balance :<input type='text' id='my_bal_1' value='"+bal+"' name='my_bal_1'/><b></td><td class='due_pay' style='display:none;' id='balance-cell' data-currency='<?php  echo $currency;  ?>'>"+bal +"</td><td  data-currency='<?php echo $currency; ?>'><span style='font-weight:bold;'>Amount to Pay : </span><input type='text' id='amount_pay_unique' class='amount_pay' readonly='readonly' style='text-align:center;' name='amount_pay_1'/></td><td style='display:none'><input type='text'  value='<?php if($payment_id){ echo $payment_id; }else{ echo $payment_id_new;}?>' name='payment_id_this_invoice' class='payment_id_val' id='payment_id'/></td><td style='display:none' class='' data-currency='<?php echo $currency; ?>'><input type='text' name='updated_bal_uniq' class='balance-col'/></td><td> <input type='text' id='total-amount' placeholder='Enter Amount To Distribute'></td></tr></tbody></table>"
             var table_header1 = "<div> </div>  <thead><tr><td ><input type='hidden'  value='<?php  echo $supplier_id;  ?>' name='supplier_id' /></tr></thead><tbody>";
                   var table_header = "<div class='toggle-button' onclick='toggleTable()'>Payment History &#9660;</div><table id='toggle_table' class='table table-striped table-bordered'><thead style='FONT-WEIGHT:BOLD;'><tr><td style='display:none;'><input type='text'  value='<?php if($all_invoice[0]['payment_id']){ echo $all_invoice[0]['payment_id']; }else{ echo $payment_id_new;}?>' name='payment_id_this_invoice' class='payment_id_val' id='payment_id'/></td><td>Payment Date</td><td>Reference.NO</td><td>Bank Name</td><td>Amount Paid</td><td>Balance</td><td>Details</td> <td>Payment Id</td> <td>Delete</td> </tr></thead><tbody>";
                   
                       var table_footer = "</tbody><tfoot><tr><td style='text-align: center;vertical-align: middle;' colspan='7' ><input type='button' class='btn' style='text-align:center;color:white;background-color:#38469f;font-weight:bold';  value='Update' id='edit_payment'/></td></tr></tfoot></table>";

           
           
           
            var html = "";
            var count = 1;

            // data.payment_get.forEach(function (element) {
            //     html += "<tr><td>" + element.payment_date + "</td><td>" + element.reference_no + "</td><td>" + element.bank_name + "</td><td  class='editable-amount-paid' contenteditable='true' data-currency='<?php echo $currency; ?>'>" + element.amt_paid + "<input type='hidden' class='editable-input-4' name='editable-input-4' /></td><td class='balance-cell' contenteditable='false'>" + element.balance + "<input type='text' class='edit_balance' name='edit_balance' /></td><td>" + element.details + "</td><td style='display:none;'><input type='hidden'  class='payment_id_val' id='payment_id'/></td></tr>";
            //     count++;
            // });
            
            
                data.payment_get.forEach(function (element) {
                    html += "<tr>" +
    "<td contenteditable='true'>" + element.payment_date + "</td>" +
    "<td contenteditable='true'>" + element.reference_no + "</td>" +
    "<td contenteditable='true'>" + element.bank_name + "</td>" +
    "<td class='editable-amount-paid' contenteditable='true' data-currency='<?php echo $currency; ?>'>" +  "<span class='palist'>" + element.amt_paid + "</span>" +
    "<input type='hidden' class='editable-input-4' name='editable-input-4' /></td>" +
    "<td class='balance-cell' contenteditable='false'>" + "<span class='balist'>" +  element.balance +"</span>" +
    "<input type='text' class='edit_balance' name='edit_balance' /></td>" +
    "<td contenteditable='true'>" + element.details + "</td>" +
    "<td style='display:none;'><input type='text' class='payment_id_val' id='payment_id'/></td>" +
    "<td><input type='text' value='<?php  if($payment_id){ echo $payment_id; }else{ echo $payment_id_new;}?>'  name='pay_id' class='pay_id' id='pay_id'/></td>" +
    "<td>" +
    "<a class='payinfodelete btnclr btn btn-sm'   id='payinfodelete'    onclick='return confirm(\"<?php echo display('are_you_sure') ?>\")' " +
    "<i class='fa fa-trash-o' aria-hidden='true'>Delete</i></a>"
    +"</td>" +  "</tr>";
                count++;
            });
            

            // var all = total + table_header + html + table_footer;
            var all = total + table_header + html + table_footer +table_header1;

            // var total1 = "<input type='hidden' name='<?php echo $this->security->get_csrf_token_name();?>' value='<?php echo $this->security->get_csrf_hash();?>'><table id='table1'  class='table table-striped table-bordered'><tr><td colspan='3' style='border-top: hidden!important;background-color: white;text-align:center;font-weight:bold;font-size:18px;'>LIST OF DUE INVOICES</td></tr><tr><td rowspan='2' style='vertical-align: middle;text-align-last: center;'><b>Grand Total :  <?php  echo $currency;  ?>"+overallGTotal.toFixed(2)+"<b></td><td class='td' style='text-align:center;border-right: hidden;'><b>Total Amount Paid :<b></td> <td style='text-align:start;'><?php  echo $currency;  ?><span class='amt_paid_update'><input type='text' id='tl_amt_pd' value='"+data.amt_paid+"' name='tl_amt_pd'/></span></td>                   </tr></tr><td class='td' style='border-right: hidden;'><b>Balance :<b></td>            <td   style='text-align:start;'> <?php  echo $currency;  ?><input type='text' id='my_bal_1' value='"+bal+"' name='my_bal_1'/><b></td>                   </tr></table>"
          
            var total1 = "<input type='hidden' name='<?php echo $this->security->get_csrf_token_name();?>' value='<?php echo $this->security->get_csrf_hash();?>'><table id='table1'  class='table table-striped table-bordered'><tr><td colspan='3' style='border-top: hidden!important;background-color: white;text-align:center;font-weight:bold;font-size:18px;'>LIST OF DUE INVOICES</td></tr><tr><td rowspan='2' style='vertical-align: middle;text-align-last: center;'><b>Grand Total :  <?php  echo $currency;  ?>"+overallGTotal.toFixed(2)+"<b></td><td class='td' style='text-align:center;border-right: hidden;'><b>Total Amount Paid :<b></td><td><?php  echo $currency;  ?>"+overall_paid.toFixed(2)+"</td></tr></tr><td class='td' style='border-right: hidden;'><b>Balance :<b></td><td style='text-align:start;' class='bcm'  id='balance-cell' data-currency='<?php  echo $currency;  ?>'>"+parseFloat(overall_due.toFixed(2)) +"</td></tr></table>"

          
            var table_header1 = "<table class='newtable-second table table-striped table-bordered'><thead style='FONT-WEIGHT:BOLD;'><tr><td><div id='distribute-container'> </div></td><td style='width:60px;'>Invoice No</td><td style='width:100px;'>Total Amount</td><td style='width:200px;'>Amount Paid</td><td style='width:200px;'>Balance</td><td style='width:200px;'>Amount to Pay</td><td class='balance-column' style='width:200px;'>Updated Balance</td></tr></thead><tbody>";
            // var table_footer1 = "</tbody><tfoot><tr><td colspan='5'></td><td class='t_amt_pay'></td><td  style='display:none;' class='balance-col t_bal_pay'></td></tr></tfoot></table>";
            var table_footer1 = "</tbody><tfoot><tr><td colspan='5'></td><td class='t_amt_pay'></td><td  style='display:none;' class='balance-col t_bal_pay'></td></tr></tfoot></table>";

           
            var html1 = "";
            var count1 = 1;


            for (var invoiceId in basedOnCustomer) {
    if (basedOnCustomer.hasOwnProperty(invoiceId)) {
  
        var element = basedOnCustomer[invoiceId];
             var pay_id=element.payment_id;
       console.log("PAY :"+pay_id);
      var random10DigitNumber='';
      if(pay_id=='' || pay_id =='0'){
  random10DigitNumber = generateRandom10DigitNumber();
      }else{
         random10DigitNumber=pay_id;
      }
            html1 += "<tr><td style='display:none;'><input type='hidden' value='"+random10DigitNumber+"' name='payment_id[]'/></td><td> <input type='checkbox' id='<?php echo $count1; ?>' class='checkbox-distribute'></td><td><input type='text' readonly style='text-align:center;'  value='" + element.chalan_no + "' name='invoice_no[]'/></td><td><input type='text' readonly  class='g_pament' value='" + element.grand_total_amount + "' name='total_amt[]' style='text-align:center;'/></td><td>" + element.paid_amount + "</td><td class='due_pay' data-currency='<?php echo $currency; ?>'>" + element.balance + "</td><td  data-currency='<?php echo $currency; ?>'><input type='text' id='amount_pay' class='amount_pay' style='text-align:center;' name='amount_pay[]'/></td><td    class='balance-column' data-currency='<?php echo $currency; ?>'><input type='text' name='updated_bal[]' readonly class='balance-col'/></td></tr>";
                count1++;
    }
}
  all +=  total1 + table_header1 + html1 + table_footer1;
 var total2 = ""
            var table_header2 = "<div id='pay_now_table'><table class='table table-striped table-bordered'><tr><th>Date</th><th>Bank</th><th>Reference No</th><th>Payment Amount</th><th>Action</th></tr><tr><td><input type='date' name='bulk_payment_date' value='<?php echo html_escape($date); ?>'/></td><td><select name='bulk_bank' id='bank'  class='form-control bankpayment' > <option value='JPMorgan Chase'>JPMorgan Chase</option> <option value='New York City'>New York City</option> <option value='Bank of America'>Bank of America</option> <option value='Citigroup'>Citigroup</option> <option value='Wells Fargo'>Wells Fargo</option> <option value='Goldman Sachs'>Goldman Sachs</option> <option value='Morgan Stanley'>Morgan Stanley</option> <option value='U.S. Bancorp'>U.S. Bancorp</option> <option value='PNC Financial Services'>PNC Financial Services</option> <option value='Truist Financial'>Truist Financial</option> <option value='Charles Schwab Corporation'>Charles Schwab Corporation</option> <option value='TD Bank, N.A.'>TD Bank, N.A.</option> <option value='Capital One'>Capital One</option> <option value='The Bank of New York Mellon'>The Bank of New York Mellon</option> <option value='State Street Corporation'>State Street Corporation</option> <option value='American Express'>American Express</option> <option value='Citizens Financial Group'>Citizens Financial Group</option> <option value='HSBC Bank USA'>HSBC Bank USA</option> <option value='SVB Financial Group'>SVB Financial Group</option> <option value='First Republic Bank '>First Republic Bank </option> <option value='Fifth Third Bank'>Fifth Third Bank</option> <option value='BMO USA'>BMO USA</option> <option value='USAA'>USAA</option> <option value='UBS'>UBS</option> <option value='M&T Bank'>M&T Bank</option> <option value='Ally Financial'>Ally Financial</option> <option value='KeyCorp'>KeyCorp</option> <option value='Huntington Bancshares'>Huntington Bancshares</option> <option value='Barclays'>Barclays</option> <option value='Santander Bank'>Santander Bank</option> <option value='RBC Bank'>RBC Bank</option> <option value='Ameriprise'>Ameriprise</option> <option value='Regions Financial Corporation'>Regions Financial Corporation</option> <option value='Northern Trust'>Northern Trust</option> <option value='BNP Paribas'>BNP Paribas</option> <option value='Discover Financial'>Discover Financial</option> <option value='First Citizens BancShares'>First Citizens BancShares</option> <option value='Synchrony Financial'>Synchrony Financial</option> <option value='Deutsche Bank'>Deutsche Bank</option> <option value='New York Community Bank'>New York Community Bank</option> <option value='Comerica'>Comerica</option> <option value='First Horizon National Corporation'>First Horizon National Corporation</option> <option value='Raymond James Financial'>Raymond James Financial</option> <option value='Webster Bank'>Webster Bank</option> <option value='Western Alliance Bank'>Western Alliance Bank</option> <option value='Popular, Inc.'>Popular, Inc.</option> <option value='CIBC Bank USA'>CIBC Bank USA</option> <option value='East West Bank'>East West Bank</option> <option value='Synovus'>Synovus</option> <option value='Valley National Bank'>Valley National Bank</option> <option value='Credit Suisse '>Credit Suisse </option> <option value='Mizuho Financial Group'>Mizuho Financial Group</option> <option value='Wintrust Financial'>Wintrust Financial</option> <option value='Cullen/Frost Bankers, Inc.'>Cullen/Frost Bankers, Inc.</option> <option value='John Deere Capital Corporation'>John Deere Capital Corporation</option> <option value='MUFG Union Bank'>MUFG Union Bank</option> <option value='BOK Financial Corporation'>BOK Financial Corporation</option> <option value='Old National Bank'>Old National Bank</option> <option value='South State Bank'>South State Bank</option> <option value='FNB Corporation'>FNB Corporation</option> <option value='Pinnacle Financial Partners'>Pinnacle Financial Partners</option> <option value='PacWest Bancorp'>PacWest Bancorp</option> <option value='TIAA'>TIAA</option> <option value='Associated Banc-Corp'>Associated Banc-Corp</option> <option value='UMB Financial Corporation'>UMB Financial Corporation</option> <option value='Prosperity Bancshares'>Prosperity Bancshares</option> <option value='Stifel'>Stifel</option> <option value='BankUnited'>BankUnited</option> <option value='Hancock Whitney'>Hancock Whitney</option> <option value='MidFirst Bank'>MidFirst Bank</option> <option value='Sumitomo Mitsui Banking Corporation'>Sumitomo Mitsui Banking Corporation</option> <option value='Beal Bank'>Beal Bank</option> <option value='First Interstate BancSystem'>First Interstate BancSystem</option> <option value='Commerce Bancshares'>Commerce Bancshares</option> <option value='Umpqua Holdings Corporation'>Umpqua Holdings Corporation</option> <option value='United Bank (West Virginia)'>United Bank (West Virginia)</option> <option value='Texas Capital Bank'>Texas Capital Bank</option> <option value='First National of Nebraska'>First National of Nebraska</option> <option value='FirstBank Holding Co'>FirstBank Holding Co</option> <option value='Simmons Bank'>Simmons Bank</option> <option value='Fulton Financial Corporation'>Fulton Financial Corporation</option> <option value='Glacier Bancorp'>Glacier Bancorp</option> <option value='Arvest Bank'>Arvest Bank</option> <option value='BCI Financial Group'>BCI Financial Group</option> <option value='Ameris Bancorp'>Ameris Bancorp</option> <option value='First Hawaiian Bank'>First Hawaiian Bank</option> <option value='United Community Bank'>United Community Bank</option> <option value='Bank of Hawaii'>Bank of Hawaii</option> <option value='Home BancShares'>Home BancShares</option> <option value='Eastern Bank'>Eastern Bank</option> <option value='Cathay Bank'>Cathay Bank</option> <option value='Pacific Premier Bancorp'>Pacific Premier Bancorp</option> <option value='Washington Federal'>Washington Federal</option> <option value='Customers Bancorp'>Customers Bancorp</option> <option value='Atlantic Union Bank'>Atlantic Union Bank</option> <option value='Columbia Bank'>Columbia Bank</option> <option value='Heartland Financial USA'>Heartland Financial USA</option> <option value='WSFS Bank'>WSFS Bank</option> <option value='Central Bancompany'>Central Bancompany</option> <option value='Independent Bank'>Independent Bank</option> <option value='Hope Bancorp'>Hope Bancorp</option> <option value='SoFi'>SoFi</option> <?php foreach($bank_list as $b){ ?> <option value='<?=$b['bank_name']; ?>'><?=$b['bank_name']; ?></option> <?php } ?> </select></td><td><input type='text' name='bulk_pay_ref' placeholder='Ref No'/></td><td class='t_amt_pay'></td>";
            var table_footer2 = "<td><input type='submit' style='color:white;background-color: #38469f;padding:2px;font-weight:bold;' id='pay_now' value='PAY NOW'/></td></tr></tbody></table></div>";
            var html2 = "";
            var count2 = 1;
  all +=  total2 + table_header2 + html2 + table_footer2;

            $('#salle_list').html(all);
            $('#payment_history_modal').modal('show');
              $('#pay_now_table').hide();
              $('.balance-column').hide();
  var amountPaidCells = document.querySelectorAll('#salle_list tbody tr td:nth-child(5)'); // Assuming "Amount Paid" is the 5th column
            amountPaidCells.forEach(function (cell) {
                cell.addEventListener('input', function () {
                    updateBalances();
                 
                });
            });
        }
    });

    event.preventDefault();
});
var amountPaidCells = document.querySelectorAll('#salle_list tbody td.editable-amount-paid');
amountPaidCells.forEach(function (cell) {
    cell.addEventListener('input', function () {
        updateBalance(cell);
    });
});

function toggleTable() {
  const toggleTable = document.getElementById('toggle_table');
  const toggleButton = document.querySelector('.toggle-button');

  if (toggleTable.style.display === 'none' || toggleTable.style.display === '') {
    toggleTable.style.display = 'table'; // Show the table
    toggleButton.textContent = 'Hide Table \u25B2'; // Change text to "Hide Table" with up arrow
  } else {
    toggleTable.style.display = 'none'; // Hide the table
    toggleButton.textContent = 'Payment History \u25BC'; // Change text to "Payment History" with down arrow
  }
}







   



 // Function to show the tooltip


    // Event handler for when the total amount input changes
$(document).ready(function () {
    $(document).on('keyup', '#total-amount', function () {

        var totalAmount = parseFloat($(this).val().trim());

        if (isNaN(totalAmount)) {
            totalAmount = 0;
        }

        var t_amont = 0;
        var rows = $('.newtable tbody tr');
        var secondTableRows = $('.newtable-second tbody tr');
        var remainingAmount = totalAmount;

        // Fill the first table
        rows.each(function () {
            var amountPayInput = $(this).find('.amount_pay');
            var balanceCell = $(this).find('.td input');
         //  var b=  parseFloat(balanceCell)-parseFloat(amountPayInput);
         //    console.log('swd'+b);
           
            var balance = parseFloat(balanceCell.val());
  balance = isNaN(balance) ? 0 : balance;
// var amountPaid = parseFloat(amountPayInput.val());
// var b = balance - amountPaid;
// console.log('swd' +amountPaid+'-'+ balance+'='+b);
//   $(this).closest('tr').find('.balance-col').val(b);
            if (balance > 0 && remainingAmount > 0) {
                var amountToPay = Math.min(balance, remainingAmount);
                amountPayInput.val(amountToPay.toFixed(2));
                remainingAmount -= amountToPay;
                t_amont += amountToPay;

                if (amountToPay > 0) {
                    $(this).find('.checkbox-distribute').prop('checked', true);
                }
            } else if (balance <= 0 && remainingAmount > 0) {
        // Share the remainingAmount with the secondTableRows
        var amountToPay = Math.min(Math.abs(balance), remainingAmount);
      //   amountPayInput.val(amountToPay.toFixed(2));
      //   remainingAmount -= amountToPay;
        t_amont += amountToPay;

        if (amountToPay > 0) {
            $(this).find('.checkbox-distribute').prop('checked', true);
        }

    
    } else {
        amountPayInput.val('0.00');
    }
        });
 $(document).on('change', '.checkbox-distribute', function () {
        if (!$(this).prop('checked')) {
            $(this).closest('tr').find('.amount_pay').val('');
            var due_pay= $(this).closest('tr').find('.due_pay').val();
             $(this).closest('tr').find('.balance-column input').val('');
        }
        updateTotalAmountToPay();
    });
        // Distribute any remaining amount to the second table
        secondTableRows.each(function () {
            var checkbox = $(this).find('.checkbox-distribute');
            var amountPayInput = $(this).find('.amount_pay');
            var balanceCell = $(this).find('.due_pay');
            var balance = parseFloat(balanceCell.text());
        //  var b=  parseFloat(balanceCell.text())-parseFloat(amountPayInput.text());
            //console.log('swd'+b);
           
            var balance = parseFloat(balanceCell.text());

var amountPaid = parseFloat(amountPayInput.val());
 var amountToPay1 = Math.min(balance, remainingAmount);
                var b = balance - amountToPay1.toFixed(2);
console.log('swd' +balance+'-'+ amountPaid+'='+b);
  $(this).closest('tr').find('.balance-col').val(b.toFixed(2));
            if (balance > 0 && remainingAmount > 0) {
                var amountToPay = Math.min(balance, remainingAmount);
//                 var b = balance - amountToPay.toFixed(2);
// console.log('swd' +balance+'-'+ amountPaid+'='+b);
//   $(this).closest('tr').find('.balance-col').val(b);
                amountPayInput.val(amountToPay.toFixed(2));
                remainingAmount -= amountToPay;

                if (amountToPay > 0) {
                    checkbox.prop('checked', true);
                }
            } else {
                amountPayInput.val('0.00');
            }
        });

        oninputamount_pay();

        var amttopay = isNaN(t_amont) ? 0 : t_amont;
        if (amttopay == '' || amttopay == '0.00') {
            $('#pay_now_table').hide();
            $('.checkbox-distribute').prop('checked', false);
            $('.amount_pay').val('0.00');
        }
        $('.t_amt_pay').text(amttopay.toFixed(2));
    });
});

// Function to update the balance based on the edited "Amount Paid"
function updateBalance(editedCell) {
    var row = editedCell.parentElement;
    var totalAmountCell = row.querySelector('td[data-currency]');
    var balanceCell = row.querySelector('td.balance-cell');

    var totalAmount = parseFloat(totalAmountCell.textContent);
    var editedAmountPaid = parseFloat(editedCell.textContent);
    var newBalance = totalAmount - editedAmountPaid;

    // Update the balance cell with the new balance
    balanceCell.textContent = newBalance.toFixed(2);
}
function updateBalances() {
   
 
    var grandTotal = $('#grand-total').val();
      // var grandTotal = 3500;
        var totalPaid = 0;

        // Loop through each row
        $('#toggle_table tr').each(function () {
            var $row = $(this);
            var $amountPaid = $row.find('.editable-amount-paid');
            var $balanceCell = $row.find('.balance_cell');

            // Get the amount paid from the input field
            var amountPaid = parseFloat($amountPaid.text());

            // Update the balance cell
            var balance = grandTotal - totalPaid - amountPaid;
            $balanceCell.text(balance);

            // Update the total paid
            totalPaid += amountPaid;
        });
   
}


function updateTotalAmountToPay() {
  var totalAmountToPay = 0;
  
  // Iterate through each "Amount to Pay" input field and sum their values
  $('.amount_pay').each(function () {
    var amount = parseFloat($(this).val()) || 0; // Convert input value to a number, default to 0 if not a valid number
  if($(this).val() =='' || $(this).val() =='0.00'){
   $(this).closest('tr').find('.checkbox-distribute').prop('checked', false);

  }
    totalAmountToPay += amount;
  });
   var amttopay = isNaN(totalAmountToPay) ? 0 : totalAmountToPay;
   if(amttopay =='' || amttopay=='0.00'){
      $('#pay_now_table').hide();
   }
  // Display the sum in the .t_amt_pay element
  $('.t_amt_pay').text(amttopay.toFixed(2));
  
}

function updateTotalbalanceToPay() {
  
  var totalbalanceToPay = 0;
  
  // Iterate through each "Amount to Pay" input field and sum their values
  $('.updated_bal').each(function () {
    var amount1 = parseFloat($(this).val()) || 0; // Convert input value to a number, default to 0 if not a valid number
    totalbalanceToPay += amount1;
  });
  
  // Display the sum in the .t_amt_pay element
  $('.t_bal_pay').text(totalbalanceToPay.toFixed(2));
}


  var totalbalancetopay = 0;
// Add an event listener to all "Amount to Pay" input fields for keyup event
$(document).on('keyup change input', '.amount_pay,#total-amount', function () {
oninputamount_pay();
});
$(document).on('keyup change input', '.amount_pay,#total-amount', function () {

  updateTotalAmountToPay();

var anyAmountPaid = false;
            $('.amount_pay').each(function () {
                if ($(this).val() !== '') {
                    anyAmountPaid = true;
                    return false; // Exit the loop early
                }
            });
            if (anyAmountPaid) {
                $('#pay_now_table').show();
                 $('.balance-column').show();
            } else {
                $('#pay_now_table').hide();
                 $('.balance-column').hide();
            } 
 var amountPaidCell = $(this).val(); // "Amount Paid" cell
    var balanceCell = $(this).closest('tr').find('.due_pay').text(); // "Balance" cell
  var amountPaid = parseFloat(amountPaidCell) || 0; // Get the current "Amount Paid"
    var amountToPay = parseFloat(balanceCell) || 0; // Get the entered "Amount to Pay"
    var updatedBalance = amountToPay-amountPaid; // Calculate the updated balance
 //$(this).closest('tr').find('.updated_bal').val();
  
 
 
 $(this).closest('tr').find('.balance-column').html("<input type='text' id='updated_bal' readonly class='updated_bal' name='updated_bal[]' value="+updatedBalance.toFixed(2)+" />");
updateTotalbalanceToPay();
});
function oninputamount_pay() {
 
  updateTotalAmountToPay();

var anyAmountPaid = false;

            $('.amount_pay').each(function () {
                if ($(this).val() !== '') {
                   
                    anyAmountPaid = true;
                    return false; // Exit the loop early
                }else{
                   $(this).closest('tr').find('td.updated_bal').val('');
                }
            });
            if (anyAmountPaid) {
                $('#pay_now_table').show();
                 $('.balance-column').show();
            } else {
             
                $('#pay_now_table').hide();
                 $('.balance-column').hide();
            }
 var amountPaidCell =$(this).closest('tr').find('amount_pay').val(); // "Amount Paid" cell
    var balanceCell = $(this).closest('tr').find('.due_pay').text(); // "Balance" cell
  var amountPaid = parseFloat(amountPaidCell) || 0; // Get the current "Amount Paid"
    var amountToPay = parseFloat(balanceCell) || 0; // Get the entered "Amount to Pay"
    //  var updatedBalance='';
  //  if(amountPaid){
        updatedBalance  = amountToPay-amountPaid;
        console.log('up_bal :'+updatedBalance);
 
 
 
 
 
  
 
  $(this).closest('tr').find('.balance-col').val(updatedBalance.toFixed(2));
 updateTotalbalanceToPay();
}






$(document).on('input','#total-amount', function () {
 var total_balance_amount = parseFloat($('.bcm').html());
 var amount_to_distribute = parseFloat($('#total-amount').val());
 final=parseFloat(amount_to_distribute)-parseFloat(total_balance_amount);
 if (final > 0) {
     $('#advanceamount').val(final);
 }else{
   $('#advanceamount').val('0.00');
 }
});
$(document).on('keyup change input', '.amount_pay,#total-amount', function () {
   oninputamount_pay();
   });
      $(document).on('keyup change input', '.amount_pay', function () {
//   debugger;
    var total_balance_amount = parseFloat($('.t_amt_pay').html());
 var amount_to_distribute = parseFloat($('#total-amount').val());
 var final=parseFloat(amount_to_distribute)-parseFloat(total_balance_amount);
 if (final > 0) {
     $('#advanceamount').val(final);
 }else{
   $('#advanceamount').val('0.00');
 }
   });























// Initial calculation and display of the total amount
updateTotalAmountToPay();
updateTotalbalanceToPay();



function editRow(button) {
  var row = button.parentNode.parentNode;
  var cells = row.getElementsByTagName("td");

  for (var i = 0; i < cells.length - 1; i++) { // Exclude the last cell with the button
    var cell = cells[i];
    
    // Check if the current cell should be excluded from editing based on header content
    var headerCell = row.parentNode.parentNode.querySelector("thead tr td:nth-child(" + (i + 1) + ")");
    if (headerCell.textContent.trim() !== "Balance" && headerCell.textContent.trim() !== "S.NO") {
      var currentValue = cell.innerHTML;
      var input = document.createElement("input");
      input.type = "text";
      input.value = currentValue;
       var uniqueClassName = "editable-input-" + i; // You can customize the class name generation logic
      input.className = uniqueClassName;
        input.name = "inputField" + i;
      cell.innerHTML = "";
      cell.appendChild(input);
    }
  }

  var saveButton = document.createElement("button");
  saveButton.className = "save-button";
 
  saveButton.style.backgroundColor = '#38469f';
    saveButton.style.color  = 'white';
    saveButton.style.fontWeight = 'bold';
  saveButton.innerHTML = "Update";
  row.setAttribute("data-row-id", "unique_row_id_" + Date.now());
  saveButton.onclick = function () {
    if (saveButton.innerHTML === "Update") {
    // If it's "Save", change it to "Edit"
    saveButton.innerHTML = "Edit";
      saveButton.style.backgroundColor = '#38469f';
    saveButton.style.color  = 'white';
    saveButton.style.fontWeight = 'bold';
    for (var i = 0; i < cells.length - 1; i++) {
    var cell = cells[i];
    var input = cell.querySelector("input");
    var newValue = input.value;
    cell.innerHTML = newValue;

    // Check if the button text is "Edit"
 
      // If it's "Edit," make the input fields uneditable
      input.setAttribute("readonly", "true");
    
  }


      saveButton.onclick = function () {
        editRow(saveButton);
      };
  } else {
    // If it's "Edit", change it back to "Save"
    saveButton.innerHTML = "Update";
      saveButton.style.backgroundColor = '#38469f';
    saveButton.style.color  = 'white';
    saveButton.style.fontWeight = 'bold';
      saveButton.onclick = function () {
        saveRow(saveButton);
      };
  }
    saveRow(row);
  };

  var actionCell = row.getElementsByTagName("td")[cells.length - 1];
  actionCell.innerHTML = "";
  actionCell.appendChild(saveButton);
}

$(document).on('keyup', '.editable-amount-paid', function () {
  
   var gtotal=$('#vendor_gtotal').val();
    const grandTotal = parseFloat(gtotal) || 0;
    console.log("grandTotal :"+grandTotal);
    let cumulativePayment = 0;
let balance_payment = 0;
    $('#toggle_table tbody tr').each(function () {
        const inputField = $(this).find('.editable-amount-paid');
        
        const balanceCell = $(this).find('.balance-cell');
 
        const paymentAmount = parseFloat(inputField.text()) || 0;
         console.log("inputField :"+paymentAmount);
        cumulativePayment += paymentAmount;
$(this).find('.editable-amount-paid input').val(paymentAmount);
        const balance = grandTotal - cumulativePayment;
        balance_payment +=balance;
           console.log("balance :"+grandTotal+"-"+cumulativePayment+"="+balance);
       
           
        balanceCell.text('$' + balance.toFixed(2));
          $(this).find('.edit_balance').val(balance.toFixed(2));
    });
     document.getElementById('tl_amt_pd').value = cumulativePayment.toFixed(2);
     var b=gtotal-cumulativePayment;
      document.getElementById('my_bal_1').value = b.toFixed(2);
});
  $(document).on('click','.save-button',function (event) {
  var row1 = $(this).closest('tr');
      var row = $(this).closest('table').find('tr'); // Get the closest table row
      var name =  $(this).closest('table').find('tr').find('td:eq(0)').text(); // Extract data from the first column
      var payment_date =  $(this).closest('table').find('tr').find('.editable-input-1').val(); // Extract data from the second column
 var ref =  $(this).closest('table').find('tr').find('.editable-input-2').val();
  var b_name =  $(this).closest('table').find('tr').find('.editable-input-3').val();
   var amt_paid =  $(this).closest('table').find('tr').find('.editable-input-4').val();
     var bal =  row1.find('td.balance-cell').text();
       var detail =  $(this).closest('table').find('tr').find('.editable-input-6').val();
        var payment_id = "<?php if($payment_id){ echo $payment_id; }else{ echo $payment_id_new;}?>";
      // Create a data object to send to the server
      var data = {
        name: name,
        payment_date: payment_date,
        ref: ref,
        b_name: b_name,
        amt_paid: amt_paid,
        bal: bal,
        detail:detail,
        payment_id:payment_id
  
      };
     data[csrfName] = csrfHash;
      // Send an AJAX request to the server-side controller
      $.ajax({
        type: 'POST',
       url:"<?php echo base_url(); ?>Cinvoice/update_payment_data",
        data: data,
        success: function (response) {
          // Handle the response from the server
          console.log(response);
        },
        error: function (error) {
          // Handle any errors
          console.error(error);
        },
      });
         event.preventDefault();
    });
    function saveRow(row) {
      
      var cells = row.getElementsByTagName("td");
  var editButton = row.querySelector("button");

  for (var i = 0; i < cells.length - 1; i++) {
    var cell = cells[i];
    var input = cell.querySelector("input");
    var newValue = input.value;
    cell.innerHTML = newValue;

    // Check if the button text is "Edit"
    if (editButton.innerHTML === "Edit") {
      // If it's "Edit," make the input fields uneditable
      input.setAttribute("readonly", "true");
    }
  }

  var actionCell = row.getElementsByTagName("td")[cells.length - 1];

  // Update the button text to "Edit"
  editButton.innerHTML = "Edit";
    
      editButton.onclick = function () {
        editRow(editButton);
      };

      actionCell.innerHTML = "";
      actionCell.appendChild(editButton);


    }
   
   
   
   
      function addInputField(table) {
   
   const indexLastDot = table.lastIndexOf('_');
   var id = table.slice(indexLastDot + 1);
   
        var $last = $('#addPurchaseItem_'+id + ' tr:last');
   
       var num = id+($last.index()+1);
       
       $('#addPurchaseItem_'+id  + ' tr:last').clone().find('input,select').attr('id', function(i, current) {
           return current.replace(/\d+$/, num);
           
       }).end().appendTo('#addPurchaseItem_'+id );
     
    $.each($('#normalinvoice_'+id  +  '> tbody > tr'), function (index, el) {
               $(this).find(".slab_no").val(index + 1); // Simply couse the first "prototype" is not counted in the list                
           })
   
           
       
     
   }
   $('.custocurrency_rate').on('change textInput input', function (e) {
       calculate();
   });
   
   $('.common_qnt').on('change textInput input', function (e) {
       calculate();
   });
   $('.btotal').on('change textInput input', function (e) {
         var sum=0;
   
        $('.btotal').each(function() {
   var v=$(this).val();
     sum += parseFloat(v);
   });
   $('#Over_all_Total').val(sum.toFixed(2));
  var total=$('#Over_all_Total').val();
 var tax= $('#product_tax').val();
if(tax.indexOf(hypen) != -1){
 var field = tax.split('-');

 var percent = field[1];

}else if(tax=='Select the Tax'){

  percent="0";
}

else{
percent=tax;
}
//  var field = tax.split('-');

//  var percent = field[1];

 percent=percent.replace("%","");
  var answer = (percent / 100) * parseFloat(total);

  
   var gtotal = parseFloat(total + answer);
   console.log("gtotal :" +gtotal);



  var final_g= $('#final_gtotal').val();


  var amt=parseFloat(answer)+parseFloat(total);
  var num = isNaN(parseFloat(amt)) ? 0 : parseFloat(amt)
    $('#gtotal').val(num); 
  var custo_amt=$('.custocurrency_rate').val(); 
  console.log("numhere :"+num +"-"+custo_amt);
  var value=num*custo_amt;
  var custo_final = isNaN(parseFloat(value)) ? 0 : parseFloat(value)
 $('#vendor_gtotal').val(custo_final);   
   });
  
 $(document).on('change input keyup','.sales_amt_sq_ft', function (e) {

   var netheight = $(this).attr('id');
const indexLastDot = netheight.lastIndexOf('_');
var id_num = netheight.slice(indexLastDot + 1);
   var sales_amt_sq_ft=$('#sales_amt_sq_ft_'+id_num).val();
   var net_sq_ft=$('#net_sq_ft_'+id_num).val();
 var netresult =sales_amt_sq_ft* net_sq_ft;
netresult = isNaN(netresult) ? 0 : netresult;
var nresult=netresult.toFixed(3);
$('#'+'sales_slab_amt_'+id_num).val(netresult.toFixed(3));



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
    $(document).on('change input select', '.product_name', function(){
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
   var nresult=netresult.toFixed(3);
   
   $('#'+'net_sq_ft_'+id).val(netresult.toFixed(3));
   var cost_sqft=$('#cost_sq_ft_'+id).val();
   
   
   var sales_sqft=cost_sqft *nresult;
   
   var x = $('#slab_no_'+id).val();
    var serial =parseFloat( $(this).closest('tr').find('td:nth-child(10)').html());
   
   var sales_slab_price=cost_sqft *nresult*x;
   console.log(parseFloat(cost_sqft) +"*"+parseFloat(nresult)+"*"+id);
   $('#'+'sales_slab_amt_'+id).val(sales_slab_price.toFixed(3));
   sales_sqft = isNaN(sales_sqft) ? 0 : sales_sqft;
   $('#'+'sales_amt_sq_ft_'+id).val(sales_sqft.toFixed(3));
   var sumnet=0;
     $(this).closest('table').find('.net_sq_ft').each(function() {
var v=$(this).val();
 if (!isNaN(v) && v.length !== 0) {
          sumnet += parseFloat(v);
        }
});
$('#overall_net_'+idt).val(sumnet.toFixed(3));
    var sumgross=0;

     $(this).closest('table').find('.gross_sq_ft').each(function() {
var v=$(this).val();
 if (!isNaN(v) && v.length !== 0) {
          sumgross += parseFloat(v);
        }
});
$('#overall_gross_'+idt).val(sumgross.toFixed(3));
var total_net=0;
 $('.table').each(function() {
    $(this).find('.net_sq_ft').each(function() {
        var precio = $(this).val();
        if (!isNaN(precio) && precio.length !== 0) {
          total_net += parseFloat(precio);
        }
      });


  });
$('#total_net').val(total_net.toFixed(3)).trigger('change');
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
   });
        $(document).on('change input keyup','.cost_sq_slab', function (e) {
        //    debugger;
             var netheight = $(this).attr('id');
const indexLastDot = netheight.lastIndexOf('_');
var id_num = netheight.slice(indexLastDot + 1);
  
   var sales_slab_amt=$('#cost_sq_slab_'+id_num).val();
   var net_sq_ft=$('#net_sq_ft_'+id_num).val();
 var netresult =sales_slab_amt/net_sq_ft;
netresult = isNaN(netresult) ? 0 : netresult;
var nresult=netresult.toFixed(3);
$('#'+'cost_sq_ft_'+id_num).val(netresult.toFixed(3));
$('#total_amt_'+id_num).val(sales_slab_amt);
   var sales_slab_amt=0;
   $(this).closest('table').find('.cost_sq_slab').each(function() {
        var precio = $(this).val();
        if (!isNaN(precio) && precio.length !== 0) {
          sales_slab_amt += parseFloat(precio);
        }
      });
$(this).closest('table').find('.costperslab').val(sales_slab_amt).trigger('change');
debugger;
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
  var sales_amt_sq_ft=0;
   $(this).closest('table').find('.cost_sq_ft').each(function() {
        var precio = $(this).val();
        if (!isNaN(precio) && precio.length !== 0) {
          sales_amt_sq_ft += parseFloat(precio);
        }
      });
 $(this).closest('table').find('.costpersqft').val(sales_amt_sq_ft).trigger('change');
       var sum=0;
     $(this).closest('table').find('.total_price').each(function() {
var v=$(this).val();
  sum += parseFloat(v);
});
 $(this).closest('table').find('.b_total').val(sum.toFixed(3)).trigger('change');

  });
  $(document).on('change input keyup','.cost_sq_ft', function (e) {
        //    debugger;
 var netheight = $(this).attr('id');
const indexLastDot = netheight.lastIndexOf('_');
var id_num = netheight.slice(indexLastDot + 1);
   var sales_amt_sq_ft=$('#cost_sq_ft_'+id_num).val();
   var net_sq_ft=$('#net_sq_ft_'+id_num).val();
 var netresult =sales_amt_sq_ft* net_sq_ft;
netresult = isNaN(netresult) ? 0 : netresult;
var nresult=netresult.toFixed(3);
$('#'+'cost_sq_slab_'+id_num).val(netresult.toFixed(3));
$(this).closest('tr').find('.total_price').val(netresult.toFixed(3));

   var sales_amt_sq_ft=0;
   $(this).closest('table').find('.cost_sq_ft').each(function() {
        var precio = $(this).val();
        if (!isNaN(precio) && precio.length !== 0) {
          sales_amt_sq_ft += parseFloat(precio);
        }
      });
 $(this).closest('table').find('.costpersqft').val(sales_amt_sq_ft).trigger('change');
var overall_sum=0;
 $('.table').each(function() {
    $(this).find('.total_price').each(function() {
        var precio = $(this).val();
        if (!isNaN(precio) && precio.length !== 0) {
          overall_sum += parseFloat(precio);
        }
      });

     


  });

$('#Over_all_Total').val(overall_sum.toFixed(3)).trigger('change');
    var sales_slab_amt=0;
   $(this).closest('table').find('.cost_sq_slab').each(function() {
        var precio = $(this).val();
        if (!isNaN(precio) && precio.length !== 0) {
          sales_slab_amt += parseFloat(precio);
        }
      });
$(this).closest('table').find('.costperslab').val(sales_slab_amt).trigger('change');
       var sum=0;
     $(this).closest('table').find('.total_price').each(function() {
var v=$(this).val();
  sum += parseFloat(v);
});
 $(this).closest('table').find('.b_total').val(sum.toFixed(3)).trigger('change');
 calculate();
  });
    $(document).on('change input keyup','.sales_slab_amt', function (e) {
      
  var netheight = $(this).attr('id');
const indexLastDot = netheight.lastIndexOf('_');
var id_num = netheight.slice(indexLastDot + 1);
  
   var sales_slab_amt=$('#sales_slab_amt_'+id_num).val();
   var net_sq_ft=$('#net_sq_ft_'+id_num).val();
 var netresult =sales_slab_amt/net_sq_ft;
netresult = isNaN(netresult) ? 0 : netresult;
var nresult=netresult.toFixed(3);
$('#'+'sales_amt_sq_ft_'+id_num).val(netresult.toFixed(3));



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

   
  
    $('#product_tax').on('change', function (e) {
        

     var optionSelected = $("option:selected", this);
    var valueSelected = this.value;
    var total=$('#Over_all_Total').val();
var tax= $('#product_tax').val();
  var percent='';
  var hypen='-';
if(tax.indexOf(hypen) != -1){
 var field = tax.split('-');

 var percent = field[1];

}else if(tax=='Select the Tax'){

  percent="0";
}

else{
percent=tax;
}
 percent=percent.replace("%","");
 var answer = (percent / 100) * parseFloat(total);

  
  var gtotal = parseFloat(total + answer);
  console.log("gtotal :" +gtotal);
  $('#gtotal').val(gtotal); 
  var amt=parseFloat(answer)+parseFloat(total);
  var num = isNaN(parseFloat(amt)) ? 0 : parseFloat(amt)
var custo_amt=$('.custocurrency_rate').val(); 
  console.log("numhere :"+num +"-"+custo_amt);
  var value=num*custo_amt;
  var custo_final = isNaN(parseFloat(value)) ? 0 : parseFloat(value)
 $('#vendor_gtotal').val(custo_final);  
$('#final_gtotal').val(answer);
   $('#hdn').val(valueSelected);
   console.log("taxi :"+valueSelected);
  $('#tax_details').val(answer.toFixed(3) +" ( "+tax+" )");
  calculate();
   payment_info();
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

}else if(tax=='Select the Tax'){

  percent="0";
}

else{
percent=tax;
}debugger;
 percent=percent.replace("%","");
// var field = tax.split('-');

// var percent = field[1];
var answer=0;
   answer =(parseFloat(percent) / 100) * parseFloat(first);
   answer = isNaN(parseFloat(answer)) ? 0 : parseFloat(answer);
   console.log(answer);
   $('#tax_details').val(answer.toFixed(3) +" ( "+tax+" )");

  var gtotal = parseFloat(first + answer);
  console.log(gtotal);
var amt=parseFloat(answer)+parseFloat(first);
 var num = isNaN(parseFloat(amt)) ? 0 : parseFloat(amt);
 var custo_amt=$('.custocurrency_rate').val();
 $("#gtotal").val(num.toFixed(2));  
 console.log(num +"-"+custo_amt);
 localStorage.setItem("customer_grand_amount_sale",num);

 var value=num*custo_amt;
 var custo_final = isNaN(parseFloat(value)) ? 0 : parseFloat(value)
$('#vendor_gtotal').val(custo_final.toFixed(2));
var bal_amt=custo_final-$('#amount_paid').val();
$('#balance').val(bal_amt.toFixed(2));



}
   
       
           var table_count= $("table.normalinvoice").length;
             let dynamic_id=table_count+1;
       function addbundle(){
            $(this).closest('table').find('.addbundle').css("display","none");
         $(this).closest('table').find('.removebundle').css("display","block");
   
   var newdiv = document.createElement('div');
   var tabin="crate_wrap_"+dynamic_id;
   
   newdiv = document.createElement("div");
   
   
// newdiv.innerHTML ='<table  style="border: 2px solid #d7d4d6; class="table normalinvoice table-bordered table-hover" id="normalinvoice_'+ dynamic_id +'"> <thead> <tr> <th rowspan="2" class="text-center" style="width: 170px;" ><?php echo display('product_name'); ?><i class="text-danger">*</i></th> <th rowspan="2"  class="text-center"><?php echo display('Bundle No');?><i class="text-danger">*</i></th> <th rowspan="2"  class="text-center"><?php echo  display('description'); ?></th> <th rowspan="2" style="width:60px;" class="text-center"><?php echo display('Thick ness');?><i class="text-danger">*</i></th> <th rowspan="2" class="text-center"><?php echo display('Supplier Block No');?><i class="text-danger">*</i></th>  <th rowspan="2" class="text-center" ><?php echo display('Supplier Slab No');?><i class="text-danger">*</i> </th> <th colspan="2" style="width:150px;" class="text-center"><?php echo display('Gross Measurement');?><i class="text-danger">*</i> </th> <th rowspan="2" class="text-center"><?php echo display('Gross Sq.Ft');?></th>  <th rowspan="2" style="width:40px;" class="text-center"><?php echo display('Slab No');?><i class="text-danger">*</i></th> <th colspan="2" style="width:150px;" class="text-center"><?php echo display('Net Measure');?><i class="text-danger">*</i></th> <th rowspan="2" class="text-center"><?php echo display('Net Sq.Ft');?></th> <th rowspan="2" class="text-center"><?php echo display('Cost per Sq.Ft');?></th> <th rowspan="2"  class="text-center"><?php echo display('Cost per Slab');?></th> <th rowspan="2"  class="text-center"><?php echo display('sales'); ?><br/><?php echo display('Price per Sq.Ft');?></th> <th rowspan="2"  class="text-center"><?php echo display('Sales Slab Price');?></th> <th rowspan="2" class="text-center"><?php echo display('Weight');?></th> <th rowspan="2" class="text-center"><?php echo display('Origin');?></th>  <th rowspan="2" style="width: 100px" class="text-center"><?php  echo  display('total'); ?></th> <th rowspan="2" class="text-center"><?php  echo  display('action'); ?></th> </tr>  <tr> <th class="text-center"><?php echo display('Width');?></th> <th class="text-center"><?php echo display('Height');?></th> <th class="text-center"><?php echo display('Width');?></th> <th class="text-center"><?php echo display('Height');?></th> </tr>  </thead> <tbody id="addPurchaseItem_'+ dynamic_id +'"> <tr> <input type="hidden" name="tableid[]" id="tableid_'+ dynamic_id +'"/><td> <input   list="magicHouses"  style="width:160px;" name="prodt[]" id="prodt_'+ dynamic_id +'"   class="form-control product_name"  placeholder="Search Product" > <datalist id="magicHouses"> <option value="Select the Product" selected>Select the Product</option> <?php  foreach($product_list as $tx){?>  <option value="<?php echo $tx["product_name"]."-".$tx["product_model"];?>">  <?php echo $tx["product_name"]."-".$tx["product_model"];  ?></option> <?php } ?> </datalist> <input type="hidden" class="common_product autocomplete_hidden_value  product_id_'+ dynamic_id +'" name="product_id[]" id="SchoolHiddenId_'+ dynamic_id +'" /> </td> <td>  <input list="magic_bundle" name="bundle_no[]" id="bundle_no_'+ dynamic_id +'"   class="form-control bundle_no"'+
//   'onchange="this.blur();" /><datalist id="magic_bundle"><?php foreach($bundle as $tx){?> <option value="<?php echo $tx['bundle_no'];?>">  <?php echo $tx['bundle_no'];  ?></option> <?php } ?>'+

// '</datalist></td> <td> <input type="text" id="description_'+ dynamic_id +'" name="description[]" class="form-control" /> </td>  <td > <input type="text" name="thickness[]" id="thickness_'+ dynamic_id +'" required="" class="form-control"/> </td>  <td><input list="magic_supplier_block" name="supplier_block_no[]"  id="supplier_b_no_'+ dynamic_id +'"   class="form-control supplier_block_no"  placeholder="Search Product"  onchange="this.blur();" /><datalist id="magic_supplier_block"><?php foreach($supplier_block_no as $tx){?><option value="<?php echo $tx['supplier_block_no'];?>">  <?php echo $tx['supplier_block_no'];  ?></option><?php } ?></datalist> </td>  <td > <input type="text"  id="supplier_s_no_'+ dynamic_id +'" name="supplier_slab_no[]" required="" class="form-control"/> </td> <td> <input type="text" id="gross_width_'+ dynamic_id +'" name="gross_width[]" required="" class="gross_width  form-control" /> </td> <td> <input type="text" id="gross_height_'+ dynamic_id +'" name="gross_height[]"  required="" class="gross_height form-control" /> </td>  <td > <input type="text"   style="width:60px;" readonly id="gross_sq_ft_'+ dynamic_id +'" name="gross_sq_ft[]" class="gross_sq_ft form-control"/> </td>   <td style="text-align:center;" >  <input type="text"   style="width:20px;" value="1" class="slab_no" id="slab_no_'+ dynamic_id +'" name="slab_no[]"   readonly  required=""/>  </td> <td> <input type="text" id="net_width_'+ dynamic_id +'" name="net_width[]" required="" class="net_width form-control" /> </td> <td> <input type="text" id="net_height_'+ dynamic_id +'" name="net_height[]"    required="" class="net_height form-control" /> </td> <td > <input type="text"   style="width:60px;" readonly id="net_sq_ft_'+ dynamic_id +'" name="net_sq_ft[]" class="net_sq_ft form-control"/> </td> <td>   <span class="input-symbol-euro"><input type="text" id="cost_sq_ft_'+ dynamic_id +'"  name="cost_sq_ft[]"    <?php foreach($this->session->userdata('perm_data') as $test) { $split=explode('-',$test);      if(trim($split[0])=='expenses'  && trim($split[1])=='0100'){  echo "";  } else{echo "readonly";}}?>                                                                                                                  style="width:70px;" placeholder="0.00"  class="cost_sq_ft form-control" ></span>   <td >  <span class="input-symbol-euro"> <input type="text"  id="cost_sq_slab_'+ dynamic_id +'" name="cost_sq_slab[]"    style="width:70px;" placeholder="0.00"  class="cost_sq_slab form-control"/></span>     </td> <td>  <span class="input-symbol-euro">  <input type="text" id="sales_amt_sq_ft_'+ dynamic_id +'"  name="sales_amt_sq_ft[]"  style="width:70px;"  placeholder="0.00" class="sales_amt_sq_ft form-control" /></span>     </td>  <td >  <span class="input-symbol-euro">   <input type="text"  id="sales_slab_amt_'+ dynamic_id +'" name="sales_slab_amt[]"  style="width:70px;" placeholder="0.00"  readonly class="sales_slab_amt form-control"/></td> </span>     </td> <td> <input type="text" id="weight_'+ dynamic_id +'" name="weight[]"  class="weight form-control" /> </td>  <td >  <select  id="origin_'+ dynamic_id +'"    name="origin[]" class="origin form-control">  <?php foreach ($country_code as $key => $value) { ?>  <option value="<?php echo $value['iso']; ?>"><?php echo $value['iso']; ?></option> <?php } ?> </select> </td>  <td > <span class="input-symbol-euro"><input  type="text" class="total_price form-control" style="width:80px;" readonly value="0.00"  id="total_amt_'+ dynamic_id +'"     name="total_amt[]"/></span> </td>  <td style="text-align:center;"> <button  class="delete btn btn-danger" id="delete_'+ dynamic_id +'" type="button" value="Delete" ><i class="fa fa-trash"></i></button> </td>  </tr> </tbody> <tfoot> <tr> <td style="text-align:right;" colspan="8"><b>Gross Sq.Ft :</b></td> <td > <input type="text" id="overall_gross_'+ dynamic_id +'" name="overall_gross[]"   class="overall_gross form-control" style="width: 60px"  readonly="readonly"  /> </td> <td style="text-align:right;" colspan="3"><b>Net Sq.Ft :</b></td> <td > <input type="text" id="overall_net_'+ dynamic_id +'" name="overall_net[]"  class="overall_net form-control"  style="width: 60px"  readonly /> </td>  <td><input type="text" id="costpersqft_'+ dynamic_id +'"  name="costpersqft[]"   style="width:60px;"   readonly   class="costpersqft form-control" /></span></td>'+
// '<td ><input type="text"  id="costperslab_'+ dynamic_id +'" name="costperslab[]"  readonly  style="width:60px;"   class="costperslab form-control"/></td><td>  <input type="text" id="salespricepersqft_'+ dynamic_id +'"  name="salespricepersqft[]"  readonly style="width:60px;"   class="salespricepersqft form-control" /></td><td >   <input type="text"  id="salesslabprice_'+ dynamic_id +'" name="salesslabprice[]"  style="width:60px;"  readonly  class="salesslabprice form-control"/></td> </span><td ><input type="text" id="overall_weight_'+ dynamic_id +'" name="overall_weight[]"  class="overall_weight form-control"  style="width: 60px"  readonly /></td><td style="text-align:right;font-size: 13px;" colspan="1"><b><?php echo "Total" ?> :</b></td><td ><span class="input-symbol-euro">    <input type="text" id="Total_'+ dynamic_id +'" name="total[]"   class="b_total form-control"  style="width: 80px" value="0.00"  readonly="readonly"  /></span></td>  <td  style="text-align:center;"><i id="buddle_'+ dynamic_id +'" onclick="removebundle(); " class="btn-danger removebundle fa fa-minus" aria-hidden="true"></i></td>   </tr> </foot></table> <i id="buddle_'+ dynamic_id +'"  style="float:right;color:white;background-color:#38469f;"   onclick="addbundle(); " class="addbundle fa fa-plus" aria-hidden="true"></i>';  

   newdiv.innerHTML ='<table class="table normalinvoice table-bordered table-hover"     style="border:2px solid #d7d4d6;"               id="normalinvoice_'+ dynamic_id +'"> <thead> <tr> <th rowspan="2" class="text-center" style="width: 170px;" ><?php echo display('product_name'); ?><i class="text-danger">*</i></th> <th rowspan="2"  class="text-center"><?php echo display('Bundle No');?><i class="text-danger">*</i></th> <th rowspan="2"  class="text-center"><?php echo  display('description'); ?></th> <th rowspan="2" style="width:60px;" class="text-center"><?php echo display('Thick ness');?><i class="text-danger">*</i></th> <th rowspan="2" class="text-center"><?php echo display('Supplier Block No');?><i class="text-danger">*</i></th>  <th rowspan="2" class="text-center" ><?php echo display('Supplier Slab No');?><i class="text-danger">*</i> </th> <th colspan="2" style="width:150px;" class="text-center"><?php echo display('Gross Measurement');?><i class="text-danger">*</i> </th> <th rowspan="2" class="text-center"><?php echo display('Gross Sq.Ft');?></th>  <th rowspan="2" style="width:40px;" class="text-center"><?php echo display('Slab No');?><i class="text-danger">*</i></th> <th colspan="2" style="width:150px;" class="text-center"><?php echo display('Net Measure');?><i class="text-danger">*</i></th> <th rowspan="2" class="text-center"><?php echo display('Net Sq.Ft');?></th> <th rowspan="2" class="text-center"><?php echo display('Cost per Sq.Ft');?></th> <th rowspan="2"  class="text-center"><?php echo display('Cost per Slab');?></th> <th rowspan="2"  class="text-center"><?php echo display('sales'); ?><br/><?php echo display('Price per Sq.Ft');?></th> <th rowspan="2"  class="text-center"><?php echo display('Sales Slab Price');?></th> <th rowspan="2" class="text-center"><?php echo display('Weight');?></th> <th rowspan="2" class="text-center"><?php echo display('Origin');?></th>  <th rowspan="2" style="width: 100px" class="text-center"><?php  echo  display('total'); ?></th> <th rowspan="2" class="text-center"><?php  echo  display('action'); ?></th> </tr>  <tr> <th class="text-center"><?php echo display('Width');?></th> <th class="text-center"><?php echo display('Height');?></th> <th class="text-center"><?php echo display('Width');?></th> <th class="text-center"><?php echo display('Height');?></th> </tr>  </thead> <tbody id="addPurchaseItem_'+ dynamic_id +'"> <tr> <input type="hidden" name="tableid[]" id="tableid_'+ dynamic_id +'"/><td> <input   list="magicHouses"  style="width:160px;" name="prodt[]" id="prodt_'+ dynamic_id +'"   class="form-control product_name"  placeholder="Search Product" > <datalist id="magicHouses"> <option value="Select the Product" selected>Select the Product</option> <?php  foreach($product_list as $tx){?>  <option value="<?php echo $tx["product_name"]."-".$tx["product_model"];?>">  <?php echo $tx["product_name"]."-".$tx["product_model"];  ?></option> <?php } ?> </datalist> <input type="hidden" class="common_product autocomplete_hidden_value  product_id_'+ dynamic_id +'" name="product_id[]" id="SchoolHiddenId_'+ dynamic_id +'" /> </td> <td>  <input list="magic_bundle" name="bundle_no[]" id="bundle_no_'+ dynamic_id +'"   class="form-control bundle_no"'+
   'onchange="this.blur();" /><datalist id="magic_bundle"><?php foreach($bundle as $tx){?> <option value="<?php echo $tx['bundle_no'];?>">  <?php echo $tx['bundle_no'];  ?></option> <?php } ?>'+
   
   '</datalist></td> <td> <input type="text" id="description_'+ dynamic_id +'" name="description[]" class="form-control" /> </td>  <td > <input type="text" name="thickness[]" id="thickness_'+ dynamic_id +'" required="" class="form-control"/> </td>  <td><input list="magic_supplier_block" name="supplier_block_no[]"  id="supplier_b_no_'+ dynamic_id +'"   class="form-control supplier_block_no"  placeholder="Search Product"  onchange="this.blur();" /><datalist id="magic_supplier_block"><?php foreach($supplier_block_no as $tx){?><option value="<?php echo $tx['supplier_block_no'];?>">  <?php echo $tx['supplier_block_no'];  ?></option><?php } ?></datalist> </td>  <td > <input type="text"  id="supplier_s_no_'+ dynamic_id +'" name="supplier_slab_no[]" required="" class="form-control"/> </td> <td> <input type="text" id="gross_width_'+ dynamic_id +'" name="gross_width[]" required="" class="gross_width  form-control" /> </td> <td> <input type="text" id="gross_height_'+ dynamic_id +'" name="gross_height[]"  required="" class="gross_height form-control" /> </td>  <td > <input type="text"   style="width:60px;" readonly id="gross_sq_ft_'+ dynamic_id +'" name="gross_sq_ft[]" class="gross_sq_ft form-control"/> </td>   <td style="text-align:center;" >  <input type="text"   style="width:20px;" value="1" class="slab_no" id="slab_no_'+ dynamic_id +'" name="slab_no[]"   readonly  required=""/>  </td> <td> <input type="text" id="net_width_'+ dynamic_id +'" name="net_width[]" required="" class="net_width form-control" /> </td> <td> <input type="text" id="net_height_'+ dynamic_id +'" name="net_height[]"    required="" class="net_height form-control" /> </td> <td > <input type="text"   style="width:60px;" readonly id="net_sq_ft_'+ dynamic_id +'" name="net_sq_ft[]" class="net_sq_ft form-control"/> </td> <td>   <span class="input-symbol-euro"><input type="text" id="cost_sq_ft_'+ dynamic_id +'"  name="cost_sq_ft[]"   style="width:70px;" placeholder="0.00"  class="cost_sq_ft form-control" ></span>   <td >  <span class="input-symbol-euro"> <input type="text"  id="cost_sq_slab_'+ dynamic_id +'" name="cost_sq_slab[]"    style="width:70px;" placeholder="0.00"  class="cost_sq_slab form-control"/></span>     </td> <td>  <span class="input-symbol-euro">  <input type="text" id="sales_amt_sq_ft_'+ dynamic_id +'"  name="sales_amt_sq_ft[]"  style="width:70px;"  placeholder="0.00" class="sales_amt_sq_ft form-control" /></span>     </td>  <td >  <span class="input-symbol-euro">   <input type="text"  id="sales_slab_amt_'+ dynamic_id +'" name="sales_slab_amt[]"  style="width:70px;" placeholder="0.00"  class="sales_slab_amt form-control"/></td> </span>     </td> <td> <input type="text" id="weight_'+ dynamic_id +'" name="weight[]"  class="weight form-control" /> </td>  <td >  <select  id="origin_'+ dynamic_id +'"    name="origin[]" class="origin form-control">  <?php foreach ($country_code as $key => $value) { ?>  <option value="<?php echo $value['iso']; ?>"><?php echo $value['iso']; ?></option> <?php } ?> </select> </td>  <td > <span class="input-symbol-euro"><input  type="text" class="total_price form-control" style="width:80px;" readonly value="0.00"  id="total_amt_'+ dynamic_id +'"     name="total_amt[]"/></span> </td>  <td style="text-align:center;"> <button  class="delete btn btn-danger" id="delete_'+ dynamic_id +'" type="button" value="Delete" ><i class="fa fa-trash"></i></button> </td>  </tr> </tbody> <tfoot> <tr> <td style="text-align:right;" colspan="8"><b>Gross Sq.Ft :</b></td> <td > <input type="text" id="overall_gross_'+ dynamic_id +'" name="overall_gross[]"   class="overall_gross form-control" style="width: 60px"  readonly="readonly"  /> </td> <td style="text-align:right;" colspan="3"><b>Net Sq.Ft :</b></td> <td > <input type="text" id="overall_net_'+ dynamic_id +'" name="overall_net[]"  class="overall_net form-control"  style="width: 60px"  readonly /> </td>  <td><input type="text" id="costpersqft_'+ dynamic_id +'"  name="costpersqft[]"   style="width:60px;"   readonly   class="costpersqft form-control" /></span></td>'+
   '<td ><input type="text"  id="costperslab_'+ dynamic_id +'" name="costperslab[]"  readonly  style="width:60px;"   class="costperslab form-control"/></td><td>  <input type="text" id="salespricepersqft_'+ dynamic_id +'"  name="salespricepersqft[]"  readonly style="width:60px;"   class="salespricepersqft form-control" /></td><td >   <input type="text"  id="salesslabprice_'+ dynamic_id +'" name="salesslabprice[]"  style="width:60px;"  readonly  class="salesslabprice form-control"/></td> </span><td ><input type="text" id="overall_weight_'+ dynamic_id +'" name="overall_weight[]"  class="overall_weight form-control"  style="width: 60px"  readonly /></td><td style="text-align:right;font-size: 13px;" colspan="1"><b><?php echo "Total" ?> :</b></td><td ><span class="input-symbol-euro">    <input type="text" id="Total_'+ dynamic_id +'" name="total[]"   class="b_total form-control"  style="width: 80px" value="0.00"  readonly="readonly"  /></span></td>  <td  style="text-align:center;"><i id="buddle_'+ dynamic_id +'" onclick="removebundle(); " class="btn-danger removebundle fa fa-minus" aria-hidden="true"></i></td>   </tr> </foot></table> <i id="buddle_'+ dynamic_id +'"  style="float:right;"   onclick="addbundle(); " class="btnclr addbundle fa fa-plus" aria-hidden="true"></i>';  
   
 
   document.getElementById('content').appendChild(newdiv);
   
   
   dynamic_id++;
   
   
   
   
   }
   $(document).on('click', '.removebundle', function(){
   
    var netheight = $(this).attr('id');
const indexLastDot = netheight.lastIndexOf('_');
var id = netheight.slice(indexLastDot + 1);



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
     $('#'+localStorage.getItem("delete_table")).find('.overall_net').val(sumnet.toFixed(3));
   
   
       var sumgross=0;
   
       $('#'+localStorage.getItem("delete_table")).find('.gross_sq_ft').each(function() {
   var v=$(this).val();
    if (!isNaN(v) && v.length !== 0) {
             sumgross += parseFloat(v);
           }
   
   });
     $('#'+localStorage.getItem("delete_table")).find('.overall_gross').val(sumgross.toFixed(3));
   var total_net=0;
    $('.table').each(function() {
       $(this).find('.net_sq_ft').each(function() {
           var precio = $(this).val();
           if (!isNaN(precio) && precio.length !== 0) {
             total_net += parseFloat(precio);
           }
         });
   
   
   
     });
   $('#total_net').val(total_net.toFixed(3)).trigger('change');
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
   $('#total_weight').val(total_w.toFixed(3)).trigger('change');
   var overall_sum=0;
        $('.table').find('.total_price').each(function() {
   var v=$(this).val();
     overall_sum += parseFloat(v);
   
   });
    $('#Over_all_Total').val(overall_sum.toFixed(3)).trigger('change');
   
   gt(id);
   
    });
   $(document).on('click', '.addbundle', function(){
            $(this).css("display","none");
         $(this).closest('table').find('.removebundle').css("display","block");
    });

    $(document).ready(function(){
     // $('.removebundle').hide();
   $('#amt').hide();
   $('#bal').hide();
       });
       function calculate(){

  var total=$('#Over_all_Total').val();
 var tax= $('#product_tax').val();
  var percent='';
  var hypen='-';
if(tax.indexOf(hypen) != -1){
 var field = tax.split('-');

 var percent = field[1];

}else if(tax=='Select the Tax'){

  percent="0";
}

else{
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
 $('#vendor_gtotal').val(custo_final.toFixed(2)); 
  $('#tax_details').val(answer.toFixed(3) +" ( "+tax+" )");
var bal_amt=custo_final-$('#amount_paid').val();
$('#balance').val(bal_amt.toFixed(2));

}
   
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
var netresult=parseFloat(netwidth) * parseFloat(netheight);
netresult=netresult/144;
netresult = isNaN(netresult) ? 0 : netresult;
var nresult=netresult.toFixed(3);
$('#'+'net_sq_ft_'+id).val(netresult.toFixed(3));
var cost_sq_slab=$('#cost_sq_slab_'+id).val();
var tid=$(this).closest('table').attr('id');
const indexLast = tid.lastIndexOf('_');
var idt = tid.slice(indexLast + 1);
var cost_amt_sq_ft=cost_sq_slab / nresult;
cost_amt_sq_ft = isNaN(cost_amt_sq_ft) ? 0 : cost_amt_sq_ft;
$('#'+'cost_sq_ft_'+id).val(cost_amt_sq_ft.toFixed(3));


var cost_sq_slab=$('#sales_slab_amt_'+id).val();
var tid=$(this).closest('table').attr('id');
const indexLast2 = tid.lastIndexOf('_');
var idt = tid.slice(indexLast2 + 1);
var cost_amt_sq_ft=cost_sq_slab / nresult;
cost_amt_sq_ft = isNaN(cost_amt_sq_ft) ? 0 : cost_amt_sq_ft;
$('#'+'sales_amt_sq_ft_'+id).val(cost_amt_sq_ft.toFixed(3));




 var sumnet=0;
 $(this).closest('table').find('.net_sq_ft').each(function() {
var v=$(this).val();
 if (!isNaN(v) && v.length !== 0) {
          sumnet += parseFloat(v);
        }

});
$('#overall_net_'+idt).val(sumnet.toFixed(3));
var total_net=0;
 $('.table').each(function() {
    $(this).find('.net_sq_ft').each(function() {
        var precio = $(this).val();
        if (!isNaN(precio) && precio.length !== 0) {
          total_net += parseFloat(precio);
        }
      });

     


  });
$('#total_net').val(total_net.toFixed(3)).trigger('change');


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

$('#Over_all_Total').val(overall_sum.toFixed(3)).trigger('change');
$('#Total_'+idt).val(sum);
  var s=0;
   $(this).closest('table').find('.cost_sq_ft').each(function() {
        var precio = $(this).val();
        if (!isNaN(precio) && precio.length !== 0) {
          s += parseFloat(precio);
        }
      });
$(this).closest('table').find('.costpersqft').val(s).trigger('change');

  var ss=0;
   $(this).closest('table').find('.sales_amt_sq_ft').each(function() {
        var precio = $(this).val();
        if (!isNaN(precio) && precio.length !== 0) {
          ss += parseFloat(precio);
        }
      });
$(this).closest('table').find('.salespricepersqft').val(ss).trigger('change');


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
var nresult=netresult.toFixed(3);

$('#'+'gross_sq_ft_'+id).val(netresult.toFixed(3));

    var sumgross=0;

     $(this).closest('table').find('.gross_sq_ft').each(function() {
var v=$(this).val();
 if (!isNaN(v) && v.length !== 0) {
          sumgross += parseFloat(v);
        }

});
$('#overall_gross_'+idt).val(sumgross.toFixed(3));
   

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
var netresult=parseFloat(netwidth) * parseFloat(netheight);
netresult=netresult/144;
netresult = isNaN(netresult) ? 0 : netresult;
var nresult=netresult.toFixed(3);
$('#'+'net_sq_ft_'+id).val(netresult.toFixed(3));
var cost_sqft=$('#cost_sq_ft_'+id).val();
var tid=$(this).closest('table').attr('id');
const indexLast = tid.lastIndexOf('_');
var idt = tid.slice(indexLast + 1);
var sales_slab_price=$('#sales_slab_amt_'+id).val();
var tid=$(this).closest('table').attr('id');

var sales_amt_sq_ft=sales_slab_price / nresult;

sales_amt_sq_ft = isNaN(sales_amt_sq_ft) ? 0 : sales_amt_sq_ft;
$('#'+'sales_amt_sq_ft_'+id).val(sales_amt_sq_ft.toFixed(3));
$('#'+'total_amt_'+id).val(sales_amt_sq_ft.toFixed(3));
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
$('#overall_net_'+idt).val(sumnet.toFixed(3));
    var sumgross=0;

     $(this).closest('table').find('.gross_sq_ft').each(function() {
var v=$(this).val();
 if (!isNaN(v) && v.length !== 0) {
          sumgross += parseFloat(v);
        }

});
$('#overall_gross_'+idt).val(sumgross.toFixed(3));
var total_net=0;
 $('.table').each(function() {
    $(this).find('.net_sq_ft').each(function() {
        var precio = $(this).val();
        if (!isNaN(precio) && precio.length !== 0) {
          total_net += parseFloat(precio);
        }
      });


  });
$('#total_net').val(total_net.toFixed(3)).trigger('change');
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


$('#Over_all_Total').val(overall_sum.toFixed(3)).trigger('change');
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
         //             $("#cost_sq_ft_"+ id_num).val(result[0]['cost_persqft']);
         //   $("#cost_sq_slab_"+ id_num).val(result[0]['cost_perslab']);
         //   $("#sales_slab_amt_"+id_num).val(result[0]['price'])

           $("#total_amt_"+ id_num).val(result[0]['price']);


           $("#cost_sq_ft_"+ id_num).val(result[0]['cost_persqft']);
           $("#cost_sq_slab_"+ id_num).val(result[0]['cost_perslab']);
           $("#sales_slab_amt_"+id_num).val(result[0]['price'])
           $("#sales_amt_sq_ft_"+id_num).val(result[0]['sales_pricepersqft'])




           
          $("#SchoolHiddenId_"+ id_num).val(result[0]['product_id']);
            console.log(result);
        }
    });
    $.ajax({
        type:'POST',
        data: data,
     dataType:"json",
        url:'<?php echo base_url();?>Cinvoice/get_product_info',
        success: function(result, statut) {
            console.log("werwerwerwerwerwerwerwerwer");
            
            if(result.csrfName){
               csrfName = result.csrfName;
               csrfHash = result.csrfHash;
            }
            $("#sales_amt_sq_ft_"+ id_num).val(result[0]['sales_price_sqft']);
            $("#sales_slab_amt_"+ id_num).val(result[0]['sales_slab_price']);


        }
    });

});
   
   
     $(document).on('change','#download_select', function (e) {
   var selected_option=$(this).val();
   if(selected_option=='Invoice'){
    var popout = window.open("<?php  echo base_url(); ?>Cpurchase/purchase_details_data/"+$('#invoice_hdn1').val());
   }else{
       
     var popout = window.open("<?php  echo base_url(); ?>Cpurchase/packing_list_details_data/"+$('#invoice_hdn1').val());
   }
   
   });
     $(document).on('change','#print_select', function (e) {
   var selected_option=$(this).val();
   if(selected_option=='Invoice'){
    var popout = window.open("<?php  echo base_url(); ?>Cpurchase/purchase_details_data_print/"+$('#invoice_hdn1').val());
   }else{
      var popout = window.open("<?php  echo base_url(); ?>Cpurchase/packing_list_details_data_print/"+$('#invoice_hdn1').val());
   }
   
   });
   
   
   //Currency 
   
   
      
</script>

<style>
   .table  tbody td{
      text-align:initial;
   }
     .newtable-second,.table th ,.table tbody {
    text-align:center;
  }
 #toggle_table{
  text-align:center;
 }
   
   #table1,#table2,.newtable {
   text-align:center;
}
   .ui-front,  .ui-selectmenu-text{
   display:none;
   }
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
   a:active{
    color: #fff !important;
   }

   a:hover{
    color: #fff !important;
   }

   a:focus{
    color: #fff !important;
   }
 
</style>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">
   const dt = new DataTransfer(); // Permet de manipuler les fichiers de l'input file
   
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
   



   
   var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
       var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';
       $(document).on('click','.payinfodelete',function (event) {
        event.preventDefault();
     
     
      var payment_id  =   $(this).closest('tr').find('.pay_id').val() ;
      var paid_amt = $(this).closest('tr').find('.palist').text();
      var bal = $(this).closest('tr').find('.balist').text();
      var unq_inv=$('#unq_inv').val();
 
      
      var dataString = {
           bal : bal,
           payment_id : payment_id,
           paid_amt :paid_amt,
           unq_inv:unq_inv

      };
      dataString[csrfName] = csrfHash;
       $.ajax({
           type:"POST",
           dataType:"json",
           url:"<?php echo base_url(); ?>Cpurchase/purchase_delete_the_payment",
       
      data:dataString,
           success:function (data1) {
           console.log(data1);
         $("#bodyModal1").html("Payment Delete Successfully");
          $('#myModal1').modal('show');

         window.setTimeout(function(){
           $('#payment_history_modal').modal('hide');
           $('.modal-backdrop').remove();
          $('#myModal1').modal('hide');
          location.reload();
       }, 2000);
   }
   });
   });
   
   
   
    
</script>




















