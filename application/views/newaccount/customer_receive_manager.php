<script src="<?php echo base_url() ?>my-assets/js/admin_js/account.js" type="text/javascript"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" />


<style>
    .select2{
        display:none;
    }
    .btnclr{
       background-color:<?php echo $setting_detail[0]['button_color']; ?>;
       color: white;

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
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo ('Customer Receive Manager') ?></h1>
            <small><?php //echo display('debit_voucher') ?></small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('accounts') ?></a></li>
                <li class="active" style="color:orange"><?php echo  "Customer Receive Manager" ?></li>
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
 
  
                                 <a href="<?php echo base_url('accounts/customer_receive') ?>" class="btnclr btn btn-default dropdown-toggle boxes filip-horizontal"   style="height:fit-content;"  ><i class="far fa-file-alt"> </i> <?php echo ('Create Customer Receive') ?> </a>



        &nbsp;&nbsp;

 
         <!--<a  class="btnclr btn btn-default dropdown-toggle  boxes filip-horizontal "  style="height:fit-content;"  id="s_icon"><b class="fa fa-search"></b>&nbsp;Advance search  </a>-->
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
 

      </div>

            <br>
            <br> 
            <br> 

            
         




                      
<div class="row">
   <div class="col-sm-18">
      <div class="panel panel-bd lobidrag">
      <div class="panel-body" style="    border: 3px solid #D7D4D6;">
               <div class="sortableTable__container">
               <div id="for_filter_by" class="for_filter_by" style="display: inline;">
                  
                   </div>
               

               <div id="printArea">
               <div class="sortableTable__discard">
                     </div>
                  <div id="dataTableExample3">
                     <table class="table table-bordered" cellspacing="0" width="100%" id="ProfarmaInvList">
                        <thead class="sortableTable">
                        <tr  class="sortableTable__header btnclr"  >
                                         <th class="1 value" data-col="1" style="text-align:center;" ><?php echo  ('Account Name') ?></th>
                                        <th class="2 value" data-col="2" style="text-align:center;"><?php echo  ('Voucher No') ?></th>
                                        <th class="3 value" data-col="3" style="text-align:center;"><?php echo  ('Date') ?></th>
                                        <th class="4 value" data-col="4" style="text-align:center;"><?php echo  ('Payment Type') ?></th>
                                        <th class="5 value" data-col="5" style="text-align:center;"><?php echo  ('Bank') ?></th>
                                        <th class="6 value" data-col="6" style="text-align:center;"><?php echo  ('Grand Total') ?></th>
                                         <th class="7 value" data-col="7" style="text-align:center;"><?php echo  ('Remark') ?></th>
                                         <th class="8 value" data-col="8" style="text-align:center;"><?php echo  ('Action') ?></th>
                               
                                                                        </tr> 
                                 </thead>
                                 <tbody>

 
                     





                                          <?php if (!empty($cust_rec_info)) { ?>
    <?php foreach ($cust_rec_info as $list) { ?>
        <tr style="text-align:center" class="task-list-row"  >

<td data-col="1" class="1" style="text-align:center;" ><?php   echo $list['account_name'];  ?></td>                    
<td data-col="2" class="2" style="text-align:center;" ><?php   echo $list['voucher_no'];  ?></td>
<td data-col="3" class="3" style="text-align:center;" ><?php   echo $list['date'];  ?></td>
<td data-col="4" class="4" style="text-align:center;" ><?php   echo $list['pay_type'];  ?></td>
<td data-col="5" class="5" style="text-align:center;" ><?php   echo $list['bank'];  ?></td>
<td data-col="6" class="6" style="text-align:center;" ><?php   echo $list['gtotal'];  ?></td>
<td data-col="7" class="7" style="text-align:center;" ><?php   echo $list['remark'];  ?></td>


<td data-col="8" class="8">
<a class="btnclr btn  btn-sm invoice_edit"    href="<?php echo base_url()?>accounts/customer_receive_edit/<?php echo  $list['cust_incremnt_id'];  ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
 

<a class="btnclr btn  btn-sm" onclick="return confirm('<?php echo display('are_you_sure') ?>')"   href="<?php echo base_url()?>accounts/customer_receive_delete/<?php echo  $list['cust_incremnt_id'];  ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>


</td>





</tr>    <?php } ?>
<?php } else { ?>
 <?php } ?>








                                    </tr>
                                   </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               



                  


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
  








   <!-- The Modal Column Switch -->
   <div id="myModal_colSwitch"  name="mycustomerreceiveName"      class="modal_colSwitch" >
   <div class="modal-content_colSwitch" style="width:20%;height:20%;">
   <span class="close_colSwitch">&times;</span>
   <div class="col-sm-2"></div>
   <div class="col-sm-4"><br><br>
   <div class="form-group row">




    
   <!-- <input type="checkbox" data-control-column="1"  class="1" value="1" />&nbsp;<?php echo  ('Account Name') ?><br><br> -->
<input type="checkbox" data-control-column="2"  class="2" value="2" />&nbsp; <?php echo  ('Voucher No') ?><br><br>
<input type="checkbox" data-control-column="3"  class="3" value="3" />&nbsp;<?php echo  ('Date') ?><br><br>

</div>
        </div>



        <div class="col-sm-4" ><br>
        <div class="form-group row"  >
<br>
<input type="checkbox" data-control-column="4"  class="4" value="4" />&nbsp;<?php echo  ('Payment Type') ?><br><br>
<!-- <input type="checkbox" data-control-column="5"  class="5" value="5" />&nbsp; <?php echo  ('Bank') ?><br><br> -->
<!-- <input type="checkbox" data-control-column="6"  class="6" value="6" />&nbsp;<?php echo  ('Grand Total') ?><br><br> -->
<input type="checkbox" data-control-column="7"  class="7" value="7" />&nbsp;<?php echo  ('Remark') ?><br><br>
<!-- <input type="checkbox" data-control-column="8"  class="8" value="8" />&nbsp;<?php echo  ('Action') ?><br><br> -->

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
<!-- Manage Invoice End -->
<script type="text/javascript" src="<?php echo base_url()?>my-assets/js/profarma.js"></script>
<script>



$(document).ready(function() {
    
    var localStorageName = "mycustomerreceiveName"; // Set your desired localStorage name

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
 
    
   
 

 
                  