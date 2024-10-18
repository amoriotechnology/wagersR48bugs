

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" />

<script src="<?php echo base_url() ?>my-assets/js/admin_js/invoice.js" type="text/javascript"></script>
 <script src="<?php echo base_url() ?>my-assets/js/countrypicker.js" type="text/javascript"></script>




<!-- Edit new bank start -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('bank_edit') ?></h1>
            <small><?php echo display('') ?></small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('bank') ?></a></li>
                <li class="active" style="color:orange;"><?php echo display('bank_edit') ?></li>
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


        <!-- New bank -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                  

                    <div class="panel-heading" style="height: 50px;">
                        <div class="panel-title">
                               <a style="float:right;color:white;" href="<?php echo base_url('Csettings/bank_list') ?>" class="btnclr btn  m-b-5 m-r-2"><i class="ti-align-justify"> </i> <?php echo display('manage_bank')?> </a>
                        </div>
                    </div>





                   <?php echo form_open_multipart('Csettings/update_bank/'.$bank_list[0]['bank_id'],array('class' => 'form-vertical','id' => 'validate' ))?>
                    <div class="panel-body">

                    	<div class="form-group row">
                            <label for="bank_name" class="col-sm-3 col-form-label"><?php echo display('bank_name') ?> <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="bank_name" id="bank_name" required="" placeholder="<?php echo display('bank_name') ?>" value="<?php echo $bank_list[0]['bank_name']?>" tabindex="1"/>
                                <input type="hidden" name="oldname" value="<?php echo $bank_list[0]['bank_name']?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ac_name" class="col-sm-3 col-form-label"><?php echo display('ac_name') ?> <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="ac_name" id="ac_name" required="" placeholder="<?php echo display('ac_name') ?>" value="<?php echo $bank_list[0]['ac_name']?>" tabindex="2"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ac_no" class="col-sm-3 col-form-label"><?php echo display('ac_no') ?> <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="ac_no" id="ac_no" required="" placeholder="<?php echo display('ac_no') ?>" value="<?php echo $bank_list[0]['ac_number']?>" tabindex="3"/>
                            </div>
                        </div>
<div class="form-group row">
                            <label for="ac_no" class="col-sm-3 col-form-label"><?php echo ('Routing Number') ?> <i class="text-danger"></i></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="rt_no" id="rt_no"  placeholder="<?php echo ('Routing Number') ?>"  value="<?php echo $bank_list[0]['rounting_num']?>"   tabindex="3"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="branch" class="col-sm-3 col-form-label"><?php echo display('branch') ?> <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="branch" id="branch" required="" placeholder="<?php echo display('branch') ?>" value="<?php echo $bank_list[0]['branch']?>" tabindex="4"/>
                            </div>
                        </div>

                    

                        <div class="form-group row">
  <label for="shipping_line" class="col-sm-3 col-form-label">Country
                                        <i class="text-danger"></i>
                                    </label>
                                    <div class="col-sm-6">
                                    <select class="selectpicker countrypicker form-control"  data-live-search="true" data-default="<?php echo $bank_list[0]['country']?>"     name="country" id="country" style="width:100%"></select>
                                 
                                    </div>

</div>





<div class="form-group row">
            <label for="previous_balance" class="col-sm-3 col-form-label"><?php echo "Currency" ?></label>
            <div class="col-sm-6">
            <select name="currency1" class="currency form-control" id="currency1" style="width: 100%;">
            <option id="im" value="<?php echo $bank_list[0]['currency']?>"><?php echo $bank_list[0]['currency']?></option>
    </select>
    
<input type="hidden" name="" id="num" >
<div class="right_box" style="display:none;">
<select name="currency1" class="currency form-control" id="currency2" style="width: 95%;"></select>
<input type="hidden" name="" id="ans" >
</div>
<small id="errorMSG" style="display:none;"></small>
<br><br>
</div>
 </div>

</div>



  </div>





                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-4 col-form-label"></label>
                            <div class="col-sm-2">
                                <input type="submit" id="add-deposit" class="btnclr btn m-b-5 m-r-2" name="add-deposit" value="<?php echo display('save_changes') ?>" tabindex="6"/>
                            </div>
                        </div>
                    </div>
                    <?php echo form_close()?>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Edit new bank end -->


<!-- script for currency selector -->
<script>
    var new_sale_total=localStorage.getItem("customer_grand_amount_sale");
    $('#amount_to_pay').val(new_sale_total);
    
    var customer_name=localStorage.getItem("sale_customer_name");
    $('#cutomer_name').val(customer_name);

  var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';
const select = document.querySelectorAll(".currency");
const btn = document.getElementById("btn");
const num = document.getElementById("num");
const ans = document.getElementById("ans");
const err = document.getElementById("errorMSG");
const info = document.getElementById("info");
const baseFlagsUrl = "https://wise.com/public-resources/assets/flags/rectangle";
const currencyApiUrl = "https://open.er-api.com/v6/latest";
document.addEventListener('DOMContentLoaded', function(){
  fetch(currencyApiUrl)
    .then((data) => data.json())
    .then((data) => {
    err.innerHTML = "";
    display(data.rates);
    $('.currency').select2({
      width: 'resolve',
    
   
      maximumInputLength: 3
    });
    info.innerHTML = "Result: "+data.result+"<br>Provider: "+data.provider+"<br>Documentation: "+data.documentation+"<br>Terms of use: "+data.terms_of_use+"<br>Time Last Update UTC: "+data.time_last_update_utc;
    $('#pageLoader').fadeOut();
  }).catch(function(error) {
    err.innerHTML = "Error: " + error;
    $('#pageLoader').fadeOut();
  });


  
$('.currency').on('select2:select', function (e) {
    let currency1 = select[0].value;
    let currency2 = select[1].value;
    let num1 = num.value;
    convert(currency1, currency2, num1)
  });
}, false);
function display(data){
  const entries = Object.entries(data);
  for (var i = 0; i < entries.length; i++){
    select[0].innerHTML += `<option value="${entries[i][0]}">${entries[i][0]}</option>`;
    select[1].innerHTML += `<option value="${entries[i][0]}">${entries[i][0]}</option>`;
  }
  if ($('#currency2').find("option[value='CLP']").length) {
    $('#currency2').val('CLP').trigger('change');
    $('#num').val(1);
    let currency1 = select[0].value;
    let currency2 = select[1].value;
    let num1 = num.value;
    convert(currency1, currency2, num1)
  }
}


function convert(currency1, currency2, value){
  fetch(`${currencyApiUrl}/${currency1}`)
    .then((val) => val.json())
    .then((val) => {
    console.log('Converting ' +currency1 + ' to '+currency2);
    var res  = val.rates[currency2] * value
    ans.value = res.toFixed(2);
    err.innerHTML = "";
  }).catch(function(error) {
    err.innerHTML = "Error: " + error;
  });
}
    </script>
<!-- style for currency list   -->
<style>
.img-flag{
  max-height: 11px;
 display: none;
}

.select2-selection{
    display: none;

}

.btnclr{
       background-color:<?php echo $setting_detail[0]['button_color']; ?>;
       color: white;

   }

    </style>


