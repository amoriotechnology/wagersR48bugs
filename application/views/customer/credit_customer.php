<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>

<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.base64.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/html2canvas.js"></script>
 <script type="text/javascript" src="<?php echo base_url()?>assets/js/jspdf.plugin.autotable"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/jspdf.umd.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
 <script type="text/javascript" src="<?php echo base_url()?>my-assets/js/tableManager.js"></script>
<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
<script type="text/javascript" src="http://mrrio.github.io/jsPDF/dist/jspdf.debug.js"></script>
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" />
<script type="text/javascript" src="http://www.bacubacu.com/colresizable/js/colResizable-1.5.min.js"></script> 





<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('credit_customer') ?></h1>
            <small><?php //echo display('manage_your_credit_customer') ?></small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('customer') ?></a></li>
                <li class="active" style="color:orange"><?php echo display('credit_customer') ?></li>
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
        <div class="row">
                <div class="panel panel-bd lobidrag">

                    <div class="panel-heading" style="height: 60px;">
            <div class="col-sm-12">
   <div class="col-sm-9">

   <a    href="<?php echo base_url('Ccustomer')?>" class="btnclr btn  m-b-5 m-r-2"  ><i class="ti-plus"> </i> <?php echo display('add_customer')?> </a>
  
   <a   href="<?php echo base_url('Ccustomer/manage_customer')?>" class="btnclr btn  m-b-5 m-r-2"  ><i class="ti-align-justify"> </i>  <?php echo display('manage_customer')?> </a>

   <a   href="<?php echo base_url('Ccustomer/paid_customer')?>" class="btnclr btn  m-b-5 m-r-2"  ><i class="ti-align-justify"> </i>  <?php echo display('paid_customer')?> </a>

   <a onclick="reload();"  >  <i class="fa fa-refresh" style="font-size:25px;float:right;" aria-hidden="true"></i> </a>

      </div>
                           <div class="col-sm-2">
                           <i class="fa fa-cog"  aria-hidden="true" id="myBtn" style="font-size:25px;" onClick="columnSwitchMODAL()"></i>
                   
                    <div class="dropdown bootcol" id="drop" style="float:right;padding-right:20px;padding-bottom:10px;">
    <button class="btnclr btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
       <span class="glyphicon glyphicon-th-list"></span> <?php  echo  display('download')?>
     
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
   
  
                
    <li><a href="#" onclick="generate()"> <img src="<?php echo base_url()?>assets/images/pdf.png" width="24px">  <?php  echo  display('PDF')?></a></li>
      
      <li class="divider"></li>         
                  
      <li><a href="#" onclick="$('#ProfarmaInvList').tableExport({type:'excel',escape:'false'});"> <img src="<?php echo base_url()?>assets/images/xls.png" width="24px">  <?php  echo  display('XLS')?></a></li>
                 
    </ul>

    &nbsp;
    <button type="button" style="float:right;"  class="btn btnclr dropdown-toggle"  onclick="printDiv('printableArea')"><?php echo display('print') ?></button>

  </div>


  </div>
  <a style="float:right;font-size: larger;" id="s_icon"><i class="fa fa-search"   aria-hidden="true"></i></a>

    </div>


      </div>


         <!-- </div>
          </div> -->









          <div id="search_area" style="border:4px solid #004d99;border-radius:7px;">
               <table class="table">
                  <thead>
                     <tr class="filters">
                        <th class="search_dropdown" style="width: 22%;">
                           <span><?php echo ('Company Name') ?> </span>
                           <select id="pname-filter" class="form-control">
                              <option>Any</option>
                              <?php 


                                 $customer_name  = array();
                                 foreach ($customers_credit as $custcredit) {
                                  // print_r($invoice);
                                  $customer_name [] = $custcredit['customer_name'];
                                 }
                                 $unique_customer_name = array_unique($customer_name);
                                 


                                 
                                 $customer_mobile = array();
                                 foreach ($customers_credit as $custcredit) {
                                 $customer_mobile[] = $custcredit['customer_mobile'];
                                 }
                                 $unique_customer_mobile = array_unique($customer_mobile);
                                 
                    
                                 $customer_email = array();
                                 foreach ($customers_credit as $custcredit) {
                                 $customer_email[] = $custcredit['customer_email'];
                                 }
                                 $unique_customer_email   = array_unique($customer_email);
                                 
                                 
                                 $phone = array();
                                 foreach ($customers_credit as $custcredit) {
                                 $phone[] = $custcredit['phone'];
                                 }
                                 $unique_phone = array_unique($phone);
                                 


                                 $due = array();
                                 foreach ($customers_credit as $custcredit) {
                                 $due[] = $custcredit['due_amount'];
                                 }
                                 $unique_due = array_unique($due);
                                 
                                
                                  foreach($unique_customer_name as $custcredit){  ?>
                              <option value="<?php echo $custcredit; ?>"><?php echo $custcredit; ?></option>
                              <?php }  ?>
                           </select>
                        </th>
                       
                        <th class="search_dropdown" style="width: 22%;">
                           <span>Mobile </span>
                           <select id="model-filter" class="form-control">
                              <option>Any</option>
                              <?php foreach($unique_customer_mobile as $custcredit){  ?>
                              <option value="<?php echo $custcredit; ?>"><?php echo $custcredit; ?></option>
                              <?php }  ?>
                           </select>
                        </th>
                        <th class="search_dropdown" style="width: 20%;">
                           <span>Email</span>
                           <select id="category-filter" class="form-control">
                              <option>Any</option>
                              <?php foreach($unique_customer_email as $custcredit){  ?>
                              <option value="<?php echo $custcredit; ?>"><?php echo $custcredit; ?></option>
                              <?php }  ?>
                           </select>
                        </th>
                        <th class="search_dropdown" style="width: 310px;">
                           <span>Phone</span>
                           <select id="unit-filter" class="form-control">
                              <option>Any</option>
                              <?php foreach($unique_phone as $custcredit){  ?>
                              <option value="<?php echo $custcredit; ?>"><?php echo $custcredit; ?></option>
                              <?php }  ?>
                           </select>
                        </th>

                        <th class="search_dropdown" style="width: 22%;">
                           <span>Due Amount</span>
                           <select id="supplier-filter" class="form-control">
                              <option>Any</option>
                              <?php foreach($unique_due as $custcredit){  ?>
                              <option value="<?php echo $custcredit; ?>"><?php echo $custcredit; ?></option>
                              <?php }  ?>
                           </select>
                        </th>
                       
                     </tr>
                  </thead>
               </table>
               <table>
                  <tr>
                     <td style="width:10px;"></td>
                     <td style="width:22%;">   <input type="text" class="form-control" id="myInput1" onkeyup="search()" placeholder="Search for Company Name.."></td>
                     <td style="width:10px;"></td>
                     <td style="width:22%;"> <input type="text" class="form-control" id="myInput2" onkeyup="search()" placeholder="Search for Mobile   .."></td>
                     <td style="width:10px;"></td>
                     <td style="width:20%;">  <input type="text" class="form-control" id="myInput3" onkeyup="search()" placeholder="Search for Email .."></td>
                     <td style="width:10px;"></td>
                     <td style="width:20%;"> <input type="text" class="form-control" id="myInput4" onkeyup="search()" placeholder="Search for Phone .."></td>
                     <td style="width:10px;"></td>
                     <td style="width: 213px;"> <input type="text" class="form-control" id="myInput5" onkeyup="search()" placeholder="Search for Due Amount.."></td>
                  </tr>
               </table>
               <br/>
               <div class="col-sm-12">
                  <input id="search" type="text" class="form-control"  placeholder="Search for Credit Customer">
                  <br>
               </div>
               <br>
            </div>
         </div>
      </div>










        <!-- Manage Product report -->
      
        <div class="row">

            <div class="col-sm-12">

                <div class="panel panel-bd lobidrag">

                    <div class="panel-heading">

                    </div>

                    <div class="panel-body">


                    <div class="row"> 
<div id="for_filter_by" class="for_filter_by" style="display: inline;"><label for="filter_by"> <?php echo display('Filter By') ?> &nbsp;&nbsp;
                  
                   </label><select id="filterby" style="border-radius:5px;height:25px;">
                  <option value="1"> <?php echo display('ID') ?></option>
<option value="2"> <?php echo display('customer_name')?></option>
<option value="3"> <?php echo display('address')?>1</option>
<option value="4"><?php echo display('address')?>2</option>
<option value="5"><?php echo display('mobile')?></option>
<option value="6"><?php echo display('email')?></option>
<option value="7"><?php echo display('phone')?></option>
<option value="8"><?php echo display('due_amount')?></option>

                  </select> <input id="filterinput" style="border-radius:5px;height:25px;" type="text">
                
                </div>
        </div>
      




        <div id="printableArea">

                    <div id="customers">
  <table class="table table-bordered" cellspacing="0" width="100%" id="ProfarmaInvList">
  <thead>
      <tr>
      <th  class="1 value" data-control-column="1" data-col="1"      class="ID" data-resizable-column-id="1"    style="width: 80px; height: 40.0114px;" ><?php  echo  display('ID')?></th>
        <th  class="2 value" data-control-column="2" data-col="2"    class="Customer Name" data-resizable-column-id="2"  style="height: 45.0114px; width: 234.011px" ><?php  echo  display('customer_name')?></th>
        <th class="3 value" data-control-column="3" data-col="3"     class="Address 1" data-resizable-column-id="3"      style="height: 42.0114px;"   ><?php  echo  display('address')?> 1</th>
        <th class="4 value" data-control-column="4" data-col="4"     class="Address 2"  data-resizable-column-id="4"  style="width: 248.011px;"        ><?php  echo  display('address')?> 2</th>
        <th class="5 value" data-control-column="5" data-col="5"     class="Mobile" data-resizable-column-id="5"      style="width: 198.011px;"       ><?php  echo  display('mobile')?></th>
        <th class="6 value" data-control-column="6" data-col="6"     class="Email" data-resizable-column-id="6"       style="width: 190.011px; height: 44.0114px;"><?php  echo  display('email')?></th>
        <th class="7 value" data-control-column="7" data-col="7"     class="Phone" data-resizable-column-id="7"       style="width: 198.011px;"       ><?php  echo  display('phone')?></th>
        <th class="8 value" data-control-column="8" data-col="8"     class="Balance" data-resizable-column-id="8"     style="width: 198.011px;"       ><?php  echo  display('due_amount')?></th>
      </tr>
    </thead>
    <tbody>

     <?php
    $count=1;

    if(count($due_info)>0){
      foreach($due_info as $k=>$arr){
          ?>



<tr style="text-align:center" class="task-list-row" data-col="1" class="1" class="ID" data-task-id="<?php echo $count; ?>" data-pname="<?php echo $arr['customer_name'];  ?>" data-model="<?php echo $arr['customer_mobile']; ?>" data-category="<?php echo $arr['customer_email']; ?>" data-unit="<?php echo $arr['phone'] ?>" data-supplier="<?php echo $arr['due'];  ?>">



   <td data-col="1" class="1" class="ID"><?php  echo $count;  ?></td> 



 <td data-col="2" class="2" class="Customer Name"><?php   echo $arr['customer_name'];  ?></td>
   <td data-col="3" class="3" class="Address 1"><?php   echo $arr['customer_address'];  ?></td>
   <td data-col="4" class="4"  class="Address 2"><?php   echo $arr['address2'];  ?></td>
<td data-col="5" class="5"  class="Mobile"><?php   echo $arr['customer_mobile'];  ?></td>
   <td data-col="6" class="6"  class="Email"><?php   echo $arr['customer_email'];  ?></td>
<td data-col="7" class="7"  class="Phone"><?php   echo $arr['phone'];  ?></td>
  <td data-col="8" class="8"  class="credit_limit"><?php   echo $currency." ".$arr['due'];  ?></td>
  <!-- <td><a class="btn  btn-sm" style="background-color: #3CA5DE; color: #fff;" href="<?php echo base_url()?>Ccustomer/customer_update_form/<?php echo  $arr['customer_id'];  ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a></td> -->
 
  </td>
  </div>
</tr>

     <?php   
$count++;

     
              
                
} }  else{
    ?>
     <tr><td colspan="8" style="text-align:center;font-weight:bold;"><?php  echo "No Records Found"  ;?></td></tr>
    <?php
          }

?>
  
    </tbody>
 
  </table>
      </div>

         </div>

            </div>

            </div>



<div id="myModal_colSwitch"  class="modal_colSwitch">
                    <div class="modal-content_colSwitch" style="width:30%;height:30%;">
                    <span class="close_colSwitch">&times;</span>
                       
                          <div class="col-sm-2" ></div>


                          <div class="col-sm-3" ><br>
                          <div class="form-group row"  > 
                         
                         <br> <input type="checkbox"  data-control-column="1" checked = "checked" class="opt ID" value="ID"/>&nbsp; <?php  echo  display('ID')?><br>
                      
                         <br><input type="checkbox"  data-control-column="5" checked = "checked" class="opt Mobile" value="Mobile"/>&nbsp;<?php  echo  display('mobile')?><br>
        <br>  <input type="checkbox"  data-control-column="6" checked = "checked" class="opt Email" value="Email"/>&nbsp;<?php  echo  display('email')?><br>
        <br>  <input type="checkbox"  data-control-column="7" checked = "checked" class="opt Phone" value="Phone"/>&nbsp;<?php  echo  display('phone')?><br>
             </div>
        </div>



        <div class="col-sm-3" ><br>
        <div class="form-group row"  >
        <br>   <input type="checkbox"  data-control-column="2" checked = "checked" class="opt Customer Name" value="Customer Name"/>&nbsp;<?php  echo  display('customer_name')?><br>
                         <br>   <input type="checkbox"  data-control-column="3" checked = "checked" class="opt Address 1" value="Address 1"/>&nbsp;<?php  echo  display('address')?> 1<br>
                         <br>  <input type="checkbox"  data-control-column="4" checked = "checked" class="opt Address 2" value="Address 2"/>&nbsp;<?php  echo  display('address')?> 2<br>
        <br> <input type="checkbox"  data-control-column="8" checked = "checked" class="opt due amount" value="Due Amount"/>&nbsp;<?php  echo  display('due_amount')?><br>


                          </div>
                       </div>
                    
        


      
                           <div class="col-sm-1"  ><br>
                          <div class="form-group row"  >

                        </div>
                          </div>
     




                    </div>
                </div>
    </section>
</div>















<script>
 $(document).on('keyup', '#filterinput', function(){
  
    var value = $(this).val().toLowerCase();
    var filter=$("#filterby").val();
    $("#ProfarmaInvList tr:not(:eq(0))").filter(function() {
        $(this).toggle($(this).find("td."+filter).text().toLowerCase().indexOf(value) > -1)
    });
});


</script>

<input type="hidden" value="Customer/Customer" id="url"/>
<script src="<?php echo base_url()?>assets/js/jquery.bootgrid.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.0.0-alpha.1/jspdf.plugin.autotable.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>my-assets/js/profarma.js"></script>
<script>

    var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';
$editor = $('#submit'),
  $editor.on('click', function(e) {
    if (this.checkValidity && !this.checkValidity()) return;
    e.preventDefault();
    var yourArray = [];
    //loop through all checkboxes which is checked
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
    url:'<?php echo base_url();?>Ccustomer/setting',
   
    data: data,
    dataType: "json", 
    success: function(data) {
        if(data) {
           console.log(data);
        }
    }  
});
  });

  $( document ).ready(function() {
   var page=$('#url').val();
   page=page.split('/');
    var data = {
        'menu':page[0],
        'submenu':page[1]
         
       
       };
      
       data[csrfName] = csrfHash;
    $.ajax({
    
    type: "POST",  
    url:'<?php echo base_url();?>Ccustomer/get_setting',
   
    data: data,
    dataType: "json", 
    success: function(data) {
     var menu=data.menu;
     var submenu=data.submenu;
     if(menu=='Customer' && submenu=='Customer'){
     var s=data.setting;
s=JSON.parse(s);
console.log(s);
for (var i = 0; i < s.length; i++) {
    console.log(s[i]);
    $('td.'+s[i]).hide(); // hide the column header th
    $('th.'+s[i]).hide();
$('tr').each(function(){
     $(this).find('td:eq('+$('td.'+s[i]).index()+')').hide();
});
    }
    for (var i = 0; i < s.length; i++) {
        if( $('.'+s[i]))
  $('.'+s[i]).prop('checked', false); //check the box from the array, note: you need to add a class to your checkbox group to only select the checkboxes, right now it selects all input elements that have the values in the array 
    }  
}
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
 td1 = tr[i].getElementsByTagName("td")[4];
 td2 = tr[i].getElementsByTagName("td")[5];
 td3 = tr[i].getElementsByTagName("td")[6];
 td4 = tr[i].getElementsByTagName("td")[7];

 if (td && td1 && td2 && td3 && td4) {
   input_pname = (td.textContent || td.innerText).toUpperCase();
   input_model = (td1.textContent || td1.innerText).toUpperCase();
   input_category = (td2.textContent || td2.innerText).toUpperCase();
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



  $(document).ready(function(){
 $('#search_area').hide();
});
$('#s_icon').click(function(){
    $('#search_area').toggle();
});

    
 
    
    </script>

<style>

.select2-selection__rendered{
  display:none;
  }
</style>

