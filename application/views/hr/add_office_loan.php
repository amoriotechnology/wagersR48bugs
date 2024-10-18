<!-- Add Prerson start -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<style>
    .select2{
        display:none;
    }

    .btnclr{
       background-color:<?php echo $setting_detail[0]['button_color']; ?>;
       color: white;

   }


    </style>
<div class="content-wrapper">
    <section class="content-header" style="height: 70px;">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('office_loan') ?></h1>
            <small><?php //echo display('add_loan') ?></small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('office_loan') ?></a></li>
                <li class="active" style="color:orange;"><?php echo display('add_loan') ?></li>
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
               
               
               
            </div>
        </div>
        <style>
            input {
    border: none;
    background-color: #eee;
 }
textarea:focus, input:focus{
   
    outline: none;
}

   
    </style>
    <?php  //print_r($bank_name); ?>
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title" style="height:35px;">
                       
                        <div class="panel-title form_employee"  style="float:right ;color:white;">
                            <a href="<?php echo base_url('Chrm/manage_officeloan') ?>"    class="btnclr btn btn-info m-b-5 m-r-2"><i class="ti-align-justify"> </i> Manage Office Loan </a>
                            </div>
                    
                    </div>
                    </div>
                   <?php echo form_open_multipart('Cloan/submit_loan',array('class' => 'form-vertical','id' => 'inflow_entry' ))?>
                    <div class="panel-body">
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                    	<div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label"><?php echo display('name') ?> <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <select class="form-control" name="person_id"  style="width:704px;" id="nameofficeloanperson" tabindex="1">
                                    <option><?php echo display('select_one')?></option>
                                <?php  foreach($person_list as $person) {?>  
                                    <option value="<?php  echo $person['first_name']." ".$person['last_name']?>"><?php  echo $person['first_name']." ".$person['last_name']?></option>
                              <?php }  ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-sm-3 col-form-label"><?php echo display('phone') ?> <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control phone" name="phone" id="phone" style="width:705px;" required="" placeholder="<?php echo display('phone') ?>" min="0" tabindex="2"/>
                            </div>
                        </div>

                  



                        <div class="form-group row">
                        <label for="ammount" class="col-sm-3 col-form-label"><?php echo display('ammount') ?> <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                            
                            <input type="number"  name="ammount" id="ammount" class="form-control ammount" style="width:705px;background-color: #eee;"  required="" placeholder="<?php   echo $currency; ?> <?php echo display('ammount') ?>" min="0" tabindex="3"/>
                            
                        </div>
                        </div>





                         <div class="form-group row" id="payment_from">
                                
                                    <label for="payment_type" class="col-sm-3 col-form-label"><?php
                                        echo display('payment_type');
                                        ?> <i class="text-danger">*</i></label>
                                    <div class="col-sm-5">
                                        <select name="paytype" id="paytype"  class="form-control" required="" onchange="bank_paymet(this.value)" tabindex="3">
                                         <option value="" selected disabled> <?php echo display('Select Payment Type') ?></option>
                            <option value="<?php echo display('cash_payment')?>"><?php echo display('cash_payment')?></option>
                            <option value="<?php echo display('bank_payment')?>"><?php echo display('bank_payment')?></option> 
                            
                                        <?php  foreach($payment_typ as $pt){ ?>
                                            <option value="<?php  echo $pt['payment_type'] ;?>"><?php  echo $pt['payment_type'] ;?></option>
                                        <?php  } ?>
                                        </select>
                                      
                            
                                
                            </div>
                            <div  class=" col-sm-0">
     <a  class="btnclr client-add-btn btn" aria-hidden="true"  data-toggle="modal" data-target="#payment_type" ><i class="fa fa-plus"></i></a>
    </div>  
                                    </div>
                             
                              
                            <div class="form-group row" id="bank_div">
                                <label for="bank" class="col-sm-3 col-form-label"><?php
                                    echo display('bank');
                                    ?> <i class="text-danger">*</i></label>
                                <div class="col-sm-5">
                                   <select name="bank_id" class="form-control"  id="bankpayment">
                                        <option value=""><?php echo display('select_one') ?></option>
                                        <?php foreach($bank_name as $bank){ ?>                                          
                                           <option value="<?php echo $bank['bank_id']?>"><?php echo $bank['bank_name'];?></option>
                                        <?php }?>
                                    </select>
                                 
                                </div>

                                 <div class="col-sm-0">
                                 <a data-toggle="modal" href="#add_bank_info"   class="btnclr btn "><i class="fa fa-university"></i></a>
                               </div>



                                </div>
                        










                                <div class="form-group row">
                              <label for="noofpayterms" class="col-sm-3 col-form-label"><?php echo  ('No of Payment Terms') ?><i class="text-danger">*</i></label>
                              <div class="col-sm-5">
                                 <select   name="noofpayterms" id="noofpayterms" class=" form-control"   required>
                                    <option   value=""><?php echo display('Select No of Payment Terms') ?></option>
                                  
                                    <?php foreach($noofpayment_type as $nopt){ ?>
                                    <option value="<?php echo $nopt['noofpay_terms'] ; ?>"><?php echo $nopt['noofpay_terms'] ; ?></option>
                                    <?php    }?>
                                 </select>
                              </div>
                              <div class="col-sm-0">
                                 <a href="#" class="btnclr client-add-btn btn " aria-hidden="true"   data-toggle="modal" data-target="#payment_type_new" ><i class="fa fa-plus"></i></a>
                              </div>
                           </div>
 


















                        <div class="form-group row">
                            <label for="date" class="col-sm-3 col-form-label"><?php echo display('date') ?> <i class="text-danger"></i></label>
                            <div class="col-sm-6">
                               <input type="date" class="form-control datepicker" name="date" id="date" style="width:704px;"        value="<?php echo date("Y-m-d");?>" placeholder="<?php echo display('date') ?>" tabindex="4"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="details" class="col-sm-3 col-form-label"><?php echo display('details') ?> <i class="text-danger"></i></label>
                            <div class="col-sm-6">
                                <textarea class="form-control" name="details" id="details"  style="    width: 708px;height: 49px;" placeholder="<?php echo display('details') ?>" tabindex="5"></textarea>
                            </div>
                        </div>

                     
  <div class="form-group row">
                            <div class="col-sm-6">
                            <?php  $transaction_id = $this->auth->generator(10);  ?>

                                <input type="hidden" class="form-control" name="transaction_id" id="transaction_id"  value="<?php echo $transaction_id; ?> " tabindex="4"/>

                            </div>
                        </div>
                        
                    

                        <div class="form-group row">
                            <label for="example-text-input" ></label>
                            <!-- <div class="col-sm-1"> -->
                                <!-- <input type="reset" class="btn btn-danger" value="<?php echo display('reset') ?>" tabindex="6"/> -->
                                <input type="submit" id="add-deposit"  class="btnclr btn" name="add-deposit" value="<?php echo display('save') ?>" tabindex="7"/>
                            <!-- </div> -->

                        </div>
                    </div>
                    <?php echo form_close()?>
                </div>
            </div>
        </div>
    </section>
</div>
    <div class="modal fade" id="payment_type" role="dialog">

                <div class="modal-dialog" role="document">

                    <div class="modal-content" style="text-align:center;" >

                        <div class="modal-header btnclr"  >

                            

                            <a href="#" class="close" data-dismiss="modal">&times;</a>

                            <h4 class="modal-title"><?php echo display('Add New Payment Type') ?></h4>

                        </div>

                        

                        <div class="modal-body">

                            <div id="customeMessage" class="alert hide"></div>

                  <form id="add_pay_type" method="post">

                    <div class="panel-body">

 <input type ="hidden" name="csrf_test_name" id="" value="<?php echo $this->security->get_csrf_hash();?>">

                        <div class="form-group row">

                            <label for="customer_name" class="col-sm-3 col-form-label" style="width: auto;"><?php echo display('New Payment Type') ?> <i class="text-danger">*</i></label>

                            <div class="col-sm-6">

                                <input class="form-control" name ="new_payment_type" id="new_payment_type" type="text" placeholder="New Payment Type"  required="" tabindex="1">

                            </div>

                        </div>


                    </div>

                    

                        </div>



                        <div class="modal-footer">

                            

                            <a href="#" class="btn btnclr" data-dismiss="modal"><?php echo display('Close') ?> </a>

                            

                            <input type="submit" class="btn btnclr "  value=<?php echo display('Submit') ?>>

                        </div>

                                                </form>

                    </div><!-- /.modal-content -->

                </div><!-- /.modal-dialog -->

            </div><!-- /.modal -->















 <!------ add new Payment Type -->
 <div class="modal fade" id="payment_type_new" role="dialog">
            <div class="modal-dialog" role="document">
            <div class="modal-content" style="text-align:center;" >

<div class="modal-header btnclr"  >
                     <a href="#" class="close" data-dismiss="modal">&times;</a>
                     <h4 class="modal-title"> <?php echo  ('Add New No Of Payment Terms') ?> </h4>
                  </div>
                  <div class="modal-body">
                     <div id="customeMessage" class="alert hide"></div>
                     <form id="add_pay_terms" method="post">
                        <div class="panel-body">
                           <input type ="hidden" name="csrf_test_name" id="" value="<?php echo $this->security->get_csrf_hash();?>">
                           <div class="form-group row">
                              <label for="customer_name" style="width: auto;" class="col-sm-3 col-form-label"><?php echo  ('No Of Payment Terms') ?> <i class="text-danger">*</i></label>
                              <div class="col-sm-6">
                                 <input class="form-control" name ="new_payment_terms" id="new_payment_terms" type="text" placeholder="No Of Payment Terms"  required="" tabindex="1">
                              </div>
                           </div>
                        </div>
                  </div>
                  <div class="modal-footer">
                  <a href="#" class="btn btnclr "  data-dismiss="modal"><?php echo display('Close') ?> </a>
                  <input type="submit" class="btn btnclr "  value=<?php echo display('Submit') ?>>
                  </div>
                  </form>
               </div>
               <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
         </div>
         <!-- /.modal -->
























<div class="modal fade" id="add_bank_info">
    <div class="modal-dialog">
    <div class="modal-content" style="text-align:center;" >

<div class="modal-header btnclr"  >
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                	<h4 class="modal-title"><?php echo display ('ADD BANK ') ?></h4>

            </div>
            <div class="container"></div>
            <div class="modal-body">  <div id="customeMessage" class="alert hide"></div>


<form id="add_bank"  method="post">  
<div class="panel-body">



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
  <label for="shipping_line" class="col-sm-4 col-form-label"><?php echo display('Country') ?>
                                        <i class="text-danger"></i>
                                    </label>
                                    <div class="col-sm-6">
                                    <select class="selectpicker countrypicker form-control"  data-live-search="true" data-default="United States"  name="country" id="country" style="width:100%"></select>
                                 
                                    </div>

</div>
<div class="form-group row">
            <label for="previous_balance" class="col-sm-4 col-form-label"><?php echo display('Currency') ?></label>
            <div class="col-sm-6">
            <select  class="form-control" id="currency" name="currency1" class="form-control"  style="width: 100%;" required=""  style="max-width: -webkit-fill-available;">
    <option>Select currency</option>
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
    <option selected value="USD">USD - US Dollar</option>
    <option value="UZS">UZS - Uzbekistan Som</option>
    <option value="VUV">VUV - Vanuatu Vatu</option>
    <option value="VEF">VEF - Venezuelan BolÃ­var</option>
    <option value="VND">VND - Vietnamese Dong</option>
    <option value="YER">YER - Yemeni Rial</option>
    <option value="ZMK">ZMK - Zambian Kwacha</option>
</select>
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">



</div>
 </div>

</div>



  </div>



  <div class="modal-footer">

      <div class="row">
        <div class="col-sm-8">
</div>
    
<div class="col-sm-4">
    <a href="#" class="btn btnclr "   data-dismiss="modal"><?php echo display('Close') ?></a>
     <input type="submit" id="addBank"     class="btn btnclr btn-large" name="addBank" value="<?php echo display('save') ?>"/>
     <!--  <input type="submit" class="btn btn-success" value="Submit"> -->

  </div>
  </div>  </div>

</form>
  </div>
  </div>
  </div>              






  <div class="modal fade" id="myModal1" role="dialog" >
                  <div class="modal-dialog">
                     <!-- Modal content-->
            
                        <div class="modal-content" style="text-align:center;margin-top: 190px;" >

<div class="modal-header btnclr"  >


                           <button type="button" class="close" data-dismiss="modal">&times;</button>
                           <h4 class="modal-title"><?php echo  ('Office Loan') ?></h4>
                        </div>
                        <div class="modal-body" id="bodyModal1" style="text-align:center;font-weight:bold;">
                        </div>
                        <div class="modal-footer">
                        </div>
                     </div>
                  </div>
               </div>





<script>
         function bank_paymet(val){
        if(val=='<?php echo display('bank_payment')?>'){
           var style = 'block';           
        }else{
     var style ='none';
   
        }
           
    document.getElementById('bank_div').style.display = style;
    }

            var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';
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
      
        $('.bankpayment').selectmenu(); 
        $('.bankpayment').append(result).selectmenu('refresh',true);
       $("#bodyModal1").html("Bank Added Successfully");
       $('#myModal3').modal('hide');
       $('#add_bank_info').modal('hide');
       $('#bank').show();
        $('#myModal1').modal('show');
       window.setTimeout(function(){
      
        $('#myModal5').modal('hide');
        $('#myModal1').modal('hide');
    
     }, 2000);
     
      }

   });
   event.preventDefault();
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
     
       var $select = $('select#paytype');
   
            $select.empty();
            console.log(data);
              for(var i = 0; i < data1.length; i++) {
        var option = $('<option/>').attr('value', data1[i].payment_type).text(data1[i].payment_type);
        $select.append(option); // append new options
    }
      $('#new_payment_type').val('');
      //  $('#paytype').append(result).selectmenu('refresh',true);
      $("#bodyModal1").html("Payment Added Successfully");
      $('#payment_type').modal('hide');
      
      $('#paytype').show();
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
             url:'<?php echo base_url();?>Cpurchase/noof_payment_terms',
             success: function(data1, statut) {
       
          var $select = $('select#terms');
               $select.empty();
               console.log(data);
                 for(var i = 0; i < data1.length; i++) {
           var option = $('<option/>').attr('value', data1[i].payment_terms).text(data1[i].payment_terms);
           $select.append(option); // append new options
       }
        $('#noofpayterms').val('');

        $('.noofpayterms').selectmenu(); 
        // $('.noofpayterms').append(result).selectmenu('refresh',true);

         $("#bodyModal1").html("No Of Payment Terms Added Successfully");
         $('#payment_type').modal('hide');
         $('#noofpayterms').show();
          $('#myModal1').modal('show');
         window.setTimeout(function(){
           $('#payment_type_new').modal('hide');
          $('#myModal1').modal('hide');
           $('.modal-backdrop').remove();
       }, 2500);
        }
         });
     });







</script>
<!-- Add Prerson end -->





