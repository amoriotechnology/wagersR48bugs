<script src="<?php echo base_url() ?>my-assets/js/admin_js/account.js" type="text/javascript"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">


<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" />


<div class="content-wrapper">
<style>

.input-symbol-euro::before {
 content: '<?php echo $currency; ?>';
  
  font-size: 1.5em;
  position: absolute;
  left: 5px;
  top: 50%;
  transform: translateY(-50%);
}
.input-symbol-euro {
      font-size: 10px;
  display: inline-block;
  position: relative;
}

    </style>
    <section class="content-header">

        <div class="header-icon">

            <i class="pe-7s-note2"></i>

        </div>

        <div class="header-title">

            <h1>  <?php echo display('supplier_payment')?> </h1>

            <small><?php //echo display('supplier_payment') ?></small>

            <ol class="breadcrumb">

                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>

                <li><a href="#"><?php echo display('accounts') ?></a></li>

                <li class="active" style="color:orange;"><?php echo display('supplier_payment') ?></li>

            </ol>

        </div>

    </section>


<style>
.select2-selection__rendered{
    display:none;
}
    </style>

    <section class="content">

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

        <div class="panel panel-bd lobidrag">

            <div class="panel-heading">

                <div class="panel-title">

                    <h4>

                      
                  <a   href="<?php echo base_url('accounts/supplier_payment_manager') ?>" class="btnclr btn  m-b-5 m-r-2" style="color:white;float:right;" ><i class="ti-align-justify"> </i> <?php echo ('Manage Accounts') ?> </a>

                    </h4>

                </div>

            </div>

            <div class="panel-body">

               <?php
$maxNumericPart = 0;

foreach ($voucher_no as $voucher) {
    $voucherParts = explode('-', $voucher['voucher']);
    if (count($voucherParts) == 2) {
        $numericPart = (int)$voucherParts[1];
        if ($numericPart > $maxNumericPart) {
            $maxNumericPart = $numericPart;
        }
    }
}

$newNumericPart = $maxNumericPart + 1;

$voucher_n = 'SP-' . $newNumericPart;
?>


                         <?php echo  form_open_multipart('accounts/create_supplier_payment','id="validate"') ?>

                     <div class="form-group row">

                        <label for="vo_no" class="col-sm-2 col-form-label"><?php echo display('voucher_no')?></label>

                        <div class="col-sm-4">

                             <input type="text" name="txtVNo" id="txtVNo" readonly value="<?php echo $voucher_n; ?>" class="form-control" placeholder="Voucher No">

                        </div>

                    </div> 

                     <div class="form-group row">

                        <label for="date" class="col-sm-2 col-form-label"><?php echo display('date')?><i class="text-danger">*</i></label>

                        <div class="col-sm-4">

                             <input type="date" name="dtpDate" id="dtpDate" class="form-control datepicker" value="<?php  echo date('Y-m-d');?>" required>

                        </div>

                    </div> 

                                  <div class="form-group row">

                                    <label for="payment_type" class="col-sm-2 col-form-label"><?php

                                        echo display('payment_type');

                                        ?> <i class="text-danger">*</i></label>

                                    <div class="col-sm-4">

                                        <select name="paytype" class="form-control paytype" required id="pay_type" onchange="bank_paymet(this.value)">


                                        <option selected>Select Payment Type</option>

                                  <option value="2" ><?php echo display('bank_payment');?></option>

                                  <option value="1"><?php echo display('cash_payment');?></option> 
<?php foreach($payment_type as $ptype){?>
    <option value="<?php echo $ptype['payment_type'];?>"><?php echo $ptype['payment_type'] ;?></option>
<?php }?>
                                        </select>

                                      



                                     

                                    </div>

                                 

                               

                    </div>



                       

                            <div class="form-group row" id="bank_div">

                                <label for="bank" class="col-sm-2 col-form-label"><?php

                                    echo display('bank');

                                    ?> <i class="text-danger">*</i></label>

                                <div class="col-sm-4">

                                   <select name="bank_id" class="form-control bankpayment " required id="bank_id">

                         <option value="">Select Bank</option>
                         <option value="JPMorgan Chase">JPMorgan Chase</option>
<option value="New York City">New York City</option>
<option value="Bank of America">Bank of America</option>
<option value="Citigroup">Citigroup</option>
<option value="Wells Fargo">Wells Fargo</option>
<option value="Goldman Sachs">Goldman Sachs</option>
<option value="Morgan Stanley">Morgan Stanley</option>
<option value="U.S. Bancorp">U.S. Bancorp</option>
<option value="PNC Financial Services">PNC Financial Services</option>
<option value="Truist Financial">Truist Financial</option>
<option value="Charles Schwab Corporation">Charles Schwab Corporation</option>
<option value="TD Bank, N.A.">TD Bank, N.A.</option>
<option value="Capital One">Capital One</option>
<option value="The Bank of New York Mellon">The Bank of New York Mellon</option>
<option value="State Street Corporation">State Street Corporation</option>
<option value="American Express">American Express</option>
<option value="Citizens Financial Group">Citizens Financial Group</option>
<option value="HSBC Bank USA">HSBC Bank USA</option>
<option value="SVB Financial Group">SVB Financial Group</option>
<option value="First Republic Bank ">First Republic Bank </option>
<option value="Fifth Third Bank">Fifth Third Bank</option>
<option value="BMO USA">BMO USA</option>
<option value="USAA">USAA</option>
<option value="UBS">UBS</option>
<option value="M&T Bank">M&T Bank</option>
<option value="Ally Financial">Ally Financial</option>
<option value="KeyCorp">KeyCorp</option>
<option value="Huntington Bancshares">Huntington Bancshares</option>
<option value="Barclays">Barclays</option>
<option value="Santander Bank">Santander Bank</option>
<option value="RBC Bank">RBC Bank</option>
<option value="Ameriprise">Ameriprise</option>
<option value="Regions Financial Corporation">Regions Financial Corporation</option>
<option value="Northern Trust">Northern Trust</option>
<option value="BNP Paribas">BNP Paribas</option>
<option value="Discover Financial">Discover Financial</option>
<option value="First Citizens BancShares">First Citizens BancShares</option>
<option value="Synchrony Financial">Synchrony Financial</option>
<option value="Deutsche Bank">Deutsche Bank</option>
<option value="New York Community Bank">New York Community Bank</option>
<option value="Comerica">Comerica</option>
<option value="First Horizon National Corporation">First Horizon National Corporation</option>
<option value="Raymond James Financial">Raymond James Financial</option>
<option value="Webster Bank">Webster Bank</option>
<option value="Western Alliance Bank">Western Alliance Bank</option>
<option value="Popular, Inc.">Popular, Inc.</option>
<option value="CIBC Bank USA">CIBC Bank USA</option>
<option value="East West Bank">East West Bank</option>
<option value="Synovus">Synovus</option>
<option value="Valley National Bank">Valley National Bank</option>
<option value="Credit Suisse ">Credit Suisse </option>
<option value="Mizuho Financial Group">Mizuho Financial Group</option>
<option value="Wintrust Financial">Wintrust Financial</option>
<option value="Cullen/Frost Bankers, Inc.">Cullen/Frost Bankers, Inc.</option>
<option value="John Deere Capital Corporation">John Deere Capital Corporation</option>
<option value="MUFG Union Bank">MUFG Union Bank</option>
<option value="BOK Financial Corporation">BOK Financial Corporation</option>
<option value="Old National Bank">Old National Bank</option>
<option value="South State Bank">South State Bank</option>
<option value="FNB Corporation">FNB Corporation</option>
<option value="Pinnacle Financial Partners">Pinnacle Financial Partners</option>
<option value="PacWest Bancorp">PacWest Bancorp</option>
<option value="TIAA">TIAA</option>
<option value="Associated Banc-Corp">Associated Banc-Corp</option>
<option value="UMB Financial Corporation">UMB Financial Corporation</option>
<option value="Prosperity Bancshares">Prosperity Bancshares</option>
<option value="Stifel">Stifel</option>
<option value="BankUnited">BankUnited</option>
<option value="Hancock Whitney">Hancock Whitney</option>
<option value="MidFirst Bank">MidFirst Bank</option>
<option value="Sumitomo Mitsui Banking Corporation">Sumitomo Mitsui Banking Corporation</option>
<option value="Beal Bank">Beal Bank</option>
<option value="First Interstate BancSystem">First Interstate BancSystem</option>
<option value="Commerce Bancshares">Commerce Bancshares</option>
<option value="Umpqua Holdings Corporation">Umpqua Holdings Corporation</option>
<option value="United Bank (West Virginia)">United Bank (West Virginia)</option>
<option value="Texas Capital Bank">Texas Capital Bank</option>
<option value="First National of Nebraska">First National of Nebraska</option>
<option value="FirstBank Holding Co">FirstBank Holding Co</option>
<option value="Simmons Bank">Simmons Bank</option>
<option value="Fulton Financial Corporation">Fulton Financial Corporation</option>
<option value="Glacier Bancorp">Glacier Bancorp</option>
<option value="Arvest Bank">Arvest Bank</option>
<option value="BCI Financial Group">BCI Financial Group</option>
<option value="Ameris Bancorp">Ameris Bancorp</option>
<option value="First Hawaiian Bank">First Hawaiian Bank</option>
<option value="United Community Bank">United Community Bank</option>
<option value="Bank of Hawaii">Bank of Hawaii</option>
<option value="Home BancShares">Home BancShares</option>
<option value="Eastern Bank">Eastern Bank</option>
<option value="Cathay Bank">Cathay Bank</option>
<option value="Pacific Premier Bancorp">Pacific Premier Bancorp</option>
<option value="Washington Federal">Washington Federal</option>
<option value="Customers Bancorp">Customers Bancorp</option>
<option value="Atlantic Union Bank">Atlantic Union Bank</option>
<option value="Columbia Bank">Columbia Bank</option>
<option value="Heartland Financial USA">Heartland Financial USA</option>
<option value="WSFS Bank">WSFS Bank</option>
<option value="Central Bancompany">Central Bancompany</option>
<option value="Independent Bank">Independent Bank</option>
<option value="Hope Bancorp">Hope Bancorp</option>
<option value="SoFi">SoFi</option>
                                        <?php foreach($bank_list as $bank){?>

                                            <option value="<?php echo html_escape($bank['bank_id'])?>"><?php echo html_escape($bank['bank_name']);?></option>

                                        <?php }?>

                                    </select>

                                 

                                </div>

                             

                            </div>

                       <div class="form-group row">

                        <label for="txtRemarks" class="col-sm-2 col-form-label"><?php echo display('remark')?></label>

                        <div class="col-sm-4">

                          <textarea  name="txtRemarks" id="txtRemarks" class="form-control"></textarea>

                        </div>

                    </div> 

                   

                       <div class="table-responsive">

                            <table class="table table-bordered table-hover" id="debtAccVoucher"> 

                                <thead>

                                    <tr class="btnclr" >

                                <th class="text-center"><?php echo display('supplier_name')?><i class="text-danger">*</i></th>

                                <th class="text-center"><?php echo display('code')?></th>

                                <th class="text-center"><?php echo display('amount')?><i class="text-danger">*</i></th>

                                          

                                    </tr>

                                </thead>

                                <tbody id="debitvoucher">

                                   

                                    <tr>

                                        <td class="" width="300">  

       <select name="supplier_id" id="supplier_id_1" class="form-control" onchange="load_supplier_code(this.value,1)" required>

        <option value="">Select Supplier</option>

     

         <?php foreach ($supplier_list as $suplier) {?>

   <option value="<?php echo html_escape($suplier->supplier_id);?>"><?php echo html_escape($suplier->supplier_name);?></option>

         <?php }?>

       </select>



                                         </td>

                                        <td><input type="text" name="txtCode" value="" class="form-control "  id="txtCode_1" readonly=""></td>

                                        <td style="width:600px;"><span class="input-symbol-euro"><input type="number" name="txtAmount" style="width:600px;text-align:start;padding-left: 20px;" placeholder="0.00"  value="" class="form-control total_price text-right"  id="txtAmount_1" onkeyup="supplierRcvcalculation(1)" required></span>

                                           </td>

                                 

                                    </tr>                              

                              

                                </tbody>                               

                             <tfoot>

                                    <tr>

                                      <td >



                                        </td>

                                        <td colspan="1" class="text-right"><label  for="reason" class="  col-form-label"><?php echo display('total') ?></label>

                                           </td>

                                        <td class="text-right">

                                          <span class="input-symbol-euro">  <input type="text" id="grandTotal" class="form-control text-right " name="grand_total" value="" placeholder="0.00"  readonly="readonly" style="width:600px;text-align:start;padding-left: 20px;" /></span>

                                        </td>

                                    </tr>

                                </tfoot>

                            </table>

                        </div>

                        <div class="form-group row">

                           

                            <div class="col-sm-12 text-left">



                                <input type="submit" id="add_receive"  class="btnclr btn btn-success btn-large" name="save" value="<?php echo display('save') ?>" tabindex="9"/>

                               

                            </div>

                        </div>

                  <?php echo form_close() ?>

            </div>  

        </div>

    </div>

</div>

</section>

</div>


<style>

.btnclr{
       background-color:<?php echo $setting_detail[0]['button_color']; ?>;
       color: white;

   }

</style>