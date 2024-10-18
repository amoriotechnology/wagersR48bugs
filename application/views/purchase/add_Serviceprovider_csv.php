<!-- Add Product Start -->
<div class="content-wrapper">
   <section class="content-header">
      <div class="header-icon">
         <i class="pe-7s-note2"></i>
      </div>
      <div class="header-title">
         <h1><?php echo ('Import Service Provider Csv') ?></h1>
         <small><?php //echo display('import_product_csv') ?></small>
         <ol class="breadcrumb">
            <li><a href="<?php echo base_url('')?>"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
            <li>
               <a href="<?php echo base_url('Expenses')?>">
               </a>
           </li>
            <li class="active" style="color:orange"><?php echo  ('Import Service Provider Csv') ?></li>
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
   <!-- Add Product report -->
   <div class="row">
   <div class="col-sm-12 col-md-12">
   <!-- Multiple panels with drag & drop -->
   <div class="panel panel-bd lobidrag">
   <div class="panel-heading">
   <div class="panel-title">
   <h4><?php echo display('csv_file_informaion')?></h4>
   </div>
   </div>
   <div class="panel-body">
   <a href="<?php echo base_url('asset/data/csv/serviceprovider_csv_sample.csv') ?>" class="btn btn-primary pull-right" style="color:white;background-color:#38469f;"><i class="fa fa-download"></i><?php echo display('download_sample_file')?> </a>
   <span class="text-warning">The first line in downloaded csv file should remain as it is. Please do not change the order of columns.</span><br>The correct column order is <span class="text-info">(Service Provider Name, Address, Payment Terms, Phone Number, Bill Date , Bill Number, Account Category, Account Subcategory, Account Subcategory)</span> &amp; you must follow this.<br>Please make sure the csv file is UTF-8 encoded and not saved with byte order mark (BOM).<p>The images should be uploaded in <strong>uploads</strong> folder.</p>
   </div>
   </div>
   </div>
   </div>
   <div class="row">
   <div class="col-sm-12">
   <div class="panel panel-bd">
   <div class="panel-heading">
   <div class="panel-title">
   <h4>CSV File Information</h4>
   </div>
   </div>
   <?php echo form_open_multipart('Cpurchase/uploadCsv_Serviceprovider',array('class' => 'form-vertical', 'id' => 'validate','name' => 'insert_customer'))?>
   <div class="panel-body">
   <div class="row">
   <div class="col-sm-6">
   <div class="form-group row">
   <label for="upload_csv_file" class="col-sm-4 col-form-label"><?php echo display('upload_csv_file') ?> <i class="text-danger">*</i></label>
   <div class="col-sm-8">
   <input class="form-control" name="upload_csv_file" type="file" id="upload_csv_file" placeholder="<?php echo display('upload_csv_file') ?>" required>
   </div>
   </div>
   </div>
   </div>
   <div class="form-group row"> <div class="col-sm-6">
   <input type="submit" id="add-product" class="btn btn-primary btn-large" name="add-product" style="background-color:#38469f;color:white;"  value="<?php echo display('submit') ?>" />
   </div> 
   </div> 
   <?php echo form_close()?>
   </div>  
   </div>
   </div> 
   <br>




   <!-- Part 2 -->
   <div class="row">
   <div class="col-sm-12 col-md-12">
   <!-- Multiple panels with drag & drop -->
   <div class="panel panel-bd lobidrag">
   <div class="panel-heading">
   <div class="panel-title">
   <h4><?php echo display('csv_file_informaion')?></h4>
   </div>
   </div>
   <div class="panel-body">
   <a href="<?php echo base_url('asset/data/csv/serviceprovider_csv_sample_second.csv') ?>" style="background-color:#38469f;color:white;" class="btn btn-primary text-white pull-right"><i class="fa fa-download"></i> Download Sample File</a>
   <span class="text-warning">The first. line in downloaded csv file should remain as it is. Please do not change the order of columns.</span><br>The correct column order is <span class="text-info">(Vendor, Expense/BillDate, Payment due date, Product name, quantity, rate)<br></span> &amp; you must follow this.<br>Please make sure the csv file is UTF-8 encoded and not saved with byte order mark (BOM).<p>The images should be uploaded in <strong>uploads</strong> folder.</p>
   </div>
   </div>
   </div>
   </div>
   <div class="row">
   <div class="col-sm-12">
   <div class="panel panel-bd">
   <div class="panel-heading">
   <div class="panel-title">
   <h4>CSV File Information</h4>
   </div>
   </div>
   <?php echo form_open_multipart('Cpurchase/uploadCsv_Serviceprovider_second',array('class' => 'form-vertical', 'id' => 'validate','name' => 'insert_product'))?>
   <div class="panel-body">
   <div class="row">
   <div class="col-sm-6">
   <div class="form-group row">
   <label for="upload_csv_file" class="col-sm-4 col-form-label"><?php echo display('upload_csv_file') ?> <i class="text-danger">*</i></label>
   <div class="col-sm-8">
   <input class="form-control" name="upload_csv_file" type="file" id="upload_csv_file" placeholder="<?php echo display('upload_csv_file') ?>" required>
   </div>
   </div>
   </div>
   </div>
   <div class="form-group row"> <div class="col-sm-6">
   <input type="submit" id="add-product-csv" style="background-color:#38469f;color:white;" class="btn
      btn-primary btn-large" name="add-product-csv"
      value="<?php echo display('submit') ?>" /> </div>
   </div> 
   </div> 
   <?php echo form_close()?>
   </div>  
   </div>
   </div> 
   <br>
   <br>
   <br>
   </div> 
</div>
</section> 
</div>
<!-- Add Product  End -->
<style type="text/css">
   .error{
   color: red;
   margin-top: 10px;
   }
</style>
<div class="modal fade" id="myModal1" role="dialog" >
   <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content" style="margin-top: 190px;">
         <div class="modal-header" style="">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Sales - Profarma Invoice</h4>
         </div>
         <div class="modal-body" id="bodyModal1" style="text-align:center;font-weight:bold;">
         </div>
         <div class="modal-footer">
         </div>
      </div>
   </div>
</div>