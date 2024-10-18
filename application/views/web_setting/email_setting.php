<?php error_reporting(0); ?>
<link rel="stylesheet" type="text/css" href="
   <?php echo base_url('assets/css/mail.css'); ?>">
<script src="
   <?php echo base_url('assets/ckeditor/ckeditor.js'); ?>"></script>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/driver.js/0.9.8/driver.min.css'>
<script src='https://cdnjs.cloudflare.com/ajax/libs/driver.js/0.9.8/driver.min.js'></script>
<script src="https://cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script>
<!-- <?php //$conn = mysqli_connect('localhost', 'root', '', 'stonemart'); ?> -->
<!-- <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script> -->
<!-- Add new customer start -->
<div class="content-wrapper">
   <section class="content-header">
      <div class="header-icon">
         <i class="pe-7s-note2"></i>
      </div>
      <div class="header-title">
         <h1> <?php echo display('update_setting') ?></h1>
         <small>Email</small>
         <ol class="breadcrumb">
            <li>
               <a href="#">
               <i class="pe-7s-home"></i> <?php echo display('home') ?> </a>
            </li>
            <li>
               <a href="#"> <?php echo display('web_settings') ?> </a>
            </li>
            <li class="active"> <?php echo display('update_setting') ?> </li>
         </ol>
      </div>
   </section>
   <section class="content">
      <!-- Alert Message --> <?php
         $message = $this->session->userdata('message');
         if (isset($message)) {
             ?> 
      <div class="alert alert-info alert-dismissable">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> <?php echo $message ?>
      </div>
      <?php
         $this->session->unset_userdata('message');
         }
         $error_message = $this->session->userdata('error_message');
         if (isset($error_message)) {
         ?> 
      <div class="alert alert-danger alert-dismissable">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> <?php echo $error_message ?>
      </div>
      <?php
         $this->session->unset_userdata('error_message');
         }
         ?>
      <!-- New customer -->
      <div class="row">
         <input type="hidden" class="txt_csrfname" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
         <div class="col-sm-12">
            <div class="panel panel-bd lobidrag">
               <div class="panel-heading">
                  <div class="panel-title">
                     <h4>Webmail</h4>
                     <button class="btn btn-primary wishIntoroduction" id="processEmails"><i class='fas fa-sync-alt'></i> Sync Webmail / Gmail</button>
                  </div>
               </div>
               <div id="loading-spinner" class="loading-spinner" style="position: absolute;right: 794px;top: 123px;">
                  <img id="loading-image" src="<?php echo base_url(); ?>assets/images/loads.gif" style="display:none;"/>
               </div>
               <div class="mail-box">
                  <aside class="sm-side">
                     <div class="user-head">
                        <a class="inbox-avatar" href="javascript:;">
                        <img width="64" hieght="60" src=" <?php if(!empty($userLogo)){echo $userLogo;}else{echo base_url() . 'assets/images/profile.png';} ?>">
                        </a>
                        <div class="user-name">
                           <h5>
                              <!--<a href="#"><?php// echo $userName; ?></a>-->
                           </h5>
                           <span>
                           <a href="#"><?php echo $userEmail; ?></a>
                           </span>
                        </div>
                        <!-- <a class="mail-dropdown pull-right" href="javascript:;"><i class="fa fa-chevron-down"></i></a> -->
                     </div>
                     <div class="inbox-body">
                        <a href="#composeModal" data-toggle="modal" title="Compose" class="btn btn-compose"> Compose </a>
                     </div>
                     <ul class="inbox-nav inbox-divider">
                        <li class="active">
                           <a href="#" class="tablinks" onclick="openCity(event, 'Inbox')" id="defaultOpen" onclick="$.data.load(1);">
                           <i class="fa fa-inbox"></i> Inbox <span class="label label-danger pull-right" id="count_app"></span>
                           </a>
                        </li>
                        <li>
                           <a href="#" class="tablinks" onclick="openCity(event, 'Sentbox')" onclick="$.data.load(2);">
                           <i class="fa fa-envelope-o"></i> Sent </a>
                        </li>
                        <!--  <li><a href="#"><i class="fa fa-bookmark-o"></i> Important</a></li><li><a href="#"><i class=" fa fa-external-link"></i> Drafts <span class="label label-info pull-right">30</span></a></li> -->
                        <li>
                           <a href="#" class="tablinks" onclick="openCity(event, 'Trash')" onclick="$.data.load(3);">
                           <i class=" fa fa-trash-o"></i> Trash </a>
                        </li>
                     </ul>
                     <!--  <div class="inbox-body text-center"><div class="btn-group"><a class="btn mini btn-primary" href="javascript:;"><i class="fa fa-plus"></i></a></div><div class="btn-group"><a class="btn mini btn-success" href="javascript:;"><i class="fa fa-phone"></i></a></div><div class="btn-group"><a class="btn mini btn-info" href="javascript:;"><i class="fa fa-cog"></i></a></div></div> -->
                  </aside>
                  <aside class="lg-side">
                     <div class="inbox-head">
                        <h3>Inbox</h3>
                        <form action="#" class="pull-right position">
                           <div class="input-append">
                              <input type="text" id="search" class="sr-input" placeholder="Search Mail">
                              <button class="btn sr-btn" type="button">
                              <i class="fa fa-search"></i>
                              </button>
                           </div>
                        </form>
                     </div>
                     <div class="inbox-body">
                        <div class="mail-option">
                           <!--  <div class="chk-all">
                              <input type="checkbox" id="checkAll" class="mail-checkbox mail-group-checkbox Checkall" style="position: relative;top: 3px;" onchange="valueChanged()">
                              <div class="btn-group">
                                <a data-toggle="dropdown" href="#" class="btn mini all" aria-expanded="false"> All 
                                  
                                </a>
                              </div>
                              </div> -->
                           <!--  <div class="btn-group" id="DELETE_ALLEMAIL" style="display: none;">
                              <a data-original-title="Delete All" data-placement="top" data-toggle="dropdown" href="#" class="btn mini tooltips">
                                <i class="fa fa-trash-o"></i>
                              </a>
                              </div> -->
                           <div class="btn-group">
                              <a data-original-title="Refresh" data-placement="top" data-toggle="dropdown" href="#" class="btn mini tooltips">
                              <i class=" fa fa-refresh" onClick="document.location.reload(true)"></i>
                              </a>
                           </div>
                           <!--  <ul class="unstyled inbox-pagination">
                              <li>
                                <span>1-50 of 234</span>
                              </li>
                              <li>
                                <a class="np-btn" href="#">
                                  <i class="fa fa-angle-left  pagination-left"></i>
                                </a>
                              </li>
                              <li>
                                <a class="np-btn" href="#">
                                  <i class="fa fa-angle-right pagination-right"></i>
                                </a>
                              </li>
                              </ul> -->
                        </div>
                        <!-- Table Inbox -->
                        <div id="Inbox" class="tabcontent">
                           <table class="table table-inbox table-hover" id="live_search">
                              <tbody id="write_inboxdata">
                                 <?php 
                                    $perPage = 10;
                                    $totalItems = count($inboxData);
                                    $pages = ceil($totalItems / $perPage);
                                    $page = isset($_GET['page']) ? $_GET['page'] : 1;
                                    $start = ($page - 1) * $perPage;
                                    $currentPageData = array_slice($inboxData, $start, $perPage);
                                    if(!empty($currentPageData)) { $s=1; foreach ($currentPageData as $key => $inboxdata) { ?>   
                                 <tr class="unread click_message" class="tablinks" data-toggle="modal" data-target="#inboxEmail">
                                    <!-- <td class="inbox-small-cells">
                                       <input type="checkbox" name="checkbox[]" id="checkItem" class="mail-checkbox" value="<?php echo $inboxdata->id; ?>">
                                       </td> -->
                                    <!--<td class="inbox-small-cells">-->
                                    <!--  <i class="fa fa-star"></i>-->
                                    <!--</td>-->
                                    <td class="view-message  dont-show"><?php echo $inboxdata->to_address; ?></td>
                                    <td class="view-message"><?php echo $inboxdata->subject; ?></td>
                                    <td style="display: none;"><input type="hidden" name="messageid" id="messageid" value="<?php echo $inboxdata->id; ?>"></td>
                                    <td style="display: none;"><input type="hidden" name="EMAILADDRESS" id="EMAILADDRESS" value="<?php echo $inboxdata->to_address; ?>"></td>
                                    <td style="display: none;"><input type="hidden" name="dateTime" id="dateTime" value="<?php echo $inboxdata->email_date; ?>"></td>
                                    <td class="view-message  inbox-small-cells">
                                       <!-- <i class="fa fa-paperclip"></i> &nbsp;  -->
                                       <a style="color: #000 !important;" onclick="return confirm('Are you sure you want to delete this email?');" data-toggle="tooltip" title="Delete"><i class="fa fa-trash inboxdelete_email" aria-hidden="true"></i></a>
                                       <input type="hidden" id="inbox_id" value="<?php echo $inboxdata->id; ?>">
                                    </td>
                                    <input type ="hidden" id="inbox_id" value="sd">
                                    <td class="view-message  text-right"><?php echo $inboxdata->email_date; ?></td>
                                    <input type="hidden" name="" id="email_count" value="<?php if(!empty($inboxData)){echo count($inboxData);}else{echo "0";} ?>">
                                 </tr>
                                 <?php $s++; } }else{ ?>   
                                 <tr class="unread click_message" class="tablinks">
                                    <td class="inbox-small-cells text-center">No data found</td>
                                 </tr>
                                 <?php } ?>
                              </tbody>
                           </table>
                           <!-- Pagination Links -->
                           <ul class="pagination justify-content-center">
                              <!-- First Page Link -->
                              <li class="page-item <?php echo ($page == 1) ? 'disabled' : ''; ?>">
                                 <a class="page-link" href="?page=1">First</a>
                              </li>
                              <!-- Previous Page Link -->
                              <li class="page-item <?php echo ($page <= 1) ? 'disabled' : ''; ?>">
                                 <a class="page-link" href="?page=<?php echo ($page > 1) ? ($page - 1) : 1; ?>">Previous</a>
                              </li>
                              <!-- Page Links -->
                              <?php for ($i = max(1, $page - 5); $i <= min($page + 5, $pages); $i++) : ?>
                              <li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>">
                                 <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                              </li>
                              <?php endfor; ?>
                              <!-- Next Page Link -->
                              <li class="page-item <?php echo ($page >= $pages) ? 'disabled' : ''; ?>">
                                 <a class="page-link" href="?page=<?php echo ($page < $pages) ? ($page + 1) : $pages; ?>">Next</a>
                              </li>
                              <!-- Last Page Link -->
                              <li class="page-item <?php echo ($page == $pages) ? 'disabled' : ''; ?>">
                                 <a class="page-link" href="?page=<?php echo $pages; ?>">Last</a>
                              </li>
                           </ul>
                        </div>
                        <!-- Table inbox end -->
                        <div id="Sentbox" class="tabcontent">
                           <table class="table table-inbox table-hover">
                              <tbody>
                                 <?php 
                                    $perPage = 10;
                                    $totalItems = count($sentbox_data);
                                    $pages = ceil($totalItems / $perPage);
                                    $page = isset($_GET['page']) ? $_GET['page'] : 1;
                                    $start = ($page - 1) * $perPage;
                                    $currentPage = array_slice($sentbox_data, $start, $perPage);
                                    if(!empty($currentPage)) { $s=1; foreach ($currentPage as $key => $value) { ?>   
                                 <!-- if(!empty($sentbox_data)) { $s=1; foreach ($sentbox_data as $key => $value) { ?> -->
                                 <tr class="unread email_list data_email tablinks" data-toggle="modal" data-target="#sendEmail">
                                    <!-- <td class="inbox-small-cells">
                                       <input type="checkbox" id="checkItem" class="mail-checkbox">
                                       </td> -->
                                    <td class="view-message  dont-show">To: <span><?php echo $value->to_email; ?></span></td>
                                    <td class="view-message"><?php echo $value->subject; ?></td>
                                    <td class="view-message  inbox-small-cells">
                                       <a style="color: #000 !important;" onclick="return confirm('Are you sure you want to delete this email?');" data-toggle="tooltip" title="Delete"><i class="fa fa-trash delete_email" aria-hidden="true"></i></a>
                                       <input type="hidden" id="delete_id" value="<?php echo $value->id; ?>">
                                       <input type="hidden" id="email_id" value="<?php echo $value->id; ?>">
                                       <input type="hidden" id="message" value="<?php echo $value->message; ?>">
                                    </td>
                                    <td class="view-message  text-right"><?php echo date('d/m/Y H:i:A'); ?></td>
                                 </tr>
                                 <?php $s++; } }else{ ?>
                                 <tr class="unread tablinks">
                                    <td class="inbox-small-cells text-center">No data found</td>
                                 </tr>
                                 <?php } ?>
                              </tbody>
                           </table>
                           <!-- Pagination Links -->
                           <ul class="pagination justify-content-center">
                              <!-- First Page Link -->
                              <li class="page-item <?php echo ($page == 1) ? 'disabled' : ''; ?>">
                                 <a class="page-link" href="?page=1">First</a>
                              </li>
                              <!-- Previous Page Link -->
                              <li class="page-item <?php echo ($page <= 1) ? 'disabled' : ''; ?>">
                                 <a class="page-link" href="?page=<?php echo ($page > 1) ? ($page - 1) : 1; ?>">Previous</a>
                              </li>
                              <!-- Page Links -->
                              <?php for ($i = max(1, $page - 5); $i <= min($page + 5, $pages); $i++) : ?>
                              <li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>">
                                 <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                              </li>
                              <?php endfor; ?>
                              <!-- Next Page Link -->
                              <li class="page-item <?php echo ($page >= $pages) ? 'disabled' : ''; ?>">
                                 <a class="page-link" href="?page=<?php echo ($page < $pages) ? ($page + 1) : $pages; ?>">Next</a>
                              </li>
                              <!-- Last Page Link -->
                              <li class="page-item <?php echo ($page == $pages) ? 'disabled' : ''; ?>">
                                 <a class="page-link" href="?page=<?php echo $pages; ?>">Last</a>
                              </li>
                           </ul>
                        </div>
                        <div id="Trash" class="tabcontent">
                           <table class="table table-inbox table-hover">
                              <tbody>
                                 <?php if(!empty($delete_data ||$inbox_deldata)){ ?>
                                 <?php $s=1; foreach ($delete_data as $key => $value) { ?>
                                 <tr class="unread">
                                   <!--  <td class="inbox-small-cells">
                                       <input type="checkbox" id="checkItem" class="mail-checkbox">
                                    </td> -->
                                    <td class="view-message  dont-show">To: <?php echo $value->to_email; ?></td>
                                    <td class="view-message "><?php echo $value->subject; ?> - <?php echo $value->message; ?></td>
                                    <td class="view-message  inbox-small-cells">
                                       <a style="color: #000 !important;" onclick="return confirm('Are you sure you want to restore this email?');"  data-toggle="tooltip" title="Restore"><i class="fa fa-rotate-right restore_point_one"></i></a>&nbsp;&nbsp;&nbsp;
                                       <a style="color: #000 !important;" onclick="return confirm('Are you sure you want to delete this email?');" data-toggle="tooltip" title="Delete"><i class="fa fa-trash alldelete_email" aria-hidden="true"></i></a>
                                       <input type ="hidden" id="trash_id" value="<?php echo $value->id; ?>">
                                       <input type ="hidden" id="restoreone_id" value="<?php echo $value->id; ?>">
                                    </td>
                                    <td class="view-message  text-right"><?php date_default_timezone_set('Asia/Kolkata'); 
                                       echo date('d/m/Y H:i:A',strtotime($value->time)); ?>
                                    </td>
                                 </tr>
                                 <?php $s++; } ?>
                                 <?php $s=1; foreach ($inbox_deldata as $key => $value) { ?>
                                 <tr class="unread">
                                   <!--  <td class="inbox-small-cells">
                                       <input type="checkbox" id="checkItem" class="mail-checkbox">
                                    </td> -->
                                    <td class="view-message  dont-show">To: <?php echo $value->to_address; ?></td>
                                    <td class="view-message ads"><?php echo $value->subject; ?> - <?php echo $value->message; ?></td>
                                    <td class="view-message  inbox-small-cells">
                                       <a style="color: #000 !important;" onclick="return confirm('Are you sure you want to restore this email?');" data-toggle="tooltip" title="Restore"><i class="fa fa-rotate-right restore_point_two"></i></a>&nbsp;&nbsp;&nbsp;
                                       <a style="color: #000 !important;" onclick="return confirm('Are you sure you want to delete this email?');" data-toggle="tooltip" title="Delete"><i class="fa fa-trash inDatadelete_email" aria-hidden="true"></i></a>
                                       <input type ="hidden" id="inboxtrash_id" value="<?php echo $value->id; ?>">
                                       <input type ="hidden" id="restoretwo_id" value="<?php echo $value->id; ?>">
                                    </td>
                                    <td class="view-message  text-right"><?php date_default_timezone_set('Asia/Kolkata');  
                                       echo date('d/m/Y H:i:A',strtotime($value->created_date)); ?> 
                                    </td>
                                 </tr>
                                 <?php $s++; } ?>
                                 <?php }else{ ?> 
                                 <tr class="unread">
                                    <td class="view-message text-center">No data found</td>
                                 </tr>
                                 <?php } ?> 
                              </tbody>
                           </table>
                        </div>
                        <div id="View" class="tabcontent">
                           <table class="table table-inbox table-hover">
                              <tbody>
                                 <tr class="unread">
                                    <td class="view-message" onclick="openCity(event, 'Sentbox')">
                                       <i class="fa fa-arrow-left" aria-hidden="true"></i> &nbsp;&nbsp;
                                    </td>
                                    <td class="view-message  inbox-small-cells text-right">
                                       <input type="hidden" name="email_value" id="emailid">
                                       <i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp; <span style="font-weight: normal;"> <?php echo date('H:i:A'); ?> </span>
                                    </td>
                                    <td class="view-message  inbox-small-cells text-right">
                                       <i class="fa fa-print" aria-hidden="true"></i> &nbsp; <i class="fa fa-star"></i>
                                       </i>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                           <br>
                           <table class="table table-inbox table-hover">
                              <tbody>
                                 <tr class="unread">
                                    <td class="view-message dont-show">
                                       <img width="64" hieght="60" src="http://bootsnipp.com/img/avatars/ebeb306fd7ec11ab68cbcaa34282158bd80361a7.jpg">
                                    </td>
                                    <td class="view-message text-left" style="max-width: 340px;">
                                       Test <br>
                                       <br>
                                       <address style="font-weight: normal;">Test</address>
                                    </td>
                                    <td class="view-message text-left"></td>
                                    <td class="view-message  inbox-small-cells">
                                       <a href="#myModal" data-toggle="modal" title="Compose">
                                       <i class="fa fa-reply" aria-hidden="true"></i>
                                       </a>
                                    </td>
                                    <td class="view-message  text-right">Test</td>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                        <div id="box" class="tabcontent">
                           <table class="table table-inbox table-hover">
                              <tbody>
                                 <tr class="unread">
                                    <td class="view-message" onclick="openCity(event, 'Inbox')">
                                       <i class="fa fa-arrow-left" aria-hidden="true"></i> &nbsp;&nbsp; Added a new class: Sent Box
                                    </td>
                                    <td class="view-message  inbox-small-cells text-right">
                                       <i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp; <span style="font-weight: normal;"> <?php echo date('H:i:A'); ?> </span>
                                    </td>
                                    <td class="view-message  inbox-small-cells text-right">
                                       <i class="fa fa-print" aria-hidden="true"></i> &nbsp; <i class="fa fa-star"></i>
                                       </i>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                           <br>
                           <table class="table table-inbox table-hover">
                              <tbody>
                                 <tr class="unread">
                                    <td class="view-message dont-show">
                                       <img width="64" hieght="60" src="http://bootsnipp.com/img/avatars/ebeb306fd7ec11ab68cbcaa34282158bd80361a7.jpg">
                                    </td>
                                    <td class="view-message text-left" style="max-width: 340px;">
                                       Hello <br>
                                       <br>
                                       <address style="font-weight: normal;">ryhush</address>
                                    </td>
                                    <td class="view-message text-left"></td>
                                    <td class="view-message  inbox-small-cells">
                                       <a href="#myModal" data-toggle="modal" title="Compose">
                                       <i class="fa fa-reply" aria-hidden="true"></i>
                                       </a>
                                    </td>
                                    <td class="view-message  text-right">Time </td>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </aside>
               </div>
            </div>
         </div>
         <!-- 
            <?php echo form_open_multipart('Cweb_setting/update_invoice_setting/new_sale', array('class' => 'form-vertical', 'id' => '')) ?><div class="panel-body"><iframe src="https://webmail.afterlogic.com/" style="width: 1000px; height: 640px;"></iframe></div><?php echo form_close() ?> -->
      </div>
</div>
</div>
</section>
</div>
<div class="modal fade" id="composeModal" role="dialog">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header" style="color:white;background-color:#38469f;">
            <a href="#" class="close" data-dismiss="modal">&times;</a>
            <h4 class="modal-title"><?php echo 'New Message' ?></h4>
         </div>
         <div class="modal-body">
            <?php echo form_open_multipart('Cweb_setting/emailSending')?>
            <!-- <form action="Cweb_setting/sendemail" method="post"> -->
            <div class="panel-body">
               <div class="form-group row">
                  <label style="width: auto;" class="col-sm-3 col-form-label">To:
                  </label>
                  <div class="col-lg-12">
                     <input type="email" placeholder="" name="to_email" id="inputEmail1" class="form-control" required>
                  </div>
               </div>
               <div class="form-group row">
                  <label style="width: auto;" class="col-sm-3 col-form-label">Cc
                  </label>
                  <div class="col-lg-12">
                     <input type="text" placeholder="" name="cc_email" id="inputEmail1" class="form-control">
                  </div>
               </div>
               <div class="form-group row">
                  <label style="width: auto;" class="col-sm-3 col-form-label">Subject
                  </label>
                  <div class="col-lg-12">
                     <input type="text" placeholder="" name="subject" id="inputEmail1" class="form-control" required>
                  </div>
               </div>
               <div class="form-group row">
                  <label style="width: auto;" class="col-sm-3 col-form-label">Message
                  </label>
                  <div class="col-lg-12">
                     <!--<textarea rows="10" cols="30" class="form-control" name="message"></textarea>-->
                     <textarea rows="10" cols="30" class="form-control" name="message" id="messageeditor"></textarea>
                  </div>
               </div>
               <input type="hidden" name="replyEmail" value="<?php echo $userEmail; ?>">
               <div class="form-group row">
                  <label style="width: auto;" class="col-sm-3 col-form-label">Attachment
                  </label>
                  <div class="col-lg-12">
                     <input type="file" name="files[]" class="form-control upload" id="attachment" multiple/>
                     <br>
                     <p id="files-area">
                        <span id="filesList">
                        <span id="files-names"></span>
                        </span>
                     </p>
                  </div>
               </div>
            </div>
            <!-- <a href="#" class="btn" style="color:white;background-color:#38469f;" data-dismiss="modal">Close</a> -->
            <input type="submit" class="btn" name="submit_btn" style="color:white;background-color: #38469F; float: right;" value="Send">
            <input type ="hidden" name="csrf_test_name" id="" value="<?php echo $this->security->get_csrf_hash();?>">
            <br> <br>
         </div>
      </div>
      <!--   <div class="modal-footer">
         <a href="#" class="btn" style="color:white;background-color:#38469f;" data-dismiss="modal">Close</a>
         <input type="submit" class="btn" style="color:white;background-color: #38469F;" value="Send">
         </div> -->
      <?php echo form_close()?>
   </div>
   <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- view Message Sent Box --> 
<div class="modal fade" id="sendEmail" role="dialog">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header" style="color:white;background-color:#38469f;">
            <a href="#" class="close" data-dismiss="modal">&times;</a>
            <h4 class="modal-title">View Message</h4>
         </div>
         <div class="modal-body">
            <div style="overflow-x: auto; max-height: 100%;">
               <textarea id="view_message"></textarea>
            </div>
            <input type="hidden" id="INBOX_ID">
            <input type ="hidden" name="csrf_test_name" id="" value="<?php echo $this->security->get_csrf_hash();?>">
            <div id="loading" style="display: none;">Loading...</div>
            <br>
            <div class="view_attachment"></div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
   <!-- /.modal-content -->
</div>
<!-- view Message InBox email --> 
<!--  <div class="modal fade" id="inboxEmail" role="dialog">
   <div class="modal-dialog modal-dialog-centered" role="document" style="width:45%;">
     <div class="modal-content">
       <div class="modal-header" style="color:white;background-color:#38469f;">
         <a href="#" class="close" data-dismiss="modal">&times;</a>
         <h4 class="modal-title">View Inbox Message</h4>
       </div>
       <div class="modal-body">
         <table class="table table-bordered">
           <thead>
             <tr>
               <th>Message</th>
             </tr>
           </thead>
           <tbody id="inbox_message">
            
           </tbody>
         </table>
         <input type ="hidden" name="csrf_test_name" id="" value="<?php echo $this->security->get_csrf_hash();?>">
         <br> <br> 
   
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
       </div>
          
       </div>
       
     </div>
     
   </div> -->
<div class="modal fade" id="inboxEmail" role="dialog">
   <div class="modal-dialog modal-dialog-centered" role="document" style="width: 45%;">
      <div class="modal-content">
         <div class="modal-header" style="color: white; background-color: #38469f;">
            <a href="#" class="close" data-dismiss="modal">&times;</a>
            <h4 class="modal-title">View Inbox Message</h4>
         </div>
         <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <p>From: <span id="email_addressinbox"></span></p>
              <p>To: <span><?php echo $userEmail; ?></span></p>
            </div>
            <div class="col-md-5">
              <p class="text-right" id="inboxdate" style="font-size: 14px;">To: <i class="fa fa-reply"></i></p>
            </div>
            <div class="col-md-1">
              <p class="text-right" style="cursor: pointer;"><i class="fa fa-reply" id="reply_button" data-toggle="tooltip" data-placement="left" title="" data-original-title="Reply"></i></p>
            </div>
          </div>
            <div style="overflow-x: auto; max-height: 500px;">
               <textarea id="editor"></textarea>
            </div>
            <!-- <div id="imageContainer"></div> -->
            <input type="hidden" name="csrf_test_name" id="" value="<?php echo $this->security->get_csrf_hash(); ?>">
            <br><br>
            <form id="reply_email" style="display: none;">
               <textarea id="reply_editor" required></textarea>
               <input type="hidden" id="reply_id" data-reply-id="">
               <br>
               <button class="btn btn-primary btn-sm" id="send_replyemail">Send</button> 
               <div id="loading_inbox" style="display: none;">Loading...</div>
            </form>
            <br><br>
         </div>
         <div class="modal-footer">
            <!-- <button type="button" id="reply_button" class="btn btn-secondary">Reply</button> -->
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>
<!-- Add new customer end -->
<script>
   var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
   var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';
   
   $('#reply_button').on('click', function() {
   var editor = CKEDITOR.instances['reply_editor'];
   var replyEmail = $('#reply_email'); 
   
   if (editor && replyEmail.css('display') === 'block') {
     editor.destroy();
     replyEmail.hide();
   } else {
     if (!editor) {
       CKEDITOR.replace('reply_editor', {
         height: '100px',
       });
     }
     replyEmail.show();
   }
   });
   
   
   $('#send_replyemail').on('click', function() {
    $("#loading_inbox").show();
   var editor = CKEDITOR.instances['reply_editor'];
   var email = $('#reply_id').val();
   var editorContent = editor ? editor.getData() : null;
   
   if (editorContent && editorContent.trim() !== '') {
     var replyContent = '-----Original Message-----\n';
     replyContent += 'From: ' + email + '\n';
     replyContent += 'Subject: Reply Email\n\n';
     replyContent += editorContent;
   
     $.ajax({
       url: '<?php echo base_url(); ?>Cweb_setting/sendReplyEmail',
       type: 'POST',
       data: {
         '<?php echo $this->security->get_csrf_token_name(); ?>': csrfHash,
         email: email,
         replyContent: replyContent,
       },
       success: function(response) {
        $("#loading_inbox").hide();
         console.log(response);
         // location.reload();
       },
       error: function(error) {
        $("#loading_inbox").hide();
         console.error(error);
       }
     });
   } else {
     alert('Editor content is empty!');
   }
   });
   
   
   
</script>
<script type="text/javascript">
   $("#checkAll").click(function() {
     $('input:checkbox').not(this).prop('checked', this.checked);
   });
</script>
<style type="text/css">
   .cke_bottom {
   padding-bottom: 3px;
   display: none;
   }
   .label-danger {
   background-color: #38469f;
   border: 2px solid #38469f;
   }
   #loading-image{
   width: 300px;
   position: relative;
   top: 90px;
   left: 313px;
   }
   .ads{
   max-width: 150px !important;
   white-space: nowrap;
   overflow: hidden;
   text-overflow: ellipsis;
   }
   #driver-popover-item {
   background-color: #38469f !important; 
   }
   .driver-popover-description{
   color: #fff !important;
   }
   .driver-popover-title{
   color: #fff !important;
   }
   .driver-close-btn{
   text-align: center !important;
   background-color: #fff !important;
   color: #000 !important;
   border: 2px solid #fff !important;
   text-shadow: none !important;
   font-size: 14px !important;
   padding: 5px 8px !important;
   border-radius: 6px !important;
   }
   .driver-navigation-btns{
   justify-content: space-between;
   gap: 3px;
   margin-left: 6px;
   }
   .driver-prev-btn{
   flex: 1 !important;
   text-align: center !important;
   background-color: #fff !important;
   color: #000 !important;
   border: 2px solid #fff !important;
   text-shadow: none !important;
   font-size: 14px !important;
   padding: 5px 8px !important;
   border-radius: 6px !important;
   }
   .driver-next-btn{
   flex: 1 !important;
   text-align: center !important;
   background-color: #fff !important;
   color: #000 !important;
   border: 2px solid #fff !important;
   text-shadow: none !important;
   font-size: 14px !important;
   padding: 5px 8px !important;
   border-radius: 6px !important;
   }
   .driver-popover-tip{
   left: -10px;
   top: 10px;
   border-color: transparent #38469f transparent transparent !important;
   }
   .inbox_image{
    border-radius: 0 !important;
   }
</style>
<script>
   var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
   var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';
   
   
     $( document ).ready(function() {
   
       var email = $('#instant_email').submit(function (event) {
   
       var dataString = {
           dataString : $("#instant_email").serialize()
      };
      dataString[csrfName] = csrfHash;
       $.ajax({
           type:"POST",
           // dataType:"json",
           url:"<?php echo base_url(); ?>Cweb_setting/sendemail",
           data:$("#instant_email").serialize(),
           success:function (data) {
               
           }
       });
       event.preventDefault();
   });
   
   });
   
   
   // Email Id send Controller
   
   $( document ).ready(function() {
   
    $('.data_email').click(function (event) {
    var pad_id = $(this).closest('tr').find('#email_id').val();
    var email = $(this).closest('tr').find('#email').val();
    var message = $(this).closest('tr').find('#message').val();
   $.ajax({
       type:"POST",
       // dataType:"json",
       url:"<?php echo base_url(); ?>Cweb_setting/update_email",
       data:{<?php echo $this->security->get_csrf_token_name();?>: csrfHash,pad_id:pad_id,email:email,message:message},
       success:function (data) {
           
       }
   });
   event.preventDefault();
   });
   
   });
   //
   
   $( document ).ready(function() {
   
    $('.inbox_text').click(function (event) {
    var id = $(this).closest('tr').find('#inbox_id').val();
    // alert(id);
   $.ajax({
       type:"POST",
       // dataType:"json",
       url:"<?php echo base_url(); ?>Cweb_setting/inbox_delete",
       data:{<?php echo $this->security->get_csrf_token_name();?>: csrfHash,id:id},
       success:function (data) {
           
       }
   });
   event.preventDefault();
   });
   
   });
   
   
   
   
   $( document ).ready(function() {
    $('.restore_point_one').click(function (event) {
    var id = $(this).closest('tr').find('#restoreone_id').val();
   $.ajax({
       type:"POST",
       // dataType:"json",
       url:"<?php echo base_url(); ?>Cweb_setting/RestoreEmailFirstsentbox",
       data:{<?php echo $this->security->get_csrf_token_name();?>: csrfHash,id:id},
       success:function (data) {
           location.reload();
       }
   });
   event.preventDefault();
   });
   
   });
   
   
   $( document ).ready(function() {
    $('.restore_point_two').click(function (event) {
    var id = $(this).closest('tr').find('#restoretwo_id').val();
   $.ajax({
       type:"POST",
       // dataType:"json",
       url:"<?php echo base_url(); ?>Cweb_setting/RestoreEmailsecondInbox",
       data:{<?php echo $this->security->get_csrf_token_name();?>: csrfHash,id:id},
       success:function (data) {
           location.reload();
       }
   });
   event.preventDefault();
   });
   
   });
   
   
   $( document ).ready(function() {
   
    $('.inboxdelete_email').click(function (event) {
    var id = $(this).closest('tr').find('#inbox_id').val();
   $.ajax({
       type:"POST",
       // dataType:"json",
       url:"<?php echo base_url(); ?>Cweb_setting/Inboxdelete_email",
       data:{<?php echo $this->security->get_csrf_token_name();?>: csrfHash,id:id},
       success:function (data) {
           location.reload();
       }
   });
   event.preventDefault();
   });
   
   });
   
   
   $( document ).ready(function() {
   
    $('.delete_email').click(function (event) {
   
    var id = $(this).closest('tr').find('#delete_id').val();
   
   $.ajax({
       type:"POST",
       // dataType:"json",
       url:"<?php echo base_url(); ?>Cweb_setting/delete_email",
       data:{<?php echo $this->security->get_csrf_token_name();?>: csrfHash,id:id},
       success:function (data) {
           location.reload();
       }
   });
   event.preventDefault();
   });
   
   });
   
   
   var count_value = $('#email_count').val();
   $("#count_app").append(count_value);
   
   
   var sent = $('#sentmsg').val();
   // console.log(sent);
   // alert(sent);
   
   
   
   $("#search").on("keyup", function() {
     var value = $(this).val().toLowerCase();
     // console.log(value);
     $("#live_search tr").filter(function() {
       $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
     });
   });
   
   
   // Search Funcationality
   
   $("#search").on("keyup", function() {
         var value = $(this).val().toLowerCase();
         $(".email_list").filter(function() {
         $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
         });
       });
   
   $(".email_list").click(function () {
       var id = $(this).closest('tr').find('#email_id').val();
       var message = $(this).closest('tr').find('#message').val();
       // var getmessage = preg_replace('/[^A-Za-z0-9\s]/', '', $message);
       // var str = '<tr><td>' + getmessage + '</td></tr>';
       // $("#view_message").html(message);
       if (CKEDITOR.instances['view_message']) {
           CKEDITOR.instances['view_message'].destroy(true);
         }
         CKEDITOR.replace('view_message', {
           // extraPlugins: 'toolbar',
           readOnly: true,
           // startupMode: 'source',
           extraPlugins: 'table,image'
         });
         function htmlEntities(str) {
           return String(str)
           .replace(/&/g, '&amp;')
           .replace(/</g, '&lt;')
           .replace(/>/g, '&gt;')
           .replace(/"/g, '&quot;')
           .replace(/'/g, '&#39;');
         }
         // function formatForEmail(message) {
         //   var formattedMessage = message.replace(/\n/g, '<br>');
         //   return htmlEntities(formattedMessage);
         // }
         var formattedMessage = message.replace(/\n/g, '<br>');
         CKEDITOR.instances['view_message'].setData(formattedMessage);
         $('#INBOX_ID').val(id);
   });
   
    
   
    
   
   $(".alldelete_email").click(function (event) {
     event.preventDefault();
       var Trashid = $(this).closest('tr').find('#trash_id').val();
       $.ajax({
         type:"POST",
         url:"<?php echo base_url(); ?>Cweb_setting/trash_email",
         data:{<?php echo $this->security->get_csrf_token_name();?>: csrfHash,Trashid:Trashid},
         success:function (data) {
           location.reload();
         }
     });
   });
   
   $(".inDatadelete_email").click(function (event) {
     event.preventDefault();
       var inTrashid = $(this).closest('tr').find('#inboxtrash_id').val();
       $.ajax({
         type:"POST",
         url:"<?php echo base_url(); ?>Cweb_setting/inboxDatadelete_email",
         data:{<?php echo $this->security->get_csrf_token_name();?>: csrfHash,inTrashid:inTrashid},
         success:function (data) {
           location.reload();
         }
     });
   });
   
   // $(".click_message").click(function () {
   //     var messageid = $(this).closest('tr').find('#messageid').val();
   //     $.ajax({
   //       type:"POST",
   //       url:"<?php echo base_url(); ?>Cweb_setting/getrelativeInboxData",
   //       data:{<?php echo $this->security->get_csrf_token_name();?>: csrfHash,messageid:messageid},
   //       success:function (data) {
   //         var dataArray = JSON.parse(data);
   //         // console.log(dataArray);
   //         var message = dataArray[0].message;
   //         $("#inbox_message").html(message);
   //       }
   //     });
   //     // var message_str = '<tr><td>' + messageid + '</td></tr>';
   //     // $("#inbox_message").html(message_str);
   // });
   
   CKEDITOR.config.allowedContent = true;
   $(".click_message").click(function () {
     var messageid = $(this).closest('tr').find('#messageid').val();
     var emailAddress = $(this).closest('tr').find('#EMAILADDRESS').val();
     var date = $(this).closest('tr').find('#dateTime').val();
     $.ajax({
       type: "POST",
       url: "<?php echo base_url(); ?>Cweb_setting/getrelativeInboxData",
       data: {
         '<?php echo $this->security->get_csrf_token_name(); ?>': csrfHash,
         messageid: messageid
       },
       success: function (data) {
         var dataArray = JSON.parse(data);
         var message = dataArray[0].message;
         
         if (CKEDITOR.instances['editor']) {
           CKEDITOR.instances['editor'].destroy(true);
         }
         
         CKEDITOR.replace('editor', {
           // extraPlugins: 'toolbar',
           readOnly: true, 
           // startupMode: 'source',
           extraPlugins: 'table,image',
           toolbar: false,
           height: '300px',
         });
   
         CKEDITOR.instances['editor'].setData(message);
         $('#reply_id').val(emailAddress);
         $('#email_addressinbox').html(emailAddress);
         $('#inboxdate').html(date);
       }
     });
   });

   $('.data_email').click(function(){
    $("#loading").show();
    var inbox_id = $('#INBOX_ID').val();
    $.ajax({
      type:"POST",
      url:"<?php echo base_url(); ?>Cweb_setting/fetchAttachments",
      data: {'<?php echo $this->security->get_csrf_token_name(); ?>': csrfHash,inbox_id: inbox_id},
      dataType:"json",
      // beforeSend: function() {
      //   $("#load_img").show();
      // },
      success:function(data){
        $("#loading").hide();
        console.log(data);
        if (data && data[0].files) {
                var base_url = '<?php echo base_url(); ?>';
                var attachmentsArray = data[0].files.split(',');
                var attachmentsHtml = '<div class="file-container row">';
                  var columnCount = 0;

                  $.each(attachmentsArray, function(index, attachment) {
                      var trimmedAttachment = attachment.trim();
                      var encoded_file = encodeURIComponent(trimmedAttachment);
                      var extension = trimmedAttachment.split('.').pop().toLowerCase();

                      attachmentsHtml += '<div class="col-md-3">'; 

                      if (extension === 'pdf') {
                          attachmentsHtml += '<p><a href="' + base_url + 'uploads/email/' + encoded_file + '" target="_blank">' + trimmedAttachment + '</a></p>';
                      } else if (extension === 'jpg' || extension === 'jpeg' || extension === 'png' || extension === 'gif') {
                          attachmentsHtml += '<p><img class="inbox_image" src="' + base_url + 'uploads/email/' + encoded_file + '" alt="' + trimmedAttachment + ' " width="50px;"></p>';
                      } else {
                          attachmentsHtml += '<p><a href="' + base_url + 'uploads/email/' + encoded_file + '" target="_blank">' + trimmedAttachment + '</a></p>';
                      }

                      attachmentsHtml += '</div>'; 

                      columnCount++;

                      if (columnCount === 4) {
                          attachmentsHtml += '</div><div class="file-container row">'; 
                          columnCount = 0; 
                      }
                  });

                  while (columnCount !== 0 && columnCount !== 4) {
                      attachmentsHtml += '<div class="col-md-3"></div>'; 
                      columnCount++;
                  }

                  attachmentsHtml += '</div>'; 

                  console.log(attachmentsHtml); 

                $('.view_attachment').html(attachmentsHtml);
            } else {
                // console.log('No attachments found.'); 
                $('.view_attachment').html('No attachments found');
            }
      },
      error: function(xhr, status, error) {
        console.log(error);
        $("#loading").hide();
      }
           
    });
  });
   
   
   
   // Delete All
   // function valueChanged() {
   //   if ($('.Checkall').is(":checked")) {
   //     $("#DELETE_ALLEMAIL").show();
   //   } else {
   //     $("#DELETE_ALLEMAIL").hide();
   //   }
   // }
   
   
   
</script>
<script>
   function openCity(evt, cityName, id=null) {
     $('#emailid').val(id);
     var i, tabcontent, tablinks;
     tabcontent = document.getElementsByClassName("tabcontent");
     for (i = 0; i < tabcontent.length; i++) {
       tabcontent[i].style.display = "none";
     }
     tablinks = document.getElementsByClassName("tablinks");
     for (i = 0; i < tablinks.length; i++) {
       tablinks[i].className = tablinks[i].className.replace(" active", "");
     }
     document.getElementById(cityName).style.display = "block";
     evt.currentTarget.className += " active";
   }
     // document.getElementById("emailid").value = id;
   
   // Get the element with id="defaultOpen" and click on it
   document.getElementById("defaultOpen").click();
   
   $('li > a').click(function() {
     $('li').removeClass();
     $(this).parent().addClass('active');
   });
   
</script>
<script>
   var csrfName = $('.txt_csrfname').attr('name'); 
   var csrfHash = $('.txt_csrfname').val();
   $(document).ready(function(){
       $("#processEmails").click(function(){
         $.ajax({
           type:"POST",
           url:"<?php echo base_url(); ?>Cweb_setting/download_email",
           data: {[csrfName]: csrfHash},
           dataType:"json",
           beforeSend: function() {
             $("#loading-image").show();
           },
           success:function(data){
             $("#loading-image").hide();
             console.log(data);
             window.location.reload(true);
           },
           error: function(xhr, status, error) {
             $("#loading-image").hide();
             // console.log(error);
           }
           
         });
          // var imageContainer = document.getElementById('imageContainer');
          // var image1 = new Image();
          // image1.onload = function() {
          //   imageContainer.appendChild(image1);
          // };
          // image1.src = 'data:image/png;base64,' + decodedContent;
       });
     });
   
</script>
<script type="text/javascript">
   const stepsCompleted = localStorage.getItem('stepsCompleted');
   if (!stepsCompleted) {
   // Driver JS
    const driver = new Driver({});
   driver.defineSteps([
     {
       element: '.wishIntoroduction',
       popover: {
         title: 'Click here to sync webmail',
         description: 'Explore Projects Here',
         position: 'right',
         highlight: '#ffcc00',
       }
     },
   ]);
   driver.start();
   localStorage.setItem('stepsCompleted', 'true');
   }
   
   
   // CKEDITOR.replace('editor', {
   //   removePlugins: 'toolbar',
   //   readOnly: true 
   // });
</script>
<script type="text/javascript">
   const dt = new DataTransfer(); // Permet de manipuler les fichiers de l'input file
   $("#attachment").on('change', function(e){
       // alert('hi');
       for(var i = 0; i < this.files.length; i++){
           let fileBloc = $('<span/>', {class: 'file-block'}),
                fileName = $('<span/>', {class: 'name', text: this.files.item(i).name});
           fileBloc.append('<span class="file-delete"><span><i class="fa fa-trash-o"></i></span></span>')
               .append(fileName);
           $("#filesList > #files-names").append(fileBloc);
       };
       // Ajout des fichiers dans l'objet DataTransfer
       for (let file of this.files) {
           dt.items.add(file);
       }
       // Mise à jour des fichiers de l'input file après ajout
       this.files = dt.files;
       // EventListener pour le bouton de suppression créé
       $('span.file-delete').click(function(){
           let name = $(this).next('span.name').text();
           // Supprimer l'affichage du nom de fichier
           $(this).parent().remove();
           for(let i = 0; i < dt.items.length; i++){
               // Correspondance du fichier et du nom
               if(name === dt.items[i].getAsFile().name){
                   // Suppression du fichier dans l'objet DataTransfer
                   dt.items.remove(i);
                   continue;
               }
           }
           // Mise à jour des fichiers de l'input file après suppression
           document.getElementById('attachment').files = dt.files;
       });
   });
</script>
<script type="text/javascript">
   function htmlEntities(str) {
       return String(str)
           .replace(/&/g, '&amp;')
           .replace(/</g, '&lt;')
           .replace(/>/g, '&gt;')
           .replace(/"/g, '&quot;')
           .replace(/'/g, '&#39;');
   }
   CKEDITOR.replace('messageeditor', {
       on: {
           instanceReady: function (evt) {
               var editor = evt.editor;
               editor.on('dataReady', function () {
                   var data = editor.getData();
                   data = htmlEntities(data);
                   editor.setData(data);
               });
               editor.on('change', function (evt) {
                   var data = evt.editor.getData();
                   data = data.replace(/<div><br><\/div>/g, '\n');
                   evt.editor.setData(data);
               });
           }
       }
   });
</script>
<!-- <script>
   var csrfName = $('.txt_csrfname').attr('name'); 
   var csrfHash = $('.txt_csrfname').val();
   $(document).ready(function(){
       $(".get_data").click(function(){
         $.ajax({
           type:"POST",
           url:"<?php echo base_url(); ?>Cweb_setting/download_email",
           data: {[csrfName]: csrfHash},
           dataType:"json",
           beforeSend: function() {
             $("#loading-image").show();
           },
           success:function(data){
            console.log(data);
            $('#write_inboxdata').html("");
            $("#loading-image").hide();
            var d = data.date;
            d = d.split(' ')[2];
       
            $('#write_inboxdata').append('<tr class="unread click_message" class="tablinks" data-toggle="modal" data-target="#inboxEmail"><td class="inbox-small-cells"><input type="checkbox" id="checkItem" class="mail-checkbox"></td><td class="inbox-small-cells"><i class="fa fa-star"></i></td><td class="view-message  dont-show">'+data.from[0].personal+'</td> <td class="view-message">'+data.subject+'</td><td><input type="hidden" name="messageid" id="messageid" value=""></td><td class="view-message  text-right">'+d+'</td></tr>');
           }
           
         });
       });
     });
   </script> -->