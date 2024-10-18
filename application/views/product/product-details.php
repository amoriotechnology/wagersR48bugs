<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
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
<script src="<?php echo base_url() ?>my-assets/js/countrypicker.js" type="text/javascript"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css" type="text/css" />
        <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>

<link href="<?php echo base_url() ?>my-assets/css/dropify.min.css" rel="stylesheet" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>

        
<style>

.btnclr{
       background-color:<?php echo $setting_detail[0]['button_color']; ?>;
       color: white;

   }



    .dropify-clear{
    display:none;
  }
  .btn-success{
    background: transparent;
        color: white;
    border: 1px solid white;
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
#block_container
{height:40px;
    text-align:center;
}
#bloc1, #bloc2
{text-align:center;
    font-weight:bold;
    display:inline;
}

.switch {
  margin-top: 5px;
  position: relative;
  display: inline-block;
  vertical-align: top;
  width: 56px;
  height: 20px;
  padding: 3px;
  background-color: white;
  border-radius: 18px;
  box-shadow: inset 0 -1px white, inset 0 1px 1px rgba(0, 0, 0, 0.05);
  cursor: pointer;
  background-image: -webkit-linear-gradient(top, #eeeeee, white 25px);
  background-image: -moz-linear-gradient(top, #eeeeee, white 25px);
  background-image: -o-linear-gradient(top, #eeeeee, white 25px);
  background-image: linear-gradient(to bottom, #eeeeee, white 25px);
}

.switch-input {
  position: absolute;
  top: 0;
  left: 0;
  opacity: 0;
}

.switch-label {
  position: relative;
  display: block;
  height: inherit;
  font-size: 10px;
  text-transform: uppercase;
  background: #eceeef;
  border-radius: inherit;
  box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.12), inset 0 0 2px rgba(0, 0, 0, 0.15);
  -webkit-transition: 0.15s ease-out;
  -moz-transition: 0.15s ease-out;
  -o-transition: 0.15s ease-out;
  transition: 0.15s ease-out;
  -webkit-transition-property: opacity background;
  -moz-transition-property: opacity background;
  -o-transition-property: opacity background;
  transition-property: opacity background;
}
.switch-label:before, .switch-label:after {
  position: absolute;
  top: 50%;
  margin-top: -.5em;
  line-height: 1;
  -webkit-transition: inherit;
  -moz-transition: inherit;
  -o-transition: inherit;
  transition: inherit;
}
.switch-label:before {
  content: attr(data-off);
  right: 11px;
  color: #aaa;
  text-shadow: 0 1px rgba(255, 255, 255, 0.5);
}
.switch-label:after {
  content: attr(data-on);
  left: 11px;
  color: white;
  text-shadow: 0 1px rgba(0, 0, 0, 0.2);
  opacity: 0;
}
.switch-input:checked ~ .switch-label {
  background: #38469f;
  box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.15), inset 0 0 3px rgba(0, 0, 0, 0.2);
}
.switch-input:checked ~ .switch-label:before {
  opacity: 0;
}
.switch-input:checked ~ .switch-label:after {
  opacity: 1;
}

.switch-handle {
  position: absolute;
  top: 4px;
  left: 4px;
  width: 18px;
  height: 18px;
  background: white;
  border-radius: 10px;
  box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.2);
  background-image: -webkit-linear-gradient(top, white 40%, #f0f0f0);
  background-image: -moz-linear-gradient(top, white 40%, #f0f0f0);
  background-image: -o-linear-gradient(top, white 40%, #f0f0f0);
  background-image: linear-gradient(to bottom, white 40%, #f0f0f0);
  -webkit-transition: left 0.15s ease-out;
  -moz-transition: left 0.15s ease-out;
  -o-transition: left 0.15s ease-out;
  transition: left 0.15s ease-out;
}
.switch-handle:before {
  content: '';
  position: absolute;
  top: 50%;
  left: 50%;
  margin: -6px 0 0 -6px;
  width: 12px;
  height: 12px;
  background: #f9f9f9;
  border-radius: 6px;
  box-shadow: inset 0 1px rgba(0, 0, 0, 0.02);
  background-image: -webkit-linear-gradient(top, #eeeeee, white);
  background-image: -moz-linear-gradient(top, #eeeeee, white);
  background-image: -o-linear-gradient(top, #eeeeee, white);
  background-image: linear-gradient(to bottom, #eeeeee, white);
}
.switch-input:checked ~ .switch-handle {
  left: 40px;
  box-shadow: -1px 1px 5px rgba(0, 0, 0, 0.2);
}

.switch-green > .switch-input:checked ~ .switch-label {
  background: #4fb845;
}
.dropify-wrapper {

border:none;
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
    width: 110px;
  }

}
   
   





  </style>
<!-- <-Product details page start -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
   
        <figure class="one">
               <img src="<?php echo base_url()  ?>asset/images/productdetailsview.png"  class="headshotphoto" style="height:50px;" />
      </div>
      




        <div class="header-title">
        <div class="logo-holder logo-9">
          <h1><?php echo "Product Details" ; ?></h1>
       </div>        
           <small></small>
            <ol class="breadcrumb"   style=" border: 3px solid #d7d4d6;"   >
         <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('report') ?></a></li>
                <li class="active" style="color:orange"><?php echo "Product Details" ; ?></li>
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
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                      <div id="block_container">
                                <div id="bloc1" style="float:left;">
                          <h4><?php //echo display("Product Information") ?></h4>
                               </div> 
                             <div id="bloc2" style="float:right;">
                                                                <a style="color:white;" href="<?php echo base_url('Cproduct/manage_product') ?>" class="btnclr btn  m-b-5 m-r-2"><i class="ti-align-justify"> </i> <?php echo ('Manage Product') ?> </a>

                                 
                             <a href="#"   style="float:right;color:white;"  class="btnclr client-add-btn btn"   data-toggle="modal"  data-target="#product_hty"><?php echo  display('Product History')?></a>
                            </div>    </div>
 
    
                           

                        </div>
                        </div>






                    <div class="panel-body">
                     <div class="row">
                         
                         <div class="col-sm-4">
                          <table class="table table-bordered">
                                     <tr  class="btnclr" >
                                     <th colspan="2" style="text-align:center;"><?php echo display('product_details') ?></th>
                                     </tr>

                              
                                <tr><td style="text-align:center"><?php echo display('product_name') ?></td><td style="text-align:center"><?php echo $product_info[0]['product_name']; ?></td></tr> 
                                <tr><td style="text-align:center"><?php echo display('product_model') ?></td><td style="text-align:center"><?php echo $product_info[0]['product_model']; ?></td></tr>
                             
                               <tr><td style="text-align:center"><?php echo display('price') ?></td><td style="text-align:center"><?php echo $product_info[0]['price']; ?></td></tr>
                               <tr><td style="text-align:center"><?php echo display('product_id') ?></td><td style="text-align:center"><?php echo $product_info[0]['product_id']; ?></td></tr>

                              
                             </table>
                           <table class="table table-bordered">
                           <tr  class="btnclr" >
                                     <th colspan="2" style="text-align:center;"><?php echo display('Vendor Details') ?></th>
                                     </tr>

                              
                                <tr><td style="text-align:center"><?php echo display('Vendor')?></td><td style="text-align:center"><?php echo $supplier_name1;  ?></td></tr> 
                              
                              
                              </table>
                         </div>
                         <div class="col-sm-4">
 <table class="table table-bordered">
 <tr  class="btnclr" >
                                     <th colspan="2" style="text-align:center;"><?php echo display('Origin')?> :
                        
                                    </tr>  
 <input type="hidden" value="<?php echo $product_info[0]['country']; ?>"  id="country_flag"/>
       
                             </table>
     <table class="table table-bordered">
     <tr  class="btnclr" >


                            
                             <img  id="flag" alt="<?php echo $product_info[0]['country']; ?>" width="500" height="200" style="alignment:centre"> 
                             
                            
                            </tr>     </table>

      </div>
                        
                         


       <div class="col-sm-4">
                             <table class="table table-bordered" style="text-align: right;">
                             <tr  class="btnclr" >
                                     <th colspan="2" style="text-align:center;"><?php  echo  display('Inventory Balance')?></th>

                                 </tr>
                                <tr><td style="text-align:center"><?php  echo  display('In Stock')?></td><td style="text-align:center"><?php echo $product_info[0]['p_quantity']; ?></td></tr> 
                                <tr><td style="text-align:center"><?php  echo  display('Available')?></td><td style="text-align:center">   <?php  
     $sale_sum=false;
     $s=0;
     $e=0;
     $ex_sum=false;
     $total=0;
      if(!empty($sale_count)){
   foreach($sale_count as $sale)
                           {
     if($product_info[0]['product_id']==$sale['product_id'])
     { 
         $avail=$product_info[0]['p_quantity']-$sale['available'];
         $total +=$avail;
       // echo $avail;
       $s=$avail;
        $sale_sum=true;
     }
    }
  } if(!empty($expense_count)){
      foreach($expense_count as $expense)
                           {
     if($product_info[0]['product_id']==$expense['product_id'])
     { 
         $avail=$product_info[0]['p_quantity']+$expense['available'];
           $total +=$avail;
              $ex_sum=true;
                 $e=$expense['available'];
    }
    }
  }
  if(!empty($expense_count) && !empty($sale_count)){
    if($ex_sum==true && $sale_sum==true){
$total =$s+$e;
    }
  }
  if($total==0){
    $total=$product_info[0]['p_quantity'];
      echo $total;
  }else{
  echo $total;
  }
  ?></td></tr>

<tr  class="btnclr" >
</table>
    <table class="table table-bordered" style="text-align: right;">
  <tr>
                                     <th colspan="2" class="btnclr"  style="text-align:center;"><?php  echo  display('Additional Information')?></th>

                                 </tr>
                                <tr><td style="text-align:center"><?php  echo  display('category')?></td><td style="text-align:center"><?php echo $product_info[0]['category_id']; ?></td></tr> 
                             <tr><td style="text-align:center"><?php  echo  display('Product Sub Category')?></td><td style="text-align:center"><?php echo $product_info[0]['product_sub_category']; ?></td></tr> 
                                <tr><td style="text-align:center"><?php  echo  display('Units')?></td><td style="text-align:center"><?php echo $product_info[0]['unit']; ?></td></tr> 
                             </table>
                         </div>
                           </div>




                           <div class="panel-body">
                     <div class="row">
                        
                         <div class="col-sm-12" style="text-align: center;">
                        
    </div>

  <?php   $i=1;
   if(isset($all_product_detail[0]['bundle_no'])) {   

  ?>
                     <div class="row">
                        <div class="col-sm-12">
                             
 

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      
      <!-- <p>Sales Invoice</p> -->
     <form id="product_details_edit"  method="post">
          <div class="table-responsive product-supplier">
                            <table class="table table-bordered table-hover"  id="product_table">
                            <thead>
                            <tr  class="btnclr" >
                                            <th rowspan="2"class="text-center"><i class="fa fa-shopping-cart" aria-hidden="true" data-toggle="tooltip" title="Add to cart"></i></th>
                                            <th rowspan="2" style="width: max-content;" class="text-center"><?php echo  display('description'); ?></th>
                                            <th rowspan="2"  class="text-center"><?php echo display('Thick ness');?><i class="text-danger">*</i></th>
                                            <th rowspan="2" style="width: 70px;" class="text-center"><?php echo display('Supplier Block No');?><i class="text-danger">*</i></th>

                                            <th rowspan="2" style="width:100px;" class="text-center" ><?php echo display('Supplier Slab No');?><i class="text-danger">*</i> </th>
                                            <th colspan="2"   style="width:150px;" class="text-center"><?php echo display('Gross Measurement');?><i class="text-danger">*</i> </th>
                                            <th rowspan="2" class="text-center"><?php echo display('Gross Sq.Ft');?></th>
                                            <th rowspan="2" style="width: min-content;" class="text-center">Bundle No<i class="text-danger">*</i></th>
                                            <th rowspan="2" style="width: min-content;" class="text-center">Slab No<i class="text-danger">*</i></th>
                                            <th colspan="2"  style="width:150px;" class="text-center"><?php echo display('Net Measure');?><i class="text-danger">*</i></th>
                                            <th rowspan="2" class="text-center"><?php echo display('Net Sq.Ft');?></th>
                                            <th rowspan="2" style="width: 70px;" class="text-center"><?php echo display('Cost per Sq.Ft');?></th>
                                            <th rowspan="2" style="width: 70px;" class="text-center"><?php echo display('Cost per Slab');?></th>
                                            <th rowspan="2" style="width: 70px;" class="text-center"><?php echo display('sales'); ?><br/><?php echo display('Price per Sq.Ft');?></th>
                                            <th rowspan="2"  style="width: 70px;" class="text-center"><?php echo display('Sales Slab Price');?></th>
                                            <th rowspan="2" class="text-center"><?php echo display('Weight');?></th>
                                            <th rowspan="2" class="text-center"><?php echo display('Origin');?></th>
                                           
                                            <th rowspan="2" class="text-center"><?php echo display('image');?></th>
                                            <th rowspan="2" class="text-center"><?php echo display('note');?></th>
                                            <th rowspan="2" class="text-center"><?php echo display('Block');?></th>
                                            <th rowspan="2" style="width: 100px" class="text-center"><?php  echo  display('total'); ?></th>

                                        </tr>
                                         <tr>
                                              <th class="text-center btnclr"  ><?php echo display('Width');?></th>
                                              <th class="text-center btnclr"  ><?php echo display('Height');?></th>  
                                              <th class="text-center btnclr"   ><?php echo display('Width');?></th>
                                              <th class="text-center btnclr"  ><?php echo display('Height');?></th>  
                                        </tr>
                                  

                                </thead>
                                <tbody id="addPurchaseItem">

                            <?php   $i=1;
                            foreach($all_product_detail as $apd) {   
                           
                            ?>
                            

                                    <tr>
                                         <td><a href="" data-product_id="<?php echo $product_info[0]['product_id'];?>" data-description="<?php echo $apd['description_table']; ?>" data-thickness="<?php  echo $apd['thickness']; ?>" data-supplier_block_no = "<?php echo $apd['supplier_block_no']; ?>" data-supplier_slab_no="<?php echo $apd['supplier_slab_no']; ?>" data-g_width="<?php echo $apd['g_width']; ?>" data-g_height="<?php echo $apd['g_height']; ?>" data-gross_sq_ft="<?php echo $apd['gross_sqft']; ?>" data-bundle_no="<?php echo $apd['bundle_no']; ?>" data-slab_no="slab_no" data-n_width="<?php echo $apd['n_width']; ?>" data-n_height="<?php echo $apd['n_height']; ?>" data-net_sq_ft="<?php echo $apd['net_sqft']; ?>" data-cost_sq_ft="<?php echo $apd['cost_sqft']; ?>" data-cost_sq_slab="<?php echo $apd['cost_slab']; ?>" data-sales_amt_sq_ft="<?php echo $apd['sales_price_sqft']; ?>" data-sales_slab_amt="<?php echo $apd['sales_slab_price']; ?>" data-weight="<?php echo $apd['weight']; ?>" data-origin="<?php echo $apd['origin']; ?>" data-total_amt="<?php echo $apd['total_amt']; ?>" class="add-to-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i></a></td>
                                        <td>
                                         
                                           <input type="hidden" name="product_id[]" data-product_id="<?php echo $product_info[0]['product_id'];?>" value="<?php echo $product_info[0]['product_id'];?>" />
                                          <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
   <input type="hidden" id="id_<?php echo $i; ?>" name="id[]"   readonly  class="form-control" value="<?php  echo  $apd['id'] ;  ?>" />
                                                <input type="text" id="description_<?php echo $i; ?>" name="description[]"   readonly  class="form-control" value="<?php  echo  $apd['description_table'] ;  ?>" />
                                            </td>
                                        
                                            <td >
                                                <input type="text" name="thickness[]" id="thickness_<?php echo $i; ?>" required=""    readonly     class="form-control"  value="<?php  echo $apd['thickness'] ;  ?>"        />
                                            </td>
                                            <td>
                                                <input type="text" id="supplier_b_no_<?php echo $i; ?>" id="supplier_b_no_<?php echo $i; ?>" name="supplier_block_no[]"  readonly   required="" class="form-control" value="<?php echo $apd['supplier_block_no']; ?>" />
                                            </td>
                                        
                                            <td >
                                                <input type="text"  id="supplier_s_no_<?php echo $i; ?>" id="supplier_s_no_<?php echo $i; ?>" name="supplier_slab_no[]"  readonly  required="" class="form-control" value="<?php echo $apd['supplier_slab_no']; ?>"  />
                                            </td>
                                        
                                        
                                               <td>
                                                <input type="text" id="gross_width_1_<?php echo $i; ?>" id="gross_width_1_<?php echo $i; ?>" name="gross_width[]" readonly required="" class="gross_width  form-control" value="<?php echo $apd['g_width']; ?>" />
                                            </td>
                                            <td>
                                                <input type="text" id="gross_height_1_<?php echo $i; ?>" id="gross_height_1_<?php echo $i; ?>" name="gross_height[]" readonly required="" class="gross_height form-control" value="<?php echo $apd['g_height']; ?>" />
                                            </td>
                                        
                                        
                                            <td >
                                                <input type="text"   style="width:60px;" id="gross_sq_ft_<?php echo $i; ?>" readonly name="gross_sq_ft[]" data-gross_sq_ft="<?php echo $apd['gross_sqft']; ?>" class="gross_sq_ft form-control"  value="<?php echo $apd['gross_sqft']; ?>"      />
                                            </td>
                                            <td>
                                                <input type="text" id="bundle_no_<?php echo $i; ?>" name="bundle_no[]" required="" readonly   class="bundle_no form-control" value="<?php echo $apd['bundle_no']; ?>" />
                                            </td>
                                        
                                            <td style="text-align:center;">
                                                <input type="text"  id="slab_no_<?php echo $i; ?>" name="slab_no[]" style="width:40px;" readonly  class="form-control"     value="<?php echo $i; ?>"  required=""/>
                                            </td>
       
                                             <td>
                                                <input type="text" id="net_width_1_<?php echo $i; ?>" name="net_width[]"  required="" readonly class="net_width form-control" value="<?php echo $apd['n_width']; ?>" />
                                            </td>
                                            <td>
                                                <input type="text" id="net_height_1_<?php echo $i; ?>" name="net_height[]"   required="" readonly class="net_height form-control" value="<?php echo $apd['n_height']; ?>" />
                                            </td>
       
                                            <td style="text-align:center;">
                                                 <input type="text"   style="width:60px;"  id="net_sq_ft_<?php echo $i; ?>" name="net_sq_ft[]" readonly    class="net_sq_ft form-control"  value="<?php echo $apd['net_sqft']; ?>"/>
                                            </td>
                                            <td>

           
  <span class="input-symbol-euro"><input type="text" id="cost_sq_ft_<?php echo $i; ?>"  name="cost_sq_ft[]"  style="width:60px;"  readonly  class="cost_sq_ft form-control"   value="<?php echo $apd['cost_sqft']; ?>"></span>

                                        
                                            <td >
                     
      <span class="input-symbol-euro"> <input type="text"  id="cost_sq_slab_<?php echo $i; ?>" name="cost_sq_slab[]"   style="width:60px;"  readonly  class="form-control"   value="<?php echo $apd['cost_slab']; ?>" /></span>
 


                                               
                                            </td>
                                            <td>
                                        
         <span class="input-symbol-euro">  <input type="text" id="sales_amt_sq_ft_<?php echo $i; ?>"  name="sales_amt_sq_ft[]"  readonly style="width:60px;"    class="sales_amt_sq_ft form-control"  value="<?php echo $apd['sales_price_sqft']; ?>" /></span>



                                               
                                            </td>
                                        
                                            <td >
                                    
      <span class="input-symbol-euro">   <input type="text"  id="sales_slab_amt_<?php echo $i; ?>" name="sales_slab_amt[]"  readonly style="width:60px;"      class="sales_slab_amt form-control"  value="<?php echo $apd['sales_slab_price']; ?>" /></td> </span>
  


                                             
                                            </td>
                                            <td>
                                                <input type="text" id="weight_<?php echo $i; ?>" name="weight[]"  readonly value="<?php echo $apd['weight']; ?>"   class="form-control" />
                                            </td>
                                        
                                            <td >
                                                <input type="text"  id="origin_<?php echo $i; ?>" name="origin[]"  readonly value="<?php echo $apd['origin']; ?>"   class="form-control"/>
                                            </td>

                                            <td >
                                               
                                                <a href="#"  class="btnclr client-add-btn btn "   data-toggle="modal"  data-target="#viewimg_<?php  echo $i; ?>"> <i class="fa fa-image" style="font-size:21px"></i></a>
            <div class="modal fade modal-success" id="viewimg_<?php echo $i; ?>" role="dialog">
                                    <div class="modal-dialog" role="document">
                                    <div class="modal-content" style="width:900px;">


            <div class="modal-header btnclr" style="height:60px;" >  <h4 style="text-align:center;">Images</h4>
                            <a href="#" class="close" data-dismiss="modal">&times;</a>
                            <h4 class="modal-title">
<?php $str = substr(strrchr($apd['img'], '/'), 1); 
$x = pathinfo($str, PATHINFO_FILENAME);
 echo $x;
?>

                            </h4>
                            </div>

                       <div class="modal-body" >
                       <div class="panel-body">
                     
                       <div class="col-sm-6"  style="text-align: center;width:850px;">
<input type="file" name="image[]" id="fileChooser_<?php echo $i; ?>" class="btnclr dropify"   data-height="300" data-default-file="<?php echo $apd['img'];  ?>"/>                   </div>

                          </div>
                        </div>                      
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
                                            </td>
                                                      <td >
                                           <a class="btn  btnclr notebtn"  id="newNote_<?php echo $i; ?>" name="newNote[]"><i class='fa fa-book' style='font-size:21px'></i></a>
        <p style="display: none;" name="notesForm" id="notesForm_<?php echo $i; ?>">
            <!-- <input class="form-control" type="text" name="pastorName" placeholder="Pastor Name" />  -->
           
            <textarea class="form-control" style="width:100%;" maxlength="500" id="notes_<?php echo $i; ?>" name="notes[]" cols="50" rows="5" placeholder="Notes">
         <?php  echo $apd['notes']; ?>
         
          </textarea>
                            </p>
        <br/>
        <div style="color:white;display: none;" class="btn add" id="button_<?php echo $i; ?>">
            Add
        </div><br/>
     
                                            </td>
                                            <td >

 <label class="switch">
      <input type="checkbox" class="checkbox switch-input"  value=""  id="blockcheck_<?php echo $i; ?>" name="blockcheck[]">
      <span class="switch-label" data-on="On" data-off="Off"></span>
      <span class="switch-handle"></span>
    </label>
                               <input type="hidden" name="block[]" class="block" value="<?php  echo $apd['block']; ?>"  id="block_<?php echo $i; ?>" />              
                                            </td>  
                                   

                                            <td >
                                               <span class="input-symbol-euro"><input  type="text" class="total_price form-control" style="width:80px;"  readonly    id="total_<?php echo $i; ?>"     name="total_amt[]" value="<?php echo $apd['total_amt']; ?>"  /></span>
                                            </td>
                                          
                                            
                                            
                                            </tr>

                                            <?php   $i++; }   ?>


                                            </tbody>
                                            <tfoot>
                                    <tr>
                                 

                                        <td style="text-align:right;padding-bottom: 35px;" colspan="22"><b><?php echo display('total');?> :</b></td>
                                        <td >
           <span class="input-symbol-euro">    <input type="text" id="Total" name="total"  readonly  class="form-control" style="width: 80px"  value="<?php echo $product_info[0]['oa_total']; ?>"   readonly="readonly"  /> </span>
            </td>
                                    
                                           
                                    </tr>
                               
                              
                       
                                            </tfoot>
                            </table>
                        </div>
                            <div class="col-sm-9" style="text-align:centre;">
                                <input type="submit" id="add-product" class="btnclr btn  m-b-5 m-r-2"  name="add-product" value="<?php echo display('save') ?>" tabindex="10"/>
                                </div>


                            </form>


<?php  } ?>









                   
   
    </div>
    <div id="menu1" class="tab-pane fade">
      <h3><?php echo display('Packing Details')?></h3>
      <p></p>
    </div>
   
   
  </div>


                        </div>

                         
                     </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Purchase report -->
    

        <!--Total sales report -->
      
        


    </section>
</div>
<!-- Product details page end-->







<!------ add new product-->
<div class="modal fade" id="product_hty" role="dialog">


<div class="modal-dialog modal-lg">
<div class="modal-content"  style="text-align:center;">
 <div class="modal-header btnclr" >
 

     <a href="#" class="close" data-dismiss="modal">&times;</a>
                            <h3 class="modal-title"><?php echo display('PRODUCT HISTORY')?></h3>
                        </div>


                        <div class="modal-body" style="width:270%">
                       <div class="panel-body" style="width:270%">


                       <div class="col-sm-4">
                              <table class="table table-bordered" cellspacing="0" style="width:1020px;" >
                                 <tr class="btnclr">
                            <th colspan="1 " style="width: max-content;"><?php echo display('product_name')?></th>
                          <th colspan="1 " style="width: max-content;"><?php echo display('product_model')?></th>
                                 </tr>
                                <tr >
                                <td colspan="1" style="text-align:center"><?php echo $product_info[0]['product_name']; ?></td>
                                <td colspan="1" style="text-align:center"><?php echo $product_info[0]['product_model']; ?></td>
                              </tr> 
                            </table>

                          
                              <?php if($sale_history){ ?>
                              <table class="table table-bordered" cellspacing="0"  style="width:1020px;" >
                               <h4><?php echo display('sales')?> :<h4>

                                 
                          
                             <tr class="btnclr">
                             <th colspan="1 " style="width: max-content;"><?php echo display('invoice_no');?></th>  
                             
                           <th colspan="1 " style="width: max-content;"><?php echo display('description');?></th>  
                           <th colspan="1 " style="width: max-content;"><?php echo display('Thick ness');?></th>   
                           <th colspan="1 " style="width: max-content;"><?php echo display('Supplier Block No');?></th>  
                           <th colspan="1 " style="width: max-content;"><?php echo display('Supplier Slab No');?></th> 
              
                           <th colspan="1" style="width: max-content;" class="text-center"><?php echo display('Gross Measurement');?><br><?php echo display('Width');?>|<?php echo display('Height');?></th>  
                           <th colspan="1 " style="width: max-content;"><?php echo display('Bundle No');?></th> 
                            <th colspan="1" style="width: max-content;" class="text-center"><?php echo display('Net Measure');?><br><br><?php echo display('Width');?>|<?php echo display('Height');?></th>
                           <th colspan="1 " style="width: max-content;"><?php echo display('Weight');?></th>  

   
                </tr >




<?php  
//print_r($sale_history);
   foreach($sale_history as $sale){
  ?>


    <tr>
   <td colspan="1" style="text-align:center;">  <a href="<?php echo base_url()?>Cinvoice/invoice_update_form/<?php echo  $sale['inv'];  ?>"> <?php echo $sale['commercial_invoice_number']; ?> <a></td>

      <td colspan="1" style="text-align:center;"><?php echo $sale['description_table']; ?></td>
      <td colspan="1" style="text-align:center;"><?php echo $sale['thickness']; ?></td>
      <td colspan="1" style="text-align:center;"><?php echo $sale['supplier_block_no']; ?></td>
      <td colspan="1" style="text-align:center;"><?php echo $sale['supplier_slab_no']; ?></td>
      <td colspan="1" style="text-align:center;"><?php echo $sale['g_width']; ?>|<?php echo $sale['g_height']; ?></td>
      <td colspan="1" style="text-align:center;"><?php echo $sale['bundle_no']; ?></td>
      <!--<td colspan="1" style="text-align:center;"><?php echo $sale['slab_no']; ?></td>-->
      <td colspan="1" style="text-align:center;"> <?php echo $sale['n_width']; ?>|<?php echo $sale['n_height']; ?></td>
    
      <td colspan="1" style="text-align:center;"><?php echo $sale['weight']; ?></td>


   </tr>
   </a>
    <?php  } ?>

   </table>
   <?php  } ?>
                             

                                <?php  if($expense_history){ ?>

                                   <table class="table table-bordered" cellspacing="0"  style="width:1020px;" >
                                   <h4><?php echo display('expense')?> :<h4>

                             <tr >
                           <th  style="width: max-content;"><?php echo "Invoice No";?></th>  
                          <th  style="width: max-content;" class="text-center"><?php echo  display('description'); ?></th>
                                            <th   class="text-center"><?php echo display('Thick ness');?><i class="text-danger">*</i></th>
                                            <th  style="width: 70px;" class="text-center"><?php echo display('Supplier Block No');?><i class="text-danger">*</i></th>

                                            <th  style="width:100px;" class="text-center" ><?php echo display('Supplier Slab No');?><i class="text-danger">*</i> </th>
                                            <th    style="width:150px;" class="text-center"><?php echo display('Gross Measurement');?><i class="text-danger">*</i> </th>
                                      
                                            <th  style="width: min-content;" class="text-center">Bundle No<i class="text-danger">*</i></th>
                                            <th  style="width: min-content;" class="text-center">Slab No<i class="text-danger">*</i></th>
                                            <th   style="width:150px;" class="text-center"><?php echo display('Net Measure');?><i class="text-danger">*</i></th>
                                     
                                            <th  style="width: 70px;" class="text-center"><?php echo display('Cost per Sq.Ft');?></th>
                                            <th  style="width: 70px;" class="text-center"><?php echo display('Cost per Slab');?></th>
                                            <th  style="width: 70px;" class="text-center"><?php echo display('sales'); ?><br/><?php echo display('Price per Sq.Ft');?></th>
                                            <th   style="width: 70px;" class="text-center"><?php echo display('Sales Slab Price');?></th>
                                            <th  class="text-center"><?php echo display('Weight');?></th>
                                            <th  class="text-center"><?php echo display('Origin');?></th>
                          </tr >                    

   

<?php  
  //print_r($expense_history);//die();
  // foreach($expense_history as $expense){
       for($i=0;$i< count($expense_history);$i++){
  ?>
    <tr>

    <td colspan="1" style="text-align:center;">  <a href="<?php echo base_url()?>Cpurchase/purchase_update_form/<?php echo  $expense_history[$i]['purchase_id'];  ?>"> <?php echo$expense_history[$i]['invoice_id']; ?> <a></td>
     <td colspan="1" style="text-align:center;"><?php echo $expense_history[$i]['description_table']; ?></td>
      <td colspan="1" style="text-align:center;"><?php echo $expense_history[$i]['thickness']; ?></td>
      <td colspan="1" style="text-align:center;"><?php echo $expense_history[$i]['supplier_block_no']; ?></td>
      <td colspan="1" style="text-align:center;"><?php echo $expense_history[$i]['supplier_slab_no']; ?></td>
         <td colspan="1" style="text-align:center;"> <?php echo $expense_history[$i]['g_width']; ?>|<?php echo $expense_history[$i]['g_height']; ?></td>
      <td colspan="1" style="text-align:center;"><?php echo $expense_history[$i]['bundle_no']; ?></td>
      <td colspan="1" style="text-align:center;"><?php echo $expense_history[$i]['slab_no']; ?></td>
          <td colspan="1" style="text-align:center;"> <?php echo $expense_history[$i]['n_width']; ?>|<?php echo $expense_history[$i]['n_height']; ?></td>
      <td colspan="1" style="text-align:center;"><?php echo $expense_history[$i]['cost_sqft']; ?></td>
      <td colspan="1" style="text-align:center;"><?php echo $expense_history[$i]['cost_slab']; ?></td>
      <td colspan="1" style="text-align:center;"><?php echo $expense_history[$i]['sales_price_sqft']; ?></td> 
      <td colspan="1" style="text-align:center;"><?php echo $expense_history[$i]['sales_slab_price']; ?></td>
      <td colspan="1" style="text-align:center;"><?php echo $expense_history[$i]['weight']; ?></td>
    
      <td colspan="1" style="text-align:center;"><?php echo $expense_history[$i]['origin']; ?></td>
      

        </tr>
      <?php  $i++;} ?>

   </table>
   <?php  } ?>


                                
                           
                            </div>
                          </div>
                        </div> 




 </div>

</div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
   </div><!-- /.modal -->
   </form>

































            
          

     <div class="modal fade" id="myModal1" >
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="  margin-top: 190px;text-align:center;">
        <div class="modal-header btnclr" >
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><?php echo display('product');?></h4>
        </div>
        <div class="modal-body" id="bodyModal1" style="font-weight:bold;text-align:center;">
          
          <h4></h4>
     
        </div>
        <div class="modal-footer">
          
        </div>
      </div>
      
    </div>
  </div>

<script>
$('.dropify').dropify();
// Used events
var drEvent = $('.dropify-event').dropify();
drEvent.on('dropify.beforeClear', function(event, element) {
  return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
});
drEvent.on('dropify.afterClear', function(event, element) {
  alert('File deleted');
});
 $(document).ready(function() {
   $('.block').each( function () {
          var netheight = $(this).attr('id');
const indexLastDot = netheight.lastIndexOf('_');
var id = netheight.slice(indexLastDot + 1);

  if($('#block_'+id).val()=='on')
{
$('#blockcheck_'+id).prop('checked', true);
}else{
$('#blockcheck_'+id).prop('checked', false);
}

    })



 });
       $(document).ready(function() {
  var cnd=$('#country_flag').val();
 var split_string = cnd.split("-", 1)
 console.log(split_string);
       $.getJSON('https://restcountries.com/v3.1/alpha/'+split_string[0], 
function(data) {
 
//var a = JSON.parse(data.flag);
console.log(data[0]['flags']['png']);
$("#flag").attr("src", data[0]['flags']['png']);
//console.log(x);
 // $("#flag").html(x);
});
      


});
$(document).ready(function() {
  $(".notebtn").click(function() {

     var netheight = $(this).attr('id');
const indexLastDot = netheight.lastIndexOf('_');
var id = netheight.slice(indexLastDot + 1);
    $("#notesForm_"+id).show('slow', function() {
      $("#button_"+id).show('slow');
      $("#newNote_"+id).hide('slow');
    });
  });
  $(".add").click(function() {
       var netheight = $(this).attr('id');
const indexLastDot = netheight.lastIndexOf('_');
var id = netheight.slice(indexLastDot + 1);
    $("#newNote_"+id).show('slow');
    $("#notesForm_"+id).hide('slow');
    $("#button_"+id).hide('slow');

    var notes = $('textarea[id=notes_'+id+']').val();
    var dt = new Date();
    var date = dt.toDateString();
  
  });

});

//    var ckEditorID;

// ckEditorID = 'notes';

// function fnConsolePrint() {
//   //console.log($('#' + ckEditorID).val());
//   console.log(CKEDITOR.instances[ckEditorID].getData());
// }
// CKEDITOR.config.forcePasteAsPlainText = true;
var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';
$('#product_details_edit').submit( function( e ) {
     $(this).find('input[type="checkbox"]').each( function () {
          var netheight = $(this).attr('id');
const indexLastDot = netheight.lastIndexOf('_');
var id = netheight.slice(indexLastDot + 1);

  if($('#blockcheck_'+id).is(':checked'))
{
$('#block_'+id).val("on");
}else{
$('#block_'+id).val("off");
}

    })
    $.ajax( {
     url:"<?php echo base_url(); ?>Cproduct/product_details_edit",
      type: 'POST',
      data: new FormData( this ),
      success:function (data) {
$("#bodyModal1").html("<?php echo display('Updated Successfully')?>");
$('#myModal1').modal('show');
$('#product_info').modal('hide');

       window.setTimeout(function(){
        $('#myModal1').modal('hide');
        $('.modal-backdrop').remove();
       
 },2500);
 
 
console.log(data);
console.log(input_hdn);
},
      processData: false,
      contentType: false
    } );
    e.preventDefault();
  } );

 
var shoppingCart = (function() {

  cart = [];
  
  function Item(product_id, description, thickness, supplier_block_no,supplier_slab_no, g_width, g_height, gross_sq_ft, bundle_no, slab_no, n_width, n_height, net_sq_ft, cost_sq_ft, cost_sq_slab, sales_amt_sq_ft, sales_slab_amt, weight, origin, total_amt,  count) {
    this.product_id = product_id;
    this.description = description;
    this.thickness = thickness;
    this.supplier_block_no = supplier_block_no;
    this.supplier_slab_no = supplier_slab_no;
    this.g_width = g_width;
    this.g_height = g_height;
    this.gross_sq_ft = gross_sq_ft;
    this.bundle_no = bundle_no;
    this.slab_no = slab_no;
    this.n_width = n_width;
    this.n_height = n_height;
    this.net_sq_ft = net_sq_ft;
    this.cost_sq_ft = cost_sq_ft;
    this.cost_sq_slab = cost_sq_slab;
    this.sales_amt_sq_ft = sales_amt_sq_ft;
    this.sales_slab_amt = sales_slab_amt;
    this.weight = weight;
    this.origin = origin;
    this.total_amt = total_amt;
    this.count = count;
  }
  
  
  // Save cart
  function saveCart() {
    console.log(cart);
     if (sessionStorage.setItem('shoppingCart', JSON.stringify(cart))) {
        alert("<?php echo  display('Product Added Successfully')?>");
     }else{
         alert("<?php echo  display('Product Added Successfully')?>");
     }
  }
  
    // Load cart
  function loadCart() {
    cart = JSON.parse(sessionStorage.getItem('shoppingCart'));
  }
  if (sessionStorage.getItem("shoppingCart") != null) {
    loadCart();
  }
  // else{
  //   alert("Add Produts to view cart");
  // }
  

  // =============================
  // Public methods and propeties
  // =============================
  var obj = {};
  
  // Add to cart
    obj.addItemToCart = function(product_id, description, thickness, supplier_block_no,supplier_slab_no, g_width, g_height, gross_sq_ft, bundle_no, slab_no, n_width, n_height, net_sq_ft, cost_sq_ft, cost_sq_slab, sales_amt_sq_ft, sales_slab_amt, weight, origin, total_amt,  count) {
    for(var item in cart) {
      if(cart[item].product_id == product_id && cart[item].description == description && cart[item].thickness == thickness && cart[item].supplier_block_no == supplier_block_no && cart[item].supplier_slab_no == supplier_slab_no && cart[item].g_width == g_width && cart[item].g_height == g_height && cart[item].gross_sq_ft == gross_sq_ft && cart[item].bundle_no == bundle_no && cart[item].slab_no == slab_no && cart[item].n_width == n_width && cart[item].n_height == n_height && cart[item].net_sq_ft == net_sq_ft && cart[item].cost_sq_ft == cost_sq_ft && cart[item].cost_sq_slab == cost_sq_slab && cart[item].sales_amt_sq_ft == sales_amt_sq_ft && cart[item].sales_slab_amt == sales_slab_amt && cart[item].weight == weight && cart[item].origin == origin && cart[item].total_amt == total_amt) {
        cart[item].count ++;
        saveCart();
        return;
      }
    }
    var item = new Item(product_id, description, thickness, supplier_block_no,supplier_slab_no, g_width, g_height, gross_sq_ft, bundle_no, slab_no, n_width, n_height, net_sq_ft, cost_sq_ft, cost_sq_slab, sales_amt_sq_ft, sales_slab_amt, weight, origin, total_amt,  count);
    cart.push(item);
    saveCart();
  }
  // Set count from item
  obj.setCountForItem = function(product_id, description, thickness, supplier_block_no,supplier_slab_no, g_width, g_height, gross_sq_ft, bundle_no, slab_no, n_width, n_height, net_sq_ft, cost_sq_ft, cost_sq_slab, sales_amt_sq_ft, sales_slab_amt, weight, origin, total_amt,  count) {
    for(var i in cart) {
      if (cart[item].product_id == product_id && cart[item].description == description && cart[item].thickness == thickness && cart[item].supplier_block_no == supplier_block_no && cart[item].supplier_slab_no == supplier_slab_no && cart[item].g_width == g_width && cart[item].g_height == g_height && cart[item].gross_sq_ft == gross_sq_ft && cart[item].bundle_no == bundle_no && cart[item].slab_no == slab_no && cart[item].n_width == n_width && cart[item].n_height == n_height && cart[item].net_sq_ft == net_sq_ft && cart[item].cost_sq_ft == cost_sq_ft && cart[item].cost_sq_slab == cost_sq_slab && cart[item].sales_amt_sq_ft == sales_amt_sq_ft && cart[item].sales_slab_amt == sales_slab_amt && cart[item].weight == weight && cart[item].origin == origin && cart[item].total_amt == total_amt) {
        cart[i].count = count;
        break;
      }
    }
  };
   
  // Count cart 
  obj.totalCount = function() {
    var totalCount = 0;
    for(var item in cart) {
      // totalCount += cart[item].count;
        totalCount =  cart.length;
        // console.log(totalCount);
    }
    return totalCount;
  }

  // Total cart
  obj.totalCart = function() {
    var totalCart = 0;
    for(var item in cart) {
        // totalCount = cart[item].count;
        totalCount =  cart.length;    }
    return totalCart;
  }

  // List cart
  obj.listCart = function() {
    var cartCopy = [];
    for(i in cart) {
      item = cart[i];
      itemCopy = [];
      for(p in item) {
        // console.log(item);
        itemCopy = item;
      }
      // itemCopy.total = Number(item.description * item.thickness * item.count).toFixed(2);
      cartCopy.push(itemCopy)
    }
    return cartCopy;
  }

  return obj;
})();


// *****************************************
// Triggers / Events
// ***************************************** 
// Add item
$('.add-to-cart').click(function(event) {
  event.preventDefault();
  var product_id = $(this).data('product_id');
  var description = $(this).data('description');
  var thickness = $(this).data('thickness');
  var supplier_block_no = $(this).data('supplier_block_no');
  var supplier_slab_no = $(this).data('supplier_slab_no');
  var g_width = $(this).data('g_width');
  var g_height = $(this).data('g_height');
  var gross_sq_ft = $(this).data('gross_sq_ft');
  var bundle_no = $(this).data('bundle_no');
  var slab_no = $(this).data('slab_no');
  var n_width = $(this).data('n_width');
  var n_height = $(this).data('n_height');
  var net_sq_ft = $(this).data('net_sq_ft');
  var cost_sq_ft = $(this).data('cost_sq_ft');
  var cost_sq_slab = $(this).data('cost_sq_slab');
  var sales_amt_sq_ft = $(this).data('sales_amt_sq_ft');
  var sales_slab_amt = $(this).data('sales_slab_amt');
  var weight = $(this).data('weight');
  var origin = $(this).data('origin');
  var total_amt = $(this).data('total_amt');
  // console.log(origin);
  shoppingCart.addItemToCart(product_id, description, thickness, supplier_block_no, supplier_slab_no, g_width, g_height, gross_sq_ft, bundle_no, slab_no, n_width, n_height, net_sq_ft, cost_sq_ft, cost_sq_slab, sales_amt_sq_ft, sales_slab_amt, weight, origin, total_amt, 1);
  displayCart();
});
function displayCart() {
  var cartArray = shoppingCart.listCart();
// console.log(cartArray);
  var output = "";
  for(var i in cartArray) {
    output += "<tr>"
    + "<td>" + "<input type='checkbox' id='myCheckbox' class='checkboxall'>" + "</td>"
    + "<td prop='description'>" +"<input type='text' name='description[]' class='form-control' id='description' readonly  value="+cartArray[i].description+">"+  "</td>"
    + "<td prop='thickness'>" +"<input type='text' class='form-control' name='thickness[]' id='thickness' readonly  value="+ cartArray[i].thickness+ ">"+ "</td>"
    + "<td prop='supplier_block_no'>" +"<input type='text' class='form-control' id='supplier_block_no' name='supplier_block_no[]' readonly  value="+ cartArray[i].supplier_block_no +">"+ "</td>"
    + "<td prop='supplier_slab_no'>" +"<input type='text' class='form-control' id='supplier_slab_no' name='supplier_slab_no[]' readonly  value="+ cartArray[i].supplier_slab_no +">"+ " </td>"
    + "<td prop='gross_sq_ft'>" +"<input type='text' class='form-control size_view' id='gross_sq_ft' name='gross_sq_ft[]' readonly  value="+ cartArray[i].gross_sq_ft+ ">"+ "</td>"
    + "<td prop='bundle_no'>" +"<input type='text' class='form-control size_view' id='bundle_no' name='bundle_no[]' readonly value="+ cartArray[i].bundle_no + ">"+"</td>"
    + "<td prop='slab_no'>" +"<input type='text' class='form-control size_view' id='slab_no' name='slab_no[]' readonly   value="+ cartArray[i].slab_no +">"+"</td>"
    + "<td prop='net_sq_ft'>" +"<input type='text' class='form-control size_view' id='net_sq_ft' name='net_sq_ft[]' readonly  value="+ cartArray[i].net_sq_ft+">"+ "</td>"
    + "<td prop='cost_sq_ft'>" +"<input type='text' class='form-control size_view' id='cost_sq_ft' name='cost_sq_ft[]' readonly  value="+ cartArray[i].cost_sq_ft +">"+ "</td>"
    + "<td prop='cost_sq_slab'>" +"<input type='text' class='form-control size_view' id='cost_sq_slab' name='cost_sq_slab[]' readonly  value="+ cartArray[i].cost_sq_slab+ ">"+ "</td>"
    + "<td prop='sales_amt_sq_ft'>" +"<input type='text' class='form-control size_view' id='sales_amt_sq_ft' name='sales_amt_sq_ft[]'  readonly  value="+ cartArray[i].sales_amt_sq_ft+">"+ "</td>"
    + "<td prop='sales_slab_amt'>" +"<input type='text' class='form-control size_view' id='sales_slab_amt'  name='sales_slab_amt[]' readonly  value="+ cartArray[i].sales_slab_amt+ ">"+"</td>"
    + "<td prop='weight'>" +"<input type='text' class='form-control size_view' id='weight' name='weight[]' readonly  value="+ cartArray[i].weight+ ">"+ "</td>"
    + "<td prop='origin'>" +"<input type='text' class='form-control size_view' id='origin' name='origin[]' readonly  value="+ cartArray[i].origin+ ">"+ "</td>"
    + "<td prop='total_amt'>" +"<input type='text' class='form-control size_view' id='total_amt'  name='total_amt[]' readonly  value="+ cartArray[i].total_amt+">"+"</td>"
    // + "<td><button class='delete-item btn btn-danger' data-description=" + cartArray[i].description + " data-thickness=" + cartArray[i].thickness + " >X</button></td>"
    "</tr>";
  }
  $('.show-cart').html(output);
  // $('.total-cart').html(shoppingCart.totalCart());
  $('.total-count').html(shoppingCart.totalCount());
}
displayCart();
// Clear items
// $('.clear-cart').click(function() {
//   shoppingCart.clearCart();
//   displayCart();
// });
$('#cartdata').submit(function (event) {
   
       
    var dataString = {
        dataString : $("#cartdata").serialize()
    
   };
   dataString[csrfName] = csrfHash;
  
    $.ajax({
        type:"POST",
        dataType:"json",
        url:"<?php echo base_url(); ?>Cinvoice/invoice_update_form_sample",
        data:$("#cartdata").serialize(),

        success:function (data) {
        console.log(data);

       }

    });
    event.preventDefault();
});
var overall_sum=0;
     $('.table').find('.total_price').each(function() {
var v=$(this).val();
  overall_sum += parseFloat(v);
 // overall_sum +=parseFloat(v);
});
 $('#Total').val(overall_sum.toFixed(3)).trigger('change');
    $(document).ready(function(){
   
   $(".sidebar-mini").addClass('sidebar-collapse') ;
   });
  </script>
<style type="text/css">
    .size_view{
        width: 50px !important;
    }
    @media (min-width: 992px){
      .modal-lg {
    width: 1130px !important;
}
    }
</style>


