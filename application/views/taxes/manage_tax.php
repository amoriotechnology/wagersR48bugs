

<style>
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
    width: 180px;
  }

</style>












<!-- Cheaque Manager Start -->

<div class="content-wrapper">

	<section class="content-header">

	    <div class="header-icon">

	   <figure class="one">
               <img src="<?php echo base_url()  ?>asset/images/road.png"  class="headshotphoto" style="height:50px;" />      </div>
   









 

	     
	          <div class="header-title">
          <div class="logo-holder logo-9">
	        <h1><?php echo display('manage_tax') ?></h1>
       </div>
	     
	     
	     
	     
	        <small><?php echo display('manage_tax') ?></small>

	        <ol class="breadcrumb">

	            <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>

	            <li><a href="#"><?php echo display('accounts') ?></a></li>

	            <li class="active"><?php echo display('manage_tax') ?></li>

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





        <div class="row">

            <div class="col-sm-12">

                <div class="column">

           <?php if($this->permission1->method('add_tax','create')->access()){ ?>

                  <a href="<?php echo base_url('Caccounts/add_taxes')?>" class="btn btn-success m-b-5 m-r-2"><i class="ti-plus"> </i>  <?php echo display('add_tax')?> </a>


                   <a href="<?php echo base_url('Caccounts/tax_list')?>" class="btn btn-success m-b-5 m-r-2"><i class="ti-plus"> </i>  Taxes List </a>

              <?php }?>



                </div>

            </div>

        </div>



		<!-- Manage TAX -->

		<div class="row">

		    <div class="col-sm-12">

		        <div class="panel panel-bd lobidrag">

		            <div class="panel-heading">

		                <div class="panel-title">

		                    <h4><?php echo display('manage_tax') ?> </h4>

		                </div>

		            </div>

		            <div class="panel-body">

		                <div class="table-responsive">

		                    <table id="dataTableExample3" class="table table-bordered table-striped table-hover">

			           			<thead>

									<tr>

										<th><?php echo display('sl') ?></th>

										<th><?php echo display('tax') ?></th>

										<th><?php echo display('action') ?></th>

									</tr>

								</thead>

								<tbody>

								<?php

									if ($tax_list) {

										$i=1;

								foreach ($tax_list as $tax) {

								?>

									<tr>

										<td><?php echo $i?></td>

										<td><?php echo $tax->tax?> %</td>

						                <td>

						                    <center>

						                    	 <?php if($this->permission1->method('manage_tax','update')->access()){ ?>

					                            <a href="<?php echo base_url().'Caccounts/tax_edit/'.$tax->tax_id; ?>" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="right" title="" data-original-title="<?php echo display('update') ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

					                        <?php }?>

                   <?php if($this->permission1->method('manage_tax','delete')->access()){ ?>

					                            <a href="<?php echo base_url().'Caccounts/tax_delete/'.$tax->tax_id; ?>" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="right" title="" data-original-title="<?php echo display('delete') ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>

					                            <?php }?>

						                    </center>

						                </td>

									</tr>

								<?php

								$i++;

									}

								}else{

								?>
								<tr><td style="text-align:center;" colspan="9">No Records Found</td></tr>
<?php   }  ?>
								</tbody>

		                    </table>

		                </div>

		            </div>

		        </div>

		    </div>

		</div>
		<script src="<?php echo base_url()?>assets/js/jquery.bootgrid.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.0.0-alpha.1/jspdf.plugin.autotable.js"></script>
<div id="myModal_colSwitch"  name="mytaxName"    class="modal_colSwitch" >
   <div class="modal-content_colSwitch" style="width:25%;height:20%;">
      <span class="close_colSwitch" style="margin-right:20px">&times;</span>
      <div class="col-sm-1" ></div>
      <div class="col-sm-3" >
         <br>
         <div class="form-group row"  > 
            <br><input type="checkbox"  data-control-column="1"   class="1" value="1"/> &nbsp;<?php echo display('S.No') ?><br>
            <!-- <br><input type="checkbox"  data-control-column="2" checked="checked"   class="2" value="2"/>&nbsp;<?php echo display('Tax');?><br> -->
            <br><input type="checkbox"  data-control-column="3"     class="3 " value="3  "/>&nbsp;<?php  echo  display('Tax ID');?> <br>
          
         </div>
      </div>
      <div class="col-sm-4" >
         <br>
         <div class="form-group row"  >
         <br><input type="checkbox"  data-control-column="4"       class="4" value="4"/>&nbsp;<?php  echo  display('Description');?><br>
         <!-- <br><input type="checkbox"  data-control-column="5" checked="checked"   class="5" value="5"/>&nbsp;<?php  echo  display('Tax Agency');?><br> -->
            <br><input type="checkbox"  data-control-column="6"     class="6" value="6"/>&nbsp;<?php  echo  display('Account');?><br>

           
         </div>
      </div>
      <div class="col-sm-3"  >
      <br>
         <div class="form-group row"  >
         <!-- <br><input type="checkbox"  data-control-column="7"  checked="checked"  class="7" value="7"/>&nbsp;<?php echo display('Show Tax on Return Line');?><br> -->
         <!-- <br><input type="checkbox"  data-control-column="9"  checked="checked"   class="9" value="9"/>&nbsp;<?php echo display('Action');?><br> -->
            <br><input type="checkbox"  data-control-column="8"     class="8" value="8"/>&nbsp;Type<br>
            
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

	</section>

</div>
<script>
    $(document).ready(function() {
       var localStorageName = "mytaxName"; // Set your desired localStorage name
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
$(document).ready(function() {
            // Function to store the visibility state of rows in localStorage
            function storeVisibilityState() {
                var manageTaxDetails = {};
                $("#ProfarmaInvList tr").each(function(index, element) {
                    var row = $(element);
                    var rowID = index;
                    var isVisible = row.is(':visible');
                    manageTaxDetails[rowID] = isVisible;
                });
                // Store the visibility states in localStorage
                localStorage.setItem("manageTaxDetails", JSON.stringify(manageTaxDetails));
            }
            // Apply the stored visibility state on page load
            function applyVisibilityState() {
                var storedVisibilityStates = JSON.parse(localStorage.getItem("manageTaxDetails")) || {};
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
            $(".managetax_edit").on('click', function() {
                var row = $(this);
                // row.toggle();
                storeVisibilityState(); // Store the updated visibility state
            });
            applyVisibilityState(); // Apply the stored visibility state on page load
        });
</script>
<!-- Cheaque Manager End -->