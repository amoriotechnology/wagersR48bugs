<?php error_reporting(1);  ?>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

 <script src="https://cdn.rawgit.com/eerotal/ExportHTMLTableToExcel/0.1.5/dist/jquery.tableExport.min.js"></script>

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


<style>
   .select2{
   display:none;
   }


   .btnclr{
       background-color:<?php echo $setting_detail[0]['button_color']; ?>;
       color: white;

   }
</style>
<!-- Supplier Ledger Start -->
<div class="content-wrapper">
<section class="content-header">
   <div class="header-icon">
      <i class="pe-7s-note2"></i>
   </div>
   <div class="header-title">
      <h1><?php echo ('Customer Ledger') ?></h1>
      <small></small>
      <ol class="breadcrumb">
      <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
         <li><a href="#"><?php echo  ('Customer') ?></a></li>
         <li class="active" style="color:orange"><?php echo ('Customer Ledger') ?></li>
      </ol>
   </div>
</section>
<!-- Supplier information -->
<section class="content">
   <!-- Alert Message -->
   <?php
      $message = $this->session->userdata('message');
      if (isset($message)) {
          ?>
   <div class="alert alert-info alert-dismissable" style="background-color:#38469f;color:white;font-weight:bold;">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <?php echo $message ?>                    
   </div>
   <?php
      $this->session->unset_userdata('message');
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
   <script>
      $('.alert').delay(1000).fadeOut('slow');
   </script>  




 








   <div class="panel panel-bd lobidrag">
      <div class="panel-heading" style="height: 60px;">
         <div class="col-sm-12">
<div class="col-sm-4" style="display: flex; justify-content: space-between; align-items: left;">
    <a href="<?php echo base_url('Ccustomer') ?>" class="btn btnclr dropdown-toggle" style="color:white;  float: right;    height: fit-content; " ><i class="ti-plus"></i> <?php echo  ('Add Customer') ?></a> &nbsp;&nbsp;
 <a href="<?php echo base_url('Ccustomer/manage_customer') ?>"  class="btn btnclr dropdown-toggle" style="color:white;  float: right;     height: fit-content;"><i class="ti-align-justify"> </i>  <?php echo ('Manage Customer') ?> </a>&nbsp;&nbsp;
    <div class="dropdown bootcol" id="drop" style="    width: 300px;">
        <button class="btnclr btn btn-default dropdown-toggle"  style="color:white; " type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            <span class="glyphicon glyphicon-th-list"  ></span> <?php echo display('download') ?>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
            <li><a href="#" onclick="generate()"> <img src="<?php echo base_url() ?>assets/images/pdf.png" width="24px"> <?php echo display('PDF') ?></a></li>
            <li class="divider"></li>
            <li><a href="#" onclick="$('#ProfarmaInvList').tableExport({type:'excel',escape:'false'});"> <img src="<?php echo base_url() ?>assets/images/xls.png" width="24px"> <?php echo display('XLS') ?></a></li>
        </ul>
                  
                  &nbsp; 
        
                  <button type="button" style=" height: fit-content;color:white; "  class="btn btnclr dropdown-toggle"  onclick="printDiv('printableArea')"><?php echo display('print') ?></button>
               </div>
            </div>
 
           
          

             <?php echo form_open('Ccustomer/customer_ledgerData/'.$this->uri->segment(3).'/'.$this->uri->segment(4), array('class' => '', 'id' => 'validate')) ?>
      
            <?php $today = date('Y-m-d'); ?>
            
                     <div class="col-sm-2">
                        <div class="form-group row"     style="width: 300px;">
                        <input type="hidden" name="seg_3" value="<?php echo  $this->uri->segment(3) ; ?>"/>
                        <input type="hidden" name="seg_2" value="<?php echo  $this->uri->segment(2) ; ?>"/>
                           
                         <input style="width: 300px;text-align:center;" class="form-control daterangepicker-field" name="daterangepicker-field" autocomplete="on"   >
                         <!-- <?php  //if(!empty($ledger)){ echo "value=''";}else{ echo "value=".$start .''.$end;}  ?> -->
                        
                         
                         &nbsp; &nbsp;  
                          
                        </div>
                       
                     </div>
 



                      <div class="col-sm-1">
                         <div class="form-group">
                             <button type="submit"  style="color:white; "  class="btn btnclr dropdown-toggle"><i class="fa fa-search-plus" aria-hidden="true"></i> <?php echo display('search') ?></button> 
                         </div>
                     </div>
                      <?php echo form_close() ?>

 

                      <div class="col-sm-2" style="float:right;margin-top:-17px">
          <div class="" style="float: right;">  <a onclick="reload();"  id="removeButton">  <i class="fa fa-refresh fa-spin" style="font-size:25px;float:right;" aria-hidden="true"></i> </a>    &nbsp;    &nbsp;    &nbsp;    &nbsp; <i class="fa fa-gear fa-spin"  aria-hidden="true" id="myBtn" style="margin-right:20px;font-size:25px;float:right;" onClick="columnSwitchMODAL()"></i></div>
      </div>
         </div>
      </div>
      
      </div>

 









      <?php if (!empty($c_name)): ?>
    <div class="container" style="border: 2px solid #d4dbdf;">
        <div class="company-details" style="font-weight: bold;font-size: large; padding-bottom: 47px;">
            <?php echo $c_name; ?>
            <div class="address" style="font-size:13px;">
                <?php echo $a_name; ?>
            </div>
        </div>
        <div class="summary" style="width: 12%;  height: 10%;">
            <div class="open-balance">
                <i class="fas fa-hand-holding-usd"></i><strong style="font-size: large;"> <?php echo '$'. $paid_total; ?></strong><br>
                Total Paid Amount
            </div>
            <div class="overdue-payment">
                <i class="fa fa-money-bill-alt"></i><strong style="font-size: large;"> <?php echo '$'. $due_total; ?></strong><br>
                Total Due Amount
            </div>
        </div>
    </div>

    <style>
  .container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    color: black;
    width: 98%;
  }
  .company-details {
    flex: 1;
  }
  .summary {
    text-align: right;
  }
  .icon {
    font-size: 20px;
    margin-right: 5px;
  }
  .open-balance .fa-hand-holding-usd {
    color: green; /* Yellow for Amount Paid */
  }
  .overdue-payment .fa-money-bill-alt {
    color: red; /* Red for Due Amount */
    font-size: initial;
  }    
  .fa-solid, .fas {
  /* font-weight: 900; */
    color: #1ecf36;
    /* size: 10px; */
    font-size: large;
    }
</style>

<?php endif; ?>


<br>

<div class="row">
      <div class="col-sm-12">
         <div class="panel panel-bd lobidrag">
            <div class="panel-heading" >
               <div class="panel-title" style="height: 0px;">
                  <div class="panel-body">
                     
                    
                     <div id="bloc2" style="float:right;">
                     
                     </div>
                  </div>
               </div>





 <div class="panel-body" id="printableArea">
               <div class="table-responsive">
                  <div class="sortableTable__container">
             
                  <div id="printArea">
               <div class="sortableTable__discard">
                     </div>
                  <div id="dataTableExample3">
                     <table class="table table-bordered" cellspacing="0" width="100%" id="ProfarmaInvList">
                        <thead class="sortableTable">
                           <tr class="sortableTable__header btnclr">





                                        <th class="1 value" data-col="1"    style="width: 198.011px;text-align: center;">Date</th>
                                       <th class="2 value" data-col="2"    style="width: 598.011px;text-align: center;">Ledger No</th>
                                       <th class="3 value" data-col="3"    style="width: 598.011px;text-align: center;">Invoice No</th>
                                       <th class="4 value" data-col="4"    style="width: 598.011px;text-align: center;">Open Balance </th>
                                       <th class="5 value" data-col="5"    style="width: 598.011px;text-align: center;">Past Due</th>

                                       </tr>


                           </thead>





                           <tbody class="sortableTable__body" id="tab"  >




<?php
$i = 1;
foreach ($invoice_data_cust as $invdatcus) {

?>




                              <?php
                                        $totalAmount = 0;
                                        $outstandingAmount = 0;
                                        $numberOfDays='';
                                        $totalAmount += $invdatcus['paid_amount'];
                                if (is_numeric($invdatcus['due_amount'])) {
                                    $outstandingAmount1 += $invdatcus['due_amount'];
                                }else{
                                      $outstandingAmount1 += $invdatcus['due_amount'];
                                }
                               ?>







              <tr>
                  <td data-col="1" class="1"   class="text-center" style="text-align: center;background: white;"><?php echo $invdatcus['date']; ?></td>
                  <td data-col="2" class="2" style="text-align: center;background: white;" ><a href="<?php echo base_url().'Cinvoice/'; ?>invoice_update_form/<?php echo $invdatcus['invoice_id']; ?>"   style="text-align: center;color:#0000FF;"     ><?php echo $invdatcus['invoice_id']; ?></a></td>
                  <td data-col="3" class="3"  class="text-center" style="text-align: center;background: white;"><?php echo $invdatcus['commercial_invoice_number']; ?></td>

                <td data-col="4" class="4"  align="right" style="text-align: center;background: white;"><?php 
                                    echo (($position == 0) ? "$currency " : " $currency");
                                       
                                       if($invdatcus['due_amount'] !==''){
                                           
                                          echo $invdatcus['due_amount'];
                                      }
                                      elseif($invdatcus['due_amount'] !==''){
                                            echo (($position == 0) ? "$currency " : " $currency");
                                    echo   $invdatcus['due_amount'] ;        
                                      }else{
                                          echo "0.00";
                                      }
                                      ?>
               </td>

                <td data-col="5" class="5" style="text-align: center;background: white;"   >
                    <?php 
                                           $numberOfDays='';
                                             $date_now = date("Y-m-d");
                                              // echo $invdatcus['payment_due_date']."&".$date_now;
                                              if($invdatcus['payment_due_date'] !=='' && $invdatcus['payment_due_date'] < $date_now){
                                            $dateStr1=$invdatcus['payment_due_date'];
                                            $dateStr2=date('Y-m-d');
                                            $date1 = new DateTime($dateStr1);
                      $date2 = new DateTime($dateStr2);
                      $interval = $date1->diff($date2);
                      $numberOfDays = $interval->days;
                                        }
                                      //  echo $invdatcus['due_amount_usd']."/". $invdatcus['due_amount'];
                                        ?>
                <input type="text"     name="total_amount[]" id="total_amount_<?php echo $i; ?>" required=""   readonly   class="form-control"     style="text-align: center;border:none;background: white;"   value="<?php 
                if((!empty($numberOfDays)) &&  (!empty($invdatcus['due_amount_usd']) || ! empty($invdatcus['due_amount'])) 
                && (($invdatcus['due_amount_usd'] !=='0.00' && $invdatcus['due_amount'] !=='0.00') && ($invdatcus['due_amount_usd'] !=='0.0' && $invdatcus['due_amount'] !=='0.0') && ($invdatcus['due_amount_usd'] !=='0' || $invdatcus['due_amount'] !=='0')) ) 
               { echo $numberOfDays ;
               }
               else{ echo "0"; 
               }  ?>"        />
                </td>

                </tr>
 
                <?php   $i++; }  ?>


                </tbody>














                         
                            <tfoot>
                                 <!-- <?php         //if($ledgers[0]['vendor_type']=='productsupplier'){   ?> -->
                                    <?php  if(empty($invdatcus)){  ?>
                              <tr >
                                 <td colspan="4" style="text-align:end"><b><?php echo display('grand_total') ?>:</b></td>
                                
                              
                                 <td align="right"><b>
                                 <?php
                                    echo (($position == 0) ? "$currency " : " $currency");
                                       ?>
                                       <?php echo $outstandingAmount; ?>
                                    
                                     
                                    </b></td>
                              </tr>
                              <?php    } else{  ?>

 <tr>
                                 <td colspan="3" style="text-align:end"><b><?php echo display('grand_total') ?>:</b></td>
                                 
                                
                                 <td align="right" style="text-align:center;" ><b>
                                 <?php
                                      echo (($position == 0) ? "$currency " : " $currency");
                                       echo (isset($outstandingAmount1) && $outstandingAmount1 != 0) ? $outstandingAmount1 : "0.00"; 
                                      ?>
                                     
                                     
                                    </b></td>
                                     <td align="right" id="total_credit" style="font-weight: bold;">
                                    <b><?php
                                     ?> <?php //echo //$totalAmount ?></b>
                                  </td>
                              </tr>
                                 <?php  }  ?>
                           </tfoot>
                        </table>
                     </div>
                  </div>
                </div>
            </div>
         </div>
      </div>    
      </div>    

   
   </div>
   </div>
   </div>

</section>






<!-- Cheaque Manager End -->
<script src="<?php echo base_url()?>assets/js/jquery.bootgrid.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.0.0-alpha.1/jspdf.plugin.autotable.js"></script>
<div id="myModal_colSwitch"  class="modal_colSwitch">
   <div class="modal-content_colSwitch" style="width:35%;height:20%;">
      <span class="close_colSwitch">&times;</span>
      <div class="col-sm-2" ></div>
      <div class="col-sm-2" >
         <br>
         <div class="form-group row"  > 
            <br><input type="checkbox"  data-control-column="1" checked = "checked" class="1" value="1"/> &nbsp;<?php echo  ('Date') ?><br>
            <br><input type="checkbox"  data-control-column="2" checked = "checked" class="2" value="2"/>&nbsp;<?php echo  ('Ledger NO');?><br>
           </div>
      </div>
      <div class="col-sm-2" >
         <br>
         <div class="form-group row"  >
            
            <br><input type="checkbox"  data-control-column="3" checked = "checked" class="3" value="3"/>&nbsp;<?php  echo   ('Invoice No');?><br>
             <br><input type="checkbox"  data-control-column="4" checked = "checked" class="4" value="4"/>&nbsp;<?php  echo   ('Open Balance');?><br>
          </div>
      </div>
      <div class="col-sm-3"  >
         <br>
         <div class="form-group row"  >
            <br><input type="checkbox"  data-control-column="5" checked = "checked" class="5" value="5"/>&nbsp;<?php echo ('Past Due');?><br>
             
         </div>
      </div>
   </div>
</div>
</section>
</div>
<script type="text/javascript" src="<?php echo base_url()?>my-assets/js/profarma.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>



<!-- 
  partial --> 
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
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
 


<script src="<?php echo base_url() ?>assets/js/script.js"></script>
<script>
 
   
 $(document).on('keyup', '#filterinput', function(){
    
    var value = $(this).val().toLowerCase();
    var filter=$("#filterby").val();
    $("#ProfarmaInvList tr:not(:eq(0))").filter(function() {
        $(this).toggle($(this).find("td."+filter).text().toLowerCase().indexOf(value) > -1)
    });
 });




 $(document).ready(function(){
$('#daterangepicker-field').val(<?php  echo $start;  ?>);
  
});

   $(document).ready(function(){
   
   $(".sidebar-mini").addClass('sidebar-collapse') ;
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
   
   
   $('#cmd').click(function() {
   
   var pdf = new jsPDF('p','pt','a4');
   $('#for_numrows,#pagesControllers').hide();
   const invoice = document.getElementById("content");
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
   }).save('tax_details.pdf');
   setTimeout( function(){
     $('#for_numrows,#pagesControllers').show();
   }, 4500 );
   });
   
   
   
   
   function reload(){
   location.reload();
   }



 $(document).ready(function() {
            function sortTableDesc() {
                var $tableBody = $('#ProfarmaInvList tbody');
                var $tableRows = $tableBody.find('tr').toArray();

                $tableRows.sort(function(a, b) {
                    var pastDueA = parseInt($(a).find('td:nth-child(5) input').val());
                    var pastDueB = parseInt($(b).find('td:nth-child(5) input').val());

                    return pastDueB - pastDueA;
                });

                $tableBody.empty().append($tableRows);
            }

            // Initial sorting in descending order
            sortTableDesc();

            $('#sortDescending').on('click', function() {
                sortTableDesc();
            });
        });




        $(document).ready(function() {
    function sortTableDesc() {
        var $tableBody = $('#ProfarmaInvList tbody');
        var $tableRows = $tableBody.find('tr').toArray();

        $tableRows.sort(function(a, b) {
            var pastDueA = parseInt($(a).find('td:nth-child(5)').text());
            var pastDueB = parseInt($(b).find('td:nth-child(5)').text());

            return pastDueB - pastDueA;
        });

        $tableBody.empty().append($tableRows);
    }

    // Initial sorting in descending order
    sortTableDesc();

    $('#sortDescending').on('click', function() {
        sortTableDesc();
    });
});

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
      } });


</script>