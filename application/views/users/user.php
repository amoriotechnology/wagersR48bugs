<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" />
<script type="text/javascript" src="<?php echo base_url()?>assets/js/drag_drop_index_table.js"></script>
<!-- User List Start -->
<style>


.btnclr{
       background-color:<?php echo $setting_detail[0]['button_color']; ?>;
       color: white;

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
  background-color: #4B9CDB;
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
    background-color: #F5634A;
    width: 170px;
  }
}
</style>
<div class="content-wrapper">
<section class="content-header">
   <div class="header-icon">
      <i class="pe-7s-note2"></i>
   </div>
   <div class="header-title">
      <h1>Manage User</h1>
      <small></small>
     <ol class="breadcrumb"   style=" border: 3px solid #D7D4D6;"   >
         <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
         <li><a href="#"><?php echo display('web_settings') ?></a></li>
         <li class="active" style="color:orange;">Manage User</li>
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
   <div class="alert alert-info alert-dismissable" style="background-color:#38469f;color:white;font-weight:bold;">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <?php echo $message ?>                    
   </div>
   <?php 
      $this->session->unset_userdata('message');
      }
      $error_message = $this->session->userdata('error_message');
      if (isset($error_message)) {
      ?>
   <div class="alert alert-danger alert-dismissable" style="background-color:#38469f;color:white;font-weight:bold;">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <?php echo $error_message ?>                    
   </div>
   <?php 
      $this->session->unset_userdata('error_message');
      }
      ?>
   <div class="row">
      <div class="col-sm-12">
      </div>
   </div>
   <div class="row">
       <div class='col-sm-12'>
      <div class="panel panel-bd lobidrag">
         <div class="panel-heading" style="height: 60px;">
            <div class="col-sm-4">
                  <a href="<?php echo base_url('User/add_user')?>" class="btn btnclr" style="font-weight:bold;" ><i class="fa fa-user"> </i> Add User </a>
                        <a class="btnclr btn btn-default dropdown-toggle  boxes filip-horizontal " style="margin-top: -4px;font-weight:bold;margin-left: 5px;height:fit-content;" id="s_icon"><b class="fa fa-search" aria-hidden="true"></b>&nbsp;Advance search  </a>
              
               <!-- onclick opens MODAL -->
               <div class="dropdown bootcol" id="drop" style="        margin-right: 173px;float:right;padding-right:20px;padding-bottom:10px;">
                  <button class="btn btnclr dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                  <span class="fa fa-download"></span>  <?php echo display('download') ?>
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                     <li><a href="#" onclick="generate()"> <img src="<?php echo base_url()?>assets/images/pdf.png" width="24px"><?php echo display('PDF') ?> </a></li>
                     <li class="divider"></li>
                     <li><a href="#" onclick="$('#ProfarmaInvList').tableExport({type:'excel',escape:'false'});"> <img src="<?php echo base_url()?>assets/images/xls.png" width="24px">  <?php echo display('XLS') ?></a></li>
                  </ul>
                
               </div>
            </div>
             <div class="col-sm-6"></div>
            <div class="col-sm-2">
                <i class="fa fa-gear fa-spin"  aria-hidden="true" id="myBtn" style="margin-left: 180px;font-size:25px;" onClick="columnSwitchMODAL()"></i>
               <a onclick="reload();"  >  <i class="fa fa-refresh fa-spin" style="font-size:25px;float:right;" aria-hidden="true"></i> </a>
               
          
            </div>
     
         </div>
      </div>
      </div>
      <div id="search_area" style="border:4px solid #004d99;border-radius:7px;">
         <table class="table" id="ProfarmaInvList">
            <thead>
               <tr class="filters">
                  <th class="search_dropdown" style="width: 22%;">
                     <span><?php echo ('Name') ?> </span>
                     <select id="pname-filter" class="form-control">
                        <option>Any</option>
                        <?php 
                           $username  = array();
                           foreach ($user_data_get as $user) {
                           $username[] = $user['username'];
                           }
                           $unique_username  = array_unique($username);
                           
                           
                           $email_id = array();
                           foreach ($user_data_get as $user) {
                           $email_id[] = $user['email_id'];
                           }
                           $unique_email_id = array_unique($email_id);
                           
                           
                           
                            foreach($unique_username as $users){  ?>
                        <option value="<?php echo $users; ?>"><?php echo $users; ?> </option>
                        <?php }  ?>
                     </select>
                  </th>
                  <th class="search_dropdown" style="width: 22%;">
                     <span>Email Id</span>
                     <select id="model-filter" class="form-control">
                        <option>Any</option>
                        <?php foreach($unique_email_id as $users){  ?>
                        <option value="<?php echo $users; ?>"><?php echo $users; ?></option>
                        <?php }  ?>
                     </select>
                  </th>
               </tr>
            </thead>
         </table>
      </div>
   </div>
   <!-- User List -->
   <div class="row">
   <div class="col-sm-12">
   <div class="panel panel-bd lobidrag">
      <div class="panel-heading">
         <div class="panel-title">
            <div class="panel-body">
               <div class="table-responsive">
                     <div  id="printArea">
                        <div id="content" id="printArea">
                           <div  id="dataTableExample3">
                            <div class="sortableTable__container">
                            <div class="sortableTable__discard">
                            </div>
                              <table  id="ProfarmaInvList" class="table table-bordered table-striped table-hover">
                                 <thead class="sortableTable">
                                    <tr class="sortableTable__header btnclr">
                                       <th class="1 value"  data-col="1"><?php echo display('sl') ?></th>
                                       <th class="2 value"  data-col="2"   ><?php echo display('name') ?></th>
                                       <th class="3 value"  data-col="3"   ><?php echo display('email') ?></th>
                                       <th class="4 value"  data-col="4"  ><?php echo display('user_type') ?></th>
                                       <th class="5 value"  data-col="5" ><?php echo display('status') ?></th>
                                       <th class="6 value"  data-col="6"  ><?php echo display('action') ?></th>
                                    </tr>
                                 </thead>
                                 <tbody class="sortableTable__body" id="tab">
                                    <?php
                                       if ($user_list) {
                                       	foreach ($user_list as $user) {
                                       ?>
                                    <tr id="task-<?php echo $i; ?>"
                                       class="task-list-row"
                                       data-task-id="<?php echo $i; ?>"    
                                       data-pname="<?php echo $user["username"]; ?>"
                                       data-model="<?php echo $user["email_id"]; ?>"
                                       >
                                       <td data-col="1" class="1"><?php echo $user["sl"]?></td>
                                       <td data-col="2" class="2"><?php echo html_escape($user["username"])?></td>
                                       <td data-col="3" class="3"><?php echo html_escape($user["email_id"])?></td>
                                       <td data-col="4" class="4"><?php 
                                          $user_type = $user["user_type"];
                                          if ($user_type == 2) {
                                          	echo "Admin";
                                          }else{
                                          	echo "User";
                                          }
                                          ?></td>
                                       <td data-col="5" class="5"><?php 
                                          $status=$user["status"];
                                          if ($status==1) {
                                          	echo "Active";
                                          }else{
                                          	echo "Inactive";
                                          }
                                          ?></td>
                                       <td class="6 value"  data-col="6">
                                          <center>
                                             <?php echo form_open()?>
                                             <!-- 			 -->
                                             <?php
                                                if ($user["u_type"] != 2) {
                                                ?>
                                             <a href="<?php echo base_url('User/user_delete/'.$user["unique_id"])?>" class="btn btn-danger btn-sm"  data-toggle="tooltip" onclick="return confirm('Are you Sure ?')" data-placement="right" title="" data-original-title="<?php echo display('delete') ?> " style='color:#fff;'><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                             <?php
                                                }
                                                ?>
                                             <?php echo form_close()?>
                                          </center>
                                       </td>
                                    </tr>
                                    <?php } } ?>
                                 </tbody>
                              </table>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
</section>
</div>
<!-- User List End -->
<script type="text/javascript" src="<?php echo base_url()?>my-assets/js/profarma.js"></script>
<script>
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
      
      
       filter_pname,filter_model, 
       table,
       tr,
       td,
       i,
      
      input_pname = document.getElementById("myInput1");
      input_model = document.getElementById("myInput2");
     
      
      filter_pname = input_pname.value.toUpperCase();   
      filter_model = input_model.value.toUpperCase();
    
      
      
      
      table = document.getElementById("ProfarmaInvList");
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
       
         td = tr[i].getElementsByTagName("td")[1];
         td1 = tr[i].getElementsByTagName("td")[2];
        
   
   
   
   
       if (td && td1 ) { 
         input_pname = (td.textContent || td.innerText).toUpperCase();
         input_model = (td1.textContent || td1.innerText).toUpperCase();
       
         if (
           input_pname.indexOf(filter_pname) > -1 &&
           input_model.indexOf(filter_model) > -1  
        
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
       
    
   
   
       function reload(){
       location.reload();
   }
   
   
</script>
<style>
#search_area{
    margin-top: 60px;
}
.select2-selection{
display:none;
}
</style>
<script>
   <script src="<?php echo base_url()?>assets/js/jquery.bootgrid.min.js">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.0.0-alpha.1/jspdf.plugin.autotable.js"></script>
<div id="myModal_colSwitch"  name="myuserName"      class="modal_colSwitch" >
<div class="modal-content_colSwitch" style="width:20%;height:20%;">
<span class="close_colSwitch">&times;</span>

<div class="col-sm-2" ></div>
<div class="col-sm-2" >
<br>
<div class="form-group row"  > 
<br><input type="checkbox"  data-control-column="1" class="1" value="1"/> &nbsp;<?php echo  ('SL.No') ?><br>
<!-- <br><input type="checkbox"  data-control-column="2" class="2" value="2"/>&nbsp;<?php echo display('Name');?><br> -->


 


<br><input type="checkbox"  data-control-column="3" class="3 " value="3  "/>&nbsp;<?php  echo  display('Email');?> <br>
</div>
</div>
<div class="col-sm-2" ></div>
<div class="col-sm-2" >
<br>
<div class="form-group row"  >
<!-- <br><input type="checkbox"  data-control-column="4" class="4" value="4"/>&nbsp;<?php  echo   ('User Type');?><br> -->
<br><input type="checkbox"  data-control-column="5" class="5" value="5"/>&nbsp;<?php  echo  display('Status');?><br>
<!-- <br><input type="checkbox"  data-control-column="6"  class="6" value="6"/>&nbsp;<?php echo display('Action');?><br> -->
</div>
</div>
</div>
</div>
</section>
</div>
<script type="text/javascript" src="<?php echo base_url()?>my-assets/js/profarma.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
<script>
   $(document).on('keyup', '#filterinput', function(){
   
   var value = $(this).val().toLowerCase();
   var filter=$("#filterby").val();
   $("#ProfarmaInvList tr:not(:eq(0))").filter(function() {
       $(this).toggle($(this).find("td."+filter).text().toLowerCase().indexOf(value) > -1)
   });
   });
   
//   $("input:checkbox:not(:checked)").each(function() {
//   var column = "table ." + $(this).attr("value");
//   console.log("Heyy : "+column);
//   $(column).hide();
//   });
   
//   $("input:checkbox").click(function(){
//   var column = "table ." + $(this).attr("value");
//      console.log("Heyy : "+column);
//   $(column).toggle();
//   });


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
</script>


<script type="text/javascript">
         $(document).ready(function() {
         // Function to store the visibility state of rows in localStorage
         function storeVisibilityState() {
            var userslistvisibilityStates = {};
            $("#ProfarmaInvList tr").each(function(index, element) {
                var row = $(element);
                var rowID = index;
                var isVisible = row.is(':visible');
                userslistvisibilityStates[rowID] = isVisible;
            });
            // Store the visibility states in localStorage
            localStorage.setItem("userslistvisibilityStates", JSON.stringify(userslistvisibilityStates));
         }
         // Apply the stored visibility state on page load
         function applyVisibilityState() {
            var storedVisibilityStates = JSON.parse(localStorage.getItem("userslistvisibilityStates")) || {};
            $("#ProfarmaInvList tr").each(function(index, element) {
                var row = $(element);
                var rowID = index;
                if (storedVisibilityStates.hasOwnProperty(rowID) && !storedVisibilityStates[rowID]) {
                    row.hide();
                } else {
                    row.show();
                }
            });
         }
         // Event listener for row clicks to toggle row visibility
         $(".bank_edit").on('click', function() {
            var row = $(this);
            row.toggle();
            storeVisibilityState(); // Store the updated visibility state
         });
         applyVisibilityState(); 
         });
         $(document).ready(function() {
       var localStorageName = "myuserName"; // Set your desired localStorage name
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