<script src="<?php echo base_url() ?>my-assets/js/countrypicker.js" type="text/javascript"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- style for currency list   -->
<style>
.img-flag{
  max-height: 11px;
  display: none;
}
.ui-selectmenu-text, .ui-front{
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
    width: 140px;
  }
}
    </style>

<!-- Add new customer start -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <figure class="one">
               <img src="<?php echo base_url()  ?>asset/images/customer.png"  class="headshotphoto" style="height:50px;" />
      </div>
        
           
           
           
           
           <div class="header-title">
          <div class="logo-holder logo-9">
            <h1><?php echo display('add_customer') ?></h1>
       </div> 
           
           
           
            <small><?php //echo display('add_new_customer') ?></small>
            <ol class="breadcrumb"  style=" border: 3px solid #d7d4d6;" >
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('customer') ?></a></li>
                <li class="active" style="color:orange;"><?php echo display('add_customer') ?></li>
         
         
         
           
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
                
               
           
            </div>
        </div>






        <!-- New customer -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag"    style="border:3px solid #d7d4d6;"  >


                    <div class="panel-heading" style="height: 55px;">

                  

                        <div class="panel-title">



                    

                        </div>

                        <div id="bloc2" style="float:right;">

<a  href="<?php echo base_url('Ccustomer/manage_customer') ?>" class="btnclr btn  m-b-5 m-r-2"><i class="ti-align-justify"> </i> <?php echo display('manage_customer') ?> </a>

 </div>   
                    </div>
                    <?php echo form_open('Ccustomer/insert_customer', array('class' => 'form-vertical', 'id' => 'insert_customer')) ?>
                    <div class="panel-body">
                     <div class="col-sm-6">
                        <div class="form-group row">
                            <label for="customer_name" class="col-sm-4 col-form-label"><?php echo display('Company Name');?> <i class="text-danger">*</i></label>
                            <div class="col-sm-8">
                                <input class="form-control" name ="company_name" id="customer_name" type="text" placeholder=" Company Name"  style="border: 2px solid #d7d4d6;" required="" tabindex="1" >
                            </div>
                        </div>
                       <div class="form-group row">
<label for="customer_type" class="col-sm-4 col-form-label"><?php echo display('Customer Type');?></label>
<div class="col-sm-7">
    
     <select   name="customer_type" id="customer_type" class=" form-control"  style="border:2px solid #d7d4d6;"  placeholder="Customer Type" >
     <option value=""></option>
    <option value="Distributor"><?php echo display('Distributor');?></option>
    <option value="Fabricator"><?php echo display('Fabricator');?></option>
    <option value="Kitchen"><?php echo display('Kitchen');?></option>
    <option value="Dealer"><?php echo display('Dealer');?></option>
    <option value="Contractor"><?php echo display('Contractor');?></option>
    <option value="Builder"><?php echo display('Builder');?></option>
    <option value="Others"><?php echo display('Others');?></option>
       <?php foreach($customertype_detail  as $custype) {?>
 
        <option value="<?php echo $custype['c_type']; ?>"><?php echo $custype['c_type']; ?></option>

<?php } ?>
    </select>
</div>


<div  class=" col-sm-1">
    <a href="#" class="client-add-btn btn btnclr" aria-hidden="true"      data-toggle="modal" data-target="#payment_type" ><i class="fa fa-plus"></i></a>
    </div>




</div>





                       	<div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label"><?php  echo  ('Primary Email');?><i class="text-danger">*</i></label>
                            <div class="col-sm-8">
                                <input class="form-control" name ="email" id="email" type="email" required=""  style="border: 2px solid #d7d4d6;"  placeholder="Primary Email" tabindex="2"> 
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="emailaddress" class="col-sm-4 col-form-label"><?php  echo  display('Secondary Email');?> </label>
                            <div class="col-sm-8">
                                <input class="form-control" name="emailaddress" id="emailaddress" type="email" style="border: 2px solid #d7d4d6;"  placeholder="Secondary Email"  >
                            </div>
                        </div>
                       

                        <div class="form-group row">
                            <label for="mobile" class="col-sm-4 col-form-label"><?php  echo  display('Business Phone');?> <i class="text-danger">*</i></label>
                            <div class="col-sm-8">
                                <input class="form-control" name ="phone" id="mobile" type="tel"  style="border: 2px solid #d7d4d6;" required=""   placeholder="(XXX) XXX-XXXX"   min="0" tabindex="3" required=""  oninput="formatPhoneNumber(this)" >
                              </div>
                        </div>
                     


                                 <div class="form-group row">
                            <label for="contact" class="col-sm-4 col-form-label"><?php  echo  display('Contact Person');?> <i class="text-danger">*</i></label>
                            <div class="col-sm-8">
                                <input class="form-control" name="contact" id="contact" type="number" style="border: 2px solid #d7d4d6;"  placeholder="Contact Person" required="" >
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="mobile" class="col-sm-4 col-form-label"> <?php  echo  display('Mobile');?></label>
                            <div class="col-sm-8">
                                <input class="form-control" name="mobile" id="mobile" type="number" style="border: 2px solid #d7d4d6;"  placeholder="Mobile"  min="0" tabindex="2" >
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="fax" class="col-sm-4 col-form-label"><?php  echo  display('Fax');?></label>
                            <div class="col-sm-8">
                                <input class="form-control" name="fax" id="fax"  style="border: 2px solid #d7d4d6;" type="text" placeholder="Fax" >
                            </div>
                        </div>
                       
                       
                            <div class="form-group row">
                            <label for="Preferred currency" class="col-sm-4 col-form-label" > <?php  echo  display('Preferred currency');?><i class="text-danger">*</i></label>
                            <div class="col-sm-8">
                            <select  class="form-control" id="currency" name="currency1"     required=""  style="max-width: -webkit-fill-available;width: 100%;border: 2px solid #d7d4d6;">
    <!-- <option>Select currency</option> -->
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
    <option value="VEF">VEF - Venezuelan BolÃ­var - Bs</option>
    <option value="VND">VND - Vietnamese Dong - ₫</option>
    <option value="YER">YER - Yemeni Rial - ﷼</option>
    <option value="ZMK">ZMK - Zambian Kwacha - ZK</option>
</select>    
                            </div>
                            <div id="pageLoader">
                            </div>
                            </div>
                    
                  











                            <div class="form-group row">

<label for="ETA" class="col-sm-4 col-form-label"><?php  echo  display('Attachments');?></label>

<div class="col-sm-8">

    <input type="file" name="file" class="form-control">
</div>

</div> 
                    </div>
                    
                    <div class="col-sm-6">

                    <div class="form-group row">
                            <label for="address2 " class="col-sm-4 col-form-label"><?php  echo  display('Billing Address');?><i class="text-danger">*</i></label>
                            <div class="col-sm-8">
                                <textarea class="form-control" required="" name="address2" id="address2" rows="2"  style="border: 2px solid #d7d4d6;"  placeholder="Billing Address" ></textarea>
                            </div>
                        </div>


                    <div class="form-group row">
                            <label for="address " class="col-sm-4 col-form-label"><?php  echo  display('Shipping Address');?></label>
                            <div class="col-sm-8">
                                <textarea class="form-control" name="address" id="address "  rows="2" style="border: 2px solid #d7d4d6;"  placeholder="Shipping Address"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="city" class="col-sm-4 col-form-label"><?php  echo  display('city');?> <i class="text-danger">*</i></label>
                            <div class="col-sm-8">
                                <input class="form-control" name="city" id="city" type="text" style="border: 2px solid #d7d4d6;"  placeholder="City" required="" >
                            </div>
                        </div>
                      <div class="form-group row">
                            <label for="state" class="col-sm-4 col-form-label"><?php  echo  display('state');?> <i class="text-danger">*</i></label>
                            <div class="col-sm-8">
                                <input class="form-control" name="state" id="state" type="text"  style="border: 2px solid #d7d4d6;" placeholder="State" required="" >
                            </div>
                        </div>
                      
                         
                         <div class="form-group row">
                            <label for="zip" class="col-sm-4 col-form-label"><?php  echo  display('zip');?> <i class="text-danger">*</i></label>
                            <div class="col-sm-8">
                                <input class="form-control" name="zip" id="zip" type="text"  style="border: 2px solid #d7d4d6;" placeholder="Zip"  required="">
                            </div>
                        </div>
                        

                      
                                <div class="form-group row">
                                    <label for="country" class="col-sm-4 col-form-label"><?php  echo  display('country');?><i class="text-danger">*</i></label>
                                    <div class="col-sm-8">
                                    <select class="selectpicker countrypicker form-control"    style="width:100%;border: 2px solid #d7d4d6;"   data-live-search="true" data-default="United States"  name="country" id="country" ></select>
                                 
                                    </div>
                                </div>
                          

                        <div class="form-group row">
<label for="billing_address" class="col-sm-4 col-form-label"><?php echo display('Payment Terms');?><i class="text-danger">*</i></label>
<div class="col-sm-7">
    <select   name="payment" id="payment_terms" class=" form-control" placeholder='Payment Terms'  style="border: 2px solid #d7d4d6;"   required="" >
     <option value=""></option>   
     <option value="" required=""><?php echo display('Select Payment Terms');?></option>
        <option value="CAD">CAD</option>
        <option value="COD">COD</option>
        <option value="ADVANCE"><?php echo display('ADVANCE');?></option>
        <option value="7DAYS">7<?php echo display('DAYS');?></option>
        <option value="15DAYS">15<?php echo display('DAYS');?></option>
        <option value="30DAYS">30<?php echo display('DAYS');?></option>
        <option value="45DAYS">45<?php echo display('DAYS');?></option>
        <option value="60DAYS">60<?php echo display('DAYS');?></option>
        <option value="75DAYS">75<?php echo display('DAYS');?>S</option>
        <option value="90DAYS">90<?php echo display('DAYS');?></option>
        <option value="180DAYS">180<?php echo display('DAYS');?></option>
        <?php foreach($payment_terms as $inv){ ?>
          <option value="<?php echo $inv['payment_terms'] ; ?>"><?php echo $inv['payment_terms'] ; ?></option>
        <?php    }?>
        </select>

      
   



</div>

<div class="col-sm-1">
                                  <a href="#" class="client-add-btn btn btnclr" aria-hidden="true"  data-toggle="modal" data-target="#payment_type_new" ><i class="fa fa-plus"></i></a>
                                </div>
</div>    
                         
                        <div class="form-group row">
                            <label for="previous_balance" class="col-sm-4 col-form-label"><?php echo display('Credit Limit');?> <i class="text-danger">*</i></label>
                            <div class="col-sm-8">
                                <input class="form-control" name="previous_balance" id="previous_balance" type="number" min="0" style="border: 2px solid #d7d4d6;"   placeholder="Credit Limit" tabindex="5" required="">
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-6">
                    
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-4 col-form-label">Open Balance</label>
                        <div class="col-sm-8">
                            <input name="open_balance"  type="number"  class="form-control open_balance"   style="text-align: right;border: 2px solid #d7d4d6; " placeholder="0.00"   tabindex="4">
                        </div>
                            </div>
                         </div>





                    <div class="col-sm-6">

<div class="form-group row">

    <label for="invoice_no" class="col-sm-4 col-form-label"><?php echo display('Sales Tax') ?>

        <i class="text-danger">*</i>

    </label>

    <div class="col-sm-8">

    <select  class="form-control"  id="tax_dropdown" name="tax_status" tabindex="3" style="width150pxborder: 2px solid #d7d4d6;" required="">
                                          <option value=""selected><?php echo display('Select Sales Tax')?></option>
                                        <option value="1"><?php echo display('NO') ?></option>
                                        <option value="2"><?php echo display('YES') ?></option>
                         </select>

    </div>

</div>

<div class="form-group row" id="tax">
    <div class="row">
           <div class="col-sm-12">
    <label for="sales" class="col-sm-4 col-form-label"><?php echo ('State Tax') ?></label>
    <div class="col-sm-8">
    <select  class="form-control" name="tax" value="" tabindex="3" style=" width: 100%;border: 2px solid #d7d4d6;"   >
    <option value=""  ><?php echo display('state') ?></option>
<option value="Alabama">Alabama</option>
<option value="Alaska">Alaska</option>
<option value="Arizona">Arizona</option>
<option value="Arkansas">Arkansas</option>
<option value="California">California</option>
<option value="Colorado">Colorado</option>
z<option value="Delaware">Delaware</option>
<option value="District Of Columbia">District Of Columbia</option>
<option value="Florida">Florida</option>
<option value="Georgia">Georgia</option>
<option value="Hawaii">Hawaii</option>
<option value="Idaho">Idaho</option>
<option value="Illinois">Illinois</option>
<option value="Indiana">Indiana</option>
<option value="Iowa">Iowa</option>
<option value="Kansas">Kansas</option>
<option value="Kentucky">Kentucky</option>
<option value="Louisiana">Louisiana</option>
<option value="Maine">Maine</option>
<option value="Maryland">Maryland</option>
<option value="Massachusetts">Massachusetts</option>
<option value="Michigan">Michigan</option>
<option value="Minnesota">Minnesota</option>
<option value="Mississippi">Mississippi</option>
<option value="Missouri">Missouri</option>
<option value="Montana">Montana</option>
<option value="Nebraska">Nebraska</option>
<option value="Nevada">Nevada</option>
<option value="New Hampshire">New Hampshire</option>
<option value="New Jersey">New Jersey</option>
<option value="New Mexico">New Mexico</option>
<option value="New York">New York</option>
<option value="North Carolina">North Carolina</option>
<option value="North Dakota">North Dakota</option>
<option value="Ohio">Ohio</option>
<option value="Oklahoma">Oklahoma</option>
<option value="Oregon">Oregon</option>
<option value="Pennsylvania">Pennsylvania</option>
<option value="Rhode Island">Rhode Island</option>
<option value="South Carolina">South Carolina</option>
<option value="South Dakota">South Dakota</option>
<option value="Tennessee">Tennessee</option>
<option value="Texas">Texas</option>
<option value="Utah">Utah</option>
<option value="Vermont">Vermont</option>
<option value="Virginia">Virginia</option>
<option value="Washington">Washington</option>
<option value="West Virginia">West Virginia</option>
<option value="Wisconsin">Wisconsin</option>
<option value="Wyoming">Wyoming</option>
</select>
</div>
</div>
    </div>
    &nbsp;&nbsp;
                <div class="form-group row" id="tax">
                 <div class="col-sm-12">
                <label for="sales" class="col-sm-4 col-form-label"><?php echo  display('Tax Rates')?> </label>
                <div class="col-sm-8">
                 <input name="taxes"  class="form-control taxes"   style="text-align: right;" value="%" placeholder="%"   style="    width: 102%;border: 2px solid #d7d4d6;" tabindex="4">
                 </div>
    </div>
    </div>

</div>
</div>
<br>
<div class="form-group row">
       <div class="col-sm-12">
            <div class="col-sm-6">
                            <label for="example-text-input" class="col-sm-0 col-form-label"></label>
                            <div class="col-sm-8">
                                <input type="submit" id="add-customer"  class="btnclr btn btn-large" name="add-customer" value="<?php echo display('save') ?>" tabindex="7"/>
                            </div>





                       
                        </div>
                        


                         </div>
                    </div>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
        <div id="Customer_modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><?php echo display('customer_csv_upload'); ?></h4>
      </div>
      <div class="modal-body">

                <div class="panel">
                    <div class="panel-heading">
                        
                            <div><a href="<?php echo base_url('assets/data/csv/customer_csv_sample.csv') ?>" class="btn btn-primary pull-right"><i class="fa fa-download"></i><?php echo display('download_sample_file')?> </a> </div>
                       
                    </div>
                    
                    <div class="panel-body">
                       
                      <?php echo form_open_multipart('Ccustomer/uploadCsv_Customer',array('class' => 'form-vertical', 'id' => 'validate','name' => 'insert_customer'))?>
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label for="upload_csv_file" class="col-sm-4 col-form-label"><?php echo display('upload_csv_file') ?> <i class="text-danger">*</i></label>
                                    <div class="col-sm-8">
                                        <input class="form-control" name="upload_csv_file" type="file" id="upload_csv_file" placeholder="<?php echo display('upload_csv_file') ?>" required>
                                    </div>
                                </div>
                            </div>
                        
                       <div class="col-sm-12">
                        <div class="form-group row">
                            <div class="col-sm-12 text-right">
                                <input type="submit" id="add-product" class="btn btn-primary btn-large" name="add-product" value="<?php echo display('submit') ?>" />
                                  <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo display('close') ?></button>
                               
                            </div>
                        </div>
                        </div>
                          <?php echo form_close()?>
                    </div>
                    </div>
                  
               
     
      </div>
     
    </div>

  </div>
</div>
    </section>
</div>

<div class="modal fade" id="myModal1" role="dialog" >
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="margin-top: 190px;">
        <div class="modal-header" style="color:white;background-color:#38469f;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"> Customer</h4>
        </div>
        <div class="modal-body" id="bodyModal1" style="text-align:center;font-weight:bold;">
          
      
     
        </div>
        <div class="modal-footer">
          
        </div>
      </div>
      
    </div>
  </div>



<!------ add new Payment Type -->
<div class="modal fade" id="payment_type_new" role="dialog">
<div class="modal-dialog" role="document">
    <div class="modal-content" style="text-align:center" >
        <div class="modal-header btnclr" >
            <a href="#" class="close" data-dismiss="modal">&times;</a>
            <h4 class="modal-title"><?php  echo  display('Add New Payment Terms')?></h4>
        </div>
        <div class="modal-body">
            <div id="customeMessage" class="alert hide"></div>
  <form id="add_pay_terms" method="post">
    <div class="panel-body">
<input type ="hidden" name="csrf_test_name" id="" value="<?php echo $this->security->get_csrf_hash();?>">
        <div class="form-group row">
            <label for="customer_name" style="width: auto;" class="col-sm-3 col-form-label"><?php  echo  display('New Payment Terms')?> <i class="text-danger">*</i></label>
            <div class="col-sm-6">
                <input class="form-control" name ="new_payment_terms" id="new_payment_terms" type="text" placeholder="New Payment Terms"  required="" tabindex="1">
            </div>
        </div>
    </div>
        </div>
        <div class="modal-footer">
            <a href="#" class="btn btnclr"   data-dismiss="modal"><?php  echo  display('close')?></a>
            <input type="submit" class="btn btnclr"   value="<?php  echo  display('submit')?>">
        </div>
                                </form>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->




<!------ add new Payment Type -->  
<div class="modal fade" id="payment_type" role="dialog">

<div class="modal-dialog" role="document">

    <div class="modal-content" style="text-align:center" >

        <div class="modal-header btnclr"  >

            

            <a href="#" class="close" data-dismiss="modal">&times;</a>

            <h4 class="modal-title"><?php  echo  display('ADD NEW CUSTOMER TYPE')?></h4>

        </div>

        

        <div class="modal-body">

            <div id="customeMessage" class="alert hide"></div>

            <form id="add_customer_type" method="post">

<div class="panel-body">

<input type ="hidden" name="csrf_test_name" id="" value="<?php echo $this->security->get_csrf_hash();?>">

<div class="form-group row">

<label for="customer_name"  class="col-sm-4 col-form-label"><?php  echo  display('New Customer Type')?> <i class="text-danger">*</i></label>

<div class="col-sm-6">

<input class="form-control" name ="new_customer_type" id="new_customer_type" type="text" placeholder="New Customer Type"  required="" tabindex="1">
</div>
</div>
</div>
</div>



<div class="modal-footer">



<a href="#" class="btn btnclr"     data-dismiss="modal"><?php  echo  display('close')?></a>



<input type="submit"    class="btn btnclr" value="<?php  echo  display('submit')?>">

</div>

            </form>

    </div><!-- /.modal-content -->

</div><!-- /.modal-dialog -->

</div><!-- /.modal -->





<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
   
<!-- Add new customer end -->
 <!-- script for currency selector -->
<script>
   $('#tax_dropdown').on('change', function() {
  if ( this.value == '2')
    $("#tax").show();     
  else
    $("#tax").hide();
}).trigger("change");
const select = document.querySelectorAll(".currency");
const btn = document.getElementById("btn");
const num = document.getElementById("num");
const ans = document.getElementById("ans");
const err = document.getElementById("errorMSG");
const info = document.getElementById("info");
const baseFlagsUrl = "https://wise.com/public-resources/assets/flags/rectangle";
const currencyApiUrl = "https://open.er-api.com/v6/latest";

document.addEventListener('DOMContentLoaded', function(){ 
  fetch(currencyApiUrl)
    .then((data) => data.json())
    .then((data) => {
    err.innerHTML = "";
    display(data.rates);
    $('.currency').select2({
      width: 'resolve',
      templateResult: formatFlags,
      templateSelection: formatCountry,
      maximumInputLength: 3
    });
    info.innerHTML = "Result: "+data.result+"<br>Provider: "+data.provider+"<br>Documentation: "+data.documentation+"<br>Terms of use: "+data.terms_of_use+"<br>Time Last Update UTC: "+data.time_last_update_utc;
    $('#pageLoader').fadeOut();
  }).catch(function(error) {
    err.innerHTML = "Error: " + error;
    $('#pageLoader').fadeOut();
  });


  $('.currency').on('select2:select', function (e) {
    let currency1 = select[0].value;
    let currency2 = select[1].value;
    let num1 = num.value;
    convert(currency1, currency2, num1)
  });
}, false);

function display(data){
  const entries = Object.entries(data);
  for (var i = 0; i < entries.length; i++){
    select[0].innerHTML += `<option value="${entries[i][0]}">${entries[i][0]}</option>`;
    select[1].innerHTML += `<option value="${entries[i][0]}">${entries[i][0]}</option>`;
  }
  if ($('#currency2').find("option[value='CLP']").length) {
    $('#currency2').val('CLP').trigger('change');
    $('#num').val(1);
    let currency1 = select[0].value;
    let currency2 = select[1].value;
    let num1 = num.value;
    convert(currency1, currency2, num1)
  }
}
function formatFlags (country) {
  if (!country.id) {
    return country.text;
  }
  var $countryFlag = $('<span><img src="' + baseFlagsUrl + '/' + country.element.value.toLowerCase() + '.png" class="img-flag" /> ' + country.text + '</span>');
  return $countryFlag;
}
function formatCountry (country) {
  if (!country.id) {
    return country.text;
  }
  var $countryFlag = $('<span><img class="img-flag"/> <span></span></span>');
  $countryFlag.find("span").text(country.text);
  $countryFlag.find("img").attr("src", baseFlagsUrl + "/" + country.element.value.toLowerCase() + ".png");
  return $countryFlag;
}

function convert(currency1, currency2, value){
  fetch(`${currencyApiUrl}/${currency1}`)
    .then((val) => val.json())
    .then((val) => {
    console.log('Converting ' +currency1 + ' to '+currency2);
    var res  = val.rates[currency2] * value 
    ans.value = res.toFixed(2);
    err.innerHTML = "";
  }).catch(function(error) {
    err.innerHTML = "Error: " + error;
  });
}


var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';



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
            console.log(data1);
            $.each(data1, function (i, item) {
           result = '<option value=' + data1[i].payment_terms + '>' + data1[i].payment_terms + '</option>';
       });
       $('#payment_terms').selectmenu();
       $('#payment_terms').append(result).selectmenu('refresh',true);
      $("#bodyModal1").html("<?php  echo display('Payment Terms Added Successfully')?>");
      $('#payment_type_new').modal('hide');
      $('#payment_terms').show();
       $('#myModal1').modal('show');
      window.setTimeout(function(){
        $('#payment_type_new').modal('hide');
       $('#myModal1').modal('hide');
       $('.modal-backdrop').remove();

    }, 2500);
     }
      });
  });










  $('#add_customer_type').submit(function(e){
    e.preventDefault();
      var data = {
        
        
        new_customer_type : $('#new_customer_type').val()
      
      };
      data[csrfName] = csrfHash;
  
      $.ajax({
          type:'POST',
          data: data, 
         dataType:"json",
          url:'<?php echo base_url();?>Ccustomer/add_customertype_new',
          success: function(data1, statut) {
            console.log(data1);
            $.each(data1, function (i, item) {
           
           result = '<option value=' + data1[i].c_type + '>' + data1[i].c_type + '</option>';
       });
     
       $('#customer_type').selectmenu(); 
       $('#customer_type').append(result).selectmenu('refresh',true);
       $('#customer_type').show();
      $("#bodyModal1").html("Customer Type Added Successfully");
      $('#payment_type').modal('hide');
      
      $(this).css('bottom','15px');
       $('#myModal1').modal('show');
      window.setTimeout(function(){
        $('#payment_type').modal('hide');
     
       $('#myModal1').modal('hide');
         
       $('.modal-backdrop').remove();


    }, 2000);
    
     }
      });
  });



  function formatPhoneNumber(input) {
            // Remove non-numeric characters from the input
            var phoneNumber = input.value.replace(/\D/g, '');

            // Check if the input is not empty
            if (phoneNumber.length > 0) {
                // Format the phone number
                var formattedPhoneNumber = '(' + phoneNumber.substring(0, 3) + ') ' + phoneNumber.substring(3, 6) + ' ' + phoneNumber.substring(6, 10);

                // Set the formatted value back to the input
                input.value = formattedPhoneNumber;
            }
        }





    </script>


  <!-- style for currency list   -->
<style>

.img-flag{
  max-height: 11px;
 display: none;
}
    </style>



         