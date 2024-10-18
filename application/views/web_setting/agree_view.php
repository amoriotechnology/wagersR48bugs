<?php error_reporting(1);  ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
<script src="
   https://cdn.jsdelivr.net/npm/jquery-base64-js@1.0.1/jquery.base64.min.js
   "></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/html2canvas.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jspdf.plugin.autotable"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jspdf.umd.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<script type="text/javascript" src="<?php echo base_url()?>my-assets/js/vendor_tableManager.js"></script>
<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
<script type="text/javascript" src="http://mrrio.github.io/jsPDF/dist/jspdf.debug.js"></script>
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" />
<script type="text/javascript" src="http://www.bacubacu.com/colresizable/js/colResizable-1.5.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url()?>assets/js/drag_drop_index_table.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
      <img src="<?php echo base_url()  ?>asset/images/advance.png"  class="headshotphoto" style="height:50px;" />      
   </div>
   <div class="header-title">
      <div class="logo-holder logo-9">
         <h1><?php echo  ('Advanced Product Search') ?></h1>
      </div>
      <small><?php //echo display('manage_tax') ?></small>
      <ol class="breadcrumb" style="border:3px solid #D7D4D6;"  >
         <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
         <li><a href="#"><?php echo display('web_settings') ?></a></li>
         <li class="active" style="color:orange;" ><?php echo  ('Advanced Product Search') ?></li>
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
   <div>
   <div class="modal-content" style="text-align:center;border: 3px solid #D7D4D6;" >
      <div class="modal-body">
         <div id="customeMessage" class="alert hide"></div>
         <form id="add_pay_terms" method="post"  style="height:55px;">
            <div class="panel-body">
               <input type ="hidden" name="csrf_test_name" id="" value="<?php echo $this->security->get_csrf_hash();?>">
               <div class="form-group row">
                  <label for="customer_name" style="width: auto;" class="col-sm-3 col-form-label"> <i class="text-danger"></i></label>
                  <div class="col-sm-4">
                      <a  class="btnclr btn btn-default dropdown-toggle  boxes filip-horizontal  mobile_para"  style="height:fit-content;"  id="s_icon"><b class="fa fa-search"></b>&nbsp;Advance search  </a>
                     &nbsp;&nbsp;
                     <button class="btnclr btn" onclick="sendQuotationemail()" style="position: relative; left: 30px;">Request Quotation</button>
                  </div>
                  <div class="col-sm-6">
                     <input class="form-control" name ="new_payment_terms"  style="width:300px;"  id="new_payment_terms" type="text"  placeholder="Search..."   required="" tabindex="1">
                     <button type="submit" class="btnclr btn submit" style="position: relative; bottom: 34px; left: 20px;"><i class="fa fa-search" aria-hidden="true"></i> <?php echo display('search') ?></button> 
                  </div>
               </div>
               <div class="col-sm-2" style="float:right;">
                  <div class="" style="float: right;">  <a onclick="reload();"  id="vendorRemove">  <i class="fa fa-refresh fa-spin" style="font-size:25px;float:right; margin-top: -73px;" aria-hidden="true"></i> </a>    &nbsp;    &nbsp;    &nbsp;    &nbsp;
                     <i class="fa fa-gear fa-spin"  aria-hidden="true" id="myBtn" style="margin-right:50px;font-size:25px;float:right; margin-top: -73px;" onClick="columnSwitchMODAL()"></i>
                  </div>
               </div>
            </div>
            <div id="search_area" style="border:4px solid #004d99;border-radius:7px;">
               <table class="table">
                  <thead>
                     <tr class="filters">
                        <th class="search_dropdown" style="width: 22%; color: black;">
                           <span><?php echo "City"; ?> </span>
                           <select id="pname-filter" class="form-control">
                              <option>Any</option>
                              <?php 
                                 $city  = array();
                                 foreach ($search_datas as $invoice) {
                                 $city[] = $invoice->c_city;
                                 }
                                 $unique_city = array_unique($city);
                                 
                                 
                                 $state = array();
                                 foreach ($search_datas as $invoice) {
                                 $state[] = $invoice->c_state;
                                 }
                                 $unique_state = array_unique($state);
                                 
                                 
                                 $productname = array();
                                 foreach ($search_datas as $invoice) {
                                 $productname[] = $invoice->product_name;
                                 }
                                 $unique_productname = array_unique($productname);
                                 
                                 
                                 $p_quantity = array();
                                 foreach ($search_datas as $invoice) {
                                 $p_quantity[] = $invoice->p_quantity;
                                 }
                                 $unique_pquantity = array_unique($p_quantity);
                                 
                                 $price = array();
                                 foreach ($search_datas as $invoice) {
                                 $price[] = $invoice->price;
                                 }
                                 $unique_price = array_unique($price);
                                 
                                 foreach($unique_city as $invoice){  ?>
                              <option value="<?php echo $invoice; ?>"><?php echo $invoice; ?></option>
                              <?php }  ?>
                           </select>
                        </th>
                        <th class="search_dropdown" style="width: 22%;color: black;">
                           <span>State</span>
                           <select id="model-filter" class="form-control">
                              <option>Any</option>
                              <?php foreach($unique_state as $invoice){  ?>
                              <option value="<?php echo $invoice; ?>"><?php echo $invoice; ?></option>
                              <?php }  ?>
                           </select>
                        </th>
                        <th class="search_dropdown" style="width: 22%;color: black;">
                           <span>Product </span>
                           <select id="category-filter" class="form-control">
                              <option>Any</option>
                              <?php foreach($unique_productname as $invoice){  ?>
                              <option value="<?php echo $invoice; ?>"><?php echo $invoice; ?></option>
                              <?php }  ?>
                           </select>
                        </th>
                        <th class="search_dropdown" style="width: 20%;color: black;">
                           <span>Stock</span>
                           <select id="stock-filter" class="form-control">
                              <option value="Any">Any</option>
                              <option value="1-50">1-50</option>
                              <option value="51-100">51-100</option>
                              <option value="101-200">101-200</option>
                              <option value="201-more">201-more</option>
                           </select>
                           <!-- <select id="unit-filter" class="form-control">
                              <option>Any</option>
                              <?php foreach($unique_pquantity as $invoice){  ?>
                              <option value="<?php echo $invoice; ?>"><?php echo $invoice; ?></option>
                              <?php }  ?>
                           </select> -->
                        </th>
                        <th class="search_dropdown" style="width: 310px;color: black;">
                           <span>Price</span>
                           <select id="price-filter" class="form-control">
                              <option value="Any">Any</option>
                              <option value="1-50">1-50</option>
                              <option value="51-100">51-100</option>
                              <option value="101-200">101-200</option>
                              <option value="201-more">201-more</option>
                           </select>
                           <!-- <select id="supplier-filter" class="form-control">
                              <option>Any</option>
                              <?php foreach($unique_price as $invoice){  ?>
                              <option value="<?php echo $invoice; ?>"><?php echo $invoice; ?></option>
                              <?php }  ?>
                           </select> -->
                        </th>
                     </tr>
                  </thead>
               </table>
               <table>
                  <tr>
                     <td style="width:10px;"></td>
                     <td style="width:22%;">   <input type="text" class="form-control"  style="height: inherit;" id="myInput1" onkeyup="filterTable()" placeholder="Search for City.."></td>
                     <td style="width:10px;"></td>
                     <td style="width:22%;"> <input type="text" class="form-control" style="height: inherit;" id="myInput2" onkeyup="filterTable()" placeholder="Search for State.."></td>
                     <td style="width:10px;"></td>
                     <td style="width:20%;">  <input type="text" class="form-control" style="height: inherit;"  id="myInput3" onkeyup="filterTable()" placeholder="Search for Product Name.."></td>
                     <td style="width:10px;"></td>
                     <td style="width:20%;"> <input type="text" class="form-control" style="height: inherit;"  id="myInput4" onkeyup="filterTable()" placeholder="Search for Stock.."></td>
                     <td style="width:10px;"></td>
                     <td style="width: 203px;"> <input type="text" class="form-control"  style="height: inherit;"  id="myInput5" onkeyup="filterTable()" placeholder="Search for Price.."></td>
                  </tr>
               </table>
               <br/>
               <div class="col-sm-12">
                  <input id="search" type="text" class="form-control" style="height: inherit;"  placeholder="Search for All">
                  <br>
               </div>
               <br>
            </div>
      </div>
      </form>
   </div>
   <!-- /.modal-content -->
   <br>
   <!-- Manage Invoice report -->
   <div class="row"  id="search_after_visiable" >
   <div class="col-sm-12">
   <div class="panel panel-bd lobidrag">
      <div class="panel-body" style="border: 3px solid #D7D4D6;">
         <div class="sortableTable__container">
            <div id="for_filter_by" class="for_filter_by" style="display: inline;">
               <label for="filter_by"><?php echo display('Filter By') ?>&nbsp;&nbsp;
               </label>
               <select id="filterby" style="border-radius:5px;height:25px;" >
                  <option value="1"><?php echo display('ID') ?></option>
                  <option value="2"><?php echo display('Company ID') ?></option>
                  <option value="3"><?php echo display('Product') ?></option>
                  <option value="4"><?php echo display('Stock') ?></option>
                  <option value="5"><?php echo display('Price') ?></option>
               </select>
               <input id="filterinput" style="height:25px;" type="text" >
            </div>
            <div id="printableArea">
               <div class="sortableTable__discard">
               </div>
               <div id="customers">
                  <table class="table table-bordered" cellspacing="0" width="100%" id="ProfarmaInvList">
                     <thead class="sortableTable">
                        <tr class="sortableTable__header btnclr">
                           <th class="1 value"><?php echo display('ID')?></th>
                           <th class="2 value"><?php echo display('Company Id')?></th>
                           <th class="3 value"><?php echo "City";?></th>
                           <th class="4 value"><?php echo "State"; ?></th>
                           <th class="5 value"><?php echo ('Product')?></th>
                           <th class="6 value"><?php echo ('Stock')?></th>
                           <th class="7 value"><?php echo ('Price')?> </th>
                        </tr>
                     </thead>
                     <tbody class="sortableTable__body" id="tab">
                     </tbody>
                     <div id="noResultsMessage" style="display: none; text-align: center;">No results found</div>
                  </table>
               </div>
            </div>
         </div>
      </div>
      <div id="myModal_colSwitch" name="advancedsearch" class="modal_colSwitch" >
         <div class="modal-content_colSwitch" style="width:30%;height:30%;">
            <span class="close_colSwitch">&times;</span>
            <div class="col-sm-2" ></div>
            <div class="col-sm-5" >
               <br>
               <div class="form-group row"  >
                  <br><input type="checkbox"  data-control-column="1"  class="1" value="1"/> &nbsp;<?php echo display('ID') ?><br>
                  <br><input type="checkbox"  data-control-column="2"  class="2" value="2"/>&nbsp;<?php echo display('Company Id') ?><br>
                   <br><input type="checkbox"  data-control-column="3"  class="3" value="3"/>&nbsp;<?php echo "City"; ?><br>
                  <br><input type="checkbox"  data-control-column="4"  class="4" value="4"/>&nbsp;<?php echo "State"; ?><br>
               </div>
            </div>
            <div class="col-sm-4">
               <br>
               <div class="form-group row"  >
                  <br><input type="checkbox"  data-control-column="5"  class="5" value="5"/>&nbsp;<?php echo display('Product') ?><br>
                  <br><input type="checkbox"  data-control-column="6"   class="6" value="6"/>&nbsp;<?php echo display('Stock') ?><br>
                  <br><input type="checkbox"  data-control-column="7"   class="7" value="7"/>&nbsp;<?php echo display('Price') ?><br>
               </div>
            </div>
         </div>
      </div>
</section>
</div>
<script type="text/javascript">
   var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>';
   var csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';
   
   $('#add_pay_terms').submit(function(e){
       e.preventDefault();
       var data = {
           new_payment_terms : $('#new_payment_terms').val()
       };
       data[csrfName] = csrfHash;
       $.ajax({
           type: 'POST',
           data: data,
           dataType: 'json',
           url: '<?php echo base_url();?>Cweb_setting/new_funcion',
           success: function(data1, statut) {
             
               var slNum = 1; // Initialize serial number
   
           data1.forEach(function(item) {
            console.log(item);
           var row = '<tr class="task-list-row" data-task-id="'+slNum+'" data-city="'+item.c_city+'" data-state="'+item.c_state+'" data-productname="'+item.product_name+'" data-stock="'+item.p_quantity+'" data-price="'+item.price+'">';
           row += '<td data-col="1" class="1" style="text-align: center;" >' + slNum + '</td>'; 
           row += '<td data-col="2" class="2" style="text-align: center;" >' + item.created_by + '</td>'; 
           row += '<td data-col="3" class="3" style="text-align: center;">' + (item.c_city ? item.c_city : 'N/A') + '</td>';
           row += '<td data-col="4" class="4" style="text-align: center;" >' + (item.c_state ? item.c_state : 'N/A') + '</td>'; 
           row += '<td data-col="5" class="5" style="text-align: center;" >' + item.product_name + '</td>'; 
           row += '<td data-col="6" class="6" style="text-align: center;" id="stock">' + item.p_quantity + '</td>'; 
           row += '<td data-col="7" class="7" style="text-align: center;" id="pricing">' + item.price + '</td>'; 
           row += '</tr>';
           $('#tab').append(row);
           slNum++; 
   
       });
   },
   
           error: function(xhr, status, error) {
               // Handle the error response here
           }
       });
   });
   
</script>
<input type="hidden" value="Vendor/Vendor" id="url"/>
<script src="<?php echo base_url()?>assets/js/jquery.bootgrid.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.0.0-alpha.1/jspdf.plugin.autotable.js"></script>
<!-- <link rel="stylesheet" type="text/css" href="//code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css"> -->
<script type="text/javascript" src="<?php echo base_url()?>my-assets/js/profarma.js"></script>
<script>
   $(document).on('keyup', '#filterinput', function(){
   
      var value = $(this).val().toLowerCase();
      var filter=$("#filterby").val();
      $("#ProfarmaInvList tr:not(:eq(0))").filter(function() {
          $(this).toggle($(this).find("td."+filter).text().toLowerCase().indexOf(value) > -1)
      });
   });
   
   
   
   
   
   
   
   
   
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
   
   
   
   $(document).ready(function() {
   // Function to toggle column visibility
   function toggleColumnVisibility(columnSelector, isChecked) {
    $(columnSelector).toggle(isChecked);
   }
   
   // Loop through checkboxes and initialize column visibility
   $("input:checkbox").each(function() {
    var columnValue = $(this).attr("value");
    var columnSelector = "table ." + columnValue;
    var isChecked = localStorage.getItem(columnSelector) === "true" || $(this).prop("checked");
    
    // Store checkbox state in localStorage
    localStorage.setItem(columnSelector, isChecked);
   
    // Toggle column visibility based on checkbox state
    toggleColumnVisibility(columnSelector, isChecked);
    
    // Set checkbox state
    $(this).prop("checked", isChecked);
   });
   
   // When a checkbox is clicked, update localStorage and toggle column visibility
   $("input:checkbox").click(function() {
    var columnValue = $(this).attr("value");
    var columnSelector = "table ." + columnValue;
    var isChecked = $(this).is(":checked");
    
    // Store checkbox state in localStorage
    localStorage.setItem(columnSelector, isChecked);
   
    // Toggle column visibility based on checkbox state
    toggleColumnVisibility(columnSelector, isChecked);
   });
   });
   
   
   
   
    $(document).ready(function(){
   $('#search_area').hide();
   });
   $('#s_icon').click(function(){
      $('#search_area').toggle();
   });
   
      
   function reload(){
      location.reload();
   }
   
   
    
   
     $(document).ready(function() {
       var localStorageName = "advancedsearch"; // Set your desired localStorage name
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

      // Stock Search
      $('#stock-filter').on('change', function () {
          var selectedValue = $(this).val();
          $('#tab tr').show();
   
          if (selectedValue !== 'Any') {
              $('#tab tr').each(function () {
                  var availability = parseInt($(this).find('#stock').text());
                  if ((selectedValue === '1-50' && availability > 50) ||
                      (selectedValue === '51-100' && (availability < 51 || availability > 100)) ||
                      (selectedValue === '101-200' && (availability < 101 || availability > 200)) ||
                      (selectedValue === '201-more' && availability <= 200)) {
                      $(this).hide();
                  }
              });
          }
      });

      // Price Search
      $('#price-filter').on('change', function () {
          var selectedValue = $(this).val();
          $('#tab tr').show();
   
          if (selectedValue !== 'Any') {
              $('#tab tr').each(function () {
                  var availabilityprice = parseInt($(this).find('#pricing').text());
                  if ((selectedValue === '1-50' && availabilityprice > 50) ||
                      (selectedValue === '51-100' && (availabilityprice < 51 || availabilityprice > 100)) ||
                      (selectedValue === '101-200' && (availabilityprice < 101 || availabilityprice > 200)) ||
                      (selectedValue === '201-more' && availabilityprice <= 200)) {
                      $(this).hide();
                  }
              });
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
      changeFilter.call(this, 'city');
    });
    
    // Task Status Dropdown Filter
    $('#model-filter').on('change', function() {
      changeFilter.call(this, 'state');
    });

    // Task Status Dropdown Filter
    $('#category-filter').on('change', function() {
      changeFilter.call(this, 'productname');
    });
    
    // Task Tags Dropdown Filter
    $('#supplier-filter').on('change', function() {
      changeFilter.call(this, 'price');
    });

   function filterTable() {
      var input_city,
           input_state,
           input_productname,
           input_stocks,
           input_pricing,

           filter_city, filter_state, filter_productname, filter_stocks, filter_pricing,
           table,
           tr,
           td,
           i,
           
       input_city = document.getElementById("myInput1");
       input_state = document.getElementById("myInput2");
       input_productname = document.getElementById("myInput3");
       input_stocks = document.getElementById("myInput4");
       input_pricing = document.getElementById("myInput5");

       filter_city = input_city.value.toUpperCase();
       filter_state = input_state.value.toUpperCase();
       filter_productname = input_productname.value.toUpperCase();
       filter_stocks = input_stocks.value.toUpperCase();
       filter_pricing = input_pricing.value.toUpperCase();

       table = document.getElementById("ProfarmaInvList");
       tr = table.getElementsByTagName("tr");
       for (i = 0; i < tr.length; i++) {
           td = tr[i].getElementsByTagName("td")[2];
           td1 = tr[i].getElementsByTagName("td")[3];
           td2 = tr[i].getElementsByTagName("td")[4];
           td3 = tr[i].getElementsByTagName("td")[5];
           td4 = tr[i].getElementsByTagName("td")[6];

           if (td && td1 && td2 && td3 && td4) {
               input_city = (td.textContent || td.innerText).toUpperCase();
               input_state = (td1.textContent || td1.innerText).toUpperCase();
               input_productname = (td2.textContent || td2.innerText).toUpperCase();
               input_stocks = (td3.textContent || td3.innerText).toUpperCase();
               input_pricing = (td4.textContent || td4.innerText).toUpperCase();
               if (
                   input_city.indexOf(filter_city) > -1 &&
                   input_state.indexOf(filter_state) > -1 &&
                   input_productname.indexOf(filter_productname) > -1 &&
                   input_stocks.indexOf(filter_stocks) > -1 &&
                   input_pricing.indexOf(filter_pricing) > -1
               ) {
                   tr[i].style.display = "";
               } else {
                   tr[i].style.display = "none";
               }
           }
       }
   }

        
    function sendQuotationemail()
    {   
        var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
        var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';

        $.ajax({
             type:"POST",
             url:"<?php echo base_url(); ?>Cweb_setting/sendemailquotation",
             dataType: 'json',
             data:{<?php echo $this->security->get_csrf_token_name();?>: csrfHash},
             success:function (data) {
                console.log(data);
               if (data.status === 'success') {
                    swal({
                        title: 'Email sent successfully',
                        text: 'Email sent successfully',
                        icon: 'success',
                        button: 'Ok',
                    });
                } else {
                    swal({
                        title: 'Email sending failed',
                        text: 'Email sending failed',
                        icon: 'error',
                        button: 'Ok',
                    });
                }

            }
        });
    }


   $(document).ready(function() {
       $('#pname-filter option').filter(function() {
           return !this.value || $.trim(this.value).length == 0;
       }).remove();

        $('#model-filter option').filter(function() {
           return !this.value || $.trim(this.value).length == 0;
       }).remove();
   });
      
</script>
<style>
   /* .select2-selection__rendered{
   // display:none;
   } */
   .ads{
   max-width: 0px !important;
   white-space: nowrap;
   overflow: hidden;
   text-overflow: ellipsis;
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
   width: 240px;
   }
   }

   .select2{
   display:none;
   }
</style>