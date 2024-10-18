<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" />
<div class="content-wrapper">
   <section class="content-header">
      <div class="header-icon">
         <i class="pe-7s-note2"></i>
      </div>
      <div class="header-title">
         <h1><?php echo display('sms_configure') ?></h1>
         <small><?php //echo display('sms_configure') ?></small>
         <ol class="breadcrumb">
            <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
            <li><a href="#"><?php echo display('sms') ?></a></li>
            <li class="active" style="color:orange;"><?php echo display('sms_configure') ?></li>
         </ol>
      </div>
   </section>



<style>

.btnclr{
       background-color:<?php echo $setting_detail[0]['button_color']; ?>;
       color: white;

   }
</style>





   <section class="content">
      <!-- Alert Message -->
      <?php
         $message = $this->session->userdata('message');
         if (isset($message)) {
         ?>
      <div class="alert alert-info alert-dismissable" style="background-color:#38469f;color:white;font-weight:bold;">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
         <?php echo $message ?>                    
      </div>
      <?php 
         $this->session->unset_userdata('message');
         }
         $error_message = $this->session->userdata('error_message');
         if (isset($error_message)) {
         ?>
      <div class="alert alert-danger alert-dismissable" style="background-color:#38469f;color:white;font-weight:bold;">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
         <?php echo $error_message ?>                    
      </div>
      <?php 
         $this->session->unset_userdata('error_message');
         }
         ?>
      <!-- New customer -->
      <div class="row" style="display: flex; justify-content: center;">
         <div class="col-sm-10">
            <div class="panel panel-bd lobidrag">
               <div class="panel-heading">
                  <div class="panel-title">
                     <h4><?php //echo display('sms_configure') ?> </h4>
                  </div>
               </div>
               <?php echo form_open_multipart('Csms/add_update_configure', array('class' => 'form-vertical','id' => 'sms_configuration'))?>
               <div class="panel-body">
                   <div class="row">
                       <div class="col-md-4">
                           <div class="form-group">
                             <label for="api_key"><?php echo display('api_key') ?> <i class="text-danger">*</i></label>
                                <input class="form-control" name ="api_key" value="<?php echo $configdata[0]['api_key'];?>" id="api_key" type="text" tabindex="1">
                                <input type="hidden" value="<?php echo $configdata[0]['id'];?>" name="id">
                            </div>
                       </div>
                       
                       <div class="col-md-4">
                           <div class="form-group">
                             <label for="api_secret"><?php echo display('api_secret') ?> <i class="text-danger">*</i></label>
                                <input class="form-control" name ="api_secret" value="<?php echo $configdata[0]['api_secret'];?>" id="api_secret" type="text" tabindex="2">
                            </div>
                       </div>
                       
                       <div class="col-md-4">
                           <div class="form-group">
                             <label for="invoice"><?php echo display('invoice') ?> <i class="text-danger">*</i></label>
                                <input class="form-control" name ="from" value="<?php echo $configdata[0]['from'];?>" id="from" type="text" tabindex="3">
                            </div>
                       </div>
                       
                       <div class="col-md-4">
                           <div class="form-group">
                             <label for="sale"><?php echo display('sale') ?> <i class="text-danger">*</i></label>
                             <br>
                                <input type="radio" name="isinvoice" id="isinvoice1" value="1"  <?php if ($configdata[0]['isinvoice'] == '1') echo 'checked="checked"'; ?>  <?php if (empty($configdata[0]['isinvoice'] == '1')){echo 'checked="checked"';}else{echo ' ';}  ?>/>
                                <label for="isinvoice1" id="yes">
                                <strong><?php echo 'Yes'; ?></strong></label>
                                <input type="radio" name="isinvoice" id="isinvoice0" value="0" <?php if ($configdata[0]['isinvoice'] == '0') echo 'checked="checked"'; ?>/>
                                <label for="isinvoice0" id="no">
                                <strong><?php echo 'No'; ?></strong></label>
                            </div>
                       </div>
                       
                       <div class="col-md-4">
                           <div class="form-group">
                             <label for="service"><?php echo display('service') ?> <i class="text-danger">*</i></label>
                             <br>
                                <input type="radio" name="isservice" id="isservice1" value="1"  <?php if ($configdata[0]['isservice'] == '1') echo 'checked="checked"'; ?>  <?php if (empty($configdata[0]['isservice'] == '1')){echo 'checked="checked"';}else{echo ' ';}  ?>/>
                                <label for="isservice1" id="yes">
                                <strong><?php echo 'Yes'; ?></strong></label>
                                <input type="radio" name="isservice" id="isservice0" value="0" <?php if ($configdata[0]['isservice'] == '0') echo 'checked="checked"'; ?>/>
                                <label for="isservice0" id="no">
                                <strong><?php echo 'No'; ?></strong></label>
                            </div>
                       </div>
                       
                        <div class="col-md-4">
                           <div class="form-group">
                             <label for="customer_receive"><?php echo display('customer_receive') ?> <i class="text-danger">*</i></label>
                             <br>
                                <input type="radio" name="isreceive" id="isreceive1" value="1"  <?php if ($configdata[0]['isreceive'] == '1') echo 'checked="checked"'; ?>  <?php if (empty($configdata[0]['isreceive'] == '1')){echo 'checked="checked"';}else{echo ' ';}  ?>/>
                                <label for="isreceive1" id="yes">
                                <strong><?php echo 'Yes'; ?></strong></label>
                                <input type="radio" name="isreceive" id="isreceive0" value="0" <?php if ($configdata[0]['isreceive'] == '0') echo 'checked="checked"'; ?>/>
                                <label for="isreceive0" id="no">
                                <strong><?php echo 'No'; ?></strong></label>
                            </div>
                       </div>
                       
                       <div class="col-md-4">
                           <div class="form-group">
                             <input type="submit" id="sms" class="btn btnclr"   name="save_changes" value="<?php echo display('save') ?>" tabindex="13"/>
                            </div>
                       </div>
                   </div>
                  
               </div>
               <?php echo form_close()?>
            </div>
         </div>
      </div>
   </section>
</div>