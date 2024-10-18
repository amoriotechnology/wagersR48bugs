<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" /> -->
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
 
<div class="content-wrapper">
   <section class="content-header">
      <div class="header-icon">
         <i class="pe-7s-note2"></i>
      </div>
      <div class="header-title">
         <h1><?php echo display('Employee Details') ?></h1>
         <small></small>
         <ol class="breadcrumb">
            <li><a href=""><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
            <li><a href="#"><?php echo display('hrm') ?></a></li>
            <li class="active"><?php echo display('Employee Details') ?></li>
         </ol>
      </div>
   </section>

<style>
   .btnclr{
       background-color:<?php echo $setting_detail[0]['button_color']; ?>;
       color: white;

   }

</style>


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
      <a style="float:right;color:white;" href="<?php echo base_url('Chrm/manage_employee') ?>" class="btnclr btn  m-b-5 m-r-2"><i class="ti-align-justify"> </i> <?php echo ('Manage Employee')?> </a>
      <div class="row">
         <div class="col-sm-12 col-md-4">
            <div class="card-content-member">
               <!--<div > <?php echo "<img src='" .base_url().html_escape($row[0]['image'])."' width=100px; height=100px; class=img-circle>";?></div>-->
               <div ><img src="<?php  echo base_url(); ?>uploads/profile/<?php echo $row[0]['profile_image']; ?>" height="100px" width="100px" class="img-circle"></div>
            </div>
            <div class="card-content">
               <div class="card-content-member">
                  <h4 class="m-t-0"><?php echo html_escape($row[0]['first_name'])."  " .html_escape($row[0]['last_name']);?></h4>
                  <h5><?php echo display('designation')?>: <?php echo html_escape($row[0]['designation']);
                     ?></h5>
                  <p class="m-0"><i class="fa fa-mobile" aria-hidden="true"></i>
                     <?php echo html_escape($row[0]['phone']) ;?>
                  </p>
               </div>
               <div class="card-content-languages">
                  <div class="card-content-languages-group"></div>
                  <div class="card-content-languages-group">
                     <table class="table table-hover" width="100%">
                        <caption  class="resumehead"><?php echo display('personal_information')?></caption>
                        <tr>
                           <th><?php echo display('name')?></th>
                           <td><?php echo html_escape($row[0]['first_name'])." " .html_escape($row[0]['last_name']);?></td>
                        </tr>
                        <tr>
                           <th><?php echo display('phone')?></th>
                           <td><?php echo $row[0]['phone'] ;?></td>
                        </tr>
                        <tr>
                           <th><?php echo display('email')?></th>
                           <td><?php echo html_escape($row[0]['email'])  ;?></td>
                        </tr>
                        <tr>
                           <th><?php echo display('country')?></th>
                           <td><?php echo html_escape($row[0]['country']) ;?></td>
                        </tr>
                        <tr>
                           <th><?php echo display('city')?></th>
                           <td><?php echo html_escape($row[0]['city']) ;?></td>
                        </tr>
                        <tr>
                           <th><?php echo display('zip')?></th>
                           <td><?php echo html_escape($row[0]['zip']) ;?></td>
                        </tr>
                     </table>
                  </div>
               </div>
               <div class="card-footer">
                  <div class="card-footer-stats">
                     <div>
                        <p></p>
                        <span class="stats-small"></span>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-sm-12 col-md-8">
            <div class="row">
               <div class="col-sm-12 col-md-12 rating-block" >
                  <table class="table table-hover" width="100%">
                     <caption  class="resumehead"><?php echo display('positional_information')?></caption>
                     <tr>
                        <th><?php echo display('designation')?></th>
                        <td><?php echo html_escape($row[0]['designation']);?></td>
                     </tr>
                     <tr>
                        <th><?php echo display('phone')?></th>
                        <td><?php echo html_escape($row[0]['phone']) ;?></td>
                     </tr>
                     <tr>
                        <th><?php echo display('rate_type')?></th>
                        <td><?php if($row[0]['rate_type'] == 1){
                           echo 'Hourly';
                           }else{
                           echo 'Salary';
                           }?></td>
                     </tr>
                     <tr>
                        <th><?php echo display('hour_rate_or_salary')?></th>
                        <td><?php echo html_escape($row[0]['hrate']);?></td>
                     </tr>
                  </table>
               </div>
            </div>
         </div>
         <div class="col-sm-12 col-md-8">
            <div class="row">
               <div class="col-sm-12 col-md-12 rating-block" >
                  <table class="table table-hover" width="100%">
                     <caption  class="resumehead">Employee Attachments</caption>
                     <tr>
                        <th>Employee Image</th>
                        <td>
                           <?php
                              echo '<div class="file-container">';
                              foreach ($row as $attachment) {
                                  $Final_files = explode(",", $attachment['files']);
                                  foreach ($Final_files as $file) {
                                      $encoded_file = rawurlencode(trim($file));
                                      echo '<p><a href="' . base_url() . 'uploads/' . $encoded_file . '" target="_blank">' . trim($file) . '</a></p>';
                                  }
                              }
                              echo '</div>';
                           ?>
                        </td>
                          </tr>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>