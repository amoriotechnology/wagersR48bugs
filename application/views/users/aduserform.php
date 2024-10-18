<!-- Add User start -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1>Add  User</h1>
            <small>Add New  User</small>
            <ol class="breadcrumb">
                <li><a href="index.html"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('web_settings') ?></a></li>
                <li class="active">Add User</li>
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

        <div class="row">
            <div class="col-sm-12">
                <?php if($this->permission1->method('manage_user','read')->access()){?>
                  <a href="<?php echo base_url('User/manage_users')?>" class="btn btn-success m-b-5 m-r-2"><i class="ti-align-justify"> </i>Manage Company</a>
                <?php }?>
            </div>
        </div>


        <div class='row'> 
                    
        </div>
        <!-- New user -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
              
                    <hr>

                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4>Admin Info</h4>
                        </div>
                    </div>
                    
                    <div class="panel-body">
                    <?php echo form_open_multipart('User/insert_users');?>
                        
                        <div class="form-group">
                            <label>first name</label>
                            <input type="" name="fname" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>last name</label>
                            <input type="" name="lname" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="number" name="phone" class="form-control" required>
                        </div>
                            <div class="form-group">
                            <label>Gender</label>
                            <select class="form-control" name="gender" >
                                <option>Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">FeMale</option>
                            </select>
                        </div>
                          <div class="form-group">
                            <label>Dob</label>
                            <input type="date" name="Date" class="form-control" required style="width: 30%;">
                        </div>
                        <div class="form-group">
                            <label></label>
                            <input type="submit"  name="Save" value="Save" class="btn btn-success">
                        </div>
                   <?php echo form_close(); ?>
                    </div>
                 
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Edit user end -->



