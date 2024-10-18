<script src="https://cdn.jsdelivr.net/npm/number-to-words"></script>
<style>
   th,td{
      padding:2px;
      font-size:12px;
   }
   #content {
	margin: 0px auto;

	padding: 35px;
	position: relative;
	/*width: 590px;*/
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
  tr, .avoid-page-break {
  page-break-inside: avoid;
}
   #download{
   margin-left: 830px;
   }
   th{
   background-color:<?php echo '#'.$color; ?>;
   }
   .payTop_details p{
   display: inline-block;
   }
   .payTop_details span{
   display: block;
   }
   .Employee_details {
   text-align: center;
   margin: auto;
   }
   .Employee_details p {
   margin-bottom: 0;
   }
   .proposedWork.pay_table h3 {
   font-size: 18px;
   text-align: left;
   font-weight: 600;
   margin: 5px 0 0;
   }
   .proposedWork.pay_table p {
   margin: 0;
   height: 36px;
   }
   .proposedWork.pay_table hr {
   margin: 5px;
   border-top: 1px solid #4b4b4b;
   }
   .amount_word,
.custom-row {
    display: inline-block;
}
.r {

   text-align:center;
}
</style>
<div class="content-wrapper">
<section class="content-header" style="height:70px;">
   <div class="header-icon">
      <i class="pe-7s-note2"></i>
   </div>
   <div class="header-title">
      <h1>Employee Payslip</h1>
      <small></small>
      <ol class="breadcrumb">
         <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
         <li><a href="#">Payslip</a></li>
         <li class="active">Add Employee Payslip</li>
      </ol>
   </div>
</section>
<section class="content">
   <div class="row">
      <!--  table area -->
      <div class="col-sm-12">
         <div class="panel panel-default thumbnail">
            <?php
               $arr=preg_split("/\s+(?=\S*+$)/",$address);
               
               ?>
            <div class="panel-body">
               <?php   if($template==1){ ?>
               <p align="right">  <a id="download" style="color:white;background-color:#38469f;" class='btn btn-primary'> <i class="fa fa-download"></i><?php echo display('Download') ?></a>  
                  <a id="mange" style="color:white;background-color:#38469f;" href="<?php  echo  base_url()  ?>/Chrm/pay_slip_list"  class='btn btn-primary'><?php echo "Manage Pay Slip" ?></a>  
               </p>
               <div  id="content" style="margin-left:12px;padding:10px;">
                  <div class="row" style="padding:0px;width:780px;">
                     <div class="col-md-12 col-sm-12 top_section" style="height:268px;display: flex; justify-content: center; border: 2px solid #8c99ae; display: none;" id="downloadLink">
                        <div class="second_section" style="width: 100%;">
                           <p ></p>
                        
                       
                        <?php
$fs=strtoupper($infoemployee[0]['first_name']);


?>

      <div class="r"><p style="padding-left:430px;margin-top: 50px;"><?php echo date("m-d-Y") ?></p></div>

                       
                       <div class="r" style="height:23px;">
    <p style="width: 385px;margin-top: 53px;  display: block;"><?php echo $fs .' '.strtoupper($infoemployee[0]['middle_name']).' '.  strtoupper($infoemployee[0]['last_name']); ?></p>
    
</div>
        
                         <div class="r amount_word" style="width: 535px;float:center"></div>
<div class="custom-row net_period" style="float:right"></div>
                     
                        </div>
                     </div>
                     <div class="separator" id="separator_line" style="border: 1px solid #8c99ae !important;display: none;">
                        <div style='border: 1px solid rgb(140, 153, 174) !important;height: 322px;' class="sep-line mt-10 mb-15 res-991-mtb-20"></div>
                     </div>
                  </div>
                  
                  
                  
                  
                  
                  
                  <br/>
                  <?php // print_r($infoemployee); ?>
                  <div class="payTop_details row">
          
                     <div class="col-md-6">
                        <p style='font-size:12px;'>
                           <strong style='font-size:18px;'><?php echo $business_name; ?></strong><br> 
                           <?php  echo $arr[0]." ".$arr[1]; ?><br>  
                          <!--<?php //echo $arr[0]; ?><br> -->
                          <!--<?php //echo $arr[1]; ?><br> -->

                          Email : <?php echo $email; ?><br>
                          Tel :<?php echo " ".$phone; ?>
                             </p>
                         
                        
                     </div>
                      <div class="col-md-6" >
                        <p style='float:right;font-size:12px;'>
                           <strong style='font-size:18px;'><?php echo isset($infoemployee[0]['first_name']) ? $infoemployee[0]['first_name'] . " " : ""; ?>
<?php echo isset($infoemployee[0]['middle_name']) ? $infoemployee[0]['middle_name'] . " " : ""; ?>
<?php echo isset($infoemployee[0]['last_name']) ? $infoemployee[0]['last_name'] : ""; ?></strong><br> 
                       <?php 
                       
                   
                              
         echo htmlspecialchars($infoemployee[0]['address_line_1']) . ' ' . 
         htmlspecialchars($infoemployee[0]['city']) . ' ' . 
         htmlspecialchars($infoemployee[0]['zip']);
                              
                              
                              ?> 
                              <br/>
                              
                               
                              
                             <span style="display: inline-block; ">Designation : <?php echo $infotime[0]['job_title']; ?></span>
                             <br/>
                         
                              <span style="display: inline-block; ">Employee ID : <?php echo $infoemployee[0]['id']; ?></span>
 
                        </p>
                     </div>

                
                 
                     <div class="col-md-12" style="float:center;">
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
                        </style>
                        <table class="table" style='margin-bottom:0px;' >
                           <!-- <tr style="outline: thin solid" rowspan="6">
                              <?php if ($sc) { ?>  
                              <th colspan="7">Earnings</th>
                              <?php } else { ?>  
                              <th colspan="6">Earnings</th>
                              <?php  }  ?> 
                           </tr> -->
                           <tr>
                              <th style='font-size:12px;'>EARNINGS</th>
                              <!-- <th>HRS/ UNITS</th> -->

                              <th>

                       

                              <?php 
                              if (
                                 $infoemployee[0]['payroll_type'] == 'Salaried-weekly' || 
                                 $infoemployee[0]['payroll_type'] == 'Salaried-BiWeekly' || 
                                 $infoemployee[0]['payroll_type'] == 'Salaried-Monthly' || 
                                 $infoemployee[0]['payroll_type'] == 'Salaried-BiMonthly'
                              ) {
                                 echo 'DAYS';
                              } else {
                                 echo 'HRS/ UNITS';
                              }
                              ?>
                           </th>

 

                               <th>RATE</th>
 
                              
                              <?php if ($sc) { ?>  
                              <th style='font-size:12px;'>SALES COMMISSION</th>
                              <?php  }    ?>
                              
                              
                              
                              <th>THIS PERIOD(<?php  echo $currency; ?>)</th>
                              <!--<th>YTD HOURS</th>-->
                              
                              
                                          <th>
                                 <?php 
                                 if (
                                    $infoemployee[0]['payroll_type'] == 'Salaried-weekly' || 
                                    $infoemployee[0]['payroll_type'] == 'Salaried-BiWeekly' || 
                                    $infoemployee[0]['payroll_type'] == 'Salaried-Monthly' || 
                                    $infoemployee[0]['payroll_type'] == 'Salaried-BiMonthly'
                                 ) {
                                    echo 'YTD DAYS';
                                 } else {
                                    echo 'HRS/HOURS';
                                 }
                                 ?>
                              </th>
                                                            
                              
                              
                              
                              <th>YTD(<?php  echo $currency; ?>)</th>
                           </tr>
                           
                          <?php if ($extra_hour): ?>
 
     
    
                              <tr>
                                 <td>Salary</td>
                                 <td><?php echo $above_extra_beforehours; ?></td>
                                 <td><?php echo $above_extra_rate; ?></td>
                                 <?php if ($sc): ?>
                                    <td><?php echo round($sc,2); ?></td>
                                 <?php endif; ?>
                                 <td id="total_period"><?php echo round($above_extra_sum + $sc,2) ; ?></td>
                                    <td style="display:none;" id="total_period"><?php echo $aboveytd; ?></td>
                                 <td><?php echo ($above_eth); ?></td>
                                 <td  id="total_ytd"><?php echo round ($above_ytdeth, 2); ?></td>
                                 <td style="display:none;" id="total_ytd"><?php echo $sum_above; ?></td>
                              </tr>
                              
                              
     
                              
                           <?php else: ?>
                              <tr>
                                 <?php  if ($jt == 'Sales Partner') { ?>  <td>Sales Partner</td>  <?php   }else  { ?> <td>Sales Commission</td>    <?php  }   ?>
                                 <td><?php echo $infotime[0]['total_hours']; ?></td>
                                 <td><?php echo $hrate; ?></td>
                                 <?php if ($sc): ?>
                                       <td><?php echo $sc; ?></td>
                                 <?php endif; ?>
                                 <td id="total_period"><?php if($partner_total){ echo $partner_total; } else{ echo $total; } ?></td>
                                 <td><?php echo round($overalltotalhours, 2); ?></td>
                                 <?php  if ($jt == 'Sales Partner') { ?>
                                                            <td id="total_ytd"> <?php if($partner){ echo $partner; } else{  echo round($overalltotalamount, 2); }  ?></td>
                                                            <?php  } else{ ?>
                           <td id="total_ytd"><?php  echo round($partner, 2); ?></td>
                                                               <?php  }  ?>

                              
                              </tr>
                           <?php endif; ?>


 




 <?php if ($infoemployee[0]['payroll_type'] == 'Hourly'  ) { ?>

 <tr>
<td>Over Time</td>
            <td>
            <?php 
            if ($infotime[0]['total_hours'] > $data_work_hour) {
                echo $extra_hour;
            } else {
                echo '0';
            } 
            ?>
          </td>
<td >
    <?php 
            if ($infotime[0]['total_hours'] > $data_work_hour) {
                echo $extra_rate;
            } else {
                echo '0';
            } 
            ?>
</td>
 <?php if ($sc): ?>
         <td> </td>
        <?php endif; ?>
<td id="above_over_this_period" >
    <?php 
            if ($infotime[0]['total_hours'] > $data_work_hour) {
                echo $extra_thisrate;
            } else {
                echo '0';
            } 
            ?>
</td>
<td >
    <?php 
            if ($infotime[0]['total_hours'] > $data_work_hour) {
                echo $extra_eth;
            } else {
                echo '0';
            } 
            ?>
</td>
<td id="final_over_ytd" >
    <?php 
                 if ($extra_ytdeth) {
                  echo $extra_ytdeth;
              } else {
                  echo '0';
              } 
            ?>
</td>
 </tr>
 
 <?php }?>

 
 
  



 
<?php if ($infotime[0]['total_hours'] <= $data_work_hour ) { ?>
       
          
          <tr>
         <th><strong>TOTAL :</strong></th>
         <th> <?php echo $above_extra_beforehours; ?>  </th>
         <th></th>
         <?php if ($sc): ?>
            <th><?php echo round($sc,2); ?></th>
         <?php endif; ?>
         <th><?php echo round($above_extra_sum + $sc,2); ?></th>
         <th><?php echo ($above_eth); ?></th>
        
        <th>
             <?php if($partner){ echo $partner; } 
             
             else if($above_ytdeth >0)
             
             {  echo round($above_ytdeth, 2)  + $extra_ytdeth   ; }
             
          
            else{ echo round($overalltotalamount, 2); }  ?>     
            
            </th>
             
         </tr>
         
          
         
         
         <?php } else {?>
            <tr>
         <th><strong>TOTAL :</strong></td>
         <th> <?php 
         list($hours1, $minutes1) = explode(':', $above_extra_beforehours);
list($hours2, $minutes2) = explode(':', $extra_hour);

$totalMinutes = ($hours1 * 60 + $minutes1) + ($hours2 * 60 + $minutes2);
$finalHours = floor($totalMinutes / 60);
$finalMinutes = $totalMinutes % 60;

$result = sprintf('%02d:%02d', $finalHours, $finalMinutes);
         echo $result ; ?>  </th>
         <th></th>
         <?php if ($sc): ?>
            <th>  </th>
         <?php endif; ?>
 

         <th><?php echo $above_extra_sum + $extra_thisrate + $sc; ?></th>
       <th><?php 
      list($hours1, $minutes1) = explode(':', $above_eth);
$totalMinutes1 = ($hours1 * 60) + $minutes1;

list($hours2, $minutes2) = explode(':', $extra_eth);
$totalMinutes2 = ($hours2 * 60) + $minutes2;

// Sum the total minutes
$totalMinutes = $totalMinutes1 + $totalMinutes2;

// Convert back to hours and minutes
$hours = floor($totalMinutes / 60);
$minutes = $totalMinutes % 60;

// Format the result as hours:minutes
$total_time = sprintf('%d:%02d', $hours, $minutes);
      echo $total_time ; ?></th>
         <th><?php echo round ($above_ytdeth, 3) + $extra_ytdeth ; ?></th>
      
         </tr>
         
         
         
          
         <?php } ?>
                           
                         
                        </table>
                     </div>
                     
                   
           
                    <div class="col-md-12">
                       
                        <div class="col-sm-8">
                         
                           <table class="withholding avoid-page-break table" id="table" style="margin: 8px; FONT-SIZE:10PX; width: 100%; ">
                              <tr style="outline: thin solid" rowspan="6">
                                 <th colspan="4">WITHHOLDINGS</th>
                              </tr>
                              <tr>
                                 <th style="text-align:left;">DESCRIPTION</th>
                                 <th>FILING STATUS</th>
                                 <th>THIS PERIOD(<?php  echo $currency; ?>)</th>
                                 <th>YTD(<?php  echo $currency; ?>)</th>
                              </tr>

                       

                         <?php if ($infoemployee[0]['payroll_type'] == 'Hourly'  ||  $infoemployee[0]['payroll_type'] == 'Salaried-weekly'  ||  $infoemployee[0]['payroll_type'] == 'Salaried-BiWeekly'  || $infoemployee[0]['payroll_type'] == 'Salaried-Monthly'  ||  $infoemployee[0]['payroll_type'] == 'SalesCommission' ) { ?>
                            
                             
                        
                           <?php if($s){?>
                              <tr>
                                 <td style="text-align:left;"> Social Security</td>
                                 <td>S O</td>
                                 <td class="current"><?php if($s){ echo "-".round($s,3);  } ?></td>
                                 <td class="ytd"><?php if($t_s_tax){ echo round($t_s_tax,3); } ?></td>
                              </tr>
                              <?php  } ?>
                              <?php if($m){ ?>
                              <tr>
                                 <td style="text-align:left;">Medicare</td>
                                 <td>SMCU O</td>
                                 <td class="current"><?php if($m){echo  "-".round($m,3); }  ?></td>
                                 <td class="ytd"><?php if($t_m_tax){echo round($t_m_tax,3);  } ?></td>
                              </tr>
                              <?php  } ?>
                              <?php  }    ?>
                              <?php if($f){ ?>
                              <tr>
                                 <td style="text-align:left;">Fed Income Tax</td>
                                 <td></td>
                                 <td class="current"><?php if($f){echo "-".round($f,3); } ?></td>
                                 <td class="ytd"><?php if($t_f_tax){echo round($t_f_tax,3);  } ?></td>
                              </tr>
                              <?php  } ?>
                              <?php if($u){ ?>
                              <tr>
                                 <td style="text-align:left;">Unemployment Tax</td>
                                 <td></td>
                                 <td class="current"><?php if($u){echo "-".round($u,3); } ?></td>
                                 <td class="ytd"><?php if($t_u_tax){echo round($t_u_tax,3); } ?></td>
                              </tr>


                              <?php  }?>
                             
  

                              <?php if (!empty($selected_state_tax)) { ?>
<?php if ($hourly || $weekly ||  $biweekly){  ?>
   
   
<?php //if ($infoemployee[0]['payroll_type'] == 'Hourly'  ||  $infoemployee[0]['payroll_type'] == 'SalesCommission' || $infoemployee[0]['sales_partner'] == 'Sales_Partner' ) { ?>

<tr>
    <td style="text-align:left;">New Jersey-Income tax</td>
    <td></td>
    <td class="current"><?php echo "-" . $hourly; ?></td>
    <td class="ytd"><?php echo round($OVhourly, 2); ?>
</td>
</tr>



<?php }//} ?>

<?php }else{ ?>
<?php foreach ($selected_state_tax as $k => $v) { ?>
    <?php if ($v) { 
        $split = explode('-', $k);
        $title = str_replace("'employee_", '', $split[0]);
        $rep = str_replace("'", '', $split[1]);
        $rep2 = isset($split[2]) ? str_replace("'", '', $split[2]) : '';
    ?>
        <tr class="avoid-page-break">
            <td style="border: none;"></td>
            <td style="border: none;"></td>
            <td style="border: none;"></td>
            <td style="border: none;"></td>
            <td title="<?php echo "Working State Tax - " . $title; ?>" style="text-align:left; border: none;">
                <?php echo $title ? $rep2 . '-' . $rep : $rep; ?>
            </td>
            <td style="text-align:left; border: none;" class="current">
                <?php echo "-" . round($v, 3); ?>
            </td>
            <td style="text-align:left; border: none;" class="ytd">
                <?php echo round($selected_state_sum[$rep], 3); ?>
            </td>
        </tr>
    <?php }?>
<?php }}?>

 


<?php  foreach($selected_state_tax as $k=>$v){
                                 if($v){
                                 $split=explode('-',$k);
                                   $title=str_replace("'employee_",'',$split[0]);
                                 $rep=str_replace("'",'',$split[1]);
                                 $rep2='';
                                 if($split[2]){
                                 $rep2=str_replace("'",'',$split[2]);
                                 }
                                 ?>
                              <tr>
                                 <td title="<?php   echo "Working State Tax - ".$title; ?>" style="text-align:left;"><?php if($rep2){echo $title.'-'.$rep;}else {echo $rep;}  ?></td>
                                 <td></td>
                                 <td class="current">  <?php echo "-".round($v,3); ?></td>
                                 <td class="ytd"><?php echo round($selected_state_sum[$rep],3); ?></td>
                              </tr>
                              <?php  } }?>   




 


 


                              <?php foreach($selected_local_tax as $k=>$v){
                                 if($v){
                                 $split=explode('-',$k);
                                   $title=str_replace("'employee_",'',$split[0]);
                                 $rep=str_replace("'",'',$split[1]);
                                 $rep2='';
                                 if($split[2]){
                                 $rep2=str_replace("'",'',$split[2]);
                                 }
                                 ?>
                              <tr>
                                 <td title="<?php   echo "Working Local Tax - ".$title; ?>" style="text-align:left;"><?php if($rep2){echo $title.'-'.$rep;}else {echo $rep;}  ?></td>
                                 <td></td>
                                 <td class="current">  <?php echo "-".round($v,3); ?></td>
                                 <td class="ytd"><?php echo round($selected_local_sum[$rep],3); ?></td>
                              </tr>
                              <?php  } } ?> 
                               <?php foreach($working_county_tax as $k=>$v){
                                 if($v){
                                 $split=explode('-',$k);
                                   $title=str_replace("'employee_",'',$split[0]);
                                 $rep=str_replace("'",'',$split[1]);
                                 $rep2='';
                                 if($split[2]){
                                 $rep2=str_replace("'",'',$split[2]);
                                 }
                                 ?>
                              <tr>
                                 <td title="<?php   echo "Working County Tax - ".$title; ?>" style="text-align:left;"><?php if($rep2){echo $title.'-'.$rep;}else {echo $rep;}  ?></td>
                                 <td></td>
                                 <td class="current">  <?php echo "-".round($v,3); ?></td>
                                 <td class="ytd"><?php echo round($working_county_sum[$rep],3); ?></td>
                              </tr>
                              <?php  } } ?> 
                               <?php foreach($other_working_tax as $k=>$v){
                                 if($v){
                                 $split=explode('-',$k);
                                   $title=str_replace("'employee_",'',$split[0]);
                                 $rep=str_replace("'",'',$split[1]);
                                 $rep2='';
                                 if($split[2]){
                                 $rep2=str_replace("'",'',$split[2]);
                                 }
                                 ?>
                              <tr>
                                 <td title="<?php   echo "Other Working Tax - ".$title; ?>" style="text-align:left;"><?php if($rep2){echo $title.'-'.$rep;}else {echo $rep;}  ?></td>
                                 <td></td>
                                 <td class="current">  <?php echo "-".round($v,3); ?></td>
                                 <td class="ytd"><?php echo round($other_working_sum[$rep],3); ?></td>
                              </tr>
                              <?php  } } ?> 
                                 <?php foreach($selected_living_state_tax as $k=>$v){
                                 if($v){
                                 $split=explode('-',$k);
                                   $title=str_replace("'employee_",'',$split[0]);
                                 $rep=str_replace("'",'',$split[1]);
                                 $rep2='';
                                 if($split[2]){
                                 $rep2=str_replace("'",'',$split[2]);
                                 }
                                 ?>
                              <tr>
                                 <td title="<?php   echo "Living State Tax - ".$title; ?>" style="text-align:left;"><?php if($rep2){echo $title.'-'.$rep;}else {echo $rep;}  ?></td>
                                 <td></td>
                                 <td class="current">  <?php echo "-".round($v,3); ?></td>
                                 <td class="ytd"><?php echo round($selected_living_state_sum[$rep],3); ?></td>
                              </tr>
                              <?php  } } ?> 
                                    <?php foreach($living_local_tax as $k=>$v){
                                 if($v){
                                 $split=explode('-',$k);
                                   $title=str_replace("'employee_",'',$split[0]);
                                 $rep=str_replace("'",'',$split[1]);
                                 $rep2='';
                                 if($split[2]){
                                 $rep2=str_replace("'",'',$split[2]);
                                 }
                                 ?>
                              <tr>
                                 <td title="<?php   echo "Living Local Tax - ".$title; ?>" style="text-align:left;"><?php if($rep2){echo $title.'-'.$rep;}else {echo $rep;}  ?></td>
                                 <td></td>
                                 <td class="current">  <?php echo "-".round($v,3); ?></td>
                                 <td class="ytd"><?php echo round($living_local_sum[$rep],3); ?></td>
                              </tr>
                              <?php  } } ?>
                                         <?php foreach($living_county_tax as $k=>$v){
                                 if($v){
                                 $split=explode('-',$k);
                                   $title=str_replace("'employee_",'',$split[0]);
                                 $rep=str_replace("'",'',$split[1]);
                                 $rep2='';
                                 if($split[2]){
                                 $rep2=str_replace("'",'',$split[2]);
                                 }
                                 ?>
                              <tr>
                                 <td title="<?php   echo "Living County Tax - ".$title; ?>" style="text-align:left;"><?php if($rep2){echo $title.'-'.$rep;}else {echo $rep;}  ?></td>
                                 <td></td>
                                 <td class="current">  <?php echo "-".round($v,3); ?></td>
                                 <td class="ytd"><?php echo round($living_county_sum[$rep],3); ?></td>
                              </tr>
                              <?php  } } ?>
                                <?php foreach($other_tax as $k=>$v){
                                 if($v){
                                 $split=explode('-',$k);
                                  $title=str_replace("'employee_",'',$split[0]);
                                 $rep=str_replace("'",'',$split[1]);
                                 $rep2='';
                                 if($split[2]){
                                 $rep2=str_replace("'",'',$split[2]);
                                 }
                                 ?>
                              <tr>
                                 <td title="<?php   echo "Other Tax - ".$title; ?>" style="text-align:left;"><?php if($rep2){echo $title.'-'.$rep;}else {echo $rep;}  ?></td>
                                 <td></td>
                                 <td class="current">  <?php echo "-".round($v,3); ?></td>
                                 <td class="ytd"><?php echo round($other_tax_sum[$rep],3); ?></td>
                              </tr>
                              <?php  } } ?> 
                              <tr class="avoid-page-break">
                                 <td></td>
                                 <td></td>
                                 <td style="border-top: groove;" id="Total_current"></td>
                                 <td style="border-top: groove;" id="Total_ytd"></td>
                              </tr>
                           </table>
                            
                             </div>
                           
                   <div class="col-sm-4">
                          <table style="outline: thin solid; font-size: 10px;margin: 8px;" class="table">
  
    <tr style="text-align: left;">
     <td colspan="2">
            <span style="font-weight: bold; display: inline-block;">SOCIAL SECURITY NUM : </span>
            <?php
           $phone_number = $infoemployee[0]['social_security_number'];

// Check if the phone number is at least 4 digits long
if (strlen($phone_number) >= 4) {
    // Extract the last four digits
    $last_four_digits = substr($phone_number, -4);

    // Replace the last four digits with "XXXX"
    $masked_number = substr_replace($phone_number, str_repeat("X", 4), -4);

  
    echo $masked_number;
}
            // $new =substr_replace($infoemployee[0]['social_security_number'], 'XXXX', 0, 4) ;
            // echo $new;
            ?>
        </td>
                              </tr>

         <tr style="text-align: left;">
     <td colspan="2">
            <span style="font-weight: bold; display: inline-block;">PAY PERIOD : </span>
            <br/>
            <?php
           echo $infotime[0]['month'];
            ?>
        </td>
                              </tr>
      
    <!-- <tr>
        <td colspan="2">
            <span style="font-weight: bold; display: inline-block; ">PAY PERIOD : </span>
            <?php echo $infotime[0]['month']; ?>
        </td>
    </tr> -->
</table>

                    <table class="proposedWork pay_table table" style='margin-top:-10px;' id="price">
                              <tr  style="outline: thin solid">
                                 <td id='forcolor' style=" color:white;font-weight:bold; background-color: <?php  echo '#'.$color; ?>" colspan='2' >PAYMENT INFORMATION</td>
                              </tr>
                              <tr style="text-align:left;">
                                 <td style="font-weight:bold;width:20%;">Authorized Name</td>
                                 <td style="width: 60%;"><?php echo $adm_name[0]['adm_name']; ?></td>
                              </tr>
                              <tr style="text-align:left;">
                                 <td style="font-weight:bold;width:20%;">Title</td>
                                 <td style="width: 60%;">Admin</td>
                              </tr>
                              <tr style="text-align:left;">
                                 <td style="font-weight:bold;width:20%;">Admin ID</td>
                                 <td style="width: 60%;"><?php echo $adm_name[0]['adm_id']; ?></td>
                              </tr>
                              <?php if(!empty($infotime[0]['cheque_date'])) { ?>
                              <tr style="text-align:left;">
                                 <td style="font-weight:bold;width:20%;">Chq Date</td>
                                 <td style="width: 60%;"><?php echo $infotime[0]['cheque_date']; ?></td>
                              </tr>
                              <tr style="text-align:left;">
                                 <td style="font-weight:bold;width:20%;">Chq No</td>
                                 <td style="width: 60%;"><?php echo $infotime[0]['cheque_no']; ?></td>
                              </tr>
                              <?php } else if(!empty($infotime[0]['bank_name'])){ ?>
                              <tr style="text-align:left;">
                                 <td style="font-weight:bold;width:20%;">Bank Name</td>
                                 <td style="width: 60%;"><?php echo $infotime[0]['bank_name']; ?></td>
                              </tr> 
                              <!-- ref1 -->

                              <tr style="text-align:left;">
                                 <td style="font-weight:bold;width:20%;">Ref No</td>
                                 <td style="width: 60%;"><?php echo $infotime[0]['payment_ref_no']; ?></td>
                              </tr>
                              <?php } else{?>
                               <tr style="text-align:left;">
                                 <td style="font-weight:bold;width:20%;">Payment Method</td>
                                 <td style="width: 60%;"><?php echo 'CASH'; ?></td>
                              </tr>
                              
                              <?php  }  ?>
                           </table>
                              <table class="table">
                              <tr style="outline: thin solid" rowspan="3">
                                 <th colspan="3">NET PAY ALLOCATION</th>
                              </tr>
                              <tr>
                                 <th style="text-align:left;"><strong>DESCRIPTION</strong></th>
                                 <th><strong>THIS PERIOD(<?php  echo $currency; ?>)</strong></th>
                                 <th><strong>YTD(<?php  echo $currency; ?>)</strong></th>
                              </tr>
                              <tr>
                                 <td style="text-align:left;"><strong>Check Amount</strong></td>
                              
                              
                              <td class="net_period"> <strong style="
                                    padding-top: 2px;">765.10</strong></td>





                                 <td class="net_ytd"></td>
                              </tr>
                              <tr>
                                 <td style="text-align:left;"><strong>Chkg 404</strong></td>
                                 <td>0.00</td>
                                 <td>0.00</td>
                              </tr>
                              <tr>
                                 <td style="text-align:left;"><strong>NET PAY</strong></td>
                                 <td class="net_period" style="font-weight:bold;border-top: groove;"></td>
                                 <td class="net_ytd" style="font-weight:bold;border-top: groove;"></td>
                              </tr>
                           </table>



						   </div>
						     
                     </div>
						  
                  </div>
                  </div>
               </div>  </div>
               <script>
                  function capitalize(str) {
    return str.charAt(0).toUpperCase() + str.slice(1);
}
                  $(document).ready(function(){

                     debugger;

                  var sum=0;
                   var currency = '<?php echo $currency; ?>';
                  
                  $('.table').find('.current').each(function() {
                  var v=$(this).html();
                  sum += parseFloat(v);
                  
                  });
                  $('#Total_current').html(sum.toFixed(2));
                  var sum_ytd=0;
                  
                  $('.table').find('.ytd').each(function() {
                  var v=$(this).html();
                  sum_ytd += parseFloat(v);
                  });
                  
             
                  
                      $('#Total_ytd').html(sum_ytd.toFixed(2));

                 debugger;

                 var totalPeriodText = $('#total_period').text();
var aboveOverThisPeriodText = $('#above_over_this_period').text();

// Check if aboveOverThisPeriodText is not a valid number (NaN) and set it to zero
if (isNaN(parseFloat(aboveOverThisPeriodText))) {
    aboveOverThisPeriodText = "0";
}

var taxDeductionPeriodWise = parseFloat($('#Total_current').text());

var period_wise_total = 0;

if (!isNaN(totalPeriodText) && !isNaN(aboveOverThisPeriodText)) {
    period_wise_total = parseFloat(totalPeriodText) + parseFloat(aboveOverThisPeriodText);
} else {
    console.log("One or both values are not valid numbers.");
}

var net_period = period_wise_total + taxDeductionPeriodWise;
var final_ab_ytd=parseFloat($('#final_over_ytd').text());
      if(final_ab_ytd){
         final_ab_ytd=final_ab_ytd; 
      }else{
         final_ab_ytd=0; 
      }
                   console.log(net_period); 
                   var ytd_wise_total=parseFloat($('#total_ytd').text());
                   var tax_deduction_ytd_wise=parseFloat($('#Total_ytd').text());
                   var net_ytd=ytd_wise_total-tax_deduction_ytd_wise;
                   
                   var final_ytd=(ytd_wise_total+final_ab_ytd);
                   var fytd=final_ytd-tax_deduction_ytd_wise;
                   $('.net_ytd').html(fytd.toFixed(2));
                   $('#Total_ytd').html(sum_ytd.toFixed(2));
                   var period_wise_total=$('#total_period').text();
                   var tax_deduction_period_wise=$('#Total_current').text();
                   tax_deduction_period_wise = tax_deduction_period_wise.replace(/-/g, '');
                   //var net_period=+period_wise_total-tax_deduction_period_wise;
                   $('.net_period').html("$"+net_period.toFixed(2));
                  
                  
                  
                  
                  
                  
                  
                  

                  var currencyMap = {
                        '$': 'Dollars',
                        '€': 'Euros',
                        '£': 'Pounds',
                    };
                    
                    var currencyWords = currencyMap[currency] || 'Unknown';
                    var ytd_wise_total = parseFloat($('#total_ytd').html());
                    var tax_deduction_ytd_wise = parseFloat($('#Total_ytd').html());
                   // var net_ytd = ytd_wise_total - tax_deduction_ytd_wise;
                    
                    // Keep only 2 decimal places for currency calculations
                    var amount = net_period.toFixed(2);
                    
                    var sanitizedAmount = amount.replace(/[,.]/g, '');
                    var numericAmount = parseFloat(sanitizedAmount);
                    
                    var dollars = Math.floor(numericAmount / 100);
                    var cents = Math.round(numericAmount % 100);
                    
                    var dollarsWords = numberToWords.toWords(dollars);
                    var centsWords = numberToWords.toWords(cents);
                    
                    dollarsWords = dollarsWords.charAt(0).toUpperCase() + dollarsWords.slice(1);
                    centsWords = centsWords.charAt(0).toUpperCase() + centsWords.slice(1);
                    
                    var formattedAmount = '';
                    
                   if (dollars > 0) {
    formattedAmount = dollarsWords + ' ';
    formattedAmount = formattedAmount.charAt(0).toUpperCase() + formattedAmount.slice(1);
}

if (cents > 0) {
    if (dollars > 0) {
        formattedAmount += ' and ';
    }
    formattedAmount += cents + '/100 ' + currencyWords + ' Only';
}

// Capitalize the first letter of formattedAmount after all modifications
formattedAmount = formattedAmount.charAt(0).toUpperCase() + formattedAmount.slice(1);


                    // $('.net_ytd').html(net_ytd.toFixed(2));
                     $('.amount_word').html(formattedAmount);
                  
                  
                    });
                       $(document).ready(function(){
                       var currency = '<?php echo $currency; ?>'
                //  debugger;
                    

                    var currencyMap = {
                        '$': 'Dollars',
                        '€': 'Euros',
                        '£': 'Pounds',
                    };
                    
                    var currencyWords = currencyMap[currency] || 'Unknown';
                    var ytd_wise_total = parseFloat($('#total_ytd').html());
                    var tax_deduction_ytd_wise = parseFloat($('#Total_ytd').html());
                    var net_ytd = ytd_wise_total - tax_deduction_ytd_wise;
                    
                    // Keep only 2 decimal places for currency calculations
                    var amount = net_period.toFixed(2);
                    
                    var sanitizedAmount = amount.replace(/[,.]/g, '');
                    var numericAmount = parseFloat(sanitizedAmount);
                    
                    var dollars = Math.floor(numericAmount / 100);
                    var cents = Math.round(numericAmount % 100);
                    
                    var dollarsWords = numberToWords.toWords(dollars);
                    var centsWords = numberToWords.toWords(cents);
                    
                    dollarsWords = dollarsWords.charAt(0).toUpperCase() + dollarsWords.slice(1);
                    centsWords = centsWords.charAt(0).toUpperCase() + centsWords.slice(1);
                    
                    var formattedAmount = '';
                    
                    if (dollars > 0) {
                        formattedAmount = dollarsWords + ' ' + currencyWords;
                    }
                    
                    if (cents > 0) {
                        if (dollars > 0) {
                            formattedAmount += ' and ';
                        }
                        formattedAmount += centsWords + ' Cents Only';
                    }


                        
                      $('.net_ytd').html(net_ytd.toFixed(2));
                      $('.amount_word').html(formattedAmount);
                      const currentElement = document.querySelector('.current');

// Get the current value without the minus sign
const value = currentElement.textContent.trim();

// Update the content of the element to visually show the minus sign
currentElement.textContent = '-' + value;
                  });
                  
                  
                  
                  
                  
                  function readURL(input, imgControlName) {
                    if (input.files && input.files[0]) {
                      var reader = new FileReader();
                      reader.onload = function(e) {
                        $(imgControlName).attr('src', e.target.result);
                      }
                      reader.readAsDataURL(input.files[0]);
                    }
                  }
                  
                  $("#imag").change(function() {
                    // add your logic to decide which image control you'll use
                    var imgControlName = "#ImgPreview";
                    readURL(this, imgControlName);
                    $('.preview1').addClass('it');
                    $('.btn-rmv1').addClass('rmv');
                  });
                  
                  
                  $("#removeImage1").click(function(e) {
                    e.preventDefault();
                    $("#imag").val("");
                    $("#ImgPreview").attr("src", "");
                    $('.preview1').removeClass('it');
                    $('.btn-rmv1').removeClass('rmv');
                  });
               </script>
               <?php  } if($template==2){ ?>
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
                  .top {
                  border: 3px #00000099 solid ;
                  background-color: #fff; 
                  border-radius: 10px;
                  border-collapse: collapse;
                  width: 100%;
                  table-layout: fixed;
                  border: 1px solid #ddd;
                  text-align: left;
                  }
                  .top td{
                  border: 1px #00000099 solid ;
                  background-color: #fff; 
                  padding: 10px;
                  }
                  .col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-xs-1, .col-xs-10, .col-xs-11, .col-xs-12, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9 {
                  position: relative;
                  min-height: 1px;
                  padding-right: 0px; 
                  padding-left: 0px;
                  }
                  th{
                  color:white;
                  background-color: <?php  echo '#'.$color; ?>
                  } 
               </style>
               <p align="right">  <a id="download" style="color:white;background-color:#38469f;" class='btn btn-primary'> <i class="fa fa-download"></i><?php echo display('Download') ?></a>  
                  <a id="mange" style="color:white;background-color:#38469f;" href="<?php  echo  base_url()  ?>/Chrm/pay_slip_list"  class='btn btn-primary'><?php echo "Manage Pay Slip" ?></a>  
               </p>
              <div  id="content" style="margin-left:12px;padding:10px;">
                  <div class="row" style="padding:0px;width:780px;">
                     <div class="col-md-12 col-sm-12 top_section" style="height:268px;display: flex; justify-content: center; border: 2px solid #8c99ae; display: none;" id="downloadLink">
                        <div class="second_section" style="width: 100%;">
                           <p ></p>
                        
                       
                        <?php
$f=strtoupper($infoemployee[0]['first_name']);


?>

      <div class="r"><p style="padding-left:430px;margin-top: 50px;"><?php echo date("m-d-Y") ?></p></div>

                       
                       <div class="r" style="height:23px;">
    <p style="width: 385px;margin-top: 53px;  display: block;"><?php echo $f .' '. strtoupper($infoemployee[0]['last_name']); ?></p>
    
</div>
        
                         <div class="r amount_word" style="width: 535px;float:center"></div>
<div class="custom-row net_period" style="float:right"></div>
                     
                        </div>
                     </div>
                     <div class="separator" id="separator_line" style="border: 1px solid #8c99ae !important;display: none;">
                        <div style='border: 1px solid rgb(140, 153, 174) !important;height: 322px;' class="sep-line mt-10 mb-15 res-991-mtb-20"></div>
                     </div>
                  </div>
                  <br/>
                  <div class="row">
                     <div class="col-sm-4 r">
                        <img crossorigin="anonymous" src="<?php echo  $logo; ?>" style="float: left;width:100px;height:80px;" alt="logo">
                     </div>
                     <!-- .col-sm-4 -->
                     <div class="col-sm-8 rr" style="text-align: end;">
                        <div class="description">
                           <h2><?php echo $business_name; ?> </h2>
                        </div>
                        <!-- .description -->
                     </div>
                     <!-- .col-sm-8 -->
                  </div>
                  <!-- .row -->
                  <div class="payTop_details row">
                     <div class="col-md-12">
                        <div class="col-md-4">
                           <table class="top" style="border:none;">
                              <tr  style="text-align:center;">
                                 <th colspan="2" style="    height: 40px;
                                    text-align: center;">EMPLOYEE INFO</th>
                              </tr>
                              <tr style="font-size:12px;">
                                 <td><strong>NAME</strong></td>
                                 <td><?php echo $infoemployee[0]['first_name']; ?><?php echo $infoemployee[0]['last_name']; ?></td>
                              </tr>
                              <tr>
                                 <td><strong>TITLE</strong> </td>
                                 <td><?php echo $infotime[0]['job_title']; ?>  </td>
                              </tr>
                              <tr>
                                 <td><strong>ID</strong> </td>
                                 <td><?php echo $infoemployee[0]['id']; ?>  </td>
                              </tr>
                              <tr>
                                 <td style="font-size:10px;"><strong>TIMESHEET ID</strong>:</td>
                                 <td style='font-size:10px;'><?php echo $infotime[0]['timesheet_id']; ?>  </td>
                              </tr>
                              <tr>
                                 <td><strong>PAY PERIOD</strong>:</td>
                                 <td style="white-space: nowrap;font-size:9px;"><?php echo $infotime[0]['month']; ?>  </td>
                              </tr>
                           </table>
                        </div>
                        <div class="col-md-4">
                           <table class="top" style="border:none;">
                              <tr  style="text-align:center;text-wrap: nowrap;">
                                 <th colspan="2"     style="height: 40px;
                                    text-align: center;">CHEQUE INFO</th>
                              </tr>
                              <tr  >
                                 <td style="font-size:10px;"><strong>AUTHORIZED NAME</strong></td>
                                 <td style="font-size:10px;"><?php echo $adm_name[0]['adm_name']; ?></td>
                              </tr>
                              <tr>
                                 <td><strong>TITLE</strong></td>
                                 <td>Admin</td>
                              </tr>
                              <tr>
                                 <td><strong>ID</strong></td>
                                 <td><?php echo $adm_name[0]['adm_id']; ?>  </td>
                              </tr>
                              <?php if(!empty($infotime[0]['cheque_date'])) { ?>
                              <tr style="text-align:left;">
                                 <td style="font-weight:bold;width:100px;text-wrap:nowrap;">CHQ DATE</td>
                                 <td style="width:500px;"><?php echo $infotime[0]['cheque_date']; ?></td>
                              </tr>
                              <tr style="text-align:left;">
                                 <td style="font-weight:bold;width:100px;text-wrap:nowrap;">CHQ NO</td>
                                 <td style="width:500px;"> <?php echo $infotime[0]['cheque_no']; ?></td>
                              </tr>
                              <?php }else{ ?>
                              <tr style="text-align:left;">
                                 <td style="font-weight:bold;width:100px;text-wrap:nowrap;">BANK NAME</td>
                                 <td style="width:500px;"><?php echo $infotime[0]['bank_name']; ?></td>
                              </tr>
                              <tr style="text-align:left;">
                                 <td style="font-weight:bold;width:100px;text-wrap:nowrap;">REF NO</td>
                                 <td style="width:500px;"> <?php echo $infotime[0]['payment_ref_no']; ?></td>
                              </tr>
                              <?php  }  ?>
                           </table>
                        </div>
                        <div class="col-md-4">
                           <table class="top" style="border:none;">
                              <tr  style="text-align:center;">
                                 <th colspan="2"  style="height: 40px;
                                    text-align: center;">COMPANY ADDRESS</th>
                              </tr>
                              <tr>
                                 <td style='border: none' colspan="2"><?php  echo $arr[0].' '.$arr[1].'<br/> '; ?><?php echo $phone.'<br/> '; ?> <?php echo $email; ?>  </td>
                              </tr>
                              <tr  style="text-align:center;">
                                 <th colspan="2"  style="height: 40px;
                                    text-align: center;">EMPLOYEE ADDRESS</th>
                              </tr>
                              <tr>
                                 <td style='border: none' colspan="2"><?php echo $infoemployee[0]['address_line_1']; ?>  </td>
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
                                 <?php  if ($jt !== 'Sales Partner'  ) { ?>
                              <tr  style="text-align:center;">
                                 <th style="    text-align: center;
                                    height: 40px;" colspan="2">EARNINGS</th>
                              </tr>
                              <tr>
                                 <td><strong>DESCRIPTION</strong></td>
                                 <td>Salary</td>
                              </tr>
                              <tr>
                                 <td><strong>HRS/ UNITS</strong></td>
                                 <td> <?php echo $infotime[0]['total_hours']; ?></td>
                              </tr>
                              <tr>
                                 <td><strong>RATE</strong></td>
                                 <td> <?php echo $infoemployee[0]['hrate']; ?></td>
                              </tr>
                              <?php if ($sc) { ?>  
                              <tr>
                                 <td><strong>SALES COMMISSION</strong></td>
                                 <td> <?php echo $sc; ?></td>
                              </tr>
                              <?php  }    ?>
                              <tr>
                                 <td><strong>THIS PERIOD(<?php  echo $currency; ?>)</strong></td>
                                 <td id="total_period"><?php echo $total; ?></td>
                              </tr>
                              <tr>
                                 <td><strong>YTD HOURS</strong></td>
                                 <td><?php echo round($overalltotalhours,2)   ; ?></td>
                              </tr>
                              <tr>
                                 <td><strong>YTD(<?php  echo $currency; ?>)</strong></td>
                                
                                 <td id="total_ytd"><?php  echo round($overalltotalamount, 2); ?></td>
                               
                                
                              </tr>
                                  <?php  }else {  ?>
                                                          
                              <tr  style="text-align:center;">
                                 <th style="    text-align: center;
                                    height: 40px;" colspan="2">EARNINGS</th>
                              </tr>
                              <tr>
                                 <td><strong>DESCRIPTION</strong></td>
                                 <td>Sales Partner</td>
                              </tr>
                              <tr>
                                 <td><strong>HRS/ UNITS</strong></td>
                                 <td> <?php echo $infotime[0]['total_hours']; ?></td>
                              </tr>
                              <tr>
                                 <td><strong>RATE</strong></td>
                                 <td> <?php echo $infoemployee[0]['hrate']; ?></td>
                              </tr>
                              <?php if ($sc) { ?>  
                              <tr>
                                 <td><strong>SALES COMMISSION</strong></td>
                                 <td> <?php echo $sc; ?></td>
                              </tr>
                              <?php  }    ?>
                              <tr>
                                 <td><strong>THIS PERIOD(<?php  echo $currency; ?>)</strong></td>
                                 <td id="total_period"><?php echo $total; ?></td>
                              </tr>
                              <tr>
                                 <td><strong>YTD HOURS</strong></td>
                                 <td><?php echo round($overalltotalhours,2)   ; ?></td>
                              </tr>
                              <tr>
                                 <td><strong>YTD(<?php  echo $currency; ?>)</strong></td>
                                
                                <td><?php  echo round($partner, 2); ?></td>
                                

                                
                              </tr>
                                  <?php  }  ?>
                           </table>
                           <table class="top">
                              <tr  rowspan="3">
                                 <th style="height: 30px;
                                    text-align: center;" colspan="3">NET PAY ALLOCATION</th>
                              </tr>
                              <tr>
                                 <td style="text-align:left;"><strong>DESCRIPTION</strong></td>
                                 <td><strong>THIS PERIOD(<?php  echo $currency; ?>)</strong></td>
                                 <td><strong>YTD(<?php  echo $currency; ?>)</strong></td>
                              </tr>
                              <tr>
                                 <td style="text-align:left;"><strong>Check Amount</strong></td>
                                 <td class="net_period"> <strong style="border-top: 1px solid;
                                    padding-top: 2px;">765.10</strong></td>
                                 <td class="net_ytd"></td>
                              </tr>
                              <tr>
                                 <td style="text-align:left;"><strong>Chkg 404</strong></td>
                                 <td>0.00</td>
                                 <td>0.00</td>
                              </tr>
                              <tr>
                                 <td style="text-align:left;"><strong>NET PAY</strong></td>
                                 <td class="net_period" style="font-weight:bold;border-top: groove;"></td>
                                 <td class="net_ytd" style="font-weight:bold;border-top: groove;"></td>
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
                                 <td style="font-size:12px;font-weight:bold;">THIS PERIOD(<?php  echo $currency; ?>)</td>
                                 <td style="font-size:12px;font-weight:bold;">YTD(<?php  echo $currency; ?>)</td>
                              </tr>
                              <?php if($s){ ?>
                              <tr>
                                 <td style="text-align:left;"> Social Security</td>
                                 <td>S O</td>
                                 <td class="current"><?php if($s){ echo round($s,4);  } ?></td>
                                 <td class="ytd"><?php if($s_tax){ echo round($s_tax,4); } ?></td>
                              </tr>
                              <?php  } ?>
                              <?php if($m){ ?>
                              <tr>
                                 <td style="text-align:left;">Medicare</td>
                                 <td>SMCU O</td>
                                 <td class="current"><?php if($m){echo round($m,4);  }  ?></td>
                                 <td class="ytd"><?php if($m_tax){echo round($m_tax,4);  } ?></td>
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
                                 }
                                   ?>
                              <tr>
                                 <td style="text-align:left;"><?php echo $rep2.'-'.$rep;  ?></td>
                                 <td></td>
                                 <td class="current">  <?php echo round($v,2);    ?></td>
                                 <td class="ytd"><?php echo round($local_sum[$rep],2); ?></td>
                              </tr>
                              <?php  } ?> 
                              <?php foreach($selected_local_tax as $k=>$v){
                                 $split=explode('-',$k);
                                 $rep=str_replace("'",'',$split[1]);
                                 $rep2='';
                                 if($split[2]){
                                 $rep2=str_replace("'",'',$split[2]);
                                 }
                                   ?>
                              <tr>
                                 <td style="text-align:left;"><?php echo $rep2.'-'.$rep;  ?></td>
                                 <td></td>
                                 <td class="current">  <?php echo round($v,2); ?></td>
                                 <td class="ytd"><?php echo round($selected_local_sum[$rep],2); ?></td>
                              </tr>
                              <?php  } ?> 
                              <?php foreach($selected_state_tax as $k=>$v){
                                 $split=explode('-',$k);
                                 $rep=str_replace("'",'',$split[1]);
                                 $rep2='';
                                 if($split[2]){
                                 $rep2=str_replace("'",'',$split[2]);
                                 }
                                   ?>
                              <tr>
                                 <td style="text-align:left;"><?php echo $rep2.'-'.$rep;  ?></td>
                                 <td></td>
                                 <td class="current">  <?php echo round($v,2); ?></td>
                                 <td class="ytd"><?php echo round($selected_state_sum[$rep],2); ?></td>
                              </tr>
                              <?php  } ?> 
                              <tr>
                                 <td colspan='2' style='text-align:end;font-weight:bold;'>Total </td>
                                 <td style="border-top: groove;" id="Total_current"></td>
                                 <td style="border-top: groove;" id="Total_ytd"></td>
                              </tr>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
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
                  
                  $('#Total_ytd').html(sum_ytd.toFixed(2));
                  //net_period
                  var period_wise_total=$('#total_period').html();
                  var tax_deduction_period_wise=$('#Total_current').html();
                  
                  tax_deduction_period_wise = tax_deduction_period_wise.replace(/-/g, '');

                  var net_period=period_wise_total-tax_deduction_period_wise;
                  $('.net_period').html(net_period.toFixed(2));
                  //net_ytd
                  var ytd_wise_total=$('#total_ytd').html();
                  var tax_deduction_ytd_wise=$('#Total_ytd').html();
                  var net_ytd=ytd_wise_total-tax_deduction_ytd_wise;
                  $('.net_ytd').html(net_ytd.toFixed(2));
                  
                  
                    });
                    
               </script>
               <!-- <?php// }else { ?> -->
                  <?php  } if($template==4){ ?>
               <style>
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
               <!-- <?php echo "<pre>"; print_r($infoemployee); echo "</pre>"; ?> -->
               <p style="text-align: right;">
                  <a id="download" style="color: white; background-color: #38469f; margin-bottom: 25px;" class='btn btn-primary'>
                  <i class="fa fa-download"></i><?php echo display('Download') ?>
                  </a>  
                  <a id="mange"  style="color: white; background-color: #38469f; margin-bottom: 25px;" href="<?php echo base_url() ?>/Chrm/pay_slip_list" class='btn btn-primary'>
                  <?php echo "Manage Pay Slip" ?>
                  </a> 
               </p>
               
               
               
               
               
           
                     
                     
                     
                     
                     
                           <div  id="content" style="margin-left:12px;padding:10px;">
                  <div class="row" style="padding:0px;width:780px;">
                     <div class="col-md-12 col-sm-12 top_section" style="height:268px;display: flex; justify-content: center; border: 2px solid #8c99ae; display: none;" id="downloadLink">
                        <div class="second_section" style="width: 100%;">
                           <p ></p>
                        
                       
                        <?php
$f=strtoupper($infoemployee[0]['first_name']);


?>

      <div class="r"><p style="padding-left:430px;margin-top: 50px;"><?php echo date("m-d-Y") ?></p></div>

                       
                       <div class="r" style="height:23px;">
    <p style="width: 385px;margin-top: 53px;  display: block;"><?php echo $f .' '. strtoupper($infoemployee[0]['last_name']); ?></p>
    
</div>
        
                         <div class="r amount_word" style="width: 535px;float:center"></div>
<div class="custom-row net_period" style="float:right"></div>
                     
                        </div>
                     </div>
                     <div class="separator" id="separator_line" style="border: 1px solid #8c99ae !important;display: none;">
                        <div style='border: 1px solid rgb(140, 153, 174) !important;height: 322px;' class="sep-line mt-10 mb-15 res-991-mtb-20"></div>
                     </div>
                  </div>
                     
                     
                     
                     
                     
                     
                     
                     <div class="col-md-6">
                        <br>
                       
                       
                       
                        <p>
                           <strong style='font-size:14px;'><?php echo $business_name; ?></strong><br>
                           <strong></strong><?php echo $arr[0]; ?><?php echo $arr[1]; ?><br>
                           <!--<strong></strong><?php //echo $arr[1]; ?><br>-->
                           <strong></strong>Email : <?php echo $email; ?><br>
                            <strong></strong>Tel :<?php echo " ".$phone; ?><br>

                        </p>
                     </div>
                     
                     
                     
                     
                     
                     
                     <div class="col-md-6">
                        <br>
                        <div style="float: right;"><strong>TIMESHEET ID</strong> : <?php echo $infotime[0]['timesheet_id']; ?>
                           <br>
                           <span><strong>EMPLOYEE ID : </strong><?php echo $infoemployee[0]['id']; ?></span>
                           
                        </div>
                     </div>
                     <div class="col-md-12">
                        <br>
                        <table>
                           <tr>
                              <td style='font-weight:bold;'>EMPLOYEE NAME </td>
                              <td style='text-align:center;width:10%;'>:</td>
                              <td style='text-align:left;'><?php echo $infoemployee[0]['first_name'] .' '.$infoemployee[0]['last_name']; ?></td>
                           </tr>
                           <tr>
                              <td style='font-weight:bold; text-align:left;'>EMPLOYEE TITLE </td>
                              <td style='text-align:center;width:10%;'>:</td>
                              <td style="text-align:left;"><?php echo $infotime[0]['job_title']; ?></td>
                           </tr>
                           <tr>
                              <td style='font-weight:bold; text-align:left;'>PAY PERIOD</td>
                              <td style='text-align:center;width:10%;'>:</td>
                              <td style="text-align:left;"><?php echo $infotime[0]['month']; ?></td>
                           </tr>
                        </table>
                     </div>
                  </div>
                  <div class="payTop_details row">
                     <div class="col-md-12"></div>
                     <div class="col-md-12"><br/></div>
                     <div class="col-md-12" style="float:center;">
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
                        </style>
                        <div>
                           <table class="table" id="table">
                              <tr class="avoid-page-break">
                                 <th>Earnings</th>
                               
                               
                                 <th>
    <?php 
    if (
        $infoemployee[0]['payroll_type'] == 'Salaried-weekly' || 
        $infoemployee[0]['payroll_type'] == 'Salaried-BiWeekly' || 
        $infoemployee[0]['payroll_type'] == 'Salaried-Monthly' || 
        $infoemployee[0]['payroll_type'] == 'Salaried-BiMonthly'
    ) {
        echo 'Days';
    } else {
        echo 'Hours';
    }
    ?>
</th>



                                 <th>Amount</th><?php if($sc){  ?><th>Sales Commission</th> <?php   }  ?>
                                 <th>This Period</th>
                                 
                                 <th style="text-align:left;">Deductions</th>
                                 <th style="text-align:left;">Amount</th>
                                 <th style="text-align:left;">Y-T-D</th>
                              </tr>
                              
                              
                                     <?php if($s){ ?>
                              <tr class="avoid-page-break">
                                 <td></td>
                                 <td></td>
                                 <td></td><?php if($sc){  ?><td></td> <?php   }  ?>
                                 <td></td> 
                                 <td style="text-align:left;"> Social Security</td>
                                 <td style="text-align:left;" class="current"><?php if($s){echo "-".round($s,4); } ?></td>
                                 <td style="text-align:left;" class="ytd"><?php if($t_s_tax){echo round($t_s_tax,4); } ?></td>
                              </tr>
                              <?php  } ?>
                              <?php  if($m){ ?>
                              <tr class="avoid-page-break">
                                 <td  style="border: none;">Salary</td>
                                 <td style="border: none;"><?php echo $infotime[0]['total_hours']; ?></td>
                                 <td style="border: none;"><?php echo $infoemployee[0]['hrate']; ?></td>
                                     <?php if($sc){  ?> <td style="border: none;"><?php echo $sc; ?></td> <?php   }  ?>
                                 <td id="total_period" style="border: none;" ><?php echo round($total,2)  ; ?></td>
                                 <td style="text-align:left;border: none;">Medicare</td>
                                 <td style="text-align:left;border: none;"  class="current"><?php if($m){echo "-".round($m,4); }  ?></td>
                                 <td  style="text-align:left;border: none;" class="ytd"><?php if($t_m_tax){echo round($t_m_tax,4); } ?></td>
                              </tr>
                              <?php  } ?>
                              <?php if($f){ ?>
                              <tr class="avoid-page-break">
                                 <td style="border: none;"></td>
                                 <td style="border: none;"></td>
                                 <td style="border: none;"></td> <?php if($sc){  ?><td  style="border: none;"></td> <?php   }  ?>
                                 <td style="border: none;"></td>
                                 <td  style="text-align:left;border: none;">Fed Income Tax</td>
                                 <td  style="text-align:left;border: none;" class="current"><?php if($f){echo "-".round($f,4); } ?></td>
                                 <td  style="text-align:left;border: none;" class="ytd"><?php if($t_f_tax){echo round($t_f_tax,4); } ?></td>
                              </tr>
                              <?php  } ?>




                              
                              <?php if($u){ ?>
                              <tr class="avoid-page-break">
                                 <?php if($sc){  ?><td  style="border: none;"></td> <?php   }  ?>
                                 <td colspan='5' style="text-align:end;border: none;">Unemployment Tax</td>
                                 <td style="text-align:left;border: none;" class="current"><?php if($u){echo "-".round($u,4); } ?></td>
                                 <td style="text-align:left;border: none;" class="ytd"><?php if($t_u_tax){echo round($t_u_tax,4); } ?></td>
                              </tr>
                              <?php  }?>
                              
                              
                             

<!--//New jersey-->
 
                              <?php if (!empty($selected_state_tax)) : ?>
<?php if ($hourly || $weekly ||  $biweekly) : ?>
   
   
<?php if ($infoemployee[0]['payroll_type'] == 'Hourly'  ||  $infoemployee[0]['payroll_type'] == 'SalesCommission'  ) : ?>

<tr>
     <td style="border: none;"></td>
            <td style="border: none;"></td>
            <td style="border: none;"></td>
            <td style="border: none;"></td>
    <td style="text-align:left;    border: none;">NJ-Income tax</td>
     <td class="current"  style="text-align: justify;    border: none;"  ><?php echo "-" . $hourly; ?></td>
    <td class="ytd"  style="text-align: justify;    border: none;"><?php echo round($OVhourly, 2); ?>
</td>
</tr>

<?php elseif ($infoemployee[0]['payroll_type'] == 'Salaried-weekly' || 
        $infoemployee[0]['payroll_type'] == 'Salaried-BiWeekly' || 
        $infoemployee[0]['payroll_type'] == 'Salaried-Monthly' || 
        $infoemployee[0]['payroll_type'] == 'Salaried-BiMonthly' ||
        $infoemployee[0]['payroll_type'] == 'SalesCommission'
        ) : ?>

<tr>
     <td style="border: none;"></td>
            <td style="border: none;"></td>
            <td style="border: none;"></td>
            <td style="border: none;"></td>
    <td style="text-align:left;    border: none;">NJ-Income tax</td>
     <td class="current" style="text-align: justify;    border: none;" ><?php echo "-" . ($weekly ? $weekly : ($biweekly ? $biweekly : $monthly)); ?></td>
    <td class="ytd" style="text-align: justify;    border: none;" >
        
         
       <?php 
echo round(($OVweekly ? $OVweekly : ($OVbiweekly ? $OVbiweekly : $OVmonthly)), 2); 
?> 
        
        
        </td>
</tr>

 



<?php endif; ?>

<?php endif; ?>

<?php else : ?>
<?php foreach ($selected_state_tax as $k => $v) : ?>
    <?php if ($v) :
        $split = explode('-', $k);
        $title = str_replace("'employee_", '', $split[0]);
        $rep = str_replace("'", '', $split[1]);
        $rep2 = isset($split[2]) ? str_replace("'", '', $split[2]) : '';
    ?>
        <tr class="avoid-page-break">
            <td style="border: none;"></td>
            <td style="border: none;"></td>
            <td style="border: none;"></td>
            <td style="border: none;"></td>
            <td title="<?php echo "Working State Tax - " . $title; ?>" style="text-align:left; border: none;">
                <?php echo $rep2 ? $rep2 . '-' . $rep : $rep; ?>
            </td>
            <td style="text-align:left; border: none;" class="current">
                <?php echo "-" . round($v, 4); ?>
            </td>
            <td style="text-align:left; border: none;" class="ytd">
                <?php echo round($selected_state_sum[$rep], 4); ?>
            </td>
        </tr>
    <?php endif; ?>
<?php endforeach; ?>
<?php endif; ?>
 
                               

 

 
 


                              <?php foreach($selected_state_tax as $k=>$v){
                                
                                 if($v){
                                    
                                 $split=explode('-',$k);

                                   $title=str_replace("'employee_",'',$split[0]);
                                    $rep=str_replace("'",'',$split[1]);
                                
                                 $rep2='';
                              
                                 if($split[2]){
                                 $rep2=str_replace("'",'',$split[2]);
                                 }


 
                                 ?>
  
 
                              <tr class="avoid-page-break">
                                 <td style="border: none;"></td>
                                 <td style="border: none;"></td>
                                 <td style="border: none;"></td>  
                                 <td style="border: none;"></td>
                              
                                
                                 <td  title="<?php   echo "Working State Tax - ".$title; ?>" style="text-align:left;border: none;">                          

                                 <?php if($rep2){echo $rep2.'-'.$rep;}else {echo $rep;}  ?>
                                 </td>
                                  
                              
                                  <td style="text-align:left;border: none;" class="current">
                                  <?php echo "-".round($v,4); ?>
                                  </td>
 
                                 <td style="text-align:left;border: none;" class="ytd">                       
                                  <?php echo round($selected_state_sum[$rep],2); ?>
                                 </td>
                           
                           
                              </tr>
                              <?php  } }?> 

 




  



                              <?php foreach($selected_local_tax as $k=>$v){
                                 if($v){
                                 $split=explode('-',$k);
                                   $title=str_replace("'employee_",'',$split[0]);
                                 $rep=str_replace("'",'',$split[1]);
                                 $rep2='';
                                 if($split[2]){
                                 $rep2=str_replace("'",'',$split[2]);
                                 }
                                 ?>
                    
                              <tr class="avoid-page-break">
                                 <td style="border: none;"></td>
                                 <td style="border: none;"></td>
                                 <td style="border: none;"></td>  
                                 <td style="border: none;"></td>
                                 <td title="<?php   echo "Working Local Tax - ".$title; ?>" style="text-align:left;border: none;"><?php if($rep2){echo $rep2.'-'.$rep;}else {echo $rep;}  ?></td>
                                 <td style="text-align:left;border: none;" class="current"><?php echo "-".round($v,2); ?> </td>
                                 <td style="text-align:left;border: none;" class="ytd"><?php echo round($selected_local_sum[$rep],2); ?></td>
                              </tr>






                              <?php  } } ?> 
                               <?php foreach($working_county_tax as $k=>$v){
                                 if($v){
                                 $split=explode('-',$k);
                                   $title=str_replace("'employee_",'',$split[0]);
                                 $rep=str_replace("'",'',$split[1]);
                                 $rep2='';
                                 if($split[2]){
                                 $rep2=str_replace("'",'',$split[2]);
                                 }
                                 ?>

                                 <tr class="avoid-page-break">
                                 <td style="border: none;"></td>
                                 <td style="border: none;"></td>
                                 <td style="border: none;"></td>  
                                 <td style="border: none;"></td>
                                 <td    title="<?php   echo "Working County Tax - ".$title; ?>" style="text-align:left;border: none;"><?php if($rep2){echo $rep2.'-'.$rep;}else {echo $rep;}  ?></td>
                                  <td style="text-align:left;border: none;"  class="current">  <?php echo "-".round($v,2); ?></td>
                                 <td style="text-align:left;border: none;"   class="ytd"><?php echo round($working_county_sum[$rep],2); ?></td>
                              </tr>

                              <?php  } } ?> 
                               <?php foreach($other_working_tax as $k=>$v){
                                 if($v){
                                 $split=explode('-',$k);
                                   $title=str_replace("'employee_",'',$split[0]);
                                 $rep=str_replace("'",'',$split[1]);
                                 $rep2='';
                                 if($split[2]){
                                 $rep2=str_replace("'",'',$split[2]);
                                 }
                                 ?>
 

                              <tr class="avoid-page-break">
                              <td style="border: none;"></td>
                                 <td style="border: none;"></td>
                                 <td style="border: none;"></td>  
                                 <td style="border: none;"></td>
                              <td title="<?php   echo "Other Working Tax - ".$title; ?>" style="text-align:left;border: none;"><?php if($rep2){echo $rep2.'-'.$rep;}else {echo $rep;}  ?></td>
                                 <td style="text-align:left;border: none;" class="current"><?php echo "-".round($v,2); ?></td>
                                 <td style="text-align:left;border: none;" class="ytd"><?php echo round($other_working_sum[$rep],2); ?></td>
                              </tr>







                              <?php  } } ?> 
                                 <?php foreach($selected_living_state_tax as $k=>$v){
                                 if($v){
                                 $split=explode('-',$k);
                                   $title=str_replace("'employee_",'',$split[0]);
                                 $rep=str_replace("'",'',$split[1]);
                                 $rep2='';
                                 if($split[2]){
                                 $rep2=str_replace("'",'',$split[2]);
                                 }
                                 ?>


                                 <tr class="avoid-page-break">
                                 <td style="border: none;"></td>
                                 <td style="border: none;"></td>
                                 <td style="border: none;"></td>  
                                 <td style="border: none;"></td>
                                 <td title="<?php   echo "Living State Tax - ".$title; ?>" style="text-align:left;border: none;"><?php if($rep2){echo $rep2.'-'.$rep;}else {echo $rep;}  ?></td>
                                  <td style="text-align:left;border: none;"  class="current">  <?php echo "-".round($v,2); ?></td>
                                 <td style="text-align:left;border: none;"  class="ytd"><?php echo round($selected_living_state_sum[$rep],2); ?></td>
                              </tr>
                              <?php  } } ?> 
                                    <?php foreach($living_local_tax as $k=>$v){
                                 if($v){
                                 $split=explode('-',$k);
                                   $title=str_replace("'employee_",'',$split[0]);
                                 $rep=str_replace("'",'',$split[1]);
                                 $rep2='';
                                 if($split[2]){
                                 $rep2=str_replace("'",'',$split[2]);
                                 }
                                 ?>




                                 <tr class="avoid-page-break">
                                 <td style="border: none;"></td>
                                 <td style="border: none;"></td>
                                 <td style="border: none;"></td>  
                                 <td style="border: none;"></td>
                                 <td title="<?php   echo "Living Local Tax - ".$title; ?>" style="text-align:left;border: none;"><?php if($rep2){echo $rep2.'-'.$rep;}else {echo $rep;}  ?></td>
                                  <td style="text-align:left;border: none;"  class="current">  <?php echo "-".round($v,2); ?></td>
                                 <td style="text-align:left;border: none;"  class="ytd"><?php echo round($living_local_sum[$rep],2); ?></td>
                              </tr>




                              <?php  } } ?>
                                         <?php foreach($living_county_tax as $k=>$v){
                                 if($v){
                                 $split=explode('-',$k);
                                   $title=str_replace("'employee_",'',$split[0]);
                                 $rep=str_replace("'",'',$split[1]);
                                 $rep2='';
                                 if($split[2]){
                                 $rep2=str_replace("'",'',$split[2]);
                                 }
                                 ?>

                                <tr class="avoid-page-break">
                                <td style="border: none;"></td>
                                 <td style="border: none;"></td>
                                 <td style="border: none;"></td>  
                                 <td style="border: none;"></td>
                                 <td title="<?php   echo "Living County Tax - ".$title; ?>" style="text-align:left;border: none;"><?php if($rep2){echo $rep2.'-'.$rep;}else {echo $rep;}  ?></td>
                                  <td style="text-align:left;border: none;" class="current">  <?php echo "-".round($v,2); ?></td>
                                 <td style="text-align:left;border: none;"  class="ytd"><?php echo round($living_county_sum[$rep],2); ?></td>
                              </tr>



                              <?php  } } ?>
                                <?php foreach($other_tax as $k=>$v){
                                 if($v){
                                 $split=explode('-',$k);
                                  $title=str_replace("'employee_",'',$split[0]);
                                 $rep=str_replace("'",'',$split[1]);
                                 $rep2='';
                                 if($split[2]){
                                 $rep2=str_replace("'",'',$split[2]);
                                 }
                                 ?>
 



                              <tr class="avoid-page-break">

                              <td style="border: none;"></td>
                                 <td style="border: none;"></td>
                                 <td style="border: none;"></td>  
                                 <td style="border: none;"></td>

                              <td   title="<?php   echo "Other Tax - ".$title; ?>" style="text-align:left;    border: none;"><?php if($rep2){echo $rep2.'-'.$rep;}else {echo $rep;}  ?></td>
                                 <td style="text-align:left;border: none;" class="current"><?php echo "-".round($v,2); ?></td>
                                 <td style="text-align:left;border: none;" class="ytd"><?php echo round($other_tax_sum[$rep],2); ?></td>
                              </tr>
 
                              <?php  } } ?> 
                       
                           </table>
                           <br>
                           <table>
                               
                               
                               
                               
                               
                               
                               
                               
                               
                               
                               
  <tr class="avoid-page-break">
    <td>
      <table class="table">
        <tr class="avoid-page-break">
                                 <td style="border:1px solid #ddd;border-top: 1px solid #ddd;  padding: 15px;font-size: 10px;" rowspan="2"><strong>Y-T-D<strong></td>
                                  <td style='border:1px solid #ddd;border-top: 1px solid #ddd;border-left:1px solid #ddd;'> <strong>Hours</strong><br/><?php echo round($overalltotalhours,2)   ; ?> </td>
                                 <td style='border:1px solid #ddd;border-top: 1px solid #ddd;'> <strong>Salary</strong><br/><span id="total_ytd"><?php echo round($overalltotalamount,2)  ; ?></span> </td>
                                 <!-- <td id="total_ytd"></td> -->
                                 <td colspan="2" style='border:1px solid #ddd;border-top: 1px solid #ddd;'> <strong>Net Pay</strong><span class="net_ytd"></span></td>
                             
                                                <?php if($sc){  ?><td  style="border: none;"></td> <?php   }  ?>
                              </tr>
      </table>
    </td>

    <td>
      <table class="table" >
         <tr class="avoid-page-break">
            <td style="border:none;    width:90px;"></td>
        <td style="text-align:left;"> <strong>Total</strong> </td>
                                 <td  style="text-align:left;" id="Total_current"></td>
                                 <td style="text-align:left;"  id="Total_ytd"></td>
                              </tr>
      </table>
    </td>
  </tr>
</table>















                        
                           <table class="table avoid-page-break" >
                              <tr class="avoid-page-break">
                                 <th  style="text-align: justify;background:none;color: black;" >
                                    Social Security Num:
                                        <h4><?php 
                                    $new = substr($infoemployee[0]['social_security_number'], 0, -4) . 'XXXX';
                                    echo $new; ?></h4>
                                 </th>
                                 <th  style="text-align: end;background:none;color: black;width: 310px;" >
                                    Pay Period:
                                    <h4><?php echo $infotime[0]['month']; ?></h4>
                                 </th>
                              </tr>
                              <tr class="avoid-page-break">
                                 <th  style="text-align: justify;background:none;color: black;border: none;" >
                                    Chk No:
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
                                 <th  style="background:none;color: black;border: none;text-align: right;" >
                                    Net Pay :<br> 
                                    <h4><span class="net_period" style="border:none;"></h4>
                                 </th>
                              </tr>
                           </table>
                           <!--  <div class="yes">
                              <img id="ImgPreview" src="" class="preview1" />
                              <input type="button" id="removeImage1" value="x" class="btn-rmv1" style="width:30px;"  />
                              </div> -->
                        </div>
                     </div>
                  </div>
                  <br>             
               </div>
               <script>
                  $(document).ready(function(){
                       var currency = '<?php echo $currency; ?>'
                //  debugger;
                     var sum=0;
                  
                  $('.table').find('.current').each(function() {
                  var v=$(this).html();
                  sum += parseFloat(v);
                  
                  });
                  $('#Total_current').html(sum.toFixed(2));
                  var sum_ytd=0;
                  
                  $('.table').find('.ytd').each(function() {
                  var v=$(this).html();
                  sum_ytd += parseFloat(v);
                  });
                  
                  $('#Total_ytd').html(sum_ytd.toFixed(2));
                  var period_wise_total=$('#total_period').html();
                  var tax_deduction_period_wise=$('#Total_current').html();
                  
                                     tax_deduction_period_wise = tax_deduction_period_wise.replace(/-/g, '');

                  
                  var net_period=period_wise_total-tax_deduction_period_wise;
                  
                  
                  
                  $('.net_period').html(currency + net_period.toFixed(2));
                   var ytd_wise_total=$('#total_ytd').html();
                   var tax_deduction_ytd_wise=$('#Total_ytd').html();
                   var net_ytd=ytd_wise_total-tax_deduction_ytd_wise;
                  $('.net_ytd').html(net_ytd.toFixed(2));
                  
                  
               
                  
                   
                    var currencyMap = {
                        '$': 'Dollars',
                        '€': 'Euros',
                        '£': 'Pounds',
                    };
                    
                    var currencyWords = currencyMap[currency] || 'Unknown';
                    var ytd_wise_total = parseFloat($('#total_ytd').html());
                    var tax_deduction_ytd_wise = parseFloat($('#Total_ytd').html());
                    var net_ytd = ytd_wise_total - tax_deduction_ytd_wise;
                    
                    // Keep only 2 decimal places for currency calculations
                    var amount = net_period.toFixed(2);
                    
                    var sanitizedAmount = amount.replace(/[,.]/g, '');
                    var numericAmount = parseFloat(sanitizedAmount);
                    
                    var dollars = Math.floor(numericAmount / 100);
                    var cents = Math.round(numericAmount % 100);
                    
                    var dollarsWords = numberToWords.toWords(dollars);
                    var centsWords = numberToWords.toWords(cents);
                    
                    dollarsWords = dollarsWords.charAt(0).toUpperCase() + dollarsWords.slice(1);
                    centsWords = centsWords.charAt(0).toUpperCase() + centsWords.slice(1);
                    
                    var formattedAmount = '';
                    
                    if (dollars > 0) {
                        formattedAmount = dollarsWords + ' ' ;
                    }
                    
                    if (cents > 0) {
                        if (dollars > 0) {
                            formattedAmount += ' and ';
                        }
                        formattedAmount += cents + '/100';
                    }


                        
                      $('.net_ytd').html(net_ytd.toFixed(2));
                      $('.amount_word').html(formattedAmount);
                  });
                  
                  
                  
                  
                  
                  function readURL(input, imgControlName) {
                    if (input.files && input.files[0]) {
                      var reader = new FileReader();
                      reader.onload = function(e) {
                        $(imgControlName).attr('src', e.target.result);
                      }
                      reader.readAsDataURL(input.files[0]);
                    }
                  }
                  
                  $("#imag").change(function() {
                    // add your logic to decide which image control you'll use
                    var imgControlName = "#ImgPreview";
                    readURL(this, imgControlName);
                    $('.preview1').addClass('it');
                    $('.btn-rmv1').addClass('rmv');
                  });
                  
                  
                  $("#removeImage1").click(function(e) {
                    e.preventDefault();
                    $("#imag").val("");
                    $("#ImgPreview").attr("src", "");
                    $('.preview1').removeClass('it');
                    $('.btn-rmv1').removeClass('rmv');
                  });
               </script>
               <?php }?>
            </div>
         </div>
      </div>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
      <script>
         $('#download').on('click',function () {
         $('#downloadLink').css('display', 'block');
         $('#separator_line').css('display', 'block');
         
         function first(callback1,callback2){
         setTimeout( function(){
          var pdf = new jsPDF('p','pt','a4');
          const invoice = document.getElementById("content");
                 // console.log(invoice);
                  console.log(window);
                  var pageWidth = 8.5;
                  var margin=0.5;
                  var opt = {
         lineHeight : 1.2,
         margin : 0,
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
         }).save('PaySlip_<?php echo $infoemployee[0]['first_name']." ".$infoemployee[0]['last_name']."_".$infotime[0]['month']?>.pdf');
         callback1();
         callback2();
              clonedElement.remove();
         $("#content").attr("hidden", true);
         }, 3000 );
         }
         function second(){
         setTimeout( function(){
         $( '#myModal_sale' ).addClass( 'open' );
         if ( $( '#myModal_sale' ).hasClass( 'open' ) ) {
         $( '.container' ).addClass( 'blur' );
         }
         $( '.close' ).click(function() {
         $( '#myModal_sale' ).removeClass( 'open' );
         $( '.cont' ).removeClass( 'blur' );
         });
         }, 1500 );
         }
         function third(){
         setTimeout( function(){
             window.location='<?php  echo base_url();   ?>'+'Chrm/pay_slip_list';
             window.close();
         }, 3000 );
        }
         first(second,third);
         });
         
      </script>
      <?php if ($jt !== 'Sales Partner'): ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementsByClassName('withholding').style.display = 'none';
        });
    </script>
<?php endif; ?>
</section>
</div>
<style type="text/css">
   .top_section{
   width: 100%;
   height: 2.9in;
   /*    background-color: #f0f0f0;*/
 
   filter: brightness(150%);
   background-position: center;
   /*    filter: blur(1px);*/
   /*    background-size: cover;*/
   }    
   * {
   box-sizing: border-box;
   margin: 0;
   padding: 0;
   }
   .top_para{
   font-size: 7px;
   color: #10489d;
   font-weight: bold;
   background-color: #9fa7bc;
   height: 18px;
   width: 100%;
   text-align: center;
   }
   /*.custom-row {
   background-image: url('<?php echo base_url('/assets/images/logo/logo-paychex.png'); ?>');
   background-size: cover;
   background-repeat: no-repeat;
   background-position: center;
   background-size: 100% 35px;
   }*/
   .slanted-text p {
   transform: rotate(269deg); 
   margin: 0;
   position: absolute;
   top: 110px;
   left: -48px;
   }
   .slanted-text1 p {
   transform: rotate(90deg); 
   margin: 0;
   position: absolute;
   top: 110px;
   right: -48px;
   }
   .footer_number{
   background-image: url('<?php echo base_url('/assets/images/logo/footer.png'); ?>');  
   }
   .separator .sep-line{
   border-color: #000;
   }
   .separator .sep-line {
   height: 300px;
   /*    border-bottom: 1px dotted; #000;*/
   display: block;
   position: relative;
   width: 100%;
   }
</style>