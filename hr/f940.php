<!-- <link href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.2.2/css/bootstrap.min.css" rel="stylesheet" /> -->
<style>
   .pe-7s-cart{
   position: absolute;
   top: -44px;
   left: 50px;
   margin-left: 769px;
   }
   .pe-7s-help1{
   position: absolute;
   top:-68px;
   left:95px;
   margin-left: 770px
   }
   .pe-7s-settings{
   position: absolute;
   top:-92px;
   left:142px;
   margin-left: 770px;
   }
   .label{
   position: absolute;
   top: -79px;
   display: none;
   }
   .navbar {
   height: 40px;
   }
   .sidebar-toggle{
   margin-top: -97px;
   margin-left: -971px;
   }
   .pe-7s-bell{
   position: relative;
   left: 768px;
   }
</style>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <link
         href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
         rel="stylesheet"
         integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
         crossorigin="anonymous"
         />
      <link rel="stylesheet" href="<?php echo base_url()  ?>my-assets/css/f942.css">
      <title>Document</title>
   </head>
   <body>
      <button class="btnclr btn btn-default dropdown-toggle  boxes filip-horizontal mobile_para"  onclick="downloadPagesAsPDF()"   style="margin-left:265px;background: white;border: 2px solid black;"  ><span  class="fa fa-download"></span>Download </button>
      <body bgcolor="#A0A0A0" vlink="blue" link="blue"   >
         <div id="download"  >
            <div class="container-fluid"  id="one">
               <div class="row">
                  <img src="<?php echo base_url()  ?>asset/images/f940_01.jpg" width="100%" />
                  <?php
                     $Federal_Pin_Number = isset($get_cominfo[0]['Federal_Pin_Number']) ? $get_cominfo[0]['Federal_Pin_Number'] : '';
                     if (strlen($Federal_Pin_Number) >= 9) {
                         $one = substr($Federal_Pin_Number, 0, 2);
                         $two = substr($Federal_Pin_Number, -7);
                     
                         $one1 = $one[0];
                         $one2 = $one[1];
                     
                         $two3 = $two[0]; // Corrected from $two[2]
                         $two4 = $two[1]; // Corrected from $two[3]
                         $two5 = $two[2]; // Corrected from $two[4]
                         $two6 = $two[3]; // Corrected from $two[5]
                         $two7 = $two[4]; // Corrected from $two[6]
                         $two8 = $two[5]; // Corrected from $two[7]
                         $two9 = $two[6]; // Corrected from $two[8]
                     
                     } else {
                         $one = '00'; // Example 
                         $two = '0000000'; // Example 
                     }
                     ?>
                  <div class="two-digit d-flex gap-3">
                     <input class="ein-number" style="margin-right: 9px;
    margin-left: -8px;" value=" <?php echo $one1; ?>" />
                     <input class="ein-number second-value" value="<?php echo $one2; ?>" />
                  </div>
                  <div class="two-digit-2 d-flex gap-1">
                     <input class="ein-number-2" value="<?php echo $two3; ?>" />
                     <input
                        class="ein-number-2 print-check"
                        style="margin-left: 13px"
                        value="<?php echo $two4; ?>"
                        />
                     <input
                        class="ein-number-2 print-check-2"
                        style="margin-left: 15px"
                        value="<?php echo $two5; ?>"
                        />
                     <input
                        class="ein-number-2 print-check-3"
                        style="margin-left: 13px"
                        value="<?php echo $two6; ?>"
                        />
                     <input
                        class="ein-number-2 print-check-4"
                        style="margin-left: 13px"
                        value="<?php echo $two7; ?>"
                        />
                     <input
                        class="ein-number-2 print-check-5"
                        style="margin-left: 13px"
                        value="<?php echo $two8; ?>"
                        />
                     <input
                        class="ein-number-2 print-check-6"
                        style="margin-left: 13px"
                        value="<?php echo $two9; ?>"
                        />
                  </div>
                  <?php
                     if (isset($get_cominfo) && !empty($get_cominfo)) {
                        $company_name = $get_cominfo[0]['company_name'];
                        $mobile  = $get_cominfo[0]['mobile'];
                     
                     } else {
                         $company_name = '';
                         $mobile  = '';
                     }
                     ?>
                  <div class="name-text">
                     <input type="text" value="<?php echo $company_name; ?>" />
                  </div>
                  <div class="trade-text">
                     <input type="text" value="<?php echo $company_name; ?>" />
                  </div>
                  <?php
                     $address = isset($get_cominfo[0]['address']) ? $get_cominfo[0]['address'] : '';
                     $get_address = explode(',' , $address);
                     ?>
                  <div class="Address-text">
                     <input type="text" value="<?php echo $get_address[0]; ?>" />
                  </div>
                  <div class="city-text">
                     <input type="text" value="<?php echo $get_address[1]; ?>" />
                  </div>
                  <div class="state-text">
                     <input type="text" value="<?php echo $get_address[2]; ?>" />
                  </div>
                  <div class="zipcode-text">
                     <input type="text" value="<?php echo $get_address[3]; ?>" />
                  </div>
                  <div class="country">
                     <input type="text" value="" />
                  </div>
                  <div class="foreign">
                     <input type="text" value=" " />
                  </div>
                  <div class="postal-code">
                     <input type="text" value="" />
                  </div>
                  <div class="typea">
                     <input type="checkbox">
                  </div>
                  <div class="typeb">
                     <input type="checkbox">
                  </div>
                  <div class="typec">
                     <input type="checkbox">
                  </div>
                  <div class="typed">
                     <input type="checkbox">
                  </div>
                  <div class="a1">
                     <input type="text">
                  </div>
                  <div class="a2">
                     <input type="text">
                  </div>
                  <div class="b1">
                     <input type="checkbox">
                  </div>
                  <div class="b2">
                     <input type="checkbox">
                  </div>
                  <div class="p2-4a">
                     <input type="checkbox">
                  </div>
                  <div class="p2-4b">
                     <input type="checkbox">
                  </div>
                  <div class="p2-4c">
                     <input type="checkbox">
                  </div>
                  <div class="p2-4d">
                     <input type="checkbox">
                  </div>
                  <div class="p2-4e">
                     <input type="checkbox">
                  </div>
              



                  <?php
// Check if $get_paytotal is set and not empty, and that total_grosspay has a value
// if (isset($get_paytotal[0]['total_grosspay']) && isset($get_sc_info[0]['salebalanceamount'])) {
//     $total_grosspay = $get_paytotal[0]['total_grosspay'] +  $get_sc_info[0]['salebalanceamount'];
// }else{

    $total_grosspay = $get_paytotal[0]['total_grosspay'];
// }
 

$parts = explode('.', number_format($total_grosspay, 2, '.', ''));
// Preparing the integer and decimal parts
$integerPart = $parts[0];
$dollar_value=$integerPart;
$decimalPart =$parts[1];
$cent_value=$decimalPart;
?>

 
                  <div class="total-emp-payment">
                     <input type="text" value="$<?php echo $integerPart ; ?> "  style="margin-left: -80px;width: 104px;text-align:right;"     />
                     <input type="text" value="<?php echo $decimalPart ; ?>"     />

                    </div>


                  <div class="row5">
                     <input type="text" value="" />
                  </div>
 
  <?php
$parts = explode('.', number_format($amt, 2, '.', ''));
$integerPart = $parts[0];
$decimalPart = isset($parts[1]) ? $parts[1] : '00'; 

?>
    
    

                  <div class="total-payment">
                     <!--<input type="text" value="$<?php echo $integerPart; ?>"  style="margin-left: -68px;text-align: right;"   />-->
    
                     <!--<input type="text" value="<?php echo $decimalPart; ?>"  style="margin-left: 5px;"  />-->
 
                    </div>




                  <div class="subtotal-text">
                     <input type="text" value="" />
                  </div>
                  <div class="total-taxable-text">
                     <input type="text" value="" />
                  </div>
                  <div class="row8">
                     <input type="text" value="" />
                  </div>
                  <div class="row9">
                     <input type="text" value="" />
                  </div>
                  <div class="row10">
                     <input type="text" value="" />
                  </div>
                  <div class="row11">
                     <input type="text" value="" />
                  </div>
                  <div class="row12">
                     <input type="text" value="" />
                  </div>
                  <div class="row13">
                     <input type="text" value="" />
                  </div>
                  <div class="row14">
                     <input type="text" value="" />
                  </div>
                  <div class="row15">
                     <input type="text" value="" />
                  </div>
                  <div class="row15a">
                     <input type="checkbox">
                  </div>
                  <div class="row15b">
                     <input type="checkbox">
                  </div>
               </div>
            </div>
            <!-- second-page -->
            <div class="container-fluid" id="two">
               <div class="row">
                  <img src="<?php echo base_url()  ?>asset/images/f940_02.jpg" width="100%" />
               
               
                  <div class="trade-name">
                     <input type="text" value="<?php echo $company_name; ?>">
                  </div>
 
                  <div class="ein">
                     <input type="text" value="<?php echo $Federal_Pin_Number;  ?>" />
                  </div>
                  <div class="row16a">
                     <input type="text" value="" />
                  </div>
                  <div class="row16b">
                     <input type="text" value="" />
                  </div>
                  <div class="row16c">
                     <input type="text" value="" />
                  </div>
                  <div class="row16d">
                     <input type="text" value="" />
                  </div>
                  <div class="row17">
                     <input type="text" value="" />
                  </div>
                  <div class="row17a">
                     <input type="text" value="" />
                  </div>
                  <div class="row17b">
                     <input type="text" value="" />
                  </div>
                  <div class="p6-a">
                     <input type="checkbox">
                  </div>
                  <div class="p6-b">
                     <input type="checkbox">
                  </div>
                  <div class="p6-c">
                     <input type="text" value="" />
                     <input type="text" value="" style="margin-left: 15px;" />
                     <input type="text" value="" style="margin-left: 16px;" />
                     <input type="text" value="" style="margin-left: 16px;" />
                     <input type="text" value="" style="margin-left: 16px;" />
                  </div>
                  <div class="pre-check">
                     <input type="checkbox">
                  </div>
                  <div class="sign">
                     <input type="text" value="" />
                  </div>
                  <div class="printname">
                     <input type="text" value="<?php echo $company_name; ?>" />
                  </div>
                  <div class="printitle">
                     <input type="text" value="Admin" />
                  </div>
                  <div class="date">
                     <input type="text" value="<?php echo date('m/d/Y'); ?>" />
                  </div>
                  <div class="dayphone">
                     <input type="text" value="<?php echo $mobile; ?>" />
                  </div>




                  <div class="pre-name">
                     <input type="text" value="" />
                  </div>
                  <div class="pre-sign">
                     <input type="text" value="" />
                  </div>
                  <div class="first-name">
                     <input type="text" value="" />
                  </div>
                  <div class="address">
                     <input type="text" value="" />
                  </div>
                  <div class="pre-city">
                     <input type="text" value="" name="" id="" />
                  </div>
                  <div class="pre-state">
                     <input type="text" value="" />
                  </div>
                  <div class="pre-zipcode">
                     <input type="text" value="" />
                  </div>
                  <div class="pre-pin">
                     <input type="text" value="" />
                  </div>
                  <div class="pre-date">
                     <input type="text" value="" />
                  </div>
                  <div class="pre-ein">
                     <input type="text" value="" />
                  </div>
                  <div class="pre-phone">
                     <input type="text" value="" />
                  </div>
               </div>
            </div>
            <!-- third-page -->
            <div class="container-fluid"  id="three">
               <div class="row">
                  <img src="<?php echo base_url()  ?>asset/images/f940_03.jpg" width="100%" />
                  
                  
                  
                  
                  <div class="row1-ein">
                     <input type="text" value="<?php echo $Federal_Pin_Number; ?>" />
                  </div>



                  <div class="dollar">
                      
                     <input type="text" value="<?php echo $dollar_value;  ?>" />
                  </div>
                  <div class="cent">
                     <input type="text" value="<?php echo $cent_value;  ?>" />
                  </div>
                  <div class="busniess-name">
                     <input type="text" value="" />
                  </div>
                  <div class="b-address">
                     <input type="text" value="" />
                  </div>
                  <div class="city-state-code">
                     <input type="text" value="" />
                  </div>
               </div>
            </div>
            <!-- forth page -->
            <div class="container-fluid" id="four" >
               <div class="row">
                  <img src="<?php echo base_url()  ?>asset/images/f940_04.jpg" width="100%" />
               </div>
            </div>
         </div>
  <style>
    input {
  border: 0;
  background-color: transparent;
  font-size: medium;
}
.ein-number {
  width: 20px;
  height: 20px;
}
.ein-number-2 {
  width: 15px;
  height: 20px;
}
.container-fluid {
  width: 21cm;
  height: 29.7cm;
  position: relative;
  margin: 0 auto;
  page-break-after: always
} 


.two-digit {
  position: absolute;
  top: 85px;
  left: 204px;
}
.two-digit-2 {
  position: absolute;
  top: 85px;
  left: 289px;
}
/* name-box */
.name-text {
  position: absolute;
  top: 117px;
  left: 179px;
}
.name-text input {
  height: 20px;
  width: 250px;
}
/* trade-box */
.trade-text {
  position: absolute;
  top: 147px;
  left: 150px;
}
.trade-text input {
  height: 20px;
  width: 250px;
}
/* address-text */
.Address-text {
  position: absolute;
  top: 177px;
  left: 105px;
}
.Address-text input {
  height: 20px;
  width: 250px;
}
/* city-text */
.city-text {
  position: absolute;
  top: 225px;
  left: 105px;
}
.city-text input {
  height: 20px;
  width: 225px;
}
/* state-text */
.state-text {
  position: absolute;
  top: 225px;
  left: 355px;
}
.state-text input {
  height: 20px;
  width: 30px;
}
/* zipcode-text */
.zipcode-text {
  position: absolute;
  top: 226px;
  left: 410px;
}
.zipcode-text input {
  height: 20px;
  width: 80px;
}
/* country */
.country {
  position: absolute;
  top: 261px;
  left: 102px;
}
.country input {
  height: 20px;
  width: 100px;
}
/* foreign */
.foreign {
  position: absolute;
  top: 261px;
  left: 277px;
}
.foreign input {
  height: 20px;
  width: 100px;
}
/* postal-code */
.postal-code {
  position: absolute;
  top: 261px;
  left: 410px;
}
.postal-code input {
  height: 20px;
  width: 80px;
}
.typea{
  position: absolute;
  top: 121px;
  left: 543px;
}
.typeb{
  position: absolute;
  top: 145px;
  left: 543px;
}
.typec{
  position: absolute;
  top: 167px;
  left: 543px;
}
.typed{
  position: absolute;
  top: 190px;
  left: 543px;
}
.a1 input ,.a2 input{
  height: 20px;
  width: 20px;
  text-align: center;
}
.a1{
  position: absolute;
  top: 346px;
  left: 583px;
}
.a2{
  position: absolute;
  top: 346px;
  left: 628px;
}
.b1{
  position: absolute;
  top: 378px;
  left: 579px;
}
.b2{
  position: absolute;
  top: 402px;
  left: 579px;
}
.p2-4a{
  position: absolute;
  top: 501px;
  left: 202px;
}
.p2-4b{
  position: absolute;
  top: 517px;
  left: 202px;
}
.p2-4c{
  position: absolute;
  top: 501px;
  left: 395px;
}
.p2-4d{
  position: absolute;
  top: 517px;
  left: 395px;
}
.p2-4e{
  position: absolute;
  top: 501px;
  left: 551px;
}

/* total-emp-payment */
.total-emp-payment {
  position: absolute;
  top: 456px;
  left: 677px;
}
.total-emp-payment input {
  height: 20px;
  width: 80px;
}
/* row5 */
.row5 {
  position: absolute;
  top: 476px;
  left: 498px
}
.row5 input {
  height: 20px;
  width: 80px;
}

/* total-payment */
.total-payment {
  position: absolute;
  top: 550px;
  left: 502px;
}
.total-payment input {
  height: 20px;
  width: 80px;
}
/* subtotal-text */
.subtotal-text {
  position: absolute;
  top: 569px;
  left: 682px;
}
.subtotal-text input {
  height: 20px;
  width: 52px;
}
/* total-taxable-text */
.total-taxable-text {
  position: absolute;
  top: 598px;
  left: 682px;;
}
.total-taxable-text input {
  height: 20px;
  width: 52px;
}
/* row-8 */
.row8 {
  position: absolute;
  top: 631px;
  left: 682px;;
}
.row8 input {
  height: 20px;
  width: 52px;
}
/* row-9 */
.row9 {
  position: absolute;
  top: 684px;
  left: 682px;;
}
.row9 input {
  height: 20px;
  width: 52px;
}
/* row-10 */
.row10 {
  position: absolute;
  top: 723px;
  left: 682px;;
}
.row10 input {
  height: 20px;
  width: 52px;
}
/* row-11 */
.row11 {
  position: absolute;
  top: 750px;
  left: 682px;;
}
.row11 input {
  height: 20px;
  width: 52px;
}
/* row-12 */
.row12 {
  position: absolute;
  top: 794px;
  left: 682px;;
}
.row12 input {
  height: 20px;
  width: 52px;
}
/* row-13 */
.row13 {
  position: absolute;
  top: 825px;
  left: 682px;;
}
.row13 input {
  height: 20px;
  width: 52px;
}
/* row-14 */
.row14 {
  position: absolute;
  top: 875px;
  left: 682px;;
}
.row14 input {
  height: 20px;
  width: 52px;
}
/* row-15 */
.row15 {
  position: absolute;
  top: 905px;
  left: 682px;;
}
.row15 input {
  height: 20px;
  width: 52px;
}
.row15a {
  position: absolute;
  top: 928px;
  left: 508px;;
}
.row15b {
  position: absolute;
  top: 928px;
  left: 627px;

}

/* second-page */
/* ein */
.trade-name {
  position: absolute;
  top: 68px;
  left: 83px;
}
.ein {
  position: absolute;
  top: 73px;
  left: 534px;
}
.ein input {
  height: 20px;
  width: 150px;
}
/* row16a */
.row16a {
  position: absolute;
  top: 153px;
  left: 536px;
}
.row16b {
  position: absolute;
  top: 183px;
   left: 536px;
}
.row16c {
  position: absolute;
  top: 213px;
   left: 536px;
}
.row16d {
  position: absolute;
  top: 243px;
   left: 536px;
}
.row17 {
  position: absolute;
  top: 274px;
   left: 536px;
}
.row17a {
  position: absolute;
  top: 358px;
  left: 332px;
}
.row17b {
  position: absolute;
  top: 358px;
  left: 542px;
}
.p6-a{
  position: absolute;
  top: 364px;
  left: 74px;
}
.p6-b{
  position: absolute;
  top: 416px;
  left: 74px;
}
.p6-c input {
  height: 18px;
  width: 18px;
  text-align: center;
}

.p6-c {
  position: absolute;
  top: 393px;
  left: 546px;

}
.sign {
  position: absolute;
  top: 537px;
  left: 154px;
}
.printname {
  position: absolute;
  top: 527px;
  left: 489px;

}
.printitle {
  position: absolute;
  top: 561px;
  left: 490px;
}
.date {
  position: absolute;
  top: 599px;
  left: 155px;
}
.dayphone {
  position: absolute;
  top: 588px;
  left: 544px;

}
.pre-check{
  position: absolute;
  top: 649px;
  left: 713px;
}
.pre-name {
  position: absolute;
  top: 693px;
  left: 186px;
}
.pre-sign {
  position: absolute;
  top: 732px  ;
    left: 186px;
}
.first-name {
  position: absolute;
  top: 770px;
    left: 186px;
}

.address {
  position: absolute;
  top: 802px;
    left: 186px;
}
.pre-city {
  position: absolute;
  top: 832px;
    left: 186px;
}
.pre-state {
  position: absolute;
  top: 832px;
  left: 391px;
}
.pre-pin {
  position: absolute;
  top: 693px;
  left:570px;
}
.pre-date {
  position: absolute;
  top: 732px;
  left:570px;
}
.pre-ein {
  position: absolute;
  top: 770px;
  left:570px;
}
.pre-phone {
  position: absolute;
  top: 802px;
  left:570px;
}
.pre-zipcode {
  position: absolute;
  top: 832px;
  left:570px;
}

/* third page */
.row1-ein {
  position: absolute;
  bottom: 295px;
  left: 83px;
}
.dollar {
  position: absolute;
  bottom: 311px;
  left: 598px;
}
.cent {
  position: absolute;
  bottom: 311px;
  left: 703px;
}
.busniess-name {
  position: absolute;
  bottom: 273px;
  left: 290px;
}
.b-address {
  position: absolute;
  bottom: 242px;
  left: 290px;
}
.city-state-code {
  position: absolute;
  bottom: 212px;
  left: 290px;
}



  </style>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>



 
</body>
</html>



<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
  
<script>
    async function downloadPagesAsPDF() {
        const elements = [
            document.getElementById('one'),
            document.getElementById('two'),
            document.getElementById('three'),
            document.getElementById('four')


        ];
        // Check if all elements are found
        if (elements.some(element => element === null)) {
            alert('One or more elements not found');
            return;
        }
        const canvases = await Promise.all(elements.map(element =>
            html2canvas(element, { scale: 2 })
        ));
        const pdf = new jspdf.jsPDF({
            orientation: 'p',
            unit: 'px',
            format: [canvases[0].width, canvases[0].height]
        });
        canvases.forEach((canvas, index) => {
            const imgData = canvas.toDataURL('image/jpeg', 1.0);
            if (index > 0) {
                pdf.addPage([canvas.width, canvas.height], 'p');
            }
            pdf.addImage(imgData, 'JPEG', 0, 0, canvas.width, canvas.height);
        });
        pdf.save('F940.pdf');
    }
</script>

