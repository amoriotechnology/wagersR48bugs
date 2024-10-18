<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" /> 
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
 <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" /> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js" integrity="sha512-CryKbMe7sjSCDPl18jtJI5DR5jtkUWxPXWaLCst6QjH8wxDexfRJic2WRmRXmstr2Y8SxDDWuBO6CQC6IE4KTA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<link href="<?php echo base_url() ?>assets/css/daterangepicker.css" rel="stylesheet">
<link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet">
<style>
    .daterangepicker td.in-range {
  background: #0044cc;
  -webkit-border-radius: 0;
  -moz-border-radius: 0;
  border-radius: 0;
  color: #fff;
}
.daterangepicker td.active, .daterangepicker td.active:hover {
  background-color: #0044cc;
  background-image: -moz-linear-gradient(top, #0044cc, #0044cc);
  background-image: -ms-linear-gradient(top, #0044cc, #0044cc);
  background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#0044cc), to(#0044cc));
  background-image: -webkit-linear-gradient(top, #0044cc, #0044cc);
  background-image: -o-linear-gradient(top, #0044cc, #0044cc);
  background-image: linear-gradient(top, #0044cc, #0044cc);
  background-repeat: repeat-x;
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#0044cc', endColorstr='#0044cc', GradientType=0);
  border-color: #0044cc #0044cc #0044cc;
  border-color: #0044cc;
  filter: progid:DXImageTransform.Microsoft.gradient(enabled = false);
  color: #fff;
  text-shadow: 0 -1px 0 #0044cc;
}
 .btnclr{
   background-color:<?php echo $setting_detail[0]['button_color']; ?>;
   color: white;
   }
    .switch {
  margin-top: 5px;
  position: relative;
  display: inline-block;
  vertical-align: top;
  width: 56px;
  height: 20px;
  padding: 3px;
  background-color: white;
  border-radius: 18px;
  box-shadow: inset 0 -1px white, inset 0 1px 1px rgba(0, 0, 0, 0.05);
  cursor: pointer;
  background-image: -webkit-linear-gradient(top, #eeeeee, white 25px);
  background-image: -moz-linear-gradient(top, #eeeeee, white 25px);
  background-image: -o-linear-gradient(top, #eeeeee, white 25px);
  background-image: linear-gradient(to bottom, #eeeeee, white 25px);
}
.switch-input {
  position: absolute;
  top: 0;
  left: 0;
  opacity: 0;
}
.switch-label {
  position: relative;
  display: block;
  height: inherit;
  font-size: 10px;
  text-transform: uppercase;
  background: #eceeef;
  border-radius: inherit;
  box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.12), inset 0 0 2px rgba(0, 0, 0, 0.15);
  -webkit-transition: 0.15s ease-out;
  -moz-transition: 0.15s ease-out;
  -o-transition: 0.15s ease-out;
  transition: 0.15s ease-out;
  -webkit-transition-property: opacity background;
  -moz-transition-property: opacity background;
  -o-transition-property: opacity background;
  transition-property: opacity background;
}
.switch-label:before, .switch-label:after {
  position: absolute;
  top: 50%;
  margin-top: -.5em;
  line-height: 1;
  -webkit-transition: inherit;
  -moz-transition: inherit;
  -o-transition: inherit;
  transition: inherit;
}
.switch-label:before {
  content: attr(data-off);
  right: 11px;
  color: #aaa;
  text-shadow: 0 1px rgba(255, 255, 255, 0.5);
}
.switch-label:after {
  content: attr(data-on);
  left: 11px;
  color: white;
  text-shadow: 0 1px rgba(0, 0, 0, 0.2);
  opacity: 0;
}
.switch-input:checked ~ .switch-label {
  background: #38469f;
  box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.15), inset 0 0 3px rgba(0, 0, 0, 0.2);
}
.switch-input:checked ~ .switch-label:before {
  opacity: 0;
}
.switch-input:checked ~ .switch-label:after {
  opacity: 1;
}
.switch-handle {
  position: absolute;
  top: 4px;
  left: 4px;
  width: 18px;
  height: 18px;
  background: white;
  border-radius: 10px;
  box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.2);
  background-image: -webkit-linear-gradient(top, white 40%, #f0f0f0);
  background-image: -moz-linear-gradient(top, white 40%, #f0f0f0);
  background-image: -o-linear-gradient(top, white 40%, #f0f0f0);
  background-image: linear-gradient(to bottom, white 40%, #f0f0f0);
  -webkit-transition: left 0.15s ease-out;
  -moz-transition: left 0.15s ease-out;
  -o-transition: left 0.15s ease-out;
  transition: left 0.15s ease-out;
}
.switch-handle:before {
  content: '';
  position: absolute;
  top: 50%;
  left: 50%;
  margin: -6px 0 0 -6px;
  width: 12px;
  height: 12px;
  background: #f9f9f9;
  border-radius: 6px;
  box-shadow: inset 0 1px rgba(0, 0, 0, 0.02);
  background-image: -webkit-linear-gradient(top, #eeeeee, white);
  background-image: -moz-linear-gradient(top, #eeeeee, white);
  background-image: -o-linear-gradient(top, #eeeeee, white);
  background-image: linear-gradient(to bottom, #eeeeee, white);
}
.switch-input:checked ~ .switch-handle {
  left: 85px;
  box-shadow: -1px 1px 5px rgba(0, 0, 0, 0.2);
}
.switch-green > .switch-input:checked ~ .switch-label {
  background: #4fb845;
}
.table {
    width: 100%; /* Set the table width */
    table-layout: fixed; /* Use a fixed layout */
}
.table th,
.table td {
    width: auto; 
    border: 1px solid #ccc;
    padding: 8px;
}
.table input[type="text"],input[type="time"] {
    text-align:center;
    background-color: inherit; 
    border-radius: 4px;
    padding: 8px;
}
       input {border:0;outline:0;}
    .work_table td {
        height: 36px;
    }
    .select2-selection{
        display :none;
    }
    .btnclr{
       background-color:<?php echo $setting_detail[0]['button_color']; ?>;
       color: white;
   }
</style>
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1>Timesheet</h1>
            <small><?php echo $title ?></small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#">HRM</a></li>
                <li class="active" style="color:orange">Timesheet</li>
            </ol>
        </div>
    </section>
    <section class="content">
        <!-- New category -->
        <div class="row">
            <div class="col-sm-12">                
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading" style="height: 50px;">
                        <div class="panel-title">
                               <a style="float:right;color:white;" href="<?php echo base_url('Chrm/manage_timesheet') ?>" class="btnclr btn  m-b-5 m-r-2"><i class="ti-align-justify"> </i> <?php echo "Manage TimeSheet" ?> </a>
                        </div>
                    </div>
                    <!-- <?php// echo form_open('Cquotation/insert_quotation', array('class' => 'form-vertical', 'id' => 'insert_quotation')) ?> -->
                    <!-- <form id="insert_timesheet"  method="post">   -->
                    <?php echo form_open_multipart('Chrm/pay_slip','id="validate"' ) ?>
                  <?php  $id=random_int(100000, 999999); ?>
                    <div class="panel-body">
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="customer" class="col-sm-4 col-form-label">Employee Name<i class="text-danger">*</i></label>
                                <div class="col-sm-8">
<input type="hidden" id="tsheet_id" value="<?php echo $id ; ?>" name="tsheet_id" />
<input  type="hidden"   readonly id="unique_id" value="<?php echo $this->session->userdata('unique_id') ?>" name="unique_id" />
                                        <select name="templ_name" id="templ_name" class="form-control"  required   tabindex="3" style="width100">
                                        <option value=""> <?php echo ('Select Employee Name') ?></option>
                                        <?php  foreach($employee_name as $pt){ ?>
                                            <option value="<?php  echo $pt['id'] ;?>"> <?php echo isset($pt['first_name']) ? $pt['first_name'] . " " : ""; ?>
 <?php echo isset($pt['middle_name']) ? $pt['middle_name'] . " " : ""; ?>
 <?php echo isset($pt['last_name']) ? $pt['last_name'] : ""; ?></option>
                                        <?php  } ?>
        </select>
                                </div>
                            </div>
<div class="col-sm-6">
                                <label for="qdate" class="col-sm-4 col-form-label">Job title</label>
                              <div class="col-sm-8">
                                        <input type="text" readonly name="job_title" id="job_title" placeholder="Job title" value="" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                            <label for="dailybreak" class="col-sm-4 col-form-label">Date Range<i class="text-danger">*</i></label>
                            <div class="col-sm-8">
                            <input id="reportrange" name="date_range" type="text" class="form-control"/>
                            <div id='check_date' style='font-weight:bold;color:red;'></div>
                            </div>
                            </div>
                    <div class="form-group row">
                             <div class="col-sm-6">
                             <label for="dailybreak" class="col-sm-4 col-form-label">Payroll Type <i class="text-danger"></i></label>
                             <div class="col-sm-8">
                             <input type="text" readonly name="payroll_type" id="payroll_type" style="margin-left:-4px;width:496px;"  placeholder="Payroll Type" value="" class="form-control">
                            </div>
                             </div>
                            </div>
<style>
    th{
        height:30px;
        text-align:center;
    }
    td{
        text-align:center;
    }
  .end,.start,.timeSum {
    background-color: inherit; 
}
</style>
                        <div class="table-responsive work_table col-md-12">
		                    <table class=" table table-striped table-bordered" cellspacing="0" width="100%" id="PurList"> 
								<thead class="btnclr" id='tHead'>
								</thead>
								<tbody id="tBody">
								</tbody>
                                <tfoot id="tFoot">
                                </tfoot>
		                    </table>
		                </div>
                        <input type="submit" style="float:left;color:white;" value="Submit"   class="btnclr btn btn-info m-b-5 m-r-2"/> 
                    </div>               
                    <!-- <?php //echo form_close() ?> -->
                    <?php echo form_close() ?>
                                    <!-- </form> -->
                </div>
            </div>
        </div>
    </section>
</div>
<div class="modal fade" id="myModal1" role="dialog" >
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content" style="margin-top: 190px;text-align:center;">
        <div class="modal-header btnclr"  >
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><?php echo ('Time Sheet') ?></h4>
        </div>
        <div class="modal-body" id="bodyModal1" style="text-align:center;font-weight:bold;">
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>
<!------ add new Duration-->  
<div class="modal fade" id="duration_add" role="dialog">
<div class="modal-dialog" role="document">
<div class="modal-content" style="margin-top: 190px;text-align:center;">
        <div class="modal-header btnclr"  >
            <a href="#" class="close" data-dismiss="modal">&times;</a>
            <h4 class="modal-title"><?php echo ('Add New Duration ') ?></h4>
        </div>
        <div class="modal-body">
            <div id="customeMessage" class="alert hide"></div>
  <form id="add_duration" method="post">
    <div class="panel-body">
<input type ="hidden" name="csrf_test_name" id="" value="<?php echo $this->security->get_csrf_hash();?>">
        <div class="form-group row">
            <label for="customer_name" class="col-sm-3 col-form-label" style="width: auto;"><?php echo ('Duration') ?> <i class="text-danger">*</i></label>
            <div class="col-sm-6">
                <input class="form-control" name ="duration_name" id="duration_name" type="text" placeholder="Duration"  required="" tabindex="1">
            </div>
        </div>
    </div>
        </div>
        <div class="modal-footer">
            <a href="#" class="btn btnclr"  data-dismiss="modal"><?php echo display('Close') ?> </a>
            <input type="submit" class="btn btnclr"  value=<?php echo display('Submit') ?>>
        </div>
                                </form>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!------ add new dailybreak-->  
<div class="modal fade" id="dailybreak_add" role="dialog">
<div class="modal-dialog" role="document">
<div class="modal-content" style="margin-top: 190px;text-align:center;">
        <div class="modal-header btnclr"  >
            <a href="#" class="close" data-dismiss="modal">&times;</a>
            <h4 class="modal-title"><?php echo ('Add New Daily Break ') ?></h4>
        </div>
        <div class="modal-body">
            <div id="customeMessage" class="alert hide"></div>
  <form id="insert_daily_break" method="post">
    <div class="panel-body">
<input type ="hidden" name="csrf_test_name" id="" value="<?php echo $this->security->get_csrf_hash();?>">
        <div class="form-group row">
            <label for="customer_name" class="col-sm-3 col-form-label" style="width: auto;"><?php echo ('Daily Break') ?> <i class="text-danger">*</i></label>
            <div class="col-sm-6">
                <!-- <input class="form-control"  name ="dbreak" id="dbreak" type="text" placeholder="Daily Break"  required="" tabindex="1"> -->
                <input type="text"   class="decimal form-control" name ="dbreak" id="dbreak" placeholder="Integer and decimal only"/>
            </div>
        </div>
    </div>
        </div>
        <div class="modal-footer">
            <a href="#" class="btn btnclr "   data-dismiss="modal"><?php echo display('Close') ?> </a>
            <input type="submit" class="btn btnclr "   value=<?php echo display('Submit') ?>>
        </div>
                                </form>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!------ add new Payment Type -->
<div class="modal fade" id="payment_type" role="dialog">
<div class="modal-dialog" role="document">
<div class="modal-content" style="margin-top: 190px;text-align:center;">
        <div class="modal-header btnclr"  >
            <a href="#" class="close" data-dismiss="modal">&times;</a>
            <h4 class="modal-title"> <?php echo display('Add New Payment Terms') ?> </h4>
        </div>
        <div class="modal-body">
            <div id="customeMessage" class="alert hide"></div>
  <form id="add_pay_terms" method="post">
    <div class="panel-body">
<input type ="hidden" name="csrf_test_name" id="" value="<?php echo $this->security->get_csrf_hash();?>">
        <div class="form-group row">
            <label for="customer_name" style="width: auto;" class="col-sm-3 col-form-label"><?php echo display('New Payment Terms') ?> <i class="text-danger">*</i></label>
            <div class="col-sm-6">
                <input class="form-control" name ="new_payment_terms" id="new_payment_terms" type="text" placeholder="New Payment Terms"  required="" tabindex="1">
            </div>
        </div>
    </div>
        </div>
        <div class="modal-footer">
            <a href="#" class="btn btnclr"   data-dismiss="modal"><?php echo display('Close') ?> </a>
            <input type="submit" class="btn btnclr"   value=<?php echo display('Submit') ?>>
        </div>
                                </form>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.js"></script>
<script>
$('.decimal').keydown(function (e) {
  //Get the occurence of decimal operator
  var match = $(this).val().match(/\./g);
  if(match!=null){
     if ($.inArray(e.keyCode, [46,8, 9, 27, 13, 110]) !== -1 ||
         (e.keyCode == 65 && e.ctrlKey === true) ||
         (e.keyCode >= 35 && e.keyCode <= 39)) {
       return;
    }   
    else if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105 )&&(e.keyCode==190)) {
      e.preventDefault();
    }
  }
  else{
     if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
         (e.keyCode == 65 && e.ctrlKey === true) ||
         (e.keyCode >= 35 && e.keyCode <= 39)) {
       return;
    }
     if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
      e.preventDefault();
    }
  }
});
//Allow Upto Two decimal places value only
$('.decimal').keyup(function () {
  if ($(this).val().indexOf('.') != -1) {
    if ($(this).val().split(".")[1].length > 2) {
      if (isNaN(parseFloat(this.value))) return;
      this.value = parseFloat(this.value).toFixed(2);
    }
  }
});
$('#add_pay_terms').submit(function(e){
    e.preventDefault();
      var data = {
        new_payment_terms : $('#new_payment_terms').val()
      };
      data[csrfName] = csrfHash;
      $.ajax({
          type:'POST',
          data: data,
         dataType:"json",
          url:'<?php echo base_url();?>Cpurchase/add_payment_terms',
          success: function(data1, statut) {
       var $select = $('select#terms');
            $select.empty();
            console.log(data);
              for(var i = 0; i < data1.length; i++) {
        var option = $('<option/>').attr('value', data1[i].payment_terms).text(data1[i].payment_terms);
        $select.append(option); // append new options
    }
    $('#new_payment_terms').val('');
      $("#bodyModal1").html("Payment Terms Added Successfully");
      $('#payment_type').modal('hide');
      $('#terms').show();
       $('#myModal1').modal('show');
      window.setTimeout(function(){
        $('#payment_type_new').modal('hide');
       $('#myModal1').modal('hide');
        $('.modal-backdrop').remove();
    }, 2500);
     }
      });
  });
$('body').on('keyup','.end',function(){
    var start=$(this).closest('tr').find('.strt').val();
    var end=$(this).closest('td').find('.end').val();
var breakv=$('#dailybreak').val();
var calculate=parseInt(start)+parseInt(end);
var final =calculate-parseInt(breakv);
console.log(start+"/"+end+"/"+breakv);
$(this).closest('tr').find('.hours-worked').html(final);
});
var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';
    $(document).on('select change'  ,'#templ_name', function () {
var data = {
      value:$('#templ_name').val()
  };
  data[csrfName] = csrfHash;
  $.ajax({
      type:'POST',
      data: data, 
     dataType:"json",
      url:'<?php echo base_url();?>Chrm/getemployee_data',
      success: function(result, statut) {
        console.log(result);
        if (result.length > 0) { 
        if (result[0]['designation'] !== '') {
            $('#job_title').val(result[0]['designation']);
              $('#payroll_type').val(result[0]['payroll_type']);
        } else {
            $('#job_title').val("Sales Partner");
              $('#payroll_type').val("Sales Partner");
        }
    } else { 
        $('#job_title').val("Sales Partner");
         $('#payroll_type').val("Sales Partner");
    }
      }
  });
    });
$('#add_duration').submit(function(e){
    e.preventDefault();
      var data = {
        duration_name : $('#duration_name').val()
      };
      data[csrfName] = csrfHash;
      $.ajax({
          type:'POST',
          data: data,
         dataType:"json",
          url:'<?php echo base_url();?>Chrm/add_durat_info',
          success: function(data1, statut) {
       var $select = $('select#duration');
            $select.empty();
            console.log(data);
              for(var i = 0; i < data1.length; i++) {
        var option = $('<option/>').attr('value', data1[i].duration_name).text(data1[i].duration_name);
        $select.append(option); 
    }
    $('#duration_name').val('');
      $("#bodyModal1").html("Duration Added Successfully");
      $('#duration_add').modal('hide');
      $('#duration').show();
       $('#myModal1').modal('show');
      window.setTimeout(function(){
        $('#payment_type_new').modal('hide');
       $('#myModal1').modal('hide');
        $('.modal-backdrop').remove();
    }, 2500);
     }
      });
  });
$('#insert_daily_break').submit(function(e){
    e.preventDefault();
      var data = {
        dailybreak_name : $('#dbreak').val()
      };
      data[csrfName] = csrfHash;
      $.ajax({
          type:'POST',
          data: data,
         dataType:"json",
          url:'<?php echo base_url();?>Chrm/add_dailybreak_info',
          success: function(data1, statut) {
       var $select = $('select#dailybreak');
            $select.empty();
            console.log(data);
              for(var i = 0; i < data1.length; i++) {
        var option = $('<option/>').attr('value', data1[i].dailybreak_name).text(data1[i].dailybreak_name);
        $select.append(option); 
    }
    $('#dailybreak_name').val('');
      $("#bodyModal1").html("Daily Break Added Successfully");
      $('#dailybreak_add').modal('hide');
      $('#dailybreak').show();
       $('#myModal1').modal('show');
      window.setTimeout(function(){
        $('#payment_type_new').modal('hide');
       $('#myModal1').modal('hide');
        $('.modal-backdrop').remove();
    }, 2500);
     }
      });
  });
 var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';
    $(document).on('select change'  ,'#templ_name', function () {
         $('#check_date').text('');
         $('.btnclr').show();
var data = {
      value:$('#templ_name').val()
  };
  data[csrfName] = csrfHash;
  $.ajax({
      type:'POST',
      data: data, 
     dataType:"json",
      url:'<?php echo base_url();?>Chrm/getemployee_data',
      success: function(result, statut) {
         if (result.length > 0) { 
        if (result[0]['designation'] !== '') {
            $('#job_title').val(result[0]['designation']);
              $('#payroll_type').val(result[0]['payroll_type']);
        } else {
            $('#job_title').val("Sales Partner");
              $('#payroll_type').val("Sales Partner");
        }
    }
      }
  });
    });
    <?php
if(isset($_POST['btnSearch'])){
    $s = $_REQUEST["daterangepicker-field"];
}
$prev_month = date('Y-m-d', strtotime('first day of january this year'));
$current=date('Y-m-d');
$dat2= $prev_month."to". $current;
$searchdate =(!empty($s)?$s:$dat2);
    $dat = str_replace(' ', '', $searchdate);
    $split=explode("to",$dat);
?>
var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';
$(function() {
    var start = moment().startOf('isoWeek'); 
    var end = moment().endOf('isoWeek'); 
    var startOfLastWeek = moment().subtract(1, 'week').startOf('week');
    var endOfLastWeek = moment().subtract(1, 'week').endOf('week').add(1, 'day'); 
    function cb(start, end) {
    $('#reportrange').val(start.format('DD/MM/YYYY') + ' - ' + end.format('DD/MM/YYYY'));
    }
    $('#reportrange').daterangepicker({
    startDate: start,
    endDate: end,
    ranges: {
   
       'Last Week Before': [moment().subtract(2,  'week').startOf('week') , moment().subtract(2, 'week').endOf('week')],
       'Last Week': [startOfLastWeek, endOfLastWeek],
       'This Week': [moment().startOf('week'), moment().endOf('week')],
       'This Month': [moment().startOf('month'), moment().endOf('month')],
       'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    }
    }, cb);
  $('#reportrange').on('apply.daterangepicker', function(ev, picker) {
      
           var data= {
                    selectedDate: $('#reportrange').val(),
                    employeeId: $('#templ_name').val() // You'll need to capture the selected employee ID
                };
       data[csrfName] = csrfHash;
       $.ajax({
               url:'<?php echo base_url();?>Chrm/checkTimesheet',
                method: 'POST',
                data:data,
                success: function(response) {
                    if(response.includes('Timesheet exists for this date and employee')){
                     $('#check_date').text(response);
                    }else{
                       $('#check_date').text('');
                    }
                },
                error: function(xhr, status, error) {
                }
            });
      });
cb(start, end);
});
$('body').on('input select change','#reportrange',function(){
    var date = $(this).val();
    $('#tBody').empty();
      $('#tHead').empty();  
    $('#tFoot').empty();
     $('.btnclr').show();
     $('#check_date').html('');
    const myArray = date.split("-");
    var start = myArray[0];
    var s_split=start.split("/");
    var end = myArray[1];
    var e_split=end.split("/");
    const weekDays = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
    let chosenDate = start;  
    var Date1 = new Date (s_split[2], s_split[0], s_split[1]);
var Date2 = new Date (e_split[2], e_split[0], e_split[1]);
var Days = Math.round((Date2.getTime() - Date1.getTime())/(1000*60*60*24));
console.log(s_split[2]+"/"+ s_split[1]+"/"+ s_split[0]+"/"+Days);
    const validDate = new Date(chosenDate);
    let newDate;
        const monStartWeekDays = ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'];
        var data= {
                    employeeId: $('#templ_name').val(),
                     reportrange: $('#reportrange').val()
                };
       data[csrfName] = csrfHash;
       $.ajax({
               url:'<?php echo base_url();?>Chrm/check_employee_pay_type',
                method: 'POST',
                data:data,
                success: function(response) {
                  if (response.includes('SalesCommission') || response.includes('Sales Partner')) {
                     var data= {
                    employeeId: $('#templ_name').val(), 
                     reportrange: $('#reportrange').val()
                };
       data[csrfName] = csrfHash;
       $.ajax({
               url:'<?php echo base_url();?>Chrm/sc_cnt',
                method: 'POST',
                data:data,
                success: function(response) {
           var response = JSON.parse(response.trim());
var count = response.count;  
if(count == 0){
      $('#check_date').text('No sales found for this period');
     $('tBody').empty();
    $('.btnclr').hide();
}else{
 $('#check_date').text('');
   $('tBody').empty();
      $('.btnclr').show();
}
        },
                error: function(xhr, status, error) {
                 }
            });
                    }
                 if (response.includes('salary') || response.includes('Salaried-weekly') || response.includes('Salaried-BiWeekly') || response.includes('Salaried-Monthly')  || response.includes('Salaried-BiMonthly'  )) {
       $('#tHead').append(`
            <tr style="text-align:center;">
                <th class="col-md-2">Date</th>
                <th class="col-md-2">Day</th>
                <th class="col-md-2">Present / Absence</th>
            </tr>`);
        $('#tFoot').append(`
            <tr style="text-align:end">
                <td colspan="2" class="text-right" style="font-weight:bold;">No of Days:</td> 
                <td><input type="text" id="total_net" class="sumOfDays" name="total_net" /></td>
            </tr>`);
    } else if (response.includes('Hourly')) {
        $('#tHead').append(`
            <tr style="text-align:center;">
                <th class="col-md-2">Date</th>
                <th class="col-md-1">Day</th> 
                <th class="col-md-1">Daily Break in mins
                    <a class="btnclr client-add-btn btn" aria-hidden="true" style="color:white;border-radius: 5px; padding: 5px 10px 5px 10px;" data-toggle="modal" data-target="#dailybreak_add">
                        <i class="fa fa-plus"></i>
                    </a>
                </th>
                <th class="col-md-2">Start Time (HH:MM)</th>
                <th class="col-md-2">End Time (HH:MM)</th>
                <th class="col-md-2">Hours</th>
                <th class="col-md-2">Action</th>
            </tr>`);
        $('#tFoot').append(`
            <tr style="text-align:end">
                <td colspan="5" class="text-right" style="font-weight:bold;">Total Hours:</td> 
                <td><input type="text" id="total_net" class="sumOfDays" name="total_net" /></td>
            </tr>`);
    } else if (response.includes('SalesCommission')) {
        $('#tFoot').append(`
            <tr style="text-align:end; display:none;">
                <td colspan="1" class="text-right" style="font-weight:bold;">Total Hours:</td> 
                <td><input type="text" id="total_net"  value="0.00" name="total_net"  readonly /></td>
            </tr>`);
    }
for (let i = 0; i <= Days; i++) { 
    let newDate = new Date(validDate.getTime()); 
    newDate.setDate(validDate.getDate() + i); 
    let dayString = weekDays[newDate.getDay()].slice(0, 10);
let day = ("0" + newDate.getDate()).slice(-2); 
let month = ("0" + (newDate.getMonth() + 1)).slice(-2); 
let dateString = `${day}/${month}/${newDate.getFullYear()}`;
    if (response.includes('salary') || response.includes('Salaried-weekly') || response.includes('Salaried-BiWeekly') || response.includes('Salaried-Monthly')  || response.includes('Salaried-BiMonthly'  )) {
    var presentCount = $('input[type="checkbox"].present:checked').length + 1;
        $('#total_net').val(presentCount);
        $('#tBody').append(`
            <tr>
                <td class="date" id="date_${i}">
                    <input type="hidden" value="${dateString}" name="date[]"/>${dateString}
                </td>
                <td class="day" id="day_${i}">
                    <input type="hidden" value="${dayString}" name="day[]"/>${dayString}
                </td>
                <td style="display:none;" class="start-time_`+i+`">    <input    id="startTime${monStartWeekDays[i]}"  name="start[]"  class="hasTimepicker start" type="time"   /></td>
                <td style="display:none;"  class="finish-time_`+i+`">   <input    id="finishTime${monStartWeekDays[i]}"   name="end[]" class="hasTimepicker end"   type="time"   /></td> 
                 <td class="hours-worked_`+i+`"> 
                 <label class="switch" style="width:100px;">
                <input type="checkbox" class="present checkbox switch-input"  value=""  id="blockcheck_`+i+`" name="present[]" checked>
                <span class="switch-label" data-on="Present" data-off="Absent"></span>
                <span class="switch-handle"></span>
                </label>
              <input type="hidden" name="block[]"   id="block_`+i+`" />              
                 </td>
            </tr>`);
    } else if (response.includes('Hourly')) {
        $('#tBody').append(`
            <tr > <td  class="date" id="date_`+i+`"><input type="hidden" value="${dateString}" name="date[]"   />`+`${dateString}</td>
            <td  class="day" id="day_`+i+`"><input type="hidden" value="`+`${weekDays[newDate.getDay()].slice(0,10)}" name="day[]"   />`+`${weekDays[newDate.getDay()].slice(0,10)}</td>
            <td style="text-align:center;" class="daily-break_${i}">
                    <select name="dailybreak[]" id="dailybreak" class="form-control datepicker dailybreak" style="width: 100px;margin: auto; display: block;">
                        <?php foreach ($dailybreak as $dbd) { ?>
                            <option value="<?php echo $dbd['dailybreak_name']; ?>"><?php echo $dbd['dailybreak_name']; ?></option>
                        <?php } ?>  </select>  </td>
                        <td class="start-time_`+i+`">    <input    id="startTime${monStartWeekDays[i]}"  name="start[]"  class="hasTimepicker start" type="time"   /></td>
            <td class="finish-time_`+i+`">   <input    id="finishTime${monStartWeekDays[i]}"   name="end[]" class="hasTimepicker end"   type="time"   /></td></td>
            <td class="hours-worked_`+i+`">  <input    id="hoursWorked${monStartWeekDays[i]}"  name="sum[]" class="timeSum"      readonly       type="text"   /></td>
            <td>
            <a style="color:white;" class="delete_day btnclr btn  m-b-5 m-r-2"><i class="fa fa-trash" aria-hidden="true"></i> </a>
            </td>  </tr> ` );
    } else if (response.includes('SalesCommission')) {
        $('#tBody').append(`
        <tr > 
            <td  style="display:none;"  class="date" id="date_`+i+`"><input type="hidden" value="`+`${newDate.getDate()}/${newDate.getMonth() + 1}/${newDate.getFullYear()}" name="date[]"   />`+`${newDate.getDate()} / ${newDate.getMonth() + 1} / ${newDate.getFullYear()}</td>
            <td style="display:none;"     class="day" id="day_`+i+`"><input type="hidden" value="`+`${weekDays[newDate.getDay()].slice(0,10)}" name="day[]"   />`+`${weekDays[newDate.getDay()].slice(0,10)}</td>
            <td style="display:none;"     class="start-time_`+i+`">    <input    id="startTime${monStartWeekDays[i]}"  name="start[]"  class="hasTimepicker start" type="time"   /></td>
            <td style="display:none;"     class="finish-time_`+i+`">   <input    id="finishTime${monStartWeekDays[i]}"   name="end[]" class="hasTimepicker end"   type="time"   /></td></td>
            <td style="display:none;"     class="hours-worked_`+i+`">  <input    id="hoursWorked${monStartWeekDays[i]}"  name="sum[]" class="timeSum"    value="0"  readonly       type="text"   /></td>
            <td style="display:none;>
            <a style="color:white;" class="delete_day btnclr btn  m-b-5 m-r-2"><i class="fa fa-trash" aria-hidden="true"></i> </a>
            </td>  </tr> ` );
    }
}
 },
                error: function(xhr, status, error) {
                }
            });
});
$(document).ready(function() {
    function updateCounter() {
        var sumOfDays = 0; 
        sumOfDays = $('input[type="checkbox"].present:checked').length;
        $('#total_net').val(sumOfDays);
    }
    // Use event delegation for dynamically added checkboxes
    $(document).on('change', 'input[type="checkbox"].present', function() {
        updateCounter();
    });
    // Initial update in case some checkboxes are checked by default on page load
    updateCounter();
});
function converToMinutes(s) {
    var c = s.split('.');
    return parseInt(c[0]) * 60 + parseInt(c[1]);
}
function parseTime(s) {
    return Math.floor(parseInt(s) / 60) + "." + parseInt(s) % 60
}
$(document).on('select change'  ,'.end','.dailybreak', function () {
 var $begin = $(this).closest('tr').find('.start').val();
    var $end = $(this).closest('tr').find('.end').val();
    let valuestart = moment($begin, "HH:mm");
    let valuestop = moment($end, "HH:mm");
    let timeDiff = moment.duration(valuestop.diff(valuestart));
    var dailyBreakValue = parseInt($(this).closest('tr').find('.dailybreak').val()) || 0;
    var totalMinutes = timeDiff.asMinutes() - dailyBreakValue;
    var hours = Math.floor(totalMinutes / 60);
    var minutes = totalMinutes % 60;
    var formattedTime = hours.toString().padStart(2, '0') + '.' + minutes.toString().padStart(2, '0');
    $(this).closest('tr').find('.timeSum').val(formattedTime);
//var total_net = 0;
var total_netH = 0;
var total_netM = 0;
$('.table').each(function () {
    var tableTotal = 0;
    var tableHours = 0;
    var tableMinutes = 0;
    $(this).find('.timeSum').each(function () {
        var precio = $(this).val();
        if (!isNaN(precio) && precio.length !== 0) {
            var [hours, minutes] = precio.split('.').map(parseFloat);
            //tableTotal += hours + minutes / 100; // Dividing minutes by 100 to get the correct decimal value
            tableHours += hours;
            tableMinutes += minutes;
        }
    });
    total_netH += tableHours;
    total_netM += tableMinutes;
});
var timeConvertion = convertToTime(total_netH ,total_netM);
$('#total_net').val(timeConvertion).trigger('change');
});
$(document).on('select change'  ,'.start','.dailybreak', function () {
 var $begin = $(this).closest('tr').find('.start').val();
    var $end = $(this).closest('tr').find('.end').val();
    let valuestart = moment($begin, "HH:mm");
    let valuestop = moment($end, "HH:mm");
    let timeDiff = moment.duration(valuestop.diff(valuestart));
    var dailyBreakValue = parseInt($(this).closest('tr').find('.dailybreak').val()) || 0;
    var totalMinutes = timeDiff.asMinutes() - dailyBreakValue;
    var hours = Math.floor(totalMinutes / 60);
    var minutes = totalMinutes % 60;
    var formattedTime = hours.toString().padStart(2, '0') + '.' + minutes.toString().padStart(2, '0');
if (isNaN(parseFloat(formattedTime))) {
     $(this).closest('tr').find('.timeSum').val('00.00');
}else{
    $(this).closest('tr').find('.timeSum').val(formattedTime);
}

//var total_net = 0;
var total_netH =0;
var total_netM =0;
$('.table').each(function () {
    var tableTotal = 0;
    var tableHours = 0;
    var tableMinutes = 0;
    $(this).find('.timeSum').each(function () {
        var precio = $(this).val();
        if (!isNaN(precio) && precio.length !== 0) {
            var [hours, minutes] = precio.split('.').map(parseFloat);
            //tableTotal += hours + minutes / 100; // Dividing minutes by 100 to get the correct decimal value
            tableHours += hours;
            tableMinutes += minutes;
        }
    });
    //total_net += tableTotal;
    total_netH += tableHours;
    total_netM += tableMinutes;
});
/*alert('total_net:'+total_netH+'.'+total_netM);
// Convert the total back to hours and minutes format
var hours = Math.floor(total_net);
var minutes = Math.round((total_net % 1) * 100); // Multiply by 100 to get the minutes
if (minutes === 100) {
    hours += 1;
    minutes = 0;
}*/
var timeConvertion = convertToTime(total_netH,total_netM);
$('#total_net').val(timeConvertion).trigger('change');
});
$(document).on('input','.timeSum', function () {
    // $(".timeSum").change(function(){
    var $addtotal = $(this).closest('tr').find('.timeSum').val();
    // alert($addtotal);
    });
function sumHours () {
    var time1 = $begin.timepicker().getTime();
    var time2 = $end.timepicker().getTime();
    if ( time1 && time2 ) {
      if ( time1 > time2 ) {
        v = new Date(time2);
        v.setDate(v.getDate() + 1);
      } else {
        v = time2;
      }
      var diff = ( Math.abs( v - time1) / 36e5 ).toFixed(2);
      $input.val(diff); 
    } else {
      $input.val(''); 
    }
}
$('#total_net').on('keyup',function(){
    var value=$(this).val();
   if($(this).val() == ''){
$(".hasTimepicker").prop("readonly", false);
    $('#tBody .hasTimepicker').prop('defaultValue');  
    }else{
   $(".hasTimepicker").prop("readonly", true); 
    }
});
$(document).on('click', '.delete_day', function() {
    $(this).closest('tr').remove();

    // Recalculate the total net after deleting a row
    var total_netH = 0;
    var total_netM = 0;

    $('.table').each(function() {
        $(this).find('.timeSum').each(function() {
            var precio = $(this).val();
            if (!isNaN(precio) && precio.length !== 0) {
                var [hours, minutes] = precio.split('.').map(parseFloat);
                total_netH += hours;
                total_netM += minutes;
            }
        });
    });

    // Convert total hours and minutes to the correct format
    var timeConversion = convertToTime(total_netH, total_netM);
    $('#total_net').val(timeConversion).trigger('change');

    // Update the date range if necessary
    var firstDate = $('.date input').first().val(); 
    var lastDate = $('.date input').last().val(); 
    function convertDateFormat(dateStr) {
        const [day, month, year] = dateStr.split('/');
        return `${month}/${day}/${year}`;
    }
    var firstDateMDY = convertDateFormat(firstDate);
    var lastDateMDY = convertDateFormat(lastDate);
    $('#reportrange').val(firstDateMDY + ' - ' + lastDateMDY);
});

$(function() {
    $('.applyBtn').datepicker({
        onSelect: function(date) {
            $.ajax({
                url: 'Chrm/checkTimesheet',
                method: 'POST',
                data: {
                    selectedDate: date,
                    employeeId: $('#templ_name').val() // You'll need to capture the selected employee ID
                },
                success: function(response) {
                    console.log(response);
                },
                error: function(xhr, status, error) {
                }
            });
        }
    });
});
document.getElementById('validate').addEventListener('submit', function(event) {
    var checkboxes = document.querySelectorAll('.checkbox.switch-input');
    checkboxes.forEach(function(checkbox) {
        var netheight = checkbox.id;
        var id = netheight.split('_')[1];
        if (checkbox.checked) {
            $('#block_' + id).val("present");
        } else {
            $('#block_' + id).val("absent");
        }
    });
});
function convertToTime(hr,min) {
    let hours = Math.floor(min / 60);
    let minutes = min % 60;
    minutes = minutes < 10 ? '0' + minutes : minutes;
    return `${hours+hr}:${minutes}`;
}


</script>
