<?php error_reporting(1);  ?>
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
 <script type="text/javascript" src="<?php echo base_url()?>my-assets/js/payroll_tableManager.js"></script>
<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
<script type="text/javascript" src="http://mrrio.github.io/jsPDF/dist/jspdf.debug.js"></script>
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" />
<script type="text/javascript" src="http://www.bacubacu.com/colresizable/js/colResizable-1.5.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/drag_drop_index_table.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery.bootgrid.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.0.0-alpha.1/jspdf.plugin.autotable.js"></script>


<style>

.btnclr{
       background-color:<?php echo $setting_detail[0]['button_color']; ?>;
       color: white;

   }







  #content{
    padding:0px;
  }
    .select2-selection{
        display:none;
    }

    .pagecontroller {
         margin: 5px;
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
    width: 160px;
  }
}




</style>

<div class="content-wrapper">

    <section class="content-header">

        <div class="header-icon">

        <figure class="one">
               <img src="<?php echo base_url()  ?>asset/images/hrpayrollreport.png"  class="headshotphoto" style="height:50px;" />
      </div>
      

        <div class="header-title">

            <div class="logo-holder logo-9">
            <h1><?php echo ('Manage PayRoll Report') ?></h1>
       </div>
            <small></small>

            <ol class="breadcrumb">

                <li><a href=""><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>

                <li><a href="#"><?php echo display('hrm') ?></a></li>

                <li class="active" style="color:orange"><?php echo ('Manage Payroll Report') ?></li>


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




  <div class="panel panel-bd lobidrag" >
      <div class="panel-heading" style="height: 60px;    border: 3px solid #d7d4d6;">
         <div class="col-sm-12" style="height:69px;">
<div class="col-sm-4" style="display: flex; align-items: left;">
 

 
         <a  class="btnclr btn btn-default dropdown-toggle  boxes filip-horizontal "  style="height:fit-content;"  id="s_icon"><b class="fa fa-search"></b>&nbsp;Advance search  </a>
    
         &nbsp;&nbsp;





                        <div class="dropdown bootcol" id="drop" style="width:300px;">
                           <button class="btnclr btn btn-default dropdown-toggle  boxes filip-horizontal" type="button" id="dropdownMenu1" style="float:left;    height: fit-content;"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" >
                           <span  class="fa fa-download"  ></span> <?php echo display('download') ?>
                           </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
            <li><a href="#" onclick="generate()"> <img src="<?php echo base_url() ?>assets/images/pdf.png" width="24px"> <?php echo display('PDF') ?></a></li>
            <li class="divider"></li>
            <li><a href="#" onclick="$('#ProfarmaInvList').tableExport({type:'excel',escape:'false'});"> <img src="<?php echo base_url() ?>assets/images/xls.png" width="24px"> <?php echo display('XLS') ?></a></li>
        </ul>
        &nbsp; 
        <button type="button"    class="btnclr btn btn-default dropdown-toggle"  style="height:fit-content;"  onclick="printDiv('printableArea')"><b class="ti-printer"></b>&nbsp;<?php echo display('print') ?></button>

        </div>
 

    </div>



     <div class="col-sm-2" style="float:right;">
          <div class="" style="float: right;">  <a onclick="reload();"  id="removeButton">  <i class="fa fa-refresh fa-spin" style="font-size:25px;float:right;" aria-hidden="true"></i> </a>    &nbsp;    &nbsp;    &nbsp;    &nbsp; <i class="fa fa-gear fa-spin"  aria-hidden="true" id="myBtn" style="margin-right:20px;font-size:25px;float:right;" onClick="columnSwitchMODAL()"></i></div>
      </div>
 
      </div>

  
            <br>
            <br> 
            <br> 

           













            <div id="search_area" style="border:4px solid #004d99;border-radius:7px;">
                      <table class="table">
        <thead>
 <tr class="filters">
            <th class="search_dropdown"><span><?php echo display('employee_name') ?> </span>
              <select id="pname-filter" class="form-control">
                 <option>Any</option>
                <?php 
               $templ_name = array();
foreach ($dataforpayslip as $jt) {
    $templ_name[] = $jt['first_name']." ".$jt['last_name'];
}
$unique_emp = array_unique($templ_name);

               $job_title = array();
foreach ($dataforpayslip as $jt) {
    $job_title[] = $jt['job_title'];
}
$unique_title = array_unique($job_title);

               $break = array();
foreach ($dataforpayslip as $jt) {
    $break[] = $jt['dailybreak'];
}
$unique_break = array_unique($break);


               $pterm = array();
foreach ($dataforpayslip as $jt) {
    $pterm[] = $jt['payment_term'];
}
$unique_pterm = array_unique($pterm);

               $total_hours = array();
foreach ($dataforpayslip as $jt) {
    $total_hours[] = $jt['total_hours'];
}
$unique_total_hours = array_unique($total_hours);

               $month = array();
foreach ($dataforpayslip as $jt) {
    $month[] = $jt['month'];
}
$unique_month = array_unique($month);
                foreach($unique_emp as $e){  ?>
                <option value="<?php echo $e; ?>"><?php echo $e; ?></option>
             <?php }  ?>
              </select>
            </th>
            <th class="search_dropdown"><span><?php echo  display('designation')?></span>
              <select id="model-filter" class="form-control">
                <option>Any</option>
                 <?php foreach($unique_title as $jt){  ?>
                <option value="<?php echo $jt; ?>"><?php echo $jt; ?></option>
             <?php }  ?>
              </select>
            </th>
            <th class="search_dropdown"><span><?php echo  "Daily Break" ;?> </span>
              <select id="category-filter" class="form-control">
                <option>Any</option>
                 <?php foreach($unique_break as $jt){  ?>
                <option value="<?php echo $jt; ?>"><?php echo $jt; ?></option>
             <?php }  ?>
              </select>
            </th>
            <th class="search_dropdown"><span><?php echo  display('Payment Terms')?></span>
              <select id="unit-filter" class="form-control">
                <option>Any</option>
                 <?php foreach($unique_pterm as $jt){  ?>
                <option value="<?php echo $jt; ?>"><?php echo $jt; ?></option>
             <?php }  ?>
              </select>
            </th>
            <th class="search_dropdown"><span><?php echo  "Total hours" ;?></span>
              <select id="supplier-filter" class="form-control">
                <option>Any</option>
                <?php foreach($unique_total_hours as $jt){  ?>
                <option value="<?php echo $jt; ?>"><?php echo $jt; ?></option>
             <?php }  ?>
              </select>
            </th>
                <th class="search_dropdown"><span><?php echo  "Month" ;?></span>
              <select id="month-filter" class="form-control">
                <option>Any</option>
                <?php foreach($unique_month as $jt){  ?>
                <option value="<?php echo $jt; ?>"><?php echo $jt; ?></option>
             <?php }  ?>
              </select>
            </th>
          </tr>
        </thead>
      </table>


      
      <table>
        <tr>
 <td style="width:10px;"></td>
    <td>   <input type="text" class="form-control" id="myInput1" onkeyup="search()" placeholder="Search for Employee Name.."></td>
    <td style="width:10px;"></td>
   <td> <input type="text" class="form-control" id="myInput2" onkeyup="search()" placeholder="Search for Job Title.."></td>
     <td style="width:10px;"></td>
   <td>  <input type="text" class="form-control" id="myInput3" onkeyup="search()" placeholder="Search for Daily Break.."></td>
     <td style="width:10px;"></td>
   <td> <input type="text" class="form-control" id="myInput4" onkeyup="search()" placeholder="Search for Payment Terms.."></td>
     <td style="width:10px;"></td>
    <td> <input type="text" class="form-control" id="myInput5" onkeyup="search()" placeholder="Search for Total Hours.."></td>
      <td style="width:10px;"></td>
   <td>  <input type="text" class="form-control" id="myInput6" onkeyup="search()" placeholder="Search for Month.."></td>


     <td style="width:10px;"></td>
</tr>
</table>
<br/>
<div class="col-sm-12">
 
<input id="search" type="text" class="form-control"  placeholder="Search for Payroll Details">
<br>
</div>
<br>
<br/><br/>
</div>








        

<div class="row">
         <div class="col-sm-18"  >
            <div class="panel panel-bd lobidrag"     style="border: 3px solid #d7d4d6;">
               <div class="panel-heading"  style="border-color:white;" >
                  <div class="row"   style="height:0px;">
                     <input type="hidden" class="txt_csrfname" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                     <div id="for_filter_by" class="for_filter_by" style="display: inline;margin-right: 13px;">
                        <label for="filter_by"> <?php echo display('Filter By') ?> &nbsp;&nbsp;
                        </label>
                        <select id="filterby" style="border-radius:5px;height:25px;width: 150px;">
                        <option value="1"><?php echo display('Sl') ?></option>
<option value="2"><?php echo ('Employee Name') ?></option>
<option value="3"><?php echo ('Job Title') ?></option>
<option value="4"><?php echo ('Daily Break') ?></option>
<option value="5"><?php echo ('Payment Term') ?></option>
<option value="6"><?php echo ('Total Hours') ?></option>
<option value="7"><?php echo "Month" ?></option>
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



            <tr>


<tr  class="sortableTable__header btnclr">
<th class="1 value"  data-col="1"  data-resizable-column-id="1"    ><?php echo display('sl') ?></th>

<th class="2 value"  data-col="2"  data-resizable-column-id="2"    ><?php echo ('Employee Name') ?></th>

<th class="3 value"  data-col="3"  data-resizable-column-id="3"   ><?php echo ('Job Title') ?></th>

<th class="4 value"  data-col="4"  data-resizable-column-id="4"   ><?php echo ('Daily Break') ?></th>

<th class="5 value"  data-col="5"  data-resizable-column-id="5"   ><?php echo ('Payment Term') ?></th>

<th class="6 value"  data-col="6"  data-resizable-column-id="6" ><?php echo ('Total Hours') ?></th>

<th class="7 value"  data-col="7"  data-resizable-column-id="7"><?php echo ('Month') ?></th>
<th class="8 value"  data-col="8"  data-resizable-column-id="8"><?php echo ('Action') ?></th>
            </tr>

        </thead>

        <tbody class="sortableTable__body" id="tab" >


        <?php   $i=1;$s = 1; foreach ($dataforpayslip as $key => $list) { ?>
        
         <tr role="row" id="task-<?php echo $i; ?>"
              class="task-list-row odd" 
              data-task-id="<?php echo $i; ?>"
              data-pname="<?php echo $list['first_name']." ".$list['last_name']; ?>"
              data-model="<?php  echo $list['job_title']; ?>"
              data-category="<?php echo $list['dailybreak']; ?>"
               data-unit="<?php echo $list['payment_term']; ?>"
                data-month="<?php echo $list['month']; ?>"
              data-supplier="<?php echo $list['total_hours']; ?>">
     

                <td class="1 value" data-col="1"><?php echo $s;?></td>
<td class="2 value"  data-col="2"> <?php echo $list['first_name']." ".$list['last_name']; ?></a></td>
<td class="3 value"  data-col="3"><?php echo $list['job_title']; ?></td>

<td class="4 value"  data-col="4"><?php echo $list['dailybreak']; ?></td>

<td class="5 value"  data-col="5"><?php echo $list['payment_term']; ?></td>

<td class="6 value"  data-col="6"><?php echo $list['total_hours']; ?> </td>
<td class="7 value"  data-col="7"><?php echo $list['month']; ?> </td>
<td style="text-align:center;"><a href="<?php echo base_url('Chrm/time_list/'.$list['timesheet_id'] .'/'. trim($list['templ_name'])) ?>" class="btnclr btn btn-success btn-sm" data-toggle="tooltip" data-placement="left" title="" data-original-title="View Pay Slip"><i class="fa fa-window-restore" aria-hidden="true"></i></a>
 </td>
                <input type="hidden" value="<?php echo $list['timesheet_id']; ?>">
                <input type="hidden" value="<?php echo $list['create_by']; ?>">
            </tr>

        <?php $s++;$i++; } ?>

    
 
 
 
                       </tbody>
                    </table>
                 </div>
              </div>
</section>



























 
 



<script>
    
    $(document).ready(function(){
 $('#search_area').hide();
    });
     $('#s_icon').click(function(){
           $('#search_area').toggle();
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
  //debugger;
  filters[filterName] = this.value;
  updateFilters();
}
      
// Assigned User Dropdown Filter
$('#pname-filter').on('change', function() {

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

$('#month-filter').on('change', function() {
  changeFilter.call(this, 'month');
});
$("#search").on("keyup", function() {
  var value = $(this).val().toLowerCase();
    $("#InvList tr:not(:eq(1))").filter(function() {
 
    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
  });
});

$(document).on('keyup', '#filterinput', function(){
 
 var value = $(this).val().toLowerCase();
 var filter=$("#filterby").val();
 $("#InvList tr:not(:eq(0))").filter(function() {
     $(this).toggle($(this).find("td."+filter).text().toLowerCase().indexOf(value) > -1)
 });
});






function reload(){
 location.reload();
}

function search() {
    debugger;
    var input_pname,
        input_model,
         input_category,
         input_unit,
        input_orgin,
         input_ac,
        
          
        filter_pname,filter_model,filter_category,filter_unit,filter_orgin,filter_ac,
        table,
        tr,
        td,
        i,
        name,
        country;
    input_pname = document.getElementById("myInput1");
    input_model = document.getElementById("myInput2");
     input_category = document.getElementById("myInput3");
      input_unit = document.getElementById("myInput4");
       input_orgin = document.getElementById("myInput5");
     input_ac = document.getElementById("myInput6");
      input_asc = document.getElementById("myInput7");
        input_psc = document.getElementById("myInput8");
        

    filter_pname = input_pname.value.toUpperCase();    filter_orgin = input_orgin.value.toUpperCase();
    filter_model = input_model.value.toUpperCase();    filter_ac = input_ac.value.toUpperCase();
     filter_category = input_category.value.toUpperCase();   
      filter_unit = input_unit.value.toUpperCase();    

    table = document.getElementById("InvList");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1];
        td1 = tr[i].getElementsByTagName("td")[2];
         td2 = tr[i].getElementsByTagName("td")[3];
          td3 = tr[i].getElementsByTagName("td")[4];
            td4 = tr[i].getElementsByTagName("td")[5];
        td5 = tr[i].getElementsByTagName("td")[6];
     
        if (td && td1 && td2 && td3 && td4 && td5) {
            name = (td.textContent || td.innerText).toUpperCase();
            model = (td1.textContent || td1.innerText).toUpperCase();
              category = (td2.textContent || td2.innerText).toUpperCase();
            unit = (td3.textContent || td3.innerText).toUpperCase();
  origin = (td4.textContent || td4.innerText).toUpperCase();
              ac = (td5.textContent || td5.innerText).toUpperCase();
          

            if (
                name.indexOf(filter_pname) > -1 &&
                model.indexOf(filter_model) > -1 &&
                category.indexOf(filter_category) > -1 &&
                unit.indexOf(filter_unit) > -1   &&
                origin.indexOf(filter_orgin) > -1   &&
                ac.indexOf(filter_ac) > -1  

            ) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}
</script>


    


<script src="<?php echo base_url()?>assets/js/jquery.bootgrid.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.0.0-alpha.1/jspdf.plugin.autotable.js"></script>

<script type="text/javascript" src="<?php echo base_url()?>my-assets/js/profarma.js"></script>


<div id="myModal_colSwitch"  name="mypayrollreportsName"      class="modal_colSwitch" >
                    <div class="modal-content_colSwitch" style="width:20%;height:20%;">
                    <span class="close_colSwitch">&times;</span>
                       
                          <div class="col-sm-2" ></div>


                          <div class="col-sm-5" ><br>
                          <div class="form-group row"  > 
                         
                          <br><input type="checkbox"  data-control-column="1" class="1"  value="1"/>&nbsp; <?php echo display('Sl')?><br>
                          <!-- <br><input type="checkbox"  data-control-column="2" class="2"  value="2"/>&nbsp;<?php echo ('Employee Name')?><br> -->
                          <!-- <br><input type="checkbox"  data-control-column="3" class="3"   value="3"/>&nbsp;<?php echo ('Job Title')?><br> -->
                          <br><input type="checkbox"  data-control-column="4" class="4"   value="4"/>&nbsp;<?php echo ('Daily Break')?><br>
             </div>
        </div>




                      <div class="col-sm-4"  ><br>
                          <div class="form-group row"  >
                          <!-- <br><input type="checkbox"  data-control-column="5" class="5"  value="5"/>&nbsp;<?php echo ('Payment Term')?><br> -->

                          <br><input type="checkbox"  data-control-column="6" class="6"   value="6"/>&nbsp;<?php echo ('Total Hours')?><br>
                          <br><input type="checkbox"  data-control-column="7" class="7"   value="7"/>&nbsp;<?php echo ('Month')?><br>
                            <!-- <br><input type="checkbox"  data-control-column="8" class="8"   value="8"/>&nbsp;<?php echo ('Action')?><br> -->

                        </div>
                        </div>
     

   
                         



                    </div>
                </div>
    </section>
</div>






<script>
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
  const invoice = document.getElementById("printableArea");
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
}).save('Time_sheet.pdf');
  setTimeout( function(){
    $('#for_numrows,#pagesControllers').show();
  }, 4500 );
});









$(document).on('keyup', '#filterinput', function(){
  
  var value = $(this).val().toLowerCase();
  var filter=$("#filterby").val();
  $("#ProfarmaInvList tr:not(:eq(0))").filter(function() {
      $(this).toggle($(this).find("td."+filter).text().toLowerCase().indexOf(value) > -1)
  });
});


$(document).ready(function() {
       var localStorageName = "mypayrollreportsName"; // Set your desired localStorage name
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



function reload(){
    location.reload();
}
 var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';
$editor = $('#submit'),
  $editor.on('click', function(e) {
    if (this.checkValidity && !this.checkValidity()) return;
    e.preventDefault();
    var yourArray = [];
                $('.modal-content_colSwitch input[type=checkbox]:not(:checked)').each(function() {
      yourArray.push($(this).val());//push value in array
    });
    
    values = {
    
    extralist_text: yourArray
  
  };
  console.log(values)
  var json=values;
  var data = {
      page:$('#url').val(),
        content: yourArray
     
     };
     data[csrfName] = csrfHash;
$.ajax({
  
  type: "POST",  
  url:'<?php echo base_url();?>Cinvoice/setting',
 
  data: data,
  dataType: "json", 
  success: function(data) {
      if(data) {
         console.log(data);
      }
  }  
});
});


</script>