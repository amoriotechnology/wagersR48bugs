<script src="<?php echo base_url() ?>my-assets/js/admin_js/account.js" type="text/javascript"></script>
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
<script type="text/javascript" src="<?php echo base_url()?>my-assets/js/profarma.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>


<style>

.btnclr{
       background-color:<?php echo $setting_detail[0]['button_color']; ?>;
       color: white;

   }

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
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo ('Financial Manager') ?></h1>
            <small><?php //echo display('debit_voucher') ?></small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('accounts') ?></a></li>
                <li class="active" style="color:orange"><?php echo  "Financial Manager" ?></li>
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
      <div class="col-sm-18">
<div class="col-sm-4" style="display: flex; justify-content: space-between; align-items: left;">
 
  
                                 <a href="<?php echo base_url('accounts/financial_year') ?>" class="btnclr btn btn-default dropdown-toggle boxes filip-horizontal"   style="height:fit-content;"  ><i class="far fa-file-alt"> </i> <?php echo ('Create Financial Year') ?> </a>


 
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
                                         <th style="text-align:center;" ><?php echo display('sl_no') ?></th>
                                        <th style="text-align:center;"><?php echo display('title') ?></th>
                                        <th style="text-align:center;"><?php echo display('from_date') ?></th>
                                        <th style="text-align:center;"><?php echo display('to_date') ?></th>
                                        <th style="text-align:center;"><?php echo display('status') ?></th>
                                        <th style="text-align:center;"><?php echo display('action') ?></th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php if (!empty($yearlist)) {
                            ?>
                                    <?php $sl = 1; ?>
                                    <?php foreach ($yearlist as $list) { ?>
                                    <tr class="<?php echo ($sl & 1) ? "odd gradeX" : "even gradeC" ?>" style="text-align:center;">
                                        <td><?php echo $sl; ?></td>
                                        <td id="title_<?php echo html_escape($list->fiyear_id); ?>"><?php echo html_escape($list->title); ?></td>
                                        <td id="start_<?php echo html_escape($list->fiyear_id); ?>"><?php echo html_escape($list->start_date); ?></td>
                                        <td id="end_<?php echo html_escape($list->fiyear_id); ?>"><?php echo html_escape($list->end_date); ?></td>
                                        <td id="status_<?php echo html_escape($list->fiyear_id); ?>"><?php if($list->is_active==1){echo "Ended";}else if($list->is_active==2){echo display("active");}else{echo display("inactive");} ?></td>
                                        <?php if($list->is_active!=1){?>
                                        <td class="center">
                                             
                                            <a href="<?php echo base_url("accounts/finyear_delete/" . html_escape($list->fiyear_id)) ?>"
                                                onclick="return confirm('<?php echo 'are you sure' ?>')" class="btn  btnclr btn-sm" data-toggle="tooltip"
                                                data-placement="right" title="Delete "><i class="ti-trash"></i></a>
                                       
                                             
                                                <a class="btnclr btn  btn-sm invoice_edit"    href="<?php echo base_url("accounts/financial_edit/" . html_escape($list->fiyear_id)) ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>

                                       
                                            </td>


                            





                                        <?php }else{ ?>
                                            <td colspan="2"></td>
                                        <?php } ?>
                                    </tr>
                                    <?php $sl++; ?>
                                    <?php } ?>
                                    <?php } ?>
                                </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               <div id="myModal_colSwitch"  name="myfinancialyearName"      class="modal_colSwitch" >
   <div class="modal-content_colSwitch" style="width:15%;height:20%;">
   <span class="close_colSwitch">&times;</span>
   <div class="col-sm-1"></div>
   <div class="col-sm-5"><br><br>
   <div class="form-group row">




    
   <input type="checkbox" data-control-column="1" class="1" value="1" />&nbsp; <?php echo display('sl_no') ?><br><br>
<!-- <input type="checkbox" data-control-column="2"  class="2" value="2" />&nbsp; <?php echo display('title') ?><br><br> -->
<input type="checkbox" data-control-column="3"  class="3" value="3" />&nbsp; <?php echo display('from_date') ?><br><br>
</div>
        </div>



        <div class="col-sm-4" ><br>
        <div class="form-group row"  >
<br>
<input type="checkbox" data-control-column="4"  class="4" value="4" />&nbsp;<?php echo display('to_date') ?><br><br>
<!-- <input type="checkbox" data-control-column="5"  class="5" value="5" />&nbsp; <?php echo display('status') ?><br><br> -->
<!-- <input type="checkbox" data-control-column="6"  class="6" value="6" />&nbsp;<?php echo display('action') ?><br><br> -->

</div>
        </div>
 
  
</div>
</div>

   <script  src="<?php echo base_url() ?>my-assets/js/script.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery.bootgrid.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.0.0-alpha.1/jspdf.plugin.autotable.js"></script>
<script>
    $(document).ready(function() {
       var localStorageName = "myfinancialyearName"; // Set your desired localStorage name
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

  