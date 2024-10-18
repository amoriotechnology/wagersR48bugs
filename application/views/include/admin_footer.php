<?php
    $CI =& get_instance();
    $CI->load->model('Web_settings');
    $Web_settings = $CI->Web_settings->retrieve_setting_editdata();
?>
<footer class="main-footer">
    <strong>
      <?php if (isset($Web_settings[0]['footer_text'])) { echo html_escape($Web_settings[0]['footer_text']); }?>
    </strong><i >
    <!-- class="fa fa-heart color-green" -->
   <span style="font-style: normal;" > 2024 © Copyright : Amorio Technologies </span>
    </i>
      <input type ="hidden" name="csrf_test_name" id="csrf_test_name" value="<?php echo $this->security->get_csrf_hash();?>">
       <input type ="hidden" name="base_url" id="base_url" value="<?php echo base_url();?>">
</footer>

  <!-- COMMON CALCULATOR MODAL -->
   <!-- calculator modal -->
    <div class="modal fade-scale" id="calculator" role="dialog">
    <div class="modal-dialog" id="calculatorcontent">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-body">
            <div class="calcontainer">
         <div class="screen">
      <h1 id="mainScreen">0</h1>
    </div>
    <table>
      <tr>
        <td><button value="7" id="7" onclick="InputSymbol(7)">7</button></td>
        <td><button value="8" id="8" onclick="InputSymbol(8)">8</button></td>
        <td><button value="9" id="9" onclick="InputSymbol(9)">9</button></td>
        <td><button onclick="DeleteLastSymbol()">CE</button></td>
      </tr>
      <tr>
        <td><button value="4" id="4" onclick="InputSymbol(4)">4</button></td>
        <td><button value="5" id="5" onclick="InputSymbol(5)">5</button></td>
        <td><button value="6" id="6" onclick="InputSymbol(6)">6</button></td>
        <td><button value="/" id="104" onclick="InputSymbol(104)">/</button></td>
      </tr>
      <tr>
        <td><button value="1" id="1" onclick="InputSymbol(1)">1</button></td>
        <td><button value="2" id="2" onclick="InputSymbol(2)">2</button></td>
        <td><button value="3" id="3" onclick="InputSymbol(3)">3</button></td>
        <td><button value="*" id="103" onclick="InputSymbol(103)">*</button></td>
      </tr>
      <tr>
        <td><button value="0" id="0" onclick="InputSymbol(0)">0</button></td>
        <td><button value="." id="128" onclick="InputSymbol(128)">.</button></td>
        <td><button value="-" id="102" onclick="InputSymbol(102)">-</button></td>
        <td><button value="+" id="101" onclick="InputSymbol(101)">+</button></td>
      </tr>
      <tr>
        <td colspan="2"><button onclick="ClearScreen()">C</button></td>
        <td colspan="1"><button onclick="CalculateTotal()">=</button></td>
        <td colspan="1"><button  data-dismiss="modal" class="btn-danger"><i class="fa fa-power-off"></i></button></td>
      </tr>
    </table>
</div>
        </div>
       
      </div>
      
    </div>
  </div>
<script type="text/javascript">
function hide()
{
setTimeout(hide, 3000);
function hide() {
 $('#myModal1').modal('hide');

}
}
</script>


<div id="emailmodal" class="modal fade" role="dialog">
  <div class="modal-dialog">
<form action="insert_role">    <!-- Modal content-->
    <div class="modal-content" style="width: 177%; !important;
    margin-left: -43%;
   " >
      <?php 
        $url = $_SERVER['REQUEST_URI']; 
        $path = parse_url($url, PHP_URL_PATH); 
        $lastPart = basename($path);
        // echo $lastPart;
      ?>
      <div class="modal-header" style="color:white;background-color:#38469f;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Email</h4>
      </div>
      <div class="modal-body">
     <div class="panel panel-default">
      <div class="panel-body message">
        <p class="text-center">Send Invoice</p>
        <form class="form-horizontal" role="form" action="dsd">
          <div class="form-group">
              <label for="to" class="col-sm-1 control-label">To:</label>
              <div class="col-sm-11">
                  <input type="text" name="" class="form-control" id="customer_emailid">
                  <br>
              </div>
            </div>
          
          <div class="form-group">    
              <label for="cc" class="col-sm-1 control-label">CC:</label>
              <div class="col-sm-11">
                <!--<input type="email" class="form-control select2-offscreen" id="cc" placeholder="Add Mail" tabindex="-1">-->
                <input type="email" placeholder="Add Mail" name="cc_email" id="inputEmail1" class="form-control">
                <br>
              </div>
            </div>
            
            <div class="form-group">
              <label for="bcc" class="col-sm-1 control-label">Subject:</label>
              <div class="col-sm-11">
                <input type="text" class="form-control select2-offscreen" id="bcc" placeholder="Add Subject" tabindex="-1" value="<?php echo $email_setting[0]['subject']; ?>">
                <br>
              </div>
            </div>
            <input type="hidden" id="get_inid" class="get_invoiceid">
            <input type="hidden" name="ocean_name" id="get_oceanid" class="get_oceanexportid">
            <input type="hidden" name="truck_name" id="get_truckingid" class="get_truck_id">
            <?php if(empty($email_settings)){ ?>
            <div class="form-group">
              <label for="bcc" class="col-sm-1 control-label"><?php if(empty($email_settings)) { echo "Include Attachment:";} else { echo "Attachment:"; } ?></label>
              <div class="col-sm-11 ocean_check_attach trucking_check_attach" id="check_attach">
               
                <?php if($lastPart == 'manage_invoice') { ?>
                  <input type="checkbox" style="position: relative; top: 8px; left: 15px;" class="form-check-input sale" name="isattachment" id="isattachment"> 

                <?php }else if($lastPart == 'manage_ocean_export_tracking'){  ?>  
                  <input type="checkbox" style="position: relative; top: 8px; left: 15px;" class="form-check-input ocean_export" name="isattachment" id="isOceanattachment"> 

                <?php }else if($lastPart == 'manage_trucking'){ ?>
                  <input type="checkbox" style="position: relative; top: 8px; left: 15px;" class="form-check-input trucking" name="isattachment" id="isTruckingattachment"> 
                <?php } ?>

                <!-- <input type="checkbox" style="position: relative; top: 8px; left: 15px;" class="form-check-input ocean_export" name="isattachment" id="isOceanattachment"> 

                 <input type="checkbox" style="position: relative; top: 8px; left: 15px;" class="form-check-input trucking" name="isattachment" id="isTruckingattachment"> --> 

              </div>
            </div>
            <?php } else{ ?>
             <div class="form-group">
              <label for="bcc" class="col-sm-1 control-label" style="position: relative; top: 8px;">Attachment:</label>
              <div class="col-sm-11 ocean_attach trucking_attach" id="attach"> 
               
              </div>
            </div>
            <?php } ?>
          
        <div class="col-sm-11 col-sm-offset-1">
          
          <div class="btn-toolbar" role="toolbar">
       
          </div>
          <br>  
          
          <div class="form-group">
            <textarea class="form-control" id="message" name="body" rows="12" ><?php echo $email_setting[0]['greeting']; ?>
              
             
              <?php echo $email_setting[0]['message']; ?>

              Regards

              <?php echo $company_info[0]['company_name']; ?>
            
              <?php echo $company_info[0]['email']; ?>
             
              <?php echo $company_info[0]['address']; ?>

            </textarea>
          </div>
          
          <div class="form-group"> 

            <img src="https://play-lh.googleusercontent.com/9XKD5S7rwQ6FiPXSyp9SzLXfIue88ntf9sJ9K250IuHTL7pmn2-ZB0sngAX4A2Bw4w" style="width: 5%">
            
                <span class="invoice_id" style="font-weight: bold;font-style: italic;">
            </span>
           
            <a  id="sendmail"  style="float: right; color: white;background-color:#38469f;" type="button" class="btn">Send Mail</a>
            </form>
          </div>
        </div>  
      </div>  
    </div>


</div>
      <div class="modal-footer">
      <p></p>
      </div>
    </div>

  </div>
</div>





<script type="text/javascript">
  function mail(id,table,col)
  {
 
 var res = id;
  var id=id+'-'+table+'-'+col;
    $('.get_invoiceid').val(res);

        var url='<?php echo base_url('Cinvoice/get_customer/'); ?>';

       $.ajax({
        url:url+id,
        type: 'GET',
        success: function(res) {
         // console.log(res);
            $('#customer_emailid').val(res);
          //  console.log(id);
            const myArray = id.split("-");
            let word = myArray[0];
            
            $("#sendmail").attr("href", "<?php echo base_url()?>Cinvoice/sendmail_with_attachments/"+word);
    
        }
    });
 
  }
</script>

<script type="text/javascript">
  function profarmamail(id,table,col)
  {

  var id=id+'-'+table+'-'+col;

   
        var url='<?php echo base_url('cinvoice/get_customer/'); ?>';

       $.ajax({
        url:url+id,
        type: 'GET',
        success: function(res) {
          
            $('#customer_emailid').val(res);
            console.log(id);
            const myArray = id.split("-");
            let word = myArray[0];
            
            $("#sendmail").attr("href", "<?php echo base_url()?>Cinvoice/proforma_with_attachment_cus/"+word);
    
        }
    });
 
  }
</script>

<script type="text/javascript">
  function packingmail(id,table,col)
  {

  var id=id+'-'+table+'-'+col;

   
        var url='<?php echo base_url('cinvoice/get_customer/'); ?>';

       $.ajax({
        url:url+id,
        type: 'GET',
        success: function(res) {
          
            $('#customer_emailid').val(res);
            console.log(id);
            const myArray = id.split("-");
            let word = myArray[0];
            
            $("#sendmail").attr("href", "<?php echo base_url()?>Cinvoice/packing_with_attachment_cus/"+word);
    
        }
    });
 
  }
</script>

<script type="text/javascript">
  function oceanexportmail(id,table,col)
  {

  var res = id;
  var id=id+'-'+table+'-'+col;
  $('.get_oceanexportid').val(res);
   
        var url='<?php echo base_url('cinvoice/get_customer/'); ?>';

       $.ajax({
        url:url+id,
        type: 'GET',
        success: function(res) {
          
            $('#customer_emailid').val(res);
            console.log(id);
            const myArray = id.split("-");
            let word = myArray[0];
            
            $("#sendmail").attr("href", "<?php echo base_url()?>Cinvoice/ocean_with_attachment_cus/"+word);
    
        }
    });
 
  }
</script>

<script type="text/javascript">
  function truckingmail(id,table,col)
  {
  
  var res = id;
  var id=id+'-'+table+'-'+col;
  $('.get_truck_id').val(res);
   
        var url='<?php echo base_url('cinvoice/get_customer/'); ?>';

       $.ajax({
        url:url+id,
        type: 'GET',
        success: function(res) {
          
            $('#customer_emailid').val(res);
            console.log(id);
            const myArray = id.split("-");
            let word = myArray[0];
            
            $("#sendmail").attr("href", "<?php echo base_url()?>Cinvoice/trucking_with_attachment_cus/"+word);
    
        }
    });
 
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
    color: #000 !important;
   }

   a:focus{
    color: #fff !important;
   }
 
</style>



<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
<script type="text/javascript">
   const dt = new DataTransfer(); // Permet de manipuler les fichiers de l'input file
   
   $('span.file-delete').click(function(){
    alert('hi');
           let name = $(this).next('span.name').text();
           $(this).parent().remove();
           for(let i = 0; i < dt.items.length; i++){
              
               if(name === dt.items[i].getAsFile().name){
                  
                   dt.items.remove(i);
                   continue;
               }
           }
          
           document.getElementById('attachment').files = dt.files;
       });

  //  $(".delete_items").click(function() {
  //   alert('hi');
  //     $(this).remove();
  // });
  

  $(document).ready(function() {
  $('#isattachment').change(function() {
    if ($(this).is(':checked')) {
    
    var rowinvoiceId = $('#get_inid').val();
    
    $.ajax({
           url:"<?php echo base_url(); ?>Cinvoice/Get_attachments",
           type: 'POST',
           dataType: 'json',
           data: {[csrfName]: csrfHash,rowinvoiceId:rowinvoiceId},
           success: function(data){
           $('#check_attach').html("");
            for(var i = 0; i < data.length; i++) {
               console.log(data[i]['files']);
               if(data[i]['files']){
                  $('#check_attach').append('<a href='+base_url+'uploads/'+encodeURI(data[i]["files"])+' class="file-block" target=_blank><span class="file-delete"><span><i class="fa fa-trash-o"></i></span></span>'+encodeURI(data[i]["files"])+'</a>');
               }else{

                  $('#check_attach').html("No attachment Found");
               }


            }

           }
       });
      
    } else {
     // alert('Checkbox is not checked');
      // Perform actions when the checkbox is not checked
    }
  });
});



$(document).ready(function() {
  $('#isOceanattachment').change(function() {
    if ($(this).is(':checked')) {
    var ocean_id = $('#get_oceanid').val();
    $.ajax({
           url:"<?php echo base_url(); ?>Cinvoice/Get_oceanattachments_view",
           type: 'POST',
           dataType: 'json',
           data: {[csrfName]: csrfHash,ocean_id:ocean_id},
           success: function(data){
           $('.ocean_check_attach').html("");
            for(var i = 0; i < data.length; i++) {
               console.log(data[i]['files']);
               if(data[i]['files']){
                  $('.ocean_check_attach').append('<a href='+base_url+'uploads/'+encodeURI(data[i]["files"])+' class="file-block" target=_blank><span class="file-delete"><span><i class="fa fa-trash-o"></i></span></span>'+encodeURI(data[i]["files"])+'</a>');
               }else{

                  $('.ocean_check_attach').html("No attachment Found");
               }


            }

           }
       });
      
    } else {
     // alert('Checkbox is not checked');
      // Perform actions when the checkbox is not checked
    }
  });
});



$(document).ready(function() {
  $('#isTruckingattachment').change(function() {
    if ($(this).is(':checked')) {
    var trucking_id = $('#get_truckingid').val();
    $.ajax({
           url:"<?php echo base_url(); ?>Cinvoice/Get_truckingattachments_view",
           type: 'POST',
           dataType: 'json',
           data: {[csrfName]: csrfHash,trucking_id:trucking_id},
           success: function(data){
           $('.ocean_check_attach').html("");
            for(var i = 0; i < data.length; i++) {
               console.log(data[i]['files']);
               if(data[i]['files']){
                  $('.ocean_check_attach').append('<a href='+base_url+'uploads/'+encodeURI(data[i]["files"])+' class="file-block" target=_blank><span class="file-delete"><span><i class="fa fa-trash-o"></i></span></span>'+encodeURI(data[i]["files"])+'</a>');
               }else{

                  $('.ocean_check_attach').html("No attachment Found");
               }


            }

           }
       });
      
    } else {
     // alert('Checkbox is not checked');
      // Perform actions when the checkbox is not checked
    }
  });
});

// $(document).ready(function() {
//     alert('running');
//     cron_job();
    
// });
//   function cron_job() {
//         var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
//         var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';
        
//         var data = {};
//         data[csrfName] = csrfHash; 
        
//         $.ajax({
//           url:'<?php echo base_url(); ?>Cweb_setting/send_mail_cronjob',
//             method: "POST",
//             data: data,
//             dataType: "json",
//           success: function(response) {
               
              
//             },
//             error: function(xhr, status, error) {
//                 console.error("AJAX Error: ", error); 
//             }
//         });
//     }
   
</script>
