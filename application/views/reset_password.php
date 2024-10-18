<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="/user-registration-codeigniter/public/css/main.css">
    </head>
    <body>
    <!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <?php
            $flash_message = $this->session->flashdata('flash_message'); 
            if(!empty($flash_message)){
                $html = '<div class="bg-warning container flash-message">';
                $html .= $flash_message; 
                $html .= '</div>';
                echo $html;
                // echo "hiiiiii";

            }
        ?>
    <div class="container">
        <div class="row">
        
<div class="col-lg-4 col-lg-offset-4">
    <h2>Reset your password</h2>
    <h5>Hello <span><?php echo $firstName; ?></span>, Please enter your password  below to reset</h5>     
<?php 
    $fattr = array('class' => 'form-signin');
    echo form_open(site_url().'Admin_dashboard/reset_password/token/'.$token, $fattr); ?>
    <div class="form-group">
      <?php echo form_password(array('name'=>'password', 'id'=> 'password', 'placeholder'=>'Password', 'class'=>'form-control', 'value' => set_value('password'))); ?>
      <?php echo form_error('password') ?>
    </div>
    <div class="form-group">
      <?php echo form_password(array('name'=>'passconf', 'id'=> 'passconf', 'placeholder'=>'Confirm Password', 'class'=>'form-control', 'value'=> set_value('passconf'))); ?>
      <?php echo form_error('passconf') ?>
    </div>
    <?php echo form_submit(array('value'=>'Reset Password', 'class'=>'btn btn-lg btn-primary btn-block')); ?>
    <?php echo form_close(); ?>
   
</div>
    </div><!--row-->   
    </div><!-- /container -->  
    
    </body>
</html>