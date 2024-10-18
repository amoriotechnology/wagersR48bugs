<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> --> 
<script src="<?php echo base_url() ?>my-assets/js/admin_js/product_country.js" type="text/javascript"></script>
<style>
   .btnclr{
   background-color:<?php echo $setting_detail[0]['button_color']; ?>;
   color: white;
   }
   .panel-body{
   background: #ffffff;
   }
   .box {
   position: relative;
   background: #ffffff;
   width: 100%;
   }
   .input-symbol-euro {
   position: absolute;
   font-size: 14px;
   }
   .input-symbol-euro input {
   padding-left: 18px;
   }
   .input-symbol-euro:after {
   position: absolute;
   top: 7px;
   content: '<?php echo $currency; ?>';
   left: 5px;
   }
   .box-header {
   color: #444;
   display: block;
   padding: 10px;
   position: relative;
   border-bottom: 1px solid #f4f4f4;
   margin-bottom: 10px;
   }
   .ui-selectmenu-text{
   display:none;
   }
   .box-tools {
   position: absolute;
   right: 10px;
   top: 5px;
   }
   .dropzone-wrapper {
   border: 2px dashed #91b0b3;
   color: #92b0b3;
   position: relative;
   height: 150px;
   }
   .dropzone-desc {
   position: absolute;
   margin: 0 auto;
   left: 0;
   right: 0;
   text-align: center;
   width: 40%;
   top: 50px;
   font-size: 16px;
   }
   .ui-front{
   display:none;
   }
   .removebundle, .addbundle{
   padding: 10px 12px 10px 12px;
   border-radius:5px;
   }
   .dropzone,
   .dropzone:focus {
   position: absolute;
   outline: none !important;
   width: 100%;
   height: 150px;
   cursor: pointer;
   opacity: 0;
   }
   .dropzone-wrapper:hover,
   .dropzone-wrapper.dragover {
   background: #ecf0f5;
   }
   .preview-zone {
   text-align: center;
   }
   .preview-zone .box {
   box-shadow: none;
   border-radius: 0;
   margin-bottom: 0;
   }
</style>
<!-- Product Purchase js -->
<script src="<?php echo base_url()?>my-assets/js/admin_js/json/product_purchase.js.php" ></script>
<!-- Supplier Js -->
<script src="<?php echo base_url(); ?>my-assets/js/admin_js/json/supplier.js.php" ></script>
<script src="<?php echo base_url()?>my-assets/js/admin_js/purchase.js" type="text/javascript"></script>
<script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
<script src="<?php echo base_url() ?>my-assets/js/countrypicker.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>my-assets/js/admin_js/invoice.js" type="text/javascript"></script>
<!-- Add New Purchase Start -->
<div class="content-wrapper" >
 
   <section class="content-header">
    <form id="histroy" style="display:none;" method="post" >
      <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
      <input type="hidden"   name="payment_id" class="payment_id" id="payment_id"/>
   </form>
   </section>
   <?php    $payment_id=rand(); ?>

   <input type="hidden" id="po_payment_id" value="<?php echo $payment_id; ?>"/>
   
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
      <?php 
         $this->session->unset_userdata('error_message');
         }
         ?>
      <div class="row">
         <div class="col-sm-12">
            <div class="panel panel-bd lobidrag">
               <div class="panel-heading" style="height:60px;">
                  <label for="ISF" class="col-sm-2 col-form-label"><?php echo display('Select Option');?>
                  <i class="text-danger">*</i>
                  </label>
                  <div class="col-sm-2">
                     <select name="po" class="form-control getvaluedata"  id="po" tabindex="3" >
                        <option value="" selected disabled><?php  echo display('Select Option');?></option>
                        <option value="Not Available"> <?php echo display('add_purchase'); ?></option>
                        <option value="serviceProvider"><?php echo display('Service Provider');?> </option>
                     </select>
                  </div>
                  <div class="col-sm-2">
                     <select name="expense_drop" class="form-control"  id="expense_drop" tabindex="3" >
                        <option value="" selected disabled><?php  echo display('Select Option');?></option>
                        <option value="not_found"><?php  echo 'Not Available';?></option>
                        <?php  foreach($po as $p){   ?>
                        <option value="<?php  echo $p['chalan_no'] ; ?>"><?php  echo $p['chalan_no'] ; ?></option>
                        <?php   }  ?>
                     </select>
                  </div>
                 <div class="col-sm-4" style="display: none; text-align: right;" id="addexpenses">
                     <form id="ocr" method="post" enctype="multipart/form-data">
                       <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                        <label for="form_image" class="file-upload">
                           <span><i class="fa fa-upload" aria-hidden="true"></i>&nbsp;Invoice Scan</span>
                           <input type="file" id="form_image" name="form_image" accept="image/*" required>
                        </label>
                     </form>
                  </div>

                  <div class="col-sm-4" style="display: none; text-align: right;" id="addserviceprovider">
                     <form id="ocrserviceprovider" method="post" enctype="multipart/form-data">
                       <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                        <label for="form_image" class="file-upload">
                           <span><i class="fa fa-upload" aria-hidden="true"></i>&nbsp;Invoice Scan</span>
                           <input type="file" id="form_imageservice" name="form_imageservice" class="form_imageservice" accept="image/*" required>
                        </label>
                     </form>
                  </div>
                  <div class="col-sm-2">
                     <a   href="<?php echo base_url('Cpurchase/manage_purchase') ?>" class="btnclr btn  m-b-5 m-r-2"><i class="ti-align-justify"> </i> <?php echo display('manage_expense'); ?> </a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="row"> 

      
      </div>
      <div class="row" id="main">

         <div class="col-sm-12">
            <div class="panel panel-bd lobidrag">
          
               <div class="panel-heading">
                  <div class="panel-body">
                     <div class="with_po">
                    
                        <form id="insert_purchase"  method="post">
                        </form>
                        <script>
                           $(document).ready(function(){
                                                          $('.button_hide').hide();
                                                         });
                                                         
                           
                                $(document).on('keyup','.normalinvoice tbody tr:last',function (e) {
                           var tid=$(this).closest('table').attr('id');
                           const indexLast = tid.lastIndexOf('_');
                           var id = tid.slice(indexLast + 1);
                           var $last = $('#addPurchaseItem_'+id + ' tr:last');
                           var num = id+($last.index()+1);
                           
                           $('#addPurchaseItem_'+id  + ' tr:last').clone().find('datalist,input,select').attr('id', function(i, current) {
                           return current.replace(/\d+$/, num);   
                           }).end().appendTo('#addPurchaseItem_'+id );
                           $.each($('#normalinvoice_'+id  +  '> tbody > tr'), function (index, el) {
                           $(this).find(".slab_no").val(index + 1); // Simply couse the first "prototype" is not counted in the list                
                           })
                           
                           
                           var id1= $(this).closest('tr').find('.product_name').attr('id');
                           var id_num = id1.substring(id1.indexOf('_') + 1);
                           var pdt=$('#'+id1).val();
                           console.log(pdt);
                           const myArray = pdt.split("-");
                           var product_nam=myArray[0];
                           var product_model=myArray[1];
                           var product_model=myArray[1];
                           
                           
                           var data = {
                           product_nam:product_nam,
                           product_model:product_model,
                           
                           
                           };
                           data[csrfName] = csrfHash;
                           $.ajax({
                           type:'POST',
                           data: data,
                           dataType:"json",
                           url:'<?php echo base_url();?>Cinvoice/availability',
                           success: function(result, statut) {
                           console.log(result);
                           if(result.csrfName){
                           csrfName = result.csrfName;
                           csrfHash = result.csrfHash;
                           }
                           
                           $("#SchoolHiddenId_"+ id_num).val(result[0]['product_id']);
                           console.log(result);
                           
                           
                           
                           
                           
                           }  
                           });
                           
                           var sum=0;
                           $(this).closest('table').find('.total_price').each(function() {
                           var v=$(this).val();
                           sum += parseFloat(v);
                           
                           });
                           $(this).closest('table').find('.b_total').val(sum).trigger('change');
                           
                           
                           
                           var sum=0;
                           $(this).closest('table').find('.weight').each(function() {
                           var v=$(this).val();
                           sum += parseFloat(v);
                           
                           });
                           $(this).closest('table').find('.overall_weight').val(sum).trigger('change');
                           
                           
                           
                           
                           var sum=0;
                           $(this).closest('table').find('.sales_slab_amt').each(function() {
                           var v=$(this).val();
                           sum += parseFloat(v);
                           
                           });
                           $(this).closest('table').find('.salesslabprice').val(sum).trigger('change');
                           
                           
                           var sum=0;
                           $(this).closest('table').find('.sales_amt_sq_ft').each(function() {
                           var v=$(this).val();
                           sum += parseFloat(v);
                           
                           });
                           $(this).closest('table').find('.salespricepersqft').val(sum).trigger('change');
                           
                           
                           var sum=0;
                           $(this).closest('table').find('.cost_sq_slab').each(function() {
                           var v=$(this).val();
                           sum += parseFloat(v);
                           
                           });
                           $(this).closest('table').find('.costperslab').val(sum).trigger('change');
                           
                           
                           
                           var sum=0;
                           $(this).closest('table').find('.cost_sq_ft').each(function() {
                           var v=$(this).val();
                           sum += parseFloat(v);
                           
                           });
                           $(this).closest('table').find('.costpersqft').val(sum).trigger('change');
                           
                           
                           
                           
                           var sum=0;
                           $(this).closest('table').find('.gross_sq_ft ').each(function() {
                           var v=$(this).val();
                           sum += parseFloat(v);
                           
                           });
                           $(this).closest('table').find('.overall_gross').val(sum).trigger('change');
                           
                           var sum=0;
                           $(this).closest('table').find('.net_sq_ft').each(function() {
                           var v=$(this).val();
                           sum += parseFloat(v);
                           
                           });
                           $(this).closest('table').find('.overall_net').val(sum).trigger('change');
                           
                           
                           
                           var overall_sum=0;
                           $('.table').find('.total_price').each(function() {
                           var v=$(this).val();
                           if (!isNaN(v) && v.length !== 0) {
                           overall_sum += parseFloat(v);
                           }
                           }); 
                           $('#Over_all_Total').val(overall_sum.toFixed(2)).trigger('change');
                           $('#gtotal').val(overall_sum.toFixed(2)).trigger('change');
                           $('#vendor_gtotal').val(overall_sum.toFixed(2)).trigger('change');
                           
                           
                           var overall_gs=0;
                           $('.table').find('.gross_sq_ft').each(function() {
                           var v=$(this).val();
                           overall_gs += parseFloat(v);
                           }); 
                           $('#total_gross').val(overall_gs.toFixed(2)).trigger('change');
                           
                           
                           var total_net=0;
                           $('.table').find('.net_sq_ft').each(function() {
                           var v=$(this).val();
                           total_net += parseFloat(v);
                           }); 
                           $('#total_net').val(total_net.toFixed(2)).trigger('change');
                           
                           
                           var overall_weight=0;
                           $('.table').find('.weight').each(function() {
                           var v=$(this).val();
                           overall_weight += parseFloat(v);
                           }); 
                           $('#total_weight').val(overall_weight.toFixed(2)).trigger('change');
                           
                           
                           
                           
                           
                           
                           
                           
                           
                           calculate_ONROWADD();
                           
                           });
                           
                           
                           function calculate_ONROWADD(){
                           
                           var total=$('#Over_all_Total').val();
                           var tax= $('#product_tax').val();
                           var percent='';
                           var hypen='-';
                           if(tax.indexOf(hypen) != -1){
                           var field = tax.split('-');
                           var percent = field[1];
                           
                           }else{
                           percent=tax;
                           }
                           percent=percent.replace("%","");
                           var answer = (percent / 100) * parseFloat(total);
                           var gtotal = parseFloat(total + answer);//fix
                           console.log("gtotal :" +gtotal);
                           var final_g= $('#final_gtotal').val();
                           var amt=parseFloat(answer)+parseFloat(total);
                           var num = isNaN(parseFloat(amt)) ? 0 : parseFloat(amt)
                           $('#gtotal').val(num.toFixed(2)); 
                           var custo_amt=$('.custocurrency_rate').val(); 
                           console.log("numhere :"+num +"-"+custo_amt);
                           var value=num*custo_amt;
                           var custo_final = isNaN(parseFloat(value)) ? 0 : parseFloat(value)
                           $('#customer_gtotal').val(custo_final.toFixed(2)); 
                           $('#tax_details').val(answer.toFixed(2) +" ( "+tax+" )");
                           var bal_amt=custo_final-$('#amount_paid').val();
                           $('#balance').val(bal_amt.toFixed(2));
                           
                           }
                           
                           
                           $(document).on('click', '.removebundle', function(){
                           var netheight = $(this).attr('id');
                           const indexLastDot = netheight.lastIndexOf('_');
                           var id = netheight.slice(indexLastDot + 1);
                           var tid=$(this).closest('table').attr('id');
                           localStorage.setItem("delete_table",tid);
                           console.log(localStorage.getItem("delete_table"));
                           var remove_id=$(this).closest('table').attr('id');
                           $('#'+remove_id).remove();
                           var sum=0;
                           $('#'+localStorage.getItem("delete_table")).find('.total_price').each(function() {
                           var v=$(this).val();
                           sum += parseFloat(v);
                           });
                           $('#'+localStorage.getItem("delete_table")).find('.b_total').val(sum).trigger('change');
                           var sumnet=0;
                           
                           $('#'+localStorage.getItem("delete_table")).find('.net_sq_ft').each(function() {
                           var v=$(this).val();
                           if (!isNaN(v) && v.length !== 0) {
                           sumnet += parseFloat(v);
                           }
                           
                           });
                           $('#'+localStorage.getItem("delete_table")).find('.overall_net').val(sumnet.toFixed(3));
                           
                           
                           var sumgross=0;
                           
                           $('#'+localStorage.getItem("delete_table")).find('.gross_sq_ft').each(function() {
                           var v=$(this).val();
                           if (!isNaN(v) && v.length !== 0) {
                           sumgross += parseFloat(v);
                           }
                           });
                           $('#'+localStorage.getItem("delete_table")).find('.overall_gross').val(sumgross.toFixed(3));
                           var total_net=0;
                           $('.table').each(function() {
                           $(this).find('.net_sq_ft').each(function() {
                           var precio = $(this).val();
                           if (!isNaN(precio) && precio.length !== 0) {
                           total_net += parseFloat(precio);
                           }
                           });
                           
                           
                           //   });
                           
                           });
                           $('#total_net').val(total_net.toFixed(3)).trigger('change');
                           var overall_gs=0;
                           $('.table').each(function() {
                           $(this).find('.gross_sq_ft').each(function() {
                           var precio = $(this).val();
                           if (!isNaN(precio) && precio.length !== 0) {
                           overall_gs += parseFloat(precio);
                           }
                           });
                           });
                           
                           $('#total_gross').val(overall_gs).trigger('change');
                           var sum_w=0;
                           $('#'+localStorage.getItem("delete_table")).find('.weight').each(function() {
                           var precio = $(this).val();
                           if (!isNaN(precio) && precio.length !== 0) {
                           sum_w += parseFloat(precio);
                           }
                           });
                           $('#'+localStorage.getItem("delete_table")).find('.overall_weight').val(sum_w).trigger('change');
                           var total_w=0;
                           $('.table').each(function() {
                           $(this).find('.weight').each(function() {
                           var precio = $(this).val();
                           if (!isNaN(precio) && precio.length !== 0) {
                           total_w += parseFloat(precio);
                           }
                           });
                           
                           });
                           $('#total_weight').val(total_w.toFixed(3)).trigger('change');
                           var overall_sum=0;
                           $('.table').find('.total_price').each(function() {
                           var v=$(this).val();
                           if (!isNaN(v) && v.length !== 0) {
                           overall_sum += parseFloat(v);
                           }
                           });
                           $('#Over_all_Total').val(overall_sum.toFixed(3)).trigger('change');
                           localStorage.removeItem("delete_table");
                           
                           var first=$("#Over_all_Total").val();
                           var tax= $('#product_tax').val();
                           var percent='';
                           var hypen='-';
                           if(tax.indexOf(hypen) != -1){
                           var field = tax.split('-');
                           
                           var percent = field[1];
                           
                           }else if(tax=='Select the Tax'){
                           
                           percent="0";
                           }
                           
                           else{
                           percent=tax;
                           }
                           percent=percent.replace("%","");
                           // var field = tax.split('-');
                           
                           // var percent = field[1];
                           var answer=0;
                           var answer =(parseInt(percent) / 100) * parseInt(first);
                           console.log(answer);
                           $('#tax_details').val(answer.toFixed(3) +" ( "+tax+" )");
                           
                           //  $('#tax_detail').val(answer.toFixed(3) +" ( "+tax+" )");
                           
                           var gtotal = parseInt(first + answer);
                           console.log(gtotal);
                           var amt=parseInt(answer)+parseInt(first);
                           var num = isNaN(parseInt(amt)) ? 0 : parseInt(amt)
                           var custo_amt=$('.custocurrency_rate').val();
                           $("#gtotal").val(num);  
                           console.log(num +"-"+custo_amt);
                           localStorage.setItem("customer_grand_amount_sale",num);
                           
                           var value=num*custo_amt;
                           var custo_final = isNaN(parseInt(value)) ? 0 : parseInt(value)
                           $('#vendor_gtotal').val(custo_final);
                           var bal_amt=custo_final-$('#amount_paid').val();
                           $('#balance').val(bal_amt);
                           
                           });
                           $(document).on('click', '.delete1', function(){
                           
                           
                           var tid=$(this).closest('table').attr('id');
                           localStorage.setItem("delete_table",tid);
                           console.log(localStorage.getItem("delete_table"));
                           var netheight = $('#'+localStorage.getItem("delete_table")).find('.net_height').attr('id');
                           const indexLastDot = netheight.lastIndexOf('_');
                           var id = netheight.slice(indexLastDot + 1);
                           var rowCount = $(this).closest('tbody').find('tr').length;
                           
                           if(rowCount>1){
                           $(this).closest('tr').remove();
                           }
                           
                           var costpersqft=0;
                           $('#'+localStorage.getItem("delete_table")).find('.cost_sq_ft').each(function() {
                           var precio = $(this).val();
                           if (!isNaN(precio) && precio.length !== 0) {
                           costpersqft += parseFloat(precio);
                           }
                           });
                           $('#'+localStorage.getItem("delete_table")).find('.costpersqft').val(costpersqft.toFixed(2)).trigger('change');
                           var cost_sq_slab=0;
                           $('#'+localStorage.getItem("delete_table")).find('.cost_sq_slab').each(function() {
                           var precio = $(this).val();
                           if (!isNaN(precio) && precio.length !== 0) {
                           cost_sq_slab += parseFloat(precio);
                           }
                           });
                           $('#'+localStorage.getItem("delete_table")).find('.costperslab').val(cost_sq_slab.toFixed(2)).trigger('change');
                           var sales_amt_sq_ft=0;
                           $('#'+localStorage.getItem("delete_table")).find('.sales_amt_sq_ft').each(function() {
                           var precio = $(this).val();
                           if (!isNaN(precio) && precio.length !== 0) {
                           sales_amt_sq_ft += parseFloat(precio);
                           }
                           });
                           $('#'+localStorage.getItem("delete_table")).find('.salespricepersqft').val(sales_amt_sq_ft.toFixed(2)).trigger('change');
                           var sales_slab_amt=0;
                           $('#'+localStorage.getItem("delete_table")).find('.sales_slab_amt').each(function() {
                           var precio = $(this).val();
                           if (!isNaN(precio) && precio.length !== 0) {
                           sales_slab_amt += parseFloat(precio);
                           }
                           });
                           $('#'+localStorage.getItem("delete_table")).find('.salesslabprice').val(sales_slab_amt).trigger('change');
                           var sum=0;
                           $('#'+localStorage.getItem("delete_table")).find('.total_price').each(function() {
                           var v=$(this).val();
                           sum += parseFloat(v);
                           });
                           $('#'+localStorage.getItem("delete_table")).find('.b_total').val(sum.toFixed(2)).trigger('change');
                           var sumnet=0;
                           
                           $('#'+localStorage.getItem("delete_table")).find('.net_sq_ft').each(function() {
                           var v=$(this).val();
                           if (!isNaN(v) && v.length !== 0) {
                           sumnet += parseFloat(v);
                           }
                           
                           });
                           $('#'+localStorage.getItem("delete_table")).find('.overall_net').val(sumnet.toFixed(3));
                           
                           
                           var sumgross=0;
                           
                           $('#'+localStorage.getItem("delete_table")).find('.gross_sq_ft').each(function() {
                           var v=$(this).val();
                           if (!isNaN(v) && v.length !== 0) {
                           sumgross += parseFloat(v);
                           }
                           
                           });
                           $('#'+localStorage.getItem("delete_table")).find('.overall_gross').val(sumgross.toFixed(3));
                           var total_net=0;
                           $('.table').each(function() {
                           $(this).find('.net_sq_ft').each(function() {
                           var precio = $(this).val();
                           if (!isNaN(precio) && precio.length !== 0) {
                           total_net += parseFloat(precio);
                           }
                           });
                           
                           
                           
                           
                           });
                           $('#total_net').val(total_net.toFixed(2)).trigger('change');
                           var overall_gs=0;
                           $('.table').each(function() {
                           $(this).find('.gross_sq_ft').each(function() {
                           var precio = $(this).val();
                           if (!isNaN(precio) && precio.length !== 0) {
                           overall_gs += parseFloat(precio);
                           }
                           });
                           });
                           
                           $('#total_gross').val(overall_gs).trigger('change');
                           var sum_w=0;
                           $('.table').each(function() {
                           $(this).find('.weight').each(function() {
                           
                           var precio = $(this).val();
                           if (!isNaN(precio) && precio.length !== 0) {
                           sum_w += parseFloat(precio);
                           }
                           });
                           });
                           $('#'+localStorage.getItem("delete_table")).find('.overall_weight').val(sum_w.toFixed(2)).trigger('change');
                           var total_w=0;
                           $('.table').each(function() {
                           $(this).find('.overall_weight').each(function() {
                           var precio = $(this).val();
                           if (!isNaN(precio) && precio.length !== 0) {
                           total_w += parseFloat(precio);
                           }
                           });
                           
                           });
                           $('#total_weight').val(total_w.toFixed(3)).trigger('change');
                           var overall_sum=0;
                           $('.table').each(function() {
                           $(this).find('.b_total').each(function() {
                           
                           var v=$(this).val();
                           overall_sum += parseFloat(v);
                           
                           });});
                           $('#Over_all_Total').val(overall_sum.toFixed(2)).trigger('change');
                           
                           
                           
                           gt(id);
                           
                           
                           
                           
                           
                           });
                           
                           
                           
                           
                           $(document).on('change','#product_tax', function (e) {
                           var total=$('#Over_all_Total').val();
                           var tax= $('#product_tax').val();
                           
                           
                           
                           var percent='';
                           var hypen='-';
                           if(tax.indexOf(hypen) != -1){
                           var field = tax.split('-');
                           
                           var percent = field[1];
                           
                           }else if(tax=='Select the Tax'){
                           
                           percent="0";
                           }
                           
                           else{
                           percent=tax;
                           }
                           percent=percent.replace("%","");
                           var answer = (percent / 100) * parseFloat(total);
                           
                           
                           var gtotal = parseFloat(total + answer);
                           console.log("gtotal :" +gtotal);
                           
                           
                           
                           var final_g= $('#final_gtotal').val();
                           
                           
                           var amt=parseFloat(answer)+parseFloat(total);
                           var num = isNaN(parseFloat(amt)) ? 0 : parseFloat(amt)
                           $('#gtotal').val(num); 
                           var custo_amt=$('.custocurrency_rate').val(); 
                           console.log("numhere :"+num +"-"+custo_amt);
                           var value=num*custo_amt;
                           var custo_final = isNaN(parseFloat(value)) ? 0 : parseFloat(value)
                           $('#vendor_gtotal').val(custo_final);  
                           calculate1();
                           });
                           function calculate1(){
                           
                           var total=$('#Over_all_Total').val();
                           var tax= $('#product_tax').val();
                           var percent='';
                           var hypen='-';
                           if(tax.indexOf(hypen) != -1){
                           var field = tax.split('-');
                           
                           var percent = field[1];
                           
                           }else if(tax=='Select the Tax'){
                           
                           percent="0";
                           }
                           
                           else{
                           percent=tax;
                           }
                           percent=percent.replace("%","");
                           var answer = (percent / 100) * parseFloat(total);
                           
                           
                           var gtotal = parseFloat(total + answer);
                           console.log("gtotal :" +gtotal);
                           
                           
                           
                           var final_g= $('#final_gtotal').val();
                           
                           
                           var amt=parseFloat(answer)+parseFloat(total);
                           var num = isNaN(parseFloat(amt)) ? 0 : parseFloat(amt)
                           $('#gtotal').val(num); 
                           var custo_amt=$('.custocurrency_rate').val(); 
                           console.log("numhere :"+num +"-"+custo_amt);
                           var value=num*custo_amt;
                           var custo_final = isNaN(parseFloat(value)) ? 0 : parseFloat(value)
                           $('#vendor_gtotal').val(custo_final); 
                           $('#tax_details').val(answer.toFixed(2) +" ( "+tax+" )");
                           
                           // $('#tax_detail').val(answer.toFixed(3) +" ( "+tax+" )");
                           
                           var bal_amt=custo_final-$('#amount_paid').val();
                           $('#balance').val(bal_amt);
                           
                           }
                           $(document).on('keyup', '.net_height,.net_width', function(){
                           
                           var tid=$(this).closest('table').attr('id');
                           const indexLast1 = tid.lastIndexOf('_');
                           var idt = tid.slice(indexLast1 + 1);
                           var netheight = $(this).attr('id');
                           const indexLastDot = netheight.lastIndexOf('_');
                           var id = netheight.slice(indexLastDot + 1);
                           var net_width='net_width_'+id;
                           var net_height = 'net_height_'+ id;
                           var netwidth=$('#'+net_width).val();
                           var netheight=$('#'+net_height).val();
                           var netresult=parseFloat(netwidth) * parseFloat(netheight);
                           netresult=netresult/144;
                           netresult = isNaN(netresult) ? 0 : netresult;
                           var nresult=netresult.toFixed(3);
                           $('#'+'net_sq_ft_'+id).val(netresult.toFixed(3));
                           var cost_sq_slab=$('#cost_sq_slab_'+id).val();
                           var tid=$(this).closest('table').attr('id');
                           const indexLast = tid.lastIndexOf('_');
                           var idt = tid.slice(indexLast + 1);
                           var cost_amt_sq_ft=cost_sq_slab / nresult;
                           cost_amt_sq_ft = isNaN(cost_amt_sq_ft) ? 0 : cost_amt_sq_ft;
                           $('#'+'cost_sq_ft_'+id).val(cost_amt_sq_ft.toFixed(3));
                           
                           
                           var cost_sq_slab=$('#sales_slab_amt_'+id).val();
                           var tid=$(this).closest('table').attr('id');
                           const indexLast2 = tid.lastIndexOf('_');
                           var idt = tid.slice(indexLast2 + 1);
                           var cost_amt_sq_ft=cost_sq_slab / nresult;
                           cost_amt_sq_ft = isNaN(cost_amt_sq_ft) ? 0 : cost_amt_sq_ft;
                           $('#'+'sales_amt_sq_ft_'+id).val(cost_amt_sq_ft.toFixed(3));
                           
                           
                           
                           
                           var sumnet=0;
                           $(this).closest('table').find('.net_sq_ft').each(function() {
                           var v=$(this).val();
                           if (!isNaN(v) && v.length !== 0) {
                           sumnet += parseFloat(v);
                           }
                           
                           });
                           $('#overall_net_'+idt).val(sumnet.toFixed(3));
                           var total_net=0;
                           $('.table').each(function() {
                           $(this).find('.net_sq_ft').each(function() {
                           var precio = $(this).val();
                           if (!isNaN(precio) && precio.length !== 0) {
                           total_net += parseFloat(precio);
                           }
                           });
                           
                           
                           
                           
                           });
                           $('#total_net').val(total_net.toFixed(3)).trigger('change');
                           
                           
                           var sum=0;
                           
                           $(this).closest('table').find('.total_price').each(function() {
                           var v=$(this).val();
                           sum += parseFloat(v);
                           
                           });
                           
                           var overall_sum=0;
                           $('.table').each(function() {
                           $(this).find('.total_price').each(function() {
                           var precio = $(this).val();
                           if (!isNaN(precio) && precio.length !== 0) {
                           overall_sum += parseFloat(precio);
                           }
                           });
                           
                           
                           
                           
                           });
                           
                           $('#Over_all_Total').val(overall_sum.toFixed(3)).trigger('change');
                           $('#Total_'+idt).val(sum);
                           var s=0;
                           $(this).closest('table').find('.cost_sq_ft').each(function() {
                           var precio = $(this).val();
                           if (!isNaN(precio) && precio.length !== 0) {
                           s += parseFloat(precio);
                           }
                           });
                           $(this).closest('table').find('.costpersqft').val(s).trigger('change');
                           calculate1();
                           });
                           
                           $(document).on('input', '.gross_height,.gross_width', function(){
                           
                           var netheight = $(this).attr('id');
                           const indexLastDot = netheight.lastIndexOf('_');
                           var id = netheight.slice(indexLastDot + 1);
                           var net_width='gross_width_'+id;
                           var net_height = 'gross_height_'+ id;
                           var tid=$(this).closest('table').attr('id');
                           const indexLast = tid.lastIndexOf('_');
                           var idt = tid.slice(indexLast + 1);
                           var netwidth=$('#'+net_width).val();
                           var netheight=$('#'+net_height).val();
                           var netresult=parseInt(netwidth) * parseInt(netheight);
                           netresult=netresult/144;
                           netresult = isNaN(netresult) ? 0 : netresult;
                           var nresult=netresult.toFixed(3);
                           
                           $('#'+'gross_sq_ft_'+id).val(netresult.toFixed(3));
                           
                           var sumgross=0;
                           
                           $(this).closest('table').find('.gross_sq_ft').each(function() {
                           var v=$(this).val();
                           if (!isNaN(v) && v.length !== 0) {
                           sumgross += parseFloat(v);
                           }
                           
                           });
                           $('#overall_gross_'+idt).val(sumgross.toFixed(3));
                           
                           
                           var overall_gs=0;
                           $('.table').each(function() {
                           $(this).find('.gross_sq_ft').each(function() {
                           var precio = $(this).val();
                           if (!isNaN(precio) && precio.length !== 0) {
                           overall_gs += parseFloat(precio);
                           }
                           });
                           });
                           
                           $('#total_gross').val(overall_gs).trigger('change');
                           
                           gt1(id);
                           
                           });
                           function gt1(id){
                           
                           var final_g= $('#final_gtotal').val();
                           
                           var first=$("#Over_all_Total").val();
                           var tax= $('#product_tax').val();
                           var percent='';
                           var hypen='-';
                           if(tax.indexOf(hypen) != -1){
                           var field = tax.split('-');
                           
                           var percent = field[1];
                           
                           }else if(tax=='Select the Tax'){
                           
                           percent="0";
                           }
                           
                           else{
                           percent=tax;
                           }
                           percent=percent.replace("%","");
                           // var field = tax.split('-');
                           
                           // var percent = field[1];
                           var answer=0;
                           answer =(parseInt(percent) / 100) * parseInt(first);
                           answer = isNaN(parseInt(answer)) ? 0 : parseInt(answer);
                           console.log(answer);
                           $('#tax_details').val(answer.toFixed(3) +" ( "+tax+" )");
                           
                           
                           //  $('#tax_detail').val(answer.toFixed(3) +" ( "+tax+" )");
                           
                           
                           var gtotal = parseInt(first + answer);
                           console.log(gtotal);
                           var amt=parseInt(answer)+parseInt(first);
                           var num = isNaN(parseInt(amt)) ? 0 : parseInt(amt)
                           var custo_amt=$('.custocurrency_rate').val();
                           $("#gtotal").val(num.toFixed(2));  
                           console.log(num +"-"+custo_amt);
                           localStorage.setItem("customer_grand_amount_sale",num);
                           
                           var value=num*custo_amt;
                           var custo_final = isNaN(parseInt(value)) ? 0 : parseInt(value)
                           $('#vendor_gtotal').val(custo_final.toFixed(2));
                           var bal_amt=custo_final-$('#amount_paid').val();
                           $('#balance').val(bal_amt.toFixed(2));
                           
                           
                           
                           }
                           
                           
                           
                           
                           
                           
                           
                           
                           
                           $('#add_payment_info').submit(function (event) {    
                           var dataString = {
                           dataString : $("#add_payment_info").serialize()
                           };
                           dataString[csrfName] = csrfHash;
                           
                           $.ajax({
                           type:"POST",
                           dataType:"json",
                           url:"<?php echo base_url(); ?>Cinvoice/add_payment_info",
                           data:$("#add_payment_info").serialize(),
                           
                           success:function (data) {
                           $('.amt').show();
                           
                           $('#payment_modal').modal('hide');
                           $("#bodyModal1").html("<?php echo display('Payment Successfully Completed');?>");
                           $('#myModal1').modal('show');
                           
                           window.setTimeout(function(){
                           $('#myModal1').modal('hide');
                           },2500);
                           
                           
                           
                           var dataString = {
                           dataString : $("#histroy").serialize()
                           
                           };
                           dataString[csrfName] = csrfHash;
                           
                           $.ajax({
                           type:"POST",
                           dataType:"json",
                           url:"<?php echo base_url(); ?>Cpurchase/payment_history_purchase",
                           data:$("#histroy").serialize(),
                           
                           success:function (data) {
                           console.log(data);
                           var gt=$('#vendor_gtotal').val();
                           var amtpd=data.amt_paid;
                           console.log(data);
                           var bal= $('#vendor_gtotal').val() - data.amt_paid;
                           $('#balance').val(bal);
                           $('#amount_paid').val(amtpd);
                           var t_rate=$('.custocurrency_rate').val();
                           document.getElementById("paid_convert").value=
                           (amtpd /t_rate ).toFixed(2);
                           document.getElementById("bal_convert").value=
                           (bal /t_rate ).toFixed(2);
                           
                           }
                           });
                           $('#add_payment_info')[0].reset();
                           }
                           
                           });
                           event.preventDefault();
                           });
                             
                           
                           function paypls(){
                           
                           $('#amount_to_pay').val($('#vendor_gtotal').val()-$('#amount_paid').val());
                           $('#payment_modal').modal('show');
                           
                           }
                           
                           
                           
                           
                           $('#final_submit1').on('click', function (e) {
                           
                           //  window.btn_clicked = true;      //set btn_clicked to true
                           var input_hdn="<?php echo  display('Your Invoice No')." :";?>"+$('#invoice_hdn').val()+"<?php echo  " ".display('has been saved Successfully');?>";
                           
                           console.log(input_hdn);
                           
                           $("#bodyModal1").html(input_hdn);
                           $('#myModal1').modal('show');
                           window.setTimeout(function(){
                           $('.modal').modal('hide');
                           
                           $('.modal-backdrop').remove();
                           },2500);
                           window.setTimeout(function(){
                           
                           
                           window.location = "<?php  echo base_url(); ?>Cpurchase/manage_purchase";
                           }, 2500);
                           
                           });
                           
                           
                                                    
                        </script>
                     </div>
                     <div class="without_po">
                        <form id="insert_purchase1"  method="post">
                           <div class="row">
                              <div class="col-sm-6">
                                 <br/>
                                 <div class="form-group row">
                                    <label for="supplier_sss" class="col-sm-4 col-form-label"><?php echo display('Vendor');?>
                                    <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-7">
                                       <select name="supplier_id" id="supplier_id" class="form-control vendorNAME"  style="border:2px solid #d7d4d6;width:100%;"     required=""  tabindex="1">
                                          <option value=" "><?php echo display('select_one') ?></option>
                                          {all_supplier}
                                          <option value="{supplier_id}">{supplier_name}</option>
                                          {/all_supplier}
                                       </select>
                                    </div>
                                    <?php //if($this->permission1->method('add_supplier','create')->access()){ ?>
                                    <div class="col-sm-1 mobile_vendor">
                                       <a  class="btnclr client-add-btn btn  " aria-hidden="true"  style="margin-left:23px;"  data-toggle="modal"data-target="#add_vendor"><i class="fa fa-user"></i></a>
                                    </div>
                                    <?php// }?> 
                                 </div>
                                 <div class="form-group row">
                                    <label for="" class="col-sm-4 col-form-label" ><?php echo display('Vendor Type');?></label>
                                    <div class="col-sm-8">
                                       <input type="vendor_type" tabindex="3" class="form-control" name="vendor_type"  style="WIDTH: 100%;border:2px solid #d7d4d6;" placeholder="" id="vendor_type_details" />
                                    </div>
                                 </div>
                              </div>
                              <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                              <input type="hidden"    class="payment_id" name="payment_id"/>
                              <div class="col-sm-6">
                                 <br/>
                                 <div class="form-group row">
                                    <label for="" class="col-sm-4 col-form-label"> <?php echo display('Vendor Address');?>
                                    <i class="text-danger"></i>
                                    </label>
                                    <div class="col-sm-8">
                                       <textarea class="form-control vendorAddress" tabindex="4" id="vendor_add" rows="4" cols="50"  style="border:2px solid #d7d4d6;" name="vendor_add" placeholder="" rows="1" required></textarea>
                                       <div id="loadingText" class="loading-text"></div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-sm-6" id="">
                                 <div class="form-group row">
                                    <label for="date" class="col-sm-4 col-form-label"><?php echo display('invoice_no');  ?><i class="text-danger">*</i></label>
                                    <div class="col-sm-8">
                                       <input  class=" form-control" type="" size="50"     style="border:2px solid #d7d4d6;"   name="invoice_no" id="invoice_no" required value="" tabindex="4" />
                                       <div id="loadingText" class="loading-text"></div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-sm-6" id="">
                                 <div class="form-group row">
                                    <label for="text" class="col-sm-4 col-form-label"><?php echo display('Expenses / Bill date');?>
                                    <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-5">
                                       <input type="date"  style="width:165%;border:2px solid #d7d4d6;" required tabindex="2" class="form-control datepicker" name="bill_date"  placeholder="Expenses/Billdate"  value="" id="date"  />
                                       <div id="loadingText" class="loading-text"></div>
                                    </div>
                                 </div>
                              </div>
                           </div>




                           <div class="row">
                              <div class="col-sm-6">


                                 <div class="form-group row">
                                    <label for="port_of_discharge" class="col-sm-4 col-form-label"> <?php echo display('Port Of Discharge');?></label>
                                    <div class="col-sm-8">
                                       <input class="form-control" type="" size="50"  style="border:2px solid #d7d4d6;" name="Port_of_discharge" id="date1"   tabindex="4" />
                                    </div>
                                 </div>



                               
                             
                                   <div class="form-group row">
                                    <label for="billing_address" class="col-sm-4     col-form-label"><?php echo display('Payment Terms');?>
                                    <i class="text-danger">*</i></label>
                                    <div class="col-sm-7">
                                       <select   name="payment_terms" id="payment_terms" style="width:100%;border:2px solid #d7d4d6;" class=" form-control" required placeholder='Payment Terms' id="payment_terms">
                                          <option value=""><?php echo display('Select Payment Terms');?></option>
                                          <option value="CAD">CAD</option>
                                          <option value="COD">COD</option>
                                          <option value="ADVANCE"><?php echo display('ADVANCE');?></option>
                                          <option value="7DAYS">7<?php echo display('DAYS');?></option>
                                          <option value="15DAYS">15<?php echo display('DAYS');?></option>
                                          <option value="30DAYS">30<?php echo display('DAYS');?></option>
                                          <option value="45DAYS">45<?php echo display('DAYS');?></option>
                                          <option value="60DAYS">60<?php echo display('DAYS');?></option>
                                          <option value="75DAYS">75<?php echo display('DAYS');?></option>
                                          <option value="90DAYS">90<?php echo display('DAYS');?></option>
                                          <option value="180DAYS">180<?php echo display('DAYS');?></option>
                                          <?php foreach($payment_terms as $inv){ ?>
                                          <option value="<?php echo $inv['payment_terms'] ; ?>"><?php echo $inv['payment_terms'] ; ?></option>
                                          <?php    }?>
                                       </select>
                                    </div>
                                    <div class="col-sm-1 mobile_vendor">
                                       <a href="#" class="btnclr client-add-btn btn " aria-hidden="true"  style="margin-left:23px;"   data-toggle="modal" data-target="#payment_type_new" ><i class="fa fa-plus"></i></a>
                                    </div>
                                 </div>  

                               


                                 <input type="hidden" id="hidden_weight" name="hidden_weight"/>


                               


                                 <div class="form-group row">
                                    <label for="account_category" class="col-sm-4 col-form-label">Account Category</label>
                                    <div class="col-sm-8">
                                       <select id="ddl"  name="account_category" class="form-control" style="border:2px solid #d7d4d6;"  onchange="configureDropDownLists(this,document.getElementById('ddl2'))">
                                          <option value="">Select the Account Category</option>
                                          <option value="ASSETS"><?php echo  display('ASSETS');?></option>
                                          <option value="RECEIVABLES"><?php echo  display('RECEIVABLES');?></option>
                                          <option value="INVENTORIES"><?php echo  display('INVENTORIES');?></option>
                                          <option value="PREPAID EXPENSES & OTHER CURRENT ASSETS"><?php echo  display('PREPAID EXPENSES & OTHER CURRENT ASSETS');?></option>
                                          <option value="PROPERTY PLANT & EQUIPMENT"><?php echo  display('PROPERTY PLANT & EQUIPMENT');?></option>
                                          <option value="ACCUMULATED DEPRECIATION & AMORTIZATION"><?php echo  display('ACCUMULATED DEPRECIATION & AMORTIZATION');?></option>
                                          <option value="NON – CURRENT RECEIVABLES"><?php echo  display('NON – CURRENT RECEIVABLES');?></option>
                                          <option value="INTERCOMPANY RECEIVABLES & OTHER NON-CURRENT ASSETS"><?php echo  display('INTERCOMPANY RECEIVABLES & OTHER NON-CURRENT ASSETS');?></option>
                                          <option value="LIABILITIES & PAYABLES"><?php echo  display('LIABILITIES & PAYABLES');?></option>
                                          <option value="ACCRUED COMPENSATION & RELATED ITEMS"><?php echo  display('ACCRUED COMPENSATION & RELATED ITEMS');?></option>
                                          <option value="OTHER ACCRUED EXPENSES"><?php echo  display('OTHER ACCRUED EXPENSES');?></option>
                                          <option value="ACCRUED TAXES"><?php echo  display('ACCRUED TAXES');?></option>
                                          <option value="DEFERRED TAXES"><?php echo  display('DEFERRED TAXES');?></option>
                                          <option value="LONG-TERM DEBT"><?php echo  display('LONG-TERM DEBT');?></option>
                                          <option value="INTERCOMPANY PAYABLES & OTHER NON CURRENT LIABILITIES & OWNERS EQUITIES"><?php echo  display('INTERCOMPANY PAYABLES & OTHER NON CURRENT LIABILITIES & OWNERS EQUITIES');?></option>
                                          <option value="REVENUE"><?php echo  display('REVENUE');?></option>
                                          <option value="COST OF GOODS SOLD"><?php echo  display('COST OF GOODS SOLD');?></option>
                                          <option value="OPERATING EXPENSES"><?php echo  display('OPERATING EXPENSES');?></option>
                                       </select>
                                    </div>
                                 </div>






                           


                                 <div class="form-group row">
                                    <label  class="col-sm-4 col-form-label">Account Subcategory</label>
                                    <div class="col-sm-8">
                                       <input class="form-control" name ="account_subcat" id="account_subcat" type="text"  style="border:2px solid #d7d4d6;"  placeholder=" Account Sub Category"  tabindex="1" >
                                    </div>
                                 </div>
                                 <div class="form-group row">
                                    <label for="invoice_no" class="col-sm-4 col-form-label"><?php echo display('Estimated Time Of Arrival');?>
                                    </label>
                                    <div class="col-sm-8">
                                       <input type="date"  tabindex="2" class="form-control datepicker productETA" style="border:2px solid #d7d4d6;" name="eta" value="<?php echo $date1; ?>" id="date1"  />
                                       <div id="loadingText" class="loading-text"></div>
                                    </div>
                                 </div>
                       

                                 <div class="form-group row">
                                    <label for="date" class="col-sm-4 col-form-label"><?php echo display('B/L No');?> </label>
                                    <div class="col-sm-8">
                                       <input type="text" name="bl_number" class="form-control" style="border:2px solid #d7d4d6;"   placeholder="Bl Number">
                                    </div>
                                 </div>

 





                           
    
                                 <div class="form-group row">
                                    <label for="supplier_sss" class="col-sm-4 col-form-label">Attachments
                                    </label>
                                   
                                    <div class="col-sm-6">
                                       <p>
                                          <label for="attachment">
                                          <a class="btn btnclr text-light" role="button" aria-disabled="false"><i class="fa fa-upload"></i>&nbsp; Choose Files</a>
                                          </label>
                                          <input type="file" name="files[]" class="upload" id="attachment" style="visibility: hidden; position: absolute;" multiple/>
                                       </p>
                                       <p id="files-area">
                                          <span id="filesList">
                                          <span id="files-names"></span>
                                          </span>
                                       </p>
                                    </div>
                                 </div>

                  
                        
                              </div>
                              <div class="col-sm-6">
                           


                                 <div class="form-group row">
                                    <label for="date" class="col-sm-4 col-form-label"><?php echo display('Payment Due Date');?> <i class="text-danger">*</i></label>
                                    <div class="col-sm-8">
                                       <input class=" form-control" type="date" size="50" name="payment_due_date"   style="border:2px solid #d7d4d6;"  id="payment_due_date" required value="" tabindex="4" />
                                    </div>
                                 </div>




                              </div>
                              <div class="col-sm-6">


                          


 <div class="form-group row">
                                    <label for="payment_type" class="col-sm-4 col-form-label"><?php
                                       echo display('payment_type');
                                       ?> <i class="text-danger">*</i></label>
                                    <div class="col-sm-7">
                                       <select name="paytype_drop" id="paytype_drop" class="form-control" required=""  tabindex="3" style="width:100;border:2px solid #d7d4d6;">
                                          <option value=""><?php echo display('Select Payment Type');?></option>
                                          <option value="CHEQUE"><?php echo display('cheque'); ?></option>
                                          <option value="CASH"><?php echo display('cash'); ?></option>
                                          <option value="CREDIT/DEBIT CARD"><?php echo display('CREDIT/DEBIT CARD');?></option>
                                          <option value="BANK TRANSFER"><?php echo display('BANK TRANSFER');?></option>
                                          <?php foreach($payment_type as $ptype){?>
                                          <option value="<?php echo $ptype['payment_type'];?>"><?php echo $ptype['payment_type'] ;?></option>
                                          <?php }?>
                                       </select>
                                    </div>
                                    <div  class=" col-sm-1">
                                       <a href="#" class="btnclr client-add-btn btn  mobile_vendor"  style="margin-left:23px;" aria-hidden="true" data-toggle="modal" data-target="#payment_type" ><i class="fa fa-plus"></i></a>
                                    </div>
                                 </div>




                            


                                 <div class="form-group row">
                                    <label for="port_of_discharge" class="col-sm-4 col-form-label">Account Subcategory</label>
                                    <div class="col-sm-8">
                                       <select class="form-control" name="sub_category"   style="border:2px solid #d7d4d6;"  id="ddl2">
                                          <option value="Select Sub Category">Select Sub Category</option>
                                       </select>
                                    </div>
                                 </div>







                                 <div class="form-group row">
                                    <label for="container_number" class="col-sm-4 col-form-label"><?php echo display('Container Number');?> </label>
                                    <div class="col-sm-8">
                                       <input type="text" name="container_no" class="form-control container_no" style="border:2px solid #d7d4d6;"   placeholder="Container Number">
                                    </div>
                                 </div>



                                 <div class="form-group row">
                                    <label for="supplier_sss" class="col-sm-4 col-form-label"><?php echo 'Estimated Time Of Departure';?>
                                    </label>
                                    <div class="col-sm-8">
                                       <input type="date"  tabindex="2" class="form-control datepicker productETD"  style="border:2px solid #d7d4d6;"  name="etd" value="<?php echo $date; ?>" id="date"  />
                                       <div id="loadingText" class="loading-text"></div>
                                    </div>
                                 </div>



                                 <div class="form-group row">
                                    <label for="invoice_no" class="col-sm-4 col-form-label"> <?php echo display('ISF FIELD');?>
                                    </label>
                                    <div class="col-sm-8">
                                       <select name="isf_field" class="form-control"  id="isf_dropdown1" tabindex="3"  required=""  style="width400%;border:2px solid #d7d4d6;">
                                          <option value=""selected><?php echo display('Select ISF NO');?></option>
                                          <option value="1"><?php echo display('NO') ?></option>
                                          <option value="2"><?php echo display('YES') ?></option>
                                       </select>
                                    </div>
                                 </div>

                                 <div class="form-group row" >
                                    <label for="ISF" class="isf_no1 col-sm-4 col-form-label" ><?php echo display('ISF NO');?>
                                    <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-8">
                                       <input name="isf_no"  class="isf_no1 form-control bankpayment"     style="width:100%;border:2px solid #d7d4d6;" value=""  >
                                    </div>
                                 </div>

                          

                


                              </div>
                           </div>
                            <div class="table-responsive">
                              <div id="content">
                                 <table class="table normalinvoice table-bordered table-hover" id="normalinvoice_1"   style="border:2px solid #d7d4d6;" >
                                    <thead>
                                       <tr class="btnclr">
                                          <th rowspan="2" class="text-center" style="width:180px;" ><?php echo display('product_name'); ?><i class="text-danger">*</i>  &nbsp;&nbsp; <a href="#" class="btn btnclr"   aria-hidden="true" data-toggle="modal" data-target="#product_info"><i class="ti-plus m-r-2" style="border:2px;"></i></a></th>
                                          <th rowspan="2" class="text-center" style="width:60px;"><?php echo display('Bundle No');?><i class="text-danger">*</i></th>
                                          <th rowspan="2"  class="text-center"><?php echo  display('description'); ?></th>
                                          <th rowspan="2" class="text-center" style="width:60px;"><?php echo display('Thick ness');?><i class="text-danger">*</i></th>
                                          <th rowspan="2" class="text-center"><?php echo display('Supplier Block No');?><i class="text-danger">*</i></th>
                                          <th rowspan="2" class="text-center" ><?php echo display('Supplier Slab No');?><i class="text-danger">*</i> </th>
                                          <th colspan="2"   style="width:150px;" class="text-center"><?php echo display('Gross Measurement');?><i class="text-danger">*</i> </th>
                                          <th rowspan="2" class="text-center"><?php echo display('Gross Sq.Ft');?></th>
                                          <th rowspan="2" style="width:40px;" class="text-center"><?php echo display('Slab No');?><i class="text-danger">*</i></th>
                                          <th colspan="2"  style="width:150px;" class="text-center"><?php echo display('Net Measure');?><i class="text-danger">*</i></th>
                                          <th rowspan="2" class="text-center"><?php echo display('Net Sq.Ft');?></th>
                                          <th rowspan="2"  style="width:90px;" class="text-center"><?php echo display('Cost per Sq.Ft');?></th>
                                          <th rowspan="2"  style="width:90px;" class="text-center"><?php echo display('Cost per Slab');?></th>
                                          <th rowspan="2"  style="width:90px;" class="text-center"><?php echo display('sales'); ?><br/><?php echo display('Price per Sq.Ft');?></th>
                                          <th rowspan="2"  style="width:90px;" class="text-center"><?php echo display('Sales Slab Price');?></th>
                                          <th rowspan="2" class="text-center"><?php echo display('Weight');?></th>
                                          <th rowspan="2" class="text-center"><?php echo display('Origin');?></th>
                                          <th rowspan="2" style="width: 110px" class="text-center"><?php  echo  display('total'); ?></th>
                                          <th rowspan="2" class="text-center"><?php  echo  display('action'); ?></th>
                                       </tr>
                                       <tr>
                                          <th class="text-center btnclr"><?php echo display('Width');?></th>
                                          <th class="text-center btnclr"><?php echo display('Height');?></th>
                                          <th class="text-center btnclr"  ><?php echo display('Width');?></th>
                                          <th class="text-center btnclr" ><?php echo display('Height');?></th>
                                       </tr>
                                    </thead>
                                    <style>
                                       input{
                                       border:none;
                                       }
                                       textarea:focus, input:focus{
                                       outline: none;
                                       }
                                       .text-right {
                                       text-align: left; 
                                       }
                                       .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
                                       padding:5px;
                                       }
                                       th,
                                       td {
                                       word-wrap: break-word
                                       border: 1px solid black;
                                       width: 100px;
                                       }
                                       .select2 {
                                       display:none;
                                       }
                                       #download_select:focus option:first-of-type , #print_select:focus option:first-of-type{
                                       display: none;
                                       }
                                    </style>
                                    <tbody id="addPurchaseItem_1">
                                       <tr>
                                          <td>
                                             <input type="hidden" name="tableid[]" id="tableid_1"/>
                                             <input list="magicHouses" name="prodt[]" id="prodt_1" required=""  class="form-control product_name"  style="width:160px;" placeholder="Search Product" />
                                             <datalist id="magicHouses">
                                                <?php 
                                                   foreach($product_list as $tx){?>
                                                <option value="<?php echo $tx['product_name'].'-'.$tx['product_model'];?>">  <?php echo $tx['product_name'].'-'.$tx['product_model'];  ?></option>
                                                <?php } ?>
                                             </datalist>
                                             <input type='hidden' class='common_product autocomplete_hidden_value  product_id_1' name='product_id[]' id='SchoolHiddenId_1' />
                                          </td>
                                          <td>
                                             <input type="text" id="bundle_no_1" name="bundle_no[]" required="" class="bundle_no form-control" />
                                          </td>
                                          <td>
                                             <input type="text" id="description_1" name="description[]" class="form-control productDescription" />
                                          </td>
                                          <td >
                                             <input type="text" name="thickness[]" id="thickness_1" required="" class="form-control productThickness"/>
                                          </td>
                                          <td>
                                             <input type="text" id="supplier_b_no_1" name="supplier_block_no[]" required="" class="form-control" />
                                          </td>
                                          <td >
                                             <input type="text"  id="supplier_s_no_1" name="supplier_slab_no[]" required="" class="form-control"/>
                                          </td>
                                          <td>
                                             <input type="text" id="gross_width_1" name="gross_width[]" required="" class="gross_width  form-control" />
                                          </td>
                                          <td>
                                             <input type="text" id="gross_height_1" name="gross_height[]"  required="" class="gross_height form-control" />
                                          </td>
                                          <td >
                                             <input type="text"   style="width:60px;" readonly id="gross_sq_ft_1" name="gross_sq_ft[]" class="gross_sq_ft form-control"/>
                                          </td>
                                          <td style="text-align:center;" >
                                             <input type="text"   style="width:20px;" value="1" class="slab_no" id="slab_no_1" name="slab_no[]"  readonly  required=""/> 
                                          </td>
                                          <td>
                                             <input type="text" id="net_width_1" name="net_width[]"  required="" class="net_width form-control" />
                                          </td>
                                          <td>
                                             <input type="text" id="net_height_1" name="net_height[]"   required="" class="net_height form-control" />
                                          </td>
                                          <td >
                                             <input type="text"   style="width:60px;" readonly id="net_sq_ft_1" name="net_sq_ft[]" class="net_sq_ft form-control"/>
                                          </td>
                                          <td>
                                             <span class="input-symbol-euro"><input type="text" id="cost_sq_ft_1"  name="cost_sq_ft[]"     style="width:60px;" value="0.00"  class="cost_sq_ft form-control costPerSQFT"></span>
                                          <td >
                                             <span class="input-symbol-euro"> <input type="text"  id="cost_sq_slab_1" name="cost_sq_slab[]"      style="width:60px;" value="0.00"  class="cost_sq_slab form-control"/></span>
                                          </td>
                                          <td>
                                             <span class="input-symbol-euro">  <input type="text" id="sales_amt_sq_ft_1"  name="sales_amt_sq_ft[]"  style="width:70px;"  placeholder="0.00" class="sales_amt_sq_ft form-control" /></span>
                                          </td>
                                          <td >
                                             <span class="input-symbol-euro">   <input type="text"  id="sales_slab_amt_1" name="sales_slab_amt[]"  style="width:70px;" placeholder="0.00"  class="sales_slab_amt form-control"/>
                                          </td>
                                          </span>
                                          </td>
                                          <td>
                                             <input type="text" id="weight_1" name="weight[]"  class="weight form-control" />
                                          </td>
                                          <td style="width: 135px;">
                                             <select id="origin_1" name="origin[]" class="origin form-control">
                                                <?php foreach ($country_code as $key => $value) { ?>
                                                <option value="<?php echo $value['iso']; ?>"><?php echo $value['iso']; ?></option>
                                                <?php } ?> 
                                             </select>
                                          </td>
                                          <td >
                                             <span class="input-symbol-euro"><input  type="text" class="total_price form-control" style="width:80px;" readonly  value="0.00"  id="total_amt_1"     name="total_amt[]"/></span>
                                          </td>
                                          <td style="text-align:center;">
                                             <button  class='btn btn-danger delete' id="delete_1" type='button' value='Delete' ><i class="fa fa-trash"></i></button>
                                          </td>
                                       </tr>
                                    </tbody>
                                    <tfoot>
                                       <tr>
                                          <td style="text-align:right;" colspan="8"><b><?php  echo display('Gross Sq.Ft');?> :</b></td>
                                          <td >
                                             <input type="text" id="overall_gross_1" name="overall_gross[]"   class="overall_gross form-control" style="width: 60px"  readonly="readonly"  /> 
                                          </td>
                                          <td style="text-align:right;" colspan="3"><b><?php  echo display('Net Sq.Ft');?> :</b></td>
                                          <td >
                                             <input type="text" id="overall_net_1" name="overall_net[]"  class="overall_net form-control"  style="width: 60px"  readonly="readonly"  /> 
                                          </td>
                                          <td >
                                             <input type="text" id="costpersqft_1" name="costpersqft[]"  class="costpersqft form-control"  style="width: 60px"  readonly="readonly"  /> 
                                          </td>
                                          <td >
                                             <input type="text" id="costperslab_1" name="costperslab[]"  class="costperslab form-control"  style="width: 60px"  readonly="readonly"  /> 
                                          </td>
                                          <td >
                                             <input type="text" id="salespricepersqft_1" name="salespricepersqft[]"  class="salespricepersqft form-control"  style="width: 60px"  readonly="readonly"  /> 
                                          </td>
                                          <td >
                                             <input type="text" id="salesslabprice_1" name="salesslabprice[]"  class="salesslabprice form-control"  style="width: 60px"  readonly="readonly"  /> 
                                          </td>
                                          <td >
                                             <input type="text" id="overall_weight_1" name="overall_weight[]"  class="overall_weight form-control"  style="width: 60px"  readonly="readonly"  /> 
                                          </td>
                                          <td style="text-align:right;" colspan="1"><b><?php  echo display('total'); ?> :</b></td>
                                          <td >
                                             <span class="input-symbol-euro">    <input type="text" id="Total_1" name="total[]"   class="b_total form-control"  style="width: 80px" value="0.00"  readonly="readonly"  /> </span>
                                          </td>
                                       </tr>
                                    </tfoot>
                                 </table>
                                 <i id="buddle_1" class="btnclr addbundle fa fa-plus" style=" padding: 10px 12px 10px 12px;margin-right: 18px;float:right;"   onclick="addbundle(); "aria-hidden="true"></i>
                              </div>
                              <table class="taxtab table table-bordered table-hover"        style="border:2px solid #d7d4d6;"  >
                                 <tr>
                                    <td class="hiden" style="width:28%;border:none;text-align:end;font-weight:bold;">
                                       <?php  echo display("Live Rate");?> : 
                                    </td>
                                    <td class="hiden btnclr" style="width:12%;text-align-last: center;padding:5px;border:none;font-weight:bold;color:white;">1 <?php  echo $curn_info_default;  ?>
                                       = <input style="width: 80px;text-align:center;color:black;padding:5px;" type="text" class="custocurrency_rate"/>&nbsp;<label for="custocurrency" ></label>
                                    </td>
                                    <td style="border:none;text-align:right;font-weight:bold;"><?php  echo display('Tax');?> : 
                                    </td>
                                    <td style="width:12%">
                                       <input list="magic_purchase" name="tx"  id="product_tax" class="form-control"   onchange="this.blur();" />
                                       <datalist id="magic_purchase">
                                          <?php                                
                                             foreach($expense_data as $tx){?>
                                          <option value="<?php echo $tx['tax_id'].'-'.$tx['tax'].'%';?>">  <?php echo $tx['tax_id'].'-'.$tx['tax'].'%';  ?></option>
                                          <?php } ?>
                                       </datalist>
                                    </td>
                                    <td  style="width:20%;"><a href="#" class="client-add-btn btn btnclr" aria-hidden="true" style="color:white; margin-right: 295px;"  data-toggle="modal" data-target="#expensetax_info" ><i class="fa fa-plus"></i></a></td>
                                 </tr>
                              </table>
                              <input type="hidden" id="paid_convert" name="paid_convert"/>   <input type="hidden" id="bal_convert" name="bal_convert"/>
                            
                            
                            
                            
                            
                            
                            
                              <table border="0"   class="overall table table-bordered table-hover"         style="border: 3px solid #d7d4d6;table-layout: auto;"  >
                                 <tr>
                                    <td   style="vertical-align:top;text-align:right;border:none;"></td>
                                    <td  style="text-align:right;border:none;"></td>
                                    <td  style="text-align:right;border:none;"></td>
                                    <td  style="text-align:right;border:none;"> </td>
                                 </tr>
                                 <tr>
                                    <td  colspan="2" style="vertical-align:top;text-align:right;border:none;"><b><?php  echo display('Overall TOTAL');?> :</b></td>
                                    <td colspan="1" style="border:none;padding-bottom: 40px;"><span class="input-symbol-euro"><input type="text" id="Over_all_Total" name="Over_all_Total"  style="width:230px;" class="form-control" value="0.00"  readonly="readonly"  /> </span></td>
                                    <td colspan="4" style="width:150px;text-align:right;border:none;"><b><?php  echo display('TAX DETAILS');?> :</b></td>
                                    <td colspan="1" style="border:none;">  <span class="input-symbol-euro">     <input type="text" class="form-control" style="width:150px;"  id="tax_details" value="0.00" name="tax_details"  readonly="readonly" /></span></td>
                                 </tr>
                                 <tr>
                                    <td  colspan="2" style="vertical-align:top;text-align:right;border:none;"><b><?php  echo display('Overall Gross Sq.Ft');?> :</b></td>
                                    <td colspan="1" style="border:none;"><input type="text" id="total_gross" name="total_gross"   class="form-control"   readonly="readonly"  /> </td>
                                    <td colspan="4" style="text-align:right;border:none;"><b><?php  echo display('GRAND TOTAL');?> :</b></td>
                                    <td colspan="1" style="border:none;">  <span class="input-symbol-euro">    <span class="input-symbol-euro">   <input type="text" id="gtotal"   class="form-control" style="width:150px;" name="gtotal" value="0.00"  readonly="readonly" /></td>
                                 </tr>
                                 <tr>
                                    <td  colspan="2" style="vertical-align:top;text-align:right;border:none;"><b><?php  echo display('Overall Net Sq.Ft');?> :</b></td>
                                    <td colspan="1" style="border:none;"><input type="text" id="total_net" name="total_net"  class="form-control"    readonly="readonly"  /> </td>
                                    <td colspan="4" style="text-align:right;border:none;"><b><?php  echo display('GRAND TOTAL');?> :</b><br/><b><?php  echo display('Preferred Currency');?></b></td>
                                    <td colspan="1" style="border:none;">
                                       <table>
                                          <tr>
                                             <td class="cus" name="cus" style="width: 40px;"></td>
                                             <td>&nbsp</td>
                                             <td><input  type="text"  readonly id="vendor_gtotal" name="vendor_gtotal"  required   /></td>
                                          </tr>
                                       </table>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td colspan="2"  style="vertical-align:top;text-align:right;border:none;"><b><?php  echo display('Overall Weight');?> :</b></td>
                                    <td colspan="1" style="border:none;"><input type="text" id="total_weight" name="total_weight"   class="form-control"   readonly="readonly"  /></td>
                                    <td colspan="4" class="amt" style="text-align:right;border:none;"><b><?php  echo display('Amount Paid');?> :</b></td>
                                    <td style="border:none;">
                                       <table border="0">
                                          <tr class="amt">
                                             <td class="cus" name="cus" style="width: 40px;"></td>
                                             <td>&nbsp</td>
                                             <td> <input  type="text"  readonly id="amount_paid" style="width:-webkit-fill-available;"  name="amount_paid"  required   /></td>
                                          </tr>
                                       </table>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td colspan="2"  style="vertical-align:top;text-align:right;border:none;"></td>
                                    <td colspan="1" style="border:none;"></td>
                                    <td class="amt" colspan="4"  style="vertical-align:top;text-align:right;border:none;"><b><?php echo display('balance_ammount');  ?> :</b></td>
                                    <td class="amt" style="border:none;" colspan="1">
                                       <table border="0">
                                          <tr class="amt">
                                             <td class="cus" name="cus" style="border:none;width: 40px;"></td>
                                             <td>&nbsp</td>
                                             <td style="border:none;">
                                                <input  type="text"   readonly id="balance"  name="balance"  required   />                     
                                             </td>
                                          </tr>
                                       </table>



                                       
                                    </td>
                                 </tr>
                                 </td>
                                 </tr>





                                 <input type="hidden" id="final_gtotal"  name="final_gtotal" />
                                 <input type="hidden" name="baseUrl" class="baseUrl" value="<?php echo base_url();?>"/></td>
                                 <tr style="border-right:none;border-left:none;border-bottom:none;border-top:none">
                                    <td colspan="21" style="text-align: end;">
                                       <input type="submit" value="<?php echo display('Make Payment') ?>"   class="btnclr btn btn-large" id="paypls"/>
                                    </td>
                                 </tr>
                                 </tfoot>
                              </table>
                           </div>
                           <div class="row">
                              <div class="col-sm-12">
                                 <div class="form-group row">
                                    <label for="adress" class="col-sm-2 col-form-label"><?php echo  display('Remarks / Details');?>
                                    </label>
                                    <div class="col-sm-10">
                                       <textarea class="form-control" rows="4" cols="50" id="remark" name="remark"  style="border:2px solid #d7d4d6;"  placeholder="Remarks" rows="1"></textarea>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-sm-12">
                                 <div class="form-group row">
                                    <label for="adress" class="col-sm-2 col-form-label"><?php echo  display('Message on Invoice');?>
                                    </label>
                                    <div class="col-sm-10">
                                       <textarea class="form-control" rows="4" cols="50" id="adress" name="message_invoice"  style="border:2px solid #d7d4d6;"  placeholder="Message on Invoice" rows="1"></textarea>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-sm-12">
                                 <div class="form-group row" style="   margin-top: 1%;">
                                    <table>
                                       <tr>
                                          <td>
                                             <input type="submit" id="add_purchase"   class="btnclr btn btn-large" name="add-packing-list" value="<?php  echo  display('save'); ?>" />
                                          </td>
                                          <td class="button_hide"> 
                                             <a    id="final_submit"   class='btnclr final_submit btn'><?php echo display('submit'); ?></a>
                                          </td>
                                          <td class="button_hide">
                                             <select name="download_select" id="download_select" class="form-control" style="background-color:<?php echo $setting_detail[0]['button_color']; ?>;width: auto;color:white;" >
                                                <option value="Download"  selected><?php echo display('download'); ?></option>
                                                <option value="Invoice" ><?php echo  display('New Invoice');?></option>
                                                <option value="Packing" ><?php echo  display('Packing List');?></option>
                                             </select>
                                          </td>
                                          <td></td>
                                          <td class="button_hide">
                                             <select name="print_select" id="print_select" class="form-control" style="background-color:<?php echo $setting_detail[0]['button_color']; ?>;width: auto;color:white;" >
                                                <option value="Print"  selected><?php echo display('print');  ?></option>
                                                <option value="Invoice" ><?php echo  display('New Invoice');?></option>
                                                <option value="Packing" ><?php echo  display('Packing List');?></option>
                                             </select>
                                          </td>
                                       </tr>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </form>
                     </div>
                     <div id="service_provider_data">
                        <div class="panel-body">
                           <form id="serviceprovider"  method="post">
                              <div class="row">
                                 <div class="col-sm-6">
                                    <div class="form-group row">
                                       <label for="service_provider_name" class="col-sm-4 col-form-label"><?php  echo  display('Service Provider Name');?>
                                       <i class="text-danger">*</i>
                                       </label>
                                       <div class="col-sm-8">
                                          <select name="service_provider_name" id="supplier_name" class="form-control service_provider_name"    style="border:2px solid #d7d4d6;width:100%;"   required=""  tabindex="1">
                                             <option value="supplier_id"><?php echo display('select_one') ?></option>
                                             {all_supplier}
                                             <option value="{supplier_id}">{supplier_name}</option>
                                             {/all_supplier}
                                          </select>
                                           <!-- <div id="loadingText" class="loading-text"></div> -->
                                       </div>
                                    </div>
                                 </div>
                                 <?php  $serviceprovider_id = rand(); ?>
                                 <input type="hidden" name="serviceprovider_id" id="serviceprovider_id" value="<?php echo $serviceprovider_id; ?>"  >
                                 <?php     $payment_id_service=rand(); ?>     
                                 <input type="hidden" name="payment_id_service" id="payment_id_service" value="<?php echo $payment_id_service; ?>"  >
                                 <div class="col-sm-6">
                                    <div class="form-group row">
                                       <label for="sp_address" class="col-sm-4 col-form-label"><?php  echo  display('Service Provider complete address');?>
                                       <i class="text-danger"></i>
                                       </label>
                                       <div class="col-sm-8">
                                          <input type="text" tabindex="3" class="form-control sp_address" name="sp_address" style="border:2px solid #d7d4d6;"  id="sp_address"  />
                                          <div id="loadingText" class="loading-text"></div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-sm-6">
                                    <div class="form-group row">
                                 

                                       <label for="bill_date" class="col-sm-4 col-form-label"><?php  echo  display('Bill Date');?>
                                       <i class="text-danger">*</i>
                                       </label>
                                       <div class="col-sm-8">
                                          <?php $date = date('Y-m-d'); ?>
                                          <input type="date" tabindex="2" class="form-control servicebill_date" name="bill_date" id="bill_date" alue="<?php echo $date; ?>"  style="border:2px solid #d7d4d6;"  required/>
                                          <div id="loadingText" class="loading-text"></div>
                                       </div>
                                    </div>
                                 </div>


                                 <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                               
                               
                                 <div class="col-sm-6">
                                   

                                    <div class="form-group row">
                                       <label for="bill_number" class="col-sm-4 col-form-label"><?php  echo  display('Bill Number');?> <i class="text-danger">*</i>
                                       </label>
                                       <div class="col-sm-8">
                                          <input type="text" required tabindex="2" class="form-control bill_number" name="bill_num"  id="bill_number"  style="border:2px solid #d7d4d6;"   required="" />
                                          <div id="loadingText" class="loading-text"></div>
                                       </div>
                                    </div>


                                 </div>
                              </div>


                              
                              <div class="row">
                                 <div class="col-sm-6">
                                    <div class="form-group row">
                                     
                                    <label for="payment_terms" class="col-sm-4 col-form-label"><?php  echo  display('Payment Terms');?><i class="text-danger">*</i></label>
                                       <div class="col-sm-7">
                                          <select   name="pay_terms" id="payment_terms" style="width:100%;border:2px solid #d7d4d6;" class=" form-control" required placeholder='Payment Terms' id="payment_terms">
                                             <option value=""><?php echo display('Select Payment Terms');?></option>
                                             <option value="CAD">CAD</option>
                                             <option value="COD">COD</option>
                                             <option value="ADVANCE"><?php echo display('ADVANCE');?></option>
                                             <option value="7DAYS">7<?php echo display('DAYS');?></option>
                                             <option value="15DAYS">15<?php echo display('DAYS');?></option>
                                             <option value="30DAYS">30<?php echo display('DAYS');?></option>
                                             <option value="45DAYS">45<?php echo display('DAYS');?></option>
                                             <option value="60DAYS">60<?php echo display('DAYS');?></option>
                                             <option value="75DAYS">75<?php echo display('DAYS');?></option>
                                             <option value="90DAYS">90<?php echo display('DAYS');?></option>
                                             <option value="180DAYS">180<?php echo display('DAYS');?></option>
                                             <?php foreach($payment_terms as $inv){ ?>
                                             <option value="<?php echo $inv['payment_terms'] ; ?>"><?php echo $inv['payment_terms'] ; ?></option>
                                             <?php    }?>
                                          </select>
                                       </div>
                                       <div class="col-sm-1">
                                          <a href="#" class="btnclr client-add-btn btn mobile_vendor" aria-hidden="true"   style="margin-left:24px;" data-toggle="modal" data-target="#payment_type_new" ><i class="fa fa-plus"></i></a>
                                       </div>



                                    </div>
                                 </div>


                                 <div class="col-sm-6">
                                 <div class="form-group row">
                                       <label for="bill_number" class="col-sm-4 col-form-label"><?php  echo  ('Phone Number');?> <i class="text-danger"></i>
                                       </label>
                                       <div class="col-sm-8">
                                          <input type="number" required tabindex="2" class="form-control phone_num" name="phone_num" style="border:2px solid #d7d4d6;"   id="phone_num"  />
                                          <div id="loadingText" class="loading-text"></div>
                                       </div>
                                    </div>


                                 </div> 
                              </div>







                              <div class="row">
                                 <div class="col-sm-6">
                                    <div class="form-group row">
                                       <label for="bill_date" class="col-sm-4 col-form-label"><?php echo  display('Account Category') ;?>
                                       <i class="text-danger"></i>
                                       </label>
                                       <div class="col-sm-8">
                                          <!--<input type="text" tabindex="2" class="form-control" name="acc_cat_name" id="acc_cat_name" />-->
                                          <select id="ddl"  name="acc_cat_name" class="form-control"   style="border:2px solid #d7d4d6;" onchange="configureDropDownLists(this,document.getElementById('ddl3'))">
                                             <option value="">Select the Account Category</option>
                                             <option value="ASSETS"><?php echo  display('ASSETS');?></option>
                                             <option value="RECEIVABLES"><?php echo  display('RECEIVABLES');?></option>
                                             <option value="INVENTORIES"><?php echo  display('INVENTORIES');?></option>
                                             <option value="PREPAID EXPENSES & OTHER CURRENT ASSETS"><?php echo  display('PREPAID EXPENSES & OTHER CURRENT ASSETS');?></option>
                                             <option value="PROPERTY PLANT & EQUIPMENT"><?php echo  display('PROPERTY PLANT & EQUIPMENT');?></option>
                                             <option value="ACCUMULATED DEPRECIATION & AMORTIZATION"><?php echo  display('ACCUMULATED DEPRECIATION & AMORTIZATION');?></option>
                                             <option value="NON – CURRENT RECEIVABLES"><?php echo  display('NON – CURRENT RECEIVABLES');?></option>
                                             <option value="INTERCOMPANY RECEIVABLES & OTHER NON-CURRENT ASSETS"><?php echo  display('INTERCOMPANY RECEIVABLES & OTHER NON-CURRENT ASSETS');?></option>
                                             <option value="LIABILITIES & 2100 PAYABLES"><?php echo  display('LIABILITIES & PAYABLES');?></option>
                                             <option value="ACCRUED COMPENSATION & RELATED ITEMS"><?php echo  display('ACCRUED COMPENSATION & RELATED ITEMS');?></option>
                                             <option value="OTHER ACCRUED EXPENSES"><?php echo  display('OTHER ACCRUED EXPENSES');?></option>
                                             <option value="ACCRUED TAXES"><?php echo  display('ACCRUED TAXES');?></option>
                                             <option value="DEFERRED TAXES"><?php echo  display('DEFERRED TAXES');?></option>
                                             <option value="LONG-TERM DEBT"><?php echo  display('LONG-TERM DEBT');?></option>
                                             <option value="INTERCOMPANY PAYABLES & OTHER NON CURRENT LIABILITIES & OWNERS EQUITIES"><?php echo  display('INTERCOMPANY PAYABLES & OTHER NON CURRENT LIABILITIES & OWNERS EQUITIES');?></option>
                                             <option value="REVENUE"><?php echo  display('REVENUE');?></option>
                                             <option value="COST OF GOODS SOLD"><?php echo  display('COST OF GOODS SOLD');?></option>
                                             <option value="OPERATING EXPENSES"><?php echo  display('OPERATING EXPENSES');?></option>
                                          </select>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-sm-6">
                                    <div class="form-group row">
                                       <label for="due_date" class="col-sm-4 col-form-label"><?php echo  display('Account Sub Category');?>
                                       <i class="text-danger"></i>    
                                       </label>
                                       <div class="col-sm-8">
                                          <!--<input type="text" tabindex="2" class="form-control" name="acc_cat"  id="acc_cat"  />-->
                                          <select class="form-control" name="acc_cat" style="border:2px solid #d7d4d6;"  id="ddl3">
                                             <option value="Select Sub Category"><?php echo display('Select Sub Category') ?></option>
                                          </select>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-sm-6">
                                    <div class="form-group row">
                                       <label for="bill_date" class="col-sm-4 col-form-label"><?php  echo  display('Account Sub category');?>
                                       <i class="text-danger"></i>
                                       </label>
                                       <div class="col-sm-8">
                                          <input type="text" tabindex="2" class="form-control"  style="border:2px solid #d7d4d6;" name="acc_sub_name" id="acc_sub_name" />
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="table-responsive">
                                 <table class="table table-bordered table-hover serviceprovider" id="service_1" style="border:2px solid #d7d4d6;" >
                                    <thead>
                                       <tr>
                                          <th class="text-center" width="15%"><?php  echo  ('Product Name');?><i class="text-danger">*</i></th>
                                          <th class="text-center"><?php  echo  display('description'); ?><i class="text-danger">*</i></th>
                                          <th class="text-center"><?php  echo  ('Quality');?><i class="text-danger">*</i></th>
                                          <th class="text-center"><?php echo display('amount'); ?><i class="text-danger">*</i></th>
                                          <th class="text-center"><?php echo display('action') ?></th>
                                       </tr>
                                    </thead>
                                    <tbody id="servic_pro">
                                       <tr class="Deleteallrowsserviceprovider">
                                          <td class="span3 supplier">
                                             <input type="hidden" name="tableid[]" id="tableid_1"/>
                                             <input  list="magicHouses" type="text" required tabindex="2" class="acc_name form-control productNAME" name="product_name[]"  id="product_name"/>
                                             <datalist id="magicHouses">
                                                <?php 
                                                   foreach($product_list as $tx){?>
                                                <option value="<?php echo $tx['product_name'].'-'.$tx['product_model'];?>">  <?php echo $tx['product_name'].'-'.$tx['product_model'];  ?></option>
                                                <?php } ?>
                                             </datalist>
                                             <input type='hidden' class='common_product autocomplete_hidden_value  product_id_1' name='product_id[]' id='SchoolHiddenId_1' />
                                          </td>
                                          <td class="wt">
                                             <input type="text" name="description_service[]" id="description_1" required="" min="0" class="form-control text-right store_cal_1"   placeholder="" value=""  tabindex="6"/>
                                          </td>
                                          <td class="text-right">
                                             <input type="text" name="quality[]" id="quality_1" required="" min="0" class="form-control text-right productQTY" value=""  tabindex="6"/>
                                          </td>
                                          <td>
                                             <span class="input-symbol-euro"> <input class="total_price form-control mobile_price productAMOUNT" type="text"  style="width: 317px;"  name="total_price[]" id="total_price_1"  placeholder="0.00"  /></span>
                                          </td>
                                          <td style="text-align:center;">
                                             <button  class='delete_provider btn btn-danger' type='button' value='Delete'><i class="fa fa-trash"></i></button>
                                          </td>
                                       </tr>
                                    </tbody>
                                    <tfoot>
                                       <tr style="height:50px;">
                                          <td style="text-align:right;" colspan="3" ><b><?php echo display('total') ?>:</b></td>
                                          <td style="text-align:left;">
                                             <span class="input-symbol-euro"><input type="text" id="Total" class="form-control text-right mobile_price" placeholder="0.00"  style="width: 317px;"  min="0" name="total" value="<?php echo $total; ?>" /> </span>
                                          </td>
                                       </tr>
                                       <table class="taxtab table table-bordered table-hover"   style="border:2px solid #d7d4d6;" >
                                          <tr>
                                             <td class="hiden " style="width:28%;border:none;text-align:end;font-weight:bold;">
                                                <?php  echo display("Live Rate");?> : 
                                             </td>
                                             <td class="hiden btnclr" style="width:12%;text-align-last: center;padding:5px;border:none;font-weight:bold;color:white;">1 <?php  echo $curn_info_default;  ?>
                                                = <input style="width: 80px;text-align:center;color:black;padding:5px;" type="text" class="custocurrency_rate"/>&nbsp;<label for="custocurrency"  class="custt"></label>
                                             </td>
                                             <td style="border:none;text-align:right;font-weight:bold;"><?php  echo display('Tax');?> : 
                                             </td>
                                             <td style="width:12%">
                                                <input list="magic_purchase" name="product_tax_taxes"  id="product_tax_taxes" class="form-control"   onchange="this.blur();" />
                                                <datalist id="magic_purchase">
                                                   <?php                                
                                                      foreach($expense_data as $tx){?>
                                                   <option value="<?php echo $tx['tax_id'].'-'.$tx['tax'].'%';?>">  <?php echo $tx['tax_id'].'-'.$tx['tax'].'%';  ?></option>
                                                   <?php } ?>
                                                </datalist>
                                             </td>
                                             <td  style="width:20%;"><a href="#" class="btnclr client-add-btn btn " aria-hidden="true" style="margin-right: 295px;"  data-toggle="modal" data-target="#expensetax_info" ><i class="fa fa-plus"></i></a></td>
                                          </tr>
                                       </table>
                                       <input type="hidden" id="paid_convert" name="paid_convert"/>   <input type="hidden" id="bal_convert" name="bal_convert"/>
                                    
                                    
                                    
                                    
                                       <table border="0"  class="overall table table-bordered table-hover"     style="border:2px solid #d7d4d6;table-layout: auto;"          >
                                          <tbody>
                                             <tr>
                                                <td style="vertical-align:top;text-align:right;border:none;"></td>
                                                <td style="text-align:right;border:none;"></td>
                                                <td style="text-align:right;border:none;"></td>
                                                <td style="text-align:right;border:none;"> </td>
                                             </tr>
                                             <tr>
                                                <td colspan="2" style="vertical-align:top;text-align:right;border:none;"><b><?php echo display('TAX DETAILS');?> :</b></td>
                                                <td colspan="1" style="border:none;padding-bottom: 40px;"><span class="input-symbol-euro"><input type="text" class="form-control" style="width: 108px;" id="tax_detail" value="0.00" name="tax_detail" readonly="readonly" /> </span></td>
                                                <td colspan="4" style="text-align:right;border:none;"><b>Grand Total :</b></td>
                                                <td colspan="1" style="border:none;">  <span class="input-symbol-euro"> <input type="text" id="gtotals" class="form-control" style="width: 108px" name="gtotals" value="0.00" readonly="readonly" /></span></td>
                                             </tr>
                                             <tr>
                                                <td colspan="2" style="vertical-align:top;text-align:right;border:none;"><b><?php  echo display('GRAND TOTAL');?> :</b><br/><b><?php  echo display('Preferred Currency');?></b></td>
                                                <td colspan="1" style="border:none;"><span><?php  echo $curn_info_default;  ?></span> <input type="text" class="form-control" style="width: 108px;" readonly id="vendor_gtotals" name="vendor_gtotals" required /></td>
                                                <td colspan="4" style="text-align:right;border:none;"><b><?php echo display('Amount Paid');?> :</b></td>
                                                <td colspan="1" style="border:none;"><span><?php  echo $curn_info_default;  ?></span> <input type="text" class="form-control" readonly id="amount_paids" style="width: 108px;" name="amount_paids" required /></td>
                                             </tr>
                                             <tr>
                                                <td colspan="2" style="vertical-align:top;text-align:right;border:none;"><b>Balance Amount :</b></td>
                                                <td colspan="1" style="border:none;"> <?php echo $curn_info_default;  ?><input type="text" class="form-control" style="width: 108px" readonly="" id="balances" name="balances" required="" /></td>
                                             </tr>




                                             
                                             <input type="hidden" id="final_gtotal"  name="final_gtotal" />
                                             <input type="hidden" name="baseUrl" class="baseUrl" value="<?php echo base_url();?>"/>
                                            
                                            
                                             <tr style="border-right:none;border-left:none;border-bottom:none;border-top:none">
                                                <td colspan="21" style="text-align: end;">
                                                   <input type="submit" value="<?php echo display('Make Payment') ?>"   class="btnclr btn btn-large" id="serpaypls" />
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>










                                    </tfoot>
                                 </table>
                              </div>
                              <div class="form-group row">
                                 <label for="remarks" class="col-sm-2 col-form-label"><?php echo display('Memo / Details');?></label>
                                 <div class="col-sm-8">
                                    <textarea rows="4" cols="50" name="memo_details" class=" form-control"   style="border:2px solid #d7d4d6;"         placeholder="Memo/Details" id=""></textarea>
                                 </div>
                              </div>
                              <td>
                                 <input type="submit" id="add_purchase" name="add_purchase"     class="btnclr btn" value="<?php echo display('save') ?>">
                                 <a     id="final_submit_provider" class='btnclr final_submit_provider btn  '><?php echo display('submit'); ?></a>
                                 <a id="download_provider"  class='btn  btnclr'><?php  echo  display('download'); ?></a>
                                 <a id="print_provider"    class='btn  btnclr'><?php  echo  display('print'); ?></a>                   
                              </td>
                           </form>
                        </div>
                     </div>
                     <input type="hidden" id="invoice_hdn"/> <input type="hidden" id="invoice_hdn1"/><input type="hidden" id="servic_id_hidden"/>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <div class="modal fade" id="myModal1" >
      <div class="modal-dialog">
         <!-- Modal content-->
         <div class="modal-content" style="    margin-top: 190px;text-align:center;">
            <div class="modal-header btnclr"  >
               <button type="button" class="close" data-dismiss="modal">&times;</button>
               <h4 class="modal-title"><?php  echo display('purchase'); ?></h4>
            </div>
            <div class="modal-body" id="bodyModal1" style="font-weight:bold;text-align:center;">
               <h4></h4>
            </div>
            <div class="modal-footer">
            </div>
         </div>
      </div>
   </div>
   <!-- Pack  Modal -->
   <div id="packmodal" class="modal fade" role="dialog">
      <div class="modal-dialog">
         <!-- Modal content-->
         <div class="modal-content" style="width: 163%;">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal">&times;</button>
               <h4 class="modal-title">Choose your Package </h4>
            </div>
            <div class="modal-body">
               <table class="table table-bordered">
                  <tr>
                     <th>Choose your Package   </th>
                     <th>Sno</th>
                     <th>Novice No</th>
                     <th>Expense Packing ID</th>
                     <th>Gross Weight</th>
                     <th>Container NO</th>
                     <th>Thickness</th>
                     <th>Invoice Date</th>
                  </tr>
                  <?php 
                     $i=0;
                     foreach($packinglist as $pack)
                         { ?>
                  <tr>
                     <td><input type="radio" name="packing" id="packing" onclick="packing('<?php echo $pack['invoice_no']; ?>')" ></td>
                     <td><?php echo $j=$i+1; ?></td>
                     <td><?php echo $pack['invoice_no']; ?></td>
                     <td><?php echo $pack['expense_packing_id']; ?></td>
                     <td><?php echo $pack['gross_weight']; ?></td>
                     <td><?php echo $pack['container_no']; ?></td>
                     <td><?php echo $pack['thickness']; ?></td>
                     <td><?php echo $pack['invoice_date']; ?></td>
                  </tr>
                  <?php $i++; } ?>
               </table>
            </div>
         </div>
      </div>
   </div>
   <!-- Modal -->
   <!-- Purchase Report End -->
   <div class="modal fade model success " id="add_vendor" role="dialog">
      <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content" style="text-align:center;" >
            <div class="modal-header btnclr"  >
               <a href="#" class="close" data-dismiss="modal" >&times;</a>
               <h3 class="modal-title"  ><?php echo  display('Add New Vendor');?></h3>
            </div>
            <div class="modal-body">
               <form id="insert_supplier"  method="post">
                  <div id="customeMessage" class="alert hide"></div>
                  <div class="panel-body">
                     <div class="col-sm-6">
                        <div class="form-group row">
                           <label for="" class="col-sm-4  col-form-label"><?php echo  display('Vendor Type');?><i class="text-danger">*</i></label>
                           <div class="col-sm-8">
                              <select   name="vendor_type"  class=" form-control" placeholder=''  required="" id="vendor_type" >
                                 <option value=""> <?php echo  display('Selected vendor type');?></option>
                                 <option value="Product Supplier"><?php echo display('Product Supplier') ?></option>
                                 <option value="Service Vendor"> <?php echo display('Service Vendor') ?></option>
                                 <option value="Others"> <?php echo display('Others') ?></option>
                              </select>
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="supplier_name" class="col-sm-4 col-form-label"> <?php echo  display('Company Name');?><i class="text-danger">*</i></label>
                           <div class="col-sm-8">
                              <input class="form-control" name ="supplier_name" id="supplier_name" type="text" placeholder="Company Name"  required="" tabindex="1">
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="mobile" class="col-sm-4 col-form-label"> <?php  echo display('mobile'); ?><i class="text-danger"></i></label>
                           <div class="col-sm-8">
                              <input class="form-control" name="mobile" id="mobile" type="number" placeholder=" Mobile"  min="0" tabindex="2">
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="phone" class="col-sm-4 col-form-label"><?php echo  display('Business Phone');?><i class="text-danger">*</i></label>
                           <div class="col-sm-8">
                              <input class="form-control" name="phone" id="phone" type="number" placeholder="Business Phone"   required="" min="0" tabindex="2">
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="email" class="col-sm-4 col-form-label"><?php echo  display('primary Email');?> <i class="text-danger">*</i></label>
                           <div class="col-sm-8">
                              <input class="form-control" name="email" id="email" type="email" placeholder="primary Email"    required="" tabindex="2">
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="emailaddress" class="col-sm-4 col-form-label"><?php echo  display('Secondary Email');?> <i class="text-danger"></i></label>
                           <div class="col-sm-8">
                              <input class="form-control" name="emailaddress" id="emailaddress" type="email" placeholder="Secondary Email"  >
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="contact" class="col-sm-4 col-form-label"><?php echo  display('Contact Person');?><i class="text-danger"></i></label>
                           <div class="col-sm-8">
                              <input class="form-control" name="contact" id="contact" type="text" placeholder="Contact Person"  >
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="fax" class="col-sm-4 col-form-label"><?php echo display('fax'); ?> <i class="text-danger"></i></label>
                           <div class="col-sm-8">
                              <input class="form-control" name="fax" id="fax" type="text" placeholder="<?php echo display('fax') ?>"  >
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="previous_balance" class="col-sm-4 col-form-label"><?php echo display('currency'); ?></label>
                           <div class="col-sm-8">
                              <!-- <select id="currency" name="currency1" style="width: 100%;"     > -->
                              <select  class="form-control" id="currency" name="currency1"  style="width: 100%;" required=""  style="max-width: -webkit-fill-available;">
                                 <option value="USD">USD - US Dollar - $</option>
                                 <option value="AFN">AFN - Afghan Afghani - ؋</option>
                                 <option value="ALL">ALL - Albanian Lek - Lek</option>
                                 <option value="DZD">DZD - Algerian Dinar - دج</option>
                                 <option value="AOA">AOA - Angolan Kwanza - Kz</option>
                                 <option value="ARS">ARS - Argentine Peso - $</option>
                                 <option value="AMD">AMD - Armenian Dram - ֏</option>
                                 <option value="AWG">AWG - Aruban Florin - ƒ</option>
                                 <option value="AUD">AUD - Australian Dollar - $</option>
                                 <option value="AZN">AZN - Azerbaijani Manat - m</option>
                                 <option value="BSD">BSD - Bahamian Dollar - B$</option>
                                 <option value="BHD">BHD - Bahraini Dinar - .د.ب</option>
                                 <option value="BDT">BDT - Bangladeshi Taka - ৳</option>
                                 <option value="BBD">BBD - Barbadian Dollar - Bds$</option>
                                 <option value="BYR">BYR - Belarusian Ruble - Br</option>
                                 <option value="BEF">BEF - Belgian Franc - fr</option>
                                 <option value="BZD">BZD - Belize Dollar - $</option>
                                 <option value="BMD">BMD - Bermudan Dollar - $</option>
                                 <option value="BTN">BTN - Bhutanese Ngultrum - Nu.</option>
                                 <option value="BTC">BTC - Bitcoin - ฿</option>
                                 <option value="BOB">BOB - Bolivian Boliviano - Bs.</option>
                                 <option value="BAM">BAM - Bosnia-Herzegovina Convertible Mark - KM</option>
                                 <option value="BWP">BWP - Botswanan Pula - P</option>
                                 <option value="BRL">BRL - Brazilian Real - R$</option>
                                 <option value="GBP">GBP - British Pound Sterling - £</option>
                                 <option value="BND">BND - Brunei Dollar - B$</option>
                                 <option value="BGN">BGN - Bulgarian Lev - Лв.</option>
                                 <option value="BIF">BIF - Burundian Franc - FBu</option>
                                 <option value="KHR">KHR - Cambodian Riel - KHR</option>
                                 <option value="CAD">CAD - Canadian Dollar - $</option>
                                 <option value="CVE">CVE - Cape Verdean Escudo - $</option>
                                 <option value="KYD">KYD - Cayman Islands Dollar - $</option>
                                 <option value="XOF">XOF - CFA Franc BCEAO - CFA</option>
                                 <option value="XAF">XAF - CFA Franc BEAC - FCFA</option>
                                 <option value="XPF">XPF - CFP Franc - ₣</option>
                                 <option value="CLP">CLP - Chilean Peso - $</option>
                                 <option value="CNY">CNY - Chinese Yuan - ¥</option>
                                 <option value="COP">COP - Colombian Peso - $</option>
                                 <option value="KMF">KMF - Comorian Franc - CF</option>
                                 <option value="CDF">CDF - Congolese Franc - FC</option>
                                 <option value="CRC">CRC - Costa Rican ColÃ³n - ₡</option>
                                 <option value="HRK">HRK - Croatian Kuna - kn</option>
                                 <option value="CUC">CUC - Cuban Convertible Peso - $, CUC</option>
                                 <option value="CZK">CZK - Czech Republic Koruna - Kč</option>
                                 <option value="DKK">DKK - Danish Krone - Kr.</option>
                                 <option value="DJF">DJF - Djiboutian Franc - Fdj</option>
                                 <option value="DOP">DOP - Dominican Peso - $</option>
                                 <option value="XCD">XCD - East Caribbean Dollar - $</option>
                                 <option value="EGP">EGP - Egyptian Pound - ج.م</option>
                                 <option value="ERN">ERN - Eritrean Nakfa - Nfk</option>
                                 <option value="EEK">EEK - Estonian Kroon - kr</option>
                                 <option value="ETB">ETB - Ethiopian Birr - Nkf</option>
                                 <option value="EUR">EUR - Euro - €</option>
                                 <option value="FKP">FKP - Falkland Islands Pound - £</option>
                                 <option value="FJD">FJD - Fijian Dollar - FJ$</option>
                                 <option value="GMD">GMD - Gambian Dalasi - D</option>
                                 <option value="GEL">GEL - Georgian Lari - ლ</option>
                                 <option value="DEM">DEM - German Mark - DM</option>
                                 <option value="GHS">GHS - Ghanaian Cedi - GH₵</option>
                                 <option value="GIP">GIP - Gibraltar Pound - £</option>
                                 <option value="GRD">GRD - Greek Drachma - ₯, Δρχ, Δρ</option>
                                 <option value="GTQ">GTQ - Guatemalan Quetzal - Q</option>
                                 <option value="GNF">GNF - Guinean Franc - FG</option>
                                 <option value="GYD">GYD - Guyanaese Dollar - $</option>
                                 <option value="HTG">HTG - Haitian Gourde - G</option>
                                 <option value="HNL">HNL - Honduran Lempira - L</option>
                                 <option value="HKD">HKD - Hong Kong Dollar - $</option>
                                 <option value="HUF">HUF - Hungarian Forint - Ft</option>
                                 <option value="ISK">ISK - Icelandic KrÃ³na - kr</option>
                                 <option value="INR">INR - Indian Rupee - ₹</option>
                                 <option value="IDR">IDR - Indonesian Rupiah - Rp</option>
                                 <option value="IRR">IRR - Iranian Rial - ﷼</option>
                                 <option value="IQD">IQD - Iraqi Dinar - د.ع</option>
                                 <option value="ILS">ILS - Israeli New Sheqel - ₪</option>
                                 <option value="ITL">ITL - Italian Lira - L,£</option>
                                 <option value="JMD">JMD - Jamaican Dollar - J$</option>
                                 <option value="JPY">JPY - Japanese Yen - ¥</option>
                                 <option value="JOD">JOD - Jordanian Dinar - ا.د</option>
                                 <option value="KZT">KZT - Kazakhstani Tenge - лв</option>
                                 <option value="KES">KES - Kenyan Shilling - KSh</option>
                                 <option value="KWD">KWD - Kuwaiti Dinar - ك.د</option>
                                 <option value="KGS">KGS - Kyrgystani Som - лв</option>
                                 <option value="LAK">LAK - Laotian Kip - ₭</option>
                                 <option value="LVL">LVL - Latvian Lats - Ls</option>
                                 <option value="LBP">LBP - Lebanese Pound - £</option>
                                 <option value="LSL">LSL - Lesotho Loti - L</option>
                                 <option value="LRD">LRD - Liberian Dollar - $</option>
                                 <option value="LYD">LYD - Libyan Dinar - د.ل</option>
                                 <option value="LTL">LTL - Lithuanian Litas - Lt</option>
                                 <option value="MOP">MOP - Macanese Pataca - $</option>
                                 <option value="MKD">MKD - Macedonian Denar - ден</option>
                                 <option value="MGA">MGA - Malagasy Ariary - Ar</option>
                                 <option value="MWK">MWK - Malawian Kwacha - MK</option>
                                 <option value="MYR">MYR - Malaysian Ringgit - RM</option>
                                 <option value="MVR">MVR - Maldivian Rufiyaa - Rf</option>
                                 <option value="MRO">MRO - Mauritanian Ouguiya - MRU</option>
                                 <option value="MUR">MUR - Mauritian Rupee - ₨</option>
                                 <option value="MXN">MXN - Mexican Peso - $</option>
                                 <option value="MDL">MDL - Moldovan Leu - L</option>
                                 <option value="MNT">MNT - Mongolian Tugrik - ₮</option>
                                 <option value="MAD">MAD - Moroccan Dirham - MAD</option>
                                 <option value="MZM">MZM - Mozambican Metical - MT</option>
                                 <option value="MMK">MMK - Myanmar Kyat - K</option>
                                 <option value="NAD">NAD - Namibian Dollar - $</option>
                                 <option value="NPR">NPR - Nepalese Rupee - ₨</option>
                                 <option value="ANG">ANG - Netherlands Antillean Guilder - ƒ</option>
                                 <option value="TWD">TWD - New Taiwan Dollar - $</option>
                                 <option value="NZD">NZD - New Zealand Dollar - $</option>
                                 <option value="NIO">NIO - Nicaraguan CÃ³rdoba - C$</option>
                                 <option value="NGN">NGN - Nigerian Naira - ₦</option>
                                 <option value="KPW">KPW - North Korean Won - ₩</option>
                                 <option value="NOK">NOK - Norwegian Krone - kr</option>
                                 <option value="OMR">OMR - Omani Rial - .ع.ر</option>
                                 <option value="PKR">PKR - Pakistani Rupee - ₨</option>
                                 <option value="PAB">PAB - Panamanian Balboa - B/.</option>
                                 <option value="PGK">PGK - Papua New Guinean Kina - K</option>
                                 <option value="PYG">PYG - Paraguayan Guarani - ₲</option>
                                 <option value="PEN">PEN - Peruvian Nuevo Sol - S/.</option>
                                 <option value="PHP">PHP - Philippine Peso - ₱</option>
                                 <option value="PLN">PLN - Polish Zloty - zł</option>
                                 <option value="QAR">QAR - Qatari Rial - ق.ر</option>
                                 <option value="RON">RON - Romanian Leu - lei</option>
                                 <option value="RUB">RUB - Russian Ruble - ₽</option>
                                 <option value="RWF">RWF - Rwandan Franc - FRw</option>
                                 <option value="SVC">SVC - Salvadoran ColÃ³n - ₡</option>
                                 <option value="WST">WST - Samoan Tala - SAT</option>
                                 <option value="SAR">SAR - Saudi Riyal - ﷼</option>
                                 <option value="RSD">RSD - Serbian Dinar - din</option>
                                 <option value="SCR">SCR - Seychellois Rupee - SRe</option>
                                 <option value="SLL">SLL - Sierra Leonean Leone - Le</option>
                                 <option value="SGD">SGD - Singapore Dollar - $</option>
                                 <option value="SKK">SKK - Slovak Koruna - Sk</option>
                                 <option value="SBD">SBD - Solomon Islands Dollar - Si$</option>
                                 <option value="SOS">SOS - Somali Shilling - Sh.so.</option>
                                 <option value="ZAR">ZAR - South African Rand - R</option>
                                 <option value="KRW">KRW - South Korean Won - ₩</option>
                                 <option value="XDR">XDR - Special Drawing Rights - SDR</option>
                                 <option value="LKR">LKR - Sri Lankan Rupee - Rs</option>
                                 <option value="SHP">SHP - St. Helena Pound - £</option>
                                 <option value="SDG">SDG - Sudanese Pound - .س.ج</option>
                                 <option value="SRD">SRD - Surinamese Dollar - $</option>
                                 <option value="SZL">SZL - Swazi Lilangeni - E</option>
                                 <option value="SEK">SEK - Swedish Krona - kr</option>
                                 <option value="CHF">CHF - Swiss Franc - CHf</option>
                                 <option value="SYP">SYP - Syrian Pound - LS</option>
                                 <option value="STD">STD - São Tomé and Príncipe Dobra - Db</option>
                                 <option value="TJS">TJS - Tajikistani Somoni - SM</option>
                                 <option value="TZS">TZS - Tanzanian Shilling - TSh</option>
                                 <option value="THB">THB - Thai Baht - ฿</option>
                                 <option value="TOP">TOP - Tongan pa'anga - $</option>
                                 <option value="TTD">TTD - Trinidad & Tobago Dollar - $</option>
                                 <option value="TND">TND - Tunisian Dinar - ت.د</option>
                                 <option value="TRY">TRY - Turkish Lira - ₺</option>
                                 <option value="TMT">TMT - Turkmenistani Manat - T</option>
                                 <option value="UGX">UGX - Ugandan Shilling - USh</option>
                                 <option value="UAH">UAH - Ukrainian Hryvnia - ₴</option>
                                 <option value="AED">AED - United Arab Emirates Dirham - إ.د</option>
                                 <option value="UYU">UYU - Uruguayan Peso - $</option>
                                 <option value="UZS">UZS - Uzbekistan Som - лв</option>
                                 <option value="VUV">VUV - Vanuatu Vatu - VT</option>
                                 <option value="VEF">VEF - Venezuelan BolÃvar - Bs</option>
                                 <option value="VND">VND - Vietnamese Dong - ₫</option>
                                 <option value="YER">YER - Yemeni Rial - ﷼</option>
                                 <option value="ZMK">ZMK - Zambian Kwacha - ZK</option>
                              </select>
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group row">
                           <label for="" class="col-sm-4 col-form-label"><?php echo  display('Tax Collected');?><i class="text-danger">*</i></label>
                           <div class="col-sm-8">
                              <select  style="width: 100%;"  class="form-control"   required name="service_provider">
                                 <option value="1"><?php  echo display('yes'); ?></option>
                                 <option value="0" selected><?php  echo display('no'); ?></option>
                              </select>
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="state" class="col-sm-4 col-form-label"><?php  echo display('state'); ?> <i class="text-danger">*</i></label>
                           <div class="col-sm-8">
                              <input class="form-control" name="state" id="state" type="text"  placeholder="State"  required>
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="zip" class="col-sm-4 col-form-label"><?php echo display('zip'); ?> <i class="text-danger">*</i></label>
                           <div class="col-sm-8">
                              <input class="form-control" name="zip" id="zip" type="text" required placeholder="<?php echo display('zip') ?>"  >
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="country" class="col-sm-4 col-form-label"><?php echo display('country'); ?><i class="text-danger">*</i></label>
                           <div class="col-sm-8">
                              <select class="selectpicker countrypicker form-control"  data-live-search="true" data-default="United States"  name="country" id="country"    style="width: 100%;" ></select>
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="address " class="col-sm-4 col-form-label"><?php echo display('address') ?></label>
                           <div class="col-sm-8">
                              <textarea class="form-control" name="address" id="address " rows="2" placeholder="Address" ></textarea>
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="details" class="col-sm-4 col-form-label"><?php echo display('supplier_details') ?></label>
                           <div class="col-sm-8">
                              <textarea class="form-control" name="details" id="details" rows="2" placeholder="<?php echo display('supplier_details') ?>" tabindex="4"></textarea>
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="previous_balance" class="col-sm-4 col-form-label"><?php  echo  display('Credit Limit');?></label>
                           <div class="col-sm-8">
                              <input class="form-control" name="previous_balance" id="previous_balance" type="text" min="0" placeholder="Credit Limit" tabindex="5">
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="city" class="col-sm-4 col-form-label"><?php echo display('city'); ?> <i class="text-danger"></i></label>
                           <div class="col-sm-8">
                              <input class="form-control" name="city" id="city" type="text" placeholder="<?php echo display('city') ?>"  >
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="billing_address" class="col-sm-4  col-form-label"><?php echo  display('Payment Terms');?> <i class="text-danger">*</i></label>
                           <div class="col-sm-8">
                              <select name="payment_terms"  id="terms"  class="form-control "  placeholder="" style="width:100%;"  required="" tabindex="1" >
                                 <option value=""><?php echo  display('Select the payment terms');?></option>
                                 <option value="cod">COD</option>
                                 <option value="30"> 30-<?php echo  display('Days');?></option>
                                 <option value="60"> 60-<?php echo  display('Days');?></option>
                                 <option value="90"> 90-<?php echo  display('Days');?></option>
                                 <option value="45"> 45-<?php echo  display('Days');?></option>
                                 <?php
                                    foreach($paymentterms_add as $cn){?>
                                 <option value="<?php echo $cn['paymentterms_add'];?>">  <?php echo $cn['paymentterms_add'];  ?></option>
                                 <?php } ?>
                              </select>
                           </div>
                        </div>
                     </div>
                     <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                     <div class="form-group row">
                        <label for="adress" class="col-sm-4 col-form-label"><?php echo  display('Attachments');?>
                        </label>
                        <div class="col-sm-8">
                           <input type="file" name="attachments"  style="width:96%;"   class="btnclr form-control">
                        </div>
                     </div>
                  </div>
                  <div class="modal-footer">
                     <a href="#" class="btn btnclr"    data-dismiss="modal"><?php echo  display('Close');?></a>
                     <input type="submit" id="add-supplier-from-expense" name="add-supplier-from-expense"      class="btn btnclr" value="<?php echo  display('submit');?>">
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
   <!------ add new product-->
   <form id="insert_product"  method="post">
      <div class="modal fade" id="product_info" role="dialog">
         <div class="modal-dialog">
            <div class="modal-content" style="width: 150%; height: 140%;text-align:center;">
               <div class="modal-header btnclr "  >
                  <a href="#" class="close" data-dismiss="modal">&times;</a>
                  <h3 class="modal-title"><?php echo display('add_new_product');  ?></h3>
               </div>
               <div class="modal-body">
                  <div id="customeMessage" class="alert hide"></div>
   <form action="ada">
   <div class="panel-body">
   <input type ="hidden" name="csrf_test_name" id="" value="<?php echo $this->security->get_csrf_hash();?>">
   <div class="col-sm-6">
   <div class="form-group row">
   <label for="product_name" class="col-sm-4 col-form-label"><?php echo display('product_name') ?> <i class="text-danger">*</i></label>
   <div class="col-sm-8">
   <input class="form-control" name="product_name" type="text" id="product_name" placeholder="<?php echo display('product_name') ?>" required tabindex="1" >
   </div>
   </div>
   </div>
   <div class="col-sm-6">
   <div class="form-group row">
   <label for="barcode_or_qrcode" class="col-sm-4 col-form-label"><?php echo display('barcode_or_qrcode') ?> <i class="text-danger"></i></label>
   <div class="col-sm-8">
   <?php  $product_id = rand();  ?>
   <input type="text" tabindex="3" class="form-control"  style="width: 100%;" name="barcode"
      placeholder="Barcode/QR-code" id="barcode"  />
   <input type="hidden" tabindex="3" class="form-control"  style="width: 100%;" name="product_id" value="<?php echo  $product_id; ?>"
      placeholder="Barcode/QR-code" id="product_id"  />
   </div>
   </div>
   </div>
   <div class="col-sm-6">
   <div class="form-group row">
   <label for="quantity" class="col-sm-4 col-form-label"><?php echo  display('Quantity');?> <i class="text-danger">*</i></label>
   <div class="col-sm-8">
   <input class="form-control" name="quantity" type="number" id="quantity" placeholder="Enter Product Quantity only" required tabindex="1" >
   </div>
   </div>
   </div>
   <div class="col-sm-6">
   <div class="form-group row">
   <label for="product_model" class="col-sm-4 col-form-label"><?php echo display('model') ?> <i class="text-danger">*</i></label>
   <div class="col-sm-8">
   <input type="text" tabindex="" class="form-control" id="product_model" name="model" required placeholder="<?php echo display('model') ?>" />
   </div>
   </div>
   </div>
   <div class="col-sm-6">
   <div class="form-group row">
   <label for="category_id" class="col-sm-4 col-form-label"><?php echo display('category') ?></label>
   <div class="col-sm-7">
   <select class="form-control" id="category_id" style="width: 250px;"  name="category_id" tabindex="3">
   <option value=""><?php echo  display('Select the Category'); ?></option>
   <?php if ($category_list) { ?>
   {category_list}
   <option value="{category_name}">{category_name}</option>
   {/category_list}
   <?php } ?>
   </select>
   </div>
   </div>
   </div>
   <div class="col-sm-6">
   <div class="form-group row">
   <label for="sell_price" class="col-sm-4 col-form-label"><?php echo display('sell_price') ?> <i class="text-danger">*</i> </label>
   <div class="col-sm-8">
   <input class="form-control" id="sell_price" name="price" type="text" required="" placeholder="0.00" tabindex="5" min="0">
   </div>
   </div>
   </div>
   <div class="col-sm-6">
   <div class="form-group row">
   <label for="" class="col-sm-4 col-form-label"><?php echo display('Supplier') ?> <i class="text-danger">*</i> </label>
   <div class="col-sm-7">
   <select name="supplier_id" id="supplier_id" class="form-control " style="width:118%;" required="" tabindex="1">
   <option value=""><?php echo  display('Select supplier');  ?></option>
   {all_supplier}
   <option value="{supplier_id}">{supplier_name}</option>
   {/all_supplier}
   </select>
   </div>
   </div>
   </div>
   <div class="col-sm-6">
   <div class="form-group row">
   <label for="unit" class="col-sm-4 col-form-label"><?php echo display('unit') ?></label>
   <div class="col-sm-7">
   <select class="form-control" id="unit" name="unit"  style="width:250px;" tabindex="-1" aria-hidden="true">
   <option value=""><?php echo  display('Select the Unit');?></option>
   <?php if ($unit_list) { ?>
   {unit_list}
   <option value="{unit_name}">{unit_name}</option>
   {/unit_list}
   <?php } ?>
   </select>
   </div>
   </div>
   </div>
   <div class="row">
   <div class="col-sm-12">
   <div class="col-sm-6">
   <div class="form-group row">
   <label for="account_category_name" class="col-sm-4 col-form-label"><?php echo  display('Account Category Name');?></label>
   <div class="col-sm-8">
   <input class="form-control" name ="account_category_name" id="account_category_name" type="text" placeholder=" Account Category Name"   tabindex="1" >
   </div>
   </div>
   </div>
   <div class="col-sm-6">
   <div class="form-group row">
   <label for="account_sub_category"  class="col-sm-4 col-form-label"><?php echo  display('Account Sub Category');?></label>
   <div class="col-sm-8">
   <input class="form-control" name ="account_sub_category" id="account_sub_category" type="text" placeholder=" Account Sub Category"  tabindex="1" >
   </div>
   </div>
   </div>
   </div>
   </div>
   <div class="row">
   <div class="col-sm-12">
   <div class="col-sm-6">
   <div class="form-group row">
   <label for="account_category" class="col-sm-4 col-form-label"><?php echo  display('Account Category');?></label>
   <div class="col-sm-8">
   <select id="ddl"  name="account_category" class="form-control" onchange="configureDropDownLists(this,document.getElementById('ddl2'))">
   <option value="">Select the Account Category</option>
   <option value="ASSETS"><?php echo  display('ASSETS');?></option>
   <option value="RECEIVABLES"><?php echo  display('RECEIVABLES');?></option>
   <option value="INVENTORIES"><?php echo  display('INVENTORIES');?></option>
   <option value="PREPAID EXPENSES & OTHER CURRENT ASSETS"><?php echo  display('PREPAID EXPENSES & OTHER CURRENT ASSETS');?></option>
   <option value="PROPERTY PLANT & EQUIPMENT"><?php echo  display('PROPERTY PLANT & EQUIPMENT');?></option>
   <option value="ACCUMULATED DEPRECIATION & AMORTIZATION"><?php echo  display('ACCUMULATED DEPRECIATION & AMORTIZATION');?></option>
   <option value="NON – CURRENT RECEIVABLES"><?php echo  display('NON – CURRENT RECEIVABLES');?></option>
   <option value="INTERCOMPANY RECEIVABLES & OTHER NON-CURRENT ASSETS"><?php echo  display('INTERCOMPANY RECEIVABLES & OTHER NON-CURRENT ASSETS');?></option>
   <option value="LIABILITIES & 2100 PAYABLES"><?php echo  display('LIABILITIES & PAYABLES');?></option>
   <option value="ACCRUED COMPENSATION & RELATED ITEMS"><?php echo  display('ACCRUED COMPENSATION & RELATED ITEMS');?></option>
   <option value="OTHER ACCRUED EXPENSES"><?php echo  display('OTHER ACCRUED EXPENSES');?></option>
   <option value="ACCRUED TAXES"><?php echo  display('ACCRUED TAXES');?></option>
   <option value="DEFERRED TAXES"><?php echo  display('DEFERRED TAXES');?></option>
   <option value="LONG-TERM DEBT"><?php echo  display('LONG-TERM DEBT');?></option>
   <option value="INTERCOMPANY PAYABLES & OTHER NON CURRENT LIABILITIES & OWNERS EQUITIES"><?php echo  display('INTERCOMPANY PAYABLES & OTHER NON CURRENT LIABILITIES & OWNERS EQUITIES');?></option>
   <option value="REVENUE"><?php echo  display('REVENUE');?></option>
   <option value="COST OF GOODS SOLD"><?php echo  display('COST OF GOODS SOLD');?></option>
   <option value="OPERATING EXPENSES"><?php echo  display('OPERATING EXPENSES');?></option>
   </select>
   </div>
   </div>
   </div>
   <div class="col-sm-6">
   <div class="form-group row">
   <label for="product_sub_category" class="col-sm-4 col-form-label"><?php echo  display('Product Sub Category');?><i class="text-danger">*</i></label>
   <div class="col-sm-8">
   <select   name="product_sub_category" id="product_sub_category" class=" form-control" required placeholder="product_sub_category" style="width:100%;">
   <option value=""><?php echo  display('Select the Product Sub Category');?></option>
   <option value="Granite"><?php echo  display('Granite');?></option>
   <option value="Marble"><?php echo  display('Marble');?></option>
   <option value="Quartz"><?php echo  display('Quartz');?></option>
   <option value="Quartzite"><?php echo  display('Quartzite');?></option>
   <option value="Lime Stone"><?php echo  display('Lime Stone');?></option>
   <option value="Dolomite"><?php echo  display('Dolomite');?></option>
   <option value="Sand Stone"><?php echo  display('Sand Stone');?></option>
   <option value="Soap Stone"><?php echo  display('Soap Stone');?></option>
   </select>
   </div>
   </div>
   </div>
   </div>
   </div>
   <div class="col-sm-6">
   <div class="form-group row">
   <label for="sub_category"  class="col-sm-4 col-form-label"><?php echo  display('Account Sub Category');?></label>
   <div class="col-sm-8">
   <select class="form-control" name="sub_category" id="ddl2">
   <option value="Select Sub Category"><?php echo  display('Select Sub Category');?></option>
   </select>
   </div>
   </div>
   </div>
   <div class="col-sm-6">
   <div class="form-group row">
   <label for="image" class="col-sm-4 col-form-label"><?php echo  display('Product Image');?> </label>
   <div class="col-sm-8">
   <input type="file" name="product_image" class="form-control" id="product_image"  tabindex="4">
   </div>
   </div>
   </div>
   <div class="row">
   <div class="col-sm-12">
   <div class="col-sm-6">
   <div class="form-group row">
   <label for="cost_per_sqft" class="col-sm-4 col-form-label"><?php echo  display('Cost per Sq.Ft');?> </label>
   <div class="col-sm-8">
   <input type="text" name="costpersqft" class="form-control" id="cost_per_sqft" tabindex="4" placeholder="cost persqft" />
   </div>
   </div>
   <div class="form-group row">
   <label for="cost_per_slab" class="col-sm-4 col-form-label"><?php echo  display('Cost per Slab');?> </label>
   <div class="col-sm-8">
   <input type="text" name="costperslab" class="form-control" id="cost_per_slab" tabindex="4" placeholder="Cost per Slab" />
   </div>
   </div>
   </div>
   <div class="col-sm-6">
   <div class="form-group row">
   <label for="sales_price" class="col-sm-4 col-form-label"><?php echo display("sales");?>
   <?php echo  display(' Price per Sq.Ft');?> </label>
   <div class="col-sm-8">
   <input type="text" name="salespricepersqft" class="form-control" id="sales_price_per_sqft" tabindex="4"  placeholder=" Sales Price perSq.Ft" />
   </div>
   </div>
   <div class="form-group row">
   <label for="sales_slab_price" class="col-sm-4 col-form-label"><?php echo  display('Sales Slab Price');?> </label>
   <div class="col-sm-8">
   <input type="text" name="salesslabprice" class="form-control" id="sales_slab_price" tabindex="4" placeholder=" Sales Slab Price"  />
   </div>
   </div>
   </div>
   </div>
   </div>
   <div class="row">
   <div class="col-sm-12">
   <div class="col-sm-6">
   <div class="form-group row">
   <label for="tax_id" class="col-sm-4 col-form-label"><?php   echo  display('Taxes');?> </label>
   <div class="col-sm-8">
   <input type="text" name="tax" class="form-control" id="tax_id" tabindex="4" placeholder=" Tax" />
   </div>
   </div>
   </div>
   <div class="col-sm-6">
   <div class="form-group row">
   <label for="country" class="col-sm-4 col-form-label"><?php echo display('country'); ?></label>
   <div class="col-sm-8">
   <select class="selectpicker countpicker form-control"  data-live-search="true" data-default="US-United States"
      name="country" id="country" ></select>  
   </div>
   </div>
   </div>
   <div class="col-sm-6">
   <div class="form-group row">
   <label for="serial_no" class="col-sm-4 col-form-label"><?php  echo  display('Serial No');?></label>
   <div class="col-sm-8">
   <input type="text" tabindex="" class="form-control " id="serial_no" name="serial_no" placeholder="111,abc,XYz"   />
   </div>
   </div>
   </div>
   <div class="row">
   <div class="col-sm-12">
   <center><label for="description" class="col-form-label"><?php echo display('product_details') ?></label></center>
   <textarea class="form-control" name="description" id="description" rows="2" placeholder="<?php echo display('product_details') ?>" tabindex="2"></textarea>
   </div>
   </div><br>
   <div class="form-group row">
   <div class="col-sm-6"></div>
   <div class="col-sm-6" style="text-align: -webkit-right;">
   <a href="#" class="btnclr btn"   data-dismiss="modal"><?php echo display('close');  ?></a>
   <input type="submit" id="add-product"   class="btnclr btn" name="insert_product" value="<?php echo display('save') ?>" tabindex="10"/>
   </div>
   </div>
   </div>
   </div>
   </div>
   </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
   </div><!-- /.modal -->
   </form>
   <div id="myModal3" class="modal fade">
   <div class="modal-dialog">
   <div class="modal-content" style="text-align:center;">
   <div class="modal-header btnclr "  >
   <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
   <h4 class="modal-title"><?php echo  display('Confirmation');?></h4>
   </div>
   <div class="modal-body">
   <p><?php echo  display('Your Invoice is not submitted. Would you like to submit or discard');?>
   </p>
   <p class="text-warning">
   <small><?php echo  display('If you dont save, your changes will not be saved.');?></small>
   </p>
   </div>
   <div class="modal-footer">
   <input type="submit" id="final_submit" class="btnclr btn  pull-left final_submit" onclick="submit_redirect()"  value="Submit"/>
   <button id="btdelete" type="button" class=" btnclr btn btn-danger pull-left" onclick="discard()"><?php  echo  display('Discard');?></button>
   </div>
   </div>
   </div>
   </div>
   </div><!-- /.modal -->
   <div class="modal fade" id="payment_modal" >
      <div class="modal-dialog">
         <!-- Modal content-->
         <div class="modal-content" style="    margin-top: 190px;text-align:center;">
            <div class="modal-header btnclr " >
               <button type="button" class="close" data-dismiss="modal">&times;</button>
               <h4 class="modal-title"><?php echo  display('add_payment'); ?></h4>
            </div>
            <div class="modal-body">
               <form id="add_payment_info"  method="post" >
                  <div class="row">
                     <div class="form-group row">
                        <label for="date" style="text-align:end;" class="col-sm-3 col-form-label"><?php  echo  display('payment_date'); ?> <i class="text-danger">*</i></label>
                        <div class="col-sm-5">
                           <?php
                              $date = date('Y-m-d');
                              ?>
                           <input class=" form-control" type="date"  name="payment_date" id="payment_date" required value="<?php echo html_escape($date); ?>" tabindex="4" />
                        </div>
                     </div>
                     <input type="hidden" id="cutomer_name" name="cutomer_name"/>
                     <input type="hidden"   class="payment_id"  name="payment_id"/>
                     <div class="form-group row">
                        <label for="billing_address" style="text-align:end;" class="col-sm-3 col-form-label"><?php  echo  display('Reference No'); ?><i class="text-danger">*</i></label>
                        <div class="col-sm-5">
                           <input class=" form-control" type="text"  name="ref_no" id="ref_no" required   />
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="bank" style="text-align:end;" class="col-sm-3 col-form-label"><?php  echo  display('Select Bank'); ?>:<i class="text-danger">*</i></label>
                        <a data-toggle="modal" href="#add_bank_info"    class="btn btnclr"><i class="fa fa-university"></i></a>
                        <div class="col-sm-5">
                           <select name="bank" id="bank"  class="form-control bankpayment" >
                              <option value="JPMorgan Chase">JPMorgan Chase</option>
                              <option value="New York City">New York City</option>
                              <option value="Bank of America">Bank of America</option>
                              <option value="Citigroup">Citigroup</option>
                              <option value="Wells Fargo">Wells Fargo</option>
                              <option value="Goldman Sachs">Goldman Sachs</option>
                              <option value="Morgan Stanley">Morgan Stanley</option>
                              <option value="U.S. Bancorp">U.S. Bancorp</option>
                              <option value="PNC Financial Services">PNC Financial Services</option>
                              <option value="Truist Financial">Truist Financial</option>
                              <option value="Charles Schwab Corporation">Charles Schwab Corporation</option>
                              <option value="TD Bank, N.A.">TD Bank, N.A.</option>
                              <option value="Capital One">Capital One</option>
                              <option value="The Bank of New York Mellon">The Bank of New York Mellon</option>
                              <option value="State Street Corporation">State Street Corporation</option>
                              <option value="American Express">American Express</option>
                              <option value="Citizens Financial Group">Citizens Financial Group</option>
                              <option value="HSBC Bank USA">HSBC Bank USA</option>
                              <option value="SVB Financial Group">SVB Financial Group</option>
                              <option value="First Republic Bank ">First Republic Bank </option>
                              <option value="Fifth Third Bank">Fifth Third Bank</option>
                              <option value="BMO USA">BMO USA</option>
                              <option value="USAA">USAA</option>
                              <option value="UBS">UBS</option>
                              <option value="M&T Bank">M&T Bank</option>
                              <option value="Ally Financial">Ally Financial</option>
                              <option value="KeyCorp">KeyCorp</option>
                              <option value="Huntington Bancshares">Huntington Bancshares</option>
                              <option value="Barclays">Barclays</option>
                              <option value="Santander Bank">Santander Bank</option>
                              <option value="RBC Bank">RBC Bank</option>
                              <option value="Ameriprise">Ameriprise</option>
                              <option value="Regions Financial Corporation">Regions Financial Corporation</option>
                              <option value="Northern Trust">Northern Trust</option>
                              <option value="BNP Paribas">BNP Paribas</option>
                              <option value="Discover Financial">Discover Financial</option>
                              <option value="First Citizens BancShares">First Citizens BancShares</option>
                              <option value="Synchrony Financial">Synchrony Financial</option>
                              <option value="Deutsche Bank">Deutsche Bank</option>
                              <option value="New York Community Bank">New York Community Bank</option>
                              <option value="Comerica">Comerica</option>
                              <option value="First Horizon National Corporation">First Horizon National Corporation</option>
                              <option value="Raymond James Financial">Raymond James Financial</option>
                              <option value="Webster Bank">Webster Bank</option>
                              <option value="Western Alliance Bank">Western Alliance Bank</option>
                              <option value="Popular, Inc.">Popular, Inc.</option>
                              <option value="CIBC Bank USA">CIBC Bank USA</option>
                              <option value="East West Bank">East West Bank</option>
                              <option value="Synovus">Synovus</option>
                              <option value="Valley National Bank">Valley National Bank</option>
                              <option value="Credit Suisse ">Credit Suisse </option>
                              <option value="Mizuho Financial Group">Mizuho Financial Group</option>
                              <option value="Wintrust Financial">Wintrust Financial</option>
                              <option value="Cullen/Frost Bankers, Inc.">Cullen/Frost Bankers, Inc.</option>
                              <option value="John Deere Capital Corporation">John Deere Capital Corporation</option>
                              <option value="MUFG Union Bank">MUFG Union Bank</option>
                              <option value="BOK Financial Corporation">BOK Financial Corporation</option>
                              <option value="Old National Bank">Old National Bank</option>
                              <option value="South State Bank">South State Bank</option>
                              <option value="FNB Corporation">FNB Corporation</option>
                              <option value="Pinnacle Financial Partners">Pinnacle Financial Partners</option>
                              <option value="PacWest Bancorp">PacWest Bancorp</option>
                              <option value="TIAA">TIAA</option>
                              <option value="Associated Banc-Corp">Associated Banc-Corp</option>
                              <option value="UMB Financial Corporation">UMB Financial Corporation</option>
                              <option value="Prosperity Bancshares">Prosperity Bancshares</option>
                              <option value="Stifel">Stifel</option>
                              <option value="BankUnited">BankUnited</option>
                              <option value="Hancock Whitney">Hancock Whitney</option>
                              <option value="MidFirst Bank">MidFirst Bank</option>
                              <option value="Sumitomo Mitsui Banking Corporation">Sumitomo Mitsui Banking Corporation</option>
                              <option value="Beal Bank">Beal Bank</option>
                              <option value="First Interstate BancSystem">First Interstate BancSystem</option>
                              <option value="Commerce Bancshares">Commerce Bancshares</option>
                              <option value="Umpqua Holdings Corporation">Umpqua Holdings Corporation</option>
                              <option value="United Bank (West Virginia)">United Bank (West Virginia)</option>
                              <option value="Texas Capital Bank">Texas Capital Bank</option>
                              <option value="First National of Nebraska">First National of Nebraska</option>
                              <option value="FirstBank Holding Co">FirstBank Holding Co</option>
                              <option value="Simmons Bank">Simmons Bank</option>
                              <option value="Fulton Financial Corporation">Fulton Financial Corporation</option>
                              <option value="Glacier Bancorp">Glacier Bancorp</option>
                              <option value="Arvest Bank">Arvest Bank</option>
                              <option value="BCI Financial Group">BCI Financial Group</option>
                              <option value="Ameris Bancorp">Ameris Bancorp</option>
                              <option value="First Hawaiian Bank">First Hawaiian Bank</option>
                              <option value="United Community Bank">United Community Bank</option>
                              <option value="Bank of Hawaii">Bank of Hawaii</option>
                              <option value="Home BancShares">Home BancShares</option>
                              <option value="Eastern Bank">Eastern Bank</option>
                              <option value="Cathay Bank">Cathay Bank</option>
                              <option value="Pacific Premier Bancorp">Pacific Premier Bancorp</option>
                              <option value="Washington Federal">Washington Federal</option>
                              <option value="Customers Bancorp">Customers Bancorp</option>
                              <option value="Atlantic Union Bank">Atlantic Union Bank</option>
                              <option value="Columbia Bank">Columbia Bank</option>
                              <option value="Heartland Financial USA">Heartland Financial USA</option>
                              <option value="WSFS Bank">WSFS Bank</option>
                              <option value="Central Bancompany">Central Bancompany</option>
                              <option value="Independent Bank">Independent Bank</option>
                              <option value="Hope Bancorp">Hope Bancorp</option>
                              <option value="SoFi">SoFi</option>
                              <?php foreach($bank_list as $b){ ?>
                              <option value="<?=$b['bank_name']; ?>"><?=$b['bank_name']; ?></option>
                              <?php } ?>
                           </select>
                        </div>
                     </div>
                     <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                     <input class=" form-control" type="hidden"  readonly name="customer_name_modal" id="customer_name_modal" required   />    
                     <div class="form-group row">
                        <label for="billing_address" style="text-align:end;" class="col-sm-3 col-form-label"><?php  echo display('Amount to be paid'); ?> : </label>
                        <div class="col-sm-5">
                           <table border="0">
                              <tr>
                                 <td class="cus" name="cus"><?php echo $curn_info_default; ?></td>
                                 <td><input  type="text"  readonly name="amount_to_pay" id="amount_to_pay"   style="width:130%;" class="form-control" required   /></td>
                              </tr>
                           </table>
                        </div>
                     </div>
                     <div class="form-group row" style="display:none;">
                        <label for="billing_address" style="text-align:end;" class="col-sm-3 col-form-label"><?php  echo display('Amount Received'); ?>:</label>
                        <div class="col-sm-5">
                           <table border="0">
                              <tr>
                                 <td class="cus" name="cus"><?php echo $curn_info_default; ?></td>
                                 <td><input  type="text"  readonly name="amount_received" style="width:130%;"  id="amount_received" class="form-control"required   /></td>
                              </tr>
                           </table>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="billing_address" style="text-align:end;"    class="col-sm-3 col-form-label"><?php  echo display('balance_ammount'); ?>: </label>
                        <div class="col-sm-5">
                           <table border="0">
                              <tr>
                                 <td class="cus" name="cus"><?php echo $curn_info_default; ?></td>
                                 <td><input  type="text"   readonly name="balance_modal"  style="width:130%;" id="balance_modal" class="form-control" required  /></td>
                              </tr>
                           </table>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="billing_address" style="text-align:end;" class="col-sm-3 col-form-label"><?php echo display('payment_amount');  ?>:<i class="text-danger">*</i></label>
                        <div class="col-sm-5">
                           <table border="0">
                              <tr>
                                 <td class="cus" name="cus"></td>
                                 <td><input  type="text"   name="payment" id="payment_from_modal"  style="width:130%;" class="form-control"required   /></td>
                              </tr>
                           </table>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="billing_address" style="text-align:end;" class="col-sm-3 col-form-label"><?php  echo display('Additional Information');  ?> : </label>
                        <div class="col-sm-5">
                           <input class=" form-control" type="text"  name="details" id="details"/>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="billing_address" style="text-align:end;" class="col-sm-3 col-form-label"><?php  echo display('Attachments');  ?> : </label>
                        <div class="col-sm-5">
                           <input class=" form-control" type="file"  name="attachement" id="attachement" />
                        </div>
                     </div>
                  </div>
            </div>
            <div class="modal-footer">
            <div class="col-sm-8"></div>
            <div class="col-sm-4">
            <a href="#" class="btnclr btn" data-dismiss="modal"   ><?php  echo display('Close');  ?></a>
            <input class="btnclr btn  " type="submit"   name="submit_pay" id="submit_pay"   value="<?php  echo display('submit');  ?>"  required   />
            </div>
            </div>
         </div>
         </form>
      </div>
   </div>
   <div class="modal fade" id="add_bank_info">
      <div class="modal-dialog">
         <div class="modal-content" style="text-align:center;">
            <div class="modal-header btnclr "   >
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
               <h4 class="modal-title"><?php echo display('add_new_bank');  ?></h4>
            </div>
            <div class="container"></div>
            <div class="modal-body">
               <div id="customeMessage" class="alert hide"></div>
               <form id="add_bank"  method="post">
                  <div class="panel-body">
                     <input type ="hidden" name="csrf_test_name" id="" value="<?php echo $this->security->get_csrf_hash();?>">
                     <div class="form-group row">
                        <label for="bank_name" class="col-sm-4 col-form-label"><?php echo display('bank_name') ?> <i class="text-danger">*</i></label>
                        <div class="col-sm-6">
                           <input type="text" class="form-control" name="bank_name" id="bank_name" required="" placeholder="<?php echo display('bank_name') ?>" tabindex="1"/>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="ac_name" class="col-sm-4 col-form-label"><?php echo display('ac_name') ?> <i class="text-danger">*</i></label>
                        <div class="col-sm-6">
                           <input type="text" class="form-control" name="ac_name" id="ac_name" required="" placeholder="<?php echo display('ac_name') ?>" tabindex="2"/>
                        </div>
                     </div>
                     <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                     <div class="form-group row">
                        <label for="ac_no" class="col-sm-4 col-form-label"><?php echo display('ac_no') ?> <i class="text-danger">*</i></label>
                        <div class="col-sm-6">
                           <input type="text" class="form-control" name="ac_no" id="ac_no" required="" placeholder="<?php echo display('ac_no') ?>" tabindex="3"/>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="branch" class="col-sm-4 col-form-label"><?php echo display('branch') ?> <i class="text-danger">*</i></label>
                        <div class="col-sm-6">
                           <input type="text" class="form-control" name="branch" id="branch" required="" placeholder="<?php echo display('branch') ?>" tabindex="4"/>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="shipping_line" class="col-sm-4 col-form-label"><?php echo display('country');  ?>
                        <i class="text-danger"></i>
                        </label>
                        <div class="col-sm-6">
                           <select class="selectpicker countrypicker form-control"  data-live-search="true" data-default="United States"  name="country" id="country" style="width:100%"></select>
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="previous_balance" class="col-sm-4 col-form-label"><?php echo display('currency'); ?></label>
                        <div class="col-sm-6">
                           <select  class="form-control" id="currency" name="currency1"  style="width: 100%;" required=""  style="max-width: -webkit-fill-available;">
                              <option value="AFN">AFN - Afghan Afghani</option>
                              <option value="ALL">ALL - Albanian Lek</option>
                              <option value="DZD">DZD - Algerian Dinar</option>
                              <option value="AOA">AOA - Angolan Kwanza</option>
                              <option value="ARS">ARS - Argentine Peso</option>
                              <option value="AMD">AMD - Armenian Dram</option>
                              <option value="AWG">AWG - Aruban Florin</option>
                              <option value="AUD">AUD - Australian Dollar</option>
                              <option value="AZN">AZN - Azerbaijani Manat</option>
                              <option value="BSD">BSD - Bahamian Dollar</option>
                              <option value="BHD">BHD - Bahraini Dinar</option>
                              <option value="BDT">BDT - Bangladeshi Taka</option>
                              <option value="BBD">BBD - Barbadian Dollar</option>
                              <option value="BYR">BYR - Belarusian Ruble</option>
                              <option value="BEF">BEF - Belgian Franc</option>
                              <option value="BZD">BZD - Belize Dollar</option>
                              <option value="BMD">BMD - Bermudan Dollar</option>
                              <option value="BTN">BTN - Bhutanese Ngultrum</option>
                              <option value="BTC">BTC - Bitcoin</option>
                              <option value="BOB">BOB - Bolivian Boliviano</option>
                              <option value="BAM">BAM - Bosnia-Herzegovina Convertible Mark</option>
                              <option value="BWP">BWP - Botswanan Pula</option>
                              <option value="BRL">BRL - Brazilian Real</option>
                              <option value="GBP">GBP - British Pound Sterling</option>
                              <option value="BND">BND - Brunei Dollar</option>
                              <option value="BGN">BGN - Bulgarian Lev</option>
                              <option value="BIF">BIF - Burundian Franc</option>
                              <option value="KHR">KHR - Cambodian Riel</option>
                              <option value="CAD">CAD - Canadian Dollar</option>
                              <option value="CVE">CVE - Cape Verdean Escudo</option>
                              <option value="KYD">KYD - Cayman Islands Dollar</option>
                              <option value="XOF">XOF - CFA Franc BCEAO</option>
                              <option value="XAF">XAF - CFA Franc BEAC</option>
                              <option value="XPF">XPF - CFP Franc</option>
                              <option value="CLP">CLP - Chilean Peso</option>
                              <option value="CNY">CNY - Chinese Yuan</option>
                              <option value="COP">COP - Colombian Peso</option>
                              <option value="KMF">KMF - Comorian Franc</option>
                              <option value="CDF">CDF - Congolese Franc</option>
                              <option value="CRC">CRC - Costa Rican ColÃ³n</option>
                              <option value="HRK">HRK - Croatian Kuna</option>
                              <option value="CUC">CUC - Cuban Convertible Peso</option>
                              <option value="CZK">CZK - Czech Republic Koruna</option>
                              <option value="DKK">DKK - Danish Krone</option>
                              <option value="DJF">DJF - Djiboutian Franc</option>
                              <option value="DOP">DOP - Dominican Peso</option>
                              <option value="XCD">XCD - East Caribbean Dollar</option>
                              <option value="EGP">EGP - Egyptian Pound</option>
                              <option value="ERN">ERN - Eritrean Nakfa</option>
                              <option value="EEK">EEK - Estonian Kroon</option>
                              <option value="ETB">ETB - Ethiopian Birr</option>
                              <option value="EUR">EUR - Euro</option>
                              <option value="FKP">FKP - Falkland Islands Pound</option>
                              <option value="FJD">FJD - Fijian Dollar</option>
                              <option value="GMD">GMD - Gambian Dalasi</option>
                              <option value="GEL">GEL - Georgian Lari</option>
                              <option value="DEM">DEM - German Mark</option>
                              <option value="GHS">GHS - Ghanaian Cedi</option>
                              <option value="GIP">GIP - Gibraltar Pound</option>
                              <option value="GRD">GRD - Greek Drachma</option>
                              <option value="GTQ">GTQ - Guatemalan Quetzal</option>
                              <option value="GNF">GNF - Guinean Franc</option>
                              <option value="GYD">GYD - Guyanaese Dollar</option>
                              <option value="HTG">HTG - Haitian Gourde</option>
                              <option value="HNL">HNL - Honduran Lempira</option>
                              <option value="HKD">HKD - Hong Kong Dollar</option>
                              <option value="HUF">HUF - Hungarian Forint</option>
                              <option value="ISK">ISK - Icelandic KrÃ³na</option>
                              <option value="INR">INR - Indian Rupee</option>
                              <option value="IDR">IDR - Indonesian Rupiah</option>
                              <option value="IRR">IRR - Iranian Rial</option>
                              <option value="IQD">IQD - Iraqi Dinar</option>
                              <option value="ILS">ILS - Israeli New Sheqel</option>
                              <option value="ITL">ITL - Italian Lira</option>
                              <option value="JMD">JMD - Jamaican Dollar</option>
                              <option value="JPY">JPY - Japanese Yen</option>
                              <option value="JOD">JOD - Jordanian Dinar</option>
                              <option value="KZT">KZT - Kazakhstani Tenge</option>
                              <option value="KES">KES - Kenyan Shilling</option>
                              <option value="KWD">KWD - Kuwaiti Dinar</option>
                              <option value="KGS">KGS - Kyrgystani Som</option>
                              <option value="LAK">LAK - Laotian Kip</option>
                              <option value="LVL">LVL - Latvian Lats</option>
                              <option value="LBP">LBP - Lebanese Pound</option>
                              <option value="LSL">LSL - Lesotho Loti</option>
                              <option value="LRD">LRD - Liberian Dollar</option>
                              <option value="LYD">LYD - Libyan Dinar</option>
                              <option value="LTL">LTL - Lithuanian Litas</option>
                              <option value="MOP">MOP - Macanese Pataca</option>
                              <option value="MKD">MKD - Macedonian Denar</option>
                              <option value="MGA">MGA - Malagasy Ariary</option>
                              <option value="MWK">MWK - Malawian Kwacha</option>
                              <option value="MYR">MYR - Malaysian Ringgit</option>
                              <option value="MVR">MVR - Maldivian Rufiyaa</option>
                              <option value="MRO">MRO - Mauritanian Ouguiya</option>
                              <option value="MUR">MUR - Mauritian Rupee</option>
                              <option value="MXN">MXN - Mexican Peso</option>
                              <option value="MDL">MDL - Moldovan Leu</option>
                              <option value="MNT">MNT - Mongolian Tugrik</option>
                              <option value="MAD">MAD - Moroccan Dirham</option>
                              <option value="MZM">MZM - Mozambican Metical</option>
                              <option value="MMK">MMK - Myanmar Kyat</option>
                              <option value="NAD">NAD - Namibian Dollar</option>
                              <option value="NPR">NPR - Nepalese Rupee</option>
                              <option value="ANG">ANG - Netherlands Antillean Guilder</option>
                              <option value="TWD">TWD - New Taiwan Dollar</option>
                              <option value="NZD">NZD - New Zealand Dollar</option>
                              <option value="NIO">NIO - Nicaraguan CÃ³rdoba</option>
                              <option value="NGN">NGN - Nigerian Naira</option>
                              <option value="KPW">KPW - North Korean Won</option>
                              <option value="NOK">NOK - Norwegian Krone</option>
                              <option value="OMR">OMR - Omani Rial</option>
                              <option value="PKR">PKR - Pakistani Rupee</option>
                              <option value="PAB">PAB - Panamanian Balboa</option>
                              <option value="PGK">PGK - Papua New Guinean Kina</option>
                              <option value="PYG">PYG - Paraguayan Guarani</option>
                              <option value="PEN">PEN - Peruvian Nuevo Sol</option>
                              <option value="PHP">PHP - Philippine Peso</option>
                              <option value="PLN">PLN - Polish Zloty</option>
                              <option value="QAR">QAR - Qatari Rial</option>
                              <option value="RON">RON - Romanian Leu</option>
                              <option value="RUB">RUB - Russian Ruble</option>
                              <option value="RWF">RWF - Rwandan Franc</option>
                              <option value="SVC">SVC - Salvadoran ColÃ³n</option>
                              <option value="WST">WST - Samoan Tala</option>
                              <option value="SAR">SAR - Saudi Riyal</option>
                              <option value="RSD">RSD - Serbian Dinar</option>
                              <option value="SCR">SCR - Seychellois Rupee</option>
                              <option value="SLL">SLL - Sierra Leonean Leone</option>
                              <option value="SGD">SGD - Singapore Dollar</option>
                              <option value="SKK">SKK - Slovak Koruna</option>
                              <option value="SBD">SBD - Solomon Islands Dollar</option>
                              <option value="SOS">SOS - Somali Shilling</option>
                              <option value="ZAR">ZAR - South African Rand</option>
                              <option value="KRW">KRW - South Korean Won</option>
                              <option value="XDR">XDR - Special Drawing Rights</option>
                              <option value="LKR">LKR - Sri Lankan Rupee</option>
                              <option value="SHP">SHP - St. Helena Pound</option>
                              <option value="SDG">SDG - Sudanese Pound</option>
                              <option value="SRD">SRD - Surinamese Dollar</option>
                              <option value="SZL">SZL - Swazi Lilangeni</option>
                              <option value="SEK">SEK - Swedish Krona</option>
                              <option value="CHF">CHF - Swiss Franc</option>
                              <option value="SYP">SYP - Syrian Pound</option>
                              <option value="STD">STD - São Tomé and Príncipe Dobra</option>
                              <option value="TJS">TJS - Tajikistani Somoni</option>
                              <option value="TZS">TZS - Tanzanian Shilling</option>
                              <option value="THB">THB - Thai Baht</option>
                              <option value="TOP">TOP - Tongan pa'anga</option>
                              <option value="TTD">TTD - Trinidad & Tobago Dollar</option>
                              <option value="TND">TND - Tunisian Dinar</option>
                              <option value="TRY">TRY - Turkish Lira</option>
                              <option value="TMT">TMT - Turkmenistani Manat</option>
                              <option value="UGX">UGX - Ugandan Shilling</option>
                              <option value="UAH">UAH - Ukrainian Hryvnia</option>
                              <option value="AED">AED - United Arab Emirates Dirham</option>
                              <option value="UYU">UYU - Uruguayan Peso</option>
                              <option value="USD" selected="selected">USD - US Dollar</option>
                              <option value="UZS">UZS - Uzbekistan Som</option>
                              <option value="VUV">VUV - Vanuatu Vatu</option>
                              <option value="VEF">VEF - Venezuelan BolÃ­var</option>
                              <option value="VND">VND - Vietnamese Dong</option>
                              <option value="YER">YER - Yemeni Rial</option>
                              <option value="ZMK">ZMK - Zambian Kwacha</option>
                           </select>
                        </div>
                     </div>
                  </div>
            </div>
            <div class="modal-footer">
            <div class="row">
            <div class="col-sm-8">
            </div>
            <div class="col-sm-4">
            <a href="#" class="btn btnclr "   data-dismiss="modal"><?php echo display('Close'); ?></a>
            <input type="submit" id="addBank"    class="btn btnclr " name="addBank" value="<?php echo display('save') ?>"/>
            </div>
            </div>  </div>
            </form>
         </div>
      </div>
   </div>
   <!------ add new Payment Type -->  
   <div class="modal fade" id="payment_type" role="dialog">
      <div class="modal-dialog" role="document">
         <div class="modal-content" style="text-align:center;">
            <div class="modal-header btnclr" >
               <a href="#" class="close" data-dismiss="modal">&times;</a>
               <h4 class="modal-title"><?php echo display('Add New Payment Type');?></h4>
            </div>
            <div class="modal-body">
               <div id="customeMessage" class="alert hide"></div>
               <form id="add_pay_type" method="post">
                  <div class="panel-body">
                     <input type ="hidden" name="csrf_test_name" id="" value="<?php echo $this->security->get_csrf_hash();?>">
                     <div class="form-group row">
                        <label for="customer_name"  class="col-sm-4 col-form-label"><?php echo display('New Payment Type');?> <i class="text-danger">*</i></label>
                        <div class="col-sm-6">
                           <input class="form-control" name ="new_payment_type" id="new_payment_type" type="text" placeholder="New Payment Type"  required="" tabindex="1">
                        </div>
                     </div>
                  </div>
            </div>
            <div class="modal-footer">
            <a href="#" class="btn btnclr"     data-dismiss="modal"><?php echo display('Close');?></a>
            <input type="submit"     class="btn btnclr" value="<?php echo display('submit');?>">
            </div>
            </form>
         </div>
         <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
   </div>
   <!-- /.modal -->
</div>
</section>
</div>
<!------ add new Payment Type -->  
<div class="modal fade" id="payment_type_new" role="dialog">
   <div class="modal-dialog" role="document">
      <div class="modal-content" style="text-align:center;">
         <div class="modal-header btnclr" >
            <a href="#" class="close" data-dismiss="modal">&times;</a>
            <h4 class="modal-title"><?php echo display('Add New Payment Terms');?></h4>
         </div>
         <div class="modal-body">
            <div id="customeMessage" class="alert hide"></div>
            <form id="add_pay_terms" method="post">
               <div class="panel-body">
                  <input type ="hidden" name="csrf_test_name" id="" value="<?php echo $this->security->get_csrf_hash();?>">
                  <div class="form-group row">
                     <label for="customer_name" class="col-sm-4 col-form-label"><?php echo display('New Payment Terms');?> <i class="text-danger">*</i></label>
                     <div class="col-sm-6">
                        <input class="form-control" name ="new_payment_terms" id="new_payment_terms" type="text" placeholder="New Payment Terms"  required="" tabindex="1">
                     </div>
                  </div>
               </div>
         </div>
         <div class="modal-footer">
         <a href="#" class="btn btnclr"   data-dismiss="modal"><?php echo display('Close');?></a>
         <input type="submit" class="btn btnclr"   value="<?php echo display('submit');?>">
         </div>
         </form>
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<div class="modal fade" id="expensetax_info" role="dialog">
   <div class="modal-dialog" role="document">
      <div class="modal-content" style="text-align:center;">
         <div class="modal-header btnclr"  >
            <a href="#" class="close" data-dismiss="modal">&times;</a>
            <h4 class="modal-title">Add Tax Information </h4>
         </div>
         <div class="modal-body">
            <div id="customeMessage" class="alert hide"></div>
            <form id="expensetax_btn" method="post">
               <div class="panel-body">
                  <input type ="hidden" name="csrf_test_name" id="" value="<?php echo $this->security->get_csrf_hash();?>">
                  <input type ="hidden" name="status_type" value="expenses">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="form-group">
                           <label>Enter Tax percent % <span class="text-danger">*</span></label>
                           <input type="text" class="form-control" name="tax" id="enter_tax" step="0.01" maxlength="3" required="" placeholder="%" />
                        </div>
                     </div>
                     <div class="col-md-12">
                        <div class="form-group">
                           <label>Description</label>
                           <input type="text" class="form-control" name ="description" id="description" type="text" placeholder="Description">
                        </div>
                     </div>
                     <div class="col-md-12">
                        <div class="form-group">
                           <label>State <span class="text-danger">*</span></label>
                           <select name="state" class="form-control" required>
                              <option selected="true" disabled="disabled" value="">Please Select State</option>
                              <option value="Alabama">AL - State of Alabama</option>
                              <option value="Alaska">AK - State of Alaska</option>
                              <option value="Arizona">AZ - State of Arizona</option>
                              <option value="Arkansas">AR - State of Arkansas</option>
                              <option value="California">CA - State of California</option>
                              <option value="Colorado">CO - State of Colorado</option>
                              <option value="Connecticut">CT - State of Connecticut</option>
                              <option value="Delaware">DE - State of Delaware</option>
                              <option value="Florida">FL - State of Florida</option>
                              <option value="Georgia">GA - State of Georgia</option>
                              <option value="Hawaii">HI - State of Hawaii</option>
                              <option value="Idaho">ID - State of Idaho</option>
                              <option value="Illinois">IL - State of Illinois</option>
                              <option value="Indiana">IN - State of Indiana</option>
                              <option value="Iowa">IA - State of Iowa</option>
                              <option value="Kansas">KS - State of Kansas</option>
                              <option value="Kentucky">KY - State of Kentucky</option>
                              <option value="Louisiana">LA - State of Louisiana</option>
                              <option value="Maine">ME - State of Maine</option>
                              <option value="Maryland">MD - State of Maryland</option>
                              <option value="Massachusetts">MA - State of Massachusetts</option>
                              <option value="Michigan">MI - State of Michigan</option>
                              <option value="Minnesota">MN - State of Minnesota</option>
                              <option value="Mississippi">MS - State of Mississippi</option>
                              <option value="Missouri">MO - State of Missouri</option>
                              <option value="Montana">MT - State of Montana</option>
                              <option value="Nebraska">NE - State of Nebraska</option>
                              <option value="Nevada">NV - State of Nevada</option>
                              <option value="New Hampshire">NH - State of New Hampshire</option>
                              <option value="New Jersey">NJ - State of New Jersey</option>
                              <option value="New Mexico">NM - State of New Mexico</option>
                              <option value="New York">NY - State of New York</option>
                              <option value="North Carolina">NC - State of North Carolina</option>
                              <option value="North Dakota">ND - State of North Dakota</option>
                              <option value="Ohio">OH - State of Ohio</option>
                              <option value="Oklahoma">OK - State of Oklahoma</option>
                              <option value="Oregon">OR - State of Oregon</option>
                              <option value="Pennsylvania">PA - State of Pennsylvania</option>
                              <option value="Rhode Island">RI - State of Rhode Island</option>
                              <option value="South Carolina">SC - State of South Carolina</option>
                              <option value="South Dakota">SD - State of South Dakota</option>
                              <option value="Tennessee">TN - State of Tennessee</option>
                              <option value="Texas">TX - State of Texas</option>
                              <option value="Utah">UT - State of Utah</option>
                              <option value="Vermont">VT - State of Vermont</option>
                              <option value="Virginia">VA - State of Virginia</option>
                              <option value="Washington">WA - State of Washington</option>
                              <option value="West Virginia">WV - State of West Virginia</option>
                              <option value="Wisconsin">WI - State of Wisconsin</option>
                              <option value="Wyoming">WY - State of Wyoming</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-12">
                        <div class="form-group">
                           <label>Tax Agency <span class="text-danger">*</span></label>
                           <select name="tax_agency" class="form-control" required>
                              <option selected="true" disabled="disabled"  value="">Please Select Taxes</option>
                              <option value="Federal Taxes">Federal Taxes</option>
                              <option value="State Taxes">State Taxes</option>
                              <option value="Municipal Taxes">Municipal Taxes</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-12">
                        <div class="form-group">
                           <label>Account <span class="text-danger">*</span></label>
                           <select name="account" class="form-control" required>
                              <option selected="true" disabled="disabled"  value="">Please Select Accounts</option>
                              <option value="Accounts receivable">Accounts receivable</option>
                              <option value="Accounts payable">Accounts payable</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-12">
                        <div class="form-group">
                           <label>Show Tax On Return Line <span class="text-danger">*</span></label>
                           <select name="show_taxonreturn" class="form-control" required>
                              <option selected="true" disabled="disabled" value="">Please Select tax on return line</option>
                              <option>Tax collected on sales</option>
                              <option>Adjustments to tax on sales</option>
                              <option>Other adjustments</option>
                           </select>
                        </div>
                     </div>
                  </div>
               </div>
         </div>
         <div class="modal-footer">
         <a href="#" class="btn btnclr"   data-dismiss="modal"><?php echo display('Close') ?> </a>
         <input type="submit" class="btn btnclr"   value=<?php echo display('Submit') ?>>
         </div>
         </form>
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
   var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
   var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';
   $(document).ready(function(){
   
   });
   
   $('#insert_product').submit(function (event) {
   event.preventDefault();
   var dataString = {
   dataString : $("#insert_product").serialize()
   };
   dataString[csrfName] = csrfHash;
   $.ajax({
   type:"POST",
   dataType:"json",
   url:"<?php echo base_url(); ?>Cproduct/insert_product",
   data:$("#insert_product").serialize(),
   success:function (data1) {
   console.log(data1);
   
   $("#magicHouses").empty();
   for (var i in data1) {
     $("<option/>").html(data1[i].product_name +'-'+ data1[i].product_model).appendTo("#magicHouses");
   }
   
   
   
   $("#bodyModal1").html("<?php echo display('Product Added Successfully');?>");
   
   $('#myModal1').modal('show');
   $('#insert_product')[0].reset();
   
   window.setTimeout(function(){
   $('#product_info').modal('hide');
   $('.modal-backdrop').remove();
   $('#myModal1').modal('hide');
   }, 2000);
   }
   });
   });
   
   
   
   $('#add_pay_type').submit(function(e){
   e.preventDefault();
   var data = {
   
   
   new_payment_type : $('#new_payment_type').val()
   
   };
   data[csrfName] = csrfHash;
   
   $.ajax({
    type:'POST',
    data: data, 
   dataType:"json",
    url:'<?php echo base_url();?>Cinvoice/add_payment_type',
    success: function(data1, statut) {
    var $select = $('select#paytype_drop');
   
      $select.empty();
   
        for(var i = 0; i < data1.length; i++) {
   var option = $('<option/>').attr('value', data1[i].payment_type).text(data1[i].payment_type);
   $select.append(option); // append new options
        }
   $('#new_payment_type').val('');
   
   $('#paytype_drop').show();
   $("#bodyModal1").html("<?php echo display('Payment Type Added Successfully');?>");
   $('#payment_type').modal('hide');
   
   $('#add_pay_type')[0].reset();
   $('#myModal1').modal('show');
   window.setTimeout(function(){
   $('#payment_type').modal('hide');
   
   $('#myModal1').modal('hide');
   
   
   
   }, 2000);
   
   }
   });
   });
   
   
   $('#add_pay_terms').submit(function(e){
   e.preventDefault();
   var data = {
   new_payment_terms : $('#new_payment_terms').val()
   };
   data[csrfName] = csrfHash;
   $.ajax({
    type:'POST',
    data: data,
   dataType:"json",
    url:'<?php echo base_url();?>Cpurchase/add_payment_terms',
    success: function(data1, statut) {
   
   var $select = $('select#payment_terms');
      $select.empty();
   
        for(var i = 0; i < data1.length; i++) {
   var option = $('<option/>').attr('value', data1[i].payment_terms).text(data1[i].payment_terms);
   $select.append(option); // append new options
   }
   
   
   $('#new_payment_terms').val('');
   $("#bodyModal1").html("<?php echo display('Payment Terms Added Successfully');?>");
   $('#payment_type').modal('hide');
   $('#payment_terms').show();
   $('#myModal1').modal('show');
   $('#add_pay_terms')[0].reset();
   window.setTimeout(function(){
   $('#payment_type_new').modal('hide');
   $('#myModal1').modal('hide');
   }, 2000);
   }
   });
   });
   
   
   
   
   $(document).on('keyup','.serviceprovider tbody tr:last',function (e) {
   var tid=$(this).closest('table').attr('id');
   const indexLast = tid.lastIndexOf('_');
   var id = tid.slice(indexLast + 1);
   var $last = $('#servic_pro  tr:last');
   var num = id+($last.index()+1);
   $('#servic_pro tr:last').clone().find('input').attr('id', function(i, current) {
   return current.replace(/\d+$/, num);
   }).end().appendTo('#servic_pro');
   
   
   
   var sum = 0;
   $(".total_price").each(function() {
   if(!isNaN(this.value) && this.value.length!=0) {
   sum += parseFloat(this.value);
   }
   });
   $("#Total").val(sum.toFixed(2));
   $("#gtotals").val(sum.toFixed(2));
   <!--$("#vendor_gtotals").val(sum.toFixed(2));-->
   
   });
   
   
   
   $(document).on('input','.total_price',function (e) {
   var sum = 0;
   //iterate through each textboxes and add the values
   $(".total_price").each(function() {
   //add only if the value is number
   if(!isNaN(this.value) && this.value.length!=0) {
   sum += parseFloat(this.value);
   }
   });
   //.toFixed() method will roundoff the final sum to 2 decimal places
   $("#Total").val(sum.toFixed(2));
   $("#gtotals").val(sum.toFixed(2));
   <!--$("#vendor_gtotals").val(sum.toFixed(2));-->
   });
   
   
   
   $(document).on('click', '.delete_provider', function(){
   var tid=$(this).closest('table').attr('id');
   localStorage.setItem("delete_table",tid);
   console.log(localStorage.getItem("delete_table"));
   var netheight = $('#'+localStorage.getItem("delete_table")).find('.acc_name').attr('id');
   const indexLastDot = netheight.lastIndexOf('_');
   var id = netheight.slice(indexLastDot + 1);
   var rowCount = $(this).closest('tbody').find('tr').length;
   
   if(rowCount>1){
   $(this).closest('tr').remove();
   }
   var sump=0;
   $('#'+localStorage.getItem("delete_table")).find('.total_price').each(function() {
   var v=$(this).val();
   if (!isNaN(v) && v.length !== 0) {
   sump += parseFloat(v);
   }
   });
   $('#'+localStorage.getItem("delete_table")).find('#Total').val(sump).trigger('change');
   $('#gtotals').val(sump).trigger('change');
   <!--$('#'+localStorage.getItem("delete_table")).find('#vendor_gtotals').val(sump).trigger('change');-->
   
   
   });
   $(document).on('click', '.delete', function(){
   
   
   var tid=$(this).closest('table').attr('id');
   localStorage.setItem("delete_table",tid);
   console.log(localStorage.getItem("delete_table"));
   var netheight = $('#'+localStorage.getItem("delete_table")).find('.net_height').attr('id');
   const indexLastDot = netheight.lastIndexOf('_');
   var id = netheight.slice(indexLastDot + 1);
   var rowCount = $(this).closest('tbody').find('tr').length;
   
   if(rowCount>1){
   $(this).closest('tr').remove();
   }
   
   var costpersqft=0;
   $('#'+localStorage.getItem("delete_table")).find('.cost_sq_ft').each(function() {
   var precio = $(this).val();
   if (!isNaN(precio) && precio.length !== 0) {
    costpersqft += parseFloat(precio);
   }
   });
   $('#'+localStorage.getItem("delete_table")).find('.costpersqft').val(costpersqft).trigger('change');
   var cost_sq_slab=0;
   $('#'+localStorage.getItem("delete_table")).find('.cost_sq_slab').each(function() {
   var precio = $(this).val();
   if (!isNaN(precio) && precio.length !== 0) {
    cost_sq_slab += parseFloat(precio);
   }
   });
   $('#'+localStorage.getItem("delete_table")).find('.costperslab').val(cost_sq_slab).trigger('change');
   var sales_amt_sq_ft=0;
   $('#'+localStorage.getItem("delete_table")).find('.sales_amt_sq_ft').each(function() {
   var precio = $(this).val();
   if (!isNaN(precio) && precio.length !== 0) {
    sales_amt_sq_ft += parseFloat(precio);
   }
   });
   $('#'+localStorage.getItem("delete_table")).find('.salespricepersqft').val(sales_amt_sq_ft).trigger('change');
   var sales_slab_amt=0;
   $('#'+localStorage.getItem("delete_table")).find('.sales_slab_amt').each(function() {
   var precio = $(this).val();
   if (!isNaN(precio) && precio.length !== 0) {
    sales_slab_amt += parseFloat(precio);
   }
   });
   $('#'+localStorage.getItem("delete_table")).find('.salesslabprice').val(sales_slab_amt).trigger('change');
   var sum=0;
   $('#'+localStorage.getItem("delete_table")).find('.total_price').each(function() {
   var v=$(this).val();
   sum += parseFloat(v);
   });
   $('#'+localStorage.getItem("delete_table")).find('.b_total').val(sum).trigger('change');
   var sumnet=0;
   
   $('#'+localStorage.getItem("delete_table")).find('.net_sq_ft').each(function() {
   var v=$(this).val();
   if (!isNaN(v) && v.length !== 0) {
    sumnet += parseFloat(v);
   }
   
   });
   $('#'+localStorage.getItem("delete_table")).find('.overall_net').val(sumnet.toFixed(3));
   
   
   var sumgross=0;
   
   $('#'+localStorage.getItem("delete_table")).find('.gross_sq_ft').each(function() {
   var v=$(this).val();
   if (!isNaN(v) && v.length !== 0) {
    sumgross += parseFloat(v);
   }
   
   });
   $('#'+localStorage.getItem("delete_table")).find('.overall_gross').val(sumgross.toFixed(3));
   var total_net=0;
   $('.table').each(function() {
   $(this).find('.net_sq_ft').each(function() {
   var precio = $(this).val();
   if (!isNaN(precio) && precio.length !== 0) {
    total_net += parseFloat(precio);
   }
   });
   
   
   
   
   });
   $('#total_net').val(total_net.toFixed(3)).trigger('change');
   var overall_gs=0;
   $('.table').each(function() {
   $(this).find('.gross_sq_ft').each(function() {
   var precio = $(this).val();
   if (!isNaN(precio) && precio.length !== 0) {
    overall_gs += parseFloat(precio);
   }
   });
   });
   
   $('#total_gross').val(overall_gs).trigger('change');
   var sum_w=0;
   $('.table').each(function() {
   $(this).find('.weight').each(function() {
   
   var precio = $(this).val();
   if (!isNaN(precio) && precio.length !== 0) {
    sum_w += parseFloat(precio);
   }
   });
   });
   $('#'+localStorage.getItem("delete_table")).find('.overall_weight').val(sum_w).trigger('change');
   var total_w=0;
   $('.table').each(function() {
   $(this).find('.overall_weight').each(function() {
   var precio = $(this).val();
   if (!isNaN(precio) && precio.length !== 0) {
    total_w += parseFloat(precio);
   }
   });
   
   });
   $('#total_weight').val(total_w.toFixed(3)).trigger('change');
   var overall_sum=0;
   $('.table').each(function() {
   $(this).find('.b_total').each(function() {
   
   var v=$(this).val();
   overall_sum += parseFloat(v);
   
   });});
   $('#Over_all_Total').val(overall_sum.toFixed(3)).trigger('change');
   
   
   
   gt(id);
   
   
   
   
   
   });
   
   
   
   
   
   
   var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
   var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';
   
   
   $('#serviceprovider').submit(function (event) {
   event.preventDefault();
   
   var dataString = {
   dataString : $("#serviceprovider").serialize()
   };
   dataString[csrfName] = csrfHash;
   // alert('HI')
   $.ajax({
   type:"POST",
   dataType:"json",
   url:"<?php echo base_url(); ?>Cpurchase/insert_service_provider",
   data:$("#serviceprovider").serialize(),
   success:function (data) {
    console.log(data);
   
    $('#download_provider').show();
     $('#final_submit_provider').show();
      $('#print_provider').show();
   
      $('#servic_id_hidden').val(data);
   
      $("#bodyModal1").html('<?php echo display('Service Provider created Successfully');?>');
   $('.button_hide').show();
   $('#myModal1').modal('show');
   window.setTimeout(function(){
   $('.modal').modal('hide');
   $('.modal-backdrop').remove();
   $("#bodyModal1").html("");
   <!--window.location = "<?php echo base_url(); ?>Cpurchase/manage_purchase";-->
   },2500);
   }
   });
   event.preventDefault();
   });
   
   
   
   
   
   
   $("body").on(  ".product_name", function() {
   
   var tid=$(this).closest('tr').find('.product_name').attr('id');
   const indexLast = tid.lastIndexOf('_');
   var id = tid.slice(indexLast + 1);
   $('#prodt_'+id).val('');
   });
   
   
   
   
   
   
   
   
   
   
   
   $('#insert_purchase').submit(function (event) {
   var dataString = {
   dataString : $("#insert_purchase").serialize()
   
   };
   dataString[csrfName] = csrfHash;
   
   $.ajax({
   type:"POST",
   dataType:"json",
   url:"<?php echo base_url(); ?>Cpurchase/insert_purchase",
   data:$("#insert_purchase").serialize(),
   
   success:function (data) {
   console.log(data);
   
      var split = data.split("/");
      $('#invoice_hdn1').val(split[0]);
   console.log(split[0]+"---"+split[1]);
   
      $('#invoice_hdn').val(split[1]);
      $("#bodyModal1").html('<?php echo display('New Expense Created Successfully');?>');
   
      $('.button_hide').show();
   $('.download').show();
   $('#myModal1').modal('show');
   window.setTimeout(function(){
   $('.modal').modal('hide');
   
   $('.modal-backdrop').remove();
   $("#bodyModal1").html("");
   },2500);
   
   
   }
   
   });
   
   event.preventDefault();
   });
   $('#insert_purchase1').submit(function (event) {
   var dataString = {
   dataString : $("#insert_purchase1").serialize()
   
   };
   dataString[csrfName] = csrfHash;
   
   $.ajax({
   type:"POST",
   dataType:"json",
   url:"<?php echo base_url(); ?>Cpurchase/insert_purchase",
   data:$("#insert_purchase1").serialize(),
   
   success:function (data) {
   console.log(data);
   
      var split = data.split("/");
      $('#invoice_hdn1').val(split[0]);
   console.log(split[0]+"---"+split[1]);
   
      $('#invoice_hdn').val(split[1]);
      $("#bodyModal1").html('<?php echo display('New Expense Created Successfully')?>');
   
   $('.button_hide').show();
   $('#myModal1').modal('show');
   window.setTimeout(function(){
   $('.modal').modal('hide');
   
   $('.modal-backdrop').remove();
   $("#bodyModal1").html("");
   },2500);
   
   
   }
   
   });
   
   event.preventDefault();
   });
   
   
   
   $('#insert_purchase1').submit(function(e) {
              var form_data = new FormData();
            //  var formData = new FormData($('form')[0]);
            form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>', '<?php echo $this->security->get_csrf_hash(); ?>');
               form_data.append('invoice_no', document.getElementById('invoice_no').value);
        //    form_data.append('csrfName', '{{ csrfHash }}');
              var ins = document.getElementById('attachment').files.length;
              for (var x = 0; x < ins; x++) {
                  form_data.append("files[]", document.getElementById('attachment').files[x]);
              }
              $.ajax({
                  url: '<?php echo base_url(); ?>Cpurchase/expense_file_upload', // point to server-side controller method
                  dataType: 'text', // what to expect back from the server
                  cache: false,
                  contentType: false,
                  processData: false,
                  data: form_data,
                  type: 'post',
                  success: function (response) {
                      $('#msg').html(response); // display success response from the server
                  },
                  error: function (response) {
                      $('#msg').html(response); // display error response from the server
                  }
              });
          });
   
   $('#isf_dropdown').on('change', function() {
   if ( this.value == '2')
   $("#isf_no").show();
   else
   $("#isf_no").hide();
   }).trigger("change");
   $('#isf_dropdown1').on('change', function() {
   
   if ( this.value == '2')
   $(".isf_no1").show();
   else
   $(".isf_no1").hide();
   }).trigger("change");
   
   
   //Total
   $(document).ready(function(){
   $('#expense_drop').hide();
   $('#service_provider_data').hide();
      $('#download_provider').hide();
     $('#final_submit_provider').hide();
      $('#print_provider').hide();
       $('.without_po').hide();
      $('.with_po').hide();
   
   
   });
   
   
   $('#add_payment_info').submit(function (event) {    
   var dataString = {
   dataString : $("#add_payment_info").serialize()
   };
   dataString[csrfName] = csrfHash;
   
   $.ajax({
   type:"POST",
   dataType:"json",
   url:"<?php echo base_url(); ?>Cinvoice/add_payment_info",
   data:$("#add_payment_info").serialize(),
   
   success:function (data) {
   debugger;
   $('.amt').show();
   
   $('#payment_modal').modal('hide');
   $("#bodyModal1").html("<?php echo display('Payment Successfully Completed');?>");
   $('#myModal1').modal('show');
   
   window.setTimeout(function(){
   $('#myModal1').modal('hide');
   },2500);
   
   var dataString = {
   dataString : $("#histroy").serialize()
   
   };
   dataString[csrfName] = csrfHash;
   
   $.ajax({
   type:"POST",
   dataType:"json",
   url:"<?php echo base_url(); ?>Cinvoice/payment_history",
   data:$("#histroy").serialize(),
   
   success:function (data) {
   console.log(data);
   var gt=$('#vendor_gtotal').val();
   var amtpd=data.amt_paid;
   console.log(data);
   var bal= $('#vendor_gtotal').val() - data.amt_paid;
   $('#balance').val(bal);
   if(amtpd){
   $('#amount_paid').val(amtpd);
   }else{
   $('#amount_paid').val("0.00");
   }
   var t_rate=$('.custocurrency_rate').val();
   document.getElementById("paid_convert").value=
   (amtpd /t_rate ).toFixed(2);
   document.getElementById("bal_convert").value=
   (bal /t_rate ).toFixed(2);
   
   }
   });
   $('#add_payment_info')[0].reset();
   }
   
   });
   event.preventDefault();
   });
   
   
   function payment_info(){
   
   var data = {
   gtotal:$('#vendor_gtotal').val(),
   customer_name:$('#customer_name').val()
   
   };
   data[csrfName] = csrfHash;
   
   $.ajax({
   type:'POST',
   data: data, 
   dataType:"json",
   url:'<?php echo base_url();?>Cinvoice/get_payment_info',
   success: function(result, statut) {
     
    $("#amount_paid").val(result[0]['amt_paid'].toFixed(2));
    $("#balance").val(result[0]['balance']);
      console.log(result);
   }
   });
   }
   
   
   $('#payment_from_modal').on('input',function(e){
   
   var payment=parseInt($('#payment_from_modal').val());
   var amount_to_pay=parseInt($('#amount_to_pay').val());
   console.log(payment+"/"+amount_to_pay);
   console.log(parseInt(amount_to_pay)-parseInt(payment));
   var value=parseInt(amount_to_pay)-parseInt(payment);
   $('#balance_modal').val(value.toFixed(2));
   if (isNaN(value)) {
   $('#balance_modal').val("0");
   }
   });
   $('#bank_id').change(function(){
   localStorage.setItem("selected_bank_name",$('#bank_id').val());
   
   });
   $(document).ready(function(){
   
   $('.amt').hide();
   
   });
   
   
   
   
   $('#paypls').on('click', function (e) {
   e.preventDefault();
   $('#amount_to_pay').val($('#vendor_gtotal').val()-$('#amount_paid').val());
   $('#payment_modal').modal('show');
   e.preventDefault();
   
   });
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   $('#add_bank').submit(function (event) {
   var dataString = {
   dataString : $("#add_bank").serialize()
   };
   dataString[csrfName] = csrfHash;
   $.ajax({
   type:"POST",
   dataType:"json",
   url:"<?php echo base_url(); ?>Csettings/add_new_bank",
   data:$("#add_bank").serialize(),
   success: function (data) {
   
   $.each(data, function (i, item) {
      result = '<option value=' + data[i].bank_name + '>' + data[i].bank_name + '</option>';
   });
   $('#bank').selectmenu();
   $('#bank').append(result).selectmenu('refresh',true);
   $("#bodyModal1").html("<?php echo display('Bank Added Successfully');?>");
   $('#myModal1').modal('show');
   $('#add_bank_info').modal('hide');
   $('#bank').show();
   $('#add_bank')[0].reset();
   window.setTimeout(function(){
   $('#myModal1').modal('hide');
   }, 2000);
   }
   });
   event.preventDefault();
   });
   
   
   $(document).ready(function () {
   $('#bank').selectize({
       sortField: 'text'
   });
   });
   $(document).ready(function () {
   submit_pay
   $('#openBtn').click(function () {
   $('#payment_modal').modal({
   show: true
   })
   });
   
   $(document).on('show.bs.modal', '.modal', function (event) {
   var zIndex = 1040 + (10 * $('.modal:visible').length);
   $(this).css('z-index', zIndex);
   setTimeout(function() {
      $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack');
   }, 0);
   });
   
   
   });
   function product_detail(id){
   
   var pdt=$('#product_name_'+id).val();
   const myArray = pdt.split("-");
   var product_nam=myArray[0];
   var product_model=myArray[1];
   console.log(product_nam+"^"+product_model);
   var data = {
   
   product_nam:product_nam,
   product_model:product_model
   };
   data[csrfName] = csrfHash;
   
   $.ajax({
   type:'POST',
   data: data, 
   dataType:"json",
   url:'<?php echo base_url();?>Cinvoice/product_id',
   success: function(result, statut) {
   console.log(result);
    $("#prod_id_"+id).val(result[0]['product_id']);
    $("#product_rate_"+id).val(result[0]['price']);
   
   }
   });
   
   
   }
   
   $('#insert_supplier').submit(function (event) {
   var dataString = {
   dataString : $("#insert_supplier").serialize()
   };
   dataString[csrfName] = csrfHash;
   $.ajax({
   type:"POST",
   dataType:"json",
   url:"<?php echo base_url(); ?>Csupplier/insert_supplier",
   data:$("#insert_supplier").serialize(),
   success:function (states) {
      var $select = $('select#supplier_id');
      $select.empty();
   
        for(var i = 0; i < states.length; i++) {
   var option = $('<option/>').attr('value', states[i].supplier_id).text(states[i].supplier_name);
   $select.append(option); // append new options
   }
   var data = {
   
   value:$('#supplier_id').val()
   };
   data[csrfName] = csrfHash;
   
   $.ajax({
   type:'POST',
   data: data, 
   dataType:"json",
   url:'<?php echo base_url();?>Cpurchase/getsupplier_data',
   success: function(result, statut) {
   
   console.log(result);
   
      if(result.csrfName){
         csrfName = result.csrfName;
         csrfHash = result.csrfHash;
      }
   $('#vendor_add').val(result[0]['address']+'\n'+result[0]['city']+'\n'+result[0]['state']+"-"+result[0]['zip']+"-"+result[0]['country']+'\n'+result[0]['primaryemail']+"-"+result[0]['businessphone']       );
      $('#vendor_type_details').val(result[0]['vendor_type'])
    
     $(".cus").html(result[0]['currency_type']);
   $("label[for='custocurrency']").html(result[0]['currency_type']);
   console.log('https://open.er-api.com/v6/latest/<?php echo $curn_info_default; ?>');
   $.getJSON('https://open.er-api.com/v6/latest/<?php echo $curn_info_default; ?>', 
   function(data) {
   var custo_currency=result[0]['currency_type'];
   var x=data['rates'][custo_currency];
   var Rate =parseFloat(x).toFixed(3);
   Rate = isNaN(Rate) ? 0 : Rate;
   console.log(Rate);
   $('.hiden').show();
   $(".custocurrency_rate").val(Rate);
   });
   }
   });
   
   $('#add_vendor').modal('hide');  
   
   $("#bodyModal1").html("<?php echo display('New Vendor Added Successfully');?>");
   
   $('#myModal1').modal('show');
   $('#insert_supplier')[0].reset();
   
   
   window.setTimeout(function(){
   $('#myModal1').modal('hide');
   $('.modal-backdrop').remove();
   
   },2500);
   
   }
   });
   event.preventDefault();
   });
   $('.button_hide').hide();
   
                  $('.hiden').css("display","none");
   
   
   
   
   $('#supplier_id').on('change', function (e) {
   
   var data = {
   value: $('#supplier_id').val()
   };
   data[csrfName] = csrfHash;
   $.ajax({
   type:'POST',
   data: data,
   
   //dataType tells jQuery to expect JSON response
   dataType:"json",
   url:'<?php echo base_url();?>Cinvoice/getvendor',
   success: function(result, statut) {
    if(result.csrfName){
   
       csrfName = result.csrfName;
       csrfHash = result.csrfHash;
    }
   
   console.log(result[0]['currency_type']);
   
   $(".cus").html(result[0]['currency_type']);
   $("label[for='custocurrency']").html(result[0]['currency_type']);
   console.log('https://open.er-api.com/v6/latest/<?php echo $curn_info_default; ?>');
   $.getJSON('https://open.er-api.com/v6/latest/<?php echo $curn_info_default; ?>', 
   function(data) {
   var custo_currency=result[0]['currency_type'];
   var x=data['rates'][custo_currency];
   var Rate =parseFloat(x).toFixed(3);
   Rate = isNaN(Rate) ? 0 : Rate;
   console.log(Rate);
   $('.hiden').show();
   $(".custocurrency_rate").val(Rate);
   
   });
   }
   });
   
   
   });
   
   $('#productname').on('change', function() {
   var val=$('#productname').val();
   $('#productid').val(val);
   });
   
   
   
     
   $("#supplier_id").change(function() {
   var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
   var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';
   var data = {
   
   
   };
   data[csrfName] = csrfHash;
   
   $.ajax({
     type:'POST',
     data: data, 
    dataType:"json",
   
     url:'<?php echo base_url();?>Cpurchase/product_search_by_supplier',
     success: function(result, statut) {
      console.log(result);
         if(result.csrfName){
            csrfName = result.csrfName;
            csrfHash = result.csrfHash;
         }
         console.log(result[0]['label']);
   
     }
   });
   });
   $(function(){
   $(".add_category").hide();
   $("#add_category").click(function() {
   
   $(".add_category").show(300);
   
   });
   $(".checkbox_toggle2").hide();
   
   $("#purchase_tax").click(function() {
   if($(this).is(":checked")) {
   $(".checkbox_toggle2").show(300);
   } else {
   $(".checkbox_toggle2").hide(200);
   }
   });
   
   
   });
   
   
   
   $('#supplier_id').change(function(e){
   var data = {
   
   value:$('#supplier_id').val()
   };
   data[csrfName] = csrfHash;
   
   $.ajax({
   type:'POST',
   data: data, 
   dataType:"json",
   url:'<?php echo base_url();?>Cpurchase/getsupplier_data',
   success: function(result, statut) {
   
   console.log(result);
   
      if(result.csrfName){
         csrfName = result.csrfName;
         csrfHash = result.csrfHash;
      }
   $('#vendor_add').val(result[0]['address']+'\n'+result[0]['city']+'\n'+result[0]['state']+"-"+result[0]['zip']+"-"+result[0]['country']+'\n'+result[0]['primaryemail']+"-"+result[0]['businessphone']       );
      $('#vendor_type_details').val(result[0]['vendor_type'])
      // vendor_type_details
   
   }
   });
   });
   
   
   
   $('#download_provider').on('click', function (e) {
   
   var popout = window.open("<?php  echo base_url(); ?>Cpurchase/servicepro_details_data/"+$('#servic_id_hidden').val());
   
   e.preventDefault();
   
   }); 
   $('#print_provider').on('click', function (e) {
   
   var popout = window.open("<?php  echo base_url(); ?>Cpurchase/servicepro_details_data_print/"+$('#servic_id_hidden').val());
   
   e.preventDefault();
   
   });  
   
   
   $('.download').on('click', function (e) {
   
   var popout = window.open("<?php  echo base_url(); ?>Cpurchase/purchase_details_data/"+$('#invoice_hdn1').val());
   
   e.preventDefault();
   
   });  
   
   <!--function discard(){-->
   
   <!--   $.get(-->
   <!--    "<?php echo base_url(); ?>Cpurchase/deletepurchase/", -->
   <!--   { val: $("#invoice_hdn1").val(), csrfName:csrfHash,payment_id:$('#payment_id').val() }, // put your parameters here-->
   <!--   function(responseText){-->
   <!--    console.log(responseText);-->
   <!--    window.btn_clicked = true;      //set btn_clicked to true-->
   <!--    var input_hdn="<?php echo  display('Your Invoice No')." :";?>"+$('#invoice_hdn').val()+"<?php echo  " ".display('has been Discarded');?>";-->
   
   <!--    console.log(input_hdn);-->
   <!--    $('#myModal3').modal('hide');-->
   <!--    $("#bodyModal1").html(input_hdn);-->
   <!--        $('#myModal1').modal('show');-->
   <!--    window.setTimeout(function(){-->
   
   
   <!--        window.location = "<?php  echo base_url(); ?>Cpurchase/manage_purchase";-->
   <!--      }, 2000);-->
   <!--   }-->
   <!--); -->
   <!--}-->
   <!--     function submit_redirect(){-->
   <!--        window.btn_clicked = true;      //set btn_clicked to true-->
   <!--        var input_hdn="<?php echo  display('Your Invoice No')." :";?>"+$('#invoice_hdn').val()+"<?php echo  " ".display('has been saved Successfully');?>";-->
   
   <!--    console.log(input_hdn);-->
   <!--    $('#myModal3').modal('hide');-->
   <!--    $("#bodyModal1").html(input_hdn);-->
   <!--        $('#myModal1').modal('show');-->
   <!--    window.setTimeout(function(){-->
   
   
   <!--        window.location = "<?php  echo base_url(); ?>Cpurchase/manage_purchase";-->
   <!--      }, 2000);-->
   <!--     }-->
   $('#final_submit1').on('click', function (e) {
   
   //  window.btn_clicked = true;      //set btn_clicked to true
   var input_hdn="<?php echo  display('Your Invoice No')." :";?>"+$('#invoice_hdn').val()+"<?php echo  " ".display('has been saved Successfully');?>";
   
   console.log(input_hdn);
   
   $("#bodyModal1").html(input_hdn);
   $('#myModal1').modal('show');
   window.setTimeout(function(){
   $('.modal').modal('hide');
   
   $('.modal-backdrop').remove();
   },2500);
   window.setTimeout(function(){
   
   
   window.location = "<?php  echo base_url(); ?>Cpurchase/manage_purchase";
   }, 2500);
   
   });
   $('#final_submit').on('click', function (e) {
   
   //window.btn_clicked = true;      //set btn_clicked to true
   var input_hdn="<?php echo  display('Your Invoice No')." :";?>"+$('#invoice_hdn').val()+"<?php echo  " ".display('has been saved Successfully');?>";
   
   console.log(input_hdn);
   
   $("#bodyModal1").html(input_hdn);
   $('#myModal1').modal('show');
   window.setTimeout(function(){
   $('.modal').modal('hide');
   
   $('.modal-backdrop').remove();
   },2500);
   window.setTimeout(function(){
   
   
   window.location = "<?php  echo base_url(); ?>Cpurchase/manage_purchase";
   }, 2500);
   
   });
   $('#final_submit_provider').on('click', function (e) {
   
   // window.btn_clicked = true;      //set btn_clicked to true
   var input_hdn="<?php echo  display('Supplier ID')." :";?>"+$('#servic_id_hidden').val()+"<?php echo  " ".display('has been saved Successfully');?>";
   
   console.log(input_hdn);
   
   $("#bodyModal1").html(input_hdn);
   $('#myModal1').modal('show');
   window.setTimeout(function(){
   $('.modal').modal('hide');
   
   $('.modal-backdrop').remove();
   },2500);
   window.setTimeout(function(){
   
   
   window.location = "<?php  echo base_url(); ?>Cpurchase/manage_purchase";
   }, 2500);
   
   });
   <!--window.onbeforeunload = function(){-->
   <!--    if(!window.btn_clicked ){-->
   
   <!--       return false;-->
   <!--    }-->
   <!--}-->
   
   
   $('#download_purchase').on('click', function (e) {
   
   var popout = window.open("<?php  echo base_url(); ?>Cpurchase/purchase_details_data/"+$('#invoice_hdn1').val());
   
   });  
   $('#print_purchase').on('click', function (e) {
   
   var popout = window.open("<?php  echo base_url(); ?>Cpurchase/packing_list_details_data/"+$('#invoice_hdn1').val());
   
   }); 
   
   $(document).on('change','#download_select', function (e) {
   var selected_option=$(this).val();
   if(selected_option=='Invoice'){
   var popout = window.open("<?php  echo base_url(); ?>Cpurchase/purchase_details_data/"+$('#invoice_hdn1').val());
   }else{
   
   var popout = window.open("<?php  echo base_url(); ?>Cpurchase/packing_list_details_data/"+$('#invoice_hdn1').val());
   }
   
   });
   $(document).on('change','#print_select', function (e) {
   var selected_option=$(this).val();
   if(selected_option=='Invoice'){
   var popout = window.open("<?php  echo base_url(); ?>Cpurchase/purchase_details_data_print/"+$('#invoice_hdn1').val());
   }else{
   var popout = window.open("<?php  echo base_url(); ?>Cpurchase/packing_list_details_data_print/"+$('#invoice_hdn1').val());
   }
   
   });
   $(document).ready(function() {
   
   $('#main').hide();
   });
   $('#po').on('change', function (e) {
   
   $('#purchaseTable1 tbody').empty();
   
   if($('#po').val() !=="Not Available"){
   $
   $('#service_provider_data').show();
   $('.without_po').hide();
   $('.with_po').hide();
    $('#expense_drop').hide();
    $('#main').show();
   var data = {
   po:$('#po').val()
   };
   }else{
   $('.without_po').hide();
   $('.with_po').hide();
   $('#service_provider_data').hide();
   $('#expense_drop').show();
   $('#main').hide();
     
   }
   });
   $('#expense_drop').on('change', function (e) {
   
   $('#purchaseTable1 tbody').empty();
   
   if($('#expense_drop').val() =="not_found"){
   $('#service_provider_data').hide();
   $('.with_po').hide();
   $('.without_po').show();
      $('#main').show();
   $('#po_payment_id').val("<?php   echo $payment_id;   ?>");
   var data = {
   expense_drop:$('#expense_drop').val()
   };
   }else{
   $('.button_hide').hide();
      $('#main').show();
         $('#service_provider_data').hide();
   $('.with_po').show();
   $('.without_po').hide();
   var data = {
   po:$('#expense_drop').val()
   
   
   };
   data[csrfName] = csrfHash;
   $.ajax({ 
   url:'<?php echo base_url();?>Cpurchase/get_po_details',
   method:'POST',
   data: data, 
   dataType : "html" 
   }).done(function(data) { 
   var obj = $(data);
   $("#insert_purchase").html(obj.find("#insert_purchase").html());
   $(".normalinvoice").each(function(i,v){
   if($(this).find("tbody").html().trim().length === 0){
   $(this).hide()
   }
   })
   $('.normalinvoice').each(function(){
   
   var tid=$(this).attr('id');
   const indexLast = tid.lastIndexOf('_');
   var idt = tid.slice(indexLast + 1);
   
   
   
   var sum=0;
   //  debugger;
   $('#normalinvoice_'+idt  +  '> tbody > tr').find('.total_price').each(function() {
   var v=$(this).val();
   if (!isNaN(v) && v.length !== 0) {
   sum += parseFloat(v);
   }
   });
   
   $(this).closest('table').find('#Total_'+idt).val(sum.toFixed(3));
   
   var sum_net=0;
   
   $('#normalinvoice_'+idt  +  '> tbody > tr').find('.net_sq_ft').each(function() {
   var v=$(this).val();
   if (!isNaN(v) && v.length !== 0) {
   sum_net += parseFloat(v);
   }
   
   });
   
   $(this).closest('table').find('#overall_net_'+idt).val(sum_net.toFixed(3));
   var sum_gross=0;
   
   $('#normalinvoice_'+idt  +  '> tbody > tr').find('.gross_sq_ft').each(function() {
   var v=$(this).val();
   if (!isNaN(v) && v.length !== 0) {
   sum_gross += parseFloat(v);
   }
   
   });
   $(this).closest('table').find('#overall_gross_'+idt).val(sum_gross.toFixed(3));
   
   var costpersqft=0;
   
   $('#normalinvoice_'+idt  +  '> tbody > tr').find('.cost_sq_ft').each(function() {
   var v=$(this).val();
   if (!isNaN(v) && v.length !== 0) {
   costpersqft += parseFloat(v);
   }
   
   });
   $(this).closest('table').find('#costpersqft_'+idt).val(costpersqft.toFixed(3));
   
   var cost_sq_slab=0;
   
   $('#normalinvoice_'+idt  +  '> tbody > tr').find('.cost_sq_slab').each(function() {
   var v=$(this).val();
   if (!isNaN(v) && v.length !== 0) {
   cost_sq_slab += parseFloat(v);
   }
   
   });
   $(this).closest('table').find('#costperslab_'+idt).val(cost_sq_slab.toFixed(3));
   
   var sales_amt_sq_ft=0;
   
   $('#normalinvoice_'+idt  +  '> tbody > tr').find('.sales_amt_sq_ft').each(function() {
   var v=$(this).val();
   if (!isNaN(v) && v.length !== 0) {
   sales_amt_sq_ft += parseFloat(v);
   }
   
   });
   $(this).closest('table').find('#salespricepersqft_'+idt).val(sales_amt_sq_ft.toFixed(3));
   
   var sales_slab_amt=0;
   
   $('#normalinvoice_'+idt  +  '> tbody > tr').find('.sales_slab_amt').each(function() {
   var v=$(this).val();
   if (!isNaN(v) && v.length !== 0) {
   sales_slab_amt += parseFloat(v);
   }
   
   });
   $(this).closest('table').find('#salesslabprice_'+idt).val(sales_slab_amt.toFixed(3));
   
   
   var sum_weight=0;
   
   $('#normalinvoice_'+idt  +  '> tbody > tr').find('.weight').each(function() {
   var v=$(this).val();
   if (!isNaN(v) && v.length !== 0) {
   sum_weight += parseFloat(v);
   }
   
   });
   
   $(this).closest('table').find('#overall_weight_'+idt).val(sum_weight.toFixed(3));
   
   
   });
   // debugger;
    var data = {
   value: $('#supplier_id').val()
   };
   data[csrfName] = csrfHash;
   $.ajax({
   type:'POST',
   data: data,
   dataType:"json",
   url:'<?php echo base_url();?>Cinvoice/getvendor',
   success: function(result, statut) {
   if(result.csrfName){
     //assign the new csrfName/Hash
     csrfName = result.csrfName;
     csrfHash = result.csrfHash;
   }
   
   console.log(result);
   $("#vendor_add").val(result[0]['address']+"\r\n"+result[0]['city']+"\r\n"+result[0]['state']+"-"+result[0]['zip']+"-"+result[0]['country']+"\n"+result[0]['primaryemail']+"-"+result[0]['mobile']);
   $('#vendor_type_details').val(result[0]['vendor_type']);
   $(".cus").html(result[0]['currency_type']);
   $("label[for='custocurrency']").html(result[0]['currency_type']);
   console.log('https://open.er-api.com/v6/latest/<?php echo $curn_info_default; ?>');
   $.getJSON('https://open.er-api.com/v6/latest/<?php echo $curn_info_default; ?>', 
   
   
   
   
   function(data) {
   var custo_currency=result[0]['currency_type'];
   var x=data['rates'][custo_currency];
   var Rate =parseFloat(x).toFixed(3);
   Rate = isNaN(Rate) ? 0 : Rate;
   
   $('.hiden').show();
   
   $(".custocurrency_rate").val(Rate);
   var g=$('#gtotal').val();
   $('#vendor_gtotal').val(parseInt(Rate*g));
   });
   }
   });
       var data = {
   value: $('#expense_drop').val()
   };
   data[csrfName] = csrfHash;
   $.ajax({
   type:'POST',
   data: data,
   dataType:"json",
   url:'<?php echo base_url();?>Cpurchase/get_payment_id',
   success: function(result, statut) {
   
   
   console.log(result);
   $(".payment_id1").val(result[0]['payment_id']);
   $(".payment_id").val(result[0]['payment_id']);
   $('#po_payment_id').val(result[0]['payment_id']);
   }
   });
   }).fail(function(jqXHR, textStatus, errorThrown) { 
   
   });
   
   
   
   //     $.ajax({
   //         method:'POST',
   //         data: data, 
   //  dataType: "html",
   //         url:'<?php echo base_url();?>Cpurchase/get_po_details',
   //         success: function(result, statut) {
   //             console.log(result);
   //                            $(".with_po").html(result);    
   // }
               
   
   //         });
   }
   });
   
   $(document).ready(function(){
   $('.payment_id').val($('#po_payment_id').val());
   $('#product_tax').on('change', function (e) {
   
   var total=$('#Over_all_Total').val();
   var tax= $('#product_tax').val();
   if(tax.indexOf(hypen) != -1){
   var field = tax.split('-');
   
   var percent = field[1];
   
   }else if(tax=='Select the Tax'){
   
   percent="0";
   }
   
   else{
   percent=tax;
   }
   //  var field = tax.split('-');
   
   //  var percent = field[1];
   
   percent=percent.replace("%","");
   var answer = (percent / 100) * parseInt(total);
   
   
   var gtotal = parseInt(total + answer);
   console.log("gtotal :" +gtotal);
   
   
   
   var final_g= $('#final_gtotal').val();
   
   
   var amt=parseFloat(answer)+parseFloat(total);
   var num = isNaN(parseFloat(amt)) ? 0 : parseFloat(amt)
   $('#gtotal').val(num); 
   var custo_amt=$('.custocurrency_rate').val(); 
   console.log("numhere :"+num +"-"+custo_amt);
   var value=num*custo_amt;
   var custo_final = isNaN(parseFloat(value)) ? 0 : parseFloat(value)
   $('#vendor_gtotal').val(custo_final);  
   calculate();
   });
   });
   
   
   
   
   
   
   $('.custocurrency_rate').on('change textInput input', function (e) {
   calculate();
   });
   
   $('.common_qnt').on('change textInput input', function (e) {
   calculate();
   });
   $('.btotal').on('change textInput input', function (e) {
   var sum=0;
   
   $('.btotal').each(function() {
   var v=$(this).val();
   sum += parseFloat(v);
   });
   $('#Over_all_Total').val(sum.toFixed(3));
   
   
   
   
   var first=$("#Over_all_Total").val();
   var tax= $('#product_tax').val();
   var field = tax.split('-');
   
   var percent = field[1];
   var answer=0;
   var answer = parseInt((percent / 100) * first);
   console.log("Answer : "+answer);
   var gtotal = parseInt(first + answer);
   console.log("gtotal :" +gtotal);
   
   var final_g= $('#final_gtotal').val();
   
   
   var amt=parseInt(answer)+parseInt(first);
   var num = isNaN(parseInt(amt)) ? 0 : parseInt(amt)
   var custo_amt=$('.custocurrency_rate').val(); 
   console.log("numhere :"+num +"-"+custo_amt);
   var value=num*custo_amt;
   var custo_final = isNaN(parseInt(value)) ? 0 : parseInt(value)
   $('#vendor_gtotal').val(custo_final);  
   });
   
   
   var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
   var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';
   $(document).on('change', '.product_name', function(){
   
   var netheight = $(this).attr('id');
   const indexLastDot = netheight.lastIndexOf('_');
   var id = netheight.slice(indexLastDot + 1);
   $('#tableid_'+id).val(id);
   var net_width='net_width_'+id;
   var net_height = 'net_height_'+ id;
   var netwidth=$('#'+net_width).val();
   debugger;
   var netheight=$('#'+net_height).val();
   var netresult=parseInt(netwidth) * parseInt(netheight);
   netresult=netresult/144;
   netresult = isNaN(netresult) ? 0 : netresult;
   var nresult=netresult.toFixed(3);
   
   $('#'+'net_sq_ft_'+id).val(netresult.toFixed(3));
   var s=0;
   $(this).closest('table').find('.cost_sq_ft').each(function() {
   var precio = $(this).val();
   if (!isNaN(precio) && precio.length !== 0) {
    s += parseFloat(precio);
   }
   });
   $(this).closest('table').find('.costpersqft').val(s).trigger('change');
   var s1=0;
   $(this).closest('table').find('.sales_amt_sq_ft').each(function() {
   var precio = $(this).val();
   if (!isNaN(precio) && precio.length !== 0) {
    s1 += parseFloat(precio);
   }
   });
   $(this).closest('table').find('.salespricepersqft').val(s1).trigger('change');
   
   
   calculate();
   });
   
   // Restricts input for each element in the set of matched elements to the given inputFilter.
   (function($) {
   $.fn.inputFilter = function(callback, errMsg) {
   return this.on("input keydown keyup mousedown mouseup select contextmenu drop focusout", function(e) {
   if (callback(this.value)) {
   // Accepted value
   if (["keydown","mousedown","focusout"].indexOf(e.type) >= 0){
    $(this).removeClass("input-error");
    this.setCustomValidity("");
   }
   this.oldValue = this.value;
   this.oldSelectionStart = this.selectionStart;
   this.oldSelectionEnd = this.selectionEnd;
   } else if (this.hasOwnProperty("oldValue")) {
   // Rejected value - restore the previous one
   $(this).addClass("input-error");
   this.setCustomValidity(errMsg);
   this.reportValidity();
   this.value = this.oldValue;
   this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
   } else {
   // Rejected value - nothing to restore
   this.value = "";
   }
   });
   };
   }(jQuery));
   
   $(".custocurrency_rate").inputFilter(function(value) {
   return /^-?\d*[.,]?\d*$/.test(value); }, "Must be a floating (real) Number");
   $('#product_tax').on('change', function (e) {
   
   var optionSelected = $("option:selected", this);
   var valueSelected = this.value;
   var total=$('#Over_all_Total').val();
   var tax= $('#product_tax').val();
   var percent='';
   var hypen='-';
   if(tax.indexOf(hypen) != -1){
   var field = tax.split('-');
   
   var percent = field[1];
   
   }else if(tax=='Select the Tax'){
   
   percent="0";
   }
   
   else{
   percent=tax;
   }
   percent=percent.replace("%","");
   var answer = (percent / 100) * parseInt(total);
   
   
   var gtotal = parseInt(total + answer);
   console.log("gtotal :" +gtotal);
   $('#gtotal').val(gtotal); 
   var amt=parseInt(answer)+parseInt(total);
   var num = isNaN(parseInt(amt)) ? 0 : parseInt(amt)
   var custo_amt=$('.custocurrency_rate').val(); 
   console.log("numhere :"+num +"-"+custo_amt);
   var value=num*custo_amt;
   var custo_final = isNaN(parseInt(value)) ? 0 : parseInt(value)
   $('#vendor_gtotal').val(custo_final);  
   $('#final_gtotal').val(answer);
   $('#hdn').val(valueSelected);
   console.log("taxi :"+valueSelected);
   $('#tax_details').val(answer.toFixed(3) +" ( "+tax+" )");
   
   
   
   
   
   // $('#tax_detail').val(answer.toFixed(3) +" ( "+tax+" )");
   
   
   calculate();
   payment_info();
   });
   $('#expensetax_btn').submit(function (event) {
   var dataString = {
   dataString : $("#expensetax_btn").serialize()
   };
   dataString[csrfName] = csrfHash;
   $.ajax({
   type:"POST",
   dataType:"json",
   url:"<?php echo base_url(); ?>Cpurchase/insert_expensetax",
   data:$("#expensetax_btn").serialize(),
   success: function (data1) {
   $("#magic_purchase").empty();
   for (var i in data1) {
   console.log(data1);
    $("<option/>").html(data1[i].tax_id +'-'+ data1[i].tax).appendTo("#magic_purchase");
   }
   $("#magic_purchase").focus();
   $("#bodyModal1").html("Tax Added Successfully");
   $('#myModal1').modal('show');
   window.setTimeout(function(){
   $('#expensetax_info').modal('hide');
   $('.modal-backdrop').remove();
   $('#myModal1').modal('hide');
   }, 2000);
   }
   });
   event.preventDefault();
   });
   $('#product_tax').on('change', function (e) {
   
   var total=$('#Over_all_Total').val();
   var tax= $('#product_tax').val();
   
   
   
   var percent='';
   var hypen='-';
   if(tax.indexOf(hypen) != -1){
   var field = tax.split('-');
   
   var percent = field[1];
   
   }else if(tax=='Select the Tax'){
   
   percent="0";
   }
   
   else{
   percent=tax;
   }
   percent=percent.replace("%","");
   var answer = (percent / 100) * parseFloat(total);
   
   
   var gtotal = parseFloat(total + answer);
   console.log("gtotal :" +gtotal);
   
   
   
   var final_g= $('#final_gtotal').val();
   
   
   var amt=parseFloat(answer)+parseFloat(total);
   var num = isNaN(parseFloat(amt)) ? 0 : parseFloat(amt)
   $('#gtotal').val(num); 
   var custo_amt=$('.custocurrency_rate').val(); 
   console.log("numhere :"+num +"-"+custo_amt);
   var value=num*custo_amt;
   var custo_final = isNaN(parseFloat(value)) ? 0 : parseFloat(value)
   $('#vendor_gtotal').val(custo_final);  
   calculate();
   });
   var arr=[];
   
   
   function gt(id){
   
   var final_g= $('#final_gtotal').val();
   
   var first=$("#Over_all_Total").val();
   var tax= $('#product_tax').val();
   var percent='';
   var hypen='-';
   if(tax.indexOf(hypen) != -1){
   var field = tax.split('-');
   
   var percent = field[1];
   
   }else if(tax=='Select the Tax'){
   
   percent="0";
   }
   
   else{
   percent=tax;
   }
   percent=percent.replace("%","");
   // var field = tax.split('-');
   
   // var percent = field[1];
   var answer=0;
   answer =(parseFloat(percent) / 100) * parseFloat(first);
   answer = isNaN(parseFloat(answer)) ? 0 : parseFloat(answer);
   console.log(answer);
   $('#tax_details').val(answer.toFixed(3) +" ( "+tax+" )");
   
   //  $('#tax_detail').val(answer.toFixed(3) +" ( "+tax+" )");
   
   
   
   var gtotal = parseFloat(first + answer);
   console.log(gtotal);
   var amt=parseFloat(answer)+parseFloat(first);
   var num = isNaN(parseFloat(amt)) ? 0 : parseFloat(amt);
   var custo_amt=$('.custocurrency_rate').val();
   $("#gtotal").val(num.toFixed(2));  
   console.log(num +"-"+custo_amt);
   localStorage.setItem("customer_grand_amount_sale",num);
   
   var value=num*custo_amt;
   var custo_final = isNaN(parseFloat(value)) ? 0 : parseFloat(value)
   $('#vendor_gtotal').val(custo_final.toFixed(2));
   var bal_amt=custo_final-$('#amount_paid').val();
   $('#balance').val(bal_amt.toFixed(2));
   
   
   
   }
   
   let dynamic_id=2;
   
   function addbundle(){
   $(this).closest('table').find('.addbundle').css("display","none");
   $(this).closest('table').find('.removebundle').css("display","block");
   
   var newdiv = document.createElement('div');
   var tabin="crate_wrap_"+dynamic_id;
   
   newdiv = document.createElement("div");
   
   
   newdiv.innerHTML ='<table class="table normalinvoice table-bordered table-hover"     style="border:2px solid #d7d4d6;"               id="normalinvoice_'+ dynamic_id +'"> <thead> <tr> <th rowspan="2" class="text-center" style="width: 170px;" ><?php echo display('product_name'); ?><i class="text-danger">*</i></th> <th rowspan="2"  class="text-center"><?php echo display('Bundle No');?><i class="text-danger">*</i></th> <th rowspan="2"  class="text-center"><?php echo  display('description'); ?></th> <th rowspan="2" style="width:60px;" class="text-center"><?php echo display('Thick ness');?><i class="text-danger">*</i></th> <th rowspan="2" class="text-center"><?php echo display('Supplier Block No');?><i class="text-danger">*</i></th>  <th rowspan="2" class="text-center" ><?php echo display('Supplier Slab No');?><i class="text-danger">*</i> </th> <th colspan="2" style="width:150px;" class="text-center"><?php echo display('Gross Measurement');?><i class="text-danger">*</i> </th> <th rowspan="2" class="text-center"><?php echo display('Gross Sq.Ft');?></th>  <th rowspan="2" style="width:40px;" class="text-center"><?php echo display('Slab No');?><i class="text-danger">*</i></th> <th colspan="2" style="width:150px;" class="text-center"><?php echo display('Net Measure');?><i class="text-danger">*</i></th> <th rowspan="2" class="text-center"><?php echo display('Net Sq.Ft');?></th> <th rowspan="2" class="text-center"><?php echo display('Cost per Sq.Ft');?></th> <th rowspan="2"  class="text-center"><?php echo display('Cost per Slab');?></th> <th rowspan="2"  class="text-center"><?php echo display('sales'); ?><br/><?php echo display('Price per Sq.Ft');?></th> <th rowspan="2"  class="text-center"><?php echo display('Sales Slab Price');?></th> <th rowspan="2" class="text-center"><?php echo display('Weight');?></th> <th rowspan="2" class="text-center"><?php echo display('Origin');?></th>  <th rowspan="2" style="width: 100px" class="text-center"><?php  echo  display('total'); ?></th> <th rowspan="2" class="text-center"><?php  echo  display('action'); ?></th> </tr>  <tr> <th class="text-center"><?php echo display('Width');?></th> <th class="text-center"><?php echo display('Height');?></th> <th class="text-center"><?php echo display('Width');?></th> <th class="text-center"><?php echo display('Height');?></th> </tr>  </thead> <tbody id="addPurchaseItem_'+ dynamic_id +'"> <tr> <input type="hidden" name="tableid[]" id="tableid_'+ dynamic_id +'"/><td> <input   list="magicHouses"  style="width:160px;" name="prodt[]" id="prodt_'+ dynamic_id +'"   class="form-control product_name"  placeholder="Search Product" > <datalist id="magicHouses"> <option value="Select the Product" selected>Select the Product</option> <?php  foreach($product_list as $tx){?>  <option value="<?php echo $tx["product_name"]."-".$tx["product_model"];?>">  <?php echo $tx["product_name"]."-".$tx["product_model"];  ?></option> <?php } ?> </datalist> <input type="hidden" class="common_product autocomplete_hidden_value  product_id_'+ dynamic_id +'" name="product_id[]" id="SchoolHiddenId_'+ dynamic_id +'" /> </td> <td>  <input list="magic_bundle" name="bundle_no[]" id="bundle_no_'+ dynamic_id +'"   class="form-control bundle_no"'+
   'onchange="this.blur();" /><datalist id="magic_bundle"><?php foreach($bundle as $tx){?> <option value="<?php echo $tx['bundle_no'];?>">  <?php echo $tx['bundle_no'];  ?></option> <?php } ?>'+
   
   '</datalist></td> <td> <input type="text" id="description_'+ dynamic_id +'" name="description[]" class="form-control" /> </td>  <td > <input type="text" name="thickness[]" id="thickness_'+ dynamic_id +'" required="" class="form-control"/> </td>  <td><input list="magic_supplier_block" name="supplier_block_no[]"  id="supplier_b_no_'+ dynamic_id +'"   class="form-control supplier_block_no"  placeholder="Search Product"  onchange="this.blur();" /><datalist id="magic_supplier_block"><?php foreach($supplier_block_no as $tx){?><option value="<?php echo $tx['supplier_block_no'];?>">  <?php echo $tx['supplier_block_no'];  ?></option><?php } ?></datalist> </td>  <td > <input type="text"  id="supplier_s_no_'+ dynamic_id +'" name="supplier_slab_no[]" required="" class="form-control"/> </td> <td> <input type="text" id="gross_width_'+ dynamic_id +'" name="gross_width[]" required="" class="gross_width  form-control" /> </td> <td> <input type="text" id="gross_height_'+ dynamic_id +'" name="gross_height[]"  required="" class="gross_height form-control" /> </td>  <td > <input type="text"   style="width:60px;" readonly id="gross_sq_ft_'+ dynamic_id +'" name="gross_sq_ft[]" class="gross_sq_ft form-control"/> </td>   <td style="text-align:center;" >  <input type="text"   style="width:20px;" value="1" class="slab_no" id="slab_no_'+ dynamic_id +'" name="slab_no[]"   readonly  required=""/>  </td> <td> <input type="text" id="net_width_'+ dynamic_id +'" name="net_width[]" required="" class="net_width form-control" /> </td> <td> <input type="text" id="net_height_'+ dynamic_id +'" name="net_height[]"    required="" class="net_height form-control" /> </td> <td > <input type="text"   style="width:60px;" readonly id="net_sq_ft_'+ dynamic_id +'" name="net_sq_ft[]" class="net_sq_ft form-control"/> </td> <td>   <span class="input-symbol-euro"><input type="text" id="cost_sq_ft_'+ dynamic_id +'"  name="cost_sq_ft[]"   style="width:70px;" placeholder="0.00"  class="cost_sq_ft form-control" ></span>   <td >  <span class="input-symbol-euro"> <input type="text"  id="cost_sq_slab_'+ dynamic_id +'" name="cost_sq_slab[]"    style="width:70px;" placeholder="0.00"  class="cost_sq_slab form-control"/></span>     </td> <td>  <span class="input-symbol-euro">  <input type="text" id="sales_amt_sq_ft_'+ dynamic_id +'"  name="sales_amt_sq_ft[]"  style="width:70px;"  placeholder="0.00" class="sales_amt_sq_ft form-control" /></span>     </td>  <td >  <span class="input-symbol-euro">   <input type="text"  id="sales_slab_amt_'+ dynamic_id +'" name="sales_slab_amt[]"  style="width:70px;" placeholder="0.00"  class="sales_slab_amt form-control"/></td> </span>     </td> <td> <input type="text" id="weight_'+ dynamic_id +'" name="weight[]"  class="weight form-control" /> </td>  <td >  <select  id="origin_'+ dynamic_id +'"    name="origin[]" class="origin form-control">  <?php foreach ($country_code as $key => $value) { ?>  <option value="<?php echo $value['iso']; ?>"><?php echo $value['iso']; ?></option> <?php } ?> </select> </td>  <td > <span class="input-symbol-euro"><input  type="text" class="total_price form-control" style="width:80px;" readonly value="0.00"  id="total_amt_'+ dynamic_id +'"     name="total_amt[]"/></span> </td>  <td style="text-align:center;"> <button  class="delete btn btn-danger" id="delete_'+ dynamic_id +'" type="button" value="Delete" ><i class="fa fa-trash"></i></button> </td>  </tr> </tbody> <tfoot> <tr> <td style="text-align:right;" colspan="8"><b>Gross Sq.Ft :</b></td> <td > <input type="text" id="overall_gross_'+ dynamic_id +'" name="overall_gross[]"   class="overall_gross form-control" style="width: 60px"  readonly="readonly"  /> </td> <td style="text-align:right;" colspan="3"><b>Net Sq.Ft :</b></td> <td > <input type="text" id="overall_net_'+ dynamic_id +'" name="overall_net[]"  class="overall_net form-control"  style="width: 60px"  readonly /> </td>  <td><input type="text" id="costpersqft_'+ dynamic_id +'"  name="costpersqft[]"   style="width:60px;"   readonly   class="costpersqft form-control" /></span></td>'+
   '<td ><input type="text"  id="costperslab_'+ dynamic_id +'" name="costperslab[]"  readonly  style="width:60px;"   class="costperslab form-control"/></td><td>  <input type="text" id="salespricepersqft_'+ dynamic_id +'"  name="salespricepersqft[]"  readonly style="width:60px;"   class="salespricepersqft form-control" /></td><td >   <input type="text"  id="salesslabprice_'+ dynamic_id +'" name="salesslabprice[]"  style="width:60px;"  readonly  class="salesslabprice form-control"/></td> </span><td ><input type="text" id="overall_weight_'+ dynamic_id +'" name="overall_weight[]"  class="overall_weight form-control"  style="width: 60px"  readonly /></td><td style="text-align:right;font-size: 13px;" colspan="1"><b><?php echo "Total" ?> :</b></td><td ><span class="input-symbol-euro">    <input type="text" id="Total_'+ dynamic_id +'" name="total[]"   class="b_total form-control"  style="width: 80px" value="0.00"  readonly="readonly"  /></span></td>  <td  style="text-align:center;"><i id="buddle_'+ dynamic_id +'" onclick="removebundle(); " class="btn-danger removebundle fa fa-minus" aria-hidden="true"></i></td>   </tr> </foot></table> <i id="buddle_'+ dynamic_id +'"     onclick="addbundle(); " class="btnclr addbundle fa fa-plus" aria-hidden="true"></i>';  
   
   
   document.getElementById('content').appendChild(newdiv);
   
   dynamic_id++;
   
   }
    function addbundle1(){
   $(this).closest('table.purchaseTable').find('.addbundle').css("display","none");
   $(this).closest('table.purchaseTable').find('.removebundle').css("display","inline-block;");
   
   var newdiv = document.createElement('div');
   var tabin="crate_wrap_"+dynamic_id;
   
   newdiv = document.createElement("div");
   
   
   newdiv.innerHTML ='<table class="table purchaseTable table-bordered table-hover" id="purchaseTable'+ dynamic_id +'"> <thead> <tr> <th rowspan="2" class="text-center" style="width: 170px;" ><?php echo display('product_name'); ?><i class="text-danger">*</i></th> <th rowspan="2"  class="text-center"><?php echo display('Bundle No');?><i class="text-danger">*</i></th> <th rowspan="2"  class="text-center"><?php echo  display('description'); ?></th> <th rowspan="2" style="width:60px;" class="text-center"><?php echo display('Thick ness');?><i class="text-danger">*</i></th> <th rowspan="2" class="text-center"><?php echo display('Supplier Block No');?><i class="text-danger">*</i></th>  <th rowspan="2" class="text-center" ><?php echo display('Supplier Slab No');?><i class="text-danger">*</i> </th> <th colspan="2" style="width:150px;" class="text-center"><?php echo display('Gross Measurement');?><i class="text-danger">*</i> </th> <th rowspan="2" class="text-center"><?php echo display('Gross Sq.Ft');?></th>  <th rowspan="2" style="width:40px;" class="text-center"><?php echo display('Slab No');?><i class="text-danger">*</i></th> <th colspan="2" style="width:150px;" class="text-center"><?php echo display('Net Measure');?><i class="text-danger">*</i></th> <th rowspan="2" class="text-center"><?php echo display('Net Sq.Ft');?></th> <th rowspan="2" class="text-center"><?php echo display('Cost per Sq.Ft');?></th> <th rowspan="2"  class="text-center"><?php echo display('Cost per Slab');?></th> <th rowspan="2"  class="text-center"><?php echo display('sales'); ?><br/><?php echo display('Price per Sq.Ft');?></th> <th rowspan="2"  class="text-center"><?php echo display('Sales Slab Price');?></th> <th rowspan="2" class="text-center"><?php echo display('Weight');?></th> <th rowspan="2" class="text-center"><?php echo display('Origin');?></th>  <th rowspan="2" style="width: 100px" class="text-center"><?php  echo  display('total'); ?></th> <th rowspan="2" class="text-center"><?php  echo  display('action'); ?></th> </tr>  <tr> <th class="text-center"><?php echo display('Width');?></th> <th class="text-center"><?php echo display('Height');?></th> <th class="text-center"><?php echo display('Width');?></th> <th class="text-center"><?php echo display('Height');?></th> </tr>  </thead> <tbody id="addPurchaseItem_'+ dynamic_id +'"> <tr> <input type="hidden" name="tableid[]" id="tableid_'+ dynamic_id +'"/><td> <input   list="magicHouses"  style="width:160px;" name="prodt[]" id="prodt_'+ dynamic_id +'"   class="form-control product_name"  placeholder="Search Product" > <datalist id="magicHouses"> <option value="Select the Product" selected>Select the Product</option> <?php  foreach($product as $tx){?>  <option value="<?php echo $tx["product_name"]."-".$tx["product_model"];?>">  <?php echo $tx["product_name"]."-".$tx["product_model"];  ?></option> <?php } ?> </datalist> <input type="hidden" class="common_product autocomplete_hidden_value  product_id_'+ dynamic_id +'" name="product_id[]" id="SchoolHiddenId_'+ dynamic_id +'" /> </td> <td>  <input list="magic_bundle" name="bundle_no[]" id="bundle_no_'+ dynamic_id +'"   class="form-control bundle_no"'+
   'onchange="this.blur();" /><datalist id="magic_bundle"><?php foreach($bundle as $tx){?> <option value="<?php echo $tx['bundle_no'];?>">  <?php echo $tx['bundle_no'];  ?></option> <?php } ?>'+
   
   '</datalist></td> <td> <input type="text" id="description_'+ dynamic_id +'" name="description[]" class="form-control" /> </td>  <td > <input type="text" name="thickness[]" id="thickness_'+ dynamic_id +'" required="" class="form-control"/> </td>  <td><input list="magic_supplier_block" name="supplier_block_no[]"  id="supplier_b_no_'+ dynamic_id +'"   class="form-control supplier_block_no"  placeholder="Search Product"  onchange="this.blur();" /><datalist id="magic_supplier_block"><?php foreach($supplier_block_no as $tx){?><option value="<?php echo $tx['supplier_block_no'];?>">  <?php echo $tx['supplier_block_no'];  ?></option><?php } ?></datalist> </td>  <td > <input type="text"  id="supplier_s_no_'+ dynamic_id +'" name="supplier_slab_no[]" required="" class="form-control"/> </td> <td> <input type="text" id="gross_width_'+ dynamic_id +'" name="gross_width[]" required="" class="gross_width  form-control" /> </td> <td> <input type="text" id="gross_height_'+ dynamic_id +'" name="gross_height[]"  required="" class="gross_height form-control" /> </td>  <td > <input type="text"   style="width:60px;" readonly id="gross_sq_ft_'+ dynamic_id +'" name="gross_sq_ft[]" class="gross_sq_ft form-control"/> </td>   <td style="text-align:center;" >  <input type="text"   style="width:20px;" value="1" class="slab_no" id="slab_no_'+ dynamic_id +'" name="slab_no[]"   readonly  required=""/>  </td> <td> <input type="text" id="net_width_'+ dynamic_id +'" name="net_width[]" required="" class="net_width form-control" /> </td> <td> <input type="text" id="net_height_'+ dynamic_id +'" name="net_height[]"    required="" class="net_height form-control" /> </td> <td > <input type="text"   style="width:60px;" readonly id="net_sq_ft_'+ dynamic_id +'" name="net_sq_ft[]" class="net_sq_ft form-control"/> </td> <td>   <span class="input-symbol-euro"><input type="text" id="cost_sq_ft_'+ dynamic_id +'"  name="cost_sq_ft[]" readonly  style="width:70px;" value="0.00"  class="cost_sq_ft form-control" ></span>   <td >  <span class="input-symbol-euro"> <input type="text"  id="cost_sq_slab_'+ dynamic_id +'" name="cost_sq_slab[]" readonly   style="width:70px;" value="0.00"  class="cost_sq_slab form-control"/></span>     </td> <td>  <span class="input-symbol-euro">  <input type="text" id="sales_amt_sq_ft_'+ dynamic_id +'"  name="sales_amt_sq_ft[]"  style="width:70px;"  value="0.00" class="sales_amt_sq_ft form-control" /></span>     </td>  <td >  <span class="input-symbol-euro">   <input type="text"  id="sales_slab_amt_'+ dynamic_id +'" name="sales_slab_amt[]"  style="width:70px;" value="0.00"  class="sales_slab_amt form-control"/></td> </span>     </td> <td> <input type="text" id="weight_'+ dynamic_id +'" name="weight[]"  class="weight form-control" /> </td>  <td > <input type="text"  id="origin_'+ dynamic_id +'" name="origin[]" class="form-control"/> </td>  <td > <span class="input-symbol-euro"><input  type="text" class="total_price form-control" style="width:80px;" readonly value="0.00"  id="total_amt_'+ dynamic_id +'"     name="total_amt[]"/></span> </td>  <td style="text-align:center;"> <button  class="delete btn btn-danger" id="delete_'+ dynamic_id +'" type="button" value="Delete" ><i class="fa fa-trash"></i></button> </td>  </tr> </tbody> <tfoot> <tr> <td style="text-align:right;" colspan="8"><b>Gross Sq.Ft :</b></td> <td > <input type="text" id="overall_gross_'+ dynamic_id +'" name="overall_gross[]"   class="overall_gross form-control" style="width: 60px"  readonly  /> </td> <td style="text-align:right;" colspan="3"><b>Net Sq.Ft :</b></td> <td > <input type="text" id="overall_net_'+ dynamic_id +'" name="overall_net[]"  class="overall_net form-control"  style="width: 60px"  readonly  /> </td>  <td><span class="input-symbol-euro"><input type="text" id="cost_sq_ft_1"  name="cost_sq_ft[]" readonly  style="width:70px;" value="0.00"  class="cost_sq_ft form-control" /></span></td>'+
   '<td ><span class="input-symbol-euro"> <input type="text"  id="cost_sq_slab_'+ dynamic_id +'" name="cost_sq_slab[]" readonly   style="width:70px;" value="0.00"  class="cost_sq_slab form-control"/></span></td><td><span class="input-symbol-euro">  <input type="text" id="sales_amt_sq_ft_'+ dynamic_id +'"  name="sales_amt_sq_ft[]"  style="width:70px;"  placeholder="0.00" class="sales_amt_sq_ft form-control" /></span></td><td ><   <input type="text"  id="sales_slab_amt_'+ dynamic_id +'" name="sales_slab_amt[]"  style="width:70px;" placeholder="0.00"  class="sales_slab_amt form-control"/></td> </span><td ><input type="text" id="overall_weight_'+ dynamic_id +'" name="overall_weight[]"  class="overall_weight form-control"  style="width: 70px"  readonly  /></td><td style="text-align:right;font-size: 13px;" colspan="1"><b><?php echo "Total" ?> :</b></td><td ><span class="input-symbol-euro">    <input type="text" id="Total_'+ dynamic_id +'" name="total[]"   class="b_total form-control"  style="width: 80px" value="0.00"  readonly="readonly"  /></span></td>  <td  style="text-align:center;"><i id="buddle_'+ dynamic_id +'" onclick="removebundle(); " class="btn-danger removebundle fa fa-minus" aria-hidden="true"></i></td>   </tr> </foot></table> <i id="buddle_'+ dynamic_id +'"  style="float:right;color:white;background-color:#38469f;"   onclick="addbundle(); " class="addbundle fa fa-plus" aria-hidden="true"></i>';  
   
   
   document.getElementById('content').appendChild(newdiv);
   
   dynamic_id++;
   
   }
   
   
   
   $(document).on('click', '.addbundle', function(){
   $(this).css("display","none");
   $(this).closest('table').find('.removebundle').css("display","inline-block;");
   });
   $(document).on('keyup','.normalinvoice tbody tr:last',function (e) {
   
   var tid=$(this).closest('table').attr('id');
   const indexLast = tid.lastIndexOf('_');
   var id = tid.slice(indexLast + 1);
   var $last = $('#addPurchaseItem_'+id + ' tr:last');
   var num = id+($last.index()+1);
   
   $('#addPurchaseItem_'+id  + ' tr:last').clone().find('input,select').attr('id', function(i, current) {
   return current.replace(/\d+$/, num);
   
   }).end().appendTo('#addPurchaseItem_'+id );
   
   $.each($('#normalinvoice_'+id  +  '> tbody > tr'), function (index, el) {
      $(this).find(".slab_no").val(index + 1); // Simply couse the first "prototype" is not counted in the list                
   })
   var id1= $(this).closest('tr').find('.product_name').attr('id');
   var id_num = id1.substring(id1.indexOf('_') + 1);
   var pdt=$('#'+id1).val();
   console.log(pdt);
   const myArray = pdt.split("-");
   var product_nam=myArray[0];
   var product_model=myArray[1];
   var data = {
   product_nam:product_nam,
   product_model:product_model
   };
   data[csrfName] = csrfHash;
   $.ajax({
   type:'POST',
   data: data,
   dataType:"json",
   url:'<?php echo base_url();?>Cinvoice/availability',
   success: function(result, statut) {
      console.log(result);
      if(result.csrfName){
         csrfName = result.csrfName;
         csrfHash = result.csrfHash;
      }
        $("#total_amt_"+ id_num).val(result[0]['price']);
    $("#cost_sq_ft_"+ id_num).val(result[0]['cost_persqft']);
     $("#cost_sq_slab_"+ id_num).val(result[0]['cost_perslab']);
     $("#sales_slab_amt_"+id_num).val(result[0]['price'])
     $("#sales_amt_sq_ft_"+id_num).val(result[0]['sales_pricepersqft'])
    $("#SchoolHiddenId_"+ id_num).val(result[0]['product_id']);
    
    
    
    
      console.log(result);
   }
   });
   $.ajax({
   type:'POST',
   data: data,
   dataType:"json",
   url:'<?php echo base_url();?>Cinvoice/get_product_info',
   success: function(result, statut) {
      console.log(result);
      if(result.csrfName){
         csrfName = result.csrfName;
         csrfHash = result.csrfHash;
      }
      $("#sales_amt_sq_ft_"+ id_num).val(result[0]['sales_price_sqft']);
      $("#sales_slab_amt_"+ id_num).val(result[0]['sales_slab_price']);
   
   }
   });
   });
   
   
   
   $(document).on('click', '.removebundle', function(){
   
   
   var tid=$(this).closest('table').attr('id');
   localStorage.setItem("delete_table",tid);
   console.log(localStorage.getItem("delete_table"));
   var remove_id=$(this).closest('table').attr('id');
   $('#'+remove_id).remove();
   var sum=0;
   $('#'+localStorage.getItem("delete_table")).find('.total_price').each(function() {
   var v=$(this).val();
   sum += parseFloat(v);
   });
   $('#'+localStorage.getItem("delete_table")).find('.b_total').val(sum).trigger('change');
   var sumnet=0;
   
   $('#'+localStorage.getItem("delete_table")).find('.net_sq_ft').each(function() {
   var v=$(this).val();
   if (!isNaN(v) && v.length !== 0) {
       sumnet += parseFloat(v);
     }
   
   });
   $('#'+localStorage.getItem("delete_table")).find('.overall_net').val(sumnet.toFixed(3));
   
   
   var sumgross=0;
   
   $('#'+localStorage.getItem("delete_table")).find('.gross_sq_ft').each(function() {
   var v=$(this).val();
   if (!isNaN(v) && v.length !== 0) {
       sumgross += parseFloat(v);
     }
   
   });
   $('#'+localStorage.getItem("delete_table")).find('.overall_gross').val(sumgross.toFixed(3));
   var total_net=0;
   $('.table').each(function() {
   $(this).find('.net_sq_ft').each(function() {
     var precio = $(this).val();
     if (!isNaN(precio) && precio.length !== 0) {
       total_net += parseFloat(precio);
     }
   });
   
   
   
   });
   $('#total_net').val(total_net.toFixed(3)).trigger('change');
   var overall_gs=0;
   $('.table').each(function() {
   $(this).find('.gross_sq_ft').each(function() {
     var precio = $(this).val();
     if (!isNaN(precio) && precio.length !== 0) {
       overall_gs += parseFloat(precio);
     }
   });
   });
   
   $('#total_gross').val(overall_gs).trigger('change');
   var sum_w=0;
   $('#'+localStorage.getItem("delete_table")).find('.weight').each(function() {
     var precio = $(this).val();
     if (!isNaN(precio) && precio.length !== 0) {
       sum_w += parseFloat(precio);
     }
   });
   $('#'+localStorage.getItem("delete_table")).find('.overall_weight').val(sum_w).trigger('change');
   var total_w=0;
   $('.table').each(function() {
   $(this).find('.weight').each(function() {
     var precio = $(this).val();
     if (!isNaN(precio) && precio.length !== 0) {
       total_w += parseFloat(precio);
     }
   });
   
   });
   $('#total_weight').val(total_w.toFixed(3)).trigger('change');
   var overall_sum=0;
   $('.table').find('.total_price').each(function() {
   var v=$(this).val();
   overall_sum += parseFloat(v);
   
   });
   $('#Over_all_Total').val(overall_sum.toFixed(3)).trigger('change');
   
   gt(id);
   
   });
   
   
   
   $(document).on('keyup', '.weight', function(){
   var weight=0;
   $(this).closest('table').find('.weight').each(function() {
   var v=$(this).val();
   if (!isNaN(v) && v.length !== 0) {
    weight += parseFloat(v);
   }
   });
   $(this).closest('table').find('.overall_weight').val(weight.toFixed(3));
   var total_w=0;
   $('.table').each(function() {
   $(this).find('.weight').each(function() {
   var precio = $(this).val();
   if (!isNaN(precio) && precio.length !== 0) {
    total_w += parseFloat(precio);
   }
   });
   
   });
   $('#total_weight').val(total_w.toFixed(3)).trigger('change');
   
   });
   $(document).on('keyup', '.net_height,.net_width', function(){
   
   var tid=$(this).closest('table').attr('id');
   const indexLast1 = tid.lastIndexOf('_');
   var idt = tid.slice(indexLast1 + 1);
   var netheight = $(this).attr('id');
   const indexLastDot = netheight.lastIndexOf('_');
   var id = netheight.slice(indexLastDot + 1);
   var net_width='net_width_'+id;
   var net_height = 'net_height_'+ id;
   var netwidth=$('#'+net_width).val();
   var netheight=$('#'+net_height).val();
   var netresult=parseInt(netwidth) * parseInt(netheight);
   netresult=netresult/144;
   netresult = isNaN(netresult) ? 0 : netresult;
   var nresult=netresult.toFixed(3);
   $('#'+'net_sq_ft_'+id).val(netresult.toFixed(3));
   var cost_sq_slab=$('#cost_sq_slab_'+id).val();
   var tid=$(this).closest('table').attr('id');
   const indexLast = tid.lastIndexOf('_');
   var idt = tid.slice(indexLast + 1);
   var cost_amt_sq_ft=cost_sq_slab / nresult;
   cost_amt_sq_ft = isNaN(cost_amt_sq_ft) ? 0 : cost_amt_sq_ft;
   $('#'+'cost_sq_ft_'+id).val(cost_amt_sq_ft.toFixed(3));
   
   
   var cost_sq_slab=$('#sales_slab_amt_'+id).val();
   var tid=$(this).closest('table').attr('id');
   const indexLast2 = tid.lastIndexOf('_');
   var idt = tid.slice(indexLast2 + 1);
   var cost_amt_sq_ft=cost_sq_slab / nresult;
   cost_amt_sq_ft = isNaN(cost_amt_sq_ft) ? 0 : cost_amt_sq_ft;
   $('#'+'sales_amt_sq_ft_'+id).val(cost_amt_sq_ft.toFixed(3));
   
   
   
   
   var sumnet=0;
   $(this).closest('table').find('.net_sq_ft').each(function() {
   var v=$(this).val();
   if (!isNaN(v) && v.length !== 0) {
    sumnet += parseFloat(v);
   }
   
   });
   $('#overall_net_'+idt).val(sumnet.toFixed(3));
   var total_net=0;
   $('.table').each(function() {
   $(this).find('.net_sq_ft').each(function() {
   var precio = $(this).val();
   if (!isNaN(precio) && precio.length !== 0) {
    total_net += parseFloat(precio);
   }
   });
   
   
   
   
   });
   $('#total_net').val(total_net.toFixed(3)).trigger('change');
   
   
   var sum=0;
   
   $(this).closest('table').find('.total_price').each(function() {
   var v=$(this).val();
   sum += parseFloat(v);
   
   });
   
   var overall_sum=0;
   $('.table').each(function() {
   $(this).find('.total_price').each(function() {
   var precio = $(this).val();
   if (!isNaN(precio) && precio.length !== 0) {
    overall_sum += parseFloat(precio);
   }
   });
   
   
   
   
   });
   
   $('#Over_all_Total').val(overall_sum.toFixed(3)).trigger('change');
   $('#Total_'+idt).val(sum);
   var s=0;
   $(this).closest('table').find('.cost_sq_ft').each(function() {
   var precio = $(this).val();
   if (!isNaN(precio) && precio.length !== 0) {
    s += parseFloat(precio);
   }
   });
   $(this).closest('table').find('.costpersqft').val(s).trigger('change');
   calculate();
   });
   
   $(document).on('input', '.gross_height,.gross_width', function(){
   
   var netheight = $(this).attr('id');
   const indexLastDot = netheight.lastIndexOf('_');
   var id = netheight.slice(indexLastDot + 1);
   var net_width='gross_width_'+id;
   var net_height = 'gross_height_'+ id;
   var tid=$(this).closest('table').attr('id');
   const indexLast = tid.lastIndexOf('_');
   var idt = tid.slice(indexLast + 1);
   var netwidth=$('#'+net_width).val();
   var netheight=$('#'+net_height).val();
   var netresult=parseInt(netwidth) * parseInt(netheight);
   netresult=netresult/144;
   netresult = isNaN(netresult) ? 0 : netresult;
   var nresult=netresult.toFixed(3);
   
   $('#'+'gross_sq_ft_'+id).val(netresult.toFixed(3));
   
   var sumgross=0;
   
   $(this).closest('table').find('.gross_sq_ft').each(function() {
   var v=$(this).val();
   if (!isNaN(v) && v.length !== 0) {
    sumgross += parseFloat(v);
   }
   
   });
   $('#overall_gross_'+idt).val(sumgross.toFixed(3));
   
   
   var overall_gs=0;
   $('.table').each(function() {
   $(this).find('.gross_sq_ft').each(function() {
   var precio = $(this).val();
   if (!isNaN(precio) && precio.length !== 0) {
    overall_gs += parseFloat(precio);
   }
   });
   });
   
   $('#total_gross').val(overall_gs).trigger('change');
   
   gt(id);
   
   });
   $(document).on('change select input','.product_name', function (e) {
   
   var netheight = $(this).attr('id');
   const indexLastDot = netheight.lastIndexOf('_');
   var id = netheight.slice(indexLastDot + 1);
   var net_width='net_width_'+id;
   var net_height = 'net_height_'+ id;
   var netwidth=$('#'+net_width).val();
   
   var netheight=$('#'+net_height).val();
   var netresult=parseInt(netwidth) * parseInt(netheight);
   netresult=netresult/144;
   netresult = isNaN(netresult) ? 0 : netresult;
   var nresult=netresult.toFixed(3);
   $('#'+'net_sq_ft_'+id).val(netresult.toFixed(3));
   var cost_sqft=$('#cost_sq_ft_'+id).val();
   var tid=$(this).closest('table').attr('id');
   const indexLast = tid.lastIndexOf('_');
   var idt = tid.slice(indexLast + 1);
   var sales_slab_price=$('#sales_slab_amt_'+id).val();
   var tid=$(this).closest('table').attr('id');
   
   var sales_amt_sq_ft=sales_slab_price / nresult;
   
   sales_amt_sq_ft = isNaN(sales_amt_sq_ft) ? 0 : sales_amt_sq_ft;
   $('#'+'sales_amt_sq_ft_'+id).val(sales_amt_sq_ft.toFixed(3));
   $('#'+'total_amt_'+id).val(sales_amt_sq_ft.toFixed(3));
   
   var id= $(this).attr('id');
   var id_num = id.substring(id.indexOf('_') + 1);
   var pdt=$('#'+id).val();
   console.log(pdt);
   const myArray = pdt.split("-");
   var product_nam=myArray[0];
   var product_model=myArray[1];
   var data = {
   product_nam:product_nam,
   product_model:product_model
   };
   data[csrfName] = csrfHash;
   $.ajax({
   type:'POST',
   data: data,
   dataType:"json",
   url:'<?php echo base_url();?>Cinvoice/availability',
   success: function(result, statut) {
      console.log(result);
      if(result.csrfName){
         csrfName = result.csrfName;
         csrfHash = result.csrfHash;
      }
     $("#total_amt_"+ id_num).val(result[0]['price']);
    $("#cost_sq_ft_"+ id_num).val(result[0]['cost_persqft']);
     $("#cost_sq_slab_"+ id_num).val(result[0]['cost_perslab']);
     $("#sales_slab_amt_"+id_num).val(result[0]['price'])
     $("#sales_amt_sq_ft_"+id_num).val(result[0]['sales_pricepersqft'])
    $("#SchoolHiddenId_"+ id_num).val(result[0]['product_id']);
      console.log(result);
   }
   });
   $.ajax({
   type:'POST',
   data: data,
   dataType:"json",
   url:'<?php echo base_url();?>Cinvoice/get_product_info',
   success: function(result, statut) {
    // debugger;
    //   console.log("werwerwerwerwerwerwerwerwer");
      
      if(result.csrfName){
         csrfName = result.csrfName;
         csrfHash = result.csrfHash;
      }
      $("#sales_amt_sq_ft_"+ id_num).val(result[0]['sales_price_sqft']);
      $("#sales_slab_amt_"+ id_num).val(result[0]['sales_slab_price']);
   
   var costpersqft=0;
   $(this).closest('table').find('.cost_sq_ft').each(function() {
   var precio = $(this).val();
   if (!isNaN(precio) && precio.length !== 0) {
    costpersqft += parseFloat(precio);
   }
   });
   $('#costpersqft_'+idt).val(costpersqft).trigger('change');
   var cost_sq_slab=0;
   $(this).closest('table').find('.cost_sq_slab').each(function() {
   var precio = $(this).val();
   if (!isNaN(precio) && precio.length !== 0) {
    cost_sq_slab += parseFloat(precio);
   }
   });
   $('#costperslab_'+idt).val(cost_sq_slab).trigger('change');
   var sales_amt_sq_ft=0;
   $(this).closest('table').find('.sales_amt_sq_ft').each(function() {
   var precio = $(this).val();
   if (!isNaN(precio) && precio.length !== 0) {
    sales_amt_sq_ft += parseFloat(precio);
   }
   });
   $('#salespricepersqft_'+idt).val(sales_amt_sq_ft).trigger('change');
   var sales_slab_amt=0;
   $(this).closest('table').find('.sales_slab_amt').each(function() {
   var precio = $(this).val();
   if (!isNaN(precio) && precio.length !== 0) {
    sales_slab_amt += parseFloat(precio);
   }
   });
   $('#salesslabprice_'+idt).val(sales_slab_amt).trigger('change');
   var sumnet=0;
   
   $(this).closest('table').find('.net_sq_ft').each(function() {
   var v=$(this).val();
   if (!isNaN(v) && v.length !== 0) {
    sumnet += parseFloat(v);
   }
   
   });
   $('#overall_net_'+idt).val(sumnet.toFixed(3));
   var sumgross=0;
   
   $(this).closest('table').find('.gross_sq_ft').each(function() {
   var v=$(this).val();
   if (!isNaN(v) && v.length !== 0) {
    sumgross += parseFloat(v);
   }
   
   });
   $('#overall_gross_'+idt).val(sumgross.toFixed(3));
   var total_net=0;
   $('.table').each(function() {
   $(this).find('.net_sq_ft').each(function() {
   var precio = $(this).val();
   if (!isNaN(precio) && precio.length !== 0) {
    total_net += parseFloat(precio);
   }
   });
   
   
   });
   $('#total_net').val(total_net.toFixed(3)).trigger('change');
   var overall_gs=0;
   $('.table').each(function() {
   $(this).find('.gross_sq_ft').each(function() {
   var precio = $(this).val();
   if (!isNaN(precio) && precio.length !== 0) {
    overall_gs += parseFloat(precio);
   }
   });
   });
   
   $('#total_gross').val(overall_gs).trigger('change');
   
   
   var overall_sum=0;
   $('.table').each(function() {
   $(this).find('.total_price').each(function() {
   var precio = $(this).val();
   if (!isNaN(precio) && precio.length !== 0) {
    overall_sum += parseFloat(precio);
   }
   });
   
   
   });
   
   
   $('#Over_all_Total').val(overall_sum.toFixed(3)).trigger('change');
   var sum=0;
   
   $(this).closest('table').find('.total_price').each(function() {
   var v=$(this).val();
   sum += parseFloat(v);
   
   });
   $('#Total_'+idt).val(sum);
   
   
   gt(id);
   }
   });
   
   });
   
   $(document).on('change input keyup','.sales_amt_sq_ft', function (e) {
   
   var netheight = $(this).attr('id');
   const indexLastDot = netheight.lastIndexOf('_');
   var id_num = netheight.slice(indexLastDot + 1);
   var sales_amt_sq_ft=$('#sales_amt_sq_ft_'+id_num).val();
   var net_sq_ft=$('#net_sq_ft_'+id_num).val();
   var netresult =sales_amt_sq_ft* net_sq_ft;
   netresult = isNaN(netresult) ? 0 : netresult;
   var nresult=netresult.toFixed(3);
   $('#'+'sales_slab_amt_'+id_num).val(netresult.toFixed(3));
   
   
   
   var sales_amt_sq_ft=0;
   $(this).closest('table').find('.sales_amt_sq_ft').each(function() {
   var precio = $(this).val();
   if (!isNaN(precio) && precio.length !== 0) {
    sales_amt_sq_ft += parseFloat(precio);
   }
   });
   $(this).closest('table').find('.salespricepersqft').val(sales_amt_sq_ft).trigger('change');
   var sales_slab_amt=0;
   $(this).closest('table').find('.sales_slab_amt').each(function() {
   var precio = $(this).val();
   if (!isNaN(precio) && precio.length !== 0) {
    sales_slab_amt += parseFloat(precio);
   }
   });
   $(this).closest('table').find('.salesslabprice').val(sales_slab_amt).trigger('change');
   
   calculate();
   });
   $(document).on('change input keyup','.cost_sq_slab', function (e) {
   //    debugger;
       var netheight = $(this).attr('id');
   const indexLastDot = netheight.lastIndexOf('_');
   var id_num = netheight.slice(indexLastDot + 1);
   
   var sales_slab_amt=$('#cost_sq_slab_'+id_num).val();
   var net_sq_ft=$('#net_sq_ft_'+id_num).val();
   var netresult =sales_slab_amt/net_sq_ft;
   netresult = isNaN(netresult) ? 0 : netresult;
   var nresult=netresult.toFixed(3);
   $('#'+'cost_sq_ft_'+id_num).val(netresult.toFixed(3));
   $('#total_amt_'+id_num).val(sales_slab_amt);
   var sales_slab_amt=0;
   $(this).closest('table').find('.cost_sq_slab').each(function() {
   var precio = $(this).val();
   if (!isNaN(precio) && precio.length !== 0) {
    sales_slab_amt += parseFloat(precio);
   }
   });
   $(this).closest('table').find('.costperslab').val(sales_slab_amt).trigger('change');
   debugger;
   var overall_sum=0;
   $('.table').each(function() {
   $(this).find('.total_price').each(function() {
   var precio = $(this).val();
   if (!isNaN(precio) && precio.length !== 0) {
    overall_sum += parseFloat(precio);
   }
   });
   
   
   
   
   });
   
   $('#Over_all_Total').val(overall_sum.toFixed(3)).trigger('change');
   var sales_amt_sq_ft=0;
   $(this).closest('table').find('.cost_sq_ft').each(function() {
   var precio = $(this).val();
   if (!isNaN(precio) && precio.length !== 0) {
    sales_amt_sq_ft += parseFloat(precio);
   }
   });
   $(this).closest('table').find('.costpersqft').val(sales_amt_sq_ft).trigger('change');
   var sum=0;
   $(this).closest('table').find('.total_price').each(function() {
   var v=$(this).val();
   sum += parseFloat(v);
   });
   $(this).closest('table').find('.b_total').val(sum.toFixed(3)).trigger('change');
   calculate();
   });
   $(document).on('change input keyup','.cost_sq_ft', function (e) {
   //    debugger;
   var netheight = $(this).attr('id');
   const indexLastDot = netheight.lastIndexOf('_');
   var id_num = netheight.slice(indexLastDot + 1);
   var sales_amt_sq_ft=$('#cost_sq_ft_'+id_num).val();
   var net_sq_ft=$('#net_sq_ft_'+id_num).val();
   var netresult =sales_amt_sq_ft* net_sq_ft;
   netresult = isNaN(netresult) ? 0 : netresult;
   var nresult=netresult.toFixed(3);
   $('#'+'cost_sq_slab_'+id_num).val(netresult.toFixed(3));
   $(this).closest('tr').find('.total_price').val(netresult.toFixed(3));
   
   var sales_amt_sq_ft=0;
   $(this).closest('table').find('.cost_sq_ft').each(function() {
   var precio = $(this).val();
   if (!isNaN(precio) && precio.length !== 0) {
    sales_amt_sq_ft += parseFloat(precio);
   }
   });
   $(this).closest('table').find('.costpersqft').val(sales_amt_sq_ft).trigger('change');
   var overall_sum=0;
   $('.table').each(function() {
   $(this).find('.total_price').each(function() {
   var precio = $(this).val();
   if (!isNaN(precio) && precio.length !== 0) {
    overall_sum += parseFloat(precio);
   }
   });
   
   
   
   
   });
   
   $('#Over_all_Total').val(overall_sum.toFixed(3)).trigger('change');
   var sales_slab_amt=0;
   $(this).closest('table').find('.cost_sq_slab').each(function() {
   var precio = $(this).val();
   if (!isNaN(precio) && precio.length !== 0) {
    sales_slab_amt += parseFloat(precio);
   }
   });
   $(this).closest('table').find('.costperslab').val(sales_slab_amt).trigger('change');
   var sum=0;
   $(this).closest('table').find('.total_price').each(function() {
   var v=$(this).val();
   sum += parseFloat(v);
   });
   $(this).closest('table').find('.b_total').val(sum.toFixed(3)).trigger('change');
   calculate();
   });
   $(document).on('change input keyup','.sales_slab_amt', function (e) {
   
   var netheight = $(this).attr('id');
   const indexLastDot = netheight.lastIndexOf('_');
   var id_num = netheight.slice(indexLastDot + 1);
   
   var sales_slab_amt=$('#sales_slab_amt_'+id_num).val();
   var net_sq_ft=$('#net_sq_ft_'+id_num).val();
   var netresult =sales_slab_amt/net_sq_ft;
   netresult = isNaN(netresult) ? 0 : netresult;
   var nresult=netresult.toFixed(3);
   $('#'+'sales_amt_sq_ft_'+id_num).val(netresult.toFixed(3));
   
   
   
   var sales_slab_amt=0;
   $(this).closest('table').find('.sales_slab_amt').each(function() {
   var precio = $(this).val();
   if (!isNaN(precio) && precio.length !== 0) {
    sales_slab_amt += parseFloat(precio);
   }
   });
   $(this).closest('table').find('.salesslabprice').val(sales_slab_amt).trigger('change');
   var sales_amt_sq_ft=0;
   $(this).closest('table').find('.sales_amt_sq_ft').each(function() {
   var precio = $(this).val();
   if (!isNaN(precio) && precio.length !== 0) {
    sales_amt_sq_ft += parseFloat(precio);
   }
   });
   $(this).closest('table').find('.salespricepersqft').val(sales_amt_sq_ft).trigger('change');
   
   calculate();
   });
   
   
   $(document).ready(function(){
   //$('.removebundle').hide();
   $('#amt').hide();
   $('#bal').hide();
   });
   function calculate(){
   
   var total=$('#Over_all_Total').val();
   var tax= $('#product_tax').val();
   var percent='';
   var hypen='-';
   if(tax.indexOf(hypen) != -1){
   var field = tax.split('-');
   
   var percent = field[1];
   
   }else if(tax=='Select the Tax'){
   
   percent="0";
   }
   
   else{
   percent=tax;
   }
   percent=percent.replace("%","");
   var answer = (percent / 100) * parseFloat(total);
   
   
   var gtotal = parseFloat(total + answer);
   console.log("gtotal :" +gtotal);
   
   
   
   var final_g= $('#final_gtotal').val();
   
   
   var amt=parseFloat(answer)+parseFloat(total);
   var num = isNaN(parseFloat(amt)) ? 0 : parseFloat(amt)
   $('#gtotal').val(num); 
   var custo_amt=$('.custocurrency_rate').val(); 
   console.log("numhere :"+num +"-"+custo_amt);
   var value=num*custo_amt;
   var custo_final = isNaN(parseFloat(value)) ? 0 : parseFloat(value)
   $('#vendor_gtotal').val(custo_final); 
   $('#tax_details').val(answer.toFixed(3) +" ( "+tax+" )");
   
   
   
   
   var bal_amt=custo_final-$('#amount_paid').val();
   $('#balance').val(bal_amt);
   
   }
   
   
   
   
   $('#Total').on('change textInput input', function (e) {
   calculate();
   });
   
   $('.custocurrency_rate').on('change textInput input', function (e) {
   calculate();
   });
   
   
   $(document).ready(function(){
   
   
   
   var tid=$('.table').closest('table').attr('id');
   const indexLast = tid.lastIndexOf('_');
   var id = tid.slice(indexLast + 1);
   
   
   for (j = 0; j < 6; j++) {
   var $last = $('#addPurchaseItem_1 tr:last');
   // var num = id+"_"+$last.index() + 2;
   var num = id+($last.index()+1);
   
   
   
   
   $('#addPurchaseItem_1 tr:last').clone().find('input,select,button').attr('id', function(i, current) {
   return current.replace(/\d+$/, num);
   
   }).end().appendTo('#addPurchaseItem_1');
   $.each($('#normalinvoice_1 > tbody > tr'), function (index, el) {
      $(this).find(".slab_no").val(index + 1); // Simply couse the first "prototype" is not counted in the list                
   })
   
   }
   
   
   
   });
   $('#purchasetax_btn').submit(function (event) {
   var dataString = {
   dataString : $("#purchasetax_btn").serialize()
   };
   dataString[csrfName] = csrfHash;
   $.ajax({
   type:"POST",
   dataType:"json",
   url:"<?php echo base_url(); ?>Cpurchase/insert_purchasetax",
   data:$("#purchasetax_btn").serialize(),
   success: function (data1) {
   console.log(data1);
   $("#magic_purchaseorder").empty();
   for (var i in data1) {
   console.log(data1);
    $("<option/>").html(data1[i].tax_id +'-'+ data1[i].tax).appendTo("#magic_purchaseorder");
   }
   $("#magic_purchaseorder").focus();
   $("#bodyModal1").html("Tax Added Successfully");
   $('#myModal1').modal('show');
   window.setTimeout(function(){
   $('#purchasetax_info').modal('hide');
   $('.modal-backdrop').remove();
   $('#myModal1').modal('hide');
   }, 2000);
   }
   });
   event.preventDefault();
   });
   
   function configureDropDownLists(ddl1,ddl2) {
   var assets = ['CASH Operating Account', 'CASH Debitors', 'CASH Petty Cash'];
   var receivables = ['A/REC Trade', 'A/REC Trade Notes Receivable', 'A/REC Installment Receivables','A/REC Retainage Withheld','A/REC Allowance for Uncollectible Accounts'];
   var inventories = ['INV – Reserved', 'INV – Work-in-Progress', 'INV – Finished Goods','INV – Reserved','INV – Unbilled Cost & Fees','INV – Reserve for Obsolescence'];
   var prepaid_expense = ['PREPAID – Insurance', 'PREPAID – Real Estate Taxes', 'PREPAID – Repairs & Maintenance','PREPAID – Rent','PREPAID – Deposits'];
   var property_plant = ['PPE – Buildings', 'PPE – Machinery & Equipment', 'PPE – Vehicles','PPE – Computer Equipment','PPE – Furniture & Fixtures','PPE – Leasehold Improvements'];
   var acc_dep = ['ACCUM DEPR Buildings', 'ACCUM DEPR Machinery & Equipment', 'ACCUM DEPR Vehicles','ACCUM DEPR Computer Equipment','ACCUM DEPR Furniture & Fixtures','ACCUM DEPR Leasehold Improvements'];
   var noncurrenctreceivables = ['NCA – Notes Receivable', 'NCA – Installment Receivables', 'NCA – Retainage Withheld'];
   var intercompany_receivables = ['Organization Costs', 'Patents & Licenses', 'Intangible Assets – Capitalized Software Costs'];
   var liabilities = ['A/P Trade', 'A/P Accrued Accounts Payable', 'A/P Retainage Withheld','Current Maturities of Long-Term Debt','Bank Notes Payable','Construction Loans Payable'];
   var accrued_compensation = ['Accrued – Payroll', 'Accrued – Commissions', 'Accrued – FICA','Accrued – Unemployment Taxes','Accrued – Workmen’s Comp'];
   var other_accrued_expenses = ['Accrued – Rent', 'Accrued – Interest', 'Accrued – Property Taxes', 'Accrued – Warranty Expense'];
   var accrued_taxes= ['Accrued – Federal Income Taxes', 'Accrued – State Income Taxes', 'Accrued – Franchise Taxes','Deferred – FIT Current','Deferred – State Income Taxes'];
   var deferred_taxes= ['D/T – FIT – NON CURRENT', 'D/T – SIT – NON CURRENT'];
   var long_term_debt=['LTD – Notes Payable','LTD – Mortgages Payable','LTD – Installment Notes Payable'];
   var intercompany_payables=['Common Stock','Preferred Stock','Paid in Capital','Partners Capital','Member Contributions','Retained Earnings'];
   var revenue=['REVENUE – PRODUCT 1','REVENUE – PRODUCT 2','REVENUE – PRODUCT 3','REVENUE – PRODUCT 4','Interest Income','Other Income','Finance Charge Income','Sales Returns and Allowances','Sales Discounts'];
   var cost_goods= ['COGS – PRODUCT 1', 'COGS – PRODUCT 2','COGS – PRODUCT 3','COGS – PRODUCT 4','Freight','Inventory Adjustments','Purchase Returns and Allowances','Reserved'];
   var operating_expenses=['Advertising Expense','Amortization Expense','Auto Expense','Bad Debt Expense','Bad Debt Expense','Bank Charges','Cash Over and Short','Commission Expense','Depreciation Expense','Employee Benefit Program','Freight Expense','Gifts Expense','Insurance – General','Interest Expense','Professional Fees','License Expense','Maintenance Expense','Meals and Entertainment','Office Expense','Payroll Taxes','Printing','Postage','Rent','Repairs Expense','Salaries Expense','Supplies Expense','Taxes – FIT Expense','Utilities Expense','Gain/Loss on Sale of Assets'];
   switch (ddl1.value) {
   case 'ASSETS':
   ddl2.options.length = 0;
   for (i = 0; i < assets.length; i++) {
   createOption(ddl2, assets[i], assets[i]);
   }
   break;
   case 'RECEIVABLES':
   ddl2.options.length = 0;
   for (i = 0; i < receivables.length; i++) {
   createOption(ddl2, receivables[i], receivables[i]);
   }
   break;
   case 'INVENTORIES':
   ddl2.options.length = 0;
   for (i = 0; i < inventories.length; i++) {
   createOption(ddl2, inventories[i], inventories[i]);
   }
   break;
   case 'PREPAID EXPENSES & OTHER CURRENT ASSETS':
   ddl2.options.length = 0;
   for (i = 0; i < prepaid_expense.length; i++) {
   createOption(ddl2, prepaid_expense[i], prepaid_expense[i]);
   }
   break;
   case 'PROPERTY PLANT & EQUIPMENT':
   ddl2.options.length = 0;
   for (i = 0; i < property_plant.length; i++) {
   createOption(ddl2, property_plant[i], property_plant[i]);
   }
   break;
   case 'ACCUMULATED DEPRECIATION & AMORTIZATION':
   ddl2.options.length = 0;
   for (i = 0; i < acc_dep.length; i++) {
   createOption(ddl2, acc_dep[i], acc_dep[i]);
   }
   break;
   case 'NON – CURRENT RECEIVABLES':
   ddl2.options.length = 0;
   for (i = 0; i < noncurrenctreceivables.length; i++) {
   createOption(ddl2, noncurrenctreceivables[i], noncurrenctreceivables[i]);
   }
   break;
   case 'INTERCOMPANY RECEIVABLES & OTHER NON-CURRENT ASSETS':
   ddl2.options.length = 0;
   for (i = 0; i < intercompany_receivables.length; i++) {
   createOption(ddl2, intercompany_receivables[i], intercompany_receivables[i]);
   }
   break;
   case 'LIABILITIES & PAYABLES':
   ddl2.options.length = 0;
   for (i = 0; i < liabilities.length; i++) {
   createOption(ddl2, liabilities[i], liabilities[i]);
   }
   break;
   case 'ACCRUED COMPENSATION & RELATED ITEMS':
   ddl2.options.length = 0;
   for (i = 0; i < accrued_compensation.length; i++) {
   createOption(ddl2, accrued_compensation[i], accrued_compensation[i]);
   }
   break;
   case 'OTHER ACCRUED EXPENSES':
   ddl2.options.length = 0;
   for (i = 0; i < other_accrued_expenses.length; i++) {
   createOption(ddl2, other_accrued_expenses[i], other_accrued_expenses[i]);
   }
   break;
   case 'ACCRUED TAXES':
   ddl2.options.length = 0;
   for (i = 0; i < accrued_taxes.length; i++) {
   createOption(ddl2, accrued_taxes[i], accrued_taxes[i]);
   }
   break;
   case 'DEFERRED TAXES':
   ddl2.options.length = 0;
   for (i = 0; i < deferred_taxes.length; i++) {
   createOption(ddl2, deferred_taxes[i], deferred_taxes[i]);
   }
   break;
   case 'LONG-TERM DEBT':
   ddl2.options.length = 0;
   for (i = 0; i < long_term_debt.length; i++) {
   createOption(ddl2, long_term_debt[i], long_term_debt[i]);
   }
   break;
   case 'INTERCOMPANY PAYABLES & OTHER NON CURRENT LIABILITIES & OWNERS EQUITIES':
   ddl2.options.length = 0;
   for (i = 0; i < intercompany_payables.length; i++) {
   createOption(ddl2, intercompany_payables[i], intercompany_payables[i]);
   }
   break;
   case 'REVENUE':
   ddl2.options.length = 0;
   for (i = 0; i < revenue.length; i++) {
   createOption(ddl2, revenue[i], revenue[i]);
   }
   break;
   case 'COST OF GOODS SOLD':
   ddl2.options.length = 0;
   for (i = 0; i < cost_goods.length; i++) {
   createOption(ddl2, cost_goods[i], cost_goods[i]);
   }
   break;
   case 'OPERATING EXPENSES':
   ddl2.options.length = 0;
   for (i = 0; i < operating_expenses.length; i++) {
   createOption(ddl2, operating_expenses[i], operating_expenses[i]);
   }
   break;
   default:
   ddl2.options.length = 0;
   break;
   }
   }
   function createOption(ddl, text, value) {
   var opt = document.createElement('option');
   opt.value = value;
   opt.text = text;
   ddl.options.add(opt);
   }
   
</script>
<style>
   .main-footer {
   display:none;
   }
   textarea:focus, input:focus{
   outline: none;
   }
   .text-right {
   text-align: left; 
   }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">
   const dt = new DataTransfer(); // Permet de manipuler les fichiers de l'input file
   
   $("#attachment").on('change', function(e){
       // alert('hi');
       for(var i = 0; i < this.files.length; i++){
           let fileBloc = $('<span/>', {class: 'file-block'}),
                fileName = $('<span/>', {class: 'name', text: this.files.item(i).name});
           fileBloc.append('<span class="file-delete"><span><i class="fa fa-trash-o"></i></span></span>')
               .append(fileName);
           $("#filesList > #files-names").append(fileBloc);
       };
       // Ajout des fichiers dans l'objet DataTransfer
       for (let file of this.files) {
           dt.items.add(file);
       }
       // Mise à jour des fichiers de l'input file après ajout
       this.files = dt.files;
   
       // EventListener pour le bouton de suppression créé
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
   });
   
   
   
   
   
   
   
   
      $('#supplier_name').on('change', function (e) {
                    //  localStorage.setItem("sale_supplier_id",$('#supplier_id').val());
                    //  alert($('#supplier_name').val());
                      var data = {
                          value: $('#supplier_name').val()
                  
                       };
                      data[csrfName] = csrfHash;
                      $.ajax({
                          type:'POST',
                          data: data,
                        dataType:"json",
                          url:'<?php echo base_url();?>Cinvoice/getvendor',
                          success: function(result, statut) {
                              console.log(result);
                              if(result.csrfName){
                                csrfName = result.csrfName;
                                 csrfHash = result.csrfHash;
                              }
                           console.log(result[0]['currency_type']);
                          $(".custocurrency_rate").html(result[0]['currency_type']);
                          $("#autocomplete_supplier_id").val(result[0]['supplier_id']);
                          $("label[for='custocurrency']").html(result[0]['currency_type']);
                       
                         $.getJSON('https://open.er-api.com/v6/latest/<?php echo $curn_info_default; ?>', 
                  function(data) {
                   var custo_currency=result[0]['currency_type'];
                      var x=data['rates'][custo_currency];
                   var Rate =parseFloat(x).toFixed(3);
                   Rate = isNaN(Rate) ? 0 : Rate;
                    console.log(Rate);
                    $('.hiden').show();
                    $(".custocurrency_rate").val(Rate);
                  });
                        
                          }
                      });
                  <?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
                  
                  });
   
   
   
   
   
   
   
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
</style>
<div class="modal fade" id="service_payment_modal" >
   <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content" style="    margin-top: 190px;text-align:center;">
         <div class="modal-header btnclr "  >
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><?php echo  display('add_payment'); ?></h4>
         </div>
         <div class="modal-body">
            <form id="add_payment_infos"  method="post" >
               <div class="row">
                  <div class="form-group row">
                     <label for="date" style="text-align:end;" class="col-sm-3 col-form-label"><?php  echo  display('payment_date'); ?> <i class="text-danger">*</i></label>
                     <div class="col-sm-5">
                        <?php
                           $date = date('Y-m-d');
                           ?>
                        <input class=" form-control" type="date"  name="payment_date" id="payment_date" required value="<?php echo html_escape($date); ?>" tabindex="4" />
                     </div>
                  </div>
                  <input type="hidden" id="cutomer_name" name="cutomer_name"/>
                  <input type="hidden"   class="payment_id_service"  name="payment_id_service"  value="<?php echo $payment_id_service ?>"  />
                  <div class="form-group row">
                     <label for="billing_address" style="text-align:end;" class="col-sm-3 col-form-label"><?php  echo  display('Reference No'); ?><i class="text-danger">*</i></label>
                     <div class="col-sm-5">
                        <input class=" form-control" type="text"  name="ref_no" id="ref_no" required   />
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="bank" style="text-align:end;" class="col-sm-3 col-form-label"><?php  echo  display('Select Bank'); ?>:<i class="text-danger">*</i></label>
                     <a data-toggle="modal" href="#add_bank_info"    class="btn  btnclr"><i class="fa fa-university"></i></a>
                     <div class="col-sm-5">
                        <select name="bank" id="bank"  class="form-control bankpayment" >
                           <option value="JPMorgan Chase">JPMorgan Chase</option>
                           <option value="New York City">New York City</option>
                           <option value="Bank of America">Bank of America</option>
                           <option value="Citigroup">Citigroup</option>
                           <option value="Wells Fargo">Wells Fargo</option>
                           <option value="Goldman Sachs">Goldman Sachs</option>
                           <option value="Morgan Stanley">Morgan Stanley</option>
                           <option value="U.S. Bancorp">U.S. Bancorp</option>
                           <option value="PNC Financial Services">PNC Financial Services</option>
                           <option value="Truist Financial">Truist Financial</option>
                           <option value="Charles Schwab Corporation">Charles Schwab Corporation</option>
                           <option value="TD Bank, N.A.">TD Bank, N.A.</option>
                           <option value="Capital One">Capital One</option>
                           <option value="The Bank of New York Mellon">The Bank of New York Mellon</option>
                           <option value="State Street Corporation">State Street Corporation</option>
                           <option value="American Express">American Express</option>
                           <option value="Citizens Financial Group">Citizens Financial Group</option>
                           <option value="HSBC Bank USA">HSBC Bank USA</option>
                           <option value="SVB Financial Group">SVB Financial Group</option>
                           <option value="First Republic Bank ">First Republic Bank </option>
                           <option value="Fifth Third Bank">Fifth Third Bank</option>
                           <option value="BMO USA">BMO USA</option>
                           <option value="USAA">USAA</option>
                           <option value="UBS">UBS</option>
                           <option value="M&T Bank">M&T Bank</option>
                           <option value="Ally Financial">Ally Financial</option>
                           <option value="KeyCorp">KeyCorp</option>
                           <option value="Huntington Bancshares">Huntington Bancshares</option>
                           <option value="Barclays">Barclays</option>
                           <option value="Santander Bank">Santander Bank</option>
                           <option value="RBC Bank">RBC Bank</option>
                           <option value="Ameriprise">Ameriprise</option>
                           <option value="Regions Financial Corporation">Regions Financial Corporation</option>
                           <option value="Northern Trust">Northern Trust</option>
                           <option value="BNP Paribas">BNP Paribas</option>
                           <option value="Discover Financial">Discover Financial</option>
                           <option value="First Citizens BancShares">First Citizens BancShares</option>
                           <option value="Synchrony Financial">Synchrony Financial</option>
                           <option value="Deutsche Bank">Deutsche Bank</option>
                           <option value="New York Community Bank">New York Community Bank</option>
                           <option value="Comerica">Comerica</option>
                           <option value="First Horizon National Corporation">First Horizon National Corporation</option>
                           <option value="Raymond James Financial">Raymond James Financial</option>
                           <option value="Webster Bank">Webster Bank</option>
                           <option value="Western Alliance Bank">Western Alliance Bank</option>
                           <option value="Popular, Inc.">Popular, Inc.</option>
                           <option value="CIBC Bank USA">CIBC Bank USA</option>
                           <option value="East West Bank">East West Bank</option>
                           <option value="Synovus">Synovus</option>
                           <option value="Valley National Bank">Valley National Bank</option>
                           <option value="Credit Suisse ">Credit Suisse </option>
                           <option value="Mizuho Financial Group">Mizuho Financial Group</option>
                           <option value="Wintrust Financial">Wintrust Financial</option>
                           <option value="Cullen/Frost Bankers, Inc.">Cullen/Frost Bankers, Inc.</option>
                           <option value="John Deere Capital Corporation">John Deere Capital Corporation</option>
                           <option value="MUFG Union Bank">MUFG Union Bank</option>
                           <option value="BOK Financial Corporation">BOK Financial Corporation</option>
                           <option value="Old National Bank">Old National Bank</option>
                           <option value="South State Bank">South State Bank</option>
                           <option value="FNB Corporation">FNB Corporation</option>
                           <option value="Pinnacle Financial Partners">Pinnacle Financial Partners</option>
                           <option value="PacWest Bancorp">PacWest Bancorp</option>
                           <option value="TIAA">TIAA</option>
                           <option value="Associated Banc-Corp">Associated Banc-Corp</option>
                           <option value="UMB Financial Corporation">UMB Financial Corporation</option>
                           <option value="Prosperity Bancshares">Prosperity Bancshares</option>
                           <option value="Stifel">Stifel</option>
                           <option value="BankUnited">BankUnited</option>
                           <option value="Hancock Whitney">Hancock Whitney</option>
                           <option value="MidFirst Bank">MidFirst Bank</option>
                           <option value="Sumitomo Mitsui Banking Corporation">Sumitomo Mitsui Banking Corporation</option>
                           <option value="Beal Bank">Beal Bank</option>
                           <option value="First Interstate BancSystem">First Interstate BancSystem</option>
                           <option value="Commerce Bancshares">Commerce Bancshares</option>
                           <option value="Umpqua Holdings Corporation">Umpqua Holdings Corporation</option>
                           <option value="United Bank (West Virginia)">United Bank (West Virginia)</option>
                           <option value="Texas Capital Bank">Texas Capital Bank</option>
                           <option value="First National of Nebraska">First National of Nebraska</option>
                           <option value="FirstBank Holding Co">FirstBank Holding Co</option>
                           <option value="Simmons Bank">Simmons Bank</option>
                           <option value="Fulton Financial Corporation">Fulton Financial Corporation</option>
                           <option value="Glacier Bancorp">Glacier Bancorp</option>
                           <option value="Arvest Bank">Arvest Bank</option>
                           <option value="BCI Financial Group">BCI Financial Group</option>
                           <option value="Ameris Bancorp">Ameris Bancorp</option>
                           <option value="First Hawaiian Bank">First Hawaiian Bank</option>
                           <option value="United Community Bank">United Community Bank</option>
                           <option value="Bank of Hawaii">Bank of Hawaii</option>
                           <option value="Home BancShares">Home BancShares</option>
                           <option value="Eastern Bank">Eastern Bank</option>
                           <option value="Cathay Bank">Cathay Bank</option>
                           <option value="Pacific Premier Bancorp">Pacific Premier Bancorp</option>
                           <option value="Washington Federal">Washington Federal</option>
                           <option value="Customers Bancorp">Customers Bancorp</option>
                           <option value="Atlantic Union Bank">Atlantic Union Bank</option>
                           <option value="Columbia Bank">Columbia Bank</option>
                           <option value="Heartland Financial USA">Heartland Financial USA</option>
                           <option value="WSFS Bank">WSFS Bank</option>
                           <option value="Central Bancompany">Central Bancompany</option>
                           <option value="Independent Bank">Independent Bank</option>
                           <option value="Hope Bancorp">Hope Bancorp</option>
                           <option value="SoFi">SoFi</option>
                           <?php foreach($bank_list as $b){ ?>
                           <option value="<?=$b['bank_name']; ?>"><?=$b['bank_name']; ?></option>
                           <?php } ?>
                        </select>
                     </div>
                  </div>
                  <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                  <input class=" form-control" type="hidden"  readonly name="customer_name_modal" id="customer_name_modal" required   />    
                  <div class="form-group row">
                     <label for="billing_address" style="text-align:end;" class="col-sm-3 col-form-label"><?php  echo display('Amount to be paid'); ?> : </label>
                     <div class="col-sm-5">
                        <table border="0">
                           <tr>
                              <td class="cus" name="cus"> <?php echo $curn_info_default; ?> </td>
                              <td><input  type="text"  readonly name="amount_to_pays" id="amount_to_pays"   style="width:130%;" class="form-control" required   /></td>
                           </tr>
                        </table>
                     </div>
                  </div>
                  <div class="form-group row" style="display:none;">
                     <label for="billing_address" style="text-align:end;" class="col-sm-3 col-form-label"><?php  echo display('Amount Received'); ?>:</label>
                     <div class="col-sm-5">
                        <table border="0">
                           <tr>
                              <td class="cus" name="cus"> <?php echo $curn_info_default; ?> </td>
                              <td><input  type="text"  readonly name="amount_received" style="width:130%;"  id="amount_received" class="form-control"required   /></td>
                           </tr>
                        </table>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="billing_address" style="text-align:end;"    class="col-sm-3 col-form-label"><?php  echo display('balance_ammount'); ?>: </label>
                     <div class="col-sm-5">
                        <table border="0">
                           <tr>
                              <td class="cus" name="cus"><?php echo $curn_info_default; ?> </td>
                              <td><input  type="text"   readonly name="balance_modals"  style="width:130%;" id="balance_modals" class="form-control" required  /></td>
                           </tr>
                        </table>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="billing_address" style="text-align:end;" class="col-sm-3 col-form-label"><?php echo display('payment_amount');  ?>:<i class="text-danger">*</i></label>
                     <div class="col-sm-5">
                        <table border="0">
                           <tr>
                              <td class="cus" name="cus"> <?php echo $curn_info_default; ?> </td>
                              <td><input  type="text"   name="payment_from_modals" id="payment_from_modals"  style="width:130%;" class="form-control"required   /></td>
                           </tr>
                        </table>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="billing_address" style="text-align:end;" class="col-sm-3 col-form-label"><?php  echo display('Additional Information');  ?> : </label>
                     <div class="col-sm-5">
                        <input class=" form-control" type="text"  name="details" id="details"/>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="billing_address" style="text-align:end;" class="col-sm-3 col-form-label"><?php  echo display('Attachments');  ?> : </label>
                     <div class="col-sm-5">
                        <input class=" form-control" type="file"  name="attachement" id="attachement" />
                     </div>
                  </div>
               </div>
         </div>
         <div class="modal-footer">
         <div class="col-sm-8"></div>
         <div class="col-sm-4">
         <a href="#" class="btn btnclr" data-dismiss="modal"    ><?php  echo display('Close');  ?></a>
         <input class="btn btnclr" type="submit"     name="submit_pay" id="submit_pay"   value="<?php  echo display('submit');  ?>"  required   />
         </div>
         </div>
      </div>
      </form>
   </div>
</div>
<div class="modal fade" id="add_bank_info">
   <div class="modal-dialog">
      <div class="modal-content" style="text-align:center;">
         <div class="modal-header btnclr"  >
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title"><?php echo display('add_new_bank');  ?></h4>
         </div>
         <div class="container"></div>
         <div class="modal-body">
            <div id="customeMessage" class="alert hide"></div>
            <form id="add_bank"  method="post">
               <div class="panel-body">
                  <input type ="hidden" name="csrf_test_name" id="" value="<?php echo $this->security->get_csrf_hash();?>">
                  <div class="form-group row">
                     <label for="bank_name" class="col-sm-4 col-form-label"><?php echo display('bank_name') ?> <i class="text-danger">*</i></label>
                     <div class="col-sm-6">
                        <input type="text" class="form-control" name="bank_name" id="bank_name" required="" placeholder="<?php echo display('bank_name') ?>" tabindex="1"/>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="ac_name" class="col-sm-4 col-form-label"><?php echo display('ac_name') ?> <i class="text-danger">*</i></label>
                     <div class="col-sm-6">
                        <input type="text" class="form-control" name="ac_name" id="ac_name" required="" placeholder="<?php echo display('ac_name') ?>" tabindex="2"/>
                     </div>
                  </div>
                  <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                  <div class="form-group row">
                     <label for="ac_no" class="col-sm-4 col-form-label"><?php echo display('ac_no') ?> <i class="text-danger">*</i></label>
                     <div class="col-sm-6">
                        <input type="text" class="form-control" name="ac_no" id="ac_no" required="" placeholder="<?php echo display('ac_no') ?>" tabindex="3"/>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="branch" class="col-sm-4 col-form-label"><?php echo display('branch') ?> <i class="text-danger">*</i></label>
                     <div class="col-sm-6">
                        <input type="text" class="form-control" name="branch" id="branch" required="" placeholder="<?php echo display('branch') ?>" tabindex="4"/>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="shipping_line" class="col-sm-4 col-form-label"><?php echo display('country');  ?>
                     <i class="text-danger"></i>
                     </label>
                     <div class="col-sm-6">
                        <select class="selectpicker countrypicker form-control"  data-live-search="true" data-default="United States"  name="country" id="country" style="width:100%"></select>
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="previous_balance" class="col-sm-4 col-form-label"><?php echo display('currency'); ?></label>
                     <div class="col-sm-6">
                        <select  class="form-control" id="currency" name="currency1"  style="width: 100%;" required=""  style="max-width: -webkit-fill-available;">
                           <option value="AFN">AFN - Afghan Afghani</option>
                           <option value="ALL">ALL - Albanian Lek</option>
                           <option value="DZD">DZD - Algerian Dinar</option>
                           <option value="AOA">AOA - Angolan Kwanza</option>
                           <option value="ARS">ARS - Argentine Peso</option>
                           <option value="AMD">AMD - Armenian Dram</option>
                           <option value="AWG">AWG - Aruban Florin</option>
                           <option value="AUD">AUD - Australian Dollar</option>
                           <option value="AZN">AZN - Azerbaijani Manat</option>
                           <option value="BSD">BSD - Bahamian Dollar</option>
                           <option value="BHD">BHD - Bahraini Dinar</option>
                           <option value="BDT">BDT - Bangladeshi Taka</option>
                           <option value="BBD">BBD - Barbadian Dollar</option>
                           <option value="BYR">BYR - Belarusian Ruble</option>
                           <option value="BEF">BEF - Belgian Franc</option>
                           <option value="BZD">BZD - Belize Dollar</option>
                           <option value="BMD">BMD - Bermudan Dollar</option>
                           <option value="BTN">BTN - Bhutanese Ngultrum</option>
                           <option value="BTC">BTC - Bitcoin</option>
                           <option value="BOB">BOB - Bolivian Boliviano</option>
                           <option value="BAM">BAM - Bosnia-Herzegovina Convertible Mark</option>
                           <option value="BWP">BWP - Botswanan Pula</option>
                           <option value="BRL">BRL - Brazilian Real</option>
                           <option value="GBP">GBP - British Pound Sterling</option>
                           <option value="BND">BND - Brunei Dollar</option>
                           <option value="BGN">BGN - Bulgarian Lev</option>
                           <option value="BIF">BIF - Burundian Franc</option>
                           <option value="KHR">KHR - Cambodian Riel</option>
                           <option value="CAD">CAD - Canadian Dollar</option>
                           <option value="CVE">CVE - Cape Verdean Escudo</option>
                           <option value="KYD">KYD - Cayman Islands Dollar</option>
                           <option value="XOF">XOF - CFA Franc BCEAO</option>
                           <option value="XAF">XAF - CFA Franc BEAC</option>
                           <option value="XPF">XPF - CFP Franc</option>
                           <option value="CLP">CLP - Chilean Peso</option>
                           <option value="CNY">CNY - Chinese Yuan</option>
                           <option value="COP">COP - Colombian Peso</option>
                           <option value="KMF">KMF - Comorian Franc</option>
                           <option value="CDF">CDF - Congolese Franc</option>
                           <option value="CRC">CRC - Costa Rican ColÃ³n</option>
                           <option value="HRK">HRK - Croatian Kuna</option>
                           <option value="CUC">CUC - Cuban Convertible Peso</option>
                           <option value="CZK">CZK - Czech Republic Koruna</option>
                           <option value="DKK">DKK - Danish Krone</option>
                           <option value="DJF">DJF - Djiboutian Franc</option>
                           <option value="DOP">DOP - Dominican Peso</option>
                           <option value="XCD">XCD - East Caribbean Dollar</option>
                           <option value="EGP">EGP - Egyptian Pound</option>
                           <option value="ERN">ERN - Eritrean Nakfa</option>
                           <option value="EEK">EEK - Estonian Kroon</option>
                           <option value="ETB">ETB - Ethiopian Birr</option>
                           <option value="EUR">EUR - Euro</option>
                           <option value="FKP">FKP - Falkland Islands Pound</option>
                           <option value="FJD">FJD - Fijian Dollar</option>
                           <option value="GMD">GMD - Gambian Dalasi</option>
                           <option value="GEL">GEL - Georgian Lari</option>
                           <option value="DEM">DEM - German Mark</option>
                           <option value="GHS">GHS - Ghanaian Cedi</option>
                           <option value="GIP">GIP - Gibraltar Pound</option>
                           <option value="GRD">GRD - Greek Drachma</option>
                           <option value="GTQ">GTQ - Guatemalan Quetzal</option>
                           <option value="GNF">GNF - Guinean Franc</option>
                           <option value="GYD">GYD - Guyanaese Dollar</option>
                           <option value="HTG">HTG - Haitian Gourde</option>
                           <option value="HNL">HNL - Honduran Lempira</option>
                           <option value="HKD">HKD - Hong Kong Dollar</option>
                           <option value="HUF">HUF - Hungarian Forint</option>
                           <option value="ISK">ISK - Icelandic KrÃ³na</option>
                           <option value="INR">INR - Indian Rupee</option>
                           <option value="IDR">IDR - Indonesian Rupiah</option>
                           <option value="IRR">IRR - Iranian Rial</option>
                           <option value="IQD">IQD - Iraqi Dinar</option>
                           <option value="ILS">ILS - Israeli New Sheqel</option>
                           <option value="ITL">ITL - Italian Lira</option>
                           <option value="JMD">JMD - Jamaican Dollar</option>
                           <option value="JPY">JPY - Japanese Yen</option>
                           <option value="JOD">JOD - Jordanian Dinar</option>
                           <option value="KZT">KZT - Kazakhstani Tenge</option>
                           <option value="KES">KES - Kenyan Shilling</option>
                           <option value="KWD">KWD - Kuwaiti Dinar</option>
                           <option value="KGS">KGS - Kyrgystani Som</option>
                           <option value="LAK">LAK - Laotian Kip</option>
                           <option value="LVL">LVL - Latvian Lats</option>
                           <option value="LBP">LBP - Lebanese Pound</option>
                           <option value="LSL">LSL - Lesotho Loti</option>
                           <option value="LRD">LRD - Liberian Dollar</option>
                           <option value="LYD">LYD - Libyan Dinar</option>
                           <option value="LTL">LTL - Lithuanian Litas</option>
                           <option value="MOP">MOP - Macanese Pataca</option>
                           <option value="MKD">MKD - Macedonian Denar</option>
                           <option value="MGA">MGA - Malagasy Ariary</option>
                           <option value="MWK">MWK - Malawian Kwacha</option>
                           <option value="MYR">MYR - Malaysian Ringgit</option>
                           <option value="MVR">MVR - Maldivian Rufiyaa</option>
                           <option value="MRO">MRO - Mauritanian Ouguiya</option>
                           <option value="MUR">MUR - Mauritian Rupee</option>
                           <option value="MXN">MXN - Mexican Peso</option>
                           <option value="MDL">MDL - Moldovan Leu</option>
                           <option value="MNT">MNT - Mongolian Tugrik</option>
                           <option value="MAD">MAD - Moroccan Dirham</option>
                           <option value="MZM">MZM - Mozambican Metical</option>
                           <option value="MMK">MMK - Myanmar Kyat</option>
                           <option value="NAD">NAD - Namibian Dollar</option>
                           <option value="NPR">NPR - Nepalese Rupee</option>
                           <option value="ANG">ANG - Netherlands Antillean Guilder</option>
                           <option value="TWD">TWD - New Taiwan Dollar</option>
                           <option value="NZD">NZD - New Zealand Dollar</option>
                           <option value="NIO">NIO - Nicaraguan CÃ³rdoba</option>
                           <option value="NGN">NGN - Nigerian Naira</option>
                           <option value="KPW">KPW - North Korean Won</option>
                           <option value="NOK">NOK - Norwegian Krone</option>
                           <option value="OMR">OMR - Omani Rial</option>
                           <option value="PKR">PKR - Pakistani Rupee</option>
                           <option value="PAB">PAB - Panamanian Balboa</option>
                           <option value="PGK">PGK - Papua New Guinean Kina</option>
                           <option value="PYG">PYG - Paraguayan Guarani</option>
                           <option value="PEN">PEN - Peruvian Nuevo Sol</option>
                           <option value="PHP">PHP - Philippine Peso</option>
                           <option value="PLN">PLN - Polish Zloty</option>
                           <option value="QAR">QAR - Qatari Rial</option>
                           <option value="RON">RON - Romanian Leu</option>
                           <option value="RUB">RUB - Russian Ruble</option>
                           <option value="RWF">RWF - Rwandan Franc</option>
                           <option value="SVC">SVC - Salvadoran ColÃ³n</option>
                           <option value="WST">WST - Samoan Tala</option>
                           <option value="SAR">SAR - Saudi Riyal</option>
                           <option value="RSD">RSD - Serbian Dinar</option>
                           <option value="SCR">SCR - Seychellois Rupee</option>
                           <option value="SLL">SLL - Sierra Leonean Leone</option>
                           <option value="SGD">SGD - Singapore Dollar</option>
                           <option value="SKK">SKK - Slovak Koruna</option>
                           <option value="SBD">SBD - Solomon Islands Dollar</option>
                           <option value="SOS">SOS - Somali Shilling</option>
                           <option value="ZAR">ZAR - South African Rand</option>
                           <option value="KRW">KRW - South Korean Won</option>
                           <option value="XDR">XDR - Special Drawing Rights</option>
                           <option value="LKR">LKR - Sri Lankan Rupee</option>
                           <option value="SHP">SHP - St. Helena Pound</option>
                           <option value="SDG">SDG - Sudanese Pound</option>
                           <option value="SRD">SRD - Surinamese Dollar</option>
                           <option value="SZL">SZL - Swazi Lilangeni</option>
                           <option value="SEK">SEK - Swedish Krona</option>
                           <option value="CHF">CHF - Swiss Franc</option>
                           <option value="SYP">SYP - Syrian Pound</option>
                           <option value="STD">STD - São Tomé and Príncipe Dobra</option>
                           <option value="TJS">TJS - Tajikistani Somoni</option>
                           <option value="TZS">TZS - Tanzanian Shilling</option>
                           <option value="THB">THB - Thai Baht</option>
                           <option value="TOP">TOP - Tongan pa'anga</option>
                           <option value="TTD">TTD - Trinidad & Tobago Dollar</option>
                           <option value="TND">TND - Tunisian Dinar</option>
                           <option value="TRY">TRY - Turkish Lira</option>
                           <option value="TMT">TMT - Turkmenistani Manat</option>
                           <option value="UGX">UGX - Ugandan Shilling</option>
                           <option value="UAH">UAH - Ukrainian Hryvnia</option>
                           <option value="AED">AED - United Arab Emirates Dirham</option>
                           <option value="UYU">UYU - Uruguayan Peso</option>
                           <option value="USD" selected="selected">USD - US Dollar</option>
                           <option value="UZS">UZS - Uzbekistan Som</option>
                           <option value="VUV">VUV - Vanuatu Vatu</option>
                           <option value="VEF">VEF - Venezuelan BolÃ­var</option>
                           <option value="VND">VND - Vietnamese Dong</option>
                           <option value="YER">YER - Yemeni Rial</option>
                           <option value="ZMK">ZMK - Zambian Kwacha</option>
                        </select>
                     </div>
                  </div>
               </div>
         </div>
         <div class="modal-footer">
         <div class="row">
         <div class="col-sm-8">
         </div>
         <div class="col-sm-4">
         <a href="#" class="btn btnclr"   data-dismiss="modal"><?php echo display('Close'); ?></a>
         <input type="submit" id="addBank"     class="btn btnclr" name="addBank" value="<?php echo display('save') ?>"/>
         </div>
         </div>  </div>
         </form>
      </div>
   </div>
</div>
<script>
   $(document).ready(function(){
        $('.payment_id').val($('#po_payment_id').val());
        $('#product_tax_taxes').on('change', function (e) {
         // debugger;
   
   
     var total=$('#Total').val();
     var tax= $('#product_tax_taxes').val();
     var percent='';
     var hypen='-';
     // alert($('#Total').val());
   
   if(tax.indexOf(hypen) != -1){
    var field = tax.split('-');
   
    var percent = field[1];
   
   }else if(tax=='Select the Tax'){
   
     percent="0";
   }
   
   else{
   percent=tax;
   }
   
      percent=percent.replace("%","");
     var answer = (percent / 100) * parseFloat(total);
    
     $('#tax_detail').val(answer.toFixed(3) +" ( "+tax+" )");
      var gtotals = parseFloat(total) +parseFloat(answer);
   
     
     //  console.log("gtotal :" + gtotals);
   
   
   
     var final_g= $('#final_gtotal').val();
   
    //  alert($('#final_gtotal').val());
   
     var amt=parseFloat(answer)+parseFloat(total);
     var num = isNaN(parseFloat(amt)) ? 0 : parseFloat(amt)
       $('#gtotals').val(num.toFixed(2)); 
     var custo_amt=$('.custocurrency_rate').val(); 
   
   //  alert($('.custocurrency_rate').val());
   
     console.log("numhere :"+num +"-"+custo_amt);
     var value=num*custo_amt;
     var custo_final = isNaN(parseFloat(value)) ? 0 : parseFloat(value)
    $('#vendor_gtotals').val(custo_final.toFixed(2));  
    calculate();
    });
      });
   
   
     //  tax_details
     $('#serpaypls').on('click', function (e) {
      e.preventDefault();
      debugger;
   $('#amount_to_pays').val($('#vendor_gtotals').val()-$('#amount_paid').val());
       $('#service_payment_modal').modal('show');
     e.preventDefault();
   
   });
   
   
    
   // var bal_amt=custo_final-$('#amount_paid').val();
   // $('#balance').val(bal_amt);
   
   
   
   
   
   
   function payment_info(){
      
   //  debugger;
     
      var data = {
           gtotal:$('#vendor_gtotals').val(),
           customer_name:$('#customer_name').val()
      
        };
        data[csrfName] = csrfHash;
    
        $.ajax({
            type:'POST',
            data: data, 
         dataType:"json",
            url:'<?php echo base_url();?>Cinvoice/get_payment_infos',
            success: function(result, statut) {
               
              $("#amount_paids").val(result[0]['amt_paid'] );
              $("#balances").val(result[0]['balance']);
                console.log(result);
            }
        });
    }
    
   
   
   
    
    $('#payment_from_modals').on('input',function(e){
    
    var payment=parseFloat($('#payment_from_modals').val());
    
   // alert($('#payment_from_modals').val());
   
    var amount_to_pay=parseFloat($('#amount_to_pays').val());
   
   //  debugger;
   
    console.log(payment+"/"+amount_to_pay);
    console.log(parseFloat(amount_to_pay)-parseFloat(payment));
    var value=parseFloat(amount_to_pay)-parseFloat(payment);
    $('#balance_modals').val(value.toFixed(2));
    if (isNaN(value)) {
     $('#balance_modals').val("0");
      }
    });
   
   
   
   
         $('#bank_id').change(function(){
           localStorage.setItem("selected_bank_name",$('#bank_id').val());
    
         });
         $(document).ready(function(){
    
       $('.amt').hide();
    
           });
    
   
   
   
   
   
   
   
           $('#add_payment_infos').submit(function (event) {    
      var dataString = {
          dataString : $("#add_payment_infos").serialize()
     };
     dataString[csrfName] = csrfHash;
    
      $.ajax({
          type:"POST",
          dataType:"json",
          url:"<?php echo base_url(); ?>Cinvoice/add_payment_infos",
          data:$("#add_payment_infos").serialize(),
   
          success:function (data) {
    $('.amt').show();
   
       $('#service_payment_modal').modal('hide');
       $("#bodyModal1").html("<?php echo display('Payment Successfully Completed');?>");
          $('#myModal1').modal('show');
          var b=$('#balance_modals').val();
          var a=$('#payment_from_modals').val();
       $('#balances').val(b);
       $('#amount_paids').val(a);
       window.setTimeout(function(){
           $('#myModal1').modal('hide');
   },2500);
   
   
   
      var dataString = {
          dataString : $("#histroy").serialize()
      
     };
     dataString[csrfName] = csrfHash;
    
      $.ajax({
          type:"POST",
          dataType:"json",
             url:"<?php echo base_url(); ?>Cpurchase/payment_history_purchase",
          data:$("#histroy").serialize(),
   
          success:function (data) {
           console.log(data);
           var gt=$('#vendor_gtotal').val();
           var amtpd=data.amt_paid;
           console.log(data);
           var bal= $('#vendor_gtotal').val() - data.amt_paid;
    $('#balance').val(bal.toFixed(2));
      $('#amount_paid').val(amtpd);
         var t_rate=$('.custocurrency_rate').val();
      document.getElementById("paid_convert").value=
    	(amtpd /t_rate ).toFixed(2);
       document.getElementById("bal_convert").value=
    	(bal /t_rate ).toFixed(2);
   
         }
       });
         $('#add_payment_info')[0].reset();
         }
   
      });
      event.preventDefault();
   });
                  
   
   function paypls(){
       
   $('#amount_to_pay').val($('#vendor_gtotal').val()-$('#amount_paid').val());
       $('#payment_modal').modal('show');
   
   }
   
   
</script>
<script type="text/javascript">
   function configureDropDownLists(ddl1,ddl3) {
   var assets = ['CASH Operating Account', 'CASH Debitors', 'CASH Petty Cash'];
   var receivables = ['A/REC Trade', 'A/REC Trade Notes Receivable', 'A/REC Installment Receivables','A/REC Retainage Withheld','A/REC Allowance for Uncollectible Accounts'];
   var inventories = ['INV – Reserved', 'INV – Work-in-Progress', 'INV – Finished Goods','INV – Reserved','INV – Unbilled Cost & Fees','INV – Reserve for Obsolescence'];
   var prepaid_expense = ['PREPAID – Insurance', 'PREPAID – Real Estate Taxes', 'PREPAID – Repairs & Maintenance','PREPAID – Rent','PREPAID – Deposits'];
   var property_plant = ['PPE – Buildings', 'PPE – Machinery & Equipment', 'PPE – Vehicles','PPE – Computer Equipment','PPE – Furniture & Fixtures','PPE – Leasehold Improvements'];
   var acc_dep = ['ACCUM DEPR Buildings', 'ACCUM DEPR Machinery & Equipment', 'ACCUM DEPR Vehicles','ACCUM DEPR Computer Equipment','ACCUM DEPR Furniture & Fixtures','ACCUM DEPR Leasehold Improvements'];
   var noncurrenctreceivables = ['NCA – Notes Receivable', 'NCA – Installment Receivables', 'NCA – Retainage Withheld'];
   var intercompany_receivables = ['Organization Costs', 'Patents & Licenses', 'Intangible Assets – Capitalized Software Costs'];
   var liabilities = ['A/P Trade', 'A/P Accrued Accounts Payable', 'A/P Retainage Withheld','Current Maturities of Long-Term Debt','Bank Notes Payable','Construction Loans Payable'];
   var accrued_compensation = ['Accrued – Payroll', 'Accrued – Commissions', 'Accrued – FICA','Accrued – Unemployment Taxes','Accrued – Workmen’s Comp'];
   var other_accrued_expenses = ['Accrued – Rent', 'Accrued – Interest', 'Accrued – Property Taxes', 'Accrued – Warranty Expense'];
   var accrued_taxes= ['Accrued – Federal Income Taxes', 'Accrued – State Income Taxes', 'Accrued – Franchise Taxes','Deferred – FIT Current','Deferred – State Income Taxes'];
   var deferred_taxes= ['D/T – FIT – NON CURRENT', 'D/T – SIT – NON CURRENT'];
   var long_term_debt=['LTD – Notes Payable','LTD – Mortgages Payable','LTD – Installment Notes Payable'];
   var intercompany_payables=['Common Stock','Preferred Stock','Paid in Capital','Partners Capital','Member Contributions','Retained Earnings'];
   var revenue=['REVENUE – PRODUCT 1','REVENUE – PRODUCT 2','REVENUE – PRODUCT 3','REVENUE – PRODUCT 4','Interest Income','Other Income','Finance Charge Income','Sales Returns and Allowances','Sales Discounts'];
   var cost_goods= ['COGS – PRODUCT 1', 'COGS – PRODUCT 2','COGS – PRODUCT 3','COGS – PRODUCT 4','Freight','Inventory Adjustments','Purchase Returns and Allowances','Reserved'];
   var operating_expenses=['Advertising Expense','Amortization Expense','Auto Expense','Bad Debt Expense','Bad Debt Expense','Bank Charges','Cash Over and Short','Commission Expense','Depreciation Expense','Employee Benefit Program','Freight Expense','Gifts Expense','Insurance – General','Interest Expense','Professional Fees','License Expense','Maintenance Expense','Meals and Entertainment','Office Expense','Payroll Taxes','Printing','Postage','Rent','Repairs Expense','Salaries Expense','Supplies Expense','Taxes – FIT Expense','Utilities Expense','Gain/Loss on Sale of Assets'];
   switch (ddl1.value) {
   case 'ASSETS':
   ddl3.options.length = 0;
   for (i = 0; i < assets.length; i++) {
   createOption(ddl3, assets[i], assets[i]);
   }
   break;
   case 'RECEIVABLES':
   ddl3.options.length = 0;
   for (i = 0; i < receivables.length; i++) {
   createOption(ddl3, receivables[i], receivables[i]);
   }
   break;
   case 'INVENTORIES':
   ddl3.options.length = 0;
   for (i = 0; i < inventories.length; i++) {
   createOption(ddl3, inventories[i], inventories[i]);
   }
   break;
   case 'PREPAID EXPENSES & OTHER CURRENT ASSETS':
   ddl3.options.length = 0;
   for (i = 0; i < prepaid_expense.length; i++) {
   createOption(ddl3, prepaid_expense[i], prepaid_expense[i]);
   }
   break;
   case 'PROPERTY PLANT & EQUIPMENT':
   ddl3.options.length = 0;
   for (i = 0; i < property_plant.length; i++) {
   createOption(ddl3, property_plant[i], property_plant[i]);
   }
   break;
   case 'ACCUMULATED DEPRECIATION & AMORTIZATION':
   ddl3.options.length = 0;
   for (i = 0; i < acc_dep.length; i++) {
   createOption(ddl3, acc_dep[i], acc_dep[i]);
   }
   break;
   case 'NON – CURRENT RECEIVABLES':
   ddl3.options.length = 0;
   for (i = 0; i < noncurrenctreceivables.length; i++) {
   createOption(ddl3, noncurrenctreceivables[i], noncurrenctreceivables[i]);
   }
   break;
   case 'INTERCOMPANY RECEIVABLES & OTHER NON-CURRENT ASSETS':
   ddl3.options.length = 0;
   for (i = 0; i < intercompany_receivables.length; i++) {
   createOption(ddl3, intercompany_receivables[i], intercompany_receivables[i]);
   }
   break;
   case 'LIABILITIES & PAYABLES':
   ddl3.options.length = 0;
   for (i = 0; i < liabilities.length; i++) {
   createOption(ddl3, liabilities[i], liabilities[i]);
   }
   break;
   case 'ACCRUED COMPENSATION & RELATED ITEMS':
   ddl3.options.length = 0;
   for (i = 0; i < accrued_compensation.length; i++) {
   createOption(ddl3, accrued_compensation[i], accrued_compensation[i]);
   }
   break;
   case 'OTHER ACCRUED EXPENSES':
   ddl3.options.length = 0;
   for (i = 0; i < other_accrued_expenses.length; i++) {
   createOption(ddl3, other_accrued_expenses[i], other_accrued_expenses[i]);
   }
   break;
   case 'ACCRUED TAXES':
   ddl3.options.length = 0;
   for (i = 0; i < accrued_taxes.length; i++) {
   createOption(ddl3, accrued_taxes[i], accrued_taxes[i]);
   }
   break;
   case 'DEFERRED TAXES':
   ddl3.options.length = 0;
   for (i = 0; i < deferred_taxes.length; i++) {
   createOption(ddl3, deferred_taxes[i], deferred_taxes[i]);
   }
   break;
   case 'LONG-TERM DEBT':
   ddl3.options.length = 0;
   for (i = 0; i < long_term_debt.length; i++) {
   createOption(ddl3, long_term_debt[i], long_term_debt[i]);
   }
   break;
   case 'INTERCOMPANY PAYABLES & OTHER NON CURRENT LIABILITIES & OWNERS EQUITIES':
   ddl3.options.length = 0;
   for (i = 0; i < intercompany_payables.length; i++) {
   createOption(ddl3, intercompany_payables[i], intercompany_payables[i]);
   }
   break;
   case 'REVENUE':
   ddl3.options.length = 0;
   for (i = 0; i < revenue.length; i++) {
   createOption(ddl3, revenue[i], revenue[i]);
   }
   break;
   case 'COST OF GOODS SOLD':
   ddl3.options.length = 0;
   for (i = 0; i < cost_goods.length; i++) {
   createOption(ddl3, cost_goods[i], cost_goods[i]);
   }
   break;
   case 'OPERATING EXPENSES':
   ddl3.options.length = 0;
   for (i = 0; i < operating_expenses.length; i++) {
   createOption(ddl3, operating_expenses[i], operating_expenses[i]);
   }
   break;
   default:
   ddl3.options.length = 0;
   break;
   }
   }
   function createOption(ddl, text, value) {
   var opt = document.createElement('option');
   opt.value = value;
   opt.text = text;
   ddl.options.add(opt);
   }
   

   // Change Dropdown
   $(document).ready(function(){
   $('.getvaluedata').change(function() {
    var selectedValue = $(this).val();
    if(selectedValue == 'serviceProvider'){
      $('#addserviceprovider').show();
      $('#addexpenses').hide();
    }else{
      $('#addexpenses').show();
      $('#addserviceprovider').hide();
    }
   });
});

   $(document).ready(function() {
       $('#form_image').change(function() {
        // Submit the form when a file is selected
        $('#ocr').submit();
    });
    $('#ocr').submit(function(e) {
        e.preventDefault(); // Prevent the default form submission

        // Create FormData object
        var formData = new FormData(this);
        $('.loading-text').show();
        $.ajax({
            url: "<?php echo base_url(); ?>Cpurchase/process_form",
            type: 'POST',
            data: formData,
            contentType: false, 
            processData: false, 
            success: function(response) {
               // console.log(response, "response");
               $('.loading-text').hide();
               response = response.replace(/\\\//g, '/');
               response = response.replace(/\\n/g, '');
               response = response.replace(/\\u2018/g, '');
              var data = JSON.parse(response);
              console.log(data, "data");
              var formattedDateString = data.bill_date.replace(/\//g, "-").replace(/\s+/g, "");
              var parts = formattedDateString.split("-");
               var day = parts[2];
               var month = parts[1];
               var year = parts[0];

               if (month.length === 1) {
                   month = "0" + month;
               }
               if (day.length === 1) {
                   day = "0" + day;
               }
               var formattedDate = day + "-" + month + "-" + year;
               var str = data.vendor_name.trim();
               var company_name = str.substring(str.indexOf("Graniti Tecnica"), str.indexOf("NATURAL STONETRADERS"));
               var vendorAddress = data.vendor_address +" "+ data.vendor_address1 +" "+ data.vendor_address2;
               var product_names = data.product_name
               var product_thickness = data.Thickness
               var product_descriptions = data.finish;
               var cosrpersqft = data.product_prices;
               var containernumber = data.container_no;

              var formattedDateStringETA = data.ETA_date.replace(/\//g, "-").replace(/\s+/g, "");
              var parts = formattedDateStringETA.split("-");
               var day = parts[2];
               var month = parts[1];
               var year = parts[0];

               if (month.length === 1) {
                   month = "0" + month;
               }
               if (day.length === 1) {
                   day = "0" + day;
               }
               var formattedDateETA = day + "-" + month + "-" + year;

               var formattedDateStringETD = data.ETD_date.replace(/\//g, "-").replace(/\s+/g, "");
               var parts = formattedDateStringETD.split("-");
               var day = parts[2];
               var month = parts[1];
               var year = parts[0];

               if (month.length === 1) {
                   month = "0" + month;
               }
               if (day.length === 1) {
                   day = "0" + day;
               }
               var formattedDateETD = day + "-" + month + "-" + year;

               $('#invoice_no').val(data.bill_number.trim());
               $('#date').val(formattedDateString);
               $('.vendorAddress').val(vendorAddress);
               $('.productETA').val(formattedDateStringETA);
               $('.productETD').val(formattedDateStringETD);
               $('.container_no').val(containernumber);
               $('.product_name').each(function(index) {
                   $(this).val(product_names[index]);
               });

               $('.productThickness').each(function(index) {
                   $(this).val(product_thickness[index]);
               });

               $('.productDescription').each(function(index) {
                   $(this).val(product_descriptions[index]);
               });

               $('.costPerSQFT').each(function(index) {
                   $(this).val(cosrpersqft[index]);
               });

            },
            error: function(xhr, status, error) {
                // Handle error
               $('.loading-text').hide();
               console.error("Error parsing JSON:", error);
            }
        });
    });
});


// Service Provider OCR

$(document).ready(function() {
       $('#form_imageservice').change(function() {
        // Submit the form when a file is selected
        $('#ocrserviceprovider').submit();
    });
    $('#ocrserviceprovider').submit(function(e) {
        e.preventDefault(); // Prevent the default form submission

        // Create FormData object
        var formData = new FormData(this);
        $('.loading-text').show();
        $.ajax({
            url: "<?php echo base_url(); ?>Cpurchase/serviceproviderprocess_form",
            type: 'POST',
            data: formData,
            contentType: false, 
            processData: false, 
            success: function(response) {
               console.log(response, "response");
               $('.loading-text').hide();
               response = response.replace(/\\\//g, '/');
               response = response.replace(/\\n/g, '');
               response = response.replace(/\\u2018/g, '');
               var data = JSON.parse(response);
               console.log(data, "data");

               var etaDate = data.billdate;
               var datePattern = /^\d{2}\/\d{2}\/\d{4}$/;

               console.log("etaDate:", etaDate); // Debugging statement

               if (datePattern.test(etaDate)) {
                   var parts = etaDate.split('/');
                   // var formattedETADate = parts[0] + '-' + parts[1] + '-' + parts[2];
                   var formattedETADate = parts[2] + '-' + parts[1] + '-' + parts[0]; 

                   console.log("formattedETADate:", formattedETADate); 

                   $('.servicebill_date').val(formattedETADate);
               } else {
                   console.error("Invalid ETD date format:", etaDate); 
               }

               var phoneNum = data.servicephoneno;
               var cleanedPhoneNum = phoneNum.replace("+1 ", "");

               var product_name = data.productName;
               var product_qty = data.pquantity;
               var product_total = data.amount;

               for (let i = 0; i < product_qty.length; i++) {
                   let trElement = $(`
                       <tr>
                           <td class="span3 supplier">
                              <input type="hidden" name="tableid[]" id="tableid_1">
                              <input list="magicHouses" type="text" required="" tabindex="2" class="acc_name form-control productNAME" name="product_name[]" id="product_name" value="${product_name[i]}">
                                 <datalist id="magicHouses">
                                    <option value="Test Product-Model">  Test Product-Model</option>
                                 </datalist>
                                 <input type="hidden" class="common_product autocomplete_hidden_value  product_id_1" name="product_id[]" id="SchoolHiddenId_1">
                           </td>
                           <td>
                              <input type="text" name="description_service[]" id="description_1" required="" min="0" class="form-control text-right store_cal_1" placeholder="" value="" tabindex="6">
                           </td>
                           <td class="text-right">
                              <input type="text" name="quality[]" id="quality_1" required="" min="0" class="form-control text-right productQTY" value="${product_qty[i]}" tabindex="6">
                           </td>
                           <td>
                              <span class="input-symbol-euro"> <input class="total_price form-control mobile_price productAMOUNT" type="text" style="width: 317px;" value="${product_total[i]}" name="total_price[]" id="total_price_1" placeholder="0.00"></span>
                           </td>
                  
                           <td style="text-align:center;">
                              <button class="delete_provider btn btn-danger" type="button" value="Delete"><i class="fa fa-trash" aria-hidden="true"></i></button>
                           </td>
                       </tr>`
                   );
                   $('#servic_pro').append(trElement);
               }


               $('.Deleteallrowsserviceprovider').remove();

               // $('.productNAME').each(function(index) {
               //     $(this).val(product_name[index]);
               // });

               // $('.productQTY').each(function(index) {
               //     $(this).val(product_qty[index]);
               // });

               // $('.productAMOUNT').each(function(index) {
               //     $(this).val(product_total[index]);
               // });

               $('.phone_num').val(cleanedPhoneNum);
               $('.bill_number').val(data.billnumber);
               // $('.service_provider_name').val(data.servicename);
               $('.sp_address').val(data.serviceaddress);
            },
            error: function(xhr, status, error) {
                // Handle error
               $('.loading-text').hide();
               console.error("Error parsing JSON:", error);
            }
        });
    });
});


</script>

<style>
    @media only screen and (min-width:1024px){
        .mobile_vendor{
            position: relative;
            right: 20px;
        }
        
        .mobile_price{
            width: 75% !important;
        }
    }
   
   .loading-text {
      display: none;
   }

   .loading-text {
      margin-top: 10px;
      width: 30px;
     aspect-ratio: 4;
     background: radial-gradient(circle closest-side,#000 90%,#0000) 0/calc(100%/3) 100% space;
     clip-path: inset(0 100% 0 0);
     animation: l1 1s steps(4) infinite;
   }
  @keyframes l1 {to{clip-path: inset(0 -34% 0 0)}}

   .file-upload {
     position: relative;
     display: inline-block;
     cursor: pointer;
     overflow: hidden;
   }
   .file-upload input[type='file'] {
     position: absolute;
     top: 0;
     right: 0;
     margin: 0;
     padding: 0;
     font-size: 20px;
     cursor: pointer;
     opacity: 0;
   }
   .file-upload span {
     display: inline-block;
     padding: 6px 12px;
     background-color: #424F5C;
     color: #fff; /* Set button text color */
     border-radius: 5px; /* Adjust button border radius as needed */
     transition: background-color 0.3s ease;
     font-size: 14px;
    font-weight: 400;
   }
   .file-upload span:hover {
     background-color: #424F5C;
   }
    
</style>
