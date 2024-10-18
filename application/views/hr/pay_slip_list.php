<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/calanderstyle.css">
<div class="content-wrapper">
   <section class="content-header" style="height: 60px;">
      <div class="header-icon">
         <figure class="one">
            <img src="<?php echo base_url() ?>asset/images/payslip.png" class="headshotphoto" style="height:50px;" />
         </figure>
      </div>
      <div class="header-title">
         <div class="logo-holder logo-9">
         <h1>Generated Pay Slips List</h1>
         </div>


            <ol class="breadcrumb" style=" border: 3px solid #d7d4d6;" >
               <li><a href="<?php echo base_url()?>"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
               <li><a href="#"><?php echo display('report') ?></a></li>
               <li class="active" style="color:orange"><?php echo 'Federal Income Tax';?></li>
            <div class="load-wrapp">
               <div class="load-10">
                  <div class="bar"></div>
               </div>
            </div>
         </ol>
      </div>
   </section>
   <section class="content">
      <?php
         $message = $this->session->userdata('message');
         if (isset($message)) { 
      ?>
      <div class="alert alert-info alert-dismissable" style="background-color:#38469f;color:white;font-weight:bold;">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
         <?php echo $message ?>                    
      </div>
      <?php $this->session->unset_userdata('message'); }
         $error_message = $this->session->userdata('error_message');
         if (isset($error_message)) {
      ?>
      <div class="alert alert-danger alert-dismissable">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
         <?php echo $error_message ?>                    
      </div>
      <?php $this->session->unset_userdata('error_message');}?>
      <div class="panel panel-bd lobidrag">
         <div class="panel-heading" style="height: 60px;border: 3px solid #D7D4D6;">
            <div class="col-sm-12">
                <div class="col-md-6 col-sm-6" style="display: flex; justify-content: center; align-items: center;">
                    <label>Employee</label>&nbsp;&nbsp;&nbsp;
                    <select id="customer-name-filter" name="employee_name" class="form-control employee_name">
                        <option value="All">All</option> 
                        <?php
                          foreach ($employee_data as $emp) {
                            $emp['first_name']=trim($emp['first_name']);
                            $emp['last_name']=trim($emp['last_name']);
                          ?>
                        <option value="<?php echo $emp['first_name']." ".$emp['middle_name']." ".$emp['last_name']; ?>"><?php echo $emp['first_name']." ".$emp['middle_name']." ".$emp['last_name']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="search">
                      <span class="fa fa-search"></span>
                      <input class="daterangepicker_field dateSearch" name="daterangepicker-field" autocomplete="off" id="daterangepicker-field" placeholder="Search...">
                    </div>
                    <input type="button" id="searchtrans" name="btnSave" class="btn btnclr" value="Search" style="margin-bottom: 5px; margin-left: 10px;"/>
                </div>
            </div>   
         </div>
         <div class="row">
            <div class="col-sm-12">
               <div class="error_display mb-2"></div>
               <div class="panel panel-bd lobidrag">
                  <div class="panel-body" style="border: 3px solid #D7D4D6;">
                     <table class="table table-bordered" cellspacing="0" width="100%" id="payslip_list">
                        <thead>
                           <tr class="btnclr">
                              <th class="text-center"><?php echo ('S.No') ?></th>
                              <th class="text-center"><?php echo ('Employee Name') ?></th>
                              <th class="text-center"><?php echo ('Job Title') ?></th>
                              <th class="text-center"><?php echo ('Month') ?></th>
                              <th class="text-center"><?php echo ('Total hours/Days') ?></th>
                              <th class="text-center"><?php echo ('Total Amount') ?></th>
                              <th class="text-center"><?php echo ('Over Time') ?></th>
                              <th class="text-center"><?php echo ('Sales Commision') ?></th>
                              <th class="text-center"><?php echo ('Action') ?></th>
                           </tr>
                        </thead>
                        <tfoot>
                            <tr class="btnclr">
                                <th colspan="5" style="text-align:right">Total:</th>
                              
                                <th class="text-center"></th>
                                <th class="text-center"></th>
                                <th class="text-center"></th>
                                <th></th>
                            </tr>
                        </tfoot>
                     </table>
                  </div>
               </div>     
            </div>
         </div>
      </div>
   </section>
</div>


<script src='<?php echo base_url();?>assets/js/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/knockout/3.4.0/knockout-debug.js'></script>
<script  src="<?php echo base_url() ?>assets/js/scripts.js"></script> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script type="text/javascript">
var payslipDataTable;
$(document).ready(function() {
$(".sidebar-mini").addClass('sidebar-collapse') ;
    if ($.fn.DataTable.isDataTable('#payslip_list')) {
        $('#payslip_list').DataTable().clear().destroy();
    }
    var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>';
    var csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';
    payslipDataTable = $('#payslip_list').DataTable({
        "processing": true,
        "serverSide": true,
        "lengthMenu": [
            [10, 25, 50, 100],
            [10, 25, 50, 100]
        ],
        "ajax": {
            "url": "<?php echo base_url('Chrm/payslipIndexData'); ?>",
            "type": "POST",
            "data": function(d) {
                d['<?php echo $this->security->get_csrf_token_name(); ?>'] =
                    '<?php echo $this->security->get_csrf_hash(); ?>';
                d.employee_name = $('.employee_name').val(); 
                d['payslip_date_search'] = $('#daterangepicker-field').val();
            },
            "dataSrc": function(json) {
               csrfHash = json[
                    '<?php echo $this->security->get_csrf_token_name(); ?>'];
                return json.data;
            }
        },
         "columns": [
         { "data": "table_id" },
         { "data": "first_name" },
         { "data": "job_title" },
         { "data": "month" },
         { "data": "total_hours" },
         { "data": "tot_amt" },
         { "data": "overtime" },
         { "data": "sales_comm" },
         { "data": "action" },
         ],
        "columnDefs": [{
            "orderable": false,
            "targets": [0, 8],
            searchBuilder: {
                defaultCondition: '='
            },
            "initComplete": function() {
                this.api().columns().every(function() {
                    var column = this;
                    var select = $(
                            '<select><option value=""></option></select>'
                        )
                        .appendTo($(column.footer()).empty())
                        .on('change', function() {
                            var val = $.fn.dataTable.util
                                .escapeRegex(
                                    $(this).val()
                                );
                            column.search(val ? '^' + val + '$' :
                                '', true, false).draw();
                        });
                    column.data().unique().sort().each(function(d, j) {
                        select.append('<option value="' + d +
                            '">' + d + '</option>')
                    });
                });
            },
        }],
        "pageLength": 10,
        "colReorder": true,
        "stateSave": true,
footerCallback: function(row, data, start, end, display) {
    var api = this.api();

    // Initialize total variables
    var totalHours = 0;
    var totalAmount = 0;
    var totalOvertimeHours = 0;
    var totalSalesCommission = 0;

    function convertToHours(overtime) {
    if (!overtime) return 0; // Return 0 for empty or undefined values
    var timeParts = overtime.split(':');
    var hours = parseInt(timeParts[0], 10) || 0; // Parse hours
    var minutes = parseInt(timeParts[1], 10) || 0; // Parse minutes
    return hours + minutes / 60; // Convert to decimal hours
}
function convertToHHMM(totalHours) {
    var hours = Math.floor(totalHours); // Get whole hours
    var minutes = Math.round((totalHours - hours) * 60); // Get remaining minutes
    return hours + ':' + (minutes < 10 ? '0' : '') + minutes; // Format as hh:mm
}
    api.rows({ page: 'current' }).every(function() {
        var rowData = this.data();
 totalAmount += parseFloat(rowData.tot_amt) || 0;
        totalOvertimeHours += convertToHours(rowData.overtime); // Use previous function
        totalSalesCommission += parseFloat(rowData.sales_comm) || 0;
    });

    // Convert total hours to hh:mm format for display
    var totalOvertimeFormatted = convertToHHMM(totalOvertimeHours); // Use previous function

    // Display the totals in the footer
    
    $(api.column(5).footer()).html(totalAmount.toFixed(2)); // Column index for tot_amt, formatted to 2 decimal places
    $(api.column(6).footer()).html(totalOvertimeFormatted); // Column index for overtime
    $(api.column(7).footer()).html(totalSalesCommission.toFixed(2)); // Column index for sales_comm, formatted to 2 decimal places
},

        "stateSaveCallback": function(settings, data) {
            localStorage.setItem('quotation', JSON.stringify(data));
        },
        "stateLoadCallback": function(settings) {
            var savedState = localStorage.getItem('quotation');
            return savedState ? JSON.parse(savedState) : null;
        },
        "dom": "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
            "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-6'i><'col-sm-6'p>>",
        "buttons": [{
                "extend": "copy",
                "className": "btn-sm",
                "exportOptions": {
                    "columns": ':visible'
                }
            },
            {
                "extend": "csv",
                "title": "Report",
                "className": "btn-sm",
                "exportOptions": {
                    "columns": ':visible'
                }
            },
            {
                "extend": "pdf",
                "title": "Report",
                "className": "btn-sm",
                "exportOptions": {
                    "columns": ':visible'
                }
            },
            {
                "extend": "print",
                "className": "btn-sm",
                "exportOptions": {
                    "columns": ':visible'
                },
                "customize": function(win) {
                    $(win.document.body)
                        .css('font-size', '10pt')
                        .prepend(
                            '<div style="text-align:center;"><h3>Manage Quotation</h3></div>'
                        )
                        .append(
                            '<div style="text-align:center;"><h4>amoriotech.com</h4></div>'
                        );
                    $(win.document.body).find('table')
                        .addClass('compact')
                        .css('font-size', 'inherit');
                    var rows = $(win.document.body).find('table tbody tr');
                    rows.each(function() {
                        if ($(this).find('td').length === 0) {
                            $(this).remove();
                        }
                    });
                    $(win.document.body).find('div:last-child')
                        .css('page-break-after', 'auto');
                    $(win.document.body)
                        .css('margin', '0')
                        .css('padding', '0');
                }
            },
            {
               "extend": "colvis",
               "className": "btn-sm"
            }
        ]
    });
    
    $('.employee_name').on('change', function() {
        payslipDataTable.ajax.reload();
    });

    $('#searchtrans').on('click', function() {

        var dateValue = $('.dateSearch').val();

        if (dateValue === '') {
            toastr.error('Please select a date before searching.', 'Error');
            $('.dateSearch').addClass('error-border');
            return; 
        }
        toastr.clear();
        $('.dateSearch').removeClass('error-border');
        payslipDataTable.draw();
    });
});

</script>

<style type="text/css">
.search {
position: relative;
color: #aaa;
font-size: 16px;
}

.search {display: inline-block;}

.search input {
  width: 260px;
  height: 34px;
  background: #fff;
  border: 1px solid #fff;
  border-radius: 5px;
  box-shadow: 0 0 3px #ccc, 0 10px 15px #fff inset;
  color: #000;
}

.search input { text-indent: 32px;}

.search .fa-search { 
  position: absolute;
  top: 8px;
  left: 10px;
}

.search .fa-search {left: auto; right: 10px;}

.btnclr{
    background-color: #424f5c;
    color: #fff;
}

.select2-container{
    display: none !important;
}
.form-control{
    width: 40% !important;
}

.table.dataTable thead th{
    border-bottom: 1px solid #e1e6ef  !important;
}

.table.dataTable tfoot th{
    border-top: 1px solid #e1e6ef  !important;
}

tbody{
    text-align: center !important;
}

.error-border {
    border: 2px solid red;
}
</style>
