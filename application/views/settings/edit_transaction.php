






<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" />





<!-- Bank debit credit manage -->
<style>
            input {
    border: none;
    background-color: #eee;
 }
textarea:focus, input:focus{
   
    outline: none;
}
 .text-right {
    text-align: left; 
}

.select2-selection{
    display:none;
}
   
    </style>
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo ('Edit Bank Transaction') ?></h1>
            <small><?php echo display('') ?></small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('bank') ?></a></li>
                <li class="active"  style="color:orange"><?php echo ('Edit Bank Transaction') ?></li>
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









        <!-- New bank -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">


      <div class="panel-heading" style="height: 50px;">
                        <div class="panel-title">

                                                    <a style="float:right;background-color:#38469f;color:white;" href="<?php echo base_url('Csettings/bank_transaction_list') ?>" class="btn  m-b-5 m-r-2"><i class="ti-align-justify"> </i> <?php echo ('Manage Transaction')?> </a>

                        </div>
                    </div>



                   <?php echo form_open_multipart('Csettings/bank_debit_credit_manage_add',array('class' => 'form-vertical','id' => 'validate' ))?>

                    <div class="panel-body">
<input type="hidden" name="dynamic_id" value="<?php echo $edit_transaction_information[0]['rand_id']?>"/>
                    	<div class="form-group row">
                            <label for="date" class="col-sm-3 col-form-label"><?php echo display('date') ?> <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                            <?php date_default_timezone_set("Asia/Dhaka"); $date = date('Y-m-d'); ?>
                                <input type="date" class="form-control datepicker" name="date" id="date" required="" placeholder="<?php echo display('date') ?>" value="<?php echo $edit_transaction_information[0]['VDate']?>" tabindex="1"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="account_type" class="col-sm-3 col-form-label"><?php echo display('account_type') ?> <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <select class="form-control" id="account_type" name="account_type" tabindex="2">

          <?php  if($edit_transaction_information[0]['Debit']=='0.00'){ ?>
                             <option value="Credit(-)"><?php echo display('credit_minus')?></option>
                             <?php }else{ ?>
   <option value="Debit(+)"><?php echo display('debit_plus')?></option>

                                 <?php } ?>
                                    <option value="Debit(+)"><?php echo display('debit_plus')?></option>
                                    <option value="Credit(-)"><?php echo display('credit_minus')?></option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="bank_name" class="col-sm-3 col-form-label"><?php echo display('bank_name') ?> <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <select class="form-control" name="bank_id" tabindex="3">
                                    {bank_list}
                                    <option value="{bank_id}">{bank_name}</option>
                                    {/bank_list}
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="withdraw_deposite_id" class="col-sm-3 col-form-label"><?php echo display('withdraw_deposite_id') ?> <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                            
                                <input type="text" class="form-control" name="withdraw_deposite_id" id="withdraw_deposite_id" required="" placeholder="<?php echo display('withdraw_deposite_id') ?>" value="<?php echo $edit_transaction_information[0]['VNo']?>" tabindex="2"/>

                            
                            
                            </div>
                        </div>        

                        <div class="form-group row">
                            <label for="ammount" class="col-sm-3 col-form-label"><?php echo display('ammount') ?> <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                          <span class='form-control' style='background-color: #eee;'><?php   echo $currency; ?>  
                             <?php  if($edit_transaction_information[0]['Debit']=='0.00'){ ?>
                                <input type="number" name="ammount" id="ammount" required="" value="<?php echo $edit_transaction_information[0]['Credit'] ; ?>" tabindex="5"/>
                             <?php }else{ ?>
 <input type="number" name="ammount" id="ammount" required="" value="<?php echo $edit_transaction_information[0]['Debit']; ?>" tabindex="5"/>

                                    <?php } ?>
           
                            </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-sm-3 col-form-label"><?php echo display('description') ?> </label>
                            <div class="col-sm-6">
                             
                                <input type="text" class="form-control " name="description" id="description" required=""  value="<?php echo $edit_transaction_information[0]['Narration']?>" tabindex="1"/>

                            
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-4 col-form-label"></label>
                            <div class="col-sm-6">
                                <input type="reset" class="btnclr btn m-b-5 m-r-2" value="<?php echo display('reset') ?>" tabindex="6"/>
                                <input type="submit" id="add-deposit" class="btnclr btn m-b-5 m-r-2" name="add-deposit" value="<?php echo display('save') ?>" tabindex="7"/>
                            </div>
                        </div>
                    </div>
                    <?php echo form_close()?>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Bank debit credit manage -->

