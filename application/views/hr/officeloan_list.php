<?php error_reporting(1); ?>
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
 <script type="text/javascript" src="<?php echo base_url()?>my-assets/js/officeloan_tableManager.js"></script>
<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
<script type="text/javascript" src="http://mrrio.github.io/jsPDF/dist/jspdf.debug.js"></script>
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" />
<script type="text/javascript" src="http://www.bacubacu.com/colresizable/js/colResizable-1.5.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/drag_drop_index_table.js"></script>

<style>
  .btnclr{
       background-color:<?php echo $setting_detail[0]['button_color']; ?>;
       color: white;

   }

</style>


<div class="content-wrapper">

    <section class="content-header">

        <div class="header-icon">

            <figure class="one">
               <img src="<?php echo base_url()  ?>asset/images/officeloan.png"  class="headshotphoto" style="height:50px;" />
      </div>

 
            <div class="header-title">
          <div class="logo-holder logo-9">
          <h1><?php echo ('Manage Office Loan') ?></h1>
       </div>

       
            <small></small>

            <ol class="breadcrumb">

                <li><a href=""><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('hrm') ?></a></li>
                <li class="active" style="color:orange"><?php echo ('Manage Office Loan') ?></li>
                <div class="load-wrapp">
      <div class="load-10">
         <div class="bar"></div>
      </div>
    </div>
              </ol>

        </div>

    </section>

<style>
#content{
      padding: 0px;
}
  </style>

    <section class="content">



        <!-- Alert Message -->

        <?php

        $message = $this->session->userdata('message');

        if (isset($message)) {

            ?>

            <div class="alert alert-info alert-dismissable" style="color:white;background-color: #38469f;">

                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

                <?php echo $message ?>                    

            </div>

            <?php

            $this->session->unset_userdata('message');

        }

        $error_message = $this->session->userdata('error_message');

        if (isset($error_message)) {

            ?>

            <div class="alert alert-danger alert-dismissable" style="color:white;background-color: #38469f;">

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
<div class="col-sm-4" style="display: flex; justify-content: space-between; align-items: left;">
<?php    foreach(  $this->session->userdata('perm_data') as $test){
    $split=explode('-',$test);
    if(trim($split[0])=='hrm' && $_SESSION['u_type'] ==3 && trim($split[1])=='1000'){
      
      
       ?>

<a href="<?php echo base_url('Chrm/add_office_loan') ?>" class="btn btnclr dropdown-toggle" style="color:white;border-color: #2e6da4;height:fit-content;"><i class="far fa-file-alt"> </i> <?php echo ('Add Office Loan') ?></a>
                    
                    <?php break;}} 
                    if($_SESSION['u_type'] ==2){ ?>

<a href="<?php echo base_url('Chrm/add_office_loan') ?>" class="btn btnclr dropdown-toggle" style="color:white;border-color: #2e6da4;height:fit-content;"><i class="far fa-file-alt"> </i> <?php echo ('Add Office Loan') ?></a>

                        <?php  } ?>
        &nbsp;&nbsp;

 
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
            <th class="search_dropdown" style="width: 22%;">
               <span><?php echo ('Person Id') ?> </span>
               <select id="pname-filter" class="form-control">
                  <option>Any</option>
                  <?php 
                     $person_id  = array();
                     foreach ($officeloan_data_get as $office) {
                     $person_id[] = $office['person_id'];
                     }
                     $unique_person_id  = array_unique($person_id);
                     
                     
                     $debit = array();
                     foreach ($officeloan_data_get as $office) {
                     $debit[] = $office['debit'];
                     }
                     $unique_debit = array_unique($debit);
                     
                     
                     $phone = array();
                     foreach ($officeloan_data_get as $office) {
                     $phone[] = $office['phone'];
                     }
                     $unique_phone = array_unique($phone);


                     $details = array();
                     foreach ($officeloan_data_get as $office) {
                     $details[] = $office['details'];
                     }
                     $unique_details = array_unique($details);
                     
                     
                     $date = array();
                     foreach ($officeloan_data_get as $office) {
                     $date[] = $office['date'];
                     }
                     $unique_date = array_unique($date); 
                    



                      foreach($unique_person_id as $office){  ?>
                  <option value="<?php echo $office; ?>"><?php echo $office; ?> </option>
                  <?php }  ?>
               </select>
            </th>
            <th class="search_dropdown" style="width: 22%;">
               <span>Amount</span>
               <select id="model-filter" class="form-control">
                  <option>Any</option>
                  <?php foreach($unique_debit as $office){  ?>
                  <option value="<?php echo $office; ?>"><?php echo $office; ?></option>
                  <?php }  ?>
               </select>
            </th>
            <th class="search_dropdown" style="width: 22%;">
               <span>Phone</span>
               <select id="category-filter" class="form-control">
                  <option>Any</option>
                  <?php foreach($unique_phone as $office){  ?>
                  <option value="<?php echo $office; ?>"><?php echo $office; ?></option>
                  <?php }  ?>
               </select>
            </th>
            <th class="search_dropdown" style="width: 200px;">
               <span>Details</span>
               <select id="unit-filter" class="form-control">
                  <option>Any</option>
                  <?php foreach($unique_details as $office){  ?>
                  <option value="<?php echo $office; ?>"><?php echo $office; ?></option>
                  <?php }  ?>
               </select>
            </th>
            <th class="search_dropdown" style="width: 22%;">
               <span>Date</span>
               <select id="supplier-filter" class="form-control">
                  <option>Any</option>
                  <?php foreach($unique_date as $office){  ?>
                  <option value="<?php echo $office; ?>"><?php echo $office; ?></option>
                  <?php }  ?>
               </select>
            </th>
         </tr>
      </thead>
   </table>
   <table>
      <tr>
         <td style="width:10px;"></td>
         <td style="width:22%;">   <input type="text" class="form-control" id="myInput1" onkeyup="search()" placeholder="Search for  Person Id.."></td>
         <td style="width:10px;"></td>
         <td style="width:22%;"> <input type="text" class="form-control" id="myInput2" onkeyup="search()" placeholder="Search for Amount.."></td>
         <td style="width:10px;"></td>
         <td style="width:20%;">  <input type="text" class="form-control" id="myInput3" onkeyup="search()" placeholder="Search for   Phone.."></td>
         <td style="width:10px;"></td>
         <td style="width:20%;"> <input type="text" class="form-control" id="myInput4" onkeyup="search()" placeholder="Search for    Details.."></td>
         <td style="width:10px;"></td>
         <td style="width: 203px;"> <input type="text" class="form-control" id="myInput5" onkeyup="search()" placeholder="Search for  Date.."></td>
      </tr>
   </table>
   <br/>
   <div class="col-sm-12">
      <input id="search" type="text" class="form-control"  placeholder="Search for Office Loan..">
 </div>
</div>
</div>

</div>




<div class="row">
         <div class="col-sm-12"  >
            <div class="panel panel-bd lobidrag"     style="border: 3px solid #d7d4d6;">
               <div class="panel-heading"  style="border-color:white;" >
                  <div class="row"   style="height:0px;">
                     <input type="hidden" class="txt_csrfname" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                     <div id="for_filter_by" class="for_filter_by" style="display: inline;margin-right: 13px;">
                        <label for="filter_by"> <?php echo display('Filter By') ?> &nbsp;&nbsp;
                        </label>
                        <select id="filterby" style="border-radius:5px;height:25px;width: 150px;">
                        <option value="1"><?php echo display('Sl') ?></option>
<option value="2"><?php echo ('Transaction Id') ?></option>
<option value="3"><?php echo ('Person Id') ?></option>
<option value="4"><?php echo ('Amount') ?></option>
<option value="5"><?php echo ('Phone') ?></option>
<option value="6"><?php echo ('Details') ?></option>
<option value="8"><?php echo "Status" ?></option>
 
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




<tr  class="sortableTable__header btnclr ">

<th class="1 value"  data-col="1"  data-resizable-column-id="1"    ><?php echo display('sl') ?></th>

<th class="2 value"  data-col="2"  data-resizable-column-id="2"    ><?php echo ('Transaction Id') ?></th>

<th class="3 value"  data-col="3"  data-resizable-column-id="3"   ><?php echo ('Person Id') ?></th>

<th class="4 value"  data-col="4"  data-resizable-column-id="4"   ><?php echo ('Amount') ?></th>

<th class="5 value"  data-col="5"  data-resizable-column-id="5"   ><?php echo ('Phone') ?></th>

<th class="6 value"  data-col="6"  data-resizable-column-id="6" ><?php echo display('Details') ?></th>

<th class="7 value"  data-col="7"  data-resizable-column-id="7"><?php echo ('Date') ?></th>

<th class="8 value"  data-col="8"  data-resizable-column-id="8"><?php echo "Status" ?></th>
<th class="9 value"  data-col="9"  data-resizable-column-id="9"><?php echo ('Action') ?></th>


</tr>
</thead>



<tbody class="sortableTable__body" id="tab" >


<?php




if ($office_loan_list) {

    ?>

   

    <?php

    $sl = 1;

     foreach($office_loan_list as $officeloan){?>




<tr   style="text-align:center"  id="task-<?php echo $i; ?>"
                                                class="task-list-row"
                                                  data-task-id="<?php echo $i; ?>"    
                                                  
                                                  data-pname="<?php echo ($officeloan['person_id']); ?>"
                                                  data-model="<?php echo $officeloan['debit']; ?>"
                                                  data-category="<?php echo $officeloan['phone']; ?>"
                                                  data-unit="<?php echo $officeloan['details']; ?>"
                                                  data-supplier="<?php echo $officeloan['date']; ?>">




    <td class="1 value" data-col="1"><?php echo $sl;?></td>

<td class="2 value"  data-col="2">  <?php echo html_escape($officeloan['transaction_id']);?></a></td>
<td class="3 value"  data-col="3"><?php echo html_escape($officeloan['person_id']);?></td>

<td class="4 value"  data-col="4"><?php echo html_escape($officeloan['debit']);?></td>

<td class="5 value"  data-col="5"><?php echo html_escape($officeloan['phone']);?></td>


<td class="6 value"  data-col="6"><?php echo html_escape($officeloan['details']);?></td>



<td class="7 value"  data-col="7"><?php echo html_escape($officeloan['date']);?></td>
<?php  if($officeloan['status']=='0'){ ?>
<td class="8 value"  data-col="8"><?php echo "Not Paid";?></td>
<?php  }else if($officeloan['status']=='1'){ ?>
<td class="8 value"  data-col="8"><?php echo "Paid";?></td>
<?php  } else{ ?>
<td class="8 value"  data-col="8"><?php echo "";?></td>

<?php   } ?>
<td class="9 value"  data-col="9" >

<center>

    <?php echo form_open() ?>





<a class="btnclr btn m-b-5 m-r-2" href="<?php echo base_url('Chrm/office_loan_inserthtml/'.$officeloan['transaction_id'])?>"><i class="fa fa-download" aria-hidden="true"></i></a>


















<?php    foreach(  $this->session->userdata('perm_data') as $test){
    $split=explode('-',$test);
    if(trim($split[0])=='hrm' && $_SESSION['u_type'] ==3 && trim($split[1])=='0010'){
      
      
       ?>

<a href="<?php echo base_url() . 'Chrm/officeloan_edit/'.$officeloan['transaction_id']; ?>" class="btnclr btn m-b-5 m-r-2" data-toggle="tooltip" data-placement="left" title="<?php echo display('update') ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                    
                    <?php break;}} 
                    if($_SESSION['u_type'] ==2){ ?>

<a href="<?php echo base_url() . 'Chrm/officeloan_edit/'.$officeloan['transaction_id']; ?>" class="btnclr btn m-b-5 m-r-2" data-toggle="tooltip" data-placement="left" title="<?php echo display('update') ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>

                        <?php  } ?>








                        <?php    foreach(  $this->session->userdata('perm_data') as $test){
    $split=explode('-',$test);
    if(trim($split[0])=='hrm' && $_SESSION['u_type'] ==3 && trim($split[1])=='0001'){
      
      
       ?>

<a href="<?php echo base_url('Chrm/office_loan_delete/'.$officeloan['transaction_id']) ?>" class="btnclr btn m-b-5 m-r-2" onclick="return confirm('<?php echo display('are_you_sure') ?>')" data-toggle="tooltip" data-placement="right" title="" data-original-title="<?php echo display('delete') ?> "><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                    
                    <?php break;}} 
                    if($_SESSION['u_type'] ==2){ ?>

<a href="<?php echo base_url('Chrm/office_loan_delete/'.$officeloan['transaction_id']) ?>" class="btnclr btn m-b-5 m-r-2" onclick="return confirm('<?php echo display('are_you_sure') ?>')" data-toggle="tooltip" data-placement="right" title="" data-original-title="<?php echo display('delete') ?> "><i class="fa fa-trash-o" aria-hidden="true"></i></a>

                        <?php  } ?>























      
                        <?php echo form_close() ?>

</center>

</td>

</tr>



<?php

$sl++;

}}else{

?>

<tr><td style="text-align:center;" colspan="9">No Records Found</td></tr>
<?php  }  ?>






                           </tbody>
                            
                        </table>
                     </div>
                  </div>
   </section>








<script src="<?php echo base_url()?>assets/js/jquery.bootgrid.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.0.0-alpha.1/jspdf.plugin.autotable.js"></script>

<script type="text/javascript" src="<?php echo base_url()?>my-assets/js/profarma.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>






                <div id="myModal_colSwitch"  name="myofficeloanName"      class="modal_colSwitch" >
                    <div class="modal-content_colSwitch" style="width:20%;height:20%;">
                    <span class="close_colSwitch">&times;</span>
                       
                          <div class="col-sm-2" ></div>


                          <div class="col-sm-4" ><br>
                          <div class="form-group row"  > 
                         
                          <br><input type="checkbox"  data-control-column="1" class="1"  value="1"/>&nbsp; <?php echo display('Sl')?><br>
                          <!-- <br><input type="checkbox"  data-control-column="3" class="3"  value="3"/>&nbsp;<?php echo ('Person Id')?><br> -->
                          <!-- <br><input type="checkbox"  data-control-column="4" class="4"   value="4"/>&nbsp;<?php echo display('Amount')?><br> -->
                          <br><input type="checkbox"  data-control-column="5" class="5"   value="5"/>&nbsp;<?php echo display('Phone')?><br>

             </div>
        </div>




                      <div class="col-sm-4"  ><br>
                          <div class="form-group row"  >
                          <br><input type="checkbox"  data-control-column="6" class="6"  value="6"/>&nbsp;<?php echo display('Details')?><br>

                          <!-- <br><input type="checkbox"  data-control-column="7" class="7"   value="7"/>&nbsp;<?php echo display('Date')?><br> -->
                          <br><input type="checkbox"  data-control-column="2" class="2"   value="2"/>&nbsp;<?php echo ('TransactionId')?><br>


                        </div>
                        </div>
     

   
                          <div class="col-sm-3"  ><br>
                          <div class="form-group row"  >


 <!-- <br><input type="checkbox"  data-control-column="8" class="8"   value="8"/>&nbsp;<?php echo "Status" ?><br> -->
                          <!-- <br><input type="checkbox"  data-control-column="9" class="9"   value="9"/>&nbsp;<?php echo display('action')?><br> -->

                 
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
  const invoice = document.getElementById("content");
           console.log(invoice);
           console.log(window);
           var pageWidth = 8.5;
           var margin=0.5;
           var opt = {
 lineHeight : 1.2,
 margin : 0.2,
 maxLineWidth : pageWidth - margin *1,
               filename: 'employee_form'+'.pdf',
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
}).save('employee_form.pdf');
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



$(document).ready(function() {
       var localStorageName = "myofficeloanName"; // Set your desired localStorage name
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
    
      td = tr[i].getElementsByTagName("td")[2];
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
   


    function reload(){
    location.reload();
}


</script><style>
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
    width: 140px;
  }
}

</style>
