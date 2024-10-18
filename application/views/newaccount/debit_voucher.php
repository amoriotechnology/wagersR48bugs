<script src="<?php echo base_url() ?>my-assets/js/admin_js/account.js" type="text/javascript"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" />


<style>
    .select2{
        display:none;
    }
 

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
th{
    color:black;
}

    </style>
<div class="content-wrapper">
    <section class="content-header" style='height:70px;'>
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('debit_voucher') ?></h1>
            <small><?php //echo display('debit_voucher') ?></small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('accounts') ?></a></li>
                <li class="active" style="color:orange"><?php echo display('debit_voucher') ?></li>
            </ol>
        </div>
    </section>

    <section class="content">
            <?php
        $message = $this->session->userdata('message');
        if (isset($message)) {
            ?>
            <div class="alert alert-info alert-dismissable" style="background: #38469f;color:white;font-weight:bold;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $message ?>                    
            </div>
            <?php
            $this->session->unset_userdata('message');
        }
        $error_message = $this->session->userdata('error_message');
        if (isset($error_message)) {
            ?>
            <div class="alert alert-danger alert-dismissable" style="background: #38469f;color:white;font-weight:bold;">
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
                   <div class="panel-title" style='text-align:end;'>
                      <a  class="btnclr btn btn-default dropdown-toggle  boxes filip-horizontal "  href="<?php echo base_url('accounts/debit_manager') ?>" style="background-color: #3CA5DE; color: #fff; height:fit-content;"  id="s_icon">Manage Debit Voucher  </a>
                
                </div>
            </div>
            <div class="panel-body">
              
                         <?php echo  form_open_multipart('accounts/create_debit_voucher','id="validate"') ?>
                     <div class="form-group row">
                        <label for="vo_no" class="col-sm-2 col-form-label"><?php echo display('voucher_no')?></label>
                        <div class="col-sm-4">
                             <input type="text" name="txtVNo" id="txtVNo" value="<?php if(!empty($voucher_no[0]['voucher'])){
                               $vn = substr($voucher_no[0]['voucher'],3)+1;
                              echo $voucher_n = 'DV-'.$vn;
                             }else{
                               echo $voucher_n = 'DV-1';
                             } ?>" class="form-control" readonly>
                        </div>
                    </div> 
                     <div class="form-group row">
                        <label for="ac" class="col-sm-2 col-form-label"><?php echo display('credit_account_head')?><i class="text-danger">*</i></label>
                        <div class="col-sm-4">
                          <select name="cmbDebit" id="cmbDebit" class="form-control" required="">
                       
                               <option >Select Account Name</option>

                            <?php foreach ($bank_list as $cracc) { ?>
                            <option value="<?php echo $cracc['bank_name'];?>"><?php echo $cracc['bank_name'];?></option>
                           <?php  } ?>

                          </select>
                        </div>
                    </div> 
                     <div class="form-group row">
                        <label for="date" class="col-sm-2 col-form-label"><?php echo display('date')?><i class="text-danger">*</i></label>
                        <div class="col-sm-4">
                             <input type="date" name="dtpDate" id="dtpDate" class="form-control datepicker" value="<?php  echo date('Y-m-d');?>" required>
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
                                    <tr>
                                        <th class="text-center"><?php echo display('account_name')?><i class="text-danger">*</i></th>
                                         <th class="text-center"><?php echo display('code')?></th>
                                          <th class="text-center" style="width:300px;"><?php echo display('amount')?><i class="text-danger">*</i></th>
                                           <th class="text-center" ><?php echo display('action')?></th>  
                                    </tr>
                                </thead>
                                <tbody id="debitvoucher">
                                   
                                    <tr>
                                        <td class="" width="250">  
       <select name="cmbCode[]" id="cmbCode_1" class="ac_name form-control"  required="">
        <option >Select Account Name</option>
         <?php foreach ($crcc as $acc1) {?>
   <option value="<?php echo $acc1['ac_name'];?>"><?php echo $acc1['ac_name'];?></option>
         <?php }?>
       </select>

                                         </td>
                                        <td><input type="text" name="txtCode[]" value="" class="bnk_name form-control "  id="txtCode_1" readonly=""></td>
                                        <td style="text-align:center;"><span class="input-symbol-euro"><input type="number" name="txtAmount[]" placeholder="0.00" class="form-control total_price text-left"  id="txtAmount_1" onkeyup="dbtvouchercalculation(1)" required=""></span>
                                           </td>
                                       <td style="text-align:center;">
                                                <button  class="btn btn-danger red text-right" type="button" value="<?php echo display('delete')?>" onclick="deleteRowdbtvoucher(this)"><i class="fa fa-trash-o"></i></button>
                                            </td>
                                    </tr>                              
                              
                                </tbody>                               
                             <tfoot>
                                    <tr>
                                      <td >
                                          
                                        </td>
                                        <td colspan="1" class="text-right"><label  for="reason" class="  col-form-label"><?php echo display('total') ?></label>
                                           </td>
                                        <td class="text-left"  style="text-align:center;"  >
                                            <span class="input-symbol-euro"><input type="text" id="grandTotal" class="form-control text-left " name="grand_total" value="0.00" readonly="readonly" /></span>
                                        </td>
                                        <td style="text-align:center;"> <a id="add_more" class="btn" name="add_more"  style="color:white;background-color:#38469f;" onClick="addaccountdbt('debitvoucher')"><i class="fa fa-plus"></i></a>
                                         </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="form-group row">
                           
                            <div class="col-sm-12 text-left">

                                <input type="submit" id="add_receive" class="btn" style="color:white;background-color:#38469f;" name="save" value="<?php echo display('save') ?>" tabindex="9"/>
                               
                            </div>
                        </div>
                  <?php echo form_close() ?>
            </div>  

          
        </div>
    </div>
</div>
</section>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
    function addaccountContravoucher(divName) {
    var optionval = $("#headoption").val();
    var row = $("#debtAccVoucher tbody tr").length;
    var count = row + 1;
    var limits = 500;
    var tabin = 0;

    if (count == limits) {
        alert("You have reached the limit of adding " + count + " inputs");
    } else {
        var newdiv = document.createElement('tr');
        var tabin = "cmbCode_" + count;
        var tabindex = count * 2;
        newdiv = document.createElement("tr");

        newdiv.innerHTML = "<td> <select name='cmbCode[]' id='cmbCode_" + count + "' class='ac_name form-control' required><?php foreach ($crcc as $acc1) { ?><option value='<?php echo $acc1['ac_name'];?>'><?php echo $acc1['ac_name'];?></option><?php } ?></select></td><td><input type='text' name='txtCode[]' class='bnk_name form-control' id='txtCode_" + count + "'></td><td class='text-left'><span class='input-symbol-euro'><input type='number' name='txtAmount[]' class='form-control total_price text-right' style='text-align: inherit;' value='0.00' id='txtAmount_" + count + "' onkeyup='calculationContravoucher(" + count + ")'></span></td><td class='text-left'><span class='input-symbol-euro'><input type='number' name='txtAmountcr[]' class='form-control total_price1 text-right' style='text-align: inherit;' id='txtAmount1_" + count + "' value='0.00' onkeyup='calculationContravoucher(" + count + ")'></span></td><td style='text-align:center;'><button class='btn btn-danger red' type='button' onclick='deleteRowContravoucher(this)'><i class='fa fa-trash-o'></i></button></td>";
        document.getElementById(divName).appendChild(newdiv);
        document.getElementById(tabin).focus();
        $("#cmbCode_" + count).html(optionval);
        count++;

        $("select.form-control:not(.dont-select-me)").select2({
            placeholder: "Select option",
            allowClear: true
        });
    }
}
   var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
   var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';
$(document).on('change', '.ac_name', function(e) {
    e.preventDefault();
      var $this = $(this);
    var data = {
        ac_name: $(this).val()
    };
    data[csrfName] = csrfHash;

    $.ajax({
        type: 'POST',
        data: data,
        dataType: "json",
        url: 'https://amoriotech.net/Stockeai/accounts/get_bank_name',
        success: function (data) {
           var bnk_name = data.bnk_name[0].bank_name; // Extract the bank_name
    // Use the bnk_name as needed
    console.log('Bank Name: ' + bnk_name);
   $this.closest('tr').find('.bnk_name').val(bnk_name);
        }
    });
});
function dbtvouchercalculation(sl) {
       
        var gr_tot = 0;
        $(".total_price").each(function() {
            isNaN(this.value) || 0 == this.value.length || (gr_tot += parseFloat(this.value))
        });

        $("#grandTotal").val(gr_tot.toFixed(2,2));
    }
   function addaccountdbt(divName){
       var optionval = $("#headoption").val();
    var row = $("#debtAccVoucher tbody tr").length;
    var count = row + 1;
    var limits = 500;
    var tabin = 0;
    if (count == limits) alert("You have reached the limit of adding " + count + " inputs");
    else {
          var newdiv = document.createElement('tr');
          var tabin="cmbCode_"+count;
          var tabindex = count * 2;
          newdiv = document.createElement("tr");
           
          newdiv.innerHTML ="<td> <select name='cmbCode[]' id='cmbCode_"+ count +"' class='ac_name form-control'  required><option value=''>Select Account Name</option><?php foreach ($crcc as $acc1) { ?><option value='<?php echo $acc1['ac_name'];?>'><?php echo $acc1['ac_name'];?></option><?php } ?></select></td><td><input type='text' readonly name='txtCode[]' class='bnk_name form-control'  id='txtCode_"+ count +"' ></td><td  class='text-left' style='text-align:center;'><span class='input-symbol-euro'><input type='number' name='txtAmount[]' class='form-control total_price text-right' id='txtAmount_"+ count +"' onkeyup='dbtvouchercalculation("+ count +")' placeholder='0.00' style='text-align: initial;' required></span></td><td style='text-align:center;' ><button class='btn btn-danger red' type='button'  onclick='deleteRowdbtvoucher(this)'><i class='fa fa-trash-o'></i></button></td>";
          document.getElementById(divName).appendChild(newdiv);
          document.getElementById(tabin).focus();
           $("#cmbCode_"+count).html(optionval);
          count++;
           
          $("select.form-control:not(.dont-select-me)").select2({
              placeholder: "Select option",
              allowClear: true
          });
        }
    }

</script>

