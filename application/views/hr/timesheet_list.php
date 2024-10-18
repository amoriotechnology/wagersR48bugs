
<?php error_reporting(1);  ?>


<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" />
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.base64.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/html2canvas.js"></script>
 <script type="text/javascript" src="<?php echo base_url()?>assets/js/jspdf.plugin.autotable"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/jspdf.umd.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
 <script type="text/javascript" src="<?php echo base_url()?>my-assets/js/timesheet_tableManager.js"></script>
<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
<script type="text/javascript" src="http://mrrio.github.io/jsPDF/dist/jspdf.debug.js"></script>
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" />
<script type="text/javascript" src="http://www.bacubacu.com/colresizable/js/colResizable-1.5.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/drag_drop_index_table.js"></script>

<style>


.content-header {
 padding: 0px 0px;   
}

.btnclr{
       background-color:<?php echo $setting_detail[0]['button_color']; ?>;
       color: white;

   }

    th,td{
        text-align:center;
    }
#content {

padding:0px;
}
.green{
    
        display: inline-block;
    min-width: 10px;
    padding: 3px 7px;
    font-size: 12px;
    font-weight: bold;
    line-height: 1;
    color: #fff;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
      background-color: #28a745 !important;
    border-radius: 10px;
}
.red{
            display: inline-block;
    min-width: 10px;
    padding: 3px 7px;
    font-size: 12px;
    font-weight: bold;
    line-height: 1;
    color: #fff;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
      background-color: #B22222 !important;
    border-radius: 10px;
    
}

.logo-9 i{
    font-size:80px;
    position:absolute;
    z-index:0;
    text-align:center;
    width:100%;
    left:0;
    top:-10px;
    color:#34495e;
    -webkit-animation:ring 2s ease infinite;
    animation:ring 2s ease infinite;
}
.logo-9 h1{
    font-family: 'Lora', serif;
    font-weight:600;
    text-transform:uppercase;
    font-size:40px;
    position:relative;
    z-index:1;
    color:#e74c3c;
    text-shadow: 3px 3px 0 #fff, -3px -3px 0 #fff, 3px -3px 0 #fff, -3px 3px 0 #fff;
}
   
   
  
   .logo-9{
    position:relative;
} 
   
   /*//side*/
   
.bar {
  float: left;
  width: 25px;
  height: 3px;
  border-radius: 4px;
  background-color: #4b9cdb;
}


.load-10 .bar {
  animation: loadingJ 2s cubic-bezier(0.17, 0.37, 0.43, 0.67) infinite;
}


@keyframes loadingJ {
  0%,
  100% {
    transform: translate(0, 0);
  }

  50% {
    transform: translate(80px, 0);
    background-color: #f5634a;
    width: 140px;
  }
}



    </style>

 




<div class="content-wrapper">
   <section class="content-header">
      <div class="header-icon">
            <figure class="one" style='    margin-left: 10px;
    margin-top: -10px;'>
               <img src="<?php echo base_url()  ?>asset/images/timesheet.png"  class="headshotphoto" style="height:50px;" />
      </div>
     <div class="header-title">
          <div class="logo-holder logo-9" style="margin-top: 25px;" >
            <h1><?php echo ('Manage Time Sheet') ?></h1>
       </div>
            <small><?php echo ""; ?></small>
            <ol class="breadcrumb">
                  <li><a href=""><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>

                <li><a href="#"><?php echo display('hrm') ?></a></li>

                <li class="active" style="color:orange"><?php echo ('Manage Time Sheet') ?></li>
                <div class="load-wrapp">
      <div class="load-10">
         <div class="bar"></div>
      </div>
    </div>
         </ol>
      </div>

      </section>









    <section class="content">



        <!-- Alert Message -->

        <?php

        $message = $this->session->userdata('message');

        if (isset($message)) {

            ?>

            <div class="alert alert-info alert-dismissable" style="color: white;background-color: #38469f;">

                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

                <?php echo $message ?>                    

            </div>

            <?php

            $this->session->unset_userdata('message');

        }

        $error_message = $this->session->userdata('error_message');

        if (isset($error_message)) {

            ?>

            <div class="alert alert-danger alert-dismissable" style="color: white;background-color: #38469f;">

                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

                <?php echo $error_message ?>                    

            </div>

            <?php

            $this->session->unset_userdata('error_message');

        }

        ?>

<script>
    $('.alert').delay(1000).fadeOut('slow');
</script>
























  <div class="panel panel-bd lobidrag" >
      <div class="panel-heading" style="height: 60px;    border: 3px solid #d7d4d6;">
         <div class="col-sm-12" style="height:69px;">
<div class="col-sm-4" style="display: flex; align-items: left;">

   <?php    foreach(  $this->session->userdata('perm_data') as $test){
    $split=explode('-',$test);
    if(trim($split[0])=='hrm' && $_SESSION['u_type'] ==3 && trim($split[1])=='1000'){
      
      
       ?>
  &nbsp; &nbsp; 

<a href="<?php echo base_url('Chrm/add_timesheet') ?>" class="btn btnclr dropdown-toggle" style="color:white;border-color: #2e6da4;height: fit-content;"><i class="far fa-file-alt"> </i> <?php echo ('Add Time Sheet') ?></a>
                    
                    <?php break;}} 
                    if($_SESSION['u_type'] ==2){ ?>
  &nbsp; &nbsp; 

<a href="<?php echo base_url('Chrm/add_timesheet') ?>" class="btn btnclr dropdown-toggle" style="color:white;border-color: #2e6da4;height: fit-content;"><i class="far fa-file-alt"> </i> <?php echo ('Add Time Sheet') ?></a>

                        <?php  } ?>
   &nbsp; &nbsp; 

         <a  class="btnclr btn btn-default dropdown-toggle  boxes filip-horizontal "  style="height:fit-content;"  id="s_icon"><b class="fa fa-search"></b>&nbsp;Advance search  </a>
  &nbsp; &nbsp; 

                        <div class="dropdown bootcol" id="drop" >
                           <button class="btnclr btn btn-default dropdown-toggle  boxes filip-horizontal" type="button" id="dropdownMenu1" style="float:left;    height: fit-content;"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" >
                           <span  class="fa fa-download"  ></span> <?php echo display('download') ?>
                           </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
            <li><a href="#" onclick="generate()"> <img src="<?php echo base_url() ?>assets/images/pdf.png" width="24px"> <?php echo display('PDF') ?></a></li>
            <li class="divider"></li>
            <li><a href="#" onclick="$('#ProfarmaInvList').tableExport({type:'excel',escape:'false'});"> <img src="<?php echo base_url() ?>assets/images/xls.png" width="24px"> <?php echo display('XLS') ?></a></li>
        </ul>
         </div>
  

    </div>

     <div class="col-sm-2" style="float:right;">
          <div class="" style="float: right;">  <a onclick="reload();"  id="removeButton">  <i class="fa fa-refresh fa-spin" style="font-size:25px;float:right;" aria-hidden="true"></i> </a>    &nbsp;    &nbsp;    &nbsp;    &nbsp; <i class="fa fa-gear fa-spin"  aria-hidden="true" id="myBtn" style="margin-right:20px;font-size:25px;float:right;" onClick="columnSwitchMODAL()"></i></div>
      </div>
      </div>

            <br>
            <br> 
            <br> 
  </div>














  <div id="search_area" style="border:4px solid #004d99;border-radius:7px;">
   <table class="table">
      <thead>
         <tr class="filters">
            <th class="search_dropdown" style="width:200px;">
               <span><?php echo ('Job title') ?> </span>
               <select id="pname-filter" class="form-control">
                  <option>Any</option>
                  <?php 
                     $first_name  = array();
                     foreach ($timesheet_data_get as $time) {
                     $first_name [] = $time['job_title'];
                     }
                     $unique_first_name  = array_unique($first_name);
                     
                     
                     $duration = array();
                     foreach ($timesheet_data_get as $time) {
                     $duration[] = $time['duration'];
                     }
                     $unique_duration = array_unique($duration);
                     
                     
                     $dailybreak = array();
                     foreach ($timesheet_data_get as $time) {
                     $dailybreak[] = $time['dailybreak'];
                     }
                     $unique_dailybreak = array_unique($dailybreak);


                     $payment_term = array();
                     foreach ($timesheet_data_get as $time) {
                     $payment_term[] = $time['payroll_type'];
                     }
                     $unique_payment_term = array_unique($payment_term);
                     
                     
                     $month = array();
                     foreach ($timesheet_data_get as $time) {
                     $month[] = $time['month'];
                     }
                     $unique_month = array_unique($month); 
                    



                      foreach($unique_first_name as $time){  ?>
                  <option value="<?php echo $time; ?>"><?php echo $time; ?> </option>
                  <?php }  ?>
               </select>
            </th>
            <!-- <th class="search_dropdown" style="width: 22%;">
               <span>Duration</span>
               <select id="model-filter" class="form-control">
                  <option>Any</option>
                  <?php //foreach($unique_duration as $time){  ?>
                  <option value="<?php //echo $time; ?>"><?php //echo $time; ?></option>
                  <?php //}  ?>
               </select>
            </th>


            <th class="search_dropdown" style="width: 22%;">
               <span>Daily Break</span>
               <select id="category-filter" class="form-control">
                  <option>Any</option>
                  <?php //foreach($unique_dailybreak as $time){  ?>
                  <option value="<?php //echo $time; ?>"><?php //echo $time; ?></option>
                  <?php /// }  ?>
               </select>
            </th> -->



            <th class="search_dropdown" style="width:200px;">
               <span>Payroll Type</span>
               <select id="unit-filter" class="form-control">
                  <option>Any</option>
                  <?php foreach($unique_payment_term as $time){  ?>
                  <option value="<?php echo $time; ?>"><?php echo $time; ?></option>
                  <?php }  ?>
               </select>
            </th>
            <th class="search_dropdown" style="width: 150px;">
               <span>Month</span>
               <select id="supplier-filter" class="form-control">
                  <option>Any</option>
                  <?php foreach($unique_month as $time){  ?>
                  <option value="<?php echo $time; ?>"><?php echo $time; ?></option>
                  <?php }  ?>
               </select>
            </th>
         </tr>
      </thead>
   </table>
   <table>
      <tr>
         <td style="width:30px;"></td>
         <td style="width:42%;">   <input type="text" class="form-control" id="myInput1" onkeyup="search()" placeholder="Search for Employee Name.."></td>
       
  
 
         <td style="width:20px;"></td>
         <td style="width:38%;"> <input type="text" class="form-control" id="myInput4" onkeyup="search()" placeholder="Search for  Payroll Type.."></td>
       
         <td style="width:20px;"></td>
         <td style="width: 203px;"> <input type="text" style="width:510px;"  class="form-control" id="myInput5" onkeyup="search()" placeholder="Search for Month.."></td>
      </tr>
   </table>
   <br/>
   <div class="col-sm-12">
      <input id="search" type="text" class="form-control"  placeholder="Search for Time Sheet..">
 </div>
</div>
</div>

 
   <!-- Manage  Employee -->
 

<div class="row">
         <div class="col-sm-12"  >
            <div class="panel panel-bd lobidrag"     style="border: 3px solid #d7d4d6;">
               <div class="panel-heading"  style="border-color:white;" >
                  <div class="row"   style="height:0px;">
                     <input type="hidden" class="txt_csrfname" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                     <div id="for_filter_by" class="for_filter_by" style="display: inline;margin-right: 13px;">
                        <label for="filter_by"> <?php echo display('Filter By') ?> &nbsp;&nbsp;
                        </label>
                        <select id="filterby" style="border-radius:5px;height:25px;">
                             <option value="1"><?php echo display('Sl') ?></option>
<option value="2">Employee Name</option>
<option value="3">Job title</option>
<option value="6">Payroll Type</option>
<option value="7">month</option>
<option value="8">Payslip Status</option>
                  
                        </select> 
                        <input id="filterinput" style="height:25px;margin-bottom: 0px;" type="text"> 

                     </div>
                  </div>
               </div>





















       <div class="panel-body" style="padding-top: 0px;">
                  <div class="sortableTable__container">
                     <div class="sortableTable__discard">
                     </div>
                     <div id="customers">
                        <table class="table table-bordered" cellspacing="0" width="100%" id="ProfarmaInvList">
                           <thead class="sortableTable">
<tr  class="sortableTable__header btnclr">
<th class="1 value"  data-col="1"  data-resizable-column-id="1"    ><?php echo display('sl') ?></th>

<th class="2 value"  data-col="2"  data-resizable-column-id="2"    >Employee Name</th>

<th class="3 value"  data-col="3"  data-resizable-column-id="3"   >Job title</th>

<!-- <th class="4 value"  data-col="4"  data-resizable-column-id="4"   >Duration</th>
<th class="5 value"  data-col="5"  data-resizable-column-id="5"   >Daily Break</th> -->
<th class="6 value"  data-col="6"  data-resizable-column-id="6" >Payroll Type</th>
<th class="7 value"  data-col="7"  data-resizable-column-id="7">Date Range</th>
<th class="10 value"  data-col="10"  data-resizable-column-id="10">Total Hours/Days</th>
<th class="8 value"  data-col="8"  data-resizable-column-id="8">Payslip Status</th>
<th class="9 value"  data-col="9"  data-resizable-column-id="9">Action</th>


</tr>
</thead>
<tbody class="sortableTable__body" id="tab" >


<?php




if ($timesheet_list) {

    ?>
    <?php

    $sl = 1;

     foreach($timesheet_list as $timsht){?>

<tr id="task-<?php echo $i; ?>"
                                                class="task-list-row"
                                                  data-task-id="<?php echo $i; ?>"                                                    
                                                  data-pname="<?php echo ($timsht['job_title']); ?>"
                                                  data-model="<?php echo $timsht['duration']; ?>"
                                                  data-category="<?php echo $timsht['dailybreak']; ?>"
                                                  data-unit="<?php echo $timsht['payroll_type']; ?>"
                                                  data-supplier="<?php echo $timsht['month']; ?>">
 

    <td class="1 value" data-col="1"><?php echo $sl++;?></td>
<td class="2 value"  data-col="2">   <?php echo isset($timsht['first_name']) ? $timsht['first_name'] . " " : ""; ?>
 <?php echo isset($timsht['middle_name']) ? $timsht['middle_name'] . " " : ""; ?>
 <?php echo isset($timsht['last_name']) ? $timsht['last_name'] : ""; ?></a></td>
<td class="3 value"  data-col="3"><?php echo html_escape($timsht['job_title']);?></td>

<!-- <td class="4 value"  data-col="4"><?php //echo html_escape($timsht['duration']);?></td> -->

<!-- <td class="5 value"  data-col="5"><?php //echo html_escape($timsht['dailybreak']);?></td> -->

<!-- <td class="6 value"  data-col="6"><img src="<?php //echo html_escape($timsht['payment_term']);?>" height="60px" width="80px"></td>  -->

<td class="6 value"  data-col="6"><?php echo html_escape($timsht['payroll_type']);?></td>



<td class="7 value"  data-col="7"><?php echo html_escape($timsht['month']);?></td>
<td class="10 value" data-col="10"></td>

<td class="8 value"  data-col="8"><?php if($timsht['uneditable']==1) { echo "<span class='green'>Generated</span>";  }else{ echo "<span class='red'>Pending</span>";   }  ?></td>

<td class="9 value"  data-col="9" >

<center>

    <?php echo form_open() ?>

 
<a href="<?php echo base_url() . 'Chrm/employee_payslip_permission/'.$timsht['timesheet_id']; ?>" class="btnclr btn m-b-5 m-r-2" data-toggle="tooltip" data-placement="left" title="Administrator Update"><i class="fas fa-user-tie" aria-hidden="true"></i></a>
<a class="btnclr btn m-b-5 m-r-2"  data-toggle="tooltip" data-placement="left" title="Download"   href="<?php echo base_url('Chrm/time_sheet_pdf/'.$timsht['timesheet_id'])?>"><i class="fa fa-download" aria-hidden="true"></i></a>
 
<?php    foreach(  $this->session->userdata('perm_data') as $test){
    $split=explode('-',$test);
    if(trim($split[0])=='hrm' && $_SESSION['u_type'] ==3 && trim($split[1])=='0010'){
      
      
       ?>

<a href="<?php echo base_url() . 'Chrm/edit_timesheet/'.$timsht['timesheet_id']; ?>" class="btnclr btn m-b-5 m-r-2" data-toggle="tooltip" data-placement="left" title="<?php echo display('update') ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
             
                    <?php break;}} ?>
              
 


                        <?php    foreach(  $this->session->userdata('perm_data') as $test){
    $split=explode('-',$test);

       
                   // echo $_SESSION['u_type'];die();
                   ?>


                        <?php  }  ?>
                           <a href="<?php echo base_url('Chrm/timesheet_delete/'.$timsht['timesheet_id']) ?>" class="btnclr btn m-b-5 m-r-2" onclick="return confirm('<?php echo display('are_you_sure') ?>')" data-toggle="tooltip" data-placement="right" title="" data-original-title="<?php echo display('delete') ?> "><i class="fa fa-trash-o" aria-hidden="true"></i></a>

                     <?php     } ?>
                  
             <?php        } ?>







    </td>

	</tr>

    <?php $s++; ?>
                           </tbody>
                        </table>
                     </div>
                  </div>
   </section>
   

<div id="myModal_colSwitch"  name="mytimesheetName"      class="modal_colSwitch" >
   <div class="modal-content_colSwitch" style="width:20%;height:20%;">
      <span class="close_colSwitch">&times;</span>
      <div class="col-sm-2" ></div>
      <div class="col-sm-4" >
         <br>
         <div class="form-group row"  > 
            <br><input type="checkbox"  data-control-column="1" class="1" value="1"/>&nbsp;<?php echo display('Sl')?><br>
             <!-- <br><input type="checkbox"  data-control-column="2" class="2" value="2"/>&nbsp;Employee Name<br> -->
            <!-- <br><input type="checkbox"  data-control-column="3" class="3 " value="3  "/>&nbsp;Job title <br> -->
            <!-- <br><input type="checkbox"  data-control-column="4" class="4" value="4"/>&nbsp;Duration<br> -->
            <br><input type="checkbox"  data-control-column="7"    class="7" value="7"/>&nbsp;Date Range<br>                 

           
         </div>
      </div>
      <div class="col-sm-5" >
         <br>
         <div class="form-group row"  >
            <br><input type="checkbox"  data-control-column="6"    class="6" value="6"/>&nbsp;Payroll Type<br>
            <br><input type="checkbox"  data-control-column="10"    class="10" value="10"/>&nbsp;Total Hours/Days<br>

                        <!-- <br><input type="checkbox"  data-control-column="6" class="6" value="6"/>&nbsp;Payment Terms<br> -->

         </div>
      </div>
      <div class="col-sm-3" >
         <br>
         <div class="form-group row"  >
            <!-- <br><input type="checkbox"  data-control-column="8" class="8" value="8"/>&nbsp;Payslip Status<br> -->
            <!-- <br><input type="checkbox"  data-control-column="9"    class="9" value="9"/>&nbsp;<?php echo ('Action');?><br> -->
         </div>
      </div>
   </div>
    </section>
</div>















   <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.0.0-alpha.1/jspdf.plugin.autotable.js"></script>


<script type="text/javascript" src="<?php echo base_url()?>my-assets/js/profarma.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
<script>
      function generate() {
                 var utc = new Date().toJSON().slice(0,10).replace(/-/g,'/');
  $(".myButtonClass").hide();
  var doc = new jsPDF("p", "pt");
  var res = doc.autoTableHtmlToJson(document.getElementById("ProfarmaInvList"));
  var height = doc.internal.pageSize.height;
  //doc.text("Generated PDF", 50, 50);

  doc.autoTable(res.columns, res.data, {
    startY: doc.autoTableEndPosY() + 50,
  });
  doc.save("TimeSheetList_"+utc+".pdf");
}

    $(document).on('keyup', '#filterinput', function(){
  
    var value = $(this).val().toLowerCase();
    var filter=$("#filterby").val();
    $("#ProfarmaInvList tr:not(:eq(0))").filter(function() {
        $(this).toggle($(this).find("td."+filter).text().toLowerCase().indexOf(value) > -1)
    });
});

$("input:checkbox:not(:checked)").each(function() {
    var column = "table ." + $(this).attr("value");
    console.log("Heyy : "+column);
    $(column).hide();
});

$("input:checkbox").click(function(){
    var column = "table ." + $(this).attr("value");
      console.log("Heyy : "+column);
    $(column).toggle();
});


$('#cmd').click(function() {

  var pdf = new jsPDF('p','pt','a4');
  $('#for_numrows,#pagesControllers').hide();
    const invoice = document.getElementById("content");
             console.log(invoice);
             console.log(window);
             var pageWidth = 8.5;
             var margin=0.5;
             var opt = {
   lineHeight : 1.2,
   margin : 0.2,
   maxLineWidth : pageWidth - margin *1,
                 filename: 'tax_details'+'.pdf',
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
  }).save('tax_details.pdf');
    setTimeout( function(){
      $('#for_numrows,#pagesControllers').show();
    }, 4500 );
});




function reload(){
    location.reload();
}







$(document).ready(function(){
    $('#search_area').hide();
   });
   $('#s_icon').click(function(){
       $('#search_area').toggle();
   });
   
   
   $("#search").on("keyup", function() {
   var value = $(this).val().toLowerCase();
    $("#ProfarmaInvList tr:not(:eq(0))").filter(function() {
   
    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
   });
   });
   


    function search() {
   var input_pname,
    input_model,
    input_category,
    input_unit,
    input_supplier,
   
    filter_pname,filter_model,filter_category,filter_unit,filter_supplier,
    table,
    tr,
    td,
    i,
   
   input_pname = document.getElementById("myInput1");
   input_model = document.getElementById("myInput2");
   input_category = document.getElementById("myInput3");
   input_unit = document.getElementById("myInput4");
   input_supplier = document.getElementById("myInput5");
   
   filter_pname = input_pname.value.toUpperCase();   
   filter_model = input_model.value.toUpperCase();
   filter_category = input_category.value.toUpperCase();    
   filter_unit = input_unit.value.toUpperCase();
   filter_supplier = input_supplier.value.toUpperCase();
   
   
   
   table = document.getElementById("ProfarmaInvList");
   tr = table.getElementsByTagName("tr");
   for (i = 0; i < tr.length; i++) {
    
      td = tr[i].getElementsByTagName("td")[1];
    td1 = tr[i].getElementsByTagName("td")[3];
    td2 = tr[i].getElementsByTagName("td")[4];
    td3 = tr[i].getElementsByTagName("td")[5];
    td4 = tr[i].getElementsByTagName("td")[6];




    if (td && td1 && td2 && td3 && td4) { 
      input_pname = (td.textContent || td.innerText).toUpperCase();
      input_model = (td1.textContent || td1.innerText).toUpperCase();
      input_category = (td2.textContent || td2.innerText).toUpperCase();
      // alert('jki');
      input_unit = (td3.textContent || td3.innerText).toUpperCase();
      input_supplier = (td4.textContent || td4.innerText).toUpperCase();
      if (
        input_pname.indexOf(filter_pname) > -1 &&
        input_model.indexOf(filter_model) > -1 &&
        input_category.indexOf(filter_category) > -1 &&
        input_unit.indexOf(filter_unit) > -1 &&
        input_supplier.indexOf(filter_supplier) > -1
      ) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
   }
   }
   



 
   $("#search").on("keyup", function() {
   var value = $(this).val().toLowerCase();
    $("#ProfarmaInvList tr:not(:eq(0))").filter(function() {
   
    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
   });
   });
   
   
   
    var
  filters = {
    user: null,
    status: null,
    milestone: null,
    priority: null,
    tags: null
  };



 


   function updateFilters() {
  $('.task-list-row').hide().filter(function() {
    var
      self = $(this),
      result = true; // not guilty until proven guilty
    
    Object.keys(filters).forEach(function (filter) {
      if (filters[filter] && (filters[filter] != 'None') && (filters[filter] != 'Any')) {
        result = result && filters[filter] == self.data(filter);
      
      }
    });

    return result;
  }).show();
}


    function changeFilter(filterName) {
  filters[filterName] = this.value;
  updateFilters();
}
      
    // Assigned User Dropdown Filter
    $('#pname-filter').on('change', function() {
        // alert('hi');
      changeFilter.call(this, 'pname');
    });
    
    // Task Status Dropdown Filter
    $('#model-filter').on('change', function() {
      changeFilter.call(this, 'model');
    });
    
    // Task Milestone Dropdown Filter
    $('#category-filter').on('change', function() {
      changeFilter.call(this, 'category');
    });
    
    // Task Priority Dropdown Filter
    $('#unit-filter').on('change', function() {
      changeFilter.call(this, 'unit');
    });
    
    // Task Tags Dropdown Filter
    $('#supplier-filter').on('change', function() {
      changeFilter.call(this, 'supplier');
    });
   

   $(document).ready(function() {
       var localStorageName = "mytimesheetName"; // Set your desired localStorage name
      $("input:checkbox").each(function() {
          var columnValue = $(this).attr("value");
          var columnSelector = ".table ." + columnValue;
        //   var isChecked = localStorage.getItem(columnSelector) === "true";
                    var isChecked = localStorage.getItem(localStorageName  + columnSelector) === "true";
          // Check if the checkbox is checked or the stored state is true
          if (isChecked || $(this).prop("checked")) {
              $(columnSelector).show(); // Show the column
          } else {
              $(columnSelector).hide(); // Hide the column
          }
          $(this).prop("checked", isChecked);
      });
      // When a checkbox is clicked, update localStorage and toggle column visibility
      $("input:checkbox").click(function() {
          var columnValue = $(this).attr("value");
          var columnSelector = ".table ." + columnValue; // Corrected class name construction
          var isChecked = $(this).is(":checked");
        //   localStorage.setItem(columnSelector, isChecked); // Store checkbox state in localStorage
                    localStorage.setItem(localStorageName + columnSelector, isChecked); // Store checkbox state in localStorage
          // Toggle column visibility based on the checkbox state
          if (isChecked) {
              $(columnSelector).show(); // Show the column
          } else {
              $(columnSelector).hide(); // Hide the column
          }
      });
});




    </script>


<style>
	.select2-selection{
     display:none;
	}
</style>

