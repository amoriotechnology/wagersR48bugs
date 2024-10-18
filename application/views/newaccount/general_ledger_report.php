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
<style>
    .select2{
        display:none;
    }
 

.input-symbol-euro::before {
 content: '<?php echo $currency; ?>';
  
 // font-size: 1.5em;
  position: absolute;
  left: 5px;
  top: 50%;
  transform: translateY(-50%);
}
.input-symbol-euro {
    padding-left: 20px;
      font-size: 14px;
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
            <h1><?php echo display('general_ledger') ?></h1>
            <small><?php //echo display('general_ledger') ?></small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('accounts') ?></a></li>
                <li class="active" style="color:orange"><?php echo display('general_ledger') ?></li>
            </ol>
        </div>
    </section>

    <section class="content">
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
        <div class="row">
            <div class="col-sm-12">
                <div class="col-sm-10"></div>
                 <div class="col-sm-2">
                    <i class="fa fa-cog"  aria-hidden="true" id="myBtn" style="font-size:25px;" onClick="columnSwitchMODAL()"></i> <!-- onclick opens MODAL -->
                    <input type="button" style="float:right;" class="btn btnclr" name="btnPrint" id="btnPrint" value="Print" onclick="printDiv('printArea');"/>
                    <div class="dropdown bootcol" id="drop" style="float:right;padding-right:20px;padding-bottom:10px;">
    <button class="btn btnclr dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
       <span class="glyphicon glyphicon-th-list"></span> Download
     
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
   
  
                
      <li><a href="#" id="cmd"> <img src="<?php echo base_url()?>assets/images/pdf.png" width="24px"> PDF</a></li>
      
      <li class="divider"></li>         
                  
      <li><a href="#" onclick="$('#ProfarmaInvList').tableExport({type:'excel',escape:'false'});"> <img src="<?php echo base_url()?>assets/images/xls.png" width="24px"> XLS</a></li>
                 
    </ul>
  </div>

               
    
  </div>  
    </div>
    </div>
    <div class="row" style="background-color:white;">
         <div class="col-sm-12 col-md-12">
             <div id="for_filter_by" class="for_filter_by" style="display: inline;"><label for="filter_by">Filter By&nbsp;&nbsp;
                  
                   </label><select id="filterby" style="border-radius:5px;height:25px;">
                    <option value="1">S.No</option>
                  <option value="2">Transaction Date</option>
<option value="3">Head Code</option>
  <?php
                    if($chkIsTransction){
                        ?>
                      <option value="4">Particulars</option>
                    <?php
                    }
                    ?>

<option value="5">Debit</option>
<option value="6">Credit</option>
<option value="7">Balance</option>




                  </select> <input id="filterinput" style="border-radius:5px;height:25px;" type="text"></div>
    </div>
   </div>

<div class="row" style="background-color:white;">
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading" style="text-align:center;s">
              <strong ><?php echo display('general_ledger_of').'- '.$ledger[0]['HeadName'].' ('.display('on')?> <span class="text-"><?php echo $dtpFromDate ?></span> <?php echo display('to')?>  <span class="text"> <?php echo $dtpToDate;?></span>)</strong></font><strong> 
            </div>
            <div class="panel-body" id="content">
<div id="printArea">
                        <div class="sortableTable__container" >
  <div class="sortableTable__discard">
  </div>
  <h4 class="prbalance" style="text-align:right;">
                    <?php echo display('pre_balance')?> :<span class="input-symbol-euro"> <?php echo number_format($prebalance,2,'.',','); ?></span>
                    <br /> <?php echo display('current_balance')?> :<span class="input-symbol-euro"> <?php echo number_format($CurBalance,2,'.',','); ?></span>
                </h4>
            <table class="table table-stripped" id="ProfarmaInvList"  width="99%" align="center"  cellpadding="5" cellspacing="5" border="2"> 

             <thead class="sorterHeader sortableTable" style="height:30px;">
                  

                <tr class="sortableTable__header">
                    <td class="1 value" data-col="1" data-resizable-column-id="1" height="25" align="center"><strong><?php echo display('sl');?></strong></td>
                    <td class="2 value" data-col="2" data-resizable-column-id="2" align="center"><strong><?php echo "Transaction Date";?></strong></td>
                    <td class="3 value" data-col="3" data-resizable-column-id="3" align="center"><strong><?php echo !empty($Trans)?"Transaction Date":"Head Code";?></strong></td>
                    
                    <?php
                    if($chkIsTransction){
                        ?>
                        <td class="4 value" data-col="4" data-resizable-column-id="4" align="center"><strong><?php echo display('particulars')?></strong></td>
                    <?php
                    }
                    ?>
                    <td class="5 value" data-col="5" data-resizable-column-id="5" align="right"><strong><?php echo display('debit');?></strong></td>
                    <td class="6 value" data-col="6" data-resizable-column-id="6" align="right"><strong><?php echo display('credit');?></strong></td>
                    <td class="7 value" data-col="7" data-resizable-column-id="7" align="right"><strong><?php echo display('balance');?></strong></td>
                </tr>
                </thead>
                <tbody class="sortableTable__body">

                <?php
                if((!empty($error)?$error:'')){
                    ?>

                    <tr>
                        <td height="25"></td>
                        <td></td>
                        <td><?php echo display('no_report')?>.</td>
                        <?php
                        if($chkIsTransction){
                            ?>
                            <td></td>
                            <?php
                        }
                        ?>

                        <td align="right"></td>
                        <td align="right"></td>
                        <td align="right"></td>
                    </tr>

                    <?php
                }
                else{
                $TotalCredit=0;
                $TotalDebit=0;
                $CurBalance =$prebalance;
                $i=0;
                foreach($HeadName2 as $key=>$data) {
                    if($i&1)
                                $bg="#e2e4ed";
                            else
                                $bg="#FFFFFF";
                    ?>
                    <tr>
                        <td data-col="1" class="1" height="25" align="center"><?php echo ++$key;?></td>
                        <td data-col="2" class="2" align="center"><?php echo html_escape($data->VDate); ?></td>
                        <td data-col="3" class="3" align="center"><?php echo html_escape($data->COAID); ?></td>
                        
                        <?php
                        if($chkIsTransction){
                            ?>
                            <td data-col="4" class="4" align="center"><?php echo html_escape($data->Narration); ?></td>
                            <?php
                        }
                        ?>

                        <td data-col="5" class="5" align="right"><span class="input-symbol-euro"><?php echo  number_format($data->Debit,2,'.',','); ?></td></span>
                        <td data-col="6" class="6" align="right"><span class="input-symbol-euro"><?php echo  number_format($data->Credit,2,'.',','); ?></td></span>
                        <?php
                        $TotalDebit += $data->Debit;
                        $CurBalance += $data->Debit;

                        $TotalCredit += $data->Credit;
                        $CurBalance -= $data->Credit;
                        ?>
                        <td data-col="7" class="7" align="right"><span class="input-symbol-euro"><?php echo  number_format($CurBalance,2,'.',','); ?></td></span>
                        
                    </tr>
                <?php $i++;} ?>
<tr >
                   
                             <td data-col="1" class="1">&nbsp; </td>
                              <td data-col="2" class="2">&nbsp; </td>
                               <td data-col="3" class="3">&nbsp; </td>
                                <?php
                        if($chkIsTransction){
                            ?>
                            <td data-col="4" class="4" align="right"><strong><?php echo display('total')?></strong></td>
                            <?php
                        }
                        ?>
                                 
                    <td data-col="5" class="5" align="right"><strong><span class="input-symbol-euro"><?php echo number_format($TotalDebit,2,'.',','); ?></span></strong></td>
                    <td data-col="6" class="6" align="right"><strong><span class="input-symbol-euro"><?php echo number_format($TotalCredit,2,'.',','); ?></span></strong></td>
                    <td data-col="7" class="7" align="right"><strong><span class="input-symbol-euro"><?php echo number_format($CurBalance,2,'.',','); ?></span></strong></td>
                </tr>
            
                <?php
                }
                ?>
                </tbody>
               
                  
             
               
            </table>
             
        </div>  </div>
           
        </div>
    </div></div>
</section>



</div>
    <script src="<?php echo base_url()?>assets/js/jquery.bootgrid.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.0.0-alpha.1/jspdf.plugin.autotable.js"></script>

  <div id="myModal_colSwitch" class="modal_colSwitch" >
                    <div class="modal-content_colSwitch" style="width:25%;height:30%;">
                          <span class="close_colSwitch">&times;</span>
                          <div class="col-sm-6"><br><br>
                          <div class="form-group row">
                          <input type="checkbox"  data-control-column="1" checked = "checked" class="1"  value="1"/>S.NO<br>
<input type="checkbox"  data-control-column="2" checked = "checked" class="2"  value="2"/>Transaction Date<br>
<input type="checkbox"  data-control-column="3" checked = "checked" class="3"   value="3"/>Head Code<br>
 <?php  if($chkIsTransction){
                        ?>
                        <input type="checkbox"  data-control-column="4" checked = "checked" class="4"   value="4"/>Particulars<br>
                   
                    <?php
                    }
                    ?>

<input type="checkbox"  data-control-column="5" checked = "checked" class="5"   value="5"/>Debit<br>
<input type="checkbox"  data-control-column="6" checked = "checked" class="6"   value="6"/>Credit<br>
<input type="checkbox"  data-control-column="7" checked = "checked" class="7"  value="7"/>Balance<br>



                          </div> </div> </div> </div>
<script type="text/javascript" src="<?php echo base_url()?>my-assets/js/profarma.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
<script>
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
                 filename: 'invoice'+'.pdf',
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
  }).save('invoice_no.pdf');
    setTimeout( function(){
      $('#for_numrows,#pagesControllers').show();
    }, 4500 );
});

    </script>



</div>>