<?php error_reporting(1); ?>  
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.base64.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/html2canvas.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jspdf.plugin.autotable"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jspdf.umd.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
<script type="text/javascript" src="<?php echo base_url()?>assets/js/drag_drop_index_table.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>my-assets/js/quotation_tableManager.js"></script>
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
<script type="text/javascript" src="<?php echo base_url()?>my-assets/js/profarma.js"></script>
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" />
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" />


<script type="text/javascript" src="<?php echo base_url()?>my-assets/js/vendor_tableManager.js"></script>

<style>


   .select2{
   display:none;
   }

      
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
    width: 110px;
  }  
}
   
    
   .select2{
   display:none;
   }


   .btnclr{
       background-color:<?php echo $setting_detail[0]['button_color']; ?>;
       color: white;

   }
</style>


   
</style>
<!-- Supplier Sales Report Start -->
<div class="content-wrapper">
	<section class="content-header">
	    <div class="header-icon">
	      
 	      
	      
	       <figure class="one">
               <img src="<?php echo base_url()  ?>asset/images/supplier.png"  class="headshotphoto" style="height:50px;" />
      </div>
      
	      
	      
	      
	           <div class="header-title">
          <div class="logo-holder logo-9">
		<h1><?php echo display('vendor_sales_details') ?></h1>
       </div>
         
	      
	      
	      
	      
	        <small></small>
	        <ol class="breadcrumb" style=" border: 3px solid #d7d4d6;" >
	            <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
	            <li><a href="#"><?php echo display('vendor') ?></a></li>
	            <li class="active" style="color:orange"><?php echo display('vendor_sales_details') ?></li>
	       
	       
	       
	          <div class="load-wrapp">
       <div class="load-10">
         <div class="bar"></div>
       </div>
       </div>
	       
	       
	       
	        </ol>
	    </div>
	</section>
  
	<!-- Search Supplier -->
	<section class="content">

 


        <div class="panel panel-bd lobidrag" >
      <div class="panel-heading" style="height: 60px;border:3px solid #d7d4d6;">
         <div class="col-sm-12" >
<div class="col-sm-4" style="display: flex;align-items: left;">
 <a href="<?php echo base_url('Csupplier') ?>" class="btn btnclr"   style="height:fit-content;float:left;"  ><i class="far fa-file-alt"> </i> <?php echo display('Add Vendor') ?> </a>
 &nbsp;&nbsp;&nbsp;

                        <div class="dropdown bootcol" id="drop" style="    width: 300px;">
                           <button class="btnclr btn btn-default dropdown-toggle  boxes filip-horizontal" type="button" id="dropdownMenu1" style="float:left;"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" >
                           <span  class="fa fa-download"  ></span> <?php echo display('download') ?>
                           </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
            <li><a href="#" onclick="generate()"> <img src="<?php echo base_url() ?>assets/images/pdf.png" width="24px"> <?php echo display('PDF') ?></a></li>
       
        <li class="divider"></li>
                              <li><a href="#" onclick="$('#ProfarmaInvList').tableExport({type:'excel',escape:'false'});"> <img src="<?php echo base_url() ?>assets/images/xls.png" width="24px"> <?php echo display('XLS') ?></a></li>
                           </ul> 



        &nbsp;&nbsp;
                <button type="button" style="margin-right: 10px;" class="btn btnclr dropdown-toggle" onclick="printDiv('printableArea')">    <b class="ti-printer"></b>&nbsp;    <?php echo display('print') ?></button>
        </div>
    </div>
    <div class="col-sm-6" style="text-align: center;">

    <?php echo form_open('Csupplier/supplier_sales_details_datewise/'.$this->uri->segment(3).'/'.$this->uri->segment(4), array('class' => '', 'id' => 'validate')) ?>
                     <?php $today = date('Y-m-d'); ?>
                   
                      <div class="col-sm-6">
                        <div class="form-group row"     style="width: 300px;">
                        <input type="hidden" name="seg_3" value="<?php echo  $this->uri->segment(3) ; ?>"/>
                        <input type="hidden" name="seg_4" value="<?php echo  $this->uri->segment(4) ; ?>"/>
                         <input style="width: 300px;text-align:center;" class="form-control daterangepicker-field" name="daterangepicker-field" autocomplete="off" id="daterangepicker-field" <?php  if(empty($start)){ echo "value=''";}else{ echo "value=".$start ;}  ?>>
                           &nbsp; &nbsp; &nbsp;
                        </div>
                     </div>
                      <div class="col-sm-1">
                         <div class="form-group">
                             <button type="submit" class="btnclr btn" style="float:right;" ><i class="fa fa-search" aria-hidden="true"></i> <?php echo display('search') ?></button> 
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

            </div>
            </div>
  

		<!-- Sales Details -->
		<div class="row">
		    <div class="col-sm-12">
		        <div class="panel panel-bd lobidrag "  style=" border: 3px solid #d7d4d6;" >
		            <div class="panel-heading" >
		                <div class="panel-title" style="height:2px;">

						<div class="panel-body"> 
<?php echo form_open('Csupplier/supplier_sales_details_datewise' , array('class' => 'form-inline', 'method' => 'get'))  ?>
	<?php $today = date('Y-m-d'); ?>
   <div class="col-sm-3">

		</div> 
 
 
						<div id="bloc2" style="float:right;">
                        <a href="<?php echo base_url('Csupplier/manage_supplier') ?>"  class="btn btnclr dropdown-toggle"  style="color:white;float: right; "><i class="ti-align-justify"> </i>  <?php echo ('Manage Vendor') ?> </a>
 </div>   
 
		                </div>
		            </div>
		            <div class="panel-body">
		            	
		            	<div id="printableArea">

		            		<?php if ($supplier_name) { ?>

		            		<div class="text-center">
								<h3> {supplier_name} </h3>
								<h4><?php echo display('address') ?> : {supplier_address} </h4>
								<h4> <?php echo display('print_date') ?>: <?php echo date("d/m/Y h:i:s"); ?> </h4>
							</div>

							<?php } ?>

 			          
 								
                
                      <div id="printableArea">
   
                           <div class="sortableTable__discard">
                     </div>
                  <div id="customers">
                     <table class="table table-bordered" cellspacing="0" width="100%" id="ProfarmaInvList">
                        <thead class="sortableTable">
                           <tr class="sortableTable__header btnclr">

 

											<th style="text-align:center;" class="Date" data-resizable-column-id="1" ><?php echo display('date') ?></th>
											<th style="text-align:center;" class="Date" data-resizable-column-id="2"  ><?php echo display('product_name') ?></th>
											<th  style="text-align:center;" class="Date" data-resizable-column-id="3"  ><?php echo display('supplier_name') ?></th>
											<th style="text-align:center;" class="Date" data-resizable-column-id="4" ><?php echo display('invoice_no') ?></th>
											<th style="text-align:center;" class="Date" data-resizable-column-id="5"  ><?php echo display('quantity') ?></th>
											<th style="text-align:center;"  class="Date" data-resizable-column-id="6"  ><?php echo display('rate') ?></th>
											<th style="text-align:center;" class="Date" data-resizable-column-id="7"  ><?php echo display('amount')?></th>
										</tr>
									</thead>
                    <tbody class="sortableTable__body" id="tab" >

									<?php
									if ($sales_info) {
									?>
									{sales_info}
										<tr>
											
											<td style="text-align:center;" >{date}</td>
											<td style="text-align:center;">
												<a href="<?php echo base_url().'Cproduct/product_view/{product_id}'; ?>">
													{product_name} - {product_model}
												</a>
											</td>
											<td style="text-align:center;" style="text-align:center;" >{supplier_name}</td>
											<td style="text-align:center;" ><a href="<?php echo base_url().'Cinvoice/invoice_inserted_data/{invoice_id}'; ?>">{invoice}</a></td>
											<td style="text-align:center;"  >{quantity}</td>
											<td style="text-align:center;" class="text-right !Important"><?php echo (($position==0)?"$currency {supplier_rate}":"{supplier_rate} $currency") ?></td>
											<td style="text-align:center;"  class="text-right !Important"><?php echo (($position==0)?"$currency {total}":"{total} $currency") ?></td>
										</tr>
									{/sales_info}
									<?php
									}
									?>
									</tbody>
									<tfoot>
										<tr>
											<td colspan="6"  style="text-align:right;">
												<b><?php echo display('grand_total') ?></b> :
											</td>
											<td class="text-right"><b>
											<?php echo (($position==0)?"$currency {sub_total}":"{sub_total} $currency") ?></b></td>
										</tr>
									</tfoot>
			                    </table>
			                   
			                </div>
			            </div>
			             <!-- <div class="text-right"><?php //echo $links ?></div> -->
		            </div>
		        </div>
		    </div>
		</div>
	</section>
</div>
<!-- Supplier Sales Details End -->






<div id="myModal_colSwitch"  class="modal_colSwitch">
                    <div class="modal-content_colSwitch" style="width:29%;height:25%;">
                    <span class="close_colSwitch">&times;</span>
                       
                          <div class="col-sm-2" ></div>


                          <div class="col-sm-2" ><br>
                          <div class="form-group row"  > 
                         
                          <br><input type="checkbox"  data-control-column="1" checked = "checked" class="opt Date"  value="date"/>&nbsp; <?php echo display('Date') ?><br>
                         
						  <br><input type="checkbox"  data-control-column="5" checked = "checked" class="opt quantity"   value="quantity"/>&nbsp;<?php echo display('quantity') ?><br>
<br><input type="checkbox"  data-control-column="6" checked = "checked" class="opt rate"   value="rate"/>&nbsp;<?php echo display('rate') ?><br>



             </div>
        </div>


        <div class="col-sm-3" ><br>
        <div class="form-group row"  >
		<br><input type="checkbox"  data-control-column="4" checked = "checked" class="opt invoice_no"   value="invoice_no"/>&nbsp;<?php echo display('invoice_no') ?><br>
		<br><input type="checkbox"  data-control-column="2" checked = "checked" class="opt product_name"  value="product_name"/>&nbsp;<?php echo display('product_name') ?><br>
                          <br><input type="checkbox"  data-control-column="3" checked = "checked" class="opt supplier_name"   value="supplier_name"/>&nbsp;<?php echo display('supplier_name') ?><br>
                         
                          </div>
                       </div>
                    
        



     
               
     

                           <div class="col-sm-2"  ><br>
                          <div class="form-group row"  >
						  <br><input type="checkbox"  data-control-column="7" checked = "checked" class="opt Balance"  value="Balance"/>&nbsp;<?php echo display('Balance') ?><br>

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
<script type="text/javascript" src="<?php echo base_url()?>my-assets/js/profarma.js"></script>
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
<script src="<?php echo base_url()?>assets/js/jquery.bootgrid.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.0.0-alpha.1/jspdf.plugin.autotable.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>my-assets/js/profarma.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- xcharts includes -->
<script src="<?php echo base_url()?>assets/js/jquery.bootgrid.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.0.0-alpha.1/jspdf.plugin.autotable.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>my-assets/js/profarma.js"></script>



             
























