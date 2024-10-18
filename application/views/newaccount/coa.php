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
<?php
include ('Class/CConManager.php');
include ('Class/Ccommon.php');
include ('Class/CResult.php');
include ('Class/CAccount.php');
?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo "Vocher Report"; ?></h1>
            <small><?php //echo "Vocher Report"; ?></small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo "Accounts"; ?></a></li>
                <li class="active" style="color:orange;"><?php echo "Vocher Report"; ?></li>
            </ol>
        </div>
    </section>
<?php
if(isset($_POST['btnSave']))
{

    $oAccount=new CAccount();
    $oResult=new CResult();
   

    $date=$_POST['sales_date'];
  


    $sql= $this->accounts_model->get_cash_bydate($date);

  //  $oResult=$oAccount->SqlQuery($sql);
    $sql1=$this->accounts_model->get_vouchar_bydate($date);
//echo  $sql1[0]['Narration'];
   // $oResult=$oAccount->SqlQuery($sql1);
 //print_r( $sql1);
}
?>
    <section class="content">
        <!-- Alert Message -->
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
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-bd lobidrag">
            <!-- <div class="panel-heading">
                <div class="panel-title">
                
                </div>
            </div> -->
              <div class="panel-body">

                <div class="row" id="">
                    <div class="col-sm-12" style="text-align: center;">
                         <?php echo form_open_multipart('','name="form1" id="form1" class="form-inline')?>  
                          <div class="col-sm-3"></div> 
                        <div class="col-sm-3 form-group row" style="text-align: end;">
                           
                            <label for="date" class="col-form-label"><?php echo display('date') ?>
                            </label>
                           
                                <input type="date" required name="sales_date" id="sales_date" placeholder="<?php echo display('date') ?>" class="datepicker form-control serach_date">
                        
                               </div>
                                <div class="col-sm-1">
                            <button type="submit" style="background-color: #3CA5DE; color: #fff;" class="btn btnclr" name="btnSave" id="btnSerach"><?php echo display('find') ?></button>
                        </div> 

                         <div class="col-sm-3"></div>

                         <?php  if(isset($_POST['btnSave'])){?>
                            <a onclick="reload();"  >  <i class="fa fa-refresh" style="font-size:25px;float:right;" aria-hidden="true"></i> </a>

                    <div class="col-sm-2">

                    <i class="fa fa-cog"  aria-hidden="true" id="myBtn" style="font-size:25px;" onClick="columnSwitchMODAL()"></i> <!-- onclick opens MODAL -->
                    &nbsp;
 
                    <div class="dropdown bootcol" id="drop" style="float:right;padding-right:20px;padding-bottom:10px;">

    <button class="btn btnclr dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
       <span class="glyphicon glyphicon-th-list"></span>  <?php echo display('download') ?>
     
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
   
  
                
     <li><a href="#" onclick="generate()"> <img src="<?php echo base_url()?>assets/images/pdf.png" width="24px"> PDF</a></li>
      
      <li class="divider"></li>         
                  
      <li><a href="#" onclick="$('#ProfarmaInvList').tableExport({type:'excel',escape:'false'});"> <img src="<?php echo base_url()?>assets/images/xls.png" width="24px"> XLS</a></li>
               
    </ul>
    &nbsp;
    <input type="button" class="btn btnclr" name="btnPrint" id="btnPrint"   value="Print" onclick="printDiv('printArea');"/>
  </div>
    </div>
    <?php   } ?>
                   
   <?php echo form_close();?>
 </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
<?php  if(isset($_POST['btnSave'])){?>
<div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
    
                         <div id="block_container">
                                <div id="bloc1" >
                              
                               </div> 
     
<br/>
                             <div id="bloc2" style="float:right;">

                              <div id="for_filter_by" class="for_filter_by" style="display: inline;"><label for="filter_by">Filter By&nbsp;&nbsp;
                  
                   </label><select id="filterby" style="border-radius:5px;height:25px;">
                  <option value="1">Voucher No</option>
<option value="2">Remark</option>
<option value="3">Amount</option>
<option value="4">Date</option>



                  </select> <input id="filterinput" style="border-radius:5px;height:25px;" type="text"></div>
                            

                 

                   
                     </div>    </div>

<br/>

                        </div>
                    </div>

                 <?php } ?>   
                 
<div class="row">
    <div class="col-sm-12 col-md-12">
          <?php
                         if(isset($_POST['btnSave'])){?>
        <div class="panel panel-bd lobidrag">
            <div class="panel-body" id="printArea">
                <div class="">
                   <?php echo "<span style='font-weight:bold;'>Date : </span>".$_POST['sales_date']; ?>
                   <div class="sortableTable__container">
  <div class="sortableTable__discard">
  </div>
                   <table class="table table-bordered" cellspacing="0" width="100%" id="ProfarmaInvList">
                       
                        <thead class="sortableTable" style="height:40px;">
                        <tr class="sortableTable__header">
                            <th class="1 value" data-col="1"data-control-column="1"><?php echo display('voucher_no') ?></th>
                            <th class="2 value" data-col="2"data-control-column="2"><?php echo display('remark') ?></th>
                            <th class="3 value" data-col="3"data-control-column="3"><?php echo display('amount') ?></th>
                            <th class="4 value" data-col="4"data-control-column="4"><?php echo display('date') ?></th>
                        </tr>
                        </thead>
                        <?php }  ?>
                        <tbody class="sortableTable__body">
                    <?php
                         if(isset($_POST['btnSave'])){
                                if(count($sql)>1){
                     ?>
                              <tr id="show_vouchar">
                                  <td data-col="1" style="text-align:center;" class="1">
                                     <a href="<?php echo base_url("accounts/vouchar_cash/".$date) ?>">
                                          <?php echo "CV-BAC-".$date;?>
                                     </a>
                                  </td>
                                  <td data-col="2"  class="2">Aggregated Cash Credit Voucher of <?php echo $date;?></td>
                                  <td data-col="3"  class="3"><?php 
                             
                                  if($sql['Amount']==''){
                                           echo '0.00';
                                      }else{
                                          echo $sql['Amount'];
                                      }
                                      ?></td>
                                  <td data-col="4"  class="4" align="center"><?php  echo $date; ?></td>
                              </tr>
                           <?php    }
                                
                                
                                }?>
                          <?php
                          //echo $get_vouchar->Narration;
                          if(isset($_POST['btnSave'])){
                           if($sql1){
for($i=0;$i<count($sql1);$i++){
   
                        //  foreach($sql1 as $v_data){

                              ?>
                              <tr>
                                  <td data-col="1"  class="1"><a href="<?php echo base_url().'/accounts/vouchar_view/'. $sql1[$i]['VDate'] ?>"><?php echo $sql1[$i]['VNo'];?></a></td>
                                  <td data-col="2"  class="2"><?php echo $sql1[$i]['Narration'];?></td>
                                  <td data-col="3"  class="3"><?php echo number_format($sql1[$i]['Amount']); ?></td>
                                  <td data-col="4"  class="4"><?php echo $sql1[$i]['VDate'];?></td>
                              </tr>
                          <?php
                          }}else{   ?>
  <tr>

                                                <td class="text-center" colspan="4"><?php echo display('not_found'); ?></td>

                                            </tr>
                         <?php }
                        }
                          ?>

                        </tbody>
                    </table>
                     </div> </div> </div>
                </div>
 <div id="myModal_colSwitch" class="modal_colSwitch">
                    <div class="modal-content_colSwitch" style="width:22%;height:33%;">
                          <span class="close_colSwitch">&times;</span>
       

<div class="col-sm-2" >   </div>


<div class="col-sm-3" ><br>
                          <div class="form-group row"> 
                         
                          <br><input type="checkbox"  data-control-column="1" checked = "checked" class="1"  value="1"/>&nbsp; <?php echo ('Voucher No')?><br>
                          <br><input type="checkbox"  data-control-column="2" checked = "checked" class="2"  value="2"/>&nbsp;<?php echo ('Remarks')?><br>
                          <br><input type="checkbox"  data-control-column="3" checked = "checked" class="3"   value="3"/>&nbsp;<?php echo display('Amount')?><br>

                          <br><input type="checkbox"  data-control-column="4" checked = "checked" class="4"   value="4"/>&nbsp;<?php echo display('Date')?><br>
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
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.0.0-alpha.1/jspdf.plugin.autotable.js"></script>

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
    </script>



<script>
    function reload(){
    location.reload();
}
</script>