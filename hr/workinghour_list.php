<?php error_reporting(1);  ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" />
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.base64.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/html2canvas.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jspdf.plugin.autotable"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jspdf.umd.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<script type="text/javascript" src="<?php echo base_url()?>my-assets/js/employeeform_tableManager.js"></script>
<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
<script type="text/javascript" src="http://mrrio.github.io/jsPDF/dist/jspdf.debug.js"></script>
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" />
<script type="text/javascript" src="http://www.bacubacu.com/colresizable/js/colResizable-1.5.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/drag_drop_index_table.js"></script>
<style>
   .btnclr{
   background-color:<?php echo $setting_detail[0]['button_color']; ?>;
   color: white;
   background-color: #424f5c;
   }
</style>
<div class="content-wrapper">
<section class="content-header">
   <div class="header-icon">
      <figure class="one">
      <img src="<?php echo base_url()  ?>asset/images/employee.png"  class="headshotphoto" style="height:50px;" />
   </div>
   <div class="header-title">
      <div class="logo-holder logo-9">
         <h1><?php echo ('Manage Working Hours') ?></h1>
      </div>
      <small><?php echo "" ?></small>
      <ol class="breadcrumb" style="border: 3px solid #d7d4d6;">
         <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
         <li><a href="#"><?php echo display('hrm') ?></a></li>
         <li class="active" style="color:orange"><?php echo ('Manage Working Hours') ?></li>
         <div class="load-wrapp">
            <div class="load-10">
               <div class="bar"></div>
            </div>
         </div>
      </ol>
   </div>
</section>
<section class="content">
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
   <!-- Manage Category -->
   <div class="panel panel-bd lobidrag" >
      <div class="panel-heading" style="height: 60px;    border: 3px solid #d7d4d6;">
         <div class="col-sm-12" style="height:69px;">
            <div class="col-sm-4" style="display: flex; justify-content: space-between; align-items: left;">
               <?php    foreach(  $this->session->userdata('perm_data') as $test){
                  $split=explode('-',$test);
                  if(trim($split[0])=='hrm' && $_SESSION['u_type'] ==3 && trim($split[1])=='1000'){
                    
                    
                     ?>
               <a href="<?php echo base_url('Chrm/working_hours') ?>" class="btn btnclr dropdown-toggle" style="color:white;border-color: #2e6da4;    height: fit-content;"> <i class="far fa-file-alt"> </i>&nbsp;<?php echo ('Add Working Hours') ?></a>
               <?php break;}} 
                  if($_SESSION['u_type'] ==2){ ?>
               <a href="<?php echo base_url('Chrm/working_hours') ?>" class="btn btnclr dropdown-toggle" style="border-color: #2e6da4;    height: fit-content;"> <i class="far fa-file-alt"> </i>&nbsp;<?php echo ('Add Hours') ?></a>
               <?php  } ?>
               &nbsp;&nbsp;
            </div>
            <div class="col-sm-2" style="float:right;">
               <div class="" style="float: right;">  <a onclick="reload();"  id="removeButton">  <i class="fa fa-refresh fa-spin" style="font-size:25px;float:right;" aria-hidden="true"></i> </a>    &nbsp;    &nbsp;    &nbsp;    &nbsp; <i class="fa fa-gear fa-spin"  aria-hidden="true" id="myBtn" style="margin-right:20px;font-size:25px;float:right;" onClick="columnSwitchMODAL()"></i></div>
            </div>
         </div>
         <br>
         <br> 
         <br> 
      </div>
   </div>
   <!-- Manage Invoice report -->
   <div class="row">
   <div class="col-sm-12"  >
   <div class="panel panel-bd lobidrag"     style="border: 3px solid #d7d4d6;">
   <div class="panel-body" style="padding-top: 0px;">
      <div class="sortableTable__container">
         <div class="sortableTable__discard">
         </div>
         <div id="customers">
            <table class="table table-bordered" cellspacing="0" width="100%" id="ProfarmaInvList">
               <thead class="sortableTable">
                  <tr class="sortableTable__header btnclr">
                     <th class="1 value"  data-col="1"  data-resizable-column-id="1"    ><?php echo display('sl') ?></th>
                     <th class="2 value"  data-col="2"  data-resizable-column-id="2"    ><?php echo ('Working Hour') ?></th>
                     <th class="3 value"  data-col="3"  data-resizable-column-id="3"   ><?php echo ('Working Extra Hour Rate') ?></th>
                  </tr>
               </thead>
               <tbody class="sortableTable__body" id="tab">
                  <?php
                     if ($w_data) {
                     
                         ?>
                  <?php
                     $sl = 1;
                     
                      foreach($w_data as $value){?>
                  <tr>
                     <td class="1 value" data-col="1" style="text-align:center;" ><?php echo $sl;?></td>
                     <td class="2 value"  data-col="2" style="text-align:center;" >  
                        <?php echo isset($value['work_hour']) ? $value['work_hour'] . " " : ""; ?>
                     </td>
                     <td class="3 value"  data-col="3" style="text-align:center;" ><?php echo isset($value['extra_workamount']) ? $value['extra_workamount'] . " " : ""; ?></td>
                  </tr>
                  <?php
                     $sl++;
                     
                     }}else{
                     
                     ?>
                  <tr>
                     <td style="text-align:center;" colspan="3">No Records Found</td>
                  </tr>
                  <?php  }  ?>
               </tbody>
            </table>
         </div>
      </div>
      <script src="<?php echo base_url()?>assets/js/jquery.bootgrid.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.0.0-alpha.1/jspdf.plugin.autotable.js"></script>
      <script type="text/javascript" src="<?php echo base_url()?>my-assets/js/profarma.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>

</section>
<!------ add new designation_modal -->  
<style>
   .select2-selection__rendered{
   display:none;
   }
   .pagecontroller {
   margin: 5px;
   }
   .logo-9 i{
   font-size:80px;
   position:absolute;
   z-index:0;
   text-align:center;
   width:100%;
   left:0;
   top:-10px;
   color:#34495e;
   -webkit-animation:ring 2s ease infinite;
   animation:ring 2s ease infinite;
   }
   .logo-9 h1{
   font-family: 'Lora', serif;
   font-weight:600;
   text-transform:uppercase;
   font-size:40px;
   position:relative;
   z-index:1;
   color:#e74c3c;
   text-shadow: 3px 3px 0 #fff, -3px -3px 0 #fff, 3px -3px 0 #fff, -3px 3px 0 #fff;
   }
   .logo-9{
   position:relative;
   } 
   /*//side*/
   .bar {
   float: left;
   width: 25px;
   height: 3px;
   border-radius: 4px;
   background-color: #4b9cdb;
   }
   .load-10 .bar {
   animation: loadingJ 2s cubic-bezier(0.17, 0.37, 0.43, 0.67) infinite;
   }
   @keyframes loadingJ {
   0%,
   100% {
   transform: translate(0, 0);
   }
   50% {
   transform: translate(80px, 0);
   background-color: #f5634a;
   width: 140px;
   }
   }
</style>