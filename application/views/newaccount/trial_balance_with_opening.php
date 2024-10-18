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

<div class="content-wrapper">   
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('accounts') ?></h1>
            <small><?php echo display('trial_balance') ?></small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('accounts') ?></a></li>
                <li class="active"><?php echo display('trial_balance') ?></li>
            </ol>
        </div>
    </section>

    <section class="content">

<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
         


            <div class="panel-body">
           <!-- <div class="col-sm-3"></div> -->

<div class="col-sm-9"></div>
<div class="col-sm-1" style="text-align:right;" >
           <input type="button" class="btn btnclr" name="btnPrint" id="btnPrint"   value="Print" onclick="printDiv('printArea');"/>

           </div>



<div class="col-sm-1" style="text-align:right;" >
<i class="fa fa-cog"  aria-hidden="true" id="myBtn" style="font-size:25px;  text-align:right;" onClick="columnSwitchMODAL()"></i> 

</div>


<div class="col-sm-1">
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

<div class="panel-title">
               <div id="for_filter_by" class="for_filter_by" style="display: inline;"><label for="filter_by">Filter By&nbsp;&nbsp;
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                   </label><select id="filterby" style="border-radius:5px;height:25px;">
                    <option value="1">S.No</option>
                  <option value="2">Date</option>
<option value="3">Code</option>
<option value="4">Account Name</option>
<option value="5">Debit</option>
<option value="6">Credit</option>
                  </select> <input id="filterinput" style="border-radius:5px;height:25px;" type="text"></div>
</div>




<div class="row" style="background-color:white;">


    <div class="col-sm-12 col-md-12">
      

        <div class="panel panel-bd lobidrag">
         
            <div class="panel-heading">
   


            <div  id="printArea">

            <div id="content" id="printArea">
                <div class="panel-body">
                  
                                         <table class="print-table" width="100%">
                                                
                                                <tr>
                                                    <td align="left" class="print-table-tr">
                                                        <!-- <img src="<?php //echo $software_info[0]->logo;?>" alt="logo"> -->
                                                        <img src="<?php echo base_url().$software_info[0]->invoice_logo;?>" alt="logo" style="height:80px;width:100px;">

                                                    </td>
                                                    <td align="center" class="print-cominfo">
                                                        <span class="company-txt">
                                                            <?php echo $company[0]['company_name'];?>
                                                           
                                                        </span><br>
                                                        <?php echo $company[0]['address'];?>
                                                        <br>
                                                        <?php echo $company[0]['email'];?>
                                                        <br>
                                                         <?php echo $company[0]['mobile'];?>
                                                        
                                                    </td>
                                                   
                                                     <td align="right" class="print-table-tr">
                                                        <date>
                                                        <?php echo display('date')?>: <?php
                                                        echo date('d-M-Y');
                                                        ?> 
                                                    </date>

                                                    

                            <tr>
                            <td colspan="4" align="center">
                            <h2><?php echo display('trial_balance_with_opening_as_on');?><br/>
                             <?php echo display('from');?> <?php echo $dtpFromDate; ?> <?php echo display('to');?> <?php echo $dtpToDate;?></h2> 
                            </td>
                            </tr>
                            </tr>        
                                 
                                </table>

                        <table width="100%" class="table table-stripped" id="ProfarmaInvList">
                        <thead class="sortableTable" style="height:30px;">
                        <tr class="sortableTable__header" >
                            <th class="1 value" data-col="1" data-resizable-column-id="1" align="center"><strong><?php echo display('sl')?></strong></th>
                            <th class="2 value" data-col="2" data-resizable-column-id="2" align="center"><strong><?php echo display('date')?></strong></th>
                            <th class="3 value" data-col="3" data-resizable-column-id="3" align="center" ><strong><?php echo display('code')?></strong></th>
                            <th class="4 value" data-col="4" data-resizable-column-id="4" align="center"><strong><?php echo display('account_name')?></strong></th>    
                             <th class="5 value" data-col="5" data-resizable-column-id="5" align="center"><strong><?php echo display('debit')?></strong></th>
                            <th class="6 value" data-col="6" data-resizable-column-id="6" align="right"><strong><?php echo display('credit')?></strong></th>

                        </tr>
                        </thead>
                        <tbody class="sortableTable__body">


                        <?php
                            $TotalCredit=0;
                            $TotalDebit=0;  
                            $k=0;

                            $CountingNo=1;


                            for($i=0;$i<count($oResultTr);$i++)
                            {

                                $COAID=$oResultTr[$i]['HeadCode'];
                                
                                $sql=$this->accounts_model->trial_balance_firstquery($dtpFromDate,$dtpToDate,$COAID);
                                
                                $q1=$this->db->query($sql);
                                $oResultTrial = $q1->row();

                                $bg=$k&1?"#FFFFFF":"#E7E0EE";

                                if($oResultTrial->Credit != $oResultTrial->Debit)
                                {
                                  
                                    $k++; 
                        ?>
                            <tr class="table_data">

                            <td  data-col="1" class="1"  bgcolor="<?php echo $bg; ?>" align="center"><?php echo $CountingNo++;?></td>
                            
                            <td data-col="2" class="2" bgcolor="<?php echo $bg; ?>" style="width:100px;" align="center"><?php $date= $oResultTr[$i]['CreateDate']; $date=explode(" ",$date);echo $date[0];?></td>


                              <td data-col="3" class="3" align="left" bgcolor="<?php echo $bg;?>"><a href="javascript:"><?php echo $oResultTr[$i]['HeadCode'];?>
                               </a>
                              </td>


                              <td data-col="4" class="4" align="left" bgcolor="<?php echo $bg;?>"><?php echo $oResultTr[$i]['HeadName'];?></td>
                              <?php
                                if($oResultTrial->Debit>$oResultTrial->Credit)
                                {
                              ?>
                              <td data-col="5" class="5"  align="right" bgcolor="<?php echo $bg;?>"><?php 
                                $TotalDebit += $oResultTrial->Debit-$oResultTrial->Credit;
                               echo number_format($oResultTrial->Debit-$oResultTrial->Credit,2);
                               ?></td>
                              <td data-col="6" class="6"   align="right" bgcolor="<?php echo $bg;?>"><?php
                               echo number_format('0.00',2);?></td>
                               <?php
                                }
                                else
                                {
                                ?>
                                 <td  data-col="5" class="5"  align="right" bgcolor="<?php echo $bg;?>"><?php 
                               echo number_format('0.00',2);
                               ?></td>
                              <td  data-col="6" class="6"  align="right" bgcolor="<?php echo $bg;?>"><?php 
                                $TotalCredit += $oResultTrial->Credit-$oResultTrial->Debit;
                               echo number_format($oResultTrial->Credit-$oResultTrial->Debit,2);?></td>
                               <?php
                                }
                                ?>
                            </tr>
                        <?php
                                }
                            }
                            for($i=0;$i<count($oResultInEx);$i++)
                            {
                            $COAID=$oResultInEx[$i]['HeadCode'];
                            
                            $sql=$this->accounts_model->trial_balance_secondquery($dtpFromDate,$dtpToDate,$COAID);
                            
                            $q2=$this->db->query($sql);
                            $oResultTrial = $q2->row();

                            $bg=$k&1?"#FFFFFF":"#E7E0EE";
                            if($oResultTrial->Credit!=$oResultTrial->Debit)
                            {
                               
                                $k++; ?>
                            <tr class="table_data">
                              <td  data-col="9" class="9"  align="center" bgcolor="<?php echo $bg;?>"><a href="javascript:"><?php echo $oResultInEx[$i]['HeadCode'];?>
                               </a>
                              </td>
                              <td   data-col="10" class="10"  align="center" bgcolor="<?php echo $bg;?>"><?php echo $oResultInEx[$i]['HeadName'];?></td>
                              <?php
                                if($oResultTrial->Debit>$oResultTrial->Credit)
                                {
                              ?>
                              <td data-col="11" class="11"  align="right" bgcolor="<?php echo $bg;?>"><?php 
                                $TotalDebit += $oResultTrial->Debit-$oResultTrial->Credit;
                               echo number_format($oResultTrial->Debit-$oResultTrial->Credit,2);
                               ?></td>
                              <td  data-col="12" class="12" align="right" bgcolor="<?php echo $bg;?>"><?php
                               echo number_format('0.00',2);?></td>
                               <?php
                                }
                                else
                                {
                                ?>
                                 <td data-col="13" class="13"  align="right" bgcolor="<?php echo $bg;?>"><?php 
                               echo number_format('0.00',2);
                               ?></td>
                              <td data-col="14" class="14"  align="right" bgcolor="<?php echo $bg;?>"><?php 
                                $TotalCredit += $oResultTrial->Credit-$oResultTrial->Debit;
                               echo number_format($oResultTrial->Credit-$oResultTrial->Debit,2);?></td>
                               <?php
                                }
                                ?>
                            </tr>
                        <?php
                                }
                            }
            
                        $ProfitLoss=$TotalDebit-$TotalCredit;
                        if($ProfitLoss!=0)
                        {
                        ?>
                        <tr class="table_data">
                          <td  data-col="1" class="1"   align="left" bgcolor="<?php echo $bg;?>">&nbsp;</td>
                          <td  data-col="2" class="2"   align="left" bgcolor="<?php echo $bg;?>">&nbsp;</td>
                          <td  data-col="3" class="3"   align="left" bgcolor="<?php echo $bg;?>">&nbsp;</td>
                          <td  data-col="4" class="4"    align="right" bgcolor="<?php echo $bg;?>">Profit-Loss</td>
                         <?php
                        }
                         if($ProfitLoss<0)
                         {
                         ?>
                         <td  data-col="5" class="5"  align="right" bgcolor="<?php echo $bg;?>"><?php 
                            $TotalDebit += abs($ProfitLoss);
                           echo number_format( abs($ProfitLoss),2);
                           ?></td>
                          <td data-col="6" class="6" align="right" bgcolor="<?php echo $bg;?>"><?php
                           echo number_format('0.00',2);?></td>
                        <?php
                         echo "</tr>";
                        }
                        else if($ProfitLoss>0)
                        {
                        ?>
                        <td  data-col="5" class="5"  align="right" bgcolor="<?php echo $bg;?>"><?php 
                           echo number_format('0.00',2);
                           ?></td>
                          <td data-col="6" class="6"   align="right" bgcolor="<?php echo $bg;?>"><?php
                          $TotalCredit+= abs($ProfitLoss);
                           echo number_format(abs($ProfitLoss),2);?></td>
                         <?php
                         echo "</tr>";
                        }
                        ?>

                        <tr class="table_head">
                        <td data-col="1" class="1" align="center">&nbsp;</td>
                <td data-col="2" class="2" align="center">&nbsp;</td>
                            <td data-col="3" class="3" align="center" >&nbsp;</td>
                          <td data-col="4" class="4" align="right"><strong><?php echo display('total')?></strong></td>
                          <td data-col="5" class="5" align="right"><strong><?php echo number_format($TotalDebit,2); ?></strong></td>
                          <td data-col="6" class="6" align="right"><strong><?php echo number_format( $TotalCredit,2); ?></strong></td>
                        </tr>
                       
                         
                    </table>



                            <table width="100%" cellpadding="1" cellspacing="20" class="signaturetable">
                                <tr>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <td width="20%" class="footersignature" align="center"><?php echo display('prepared_by');?></td>
                                    <td width="20%" class="footersignature" align="center"><?php echo display('accounts');?></td>
                                    <td  width="20%" class="footersignature" align='center'><?php echo display('chairman');?></td>
                                </tr>
                            </table>
                </div>
            </div>
               
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
                    <div class="modal-content_colSwitch" style="width:25%;height:30%;">
                          <span class="close_colSwitch">&times;</span>
                          <div class="col-sm-6"><br><br>
                          <div class="form-group row">
                          <input type="checkbox"  data-control-column="1" checked = "checked" class="1"  value="1"/>S.NO<br>
<input type="checkbox"  data-control-column="2" checked = "checked" class="2"  value="2"/>Date<br>
<input type="checkbox"  data-control-column="3" checked = "checked" class="3"   value="3"/>Code<br>
<input type="checkbox"  data-control-column="4" checked = "checked" class="4"   value="4"/>Account Name<br>
<input type="checkbox"  data-control-column="5" checked = "checked" class="5"   value="5"/>Debit <br>
<input type="checkbox"  data-control-column="6" checked = "checked" class="6"   value="6"/>Credit<br>



                          </div> </div> </div> </div>


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
  }).save('invoice_no.pdf');
    setTimeout( function(){
      $('#for_numrows,#pagesControllers').show();
    }, 4500 );
});

    </script>
