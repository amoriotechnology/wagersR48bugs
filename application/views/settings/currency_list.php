<!-- Account List Start -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" />
<script type="text/javascript" src="<?php echo base_url()?>assets/js/drag_drop_index_table.js"></script>
<div class="content-wrapper">
   <section class="content-header">
      <div class="header-icon">
         <i class="pe-7s-note2"></i>
      </div>
      <div class="header-title">
         <h1><?php echo display('currency') ?></h1>
         <small><?php //echo display('currency') ?></small>
         <ol class="breadcrumb">
            <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
            <li><a href="#"><?php echo display('settings') ?></a></li>
            <li class="active" style="color:orange;"><?php echo display('currency') ?></li>
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
      <!-- Account List -->
      <div class="row">
         <div class="col-sm-12">
            <div class="panel panel-bd lobidrag">
               <div class="panel-heading">
                  <div class="panel-title">
                     <?php if($this->permission1->method('add_currency','create')->access()){?>
                     <a href="<?php echo base_url('Currency/currency_form') ?>" class="btn btnclr"><?php echo display('add_currency') ?> </a>
                     <?php }?>
                  </div>
               </div>
               <div class="panel-body">
                  <div class="table-responsive">
                    <div class="sortableTable__container">
                     <div class="sortableTable__discard">
                     </div>
                     <table id="ProfarmaInvList" class="table table-bordered table-striped table-hover">
                        <thead class="sortableTable">
                           <tr style="height:35px;" class="sortableTable__header btnclr">
                              <th class="1 value" data-col="1"><?php echo display('sl') ?></th>
                              <th class="2 value" data-col="2"><?php echo display('currency_name') ?></th>
                              <th class="3 value" data-col="3"><?php echo display('currencY_icon') ?></th>
                              <th class="4 value" data-col="4"><?php echo display('action') ?></th>
                           </tr>
                        </thead>
                        <tbody class="sortableTable__body">
                           <?php
                              if ($list) {
                              ?>
                           <?php $sl =1;
                              foreach($list as $clist){?>
                           <tr class="task-list-row">
                              <td class="1 value" data-col="1"><?php echo $sl?></td>
                              <td class="2 value" data-col="2"><?php echo html_escape($clist->currency_name);?></td>
                              <td class="3 value" data-col="3"><?php echo html_escape($clist->icon);?></td>
                              <td class="4 value" data-col="4">
                                 <center>
                                    <?php echo form_open()?>
                                    <a href="<?php echo base_url('Currency/currency_form/'.$clist->id); ?>" class="btnclr btn   btn-sm" style="color:white;" data-toggle="tooltip" data-placement="left" title="" data-original-title="Update"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                    <?php echo form_close()?>	
                                 </center>
                              </td>
                           </tr>
                           <?php
                              $sl++;
                              }
                              	}
                              ?>
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
<!-- Account List End -->

 <script type="text/javascript">
         $(document).ready(function() {
         // Function to store the visibility state of rows in localStorage
         function storeVisibilityState() {
            var currencylistvisibilityStates = {};
            $("#ProfarmaInvList tr").each(function(index, element) {
                var row = $(element);
                var rowID = index;
                var isVisible = row.is(':visible');
                currencylistvisibilityStates[rowID] = isVisible;
            });
            // Store the visibility states in localStorage
            localStorage.setItem("currencylistvisibilityStates", JSON.stringify(currencylistvisibilityStates));
         }
         // Apply the stored visibility state on page load
         function applyVisibilityState() {
            var storedVisibilityStates = JSON.parse(localStorage.getItem("currencylistvisibilityStates")) || {};
            $("#ProfarmaInvList tr").each(function(index, element) {
                var row = $(element);
                var rowID = index;
                if (storedVisibilityStates.hasOwnProperty(rowID) && !storedVisibilityStates[rowID]) {
                    row.hide();
                } else {
                    row.show();
                }
            });
         }
         // Event listener for row clicks to toggle row visibility
         $(".bank_edit").on('click', function() {
            var row = $(this);
            row.toggle();
            storeVisibilityState(); // Store the updated visibility state
         });
         applyVisibilityState(); 
         });
      </script>