<?php error_reporting(1);  ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.base64.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/html2canvas.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jspdf.plugin.autotable"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jspdf.umd.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>my-assets/js/oceanexport_tableManager.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/drag_drop_index_table.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
<!--<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>-->
<!--<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />-->
<!-- <script type="text/javascript" src="<?php echo base_url()?>my-assets/js/tableManager.js"></script> -->
<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
<script type="text/javascript" src="http://mrrio.github.io/jsPDF/dist/jspdf.debug.js"></script>
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<script src="<?php echo base_url() ?>assets/js/dashboard.js" ></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet">

<link href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.2.2/css/bootstrap.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="<?php echo base_url() ?>my-assets/css/style.css">

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript" src="http://www.bacubacu.com/colresizable/js/colResizable-1.5.min.js"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" />

<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" />
<!-- <script type="text/javascript" src="http://www.bacubacu.com/colresizable/js/colResizable-1.5.min.js"></script> -->

<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />


<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" />



<style>
.btnclr{
       background-color:<?php echo $setting_detail[0]['button_color']; ?>;
       color: white;

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
    width: 200px;
  }

   
} 


  @media (max-width:1024px){
       #insert_sale{
       display: flex !important;
       justify-content: flex-end !important;
       }
       .mob_topview{
       position: relative;
       right: 33px;
       }
       #removeButton{
       position: absolute;
       left: 145px;
       }
       .fa.fa-gear::before {
       position: absolute;
       left: 111px;
       }
       .mobile_daterangepicker{
       position: relative;
       right: 36px;
       }
       .mob_search{
       position: absolute;
       left: 108px;
       font-size: 11px;
       }
       .mobile_para{
          font-size: 11px !important; 
       }
   }
   
   
</style>
 


<div class="content-wrapper">
   <section class="content-header">
      <div class="header-icon">
<figure class="one">
               <img src="<?php echo base_url()  ?>asset/images/export.png"  class="headshotphoto" style="height:50px;" />     
     
     
     
      </div>
      
      
      
      
        
       
       
        
        <div class="header-title">
          <div class="logo-holder logo-9">
         <h1> <?php echo display('Manage Ocean Export Invoice') ?> </h1>
       </div>
       
       
       
       
       
       
         <small></small>
         <ol class="breadcrumb" style=" border: 3px solid #d7d4d6;" >
            <li><a href="<?php   echo base_url(); ?>"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
            <li><a href="#"><?php echo display('invoice') ?></a></li>
            <li class="active" style="color:orange;"><?php echo display('Manage Ocean Export Invoice') ?></li>
      
      
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
         $message = $this->session->userdata('show');
         
         if (isset($message)) {
         
             ?>
      <div class="alert alert-info alert-dismissable" style="background-color:#38469f;color:white;font-weight:bold;">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
         <?php echo $message; ?>                    
      </div>
      <?php
         // $this->session->unset_userdata('message');
         
         }
         
         $error_message = $this->session->userdata('error_message');
         
         if (isset($error_message)) {
         
         ?>
      <div class="alert alert-danger alert-dismissable" style="background-color:#38469f;color:white;font-weight:bold;">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
         <?php echo $error_message ?>                    
      </div>
      <?php
         $this->session->unset_userdata('error_message');
         
         }
         
         ?>
    







 






   
<div class="panel panel-bd lobidrag" >
      <div class="panel-heading" style="height: 60px;    border: 3px solid #d7d4d6;">
         <div class="col-sm-12 mob_topview" style="height:69px;">
<div class="col-sm-4" style="display: flex; justify-content: space-between; align-items: left;">
<?php foreach($this->session->userdata('perm_data') as $test) {
            $split = explode('-', $test);
            if (trim($split[0]) == 'sales' && $_SESSION['u_type'] == 3 && trim($split[1]) == '1000') {
                ?>
                
 
                         <a href="<?php echo base_url('Cinvoice/ocean_export_tracking') ?>" class="btnclr btn btn-default dropdown-toggle boxes filip-horizontal mobile_para"   style="height:fit-content;"  ><i class="far fa-file-alt"> </i>  <?php echo display('Create ocean export') ?>   </a>



 




                <?php break;
            }
        }
        if ($_SESSION['u_type'] == 2) { ?>
  
                                 <a href="<?php echo base_url('Cinvoice/ocean_export_tracking') ?>" class="btnclr btn btn-default dropdown-toggle boxes filip-horizontal mobile_para"   style="height:fit-content;"  ><i class="far fa-file-alt"> </i>  <?php echo display('Create ocean export') ?>  </a>



        <?php } ?>
        &nbsp;&nbsp;

 
         <a  class="btnclr btn btn-default dropdown-toggle  boxes filip-horizontal  mobile_para"  style="height:fit-content;"  id="s_icon"><b class="fa fa-search"></b>&nbsp;Advance search  </a>
         &nbsp;&nbsp;
                        <div class="dropdown bootcol" id="drop" style="    width: 300px;">
                           <button class="btnclr btn btn-default dropdown-toggle  boxes filip-horizontal mobile_para" type="button" id="dropdownMenu1" style="float:left;"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" >
                           <span  class="fa fa-download"  ></span> <?php echo display('download') ?>
                           </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
            <li><a href="#" onclick="generate()"> <img src="<?php echo base_url() ?>assets/images/pdf.png" width="24px"> <?php echo display('PDF') ?></a></li>
            <li class="divider"></li>
            <li><a href="#" onclick="$('#ProfarmaInvList').tableExport({type:'excel',escape:'false'});"> <img src="<?php echo base_url() ?>assets/images/xls.png" width="24px"> <?php echo display('XLS') ?></a></li>
        </ul>
        &nbsp;&nbsp;
        </div>


    </div>




    <div class="col-sm-6" style="text-align: center;">
    <?php echo form_open_multipart('Cinvoice/manage_ocean_export_tracking',array('class' => 'form-vertical', 'id' => 'insert_sale','name' => 'insert_sale'))?>
        <?php
        $today = date('Y-m-d');
        ?>            
                     <div class="col-sm-2">
                        <!-- <div class="form-group row"     style="width: 300px;"> -->
                        <div class="form-group" style="display: inline-block; vertical-align: middle;">
            <input type="text" class="form-control daterangepicker-field mobile_daterangepicker" name="daterangepicker-field"
                   style="padding: 5px;width: 175px;border-radius: 8px;height: 35px;"/>
                           &nbsp; &nbsp; &nbsp;
                         
                         
                        </div>
                       
                     </div>
                      <div class="col-sm-3">
                         <div class="form-group">
                             <button type="submit" class="btn btnclr dropdown-toggle boxes filip-horizontal mob_search" style="float:right;" ><i class="fa fa-search" aria-hidden="true"></i> <?php echo display('search') ?></button> 
                         </div>
                     </div>
                      <?php echo form_close() ?>
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
                        <th class="search_dropdown" style="width: 22%;color: black;">
                           <span><?php echo display('Booking No') ?> </span>
                           <select id="pname-filter" class="form-control">
                              <option>Any</option>
                              <?php 
                                 $booking_no  = array();
                                 foreach ($ocean_exports as $invoice) {
                                 $booking_no [] = $invoice['booking_no'];
                                 }
                                 $unique_booking_no = array_unique($booking_no);
                                 
                                 
                                 $container_no = array();
                                 foreach ($ocean_exports as $invoice) {
                                 $container_no[] = $invoice['container_no'];
                                 }
                                 $unique_container_no = array_unique($container_no);
                                 
                                 
                                 $port_of_loading = array();
                                 foreach ($ocean_exports as $invoice) {
                                 $port_of_loading[] = $invoice['port_of_loading'];
                                 }
                                 $port_of_loading = array_unique($port_of_loading);
                                 
                                 
                                 $ocean_export_tracking_id = array();
                                 foreach ($ocean_exports as $invoice) {
                                 $ocean_export_tracking_id[] = $invoice['ocean_export_tracking_id'];
                                 }
                                 $ocean_export_tracking_id = array_unique($ocean_export_tracking_id);
                                 
                                 $supplier_name = array();
                                 foreach ($ocean_exports as $invoice) {
                                 $supplier_name[] = $invoice['supplier_name'];
                                 }
                                 $unique_supplier_name = array_unique($supplier_name);
                                 
                                
                                  foreach($unique_booking_no as $invoice){  ?>
                              <option value="<?php echo $invoice; ?>"><?php echo $invoice; ?></option>
                              <?php }  ?>
                           </select>
                        </th>
                        <th class="search_dropdown" style="width: 22%;color: black;">
                           <span>Container No</span>
                           <select id="model-filter" class="form-control">
                              <option>Any</option>
                              <?php foreach($unique_container_no as $invoice){  ?>
                              <option value="<?php echo $invoice; ?>"><?php echo $invoice; ?></option>
                              <?php }  ?>
                           </select>
                        </th>
                        <th class="search_dropdown" style="width: 22%;color: black;">
                           <span>Port of Loading </span>
                           <select id="category-filter" class="form-control">
                              <option>Any</option>
                              <?php foreach($port_of_loading as $invoice){  ?>
                              <option value="<?php echo $invoice; ?>"><?php echo $invoice; ?></option>
                              <?php }  ?>
                           </select>
                        </th>
                        <th class="search_dropdown" style="width: 22%;color: black;">
                           <span>Ocean Export Tracking Id</span>
                           <select id="unit-filter" class="form-control">
                              <option>Any</option>
                              <?php foreach($unique_customs_broker_name as $invoice){  ?>
                              <option value="<?php echo $invoice; ?>"><?php echo $invoice; ?></option>
                              <?php }  ?>
                           </select>
                        </th>
                        <th class="search_dropdown" style="width: 200px;color: black;">
                           <span>Shipper</span>
                           <select id="supplier-filter" class="form-control">
                              <option>Any</option>
                              <?php foreach($unique_supplier_name as $invoice){  ?>
                              <option value="<?php echo $invoice; ?>"><?php echo $invoice; ?></option>
                              <?php }  ?>
                           </select>
                        </th>
                     </tr>
                  </thead>
               </table>
               <table>
                  <tr>
                     <td style="width:10px;"></td>
                     <td style="width:22%;">   <input type="text" style="height:inherit;"  class="form-control" id="myInput1" onkeyup="search()" placeholder="Search for Booking No.."></td>
                     <td style="width:10px;"></td>
                     <td style="width:22%;"> <input type="text" style="height:inherit;"  class="form-control" id="myInput2" onkeyup="search()" placeholder="Search for Container No.."></td>
                     <td style="width:10px;"></td>
                     <td style="width:20%;">  <input type="text" style="height:inherit;"  class="form-control" id="myInput3" onkeyup="search()" placeholder="Search for Customer Name.."></td>
                     <td style="width:10px;"></td>
                     <td style="width:20%;"> <input type="text" style="height:inherit;"  class="form-control" id="myInput4" onkeyup="search()" placeholder="Customer Broker Name.."></td>
                     <td style="width:10px;"></td>
                     <td style="width: 203px;"> <input type="text" style="height:inherit;"  class="form-control" id="myInput5" onkeyup="search()" placeholder="Shipper.."></td>
                  </tr>
               </table>
               <br/>
               <div class="col-sm-12">
                  <input id="search" type="text" class="form-control" style="height:inherit;"  placeholder="Search for Ocean Export">
                  <br>
               </div>
               <br>
            </div>
         </div>
      </div>






 
















      <div class="row">
         <div class="col-sm-12"  >
            <div class="panel panel-bd lobidrag"     style="border: 3px solid #d7d4d6;">
               <div class="panel-heading"  style="border-color:white;" >
                  <div class="row"   style="height:0px;">
                     <input type="hidden" class="txt_csrfname" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                     <div id="for_filter_by" class="for_filter_by" style="display: inline;padding-top: -1px;    margin-right: 13px;">
                        <label for="filter_by"> <?php echo display('Filter By') ?> &nbsp;&nbsp;
                        </label>
                        <select id="filterby" style="border-radius:5px;height:25px;">
                              <option value="1"><?php echo display('ID') ?></option>
                              <option value="2"><?php echo display('Booking Number') ?></option>
                              <option value="3"><?php echo display('Container Number') ?></option>
                              <option value="4"><?php echo display('Seal Number') ?></option>
                              <option value="5"><?php echo display('Ocean Export ID') ?></option>
                              <option value="6"><?php echo display('Shipper') ?></option>
                              <option value="7"><?php echo display('Purchase Date') ?></option>
                              <option value="8"><?php echo display('Place of Delivery') ?></option>
                              <option value="9"><?php echo display('Notify Party') ?></option>
                              <option value="10"><?php echo display('Vessel') ?></option>
                              <option value="11"><?php echo display('Voyage No') ?></option>
                              <option value="12"><?php echo display('Freight Forwarder') ?></option>
                              <option value="13"><?php echo display('HBL No') ?></option>
                              <option value="14"><?php echo display('OBL No') ?></option>
                              <option value="15"><?php echo display('AMS No') ?></option>
                              <option value="16"><?php echo display('ISF No') ?></option>
                              <option value="17"><?php echo display('MBL No') ?></option>
                              <option value="18"><?php echo display('Port of discharge') ?></option>
                              <option value="19"><?php echo display('Customs Broker Name') ?></option>
                              <option value="20"><?php echo display('Estimated time of departure') ?></option>
                              <option value="21"><?php echo display('Customer / Consignee') ?></option>
                              <option value="22"><?php echo display('Port of loading') ?></option>
                              <option value="23"><?php echo display('Estimated Time of Arrival') ?></option>
                              <option value="24"><?php echo display('Remarks / Particulars') ?></option>
                              <option value="25"><?php echo display('Invoice Date') ?></option>
                           </select>
                           <input id="filterinput" style="border-radius:5px;height:25px;margin-bottom: 0px;" type="text"> 

                     </div>
                  </div>
               </div>






               <div class="panel-body" style="margin-top: -35px;">
                  <div class="sortableTable__container">
                     <div class="sortableTable__discard">
                     </div>
                     <div id="customers">
                        <table class="table table-bordered" cellspacing="0" width="100%" id="ProfarmaInvList">
                           <thead class="sortableTable">
                           <tr   class="sortableTable__header btnclr">
                                 <th class="1 value"  data-col="1" data-resizable-column-id="1"  style="width: 100px; height: 39.0114px;text-align:center;"   ><?php echo display('ID') ?></th>
                                 <th class="2 value"  data-col="2" data-resizable-column-id="2"    style="height: 45.0114px; width: 207.011px;text-align:center;"    ><?php echo display('Booking Number') ?></th>
                                 <th class="3 value" data-col="3" data-resizable-column-id="3"  style="height: 44.0114px; width: 253.011px;text-align:center;"     ><?php echo display('Container Number') ?></th>
                                 <th class="4 value"   data-col="4"  data-resizable-column-id="4"    style="width: 207.011px; height: 46.0114px;text-align:center;"   ><?php echo display('Seal Number') ?></th>
                                 <th class="5 value" data-col="5"  data-resizable-column-id="5"    style="width: 185.011px; height: 47.0114px;text-align:center;"   > <?php echo display('Ocean Export ID') ?></th>
                                 <th class="6 value"   data-col="6"data-resizable-column-id="6"  style="height: 42.0114px; width: 201.011px;text-align:center;"  ><?php echo display('Shipper') ?> </th>
                                 <th class="7 value" data-col="7" data-resizable-column-id="7"   style="width: 209.011px;text-align:center;"    ><?php echo display('Purchase Date') ?></th>
                                 <th class="8 value"  data-col="8"  data-resizable-column-id="8" style="height: 42.0114px; width: 171.011px;text-align:center;"       ><?php echo display('Place of Delivery') ?></th>
                                 <th class="9 value"  data-col="9" data-resizable-column-id="9"  style="height: 42.0114px; width: 171.011px;text-align:center;"       ><?php echo display('Notify Party') ?></th>
                                 <th class="10 value"  data-col="10" data-resizable-column-id="10"  style="height: 42.0114px; width: 171.011px;text-align:center;"       ><?php echo display('Vessel') ?></th>
                                 <th class="11 value" data-col="11"data-resizable-column-id="11"    style="height: 42.0114px; width: 171.011px;text-align:center;"       ><?php echo display('Voyage No') ?></th>
                                 <th class="12 value" data-col="12" data-resizable-column-id="12"   style="height: 42.0114px; width: 171.011px;text-align:center;"       ><?php echo display('Freight Forwarder') ?></th>
                                 <th class="13 value"  data-col="13" data-resizable-column-id="13"  style="height: 42.0114px; width: 171.011px;text-align:center;"       ><?php echo display('HBL No') ?></th>
                                 <th class="14 value" data-col="14" data-resizable-column-id="14"   style="height: 42.0114px; width: 171.011px;text-align:center;"       ><?php echo display('OBL No') ?></th>
                                 <th class="15 value" data-col="15" data-resizable-column-id="15"   style="height: 42.0114px; width: 171.011px;text-align:center;"       ><?php echo display('AMS No') ?></th>
                                 <th class="16 value" data-col="16" data-resizable-column-id="16"   style="height: 42.0114px; width: 171.011px;text-align:center;"       ><?php echo display('ISF No') ?></th>
                                 <th class="17 value" data-col="17" data-resizable-column-id="17"   style="height: 42.0114px; width: 171.011px;text-align:center;"       ><?php echo display('MBL No') ?></th>
                                 <th class="18 value"  data-col="18" data-resizable-column-id="18"  style="height: 42.0114px; width: 171.011px;text-align:center;"       ><?php echo display('Port of discharge') ?></th>
                                 <th class="19 value" data-col="19" data-resizable-column-id="19"   style="height: 42.0114px; width: 171.011px;text-align:center;"       ><?php echo display('Customs Broker Name') ?></th>
                                 <th class="20 value" data-col="20" data-resizable-column-id="20"   style="height: 42.0114px; width: 171.011px;text-align:center;"       ><?php echo display('Estimated time of departure') ?></th>
                                 <th class="21 value" data-col="21" data-resizable-column-id="21"   style="height: 42.0114px; width: 271.011px;text-align:center;"       ><?php echo display('Customer / Consignee') ?></th>
                                 <th class="22 value" data-col="22" data-resizable-column-id="22"   style="height: 42.0114px; width: 171.011px;text-align:center;"       ><?php echo display('Port of loading') ?></th>
                                 <th class="23 value"  data-col="23" data-resizable-column-id="23"  style="height: 42.0114px; width: 171.011px; text-align:center;"       ><?php echo display('Estimated Time of Arrival') ?></th>
                                 <th class="24 value" data-col="24" data-resizable-column-id="24"   style="height: 42.0114px; width: 171.011px; text-align:center;"       ><?php echo display('Remarks / Particulars') ?></th>
                                 <th class="25 value" data-col="25" data-resizable-column-id="25"   style="height: 42.0114px; width: 171.011px; text-align:center;"       ><?php echo display('Invoice Date') ?></th>
                                 <div class="myButtonClass">
                                    <th class="text-center 26 value"  data-col="26" data-resizable-column-id="26"  style="width: 700.011px; height: 45.0114px; text-align:center;"     ><?php echo display('Action') ?></th>
                                 </div>
                              </tr>
                           </thead>
                           <tbody class="sortableTable__body">
                              <?php
                                 $count=1;
                                 
                                 if(count($sale['rows'])>0){
                                     foreach($sale['rows'] as $k=>$arr){
                                       ?>
                              <tr style="text-align:center" class="task-list-row" data-task-id="<?php echo $count; ?>" data-pname="<?php echo $arr['booking_no']; ?>" data-model="<?php echo $arr['container_no']; ?>" data-category="<?php echo $arr['port_of_loading']; ?>" data-unit="<?php echo $arr['ocean_export_tracking_id'] ?>" data-supplier="<?php echo $arr['supplier_name'];  ?>">
                                
                              
                              
                              <tr id="task-<?php echo $i; ?>"
                                                class="task-list-row"
                                                  data-task-id="<?php echo $i; ?>"
                                                  data-pname="<?php echo $arr['booking_no']; ?>"
                                                  data-model="<?php echo $arr['container_no']; ?>"
                                                  data-category="<?php echo $arr['port_of_loading']; ?>"
                                                  data-unit="<?php echo $arr['ocean_export_tracking_id']; ?>"
                                                  data-supplier="<?php echo $arr['supplier_name']; ?>">
                              
                              
                              
                              <td style="display: none;"><input type="hidden" class="form-control" id="rowocean_id" value="<?php echo $arr['ocean_export_tracking_id'];  ?>" /></td>
                              <td class="1" data-col="1" style="text-align:center;" ><?php  echo $count;  ?></td>
                                 <td class="2" data-col="2" style="text-align:center;" ><?php   echo $arr['booking_no'];  ?></td>
                                 <td class="3" data-col="3" style="text-align:center;" ><?php   echo $arr['container_no'];  ?></td>
                                 <td class="4" data-col="4" style="text-align:center;" ><?php   echo $arr['seal_no'];  ?></td>
                                 <td class="5 ads" data-col="5" style="text-align:center;" ><?php   echo $arr['ocean_export_tracking_id'];  ?></td>
                                 <td class="6" data-col="6" style="text-align:center;   white-space: nowrap;" ><?php   echo $arr['supplier_name'];  ?></td>
                                 <td class="7 ads"data-col="7" style="text-align:center;" ><?php   echo $arr['invoice_date'];  ?></td>
                                 <td data-col="8" class="8" style="text-align:center;" ><?php   echo $arr['place_of_delivery'];  ?></td>
                                 <td class="9" data-col="9" style="text-align:center;" ><?php   echo $arr['notify_party'];  ?></td>
                                 <td class="10" data-col="10" style="text-align:center;" ><?php   echo $arr['vessel'];  ?></td>
                                 <td class="11" data-col="11" style="text-align:center;" ><?php   echo $arr['voyage_no'];  ?></td>
                                 <td class="12" data-col="12" style="text-align:center;" ><?php   echo $arr['freight_forwarder'];  ?></td>
                                 <td class="13 " data-col="13" style="text-align:center;" ><?php   echo $arr['hbl_no'];  ?></td>
                                 <td class="14 " data-col="14" style="text-align:center;" ><?php   echo $arr['obl_no'];  ?></td>
                                 <td class="15 " data-col="15" style="text-align:center;" ><?php   echo $arr['ams_no'];  ?></td>
                                 <td class="16 " data-col="16" style="text-align:center;" ><?php   echo $arr['isf_no'];  ?></td>
                                 <td class="17 " data-col="17" style="text-align:center;" ><?php   echo $arr['mbl_no'];  ?></td>
                                 <td class="18" data-col="18" style="text-align:center;" ><?php   echo $arr['port_of_discharge'];  ?></td>
                                 <td class="19" data-col="19" style="text-align:center;" ><?php   echo $arr['customs_broker_name'];  ?></td>
                                 <td class="20 ads" data-col="20" style="text-align:center;" ><?php   echo $arr['etd'];  ?></td>
                                 <td class="21" data-col="21" style="text-align:center;" ><?php   echo $arr['consignee'];  ?></td>
                                 <td class="22  " data-col="22" style="text-align:center;" ><?php   echo $arr['port_of_loading'];  ?></td>
                                 <td class="23 ads" data-col="23" style="text-align:center;" ><?php   echo $arr['eta'];  ?></td>
                                 <td class="24 ads" data-col="24" style="text-align:center;" ><?php   echo $arr['particular'];  ?></td>
                                 <td class="25 ads" data-col="25" style="text-align:center;" ><?php   echo $arr['invoice_date'];  ?></td>
                                 <div class="form-group">
                                    <td class="26" data-col="26" style="text-align:center;">
                                       <a class="btnclr btn  btn-sm"   href="<?php echo base_url()?>Cinvoice/ocean_export_tracking_details_data/<?php echo  $arr['ocean_export_tracking_id'];  ?>"><i class="fa fa-download" aria-hidden="true"></i></a>
                                       <a class="btnclr btn  btn-sm getocean_id"   data-toggle="modal" data-target="#emailmodal" onclick="oceanexportmail(<?php echo  $arr['ocean_export_tracking_id'];  ?>,'ocean_export_tracking','ocean_export_tracking_id')"><i class="fa fa-envelope" aria-hidden="true" ></i></a>
                                       <?php    foreach(  $this->session->userdata('perm_data') as $test){
                                          $split=explode('-',$test);
                                          if(trim($split[0])=='sales' && $_SESSION['u_type'] ==3 && trim($split[1])=='0010'){
                                            
                                            
                                             ?>
                                       <a class="btnclr btn  btn-sm oceanexport-edit"  href="<?php echo base_url()?>Cinvoice/ocean_export_tracking_update_form/<?php echo  $arr['ocean_export_tracking_id'];  ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                       <?php break;}} 
                                          if($_SESSION['u_type'] ==2){ ?>
                                       <a class="btnclr btn  btn-sm oceanexport-edit"  href="<?php echo base_url()?>Cinvoice/ocean_export_tracking_update_form/<?php echo  $arr['ocean_export_tracking_id'];  ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                       <?php  } ?>
                                       <?php    foreach(  $this->session->userdata('perm_data') as $test){
                                          $split=explode('-',$test);
                                          if(trim($split[0])=='sales' && $_SESSION['u_type'] ==3 && trim($split[1])=='0001'){
                                            
                                            
                                             ?>
                                       <a class="btnclr btn  btn-sm"  onclick="return confirm('<?php echo display('are_you_sure') ?>')" href="<?php echo base_url()?>Cinvoice/ocean_export_tracking_delete_form/<?php echo  $arr['ocean_export_tracking_id'];  ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                       <?php break;}} 
                                          if($_SESSION['u_type'] ==2){ ?>
                                       <a class="btnclr btn  btn-sm" sss onclick="return confirm('<?php echo display('are_you_sure') ?>')" href="<?php echo base_url()?>Cinvoice/ocean_export_tracking_delete_form/<?php echo  $arr['ocean_export_tracking_id'];  ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                       <?php  } ?>
                                    </td>
                                 </div>
                              </tr>
                              <?php   
                                 $count++;
                                      
                                               
                                                 
                                 } }  else{
                                     ?>
                              <tr>
                                 <td colspan="26" style="text-align:center;font-weight:bold;"><?php  echo "No Records Found"  ;?></td>
                              </tr>
                              <?php
                                 }
                                 
                                 ?>
                           </tbody>
                          
                        </table>
                     </div>
                  </div>
   </section>
   
   













   <input type="hidden" value="Sale/New Sale" id="url"/>
   <script src="<?php echo base_url()?>assets/js/jquery.bootgrid.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.0.0-alpha.1/jspdf.plugin.autotable.js"></script>
   <!--<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>-->
   <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.js'></script>
   <script src='https://cdnjs.cloudflare.com/ajax/libs/knockout/3.4.0/knockout-debug.js'></script>
   <!--<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>-->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
   <script  src="<?php echo base_url() ?>my-assets/js/script.js"></script> 
   <!--<script type="text/javascript" src="<?php echo base_url()?>my-assets/js/profarma.js"></script>-->
  






   <script  src="<?php echo base_url() ?>my-assets/js/script.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery.bootgrid.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.0.0-alpha.1/jspdf.plugin.autotable.js"></script>
<!--<script type="text/javascript" src="<?php echo base_url()?>my-assets/js/profarma.js"></script>-->





<div id="myModal_colSwitch"     name="myoceanexportName"        class="modal_colSwitch" >
                    <div class="modal-content_colSwitch" style="width:75%;height:35%;">
                          <span class="close_colSwitch">&times;</span>

                          <div class="col-sm-1"></div>

                          <div class="col-sm-3"><br><br>
                          <div class="form-group row">
               

            <input type="checkbox"  data-control-column="1"   class="1" value="1" />&nbsp;<?php echo display('ID') ?><br><br>
            <!-- <input type="checkbox"  data-control-column="2"  checked = "checked" class="2" value="2"/>&nbsp;<?php echo display('Booking Number') ?><br><br> -->
            <!-- <input type="checkbox"  data-control-column="3"  checked = "checked"  class="3" value="3"/>&nbsp;<?php echo display('Container Number') ?><br><br> -->
            <input type="checkbox"  data-control-column="4"    class="4" value="4"/>&nbsp;<?php echo display('Seal Number') ?><br><br>
            <input type="checkbox"  data-control-column="5"   class="5" value="5"/>&nbsp;<?php echo display('Ocean Export ID') ?><br><br>
            <!-- <input type="checkbox"  data-control-column="6"  checked = "checked" class="6" value="6"/>&nbsp;<?php echo display('Shipper') ?><br><br> -->
            <!-- <input type="checkbox"  data-control-column="7"  checked = "checked"  class="7" value="7"/>&nbsp;<?php echo display('Purchase Date') ?><br><br> -->
            <input type="checkbox"  data-control-column="8"  class="8" value="8"/>&nbsp;<?php echo display('Place of Delivery') ?><br><br>
            <input type="checkbox"  data-control-column="9"  class="9" value="9"/>&nbsp;<?php echo display('Notify Party') ?><br><br>
                       
         
         </div>  
                         </div>


                          <div class="col-sm-3"><br><br>
                          <div class="form-group row">
                 
            <input type="checkbox"  data-control-column="10"  class="10" value="10"/>&nbsp;<?php echo display('Vessel') ?><br><br>
           
            <input type="checkbox"  data-control-column="11"  class="11" value="11"/>&nbsp;<?php echo display('Voyage No') ?><br><br>
            <input type="checkbox"  data-control-column="12"  class="12 " value="12 " /> &nbsp;<?php echo display('Freight forwarder ') ?><br><br>
            <input type="checkbox"  data-control-column="13"  class="13" value="13"/>&nbsp;<?php echo display('HBL NO') ?><br><br>
            <input type="checkbox"  data-control-column="14"  class="14" value="14"/>&nbsp;<?php echo display('OBL NO') ?><br><br>
                           </div>
                                     </div>



                            <div class="col-sm-2"><br><br>
                            <div class="form-group row">
                            <input type="checkbox"  data-control-column="15"   class="15" value="15"/>&nbsp;<?php echo display('AMS NO') ?><br><br>
            <input type="checkbox"  data-control-column="16"   class="16" value="16"/>&nbsp;<?php echo display('ISF NO') ?><br><br>
            <input type="checkbox"  data-control-column="17"   class="17" value="17"/>&nbsp;<?php echo display('MBL NO') ?><br><br>
            <input type="checkbox"  data-control-column="18"  class="18" value="18"/>&nbsp;<?php echo display('Port of discharge') ?><br><br>
            <input type="checkbox"  data-control-column="19"  class="19" value="19"/>&nbsp;<?php echo display('Customs Broker Name') ?><br><br>
            <!-- <input type="checkbox"  data-control-column="21"  checked = "checked" class="21" value="21"/>&nbsp;<?php echo display('Customer / Consignee') ?><br><br> -->
                           </div>
                             </div>



                          <div class="col-sm-2"><br><br>
                          <div class="form-group row">
                          <input type="checkbox"  data-control-column="20"    class="20" value="20"/>&nbsp;<?php echo display('Estimated time of departure') ?><br><br>

                          <input type="checkbox"  data-control-column="22"  class="22 " value="22 "/>&nbsp;<?php echo display('Port of loading ') ?><br><br>
            <input type="checkbox"  data-control-column="23"    class="23" value="23"/>&nbsp;<?php echo display('Estimated Time of Arrival') ?><br><br>
            <input type="checkbox"  data-control-column="24"  class="24" value="24"/>&nbsp;<?php echo display('Remarks / Particulars') ?><br><br>
            <input type="checkbox"  data-control-column="25"    class="25" value="25"/>&nbsp;<?php echo display('Invoice Date') ?><br><br>
            <!-- <input type="checkbox"  data-control-column="26" checked = "checked" class="26"value="26" />&nbsp;<?php echo display('Action') ?><br><br> -->
                           </div>
                           </div>

                          

            </div>
                </div>
</section>

</div> 

































<input type ="hidden" name="csrf_test_name" id="csrf_test_name" value="<?php echo $this->security->get_csrf_hash();?>">
</div>
<!--   <input type="hidden" id="total_invoice" value="<?php //echo $total_invoice;?>" name="">
   <input type="hidden" id="currency" value="{currency}" name="">-->
</div>
</div>
</section>
</div>
<script type="text/javascript" src="<?php echo base_url()?>my-assets/js/profarma.js"></script>
<script>
   $(document).on('keyup', '#filterinput', function(){
    
      var value = $(this).val().toLowerCase();
      var filter=$("#filterby").val();
      $("#ProfarmaInvList tr:not(:eq(0))").filter(function() {
          $(this).toggle($(this).find("td."+filter).text().toLowerCase().indexOf(value) > -1)
      });
   });
</script>
<script>
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
   
   $( document ).ready(function() {
   var page=$('#url').val();
   page=page.split('/');
   var data = {
       'menu':page[0],
       'submenu':page[1]
        
      
      };
     console.log(page[0]+"-"+page[1]);
      data[csrfName] = csrfHash;
   $.ajax({
   
   type: "POST",  
   url:'<?php echo base_url();?>Cinvoice/get_setting',
   
   data: data,
   dataType: "json", 
   success: function(data) {
    var menu=data.menu;
    var submenu=data.submenu;
    if(menu=='Sale' && submenu=='OceanExportTrucking'){
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
       
       
       
          var localStorageName = "myoceanexportName"; // Set your desired localStorage name

       
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
    td1 = tr[i].getElementsByTagName("td")[2];
    td2 = tr[i].getElementsByTagName("td")[20];
    td3 = tr[i].getElementsByTagName("td")[18];
    td4 = tr[i].getElementsByTagName("td")[5];
   
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
   
   function reload(){
       location.reload();
   }


</script>


<script type="text/javascript">
   var csrfName = $('.txt_csrfname').attr('name'); 
    var csrfHash = $('.txt_csrfname').val();
    var base_url=$('#base_url').val();
    $('.getocean_id').on('click', function() {

        var rowoceanId = $(this).closest('tr').find('#rowocean_id').val();
       $.ajax({
           url:"<?php echo base_url(); ?>Cinvoice/Get_oceanattachments",
           type: 'POST',
           dataType: 'json',
           data: {[csrfName]: csrfHash,rowoceanId:rowoceanId},
           success: function(data){
           $('.ocean_attach').html("");
            for(var i = 0; i < data.length; i++) {
               console.log(data[i]['files']);
               if(data[i]['files']){
                  $('.ocean_attach').append('<input type="hidden" name="files[]" class="upload" id="attachment" style="visibility: hidden; position: absolute;" multiple/> <a href='+base_url+'uploads/'+encodeURI(data[i]["files"])+' class="file-block" target=_blank><span class="file-delete"><span><i class="fa fa-trash-o"></i></span></span>'+encodeURI(data[i]["files"])+'</a>');
               }else{

                  $('.ocean_attach').html("No attachment Found");
               }


            }

           }
       });
        
    });


    $(document).ready(function(){
$('#daterangepicker-field').val(<?php  echo $start;  ?>);
  
});



    $(document).ready(function() {
    // Function to store the visibility state of rows in localStorage
    function storeVisibilityState() {
        var visibilityStates = {};
        $("#ProfarmaInvList tr").each(function(index, element) {
            var row = $(element);
            var rowID = index;
            var isVisible = row.is(':visible');
            visibilityStates[rowID] = isVisible;
        });
        // Store the visibility states in localStorage
        localStorage.setItem("visibilityStates", JSON.stringify(visibilityStates));
    }

    // Apply the stored visibility state on page load
    function applyVisibilityState() {
        var storedVisibilityStates = JSON.parse(localStorage.getItem("visibilityStates")) || {};
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
    $(".oceanexport-edit").on('click', function() {
        var row = $(this);
        storeVisibilityState(); // Store the updated visibility state
    });

    // Event listener for submitting edited data
    $(".final_submit").on('submit', function(event) {
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



        
        
        function removeItemFromLocalStorage() {
         
          const keyToRemove = 'oceanexportvisibilityStates';
        
          // Check if the item exists in localStorage
          if (localStorage.getItem(keyToRemove)) {
            // Remove the item from localStorage
            localStorage.removeItem(keyToRemove);
            console.log("Item removed from localStorage");
          } else {
            console.log("Item not found in localStorage");
          }
        }
        
        // Add a click event listener to the button
        const removeButton = document.getElementById('oceanremoveButton');
        removeButton.addEventListener('click', removeItemFromLocalStorage);

</script>

<style>
   .table{
   display: block;
   overflow-x: auto;
   }
   .Row {
   display: table;
   width: 100%; /*Optional*/
   table-layout: fixed; /*Optional*/
   border-spacing: 5px; /*Optional*/
   }
   .Column {
   display: table-cell;
   }
   th {
   padding: 10px !important;
   }
   .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
   vertical-align: middle;
   }
   .search_dropdown{
   background:center;
   }
   /* th{
   color:black;
   } */
   .select2{
   display:none;
   }


   #numrows{
        width: 75px !important;
        
    }
    /* pagecontroller pagecontroller-n */
      .pagecontroller {
         margin: 5px;
    }


    /* .filip-horizontal:hover{
    background-color: crimson;
    transition: all 1s;
    -webkit-transform: rotateY(-360deg);
        -ms-transform: rotateY(-360deg);
        transform: rotateY(-360deg);
} */


.ads{
   max-width: 0px !important;
   white-space: nowrap;
   overflow: hidden;
   text-overflow: ellipsis;
   }

</style>