<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
<script src="
https://cdn.jsdelivr.net/npm/jquery-base64-js@1.0.1/jquery.base64.min.js
"></script>
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
    /* .input-symbol-euro {
        padding-top: 6px;
        padding-left: 20px;
  position: absolute;
  font-size: 14px;
}
.input-symbol-euro input {
  padding-left: 18px;
}
.input-symbol-euro:after {
  position: absolute;
  top: 7px;
 content: '<?php //echo $currency; ?>';
  left: 5px;
} */
    </style>
<?php
include ('Class/CConManager.php');
include ('Class/CResult.php');
include ('Class/CAccount.php');
include ('Class/Ccommon.php');
?>

<?php
if(isset($_POST['btnSave']))
{

    $oAccount=new CAccount();
    $oResult=new CResult();
    $HeadCode=10107;
    $HeadName=$_POST['txtName'];
    $FromDate=$_POST['dtpFromDate'];
    $ToDate=$_POST['dtpToDate'];


    $sql= $this->accounts_model->inventoryledger_firstqury($FromDate,$ToDate,$HeadCode);

    $oResult=$oAccount->SqlQuery($sql);
    $PreBalance=0;

    if($oResult->num_rows>0)
    {
        $PreBalance=$oResult->row['Debit'];
        $PreBalance=$PreBalance- $oResult->row['Credit'];
    }

     $sql=$this->accounts_model->inventoryledger_secondqury($FromDate,$HeadCode,$ToDate);
 
    $oResult=$oAccount->SqlQuery($sql);
}
?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('inventory_ledger') ?></h1>
            <small><?php //echo display('inventory_ledger') ?></small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('accounts') ?></a></li>
                <li class="active" style="color:orange;"><?php echo display('inventory_ledger') ?></li>
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
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4>

                    </h4>
                </div>
            </div>
            <div class="panel-body">
              <div class="col-sm-4"></div>
              <div class="col-sm-4">
            <?php echo form_open('','name="form1" id="form1" class="form-inline"')?>        
               
                    <input type="hidden" id="txtName" name="txtName"/>
                    <label class="select"><?php echo display('from_date') ?></label> 
                       <input type="date" name="dtpFromDate" required value="<?php echo (!empty($FromDate)?$FromDate:'')?>" placeholder="<?php echo display('from_date') ?>" class="datepicker form-control">
                        <label class="select"><?php echo display('to_date') ?></label>
                          <input type="date"  name="dtpToDate" required value="<?php echo (!empty($ToDate)?$ToDate:'')?>" placeholder="<?php echo display('to_date') ?>" class="datepicker form-control">
                       <button type="submit" name="btnSave"  class="btn btnclr"><?php echo display('find') ?></button>
                                   <?php
if(isset($_POST['btnSave']))
{?>   <?php  } ?>
                
                <?php echo form_close()?>
            </div>
              <div class="col-sm-2"></div>
              <?php
if(isset($_POST['btnSave']))

{?>           


            <div class="col-sm-2">

                    <i class="fa fa-cog"  aria-hidden="true" id="myBtn" style="font-size:25px;" onClick="columnSwitchMODAL()"></i> <!-- onclick opens MODAL -->

                    <div class="dropdown bootcol" id="drop" style="float:right;padding-right:20px;padding-bottom:10px;">
    <button class="btn btnclr dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
       <span class="glyphicon glyphicon-th-list"></span> Download
     
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
   
  
                
      <li><a href="#" id="cmd"> <img src="<?php echo base_url()?>assets/images/pdf.png" width="24px"> PDF</a></li>
      
      <li class="divider"></li>         
                  
      <li><a href="#" onclick="$('#ProfarmaInvList').tableExport({type:'excel',escape:'false'});"> <img src="<?php echo base_url()?>assets/images/xls.png" width="24px"> XLS</a></li>
                 
    </ul>
    <input type="button" class="btnclr btn" name="btnPrint" id="btnPrint" value="Print" onclick="printDiv('printArea');"/>
    <!-- <a onclick="reload();"  >  <i class="fa fa-refresh" style="font-size:25px;float:right;" aria-hidden="true"></i> </a> -->

  </div>

  </div>  

  <?php  } ?>
        </div>
    </div>
</div>

<div class="row" >
  <div class="col-sm-12 col-md-12"></div>
    </div>
<?php
if(isset($_POST['btnSave']))
{?>
            <div class="panel-title">

               <div id="for_filter_by" class="for_filter_by" style="display: inline;"><label for="filter_by">Filter By&nbsp;&nbsp;
                  
                   </label><select id="filterby" style="border-radius:5px;height:25px;">
                    <option value="1">S.No</option>
                  <option value="2">Date</option>
<option value="3">Voucher No</option>
<option value="4">Type</option>
<option value="5">Remark</option>
<option value="6">Debit</option>
<option value="7">Credit</option>
<option value="8">Balance</option>



                  </select> <input id="filterinput" style="border-radius:5px;height:25px;" type="text"></div>
</div>
<div class="row" style="background-color:white;">
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
</div>
            <div class="panel-body"  id="printArea">
                <tr align="center">
                    <td id="ReportName"><b><?php echo display('bank_book_voucher')?></b></td>
                </tr>
                <div id="content">
                               <table class="print-table" width="100%">
                                                
                                                <tr>
                                                    <td align="left" class="print-table-tr">
                                                    <img src="<?php echo  base_url().$logo; ?>"   style='width: 90px;'  />

                                                    </td>
                                                    <td align="center" class="print-cominfo">
                                                        <span class="company-txt">
                                   
                                                        <h3> <?php echo $company; ?> </h3>
                                                         <h4></b><?php echo $address; ?> </h4>
                                                         <h4></b><?php echo $email; ?> </h4>
                                                         <h4></b><?php echo $phone; ?> </h4>
                                                    </td>
                                                   
                                                     <td align="right" class="print-table-tr">
                                                        <date>
                                                        <?php echo display('date')?>: <?php
                                                        echo date('d-M-Y');
                                                        ?> 
                                                    </date>
                                                    </td>
                                                </tr>            
                                   
                                </table>
                                 <p style="text-align:center;"><caption class="text-center"><font size="+1"> <strong> <?php echo display('cash_book_report')?>  (<?php echo display('from')?> <?php echo (!empty($FromDate)?html_escape($FromDate):''); ?> <?php echo display('to')?> <?php echo (!empty($ToDate)?html_escape($ToDate):'');?>)</font><strong></caption></p>
                    
                            <p align="right"><strong><?php echo display('opening_balance')?></strong> 
                           <?php echo $currency.number_format((!empty($PreBalance)?$PreBalance:0),2,'.',','); ?></p>

                          <div class="sortableTable__container">
  <div class="sortableTable__discard">
  </div>
    
                 <table width="100%" class="table table-stripped" id="ProfarmaInvList" >
                   
                      <thead  class="sortableTable" style="height:35px;">
                        <tr class="sortableTable__header">
                            <th style="text-align:center;" class="1 value" data-col="1" data-resizable-column-id="1"  ><strong><?php echo display('sl')?></strong></th>
                            <th style="text-align:center;" class="2 value" data-col="2" data-resizable-column-id="2" ><strong><?php echo display('date')?></strong></th>
                            <th style="text-align:center;" class="3 value" data-col="3" data-resizable-column-id="3" ><strong><?php echo display('voucher_no')?></strong></th>
                            <th style="text-align:center;" class="4 value" data-col="4" data-resizable-column-id="4"><strong><?php echo display('type')?></strong></th>
                            <th style="text-align:center;" class="5 value" data-col="5" data-resizable-column-id="5" ><strong><?php echo display('remark')?></strong></th>
                            <th style="text-align:center;" class="6 value" data-col="6" data-resizable-column-id="6"><strong><?php echo display('debit')?></strong></th>
                            <th style="text-align:center;" class="7 value" data-col="7" data-resizable-column-id="7"><strong><?php echo display('credit')?></strong></th>
                            <th style="text-align:center;" class="8 value" data-col="8" data-resizable-column-id="8"><strong><?php echo display('balance')?></strong></th>
                        </tr>
    </thead>
    <tbody class="sortableTable__body">
                        <?php
                        $TotalCredit=0;
                        $TotalDebit=0;
                        $VNo="";
                        $CountingNo=1;
                        if($oResult->num_rows){
                        for($i=0;$i<(!empty($oResult->num_rows)?$oResult->num_rows:0);$i++)
                        {
                            if($i&1)
                                $bg="#e2e4ed";
                            else
                                $bg="#FFFFFF";
                            ?>
                            <tr class="table_data" style="font-weight:normal;text-align:center;">
                                <?php
                                if($VNo!=$oResult->rows[$i]['VNo'])
                                {
                                    ?>
                                    <td  data-col="1" class="1" height="25" bgcolor="<?php echo html_escape($bg); ?>"><?php echo $CountingNo++;?></td>
                                    <td data-col="2" class="2" style="width:100px;" bgcolor="<?php echo html_escape($bg); ?>"><?php echo substr($oResult->rows[$i]['VDate'],0,10);?></td>
                                    <td data-col="3" class="3" bgcolor="<?php echo html_escape($bg); ?>"><?php
                                        echo $oResult->rows[$i]['VNo'];
                                        ?></td>
                                    <td data-col="4" class="4" bgcolor="<?php echo html_escape($bg); ?>">
                                            <?php echo trim($oResult->rows[$i]['Vtype']);
                                            ?>
                                    </td>
                                    <?php
                                    $VNo=$oResult->rows[$i]['VNo'];
                                }
                                else
                                {
                                    ?>
                                    <!-- <td data-col="5" class="5" colspan="4">&nbsp;</td> -->
                                    <?php
                                }
                                ?>
                                <td data-col="5" class="5" bgcolor="<?php echo html_escape($bg); ?>"><?php echo $oResult->rows[$i]['Narration'];?></td>
                                <td data-col="6" class="6" bgcolor="<?php echo html_escape($bg); ?>"><?php
                                    $TotalDebit += $oResult->rows[$i]['Debit'];
                                    $PreBalance += $oResult->rows[$i]['Debit'];
                                    echo $currency.number_format($oResult->rows[$i]['Debit'],2,'.',',');?></td>
                                <td  data-col="7" class="7" bgcolor="<?php echo html_escape($bg); ?>"><?php
                                    $TotalCredit += $oResult->rows[$i]['Credit'];
                                    $PreBalance -= $oResult->rows[$i]['Credit'];
                                    echo $currency.number_format($oResult->rows[$i]['Credit'],2,'.',',');?></td>
                                <td data-col="8" class="8" bgcolor="<?php echo html_escape($bg); ?>"><?php printf("%.2f",$PreBalance); ?></td>
                            </tr>
                            <?php
                        }}else{  ?>
  <tr>

                                                <td class="text-center" colspan="8"><?php echo display('not_found'); ?></td>

                                            </tr>

                        <?php }
                        ?>
                        <tr class="table_data print-footercolor">
                            <td class="1" align="center" >&nbsp;</td>
                            <td class="2" align="center" >&nbsp;</td>
                            <td class="3" align="center" >&nbsp;</td>
                            <td class="4" align="center" >&nbsp;</td>
                            <td  class="5" align="center" ><strong>Total</strong></td>
                            <td  class="6" align="center" ><?php echo $currency.number_format($TotalDebit,2,'.',','); ?></td>
                            <td  class="7" align="center" ><?php echo $currency.number_format($TotalCredit,2,'.',','); ?></td>
                            <td  class="8" align="center" ><?php echo $currency.number_format((!empty($PreBalance)?$PreBalance:0),2,'.',','); ?></td>
                        </tr>
                    </tbody>
                    </table>

                </div>
               
            </div>
        </div>
       
        </div>
    </div>
</div>
<?php  } ?>
</section>













<script src="<?php echo base_url()?>assets/js/jquery.bootgrid.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.0.0-alpha.1/jspdf.plugin.autotable.js"></script>

<div id="myModal_colSwitch"  class="modal_colSwitch">
                    <div class="modal-content_colSwitch" style="width:30%;height:25%;">
                    <span class="close_colSwitch">&times;</span>
                       
                          <div class="col-sm-2" ></div>


                          <div class="col-sm-3" ><br>
                          <div class="form-group row"  > 
                         
                          <br><input type="checkbox"  data-control-column="1" checked = "checked" class="1"  value="1"/>&nbsp; <?php echo display('Sl')?><br>
                          <br><input type="checkbox"  data-control-column="2" checked = "checked" class="2"  value="2"/>&nbsp;<?php echo ('Date')?><br>
                          <br><input type="checkbox"  data-control-column="3" checked = "checked" class="4"   value="4"/>&nbsp;<?php echo ('Voucher No')?><br>
             </div>
        </div>




                      <div class="col-sm-3"  ><br>
                          <div class="form-group row"  >
                          <br><input type="checkbox"  data-control-column="4" checked = "checked" class="3"   value="3"/>&nbsp;<?php echo ('Voucher Type')?><br>
                          <br><input type="checkbox"  data-control-column="5" checked = "checked" class="5"  value="5"/>&nbsp;<?php echo display('Remark')?><br>

                          <br><input type="checkbox"  data-control-column="6" checked = "checked" class="6"   value="6"/>&nbsp;<?php echo display('Debit')?><br>

                        </div>
                        </div>
     

   
                          <div class="col-sm-3"  ><br>
                          <div class="form-group row"  >

                          <br><input type="checkbox"  data-control-column="7" checked = "checked" class="7"   value="7"/>&nbsp;<?php echo display('Credit')?><br>
                          <br><input type="checkbox"  data-control-column="8" checked = "checked" class="8"   value="8"/>&nbsp;<?php echo display('Balance')?><br>

                 
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
  }).save('InventoryLedger.pdf');
    setTimeout( function(){
      $('#for_numrows,#pagesControllers').show();
    }, 4500 );
});

    </script>
