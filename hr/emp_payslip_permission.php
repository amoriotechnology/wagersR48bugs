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
<link rel="stylesheet" href="https://code.jquery.com/ui/1.14.0/themes/base/jquery-ui.css">
<!-- <script src="https://code.jquery.com/jquery-3.7.1.js"></script> -->
<!-- <script src="https://code.jquery.com/ui/1.14.0/jquery-ui.js"></script> -->
<link href="<?php echo base_url() ?>assets/css/daterangepicker.css" rel="stylesheet">
<link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet">


<style>
.switch-input[disabled] + .switch-label {
    pointer-events: none;
    background-color: #f2f2f2; /* Change background color to indicate disabled */
    color: #999; /* Change text color to indicate disabled */
}

.switch-input[disabled] + .switch-label::after {
    border-color: #999; /* Change border color to indicate disabled */
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
  background-image: -webkit-linear-gradient(top, #EEEEEE, white 25px);
  background-image: -moz-linear-gradient(top, #EEEEEE, white 25px);
  background-image: -o-linear-gradient(top, #EEEEEE, white 25px);
  background-image: linear-gradient(to bottom, #EEEEEE, white 25px);
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
  background: #ECEEEF;
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
  background: #38469F;
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
  background-image: -webkit-linear-gradient(top, white 40%, #F0F0F0);
  background-image: -moz-linear-gradient(top, white 40%, #F0F0F0);
  background-image: -o-linear-gradient(top, white 40%, #F0F0F0);
  background-image: linear-gradient(to bottom, white 40%, #F0F0F0);
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
  background: #F9F9F9;
  border-radius: 6px;
  box-shadow: inset 0 1px rgba(0, 0, 0, 0.02);
  background-image: -webkit-linear-gradient(top, #EEEEEE, white);
  background-image: -moz-linear-gradient(top, #EEEEEE, white);
  background-image: -o-linear-gradient(top, #EEEEEE, white);
  background-image: linear-gradient(to bottom, #EEEEEE, white);
}
.switch-input:checked ~ .switch-handle {
  left: 85px;
  box-shadow: -1px 1px 5px rgba(0, 0, 0, 0.2);
}
.switch-green > .switch-input:checked ~ .switch-label {
  background: #4FB845;
}
 .btnclr ,th{
   background-color:<?php echo $setting_detail[0]['button_color']; ?>;
   color: white;
   }
.table {
    width: 100%; /* Set the table width */
    table-layout: fixed; /* Use a fixed layout */
}

.table th,
.table td {
    width: auto; /* Or set the width as per your requirement */
    /* Additional styling properties */
    border: 1px solid #ccc;
    padding: 8px;
    /* Other styling properties */
}
.table input[type="text"],input[type="time"] {
    text-align:center;
    background-color: inherit; /* Set your desired background color */
    /* Additional styling properties */
    /*border: 1px solid #ccc;*/
    border-radius: 4px;
    padding: 8px;
    /* Other styling properties */
}
      input {border:0;outline:0;}
    .work_table td {
        height: 36px;
    }
    .btnclr{
       background-color:<?php echo $setting_detail[0]['button_color']; ?>;
       color: <?php echo $setting_detail[0]['button_color']; ?>;

   }
th,td{
    text-align:center;
}
    .select2-selection{
        display :none;
    }
</style>

<div class="content-wrapper">

    <section class="content-header" style="height:70px;">

        <div class="header-icon">

            <i class="pe-7s-note2"></i>

        </div>

        <div class="header-title">

            <h1>Payment Administration</h1>

            <small></small>

            <ol class="breadcrumb">

                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>

                <li><a href="#">HRM</a></li>

                <li class="active" style="color:orange">Payment Administration</li>

            </ol>

        </div>

    </section>

    <section class="content">

        <!-- New category -->
        <div class="row">
            <div class="col-sm-12">                
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading" style="height:50px;">
                        <div class="panel-title">
                            <a style="float:right;background-color:#38469f;color:white;" href="<?php echo base_url('Chrm/manage_timesheet') ?>" class="btn  m-b-5 m-r-2"><i class="ti-align-justify"> </i> <?php echo "Manage TimeSheet" ?> </a>
                        </div>
                    </div>
                    <!-- <?php// echo form_open('Cquotation/insert_quotation', array('class' => 'form-vertical', 'id' => 'insert_quotation')) ?> -->
                  
                    <!-- <form id="insert_timesheet"  method="post">   -->
                  
                    <?php echo form_open_multipart('Chrm/second_pay_slip','id="validate"' ) ?>

                  
                  
                    <div class="panel-body">
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="customer" class="col-sm-4 col-form-label">Employee Name<i class="text-danger">*</i></label>
                                <div class="col-sm-8">

<input  type="hidden"   readonly id="tsheet_id" value="<?php echo $time_sheet_data[0]['timesheet_id'];?>" name="tsheet_id" />
<input  type="hidden"   readonly id="unique_id" value="<?php echo $time_sheet_data[0]['unique_id'];?>" name="unique_id" />
                                        
         <select name="templ_name" id="templ_name" class="form-control"    tabindex="3" style="width100">
<?php if (empty($employee_name[0]['id'])): ?>
    <option value="<?php echo $employee[0]['id'];  ?>"><?php echo $employee[0]['first_name'] . " " . $employee[0]['last_name']; ?></option>
<?php else: ?>
    <option value="<?php echo $employee_name[0]['id']; ?>">
        <?php echo $employee_name[0]['first_name'] . " " . $employee_name[0]['last_name']; ?>
    </option>
<?php endif; ?>
         <?php  foreach($employee_name as $pt){ ?>
        <option value="<?php  echo $pt['id'] ;?>"><?php  echo $pt['first_name']." " ;?><?php  echo $pt['last_name'] ;?></option>
     <?php  } ?>
        </select>







                                </div>
                            </div>



                         <div class="col-sm-6">
                                <label for="qdate" class="col-sm-4 col-form-label">Job title</label>
                              <div class="col-sm-8">
                              <input type="text" name="job_title" id="job_title" readonly placeholder="Job title" value="<?php echo empty($employee_name[0]['designation']) ? 'Sales Partner' : $employee_name[0]['designation']; ?>" class="form-control">

                                </div>
                            </div>
                        </div>
                            <div class="form-group row">
                            <div class="col-sm-6">
                            <label for="dailybreak" class="col-sm-4 col-form-label">Date Range<i class="text-danger">*</i></label>
                            <div class="col-sm-8">
                            <input id="reportrange" type="text" readonly name="date_range" <?php if($time_sheet_data[0]['uneditable']==1){ echo 'readonly';}  ?> value="<?php echo $time_sheet_data[0]['month'] ; ?>" class="form-control"/>
                            </div>
                            </div>
                        <div class="form-group row">
                             <div class="col-sm-6">
                             <label for="dailybreak" class="col-sm-4 col-form-label">Payroll Type <i class="text-danger"></i></label>
                             <div class="col-sm-8">
                             <input id="payroll_type" name="payroll_type" type="text" value="<?php echo $time_sheet_data[0]['payroll_type'] ; ?>" style="margin-left: -4px;width: 493px;" readonly class="form-control"/>
                            </div>
                             </div>
                            </div>



                        <div class="table-responsive work_table col-md-12">
		                    <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="PurList"> 
								<thead class="btnclr">
									<tr style="text-align:center;">

 
  
                                        <?php if ($employee_name[0]['payroll_type'] == 'Hourly') { ?>
                                            <th style='height:25px;' class="col-md-2">Date</th>
<?php } elseif ($employee_name[0]['payroll_type'] == 'Salaried-weekly' || $employee_name[0]['payroll_type'] == 'Salaried-BiWeekly' || $employee_name[0]['payroll_type'] == 'Salaried-Monthly' || $employee_name[0]['payroll_type'] == 'Salaried-BiMonthly') { ?>
    <th style='height:25px;' class="col-md-2">Date</th>
    <?php } elseif ($employee_name[0]['payroll_type'] == 'SalesCommission') { ?>
    <!-- Your code for 'SalesCommission' payroll type here, if any -->
<?php } ?>
 
                                        <?php if ($employee_name[0]['payroll_type'] == 'Hourly') { ?>
                                            <th style='height:25px;' class="col-md-1">Day</th>
<?php } elseif ($employee_name[0]['payroll_type'] == 'Salaried-weekly' || $employee_name[0]['payroll_type'] == 'Salaried-BiWeekly' || $employee_name[0]['payroll_type'] == 'Salaried-Monthly' || $employee_name[0]['payroll_type'] == 'Salaried-BiMonthly') { ?>
    <th style='height:25px;' class="col-md-1">Day</th>
    <?php } elseif ($employee_name[0]['payroll_type'] == 'SalesCommission') { ?>
    <!-- Your code for 'SalesCommission' payroll type here, if any -->
<?php } ?>
 
                                         <?php if ($employee_name[0]['payroll_type'] == 'Hourly') { ?>
                                            <th class="col-md-1">Daily Break in mins</th>
<?php } elseif ($employee_name[0]['payroll_type'] == 'Salaried-weekly' || $employee_name[0]['payroll_type'] == 'Salaried-BiWeekly' || $employee_name[0]['payroll_type'] == 'Salaried-Monthly' || $employee_name[0]['payroll_type'] == 'Salaried-BiMonthly') { ?>
 <?php } elseif ($employee_name[0]['payroll_type'] == 'SalesCommission') { ?>
    <!-- Your code for 'SalesCommission' payroll type here, if any -->
<?php } ?>
 
                                        <?php if ($employee_name[0]['payroll_type'] == 'Hourly') { ?>
                                            <th style='height:25px;' class="col-md-2">Start Time (HH:MM)</th>
<?php } elseif ($employee_name[0]['payroll_type'] == 'Salaried-weekly' || $employee_name[0]['payroll_type'] == 'Salaried-BiWeekly' || $employee_name[0]['payroll_type'] == 'Salaried-Monthly' || $employee_name[0]['payroll_type'] == 'Salaried-BiMonthly') { ?>
 <?php } elseif ($employee_name[0]['payroll_type'] == 'SalesCommission') { ?>
    <!-- Your code for 'SalesCommission' payroll type here, if any -->
<?php } ?>
 
                                        <?php if ($employee_name[0]['payroll_type'] == 'Hourly') { ?>
                                            <th style='height:25px;' class="col-md-2">End Time (HH:MM)</th>
<?php } elseif ($employee_name[0]['payroll_type'] == 'Salaried-weekly' || $employee_name[0]['payroll_type'] == 'Salaried-BiWeekly' || $employee_name[0]['payroll_type'] == 'Salaried-Monthly' || $employee_name[0]['payroll_type'] == 'Salaried-BiMonthly') { ?>
 <?php } elseif ($employee_name[0]['payroll_type'] == 'SalesCommission') { ?>
    <!-- Your code for 'SalesCommission' payroll type here, if any -->
<?php } ?>
 
                                     
                                        <?php if ($employee_name[0]['payroll_type'] == 'Hourly') { ?>
    <th style='height:25px; ' class="col-md-5">Hours</th>
<?php } elseif ($employee_name[0]['payroll_type'] == 'Salaried-weekly' || $employee_name[0]['payroll_type'] == 'Salaried-BiWeekly' || $employee_name[0]['payroll_type'] == 'Salaried-Monthly' || $employee_name[0]['payroll_type'] == 'Salaried-BiMonthly') { ?>
    <th style='height:25px; ' class="col-md-5">Present / Absence</th>
<?php } elseif ($employee_name[0]['payroll_type'] == 'SalesCommission') { ?>
    <!-- Your code for 'SalesCommission' payroll type here, if any -->
<?php } ?>

 
                                        <?php if ($employee_name[0]['payroll_type'] == 'Hourly') { ?>
                                            <th style='height:25px;' class="col-md-5">Action</th>
<?php } elseif ($employee_name[0]['payroll_type'] == 'Salaried-weekly' || $employee_name[0]['payroll_type'] == 'Salaried-BiWeekly' || $employee_name[0]['payroll_type'] == 'Salaried-Monthly' || $employee_name[0]['payroll_type'] == 'Salaried-BiMonthly') { ?>
  
<?php } elseif ($employee_name[0]['payroll_type'] == 'SalesCommission') { ?>
    <!-- Your code for 'SalesCommission' payroll type here, if any -->
<?php } ?>


									</tr>
								</thead>




                                <?php   if($employee_name[0]['payroll_type'] == 'Hourly') { ?>

								<tbody id="tBody">
                                     <?php
 
    function compareDates($a, $b) {
        $dateA = DateTime::createFromFormat('d/m/Y', $a['Date']);
        $dateB = DateTime::createFromFormat('d/m/Y', $b['Date']);
        
        if ($dateA === false || $dateB === false) {
            return 0; // Handle invalid dates here if needed
        }

        return $dateA <=> $dateB;
    }

    // Sorting the $time_sheet_data array based on the 'Date' field
    usort($time_sheet_data, 'compareDates');

    // Variable to track printed dates
    $printedDates = array();


    // Rendering the sorted table rows
    foreach($time_sheet_data as $tsheet) {
        if(!empty($tsheet['hours_per_day']) && !in_array($tsheet['Date'], $printedDates) ) {
            // Add the date to the printed dates array
            $printedDates[] = $tsheet['Date'];
?>
            <tr>
            
                <?php if ($employee_name[0]['payroll_type'] == 'Hourly') { ?>
                    <td class="date">
                    <input type="text" <?php if ($tsheet['uneditable'] == 1) { echo 'readonly'; } ?> value="<?php echo empty($tsheet['Date']) ? 'readonly' : $tsheet['Date']; ?>" name="date[]">
                </td><?php } elseif ($employee_name[0]['payroll_type'] == 'Salaried-weekly' || $employee_name[0]['payroll_type'] == 'Salaried-BiWeekly' || $employee_name[0]['payroll_type'] == 'Salaried-Monthly' || $employee_name[0]['payroll_type'] == 'Salaried-BiMonthly') { ?>
                    <td class="date">
                    <input type="text" <?php if ($tsheet['uneditable'] == 1) { echo 'readonly'; } ?> value="<?php echo empty($tsheet['Date']) ? 'readonly' : $tsheet['Date']; ?>" name="date[]">
                </td><?php } elseif ($employee_name[0]['payroll_type'] == 'SalesCommission') { ?>
    <!-- Your code for 'SalesCommission' payroll type here, if any -->
<?php } ?>


<?php if ($employee_name[0]['payroll_type'] == 'Hourly') { ?>
    <td class="day">
                    <input type="text" <?php if ($tsheet['uneditable'] == 1) { echo 'readonly'; } ?> value="<?php echo empty($tsheet['Day']) ? 'readonly' : $tsheet['Day']; ?>" name="day[]">
                </td>
                <?php } elseif ($employee_name[0]['payroll_type'] == 'Salaried-weekly' || $employee_name[0]['payroll_type'] == 'Salaried-BiWeekly' || $employee_name[0]['payroll_type'] == 'Salaried-Monthly' || $employee_name[0]['payroll_type'] == 'Salaried-BiMonthly') { ?>
                    <td class="day">
                    <input type="text" <?php if ($tsheet['uneditable'] == 1) { echo 'readonly'; } ?> value="<?php echo empty($tsheet['Day']) ? 'readonly' : $tsheet['Day']; ?>" name="day[]">
                </td>
                <?php } elseif ($employee_name[0]['payroll_type'] == 'SalesCommission') { ?>
    <!-- Your code for 'SalesCommission' payroll type here, if any -->
<?php } ?>


 
<?php if ($employee_name[0]['payroll_type'] == 'Hourly') { ?>
    <td style="text-align:center;" class="daily-break">
                    <select name="dailybreak[]" class="form-control datepicker dailybreak" style="width: 100px;margin: auto; display: block;">
                       <option value="<?php echo $tsheet['daily_break']; ?>"><?php echo $tsheet['daily_break']; ?></option>
                        <?php foreach ($dailybreak as $dbd) { ?>
                            <option value="<?php echo $dbd['dailybreak_name']; ?>"><?php echo $dbd['dailybreak_name']; ?></option>
                        <?php } ?>
                    </select>
                </td>

                <?php } elseif ($employee_name[0]['payroll_type'] == 'Salaried-weekly' || $employee_name[0]['payroll_type'] == 'Salaried-BiWeekly' || $employee_name[0]['payroll_type'] == 'Salaried-Monthly' || $employee_name[0]['payroll_type'] == 'Salaried-BiMonthly') { ?>
                  
                <?php } elseif ($employee_name[0]['payroll_type'] == 'SalesCommission') { ?>
    <!-- Your code for 'SalesCommission' payroll type here, if any -->
<?php } ?>

<?php if ($employee_name[0]['payroll_type'] == 'Hourly') { ?>
    <td class="start-time">
                    <input <?php if ($tsheet['uneditable'] == 1) { echo 'readonly'; } ?> name="start[]" class="hasTimepicker start" value="<?php echo empty($tsheet['Day']) ? 'readonly' : $tsheet['time_start']; ?>" type="time">
                </td>

                <?php } elseif ($employee_name[0]['payroll_type'] == 'Salaried-weekly' || $employee_name[0]['payroll_type'] == 'Salaried-BiWeekly' || $employee_name[0]['payroll_type'] == 'Salaried-Monthly' || $employee_name[0]['payroll_type'] == 'Salaried-BiMonthly') { ?>
                  
                <?php } elseif ($employee_name[0]['payroll_type'] == 'SalesCommission') { ?>
    <!-- Your code for 'SalesCommission' payroll type here, if any -->
<?php } ?>

<?php if ($employee_name[0]['payroll_type'] == 'Hourly') { ?>
    <td class="finish-time">
                    <input <?php if ($tsheet['uneditable'] == 1) { echo 'readonly'; } ?> name="end[]" class="hasTimepicker end" value="<?php echo empty($tsheet['Day']) ? 'readonly' : $tsheet['time_end']; ?>" type="time">
                </td>

                <?php } elseif ($employee_name[0]['payroll_type'] == 'Salaried-weekly' || $employee_name[0]['payroll_type'] == 'Salaried-BiWeekly' || $employee_name[0]['payroll_type'] == 'Salaried-Monthly' || $employee_name[0]['payroll_type'] == 'Salaried-BiMonthly') { ?>
                  
                <?php } elseif ($employee_name[0]['payroll_type'] == 'SalesCommission') { ?>
    <!-- Your code for 'SalesCommission' payroll type here, if any -->
<?php } ?>

                <?php if ($employee_name[0]['payroll_type'] == 'Salaried-weekly' || $employee_name[0]['payroll_type'] == 'Salaried-BiWeekly' || $employee_name[0]['payroll_type'] == 'Salaried-Monthly' || $employee_name[0]['payroll_type'] == 'Salaried-BiMonthly') { ?>
    <td class="hours-worked">


<input name="sum[]" class="timeSum" type="checkbox" style="width: 20px;height: 20px"
    <?php echo (isset($tsheet['present']) && $tsheet['present'] === "no") ? 'checked' : ''; ?>
    <?php echo (!isset($tsheet['present']) || $tsheet['present'] === '') ? 'disabled' : ''; ?>>
   

</td>
<?php } elseif ($employee_name[0]['payroll_type'] == 'Hourly') { ?>
    <td class="hours-worked">
                    <input readonly name="sum[]" class="timeSum" value="<?php echo empty($tsheet['Day']) ? 'readonly' : $tsheet['hours_per_day']; ?>" type="text">
                </td>
<?php } ?>

         <?php if ($employee_name[0]['payroll_type'] == 'Hourly') { ?>
            <td>
                    <a style='color:white;' class="delete_day btnclr btn  m-b-5 m-r-2"><i class="fa fa-trash" aria-hidden="true"></i> </a>
         </td>

                <?php } elseif ($employee_name[0]['payroll_type'] == 'Salaried-weekly' || $employee_name[0]['payroll_type'] == 'Salaried-BiWeekly' || $employee_name[0]['payroll_type'] == 'Salaried-Monthly' || $employee_name[0]['payroll_type'] == 'Salaried-BiMonthly') { ?>
                   

                <?php } elseif ($employee_name[0]['payroll_type'] == 'SalesCommission') { ?>
    <!-- Your code for 'SalesCommission' payroll type here, if any -->
<?php } ?>
            </tr>
<?php
        }

    }
?>

</tbody>


<?php  } else{  ?>

    <tbody id="tBody">
                                     <?php
 
    function compareDates($a, $b) {
        $dateA = DateTime::createFromFormat('d/m/Y', $a['Date']);
        $dateB = DateTime::createFromFormat('d/m/Y', $b['Date']);
        
        if ($dateA === false || $dateB === false) {
            return 0; // Handle invalid dates here if needed
        }

        return $dateA <=> $dateB;
    }

    // Sorting the $time_sheet_data array based on the 'Date' field
    usort($time_sheet_data, 'compareDates');

    // Variable to track printed dates
    $printedDates = array();


    // Rendering the sorted table rows
    foreach($time_sheet_data as $tsheet) {
        if(empty($tsheet['hours_per_day']) && !in_array($tsheet['Date'], $printedDates) ) {
            // Add the date to the printed dates array
            $printedDates[] = $tsheet['Date'];
?>
            <tr>
            
                <?php if ($employee_name[0]['payroll_type'] == 'Hourly') { ?>
                    <td class="date">
                    <input type="text" <?php if ($tsheet['uneditable'] == 1) { echo 'readonly'; } ?> value="<?php echo empty($tsheet['Date']) ? 'readonly' : $tsheet['Date']; ?>" name="date[]">
                </td><?php } elseif ($employee_name[0]['payroll_type'] == 'Salaried-weekly' || $employee_name[0]['payroll_type'] == 'Salaried-BiWeekly' || $employee_name[0]['payroll_type'] == 'Salaried-Monthly' || $employee_name[0]['payroll_type'] == 'Salaried-BiMonthly') { ?>
                    <td class="date">
                    <input type="text" <?php if ($tsheet['uneditable'] == 1) { echo 'readonly'; } ?> value="<?php echo empty($tsheet['Date']) ? 'readonly' : $tsheet['Date']; ?>" name="date[]">
                </td><?php } elseif ($employee_name[0]['payroll_type'] == 'SalesCommission') { ?>
    <!-- Your code for 'SalesCommission' payroll type here, if any -->
<?php } ?>


<?php if ($employee_name[0]['payroll_type'] == 'Hourly') { ?>
    <td class="day">
                    <input type="text" <?php if ($tsheet['uneditable'] == 1) { echo 'readonly'; } ?> value="<?php echo empty($tsheet['Day']) ? 'readonly' : $tsheet['Day']; ?>" name="day[]">
                </td>
                <?php } elseif ($employee_name[0]['payroll_type'] == 'Salaried-weekly' || $employee_name[0]['payroll_type'] == 'Salaried-BiWeekly' || $employee_name[0]['payroll_type'] == 'Salaried-Monthly' || $employee_name[0]['payroll_type'] == 'Salaried-BiMonthly') { ?>
                    <td class="day">
                    <input type="text" <?php if ($tsheet['uneditable'] == 1) { echo 'readonly'; } ?> value="<?php echo empty($tsheet['Day']) ? 'readonly' : $tsheet['Day']; ?>" name="day[]">
                </td>
                <?php } elseif ($employee_name[0]['payroll_type'] == 'SalesCommission') { ?>
    <!-- Your code for 'SalesCommission' payroll type here, if any -->
<?php } ?>


 
<?php if ($employee_name[0]['payroll_type'] == 'Hourly') { ?>
    <td style="text-align:center;" class="daily-break">
                    <select name="dailybreak[]" class="form-control datepicker dailybreak" style="width: 100px;margin: auto; display: block;">
                       <option value="<?php echo $tsheet['daily_break']; ?>"><?php echo $tsheet['daily_break']; ?></option>
                        <?php foreach ($dailybreak as $dbd) { ?>
                            <option value="<?php echo $dbd['dailybreak_name']; ?>"><?php echo $dbd['dailybreak_name']; ?></option>
                        <?php } ?>
                    </select>
                </td>

                <?php } elseif ($employee_name[0]['payroll_type'] == 'Salaried-weekly' || $employee_name[0]['payroll_type'] == 'Salaried-BiWeekly' || $employee_name[0]['payroll_type'] == 'Salaried-Monthly' || $employee_name[0]['payroll_type'] == 'Salaried-BiMonthly') { ?>
                  
                <?php } elseif ($employee_name[0]['payroll_type'] == 'SalesCommission') { ?>
    <!-- Your code for 'SalesCommission' payroll type here, if any -->
<?php } ?>

<?php if ($employee_name[0]['payroll_type'] == 'Hourly') { ?>
    <td class="start-time">
                    <input <?php if ($tsheet['uneditable'] == 1) { echo 'readonly'; } ?> name="start[]" class="hasTimepicker start" value="<?php echo empty($tsheet['Day']) ? 'readonly' : $tsheet['time_start']; ?>" type="time">
                </td>

                <?php } elseif ($employee_name[0]['payroll_type'] == 'Salaried-weekly' || $employee_name[0]['payroll_type'] == 'Salaried-BiWeekly' || $employee_name[0]['payroll_type'] == 'Salaried-Monthly' || $employee_name[0]['payroll_type'] == 'Salaried-BiMonthly') { ?>
                  
                <?php } elseif ($employee_name[0]['payroll_type'] == 'SalesCommission') { ?>
    <!-- Your code for 'SalesCommission' payroll type here, if any -->
<?php } ?>

<?php if ($employee_name[0]['payroll_type'] == 'Hourly') { ?>
    <td class="finish-time">
                    <input <?php if ($tsheet['uneditable'] == 1) { echo 'readonly'; } ?> name="end[]" class="hasTimepicker end" value="<?php echo empty($tsheet['Day']) ? 'readonly' : $tsheet['time_end']; ?>" type="time">
                </td>

                <?php } elseif ($employee_name[0]['payroll_type'] == 'Salaried-weekly' || $employee_name[0]['payroll_type'] == 'Salaried-BiWeekly' || $employee_name[0]['payroll_type'] == 'Salaried-Monthly' || $employee_name[0]['payroll_type'] == 'Salaried-BiMonthly') { ?>
                  
                <?php } elseif ($employee_name[0]['payroll_type'] == 'SalesCommission') { ?>
    <!-- Your code for 'SalesCommission' payroll type here, if any -->
<?php } ?>



    <?php if ($employee_name[0]['payroll_type'] == 'Salaried-weekly' || $employee_name[0]['payroll_type'] == 'Salaried-BiWeekly' || $employee_name[0]['payroll_type'] == 'Salaried-Monthly' || $employee_name[0]['payroll_type'] == 'Salaried-BiMonthly') { ?>
<td class="hours-worked">
    <label class="switch" style="width:100px;">
        <input type="checkbox" class="timeSum present checkbox switch-input" id="blockcheck_<?php echo $i; ?>" name="present[]" <?php echo (isset($tsheet['present']) && $tsheet['present'] === 'present') ? 'checked="checked"' : ''; ?> data-present="<?php echo $tsheet['present'] ?? ''; ?>" disabled>
        <span contenteditable="false" class="switch-label" data-on="Present" data-off="Absent"></span>
        <span class="switch-handle"></span>
    </label>
    <input readonly type="hidden" name="block[]" id="block_<?php echo $i++; ?>" value="<?php echo (isset($tsheet['present']) && $tsheet['present'] === 'absent') ? 'absent' : 'present'; ?>" />
</td>

 
<?php }





elseif ($employee_name[0]['payroll_type'] == 'Hourly') { ?>
    <td class="hours-worked">
                    <input readonly name="sum[]" class="timeSum" value="<?php echo empty($tsheet['Day']) ? 'readonly' : $tsheet['hours_per_day']; ?>" type="text">
                </td>
<?php } ?>

         <?php if ($employee_name[0]['payroll_type'] == 'Hourly') { ?>
            <td>
                    <a style='color:white;' class="delete_day btnclr btn  m-b-5 m-r-2"><i class="fa fa-trash" aria-hidden="true"></i> </a>
         </td>

                <?php } elseif ($employee_name[0]['payroll_type'] == 'Salaried-weekly' || $employee_name[0]['payroll_type'] == 'Salaried-BiWeekly' || $employee_name[0]['payroll_type'] == 'Salaried-Monthly' || $employee_name[0]['payroll_type'] == 'Salaried-BiMonthly') { ?>
    

                <?php } elseif ($employee_name[0]['payroll_type'] == 'SalesCommission') { ?>
 <?php } ?>
            </tr>
<?php
        }

    }
?>

</tbody>




<?php  }  ?>


                               
                                <tfoot>
          
                       <tr style="text-align:end"> 

 

                  <?php if ($employee_name[0]['payroll_type'] == 'Hourly') { ?>
                        <td colspan="5" class="text-right" style="font-weight:bold;">Total Hours :</td>
                      <td style="text-align: center;"> <input  type="text"   readonly id="total_net" value="<?php echo $time_sheet_data[0]['total_hours'] ; ?>" name="total_net" />    </td>

 <?php 


 if($time_sheet_data[0]['total_hours'] > $extratime_info[0]['work_hour']) { ?>
    <input  type="hidden"   readonly id="above_extra_beforehours"
     value="<?php
     $mins  =  $time_sheet_data[0]['total_hours'] - $extratime_info[0]['work_hour'];
     $get_value  =  $time_sheet_data[0]['total_hours'] - $mins;
     $get_value = sprintf('%d:00', $get_value);
     echo $get_value
     ; ?>"
         <?php
      //For This Period
$hrate = $employee_name[0]['hrate']; 
list($hours, $minutes) = explode(':', $get_value);

// Convert to decimal hours
$total_hours = (int)$hours + ((int)$minutes / 60); // This should yield 25.5
  
// Calculate total cost
$total_cost = $total_hours * $hrate; // This should yield 2550

// Round the total cost
$total_cost = round($total_cost, 2);
//For YTD
$total=$time_sheet_data[0]['total_hours'];
list($hours, $minutes) = explode(':', $total);
$total_hours_ytd = $hours + ($minutes / 60);
$total_cost_ytd = $total_hours_ytd * $hrate;
$total_cost_ytd =round($total_cost_ytd,2);
   ?>
     name="above_extra_beforehours" />

        <input type="hidden" id="above_extra_rate" name="above_extra_rate" value="<?php echo  $employee_name[0]['hrate']; ?>" />
        <input type="hidden" id="above_extra_sum" name="above_extra_sum" value="<?php echo  $total_cost ; ?>" />
        <input type="hidden" id="above_this_hours" name="above_this_hours" value="<?php echo  $get_value; ?>" />
        <input type="hidden" id="above_extra_ytd" name="above_extra_ytd" value="<?php echo  $total_cost ; ?>" />
        <?php } else{
                
      //For This Period
$hrate = $employee_name[0]['hrate']; 
list($hours, $minutes) = explode(':', $get_value);

// Convert to decimal hours
$total_hours = (int)$hours + ((int)$minutes / 60); // This should yield 25.5
  
// Calculate total cost
$total_cost = $total_hours * $hrate; // This should yield 2550

// Round the total cost
$total_cost = round($total_cost, 2);
//For YTD
$total=$time_sheet_data[0]['total_hours'];
list($hours, $minutes) = explode(':', $total);
$total_hours_ytd = $hours + ($minutes / 60);
$total_cost_ytd = $total_hours_ytd * $hrate;
$total_cost_ytd =round($total_cost_ytd,2);
   ?> 
        <input type="hidden" readonly id="above_extra_beforehours"
        value="<?php   echo $time_sheet_data[0]['total_hours'];
        ?>" name="above_extra_beforehours" />
        <input type="hidden" id="above_extra_rate" name="above_extra_rate" value="<?php echo  $employee_name[0]['hrate']; ?>" />
        <input type="hidden" id="above_extra_sum" name="above_extra_sum" value="<?php echo  $total_cost_ytd ; ?>" />
        <input type="hidden" id="above_this_hours" name="above_this_hours" value="<?php echo $time_sheet_data[0]['total_hours']; ?>" />
        <input type="hidden" id="above_extra_ytd" name="above_extra_ytd" value="<?php echo  $total_cost_ytd; ?>" />
      
      <?php } ?>
                    <?php } elseif ($employee_name[0]['payroll_type'] == 'Salaried-weekly' || $employee_name[0]['payroll_type'] == 'Salaried-BiWeekly' || $employee_name[0]['payroll_type'] == 'Salaried-Monthly' || $employee_name[0]['payroll_type'] == 'Salaried-BiMonthly') { ?>
                    <td colspan="2" class="text-right" style="font-weight:bold;">No of Days:</td>
                      <td style="text-align: center;"> <input  type="text"   readonly id="total_net" value="<?php echo $time_sheet_data[0]['total_hours'] ; ?>" name="total_net" />    </td>
                  <?php  if($time_sheet_data[0]['total_hours'] > $extratime_info[0]['work_hour']) { ?>
    <input  type="hidden"   readonly id="above_extra_beforehours"
     value="<?php
     $mins  =  $time_sheet_data[0]['total_hours'] - $extratime_info[0]['work_hour'];
     $get_value  =  $time_sheet_data[0]['total_hours'] - $mins;
     echo $get_value
     ; ?>"
     name="above_extra_beforehours" />
       
        <input type="hidden" id="above_extra_rate" name="above_extra_rate" value="<?php echo  $employee_name[0]['hrate']; ?>" />
        <input type="hidden" id="above_extra_sum" name="above_extra_sum" value="<?php echo  $get_value * $employee_name[0]['hrate'] ; ?>" />
        <input type="hidden" id="above_this_hours" name="above_this_hours" value="<?php echo  $get_value; ?>" />
        <input type="hidden" id="above_extra_ytd" name="above_extra_ytd" value="<?php echo  $get_value * $employee_name[0]['hrate'] ; ?>" />
       
       
        <?php } else{ ?>
        <input type="hidden" readonly id="above_extra_beforehours"
        value="<?php   echo $time_sheet_data[0]['total_hours'];
        ?>" name="above_extra_beforehours" />
        <input type="hidden" id="above_extra_rate" name="above_extra_rate" value="<?php echo  $employee_name[0]['hrate']; ?>" />
        <input type="hidden" id="above_extra_sum" name="above_extra_sum" value="<?php echo  $time_sheet_data[0]['total_hours'] * $employee_name[0]['hrate'] ; ?>" />
        <input type="hidden" id="above_this_hours" name="above_this_hours" value="<?php echo $time_sheet_data[0]['total_hours']; ?>" />
        <input type="hidden" id="above_extra_ytd" name="above_extra_ytd" value="<?php echo  $time_sheet_data[0]['total_hours'] * $employee_name[0]['hrate']; ?>" />
        <?php } ?>
                  
                  
                      <?php } elseif ($employee_name[0]['payroll_type'] == 'SalesCommission') { ?>
                   <?php } ?>
                                 </tr>
                                 <br>
                                 <?php  if($time_sheet_data[0]['total_hours'] > $extratime_info[0]['work_hour']) {
                                    
$total_hours = $time_sheet_data[0]['total_hours']; // Total hours in hh:mm format
$work_hour = $extratime_info[0]['work_hour']; // Work hours to subtract in hh:mm format

$hourly_rate = $employee_name[0]['hrate'] * $extratime_info[0]['extra_workamount'];     // Cost per hour

// Split total hours
list($totalH, $totalM) = explode(':', $total_hours);
$totalMinutes = ($totalH * 60) + (int)$totalM; // Convert to total minutes

// Split work hours
list($workH, $workM) = explode(':', $work_hour);
$workMinutes = ($workH * 60) + (int)$workM; // Convert to total minutes

// Calculate remaining minutes
$remainingMinutes = $totalMinutes - $workMinutes;

if ($remainingMinutes < 0) {
    $remainingMinutes = 0; // Ensure it doesn't go negative
}

// Convert remaining minutes back to hh:mm format
$remainingHours = floor($remainingMinutes / 60);
$remainingMinutes = $remainingMinutes % 60;
$get_value = sprintf('%02d:%02d', $remainingHours, $remainingMinutes); // Remaining time in hh:mm format

// Convert remaining time to decimal hours
list($hours, $minutes) = explode(':', $get_value);
$total_hours_decimal = (int)$hours + ((int)$minutes / 60); // Convert to decimal

// Calculate total cost
$total_cost = $total_hours_decimal * $hourly_rate;

// Optional: Round the total cost
$total_cost = round($total_cost, 2);
 ?>
                                 <input type="hidden" id="extra_hour" name="extra_hour" value="<?php echo ($time_sheet_data[0]['total_hours'] > $extratime_info[0]['work_hour']) ? ($get_value) : '0'; ?>" />
                                 <input type="hidden" id="extra_rate" name="extra_rate" value="<?php echo  $employee_name[0]['hrate'] * $extratime_info[0]['extra_workamount']; ?>" />
                                 <input type="hidden" id="extra_thisrate" name="extra_thisrate" value="<?php echo $total_cost; ?>" />
                                 <input type="hidden" id="extra_this_hour" name="extra_this_hour" value="<?php   echo  ($get_value); ?>" />
                                 <input type="hidden" id="extra_ytd" name="extra_ytd" value="<?php echo  $total_cost; ?>"   />
                                 <?php    } else{ 
                      list($hours, $minutes) = explode(':', $time_sheet_data[0]['total_hours']);
$total_hours_ytd = (int)$hours + ((int)$minutes / 60); // Ensure minutes are treated as integers
$total_c = $total_hours_ytd * $employee_name[0]['hrate'];
$total_c = round($total_c, 2);
                                    ?>
                                 <input type="hidden" id="extra_hour" name="extra_hour" value="<?php echo $time_sheet_data[0]['total_hours']; ?>" />
                                 <input type="hidden" id="extra_rate" name="extra_rate" value="<?php echo  $employee_name[0]['hrate']; ?>" />
                                 <input type="hidden" id="extra_thisrate" name="extra_thisrate" value="<?php echo ($total_c); ?>" />
                                 <input type="hidden" id="extra_rate" name="extra_rate" value="<?php echo  $employee_name[0]['hrate']; ?>" />
                                 <input type="hidden" id="extra_thisrate" name="extra_thisrate" value="<?php echo ($total_c); ?>" />
                                <?php } ?>
                                </tfoot>


		                    </table>

                                             
                                          
                                        
		                </div>



                        <div class="form-group row">
                            <div class="col-sm-4"></div>
                            <div class="col-sm-4" style="    border: 5px solid gainsboro;
    border-radius: 20px;">


   

                            <div class="">
                        <div class="panel-title">



         <br/>

 <div class="form-group row">
    <div class="col-sm-12">
<div class="col-sm-6">
<label for="administrator_person">Administrator Name<i class="text-danger">*</i></label> 
</div>
<div class="col-sm-4">
<select name="administrator_person" id="administrator_person"  class="form-control"   data-placeholder="<?php echo display('select_one'); ?>">                                   
<option value="<?php  echo $time_sheet_data[0]['admin_name']; ?>"><?php  echo $time_sheet_data[0]['admin_name']; ?> </option>
        <?php foreach($administrator as $adv){ ?>
<option value="<?php echo $adv['adm_id'] ; ?>"><?php echo $adv['adm_name'] ; ?></option>
<?php    }?>

</select>
</div>
<div class="col-sm-2">
<a  class="client-add-btn btn" aria-hidden="true" style="color:white;background-color:#38469f;"  data-toggle="modal" data-target="#add_admst" ><i class="fa fa-plus"></i></a>
</div>
</div>
<div>
</div>
</div>











<div class="panel-title">
<div class="col-sm-12">
<div class="col-sm-6">
<label for="selector">Payment Method
<i class="text-danger">*</i>
</label>
        </div>
        <div class="col-sm-6">
<select id="selector" name="payment_method" onchange="yesnoCheck(this);"  class="form-control" >
    <option value="<?php  echo $time_sheet_data[0]['payment_method']; ?>"><?php  echo $time_sheet_data[0]['payment_method']; ?></option>
    <option value="Cheque">Cheque/Check </option>
    <option value="Bank">Bank</option>
    <option value="Cash">Cash</option>
</select>
<!-- <label for="selector">Select ID Proof</label> -->
</div>
        </div></div>
<div id="adc" >
    <br/>
        <div class="col-sm-12" style="padding-top:20px;">
<div class="col-sm-6">
<label for="aadhar">Cheque No<i class="text-danger">*</i></label> 
        </div>
       <div class="col-sm-6"> 
<input type="number" id="cheque_no" name="cheque_no"  value="<?php  echo $time_sheet_data[0]['cheque_no']; ?>"  class="form-control" requried /><br />
        </div>
        <div class="col-sm-6">
<label for="aadhar">Cheque Date<i class="text-danger">*</i></label> 
 </div>
    <div class="col-sm-6"> 
<input type="text" id="datepicker_cheque" name="cheque_date" value="<?php  echo $time_sheet_data[0]['cheque_date']; ?>"  class="form-control"  requried/><br />
        </div></div>
</div>
<div id="pc" >
     <div class="col-sm-12" style="padding-top:20px;">
<div class="col-sm-6">
<label for="pan">Bank Name<i class="text-danger">*</i></label> 
</div>
<div class="col-sm-6">
<input type="text" id="bank_name" name="bank_name" value="<?php  echo $time_sheet_data[0]['bank_name']; ?>"  class="form-control" requried /><br />
        </div>
<div class="col-sm-6">
<label for="pan">Payment Reference No<i class="text-danger">*</i></label> 
        </div>
<div class="col-sm-6">
<input type="text" id="payment_refno" name="payment_refno" value="<?php  echo $time_sheet_data[0]['payment_ref_no']; ?>"  class="form-control"  requried/><br />
</div>
</div>
</div>
<div id="ps" style="display:none;">
      <div class="col-sm-12" style="padding-top:20px;">
    <div class="col-sm-6">
<label for="pass">Cash<i class="text-danger">*</i></label> 
</div>
<div class="col-sm-4">
<input type="text" id="cash" name="cash"  class="form-control"  value="Cash" readonly /><br />
</div>


</div>
</div>
<!--Cash Method -->
<div id="Cashmethod">
    <br/>
    <div class="col-sm-12" style="padding-top:20px;">
    <div class="col-sm-6">
        <label for="aadhar">Date<i class="text-danger">*</i></label>
    </div>
       <div class="col-sm-6">
            <input type="text" id="datepicker" name="cash_date" value="<?php echo $time_sheet_data[0]['cheque_date']; ?>"  class="form-control" requried /><br />
        </div>
    </div>
</div>

</div>
            </div>

 

  <div class="col-sm-12" style="padding-top:20px;">
    <div class="col-sm-10">

                        <input type="submit" style="float:right;color:white;background-color: #38469f;" value="Generate pay slip"   class="btn btn-info m-b-5 m-r-2"/> 
   </div>    </div> 
                    </div>               
                    <!-- <?php //echo form_close() ?> -->
                    <?php echo form_close() ?>

                                    <!-- </form> -->

            </div>

                </div>
            </div>
        </div>
    </section>


</div>



<script>
   function yesnoCheck(that)
{
  if (that.value == "Cheque")
    {
        document.getElementById("adc").style.display = "block";
         document.getElementById("pc").style.display = "none";
         document.getElementById("Cashmethod").style.display = "none";
          // document.getElementById("ps").style.display = "none";
    }
    else   if (that.value == "Bank")
    {
          document.getElementById("adc").style.display = "none";
         document.getElementById("pc").style.display = "block";
         document.getElementById("Cashmethod").style.display = "none";
        //   document.getElementById("ps").style.display = "none";
    }
    else if (that.value == "Cash")
    {
        document.getElementById("adc").style.display = "none";
         document.getElementById("pc").style.display = "none";
         document.getElementById("Cashmethod").style.display = "block";
         //  document.getElementById("ps").style.display = "block";
    }
    else
    {
        document.getElementById("adc").style.display = "none";
         document.getElementById("pc").style.display = "none";
         document.getElementById("Cashmethod").style.display = "none";
          // document.getElementById("ps").style.display = "none";
    }
}

$(document).ready(function(){
var that=$('#selector').val();
    if (that == "Cheque")
    {
        $('#adc').show();
      $('#pc').hide();
      $('#Cashmethod').hide();
    //  $('#ps').hide();
    }
    else   if (that == "Bank")
    {
             $('#adc').hide();
      $('#pc').show();
      $('#Cashmethod').hide();
     // $('#ps').hide();
    }
    else if (that == "Cash")
    {
        $('#adc').hide();
      $('#pc').hide();
      $('#Cashmethod').show();
    //  $('#ps').show();
    }else{
           $('#adc').hide();
      $('#pc').hide();
      $('#Cashmethod').hide();
     // $('#ps').hide();
    }
 })
</script>



<!------ add new Duration-->  
<div class="modal fade" id="add_admst" role="dialog">

<div class="modal-dialog" role="document">

    <div class="modal-content">

        <div class="modal-header" style="color:white;background-color:#38469f;" >

            

            <a href="#" class="close" data-dismiss="modal">&times;</a>

            <h4 class="modal-title"><?php echo ('Add New Administrator ') ?></h4>

        </div>

        

        <div class="modal-body">

            <div id="customeMessage" class="alert hide"></div>

  <form id="insert_adm" method="post">

    <div class="panel-body">

<input type ="hidden" name="csrf_test_name" id="" value="<?php echo $this->security->get_csrf_hash();?>">

        <div class="form-group row">

            <label for="adms_name" class="col-sm-4 col-form-label" ><?php echo ('Administrator Name') ?> <i class="text-danger">*</i></label>
            <div class="col-sm-6">
                <input class="form-control" name ="adms_name" id="adms_name" type="text" placeholder="Administrator Name"   required="" tabindex="1">

            </div>



     
</div>


<input type ="hidden" name="csrf_test_name" id="" value="<?php echo $this->security->get_csrf_hash();?>">



<div class="form-group row">

<label for="address" class="col-sm-4 col-form-label" ><?php echo ('Administrator Address') ?> </label>

<div class="col-sm-6">

    <input class="form-control" name ="address" id="address" type="text" placeholder="Administrator Adress"  required="" tabindex="1">

</div>




</div>







    </div>
        </div>

        <div class="modal-footer">
            <a href="#" class="btn" style="color:white;background-color:#38469f;" data-dismiss="modal"><?php echo display('Close') ?> </a>
            <input type="submit" class="btn" style="color:white;background-color: #38469f;" value=<?php echo display('Submit') ?>>
        </div>

                                </form>

    </div><!-- /.modal-content -->

</div><!-- /.modal-dialog -->

</div><!-- /.modal -->


    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.js"></script>
<script>
 var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';

      
    $('#insert_adm').submit(function (event) {
        event.preventDefault();

var dataString = {
    dataString : $("#insert_adm").serialize()
};
dataString[csrfName] = csrfHash;
$.ajax({
    type:"POST",
    dataType:"json",
    url:"<?php echo base_url(); ?>Chrm/insert_data_adsr",
    data:$("#insert_adm").serialize(),
    success:function (data1) {

    var $select = $('select#administrator_person');
        $select.empty();
$('#add_admst').modal('hide');
          for(var i = 0; i < data1.length; i++) {
    var option = $('<option/>').attr('value', data1[i].adm_name).text(data1[i].adm_name);
    $select.append(option); // append new options
}
    }
});
});

var data = {
  
    value:$('#customer_name').val()
};
var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';

// $(function() {

// // //

// $('#reportrange').daterangepicker({
//     startDate: start,
//     endDate: end,
//     ranges: {
//        'Today': [moment(), moment()],
//        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
//        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
//        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
//        'This Month': [moment().startOf('month'), moment().endOf('month')],
//        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
//     }
// }, //cb
// );

// //cb(start, end);

// });
$('body').on('input select change','#reportrange',function(){
    var date = $(this).val();
  
    const myArray = date.split("-");
    var start = myArray[0];
    var s_split=start.split("/");
    var end = myArray[1];
    var e_split=end.split("/");
    const weekDays = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
    let chosenDate = start; //get chosen date from datepicker
    var Date1 = new Date (s_split[2], s_split[0], s_split[1]);
var Date2 = new Date (e_split[2], e_split[0], e_split[1]);
var Days = Math.round((Date2.getTime() - Date1.getTime())/(1000*60*60*24));
console.log(s_split[2]+"/"+ s_split[1]+"/"+ s_split[0]+"/"+Days);
    const validDate = new Date(chosenDate);
    let newDate;
        const monStartWeekDays = ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'];
        for(let i = 0; i <= Days; i++) { //iterate through each weekday
          newDate = new Date(validDate); //create date object
          newDate.setDate(validDate.getDate() + i); //increment set date
          //append results to table
           var date=$('#date_'+i).html();
   // date=date.replace(/ /g,"");
   // var end=document.getElementById(`finishTime${monStartWeekDays[i]}`).value;
//      var sum=document.getElementById(`hoursWorked${monStartWeekDays[i]}`).value;
    var day=$('#day_'+i).html();
 //   day=day.replace("/","");
          $('#tBody').append( `
    <tr >
            
            <td  class="date" id="date_`+i+`"><input type="hidden" value="`+`${newDate.getDate()}/${newDate.getMonth() + 1}/${newDate.getFullYear()}" name="date[]"   />`+`${newDate.getDate()} / ${newDate.getMonth() + 1} / ${newDate.getFullYear()}</td>
            <td  class="day" id="day_`+i+`"><input type="hidden" value="`+`${weekDays[newDate.getDay()].slice(0,10)}" name="day[]"   />`+`${weekDays[newDate.getDay()].slice(0,10)}</td>
          <td style="text-align:center;" class="daily-break_${i}">
                    <select name="dailybreak[]" class="form-control datepicker dailybreak" style="width: 100px;margin: auto; display: block;">
                        <?php foreach ($dailybreak as $dbd) { ?>
                            <option value="<?php echo $dbd['dailybreak_name']; ?>"><?php echo $dbd['dailybreak_name']; ?></option>
                        <?php } ?>
                    </select>
                </td>
            <td class="start-time_`+i+`">    <input    id="startTime${monStartWeekDays[i]}"  name="start[]"  class="hasTimepicker start" type="time"   /></td>
            <td class="finish-time_`+i+`">   <input    id="finishTime${monStartWeekDays[i]}"   name="end[]" class="hasTimepicker end"   type="time"   /></td></td>
            <td class="hours-worked_`+i+`">  <input    id="hoursWorked${monStartWeekDays[i]}"  name="sum[]" class="timeSum"      readonly       type="text"   /></td> <td>
                    <a style="color:white;" class="delete_day btnclr btn  m-b-5 m-r-2"><i class="fa fa-trash" aria-hidden="true"></i> </a>
         </td>
        
            
        
          
                 
                             
            </tr>




          ` );

      
 }
        
});





function converToMinutes(s) {
    var c = s.split('.');
    return parseInt(c[0]) * 60 + parseInt(c[1]);
}

function parseTime(s) {
    return Math.floor(parseInt(s) / 60) + "." + parseInt(s) % 60
}




$('body').on('keyup','.end',function(){
//    debugger;
    var start=$(this).closest('tr').find('.strt').val();
    //alert(start);
    var end=$(this).closest('td').find('.end').val();
var breakv=$('#dailybreak').val();

var calculate=parseInt(start)+parseInt(end);
var final =calculate-parseInt(breakv);
console.log(start+"/"+end+"/"+breakv);
$(this).closest('tr').find('.hours-worked').html(final);

});

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
        
           $('#job_title').val(result[0]['designation']);
     
  
      }
  });


    });

$(document).ready(function() {
    function updateCounter() {
        var sumOfDays = $('input[type="checkbox"].present:checked').length;
        $('#total_net').val(sumOfDays); // Assuming you have an input with ID 'total_net'
    }
    $(document).on('change', 'input[type="checkbox"].present', updateCounter);
      var t=$('#payroll_type').val();
    if(t !=='Hourly'){
    updateCounter(); // Initial count update
    }
});
document.addEventListener('DOMContentLoaded', function() {
    var checkboxes = document.querySelectorAll('.checkbox.switch-input');
    checkboxes.forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            var idSuffix = this.id.split('_')[1];
            var correspondingInputField = document.getElementById('block_' + idSuffix);
            correspondingInputField.value = this.checked ? "present" : "absent";
        });
    });
});
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
function convertToTime(hr,min) {
    let hours = Math.floor(min / 60);
    let minutes = min % 60;
    minutes = minutes < 10 ? '0' + minutes : minutes;
    return `${hours+hr}:${minutes}`;
}
$(function() {
    $("#datepicker").datepicker({
        dateFormat: 'mm-dd-yy',
        maxDate: 0
    });
    $("#datepicker_cheque").datepicker({
        dateFormat: 'mm-dd-yy',
        maxDate: 0
    });
});
</script>
