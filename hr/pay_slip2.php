
<!DOCTYPE html>
<html lang="zxx">
<head>
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">

    <!-- External CSS libraries -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Custom Stylesheet -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/Invoice/style.css" />
   
</head>
<body>
<style>

  th{
      
    text-align:center;
  }
  .invoice-12 .default-table thead th {
   
    position: relative;
    color:white;
    font-size: 15px;
 background-color:<?php  echo $color ?>;
}
input{
  border: none;
}
.tm{
background-color:red;
    position: absolute;
    height: 30%;
    width: 70%;
    -webkit-transform: skewX(-35deg);
    /* transform: skewX(35deg); */
  
    right: -100px;
    overflow: hidden;
}
.tm_accent_bg, .tm_accent_bg_hover:hover {
    background-color: #007aff;
}
.invoice-12 .invoice-info:after {
    content: "";
    width: 300px;
    height: 300px;
    position: absolute;
    bottom: 0;
    right: 0;
    background-color: <?php  echo $color ?>;
    background-size: cover;
    z-index: -1;
}
.invoice-12 .invoice-info:before {
    content: "";
    width: 300px;
    height: 300px;
    position: absolute;
    top: 0;
    left: 0;
     background-color: <?php  echo $color ?>;
    background-size: cover;
    z-index: -1;
}
.invoice-12 .default-table thead {
  
   background-color: <?php  echo $color ?>;
    border-radius: 8px;
    color: black;
}

@media (max-width: 992px) {

  th{
    text-align:center;
  }
  .invoice-12 .default-table thead th {
   
    position: relative;
    color:white;
    font-size: 15px;
 background-color:<?php  echo $color ?>;
}
input{
  border: none;
}
.tm{
background-color:red;
    position: absolute;
    height: 30%;
    width: 70%;
    -webkit-transform: skewX(-35deg);
    /* transform: skewX(35deg); */
  
    right: -100px;
    overflow: hidden;
}
.tm_accent_bg, .tm_accent_bg_hover:hover {
    background-color: #007aff;
}
.invoice-12 .invoice-info:after {
    content: "";
    width: 300px;
    height: 300px;
    position: absolute;
    bottom: 0;
    right: 0;
    background-color: <?php  echo $color ?>;
    background-size: cover;
    z-index: -1;
}
.invoice-12 .invoice-info:before {
    content: "";
    width: 300px;
    height: 300px;
    position: absolute;
    top: 0;
    left: 0;
     background-color: <?php  echo $color ?>;
    background-size: cover;
    z-index: -1;
}
.invoice-12 .default-table thead {
   background-color: <?php  echo $color ?>;
    border-radius: 8px;
    color: black;
}


}
.b_total{
  width:70px;
}
.invoice-contant{
  /* border:2px solid black; */
}
th,td{
    background-color:white;
   padding-top: 10px;
  padding-bottom: 20px;
  padding-left: 30px;
  padding-right: 40px;
}
  </style>

<!-- Invoice 12 start -->
<div class="invoice-12 invoice-content">
    <div class="container">
             <div class="invoice-btn-section clearfix d-print-none">
                 
                 
                       <p align="right">   <a id="invoice_download_btn"  style="color:white;background-color:#38469f;" class='btn btn-primary'>
                            <i class="fa fa-download"></i> Download
                        </a>
        <a id="mange" style="color:white;background-color:#38469f;" href="<?php  echo  base_url()  ?>/Chrm/pay_slip_list"  class='btn btn-primary'><?php echo "Manage Pay Slip" ?></a>  </p> 
        
                      
                    </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="invoice-inner clearfix">
                   
                  <div style="color:red;"></div>
                   <div style="color:red;"></div>
                    <div class="invoice-info clearfix" id="invoice_wrapper">
                        <div class="invoice-contant" >
                            <div class="invoice-headar">

  <div class="row">
    <div class="col-sm-2 r">
          <img crossorigin="anonymous" src="<?php echo  $logo; ?>" style="float: left;width:100px;height:90px;margin-left: 25px;" alt="logo">
    </div><!-- .col-sm-4 -->
      <!--<div class="col-sm-2 r"> </div>-->
    <div class="col-sm-6 rr" style='text-align:end;'>
      <div class="description">
        <h2><?php echo $business_name; ?> </h2>
      
        </div><!-- .description -->
    </div><!-- .col-sm-8 -->
  </div><!-- .row -->

                            </div>
                            <div class="invoice-top" style="padding-top:0px;">
                                <div class="row">
                                    <div class="col-md-4 col-sm-6 mb-30">
                                        <div class="invoice-number">
                                            <h4 class="inv-title-1" style="font-weight:bold;color:<?php echo $color; ?> ">EMPLOYEE INFO</h4>
                                            <h2 id="em_name" class="name mb-10"><?php echo $infoemployee[0]['first_name']." "; ?><?php echo $infoemployee[0]['last_name']; ?></h2>
                                            <p class="invo-addr-1 mb-0">
                                              
      
        <strong>TITLE</strong> : <?php echo $designation ?><br>
        <strong>ID</strong> : <?php echo $infoemployee[0]['id']; ?><br>
        <strong>ADDRESS</strong> : <?php echo $infoemployee[0]['address_line_1']; ?><br>
    
        </p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 mb-30">
                                        <div class="invoice-number">
                                            <div class="invoice-number-inner">
                                                <h4 class="inv-title-1" style="font-weight:bold;color:<?php echo $color; ?> ">CHEQUE INFO</h4>
                                                <h2 class="name mb-10"><?php echo $adm_name[0]['adm_name']; ?></h2>
                                               
 
                                                <p class="invo-addr-1 mb-0">
    <strong>TITLE</strong> : <?php echo 'Admin' ?><br> 
       <?php if(!empty($infotime[0]['cheque_date'])) { ?>
        <strong>Chq Date</strong> : <?php echo $infotime[0]['cheque_date']; ?><br> 
        <strong>Chq No</strong> : <?php echo $infotime[0]['cheque_no']; ?><br> 
      <?php 
      }else{ ?>
            <strong>Bank Name</strong> : <?php echo $infotime[0]['bank_name']; ?><br> 
        <strong>Ref No</strong> : <?php echo $infotime[0]['payment_ref_no']; ?><br> 
        <?php  }  ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 mb-30 invoice-contact-us">
                                        <h4 class="inv-title-1" style="font-weight:bold;color:<?php echo $color; ?> ">Company INFO</h4>
                                        <h2 class="name mb-10"></h2>
                                        <ul class="link">
                                            <li>
                                                <i class="fa fa-map-marker"></i> <?php echo $address; ?>
                                            </li>
                                            <li>
                                                <i class="fa fa-envelope"></i> <?php echo $email;?></a>
                                            </li>
                                            <li>
                                                <i class="fa fa-phone"></i> <a href="tel:+55-417-634-7071"><?php echo $phone; ?></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                             <div class="invoice-center">
                                <div class="order-summary" style="padding:20px;">
                                    <div class="table-outer">
                                        <table class="default-table invoice-table" border="1" cellpadding="0" cellspacing="0">
                                          

                                            <tbody  >
   <tr style="font-weight:bold;text-align:center;background-color:<?php  echo  $color; ?>;color:white;">
    <td><strong>DESCRIPTION</strong></td><td><strong>HRS/ UNITS</strong></td><td><strong>RATE</strong></td>  <?php if ($sc) { ?>  <td ><strong>SALES COMMISSION</strong></td>  <?php  }    ?><td><strong>THIS PERIOD(<?php  echo $currency; ?>)</strong></td>
   <td><strong>YTD HOURS</strong></td> <td><strong>YTD(<?php  echo $currency; ?>)</strong></td>
      </tr>
      <tr style="text-align:center;">
    <td>Salary</td>
<td> <?php echo $infotime[0]['total_hours']; ?></td>
<td> <?php echo $infoemployee[0]['hrate']; ?></td>
 <?php if ($sc) { ?>  <td>  <?php echo $sc; ?></td>  <?php }  ?> 
 <td id="total_period"><?php echo $total; ?></td>
 <td><?php echo number_format($overalltotalhours, 2); ?></td>
<td id="total_ytd"><?php echo number_format($overalltotalamount, 2); ?></td></tr>

                                           
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="invoice-center">
                                <div class="order-summary" style="padding:20px;">
                                    <div class="table-outer">
    
                                             <div ><span style="float:left" ><strong>Pay Period : </strong><span id="em_month"><?php echo $infotime[0]['month']; ?></span></span><span style="float:right;"><strong>Timesheet ID : </strong><?php echo $infotime[0]['timesheet_id']; ?> </span></div>
                                           
                                    </div>
                                </div>
                            </div>
                            
                             
                            <div class="invoice-bottom" style="padding-top:0px;">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                      
                                                      <table class="top">
<tr  rowspan="6">
   <th style="height: 40px;text-align: center;" colspan="4">WITHHOLDINGS</th>

   </tr>
   <tr>
   <td style="font-size:10px;font-weight:bold;">DESCRIPTION</td>
    <td style="font-size:10px;font-weight:bold;">FILING STATUS</td>
     <td style="font-size:10px;font-weight:bold;">THIS PERIOD(<?php  echo $currency; ?>)</td>
      <td style="font-size:10px;font-weight:bold;">YTD(<?php  echo $currency; ?>)</td>
      
</tr>
<?php if($s){ ?>
<tr>
<td style="text-align:left;"> Social Security</td>
<td>S O</td>
<td class="current"><?php if($s){ echo round($s,2); } ?></td>
<td class="ytd"><?php if($s_tax){ echo round($s_tax,2); } ?></td>
</tr>
<?php  } ?>
<?php if($m){ ?>
<tr>
<td style="text-align:left;">Medicare</td>
<td>SMCU O</td>
<td class="current"><?php if($m) {echo round($m,2); }  ?></td>
<td class="ytd"><?php if($m_tax) { echo round($m_tax,2);  } ?></td>
</tr>
<?php  } ?>
<?php if($f){ ?>
<tr>
<td style="text-align:left;">Fed Income Tax</td>
<td></td>
<td class="current"><?php if($f){echo $f; } ?></td>
<td class="ytd"><?php if($f_tax){echo $f_tax; } ?></td>
</tr>
<?php  } ?>
<?php if($u){ ?>
<tr>
<td style="text-align:left;">Unemployment Tax</td>
<td></td>
<td class="current"><?php if($u){echo $u; } ?></td>
<td class="ytd"><?php if($u_tax){echo $u_tax; } ?></td>
</tr>
<?php  } //print_r($sum);?>
<?php foreach($state_local_tax as $k=>$v){
$split=explode('-',$k);
$rep=str_replace("'",'',$split[1]);
$rep2='';
if($split[2]){
$rep2=str_replace("'",'',$split[2]);
  ?>
    <tr>  <td style="text-align:left;"><?php echo $rep2.'-'.$rep;  ?></td> <td></td>
           <td class="current">  <?php echo round($v,2);    ?></td>
            <td class="ytd"><?php echo round($local_sum[$rep],2); ?></td>
    </tr> <?php  } ?> 
    
     <?php foreach($selected_local_tax as $k=>$v){
$split=explode('-',$k);
$rep=str_replace("'",'',$split[1]);
$rep2='';
if($split[2]){
$rep2=str_replace("'",'',$split[2]);
  ?>
    <tr>  <td style="text-align:left;"><?php echo $rep2.'-'.$rep;   ?></td> <td></td>
           <td class="current">  <?php echo round($v,2); ?></td>
            <td class="ytd"><?php echo round($selected_local_sum[$rep],2); ?></td>
    </tr> <?php  } ?> 
    
         <?php foreach($selected_state_tax as $k=>$v){
$split=explode('-',$k);
$rep=str_replace("'",'',$split[1]);
$rep2='';
if($split[2]){
$rep2=str_replace("'",'',$split[2]);
  ?>
    <tr>  <td style="text-align:left;"><?php echo $rep2.'-'.$rep;  ?></td> <td></td>
           <td class="current">  <?php echo round($v,2); ?></td>
            <td class="ytd"><?php echo round($selected_state_sum[$rep],2); ?></td>
    </tr> <?php  } ?> 
     <tr>
      <td colspan='2' style='text-align:end;font-weight:bold;'>Total </td>
       <td style="border-top: groove;" id="Total_current"></td><td style="border-top: groove;" id="Total_ytd"></td>
</tr>
</table> 
</div>



  <div class="col-lg-4 col-md-4 col-sm-4">
<table class="top">
   <tr  rowspan="3">
   <th style="height: 30px;
    text-align: center;" colspan="3">NET PAY ALLOCATION</th>

   </tr>
<tr>
   <td style="text-align:left;"><strong>DESCRIPTION</strong>
</td>
   <td><strong>THIS PERIOD(<?php  echo $currency; ?>)</strong>
</td>
   <td><strong>YTD(<?php  echo $currency; ?>)</strong>
</td>
</tr>
<tr>
  <td style="text-align:left;"><strong>Check Amount</strong>
</td>
  <td class="net_period"> <strong style="border-top: 1px solid;
   padding-top: 2px;">765.10</strong>
</td>
  <td class="net_ytd">
</td>
</tr>
<tr>
  <td style="text-align:left;"><strong>Chkg 404</strong>
</td>
  <td>0.00
</td>
  <td>0.00
</td>
</tr>
<tr>
  <td style="text-align:left;"><strong>NET PAY</strong>
</td>
  <td class="net_period" style="font-weight:bold;border-top: groove;">
</td>
  <td class="net_ytd" style="font-weight:bold;border-top: groove;">
</td>
</tr>
</table>


<br>





 <?php if(!empty($totalpayments)){   ?>
<table class="top">
<tr  rowspan="3">
<th style="height: 30px;
 text-align: center;" colspan="3">LOAN DETAILS</th>

</tr>

<tr>
<td style="text-align:left;"><strong>No OF Payment Terms</strong>
</td>
<td> <strong style="padding-top: 2px;">
<input type="hidden" value="<?php echo $totalpayments;  ?>" id="t_payment"/>
<input type="hidden" value="<?php echo $count_paid;  ?>" id="count_paid"/>
<?php echo $count_paid; ?>/<?php echo $totalpayments;  ?></strong>
</td>

</tr>
<tr>
<td style="text-align:left;"><strong>TOTAL AMOUNT</strong>
</td>
<td>
<input type="hidden" value="<?php echo $t_amount;  ?>" id="t_amount"/>  
<?php echo $t_amount; ?>
</td>

</tr>
<tr>
<td style="text-align:left;"><strong>OUTSTANDING AMOUNT</strong>
</td>

<input type="hidden" value="<?php echo $o_s_l;  ?>" id="t_out"/>  
<td><input type="text"  id="new_out"/> 
</td>

</tr>

<tr>
<td style="text-align:left;"><strong>Net Pay(After loan Dedution)</strong>
</td>
<td id="f_net" style="font-weight:bold;border-top: groove;"><?php echo $o_s_a; ?>
</td>

</tr>
</table>

 
      
<?php } ?>




</div>
                                  


                                        </div>
                                    </div>
               
                                </div>
                            </div>
                        </div>
                    </div>
                
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Invoice 12 end -->



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
<script src="<?php echo base_url()?>assets/css/Invoice/jspdf.min.js"></script>

<!--<script src="<?php echo base_url()?>assets/css/Invoice/app.js"></script>-->

<script>
 


  $(document).ready(function(){
debugger;
  var sum=0;

 $('.top').find('.current').each(function() {
var v=$(this).html();
  sum += parseFloat(v);
   // sum = isNaN(parseInt(sum)) ? 0 : parseInt(sum);

});

 $('#Total_current').html(sum.toFixed(3));
  var sum_ytd=0;

 $('.top').find('.ytd').each(function() {
var v=$(this).html();
  sum_ytd += parseFloat(v);
  //  sum_ytd = isNaN(parseInt(sum_ytd)) ? 0 : parseInt(sum_ytd);

});

 $('#Total_ytd').html(sum_ytd.toFixed(3));
//net_period
 var period_wise_total=$('#total_period').html();
 var tax_deduction_period_wise=$('#Total_current').html();
 var net_period=period_wise_total-tax_deduction_period_wise;
 $('.net_period').html(net_period.toFixed(3));
//net_ytd

var ytd_wise_total_str = $('#total_ytd').html(); // Get the string value
var ytd_wise_total = parseFloat(ytd_wise_total_str.replace(/,/g, '')); // Remove commas and parse

var tax_deduction_ytd_wise_str = $('#Total_ytd').html(); // Get the string value
var tax_deduction_ytd_wise = parseFloat(tax_deduction_ytd_wise_str.replace(/,/g, '')); // Remove commas and parse


 // var ytd_wise_total=parseFloat($('#total_ytd').html());
// var tax_deduction_ytd_wise=parseFloat($('#Total_ytd').html());
 var net_ytd=ytd_wise_total-tax_deduction_ytd_wise;
 $('.net_ytd').html(net_ytd.toFixed(3));


    });







        $(document).on('click', '#invoice_download_btn', function () {

      
var name=$('#em_name').html();
var mnth=$('#em_month').html();

console.log(name+"_"+mnth);

        var contentWidth = $("#invoice_wrapper").width();
        var contentHeight = $("#invoice_wrapper").height();
        var topLeftMargin = 20;
        var pdfWidth = contentWidth + (topLeftMargin * 2);
        var pdfHeight = (pdfWidth * 1.5) + (topLeftMargin * 2);
        var canvasImageWidth = contentWidth;
        var canvasImageHeight = contentHeight;
        var totalPDFPages = Math.ceil(contentHeight / pdfHeight) - 1;

   html2canvas($('#invoice_wrapper'), {
                onrendered: function (canvas) {
                             var imgWidth = 210;
var pageHeight = 295;
var imgHeight = canvas.height * imgWidth / canvas.width;
var heightLeft = imgHeight;

     var imgData = canvas.toDataURL('image/png');

var doc = new jsPDF('p', 'mm');
var position = 0;

doc.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
heightLeft -= pageHeight;

while (heightLeft >= 0) {
position = heightLeft - imgHeight;
doc.addPage();
doc.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
heightLeft -= pageHeight;
}
doc.save( 'PaySlip_'+name+'_'+mnth+'.pdf');
                }
            });



      
    });
    </script>
