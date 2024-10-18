
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" />
<?php  error_reporting(1); ?>
<!-- Manage Invoice Start -->
<style>
   table.table.table-hover.table-borderless td {
   border: 0;
   }
   .select2{
   display:none;
   }


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
    width: 120px;
  }
}

</style>
 

 


   <div class="content-wrapper">
   <section class="content-header">
      <div class="header-icon">
            <figure class="one">
               <img src="<?php echo base_url()  ?>asset/images/taxes.png"  class="headshotphoto" style="height:50px;" />
      </div>
      
     <div class="header-title">
          <div class="logo-holder logo-9">
           <h1>Federal Taxes</h1>
       </div>
 
       <small><?php echo "" ?></small>
         <ol class="breadcrumb" style="border: 3px solid #d7d4d6;">
         <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
            <li><a href="#">Taxes</a></li>
            <li class="active" style="color:orange">Federal Taxes</li>
         
         </ol>
      </div>

      </section>

 
   <section class="content">
      <!-- Alert Message -->
      <?php
         $message = $this->session->userdata('message');
         
         if (isset($message)) {
         
             ?>
      <div class="alert alert-info alert-dismissable" style="color:white;background-color:#38469f;">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
         <?php echo $message ?>                    
      </div>
      <?php
         $this->session->unset_userdata('message');
         
         }
         
         $error_message = $this->session->userdata('error_message');
         
         if (isset($error_message)) {
         
         ?>
      <div class="alert alert-danger alert-dismissable" style="color:white;background-color:#38469f;">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
         <?php echo $error_message ?>                    
      </div>
      <?php
         $this->session->unset_userdata('error_message');
         
         }
         
         ?>
      <!-- date between search -->
      <div class="row">
         <div class="col-sm-12">
            <div class="panel panel-default" style="border:3px solid #d7d4d6;" >
               <div class="panel-body">
                  <div class="row">
                     <!-- <h3 class="col-sm-3" style="margin: 0;">//Federal Taxes </h3> -->
                        <div>
                        
 
 
<select class="btnclr btn" id="timesheetSelect"  style="margin-left:25px;" >
    <option>W2 Form - Select Employee</option>
    <?php 
    $addedIds = []; // Array to keep track of IDs that have been added
    foreach ($timesheet_data_emp as $time) {
        // Check if the ID has already been added
        if (!in_array($time['id'], $addedIds)) {
            // If not, display the option and mark the ID as added
            echo '<option style="color:white;" value="' . htmlspecialchars($time['id']) . '">'
                 . htmlspecialchars($time['first_name']) . ' ' . htmlspecialchars($time['last_name'])
                 . '</option>';
            $addedIds[] = $time['id']; // Mark this ID as added
        }
    } ?>




</select>
 

<script>
    document.getElementById('timesheetSelect').addEventListener('change', function() {
        var selectedId = this.value;
        var baseLink = '<?php echo base_url('chrm/w2Form/'); ?>';
        var link = selectedId ? baseLink + selectedId : baseLink;
        window.location.href = link; // Redirect to the new URL
    });
</script>

                            
    
                            
                            <a class="btnclr btn" href="<?php echo base_url('chrm/formw3Form') ?>">W3 Form</a>
                       
                            <a class="btnclr btn" href="<?php echo base_url('chrm/form940Form') ?>">Form 940</a>

  

<select class="btnclr btn"  id="form941">
    <option   style="color:white;" selected>Form 941 - Select a Quarter</option>
    <option style="color:white;"  value="Q1">Q1</option>
    <option style="color:white;"  value="Q2">Q2</option>
    <option style="color:white;"  value="Q3">Q3</option>
    <option style="color:white;"  value="Q4">Q4</option>
</select>

<a class="btnclr btn" href="<?php echo base_url('chrm/form942Form') ?>">Form 944</a>
<a class="btnclr btn" style="display:none;"  href="<?php echo base_url('chrm/form1099nec') ?>">1099NEC Form</a>

<script>
   $(document).on('change','#form941',function(){
      var selectedId = this.value;
        var baseLink = '<?php echo base_url('chrm/form941Form/'); ?>';
        var link = selectedId ? baseLink + selectedId : baseLink;
        window.location.href = link; // Redirect to the new URL
   });
   
</script>

 
                       
<div class="row"  >
   <div class="col-md-3"   style="position: absolute;top: 18px; left: 750px; "   >
    <select class="btnclr btn" id="timesheetSelect3">
        <option>NJ927 Form</option>
        <option  style="color:white;"  value="Q1">Q1</option>
        <option  style="color:white;"  value="Q2">Q2</option>
        <option  style="color:white;"  value="Q3">Q3</option>
        <option  style="color:white;"  value="Q4">Q4</option>
    </select>
</div>
</div>
                          
                        <script>
    document.getElementById('timesheetSelect3').addEventListener('change', function() {
        var selectedId = this.value;
        var baseLink = '<?php echo base_url('chrm/formnj927/'); ?>';
        var link = selectedId ? baseLink + selectedId : baseLink;
        window.location.href = link;
    });
</script>
 
<a class="btnclr btn" href="<?php echo base_url('chrm/UC_2a_form') ?>" style="position:absolute;top: 18px; left: 895px;"     >UC-2A Form</a>
 
 
  <a class="btnclr btn" href="<?php echo base_url('chrm/wr30_form') ?>" style="position:absolute;top:18px;left:1004px;">WR30 Form</a>

 
<select class="btnclr btn" id="timesheetSelecttwo"  style="margin-left:1092px;position:absolute;top:18px;" >
   <option>F1099-NEC-Select Employee</option>
    <?php 
    $addedIds = []; // Array to keep track of IDs that have been added
    foreach ($merged_data_salespartner as $sales) {
         if (!in_array($sales['id'], $addedIds)) {        
         echo '<option style="color:white;" value="' . htmlspecialchars($sales['id']) . '">' . htmlspecialchars($sales['first_name']) . ' ' . htmlspecialchars($sales['middle_name']) . ' ' . htmlspecialchars($sales['last_name']) . '</option>';
            $addedIds[] = $sales['id']; // Mark this ID as added
        }
    } ?>
</select>
 
<script>
    document.getElementById('timesheetSelecttwo').addEventListener('change', function() {
        var selectedId = this.value;
        var baseLink = '<?php echo base_url('chrm/formfl099nec/'); ?>';
        var link = selectedId ? baseLink + selectedId : baseLink;
        window.location.href = link; // Redirect to the new URL
    });
</script>
                      </div>
                  </div>
               </div>
            </div>
         </div>
      </div>




      <div class="row">
         <div class="col-sm-12">
            <div class="panel panel-default" style="border:3px solid #d7d4d6;" >
               <div class="panel-body">
                  <div class="row">
                     <h3 class="col-sm-3" style="margin: 0;">Federal Taxes</h3>
                     <div class="col-sm-9 text-right">
                         <!-- <a href="#" data-toggle="modal" data-target="#add_city" class="btnclr btn"> Add City </a> -->
                       </div>
                  </div>
               </div>
            </div>
         </div>
      </div>



      <!-- Manage Invoice report -->
      <div class="row">
         <div class="col-sm-12">
            <div class="panel panel-bd lobidrag" style="border:3px solid #d7d4d6;" >
               <div class="panel-heading">
               </div>
               <div class="panel-body">
                  <div class="table-responsive" >
                     <form action="<?php echo base_url(); ?>Chrm/add_taxes_detail" method="post">
                        <table class="table table-hover table-bordered" cellspacing="0" width="100%" id="">
                           <thead>
                              <tr style="height:25px;">
                                 <th class='btnclr' style="width: 170px;"><?php echo display('sl') ?></th>
                                 <th class='btnclr' class="text-center" style="text-align: justify;" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tax Name</th>
                                 <!-- <th class="text-center"><?php echo display('action') ?></th> -->
                              </tr>
                           </thead>
                           <tbody>
                              <tr role="row" class="odd">
                                 <td tabindex="0"  style="text-align: center;"  >1</td>
                                 <td style="padding-left: 19%;">Federal Income Tax &nbsp;&nbsp;
                                 <span style="margin-left: 66%;">  

                                  <a href="<?php echo base_url('Chrm/add_taxes_detail') ?>"  class="btn btnclr btn-sm federal_tax" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add Taxes Detail"><i class="fa fa-window-restore"  aria-hidden="true"></i></a>
                                  </span>

                                  <input type="hidden" name="tax" id="federal_tax" value="Federal Income tax">
                                 </td>
                              </tr>
                              <tr role="row" class="odd">
                                 <td tabindex="0" style="text-align: center;" >2</td>
                                 <td  style="padding-left: 19%;" >Social Security
                                 &nbsp;&nbsp;&nbsp;&nbsp;<span style="margin-left: 68%;">  
                                <a href="<?php echo base_url('Chrm/socialsecurity_detail') ?>"  class="btn btnclr btn-sm social_security" id="social_security" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add Taxes Detail"><i class="fa fa-window-restore" aria-hidden="true"></i></a>
                                </span>

                                <input type="hidden" name="tax" id="social_security" value="Social Security">
                                 </td>
                              </tr>
                              <tr role="row" class="odd">
                                 <td tabindex="0" style="text-align: center;" >3</td>
                                 <td style="padding-left: 19%;" >Medicare &nbsp;&nbsp; 
                                 <span style="margin-left: 72%;">  
                                    <a href="<?php echo base_url('Chrm/medicare_detail') ?>"  class="btn btnclr btn-sm medicare" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add Taxes Detail"><i class="fa fa-window-restore" aria-hidden="true"></i></a>
                                    </span>

                                 </td>
                              </tr>
                              <tr role="row" class="odd">
                                 <td tabindex="0" style="text-align: center;" >4</td>
                                 <td style="padding-left: 19%;" >Federal Unemployment &nbsp;&nbsp; 
                                
                                  <span style="margin-left: 64%;">  
                                    <a href="<?php echo base_url('Chrm/federalunemployment_detail') ?>"  class="btn btnclr btn-sm federal_unemployment" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add Taxes Detail"><i class="fa fa-window-restore" aria-hidden="true"></i></a>
                                 </span>
                                
                              
                              </td>
                              </tr>
                           </tbody>
                           <!-- <tfoot>
                              <th></th>
                              <th></th>
                              <th></th>
                           </tfoot> -->
                        </table>
                     </form>
                  </div>
               </div>
            </div>
            <input type="hidden" id="total_invoice" value="<?php echo $total_invoice;?>" name="">
            <input type="hidden" id="currency" value="{currency}" name="">
         </div>
      </div>



      <!-- date between search -->
      <div class="row">
         <div class="col-sm-12">
            <div class="panel panel-default" style="border:3px solid #d7d4d6;" >
               <div class="panel-body">
                  <div class="row">
                     <h3 class="col-sm-3" style="margin: 0;">State Taxes</h3>
                     <div class="col-sm-9 text-right">
                         <!-- <a href="#" data-toggle="modal" data-target="#add_city" class="btnclr btn"> Add City </a> -->
                        <a href="#" data-toggle="modal" data-target="#add_states"   class="btnclr btn"> Add States </a>
                        <a href="#" data-toggle="modal" data-target="#add_state_tax"   class="btnclr btn">Add New State Tax </a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Manage Invoice report -->
      <?php //print_r($states_list);
         ?>
      <div class="row">
         <style>
            tr.noBorder td {
            border: 0;
            }
            .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
            border-top:none;
            }
         </style>
         <div class="col-sm-12">
            <div class="panel panel-bd lobidrag" style="border:3px solid #d7d4d6;">
               <div class="panel-heading">
               </div>
               <div class="panel-body">
               
               <!-- style="overflow-y: auto;height:500px;" -->
               <div class="table-responsive" >
                     <?php 
                        echo "<table border='0' class='table table-striped' cellspacing='0' cellpadding='0' style='table-layout:fixed;
                        
                        border-collapse:collapse;'>
                                       <thead style='height:25px;'  >
                                  <th   class='btnclr'  style='text-align:center;border: 1px solid #d7d4d6; width: 170px;'>".display('sl')."</th>
                                            <th  class='btnclr' style='text-align:center;border: 1px solid #d7d4d6; '>State Name</th>
                                           <th  class='btnclr'  style=' text-align: center;border: 1px solid #d7d4d6; '>   State Taxes</th>
 
                                          
                                       </thead><tbody>";
                                       $k = 1;
                                       for ($i = 0; $i < sizeof($states_list); $i++) {
                                           $splt = explode(",", $states_list[$i]['tax']);
                                           $j = 1;
                                   
                                           echo "<tr style='border: 1px solid #d7d4d6;    background: white;' >
                                          
                                           <td style='text-align:center;border: 1px solid #d7d4d6;    background: white;' >".$k."</td>
                                           <td class='state_name' style='text-align:center;font-weight:bold;border: 1px solid #d7d4d6;    background: white;' rowspan='".$j."'>". $states_list[$i]['state']."</td>
                                        
 
                                           <td>
                                           
                                           <table>";
                                   
                                           foreach ($splt as $sp) {
                                               if (!empty($sp) && $sp !== ',') {
                                                   $sp_url = str_replace(" "," ", $sp);
                                                   echo "<tr>
                                                 
 
                                                   
                                                   <td style='display:none; border: 1px solid #d7d4d6;    background: white;' class='state_name'>". $states_list[$i]['state']."</td>
                                                  
                                                   <td style='width:450px;    text-align: center;' class='tax_value'>".$sp."</td>
                                                   
 
                                                   <td>                                                                     
                                                   <a  href=".base_url('Chrm/add_state_taxes_detail?tax='.urlencode($states_list[$i]['state'])."-".urlencode($sp_url))." class='btn btnclr btn-sm' data-toggle='tooltip' data-placement='left'  data-original-title='Add Taxes Detail'><i class='fa fa-window-restore' aria-hidden='true'></i></a>
                                                   <a  class='delete_item btn btnclr btn-sm' ><i class='fa fa-trash' aria-hidden='true'></i></a>                 
                                                   </td>
                                                   </tr>                                            
                                                   </td>";
                                               } else {
                                                   echo "<tr><td style='display:none ;border: 1px solid #d7d4d6;    background: white;' class='state_name'>". $states_list[$i]['state']."</td><td style='width:485px;' style='display:none'>&nbsp</td> <td>  
                                                       <a   class='delete_item btn btnclr btn-sm'><i class='fa fa-trash' aria-hidden='true'></i></a></td></tr></td>";
                                                   break;
                                               }
                                           }
                                           echo "</table></tr>";
                                   
                                           $j++;
                                           $k++;
                                       }
                                       echo "</table>";
                                       ?>
                  </div>
               </div>
            </div>
            <input type="hidden" id="total_invoice" value="<?php echo $total_invoice;?>" name="">
            <input type="hidden" id="currency" value="{currency}" name="">
         </div>
      </div>
   </section>
 




<!-- //////////////////////////////////////////////////////Citynameinff//////////////////////////////////////////// -->
 
  <div class="row">
         <div class="col-sm-12">
            <div class="panel panel-default" style="border:3px solid #d7d4d6;width: 1635px;margin-left:30px;" >
               <div class="panel-body">
                  <div class="row">
                     <h3 class="col-sm-3" style="margin: 0;">City Taxes</h3>
                     <div class="col-sm-9 text-right">
                         <!-- <a href="#" data-toggle="modal" data-target="#add_city" class="btnclr btn"> Add City </a> -->
                        <a href="#" data-toggle="modal" data-target="#add_city_info"   class="btnclr btn"> Add City </a>
                        <a href="#" data-toggle="modal" data-target="#add_city_tax"   class="btnclr btn">Add City Tax </a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Manage Invoice report -->
      <?php //print_r($states_list);
         ?>
      <div class="row">
         <style>
            tr.noBorder td {
            border: 0;
            }
            .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
            border-top:none;
            }
         </style>

<!-- style="overflow-y: auto;height:500px;" -->
         <div class="col-sm-12">
            <div class="panel panel-bd lobidrag" style="border:3px solid #d7d4d6;border:3px solid #d7d4d6;width: 1635px;margin-left:30px;">
               <div class="panel-heading">
               </div>
               <div class="panel-body" >
                  <div class="table-responsive" >
                     <?php 
                        echo "<table border='0' class='table table-striped' cellspacing='0' cellpadding='0' style='table-layout:fixed;
                        
                        border-collapse:collapse;'>
                                       <thead style='height:25px;'>
                                     <th class='btnclr' style='text-align:center; border: 1px solid #d7d4d6; width: 170px;  '>".display('sl')."</th>
                                            <th class='btnclr' style='text-align:center; border: 1px solid #d7d4d6; '>City Name</th>
                                           <th class='btnclr'  style='  text-align: center; border: 1px solid #d7d4d6; '>City Taxes</th>
                                           
                                          
                                       </thead><tbody>";
                                          $k=1;
                                          for($i=0; $i < sizeof($city_list); $i++) {
                                          $splt=explode(",",$city_list[$i]['tax']);
                                          $j=1;
                                      
                                       
                                    
                                        echo "<tr style='border: 1px solid #d7d4d6;background: white;'><td style='text-align:center;border: 1px solid #d7d4d6;background: white;' >".$k."</td><td class='citystate_name' style='text-align:center;font-weight:bold;border: 1px solid #d7d4d6;background: white;' rowspan='".$j."'>". $city_list[$i]['state']."</td> <td><table>";


                                     foreach($splt as $sp){
                                 
                                     if(!empty($sp) && $sp !==','){
                                   $sp_url= str_replace(" "," ",$sp);
                                   echo "<tr ><td style='display:none;' class='citystate_name'>". $city_list[$i]['state']."</td><td style='width:450px;text-align: center;' class='citytax_value'>".$sp."</td> <td>  <a  href=".base_url('Chrm/add_state_taxes_detail?tax='.urlencode($city_list[$i]['state'])."-".urlencode($sp_url))." class='btn btnclr btn-sm' data-toggle='tooltip' data-placement='left'  data-original-title='Add Taxes Detail'><i class='fa fa-window-restore' aria-hidden='true'></i></a>
                                                               <a  class='delete_item_city btn btnclr btn-sm' ><i class='fa fa-trash' aria-hidden='true'></i></a>     </td></tr></td>";
                                         }
                                       else{
                         echo "<tr><td style='display:none' class='citystate_name'>". $city_list[$i]['state']."</td><td style='width:485px;' style='display:none'>&nbsp</td> <td>  
                         <a   class='delete_item_city btn btnclr btn-sm'><i class='fa fa-trash' aria-hidden='true'></i></a>     </td></tr></td>";
                        break;
                                       }
                                       }
                                   echo "</table></tr>";
                                       
                                   $j++;$k++;
                               }
                               echo "</table>";
                                       ?>
                  </div>
               </div>
            </div>
            <input type="hidden" id="total_invoice" value="<?php echo $total_invoice;?>" name="">
            <input type="hidden" id="currency" value="{currency}" name="">
         </div>
      </div>
   </section>

<!-- /////////////////////////////////////the end///////////////////////////////////////////////////////////////// -->




<!-- //////////////////////////////////////////////////////County tax//////////////////////////////////////////// -->


    
<div class="row">
         <div class="col-sm-12">
            <div class="panel panel-default" style="border:3px solid #d7d4d6;width: 1635px;margin-left:30px;" >
               <div class="panel-body">
                  <div class="row">
                     <h3 class="col-sm-3" style="margin: 0;">County  Taxes</h3>
                     <div class="col-sm-9 text-right">
                         <!-- <a href="#" data-toggle="modal" data-target="#add_city" class="btnclr btn"> Add City </a> -->
                        <a href="#" data-toggle="modal" data-target="#add_county_info"   class="btnclr btn"> Add County </a>
                        <a href="#" data-toggle="modal" data-target="#add_county_tax"   class="btnclr btn">Add County Tax </a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Manage Invoice report -->
      <?php //print_r($states_list);
         ?>
      <div class="row">
         <style>
            tr.noBorder td {
            border: 0;
            }
            .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
            border-top:none;
            }
         </style>
         <div class="col-sm-12">
            <div class="panel panel-bd lobidrag" style="border:3px solid #d7d4d6;border:3px solid #d7d4d6;width: 1635px;margin-left:30px;">
               <div class="panel-heading">
               </div>
               <div class="panel-body" >
               <!-- style="overflow-y: auto;height:500px;" -->
                  <div class="table-responsive" >
                     <?php 
                        echo "<table border='0' class='table table-striped' cellspacing='0' cellpadding='0' style='table-layout:fixed;
                        
                        border-collapse:collapse;'>
                                       <thead style='height:25px;'>
                                     <th class='btnclr' style='text-align:center;border: 1px solid #d7d4d6;width: 170px;'>".display('sl')."</th>
                                            <th class='btnclr' style='text-align:center;border: 1px solid #d7d4d6;'>County Name</th>
                                           <th class='btnclr'  style=' text-align: center;border: 1px solid #d7d4d6;'>County Taxes</th>
                                           
                                          
                                       </thead><tbody>";
                                       $k=1;
                                 for($i=0; $i < sizeof($county_list); $i++) {
                                          // echo $states_list[$i];
                                         $splt=explode(",",$county_list[$i]['tax']);
                                        
                                         $j=1;
                                      
                                        
                                        
                                        echo "<tr style='border: 1px solid #d7d4d6;background: white;' ><td style='text-align:center;' >".$k."</td><td class='county_name' style='text-align:center;font-weight:bold;border: 1px solid #d7d4d6;background: white;' rowspan='".$j."'>". $county_list[$i]['state']."</td> <td><table>";

                                        foreach($splt as $sp){
                                 
                                     if(!empty($sp) && $sp !==','){
                                   $sp_url= str_replace(" "," ",$sp);
                                   echo "<tr><td style='display:none' class='county_name'>". $county_list[$i]['state']."</td><td style='width:450px;text-align:center;' class='countytax_value'>".$sp."</td> <td>  <a  href=".base_url('Chrm/add_state_taxes_detail?tax='.urlencode($county_list[$i]['state'])."-".urlencode($sp_url))." class='btn btnclr btn-sm' data-toggle='tooltip' data-placement='left'  data-original-title='Add Taxes Detail'><i class='fa fa-window-restore' aria-hidden='true'></i></a>
                                                               <a  class='delete_itemcounty btn btnclr btn-sm' ><i class='fa fa-trash' aria-hidden='true'></i></a>     </td></tr></td>";
                                         }
                                       else{
                         echo "<tr><td style='display:none' class='county_name'>". $county_list[$i]['state']."</td><td style='width:485px;' style='display:none'>&nbsp</td> <td>  
                         <a   class='delete_itemcounty btn btnclr btn-sm'><i class='fa fa-trash' aria-hidden='true'></i></a>     </td></tr></td>";
                        break;
                                       }
                                       }
                                   echo "</table></tr>";
                                       
                                   $j++;$k++;
                               }
                               echo "</table>";
                                       ?>
                  </div>
               </div>
 
            </div>
            <input type="hidden" id="total_invoice" value="<?php echo $total_invoice;?>" name="">
            <input type="hidden" id="currency" value="{currency}" name="">
         </div>
      </div>
   </section>
</div>

<!-- /////////////////////////////////////the end///////////////////////////////////////////////////////////////// -->

</div>

</div>
</div>

 











<div class="modal fade modal-success" id="add_city" role="dialog">
   <div class="modal-dialog" role="document">
      <div class="modal-content" style="text-align:center;">
         <div class="modal-header btnclr" >
            <a href="#" class="close" data-dismiss="modal">&times;</a>
            <h3 class="modal-title">Add New City</h3>
         </div>
         <div class="modal-body">
            <div id="customeMessage" class="alert hide"></div>
            <div class="panel-body">
               <form method="post">
                <input type="hidden" class="txt_csrfname" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
               <div class="form-group row">
                  <label for="customer_name" class="col-sm-3 col-form-label">Add City<i class="text-danger">*</i></label>
                  <div class="col-sm-7">
                     <input class="form-control" name ="city_tax" id="city_tax" type="text" placeholder="Enter your city"  required="" tabindex="1">
                  </div>
                  <div class="col-sm-2">
                     <input type="submit" class="btnclr btn btn-success city_button" id="ADD_CITY" value="Submit">
                  </div>
               </div>
               </form>
                <br>
                <div >
                <!-- style="max-height: 300px; overflow-y: auto;" -->
                  <table class="table table-bordered" style="margin-bottom: 0;">
                       <thead style="position: sticky; top: 0; background-color: white;">
                           <tr>
                               <td>S.NO</td>
                               <td>City Name</td>
                               <td>Action</td>
                           </tr>
                       </thead>
                       <tbody id="cityContainer">
                           <?php if(!empty($FetchCity)){ $s=1; foreach ($FetchCity as $key => $value) { ?>
                               <tr>
                                   <td><?php echo $s; ?></td>
                                   <td>
                                      <span class="city-value"><?php echo $value['city_tax']; ?></span>
                                      <input type="text" class="form-control city-edit" style="display: none;" value="<?php echo $value['city_tax']; ?>">
                                    </td>
                                    <td style="display: none;"><input type="hidden" class="city_ids" value="<?php echo $value['id']; ?>"></td>
                                   <td>
                                    <!-- <a class="btnclr btn  btn-sm invoice_edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                    <a class="btnclr btn  btn-sm" onclick="return confirm('Are you sure want to delete this city ?')"><i class="fa fa-trash-o" aria-hidden="true"></i></a> -->
                                   <a class="btnclr btn btn-sm invoice_edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                    <a class="btnclr btn btn-sm" onclick="return confirm('Are you sure you want to delete this city?') ? deleteCity(<?php echo $value['id']; ?>) : false;"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                   <a class="btnclr btn btn-sm invoice_save" style="display: none;"><i class="fa fa-window-restore" aria-hidden="true" data-toggle="tooltip" data-placement="left" title="" data-original-title="Save"></i></a>
                                   </td>
                               </tr>
                           <?php $s++; } }else{ ?>
                              <tr>
                                 <td class="text-center" colspan="3">No City Found</td>
                              </tr>
                           <?php } ?>
                       </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>



<div class="modal fade modal-success" id="add_states" role="dialog">
   <div class="modal-dialog" role="document">
     <div class="modal-content" style="text-align:center;">
         <div class="modal-header btnclr" >
            <a href="#" class="close" data-dismiss="modal">&times;</a>
            <h3 class="modal-title">Add New States</h3>
         </div>
         <div class="modal-body">
            <div id="customeMessage" class="alert hide"></div>
            <?php echo form_open('Chrm/add_state', array('class' => 'form-vertical', 'id' => 'newcustomer')) ?>
            <div class="panel-body">
               <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
               <div class="form-group row">
                  <label for="customer_name" class="col-sm-3 col-form-label">State Name<i class="text-danger">*</i></label>
                  <div class="col-sm-6">
                     <input class="form-control" name ="state_name" id="" type="text" placeholder="State Name"  required="" tabindex="1">
                  </div>
               </div>
            </div>
         </div>
         <div class="modal-footer">
            <a href="#" class="btnclr btn btn-danger" data-dismiss="modal">Close</a>
            <input type="submit" class="btnclr btn btn-success"  value="Submit">
         </div>
         <?php echo form_close() ?>
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>



<!-- /.modal -->
<div class="modal fade modal-success" id="add_state_tax" role="dialog">
   <div class="modal-dialog" role="document">
      <div class="modal-content" style="text-align:center;">
         <div class="modal-header btnclr" >
            <a href="#" class="close" data-dismiss="modal">&times;</a>
            <h3 class="modal-title">Add New States Tax</h3>
         </div>
         <div class="modal-body">
            <div id="customeMessage" class="alert hide"></div>
            <?php echo form_open('Chrm/add_state_tax', array('class' => 'form-vertical', 'id' => 'add_state_tax')) ?>
            <div class="panel-body">
               <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
               <div class="form-group row">
                  <label for="customer_name" class="col-sm-3 col-form-label">State Name<i class="text-danger">*</i></label>
                  <div class="col-sm-6">
                     <select class="form-control" name="selected_state" required>
                        <option value="" selected disabled><?php echo display('select_one') ?></option>
                        <?php  foreach($states_list as $state){ ?>
                        <option value="<?php  echo $state['state']; ?>"><?php  echo $state['state']; ?></option>
                        <?php  }  ?>
                     </select>
                  </div>
               </div>
               <div class="form-group row">
                  <label for="customer_name" class="col-sm-3 col-form-label">Tax Name<i class="text-danger">*</i></label>
                  <div class="col-sm-6">
                     <input class="form-control" name ="state_tax_name" id="" type="text" placeholder="State Tax Name"  required="" tabindex="1">
                  </div>
               </div>
            </div>
         </div>
         <div class="modal-footer">
            <a href="#" class="btnclr btn btn-danger" data-dismiss="modal">Close</a>
            <input type="submit" class="btnclr btn btn-success"   value="Submit">
         </div>
         <?php echo form_close() ?>
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>
<!-- /.modal -->














<!-- ////cityinfoname -->


<div class="modal fade modal-success" id="add_city_info" role="dialog">
   <div class="modal-dialog" role="document">
     <div class="modal-content" style="text-align:center;">
         <div class="modal-header btnclr" >
            <a href="#" class="close" data-dismiss="modal">&times;</a>
            <h3 class="modal-title">Add New City</h3>
         </div>
         <div class="modal-body">
            <div id="customeMessage" class="alert hide"></div>
            <?php echo form_open('Chrm/add_city', array('class' => 'form-vertical', 'id' => 'newcustomer')) ?>
            <div class="panel-body">
               <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
               <div class="form-group row">
                  <label for="customer_name" class="col-sm-3 col-form-label">City Name<i class="text-danger">*</i></label>
                  <div class="col-sm-6">
                     <input class="form-control" name ="city_name" id="" type="text" placeholder="City Name"  required="" tabindex="1">
                  </div>
               </div>
            </div>
         </div>
         <div class="modal-footer">
            <a href="#" class="btnclr btn btn-danger" data-dismiss="modal">Close</a>
            <input type="submit" class="btnclr btn btn-success"  value="Submit">
         </div>
         <?php echo form_close() ?>
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>



<!-- /.modal -->
<div class="modal fade modal-success" id="add_city_tax" role="dialog">
   <div class="modal-dialog" role="document">
      <div class="modal-content" style="text-align:center;">
         <div class="modal-header btnclr" >
            <a href="#" class="close" data-dismiss="modal">&times;</a>
            <h3 class="modal-title">Add New City Tax</h3>
         </div>
         <div class="modal-body">
            <div id="customeMessage" class="alert hide"></div>
            <?php echo form_open('Chrm/add_city_state_tax', array('class' => 'form-vertical', 'id' => 'add_city_state_tax')) ?>
            <div class="panel-body">
               <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
               <div class="form-group row">
                  <label for="customer_name" class="col-sm-3 col-form-label">City Name<i class="text-danger">*</i></label>
                  <div class="col-sm-6">
                     <select class="form-control" name="selected_city" required>
                        <option value="" selected disabled><?php echo display('select_one') ?></option>
                        <?php  foreach($city_list as $city){ ?>
                        <option value="<?php  echo $city['state']; ?>"><?php  echo $city['state']; ?></option>
                        <?php  }  ?>
                     </select>
                  </div>
               </div> 
               <div class="form-group row">
                  <label for="customer_name" class="col-sm-3 col-form-label">City Tax Name<i class="text-danger">*</i></label>
                  <div class="col-sm-6">
                     <input class="form-control" name ="city_tax_name" id="" type="text" placeholder="City Tax Name"  required="" tabindex="1">
                  </div>
               </div>
            </div>
         </div>
         <div class="modal-footer">
            <a href="#" class="btnclr btn btn-danger" data-dismiss="modal">Close</a>
            <input type="submit" class="btnclr btn btn-success"   value="Submit">
         </div>
         <?php echo form_close() ?>
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>
<!-- /.modal -->




<!-- ///end -->






<!-- ///////////////////////// County Name  ////////////////////////////// -->


<div class="modal fade modal-success" id="add_county_info" role="dialog">
   <div class="modal-dialog" role="document">
     <div class="modal-content" style="text-align:center;">
         <div class="modal-header btnclr" >
            <a href="#" class="close" data-dismiss="modal">&times;</a>
            <h3 class="modal-title">Add New County</h3>
         </div>   
         <div class="modal-body">
            <div id="customeMessage" class="alert hide"></div>
            <?php echo form_open('Chrm/add_county', array('class' => 'form-vertical', 'id' => 'newcustomer')) ?>
            <div class="panel-body">
               <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
               <div class="form-group row">
                  <label for="customer_name" class="col-sm-3 col-form-label">County Name<i class="text-danger">*</i></label>
                  <div class="col-sm-6">
                     <input class="form-control" name ="county" id="" type="text" placeholder="County Name"  required="" tabindex="1">
                  </div>
               </div>
            </div>
         </div>
         <div class="modal-footer">
            <a href="#" class="btnclr btn btn-danger" data-dismiss="modal">Close</a>
            <input type="submit" class="btnclr btn btn-success"  value="Submit">
         </div>
         <?php echo form_close() ?>
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>



<!-- /.modal -->
<div class="modal fade modal-success" id="add_county_tax" role="dialog">
   <div class="modal-dialog" role="document">
      <div class="modal-content" style="text-align:center;">
         <div class="modal-header btnclr" >
            <a href="#" class="close" data-dismiss="modal">&times;</a>
            <h3 class="modal-title">Add New County Tax</h3>
         </div>
         <div class="modal-body">
            <div id="customeMessage" class="alert hide"></div>
            <?php echo form_open('Chrm/add_county_tax', array('class' => 'form-vertical', 'id' => 'add_county_tax')) ?>
            <div class="panel-body">
               <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
               <div class="form-group row">
                  <label for="customer_name" class="col-sm-3 col-form-label">County Name<i class="text-danger">*</i></label>
                  <div class="col-sm-6">
                     <select class="form-control" name="selected_county" required>
                        <option value="" selected disabled><?php echo display('select_one') ?></option>
                        <?php  foreach($county_list as $county){ ?>
                        <option value="<?php  echo $county['state']; ?>"><?php  echo $county['state']; ?></option>
                        <?php  }  ?>
                     </select>
                  </div>
               </div> 
               <div class="form-group row">
                  <label for="customer_name" class="col-sm-3 col-form-label">County Tax Name<i class="text-danger">*</i></label>
                  <div class="col-sm-6">
                     <input class="form-control" name ="county_tax_name" id="" type="text" placeholder="County Tax Name"  required="" tabindex="1">
                  </div>
               </div>
            </div>
         </div>
         <div class="modal-footer">
            <a href="#" class="btnclr btn btn-danger" data-dismiss="modal">Close</a>
            <input type="submit" class="btnclr btn btn-success"   value="Submit">
         </div>
         <?php echo form_close() ?>
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>
<!-- /.modal -->




<!--         ///////////  ///end ////////////////////////////////-->













<!-- Manage Invoice End -->
<div class="modal fade" id="myModal1" role="dialog" >
   <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content" style="margin-top: 190px;">
         <div class="modal-header" style="color:white;background-color:#38469f;">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">HR</h4>
         </div>
         <div class="modal-body" id="bodyModal1" style="text-align:center;font-weight:bold;">
         </div>
         <div class="modal-footer">
         </div>
      </div>
   </div>
</div>
<link rel="stylesheet" type="text/css" href="//code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- <input type="hidden" name="<?php //echo $this->security->get_csrf_token_name();?>" value="<?php //echo $this->security->get_csrf_hash();?>"> -->
<script type="text/javascript">
   var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
   var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';
   $('.checkbox_id').click(function() {
       var tax_name=$(this).closest('tr').find('.checkbox_id').val();
       var data = {
         value:tax_name
        };
      data[csrfName] = csrfHash;
      $.ajax({
         type:'POST',
         data: data,
         dataType:"json",
         url:'<?php echo base_url();?>Chrm/add_taxname_data',
         success: function(result, statut) {
         }
     });
   });
   $(document).ready(function(){
   $('[type="checkbox"]').change(function(){
     if(this.checked){
        $('[type="checkbox"]').not(this).prop('checked', false);
     }
   });
   });
   
   
   
   
   
   
   $(document).ready(function(){
     $(".federal_tax").click(function(){
       var tax = $(this).closest('tr').find('#federal_tax').val();
       $.ajax({
           type: "POST",
           url: '<?php echo base_url(); ?>Chrm/add_taxes_detail',
              
           data: {<?php echo $this->security->get_csrf_token_name();?>: csrfHash,tax:tax},
           success:function(data)
           {    
                location.reload(); 
           },
           error: function (){ }
       })
     });





       $(".delete_item").click(function(){
       var tax = $(this).closest('tr').find('td.tax_value').text();
        var state = $(this).closest('tr').find('td.state_name').text();
        var dataString = {
           tax : tax,
           state : state
       
      };
      dataString[csrfName] = csrfHash;
       $.ajax({
           type: "POST",
        url: "<?php echo base_url(); ?>Chrm/delete_tax",
              
           data: {<?php echo $this->security->get_csrf_token_name();?>: csrfHash,tax:tax,state:state},
           success:function(data)
           {     
              location.reload();
           },
           error: function (){ }
       })
     });
   });




     var csrfName = $('.txt_csrfname').attr('name');
   var csrfHash = $('.txt_csrfname').val();
   $(document).ready(function(){
       $("#ADD_CITY").click(function(event){
         event.preventDefault();
         var city = $('#city_tax').val();
         $.ajax({
           type:"POST",
           url:"<?php echo base_url(); ?>Chrm/addCity",
           data: {[csrfName]: csrfHash, city:city},
           dataType:"json",
           success:function(response){
            //  console.log(response);
             swal({
               title: 'City saved successfully',
               icon: 'success',
               button: {
                  text: "Continue",
                  value: true,
                  visible: true,
                  className: "btn btn-primary"
               }
            }).then(function(isConfirm) {
               location.reload();
            });
           },
           error: function(xhr, status, error) {
             // console.log(error);
           }
         });
       });
       $('.invoice_edit').click(function() {
         $('.city_button').hide();
        var row = $(this).closest('tr');
        row.find('.city-value').hide();
        row.find('.city-edit').show();
        row.find('.invoice_edit').hide();
        row.find('.invoice_save').show();
      });
      $('.invoice_save').click(function() {
        var row = $(this).closest('tr');
        var cityId = row.find('.city_ids').val();
        var newCity = row.find('.city-edit').val();
        // alert(newCity);
        // Perform AJAX to update the city in the database
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Chrm/editCity",
            data: {[csrfName]: csrfHash, city_id: cityId, new_city: newCity },
            dataType:"json",
            success: function(response) {
               console.log(response);
                // Handle success, update UI if needed
                row.find('.city-value').text(newCity).show();
                row.find('.city-edit').hide();
                row.find('.invoice_edit').show();
                row.find('.invoice_save').hide();
                $('.city_button').show();
                // location.reload();
            },
            error: function(xhr, status, error) {
                // Handle error
                console.log(error);
            }
        });
      });
     });
   function deleteCity(cityId) {
      $.ajax({
         type: "POST",
         url: "<?php echo base_url(); ?>Chrm/deleteCity",
         data: {[csrfName]: csrfHash, cityId: cityId},
         dataType:"json",
         success: function(response) {
            console.log(response);
            location.reload();
         },
         error: function(xhr, status, error) {
            console.log(error);
         }
      })
  }
   







 

  $(".delete_item_city").click(function () {
    var citytax = $(this).closest('tr').find('td.citytax_value').text();
    var city = $(this).closest('tr').find('td.citystate_name').text();
    
    var dataString = {
        citytax: citytax,
        city: city,
        <?= $this->security->get_csrf_token_name(); ?>: '<?= $this->security->get_csrf_hash(); ?>'
    };

    $.ajax({
        type: "POST",
        url: '<?= base_url(); ?>Chrm/citydelete_tax',
        data: dataString,
        success: function (data) {
            location.reload();
        },
        error: function () {
            // Handle error if needed
        }
    });
});










$(".delete_itemcounty").click(function () {
    var countytax = $(this).closest('tr').find('td.countytax_value').text();
    var county = $(this).closest('tr').find('td.county_name').text();
    
   //  alert(countytax);
   //  alert(county);

    var dataString = {
      countytax: countytax,
      county: county,
        <?= $this->security->get_csrf_token_name(); ?>: '<?= $this->security->get_csrf_hash(); ?>'
    };

    $.ajax({
        type: "POST",
        url: '<?= base_url(); ?>Chrm/countydelete_tax',
        data: dataString,
        success: function (data) {
            location.reload();
        },
        error: function () {
            // Handle error if needed
        }
    });
});



function downloadPDF() {
    var pdfPath = '<?php echo base_url('assets/payrollform/fw3/fw3.pdf') ?>';
    var downloadLink = document.createElement('a');
    downloadLink.href = pdfPath;
    downloadLink.download = 'W3form.pdf';
    document.body.appendChild(downloadLink);
    downloadLink.click();
    document.body.removeChild(downloadLink);
}

</script>