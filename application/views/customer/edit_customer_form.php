<script src="<?php echo base_url() ?>my-assets/js/countrypicker.js" type="text/javascript"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>


<!--Edit customer start -->
   
<style>
     .btnclr{
       background-color:<?php echo $setting_detail[0]['button_color']; ?>;
       color: white;

   }
</style>

        
        <div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <figure class="one">
               <img src="<?php echo base_url()  ?>asset/images/customer.png"  class="headshotphoto" style="height:50px;" />
      </div>
        
           
           
           
           
           <div class="header-title">
          <div class="logo-holder logo-9">
            <h1><?php echo ('Edit Customer') ?></h1>
       </div> 
           
           
           
            <small><?php //echo display('add_new_customer') ?></small>
        
        
        
        
            <ol class="breadcrumb" style=" border: 3px solid #d7d4d6;" >
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('customer') ?></a></li>
                <li class="active" style="color:orange;"><?php echo ('Edit Customer') ?></li>
           
           
              <div class="load-wrapp">
       <div class="load-10">
         <div class="bar"></div>
       </div>
       </div>
           
           
           
            </ol>
        </div>
    </section>
    
    
    
    
    
    
    
<?php  // echo $_SERVER['REQUEST_URI']; 
 $link = $_SERVER['PHP_SELF'];
 $link_array = explode('/',$link);
 $page = end($link_array);

?>

    <section class="content">
        <!-- alert message -->
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
<style>
    .select2{
        display:none;
    }
    .img-flag{

  display: none;
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

<script>
    
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





        <!-- New customer -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag" style="border:3px solid #d7d4d6;"  >
                    <div class="panel-heading" style="height: 55px;"> 
                        <div class="panel-title">
                            <h4><?php //echo display('customer_edit') ?> </h4>
                        </div>


                        <div id="bloc2" style="float:right;">
<a  href="<?php echo base_url('Ccustomer/manage_customer') ?>" class="btnclr btn  m-b-5 m-r-2"><i class="ti-align-justify"> </i> <?php echo display('manage_customer') ?> </a>
 </div>   




                    </div>
                  <?php echo form_open_multipart('Ccustomer/customer_update',array('class' => 'form-vertical', 'id' => 'customer_update'))?>
                   
                  <div class="panel-body">
                     <div class="col-sm-6">
                        <div class="form-group row">
                            <label for="customer_name" class="col-sm-4 col-form-label"><?php echo display('Company Name');?> <i class="text-danger">*</i></label>
                            <div class="col-sm-8">
                                <input class="form-control" name ="company_name" id="customer_name"  style="border:2px solid #d7d4d6;"   value="{company_name}"  type="text"  required="" tabindex="1" >
                            </div>
                        </div>
                        <input type="hidden" value="<?php echo $page;  ?>" name="customer_id"/>
                       <div class="form-group row">
<label for="customer_type" class="col-sm-4 col-form-label"><?php echo display('Customer Type');?></label>
<div class="col-sm-8">
<!-- <input type="text"name="payment" id="payment_terms" class=" form-control" placeholder='Payment Terms'> -->
    <select   name="customer_type" id="customer_type" class=" form-control" placeholder="Customer Type" value="<?php echo "{customer_type}"  ?>" style="width:100%;border:2px solid #d7d4d6;">
     <option value="<?php echo "{customer_type}"  ?>"><?php echo "{customer_type}"  ?></option>
  <option value="Distributor"><?php echo display('Distributor');?></option>
    <option value="Fabricator"><?php echo display('Fabricator');?></option>
    <option value="Kitchen"><?php echo display('Kitchen');?></option>
    <option value="Dealer"><?php echo display('Dealer');?></option>
    <option value="Contractor"><?php echo display('Contractor');?></option>
    <option value="Builder"><?php echo display('Builder');?></option>
    <option value="Others"><?php echo display('Others');?></option>
    </select>
</div> 
 </div>


<input type="hidden" name="customer_id" id="customer_id" value="{customer_id}"  >


                       	<div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label"><?php  echo  ('Primary Email');?><i class="text-danger">*</i></label>
                            <div class="col-sm-8">
                                <input class="form-control" name ="email" id="email" type="email" value="{customer_email}" required=""  style="border:2px solid #d7d4d6;"   placeholder="Primary Email" tabindex="2"> 
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="emailaddress" class="col-sm-4 col-form-label"><?php  echo  display('Secondary Email');?> </label>
                            <div class="col-sm-8">
                                <input class="form-control" name="emailaddress" id="emailaddress" type="email" value="{email_address}" style="border:2px solid #d7d4d6;"   placeholder="Secondary Email"  >
                            </div>
                        </div>
                       

                        <div class="form-group row">
                            <label for="mobile" class="col-sm-4 col-form-label"><?php  echo  display('Business Phone');?> <i class="text-danger">*</i></label>
                            <div class="col-sm-8">
                                <!-- <input class="form-control" name ="phone" id="mobile"   type="tel" style="border:2px solid #d7d4d6;"  placeholder="(XXX) XXX-XXXX"  oninput="formatPhoneNumber(this)"   min="0" tabindex="3" required=""> -->
                           
                                <input class="form-control" name ="phone" id="mobile" type="tel"  value="{phone}"   style="border: 2px solid #d7d4d6;" required=""   placeholder="(XXX) XXX-XXXX"   min="0" tabindex="3" required=""  oninput="formatPhoneNumber(this)" >

                           
                              </div>
                        </div>

                        <div class="form-group row">
                            <label for="contact" class="col-sm-4 col-form-label"><?php  echo  display('Contact Person');?> <i class="text-danger">*</i></label>
                            <div class="col-sm-8">
                                <input class="form-control" name="contact" id="contact" value="{contact}" type="number" style="border:2px solid #d7d4d6;"   placeholder="Contact Person" required="" >
                            </div>
                        </div>



                         <div class="form-group row">
                            <label for="mobile" class="col-sm-4 col-form-label"> <?php  echo  display('Mobile');?></label>
                            <div class="col-sm-8">
                                <input class="form-control" name="mobile" id="mobile" value="{customer_mobile}" type="number" style="border:2px solid #d7d4d6;"   placeholder="Mobile"  min="0" tabindex="2" >
                            </div>
                        </div>
                                

                        <div class="form-group row">
                            <label for="fax" class="col-sm-4 col-form-label"><?php  echo  display('Fax');?></label>
                            <div class="col-sm-8">
                                <input class="form-control" name="fax" id="fax" value="{fax}" type="text" style="border:2px solid #d7d4d6;"   placeholder="Fax" >
                            </div>
                        </div>
                        <div class="form-group row">
            <label for="previous_balance" class="col-sm-4 col-form-label"><?php  echo  display('Preferred currency');?><i class="text-danger">*</i></label>
 
            <div class="col-sm-6">
            <select  class="form-control" id="currency" name="currency1"   style="width:136%;" required=""  style="max-width: -webkit-fill-available;border:2px solid #d7d4d6;">
            <option value="<?php echo $currency_type; ?>"><?php echo $currency_type; ?></option>
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
    <option value="SVC">SVC - Salvadoran ColÃn</option>
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
    <option value="USD">USD - US Dollar</option>
    <option value="UZS">UZS - Uzbekistan Som</option>
    <option value="VUV">VUV - Vanuatu Vatu</option>
    <option value="VEF">VEF - Venezuelan BolÃ­var</option>
    <option value="VND">VND - Vietnamese Dong</option>
    <option value="YER">YER - Yemeni Rial</option>
    <option value="ZMK">ZMK - Zambian Kwacha</option>
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
                                <textarea class="form-control" required="" name="address2" id="address2" rows="2"  style="border:2px solid #d7d4d6;"  placeholder="Billing Address" >{address2}</textarea>
                            </div>
                        </div>


                    <div class="form-group row">
                            <label for="address " class="col-sm-4 col-form-label"><?php  echo  display('Shipping Address');?></label>
                            <div class="col-sm-8">
                                <textarea class="form-control" name="address" id="address "  rows="2"  style="border:2px solid #d7d4d6;"  placeholder="Shipping Address">{customer_address}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="city" class="col-sm-4 col-form-label"><?php  echo  display('city');?> <i class="text-danger">*</i></label>
                            <div class="col-sm-8">
                                <input class="form-control" name="city" id="city" type="text" value="{city}"  style="border:2px solid #d7d4d6;"   placeholder="City" required="" >
                            </div>
                        </div>
                      <div class="form-group row">
                            <label for="state" class="col-sm-4 col-form-label"><?php  echo  display('state');?> <i class="text-danger">*</i></label>
                            <div class="col-sm-8">
                                <input class="form-control" name="state" id="state" type="text" value="{state}"  style="border:2px solid #d7d4d6;"  placeholder="State" required="" >
                            </div>
                        </div>
                      
                         
                         <div class="form-group row">
                            <label for="zip" class="col-sm-4 col-form-label"><?php  echo  display('zip');?> <i class="text-danger">*</i></label>
                            <div class="col-sm-8">
                                <input class="form-control" name="zip" id="zip" type="text" value="{zip}"  style="border:2px solid #d7d4d6;"  placeholder="Zip"  required="">
                            </div>
                        </div>
                         

                      
                        <div class="form-group row">
                                    <label for="country" class="col-sm-4 col-form-label"  required="" ><?php  echo  display('country');?><i class="text-danger">*</i></label>
                                    <div class="col-sm-8">
                                     <select class="selectpicker countrypicker form-control" style="width:100%" data-default="<?php echo $country;?>"  >
     <option value="<?php echo $country;?>"><?php echo $country;?></option></select>
                                </div>
                        </div>








                          
                        <div class="form-group row">

<label for="billing_address" class="col-sm-4 col-form-label"><?php echo display('Payment Terms');?><i class="text-danger">*</i></label>

<div class="col-sm-8">

    <select   name="payment" id="payment_terms" class=" form-control"   style="width:100%;border:2px solid #d7d4d6;">
     <option value="<?php echo "{payment}"  ?>"><?php echo "{payment}"  ?></option>   
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
    </select>

</div>

</div>    
                         
                        <div class="form-group row">
                            <label for="previous_balance" class="col-sm-4 col-form-label">Credit Limit <i class="text-danger">*</i></label>
                            <div class="col-sm-8">
                                <input class="form-control" name="previous_balance" id="previous_balance" value="{credit_limit}" type="number" min="0"  style="border:2px solid #d7d4d6;"  tabindex="5" required="">
                            </div>
                        </div>
                    </div>



                    <div class="col-sm-6">                    
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-4 col-form-label">Open Balance</label>
                        <div class="col-sm-8">
                            <input name="open_balance"  class="form-control open_balance"  type="number"  style="text-align: right;border:2px solid #d7d4d6;width: 102%;" value="{open_balance}" placeholder="0.00"    tabindex="4">
                        </div>
                     </div> 
                     </div>












                    <div class="col-sm-6">

<div class="form-group row">

    <label for="invoice_no" class="col-sm-4 col-form-label"><?php echo display('Sales Tax') ?>

        <i class="text-danger">*</i>

    </label>

    <div class="col-sm-8">

    <select name="tax_status" class="form-control"  id="tax_dropdown" tabindex="3" style="width:100%;border:2px solid #d7d4d6;">
                               <?php if($tax_status =='1') { ?>     
                                       <option value="1"><?php echo display('NO')  ?></option>
                                     <?php } else{ ?>
                                         <option value="2"><?php echo display('YES')  ?></option>
                                          <?php } ?>
                                        <option value="1"><?php echo display('NO') ?></option>
                                        <option value="2"><?php echo display('YES') ?></option>
                         </select>

    </div>

</div>

<div class="form-group row" id="tax">
    <div class="row">
           <div class="col-sm-12">
    <label for="sales" class="col-sm-4 col-form-label"><?php echo display('State Tax') ?></label>
    <div class="col-sm-8">
    <select  class="form-control" name="tax" value="" tabindex="3" style="width:100%;border:2px solid #d7d4d6;"  >
    <!-- <select name="tax" value="" tabindex="5" style="width:100%"> -->
    <option value="<?php echo "{sales_tax}"  ?>"><?php echo "{sales_tax}"  ?></option>
<option value="Alabama">Alabama</option>
<option value="Alaska">Alaska</option>
<option value="Arizona">Arizona</option>
<option value="Arkansas">Arkansas</option>
<option value="California">California</option>
<option value="Colorado">Colorado</option>
<option value="Connecticut">Connecticut</option>
<option value="Delaware">Delaware</option>
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
                <label for="sales" class="col-sm-4 col-form-label"><?php echo  display('Tax Rates')?>  </label>
                <div class="col-sm-8">
                 <input name="taxes"  class="form-control taxes" value="{tax_percent}"   placeholder="%"   style="width:100%;border:2px solid #d7d4d6;" tabindex="4">
                 </div>
    </div>
    </div>
</div>

</div>
<div class="form-group row">
       <div class="col-sm-12">
         
                       

                       
                        </div>
                           <div class="col-sm-6">
                            <label for="example-text-input" class="col-sm-0 col-form-label"></label>
                            <div class="col-sm-8">
                                <input type="submit" id="add-customer"   class="btnclr btn btn-large updateCustomer" name="add-customer" value="<?php echo display('save') ?>" tabindex="7"/>
                            </div>





                       
                         </div>
                    </div>
        
                    </div>
                    <?php echo form_close()?>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Edit customer end -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
<script>
     $('#tax_dropdown').on('change', function() {
  if ( this.value == '2'){
    $("#tax1").show();       $("#tax2").show();   
  }else{
    $("#tax1").hide();  $("#tax2").hide();
  }
}).trigger("change");
   $(document).ready(function() {
var sts=<?php  echo $tax_status; ?>;
console.log(sts);
if(sts=='1'){
      $("#tax1").hide();  $("#tax2").hide();
}else{
      $("#tax1").show();       $("#tax2").show();   
}

   });
   
   
   
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




</script>