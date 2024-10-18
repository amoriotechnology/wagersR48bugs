<!-- Change Password Page Start -->
<div class="content-wrapper">
    <section class="content-header" style="height:70px;">
        <div class="header-icon" style="width:100px;"><i class="fas fa-user-shield"></i></div>
        <div class="header-title">
            <h1><?php echo display('change_password') ?></h1>
            
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i><?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('profile') ?></a></li>
                <li class="active"><?php echo display('change_your_information') ?></li>
            </ol>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-sm-12 col-md-4">
            </div>
            <div class="col-sm-12 col-md-4 ">
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

                <!-- Login widget --> 
                <div class="login-widget">
                    <div class="panel panel-bd">
                        <div class="panel-heading">
                        </div>
                         <?php echo form_open_multipart('Admin_dashboard/change_password',array('id' => 'insert_product','class' => 'form-horizontal'))?>
                            <div class="panel-body">
                                <h4 class="text-center"><?php echo display('old_information') ?></h4>
                                <label for="login-email"><?php echo display('Username') ?></label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input type="text" placeholder="<?php echo display('Username') ?>" class="form-control" id="email" name="email" value="" required/>  
                                </div>
                                <label for="login-email"><?php echo display('old_password') ?></label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input type="password" placeholder="<?php echo display('old_password') ?>" class="form-control" id="old_password" name="old_password" value="" required/>
                                </div>
                                <h4 class="text-center"><?php echo display('new_information') ?></h4>
                                <label for="login-email"><?php echo display('new_password') ?></label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input type="password" placeholder="<?php echo display('new_password') ?>" class="form-control" id="password" name="password" value="" required/>
                                </div>
                                <label for="login-email"><?php echo display('re_type_password') ?></label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input type="password" placeholder="<?php echo display('re_type_password') ?>" class="form-control" id="repassword" name="repassword" value="" required/>
                                </div>
                            </div>
                            <div class="panel-footer text-center">
                                <div class="login-btn">
                                    <button type="submit"  style="background-color:#38469f;color:white;font-weight:bold;"  class="btn btn-success btn-block m-b-10"><i class="fa fa-play-circle"></i> <?php echo display('change_password') ?></button>
                                </div>             
                            </div>
                        <?php echo form_close()?>
                    </div>
                </div>
            </div>
        </div> 
    </section> <!-- /.content -->
</div> <!-- /.content-wrapper -->
<!-- Change Password Page End -->