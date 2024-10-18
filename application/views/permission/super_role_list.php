<?php  error_reporting(1); ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" />
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
<!--<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" />-->
<script type="text/javascript" src="<?php echo base_url()?>assets/js/drag_drop_index_table.js"></script>
<!-- Add new customer start -->
<div class="content-wrapper">
   <section class="content-header">
      <div class="header-icon">
         <i class="pe-7s-note2"></i>
      </div>
      <div class="header-title">
         <h1><?php echo ('Role List') ?></h1>
         <small></small>
         <ol class="breadcrumb">
            <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
            <li><a href="#"><?php echo display('permission') ?></a></li>
            <li class="active" style="color:orange"><?php echo $title ?></li>
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
      <!-- New customer -->
      <div class="row">
         <div class="col-sm-12">
            <div class="panel panel-bd lobidrag">
               <div class="panel-heading">
                  <div class="panel-title">
                  </div>
               </div>
               <div class="panel-body">
                  <div class="table-responsive">
                    <div class="sortableTable__container">
                    <div class="sortableTable__discard">
                    </div>
                     <table id="ProfarmaInvList" class="table table-bordered table-striped table-hover">
                        <thead class="sortableTable">
                           <tr class="sortableTable__header">
                              <th class="1 value" data-col="1"><?php echo display('S.No') ?></th>
                              <th class="2 value" data-col="2"><?php echo display('role_name') ?></th>
                              <th class="3 value" data-col="3" width="130"><?php echo display('action') ?></th>
                           </tr>
                        </thead>
                        <tbody class="sortableTable__body">
                           <?php
                              if($super_count >0){
                                     foreach($super_user_list as $key=>$row){
                                       ?>
                           <tr class="task-list-row">
                              <td class="1 value" data-col="1"><?php echo ++$key; ?></td>
                              <td class="2 value" data-col="2"><?php echo $row['type']; ?></td>
                              <td class="3 value" data-col="3">
                                 <center>
                                    <?php  ///if($this->permission1->method('role_list','update')->access()){?>                     
                                    <a href="<?php echo base_url().'Permission/edit_perm/'.$row['id']; ?>" class="btnclr btn  btn-sm" style="background-color: #3CA5DE;"  data-toggle="tooltip" data-placement="left" title="<?php echo display('update') ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                    <?php// }?>
                                    <?php //if($this->permission1->method('role_list','delete')->access()){?>
                                    <a href="<?php echo base_url().'Permission/comp_role_delete/'.$row['id']; ?>" onClick="return confirm('Are You Sure to Want to Delete?')" class="btnclr btn  btn-sm" style="background-color: #3CA5DE;"  name="pidd" data-toggle="tooltip" data-placement="right" title="" data-original-title="<?php echo display('delete') ?> "><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                    <?php //}?>
                                 </center>
                              </td>
                           </tr>
                           <?php
                              }
                              }
                              else{
                              ?>
                           <tr>
                              <td></td>
                              <td><?php echo display('data_not_found')?></td>
                              <td></td>
                           </tr>
                           <?php
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

<script type="text/javascript">
         $(document).ready(function() {
         // Function to store the visibility state of rows in localStorage
         function storeVisibilityState() {
            var rolelistvisibilityStates = {};
            $("#ProfarmaInvList tr").each(function(index, element) {
                var row = $(element);
                var rowID = index;
                var isVisible = row.is(':visible');
                rolelistvisibilityStates[rowID] = isVisible;
            });
            // Store the visibility states in localStorage
            localStorage.setItem("rolelistvisibilityStates", JSON.stringify(rolelistvisibilityStates));
         }
         // Apply the stored visibility state on page load
         function applyVisibilityState() {
            var storedVisibilityStates = JSON.parse(localStorage.getItem("rolelistvisibilityStates")) || {};
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