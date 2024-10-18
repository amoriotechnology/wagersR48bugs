<html>
  <head>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>

  <button class="btnclr btn btn-default dropdown-toggle  boxes filip-horizontal mobile_para"  onclick="downloadPagesAsPDF()" style="margin-left:250px;" ><span  class="fa fa-download"></span>Download </button>

  <!-- <button class="btnclr btn btn-default dropdown-toggle  boxes filip-horizontal mobile_para"  onclick="downloadPagesAsPDF()">Download PDF</button> -->

  <body bgcolor="#A0A0A0" vlink="blue" link="blue"   >
<div id="download"  >

 

<div class="a4-size"  id="one"  >
      <div class="f927-img1"  >
        <!-- <img src="img/f927_1.jpg" alt="" width="100%" /> -->
        <img src="<?php echo base_url()  ?>asset/images/f927_1.jpg"  width="100%"   />

     
     
      </div>
      <div class="fein">
      
        <input type="text"  value="<?php echo $get_cominfo[0]["State_Tax_ID_Number"];?>"  />
   
      </div>
      <div class="business-name">
        <input type="text" value="<?php echo $get_cominfo[0]['company_name'];?>" />
      </div>
      <div class="yr">
        <input type="text" value="<?php 
                  if ($info_for_nj[0]['quarter'] == 'Q1') {
                      echo '1';
                  } elseif ($info_for_nj[0]['quarter'] == 'Q2') {
                      echo '2';
                  } elseif ($info_for_nj[0]['quarter'] == 'Q3') {
                      echo '3';
                  } elseif ($info_for_nj[0]['quarter'] == 'Q4') {
                      echo '4';
                  } else {
                       echo 'Unknown';
                  }
              ?> / <?php echo date('Y'); ?>" />
      </div>

      <?php
if ($info_for_nj[0]['quarter'] == 'Q1') {
$quarter_end_date = date('Y-m-d', strtotime('last day of March'));
} elseif ($info_for_nj[0]['quarter'] == 'Q2') {
$quarter_end_date = date('Y-m-d', strtotime('last day of June'));
} elseif ($info_for_nj[0]['quarter'] == 'Q3') {
$quarter_end_date = date('Y-m-d', strtotime('last day of September'));
} elseif ($info_for_nj[0]['quarter'] == 'Q4') {
$quarter_end_date = date('Y-m-d', strtotime('last day of December'));
} else {
$quarter_end_date = 'Unknown';
}
?>


      <div class="quater-ending-date">
        <input type="text" value="<?php echo $quarter_end_date; ?>" />
      </div>
      <div class="Date-fleid">
        <input type="text" value="" />
      </div>


      <?php
// Define an array for quarter end dates
$quarter_end_dates = [
    'Q1' => 'last day of March',
    'Q2' => 'last day of June',
    'Q3' => 'last day of September',
    'Q4' => 'last day of December'
];

// Check if the quarter is defined and exists in the array
if (isset($info_for_nj[0]['quarter']) && array_key_exists($info_for_nj[0]['quarter'], $quarter_end_dates)) {
    // Get the quarter end date
    $quarter_end_date = new DateTime($quarter_end_dates[$info_for_nj[0]['quarter']]);
    
    // Modify the quarter end date to get the return due date (adding 30 days)
    $return_due_date = $quarter_end_date->modify('+30 days')->format('Y-m-d');

    // Output quarter end date and return due date
    // echo "Quarter End Date: " . $quarter_end_date->format('Y-m-d') . "\n";
    // echo "Return Due Date: " . $return_due_date . "\n";
} else {
    // Quarter not defined or not recognized
  //  echo "Quarter not defined or not recognized.\n";
}
?>


      <div class="return-due">
        <input type="text" value="<?php echo $return_due_date; ?>" />
      </div>


 
      <?php
if ($info_for_nj[0]['extra_thisrate'] == 'Q1') {
    $quarter_end_date = date('Y-m-d', strtotime('last day of March'));
    $return_due_date = date('Y-m-d', strtotime('+45 days', strtotime($quarter_end_date)));
} elseif ($info_for_nj[0]['extra_thisrate'] == 'Q2') {
    $quarter_end_date = date('Y-m-d', strtotime('last day of June'));
    $return_due_date = date('Y-m-d', strtotime('+45 days', strtotime($quarter_end_date)));
} elseif ($info_for_nj[0]['extra_thisrate'] == 'Q3') {
    $quarter_end_date = date('Y-m-d', strtotime('last day of September'));
    $return_due_date = date('Y-m-d', strtotime('+45 days', strtotime($quarter_end_date)));
} elseif ($info_for_nj[0]['extra_thisrate'] == 'Q4') {
    $quarter_end_date = date('Y-m-d', strtotime('last day of December'));
    $return_due_date = date('Y-m-d', strtotime('+45 days', strtotime($quarter_end_date)));
} else {
    $quarter_end_date = 'Unknown';
    $return_due_date = 'Unknown';
}
?>

   



<div class="git-mon1">
    <?php if ($info_for_nj[0]['quarter'] == 'Q1') { ?>
        <input type="text" value="$<?php echo ($fristmonth[0]['hourly_amount'] + $fristmonth[0]['weekly_amount'] + $fristmonth[0]['biweekly_amount'] + $fristmonth[0]['monthly_amount']); ?>" />

        <?php } elseif ($info_for_nj[0]['quarter'] == 'Q2') { ?>
          <input type="text" value="$<?php echo ($fourth[0]['hourly_amount'] + $fourth[0]['weekly_amount'] + $fourth[0]['biweekly_amount'] + $fourth[0]['monthly_amount']); ?>" />
 
    <?php } elseif ($info_for_nj[0]['quarter'] == 'Q3') { ?>

      <input type="text" value="$<?php echo ($seventh[0]['hourly_amount'] + $seventh[0]['weekly_amount'] + $seventh[0]['biweekly_amount'] + $seventh[0]['monthly_amount']); ?>" />

    <?php } else { ?>
        <input type="text" value="$<?php echo ($tenth[0]['hourly_amount'] + $tenth[0]['weekly_amount'] + $tenth[0]['biweekly_amount'] + $tenth[0]['monthly_amount']); ?>" />

        <?php } ?>
</div>

 

      <div class="git-mon2">
        <!-- <input type="text" value="$000.00" /> -->
 <?php if ($info_for_nj[0]['quarter'] == 'Q1') { ?>
        <input type="text" value="$<?php echo ($secondmonth[0]['hourly_amount'] + $secondmonth[0]['weekly_amount'] + $secondmonth[0]['biweekly_amount'] + $secondmonth[0]['monthly_amount']); ?>" />
    <?php } elseif ($info_for_nj[0]['quarter'] == 'Q2') { ?>
        <input type="text" value="$<?php echo ($fifth[0]['hourly_amount'] + $fifth[0]['weekly_amount'] + $fifth[0]['biweekly_amount'] + $fifth[0]['monthly_amount']); ?>" />
    <?php } elseif ($info_for_nj[0]['quarter'] == 'Q3') { ?>
        <input type="text" value="$<?php echo ($eigth[0]['hourly_amount'] + $eigth[0]['weekly_amount'] + $eigth[0]['biweekly_amount'] + $eigth[0]['monthly_amount']); ?>" />
    <?php } else { ?>
        <input type="text" value="$<?php echo ($eleventh[0]['hourly_amount'] + $eleventh[0]['weekly_amount'] + $eleventh[0]['biweekly_amount'] + $eleventh[0]['monthly_amount']); ?>" />
    <?php } ?>
    </div>

 
      <div class="git-mon3">
        <!-- <input type="text" value="$000.00" /> -->
        <?php if ($info_for_nj[0]['quarter'] == 'Q1') { ?>
          <input type="text" value="$<?php echo ($thirdmonth[0]['hourly_amount'] + $thirdmonth[0]['weekly_amount'] + $thirdmonth[0]['biweekly_amount'] + $thirdmonth[0]['monthly_amount']); ?>" />
    <?php } elseif ($info_for_nj[0]['quarter'] == 'Q2') { ?>
      <input type="text" value="$<?php echo ($sixth[0]['hourly_amount'] + $sixth[0]['weekly_amount'] + $sixth[0]['biweekly_amount'] + $sixth[0]['monthly_amount']); ?>" />

    <?php } elseif ($info_for_nj[0]['quarter'] == 'Q3') { ?>
        <input type="text" value="$<?php echo ($ninth[0]['hourly_amount'] + $ninth[0]['weekly_amount'] + $ninth[0]['biweekly_amount'] + $ninth[0]['monthly_amount']); ?>" />

  
        <?php } else { ?>
          <input type="text" value="$<?php echo ($twelfth[0]['hourly_amount'] + $twelfth[0]['weekly_amount'] + $twelfth[0]['biweekly_amount'] + $twelfth[0]['monthly_amount']); ?>" />

    <?php } ?>

      </div>


 

      <div class="e1">
        <input type="text" value="$<?php echo  round( $info_for_nj[0]['OverallTotal'] , 2 );   ?>" />
      </div>


      <div class="e2">
        <input type="text" value="$<?php echo round($income_tax[0]['hourly_amount'] + $income_tax[0]['weekly_amount'] + $income_tax[0]['biweekly_amount'] + $income_tax[0]['monthly_amount']  ,2); ?>" />
      </div>




      <div class="e3">
        <input type="text" value="$0" />
      </div>
      <div class="e3a">
        <input type="text" value="$0" />
      </div>
      <div class="e4">
        <input type="text" value="$0" />
      </div>
      <div class="e5">
        <input type="text" value="$0" />
      </div>
      <div class="e5a">
        <input type="text" value="$0" />
      </div>
      <div class="e6">
        <input type="text" value="$0" />
      </div>








      <div class="e7">
      <?php
if ($info_for_nj[0]['quarter'] == 'Q1') {
    echo '<input type="text" value="' . $month['monthone_count'] . '" />';
} elseif ($info_for_nj[0]['quarter'] == 'Q2') {
    echo '<input type="text" value="' . $month['monthfour_count'] . '" />';
} elseif ($info_for_nj[0]['quarter'] == 'Q3') {
    echo '<input type="text" value="' . $month['monthseven_count'] . '" />';
} else {
    echo '<input type="text" value="' . $month['monthten_count'] . '" />';
}
?>

      </div>



      <div class="e7b">
         <?php
if ($info_for_nj[0]['quarter'] == 'Q1') {
    echo '<input type="text" value="' . $month['monthtwo_count'] . '" />';
} elseif ($info_for_nj[0]['quarter'] == 'Q2') {
    echo '<input type="text" value="' . $month['monthfive_count'] . '" />';
} elseif ($info_for_nj[0]['quarter'] == 'Q3') {
    echo '<input type="text" value="' . $month['montheight_count'] . '" />';
} else {
    echo '<input type="text" value="' . $month['montheleven_count'] . '" />';
}
?>
      </div>



      <div class="e7c">
     
        <?php
if ($info_for_nj[0]['quarter'] == 'Q1') {
    echo '<input type="text" value="' . $month['monththree_count'] . '" />';
} elseif ($info_for_nj[0]['quarter'] == 'Q2') {
    echo '<input type="text" value="' . $month['monthsix_count'] . '" />';
} elseif ($info_for_nj[0]['quarter'] == 'Q3') {
    echo '<input type="text" value="' . $month['monthnine_count'] . '" />';
} else {
    echo '<input type="text" value="' . $month['monthtwelve_count'] . '" />';
}
?>
    
    </div>

 
    </div>






    <div class="page-2"  id="two"  >
      <div class="f927-img2"  >
         <img src="<?php echo base_url()  ?>asset/images/f927_2.jpg"  width="100%"   />
 
      </div>
      <div class="e8">
       
       
       
        <!--<input type="text" value="$<?php //echo  $info_for_nj[0]['OverallTotal'] + $info_info_for_salescommssion_data[0]['SaleOverallTotal'] ?>" />-->
     
             <input type="text" value="$<?php echo  round($info_for_nj[0]['OverallTotal'] ,2);  ?>" />

      </div>
      <div class="e9">
        <input type="text" value="$0" />
      </div>
     

      <div class="e10">
        <input type="text" value="$<?php echo  round($info_for_nj[0]['OverallTotal']  ,2); ?>" />
      </div>
      <div class="e11">
        <input type="text" value="$<?php echo  round($info_for_nj[0]['OverallTotal']  ,2); ?>" />
      </div>
      <div class="e12">
        <input type="text" value="$<?php echo  round($info_for_nj[0]['OverallTotal']  ,2); ?>" />
      </div>

    
    <?php
if(isset($info_for_nj[0]['OverallTotal'])  ) {
    // Check if both keys exist
    $overallTotal = floatval($info_for_nj[0]['OverallTotal']);
    $saleOverallTotal = floatval($info_info_for_salescommssion_data[0]['SaleOverallTotal']);
    
    if(is_numeric($overallTotal)  ) {
        
            // if(is_numeric($overallTotal) && is_numeric($saleOverallTotal)) {
        // Perform calculation only if values are numeric
        // $ulandwf = ($overallTotal + $saleOverallTotal) * 0.038250;
        $ulandwf = $overallTotal * 0.038250;

        // Format output if needed
        $formattedValue = number_format($ulandwf, 2); // Formats to 2 decimal places
        echo "$formattedValue";
    } else {
       // echo "One of the values is not numeric.";
    }
} else {
    // echo "OverallTotal or SaleOverallTotal key is not set in the array element.";
}
?>



      <div class="e13">
        <input type="text" value="$<?php echo round($ulandwf,2); ?>" />
      </div>




      
<?php
if(isset($info_for_nj[0]['OverallTotal'])  ) {
    // Check if both keys exist
    $overallTotal = floatval($info_for_nj[0]['OverallTotal']);
    $saleOverallTotal = floatval($info_info_for_salescommssion_data[0]['SaleOverallTotal']);
    
    if(is_numeric($overallTotal)  ) {
        // Perform calculation only if values are numeric
        // $ulandwf2 = ($overallTotal + $saleOverallTotal) * 0.005;
        $ulandwf2 =  $overallTotal   * 0.005;

        // Format output if needed
        $formattedValue = number_format($ulandwf2, 2); // Formats to 2 decimal places
        echo "$formattedValue";
    } else {
        // echo "One of the values is not numeric.";
    }
} else {
    // echo "OverallTotal or SaleOverallTotal key is not set in the array element.";
}
?>
 
      <div class="e14">
        <input type="text" value="$<?php echo round($ulandwf2,2); ?>" />
      </div>




    
<?php
if(isset($info_for_nj[0]['OverallTotal'])  ) {
    // Check if both keys exist
    $overallTotal = floatval($info_for_nj[0]['OverallTotal']);
    $saleOverallTotal = floatval($info_info_for_salescommssion_data[0]['SaleOverallTotal']);
    
    if(is_numeric($overallTotal)  ) {
        // Perform calculation only if values are numeric
        // $ulandwf3 = ($overallTotal + $saleOverallTotal) * 0.000900;
        
        $ulandwf3 = $overallTotal  * 0.000900;

        
        // Format output if needed
        $formattedValue = number_format($ulandwf3, 2); // Formats to 2 decimal places
        echo "$formattedValue";
    } else {
        //echo "One of the values is not numeric.";
    }
} else {
   // echo "OverallTotal or SaleOverallTotal key is not set in the array element.";
}
?>


 

      <div class="e15">
        <input type="text" value="$<?php echo round($ulandwf3,2); ?>" />
      </div>

      <?php
if (isset($ulandwf) && isset($ulandwf2) && isset($ulandwf3)) {
    $sum = $ulandwf + $ulandwf2 + $ulandwf3;
} else {
   // echo "One or more of the variables (ulandwf, ulandwf2, ulandwf3) are not defined.";
}
?> 



      <div class="e16">
        <input type="text" value="$0" />
      </div>
      <div class="e16a">
        <input type="text" value="$0" />
      </div>
      <div class="e17">
        <input type="text" value="$<?php echo round($sum,2); ?>" />
      </div>
      <div class="e18">
        <input type="text" value="$0" />
      </div>
      <div class="e19">
        <input type="text" value="$0" />
      </div>
      <div class="e20">
        <input type="text" value="$0" />
      </div>
      <div class="e20a">
        <input type="text" value="$0" />
      </div>
     


      <div class="e20b">
        <input type="text" value="$ <?php echo round($sum,2); ?>" />
      </div>
      <div class="e20c">
        <input type="text" value="$ <?php echo round($sum,2); ?>" />
      </div>

    


      <div class="e21a">
        <input type="text" value="$0" />
      </div>
      <div class="e21b">
        <input type="text" value="$0" />
      </div>
      <div class="e21c">
        <input type="text" value="$0" />
      </div>

      <img src="<?php echo base_url()  ?>asset/images/f927_3.png" style="position:absolute;top:850px;left:105px;"     />


    </div>

 

  </body>

 
  <style>
    /* .a4-size  {
  width: 24cm;
} */
    .a4-size,
    .page-2 {
      width: 21cm;
      height: 29.7cm;
      position: relative;
      margin: 0 auto;
      page-break-after: always;
    }
    /* .page-2{
    width: 24cm;
} */
    input {
      border: 0;
      /* background-color: #f1f4ff; */
      background-color: transparent;
    }
    .f927-img1 {
      position: relative;
    }
    .f927-img2 {
      position: relative;
    }
    .fein {
      position: absolute;
      top: 201px;
      left: 238px;
    }
    .business-name {
      position: absolute;
      top: 233px;
      left: 238px;
    }
    .yr {
      position: absolute;
      top: 201px;
      left: 569px;
    }
    .quater-ending-date {
      position: absolute;
      top: 279px;
      left: 236px;
    }
    .Date-fleid {
      position: absolute;
      top: 300px;
      left: 229px;
    }
    .return-due {
      position: absolute;
      top: 280px;
      left: 570px;
    }
    .git-mon1 {
      position: absolute;
      top: 488px;
      left: 391px;
    }
    .git-mon2 {
      position: absolute;
      top: 488px;
      left: 522px;
    }
    .git-mon3 {
      position: absolute;
      top: 488px;
      left: 644px;
    }
    .e1 {
      position: absolute;
      top: 630px;
      left: 393px;
    }
    .e2 {
      position: absolute;
      top: 663px;
      left: 393px;
    }
    .e3 {
      position: absolute;
      top: 695px;
      left: 393px;
    }
    .e3a {
      position: absolute;
      top: 694px;
      left: 636px;
    }
    .e4 {
      position: absolute;
      top: 726px;
      left: 393px;
    }
    .e5 {
      position: absolute;
      top: 764px;
      left: 393px;
    }
    .e5a {
      position: absolute;
      top: 762px;
      left: 636px;
    }
    .e6 {
      position: absolute;
      top: 796px;
      left: 393px;
    }
    .e7 {
      position: absolute;
      top: 1000px;
      left: 393px;
    }
    .e7b {
      position: absolute;
      top: 1000px;
      left: 525px;
    }
    .e7c {
      position: absolute;
      top: 1000px;
      left: 648px;
    }
    .e8 {
      position: absolute;
      top: 111px;
      left: 393px;
    }
    .e9 {
      position: absolute;
      top: 142px;
      left: 393px;
    }
    .e10 {
      position: absolute;
      top: 175px;
      left: 393px;
    }
    .e11 {
      position: absolute;
       top: 208px;
      left: 393px;
    }
    .e12 {
      position: absolute;
       top: 239px;
      left: 393px;
    }
    .e13 {
      position: absolute;
       top: 273px;
      left: 393px;
    }
    .e14 {
      position: absolute;
       top: 305px;
      left: 393px;
    }
    .e15 {
      position: absolute;
       top: 337px;
      left: 393px;
    }
    .e16 {
      position: absolute;
      top: 370px;
      left: 393px;
    }
    .e16a {
      position: absolute;
      top: 371px;
    left: 642px;
    }
    .e17 {
      position: absolute;
      top: 401px;
      left: 393px;
    }
    .e18 {
      position: absolute;
      top: 434px;
      left: 393px;
    }
    .e19 {
      position: absolute;
      top: 522px;
    left: 650px;
    }
    /* .e20 {
      position: absolute;
       top: 370px;
      left: 744px;
    } */
    .e20 {
      position: absolute;
      top: 575px;
    left: 653px;
    }
    .e20a {
      position: absolute;
      top: 770px;
    left: 328px;
    }
    .e20b {
      position: absolute;
      top: 770px;
    left: 480px ;
    }
    .e20c {
      position: absolute;
      top: 770px;
    left: 634px;
    }
    .e21a {
      position: absolute;
      top: 799px;
    left: 328px;
    }
    .e21b {
      position: absolute;
      top: 799px;
      left: 480px ;
    }
    .e21c {
      position: absolute;
      top: 799px;
      left: 634px;
    }
  </style>
</html>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
  
<!-- <script>
async function downloadPagesAsPDF() {
// debugger;

  const element1 = document.getElementById('one');
  const element2 = document.getElementById('two');
  
  if (!element1 || !element2) {
      alert('One or more elements not found');
      return;
  }

  const canvas1 = await html2canvas(element1, { scale: 2 });
  const canvas2 = await html2canvas(element2, { scale: 2 });

  const imgData1 = canvas1.toDataURL('image/jpeg', 1.0);
  const imgData2 = canvas2.toDataURL('image/jpeg', 1.0);

  const pdf = new jspdf.jsPDF({
      orientation: 'p',
      unit: 'px',
      format: [canvas1.width, canvas1.height]
  });

  pdf.addImage(imgData1, 'JPEG', 0, 0, canvas1.width, canvas1.height);
  pdf.addPage([canvas2.width, canvas2.height], 'p');
  pdf.addImage(imgData2, 'JPEG', 0, 0, canvas2.width, canvas2.height);

  pdf.save('NJ927.pdf');
}

</script> -->

<script>
    async function downloadPagesAsPDF() {
        const elements = [
            document.getElementById('one'),
            document.getElementById('two'),
 
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
        pdf.save('NJ927.pdf');
    }
</script>