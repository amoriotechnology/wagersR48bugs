

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" />
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>






<!-- Add User start -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<style>
    .select2 {
        display:none;
    }


    .btnclr{
       background-color:<?php echo $setting_detail[0]['button_color']; ?>;
       color: white;

   }




    </style>
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo ('Add Admin User') ?></h1>
            <small></small>
            <ol class="breadcrumb">
                <li><a href="index.html"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('web_settings') ?></a></li>
                <li class="active" style="color:orange;"><?php echo ('Add Admin User') ?></li>
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

        <div class="row">
            <div class="col-sm-12">
                <?php if($this->permission1->method('manage_user','read')->access()){?>
                  <a href="<?php echo base_url('User/manage_user')?>" class="btn btn-success m-b-5 m-r-2"><i class="ti-align-justify"> </i><?php echo display('Manage User') ?></a>
                <?php }?>
            </div>
        </div>


        <div class='row'> 
                    
        </div>
        <!-- New user -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
              

                <div class="panel-heading" style="height: 50px;">
                        <div class="panel-title">
                               <a style="float:right;color:white;" href="<?php echo base_url('User/manage_user') ?>" class="btnclr btn  m-b-5 m-r-2"><i class="ti-align-justify"> </i> <?php echo ('Manage User')?> </a>
                        </div>
                    



                        <div class="panel-title">
                        </div>
                    </div>
                   
                    <div class="panel-body">
                    <?php echo form_open_multipart('User/insert_users');?>
                      
                        <div class="form-group">
                            <label><?php echo ('Employee Name') ?><i class="text-danger">*</i></label>
<select name="employee_name" id="employee_name" class="form-control" style="border: 2px solid #D7D4D6; width:30%" tabindex="3">
    <option value=""> <?php echo display('Select Payment Type') ?></option>
    <?php foreach($get_employee_data as $pt) { ?>
        <option value="<?php echo $pt['id'] . ' ' . $pt['first_name'] . ' ' . $pt['last_name']; ?>"><?php echo $pt['first_name'] . ' ' . $pt['last_name']; ?></option>
    <?php } ?>
</select>
                        </div>
                        <!--<div class="form-group">-->
                        <!--    <label><?php echo display('Last Name') ?><i class="text-danger">*</i></label>-->
                        <!--    <input type="" name="lname" class="form-control"  style="width:30%" required>-->
                        <!--</div>-->
                        <div class="form-group">
                            <label><?php echo display('Phone') ?><i class="text-danger">*</i></label>
                            <input type="number" name="email" class="form-control"  style="width:30%" required>
                        </div>
                        <div class="form-group">
                            <label><?php echo display('Email') ?><i class="text-danger">*</i></label>
                            <input type="email" name="phone" class="form-control" style="width:30%" required>
                        </div>
                            <div class="form-group">
                            <label><?php echo display('Gender') ?>
                            </label>
                            <select class="form-control" name="gender" style="width:30%" required>
                                <option value=""><?php echo display('Select Gender')?></option>
                                <option value="male"><?php echo display('Male') ?></option>
                                <option value="female"><?php echo display('FeMale') ?></option>
                            </select>
                        </div>
                          <div class="form-group">
                            <label><?php echo display('DOB') ?><i class="text-danger">*</i></label>
                            <input type="date" name="Date" class="form-control" required style="width: 30%;">
                        </div>
                        <div class="form-group">
                            <label><?php echo display('username') ?><i class="text-danger">*</i></label>
                            <input type="text" name="username" class="form-control" required style="width: 30%;">
                        </div>
                         <div class="form-group">
                            <label><?php echo display('Password') ?><i class="text-danger">*</i></label>
                            <input type="text" name="password" class="form-control" required style="width: 30%;">
                        </div>
                        <div class="form-group">
                            <label></label>
                            <input type="submit"  style="color:white;" name="Save" value="Save" class="btnclr btn">
                        </div>
                   <?php echo form_close(); ?>
                    </div>
                 
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Edit user end -->



