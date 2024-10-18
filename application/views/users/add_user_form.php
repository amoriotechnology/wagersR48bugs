<?php error_reporting(1); ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="header-icon"> <i class="pe-7s-note2"></i> </div>
            <div class="header-title">
                <h1>Add  User</h1> <small></small>
                <ol class="breadcrumb">
                    <li><a href="index.html"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                    <li>
                        <a href="#">
                            <?php echo display('web_settings') ?>
                        </a>
                    </li>
                    <li class="active" style="color:orange;">Add Admin</li>
                </ol>
            </div>
        </section>
        <style>
        .select2 {
            display: none;
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
                        <div class='row'> </div>
                        <!-- New user -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="panel panel-bd lobidrag">
                                    <div class="panel-heading">
                                        <div class="panel-title">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <?php if($this->permission1->method('manage_user','read')->access()){?> <a href="<?php echo base_url('User/managecompany')?>" style="color:white;background-color:#38469f;" class="btn btn-success m-b-5 m-r-2"><i class="ti-align-justify"> </i>Manage Company</a>
                                                        <?php }?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <?php echo form_open_multipart('User/company_insert');?>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">CompanyName<i class="text-danger">*</i></label>
                                                <div class="col-sm-6">
                                                    <input type="text" tabindex="1" class="form-control" name="company_name" id="company_name" placeholder="Enter your Companyname" required /> </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">CompanyEmail<i class="text-danger">*</i></label>
                                                <div class="col-sm-6">
                                                    <input type="text" tabindex="1" class="form-control" name="email" id="email" required placeholder="Enter your Companyemail" /> </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Mobile<i class="text-danger">*</i></label>
                                                <div class="col-sm-6">
                                                    <input type="number" tabindex="1" class="form-control" name="mobile" id="mobile" required placeholder="Enter your mobile" /> </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label"><?php echo 'City'; ?><i class="text-danger">*</i></label>
                                                <div class="col-sm-6">
                                                    <input type="text" tabindex="1" class="form-control" name="c_city" id="c_city" required placeholder="Enter your city" oninput="this.value = this.value.replace(/[^A-Za-z ]/g, '')"/>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label"><?php echo 'State'; ?><i class="text-danger">*</i></label>
                                                <div class="col-sm-6">
                                                    <input type="text" tabindex="1" class="form-control" name="c_state" id="c_state" required placeholder="Enter your state" oninput="this.value = this.value.replace(/[^A-Za-z ]/g, '')"/>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Address<i class="text-danger">*</i></label>
                                                <div class="col-sm-6">
                                                    <input type="text" tabindex="1" class="form-control" name="address" id="address" placeholder="Enter your address" /> </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Website<i class="text-danger">*</i></label>
                                                <div class="col-sm-6">
                                                    <input type="text" tabindex="1" class="form-control" name="website" id="website" placeholder="Enter your website" required /> </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Logo<i class="text-danger">*</i></label>
                                                <div class="col-sm-6">
                                                    <input type="file" class="form-control" name="image" id="logo" required /> </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Payment Reminder Period<i class="text-danger">*</i></label>
                                                <div class="col-sm-6">
                                                    <div class="datepicker" style="width: 100%;">
                                                        <input type="text" name="payment_reminder_date" id="datepickerInput" class="form-control" readonly>
                                                        <div class="date-container" id="dateContainer"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Currency<i class="text-danger">*</i></label>
                                                <div class="col-sm-6">
                                                    <select class="form-control" id="currency" name="currency" class="form-control" style="width: 100%;" required="" style="max-width: -webkit-fill-available;">
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
                                                </div>
                                            </div>
                                             <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Payment Due date<i class="text-danger">*</i></label>
                                                <div class="col-sm-6">
                                                   <div class="datepicker1" style="width: 100%;">
                                                        <input type="text" name="due_date" id="datepickerInput1" class="form-control" readonly>
                                                        <div class="date-container1" id="dateContainer1"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Subscription Fees / Month<i class="text-danger">*</i></label>
                                                <div class="col-sm-6">
                                                    <input type="text" tabindex="1" class="form-control" name="subscription_fees" id="subscription_fees" placeholder="Enter subscription fees" /> </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Payment Follow-Up Mail<i class="text-danger">*</i></label>
                                                <div class="col-sm-6">
                                                    <input type="email" tabindex="1" class="form-control" name="mail" id="follow_up_mail" placeholder="Enter your Email address" /> </div>
                                            </div>
                                            <hr>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Username<i class="text-danger">*</i></label>
                                                <div class="col-sm-6">
                                                    <input required type="text" tabindex="1" class="form-control" name="username" id="username" placeholder="Enter your username" /> </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="password" class="col-sm-3 col-form-label">
                                                    <?php echo display('password') ?> <i class="text-danger">*</i></label>
                                                <div class="col-sm-6">
                                                    <input type="password" tabindex="4" ramji="" class="form-control" id="password" required name="password" placeholder="<?php echo display('password') ?>" /> </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="address" class="col-sm-3 col-form-label">Email<i class="text-danger">*</i></label>
                                                <div class="col-sm-6">
                                                    <input type="email" tabindex="1" class="form-control" name="user_email" required id="user_email" placeholder="Enter your useremail" /> </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="user_type" class="col-sm-3 col-form-label">
                                                    <?php echo display('user_type') ?> <i class="text-danger">*</i></label>
                                                <div class="col-sm-6">
                                                    <select required class="form-control" disabled name="user_type" id="user_type" tabindex="6">
                                                        <option value="2">
                                                            <?php echo display('select_one') ?>
                                                        </option>
                                                        <option selected value="2">
                                                            <?php echo display('admin') ?>
                                                        </option>
                                                        <option value="2">
                                                            <?php echo display('user') ?>
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-4 col-form-label"></label>
                                                <div class="col-sm-6">
                                                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                                                    <input type="hidden" name="uid" value="<?php echo $_SESSION['user_id']; ?>">
                                                    <input type="submit" id="add-customer" style="color:white;background-color:#38469f;" class="btn btn-primary btn-large" name="add-user" value="<?php echo display('save') ?>" tabindex="6" /> </div>
                                            </div>
                                            <?php echo form_close(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
        </section>
    </div>
    <!-- Edit user end -->

  <style>
    .datepicker {
      position: relative;
      display: inline-block;
    }
    .datepicker input {
      width: 100%;
      padding: 10px;
      border: 1px solid #CED4DA;
      border-radius: 0.25rem;
      cursor: pointer;
    }
    .datepicker .date-container {
      display: none;
      position: absolute;
      top: calc(100% + 5px);
      left: 0;
      z-index: 999;
      background: #fff;
      border: 1px solid #CED4DA;
      border-radius: 0.25rem;
      padding: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .datepicker .date-container .date {
      display: inline-block;
      width: 30px;
      height: 30px;
      line-height: 30px;
      text-align: center;
      margin: 5px;
      cursor: pointer;
      border: 1px solid transparent;
      border-radius: 0.25rem;
      transition: background-color 0.3s, color 0.3s;
    }
    .datepicker .date-container .date:hover {
      background-color: #E9ECEF;
    }


    .datepicker1 {
      position: relative;
      display: inline-block;
    }
    .datepicker1 input {
      width: 100%;
      padding: 10px;
      border: 1px solid #CED4DA;
      border-radius: 0.25rem;
      cursor: pointer;
    }
    .datepicker1 .date-container1 {
      display: none;
      position: absolute;
      top: calc(100% + 5px);
      left: 0;
      z-index: 999;
      background: #fff;
      border: 1px solid #CED4DA;
      border-radius: 0.25rem;
      padding: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .datepicker1 .date-container1 .date {
      display: inline-block;
      width: 30px;
      height: 30px;
      line-height: 30px;
      text-align: center;
      margin: 5px;
      cursor: pointer;
      border: 1px solid transparent;
      border-radius: 0.25rem;
      transition: background-color 0.3s, color 0.3s;
    }
    .datepicker1 .date-container1 .date:hover {
      background-color: #E9ECEF;
    }
  </style>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script type="text/javascript">
    var dateContainer = document.getElementById("dateContainer");
      var datePickerInput = document.getElementById("datepickerInput");
      datePickerInput.addEventListener("click", function() {
        dateContainer.style.display = "block";
      });
      for (var i = 1; i <= 10; i++) {
        var dateElement = document.createElement("div");
        dateElement.classList.add("date");
        dateElement.textContent = i;
        dateContainer.appendChild(dateElement);
        dateElement.addEventListener("click", function() {
          var selectedDate = this.textContent;
          datePickerInput.value = selectedDate;
          dateContainer.style.display = "none";
        });
      }
      document.addEventListener("click", function(event) {
        if (!dateContainer.contains(event.target) && event.target !== datePickerInput) {
          dateContainer.style.display = "none";
        }
      });
</script>    

<script type="text/javascript">
    var dateContainer1 = document.getElementById("dateContainer1");
      var datePickerInput1 = document.getElementById("datepickerInput1");
      datePickerInput1.addEventListener("click", function() {
        dateContainer1.style.display = "block";
      });
      for (var i = 1; i <= 31; i++) {
        var dateElement = document.createElement("div");
        dateElement.classList.add("date");
        dateElement.textContent = i;
        dateContainer1.appendChild(dateElement);
        dateElement.addEventListener("click", function() {
          var selectedDate = this.textContent;
          datePickerInput1.value = selectedDate;
          dateContainer1.style.display = "none";
        });
      }
      document.addEventListener("click", function(event) {
        if (!dateContainer1.contains(event.target) && event.target !== datePickerInput1) {
          dateContainer1.style.display = "none";
        }
      });
</script>    