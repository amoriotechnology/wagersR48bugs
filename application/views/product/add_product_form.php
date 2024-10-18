<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.base64.js"></script>
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
<script src="<?php echo base_url() ?>my-assets/js/countrypicker.js" type="text/javascript"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- Product Purchase js -->
<script src="<?php echo base_url()?>my-assets/js/admin_js/json/product_purchase.js.php" ></script>
<!-- Supplier Js -->
<script src="<?php echo base_url(); ?>my-assets/js/admin_js/json/supplier.js.php" ></script>
<script src="<?php echo base_url()?>my-assets/js/admin_js/purchase.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>my-assets/js/admin_js/packing.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>my-assets/js/admin_js/json/product.js" type="text/javascript"></script>
<!-- Add Product Start -->
<div class="content-wrapper">
   <section class="content-header">
      <div class="header-icon">
        <figure class="one">
               <img src="<?php echo base_url()  ?>asset/images/product.png"  class="headshotphoto" style="height:50px;" />
      </div>
      
        
       
           <div class="header-title">
          <div class="logo-holder logo-9">
         <h1><?php echo display('new_product') ?></h1>
       </div>
          
       
       
       
         <small><?php //echo display('add_new_product') ?></small>
         <ol class="breadcrumb" style=" border: 3px solid #d7d4d6;">
            <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
            <li><a href="#"><?php echo display('product') ?></a></li>
            <li class="active" style="color:orange"><?php echo display('new_product') ?></li>
        
        
           <div class="load-wrapp">
       <div class="load-10">
         <div class="bar"></div>
       </div>
       </div>
        
        
         </ol>
      </div>
   </section>
   <section class="content">
      <style>

.btnclr{
       background-color:<?php echo $setting_detail[0]['button_color']; ?>;
       color: white;

   }

         .ui-selectmenu-text,.ui-front{
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
    width: 120px;
  }
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
         <div class="col-sm-12">
            
         </div>
      </div>
      <div class="modal fade" id="myModal1" >
         <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content" style="margin-top: 190px;text-align:center;">
               <div class="modal-header btnclr"  >
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title"><?php echo display('product')?></h4>
               </div>
               <div class="modal-body" id="bodyModal1" style="font-weight:bold;text-align:center;">
                  <h4></h4>
               </div>
               <div class="modal-footer">
               </div>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-sm-12">
            <!--<ul class="nav nav-tabs" style="    border-bottom: 1px solid;">-->
            <!--   <li class="active"><a data-toggle="tab" href="#home"><?php echo display('product')?></a></li>-->
            <!--   <li><a data-toggle="tab" href="#menu1">Sink</a></li>-->
            <!--</ul>-->
            <!-- Add Product -->
            <form id="insert_product_from_expense"  enctype="multipart/form-data" method="post">
               <input type="hidden" class="txt_csrfname" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
               <?php  $product_id = rand();  ?>
               <input type="hidden" name="product_id" class="form-control" id="product_id" value="<?php echo  $product_id; ?>" tabindex="4" placeholder=" product_id" />   
               <div class="col-sm-12">
                  <div class="panel panel-bd lobidrag"    style=" border: 3px solid #d7d4d6;"  >
                     <div class="panel-heading"  style="height: 55px;" >
                        <div class="panel-title">
                           <h4><?php //echo display('new_product') ?></h4>
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
                                 <input type="text" tabindex="3" class="form-control"  style="width: 100%; border: 2px solid #d7d4d6;" name="barcode"   placeholder="Barcode/QR-code"   />
                              </div>
                           </div>
                        </div> 
                        
                         <div class="col-sm-6">
                           <div class="form-group row">
                              <label for="sell_price" class="col-sm-4 col-form-label"><?php echo display('sell_price') ?> <i class="text-danger">*</i> </label>
                              <div class="col-sm-8">
                                 <input class="form-control" id="sell_price" name="price" type="text" required=""   style="border: 2px solid #d7d4d6;" placeholder="0.00" tabindex="5" min="0">
                              </div>
                           </div>
                        </div>
                        
                        <div class="col-sm-6">
                           <div class="form-group row">
                              <label for="product_name" class="col-sm-4 col-form-label"><?php echo display('product_name') ?> <i class="text-danger">*</i></label>
                              <div class="col-sm-8">
                                 <input class="form-control validate_productname" name="product_name" type="text" id="product_name" style="border: 2px solid #d7d4d6;"  placeholder="<?php echo display('product_name') ?>" required tabindex="1" >
                              </div>
                              <ul class="list-group get_alldata" id="result"></ul>
                           </div>
                        </div>
                        
                        <div class="col-sm-6">
                           <div class="form-group row">
                              <label for="" class="col-sm-4 col-form-label"><?php echo display('Supplier') ?> <i class="text-danger">*</i> </label>
                              <div class="col-sm-7">
                                 <select name="supplier_id"  id="supplier_id" style="width: 100%;border: 2px solid #d7d4d6;" class="form-control"  required="">
                                    <option value="" > <?php echo display('Select Vendor')?></option>
                                    <?php if ($supplier) { ?>
                                    {supplier}
                                    <option value="{supplier_id}">{supplier_name}</option>
                                    {/supplier}
                                    <?php } ?>
                                 </select>
                              </div>
                              <div class="col-sm-1">
                                 <?php //if($this->permission1->method('add_supplier','create')->access()){ ?>
                                 <a href="#" class="btnclr client-add-btn btn  "   aria-hidden="true" data-toggle="modal" data-target="#add_vendor"><i class="fa fa-user"></i></a>
                                 <?php //}?>
                              </div>
                           </div>
                        </div>
                        
                         <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                        <div class="col-sm-6">
                           <div class="form-group row">
                              <label for="product_model" class="col-sm-4 col-form-label"><?php echo display('model') ?> <i class="text-danger">*</i></label>
                              <div class="col-sm-8"> 
                                 <input type="text" tabindex="" class="form-control p_model" id="product_model" name="model" style="border: 2px solid #d7d4d6;" required placeholder="<?php echo display('model') ?>" />
                              </div>
                           </div>
                        </div>
                        
                         <div class="col-sm-6">
                            <div class="form-group row">
                            <label for="tax_id" class="col-sm-4 col-form-label"><?php   echo  display('Taxes');?> </label>
                            <div class="col-sm-8">
                            <input type="text" name="tax" class="form-control" id="tax_id" tabindex="4"  style="border: 2px solid #d7d4d6;" placeholder=" Tax" />
                            </div>
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                           <div class="form-group row">
                              <label for="serial_no" class="col-sm-4 col-form-label"><?php echo display('Serial No')?></label>
                              <div class="col-sm-8">
                                 <input type="text" tabindex="" class="form-control " id="serial_no" name="serial_no" style="border: 2px solid #d7d4d6;" placeholder="111,abc,XYz"   />
                              </div>
                           </div>
                        </div>
                        
                         <div class="col-sm-6">
                                 <div class="form-group row">
                                    <label for="country" class="col-sm-4 col-form-label"><?php echo  display('country')?></label>
                                    <div class="col-sm-8">
                                       <select class="selectpicker countrypicker form-control"  data-live-search="true" data-default="US-United States"
                                          name="country" id="country" ></select>                       
                                    </div>
                                 </div>
                              </div>
                         <div class="col-sm-6">
                           <div class="form-group row">
                              <label for="quantity" class="col-sm-4 col-form-label"><?php echo display('quantity') ?> <i class="text-danger">*</i></label>
                              <div class="col-sm-8">
                                 <input class="form-control" name="quantity" type="number" id="quantity" placeholder="Enter Product Quantity only"  style="border: 2px solid #d7d4d6;" required tabindex="1" >
                              </div>
                           </div>
                        </div>
                        
                         <div class="col-sm-6">
                           <div class="form-group row">
                              <label for="category_id" class="col-sm-4 col-form-label"><?php echo display('category') ?></label>
                              <div class="col-sm-7">
                                 <select class="form-control cat_name" id="category_id" style="width: 100%;border: 2px solid #d7d4d6;"  name="category_id" tabindex="3">
                                    <option value=""><?php echo display('Select the Category') ?></option>
                                    <?php if ($category_list) { 
                                       foreach($category_list as $cl){
                                       ?>
                                    <option value="<?php echo $cl['category_name']; ?>"><?php echo $cl['category_name']; ?></option>
                                    <?php }} ?>
                                 </select>
                              </div>
                              <div class=" col-sm-1">
                                 <?php //if($this->permission1->method('manage_category','create')->access() || $this->permission1->method('manage_category','read')->access()|| $this->permission1->method('manage_category','update')->access()|| $this->permission1->method('manage_category','delete')->access()){ ?>
                                 <a href="#" class="client-add-btn btn  btnclr"    aria-hidden="true" data-toggle="modal" data-target="#add_cat"> <i class='fa fa-plus'></i></a>
                                 <?php //} ?>
                              </div>
                           </div>
                        </div>
                        
                         <div class="col-sm-6">
                           <div class="form-group row">
                              <label for="unit" class="col-sm-4 col-form-label"><?php echo display('unit') ?></label>
                              <div class="col-sm-7">
                                 <select class="form-control" id="unit" name="unit" tabindex="-1"   style="border: 2px solid #d7d4d6;" aria-hidden="true">
                                    <option value=""><?php echo display('Select the Unit')?></option>
                                    <?php if ($unit_list) { ?>
                                    {unit_list}
                                    <option value="{unit_name}">{unit_name}</option>
                                    {/unit_list}
                                    <?php } ?>
                                 </select>
                              </div>
                              <div class=" col-sm-1">
                                 <!--   <?php //if($this->permission1->method('manage_unit','create')->access() || $this->permission1->method('manage_unit','read')->access() || $this->permission1->method('manage_unit','delete')->access() || $this->permission1->method('manage_unit','update')->access()){ ?>-->
                                 <a href="#" class="client-add-btn btn  btnclr"    aria-hidden="true" data-toggle="modal" data-target="#add_unit"> <i class='fa fa-plus'></i></a>
                                 <!--                                <?php// } ?>-->
                              </div>
                           </div>
                        </div>
                        
                         <div class="col-sm-6">
                                 <div class="form-group row">
                                    <label for="account_category" class="col-sm-4 col-form-label"><?php echo  display('Account Category');?></label>
                                    <div class="col-sm-8">
                                         <select id="ddl"  name="account_category" class="form-control"  style="border: 2px solid #d7d4d6;" onchange="configureDropDownLists(this,document.getElementById('ddl2'))">
                                          <option value=""><?php echo  display('Select the Account Category');?></option>
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
                                    <label for="image" class="col-sm-4 col-form-label"><?php echo  display('Product Image');?> </label>
                                    <div class="col-sm-8">
                                       <input type="file" name="product_image" class="form-control" id="product_image" style="border: 2px solid #d7d4d6;"  tabindex="4">
                                    </div>
                                 </div>
                              </div>
                            
                             <div class="col-sm-6"> 
                                <div class="form-group row">
                                    <label for="account_sub_category" class="col-sm-4 col-form-label">Account Subcategory</label>
                                      <div class="col-sm-8">
                                        <select class="form-control" name="account_sub_category" style="border: 2px solid #d7d4d6;" id="ddl2">
                                           <option value="Select Sub Category">Select Sub Category</option>
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
                                        <input class="form-control" name ="account_subcat" id="account_subcat" type="text"  style="border: 2px solid #d7d4d6;" placeholder=" Account Sub Category"  tabindex="1" >
                                      </div> 
                                </div>      
                              </div>
                              
                       </div>

                     </div>
                     <br/>
                     <div class="table-responsive product-supplier">
                        <table class="table table-bordered table-hover normalinvoice"  id="producttable_1"  style="border: 2px solid #d7d4d6;">
                           <thead>
                              <tr class="btnclr">
                                 <th rowspan="2" style="width: max-content;" class="text-center"><?php echo  display('description'); ?></th>
                                 <th rowspan="2" class="text-center"><?php echo display('Thick ness');?><i class="text-danger">*</i></th>
                                 <th rowspan="2" class="text-center"><?php echo display('Supplier Block No');?><i class="text-danger">*</i></th>
                                 <th rowspan="2" class="text-center" ><?php echo display('Supplier Slab No');?><i class="text-danger">*</i> </th>
                                 <th colspan="2" style="width: max-content;" class="text-center"><?php echo display('Gross Measurement');?><i class="text-danger">*</i> </th>
                                 <th rowspan="2" class="text-center"><?php echo display('Gross Sq.Ft');?></th>
                                 <th rowspan="2" style="width: min-content;" class="text-center"><?php echo display('Bundle No');?><i class="text-danger">*</i></th>
                                 <th rowspan="2" style="width: min-content;" class="text-center"><?php echo display('Slab No');?><i class="text-danger">*</i></th>
                                 <th colspan="2" style="width: max-content;" class="text-center"><?php echo display('Net Measure');?><i class="text-danger">*</i></th>
                                 <th rowspan="2" class="text-center"><?php echo display('Net Sq.Ft');?></th>
                                 <th rowspan="2" style="width: 80px;" class="text-center"><?php echo display('Cost per Sq.Ft');?></th>
                                 <th rowspan="2" style="width: 80px;" class="text-center"><?php echo display('Cost per Slab');?></th>
                                 <th rowspan="2" style="width: 80px;" class="text-center"><?php echo display('sales'); ?><br/><?php echo display('Price per Sq.Ft');?></th>
                                 <th rowspan="2"  style="width: 80px;" class="text-center"><?php echo display('Sales Slab Price');?></th>
                                 <th rowspan="2" class="text-center"><?php echo display('Weight');?></th>
                                 <th rowspan="2" class="text-center"><?php echo display('Origin');?></th>
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
                           <tbody id="addPurchaseItem_1">
                              <tr>
                                 <td>
                                    <input type="text" id="description_table_1" name="description_table[]" class="form-control" />
                                 </td>
                                 <td >
                                    <input type="text" name="thickness[]" id="thickness_1" required="" class="form-control"/>
                                 </td>
                                 <td>
                                    <input type="text" id="supplier_b_no_1" name="supplier_block_no[]" required="" class="form-control" />
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
                                    <input type="text"   style="width:60px;"id="gross_sq_ft_1" readonly name="gross_sq_ft[]" class="gross_sq_ft form-control"/>
                                 </td>
                                 <td>
                                    <input type="text" id="bundle_no_1" name="bundle_no[]" required="" class="bundle_no form-control" />
                                 </td>
                                 <td style="text-align:center;" >
                                    <input type="text"  id="slab_no_1" name="slab_no[]"    class="slab_no form-control" value="1" readonly  />
                                 </td>
                                 <td>
                                    <input type="text" id="net_width_1" name="net_width[]" required="" class="net_width form-control" />
                                 </td>
                                 <td>
                                    <input type="text" id="net_height_1" name="net_height[]"    required="" class="net_height form-control" />
                                 </td>
                                 <td >
                                    <input type="text"   style="width:60px;"  id="net_sq_ft_1" readonly name="net_sq_ft[]" class="net_sq_ft form-control"/>
                                 </td>
                                 <td>
                                    <span class="input-symbol-euro">  <input type="text" id="cost_sq_ft_1"  name="cost_sq_ft[]"  style="width:70px;" placeholder="0.00"  class="cost_sq_ft form-control" >
                                    </span>
                                 <td >
                                    <span class="input-symbol-euro">   <input type="text"  id="cost_sq_slab_1" name="cost_sq_slab[]"   style="width: 70px;" placeholder="0.00"   class="cost_sq_slab form-control"/>
                                    </span>
                                 </td>
                                 <td>
                                    <span class="input-symbol-euro">   <input type="text" id="sales_amt_sq_ft_1"  name="sales_amt_sq_ft[]"   style="width:70px;"  placeholder="0.00"  class="sales_amt_sq_ft form-control" />
                                    </span>
                                 </td>
                                 <td >
                                    <span class="input-symbol-euro">   <input type="text"  id="sales_slab_amt_1" name="sales_slab_amt[]"   style="width:70px;" placeholder="0.00"   class="sales_slab_amt form-control"/></span>
                                 </td>
                                 </td>
                                 <td>
                                    <input type="text" id="weight_1" name="weight[]"  class="weight form-control" />
                                 </td>
                                 <td >
                                    <!--<input type="text"  id="origin_1" name="origin[]" class="form-control"/>-->
                                    <select id="origin_1" name="origin[]" class="form-control">
                                       <?php foreach ($country_code as $key => $code) { ?>
                                       <option value="<?php echo $code['iso']; ?>"><?php echo $code['iso']; ?></option>
                                       <?php } ?>
                                    </select>
                                 </td>
                                 <td >
                                    <span class="input-symbol-euro"><input  type="text" class="total_price form-control" style="width:80px;"  readonly  id="total_1"  value="0.00"  name="total_amt[]"/></span>
                                 </td>
                                 <td style="text-align:center;">
                                    <button  class='delete btn btn-danger' id="delete_1" type='button' value='Delete'><i class="fa fa-trash"></i></button>
                                 </td>
                              </tr>
                           </tbody>
                           <tfoot>
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
                                 <td style="text-align:right;height:50px;" colspan="1"><b><?php  echo display('total'); ?> :</b></td>
                                 <td >
                                    <span class="input-symbol-euro">       <input type="text" id="Total" name="oa_total" readonly  class="b_total form-control" style="width: 80px" value="0.00"    /> </span>
                                 </td>
                               </tr>
                             
                           </tfoot>
                           <tfoot>
                              <tr>
                              </tr>
                         
                           </tfoot>
                        </table>
                     </div>
                     <div class="row">
                        <div class="col-sm-12">
                           <center><label for="description" class="col-form-label"><?php echo display('product_details') ?></label></center>
                           <textarea class="form-control" name="description" id="description" rows="2" placeholder="<?php echo display('product_details') ?>"   style="border: 2px solid #d7d4d6;"    tabindex="2"></textarea>
                        </div>
                     </div>
                     <br>
                     <div class="form-group row">
                        <div class="col-sm-6">
                           <input type="submit" id="add-product"    class="btn  btnclr btn-large" name="add-product" value="<?php echo display('save') ?>" tabindex="10"/>
                           <!-- <input type="submit" value="<?php echo display('save_and_add_another') ?>" name="add-product-another" class="btn btn-large btn-success" id="add-product-another" tabindex="9"> -->
                        </div>
                     </div>
                  </div>
               </div>
            </form>
         </div>
      </div>
      <!-- Purchase Report End -->
      <div class="modal fade model success "id="add_vendor" role="dialog">
         <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" style="text-align:center">
               <div class="modal-header btnclr">
                  <a href="#" class="close" data-dismiss="modal" >&times;</a>
                  <h3 class="modal-title"  ><?php echo  display('Add New Vendor');?></h3>
               </div>
               <div class="modal-body">
                  <form id="insert_supplier"  method="post">
                     <div id="customeMessage" class="alert hide"></div>
                     <div class="panel-body">
                        <div class="col-sm-6">
                           <div class="form-group row">
                              <label for="" class="col-sm-4  col-form-label"><?php echo  display('Vendor Type');?><i class="text-danger">*</i></label>
                              <div class="col-sm-8">
                                 <select   name="vendor_type" id="vendor_type" class=" form-control"   required="" id="vendor_type" >
                                    <option value=""> <?php echo  display('Selected vendor type');?></option>
                                    <option value="productsupplier"><?php echo  display('Product Supplier');?></option>
                                    <option value="servicevendor"> <?php echo  display('Service Vendor');?></option>
                                    <option value="others"> <?php echo  display('others');  ?></option>
                                 </select>
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="supplier_name" class="col-sm-4 col-form-label"> <?php echo  display('Company Name');?><i class="text-danger">*</i></label>
                              <div class="col-sm-8">
                                 <input class="form-control" name ="supplier_name" id="supplier_name" type="text" placeholder="Company Name"  required tabindex="1">
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="mobile" class="col-sm-4 col-form-label">  <?php  echo display('mobile'); ?><i class="text-danger"></i></label>
                              <div class="col-sm-8">
                                 <input class="form-control" name="mobile" id="mobile" type="number" placeholder=" Mobile"  min="0" tabindex="2">
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="phone" class="col-sm-4 col-form-label"><?php echo  display('Business Phone');?><i class="text-danger">*</i></label>
                              <div class="col-sm-8">
                                 <input class="form-control" name="phone" id="phone" type="number" placeholder="Business Phone"   required="" min="0" tabindex="2">
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="email" class="col-sm-4 col-form-label"><?php echo  display('primary Email');?> <i class="text-danger">*</i></label>
                              <div class="col-sm-8">
                                 <input class="form-control" name="email" id="email" type="email" placeholder="primary Email"    required="" tabindex="2">
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="emailaddress" class="col-sm-4 col-form-label"><?php echo  display('Secondary Email');?> <i class="text-danger"></i></label>
                              <div class="col-sm-8">
                                 <input class="form-control" name="emailaddress" id="emailaddress" type="email" placeholder="Secondary Email"  >
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="contact" class="col-sm-4 col-form-label"><?php echo  display('Contact Person');?><i class="text-danger"></i></label>
                              <div class="col-sm-8">
                                 <input class="form-control" name="contact" id="contact" type="text" placeholder="Contact Person"  >
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="fax" class="col-sm-4 col-form-label"><?php echo display('fax'); ?> <i class="text-danger"></i></label>
                              <div class="col-sm-8">
                                 <input class="form-control" name="fax" id="fax" type="text" placeholder="<?php echo display('fax') ?>"  >
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="previous_balance" class="col-sm-4 col-form-label"><?php echo display('currency'); ?></label>
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
                                    <option value="USD">USD - US Dollar - $</option>
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
                              <label for="" class="col-sm-4 col-form-label"><?php echo  display('Tax Collected');?><i class="text-danger">*</i></label>
                              <div class="col-sm-8">
                                 <select  style="width: 100%;"  class="form-control"   required name="service_provider">
                                    <option value="1"><?php  echo display('yes'); ?></option>
                                    <option value="0" selected><?php  echo display('no'); ?></option>
                                 </select>
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="state" class="col-sm-4 col-form-label"><?php  echo display('state'); ?> <i class="text-danger">*</i></label>
                              <div class="col-sm-8">
                                 <input class="form-control" name="state" id="state" type="text" required placeholder="State"  >
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="zip" class="col-sm-4 col-form-label"><?php echo display('zip'); ?> <i class="text-danger">*</i></label>
                              <div class="col-sm-8">
                                 <input class="form-control" name="zip" id="zip" type="text" required placeholder="<?php echo display('zip') ?>"  >
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="country" class="col-sm-4 col-form-label">Country<i class="text-danger">*</i></label>
                              <div class="col-sm-8">
                                 <select class="selectpicker countrypicker form-control"  data-live-search="true" data-default="US-United States"  name="country" id="country"    style="width: 100%;" ></select>
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="address " class="col-sm-4 col-form-label"><?php echo display('address') ?></label>
                              <div class="col-sm-8">
                                 <textarea class="form-control" name="address" id="address " rows="2" placeholder="Address" ></textarea>
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="details" class="col-sm-4 col-form-label"><?php echo display('supplier_details') ?></label>
                              <div class="col-sm-8">
                                 <textarea class="form-control" name="details" id="details" rows="2" placeholder="<?php echo display('supplier_details') ?>" tabindex="4"></textarea>
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="previous_balance" class="col-sm-4 col-form-label"><?php  echo  display('Credit Limit');?></label>
                              <div class="col-sm-8">
                                 <input class="form-control" name="previous_balance" id="previous_balance" type="text" min="0" placeholder="Credit Limit" tabindex="5">
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="city" class="col-sm-4 col-form-label"><?php echo display('city'); ?> <i class="text-danger"></i></label>
                              <div class="col-sm-8">
                                 <input class="form-control" name="city" id="city" type="text" placeholder="<?php echo display('city') ?>"  >
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="billing_address" class="col-sm-4  col-form-label"><?php echo  display('Payment Terms');?> <i class="text-danger">*</i></label>
                              <div class="col-sm-8">
                                 <select name="payment_terms"  id="terms"  class="form-control "  placeholder="" style="width:100%;"  required="" tabindex="1" >
                                    <option value="" selected><?php echo  display('Select the payment terms');?></option>
                                    <option value="cod">COD</option>
                                    <option value="30"> 30-<?php echo  display('Days');?></option>
                                    <option value="60"> 60-<?php echo  display('Days');?></option>
                                    <option value="90"> 90-<?php echo  display('Days');?></option>
                                    <option value="45"> 45-<?php echo  display('Days');?></option>
                                    <?php
                                       foreach($paymentterms_add as $cn){?>
                                    <option value="<?php echo $cn['paymentterms_add'];?>">  <?php echo $cn['paymentterms_add'];  ?></option>
                                    <?php } ?>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                        <!-- <div class="form-group row">
                           <label for="previous_balance" class="col-sm-4 col-form-label"><?php echo "Currency" ?></label> -->
                        <div class="form-group row">
                           <label for="adress" class="col-sm-4 col-form-label"><?php echo  display('Attachments');?>
                           </label>
                           <div class="col-sm-8">
                              <input type="file" name="attachments" style="width:96%;" class="form-control">
                           </div>
                        </div>
                     </div>
                     <div class="modal-footer">
                        <a href="#" class="btn btnclr"    data-dismiss="modal"><?php echo  display('Close');?></a>
                        <input type="submit" id="add-supplier-from-expense" name="add-supplier-from-expense"    class="btn btnclr" value="<?php echo  display('submit');?>">
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <form id="insert_category"  method="post">
         <!--<input type="hidden" id="supplier_list" value="<?php// if ($supplier) { {supplier}  ?><option value="<?php // {supplier_id}  ?>"><?php// {supplier_name} ?></option><?php  //{/supplier}   ?> <?php// }?>" name=""/>-->
         <div class="modal fade modal-success" id="add_cat" role="dialog">
            <div class="modal-dialog" role="document">
               <div class="modal-content" style="text-align:center;">
                  <div class="modal-header btnclr" >
                     <a href="#" class="close" data-dismiss="modal">&times;</a>
                     <h3 class="modal-title"><?php echo display('Add New Category')?></h3>
                  </div>
                  <div class="modal-body">
                     <div id="customeMessage" class="alert hide"></div>
                     <div class="panel-body">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                        <div class="form-group row">
                           <label for="category_name" class="col-sm-4 col-form-label"><?php echo display('category_name') ?> <i class="text-danger">*</i></label>
                           <div class="col-sm-6">
                              <input class="form-control" name ="category_name" id="category_name" type="text" placeholder="<?php echo display('category_name') ?>"  required="">
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="modal-footer">
                     <a href="#" class="btn btnclr"    data-dismiss="modal"><?php echo display('Close')?></a>
                     <input type="submit" class="btn btnclr"    value="<?php echo display('submit')?>">
                  </div>
                  <!-- <?php //echo form_close() ?> -->
               </div>
               <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
         </div>
         <!-- /.modal -->
      </form>
      <div class="modal fade modal-success" id="add_unit" role="dialog">
         <div class="modal-dialog" role="document">
            <div class="modal-content" style="text-align:center;">
               <div class="modal-header btnclr"  >
                  <a href="#" class="close" data-dismiss="modal">&times;</a>
                  <h3 class="modal-title"><?php echo display('Add New Unit')?></h3>
               </div>
               <div class="modal-body">
                  <div id="customeMessage" class="alert hide"></div>
                  <?php echo form_open('Cproduct/insert_instant_unit', array('class' => 'form-vertical', 'id' => 'insert_unit')) ?>
                  <div class="panel-body">
                     <div class="form-group row">
                        <label for="unit_name" class="col-sm-3 col-form-label"><?php echo display('unit_name') ?> <i class="text-danger">*</i></label>
                        <div class="col-sm-6">
                           <input class="form-control" name ="unit_name" id="unit_name"  type="text" placeholder="<?php echo display('unit_name') ?>"  required="">
                        </div>
                     </div>
                  </div>
               </div>
               <div class="modal-footer">
                  <a href="#" class="btn btnclr"  data-dismiss="modal"><?php echo display('Close')?></a>
                  <input type="submit" class="btn btnclr"  value="<?php echo display('submit')?>">
               </div>
               <?php echo form_close() ?>
            </div>
            <!-- /.modal-content -->
         </div>
         <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
</div>
</div>
</section>
</div>
<script type="text/javascript">
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
   
   $(document).on('keyup', '.net_height,.net_width', function(){
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
        $('.table').find('.total_price').each(function() {
   var v=$(this).val();
     overall_sum += parseFloat(v);
    // overall_sum +=parseFloat(v);
   });
    $('#Total').val(overall_sum).trigger('change');
   
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
   var overall_sum=0;
        $('.table').find('.total_price').each(function() {
   var v=$(this).val();
     overall_sum += parseFloat(v);
    // overall_sum +=parseFloat(v);
   });
    $('#Total').val(overall_sum).trigger('change');
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
        $('.table').find('.total_price').each(function() {
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
   var netresult=parseInt(netwidth) * parseInt(netheight);
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
   var netresult=parseInt(netwidth) * parseInt(netheight);
   netresult=netresult/144;
   netresult = isNaN(netresult) ? 0 : netresult;
   var nresult=netresult.toFixed(3);
   
   $('#'+'gross_sq_ft_'+id).val(netresult.toFixed(3));
   var cost_sqft=$('#cost_sq_ft_'+id).val();
   
   var sales_sqft=cost_sqft *nresult;
   var sales_slab_price=cost_sqft *nresult*id;
   console.log(parseInt(cost_sqft) +"*"+parseInt(nresult)+"*"+id);
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
   
   
   
   
</script>
<div class="modal fade modal-success" id="add_unit" role="dialog">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header" style="color:white;background-color:#38469f;">
            <a href="#" class="close" data-dismiss="modal">&times;</a>
            <h3 class="modal-title"><?php  echo display('Add New Unit')?></h3>
         </div>
         <div class="modal-body">
            <div id="customeMessage" class="alert hide"></div>
            <?php echo form_open('Cproduct/insert_instant_unit', array('class' => 'form-vertical', 'id' => 'insert_unit')) ?>
            <div class="panel-body">
               <div class="form-group row">
                  <label for="unit_name" class="col-sm-3 col-form-label"><?php echo display('unit_name') ?> <i class="text-danger">*</i></label>
                  <div class="col-sm-6">
                     <input class="form-control" name ="unit_name" id="unit_name" type="text" placeholder="<?php echo display('unit_name') ?>"  required="">
                  </div>
                  <div class="col-sm-2"> 
                     <input type="submit" id="add-unit" class="btn btn-success btn-large" style="color:white;background-color:#38469f;"  name="add-unit" value="<?php echo display('add') ?>" />
                  </div>
               </div>
            </div>
         </div>
         <div class="modal-footer">
            <a href="#" class="btn btn-danger"  style="color:white;background-color:#38469f;" data-dismiss="modal"><?php echo display('Close')?></a>
            <input type="submit"  style="color:white;background-color:#38469f;" class="btn btn-success" value="<?php echo display('submit')?>">
         </div>
         <?php echo form_close() ?>
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
</div>
</div>
</section>
</div>
<!-- Add Product End -->
<!-- Add Product End -->
<script type="text/javascript">
   // unit
    $("#tax_id").on("input", function(){
       var intValue = parseInt($(this).val().replace(/%/g, '') ) || 0;
       
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
   // var netresult=parseInt(netwidth) * parseInt(netheight);
   // netresult=netresult/144;
   // netresult = isNaN(netresult) ? 0 : netresult;
   // $('#'+'net_sq_ft_'+id).val(netresult.toFixed(3));
   // var nresult=netresult.toFixed(3);
   // var cost_sqft=$('#cost_sq_ft_'+id).val();
   
   // var sales_sqft=cost_sqft *nresult;
   // var sales_slab_price=cost_sqft *nresult*id;
   // console.log(parseInt(cost_sqft) +"*"+parseInt(nresult)+"*"+id);
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
   // var netresult=parseInt(netwidth) * parseInt(netheight);
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
     $(document).on('keyup','.normalinvoice tbody tr:last',function (e) {
      
   
   //   $('#normalinvoice_'+idt+' tbody tr:last').clone().appendTo('#normalinvoice_'+idt);
       var netheight = $('.normalinvoice').attr('id');
   const indexLastDot = netheight.lastIndexOf('_');
   var id = netheight.slice(indexLastDot + 1);
   
        var $last = $('#addPurchaseItem_1 tr:last');
      // var num = id+"_"+$last.index() + 2;
       var num = id+($last.index()+1);
       
       $('#addPurchaseItem_1 tr:last').clone().find('input,select').attr('id', function(i, current) {
           return current.replace(/\d+$/, num);
           
       }).end().appendTo('#addPurchaseItem_1');
     
    $.each($('#producttable_1 > tbody > tr'), function (index, el) {
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
   var netresult=parseInt(netwidth) * parseInt(netheight);
   netresult=netresult/144;
   netresult = isNaN(netresult) ? 0 : netresult;
   var nresult=netresult.toFixed(3);
   
   $('#'+'gross_sq_ft_'+id).val(netresult.toFixed(3));
   var cost_sqft=$('#cost_sq_ft_'+id).val();
   
   var sales_sqft=cost_sqft *nresult;
   var sales_slab_price=cost_sqft *nresult*id;
   console.log(parseInt(cost_sqft) +"*"+parseInt(nresult)+"*"+id);
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
   $(document).on('click', '.delete', function(){
   
   
   var tid=$(this).closest('table').attr('id');
   localStorage.setItem("delete_table",tid);
   console.log(localStorage.getItem("delete_table"));
   $(this).closest('tr').remove();
      var sum=0;
       $('#'+localStorage.getItem("delete_table")).find('.total_price').each(function() {
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
   // $(document).on('keyup','.sales_amt_sq_ft', function (e) {
   
   //    var netheight = $(this).attr('id');
   // const indexLastDot = netheight.lastIndexOf('_');
   // var id_num = netheight.slice(indexLastDot + 1);
   //    var sales_amt_sq_ft=$('#sales_amt_sq_ft_'+id_num).val();
   //    var net_sq_ft=$('#net_sq_ft_'+id_num).val();
   //  var netresult =parseInt(sales_amt_sq_ft) * parseInt(net_sq_ft);
   // netresult = isNaN(netresult) ? 0 : netresult;
   // var nresult=netresult.toFixed(3);
   // $('#'+'sales_slab_amt_'+id_num).val(netresult.toFixed(3));
   // $(this).closest('tr').find('.total_price').val(netresult.toFixed(3));
   // var overall_sum=0;
   //      $('.table').find('.total_price').each(function() {
   // var v=$(this).val();
   //   overall_sum += parseFloat(v);
   //  // overall_sum +=parseFloat(v);
   // });
   //  $('#Total').val(overall_sum.toFixed(3)).trigger('change');
   
   //   });
   //     $(document).on('keyup','.sales_slab_amt', function (e) {
   //          debugger;
   //   var netheight = $(this).attr('id');
   // const indexLastDot = netheight.lastIndexOf('_');
   // var id_num = netheight.slice(indexLastDot + 1);
     
   //    var sales_slab_amt=$('#sales_slab_amt_'+id_num).val();
   //    var net_sq_ft=$('#net_sq_ft_'+id_num).val();
   //  var netresult =parseInt(sales_slab_amt) / parseInt(net_sq_ft);
   // netresult = isNaN(netresult) ? 0 : netresult;
   // var nresult=netresult.toFixed(3);
   // $('#'+'sales_amt_sq_ft_'+id_num).val(netresult.toFixed(3));
   // $('#total_'+id_num).val(sales_slab_amt);
   // var overall_sum=0;
   //      $('.table').find('.total_price').each(function() {
   // var v=$(this).val();
   //   overall_sum += parseFloat(v);
   //  // overall_sum +=parseFloat(v);
   // });
   //  $('#Total').val(overall_sum.toFixed(3)).trigger('change');
   //   });
   
   
   
   
   
      // Product autocomplete dropdown
   
      
   $(document).ready(function(){
      // $("#product_list").css("visibility", "hidden");
       var csrfName = $('.txt_csrfname').attr('name'); 
       var csrfHash = $('.txt_csrfname').val();
       $.ajaxSetup({ cache: false });
       $('#product_name').keyup(function(){
       if(document.getElementById('product_name').value === ""){
         $("#result").hide();
       }else{
           $("#result").show();
       }
       $('#result').html('');
       $('#state').val('');
       var searchField = $('#product_name').val();
       var expression = new RegExp(searchField, "i");
       $.ajax({
           type: "POST",
           url: '<?php echo base_url(); ?>Cproduct/searchproduct',
           dataType: "json",
           data: {[csrfName]: csrfHash, searchField: searchField},
           success: function(data){
               // Clear the existing content
               $('#result').html('');
               
               // Check if any related products were found
               var productsFound = false;
   
               $.each(data, function(key, value){
                   if (value.product_name != '') {
                       $('#result').append('<li class="list-group-item link-class get_result">'+value.product_name+ ' - ' +value.product_model+ ' - ' +value.category_name+'</li>'); 
                       productsFound = true;
                   }
               });   
   
               // If no related products were found, hide the result container
               if (!productsFound) {
                   $("#result").hide();
               } else {
                   // If related products were found, show the result container
                   $("#result").show();
                   // Add your styling here if needed
                   $("#result").css({
                       "height": "200px",
                       "overflow": "scroll",
                       "width" : "493px",
                       "position": "relative",
                       "left": "277px",
                       "top": "3px",
                   });
               }
           }
       });
     });
   });
   
   $(document).ready(function() {
   
       $("#result").hide();
   
       $("#product_name").on("blur", function() {
         $("#result").hide(); 
       });
   
       $("#product_name").on("focus", function() {
         $("#result").show(); 
       });
     });
   
   
   // $(document).ready(function () {
   //     var csrfName = $('.txt_csrfname').attr('name');
   //     var csrfHash = $('.txt_csrfname').val();
       
   //     $("#add-product").click(function () {
   //         var unique_pname = $('.validate_productname').val();
   //         if(unique_pname === ''){
   //           swal({
   //                 title: 'Please Select Product',
   //                 // text: 'Suceess message sent!!',
   //                 icon: 'error',
   //                 button: 'Ok',
   //             }); 
   //         }
   //         $.ajax({
   //             type: 'POST',
   //             url: '<?php echo base_url(); ?>Cproduct/uniqueproductname',
   //             // dataType: 'json',
   //             data: {
   //                 [csrfName]: csrfHash,
   //                 unique_pname: unique_pname
   //             },
   //             success: function (data) {
               
   //                 var d=data.replace(/^\s+|\s+$/gm,'')
   //                     console.log(d);
   //             if (d != "not available") {
   //                  swal({
   //                     title: 'Product name already exists!',
   //                     // text: 'Suceess message sent!!',
   //                     icon: 'error',
   //                     button: 'Ok',
   //                 });
   //             }
   //             // else{
   //             //     swal({
   //             //         title: 'Product name available',
   //             //         // text: 'Suceess message sent!!',
   //             //         icon: 'success',
   //             //         button: 'Ok',
   //             //     });
   //             // }
   //             },
   //             error: function (xhr, status, error) {
   //                 console.error(xhr.responseText);
   //             }
   //         });
   //     });
   // });
   
   
   
   
   $(document).ready(function () {
       var csrfName = $('.txt_csrfname').attr('name');
       var csrfHash = $('.txt_csrfname').val();
       
       $("#add-product").click(function (event) {
         event.preventDefault();
           var unique_pname = $('.validate_productname').val();
           var product_model = $('.p_model').val();
           var category_name = $('.cat_name').val();
           // if(unique_pname === '' || product_model === '' || category_name === ''){
           //   swal({
           //         title: 'Please Select Product',
           //         // text: 'Suceess message sent!!',
           //         icon: 'error',
           //         button: 'Ok',
           //     }); 
           // }
           $.ajax({
               type: 'POST',
               url: '<?php echo base_url(); ?>Cproduct/uniqueproductname',
               // dataType: 'json',
               data: {
                   [csrfName]: csrfHash,
                   unique_pname: unique_pname, 
                   product_model: product_model,
                   category_name:category_name
               },
               success: function (data) {
               
                   var d=data.replace(/^\s+|\s+$/gm,'')
                       console.log(d);
               if (d != "not available") {
                    swal({
                       title: 'Product name already exists!',
                       // text: 'Suceess message sent!!',
                       icon: 'error',
                       button: 'Ok',
                   });
               }else{
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
               }
               },
               error: function (xhr, status, error) {
                   console.error(xhr.responseText);
               }
           });
       });
   });

   
</script>