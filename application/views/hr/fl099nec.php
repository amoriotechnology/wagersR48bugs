<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url()  ?>my-assets/css/f942.css">
    <title>Document</title>
</head>

<body>
    <button class="btnclr btn btn-default dropdown-toggle  boxes filip-horizontal mobile_para" onclick="downloadPagesAsPDF()" style="margin-left:250px;"><span class="fa fa-download"></span>Download </button>

    <body bgcolor="#A0A0A0" vlink="blue" link="blue">
        <div id="download">


            <div class="page-1" id="one">
                <img src="<?php echo base_url()  ?>asset/images/f1099_1.jpg" width="100%" />
            </div>

            <div class="page-2" id="two">
                <img src="<?php echo base_url()  ?>asset/images/f1099_2.jpg" width="100%" />
                <div class="void">
                    <input type="checkbox"  value="" >
                </div>
                <div class="corrected">
                    <input type="checkbox"  value="" >
                </div>

				<?php
				$company_name = isset($get_cominfo[0]['company_name']) ? $get_cominfo[0]['company_name'] : '';
				$address = isset($get_cominfo[0]['address']) ? $get_cominfo[0]['address'] : 'Default Address';
				?>

                <div class="payer-name">
				<textarea  name="company" id="company"  readonly><?php echo $company_name . "\n" . $address; ?></textarea>
		    	</div>

                <div class="year">
                    <input type="text" value="<?php echo date('Y'); ?>" readonly> 
                </div>

                <?php
                $State_Tax_ID_Number = isset($get_cominfo[0]['State_Tax_ID_Number']) ? $get_cominfo[0]['State_Tax_ID_Number'] : '';
                ?>

                <div class="payer-tin">
                    <input type="text" value="<?php echo $State_Tax_ID_Number; ?>">
                </div>

                <?php
                $recipient = isset($get_f1099nec_info[0]['social_security_number']) ? $get_f1099nec_info[0]['social_security_number'] : $get_f1099nec_info[0]['federalidentificationnumber'];
                ?>

                <div class="rep-tin">
                    <input type="text" value="<?php echo $recipient; ?>">
                </div>

                    <?php
                    if (!empty($get_f1099nec_info[0]['sumofsc'])) {
                        $value = $get_f1099nec_info[0]['sumofsc'];
                    } else {
                        $value = $sss;
                    }
                    ?>

                <div class="nominee">
                    <input type="text" value="<?php echo $value; ?> ">
                </div>

                <?php
                $Name = isset($get_f1099nec_info[0]['first_name'], $get_f1099nec_info[0]['middle_name'], $get_f1099nec_info[0]['last_name']) ? $get_f1099nec_info[0]['first_name'] . ' ' . $get_f1099nec_info[0]['middle_name'] . ' ' . $get_f1099nec_info[0]['last_name'] : '';
                ?>
 
                <div class="rep-name">
                    <input type="text" value="<?php echo $Name; ?>"  style="width: 304px;"  >
                </div>


                <div class="sale">
                    <input type="checkbox" value="" >
                </div>

                                <?php
                $Address = isset($get_f1099nec_info[0]['address_line_1']) ? $get_f1099nec_info[0]['address_line_1'] : '';
                ?>

                <div class="street">
                    <input type="text" value="<?php echo $Address; ?>"  style="width: 302px;" >
                </div>

				<?php
                    $CSCZ = isset($get_f1099nec_info[0]['city']) ? $get_f1099nec_info[0]['city'] . ', ' . $get_f1099nec_info[0]['state'] . ' ' . $get_f1099nec_info[0]['country'] . ' ' . $get_f1099nec_info[0]['zip'] : '';
                    ?>

                <div class="city">
                    <input type="text" value="<?php echo $CSCZ; ?>"  style="width: 302px;" >
                </div>

				<?php
                $ACNUM = isset($get_f1099nec_info[0]['account_number']) ? $get_f1099nec_info[0]['account_number'] : '';
                ?>

                <div class="account">
                    <input type="text" value="<?php echo $ACNUM; ?>">
                </div>


                <?php

                    if($choice == 'Yes'){
                         $value = isset($get_f1099nec_info[0]['sumofsc']) ? $get_f1099nec_info[0]['sumofsc'] : '';
                          // Calculate 10% of the value
                          $ans = $value * 0.1;
                    } else{
                        $ans = 0;
                    }
                ?>

                <div class="row4">
                    <input type="text" value="<?php echo $ans; ?>">
                </div>
                 <?php
                if($choice == 'Yes'){
                        if($get_f1099nec_info[0]['sumofamount']){
                            $state_tax = isset($get_f1099nec_info[0]['sumofamount']) ? $get_f1099nec_info[0]['sumofamount'] : '';

                        }else{
                            $state_tax = 0;
                        }
                    } else{
                        $state_tax = 0;
                    }                           
                ?>

                <div class="row5a">
                    <input type="text" value="<?php echo $state_tax; ?>">
                </div>

                <div class="row5b">
                    <input type="text" value="<?php echo $State_Tax_ID_Number; ?>">
                </div>

                <?php
                if (!empty($get_f1099nec_info[0]['sumofsc'])) {
                    $value = $get_f1099nec_info[0]['sumofsc'];
                } else {
                    $value = $sss;
                }
                ?>
                <div class="row6a">
                    <input type="text" value="<?php echo $value; ?>">
                </div>
                <div class="row6b">
                    <input type="text" value=" ">
                </div>

                <div class="row7a">
                    <input type="text" value=" ">
                </div>
                <div class="row7b">
                    <input type="text" value=" ">
                </div>
            </div>








 
            <div class="page-3" id="three">
                <img src="<?php echo base_url()  ?>asset/images/f1099_3.jpg" width="100%" />
                <div class="void"> 
                    <input type="checkbox"   value=""  >
                </div>
                <div class="corrected">
                    <input type="checkbox"   value="" >
                </div>
            
		<?php
				$company_name = isset($get_cominfo[0]['company_name']) ? $get_cominfo[0]['company_name'] : '';
				$address = isset($get_cominfo[0]['address']) ? $get_cominfo[0]['address'] : 'Default Address';
				?>

                <div class="payer-name">
				<textarea  name="company" id="company"  readonly><?php echo $company_name . "\n" . $address; ?></textarea>
		    	</div>

                <div class="year">
                    <input type="text" value="<?php echo date('Y'); ?>" readonly> 
                </div>

                <?php
                $State_Tax_ID_Number = isset($get_cominfo[0]['State_Tax_ID_Number']) ? $get_cominfo[0]['State_Tax_ID_Number'] : '';
                ?>

                <div class="payer-tin">
                    <input type="text" value="<?php echo $State_Tax_ID_Number; ?>">
                </div>

                <?php
                $recipient = isset($get_f1099nec_info[0]['social_security_number']) ? $get_f1099nec_info[0]['social_security_number'] : $get_f1099nec_info[0]['federalidentificationnumber'];
                ?>

                <div class="rep-tin">
                    <input type="text" value="<?php echo $recipient; ?>">
                </div>

                    <?php
                    if (!empty($get_f1099nec_info[0]['sumofsc'])) {
                        $value = $get_f1099nec_info[0]['sumofsc'];
                    } else {
                        $value = $sss;
                    }
                    ?>

                <div class="nominee">
                    <input type="text" value="<?php echo $value; ?> ">
                </div>

                <?php
                $Name = isset($get_f1099nec_info[0]['first_name'], $get_f1099nec_info[0]['middle_name'], $get_f1099nec_info[0]['last_name']) ? $get_f1099nec_info[0]['first_name'] . ' ' . $get_f1099nec_info[0]['middle_name'] . ' ' . $get_f1099nec_info[0]['last_name'] : '';
                ?>
 
                <div class="rep-name">
                    <input type="text" value="<?php echo $Name; ?>" style="width: 302px;">
                </div>


                <div class="sale">
                    <input type="checkbox" value="" >
                </div>

                                <?php
                $Address = isset($get_f1099nec_info[0]['address_line_1']) ? $get_f1099nec_info[0]['address_line_1'] : '';
                ?>

                <div class="street">
                    <input type="text" value="<?php echo $Address; ?>" style="width: 302px;" >
                </div>

				<?php
                    $CSCZ = isset($get_f1099nec_info[0]['city']) ? $get_f1099nec_info[0]['city'] . ', ' . $get_f1099nec_info[0]['state'] . ' ' . $get_f1099nec_info[0]['country'] . ' ' . $get_f1099nec_info[0]['zip'] : '';
                    ?>

                <div class="city">
                    <input type="text" value="<?php echo $CSCZ; ?>" style="width: 302px;" >
                </div>

				<?php
                $ACNUM = isset($get_f1099nec_info[0]['account_number']) ? $get_f1099nec_info[0]['account_number'] : '';
                ?>

                <div class="account">
                    <input type="text" value="<?php echo $ACNUM; ?>">
                </div>


                <?php

                    if($choice == 'Yes'){
                         $value = isset($get_f1099nec_info[0]['sumofsc']) ? $get_f1099nec_info[0]['sumofsc'] : '';
                          // Calculate 10% of the value
                          $ans = $value * 0.1;
                    } else{
                        $ans = 0;
                    }
                ?>

                <div class="row4">
                    <input type="text" value="<?php echo $ans; ?>">
                </div>
                 <?php
                if($choice == 'Yes'){
                        if($get_f1099nec_info[0]['sumofamount']){
                            $state_tax = isset($get_f1099nec_info[0]['sumofamount']) ? $get_f1099nec_info[0]['sumofamount'] : '';

                        }else{
                            $state_tax = 0;
                        }
                    } else{
                        $state_tax = 0;
                    }                           
                ?>

                <div class="row5a">
                    <input type="text" value="<?php echo $state_tax; ?>">
                </div>

                <div class="row5b">
                    <input type="text" value="<?php echo $State_Tax_ID_Number; ?>">
                </div>

                <?php
                if (!empty($get_f1099nec_info[0]['sumofsc'])) {
                    $value = $get_f1099nec_info[0]['sumofsc'];
                } else {
                    $value = $sss;
                }
                ?>
                <div class="row6a">
                    <input type="text" value="<?php echo $value; ?>">
                </div>
                <div class="row6b">
                    <input type="text" value=" ">
                </div>

                <div class="row7a">
                    <input type="text" value=" ">
                </div>
                <div class="row7b">
                    <input type="text" value=" ">
                </div>
            </div>


 
            <div class="page-4" id="four">
                <img src="<?php echo base_url()  ?>asset/images/f1099_4.jpg" width="100%" />
                <div class="void">
                    <input type="checkbox"  value="" >
                </div>
                <div class="corrected">
                    <input type="checkbox" value="" >
                </div>
                <?php
				$company_name = isset($get_cominfo[0]['company_name']) ? $get_cominfo[0]['company_name'] : '';
				$address = isset($get_cominfo[0]['address']) ? $get_cominfo[0]['address'] : 'Default Address';
				?>

                <div class="payer-name">
				<textarea  name="company" id="company"  readonly><?php echo $company_name . "\n" . $address; ?></textarea>
		    	</div>

                <div class="year">
                    <input type="text" value="<?php echo date('Y'); ?>" readonly> 
                </div>

                <?php
                $State_Tax_ID_Number = isset($get_cominfo[0]['State_Tax_ID_Number']) ? $get_cominfo[0]['State_Tax_ID_Number'] : '';
                ?>

                <div class="payer-tin">
                    <input type="text" value="<?php echo $State_Tax_ID_Number; ?>">
                </div>

                <?php
                $recipient = isset($get_f1099nec_info[0]['social_security_number']) ? $get_f1099nec_info[0]['social_security_number'] : $get_f1099nec_info[0]['federalidentificationnumber'];
                ?>

                <div class="rep-tin">
                    <input type="text" value="<?php echo $recipient; ?>">
                </div>

                    <?php
                    if (!empty($get_f1099nec_info[0]['sumofsc'])) {
                        $value = $get_f1099nec_info[0]['sumofsc'];
                    } else {
                        $value = $sss;
                    }
                    ?>

                <div class="nominee">
                    <input type="text" value="<?php echo $value; ?> ">
                </div>

                <?php
                $Name = isset($get_f1099nec_info[0]['first_name'], $get_f1099nec_info[0]['middle_name'], $get_f1099nec_info[0]['last_name']) ? $get_f1099nec_info[0]['first_name'] . ' ' . $get_f1099nec_info[0]['middle_name'] . ' ' . $get_f1099nec_info[0]['last_name'] : '';
                ?>
 
                <div class="rep-name">
                    <input type="text" value="<?php echo $Name; ?>" style="width: 302px;" >
                </div>


                <div class="sale">
                    <input type="checkbox" value="" >
                </div>

                                <?php
                $Address = isset($get_f1099nec_info[0]['address_line_1']) ? $get_f1099nec_info[0]['address_line_1'] : '';
                ?>

                <div class="street">
                    <input type="text" value="<?php echo $Address; ?>" style="width: 302px;" >
                </div>

				<?php
                    $CSCZ = isset($get_f1099nec_info[0]['city']) ? $get_f1099nec_info[0]['city'] . ', ' . $get_f1099nec_info[0]['state'] . ' ' . $get_f1099nec_info[0]['country'] . ' ' . $get_f1099nec_info[0]['zip'] : '';
                    ?>

                <div class="city">
                    <input type="text" value="<?php echo $CSCZ; ?>" style="width: 302px;" >
                </div>

				<?php
                $ACNUM = isset($get_f1099nec_info[0]['account_number']) ? $get_f1099nec_info[0]['account_number'] : '';
                ?>

                <div class="account">
                    <input type="text" value="<?php echo $ACNUM; ?>">
                </div>


                <?php

                    if($choice == 'Yes'){
                         $value = isset($get_f1099nec_info[0]['sumofsc']) ? $get_f1099nec_info[0]['sumofsc'] : '';
                          // Calculate 10% of the value
                          $ans = $value * 0.1;
                    } else{
                        $ans = 0;
                    }
                ?>

                <div class="row4">
                    <input type="text" value="<?php echo $ans; ?>">
                </div>
                 <?php
                if($choice == 'Yes'){
                        if($get_f1099nec_info[0]['sumofamount']){
                            $state_tax = isset($get_f1099nec_info[0]['sumofamount']) ? $get_f1099nec_info[0]['sumofamount'] : '';

                        }else{
                            $state_tax = 0;
                        }
                    } else{
                        $state_tax = 0;
                    }                           
                ?>

                <div class="row5a">
                    <input type="text" value="<?php echo $state_tax; ?>">
                </div>

                <div class="row5b">
                    <input type="text" value="<?php echo $State_Tax_ID_Number; ?>">
                </div>

                <?php
                if (!empty($get_f1099nec_info[0]['sumofsc'])) {
                    $value = $get_f1099nec_info[0]['sumofsc'];
                } else {
                    $value = $sss;
                }
                ?>
                <div class="row6a">
                    <input type="text" value="<?php echo $value; ?>">
                </div>
                <div class="row6b">
                    <input type="text" value=" ">
                </div>

                <div class="row7a">
                    <input type="text" value=" ">
                </div>
                <div class="row7b">
                    <input type="text" value=" ">
                </div>
            </div>


            <div class="page-5" id="five">
                <img src="<?php echo base_url()  ?>asset/images/f1099_5.jpg" width="100%" />
            </div>

            <div class="page-6" id="six">
                <img src="<?php echo base_url()  ?>asset/images/f1099_6.jpg" width="100%" />
                <div class="void">
                    <input type="checkbox" value=""  >
                </div>
                <div class="corrected">
                    <input type="checkbox" value="" >
                </div>


                <?php
				$company_name = isset($get_cominfo[0]['company_name']) ? $get_cominfo[0]['company_name'] : '';
				$address = isset($get_cominfo[0]['address']) ? $get_cominfo[0]['address'] : 'Default Address';
				?>

                <div class="payer-name">
				<textarea  name="company" id="company"  readonly><?php echo $company_name . "\n" . $address; ?></textarea>
		    	</div>

                <div class="year">
                    <input type="text" value="<?php echo date('Y'); ?>" readonly> 
                </div>

                <?php
                $State_Tax_ID_Number = isset($get_cominfo[0]['State_Tax_ID_Number']) ? $get_cominfo[0]['State_Tax_ID_Number'] : '';
                ?>

                <div class="payer-tin">
                    <input type="text" value="<?php echo $State_Tax_ID_Number; ?>">
                </div>

                <?php
                $recipient = isset($get_f1099nec_info[0]['social_security_number']) ? $get_f1099nec_info[0]['social_security_number'] : $get_f1099nec_info[0]['federalidentificationnumber'];
                ?>

                <div class="rep-tin">
                    <input type="text" value="<?php echo $recipient; ?>">
                </div>

                    <?php
                    if (!empty($get_f1099nec_info[0]['sumofsc'])) {
                        $value = $get_f1099nec_info[0]['sumofsc'];
                    } else {
                        $value = $sss;
                    }
                    ?>

                <div class="nominee">
                    <input type="text" value="<?php echo $value; ?> ">
                </div>

                <?php
                $Name = isset($get_f1099nec_info[0]['first_name'], $get_f1099nec_info[0]['middle_name'], $get_f1099nec_info[0]['last_name']) ? $get_f1099nec_info[0]['first_name'] . ' ' . $get_f1099nec_info[0]['middle_name'] . ' ' . $get_f1099nec_info[0]['last_name'] : '';
                ?>
 
                <div class="rep-name">
                    <input type="text" value="<?php echo $Name; ?>" style="width: 302px;" >
                </div>


                <div class="sale">
                    <input type="checkbox" value="" >
                </div>

                                <?php
                $Address = isset($get_f1099nec_info[0]['address_line_1']) ? $get_f1099nec_info[0]['address_line_1'] : '';
                ?>

                <div class="street">
                    <input type="text" value="<?php echo $Address; ?>" style="width: 302px;"  >
                </div>

				<?php
                    $CSCZ = isset($get_f1099nec_info[0]['city']) ? $get_f1099nec_info[0]['city'] . ', ' . $get_f1099nec_info[0]['state'] . ' ' . $get_f1099nec_info[0]['country'] . ' ' . $get_f1099nec_info[0]['zip'] : '';
                    ?>

                <div class="city">
                    <input type="text" value="<?php echo $CSCZ; ?>" style="width: 302px;" >
                </div>

				<?php
                $ACNUM = isset($get_f1099nec_info[0]['account_number']) ? $get_f1099nec_info[0]['account_number'] : '';
                ?>

                <div class="account">
                    <input type="text" value="<?php echo $ACNUM; ?>">
                </div>


                <?php

                    if($choice == 'Yes'){
                         $value = isset($get_f1099nec_info[0]['sumofsc']) ? $get_f1099nec_info[0]['sumofsc'] : '';
                          // Calculate 10% of the value
                          $ans = $value * 0.1;
                    } else{
                        $ans = 0;
                    }
                ?>

                <div class="row4">
                    <input type="text" value="<?php echo $ans; ?>">
                </div>
                 <?php
                if($choice == 'Yes'){
                        if($get_f1099nec_info[0]['sumofamount']){
                            $state_tax = isset($get_f1099nec_info[0]['sumofamount']) ? $get_f1099nec_info[0]['sumofamount'] : '';

                        }else{
                            $state_tax = 0;
                        }
                    } else{
                        $state_tax = 0;
                    }                           
                ?>

                <div class="row5a">
                    <input type="text" value="<?php echo $state_tax; ?>">
                </div>

                <div class="row5b">
                    <input type="text" value="<?php echo $State_Tax_ID_Number; ?>">
                </div>

                <?php
                if (!empty($get_f1099nec_info[0]['sumofsc'])) {
                    $value = $get_f1099nec_info[0]['sumofsc'];
                } else {
                    $value = $sss;
                }
                ?>
                <div class="row6a">
                    <input type="text" value="<?php echo $value; ?>">
                </div>
                <div class="row6b">
                    <input type="text" value=" ">
                </div>

                <div class="row7a">
                    <input type="text" value=" ">
                </div>
                <div class="row7b">
                    <input type="text" value=" ">
                </div>
            </div>

<style>
    .page-1,
.page-2,
.page-3,
.page-4,
.page-5,
.page-6 {
  width: 21cm;
  height: 29.7cm;
  position: relative;
  margin: 0 auto;
  page-break-after: always;
}
input,
textarea {
  border: 0;
  background-color: transparent;
  /* text-align: center; */
}
.void {
  position: absolute;
  top: 28px;
  left: 243px;
}
.corrected {
  position: absolute;
  top: 28px;
  left: 317px;
}
.payer-name textarea {
  height: 58px;
  width: 309px;
}
.payer-name {
  position: absolute;
  top: 79px;
  left: 70px;
  font-size: 10px;
}
.year {
  position: absolute;
  top: 118px;
  left: 543px;
}
.payer-tin {
  position: absolute;
  top: 153px;
  left: 70px;
}
.rep-tin {
  position: absolute;
  top: 153px;
  left: 229px;
}
.nominee {
  position: absolute;
  top: 153px;
  left: 397px;
}
.rep-name {
  position: absolute;
  top: 188px;
  left: 70px;
}
.sale {
  position: absolute;
  top: 176px;
  left: 627px;
}
.street {
	position: absolute;
    top: 231px;
    left: 70px;
    font-size: 9px;
}
.city {
  position: absolute;
  top: 263px;
  left: 70px;
  font-size: 10px;
}
.account {
  position: absolute;
  top: 291px;
  left: 70px;
}
.row3 {
  position: absolute;
  top: 153px;
  left: 397px;
}
.row4 {
  position: absolute;
  top: 246px;
  left: 397px;
}
.row5a {
  position: absolute;
  top: 277px;
  left: 397px;
}
.row5b {
  position: absolute;
  top: 277px;
  left: 507px;
}
.row6a {
  position: absolute;
  top: 277px;
  left: 660px;
}
.row6b {
  position: absolute;
  top: 294px;
  left: 498px;
}
.row7a {
  position: absolute;
  top: 277px;
  left: 657px;
}
.row7b {
  position: absolute;
  top: 294px;
  left: 657px;
}

</style>
    </body>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script>
        async function downloadPagesAsPDF() {
            const elements = [
                document.getElementById('one'),
                document.getElementById('two'),
                document.getElementById('three'),
                document.getElementById('four'),
                document.getElementById('five'),
                document.getElementById('six')
            ];

            // Check if all elements are found
            if (elements.some(element => element === null)) {
                alert('One or more elements not found');
                return;
            }

            const canvases = await Promise.all(elements.map(element =>
                html2canvas(element, {
                    scale: 2
                })
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

            pdf.save('F1099.pdf');
        }
    </script> -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script>
        async function downloadPagesAsPDF() {
            const elements = [
                document.getElementById('one'),
                document.getElementById('two'),
                document.getElementById('three'),
                document.getElementById('four'),
                document.getElementById('five'),
                document.getElementById('six')
            ];

            // Function to replace form fields with their values
            function replaceFormFieldsWithValues() {
                document.querySelectorAll('input, textarea').forEach(el => {
                    const span = document.createElement('span');
                    span.textContent = el.value;
                    span.style.whiteSpace = 'pre-wrap'; // Preserve whitespace
                    span.style.fontFamily = 'inherit'; // Match font
                    span.style.fontSize = 'inherit'; // Match font size
                    el.replaceWith(span);
                });
            }

            // Function to restore form fields
            function restoreFormFields() {
                // Implement a similar logic to restore original form fields
            }

            // Replace form fields with their values
            replaceFormFieldsWithValues();

            // Capture canvases
            const canvases = await Promise.all(elements.map(element =>
                html2canvas(element, { scale: 2 })
            ));

            // Restore form fields
            restoreFormFields();

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

            pdf.save('F1099.pdf');
        }
    </script>



</html>