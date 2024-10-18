<script src="<?php echo base_url() ?>my-assets/js/admin_js/account.js" type="text/javascript"></script>
<?php error_reporting(1);  ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.base64.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/html2canvas.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jspdf.plugin.autotable"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jspdf.umd.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<!--<script type="text/javascript" src="<?php echo base_url()?>my-assets/js/profarma.js"></script>-->
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
<script type="text/javascript" src="<?php echo base_url()?>assets/js/drag_drop_index_table.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>my-assets/js/quotation_tableManager.js"></script>



 
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
  
  <script type="text/javascript" src="<?php echo base_url()?>my-assets/js/profarma.js"></script>

<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
<!-- <script type="text/javascript" src="http://www.bacubacu.com/colresizable/js/colResizable-1.5.min.js"></script> -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" />
<!-- <script type="text/javascript" src="http://www.bacubacu.com/colresizable/js/colResizable-1.5.min.js"></script> -->

<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />


<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" />


<style>
    .select2{
        display:none;
    }
 

.input-symbol-euro::before {
 content: '<?php echo $currency; ?>';
  
  font-size: 1.5em;
  position: absolute;
  left: 5px;
  top: 50%;
  transform: translateY(-50%);
}
.input-symbol-euro {
      font-size: 10px;
  display: inline-block;
  position: relative;
}


    </style>
<div class="content-wrapper">
     <section class="content-header" style='height:70px;'>
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo ('Contra Voucher Manager') ?></h1>
            <small><?php //echo display('debit_voucher') ?></small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('accounts') ?></a></li>
                <li class="active" style="color:orange"><?php echo  "Contra Voucher Manager" ?></li>
            </ol>
        </div>
    </section>

    <section class="content">
            <?php
        $message = $this->session->userdata('message');
        if (isset($message)) {
            ?>
            <div class="alert alert-info alert-dismissable" style="background: #38469f;color:white;font-weight:bold;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $message ?>                    
            </div>
            <?php
            $this->session->unset_userdata('message');
        }
        $error_message = $this->session->userdata('error_message');
        if (isset($error_message)) {
            ?>
            <div class="alert alert-danger alert-dismissable" style="background: #38469f;color:white;font-weight:bold;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $error_message ?>                    
            </div>
            <?php
            $this->session->unset_userdata('error_message');
        }
        ?>




<div class="panel panel-bd lobidrag" >
      <div class="panel-heading" style="height: 60px;    border: 3px solid #d7d4d6;">
         <div class="col-sm-12" style="height:69px;">
<div class="col-sm-4" style="display: flex; justify-content: space-between; align-items: left;">
 
  
                                 <a href="<?php echo base_url('accounts/contra_voucher') ?>" class="btnclr btn btn-default dropdown-toggle boxes filip-horizontal"   style="height:fit-content;"  ><i class="far fa-file-alt"> </i> <?php echo ('Create Contra Voucher ') ?> </a>

                              

        &nbsp;&nbsp;

 
         <a  class="btnclr btn btn-default dropdown-toggle  boxes filip-horizontal "  style="height:fit-content;"  id="s_icon"><b class="fa fa-search"></b>&nbsp;Advance search  </a>
         &nbsp;&nbsp;
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
        </div>


    </div>




    <div class="col-sm-6" style="text-align: center;">
    
    </div>



     <div class="col-sm-2" style="float:right;">
          <div class="" style="float: right;">  <a onclick="reload();"  id="removeButton">  <i class="fa fa-refresh fa-spin" style="font-size:25px;float:right;" aria-hidden="true"></i> </a>    &nbsp;    &nbsp;    &nbsp;    &nbsp; <i class="fa fa-gear fa-spin"  aria-hidden="true" id="myBtn" style="margin-right:20px;font-size:25px;float:right;" onClick="columnSwitchMODAL()"></i></div>
      </div>
 

      </div>      </div>      </div>

            <br>
            <br> 
            <br> 
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

               
             <script type="text/javascript" src="<?php echo base_url()?>my-assets/js/profarma.js"></script>
   
           <div class='row' style='border: 3px solid #d7d4d6;
    margin-top: -60px;
    padding-top: 20px;
    background-color: white;'>
  <div class="col-sm-12">
        <div class="panel-body">
                  <div class="sortableTable__container">
                     <div class="sortableTable__discard">
                     </div>
                   <table class="table table-bordered" cellspacing="0" width="100%" id="ProfarmaInvList">
              <thead class="sortableTable">
                           <tr   class="btnclr sortableTable__header">
                  <!-- <th>Voucher No</th>
                   <th>Date</th>
                   <th>Remarks</th>
                         <th>Total Debit</th>
                               <th>Total Credit</th>
                                <th>Action</th>
                                   -->
                     <th class="1 value" data-col="1" style="text-align:center;"   ><?php echo  ('Voucher No') ?></th>
                     <th class="2 value" data-col="2" style="text-align:center;" >Date</th>
                     <th class="3 value" data-col="3" style="text-align:center;" >Remarks</th>
                     <th class="4 value" data-col="4" style="text-align:center;"  >Total Debit</th>
                     <th class="5 value" data-col="5" style="text-align:center;"  >Total Credit</th>
                     <th class="6 value" data-col="6" style="text-align:center;" >Action</th>
              </tr>
                </thead>
                 <tbody class="sortableTable__body">
                <?php       foreach($cv as $j){    ?>
                    <tr>
                            <td      data-col="1" class="1"  ><?php  echo $j->voucher_no;  ?></td>
                            <td      data-col="2" class="2"  ><?php  echo $j->date;  ?></td>
                            <td      data-col="3" class="3" ><?php  echo $j->remark;  ?></td>
                            <td  data-col="4" class="4" ><?php  echo $j->g_total1;  ?></td>
                            <td  data-col="5" class="5" ><?php  echo $j->g_total2;  ?></td>
                            <td  data-col="6" class="6" >     <a class="btnclr btn  btn-sm invoice_edit"  style="background-color: #3CA5DE; color: #fff;" href="<?php echo base_url()?>accounts/edit_cv/<?php echo  $j->cust_incremnt_id;  ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
                    </tr>
                    <?php  }  ?>
                </tbody>
            </table>

                        </div></div></div>
<script  src="<?php echo base_url() ?>my-assets/js/script.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery.bootgrid.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.0.0-alpha.1/jspdf.plugin.autotable.js"></script>
<!--<script type="text/javascript" src="<?php echo base_url()?>my-assets/js/profarma.js"></script>-->
   <!-- The Modal Column Switch -->
   <div id="myModal_colSwitch"  name="contra_voucher"      class="modal_colSwitch" >
   <div class="modal-content_colSwitch" style="width:40%;height:25%;">
   <span class="close_colSwitch">&times;</span>
   <div class="col-sm-1"></div>
   <div class="col-sm-3"><br><br>
   <div class="form-group row">
   <!-- <input type="checkbox" data-control-column="1" class="1" value="1" />&nbsp; <?php echo  ('Voucher No') ?><br><br> -->
    <!-- <input type="checkbox"  data-control-column="2"   class="2"   value="2"/>&nbsp;<?php echo ('Date')?><br><br> -->
   <input type="checkbox"  data-control-column="4"   class="4"   value="4"/>&nbsp;<?php echo  ('Total Debit')?><br><br>
   <input type="checkbox"  data-control-column="5"   class="5"   value="5"/>&nbsp;<?php echo  ('Total Credit')?><br><br>
   <input type="checkbox"  data-control-column="3"   class="3"   value="3"/>&nbsp;<?php echo display('Remarks')?><br><br>
   <!-- <input type="checkbox"  data-control-column="6"   class="6"      value="6"/>&nbsp;<?php echo display('Action')?><br><br> -->
   </div>
   </div>
   </section>
   </div>
   </div>
   </div>
   </div>
</div>
</div>
</div>
</div>
<input type="hidden" id="total_invoice" value="<?php echo $total_invoice;?>" name="">
<input type="hidden" id="currency" value="{currency}" name="">
<input type="hidden" id="base_url" value="<?php  echo base_url();  ?>">
</div>
</div>
</section>
<input type ="hidden" name="csrf_test_name" id="csrf_test_name" value="<?php echo $this->security->get_csrf_hash();?>">
</div>
<script>
$(document).ready(function() {
    var localStorageName = "contra_voucher"; // Set your desired localStorage name
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
         