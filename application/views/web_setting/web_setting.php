    <?php error_reporting(1); ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- Add new customer start -->
<!-- Latest compiled and minified CSS -->
<div class="content-wrapper">
<section class="content-header">
   <div class="header-icon">
      <i class="pe-7s-note2"></i>
   </div>
   <div class="header-title">
      <h1><?php echo display('update_setting') ?></h1>
      <small><?php //echo display('update_your_web_setting') ?></small>
      <ol class="breadcrumb">
         <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
         <li><a href="#"><?php echo display('web_settings') ?></a></li>
         <li class="active" style="color:orange;"><?php echo display('update_setting') ?></li>
      </ol>
   </div>
</section>
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
   <div class="row">
      <div class="col-sm-12">
         <div class="panel panel-bd lobidrag" style='border: 3px solid #d1cbcb;'>
            <?php echo form_open_multipart('Cweb_setting/update_setting', array('class' => 'form-vertical', 'id' => 'insert_customer')) ?>
            <div class="panel-body">
               <div class="row">
                  <div class="col-md-6">
                     <div class="form-group row">
                        <label for="logo" style='margin-top:15px;' class="col-sm-3 col-form-label"><?php echo display('logo') ?> <i class="text-danger">*</i></label>
                        <div class="col-sm-4">
                           <input class="form-control" style='margin-top:15px;' name ="logo" id="logo" type="file" tabindex="1">
                        </div>
                        <div class="col-sm-2" style='margin-top:-15px;'>
                           <div class="d-flex justify-content-center align-items-center h-100">
                              <img src="{logo}" class="img img-responsive" height="100px" width="100px">
                           </div>
                        </div>
                        <input name ="old_logo" type="hidden" value="{logo}">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group row">
                        <label for="invoice_logo" class="col-sm-3 col-form-label"><?php echo display('invoice_logo') ?><i class="text-danger">*</i></label>
                        <div class="col-sm-4">
                           <input class="form-control" name="invoice_logo" id="invoice_logo" type="file" tabindex="2">
                        </div>
                        <div class="col-sm-2" style='margin-top:-33px;'>
                           <div class="d-flex justify-content-center align-items-center h-100">
                              <img src="{invoice_logo}" class="img img-responsive ml-3" height="100px" width="100px">
                           </div>
                        </div>
                        <input name="old_invoice_logo" type="hidden" value="{invoice_logo}">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group row">
                        <label for="currency_position" class="col-sm-3 col-form-label">Week Setting <i class="text-danger">*</i></label>
                        <div class="row">
                           <div class="col-md-3">
                              <label for="start_week">Start Week</label>
                              <select class="form-control" name="start_week" id="start_week" tabindex="6">
                                 <?php
                                    $weeks = [0 => 'Sunday', 1 => 'Monday', 2 => 'Tuesday', 3 => 'Wednesday', 4 => 'Thusday', 5 => 'Friday', 6 => 'Saturday'];
                                    foreach($weeks as $week) {
                                 ?>
                                    <option value="<?= $week ?>" <?= (!empty($start_week) && ($start_week == $week)) ? 'selected' : ''; ?>><?= $week; ?></option>
                                    <?php } ?>
                              </select>
                           </div>
                           <div class="col-md-3">
                           <label for="end_week">End Week</label>
                              <select class="form-control" name="end_week" id="end_week" tabindex="6">
                              <?php
                                    foreach($weeks as $week) {
                                 ?>
                                    <option value="<?= $week ?>" <?= (!empty($end_week) && ($end_week == $week)) ? 'selected' : ''; ?>><?= $week; ?></option>
                                    <?php } ?>
                              </select>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group row">
                        <label for="currency" class="col-sm-3 col-form-label"><?php echo display('currency') ?> <i class="text-danger">*</i></label>
                        <div class="col-sm-6">
                           <select class="form-control" name="currency" id="currency" tabindex="5">
                              <?php foreach($currency_list as $clist){?>
                              <option value="<?php echo $clist->icon?>" <?php if ($currency == $clist->icon) {
                                 echo "selected";
                                 } ?>><?php echo $clist->currency_name.' '.$clist->icon;?></option>
                              <?php }?>
                           </select>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group row">
                        <label for="favicon" class="col-sm-3 col-form-label"><?php echo display('favicon') ?> <i class="text-danger">*</i></label>
                        <div class="col-sm-4">
                           <input class="form-control" name="favicon" id="favicon" type="file" tabindex="3">
                        </div>
                        <div class="col-sm-2" style='margin-top:-33px;'>
                           <div class="d-flex justify-content-center align-items-center h-100">
                              <img src="{favicon}" class="img img-responsive" height="100px" width="100px">
                           </div>
                        </div>
                        <input name="old_favicon" type="hidden" value="{favicon}" tabindex="4">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group row">
                        <label for="time_zone" class="col-sm-3 col-form-label"><?php echo display('timezone') ?> <i class="text-danger">*</i></label>
                        <div class="col-sm-6">
                           <?php echo form_dropdown('timezone', $timezonelist,$timezone , array('class'=>'form-control')); ?>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group row">
                        <label for="currency_position" class="col-sm-3 col-form-label"><?php echo display('currency_position') ?> <i class="text-danger">*</i></label>
                        <div class="col-sm-6">
                           <select class="form-control" name="currency_position" id="currency_position" tabindex="6">
                              <option value=""><?php echo display('select_one') ?></option>
                              <option value="0" <?php if ($currency_position == 0) {
                                 echo "selected";
                                 } ?>><?php echo display('left') ?></option>
                              <option value="1" <?php if ($currency_position == 1) {
                                 echo "selected";
                                 } ?>><?php echo display('right') ?></option>
                           </select>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group row">
                        <label for="favicon" class="col-sm-3 col-form-label"><?php echo 'Office Logo' ?> <i class="text-danger">*</i></label>
                        <div class="col-sm-4">
                           <input class="form-control c_logo" name="logo" id="logo" type="file" tabindex="3">
                        </div>
                        <div class="col-sm-2" style='margin-top:-33px;'>
                           <div class="d-flex justify-content-center align-items-center h-100">
                              <img src="{office_logo}" class="img img-responsive" height="100px" width="100px">
                           </div>
                        </div>
                        <input name="old_officelogo" class="old_officelogo" type="hidden" value="{office_logo}" tabindex="4">
                        <input type="hidden" name="status_logo" value="OfficeLogo">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group row">
                        <label for="footer_text" class="col-sm-3 col-form-label"><?php echo display('footer_text') ?> <i class="text-danger">*</i></label>
                        <div class="col-sm-6">
                           <input class="form-control" name ="footer_text" id="footer_text" type="text" placeholder="Foter Text" value="{footer_text}" tabindex="7">
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group row">
                        <label for="language" class="col-sm-3 col-form-label"><?php echo display('language') ?> <i class="text-danger">*</i></label>
                        <div class="col-sm-6">
                           <?php
                              echo form_dropdown('language', $language, '', 'class="form-control" id="language" tabindex="8"');
                              ?>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group row">
                        <label for="lrt" class="col-sm-3 col-form-label"><?php echo display('ltr_or_rtr') ?> <i class="text-danger">*</i></label>
                        <div class="col-sm-6">
                           <select class="form-control" name="rtr" id="lrt" tabindex="9">
                              <option value=""><?php echo display('select_one') ?></option>
                              <option value="0" <?php if ($rtr == 0) {
                                 echo "selected";
                                 } ?>><?php echo display('ltr') ?></option>
                              <option value="1" <?php if ($rtr == 1) {
                                 echo "selected";
                                 } ?>><?php echo display('rtr') ?></option>
                           </select>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group row">
                        <label for="captcha" class="col-sm-3 col-form-label"><?php echo display('captcha') ?> <i class="text-danger">*</i></label>
                        <div class="col-sm-6">
                           <select class="form-control" name="captcha" id="captcha" tabindex="10">
                              <option value=""><?php echo display('select_one') ?></option>
                              <option value="0" <?php if ($captcha == 0) {
                                 echo "selected";
                                 } ?>><?php echo display('active') ?></option>
                              <option value="1" <?php if ($captcha == 1) {
                                 echo "selected";
                                 } ?>><?php echo display('inactive') ?></option>
                           </select>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group row">
                        <label for="site_key" class="col-sm-3 col-form-label"><?php echo display('site_key') ?> <i class="text-danger">*</i></label>
                        <div class="col-sm-6">
                           <input class="form-control" name ="site_key" id="site_key" type="text" placeholder="<?php echo display('site_key') ?> " value="{site_key}" tabindex="11">
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group row">
                        <label for="secret_key" class="col-sm-3 col-form-label"><?php echo display('secret_key') ?> <i class="text-danger">*</i></label>
                        <div class="col-sm-6">
                           <input class="form-control" name ="secret_key" id="secret_key" type="text" placeholder="<?php echo display('secret_key') ?>" value="{secret_key}" tabindex="12">
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group row">
                        <label for="discount_type" class="col-sm-3 col-form-label"><?php echo display('discount_type') ?> <i class="text-danger">*</i></label>
                        <div class="col-sm-6">
                           <select class="form-control" name="discount_type" id="discount_type" tabindex="10">
                              <option value=""><?php echo display('select_one') ?></option>
                              <option value="1" <?php if ($discount_type == 1) {
                                 echo "selected";
                                 } ?>><?php echo display('discount_percentage') ?> %</option>
                              <option value="2" <?php if ($discount_type == 2) {
                                 echo "selected";
                                 } ?>><?php echo display('discount') ?></option>
                              <option value="3" <?php if ($discount_type == 3) {
                                 echo "selected";
                                 } ?>><?php echo display('fixed_dis') ?></option>
                           </select>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group row">
                        <label for="secret_key" class="col-sm-3 col-form-label"><?php echo display('secret_key') ?> <i class="text-danger">*</i></label>
                        <div class="col-sm-6">
                           <input class="form-control" name ="secret_key" id="secret_key" type="text" placeholder="<?php echo display('secret_key') ?>" value="{secret_key}" tabindex="12">
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group row">
                        <label for="secret_key" class="col-sm-3 col-form-label"><?php echo display('secret_key') ?> <i class="text-danger">*</i></label>
                        <div class="col-sm-6">
                           <input class="form-control" name ="secret_key" id="secret_key" type="text" placeholder="<?php echo display('secret_key') ?>" value="{secret_key}" tabindex="12">
                        </div>
                     </div>
                  </div>
                  <!-- <div class="col-md-6">  <div class="form-group row">
                     <label for="secret_key" class="col-sm-3 col-form-label"><?php echo  ('Side Menu Bar Section') ?> <i class="text-danger">*</i></label>
                     <div class="col-sm-6">
                     <input type="color" name ="side_menu_bar" id="side_menu_bar"  value="{side_menu_bar}"   >
                     </div>
                     </div>
                      </div>
                      
                     <div class="col-md-6"> <div class="form-group row">
                     <label for="secret_key" class="col-sm-3 col-form-label"><?php echo  ('Top Menu Bar Section') ?> <i class="text-danger">*</i></label>
                     <div class="col-sm-6">
                     <input type="color" name ="top_menu_bar" id="top_menu_bar"  value="{top_menu_bar}"  >
                     </div>
                     </div>
                     
                     </div> -->
                      <div class="col-md-6">

<div class="form-group row">
<div class="col-sm-0"></div>
<div class="col-sm-2">
<label for="secret_key" ><?php echo    ('Side Menu')?> </label></div>
    <div class="col-sm-1">
    <input type="color" name ="side_menu_bar" id="side_menu_bar"  value="{side_menu_bar}"   >
   </div>
   <div class="col-sm-2">
   <label for="currency"><?php echo   ('Top Menu')?> </label>
    </div>
    <div class="col-sm-1">
    <input type="color" name ="top_menu_bar" id="top_menu_bar"  value="{top_menu_bar}"  >
</div>

<div class="col-sm-2">
   <label for="currency"><?php echo   ('Button Color')?> </label>
    </div>
    <div class="col-sm-1">
    <input type="color" name ="button_color" id="button_color"  value="{button_color}"  >
</div>

</div>
</div>
                  
                  
                  
                  
                  
                  
                  
                  <div id="mask"></div>
                  <div class="col-md-6">
                     <div class="form-group row">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-2">
                           <label for="secret_key" ><?php echo  ('Sales')?> </label>
                        </div>
                        <div class="col-sm-1">
                           <span class="open-modal"><i class="fa fa-cog fa-2x"  style='margin-left:-6px;'  aria-hidden="true" id="sale" data-toggle="modal" data-target="#basicModal"></span></i>
                        </div>
                        <div class="col-sm-2">
                           <label for="currency" ><?php echo  ('Expense')?> </label>
                        </div>
                        <div class="col-sm-1">
                           <i class="fa fa-cog fa-2x" aria-hidden="true" id="expense" style='margin-left:-6px;' data-toggle="modal" data-target="#expensemodel"></i>
                        </div>
                     </div>
                  </div>
                  <br>
                  <div class="col-md-6" style="width: 110%;margin: 20px;margin-left: 3px;" >
    <div class="form-group row">
        <label for="agree_share_checkbox" class="col-sm-6 col-form-label">
            <input type="hidden" name="agree_share" value="No">
            <input class="form-check-input" id="agree_share_checkbox" type="checkbox" <?php if ($agree_share == "Yes") echo "checked"; ?>>
            <?php echo 'I agree to share product details, stock availability, and pricing information for display on Stockeai'; ?>
        </label>
    </div>
</div>
<script>
    var checkbox = document.getElementById("agree_share_checkbox");
    checkbox.addEventListener("change", function() {
        var hiddenInput = document.querySelector("input[name='agree_share']");
        hiddenInput.value = this.checked ? "Yes" : "No";
    });
</script>
                  <div>
                     <div class="form-group row">
                        <label for="example-text-input" class="col-sm-1 col-form-label" ></label>
                        <div class="col-sm-6">
                           <div class='col-sm-3'></div>
                           <div class=col-sm-2>
                              <input type="submit"  style="margin-left:-23px;color:white;background-color:#38469f;" id="add-customer" class="btn btn-success btn-large get_companylogo" name="add-customer" value="<?php echo display('save') ?>" tabindex="13"/>
                           </div>
                        </div>
                     </div>
                  </div>
                  <?php echo form_close() ?>
               </div>
            </div>
         </div>
      </div>
</section>
</div>
<style>
   input,select,.company,.mail {
   margin-bottom: 1em;
   padding: .25em;
   border: 0;
   border: 1px solid #337ab7;
   letter-spacing: .15em;
   border-radius: 0;
   &:focus, &:active {
   outline: 0;
   }
   }
   .table{
   font-weight:normal;
   padding:10px;
   }
   th{
   text-align:center;
   }
   .modal-dialog {
   position: fixed;
   margin: auto;
   width: 320px;
   height: 100%;
   left: 500px;
   }
   #bold{
   font-weight:bold;
   }
   .select2{
   display:none;
   }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Add new customer end -->
<div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"  aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content" style="width: max-content;">
        <input type="hidden" class="txt_csrfname" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
         <div class="modal-header" style="color:white;background-color:#38469f;">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title" id="myModalLabel"><?php echo display('SALES SETTING') ?></h4>
         </div>
         <div class="modal-body">
            <table class="table table-bordered" id="tableAlerts" >
               <thead style="text-align:center;">
                  <tr>
                     
                     <th><?php echo display('DATES') ?></th>
                     <th><?php echo display('TIME') ?></th>
                     <th><?php echo display('SOURCE') ?></th>
                  
                  </tr>
               </thead>
               <tbody>
               <form id="notificationForm" method="post">
                  <tr>
                       <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                        <input type="hidden" name="menu[]" value="SALE - NEW SALE - ETD"/>
                     <td><span id="bold"><?php echo display('NEW SALE') ?></span> - ETD</td>
                     <td>
                        <select class="when select_date" name="select_date[]" style="width: -webkit-fill-available;" >
                           <!-- <option value="<?php echo !empty($time) ? $time : ''; ?>"><?php echo !empty($time) ? $time : 'Select Preferred Source'; ?></option> -->
                           <option value=""><?php echo display('Select Preferred Date') ?></option>
                        </select>
                      
                     </td>
                     <td style="display: none;"><input type="hidden" name="status[]" class="ETD" value="NewSaleETD"></td>
                     <td>
                        <select class="where select_source" name="select_source[]"  style="width: -webkit-fill-available;">
                            <!-- <option value="<?php echo !empty($source) ? $source : ''; ?>"><?php echo !empty($source) ? $source : 'Select Preferred Source'; ?></option> -->
                           <option value=""><?php echo display('Select Preferred Source') ?></option>
                        </select>
                     </td>
                     <td class="EMAIL">
                        <select class="where" name= "email[]" style="width: -webkit-fill-available;">
                           <option value=""><?php echo display('Select Preferred Email') ?></option>
                        </select>
                     </td>
                     <td style="display: none;"><input type="hidden" name="company[]" class="Company_name" value=""></td>
                   
                  </tr>
                <tr>
                    <input type="hidden" name="menu[]" value="SALE - NEW SALE - ETA"/>
                   
                     <td><span id="bold"><?php echo display('NEW SALE') ?></span> - <?php echo display('ETA') ?></td>
                     <td>
                        <select class="when select_dateeta" name="select_date[]" style="width: -webkit-fill-available;">
                           <option value="Select Preferred Date"><?php echo display('Select Preferred Date') ?></option>
                        </select>
                     </td>
                     <td style="display: none;"><input type="hidden" name="status[]" class="ETA" value="NewSaleETA"></td>
                     <td>
                        <select class="where select_sourceeta" name="select_source[]" style="width: -webkit-fill-available;">
                           <option value="Select Preferred Source"><?php echo display('Select Preferred Source') ?></option>
                        </select>
                     </td>
                     <td class="EMAIL">
                        <select class="where" name= "email[]" style="width: -webkit-fill-available;">
                           <option value="Select Preferred Email"><?php echo display('Select Preferred Email') ?></option>
                        </select>
                     </td>
                     <td style="display: none;"><input type="hidden" name="company[]" class="Company_name" value=""></td>
                      
                  </tr>
                 <tr>
          <input type="hidden" name="menu[]" value="SALE - NEW SALE - PAYMENT DUE DATE"/>
                     <td><span id="bold"><?php echo display('NEW SALE') ?></span> - <?php echo display('PAYMENT DUE DATE') ?></td>
                     <td>
                        <select class="when select_datePaymentduedate" name="select_date[]" style="width: -webkit-fill-available;">
                           <option value="Select Preferred Date"><?php echo display('Select Preferred Date') ?></option>
                        </select>
                     </td>
                     <td style="display: none;"><input type="hidden" name="status[]" class="PAYMENTDUEDATE" value="NewSalePAYMENTDUEDATE"></td>
                     <td>
                        <select class="where select_sourcePaymentduedate" name="select_source[]" style="width: -webkit-fill-available;">
                           <option value="Select Preferred Source"><?php echo display('Select Preferred Source') ?></option>
                        </select>
                     </td>
                     <td class="EMAIL">
                        <select class="where" name= "email[]" style="width: -webkit-fill-available;">
                           <option value="Select Preferred Email"><?php echo display('Select Preferred Email') ?></option>
                        </select>
                     </td>
                     <td style="display: none;"><input type="hidden" name="company[]" class="Company_name" value=""></td>
                     
                  </tr>
                 <tr>
                    <input type="hidden" name="menu[]" value="SALE - OCEAN EXPORT TRACKING - ETD"/>
                     <td><span id="bold"><?php echo display('OCEAN EXPORT TRACKING') ?></span> - <?php echo display('ETD') ?></td>
                     <td>
                        <select class="when select_dateOCEANEXPORTETD" name="select_date[]"  style="width: -webkit-fill-available;">
                           <option value="Select Preferred Date"><?php echo display('Select Preferred Date') ?></option>
                        </select>
                     </td>
                     <td style="display: none;"><input type="hidden" name="status[]" class="OCEANETD" value="OceanexporttrackingETD"></td>
                     <td>
                        <select class="where select_sourceOCEANEXPORTETD" name="select_source[]"  style="width: -webkit-fill-available;">
                           <option value="Select Preferred Source"><?php echo display('Select Preferred Source') ?></option>
                        </select>
                     </td>
                     <td style="display: none;"><input type="hidden" name="company[]" class="Company_name" value=""></td>
                     <td class="EMAIL">
                        <select class="where" name= "email[]" style="width: -webkit-fill-available;">
                           <option value="Select Preferred Email"><?php echo display('Select Preferred Email') ?></option>
                        </select>
                     </td>
                   </tr>
                 <tr>
                   <input type="hidden" name="menu[]" value="SALE - OCEAN EXPORT TRACKING - ETA"/>
                     <td><span id="bold"><?php echo display('OCEAN EXPORT TRACKING') ?></span> - <?php echo display('ETA') ?></td>
                     <td>
                        <select class="when select_dateOCEANEXPORTETA" name="select_date[]" style="width: -webkit-fill-available;">
                           <option value="Select Preferred Date"><?php echo display('Select Preferred Date') ?></option>
                        </select>
                     </td>
                     <td style="display: none;"><input type="hidden" name="status[]" class="OCEANETA" value="OceanexporttrackingETA"></td>
                     <td>
                        <select class="where select_sourceOCEANEXPORTETA" name="select_source[]" style="width: -webkit-fill-available;">
                           <option value="Select Preferred Source"><?php echo display('Select Preferred Source') ?></option>
                        </select>
                     </td>
                     <td style="display: none;"><input type="hidden" name="company[]" id="Company_name" value=""></td>
                     <td class="EMAIL">
                        <select class="where" name= "email[]" style="width: -webkit-fill-available;">
                           <option value="Select Preferred Email"><?php echo display('Select Preferred Email') ?></option>
                        </select>
                     </td>
                     <td style="display: none;"><input type="hidden" name="company[]" class="Company_name" value=""></td>
                    </tr>
                  <tr>
                   <input type="hidden" name="menu[]" value="SALE - TRUCKING - CONTAINER PICKUP DATE"/>
                     <td><span id="bold"><?php echo display('TRUCKING') ?></span> - <?php echo display('CONTAINER PICKUP DATE') ?></td>
                     <td>
                        <select class="when select_dateTRUCKINGCPD" name="select_date[]" style="width: -webkit-fill-available;">
                           <option value="Select Preferred Date"><?php echo display('Select Preferred Date') ?></option>
                        </select>
                     </td>
                     <td style="display: none;"><input type="hidden" name="status[]" class="TRUCKINGPICKUPDATE" value="TRUCKINGCONTAINERPICKUPDATE"></td>
                     <td>
                        <select class="where select_sourceTRUCKINGCPD" name="select_source[]" style="width: -webkit-fill-available;">
                           <option value="Select Preferred Source"><?php echo display('Select Preferred Source') ?></option>
                        </select>
                     </td>
                     <td class="EMAIL">
                        <select class="where" name= "email[]" style="width: -webkit-fill-available;">
                           <option value="Select Preferred Email"><?php echo display('Select Preferred Email') ?></option>
                        </select>
                     </td>
                     <td style="display: none;"><input type="hidden" name="company[]" class="Company_name" value=""></td>
                  </tr>
                   <tr>
                      <input type="hidden" name="menu[]" value="SALE - TRUCKING - DELIVERY DATE"/>
                     <td><span id="bold"><?php echo display('TRUCKING') ?></span> - <?php echo display('DELIVERY DATE') ?></td>
                     <td>
                        <select class="when select_dateTRUCKINGDD" name="select_date[]" style="width: -webkit-fill-available;">
                           <option value="Select Preferred Date"><?php echo display('Select Preferred Date') ?></option>
                        </select>
                     </td>
                     <td style="display: none;"><input type="hidden" name="status[]" class="TRUCKINGDELIVERYDATE" value="TRUCKINGDELIVERYDATE"></td>
                     <td>
                        <select class="where select_sourceTRUCKINGDD" name="select_source[]" style="width: -webkit-fill-available;">
                           <option value="Select Preferred Source"><?php echo display('Select Preferred Source') ?></option>
                        </select>
                     </td>
                     <td class="EMAIL">
                        <select class="where" name= "email[]" style="width: -webkit-fill-available;">
                           <option value="Select Preferred Email"><?php echo display('Select Preferred Email') ?></option>
                        </select>
                     </td>
                     <td style="display: none;"><input type="hidden" name="company[]" class="Company_name" value=""></td>
                     <td>
                        <button id="submitAll" type="submit" class="btn btn-primary" style="background-color:#1c2350;"><?php echo display('Save') ?></button>
                     </td>
                  </tr>
</form>
               </tbody>
            </table>
         </div>
       
       
      </div>
   </div>
</div>
<input type ="hidden" name="csrf_test_name" id="csrf_test_name" value="<?php echo $this->security->get_csrf_hash();?>">
<script>
   $(document).ready(function(){
       $('.EMAIL').hide();
   
   });
   $('.where').on("change", function() {
    $value=   $(this).closest('tr').find('.where').val();
      if($value=='EMAIL'){
     $(this).closest('td').append('<select name="company" id="selectOption" class="company form-control hdn"> \ <option value="Select Your Company">Select Your Company</option>'
         <?php foreach ($admin_company as $key => $value): ?>
            + '<option value="<?php echo $value['company_name']; ?>"><?php echo $value['company_name']; ?></option>'
         <?php endforeach; ?>
        + '</select> \
    </td> \
    <td style="display:none;"> \</td>\
    ');

       }else{
           $(this).closest('tr').find('.hdn').hide();
       }   
   });
   $('.where').on("change", function() {
    $value=   $(this).closest('tr').find('.where').val();
     if($value=='SMS'){
           $(this).closest('tr').append("<input type='text' style='width:100%;' class='mobile' placeholder='Mobile Number'/>");
       }   else{
           $(this).closest('tr').find('.mobile').hide();
       }   
   });
   var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
   var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';
   $(document).on('change', ".company", function(){
   var curEle = jQuery(this);
       var categorieID = curEle.val();
   var parentEle = curEle.closest('tr');
   var prodEle = parentEle.find('select[name^="mail"]');
   
   prodEle.empty();
   prodEle.show();
    var dataString = {
       dataString : $(this).closest('tr').find('.company').val()
   
   };
   dataString[csrfName] = csrfHash;
   
   $.ajax({
       type:"POST",
       dataType:"json",
       url:"<?php echo base_url(); ?>Cweb_setting/admin_user_mail_ids", 
       data: dataString,
   
       success:function (result) {
           console.log(result);
           prodEle.append('<option value=' + JSON.stringify(result[0]['email']) + '>'+ JSON.stringify(result[0]['email']) + '</option>');
         $('.Company_name').val(result[0]['company_id']);

       $.each(result, function (i, value) {
     
   
       prodEle.append('<option value=' + JSON.stringify(value['email_id']) + '>'+ JSON.stringify(value['email_id']) + '</option>');
           });
   
      }
   
   });
   event.preventDefault();
   });
   
   $(document).ready(function(){
   $('.where').change();
   })

   var selectValues = { "On Date": "On Date", "1 Day Before": "1 Day Before" , "3 Days Before": "3 Days Before", "1 Week Before": "1 Week Before"};
   $.each(selectValues, function(key, value) {   
    $('.when')
        .append($("<option></option>")
                   .attr("value", value)
                   .text(value)); 
   });
   var selectValues = { "SMS": "SMS", "EMAIL": "EMAIL" , "STOCKEAI": "STOCKEAI", "CALENDER": "CALENDER"};
   $.each(selectValues, function(key, value) {   
    $('.where')
        .append($("<option></option>")
                   .attr("value", value)
                   .text(value)); 
   });
   function openModalBox(){
   var modal = $('.modal, #mask');
   $('.open-modal').on('click', function() {
   modal.fadeIn(300);
   });
   //$('.close-modal, #mask').on('click', function() {
   //modal.fadeOut(800);
   //});
   }
   openModalBox();
   function toggle(source) {
   checkboxes = document.getElementsByName('checkbox');
   for(var i=0, n=checkboxes.length;i<n;i++) {
   checkboxes[i].checked = source.checked;
   }
   }
</script>
<div class="modal fade" id="expensemodel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"  aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content" style="width: max-content;">
         <div class="modal-header" style="color:white;background-color:#38469f;">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title" id="myModalLabel_exp"><?php echo display('EXPENSE SETTING') ?></h4>
         </div>
         <div class="modal-body">
            <table class="table table-bordered" >
               <thead style="text-align:center;">
                  <tr>
                   
                     <th><?php echo display('DATES') ?></th>
                     <th><?php echo display('TIME') ?></th>
                     <th><?php echo display('SOURCE') ?></th>
                  </tr>
               </thead>
               <tbody>
                   <form id="notificationForm_expense" method="post">
                  <tr>
                                       <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                        <input type="hidden" name="menu[]" value="EXPENSE - NEW EXPENSE - PAYMENT DUE DATE"/>
                     <td><span id="bold"><?php echo display('NEW EXPENSE') ?></span> - <?php echo display('PAYMENT DUE DATE') ?></td>
                     <td>
                        <select class="when_exp" name="select_date[]" style="width: -webkit-fill-available;">
                           <option value="Select Preferred Date"><?php echo display('Select Preferred Date') ?></option>
                        </select>
                     </td>
                     <td style="display: none;"><input type="hidden" name="status[]" value="PaymentDuedate"></td>
                     <td>
                        <select class="where_exp" name="select_source[]" style="width: -webkit-fill-available;">
                           <option value="Select Preferred Source"><?php echo display('Select Preferred Source') ?></option>
                        </select>
                     </td>
                     <td class="EMAIL_exp">
                        <select class="where_exp" name="email[]"  style="width: -webkit-fill-available;">
                           <option value="Select Preferred Email"><?php echo display('Select Preferred Email') ?></option>
                        </select>
                     </td>
                     <td style="display: none;"><input type="hidden" name="company[]" class="ExpenseCompany_name" value=""></td>

                  </tr>
                 <tr>
                       <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                        <input type="hidden" name="menu[]" value="EXPENSE - NEW EXPENSE - ETD"/>
                     <td><span id="bold"><?php echo display('NEW EXPENSE') ?></span> - ETD</td>
                   <td>
                        <select class="when_exp" name="select_date[]" style="width: -webkit-fill-available;">
                           <option value="Select Preferred Date"><?php echo display('Select Preferred Date') ?></option>
                        </select>
                     </td>
                   
                   
                     <td style="display: none;"><input type="hidden" name="status[]" class="ETD" value="NewExpenseETD"></td>
                      <td>
                        <select class="where_exp" name="select_source[]" style="width: -webkit-fill-available;">
                           <option value="Select Preferred Source"><?php echo display('Select Preferred Source') ?></option>
                        </select>
                     </td>
                     <td class="EMAIL">
                        <select class="where" name= "email[]" style="width: -webkit-fill-available;">
                           <option value=""><?php echo display('Select Preferred Email') ?></option>
                        </select>
                     </td>
                     <td style="display: none;"><input type="hidden" name="company[]" class="Company_name" value=""></td>
                   
                  </tr>
                <tr>
                    <input type="hidden" name="menu[]" value="EXPENSE - NEW EXPENSE - ETA"/>
                   
                     <td><span id="bold"><?php echo display('NEW EXPENSE') ?></span> - <?php echo display('ETA') ?></td>
                    <td>
                        <select class="when_exp" name="select_date[]" style="width: -webkit-fill-available;">
                           <option value="Select Preferred Date"><?php echo display('Select Preferred Date') ?></option>
                        </select>
                     </td>
                     <td style="display: none;"><input type="hidden" name="status[]" class="ETA" value="NewExpenseETA"></td>
                     <td>
                        <select class="where_exp" name="select_source[]" style="width: -webkit-fill-available;">
                           <option value="Select Preferred Source"><?php echo display('Select Preferred Source') ?></option>
                        </select>
                     </td>
                     <td class="EMAIL">
                        <select class="where" name= "email[]" style="width: -webkit-fill-available;">
                           <option value=""><?php echo display('Select Preferred Email') ?></option>
                        </select>
                     </td>
                     <td style="display: none;"><input type="hidden" name="company[]" class="Company_name" value=""></td>
                      
                  </tr>
                  <tr>
                    <input type="hidden" name="menu[]" value="EXPENSE - OCEAN IMPORT TRACKING - ETA"/>
                     <td><span id="bold"><?php echo display('OCEAN IMPORT TRACKING') ?></span> - <?php echo display('ETA') ?></td>
                     <td>
                        <select class="when_exp" name="select_date[]" style="width: -webkit-fill-available;">
                           <option value="Select Preferred Date"><?php echo display('Select Preferred Date') ?></option>
                        </select>
                     </td>
                     <td style="display: none;"><input type="hidden" name="status[]" value="oceanimportETA"></td>
                     <td>
                        <select class="where_exp" name="select_source[]" style="width: -webkit-fill-available;">
                           <option value="Select Preferred Source"><?php echo display('Select Preferred Source') ?></option>
                        </select>
                     </td>
                     <td class="EMAIL_exp">
                        <select class="where_exp" name="email[]" style="width: -webkit-fill-available;">
                           <option value="Select Preferred Email"><?php echo display('Select Preferred Email') ?></option>
                        </select>
                     </td>
                     
                     <td style="display: none;"><input type="hidden" name="company[]" class="ExpenseCompany_name" value=""></td>

                  </tr>
                  <tr>
                  <input type="hidden" name="menu[]" value="EXPENSE - OCEAN IMPORT TRACKING - ETD"/>
                     <td><span id="bold"><?php echo display('OCEAN IMPORT TRACKING') ?></span> - <?php echo display('ETD') ?></td>
                     <td>
                        <select class="when_exp" name="select_date[]" style="width: -webkit-fill-available;">
                           <option value="Select Preferred Date"><?php echo display('Select Preferred Date') ?></option>
                        </select>
                     </td>
                     <td style="display: none;"><input type="hidden" name="status[]" value="oceanimportETD"></td>
                     <td>
                        <select class="where_exp" name="select_source[]" style="width: -webkit-fill-available;">
                           <option value="Select Preferred Source"><?php echo display('Select Preferred Source') ?></option>
                        </select>
                     </td>
                     <td class="EMAIL_exp">
                        <select class="where_exp" name="email[]" style="width: -webkit-fill-available;">
                           <option value="Select Preferred Email"><?php echo display('Select Preferred Email') ?></option>
                        </select>
                     </td>
                     <td style="display: none;"><input type="hidden" name="company[]" class="ExpenseCompany_name" value=""></td>

                  </tr>
                 <tr>
                    <input type="hidden" name="menu[]" value="EXPENSE - TRUCKING - CONTAINER PICKUP DATE"/>
                     <td><span id="bold"><?php echo display('TRUCKING') ?></span> - <?php echo display('CONTAINER / GOODS PICKUP DATE') ?></td>
                     <td>
                        <select class="when_exp" name="select_date[]" style="width: -webkit-fill-available;">
                           <option value="Select Preferred Date"><?php echo display('Select Preferred Date') ?></option>
                        </select>
                     </td>
                     <td style="display: none;"><input type="hidden" name="status[]" value="ContainerGoodspickupdate"></td>
                     <td>
                        <select class="where_exp" name="select_source[]" style="width: -webkit-fill-available;">
                           <option value="Select Preferred Source"><?php echo display('Select Preferred Source') ?></option>
                        </select>
                     </td>
                     <td class="EMAIL_exp">
                        <select class="where_exp" name="email[]" style="width: -webkit-fill-available;">
                           <option value="Select Preferred Email"><?php echo display('Select Preferred Email') ?></option>
                        </select>
                     </td>
                     
                      <td style="display: none;"><input type="hidden" name="company[]" class="ExpenseCompany_name" value=""></td>
                    
                  </tr>
                  <tr>
                    <input type="hidden" name="menu[]" value="EXPENSE - TRUCKING - DELIVERY DATE"/>
                     <td><span id="bold"><?php echo display('TRUCKING') ?></span> - <?php echo display('DELIVERY DATE') ?></td>
                     <td>
                        <select class="when_exp" name="select_date[]" style="width: -webkit-fill-available;">
                           <option value="Select Preferred Date"><?php echo display('Select Preferred Date') ?></option>
                        </select>
                     </td>
                     <td style="display: none;"><input type="hidden" name="status[]" value="DELIVERYDATE"></td>
                     <td>
                        <select class="where_exp" name="select_source[]" style="width: -webkit-fill-available;">
                           <option value="Select Preferred Source"><?php echo display('Select Preferred Source') ?></option>
                        </select>
                     </td>
                     <td class="EMAIL_exp">
                        <select class="where_exp" name="email[]" style="width: -webkit-fill-available;">
                           <option value="Select Preferred Email"><?php echo display('Select Preferred Email') ?></option>
                        </select>
                     </td>
                      <td style="display: none;"><input type="hidden" name="company[]" class="ExpenseCompany_name" value=""></td>

                     <td>
                        <button type="submit" class="btn btn-primary" style="background-color:#1c2350;"><?php echo display('Save') ?></button>
                     </td>
                  </tr>
                  <?php echo form_close()?>
               </tbody>
            </table>
         </div>
        <!--  <div class="modal-footer">
           
            <button type="button" class="btn btn-primary" style="background-color:#1c2350;"><?php echo display('Save') ?></button>
            <button type="button" class="btn btn-primary" data-dismiss="modal" style="background-color:#1c2350;"><?php echo display('Close') ?></button>
         </div> -->
      </div>
   </div>
</div>
<script>
   $(document).ready(function(){
       $('.EMAIL_exp').hide();
   
   });
   $('.where_exp').on("change", function() {
    $value=   $(this).closest('tr').find('.where_exp').val();
      if($value=='EMAIL'){
     $(this).closest('td').append(
    '<select name="company1" id="selectOption1" class="company1 form-control hdn">' +
    '<option value="Select Your Company">Select Your Company</option>' +
    '<?php foreach ($admin_company as $value) : ?>' +
    '<option value="<?php echo $value['company_name']; ?>"><?php echo $value['company_name']; ?></option>' +
    '<?php endforeach; ?>' +
    '</select>' +
    '</td>' +
    '<td style="display:none;"> </td>');

       }else{
           $(this).closest('tr').find('.hdn').hide();
       }   
   });
   $('.where_exp').on("change", function() {
    $value=   $(this).closest('tr').find('.where_exp').val();
     if($value=='SMS'){
           $(this).closest('tr').append("<input type='text' style='width:100%;' class='mobile' placeholder='Mobile Number'/>");
       }   else{
           $(this).closest('tr').find('.mobile').hide();
       }   
   });
   var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
   var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';
   $(document).on('change', ".company1", function(){
   var curEle = jQuery(this);
       var categorieID = curEle.val();
   var parentEle = curEle.closest('tr');
   var prodEle = parentEle.find('select[name^="mail1"]');
   
   prodEle.empty();
   prodEle.show();
    var dataString = {
       dataString : $(this).closest('tr').find('.company1').val()
   
   };
   dataString[csrfName] = csrfHash;
   
   $.ajax({
       type:"POST",
       dataType:"json",
       url:"<?php echo base_url(); ?>Cweb_setting/admin_user_mail_ids", 
       data: dataString,
   
       success:function (result) {
           console.log(result);
           prodEle.append('<option value=' + JSON.stringify(result[0]['email']) + '>'+ JSON.stringify(result[0]['email']) + '</option>');
         $('.ExpenseCompany_name').val(result[0]['company_id']);
       $.each(result, function (i, value) {
     
   
       prodEle.append('<option value=' + JSON.stringify(value['email_id']) + '>'+ JSON.stringify(value['email_id']) + '</option>');
           });
   
      }
   
   });
   event.preventDefault();
   });
   
   $(document).ready(function(){
   $('.where_exp').change();
   })
   var selectValues = { "On Date": "On Date", "1 Day Before": "1 Day Before" , "3 Days Before": "3 Days Before", "1 Week Before": "1 Week Before"};
   $.each(selectValues, function(key, value) {   
    $('.when_exp').append($("<option></option>").attr("value", value).text(value)); 
   });
   var selectValues = { "SMS": "SMS", "EMAIL": "EMAIL" , "STOCKEAI": "STOCKEAI", "CALENDER": "CALENDER"};
   $.each(selectValues, function(key, value) {   
    $('.where_exp').append($("<option></option>").attr("value", value).text(value)); 
   });
   
   function toggle_exp(source) {
   checkboxes = document.getElementsByName('checkbox_exp');
   for(var i=0, n=checkboxes.length;i<n;i++) {
   checkboxes[i].checked = source.checked;
   }
   }

   document.querySelectorAll('input[type=color]').forEach(function(picker) {
   
   var targetLabel = document.querySelector('label[for="' + picker.id + '"]'),
   codeArea = document.createElement('span');
   
   codeArea.innerHTML = picker.value;
   targetLabel.appendChild(codeArea);
   
   picker.addEventListener('change', function() {
   codeArea.innerHTML = picker.value;
   targetLabel.appendChild(codeArea);
   });
   });

</script>

<script>
  $('#notificationForm').on('submit', function(event) {
        event.preventDefault(); // Prevent default form submission

      
        var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
        var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';

        // Construct the data object to send
       var dataString = {
      dataString : $("#notificationForm").serialize()
      };
      dataString[csrfName] = csrfHash;

        $.ajax({
            type: 'POST',
            url: '<?php echo base_url(); ?>Cweb_setting/savenotification', // Adjust URL as per your application
             data:$("#notificationForm").serialize(),
            dataType: 'json', // Adjust as per your backend response type
            success: function(response) {
                console.log('Form submitted successfully');
                alert('Form submitted successfully');
                // Optionally, reset form after successful submission
                $('#notificationForm')[0].reset();
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
                alert('Error: ' + error);
            }
        });
    });
  $('#notificationForm_expense').on('submit', function(event) {
        event.preventDefault(); // Prevent default form submission

      
        var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
        var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';

        // Construct the data object to send
       var dataString = {
      dataString : $("#notificationForm_expense").serialize()
      };
      dataString[csrfName] = csrfHash;

        $.ajax({
            type: 'POST',
            url: '<?php echo base_url(); ?>Cweb_setting/savenotification', // Adjust URL as per your application
             data:$("#notificationForm_expense").serialize(),
            dataType: 'json', // Adjust as per your backend response type
            success: function(response) {
                console.log('Form submitted successfully');
                alert('Form submitted successfully');
                // Optionally, reset form after successful submission
                $('#notificationForm_expense')[0].reset();
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
                alert('Error: ' + error);
            }
        });
    });
</script>


<style>
   /*body {*/
   /*padding : 30px;*/
   /*}*/
   code {
   padding: 5px 8px;
   border-radius: 10px;
   background-color: #f8f9f9;
   color: #CC0066;
   }
   [type='color'] {
   -moz-appearance: none;
   -webkit-appearance: none;
   appearance: none;
   padding: 0;
   width: 15px;
   height: 15px;
   border: none;
   }
   [type='color']::-webkit-color-swatch-wrapper {
   padding: 0;
   }
   [type='color']::-webkit-color-swatch {
   border: none;
   }
   .color-picker {
   padding: 10px 15px;
   border-radius: 10px;
   border: 1px solid #ccc;
   background-color: #f8f9f9;
   }
</style>