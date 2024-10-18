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
  </style>
<!-- <-Product details page start -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1>Add To Cart</h1>
            <small>Product</small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#">Product</a></li>
                <li class="active">Add To Cart</li>
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


        <div class="panel-body">
            <div class="row">
                <form id="product_details_edit"  method="post">
               <div class="table-responsive product-supplier">
                  <table class="table table-bordered table-hover"  id="product_table">
                     <thead>
                        <tr>
                           <th rowspan="2"class="text-center"><input type="checkbox" class="form-check-input" id="check1" name="option1"></th>
                           <th rowspan="2" style="width: max-content;" class="text-center">Description</th>
                           <th rowspan="2" style="width:100px;" class="text-center">Thickness<i class="text-danger">*</i></th>
                           <th rowspan="2" style="width:100px;" class="text-center">Supplier<br/>Block No<i class="text-danger">*</i></th>
                           <th rowspan="2" style="width:100px;" class="text-center" >Supplier <br/>Slab No<i class="text-danger">*</i> </th>
                           <th rowspan="2" class="text-center">Gross Sq.Ft</th>
                           <th rowspan="2" style="width: min-content;" class="text-center">Bundle No<i class="text-danger">*</i></th>
                           <th rowspan="2" style="width: min-content;" class="text-center">Slab No<i class="text-danger">*</i></th>
                           <th rowspan="2" class="text-center">Net Sq.Ft</th>
                           <th rowspan="2" style="width: 70px;" class="text-center">Cost per Sq.Ft</th>
                           <th rowspan="2" style="width: 70px;" class="text-center">Cost per Slab</th>
                           <th rowspan="2" style="width: 70px;" class="text-center">Sales<br/>Price per Sq.Ft</th>
                           <th rowspan="2"  class="text-center">Sales Slab Price</th>
                           <th rowspan="2" class="text-center">Weight</th>
                           <th rowspan="2" class="text-center">Origin</th>
                           
                           <th rowspan="2" style="width: 100px" class="text-center">Total</th>
                        </tr>
                     </thead>
                     <tbody id="addPurchaseItem">
                      <?php $i = 1; foreach ($cart_details as $key => $cart_item) { ?>
                        <tr>
                           <td><input type="checkbox" class="form-check-input item" id="item"></td>
                           <td>
                              <!-- <input type="hidden" name="product_id[]" value="<?php echo $product_info[0]['product_id'];?>" /> -->
                              <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                              <input type="text" id="description" name="description[]"   readonly  class="form-control" value="<?php echo $cart_item['description_table']; ?>" />
                           </td>
                           <td >
                              <input type="text" name="thickness[]" id="thickness" required="" readonly class="form-control"  value="<?php echo $cart_item['thickness']; ?>" />
                           </td>
                           <td>
                              <input type="text" id="supplier_b_no" name="supplier_block_no[]" readonly required="" class="form-control" value="<?php echo $cart_item['supplier_block_no']; ?>" />
                           </td>
                           <td >
                              <input type="text"  id="supplier_s_no" name="supplier_slab_no[]"  readonly  required="" class="form-control" value="<?php echo $cart_item['supplier_slab_no']; ?>"  />
                           </td>
                           <td >
                              <input type="text"   style="width:60px;" id="gross_sq_ft" readonly name="gross_sq_ft[]" class="gross_sq_ft form-control" value="<?php echo $cart_item['gross_sqft']; ?>" />
                           </td>
                           <td>
                              <input type="text" id="bundle_no" required="" readonly class="bundle_no form-control" value="<?php echo $cart_item['bundle_no']; ?>" />
                           </td>
                           <td style="text-align:center;">
                              <input type="text"  id="slab_no" name="slab_no[]" style="width:40px;" readonly  class="form-control"     value="1"  required=""/>
                           </td>
                           <td >
                              <input type="text" style="width:60px;"  id="net_sq_ft" name="net_sq_ft[]" readonly class="net_sq_ft form-control"  value="<?php echo $cart_item['net_sqft']; ?>"/>
                           </td>
                           <td>
                              <span class="input-symbol-euro"><input type="text" id="cost_sq_ft"  name="cost_sq_ft[]"  style="width:60px;"  readonly  class="cost_sq_ft form-control"   value="<?php echo $cart_item['cost_sqft']; ?>"></span>
                           <td >
                              <span class="input-symbol-euro"> <input type="text"  id="cost_sq_slab" name="cost_sq_slab[]"   style="width:60px;"  readonly  class="form-control"   value="<?php echo $cart_item['cost_slab']; ?>" /></span>
                           </td>
                           <td>
                              <span class="input-symbol-euro">  <input type="text" id="sales_amt_sq_ft"  name="sales_amt_sq_ft[]"  readonly style="width:60px;"    class="sales_amt_sq_ft form-control"  value="<?php echo $cart_item['sales_price_sqft']; ?>" /></span>
                           </td>
                           <td >
                              <span class="input-symbol-euro">   <input type="text"  id="sales_slab_amt" name="sales_slab_amt[]"  readonly style="width:60px;" class="sales_slab_amt form-control"  value="<?php echo $cart_item['sales_slab_price']; ?>" />
                           </td>
                           </span>
                           </td>
                           <td>
                              <input type="text" id="weight" name="weight[]"  readonly value="<?php echo $cart_item['weight']; ?>"class="form-control" />
                           </td>
                           <td >
                              <input type="text"  id="origin" name="origin[]"  readonly value="<?php echo $cart_item['origin']; ?>" class="form-control"/>
                           </td>
                           </td>
                           <td >
                              <span class="input-symbol-euro"><input  type="text" class="total_price form-control" style="width:80px;"  readonly    id="total"     name="total_amt[]" value="0" /></span>
                           </td>
                        </tr>
                        <?php $i++; } ?>
                     </tbody>
                     <tfoot>
                        <tr>
                           <td style="text-align:right;" colspan="15"><b>TOTAL :</b></td>
                           <td >
                              <span class="input-symbol-euro">    <input type="text" id="Total" name="total"  readonly  class="form-control" style="width: 80px"  value="0"   readonly="readonly"  /> </span>
                           </td>
                        </tr>
                        <tr>
                           <td style="text-align:right;" colspan="15"><b>GRAND TOTAL :</b></td>
                           <td>
                              <span class="input-symbol-euro">   <input type="text" id="gtotal" readonly  style="width: 80px" class="form-control" name="gtotal"  value="0" readonly="readonly" /></span>
                           </td>
                        </tr>
                     </tfoot>
                  </table>
               </div>
              <!--  <div class="col-sm-9" style="text-align:centre;">
                  <input type="submit" id="add-product" class="btn btn-primary btn-large" style="color:white;background-color:#38469f;" name="add-product" value="<?php echo display('save') ?>" tabindex="10"/>
               </div> -->
            </form>
            </div>   
        </div>      
        


<script type="text/javascript">
    $(".item ").on("click", function () {

        alert('hi');
               
    // $(this).addClass('disabled')  
                    // add items to basket
                    // $(this).each(function () {
                    //     var name = $(this).children(".item-detail").children("h4").text();
                    //     var remove = "<button class='remove'> X </button>";
                    //     var cena = "<span class='eachPrice'>" + (parseFloat($(this).children(".item-detail").children(".prices").children(".price").text())) + "</span>";
                    //     $("#list-item").append("<li>" + name + "&#09; - &#09;" + cena + "$" + remove + "</li>");

                    //     number of items in basket
                    //     $("#items-basket").text("(" + ($("#list-item").children().length) + ")");
                    //     $("#items-basket").text();

                    //     calculate total price
                    //     var totalPrice = 0;
                    //     $(".eachPrice").each(function () {
                    //         var cenaEach = parseFloat($(this).text());
                    //         totalPrice += cenaEach;
                    //     });
                    //     $("#total-price").text(totalPrice + "$");
                    // });

                // remove items from basket
                // $(".remove").on("click", function () {
                //     $(this).parent().remove();
                //     var totalPrice = 0;
                //     $(".eachPrice").each(function () {
                //         var cenaEach = parseFloat($(this).text());
                //         totalPrice += cenaEach;
                //     });
                //     $("#total-price").text(totalPrice + "$");
                //     $("#items-basket").text("(" + ($("#list-item").children().length) + ")");
                // });
});
</script>   


<!-- <style>
    .input-symbol-euro{
        position: inherit !important;
    }
</style> -->


    </section>
</div>
<!-- Product details page end-->

