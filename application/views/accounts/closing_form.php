<!-- Closing Account start -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
             <figure class="one">
               <img src="<?php echo base_url()  ?>asset/images/closing.png"  class="headshotphoto" style="height:50px;" />
      </div>
      
        
             
               <div class="header-title">
          <div class="logo-holder logo-9">
            <h1><?php echo "Closing Report"; ?></h1>
       </div>
            
            
            
            <small><?php //echo display('close_your_account') ?></small>
         <ol class="breadcrumb"   style=" border: 3px solid #d7d4d6;"   >
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('report') ?></a></li>
                <li class="active" style="color:orange;"><?php echo "Closing Report"; ?></li>
           
              <div class="load-wrapp">
       <div class="load-10">
         <div class="bar"></div>
       </div>
       </div>
           
            </ol>
        </div>
    </section>
    <style>
            input {
    border: none;
    background-color: #eee;
 }
textarea:focus, input:focus{
   
    outline: none;
}
 .text-right {
    text-align: left; 
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
                

                    <a href="<?php echo base_url('Admin_dashboard/closing_report') ?>" style="float: right;background-color:#38469f;color:white;" class="btnclr btn btn-primary m-b-5 m-r-2 text-white">  <?php echo display('closing_report') ?> </a>

              
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="panel panel-bd lobidrag"    style=" border: 3px solid #d7d4d6;"  >
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4 style="font-weight:bold;"><?php echo display('closing_account') ?></h4>
                        </div>
                    </div>
                    <div class="panel-body">

                        <div class="text-center">
                          
                           <h3> <?php echo $company; ?> </h3>
                            <h4></b><?php echo $email; ?> </h4>
                            <h4><?php echo display('cash_closing') ?> </h4>
                            
                            <h4> <?php echo display('date') ?>:<?php echo date("d/m/Y"); ?> </h4>
                        </div>

                        <?php echo form_open_multipart('Caccounts/add_daily_closing', array('class' => 'form-vertical', 'id' => 'daily_closing')) ?>
                        <div class="form-group row">
                            <label for="last_day_closing" class="col-sm-3 col-form-label"><?php echo display('last_day_closing') ?></label>
                            <div class="col-sm-6">
                            <span class='form-control' style='background-color: #eee;'><?php   echo $currency; ?>  
                                <input type="text" name="last_day_closing"  id="last_day_closing" value="{last_day_closing}" readonly="readonly" />
                                 </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cash_in" class="col-sm-3 col-form-label"><?php echo display('receive') ?></label>
                            <div class="col-sm-6">
                            <span class='form-control' style='background-color: #eee;'><?php   echo $currency; ?>  
                                <input type="text"  id="cash_in" name="cash_in" value="{cash_in}" readonly="readonly" />
                            </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cash_out" class="col-sm-3 col-form-label"><?php echo display('payment') ?></label>
                            <div class="col-sm-6">
                            <span class='form-control' style='background-color: #eee;'><?php   echo $currency; ?>  
                                <input type="text"  id="cash_out" name="cash_out" value="{cash_out}" readonly="readonly" />
                           </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cash_in_hand" class="col-sm-3 col-form-label"><?php echo display('balance') ?></label>
                            <div class="col-sm-6">
                            <span class='form-control' style='background-color: #eee;'><?php   echo $currency; ?>  
                                <input type="text"  id="cash_in_hand" name="cash_in_hand" value="{cash_in_hand}" readonly="readonly" required />
                            </span></div>
                        </div>


                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-4 col-form-label"></label>
                            <div class="col-sm-6">
                                <input type="submit" id="add-deposit" class="btnclr btn btn-primary" style="color:white;background-color: #38469f;border-color: #2e6da4;" name="add-deposit" value="<?php echo display('day_closing') ?>" required />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">   
                <div class="panel panel-bd lobidrag"  style=" border: 3px solid #d7d4d6;"  >
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4 style="font-weight:bold;"><?php echo display('cash_in_hand') ?></h4>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center"><?php echo display('note_name') ?></th>
                                    <th class="text-center"><?php echo display('pcs') ?></th>
                                    <th class="text-center"><?php echo display('ammount') ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                 <tr>
                                    <td class="2000"><?php echo '2000'; ?></td>
                                    <td><input type="number" class="form-control text_0" name="thousands" onkeyup="cashCalculator()"  onchange="cashCalculator()"></td>
                                    <td><span class='form-control' style='background-color: #eee;'><?php   echo $currency; ?>  
                                    <input type="text" class="text_0_bal" value="0" readonly=""></span></td>
                                </tr> 
                                <tr>
                                    <td class="1000"><?php echo display('1000') ?></td>
                                    <td><input type="number" class="form-control text_1" name="thousands" onkeyup="cashCalculator()"  onchange="cashCalculator()"></td>
                                    <td><span class='form-control' style='background-color: #eee;'><?php   echo $currency; ?>  
                                    <input type="text" class="text_1_bal" value="0" readonly=""></span></td>
                                </tr> 
                                <tr>
                                    <td class="500"><?php echo display('500') ?></td>
                                    <td><input type="number" class="form-control text_2" name="fivehnd" onkeyup="cashCalculator()" onchange="cashCalculator()"></td>
                                    <td><span class='form-control' style='background-color: #eee;'><?php   echo $currency; ?>  
                                    <input type="text" class="text_2_bal" value="0" readonly=""></span></td>
                                </tr>   
                                <tr>
                                    <td class="100"><?php echo display('100') ?></td>
                                    <td><input type="number" class="form-control text_3" name="hundrad" onkeyup="cashCalculator()" onchange="cashCalculator()"></td>
                                    <td><span class='form-control' style='background-color: #eee;'><?php   echo $currency; ?>  
                                    <input type="text" class="text_3_bal" value="0" readonly=""></span></td>
                                </tr>   
                                <tr>
                                    <td class="50"><?php echo display('50') ?></td>
                                    <td><input type="number" class="form-control text_4" name="fifty" onkeyup="cashCalculator()" onchange="cashCalculator()"></td>
                                    <td><span class='form-control' style='background-color: #eee;'><?php   echo $currency; ?>  
                                    <input type="text" class="text_4_bal" value="0" readonly=""></span></td>
                                </tr>   
                                <tr>
                                    <td class="20"><?php echo display('20') ?></td>
                                    <td><input type="number" class="form-control text_5" name="twenty" onkeyup="cashCalculator()" onchange="cashCalculator()"></td>
                                    <td><span class='form-control' style='background-color: #eee;'><?php   echo $currency; ?>  
                                    <input type="text" class="text_5_bal" value="0" readonly=""></span></td>
                                </tr>   
                                <tr>
                                    <td class="10"><?php echo display('10') ?></td>
                                    <td><input type="number" class="form-control text_6" name="ten" onkeyup="cashCalculator()" onchange="cashCalculator()"></td>
                                    <td><span class='form-control' style='background-color: #eee;'><?php   echo $currency; ?>  
                                    <input type="text" class="text_6_bal" value="0" readonly=""></span></td>
                                </tr>   
                                <tr>
                                    <td class="5"><?php echo display('5') ?></td>
                                    <td><input type="number" class="form-control text_7" name="five" onkeyup="cashCalculator()" onchange="cashCalculator()"></td>
                                    <td><span class='form-control' style='background-color: #eee;'><?php   echo $currency; ?>  
                                    <input type="text" class="text_7_bal" value="0" readonly=""></span></td>
                                </tr>   
                                <tr>
                                    <td class="2"><?php echo display('2') ?></td>
                                    <td><input type="number" class="form-control text_8" name="two" onkeyup="cashCalculator()" onchange="cashCalculator()"></td>
                                    <td><span class='form-control' style='background-color: #eee;'><?php   echo $currency; ?>  
                                    <input type="text" class="text_8_bal" value="0" readonly=""></span></td>
                                </tr>
                                <tr>
                                    <td class="1"><?php echo display('1') ?></td>
                                    <td><input type="number" class="form-control text_9" name="one" onkeyup="cashCalculator()" onchange="cashCalculator()"></td>
                                    <td><span class='form-control' style='background-color: #eee;'><?php   echo $currency; ?>  
                                    <input type="text" class="text_9_bal" value="0" readonly=""></span></td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="2" align="right"><b><?php echo display('grand_total') ?></b></td>
                                    <td><span class='form-control' style='background-color: #eee;'><?php   echo $currency; ?>  
                                    <input type="text" class="total_money" value="0.00" readonly="" name="grndtotal"></span></td>
                                </tr>
                                <?php echo form_close() ?>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- cashCalculator form -->
    </section>
</div>
<!-- Closing Account end -->





