<?php error_reporting(1);  ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.base64.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/drag_drop_index_table.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/html2canvas.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jspdf.plugin.autotable"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jspdf.umd.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>my-assets/js/invoice_tableManager.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
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
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" />
<!-- <script type="text/javascript" src="http://www.bacubacu.com/colresizable/js/colResizable-1.5.min.js"></script> -->
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" />
<style>

.btnclr{
       background-color:<?php echo $setting_detail[0]['button_color']; ?>;
       color: white;

   }



   .table{
   display: block;
   overflow-x: auto;
   }
     
   .logo-9 i{
    font-size:80px;
    position:absolute;
    z-index:0;
    text-align:center;
    width:100%;
    left:0;
    top:-10px;
    color:#34495e;
    -webkit-animation:ring 2s ease infinite;
    animation:ring 2s ease infinite;
}
.logo-9 h1{
    font-family: 'Lora', serif;
    font-weight:600;
    text-transform:uppercase;
    font-size:40px;
    position:relative;
    z-index:1;
    color:#e74c3c;
    text-shadow: 3px 3px 0 #fff, -3px -3px 0 #fff, 3px -3px 0 #fff, -3px 3px 0 #fff;
}
   
   
  
   .logo-9{
    position:relative;
} 
   
   /*//side*/
   
.bar {
  float: left;
  width: 25px;
  height: 3px;
  border-radius: 4px;
  background-color: #4b9cdb;
}


.load-10 .bar {
  animation: loadingJ 2s cubic-bezier(0.17, 0.37, 0.43, 0.67) infinite;
}


@keyframes loadingJ {
  0%,
  100% {
    transform: translate(0, 0);
  }

  50% {
    transform: translate(80px, 0);
    background-color: #f5634a;
    width: 150px;
  }

   
}
</style>
<div class="content-wrapper">
   <section class="content-header">
      <div class="header-icon">
      
         
         <figure class="one">
               <img src="<?php echo base_url()  ?>asset/images/productreport.png"  class="headshotphoto" style="height:50px;" />
      </div>

          <div class="header-title">
          <div class="logo-holder logo-9">
          <h1><?php echo 'Vendor Information' ?></h1>
       </div>

         <small><?php echo ""; ?></small>
         <ol class="breadcrumb"   style=" border: 3px solid #d7d4d6;"   >

         <li><a href="<?php echo base_url()?>"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
            <li><a href="#"><?php echo display('report') ?></a></li>
            <li class="active" style="color:orange"><?php echo 'Vendor Information';?></li>
        
            <div class="load-wrapp">
       <div class="load-10">
         <div class="bar"></div>
       </div>
       </div>
        
        
         </ol>
      </div>
   </section>
   <script></script>
   <section class="content">
      <div class="row">
         
      </div>



      <!-- Manage Invoice report -->
      <!-- <div class="row">
         <div class="col-sm-12">
            <div class="panel panel-bd lobidrag" style=" border: 3px solid #d7d4d6;" >
                       -->
            
                       <div class="row">
         <div class="col-sm-16 col-md-14">
            <div class="panel panel-bd lobidrag" id="printableArea"   style="border: 3px solid #d7d4d6;" >
               <div class="panel-body">
                   <div class="sortableTable__container">
                    <div class="sortableTable__discard">
                    </div>
            
            
            
            
            <div class="dropdown bootcol" id="drop">
    <button class="btnclr btn btn-default dropdown-toggle" style='margin-bottom: -70px; margin-left: 620px;' type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
        <span class="fa fa-download"></span> <?php echo display('download') ?>
    </button>
    <ul class="dropdown-menu" style='    margin-top: 40px;
    margin-left: 600px;' aria-labelledby="dropdownMenu1">
        <li><a href="#" onclick="generate()"><img src="<?php echo base_url() ?>assets/images/pdf.png" width="24px"> <?php echo display('PDF') ?></a></li>
        <li class="divider"></li>
        <li><a href="#" onclick="fnExcelReport()"><img src="<?php echo base_url() ?>assets/images/xls.png" width="24px"> <?php echo display('XLS') ?></a></li>
    </ul>
    <button type="button" style='margin-bottom: -70px;' class="btnclr btn btn-default dropdown-toggle" onclick="printDiv('printableArea')"><b class="ti-printer"></b>&nbsp;<?php echo display('print') ?></button>
</div>
               <input id="search" type="text" class="form-control"  style='float: right;width: 300px;margin-top: 10px;padding: 15px;     margin-right: 10px;' placeholder="Search for Vendor">
                  
                  
                  
               <div class="sortableTable__container">
                <div class="sortableTable__discard">
                </div>
                <div id='printableArea'>
               <table class="table table-bordered" id="ProfarmaInvList" cellspacing="0" width="100%" style=" border: 3px solid #d7d4d6;" >
                  <thead class="sortableTable">
                     <tr class="sortableTable__header btnclr   ">
                        <th class="1 value" data-col="1" style="width: 80px; height: 40.0114px;" ><?php echo 'S.NO'?></th>
                        <th class="2 value" data-col="2" style="width: 100px; height: 40.0114px;text-align:center;" ><?php echo display('Company ID')?></th>
                        <th class="3 value" data-col="3"style="height: 45.0114px; width: 234.011px;text-align:center;" ><?php echo display('Name')?></th>
                        <th class="4 value" data-col="4"  style="height: 42.0114px;text-align:center;"   ><?php echo display('Address')?></th>
                        <th class="5 value" data-col="5"  style="width: 198.011px;text-align:center;"><?php echo display('Mobile')?></th>
                        <th class="6 value" data-col="6"   style="width: 198.011px;text-align:center;" ><?php echo display('Business Phone')?></th>
                        <th class="7 value" data-col="7" style="width: 190.011px; height: 44.0114px;text-align:center;"><?php echo display('Primary Email')?> </th>
                        <th class="8 value" data-col="8" style="width: 190.011px; height: 44.0114px;text-align:center;"><?php echo display('City')?></th>
                        <th class="9 value" data-col="9" style="width: 190.011px; height: 44.0114px;"><?php echo display('Country')?></th>
                        <th class="10 value" data-col="10" style="width: 190.011px; height: 44.0114px;"><?php echo display('Credit limit')?></th>
                        <th class="11 value" data-col="11"  style="width: 198.011px;">Open Balance</th>
                        <th class="12 value" data-col="12"   style="width: 198.011px;" ><?php echo display('Vendor Type')?></th>
                        <th class="13 value" data-col="13"   style="width: 198.011px;" ><?php echo display('State')?></th>
                        <th class="14 value" data-col="14" style="width: 190.011px; height: 44.0114px;"><?php echo display('Zip code')?></th>
                        <th class="15 value" data-col="15" style="width: 190.011px; height: 44.0114px;"><?php echo display('Supplier Details')?></th>
                     </tr>
                  </thead>
                  <tbody class="sortableTable__body" id="tab" >
                     <?php
                        $count=1;
                        
                          if(count($vendor_data['rows'])>0){
                         foreach($vendor_data['rows'] as $k=>$arr){
                              ?>
                     <tr style="text-align:center" class="task-list-row" data-task-id="<?php echo $count; ?>"
                        data-pname="<?php echo $arr['supplier_name'];  ?>"
                        data-model="<?php echo $arr['mobile']; ?>"
                        data_category="<?php echo $arr['primaryemail']; ?>" 
                        data-unit="<?php echo $arr['city'] ?>" 
                        data-supplier="<?php echo $arr['vendor_type'];  ?>">
                        <td data-col="1" class="1 value"><?php  echo $count;  ?></td>
                        <td data-col="2" class="2 value"><?php   echo $arr['supplier_id'];  ?></td>
                        <td data-col="3" class="3 value"><?php  if($arr['vendor_type']=='Product Supplier'){ ?><a href="<?php  echo base_url()  ?>/Csupplier/supplier_ledger_report/<?php  echo $arr['vendor_type']."/".$arr['supplier_id'];    ?>"><?php   echo $arr['supplier_name'];  ?></a><?php }else{
                           ?>
                           <a href="<?php  echo base_url()  ?>/Csupplier/supplier_ledger_report/<?php  echo $arr['vendor_type']."/".$arr['supplier_id'];    ?>" class="ads"><?php   echo $arr['supplier_name'];  ?></a>
                           <?php   } ?>
                        </td>
                        <td data-col="4" class="4 value ads"><?php   echo $arr['address'];  ?></td>
                        <td data-col="5" class="5 value ads"><?php   echo $arr['mobile'];  ?></td>
                        <td data-col="6" class="6 value ads"> <?php   echo $arr['businessphone'];  ?></td>
                        <td data-col="7" class="7 value ads"><?php   echo $arr['primaryemail'];  ?></td>
                        <td data-col="8" class="8 value"><?php   echo $arr['city'];  ?></td>
                        <td data-col="9" class="9 value"><?php   echo $arr['country'];  ?></td>
                        <td data-col="10" class="10 value ads"><?php if(!empty($arr['credit_limit'])) { echo $currency." ".$arr['credit_limit'];}else{echo "$0.00";}     ?></td>
                        <!--<td data-col="22" class="22"><?php // if(!//empty($arr['previous_balance'])) { //echo $currency." ".$arr['previous_balance'];}else{echo "$0.00";}      ?></td>-->
                        <!--<td data-col="22" class="22"><?php  if(!empty($arr['inv_due_amount_usd'])) { echo $currency." ".$arr['inv_due_amount_usd'];} elseif (!empty($arr['due_amount_usd']) ) {echo $currency." ".$arr['due_amount_usd'];}else{echo $currency." 0.00";}      ?></td>-->
                        <td data-col="11" class="11 value"><?php 
                           if($arr['vendor_type'] == 'Product Supplier' ){
                           
                               if(!empty($arr['inv_due_amount_usd'])) { echo $currency." ".$arr['inv_due_amount_usd'];} 
                               elseif (!empty($arr['due_amount_usd']) ) {echo $currency." ".$arr['due_amount_usd'];}
                               else{echo $currency." 0.00";}     
                               
                           }
                           else{
                             if(!empty($arr['service_balance'])){
                             echo $currency." ".$arr['service_balance'];}
                             else{echo $currency." 0.00";}     
                           
                           }
                               
                               ?></td>
                        <td data-col="12" class="12 value"><?php   echo $arr['vendor_type'];  ?></td>
                        <td data-col="13" class="13 value"><?php   $arr['state'];  ?></td>
                        <td data-col="14" class="14 value ads"><?php   echo $arr['zip'];  ?></td>
                        <td data-col="15" class="15 value ads"><?php   echo $arr['details'];  ?></td>
                     </tr>
                     <?php   
                        $count++;
                        
                        } }  else{
                    ?>
                     <tr>
                        <td colspan="22" style="text-align:center;font-weight:bold;"><?php  echo "No Records Found"  ;?></td>
                     </tr>
                     <?php
                        }
                        
                        ?>
                  </tbody>
               </table>
               </div>
               </div>
   </section>
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
   <script  src="<?php echo base_url() ?>my-assets/js/script.js"></script>
   <script src="<?php echo base_url()?>assets/js/jquery.bootgrid.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.0.0-alpha.1/jspdf.plugin.autotable.js"></script>
   <!--<script type="text/javascript" src="<?php echo base_url()?>my-assets/js/profarma.js"></script>-->
   <!-- The Modal Column Switch -->
   <div id="myModal_colSwitch" class="modal_colSwitch" >
   <div class="modal-content_colSwitch" style="width:10%;height:25%;">
   <span class="close_colSwitch">&times;</span>
   <input type="checkbox"  data-control-column="1" checked = "checked" class="1"  value="1"/>Sl.No<br>
   <input type="checkbox"  data-control-column="2" checked = "checked" class="2"  value="2"/>User Name<br>
   <input type="checkbox"  data-control-column="3" checked = "checked" class="3"   value="3"/> Total Invoice<br>
   <input type="checkbox"  data-control-column="4" checked = "checked" class="4"   value="4"/>Total Amount<br>
   </div>
   </div>
   </div>
   </div>
</div>
</div>
<input type="hidden" id="total_invoice" value="<?php echo $total_invoice;?>" name="">
<input type="hidden" id="currency" value="{currency}" name="">
</div>
</div>
</section>
<input type ="hidden" name="csrf_test_name" id="csrf_test_name" value="<?php echo $this->security->get_csrf_hash();?>">
</div>
<!-- Manage Invoice End -->
<script type="text/javascript" src="<?php echo base_url()?>my-assets/js/profarma.js"></script>
<script>
 $(document).ready(function() {
    $(".btnclr").click(function() {
        $(this).siblings('.dropdown-menu').toggle();
    });
});
      function generate() {
                 var utc = new Date().toJSON().slice(0,10).replace(/-/g,'/');
  $(".myButtonClass").hide();
  var doc = new jsPDF("p", "pt");
  var res = doc.autoTableHtmlToJson(document.getElementById("ProfarmaInvList"));
  var height = doc.internal.pageSize.height;
  //doc.text("Generated PDF", 50, 50);

  doc.autoTable(res.columns, res.data, {
    startY: doc.autoTableEndPosY() + 50,
  });
  doc.save("Vendor_Information_"+utc+".pdf");
}
        function fnExcelReport()
{
 table = $('#ProfarmaInvList').clone();
    
      
    
    var hyperLinks = table.find('a');
    
    var tab_text="<table border='2px'><tr bgcolor='#87AFC6'>";
    var textRange; var j=0;
    tab = document.getElementById('ProfarmaInvList'); // id of table

    for(j = 0 ; j < tab.rows.length ; j++) 
    {   var sp=  $(hyperLinks[j]).text();
        tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";
        //tab_text=tab_text+"</tr>";
          console.log(sp);
    }

    tab_text=tab_text+"</table>";
   tab_text= tab_text.replace(/<a[^>]*>/g, "");
    tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
    tab_text= tab_text.replace(/<img[^>]*>/gi,""); // remove if u want images in your table
    tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE "); 

    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
    {
        txtArea1.document.open("txt/html","replace");
        txtArea1.document.write(tab_text);
        txtArea1.document.close();
        txtArea1.focus(); 
        sa=txtArea1.document.execCommand("SaveAs",true,"");
    }  
    else                 //other browser not tested on IE 11
        sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));  

    return (sa);
}
   $("#search").on("keyup", function() {
     var value = $(this).val().toLowerCase();
     $("#ProfarmaInvList tr:not(:eq(0))").filter(function() {
     
     $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
     });
     });
   $(document).ready(function() {
      var table = $('#customerTable').DataTable({
          "order": [[2, "desc"]]
      });
   
      table.on('error.dt', function (e, settings, techNote, message) {
          console.error('An error has occurred in DataTables:', message);
      });
   });
</script>

<script type="text/javascript">
         $(document).ready(function() {
         // Function to store the visibility state of rows in localStorage
         function storeVisibilityState() {
            var supplierlistvisibilityStates = {};
            $("#ProfarmaInvList tr").each(function(index, element) {
                var row = $(element);
                var rowID = index;
                var isVisible = row.is(':visible');
                supplierlistvisibilityStates[rowID] = isVisible;
            });
            // Store the visibility states in localStorage
            localStorage.setItem("supplierlistvisibilityStates", JSON.stringify(supplierlistvisibilityStates));
         }
         // Apply the stored visibility state on page load
         function applyVisibilityState() {
            var storedVisibilityStates = JSON.parse(localStorage.getItem("supplierlistvisibilityStates")) || {};
            $("#ProfarmaInvList tr").each(function(index, element) {
                var row = $(element);
                var rowID = index;
                if (storedVisibilityStates.hasOwnProperty(rowID) && !storedVisibilityStates[rowID]) {
                    row.hide();
                } else {
                    row.show();
                }
            });
         }
         // Event listener for row clicks to toggle row visibility
         $(".bank_edit").on('click', function() {
            var row = $(this);
            row.toggle();
            storeVisibilityState(); // Store the updated visibility state
         });
         applyVisibilityState(); 
         });
    </script>



<style>
   .select2{
   display:none;
   }
</style>