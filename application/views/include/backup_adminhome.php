<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<script src="<?php echo base_url() ?>assets/js/dashboard.js" ></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet">
<link href="<?php echo base_url() ?>assets/css/daterangepicker.css" rel="stylesheet">
<link href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.2.2/css/bootstrap.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="<?php echo base_url() ?>my-assets/css/style.css">
<link href="<?php echo base_url() ?>my-assets/css/sb-admin-2.min.css" rel="stylesheet">
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<!-- Admin Home Start -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="header-icon">
         <i class="pe-7s-world"></i>
      </div>
      <div class="header-title">
         <h1><?php echo display('dashboard') ?></h1>
         <small><?php echo display('home') ?></small>
         <ol class="breadcrumb">
            <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
            <li class="active"><?php echo display('dashboard') ?></li>
         </ol>
      </div>
   </section>
   <!-- Main content -->
   <section class="content">
      <!-- Alert Message -->
      <style>
         .btn-success{
         background: transparent;
         color: white;
         border: 1px solid white;
         }
      </style>
      <style>
         .box-para div {
         clear: none; 
         }
         .footer{
         float:top;
         }
         .cards {
         display: grid;
         grid-template-columns: repeat(4, 1fr);
         grid-gap: 1.2rem;
         margin-top: 1rem;
         padding:5px;
         overflow: hidden;
         height: auto;
         }
         .card-single {
         display: flex;
         justify-content: space-between;
         background: rgba(237, 233, 232);
         backdrop-filter: blur(16px);
         padding:5px;
         border-radius: 10px;
         box-shadow: 0 0 20px rgba(0, 0, 0, .2);
         overflow: hidden;
         filter: brightness(120%);
         transition: all 400ms;
         }
         .cards .card-single {
         height: 100px;
         }
         .card-single:hover {
         transform: scale(1.04);
         border-radius: 25px;
         }
         a{
         text-decoration:none;
         }
         .card-single div:last-child span {
         font-size: 3rem;
         background: var(--pink);
         -webkit-text-fill-color: transparent;
         text-fill-color: transparent;
         -webkit-background-clip: text;
         background-clip: text;
         }
         .card-single div:first-child span {
         text-transform: uppercase;
         color: #fff;
         }
         .recent-grid {
         margin-top: 3.5rem;
         display: grid;
         grid-gap: 2rem;
         grid-template-columns: 65% auto;
         }
         .card {
         /* 	background:#fff; */
         /* // background: rgba(0, 0, 0, .2); */
         backdrop-filter: blur(16px);
         border-radius: 10px;
         }
         .text {
         color:white;
         position: absolute;
         bottom: 0px;
         text-align: center;
         width:100%;
         background: blue;
         border: solid 1px black;
         }
         b, strong {
         font-size: 16px;
         font-weight: bolder;
         }
         #span{
         font-size: 30px;
         line-height: 50px;
         color: white;
         width: 50px;
         height: 50px;
         text-align: center;
         vertical-align: bottom;
         }
         form {
         margin: 0 0 0px;
         }
      </style>
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
      <div class="">
         <div style="<?php if($sale_setting=='disable'){ echo "display: none;"; }else{ echo "display: block;"; } ?>" >
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
               <div class="card border-left-primary shadow h-100 py-2">
                  <div class="card-body" style="height: 90px;font-size: xx-large;">
                     <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                           <i class="fa fa-money"  style="float:right;border-radius:10px;padding: 5px 10px 5px 10px;background-color:#4775d1;color:white;" aria-hidden="true"></i>
                           <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                              <?php echo display('Total Sales') ?>
                           </div>
                           <div class="h5 mb-0 font-weight-bold text-gray-800">
                              <?php
                                 if($this->Reports->overall_sales()){
                                 echo  html_escape($currency).html_escape($this->Reports->overall_sales());
                                 }else{
                                     echo  html_escape($currency)."0";
                                 }?>
                           </div>
                        </div>
                        <div class="col-auto">
                           <!-- <i class="fas fa-calendar fa-2x text-gray-300"></i> -->
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div style="<?php if($expense_setting=='disable'){ echo "display: none;"; }else{ echo "display: block;"; } ?>" >
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
               <div class="card border-left-success shadow h-100 py-2">
                  <div class="card-body" style="height: 90px;font-size: xx-large;">
                     <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                           <i class='fa fa-credit-card-alt' style="float:right;border-radius:10px;padding: 5px 10px 5px 10px;background-color:#53c68c;color:white;" aria-hidden="true"></i>
                           <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                              <?php echo display('Total Expense') ?> 
                           </div>
                           <div class="h5 mb-0 font-weight-bold text-gray-800">
                              <?php
                                 if($this->Reports->overall_purchase_amt()){
                                 echo  html_escape($currency).html_escape($this->Reports->overall_purchase_amt());
                                 }else{
                                     echo  html_escape($currency)."0";
                                 }?>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div style="<?php if($sale_invoice_setting=='disable'){ echo "display: none;"; }else{ echo "display: block;"; } ?>" >
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
               <div class="card border-left-info shadow h-100 py-2">
                  <div class="card-body" style="height: 90px;font-size: xx-large;">
                     <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                           <i class='fa fa-line-chart'  style="float:right;border-radius:10px;padding: 5px 10px 5px 10px;background-color:#47d1d1;color:white;"></i>
                           <div class="text-xs font-weight-bold text-info text-uppercase mb-1"><?php echo display('Profit') ?>
                           </div>
                           <div class="row no-gutters align-items-center">
                              <div class="col-auto">
                                 <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                    <?php 
                                       $value=$this->Reports->overall_purchase_amt()-$this->Reports->overall_sales();
                                       $string = preg_replace('/[^\p{L}\p{N}\s]/u', '', $value);
                                       echo html_escape($currency).$string;
                                       ?>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div style="<?php if($expense_invoice_setting=='disable'){ echo "display: none;"; }else{ echo "display: block;"; } ?>" >
            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
               <div class="card border-left-warning shadow h-100 py-2">
                  <div class="card-body" style="height: 90px;font-size: xx-large;">
                     <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                           <i class="fa fa-shopping-bag" style="float:right;border-radius:10px;padding: 5px 10px 5px 10px;background-color:#ffd633;color:white;"></i>
                           <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                              <?php echo display('No. of Products') ?>
                           </div>
                           <div class="h5 mb-0 font-weight-bold text-gray-800">
                              <?php echo $total_product ;  ?>
                           </div>
                        </div>
                        <div class="col-auto">
                           <!-- <i class="fas fa-comments fa-2x text-gray-300"></i> -->
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="">
         <div>
            <!-- Area Chart -->
            <div  style="<?php if($product_sold=='disable'){ echo "display: none;"; }else{ echo "display: block;"; } ?>"   class="col-xl-8 col-lg-7">
               <div class="card shadow mb-2" id="print">
                  <!-- Card Header - Dropdown -->
                  <div class="card-header py-3 d-flex flex-row " style="font-size:12px;text-align:center;">
                     <h6 class="m-0 font-weight-bold text-primary"><?php echo display('Sales and Expense Overview') ?></h6>
                     <div class="no-arrow" style="margin-left: auto;">
                        <span>  <i class="fa fa-download" id="click"  style="color:#38469f;" aria-hidden="true"></i> </span>
                     </div>
                  </div>
                  <!-- Card Body -->
                  <div class="card-body">
                     <div class="chart-area">
                        <!-- <div id="myAreaChart" name="myAreaChart"  class="myAreaChart"></div> -->
                        <div class="col-xl-3 col-md-3 mb-4" style="margin-top:40px;">
                           <div class="card border-left-primary  shadow h-100 py-2">
                              <div class="card-body">
                                 <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                       <div class="text-xs font-weight-bold text-primary  text-uppercase mb-1">
                                          <?php echo display('SALES') ?>
                                       </div>
                                       <div class="h5 mb-0  text-gray-800">
                                          <b> <?php echo display('No. of Sales') ?> :</b>
                                          <div id="no_of_sales"></div>
                                          <b> <?php echo display('Total Amount') ?>:</b>
                                          <div id="t_s_a"></div>
                                          <b>  <?php echo display('Total Paid Amount') ?> :</b>
                                          <div id="t_p_a"></div>
                                          <b>  <?php echo display('Total Due Amount') ?> :</b>
                                          <div id="t_d_a"></div>
                                          <div id="container"></div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-xl-3 col-md-3 mb-4" style="margin-top:40px;">
                           <div class="card border-left-success shadow h-100 py-2">
                              <div class="card-body">
                                 <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                       <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                          <?php echo display('Expense') ?>
                                       </div>
                                       <div class="h5 mb-0  text-gray-800">
                                          <b> <?php echo display('No. of Expense') ?> :</b>
                                          <div id="no_of_exp"></div>
                                          <b> <?php echo display('Total Amount') ?>:</b>
                                          <div id="t_x_a"></div>
                                          <b>  <?php echo display('Total Paid Amount') ?> :</b>
                                          <div id="t_xp_a"></div>
                                          <b>  <?php echo display('Total Due Amount') ?> :</b>
                                          <div id="t_xd_a"></div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-xl-3 col-md-3 mb-4" style="margin-top:40px;">
                           <div class="card border-left-info shadow h-100 py-2">
                              <div class="card-body">
                                 <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                       <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                          <?php echo display('Todays Sales')?>
                                       </div>
                                       <div class="h5 mb-0 font-weight-bold text-gray-800">
                                          <div class="h5 mb-0  text-gray-800">
                                             <b> <?php echo display('No. of Sales')?> :</b>
                                             <div id="today_sale"></div>
                                             <b> <?php echo display('Total Amount')?>:</b>
                                             <div id="today_s_a"></div>
                                             <b> <?php echo display('Total Paid Amount')?> :</b>
                                             <div id="today_s_p"></div>
                                             <b>  <?php echo display('Total Due Amount')?> :</b>
                                             <div id="today_s_d"></div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-auto">
                                       <!-- <i class="fas fa-comments fa-2x text-gray-300"></i> -->
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-xl-3 col-md-3 mb-4" style="margin-top:40px;">
                           <div class="card border-left-warning shadow h-100 py-2">
                              <div class="card-body">
                                 <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                       <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                          <?php echo display('Todays Expense')?>
                                       </div>
                                       <div class="h5 mb-0 font-weight-bold text-gray-800">
                                          <div class="h5 mb-0  text-gray-800">
                                             <b> <?php echo display('No. of Expense')?> :</b>
                                             <div id="today_exp"></div>
                                             <b> <?php echo display('Total Amount')?>:</b>
                                             <div id="today_ex_a"></div>
                                             <b>  <?php echo display('Total Paid Amount')?> :</b>
                                             <div id="today_ex_p"></div>
                                             <b>  <?php echo display('Total Due Amount')?> :</b>
                                             <div id="today_ex_d"></div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-auto">
                                       <!-- <i class="fas fa-comments fa-2x text-gray-300"></i> -->
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div style="<?php if($product_purchased=='disable'){ echo "display: none;"; }else{ echo "display: block;"; } ?>" >
               <!-- Pie Chart -->
               <div class="col-xl-4 col-lg-5">
                  <div class="card shadow mb-4" style="height: 460px;">
                     <!-- Card Header - Dropdown -->
                     <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between" style="height:50px;">
                        <h6 class="m-0 font-weight-bold text-primary">
                           <?php echo form_open_multipart('Admin_dashboard/index',array('class' => 'form-vertical', 'id' => 'insert_sale','name' => 'insert_sale'))?>
                           <table>
                              <tr>
                                 <td>
                                    <input  style="width: 220px;" class="form-control daterangepicker-field" name="daterangepicker-field" autocomplete="off" id="daterangepicker-field" value="<?php echo $searchdate;?>"></input>
                                 </td>
                                 <td>
                                    &nbsp;&nbsp; <input type="submit" style="color:white;background-color: #38469f;" class="btn-sm" name="btnSearch" id="submit1" value=" <?php echo display('submit') ?>" />
                                 </td>
                              </tr>
                           </table>
                        </h6>
                     </div>
                     <!-- Card Body -->
                     <div class="card-body">
                        <div class="chart-pie pt-1 pb-2">
                           <div  style="<?php if($yearly_reportsetting=='disable'){ echo "display: none;"; }else{ echo "display: block;"; } ?>">
                              <div id="chartContainer" name="chartContainer"  class="pie chartcontainer" style="height:370px;"></div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div style="<?php  if($no_of_vendor=='disable'){ echo "display: none;"; }else{ echo "display: block;"; } ?>" >
               <div class="col-xl-4 col-md-6 mb-4" style="height:100px;  width :550px;">
                  <div class="card border-left-primary shadow h-100 py-2">
                     <div class="card-body" style="height: 50px;font-size: xx-large;">
                        <div class="row no-gutters align-items-center">
                           <div class="col mr-2">
                              <i class="fa fa-user-secret" aria-hidden="true" style="float:right;border-radius:10px;padding: 5px 10px 5px 10px;background-color:#4775d1;color:white;"></i>
                              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                 <?php echo display('No. of Vendors') ?>
                              </div>
                              <div class="h5 mb-0 font-weight-bold text-gray-800">
                                 <?php echo $total_suppliers ;  ?>
                              </div>
                           </div>
                           <div class="col-auto">
                              <!-- <i class="fas fa-comments fa-2x text-gray-300"></i> -->
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div style="<?php if($todays_overviewsetting=='disable'){ echo "display: none;"; }else{ echo "display: block;"; } ?>" >
               <div class="col-xl-4 col-md-6 mb-4" style="height:100px; width :550px;">
                  <div class="card border-left-success shadow h-100 py-2">
                     <div class="card-body" style="height: 50px;font-size: xx-large;">
                        <div class="row no-gutters align-items-center">
                           <div class="col mr-2">
                              <i class="fa fa-users" aria-hidden="true" style="float:right;border-radius:10px;padding: 5px 10px 5px 10px;background-color:#53c68c;;color:white;"></i>
                              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                 <?php echo display('No. of Customers') ?>
                              </div>
                              <div class="h5 mb-0 font-weight-bold text-gray-800">
                                 <?php echo $total_customer ;  ?>
                              </div>
                           </div>
                           <div class="col-auto">
                              <!-- <i class="fas fa-comments fa-2x text-gray-300"></i> -->
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!--<div style="<?php if($yearly_reportsetting=='disable'){ echo "display: none;"; }else{ echo "display: block;"; } ?>" >-->
            <!--   <div class="col-xl-4 col-md-6 mb-4" style="height:100px; width :550px;">-->
            <!--      <div class="card border-left-info shadow h-100 py-2">-->
            <!--         <div class="card-body" style="height: 50px;font-size: xx-large;">-->
            <!--            <div class="row no-gutters align-items-center">-->
            <!--               <div class="col mr-2">-->
            <!--                  <i class='fa fa-user-o'  style="float:right;border-radius:10px;padding: 5px 10px 5px 10px;background-color:#47d1d1;color:white;"></i>-->
            <!--                  <div class="text-xs font-weight-bold text-info text-uppercase mb-1">-->
            <!--                     <?php echo display('No. of Employees')?>-->
            <!--                  </div>-->
            <!--                  <div class="h5 mb-0 font-weight-bold text-gray-800">-->
            <!--                     <?php echo "0" ;  ?>-->
            <!--                  </div>-->
            <!--               </div>-->
            <!--               <div class="col-auto">-->
                              <!-- <i class="fas fa-comments fa-2x text-gray-300"></i> -->
            <!--               </div>-->
            <!--            </div>-->
            <!--         </div>-->
            <!--      </div>-->
            <!--   </div>-->
            <!--</div>-->
             <?php if($_SESSION['u_type'] == 3) { ?>
               <div class="col-xl-3 col-md-3 mb-3" style=" <?php if($invoice_setting=='disable'){ echo "display: none;"; }else{ echo "display: block;"; } ?> height:100px; width :550px;">
                  <div class="card border-left-info shadow h-100 py-2" style="border-left: 0.25rem solid #4e73df !important;">
                     <div class="card-body" style="height: 50px;font-size: xx-large;">
                        <div class="row no-gutters align-items-center">
                           <div class="col mr-2">
                              <i class='fa fa-usd'  style="float:right;border-radius:10px;padding: 5px 10px 5px 10px;background-color:#4e73df;color:white;"></i>
                              <div class="text-xs font-weight-bold text-info text-uppercase mb-1" style="color: #4e73df !important;">
                                 Total Expense Amount
                              </div>
                              <div class="h5 mb-0 font-weight-bold text-gray-800">
                                 <?php if(empty($expenseamt)){echo "0";}else{echo $currency . $expenseamt;}  ?>

                              </div>
                           </div>
                           <div class="col-auto">
                              <!-- <i class="fas fa-comments fa-2x text-gray-300"></i> -->
                           </div>
                        </div>
                     </div>
                  </div>
               </div>

               <div class="col-xl-3 col-md-3 mb-3" style="<?php if($expense_settings=='disable'){ echo "display: none;"; }else{ echo "display: block;"; } ?> height:100px; width :550px;">
                  <div class="card border-left-info shadow h-100 py-2" style="border-left: 0.25rem solid #1cc88a !important;">
                     <div class="card-body" style="height: 50px;font-size: xx-large;">
                        <div class="row no-gutters align-items-center">
                           <div class="col mr-2">
                              <i class='fa fa-bank' style="float:right;border-radius:10px;padding: 5px 10px 5px 10px;background-color:#1cc88a ;color:white;"></i>
                              <div class="text-xs font-weight-bold text-info text-uppercase mb-1" style="color: #1cc88a !important;">
                                 Loan Amount Outstanding
                              </div>
                              <div class="h5 mb-0 font-weight-bold text-gray-800">
                                 <?php if(empty($outstanding_loan)){echo "0";}else{echo $currency . $outstanding_loan;}  ?>

                              </div>
                           </div>
                           <div class="col-auto">
                              <!-- <i class="fas fa-comments fa-2x text-gray-300"></i> -->
                           </div>
                        </div>
                     </div>
                  </div>
               </div>

               <div class="col-xl-3 col-md-3 mb-3" style="<?php if($timesheet_setting=='disable'){ echo "display: none;"; }else{ echo "display: block;"; } ?> height:100px; width :550px;">
                  <div class="card border-left-info shadow h-100 py-2" style="border-left: 0.25rem solid #36b9cc !important;">
                     <div class="card-body" style="height: 50px;font-size: xx-large;">
                        <div class="row no-gutters align-items-center">
                           <div class="col mr-2">
                              <i class='fa fa-calendar'  style="float:right;border-radius:10px;padding: 5px 10px 5px 10px;background-color:#36b9cc;color:white;"></i>
                              <div class="text-xs font-weight-bold text-info text-uppercase mb-1" style="color: #36b9cc !important;">
                                 Daily Working Hours
                              </div>
                              <div class="h5 mb-0 font-weight-bold text-gray-800">
                                 <?php if(empty($getHours[0]['hours_per_day'])){echo "0";}else{echo round($getHours[0]['hours_per_day']);}  ?>
                              </div>
                           </div>
                           <div class="col-auto">
                              <!-- <i class="fas fa-comments fa-2x text-gray-300"></i> -->
                           </div>
                        </div>
                     </div>
                  </div>
               </div>

               <div class="col-xl-3 col-md-3 mb-3" style="<?php if($workinghours_setting=='disable'){ echo "display: none;"; }else{ echo "display: block;"; } ?> height:100px; width :550px;">
                  <div class="card border-left-info shadow h-100 py-2" style="border-left: 0.25rem solid #f6c23e !important;">
                     <div class="card-body" style="height: 50px;font-size: xx-large;">
                        <div class="row no-gutters align-items-center">
                           <div class="col mr-2">
                              <i class='fa fa-clock-o'  style="float:right;border-radius:10px;padding: 5px 10px 5px 10px;background-color:#f6c23e;color:white;"></i>
                              <div class="text-xs font-weight-bold text-info text-uppercase mb-1" style="color: #f6c23e !important;">
                                 Total Working Hours (Montly)
                              </div>
                              <div class="h5 mb-0 font-weight-bold text-gray-800">
                                 <?php if(empty($total_workinghours)){echo "0";}else{echo round($total_workinghours);}  ?>
                              </div>
                           </div>
                           <div class="col-auto">
                              <!-- <i class="fas fa-comments fa-2x text-gray-300"></i> -->
                           </div>
                        </div>
                     </div>
                  </div>
               </div>

               <!-- <div class="col-xl-3 col-md-3 mb-3" style="height:100px; width :550px;">
                  <div class="card border-left-info shadow h-100 py-2" style="border-left: 0.25rem solid #4e73df !important;">
                     <div class="card-body" style="height: 50px;font-size: xx-large;">
                        <div class="row no-gutters align-items-center">
                           <div class="col mr-2">
                              <i class='fa fa-usd'  style="float:right;border-radius:10px;padding: 5px 10px 5px 10px;background-color:#4e73df;color:white;"></i>
                              <div class="text-xs font-weight-bold text-info text-uppercase mb-1" style="color: #4e73df !important;">
                                 Total Sales Amount
                              </div>
                              <div class="h5 mb-0 font-weight-bold text-gray-800">
                                 <?php //if(empty($total_workinghours)){echo "0";}else{echo round($total_workinghours);}  ?>
                              </div>
                           </div>
                           <div class="col-auto">
                              
                           </div>
                        </div>
                     </div>
                  </div>
               </div> -->

                <!-- <div class="col-xl-3 col-md-3 mb-3" style="height:100px; width :550px;">
                  <div class="card border-left-info shadow h-100 py-2" style="border-left: 0.25rem solid #1cc88a !important;">
                     <div class="card-body" style="height: 50px;font-size: xx-large;">
                        <div class="row no-gutters align-items-center">
                           <div class="col mr-2">
                              <i class='fa fa-usd'  style="float:right;border-radius:10px;padding: 5px 10px 5px 10px;background-color:#1cc88a;color:white;"></i>
                              <div class="text-xs font-weight-bold text-info text-uppercase mb-1" style="color: #1cc88a !important;">
                                 Total Expense Amount
                              </div>
                              <div class="h5 mb-0 font-weight-bold text-gray-800">
                                 <?php //if(empty($total_workinghours)){echo "0";}else{echo round($total_workinghours);}  ?>
                              </div>
                           </div>
                           <div class="col-auto">
                             
                           </div>
                        </div>
                     </div>
                  </div>
               </div> -->
            
            
            <div class="col-xl-7 col-lg-8">
              <!--<div id="chart_div" style="width: 100%; height: 500px;"></div>-->
               <div id="columnchart_material" style="width: 100%; height: 500px;"></div>
            </div>

            <div class="col-xl-5 col-lg-4">
              <div id="piechart" style="width: 100%; height: 500px;"></div>
            </div>

            <?php } ?>  
         </div>
      </div>
      <style>
         .py-3    {
         padding-top: 1rem !important;
         }
      </style>
      <!-- First Counter -->
      <?php //best_sales_product   if ($this->session->userdata('user_type') == '1') { ?>
      <div class="row" style="<?php  if($bestofProduct=='disable'){ echo "display: none;"; }else{ echo "display: block;"; } ?>">
         <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
               <!-- Card Header - Dropdown -->
               <div class="card-header py-3 d-flex flex-row " style="font-size:12px;text-align:center;">
                  <h6 class="m-0 font-weight-bold text-primary"><?php echo display('Best 10 Sales Product') ?> (<span style="font-size:13px;"><?php echo date("Y"); ?></span>)</h6>
               </div>
               <!-- Card Body -->
               <div class="card-body" style="padding:0;">
                  <div class="chart-area">
                     <div id="mygraph" name="mygraph" style="height:330px;"></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <?php  //} ?>
      <?php
         if(isset($_POST['btnSearch'])){
             $s = $_REQUEST["daterangepicker-field"];
           
         }
         $prev_month = date('Y-m-d', strtotime('first day of january this year'));
         $current=date('Y-m-d');
         $dat2= $prev_month."to". $current;
         
         $searchdate =(!empty($s)?$s:$dat2);
             $dat = str_replace(' ', '', $searchdate);
             $split=explode("to",$dat);
         ?>
      <div class="">
         <!-- Total Report -->
         <div style="<?php if($sale_setting=='disable'){ echo "display: none;"; }else{ echo "display: block;"; } ?>" >
            <!-- This today transaction progress -->
            <div class="col-sm-12 col-md-12" style="<?php //if($todays_sales_reportsetting=='disable'){ echo "display: none;"; }else{ echo "display: block;"; } ?>">
               <div class="panel panel-bd">
                  <div class="panel-heading">
                     <div class="panel-title">
                        <h4 class="charttitle"> <?php echo display('todays_sales_report') ?></h4>
                     </div>
                  </div>
                  <div class="panel-body">
                     <div class="table-responsive todayssaletitle">
                        <?php 
                           if( $todays_sales_report_detail)
                                    {  ?>
                        <table class="table table-bordered table-striped table-hover">
                           <thead>
                              <tr>
                                 <th><?php echo display('sl') ?></th>
                                 <th><?php echo display('customer_name') ?></th>
                                 <th><?php echo display('invoice_no') ?></th>
                                 <th><?php echo display('total_amount') ?></th>
                                 <th><?php echo display('paid_ammount') ?></th>
                              </tr>
                           </thead>
                           <?php  } ?>
                           <tbody>
                              <?php
                                 $ttl_amount = $ttl_paid = $ttl_due = $ttl_discout = $ttl_receipt = 0;
                                 $todays = date('Y-m-d');
                                 if( $todays_sales_report_detail)
                                 {
                                    $sl = 0;
                                 foreach ($todays_sales_report_detail as $single) {
                                 
                                 
                                        $sl++;
                                        ?>
                              <tr>
                                 <td><?php echo $sl; ?></td>
                                 <td>
                                    <a href="<?php echo base_url(); ?>Ccustomer/customer_ledger_report">
                                    <?php echo html_escape($single['customer_name']); ?>
                                    </a>
                                 </td>
                                 <td>
                                    <a href="<?php echo base_url() . 'Cinvoice/invoice_inserted_data/'; ?><?php echo html_escape($single->invoice_id); ?>">
                                    <?php echo html_escape($single['invoice']); ?>
                                    </a>
                                 </td>
                                 <td class="text-right">
                                    <?php
                                       $ttl_amount += $single['total_amount']; 
                                       echo html_escape(number_format($single['total_amount'], '2','.',',')); 
                                       ?>
                                 </td>
                                 <td class="text-right">
                                    <?php
                                       $ttl_paid += $single['paid_amount'];
                                       echo html_escape(number_format($single['paid_amount'], '2', '.', ',')); ?>
                                 </td>
                              </tr>
                              <?php
                                 }
                                 } else {
                                 ?>
                              <tr>
                                 <th class="text-center" colspan="5"><?php echo display('not_found'); ?></th>
                              </tr>
                              <?php } ?>
                           </tbody>
                           <?php  
                              if(is_array($todays_sales_report_detail) && count($todays_sales_report_detail)>0)
                                {  ?>
                           <tfoot>
                              <tr>
                                 <td colspan="3" align="right">&nbsp;<b><?php echo display('total') ?>:</b></td>
                                 <td class="text-right">
                                    <?php
                                       $ttl_amount_float = html_escape(number_format($ttl_amount, '2', '.',','));
                                       echo (($position == 0) ? "$currency $ttl_amount_float" : "$ttl_amount_float $currency"); ?>
                                 </td>
                                 <td class="text-right">
                                    <?php
                                       $ttl_paid_float = html_escape(number_format($ttl_paid, '2', '.',','));
                                       echo (($position == 0) ? "$currency $ttl_paid_float" : "$ttl_paid_float $currency"); ?>
                                 </td>
                                 <?php  } ?>
                              </tr>
                           </tfoot>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <input type="hidden" id="currency" value="<?php echo  html_escape($currency)?>" name="">
      <input type="hidden" id="totalsalep" value="<?php echo html_escape($this->Reports->total_sales_amount($split[0],$split[1]))?>" name="">
      <input type="hidden" id="no_of_sale" value="<?php
         echo html_escape($this->Reports->total_sales_report($split[0],$split[1]))?>" name="">
      <input type="hidden" id="no_of_expense" value="<?php
         echo html_escape($this->Reports->total_expense_product($split[0],$split[1]))?>" name="">
      <input type="hidden" id="totalplurchasep" value="<?php
         echo html_escape($this->Reports->total_purchase_amount($split[0],$split[1]))?>" name="">
      <input type="hidden" id="overall_sales" value="<?php
         echo html_escape($this->Reports->overall_sales())?>" name="">
      <input type="hidden" id="sales_paid" value="<?php
         echo html_escape($this->Reports->sales_paid())?>" name="">
      <input type="hidden" id="sales_due" value="<?php
         echo html_escape($this->Reports->sales_due())?>" name="">
      <input type="hidden" id="n_sale" value="<?php
         echo html_escape($this->Reports->overall_sale_no())?>" name=""> 
      <input type="hidden" id="month" value="<?php echo html_escape($month);?>" name="">
      <input type="hidden" id="tlvmonthsale" value="<?php echo html_escape($tlvmonthsale);?>" name="">
      <input type="hidden" id="tlvmonthpurchase" value="<?php echo html_escape($tlvmonthpurchase);?>" name=""> 
      <input type="hidden" id="salspurhcaselabel"  value="<?php echo display("sales_and_purchase_report_summary");?>- <?php echo  date("Y")?>" name="">     
      <input type="hidden" id="overall_expense" value="<?php
         echo html_escape($this->Reports->overall_purchase_amt())?>" name="">
      <input type="hidden" id="exp_paid" value="<?php
         echo html_escape($this->Reports->exp_paid())?>" name="">
      <input type="hidden" id="exp_due" value="<?php
         echo html_escape($this->Reports->exp_due())?>" name="">
      <input type="hidden" id="n_exp" value="<?php
         echo html_escape($this->Reports->overall_exp_no())?>" name=""> 
      <input type="hidden" id="today_n_sale" value="<?php
         echo html_escape($this->Reports->today_no_of_sale())?>" name="">
      <input type="hidden" id="today_sale_due" value="<?php
         echo html_escape($this->Reports->today_sale_due())?>" name="">
      <input type="hidden" id="today_sale_paid" value="<?php
         echo html_escape($this->Reports->today_sale_paid())?>" name=""> 
      <input type="hidden" id="today_n_ex" value="<?php
         echo html_escape($this->Reports->today_no_of_ex())?>" name="">
      <input type="hidden" id="today_ex" value="<?php
         echo html_escape($this->Reports->todays_total_purchase_report())?>" name="">
      <input type="hidden" id="today_ex_due" value="<?php
         echo html_escape($this->Reports->today_ex_due())?>" name="">
      <input type="hidden" id="today_ex_paid" value="<?php
         echo html_escape($this->Reports->today_ex_paid())?>" name=""> 
      <input type="hidden" id="bestsalelabel" value='<?php echo html_escape($chart_label);?>' name=""> 
      <input type="hidden" id="bestsaledata" value='<?php echo html_escape($chart_data);?>' name=""> 
      <!--<input type="hidden" value='<?php// @$seperatedData = explode(',', $chart_data); echo html_escape(($seperatedData[0] + 10));?>' name="" id="bestsalemax">  -->   
   </section>
   <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- Admin Home end -->
<!-- ChartJs JavaScript -->
<!-- partial --> <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/knockout/3.4.0/knockout-debug.js'></script>
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
<script  src="<?php echo base_url() ?>my-assets/js/script.js"></script>
<script>
   var cache_width = $('#print').width(); //Criado um cache do CSS
      var a4 = [595.28, 841.89]; // Widht e Height de uma folha a4
   
      $(document).on("click", '#click', function () {
          // Setar o width da div no formato a4
       
   
          // Aqui ele cria a imagem e cria o pdf
          html2canvas($('#print'), {
              onrendered: function (canvas) {
                  var img = canvas.toDataURL("image/jpeg", 1.0);
                  //var doc = new jsPDF({ unit: 'px', format: 'a4' });//this line error
                  var doc = new jsPDF('landscape'); // default is portrait
                  doc.addImage(img, 'JPEG', 20, 20);
                  doc.save('Sales_Expense_Overview.pdf');
                  //Retorna ao CSS normal
                  $('#print').width(cache_width);
              }
          });
      }); 
   //create data object here so we can dynamically set new csrfName/Hash
   
   $('#submit1').on('click', function (e) {
          
          var date=$('#daterangepicker-field').val();
          sessionStorage.setItem("daterange", date);
     
    });
   
                                  
   $(function() { 
      if($('#today_n_sale').val()){
   $('#today_sale').html($('#today_n_sale').val());
      }else{
        $('#today_sale').html("0");  
      }
   
          if($('#today_sal').val()){
   $('#today_s_a').html($("#currency").val()+''+$('#today_sal').val());
       }else{
        $('#today_s_a').html($("#currency").val()+''+"0");  
       } 
   
          if($('#today_sale_paid').val()){
   $('#today_s_p').html($("#currency").val()+''+$('#today_sale_paid').val());
      }else{
        $('#today_s_p').html($("#currency").val()+''+"0");  
      } 
   
   
          if($('#today_sale_due').val()){
   $('#today_s_d').html($("#currency").val()+''+$('#today_sale_due').val());
      }else{
        $('#today_s_d').html($("#currency").val()+''+"0");  
      } 
   
   
   
      //   For Today's Expense 
                if($('#today_n_ex').val()){
   $('#today_exp').html($('#today_n_ex').val());
      }else{
        $('#today_exp').html("0");  
      }
   
   if($('#today_n_ex').val()){
   //     //  today_sal  
          
   
   $('#today_ex_a').html($("#currency").val()+''+$("#today_ex").val());
      }else{
         $('#today_ex_a').html($("#currency").val()+''+"0");  
       } 
   
      // if($('#today_sal').val()){
      // $('#today_s_a').html($("#currency").val()+''+$('#today_sal').val());
      // }else{
      //   $('#today_s_a').html($("#currency").val()+''+"0");  
      // } 
   
   
          if($('#today_ex_paid').val()){
   $('#today_ex_p').html($("#currency").val()+''+$('#today_ex_paid').val());
      }else{
        $('#today_ex_p').html($("#currency").val()+''+"0");  
      } 
          if($('#today_ex_due').val()){
   $('#today_ex_d').html($("#currency").val()+''+$('#today_ex_due').val());
      }else{
        $('#today_ex_d').html($("#currency").val()+''+"0");  
      } 
   
      if($('#n_sale').val()){
   $('#no_of_sales').html($('#n_sale').val());
      }else{
        $('#no_of_sales').html("0");  
      }
   
      // $('#no_of_sales').html($('#n_sale').val());
      if($('#overall_sales').val()){
   $('#t_s_a').html($("#currency").val()+''+$('#overall_sales').val());
      }else{
        $('#t_s_a').html($("#currency").val()+''+"0");  
      }
      
      // $('#t_s_a').html($("#currency").val()+''+$('#overall_sales').val());
      // $('#t_p_a').html($("#currency").val()+''+$('#sales_paid').val());
      if($('#sales_paid').val()){
   $('#t_p_a').html($("#currency").val()+''+$('#sales_paid').val());
      }else{
        $('#t_p_a').html($("#currency").val()+''+"0");  
      }
      if($('#sales_due').val()){
   $('#t_d_a').html($("#currency").val()+''+$('#sales_due').val());
      }else{
        $('#t_d_a').html($("#currency").val()+''+"0");  
      }
      // $('#t_d_a').html($("#currency").val()+''+$('#sales_due').val());
                  
      if($('#n_exp').val()){
   $('#no_of_exp').html($('#n_exp').val());
      }else{
        $('#no_of_exp').html("0");  
      }
   
      if($('#overall_expense').val()){
   $('#t_x_a').html($("#currency").val()+''+$('#overall_expense').val());
      }else{
        $('#t_x_a').html($("#currency").val()+''+"0");  
      }
   
   
      if($('#exp_paid').val()){
   $('#t_xp_a').html($("#currency").val()+''+$('#exp_paid').val());
      }else{
        $('#t_xp_a').html($("#currency").val()+''+"0");  
      }
   
   
      if($('#exp_due').val()){
   $('#t_xd_a').html($("#currency").val()+''+$('#exp_due').val());
      }else{
        $('#t_xd_a').html($("#currency").val()+''+"0");  
      }
   // $('#no_of_exp').html($('#n_exp').val());
   // $('#t_x_a').html($("#currency").val()+''+$('#overall_expense').val());
   // $('#t_xp_a').html($("#currency").val()+''+$('#exp_paid').val());
   // $('#t_xd_a').html($("#currency").val()+''+$('#exp_due').val());
   //   sessionStorage.clear();
   var today = new Date();
   var dd = String(today.getDate()).padStart(2, '0');
   var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
   var yyyy = today.getFullYear();
   today = yyyy + '-' + mm + '-' + dd;
   var firstdate = new Date().getFullYear()+'-01-01';
   
   var retrieve =sessionStorage.getItem("daterange");
   if(retrieve==null){
      $('#daterangepicker-field').val(firstdate+" to "+today);
   }else{
   $('#daterangepicker-field').val(retrieve);
   }
   
   });
   
   
   
</script>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- xcharts includes -->
<script src="//cdnjs.cloudflare.com/ajax/libs/d3/2.10.0/d3.v2.js"></script>
<script src="<?php echo base_url() ?>assets/js/xcharts.min.js"></script>
<!-- The daterange picker bootstrap plugin -->
<script src="<?php echo base_url() ?>assets/js/sugar.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/daterangepicker.js"></script>
<!-- Our main script file -->
<script src="<?php echo base_url() ?>assets/js/script.js"></script>
<!-- BSA AdPacks code. Please ignore and remove.-->
<script>
   $(function () {
     
     var chart;
     $(document).ready(function() {
      $.getJSON("<?php  echo base_url()  ?>Cinvoice/best_sales_products/", function(json) {
   
       var product=[];
     var count=[];
   
     $.each(json, function(i, item) {
   
      product.push(json[i].name);
      count.push(json[i].data);
     
     
   });
   var pa=product.toString();
   // var result = '\'' + pa.split(',').join('\',\'') + '\'';
   // var v="["+result+"]";
    var bestsaledata = pa.split(",");
    
       chart = new Highcharts.Chart({
        chart: {
         renderTo: 'mygraph',
         type: 'line'
         
        },
        title: {
         text: ''
         
        },
        subtitle: {
         text: ''
        
        },
        xAxis: {
         categories:bestsaledata,
          title: {
          text: 'Products'
         },
        },
        yAxis: {
           categories: count,
         title: {
          text: 'Quantity'
         },
         plotLines: [{
          value: 0,
          width: 1,
          color: '#808080'
         }]
        },
          
        tooltip: {
         formatter: function() {
           return '<b>'+ this.x +'</b><br/>'+
          ': '+ this.y;
         }
        },
        credits: {
      enabled: false
   },
        legend: {
          
         enabled: false
        },
        series: json
       });
      });
     
     });
     
    });
    
    
   
   
   
   
   $(function() {
   
   // Set the default dates
   var startDate	= Date.create().addDays(-6),	// 7 days ago
      endDate		= Date.create(); 				// today
   
   var range = $('#range');
   
   // Show the dates in the range input
   range.val(startDate.format('{MM}/{dd}/{yyyy}') + ' - ' + endDate.format('{MM}/{dd}/{yyyy}'));
   
   // Load chart
   ajaxLoadChart(startDate,endDate);
   
   range.daterangepicker({
      
      startDate: startDate,
      endDate: endDate,
      
      ranges: {
          'Today': ['today', 'today'],
          'Yesterday': ['yesterday', 'yesterday'],
          'Last 7 Days': [Date.create().addDays(-6), 'today'],
          'Last 30 Days': [Date.create().addDays(-29), 'today']
      }
   },function(start, end){
      
      ajaxLoadChart(start, end);
      
   });
   
   // The tooltip shown over the chart
   var tt = $('<div class="ex-tooltip">').appendTo('body'),
      topOffset = -32;
   
   var data = {
      "xScale" : "time",
      "yScale" : "linear",
      "main" : [{
          className : ".stats",
          "data" : []
      }]
   };
   
   var opts = {
      paddingLeft : 50,
      paddingTop : 20,
      paddingRight : 10,
      axisPaddingLeft : 25,
      tickHintX: 9, // How many ticks to show horizontally
   
      dataFormatX : function(x) {
          
          // This turns converts the timestamps coming from
          // ajax.php into a proper JavaScript Date object
          
          return Date.create(x);
      },
   
      tickFormatX : function(x) {
          
          // Provide formatting for the x-axis tick labels.
          // This uses sugar's format method of the date object. 
   
          return x.format('{MM}/{dd}');
      },
      
      "mouseover": function (d, i) {
          var pos = $(this).offset();
          
          tt.text(d.x.format('{Month} {ord}') + ': ' + d.y).css({
              
              top: topOffset + pos.top,
              left: pos.left
              
          }).show();
      },
      
      "mouseout": function (x) {
          tt.hide();
      }
   };
   
   // Create a new xChart instance, passing the type
   // of chart a data set and the options object
   
   var chart = new xChart('line-dotted', data, '#chart' , opts);
   
   // Function for loading data via AJAX and showing it on the chart
   function ajaxLoadChart(startDate,endDate) {
   
      // If no data is passed (the chart was cleared)
      
      if(!startDate || !endDate){
          chart.setData({
              "xScale" : "time",
              "yScale" : "linear",
              "main" : [{
                  className : ".stats",
                  data : []
              }]
          });
          
          return;
      }
   
      // Otherwise, issue an AJAX request
   
      $.getJSON('<?php echo base_url() ?>Admin_dashboard/chart', {
          
          start:	startDate.format('{yyyy}-{MM}-{dd}'),
          end:	endDate.format('{yyyy}-{MM}-{dd}')
          
      }, function(data) {
          
          var set = [];
          $.each(data, function() {
              set.push({
                  x : this.label,
                  y : parseInt(this.value, 10)
              });
          });
          
          chart.setData({
              "xScale" : "time",
              "yScale" : "linear",
              "main" : [{
                  className : ".stats",
                  data : set
              }]
          });
   
      });
   }
   });
    window.onload = function() {
   
      var currency = $("#currency").val();
      var totalsale = parseInt($("#totalsalep").val());
      var totalpurchase = parseInt($("#totalplurchasep").val());
    //  var totalexpense = parseInt($("#totalexpensep").val());
      var noofsale = parseInt($("#no_of_sale").val());
      var noofexpense = parseInt($("#no_of_expense").val());
   console.log("sale :"+totalsale);
   console.log("purchase :"+totalpurchase);
   
   
   
   
   
   
   // console.log("purchase :"+totalpurchase);
   
   console.log("noofsale :"+noofsale);
   console.log("noofexp :"+noofexpense);
   
   Highcharts.chart('chartContainer', {
          chart: {
              plotBackgroundColor: null,
              plotBorderWidth: null,
              plotShadow: false,
              type: 'pie'
          },
          title: {
              text: ''
          },
          tooltip: {
               valuePrefix: '$',
              pointFormat: '{series.name}: <b>{point.y:.1f}'+"</b>"+" "+'<br/>'+'({point.percentage:.1f}%)'
   
          },
          accessibility: {
              point: {
                   
                  valueSuffix: '%',
              }
          },
          credits: {
      enabled: false
   },
          plotOptions: {
              pie: {
                  allowPointSelect: true,
                  cursor: 'pointer',
                  dataLabels: {
                      enabled: false,
                      //  format: '<b>{point.name}</b>:<br>{point.percentage:.1f} %<br>value: {point.'+currency+'y}',
                  },
                  showInLegend: true
              }
          },
          series: [{
              name: '',
              colorByPoint: true,
              data: [
            
                  {y: totalsale, name: "Total Sale Amount ("+currency+")"},
               {y: totalpurchase, name: "Total Expense Amount ("+currency+")"},
              {y: noofsale, name: "No.of Sale"},
               {y: noofexpense, name: "No.of Expense"},
              ]
          }]
      });
   }
   
   
   
   
      /*
      var sales_paid = parseInt($("#sales_paid").val());
      var sales_due = parseInt($("#sales_due").val());
       Highcharts.setOptions({
   colors: ['#50B432', '#ED561B', '#DDDF00', '#24CBE5', '#64E572', '#FF9655', '#FFF263', '#6AF9C4']
   });
      {y: sales_due, name: "Due Amount"},
               {y: sales_paid, name: "Paid Amount"}
   
               
         let chartOptions = {
   
        chart: {
         
          plotBorderWidth: null,
          plotShadow: false,
          type: 'pie',
   			height: 240,
        },
        title: {
          text: null,
        },
        tooltip: {
          pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        accessibility: {
          point: {
            valueSuffix: '%'
          }
        },
        plotOptions: {
          pie: {
            size: 150,
            allowPointSelect: true,
            cursor: 'pointer',
            showInLegend: true,
            dataLabels: {
              enabled: true,
              format: '{point.percentage:.0f}%',
              style: { fontFamily: '\'Lato\', sans-serif', fontSize: '12px' },
              distance: '-30%',
            }
          }
        },
         legend: {
        },
        series: [{
          name: 'Composition',
          colorByPoint: true,
          data: [
          
              {y: sales_due, name: "Due Amount"},
               {y: sales_paid, name: "Paid Amount"}
   
          ]
        }]
      };
    
   
   Highcharts.chart('container', chartOptions)
   */
      
</script>

<!--Pie Chart Charts -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          <?php
            foreach ($count_timesheets as $data) {
                // echo "['".$data["dailybreak"]."', ".$data["total_hours"]."],";
                $daily_break = $data['dailybreak'];
                $total_hours = $data['total_hours'];
            }
          ?> 
          
          <?php 
            
            echo "['Daily Break', ".$daily_break."],";  
             echo "['Total Hours', ".$total_hours."],";
          ?>

        ]);


        var options = {
          title: 'Total Hours & Break',
          is3D: true,
          // pieSliceText: 'Total Hours',   
          // legend: 'none',
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>


   <!--Combo Charts -->
 
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Amount', 'Expense Amount'],
          <?php 
            foreach($arrayexpenseamt as $data){ 
                echo "['Expense Amount', ".$data['expense_amount']."],"; 
            }
          ?>
        ]);

        var options = {
          chart: {
            title: 'Expenses Amount',
            // subtitle: 'Sales, Expenses, and Profit: 2014-2017',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>