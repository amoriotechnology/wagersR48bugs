<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" />
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
<script src="<?php echo base_url() ?>my-assets/js/countrypicker.js" type="text/javascript"></script>
<div class="content-wrapper">
   <section class="content-header">
      <div class="header-icon">
         <i class="pe-7s-note2"></i>
      </div>
      <div class="header-title">
         <h1><?php echo ('Add Hourly Rate') ?></h1>
         <small></small>
         <ol class="breadcrumb">
            <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
            <li><a href="#"><?php echo display('hrm') ?></a></li>
            <li class="active" style="color:orange"><?php echo html_escape($title) ?></li>
         </ol>
      </div>
   </section>
   <style>
      .popup label{
      color:white;
      }
      .popup {
      border-top-right-radius: 20px;
      border-bottom-left-radius: 20px;
      display: none;
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      border: 1px solid #000;
      padding: 20px;
      background-color: #fff;
      z-index: 9999;
      width: 90%;
      max-width: 800px;
      box-sizing: border-box;
      }
      .popup .row {
      margin-top: 10px;
      }
      .popup .col-sm-6 {
      width: 50%;
      box-sizing: border-box;
      }
      input[type=number]::-webkit-inner-spin-button, 
      input[type=number]::-webkit-outer-spin-button { 
      -webkit-appearance: none;
      -moz-appearance: none;
      appearance: none;
      margin: 0; 
      }
      .select2-selection{
      display:none;
      }
      .btnclr{
      background-color:<?php echo $setting_detail[0]['button_color']; ?>;
      color: white;
      }
      .ui-selectmenu-text{
      display:none;
      }
   </style>
   <!-- New Employee Type -->
   <!-- <div class="row"> -->
   <div class="col-sm-12">
      <div class="panel panel-bd lobidrag">
         <div class="panel-heading">
            <div class="panel-title" style="height:35px;">
               <div class="panel-title form_employee"  style="float:right ;">
                  <a href="<?php echo base_url('Chrm/manage_workinghours') ?>"   style="color:white; background-color: #424f5c;"    class="btnclr btn"><i class="ti-align-justify"> </i> Manage Working Hours</a>
               </div>
            </div>
         </div>
         <div class="panel-body">
            <?php //echo form_open('Chrm/employee_create', array('onsubmit' => 'return validateForm()')); ?>
            <?php echo form_open_multipart('Chrm/insertworking_hours',array('onsubmit' => 'return validateForm()') ) ?>
            <div class="row">
               <div class="col-md-6">
                  <div class="form-group row">
                     <label for="first_name" class="col-sm-4 col-form-div"><?php echo "Hour Rate" ?> <i class="text-danger">*</i></label>
                     <div class="col-sm-4">
                        <input name="work_hour" class="form-control" type="text" placeholder="<?php echo "Hour Rate" ?>" required oninput="validateInput(this)">
                     </div>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group row">
                     <label for="first_name" class="col-sm-4 col-form-div"><?php echo "Hour Extra Amount" ?> <i class="text-danger">*</i></label>
                     <div class="col-sm-4">
                        <input name="extra_workamount" class="form-control" type="text" placeholder="<?php echo "Hour Extra Amount" ?>" required oninput="validateInput(this)">
                     </div>
                  </div>
               </div>
            </div>
            <br>
            <div class="row">
               <div class="col-md-12">
                  <div class="form-group">
                     <button type="submit" id="checkSubmit" class="btnclr btn btn-success w-md m-b-5"><?php echo display('save') ?></button> 
                  </div>
               </div>
            </div>
            <?php echo form_close() ?>
         </div>
      </div>
      <!-- </div> -->
   </div>
   </section>
</div>
<script>
   var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
   var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';
   $(document).ready(function () {
        $('#add_city_tax').submit(function (e) {
            e.preventDefault();
            var formData = $("#add_city_tax").serialize();
            formData += "&" + $.param({ csrf_test_name: csrfHash });
            $.ajax({
                type: 'POST',
                data: formData,
                dataType: "json",
                url: '<?php echo base_url(); ?>Cinvoice/add_city_tax',
                success: function (data1, statut) {
                    var $datalist = $('#magic_city_tax');
                    // Clear existing options
                    $datalist.empty();
                    // Add new options
                    for (var i = 0; i < data1.length; i++) {
                        var option = $('<option/>').attr('value', data1[i].city_tax).text(data1[i].city_tax);
                        $datalist.append(option);
                    }
                    $('#new_city_tax').val('');
                    $("#bodyModal1").html("City Tax Added Successfully");
                    $('#city_tax').modal('hide');
                    $('#citytx').show();
                    $('#myModal1').modal('show');
                    window.setTimeout(function () {
                        $('#city_tax').modal('hide');
                        $('#myModal1').modal('hide');
                    }, 2000);
                }
            });
        });
    });

   // Allow Numbers
   function validateInput(input) {
      // Remove any non-numeric and non-decimal characters from the input value
      input.value = input.value.replace(/[^0-9.]/g, '');
   }
   
</script>
