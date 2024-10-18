<script src='https://www.google.com/recaptcha/api.js'></script>
<?php    error_reporting(1);?>

<!DOCTYPE html>
<html lang="zxx">
  <head>
  <!-- Basic Page Needs
  ================================================== -->
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Mobile Specific Metas
  ================================================== -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- For Search Engine Meta Data  -->
  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <meta name="author" content="yoursite.com" />
  
  <title>Admin Login Area</title>

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/icon" href="images/favicon-16x16.png"/>
   
  <!-- Main structure css file -->
  <link  rel="stylesheet" href="<?php echo base_url(); ?>/assets/login/css/login2-style.css">
  
  </head>
  
  <body>
    <!-- Start Preloader -->
    <div id="preload-block">
      <div class="square-block"></div>
    </div>
    <!-- Preloader End -->
    
    <div class="container-fluid">
      <div class="row">
        <div class="col-xs-12 col-sm-7 col-md-5 col-lg-4 authfy-panel-left">
          <!-- brand-logo start -->
          <div class="brand-logo text-center">
            <img src="../assets/login/images/logo.png" width="150" alt="brand-logo">
          </div><!-- ./brand-logo -->
          <!-- authfy-login start -->
          <div class="authfy-login">
            <!-- panel-login start -->
            <div class="authfy-panel panel-login text-center active">
              <div class="authfy-heading">
                <h3 class="auth-title">Login to your account</h3>
                <p><?php echo display('please_enter_your_login_information') ?></p>
              </div>
              <!-- social login buttons start -->
              <!-- <div class="row social-buttons">
                <div class="col-xs-4 col-sm-4">
                  <a href="#" class="btn btn-lg btn-block btn-facebook">
                    <i class="fa fa-facebook"></i>
                  </a>
                </div>
                <div class="col-xs-4 col-sm-4">
                  <a href="#" class="btn btn-lg btn-block btn-twitter">
                    <i class="fa fa-twitter"></i>
                  </a>
                </div>
                <div class="col-xs-4 col-sm-4">
                  <a href="#" class="btn btn-lg btn-block btn-google">
                    <i class="fa fa-google-plus"></i>
                  </a>
                </div>
              </div> -->
              <!-- ./social-buttons -->
              <div class="row loginOr">
                <div class="col-xs-12 col-sm-12">
                  <span class="spanOr"><i class="fa fa-truck" aria-hidden="true"></i></span>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12 col-sm-12">
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
                  $CI = & get_instance();
                  $CI->load->model('Web_settings');
                  $setting_detail = $CI->Web_settings->retrieve_setting_editdata();
                  ?>

                  <?php echo form_open('Admin_dashboard/userauth', array('id' => 'login',)) ?>
                    <div class="form-group">
                      <input type="text" value="" name="username" id="username" class="form-control email" placeholder="Email address">
                      <!-- <input type="email" class="form-control email" name="username" placeholder="Email address"> -->
                    </div>
                    <div class="form-group">
                      <div class="pwdMask">
                        <input type="password"  placeholder="<?php echo display('password') ?>" required="" value="" name="password" id="password" class="form-control password">

                      <!-- <input type="password" class="form-control password" name="password" placeholder="Password"> -->
                      <span class="fa fa-eye-slash pwd-toggle"></span>
                      </div>
                    </div>
                    <div class="row remember-row">
                      <!-- <div class="col-xs-6 col-sm-6">
                        <label class="checkbox text-left">
                          <input type="checkbox" value="remember-me"><span class="label-text">Remember me</span>
                        </label>
                      </div> -->
                      <div class="col-xs-12 col-sm-12">
                        <p class="forgotPwd">
                          <a class="lnk-toggler" data-panel=".panel-forgot" href="#">Forgot password?</a>
                        </p>
                      </div>
                    </div> <!-- ./remember-row -->
                    <?php if ($setting_detail[0]['captcha'] == 0 && $setting_detail[0]['site_key'] != null && $setting_detail[0]['secret_key'] != null) { ?>
                        <div class="g-recaptcha" data-sitekey="<?php
                        if (isset($setting_detail[0]['site_key'])) {
                            echo $setting_detail[0]['site_key'];
                        }
                        ?>">
                        </div>
                    <?php } ?>
                    <div class="form-group">
                      <button class="btn btn-lg btn-primary btn-block" type="submit"><i class="fa fa-sign-in"></i> Login</button>
                    </div>
                  <?php echo form_close() ?>
                </div>
              </div>
            </div> <!-- ./panel-login -->
          
            <!-- panel-forget start -->
            <div class="authfy-panel panel-forgot">
              <div class="row">
                <div class="col-xs-12 col-sm-12">
                  <div class="authfy-heading">
                    <h3 class="auth-title">Recover your password</h3>
                    <p>Please enter your registered email  address and we'll send you a link  to reset your password.</p>
                  </div>
                  <!-- <form name="forgetForm" class="forgetForm" action="#" method="POST"> -->
                    <?php $fattr = array('class' => 'forgetForm');echo form_open(base_url().'Admin_dashboard/forgot/', $fattr); ?>
                    <div class="form-group">
                      <?php echo form_input(array('name'=>'email', 'id'=> 'email', 'placeholder'=>'Email address', 'class'=>'form-control', 'value'=> set_value('email'))); ?>

                      <?php echo form_error('email') ?>
                      <!-- <input type="email" class="form-control" name="username" placeholder="Email address"> -->
                    </div>
                    <div class="form-group">
                      <button class="btn btn-lg btn-primary btn-block" type="submit">Recover your password</button>
                    </div>
                    <div class="form-group">
                      <a class="lnk-toggler" data-panel=".panel-login" href="#">Already have an account?</a>
                    </div>
                   
                  <?php echo form_close(); ?>   
                </div>
              </div>
            </div> <!-- ./panel-forgot -->
            <!-- <div class="authfy-panel panel-success">
              <div class="row">
                <div class="col-xs-12 col-sm-12">
                  <div class="authfy-heading">
                    <h3 class="auth-title">Link was sent</h3>
                    <p>Please, check your inbox for a password reset link.</p>
                  </div>
                </div>
              </div>
            </div>  -->
            <!-- ./panel-forgot -->
          </div> <!-- ./authfy-login -->
        </div> <!-- ./authfy-panel-left -->
        <div class="col-md-7 col-lg-8 authfy-panel-right hidden-xs hidden-sm">
          <div class="hero-heading">
            <div class="headline">
              <h2 style="color: #000; font-style: italic;">Welcome to Stockeai</h2>
              <p style="color: #000; font-weight: bold;">Coded to Perfection</p>
            </div>
            <video class="video" loop="loop" autoplay="" muted="">
                <source src="<?php echo base_url(); ?>assets/login/images/video.mp4" type="video/mp4" /> 
            </video>
          </div>
          
        </div>
      </div> <!-- ./row -->
    </div> <!-- ./container -->
    
    <!-- Javascript Files -->

    <style type="text/css">
        
/* VIDEO */
.video {
  position: absolute;
  top: 40%;
  left: 50%;
  z-index: 0;
  width: 100%;
  transform: translate(-50%, -50%);
  opacity: 0.3;
  /*display: flex;
  justify-content: center;*/

}

.btn-primary{
    background-color: #38469F !important;
    border-color: #38469F !important;
}
.fa{

    color: #38469F !important;
}

.fa-sign-in{
    color: #fff !important;
}

    </style>

    <!-- initialize jQuery Library -->
    <script src="<?php echo base_url(); ?>assets/login/js/jquery-2.2.4.min.js"></script>
  
    <!-- for Bootstrap js -->
    <script src="<?php echo base_url(); ?>assets/login/js/bootstrap.min.js"></script>
  
    <!-- Custom js-->
    <script src="<?php echo base_url(); ?>assets/login/js/custom.js"></script>
  
  </body> 
</html>



