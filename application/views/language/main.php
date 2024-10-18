<!-- Manage Language Start -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
<!--<script type="text/javascript" src="<?php echo base_url()?>assets/js/drag_drop_index_table.js"></script>-->
<div class="content-wrapper">
   <section class="content-header">
      <div class="header-icon">
         <i class="pe-7s-note2"></i>
      </div>
      <div class="header-title">
         <h1><?php echo display('Manage Language') ?></h1>
         <small></small>
         <ol class="breadcrumb">
            <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('Home') ?></a></li>
            <li><a href="#"><?php echo display('Language') ?></a></li>
            <li class="active" style="color:orange"><?php echo display('Manage Language') ?></li>
         </ol>
      </div>
   </section>
   <style>
      th{
      text-align:center;
      }

      .btnclr{
       background-color:<?php echo $setting_detail[0]['button_color']; ?>;
       color: white;

   }


   </style>
   <section class="content">
      <!-- Manage Language -->
      <?php
         $message = $this->session->userdata('message');
         if (isset($message)) {
         ?>
      <div class="alert alert-info alert-dismissable" style="background-color:#38469f;color:white;font-weight:bold;">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
         <?php echo $message ?>                    
      </div>
      <?php 
         }
         ?>
      <div class="row">
         <div class="col-sm-12"> 
            <?php if($this->permission1->method('add_language','create')->access()){?>
            <a href="<?php echo  base_url('Language/phrase') ?>" class="btn btn-info"><?php echo display('Add Phrase') ?></a>
            <?php }?>
         </div>
      </div>
      <div class="row">
         <div class="col-sm-12">
            <div class="panel panel-bd lobidrag">
               <div class="panel-heading">
                  <div class="panel-title">
                     <h4></h4>
                  </div>
               </div>
               <div class="panel-body">
                  <div class="table-responsive">
                    <div class="">
                        <!--<div class="sortableTable__container">-->
                    <!--<div class="sortableTable__discard">-->
                    <!--</div>-->
                     <table  style="text-align:center;" class="table table-bordered table-striped table-hover">
                        <thead class="sortableTable">
                           <tr class="sortableTable__header">
                              <td colspan="3" style="text-align:center;">
                                 <?php echo  form_open('language/addlanguage', ' class="form-inline" ') ?> 
                                 <div class="form-group" >
                                    <label class="sr-only" for="addLanguage"> <?php echo display('Language Name') ?></label>
                                    <input name="language" type="text" class="form-control" id="addLanguage" placeholder=" <?php echo display('Language Name') ?>">
                                 </div>
                                 <button type="submit" class="btn btnclr" style="color:white;"> <?php echo display('Save') ?></button>
                                 <?php echo  form_close(); ?>
                              </td>
                           </tr>
                           <tr style="color:white;" class="btnclr">
                              <th class="1 value" data-col="1"><i class="fa fa-th-list"></i></th>
                              <th class="2 value" data-col="2"><?php echo display('Language') ?></th>
                              <th class="3 value" data-col="3"><i class="fa fa-cogs"></i></th>
                           </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($languages)) {?>
                           <?php $sl = 1 ?>
                           <?php foreach ($languages as $key => $language) {?>
                           <tr>
                               <td class="1 value" data-col="1"><?php echo  $sl++ ?></td>
                              <td class="2 value" data-col="2"><?php echo  html_escape($language) ?></td>
                              <td class="3 value" data-col="3"><a href="<?php echo  base_url("Language/editPhrase/$key") ?>" class="btnclr btn btn-xs"><i class="fa fa-edit"></i></a>  
                              </td>
                           </tr>
                           <?php } ?>
                           <?php } ?>
                        </tbody>
                     </table>
                    </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>

 