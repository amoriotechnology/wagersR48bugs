<script src="<?php echo base_url() ?>assets/js/financial_year.js" type="text/javascript"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo "Financial Year"; ?></h1>
            <small><?php //echo "Vocher Report"; ?></small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo "Accounts"; ?></a></li>
                <li class="active" style="color:orange"><?php echo "Financial Year"; ?></li>
            </ol>
        </div>
    </section>

    <section class="content">
        <!-- Alert Message -->
        <?php
        $message = $this->session->userdata('message');
        if (isset($message)) {
            ?>
            <div class="alert alert-info alert-dismissable" style="color:white;background-color:#38469f;font-weight:bold;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $message ?>                    
            </div>
            <?php
            $this->session->unset_userdata('message');
        }
        $error_message = $this->session->userdata('error_message');
        if (isset($error_message)) {
            ?>
            <div class="alert alert-danger alert-dismissable" style="color:white;background-color:#38469f;font-weight:bold;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $error_message ?>                    
            </div>
            <?php
            $this->session->unset_userdata('error_message');
        }
        ?>
       
<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4>
                    <a   href="<?php echo base_url('accounts/financial_manager') ?>"  style="float: right;" class="btnclr btn  m-b-5 m-r-2"><i class="ti-align-justify"> </i> <?php echo  ('Manage Financial ') ?> </a>

                    </h4>
                </div>
            </div>
            <div class="panel-body">

                <?php echo form_open_multipart('accounts/financial_year_create') ?>
                <div class="row" id="">
                    <div class="col-sm-6">

                        <div class="form-group row">
                            <label for="date" class="col-sm-4 col-form-label"><?php echo "Title"; ?><i
                                    class="text-danger">*</i></label>
                            <div class="col-sm-8">
                                <input type="text" name="yearname" id="title" value="2022-2023" 
                                    class="form-control" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="date" class="col-sm-4 col-form-label"><?php echo display('from_date') ?><i
                                    class="text-danger">*</i></label>
                            <div class="col-sm-8">
                                <input type="date" name="start_date" id="start_date" onchange="year()"
                                    value="<?php echo date('Y-m-d')?>" placeholder="<?php echo display('from_date') ?>"
                                    class="fin_datepicker form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date" class="col-sm-4 col-form-label"><?php echo display('to_date') ?><i
                                    class="text-danger">*</i></label>
                            <div class="col-sm-8">
                                <input type="date" name="end_date" onchange="year()" id="end_date"
                                    value="<?php echo date('Y-m-d')?>" placeholder="<?php echo display('to_date') ?>"
                                    class="fin_datepicker form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="status" class="col-sm-4 col-form-label"><?php echo display('status') ?> <i
                                    class="text-danger">*</i></label>
                            <div class="col-sm-8">
                                <label class="radio-inline my-2">
                                    <input type="radio" name="status" value="2" checked="checked" id="status">
                                    <?php echo display('active') ?>
                                </label>
                                <label class="radio-inline my-2">
                                    <input type="radio" name="status" value="0" id="status">
                                    <?php echo display('inactive') ?>
                                </label>
                            </div>
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" id="submit"
                                class="btn btnclr" ><?php echo display('save') ?></button>
                          </div>
                    </div>
                </div>
                <input type="hidden" value="" id="finid">
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
</div>
  <div class="row">
                <!--  table area -->
     
            </div>
            <?php //endif; ?>
            </div>
            </div>
        </div>
    </div>
</div>
</section>
</div>
<style>

.btnclr{
       background-color:<?php echo $setting_detail[0]['button_color']; ?>;
       color: white;

   }
</style>




