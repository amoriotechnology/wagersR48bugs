<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.base64.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/html2canvas.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jspdf.plugin.autotable"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jspdf.umd.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script src="<?php echo base_url() ?>my-assets/js/countrypicker.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<script type="text/javascript" src="<?php echo base_url()?>my-assets/js/tableManager.js"></script>
<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
<script type="text/javascript" src="http://mrrio.github.io/jsPDF/dist/jspdf.debug.js"></script>
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" />
<script type="text/javascript" src="http://www.bacubacu.com/colresizable/js/colResizable-1.5.min.js"></script> 
<!-- Product Purchase js -->
<script src="<?php echo base_url()?>my-assets/js/admin_js/json/product_purchase.js.php" ></script>
<!-- Supplier Js -->
<script src="<?php echo base_url(); ?>my-assets/js/admin_js/json/supplier.js.php" ></script>
<script src="<?php echo base_url()?>my-assets/js/admin_js/purchase.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>my-assets/js/admin_js/packing.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>my-assets/js/admin_js/json/product.js" type="text/javascript"></script>
<!-- Edit Product Start -->







 







<div class="content-wrapper">
   <section class="content-header">
      <div class="header-icon">
        <figure class="one">
               <img src="<?php echo base_url()  ?>asset/images/product.png"  class="headshotphoto" style="height:50px;" />
      </div>
      
        
       
           <div class="header-title">
          <div class="logo-holder logo-9">
      <h1><?php echo ('Edit Product') ?></h1>
       </div>
          
       
       
       
         <small><?php //echo display('add_new_product') ?></small>
         <ol class="breadcrumb" style=" border: 3px solid #d7d4d6;" >
            <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
            <li><a href="#"><?php echo display('product') ?></a></li>
         <li class="active" style="color:orange"><?php echo ('Edit Product') ?></li>
        
        
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







   .wrapper:after, .wrapper:before {
   background-color: white;
   }
   .select2{
   display:none;
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
}
</style>
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
<?php  // echo $_SERVER['REQUEST_URI']; 
   $link = $_SERVER['PHP_SELF'];
   $link_array = explode('/',$link);
   $page = end($link_array);
   
   ?>
<!-- Purchase report -->
<form id="insert_product_from_expense"  method="post">
   <div class="col-sm-12">
   <div class="panel panel-bd lobidrag"  style="border: 3px solid #d7d4d6;">
      <div class="panel-heading" style="height: 55px;" >
         <div class="panel-title">
            <h4><?php //echo display('product_edit') ?> </h4>
            <div id="bloc2" style="float:right;">
               <a   href="<?php echo base_url('Cproduct/manage_product') ?>" class="btnclr btn  m-b-5 m-r-2"><i class="ti-align-justify"> </i> <?php echo ('Manage Product') ?> </a>
            </div>
         </div>
      </div>
      <div class="panel-body">
         <div class="row">
            <div class="col-sm-6">
               <div class="form-group row">
                  <label for="barcode_or_qrcode" class="col-sm-4 col-form-label"><?php echo display('barcode_or_qrcode') ?> <i class="text-danger"></i></label>
                  <div class="col-sm-8">
                     <input type="text" tabindex="3" class="form-control"  style="width: 100%;border: 2px solid #d7d4d6;" value="<?php   echo  $product_detail[0]['barcode'] ?>" name="barcode"  placeholder="Barcode/QR-code" id="barcode"  />
                  </div>
               </div>
            </div>
            <div class="col-sm-6">
               <div class="form-group row">
                  <label for="sell_price" class="col-sm-4 col-form-label"><?php echo display('sell_price') ?> <i class="text-danger">*</i> </label>
                  <div class="col-sm-8">
                     <input class="form-control text-left" id="sell_price" name="price" type="text" value="{price}" required="" style="border: 2px solid #d7d4d6;"  placeholder="0.00" tabindex="5" min="0">
                  </div>
               </div>
            </div>
            <div class="col-sm-6">
               <div class="form-group row">
                  <label for="product_name" class="col-sm-4 col-form-label"><?php echo display('product_name') ?> <i class="text-danger">*</i></label>
                  <div class="col-sm-8">
                     <input class="form-control" name="product_name" type="text"  value="{product_name}"  id="product_name"  style="border: 2px solid #d7d4d6;"  placeholder="<?php echo display('product_name') ?>" required tabindex="1" >
                  </div>
               </div>
            </div>
            <div class="col-sm-6">
               <div class="form-group row">
                  <label for="" class="col-sm-4 col-form-label"><?php echo display('Supplier') ?> <i class="text-danger">*</i> </label>
                  <div class="col-sm-7">
                     <!-- <input class="form-control text-right" id="supplier_id" name="supplier_id" type="text" value="{supplier_name}" required="" style="width:115%;">  -->
                     <select   name="supplier_id"  style="width: 115%;border: 2px solid #d7d4d6;" class="form-control"  required="">
                        <option value="<?php echo $supplier_name;  ?>"><?php echo $supid;  ?> </option>
                        <?php foreach($sup_names_dropdown as $snd) { ?>           
                        <option value="<?php echo $snd['supplier_id'];?>"><?php echo $snd['supplier_name'];?></option>
                        <?php } ?>
                     </select>
                  </div>
               </div>
            </div>
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
            <div class="col-sm-6">
               <div class="form-group row">
                  <label for="product_model" class="col-sm-4 col-form-label"><?php echo display('model') ?> <i class="text-danger">*</i></label>
                  <div class="col-sm-8">
                     <input type="text" tabindex="" class="form-control" id="model"  value="{product_model}"  style="border: 2px solid #d7d4d6;"  name="model" required placeholder="<?php echo display('model') ?>" />
                  </div>
               </div>
            </div>
            <div class="col-sm-6">
               <div class="form-group row">
                  <label for="tax_id" class="col-sm-4 col-form-label"><?php   echo  display('Taxes');?> </label>
                  <div class="col-sm-8">
                     <input type="text" name="tax" class="form-control" id="tax_id" tabindex="4" placeholder=" Tax" style="text-align: left;border: 2px solid #d7d4d6;"  value="{tax}">
                  </div>
               </div>
            </div>
            <div class="col-sm-6">
               <div class="form-group row">
                  <label for="serial_no" class="col-sm-4 col-form-label"><?php echo display('Serial No')?></label>
                  <div class="col-sm-8">
                     <input type="text" tabindex="" class="form-control "   value="{serial_no}" id="serial_no" name="serial_no"   style="border: 2px solid #d7d4d6;"  placeholder="111,abc,XYz"   />
                  </div>
               </div>
            </div>
            <div class="col-sm-6">
               <div class="form-group row">
                  <label for="country" class="col-sm-4 col-form-label"  required="" ><?php echo  display('country')?><i class="text-danger">*</i></label>
                  <div class="col-sm-8">
                     <select class="selectpicker countrypicker form-control"  data-live-search="true" data-default="{country}"
                        name="country" id="country" ></select> 
                  </div>
               </div>
            </div>
            <div class="col-sm-6">
               <div class="form-group row">
                  <label for="quantity" class="col-sm-4 col-form-label"><?php echo display('quantity') ?> <i class="text-danger">*</i></label>
                  <div class="col-sm-8">
                     <input class="form-control" name="quantity"   value="{p_quantity}" type="number" id="quantity"  style="border: 2px solid #d7d4d6;"  placeholder="Enter Product Quantity only" required tabindex="1" >
                  </div>
               </div>
            </div>
            <div class="col-sm-6">
               <div class="form-group row">
                  <label for="category_id" class="col-sm-4 col-form-label"><?php echo display('category') ?></label>
                  <div class="col-sm-7">
                     <select class="form-control" id="category_id"  style="width:115%;border: 2px solid #d7d4d6;" name="category_id" tabindex="3">
                        <option value="<?php echo $category_name;  ?>"><?php echo $category_name; ?></option>
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
                  <label for="unit" class="col-sm-4 col-form-label"><?php echo display('unit') ?></label>
                  <div class="col-sm-7">
                     <select class=" unit  form-control" id="unit" name="unit" style=" width: 115%;border: 2px solid #d7d4d6;" tabindex="-1" aria-hidden="true">
                        <option value="<?php echo "{unit}"  ?>"><?php echo "{unit}"  ?></option>
                        <?php if ($unit_list) { ?>
                        {unit_list}
                        <option value="{unit_name}">{unit_name}</option>
                        {/unit_list}
                        <?php } ?>
                     </select>
                  </div>
               </div>
            </div>
            <div class="col-sm-6">
               <div class="form-group row">
                  <label for="account_category" class="col-sm-4 col-form-label"><?php echo  display('Account Category');?></label>
                  <div class="col-sm-8">
                     <select id="ddl"  name="account_category" class="form-control"   style="border: 2px solid #d7d4d6;"   onchange="configureDropDownLists(this,document.getElementById('ddl2'))">
                        <option value="<?php echo "{account_category}"  ?>"><?php echo "{account_category}"  ?></option>
                        <option value="1000 ASSETS">1000 <?php echo  display('ASSETS');?></option>
                        <option value="1200 RECEIVABLES">1200 <?php echo  display('RECEIVABLES');?></option>
                        <option value="1300 INVENTORIES">1300 <?php echo  display('INVENTORIES');?></option>
                        <option value="1400 PREPAID EXPENSES & OTHER CURRENT ASSETS">1400 <?php echo  display('PREPAID EXPENSES & OTHER CURRENT ASSETS');?></option>
                        <option value="1500 PROPERTY PLANT & EQUIPMENT">1500 <?php echo  display('PROPERTY PLANT & EQUIPMENT');?></option>
                        <option value="1600 ACCUMULATED DEPRECIATION & AMORTIZATION">1600 <?php echo  display('ACCUMULATED DEPRECIATION & AMORTIZATION');?></option>
                        <option value="1700 NON – CURRENT RECEIVABLES">1700 <?php echo  display('NON – CURRENT RECEIVABLES');?></option>
                        <option value="1800 INTERCOMPANY RECEIVABLES & OTHER NON-CURRENT ASSETS">1800 <?php echo  display('INTERCOMPANY RECEIVABLES & OTHER NON-CURRENT ASSETS');?></option>
                        <option value="2000 LIABILITIES & 2100 PAYABLES">2000 <?php echo  display('LIABILITIES & PAYABLES');?></option>
                        <option value="2200 ACCRUED COMPENSATION & RELATED ITEMS">2200 <?php echo  display('ACCRUED COMPENSATION & RELATED ITEMS');?></option>
                        <option value="2300 OTHER ACCRUED EXPENSES">2300 <?php echo  display('OTHER ACCRUED EXPENSES');?></option>
                        <option value="2500 ACCRUED TAXES">2500 <?php echo  display('ACCRUED TAXES');?></option>
                        <option value="2600 DEFERRED TAXES">2600 <?php echo  display('DEFERRED TAXES');?></option>
                        <option value="2700 LONG-TERM DEBT">2700 <?php echo  display('LONG-TERM DEBT');?></option>
                        <option value="2800 INTERCOMPANY PAYABLES & OTHER NON CURRENT LIABILITIES & OWNERS EQUITIES">2800 <?php echo  display('INTERCOMPANY PAYABLES & OTHER NON CURRENT LIABILITIES & OWNERS EQUITIES');?></option>
                        <option value="4000 REVENUE">4000 <?php echo  display('REVENUE');?></option>
                        <option value="5000 COST OF GOODS SOLD">5000 <?php echo  display('COST OF GOODS SOLD');?></option>
                        <option value="6000 – 7000 OPERATING EXPENSES">6000 – 7000 <?php echo  display('OPERATING EXPENSES');?></option>
                     </select>
                  </div>
               </div>
            </div>
            <div class="col-sm-6">
               <div class="form-group row">
                  <label for="image" class="col-sm-4 col-form-label"><?php echo  display('Product Image');?></label>
                  <div class="col-sm-8">
                     <input type="file" name="image" class="form-control" id="image"  style="border: 2px solid #d7d4d6; " tabindex="4">
                  </div>
               </div>
            </div>
            <div class="col-sm-6">
               <div class="form-group row">
                  <label for="account_sub_category" class="col-sm-4 col-form-label">Account Subcategory</label>
                  <div class="col-sm-8">
                     <select class="form-control" name="account_sub_category"  style="border: 2px solid #d7d4d6;"   id="ddl2">
                        <option value="<?php echo "{account_sub_category}"  ?>"><?php echo "{account_sub_category}"  ?></option>
                     </select>
                  </div>
               </div>
            </div>
            <div class="col-sm-6"> 
            </div>
            <div class="col-sm-6">
               <div class="form-group row">
                  <label for="port_of_discharge" class="col-sm-4 col-form-label">Account Subcategory</label>
                  <div class="col-sm-8">
                     <input class="form-control" name ="account_subcat" id="account_subcat" type="text"  style="border: 2px solid #d7d4d6;"   value="{account_subcat}" placeholder=" Account Sub Category"  tabindex="1" >
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-sm-12">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="col-sm-6">
                        <div class="form-group row">
                           <!-- <label for="tax_id" class="col-sm-4 col-form-label">Product Id  </label> -->
                           <div class="col-sm-8">
                              <input class="form-control"  type="hidden"  id="product_id" value= <?php echo $product_detail[0]['product_id']; ?> name="product_id" readonly  >
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <br/>
               <div class="table-responsive product-supplier">
                  <table class="table table-bordered table-hover normalinvoice"  id="producttable_1"  style="border: 2px solid #d7d4d6;"  >
                     <thead>
                        <tr class="btnclr" >
                           <th rowspan="2"  class="text-center"><?php echo  display('description'); ?></th>
                           <th rowspan="2" class="text-center" style="width:50px;"><?php echo display('Thick ness');?><i class="text-danger">*</i></th>
                           <th rowspan="2" class="text-center"><?php echo display('Supplier Block No');?><i class="text-danger">*</i></th>
                           <th rowspan="2" class="text-center" ><?php echo display('Supplier Slab No');?><i class="text-danger">*</i> </th>
                           <th colspan="2"  class="text-center"><?php echo display('Gross Measurement');?><i class="text-danger">*</i> </th>
                           <th rowspan="2" class="text-center"><?php echo display('Gross Sq.Ft');?></th>
                           <th rowspan="2"  class="text-center"><?php echo display('Bundle No');?><i class="text-danger">*</i></th>
                           <th rowspan="2"  class="text-center"><?php echo display('Slab No');?><i class="text-danger">*</i></th>
                           <th colspan="2"  class="text-center"><?php echo display('Net Measure');?><i class="text-danger">*</i></th>
                           <th rowspan="2" class="text-center"><?php echo display('Net Sq.Ft');?></th>
                           <th rowspan="2"  class="text-center" style="width:80px;"><?php echo display('Cost per Sq.Ft');?></th>
                           <th rowspan="2"  class="text-center" style="width:80px;"><?php echo display('Cost per Slab');?></th>
                           <th rowspan="2"  class="text-center" style="width:80px;"><?php echo display('sales'); ?><br/><?php echo display('Price per Sq.Ft');?></th>
                           <th rowspan="2"  class="text-center" style="width:80px;"><?php echo display('Sales Slab Price');?></th>
                           <th rowspan="2" class="text-center" style="width:30px;"><?php echo display('Weight');?></th>
                           <th rowspan="2" class="text-center" style="width:50px;"><?php echo display('Origin');?></th>
                           <th rowspan="2" style="width: 100px" class="text-center"><?php  echo  display('total'); ?></th>
                           <th rowspan="2" class="text-center"><?php  echo  display('action'); ?></th>
                        </tr>
                        <tr>
                           <th class="text-center btnclr"><?php echo display('Width');?></th>
                           <th class="text-center btnclr"><?php echo display('Height');?></th>
                           <th class="text-center btnclr"><?php echo display('Width');?></th>
                           <th class="text-center btnclr"><?php echo display('Height');?></th>
                        </tr>
                     </thead>
                     <tbody id="addPurchaseItem">
                        <?php 
                           $k=1;
                           if($data_products){
                           foreach($data_products as $dps){ ?>
                        <tr>
                           <td>
                              <input type="text" id="description_table_<?php echo $k;  ?>" value=" <?php echo $dps['description_table']; ?>" name="description_table[]" class="form-control" />
                           </td>
                           <td >
                              <input type="text" style="width:50px;" name="thickness[]" id="thickness_<?php echo $k;  ?>" value=" <?php echo $dps['thickness']; ?>" required="" class="form-control"/>
                           </td>
                           <td>
                              <input type="text" id="supplier_b_no_<?php echo $k;  ?>" name="supplier_block_no[]" value="<?php echo $dps['supplier_block_no']; ?>" required="" class="form-control" />
                           </td>
                           <td >
                              <input type="text"  id="supplier_s_no_<?php echo $k;  ?>" name="supplier_slab_no[]" value="<?php echo $dps['supplier_slab_no']; ?>" required="" class="form-control"/>
                           </td>
                           <td>
                              <input type="text" id="gross_width_<?php echo $k;  ?>" name="gross_width[]" value="<?php echo $dps['g_width']; ?>" required="" class="gross_width  form-control" />
                           </td>
                           <td>
                              <input type="text" id="gross_height_<?php echo $k;  ?>" name="gross_height[]" value="<?php echo $dps['g_height']; ?>" required="" class="gross_height form-control" />
                           </td>
                           <td >
                              <input type="text"   style="width:60px;"id="gross_sq_ft_<?php echo $k;  ?>" value=" <?php echo trim($dps['gross_sqft'])?>" name="gross_sq_ft[]" class="gross_sq_ft form-control"/>
                           </td>
                           <td>
                              <input type="text" id="bundle_no_<?php echo $k;  ?>" style="width:70px;" name="bundle_no[]" value="<?php echo $dps['bundle_no'] ?>" required="" class="bundle_no form-control" />
                           </td>
                           <td   style="text-align: left;" >
                              <input type="text"  id="slab_no_<?php echo $k;  ?>" name="slab_no[]" style="width: 35px;" value="<?php echo $k; ?>" readonly  required="" class="form-control"/>
                           </td>
                           <td>
                              <input type="text" id="net_width_<?php echo $k;  ?>" name="net_width[]"  value="<?php echo $dps['n_width'] ?>" required="" class="net_width form-control" />
                           </td>
                           <td>
                              <input type="text" id="net_height_<?php echo $k;  ?>" name="net_height[]" value="<?php echo $dps['n_height'] ?>"   required="" class="net_height form-control" />
                           </td>
                           <td >
                              <input type="text"   style="width:60px;"  id="net_sq_ft_<?php echo $k;  ?>" name="net_sq_ft[]" value="<?php echo $dps['net_sqft'] ?>" class="net_sq_ft form-control"/>
                           </td>
                           <td>
                              <span class="input-symbol-euro"><input type="text" id="cost_sq_ft_<?php echo $k;  ?>"  name="cost_sq_ft[]"  style="width:70px;" value=" <?php echo $dps['cost_sqft'] ?>"  class="cost_sq_ft form-control" ></span>
                           <td >
                              <span class="input-symbol-euro"> <input type="text"  id="cost_sq_slab_<?php echo $k;  ?>" name="cost_sq_slab[]"   style="width:70px;" value="<?php echo $dps['cost_slab'] ?>"  class="cost_sq_slab form-control"/></span>
                           </td>
                           <td>
                              <span class="input-symbol-euro">  <input type="text" id="sales_amt_sq_ft_<?php echo $k;  ?>"  name="sales_amt_sq_ft[]"  style="width:70px;"  value="<?php echo $dps['sales_price_sqft'] ?>" class="sales_amt_sq_ft form-control" /></span>
                           </td>
                           <td >
                              <span class="input-symbol-euro">   <input type="text"  id="sales_slab_amt_<?php echo $k;  ?>" name="sales_slab_amt[]"  style="width:70px;" value="<?php echo $dps['sales_slab_price'] ?>"  class="sales_slab_amt form-control"/>
                           </td>
                           </span>
                           </td>
                           <td>
                              <input type="text" id="weight_<?php echo $k;  ?>" name="weight[]" value="<?php echo $dps['weight'] ?>" class="weight form-control" />
                           </td>
                           <td >
                              <input type="text"  id="origin_<?php echo $k;  ?>" name="origin[]" style="width:60px;" value="<?php echo $dps['origin'] ?>" class="form-control"/>
                           </td>
                           <td >
                              <span class="input-symbol-euro">        <input  type="text" class="total_amt form-control" style="width:80px;"    id="total_<?php echo $k;  ?>"   value="<?php echo $dps['total_amt'] ?>"   name="total_amt[]"/></span>
                           </td>
                           <td style="text-align:center;">
                              <button  class='delete btn btn-danger' id="delete_1" type='button' value='Delete'><i class="fa fa-trash"></i></button>
                           </td>
                        </tr>
                        <?php $k++; }}else{
                           ?>
                        <tr>
                           <td>
                              <input type="text" id="description_table_<?php echo $k;  ?>" value="" name="description_table[]" class="form-control" />
                           </td>
                           <td >
                              <input type="text" name="thickness[]" id="thickness_<?php echo $k;  ?>" value="" required="" class="form-control"/>
                           </td>
                           <td>
                              <input type="text" id="supplier_b_no_<?php echo $k;  ?>" name="supplier_block_no[]" value="" required="" class="form-control" />
                           </td>
                           <td >
                              <input type="text"  id="supplier_s_no_<?php echo $k;  ?>" name="supplier_slab_no[]" value="" required="" class="form-control"/>
                           </td>
                           <td>
                              <input type="text" id="gross_width_<?php echo $k;  ?>" name="gross_width[]" value="" required="" class="gross_width  form-control" />
                           </td>
                           <td>
                              <input type="text" id="gross_height_<?php echo $k;  ?>" name="gross_height[]" value="" required="" class="gross_height form-control" />
                           </td>
                           <td >
                              <input type="text"   style="width:60px;"id="gross_sq_ft_<?php echo $k;  ?>" readonly value="" name="gross_sq_ft[]" class="gross_sq_ft form-control"/>
                           </td>
                           <td>
                              <input type="text" id="bundle_no_<?php echo $k;  ?>" style="width:70px;" name="bundle_no[]" value="" required="" class="bundle_no form-control" />
                           </td>
                           <td   style="text-align: left;" >
                              <input type="text"  id="slab_no_<?php echo $k;  ?>" name="slab_no[]" style="    width: 35px;" value="<?php echo $k ?>" readonly  required="" class="form-control"/>
                           </td>
                           <td>
                              <input type="text" id="net_width_<?php echo $k;  ?>" name="net_width[]"  value="" required="" class="net_width form-control" />
                           </td>
                           <td>
                              <input type="text" id="net_height_<?php echo $k;  ?>" name="net_height[]" value=""   required="" class="net_height form-control" />
                           </td>
                           <td >
                              <input type="text"   style="width:60px;"  id="net_sq_ft_<?php echo $k;  ?>" readonly name="net_sq_ft[]" value="" class="net_sq_ft form-control"/>
                           </td>
                           <td>
                              <span class="input-symbol-euro"><input type="text" id="cost_sq_ft_<?php echo $k;  ?>"  name="cost_sq_ft[]"  style="width:70px;" placeholder="0.00"  class="cost_sq_ft form-control" ></span>
                           <td >
                              <span class="input-symbol-euro"> <input type="text"  id="cost_sq_slab_<?php echo $k;  ?>" name="cost_sq_slab[]"   style="width:70px;" placeholder="0.00"  class="form-control"/></span>
                           </td>
                           <td>
                              <span class="input-symbol-euro">  <input type="text" id="sales_amt_sq_ft_<?php echo $k;  ?>"  readonly name="sales_amt_sq_ft[]"  style="width:70px;"  placeholder="0.00" class="sales_amt_sq_ft form-control" /></span>
                           </td>
                           <td >
                              <span class="input-symbol-euro">   <input type="text"  id="sales_slab_amt_<?php echo $k;  ?>" readonly name="sales_slab_amt[]"  style="width:70px;" placeholder="0.00"  class="sales_slab_amt form-control"/>
                           </td>
                           </span>
                           </td>
                           <td>
                              <input type="text" id="weight_<?php echo $k;  ?>" name="weight[]" value="" class="weight form-control" />
                           </td>
                           <td >
                              <input type="text"  id="origin_<?php echo $k;  ?>" name="origin[]" style="width:60px;" value="" class="form-control"/>
                           </td>
                           <td >
                              <span class="input-symbol-euro">        <input  type="text" class="total_amt b_total form-control" style="width:80px;"    id="total_<?php echo $k;  ?>"   value="0.00"   name="total_amt[]"/></span>
                           </td>
                           <td style="text-align:center;">
                              <button  class='delete btn btn-danger' id="delete_1" type='button' value='Delete'><i class="fa fa-trash"></i></button>
                           </td>
                        </tr>
                        <?php $k++; }
                           ?>
                     </tbody>
                     <tfoot>
                        <?php     if($data_products){   ?>
                        <tr>
                           <td style="text-align:right;" colspan="6"><b><?php  echo display('Gross Sq.Ft');?> :</b></td>
                           <td >
                              <input type="text" id="overall_gross_1" name="overall_gross[]"   class="overall_gross form-control" style="width: 60px"  readonly="readonly"  /> 
                           </td>
                           <td style="text-align:right;" colspan="4"><b><?php  echo display('Net Sq.Ft');?> :</b></td>
                           <td >
                              <input type="text" id="overall_net_1" name="overall_net[]"  class="overall_net form-control"  style="width: 60px"  readonly="readonly"  /> 
                           </td>
                           <td style="text-align:right;" colspan="4"><b><?php  echo display('Weight');?> :</b></td>
                           <td >
                              <input type="text" id="overall_weight_1" name="overall_weight[]"  class="overall_weight form-control"  style="width: 70px"  readonly="readonly"  /> 
                           </td>
                           <td style="text-align:right;" colspan="1"><b><?php  echo display('total'); ?> :</b></td>
                           <td >
                              <span class="input-symbol-euro">       <input type="text" id="Total" name="oa_total" readonly  value="0.00"  class="b_total form-control" style="width: 80px" value="0.00"    /> </span>
                           </td>
                        </tr>
                        <!-- <tr> <td style="text-align:right;" colspan="18"><b>GRAND TOTAL :</b></td>
                           <td>
                           <span class="input-symbol-euro">   <input type="text" id="gtotal"  style="width: 80px" class="form-control" name="gtotal" value="<?php // echo $gtotal; ?>"  /></span>
                           </td> 
                               
                           
                                   
                            </tr>  -->
                        <?php }else{ ?>
                        <tr>
                           <td style="text-align:right;" colspan="6"><b><?php  echo display('Gross Sq.Ft');?> :</b></td>
                           <td >
                              <input type="text" id="overall_gross_1" name="overall_gross[]"   class="overall_gross form-control" style="width: 60px"  readonly="readonly"  /> 
                           </td>
                           <td style="text-align:right;" colspan="4"><b><?php  echo display('Net Sq.Ft');?> :</b></td>
                           <td >
                              <input type="text" id="overall_net_1" name="overall_net[]"  class="overall_net form-control"  style="width: 60px"  readonly="readonly"  /> 
                           </td>
                           <td style="text-align:right;" colspan="4"><b><?php  echo display('Weight');?> :</b></td>
                           <td >
                              <input type="text" id="overall_weight_1" name="overall_weight[]"  class="overall_weight form-control"  style="width: 70px"  readonly="readonly"  /> 
                           </td>
                           <td style="text-align:right;" colspan="1"><b><?php  echo display('total');?> :</b></td>
                           <td >
                              <span class="input-symbol-euro">       <input type="text" id="Total" name="oa_total" readonly value="<?php  echo $oa_total; ?>"  class="b_total form-control" style="width: 80px" value="0.00"    /> </span>
                           </td>
                        </tr>
                        <?php    }  ?>
                     </tfoot>
                  </table>
               </div>
               <div class="row">
                  <div class="col-sm-12">
                     <center><label for="description" class="col-form-label"><?php echo display('product_details') ?></label></center>
                     <input class="form-control" name="description"  style="border: 2px solid #d7d4d6;"  id="description" rows="2" value="{product_details}" tabindex="2">
                     <!-- </textarea> -->
                  </div>
               </div>
               <br>
               <div class="form-group row">
                  <div class="col-sm-6">
                     <input type="submit" id="add-product"    class="btnclr btn   btn-large updateProduct" name="add-product" value="<?php echo display('save') ?>" tabindex="10"/>
                  </div>
               </div>
            </div>
         </div>
</form>
</div>
</div>
<!-- <div class="form-group row">
   <div class="col-sm-6">
   
   
   </div>
   </div>
   </div>
   </form>
   </div>
   </div>
   </div>
   </section>
   </div> -->
<!-- Edit Product End -->
<div class="modal fade" id="myModal1" >
   <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content" style="  margin-top: 190px;text-align:center;">
         <div class="modal-header btnclr"  >
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><?php echo display('product') ?></h4>
         </div>
         <div class="modal-body" id="bodyModal1" style="font-weight:bold;text-align:center;">
            <h4></h4>
         </div>
         <div class="modal-footer">
         </div>
      </div>
   </div>
</div>
<script>  
   $(document).ready(function(){
   
   $(".sidebar-mini").addClass('sidebar-collapse') ;
   });
   
   
   
    var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
   var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';
   
   var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
   var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';
   $('#insert_product_from_expense').submit(function (event) {
   var dataString = {
   dataString : $("#insert_product_from_expense").serialize()
   };
   dataString[csrfName] = csrfHash;
   $.ajax({
   type:"POST",
   dataType:"json",
   url:"<?php echo base_url(); ?>Cproduct/insert_product_from_expense",
   data:$("#insert_product_from_expense").serialize(),
   success:function (data) {
   $("#bodyModal1").html("<?php echo  display('Product Added Successfully')?>");
   $('#myModal1').modal('show');
   $('#product_info').modal('hide');
   console.log(data);
   console.log(input_hdn);
   }
   });
   event.preventDefault();
     window.setTimeout(function(){
     $('#myModal1').modal('hide');
     window.location.href =" <?php echo base_url()  ?>/Cproduct/manage_product"
     }, 2500);
   window.setTimeout(function(){
   $('#myModal1').modal('hide');
   
   
   }, 2500);
   });
   //   $(document).on('keyup','.normalinvoice tbody tr:last',function (e) {
   
   
   // //   $('#normalinvoice_'+idt+' tbody tr:last').clone().appendTo('#normalinvoice_'+idt);
   //     var netheight = $('.normalinvoice').attr('id');
   // const indexLastDot = netheight.lastIndexOf('_');
   // var id = netheight.slice(indexLastDot + 1);
   
   //      var $last = $('#addPurchaseItem_1 tr:last');
   //   // var num = id+"_"+$last.index() + 2;
   //     var num = id+($last.index()+1);
    
   //     $('#addPurchaseItem_1 tr:last').clone().find('input,select').attr('id', function(i, current) {
   //         return current.replace(/\d+$/, num);
        
   //     }).end().appendTo('#addPurchaseItem_1');
   
   //  $.each($('#producttable_1 > tbody > tr'), function (index, el) {
   //             $(this).find(".slab_no").val(index + 1); // Simply couse the first "prototype" is not counted in the list                
   //         })
   
   
   
   //         });
   $(document).on('keyup', '.net_height,.net_width', function(){
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
   $('#'+'net_sq_ft_'+id).val(netresult.toFixed(3));
   var net='net_sq_ft_'+id;
   var cost = 'sales_amt_sq_ft_'+ id;
   var net_val=$('#'+net).val();
   var cost_val=$('#'+cost).val();
   var final=net_val * cost_val;
   
   final = isNaN(final) ? 0 : final;
   $('#'+'sales_slab_amt_'+id).val(final.toFixed(3));
   $('#'+'total_'+id).val(final.toFixed(3));
   var net='net_sq_ft_'+id;
   var cost = 'cost_sq_ft_'+ id;
   var net_val=$('#'+net).val();
   var cost_val=$('#'+cost).val();
   var final=net_val * cost_val;
   
   final = isNaN(final) ? 0 : final;
   $('#'+'cost_sq_slab_'+id).val(final.toFixed(3));
   var total_net=0;
   $('.table').each(function() {
    $(this).find('.net_sq_ft').each(function() {
        var precio = $(this).val();
        if (!isNaN(precio) && precio.length !== 0) {
          total_net += parseFloat(precio);
        }
      });
   
     
   //   });
   
   });
   $('#overall_net_1').val(total_net.toFixed(3)).trigger('change');
   var overall_sum=0;
   $('#producttable_1'+  '> tbody > tr').find('.total_amt').each(function() {
   var v=$(this).val();
   overall_sum += parseFloat(v);
   // overall_sum +=parseFloat(v);
   });
   $('#Total').val(overall_sum).trigger('change');
   
   });
   $(document).on('click', '.delete', function(){
   debugger;
   
   var tid=$(this).closest('table').attr('id');
   localStorage.setItem("delete_table",tid);
   console.log(localStorage.getItem("delete_table"));
   $(this).closest('tr').remove();
   var sum=0;
    $('#'+localStorage.getItem("delete_table")).find('.total_amt').each(function() {
   var v=$(this).val();
   sum += parseFloat(v);
   });
   $('#'+localStorage.getItem("delete_table")).find('.b_total').val(sum).trigger('change');
   var sumnet=0;
   // var overall_sum=0;
   $('#'+localStorage.getItem("delete_table")).find('.net_sq_ft').each(function() {
   var v=$(this).val();
   if (!isNaN(v) && v.length !== 0) {
          sumnet += parseFloat(v);
        }
   //  sumnet += parseFloat(v);
   // overall_sum +=parseFloat(v);
   });
   $('#'+localStorage.getItem("delete_table")).find('.overall_net').val(sumnet.toFixed(3));
   
   
    var sumgross=0;
   // var overall_sum=0;
    $('#'+localStorage.getItem("delete_table")).find('.gross_sq_ft').each(function() {
   var v=$(this).val();
   if (!isNaN(v) && v.length !== 0) {
          sumgross += parseFloat(v);
        }
   //  sumnet += parseFloat(v);
   // overall_sum +=parseFloat(v);
   });
   $('#'+localStorage.getItem("delete_table")).find('.overall_gross').val(sumgross.toFixed(3));
   
   
   var sum_w=0;
     $('#'+localStorage.getItem("delete_table")).find('.weight').each(function() {
        var precio = $(this).val();
        if (!isNaN(precio) && precio.length !== 0) {
          sum_w += parseFloat(precio);
        }
      });
   $('#overall_weight_1').val(sum_w).trigger('change');
   // var total_w=0;
   //  $('.table').each(function() {
   //     $(this).find('.weight').each(function() {
   //         var precio = $(this).val();
   //         if (!isNaN(precio) && precio.length !== 0) {
   //           total_w += parseFloat(precio);
   //         }
   //       });
   
   //   });
   // $('.overall_weight').val(total_w.toFixed(3)).trigger('change');
   // var overall_sum=0;
   //      $('.table').find('.total_price').each(function() {
   // var v=$(this).val();
   //   overall_sum += parseFloat(v);
   //  // overall_sum +=parseFloat(v);
   // });
   //  $('#Total').val(overall_sum).trigger('change');
   
   
   
   
   
   //$('#total_net').val(overall_net.toFixed(3));
   
   
   
   });
   $(document).on('keyup', '.cost_sq_ft', function(){
   
   var netheight = $(this).attr('id');
   const indexLastDot = netheight.lastIndexOf('_');
   var id = netheight.slice(indexLastDot + 1);
   var net='net_sq_ft_'+id;
   var cost = 'cost_sq_ft_'+ id;
   var net_val=$('#'+net).val();
   var cost_val=$('#'+cost).val();
   var final=net_val * cost_val;
   
   final = isNaN(final) ? 0 : final;
   $('#'+'cost_sq_slab_'+id).val(final.toFixed(3));
   var sum=0;
   
   $('#producttable_'+idt  +  '> tbody > tr').find('.total_amt').each(function() {
   var v=$(this).val();
   sum += parseFloat(v);
   
   });
   sum = isNaN(sum) ? 0 : sum;
   $('#Total').val(sum.toFixed(3));
   });
   $(document).on('keyup', '.cost_sq_slab', function(){
   var netheight = $(this).attr('id');
   const indexLastDot = netheight.lastIndexOf('_');
   var id = netheight.slice(indexLastDot + 1);
   var net='net_sq_ft_'+id;
   var cost = 'cost_sq_slab_'+ id;
   var net_val=$('#'+net).val();
   var cost_val=$('#'+cost).val();
   var final= cost_val/net_val;
   
   final = isNaN(final) ? 0 : final;
   $('#'+'cost_sq_ft_'+id).val(final.toFixed(3));
   var sum=0;
   
   $('#producttable_'+idt  +  '> tbody > tr').find('.total_amt').each(function() {
   var v=$(this).val();
   sum += parseFloat(v);
   
   });
   sum = isNaN(sum) ? 0 : sum;
   $('#Total').val(sum.toFixed(3));
   
   });
   $(document).on('keyup', '.sales_amt_sq_ft', function(){
   var netheight = $(this).attr('id');
   const indexLastDot = netheight.lastIndexOf('_');
   var id = netheight.slice(indexLastDot + 1);
   var net='net_sq_ft_'+id;
   var cost = 'sales_amt_sq_ft_'+ id;
   var net_val=$('#'+net).val();
   var cost_val=$('#'+cost).val();
   var final=net_val * cost_val;
   
   final = isNaN(final) ? 0 : final;
   $('#'+'sales_slab_amt_'+id).val(final.toFixed(3));
   $('#'+'total_'+id).val(final.toFixed(3));
   var sum=0;
   
   $('#producttable_1'+  '> tbody > tr').find('.total_amt').each(function() {
   var v=$(this).val();
   sum += parseFloat(v);
   
   });
   sum = isNaN(sum) ? 0 : sum;
   $('#Total').val(sum.toFixed(3));
   });
   $(document).on('keyup', '.sales_slab_amt', function(){
   
   var netheight = $(this).attr('id');
   const indexLastDot = netheight.lastIndexOf('_');
   var id = netheight.slice(indexLastDot + 1);
   var net='net_sq_ft_'+id;
   var cost = 'sales_slab_amt_'+ id;
   var net_val=$('#'+net).val();
   var cost_val=$('#'+cost).val();
   var final=cost_val/net_val ;
   
   final = isNaN(final) ? 0 : final;
   $('#'+'sales_amt_sq_ft_'+id).val(final.toFixed(3));
   $('#'+'total_'+id).val($(this).val());
   var overall_sum=0;
    $('#producttable_1'+  '> tbody > tr').find('.total_amt').each(function() {
   var v=$(this).val();
   overall_sum += parseFloat(v);
   // overall_sum +=parseFloat(v);
   });
   $('#Total').val(overall_sum).trigger('change');
   });
   $(document).on('keyup', '.gross_height,.gross_width', function(){
   
   var netheight = $(this).attr('id');
   const indexLastDot = netheight.lastIndexOf('_');
   var id = netheight.slice(indexLastDot + 1);
   var net_width='gross_width_'+id;
   var net_height = 'gross_height_'+ id;
   var netwidth=$('#'+net_width).val();
   var netheight=$('#'+net_height).val();
   var netresult=parseFloat(netwidth) * parseFloat(netheight);
   netresult=netresult/144;
   netresult = isNaN(netresult) ? 0 : netresult;
   var nresult=netresult.toFixed(3);
   
   $('#'+'gross_sq_ft_'+id).val(netresult.toFixed(3));
   var total_net=0;
   $('.table').each(function() {
    $(this).find('.gross_sq_ft').each(function() {
        var precio = $(this).val();
        if (!isNaN(precio) && precio.length !== 0) {
          total_net += parseFloat(precio);
        }
      });
   
     
   //   });
   
   });
   $('#overall_gross_1').val(total_net.toFixed(3)).trigger('change');
   });
   
   $(document).ready(function() {
               $('#insert_supplier').submit(function (event) {
         var empty = $(this).find('input[required]').filter(function() {
    return this.value == '';
   });
   
   if (empty.length) {
    e.preventDefault();
    
   }
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
     
      $("#bodyModal1").html("<?php  echo  display('New Vendor Added Successfully')?>");
      
       $('#myModal1').modal('show');
   
      $('#insert_supplier')[0].reset();
     
       window.setTimeout(function(){
        $('#myModal1').modal('hide');
        $('.modal-backdrop').remove();
   
   },2500);
    
        }
    });
    event.preventDefault();
   });
   var netheight = $(this).attr('id');
   const indexLastDot = netheight.lastIndexOf('_');
   var id = netheight.slice(indexLastDot + 1);
   var net_width='gross_width_'+id;
   var net_height = 'gross_height_'+ id;
   var netwidth=$('#'+net_width).val();
   var netheight=$('#'+net_height).val();
   var netresult=parseFloat(netwidth) * parseFloat(netheight);
   netresult=netresult/144;
   netresult = isNaN(netresult) ? 0 : netresult;
   var nresult=netresult.toFixed(3);
   
   $('#'+'gross_sq_ft_'+id).val(netresult.toFixed(3));
   var cost_sqft=$('#cost_sq_ft_'+id).val();
   
   var sales_sqft=cost_sqft *nresult;
   var sales_slab_price=cost_sqft *nresult*id;
   console.log(parseFloat(cost_sqft) +"*"+parseFloat(nresult)+"*"+id);
   $('#'+'sales_slab_amt_'+id).val("<?php //echo $currency." ";  ?>"+sales_slab_price.toFixed(3));
   sales_sqft = isNaN(sales_sqft) ? 0 : sales_sqft;
   $('#'+'sales_amt_sq_ft_'+id).val("<?php //echo $currency." ";  ?>"+sales_sqft.toFixed(3));
   $('#title').hide();
   $('#account_category').bind('change', function() {
   var elements = $('div.container').children().hide(); // hide all the elements
   var value = $(this).val();
   
   if (value.length) { // if somethings' selected
   $('#title').show();
   elements.filter('.' + value).show(); // show the ones we want
   }
   }).trigger('change');
   });
   
   $(document).ready(function(){
   
        $('.normalinvoice').each(function(){
      
   var tid=$(this).attr('id');
   const indexLast = tid.lastIndexOf('_');
   var idt = tid.slice(indexLast + 1);
   
   var sum=0;
   
   $('#producttable_'+idt  +  '> tbody > tr').find('.total_amt').each(function() {
   var v=$(this).val();
   sum += parseFloat(v);
   
   });
   sum = isNaN(sum) ? 0 : sum;
   $('#Total').val(sum.toFixed(3));
   
   var sum_net=0;
   
   $('#producttable_'+idt  +  '> tbody > tr').find('.net_sq_ft').each(function() {
   var v=$(this).val();
   sum_net += parseFloat(v);
   
   });
   sum_net = isNaN(sum_net) ? 0 : sum_net;
   $('#overall_net_'+idt).val(sum_net.toFixed(3));
   var sum_weight=0;
   
   $('#producttable_'+idt  +  '> tbody > tr').find('.weight').each(function() {
   var v=$(this).val();
   sum_weight += parseFloat(v);
   
   });
   sum_weight = isNaN(sum_weight) ? 0 : sum_weight;
   $('#overall_weight_'+idt).val(sum_weight.toFixed(3));
   var sum_gross=0;
   
   $('#producttable_'+idt  +  '> tbody > tr').find('.gross_sq_ft').each(function() {
   var v=$(this).val();
   sum_gross += parseFloat(v);
   
   });
   sum_gross = isNaN(sum_gross) ? 0 : sum_gross;
   $('#overall_gross_'+idt).val(sum_gross.toFixed(3));
    
   
    });
   });
   
   // unit
   $("#tax_id").on("input", function(){
    var intValue = parseFloat($(this).val().replace(/%/g, '') ) || 0;
    
    $(this).val( intValue + '%' );
   });
   
   $('#insert_unit').submit(function (event) {
   
    var dataString = {
        dataString : $("#insert_unit").serialize()
   };
   dataString[csrfName] = csrfHash;
    $.ajax({
        type:"POST",
        dataType:"json",
        url:"<?php echo base_url(); ?>Cproduct/insert_instant_unit",
        data:$("#insert_unit").serialize(),
        success:function (data) {
            console.log(data);
            $.each(data, function (i, item) {
           
           result = '<option value=' + data[i].unit_name + '>' + data[i].unit_name + '</option>';
       });
       
   
       $('#unit').selectmenu(); 
       $('#unit').append(result).selectmenu('refresh',true);
       $("#bodyModal1").html("<?php echo  display('Unit Added Successfully')?>");
      
      $('#myModal1').modal('show');
      $('#add_unit').modal('hide');
     $('#unit').show();
    $('#unit_name').val("");
      window.setTimeout(function(){
      $('#myModal1').modal('hide');
       $('.modal-backdrop').remove();
   
   },2500);
      //  console.log(data);
        }
    });
    event.preventDefault();
   });
   
   
   
        //    Addcategory
   
   $('#insert_category').submit(function (event) {
       var x;
    x = document.getElementById("category_name").value;
    if (x == "") {
       // alert("Enter a Valid Roll Number");
        return false;
    };
    var dataString = {
        dataString : $("#insert_category").serialize()
   };
   dataString[csrfName] = csrfHash;
    $.ajax({
        type:"POST",
        dataType:"json",
        url:"<?php echo base_url(); ?>Cproduct/insert_instant_cat",
        data:$("#insert_category").serialize(),
        success:function (data) {
          console.log(data);
            $.each(data, function (i, item) {
           
           result = '<option value=' + data[i].category_name + '>' + data[i].category_name + '</option>';
       });
       
   $('#category_name').val("");
       $('#category_id').selectmenu(); 
       $('#category_id').append(result).selectmenu('refresh',true);
       $("#bodyModal1").html("<?php echo display('Category Added Successfully')?>");
      
      $('#myModal1').modal('show');
      $('#add_cat').modal('hide');
     $('#category_id').show();
    
      window.setTimeout(function(){
      $('#myModal1').modal('hide');
       $('.modal-backdrop').remove();
   
   },2500);
      //  console.log(data);
        }
    });
    event.preventDefault();
   });
   
   
   
   // $(document).on('keyup', '.net_height,.net_width', function(){
   //  var netheight = $(this).attr('id');
   // const indexLastDot = netheight.lastIndexOf('_');
   // var id = netheight.slice(indexLastDot + 1);
   // var net_width='net_width_'+id;
   // var net_height = 'net_height_'+ id;
   // var netwidth=$('#'+net_width).val();
   // var netheight=$('#'+net_height).val();
   // var netresult=parseFloat(netwidth) * parseFloat(netheight);
   // netresult=netresult/144;
   // netresult = isNaN(netresult) ? 0 : netresult;
   // $('#'+'net_sq_ft_'+id).val(netresult.toFixed(3));
   // var nresult=netresult.toFixed(3);
   // var cost_sqft=$('#cost_sq_ft_'+id).val();
   
   // var sales_sqft=cost_sqft *nresult;
   // var sales_slab_price=cost_sqft *nresult*id;
   // console.log(parseFloat(cost_sqft) +"*"+parseFloat(nresult)+"*"+id);
   // $('#'+'sales_slab_amt_'+id).val(sales_slab_price.toFixed(3));
   // $('#'+'total_'+id).val(sales_slab_price.toFixed(3));
   // sales_sqft = isNaN(sales_sqft) ? 0 : sales_sqft;
   // $('#'+'sales_amt_sq_ft_'+id).val(sales_sqft.toFixed(3));
   // var total_net=0;
   //  $('.table').each(function() {
   //     $(this).find('.net_sq_ft').each(function() {
   //         var precio = $(this).val();
   //         if (!isNaN(precio) && precio.length !== 0) {
   //           total_net += parseFloat(precio);
   //         }
   //       });
   
     
   //  //   });
   
   //   });
   // $('#overall_net_1').val(total_net.toFixed(3)).trigger('change');
   // var total=0;
   //  $('.table').each(function() {
   //     $(this).find('.total_price').each(function() {
   //         var precio = $(this).val();
   //         if (!isNaN(precio) && precio.length !== 0) {
   //           total += parseFloat(precio);
   //         }
   //       });
   
     
   //  //   });
   
   //   });
   // $('#Total').val(total.toFixed(3)).trigger('change');
   // });
   // $(document).on('keyup', '.cost_sq_ft', function(){
   
   // $(this).closest('tr').find('.total_price').val(sales_slab_price.toFixed(3));
   // sales_sqft = isNaN(sales_sqft) ? 0 : sales_sqft;
   // $('#'+'sales_amt_sq_ft_'+id).val(sales_sqft.toFixed(3));
   // var overall_sum=0;
   //      $('.table').find('.total_price').each(function() {
   // var v=$(this).val();
   //   overall_sum += parseFloat(v);
   //  // overall_sum +=parseFloat(v);
   // });
   //  $('#Total').val(overall_sum).trigger('change');
   // });
   // $(document).on('keyup', '.gross_height,.gross_width', function(){
   
   //  var netheight = $(this).attr('id');
   // const indexLastDot = netheight.lastIndexOf('_');
   // var id = netheight.slice(indexLastDot + 1);
   // var net_width='gross_width_'+id;
   // var net_height = 'gross_height_'+ id;
   // var netwidth=$('#'+net_width).val();
   // var netheight=$('#'+net_height).val();
   // var netresult=parseFloat(netwidth) * parseFloat(netheight);
   // netresult=netresult/144;
   // netresult = isNaN(netresult) ? 0 : netresult;
   // var nresult=netresult.toFixed(3);
   
   // $('#'+'gross_sq_ft_'+id).val(netresult.toFixed(3));
   
   // var total_g=0;
   //  $('.table').each(function() {
   //     $(this).find('.gross_sq_ft').each(function() {
   //         var precio = $(this).val();
   //         if (!isNaN(precio) && precio.length !== 0) {
   //           total_g += parseFloat(precio);
   //         }
   //       });
   
     
   //  //   });
   
   //   });
   // $('#overall_gross_1').val(total_g.toFixed(3)).trigger('change');
   // });
   $(document).on('keyup', '.weight', function(){
   var weight=0;
     $(this).closest('table').find('.weight').each(function() {
   var v=$(this).val();
   if (!isNaN(v) && v.length !== 0) {
          weight += parseFloat(v);
        }
   });
   $(this).closest('table').find('.overall_weight').val(weight.toFixed(3));
   
   
   });
   
   
   //  $(document).on('keyup','.normalinvoice tbody tr:last',function (e) {
   
   // var tid=$(this).closest('table').attr('id');
   // const indexLast = tid.lastIndexOf('_');
   // var id = tid.slice(indexLast + 1);
   // //   $('#normalinvoice_'+idt+' tbody tr:last').clone().appendTo('#normalinvoice_'+idt);
   //    //  var netheight = table.attr('id');
   // // const indexLastDot = table.lastIndexOf('_');
   // // var id = table.slice(indexLastDot + 1);
   
   //      var $last = $('#addPurchaseItem tr:last');
   //    // var num = id+"_"+$last.index() + 2;
   //     var num = id+($last.index()+1);
    
   //     $('#addPurchaseItem tr:last').clone().find('input,select').attr('id', function(i, current) {
   //         return current.replace(/\d+$/, num);
        
   //     }).end().appendTo('#addPurchaseItem');
   
   //  $.each($('.normalinvoice > tbody > tr'), function (index, el) {
   //             $(this).find(".slab_no").val(index + 1); // Simply couse the first "prototype" is not counted in the list                
   //         })
   
   
   
   //         });
   // var addSerialNumber = function () {
   //     var i = 1
   //     $('#addPurchaseItem tr').each(function(index) {
   //         $(this).find('td:nth-child(9)').html(index+1);
   //     });
   // };
   
   //   function addInputField(table) {
    
   //      var $last = $('#addPurchaseItem' + ' tr:last');
   //     var num = $last.index() + 2;
   //     $('#addPurchaseItem'  + ' tr:last').clone().find('input,select').attr('id', function(i, current) {
   //         return current.replace(/\d+$/, num);
   //     }).end().appendTo('#addPurchaseItem' );
   
   //   addSerialNumber();
   // }
   $(document).on('keyup','#producttable_1 > tbody > tr:last',function (e) {
   debugger;
   
   //   $('#normalinvoice_'+idt+' tbody tr:last').clone().appendTo('#normalinvoice_'+idt);
    var netheight = $('.normalinvoice').attr('id');
   const indexLastDot = netheight.lastIndexOf('_');
   var id = netheight.slice(indexLastDot + 1);
   
     var $last = $('#producttable_1 > tbody > tr:last');
   // var num = id+"_"+$last.index() + 2;
    var num = id+($last.index()+1);
    
    $('#producttable_1 > tbody > tr:last').clone().find('input,select').attr('id', function(i, current) {
        return current.replace(/\d+$/, num);
        
    }).end().appendTo('#producttable_1');
   
   $.each($('#producttable_1 > tbody > tr:last'), function (index, el) {
            $(this).find(".slab_no").val(index + 1); // Simply couse the first "prototype" is not counted in the list                
        })
   
   
   
        });
   $(document).ready(function() {
     var netheight = $(this).attr('id');
   const indexLastDot = netheight.lastIndexOf('_');
   var id = netheight.slice(indexLastDot + 1);
   var net_width='gross_width_'+id;
   var net_height = 'gross_height_'+ id;
   var netwidth=$('#'+net_width).val();
   var netheight=$('#'+net_height).val();
   var netresult=parseFloat(netwidth) * parseFloat(netheight);
   netresult=netresult/144;
   netresult = isNaN(netresult) ? 0 : netresult;
   var nresult=netresult.toFixed(3);
   
   $('#'+'gross_sq_ft_'+id).val(netresult.toFixed(3));
   var cost_sqft=$('#cost_sq_ft_'+id).val();
   
   var sales_sqft=cost_sqft *nresult;
   var sales_slab_price=cost_sqft *nresult*id;
   console.log(parseFloat(cost_sqft) +"*"+parseFloat(nresult)+"*"+id);
   $('#'+'sales_slab_amt_'+id).val("<?php //echo $currency." ";  ?>"+sales_slab_price.toFixed(3));
   sales_sqft = isNaN(sales_sqft) ? 0 : sales_sqft;
   $('#'+'sales_amt_sq_ft_'+id).val("<?php //echo $currency." ";  ?>"+sales_sqft.toFixed(3));
    $('#title').hide();
    $('#account_category').bind('change', function() {
        var elements = $('div.container').children().hide(); // hide all the elements
        var value = $(this).val();
   
        if (value.length) { // if somethings' selected
            $('#title').show();
            elements.filter('.' + value).show(); // show the ones we want
        }
    }).trigger('change');
   });
   $('#insert_product_from_expense').submit(function (event) {
   var dataString = {
   dataString : $("#insert_product_from_expense").serialize()
   };
   dataString[csrfName] = csrfHash;
   $.ajax({
   type:"POST",
   dataType:"json",
   url:"<?php echo base_url(); ?>Cproduct/insert_product_from_expense",
   data:$("#insert_product_from_expense").serialize(),
   success:function (data) {
   $("#bodyModal1").html("<?php echo display('product')." ".display('has been Updated Successfully')?>");
   $('#myModal1').modal('show');
   $('#product_info').modal('hide');
   console.log(data);
   console.log(input_hdn);
   }
   });
   event.preventDefault();
   window.setTimeout(function(){
   $('#myModal1').modal('hide');
   //window.location.href =" <?php echo base_url()  ?>/Cproduct/manage_product"
   }, 1500);
   // window.setTimeout(function(){
   // $('#myModal1').modal('hide');
   //  
   
   // }, 500);
   });
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   function configureDropDownLists(ddl1,ddl2) {
    var assets = ['1010 CASH Operating Account', '1020 CASH Debitors', '1030 CASH Petty Cash'];
    var receivables = ['1210 A/REC Trade', '1220 A/REC Trade Notes Receivable', '1230 A/REC Installment Receivables','1240 A/REC Retainage Withheld','1290 A/REC Allowance for Uncollectible Accounts'];
    var inventories = ['1310 INV – Reserved', '1320 INV – Work-in-Progress', '1330 INV – Finished Goods','1340 INV – Reserved','1350 INV – Unbilled Cost & Fees','1390 INV – Reserve for Obsolescence'];
   var prepaid_expense = ['1410 PREPAID – Insurance', '1420 PREPAID – Real Estate Taxes', '1430 PREPAID – Repairs & Maintenance','1440 PREPAID – Rent','1450 PREPAID – Deposits'];
   var property_plant = ['1510 PPE – Buildings', '1520 PPE – Machinery & Equipment', '1530 PPE – Vehicles','1540 PPE – Computer Equipment','1550 PPE – Furniture & Fixtures','1560 PPE – Leasehold Improvements'];
   var acc_dep = ['1610 ACCUM DEPR Buildings', '1620 ACCUM DEPR Machinery & Equipment', '1630 ACCUM DEPR Vehicles','1640 ACCUM DEPR Computer Equipment','1650 ACCUM DEPR Furniture & Fixtures','1660 ACCUM DEPR Leasehold Improvements'];
   var noncurrenctreceivables = ['1710 NCA – Notes Receivable', '1720 NCA – Installment Receivables', '1730 NCA – Retainage Withheld'];
   var intercompany_receivables = ['1910 Organization Costs', '1920 Patents & Licenses', '1930 Intangible Assets – Capitalized Software Costs'];
   var liabilities = ['2110 A/P Trade', '2120 A/P Accrued Accounts Payable', '2130 A/P Retainage Withheld','2150 Current Maturities of Long-Term Debt','2160 Bank Notes Payable','2170 Construction Loans Payable'];
    var accrued_compensation = ['2210 Accrued – Payroll', '2220 Accrued – Commissions', '2230 Accrued – FICA','2240 Accrued – Unemployment Taxes','2250 Accrued – Workmen’s Comp'];
   var other_accrued_expenses = ['2310 Accrued – Rent', '2320 Accrued – Interest', '2330 Accrued – Property Taxes', '2340 Accrued – Warranty Expense'];
   var accrued_taxes= ['2510 Accrued – Federal Income Taxes', '2520 Accrued – State Income Taxes', '2530 Accrued – Franchise Taxes','2540 Deferred – FIT Current','2550 Deferred – State Income Taxes'];
   var deferred_taxes= ['2610 D/T – FIT – NON CURRENT', '2620 D/T – SIT – NON CURRENT'];
   var long_term_debt=['2710 LTD – Notes Payable','2720 LTD – Mortgages Payable','2730 LTD – Installment Notes Payable'];
   var intercompany_payables=['3100 Common Stock','3200 Preferred Stock','3300 Paid in Capital','3400 Partners Capital','3500 Member Contributions','3900 Retained Earnings'];
   var revenue=['4010 REVENUE – PRODUCT 1','4020 REVENUE – PRODUCT 2','4030 REVENUE – PRODUCT 3','4040 REVENUE – PRODUCT 4','4600 Interest Income','4700 Other Income','4800 Finance Charge Income','4900 Sales Returns and Allowances','4950 Sales Discounts'];
   var cost_goods= ['5010 COGS – PRODUCT 1', '5020 COGS – PRODUCT 2','5030 COGS – PRODUCT 3','5040 COGS – PRODUCT 4','5700 Freight','5800 Inventory Adjustments','5900 Purchase Returns and Allowances','5950 Reserved'];
   var operating_expenses=['6010 Advertising Expense','6050 Amortization Expense','6100 Auto Expense','6150 Bad Debt Expense','6150 Bad Debt Expense','6200 Bank Charges','6250 Cash Over and Short','6300 Commission Expense','6350 Depreciation Expense','6400 Employee Benefit Program','6550 Freight Expense','6600 Gifts Expense','6650 Insurance – General','6700 Interest Expense','6750 Professional Fees','6800 License Expense','6850 Maintenance Expense','6900 Meals and Entertainment','6950 Office Expense','7000 Payroll Taxes','7050 Printing','7150 Postage','7200 Rent','7250 Repairs Expense','7300 Salaries Expense','7350 Supplies Expense','7400 Taxes – FIT Expense','7500 Utilities Expense','7900 Gain/Loss on Sale of Assets'];
   
    switch (ddl1.value) {
        case '1000 ASSETS':
            ddl2.options.length = 0;
            for (i = 0; i < assets.length; i++) {
                createOption(ddl2, assets[i], assets[i]);
            }
            break;
        case '1200 RECEIVABLES':
            ddl2.options.length = 0; 
        for (i = 0; i < receivables.length; i++) {
            createOption(ddl2, receivables[i], receivables[i]);
            }
            break;
        case '1300 INVENTORIES':
            ddl2.options.length = 0;
            for (i = 0; i < inventories.length; i++) {
                createOption(ddl2, inventories[i], inventories[i]);
            }
            break;
          case '1400 PREPAID EXPENSES & OTHER CURRENT ASSETS':
            ddl2.options.length = 0; 
        for (i = 0; i < prepaid_expense.length; i++) {
            createOption(ddl2, prepaid_expense[i], prepaid_expense[i]);
            }
            break;
          case '1500 PROPERTY PLANT & EQUIPMENT':
            ddl2.options.length = 0; 
        for (i = 0; i < property_plant.length; i++) {
            createOption(ddl2, property_plant[i], property_plant[i]);
            }
            break;
          case '1600 ACCUMULATED DEPRECIATION & AMORTIZATION':
            ddl2.options.length = 0; 
        for (i = 0; i < acc_dep.length; i++) {
            createOption(ddl2, acc_dep[i], acc_dep[i]);
            }
            break;
          case '1700 NON – CURRENT RECEIVABLES':
            ddl2.options.length = 0; 
        for (i = 0; i < noncurrenctreceivables.length; i++) {
            createOption(ddl2, noncurrenctreceivables[i], noncurrenctreceivables[i]);
            }
            break;
          case '1800 INTERCOMPANY RECEIVABLES & 1900 OTHER NON-CURRENT ASSETS':
            ddl2.options.length = 0; 
        for (i = 0; i < intercompany_receivables.length; i++) {
            createOption(ddl2, intercompany_receivables[i], intercompany_receivables[i]);
            }
            break;
          case '2000 LIABILITIES & 2100 PAYABLES':
            ddl2.options.length = 0; 
        for (i = 0; i < liabilities.length; i++) {
            createOption(ddl2, liabilities[i], liabilities[i]);
            }
            break;
           case '2200 ACCRUED COMPENSATION & RELATED ITEMS':
            ddl2.options.length = 0; 
        for (i = 0; i < accrued_compensation.length; i++) {
            createOption(ddl2, accrued_compensation[i], accrued_compensation[i]);
            }
            break;
          case '2300 OTHER ACCRUED EXPENSES':
            ddl2.options.length = 0; 
        for (i = 0; i < other_accrued_expenses.length; i++) {
            createOption(ddl2, other_accrued_expenses[i], other_accrued_expenses[i]);
            }
            break;
          case '2500 ACCRUED TAXES':
            ddl2.options.length = 0; 
        for (i = 0; i < accrued_taxes.length; i++) {
            createOption(ddl2, accrued_taxes[i], accrued_taxes[i]);
            }
            break;
            case '2600 DEFERRED TAXES':
            ddl2.options.length = 0; 
        for (i = 0; i < deferred_taxes.length; i++) {
            createOption(ddl2, deferred_taxes[i], deferred_taxes[i]);
            }
            break;
          case '2700 LONG-TERM DEBT':
            ddl2.options.length = 0; 
        for (i = 0; i < long_term_debt.length; i++) {
            createOption(ddl2, long_term_debt[i], long_term_debt[i]);
            }
            break;
          case '2800 INTERCOMPANY PAYABLES & 2900 OTHER NON CURRENT LIABILITIES & 3000 OWNERS EQUITIES':
            ddl2.options.length = 0; 
        for (i = 0; i < intercompany_payables.length; i++) {
            createOption(ddl2, intercompany_payables[i], intercompany_payables[i]);
            }
            break;
            case '4000 REVENUE':
            ddl2.options.length = 0; 
        for (i = 0; i < revenue.length; i++) {
            createOption(ddl2, revenue[i], revenue[i]);
            }
            break;
          case '5000 COST OF GOODS SOLD':
            ddl2.options.length = 0; 
        for (i = 0; i < cost_goods.length; i++) {
            createOption(ddl2, cost_goods[i], cost_goods[i]);
            }
            break;
          case '6000 – 7000 OPERATING EXPENSES':
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
   
   
   $(document).ready(function() {
     var netheight = $(this).attr('id');
   const indexLastDot = netheight.lastIndexOf('_');
   var id = netheight.slice(indexLastDot + 1);
   var net_width='gross_width_'+id;
   var net_height = 'gross_height_'+ id;
   var netwidth=$('#'+net_width).val();
   var netheight=$('#'+net_height).val();
   var netresult=parseFloat(netwidth) * parseFloat(netheight);
   netresult=netresult/144;
   netresult = isNaN(netresult) ? 0 : netresult;
   var nresult=netresult.toFixed(3);
   
   $('#'+'gross_sq_ft_'+id).val(netresult.toFixed(3));
   var cost_sqft=$('#cost_sq_ft_'+id).val();
   
   var sales_sqft=cost_sqft *nresult;
   var sales_slab_price=cost_sqft *nresult*id;
   console.log(parseFloat(cost_sqft) +"*"+parseFloat(nresult)+"*"+id);
   $('#'+'sales_slab_amt_'+id).val("<?php //echo $currency." ";  ?>"+sales_slab_price.toFixed(3));
   sales_sqft = isNaN(sales_sqft) ? 0 : sales_sqft;
   $('#'+'sales_amt_sq_ft_'+id).val("<?php //echo $currency." ";  ?>"+sales_sqft.toFixed(3));
    $('#title').hide();
    $('#account_category').bind('change', function() {
        var elements = $('div.container').children().hide(); // hide all the elements
        var value = $(this).val();
   
        if (value.length) { // if somethings' selected
            $('#title').show();
            elements.filter('.' + value).show(); // show the ones we want
        }
    }).trigger('change');
   });
   
   
   $(function () {
    var countries = [
        {
            "name": "Afghanistan",
            "code": "AF"
    },
        {
            "name": "Åland Islands",
            "code": "AX"
    },
        {
            "name": "Albania",
            "code": "AL"
    },
        {
            "name": "Algeria",
            "code": "DZ"
    },
        {
            "name": "American Samoa",
            "code": "AS"
    },
        {
            "name": "Andorra",
            "code": "AD"
    },
        {
            "name": "Angola",
            "code": "AO"
    },
        {
            "name": "Anguilla",
            "code": "AI"
    },
        {
            "name": "Antarctica",
            "code": "AQ"
    },
        {
            "name": "Antigua and Barbuda",
            "code": "AG"
    },
        {
            "name": "Argentina",
            "code": "AR"
    },
        {
            "name": "Armenia",
            "code": "AM"
    },
        {
            "name": "Aruba",
            "code": "AW"
    },
        {
            "name": "Australia",
            "code": "AU"
    },
        {
            "name": "Austria",
            "code": "AT"
    },
        {
            "name": "Azerbaijan",
            "code": "AZ"
    },
        {
            "name": "Bahamas",
            "code": "BS"
    },
        {
            "name": "Bahrain",
            "code": "BH"
    },
        {
            "name": "Bangladesh",
            "code": "BD"
    },
        {
            "name": "Barbados",
            "code": "BB"
    },
        {
            "name": "Belarus",
            "code": "BY"
    },
        {
            "name": "Belgium",
            "code": "BE"
    },
        {
            "name": "Belize",
            "code": "BZ"
    },
        {
            "name": "Benin",
            "code": "BJ"
    },
        {
            "name": "Bermuda",
            "code": "BM"
    },
        {
            "name": "Bhutan",
            "code": "BT"
    },
        {
            "name": "Bolivia",
            "code": "BO"
    },
        {
            "name": "Bosnia and Herzegovina",
            "code": "BA"
    },
        {
            "name": "Botswana",
            "code": "BW"
    },
        {
            "name": "Bouvet Island",
            "code": "BV"
    },
        {
            "name": "Brazil",
            "code": "BR"
    },
        {
            "name": "British Indian Ocean Territory",
            "code": "IO"
    },
        {
            "name": "Brunei Darussalam",
            "code": "BN"
    },
        {
            "name": "Bulgaria",
            "code": "BG"
    },
        {
            "name": "Burkina Faso",
            "code": "BF"
    },
        {
            "name": "Burundi",
            "code": "BI"
    },
        {
            "name": "Cambodia",
            "code": "KH"
    },
        {
            "name": "Cameroon",
            "code": "CM"
    },
        {
            "name": "Canada",
            "code": "CA"
    },
        {
            "name": "Cape Verde",
            "code": "CV"
    },
        {
            "name": "Cayman Islands",
            "code": "KY"
    },
        {
            "name": "Central African Republic",
            "code": "CF"
    },
        {
            "name": "Chad",
            "code": "TD"
    },
        {
            "name": "Chile",
            "code": "CL"
    },
        {
            "name": "China",
            "code": "CN"
    },
        {
            "name": "Christmas Island",
            "code": "CX"
    },
        {
            "name": "Cocos (Keeling) Islands",
            "code": "CC"
    },
        {
            "name": "Colombia",
            "code": "CO"
    },
        {
            "name": "Comoros",
            "code": "KM"
    },
        {
            "name": "Congo",
            "code": "CG"
    },
        {
            "name": "Congo, The Democratic Republic of the",
            "code": "CD"
    },
        {
            "name": "Cook Islands",
            "code": "CK"
    },
        {
            "name": "Costa Rica",
            "code": "CR"
    },
        {
            "name": "Cote D\"Ivoire",
            "code": "CI"
    },
        {
            "name": "Croatia",
            "code": "HR"
    },
        {
            "name": "Cuba",
            "code": "CU"
    },
        {
            "name": "Cyprus",
            "code": "CY"
    },
        {
            "name": "Czech Republic",
            "code": "CZ"
    },
        {
            "name": "Denmark",
            "code": "DK"
    },
        {
            "name": "Djibouti",
            "code": "DJ"
    },
        {
            "name": "Dominica",
            "code": "DM"
    },
        {
            "name": "Dominican Republic",
            "code": "DO"
    },
        {
            "name": "Ecuador",
            "code": "EC"
    },
        {
            "name": "Egypt",
            "code": "EG"
    },
        {
            "name": "El Salvador",
            "code": "SV"
    },
        {
            "name": "Equatorial Guinea",
            "code": "GQ"
    },
        {
            "name": "Eritrea",
            "code": "ER"
    },
        {
            "name": "Estonia",
            "code": "EE"
    },
        {
            "name": "Ethiopia",
            "code": "ET"
    },
        {
            "name": "Falkland Islands (Malvinas)",
            "code": "FK"
    },
        {
            "name": "Faroe Islands",
            "code": "FO"
    },
        {
            "name": "Fiji",
            "code": "FJ"
    },
        {
            "name": "Finland",
            "code": "FI"
    },
        {
            "name": "France",
            "code": "FR"
    },
        {
            "name": "French Guiana",
            "code": "GF"
    },
        {
            "name": "French Polynesia",
            "code": "PF"
    },
        {
            "name": "French Southern Territories",
            "code": "TF"
    },
        {
            "name": "Gabon",
            "code": "GA"
    },
        {
            "name": "Gambia",
            "code": "GM"
    },
        {
            "name": "Georgia",
            "code": "GE"
    },
        {
            "name": "Germany",
            "code": "DE"
    },
        {
            "name": "Ghana",
            "code": "GH"
    },
        {
            "name": "Gibraltar",
            "code": "GI"
    },
        {
            "name": "Greece",
            "code": "GR"
    },
        {
            "name": "Greenland",
            "code": "GL"
    },
        {
            "name": "Grenada",
            "code": "GD"
    },
        {
            "name": "Guadeloupe",
            "code": "GP"
    },
        {
            "name": "Guam",
            "code": "GU"
    },
        {
            "name": "Guatemala",
            "code": "GT"
    },
        {
            "name": "Guernsey",
            "code": "GG"
    },
        {
            "name": "Guinea",
            "code": "GN"
    },
        {
            "name": "Guinea-Bissau",
            "code": "GW"
    },
        {
            "name": "Guyana",
            "code": "GY"
    },
        {
            "name": "Haiti",
            "code": "HT"
    },
        {
            "name": "Heard Island and Mcdonald Islands",
            "code": "HM"
    },
        {
            "name": "Holy See (Vatican City State)",
            "code": "VA"
    },
        {
            "name": "Honduras",
            "code": "HN"
    },
        {
            "name": "Hong Kong",
            "code": "HK"
    },
        {
            "name": "Hungary",
            "code": "HU"
    },
        {
            "name": "Iceland",
            "code": "IS"
    },
        {
            "name": "India",
            "code": "IN"
    },
        {
            "name": "Indonesia",
            "code": "ID"
    },
        {
            "name": "Iran, Islamic Republic Of",
            "code": "IR"
    },
        {
            "name": "Iraq",
            "code": "IQ"
    },
        {
            "name": "Ireland",
            "code": "IE"
    },
        {
            "name": "Isle of Man",
            "code": "IM"
    },
        {
            "name": "Israel",
            "code": "IL"
    },
        {
            "name": "Italy",
            "code": "IT"
    },
        {
            "name": "Jamaica",
            "code": "JM"
    },
        {
            "name": "Japan",
            "code": "JP"
    },
        {
            "name": "Jersey",
            "code": "JE"
    },
        {
            "name": "Jordan",
            "code": "JO"
    },
        {
            "name": "Kazakhstan",
            "code": "KZ"
    },
        {
            "name": "Kenya",
            "code": "KE"
    },
        {
            "name": "Kiribati",
            "code": "KI"
    },
        {
            "name": "Korea, Democratic People\"S Republic of",
            "code": "KP"
    },
        {
            "name": "Korea, Republic of",
            "code": "KR"
    },
        {
            "name": "Kuwait",
            "code": "KW"
    },
        {
            "name": "Kyrgyzstan",
            "code": "KG"
    },
        {
            "name": "Lao People\"S Democratic Republic",
            "code": "LA"
    },
        {
            "name": "Latvia",
            "code": "LV"
    },
        {
            "name": "Lebanon",
            "code": "LB"
    },
        {
            "name": "Lesotho",
            "code": "LS"
    },
        {
            "name": "Liberia",
            "code": "LR"
    },
        {
            "name": "Libyan Arab Jamahiriya",
            "code": "LY"
    },
        {
            "name": "Liechtenstein",
            "code": "LI"
    },
        {
            "name": "Lithuania",
            "code": "LT"
    },
        {
            "name": "Luxembourg",
            "code": "LU"
    },
        {
            "name": "Macao",
            "code": "MO"
    },
        {
            "name": "Macedonia, The Former Yugoslav Republic of",
            "code": "MK"
    },
        {
            "name": "Madagascar",
            "code": "MG"
    },
        {
            "name": "Malawi",
            "code": "MW"
    },
        {
            "name": "Malaysia",
            "code": "MY"
    },
        {
            "name": "Maldives",
            "code": "MV"
    },
        {
            "name": "Mali",
            "code": "ML"
    },
        {
            "name": "Malta",
            "code": "MT"
    },
        {
            "name": "Marshall Islands",
            "code": "MH"
    },
        {
            "name": "Martinique",
            "code": "MQ"
    },
        {
            "name": "Mauritania",
            "code": "MR"
    },
        {
            "name": "Mauritius",
            "code": "MU"
    },
        {
            "name": "Mayotte",
            "code": "YT"
    },
        {
            "name": "Mexico",
            "code": "MX"
    },
        {
            "name": "Micronesia, Federated States of",
            "code": "FM"
    },
        {
            "name": "Moldova, Republic of",
            "code": "MD"
    },
        {
            "name": "Monaco",
            "code": "MC"
    },
        {
            "name": "Mongolia",
            "code": "MN"
    },
        {
            "name": "Montserrat",
            "code": "MS"
    },
        {
            "name": "Morocco",
            "code": "MA"
    },
        {
            "name": "Mozambique",
            "code": "MZ"
    },
        {
            "name": "Myanmar",
            "code": "MM"
    },
        {
            "name": "Namibia",
            "code": "NA"
    },
        {
            "name": "Nauru",
            "code": "NR"
    },
        {
            "name": "Nepal",
            "code": "NP"
    },
        {
            "name": "Netherlands",
            "code": "NL"
    },
        {
            "name": "Netherlands Antilles",
            "code": "AN"
    },
        {
            "name": "New Caledonia",
            "code": "NC"
    },
        {
            "name": "New Zealand",
            "code": "NZ"
    },
        {
            "name": "Nicaragua",
            "code": "NI"
    },
        {
            "name": "Niger",
            "code": "NE"
    },
        {
            "name": "Nigeria",
            "code": "NG"
    },
        {
            "name": "Niue",
            "code": "NU"
    },
        {
            "name": "Norfolk Island",
            "code": "NF"
    },
        {
            "name": "Northern Mariana Islands",
            "code": "MP"
    },
        {
            "name": "Norway",
            "code": "NO"
    },
        {
            "name": "Oman",
            "code": "OM"
    },
        {
            "name": "Pakistan",
            "code": "PK"
    },
        {
            "name": "Palau",
            "code": "PW"
    },
        {
            "name": "Palestinian Territory, Occupied",
            "code": "PS"
    },
        {
            "name": "Panama",
            "code": "PA"
    },
        {
            "name": "Papua New Guinea",
            "code": "PG"
    },
        {
            "name": "Paraguay",
            "code": "PY"
    },
        {
            "name": "Peru",
            "code": "PE"
    },
        {
            "name": "Philippines",
            "code": "PH"
    },
        {
            "name": "Pitcairn",
            "code": "PN"
    },
        {
            "name": "Poland",
            "code": "PL"
    },
        {
            "name": "Portugal",
            "code": "PT"
    },
        {
            "name": "Puerto Rico",
            "code": "PR"
    },
        {
            "name": "Qatar",
            "code": "QA"
    },
        {
            "name": "Reunion",
            "code": "RE"
    },
        {
            "name": "Romania",
            "code": "RO"
    },
        {
            "name": "Russian Federation",
            "code": "RU"
    },
        {
            "name": "RWANDA",
            "code": "RW"
    },
        {
            "name": "Saint Helena",
            "code": "SH"
    },
        {
            "name": "Saint Kitts and Nevis",
            "code": "KN"
    },
        {
            "name": "Saint Lucia",
            "code": "LC"
    },
        {
            "name": "Saint Pierre and Miquelon",
            "code": "PM"
    },
        {
            "name": "Saint Vincent and the Grenadines",
            "code": "VC"
    },
        {
            "name": "Samoa",
            "code": "WS"
    },
        {
            "name": "San Marino",
            "code": "SM"
    },
        {
            "name": "Sao Tome and Principe",
            "code": "ST"
    },
        {
            "name": "Saudi Arabia",
            "code": "SA"
    },
        {
            "name": "Senegal",
            "code": "SN"
    },
        {
            "name": "Serbia",
            "code": "RS"
    },
        {
            "name": "Montenegro",
            "code": "ME"
    },
        {
            "name": "Seychelles",
            "code": "SC"
    },
        {
            "name": "Sierra Leone",
            "code": "SL"
    },
        {
            "name": "Singapore",
            "code": "SG"
    },
        {
            "name": "Slovakia",
            "code": "SK"
    },
        {
            "name": "Slovenia",
            "code": "SI"
    },
        {
            "name": "Solomon Islands",
            "code": "SB"
    },
        {
            "name": "Somalia",
            "code": "SO"
    },
        {
            "name": "South Africa",
            "code": "ZA"
    },
        {
            "name": "South Georgia and the South Sandwich Islands",
            "code": "GS"
    },
        {
            "name": "Spain",
            "code": "ES"
    },
        {
            "name": "Sri Lanka",
            "code": "LK"
    },
        {
            "name": "Sudan",
            "code": "SD"
    },
        {
            "name": "Suriname",
            "code": "SR"
    },
        {
            "name": "Svalbard and Jan Mayen",
            "code": "SJ"
    },
        {
            "name": "Swaziland",
            "code": "SZ"
    },
        {
            "name": "Sweden",
            "code": "SE"
    },
        {
            "name": "Switzerland",
            "code": "CH"
    },
        {
            "name": "Syrian Arab Republic",
            "code": "SY"
    },
        {
            "name": "Taiwan, Province of China",
            "code": "TW"
    },
        {
            "name": "Tajikistan",
            "code": "TJ"
    },
        {
            "name": "Tanzania, United Republic of",
            "code": "TZ"
    },
        {
            "name": "Thailand",
            "code": "TH"
    },
        {
            "name": "Timor-Leste",
            "code": "TL"
    },
        {
            "name": "Togo",
            "code": "TG"
    },
        {
            "name": "Tokelau",
            "code": "TK"
    },
        {
            "name": "Tonga",
            "code": "TO"
    },
        {
            "name": "Trinidad and Tobago",
            "code": "TT"
    },
        {
            "name": "Tunisia",
            "code": "TN"
    },
        {
            "name": "Turkey",
            "code": "TR"
    },
        {
            "name": "Turkmenistan",
            "code": "TM"
    },
        {
            "name": "Turks and Caicos Islands",
            "code": "TC"
    },
        {
            "name": "Tuvalu",
            "code": "TV"
    },
        {
            "name": "Uganda",
            "code": "UG"
    },
        {
            "name": "Ukraine",
            "code": "UA"
    },
        {
            "name": "United Arab Emirates",
            "code": "AE"
    },
        {
            "name": "United Kingdom",
            "code": "GB"
    },
        {
            "name": "United States",
            "code": "US"
    },
        {
            "name": "United States Minor Outlying Islands",
            "code": "UM"
    },
        {
            "name": "Uruguay",
            "code": "UY"
    },
        {
            "name": "Uzbekistan",
            "code": "UZ"
    },
        {
            "name": "Vanuatu",
            "code": "VU"
    },
        {
            "name": "Venezuela",
            "code": "VE"
    },
        {
            "name": "Viet Nam",
            "code": "VN"
    },
        {
            "name": "Virgin Islands, British",
            "code": "VG"
    },
        {
            "name": "Virgin Islands, U.S.",
            "code": "VI"
    },
        {
            "name": "Wallis and Futuna",
            "code": "WF"
    },
        {
            "name": "Western Sahara",
            "code": "EH"
    },
        {
            "name": "Yemen",
            "code": "YE"
    },
        {
            "name": "Zambia",
            "code": "ZM"
    },
        {
            "name": "Zimbabwe",
            "code": "ZW"
    }
   ]
   
    var countryInput = $(document).find('.countrypicker');
    var countryList = "";
   
   
    //set defaults
    for (i = 0; i < countryInput.length; i++) {
   
        //check if flag
        flag = countryInput.eq(i).data('flag');
        
        if (flag) {
            countryList = "";
            
            //for each build list with flag
            $.each(countries, function (index, country) {
                var flagIcon = "css/flags/" + country.code + ".png";
                countryList += "<option data-country-code='" + country.code + "' data-tokens='" + country.code + " " + country.name + "' style='padding-left:25px; background-position: 4px 7px; background-image:url(" + flagIcon + ");background-repeat:no-repeat;' value='" + country.code+"-"+country.name + "'>"  + country.code+"-"+ country.name + "</option>";
            });
   
            //add flags to button
            countryInput.eq(i).on('loaded.bs.select', function (e) {
                var button = $(this).closest('.btn-group').children('.btn');
                button.hide();
                var def = $(this).find(':selected').data('country-code');
                var flagIcon = "css/flags/" + def + ".png";
                button.css("background-size", '20px');
                button.css("background-position", '10px 9px');
                button.css("padding-left", '40px');
                button.css("background-repeat", 'no-repeat');
                button.css("background-image", "url('" + flagIcon + "'");
                button.show();
            });
   
            //change flag on select change
            countryInput.eq(i).on('change', function () {
                button = $(this).closest('.btn-group').children('.btn');
                def = $(this).find(':selected').data('country-code');
                flagIcon = "css/flags/" + def + ".png";
                button.css("background-size", '20px');
                button.css("background-position", '10px 9px');
                button.css("padding-left", '40px');
                button.css("background-repeat", 'no-repeat');
                button.css("background-image", "url('" + flagIcon + "'");
   
            });
        }else{
            countryList ="";
            
            //for each build list without flag
            $.each(countries, function (index, country) {
                countryList += "<option data-country-code='" + country.code + "' data-tokens='" + country.code + " " + country.name + "' value='"  + country.code+"-"+ country.name + "'>"  + country.code+"-"+ country.name + "</option>";
            });
            
            
        }
        
         //append country list
        countryInput.eq(i).html(countryList);
   
   
        //check if default
        def = countryInput.eq(i).data('default');
        //if there's a default, set it
        if (def) {
            countryInput.eq(i).val(def);
        }
   
   
    }
   
   
   
   });
</script>