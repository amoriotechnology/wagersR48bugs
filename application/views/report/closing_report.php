<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
<script src="https://cdn.jsdelivr.net/npm/js-base64@3.7.5/base64.min.js"></script>
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
<!-- Closing Report Start -->
<style>
    td,th{
        text-align:center;
    }
    </style>

<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('closing_report') ?></h1>
            <small><?php //echo display('account_closing_report') ?></small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('report') ?></a></li>
                <li class="active" style="color:orange;"><?php echo display('closing_report') ?></li>
            </ol>
        </div>
    </section>

    <section class="content">
        <!-- Alert Message -->
        <?php
        $message = $this->session->userdata('message');
        if (isset($message)) {
            ?>
            <div class="alert alert-info alert-dismissable" style="background-color: #38469f;color:white;font-weight:bold;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $message ?>                    
            </div>
            <?php
            $this->session->unset_userdata('message');
        }
        $error_message = $this->session->userdata('error_message');
        if (isset($error_message)) {
            ?>
            <div class="alert alert-danger alert-dismissable" style="background-color: #38469f;color:white;font-weight:bold;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $error_message ?>                    
            </div>
            <?php
            $this->session->unset_userdata('error_message');
        }
        ?>



        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-body"> 
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4">
                        <?php echo form_open('Admin_dashboard/date_wise_closing_reports/', array('class' => 'form-inline', 'method' => 'get')) ?>
                        <?php $today = date('Y-m-d'); ?>
                        <label class="select"><?php echo display('search_by_date') ?>: </label>
                        <input type="date" name="from_date"  value="<?php echo html_escape($today); ?>" class="datepicker form-control"/>
                        <label class="select"><?php echo display('to') ?></label>
                        <input type="date" name="to_date" class="datepicker form-control" value="<?php echo html_escape($today); ?>"/>
                        <button type="submit" name="btnSave" class="btn btnclr"><?php echo display('find') ?></button>
                        <?php if(isset($_GET['btnSave']))
{
 ?>
                        <a  class="btn btnclr" href="#" style="background-color: #3CA5DE; color: #fff;" onclick="printDiv('printableArea')"><?php echo display('print') ?></a><?php } ?>
                        <?php echo form_close() ?>		
    </div> 
    <?php if(isset($_GET['btnSave']))
{
 ?>   
    <div class="col-sm-2"></div>
   
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
  </div>

  </div>  
           
                    </div>
                </div>
            </div>
        </div>
            <div class="panel-title">
                         <div id="for_filter_by" class="for_filter_by" style="display: inline;"><label for="filter_by">Filter By&nbsp;&nbsp;
                  
                   </label><select id="filterby" style="border-radius:5px;height:25px;">
                    <option value="1">S.No</option>
                  <option value="2">Date</option>
<option value="3">Cash In</option>
<option value="4">Cash Out</option>
<option value="5">Balance</option>




                  </select> <input id="filterinput" style="border-radius:5px;height:25px;" type="text"></div>
                        </div>

        <div class="row" style="background-color:white;">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
            
    </div>
                    <div class="panel-body" id="content">
                        <div id="printableArea">
                             <table class="print-table" width="100%">
                                                
                                                <tr>
                                                    <td align="left" class="print-table-tr">
                                                        <img src="<?php echo base_url().html_escape($software_info[0]['invoice_logo']);?>" style="width:100px;height:80px;" alt="logo">
                                                    </td>
                                                    <td align="center" class="print-cominfo">
                                                        <span class="company-txt">
                                                            <?php echo html_escape($company[0]['company_name']);?>
                                                           
                                                        </span><br>
                                                        <?php echo html_escape($company[0]['address']);?>
                                                        <br>
                                                        <?php echo html_escape($company[0]['email']);?>
                                                        <br>
                                                         <?php echo html_escape($company[0]['mobile']);?>
                                                        
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

                            <div class="table-responsive">
                                                        <div class="sortableTable__container">
  <div class="sortableTable__discard">
  </div>
            <p style="text-align:center;">  <caption class="text-center"><?php
                                    $from_date = (!empty($from_date)?$from_date:'');
                                     if($from_date){?><b><?php echo display('closing_report').'('.display('from').' '?>{from_date} <?php echo display('to').' '?>{to_date})
                                        <?php }?></b></caption></p>
                                <table class="table table-striped " id="ProfarmaInvList">
                                  
                                    <thead class="sortableTable">
                                        <tr class="sortableTable__header">
                                            <th class="1 value" data-col="1" data-resizable-column-id="1" style="height: 35.0114px;"><?php echo display('sl') ?></th>
                                            <th class="2 value" data-col="2" data-resizable-column-id="2" style="height: 35.0114px;"><?php echo display('date') ?></th>
                                          
                                            <th class="3 value" data-col="3" data-resizable-column-id="3" style="height: 35.0114px;"><?php echo display('cash_in') ?></th>
                                            <th class="4 value" data-col="4" data-resizable-column-id="4" style="height: 35.0114px;"><?php echo display('cash_out') ?></th>
                                            <th class="5 value" data-col="5" data-resizable-column-id="5" style="height: 35.0114px;"><?php echo display('balance') ?></th>
                                        </tr>
                                    </thead>
                                    <tbody class="sortableTable__body">
                                        <?php
                                        if ($daily_closing_data) {
                                            ?>
                                            <?php $i = 1;
                                            foreach ($daily_closing_data as $row) {
                                                 if($i&1)
                                $bg="#e2e4ed";
                            else
                                $bg="#FFFFFF";
                                                ?>
                                                <tr>
                                                    <td data-col="1" class="1"   bgcolor="<?php echo $bg; ?>"><?php echo $i ?></td>
                                                    <td data-col="2" class="2"  bgcolor="<?php echo $bg; ?>"><?php echo html_escape($row['final_date']); ?></td>
                                                    <td data-col="3" class="3"  bgcolor="<?php echo $bg; ?>" ><?php
                                                        echo (($position == 0) ? "$currency " : " $currency");

                                                        echo html_escape(number_format($row['cash_in'], 2, '.', ','));
                                                        ?></td>
                                                    <td data-col="4" class="4"  bgcolor="<?php echo $bg; ?>" ><?php
                                                        echo (($position == 0) ? "$currency " : " $currency");
                                                        echo html_escape(number_format($row['cash_out'], 2, '.', ','));
                                                        ?></td>
                                                    <td data-col="5" class="5"  bgcolor="<?php echo $bg; ?>" ><?php
                                                echo (($position == 0) ? "$currency " : " $currency");

                                                echo html_escape(number_format($row['cash_in_hand'], 2, '.', ','));
                                                        ?></td>

                                                </tr>
                                                <?php $i++;
                                            }
                                            ?>
    <?php
}else
{
    ?>
    <tr> <td  colspan="5">Records Not Found</td></tr>
    <?php
}
?>
                                    </tbody>
                                </table><?php } ?> 
                                </div>
                        </div>
                            </div>
                        </div>
                        <div class="text-right"><?php echo html_escape($links) ?></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="<?php echo base_url()?>assets/js/jquery.bootgrid.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.0.0-alpha.1/jspdf.plugin.autotable.js"></script>

  <div id="myModal_colSwitch" class="modal_colSwitch" >
                    <div class="modal-content_colSwitch" style="width:15%;height:20%;">
                          <span class="close_colSwitch">&times;</span>
                          <div class="col-sm-6"><br><br>
                          <div class="form-group row">
                          <input type="checkbox"  data-control-column="1" checked = "checked" class="1"  value="1"/>S.NO<br>
<input type="checkbox"  data-control-column="2" checked = "checked" class="2"  value="2"/>Date<br>
<input type="checkbox"  data-control-column="3" checked = "checked" class="3"   value="3"/>Cash In<br>
<input type="checkbox"  data-control-column="4" checked = "checked" class="4"   value="4"/>Cash Out<br>
<input type="checkbox"  data-control-column="5" checked = "checked" class="5"   value="5"/>Balance<br>


                          </div> </div> </div> </div>


</div>

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
  }).save('Closing_Report.pdf');
    setTimeout( function(){
      $('#for_numrows,#pagesControllers').show();
    }, 4500 );
});

    </script>

<!-- Closing Report End -->