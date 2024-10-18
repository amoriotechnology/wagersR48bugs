


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" />









<!-- Add new customer start -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('Invoice Setting') ?>
</h1>
            <small></small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('web_settings') ?></a></li>
                <li class="active" style="color:orange;" ><?php echo ('update setting') ?></li>
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



        <!-- New customer -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4><?php echo display('Update Sales & Quote') ?> </h4>
                        </div>
                    </div>
                    <?php echo form_open_multipart('Cweb_setting/web_Invoice',array('class' => 'form-vertical', 'id' => 'form1','name' => 'form1'))?>
                 
                  
                                        <div class="panel-body">

                         <input name ="form_type" type="hidden" value="sales&Profarma">
                         
                         

                        <div class="form-group row">
                            <label for="logo" class="col-sm-3 col-form-label"><?php echo display('Account details/Additional Information') ?><i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                               <textarea required class="form-control" rows="4" cols="50" name ="acc" id="acc" type="text" tabindex="2"></textarea>

                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="invoice_logo" class="col-sm-3 col-form-label"><?php echo display('Remarks/Conditions') ?><i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <textarea required class="form-control" rows="4" cols="50" name ="remarks" id="remarks" type="text" tabindex="2"></textarea>
                            </div>
                        </div>


                    


                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-4 col-form-label"></label>
                            <div class="col-sm-6">
                                <input type="hidden" name="form_type" value="sales&Profarma">
                                <input type="hidden" name="uid" value="<?php echo $_SESSION['user_id']; ?>">
                                <input type="submit"  id="add-customer" class="btnclr btn m-b-5 m-r-2"   style="color:white;background-color: #337ab7;border-color: #2e6da4;" name="add-customer" value="<?php echo display('save_changes') ?>" tabindex="13"/>
                                 <input type="hidden" name="uid" value="<?php echo $_SESSION['user_id']; ?>">
                                 <?php echo form_close()?>
                            </div>
                            <div id="Update_Alert"></div>
                        </div>
                    </div>
                      
                </div>
            </div>
        </div>


        


        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4><?php echo display('Update Ocean Export Tracking Invoice') ?> </h4>
                        </div>
                    </div>
                    <?php echo form_open_multipart('Cweb_setting/web_Invoice',array('class' => 'form-vertical', 'id' => 'form3','name' => 'form3'))?>
                 
                <div class="panel-body">

                         <input name ="form_type" type="hidden" value="oet">

                         

                       <div class="form-group row">
                            <label for="invoice_logo" class="col-sm-3 col-form-label"><?php echo display('Remarks/Conditions') ?><i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <textarea class="form-control" rows="4" required cols="50" name ="remarks" required id="remarks" type="text" tabindex="2"></textarea>
                            </div>
                        </div>

             


                    


                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-4 col-form-label"></label>
                            <div class="col-sm-6">
                                <input type="submit"  id="add-customer" class="btnclr btn m-b-5 m-r-2" name="add-customer"  style="color:white;background-color: #337ab7;border-color: #2e6da4;"  value="<?php echo display('save_changes') ?>" tabindex="13"/>
                                 <input type="hidden" name="uid" value="<?php echo $_SESSION['user_id']; ?>">
                                 <?php echo form_close()?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>



           <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4><?php echo display('Update Road Transport Invoice') ?> </h4>
                        </div>
                    </div>
                    <?php echo form_open_multipart('Cweb_setting/web_Invoice',array('class' => 'form-vertical', 'id' => 'form4','name' => 'form4'))?>
                        <div class="panel-body">

                         <input name ="form_type" type="hidden" value="truck">

                         

                       

                        

                         <div class="form-group row">
                            <label for="invoice_logo" class="col-sm-3 col-form-label"><?php echo display('Remarks/Conditions') ?><i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <textarea class="form-control" required rows="4" cols="50" name ="remarks" id="remarks" type="text" tabindex="2"></textarea>
                            </div>
                        </div>


                    


                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-4 col-form-label"></label>
                            <div class="col-sm-6">
                                <input type="submit"  id="add-customer" class="btnclr btn m-b-5 m-r-2" name="add-customer"   style="color:white;background-color: #337ab7;border-color: #2e6da4;" value="<?php echo display('save_changes') ?>" tabindex="13"/>
                                 <input type="hidden" name="uid" value="<?php echo $_SESSION['user_id']; ?>">
                                 <?php echo form_close()?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>



    </section>
</div>



