<?php
   $CI = & get_instance();
   $CI->load->model('Web_settings');
   $Web_settings = $CI->Web_settings->retrieve_setting_editdata();
   ?>
<style>
   input {
   border: none;
   }
   textarea:focus, input:focus{
   outline: none;
   }
   .text-right {
   text-align: left; 
   }
   th{
   font-size:10px;
   }
   #content {
   padding: 30px;
   }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header" style="height:80px;">
      <div class="header-icon">
         <i class="pe-7s-note2"></i>
      </div>
      <div class="header-title">
         <h1><?php echo ('Employee Info') ?></h1>
         <small></small>
         <ol class="breadcrumb">
            <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
            <li><a href="#"><?php echo display('hrm') ?></a></li>
            <li class="active" style="color:orange;"><?php echo ('Employee Info') ?></li>
         </ol>
      </div>
   </section>
   <!-- Main content -->
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
      <div id="head"></div>
      <div class="container" id="content" >
         <?php
            if($template==3)
                    {
                    ?>
         <div class="brand-section"  style="background-color:<?php echo $color; ?>">
            <div class="row" >
               <div class="col-sm-4 text-center" style="color:white;">
                  <h3><?php echo "Employee Info"; ?></h3>
               </div>
               <div class="col-sm-5"><img src="<?php echo  base_url().$logo; ?>"   style='width: 50%;'  /></div>
               <div class="col-sm-3" style="color:white;font-weight:bold;" id='company_info'>
                  <b><?php echo display('Company name') ?> : </b><?php echo $business_name; ?><br>
                  <b>  <?php echo display('Address ') ?>: </b><?php echo $address; ?><br>
                  <b> <?php echo display('Email ') ?>: </b><?php echo $email; ?><br>
                  <b>  <?php echo display('Contact ') ?>: </b><?php echo $phone; ?><br>
               </div>
            </div>
         </div>
         <div class="body-section">
            <div class="row">
               <div class="col-6">
                  <table id="one" >
                     <tr>
                        <td  class="key"><?php echo display('first_name') ?></td>
                        <td style="width:10px;">:</td>
                        <td calss="value"><?php  echo $first_name; ?></td>
                     </tr>
                     <tr>
                        <td  class="key"><?php echo display('last_name') ?></td>
                        <td style="width:10px;">:</td>
                        <td calss="value"><?php echo $last_name ;?></td>
                     </tr>
                     <tr>
                        <td class="key"><?php echo display('Designation') ?></td>
                        <td style="width:10px;">:</td>
                        <td calss="value"><?php  echo $designation;?></td>
                     </tr>
                     <tr>
                        <td  class="key"><?php echo display('Payment Type') ?></td>
                        <td style="width:10px;">:</td>
                        <td calss="value"><?php  echo  $rate_type ; ?></td>
                     </tr>
                     <tr>
                        <td  class="key"><?php echo display('phone') ?></td>
                        <td style="width:10px;">:</td>
                        <td calss="value"><?php echo $phone; ?></td>
                     </tr>
                     <tr>
                        <td  class="key"><?php echo ('Per hour cost') ?></td>
                        <td style="width:7px;">:</td>
                        <td calss="value" style="white-space: pre-wrap;"><?php echo $hrate; ?> </td>
                     </tr>
                     <tr>
                        <td  class="key"><?php echo display('zip') ?></td>
                        <td style="width:7px;">:</td>
                        <td calss="value" style="white-space: pre-wrap;"> <?php  echo $zip; ?></td>
                     </tr>
                     <tr>
                        <td  class="key"><?php echo display('email') ?></td>
                        <td style="width:7px;">:</td>
                        <td calss="value" style="white-space: pre-wrap;"><?php  echo $email; ?> </td>
                     </tr>
                     <tr>
                        <td  class="key">Attachments</td>
                        <td style="width:10px;">:</td>
                        <td calss="value"><a style="color: #000 !important" href="<?php  echo base_url(); ?>uploads/<?php echo $files; ?>" data-toggle="tooltip" data-placement="right" title="Employee Image" target=_blank><?php echo $files; ?></a></td>
                     </tr>
                  </table>
               </div>
               <div class="col-6">
                  <table id="two">
                     <tr>
                        <td  class="key"><?php echo display('blood_group') ?></td>
                        <td style="width:10px;">:</td>
                        <td calss="value"><?php  echo $blood_group ; ?></td>
                     </tr>
                     <tr>
                        <td  class="key"><?php echo ('Social Security Number') ?></td>
                        <td style="width:10px;">:</td>
                        <td calss="value"><?php  echo $social_security_number; ?></td>
                     </tr>
                     <tr>
                        <td  class="key"><?php echo ('Routing number') ?></td>
                        <td style="width:10px;">:</td>
                        <td calss="value"><?php  echo $routing_number ?></td>
                     </tr>
                     <tr>
                        <td  class="key"><?php echo display('address_line_1') ?></td>
                        <td style="width:10px;">:</td>
                        <td calss="value"><?php  echo $address_line_1; ?></td>
                     </tr>
                     <tr>
                        <td  class="key"><?php echo display('address_line_2') ?></td>
                        <td style="width:10px;">:</td>
                        <td calss="value"><?php  echo $address_line_2; ?></td>
                     </tr>
                     <tr>
                        <td  class="key"><?php echo display('country') ?></td>
                        <td style="width:7px;">:</td>
                        <td calss="value" style="white-space: pre-wrap;"> <?php  echo $country; ?></td>
                     </tr>
                     <tr>
                        <td  class="key"><?php echo display('city') ?></td>
                        <td style="width:10px;">:</td>
                        <td calss="value"><?php  echo $city; ?></td>
                     </tr>
                  </table>
               </div>
            </div>
            <br>
         </div>
         <?php 
            }
            
            
            
            
            
            
            
            
            elseif($template==1)// this is 1  ,changed to 0 for testing purpose
            {
            ?>  
         <div class="brand-section"  style="background-color:<?php echo $color; ?>">
            <div class="row" >
               <div class="col-sm-3" style="color:white;font-weight:bold;" id='company_info'>
                  <b><?php echo display('Company name') ?> : </b><?php echo $business_name; ?><br>
                  <b>  <?php echo display('Address ') ?>: </b><?php echo $address; ?><br>
                  <b> <?php echo display('Email ') ?>: </b><?php echo $email; ?><br>
                  <b>  <?php echo display('Contact ') ?>: </b><?php echo $phone; ?><br>
               </div>
               <div class="col-sm-3 text-center" style="color:white;     text-align: end;">
                  <h3><?php echo "Employee Info"; ?></h3>
               </div>
               <div class="col-sm-5"><img src="<?php echo  base_url().$logo; ?>"   style='width: 50%;'  /></div>
            </div>
         </div>
         <div class="body-section">
            <div class="row">
               <div class="col-6">
                  <table id="one" >
                     <tr>
                        <td  class="key"><?php echo display('first_name') ?></td>
                        <td style="width:10px;">:</td>
                        <td calss="value"><?php  echo $first_name; ?></td>
                     </tr>
                     <tr>
                        <td  class="key"><?php echo display('last_name') ?></td>
                        <td style="width:10px;">:</td>
                        <td calss="value"><?php echo $last_name ;?></td>
                     </tr>
                     <tr>
                        <td class="key"><?php echo display('Designation') ?></td>
                        <td style="width:10px;">:</td>
                        <td calss="value"><?php  echo $designation;?></td>
                     </tr>
                     <tr>
                        <td  class="key"><?php echo display('Payment Type') ?></td>
                        <td style="width:10px;">:</td>
                        <td calss="value"><?php  echo  $rate_type ; ?></td>
                     </tr>
                     <tr>
                        <td  class="key"><?php echo display('phone') ?></td>
                        <td style="width:10px;">:</td>
                        <td calss="value"><?php echo $phone; ?></td>
                     </tr>
                     <tr>
                        <td  class="key"><?php echo ('Per hour cost') ?></td>
                        <td style="width:7px;">:</td>
                        <td calss="value" style="white-space: pre-wrap;"><?php echo $hrate; ?> </td>
                     </tr>
                     <tr>
                        <td  class="key"><?php echo display('zip') ?></td>
                        <td style="width:7px;">:</td>
                        <td calss="value" style="white-space: pre-wrap;"> <?php  echo $zip; ?></td>
                     </tr>
                     <tr>
                        <td  class="key"><?php echo display('email') ?></td>
                        <td style="width:7px;">:</td>
                        <td calss="value" style="white-space: pre-wrap;"><?php  echo $email; ?> </td>
                     </tr>
                     <tr>
                        <td  class="key">Attachments</td>
                        <td style="width:10px;">:</td>
                        <td calss="value"><a style="color: #000 !important" href="<?php  echo base_url(); ?>uploads/<?php echo $files; ?>" data-toggle="tooltip" data-placement="right" title="Employee Image" target=_blank><?php echo $files; ?></a></td>
                     </tr>
                  </table>
               </div>
               <div class="col-6">
                  <table id="two">
                     <tr>
                        <td  class="key"><?php echo display('blood_group') ?></td>
                        <td style="width:10px;">:</td>
                        <td calss="value"><?php  echo $blood_group ; ?></td>
                     </tr>
                     <tr>
                        <td  class="key"><?php echo ('Social Security Number') ?></td>
                        <td style="width:10px;">:</td>
                        <td calss="value"><?php  echo $social_security_number; ?></td>
                     </tr>
                     <tr>
                        <td  class="key"><?php echo ('Routing number') ?></td>
                        <td style="width:10px;">:</td>
                        <td calss="value"><?php  echo $routing_number ?></td>
                     </tr>
                     <tr>
                        <td  class="key"><?php echo display('address_line_1') ?></td>
                        <td style="width:10px;">:</td>
                        <td calss="value"><?php  echo $address_line_1; ?></td>
                     </tr>
                     <tr>
                        <td  class="key"><?php echo display('address_line_2') ?></td>
                        <td style="width:10px;">:</td>
                        <td calss="value"><?php  echo $address_line_2; ?></td>
                     </tr>
                     <tr>
                        <td  class="key"><?php echo display('country') ?></td>
                        <td style="width:7px;">:</td>
                        <td calss="value" style="white-space: pre-wrap;"> <?php  echo $country; ?></td>
                     </tr>
                     <tr>
                        <td  class="key"><?php echo display('city') ?></td>
                        <td style="width:10px;">:</td>
                        <td calss="value"><?php  echo $city; ?></td>
                     </tr>
                  </table>
               </div>
            </div>
            <br>
         </div>
         <?php 
            }
            elseif($template==2)
            {
            ?>
         <div class="brand-section" style="background-color:<?php echo $color; ?>">
            <div class="row" >
               <div class="col-sm-3"><img src="<?php echo  base_url().$logo; ?>"   style='width: 70%;'  /></div>
               <div class="col-sm-3 text-center" style="color:white;     text-align: end;">
                  <h3><?php echo "Employee Info"; ?></h3>
               </div>
               <div class="col-sm-6" style="color:white;font-weight:bold ;text-align: end;" id='company_info'>          
                  <b><?php echo display('Company name') ?> : </b><?php echo $business_name; ?><br>
                  <b>  <?php echo display('Address ') ?>: </b><?php echo $address; ?><br>
                  <b> <?php echo display('Email ') ?>: </b><?php echo $email; ?><br>
                  <b>  <?php echo display('Contact ') ?>: </b><?php echo $phone; ?><br>
               </div>
            </div>
         </div>
         <div class="body-section">
            <div class="row">
               <div class="col-6">
                  <table id="one" >
                     <tr>
                        <td  class="key"><?php echo display('first_name') ?></td>
                        <td style="width:10px;">:</td>
                        <td calss="value"><?php  echo $first_name; ?></td>
                     </tr>
                     <tr>
                        <td  class="key"><?php echo display('last_name') ?></td>
                        <td style="width:10px;">:</td>
                        <td calss="value"><?php echo $last_name ;?></td>
                     </tr>
                     <tr>
                        <td class="key"><?php echo display('Designation') ?></td>
                        <td style="width:10px;">:</td>
                        <td calss="value"><?php  echo $designation;?></td>
                     </tr>
                     <tr>
                        <td  class="key"><?php echo display('Payment Type') ?></td>
                        <td style="width:10px;">:</td>
                        <td calss="value"><?php  echo  $rate_type ; ?></td>
                     </tr>
                     <tr>
                        <td  class="key"><?php echo display('phone') ?></td>
                        <td style="width:10px;">:</td>
                        <td calss="value"><?php echo $phone; ?></td>
                     </tr>
                     <tr>
                        <td  class="key"><?php echo ('Per hour cost') ?></td>
                        <td style="width:7px;">:</td>
                        <td calss="value" style="white-space: pre-wrap;"><?php echo $hrate; ?> </td>
                     </tr>
                     <tr>
                        <td  class="key"><?php echo display('zip') ?></td>
                        <td style="width:7px;">:</td>
                        <td calss="value" style="white-space: pre-wrap;"> <?php  echo $zip; ?></td>
                     </tr>
                     <tr>
                        <td  class="key"><?php echo display('email') ?></td>
                        <td style="width:7px;">:</td>
                        <td calss="value" style="white-space: pre-wrap;"><?php  echo $email; ?> </td>
                     </tr>
                     <tr>
                        <td  class="key">Attachments</td>
                        <td style="width:10px;">:</td>
                        <td calss="value"><a style="color: #000 !important" href="<?php  echo base_url(); ?>uploads/<?php echo $files; ?>" data-toggle="tooltip" data-placement="right" title="Employee Image" target=_blank><?php echo $files; ?></a></td>
                     </tr>
                  </table>
               </div>
               <div class="col-6">
                  <table id="two">
                     <tr>
                        <td  class="key"><?php echo display('blood_group') ?></td>
                        <td style="width:10px;">:</td>
                        <td calss="value"><?php  echo $blood_group ; ?></td>
                     </tr>
                     <tr>
                        <td  class="key"><?php echo ('Social Security Number') ?></td>
                        <td style="width:10px;">:</td>
                        <td calss="value"><?php  echo $social_security_number; ?></td>
                     </tr>
                     <tr>
                        <td  class="key"><?php echo ('Routing number') ?></td>
                        <td style="width:10px;">:</td>
                        <td calss="value"><?php  echo $routing_number ?></td>
                     </tr>
                     <tr>
                        <td  class="key"><?php echo display('address_line_1') ?></td>
                        <td style="width:10px;">:</td>
                        <td calss="value"><?php  echo $address_line_1; ?></td>
                     </tr>
                     <tr>
                        <td  class="key"><?php echo display('address_line_2') ?></td>
                        <td style="width:10px;">:</td>
                        <td calss="value"><?php  echo $address_line_2; ?></td>
                     </tr>
                     <tr>
                        <td  class="key"><?php echo display('country') ?></td>
                        <td style="width:7px;">:</td>
                        <td calss="value" style="white-space: pre-wrap;"> <?php  echo $country; ?></td>
                     </tr>
                     <tr>
                        <td  class="key"><?php echo display('city') ?></td>
                        <td style="width:10px;">:</td>
                        <td calss="value"><?php  echo $city; ?></td>
                     </tr>
                  </table>
               </div>
            </div>
            <br>
         </div>
         <?php 
            } else if($template==4)
                {
            ?>
         <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/Invoice/style.css" />
         <style>
            th{
            text-align:center;
            }
            .invoice-12 .default-table thead th {
            position: relative;
            color:white;
            font-size: 15px;
            background-color:<?php  //echo $color ?>;
            }
            input{
            border: none;
            }
            .tm{
            background-color:red;
            position: absolute;
            height: 30%;
            width: 70%;
            -webkit-transform: skewX(-35deg);
            /* transform: skewX(35deg); */
            right: -100px;
            overflow: hidden;
            }
            .tm_accent_bg, .tm_accent_bg_hover:hover {
            background-color: #007aff;
            }
            .invoice-12 .invoice-info:after {
            content: "";
            width: 300px;
            height: 300px;
            position: absolute;
            bottom: 0;
            right: 0;
            background-color: <?php // echo $color ?>;
            background-size: cover;
            z-index: -1;
            }
            .invoice-12 .invoice-info:before {
            content: "";
            width: 300px;
            height: 300px;
            position: absolute;
            top: 0;
            left: 0;
            background-color: <?php  //echo $color ?>;
            background-size: cover;
            z-index: -1;
            }
            .invoice-12 .default-table thead {
            background-color: <?php  //echo $color ?>;
            border-radius: 8px;
            color: black;
            }
            @media (max-width: 992px) {
            th{
            text-align:center;
            }
            .invoice-12 .default-table thead th {
            position: relative;
            color:white;
            font-size: 15px;
            background-color:<?php // echo $color ?>;
            }
            input{
            border: none;
            }
            .tm{
            background-color:red;
            position: absolute;
            height: 30%;
            width: 70%;
            -webkit-transform: skewX(-35deg);
            /* transform: skewX(35deg); */
            right: -100px;
            overflow: hidden;
            }
            .tm_accent_bg, .tm_accent_bg_hover:hover {
            background-color: #007aff;
            }
            .invoice-12 .invoice-info:after {
            content: "";
            width: 300px;
            height: 300px;
            position: absolute;
            bottom: 0;
            right: 0;
            background-color: <?php  //echo $color ?>;
            background-size: cover;
            z-index: -1;
            }
            .invoice-12 .invoice-info:before {
            content: "";
            width: 300px;
            height: 300px;
            position: absolute;
            top: 0;
            left: 0;
            background-color: <?php  //echo $color ?>;
            background-size: cover;
            z-index: -1;
            }
            .invoice-12 .default-table thead {
            background-color: <?php // echo $color ?>;
            border-radius: 8px;
            color: black;
            }
            }
            .b_total{
            width:70px;
            }
            .invoice-contant{
            /* border:2px solid black; */
            }
            th,td{
            padding-top: 10px;
            padding-bottom: 20px;
            padding-left: 30px;
            padding-right: 40px;
            }
         </style>
         <!-- Invoice 12 start -->
         <div class="invoice-12 invoice-content" style="padding:0px;">
            <div class="container"  style="padding:0px;">
               <div class="row" >
                  <div class="col-lg-12">
                     <div class="invoice-inner clearfix">
                        <div style="color:red;"></div>
                        <div style="color:red;"></div>
                        <div class="invoice-info clearfix" id="invoice_wrapper">
                           <div class="invoice-contant" >
                              <div class="invoice-headar">
                                 <div class="row" >
                                    <div class="col-sm-4">
                                    </div>
                                    <div class="col-sm-8">
                                       <div class="description" >
                                          <h2 style="margin-bottom:20px;"><?php echo "Employee Info"; ?> </h2>
                                       </div>
                                       <!-- .description -->
                                    </div>
                                 </div>
                                 <!-- .row -->
                              </div>
                              <div class="invoice-top" style="padding-top:0px;">
                                 <br/>
                                 <div class="row">
                                    <div class="col-md-3 col-sm-3 mb-30">
                                       <div class="invoice-number">
                                          <img crossorigin="anonymous" src="<?php echo base_url().$photo; ?>" style="float: left;width:100px;height:100px;" alt="logo">
                                       </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4 mb-30 invoice-contact-us">
                                       <h4 class="inv-title-1" style="font-weight:bold;color:<?php echo $color; ?> "><?php  echo $first_name." ".$last_name;  ?></h4>
                                       <!--<h4 class="inv-title-1" style="font-weight:bold;color:<?php// echo $color; ?> "><?php //echo $business_name; ?></h4>-->
                                       <h2 class="name mb-10"></h2>
                                       <ul class="link">
                                          <li>
                                             <i class="fa fa-map-marker"></i> <?php echo $address_line_1.",".$address_line_2; ?>
                                          </li>
                                          <!-- <li>-->
                                          <!--    <i class="fa fa-map-marker"></i> <?php// echo ; ?>-->
                                          <!--</li>-->
                                          <?php   if(!empty(trim($city))){ ?>
                                          <li>
                                             <i class="fa-solid fa-city"></i> <?php echo $city;?>
                                          </li>
                                          <?php } ?>
                                          <?php   if(!empty($country)){ ?>
                                          <li>
                                             <i class="fa fa-flag"></i> <a href="tel:+55-417-634-7071"><?php echo $country; ?></a>
                                          </li>
                                          <?php } ?>
                                          <?php   if(!empty($zip)){ ?>
                                          <li>
                                             <i class="fa-solid fa-location-pin"></i> <a href="tel:+55-417-634-7071"><?php echo $zip; ?></a>
                                          </li>
                                          <?php } ?>
                                       </ul>
                                    </div>
                                    <div class="col-md-3 col-sm-3 mb-30 invoice-contact-us">
                                       <h4 class="inv-title-1" style="font-weight:bold;color:<?php echo $color; ?> "><?php echo $company; ?></h4>
                                       <h2 class="name mb-10"></h2>
                                       <ul class="link">
                                          <li>
                                             <i class="fa fa-map-marker"></i> <?php echo $address; ?>
                                          </li>
                                          <li>
                                             <i class="fa fa-envelope"></i> <a href="<?php echo $com_email;?>"></a>
                                          </li>
                                          <li>
                                             <i class="fa fa-phone"></i> <a href="tel:+55-417-634-7071"><?php echo $com_phone; ?></a>
                                          </li>
                                       </ul>
                                    </div>
                                    <div class="col-md-2 col-sm-2 mb-30">
                                       <div class="invoice-number">
                                          <img crossorigin="anonymous" src="<?php echo base_url().$logo; ?>" style="float: left;width:100px;height:100px;" alt="logo">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="invoice-center">
                                 <div class="order-summary" style="padding:20px;">
                                    <div class="table-outer">
                                       <table class="default-table invoice-table" border="1" cellpadding="0" cellspacing="0">
                                          <tbody>
                                             <tr style="font-weight:bold;text-align:center;background-color:<?php  echo  $color; ?>;color:black;">
                                                <td style="color:white;"><strong>Email</strong></td>
                                                <td style="color:white;"><strong>Phone</strong></td>
                                                <td style="color:white;"><strong>RATE / Hrs </strong></td>
                                                <td style="color:white;"><strong>Payment Terms</strong></td>
                                             </tr>
                                             <tr style="text-align:center;">
                                                <td><?php  echo  $email; ?></td>
                                                <td> <?php  echo  $phone; ?></td>
                                                <td> <?php echo $hrate; ?></td>
                                                <td ><?php echo $rate_type; ?></td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                              </div>
                              <div class="invoice-center">
                                 <div class="order-summary" style="padding:20px;">
                                    <div class="table-outer">
                                       <div ><span style="float:left" ><strong>Social Security Number : </strong><span id="em_month"><?php echo $social_security_number; ?></span></span><span style="float:right;"><strong>Routing Number : </strong><?php echo $routing_number; ?> </span> <br> </div>
                                       <br>
                                       <div ><span style="float:left" ><strong>Employee ID : </strong><span id="em_month"><?php echo $id; ?></span></span><span style="float:right;"><strong>Attachments : </strong><a style="color: #000 !important" href="<?php  echo base_url(); ?>uploads/<?php echo $files; ?>" data-toggle="tooltip" data-placement="right" title="Employee Image" target=_blank ><?php echo $files; ?></a> </span> <br> </div>
                                       <!--<br/>    <br/>   <strong>Employee ID :</strong> <?php  echo $id;  ?> -->
                                    </div>
                                 </div>
                              </div>
                              <!--     <div class="col-lg-4 col-md-4 col-sm-4">
                                 <div class="payment-method mb-30">
                                     <h3 style="font-size: 18px;font-weight:bold;" class="inv-title-1 mb-10">Payment Info :</h3>
                                     <ul class="payment-method-list-1 text-14" style="font-size: 18px;">
                                         <li><strong>Payment Terms : &nbsp;</strong><?php  echo $payment_terms; ?></li>
                                         <li><strong>Payment Type    :&nbsp;&nbsp;&nbsp; </strong><?php  echo $paytype ; ?></li>
                                         <li><strong>Due date      : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong> <?php  echo $all_invoice[0]['payment_due_date'] ; ?></li>
                                     </ul>
                                 </div>
                                 </div> -->
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
<script src="<?php echo base_url()?>assets/css/Invoice/jspdf.min.js"></script>
<script src="<?php echo base_url()?>assets/css/Invoice/app.js"></script>
<?php   } ?>
</div>
</div>
</div> <!-- /.content-wrapper -->
</section> <!-- /.content -->
</div>
<style>
   .key{
   width: auto;
   text-align:left;
   font-weight:bold;
   }
   .value{
   text-align:left;
   }
   #one,#two{
   /* float:left; */
   /* width:100%; */
   }
   body{
   background-color: #fcf8f8; 
   margin: 0;
   padding: 0;
   }
   h1,h2,h3,h4,h5,h6{
   margin: 0;
   padding: 0;
   }
   p{
   margin: 0;
   padding: 0;
   }
   .heading_name{
   font-weight: bold;
   }
   .container{
   width: 100%;
   margin-right: auto;
   margin-left: auto;
   margin-top: 50px;
   }
   .brand-section{
   /* background-color: #5961b3; */
   padding: 10px 40px;
   }
   .logo{
   width: 50%;
   }
   .row{
   display: flex;
   flex-wrap: wrap;
   }
   .col-6{
   width: 50%;
   flex: 0 0 auto;
   }
   .text-white{
   color: #fff;
   }
   .company-details{
   float: right;
   text-align: right;
   }
   .body-section{
   padding: 0px;
   }
   .heading{
   font-size: 10px;
   margin-bottom: 08px;
   }
   .sub-heading{
   color: #262626;
   margin-bottom: 05px;
   }
   table{
   /*background-color: #fff;*/
   width: 100%;
   border-collapse: collapse;
   /* text-align: center; */
   }
   table thead tr{
   border: 1px solid #111;
   /* background-color: #5961b3; */
   }
   .table-bordered td{
   text-align:center;
   }
   table td {
   vertical-align: middle !important;
   word-wrap: break-word;
   }
   th{
   text-align:center;
   color:white;
   }
   table th, table td {
   padding-top: 08px;
   padding-bottom: 08px;
   }
   .table-bordered{
   box-shadow: 0px 0px 5px 0.5px gray !important;
   }
   .table-bordered td, .table-bordered th {
   border: 1px solid #dee2e6 !important;
   }
   .text-right{
   text-align: right;
   }
   .w-20{
   width: 20%;
   }
   .float-right{
   float: right;
   }
   @media only screen and (max-width: 600px) {
   }
   .modal {
   position: fixed;
   top: 0;
   left: 0;
   display: flex;
   width: 100%;
   height: 100vh;
   justify-content: center;
   align-items: center;
   opacity: 0;
   visibility: hidden;
   }
   .modal .content {
   position: relative;
   padding: 10px;
   border-radius: 3px;
   background-color: #fff;
   box-shadow: rgba(112, 128, 175, 0.2) 0px 16px 24px 0px;
   transform: scale(0);
   transition: transform 300ms cubic-bezier(0.57, 0.21, 0.69, 1.25);
   }
   .modal .close {
   position: absolute;
   top: 5px;
   right: 5px;
   width: 30px;
   height: 30px;
   cursor: pointer;
   border-radius: 8px;
   background-color: #7080af;
   clip-path: polygon(0 10%, 10% 0, 50% 40%, 89% 0, 100% 10%, 60% 50%, 100% 90%, 90% 100%, 50% 60%, 10% 100%, 0 89%, 40% 50%);
   }
   .modal.open {
   background-color:#38469f;
   opacity: 1;
   visibility: visible;
   }
   .modal.open .content {
   transform: scale(1);
   }
   .content-wrapper.blur {
   filter: blur(5px);
   }
   .content {
   min-height: 0px;
   }
   body {
   margin: 0;
   padding: 0;
   background: #38469f;
   }
   #head{
   text-align: center;
   margin-top: 250px;
   }
   @media print 
   { 
   #head{display:none;} 
   #content{display:block;} 
   }
</style>
<div class="modal fade" id="myModal_sale" role="dialog" >
   <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content" style="width: 500px;height:100px;text-align:center;margin-bottom: 300px;">
         <div class="modal-header" style="color:white;background-color:#38469f;">
            <h4 class="modal-title">Human Resources</h4>
         </div>
         <div class="content">
            <div class="modal-body" style="text-align:center;font-weight:bold;">
               <h4>Employee Info Download Successfully</h4>
            </div>
            <div class="modal-footer">
            </div>
         </div>
      </div>
   </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
<script>
   $(document).ready(function () {
   $("#content").attr("hidden", true);
   
   var img = document.createElement("img");
   img.src = "<?php  echo  base_url() ?>/asset/images/icons/loading.gif";
   var src = document.getElementById("head");
   src.appendChild(img);
   
   
       const element = document.getElementById("content");
   
      // clone the element
      var clonedElement = element.cloneNode(true);
   
      // change display of cloned element 
      $(clonedElement).css("display", "block");
      var pdf = new jsPDF('p','pt','a4');
        //$('#content').css('display','block');
         
     
   
   function first(callback1,callback2){
   setTimeout( function(){
   
    //  const invoice = document.getElementById("content");
            //   console.log(invoice);
               console.log(window);
               var pageWidth = 8.5;
               var margin=0.5;
               var opt = {
    lineHeight : 1.2,
    margin : 0,
    maxLineWidth : pageWidth - margin *1,
                   filename: 'invoice'+'.pdf',
                   allowTaint: true,
                   html2canvas: { scale: 3 },
                   jsPDF: { unit: 'in', format: 'a4', orientation: 'portrait' }
               };
                html2pdf().from(clonedElement).set(opt).toPdf().get('pdf').then(function (pdf) {
    var totalPages = pdf.internal.getNumberOfPages();
   for (var i = 1; i <= totalPages; i++) {
      pdf.setPage(i);
      pdf.setFontSize(10);
      pdf.setTextColor(150);
    }
    }).save('EmployeeInfo_<?php echo $first_name."_".$last_name.".pdf"?>');
      callback1();
      callback2();
       clonedElement.remove();
   $("#content").attr("hidden", true);
   }, 3000 );
   }
   function second(){
   setTimeout( function(){
      $( '#myModal_sale' ).addClass( 'open' );
   if ( $( '#myModal_sale' ).hasClass( 'open' ) ) {
    $( '.container' ).addClass( 'blur' );
   }
   $( '.close' ).click(function() {
    $( '#myModal_sale' ).removeClass( 'open' );
    $( '.cont' ).removeClass( 'blur' );
   });
   }, 3500 );
   }
   function third(){
      setTimeout( function(){
          window.location='<?php  echo base_url();   ?>'+'Chrm/manage_employee';
          window.close();
      }, 4000 );
   }
   first(second,third);
   });
   
   
   $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
   
     
</script>