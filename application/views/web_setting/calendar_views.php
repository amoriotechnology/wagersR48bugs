<!-- Manage Language Start -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='https://fullcalendar.io/js/fullcalendar-2.4.0/fullcalendar.css'>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
<div class="content-wrapper">
   <section class="content-header">
      <div class="header-icon">
         <i class="pe-7s-note2"></i>
      </div>
      <div class="header-title">
         <h1><?php echo 'Calendar View' ?></h1>
         <small></small>
         <ol class="breadcrumb">
            <li><a href="<?php echo base_url('/') ?>"><i class="pe-7s-home"></i> <?php echo 'Home' ?></a></li>
            <li class="active" style="color: orange;"><?php echo 'Calendar' ?></li>
            <!-- <li class="active" style="color:orange"><?php echo display('Manage Language') ?></li> -->
         </ol>
      </div>
   </section>
   <style>
      th{
      text-align:center;
      }
   </style>
   <section class="content">
      <!-- Manage Language -->
      <?php
         $message = $this->session->userdata('message');
         if (isset($message)) {
         ?>
      <div class="alert alert-info alert-dismissable" style="background-color:#38469f;color:white;font-weight:bold;">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
         <?php echo $message ?>                    
      </div>
      <?php 
         }
         ?>
      <div class="row">
         <div class="col-sm-12">
            <div class="panel panel-bd lobidrag">
               <div class="panel-heading">
                  <div class="panel-title">
                     <button class="btn btn-info" id="reminder_task" data-toggle="modal" data-target="#reminderModal">+ Add Reminder</button>
                     <a href="<?php echo base_url('Cweb_setting') ?>" class="btn btn-info text-white">Manage Setting</a>
                     <button class="btn btn-info" data-toggle="modal" data-target="#schedulerModal"><i class="ti-alarm-clock"></i>&nbsp;Scheduler Status</button>
                  </div>
               </div>
               <div class="panel-body">
                  <div class="table-responsive">
                     <div id="calendar"></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>

<!-- Scheuler List -->

<div class="modal fade" id="schedulerModal" role="dialog">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header" style="color:white;background-color:#38469f;">
            <a href="#" class="close" data-dismiss="modal">&times;</a>
            <h4 class="modal-title"><?php echo 'Scheduler List' ?></h4>
         </div>
         <div class="modal-body">
            <div class="panel-body">
               <table class="table table-bordered">
                     <thead>
                       <tr>
                           <th class="color_text">S.No</th>
                           <th class="color_text">ID</th>
                           <th class="color_text">Name</th>
                           <th class="color_text">Date / Time</th>
                           <th class="color_text">Status</th>
                       </tr>
                     </thead>
                     <tbody>
                     <?php 
                     $status1 = 'Scheduled';
                     if(!empty($allData)){ $s=1; foreach ($allData as $key => $value) { ?>
                        <tr>
                           <td><?php echo $s; ?></td>
                           <td><b><?php echo $value->name_id; ?></b></td>
                           <td><?php echo $value->title; ?></td>
                           <td><?php echo date('Y-m-d H:i:A',strtotime($value->start)); ?></td>
                           <td>
                              <?php if($value->schedule_status == 1){echo "<span class='badge badge-success'>".$status1."</span>";}else{echo "<span class='badge badge-success'>No Scheduled List</span>";} ?>
                           </td>
                        </tr>
                     <?php $s++; } }else { ?> 
                        <tr>
                           <td colspan="5" class="text-center">No Schedule Found</td>
                        </tr>
                     <?php } ?>    
                     </tbody>
                  </table>
            </div>
         </div>
   </div>
</div>
</div>

<!-- Calandar View -->

<div class="modal fade" id="reminderModal" role="dialog">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header" style="color:white;background-color:#38469f;">
            <a href="#" class="close" data-dismiss="modal">&times;</a>
            <h4 class="modal-title"><?php echo 'Add Reminder' ?></h4>
         </div>
         <?php echo form_open_multipart('Cweb_setting/add_reminder')?>
         <div class="modal-body">
            <div class="panel-body">
              <div class="row">
                 <div class="col-md-12">
                   <label>Title</label>
                   <input type="text" name="title" class="form-control" placeholder="Enter your Title" required>
                   <br>
                 </div>
                 <div class="col-md-12">
                   <label>Description</label>
                   <input type="text" name="description" class="form-control" placeholder="Enter your Description" required>
                   <br>
                 </div>
                 <div class="col-md-12">
                   <label>Schedule From</label>
                   <input type="datetime-local" name="start" class="form-control" required>
                   <br>
                 </div>
                 <div class="col-md-12">
                   <label>Schedule To</label>
                   <input type="datetime-local" name="end" class="form-control" required>
                   <br>
                 </div>
                 <div class="col-md-12">
                   <button class="btn btn-primary btn-md">Save</button>
                 </div>
              </div>
         </div>
         <?php echo form_close()?>
      </div>
   </div>
</div>

<style type="text/css">
   .btn-info{
      background-color: #38469f !important;
      border-color: #38469f !important;
   }

   .badge{
      background-color: #28a745 !important;
   }
   
   .color_text{
       color: #000 !important;
   }
</style>

<script src='https://fullcalendar.io/js/fullcalendar-2.4.0/lib/moment.min.js'></script>
<script src='https://fullcalendar.io/js/fullcalendar-2.4.0/lib/jquery.min.js'></script>
<script src='https://fullcalendar.io/js/fullcalendar-2.4.0/fullcalendar.min.js'></script>

<script type="text/javascript">
  $(document).ready(function() {
      var insertdata = '<?php echo $insertdata; ?>';
      var eventData = JSON.parse(insertdata);  
      console.log(eventData);
      var currentDate = new Date();
      $('#calendar').fullCalendar({
         header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay',
         },
         defaultDate: currentDate,
         editable: true,
         eventLimit: true, 
         events: eventData
      });

      $('#calendar').on('click', '.fc-prev-button', function() {
         $('#calendar').fullCalendar( 'removeEvents' );
         $('#calendar').fullCalendar( 'addEventSource', eventData);
      });
  });


    //  $(document).ready(function() {
    //     var insertdata = '<?php echo $insertdata; ?>';
    //     var eventData = JSON.parse(insertdata);
    
    //     var eventDataFromLocalStorage = localStorage.getItem('eventData');
        
    //     if (eventDataFromLocalStorage) {
    //         eventData = JSON.parse(eventDataFromLocalStorage);
    //     }
    
    //     var currentDate = new Date();
    //     var calendar = $('#calendar');
    
    //     calendar.fullCalendar({
    //         header: {
    //             left: 'prev,next today',
    //             center: 'title',
    //             right: 'month,agendaWeek,agendaDay',
    //         },
    //         defaultDate: currentDate,
    //         editable: true,
    //         eventLimit: true,
    //         events: eventData,
    //         eventDrop: function(event, delta, revertFunc) {
    //             var updatedEvent = findEventById(event.id);
    //             if (updatedEvent) {
    //                 updatedEvent.start = event.start.format();
    //                 saveEventInLocalStorage(eventData);
    //             } else {
    //                 console.error('Event with ID ' + event.id + ' not found.');
    //                 revertFunc();
    //             }
    //         },
    //     });
    
    //     function findEventById(eventId) {
    //         return eventData.find(function(event) {
    //             return event.id === eventId;
    //         });
    //     }
    //     function saveEventInLocalStorage(eventData) {
    //         localStorage.setItem('eventData', JSON.stringify(eventData));
    //     }
    // });
</script>

