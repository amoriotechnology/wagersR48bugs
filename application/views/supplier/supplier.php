<?php error_reporting(1);  ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
<script src="
   https://cdn.jsdelivr.net/npm/jquery-base64-js@1.0.1/jquery.base64.min.js
   "></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/html2canvas.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jspdf.plugin.autotable"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jspdf.umd.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<script type="text/javascript" src="<?php echo base_url()?>my-assets/js/vendor_tableManager.js"></script>
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
.search_dropdown{
      color: black;
   }

</style>





<div class="content-wrapper">
<section class="content-header" style="height: 70px;">
   <div class="header-icon" style="margin-top: -8px;">
      <figure class="one">
               <img src="<?php echo base_url()  ?>asset/images/supplier.png"  class="headshotphoto" style="height:50px;" />
      </div>
      
  
  
  
            <div class="header-title">
          <div class="logo-holder logo-9">
          <h1>  <?php echo display('Manage Vendor') ?></h1>
       </div>
         
     
     
     
      <small><?php //echo "Manage Supplier"; ?></small>
      <ol class="breadcrumb" style=" border: 3px solid #d7d4d6;" >
         <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
         <li><a href="#"><?php echo display('Vendor') ?></a></li>
         <li class="active" style="color:orange;"><?php echo display('Manage Vendor') ?></li>
     
     
     
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
   <div class="btnclr alert alert-info alert-dismissable" style="font-weight:bold;">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <?php echo $message; ?>                    
   </div>
   <?php
      // $this->session->unset_userdata('message');
      
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
   <script>
      $('.alert').delay(1000).fadeOut('slow');
   </script>    
   <!-- Manage Product report -->
   <div class="panel panel-bd lobidrag">
      <div class="panel-heading" style="height: 60px;border: 3px solid #D7D4D6;">
         <div class="col-sm-18">
            <div class="col-sm-6" style="display: flex; align-items: left;">
               <?php    foreach(  $this->session->userdata('perm_data') as $test){
                  $split=explode('-',$test);
                  if(trim($split[0])=='supplier' && $_SESSION['u_type'] ==3 && trim($split[1])=='1000'){
                     ?>
               <a href="<?php echo base_url('Csupplier') ?>" class="btnclr btn btn-default dropdown-toggle"   style="height:fit-content;"  ><i class="far fa-file-alt"> </i> <?php echo display('Add Vendor') ?> </a>                  
               <?php break;}} 
                  if($_SESSION['u_type'] ==2){ ?>
               <a href="<?php echo base_url('Csupplier') ?>" class="btnclr btn btn-default dropdown-toggle"    style="height:fit-content;"   ><i class="far fa-file-alt"> </i>  <?php echo display('Add Vendor') ?> </a>
               <?php  } ?>
               &nbsp;&nbsp;
               <a  class="btnclr btn btn-default dropdown-toggle"  style=" height:fit-content;"  id="s_icon"><b class="fa fa-search"></b>&nbsp;Advance search  </a> 
               &nbsp;&nbsp;
                        <div class="dropdown bootcol" id="drop" style="    width: 300px;">
                           <button class="btnclr btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" style="float:left;"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" >
                           <span class="fa fa-download"></span> <?php echo display('download') ?>
                           </button>
                           <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <li><a href="#" onclick="generate()"> <img src="<?php echo base_url() ?>assets/images/pdf.png" width="24px"> <?php echo display('PDF') ?></a></li>
                              <li class="divider"></li>
                              <li><a href="#" onclick="$('#ProfarmaInvList').tableExport({type:'excel',escape:'false'});"> <img src="<?php echo base_url() ?>assets/images/xls.png" width="24px"> <?php echo display('XLS') ?></a></li>
                           </ul>&nbsp;
                  
                  <button type="button"    class="btnclr btn btn-default dropdown-toggle"  onclick="printDiv('printableArea')"><b class="ti-printer"></b>&nbsp;<?php echo display('print') ?></button>
               </div>
            </div>
            <div class="col-sm-2" style="float:right;" >
               <div class="" style="float: right;">  <a onclick="reload();"  id="vendorRemove">  <i class="fa fa-refresh fa-spin" style="font-size:25px;float:right; margin-top: 5px;" aria-hidden="true"></i> </a>    &nbsp;    &nbsp;    &nbsp;    &nbsp;
                <i class="fa fa-gear fa-spin"  aria-hidden="true" id="myBtn" style="margin-right:20px;font-size:25px;float:right; margin-top: 5px;" onClick="columnSwitchMODAL()"></i></div>
            </div>
         </div>
         <br>
         <br>
         <br>
         <div id="search_area" style="border:4px solid #004d99;border-radius:7px;">
            <table class="table">
               <thead>
                  <tr class="filters">
                     
                     <?php 
                        $supplier_name  = array();
                        foreach ($getsupplier as $getsup) {
                          $supplier_name [] = $getsup['supplier_name'];
                        }
                        $unique_supplier_name = array_unique($supplier_name);
                        
                        
                        
                        
                        $mobile = array();
                        foreach ($getsupplier as $getsup) {
                        $mobile[] = $getsup['mobile'];
                        }
                        $unique_mobile = array_unique($mobile);
                        
                        
                        $primaryemail = array();
                        foreach ($getsupplier as $getsup) {
                        $primaryemail[] = $getsup['primaryemail'];
                        }
                        $unique_primaryemail   = array_unique($primaryemail);
                        
                        
                        $city = array();
                        foreach ($getsupplier as $getsup) {
                        $city[] = $getsup['city'];
                        }
                        $unique_city = array_unique($city);
                        
                        
                        
                        $vendor_type = array();
                        foreach ($getsupplier as $getsup) {
                        $vendor_type[] = $getsup['vendor_type'];
                        }
                        $unique_vendor_type = array_unique($vendor_type);
                        
                        
                        
                          {  ?>
                     <?php }  ?>
                     </th>
                     <th class="search_dropdown" style="width: 22%;">
                        <span><?php echo ('Name') ?> </span>
                        <select id="pname-filter" class="form-control">
                           <option>Any</option>
                           <?php foreach($unique_supplier_name as $getinfo){  ?>
                           <option value="<?php echo $getinfo; ?>"><?php echo $getinfo; ?></option>
                           <?php }  ?>
                        </select>
                     </th>
                     <th class="search_dropdown" style="width: 22%;">
                        <span>Mobile </span>
                        <select id="model-filter" class="form-control">
                           <option>Any</option>
                           <?php foreach($unique_mobile as $getinfo){  ?>
                           <option value="<?php echo $getinfo; ?>"><?php echo $getinfo; ?></option>
                           <?php }  ?>
                        </select>
                     </th>
                     <th class="search_dropdown" style="width: 20%;">
                        <span>Email</span>
                        <select id="category-filter" class="form-control">
                           <option>Any</option>
                           <?php foreach($unique_primaryemail as $getinfo){  ?>
                           <option value="<?php echo $getinfo; ?>"><?php echo $getinfo; ?></option>
                           <?php }  ?>
                        </select>
                     </th>
                     <th class="search_dropdown" style="width: 310px;">
                        <span>City</span>
                        <select id="unit-filter" class="form-control">
                           <option>Any</option>
                           <?php foreach($unique_city as $getinfo){  ?>
                           <option value="<?php echo $getinfo; ?>"><?php echo $getinfo; ?></option>
                           <?php }  ?>
                        </select>
                     </th>
                     <th class="search_dropdown" style="width: 22%;">
                        <span>Vendor Type</span>
                        <select id="supplier-filter" class="form-control">
                           <option>Any</option>
                           <?php foreach($unique_vendor_type as $getinfo){  ?>
                           <option value="<?php echo $getinfo; ?>"><?php echo $getinfo; ?></option>
                           <?php }  ?>
                        </select>
                     </th>
                  </tr>
               </thead>
            </table>
            <table>
               <tr>
                  <td style="width:10px;"></td>
                  <td style="width:22%;">   <input type="text" class="form-control" id="myInput1" onkeyup="search()" placeholder="Search for Company Name.."></td>
                  <td style="width:10px;"></td>
                  <td style="width:22%;"> <input type="text" class="form-control" id="myInput2" onkeyup="search()" placeholder="Search for Mobile   .."></td>
                  <td style="width:10px;"></td>
                  <td style="width:20%;">  <input type="text" class="form-control" id="myInput3" onkeyup="search()" placeholder="Search for Email .."></td>
                  <td style="width:10px;"></td>
                  <td style="width:20%;"> <input type="text" class="form-control" id="myInput4" onkeyup="search()" placeholder="Search for City .."></td>
                  <td style="width:10px;"></td>
                  <td style="width: 240px;"> <input type="text" class="form-control" id="myInput5" onkeyup="search()" placeholder="Search for Vendor Type.."></td>
               </tr>
            </table>
            <br/>
            <div class="col-sm-12">
               <input id="search" type="text" class="form-control"  placeholder="Search for Vendor..">
               <br>
            </div>
            <br>
         </div>
      </div>
   </div>

   <!-- Manage Invoice report -->
   <div class="row">
   <div class="col-sm-12">
      <div class="panel panel-bd lobidrag">
      <div class="panel-body" style="    border: 3px solid #D7D4D6;">
               <div class="sortableTable__container">
               <div id="for_filter_by" class="for_filter_by" style="display: inline;">
                  <label for="filter_by"><?php echo display('Filter By') ?>&nbsp;&nbsp;
                  </label>
                  <select id="filterby" style="border-radius:5px;height:25px;" >
                     <!--<option value="1"><?php echo display('ID') ?></option>-->
                     <option value="2"><?php echo display('Company ID') ?></option>
                     <option value="3"><?php echo display('Name') ?></option>
                     <option value="4"><?php echo display('Address') ?></option>
                     <option value="5"><?php echo display('Mobile') ?></option>
                     <option value="6"><?php echo display('Business Phone') ?></option>
                     <option value="7"><?php echo display('Primary Email') ?></option>
                     <option value="8"><?php echo display('City') ?></option>
                     <option value="9"><?php echo display('Country') ?></option>
                     <option value="10"><?php echo display('Credit limit') ?></option>
                     <option value="22"><?php echo  ('Open Balance') ?></option>
                     <option value="11"><?php echo display('Vendor Type') ?></option>
                     <option value="12"><?php echo display('Secondary Email') ?></option>
                     <option value="13"><?php echo display('Contact Person') ?></option>
                     <option value="14"><?php echo display('Fax') ?></option>
                     <option value="15"><?php echo display('Tax Collected') ?></option>
                     <option value="16"><?php echo display('State') ?></option>
                     <option value="17"><?php echo display('Zip code') ?></option>
                     <option value="18"><?php echo display('Supplier Details') ?></option>
                     <option value="19"><?php echo display('Preferred currency') ?></option>
                     <option value="20"><?php echo display('Payment Terms') ?></option>
                  </select>
                  <input id="filterinput" style="height:25px;" type="text" >
               </div>
            
               <div id="printableArea">
               <div class="sortableTable__discard">
                     </div>
                  <div id="customers">
                     <table class="table table-bordered" cellspacing="0" width="100%" id="ProfarmaInvList">
                        <thead class="sortableTable">
                           <tr class="sortableTable__header btnclr">
                              <!--<th class="1 value" data-control-column="1"   data-col="1" style="width: 80px; height: 40.0114px;" ><?php echo display('ID')?></th>-->
                              <th class="2 value" data-control-column="2"   data-col="2" style="width: 100px; height: 40.0114px;text-align:center;" ><?php echo display('Company ID')?></th>
                              <th class="3 value" data-control-column="3"  data-col="3"style="height: 45.0114px; width: 234.011px;text-align:center;" ><?php echo display('Name')?></th>
                              <th class="4 value" data-control-column="4"data-col="4"  style="height: 42.0114px;text-align:center;"   ><?php echo display('Address')?></th>
                              <th class="5 value" data-control-column="5"  data-col="5"  style="width: 198.011px;text-align:center;"><?php echo display('Mobile')?></th>
                              <th class="6 value" data-control-column="6" data-col="6"   style="width: 198.011px;text-align:center;" ><?php echo display('Business Phone')?></th>
                              <th class="7 value" data-control-column="7" data-col="7" style="width: 190.011px; height: 44.0114px;text-align:center;"><?php echo display('Primary Email')?> </th>
                              <th class="8 value" data-control-column="8"data-col="8" style="width: 190.011px; height: 44.0114px;text-align:center;"><?php echo display('City')?></th>
                              <th class="9 value" data-control-column="9"data-col="9" style="width: 190.011px; height: 44.0114px;"><?php echo display('Country')?></th>
                              <th class="10 value" data-control-column="10"data-col="10" style="width: 190.011px; height: 44.0114px;"><?php echo display('Credit limit')?></th>
                              <th class="22 value" data-control-column="22"  data-col="22"  style="width: 198.011px;">Open Balance</th>
                              <th class="11 value" data-control-column="11" data-col="11"   style="width: 198.011px;" ><?php echo display('Vendor Type')?></th>
                              <th class="12 value" data-control-column="12"data-col="12" style="width: 190.011px; height: 44.0114px;"><?php echo display('Secondary Email')?></th>
                              <th class="13 value" data-control-column="13" data-col="13" style="width: 190.011px; height: 44.0114px;"><?php echo display('Contact Person')?></th>
                              <th class="14 value" data-control-column="14"data-col="14" style="width: 190.011px; height: 44.0114px;"><?php echo display('Fax')?></th>
                              <th class="15 value" data-control-column="15"data-col="15" style="width: 190.011px; height: 44.0114px;"><?php echo display('Tax Collected')?></th>
                              <th class="16 value" data-control-column="16" data-col="16"   style="width: 198.011px;" ><?php echo display('State')?></th>
                              <th class="17 value" data-control-column="17" data-col="17" style="width: 190.011px; height: 44.0114px;"><?php echo display('Zip code')?></th>
                              <th class="18 value" data-control-column="18" data-col="18" style="width: 190.011px; height: 44.0114px;"><?php echo display('Supplier Details')?></th>
                              <th class="19 value" data-control-column="19" data-col="19" style="width: 190.011px; height: 44.0114px;"><?php echo display('Preferred currency')?></th>
                              <th class="20 value" data-control-column="20" data-col="20" style="width: 190.011px; height: 44.0114px;"><?php echo display('Payment Terms')?></th>
                              <div class="myButtonClass Action">
                                 <th class="21 text-center" data-column-id="21" data-control-column="21" data-formatter="commands" data-sortable="false" style="width: 190.011px; height: 44.0114px;"   ><?php echo display('Action')?></th>
                              </div>
                           </tr>
                        </thead>
                        <tbody class="sortableTable__body" id="tab" >
                           <?php
                              $count=1;
                              
                                if(count($vendor_data['rows'])>0){
                               foreach($vendor_data['rows'] as $k=>$arr){
                                   $arr['vendor_type']=str_replace(' ', '_',  $arr['vendor_type']);
                                    ?>
                           <tr style="text-align:center" class="task-list-row" data-task-id="<?php echo $count; ?>"
                              data-pname="<?php echo $arr['supplier_name'];  ?>"
                              data-model="<?php echo $arr['mobile']; ?>"
                              data_category="<?php echo $arr['primaryemail']; ?>" 
                              data-unit="<?php echo $arr['city'] ?>" 
                              data-supplier="<?php echo $arr['vendor_type'];  ?>">
                              <!--<td data-col="1" class="1"><?php  echo $count;  ?></td>-->
                              <td data-col="2" class="2"><?php   echo $arr['supplier_id'];  ?></td>
                              <td data-col="3" class="3"><?php  if($arr['vendor_type']=='productsupplier'){ ?><a href="<?php  echo base_url()  ?>/Csupplier/supplier_ledger_report/<?php  echo $arr['vendor_type']."/".$arr['supplier_id'];    ?>"><?php   echo $arr['supplier_name'];  ?></a><?php }else{
                                 ?>
                                 <a href="<?php  echo base_url()  ?>/Csupplier/supplier_ledger_report/<?php  echo $arr['vendor_type']."/".$arr['supplier_id'];    ?>" class="ads"><?php   echo $arr['supplier_name'];  ?></a>
                                 <?php   } ?>
                              </td>
                              <td data-col="4" class="4 ads"><?php   echo $arr['address'];  ?></td>
                              <td data-col="5" class="5 ads"><?php   echo $arr['mobile'];  ?></td>
                              <td data-col="6" class="6 ads"> <?php   echo $arr['businessphone'];  ?></td>
                              <td data-col="7" class="7 ads"><?php   echo $arr['primaryemail'];  ?></td>
                              <td data-col="8" class="8"><?php   echo $arr['city'];  ?></td>
                              <td data-col="9" class="9"><?php   echo $arr['country'];  ?></td>
                              <td data-col="10" class="10 ads"><?php if(!empty($arr['credit_limit'])) { echo $currency." ".$arr['credit_limit'];}else{echo "$0.00";}     ?></td>
                              <!--<td data-col="22" class="22"><?php // if(!//empty($arr['previous_balance'])) { //echo $currency." ".$arr['previous_balance'];}else{echo "$0.00";}      ?></td>-->
                              <!--<td data-col="22" class="22"><?php  if(!empty($arr['inv_due_amount_usd'])) { echo $currency." ".$arr['inv_due_amount_usd'];} elseif (!empty($arr['due_amount_usd']) ) {echo $currency." ".$arr['due_amount_usd'];}else{echo $currency." 0.00";}      ?></td>-->
                              <td data-col="22" class="22"><?php 
                                 if($arr['vendor_type'] == 'Product Supplier' ){
                                 
                                     if(!empty($arr['inv_due_amount_usd'])) { echo $currency." ".$arr['inv_due_amount_usd'];} 
                                     elseif (!empty($arr['due_amount_usd']) ) {echo $currency." ".$arr['due_amount_usd'];}
                                     else{echo $currency." 0.00";}     
                                     
                                 }
                                 else{
                                   if(!empty($arr['service_balance'])){
                                   echo $currency." ".$arr['service_balance'];}
                                   else{echo $currency." 0.00";}     
                                 
                                 }
                                     
                                     ?></td>
                           <td data-col="11" class="11"><?php echo str_replace('_', ' ', $arr['vendor_type']); ?></td>
                              <td data-col="12" class="12 ads"><?php   echo $arr['secondaryemail'];  ?></td>
                              <td data-col="13" class="13 ads"><?php   echo $arr['contactperson'];  ?></td>
                              <td data-col="14" class="14 ads"><?php   echo $arr['fax'];  ?></td>
                              <td data-col="15" class="15 ads"><?php   echo $arr['taxcollected'];  ?></td>
                              <td data-col="16" class="16"><?php   $arr['state'];  ?></td>
                              <td data-col="17" class="17 ads"><?php   echo $arr['zip'];  ?></td>
                              <td data-col="18" class="18 ads"><?php   echo $arr['details'];  ?></td>
                              <td data-col="19" class="19"><?php   echo $arr['currency_type'];  ?></td>
                              <td data-col="20" class="20 ads"><?php   echo $arr['paymentterms'];  ?></td>
                              <td data-col="21" class="21 text-center Action">
                                 <?php    foreach(  $this->session->userdata('perm_data') as $test){
                                    $split=explode('-',$test);
                                    if(trim($split[0])=='supplier' && $_SESSION['u_type'] ==3 && trim($split[1])=='0010'  ){    
                                       ?>
                                 <a class="btnclr btn  btn-sm supplier-edit" style="background-color: #3ca5de; color: #fff;" href="<?php echo base_url()?>Csupplier/supplier_update_form/<?php echo  $arr['supplier_id']; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                 <?php break;}} 
                                    foreach(  $this->session->userdata('perm_data') as $test){
                                    $split=explode('-',$test);
                                    if(trim($split[0])=='supplier' && $_SESSION['u_type'] ==3 && trim($split[1])=='0001'  ){    
                                      ?>
                                 <a class="btnclr btn  btn-sm" onclick="return confirm('<?php echo display('are_you_sure') ?>')"  style="background-color: #3ca5de; color: #fff;" href="<?php echo base_url()?>Csupplier/supplier_delete_form/<?php echo  $arr['supplier_id']; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>     <?php break;}}   ?>
                                 <?php       if($_SESSION['u_type'] ==2){ ?>
                                 <a class="btnclr btn  btn-sm supplier-edit"    href="<?php echo base_url()?>Csupplier/supplier_update_form/<?php echo  $arr['supplier_id']; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                 <a class="btnclr btn  btn-sm" onclick="return confirm('<?php echo display('are_you_sure') ?>')"    href="<?php echo base_url()?>Csupplier/supplier_delete_form/<?php echo  $arr['supplier_id']; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                 <?php  } ?> 
                              </td>
                           </tr>
                           <?php   
                              $count++;
                              
                                   
                                            
                                              
                              } }  else{
                                  ?>
                           <tr>
                              <td colspan="22" style="text-align:center;font-weight:bold;"><?php  echo "No Records Found"  ;?></td>
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
     
      <div id="supplier_modal" class="modal fade" role="dialog">
         <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
               <div class="modal-header" style="color:white;background-color:#38469f;">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title"><?php echo display('csv_vendor'); ?></h4>
               </div>
               <div class="modal-body">
                  <div>
                     <div class="panel-heading" style="height:50px;">
                        <div class="panel-title">
                           <a href="<?php echo base_url('assets/data/csv/supplier_csv_sample.csv') ?>" style="color:white;background-color:#38469f; " class="btn btn-primary pull-right" ><i class="fa fa-download"></i> <?php echo display('download_sample_file')?></a>
                        </div>
                     </div>
                     <div class="panel-body">
                        <?php echo form_open_multipart('Csupplier/uploadCsv_Supplier',array('class' => 'form-vertical', 'id' => 'validate','name' => 'insert_supplier'))?>
                        <div class="col-sm-12">
                           <div class="form-group row">
                              <label for="upload_csv_file" class="col-sm-4 col-form-label"><?php echo display('upload_csv_file') ?> <i class="text-danger">*</i></label>
                              <div class="col-sm-8">
                                 <input class="form-control" name="upload_csv_file" type="file" id="upload_csv_file" placeholder="<?php echo display('upload_csv_file') ?>" required>
                              </div>
                           </div>
                        </div>
                        <div class="col-sm-12">
                           <div class="form-group row">
                              <div class="col-sm-12 text-right">
                                 <input type="submit" style="color:white;background-color:#38469f;" id="add-product" class="btn btn-primary btn-large" name="add-product" value="<?php echo display('submit') ?>" />
                                 <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo display('Close') ?></button>
                              </div>
                           </div>
                        </div>
                        <?php echo form_close()?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

 <div id="myModal_colSwitch"  name="mysupplierName"      class="modal_colSwitch" >
         <div class="modal-content_colSwitch" style="width:55%;height:25%;">
            <span class="close_colSwitch">&times;</span>
            <div class="col-sm-1" ></div>
            <div class="col-sm-2" >
               <br>
               <div class="form-group row"  >
                  <br><input type="checkbox"  data-control-column="1"  class="1" value="1"/> &nbsp;<?php echo display('ID') ?><br>
                  <!-- <br><input type="checkbox"  data-control-column="2"  class="2" value="2"/>&nbsp;<?php echo display('Company ID') ?><br> -->
                  <!-- <br><input type="checkbox"  data-control-column="3"  class="3" value="3"/>&nbsp;<?php echo display('Name') ?><br> -->
                  <br><input type="checkbox"  data-control-column="4"  class="4" value="4"/>&nbsp;<?php echo display('Address') ?><br>
                  <!-- <br><input type="checkbox"  data-control-column="5"   class="5" value="5"/>&nbsp;<?php echo display('Mobile') ?><br> -->
                  <br><input type="checkbox"  data-control-column="6"  class="6" value="6"/>&nbsp;<?php echo display('Business Phone') ?><br>
               </div>
            </div>
            <div class="col-sm-2" >
               <br>
               <div class="form-group row"  >
                  <!-- <br><input type="checkbox"  data-control-column="7"  class="7" value="7"/>&nbsp;<?php echo display('Primary Email') ?> <br> -->
                  <br><input type="checkbox"  data-control-column="8"   class="8" value="8"/>&nbsp;<?php echo display('City') ?><br>
                  <br><input type="checkbox"  data-control-column="9"   class="9" value="9"/>&nbsp;<?php echo display('Country') ?><br>
                  <br><input type="checkbox"  data-control-column="10"  class="10" value="10"/>&nbsp;<?php echo display('Credit limit') ?><br>
                  <!-- <br><input type="checkbox"  data-control-column="22"   class="22" value="22"/>&nbsp;<?php echo ('Open Balance') ?><br> -->
               </div>
            </div>
            <div class="col-sm-2"  >
               <br>
               <div class="form-group row"  >
                  <!-- <br> <input type="checkbox"  data-control-column="11"   class="11" value="11"/>&nbsp;<?php echo display('Vendor Type') ?><br> -->
                  <br><input type="checkbox"  data-control-column="12"  class="12" value="12"/>&nbsp;<?php echo display('Secondary Email') ?> <br>
                  <br><input type="checkbox"  data-control-column="13"  class="13" value="13"/>&nbsp;<?php echo display('Contact Person') ?><br>
                  <br><input type="checkbox"  data-control-column="14"  class="14" value="14"/>&nbsp;<?php echo display('Fax') ?><br>
               </div>
            </div>
            <div class="col-sm-2"  >
               <br>
               <div class="form-group row"  >
               <br><input type="checkbox"  data-control-column="15"  class="15" value="15"/>&nbsp;<?php echo display('Tax Collected') ?><br>
                  <br><input type="checkbox"  data-control-column="16"  class="16" value="16"/>&nbsp;<?php echo display('State') ?><br>
                  <br> <input type="checkbox"  data-control-column="17"  class="17" value="17"/>&nbsp;<?php echo display('Zip code') ?> <br>
                 
               </div>
            </div>
            <div class="col-sm-2"  >
               <br>
               <div class="form-group row"  > <br><input type="checkbox"  data-control-column="18"  class="18" value="18"/>&nbsp;<?php echo display('Supplier Details') ?><br>
                  <br><input type="checkbox"  data-control-column="19"  class="19" value="19"/>&nbsp;<?php echo ('Preferredcurrency') ?><br>
                  <br><input type="checkbox"  data-control-column="20"  class="20" value="20"/>&nbsp;<?php echo display('Payment Terms') ?><br>
                  <!-- <br><input type="checkbox"  data-control-column="21"  class="21" value="21"/>&nbsp;<?php echo display('Action') ?><br> -->
               </div>
            </div>
         </div>
      </div>
</section>
</div>

<input type="hidden" value="Vendor/Vendor" id="url"/>
<script src="<?php echo base_url()?>assets/js/jquery.bootgrid.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.0.0-alpha.1/jspdf.plugin.autotable.js"></script>
<!-- <link rel="stylesheet" type="text/css" href="//code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css"> -->
<script type="text/javascript" src="<?php echo base_url()?>my-assets/js/profarma.js"></script>
<script>
   $(document).on('keyup', '#filterinput', function(){
   
      var value = $(this).val().toLowerCase();
      var filter=$("#filterby").val();
      $("#ProfarmaInvList tr:not(:eq(0))").filter(function() {
          $(this).toggle($(this).find("td."+filter).text().toLowerCase().indexOf(value) > -1)
      });
   });
   
   
      var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
   var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';
   $editor = $('#submit'),
    $editor.on('click', function(e) {
      if (this.checkValidity && !this.checkValidity()) return;
      e.preventDefault();
      var yourArray = [];
      //loop through all checkboxes which is checked
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
      url:'<?php echo base_url();?>Ccustomer/setting',
     
      data: data,
      dataType: "json", 
      success: function(data) {
          if(data) {
             console.log(data);
          }
      }  
   });
    });
   
    $( document ).ready(function() {
     var page=$('#url').val();
     page=page.split('/');
      var data = {
          'menu':page[0],
          'submenu':page[1]
           
         
         };
        
         data[csrfName] = csrfHash;
      $.ajax({
      
      type: "POST",  
      url:'<?php echo base_url();?>Ccustomer/get_setting',
     
      data: data,
      dataType: "json", 
      success: function(data) {
       var menu=data.menu;
       var submenu=data.submenu;
       if(menu=='Vendor' && submenu=='Vendor'){
       var s=data.setting;
   s=JSON.parse(s);
   console.log(s);
   for (var i = 0; i < s.length; i++) {
      console.log(s[i]);
      $('td.'+s[i]).hide(); // hide the column header th
      $('th.'+s[i]).hide();
   $('tr').each(function(){
       $(this).find('td:eq('+$('td.'+s[i]).index()+')').hide();
   });
      }
      for (var i = 0; i < s.length; i++) {
          if( $('.'+s[i]))
    $('.'+s[i]).prop('checked', false); //check the box from the array, note: you need to add a class to your checkbox group to only select the checkboxes, right now it selects all input elements that have the values in the array 
      }  
   }
      }
   });
   
   
   });
   
   
   
   
   $(document).ready(function() {
  // Function to toggle column visibility
  function toggleColumnVisibility(columnSelector, isChecked) {
    $(columnSelector).toggle(isChecked);
  }

  // Loop through checkboxes and initialize column visibility
  $("input:checkbox").each(function() {
    var columnValue = $(this).attr("value");
    var columnSelector = "table ." + columnValue;
    var isChecked = localStorage.getItem(columnSelector) === "true" || $(this).prop("checked");
    
    // Store checkbox state in localStorage
    localStorage.setItem(columnSelector, isChecked);

    // Toggle column visibility based on checkbox state
    toggleColumnVisibility(columnSelector, isChecked);
    
    // Set checkbox state
    $(this).prop("checked", isChecked);
  });

  // When a checkbox is clicked, update localStorage and toggle column visibility
  $("input:checkbox").click(function() {
    var columnValue = $(this).attr("value");
    var columnSelector = "table ." + columnValue;
    var isChecked = $(this).is(":checked");
    
    // Store checkbox state in localStorage
    localStorage.setItem(columnSelector, isChecked);

    // Toggle column visibility based on checkbox state
    toggleColumnVisibility(columnSelector, isChecked);
  });
});

   
   
   
   
   
   
//   $(document).ready(function() {
//       $("input:checkbox").each(function() {
//           var vendor = "table ." + $(this).attr("value");
//           var isChecked = localStorage.getItem(vendor) === "true";
//           $(this).prop("checked", isChecked);
//           $(vendor).toggle(isChecked); // Show/hide based on the stored state
//       });
//       });
//       // When a checkbox is clicked, update localStorage and toggle column visibility
//       $("input:checkbox").click(function() {
//           var vendor = "table ." + $(this).attr("value");
//           var isChecked = $(this).is(":checked");
//           localStorage.setItem(vendor, isChecked); // Store checkbox state in localStorage
//           $(vendor).toggle(isChecked); // Show/hide based on the clicked state
//       });
   
   
   
   // $("input:checkbox:not(:checked)").each(function() {
   //     var column = "table ." + $(this).attr("value");
   //     $(column).hide();
   // });
   
   // $("input:checkbox").click(function(){
   //     var column = "table ." + $(this).attr("value");
   //     $(column).toggle();
   // });
   
      
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
   td2 = tr[i].getElementsByTagName("td")[5];
   td3 = tr[i].getElementsByTagName("td")[6];
   td4 = tr[i].getElementsByTagName("td")[9];
   
   if (td && td1 && td2 && td3 && td4) {
     input_pname = (td.textContent || td.innerText).toUpperCase();
     input_model = (td1.textContent || td1.innerText).toUpperCase();
     input_category = (td2.textContent || td2.innerText).toUpperCase();
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
   
   
   
    $(document).ready(function(){
   $('#search_area').hide();
   });
   $('#s_icon').click(function(){
      $('#search_area').toggle();
   });
   
      
   function reload(){
      location.reload();
   }
   
   
   
          
          
          
      $(document).ready(function() {
      // Function to store the visibility state of rows in localStorage
      function storeVisibilityState() {
          var suppliervisibilityStates = {};
          $("#ProfarmaInvList tr").each(function(index, element) {
              var row = $(element);
              var rowID = index;
              var isVisible = row.is(':visible');
              suppliervisibilityStates[rowID] = isVisible;
          });
          // Store the visibility states in localStorage
          localStorage.setItem("suppliervisibilityStates", JSON.stringify(suppliervisibilityStates));
      }
   
      // Apply the stored visibility state on page load
      function applyVisibilityState() {
          var storedVisibilityStates = JSON.parse(localStorage.getItem("suppliervisibilityStates")) || {};
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
      $(".supplier-edit").on('click', function() {
          var row = $(this);
          storeVisibilityState(); // Store the updated visibility state
      });
   
      // Event listener for submitting edited data
      $(".updateVendor").on('submit', function(event) {
          event.preventDefault();
          var editedData = $("#editedData").val();
          // Store the edited data in localStorage
          localStorage.setItem("editedData", editedData);
      });
   
      // Display the stored edited data
      function displayEditedData() {
          var editedData = localStorage.getItem("editedData");
          if (editedData) {
              $("#displayEditedData").text(editedData);
          }
      }
   
      applyVisibilityState(); // Apply the stored visibility state on page load
      displayEditedData(); // Display the stored edited data on page load
   });
          
     $(document).ready(function() {
       var localStorageName = "mysupplierName"; // Set your desired localStorage name
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
          
        //   function removeItemFromLocalStorage() {
           
        //     const keyToRemove = 'suppliervisibilityStates';
          
        //     // Check if the item exists in localStorage
        //     if (localStorage.getItem(keyToRemove)) {
        //       // Remove the item from localStorage
        //       localStorage.removeItem(keyToRemove);
        //       console.log("Item removed from localStorage");
        //     } else {
        //       console.log("Item not found in localStorage");
        //     }
        //   }
          
        //   // Add a click event listener to the button
        //   const removeButton = document.getElementById('vendorRemove');
        //   removeButton.addEventListener('click', removeItemFromLocalStorage);
      
      
</script>
<style>
   .select2-selection__rendered{
   display:none;
   }
   .ads{
   max-width: 0px !important;
   white-space: nowrap;
   overflow: hidden;
   text-overflow: ellipsis;
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
    width: 130px;
  }

   
   
   
   
   
   
   
</style>