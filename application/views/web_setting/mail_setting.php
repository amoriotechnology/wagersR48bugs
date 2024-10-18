<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/bootstrap-toggle.css">
<script src="<?php echo base_url()?>assets/js/bootstrap-toggle.min.js" type="text/javascript"></script>
<div class="content-wrapper">
   <section class="content-header">
      <div class="header-icon">
         <i class="pe-7s-note2"></i>
      </div>
      <div class="header-title">
         <h1><?php echo display('mail_configuration') ?></h1>
         <small><?php //echo display('mail_configuration') ?></small>
         <ol class="breadcrumb">
            <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
            <li><a href="#"><?php echo display('mail') ?></a></li>
            <li class="active" style="color:orange;"><?php echo display('mail_configuration') ?></li>
         </ol>
      </div>
   </section>
   <style>
      .select2{
      display:none;
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
      <!-- New category -->
      <div class="row" style="display: flex; justify-content: center;">
         <div class="col-sm-10">
            <div class="panel panel-bd lobidrag">
               <div class="panel-heading">
                  <div class="panel-title">
                     <h4><?php //echo display('mail_configuration') ?> </h4>
                  </div>
               </div>
               <div class="panel-body">
                  <?php echo form_open_multipart('Cweb_setting/mail_config_update','class="form-vertical" id="insert_customer"')?>   
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                   <label for="protocol"><?php echo display('protocol'); ?> <i class="text-danger">*</i></label>
                                   <input class="form-control" name="protocol" id="protocol" type="text" value="<?php echo $mail_setting[0]->protocol; ?>">
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                   <label for="smtp_host"><?php echo display('smtp_host'); ?> <i class="text-danger">*</i></label>
                                   <input class="form-control" name="smtp_host" id="smtp_host" type="text" value="<?php echo $mail_setting[0]->smtp_host; ?>">
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                   <label for="smtp_port"><?php echo display('smtp_port'); ?><i class="text-danger">*</i></label>
                                   <input class="form-control" name="smtp_port" id="smtp_port" type="text" value="<?php echo $mail_setting[0]->smtp_port; ?>">
                                </div>
                            </div>
                            
                             <div class="col-md-4">
                                <div class="form-group">
                                   <label for="smtp_user"><?php echo display('sender_mail'); ?> <i class="text-danger">*</i></label>
                                   <input class="form-control" name="smtp_user" id="smtp_user" type="email" value="<?php echo $mail_setting[0]->smtp_user; ?>">
                                </div>
                            </div>
                            
                             <div class="col-md-4">
                                <div class="form-group">
                                    <label for="smtp_pass"><?php echo display('password'); ?> <i class="text-danger">*</i></label>
                                    <input class="form-control" name="smtp_pass" id="smtp_pass" type="password" value="<?php echo $mail_setting[0]->smtp_pass; ?>">
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                               <div class="form-group">
                                   <label for="mailtype"><?php echo display('mail_type'); ?> <i class="text-danger">*</i></label>
                                   <select class="form-control" name="mailtype" id="mailtype" data-placeholder="<?php echo display('select_one'); ?>">
                                        <option value=""></option>
                                        <option value="html" <?php
                                        if ($mail_setting[0]->mailtype == 'html') {
                                            echo 'selected';
                                        }
                                        ?>><?php echo display('html'); ?></option>
                                        <option value="text" <?php
                                        if ($mail_setting[0]->mailtype == 'text') {
                                               echo 'selected';
                                        }
                                        ?>><?php echo display('text'); ?></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="invoice"><?php echo display('invoice'); ?> <i class="text-danger"></i></label>
                                      <input type="radio" name="isinvoice" id="isinvoice1" value="1"  <?php if ($mail_setting[0]->isinvoice == '1') echo 'checked="checked"'; ?>  <?php if (empty($mail_setting[0]->isinvoice == '1')){echo 'checked="checked"';}else{echo ' ';}  ?>/>
                                      <label for="isinvoice1" id="yes">
                                      <strong><?php echo 'Yes'; ?></strong></label>&nbsp;&nbsp;
                                      <input type="radio" name="isinvoice" id="isinvoice0" value="0" <?php if ($mail_setting[0]->isinvoice == '0') echo 'checked="checked"'; ?>/>
                                      <label for="isinvoice0" id="no">
                                      <strong><?php echo 'No'; ?></strong></label>
                                </div>
                            </div>
                            
                             <div class="col-md-3">
                                <div class="form-group">
                                    <label for="service"><?php echo display('service'); ?> <i class="text-danger"></i></label>
                                      <input type="radio" name="isservice" id="isservice1" value="1"  <?php if ($mail_setting[0]->isservice == '1') echo 'checked="checked"'; ?>  <?php if (empty($mail_setting[0]->isservice == '1')){echo 'checked="checked"';}else{echo ' ';}  ?>/>
                                      <label for="isservice1" id="yes">
                                      <strong><?php echo 'Yes'; ?></strong></label>&nbsp;&nbsp;
                                      <input type="radio" name="isservice" id="isservice0" value="0" <?php if ($mail_setting[0]->isservice == '0') echo 'checked="checked"'; ?>/>
                                      <label for="isservice0" id="no">
                                      <strong><?php echo 'No'; ?></strong></label>
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="quotation"><?php echo display('quotation'); ?> <i class="text-danger"></i></label>
                                      <input type="radio" name="isquotation" id="isquotation1" value="1"  <?php if ($mail_setting[0]->isquotation == '1') echo 'checked="checked"'; ?>  <?php if (empty($mail_setting[0]->isquotation == '1')){echo 'checked="checked"';}else{echo ' ';}  ?>/>
                                      <label for="isquotation1" id="yes">
                                      <strong><?php echo 'Yes'; ?></strong></label>&nbsp;&nbsp;
                                      <input type="radio" name="isquotation" id="isquotation0" value="0" <?php if ($mail_setting[0]->isquotation == '0') echo 'checked="checked"'; ?>/>
                                      <label for="isquotation0" id="no">
                                      <strong><?php echo 'No'; ?></strong></label>
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="quotation">Include Attachment <i class="text-danger"></i></label>
                                      <input type="radio" name="isattachment" id="isattachment1" value="1"  <?php if ($mail_setting[0]->isattachment == '1') echo 'checked="checked"'; ?>  <?php if (empty($mail_setting[0]->isattachment == '1')){echo 'checked="checked"';}else{echo ' ';}  ?>/>
                                      <label for="isattachment1" id="yes">
                                      <strong><?php echo 'Yes'; ?></strong></label>&nbsp;&nbsp;
                                      <input type="radio" name="isattachment" id="isattachment0" value="0" <?php if ($mail_setting[0]->isattachment == '0') echo 'checked="checked"'; ?>/>
                                      <label for="isattachment0" id="no">
                                      <strong><?php echo 'No'; ?></strong></label>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <input type="submit" class="btn btnclr" style="background-color:#38469f;color:white;" value="Save">
                            </div>
                        </div>
                    </div>
                  <?php echo form_close();?>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>
<!-- Add new category end -->