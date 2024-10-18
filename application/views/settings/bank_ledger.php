<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.base64.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/drag_drop_index_table.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/html2canvas.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jspdf.plugin.autotable"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jspdf.umd.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>my-assets/js/invoice_tableManager.js"></script>
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
    #filterinput{
            margin-top: 13px;
    }
    #for_filter_by {
    padding: 0px;
    float: right;
    /* height: inherit; */
    /* padding-top: 19px; */
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
    width: 110px;
  }
}
   

    </style>
<!-- Stock List Supplier Wise Start -->
<div class="content-wrapper">
	<section class="content-header">
	    <div class="header-icon">
	       <figure class="one">
               <img src="<?php echo base_url()  ?>asset/images/banklegder.png"  class="headshotphoto" style="height:50px;" />
      </div>
      
	    
 	        
	        
	         <div class="header-title">
          <div class="logo-holder logo-9">
	        <h1><?php echo display('bank_ledger') ?></h1>
       </div>
	        
	        
	        
	        
	        
	        
	        <small><?php echo display('') ?></small>
         <ol class="breadcrumb"   style=" border: 3px solid #d7d4d6;"   >
	            <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
	            <li><a href="#"><?php echo display('bank') ?></a></li>
	            <li class="active" style="color:orange;" ><?php echo display('bank_ledger') ?></li>
	      
	       <div class="load-wrapp">
       <div class="load-10">
         <div class="bar"></div>
       </div>
       </div>
	      
	      
	        </ol>
	    </div>
	</section>

	<section class="content">

	 <div class="row">
            <div class="col-sm-12">

      
               
            </div>
        </div>
         <div class="row">
            <div class="col-sm-12">
                 <div class="panel panel-bd lobidrag"   style=" border: 3px solid #d7d4d6;"       >
                    <div class="panel-heading" style='    height: 80px;'> 
                        <?php echo form_open('Csettings/bank_ledgers/', array('class' => 'form-inline', 'method' => 'post')) ?>
                        <?php $today = date('Y-m-d'); ?>
              <div class="col-sm-8">
                        <table>
                <tr><td style='width:300px'></td><td style='width:280px;'>
                    <span style='font-weight:bold;'>Bank Name : </span>
                        <select name="bank_id" class="form-control" style="width:250px;" >
                        	 <option value="JPMorgan Chase">JPMorgan Chase</option>
                           <option value="New York City">New York City</option>
                           <option value="Bank of America">Bank of America</option>
                           <option value="Citigroup">Citigroup</option>
                           <option value="Wells Fargo">Wells Fargo</option>
                           <option value="Goldman Sachs">Goldman Sachs</option>
                           <option value="Morgan Stanley">Morgan Stanley</option>
                           <option value="U.S. Bancorp">U.S. Bancorp</option>
                           <option value="PNC Financial Services">PNC Financial Services</option>
                           <option value="Truist Financial">Truist Financial</option>
                           <option value="Charles Schwab Corporation">Charles Schwab Corporation</option>
                           <option value="TD Bank, N.A.">TD Bank, N.A.</option>
                           <option value="Capital One">Capital One</option>
                           <option value="The Bank of New York Mellon">The Bank of New York Mellon</option>
                           <option value="State Street Corporation">State Street Corporation</option>
                           <option value="American Express">American Express</option>
                           <option value="Citizens Financial Group">Citizens Financial Group</option>
                           <option value="HSBC Bank USA">HSBC Bank USA</option>
                           <option value="SVB Financial Group">SVB Financial Group</option>
                           <option value="First Republic Bank ">First Republic Bank </option>
                           <option value="Fifth Third Bank">Fifth Third Bank</option>
                           <option value="BMO USA">BMO USA</option>
                           <option value="USAA">USAA</option>
                           <option value="UBS">UBS</option>
                           <option value="M&T Bank">M&T Bank</option>
                           <option value="Ally Financial">Ally Financial</option>
                           <option value="KeyCorp">KeyCorp</option>
                           <option value="Huntington Bancshares">Huntington Bancshares</option>
                           <option value="Barclays">Barclays</option>
                           <option value="Santander Bank">Santander Bank</option>
                           <option value="RBC Bank">RBC Bank</option>
                           <option value="Ameriprise">Ameriprise</option>
                           <option value="Regions Financial Corporation">Regions Financial Corporation</option>
                           <option value="Northern Trust">Northern Trust</option>
                           <option value="BNP Paribas">BNP Paribas</option>
                           <option value="Discover Financial">Discover Financial</option>
                           <option value="First Citizens BancShares">First Citizens BancShares</option>
                           <option value="Synchrony Financial">Synchrony Financial</option>
                           <option value="Deutsche Bank">Deutsche Bank</option>
                           <option value="New York Community Bank">New York Community Bank</option>
                           <option value="Comerica">Comerica</option>
                           <option value="First Horizon National Corporation">First Horizon National Corporation</option>
                           <option value="Raymond James Financial">Raymond James Financial</option>
                           <option value="Webster Bank">Webster Bank</option>
                           <option value="Western Alliance Bank">Western Alliance Bank</option>
                           <option value="Popular, Inc.">Popular, Inc.</option>
                           <option value="CIBC Bank USA">CIBC Bank USA</option>
                           <option value="East West Bank">East West Bank</option>
                           <option value="Synovus">Synovus</option>
                           <option value="Valley National Bank">Valley National Bank</option>
                           <option value="Credit Suisse ">Credit Suisse </option>
                           <option value="Mizuho Financial Group">Mizuho Financial Group</option>
                           <option value="Wintrust Financial">Wintrust Financial</option>
                           <option value="Cullen/Frost Bankers, Inc.">Cullen/Frost Bankers, Inc.</option>
                           <option value="John Deere Capital Corporation">John Deere Capital Corporation</option>
                           <option value="MUFG Union Bank">MUFG Union Bank</option>
                           <option value="BOK Financial Corporation">BOK Financial Corporation</option>
                           <option value="Old National Bank">Old National Bank</option>
                           <option value="South State Bank">South State Bank</option>
                           <option value="FNB Corporation">FNB Corporation</option>
                           <option value="Pinnacle Financial Partners">Pinnacle Financial Partners</option>
                           <option value="PacWest Bancorp">PacWest Bancorp</option>
                           <option value="TIAA">TIAA</option>
                           <option value="Associated Banc-Corp">Associated Banc-Corp</option>
                           <option value="UMB Financial Corporation">UMB Financial Corporation</option>
                           <option value="Prosperity Bancshares">Prosperity Bancshares</option>
                           <option value="Stifel">Stifel</option>
                           <option value="BankUnited">BankUnited</option>
                           <option value="Hancock Whitney">Hancock Whitney</option>
                           <option value="MidFirst Bank">MidFirst Bank</option>
                           <option value="Sumitomo Mitsui Banking Corporation">Sumitomo Mitsui Banking Corporation</option>
                           <option value="Beal Bank">Beal Bank</option>
                           <option value="First Interstate BancSystem">First Interstate BancSystem</option>
                           <option value="Commerce Bancshares">Commerce Bancshares</option>
                           <option value="Umpqua Holdings Corporation">Umpqua Holdings Corporation</option>
                           <option value="United Bank (West Virginia)">United Bank (West Virginia)</option>
                           <option value="Texas Capital Bank">Texas Capital Bank</option>
                           <option value="First National of Nebraska">First National of Nebraska</option>
                           <option value="FirstBank Holding Co">FirstBank Holding Co</option>
                           <option value="Simmons Bank">Simmons Bank</option>
                           <option value="Fulton Financial Corporation">Fulton Financial Corporation</option>
                           <option value="Glacier Bancorp">Glacier Bancorp</option>
                           <option value="Arvest Bank">Arvest Bank</option>
                           <option value="BCI Financial Group">BCI Financial Group</option>
                           <option value="Ameris Bancorp">Ameris Bancorp</option>
                           <option value="First Hawaiian Bank">First Hawaiian Bank</option>
                           <option value="United Community Bank">United Community Bank</option>
                           <option value="Bank of Hawaii">Bank of Hawaii</option>
                           <option value="Home BancShares">Home BancShares</option>
                           <option value="Eastern Bank">Eastern Bank</option>
                           <option value="Cathay Bank">Cathay Bank</option>
                           <option value="Pacific Premier Bancorp">Pacific Premier Bancorp</option>
                           <option value="Washington Federal">Washington Federal</option>
                           <option value="Customers Bancorp">Customers Bancorp</option>
                           <option value="Atlantic Union Bank">Atlantic Union Bank</option>
                           <option value="Columbia Bank">Columbia Bank</option>
                           <option value="Heartland Financial USA">Heartland Financial USA</option>
                           <option value="WSFS Bank">WSFS Bank</option>
                           <option value="Central Bancompany">Central Bancompany</option>
                           <option value="Independent Bank">Independent Bank</option>
                           <option value="Hope Bancorp">Hope Bancorp</option>
                           <option value="SoFi">SoFi</option>
                        
                     
                        	<?php foreach($bank_list as $banks){?>
                        	<option value="<?php echo $banks['bank_id']?>"><?php echo $banks['bank_name']?></option>
                        <?php }?>
                        </select> 
                            </td>
                   

                   <td class="search_dropdown" style="width: 15%;color: black;">
                         <div id="datepicker-container">
                         
                        
    <input type="text" class="form-control daterangepicker-field" id="daterangepicker-field" name="daterangepicker-field" style="margin-top: 15px;padding: 5px; width: 175px; border-radius: 8px; height: 35px;" />
</div>
                        </td>

                    
                        <td>
                        <button type="submit" style='    margin-left: 30px;
    margin-top: 20px;' class="btnclr btn m-b-5 m-r-2" >&nbsp;&nbsp;<?php echo display('search') ?></button>
                            </td></tr></table>
                        <!-- <a class="btnclr btn m-b-5 m-r-2" href="#" onclick="printDiv('printableArea')"><?php echo display('print') ?></a>  -->
                        <?php echo form_close() ?>	
                        
                        </div>
                                        <div class="col-sm-2" style='margin-left: 240px;'>


                    <!-- <i class="fa fa-cog"  aria-hidden="true" id="myBtn" style="font-size:25px;" onClick="columnSwitchMODAL()"></i>  -->

                    <div class="dropdown bootcol" id="drop" style="float:right;padding-right:20px;padding-bottom:10px;">
    <button class="btnclr btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            <span class="fa fa-download"></span> <?php echo display('download') ?>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
            <li><a href="#" onclick="generate()"><img src="<?php echo base_url() ?>assets/images/pdf.png" width="24px"> <?php echo display('PDF') ?></a></li>
            <li class="divider"></li>
            <li><a href="#" onclick="fnExcelReport()"><img src="<?php echo base_url() ?>assets/images/xls.png" width="24px"> <?php echo display('XLS') ?></a></li>
        </ul>&nbsp;
        <button type="button" class="btnclr btn btn-default dropdown-toggle" onclick="printDiv('printableArea')"><b class="ti-printer"></b>&nbsp;<?php echo display('print') ?></button>
  </div>
  </div>

                    </div>
                </div>
            </div>
             </div> 



 









  
   <!-- Manage Invoice report -->

   <div class="row">

<div class="col-sm-12">

    <div class="panel panel-bd lobidrag" style=" border: 3px solid #d7d4d6;" >

        <div class="panel-heading">

		
<div class="row"> 
<div id="for_filter_by" class="for_filter_by" style="display: inline;margin-right: 20px"><label for="filter_by"> <?php echo display('Filter By') ?> &nbsp;&nbsp;
      
       </label><select id="filterby" style="border-radius:5px;height:25px;">
      <option value="1"> <?php echo display('Date') ?></option>
<option value="2"> <?php echo ('Bank Name')?></option>
<option value="3"> <?php echo display('Description')?></option>
<option value="4"><?php echo ('Withdraw/Deposite ID')?></option>
<option value="5"><?php echo ('Debit ')?></option>
<option value="6"><?php echo display('Credit ')?></option>
<option value="7"><?php echo ('Balance')?></option>

      </select> <input id="filterinput" style="border-radius:5px;height:25px;" type="text"></div>
</div>
        </div>







        <div class="panel-body" style="padding-top: 0px;">
<div class="sortableTable__container">
<div  id="printArea">
                         <div id="content" id="printArea" style="padding:0px;" >

 


<div class="sortableTable__discard">
</div>
        <div id="printableArea">
<table class="table table-bordered" cellspacing="0" width="100%" id="ProfarmaInvList">
<thead class="sortableTable">

<tr  class="sortableTable__header btnclr">

<th class="1 value" data-col="1"      style="width: 110px; height: 40.0114px;text-align:center;" ><?php echo display('date') ?></th>
<th class="2 value"  data-col="2"    style="height: 45.0114px; width: 234.011px;text-align:center;" > <?php echo display('bank_name') ?></th>
<th class="3 value"  data-col="3"   style="width: 248.011px;text-align:center;"        ><?php echo display('description') ?></th>
<th class="4 value"  data-col="4"   style="width: 248.011px;text-align:center;"        ><?php echo display('withdraw_deposite_id') ?></th>
<th class="5 value" data-col="5" data-resizable-column-id="5"    style="width: 298.011px;text-align:center;"       ><?php echo display('debit_plus') ?></th>
<th class="6 value" data-col="6" data-resizable-column-id="6"    style="width: 258.011px;text-align:center;"       ><?php echo display('credit_minus') ?></th>								
<th class="7 value" data-col="7" data-resizable-column-id="7"    style="width: 258.011px;text-align:center;"       ><?php echo display('balance') ?></th>
</tr>

</thead>
<tbody   class="sortableTable__body" id="tab">


<?php
										if ($bank_info_sales) {
                                           foreach($bank_info_sales as $val){
									?>
									
										<tr>
											<td data-col="1" class="1" ><?php  echo $val->payment_date; ?></td>
											<td data-col="2" class="2" ><?php  echo $val->bank_name; ?></td>
											<td data-col="3" class="3" ><?php  echo $val->details; ?></td>
											<td data-col="4" class="4" align="center"><?php  echo $val->payment_id; ?></td>
											<td data-col="5" class="5" align="right"><?php  echo ''; ?></td>
											<td data-col="6" class="6" align="right"><?php  echo number_format($val->total_amt_paid, 2); ?></td>

											<td data-col="7" class="7" align="right"><?php  echo number_format($val->total_balance, 2); ?></td>
									
									</tr>
								
									<?php
                                           }
										}
								

		if ($bank_info_purchase) {
                                           foreach($bank_info_purchase as $val){
									?>
									
										<tr>
											<td data-col="1" class="1" ><?php  echo $val->payment_date; ?></td>
											<td data-col="2" class="2" ><?php  echo $val->bank_name; ?></td>
											<td data-col="3" class="3" ><?php  echo $val->details; ?></td>
											<td data-col="4" class="4" align="center"><?php  echo $val->payment_id; ?></td>
											<td data-col="5" class="5" align="right"><?php  echo number_format($val->total_amt_paid, 2); ?></td>
											<td data-col="6" class="6" align="right"><?php echo '';  ?></td>

											<td data-col="7" class="7" align="right"><?php  echo number_format($val->total_balance, 2); ?></td>
									
									</tr>
								
									<?php
                                           }
										}
										if ($bank_info_service) {
                                           foreach($bank_info_service as $val){
									?>
									
										<tr>
											<td data-col="1" class="1" ><?php  echo $val->payment_date; ?></td>
											<td data-col="2" class="2" ><?php  echo $val->bank_name; ?></td>
											<td data-col="3" class="3" ><?php  echo $val->details; ?></td>
											<td data-col="4" class="4" align="center"><?php  echo $val->payment_id; ?></td>
											<td data-col="5" class="5" align="right"><?php echo number_format($val->total_amt_paid, 2); ?></td>
											<td data-col="6" class="6" align="right"><?php  echo ''; ?></td>

											<td data-col="7" class="7" align="right"><?php  echo number_format($val->total_balance, 2); ?></td>
									
									</tr>
								
									<?php
                                           }
										}
									?>



</tbody>

</table>
</div> 
</div>
</section>

</div>
</div>









<script src="<?php echo base_url()?>assets/js/jquery.bootgrid.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.0.0-alpha.1/jspdf.plugin.autotable.js"></script>




<div id="myModal_colSwitch"  class="modal_colSwitch">
                    <div class="modal-content_colSwitch" style="width:40%;height:30%;">
                    <span class="close_colSwitch">&times;</span>
                       
                          <div class="col-sm-1" ></div>


                          <div class="col-sm-3" ><br>
                          <div class="form-group row"  > 
                         
                          <br><input type="checkbox"  data-control-column="1" checked = "checked" class="1" value="1"/> &nbsp;<?php echo display('date') ?><br>
                          <br><input type="checkbox"  data-control-column="2" checked = "checked" class="2" value="2"/>&nbsp;<?php echo ('Bank Name');?><br>
                          <br><input type="checkbox"  data-control-column="3" checked = "checked" class="3 " value="3  "/>&nbsp;<?php  echo  display('Description');?> <br>
                          <br><input type="checkbox"  data-control-column="4" checked = "checked" class="4" value="4"/>&nbsp;<?php  echo  ('Withdraw / Deposite ID');?><br>
             </div>
        </div>



        <div class="col-sm-3" ><br>
        <div class="form-group row"  >
        <br><input type="checkbox"  data-control-column="5" checked = "checked" class="5" value="5"/>&nbsp;<?php  echo  ('Debit');?><br>
<br><input type="checkbox"  data-control-column="6" checked = "checked" class="6" value="6"/>&nbsp;<?php  echo  display('Credit');?><br>

<br><input type="checkbox"  data-control-column="7" checked = "checked" class="7" value="7"/>&nbsp;<?php  echo  ('Balance');?><br>

                          </div>
                       </div>
                    
        

                    




                    </div>
                </div>
    </section>
</div>



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
<script>
 $(document).ready(function() {
    $(".btnclr").click(function() {
        $(this).siblings('.dropdown-menu').toggle();
    });
});
      function generate() {
                 var utc = new Date().toJSON().slice(0,10).replace(/-/g,'/');
  $(".myButtonClass").hide();
  var doc = new jsPDF("p", "pt");
  var res = doc.autoTableHtmlToJson(document.getElementById("ProfarmaInvList"));
  var height = doc.internal.pageSize.height;
  //doc.text("Generated PDF", 50, 50);

  doc.autoTable(res.columns, res.data, {
    startY: doc.autoTableEndPosY() + 50,
  });
  doc.save("Bank_Ledger_"+utc+".pdf");
}
        function fnExcelReport()
{
 table = $('#ProfarmaInvList').clone();
    
      
    
    var hyperLinks = table.find('a');
    
    var tab_text="<table border='2px'><tr bgcolor='#87AFC6'>";
    var textRange; var j=0;
    tab = document.getElementById('ProfarmaInvList'); // id of table

    for(j = 0 ; j < tab.rows.length ; j++) 
    {   var sp=  $(hyperLinks[j]).text();
        tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";
        //tab_text=tab_text+"</tr>";
          console.log(sp);
    }

    tab_text=tab_text+"</table>";
   tab_text= tab_text.replace(/<a[^>]*>/g, "");
    tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
    tab_text= tab_text.replace(/<img[^>]*>/gi,""); // remove if u want images in your table
    tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE "); 

    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
    {
        txtArea1.document.open("txt/html","replace");
        txtArea1.document.write(tab_text);
        txtArea1.document.close();
        txtArea1.focus(); 
        sa=txtArea1.document.execCommand("SaveAs",true,"");
    }  
    else                 //other browser not tested on IE 11
        sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));  

    return (sa);
}
    $(document).on('keyup', '#filterinput', function(){
  
    var value = $(this).val().toLowerCase();
    var filter=$("#filterby").val();
    $("#ProfarmaInvList tr:not(:eq(0))").filter(function() {
        $(this).toggle($(this).find("td."+filter).text().toLowerCase().indexOf(value) > -1)
    });
});

$("input:checkbox:not(:checked)").each(function() {
    var column = "table ." + $(this).attr("value");
    console.log("Heyy : "+column);
    $(column).hide();
});

$("input:checkbox").click(function(){
    var column = "table ." + $(this).attr("value");
      console.log("Heyy : "+column);
    $(column).toggle();
});







function reload(){
    location.reload();
}


    </script>


<style>
	.select2-selection{
     display:none;
	}
</style>