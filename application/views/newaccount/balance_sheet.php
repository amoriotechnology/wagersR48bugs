
<?php  error_reporting(1); ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.base64.js"></script>
<!--<script type="text/javascript" src="<?php echo base_url()?>assets/js/drag_drop_index_table.js"></script>-->
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



#for_numrows {
    margin-left: 150px;
  
}
  .table_boxnew {
        width: 80%; /* Adjust the width as needed */
        margin: 0 auto; /* Center the table horizontally */
        border-collapse: collapse;
    }

    .table_boxnew th, .table_boxnew td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: center; /* Center-align table content */
    }
thead {
    background-color: white;
    color: black;
    text-align: left;
}

thead th {
    padding: 10px;
    border: 1px solid #000;
}

/* Style the table rows */


tbody td {
    padding: 10px;
    border: 1px solid #000;
    text-align: center;
}
    .table_boxnew th {
        background-color: #f2f2f2;
        font-weight: bold;
    }

    /* Styling for the total liabilities and total assets */
    .bsb_2px {
        font-weight: bold;
    }

    /* Reduce the height of the h2 element */
    .statement {
        font-size: 20px; /* Adjust the font size as needed */
        margin: 0; /* Remove any default margins */
        padding: 5px 0; /* Adjust the padding to reduce height */
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
    width: 140px;
  }
}
</style>

<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/balance_sheet.css" />











<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <figure class="one">
               <img src="<?php echo base_url()  ?>asset/images/balacesheet.png"  class="headshotphoto" style="height:50px;" />
      </div>
      
      
      
       <div class="header-title">
          <div class="logo-holder logo-9">
            <h1><?php echo "Balance Sheet"; ?></h1>
       </div>

      
             <small><?php //echo "Vocher Report"; ?></small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo "Accounts"; ?></a></li>
                <li class="active" style="color:orange;"><?php echo "Balance Sheet"; ?></li>
            
            
            
             <div class="load-wrapp">
      <div class="load-10">
         <div class="bar"></div>
      </div>
    </div>
            
            
            
            
            </ol>
        </div>
    </section>

















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
            <div class="panel panel-bd lobidrag"      style="border:3px solid #d7d4d6;"    >
               <div class="panel-body" style='height:60px;'>
                  <div class="row" id="">
                     <div class="col-sm-12" style='height:10px;'>
                        <div class="col-sm-5"></div>
                        <?php echo form_open_multipart('accounts/balance_sheet', array('class' => 'form-vertical', 'id' => 'insert_sale', 'name' => 'insert_sale')) ?>
                        <?php
                           $today = date('Y-m-d');
                           ?>            
                        <div class="col-sm-4 form-group" style="display: inline-block; vertical-align: middle;">
                           <!-- <div class="form-group row"     style="width: 300px;"> -->
                           <input type="text" class="form-control daterangepicker-field" name="daterangepicker-field"
                              style="padding: 5px;width: 200px;border-radius: 8px;height: inherit;"/>
                           <button type="submit" class="btn btnclr dropdown-toggle" style="margin-bottom: 10px;" ><i class="fa fa-search-plus" aria-hidden="true"></i> <?php echo display('search') ?></button> 
                        </div>
                        <div class='col-sm-2' style='text-align:end;'>
                           <div class="dropdown bootcol" id="drop" style="    width: 300px;">
                              <button class="btnclr btn btn-default dropdown-toggle" type="button"   id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              <span class="fa fa-download"></span> <?php echo display('download') ?>
                              </button>
                              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                 <li><a href="#" onclick="generate()"> <img src="<?php echo base_url() ?>assets/images/pdf.png" width="24px"> <?php echo display('PDF') ?></a></li>
                                 <li class="divider"></li>
                                 <li><a href="#" onclick="fnExcelReport()"> <img src="<?php echo base_url() ?>assets/images/xls.png" width="24px"> <?php echo display('XLS') ?></a></li>
                              </ul>
                              &nbsp;
                              <button type="button"   class="btnclr btn btn-default dropdown-toggle"  onclick="printDiv('printableArea')"><b class="ti-printer"></b>&nbsp;<?php echo display('print') ?></button>
                           </div>
                        </div>
                        <?php echo form_close() ?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>











<div class="row">
    <div class="col-sm-12 col-md-12">
	
				
				
				
        <div class="panel panel-bd lobidrag" id="printableArea"  style="border: 3px solid #d7d4d6;" >
            <div class="panel-body">
                <div class="">
                     <table class="print-table " width="100%">

                  
                        <!--<tr>-->
                        <!--    <td style='border:none' colspan="3" align="center">-->
                        <!--        <h2 class="statement"><?php echo 'BALANCE SHEET STATEMENT'; ?> </h2>-->
                        <!--    </td>-->
                        <!--</tr>-->
                        
                        
                        
                             <tr>
                           
                            
                            <td style='height:60px;padding: 0px;' colspan="3" align="center">
                                <h2 class="statement" style="    font-size: x-large; "   ><?php echo "Balance Sheet Statement  "; ?> </h2>
                            </td>
                            
                            
                        </tr>
                        <br>
                        
                        
                        <tr class="table_head">
                            <td style='border:none' colspan="3" align="center" class="equivalent"><b>On
                                    <?php echo html_escape($from_date); ?> To
                                    <?php echo html_escape($to_date); ?></b></td>
                        </tr>
                    </table>
<table width="80%" class="table_boxnew table-bordered" style='text-align:center;' cellpadding="0" cellspacing="0">
   
    <?php
    // Initialize the $categories array
    $categories = [];

    // Populate the $categories array with data
    foreach ($all_account_cat as $row) {
        $categories[$row['account_category']][] = [
            'subcat' => $row['sub_category'],
            'arec_trade' => $row['arec_trade']
        ];
    }
    $toggleIndex = 0; // Initialize an index for the data-target attribute
    ?>
   
        <table width="80%" class="table_boxnew table-bordered"  id='ProfarmaInvList'  style='text-align:center;' cellpadding="0" cellspacing="0">
        <thead>   <tr class="table_head">
        <!-- Arrow cell -->
        <td  class="btnclr cashflowparticular">
          
        </td>

        <!-- Category label cell -->
        <td width="56%" height="29" align="center" class="btnclr cashflowparticular">
            <b><?php echo display('particulars');?></b>
        </td>

        <!-- Amount column -->
        <td width="30%" align="right" class="btnclr cashflowamount"><b><?php echo display('amount');?></b></td>
    </tr></thead> 
     <?php foreach ($categories as $category => $subcategories): if (!empty($category)): ?>
            <tbody class="subcategory">
                 <tr>
                    <!-- Arrow cell in the first column -->
                    <td style='background-color:none; border: none;' class="toggle-parent" data-target="<?php echo $toggleIndex; ?>"><span class="toggle-arrow toggle-arrow-closed">▼</span></td>
                    <!-- Category label cell in the second column -->
                    <td style='text-align:left;background-color:none; border: none;'><?php echo $category; ?></td>
                </tr>
                <?php $totalArecTrade = 0; ?>
                <?php foreach ($subcategories as $subcategory): ?>
                    <tr class="toggle-child toggle-child-<?php echo $toggleIndex; ?>" data-parent="<?php echo $toggleIndex; ?>">
                        <!-- Empty cell for arrow -->
                        <td style='border: none;'></td>
                        <!-- Subcategory name cell -->
                        <td style='text-align:right;width:800px;'><?php echo $subcategory['subcat']; ?></td>
                        <!-- Amount cell -->
                        <td><?php echo  $currency.number_format($subcategory['arec_trade'], 2, '.', '')      ; ?></td>
                    </tr>
                    <?php $totalArecTrade += $subcategory['arec_trade']; ?>
                <?php endforeach; ?>
                <tr>
                    <!-- Empty cell for arrow -->
                    <td style='border: none;'></td>
                    <!-- Total label cell -->
                    <td style='text-align:right;width:800px;'><strong>Total Amount for <?php echo $category; ?>:</strong></td>
                    <!-- Total amount cell -->
                    <td><span class="total-arec-trade"><?php echo  $currency.number_format($totalArecTrade, 2, '.', '')    ; ?></span></td>
                </tr>
            </tbody>
            <tfoot class="total-row" style="display: none;">
                <tr>
                    <!-- Empty cell for arrow -->
                    <td style='border: none;'></td>
                    <!-- Total label cell -->
                    <td style='text-align:left;width:800px;'><strong>Total Amount for <?php echo $category; ?>:</strong></td>
                    <!-- Total amount cell -->
                    <td><span class="total-arec-trade"><?php echo  $currency.number_format($totalArecTrade, 2, '.', '')    ; ?></span></td>
                </tr>
            </tfoot>
                    <?php $toggleIndex++; ?>
    <?php endif; endforeach; ?>
       
    <!-- Separate row for Accounts Receivable (A/R) -->
    <tr class="toggle-parent" style='width:10px;' data-target="ar">
        <!-- Arrow cell -->
        <td style="background-color: none; border: none;"><span class="toggle-arrow toggle-arrow-closed">▼</span></td>

        <!-- Label cell for Accounts Receivable (A/R) -->
        <td style='text-align:left;width:800px;' class="paddingleft10px text-right bsp_10">
            <?php echo 'Accounts Receivable (A/R)' ?>
        </td>
        <!-- Amount cell for Accounts Receivable (A/R) -->
        <td class="paddingleft10px text-right bsp_10">
            <?php echo  $currency.number_format($invoice_paid_amount[0]->invoice_paid_amount, 2, '.', ''); ?>
        </td>
    </tr>
    <tr class="toggle-child toggle-child-ar" data-parent="ar">
        <!-- Empty cell for arrow -->
        <td style="background-color: none; border: none;"></td>

        <!-- Label cell for Total Accounts Receivable -->
        <td  style='text-align:right;width:800px;' class="paddingleft10px text-right bsp_10">
            <b><?php echo 'Total Accounts Receivable' ?></b>
        </td>
        <!-- Amount cell for Total Accounts Receivable -->
        <td class="paddingleft10px text-right bsp_10">
            <b><?php echo  $currency.number_format($invoice_paid_amount[0]->invoice_paid_amount, 2, '.', ''); ?></b>
        </td>
    </tr>
    <?php
$purchasePaidAmount = $purchase_paid_amount[0]->purchase_paid_amount;
$invoicePaidAmount = $provider_paid_amount[0]->invoice_paid_amount;

$totalAmount = $purchasePaidAmount + $invoicePaidAmount;

// Print the total amount
//echo "Total Amount: " . $totalAmount;
?>
    <!-- Separate row for Accounts Payable (A/P) -->
    <tr class="toggle-parent" style='width:10px;' data-target="ap">
        <!-- Arrow cell -->
        <td style="width:10px;background-color: none; border: none;"><span class="toggle-arrow toggle-arrow-closed">▼</span></td>

        <!-- Label cell for Accounts Payable (A/P) -->
        <td style='text-align:left;width:800px;' class="paddingleft10px text-right bsp_10">
            <?php echo 'Accounts Payable (A/P)' ?>
        </td>
        <!-- Amount cell for Accounts Payable (A/P) -->
        <td class="paddingleft10px text-right bsp_10">
            <?php echo  $currency.number_format($totalAmount, 2, '.', ''); ?>
        </td>
    </tr>
    <tr class="toggle-child toggle-child-ap" data-parent="ap">
        <!-- Empty cell for arrow -->
        <td style="background-color: none; border: none;"></td>

        <!-- Label cell for Total Accounts Payable -->
        <td style='text-align:right;width:800px;' class="paddingleft10px text-right bsp_10">
            <b><?php echo 'Total Accounts Payable'; ?></b>
        </td>
        <!-- Amount cell for Total Accounts Payable -->
        <td class="paddingleft10px text-right bsp_10">
            <b><?php echo  $currency.number_format($totalAmount, 2, '.', ''); ?></b>
        </td>
    </tr>
</table>
            </div>
            </div>
        </div>
    </div>
</div>
</section>
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

<script src="<?php echo base_url()?>assets/js/jquery.bootgrid.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.0.0-alpha.1/jspdf.plugin.autotable.js"></script>

<script>
     $(document).ready(function () {
            // Add click event listener to toggle-parent rows
            $('.toggle-parent').click(function () {
                var targetIndex = $(this).data('target');
                $('.toggle-child-' + targetIndex).toggle();
                // Toggle arrow classes
               // $(this).next(".subcategory").toggle();
        $(this).find(".toggle-arrow").text(function(_, text) {
            return text === "▶" ? "▼" : "▶";
        });


              //  $('.toggle-arrow', this).toggleClass('toggle-arrow-closed toggle-arrow-open');
            });
        });
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
        sa=txtArea1.document.execCommand("SaveAs",true,"Say Thanks to Sumit.xls");
    }  
    else                 //other browser not tested on IE 11
        sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));  

    return (sa);
}
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
  doc.save("Balance Sheet_"+utc+".pdf");
}

    </script>
</div>





