<!-- Product Purchase js -->
<script src="<?php echo base_url()?>my-assets/js/admin_js/json/product_purchase.js.php" ></script>
<!-- Supplier Js -->
<script src="<?php echo base_url(); ?>my-assets/js/admin_js/json/supplier.js.php" ></script>

<script src="<?php echo base_url()?>my-assets/js/admin_js/purchase.js" type="text/javascript"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<style>
    .select2{
        display:none;
    }
       #block_container
{height:40px;
    text-align:center;
}
#bloc1, #bloc2
{text-align:center;
    font-weight:bold;
    display:inline;
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
    width: 190px;
  }
}






</style>

<!-- Add New Purchase Start -->
<div class="content-wrapper">
    <section class="content-header">
        
        
  
    
    
    
              <div class="header-icon">
          <figure class="one">
               <img src="<?php echo base_url()  ?>asset/images/saleexport.png"  class="headshotphoto" style="height:50px;" />

      
      
          
      </div>
      
      
      
     <div class="header-title">
         
          <div class="logo-holder logo-9">
           <h1>Edit Ocean Export Tracking</h1>

       </div>
   
         
         
            <small></small>
         <ol class="breadcrumb" style="border: 3px solid #d7d4d6;">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('Sale') ?></a></li>
                <li class="active" style="color:orange;"><?php echo display('Edit Ocean Export Tracking') ?></li>
          
          
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
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
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

        <!-- Purchase report -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag"    style="border: 3px solid #d7d4d6;" >
                    <div class="panel-heading">
                        <div class="panel-title">
<div id="block_container">
                                <div id="bloc1" style="float:left;">
                          <h4><?php //echo "Edit Ocean Export Tracking" ?></h4>
                               </div> 
                             <div id="bloc2" style="float:right;">
                           

                    <a   href="<?php echo base_url('Cinvoice/manage_ocean_export_tracking') ?>" class="btnclr btn  m-b-5 m-r-2"><i class="ti-align-justify"> </i> <?php echo display ('Manage Ocean Export Tracking') ?> </a>

                    
                     </div>    </div>

  </div>

                    </div>
                    <div class="panel-body">
                   <form id="insert_ocean"  method="post">          

                   <div class="row">
                           
                   <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="supplier_sss" class="col-sm-4 col-form-label"><?php echo display('Shipper') ?>
                                        <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-8">
                                        <select name="supplier_id" id="supplier_id" class="form-control " style="border:2px solid #d7d4d6;"   required=""> 
                                          
                                            {supplier_list}
                                            <option value="{supplier_id}">{supplier_name}</option>
                                            {/supplier_list} 
                                            {supplier_selected}
                                            <option value="{supplier_id}" selected="">{supplier_name}</option>
                                            {/supplier_selected}
                                        </select>
                                    </div>
                                  <?php if($this->permission1->method('add_supplier','create')->access()){ ?>
                                    <div class="col-sm-2">


                                     <!--    <a class="btn btn-success" title="Add New Supplier" href="<?php echo base_url('Csupplier'); ?>"><i class="fa fa-user"></i></a> -->



                                        <!--   <a href="#" class="client-add-btn btn btn-info" aria-hidden="true" data-toggle="modal" data-target="#add_vendor"><i class="fa fa-user"></i></a> -->


                                    </div>
                                <?php }?>
                                </div> 
                            </div>

                            


                           <div class="col-sm-6">
                              <div class="form-group row">
                                  <label for="booking_no" class="col-sm-4 col-form-label"><?php echo display('Booking No') ?>.
                                      <i class="text-danger">*</i>
                                  </label>
                                  <div class="col-sm-8">
                                      <input type="text" tabindex="3" class="form-control" name="booking_no" placeholder="Booking or B/L number" value="{booking_no}" id="booking_no"  style="border:2px solid #d7d4d6;"   readonly  required />
                                      <input type="hidden" name="ocean_export_tracking_id" value="{ocean_export_tracking_id}">
                                  </div>
                              </div>
                          </div>




                          
                      </div>

                      <div class="row">
                          <div class="col-sm-6">
                              <div class="form-group row">
                                  <label for="date" class="col-sm-4 col-form-label"><?php echo display('Invoice Date') ?>
                                      <i class="text-danger">*</i>
                                  </label>
                                  <div class="col-sm-8">
                                      <?php $date = date('Y-m-d'); ?>
                                      <input type="date" required tabindex="2" class="form-control datepicker" name="invoice_date"  style="border:2px solid #d7d4d6;"  value="<?php echo $date; ?>" id="date"  required/>
                                  </div>
                              </div>
                          </div>
                          <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="adress" class="col-sm-4 col-form-label"><?php echo display('Customer / Consignee') ?>
                                    </label>
                                    <div class="col-sm-8">
                                    <select id="consignee" name="consignee" class="form-control "  style="border:2px solid #d7d4d6;"   required=""> 
                                    <option value="<?php echo $customer_id ;?>" selected="">{customer_name}</option>
                                          {customer}
                                          <option value="{customer_id}">{customer_name}</option>
                                          {/customer} 
                                          
                                         
                                        
                                      </select>
                                       
                                    </div>
                                </div> 
                            </div>
                           
                        </div>
                         
                      <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
 

                      <div class="row">
                          <div class="col-sm-6">
                              <div class="form-group row">
                                  <label for="etd" class="col-sm-4 col-form-label"><?php echo display('Notify Party') ?>
                                      <i class="text-danger">*</i>
                                  </label>
                                  <div class="col-sm-8">
                                      <input type="text" tabindex="3" class="form-control" name="notify_party" value="{notify_party}" placeholder="Notify Party" style="border:2px solid #d7d4d6;"   id="notify_party" required/>
                                  </div>
                              </div>
                          </div>

                          <div class="col-sm-6">
                             <div class="form-group row">
                                  <label for="eta" class="col-sm-4 col-form-label"><?php echo display('Vessel') ?>
                                  </label>
                                  <div class="col-sm-8">
                                      <textarea class="form-control" tabindex="4" id="vessel" name="vessel" placeholder="Vessel" style="border:2px solid #d7d4d6;"   rows="1">{vessel}</textarea>
                                  </div>
                              </div> 
                          </div>
                      </div>

                      <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
 


                       <div class="row">
                          <div class="col-sm-6">
                              <div class="form-group row">
                                  <label for="shipping_line" class="col-sm-4 col-form-label"><?php echo display('Voyage No') ?>.
                                      
                                  </label>
                                  <div class="col-sm-8">
                                      <input type="text" tabindex="3" class="form-control" name="voyage_no" value="{voyage_no}" placeholder="Voyage No."  style="border:2px solid #d7d4d6;"   id="voyage_no" />
                                  </div>
                              </div>
                          </div>

                           <div class="col-sm-6">
                              <div class="form-group row">
                                  <label for="bl_number" class="col-sm-4 col-form-label"><?php echo display('Port of loading') ?>
                                      <i class="text-danger">*</i>
                                  </label>
                                  <div class="col-sm-8">
                                      <input type="text" tabindex="3" class="form-control" name="port_of_loading" value="{port_of_loading}" placeholder="Port of loading"  style="border:2px solid #d7d4d6;"   id="port_of_loading" required/>
                                  </div>
                              </div>
                          </div>


                        
                      </div>


                        <div class="row">
                          <div class="col-sm-6">
                              <div class="form-group row">
                                  <label for="bl_number" class="col-sm-4 col-form-label"><?php echo display('Port of discharge')  ?>
                                      <i class="text-danger">*</i>
                                  </label>
                                  <div class="col-sm-8">
                                      <input type="text" tabindex="3" class="form-control" name="port_of_discharge" value="{port_of_discharge}" placeholder="Port of discharge" style="border:2px solid #d7d4d6;"   id="port_of_discharge" required/>
                                  </div>
                              </div>
                          </div>


                              <div class="col-sm-6">
                             <div class="form-group row">
                                  <label for="container_no" class="col-sm-4 col-form-label"><?php echo display('Place of Delivery') ?> <i class="text-danger">*</i>
                                  </label>
                                  <div class="col-sm-8">
                                      <textarea class="form-control" tabindex="4" id="place_of_delivery" name="place_of_delivery"  style="border:2px solid #d7d4d6;"   placeholder="Place of Delivery" rows="1" required>{place_of_delivery}</textarea>
                                  </div>
                              </div> 
                          </div>
                      </div>

                      <div class="row">
                          <div class="col-sm-6">
                              <div class="form-group row">
                                  <label for="customs_broker_name" class="col-sm-4 col-form-label"><?php echo display('Customs Broker Name') ?></label>
                                  <div class="col-sm-8">
                                  <input  class="form-control" tabindex="4" id=" customs_broker_name" name="customs_broker_name"  style="border:2px solid #d7d4d6;"   placeholder=" Customs Broker Name" value="{customs_broker_name}" rows="1">
                                  
                                  </div>
                              </div>
                          </div>
                          <div class="col-sm-6">
                             <div class="form-group row">
                                  <label for="mbl_no" class="col-sm-4 col-form-label"><?php echo display('MBL NO') ?></label>
                                  <div class="col-sm-8">
                                  <input  class="form-control" tabindex="4" id=" mbl_no" name="mbl_no"  placeholder=" MBL NO" style="border:2px solid #d7d4d6;"   value="{mbl_no}" rows="1">
                                  </div>
                              </div> 
                          </div>
                      </div>

                      <div class="row">
                          <div class="col-sm-6">
                              <div class="form-group row">
                                  <label for="hbl_no" class="col-sm-4 col-form-label"><?php echo display('HBL NO') ?></label>
                                  <div class="col-sm-8">
                                  <input class="form-control" tabindex="4" id=" hbl_no" name="hbl_no"  placeholder=" HBL NO" style="border:2px solid #d7d4d6;"   value="{hbl_no}" rows="1">
                                  </div>
                              </div>
                          </div>
                          <div class="col-sm-6">
                             <div class="form-group row">
                                  <label for="obl_no" class="col-sm-4 col-form-label"><?php echo display('OBL NO') ?></label>
                                  <div class="col-sm-8">
                                  <input  class="form-control" tabindex="4" id=" obl_no" name="obl_no"  placeholder=" OBL NO" style="border:2px solid #d7d4d6;"  value="{obl_no}" rows="1">
                                  </div>
                              </div> 
                          </div>
                      </div>


                      <div class="row">
                          <div class="col-sm-6">
                              <div class="form-group row">
                                  <label for="ams_no" class="col-sm-4 col-form-label"><?php echo display('AMS NO') ?></label>
                                  <div class="col-sm-8">
                                  <input  class="form-control" tabindex="4" id=" ams_no" name="ams_no"  placeholder=" AMS NO" style="border:2px solid #d7d4d6;"   value="{ams_no}" rows="1">
                                  </div>
                              </div>
                          </div>
                          <div class="col-sm-6">
                             <div class="form-group row">
                                  <label for="isf_no" class="col-sm-4 col-form-label"><?php echo display('ISF NO') ?></label>
                                  <div class="col-sm-8">
                                  <input  class="form-control" tabindex="4" id=" isf_no" name="isf_no"  placeholder=" ISF NO"  style="border:2px solid #d7d4d6;"   value="{isf_no}" rows="1">
                                  </div>
                              </div> 
                          </div>
                      </div>


                      <div class="row">
                          <div class="col-sm-6">
                              <div class="form-group row">
                                  <label for="container_no" class="col-sm-4 col-form-label"><?php echo display('Container No') ?>
                                      <i class="text-danger">*</i>
                                  </label>
                                  <div class="col-sm-8">
                                     <textarea class="form-control" tabindex="4" id="container_no" name="container_no" placeholder="Container No"  style="border:2px solid #d7d4d6;"  rows="1" required>{container_no}</textarea>
                                  </div>
                              </div>
                          </div>
                         

                              <div class="col-sm-6">
                             <div class="form-group row">
                                  <label for="seal_no" class="col-sm-4 col-form-label"><?php echo display('Seal No') ?> <i class="text-danger">*</i>
                                  </label>
                                  <div class="col-sm-8">
                                      <textarea class="form-control" tabindex="4" id="seal_no" name="seal_no"  style="border:2px solid #d7d4d6;"  placeholder="Seal No" value="{seal_no}" rows="1" required>{seal_no}</textarea>
                                  </div>
                              </div> 
                          </div>
                      </div>
                      <input type="hidden" id="invoice_hdn"/> <input type="hidden" id="invoice_hdn1"/>
                      <div class="row">
                          <div class="col-sm-6">
                              <div class="form-group row">
                                  <label for="Freight forwarder" class="col-sm-4 col-form-label"><?php echo display('Freight forwarder') ?>
                                      <i class="text-danger">*</i>
                                  </label>
                                  <div class="col-sm-8">
                                  <textarea class="form-control" tabindex="4" id="eta" name="freight_forwarder" style="border:2px solid #d7d4d6;"   placeholder="Freight Forwarder" rows="1">{freight_forwarder}</textarea>
                                  </div>
                              </div>
                          </div>


                        
                              <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="adress" class="col-sm-4 col-form-label"><?php echo display('Attachments') ?>
                                    </label>
                                    <div class="col-sm-8">
                                       <input type="file" name="files[]" id="attachment" class="form-control" multiple/>

                                       
                                        <?php foreach ($view_attachments as $key => $attachment) { ?> 
                                       <a href="<?php  echo base_url(); ?>uploads/<?php echo $attachment['files']; ?>" class="file-block" target=_blank><span class="file-delete"><span><i class="fa fa-trash-o"></i></span></span><?php echo $attachment['files']; ?></a>
                                       <?php } ?>

                                    </div>
                                </div> 
                            </div>
                        </div>
                    
                      <div class="row">
                          <div class="col-sm-6">
                              <div class="form-group row">
                                  <label for="bl_number" class="col-sm-4 col-form-label"><?php echo display('Estimated time of departure') ?>
                                      <i class="text-danger">*</i>
                                  </label>
                                  <div class="col-sm-8">
                                  <?php $date = date('Y-m-d'); ?>
                                      <input type="date" required tabindex="2" class="form-control " name="etd" style="border:2px solid #d7d4d6;"   value="<?php echo $date; ?>" id="date"  />
                                  </div>
                              </div>
                          </div>


                              <div class="col-sm-6">
                             <div class="form-group row">
                                  <label for="container_no" class="col-sm-4 col-form-label"><?php echo display('Estimated Time of Arrival') ?> <i class="text-danger">*</i>
                                  </label>
                                  <div class="col-sm-8">
                                  <?php $date = date('Y-m-d'); ?>
                                      <input type="date" required tabindex="2" class="form-control " name="eta"  style="border:2px solid #d7d4d6;"   value="<?php echo $date; ?>" id="date"  />
                                  </div>
                              </div> 
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-sm-12">
                              <div class="form-group row">
                                  <label for="particulars" class="col-sm-2 col-form-label"><?php echo display('Remarks / Particulars') ?>
                                      <i class="text-danger"></i>
                                  </label>
                                  <div class="col-sm-4">
                                     <textarea class="form-control" tabindex="4" id="particular" name="particulars"  style="border:2px solid #d7d4d6;"   rows="2">{particular}</textarea>
                                  </div>
                              </div>
                          </div>
                      </div>
             

        <br>
                       

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <input type="submit" id="add_purchase" class="btnclr btn btn-large"   name="add-ocean-Export" value="<?php echo display('Save') ?>" >
                                                       
                               <a     id="final_submit" class='btnclr final_submit btn  '><?php echo display('Submit') ?></a>

<a id="download"   class='btnclr btn  '><?php echo display('Download') ?></a>  
<a id="print"   class='btnclr btn  '><?php echo display('Print') ?></a>  


                            </div>
                        </div>



                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>
<!-- Purchase Report End -->


    <div class="modal fade" id="myModal1" role="dialog" >
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="margin-top: 190px;text-align:center;">
       <div class="modal-header btnclr"  >
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><?php echo display('Sales - Ocean') ?></h4>
        </div>
        <div class="modal-body" id="bodyModal1" style="font-weight:bold;text-align:center;">
          
      
     
        </div>
        <div class="modal-footer">
          
        </div>
      </div>
      
    </div>
  </div>
           <div id="myModal3" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content" style="text-align:center;" >
			 <div class="modal-header btnclr"  >
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?php echo display('Confirmation') ?></h4>
			</div>
			<div class="modal-body">
				<p><?php echo display('Your Invoice is not submitted. Would you like to submit or discard') ?>
				</p>
				<p class="text-warning">
					<small><?php echo display('If you dont submit your changes will not be saved') ?>.</small>
				</p>
			</div>
			<div class="modal-footer">
				<input type="submit" id="ok" class="btn btnclr"   onclick="submit_redirect()"  value="<?php echo display('Submit') ?>"/>
                <button id="btdelete" type="button" class="btn btnclr"  onclick="discard()"><?php echo display('Discard') ?></button>
			
			</div>
		</div>
	</div>
</div> 

<script type="text/javascript">
            var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';
        $(document).ready(function(){

            $('#final_submit').hide();
$('#download').hide();
$('#print').hide(); 
        });
        $('#insert_ocean').submit(function (event) {
    var dataString = {
        dataString : $("#insert_ocean").serialize()
    
   };
   dataString[csrfName] = csrfHash;
  
    $.ajax({
        type:"POST",
        dataType:"json",
        url:"<?php echo base_url(); ?>Cinvoice/insert_ocean_export",
        data:$("#insert_ocean").serialize(),

        success:function (data) {
        console.log(data);
        var split = data.split("/");
        var input_hdn="Ocean Export Updated Successfully";
     $("#bodyModal1").html(input_hdn);
        $('#myModal1').modal('show');
    window.setTimeout(function(){
        $('.modal').modal('hide');
       
$('.modal-backdrop').remove();
 },2500);

$('#final_submit').show();
$('#download').show();
$('#print').show();  
  console.log(input_hdn);

     
           $('#invoice_hdn').val(split[0]);
           $('#invoice_hdn1').val(split[1]);
       }

    });
    event.preventDefault();
});
$('#download').on('click', function (e) {
var link= $('#invoice_hdn').val();
console.log(link);
 var popout = window.open("<?php  echo base_url(); ?>Cinvoice/ocean_export_tracking_details_data/"+link);
 
   

});  
$('#print').on('click', function (e) {
var link= $('#invoice_hdn').val();
console.log(link);
 var popout = window.open("<?php  echo base_url(); ?>Cinvoice/ocean_export_tracking_details_data_print/"+link);
 
  

});
$('#add_purchase').on('click', function (e) {
    

});
function discard(){
   $.get(
    "<?php echo base_url(); ?>Cinvoice/delete_ocean_export/", 
   { val: $("#invoice_hdn1").val(), csrfName:csrfHash }, // put your parameters here
   function(responseText){
    console.log(responseText);
    window.btn_clicked = true;      //set btn_clicked to true
    var input_hdn="Your Booking No :"+$('#invoice_hdn1').val()+" has been Discarded";
  
    console.log(input_hdn);
    $('#myModal3').modal('hide');
    $("#bodyModal1").html(input_hdn);
        $('#myModal1').modal('show');
    window.setTimeout(function(){
       

        window.location = "<?php  echo base_url(); ?>Cinvoice/manage_ocean_export_tracking";
      }, 2000);
   }
); 
}
     function submit_redirect(){
        window.btn_clicked = true;      //set btn_clicked to true
        var input_hdn="Your Booking List No :"+$('#invoice_hdn1').val()+" has been Updated Successfully";
  
    console.log(input_hdn);
    $('#myModal3').modal('hide');
    $("#bodyModal1").html(input_hdn);
        $('#myModal1').modal('show');
    window.setTimeout(function(){
       

        window.location = "<?php  echo base_url(); ?>Cinvoice/manage_ocean_export_tracking";
      }, 2000);
     }

$('#final_submit').on('click', function (e) {

    window.btn_clicked = true;      //set btn_clicked to true
    var input_hdn="Your Booking  No :"+$('#invoice_hdn1').val()+" has been Updated Successfully";
  
    console.log(input_hdn);
    $("#bodyModal1").html(input_hdn);
        $('#myModal1').modal('show');
    window.setTimeout(function(){
       

        window.location = "<?php  echo base_url(); ?>Cinvoice/manage_ocean_export_tracking";
      }, 2000);
       
});

window.onbeforeunload = function(){
    if(!window.btn_clicked){
       // window.btn_clicked = true; 
        $('#myModal3').modal('show');
       return false;
    }
}
    </script>
    
    
<style>
   #files-area{
   /*  width: 30%;*/
   margin: 0 auto;
   }
   .file-block{
   border-radius: 10px;
   background-color: #38469f;
   margin: 5px;
   color: #fff;
   display: inline-flex;
   padding: 4px 10px 4px 4px;
   }
   .file-delete{
   display: flex;
   width: 24px;
   color: initial;
   background-color: #38469f;
   font-size: large;
   justify-content: center;
   margin-right: 3px;
   cursor: pointer;
   color: #fff;
   }
   span.name{
   position: relative;
   top: 2px;
   }
   .btn-primary {
   color: #fff;
   background-color: #38469f !important;
   border-color: #38469f !important;
   }
   a:active{
    color: #fff !important;
   }

   a:hover{
    color: #fff !important;
   }

   a:focus{
    color: #fff !important;
   }
 
</style>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">
   const dt = new DataTransfer(); // Permet de manipuler les fichiers de l'input file
   
   $('span.file-delete').click(function(){
           let name = $(this).next('span.name').text();
           // Supprimer l'affichage du nom de fichier
           $(this).parent().remove();
           for(let i = 0; i < dt.items.length; i++){
               // Correspondance du fichier et du nom
               if(name === dt.items[i].getAsFile().name){
                   // Suppression du fichier dans l'objet DataTransfer
                   dt.items.remove(i);
                   continue;
               }
           }
           // Mise à jour des fichiers de l'input file après suppression
           document.getElementById('attachment').files = dt.files;
       });
   
   
</script>    
    
 






