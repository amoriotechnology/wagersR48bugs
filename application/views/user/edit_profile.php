<!-- Edit Profile Page Start -->
<?php  error_reporting(1);?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header" style="height: 70px;">
        <div class="header-icon"><i class="pe-7s-user-female"></i></div>
        <div class="header-title">
            <h1><?php echo display('Update your Profile') ?></h1>
         
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i><?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('profile') ?></a></li>
                <li class="active" style="color:orange;"><?php echo display('update_profile') ?></li>
            </ol>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-sm-12 col-md-4">
            </div>
            <div class="col-sm-12 col-md-4" >

            <!-- Alert Message -->
            <?php
                $message = $this->session->userdata('message');
                if (isset($message)) {
            ?>
            <div class="alert alert-info alert-dismissable" style="color:white;background-color:#38469f;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $message ?>                    
            </div>
            <?php 
                $this->session->unset_userdata('message');
                }
                $error_message = $this->session->userdata('error_message');
                if (isset($error_message)) {
            ?>
            <div class="alert alert-danger alert-dismissable" style="color:white;background-color:#38469f;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $error_message ?>                    
            </div>
            <?php 
                $this->session->unset_userdata('error_message');
                }
            ?>
            
            <script>
    $('.alert').delay(1000).fadeOut('slow');
    </script>
            <?php echo form_open_multipart('Admin_dashboard/update_profile', array('id' => 'insert_product'))?>
                <div class="card">
                   
                    <div class="card-content">
                        <div class="card-content-member">
                              <div >
                                 <!-- <?php //echo "<img src='".base_url()."{logo}' width=100px; height=100px; class=img-circle>";?> -->
                     
                              <?php  if(  $edit_data[0]['create_by'] == 2){?>

     <?php echo "<img src='".base_url().  $edit_data[0]['logo'] ."' width=100px; height=100px; class=img-circle>";?>

 <?php }else{?> 
 <?php echo "<img src='".base_url().  $edit_data[0]['logo'] ."' width=100px; height=100px; class=img-circle>";?>
<?php } ?>









                                </div>
                              <br>
                            <h4 class="m-t-0">{first_name} {last_name}</h4>
                        </div>
                        <div class="card-content-languages">
                            <div class="card-content-languages-group">
                                <div>
                                    <h4 style="width:100px;"><?php echo display('first_name') ?>:</h4>
                                </div>
                                <div>
                                    <ul>
                                        <input type="text" placeholder="<?php echo display('first_name') ?>" class="form-control" id="first_name" name="first_name" value="{first_name}" required />
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content-languages-group">
                                <div>
                                    <h4 style="width:100px;"><?php echo display('last_name') ?>:</h4>
                                </div>
                                <div>
                                    <ul>
                                        <li><input type="text" placeholder="<?php echo display('last_name') ?>" class="form-control" id="last_name" name="last_name" value="{last_name}" required  /></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content-languages-group">
                                <div>
                                    <h4 style="width:100px;"><?php echo display('Gender') ?>:</h4>
                                </div>
                                <div>
                                    <ul>
                                        <li><input type="text"  class="form-control" id="gender" name="gender" value="{gender}" required /></li>
                                    </ul>
                                </div>
                            </div>
                               <div class="card-content-languages-group">
                                <div>
                                    <h4 style="width:100px;"><?php echo display('Date Of Birth') ?>:</h4>
                                </div>
                                <div>
                                    <ul>
                                        <li><input type="date"  class="form-control" id="dob" name="dob" value="{date_of_birth}" required /></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content-languages-group">
                                <div>
                                    <h4 style="width:100px;"><?php echo display('image') ?>:</h4>
                                </div>
                                <div>
                                    <ul>
                                        <li><input type="file" id="logo" name="logo" value="<?php echo  $edit_data[0]['logo'] ?>" /></li>
                                        <input type="hidden" name="old_logo" value="<?php echo  $edit_data[0]['logo'] ?>" />
                                    </ul>
                                </div>
                               </div>

                              <div class="card-content text-center">
                                <br/>
                              
                          <button type="submit" class="btn btn-success" style="float:left;color:white;background-color:#38469f;"><?php echo display('update_profile') ?></button>
                          <br/>  <br/>
                        </div>
                        </div>
                     
                    </div>
                  
                </div>
                <?php echo form_close()?>
            </div>
        </div> 
    </section> <!-- /.content -->
</div> <!-- /.content-wrapper -->
<!-- Edit Profile Page End -->