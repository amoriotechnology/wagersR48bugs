
<?php error_reporting(1);  ?>


<script src="<?php echo base_url() ?>my-assets/js/admin_js/invoice.js" type="text/javascript"></script>
 <script src="<?php echo base_url() ?>my-assets/js/countrypicker.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>my-assets/js/admin_js/product_country.js" type="text/javascript"></script>
<script src="https://kit.fontawesome.com/38e0f06f81.js" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.base64.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/drag_drop_index_table.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/html2canvas.js"></script>
 <script type="text/javascript" src="<?php echo base_url()?>assets/js/jspdf.plugin.autotable"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/jspdf.umd.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
 <script type="text/javascript" src="<?php echo base_url()?>my-assets/js/tableManager.js"></script>
<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
<script type="text/javascript" src="http://mrrio.github.io/jsPDF/dist/jspdf.debug.js"></script>
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" />
<script type="text/javascript" src="http://www.bacubacu.com/colresizable/js/colResizable-1.5.min.js"></script>

<!-- Add New Invoice Start -->

<div class="content-wrapper">

    <section class="content-header">

        <div class="header-icon">

            <i class="pe-7s-note2"></i>

        </div>

        <div class="header-title">

            <h1><?php echo ('Bank Transaction') ?></h1>

            <small><?php echo "" ?></small>

            <ol class="breadcrumb">

                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>

                <li><a href="#"><?php echo display('Bank') ?></a></li>

                <li class="active" style="color:orange;"> <?php echo ('Bank Transaction') ?></li>

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

  

 <!-- Manage Product report -->

 <div class="row">

<div class="col-sm-12">

    <div class="panel panel-bd lobidrag">

        


<div class="row" style="padding-top: 20px;">
<div class="col-sm-10">


















        <a href="<?php echo base_url('Csettings/bank_transaction') ?>" class="btnclr btn btn-primary m-b-5 m-r-2"><i class="ti-align-justify"> </i> <?php echo ('Create Bank Transaction') ?> </a>




        <a onclick="reload();"  >  <i class="fa fa-refresh" style="font-size:25px;float:right;" aria-hidden="true"></i> </a>

      </div>

               <div class="col-sm-2">





        <i class="fa fa-cog"  aria-hidden="true" id="myBtn" style="font-size:25px;" onClick="columnSwitchMODAL()"></i> <!-- onclick opens MODAL -->
       
        <div class="dropdown bootcol" id="drop" style="float:right;padding-right:20px;padding-bottom:10px;">
<button class="btnclr btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
<span class="glyphicon glyphicon-th-list"></span> <?php echo display('Download')?>  

</button>
<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">


    
<li><a href="#" onclick="generate()"> <img src="<?php echo base_url()?>assets/images/pdf.png" width="24px"> PDF</a></li>

<li class="divider"></li>         
      
<li><a href="#" onclick="$('#ProfarmaInvList').tableExport({type:'excel',escape:'false'});"> <img src="<?php echo base_url()?>assets/images/xls.png" width="24px"> XLS</a></li>
     
</ul>

&nbsp;
<button type="button" style="float:right;"  class="btn btnclr dropdown-toggle"  onclick="printDiv('printableArea')"><?php echo display('print') ?></button>

</div>

</div>
</div>
<div class="row"> 

</div>
</div>





<div class="panel-body">
                    <div class="sortableTable__container">
  <div class="sortableTable__discard">
  </div>
  <div id="printableArea">


                    <div id="customers">
  <table class="table table-bordered" cellspacing="0" width="100%" id="ProfarmaInvList">
  <thead class="sortableTable">
      <tr class="sortableTable__header">
      <th class="1 value" data-control-column="1"   data-col="1" style="width: 80px; height: 40.0114px;" ><?php echo display('ID')?></th>
            <th class="2 value" data-control-column="2"   data-col="2" style="width: 80px; height: 40.0114px;" ><?php echo ('VDate')?></th>
        <th class="3 value" data-control-column="3"  data-col="3"style="height: 45.0114px; width: 234.011px" ><?php echo ('COAID')?></th>
        <th class="4 value" data-control-column="4"data-col="4"  style="height: 42.0114px;"   ><?php echo ('Vtype')?></th>
    
        <th class="5 value" data-control-column="5"  data-col="5"  style="width: 198.011px;"><?php echo display('Debit')?></th>
  
           <th class="6 value" data-control-column="6" data-col="6"   style="width: 198.011px;" ><?php echo display('Credit')?></th>
		         <!-- <th class="7 value" data-control-column="7" data-col="7" style="width: 190.011px; height: 44.0114px;"><?php echo display('Primary Email')?> </th> -->
				 	    
     <div class="myButtonClass Action"> 
     <th class="21 text-center" data-column-id="21" data-control-column="21" data-formatter="commands" data-sortable="false" style="width: 190.011px; height: 44.0114px;"   ><?php echo display('Action')?></th>
        </div>
      </tr>
    </thead>
   
    <tbody class="sortableTable__body" id="tab">
     <?php
	 if ($bank_list) { ?>
	 {bank_list}
	<tr style="text-align:center" ><td data-col="1" class="1">{ID}</td>
		<td data-col="2" class="2">{VDate}</td>
		<td data-col="3" class="3">{COAID}</td>
		<td data-col="4" class="4">{Vtype}</td>
		<td data-col="5" class="5">{Debit}</td>
		<td data-col="6" class="6">{Credit}</td>
		<td data-col="7" class="7">
		<a href="<?php echo base_url().'Csettings/edit_bank/{bank_id}'; ?>" class="btnclr btn m-b-5 m-r-2" data-toggle="tooltip" data-placement="left" title="" data-original-title="<?php echo display('update') ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
	    <a href="<?php echo base_url().'Csettings/delete_bank/{bank_id}'; ?>" class="btnclr btn m-b-5 m-r-2" onclick="return confirm('Are you sure you want to delete this bank?');" data-toggle="tooltip" data-placement="left" title="" data-original-title="<?php echo display('delete') ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
		</td>

	</tr>

	{/bank_list}

	<?php } ?>
</tr>
  
    </tbody>
  </table>
        </div>
      </div>

                </div>

            </div>

        </div>