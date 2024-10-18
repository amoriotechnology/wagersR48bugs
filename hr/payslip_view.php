


<?php 
echo base_url() ;


?>
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
<!-- Add new customer start -->
<style type="text/css">
.panel-body{
  padding:25px;
}
    .dot1 {
  height: 25px;
  width: 25px;
  background-color: #D7163A;

  display: inline-block;
}
.colorpad:hover;
{

 color: #f4511e;
}
.dot2 {
  height: 25px;
  width: 25px;
  background-color: #720303;

  display: inline-block;
}
.dot3 {
  height: 25px;
  width: 25px;
  background-color: #71D716;

  display: inline-block;
}
.dot4 {
  height: 25px;
  width: 25px;
  background-color: #3616D7;

  display: inline-block;
}
.dot5 {
  height: 25px;
  width: 25px;
  background-color: #D7B916;

  display: inline-block;
}
.dot6 {
  height: 25px;
  width: 25px;
  background-color: #D79A16;

  display: inline-block;
}
#templates>img:hover
{

background-color: orange;
border: 1px solid orange;
}
#templates>img
{
    width: 50%;
}
#templatetext
{
    margin-left:20px;
     font-size: 10px;
    font-style: italic;
    font-family: ui-monospace;
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
    width: 180px;
  }
}
</style>










<div class="content-wrapper">
   <section class="content-header">
      <div class="header-icon">
            <figure class="one">
               <img src="<?php echo base_url()  ?>asset/images/pay.png"  class="headshotphoto" style="height:50px;" />
      </div>
      
     <div class="header-title">
          <div class="logo-holder logo-9">
          <h1><?php echo ('Payslip Setting') ?></h1>
       </div>
 
       <small><?php echo "" ?></small>
         <ol class="breadcrumb" style="border: 3px solid #d7d4d6;">
         <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('web_settings') ?></a></li>
                <li class="active" style="color:orange;" ><?php echo ('Payslip Setting') ?></li>
        
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



        <!-- New customer -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag"   style="border:3px solid #d7d4d6;"        >
                    <div class="panel-heading" >
                    <!-- <div class="panel-body"> -->

                        <div class="panel-title">
                      <div class="container">
                          <div class="row">
                              <div class="col-sm-4"> <div class="panel panel-default" style="text-align:center;height:250px;width:400px;">
                                <label><?php echo "Payslip Template" ?></label>

    <div class="panel-body">
        <br>
        <img src="<?php echo base_url().'assets/images/templatelogo.png'; ?>" id='template' style='width: 17%;'>  <?php echo display('Dive in with Template' )?>
        <br><br>

            <table id="templateformart" >
                <tr>
                    <td>
                        <a href=<?php echo base_url('Chrm/updatepayslipinvoicedesign/1').'/'.$_SESSION['user_id']; ?> id='templates' ><img  src="data:image/png;base64,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"></a>
                        <p   id='templatetext'   >Classic</p>
                    </td>
                    <!--<td><a href="<?php echo base_url('Chrm/updatepayslipinvoicedesign/2').'/'.$_SESSION['user_id'];; ?> " id='templates'><img  src="data:image/png;base64,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"></a><p   id='templatetext'   >Mild</p></td>-->
                    <!--  <td>-->
                    <!--    <a href=<?php echo base_url('Chrm/updatepayslipinvoicedesign/3').'/'.$_SESSION['user_id']; ?> id='templates' ><img  src="data:image/png;base64,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"></a>-->
                    <!--    <p   id='templatetext'   >Decent</p>-->
                    <!--</td>-->

                       <td>
                        <a href=<?php echo base_url('Chrm/updatepayslipinvoicedesign/4').'/'.$_SESSION['user_id']; ?> id='templates' ><img  src="data:image/png;base64,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"></a>
                        <p   id='templatetext'   >UIC</p>
                    </td>



                </tr>
            </table>
<br>
<br>

          

 
  
  </tbody>
</table>

    </div>
  </div>    </div>
            <?php
            //////////////Design one///////////// 
            if($template==1)
            {
            ?>

      
    <div class="col-sm-12">



<div class="panel panel-default thumbnail"> 



    <div class="panel-body">

    <div  id="content">

<div class="payTop_details row">

<div class="col-md-6">
<p>
<strong>NAME</strong>:<br> 
<strong>PHONE</strong>:<br> 
<strong>ADDRESS</strong>:<br> 
<strong>  EMAIL</strong>:<br>
</p>
</div>
<!-- <div class="col-md-2"><img src="<?php //echo  $logo; ?>" width="50px;" height="50px;" /></div> -->
<div class="col-md-6">
<div style="float: right;"><strong>TIMESHEET ID</strong>:  
<br>
    <span><strong>EMPLOYEE ID:</strong></span>
</div>



</div>
<div class="col-md-12">
<div class="col-md-4"></div>
<div class="col-md-4 Employee_details row" style='text-align:center;' >


<strong>EMPLOYEE NAME</strong> :   
<br>
<strong>EMPLOYEE TITLE</strong> :  

</div>
<div class="col-md-4"></div>
</div>
<div class="col-md-12"><br/></div>
<div class="col-md-12" style="float:center;">
<style>
.table td{
padding:10px;

}
table {
 /* border: 3px #00000099 solid;
    background-color: #fff; */
    /* border-radius: 10px; */

 

    border: none;
text-align: center;
table-layout: fixed;


margin: 0 auto; /* or margin: 0 auto 0 auto */
}
/* table{
 border: 1px solid black;
border-collapse: collapse;
text-align: center;
padding: 8px 14px;
} */
table th {

padding: 8px 14px;
text-align: center;

}
</style>


<table class="table">
<tr style="outline: thin solid" rowspan="6">
<th colspan="6">Earnings</th>

</tr>
<tr style="height: 50px;">
<th>DESCRIPTION</th>
<th>HRS/ UNITS</th>
<th>RATE</th>
<th>THIS PERIOD($)</th>
<th>YTD HOURS</th>
 <th>YTD($)</th>
</tr>

<tr style="height: 70px;">
<td>Salary</td>
   <td>  </td>
      <td> </td>
         <td id="total_period"></td>
            <td></td>
               <td id="total_ytd"></td>

</tr>

</table>


</div>
<div class="col-md-12"><br/></div>
<div class="col-md-12">
<div class="col-md-6">
<table class="proposedWork pay_table table" id="price">
<tr  rowspan="6" style="outline: thin solid">
<th colspan="6">PERSONAL AND CHECK INFORMATION</th>

</tr>

                    <tr style="text-align:left;"><td style="font-weight:bold;width:100px;">Name  </td><td style="width:10px;"> :</td><td></td></tr>

                     <tr style="text-align:left;"><td style="font-weight:bold;width:100px;">Address  </td><td style="width:10px;"> :</td><td ></td></tr>
                     
                     
                     <tr style="text-align:left;"><td style="font-weight:bold;width:100px;text-wrap:nowrap;">Emp.ID </td><td style="width:10px;"> :</td><td></td></tr>
                      <tr style="text-align:left;"><td style="font-weight:bold;width:100px;">Pay Period</td><td style="width:10px;"> :</td><td style="text-wrap:nowrap;"></td></tr>
                       <tr style="text-align:left;"><td style="font-weight:bold;width:100px;text-wrap:nowrap;">Chq Date</td><td style="width:10px;"> :</td><td></td></tr>
<tr style="text-align:left;"><td style="font-weight:bold;width:100px;text-wrap:nowrap;">Chq No</td><td style="width:10px;"> :</td><td> </td></tr>
<tr style="text-align:left;"><td style="font-weight:bold;width:100px;text-wrap:nowrap;">Bank Name</td><td style="width:10px;"> :</td><td></td></tr>
<tr style="text-align:left;"><td style="font-weight:bold;width:100px;text-wrap:nowrap;">Ref No</td><td style="width:10px;"> :</td><td> </td></tr>




</table>



                       <br/>
<table class="table">
<tr style="outline: thin solid" rowspan="3">
<th colspan="3">NET PAY ALLOCATION</th>

</tr>
<tr>
<th style="text-align:left;"><strong>DESCRIPTION</strong>
</th>
<th><strong>THIS PERIOD($)</strong>
</th>
<th><strong>YTD($)</strong>
</th>
</tr>
<tr>
<td style="text-align:left;"><strong>Check Amount</strong>
</td>
<td class="net_period"> <strong style="
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
</div>
<div class="col-md-6">
<table class="table" style=" width: 100%; display: table-cell;">
<tr style="outline: thin solid" rowspan="6">
<th colspan="6">WITHHOLDINGS</th>

</tr>
<tr>
<th style="text-align:left;">DESCRIPTION</th>
<th>FILING STATUS</th>
<th>THIS PERIOD($)</th>
<th>YTD($)</th>

</tr>
<tr>
<td style="text-align:left;"> Social Security</td>
<td>S O</td>

</tr>
<tr>
<td style="text-align:left;">Madicare</td>
<td>SMCU O</td>

</tr>
<tr>
<td style="text-align:left;">Fed Income Tax</td>
<td></td>

</tr>
<tr>
<td style="text-align:left;">Unemployment Tax</td>
<td></td>
</tr>


<!--<tr>-->

<!--<td style="text-align:left;"></td>-->
<!--<td></td>-->
  
    
<!--      <td class="current">  </td>-->
    
<!--         <td class="ytd"></td>-->
        

<!--</tr>-->
<tr>
<td></td><td></td>
<td style="border-top: groove;" id="Total_current"></td><td style="border-top: groove;" id="Total_ytd"></td>
</tr>
</table>
</div>
</div>


              
       


    </div>

</div>

            <?php 

            }
    elseif($template==2)
    {
            ?>
       <div class="col-sm-12">



<div class="panel panel-default thumbnail"> 



    <div class="panel-body">

    <div  id="content">

<div class="payTop_details row">

<div class="col-md-12">
<div class="col-md-4">
<table class="top" style="border:none;">
<tr  style="text-align:center;">
<th colspan="2" style="    height: 40px;
text-align: center;">EMPLOYEE INFO</th>
</tr>
<tr>
<td><strong>NAME : </strong></td>
<td></td>
</tr>
<tr>
<td><strong>TITLE</strong> :</td>
<td>  </td>

</tr>
<tr>
<td><strong>ID</strong> :</td>
<td> </td>

</tr>
<tr>
<td><strong>TIMESHEET ID</strong>:</td>
<td>  </td>

</tr>
</table>
</div>
<div class="col-md-4">
<table class="top" style="border:none;">
       <tr  style="text-align:center;text-wrap: nowrap;">
<th colspan="2"     style="height: 40px;
text-align: center;">PERSONAL AND CHECK INFO</th>
</tr>
<tr>
<td><strong> NAME : </strong></td>
<td></td>
</tr>

<tr>
<td><strong>ID</strong> :</td>
<td>  </td>

</tr>
<tr>
<td><strong>Bank Name</strong>:</td>
<td>  </td>

</tr>
<tr>
<td><strong>Ref No</strong>:</td>
<td> </td>

</tr>
</table>
</div>
<div class="col-md-4">
<table class="top" style="border:none;">
            <tr  style="text-align:center;">
<th colspan="2"  style="height: 40px;
text-align: center;">COMPANY INFO</th>
</tr>
<tr>
<td><strong>NAME : </strong></td>
<td></td>
</tr>
<tr>
<td><strong>Address</strong> :</td>
<td> </td>

</tr>
<tr>
<td><strong>Phone</strong> :</td>
<td>  </td>

</tr>
<tr>
<td><strong>Email</strong>:</td>
<td>  </td>

</tr>
</table>
</div>
</div>
</div>
<br/>
<div class="row">
<div class="col-md-12">
<div class="col-md-6">
<table class="top">
               <tr  style="text-align:center;">
<th style="    text-align: center;
height: 30px;" colspan="2">EARNINGS</th>
</tr>
<tr><td><strong>DESCRIPTION :</strong></td><td>Salary</td></tr>
<tr><td><strong>HRS/ UNITS  :</strong></td><td> </td></tr>
<tr><td><strong>RATE  :</strong></td><td> </td></tr>
<tr><td><strong>THIS PERIOD($)  :</strong></td>  <td id="total_period"></td></tr>
<tr><td><strong>YTD HOURS  :</strong></td> <td></td></tr>
<tr><td><strong>YTD($)  :</strong></td><td id="total_ytd"></td></tr>
</table>

<table class="top">
<tr  rowspan="3">
<th style="height: 30px;
text-align: center;" colspan="3">NET PAY ALLOCATION</th>

</tr>
<tr>
<td style="text-align:left;"><strong>DESCRIPTION</strong>
</td>
<td><strong>THIS PERIOD($)</strong>
</td>
<td><strong>YTD($)</strong>
</td>
</tr>
<tr>
<td style="text-align:left;"><strong>Check Amount</strong>
</td>
<td class="net_period"> <strong style="
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
</div>
<div class="col-md-6">
<table class="top">
<tr  rowspan="6">
<th style="height: 40px;text-align: center;" colspan="4">WITHHOLDINGS</th>

</tr>
<tr>
<td style="font-size:12px;font-weight:bold;">DESCRIPTION</td>
<td style="font-size:12px;font-weight:bold;">FILING STATUS</td>
<td style="font-size:12px;font-weight:bold;">THIS PERIOD($)</td>
<td style="font-size:12px;font-weight:bold;">YTD($)</td>

</tr>
<tr>
<td style="text-align:left;font-weight:bold;"> Social Security</td>
<td>S O</td>
<td class="current"></td>
<td class="ytd"></td>
</tr>
<tr>
<td style="text-align:left;font-weight:bold;">Madicare</td>
<td>SMCU O</td>
<td class="current"></td>
<td class="ytd"></td>
</tr>
<tr>
<td style="text-align:left;font-weight:bold;">Fed Income Tax</td>
<td></td>
<td class="current"></td>
<td class="ytd"></td>
</tr>
<tr>
<td style="text-align:left;font-weight:bold;">Unemployment Tax</td>
<td></td>
<td class="current"></td>
<td class="ytd"></td>
</tr>

<!--<tr>-->

<!--<td style="text-align:left;font-weight:bold;"></td>-->
<!--<td></td>-->
  
    
<!--      <td class="current">  </td>-->
    
<!--         <td class="ytd"></td>-->
        

<!--</tr>-->
<tr>
<td></td><td></td>
<td style="border-top: groove;" id="Total_current"></td><td style="border-top: groove;" id="Total_ytd"></td>
</tr>
</table>
</div>
</div>
</div>
</div>

           
 
    <?php 

} else if($template==3)
    {
?>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/Invoice/style.css" />
<style>

  th{
    text-align:center;
  }
  .invoice-12 .default-table thead th {
   
    position: relative;
    color:white;
    font-size: 15px;
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
    background-color: <?php // echo $color ?>;
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
     background-color: <?php  //echo $color ?>;
    background-size: cover;
    z-index: -1;
}
.invoice-12 .default-table thead {
  
   background-color: <?php  //echo $color ?>;
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
 background-color:<?php // echo $color ?>;
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
    background-color: <?php  //echo $color ?>;
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
     background-color: <?php  //echo $color ?>;
    background-size: cover;
    z-index: -1;
}
.invoice-12 .default-table thead {
   background-color: <?php // echo $color ?>;
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
th{
   padding-top: 10px;
  padding-bottom: 20px;
  padding-left: 30px;
  padding-right: 40px;
}
  </style>

<!-- Invoice 12 start -->
<div class="invoice-12 invoice-content" style="background: white;" >
    <div class="container">
         
        <div class="row"  style="background: white;">
            <div class="col-lg-12">
                <div class="invoice-inner clearfix" style="border:1px solid black;" >
                   
                  <div style="color:red;"></div>
                   <div style="color:red;"></div>
                    <div class="invoice-info clearfix" id="invoice_wrapper">
                        <div class="invoice-contant" >
                            <div class="invoice-headar">

  <div class="row">
    <div class="col-sm-4 r">
          <!--<img crossorigin="anonymous" src="" style="float: left;width:100px;height:100px;" alt="logo">-->
    </div><!-- .col-sm-4 -->
    <div class="col-sm-8 rr">
      <div class="description">
        <h2> </h2>
      
        </div><!-- .description -->
    </div><!-- .col-sm-8 -->
  </div><!-- .row -->

                            </div>

                            <br>
                            <div class="invoice-top" style="padding-top:0px;">
                                <div class="row">
                                    <div class="col-md-4 col-sm-6 mb-30">
                                        <div class="invoice-number">
                                            <h4 class="inv-title-1" style="font-weight:bold;color: ">EMPLOYEE INFO</h4>
                                            <h2 class="name mb-10"></h2>
                                            <p class="invo-addr-1 mb-0">
                                              
      
        <strong>TITLE</strong>:<br> 
        <strong>Emp ID</strong>:<br> 
    
        </p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 mb-30">
                                        <div class="invoice-number">
                                            <div class="invoice-number-inner">
                                                <h4 class="inv-title-1" style="font-weight:bold;color: ">Personal & Check Info</h4>
                                                <h2 class="name mb-10"></h2>
                                                <p class="invo-addr-1 mb-0">
    
     
        <strong>Chq Date</strong>:<br> 
        <strong>Chq No</strong>:<br> 
  
            <strong>Bank Name</strong>:<br> 
        <strong>Ref No</strong>:<br> 
    
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6 mb-30 invoice-contact-us">
                                        <h4 class="inv-title-1" style="font-weight:bold;color: ">Company INFO</h4>
                                        <h2 class="name mb-10"></h2>
                                        <ul class="link">
                                            <li>
                                                <i class="fa fa-map-marker"></i> 
                                            </li>
                                            <li>
                                                <i class="fa fa-envelope"></i> <a href=""></a>
                                            </li>
                                            <li>
                                                <i class="fa fa-phone"></i> <a href="tel:+55-417-634-7071"></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                             <div class="invoice-center">
                                <div class="order-summary" style="padding:20px;">
                                    <div class="table-outer">
                                        <table class="default-table invoice-table" border="1" cellpadding="0" cellspacing="0">
                                          

                                            <tbody>
   <tr style="font-weight:bold;text-align:center;background-color:;color:black;">
    <td><strong>DESCRIPTION</strong></td><td><strong>HRS/ UNITS</strong></td><td><strong>RATE</strong></td><td><strong>THIS PERIOD()</strong></td>
   <td><strong>YTD HOURS</strong></td> <td><strong>YTD()</strong></td>
      </tr>
      <tr style="text-align:center;">
    <td>Salary</td>
<td> </td>
<td> </td>
 <td id="total_period"></td>
 <td></td>
<td id="total_ytd"></td></tr>

                                           
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="invoice-center">
                                <div class="order-summary" style="padding:20px;">
                                    <div class="table-outer">
    
                                             <div ><span style="float:left"><strong>Pay Period : </strong></span><span style="float:right;"><strong>Timesheet ID : </strong> </span></div>
                                           
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
     <td style="font-size:10px;font-weight:bold;">THIS PERIOD()</td>
      <td style="font-size:10px;font-weight:bold;">YTD()</td>
      
</tr>

<tr>
<td style="text-align:left;font-weight:bold;"> Social Security</td>
<td>S O</td>
<td class="current"></td>
<td class="ytd"></td>
</tr>


<tr>
<td style="text-align:left;font-weight:bold;">Madicare</td>
<td>SMCU O</td>
<td class="current"></td>
<td class="ytd"></td>
</tr>

<tr>
<td style="text-align:left;font-weight:bold;">Fed Income Tax</td>
<td></td>
<td class="current"></td>
<td class="ytd"></td>
</tr>

<tr>
<td style="text-align:left;font-weight:bold;">Unemployment Tax</td>
<td></td>
<td class="current"></td>
<td class="ytd"></td>
</tr>


 
   
     <tr>
       <td></td><td></td>
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
   <td><strong>THIS PERIOD()</strong>
</td>
   <td><strong>YTD()</strong>
</td>
</tr>
<tr>
  <td style="text-align:left;"><strong>Check Amount</strong>
</td>
  <td class="net_period"> <strong style="
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
</div>
<br>
<br>
<br>
<br>
                                      
                                        </div>
                                        <br>
                                        <br>
                                        </div>
                       
                                </div>
                            </div>
                        </div>
                    </div>           
                </div>
            </div>
        </div>
 

    <?php 

} else if($template==4)
    {
?>

<style>
    .table td{
        padding:10px;
      
    }
    table {
  
            border: none;
    text-align: center;
    table-layout: fixed;

     
    margin: 0 auto; /* or margin: 0 auto 0 auto */
  }
    
    table th {
 color:white;
    background-color: <?php  echo '#'.$color; ?>
  padding: 8px 14px;
  text-align: center;
 
}
#forcolor{
    background-color: <?php  echo '#'.$color; ?>
  padding: 8px 14px;
  text-align: center;  
}
   
  .btn_upload {
  cursor: pointer;
  display: inline-block;
  overflow: hidden;
  position: relative;
  color: #fff;
  background-color: #2a72d4;
  border: 1px solid #166b8a;
  padding: 5px 10px;
}

.btn_upload:hover,
.btn_upload:focus {
  background-color: #7ca9e6;
}

.yes {
  display: flex;
  align-items: flex-start;
  margin-top: 10px !important;
}

.btn_upload input {
  cursor: pointer;
  height: 100%;
  position: absolute;
  filter: alpha(opacity=1);
  -moz-opacity: 0;
  opacity: 0;
}

.it {
    /* height: 400px; */
    margin-left: 10px;
    /* width: 1000px; */
    height: 200px; /* Set the height of the checkbox */
    width: 800px; /* Set the width of the checkbox */


}

.btn-rmv1,
.btn-rmv2,
.btn-rmv3,
.btn-rmv4,
.btn-rmv5 {
  display: none;
}

.rmv {
  cursor: pointer;
  color: #fff;
  border-radius: 30px;
  border: 1px solid #fff;
  display: inline-block;
  /* background: rgba(255, 0, 0, 1); */
  margin: -5px -10px;
}

.rmv:hover {
  /* background: rgba(255, 0, 0, 0.5); */
}

</style>




<div style="height:310px;">

</div>

 


    
     





<div class="payTop_details row"  style="border:1px solid black;">
 <div class="col-md-12">
</div>


<div>
         <strong style='font-size:10px;margin-left: 7px'>Company Name-Phone Number -Email</strong>
   </div>
<table class="table" >
    <tr>
    <th  style="text-align: justify;background:none;color: black;" >Employee Name:<h4><?php echo $infoemployee[0]['first_name'] . ' ' . $infoemployee[0]['last_name']; ?></h4></th>
    <th  style="text-align: end;background:none;color: black;width: 310px;" >Employee Number:<h4><?php echo $infoemployee[0]['id']; ?></h4></th>
    </tr>
</table>






 <div class="col-md-12"><br/></div>
 <div class="col-md-12" style="float:center;">
 

 
<div>
         
 
  
    <table width="100%" height='100%' border="1">
  <tr style="background-color: #<?php echo $color; ?>;">
    <td><strong>Earnings</strong></td>
    <td><strong>Hours</strong></td>
    <td><strong>Amount</strong></td>
    <td><strong>Y-T-D</strong></td>
    <td><strong>Deductions</strong></td>
    <td><strong>Amount</strong></td>
    <td><strong>Y-T-D</strong></td>
  </tr>

 
  <tr style="background-color: #<?php echo $color; ?>;">
    <td><strong> Total</strong></td>
    <td><strong> </strong></td>
    <td><strong></strong></td>
    <td><strong> </strong></td>
    <td><strong>Total </strong></td>
    <td><strong></strong></td>
    <td><strong> </strong></td>
  </tr>


</table>

 


<br>

<table class="table" >
    <tr>
    <th  style="text-align: justify;background:none;color: black;" >Social Security Num:<h4><?php echo $infoemployee[0]['social_security_number']; ?></h4></th>
    <th  style="text-align: end;background:none;color: black;width: 310px;" >Pay Period:<h4><?php echo $infotime[0]['month']; ?></h4> </th>
    </tr>
</table>
 <table class="table" >
    <tr>
    <th  style="text-align: justify;background:none;color: black;border: none;" >Chk No:
    <!-- <?php //echo $infotime[0]['cheque_no']; ?> -->
    <h4><?php
$chequeNo = $infotime[0]['cheque_no'];

if (!empty($chequeNo)) {
    // Code to execute if $chequeNo is not empty
    echo $chequeNo;
} else {
    // Code to execute if $chequeNo is empty or null
    echo '0000';
}
?></h4>

  
  </th>
    <th  style="background:none;color: black;border: none;text-align: right;" >Net Pay :<br> <h4><span class="net_ytd" style="border:none;"></h4></th>
 
 
  </tr>
</table>
 


<div class="yes">
    <img id="ImgPreview" src="" class="preview1" />
    <!-- <input type="button" id="removeImage1" value="x" class="btn-rmv1" style="width:30px;"  /> -->
 
    <img src="<?php echo base_url()  ?>asset/images/pay.png"  class="headshotphoto" style="height:250px;margin-left:450px;" />

  </div>



</div>
</div>




    <?php   } ?>
</div>



<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content" style='width:1200px;'>

      <!-- Modal Header -->
   

      <!-- Modal body -->
      <div >
      <?php
            //////////////Design one///////////// 
            if($template==1)
            {
            ?>

        <div class="col-sm-8" > <div class="panel panel-default">
    <div class="panel-body">
        
        <div class="row">
        
              <div class="col-sm-3" id='company_info'>
                  
                  Company name:<?php echo $cname; ?><br>
                  Address:<?php echo $address; ?><br>
                  Email:<?php echo $email; ?><br>
                  Contact:<?php echo $mobile; ?><br>
              </div>
            <div class="col-sm-6 text-center"><h3><?php echo $header; ?></h3></div>
            <div class="col-sm-3"><img src="<?php echo  base_url().$logo; ?>" style='width: 40%;'></div>
        </div>
        <div class="row">
            <br>
            <br>
            <table width="348" height="79" border="1" style="color: #000;">
  <tr>
    <td width="204" height="30" style="background-color:#<?php echo $color; ?>;"><b>BILL TO </b> </td>
  </tr>
  <tr>
    <td>fdfdsdsf</td>
  </tr>
</table>
<br>
<br>
<table width="100%" height='100%' border="1">
  <tr style="background-color: #<?php echo $color; ?>;">
    <td>Commercial</td>
    <td>Date</td>
    <td>Total Due</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>enclosed</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<br>
<br>
<table width="100%" height='100%' border="1">
  <tr style="background-color: #<?php echo $color; ?>;">
    <td>Material</td>
    <td>Description</td>
    <td>Qty</td>
    <td>Rate</td>
    <td>Amount</td>
    
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
 
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
 
  </tr>
</table>

   <br><button type="button" class="btn btn-primary " data-toggle="modal" data-target="#myModal">
   Close
</button>
        </div>
    </div>
  </div></div>

            <?php 

            }
    elseif($template==2)
    {
            ?>
          <div class="col-sm-8" > <div class="panel panel-default">
    <div class="panel-body">
        
        <div class="row">
            <div class="col-sm-2"><img src="<?php echo  base_url().$logo; ?>" style='width: 40%;'>
               
              </div>
            <div class="col-sm-6 text-center"><h3><?php echo $header; ?></h3></div>
           <div class="col-sm-4" id='company_info'>
                  
                  Company name:<?php echo $cname; ?><br>
                  Address:<?php echo $address; ?><br>
                  Email:<?php echo $email; ?><br>
                  Contact:<?php echo $mobile; ?><br>
              </div>
        </div>

        <div class="row">
            <div class="col-sm-6"><table width="348" height="79" border="1" style="color: #000;">
  <tr>
    <td width="204" height="30" style="background-color:#<?php echo $color; ?>;"><b>BILL TO </b> </td>
  </tr>
  <tr>
    <td>fdfdsdsf</td>
  </tr>
</table>
<br>
<br>


</div>
            <div class="col-sm-6"></div>
            
<br>
<table width="100%" height='100%' border="1">
  <tr style="background-color: #<?php echo $color; ?>;">
    <td>Commercial</td>
    <td>Date</td>
    <td>Total Due</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>enclosed</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<br>
<table width="100%" height='100%' border="1">
  <tr style="background-color: #<?php echo $color; ?>;">
    <td>Material</td>
    <td>Description</td>
    <td>Qty</td>
    <td>Rate</td>
    <td>Amount</td>
    
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
 
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
 
  </tr>
</table>

   <br><button type="button" class="btn btn-primary " data-toggle="modal" data-target="#myModal">
   Close
</button>
        </div>
    </div>
  </div></div>


    <?php 
           }
    else
    {
    ?>
    <div class="col-sm-8" > <div class="panel panel-default">
    <div class="panel-body">
        
        <div class="row">
            <div class="col-sm-3"><br>
               
              </div>
            <div class="col-sm-6 text-center"><h3><?php echo $header; ?></h3></div>
            <div class="col-sm-3"><img src="<?php echo  base_url().$logo; ?>" style='width: 40%;'></div>
        </div>
        <div class="row">
            <table width="348" height="79" border="1" style="color: #000;">
  <tr>
    <td width="204" height="30" style="background-color:#<?php echo $color; ?>;"><b>BILL TO 5</b> </td>
  </tr>
  <tr>
    <td>fdfdsdsf</td>
  </tr>
</table>
<br>
<br>
<table width="100%" height='100%' border="1">
  <tr style="background-color: #<?php echo $color; ?>;">
    <td>Commercial</td>
    <td>Date</td>
    <td>Total Due</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>enclosed</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<br>
<br>
<table width="100%" height='100%' border="1">
  <tr style="background-color: #<?php echo $color; ?>;">
    <td>Material</td>
    <td>Description</td>
    <td>Qty</td>
    <td>Rate</td>
    <td>Amount</td>
    
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
 
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
 
  </tr>
</table>

   <br><button type="button" class="btn btn-primary " data-toggle="modal" data-target="#myModal">
Close
</button>
        </div>
    </div>
  </div></div>
    <?php 

}
?>
  </div>

      <!-- Modal footer -->
     

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










    </section>
</div>
<?php
$csrf = array(
  'name' => $this->security->get_csrf_token_name(),
  'hash' => $this->security->get_csrf_hash()
);

?>
<!-- Add new customer end -->

<script type="text/javascript">
    ////////////Show & Hide///////////

    $('#templateformart').hide();
    $('#colorcombo').hide();
    $('#uploadlogo').hide();
    $('#template').click(function(){
        $("#templateformart").toggle();
    });
     $('#templatecolor').click(function(){
        $("#colorcombo").toggle();
    });
      $('#templatelogo').click(function(){
        $("#uploadlogo").toggle();

    });
      /////////////Ajax////////////////////



///////////////Ajax Dot////////
var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';
function dot(value)
{
    var uid='<?php echo $_SESSION['user_id']; ?>';
    var tokenHash=jQuery("input[name=csrf_test_name]").val();
$.ajax({
  method: "POST",
  url:"<?php echo base_url(); ?>Cweb_setting/update_templates",

  data: { value: value, id: uid ,input:"color",'<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>'},
 success:function (result) {

  
    //    alert('Color '+result);  
      location.reload();
    
      
  }});
 }
 function header(value)
{
    var uid='<?php echo $_SESSION['user_id']; ?>';
    var tokenHash=jQuery("input[name=csrf_test_name]").val();
$.ajax({
  method: "POST",
url:"<?php echo base_url(); ?>Cweb_setting/update_templates",
  data: { value: value, id: uid ,input:"header",'<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>'},
 success:function (result) {

  
        //  alert('Color '+result);  
        location.reload();
    
      
  }});
 }
    

</script>
<!-- The Modal -->
  <div class="modal" id="myModal" >
  <div class="modal-dialog" style="width:1250px;height:1250px;">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Invoice Header</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
      <div class="col-sm-6 text-center"><?php echo $header; ?></div>
            <div class="col-sm-3"><img src="<?php echo base_url().$logo; ?>" style='width: 40%;'></div>
      <br/>
      <table width="348" height="79" border="1">
  <tr>
    <td width="204" height="30" style="background-color:#<?php echo $color; ?>;color:white;"><b>BILL TO</b> </td>
  </tr>
  <tr>
    <td>fdfdsdsf</td>
  </tr>
</table>
<br>
<br>
<table width="100%" height='100%' border="1">
  <tr style="background-color: #<?php echo $color; ?>;color: white;">
    <td>Commercial</td>
    <td>Date</td>
    <td>Total Due</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>enclosed</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<br>
<br>
<table width="100%" height='100%' border="1">
  <tr style="background-color: #<?php echo $color; ?>;color: white;">
    <td>Material</td>
    <td>Description</td>
    <td>Qty</td>
    <td>Rate</td>
    <td>Amount</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
  </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<style>
    .salary-slip{
      margin: 15px;
      .empDetail {
        width: 100%;
        text-align: left;
        border: 2px solid black;
        border-collapse: collapse;
        table-layout: fixed;
      }
      
      .head {
        margin: 10px;
        margin-bottom: 50px;
        width: 100%;
      }
      
      .companyName {
        text-align: right;
        font-size: 25px;
        font-weight: bold;
      }
      
      .salaryMonth {
        text-align: center;
      }
      
      .table-border-bottom {
        border-bottom: 1px solid;
      }
      
      .table-border-right {
        border-right: 1px solid;
      }
      
      .myBackground {
        padding-top: 10px;
        text-align: left;
        border: 1px solid black;
        height: 40px;
      }
      
      .myAlign {
        text-align: center;
        border-right: 1px solid black;
      }
      
      .myTotalBackground {
        padding-top: 10px;
        text-align: left;
        background-color: #EBF1DE;
        border-spacing: 0px;
      }
      
      .align-4 {
        width: 25%;
        float: left;
      }
      
      .tail {
        margin-top: 35px;
      }
      
      .align-2 {
        margin-top: 25px;
        width: 50%;
        float: left;
      }
      
      .border-center {
        text-align: center;
      }
      .border-center th, .border-center td {
        border: 1px solid black;
      }
      
      th, td {
        padding-left: 6px;
      }
}
.top {
   border-collapse: collapse;
  width: 100%;

 table-layout: fixed;
   border: 1px solid #ddd;
  text-align: left;

}

.top td{
       border: 1px solid #ddd;
     padding: 10px;

}
</style>  