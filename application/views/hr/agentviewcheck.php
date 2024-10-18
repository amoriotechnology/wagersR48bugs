<?php 

$per_amount = $commission / 100;

$total = $per_amount * $total_amount;

?>
<style>
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
               <p style="text-align: right;">
                  <a id="download" style="color: white; background-color: #38469f;    margin-bottom: 25px;" class='btn btn-primary'>
                  <i class="fa fa-download"></i><?php echo display('Download') ?>
                  </a>  
                  <a id="mange"  style="color: white; background-color: #38469f;     margin-bottom: 25px;" href="<?php echo base_url() ?>/Chrm/pay_slip_list" class='btn btn-primary'>
                  <?php echo "Manage Pay Slip" ?>
                  </a> 
               </p>
               <div  id="content">
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
                        <div class="col-md-12 col-sm-6 mt-50 top_section" style="display: flex; justify-content: center; border: 2px solid #8c99ae;" id="downloadLink">
                           <div class="second_section" style="width: 100%;">
                              <p class="top_para">THE FACE OF THIS DOCUMENT CONTAINS MICROPRINTING . THE BACKGROUND COLOR CHANGES GRADUALLY AND EVENLY FROM DARKER TO LIGHTER WITH THE DARKER AREA AT THE TOP</p>
                              <span style="position: absolute; top: -2px; left: -1px; width: 17px; height: 20px; background-color: #10489d;"></span>
                              <span style="position: absolute; top: -2px; right: -2px; width: 17px; height: 20px; background-color: #10489d;"></span>
                              <div class="col-md-3 col-sm-6 d-flex align-items-center justify-content-center" style="width: 30%;">
                                 <p style="font-size: 10px; color: black;">ABSOLUTE MARBLE & GRANITE CROP<br>
                                    <small>1300 Taylors Lane <br>Cinnaminson NJ 08077</small>
                                 </p>
                              </div>
                              <div class="slanted-text">
                                 <p style="font-style: italic; color: #10489d;  font-weight: 800px; font-size: 10px;">Payrolls by Paychex, Inc.</p>
                              </div>
                              <div class="slanted-text1">
                                 <p style="font-style: italic; color: #10489d; font-weight: 800px; font-size: 10px;">Payrolls by Paychex, Inc.</p>
                              </div>
                              <div class="col-md-3 col-sm-6 mt-50 d-flex align-items-center justify-content-center" style="width: 20%;">
                                 <p style="font-size: 12px; color: black;">1308-5812 <br>EE ID: 58</p>
                              </div>
                              <div class="col-md-3 col-sm-6 mt-50 d-flex align-items-center justify-content-center">
                                 <img crossorigin="anonymous" src="<?php echo base_url('/assets/images/logo/logo_1.png') ?>" style="width: 80px; object-fit: contain;" alt="logo"> 
                              </div>
                              <p style="font-size: 10px; position: absolute; left: 500px; color: black;">03-50 <br>
                                 <small style="font-size: 10px; border-top: 1px solid black; display: block; width: 100%; text-align: center;">310</small>
                              </p>
                              <div class="col-md-3 col-sm-6 mt-50 d-flex align-items-center justify-content-center">
                                 <p style="font-size: 6px; position: absolute; top: -10px; left: 20px; font-weight: bold; color: #10489d;">COPYBAN CAPTURE ANTI FRAUD PROTECTION</p>
                                 <table class="table table-bordered" style="border: 1px solid #8c99ae !important;">
                                    <tr>
                                       <td style="font-weight: bold; text-align: center; color: black; background-color: #d0ccc3; border: 1px solid #8c99ae !important; font-size: 10px;"><?php echo $date; ?></td>
                                       <td style="font-weight: bold; text-align: center; color: black; background-color: #d0ccc3; border: 1px solid #8c99ae !important; font-size: 10px;">8063</td>
                                    </tr>
                                    <tr style="height: 8px; background-color: #9fa7bc;">
                                       <td style="font-weight: bold; font-size: 9px; text-align: center; color: #10489d; border: 1px solid #8c99ae !important;">DATE</td>
                                       <td style="font-weight: bold; font-size: 9px; text-align: center; color: #10489d; border: 1px solid #8c99ae !important;">CHECK NO</td>
                                    </tr>
                                 </table>
                              </div>
                              <div class="col-md-4 col-sm-6 d-flex align-items-center justify-content-center">
                                 <p style="color: #10489d; font-size: 12px;">PAY TO THE <br> ORDER OF </p>
                              </div>
                              <div class="col-md-4 col-sm-6 d-flex align-items-center justify-content-center">
                                 <p style="color: black; font-size: 12px;">AN T TRAN <br>2455 JASPER STREET<br> PHILADELPHIA PA 19125</p>
                              </div>
                              <div class="col-md-4 col-sm-6" style="display: flex; justify-content: flex-end; position: relative; right: -32px;">
                                 <table class="table table-bordered" style="width: 70%;">
                                    <tr>
                                       <td style="font-weight: bold; text-align: center; color: black; background-color: #d0ccc3; border: 1px solid #8c99ae !important; font-size: 12px;" class="custom-row"><?php echo $currency . $total; ?></td>
                                    </tr>
                                    <tr style="height: 8px; background-color: #9fa7bc;">
                                       <td style="font-weight: bold; font-size: 8px; text-align: center; color: #10489d; border: 1px solid #8c99ae !important;">AMOUNT</td>
                                    </tr>
                                 </table>
                              </div>
                              <div class="col-md-12 col-sm-6">
                                 <p style="font-weight: bold; color: black; font-size: 10px;">THREE HUNDRED NINENTY TWO AND 84/100 ........................ DOLLARS</p>
                                 <br>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <p style="color: black; font-size: 10px;">WELLS FARGO BANK, NA</p>
                                    </div>
                                    <div class="col-md-6" style="display: flex; justify-content: flex-end;">
                                       <p style="font-size: 13px; border-top: 1px solid black; width: inherit; position: absolute;"></p>
                                       <small style="color: #10489d; position: absolute; left: 180px; top: 8px; font-size: 10px;">AUTHORIZED SIGNATURE(S)</small>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-12 col-sm-6" style="border-top: 1px solid #10489d; width: 100%; background-color: #fff;  height: 41px;">
                                 <span style="position: absolute; top: -1px; left: -15px; width: 105px; height: 1px; background-color: #10489d;"></span>
                                 <span style="position: absolute; top: -1px; right: -15px; width: 105px; height: 1px; background-color: #10489d;"></span>
                                 <span style="position: absolute; top: 0px; left: -15px; width: 15px; height: 40px; background-color: #fff;"></span>
                                 <span style="position: absolute; top: 0px; right: -14px; width: 15px; height: 40px; background-color: #fff;"></span>
                                 <p style="color: black; font-size: 11px; position: relative; top: 8px;">||⬛ 0000008063 ||⬛ |:031000503|: 8635410593||⬛</p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <br>             
               </div>
               <script>
                  $(document).ready(function(){
                  
                  var sum=0;
                  
                  $('.table').find('.current').each(function() {
                  var v=$(this).html();
                  sum += parseFloat(v);
                  
                  });
                  debugger;
                  $('#Total_current').html(sum.toFixed(3));
                  var sum_ytd=0;
                  
                  $('.table').find('.ytd').each(function() {
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
                  var ytd_wise_total=$('#total_ytd').html();
                  var tax_deduction_ytd_wise=$('#Total_ytd').html();
                  var net_ytd=ytd_wise_total-tax_deduction_ytd_wise;
                  $('.net_ytd').html(net_ytd.toFixed(3));
                  
                  
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
         var downloadLink = document.getElementById('downloadLink');
         downloadLink.style.display = 'block';
         
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
         }, 3500 );
         }
         function third(){
         setTimeout( function(){
             window.location='<?php  echo base_url();   ?>'+'Chrm/generateAgentcheck';
             window.close();
         }, 4000 );
         }
         first(second,third);
         });
         
      </script>
</section>
</div>
<style type="text/css">
   .top_section{
   width: 100%;
   height: 3.0in;
   background-image: url('<?php echo base_url('/assets/images/logo/back.png'); ?>');
   filter: brightness(150%);
   background-position: center;
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
</style>