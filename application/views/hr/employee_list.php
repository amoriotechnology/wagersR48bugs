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
         <h1><?php echo ('Manage Employee') ?></h1>
      </div>
      <small><?php echo "" ?></small>
      <ol class="breadcrumb" style="border: 3px solid #d7d4d6;">
         <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
         <li><a href="#"><?php echo display('hrm') ?></a></li>
         <li class="active" style="color:orange"><?php echo ('Manage Employee') ?></li>
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
               <a href="<?php echo base_url('Chrm/add_employee') ?>" class="btn btnclr dropdown-toggle" style="color:white;border-color: #2e6da4;    height: fit-content;"> <i class="far fa-file-alt"> </i>&nbsp;<?php echo ('Add Employee') ?></a>
               <?php break;}} 
                  if($_SESSION['u_type'] ==2){ ?>
               <a href="<?php echo base_url('Chrm/add_employee') ?>" class="btn btnclr dropdown-toggle" style="border-color: #2e6da4;    height: fit-content;"> <i class="far fa-file-alt"> </i>&nbsp;<?php echo ('Add Employee') ?></a>
               <?php  } ?>
               &nbsp;&nbsp;
               <a  class="btnclr btn btn-default dropdown-toggle  boxes filip-horizontal "  style=" height:fit-content;"  id="s_icon"><b class="fa fa-search"></b>&nbsp;Advance search  </a>
               &nbsp;&nbsp;
               <a  class="btn btnclr dropdown-toggle"  aria-hidden="true"      style="height: fit-content;"  data-toggle="modal" data-target="#designation_modal" ><b class="fa fa-legal"> </b>&nbsp;<?php echo ('Form instructions') ?></a>
               &nbsp;&nbsp;
              <a  class="btn btnclr dropdown-toggle"  aria-hidden="true"      style="height: fit-content;"  href="<?php echo base_url() ?>Chrm/new_employee"  ><b class="fa fa-user"> </b>&nbsp;<?php echo ('New Employee Form') ?></a>
  &nbsp;&nbsp;
         
           <a href="<?php echo base_url('Chrm/hr_tools') ?>" class="btn btnclr dropdown-toggle" style="border-color: #2e6da4;    height: fit-content;"> <i class="far fa-file-alt"> </i>&nbsp;<?php echo ('Hand Book') ?></a>
              &nbsp;&nbsp;
              <a href="<?php echo base_url('chrm/w4form') ?>" class="btn btnclr dropdown-toggle" style="height: fit-content;">W4 Form</a>
               &nbsp;&nbsp;
               <a class="btnclr btn" href="<?php echo base_url('chrm/w9form') ?>" style="height: fit-content;" >W9 Form</a>
               &nbsp;&nbsp;
               <div class="dropdown bootcol" id="drop" style="    width: 300px;">
                  <button class="btnclr btn btn-default dropdown-toggle  boxes filip-horizontal" type="button" id="dropdownMenu1" style="float:left;    height: fit-content;"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" >
                  <span  class="fa fa-download"  ></span> <?php echo display('download') ?>
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                     <li><a href="#" onclick="generate()"> <img src="<?php echo base_url() ?>assets/images/pdf.png" width="24px"> <?php echo display('PDF') ?></a></li>
                     <li class="divider"></li>
                     <li><a href="#" onclick="$('#ProfarmaInvList').tableExport({type:'excel',escape:'false'});"> <img src="<?php echo base_url() ?>assets/images/xls.png" width="24px"> <?php echo display('XLS') ?></a></li>
                  </ul>
                  &nbsp;&nbsp;
               </div>
               <!--&nbsp;&nbsp;-->
               <!--<button type="button"    class="btnclr btn btn-default dropdown-toggle"  style="height: fit-content;"  onclick="printDiv('printableArea')"><b class="ti-printer"></b>&nbsp;<?php echo display('print') ?></button>-->
            </div>
            <div class="col-sm-2" style="float:right;">
               <div class="" style="float: right;">  <a onclick="reload();"  id="removeButton">  <i class="fa fa-refresh fa-spin" style="font-size:25px;float:right;" aria-hidden="true"></i> </a>    &nbsp;    &nbsp;    &nbsp;    &nbsp; <i class="fa fa-gear fa-spin"  aria-hidden="true" id="myBtn" style="margin-right:20px;font-size:25px;float:right;" onClick="columnSwitchMODAL()"></i></div>
            </div>
         </div>
         <br>
         <br> 
         <br> 
         <div id="search_area" style="border:4px solid #004d99;border-radius:7px;">
            <table class="table">
               <thead>
                  <tr class="filters">
                     <th class="search_dropdown" style="width: 22%;">
                        <span><?php echo ('Name') ?> </span>
                        <select id="pname-filter" class="form-control">
                           <option>Any</option>
                           <?php 
                              $first_name  = array();
                              foreach ($employee_data_get as $emp) {
                              $first_name [] = $emp['first_name'];
                              }
                              $unique_first_name  = array_unique($first_name);
                              
                              
                              $designation = array();
                              foreach ($employee_data_get as $emp) {
                              $designation[] = $emp['phone'];
                              }
                              $unique_designation = array_unique($designation);
                              
                              
                              $social_security_number = array();
                              foreach ($employee_data_get as $emp) {
                              $social_security_number[] = $emp['social_security_number'];
                              }
                              $unique_social_security_number = array_unique($social_security_number);
                              
                              
                              $routing_number = array();
                              foreach ($employee_data_get as $emp) {
                              $routing_number[] = $emp['routing_number'];
                              }
                              $unique_routing_number = array_unique($routing_number);
                              
                              
                              $employee_tax = array();
                              foreach ($employee_data_get as $emp) {
                              $employee_tax[] = $emp['employee_tax'];
                              }
                              $unique_employee_tax = array_unique($employee_tax); 
                              
                              
                              
                              
                               foreach($unique_first_name as $empl){  ?>
                           <option value="<?php echo $empl; ?>"><?php echo $empl; ?> </option>
                           <?php }  ?>
                        </select>
                     </th>
                     <th class="search_dropdown" style="width: 22%;">
                        <span>Phone</span>
                        <select id="model-filter" class="form-control">
                           <option>Any</option>
                           <?php foreach($unique_designation as $empl){  ?>
                           <option value="<?php echo $empl; ?>"><?php echo $empl; ?></option>
                           <?php }  ?>
                        </select>
                     </th>
                     <th class="search_dropdown" style="width: 22%;">
                        <span>Social Security Number</span>
                        <select id="category-filter" class="form-control">
                           <option>Any</option>
                           <?php foreach($unique_social_security_number as $empl){  ?>
                           <option value="<?php echo $empl; ?>"><?php echo $empl; ?></option>
                           <?php }  ?>
                        </select>
                     </th>
                     <th class="search_dropdown" style="width: 200px;">
                        <span>Routing Number</span>
                        <select id="unit-filter" class="form-control">
                           <option>Any</option>
                           <?php foreach($unique_routing_number as $empl){  ?>
                           <option value="<?php echo $empl; ?>"><?php echo $empl; ?></option>
                           <?php }  ?>
                        </select>
                     </th>
                     <th class="search_dropdown" style="width: 22%;">
                        <span>Employee Tax</span>
                        <select id="supplier-filter" class="form-control">
                           <option>Any</option>
                           <?php foreach($unique_employee_tax as $empl){  ?>
                           <option value="<?php echo $empl; ?>"><?php echo $empl; ?></option>
                           <?php }  ?>
                        </select>
                     </th>
                  </tr>
               </thead>
            </table>
            <table>
               <tr>
                  <td style="width:10px;"></td>
                  <td style="width:22%;">   <input type="text" class="form-control" id="myInput1" onkeyup="search()" placeholder="Search for Name.."></td>
                  <td style="width:10px;"></td>
                  <td style="width:22%;"> <input type="text" class="form-control" id="myInput2" onkeyup="search()" placeholder="Search for Phone.."></td>
                  <td style="width:10px;"></td>
                  <td style="width:20%;">  <input type="text" class="form-control" id="myInput3" onkeyup="search()" placeholder="Search for   Social Security Number.."></td>
                  <td style="width:10px;"></td>
                  <td style="width:20%;"> <input type="text" class="form-control" id="myInput4" onkeyup="search()" placeholder="Search for   Routing Number.."></td>
                  <td style="width:10px;"></td>
                  <td style="width: 203px;"> <input type="text" class="form-control" id="myInput5" onkeyup="search()" placeholder="Search for Employee Tax.."></td>
               </tr>
            </table>
            <br/>
            <div class="col-sm-12">
               <input id="search" type="text" class="form-control"  placeholder="Search for Employee.">
               <br>
            </div>
            <br>
         </div>
      </div>
   </div>
   <!-- Manage Invoice report -->
   <div class="row">
   <div class="col-sm-12"  >
   <div class="panel panel-bd lobidrag"     style="border: 3px solid #d7d4d6;">
   <div class="panel-heading"  style="border-color:white;" >
      <div class="row"   style="height:0px;">
         <input type="hidden" class="txt_csrfname" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
         <div id="for_filter_by" class="for_filter_by" style="display: inline;margin-right: 13px;">
            <label for="filter_by"> <?php echo display('Filter By') ?> &nbsp;&nbsp;
            </label>
            <select id="filterby" style="border-radius:5px;height:25px;width: 150px;">
               <option value="1"><?php echo display('Sl') ?></option>
               <option value="2"><?php echo display('Name') ?></option>
               <option value="3"><?php echo ('Designation') ?></option>
               <option value="4"><?php echo ('Phone') ?></option>
               <option value="5"><?php echo ('Email') ?></option>
               <option value="6"><?php echo ('Payment Type') ?></option>
               <option value="7"><?php echo ('Blood Group') ?></option>
               <option value="8"><?php echo ('Social Security Number') ?></option>
               <option value="9"><?php echo ('Routing Number') ?></option>
               <option value="10"><?php echo ('Employee Tax') ?></option>
            </select>
            <input id="filterinput" style="height:25px;margin-bottom: 0px;" type="text"> 
         </div>
      </div>
   </div>
   <div class="panel-body" style="padding-top: 0px;">
      <div class="sortableTable__container">
         <div class="sortableTable__discard">
         </div>
         <div id="customers">
            <table class="table table-bordered" cellspacing="0" width="100%" id="ProfarmaInvList">
               <thead class="sortableTable">
                  <tr class="sortableTable__header btnclr">
                     <th class="1 value"  data-col="1"  data-resizable-column-id="1"    ><?php echo display('sl') ?></th>
                     <th class="2 value"  data-col="2"  data-resizable-column-id="2"    ><?php echo display('name') ?></th>
                     <th class="3 value"  data-col="3"  data-resizable-column-id="3"   ><?php echo display('designation') ?></th>
                     <th class="4 value"  data-col="4"  data-resizable-column-id="4"   ><?php echo display('phone') ?></th>
                     <th class="5 value"  data-col="5"  data-resizable-column-id="5"   ><?php echo display('email') ?></th>
                     <th class="6 value"  data-col="6"  data-resizable-column-id="6" ><?php echo  ('Payment Type') ?></th>
                     <th class="7 value"  data-col="7"  data-resizable-column-id="7" ><?php echo  ('Blood Group') ?></th>
                     <th class="8 value"  data-col="8"  data-resizable-column-id="8" ><?php echo ('Social Security Number') ?></th>
                     <th class="9 value"  data-col="9"  data-resizable-column-id="9" ><?php echo ('Routing Number') ?></th>
                     <th class="10 value"  data-col="10"  data-resizable-column-id="10" ><?php echo ('Employee Tax') ?></th>
                     <th class="11 value"  data-col="11"  data-resizable-column-id="11" ><?php echo display('picture') ?></th>
                     <th class="12 value"  data-col="12"  data-resizable-column-id="12"><?php echo display('action') ?></th>
                  </tr>
               </thead>
               <tbody class="sortableTable__body" id="tab">
                  <?php
                     if ($employee_list) {
                     
                         ?>
                  <?php
                     $sl = 1;
                     
                      foreach($employee_list as $employees){?>
                  <tr id="task-<?php echo $i; ?>"
                     class="task-list-row"
                     data-task-id="<?php echo $i; ?>"    
                     data-pname="<?php echo   $employees['first_name'] ; ?>"
                     data-model="<?php echo $employees['phone']; ?>"
                     data-category="<?php echo $employees['social_security_number']; ?>"
                     data-unit="<?php echo $employees['routing_number']; ?>"
                     data-supplier="<?php echo $employees['employee_tax']; ?>">
                     <td class="1 value" data-col="1" style="text-align:center;" ><?php echo $sl;?></td>
                     <td class="2 value"  data-col="2" style="text-align:center;" >  
                        <?php echo isset($employees['first_name']) ? $employees['first_name'] . " " : ""; ?>
                        <?php echo isset($employees['middle_name']) ? $employees['middle_name'] . " " : ""; ?>
                        <?php echo isset($employees['last_name']) ? $employees['last_name'] : ""; ?> 
                     </td>
                     <td class="3 value"  data-col="3" style="text-align:center;" ><?php echo html_escape($employees['designation']);?></td>
                     <td class="4 value"  data-col="4" style="text-align:center;" ><?php echo html_escape($employees['phone']);?></td>
                     <td class="5 value"  data-col="5" style="text-align:center;"  ><?php echo html_escape($employees['email']);?></td>
                     <td class="11 value"  data-col="11">
                        <?php if(empty($employees['profile_image'])){ ?> 
                        <p>No Selected Files</p>
                        <?php }else{ ?> 
                        <img src="<?php  echo base_url(); ?>uploads/<?php echo $employees['profile_image']; ?>" height="60px" width="80px">
                     </td>
                     <?php } ?>
                     </td>
                     <td class="6 value"  style="text-align:center;"  data-col="6"><?php echo html_escape($employees['rate_type']);?></td>
                     <td class="7 value"  style="text-align:center;"  data-col="7"><?php echo html_escape($employees['blood_group']);?></td>
                     <td class="8 value"  style="text-align:center;"  data-col="8"><?php echo html_escape($employees['social_security_number']);?></td>
                     <td class="9 value" style="text-align:center;"  data-col="9"><?php echo html_escape($employees['routing_number']);?></td>
                     <td class="10 value" style="text-align:center;"  data-col="10"><?php echo html_escape($employees['employee_tax']);?></td>
                     <td class="12 value"  data-col="12" >
                        <center>
                           <?php echo form_open() ?>
                           <a href="<?php echo base_url('Chrm/employee_details/'.$employees['id']);?>" class="btnclr btn m-b-5 m-r-2"><i class="fa fa-user"></i></a>
                           <a class="btnclr btn m-b-5 m-r-2" href="<?php echo base_url('Chrm/timesheed_inserted_data/'.$employees['id'])?>"><i class="fa fa-download" aria-hidden="true"></i></a>
                           <?php    foreach(  $this->session->userdata('perm_data') as $test){
                              $split=explode('-',$test);
                              if(trim($split[0])=='hrm' && $_SESSION['u_type'] ==3 && trim($split[1])=='0010'){
                                
                                
                                 ?>
                           <a href="<?php echo base_url() . 'Chrm/employee_update_form/'.$employees['id']; ?>" class="btnclr btn m-b-5 m-r-2" data-toggle="tooltip" data-placement="left" title="<?php echo display('update') ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                           <?php break;}} 
                              if($_SESSION['u_type'] ==2){ ?>
                           <a href="<?php echo base_url() . 'Chrm/employee_update_form/'.$employees['id']; ?>" class="btnclr btn m-b-5 m-r-2" data-toggle="tooltip" data-placement="left" title="<?php echo display('update') ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                           <?php  } ?>
                           <?php    foreach(  $this->session->userdata('perm_data') as $test){
                              $split=explode('-',$test);
                              if(trim($split[0])=='hrm' && $_SESSION['u_type'] ==3 && trim($split[1])=='0001'){
                                
                                
                                 ?>
                           <a href="<?php echo base_url('Chrm/employee_delete/'.$employees['id']) ?>" class="btnclr btn m-b-5 m-r-2" onclick="return confirm('<?php echo display('are_you_sure') ?>')" data-toggle="tooltip" data-placement="right" title="" data-original-title="<?php echo display('delete') ?> "><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                           <?php break;}} 
                              if($_SESSION['u_type'] ==2){ ?>
                           <a href="<?php echo base_url('Chrm/employee_delete/'.$employees['id']) ?>" class="btnclr btn m-b-5 m-r-2" onclick="return confirm('<?php echo display('are_you_sure') ?>')" data-toggle="tooltip" data-placement="right" title="" data-original-title="<?php echo display('delete') ?> "><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                           <?php  } ?>
                           <?php echo form_close() ?>
                        </center>
                     </td>
                  </tr>
                  <?php
                     $sl++;
                     
                     }}else{
                     
                     ?>
                  <tr>
                     <td style="text-align:center;" colspan="9">No Records Found</td>
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
      <div id="myModal_colSwitch"  name="mymanageemployeeName"      class="modal_colSwitch" >
         <div class="modal-content_colSwitch" style="width:35%;height:25%;">
            <span class="close_colSwitch">&times;</span>
            <div class="col-sm-1" ></div>
            <div class="col-sm-3" >
               <br>
               <div class="form-group row"  >
                  <br><input type="checkbox"  data-control-column="1"  class="1"  value="1"/>&nbsp; <?php echo display('Sl')?><br>
                  <!-- <br><input type="checkbox"  data-control-column="2"  class="2"  value="2"/>&nbsp;<?php echo display('name')?><br> -->
                  <!-- <br><input type="checkbox"  data-control-column="3"  class="3"   value="3"/>&nbsp;<?php echo display('designation')?><br> -->
                  <!-- <br><input type="checkbox"  data-control-column="4"  class="4"   value="4"/>&nbsp;<?php echo display('phone')?><br> -->
                  <br><input type="checkbox"  data-control-column="7"  class="7"   value="7"/>&nbsp;<?php echo ('Blood Group')?><br>
                  <br><input type="checkbox"  data-control-column="5"  class="5"  value="5"/>&nbsp;<?php echo display('email')?><br>
               </div>
            </div>
            <div class="col-sm-4"  >
               <br>
               <div class="form-group row"  >
                  <!-- <br><input type="checkbox"  data-control-column="6"  class="6"   value="6"/>&nbsp;Rate Type<br> -->
                  <br><input type="checkbox"  data-control-column="8"  class="8"   value="8"/>&nbsp;<?php echo ('Social Security Number')?><br>
                  <br><input type="checkbox"  data-control-column="9"  class="9"   value="9"/>&nbsp;<?php echo ('Routing Number')?><br>
                  <br><input type="checkbox"  data-control-column="10"  class="10"   value="10"/>&nbsp;<?php echo ('Employee Tax')?><br>
               </div>
            </div>
            <div class="col-sm-3"  >
               <br>
               <div class="form-group row"  >
                  <br><input type="checkbox"  data-control-column="11"  class="11"   value="11"/>&nbsp;<?php echo display('picture')?><br>
                  <!-- <br><input type="checkbox"  data-control-column="12"  class="12"   value="12"/>&nbsp;<?php echo display('action')?><br> -->
               </div>
            </div>
         </div>
      </div>
</section>
<!------ add new designation_modal -->  
<div class="modal fade" id="designation_modal" role="dialog">
<div class="modal-dialog" role="document" style="margin-right: 900px;">
<div class="modal-content" style="width: 1200px;text-align:center;">
<div class="modal-header btnclr" >
<a href="#" class="close" data-dismiss="modal">&times;</a>
<h4 class="modal-title"><?php echo ('Form instructions') ?></h4>
</div>
<div class="modal-body">
<div id="customeMessage" class="alert hide"></div>
<form id="add_designation" method="post">
<div class="panel-body">
<input type ="hidden" name="csrf_test_name" id="" value="<?php echo $this->security->get_csrf_hash();?>">
<div class="form-group row">
<section class="content content_instuc" id="instuc_p1"> 
<!-- form instructions -->
<div class="row">
<div class="col-sm-12">
<div class="panel panel-bd lobidrag">
<div class="panel-body">
<div class="instuc_text row">
<div class="col-md-6">
<h3>General Instruction</h3>
<p>Section references are to the Internal Revenue Code.</p>
<div class="para-text">
<h4>Future Developments</h4>
<p>For the latest information about developments related to 
Form W-4, such as legislation enacted after it was published, 
go to www.irs.gov/FormW4</p>
<h4>Purpose of Form</h4>
<p>Complete Form W-4 so that your employer can withhold the 
correct federal income tax from your pay. If too little is 
withheld, you will generally owe tax when you file your tax 
return and may owe a penalty. If too much is withheld, you 
will generally be due a refund. Complete a new Form W-4 
when changes to your personal or financial situation would 
change the entries on the form. For more information on 
withholding and when you must furnish a new Form W-4, 
see Pub. 505, Tax Withholding and Estimated Tax. </p>
<p><strong>Exemption from withholding. </strong>You may claim exemption 
from withholding for 2022 if you meet both of the following 
conditions: you had no federal income tax liability in 2021 
and you expect to have no federal income tax liability in 
2022. You had no federal income tax liability in 2021 if (1) 
your total tax on line 24 on your 2021 Form 1040 or 1040-SR 
is zero (or less than the sum of lines 27a, 28, 29, and 30), or 
(2) you were not required to file a return because your 
income was below the filing threshold for your correct filing 
status. If you claim exemption, you will have no income tax 
withheld from your paycheck and may owe taxes and 
penalties when you file your 2022 tax return. To claim 
exemption from withholding, certify that you meet both of 
the conditions above by writing “Exempt” on Form W-4 in 
the space below Step 4(c). Then, complete Steps 1(a), 1(b), 
and 5. Do not complete any other steps. You will need to 
submit a new Form W-4 by February 15, 2023.</p>
<p></strong>Your privacy.</strong> If you prefer to limit information provided in 
Steps 2 through 4, use the online estimator, which will also 
increase accuracy.</p>
<p>As an alternative to the estimator: if you have concerns 
with Step 2(c), you may choose Step 2(b); if you have 
concerns with Step 4(a), you may enter an additional amount 
you want withheld per pay period in Step 4(c). If this is the 
only job in your household, you may instead check the box 
in Step 2(c), which will increase your withholding and 
significantly reduce your paycheck (often by thousands of 
dollars over the year).</p>
<p><strong>When to use the estimator.</strong> Consider using the estimator at
www.irs.gov/W4App if you:</p>
<ol>
<li> Expect to work only part of the year;</li>
<li>Have dividend or capital gain income, or are subject to 
additional taxes, such as Additional Medicare Tax;</li>
<li> Have self-employment income (see below); or</li>
<li>Prefer the most accurate withholding for multiple job 
situations</li>
</ol>
<p><strong>Self-employment. </strong>Generally, you will owe both income and 
self-employment taxes on any self-employment income you 
receive separate from the wages you receive as an 
employee. If you want to pay these taxes through 
withholding from your wages, use the estimator at 
www.irs.gov/W4App to figure the amount to have withheld.</p>
<p><strong>Nonresident alien.</strong> If you’re a nonresident alien, see Notice 
1392, Supplemental Form W-4 Instructions for Nonresident 
Aliens, before completing this form.</p>
</div>
</div>
<div class="col-md-6">
<h3>Specific Instructions</h3>
<div class="para-text">
<p><strong>Step 1(c). </strong>Check your anticipated filing status. This will 
determine the standard deduction and tax rates used to 
compute your withholding.</p>
<p></strong>Step 2.</strong> Use this step if you (1) have more than one job at the 
same time, or (2) are married filing jointly and you and your 
spouse both work.</p>
<p>Option <b>(a)</b> most accurately calculates the additional tax 
you need to have withheld, while option <b>(b)</b> does so with a 
little less accuracy. </p>
<p>If you (and your spouse) have a total of only two jobs, you 
may instead check the box in option (c). The box must also 
be checked on the Form W-4 for the other job. If the box is 
checked, the standard deduction and tax brackets will be 
cut in half for each job to calculate withholding. This option 
is roughly accurate for jobs with similar pay; otherwise, more 
tax than necessary may be withheld, and this extra amount 
will be larger the greater the difference in pay is between the 
two jobs</p>
<img src="" alt="">
<p><strong>Multiple jobs.</strong> Complete Steps 3 through 4(b) on only 
one Form W-4. Withholding will be most accurate if 
you do this on the Form W-4 for the highest paying job.</p>
<p><strong>Step 3.</strong> This step provides instructions for determining the 
amount of the child tax credit and the credit for other 
dependents that you may be able to claim when you file your 
tax return. To qualify for the child tax credit, the child must 
be under age 17 as of December 31, must be your 
dependent who generally lives with you for more than half 
the year, and must have the required social security number. 
You may be able to claim a credit for other dependents for 
whom a child tax credit can’t be claimed, such as an older 
child or a qualifying relative. For additional eligibility 
requirements for these credits, see Pub. 501, Dependents, 
Standard Deduction, and Filing Information. You can also 
include other tax credits for which you are eligible in this 
step, such as the foreign tax credit and the education tax 
credits. To do so, add an estimate of the amount for the year 
to your credits for dependents and enter the total amount in 
Step 3. Including these credits will increase your paycheck 
and reduce the amount of any refund you may receive when 
you file your tax return.</p>
<strong>Step 4 (optional).</strong>
<p><strong>Step 4(a).</strong> Enter in this step the total of your other 
estimated income for the year, if any. You shouldn’t include 
income from any jobs or self-employment. If you complete 
Step 4(a), you likely won’t have to make estimated tax 
payments for that income. If you prefer to pay estimated tax 
rather than having tax on other income withheld from your 
paycheck, see Form 1040-ES, Estimated Tax for Individuals.</p>
<p></strong>Step 4(b). </strong>Enter in this step the amount from the 
Deductions Worksheet, line 5, if you expect to claim 
deductions other than the basic standard deduction on your 
2022 tax return and want to reduce your withholding to 
account for these deductions. This includes both itemized 
deductions and other deductions such as for student loan 
interest and IRAs</p>
<p><strong>Step 4(c). </strong>Enter in this step any additional tax you want 
withheld from your pay each pay period, including any 
amounts from the Multiple Jobs Worksheet, line 4. Entering 
an amount here will reduce your paycheck and will either 
increase your refund or reduce any amount of tax that you 
owe</p>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<section class="content content_instuc" id="instuc_p2">
<!-- form instructions -->
<div class="row">
<div class="col-sm-12">
<div class="panel panel-bd lobidrag">
<!-- <div class="panel-heading">
   <div class="panel-title">
   
       <h4>Form instructions</h4>
   
   </div>
   
   </div> -->
<div class="panel-body">
<h4 class="instuc_title">Step 2(b)—Multiple Jobs Worksheet<span> (Keep for your records.)</span></h4>
<div class="instru-text">
<p>If you choose the option in Step 2(b) on Form W-4, complete this worksheet (which calculates the total extra tax for all jobs) on only ONE
Form W-4. Withholding will be most accurate if you complete the worksheet and enter the result on the Form W-4 for the highest paying job</p>
<p><strong>Note: </strong>If more than one job has annual wages of more than $120,000 or there are more than three jobs, see Pub. 505 for additional 
tables; or, you can use the online withholding estimator at www.irs.gov/W4App.</p>
<div class="wagesList">
<ol>
<div class="w_price2">
<li>Two jobs. If you have two jobs or you’re married filing jointly and you and your spouse each have one
job, find the amount from the appropriate table on page 4. Using the “Higher Paying Job” row and the
“Lower Paying Job” column, find the value at the intersection of the two household salaries and enter 
that value on line 1. Then, skip to line 3 . . . . . . . . . . . . . . . . . . . . .</li>
<form>
<label for="price">1</label>
<input type="text" id="wages_price" name="price" placeholder="$">
</form>
</div>
<br>
<li>Three jobs. If you and/or your spouse have three jobs at the same time, complete lines 2a, 2b, and 
2c below. Otherwise, skip to line 3.</li>
<br>
<ol type="a">
<div class="w_price2">
<li>Find the amount from the appropriate table on page 4 using the annual wages from the highest 
paying job in the “Higher Paying Job” row and the annual wages for your next highest paying job
in the “Lower Paying Job” column. Find the value at the intersection of the two household salaries 
and enter that value on line 2a . . . . . . . . . . . . . . . . . . . . . . . </li>
<form>
<label for="price">2a</label>
<input type="text" id="wages_price" name="price" placeholder="$">
</form>
</div>
<br>
<div class="w_price2">
<li>Find the amount from the appropriate table on page 4 using the annual wages from the highest 
paying job in the “Higher Paying Job” row and the annual wages for your next highest paying job
in the “Lower Paying Job” column. Find the value at the intersection of the two household salaries 
and enter that value on line 2a . . . . . . . . . . . . . . . . . . . . . . . </li>
<form>
<label for="price">2b</label>
<input type="text" id="wages_price" name="price" placeholder="$">
</form>
</div>
<br>
<div class="w_price2">
<li>Find the amount from the appropriate table on page 4 using the annual wages from the highest 
paying job in the “Higher Paying Job” row and the annual wages for your next highest paying job
in the “Lower Paying Job” column. Find the value at the intersection of the two household salaries 
and enter that value on line 2a . . . . . . . . . . . . . . . . . . . . . . . </li>
<form>
<label for="price">2c</label>
<input type="text" id="wages_price" name="price" placeholder="$">
</form>
</div>
<br>
</ol>
<div class="w_price2">
<li>Find the amount from the appropriate table on page 4 using the annual wages from the highest 
paying job in the “Higher Paying Job” row and the annual wages for your next highest paying job
in the “Lower Paying Job” column. Find the value at the intersection of the two household salaries 
and enter that value on line 2a . . . . . . . . . . . . . . . . . . . . . . . </li>
<form>
<label for="price">3</label>
<input type="text" id="wages_price" name="price" placeholder="$">
</form>
</div>
<br>
<div class="w_price2">
<li>Find the amount from the appropriate table on page 4 using the annual wages from the highest 
paying job in the “Higher Paying Job” row and the annual wages for your next highest paying job
in the “Lower Paying Job” column. Find the value at the intersection of the two household salaries 
and enter that value on line 2a . . . . . . . . . . . . . . . . . . . . . . . </li>
<form>
<label for="price">4</label>
<input type="text" id="wages_price" name="price" placeholder="$">
</form>
</div>
<br>
</ol>
</div>
</div>
</div>
<div class="panel-body">
<h4 class="instuc_title">Step 4(b)—Deductions Worksheet<span> (Keep for your records.)</span></h4>
<div class="instru-text">
<div class="wagesList">
<ol>
<div class="w_price2">
<li>Enter an estimate of your 2022 itemized deductions (from Schedule A (Form 1040)). Such deductions
may include qualifying home mortgage interest, charitable contributions, state and local taxes (up to 
$10,000), and medical expenses in excess of 7.5% of your income . . . . . . . . . . . . </li>
<form>
<label for="price">1</label>
<input type="text" id="wages_price" name="price" placeholder="$">
</form>
</div>
<br>
<div class="w_price2">
<li>If line 1 is greater than line 2, subtract line 2 from line 1 and enter the result here. If line 2 is greater 
than line 1, enter “-0-” . . . . . . . . . . . . . . . . . . . . . . . . . . </li>
<form>
<label for="price">2</label>
<input type="text" id="wages_price" name="price" placeholder="$">
</form>
</div>
<br>
<div class="w_price2">
<li>Enter an estimate of your student loan interest, deductible IRA contributions, and certain other 
adjustments (from Part II of Schedule 1 (Form 1040)). See Pub. 505 for more information . . . . </li>
<form>
<label for="price">3</label>
<input type="text" id="wages_price" name="price" placeholder="$">
</form>
</div>
<br>
<div class="w_price2">
<li>Add lines 3 and 4. Enter the result here and in Step 4(b) of Form W-4 . . . . . . . . . . .</li>
<form>
<label for="price">4</label>
<input type="text" id="wages_price" name="price" placeholder="$">
</form>
</div>
<br>
</ol>
</div>
</div>
<div class="instruc_bottom2">
<div class="col-md-6">
<p><strong>Privacy Act and Paperwork Reduction Act Notice.</strong> We ask for the information 
on this form to carry out the Internal Revenue laws of the United States. Internal 
Revenue Code sections 3402(f)(2) and 6109 and their regulations require you to 
provide this information; your employer uses it to determine your federal income 
tax withholding. Failure to provide a properly completed form will result in your 
being treated as a single person with no other entries on the form; providing 
fraudulent information may subject you to penalties. Routine uses of this 
information include giving it to the Department of Justice for civil and criminal 
litigation; to cities, states, the District of Columbia, and U.S. commonwealths and 
possessions for use in administering their tax laws; and to the Department of 
Health and Human Services for use in the National Directory of New Hires. We 
may also disclose this information to other countries under a tax treaty, to federal 
and state agencies to enforce federal nontax criminal laws, or to federal law 
enforcement and intelligence agencies to combat terrorism.</p>
</div>
<div class="col-md-6">
<p>You are not required to provide the information requested on a form that is 
subject to the Paperwork Reduction Act unless the form displays a valid OMB 
control number. Books or records relating to a form or its instructions must be 
retained as long as their contents may become material in the administration of 
any Internal Revenue law. Generally, tax returns and return information are 
confidential, as required by Code section 6103.</p> 
<p>The average time and expenses required to complete and file this form will vary 
depending on individual circumstances. For estimated averages, see the 
instructions for your income tax return.</p>
<p>If you have suggestions for making this form simpler, we would be happy to hear 
from you. See the instructions for your income tax return.</p>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
</div>
</div>
</div>
<div class="modal-footer">
<a href="#" class="btn btnclr" style="color:white;" data-dismiss="modal"><?php echo display('Close') ?> </a>
</div>
</form>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script src="<?php echo base_url()?>assets/js/jquery.bootgrid.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.0.0-alpha.1/jspdf.plugin.autotable.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
<div id="myModal_colSwitch"  name="mymanageemployeeName"      class="modal_colSwitch" >
<div class="modal-content_colSwitch" style="width:35%;height:25%;">
<span class="close_colSwitch">&times;</span>
<div class="col-sm-1" ></div>
<div class="col-sm-3" ><br>
<div class="form-group row"  > 
<br><input type="checkbox"  data-control-column="1"  class="1"  value="1"/>&nbsp; <?php echo display('Sl')?><br>
<!-- <br><input type="checkbox"  data-control-column="2"  class="2"  value="2"/>&nbsp;<?php echo display('name')?><br> -->
<!-- <br><input type="checkbox"  data-control-column="3"  class="3"   value="3"/>&nbsp;<?php echo display('designation')?><br> -->
<!-- <br><input type="checkbox"  data-control-column="4"  class="4"   value="4"/>&nbsp;<?php echo display('phone')?><br> -->
<br><input type="checkbox"  data-control-column="7"  class="7"   value="7"/>&nbsp;<?php echo ('Blood Group')?><br>
<br><input type="checkbox"  data-control-column="5"  class="5"  value="5"/>&nbsp;<?php echo display('email')?><br>
</div>
</div>
<div class="col-sm-4"  ><br>
<div class="form-group row"  >
<!-- <br><input type="checkbox"  data-control-column="6"  class="6"   value="6"/>&nbsp;Rate Type<br> -->
<br><input type="checkbox"  data-control-column="8"  class="8"   value="8"/>&nbsp;<?php echo ('Social Security Number')?><br>
<br><input type="checkbox"  data-control-column="9"  class="9"   value="9"/>&nbsp;<?php echo ('Routing Number')?><br>
<br><input type="checkbox"  data-control-column="10"  class="10"   value="10"/>&nbsp;<?php echo ('Employee Tax')?><br>
</div>
</div>
<div class="col-sm-3"  ><br>
<div class="form-group row"  >
<br><input type="checkbox"  data-control-column="11"  class="11"   value="11"/>&nbsp;<?php echo display('picture')?><br>
<!-- <br><input type="checkbox"  data-control-column="12"  class="12"   value="12"/>&nbsp;<?php echo display('action')?><br> -->
</div>
</div>
</div>
</div>
</section>
</div>
<script>
   //                 $("input:checkbox:not(:checked)").each(function() {
   //     var column = "table ." + $(this).attr("value");
   //     console.log("Heyy : "+column);
   //     $(column).hide();
   // });
   
   // $("input:checkbox").click(function(){
   //     var column = "table ." + $(this).attr("value");
   //       console.log("Heyy : "+column);
   //     $(column).toggle();
   // });
   
   
   $(document).ready(function() {
       $("input:checkbox").each(function() {
           var empform = "table ." + $(this).attr("value");
           var isChecked = localStorage.getItem(empform) === "true";
           $(this).prop("checked", isChecked);
           $(empform).toggle(isChecked); // Show/hide based on the stored state
       });
       });
       // When a checkbox is clicked, update localStorage and toggle column visibility
       $("input:checkbox").click(function() {
           var empform = "table ." + $(this).attr("value");
           var isChecked = $(this).is(":checked");
           localStorage.setItem(empform, isChecked); // Store checkbox state in localStorage
           $(empform).toggle(isChecked); // Show/hide based on the clicked state
       });
   
   
   
   
   
   $('#cmd').click(function() {
   
   var pdf = new jsPDF('p','pt','a4');
   $('#for_numrows,#pagesControllers').hide();
     const invoice = document.getElementById("printableArea");
              console.log(invoice);
              console.log(window);
              var pageWidth = 8.5;
              var margin=0.5;
              var opt = {
    lineHeight : 1.2,
    margin : 0.2,
    maxLineWidth : pageWidth - margin *1,
                  filename: 'tax_details'+'.pdf',
                  allowTaint: true,
                  html2canvas: { scale: 3 },
                  jsPDF: { unit: 'in', format: 'a4', orientation: 'portrait' }
              };
               html2pdf().from(invoice).set(opt).toPdf().get('pdf').then(function (pdf) {
   var totalPages = pdf.internal.getNumberOfPages();
   for (var i = 1; i <= totalPages; i++) {
     pdf.setPage(i);
     pdf.setFontSize(10);
     pdf.setTextColor(150);
   }
   }).save('Time_sheet.pdf');
     setTimeout( function(){
       $('#for_numrows,#pagesControllers').show();
     }, 4500 );
   });
   
   
   
   
   
   
   
   
   
   $(document).on('keyup', '#filterinput', function(){
     
     var value = $(this).val().toLowerCase();
     var filter=$("#filterby").val();
     $("#ProfarmaInvList tr:not(:eq(0))").filter(function() {
         $(this).toggle($(this).find("td."+filter).text().toLowerCase().indexOf(value) > -1)
     });
   });
   
   
   
   
   
   
   function reload(){
       location.reload();
   }
    var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
   var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';
   $editor = $('#submit'),
     $editor.on('click', function(e) {
       if (this.checkValidity && !this.checkValidity()) return;
       e.preventDefault();
       var yourArray = [];
                   $('.modal-content_colSwitch input[type=checkbox]:not(:checked)').each(function() {
         yourArray.push($(this).val());//push value in array
       });
       
       values = {
       
       extralist_text: yourArray
     
     };
     console.log(values)
     var json=values;
     var data = {
         page:$('#url').val(),
           content: yourArray
        
        };
        data[csrfName] = csrfHash;
   $.ajax({
     
     type: "POST",  
     url:'<?php echo base_url();?>Cinvoice/setting',
    
     data: data,
     dataType: "json", 
     success: function(data) {
         if(data) {
            console.log(data);
         }
     }  
   });
   });
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   $(document).ready(function(){
       $('#search_area').hide();
      });
      $('#s_icon').click(function(){
          $('#search_area').toggle();
      });
      
      
      $("#search").on("keyup", function() {
      var value = $(this).val().toLowerCase();
       $("#ProfarmaInvList tr:not(:eq(0))").filter(function() {
      
       $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
      });
      
   
   
       function search() {
      var input_pname,
       input_model,
       input_category,
       input_unit,
       input_supplier,
      
       filter_pname,filter_model,filter_category,filter_unit,filter_supplier,
       table,
       tr,
       td,
       i,
      
      input_pname = document.getElementById("myInput1");
      input_model = document.getElementById("myInput2");
      input_category = document.getElementById("myInput3");
      input_unit = document.getElementById("myInput4");
      input_supplier = document.getElementById("myInput5");
      
      filter_pname = input_pname.value.toUpperCase();   
      filter_model = input_model.value.toUpperCase();
      filter_category = input_category.value.toUpperCase();    
      filter_unit = input_unit.value.toUpperCase();
      filter_supplier = input_supplier.value.toUpperCase();
      
      
      
      table = document.getElementById("ProfarmaInvList");
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
       
         td = tr[i].getElementsByTagName("td")[1];
       td1 = tr[i].getElementsByTagName("td")[3];
       td2 = tr[i].getElementsByTagName("td")[7];
       td3 = tr[i].getElementsByTagName("td")[8];
       td4 = tr[i].getElementsByTagName("td")[9];
   
   
   
   
       if (td && td1 && td2 && td3 && td4) {
         input_pname = (td.textContent || td.innerText).toUpperCase();
         input_model = (td1.textContent || td1.innerText).toUpperCase();
         input_category = (td2.textContent || td2.innerText).toUpperCase();
         // alert('jki');
         input_unit = (td3.textContent || td3.innerText).toUpperCase();
         input_supplier = (td4.textContent || td4.innerText).toUpperCase();
         if (
           input_pname.indexOf(filter_pname) > -1 &&
           input_model.indexOf(filter_model) > -1 &&
           input_category.indexOf(filter_category) > -1 &&
           input_unit.indexOf(filter_unit) > -1 &&
           input_supplier.indexOf(filter_supplier) > -1
         ) {
           tr[i].style.display = "";
         } else {
           tr[i].style.display = "none";
         }
       }
      }
      }
      
   
   
   
    
      $("#search").on("keyup", function() {
      var value = $(this).val().toLowerCase();
       $("#ProfarmaInvList tr:not(:eq(0))").filter(function() {
      
       $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
      });
      
      
      
       var
     filters = {
       user: null,
       status: null,
       milestone: null,
       priority: null,
       tags: null
     };
   
   
   
    
   
   
      function updateFilters() {
     $('.task-list-row').hide().filter(function() {
       var
         self = $(this),
         result = true; // not guilty until proven guilty
       
       Object.keys(filters).forEach(function (filter) {
         if (filters[filter] && (filters[filter] != 'None') && (filters[filter] != 'Any')) {
           result = result && filters[filter] == self.data(filter);
         
         }
       });
   
       return result;
     }).show();
   }
   
   
       function changeFilter(filterName) {
     filters[filterName] = this.value;
     updateFilters();
   }
         
       // Assigned User Dropdown Filter
       $('#pname-filter').on('change', function() {
           // alert('hi');
         changeFilter.call(this, 'pname');
       });
       
       // Task Status Dropdown Filter
       $('#model-filter').on('change', function() {
         changeFilter.call(this, 'model');
       });
       
       // Task Milestone Dropdown Filter
       $('#category-filter').on('change', function() {
         changeFilter.call(this, 'category');
       });
       
       // Task Priority Dropdown Filter
       $('#unit-filter').on('change', function() {
         changeFilter.call(this, 'unit');
       });
       
       // Task Tags Dropdown Filter
       $('#supplier-filter').on('change', function() {
         changeFilter.call(this, 'supplier');
       });
      
   
   $(document).ready(function() {
          var localStorageName = "mymanageemployeeName"; // Set your desired localStorage name
         $("input:checkbox").each(function() {
             var columnValue = $(this).attr("value");
             var columnSelector = ".table ." + columnValue;
           //   var isChecked = localStorage.getItem(columnSelector) === "true";
                       var isChecked = localStorage.getItem(localStorageName  + columnSelector) === "true";
             // Check if the checkbox is checked or the stored state is true
             if (isChecked || $(this).prop("checked")) {
                 $(columnSelector).show(); // Show the column
             } else {
                 $(columnSelector).hide(); // Hide the column
             }
             $(this).prop("checked", isChecked);
         });
         // When a checkbox is clicked, update localStorage and toggle column visibility
         $("input:checkbox").click(function() {
             var columnValue = $(this).attr("value");
             var columnSelector = ".table ." + columnValue; // Corrected class name construction
             var isChecked = $(this).is(":checked");
           //   localStorage.setItem(columnSelector, isChecked); // Store checkbox state in localStorage
                       localStorage.setItem(localStorageName + columnSelector, isChecked); // Store checkbox state in localStorage
             // Toggle column visibility based on the checkbox state
             if (isChecked) {
                 $(columnSelector).show(); // Show the column
             } else {
                 $(columnSelector).hide(); // Hide the column
             }
         });
   });
   
   
   
   
   
</script>
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