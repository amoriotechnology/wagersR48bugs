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
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo ('Voucher Approval') ?></h1>
            <small><?php //echo display('debit_voucher') ?></small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('accounts') ?></a></li>
                <li class="active" style="color:orange"><?php echo ('voucher Approval') ?></li>
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







<div class="row">
                <div class="panel panel-bd lobidrag">

                    <div class="panel-heading" style="height: 60px;">
   <div class="col-sm-10">
                




                    <a onclick="reload();"  >  <i class="fa fa-refresh" style="font-size:25px;float:right;" aria-hidden="true"></i> </a>
                  </div>

                           <div class="col-sm-2">


                    <i class="fa fa-cog"  aria-hidden="true" id="myBtn" style="font-size:25px;" onClick="columnSwitchMODAL()"></i> <!-- onclick opens MODAL -->

                    <div class="dropdown bootcol" id="drop" style="float:right;padding-right:20px;padding-bottom:10px;">
                    <button class="btn btnclr dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
       <span class="glyphicon glyphicon-th-list"></span>  <?php echo display('download') ?>
     
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
   
  
                
      <li><a href="#" onclick="generate()"> <img src="<?php echo base_url()?>assets/images/pdf.png" width="24px"><?php echo display('PDF') ?> </a></li>
      
      <li class="divider"></li>         
                  
      <li><a href="#" onclick="$('#ProfarmaInvList').tableExport({type:'excel',escape:'false'});"> <img src="<?php echo base_url()?>assets/images/xls.png" width="24px">  <?php echo display('XLS') ?></a></li>
                 
    </ul>

    &nbsp;
    <input type="button" class="btn btnclr" name="btnPrint" id="btnPrint"   value="Print" onclick="printDiv('printArea');"/>
  </div>
  </div>
  </div>      
  </div>












<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading" style="height:60px;">
                <div class="panel-title">
                        <div id="for_filter_by" class="for_filter_by" style="display: inline;"><label for="filter_by">Filter By&nbsp;&nbsp;
                  
                   </label><select id="filterby" style="border-radius:5px;height:25px;">
                    <option value="1">S.No</option>
                  <option value="2">Voucher No</option>
<option value="3">Date</option>
<option value="4">Remark</option>
<option value="5">Debit</option>
<option value="6">Credit</option>
<option value="7">Action</option>




                  </select> <input id="filterinput" style="border-radius:5px;height:25px;" type="text"></div>
                </div>
            </div>
            <div class="panel-body" id="printArea">
 
                <div class="" id="content" >
                                       <div class="sortableTable__container">
  <div class="sortableTable__discard">
  </div>
                    <table width="100%" class="table table-stripped" id="ProfarmaInvList">
                     <thead class="sortableTable" style="height:30px;">
                           <tr class="sortableTable__header" >
                                <th class="1 value" data-col="1" data-resizable-column-id="1"><?php echo "S.No"; ?></th>
                                <th class="2 value" data-col="2" data-resizable-column-id="2"><?php echo display('voucher_no') ?></th>
                                 <th class="3 value" data-col="3" data-resizable-column-id="3"><?php echo display('date') ?></th>
                                <th class="4 value" data-col="4" data-resizable-column-id="4"><?php echo display('remark') ?></th>
                                <th class="5 value" data-col="5" data-resizable-column-id="5"><?php echo display('debit') ?></th>
                                <th class="6 value" data-col="6" data-resizable-column-id="6"><?php echo display('credit') ?></th>
                                <th class="7 value" data-col="7" data-resizable-column-id="7"><?php echo display('action') ?></th> 
                            </tr>
                        </thead>
                        <tbody class="sortableTable__body">
                            <?php if (!empty($aprrove)) ?>
                            <?php $sl = 1; ?>
                            <?php 
                            $i=0;
                            foreach ($aprrove as $approve) {
                                
                                if($i&1)
                                $bg="#e2e4ed";
                            else
                                $bg="#FFFFFF";
                                 ?>
                            <tr style="text-align:center;">
                                <td data-col="1" class="1"  bgcolor="<?php echo $bg; ?>"><?php echo $sl++; ?></td>
                                <td data-col="2" class="2"  bgcolor="<?php echo $bg; ?>"><?php echo html_escape($approve->VNo); ?></td>
                                <td data-col="3" class="3"  bgcolor="<?php echo $bg; ?>"><?php echo html_escape($approve->VDate); ?></td>
                                <td data-col="4" class="4"  bgcolor="<?php echo $bg; ?>"><?php echo html_escape($approve->Narration); ?></td>
                                <td data-col="5" class="5"  bgcolor="<?php echo $bg; ?>"><?php
                                 echo ($approve->Vtype=='CV'?0:$approve->Debit); ?></td>
                                <td data-col="6" class="6"  bgcolor="<?php echo $bg; ?>"><?php echo ($approve->Vtype=='DV'?0:$approve->Credit); ?></td>
                                <td data-col="7" class="7"  bgcolor="<?php echo $bg; ?>">

                                <a href="<?php echo base_url("accounts/isactive/$approve->VNo/active") ?>" onclick="return confirm(<?php echo 'Are you sure'; ?>)" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="right" ><?php echo "Approve";?></a>
                                <?php if($this->permission1->method('aprove_v','update')->access()){ ?>
                                <a href="<?php echo base_url("accounts/voucher_update/$approve->VNo") ?>" class="btn btn-info btn-sm" title="Update"><i class="fa fa-edit"></i></a>
                            <?php }?>
                            <?php if($this->permission1->method('aprove_v','delete')->access()){ ?>
                                <a href="<?php echo base_url("accounts/voucher_delete/$approve->VNo") ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure?')" title="delete"><i class="fa fa-trash"></i></a>
                            <?php }?>
                                
                                </td>
                            </tr>
                            <?php  $i++;} ?> 
                        </tbody>
                    </table>
                  </div> 
                </div>
            </div> 
            <script src="<?php echo base_url()?>assets/js/jquery.bootgrid.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.0.0-alpha.1/jspdf.plugin.autotable.js"></script>

<div id="myModal_colSwitch"  class="modal_colSwitch">
                    <div class="modal-content_colSwitch" style="width:25%;height:25%;">
                    <span class="close_colSwitch">&times;</span>
                       
                          <div class="col-sm-2" ></div>


                          <div class="col-sm-3" ><br>
                          <div class="form-group row"  > 
                         
                          <br><input type="checkbox"  data-control-column="1" checked = "checked" class="1"  value="1"/>&nbsp; <?php echo display('Sl')?><br>
                          <br><input type="checkbox"  data-control-column="2" checked = "checked" class="2"  value="2"/>&nbsp;<?php echo ('Voucher No')?><br>
                          <br><input type="checkbox"  data-control-column="4" checked = "checked" class="4"   value="4"/>&nbsp;<?php echo display('Date')?><br>
             </div>
        </div>




                      <div class="col-sm-3"  ><br>
                          <div class="form-group row"  >
                          <br><input type="checkbox"  data-control-column="3" checked = "checked" class="3"   value="3"/>&nbsp;<?php echo display('Remark')?><br>
                          <br><input type="checkbox"  data-control-column="5" checked = "checked" class="5"  value="5"/>&nbsp;<?php echo display('Debit')?><br>

                          <br><input type="checkbox"  data-control-column="6" checked = "checked" class="6"   value="6"/>&nbsp;<?php echo display('Credit')?><br>

                        </div>
                        </div>
     

   
                          <div class="col-sm-3"  ><br>
                          <div class="form-group row"  >

                          <br><input type="checkbox"  data-control-column="7" checked = "checked" class="7"   value="7"/>&nbsp;<?php echo display('action')?><br>

                 
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
     pdf.text("Testing Report", 20,50);
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
                 filename: 'Report'+'.pdf',
                 allowTaint: true,
                 html2canvas: { scale: 3 },
                 jsPDF: { unit: 'in', format: 'a4', orientation: 'portrait' }
             };
              html2pdf().from(invoice).set(opt).toPdf().get('pdf').then(function (pdf) {
  var totalPages = pdf.internal.getNumberOfPages();
  pdf.text("my header text", 10, 10);
 for (var i = 1; i <= totalPages; i++) {
    pdf.text("Report", pdf.internal.pageSize.getWidth() - 100, pdf.internal.pageSize.getHeight() - 10);
    pdf.setPage(i);
    pdf.setFontSize(10);
  pdf.text("my header text", 10, 10)

        // The 10,200 value is only for A4 landscape. You need to define your own for other page sizes
     //   pdf.text("foot", 10, 200)
  pdf.text('Page ' + i + ' of ' + totalPages,  pdf.internal.pageSize.getWidth() - 50, pdf.internal.pageSize.getHeight() - 50);
    pdf.setTextColor(150);
   

  }
  }).save('Report.pdf');
    setTimeout( function(){
      $('#for_numrows,#pagesControllers').show();
    }, 4500 );
});

    </script>
        </div>
    </div>
</div>
</section>
</div>
 

<script>
    function reload(){
    location.reload();
}
</script>