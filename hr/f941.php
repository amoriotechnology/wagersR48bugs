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
    <link rel="stylesheet" href="style.css" />
    <!-- <link rel="stylesheet" href="print.css" /> -->
    <title>Document</title>
  </head>
  <body>
 
<button class="btnclr btn btn-default dropdown-toggle  boxes filip-horizontal mobile_para"  onclick="downloadPagesAsPDF()" style="margin-left:265px;background: white;border: 2px solid black;" ><span  class="fa fa-download"></span>Download </button>

 

<body bgcolor="#A0A0A0" vlink="blue" link="blue"   >
<div id="download"  >


    <div class="container-fluid" id="one">
      <div class="row">
     
      <img src="<?php echo base_url()  ?>asset/images/941_1.jpg"  style="width:99%; margin-top: -2px; "  />
    
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
    $one = '00'; // Example default value
    $two = '0000000'; // Example default value
}
?>

      
      
      <div class="two-digit d-flex gap-3">
       
          <input class="ein-number" value=" <?php echo $one1; ?>" />
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



  
<div class="qq1">
    <?php $isQ1 = ($selectedValue == 'Q1'); ?>
    <input type="checkbox" name="quarter[]" <?php echo $isQ1 ? 'checked' : ''; ?>>
</div>
<div class="qq2">
    <?php $isQ2 = ($selectedValue == 'Q2'); ?>
    <input type="checkbox" name="quarter[]" <?php echo $isQ2 ? 'checked' : ''; ?>>
</div>
<div class="qq3">
    <?php $isQ3 = ($selectedValue == 'Q3'); ?>
    <input type="checkbox" name="quarter[]" <?php echo $isQ3 ? 'checked' : ''; ?>>
</div>
<div class="qq4">
    <?php $isQ4 = ($selectedValue == 'Q4'); ?>
    <input type="checkbox" name="quarter[]" <?php echo $isQ4 ? 'checked' : ''; ?>>
</div>

 
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
          <input type="text" value=" <?php echo $get_address[3]; ?>" />
        </div>
        <div class="country">
          <input type="text" value="" />
        </div>
        <div class="foreign">
          <input type="text" value="" />
        </div>
        <div class="postal-code">
          <input type="text" value="" />
        </div>

 
        
        <div class="row1">
          <input type="text" value="<?php echo $gt[0]['count_rows']; ?>"  style="margin-left: 9px;"/>
        </div>



        
        <?php


$total_amount_sum = '0';
// Check if get_941_sc_info is set and not empty, and add its value to $total_amount_sum
if (isset($get_941_sc_info[0]['salebalanceamount'])) {
    $total_amount_sum += $get_941_sc_info[0]['salebalanceamount'];
}
// Check if $tif is set, then iterate over it and add each total_amount to $total_amount_sum
if (isset($tif)) {
    foreach ($tif as $row) {
        $total_amount_sum += ($row['sum_total_amount']);
       
    }
$total_amount_sum = $total_amount_sum - $get_941_sc_info[0]['salebalanceamount'];
}



 
$amount_partss = explode('.', $total_amount_sum);
// Extract the integer and decimal parts
$integer_parts = isset($amount_partss[0]) ? $amount_partss[0] : '0';
$decimal_parts = isset($amount_partss[1]) ? substr($amount_partss[1], 0, 2) : '00';
?>


    
        <div class="row2">
          <input type="text" value="$<?php echo $integer_parts; ?>"  style="text-align:right;" />
          <input type="text" value="<?php echo $decimal_parts; ?>" />

        </div>


        <?php
$federal_sum = '0';
if (isset($tif)) {
  
     foreach ($tif as $row) {
        $federal_sum += $row['sum_f_tax']; // Add each total_amount to the sum
}
}
$amount_partsf = explode('.', $federal_sum);

// Extract the integer and decimal parts
$integer_part_f = isset($amount_partsf[0]) ? $amount_partsf[0] : '0';
$decimal_part_f = isset($amount_partsf[1]) ? substr($amount_partsf[1], 0, 2) : '00';
?>

        <div class="row3">
          <input type="text" value="$<?php echo $integer_part_f; ?>" style="margin-left: -41px;text-align:right;" />
          <input type="text" value="<?php echo $decimal_part_f; ?>"  style="margin-left: 2px;" />

        </div>



        <div class="row4">
          <input type="checkbox" />
        </div>

        <?php
  
  $amount_parts_s = explode('.', $total_amount_sum);

  // Extract the integer and decimal parts
 $integer_part_s = isset($amount_parts_s[0]) ? $amount_parts_s[0] : '0';
 $decimal_part_s = isset($amount_parts_s[1]) ? substr($amount_parts_s[1],0 ,2) : '00';
 ?>
 



        <div class="row5a">
          <input type="text" value="$<?php echo $integer_part_s; ?>"  style="margin-left: -34px;text-align:right;"  />
          <input type="text" value="<?php echo $decimal_part_s; ?>"  style="    margin-left: 4px;" />
        </div>

          
<?php
$value =$total_amount_sum * 0.124;
 $s = explode('.', $value);
// Extract the integer and decimal parts
$integer = isset($s[0]) ? $s[0] : '0';
$decimal = isset($s[1]) ? substr($s[1],0,2) : '00';
?>    

        <div class="row5a2">
          <input type="text" value="$<?php echo $integer; ?>" style="margin-left: -43px;text-align:right;" />
          <input type="text" value="<?php echo $decimal ; ?>" style="margin-left: 3px;" />



        </div>



 
 
  
        <div class="row5b">
          <input type="text" value="" />
        </div>
        <div class="row5b2">
          <input type="text" value="" />
        </div>

 

                <?php
       
        $amount_partss = explode('.', $total_amount_sum);

        // Extract the integer and decimal parts
        $integer_parts = isset($amount_partss[0]) ? $amount_partss[0] : '0';
        $decimal_parts = isset($amount_partss[1]) ? substr($amount_partss[1], 0, 2) : '00';
        ?>
 

 
    
        <div class="row5c">
          <input type="text" value="$<?php echo $integer_parts; ?>" style="margin-left: -34px;text-align:right;"  />
          <input type="text" value="<?php echo $decimal_parts; ?>"  style="margin-left: 4px;" />

        </div>

                    <?php
            $medicare = '0';
            if (isset($tif)) {
            
                foreach ($tif as $row) {
                    $medicare += $row['sum_m_tax']; // Add each total_amount to the sum
            }
            }
            $amount_parts_m = explode('.', $total_amount_sum);
            // Extract the integer and decimal parts
            $integer_part_m = isset($amount_parts_m[0]) ? $amount_parts_m[0] : '0';
            $decimal_part_m = isset($amount_parts_m[1]) ? substr($amount_parts_m[1],0,2) : '00';
            $medicare_cal=$total_amount_sum *0.029;
            if (strpos($medicare_cal, '.') !== false) {
                // Split the $medicare_cal by dot
                $amount_parts_mcal = explode('.', $medicare_cal);

                // Extract the integer and decimal parts
                $integer_part_mcal = isset($amount_parts_mcal[0]) ? $amount_parts_mcal[0] : '0';
                $decimal_part_mcal = isset($amount_parts_mcal[1]) ? substr($amount_parts_mcal[1],0,2) : '00';
            } else {
                // If $medicare_cal does not contain a dot, set default values
                $integer_part_mcal = $medicare_cal;
                $decimal_part_mcal = '00';
            }
            ?>
 
        <div class="row5c2">
          <input type="text" value="$<?php echo $integer_part_mcal  ; ?>"  style="margin-left: -53px;text-align:right;"  />
          <input type="text" value="<?php echo $decimal_part_mcal  ; ?>" style="margin-left: 4px;" />

        </div>


  
        <div class="row5d">
          <input type="text" value="" />
        </div>
        <div class="row5d2">
          <input type="text" value="" />
        </div>


        <?php
     
    $ssw = $total_amount_sum * 0.124; 
    $mw = $total_amount_sum * 0.029; 
    $gt = $ssw + $mw; // Corrected the missing $ sign

$ovt = explode('.', $gt);
// Extract the integer and decimal parts
$integer_parts = isset($ovt[0]) ? $ovt[0] : '0';
$decimal_parts = isset($ovt[1]) ? substr($ovt[1],0,2) : '00';

 // Use $gt for further operations or output
?> 
   
    
        <div class="row5e">
          <input type="text" value="$<?php echo $integer_parts  ; ?>" style=" margin-left: -44px;text-align:right;"  />
      
          <input type="text" value="<?php echo $decimal_parts  ; ?>" style="margin-left: 5px;" />

        </div>

 

        <div class="row5f">
          <input type="text" value="" />
        </div>



        <?php
$federal_sum = '0';
if (isset($tif)) {
  
     foreach ($tif as $row) {
        $federal_sum += $row['sum_f_tax']; // Add each total_amount to the sum
}
}

$ssw = $total_amount_sum * 0.124; 
$mw = $total_amount_sum * 0.029; 
$gt = $ssw + $mw; // Additional calculations based on total amount sum

$fot = $federal_sum + $gt; // Corrected by adding a semicolon at the end

$fvt = explode('.', $fot);
// Extract the integer and decimal parts
$integer_parts = isset($fvt[0]) ? $fvt[0] : '0';
 $decimal_parts = isset($fvt[1]) ? substr( $fvt[1],0 ,2) : '00';
$final_doller=$integer_parts;
$final_cent= $decimal_parts;

?>
 
        <div class="row6">
          <input type="text" value="$<?php echo $integer_parts; ?>"  style=" margin-left: -147px;text-align:right;" />
          <input type="text" value="<?php echo  $decimal_parts; ?>"   style="margin-left: 5px;" />

       
        </div>



        <div class="row7">
          <input type="text" value=" " />
        </div>
        <div class="row8">
          <input type="text" value=" " />
        </div>
        <div class="row9">
          <input type="text" value=" " />
        </div>

        
    
    
        <div class="row10">
          <input type="text" value="$<?php echo $integer_parts; ?>" style="margin-left: -65px;width: 100px;text-align:right;" />
     
          <input type="text" value="<?php echo $decimal_parts; ?>"  style="margin-left: 5px;" />

        </div>


        <div class="row11">
          <input type="text" value=" " />
        </div>
        <div class="row12">
          <input type="text" value=" " />
        </div>
        <div class="row13">
          <input type="text" value=" " />
        </div>
        <div class="row14">
          <input type="text" value=" " />
        </div>
        <div class="row15">
          <input type="text" value=" " />
        </div>
        <div class="row15a">
          <input type="checkbox" value="" />
        </div>
        <div class="row15b">
          <input type="checkbox" value="" />
        </div>
      </div>
    </div>
    <!-- second-page   -->
    <div class="container-fluid"  id="two" >
      <div class="row">
        <!-- <img src="img/941-2.jpg" alt="" /> -->
        <img src="<?php echo base_url()  ?>asset/images/941_2.jpg"  style="width: 99%"   />

      
        <div class="f41-name">
          <input type="text" value="<?php echo $company_name; ?>" />
        </div>

       
        <div class="f41-ein">
          <input type="text" value="<?php echo $Federal_Pin_Number; ?>" />
        </div>
        <div class="row16a">
          <input type="checkbox" />
        </div>
        <div class="row16b">
          <input type="checkbox" />
        </div>
        <div class="row16c">
          <input type="checkbox" />
        </div>
        <div class="tax-month1">
          <input type="text" value=" " />
        </div>
        <div class="tax-month2">
          <input type="text" value=" " />
        </div>
        <div class="tax-month3">
          <input type="text" value=" " />
        </div>
        <div class="total-quater">
          <input type="text" value="" />
        </div>
        <div class="row17">
          <input type="checkbox" />
        </div>
        <div class="row17a">
          <input type="input" value=" " />
        </div>
        <div class="row18">
          <input type="checkbox" />
        </div>
        <div class="row18a">
          <input type="checkbox" />
        </div>
        <div class="row18b">
          <input type="text" value=" " />
        </div>
        <div class="row18c">
          <input type="text" value=" " />
        </div>
        <div class="row18d">
          <input type="checkbox" />
        </div>
        <div class="row19">
          <input type="text" value="" />
        </div>
        <div class="row19-date">
          <input type="text" value="<?php echo date('m/d/Y'); ?>" />
        </div>
        <div class="row19-name">
          <input type="text" value="<?php echo $company_name; ?>" />
        </div>
        <div class="row19-title">
          <input type="text" value="Admin" />
        </div>
        <div class="row19-day">
          <input type="text" value="<?php echo $mobile; ?>" />
        </div>
        <div class="pre-name">
          <input type="text" value=" " />
        </div>
        <div class="pre-sign">
          <input type="text" value=" " />
        </div>
        <div class="first-name">
          <input type="text" value=" " />
        </div>
        <div class="address">
          <input type="text" value=" " />
        </div>
        <div class="pre-city">
          <input type="text" value=" " name="" id="" />
        </div>
        <div class="pre-state">
          <input type="text" value=" " />
        </div>
        <div class="pre-zipcode">
          <input type="text" value=" " />
        </div>
        <div class="pre-pin">
          <input type="text" value=" " />
        </div>
        <div class="pre-date">
          <input type="text" value=" " />
        </div>
        <div class="pre-ein">
          <input type="text" value=" " />
        </div>
        <div class="pre-phone">
          <input type="text" value=" " />
        </div>
      </div>

     
    </div>
    <div class="container-fluid" id="three" >
      <div class="row">
        <!-- <img src="img/942-3.jpg" alt="" class="f941-img3"> -->
        <img src="<?php echo base_url()  ?>asset/images/941_3.jpg"  style="width: 99%"    />





        <div class="row1-ein">
            <?php  
        

// Extract the first two characters
$first_two_chars = substr($Federal_Pin_Number, 0, 2);

// Extract the remaining characters
$remaining_chars = substr($Federal_Pin_Number, 2);
$remaining_chars = str_replace('-', '', $remaining_chars);
            ?>
            <input type="text" style='font-size:12px;width:25px;' value="<?php  echo $first_two_chars ; ?> " />
             <input type="text" style='font-size:12px;' value="<?php  echo $remaining_chars ; ?> " />
          </div>



          <div class="dollar">
            <input type="text" style='font-size:15px;' value="<?php echo "$".$final_doller; ?>"   />
          </div>
          <div class="cent">
            <input type="text" style=' font-size:15px;' value="<?php echo $final_cent; ?>" />
          </div>
          <div class="busniess-name">
            <input type="text" value=" " />
          </div>
          <div class="b-address">
            <input type="text" value="" />
          </div>
          <div class="city-state-code">
            <input type="text" value=" " />
          </div>






          <div class="q1">
    <?php $isQ1 = ($selectedValue == 'Q1'); ?>
    <input type="radio" name="quarter" <?php echo $isQ1 ? 'checked' : ''; ?> id="q1">
</div>

<div class="q2">
    <?php $isQ2 = ($selectedValue == 'Q2'); ?>
    <input type="radio" name="quarter" <?php echo $isQ2 ? 'checked' : ''; ?> id="q2">
</div>

<div class="q3">
    <?php $isQ3 = ($selectedValue == 'Q3'); ?>
    <input type="radio" name="quarter" <?php echo $isQ3 ? 'checked' : ''; ?> id="q3">
</div>

<div class="q4">
    <?php $isQ4 = ($selectedValue == 'Q4'); ?>
    <input type="radio" name="quarter" <?php echo $isQ4 ? 'checked' : ''; ?> id="q4">
</div>




      </div>
       
    </div>
  </body>
</html>

<style>
    input {
  border: 0;
  /* background-color: #f1f4ff; */
  background-color: transparent;
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
  box-sizing: border-box;
  position: relative;
}

.two-digit {
  position: absolute;
  top: 85px;
  left: 198px;
  font-size: medium;
}
.two-digit-2 {
  position: absolute;
  top: 84px;
  left: 282px;
  font-size: medium;
}
/* name-box */
.name-text {
  position: absolute;
  top: 113px;
  left: 176px;
  font-size: medium;

}
.name-text input {
  height: 20px;
  width: 250px;
  font-size: medium;

}
/* trade-box */
.trade-text {
  position: absolute;
  top: 143px;
  left: 147px;
  font-size: medium;

}
.trade-text input {
  height: 20px;
  width: 250px;
  font-size: medium;

}
/* address-text */
.Address-text {
  position: absolute;
  top: 174px;
  left: 102px;
  font-size: medium;

}
.Address-text input {
  height: 20px;
  width: 250px;
  font-size: medium;

}
/* city-text */
.city-text {
  position: absolute;
  top: 211px;
  left: 102px;
  font-size: medium;

}
.city-text input {
  height: 20px;
  width: 225px;
  font-size: medium;

}
/* state-text */
.state-text {
  position: absolute;
  top: 211px;
  left: 355px;
  font-size: medium;

}
.state-text input {
  height: 20px;
  width: 30px;
  font-size: medium;

}
/* zipcode-text */
.zipcode-text {
  position: absolute;
  top: 211px;
  left: 410px;
  font-size: medium;

}
.zipcode-text input {
  height: 20px;
  width: 80px;
}
/* country */
.country {
  position: absolute;
  top: 249px;
  left: 102px;
}
.country input {
  height: 20px;
  width: 100px;
}
/* foreign */
.foreign {
  position: absolute;
  top: 247px;
  left: 292px;
}
.foreign input {
  height: 20px;
  width: 100px;
}
/* postal-code */
.postal-code {
  position: absolute;
  top: 249px;
  left: 410px;
}
.postal-code input {
  height: 20px;
  width: 80px;
}
.row1 {
  position: absolute;
  top: 370px;
  left: 630px;
  font-size: medium;

}
.row1 input {
  height: 20px;
  width: 80px;
}
.row2 {
  position: absolute;
  top: 397px;
  left: 612px;
  font-size: medium;

}
.row2 input {
  height: 20px;
  width: 80px;
}
.row3 {
  position: absolute;
  top: 424px;
  left: 653px;
  font-size: medium;

}
.row3 input {
  height: 20px;
  width: 80px;
}
.row4 {
  position: absolute;
  top: 446px;
  left: 528px;
}
.row4 input {
  height: 15px;
  width: 80px;
}
.row5a {
  position: absolute;
  top: 489px;
  left: 309px;
  font-size: medium;

}
.row5a input {
  height: 20px;
  width: 80px;
  font-size: medium;

}

.row5a2 {
  position: absolute;
  top: 489px;
  left: 491px;
  font-size: medium;

}
.row5a2 input {
  height: 20px;
  width: 80px;
}
.row5b {
  position: absolute;
  top: 510px;
  left: 321px;
}
.row5b input {
  height: 20px;
  width: 80px;
}
.row5b2 {
  position: absolute;
  top: 510px;
  left: 493px;
}
.row5b2 input {
  height: 20px;
  width: 80px;
}
.row5c {
  position: absolute;
  top: 539px;
  left: 309px;
  font-size: medium;

}
.row5c input {
  height: 20px;
  width: 80px;
}
.row5c2 {
  position: absolute;
  top: 539px;
  left: 500px;
  font-size: medium;

}
.row5c2 input {
  height: 20px;
  width: 80px;
}
.row5d {
  position: absolute;
  top: 568px;
  left: 321px;
  font-size: medium;

}
.row5d input {
  height: 20px;
  width: 80px;
}
.row5d2 {
  position: absolute;
  top: 568px;
  left: 493px;
}
.row5d2 input {
  height: 20px;
  width: 80px;
}
.row5e {
  position: absolute;
  top: 600px;
  left: 655px;
  font-size: medium;

}
.row5e input {
  height: 20px;
  width: 80px;
}
.row5f {
  position: absolute;
  top: 621px;
  left: 655px;
  font-size: medium;

}
.row6 {
  position: absolute;
  top: 653px;
  left: 655px;
  font-size: medium;

}
.row7 {
  position: absolute;
  top: 670px;
  left: 655px;
}
.row8 {
  position: absolute;
  top: 696px;
  left: 655px;
}
.row9 {
  position: absolute;
  top: 721px;
  left: 655px;
}
.row10 {
  position: absolute;
  top: 753px;
  left: 655px;
  font-size: medium;

}
.row11 {
  position: absolute;
  top: 772px;
  left: 655px;
}
.row12 {
  position: absolute;
  top: 796px;
  left: 655px;
}
.row13 {
  position: absolute;
  top: 829px;
  left: 655px;
}
.row14 {
  position: absolute;
  top: 856px;
  left: 655px;
}
.row15 {
  position: absolute;
  top: 882px;
  left: 429px;
}
.row15a {
  position: absolute;
  top: 885px;
  left: 562px;
}
.row15b {
  position: absolute;
  top: 885px;
  left: 653px;
}

/* second-page */
.f41-name {
  position: absolute;
  top: 73px;
  left: 129px;
  font-size: medium;

}
.f41-ein {
  position: absolute;
  top: 75px;
  left: 526px;
  font-size: medium;

}
.row16a {
  position: absolute;
  top: 132px;
  left: 138px;
}
.row16b {
  position: absolute;
  top: 193px;
  left: 138px;
}
.row16c {
  position: absolute;
  top: 336px;
  left: 138px;
}
.tax-month1 {
  position: absolute;
  top: 229px;
  left: 391px;
}
.tax-month2 {
  position: absolute;
  top: 257px;
  left: 391px;
}
.tax-month3 {
  position: absolute;
  top: 284px;
  left: 391px;
}
.total-quater {
  position: absolute;
  top: 311px;
  left: 391px;
}
.row17 {
  position: absolute;
  top: 388px;
  left: 607px;
}
.row17a {
  position: absolute;
  top: 412px;
  left: 267px;
}
.row18 {
  position: absolute;
  top: 441px;
  left: 607px;
}

.row18a {
  position: absolute;
  top: 511px;
  left: 81px;
}
.row18b {
  position: absolute;
  top: 511px;
  left: 333px;
}
.row18c {
  position: absolute;
  top: 511px;
  left: 579px;
}
.row18d {
  position: absolute;
  top: 564px;
  left: 81px;
}
.row19 {
  position: absolute;
  top: 651px;
  left: 156px;
}
.row19-date {
  position: absolute;
  top: 715px;
  left: 148px;
  font-size: medium;

}
.row19-day{
  position: absolute;
  top: 713px;
  left: 545px;
  font-size: medium;

}
.row19-title{
  position: absolute;
  top: 676px;
  left: 503px;
  font-size: medium;


}
.row19-name  {
  position: absolute;
  top: 645px;
  left: 503px;
  font-size: medium;

}


.pre-name{
  position: absolute;
  top: 765px;
  left: 162px;
}
.pre-sign{
  position: absolute;
  top: 794px;
  left: 162px;
}
.first-name{
  position: absolute;
  top: 825px;
  left: 162px;
}

.address{
  position: absolute;
  top: 857px;
  left: 162px;
}
.pre-city{
  position: absolute;
  top: 885px;
  left: 162px;
}
.pre-state{
  position: absolute;
  top: 887px;
  left: 442px;    
}
.pre-pin{
  position: absolute;
  top: 765px;
  left: 566px;
}
.pre-date{
  position: absolute;
  top: 794px;
  left: 566px;
}
.pre-ein{
  position: absolute;
  top: 825px;
  left: 566px;
}
.pre-phone{
  position: absolute;
  top: 857px;
  left: 566px;
}
.pre-zipcode{
  position: absolute;
  top: 885px; 
  left: 566px;
}
.row1-ein{
  position: absolute;
  bottom: 329px;
  left: 83px
}
/* third-page */

.cent {
  position: absolute;
  bottom: 330px;
  left: 690px;
}
.row1-ein{
  position: absolute;
  bottom: 329px;
  left: 83px
}
.dollar{
  position: absolute;
  bottom: 330px;
  left: 589px;
}
.busniess-name{
  position: absolute;
  bottom: 297px;
  left: 290px;
}
.b-address{
  position: absolute;
  bottom: 266px;
  left: 290px;
}
.city-state-code{
  position: absolute;
  bottom: 235px;
  left: 290px;
}
.q1{
  position: absolute;
  bottom: 284px;
  left: 65px;
}
.q2{
  position: absolute;
  bottom: 244px;
  left: 65px;
}
.q3{
  position: absolute;
  bottom: 282px;
  left: 173px;
}
.q4{
  position: absolute;
  bottom: 244px;
  left: 173px;
}

@page {
  size: A4;
  margin: 0;
}
@media print {
  .container-fluid {
    width: 32cm !important;
    height: 30cm !important;
    margin: 0;
    position: relative;
  }
  .two-digit {
    top: 135px;
    left: 300px;
  }
  .two-digit-2 {
    top: 135px;
    left: 430px;
  }
  .ein-number {
    width: 25px;
    height: 25px;
  }
  .second-value {
    margin-left: 15px;
  }
  input {
    border: 0;
    background-color: transparent !important;
  }
  input.ein-number {
    border: 0 !important;
    background-color: transparent !important;
  }
  .name-text {
    position: absolute;
    top: 180px;
    left: 266px;
  }
  .name-text input {
    height: 20px;
    width: 250px;
  }
  .print-check {
    margin-left: 35px !important;
  }
  .print-check-2 {
    margin-left: 35px !important;
  }
  .print-check-3 {
    margin-left: 30px !important;
  }
  .print-check-4 {
    margin-left: 30px !important;
  }
  .print-check-5 {
    margin-left: 30px !important;
  }
  .print-check-6 {
    margin-left: 30px !important;
  }
  /* trade-box */
  .trade-text {
    position: absolute;
    top: 225px;
    left: 225px;
  }
  .trade-text input {
    height: 20px;
    width: 250px;
  }
  /* address-text */
  .Address-text {
    position: absolute;
    top: 273px;
    left: 160px;
  }
  .Address-text input {
    height: 20px;
    width: 250px;
  }
  /* city-text */
  .city-text {
    position: absolute;
    top: 330px;
    left: 160px;
  }
  .city-text input {
    height: 20px;
    width: 225px;
  }
  /* state-text */
  .state-text {
    position: absolute;
    top: 330px;
    left: 550px;
  }
  .state-text input {
    height: 20px;
    width: 30px;
  }
  /* zipcode-text */
  .zipcode-text {
    position: absolute;
    top: 330px;
    left: 650px;
  }
  .zipcode-text input {
    height: 20px;
    width: 80px;
  }
  /* country */
  .country {
    position: absolute;
    top: 390px;
    left: 160px;
  }
  .country input {
    height: 20px;
    width: 100px;
  }
  /* foreign */
  .foreign {
    position: absolute;
    top: 390px;
    left: 450px;
  }
  .foreign input {
    height: 20px;
    width: 100px;
  }
  /* postal-code */
  .postal-code {
    position: absolute;
    top: 390px;
    left: 650px;
  }
  .postal-code input {
    height: 20px;
    width: 80px;
  }
  .row1 {
    position: absolute;
    top: 570px;
    left: 990px;
  }
  .row1 input {
    height: 20px;
    width: 80px;
  }
  .row2 {
    position: absolute;
    top: 618px;
    left: 1030px;
  }
  .row2 input {
    height: 20px;
    width: 80px;
  }
  .row3 {
    position: absolute;
    top: 655px;
    left: 1040px;
  }
  .row3 input {
    height: 20px;
    width: 80px;
  }
  .row4 {
    position: absolute;
    top: 692px;
    left: 835px;
  }
  .row4 input {
    height: 20px;
    width: 80px;
  }

  .row5a {
    position: absolute;
    top: 755px;
    left: 515px;
  }
  .row5a input {
    height: 20px;
    width: 80px;
  }

  .row5a2 {
    position: absolute;
    top: 755px;
    left: 780px;
  }
  .row5a2 input {
    height: 20px;
    width: 80px;
  }

  .row5b {
    position: absolute;
    top: 795px;
    left: 515px;
  }
  .row5b input {
    height: 20px;
    width: 80px;
  }
  .row5b2 {
    position: absolute;
    top: 795px;
    left: 780px;
  }
  .row5b2 input {
    height: 20px;
    width: 80px;
  }

  .row5c {
    position: absolute;
    top: 835px;
    left: 515px;
  }
  .row5c input {
    height: 20px;
    width: 80px;
  }
  .row5c2 {
    position: absolute;
    top: 835px;
    left: 498px;
  }
  .row5c2 input {
    height: 20px;
    width: 80px;
  }

  .row5d {
    position: absolute;
    top: 885px;
    left: 515px;
  }
  .row5d input {
    height: 20px;
    width: 80px;
  }
  .row5d2 {
    position: absolute;
    top: 885px;
    left: 780px;
  }
  .row5d2 input {
    height: 20px;
    width: 80px;
  }
  .row5e {
    position: absolute;
    top: 927px;
    left: 1030px;
  }
  .row5f {
    position: absolute;
    top: 964px;
    left: 1030px;
  }
  .row6 {
    position: absolute;
    top: 1004px;
    left: 1030px;
  }
  .row7 {
    position: absolute;
    top: 1044px;
    left: 1030px;
  }
  .row8 {
    position: absolute;
    top: 1084px;
    left: 1030px;
  }
  .row9 {
    position: absolute;
    top: 1124px;
    left: 1030px;
  }
  .row10 {
    position: absolute;
    top: 1164px;
    left: 1030px;
  }
  .row11 {
    position: absolute;
    top: 1200px;
    left: 1030px;
  }
  .row12 {
    position: absolute;
    top: 1240px;
    left: 1030px;
  }
  .row13 {
    position: absolute;
    top: 1290px;
    left: 1030px;
  }
  .row14 {
    position: absolute;
    top: 1330px;
    left: 1030px;
  }
  .row15 {
    position: absolute;
    top: 1370px;
    left: 681px;
  }
  .row15a {
    position: absolute;
    top: 1370px;
    left: 865px;
  }
  .row15a input {
    height: 25px;
    width: 25px;
  }

  .row15b {
    position: absolute;
    top: 1370px;
    left: 998px;
  }
  .row15b input {
    height: 25px;
    width: 25px;
  }
  /* second-page */
  .f41-name {
    position: absolute;
    top: 110px;
    left: 129px;
  }
  .f41-ein {
    position: absolute;
    top: 110px;
    left: 785px;
  }
  .row16a {
    position: absolute;
    top: 209px;
    left: 213px;
  }
  .row16a input {
    height: 25px;
    width: 20px;
  }

  .row16b {
    position: absolute;
    top: 298px;
    left: 213px;
  }
  .row16b input {
    height: 25px;
    width: 20px;
  }
  .row16c {
    position: absolute;
    top: 520px;
    left: 213px;
  }
  .row16c input {
    height: 25px;
    width: 20px;
  }

  .tax-month1 {
    position: absolute;
    top: 363px;
    left: 617px;
  }
  .tax-month2 {
    position: absolute;
    top: 405px;
    left: 617px;
  }
  .tax-month3 {
    position: absolute;
    top: 445px;
    left: 617px;
  }
  .total-quater {
    position: absolute;
    top: 487px;
    left: 617px;
  }
  .row17 {
    position: absolute;
    top: 520px;
    left: 213px;
  }
  .row17 input {
    height: 25px;
    width: 20px;
  }
  .row17 {
    position: absolute;
    top: 600px;
    left: 933px;
  }
  .row17a {
    position: absolute;
    top: 640px;
    left: 425px;
  }
  .row18 {
    position: absolute;
    top: 685px;
    left: 933px;
  }
  .row18 input {
    height: 25px;
    width: 20px;
  }
  .row18a {
    position: absolute;
    top: 790px;
    left: 127px;
  }
  .row18a input {
    height: 25px;
    width: 20px;
  }
  .row18b {
    position: absolute;
    top: 790px;
    left: 550px;
  }
  .row18c {
    position: absolute;
    top: 790px;
    left: 900px;
  }
  .row18d {
    position: absolute;
    top: 872px;
    left: 127px;
  }
  .row18d input {
    height: 25px;
    width: 20px;
  }

  .row19 {
    position: absolute;
    top: 1008px;
    left: 225px;
  }
  .row19-date {
    position: absolute;
    top: 1095px;
    left: 232px;
  }
  .row19-day {
    position: absolute;
    top: 1095px;
    left: 850px;
  }
  .row19-title {
    position: absolute;

    top: 1036px;
    left: 770px;
  }
  .row19-name {
    position: absolute;
    top: 990px;
    left: 770px;
  }




  .pre-name{
    position: absolute;
    top: 1185px;
    left: 250px;
}
.pre-sign{
    position: absolute;
    top: 1235px;
    left: 250px;
}
.first-name{
    position: absolute;
    top: 1280px;
    left: 250px;
}
.address{
    position: absolute;
    top: 1325px;
    left: 250px;
}
.pre-city{
    position: absolute;
    top: 1370px;
    left: 250px;
}
.pre-state{
    position: absolute;
    top: 1370px;
    left: 691px;
}
.pre-zipcode{
    position: absolute;
    top: 1370px;  
    left: 891px;
}
.pre-pin{
    position: absolute;
    top: 1185px;
    left: 870px;
}
.pre-date{
    position: absolute;
    top: 1235px;
    left: 870px;
}
.pre-ein{
  position: absolute;
  top: 1280px;
  left: 870px;
}
.pre-phone{
  position: absolute;
  top: 1325px;
  left: 870px;
}
/* third-poage */
.row1-ein{
  position: absolute;
  bottom: -80px;
  left: 120px
}
.dollar{
  position: absolute;
  bottom: -80px;
  left: 900px
}
.cent{
  position: absolute;
  bottom: -80px;
  left: 1080px
}
.busniess-name{
  position: absolute;
  bottom: -130px;
  left: 440px
}
.b-address{
  position: absolute;
  bottom: -180px;
  left: 440px
}
.city-state-code{
  position: absolute;
  bottom: -225px;
  left: 440px
}
.q1{
  position: absolute;
  bottom: -158px;
  left: 100px
}
.q1 input{
  height: 25px;
  width: 20px;
}
.q2{
  position: absolute;
  bottom: -220px;
  left: 100px
}
.q3{
  position: absolute;
  bottom: -160px;
  left: 265px;
}
.q4{
  position: absolute;
  bottom: -220px;
  left: 265px;
}
.q2 input{
  height: 25px;
  width: 20px;
}.q3 input{
  height: 25px;
  width: 20px;
}.q4 input{
  height: 25px;
  width: 20px;
}
 
}
.qq1 input, .qq2 input ,.qq3 input ,.qq4 input{
    height:15px;
    width:20px


}
.qq1{
    position: absolute;
    top: 115px;
    left: 531px;
}
.qq2{
    position: absolute;
    top: 136px;
    left: 531px;
}
.qq3{
    position: absolute;
    top: 156px;
    left: 531px;
}
.qq4{
    position: absolute;
    top: 177px;
    left: 531px;
}

</style>




<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
  
<script>
    async function downloadPagesAsPDF() {
        const elements = [
            document.getElementById('one'),
            document.getElementById('two'),
            document.getElementById('three'),

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
        pdf.save('F941.pdf');
    }
</script>


 