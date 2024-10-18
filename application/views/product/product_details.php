
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('product_report') ?></h1>
            <small><?php echo display('product_sales_and_purchase_report') ?></small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('report') ?></a></li>
                <li class="active"><?php echo display('product_report') ?></li>
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
                            <h4><?php echo display('product_details') ?></h4> </h4>
                        </div>
                    </div>
                    <div class="panel-body">
                     <div class="row">
                        <div class="col-sm-4"><img src="
                            <?php echo $product_details[0]['image']; ?>" style='width: 100%;'></div>
                         <div class="col-sm-4">
                             <table class="table table-bordered">
                                 <tr >
                                     <th colspan="2" style="text-align:center;">product Details</th>

                                 </tr>
                               <tr><td>Product Name</td><td><?php echo $product_details[0]['product_name']; ?></td></tr>
                               <tr><td>Product model</td><td><?php echo $product_details[0]['product_model']; ?></td></tr>
                               <tr><td>Avaailablity</td><td><?php echo $product_details[0]['p_quantity']; ?></td></tr>
                               <tr><td>Product price</td><td><?php echo $product_details[0]['price']; ?></td></tr>
                               <tr><td>supplier Price</td><td><?php echo $product_details[0]['supplier_price']; ?></td></tr>
                              
                              
                             </table>
                         </div>
                         
                         <div class="col-sm-4   ">

                            <div class="card">
  <img src="https://countryflagsapi.com/png/<?php echo $product_details[0]['iso3']; ?>" alt="John" style="width:30%;float: inherit;">
  <h1><?php echo $product_details[0]['supplier_name']; ?></h1>
  <p class="title"><?php echo $product_details[0]['address']; ?></p>
  <p class="title"><?php echo $product_details[0]['email_address']; ?></p>
  <p><?php echo $product_details[0]['country']; ?></p>
  
  
</div>

                           </div>
                         <div class="col-sm-6"></div>
                     </div>
                     <div class="row">
                        <div class="col-sm-12">
                             
<ul class="nav nav-tabs" style="    border-bottom: 1px solid;">
    <li class="active"><a data-toggle="tab" href="#home">Sales Invoice</a></li>
    <li><a data-toggle="tab" href="#menu1">Packing Details</a></li>

  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <h3>Sales Invoice</h3>
      <p>Sales Invoice</p>
    </div>
    <div id="menu1" class="tab-pane fade">
      <h3>Packing Details</h3>
      <p>Packing</p>
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
<!-- Product details page end