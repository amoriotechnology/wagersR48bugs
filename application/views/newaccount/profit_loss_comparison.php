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
</style>






<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
      


            <figure class="one">
               <img src="<?php echo base_url()  ?>asset/images/profitlosscom.png"  class="headshotphoto" style="height:50px;" />
      </div>

          <div class="header-title">
          <div class="logo-holder logo-9">
          <h1><?php echo ('Profit and Loss Comparsion') ?></h1>
       </div>

         <small><?php echo ""; ?></small>
         <ol class="breadcrumb"   style=" border: 3px solid #d7d4d6;"   >



 
         
         
            <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
       
      
            <li><a href="#"><?php echo "Accounts"; ?></a></li>
            <li><a href="#"><?php echo "Report"; ?></a></li>
                <li class="active" style="color:orange;" ><?php echo  ('Profit and Loss Comparsion') ?></li>
         
         
         
         
                <div class="load-wrapp">
       <div class="load-10">
         <div class="bar"></div>
       </div>
       </div>
         
            </ol>
        </div>
    </section>

    <section class="content">

     
    
<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-bd lobidrag" style=" border: 3px solid #d7d4d6;"  >
        
            <div class="panel-body" style='height:60px;'>

                <div class="row" id="">
                     <div class="col-sm-12" style="text-align: center;">
                     <div class="col-sm-8" style='margin-left: 200px;'>




                     <?php echo form_open_multipart('accounts/profit_loss_comparison', array('class' => 'form-vertical', 'id' => 'insert_sale', 'name' => 'insert_sale')) ?>
        <?php
        $today = date('Y-m-d');
        ?>            
                     
            <input type="text" class="form-control daterangepicker-field" name="daterangepicker-field"
                   style="padding: 5px;width: 200px;border-radius: 8px;height: inherit;"/>
                        
                         
                         
                        
                         <button type="submit" class="btn btnclr dropdown-toggle" style="margin-bottom: 10px;" ><i class="fa fa-search-plus" aria-hidden="true"></i> <?php echo display('search') ?></button> 
                     </div>
                          <div class='col-sm-2' style='text-align:end;'>
    <div class="dropdown bootcol" id="drop" style="width: 300px;">
        <button class="btnclr btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            <span class="fa fa-download"></span> <?php echo display('download') ?>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
            <li><a href="#" onclick="generate()"><img src="<?php echo base_url() ?>assets/images/pdf.png" width="24px"> <?php echo display('PDF') ?></a></li>
            <li class="divider"></li>
            <li><a href="#" onclick="fnExcelReport()"><img src="<?php echo base_url() ?>assets/images/xls.png" width="24px"> <?php echo display('XLS') ?></a></li>
        </ul>&nbsp;
        <button type="button" class="btnclr btn btn-default dropdown-toggle" onclick="printDiv('printableArea')"><b class="ti-printer"></b>&nbsp;<?php echo display('print') ?></button>
    </div>
</div>
                      <?php echo form_close() ?>  
                    



                  






               

                </div>

            </div>
        </div>
    </div>
</div>








<div class="row">
    <div class="col-sm-12 col-md-12">
	
				
				
				
        <div class="panel panel-bd lobidrag" id="printArea" style=" border: 3px solid #d7d4d6;"  >
            <div class="panel-body">
                <div class="">
                     <table class="print-table " width="100%">

                      
                 
                        
                          <tr>
                            <td style='height:60px;padding: 0px; border: 1px solid black;' colspan="3" align="center">
                                <h2 class="statement"  style="text-align: center;    font-size: x-large;" ><?php echo "Profit and Loss Comparsion"; ?> </h2>
                            </td>
                        </tr>
                        
                        
<br>

  <tr class="table_head">
                            <td style='border:none;text-align: center;background-color: #ffffff;' colspan="3" align="center" class="equivalent"><b>
                                  <?php if(!empty($dates)){
                         echo html_escape($dates); 

                           } else{
                              echo $from_date . ' on ' . $to_date;
                           }?>
                                     
                        </tr>



                    </table>
        
 
<!-- //payroll -->
<br>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Income and Expenses</title>
    <style>
        .category {
            margin-bottom: 10px;
        }

        .toggle-button {
            cursor: pointer;
            /* color: blue; */
 
     font-weight: 500;
    font-size: revert;
         }

        .details {
         }

         .category {
            cursor: pointer;
        }
        .sub-items {
            display: none;
            margin-left: 20px;
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
    width: 190px;
  }  
}
</style>
</head>






<!DOCTYPE html>
<html>
<head>
    <title>Financial Summary</title>
    <style>
        .category {
            margin-bottom: 10px;
        }
        .details {
            display: none;
            margin-left: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #ccc;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
        .toggle-arrow {
            cursor: pointer;
        }

         .category {
            margin-bottom: 10px;
        }
        .details {
            display: none;
            margin-left: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #ccc;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
        .toggle-arrow {
            cursor: pointer;
        }

    </style>
</head>
<body>
<div id='printableArea'>
  <table class="outer-table  table-bordered" id="ProfarmaInvList" style='text-align:center;' cellpadding="0" cellspacing="0">
    <tr class="btnclr">
        <th style="text-align:center"> </th>
        <th style="text-align:center">Total  </th>
    </tr>
 



    <tr class="category">
<td  class="toggle-button" onclick="toggleDetails3(this)">▼ Income</td>
        <td><?php echo $gtsa_info[0]['grand_total'] + $gtsa_info[0]['product_sold']; ?></td>
 
    <tr class="details" style="display:none;">
        <td colspan="3">
            <strong>Sales : <?php echo $gtsa_info[0]['grand_total']; ?></strong><br>
            <strong>Sales of Product Income: <?php echo $gtsa_info[0]['product_sold']; ?></strong><br><hr>
             <strong>    Total Income: <?php echo $gtsa_info[0]['grand_total']; ?></strong>
        </td>
    </tr>












   
 

<tr class="category">
<td  class="toggle-button" onclick="toggleDetails3(this)">▼ Cost of Goods Sold</td>
        <td><?php echo $gtsa_info[0]['product_sold']; ?></td>
 
    <tr class="details" style="display:none;">
        <td colspan="3">

            <strong>Cost of Goods Sold:</strong> <?php echo $gtsa_info[0]['product_sold']; ?> <br>
            <strong>Inventory Shrinkage :</strong><br>
            <strong>Shipping:</strong><br><hr>
             <strong>    Total Amount for Cost of Goods Sold: <?php echo $gtsa_info[0]['product_sold']; ?></strong>
        </td>
    </tr>


    <tr class="category">
        <td class="toggle-button" onclick="toggleDetails3(this)" >▼ Expenses</td>
 
        <td></td>
    </tr>

    <tr class="details" style="display:none;">
        <td colspan="2">
            <?php
                $totalExpenses = 0;
                foreach ($servicpro_info as $item) {
                    if(!empty($item['productname'])) {
                        echo "<strong>" . $item['productname'] . "</strong>: " . $item['grand_sp'] . "<br>";
                        $totalExpenses += $item['grand_sp'];
                    }
                }
            ?>
            <hr>
            <strong>Total Expenses:</strong> <?php echo $totalExpenses; ?><br>
     

    <tr class="category">
        <td class="toggle-button" onclick="toggleDetails3(this)"> ▼ Payroll Expenses</td>
        <td></td>
 
    <tr class="details" style="display:none;">
        <td colspan="2">
            <strong>Taxes :</strong><br>
            <strong>Wages:</strong><br>
            <hr>
            <strong> PayrollTotal Expenses:</strong>
        </td>
    </tr>

    <tr class="category">
        <td class="toggle-button">Total Expenses</td>
        <td><?php echo $totalExpenses; ?></td>
    </tr>



    <tr class="category">
        <td class="toggle-button">NET OPERATING INCOME:</td>
        <td></td>
    </tr>
    <tr class="category">
        <td class="toggle-button">NET OTHER INCOME:</td>
        <td></td>
    </tr>
    <tr class="category">
        <td class="toggle-button">NET INCOME:</td>
        <td></td>
    </tr>


    </td>
    </tr>
    
</table>
</div>
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
  doc.save("Profit_Loss_Comparision_"+utc+".pdf");
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
    function toggleDetails1(category) {
        var categoryDetails = document.querySelectorAll('.details.' + category);

        for (var i = 0; i < categoryDetails.length; i++) {
            categoryDetails[i].style.display = categoryDetails[i].style.display === 'none' ? 'table-row' : 'none';
        }

        var toggleButton = document.querySelector('.toggle-button.' + category);
        toggleButton.innerText = toggleButton.innerText === '▼' ? '▲' : '▼';
    }


    function toggleDetails3(button) {
        var details = button.parentElement.nextElementSibling;
        details.style.display = (details.style.display === 'none') ? 'table-row' : 'none';
    }
</script>
 

</body>
</html>










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
 
<style>     .table_boxnew {
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
    background-color: #333;
    color: #fff;
    text-align: center;
}

thead th {
    padding: 10px;
    border: 1px solid #000;
}

/* Style the table rows */
tbody tr:nth-child(even) {
    background-color: #f2f2f2;
}

tbody tr:hover {
    background-color: #ddd;
}

tbody td {
    padding: 10px;
    border: 1px solid #000;
    /* text-align: center; */
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


    
</style> 



